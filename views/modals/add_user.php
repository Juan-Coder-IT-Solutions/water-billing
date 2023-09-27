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
                  <label>User Category:</label>
                  <select class="form-control form-control-sm" name="user_category" required>
                    <option value="U">Customer</option>
                    <option value="A">Admin</option>
                  </select>
                </div>

	      		<div class="form-group">
                    <label>First Name:</label>
                    <input type="text" class="form-control form-control-sm" name="user_fname" placeholder="First Name" autocomplete="off" required>
                </div>

                <div class="form-group">
                    <label>Middle Name:</label>
                    <input type="text" class="form-control form-control-sm" name="user_mname" placeholder="Middle Name" autocomplete="off" required>
                </div>

                <div class="form-group">
                    <label>Last Name:</label>
                    <input type="text" class="form-control form-control-sm" name="user_lname" placeholder="Last Name" autocomplete="off" required>
                </div>

                <div class="form-group">
                    <label>Username:</label>
                    <input type="text" class="form-control form-control-sm" name="username" placeholder="Username" autocomplete="off" required>
                </div>

                <div class="form-group">
                	<label>Password</label>
                	<input type="password" class="form-control form-control-sm" name="password" placeholder="Password" autocomplete="off" required>
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