<?php 

$apiResponse = file_get_contents('http://localhost/CMS_PHP/API/api/read.php');
$blogPosts = json_decode($apiResponse, true);

if (!is_array($blogPosts)) {
    die("Failed to fetch or decode blog posts.");
}

?>