<?php 
	include '../core/config.php';
    $bill_id = $mysqli -> real_escape_string($_POST['bill_id']);
    $fetch = $mysqli->query("SELECT * FROM tbl_bills WHERE bill_id='$bill_id'") or die(mysqli_error());
    $row = $fetch->fetch_array();

    $customer_type 	= user_info("customer_type",$row['user_id']);
    $customer_type_ = $customer_type=="C"?"Commercial":(($customer_type=="R")?"Residential":"");
?>

<div class="col-sm-12">
Water Billing System <br>
............................................................... <br>
STATEMENT OF ACCOUNT <br>
............................................................... <br>
Account Name: <?= userFullName($row['user_id']);?> <br>
Account #: <?= user_info("account_number",$row['user_id']);?> <br>
Address: <?= user_info("address",$row['user_id']);?> <br>
Meter #: <?= user_info("meter_number",$row['user_id']);?> <br>
Classification: <?= $customer_type_?> <br>
Due Date: <?= $row['due_date'];?> <br>
............................................................... <br>
Billing Period: <br>
&nbsp &nbsp &nbsp &nbsp &nbsp <?= date("F Y",strtotime($row['billing_date']))." to ".date("F Y",strtotime($row['due_date']));?><br>
Previous Reading: <br>
&nbsp &nbsp &nbsp &nbsp &nbsp <?= $row['previous_reading'];?> <br>
Current Reading: <br>
&nbsp &nbsp &nbsp &nbsp &nbsp <?= $row['current_reading'];?> <br>
Consume:  <?= $row['current_reading']-$row['previous_reading'];?><br>
............................................................... <br>
Total Amount: <?= number_format($row['minimum_rate'],2);?> <br>
Amount After Due: <?= number_format($row['minimum_rate']+$row['penalty_amount'],2);?> <br>
............................................................... <br>
Water Billing Receipt <br><br>
Meter Reader: <?= userFullName($row['encoded_by']);?><br>
Date Issued: <?= date("d/m/Y H:i:s",strtotime($row['date_added']));?> <br><br>
............................................................... <br>
Please pay on or before due date to avoid <br> penalty and disconnection. <br>
</div>