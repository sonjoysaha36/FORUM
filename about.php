<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to iDiscuss</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
    #maincontainer {
        min-height: 55vh;
    }





    .about-team-content {
        margin-top: 0px;
        padding: 0 1.6rem;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .about-team-member {
        width: 20%;
        max-width: 24.2rem;
        margin: 5rem 1.6rem 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        line-height: 1.25;
    }

    .about-team-member-img {
        width: 12rem;
        height: 12rem;
        object-fit: cover;
    }

    .img-circle {
        border-radius: 50%;
    }

    .img-fluid,
    .media-object .media-figure img {
        display: block;
        max-width: 100%;
        height: 200px;
    }

    img,
    picture {
        margin: 0;
        max-width: 100%;
    }

    .justify {
        text-align: justify;
    }
    </style>
</head>

<body>
    <?php include 'partials/_header.php' ?>

    <!-- <div class="has-bg-img bg-purple bg-blend-multiply">
  <h4>Background blend mode: Multiply</h4>
  <img class="bg-img" src="/forum/img/bg.jpg" alt="...">
</div> -->
    <div class="bg-image" style="background-image: url('/forum/img/bg.jpg');
      height: 40vh">
        <div class="container">
            <h1 class="text-center pb-4 text-light">iDiscuss</span></h1>
            <div class="d-flex p-2 text-light mx-5 justify"><span class="fs-5">iDiscuss people find the answers they
                    need, when they need them. We're best known for our public Q&A platform that over 100 million people
                    visit every month to ask questions, learn, and share technical knowledge.

                    Our products and tools empower people to find what they need to develop technology at work or at
                    home.</span></div>
        </div>
        
    </div>


    



    <div class="mt-4" id="maincontainer">
        <h1 class="text-center  pb-4">Meet Our <span class="text-primary">Leadership</span></h1>

        <div class="container d-flex justify-content-around mt-4">
            <div class="card" style="width: 18rem;">
                <img src="/forum/img/tonu.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h3 class="card-title text-center fw-semibold">Tonmoy Saha</h3>
                    <p class=" text-center fw-lighter">CO-Founder & CEO</p>

                    <p class="text-center fw-lighter">Leads the daily operations at iDiscuss,
                        including product
                        development and global sales</p>
                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="/forum/img/sonjoy.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h3 class="card-title text-center fw-semibold">Sonjoy Saha</h3>

                    <p class=" text-center fw-lighter">CO-Founder & Chairman</p>
                    <p class="text-center fw-lighter">Drives iDiscuss strategic vision and manages
                        investor relations
                    </p>
                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="/forum/img/mishuk.jfif" class="card-img-top" alt="...">
                <div class="card-body">
                    <h3 class="card-title text-center fw-semibold">Mishok Saha</h3>
                    <p class=" text-center fw-lighter">CO-Founder & Vice-Chairman</p>
                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                    <p class="text-center fw-lighter">Fearlessly leads our engineering team and is
                        responsible for
                        iDiscuss underlying technology</p>
                </div>
            </div>




        </div>



    </div>

    <div class="mt-4" id="container">

        <h1 class="text-center">Meet Our <span class="text-primary">Team</span></h1>

        <div class="about-team-content">
            <div id="about_team_member_2198" class="about-team-member">
                <img class="img-fluid img-circle about-team-member-img" srcset="/forum/img/bij.jpg" loading="lazy"
                    src="/forum/img/bij.jpg">
                <h3 class="mt-3">
                    <p>Bijoy Das</p>
                </h3>

                <p>Senior Software Engineer</p>
            </div>
            <div id="about_team_member_2303" class="about-team-member">
                <img class="img-fluid img-circle about-team-member-img" srcset="/forum/img/rabbi.jpg" loading="lazy"
                    src="/forum/img/rabbi.jpg">
                <h3 class="mt-3 ">
                    <p class="">Fazly Rabbi</p>
                </h3>

                <p class="mt-0 pt-0">ABM Campaign & Business<br>Development Manager</p>
            </div>
            <div id="about_team_member_2303" class="about-team-member">
                <img class="img-fluid img-circle about-team-member-img" srcset="/forum/img/shamsul.jpg" loading="lazy"
                    src="/forum/img/shamsul.jpg">
                <h3 class="mt-3">
                    <p>Shamsul Alam Imon</p>
                </h3>

                <p>Senior Data Engineer</p>

            </div>



            <div id="about_team_member_2303" class="about-team-member">
                <img class="img-fluid img-circle about-team-member-img" srcset="/forum/img/soborna.jfif" loading="lazy"
                    src="/forum/img/soborna.jfif">
                <h3 class="mt-3">
                    <p>Soborna Kabir</p>
                </h3>

                <p>Front End Engineer</p>

            </div>
            <div id="about_team_member_2303" class="about-team-member">
                <img class="img-fluid img-circle about-team-member-img" srcset="/forum/img/etti.jfif" loading="lazy"
                    src="/forum/img/etti.jfif">
                <h3 class="mt-3">
                    <p>Etti Chowdhury</p>
                </h3>

                <p>Human Resources Manager</p>

            </div>
            <div id="about_team_member_2303" class="about-team-member">
                <img class="img-fluid img-circle about-team-member-img" srcset="/forum/img/anamika.jfif" loading="lazy"
                    src="/forum/img/anamika.jfif">
                <h3 class="mt-3">
                    <p>Anamika</p>
                </h3>

                <p>Infurstructure Engineer

                </p>

            </div>
            <div id="about_team_member_2303" class="about-team-member">
                <img class="img-fluid img-circle about-team-member-img" srcset="/forum/img/priya.jfif" loading="lazy"
                    src="/forum/img/priya.jfif">
                <h3 class="mt-3">
                    <p>Priya Saha</p>
                </h3>

                <p>Customer Success Manager

                </p>

            </div>
            <div id="about_team_member_2303" class="about-team-member">
                <img class="img-fluid img-circle about-team-member-img" srcset="/forum/img/israt.jfif" loading="lazy"
                    src="/forum/img/israt.jfif">
                <h3 class="mt-3">
                    <p>Israt Jahan</p>
                </h3>

                <p>Manager of Finance & Accounting

                </p>

            </div>
            <div id="about_team_member_2303" class="about-team-member">
                <img class="img-fluid img-circle about-team-member-img" srcset="/forum/img/shakil.jpg" loading="lazy"
                    src="/forum/img/shakil.jpg">
                <h3 class="mt-3">
                    <p>Shakil Ahmed</p>
                </h3>

                <p>Sales Engineer

                </p>

            </div>
            <div id="about_team_member_2303" class="about-team-member">
                <img class="img-fluid img-circle about-team-member-img" srcset="/forum/img/hridoy.jfif" loading="lazy"
                    src="/forum/img/hridoy.jfif">
                <h3 class="mt-3">
                    <p>Hridoy Saha</p>
                </h3>

                <p>Business Development Researcher

                </p>

            </div>
            <div id="about_team_member_2303" class="about-team-member">
                <img class="img-fluid img-circle about-team-member-img" srcset="/forum/img/dipto.jpg" loading="lazy"
                    src="/forum/img/dipto.jpg">
                <h3 class="mt-3">
                    <p>Dipto Sarker</p>
                </h3>

                <p>Senior Account Executive

                </p>

            </div>

            <div id="about_team_member_2303" class="about-team-member">
                <img class="img-fluid img-circle about-team-member-img" srcset="/forum/img/shourav.jpg" loading="lazy"
                    src="/forum/img/shourav.jpg">
                <h3 class="mt-3">
                    <p>Shourav Saha</p>
                </h3>

                <p>Senior Director of Data Research

                </p>

            </div>
        </div>
    </div>




    <?php include 'partials/_footer.php' ?>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>