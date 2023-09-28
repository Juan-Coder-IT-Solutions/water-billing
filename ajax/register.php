<?php 
	include '../core/config.php';

    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    	$fetch 	= $mysqli->query("SELECT * FROM tbl_users WHERE username='$username'");
		if($fetch->num_rows > 0){ //check username
			echo 2;
		}else{
			$query = $mysqli->query("INSERT INTO tbl_users SET `user_fname` ='$fname', `user_mname`='$mname', `user_lname`='$lname', `username`='$username', password='$password', user_category='C'");

		    if($query){
		        echo 1;
		    }else{
		       	echo 0;
		    }
		}

   	
?>