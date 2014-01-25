<?php 
require_once('core/core.php');
$id=(int)var_get('id');
$chemin = dirname(__FILE__)."/data/images/".$id.".jpg";	
unlink($chemin);
/**Gerant les relations avec la bdd, les tags sont 
 * gérée en cascades quand l'article est supprimé, 
 * donc si le tag n'est associée à aucun autre article 
 * alors il est supprimé!**/
$delete_sql="DELETE FROM article WHERE Id=$id";
requete_notif($delete_sql,'article','supprimé');
header('location: index.php');exit;