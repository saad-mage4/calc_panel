<?php
// Site URL
$host = $_SERVER['HTTP_HOST'];
if ($host == 'localhost') {
    $dirPath = 'calc_panel/';
    $url = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://".$host."/".$dirPath;
    // Database Credentials LOCAL
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PWD', 'admin123');
    define('DB', 'pet');
} else {
    $dirPath = '/';
    $url = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://".$host."/".$dirPath;
    // Database Credentials LIVE
    define('HOST', 'localhost');
    define('USER', 'mage4dev_panel');
    define('PWD', 'K}Ezr%dA@Rc5');
    define('DB', 'mage4dev_panel');
}

// Global Usage Variables
define('site_url', $url);
define('website_title', 'Calculator App');
