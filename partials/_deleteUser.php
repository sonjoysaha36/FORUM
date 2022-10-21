<?php


session_start();
require_once("_db.php");
$user_id = $_GET["id"];

$query = "delete from `users` where sno='$user_id'";
$query ="delete from `threads` where thread_user_id='$user_id'";

if($conn->query($query)){
    $value = false;
    header("Location:_handleUser.php?value=true");
} else{
    header("Location:_handleUser.php?value=false");
}