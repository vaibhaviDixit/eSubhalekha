<?php
locked(['user', 'host', 'manager', 'admin']);
require('views/partials/dashboard/head.php');
require('views/partials/dashboard/sidebar.php');


controller("Wedding");
$wedding = new Wedding();
$weddingData = $wedding->getWedding($_REQUEST['id'], $_REQUEST['lang']);

?>

<head>

<style>
     /* Custom styles */
    .theme-list {
      overflow-y: auto;
      max-height: 80vh;
    }
    .theme-card {
      margin-bottom: 20px;
    }
    .theme-card img {
      max-width: 200px;
      height: auto;
      float: left;
      margin-right: 20px;
    }

    /* Hide by default */
    .theme-card.hidden {
      display: none;
    }

    button{
    	border: 1px solid !important;
    }
    li{
    	cursor: pointer;
    }

    .img-col{
    	display: flex;
    	align-items: center;
    }
    .card-text{
    	font-size: 16px;
    }

  </style>

</head>
<!--Main Start-->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-5">

<h1 class="h2">Choose Theme</h1>

<?php
	
		if (isset($_POST['select'])) {

			$_REQUEST['template']=$_REQUEST['themeName'];

			$updateWedding = $wedding->update($_REQUEST['id'], $_REQUEST['lang'], $_REQUEST);

			if ($updateWedding['error']) {
				?>
				<div class="alert alert-danger">
					<?php
					foreach ($updateWedding['errorMsgs'] as $msg) {
						if (count($msg))
							echo $msg[0] . "<br>";
					}
					?>
				</div>
				<?php
			}else{
				redirect("wedding/" . $_REQUEST['id'] . "/" . $_REQUEST['lang'] . "/theme");

			} 


		}

// Fetch folder names dynamically
$themeFolders = array_filter(glob('themes/*'), 'is_dir');


?>
	
<div class="container mt-5">
  <div class="row">
		  <div class="row">
    <!-- Theme List -->
    <div class="col-lg-3">
      <ul class="list-group theme-list">
        <li class="list-group-item active" data-theme="All">All</li>

        <?php 
            foreach ($themeFolders as $folder) {
                // Extract only the folder name
                $themeName =ucwords(explode("_", basename($folder))[0]);
        ?>
               <li class="list-group-item" data-theme="<?php echo basename($folder); ?>"><?php echo $themeName; ?></li>

        <?php
            }
        ?>

        <!-- Add more themes here -->
      </ul>
    </div>
    <!-- Theme Preview -->
    <div class="col-lg-9">
      <!-- Theme Cards -->
        <div class="theme-cards">


          <?php 
              foreach ($themeFolders as $folder) {
                  // Extract only the folder name
                  $themeName =ucwords(explode("_", basename($folder))[0]);
          ?>
                 <!--  card for Theme 1 -->
          <div class="card theme-card" data-theme="<?php echo basename($folder); ?>">
            <div class="row g-0">
              <div class="col-md-4 img-col">
                <img src="<?php assets('img/template.png') ?>" class="card-img-top" alt="Theme 1 Preview">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between">
                    <h5 class="card-title"><?php echo $themeName; ?></h5>

                      <span class="badge bg-secondary text-primary"><?php if($weddingData['template']=="<?php echo basename($folder); ?>"){echo "Selected";} ?></span>
                  </div>

                  <p class="card-text">A stylish and elegant theme perfect for wedding invitations,with customizable features.</p>
                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                  <a href="preview?theme=<?php echo basename($folder); ?>"><button class="btn btn-sm btn-outline-primary me-md-2 preview-btn">Live Preview</button></a>

                    <form method="post" class="p-0 m-0">
                      <input type="hidden" name="themeName" value="<?php echo basename($folder); ?>">
                     <button class="btn btn-sm btn-outline-success select-btn" type="submit" name="select">Select</button>

                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>

          <?php
              }
          ?>

         </div>
  </div>
  </div>
</div>

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