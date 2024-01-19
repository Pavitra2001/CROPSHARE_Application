<?PHP
//session started
session_start();  
require 'configure.php';


$uname = "";
$password = "";
$errorUsername = "";
$errorPassword = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $uname = $_POST['email'];
  $password = $_POST['password'];

  if ($db_found) {

    $SQL = $db_found->prepare('SELECT * FROM user WHERE email = ?');//verify username
    $SQL->bind_param('s', $uname);
    $SQL->execute();
    $result = $SQL->get_result();

    if ($result->num_rows == 1) {

      $db_field = $result->fetch_assoc();

      if (password_verify($password, $db_field['password'])) {// verify password entered
        
        $user = $db_field['userID'];//initialize variable
        session_start();
        $_SESSION['user'] = $user;
        header ("Location: index.php");//head to homepage
			}
			else {
				$errorPassword = "Password Invalid";
				$_SESSION['user'] = '';
      }
  
  } else {
    $errorUsername = "Email Invalid";//show error if username invalid
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
    <div class="title">Login</div>
    <div class="content">
      <form action="#" method="POST">
        <div class="user-details">
          <div class="input-box" style="width: 600px;">
            <span class="details">Email</span>
            <input type="text" name="email" placeholder="Enter your email" required>
            <label style="margin-left: 5px;color: red;"><span> <?php print $errorUsername;  ?> </span></label>
          </div>
          <div class="input-box" style="width: 600px;">
            <span class="details">Password</span>
            <input type="password" name="password" placeholder="Enter your password" required>
            <label style="margin-left: 5px;color: red;"><span> <?php print $errorPassword;  ?> </span></label>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Login">
        </div>

        <div class="button">
            <span class="signup" style="font-size:23px; alignment:centre;">Create an account?
            <a href="registration.php" label for="check" style="color: #009579;cursor: pointer;">Sign Up</label></a>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
