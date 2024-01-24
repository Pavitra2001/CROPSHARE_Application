<?php 
  session_start();
  include_once "configure.php";
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
<body style="width: 800px; background: linear-gradient(135deg, #71b7e6, #9b59b6);">
  <div class="container" style="margin-top:100px; margin-left: 650px; background: white; display: flex;padding: 10px;border-radius: 15px;box-shadow: 0 5px 10px rgba(0,0,0,0.15);height:750px;">
    <section class="users" style="width: 800px; height:800px;">
      <header>
        <div class="container">
          <?php 
            $sql = mysqli_query($db_found, "SELECT * FROM user WHERE userID = {$_SESSION['user']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <div class="details">
            <span>You: <?php echo $row['name'];?></span>
          </div>
        </div>
        <a href="index.php?logout_id=<?php echo $row['userID']; ?>" class="logout" >Cancel</a>
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>
</html>
