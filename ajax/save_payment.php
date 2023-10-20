<?php 
	include '../core/config.php';
	$user_id 		= $_SESSION['user_id'];
    $bill_id 		= $mysqli -> real_escape_string($_POST['payment_bill_id']);
    $payment_amount = $mysqli -> real_escape_string($_POST['payment_amount']);

	if($payment_amount>0){
		$get_remaining_balance = get_remaining_balance($bill_id);
		if($payment_amount>$get_remaining_balance){ //PAYMENT AMOUNT EXCEEDS THE REMAINING BALANCE
			echo 2;
		}else{
			$query = $mysqli->query("INSERT INTO tbl_payments SET `bill_id` ='$bill_id', `payment_amount`='$payment_amount', `encoded_by`='$user_id'");

			//UPDATE BILL TO SAVED OR PAID
			$update_bill_status = $get_remaining_balance==$payment_amount?"P":"S";
			$mysqli->query("UPDATE tbl_bills SET status='$update_bill_status' WHERE bill_id = '$bill_id' ") or die(mysql_error());
			

		    if($query){
		        echo 1;
		    }else{
		       	echo 0;
		    }
		}

			
	}
	

?>