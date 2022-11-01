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
$sql = "SELECT * FROM `users` WHERE sno=$id";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
    $uname = $row['user_name'];
    $uemail = $row['user_email'];
    }
    $sql2 = "SELECT * FROM `user_info` WHERE uid=$id";
    $result2 = mysqli_query($conn, $sql2);
    while($row2 = mysqli_fetch_assoc($result2)){
    $uaddress = $row2['uaddress'];
    $uphone = $row2['phone'];
    $uabout = $row2['uabout'];
    $fname = $row2['uname'];

    
    }

?>
    <?php include 'partials/_header.php' ?>


    <div class="container" id="maincontainer">
        <div class="row">
            <div class="col-md-6">
                <?php
                echo
                '<div class="profile-links">
                    <img src="ppp.png" alt="" height="150px" weight="100px">
                    <li><a href="#">Home</a> </li>
                    <!-- <li><a href="#">About</a> </li> -->
                    
                    <li><a href="#">'.$uemail.'</a> </li>
                    <li><a href="#">'.$uaddress.'</a> </li>
                    <li><a class="btn btn-outline-success" href="/forum/myPost.php?profileid='.$_SESSION['sno'].'">My Post</a> </li>
                    
                    <button class="btn btn-outline-success"  data-bs-toggle="modal" data-bs-target="#editmodal">Edit</button>


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
                                <?php echo $fname; ?>
                            </div>
                        </div>
                    </div>


                    <div class="details">
                        <div class="row">
                            <div class="col-8">
                                Phone
                            </div>
                            <div class="col-4">
                                <?php echo $uphone; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <h2 class="mt-5">About Me</h2>
                <p class="text-justify">
                    <?php echo $uabout; ?>
                </p>
            </div>
        </div>
    </div>
    <?php include 'partials/_footer.php' ?>

    <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Edit Your Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?php echo '<form action="/forum/services/_editProfile.php?profileid='.$_SESSION['sno'].'" method="POST">' ?>
                    <div class="modal-body">
                        <div class="row mt-2">
                            <div class="col-md-12"><label class="labels">Name</label><input type="text" name="name"
                                    class="form-control" placeholder="enter your name" value=""></div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Mobile Number</label><input type="number" name="number"
                                    class="form-control" placeholder="enter phone number" value=""></div>
                            <div class="col-md-12"><label class="labels">Address</label><input type="text" name="address"
                                    class="form-control" placeholder="enter address" value=""></div>

                            <div class="col-md-12"><label class="labels">About me</label><textarea type="text"
                                    name="about" class="form-control" placeholder="write down yourself" rows="3"
                                    value=""></textarea></div>

                            <script src="/forum/ckeditor/ckeditor.js"></script>
                            <script>
                            CKEDITOR.replace('about');
                            </script>



                        </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>