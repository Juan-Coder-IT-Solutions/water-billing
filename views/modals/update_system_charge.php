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
	      		<input type="hidden" class="form-control form-control-sm" id="update_system_charge_id" name="update_system_charge_id">

	            <div class="form-group">
                  <label>Customer Type:</label>
                  <select class="form-control form-control-sm" id="update_customer_type" name="update_customer_type" required>
                    <option value='C'>Commercial</option>
                    <option value='R'>Residential</option>
                  </select>
                </div>

                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control form-control-sm" id="update_system_charge_name" name="update_system_charge_name" placeholder="System charge name" autocomplete="off" required>
                </div>

                <div class="form-group">
                    <label>Amount:</label>
                    <input type="number" class="form-control form-control-sm" id="update_amount" name="update_amount" placeholder="Amount" autocomplete="off">
                </div>

                <div class="form-group">
                    <label>Kwh:</label>
                    <input type="number" class="form-control form-control-sm" id="update_kwh" name="update_kwh" placeholder="Kilo watt hour" autocomplete="off">
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