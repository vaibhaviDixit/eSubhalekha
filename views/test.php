<?php

errors(1);

// controller('Theme');

// Instantiate the ThemeController class
// $themeController = new ThemeController();

// Call the getThemes method
// $themes = $themeController->render('fairytale_theme', $_REQUEST['type']);

controller('BrevoSMS');

// API: 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


// Usage
// $brevoSms = new BrevoSMS();
// $sender = 'Vaibhavi';
// $recipient = '+918767431102';
// $message = 'Hello OTP: 34563!';
// $webUrl = '';
// $brevoSms->sendTransactionalSms($sender, $recipient, $message);

// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md

// controller('TwilioSMS');
// $twilioSMs = new TwilioSMS();
// $message = $twilioSMs->sendSms("+919121325466","123456");
// print_r($message);


// Make sure you install the below package
// composer require otpless/otpless-auth-sdk
//channel = WHATSAPP/SMS/EMAIL

require 'controllers/vendor/autoload.php';

use Otpless\OTPLessAuth; 
$auth = new OtplessAuth(); 

$clientId="D1766V577RCSN3YBEY0454Y6MVUJFVNY";
$clientSecret="nc7nxagvxrzxu3ep5gz7ct3yyo6ohp2z";
$mobile="+919284552192";

$uniqueId = uniqid(mt_rand(), true);
$orderId = hash('sha256', $uniqueId);
$expiry="120"; //seconds 

//send otp
$data = $auth->sendOtp($mobile, "",$orderId, $expiry, "hash", $clientId, $clientSecret, "4", "SMS");
echo $data;



















