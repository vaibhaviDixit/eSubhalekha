<?php

//display errors for debugging purpose
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include the Wedding controller
controller('Wedding');


// Test data for creating a wedding
$weddingData = [
    'weddingID' => 'RahulWedsSakshi',
    'weddingName' => 'Destination Vivaha Rajasthan',
    'fromRole' => 'bride',
    'brideName' => 'Sakshi', 
    'groomName' => 'Rahul', 
    'host' => 'vaibhavidixit511@gmail.com',
];


// Create an instance of the Wedding controller
$weddingController = new Wedding();

// // Test the create function
// $result = $weddingController->create($weddingData);

// // Display the result
// echo json_encode($result);


// // Test the update function
// $resultOfUpdate = $weddingController->update('HarshWedsHarshada',$weddingData);

// // Display the result
// echo json_encode($resultOfUpdate);



// Test the delete function
$resultOfDelete = $weddingController->delete('RehanWedsHarshada');

// Display the result
echo json_encode($resultOfDelete);





