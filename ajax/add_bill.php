<?php 
	include '../core/config.php';
    $user_id 			= $mysqli -> real_escape_string($_POST['user_id']);
    $billing_date 		= $mysqli -> real_escape_string($_POST['billing_date']);
    $cubic_meter_rate 	= $mysqli -> real_escape_string($_POST['cubic_meter_rate']);
    $penalty_amount 	= $mysqli -> real_escape_string($_POST['penalty_amount']);
    $previous_reading 	= $mysqli -> real_escape_string($_POST['previous_reading']);
    $current_reading 	= $mysqli -> real_escape_string($_POST['current_reading']);
    $due_date 			= $mysqli -> real_escape_string($_POST['due_date']);

    $maximum_cubic      = $mysqli -> real_escape_string($_POST['maximum_cubic']);
    $minimum_rate       = $mysqli -> real_escape_string($_POST['minimum_rate']);

    $status 			= "S";
    $encoded_by 		= $_SESSION['user_id'];
    $date_added         = date("Y-m-d H:i:s",strtotime($system_date));
    $get_billing_count_for_the_month = get_billing_count_for_the_month($user_id,$billing_date);
    if($get_billing_count_for_the_month>0){
        echo 2;
    }else{
        $mysqli->query("INSERT INTO tbl_bills SET `user_id` ='$user_id',`billing_date` ='$billing_date',`cubic_meter_rate` ='$cubic_meter_rate',`penalty_amount`='$penalty_amount',`previous_reading`='$previous_reading',`current_reading`='$current_reading',`due_date`='$due_date',`encoded_by`='$encoded_by',status='$status', maximum_cubic='$maximum_cubic',minimum_rate='$minimum_rate',`date_added`='$date_added'");

        echo 1;
    }
	
?>