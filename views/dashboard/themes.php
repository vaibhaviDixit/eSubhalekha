<?php
errors(1);

locked(['user', 'host', 'manager', 'admin']);
require('views/partials/dashboard/head.php');
require('views/partials/dashboard/sidebar.php');


?>

<!--Main Start-->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-5">

<h1 class="h2">View Themes</h1>

<?php


// Fetch folder names dynamically
$themeFolders = array_filter(glob('themes/*'), 'is_dir');


?>
	
<div class="container mt-5">
 
<!-- Theme Preview -->
<div class="theme-container">
  <!-- Theme Cards -->
  <div class="row">

    <?php 
        foreach ($themeFolders as $folder) {
            // Extract only the folder name
            $themeDetails = [];
            $themeName = ucwords(explode("_", basename($folder))[0]);
            $themeDetails = json_decode(file_get_contents('themes/'.basename($folder).'/manifest.json'), true);
    ?>
    <!-- Card for Each Theme -->
    <div class="col-lg-4 col-md-6 col-sm-3 mb-4 ">
      <div class="card theme-card text-center position-relative" style="overflow: hidden;">
        <!-- Badge for Discount or Trending -->
        <?php if ($themeDetails['isTrending']) { ?>
          <span class="badge bg-danger position-absolute top-0 end-0 m-2">Trending</span>
        <?php } ?>
        
        <!-- Theme Image with Fixed Height and Responsiveness -->
        <img src="<?php themeAssets(basename($folder),$themeDetails['displayImages'][0]); ?>" class="card-img-top theme-image" alt="Theme Preview">

        <!-- Card Body -->
        <div class="card-body">
          <!-- Theme Name -->
          <h5 class="card-title"><?php echo $themeDetails['themeName']; ?></h5>
          <!-- Theme Price -->
          <dt class="card-text text-muted">Price: <?php echo strtoinr($themeDetails['themePrice'], 2); ?></dt>
        
          <!-- Preview and Select Buttons -->
          <div class="d-flex justify-content-center">
            <!-- Live Preview Button -->
            <a target="_blank" href="<?php echo route("wedding/RahulWedsNita/en/preview?theme=".basename($folder)); ?>" class="btn btn-sm btn-primary preview-btn text-light"> Preview </a>
          </div>
        </div>
      </div>
    </div>
    <?php
        }
    ?>
    
  </div>
</div>

<style>
  .theme-image {
    width: 100%;
    height: 250px;
    object-fit: cover;
  }

  /* Ensure the card is responsive */
  @media (max-width: 768px) {
    .theme-image {
      height: 200px; 
    }
  }
</style>



</main>

<!--Main End-->

<script type="text/javascript">

	  document.addEventListener('DOMContentLoaded', function () {
    // Get the theme list and theme card elements
    const themeList = document.querySelector('.theme-list');
    const themeCards = document.querySelector('.theme-cards');

    // Default theme to show
    showThemes('All');

    // Add event listener to the theme list
    themeList.addEventListener('click', function (event) {
      // Check if the clicked element is an li element
      if (event.target.tagName === 'LI') {
        // Get the theme name from the data-theme attribute
        const themeName = event.target.getAttribute('data-theme');
        // Show themes based on the selected theme
        showThemes(themeName);
      }
    });

    // Function to show themes based on selected theme
    function showThemes(themeName) {
      // Get all theme list items
      const themeItems = themeList.querySelectorAll('.list-group-item');
      // Remove 'active' class from all theme list items
      themeItems.forEach(item => {
        item.classList.remove('active');
      });
      // Add 'active' class to the selected theme list item
      themeList.querySelector(`[data-theme="${themeName}"]`).classList.add('active');

      // Show or hide theme cards based on the selected theme
      const allThemeCards = themeCards.querySelectorAll('.theme-card');
      allThemeCards.forEach(card => {
        if (themeName === 'All' || card.dataset.theme === themeName) {
          card.classList.remove('hidden');
        } else {
          card.classList.add('hidden');
        }
      });
    }
  });

</script>

<?php require('views/partials/dashboard/scripts.php') ?>