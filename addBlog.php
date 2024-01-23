<?php
//session start
session_start();
if (!isset($_SESSION['user'])) {
    header ("Location: login.php");
    } 
    else {
        require 'configure.php';// db configuration 

        $title = "";
        $subtitle = "";
        $desc1 = "";
        $desc2 = "";
        $date = "";
        $image = "";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $title = $_POST['blog_name'];
        $subtitle = $_POST['blog_sub'];
        $desc1 = $_POST['desc1'];
        $desc2 = $_POST['desc2'];
        $date = date('Y-m-d');

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
              $SQL = $db_found->prepare("INSERT INTO blog (userID, title, subtitle, desc1, desc2, blogImage, date) VALUES ( ?, ?, ?, ?, ?, ?, ?)");
              $SQL->bind_param('sssssss', $Userid, $title, $subtitle, $desc1, $desc2, $newImageName, $date);
              $SQL->execute();

              echo
              "<script> alert('Item Successfully Added');</script>";
              header ("Location: blog.php");
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
  <div class="container" style="width: 1200px;">
  <a href="dashboard.php" span class="close" style="font-size:38px;float:right;">&times;</span></a>
    <div class="title">Add Blog</div>
    <div class="content">
      <form action="addBlog.php" method="POST" autocomplete="off" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box" style="width: 800px;">
            <span class="details">Blog Title</span>
            <input type="text" name = "blog_name" placeholder="Enter blog title" required>
          </div>
          <div class="input-box" style="width: 800px;">
            <span class="details">Blog Subtitle</span>
            <input type="text" name = "blog_sub" placeholder="Enter blog subtitle" required>
          </div>
          <div class="input-box" style="width: 800px;">
            <span class="details">Blog Description 1</span>
            <textarea type="text" style="width: 620px; height:150px;" name = "desc1" placeholder="Enter blog description" required></textarea>
          </div>
          <div class="input-box" style="width: 800px;">
            <span class="details">Blog Description 2</span>
            <textarea type="text" style="width: 620px; height:150px;" name = "desc2" placeholder="Enter blog description" required></textarea>
          </div>
        </div>
        <div class="input-box">
            <span class="details">Blog Image</span>
            <input type="file" name="image" value="fileupload" id="image" accept=".jpg, .jpeg, .png" required>
          </div>
       
        <div class="button">
          <input type="submit" value="Save">
        </div>
      </form>
    </div>
  </div>

</body>
</html>
