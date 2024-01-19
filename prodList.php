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

        <title>CropShare Listing</title>

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
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->

    </head>
    
    <body class="job-listings-page" id="top">
        <main>

            <header class="site-header">
                <div class="section-overlay"></div>

                <div class="container">
                    <div class="row">
                        
                        <div class="col-lg-12 col-12 text-center">
                            <h1 class="text-white">CropShare Listings</h1>

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                                    <li class="breadcrumb-item active" aria-current="page">Listings</li>
                                </ol>
                            </nav>
                        </div>

                    </div>
                </div>
            </header>

            <?php include('searchStorelist.php'); ?>

            <section class="job-section section-padding">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-6 col-12 mb-lg-4">
                            <!-- <h3>Results of 30-65 of 1500 jobs</h3> -->
                        </div>

                        <!-- filter -->
                        <div class="col-lg-4 col-12 d-flex align-items-center ms-auto mb-5 mb-lg-4">
                            <p class="mb-0 ms-lg-auto">Sort by:</p>

                            <div class="dropdown dropdown-sorting ms-3 me-4">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownSortingButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    Newest Jobs
                                </button>

                                <ul class="dropdown-menu" aria-labelledby="dropdownSortingButton">
                                    <li><a class="dropdown-item" href="#">Lastest Jobs</a></li>

                                    <li><a class="dropdown-item" href="#">Highed Salary Jobs</a></li>

                                    <li><a class="dropdown-item" href="#">Internship Jobs</a></li>
                                </ul>
                            </div>

                            <div class="d-flex">
                                <a href="#" class="sorting-icon active bi-list me-2"></a>

                                <a href="#" class="sorting-icon bi-grid"></a>
                            </div>
                        </div>

                        <?php
                            $sql = "SELECT * FROM `items` INNER JOIN user ON items.userID = user.userID";
                            $result = $db_found-> query($sql);
                        ?>
                        <!-- Item Catalog -->
                        <?php   // LOOP TILL END OF DATA  
                                while($fetch_products=$result->fetch_assoc()) { 
                            ?>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="job-thumb job-thumb-box">
                                <div class="job-image-box-wrap">
                                    <a href="prodDetail.php">
                                        <img src="uploaded_img/<?php echo $fetch_products["itemImage"]; ?>"style="width: 480px; height: 400px;" class="job-image img-fluid" alt="marketing assistant">
                                    </a>

                                    <div class="job-image-box-wrap-info d-flex align-items-center">
                                        <p class="mb-0">
                                            <a href="#" class="badge badge-level"><?php echo $fetch_products['category']; ?></a>
                                        </p>
                                    </div>
                                </div>

                                <div class="job-body">
                                    <h4 class="job-title">
                                        <a href="prodDetail.php" class="job-title-link"><?php echo $fetch_products['itemName']; ?></a>
                                    </h4>

                                    <div class="d-flex">
                                        <div class="job-title">
                                        <p class="detail" style="font-size: 22px; font-weight: 600;"> Donated By: <?php echo $fetch_products['name']; ?></p>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <p class="job-location" style="font-size: 17px;">
                                            <i class="custom-icon bi-geo-alt me-1"></i>
                                            <?php echo $fetch_products['city']. ', ' . $fetch_products['state'];?> 
                                        </p>
                                    </div>

                                    <div class="d-flex align-items-center border-top pt-3">
                                        <p class="detail" style="font-size: 20px; font-weight: 400;"> Pick Up By <br>
                                            <i class="custom-icon bi-clock me-1"></i>
                                            <?php echo $fetch_products['expireDate']; ?>
                                        </p>
                                        <input type="hidden" name="product_id" value="<?php echo $fetch_products['itemID']; ?>">
                                        <a href="prodDetail.php?pid=<?php echo $fetch_products['itemID']; ?>" class="custom-btn btn ms-auto">View</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>

                        <!-- Page Number -->
                        <div class="col-lg-12 col-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center mt-5">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">Prev</span>
                                        </a>
                                    </li>

                                    <li class="page-item active" aria-current="page">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    
                                    <li class="page-item">
                                        <a class="page-link" href="#">3</a>
                                    </li>

                                    <li class="page-item">
                                        <a class="page-link" href="#">4</a>
                                    </li>

                                    <li class="page-item">
                                        <a class="page-link" href="#">5</a>
                                    </li>
                                    
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
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