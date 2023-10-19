<?php
	include '../core/config.php';
	$bill_id = $_POST['payment_bill_id'];
?>
<div class="card-body">
	<div class="table-responsive">
  		<table id="payment_datatable" class="table table-bordered">
    		<thead>
      			<tr>
      			   	<th style="width: 5px;"></th>
                	<th>Payment</th>
                	<th>Date Added</th>
      			</tr>
    		</thead>
    		<tbody>
    			<?php 					
    				$fetch = $mysqli->query("SELECT * FROM tbl_payments WHERE bill_id='$bill_id'") or die(mysqli_error());
    				$total_amount = 0;
					while ($row = $fetch->fetch_array()) {
						echo "<tr>
			      			   	<td><center><button class='btn btn-outline-danger btn-sm' data-toggle='tooltip' title='Payment' onclick='delete_payment($row[payment_id])'><i class='mdi mdi-delete'></i></button></center></td>
		                		<td>$row[payment_amount]</td>
			                	<td>$row[date_added]</td>
			      			</tr>";

			      			$total_amount += $row['payment_amount'];
					}
    			?>
    		</tbody>
    		<tfoot>
    			<tr>
    				<th>Total Amount:</th>
    				<th><?= number_format($total_amount,2) ?></th>
    				<th></th>
    			</tr>
    		</tfoot>
  		</table>
	</div>
</div>