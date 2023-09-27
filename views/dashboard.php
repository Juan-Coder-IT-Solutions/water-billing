<div class="content-wrapper pb-0">
  <div class="page-header flex-wrap">
    <div class="header-left">
      Water Billing Management System
    </div>
    <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
      <div class="d-flex align-items-center">
        <a href="#">
          <p class="m-0 pr-3">Master Data</p>
        </a>
        <a class="pl-3 mr-4" href="#">
          <p class="m-0">Dashboard</p>
        </a>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-sm-6 stretch-card grid-margin">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div class="card-title"> Customers <small class="d-block text-muted">August 01 - August 31</small>
            </div>
            <div class="d-flex text-muted font-20">
              <i class="mdi mdi-printer mouse-pointer"></i>
              <i class="mdi mdi-help-circle-outline ml-2 mouse-pointer"></i>
            </div>
          </div>
          <h3 class="font-weight-bold mb-0"> 2,409 <span class="text-success h5">4,5%<i class="mdi mdi-arrow-up"></i></span>
          </h3>
          <span class="text-muted font-13">Avg customers/Day</span>
          <div class="line-chart-wrapper">
            <canvas id="linechart" height="80"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 stretch-card grid-margin">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div class="card-title"> Conversions <small class="d-block text-muted">August 01 - August 31</small>
            </div>
            <div class="d-flex text-muted font-20">
              <i class="mdi mdi-printer mouse-pointer"></i>
              <i class="mdi mdi-help-circle-outline ml-2 mouse-pointer"></i>
            </div>
          </div>
          <h3 class="font-weight-bold mb-0"> 0.40% <span class="text-success h5">0.20%<i class="mdi mdi-arrow-up"></i></span>
          </h3>
          <span class="text-muted font-13">Avg customers/Day</span>
          <div class="bar-chart-wrapper">
            <canvas id="barchart" height="80"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>