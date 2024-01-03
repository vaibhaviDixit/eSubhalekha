<?php
locked(['user', 'host', 'manager', 'admin']);
require('views/partials/dashboard/head.php');
require('views/partials/dashboard/sidebar.php');
<<<<<<< HEAD

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












=======

DB::connect();
$weddings = DB::select('weddings', '*', "lang = 'en'")->fetchAll();

$languages = enumToArray(DB::select('information_schema.COLUMNS', 'COLUMN_TYPE', "TABLE_NAME = 'weddings' AND COLUMN_NAME = 'lang'", 'COLUMN_TYPE DESC')->fetch()[0]);

DB::close();


sort($languages);
controller("Wedding");
$wedding = new Wedding();
?>

<head>

</head>
<!--Main Start-->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-5">
	<h1 class="h2">Create Wedding</h1>

	<div>

		<form method="post" name="createWedding" class="form-wedding">

			<?php

			$config['APP_TITLE'] = "Create Wedding | " . $config['APP_TITLE'];
			if (isset($_POST['btn-submit'])) {

				$_REQUEST['host'] = App::getUser()['userID'];
				$createWedding = $wedding->create($_REQUEST);

				if ($createWedding['error']) {
					?>
					<div class="alert alert-danger">
						<?php
						foreach ($createWedding['errorMsgs'] as $msg) {
							if (count($msg))
								echo $msg[0] . "<br>";
						}
						?>
					</div>
					<?php
				} else
					redirect("wedding/" . $_REQUEST['weddingID'] . "/" . $_REQUEST['lang']."/basic-details");

			}

			?>
			<div class="row">

				<!-- Groom Name -->
				<div class="mb-3 col-sm-6">
					<label for="groomName" class="form-label">Groom Name</label>
					<input type="text" class="form-control" id="groomName" name="groomName"
						placeholder="Enter Groom Name" value="<?= $_REQUEST['groomName'] ?? '' ?>">
				</div>

				<!-- Bride Name -->
				<div class="mb-3 col-sm-6">
					<label for="brideName" class="form-label">Bride Name</label>
					<input type="text" class="form-control" id="brideName" name="brideName"
						placeholder="Enter Bride Name" value="<?= $_REQUEST['brideName'] ?? '' ?>">
				</div>

				<!-- From (Bride/Groom) -->
				<div class="mb-3 col-sm-6">
					<label class="form-label" for="fromRole">From</label>

					<select class="form-select" id="fromRole" name="fromRole">
						<option value="bride" <?= ($_REQUEST['fromRole'] == 'bride') ? 'selected' : '' ?>>Bride</option>
						<option value="groom" <?= ($_REQUEST['fromRole'] == 'groom') ? 'selected' : '' ?>>Groom</option>

					</select>
				</div>

				<!-- Language -->
				<div class="mb-3 col-sm-6">
					<label for="lang" class="form-label">Language</label>
					<select class="form-select" id="lang" name="lang">
						<?php foreach ($languages as $lang) {
							?>
							<option value="<?= $lang ?>" <?php
							  if ($_REQUEST['lang'] == $lang)
								  echo 'selected';
							  elseif ($lang == 'en')
								  echo 'selected' ?>>
								<?= Locale::getDisplayLanguage($lang, "en")?>
							</option>
							<?php
						} ?>
					</select>
				</div>
				<!-- Wedding Name -->
				<div class="mb-3 col-sm-6">
					<label for="weddingName" class="form-label">Wedding Name</label>
					<input type="text" class="form-control" id="weddingName" name="weddingName"
						placeholder="Thota vaari pelli sandhadi" value="<?= $_REQUEST['weddingName'] ?? '' ?>">
				</div>




				<!-- Wedding ID -->
				<div class="mb-3 col-sm-6">
					<label for="weddingID" class="form-label">Wedding ID</label>
					<input type="text" class="form-control" id="weddingID" name="weddingID"
						placeholder="KishoreWedsSwathi" value="<?= $_REQUEST['weddingID'] ?? '' ?>">
				</div>
			</div>

			<!-- Submit Button -->
			<button type="submit" name="btn-submit" class="btn btn-primary">Create Wedding</button>
		</form>

	</div>

	<script>
		let weddings = []
		<?php
		foreach ($weddings as $wedding) {
			echo "weddings.push('" . $wedding['weddingID'] . "')\n";
		}
		?>

		function generateWeddingID(groomName, brideName) {
			let weddingID = groomName + "Weds" + brideName;

			if (weddings.includes(weddingID)) {
				weddingID = groomName + "-Weds-" + brideName;
			}

			return weddingID;
		}

		function updateWeddingID() {
			const groomName = document.querySelector('#groomName').value.trim();
			const brideName = document.querySelector('#brideName').value.trim();
			const weddingIDField = document.querySelector('#weddingID');

			if (groomName.length && brideName.length) {
				const newWeddingID = generateWeddingID(groomName, brideName);
				weddingIDField.value = newWeddingID;
			} else weddingIDField.value = "";
		}

		document.querySelector('#groomName').addEventListener('focusout', updateWeddingID);
		document.querySelector('#brideName').addEventListener('focusout', updateWeddingID);
		document.querySelector('#groomName').addEventListener('keyup', updateWeddingID);
		document.querySelector('#brideName').addEventListener('keyup', updateWeddingID);
	</script>
</main>



<!--Main End-->

<?php require('views/partials/dashboard/scripts.php') ?>
>>>>>>> 69586a6a6d6b095b710079a09958c76b681dbdcb
