<?php
 
  $phone=$_REQUEST['phone'];
  $otp=$_REQUEST['otp'];

  controller("Auth");
  $user = new Auth();

  $register = $user->registerByOTP($phone,$otp,'user');
  redirect('/');  
