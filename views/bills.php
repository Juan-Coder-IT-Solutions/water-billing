<div class="content-wrapper pb-0">
  	<div class="page-header flex-wrap">
    	<div class="header-left">
      		Manage your bills here.
    	</div>

    	<div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
      		<div class="d-flex align-items-center">
        		<a href="#">
          			<p class="m-0 pr-3">Master Data</p>
        		</a>
        		<a class="pl-3 mr-4" href="#">
          			<p class="m-0">Bills</p>
        		</a>
      		</div>
    	</div>
  	</div>

   <label>Table Filter:</label>
  <div class="row mb-2">

    <div class="col-sm-4">
      <div class="form-group">
          <input type="month" class="form-control" id="bills_month_filter" value="<?= date('Y-m')?>">
        </div>
    </div>

    <div class="col-sm-4">
      <div class="form-group">
          <select class="js-example-basic-single select2-hidden-accessible form-control form-control-sm" style="width: 100%;" data-select2-id="bills_payment_status" tabindex="-1" aria-hidden="true" id="bills_payment_status">
            <option value='AA'>Please Choose Payment Status Filter:</option>
            <option value='AA'>All</option>
            <option value='P'>Paid</option>
            <option value='S'>Unpaid</option>
          </select>
        </div>
    </div>

    <div class="col-sm-4">
        <button type="button" class="btn btn-outline-primary btn-fw" onclick="get_datatable()"><i class="mdi mdi-refresh"></i> Generate </button>
    </div>
  </div>

  	<div class="row mb-2">
    	<div class="col-sm-6">
      		<button type="button" class="btn btn-outline-primary btn-fw btn-sm mr-1" data-toggle='modal' data-target='#modalAdd'><i class="mdi mdi-plus-circle"></i> Add </button>

          <button type="button" class="btn btn-outline-success btn-fw btn-sm mr-1" onclick="view_parameters()"><i class="mdi mdi-format-list-bulleted"></i> Bill Parameters </button>

      		<button type="button" class="btn btn-outline-danger btn-fw btn-sm" onclick="delete_entry()"><i class="mdi mdi-delete"></i> Delete </button>
    	</div>
  	</div>

  	<div class="row" style="overflow: auto;">
 		<div class="card-body">

    	<div class="table-responsive">
      		<table id="datatable" class="table table-bordered">
        		<thead>
          			<tr>
          			   <th style="width: 5px;"></th>
                    <th style="width: 5px;"></th>
                    <th style="font-size: 11px;">Full Name</th>
                    <th style="font-size: 11px;">Previous <br> Reading</th>
                    <th style="font-size: 11px;">Current <br> Reading</th>
                    <th>Consume</th>
                    <th>Payment</th>
                    <th>Balance</th>
                    <th style="font-size: 11px;">Penalty <br> Amount</th>
                    <th style="font-size: 11px;">Billing <br> Date</th>
                    <th style="font-size: 11px;">Due <br> Date</th>
                    <th style="font-size: 11px;">Payment <br> Status</th>
                    <th style="font-size: 11px;">Encoded By</th>
          			</tr>
        		</thead>
        		<tbody>
        		</tbody>
      		</table>
    	</div>
  	</div>
</div>

<div id="DivIdToPrint" style="display: none;">
  qweqweqwe
</div>

<?php require_once 'views/modals/add_bill.php'; ?>
<?php require_once 'views/modals/update_bill.php'; ?> 
<?php require_once 'views/modals/parameters.php'; ?> 
<?php require_once 'views/modals/payments.php'; ?> 

<script type="text/javascript">
$(document).ready(function() { 
	get_datatable();
});

function print_data(bill_id){
  $.post("ajax/print_bill.php",{
    bill_id:bill_id
  },function(data){
    $("#DivIdToPrint").html(data);
    printDiv();
  });
}

function  printDiv() 
{

  var divToPrint=document.getElementById('DivIdToPrint');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();

  setTimeout(function(){newWin.close();},10);

}

function payment(bill_id){
  $("#modalPayments").modal("show");
  $("#payment_bill_id").val(bill_id);
  modal_payment_body();

}

function modal_payment_body(){
  var payment_bill_id = $("#payment_bill_id").val();
  $.post("ajax/modal_payment_body.php",{
    payment_bill_id:payment_bill_id
  },function(data){
    $("#modal_payment_body").html(data);
  });
}

function view_parameters(){
  $("#modalParameters").modal("show");
  $.post("ajax/parameters_modal_body.php",{
  },function(data){
    $("#parameter_body").html(data);
  });
}

$("#form_submit_save_modal_parameter").submit(function(e){
    e.preventDefault();
    
    Swal.fire({
        title: 'Update',
        text: "Are you sure you want to proceed?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Proceed'
    }).then((result) => {
        if(result.isConfirmed){
            $("#form_btn_save_parameter_form").prop('disabled', true);
            $.ajax({
            type:"POST",
            url:"ajax/save_parameters.php",
            data:$("#form_submit_save_modal_parameter").serialize(),
            success:function(data){
                if(data==1){
                  Swal.fire({
                      icon: 'success',
                      title: 'All good!',
                      text: 'Data saved successfully!'
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
            $("#form_btn_save_parameter_form").prop('disabled', false);
        }
    });
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
            url:"ajax/update_bill.php",
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
                      icon: 'danger',
                      title: 'Opps!',
                      text: 'This chosen customer already has a billing statement for the chosen billing date.'
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

  $.post("ajax/get_bill.php",
    {
        primary_id:primary_id
    },function(data){
        var get_data = JSON.parse(data);
        $("#update_bill_id").val(get_data[0].bill_id);
        $("#update_user_id").val(get_data[0].user_id).trigger('change');
        $("#update_previous_reading").val(get_data[0].previous_reading);
        $("#update_current_reading").val(get_data[0].current_reading);
        $("#update_cubic_meter_rate").val(get_data[0].cubic_meter_rate);
        $("#update_penalty_amount").val(get_data[0].penalty_amount);
        $("#update_billing_date").val(get_data[0].billing_date);
        $("#update_due_date").val(get_data[0].due_date);

        $("#update_maximum_cubic").val(get_data[0].maximum_cubic);
        $("#update_minimum_rate").val(get_data[0].minimum_rate);
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
            $.post("ajax/delete_bill.php",
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
        url:"ajax/add_bill.php",
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
                    icon: 'danger',
                    title: 'Opps!',
                    text: 'This chosen customer already has a billing statement for the chosen billing date.'
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
  var bills_month_filter = $("#bills_month_filter").val();
  var bills_payment_status = $("#bills_payment_status").val();

 	$("#datatable").DataTable().destroy();
	$("#datatable").DataTable({
	    "responsive": true,
	    "processing": true,
	    "ajax":{
	        "type":"POST",
	        "url":"ajax/datatables/bills.php",
	        "dataSrc":"data", 
          'data': {
           bills_month_filter: bills_month_filter,
           bills_payment_status:bills_payment_status
        },
	    },
	    "columns":[
	    {
	        "mRender": function(data,type,row){
	            return "<input type='checkbox' class='delete_check_box' name='check_user' value='"+row.bill_id+"'>";                
	        }
	    },
	    {
	        "mRender":function(data, type, row){
	            return "<button class='btn btn-outline-dark btn-sm' data-toggle='tooltip' title='Update Record' onclick='get_data("+row.bill_id+")'><i class='mdi mdi-lead-pencil'></i></button> <button class='btn btn-outline-primary btn-sm' data-toggle='tooltip' title='Payment' onclick='payment("+row.bill_id+")'><i class='mdi mdi-cash-usd'></i></button> <button class='btn btn-outline-success btn-sm' data-toggle='tooltip' title='Print' onclick='print_data("+row.bill_id+")'><i class='mdi mdi-printer'></i></button>";
	        }
	    },
	    {
	       	"data":"user"
	    },
	    {
	        "data":"previous_reading"
	    },
	   	{
	        "data":"current_reading"
	    },
      {
          "data":"consume"
      },
      {
          "data":"payment"
      },
      {
          "data":"balance"
      },
      {
          "data":"penalty_amount"
      },
      {
          "data":"billing_date"
      },
      {
          "data":"due_date"
      },
	    {
	        "mRender":function(data, type, row){
	            return row.status=="S"?"<label class='badge badge-warning'>Unpaid</label>":"<label class='badge badge-success'>Paid</label>";
	        }
	    },
      {
          "data":"encoded_by"
      },
	    ]
	});
}
</script>