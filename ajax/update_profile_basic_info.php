<?php
	include '../core/config.php';

	if(isset($_POST['basic_info_user_id'])){
		$user_id		= $_POST['basic_info_user_id'];
		$user_fname		= $_POST['user_fname'];
		$user_mname		= $_POST['user_mname'];	
		$user_lname		= $_POST['user_lname'];
		$username		= $_POST['username'];

		$contact_number	= $_POST['contact_number'];
		$address		= $_POST['address'];

		$fetch 	= $mysqli->query("SELECT * FROM tbl_users WHERE username='$username' AND user_id != '$user_id'");
		if($fetch->num_rows > 0){ //check username
			echo 2;
		}else{
			$update_data = "user_fname = '$user_fname', user_mname = '$user_mname', user_lname = '$user_lname', username = '$username', contact_number = '$contact_number', address = '$address'";
		

			$mysqli->query("UPDATE tbl_users SET $update_data WHERE user_id = '$user_id' ") or die(mysql_error());
			echo 1;
		}
	}
?>