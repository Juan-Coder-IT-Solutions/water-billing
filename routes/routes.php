<?php
	$view = "views/";

	if($page == 'dashboard' || $page == ''){
		require $view.'dashboard.php';
	}else if($page == 'accounts_manager'){
		require $view.'accounts_manager.php';
	}else{
		require $view.'404.php';
	}
?>