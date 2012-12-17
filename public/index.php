<?php

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));
echo 'test6';
// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));
    echo 'test10';
// Ensure library/ is on include_path
set_include_path(
	implode(
		PATH_SEPARATOR,
		array(
    		realpath(
    			APPLICATION_PATH . '/../library'
    		),
    		get_include_path(),
		)
	)
);
echo 'test23';
/** Zend_Application */
require_once 'Zend/Application.php';
echo 'test26';
// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);
echo 'test32';
$application->bootstrap()
            ->run();
echo 'test35';
?>
