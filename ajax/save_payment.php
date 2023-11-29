<?php 
	include '../core/config.php';
	$user_id 		= $_SESSION['user_id'];
	$date_added    	= date("Y-m-d H:i:s",strtotime($system_date));
    $bill_id 		= $mysqli -> real_escape_string($_POST['payment_bill_id']);
    $payment_date 	= $mysqli -> real_escape_string($_POST['payment_date']);
    $payment_amount = $mysqli -> real_escape_string($_POST['payment_amount']);

	if($payment_amount>0){
		$fetch_billing = $mysqli->query("SELECT * FROM tbl_bills WHERE bill_id='$bill_id'") or die(mysqli_error());
		$billing_row 	= $fetch_billing->fetch_array();
		$due_date 		= $billing_row['due_date'];
		$total_balance	= get_billing_total_balance($billing_row['bill_id']);
		$total_payment 	= get_billing_total_payment($bill_id) + $payment_amount;

		if($due_date<$payment_date){
			$final_total_balance =  $total_balance + $billing_row['penalty_amount'];
		}else{
			$final_total_balance =  $total_balance;
		}
		
		if($total_payment>$final_total_balance){ //PAYMENT AMOUNT EXCEEDS THE REMAINING BALANCE
			echo 2;
		}else{
			$query = $mysqli->query("INSERT INTO tbl_payments SET `bill_id` ='$bill_id', `payment_amount`='$payment_amount',`payment_date`='$payment_date', `encoded_by`='$user_id',`date_added`='$date_added'");

			//UPDATE BILL TO SAVED OR PAID
			$update_bill_status = $final_total_balance==$total_payment?"P":"S";
			$mysqli->query("UPDATE tbl_bills SET status='$update_bill_status' WHERE bill_id = '$bill_id' ") or die(mysql_error());

			if($query){
		        echo 1;
		    }else{
		       	echo 0;
		    }
		}


	}
	

?>