<?php

// errors(1);

require('views/partials/dashboard/tracks.php');

if( $completed != sizeof($tracks) ){
	require('config.php');
	
?>
<!DOCTYPE html>
<html lang="en">
<?php 
$config['APP_TITLE'] = "Page Not Found - ".$config['APP_NAME']
?>
<?php include('views/partials/head.php'); ?>

<style>
    #app {
        max-height: 100vh !important;
        margin-top: 10vh !important;
    }

    #app img {
        max-height: 40vh;
    }
</style>

<body>
    <div id="app" class="container text-center">
        <img src="<?php assets('img/eSubhalekhaIcon.png');?>" alt="eSubhalekha" class="img-fluid mb-4">
        <h1><b>Website isn't ready yet!</b></b></h1>
        <h4>Fill all the deatils required</h4>
        <a href="<?php echo route('wedding/' . $_REQUEST['id'] . '/' . $_REQUEST['lang'] . '/progress'); ?>" class="btn btn-primary" rel="noopener">Check Progress</a>
    </div>
</body>

</html>

<?php

}else{

	controller('Theme');
	$wedding = new Wedding();
	$weddingData = $wedding->getWedding($_REQUEST['id'], $_REQUEST['lang']);

	// Instantiate the ThemeController class
	$themeController = new ThemeController();
	// Call the getThemes method
	if(isset($_REQUEST['theme'])){
		$themes = $themeController->render($_REQUEST['theme'], $_REQUEST['type']);	
	}
	else if(isset($weddingData['template'])){
		$themes = $themeController->render($weddingData['template']);	

	}

}


// only accessible after 100% progress done, payment