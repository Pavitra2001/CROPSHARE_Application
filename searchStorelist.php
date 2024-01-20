<section class="section-padding pb-0 d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12">
                <form class="custom-form hero-form" action="#" method="GET" role="form">
                    <h3 class="text-white mb-3">Search your items</h3>
                    
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="bi-person custom-icon"></i></span>

                                <input type="text" name="search_data" value="<?php if(isset($_GET['search_data'])){echo $_GET['search_data'];} ?>" id="job-title" class="form-control" placeholder="Item Name" >
                            </div>
                        </div>

                        <div class="col-lg-12 col-12">
                            <button type="submit" class="form-control">
                                Search Item
                            </button>
                        </div>

                        <div class="col-12" style="padding-top: 15px;">
                            <div class="d-flex flex-wrap align-items-center mt-4 mt-lg-0" style="font-size: 28px;">
                                <span class="text-white mb-lg-0 mb-md-0 me-2">Browse Categories:</span>

                                    <div>
                                        <a href="prodList_crops.php" class="badge">Surplus Crops</a>

                                        <a href="prodList_plants.php" class="badge">Plants and Seedlings</a>

                                        <a href="prodList_tools.php" class="badge">Gardening Tools</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
            </div>

            <div class="col-lg-6 col-12">
                <img src="images/4557388.png" class="hero-image img-fluid" alt="">
            </div>

        </div>
    </div>
</section>


