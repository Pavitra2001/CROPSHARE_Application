<section class="job-section recent-jobs-section section-padding">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-6 col-12 mb-4">
                            <h2>Recent Item Giveaways</h2>
                        </div>

                        <div class="clearfix"></div>

                        <?php
                            $sql = "SELECT * FROM `items` INNER JOIN user ON items.userID = user.userID ORDER BY `itemID` DESC LIMIT 6";
                            $result = $db_found-> query($sql);
                        ?>

                            <?php   // LOOP TILL END OF DATA  
                                while($fetch_products=$result->fetch_assoc()) { 
                            ?>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="job-thumb job-thumb-box">
                                <div class="job-image-box-wrap">
                                    <a href="prodDetail.php?pid=<?php echo $fetch_products['itemID']; ?>">
                                        <img src="uploaded_img/<?php echo $fetch_products["itemImage"]; ?>"style="width: 480px; height: 400px;" class="job-image img-fluid" alt="">
                                    </a>

                                    <div class="job-image-box-wrap-info d-flex align-items-center">
                                        <p class="mb-0">
                                            <a href="#" class="badge badge-level"><?php echo $fetch_products['category']; ?></a>
                                        </p>
                                    </div>
                                </div>

                                <div class="job-body">
                                    <h4 class="job-title" style="font-size: 23px; font-weight: bold;">
                                        <a href="prodDetail.php?pid=<?php echo $fetch_products['itemID']; ?>" class="job-title-link"><?php echo $fetch_products['itemName']; ?></a>
                                    </h4>

                                    <div class="d-flex align-items-center">
                                        <div class="job-title">
                                        <p class="detail" style="font-size: 18px; font-weight: 600;"> Donated By: <?php echo $fetch_products['name']; ?></p>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <p class="job-location">
                                            <i class="custom-icon bi-geo-alt me-1"></i>
                                            <?php echo $fetch_products['zipcode']. ', ' . $fetch_products['city'];?>
                                        </p>  
                                    </div>

                                    <div class="d-flex align-items-center border-top pt-3">
                                        <p class="detail" style="font-size: 16px; font-weight: 400;"> Pick Up By <br>
                                            <i class="custom-icon bi-clock me-1"></i>
                                            <?php echo $fetch_products['expireDate']; ?>
                                        </p>

                                        <a href="prodDetail.php?pid=<?php echo $fetch_products['itemID']; ?>" class="custom-btn btn ms-auto">View</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                                 }
                            ?>

                        <div class="col-lg-4 col-12 recent-jobs-bottom d-flex ms-auto my-4">
                            <a href="prodList.php" class="custom-btn btn ms-lg-auto">Browse Listings</a>
                        </div>

                    </div>
                </div>
            </section>