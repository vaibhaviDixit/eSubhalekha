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
    <h1 class="h2">Checkout</h1>

     <div>
     	
     	<form id="form">
    	
    	<div class="row">
		    <div class="mb-3 col-sm-6">
		      <label for="tier" class="form-label">Tier</label>
		      
		      <select class="form-select" id="tier" required>
			    <option value="en">Basic ( ₹ 8000)</option>
			    <option value="as">Standard ( ₹ 16000)</option>
			    <option value="bn">Premium ( ₹ 20000+)</option>
			</select>

		      <strong id="tierMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>
		    </div>

		    <div class="mb-3 col-sm-6">
		      <label for="domain" class="form-label">Domain</label>
		      <input type="text" class="form-control" id="domain" placeholder="Enter Domain" required domain>
		      <strong id="domainMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>
		    </div>

    	</div>


    <!-- Submit Button -->
    <button type="button" id="submit-btn" class="btn btn-primary">Checkout</button>
  </form>

     </div>
    

</main>
<script type="text/javascript" src="<?php assets("js/validation.js");?>"></script>

<!--Main End-->

<?php require('views/partials/dashboard/scripts.php') ?>












