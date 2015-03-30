<?php
    function perch_autoload($class_name) 
    {
        if (strpos($class_name, 'PerchAPI')!==false) {
            $file = PERCH_CORE.'/lib/api/'.$class_name.'.class.php';
        }else{
            $file = PERCH_CORE.'/lib/'.$class_name.'.class.php';
        }
        
        if (file_exists($file)) {
            include $file;
            return true;
        }
        return false;
    }
    
    spl_autoload_register('perch_autoload');
        
    if (get_magic_quotes_runtime()) set_magic_quotes_runtime(false);
    
    if (extension_loaded('mbstring')) mb_internal_encoding('UTF-8');

    if (defined('PERCH_TZ')) {
        date_default_timezone_set(PERCH_TZ);
    }else{
        date_default_timezone_set('UTC');
    }

    $perch_key = PERCH_LICENSE_KEY;
    if ($perch_key[0]=='R') {
        define('PERCH_RUNWAY', true);
    }else{
        define('PERCH_RUNWAY', false);
    }

    // Essentials used on every request - no point autoloading
    include(PERCH_CORE.'/lib/PerchDB.class.php');
    include(PERCH_CORE.'/lib/PerchDB_MySQL.class.php');
    include(PERCH_CORE.'/lib/PerchUtil.class.php');
    include(PERCH_CORE.'/lib/Perch.class.php');
    include(PERCH_CORE.'/lib/PerchFactory.class.php');
    include(PERCH_CORE.'/lib/PerchBase.class.php');
    include(PERCH_CORE.'/lib/PerchSystem.class.php');
    include(PERCH_CORE.'/lib/PerchTemplate.class.php');
    include(PERCH_CORE.'/lib/PerchFieldType.class.php');
    include(PERCH_CORE.'/lib/PerchFieldTypes.class.php');
    include(PERCH_CORE.'/lib/PerchXMLTag.class.php');
    include(PERCH_CORE.'/lib/PerchResourceBuckets.class.php');
    include(PERCH_CORE.'/lib/PerchResourceBucket.class.php');

    if (PERCH_RUNWAY) include(PERCH_CORE.'/runway/runtime.php');
