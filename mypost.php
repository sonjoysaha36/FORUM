<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="/forum/partials/desing.css">
    <style>
    #maincontainer {
        min-height: 98vh;
    }
    </style>
    <title>profile</title>
</head>

<body>
    <?php
$id = $_GET['profileid'];
include "partials/_db.php";


?>
    <?php include 'partials/_header.php' ?>
    <?php

if(isset($_GET['value']) && $_GET['value']=="true")
{
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> Successfully Remove Post .
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

}

if(isset($_GET['value']) && $_GET['value']=="false")
{
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>error!</strong> Please try again.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

}
    ?>


    <?php
    $sql = "SELECT categories.category_id,categories.category_name, threads.thread_id, threads.thread_title, threads.thread_desc, threads.timestamp, threads.thread_cat_id
    FROM threads
    INNER JOIN categories ON threads.thread_cat_id = categories.category_id
    WHERE thread_user_id=$id && verify='1'";

    // $sql = "SELECT * FROM `threads` where thread_user_id=$id && verify='1'";
    $result = mysqli_query($conn, $sql);
    ?>









    <div class="container" id="maincontainer">
        <table class="table mt-3">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Thread_cat</th>
                    <th scope="col">Title</th>
                    <th scope="col">description</th>
                    <th scope="col">timestamp</th>

                    <!-- <th scope="col text-center" colspan="2">Go To Post</th>
                </tr>
                <th scope="col text-center" colspan="2">Delete Post</th>
                </tr> -->
            </thead>
            <tbody>

                <?php while($row = mysqli_fetch_assoc($result)){ ?>

                <tr>
                    <td> <?php echo $row["category_name"]; ?></td>
                    <td> <?php echo $row["thread_title"]; ?></td>
                    <td> <?php echo $row["thread_desc"]; ?></td>
                    <td> <?php echo $row["timestamp"]; ?></td>


                    <td><a class="btn btn-success"
                            href="/forum/thread.php?threadid=<?php echo $row["thread_id"]; ?>">Go</a></td>
                            <?php if(isset($_SESSION['loggedin']) && ($_SESSION['loggedin']==true) && ($_SESSION['sno'] == $id))
                    echo'
                    <div>
                    
                    <td><a class="btn btn-danger"
                            href="/forum/services/_userPostDelete.php?threadid='.$row["thread_id"].'&userid='.$id.'">Delete</a>
                    </td>

                </div>';?>
                    <!-- <td><a class="btn btn-danger"
                            href="/forum/services/_userPostDelete.php?threadid=<?php echo $row["thread_id"]; ?>&userid=<?php echo $id;?>">Delete</a>
                    </td> -->
                </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>



    <?php include 'partials/_footer.php' ?>


</body>

</html>