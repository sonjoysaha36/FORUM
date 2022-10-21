<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_db.php';
    $user_email = $_POST['email'];
    $user_name = $_POST['name'];
    $message = $_POST['message'];
    


        $sql = "INSERT INTO `feedback` ( `name`, `email`, `message`, `timestamp`) VALUES ('$user_name','$user_email', '$message', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        if($result){
            
            header("location: /forum/index.php?feedback=true");
            exit();        
        }
       

    
    // header("location: /forum/index.php?signupsuccess=false&error=$showError");
    
}
?>