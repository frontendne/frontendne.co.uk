<?php

class PerchBase
{   
    protected $db;
    protected $details;

    protected $index_table          = false;

    protected $api                  = false;
    
    protected $event_prefix         = false;
    public    $suppress_events      = true;

    protected $can_log_resources    = true;

    protected $modified_date_column = false;

    protected $pk_is_int = true;

    function __construct($details) 
    {        
        $this->db       = PerchDB::fetch();
        $this->details  = $details;

        $this->table    = PERCH_DB_PREFIX . $this->table;
    }
    
    function __call($method, $arguments)
	{
		if (isset($this->details[$method])) {
			return $this->details[$method];
		}else{
		    PerchUtil::debug('Looking up missing property ' . $method, 'notice');
		    if (isset($this->details[$this->pk])){
		        $sql    = 'SELECT ' . $method . ' FROM ' . $this->table . ' WHERE ' . $this->pk . '='. $this->db->pdb($this->details[$this->pk]);
		        $this->details[$method] = $this->db->get_value($sql);
		        return $this->details[$method];
		    }
		}
		
		return false;
	}

    public function set_null_id()
    {
        $this->details[$this->pk] = null;
        $this->can_log_resources = false;
    }
    
    public function ready_to_log_resources()
    {
        return $this->can_log_resources;
    }

    public function to_array()
    {
        $out = $this->details;

        $dynamic_field_col = str_replace('ID', 'DynamicFields', $this->pk);
        if (isset($out[$dynamic_field_col]) && $out[$dynamic_field_col] != '') {
            $dynamic_fields = PerchUtil::json_safe_decode($out[$dynamic_field_col], true);
            if (PerchUtil::count($dynamic_fields)) {
                foreach($dynamic_fields as $key=>$value) {
                    $out['perch_'.$key] = $value;
                }
                $out = array_merge($dynamic_fields, $out);
            }
        }

        return $out;
    }
    
    public function id()
    {
        return $this->details[$this->pk];
    }
    
    public function update($data)
    {
        if ($this->modified_date_column) $data[$this->modified_date_column] = date('Y-m-d H:i:s');
        
        $r = $this->db->update($this->table, $data, $this->pk, $this->details[$this->pk]);
        $this->details = array_merge($this->details, $data);
        return $r;
    }
    
    public function delete()
    {
        $this->db->delete($this->table, $this->pk, $this->details[$this->pk]);
    }
    
    public function squirrel($key, $val)
    {
        // non-persistant store
        $this->details[$key] = $val;
    }
    
    public function set_details($details)
    {
        if (is_array($details)) {
            foreach($details as $key=>$val) {
                $this->details[$key]=$val;
            }
            
            $this->details[$this->pk] = $this->details[$this->pk];
        }
    }

    public function get_details()
    {
        return $this->details;
    }

    public function api($api=false)
    {
        if ($api!==false) {
            $this->api = $api;
        }

        return $this->api;
    }

    /**
     * Add the content of this region into the content index
     * @param  boolean $item_id [description]
     * @param  boolean $rev [description]
     * @return [type]       [description]
     */
    public function index($Template=false)
    {
        if (!$this->index_table) return;

        $table = PERCH_DB_PREFIX.$this->index_table;

        // clear out old items
        $sql = 'DELETE FROM '.$table.' WHERE itemKey='.$this->db->pdb($this->pk).' AND itemID='.$this->db->pdb($this->id());
        $this->db->execute($sql);

        $tags = $Template->find_all_tags_and_repeaters($Template->namespace);

        $tag_index = array();
        if (PerchUtil::count($tags)) {
            foreach($tags as $Tag) {
                if (!isset($tag_index[$Tag->id()])) {
                    $tag_index[$Tag->id()] = $Tag;
                }
            }
        }

        $fields = $this->to_array(array_keys($tag_index));
        
        $sql = 'INSERT INTO '.$table.' (itemKey, itemID, indexKey, indexValue) VALUES ';
        $values = array();

        $id_set = false;
        if (PerchUtil::count($fields)) {
            foreach($fields as $key=>$value) { 

                if (strpos($key, 'DynamicFields')!==false || substr($key, 0, 6)=='perch_' || strpos($key, 'JSON')!==false) {
                    continue;
                }

                if (isset($tag_index[$key])) {
                    $tag = $tag_index[$key];
                }else{
                    $tag = new PerchXMLTag('<perch:x type="text" id="'.$key.'" />');
                }

                if ($tag->type()=='PerchRepeater') {
                    $index_value = $tag->get_index($value);
                }else{
                    $FieldType = PerchFieldTypes::get($tag->type(), false, $tag);
                    $index_value = $FieldType->get_index($value);
                }

                if (is_array($index_value)) {
                    foreach($index_value as $index_item) {
                        $data = array();
                        $data['itemKey']    = $this->db->pdb($this->pk);
                        $data['itemID']     = ($this->pk_is_int ? (int) $this->id() : $this->db->pdb($this->id()));
                        $data['indexKey']   = $this->db->pdb(substr($index_item['key'], 0, 64));
                        $data['indexValue'] = $this->db->pdb(substr($index_item['value'], 0, 255));

                        $values[] = '('.implode(',', $data).')';

                        if ($index_item['key']=='_id') $id_set = true;
                    }
                }
            }
        }

        // _id
        if (!$id_set) {
            $data = array();
            $data['itemKey']    = $this->db->pdb($this->pk);
            $data['itemID']     = ($this->pk_is_int ? (int) $this->id() : $this->db->pdb($this->id()));
            $data['indexKey']   = $this->db->pdb('_id');
            $data['indexValue'] = ($this->pk_is_int ? (int) $this->id() : $this->db->pdb($this->id()));

            $values[] = '('.implode(',', $data).')';
        } 
        
        $sql .= implode(',', $values);
        $this->db->execute($sql);

        // optimize index 
        $sql = 'OPTIMIZE TABLE '.$table;
        $this->db->get_row($sql);
        
        if ($this->event_prefix && !$this->suppress_events) {
            $Perch = Perch::fetch();
            $Perch->event($this->event_prefix.'.index', $this);    
        }
        return true;      
    }

}
