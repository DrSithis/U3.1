<?php

function var_get($label) {return(isset($_GET[$label])) ? $_GET[$label] : false;}
function var_post($label) {return(isset($_POST[$label])) ? $_POST[$label] : false;}

function requete_notif($req, $varnotif, $valnotif) {
    if (mysql_query($req)){notif($varnotif, $valnotif);}
    else{notif($varnotif, 'erreur');}
}

function notif($varnotif, $valnotif){$SESSION[$varnotif]=$valnotif;}

function br(){echo '<br>';}