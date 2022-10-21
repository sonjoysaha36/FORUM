<!DOCTYPE html>
<html lang="en">

<head>
    <title>admin Panel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {
        height: 550px
    }

    /* Set gray background color and 100% height */
    .sidenav {
        background-color: #f1f1f1;
        height: 100%;
    }

    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
        .row.content {
            height: auto;
        }
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
include '_db.php';

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);

    
$sqlT = "SELECT * FROM threads";
$result_T = mysqli_query($conn, $sqlT);
$numRows_T = mysqli_num_rows($result_T);

$sqlC = "SELECT * FROM comments";
$result_C = mysqli_query($conn, $sqlC);
$numRows_C = mysqli_num_rows($result_C);

$sqlf = "SELECT * FROM feedback";
$result_f = mysqli_query($conn, $sqlf);
$numRows_f = mysqli_num_rows($result_f);

?>
    
<div class="jumbotron">
  <div class="container text-center">
    <h1>Admin Panel</h1>       
    <p>Welcome to Admin Panel</p>
  </div>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="/forum/">iDiscuss</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/forum/">Home</a></li>
        <li><a href="/forum/partials/_handleUser.php">Users Handle</a></li>
        <li><a href="#">Posts Handle</a></li>
        <li><a href="#">Comments Handle</a></li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['username']; ?></a></li>
        <li><a href="_logout.php"> <span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        
      </ul>
    </div>
  </div>
</nav>

<div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">Users</div>
        <div class="panel-body"><img src="/forum/img/profile.gif" class="img-thumbnail img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Total login <?php echo $numRows ?> users</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Posts</div>
        <div class="panel-body"><img src="/forum/img/post.gif"  class="img-thumbnail img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Total <?php echo $numRows_T ?> Posts in all category</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Comments</div>
        <div class="panel-body"><img src="/forum/img/comment.gif" class="img-thumbnail img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Total <?php echo $numRows_C ?> Comments in all posts</div>
      </div>
    </div>
  </div>
</div><br>

<div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">Dashboard</div>
        <div class="panel-body"><img src="/forum/img/dashboard.gif" class="img-thumbnail  img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Admin panel Dashboard</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading"><?php echo $_SESSION['username'] ?></div>
        <div class="panel-body"><img src="/forum/img/hacker.gif" class="img-thumbnail img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Hello <?php echo $_SESSION['username'] ?> Welcome</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Feedback</div>
        <div class="panel-body"><img src="/forum/img/message.gif" class="img-thumbnail img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Total <?php echo $numRows_f ?> Feedback.Reload for update new Feedback</div>
      </div>
    </div>
  </div>
</div><br><br>

    
    <?php include '_footer.php'; ?>
    
</body>

</html>