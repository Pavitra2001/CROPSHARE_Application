<?php
//session start
session_start();
include('configure.php'); 
include('navbar.php');

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
} else {

    $Userid = "";
    $Itemid = "";
    $todayDate = "";
    $Itemid = "";
    $pickUpDate = "";
    $suggestedDate = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $Userid = $_SESSION['user'];
        $itemID = $_POST['item_ExpireDate'];
        $todayDate = date('Y-m-d');
        $Itemid = $_POST['item_ID'];
        $pickUpDate = $_POST['pickUp'];
        $suggestedDate = $_POST['item_ExpireDate'];
        $expireDate = $suggestedDate;
        $pid = $Itemid;

    if (new DateTime($pickUpDate) < new DateTime($expireDate)) {
        if ($db_found) {
            $SQL = $db_found->prepare("INSERT INTO `order` (itemID, userID, pickUpDate, orderedDate) VALUES (?, ?, ?, ?)");
            $SQL->bind_param('ssss', $Itemid, $Userid, $pickUpDate, $todayDate);
            $SQL->execute();

            echo "<script>
            alert('Order successfully placed, thank you for saving the planet!');
            window.location.href = 'dashboard.php';
            </script>";
        }
    } else {
        echo "<script>
        alert('Pick up date cannot be later than suggested date!');
        window.location.href = 'prodDetail.php?pid=$pid';
        </script>";
    }
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

        <title>CropShare Confirm Order</title>

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

                                    <li class="breadcrumb-item active" aria-current="page">Confirm Order</li>
                                </ol>
                            </nav>
                        </div>

                    </div>
                </div>
            </header>

            <!-- Order Section -->
            <section class="section">
            <div class="container">
            <div class="col-lg-4 col-12 mt-5 mt-lg-0" style="padding-top: 20px; padding-left: 15%;display: flex; width: 100%;align-items: center;">
                
                    <?php  
                        if(isset($_GET['pid'])){
                            $pid = $_GET['pid'];
                            $select_products = mysqli_query($db_found, "SELECT * FROM `items` INNER JOIN user ON items.userID = user.userID WHERE itemID = '$pid'") or die('query failed');
                        if(mysqli_num_rows($select_products) > 0){
                            while($fetch_products = mysqli_fetch_assoc($select_products)){
                                $expireDate = $fetch_products['expireDate'];
                                $dateObject = new DateTime($expireDate);
                                $formattedDate = $dateObject->format('d-m-Y');

                    ?>

                <form action="confirmOrder.php" method="POST" autocomplete="off">
                <div class="job-thumb job-thumb-detail-box bg-white shadow-lg" >
                    <div class="d-flex align-items-center" style="display: flex;justify-content: center;align-items: center;">
                        <div class="job-image-box-wrap"  style="width: 50%; height: 50%;">
                            <img src="uploaded_img/<?php echo $fetch_products["itemImage"]; ?>" class="job-image me-3 img-fluid" alt="">
                        </div>
                    </div>
                    <div class="d-flex justify-content-center flex-wrap mt-5 border-top pt-4">
                        <h3 class="label">Order Details</h3>
                    </div>
                    <div class="row" style="padding-top:20px;">
                        <div class="d-flex">
                            <div class="job-title">
                            <label class="detail" for="item_ID" style="font-size: 24px; font-weight: bold;">Item ID:</label>
                            <input type="text"class="detail" name="item_ID" style="font-size: 24px; font-weight: bold;" value="<?php echo $fetch_products['itemID']; ?>" readonly><br><br>
                            
                            <label class="detail" for="item_Name" style="font-size: 24px; font-weight: bold;">Item Name:</label>
                            <input type="text"class="detail" name="item_Name" style="font-size: 24px; font-weight: bold;" value="<?php echo $fetch_products['itemName']; ?>" readonly><br><br>

                            <label class="detail" for="item_Category" style="font-size: 24px; font-weight: bold;">Category:</label>
                            <input type="text"class="detail" name="item_Category" style="font-size: 24px; font-weight: bold;" value="<?php echo $fetch_products['category']; ?>" readonly><br><br>

                            <label class="detail" for="item_Quantity" style="font-size: 24px; font-weight: bold;">Quantity:</label>
                            <input type="text"class="detail" name="item_Quantity" style="font-size: 24px; font-weight: bold;" value="<?php echo $fetch_products['quantity']; ?>" readonly><br><br>

                            <label class="detail" for="item_Weight" style="font-size: 24px; font-weight: bold;">Weight:</label>
                            <input type="text"class="detail" name="item_Weight" style="font-size: 24px; font-weight: bold;" value="<?php echo $fetch_products['weight']; ?>" readonly><br><br>

                            <label class="detail" for="item_ExpireDate" style="font-size: 24px; font-weight: bold;">Best Before:</label>
                            <input type="text"class="detail" name="item_ExpireDate" style="font-size: 24px; font-weight: bold;" value="<?php echo  $formattedDate; ?>" readonly><br><br>

                            <!-- <p class="detail" name="item_Name" style="font-size: 24px; font-weight: bold;"> Item Name: <?php echo $fetch_products['itemName']; ?></p>
                            <p class="detail" name="item_Category" style="font-size: 24px; font-weight: bold;"> Item Category: <?php echo $fetch_products['category']; ?></p>
                            <p class="detail" name="item_Quantity" style="font-size: 24px; font-weight: bold;"> Item Quantity: <?php echo $fetch_products['quantity']; ?></p>
                            <p class="detail" name="item_Weight" style="font-size: 24px; font-weight: bold;"> Item Weight: <?php echo $fetch_products['weight']; ?> Kg</p>
                            <p class="detail" name="item_ExpireDate" style="font-size: 24px; font-weight: bold;" required> Suggested Pick Up: <?php echo  $formattedDate; ?></p> -->
                            </div>
                        </div>
                    </div>

                    <div class="row" style="padding-top:20px;">
                        <div class="d-flex">
                            <div class="job-title">
                            <label class="detail" for="item_DonorName" style="font-size: 24px; font-weight: bold;">Donor Name:</label>
                            <input type="text"class="detail" name="item_DonorName" style="font-size: 24px; font-weight: bold;" value="<?php echo $fetch_products['name']; ?>" readonly><br><br>
                            </div>
                        </div>
                        <div class="d-flex">
                            <label class="detail" for="location" style="font-size: 24px; font-weight: bold;">Location:</label>
                            <input type="text"class="detail" name="location" style="font-size: 24px; font-weight: bold; width: 100%;" value="<?php echo $fetch_products['address']. ', ' .$fetch_products['zipcode']. ', ' . $fetch_products['city'];?>" readonly><br><br>
                            </div>
                        </div>

                        <br>
                        <br>
                        <div class="d-flex">
                            <div class="job-title">
                            <label class="detail" for="pickUp" style="font-size: 24px; font-weight: bold; color: blue">Select Pick Up Date:</label>
                            <input type="date"class="detail" name="pickUp" style="font-size: 24px; font-weight: bold;cursor:pointer;" required><br>  
                            </div>
                        </div>

                        <div class="d-flex justify-content-center flex-wrap mt-5 border-top pt-4">
                            <input type="submit" onclick="success()" class="custom-btn custom-border-btn btn mt-2 ms-lg-4 ms-3" value="Confirm Order">
                        </div>
                    </div>
                </div>
                </form> 
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