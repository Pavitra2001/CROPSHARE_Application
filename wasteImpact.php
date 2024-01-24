<?php

$userId = $_SESSION['user'];
function calculateWasteReductionImpact($userId, $db_found) {
    $query = "SELECT 
                (SUM(CASE WHEN items.userID = ? THEN items.weight ELSE 0 END) / 
                 SUM(items.weight)) * 100 AS waste_reduction_impact
              FROM items";

    $stmt = $db_found->prepare($query);
    $stmt->bind_param('s', $userId);
    $stmt->execute();
    $stmt->bind_result($wasteReductionImpact);
    $stmt->fetch();
    $stmt->close();

    return $wasteReductionImpact;
}

// Example usage:
$userId = $_SESSION['user'];  // Assuming you want to calculate for the logged-in user
$wasteReductionImpact = calculateWasteReductionImpact($userId, $db_found);
?>

<div class="col-md-4 stretch-card grid-margin">
<div class="card bg-gradient-danger card-img-holder text-white">
    <div class="card-body">
    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
    <h4 class="font-weight-normal mb-3" style="font-size: 25px;">Waste Reduction Impact <i class="mdi mdi-chart-line mdi-24px float-right"></i>
    </h4>
    <h2 class="mb-5" style="font-size: 32px;"><?php echo number_format($wasteReductionImpact, 2) . "%";?></h2>
    <h6 class="card-text" style="font-size: 20px;">total reduction percentage in garden waste by giving away to CropShare</h6>
    </div>
</div>
</div>