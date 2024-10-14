<?php 

$weddingData = array(
    "weddingID" => "NitaWedsRahul",
    "lang" => "en",
    "domain" => "www.rahulnita2024wedding.com",
    "weddingName" => "Elegant Maharashtrian Wedding",
    "fromRole" => "bride",
    "brideName" => "Nita",
    "groomName" => "Rahul",
    "brideQualifications" => "MSc in Computer Science",
    "groomQualifications" => "BTech in Mechanical Engineering",
    "brideBio" => "Nita is a passionate software developer working at a multinational firm. She loves exploring new technologies and enjoys reading in her free time.",
    "groomBio" => "Rahul is a senior mechanical engineer at an automotive company. He is an avid traveler and enjoys outdoor sports.",
    "story" => json_encode(array(
        "howWeMet" => "We met through mutual friends at a wedding",
        "whenWeMet" => "2018",
        "engagement" => "We got engaged during a family trip",
        "engagementYear" => "2023",
        "memorableMoments" => "Trekking in the Himalayas, beach vacations",
        "display" => "true"
    )),
    "timeline" => json_encode(array(
        array(
            "event" => "Engagement",
            "type" => "engagement",
            "startTime" => "2023-05-15T19:00",
            "endTime" => "2023-05-15T22:00",
            "locationURL" => "https://maps.app.goo.gl/EngagementVenueLink",
            "venue" => "The Grand Hall",
            "address" => "Mumbai, India"
        ),
        array(
            "event" => "Wedding Ceremony",
            "type" => "wedding",
            "startTime" => "2024-12-10T10:00",
            "endTime" => "2024-12-10T13:00",
            "locationURL" => "https://maps.app.goo.gl/WeddingVenueLink",
            "venue" => "Royal Palace",
            "address" => "Pune, India"
        ),
        array(
            "event" => "Reception",
            "type" => "reception",
            "startTime" => "2024-12-10T19:00",
            "endTime" => "2024-12-10T23:00",
            "locationURL" => "https://maps.app.goo.gl/ReceptionVenueLink",
            "venue" => "Royal Palace",
            "address" => "Pune, India"
        )
    )),
    "hosts" => json_encode(array(
        "brideFather" => array("name" => "Mohan Desai", "relation" => "Bride's Father"),
        "groomFather" => array("name" => "Shyam Kulkarni", "relation" => "Groom's Father"),
        "brideMother" => array("name" => "Suman Desai", "relation" => "Bride's Mother"),
        "groomMother" => array("name" => "Anjali Kulkarni", "relation" => "Groom's Mother"),
        "brideTagline" => "Eldest daughter of the Desai family",
        "groomTagline" => "Only son of the Kulkarni family"
    )),
    "invitation" => "We invite you to celebrate the union of Nita and Rahul. Join us for a day filled with love, laughter, and joy.",
    "template" => "royal_theme",
    "tier" => "premium",
    "music" => "https://www.youtube.com/watch?v=WeddingMusicLink",
    "youtube" => "https://www.youtube.com/channel/WeddingLiveStream",
    "accommodation" => "Accommodation will be provided at The Grand Hotel, Pune. For booking details, contact +91-1234567890.",
    "travel" => "Travel arrangements can be made from Mumbai to Pune. Contact our travel partner at +91-9876543210 for details.",
    "phone" => "+91-9876543210",
    "whatsappAPIKey" => "YourWhatsAppAPIKeyHere",
    "originalPrice" => "INR 1,50,000",
    "finalPrice" => "INR 1,25,000",
    "host" => "283d839c38dc30604c880efc7d5db73c",
    "partner" => "Shaadi Event Planners",
    "manager" => "Nikita Sharma - Event Coordinator",
    "createdAt" => "2024-09-26 17:22:36",
    "updatedAt" => "2024-10-08 22:42:18",
    "status" => "confirmed"
);

$story = array(
    "howWeMet" => "We first crossed paths at a charity event, and sparks flew instantly.",
    "whenWeMet" => "2017",
    "engagement" => "We got engaged during a surprise rooftop dinner.",
    "engagementYear" => "2023",
    "memorableMoments" => "Traveling together to Paris, spontaneous road trips, and late-night movie marathons.",
    "display" => "true"
);

$timeline = array(
    array(
        "event" => "Engagement",
        "type" => "engagement",
        "startTime" => "2024-10-16T18:00",
        "endTime" => "2024-10-16T21:00",
        "locationURL" => "https://maps.app.goo.gl/EngagementVenueLink",
        "venue" => "The Grand Ballroom",
        "address" => "Mumbai, India"
    ),
    array(
        "event" => "Mehandi",
        "type" => "mehandi",
        "startTime" => "2024-10-18T14:00",
        "endTime" => "2024-10-18T17:00",
        "locationURL" => "https://maps.app.goo.gl/MehandiVenueLink",
        "venue" => "Royal Garden",
        "address" => "Pune, India"
    ),
    array(
        "event" => "Baraat",
        "type" => "baraat",
        "startTime" => "2024-10-20T08:00",
        "endTime" => "2024-10-20T10:00",
        "locationURL" => "https://maps.app.goo.gl/BaraatVenueLink",
        "venue" => "Kulkarni Residence",
        "address" => "Sangola, Maharashtra"
    ),
    array(
        "event" => "Muhurt",
        "type" => "muhurt",
        "startTime" => "2024-10-20T11:00",
        "endTime" => "2024-10-20T13:00",
        "locationURL" => "https://maps.app.goo.gl/WeddingVenueLink",
        "venue" => "Royal Palace",
        "address" => "Sangola, Maharashtra"
    )
);


$gallery = array(
    array(
        "imageID" => "6b6c8891e0359a185bc6efe7ff5052b3",
        "imageName" => "wedding_highlights.mp4",
        "weddingID" => "NitaWedsRahul",
        "imageURL" => "https://www.example.com/videos/wedding_highlights.mp4",
        "uploadedAt" => "2024-10-08 18:28:15",
        "type" => "gallery"
    ),
    array(
        "imageID" => "b7c8298f89e4e9b6a6e0e43b0632f3a1",
        "imageName" => "baraat.jpg",
        "weddingID" => "NitaWedsRahul",
        "imageURL" => "https://www.example.com/images/baraat.jpg",
        "uploadedAt" => "2024-10-08 22:41:56",
        "type" => "gallery"
    ),
    array(
        "imageID" => "f8c6573e9b1f8a6c4b6c92db29074b53",
        "imageName" => "mehendi.jpg",
        "weddingID" => "NitaWedsRahul",
        "imageURL" => "https://www.example.com/images/mehendi.jpg",
        "uploadedAt" => "2024-10-08 10:18:15",
        "type" => "gallery"
    )
);

$preweddingGallery = array(
    0 => array(
        'type' => 'image',
        'imageURL' => home() . "themes/sample_theme/assets/img/prewed/one.png"
    ),
    1 => array(
        'type' => 'image',
        'imageURL' => home() . "themes/sample_theme/assets/img/prewed/two.png"
    ),
    2 => array(
        'type' => 'video',
        'imageURL' => home() . "themes/sample_theme/assets/img/prewed/vid1.mp4"
    ),
    3 => array(
        'type' => 'image',
        'imageURL' => home() . "themes/sample_theme/assets/img/prewed/three.png"
    ),
    4 => array(
        'type' => 'video',
        'imageURL' => home() . "themes/sample_theme/assets/img/prewed/vid1.mp4"
    ),
    5 => array(
        'type' => 'image',
        'imageURL' => home() . "themes/sample_theme/assets/img/prewed/four.png"
    ),
    6 => array(
        'type' => 'image',
        'imageURL' => home() . "themes/sample_theme/assets/img/prewed/five.png"
    ),
    7 => array(
        'type' => 'video',
        'imageURL' => home() . "themes/sample_theme/assets/img/prewed/vid1.mp4"
    )
);



   function getImgURL($name){

      if($name == 'hero'){
        return 'https://i.pinimg.com/originals/58/df/9e/58df9ef948a48f04f6dc0d7642aadcb8.jpg';
      }
      elseif ($name == 'couple') {
        ob_start(); // Start output buffering
        themeAssets("fairytale_theme","img/couple.png"); // Call the function that echoes
        $output = ob_get_clean(); // Capture the output and clean the buffer
        return $output;
      }
      elseif ($name == 'bride') {
        ob_start(); // Start output buffering
        themeAssets("fairytale_theme","img/bride.png"); // Call the function that echoes
        $output = ob_get_clean(); // Capture the output and clean the buffer
        return $output;
      }
      elseif ($name == 'groom') {
        ob_start(); // Start output buffering
        themeAssets("fairytale_theme","img/groom.png"); // Call the function that echoes
        $output = ob_get_clean(); // Capture the output and clean the buffer
        return $output;
      }
      elseif ($name == 'baraat') {
        ob_start(); // Start output buffering
        themeAssets("fairytale_theme","img/baraat.png"); // Call the function that echoes
        $output = ob_get_clean(); // Capture the output and clean the buffer
        return $output;
      }
      elseif ($name == 'mehandi') {
        ob_start(); // Start output buffering
        themeAssets("fairytale_theme","img/mehendi.png"); // Call the function that echoes
        $output = ob_get_clean(); // Capture the output and clean the buffer
        return $output;
      }
      elseif ($name == 'engagement') {
        ob_start(); // Start output buffering
        themeAssets("fairytale_theme","img/engagement.png"); // Call the function that echoes
        $output = ob_get_clean(); // Capture the output and clean the buffer
        return $output;
      }
      elseif ($name == 'muhurt') {
        ob_start(); // Start output buffering
        themeAssets("fairytale_theme","img/muhurt.png"); // Call the function that echoes
        $output = ob_get_clean(); // Capture the output and clean the buffer
        return $output;
      }
      return null;
    }


?>