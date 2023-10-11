<?php 
	include '../core/config.php';
    $user_id 		= $mysqli -> real_escape_string($_POST['user_id']);
    $previous_bill 	= $mysqli -> real_escape_string($_POST['previous_bill']);
    $present_bill 	= $mysqli -> real_escape_string($_POST['present_bill']);
    $status 		= $mysqli -> real_escape_string($_POST['status']);

    
	$mysqli->query("INSERT INTO tbl_bills SET `user_id` ='$user_id',`previous_bill` ='$previous_bill',`present_bill` ='$present_bill',`status`='$status'");

    echo 1;
?>