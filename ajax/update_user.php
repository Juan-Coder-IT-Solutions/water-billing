<?php
	include '../core/config.php';

	if(isset($_POST['update_user_id'])){
		$user_id		= $_POST['update_user_id'];
		$user_category	= $_POST['update_user_category'];
		$user_fname		= $_POST['update_user_fname'];
		$user_mname		= $_POST['update_user_mname'];	
		$user_lname		= $_POST['update_user_lname'];
		$username		= $_POST['update_username'];
		$password_		= $_POST['update_password'];

		$contact_number	= $_POST['update_contact_number'];
		$address		= $_POST['update_address'];
		$customer_type		= $_POST['update_customer_type'];

		$fetch 	= $mysqli->query("SELECT * FROM tbl_users WHERE username='$username' AND user_id != '$user_id'");
		if($fetch->num_rows > 0){ //check username
			echo 2;
		}else{
			if($password_==""){
				$update_data = "user_category='$user_category', user_fname = '$user_fname', user_mname = '$user_mname', user_lname = '$user_lname', username = '$username', contact_number = '$contact_number', address = '$address', customer_type='$customer_type'";
			}else{
				$password = md5($password_);
				$update_data = "user_category='$user_category', user_fname = '$user_fname', user_mname = '$user_mname', user_lname = '$user_lname', username = '$username', password = '$password', contact_number = '$contact_number', address = '$address', customer_type='$customer_type'";
			}

			$mysqli->query("UPDATE tbl_users SET $update_data WHERE user_id = '$user_id' ") or die(mysql_error());
			echo 1;
		}
	}
?>