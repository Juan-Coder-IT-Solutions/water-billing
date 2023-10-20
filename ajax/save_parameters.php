<?php 
	include '../core/config.php';
	$c_cubic_meter_rate 	= $mysqli -> real_escape_string($_POST['c_cubic_meter_rate']);
    $c_late_penalty_amount 	= $mysqli -> real_escape_string($_POST['c_late_penalty_amount']);
    $c_maximum_cubic 	= $mysqli -> real_escape_string($_POST['c_maximum_cubic']);
    $c_minimum_rate 	= $mysqli -> real_escape_string($_POST['c_minimum_rate']);

    $r_cubic_meter_rate 	= $mysqli -> real_escape_string($_POST['r_cubic_meter_rate']);
    $r_late_penalty_amount 	= $mysqli -> real_escape_string($_POST['r_late_penalty_amount']);
    $r_maximum_cubic 	= $mysqli -> real_escape_string($_POST['r_maximum_cubic']);
    $r_minimum_rate 	= $mysqli -> real_escape_string($_POST['r_minimum_rate']);

    //COMMERCIAL
	$fetch 	= $mysqli->query("SELECT * FROM tbl_system_charges WHERE customer_type='C'");
	if($fetch->num_rows > 0){

		$mysqli->query("UPDATE tbl_system_charges SET `cubic_meter_rate`='$c_cubic_meter_rate', `late_penalty_amount`='$c_late_penalty_amount', `maximum_cubic`='$c_maximum_cubic', `minimum_rate`='$c_minimum_rate' WHERE customer_type='C'") or die(mysql_error());
	}else{
		
		$query = $mysqli->query("INSERT INTO tbl_system_charges SET `customer_type` ='C', `cubic_meter_rate`='$c_cubic_meter_rate', `late_penalty_amount`='$c_late_penalty_amount', `maximum_cubic`='$c_maximum_cubic', `minimum_rate`='$c_minimum_rate'");
	}

	//RESIDENTIAL
	$fetch 	= $mysqli->query("SELECT * FROM tbl_system_charges WHERE customer_type='R'");
	if($fetch->num_rows > 0){
		$mysqli->query("UPDATE tbl_system_charges SET `cubic_meter_rate`='$r_cubic_meter_rate', `late_penalty_amount`='$r_late_penalty_amount', `maximum_cubic`='$r_maximum_cubic', `minimum_rate`='$r_minimum_rate' WHERE customer_type='R'") or die(mysql_error());
	}else{
		
		$query = $mysqli->query("INSERT INTO tbl_system_charges SET `customer_type` ='R', `cubic_meter_rate`='$r_cubic_meter_rate', `late_penalty_amount`='$r_late_penalty_amount', `maximum_cubic`='$r_maximum_cubic', `minimum_rate`='$r_minimum_rate'");
	}

	echo 1;
?>