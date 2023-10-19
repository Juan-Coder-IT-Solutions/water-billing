<div class="modal fade" id="modalPayments" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="mdi mdi-cash-usd"></i> Payments</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      	
      	<div class="modal-body">
      		<div class="row">
      			<div class="col-sm-12">
                <div class="form-group">
                    <label>Payment Amount:</label>
                   <div class="input-group">
                        <input type="number" class="form-control form-control-sm" placeholder="Payment Amount" id="payment_amount" aria-label="Payment Amount" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="button" onclick="save_payment()"><i class="mdi mdi-check-circle"></i> Save Payment</button>
                        </div>
                      </div>
                </div>
              </div>
      		</div>
      		<input type="hidden" class="form-control form-control-sm" id="payment_bill_id">

      		<div class="row" id="modal_payment_body"></div>
      	</div>
      
      	<div class="modal-footer"></div>
    </div>
  </div>
</div>

<script type="text/javascript">
function delete_payment(payment_id){
	 Swal.fire({
        title: 'Delete',
        text: "Are you sure you want to proceed?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Proceed'
    }).then((result) => {
        if(result.isConfirmed){
            $.post("ajax/delete_payment.php",
            {
                id:payment_id
            },function(data){
                if(data == 1){
                    Swal.fire({
                        icon: 'success',
                        title: 'All good!',
                        text: 'Data deleted successfully!'
                    });
                    modal_payment_body();
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

function save_payment(){
	Swal.fire({
        title: 'Update',
        text: "Are you sure you want to proceed?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Proceed'
    }).then((result) => {
        if(result.isConfirmed){
           	var payment_amount = $("#payment_amount").val();
			var payment_bill_id = $("#payment_bill_id").val();
			$.post("ajax/save_payment.php",{
				payment_amount:payment_amount,
				payment_bill_id:payment_bill_id
			},function(data){
				if(data==1){
                  Swal.fire({
                      icon: 'success',
                      title: 'All good!',
                      text: 'Data saved successfully!'
                  });
                  $("#payment_amount").val("");
                  modal_payment_body();
                  get_datatable();
                }else{
                  Swal.fire({
                      icon: 'danger',
                      title: 'Opps!',
                      text: 'Failed Query!'
                  });
                }
			});
        }
    });
}	
	

</script>