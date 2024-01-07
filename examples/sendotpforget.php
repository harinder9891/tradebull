<?php 

 $email   = $_POST['email'];
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
 $subject = "OTP Mail From Tradebull.io";
 $txt = "Your one time otp is ".$otp;
 $headers = "From: no-reply@tradebull.io" . "\r\n" . "CC:  @tradebull.io";

 if(mail($email, $subject, $txt, $headers)){
	 echo $otp;
	 }
	 ?>