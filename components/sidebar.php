<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile border-bottom">
      <a href="?page=profile" class="nav-link flex-column">
        <div class="nav-profile-image">
          <img src="assets/images/default_profile_pic.jpeg" alt="profile" />
          <!--change to offline or busy as needed-->
        </div>
        <div class="nav-profile-text d-flex ml-0 mb-3 flex-column">
          <span class="font-weight-semibold mb-1 mt-2 text-center"><?= userFullName($user_id)?></span>
          <span class="text-secondary icon-sm text-center"><?= $session_user_category=="A"?"Admin":(($session_user_category=="C")?"Customer":"Meter Reader");?></span>
        </div>
      </a>
    </li>
    <li class="pt-2 pb-1">
      <span class="nav-item-head">Master Data</span>
    </li>
    <li class="nav-item <?= $page=="dashboard"?'active':''; ?>">
      <a class="nav-link" href="?page=dashboard">
        <i class="mdi mdi-compass-outline menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <?php if($session_user_category=="A"){ ?>
    <li class="nav-item <?= $page=="announcements"?'active':''; ?>">
      <a class="nav-link" href="?page=announcements">
        <i class="mdi mdi-bullhorn menu-icon"></i>
        <span class="menu-title">Announcements</span>
      </a>
    </li>
    <?php } ?>

    <li class="nav-item <?= $page=="feedbacks"?'active':''; ?>">
      <a class="nav-link" href="?page=feedbacks">
        <i class="mdi mdi-message-draw menu-icon"></i>
        <span class="menu-title">Feedbacks</span>
      </a>
    </li>

    <?php if($session_user_category=="A"){ ?>
    <li class="pt-2 pb-1">
      <span class="nav-item-head">Security</span>
    </li>

    <li class="nav-item <?= $page=="accounts_manager"?'active':''; ?>">
      <a class="nav-link" href="?page=accounts_manager">
        <i class="mdi mdi-account-multiple menu-icon"></i>
        <span class="menu-title">Accounts Manager</span>
      </a>
    </li>
    <?php } ?>
  </ul>
</nav>