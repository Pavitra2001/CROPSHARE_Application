<?php
session_start();
include('configure.php');
include('navbar.php');
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>About CropShare</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">     
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">
        <link href="css/owl.carousel.min.css" rel="stylesheet">
        <link href="css/owl.theme.default.min.css" rel="stylesheet">
        <link href="css/tooplate-gotto-job.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    
    <body class="about-page" id="top">
        <main>
            <header class="site-header">
                <div class="section-overlay"></div>

                <div class="container">
                    <div class="row">
                        
                        <div class="col-lg-12 col-12 text-center">
                            <h1 class="text-white">About CropShare</h1>

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                                    <li class="breadcrumb-item active" aria-current="page">About</li>
                                </ol>
                            </nav>
                        </div>

                    </div>
                </div>
            </header>


            <section class="about-section">
                <div class="container">
                    <div class="row justify-content-center align-items-center">

                        <div class="col-lg-5 col-12">
                            <div class="about-info-text">
                                <h2 class="mb-0">Introducing CropShare</h2>

                                <h4 class="mb-2">Grow, Share, Sustain</h4>

                                <p>Don't let your harvest go to waste! CropShare makes sharing easy. List your extra veggies, fruits, or herbs in seconds and connect with your neighbors. 
                                    Together, we can nourish our community and reduce food waste, one delicious bite at a time.</p>

                                <div class="d-flex align-items-center mt-4">
                                    <a href="#services-section" class="custom-btn custom-border-btn btn me-4">Explore Services</a>

                                    <a href="contact.php" class="custom-link smoothscroll">Contact</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5 col-12 mt-5 mt-lg-0">
                            <div class="about-image-wrap">
                                <img src="images/comunityGarden.png" class="about-image about-image-border-radius img-fluid" alt="">
                            </div>
                        </div>

                    </div>
                </div>
            </section>


            <section class="services-section section-padding" id="services-section">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12 text-center">
                            <h2 class="mb-5">CropShare Services</h2>
                        </div>

                        <div class="services-block-wrap col-lg-4 col-md-6 col-12">
                            <div class="services-block">
                                <div class="services-block-title-wrap">
                                    <i class="services-block-icon bi-hand-thumbs-up"></i>
                                
                                    <h4 class="services-block-title">Connect</h4>
                                </div>

                                <div class="services-block-body">
                                    <p>Connect home gardeners with neighbors seeking fresh, local produce, reducing food waste</p>
                                </div>
                            </div>
                        </div>

                        <div class="services-block-wrap col-lg-4 col-md-6 col-12 my-4 my-lg-0 my-md-0">
                            <div class="services-block">
                                <div class="services-block-title-wrap">
                                    <i class="services-block-icon bi-twitch"></i>
                                
                                    <h4 class="services-block-title">Share</h4>
                                </div>

                                <div class="services-block-body">
                                    <p>Empower communities to share surplus & tree saplings, building greener neighborhoods</p>
                                </div>
                            </div>
                        </div>

                        <div class="services-block-wrap col-lg-4 col-md-6 col-12">
                            <div class="services-block">
                                <div class="services-block-title-wrap">
                                    <i class="services-block-icon bi-bounding-box-circles"></i>
                                
                                    <h4 class="services-block-title">Sustain</h4>
                                </div>

                                <div class="services-block-body">
                                    <p>Spark connections & joy through food, fostering sustainable living one harvest at a time.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            <?php include('footSection.php'); ?>
        </main>

<?php include('footer.php'); ?>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/counter.js"></script>
        <script src="js/custom.js"></script>

    </body>
</html>
