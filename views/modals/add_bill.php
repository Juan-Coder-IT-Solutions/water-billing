<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="mdi mdi-plus-circle"></i> Add Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      	<form role="form" method="POST" id="form_submit_add_form">
	      	<div class="modal-body">
	            <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Customer:</label>
                    <select class="js-example-basic-single select2-hidden-accessible form-control form-control-sm" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" id="user_id" name="user_id" onchange="get_customer_system_charges()" required>
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
                    <input type="date" class="form-control form-control-sm" id="billing_date" name="billing_date" placeholder="Billing Date" autocomplete="off" value="<?=date('Y-m-d')?>" onchange="get_customer_system_charges()" required>
                  </div>
                </div>
                
              </div>

              <div class="row">
                <div class="col-sm-6">
                   <div class="form-group">
                      <label>Cubic Meter Rate:</label>
                      <input type="number" class="form-control form-control-sm" id="cubic_meter_rate" name="cubic_meter_rate" placeholder="Cubic Meter Rate" autocomplete="off" required>
                  </div>
                </div>

                <div class="col-sm-6">
                   <div class="form-group">
                      <label>Penalty Amount:</label>
                      <input type="number" class="form-control form-control-sm" id="penalty_amount" name="penalty_amount" placeholder="Cubic Meter Rate" autocomplete="off" required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                   <div class="form-group">
                      <label>Flat Rate:</label>
                      <input type="number" class="form-control form-control-sm" id="maximum_cubic" name="maximum_cubic" placeholder="Flat Rate" autocomplete="off" required>
                  </div>
                </div>

                <div class="col-sm-6">
                   <div class="form-group">
                      <label>Minumum Rate:</label>
                      <input type="number" class="form-control form-control-sm" id="minimum_rate" name="minimum_rate" placeholder="Minumum Rate" autocomplete="off" required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                   <div class="form-group">
                      <label>Previous Reading:</label>
                      <input type="number" class="form-control form-control-sm" id="previous_reading" name="previous_reading" placeholder="Previous Reading" autocomplete="off" required>
                  </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                      <label>Current Reading:</label>
                      <input type="number" class="form-control form-control-sm" name="current_reading" placeholder="Current Reading" autocomplete="off" required>
                    </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                      <label>Due Date:</label>
                      <input type="date" class="form-control form-control-sm" id="due_date" name="due_date" placeholder="Due Date" autocomplete="off" required>
                    </div>
                </div>
              </div>
	      	</div>
          
	      	<div class="modal-footer">
        		<button type="button" class="btn btn-outline-secondary btn-fw btn-sm" data-dismiss="modal"><i class="mdi mdi-close-circle"></i> Close</button>
        		<button type="submit" class="btn btn-outline-primary btn-fw btn-sm" id="form_btn_add_form"><i class="mdi mdi-check-circle"></i> Save</button>
	      	</div>
	    </form>
    </div>
  </div>
</div>

<script type="text/javascript">
function get_customer_system_charges(){
  var user_id = $("#user_id").val();
  var billing_date = $("#billing_date").val();
  $.post("ajax/get_customer_system_charges.php",{
    user_id:user_id,
    billing_date:billing_date
  },function(data){
    var get_data = JSON.parse(data);
    $("#cubic_meter_rate").val(get_data[0].cubic_meter_rate);
    $("#penalty_amount").val(get_data[0].late_penalty_amount);
    $("#maximum_cubic").val(get_data[0].maximum_cubic);
    $("#minimum_rate").val(get_data[0].minimum_rate);
    $("#previous_reading").val(get_data[0].previous_reading*1);
    $("#due_date").val(get_data[0].due_date);
  });
}
</script>