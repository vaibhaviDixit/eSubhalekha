<?php
locked(['user', 'host', 'manager', 'admin']);
require('views/partials/dashboard/head.php');
require('views/partials/dashboard/sidebar.php');

DB::connect();
$weddings = DB::select('weddings', '*', "lang = 'en'")->fetchAll();
DB::close();

// current user id
$userID=App::getUser()['email'];


?>

<head>

</head>
<!--Main Start-->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-5">
    <h1 class="h2">Additional Details</h1>

     <div>
     	
     	<form id="form">
    	
    	<div class="row">
		    <div class="mb-3 col-sm-6">
		      <label for="musicTrack" class="form-label">Music Track</label>
		      <input type="text" class="form-control" id="musicTrack" placeholder="Enter Music Track URL" url>
		      <strong id="musicTrackMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>
		    </div>

		    <div class="mb-3 col-sm-6">
		      <label for="ytLive" class="form-label">Youtube Live Integration</label>
		      <input type="text" class="form-control" id="ytLive" placeholder="Enter Youtube Live URL" url>
		      <strong id="ytLiveMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>
		    </div>

    	</div>

		<div class="row">
		    <div class="mb-3 col-sm-6">
		      <label for="accomodation" class="form-label">Accomodation</label>
		        <textarea class="form-control" id="accomodation" rows="3"></textarea>
		      <strong id="accomodationMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>
		    </div>

		    <div class="mb-3 col-sm-6">
		      <label for="travelDet" class="form-label">Travel Details</label>
		        <textarea class="form-control" id="travelDet" rows="3"></textarea>
		      <strong id="travelDetMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>
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












