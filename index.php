<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Stargate Communication</title>
</head>

<body>
    <!-- Banner row -->
    <div class="" style="width: 100%;">
        <div class="card border-0 justify-content-center ">
            <video type="video/mp4" class="img-fluid " src="assets/videos/Commuty-manager-solution.mp4" preload="auto"
                controls muted loop autoplay></video>
        </div>
    </div> <!-- Banner row -->

    <!-- menu de navigation -->
    <?php include('inc/menu.php')?>

    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-3">
                <h1>Espace Pub</h1>
            </div> <!-- fin col md A -->
            <div class="col-md-6">
                <div class="card mb-3 arrondir-8">
                    <div class="card-header">
                        <img src="assets/images/logo.png" class="rounded-circle" height="50" width="40" alt="">
                        Stargate Communication
                    </div>
                    <div class="card-body">
                        <video class="img-fluid arrondir-8" controls type="video/mp4"
                            src="assets/videos/promo1.mp4"></video>
                    </div>
                </div>
                <div class="card mb-3 arrondir-8">
                    <div class="card-header">
                        <img src="assets/images/logo.png" class="rounded-circle" height="50" width="40" alt="">
                        Stargate Communication
                    </div>
                    <div class="card-body">
                        <video class="img-fluid arrondir-8" controls type="video/mp4"
                            src="assets/videos/promo2.mp4"></video>
                    </div>
                </div>
                <div class="card mb-3 arrondir-8">
                    <div class="card-header">
                        <img src="assets/images/logo.png" class="rounded-circle arrondir-8" height="50" width="40"
                            alt="">
                        Stargate Communication
                    </div>
                    <div class="card-body">
                        <video class="img-fluid arrondir-8" controls type="video/mp4"
                            src="assets/videos/promo3.mp4"></video>
                    </div>
                </div>
            </div> <!-- fin col md B -->
            <div class="col-md-3">
                <div id="my-carousel" class="carousel slide mb-3 " data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li class="active" data-target="#my-carousel" data-slide-to="0" aria-current="location"></li>
                        <li data-target="#my-carousel" data-slide-to="1"></li>
                        <li data-target="#my-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100 h-100 arrondir-8" src="assets/images/pic.jpeg" alt="">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Title</h5>
                                <p>Text</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 h-100 arrondir-8" src="assets/images/pic1.jpeg" alt="">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Title</h5>
                                <p>Text</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 h-100 arrondir-8" src="assets/images/pic2.jpeg" alt="">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Title</h5>
                                <p>Text</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#my-carousel" data-slide="prev" role="button">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#my-carousel" data-slide="next" role="button">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div class="card arrondir-8 shadow-sm">
                    <div class="card-body">
                        <h5>A PROPOS</h5>
                        <p class=" d-inline-flex ">
                            <i class="fas fa-info-circle fa-2x  "></i>
                            Lorem ipsum dolor sit amet
                            consectetur.
                        </p>

                        <p class=" lead">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ullam voluptate nesciunt excepturi
                            consequuntur rem a assumenda illo sed. Laudantium, hic.
                        </p>

                    </div>
                </div>
            </div> <!-- fin col md C -->

        </div> <!-- fin row-->
    </div><!-- fin comtainer-fluid -->
    
    <?php include("inc/footer.php") ?>

    <!-- CDN pour le js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha2/js/bootstrap.min.js"></script>

    <script src="assets/js/footer.js"></script>
</body>

</html>