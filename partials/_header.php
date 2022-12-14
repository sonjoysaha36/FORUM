<?php 
 if(!isset($_SESSION)) 
 { 
     session_start(); 
 } 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  

<?php
 include_once '_db.php';



echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
  <a class="navbar-brand" href="/forum">iDiscuss</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/forum">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Categories
        </a>
        <ul class="dropdown-menu">';
        $sql = "SELECT category_name, category_id  FROM `categories`";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
          echo '<li><a class="dropdown-item" href="threadlist.php?catid='.$row['category_id'].'">'.$row['category_name'].'</a></li>';
        }
          
          echo
        '</ul>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="contact.php">Contact</a>
      </li>
      
    </ul>';
    
  echo '<form class="d-flex" method="get" action="search.php" role="search">
  <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
  <button class="btn btn-success" type="submit">Search</button>
  
</form>
    
    
      <div class=" mx-2 d-flex flex-row">';
      if(isset($_SESSION['loggedin']) && ($_SESSION['loggedin']==true) && ($_SESSION['userrole'] == "true")){
        echo '<P class="text-light my-0 mx-2  pt-2">Welcome '.$_SESSION['username'].'</P>
        <a href="/forum/_userProfile.php?profileid='.$_SESSION['sno'].'" class="btn btn-outline-success mx-2  pt-2" ><i class="fa fa-user"></i></a>
        <a href="partials/_admin.php" class="btn btn-outline-success mx-2  pt-2" >Admin</a>
        <a href="partials/_logout.php" class="btn btn-outline-success" >Logout</a>';
      }
      else if(isset($_SESSION['loggedin']) && ($_SESSION['loggedin']==true) && ($_SESSION['userrole'] == "false")){
        echo '<P class="text-light my-0 mx-2  pt-2">Welcome '.$_SESSION['username'].'</P>
        
        <a href="/forum/_userProfile.php?profileid='.$_SESSION['sno'].'" class="btn btn-outline-success mx-2  pt-2" ><i class="fa fa-user"></i></a>
        
        <a href="partials/_logout.php" class="btn btn-outline-success" >Logout</a>';
      }
        else{
          echo'
          <div class="ml-3">
      <button class="btn btn-outline-success"  data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
      <button class=" btn btn-outline-success " data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>
      </div>
  </div>';

    }

    
    
  
    
  echo '</div>
</div>
</nav>';
include 'partials/_loginModal.php';
include 'partials/_signupModal.php';
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> You can now login.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
 else if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="false"){
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Error!</strong> Email already use.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

if(isset($_GET['signuperror']) && $_GET['signuperror']=="true")
{
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Error!</strong> Password did not match.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

}

if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="false"){
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Error!</strong> Try Again.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

if(isset($_GET['feedback']) && $_GET['feedback']=="true")
{
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> Thanks for your feedback.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

}

if(isset($_GET['signupverify']) && $_GET['signupverify']=="true")
{
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Please!</strong> Check Your Email.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

}

if(isset($_GET['signupverify']) && $_GET['signupverify']=="false")
{
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Somthing Wrong!</strong> Try again.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

}

?>

</body>
</html>