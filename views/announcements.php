<div class="content-wrapper pb-0">
  	<div class="page-header flex-wrap">
    	<div class="header-left">
      		Manage your announcements here.
    	</div>

    	<div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
      		<div class="d-flex align-items-center">
        		<a href="#">
          			<p class="m-0 pr-3">Master Data</p>
        		</a>
        		<a class="pl-3 mr-4" href="#">
          			<p class="m-0">Announcement</p>
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
    	</p>
    	<div class="table-responsive">
      		<table id="datatable" class="table table-bordered">
        		<thead>
          			<tr>
          				  <th style="width: 5px;"></th>
                    <th style="width: 5px;"></th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Encoded By</th>
                    <th>Date Added</th>
          			</tr>
        		</thead>
        		<tbody>
        		</tbody>
      		</table>
    	</div>
  	</div>
</div>

<?php require_once 'views/modals/add_announcement.php'; ?>
<?php require_once 'views/modals/update_announcement.php'; ?>

<script type="text/javascript">
$(document).ready(function() { 
	get_datatable();
});

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
            url:"ajax/update_announcement.php",
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

  $.post("ajax/get_announcement.php",
    {
        primary_id:primary_id
    },function(data){
        var get_data = JSON.parse(data);
        $("#update_announcement_id").val(get_data[0].announcement_id);
        $("#update_announcement_title").val(get_data[0].announcement_title);
        $("#update_announcement_content").val(get_data[0].announcement_content);
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
            $.post("ajax/delete_announcement.php",
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
        url:"ajax/add_announcement.php",
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
	        "url":"ajax/datatables/announcements.php",
	        "dataSrc":"data", 
	    },
	    "columns":[
	    {
	        "mRender": function(data,type,row){
	            return "<input type='checkbox' class='delete_check_box' name='check_user' value='"+row.announcement_id+"'>";                
	        }
	    },
	    {
	        "mRender":function(data, type, row){
	            return row.user_id==row.session_user_id?"<button class='btn btn-outline-dark btn-sm' data-toggle='tooltip' title='Update Record' onclick='get_data("+row.announcement_id+")'><i class='mdi mdi-lead-pencil'></i></button>":"";
	        }
	    },
	    {
	       	"data":"announcement_title"
	    },
	    {
	        "data":"announcement_content"
	    },
      {
          "data":"user"
      },
      {
          "data":"date_added"
      }
	    ]
	});
}
</script>