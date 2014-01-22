<?php

function var_get($label) {return(isset($_GET[$label])) ? $_GET[$label] : false;}
function var_post($label) {return(isset($_POST[$label])) ? $_POST[$label] : false;}

function requete_notif($req, $varnotif, $valnotif) {
    if (mysql_query($req)){$SESSION[$valnotif] = $valnotif;}
    else{$SESSION[$varnotif] = 'erreur';}
}

function br(){echo '<br>';}