<?php 
	include '../core/config.php';
    $customer_type 		= $mysqli -> real_escape_string($_POST['customer_type']);
    $system_charge_name = $mysqli -> real_escape_string($_POST['system_charge_name']);
    $amount 			= $mysqli -> real_escape_string($_POST['amount']);
    $kwh 				= $mysqli -> real_escape_string($_POST['kwh']);

	$mysqli->query("INSERT INTO tbl_system_charges SET `customer_type` ='$customer_type',`system_charge_name` ='$system_charge_name',`amount` ='$amount',`kwh` ='$kwh'");

    echo 1;
?>