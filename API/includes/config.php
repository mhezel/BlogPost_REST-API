<?php

$db_name = 'restAPI';
$db_user = 'root';
$db_password = '';
$charset = 'utf8';

// Create PDO instance
$db = new PDO('mysql:host=127.0.0.1;dbname='.$db_name.';charset='.$charset, $db_user, $db_password);

//DB ATTRIBUTES
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

define('APP_NAME', 'REST API');
?>