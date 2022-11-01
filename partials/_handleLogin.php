<?php
$showError = "false";
$check = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_db.php';
    $email = $_POST['loginEmail'];
    $pass = $_POST['loginPass'];
    // $role =$_POST['loginRole'];

    $sql = "Select * from users where user_email='$email'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if($numRows == 1){
        $row = mysqli_fetch_assoc($result);
        $uname = $row['user_name'];
        
        
        $row['user_name'] == $uname;
        $role = $row['user_role'];
        if($row['user_role']== 2 ){
        //     $check = "true";
        $check = "true";
        
      

        }
       
     
        
        
           if(password_verify($pass, $row['user_pass']) && $row['verified']==1){
            
            
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['sno'] = $row['sno'];
            $_SESSION['useremail'] = $email;
            $_SESSION['userrole'] = $check;
            $_SESSION['username'] = $uname;
            $_SESSION['role'] = $role;
            // echo "logged id" .$email;
            header("location: /forum/index.php");
            exit();
           }
           else{
            header("location: /forum/index.php?loginsuccess=false");
               
           } 
        
    }
    else{
    header("location: /forum/index.php?loginsuccess=false");
    }
}


?>