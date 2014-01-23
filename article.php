<?php
require_once('core/core.php');
require_once(INC . 'top.php');
$change=0;
$id="";$titlem = "";$contentm = "";$tagm = "";
$namebt = "Ajouter";
//**Start  why Modif**//
if (!empty($_GET['id'])) {
    $id = (int) $_GET['id'];
    $modif_sql = "SELECT article.Id,Titre,Texte,Date,tags.Nom FROM article INNER JOIN `tags` ON `article`.`Tag` = `tags`.`Id` WHERE article.Id=$id";
    $modif = mysql_fetch_array(mysql_query($modif_sql));
    $titlem = $modif['Titre'];
    $contentm = $modif['Texte'];
    $tagm = $modif['Nom'];
    $change = 1;
    $namebt = "Modifier";
}
//**End  why Modif**//
//******************//
//**Start Template**//
$tpl = new Smarty();
$tpl->assign("title",$titlem);
$tpl->assign("content",$contentm);
$tpl->assign("tag",$tagm);
$tpl->assign("id",$id);
$tpl->assign("change",$change);
$tpl->assign("namebt",$namebt);
$tpl->display('view/article.tpl');
//**End Template**//
require_once(INC . 'bot.php');
//**Start Usage Form**//
if (!empty($_POST) && !empty($_POST['bt'])){
    $titre = mysql_real_escape_string(var_post('titre'));
    $content = mysql_real_escape_string(var_post('texte'));
    $tag = var_post('tag');
    
    if (var_post('change') == 1) {
        $id = (int) var_post('id');
        $update_sql = "UPDATE article SET Titre='$titre', Texte='$content' WHERE Id=$id";
        requete_notif($update_sql,'article','modifié');
    } 
    else {
        if ($_FILES['image']['error'] > 0){
            notif('article','Erreur lors du transfert');
            header("Location: index.php");exit;
        }
        $date = mysql_real_escape_string(time());
        //**Start Module Tags**/
        $tag_sql = "SELECT Id FROM tags WHERE Nom = '$tag'";
        $tag_req = mysql_query($tag_sql);
        if(mysql_numrows($tag_req)==1){$idtag=mysql_result($tag_req,0,0);}
        else{ 
           $inserttag_sql="INSERT INTO tags (Nom) VALUES ('$tag')";
           $inserttag=mysql_query($inserttag_sql);
//           $idtag=mysql_insert_id(); //Bug avec l'upload de fichier, bug connu, passage à mysqli pour le regler! https://bugs.php.net/bug.php?id=2742
           $inserttagid_sql="SELECT Id FROM tags WHERE Nom='$tag'";
           $inserttagid=  mysql_query($inserttagid_sql);
           $idtag=mysql_result($inserttagid,0,0);
        }
        $idtag = (int) $idtag;
        //**End Module Tags**/
        $insertarticle_sql = "INSERT INTO article(Titre, Texte, Date, Tag) VALUES('$titre','$content','$date','$idtag')";
        requete_notif($insertarticle_sql,'article','ajouté');
//        $idarticle=  mysql_insert_id();
        //**Start ID Article Insert**/
        $insertarticleid_sql="SELECT Id FROM article WHERE Titre='$titre' AND Texte='$content'";
        $insertarticleid=mysql_query($insertarticleid_sql);
        $idarticle=mysql_result($insertarticleid,0,0);
        //**End ID Article Insert**/
//        echo $insertarticle_sql;br();
        $src = $_FILES["image"]["tmp_name"];
        $dest = DATA . "images/$idarticle.jpg";
//        echo $idarticle;br();echo $src;br();echo $dest;
        move_uploaded_file($src, $dest);
     }    
    header('location: index.php');exit;
}
//**End Usage Form**//
 