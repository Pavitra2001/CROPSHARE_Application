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

        <title>CropShare Details</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/owl.carousel.min.css" rel="stylesheet">

        <link href="css/owl.theme.default.min.css" rel="stylesheet">

        <link href="css/tooplate-gotto-job.css" rel="stylesheet">
        
<!--

Tooplate 2134 Gotto Job

https://www.tooplate.com/view/2134-gotto-job

Bootstrap 5 HTML CSS Template

-->
    </head>
    
    <body id="top">
        <main>

            <header class="site-header">
                <div class="section-overlay"></div>

                <div class="container">
                    <div class="row">
                        
                        <div class="col-lg-12 col-12 text-center">
                            <h1 class="text-white">Product Details</h1>

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                                    <li class="breadcrumb-item active" aria-current="page">Product Details</li>
                                </ol>
                            </nav>
                        </div>

                    </div>
                </div>
            </header>


            <section class="job-section section-padding pb-0">
                <div class="container">
                    <div class="row">
                    <?php  
                        if(isset($_GET['pid'])){
                            $pid = $_GET['pid'];
                            $select_products = mysqli_query($db_found, "SELECT * FROM `items` INNER JOIN user ON items.userID = user.userID WHERE itemID = '$pid'") or die('query failed');
                        if(mysqli_num_rows($select_products) > 0){
                            while($fetch_products = mysqli_fetch_assoc($select_products)){
                    ?>

                        <div class="col-lg-8 col-12">
                            <h2 class="job-title mb-0"><?php echo $fetch_products['itemName']; ?></h2>

                            <div class="job-thumb job-thumb-detail">
                                <div class="d-flex flex-wrap align-items-center border-bottom pt-lg-3 pt-2 pb-3 mb-4">
                                    <p class="job-location mb-0">
                                        <i class="custom-icon bi-geo-alt me-1"></i>
                                        <?php echo $fetch_products['zipcode']. ', ' . $fetch_products['city'];?>
                                    </p>

                                    <div class="d-flex">
                                        <p class="mb-0">
                                            <a href="#" class="badge badge-level"><?php echo $fetch_products['category']; ?></a>
                                        </p>
                                    </div>
                                </div>

                                <h4 class="mt-4 mb-2">Item Description</h4>

                                <p><?php echo $fetch_products['itemDesc']; ?></p>

                                <h5 class="mt-4 mb-3">Item Details</h5>

                                <p class="mb-1"><strong>Quantity:</strong>  <?php echo $fetch_products['quantity']; ?> </p>

                                <p><strong>Weight:</strong>  <?php echo $fetch_products['weight']; ?> Kg</p>

                                <h5 class="mt-4 mb-3">Pick Up Before</h5>

                                <ul>
                                    <li> <?php echo $fetch_products['expireDate']; ?></li>
                                </ul>

                                <h5 class="mt-4 mb-3">Given By</h5>

                                <ul>
                                    <li> <?php echo $fetch_products['name']; ?></li>
                                </ul>

                                <div class="d-flex justify-content-center flex-wrap mt-5 border-top pt-4">
                                </div>
                            </div>
                        </div>

                        <!-- company part -->
                        <div class="col-lg-4 col-12 mt-5 mt-lg-0">
                            <div class="job-thumb job-thumb-detail-box bg-white shadow-lg">
                                <div class="d-flex align-items-center">
                                    <div class="job-image-box-wrap">
                                        <img src="uploaded_img/<?php echo $fetch_products["itemImage"]; ?>" style="width: 480px; height: 400px;" class="job-image me-3 img-fluid" alt="">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center flex-wrap mt-5 border-top pt-4">
                                    <a href="#" class="custom-btn btn mt-2">Message <?php echo $fetch_products["name"]; ?></a>
                                    <a href="confirmOrder.php" class="custom-btn custom-border-btn btn mt-2 ms-lg-4 ms-3">Confirm Order</a>
                                </div>
                            </div>
                        </div>
                        <?php
                                        }
                                    }else{
                                    echo '<p class="empty">no products details available!</p>';
                                    }
                                }
                                ?>
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