<?php
errors(1);
locked(['user', 'host', 'manager', 'admin']);
require('views/partials/dashboard/head.php');
require('views/partials/dashboard/sidebar.php');


controller("Wedding");
$wedding = new Wedding();
$weddingData = $wedding->getWedding($_REQUEST['id'], $_REQUEST['lang']);
$story = json_decode($weddingData['story'], true);

?>

<head>

</head>
<!--Main Start-->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-5">

<h1 class="h2">Whatsapp Setup</h1>

	 <div>
     	
     	<form  method="post" enctype="multipart/form-data">

     		<?php

			if (isset($_POST['btn-submit'])) {
                
				$_REQUEST['host'] = App::getUser()['userID'];
               	

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
					redirect("wedding/" . $_REQUEST['id'] . "/" . $_REQUEST['lang']."/preview");

			}

			?>
    	
    	<div class="row">
		    <div class="mb-3 col-sm-6">
		      <label for="phone" class="form-label">Phone (Whatsapp only)</label>
		      
		      <input type="text" class="form-control" id="phone"  name="phone" phone placeholder="Enter Whatsapp Mobile No.">

		      <strong id="phoneMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>
		    </div>

		    <div class="mb-3 col-sm-6">
		      <label for="whatsappAPIKey" class="form-label">API Key</label>
		      
		      <input type="text" class="form-control" id="whatsappAPIKey" placeholder="Enter Whatsapp API Key" name="whatsappAPIKey" value="<?= $_REQUEST['whatsappAPIKey'] ?? '' ?>" >

		      <strong id="whatsappAPIKeyMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>
		    </div>

    	</div>

		<div class="row">
		    <div class="mb-3 col-sm-12">
		      <label for="invitation" class="form-label">Invitation Msg</label>
		        <textarea class="form-control" id="invitation" rows="3" name="invitation"> <?php echo $_REQUEST['invitation'] ?? ''  ?></textarea>
		      <strong id="invitationMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>
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