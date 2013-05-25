<?php
require '../config/config.php';

// Create application, bootstrap, and run
$application = new Zend_Application(APPLICATION_PROCEDURE, '../config/application.ini');
$application->bootstrap()->run();
