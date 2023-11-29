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
	      		<input type="hidden" class="form-control form-control-sm" id="update_announcement_id" name="update_announcement_id">

            <div class="form-group">
                  <label>Date:</label>
                  <input type="date" class="form-control form-control-sm" id="update_announcement_date" name="update_announcement_date" placeholder="Announcement Date" autocomplete="off" required>
              </div>

	      		 <div class="form-group">
	                <label>Title:</label>
	                <input type="text" class="form-control form-control-sm" id="update_announcement_title" name="update_announcement_title" placeholder="Announcement Title" autocomplete="off" required>
	            </div>

	            <div class="form-group">
	              	<label>Content:</label>
	              	<textarea class="form-control form-control-sm" id="update_announcement_content" name="update_announcement_content" rows="4"  autocomplete="off" placeholder="Announcement Content"></textarea>
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