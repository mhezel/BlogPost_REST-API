<?php 

//ALLOW HTTP REQUEST POST METHOD

// headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


//Initialize API
include_once('../core/init.php');

//Instantiate class Posts
$post = new Post($db);

//Get raw posted data
$data = json_decode(file_get_contents("php://input"));
$post->title = $data->title;
$post->body = $data->body;
$post->author = $data->author;
$post->category_id = $data->category_id;

//Create post

if($post->create()){
    echo json_encode(["message" => "Post Created"]);  //return message if successful
}else{
    echo json_encode(['message' => 'Post not created']);
}

?>