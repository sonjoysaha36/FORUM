<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("Location: index.php");
    // die();
    // print_r("hi");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/568546f75d.js" crossorigin="anonymous"></script>

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
    include 'partials/_header.php';

    $id = $_GET['profileid'];
    include "partials/_db.php";
    $sql = "SELECT * FROM `users` WHERE sno=$id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $uname = $row['user_name'];
        $uemail = $row['user_email'];
    }
    $sql2 = "SELECT * FROM `user_info` WHERE uid=$id";
    $result2 = mysqli_query($conn, $sql2);
    while ($row2 = mysqli_fetch_assoc($result2)) {
        $uaddress = $row2['uaddress'];
        $uphone = $row2['phone'];
        $uabout = $row2['uabout'];
        $fname = $row2['uname'];
        $profileImage= $row2['profile_pic'];
    }
        $postBadge = "false";
        $sql3 ="SELECT COUNT(thread_user_id) AS NumberOfPost FROM threads WHERE thread_user_id=$id";
        $result3 = mysqli_query($conn, $sql3);
        while ($row3 = mysqli_fetch_assoc($result3)) {
            
            $NumberOfPost = $row3['NumberOfPost'];

            
        }
        $sql4 ="SELECT COUNT(comment_by) AS comment FROM comments WHERE comment_by=$id";
        $result4 = mysqli_query($conn, $sql4);
        while ($row4 = mysqli_fetch_assoc($result4)) {
            
            $comment = $row4['comment'];
            
        }
        // echo $NumberOfProducts;
        

    ?>

    <div class="container" id="maincontainer">
        <div class="row">
            <div class="col-md-6">
                <?php
                echo
                '<div class="profile-links" id="profile-links"</div>
                    <img src="images/'.$profileImage.'" alt="" height="150px" weight="100px">
                    <li><a href="#">Home</a> </li>
                    <!-- <li><a href="#">About</a> </li> -->
                    
                    <li><a href="#">' . $uemail . '</a> </li>
                    <li><a href="#">' . $uaddress . '</a> </li>
                    <div class="flex-shrink-0">
                    ';
                    if($NumberOfPost >= 5 || $comment >=5){
                        echo'<div class="d-flex justify-content-evenly">';
                    if($NumberOfPost >= 5){
            
                    
                    echo '
                    <div class="">
                    <img src="img/post.png" alt="Sample Image">
                    

                </div>'; }
                if($comment >=5){
                    echo '
                    <div class="">
                    
                    <img src="img/comment.png" alt="Sample Image">
                    

                </div>
                </div>';

                }
            }
                    echo '
            </div>
                    <li><a class="btn btn-outline-success" href="/forum/mypost.php?profileid=' . $id . '">My Post</a> </li>
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
                <?php if (isset($_SESSION['loggedin']) && ($_SESSION['loggedin'] == true) && ($_SESSION['sno'] == $id))
                    echo '
                    <div class="mt-3">
                    <button class="btn btn-outline-success"  data-bs-toggle="modal" data-bs-target="#editmodal">Edit</button>
                    

                </div>'; ?>
                
                <h2 class="mt-1">About Me</h2>
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
                <?php echo '<form action="/forum/services/_editProfile.php?profileid=' . $_SESSION['sno'] . '" method="POST"  enctype="multipart/form-data" >' ?>
                <div class="modal-body">
                    <div class="row mt-2">
                        <div class="col-md-12"><label class="labels">Name</label><input type="text" name="name" class="form-control" value="<?php echo $fname;?>" placeholder="enter your name" ></div>

                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Mobile Number</label><input type="number"  name="number" value="<?php echo $uphone;?>" class="form-control" placeholder="enter phone number"></div>
                       
                        <div class="col-md-12"><label class="labels">Address</label><input type="text"  name="address"  value="<?php echo $uaddress;?>" class="form-control" placeholder="enter address"></div>

                        <div class="col-md-12 mb-3">

                                <label for="formFileMultiple" class="form-label">Profile Picture</label>
                                <input class="form-control" type="file" id="profile_pic" name="profile_pic" >

                        </div>

                        <input type="hidden" name="prev_profile_image" value="<?php echo $profileImage; ?>"> 

                        <div class="col-md-12"><label class="labels">About me</label><textarea type="text" name="about" class="form-control" placeholder="write down yourself" rows="3" ><?php echo $uabout;?></textarea></div>

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