<?php 
$pathFile2 = '../public/imgs/';

if($_SERVER['SERVER_NAME'] == 'localhost')
{
	/** database config **/
	define('DBNAME', 'galeria');
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBDRIVER', '');
	
	define('ROOT', 'http://localhost/mvc/public');

}else
{
	/** database config **/
	define('DBNAME', 'galeria');
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBDRIVER', '');
	define('ROOT', 'https://www.yourwebsite.com');

}

define('APP_NAME', "My Webiste");
define('APP_DESC', "Best website on the planet");
define('THIS_ITS_A_WAY', $pathFile2);
define('THIS_TYPE_FiLE', 'png');
define('GLOBAL_NAME_SERVER', $_SERVER['SERVER_NAME']);
define('MYFILESUZE', 10000);

/** true means show errors **/
define('DEBUG', true);

//$useStoragePath = "../public/imgs/";

//$GLOBALS[$useStoragePath];