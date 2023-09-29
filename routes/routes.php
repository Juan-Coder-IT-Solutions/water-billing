<?php
	$view = "views/";

	if($page == 'dashboard' || $page == ''){
		require $view.'dashboard.php';
	}else if($page == 'accounts_manager'){
		require $view.'users.php';
	}else if($page == 'announcements'){
		require $view.'announcements.php';
	}else if($page == 'feedbacks'){
		require $view.'feedbacks.php';
	}else{
		require $view.'404.php';
	}
?>