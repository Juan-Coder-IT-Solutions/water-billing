<?php 
$count_announcement = $mysqli->query("SELECT * FROM tbl_announcements") or die(mysqli_error());

$count_customers = $mysqli->query("SELECT * FROM tbl_users WHERE user_category='C'") or die(mysqli_error());

$count_feedbacks = $mysqli->query("SELECT * FROM tbl_feedbacks") or die(mysqli_error());

?>
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
    <div class="col-sm-4 grid-margin">
      <div class="card">
          <div class="card-body">
            <div class="d-flex border-bottom mb-4 pb-2">
              <div class="hexagon">
                <div class="hex-mid hexagon-warning">
                  <i class="mdi mdi-bullhorn"></i>
                </div>
              </div>
              <div class="pl-4">
                <h4 class="font-weight-bold text-warning mb-0"> <?= $count_announcement->num_rows; ?> </h4>
                <h6 class="text-muted">Total Announcements</h6>
              </div>
            </div>
            <div class="d-flex border-bottom mb-4 pb-2">
              <div class="hexagon">
                <div class="hex-mid hexagon-danger">
                  <i class="mdi mdi-account-multiple-outline"></i>
                </div>
              </div>
              <div class="pl-4">
                <h4 class="font-weight-bold text-danger mb-0"> <?= $count_customers->num_rows; ?></h4>
                <h6 class="text-muted">Total Customers</h6>
              </div>
            </div>
            <div class="d-flex border-bottom mb-4 pb-2">
              <div class="hexagon">
                <div class="hex-mid hexagon-success">
                  <i class="mdi mdi-message-draw"></i>
                </div>
              </div>
              <div class="pl-4">
                <h4 class="font-weight-bold text-success mb-0"> <?= $count_feedbacks->num_rows; ?> </h4>
                <h6 class="text-muted">Total Feedbacks</h6>
              </div>
            </div>
         
          </div>
        </div>
    </div>

    <div class="col-sm-4 stretch-card grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title"><i class="mdi mdi-bullhorn menu-icon"></i> Annoucements!</h4>
          <?php 
            $fetch_announcement = $mysqli->query("SELECT * FROM tbl_announcements WHERE announcement_id >0 ORDER BY date_added DESC LIMIT 3") or die(mysqli_error());
             while ($announcement_row = $fetch_announcement->fetch_array()) {
          ?>
            <div class="card">
              <div class="card-body">
                <h5 class="card-title text-info"><?= $announcement_row['announcement_title'] ?></h5>
                <div class="media">
                  <i class="mdi mdi-pin icon-sm text-warning d-flex align-self-start mr-3"></i>
                  <div class="media-body">
                    <p class="card-text"> <?= $announcement_row['announcement_content'] ?> </p>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>

    <div class="col-sm-4 stretch-card grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title"><i class="mdi mdi-message-draw menu-icon"></i> Feedback!</h4>
          <?php 
            $fetch_feedbacks = $mysqli->query("SELECT * FROM tbl_feedbacks WHERE feedback_id >0 ORDER BY date_added DESC LIMIT 3") or die(mysqli_error());
             while ($feedback_row = $fetch_feedbacks->fetch_array()) {
          ?>
            <div class="card">
              <div class="card-body">
                <h5 class="card-title text-info"><?= userFullName($feedback_row['user_id']) ?></h5>
                <div class="media">
                  <i class="mdi mdi-account-circle icon-sm text-warning d-flex align-self-start mr-3"></i>
                  <div class="media-body">
                    <p class="card-text"> <?= $feedback_row['feedback_content'] ?> </p>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>

  </div>
</div>