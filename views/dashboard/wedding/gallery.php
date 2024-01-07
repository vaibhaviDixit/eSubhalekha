<?php

locked(['user', 'host', 'manager', 'admin']);
require('views/partials/dashboard/head.php');
require('views/partials/dashboard/sidebar.php');
require('controllers/awss3bucket/upload.php');

controller("Gallery");
$gallery = new Gallery();
$galleryData = $gallery->getGallery($_REQUEST['id']);
$eventsGallery=$gallery->getGalleryEvents($_REQUEST['id']);

function getImgURL($name){
	$gallery = new Gallery();
	$row=$gallery->getGalleryImg($_REQUEST['id'],$name);
	
	if($row['imageURL']){
		return $row['imageURL'];
	}
	else{
		return false;
	}
	
}


?>

<head>

</head>
<!--Main Start-->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-5">
    <h1 class="h2">Gallery</h1>

     <div>
     	<?php

			if (isset($_POST['btn-submit'])) {
                
				// upload img to aws bucket
				if(!empty($_FILES['bride']['name'])){
					$uploadedURL = uploadToAWS($_FILES,'bride');
					if($uploadedURL['error']){
						echo '<div class="alert alert-danger">'.$uploadedURL['errorMsg'].'</div>';
					}
					else{					
						$_REQUEST['imageURL'] = $uploadedURL['url'];	
						$_REQUEST['imageName']='bride';
						$_REQUEST['type']='bride';
					}
					
				}
				elseif (!empty($_FILES['groom']['name'])) {
					$uploadedURL = uploadToAWS($_FILES,'groom');
					if($uploadedURL['error']){
						echo '<div class="alert alert-danger">'.$uploadedURL['errorMsg'].'</div>';
					}
					else{					
						$_REQUEST['imageURL'] = $uploadedURL['url'];	
						$_REQUEST['imageName']='groom';
						$_REQUEST['type']='groom';
					}
				}
				elseif (!empty($_FILES['eventPic']['name']) && !empty($_REQUEST['imageName']) ) {
					$uploadedURL = uploadToAWS($_FILES,'eventPic');
					if($uploadedURL['error']){
						echo '<div class="alert alert-danger">'.$uploadedURL['errorMsg'].'</div>';
					}
					else{					
						$_REQUEST['imageURL'] = $uploadedURL['url'];
						$_REQUEST['type']='event';
					}
				}
                
                $_REQUEST['weddingID']=$_REQUEST['id'];
				$addToGallery = $gallery->update($_REQUEST);

				if ($addToGallery['error']) {
					?>
					<div class="alert alert-danger">
						<?php
						foreach ($addToGallery['errorMsgs'] as $msg) {
							if (count($msg))
								echo $msg[0] . "<br>";
						}
						?>
					</div>
					<?php
				} else
					redirect("wedding/" . $_REQUEST['id'] . "/" . $_REQUEST['lang']."/gallery");

			}

			?>

     	<form  method="post" enctype="multipart/form-data">
	    	<div class="row">
			    <div class="col-sm-3">
			      <label for="bride" class="form-label">Bride Photo</label>
			    </div>

			    <div class="col-sm-5">
			    	<input type="file" class="form-control" id="bride" accept="image/*" name="bride" required>

			    <strong id="musicTrackMsg" class="text-danger errorMsg my-2 fw-bolder"><?php
			 	if(getImgURL('bride')):
					?>
					<a class="ms-3" href="<?php echo getImgURL('bride'); ?>" target="_blank" >View File <i class="bi bi-box-arrow-up-right"></i> </a>
					<?php endif; ?>
				</strong>

			    </div>

			    <div class="col-sm-3">
			    	<!-- Submit Button -->
	    			<button type="submit" id="submit-btn" name="btn-submit" class="btn btn-primary">Upload</button>
			    </div>

			</div>

  		</form>
  		<!-- groom form -->

     	<form  method="post" enctype="multipart/form-data">
	    	<div class="row">
			    <div class="col-sm-3">
			      <label for="bride" class="form-label">Groom Photo</label>
			    </div>

			    <div class="col-sm-5">
			    	<input type="file" class="form-control" id="groom" accept="image/*" name="groom" required>

			    <strong id="musicTrackMsg" class="text-danger errorMsg my-2 fw-bolder"><?php
			 	if(getImgURL('groom')):
					?>
					<a class="ms-3" href="<?php echo getImgURL('groom'); ?>" target="_blank" >View File <i class="bi bi-box-arrow-up-right"></i> </a>
					<?php endif;?>
				</strong>

			    </div>


			    <div class="col-sm-3">
			    	<!-- Submit Button -->
	    			<button type="submit" id="submit-btn" name="btn-submit" class="btn btn-primary">Upload</button>
			    </div>

			</div>

  		</form>


  		<!--  events  -->
  		<h5>Events Gallery</h5>

  		<button type="button" class="btn btn-primary mb-3 float-start" id="addEventImgBtn"><i
                        class="bi bi-plus-circle"></i>Add</button>
                        <br>

  		<div class="eventGallery">
  			
  			<form  method="post" enctype="multipart/form-data">

		    	<div class="row">
				    <div class="col-sm-3">
				      <input type="text" class="form-control"  name="imageName" placeholder="Event Name" required>
				    </div>

				    <div class="col-sm-5">
				    	<input type="file" class="form-control" accept="image/*" name="eventPic" required>
				    </div>

				    <div class="col-sm-3">
				    	<!-- Submit Button -->
		    			<button type="submit" name="btn-submit" class="btn btn-primary">Upload</button>
				    </div>

				</div>

  			</form>

  		</div>

  		<!--  display event images -->
  		<div>
  			    <?php
                        if (!$eventsGallery['error']):
                                ?>
                                <table class="table table-responsive table-sm">
                                	<thead>
                                		<tr>
                                			<th>Event Name</th>
	                                		<th>Image</th>
	                                		<th>Action</th>
                                		</tr>
                                	</thead>
                                	<tbody>
                                		<?php for ($i = 0; $i < count($eventsGallery); $i++):?>
                                			<tr>
                                				<td><?= $eventsGallery[$i]['imageName'] ?> </td>
                                				<td><a target="_blank" href="<?= $eventsGallery[$i]['imageURL'] ?>"><?= $eventsGallery[$i]['imageURL'] ?></a> </td>
                                				<td><button class="btn btn-danger" onclick="<?php $gallery->deleteOld($_REQUEST['id'],$eventGallery[$i]['imageName']); ?>"><i
                                                class="bi bi-trash-fill"></i></button></td>
                                			</tr>
                                			<?php endfor; ?>
                                		

                                	</tbody>
                                	
                                </table>

                <?php endif;
                ?>
  			
  		</div>


     </div>
    

</main>
<!--Main End-->

<script type="text/javascript">
	
	$(document).ready(function(){
            // Add new form on button click
            $("#addEventImgBtn").click(function(){
                var newForm = $(".eventGallery form:first").clone();
                $(".eventGallery").append(newForm);
            });
        });

</script>

<?php require('views/partials/dashboard/scripts.php') ?>






