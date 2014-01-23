<?php
require_once('core/core.php');
require_once(INC . 'top.php');
$tpl = new Smarty();
$tpl->assign("connexion",$connect);
//**Start Pagination**//
$page = (var_get('p')) ? var_get('p') : 1;
$app = 2; //numbers_articles of display in page
$count_sql = mysql_query("SELECT COUNT(*) AS total FROM article");
$count = mysql_fetch_array($count_sql);
$nb_page = ($page > 0) ? ceil($count['total'] / $app) : 1;

$tpl->assign('to',1);
$tpl->assign('page', $page);
$tpl->assign('nbpage',$nb_page);
$tpl->assign('minuspage','index.php?p='.($page - 1));
$tpl->assign('somepage','index.php?p='.($page + 1));
//**End Pagination**//
//*****************//
//**Start Search**//
$start = round(($app*$page)-$app);
$search = mysql_real_escape_string(var_get('r'));
if(!empty($search)){    
    $data_sql = mysql_query("SELECT * FROM article  WHERE Titre LIKE '%$search%' ORDER BY date DESC");
    $count_sql=mysql_query("SELECT COUNT(*) AS total FROM article  WHERE Titre LIKE '%$search%'");
    $count= mysql_fetch_array($a);
    if ($count['total'] != 0) {
        $s = $count['total'] != 1 ? 's' : '';
        echo '<h2 style="margin-left: 30%;> Resultat' . $s . ' de la Recherche </h2><hr style="height:7px;background-color: rgb(69, 81, 95);">';
    } else {
        echo '<h2 style="margin-left: 30%;> Aucun Resultat </h2>';
    }
}
//**End Search**//
//*****************//
//**Start Data Article**//
else{
    $data_sql = mysql_query("SELECT article.Id,Titre,Texte,Date,tags.Nom FROM article "
                          . "INNER JOIN `tags` ON `article`.`Tag` = `tags`.`Id`"
                          . "ORDER BY date DESC LIMIT ". $start .",". $app ."; ");
    echo '<h2 style="margin-left: 30%;">Derniers articles</h2><hr style="height:7px;background-color: rgb(69, 81, 95);">';
}
$data_list = array();
$i = 0;
while($data=mysql_fetch_array($data_sql)){
    $data_list[$i]['Image'] = (file_exists(dirname(__FILE__)."/data/images/".$data['Id'].".jpg")) ? "./data/images/".$data['Id'].".jpg" : false;
//    if(file_exists(DATA . 'images/'.$data['id'].'.jpg')){$data_list[$i]['Image'] = DATA . 'images/'.$data['id'].'.jpg';}
    $data_list[$i]['Titre'] = $data['Titre'];
    $data_list[$i]['Id'] = $data['Id'];
    $data_list[$i]['Texte'] = $data['Texte'];
    $data_list[$i]['Date'] = $data['Date'];
    $data_list[$i]['Nom'] = $data['Nom'];
    $i++;
}		
$tpl->assign('data', $data_list);
//**End Data Article**//
//********************//
$tpl->display('view/index.tpl'); //Display template
require_once(INC . 'bot.php');

