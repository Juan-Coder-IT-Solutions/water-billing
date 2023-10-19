<?php
	include '../core/config.php';

	if(isset($_POST['update_system_charge_id'])){
		$system_charge_id	= $_POST['update_system_charge_id'];
		$customer_type		= $_POST['update_customer_type'];
		$system_charge_name	= $_POST['update_system_charge_name'];
		$amount				= $_POST['update_amount'];
		$kwh				= $_POST['update_kwh'];
	
		$update_data = "customer_type='$customer_type', system_charge_name = '$system_charge_name', amount = '$amount', kwh = '$kwh'";
	
		$mysqli->query("UPDATE tbl_system_charges SET $update_data WHERE system_charge_id = '$system_charge_id' ") or die(mysql_error());
		echo 1;
		
	}
?>