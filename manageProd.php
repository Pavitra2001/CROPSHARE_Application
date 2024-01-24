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
                    <h4 class="card-title">Product List</h4>
                 
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Item ID</th>
                          <th>Item Name</th>
                          <th>Category</th>     
                          <th>Quantity</th>                   
						              <th>Weight</th>
                          <th>Best Pick Up Date</th>
						              <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                            $Userid = $_SESSION['user'];  
                            $select_products = mysqli_query($db_found, "SELECT * FROM items INNER JOIN user ON items.userID = user.userID WHERE items.userID = '$Userid'") or die('query failed');
                            if(mysqli_num_rows($select_products) > 0){
                                while($fetch_products = mysqli_fetch_assoc($select_products)){
                                  $itemStatus = $fetch_products["itemStatus"];
                        ?>
                        <tr>
                          <td><?php echo $fetch_products["itemID"]; ?></td>
                          <td>
                              <img src="uploaded_img/<?php echo $fetch_products["itemImage"]; ?>" class="me-2" alt="image">
                              <label class="detail"><?php echo $fetch_products["itemName"]; ?></label>
                            </td>
                          <td><?php echo $fetch_products["category"]; ?></td>
                          <td><?php echo $fetch_products["quantity"]; ?></td>
                          <td><?php echo $fetch_products["weight"]; ?> Kg</td>
                          <td><?php echo $fetch_products["expireDate"]; ?></td>
                          <td id="statusButton"> 
                            <?php 
                            if ($fetch_products["itemStatus"] == "Not Available") {
                              echo "<span class='badge badge-danger'> Not Available</span>";
                            }else{
                              echo "<span class='badge badge-success'> Available</span>";
                            }
                            ?>
                          </td>

                          <td><a href="updateProd.php?oid=<?php echo $fetch_products['itemID']; ?>">Update</a> </td>
                        </tr>
                        <?php
                                }
                            }else{
                            echo '<p class="empty">No Items Added!</p>';
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