<?php
locked(['user', 'host', 'manager', 'admin']);
require('views/partials/dashboard/head.php');
require('views/partials/dashboard/sidebar.php');

DB::connect();
$weddings = DB::select('weddings', '*', "lang = 'en'")->fetchAll();
DB::close();

// current user id
$userID=App::getUser()['email'];

// Get the current year
$currentYear = date("Y");

// Create an array with the last 50 years
$years = range($currentYear, $currentYear - 50, -1);

?>

<head>

</head>
<!--Main Start-->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-5">
    <h1 class="h2">Basic Details</h1>

     <div>
     	
     	<form id="form">
    	
    	<div class="row">
		    <div class="mb-3 col-sm-6">
		      <label for="brideQuali" class="form-label">Bride Qualification</label>
		      <input type="text" class="form-control" id="brideQuali" placeholder="Enter Bride Qualification">
		      <strong id="brideQualiMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>
		    </div>

		    <div class="mb-3 col-sm-6">
		      <label for="groomQuali" class="form-label">Groom Qualification</label>
		      <input type="text" class="form-control" id="groomQuali" placeholder="Enter Groom Qualification">
		      <strong id="groomQualiMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>
		    </div>

    	</div>

		<div class="row">
		    <div class="mb-3 col-sm-6">
		      <label for="brideBio" class="form-label">Bride Bio</label>
		        <textarea class="form-control" id="brideBio" rows="3" required></textarea>
		      <strong id="brideBioMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>
		    </div>

		    <div class="mb-3 col-sm-6">
		      <label for="groomBio" class="form-label">Groom Bio</label>
		        <textarea class="form-control" id="groomBio" rows="3" required></textarea>
		      <strong id="groomBioMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>
		    </div>

    	</div>


		<label for="brideTagline" class="form-label">Story</label>

		<div class="row">
		    <div class="mb-3 col-sm-9">
		      <label for="howWeMeet" class="form-label">How we meet?</label>
		      <textarea class="form-control" id="howWeMeet" rows="1"></textarea>
		      <strong id="howWeMeetMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>
		    </div>

		    <div class="mb-3 col-sm-3">
		      
		      <label for="howWeMeetYear" class="form-label">Year</label>

		      <select class="form-select" id="howWeMeetYear" >
		      	<?php
		      		// Loop through the years and create option elements
					foreach ($years as $year) {
					    echo '<option value="' . $year . '">' . $year . '</option>';
					}
		      	?>
		      </select>
		      
		      <strong id="howWeMeetYearMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>
		    </div>

    	</div>

    	<div class="row">
		    <div class="mb-3 col-sm-9">
		      <label for="engagement" class="form-label">Engagement</label>
		      <textarea class="form-control" id="engagement" rows="1"></textarea>
		      <strong id="engagementMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>
		    </div>

		    <div class="mb-3 col-sm-3">
		      
		      <label for="engageYear" class="form-label">Year</label>

		      <select class="form-select" id="engageYear" >
		      	<?php
		      		// Loop through the years and create option elements
					foreach ($years as $year) {
					    echo '<option value="' . $year . '">' . $year . '</option>';
					}
		      	?>
		      </select>
		      
		      <strong id="engageYearMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>
		    </div>

    	</div>

    	<div class="row">
		    <div class="mb-3 col-sm-12">
		      <label for="moments" class="form-label">Memorable Moments</label>
		      <textarea class="form-control" id="moments" rows="3"></textarea>
		      <strong id="momentsMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>
		    </div>
		</div>

    <!-- Submit Button -->
    <button type="button" id="submit-btn" class="btn btn-primary">Submit</button>
  </form>

     </div>
    

</main>
<script type="text/javascript" src="<?php assets("js/validation.js");?>"></script>

<!--Main End-->

<?php require('views/partials/dashboard/scripts.php') ?>












