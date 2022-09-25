<?php
$showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_db.php';
    $user_email = $_POST['signupEmail'];
    $user_name = $_POST['name'];
    $pass = $_POST['signupPassword'];
    $cpass = $_POST['signupcPassword'];

    $existSql = "select * from `users` where user_email = '$user_email'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    if($numRows>0){
        $showError = "Email already in use";
        header("location: /forum/index.php?signupsuccess=false");
    }
    else{
        if($pass ==$cpass){

        
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users` ( `user_email`, `user_name`, `user_pass`, `user_role`, `timestamp`) VALUES ('$user_email','$user_name', '$hash','1', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        if($result){
            $showAlert = true;
            header("location: /forum/index.php?signupsuccess=true");
            exit();        }
        }
        else{
            $showError = "Password do not match";
            header("location: /forum/index.php?signuperror=true");
            

            
        }

    }
    // header("location: /forum/index.php?signupsuccess=false&error=$showError");
    
}
?>