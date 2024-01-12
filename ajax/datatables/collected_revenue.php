<?php
	include '../../core/config.php';

	$start_date = date("Y-m-01",strtotime($_POST['start_date']));
	$end_date   = date("Y-m-t",strtotime($_POST['end_date']));


$begin = new DateTime($start_date);
$end = new DateTime($end_date);

$interval = DateInterval::createFromDateString('1 month');
$period = new DatePeriod($begin, $interval, $end);

	$response['data'] = array();
    $count = 1;
    foreach ($period as $dt) {
        $date_ = $dt->format("Y-m");

        $fetch = $mysqli->query("SELECT SUM(payment_amount) FROM tbl_payments WHERE DATE_FORMAT(payment_date,'%Y-%m')='$date_'") or die(mysqli_error());
        $row = $fetch->fetch_array();

        $list = array();
        $list['count']          = $count++;
        $list['date'] 			= $dt->format("F Y");
        $list['amount'] 		= $row[0]*1;


        array_push($response['data'], $list);
    }
	

	echo json_encode($response);
?>