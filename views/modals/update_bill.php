<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="mdi mdi-lead-pencil"></i> Update Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      	<form role="form" method="POST" id="form_submit_update_form">
	      	<div class="modal-body">
	      		<!--HIDDEN PRIMARY ID -->
	      		<input type="hidden" class="form-control form-control-sm" id="update_bill_id" name="update_bill_id">


	               <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Customer:</label>
                    <select class="form-control form-control-sm" id="update_user_id" name="update_user_id" required>
                      <?php 
                        echo "<option value=''>Please Choose:</option>";
                        $fetch_user_addmodal = $mysqli->query("SELECT * FROM tbl_users WHERE user_category='C'") or die(mysqli_error());
                        while ($user_addmodal_row = $fetch_user_addmodal->fetch_array()) {
                        echo "<option value='$user_addmodal_row[user_id]'>".userFullName($user_addmodal_row['user_id'])."</option>";
                        }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Billing Date:</label>
                    <input type="date" class="form-control form-control-sm" id="update_billing_date" name="update_billing_date" placeholder="Billing Date" autocomplete="off" required>
                  </div>
                </div>
                
              </div>

              <div class="row">
                <div class="col-sm-6">
                   <div class="form-group">
                      <label>Cubic Meter Rate:</label>
                      <input type="number" class="form-control form-control-sm" id="update_cubic_meter_rate" name="update_cubic_meter_rate" placeholder="Cubic Meter Rate" autocomplete="off" required>
                  </div>
                </div>

                <div class="col-sm-6">
                   <div class="form-group">
                      <label>Penalty Amount:</label>
                      <input type="number" class="form-control form-control-sm" id="update_penalty_amount" name="update_penalty_amount" placeholder="Cubic Meter Rate" autocomplete="off" required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                   <div class="form-group">
                      <label>Maximum Cubic:</label>
                      <input type="number" class="form-control form-control-sm" id="update_maximum_cubic" name="update_maximum_cubic" placeholder="Maximum Cubic" autocomplete="off" required>
                  </div>
                </div>

                <div class="col-sm-6">
                   <div class="form-group">
                      <label>Minumum Rate:</label>
                      <input type="number" class="form-control form-control-sm" id="update_minimum_rate" name="update_minimum_rate" placeholder="Minumum Rate" autocomplete="off" required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                   <div class="form-group">
                      <label>Previous Reading:</label>
                      <input type="number" class="form-control form-control-sm" id="update_previous_reading" name="update_previous_reading" placeholder="Previous Reading" autocomplete="off" required>
                  </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                      <label>Current Reading:</label>
                      <input type="number" class="form-control form-control-sm" id="update_current_reading" name="update_current_reading" placeholder="Current Reading" autocomplete="off" required>
                    </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                      <label>Due Date:</label>
                      <input type="date" class="form-control form-control-sm" id="update_due_date" name="update_due_date" placeholder="Due Date" autocomplete="off" required>
                    </div>
                </div>
              </div>
        
	      	</div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary btn-fw btn-sm" data-dismiss="modal"><i class="mdi mdi-close-circle"></i> Close</button>
            <button type="submit" class="btn btn-outline-primary btn-fw btn-sm" id="form_btn_update_form"><i class="mdi mdi-check-circle"></i> Save</button>
          </div>
	    </form>
    </div>
  </div>
</div>

<!-- <script type="text/javascript">
  function get_update_customer_system_charges(){
    var user_id = $("#update_user_id").val();
    $.post("ajax/get_customer_system_charges.php",{
      user_id:user_id
    },function(data){
      var get_data = JSON.parse(data);
      $("#update_cubic_meter_rate").val(get_data[0].cubic_meter_rate);
      $("#update_penalty_amount").val(get_data[0].late_penalty_amount);
      $("#update_maximum_cubic").val(get_data[0].maximum_cubic);
      $("#update_minimum_rate").val(get_data[0].minimum_rate);
      $("#update_previous_reading").val(get_data[0].previous_reading);
    });
  }

</script> -->