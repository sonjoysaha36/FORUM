<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to iDiscuss</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
    #ques {
        min-height: 433px;
    }
    </style>
    <title>Welcome to iDiscuss - Coding Forums</title>
</head>

<body>
    <?php include 'partials/_db.php';?>
    <?php include 'partials/_header.php';?>

    <?php
    $id = $_GET['catid'];

    $sql = "SELECT * FROM `categories` WHERE category_id=$id";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
    $catname = $row['category_name'];
    $catdesc = $row['category_description'];
    }

    ?>

    <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method == 'POST'){
        //Insert thread into db
        $th_title =$_POST['title'];
        $th_desc =$_POST['desc'];
        $sno = $_POST['sno'];
        $code = $_POST['code'];
        $sql = "INSERT INTO `threads` ( `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`,`source_code`,`verify`) VALUES ( '$th_title', '$th_desc ', '$id', '$sno', current_timestamp(),'$code','1')";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if($showAlert){
            echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success! </strong> Your thread has been added! Please wait for community to respond
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
    }
    ?>


    <div class="container my-4">
        <div class="jumbotron p-5 mb-4 bg-light border rounded-3">
            <h1 class="display-4">Welcome to <?php echo $catname; ?> forums</h1>
            <p class="lead"><?php echo $catdesc; ?></p>
            <hr class="my-4">
            <p>This is a peer to peer forum for sharing knowledge with each other</p>
            <p class="lead">
                <a class="btn btn-success btn-lg" href="about.php" role="button">Learn more</a>
            </p>
        </div>
    </div>
    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    echo '<div class="container">
        <h1 class="py-2">Start a Discussion</h1>
        <form action="'. $_SERVER['REQUEST_URI'].'" method="POST" class="p-2 bg-light border rounded-3">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Problem Title</label>
                <input type="text" class="form-control" id="title" name="title">
                <small class="form-text text-muted">Keep your title short and crisp as possible</small>
            </div>
            <input type="hidden" name="sno" value="'.$_SESSION['sno'].'">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Ellaborate Your Concern</label>
                <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Your Code</label>
                <textarea class="form-control" id="code" name="code" rows="3"></textarea>
            </div>';?>
            <script src="/forum/ckeditor/ckeditor.js"></script>
      <script>
        CKEDITOR.replace('code');
      </script>
            <?php echo '<button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>';
    }
    else{
        echo'<div class="container">
        <h1 class="py-2">Start a Discussion</h1>
        <div class="alert alert-primary" role="alert">
        You are not login. Please login to be able to start a Discussion
        </div>
       
        
        
         </div>';
    }
    ?>


    <div class="container" id="ques">
        <h1 class="py-2">Browse Questions</h1>
        <?php
    $id = $_GET['catid'];
    $noResult = true;
    $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id && verify=1 order by timestamp desc";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
    $noResult = false;
    $title = $row['thread_title'];
    $desc = $row['thread_desc'];
    $id = $row['thread_id'];
    $thread_time = $row['timestamp'];
    $thread_user_id = $row['thread_user_id'];
    $sql2 = "SELECT * FROM `users` WHERE sno = '$thread_user_id'";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($result2);
    $sno = $row2['sno'];
    
    
    
    
      echo  '<div class="d-flex">
            <div class="flex-shrink-0">
                <img src="img/user.png" class="rounded-circle" width="60px" alt="Sample Image">
            </div>
            <div class="flex-grow-1 ms-3">
            
                <h5><a href="thread.php?threadid='. $id .'&threadid2='.$sno.'" class="text-dark text-decoration-none">'.$title.'</a><small class="text-muted"></small></h5>
                <p>'.$desc.'</p>
            </div>'.'<p class="fw-bold my-0 fs-6">'.$row2['user_name'].' at <span class="fs-6 fw-light"> '.$thread_time.'</span></p>
            
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