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
	            <div class="form-group">
                <label>Customer:</label>
                <select class="form-control form-control-sm" name="user_id" required>
                  <?php 
                  	$fetch_user_addmodal = $mysqli->query("SELECT * FROM tbl_users WHERE user_category='C'") or die(mysqli_error());
					          while ($user_addmodal_row = $fetch_user_addmodal->fetch_array()) {
                    echo "<option value='$user_addmodal_row[user_id]'>".userFullName($user_addmodal_row['user_id'])."</option>";
                  	}
                  ?>
                </select>
              </div>

                <div class="form-group">
                    <label>Previous Bills:</label>
                    <input type="number" class="form-control form-control-sm" name="previous_bill" placeholder="Previous Bills" autocomplete="off" required>
                </div>

                <div class="form-group">
                    <label>Present Bill:</label>
                    <input type="number" class="form-control form-control-sm" name="present_bill" placeholder="Present Bill" autocomplete="off" required>
                </div>

                <div class="form-group">
                  <label>Status:</label>
                  <select class="form-control form-control-sm" name="status" required>
                    <option value="U">Unpaid</option>
                    <option value="P">Paid</option>
                  </select>
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