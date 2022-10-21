<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to iDiscuss</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    
</head>

<body>
    <?php include 'partials/_header.php' ?>



    <div class=" jumbotron jumbotron-fluid p-5 mb-4 bg-dark">
        <div class="container">
            <h1 class="display-4 text-center text-light">Contact Us</h1>
            <p class="lead text-light text-center">Feel Free To Share Your Feedback With US!</p>
        </div>
    </div>




    <!-- <section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">E-COMMERCE CONTACT</h1>
        <p class="lead text-muted mb-0">Contact Page build with Bootstrap 4 !</p>
    </div>
</section> -->
  


    <div class=" container" ">
        <div class=" row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/forum/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact</li>
                </ol>
            </nav>
        </div>
    </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mb-5">
                    <div class="card-header bg-primary text-white"><i class="fa fa-envelope"></i> Contact us.
                    </div>
                    <div class="card-body">
                        <form action="/forum/partials/_feedbackHandle.php" method="POST">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp"
                                    placeholder="Enter name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp"
                                    placeholder="Enter email" required>
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                    anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea class="form-control" name="message" id="message" rows="6" required></textarea>
                            </div>
                            <div class="mx-auto">
                                <button type="submit" class="btn btn-primary text-right">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="card bg-light mb-3">
                    <div class="card-header bg-success text-white text-uppercase"><i class="fa fa-home"></i> Address
                    </div>
                    <div class="card-body">
                        <p>Malibagh, Dhaka</p>
                        <p>451 Golbagh</p>
                        <p>Bangladesh</p>
                        <p>Email : idiscuss11@gmail.com</p>
                        <p>Tel. +88 01 95 21 96 50 3</p>

                    </div>

                </div>
            </div>
        </div>
    </div>

    

    <!-- <?php include 'partials/_footer.php' ?> -->

    <footer class="text-light bg-dark text-center">
    <div class="container">
        <div class="row">
            
            <div class="">
                <h5>Contact</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <ul class="list-unstyled ">
                    <li><i class="fa fa-home mr-2"></i> iDiscuss</li>
                    <li><i class="fa fa-envelope mr-2"></i> idiscuss11@gmail.com</li>
                    <li><i class="fa fa-phone mr-2"></i> + 88 01 95 21 96 50 3</li>
                    <li><i class="fa fa-print mr-2"></i> + 88 01 95 21 96 50 4</li>
                </ul>
            </div>
            <div class="col-12 copyright mt-3">
                <p class="float-left">
                    <a href="#">Back to top</a>
                </p>
               <p>Copyright iDiscuss 2022 | All right reserved</p>
            </div>
        </div>
    </div>
</footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>