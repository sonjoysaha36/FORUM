<!doctype html>
<html lang="en">

<head>
    <title>admin Panel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
    .container {
        min-height: 95vh;
    }
    </style>


</head>

<body>
    <?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true || $_SESSION['userrole']!="true"){
  header("location: /forum/index.php");
    exit;
}
 include("../partials/_db.php");

    $sql = "SELECT * FROM `feedback` order by timestamp desc";
    $result = mysqli_query($conn, $sql);
    

 
 ?>
    <?php
include("../partials/_adminNav.php");





?>
  

    <div class="container">
        <table class="table mt-3">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Message</th>
                    <th scope="col">Timestamp</th>

                    
                </tr>
            </thead>
            <tbody>

                <?php while($row = mysqli_fetch_assoc($result)){ ?>

                <tr>
                    <td> <?php echo $row["name"]; ?></td>
                    <td> <?php echo $row["email"]; ?></td>
                    <td> <?php echo $row["message"]; ?></td>
                    <td> <?php echo $row["timestamp"]; ?></td>


                    <!-- <td><a class="btn btn-danger" href="_deletepost.php?id=<?php echo $row["thread_id"]; ?>">Delete</a> -->
                    </td>
                </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>


    <?php include '../partials/_footer.php'; ?>

</body>

</html>