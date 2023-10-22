<?php

function getCurrentDate()
{
	ini_set('date.timezone', 'UTC');
	//error_reporting(E_ALL);
	date_default_timezone_set('UTC');
	$today = date('H:i:s');
	$system_date = date('Y-m-d H:i:s', strtotime($today) + 28800);
	return $system_date;
}


function getUser($user_id)
{

	global $mysqli_connect;

	$fetchData = $mysqli_connect->query("SELECT user_fname,user_mname,user_lname FROM `tbl_users` WHERE user_id = '$user_id'");
	$row = $fetchData->fetch_array();

	return $row['user_fname'] . " " . $row['user_mname'] . $row['user_lname'];
}


function getCustomerType($user_id)
{

	global $mysqli_connect;

	$fetchData = $mysqli_connect->query("SELECT customer_type FROM `tbl_users` WHERE user_id = '$user_id'");
	$row = $fetchData->fetch_array();

	return $row['customer_type'];
}

function getParam($type)
{

	global $mysqli_connect;

	$fetchData = $mysqli_connect->query("SELECT * FROM `tbl_system_charges` WHERE customer_type = '$type'");
	$row = $fetchData->fetch_array();

	return $row;
}

function dueDAte($billing_date)
{
	$startDate = new DateTime($billing_date);
	$startDate->modify('+1 month');
	$startDate->setDate($startDate->format('Y'), $startDate->format('m'), 1);
	$dueDate = clone $startDate;
	$dueDate->modify('first day of this month +7 days');

	return $dueDate->format('Y-m-d');
}

function monthlyBilling($user_id)
{

	global $mysqli_connect;

	$date = getCurrentDate();
    $dateMonth = date('m', strtotime($date));
    $dateYear = date('Y', strtotime($date));

    $fetchData = $mysqli_connect->query("SELECT count(user_id) FROM tbl_bills WHERE user_id='$user_id' AND MONTH(billing_date) = $dateMonth AND YEAR(billing_date) = $dateYear") or die(mysqli_error());
    $count_rows = $fetchData->fetch_array();

    if ($count_rows[0] > 0) {
        return 1;
    } else {
		return 0;
	}
}
