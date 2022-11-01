<?php
    session_start();
    include '../partials/_db.php';
    $id = $_GET['profileid'];
    
    $method = $_SERVER['REQUEST_METHOD'];

    if($method == 'POST'){
        //Insert thread into db
        $name =$_POST['name'];
        $phone = $_POST['number'];
        $address= $_POST['address'];
        $about= $_POST['about'];
       
        print_r($_POST);
        $sql = "UPDATE `user_info`
        SET uname = '$name', uaddress = '$address', uabout = '$about', phone ='$phone'
        WHERE uid = $id";
        $result = mysqli_query($conn, $sql);
        
     
        if($result){

        
        header("Location: ../_userProfile.php?profileid=$id");
        }

    }   

    ?>