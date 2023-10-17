<?php
    if(isset($_REQUEST['update'])){
        $application_id = $_REQUEST['update'];
        include_once("../../../func/sql.php");
        $application_status = $_REQUEST['application_status'];
        $rank = $_REQUEST['rank'];

        // Actualizar la solicitud de trabajo
        $sql = "UPDATE applications SET rank = '$rank', application_status = '$application_status' WHERE application_id = '$application_id'";
        
        if(empty($application_status)) {
            $sql = "UPDATE applications SET rank = '$rank' WHERE application_id = '$application_id'";
        } else if(empty($rank)) {
            $sql = "UPDATE applications SET application_status = '$application_status' WHERE application_id = '$application_id'";
        }
        
        $con->query($sql);
        
        if(($con->affected_rows) > 0) {
            echo "éxito";
        } else {
            echo "error";
        }
    }

    if(isset($_REQUEST['del'])){
        $application_id = $_REQUEST['del'];
        include_once("../../../func/sql.php");
        $con->query("DELETE FROM applications WHERE application_id = '$application_id'");
        
        if(($con->affected_rows) > 0) {
            echo "éxito";
        } else {
            echo "error";
        }
    }
?>
