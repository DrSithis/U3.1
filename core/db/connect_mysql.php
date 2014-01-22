<?php

static $config = NULL;
$config = require_once ('config.php');

mysql_connect(
        $config['global']['database']['options']['hostname'], 
        $config['global']['database']['options']['username'], 
        $config['global']['database']['options']['password']
        );

mysql_select_db($config['global']['database']['options']['database'])


?>
