<?php 
	include '../core/config.php';
	$user_category 	= $mysqli -> real_escape_string($_POST['user_category']);
    $user_fname 	= $mysqli -> real_escape_string($_POST['user_fname']);
    $user_mname 	= $mysqli -> real_escape_string($_POST['user_mname']);
    $user_lname 	= $mysqli -> real_escape_string($_POST['user_lname']);
    $username 		= $mysqli -> real_escape_string($_POST['username']);
    $password 		= md5($_POST['password']);

    	$fetch 	= $mysqli->query("SELECT * FROM tbl_users WHERE username='$username'");
		if($fetch->num_rows > 0){ //check username
			echo 2;
		}else{
			$query = $mysqli->query("INSERT INTO tbl_users SET `user_fname` ='$user_fname', `user_mname`='$user_mname', `user_lname`='$user_lname', `username`='$username', password='$password', user_category='$user_category'");

		    if($query){
		        echo 1;
		    }else{
		       	echo 0;
		    }
		}

   	
?>