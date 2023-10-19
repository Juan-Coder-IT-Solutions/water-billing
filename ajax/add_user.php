<?php 
	include '../core/config.php';
	$user_category 	= $mysqli -> real_escape_string($_POST['user_category']);
    $user_fname 	= $mysqli -> real_escape_string($_POST['user_fname']);
    $user_mname 	= $mysqli -> real_escape_string($_POST['user_mname']);
    $user_lname 	= $mysqli -> real_escape_string($_POST['user_lname']);
    $username 		= $mysqli -> real_escape_string($_POST['username']);
    $contact_number = $mysqli -> real_escape_string($_POST['contact_number']);
    $address 		= $mysqli -> real_escape_string($_POST['address']);
    $customer_type 	= $mysqli -> real_escape_string($_POST['customer_type']);
    $password 		= md5($_POST['password']);

	$fetch 	= $mysqli->query("SELECT * FROM tbl_users WHERE username='$username'");
	if($fetch->num_rows > 0){ //check username
		echo 2;
	}else{
		
		$query = $mysqli->query("INSERT INTO tbl_users SET `user_fname` ='$user_fname', `user_mname`='$user_mname', `user_lname`='$user_lname', `username`='$username', password='$password', `user_category`='$user_category',`contact_number`='$contact_number',address='$address', customer_type='$customer_type'");
		$last_id = $mysqli -> insert_id;

		$account_number = sprintf('%06d', $last_id);
		$mysqli->query("UPDATE tbl_users SET account_number='$account_number' WHERE user_id = '$last_id' ") or die(mysql_error());

	    if($query){
	        echo 1;
	    }else{
	       	echo 0;
	    }
	}
?>