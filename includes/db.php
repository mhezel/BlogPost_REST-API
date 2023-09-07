
<?php

/** @const SERVER */
/** @const USERNAME */
/** @const PASSWORD */
/** @const _DB */

$db['server'] = 'localhost';
$db['username'] = 'root';
$db['password'] = '';
$db['_db'] = 'cms';

foreach($db as $key => $value) {
    define(strtoupper($key), $value); 
}
$conn = mysqli_connect(SERVER,USERNAME,PASSWORD,_DB);

if($conn){
    echo "Connection Success";
}

?>