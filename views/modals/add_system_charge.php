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
                  <label>Customer Type:</label>
                  <select class="form-control form-control-sm" id="customer_type" name="customer_type" required>
                    <option value='C'>Commercial</option>
                    <option value='R'>Residential</option>
                  </select>
                </div>

                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control form-control-sm" name="system_charge_name" placeholder="System charge name" autocomplete="off" required>
                </div>

                <div class="form-group">
                    <label>Amount:</label>
                    <input type="number" class="form-control form-control-sm" name="amount" placeholder="Amount" autocomplete="off">
                </div>

                <div class="form-group">
                    <label>Kwh:</label>
                    <input type="number" class="form-control form-control-sm" name="kwh" placeholder="Kilo watt hour" autocomplete="off">
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