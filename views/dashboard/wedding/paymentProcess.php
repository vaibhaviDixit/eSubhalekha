<?php

// errors(1);

// Check if data is received via POST
if (isset($_POST['paymentID']) && isset($_POST['weddingID']) && isset($_POST['lang']) && isset($_POST['userID'])) {
    
    // Create an instance of the Payment class
    controller("Payment");
    $payment = new Payment();

    // Prepare the data array
    $data = [
        'paymentID' => $_POST['paymentID'],
        'weddingID' => $_POST['weddingID'],
        'lang' => $_POST['lang'],
        'userID'    => $_POST['userID']
    ];

    // Call the create method of Payment class
    $response = $payment->create($data);

    // Return the response as JSON
    echo json_encode($response);

} else {
    // If required data is missing
    echo json_encode(['error' => true, 'errorMsgs' => 'Payment Failed!']);
}

?>
