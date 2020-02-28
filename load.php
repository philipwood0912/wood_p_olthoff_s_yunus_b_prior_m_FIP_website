<?php 

    ini_set('display_errors', 1);

    define('ABSPATH', __DIR__);
    define('ADMIN_PATH', ABSPATH.'/admin');
    define('ADMIN_SCRIPTS', ADMIN_PATH.'/scripts');

    session_start();

    require_once ABSPATH.'/config/config.php';
    require_once ADMIN_SCRIPTS.'/functions.php';
    require_once ADMIN_SCRIPTS.'/login.php';
    require_once ADMIN_SCRIPTS.'/change.php';