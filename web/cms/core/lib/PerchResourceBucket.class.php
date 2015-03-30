<?php

class PerchResourceBucket
{
	protected $name;
	protected $type;
	protected $web_path;
	protected $file_path;

	protected $error;

	public function __construct($details)
	{
		if (!isset($details['type'])) $details['type'] = 'file';
		
		$this->name      = $details['name'];
		$this->type      = $details['type'];
		$this->web_path  = $details['web_path'];
		$this->file_path = $details['file_path'];
	}

	public function get_name()
	{
		return $this->name;
	}

	public function get_type()
	{
		return $this->type;
	}

	public function get_web_path()
	{
		return $this->web_path;
	}

	public function get_file_path()
	{
		return $this->file_path;
	}

	public function is_remote()
	{
		return $this->type!='file';
	}

	/**
	 * Is the bucket ready to be written to? Time to check permissions
	 * @return bool Ready?
	 */
	public function ready_to_write()
	{
		return is_writable($this->file_path);
	}

	public function write_file($file, $name)
	{
		$filename = PerchUtil::tidy_file_name($name);

		if (strpos($filename, '.php')!==false) $filename .= '.txt'; // diffuse PHP files

		$target = PerchUtil::file_path($this->file_path.'/'.$filename);

		if (file_exists($target)) {                                        
		    $dot = strrpos($filename, '.');
		    $filename_a = substr($filename, 0, $dot);
		    $filename_b = substr($filename, $dot);

		    $count = 1;
		    while (file_exists(PerchUtil::file_path($this->file_path.'/'.PerchUtil::tidy_file_name($filename_a.'-'.$count.$filename_b)))) {
		        $count++;
		    }

		    $filename   = PerchUtil::tidy_file_name($filename_a . '-' . $count . $filename_b);
		    $target     = PerchUtil::file_path($this->file_path.'/'.$filename);

		}
		
		PerchUtil::move_uploaded_file($file, $target);

		return array(
				'name' => $filename,
				'path' => $target
			);
	}

	public function get_last_error()
	{
		return $this->error;
	}

	public function initialise()
	{
		if ($this->type == 'file') {
			if (!file_exists($this->get_file_path())) {
				$success = mkdir($this->get_file_path(), 0755, true);
				return $success;
			}
		}
	}

	public function get_files_with_prefix($prefix, $subpath=false)
	{
		$a  = array();	
	 
		try {
		    if ($dh = opendir($this->get_file_path())) {
		        while (($file = readdir($dh)) !== false) {
		            if(substr($file, 0, strlen($prefix))==$prefix) {
		                $a[] = $file;
		            }
		        }
		        closedir($dh);
		    }
		} catch (Exception $e) {
			PerchUtil::debug($e->getMessage(), 'error');
		}
		return $a;
	}

	public function old_get_files_with_prefix($prefix, $subpath=false)
	{
		$out = array();
		$files = PerchUtil::get_dir_contents($this->get_file_path().$subpath);
		if (PerchUtil::count($files)) {
			foreach($files as $file) {
				if (substr($file, 0, strlen($prefix))==$prefix) {
					$out[] = $file;
				}
			}
		}
		return $out;
	}

}