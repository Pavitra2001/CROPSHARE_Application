<?php

$userId = $_SESSION['user'];
function getTotalOrders($userId, $db_found) {
    $query = "SELECT COUNT(*) AS total_orders FROM `order` WHERE userID = ?";

    $stmt = $db_found->prepare($query);
    $stmt->bind_param('s', $userId);
    $stmt->execute();
    $stmt->bind_result($totalOrders);
    $stmt->fetch();
    $stmt->close();

    return $totalOrders;
}

// Example usage:
$userId = $_SESSION['user'];  // Assuming you want to calculate for the logged-in user
$totalOrders = getTotalOrders($userId, $db_found);
?>

<div class="col-md-4 stretch-card grid-margin">
<div class="card bg-gradient-danger card-img-holder text-white">
    <div class="card-body">
    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
    <h4 class="font-weight-normal mb-3" style="font-size: 25px;">Waste Reduction Impact <i class="mdi mdi-diamond mdi-24px float-right"></i>
    </h4>
    <h2 class="mb-5" style="font-size: 32px;"><?php echo $totalOrders; ?></h2>
    <h6 class="card-text" style="font-size: 20px;">total number of orders placed through CropShare</h6>
    </div>
</div>
</div>