<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to iDiscuss</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        #ques{
            min-height: 433px;
        }
    </style>
        <title>Welcome to iDiscuss - Coding Forums</title>
</head>

<body>
    <?php include 'partials/_db.php';?>
    <?php include 'partials/_header.php';?>

    <?php
    $id = $_GET['threadid'];
    

    $sql = "SELECT * FROM `threads` WHERE thread_id=$id";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
    
    $title = $row['thread_title'];
    $desc = $row['thread_desc'];
    $code = $row['source_code'];
    }

    ?>


<?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method == 'POST'){
        //Insert thread into db
        $comment =$_POST['comment'];
        $sno = $_POST['sno'];
       
        $sql = "INSERT INTO `comments` ( `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment', '$id', '$sno', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if($showAlert){
            echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success! </strong> Your comment has been added! 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }

       

    }   
        


    ?>

    <?php
    $id2 = $_GET['threadid2'];
    $sql3 = "SELECT threads.thread_id, threads.thread_title, users.user_name FROM `users` INNER JOIN `threads` ON users.sno = threads.thread_user_id WHERE threads.thread_user_id= $id2" ;
    $result3 = mysqli_query($conn, $sql3);
    $row3 = mysqli_fetch_assoc($result3);
    
    // echo $row3['user_name'];
    ?>

<?php
include 'partials/_viewCode.php';
?>
    <div class="container my-4">
        <div class="jumbotron p-5 mb-4 bg-light border rounded-3">
            <h1 class="display-4"><?php echo $title; ?> forums</h1>
            <p class="lead"><?php echo $desc; ?></p>
            <div>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
  View Source Code
</button>

            </div>
            <hr class="my-4">
            <p>This is a peer to peer forum for sharing knowledge with each other</p>
            <p>
                Posted by : <b><?php echo $row3['user_name']; ?></b>
            </p>
        </div>
    </div>
    
    <?php
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){

    
        echo'<div class="container">
        <h1 class="py-2">Post a Comment</h1>
        <form action="'. $_SERVER['REQUEST_URI'].'" method="POST" class="p-2 bg-light ">
            
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Type your comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                <input type="hidden" name="sno" value="'.$_SESSION['sno'].'">
            </div>
            <button type="submit" class="btn btn-success">Post Comment</button>
        </form>
    </div>';
        }
        else{
            echo'<div class="container">
        <h1 class="py-2">Post a Comment</h1>
        <div class="alert alert-danger" role="alert">
        You are not login. Please login to be able to post comments
        </div>
       
        
        
         </div>';
        }

    ?>
    

    <div class="container mb-5" id="ques">
        <h1 class="py-2">Discussions</h1>
       <?php
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `comments` WHERE thread_id=$id";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while($row = mysqli_fetch_assoc($result)){
        $noResult = false;
        $id = $row['comment_id'];
        $content = $row['comment_content'];
        $comment_time = $row['comment_time'];
        $thread_user_id = $row['comment_by'];
        $sql2 = "SELECT * FROM `users` WHERE sno = '$thread_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        

        echo  '<div class="d-flex mt-1">
            <div class="flex-shrink-0">
                <img src="img/user.png" class="rounded-circle" width="60px" alt="Sample Image">
            </div>
            <div class="flex-grow-1 ms-3 ">
            <p class="fw-bold my-0 fs-5">'.$row2['user_name'].' at <span class="fs-6 fw-light"> '.$comment_time.'</span></p>
                
                '.$content.'
            </div>
        </div>';
        }

        if($noResult==true){
            echo '<div class="jumbotron jumbotron-fluid p-5 mb-4 bg-light border rounded-3">
            <div class="container">
              <p class="display-4">No Threads Found</p>
              <p class="lead">Be the first person to ask a question</p>
            </div>
          </div>';
            }

        ?>

        
        <!-- <div class="d-flex">
            <div class="flex-shrink-0">
                <img src="img/user.png" class="rounded-circle" width="60px" alt="Sample Image">
            </div>
            <div class="flex-grow-1 ms-3">
                <h5>Unable to install Pyaudio <small class="text-muted"></small></h5>
                <p>Excellent feature! I love it. One day I'm definitely going to put this Bootstrap component into use
                    and I'll let you know once I do.</p>
            </div>
        </div> -->

    </div>







    <?php include 'partials/_footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>