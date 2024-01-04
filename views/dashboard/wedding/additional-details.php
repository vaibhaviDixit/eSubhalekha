<?php

locked(['user', 'host', 'manager', 'admin']);
require('views/partials/dashboard/head.php');
require('views/partials/dashboard/sidebar.php');
require('controllers/awss3bucket/upload.php');

DB::connect();
$weddings = DB::select('weddings', '*', "lang = 'en'")->fetchAll();
DB::close();

controller("Wedding");
$wedding = new Wedding();

?>

<head>

</head>
<!--Main Start-->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-5">
    <h1 class="h2">Additional Details</h1>

     <div>
     	
     	<form  method="post" enctype="multipart/form-data">

     		<?php

			if (isset($_POST['btn-submit'])) {
                
				$_REQUEST['host'] = App::getUser()['userID'];

				// upload music to aws bucket
				if(isset($_FILES['music'])){
					
					$uploadedMusicURL=uploadToAWS($_FILES['music']['name']);

					if($uploadedMusicURL['error']){
						echo '<div class="alert alert-danger">'.$uploadedMusicURL['errorMsg'].'</div>';
					}
					else{					
						$_REQUEST['music']=$uploadedMusicURL['url'];	
					}
				}

				$createWedding = $wedding->update($_REQUEST['id'],$_REQUEST['lang'],$_REQUEST);

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
					redirect("wedding/" . $_REQUEST['id'] . "/" . $_REQUEST['lang']."/whatsapp");

			}

			?>
    	
    	<div class="row">
		    <div class="mb-3 col-sm-6">
		      <label for="musicTrack" class="form-label">Music Track</label>
		      
		      <input type="file" class="form-control" id="musicTrack" accept="audio/*" name="music">

		      <strong id="musicTrackMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>
		    </div>

		    <div class="mb-3 col-sm-6">
		      <label for="ytLive" class="form-label">Youtube Live Integration</label>
		      
		      <input type="text" class="form-control" id="ytLive" placeholder="Enter Youtube Live URL" yturl name="youtube" value="<?= $_REQUEST['youtube'] ?? '' ?>" >

		      <strong id="ytLiveMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>
		    </div>

    	</div>

		<div class="row">
		    <div class="mb-3 col-sm-6">
		      <label for="accomodation" class="form-label">Accomodation</label>
		        <textarea class="form-control" id="accomodation" rows="3" name="accommodation"> <?php echo $_REQUEST['accomodation'] ?? ''  ?></textarea>
		      <strong id="accomodationMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>
		    </div>

		    <div class="mb-3 col-sm-6">
		      <label for="travelDet" class="form-label">Travel Details</label>
		        <textarea class="form-control" id="travelDet" rows="3" name="travel">
		        	<?php echo $_REQUEST['travel'] ?? ''  ?>
		        </textarea>
		      <strong id="travelDetMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>
		    </div>

    	</div>

    <!-- Submit Button -->
    <button type="submit" id="submit-btn" name="btn-submit" class="btn btn-primary">Save & Next</button>
  </form>

     </div>
    

</main>
<script type="text/javascript" src="<?php assets("js/validation.js");?>"></script>

<!--Main End-->

<?php require('views/partials/dashboard/scripts.php') ?>












