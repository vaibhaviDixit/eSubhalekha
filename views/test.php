<?php
errors(0);
// Include the Wedding controller
controller('Wedding');

// Test data for creating a wedding
$weddingData = [
    'weddingName' => 'Pingali vari Vivaha mahotsavam',
    'fromRole' => 'bride',
    'brideName' => 'Lakshmi', 
    'groomName' => 'Raju', 
    'host' => 'contact@imradhe.com',
];


// Create an instance of the Wedding controller
$weddingController = new Wedding();

// Test the create function
$result = $weddingController->create($weddingData);

// Display the result
echo json_encode($result);
