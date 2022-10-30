<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to iDiscuss</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
    $id = $_GET['threadid'];
    
    $sql = "SELECT t.thread_title as title, t.thread_desc as description, t.source_code as code, u.user_name as username  FROM threads as t inner join users as u on t.thread_user_id = u.sno WHERE t.thread_id=$id";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
    
    $title = $row['title'];
    $desc = $row['description'];
    $code = $row['code'];
    $username= $row['username'];
    }

    ?>



    <?php
include 'partials/_viewCode.php';
?>
    <div class="container my-4">
        <?php 
if(isset($_SESSION['show_alert']) && $_SESSION['show_alert']){
    echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success! </strong> Your comment has been added! 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
$_SESSION['show_alert'] = false;
}?>

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
                Posted by : <b><?php echo $username; ?></b>
            </p>
        </div>
    </div>

    <?php
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){

    
        echo'<div class="container">
        <h1 class="py-2">Post a Comment</h1>
        <form action="./services/postsave.php" method="POST" class="p-2 bg-light ">
            
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Type your comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                <input type="hidden" name="sno" value="'.$_SESSION['sno'].'">
                <input type="hidden" name="thread_id" value="'.$_GET['threadid'].'">';?>

    <script src="/forum/ckeditor/ckeditor.js"></script>
    <script>
    CKEDITOR.replace('comment');
    </script>
    <?php echo ' </div>
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
        $post_id = $_GET['threadid'];
        $sql = "SELECT c.* , count(r.comment_id) as ratings_count from comments as  c left join comment_ratings as r on c.comment_id = r.comment_id where c.thread_id=$post_id  GROUP by  c.comment_id order by ratings_count desc";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while($row = mysqli_fetch_assoc($result)){
        $noResult = false;
        $comment_id = $row['comment_id'];
        $content = $row['comment_content'];
        $comment_time = $row['comment_time'];
        $thread_user_id = $row['comment_by'];
        $ratings_count = $row['ratings_count'];
        $sql2 = "SELECT * FROM `users` WHERE sno = '$thread_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
    
        

        echo  '<div class="d-flex mt-1">
            <div class="flex-shrink-0">
                <img src="img/user.png" class="rounded-circle" width="60px" alt="Sample Image">
            </div>
            <div class="flex-grow-1 ms-3 ">
            <p class="fw-bold my-0 fs-5">'.$row2['user_name'].' at <span class="fs-6 fw-light"> '.$comment_time.'
            </span><span class="badge bg-primary" id='."ratings_id_".$row['comment_id'].'>'.($ratings_count? $ratings_count:0).'</span>'.(isset($_SESSION['loggedin']) && ($_SESSION['loggedin']==true)?'<button class="btn" onClick="save('.$row['comment_id'].','.$post_id.','.$_SESSION['sno'].','.$row['comment_id'].')"><i class="fa fa-thumbs-up m-2" aria-hidden="true""></i></button>':"").'</p>
                
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


    <script>
    function save(comment_id, post_id, user_id, ratings_ubq_id) {
        const ratings_id = document.getElementById(`ratings_id_${ratings_ubq_id}`);

        $.ajax({
            type: "POST",
            url: 'ratings.php',
            data: {
                post_id,
                comment_id,
                user_id // snake case
            },
            success: function(response) {
                if (response.success) {
                    ratings_id.innerText = response.ratings_count;
                }

            }
        });

    }
    </script>
</body>

</html>