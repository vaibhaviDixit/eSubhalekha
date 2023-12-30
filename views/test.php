<?php

echo json_encode($_REQUEST);

// test create wedding 
$lang = 'en';
$domain = 'example.com';
$weddingName = 'Sample Wedding';
$from_role = 'groom';
$brideName = 'Anaya';
$groomName = 'Rahul';
$brideQualifications = 'B.com';
$groomQualifications = 'MSC';
$brideBio = 'A brief bio about the bride.';
$groomBio = 'A brief bio about the groom.';

$timeline = array(
    array(
        'Event' => 'Event 1',
        'Time' => '2023-01-01 12:00:00',
        'Venue' => 'Event Venue 1',
        'Address' => '123 Main Street, City, Country',
        'Location_url' => 'https://maps.example.com/event1-location'
    ),
    array(
        'Event' => 'Event 2',
        'Time' => '2023-02-01 14:30:00',
        'Venue' => 'Event Venue 2',
        'Address' => '456 Broad Avenue, Town, Country',
        'Location_url' => 'https://maps.example.com/event2-location'
    ),
    array(
        'Event' => 'Event 3',
        'Time' => '2023-03-01 18:00:00',
        'Venue' => 'Event Venue 3',
        'Address' => '789 Oak Lane, Village, Country',
        'Location_url' => 'https://maps.example.com/event3-location'
    ),
);


$hosts = array(
    array('Name' => 'Avinash', 'Age' => 25, 'Gender' => 'Male', 'Relation' => 'Friend'),
    array('Name' => 'Bhargavi', 'Age' => 30, 'Gender' => 'Female', 'Relation' => 'Sister'),
    array('Name' => 'Divyansh', 'Age' => 22, 'Gender' => 'Male', 'Relation' => 'Cousin'),
    array('Name' => 'Priya', 'Age' => 28, 'Gender' => 'Female', 'Relation' => 'Colleague'),

    );

$textMessage = 'This is a sample text message.';
$template = 'basic';
$tier = 'premium';
$videoMessage = 'Video message link';
$music = 'Music details';
$youtube = 'YouTube link';
$accommodation = 'Accommodation details';
$travel = 'Travel details';
$phone = '9284552192';
$host = 'vaibhavidixit511@gmail.com';
$partner = 'vaibhavidixit511@gmail.com';
$manager = 'vaibhavidixit511@gmail.com';

  controller("Wedding");
  $event = new Wedding();
  $createEvent = $event->create(
    $lang,
    $domain,
    $weddingName,
    $from_role,
    $brideName,
    $groomName,
    $brideQualifications,
    $groomQualifications,
    $brideBio,
    $groomBio,
    $timeline,
    $hosts,
    $textMessage,
    $template,
    $tier,
    $videoMessage,
    $music,
    $youtube,
    $accommodation,
    $travel,
    $phone,
    $host,
    $partner,
    $manager
);

  print_r($createEvent);
  if ($createEvent){ 
    echo "<script> alert('Created!'); </script>";
  	print_r($createEvent);
  }





