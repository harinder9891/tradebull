<?php 
error_reporting(0);
 $msg="";
 $address = $_POST['address'];
 $country = $_POST['country'];
 $email   = $_POST['email'];
 $fname   = $_POST['fname'];
 $lev     = $_POST['lev'];
 $lname   = $_POST['lname'];
 $phone   = $_POST['phone'];
 $plan    = $_POST['plan'];
 $type    = $_POST['type'];
 $name = $fname.' '.$lname;
 $namecut = substr($name, 0, 5);
 $n = 4;
 function generateNumericOTP($n) { 
 $generator = "1357902468";   
 $result = "";    
 for ($i = 1; $i <= $n; $i++) {  
 $result .= substr($generator, (rand()%(strlen($generator))), 1);   
 }
 return $result;
 } 
 $otp = generateNumericOTP($n);
 $subject = "OTP Mail From Tradebullfx";
 $txt = "Your one time otp is ".$otp;
 $headers = "From: no-reply@tradebull.io" . "\r\n" . "CC:  @tradebull.io";

 if(mail($email, $subject, $txt, $headers)){
	 echo $otp;
	 }
?>