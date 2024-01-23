<?php
session_start();
include('configure.php');

if(!isset($_SESSION['user'])){
    header("location: login.php");
  }
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>CropShare Chat</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/owl.carousel.min.css" rel="stylesheet">

        <link href="css/owl.theme.default.min.css" rel="stylesheet">

        <link href="css/tooplate-gotto-job.css" rel="stylesheet">
        <link href="css/chatcss.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    </head>
    <body style="width: 800px; height:800px; background: linear-gradient(135deg, #71b7e6, #9b59b6);">
  <div class="container" style="margin-left: 1200px; background: white; display: flex;padding: 10px;border-radius: 15px;box-shadow: 0 5px 10px rgba(0,0,0,0.15);height:750px;">
    <section class="users" style="width: 800px; height:800px;">
      <header>
        <?php 
          $user_id = mysqli_real_escape_string($db_found, $_GET['user_id']);
          $sql = mysqli_query($db_found, "SELECT * FROM user WHERE userID = $user_id");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            ?> 

            <a href="usersChat.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
            <div class="details">
            <span>User: <?php echo $row['name']; ?></span>
            </div>
        <?php
          }else{
            header("location: index.php");
          }
        ?>
        
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" style="background-color: green;" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>


  <script src="javascript/chat.js"></script>

</body>


<!-- JAVASCRIPT FILES -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/counter.js"></script>
<script src="js/custom.js"></script>

</html>