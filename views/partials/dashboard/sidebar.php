<?php
// errors(1);

$currentEMail = App::getUser()['email'];

require('views/partials/dashboard/tracks.php');

?>

<!-- Breadcrumbs -->
<nav aria-label="breadcrumb" class="ms-3 col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-5">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo route('dashboard'); ?>">Dashboard</a></li>

    <?php if (isset($_REQUEST['id']) && isset($_REQUEST['lang'])): ?>
    

      <?php

      // Add breadcrumb for each section based on the URL
      $url = basename(basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));

      switch ($url) {
        case "progress":
          echo '<li class="breadcrumb-item active" aria-current="page">Progress</li>';
          break;

        case "basic-details":
          echo '<li class="breadcrumb-item active" aria-current="page">Basic Details</li>';
          break;

        case "theme":
          echo '<li class="breadcrumb-item active" aria-current="page">Theme</li>';
          break;

        case "hosts":
          echo '<li class="breadcrumb-item active" aria-current="page">Hosts</li>';
          break;

        case "timeline":
          echo '<li class="breadcrumb-item active" aria-current="page">Timeline</li>';
          break;

        case "additional-details":
          echo '<li class="breadcrumb-item active" aria-current="page">Additional Details</li>';
          break;

        case "guests":
          echo '<li class="breadcrumb-item active" aria-current="page">Guests</li>';
          break;

        case "gallery":
          echo '<li class="breadcrumb-item active" aria-current="page">Gallery</li>';
          break;

        case "our-story":
          echo '<li class="breadcrumb-item active" aria-current="page">Our Story</li>';
          break;

        case "checkout":
          echo '<li class="breadcrumb-item active" aria-current="page">Payment</li>';
          break;

      }
      ?>
    <?php else: ?>
      <li class="breadcrumb-item active" aria-current="page">Home</li>
    <?php endif; ?>
  </ol>
</nav>

<aside id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-primary text-secondary sidebar collapse overflow-auto">
  <div class="position-sticky pt-3">

    <div class="dropdown mt-3 fs-5">
      <strong class="ms-3 me-5">
        <i class="bi bi-person-circle"></i> Hi
        <?= explode(' ', App::getUser()['name'])[0] ?>!
      </strong>
      <a href="#"
        class="dropdown-toggle text-decoration-none text-secondary bi bi-three-dots-vertical dropdownHide fs-5 pe-3 float-end"
        id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false"></a>
      <ul class="dropdown-menu text-small shadow" id="Menu"
        style="z-index: 1000000 !important; transform: translate3d(110px, 30px, 10px) !important;"
        aria-labelledby="dropdownUser2">

        <li><a href="<?php echo route('user/profile'); ?>" class="dropdown-item">
            <i class="bi bi-person-fill"></i> Profile</a></li>
            
        <li><a class="dropdown-item text-danger fw-bold mt-3" id="logout" href="<?php echo route('logout'); ?>"><i
              class="bi bi-box-arrow-left"></i> Logout</a></li>
      </ul>
    </div>

    <hr>
    <ul class="nav flex-column">

      <li class="nav-item my-2">
        <a class="nav-link dashboard" aria-current="page" href="<?php echo route('dashboard'); ?>">
          <i class="bi bi-house-door"></i>
          Dashboard
        </a>
      </li>

      <?php
      if (isset($_REQUEST['id']) && isset($_REQUEST['lang'])):
        ?>
        <li class="nav-item my-2">
          <strong class="ms-3 text-secondary-3">
            <?= $_REQUEST['id'] ?>
          </strong>

           <a class="nav-link trackprogress" aria-current="page"
            href="<?php echo route('wedding/' . $_REQUEST['id'] . '/' . $_REQUEST['lang'] . '/progress') . queryString(); ?>">
             <i class="bi bi-sort-up-alt"></i>
            Progress (<?php echo $completed."/".sizeof($tracks); ?>)
          </a>

          <a class="nav-link basic-details" aria-current="page"
            href="<?php echo route('wedding/' . $_REQUEST['id'] . '/' . $_REQUEST['lang'] . '/basic-details') . queryString(); ?>">
            <i class="bi bi-clipboard-data"></i>
            Basic Details
          </a>

          <a class="nav-link theme" aria-current="page"
            href="<?php echo route('wedding/' . $_REQUEST['id'] . '/' . $_REQUEST['lang'] . '/theme') . queryString(); ?>">
            <i class="bi bi-file-image-fill"></i>
             Theme
          </a>

           <a class="nav-link hosts" aria-current="page"
            href="<?php echo route('wedding/' . $_REQUEST['id'] . '/' . $_REQUEST['lang'] . '/hosts') . queryString(); ?>">
            <i class="bi bi-people-fill"></i>
            Hosts
          </a>

          <a class="nav-link timeline" aria-current="page"
            href="<?php echo route('wedding/' . $_REQUEST['id'] . '/' . $_REQUEST['lang'] . '/timeline') . queryString(); ?>">
            <i class="bi bi-clock"></i>
            Events
          </a>

          <a class="nav-link additional-details" aria-current="page"
            href="<?php echo route('wedding/' . $_REQUEST['id'] . '/' . $_REQUEST['lang'] . '/additional-details') . queryString(); ?>">
            <i class="bi bi-pie-chart"></i>
            Additional Details
          </a>

           <a class="nav-link guests" aria-current="page"
            href="<?php echo route('wedding/' . $_REQUEST['id'] . '/' . $_REQUEST['lang'] . '/guests') . queryString(); ?>">
            <i class="bi bi-people-fill"></i>
            Guests
          </a>

          <a class="nav-link gallery" aria-current="page"
            href="<?php echo route('wedding/' . $_REQUEST['id'] . '/' . $_REQUEST['lang'] . '/gallery') . queryString(); ?>">
            <i class="bi bi-image"></i>
             Gallery
          </a>

          <a class="nav-link our-story" aria-current="page"
            href="<?php echo route('wedding/' . $_REQUEST['id'] . '/' . $_REQUEST['lang'] . '/our-story') . queryString(); ?>">
            <i class="bi bi-file-earmark-post"></i>
            Our Story
          </a>


          <?php 

            if( $completed == sizeof($tracks) ){
          ?>
             <a class="nav-link preview" target="_blank" aria-current="page" href="<?php echo route($_REQUEST['id'] . '/' . $_REQUEST['lang']); ?>">
            <i class="bi bi-eye"></i>
            Preview 
          </a>

          <?php
            }else{

              ?>

           <a class="nav-link preview" aria-current="page" href="<?php echo route('wedding/' . $_REQUEST['id'] . '/' . $_REQUEST['lang']); ?>">
            <i class="bi bi-eye"></i>
            Preview 
          </a>

              <?php
            }

          ?>
        


          <a class="nav-link checkout" aria-current="page"
            href="<?php echo route('wedding/' . $_REQUEST['id'] . '/' . $_REQUEST['lang'] .  '/checkout') . queryString(); ?>">
            <i class="bi bi-currency-rupee"></i>
            Payment
          </a>
        </li>

        <?php
      endif;
      ?>

    </ul>
  </div>
</aside>


<script type="text/javascript">
  var url = window.location.pathname
  console.log(url)
  switch (url) {
    case "<?php echo !empty($config['APP_SLUG']) ? '/' . $config['APP_SLUG'] . "/dashboard" : "/dashboard" ?>":
      document.querySelector(".dashboard").classList.toggle("active")
      break
      <?php
      if (isset($_REQUEST['id']) && isset($_REQUEST['lang'])):
        ?>

      case "<?php echo !empty($config['APP_SLUG']) ? '/' . $config['APP_SLUG'] . '/wedding/' . $_REQUEST['id'] . '/' . $_REQUEST['lang'] . '/basic-details' : '/wedding/' . $_REQUEST['id'] . '/' . $_REQUEST['lang'] . '/basic-details'; ?>":
        document.querySelector(".basic-details").classList.toggle("active")
        break

      case "<?php echo !empty($config['APP_SLUG']) ? '/' . $config['APP_SLUG'] . '/wedding/' . $_REQUEST['id'] . '/' . $_REQUEST['lang'] . '/progress' : '/wedding/' . $_REQUEST['id'] . '/' . $_REQUEST['lang'] . '/progress'; ?>":
        document.querySelector(".trackprogress").classList.toggle("active")
        break

      case "<?php echo !empty($config['APP_SLUG']) ? '/' . $config['APP_SLUG'] . '/wedding/' . $_REQUEST['id'] . '/' . $_REQUEST['lang'] . '/our-story' : '/wedding/' . $_REQUEST['id'] . '/' . $_REQUEST['lang'] . '/our-story'; ?>":
        document.querySelector(".our-story").classList.toggle("active")
        break
        
      case "<?php echo !empty($config['APP_SLUG']) ? '/' . $config['APP_SLUG'] . '/wedding/' . $_REQUEST['id'] . '/' . $_REQUEST['lang'] . '/hosts' : '/wedding/' . $_REQUEST['id'] . '/' . $_REQUEST['lang'] . '/hosts'; ?>":
        document.querySelector(".hosts").classList.toggle("active")
        break

        case "<?php echo !empty($config['APP_SLUG']) ? '/' . $config['APP_SLUG'] . '/wedding/' . $_REQUEST['id'] . '/' . $_REQUEST['lang'] . '/timeline' : '/wedding/' . $_REQUEST['id'] . '/' . $_REQUEST['lang'] . '/timeline'; ?>":
        document.querySelector(".timeline").classList.toggle("active")
        break

        case "<?php echo !empty($config['APP_SLUG']) ? '/' . $config['APP_SLUG'] . '/wedding/' . $_REQUEST['id'] . '/' . $_REQUEST['lang'] . '/guests' : '/wedding/' . $_REQUEST['id'] . '/' . $_REQUEST['lang'] . '/guests'; ?>":
        document.querySelector(".guests").classList.toggle("active")
        break

        
      case "<?php echo !empty($config['APP_SLUG']) ? '/' . $config['APP_SLUG'] . '/wedding/' . $_REQUEST['id'] . '/' . $_REQUEST['lang'] . '/additional-details' : '/wedding/' . $_REQUEST['id'] . '/' . $_REQUEST['lang'] . '/additional-details'; ?>":
        document.querySelector(".additional-details").classList.toggle("active")
        break

      case "<?php echo !empty($config['APP_SLUG']) ? '/' . $config['APP_SLUG'] . '/wedding/' . $_REQUEST['id'] . '/' . $_REQUEST['lang'] . '/gallery' : '/wedding/' . $_REQUEST['id'] . '/' . $_REQUEST['lang'] . '/gallery'; ?>":
        document.querySelector(".gallery").classList.toggle("active")
        break

       case "<?php echo !empty($config['APP_SLUG']) ? '/' . $config['APP_SLUG'] . '/wedding/' . $_REQUEST['id'] . '/' . $_REQUEST['lang'] . '/theme' : '/wedding/' . $_REQUEST['id'] . '/' . $_REQUEST['lang'] . '/theme'; ?>":
        document.querySelector(".theme").classList.toggle("active")
        break

        case "<?php echo !empty($config['APP_SLUG']) ? '/' . $config['APP_SLUG'] . '/wedding/' . $_REQUEST['id']. '/' . $_REQUEST['lang'] . '/checkout' : '/wedding/' . $_REQUEST['id'] . '/' . $_REQUEST['lang'] . '/checkout'; ?>":
        document.querySelector(".checkout").classList.toggle("active")
        break



        <?php
      endif;
      ?>
  }
</script>