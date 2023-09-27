<?php 
	include '../core/config.php';

	if(isset($_POST['username'])){
		$username 		= $mysqli -> real_escape_string($_POST['username']);
		$password_ 		= $mysqli -> real_escape_string($_POST['password']);
		$password 		= md5($password_);

		$fetch 	= $mysqli->query("SELECT * FROM tbl_users WHERE username='$username' AND password='$password'");
		$row 	= $fetch->fetch_array();
		$_SESSION['user_id'] = $row['user_id'];
		
		echo ($fetch->num_rows > 0)?1:0;
	}
?>