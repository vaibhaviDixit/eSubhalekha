<?php
$currentEMail = App::getUser()['email'];
DB::connect();

DB::close();
?>


<aside id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-primary text-secondary sidebar collapse overflow-auto">
  <div class="position-sticky pt-3">

    <div class="dropdown mt-3 fs-5">
      <strong class="ms-3 me-5">
        <i class="bi bi-person-circle"></i> Hi <?=explode(' ', App::getUser()['name'])[0]?>!</strong>
      <a href="#"
        class="dropdown-toggle text-decoration-none text-secondary bi bi-three-dots-vertical dropdownHide fs-5 pe-3 float-end"
        id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false"></a>
      <ul class="dropdown-menu text-small shadow" id="Menu"
        style="z-index: 1000000 !important; transform: translate3d(110px, 30px, 10px) !important;"
        aria-labelledby="dropdownUser2">
        <li><a href="<?php echo route('admin/user/password'); ?>" class="dropdown-item">
            <i class="bi bi-key-fill"></i> Change Password</a></li>
        <li><a class="dropdown-item text-danger fw-bold mt-3" id="logout" href="<?php echo route('logout'); ?>"><i
              class="bi bi-box-arrow-left"></i> Logout</a></li>
      </ul>
    </div>

    <hr>
    <ul class="nav flex-column">
      <li class="nav-item mt-3 mb-5">
        <strong class="ms-3 text-secondary-3">Weddings</strong>
        <a class="nav-link dashboard" aria-current="page" href="<?php echo route('dashboard'); ?>">
          <i class="bi bi-house-door"></i>
          Dashboard
        </a>
      </li>
    </ul>
  </div>
</aside>


<script type="text/javascript">
  var url = window.location.pathname
  console.log(url)
  switch (url) {
    case "<?php echo !empty($config['APP_SLUG']) ?  '/'.$config['APP_SLUG']."/dashboard" : "/dashboard" ?>":
      document.querySelector(".dashboard").classList.toggle("active")
      break
  }
</script>