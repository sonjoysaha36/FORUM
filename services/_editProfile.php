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

         $image_name="";

        if( $_FILES["profile_pic"]['name'] && getimagesize($_FILES["profile_pic"]["tmp_name"])){
            $image_name= time()."_".$_FILES['profile_pic']['name'];

            $target_folder= '../images/'.$image_name;
    
            $tmp_name= $_FILES['profile_pic']['tmp_name'];

            move_uploaded_file($tmp_name, $target_folder);
    
        }else{
            $image_name= $_POST['prev_profile_image'];
        }

    
      
        $sql = "UPDATE `user_info`
        SET uname = '$name', uaddress = '$address', uabout = '$about', phone ='$phone', profile_pic='$image_name' WHERE uid = $id";
        
        // print_r($sql);
        $result = mysqli_query($conn, $sql);
     
        header("Location: ../_userProfile.php?profileid=$id");
      
     
    }   

    ?>