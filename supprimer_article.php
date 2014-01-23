<?php 
require_once('core/core.php');
$id=(int)var_get('id');
//$chemin = dirname(__FILE__)."/data/images/".$id.".jpg";	
//unlink($chemin);
$delete_sql="DELETE FROM article WHERE Id=$id";
mysql_query($delete_sql);
$_SESSION['article']='supprimé';
//requete_notif($delete_sql,'article','supprimé');
header('location: index.php');exit;