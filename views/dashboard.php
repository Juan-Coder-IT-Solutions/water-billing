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
        <h4 class="card-title"><i class="mdi mdi-bullhorn menu-icon"></i> Annoucements!</h4>
        <?php 
          $fetch_announcement = $mysqli->query("SELECT * FROM tbl_announcements WHERE announcement_id >0 ") or die(mysqli_error());

           while ($announcement_row = $fetch_announcement->fetch_array()) {
        ?>
        <div class="card">
          <div class="card-body">
            <h4 class="card-title"><?= $announcement_row['announcement_title'] ?></h4>
            <div class="media">
              <i class="mdi mdi-pin icon-md text-danger d-flex align-self-start mr-3"></i>
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

  </div>
</div>