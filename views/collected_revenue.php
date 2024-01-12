<style>
    th { white-space: nowrap; }
</style>
<div class="content-wrapper pb-0">
  	<div class="page-header flex-wrap">
    	<div class="header-left">
      	    Collected Revenue Report
    	</div>

    	<div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
      		<div class="d-flex align-items-center">
        		<a href="#">
          			<p class="m-0 pr-3">Reports</p>
        		</a>
        		<a class="pl-3 mr-4" href="#">
          			<p class="m-0">Collected Revenue</p>
        		</a>
      		</div>
    	</div>
  	</div>

   <label>Table Filter:</label>
  <div class="row mb-2">

    <div class="col-sm-4">
      <div class="form-group">
          <input type="month" class="form-control" id="start_date" value="<?= date('Y-m')?>">
        </div>
    </div>

    <div class="col-sm-4">
      <div class="form-group">
          <input type="month" class="form-control" id="end_date" value="<?= date('Y-m')?>">
        </div>
    </div>

    <div class="col-sm-4">
        <button type="button" class="btn btn-outline-primary btn-fw" onclick="get_datatable()"><i class="mdi mdi-refresh"></i> Generate </button>
    </div>
  </div>

  	<div class="row" style="overflow: auto;">
 		<div class="card-body">

    	<div class="table-responsive">
      		<table id="datatable" class="table table-bordered">
        		<thead>
          			<tr>
                        <th style="width: 5px !important;">#</th>
                        <th>Month</th>
                        <th>Total Revenue</th>
          			</tr>
        		</thead>
        		<tbody>
        		</tbody>
                <tfoot style="background: lightblue;">
                    <tr>
                        <td></td>
                        <td><span style="float:right;"><strong>Overall Collected Revenue:</strong></span></td>
                        <td style="color:#0033c4;"></td>
                    </tr>
                </tfoot>
      		</table>
    	</div>
  	</div>
</div>

<div id="DivIdToPrint" style="display: none;"></div>


<script type="text/javascript">
$(document).ready(function() { 
	get_datatable();
});

function get_datatable(){
  var start_date = $("#start_date").val();
  var end_date = $("#end_date").val();

 	$("#datatable").DataTable().destroy();
	$("#datatable").DataTable({
	    "processing": true,
        "paging": false,
        footerCallback: function (row, data, start, end, display) {
            let api = this.api();
    
            // Remove the formatting to get integer data for summation
            let intVal = function (i) {
                return typeof i === 'string'
                    ? i.replace(/[\$,]/g, '') * 1
                    : typeof i === 'number'
                    ? i
                    : 0;
            };
    
            // Total over all pages
            total = api
                .column(2)
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
    
            // Total over this page
            pageTotal = api
                .column(2, { page: 'current' })
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
    
            // Update footer
            api.column(2).footer().innerHTML = total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        },
	    "ajax":{
	        "type":"POST",
	        "url":"ajax/datatables/collected_revenue.php",
	        "dataSrc":"data", 
            'data': {
                start_date: start_date,
                end_date:end_date
            }
	    },
	    "columns":[
        {
	       	"data":"count"
	    },
	    {
	       	"data":"date"
	    },
	    {
	        "data":"amount"
	    }
	    ]
	});
}
</script>