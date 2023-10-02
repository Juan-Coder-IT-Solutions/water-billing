<div class="content-wrapper pb-0">
  	<div class="page-header flex-wrap">
    	<div class="header-left">
      		Manage your Profile here.
    	</div>

    	<div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
      		<div class="d-flex align-items-center">
        		<a href="#">
          			<p class="m-0 pr-3">Settings</p>
        		</a>
        		<a class="pl-3 mr-4" href="#">
          			<p class="m-0">Profile</p>
        		</a>
      		</div>
    	</div>
  	</div>

  	<div class="row">
 		<div class="col-sm-8">
 			<div class="card">
	          	<div class="card-body">
	            <h4 class="card-title">User Information</h4>
	            <p class="card-description text-success">Account Number: <?= user_info("account_number",$user_id) ?></p>
		            <form role="form" method="POST" id="form_submit_update_basic_info">
		            	<!--HIDDEN PRIMARY ID -->
		            	<input type="hidden" name="basic_info_user_id" value="<?=$user_id?>">

		              	<div class="row">
		              		<div class="col-sm-4">
			              		<div class="form-group">
				                	<label>First Name:</label>
			                    	<input type="text" class="form-control form-control-sm" name="user_fname" placeholder="First Name" value="<?= user_info("user_fname",$user_id) ?>" autocomplete="off" required>
				              	</div>
			              	</div>

			              	<div class="col-sm-4">
			              		<div class="form-group">
			              			<label>Middle Name:</label>
		                    		<input type="text" class="form-control form-control-sm" name="user_mname" placeholder="Middle Name" value="<?= user_info("user_mname",$user_id) ?>" autocomplete="off" required>
		                    	</div>
			              	</div>

			              	<div class="col-sm-4">
			              		<div class="form-group">
			              			<label>Last Name:</label>
	                    			<input type="text" class="form-control form-control-sm" name="user_lname" placeholder="Last Name" value="<?= user_info("user_lname",$user_id) ?>" autocomplete="off" required>
		                    	</div>
			              	</div>
		              	</div>

		              	<div class="row">
		              		<div class="col-sm-4">
			                	<div class="form-group">
			                  		<label>Address:</label>
			                  		<textarea class="form-control form-control-sm" name="address" rows="4"  autocomplete="off" placeholder="Address"><?= user_info("address",$user_id) ?></textarea>
			                	</div>
			              	</div>

			              	<div class="col-sm-4">
			                 	<div class="form-group">
			                    	<label>Contact Number:</label>
			                    	<input type="text" class="form-control form-control-sm" name="contact_number" placeholder="Contact Number" value="<?= user_info("contact_number",$user_id) ?>" autocomplete="off">
			                	</div>
			              	</div>

			              	<div class="col-sm-4">
				                <div class="form-group">
				                    <label>Username:</label>
				                    <input type="text" class="form-control form-control-sm" name="username" placeholder="Username" value="<?= user_info("username",$user_id) ?>" autocomplete="off" required>
				                </div>
				            </div>
			            </div>

		              	<button type="submit" class="btn btn-outline-primary btn-fw btn-sm" id="form_btn_update_basic_info" style="float: right;"><i class="mdi mdi-check-circle"></i> Save</button>
		            </form>
	          	</div>
	        </div>
 		</div>

 		<div class="col-sm-4">
 			<div class="card">
	          	<div class="card-body">
	            <h4 class="card-title">User Password</h4> <br>
	            <!-- <p class="card-description"></p> -->
		            <form role="form" method="POST" id="form_submit_update_password">
		            	<!--HIDDEN PRIMARY ID -->
		            	<input type="hidden" name="password_user_id" value="<?=$user_id?>">

		              	<div class="row">
		              		<div class="col-sm-12">
		              			<div class="form-group">
				                	<label>Old Password:</label>
			                    	<input type="password" class="form-control form-control-sm" name="old_password" placeholder="Old Password" autocomplete="off" required>
				              	</div>
		              		</div>

		              		<div class="col-sm-12">
		              			<div class="form-group">
			              			<label>New Password:</label>
		                    		<input type="password" class="form-control form-control-sm" name="new_password" placeholder="New Password" autocomplete="off" required>
		                    	</div>
		              		</div>

		              		<div class="col-sm-12">
		              			<div class="form-group">
			              			<label>Confirm New Password:</label>
		                			<input type="password" class="form-control form-control-sm" name="confirm_password" placeholder="Confirm New Password" autocomplete="off" required>
		                    	</div>
		              		</div>
		              	</div>


		              	<button type="submit" class="btn btn-outline-warning btn-fw btn-sm" id="form_btn_update_password" style="float: right;"><i class="mdi mdi-check-circle"></i> Save</button>
		            </form>
	          	</div>
	        </div>
 		</div>
  	</div>
</div>

<script type="text/javascript">
$(document).ready(function() { 
});
$("#form_submit_update_password").submit(function(e){
    e.preventDefault();
    $("#form_btn_update_password").prop('disabled', true);
    Swal.fire({
        title: 'Update',
        text: "Are you sure you want to proceed?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Proceed'
    }).then((result) => {
        if(result.isConfirmed){
            $.ajax({
            type:"POST",
            url:"ajax/update_profile_password.php",
            data:$("#form_submit_update_password").serialize(),
            success:function(data){
                if(data==1){
                  	Swal.fire({
                      	icon: 'success',
                      	title: 'All good!',
                      	text: 'Data updated successfully!'
                  	});
                }else if(data==2){
                	Swal.fire({
                      	icon: 'danger',
                      	title: 'Opps!',
                      	text: 'Invalid Old Password!'
                  	});
                }else if(data==3){
                	Swal.fire({
                      	icon: 'danger',
                      	title: 'Opps!',
                      	text: 'New passwords do not match!'
                  	});
                }else{
                  	Swal.fire({
                      	icon: 'danger',
                      	title: 'Opps!',
                      	text: 'Failed Query!'
                  	});
                }
              }
            });
            $("#form_btn_update_password").prop('disabled', false);
        }
    });
});


$("#form_submit_update_basic_info").submit(function(e){
    e.preventDefault();
    $("#form_btn_update_basic_info").prop('disabled', true);
    Swal.fire({
        title: 'Update',
        text: "Are you sure you want to proceed?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Proceed'
    }).then((result) => {
        if(result.isConfirmed){
            $.ajax({
            type:"POST",
            url:"ajax/update_profile_basic_info.php",
            data:$("#form_submit_update_basic_info").serialize(),
            success:function(data){
                if(data==1){
                  Swal.fire({
                      icon: 'success',
                      title: 'All good!',
                      text: 'Data updated successfully!'
                  });
                }else if(data==2){
                  Swal.fire({
                      icon: 'warning',
                      title: 'Opps!',
                      text: 'Username Already Used!'
                  });
                }else{
                  Swal.fire({
                      icon: 'danger',
                      title: 'Opps!',
                      text: 'Failed Query!'
                  });
                }
              }
            });
            $("#form_btn_update_basic_info").prop('disabled', false);
        }
    });
});
</script>