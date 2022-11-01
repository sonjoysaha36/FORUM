<?php
include '_db.php';
if(isset ($_GET['vkey'])){
 $vkey =  $_GET['vkey']; 
//  include '/forum/partials/_db.php';

$sql = "Select * from users where verified = 0 and vkey='$vkey'";
$result = mysqli_query($conn, $sql);
$row2 = mysqli_fetch_assoc($result);
$numRows = mysqli_num_rows($result);
if($numRows == 1){

    $update ="UPDATE users
    SET verified = 1 WHERE vkey = '$vkey'";

// $query = "delete from `users` where sno='$user_id'";
// $query ="delete from `threads` where thread_user_id='$user_id'";

// if($conn->query($query)){
//     $value = false;
//     header("Location:_handleUser.php?value=true");



    if($conn->query($update)){
        $id = $row2['sno'];
        $name = $row2['user_name'];
        $email = $row2['user_email'];
        // echo "Your account has been verified";

        $sql2 = "INSERT INTO `user_info` ( `uid`, `uname`, `uemail`) VALUES ( '$id', '$name ', '$email')";
        $result = mysqli_query($conn, $sql2);


        header("location: /forum/index.php?signupsuccess=true");
            exit(); 
    }
    else{
        header("location: /forum/index.php?signupverify=false");
    }
}
else{
    header("location: /forum/index.php?signupsuccess=false");
}
  
}
else{
    die("something went wrong");
}
?>