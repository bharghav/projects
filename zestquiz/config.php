<?php
/**
@author Bhargav
@copyright http:www.iwebcreatives.com
 */
ob_start();
session_start();
require_once 'messages.php';

//site specific configuration declartion
define( 'BASE_PATH', 'http://localhost/zestquiz/');
define( 'DB_HOST', 'localhost' );
define( 'DB_USERNAME', 'root');
define( 'DB_PASSWORD', '');
define( 'DB_NAME', 'user-login');

function __autoload($class)
{
	$parts = explode('_', $class);
	$path = implode(DIRECTORY_SEPARATOR,$parts);
	require_once $path . '.php';
}
