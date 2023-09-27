<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Water Billing <?= date('Y')?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../assets/vendors/jquery-bar-rating/css-stars.css" />
    <link rel="stylesheet" href="../assets/vendors/font-awesome/css/font-awesome.min.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/demo_1/style.css" />
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/wbms_logo.png" />
    <link href="../assets/vendors/sweet-alert/sweetalert2.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container-scroller">
      <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center">
                <!-- <img src="../assets/img/CHMSU.png" alt="" style="width: 70%;"> -->
              </div>

              <div class="d-flex justify-content-center py-4">
                <a class="logo d-flex align-items-center w-auto">
                  <span class="d-none d-lg-block" style="text-align: center;"></span>
                </a>
              </div>

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">WATER BILLING MANAGEMENT SYSTEM</h5>
                    <p class="text-center small">Login Form</p>
                  </div>

                  <form role="form" method="POST" id="form_submit" class="row g-3 needs-validation" novalidate>

                    <div class="col-12">
                      	<div class="form-group">
	                      	<div class="input-group">
		                        <div class="input-group-prepend">
		                          	<span class="input-group-text" style="color:#000;">
		                          		<span class="mdi mdi-account"></span>
		                         	</span>
		                        </div>

	                        	<input type="text" class="form-control" placeholder="Username" aria-label="Username" name="username" id="yourUsername" aria-describedby="basic-addon1" required>
	                      </div>
	                    </div>
                    </div>

                    <div class="col-12">
                      	<div class="form-group">
	                      	<div class="input-group">
		                        <div class="input-group-prepend">
		                          	<span class="input-group-text" style="color:#000;">
		                          		<span class="mdi mdi-lock"></span>
		                         	</span>
		                        </div>
	                        	<input type="password" class="form-control" placeholder="Password" aria-label="Password" name="password" aria-describedby="basic-addon1" required>
	                      </div>
	                    </div>
                    </div>

                    <div class="col-12 mb-2">
                      <button type="submit" class="btn btn-outline-primary btn-sm w-100" id="btn_submit"><i class="mdi mdi-login"></i> Login</button>
                    </div>

                    <div class="col-12">
                      <p class="small mb-0 text-center">Don't have an account? <a href="register.php">Go to Registration Form</a></p>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </section>

    </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../assets/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
    <script src="../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../assets/vendors/flot/jquery.flot.js"></script>
    <script src="../assets/vendors/flot/jquery.flot.resize.js"></script>
    <script src="../assets/vendors/flot/jquery.flot.categories.js"></script>
    <script src="../assets/vendors/flot/jquery.flot.fillbetween.js"></script>
    <script src="../assets/vendors/flot/jquery.flot.stack.js"></script>
    <script src="../assets/vendors/sweet-alert/sweetalert2.all.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/todolist.js"></script>

    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>

  <script type="text/javascript">
    $("#form_submit").submit(function(e){
        e.preventDefault();
        $("#btn_submit").prop('disabled', true);
        $.ajax({
            type:"POST",
            url:"../ajax/login.php",
            data:$("#form_submit").serialize(),
            success:function(data){
            	if(data==1){
            		
            		Swal.fire({
					  icon: 'success',
					  title: 'Success login!',
					  showConfirmButton: false,
					  timer: 1000
					}).then((result) => {
						window.location.href = "../index.php?page=dashboard";
					});
            	}else{
            		Swal.fire({
		              icon: 'error',
		              title: 'Oops...',
		              text: 'Failed Login!',
		            });
            	}
            	$("#btn_submit").prop('disabled', false);
            }
          });
    });
  </script>
</html>