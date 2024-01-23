<?php 
    session_start();
    if(isset($_SESSION['user'])){
        include_once "configure.php";
        $outgoing_id = $_SESSION['user'];
        $incoming_id = mysqli_real_escape_string($db_found, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($db_found, $_POST['message']);
        if(!empty($message)){
            $sql = mysqli_query($db_found, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')") or die();
        }
    }else{
        header("location: index.php");
    }


    
?>