<?php
	include '../core/config.php';

	if(isset($_POST['password_user_id'])){
		$user_id			= $_POST['password_user_id'];
		$old_password		= md5($_POST['old_password']);
		$new_password		= $_POST['new_password'];	
		$confirm_password	= $_POST['confirm_password'];


		$fetch 	= $mysqli->query("SELECT * FROM tbl_users WHERE password='$old_password' AND user_id = '$user_id'");
		if($fetch->num_rows==0){
			echo 2;
		}else if($new_password!=$confirm_password){
			echo 3;
		}else{
			$confirm_password_ = md5($confirm_password);
			$update_data = "password = '$confirm_password_'";
		
			$mysqli->query("UPDATE tbl_users SET $update_data WHERE user_id = '$user_id' ") or die(mysql_error());
			echo 1;
		}
	}
?>