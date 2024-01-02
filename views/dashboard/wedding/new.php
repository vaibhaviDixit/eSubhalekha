<?php
locked(['user', 'host', 'manager', 'admin']);
require('views/partials/dashboard/head.php');
require('views/partials/dashboard/sidebar.php');


DB::connect();
$weddings = DB::select('weddings', '*', "lang = 'en'")->fetchAll();

$languages = enumToArray(DB::select('information_schema.COLUMNS', 'COLUMN_TYPE', "TABLE_NAME = 'weddings' AND COLUMN_NAME = 'lang'", 'COLUMN_TYPE DESC')->fetch()[0]);

DB::close();

sort($languages);
// current user id
$userID=App::getUser()['email'];

?>

<head>

</head>
<!--Main Start-->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-5">
    <h1 class="h2">Create Wedding</h1>

     <div>
     	
     	<form method="post" name="createWedding" class="form-wedding">
    	<div class="row">
    		<!-- Wedding ID -->
		    <div class="mb-3 col-sm-6">
		      <label for="weddingID" class="form-label">Wedding ID</label>
		      <input type="text" class="form-control" id="weddingID" name="weddingID" placeholder="Enter Wedding ID">
		    </div>

		    <!-- Wedding Name -->
		    <div class="mb-3 col-sm-6">
		      <label for="weddingName" class="form-label">Wedding Name</label>
		      <input type="text" class="form-control" id="weddingName" name="weddingName" placeholder="Enter Wedding Name">
		    </div>

    	</div>

   	<div class="row">
   		 <!-- From (Bride/Groom) -->
		    <div class="mb-3 col-sm-6">
		      <label class="form-label" for="fromSelect">From</label>
			  
		      <select class="form-select" id="fromSelect" name="fromSelect">
			    <option value="bride">Bride</option>
			    <option value="groom">Groom</option>
		      
		      </select>
		    </div>

		    <!-- Language -->
		    <div class="mb-3 col-sm-6">
		      <label for="languageSelect" class="form-label">Language</label>
		      <select class="form-select" id="languageSelect" name="languageSelect">
			    <?php foreach ($languages as $lang) {
					?>
					<option value="<?=$lang?>" <?php if($lang == 'en') echo 'selected' ?>><?=Locale::getDisplayLanguage ($lang, 'en')?></option>	
					<?php
				}		   ?>   
		      </select>
		    </div>

   	</div>

    <div class="row">
    	<!-- Bride Name -->
	    <div class="mb-3 col-sm-6">
	      <label for="brideName" class="form-label">Bride Name</label>
	      <input type="text" class="form-control" id="brideName" name="brideName" placeholder="Enter Bride Name">
	    </div>

	    <!-- Groom Name -->
	    <div class="mb-3 col-sm-6">
	      <label for="groomName" class="form-label">Groom Name</label>
	      <input type="text" class="form-control" id="groomName" name="groomName" placeholder="Enter Groom Name">
	    </div>

    </div>

    <!-- Submit Button -->
    <button type="submit" name="btn-submit" class="btn btn-primary">Create Wedding</button>
  </form>

     </div>
    

</main>



<!--Main End-->

<?php require('views/partials/dashboard/scripts.php') ?>












