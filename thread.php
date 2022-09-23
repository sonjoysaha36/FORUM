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
    }

    ?>


    <div class="container my-4">
        <div class="jumbotron p-5 mb-4 bg-light border rounded-3">
            <h1 class="display-4"><?php echo $title; ?> forums</h1>
            <p class="lead"><?php echo $desc; ?></p>
            <hr class="my-4">
            <p>This is a peer to peer forum for sharing knowledge with each other</p>
            <p>
                <b>Posted by : Sonjoy</b>
            </p>
        </div>
    </div>

    <div class="container">
        <h1 class="py-2">Post a Comment</h1>
        <form action="<?php $_SERVER['REQUEST_URI']?>" method="POST" class="p-2 bg-light ">
            
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Type your comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Post Comment</button>
        </form>
    </div>

    <div class="container" id="ques">
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
        

        echo  '<div class="d-flex">
            <div class="flex-shrink-0">
                <img src="img/user.png" class="rounded-circle" width="60px" alt="Sample Image">
            </div>
            <div class="flex-grow-1 ms-3 my-3">
                
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