<?php
errors(1);
// Function to send OTP
    function sendOTP($mobileNumber, $otp) {
        // Account details
        $apiKey = urlencode('NjU2ZDczNTM2NjRlNDIzMzQzNzUzOTc0NzM2ODM1Nzk=');
        $sender = urlencode('TXTLCL');

        $msg='Your OTP is: '.$otp;

        // Message details
        $numbers = array($mobileNumber);
        $message = rawurlencode($msg);
        $numbers = implode(',', $numbers);
         
        // Prepare data for POST request
        $data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender, 'message' => $message);
        // Send the POST request with cURL
        $ch = curl_init('https://api.textlocal.in/send/');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    print_r(sendOTP('919284552192',1234));

    die();

errors(0);

// Include the Wedding controller
controller('Wedding');

// Create an instance of the Wedding controller
$weddingController = new Wedding();

// Sample data for testing (replace with your actual test data)
$weddingID = 'RahulWedsMythri';
$lang = 'en';
$data = [
    'weddingID' => "efreafrearfegf",
    'lang' => 'en',
    'domain' => 'imradhe.com',
    'weddingName' => 'Test Wedding',
    'fromRole' => 'bride',
    'brideName' => 'Alice',
    'groomName' => 'Mythri',
    'brideQualifications' => 'Some qualifications',
    'groomQualifications' => 'Some qualifications',
    'brideBio' => 'Some bio',
    'groomBio' => 'Some bio',
    'story' => [
        ["How we met" => "Some details", "year" => 2019],
        ["Engagement" => "Some details", "year" => 2020],
        ["Memorable Moments" => "Some details"]
    ],
    'timeline' => [
        ["event" => "Ceremony 1", "time" => "12:00 PM", "venue" => "Venue 1", "address" => "Address 1", "locationURL" => "https://maps.google.com/venue1"],
        ["event" => "Ceremony 2", "time" => "03:00 PM", "venue" => "Venue 2", "address" => "Address 2", "locationURL" => "https://maps.google.com/venue2"],
    ],
    'hosts' => [
        "brideFather" => ["name" => "Mahesh Babu", "relation" => "Bride Father"],
        "groomFather" => ["name" => "James Smith", "relation" => "Groom Father"],
        "brideMother" => ["name" => "Jane Doe", "relation" => "Bride Mother"],
        "groomMother" => ["name" => "Emily Smith", "relation" => "Groom Mother"],
        "brideTagline" => "Eldest Daughter of",
        "groomTagline" => "S/o"
    ],
    'invitation' => 'Invitation content',
    'template' => 'Template content',
    'tier' => 'premium',
    'music' => 'https://example.com/music.mp3',
    'youtube' => 'https://www.youtube.com/embed/dNGJP-_0sIE?si=4pcOpWLMp3iJ8Hhc',
    'phone' => '9772992921',
    'whatsappAPIKey' => 'your_api_key',
    'status' => 'paid',
    'host' => 'bf4635a33a9027637b1cb109e5e2f21c'
];

// Call the update method and capture the result
$updateResult = $weddingController->update($weddingID, $lang, $data);


echo json_encode($updateResult);