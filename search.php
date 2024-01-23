<?php
    session_start();
    include_once "configure.php";

    $outgoing_id = $_SESSION['user'];
    $searchTerm = mysqli_real_escape_string($db_found, $_POST['searchTerm']);

    $sql = "SELECT * FROM user WHERE NOT userID = {$outgoing_id} AND (name LIKE '%{$searchTerm}%') ";
    $output = "";
    $query = mysqli_query($db_found, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }else{
        $output .= 'No user found related to your search term';
    }
    echo $output;
?>