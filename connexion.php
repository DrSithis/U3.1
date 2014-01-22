<?php
require_once('core/core.php');
require_once(INC . 'top.php');

$tpl = new Smarty();
$tpl->display('view/connexion.tpl');

//**Start usage connect**//
if(var_post("email") && var_post("mdp")){
    $email = mysql_real_escape_string(var_post('email'));
    $mdp = mysql_real_escape_string(var_post('mdp'));   
    $data_sql = "SELECT id,email FROM utilisateurs WHERE email='".$email."' AND mdp='".$mdp."' ";
    if($data = mysql_fetch_array(mysql_query($data_sql))){
        $sid = md5($data['email'].time());
        $id = $data["id"];
        $sql = "UPDATE utilisateurs SET sid='".$sid."' WHERE id=$id AND email='".$email."'"; 
        if(mysql_query($sql)){setcookie('sid',$sid,time()+3600);$_SESSION['article']= 'co';header('location: index.php');}
    }else{$_SESSION['article']= 'erreur';header('location: index.php');}
}
//**End usage connect**//
require_once(INC . 'bot.php');
    

