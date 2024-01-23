<?php
    session_start();
    include_once "configure.php";
    $outgoing_id = $_SESSION['user'];
    $sql = "SELECT * FROM user WHERE NOT userID = {$outgoing_id} ORDER BY userID DESC";
    $query = mysqli_query($db_found, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output;
?>