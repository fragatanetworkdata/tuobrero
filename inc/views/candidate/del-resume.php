<?php
session_start();
$user_id = isset($_SESSION['user_id'])?$_SESSION['user_id']:'';
if(isset($_REQUEST['del'])){
    $resume_id = $_REQUEST['del'];
    include_once("../../../func/sql.php");
    $con->query("delete from resumes where resume_id = '$resume_id' and user_id = '$user_id'");
    if(($con->affected_rows)>0) echo "success";
    else echo "error";

}
?>