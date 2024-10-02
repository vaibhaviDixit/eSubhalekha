<?php

errors(1);

$themeDetails = json_decode(file_get_contents('themes/august_theme/details.json'), true);
print_r($themeDetails);

// controller('Theme');

// Instantiate the ThemeController class
// $themeController = new ThemeController();

// Call the getThemes method
// $themes = $themeController->render('fairytale_theme', $_REQUEST['type']);

controller("AWSBucket");
$awsObj=new AWSBucket();
// print_r(expression)


