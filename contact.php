<?php
session_start();
include('configure.php');
include('navbar.php');

$name = "";
$email = "";
$message = "";
$date = "";
$info ="";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $date = date('Y-m-d');

    if ($db_found) {
        $SQL = $db_found->prepare("INSERT INTO contact (email, name, message, date) VALUES ( ?, ?, ?, ?)");
        $SQL->bind_param('ssss', $name, $email, $message , $date);
        $SQL->execute();

        $info = 'Your message is sent';
    }
}

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>CropShare Contact</title>

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
    
    <body id="top">
        <main>

            <header class="site-header">
                <div class="section-overlay"></div>

                <div class="container">
                    <div class="row">
                        
                        <div class="col-lg-12 col-12 text-center">
                            <h1 class="text-white">Get in touch</h1>

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                                    <li class="breadcrumb-item active" aria-current="page">Contact</li>
                                </ol>
                            </nav>
                        </div>

                    </div>
                </div>
            </header>


            <section class="contact-section section-padding">
                <div class="container">
                    <div class="row justify-content-center">

                        <div class="col-lg-6 col-12 mb-lg-5 mb-3">
                            <iframe class="google-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4722.136219194832!2d10.772202738834757!3d59.917660271855105!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46416fa8eba7e84d%3A0xf4e943975503fa30!2sUrtehagen%20(herb%20garden)!5e1!3m2!1sen!2sth!4v1680951932259!5m2!1sen!2sth" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>

                        <div class="col-lg-5 col-12 mb-3 mx-auto">
                            <div class="contact-info-wrap">
                                <div class="contact-info d-flex align-items-center mb-3">
                                    <i class="custom-icon bi-building"></i>

                                    <p class="mb-0">
                                        <span class="contact-info-small-title">Office</span>

                                        Universiti Sains Malaysia, 11800 USM Penang, Malaysia
                                    </p>
                                </div>

                                <div class="contact-info d-flex align-items-center">
                                    <i class="custom-icon bi-globe"></i>

                                    <p class="mb-0">
                                        <span class="contact-info-small-title">Website</span>

                                        <a href="#" class="site-footer-link">
                                            www.cropshare.com
                                        </a>
                                    </p>
                                </div>

                                <div class="contact-info d-flex align-items-center">
                                    <i class="custom-icon bi-telephone"></i>

                                    <p class="mb-0">
                                        <span class="contact-info-small-title">Phone</span>

                                        <a href="tel: 305-240-9671" class="site-footer-link">
                                             +604-2784637
                                        </a>
                                    </p>
                                </div>

                                <div class="contact-info d-flex align-items-center">
                                    <i class="custom-icon bi-envelope"></i>

                                    <p class="mb-0">
                                        <span class="contact-info-small-title">Email</span>

                                        <a href="mailto:info@yourgmail.com" class="site-footer-link">
                                            cropshare@gmail.com
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8 col-12 mx-auto">
                            <form class="custom-form contact-form" action="contact.php" method="POST" role="form">
                                <h2 class="text-center mb-4">Project in mind? Let’s Talk</h2>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label for="first-name">Full Name</label>

                                        <input type="text" name="name" id="full-name" class="form-control" placeholder="Name" required>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label for="email">Email Address</label>

                                         <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email" required>
                                    </div>

                                    <div class="col-lg-12 col-12">
                                        <label for="message">Message</label>

                                        <textarea name="message" rows="6" class="form-control" id="message" placeholder="What can we help you?"></textarea>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-6 mx-auto">
                                        <button type="submit" class="form-control">Send Message</button>
                                    </div>

                                    <div class="col-lg-12 col-12">
                                        <label style="margin-left: 5px;color: green; font-size: 20px;"><span> <?php print $info; ?></span></label>
                                    </div>
                                </div>
                            </form>
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
