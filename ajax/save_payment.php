<?php 
	include '../core/config.php';
	$user_id 		= $_SESSION['user_id'];
    $bill_id 		= $mysqli -> real_escape_string($_POST['payment_bill_id']);
    $payment_amount = $mysqli -> real_escape_string($_POST['payment_amount']);

	if($payment_amount>0){
		$query = $mysqli->query("INSERT INTO tbl_payments SET `bill_id` ='$bill_id', `payment_amount`='$payment_amount', `encoded_by`='$user_id'");

	    if($query){
	        echo 1;
	    }else{
	       	echo 0;
	    }
	}
	

?>