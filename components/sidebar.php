<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile border-bottom">
      <a href="#" class="nav-link flex-column">
        <div class="nav-profile-image">
          <img src="assets/images/default_profile_pic.jpeg" alt="profile" />
          <!--change to offline or busy as needed-->
        </div>
        <div class="nav-profile-text d-flex ml-0 mb-3 flex-column">
          <span class="font-weight-semibold mb-1 mt-2 text-center"><?= userFullName($user_id)?></span>
          <span class="text-secondary icon-sm text-center"><?= user_info("user_category",$user_id)=="A"?"Admin":"User"?></span>
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

    <li class="nav-item <?= $page=="test"?'active':''; ?>">
      <a class="nav-link" href="?page=test">
        <i class="mdi mdi-format-list-bulleted menu-icon"></i>
        <span class="menu-title">test</span>
      </a>
    </li>

    <li class="pt-2 pb-1">
      <span class="nav-item-head">Security</span>
    </li>

    <li class="nav-item <?= $page=="accounts_manager"?'active':''; ?>">
      <a class="nav-link" href="?page=accounts_manager">
        <i class="mdi mdi-account-multiple menu-icon"></i>
        <span class="menu-title">Accounts Manager</span>
      </a>
    </li>
   
  </ul>
</nav>