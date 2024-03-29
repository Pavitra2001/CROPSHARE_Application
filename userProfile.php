<?php
session_start();
include('configure.php');

if(isset($_SESSION['user'])) {
    $userID = $_SESSION['user'];

    $updateSuccess = "";
    $updateFail = "";

    if(isset($_POST['update'])) {
        
        // Form is submitted, update user profile details
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $zipcode = $_POST['zipcode'];

        $update_query = $db_found->prepare('UPDATE user SET name=?, email=?, phone=?, address=?, city=?, zipcode=? WHERE userID = ?');
        $update_query->bind_param('ssssssi', $name, $email, $phone, $address, $city, $zipcode, $userID);
        $update_result = $update_query->execute();

        if($update_result) {
            // Update successful
            $updateSuccess = "Profile updated successfully!";
        } else {
            // Update failed
            $updateFail = "Failed to update profile. Please try again.";
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
                  <label style="margin-left: 5px;color: green;"><span> <?php print $updateSuccess;  ?> </span></label><br>
                  <label style="margin-left: 5px;color: red;"><span> <?php print $updateFail;  ?> </span></label><br>
                  <h4 class="card-title">User Profile</h4>

                    <?php
                    if(isset($_SESSION['user'])) {
                        $SQL = $db_found->prepare('SELECT * FROM user WHERE userID = ?');//verify username
                        $SQL->bind_param('s', $_SESSION['user']);
                        $SQL->execute();
                        $result = $SQL->get_result();
                    
                        if ($result->num_rows == 1) {
                            $row = $result->fetch_assoc();
                        ?>
                    <form class="forms-sample" method="POST" enctype="multipart/form-data"><br>
					
                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="User Name" value="<?php echo $row['name'];?>">
                    </div>
                    
                      <div class="form-group">
                      <label for="exampleInputName1">Email</label>
                      <input type="email" class="form-control" id="exampleInputName1" name="email" placeholder="Email" value="<?php echo $row['email'];?>">
                    </div>
                   
                    <div class="form-group">
                      <label for="exampleInputName1">Phone Number</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="phone" placeholder="Phone Number" value="<?php echo $row['phone'];?>">
                    </div>
                    
                      <div class="form-group">
                      <label for="exampleInputName1">Address</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="address" placeholder="Address" value="<?php echo $row['address'];?>">
                    </div>
                    
                      <div class="form-group">
                      <label for="exampleInputName1">City</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="city" placeholder="City" value="<?php echo $row['city'];?>">
                    </div>
                    
                    
                      <div class="form-group">
                      <label for="exampleInputName1">Zip Code</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="zipcode" placeholder="Zip Code" value="<?php echo $row['zipcode'];?>">
                    </div>
                   
                    <button type="submit" name="update" class="btn btn-gradient-primary me-2">Update</button>
                  </form>

                        <?php                           
                        }else {
                            echo 'no row';
                        }
                    }
                    ?>

                  </div>
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