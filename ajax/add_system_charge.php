<?php 
	include '../core/config.php';
    $customer_type 			= $mysqli -> real_escape_string($_POST['customer_type']);
    $system_charge_name 	= $mysqli -> real_escape_string($_POST['system_charge_name']);
    $cubic_meter_rate 		= $mysqli -> real_escape_string($_POST['cubic_meter_rate']);
    $late_penalty_amount 		= $mysqli -> real_escape_string($_POST['late_penalty_amount']);

	$mysqli->query("INSERT INTO tbl_system_charges SET `customer_type` ='$customer_type',`system_charge_name` ='$system_charge_name',`cubic_meter_rate` ='$cubic_meter_rate',`late_penalty_amount` ='$late_penalty_amount'");

    echo 1;
?>