<?php
    header('Content-Type: application/json');
    $FieldTag = new PerchXMLTag('<perch:content id="file" type="image" disable-asset-panel="true" detect-type="true" />');
    $FieldTag->set('input_id', 'file');

    if (isset($_POST['bucket']) && !empty($_POST['bucket'])) {
        $FieldTag->set('bucket', $_POST['bucket']);
    }

    if (!$CurrentUser->has_priv('assets.create')) {
        die();
    }

    $Assets  = new PerchAssets_Assets;

    $message = false;
    
    $assetID = false;
    $Asset = false;
           
    $Form = new PerchForm('edit');
    
    if (PerchUtil::count($_FILES)) {
    
        //PerchUtil::debug($_FILES);

        $Resources = new PerchResources;

		$data = array();
        $FieldType = PerchFieldTypes::get($FieldTag->type(), $Form, $FieldTag);
        $var       = $FieldType->get_raw();

        if (PerchUtil::count($var)) {
            
            $ids     = $Resources->get_logged_ids();
            $assetID = $ids[0];
            $Asset   = $Assets->find($assetID);
            $Asset->reindex();

            //PerchUtil::debug($ids);

            if (PerchUtil::count($ids)) {

                if (!PerchSession::is_set('resourceIDs')) {
                    $logged_ids = array();
                    PerchSession::set('resourceIDs', $logged_ids);
                }else{
                    $logged_ids = PerchSession::get('resourceIDs');
                }

                foreach($ids as $assetID) {
                    if (!in_array($assetID, $logged_ids)) {
                        $logged_ids[] = $assetID;
                    }
                }
                PerchSession::set('resourceIDs', $logged_ids);
            }
            $type = $Asset->get_type();
            if ($type=='image') $type = 'img';
            echo json_encode(array('type'=>$type));
            
        }
   		$Alert->set('success', PerchLang::get('Successfully updated'));
    }

  	
