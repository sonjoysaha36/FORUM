<!doctype html>
<html lang="en">

<head>
    <title>admin Panel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        .container{
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
 include("_db.php");

    $sql = "SELECT * FROM `users` where user_role=1";
    $result = mysqli_query($conn, $sql);
    

 
 ?>
    <?php
include("_adminNav.php");

if(isset($_GET['value']) && $_GET['value']=="true")
{
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> User Successfully Remove User.
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
    <div class="container">
        <table class="table mt-3">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">sno</th>
                    <th scope="col">email</th>
                    <th scope="col">timestamp</th>
                    <th scope="col">user_name</th>

                    <th scope="col text-center" colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php while($row = mysqli_fetch_assoc($result)){ ?>

                <tr>
                    <td> <?php echo $row["sno"]; ?></td>
                    <td> <?php echo $row["user_email"]; ?></td>
                    <td> <?php echo $row["timestamp"]; ?></td>
                    <td> <?php echo $row["user_name"]; ?></td>


                    <td><a class="btn btn-danger" href="_deleteUser.php?id=<?php echo $row["sno"]; ?>">Delete</a></td>
                </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>


    <?php include '_footer.php'; ?>

</body>

</html>