<?php
    session_start();
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
    
    if (isset($_REQUEST['del'])) {
        $job_id = $_REQUEST['del'];
        include_once("../../../func/sql.php");
        $con->query("DELETE FROM jobs WHERE job_id = '$job_id' AND user_id = '$user_id'");
        
        if ($con->affected_rows > 0) {
            echo "éxito";
        } else {
            echo "error";
        }
    }
?>
