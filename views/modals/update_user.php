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
	      		<input type="hidden" class="form-control form-control-sm" id="update_user_id" name="update_user_id">

	      		<div class="form-group">
                  <label>User Category:</label>
                  <select class="form-control form-control-sm" id="update_user_category"  name="update_user_category" required>
                    <option value="U">Customer</option>
                    <option value="A">Admin</option>
                  </select>
                </div>

	      		<div class="form-group">
                    <label>First Name:</label>
                    <input type="text" class="form-control form-control-sm" id="update_user_fname" name="update_user_fname" placeholder="First Name" autocomplete="off" required>
                </div>

                <div class="form-group">
                    <label>Middle Name:</label>
                    <input type="text" class="form-control form-control-sm" id="update_user_mname" name="update_user_mname" placeholder="Middle Name" autocomplete="off" required>
                </div>

                <div class="form-group">
                    <label>Last Name:</label>
                    <input type="text" class="form-control form-control-sm" id="update_user_lname" name="update_user_lname" placeholder="Last Name" autocomplete="off" required>
                </div>

                <div class="form-group">
                    <label>Username:</label>
                    <input type="text" class="form-control form-control-sm" id="update_username" name="update_username" placeholder="Username" autocomplete="off" required>
                </div>

                <div class="form-group">
                	<label>Password</label>
                	<input type="password" class="form-control form-control-sm" id="update_password" name="update_password" placeholder="Password" autocomplete="off">
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