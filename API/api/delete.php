<?php 

//ALLOW HTTP REQUEST POST METHOD

// headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

//Initialize API
include_once('../core/init.php');

//Instantiate class Posts
$post = new Post($db);

//Get raw posted data
$data = json_decode(file_get_contents("php://input"));
$post->id = $data->id;

//Delete post
if($post->delete()){
    echo json_encode(["message" => "Post Deleted"]);  //return message if successful
}else{
    echo json_encode(['message' => 'Post not deleted']);
}

?>