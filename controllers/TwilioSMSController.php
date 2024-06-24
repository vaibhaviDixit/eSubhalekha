<?php

require 'vendor/twilio/src/Twilio/autoload.php';
use Twilio\Rest\Client;

class TwilioSMS {
   

    public function sendSms($phone,$otp) {

        $sid    = "ACa27fa54e8cf3ae1112b707df2b4e26fd";
        $token  = "3be89c6c664a9c9282ce9899a2307646";
        $twilio = new Client($sid, $token);

        $message = $twilio->messages
          ->create("+919121325466", // to
            array(
              "from" => "+12512377457",
              "body" => $otp
            )
          );
          // print_r($message);

        if($message){
            return true;
        }
        else{
            return false;
        }

    }
   
}


?>


