<?php
    if(isset($_REQUEST['update'])){
        $application_id = $_REQUEST['update'];
        include_once("../../../func/sql.php");
        $application_status = $_REQUEST['application_status'];
        $rank = $_REQUEST['rank'];
//        echo $application_id,'  ',$application_status,'   ',$rank;
        $sql = "update applications set rank = '$rank', application_status = '$application_status' where application_id = '$application_id'";
        if(empty($application_status)) $sql = "update applications set rank = '$rank' where application_id = '$application_id'";
        else if(empty($rank)) $sql = "update applications set application_status = '$application_status' where application_id = '$application_id'";
        $con->query($sql);
        if(($con->affected_rows)>0) echo "success";
        else echo "error";
    }
    if(isset($_REQUEST['del'])){
        $application_id = $_REQUEST['del'];
        include_once("../../../func/sql.php");
        $con->query("delete from applications where application_id = '$application_id'");
        if(($con->affected_rows)>0) echo "success";
        else echo "error";
    }
?>