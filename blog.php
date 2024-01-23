<?php
//session start
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

        <title>CropShare Blog</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/owl.carousel.min.css" rel="stylesheet">

        <link href="css/owl.theme.default.min.css" rel="stylesheet">
        <link href="css/blogcss.css" rel="stylesheet">
        <link href="css/tooplate-gotto-job.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
    </head>
    <body class="job-listings-page" id="top">
        <main>
        <header class="site-header">
            <div class="section-overlay"></div>
            <div class="container">
                <div class="row">      
                    <div class="col-lg-12 col-12 text-center">
                        <h1 class="text-white">Blogs</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                                <li class="breadcrumb-item active" aria-current="page">Blogs</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>
        </header>

        <section class="job-section section-padding">
            <div class="container">
                <div class="row align-items-center">
                <?php
                    $sql = "SELECT * FROM `blog` INNER JOIN user ON blog.userID = user.userID";
                    $result = $db_found-> query($sql);
                        while($fetch_products=$result->fetch_assoc()) { 
                ?>
                <a href="blogDetail.php?blogid=<?php echo $fetch_products['blogID']; ?>" class="article w-inline-block w-clearfix">
                        <div class="image-wrapper"><img src="uploaded_img/<?php echo $fetch_products["blogImage"]; ?>"
                                width="109" alt="" class="thumbnail" />
                        </div>
                        <section class="article-text-wrapper w-clearfix">
                            <h2 class="arrow">❯</h2>
                            <h2 class="thumbnail-title"><?php echo $fetch_products['title']; ?></h2>
                            <p><?php echo $fetch_products['subtitle']; ?></p>
                            <div class="article-info-wrapper">
                                <div class="article-info-text" style="font-size: 18px;">Written On: <?php echo $fetch_products['date']; ?></div>
                            </div>
                        </section>
                    </a>
                    <?php
                        }
                    ?>
                </div>
            </div>      
        </section>



<?php include('footer.php'); ?>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/counter.js"></script>
        <script src="js/custom.js"></script>

    </body>
</html>