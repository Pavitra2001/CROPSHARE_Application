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
                            <h1 class="text-white">Confirm Order</h1>

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="prodList.php">Store</a></li>

                                    <li class="breadcrumb-item active" aria-current="page">Order Confirmation</li>
                                </ol>
                            </nav>
                        </div>

                    </div>
                </div>
            </header>

            <section class="job-section section-padding">
                <div class="container">
                <form action="" method="POST">

<h3>place your order</h3>

<div class="flex">
    <div class="inputBox">
        <span>your name :</span>
        <input type="text" name="name" placeholder="enter your name">
    </div>
    <div class="inputBox">
        <span>your number :</span>
        <input type="number" name="number" min="0" placeholder="enter your number">
    </div>
    <div class="inputBox">
        <span>your email :</span>
        <input type="email" name="email" placeholder="enter your email">
    </div>
    <div class="inputBox">
        <span>payment method :</span>
        <select name="method">
            <option value="cash on delivery">cash on delivery</option>
            <option value="credit card">credit card</option>
            <option value="paypal">paypal</option>
            <option value="paytm">paytm</option>
        </select>
    </div>
    <div class="inputBox">
        <span>address line 01 :</span>
        <input type="text" name="flat" placeholder="e.g. flat no.">
    </div>
    <div class="inputBox">
        <span>address line 02 :</span>
        <input type="text" name="street" placeholder="e.g.  streen name">
    </div>
    <div class="inputBox">
        <span>city :</span>
        <input type="text" name="city" placeholder="e.g. mumbai">
    </div>
    <div class="inputBox">
        <span>state :</span>
        <input type="text" name="state" placeholder="e.g. maharashtra">
    </div>
    <div class="inputBox">
        <span>country :</span>
        <input type="text" name="country" placeholder="e.g. india">
    </div>
    <div class="inputBox">
        <span>pin code :</span>
        <input type="number" min="0" name="pin_code" placeholder="e.g. 123456">
    </div>
</div>

<input type="submit" name="order" value="order now" class="btn">

</form>

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