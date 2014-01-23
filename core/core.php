<?php
//phpinfo();
session_start();

define('ROOT_PATH', dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR);
define('CORE', ROOT_PATH . 'core/');
define('ASSETS', ROOT_PATH . 'assets/');
define('PLUGINS', ASSETS . 'plugins/');
define('VIEW', ROOT_PATH . 'view/');
define('INC', CORE . 'include/');
define('DB', CORE . 'db/');
define('FUNC', CORE . 'function/');
define('DATA', ROOT_PATH .'data/');

require_once( DB . 'connect_mysql.php');
//require_once( DB . 'connect_pdo.php');
require_once( FUNC . 'function.php');

require_once(ROOT_PATH . "tpl/Smarty.class.php");

$connect=FALSE;
if(isset($_COOKIE['sid'])){
    $sid = $_COOKIE['sid'];
    $sid_sql= mysql_query("SELECT * FROM utilisateurs WHERE sid= '$sid'");
    if($infoconnect = mysql_fetch_array($sid_sql)){$connect=TRUE; $email=$infoconnect['email'];}
}