
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
                    <ul class="navbar-nav align-items-center ms-lg-5">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
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
                                    <li><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                                    <li><a class="nav-link" href="usersChat.php">Inbox</a></li>
                                    <li><a class="nav-link custom-btn btn" style="background: transparent; border: 2px solid orange; color:orange; margin-left: 40px; margin-right:15px;border: 2px solid orange;border-radius:5px;" href="addProd.php">+ Give Away Items</a></li>
                                    <li><a class="nav-link custom-btn btn" style="font-size: 20px; margin-left: 50px">Hello, ' . $row['name'] . '</a><li>
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

