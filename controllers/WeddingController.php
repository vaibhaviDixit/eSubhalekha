<?php

/**
 * The Wedding class handles wedding creation and management.
 *
 *
 *
 * @package GraphenePHP
 * @version 2.0.0
 */

class Wedding
{
    // Create operation

    public function create(
    $lang,
    $domain,
    $weddingName,
    $fromRole,
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
) {
    // Sanitize fields
    DB::connect();
    $this->lang = trim(DB::sanitize($lang));
    $this->domain = trim(DB::sanitize($domain));
    $this->weddingName = trim(DB::sanitize($weddingName));
    $this->fromRole = trim(DB::sanitize($fromRole));
    $this->brideName = trim(DB::sanitize($brideName));
    $this->groomName = trim(DB::sanitize($groomName));
    $this->brideQualifications = trim(DB::sanitize($brideQualifications));
    $this->groomQualifications = trim(DB::sanitize($groomQualifications));
    $this->brideBio = trim(DB::sanitize($brideBio));
    $this->groomBio = trim(DB::sanitize($groomBio));
    $this->timeline = json_encode($timeline); // Assuming $timeline is an array
    $this->hosts = json_encode($hosts); // Assuming $hosts is an array
    $this->textMessage = trim(DB::sanitize($textMessage));
    $this->template = trim(DB::sanitize($template));
    $this->tier = trim(DB::sanitize($tier));
    $this->videoMessage = trim(DB::sanitize($videoMessage));
    $this->music = trim(DB::sanitize($music));
    $this->youtube = trim(DB::sanitize($youtube));
    $this->accommodation = trim(DB::sanitize($accommodation));
    $this->travel = trim(DB::sanitize($travel));
    $this->phone = trim(DB::sanitize($phone));
    $this->host = trim(DB::sanitize($host));
    $this->partner = trim(DB::sanitize($partner));
    $this->manager = trim(DB::sanitize($manager));
    DB::close();

    // fields array
   $fields = [
    'lang' => [
        'value' => $this->lang,
        'rules' => [
            [
                'type' => 'required',
                'message' => "Language can't be empty",
            ],
            
        ],
    ],
    'domain' => [
        'value' => $this->domain,
        'rules' => [
            [
                'type' => 'required',
                'message' => "Domain can't be empty",
            ],
            // You can add more validation rules here if needed
        ],
    ],
    'weddingName' => [
        'value' => $this->weddingName,
        'rules' => [
            [
                'type' => 'required',
                'message' => "Wedding name can't be empty",
            ],
            // Add other validation rules if needed
        ],
    ],
    'from_role' => [
        'value' => $this->fromRole,
        'rules' => [
            [
                'type' => 'required',
                'message' => "From role can't be empty",
            ],
            
        ],
    ],
    'brideName' => [
        'value' => $this->brideName,
        'rules' => [
            [
                'type' => 'required',
                'message' => "Bride's name can't be empty",
            ],
            // Add other validation rules if needed
        ],
    ],
    'groomName' => [
        'value' => $this->groomName,
        'rules' => [
            [
                'type' => 'required',
                'message' => "Groom's name can't be empty",
            ],
            // Add other validation rules if needed
        ],
    ],
    'brideQualifications' => [
        'value' => $this->brideQualifications,
        'rules' => [
            [
                'type' => 'maxLength',
                'message' => "Bride's qualifications can't exceed 255 characters",
                'maxLength' => 255,
            ],
        ],
    ],
    'groomQualifications' => [
        'value' => $this->groomQualifications,
        'rules' => [
            [
                'type' => 'minLength',
                'message' => "Groom's qualifications can't exceed 255 characters",
                'minLength' => 255,
            ],
        ],
    ],
    'brideBio' => [
        'value' => $this->brideBio,
        'rules' => [
            [
                'type' => 'maxLength',
                'message' => "Bride's bio can't exceed 255 characters",
                'maxLength' => 255,
            ],
        ],
    ],
    'groomBio' => [
        'value' => $this->groomBio,
        'rules' => [
            [
                'type' => 'maxLength',
                'message' => "Groom's bio can't exceed 255 characters",
                'maxLength' => 255,
            ],
        ],
    ],
    'timeline' => [
        'value' => $this->timeline,
        'rules' => [
            [
                'type' => 'required',
                'message' => "Timeline can't be empty",
            ],
        ],

    ],
    'hosts' => [
        'value' => $this->hosts,
        'rules' => [
            [
                'type' => 'required',
                'message' => "Hosts can't be empty",
            ],
        ],
    ],
    'textMessage' => [
        'value' => $this->textMessage,
        'rules' => [
            [
                'type' => 'required',
                'message' => "Text message can't be empty",
            ],
        ],
    ],
    'template' => [
        'value' => $this->template,
        'rules' => [
            [
                'type' => 'required',
                'message' => "Template can't be empty",
            ],
        ],
    ],
    'tier' => [
        'value' => $this->tier,
        'rules' => [
            [
                'type' => 'required',
                'message' => "Tier can't be empty",
            ],
        ],
    ],
    // as following 3 frields are based on tier they choose so i haven't added required validation
    'videoMessage' => [
        'value' => $this->videoMessage,
        'rules' => [
            // Add validation rules for video message if needed
        ],
    ],
    'music' => [
        'value' => $this->music,
        'rules' => [
            // Add validation rules for music if needed
        ],
    ],
    'youtube' => [
        'value' => $this->youtube,
        'rules' => [
            // Add validation rules for YouTube if needed
        ],
    ],
    'accommodation' => [
        'value' => $this->accommodation,
        'rules' => [
            [
                'type' => 'required',
                'message' => "Accommodation can't be empty",
            ],
        ],
    ],
    'travel' => [
        'value' => $this->travel,
        'rules' => [
            // Add validation rules for travel if needed
        ],
    ],
    'phone' => [
        'value' => $this->phone,
        'rules' => [
            [
                'type' => 'phone',
                'message' => 'Invalid phone number',
            ],
        ],
    ],
    'host' => [
        'value' => $this->host,
        'rules' => [
            [
                'type' => 'required',
                'message' => 'Host is required',
            ],
        ],
    ],
    'partner' => [
        'value' => $this->partner,
        'rules' => [
            [
                'type' => 'required',
                'message' => 'Partner is required',
            ],
        ],
    ],
    'manager' => [
        'value' => $this->manager,
        'rules' => [
            [
                'type' => 'required',
                'message' => 'Manager is required',
            ],
        ],
    ],
    // Add more fields and validation rules as needed
];


    // Call the Validator::validate function
    $validate = Validator::validate($fields);

    if ($validate['error']) {
        return ['error' => $validate['error'], 'errorMsgs' => $validate['errorMsgs']];
    } else {
        $data = array(
            'lang' => $this->lang,
            'domain' => $this->domain,
            'weddingName' => $this->weddingName,
            'from_role' => $this->fromRole,
            'brideName' => $this->brideName,
            'groomName' => $this->groomName,
            'brideQualifications' => $this->brideQualifications,
            'groomQualifications' => $this->groomQualifications,
            'brideBio' => $this->brideBio,
            'groomBio' => $this->groomBio,
            'timeline' => $this->timeline,
            'hosts' => $this->hosts,
            'textMessage' => $this->textMessage,
            'template' => $this->template,
            'tier' => $this->tier,
            'videoMessage' => $this->videoMessage,
            'music' => $this->music,
            'youtube' => $this->youtube,
            'accommodation' => $this->accommodation,
            'travel' => $this->travel,
            'phone' => $this->phone,
            'host' => $this->host,
            'partner' => $this->partner,
            'manager' => $this->manager,
            'createdAt' => date('Y-m-d H:i:s'),
            'status' => 'pending'
        );

        DB::connect();
        $createWedding = DB::insert('weddings', $data);
        DB::close();

        if ($createWedding) {
            $this->error = false;
            $this->errorMsgs['createWedding'] = '';
        } else {
            $this->error = true;
            $this->errorMsgs['createWedding'] = 'Wedding registration failed';
        }

        if ($this->error) {
            return ['error' => $this->error, 'errorMsgs' => $this->errorMsgs];
        } else {
            return ['error' => $this->error, 'errorMsgs' => $this->errorMsgs, 'message' => 'Wedding registration successful'];
        }
    }
}
// create function ends


  
}
