<?php
$id = $_GET['threadid'];
$comid = $_GET['commentid'];

session_start();
require_once("_db.php");


$query = "UPDATE comments
SET verify = 0 WHERE comment_id = '$comid'";
// $query2 = "UPDATE threads
// SET verify = 0 WHERE thread_user_id = '$user_id'";
// $query ="delete from `threads` where thread_user_id='$user_id'";
// $query ="delete from `comments` where comment_by='$user_id'";
// $query ="delete from `comment_ratings` where user_id='$user_id'";
// $query ="delete from `user_info` where uid='$user_id'";


if($conn->query($query)){
    // if($conn->query($query2)){
    // $value = false;
    header("Location:/forum/thread.php?threadid=$id");
} else{
    header("Location:/forum/thread.php?value=false");
}
?>