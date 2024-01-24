<?php
session_start();
include('configure.php');
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>CROPSHARE Dashboard</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">
        <link href="css/owl.carousel.min.css" rel="stylesheet">
        <link href="css/owl.theme.default.min.css" rel="stylesheet">
        <link href="css/tooplate-gotto-job.css" rel="stylesheet">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
        <link rel="stylesheet" href="assets/css/style.css">
        
</head>
<!-- navigation bar -->
<?php include('navbarDashboard.php');?>

<body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper">
	   <?php include_once('sidebar.php'); ?>
        </div>

        <!-- content -->
        <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Order Request</h4>
                 
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Order ID</th>
                          <th>Item Name</th>
                          <th>Category</th> 
                          <th>User Requested</th>     
                          <th>Request Location</th>                   
						  <th>Pick Up Date</th>
						  <th>Order Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                            $Userid = $_SESSION['user'];  
                            $select_products = mysqli_query($db_found, "SELECT * FROM `order` INNER JOIN items ON items.itemID = order.itemID INNER JOIN user ON order.userID = order.userID WHERE items.userID = '$Userid' GROUP BY order.orderID") or die('query failed');
                            if(mysqli_num_rows($select_products) > 0){
                                while($fetch_products = mysqli_fetch_assoc($select_products)){
                                    $pickUpDate = $fetch_products['pickUpDate'];
                                    $dateObject = new DateTime($pickUpDate);
                                    $formattedDate = $dateObject->format('d-m-Y');
                        ?>
                        <tr>
                          <td><?php echo $fetch_products["orderID"]; ?></td>
                          <td><?php echo $fetch_products["itemName"]; ?></td>
                          <td><?php echo $fetch_products["category"]; ?></td>
                          <td><?php echo $fetch_products["name"]; ?></td>
                          <td><?php echo $fetch_products["city"]; ?></td>
                          <td><?php echo $formattedDate; ?></td>
                          <td> 
                            <?php 
                            if ($fetch_products["orderStatus"] == "Completed") {
                              echo "<span class='badge badge-gradient-success'> Completed</span>";
                            }elseif ($fetch_products["orderStatus"] == "Reject") {
                              echo "<span class='badge badge-gradient-danger'> Rejected</span>";
                            }else{
                              echo "<span class='badge badge-gradient-info'> Pending</span>";
                            }
                            ?>
                          </td>
                          <td>
						    <a href="editOrderRequest.php?oid=<?php echo $fetch_products['orderID']; ?>">Update Status</a>
						  </td>
                        </tr>
                        <?php
                                }
                            }else{
                            echo '<p class="empty">No Order Requests!</p>';
                            }
                        ?>
                       
                      </tbody>
                    </table>
					
                  </div>
                </div>
              </div>
            
            
          </div>
        </div>
      </div>
    </div>
        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/counter.js"></script>
        <script src="js/custom.js"></script>

    </body>
</html>