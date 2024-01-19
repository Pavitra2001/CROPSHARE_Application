<?php
//session start
session_start();
if (!isset($_SESSION['user'])) {
    header ("Location: login.php");
    } 
    else {
        require 'configure.php';// db configuration 

        $name = "";
        $qty = "";
        $desc = "";
        $weight = "";
        $date = "";
        $image = "";
        $category = "";
        $error = "";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $name = $_POST['item_name'];
        $qty = $_POST['quantity'];
        $desc = $_POST['desc'];
        $weight = $_POST['weight'];
        $date = $_POST['date'];
        $category = $_POST['category'];

        if($_FILES["image"]["error"] == 4){
          echo "<script> alert('Image Does Not Exist'); </script>";
        }
        else{
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

            if ($db_found) {
              $Userid = $_SESSION['user'];
              $SQL = $db_found->prepare("INSERT INTO items (userID, itemName, itemDesc, quantity, weight, category, itemImage, expireDate) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)");
              $SQL->bind_param('ssssssss', $Userid, $name, $desc, $qty ,$weight, $category, $newImageName, $date);
              $SQL->execute();

              echo
              "<script> alert('Item Successfully Added');</script>";
              header ("Location: index.php");
              }
            }
          }
        }
      }

 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">
    <title> CROPSHARE WEBSITE </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">
        <link href="css/owl.carousel.min.css" rel="stylesheet">
        <link href="css/owl.theme.default.min.css" rel="stylesheet">
        <link href="css/tooplate-gotto-job.css" rel="stylesheet">
        <link href="css/registerStyle.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   </head>
<body>
  <div class="container">
  <a href="index.php" span class="close" style="font-size:38px;float:right;">&times;</span></a>
    <div class="title">Donate Now</div>
    <div class="content">
      <form action="addProd.php" method="POST" autocomplete="off" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Item Name</span>
            <input type="text" name = "item_name" placeholder="Enter item name" required>
          </div>
          <div class="input-box">
            <span class="details">Quantity</span>
            <input type="text" name = "quantity" placeholder="Enter quantity" required>
          </div>
          <div class="input-box">
            <span class="details">Best Before/Pick Before</span>
            <input type="date" autocomplete="off" name = "date" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <span class="details">Weight (in Kg)</span>
            <input type="text" name = "weight" placeholder="Enter weight" required>
          </div>
          <div class="input-box" style="width: 650px;">
            <span class="details">Item Description</span>
            <input type="text" name = "desc" placeholder="Enter item description" required>
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="category" value="Surplus Crops" id="dot-1">
          <input type="radio" name="category" value="Plants and Seedlings" id="dot-2">
          <input type="radio" name="category" value="Gardening Tools" id="dot-3">
          <span class="gender-title">Category</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Surplus Crops</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Plants and Seedlings</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender">Gardening Tools</span>
            </label>
          </div>
        </div>
        <div class="input-box">
            <span class="details">Item Image</span>
            <input type="file" name="image" value="fileupload" id="image" accept=".jpg, .jpeg, .png" required>
          </div>
       
        <div class="button">
          <input type="submit" value="Donate">
        </div>
      </form>
    </div>
  </div>

</body>
</html>
