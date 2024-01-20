<?php
//session start
session_start();
require 'configure.php';// db configuration

$name = "";
$email = "";
$pw = "";
$address = "";
$city = "";
$phone = "";
$code = "";
$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  $name = $_POST['name'];
  $email = $_POST['email'];
  $pw = $_POST['password'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $code = $_POST['code'];
  $phone = $_POST['phone'];

  if ($db_found) {
    $SQL = $db_found->prepare('SELECT * FROM user WHERE email = ?');//fetch data from user table
    $SQL->bind_param('s', $email);
    $SQL->execute();
    $result = $SQL->get_result();

    if ($result->num_rows > 0) {
      $error = 'Email has already existed, try another email';//make sure the username is unique
    }
    
		else {
      $phash = password_hash($pw, PASSWORD_DEFAULT);// encrypt password
			$SQL = $db_found->prepare("INSERT INTO user (name, email, password, address, city, zipcode, phone) VALUES ( ?, ?, ?, ?, ?, ?, ?)");
			$SQL->bind_param('sssssss', $name, $email, $phash ,$address, $city, $code, $phone);
      $SQL->execute();
      
			header ("Location: login.php");//to login page
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
    <div class="title">Registration</div>
    <div class="content">
      <form action="registration.php" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" name = "name" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number (*only 10 digits and no '-')</span>
            <input type="tel" pattern="[0-9]{10}" name = "phone" placeholder="Enter your number" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" name = "email" placeholder="Enter your Email" required>
          </div>
          <div class="input-box">
            <span class="details">Password (minimum length 8)</span>
            <input type="password" name = "password" minlength="8" maxlength="16" placeholder="Enter your password" required>
          </div>
          <div class="input-box" style="width: 650px;">
            <span class="details"><Address>Address</span>
            <input type="text" name = "address" placeholder="Enter your address" required>
          </div>
          <div class="input-box">
            <span class="details">Zip Code</span>
            <input type="text" name = "code" pattern="[0-9]{5}" placeholder="Enter your zipcode" required>
          </div>
          <div class="input-box">
            <span class="details">City</span>
            <input type="text" name = "city" placeholder="Enter your city" required>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Register">
        </div>

        <div class="button">
            <span class="signup" style="font-size:23px; alignment:centre;">Already have an account?
            <a href="login.php" label for="check" style="color: #009579;cursor: pointer;">Login</label></a>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
