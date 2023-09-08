<?php 

//ALLOW HTTP REQUEST 

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

//Initialize API
include_once('../core/init.php');

//Instantiate class Posts
$post = new Post($db);

//Query blog posts
$result = $post->read();
//Get row count
$num = $result->rowCount();

if($num > 0){
    $post_arr = array();
    $post_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $post_item = array(
            'id' => $id,
            'title' => $title,
            'body' =>$body,
            'author' =>$author,
            'category_id' =>$category_id,
            'category_name' =>$category_name,
        );
        array_push($post_arr['data'], $post_item);
    }
    //push data => convert to json then display
    echo json_encode($post_arr);

}else{
    echo json_encode(array('message' => 'No posts found.'));
}



?>