<?php

require 'controllers/vendor/autoload.php';
use Otpless\OTPLessAuth; 

class OTPLess{

	protected $clientId="D1766V577RCSN3YBEY0454Y6MVUJFVNY";
	protected $clientSecret="nc7nxagvxrzxu3ep5gz7ct3yyo6ohp2z";

	protected $orderId;
	protected $expiry="120"; //seconds 

	protected $auth;

	public function __construct() {

		$this->auth=new OtplessAuth();

	}

	public function generateUniqueString($length = 10) {
	    // Get the current time in microseconds
	    $time = microtime();
	    // Hash the time with a secure algorithm
	    $hash = hash('sha256', $time);
	    // Convert the hash to a base64 string to make it shorter
	    $base64 = base64_encode($hash);
	    // Remove any characters that are not alphanumeric
	    $base64 = preg_replace("/[^A-Za-z0-9]/", '', $base64);
	    // Truncate the string to the desired length
	    $uniqueString = substr($base64, 0, $length);
	    return $uniqueString;
	}

	public function sendOTP($mobile){
	    $this->orderId = $this->generateUniqueString();
		$data = $this->auth->sendOtp($mobile, "",$this->orderId, $this->expiry, "hash", $this->clientId, $this->clientSecret, "4", "SMS");
		return $data;
	}

	public function verifyOTP($mobile,$otp,$orderId){
		//verify otp
		$data = $this->auth->verifyOtp($mobile, "",$orderId ,$otp,  $this->clientId, $this->clientSecret);
		return $data;
	}


}


















