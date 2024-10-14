<?php

errors(1);

$themeDetails = json_decode(file_get_contents('themes/august_theme/details.json'), true);
// print_r($themeDetails);

// controller('Theme');

// Instantiate the ThemeController class
// $themeController = new ThemeController();

// Call the getThemes method
// $themes = $themeController->render('fairytale_theme', $_REQUEST['type']);

controller("AWSBucket");
$awsObj=new AWSBucket();
// print_r(expression)



   // Path to mPDF autoload file
   require_once __DIR__ . '/../controllers/vendor/autoload.php';

   // Check if mPDF class is loaded
   if (!class_exists('Mpdf\Mpdf')) {
       die('mPDF class not found. Check if mPDF is installed.');
   }

   use Mpdf\Mpdf;
   
   // Create a new mPDF instance
   $mpdf = new Mpdf();

   // Your PDF generation logic here