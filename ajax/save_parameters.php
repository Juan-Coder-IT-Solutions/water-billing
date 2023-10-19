<?php 
	include '../core/config.php';
	$c_cubic_meter_rate 	= $mysqli -> real_escape_string($_POST['c_cubic_meter_rate']);
    $c_late_penalty_amount 	= $mysqli -> real_escape_string($_POST['c_late_penalty_amount']);
    $r_cubic_meter_rate 	= $mysqli -> real_escape_string($_POST['r_cubic_meter_rate']);
    $r_late_penalty_amount 	= $mysqli -> real_escape_string($_POST['r_late_penalty_amount']);

    //COMMERCIAL
	$fetch 	= $mysqli->query("SELECT * FROM tbl_system_charges WHERE customer_type='C'");
	if($fetch->num_rows > 0){
		$mysqli->query("UPDATE tbl_system_charges SET `cubic_meter_rate`='$c_cubic_meter_rate', `late_penalty_amount`='$c_late_penalty_amount' WHERE customer_type='C'") or die(mysql_error());
	}else{
		
		$query = $mysqli->query("INSERT INTO tbl_system_charges SET `customer_type` ='C', `cubic_meter_rate`='$c_cubic_meter_rate', `late_penalty_amount`='$c_late_penalty_amount'");
	}

	//RESIDENTIAL
	$fetch 	= $mysqli->query("SELECT * FROM tbl_system_charges WHERE customer_type='R'");
	if($fetch->num_rows > 0){
		$mysqli->query("UPDATE tbl_system_charges SET `cubic_meter_rate`='$r_cubic_meter_rate', `late_penalty_amount`='$r_late_penalty_amount' WHERE customer_type='R'") or die(mysql_error());
	}else{
		
		$query = $mysqli->query("INSERT INTO tbl_system_charges SET `customer_type` ='R', `cubic_meter_rate`='$r_cubic_meter_rate', `late_penalty_amount`='$r_late_penalty_amount'");
	}

	echo 1;
?>