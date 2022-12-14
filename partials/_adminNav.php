
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/forum/">iDiscuss</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/forum/partials/_admin.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/forum/partials/_handleUser.php">Users Handle</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/forum/partials/_postHandle.php">Posts Handle</a>
        </li>
        <li class="nav-item"><a class="nav-link" href="/forum/services/_feedbackWatch.php">Watch Feedback</a></li>

      
        
        
      </ul>
      
    </div>
    <div class=" mx-2 d-flex flex-row">
    <P class="text-light my-0 mx-2  pt-2"><span class="fw-bold"><?php echo $_SESSION['username'];?></span> Welcome to admin panel </P>
    <a href="/forum/" class="btn btn-outline-success mx-2  pt-2" >Home</a>
    <a href="_logout.php" class="btn btn-outline-success" >Logout</a>'
    </div>
  </div>
</nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>

