<?php

errors(0);

// Include the Wedding controller
controller('Wedding');


// Test data for creating a wedding
$weddingData = [
    'weddingID' => 'RahulWedsSakshi',
    'weddingName' => 'Destination Vivaha Rajasthan',
    'fromRole' => 'bride',
    'brideName' => 'Sakshi', 
    'groomName' => 'Rahul', 
    'host' => 'contact@imradhe.com',
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
$resultOfDelete = $weddingController->create($weddingData);

// Display the result
echo json_encode($resultOfDelete);





