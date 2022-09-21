<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to iDiscuss</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
      <?php include 'partials/_header.php' ?>

      

      <div class="container my-3">
      <h1 class="text-center">iDiscuss - Browse Categories</h1>
        <div class="row">
            <!-- use a for loop to iterate through categories -->


            <div class="col-md-4 my-3">
            <div class="card" style="width: 18rem;">
             <img src="https://source.unsplash.com/500x400/?code,python" class="card-img-top" alt="...">
            <div class="card-body ">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">View Threads</a>
            </div>
             </div>
             </div>
         </div>

      </div>
      

      <?php include 'partials/_footer.php' ?>

  
  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>