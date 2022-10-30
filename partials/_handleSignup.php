<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


$showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_db.php';
    $user_email = $_POST['signupEmail'];
    $user_name = $_POST['name'];
    $pass = $_POST['signupPassword'];
    $cpass = $_POST['signupcPassword'];

    $vkey = md5(time().$user_name);

    $existSql = "select * from `users` where user_email = '$user_email' and verified = 1";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    
    if($numRows>0){
        
        $showError = "Email already in use";
        header("location: /forum/index.php?signupsuccess=false");
    }
    else{
        if($pass ==$cpass){

        
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users` ( `user_email`, `user_name`, `user_pass`, `user_role`, `timestamp`, `vkey`, `verified`) VALUES ('$user_email','$user_name', '$hash','1', current_timestamp(),'$vkey','0')";
        $result = mysqli_query($conn, $sql);
        if($result){
            // $showAlert = true;
            // header("location: /forum/index.php?signupsuccess=true");
            // exit(); 




            

            require 'PHPMailer/src/Exception.php';
            require 'PHPMailer/src/PHPMailer.php';
            require 'PHPMailer/src/SMTP.php';

            $message ="<a href='http://localhost/forum/partials/verify.php?vkey=$vkey'>Register Account</a>";


$mail = new PHPMailer(true);

try {
                          //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'taptobuy121@gmail.com';                     //SMTP username
    $mail->Password   = 'gaaajbpalbqtilqz';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('taptobuy121@gmail.com', 'iDiscuss');
    $mail->addAddress($user_email, 'Joe User');     //Add a recipient
    

    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'Name: '.$user_name.' Verify :'.$message;
    
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    // echo 'Message has been sent';
    header("location: /forum/index.php?signupverify=true");

} catch (Exception $e) {
    header("location: /forum/index.php?signupverify=false");
}

            // $to = $user_email;
            // $subject ="Email Verification";
            // $message ="<a href='http://localhost/forum/services/verify.php?vkey=$vkey'>Register Account</a>";
            // $headers ="From: sonjoysaha36@gmail.com \r\n";
            // $headers = "MIME-Version: 1.0" . "\r\n";
            // $headers .= "COntent-type:text/html;charset=UTF-8" . "\r\n";
            // mail($to,$subject,$message,$headers);
            // header('location:thankyou.php');
        }
        }
        else{
            $showError = "Password do not match";
            header("location: /forum/index.php?signuperror=true");
            

            
        }

    }
    // header("location: /forum/index.php?signupsuccess=false&error=$showError");
    
}
?>