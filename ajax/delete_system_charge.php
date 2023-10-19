<?php
	include '../core/config.php';

	$id = $_POST['id'];

	foreach ($id as $primary_id) {
		$mysqli->query("DELETE FROM tbl_system_charges WHERE system_charge_id = '$primary_id' ");
	}

	echo 1;
?>