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
    <h1 class="h2">Create Wedding</h1>

     <div>
     	
     	<form>
    	
    	<div class="row">
    		<!-- Wedding ID -->
		    <div class="mb-3 col-sm-6">
		      <label for="weddingID" class="form-label">Wedding ID</label>
		      <input type="text" class="form-control" id="weddingID" placeholder="Enter Wedding ID">
		    </div>

		    <!-- Wedding Name -->
		    <div class="mb-3 col-sm-6">
		      <label for="weddingName" class="form-label">Wedding Name</label>
		      <input type="text" class="form-control" id="weddingName" placeholder="Enter Wedding Name">
		    </div>

    	</div>

   	<div class="row">
   		 <!-- From (Bride/Groom) -->
		    <div class="mb-3 col-sm-6">
		      <label class="form-label">From</label>
		      <div class="d-flex gap-2">
		      	<div class="form-check">
		        <input class="form-check-input" type="radio" name="fromRadio" id="brideRadio" value="bride">
		        <label class="form-check-label" for="brideRadio">
		          Bride
		        </label>
		      	</div>

		      <div class="form-check">
		        <input class="form-check-input" type="radio" name="fromRadio" id="groomRadio" value="groom">
		        <label class="form-check-label" for="groomRadio">
		          Groom
		        </label>
		      </div>

		      </div>
		    
		    </div>

		    <!-- Language -->
		    <div class="mb-3 col-sm-6">
		      <label for="languageSelect" class="form-label">Language</label>
		      <select class="form-select" id="languageSelect">
		        <option selected>Select Language</option>

			    <option value="en">English</option>
			    <option value="as">Assamese</option>
			    <option value="bn">Bengali</option>
			    <option value="gu">Gujarati</option>
			    <option value="hi">Hindi</option>
			    <option value="kn">Kannada</option>
			    <option value="ml">Malayalam</option>
			    <option value="mr">Marathi</option>
			    <option value="ne">Nepali</option>
			    <option value="or">Odia</option>
			    <option value="pa">Punjabi</option>
			    <option value="ta">Tamil</option>
			    <option value="te">Telugu</option>
			    <option value="ur">Urdu</option>
		      
		      </select>
		    </div>

   	</div>

    <div class="row">
    	<!-- Bride Name -->
	    <div class="mb-3 col-sm-6">
	      <label for="brideName" class="form-label">Bride Name</label>
	      <input type="text" class="form-control" id="brideName" placeholder="Enter Bride Name">
	    </div>

	    <!-- Groom Name -->
	    <div class="mb-3 col-sm-6">
	      <label for="groomName" class="form-label">Groom Name</label>
	      <input type="text" class="form-control" id="groomName" placeholder="Enter Groom Name">
	    </div>

    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

     </div>
    

</main>



<!--Main End-->

<?php require('views/partials/dashboard/scripts.php') ?>












