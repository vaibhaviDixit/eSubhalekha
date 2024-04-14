<?php

controller('Theme');
controller("Wedding");
$wedding = new Wedding();
$weddingData = $wedding->getWedding($_REQUEST['id'], $_REQUEST['lang']);

// Instantiate the ThemeController class
$themeController = new ThemeController();
// Call the getThemes method
if(isset($_REQUEST['theme'])){
	echo "THEME: ".$_REQUEST['theme'];
	$themes = $themeController->render($_REQUEST['theme'], $_REQUEST['type']);	
}
else if(isset($weddingData['template'])){
	echo "THEME: ".$weddingData['template'];
	$themes = $themeController->render($weddingData['template'], $_REQUEST['type']);	

}
