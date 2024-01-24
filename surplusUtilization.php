<?php

$userId = $_SESSION['user'];
function calculateSurplusCropsUtilizationRate($userId, $db_found) {
    $query = "SELECT 
                (SUM(CASE WHEN items.userID = ? AND items.category = 'Surplus Crops' THEN items.weight ELSE 0 END) / 
                 SUM(CASE WHEN `order`.userID = ? AND items.category = 'Surplus Crops' THEN items.weight ELSE 0 END)) * 100 AS surplus_crops_utilization_rate
              FROM items
              INNER JOIN `order` ON items.itemID = `order`.itemID";

    $stmt = $db_found->prepare($query);
    $stmt->bind_param('ss', $userId, $userId);
    $stmt->execute();
    $stmt->bind_result($surplusCropsUtilizationRate);
    $stmt->fetch();
    $stmt->close();

    return $surplusCropsUtilizationRate;
}

// Example usage:
$userId = $_SESSION['user'];  // Assuming you want to calculate for the logged-in user
$surplusCropsUtilizationRate = calculateSurplusCropsUtilizationRate($userId, $db_found);
?>

<div class="col-md-4 stretch-card grid-margin">
    <div class="card bg-gradient-success card-img-holder text-white">
        <div class="card-body">
            <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3" style="font-size: 25px;">Surplus Crops Utilization Rate <i class="mdi mdi-chart-line mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5" style="font-size: 32px;"><?php echo number_format($surplusCropsUtilizationRate, 2) . "%";?></h2>
            <h6 class="card-text" style="font-size: 20px;">total percentage of surplus crops utilized from CropShare community for a better use</h6>
        </div>
    </div>
</div>
