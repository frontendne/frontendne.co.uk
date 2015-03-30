<?php

class PerchRunway
{
    static protected $instance;

    private $RoutedPage;

    function __construct()
    {
    }
    
    public static function fetch()
	{	    
        if (!isset(self::$instance)) {
            $c = __CLASS__;
            self::$instance = new $c;
        }

        return self::$instance;
	}

    public function find_collections_for_app_menu()
    {
        $sql = 'SELECT collectionID, collectionKey FROM '.PERCH_DB_PREFIX.'collections WHERE collectionInAppMenu=1 ORDER BY collectionOrder ASC';
        $db = PerchDB::fetch();
        $rows = $db->get_rows($sql);

        if (PerchUtil::count($rows)) {
            $Perch = Perch::fetch();
            foreach($rows as $row) {
                $Perch->register_collection_as_app($row['collectionKey'], $row['collectionID']);
            }
        }

        return false;
    }

    public function set_page(PerchRoutedPage $RoutedPage)
    {
        $this->RoutedPage = $RoutedPage;
    }

    public function get_page($request_uri=false)
    {
        $RoutedPage = $this->RoutedPage;
        if ($RoutedPage) {

            if ($request_uri && $RoutedPage->query) {
                return $RoutedPage->request_uri.'?'.$RoutedPage->query;
            }

            return $RoutedPage->request_uri;

        }

        return false;
    }
}