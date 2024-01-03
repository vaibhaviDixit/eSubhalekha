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
    <h1 class="h2">Hosts</h1>

     <div>
     	
     	<form id="form">
    	
    	<div class="row">
		    <div class="mb-3 col-sm-6">
		      <label for="brideFather" class="form-label">Bride Father</label>
		      <input type="text" class="form-control" id="brideFather" placeholder="Enter Name" required>
		      <strong id="brideFatherMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>
		    </div>

		    <div class="mb-3 col-sm-6">
		      <label for="groomFather" class="form-label">Groom Father</label>
		      <input type="text" class="form-control" id="groomFather" placeholder="Enter Name" required>
		      <strong id="groomFatherMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>
		    </div>

    	</div>

		<div class="row">
		    <div class="mb-3 col-sm-6">
		      <label for="brideMother" class="form-label">Bride Mother</label>
		      <input type="text" class="form-control" id="brideMother" placeholder="Enter Name" required>
		      <strong id="brideMotherMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>
		    </div>

		    <div class="mb-3 col-sm-6">
		      <label for="groomMother" class="form-label">Groom Mother</label>
		      <input type="text" class="form-control" id="groomMother" placeholder="Enter Name" required >
		      <strong id="groomMotherMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>
		    </div>

    	</div>

		<div class="row">
		    <div class="mb-3 col-sm-6">
		      <label for="brideTagline" class="form-label">Bride Tagline</label>
		      <input type="text" class="form-control" id="brideTagline" placeholder="Eldest Daughter of .." required>
		      <strong id="brideTaglineMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>
		    </div>

		    <div class="mb-3 col-sm-6">
		      <label for="groomTagline" class="form-label">Groom Tagline</label>
		      <input type="text" class="form-control" id="groomTagline" placeholder="S/o" required >
		      <strong id="groomTaglineMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>
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












