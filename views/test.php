<?php

errors(1);

// Include the Wedding controller
controller('Wedding');


// Test data for creating a wedding
$weddingData = [
    'weddingID' => 'NirajWedsNitya',
    'lang'=>'en',
    'weddingName' => 'Destination Vivah Rajasthan',
    'fromRole' => 'groom',
    'phone'=>'9277556933',
    'domain'=>'subh.com',
    'brideName' => 'Nitya', 
    'groomName' => 'Niraj', 
    'host' => 'vaibhavidixit511@gmail.com',
];


// Create an instance of the Wedding controller
$weddingController = new Wedding();

// // Test the create function
// $result = $weddingController->create($weddingData);

// // Display the result
// echo json_encode($result);


// // Test the update function
// $resultOfUpdate = $weddingController->update('NirajWedsNitya',$weddingData);

// // Display the result
// echo json_encode($resultOfUpdate);

// Test the delete function

// $resultOfDelete = $weddingController->delete('RehanWedsHarshada','en');


// Test the delete function
// $resultOfDelete = $weddingController->create($weddingData);

// Display the result
// echo json_encode($resultOfDelete);

?>

<!-- 
To apply validation rules:
span id should be input field {name+Error}
input field id and name should be same

as attributes we can add validations like required, domain, email


 -->






