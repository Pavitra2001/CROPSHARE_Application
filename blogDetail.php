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
        <section class="job-section section-padding">
        <div class="w-container">
            <div class="w-row">
                    <?php  
                        if(isset($_GET['blogid'])){
                            $blogid = $_GET['blogid'];
                            $select_products = mysqli_query($db_found, "SELECT * FROM `blog` INNER JOIN user ON blog.userID = user.userID WHERE blogID = '$blogid'") or die('query failed');
                        if(mysqli_num_rows($select_products) > 0){
                            while($fetch_products = mysqli_fetch_assoc($select_products)){
                    ?>
                <div class="article-body-column">
                    <h1 class="article-heading"><?php echo $fetch_products['title']; ?></h1>

                    <p class="subtitle">By <?php echo $fetch_products['name'] . ', ' . $fetch_products['date']; ?></p>

                    <p><?php echo $fetch_products['subtitle']; ?></p>
                    <p><?php echo $fetch_products['desc1']; ?></p>
                    <p><?php echo $fetch_products['desc2']; ?></p>

                    <div class="images"><img
                            src="uploaded_img/<?php echo $fetch_products["blogImage"]; ?>"
                            sizes="(max-width: 767px) 96vw, (max-width: 991px) 63vw, 620px" alt="" class="big-image" />
                    </div>
                    <div class="share-article-wrapper w-clearfix">

                    </div>
                </div>
                <?php
                        }
                    }else{
                    echo '<p class="empty">No blogs available!</p>';
                    }
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