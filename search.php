<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to iDiscuss</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <style>
            #maincontainer{
                min-height: 90vh;
            }
            .container p{
                text-align: justify;
            }
        </style>
</head>

<body>
    <?php include 'partials/_header.php' ?>
    <?php include 'partials/_db.php' ?>

    

    

    <!-- search result -->
    <div class="container my-3" id="maincontainer">
            <h1>Search result for <em> "<?php echo $_GET['search'] ?>"</em></h1>

            <?php
            $noresults = true;
        $query = $_GET['search'];

        $sql = "SELECT * FROM threads WHERE MATCH (thread_title, thread_desc) against ('$query')";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){

        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
        $thread_id = $row['thread_id'];
        $thread_user_id = $row['thread_user_id'];
        $noresults = false;
        

        
        $sql3 = "SELECT threads.thread_id, threads.thread_title,threads.thread_user_id, users.user_name FROM `users` INNER JOIN `threads` ON users.sno = threads.thread_user_id" ;
        $result3 = mysqli_query($conn, $sql3);
        $row3 = mysqli_fetch_assoc($result3);
        $threadid = $row3['thread_user_id'];
        
        

        
        

        echo '<div class="result mt-3">
        <h3><a href="thread.php?threadid='. $thread_id .'&threadid2='.$threadid.'" class="text-dark text-decoration-none"> '.$title.'</a></h3>
        <p>'.$desc.'</p>
        
    </div>';
        }
        if($noresults){
            echo '<div class="jumbotron jumbotron-fluid p-5 mb-4 bg-light border rounded-3">
            <div class="container">
              <p class="display-4">No results Found</p>
              <p class="lead">Suggestions:
              <ul>
              <li>Make sure that all words are spelled correctly.</li>
              <li>Try different keywords.</li>
              <li>Try more general keywords.</li>
              <li>Try fewer keywords.</li></ul></p>
            </div>
          </div>';
        }


?>
        
    </div>

    


    <?php include 'partials/_footer.php' ?>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>