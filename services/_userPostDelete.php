<?php


session_start();
require_once("../partials/_db.php");
$user_id = $_GET["userid"];
$post_id = $_GET["threadid"];

$query = "UPDATE threads
SET verify = 0 WHERE thread_id = '$post_id'";
// $query2 = "UPDATE threads
// SET verify = 0 WHERE thread_user_id = '$user_id'";
// $query ="delete from `threads` where thread_user_id='$user_id'";
// $query ="delete from `comments` where comment_by='$user_id'";
// $query ="delete from `comment_ratings` where user_id='$user_id'";
// $query ="delete from `user_info` where uid='$user_id'";


if($conn->query($query)){
    // if($conn->query($query2)){
    // $value = false;
    header("Location:/forum/mypost.php?profileid=$user_id&value=true");
} else{
    header("Location:/forum/mypost.php?value=false");
}