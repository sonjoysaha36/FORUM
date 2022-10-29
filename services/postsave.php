<?php
    session_start();
    include '../partials/_db.php';
    
    $method = $_SERVER['REQUEST_METHOD'];

    if($method == 'POST' && !empty($_POST)){
        //Insert thread into db
        $comment =$_POST['comment'];
        $sno = $_POST['sno'];
        $thread_id= $_POST['thread_id'];
       
        print_r($_POST);
        $sql = "INSERT INTO `comments` ( `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment', '$thread_id', '$sno', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
     
        $_SESSION['show_alert'] = true;
        unset($_POST);
        header("Location: ../thread.php?threadid=".$thread_id);

    }   

    ?>