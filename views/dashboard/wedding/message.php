<?php
// errors(1);
locked(['user', 'host', 'manager', 'admin']);
require('views/partials/dashboard/head.php');
require('views/partials/dashboard/sidebar.php');


controller("Wedding");
controller("Message");
$wedding = new Wedding();
$weddingData = $wedding->getWedding($_REQUEST['id'], $_REQUEST['lang']);

$message = new Message();
$weddingID=$_REQUEST['id'];
$lang=$_REQUEST['lang'];
$messageID=$_REQUEST['messageID'];

DB::connect();
$messageData = DB::select('messages', '*', "weddingID='$weddingID' AND lang='$lang' AND messageID='$messageID' ")->fetchAll();
DB::close();

DB::connect();
$guests = DB::select('guests', '*', " weddingID='$weddingID' AND lang='$lang' ")->fetchAll();
DB::close();

controller("Guest");
$guest=new Guest();

?>

<head>


</head>
<!--Main Start-->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-5">

<h1 class="h2"><?php echo strtoupper($messageData[0]['type']); ?>  Message</h1>

<?php

			if (isset($_POST['btn-submit'])) {

				$_REQUEST['weddingID']=$_REQUEST['id'];

				$createMessage = $message->create($_REQUEST);

				if ($createMessage['error']) {
					?>
					<div class="alert alert-danger">
						<?php
						foreach ($createMessage['errorMsgs'] as $msg) {
							if (count($msg))
								echo $msg[0] . "<br>";
						}
						?>
					</div>
					<?php
				} else{
					redirect("wedding/" . $_REQUEST['id'] . "/" . $_REQUEST['lang']."/messages");
				}

			}

			?>

	 <div class="container mt-4">

        <p class="bg-light p-3"><?= $messageData[0]['text_']; ?></p>

        <form  method="post">
        <div class="row">

        <div class="col-sm-8 mb-3" id="guest">
            <label for="guest" class="form-label">Select Guests</label>
            <select name="guestId[]" id="guest" class="form-select guest-select" multiple="multiple" required>
                <?php foreach ($guests as $guest) { ?>
                    <option value="<?php echo $guest['guestID']; ?>">
                        <?php echo $guest['name'] . '(' . $guest['phone'] . ')'; ?>
                    </option>
                <?php } ?>
            </select>
            <strong id="guestMsg" class="text-danger"></strong>
        </div>

        </div>
      
        <button type="submit" name="btn-submit" class="btn btn-primary">Send Message</button>

    </form>

    <script>
        $(document).ready(function() {
            $('.guest-select').select2();
        });
    </script>
    
    </div>
</main>


<!--Main End-->

<?php require('views/partials/dashboard/scripts.php') ?>