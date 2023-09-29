<?php
	include '../core/config.php';

	$user_id = $_POST['primary_id'];
	$fetch = $mysqli->query("SELECT * FROM tbl_bills WHERE user_id = '$user_id'") or die(mysqli_error());

?>

	<div class="card-body">
		<?php 
			if($fetch->num_rows>0){
		?>
	    	<div class="table-responsive">
	      		<table id="view_bills_datatable" class="table table-bordered">
	        		<thead>
	          			<tr>
	                 		<th>Previous Bill</th>
				            <th>Present Bill</th>
				            <th>Date Added</th>
	          			</tr>
	        		</thead>
	        		<tbody>
	        			<?php 
	        				while ($row = $fetch->fetch_array()) {
		        				echo "<tr>
				                 		<td>".number_format($row['previous_bill'],2)."</td>
							            <td>".number_format($row['present_bill'],2)."</td>
							            <td>".date("F j, Y h:i A",strtotime($row['date_added']))."</td>
				          			</tr>";
			          		}
	        			?>
	        		</tbody>
	      		</table>
	    	</div>
	    <?php }else{ echo "NO DATA FOUND"; } ?>
  	</div>