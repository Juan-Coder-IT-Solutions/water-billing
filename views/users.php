<div class="content-wrapper pb-0">
  	<div class="page-header flex-wrap">
    	<div class="header-left">
      		Manage your users here.
    	</div>

    	<div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
      		<div class="d-flex align-items-center">
        		<a href="#">
          			<p class="m-0 pr-3">Security</p>
        		</a>
        		<a class="pl-3 mr-4" href="#">
          			<p class="m-0">Accounts Manager</p>
        		</a>
      		</div>
    	</div>
  	</div>

  	<div class="row mb-2">
    	<div class="col-sm-6">
      		<button type="button" class="btn btn-outline-primary btn-fw btn-sm mr-1" data-toggle='modal' data-target='#modalAdd'><i class="mdi mdi-plus-circle"></i> Add </button>
      		<button type="button" class="btn btn-outline-danger btn-fw btn-sm" onclick="delete_entry()"><i class="mdi mdi-delete"></i> Delete </button>
    	</div>
  	</div>

  	<div class="row">
 		<div class="card-body">
    	<div class="table-responsive">
      		<table id="datatable" class="table table-bordered">
        		<thead>
          			<tr>
          				<th style="width: 5px;"></th>
            			<th style="width: 5px;"></th>
                  <th>Account Number</th>
                  <th>Meter Number</th>
			            <th>Full Name</th>
			            <th>User Category</th>
			            <th>Username</th>
			            <!-- <th></th> -->
          			</tr>
        		</thead>
        		<tbody>
        		</tbody>
      		</table>
    	</div>
  	</div>
</div>

<?php require_once 'views/modals/add_user.php'; ?>
<?php require_once 'views/modals/update_user.php'; ?>
<?php require_once 'views/modals/view_bills.php'; ?>

<script type="text/javascript">
$(document).ready(function() { 
	get_datatable();
});

function view_bills(primary_id){
  $("#modalViewBills").modal("show");
  $.post("ajax/view_bills.php",{
    primary_id:primary_id
  },function(data){
    $("#modal_view_bills_body").html(data);
    $('#view_bills_datatable').DataTable({});
  });
}

$("#form_submit_update_form").submit(function(e){
    e.preventDefault();
    $("#form_btn_update_form").prop('disabled', true);
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
            url:"ajax/update_user.php",
            data:$("#form_submit_update_form").serialize(),
            success:function(data){
                if(data==1){
                  Swal.fire({
                      icon: 'success',
                      title: 'All good!',
                      text: 'Data updated successfully!'
                  });
                  get_datatable();
                  $("#modalUpdate").modal("hide");
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
            $("#form_btn_update_form").prop('disabled', false);
        }
    });
});

function get_data(primary_id){
  $("#modalUpdate").modal("show");
  $.post("ajax/get_user.php",
    {
      primary_id:primary_id
    },function(data){
        var get_data = JSON.parse(data);
        $("#update_user_id").val(get_data[0].user_id);
        $("#update_user_category").val(get_data[0].user_category);
        $("#update_user_fname").val(get_data[0].user_fname);
        $("#update_user_mname").val(get_data[0].user_mname);
        $("#update_user_lname").val(get_data[0].user_lname);
        $("#update_username").val(get_data[0].username);
        $("#update_password").val(get_data[0].password);
        $("#update_address").val(get_data[0].address);
        $("#update_contact_number").val(get_data[0].contact_number);
        $("#update_customer_type").val(get_data[0].customer_type);
        $("#update_meter_number").val(get_data[0].meter_number);
  });
}

function delete_entry(){
    var checkedValues = $('.delete_check_box:checkbox:checked').map(function() {
        return this.value;
    }).get();
    id = [];

    Swal.fire({
        title: 'Delete',
        text: "Are you sure you want to proceed?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Proceed'
    }).then((result) => {
        if(result.isConfirmed){
            $.post("ajax/delete_user.php",
            {
                id:checkedValues
            },function(data){
                if(data == 1){
                    Swal.fire({
                        icon: 'success',
                        title: 'All good!',
                        text: 'Data deleted successfully!'
                    });
                    get_datatable();
                }else{
                    Swal.fire({
                        icon: 'danger',
                        title: 'Opps!',
                        text: 'No selected data.'
                    });
                }   
            });
        }
    }); 
}

$("#form_submit_add_form").submit(function(e){
    e.preventDefault();
    $("#form_btn_add_form").prop('disabled', true);
    $.ajax({
        type:"POST",
        url:"ajax/add_user.php",
        data:$("#form_submit_add_form").serialize(),
        success:function(data){
            if(data==1){
                Swal.fire({
                    icon: 'success',
                    title: 'All good!',
                    text: 'Data added successfully!'
                });
            	document.getElementById("form_submit_add_form").reset();
            	get_datatable();
              $("#modalAdd").modal("hide");
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
                    text: 'Failed Query!!'
                });
           }
        }
      });
      $("#form_btn_add_form").prop('disabled', false);
});

function get_datatable(){
 	$("#datatable").DataTable().destroy();
	$("#datatable").DataTable({
	    "responsive": true,
	    "processing": true,
	    "ajax":{
	        "type":"POST",
	        "url":"ajax/datatables/users.php",
	        "dataSrc":"data", 
	    },
	    "columns":[
	    {
	        "mRender": function(data,type,row){
	            return "<input type='checkbox' class='delete_check_box' name='check_user' value='"+row.user_id+"'>";                
	        }
	    },
	    {
	        "mRender":function(data, type, row){
	            return "<button class='btn btn-outline-dark btn-sm' data-toggle='tooltip' title='Update Record' onclick='get_data("+row.user_id+")'><i class='mdi mdi-lead-pencil'></i></button>";
	        }
	    },
      {
          "data":"account_number"
      },
      {
          "data":"meter_number"
      },
	    {
	        "data":"fullname"
	    },
	    {
	        "mRender":function(data,type,row){
            var customer_type = row.customer_type=="C"?"Commercial":((row.customer_type=="R")?"Residential":"");
	        	return row.user_category=="A"?"Admin":((row.user_category=="C")?"Customer <span class='text-primary'>("+customer_type+")</span>":"Meter Reader");
	        }
	    },
	    {
	        "data":"username"
	    },
	    // {
     //      "mRender":function(data, type, row){
     //          return row.user_category=="C"?"<button class='btn btn-outline-success btn-sm' data-toggle='tooltip' title='View Bills' onclick='view_bills("+row.user_id+")'><i class='mdi mdi-coin'></i> Bills</button>":"";
     //      }
     //  },
	    ]
	});
}
</script>