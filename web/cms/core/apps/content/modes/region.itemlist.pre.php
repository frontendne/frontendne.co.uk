<?php
    
    $Pages = new PerchContent_Pages;
    $Page = $Pages->find($Region->pageID());

    if (!is_object($Page)) {
        $Page = $Pages->get_mock_shared_page();
    }

    $Form = new PerchForm('add');
    
    if ($Form->posted() && $Form->validate()) {
        $Item = $Region->add_new_item();   
        if (is_object($Item)) {
            PerchUtil::redirect(PERCH_LOGINPATH.'/core/apps/content/edit/?id='.$Region->id().'&itm='.$Item->itemID());
        }
    }

    $items = $Region->get_items_for_editing();

	if (!PerchUtil::count($items)) {
		// No items(!) so add a new one and edit it.
		$Item = $Region->add_new_item();   
        if (is_object($Item)) {
            PerchUtil::redirect(PERCH_LOGINPATH.'/core/apps/content/edit/?id='.$Region->id().'&itm='.$Item->itemID());
        }
	}

    $cols = $Region->get_edit_columns();
