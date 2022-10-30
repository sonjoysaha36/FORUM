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
    <title>profile</title>
</head>

<body>
<?php
$id = $_GET['profileid'];
include "partials/_db.php";
$sql = "SELECT * FROM `users` WHERE sno=$id";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
    $uname = $row['user_name'];
    $uemail = $row['user_email'];
    }


?>
    <?php include 'partials/_header.php' ?>


    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php
                echo
                '<div class="profile-links">
                    <img src="ppp.png" alt="" height="150px" weight="100px">
                    <li><a href="#">Home</a> </li>
                    <!-- <li><a href="#">About</a> </li> -->
                    
                    <li><a href="#">01122334</a> </li>
                    <li><a href="#">Dhaka,Bangladesh</a> </li>
                    <li><a href="/forum/myPost.php?profileid='.$_SESSION['sno'].'">My Post</a> </li>


                </div>';
                ?>
            </div>
            <div class="col-md-6">
                <div class="mt-custum">


                    <div class="details">
                        <div class="row">
                            <div class="col-8">
                                Name
                            </div>
                            <div class="col-4">
                                <?php echo $uname; ?>
                            </div>
                        </div>
                    </div>


                    <div class="details">
                        <div class="row">
                            <div class="col-8">
                                Email
                            </div>
                            <div class="col-4">
                                <?php echo $uemail; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <h2 class="mt-5">About me</h2>
                <p class="text-justify">
                    
                </p>
            </div>
        </div>
    </div>
    <?php include 'partials/_footer.php' ?>
</body>

</html>