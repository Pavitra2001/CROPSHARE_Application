<?php
session_start();
include('configure.php');

if(isset($_GET['bid'])){
    $bid = $_GET['bid'];

    if(isset($_POST['update'])) {
        
        // Form is submitted, update user profile details
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $desc1 = $_POST['desc1'];
        $desc2 = $_POST['desc2'];

        if(!empty($_FILES['image']['name'])){

          $fileName = $_FILES["image"]["name"];
          $fileSize = $_FILES["image"]["size"];
          $tmpName = $_FILES["image"]["tmp_name"];
          $validImageExtension = ['jpg', 'jpeg', 'png'];
          $imageExtension = explode('.', $fileName);
          $imageExtension = strtolower(end($imageExtension));

          if ( !in_array($imageExtension, $validImageExtension) ){
            echo
            "<script>
              alert('Invalid Image Extension');
            </script>";
          }
          else if($fileSize > 25000000){
            echo
            "<script>
              alert('Image Size Is Too Large');
            </script>";
          }
          else{
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;
            move_uploaded_file($tmpName, 'uploaded_img/' . $newImageName);

            $update_query = $db_found->prepare('UPDATE `blog` SET title=?, subtitle=?, desc1=?, desc2=?, blogImage=? WHERE blogID = ?');
            $update_query->bind_param('sssssi', $title, $subtitle, $desc1, $desc2, $newImageName, $bid);
            $update_result = $update_query->execute();
    
            header ("Location: manageBlog.php");
        }
    } 
        else{

            $update_query = $db_found->prepare('UPDATE `blog` SET title=?, subtitle=?, desc1=?, desc2=? WHERE blogID = ?');
            $update_query->bind_param('ssssi', $title, $subtitle, $desc1, $desc2, $bid);
            $update_result = $update_query->execute();
    
            header ("Location: manageBlog.php");
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


<nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="index.php">
                    <img src="images/logo.png" class="img-fluid logo-image">

                    <div class="d-flex flex-column">
                        <strong class="logo-text" style="font-size:30px;">CROPSHARE</strong>
                         <small class="logo-slogan">Crops Sharing Portal</small>
                    </div>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav align-items-center ms-lg-5" style="padding-left: 170px;">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About Us</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link" href="prodList.php">Store</a>
                        </li>

                        
                        <li class="nav-item">
                            <a class="nav-link" href="blog.php">Blog</a>
                        </li>

                        <?php
                            if(isset($_SESSION['user'])) {
                                $SQL = $db_found->prepare('SELECT * FROM user WHERE userID = ?');//verify username
                                $SQL->bind_param('s', $_SESSION['user']);
                                $SQL->execute();
                                $result = $SQL->get_result();
                            
                                if ($result->num_rows == 1) {
                                    $row = $result->fetch_assoc();
                                    
                                    echo 
                                    '
                                    <li><a class="nav-link" href="#">Messages</a></li>
                                    <li><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                                    <li><a class="nav-link" href="addProd.php">Donate</a></li>
                                    <li><a class="nav-link custom-btn btn" style="font-size: 20px; margin-left: 50px; background-color:#f65129;">' . $row['name'] . '</a><li>
                                    <li><a href="logout.php"> <i class="fa fa-sign-out" style="font-size:24px; margin-left: 30px" ></i></span></a><li>
                                    ';
                                    
                                }else {
                                    echo 'no row';
                                }
                            } else {
                                
                                echo '                       
                                <li class="nav-item ms-lg-auto">
                                <a class="nav-link" href="registration.php">Register</a>
                                </li>

                                <li class="nav-item">
                                <a class="nav-link custom-btn btn" href="login.php">Login</a>
                                </li>';
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>

<body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper">
	   <?php include_once('sidebar.php'); ?>
        </div>

                <!-- content -->
                <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <h4 class="card-title">Update Blog Details</h4>

                    <?php  
                        if(isset($_GET['bid'])){
                            $bid = $_GET['bid'];
                            $select_products = mysqli_query($db_found, "SELECT * FROM `blog` WHERE blogID = '$bid' GROUP BY blog.blogID") or die('query failed');
                        if(mysqli_num_rows($select_products) > 0){
                            while($row = mysqli_fetch_assoc($select_products)){
                                $Date = $row['date'];
                                $dateObject = new DateTime($Date);
                                $formattedDate = $dateObject->format('d-m-Y');

                    ?>
                    <form class="forms-sample" method="POST" enctype="multipart/form-data"><br>
					
                    <div class="form-group">
                      <label for="exampleInputName1">Blog Title</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="title" placeholder="Name" style="font-size: 15px;" value="<?php echo $row['title'];?>">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Blog Image</label>
                      <img src="uploaded_img/<?php echo $row["blogImage"]; ?>" style="height:180px;">
                      <input type="hidden" name="oldimage" value="<?php echo $row["blogImage"];?>">
                    </div>

                    					
					<div class="form-group">
                        <label>New Image Upload</label>
                        <input type="file" name="image" value="fileupload" id="image" accept=".jpg, .jpeg, .png"> 
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Subtitle</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="subtitle" placeholder="Name" style="font-size: 15px;" value="<?php echo htmlspecialchars($row['subtitle']);?>">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputName1">Description 1</label>
                      <textarea rows="5" cols="40" type="text" class="form-control" id="exampleInputName1" name="desc1" placeholder="Description" style="font-size: 15px;"><?php echo $row['desc1'];?></textarea>
                    </div>
                   
                    <div class="form-group">
                      <label for="exampleInputName1">Description 2</label>
                      <textarea rows="5" cols="40" type="text" class="form-control" id="exampleInputName1" name="desc2" placeholder="Description" style="font-size: 15px;"><?php echo $row['desc2'];?></textarea>
                    </div>
                   
                    <button type="submit" name="update" onclick="success()" class="btn btn-gradient-primary me-2">Update</button>
                  </form>
                    <?php
                        }
                    }else{
                        echo '<p class="empty">No products available!</p>';
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
<script>
	function success() {
        alert("Blog Details have been successfuly updated!");
        window.location.href = 'manageBlog.php';
	}
</script>
        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/counter.js"></script>
        <script src="js/custom.js"></script>

    </body>
</html>