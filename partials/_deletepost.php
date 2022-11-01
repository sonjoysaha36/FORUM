<?php


session_start();
require_once("_db.php");
$user_id = $_GET["id"];

$query = "UPDATE threads
SET verify = 0 WHERE thread_id = '$user_id'";
// $query2 = "UPDATE threads
// SET verify = 0 WHERE thread_user_id = '$user_id'";
// $query ="delete from `threads` where thread_user_id='$user_id'";
// $query ="delete from `comments` where comment_by='$user_id'";
// $query ="delete from `comment_ratings` where user_id='$user_id'";
// $query ="delete from `user_info` where uid='$user_id'";


if($conn->query($query)){
    // if($conn->query($query2)){
    // $value = false;
    header("Location:_postHandle.php?value=true");
} else{
    header("Location:_postHandle.php?value=false");
}