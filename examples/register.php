<?php 
//echo'mail sent'; 
require_once __DIR__."/../vendor/autoload.php";
use Tarikh\PhpMeta\MetaTraderClient;
use Tarikh\PhpMeta\Entities\User;
use Tarikh\PhpMeta\src\Lib\MTEnDealAction;
include('../src/config/conn.php');
 $msg = $_POST['msg'];
if($msg =="success"){
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
	$trd_roompwd = $namecut.$otp;
	$pass1=substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 11);
	$pass2=substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 11);
	$pass3=substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 11);
	//echo'its working';
	 $api = new MetaTraderClient($server, $port, $login, $password);
	//Create Account
	$user = new User();
	$user->setGroup($type);
	$user->setName($name);
	$user->setEmail($email);
	$user->setAddress($address);
	$user->setCity("chd");
	$user->setState("ut");
	$user->setCountry($country);
	$user->setMainPassword($pass1);
	$user->setPhone($phone);
	$user->setPhonePassword($pass2);
	$user->setInvestorPassword($pass3);
	$user->setLeverage($lev);
	$user->setZipCode(160036);
	$result = $api->createUser($user);
	
		//echo'<pre>';
	$loginid = $result->getLogin();
	$mtname  = $result->getName();
	$mtgroup = $result->getGroup();
	$mtlev   = $result->getLeverage();
	$mtmpassword = $result->getMainPassword();
	$mtppass = $result->getPhonePassword();
	$mtinvetpass = $result->getInvestorPassword();
//print_r($result);
//echo'</pre>';
	
	//$txtmsg = "Your Trader Room Login details : Email" . $email." And Password". $trd_roompwd.". <br>Your MT5 Main Login ID:".$loginid." And Password: ".$mtmpassword.". <br>Your MT5 Phone Password: ".$mtppass."<br>Your MT5 Investor Password: ".$mtinvetpass."<br>. Your Account type:".$mtgroup.". <br>Your Leverage: ".$mtlev;
	 $nemail = "no-reply@tradebull.io";
	 $nname = "tradebull.io";
	 $headers  = 'MIME-Version: 1.0' . "\r\n";
	 $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
     $headers .= 'From: '.$nemail."\r\n".
    'Reply-To: '.$nemail."\r\n" .
    'X-Mailer: PHP/' . phpversion();
	
	$txtmsg = '<!DOCTYPE html>
<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" lang="en">
    <head><title></title><meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
    <style>
    *{box-sizing:border-box}
    body{margin:0;padding:0}
    a[x-apple-data-detectors]{color:inherit!important;text-decoration:inherit!important}
    #MessageViewBody a{color:inherit;text-decoration:none}
    p{line-height:inherit}
    @media (max-width:520px){
        .icons-inner{text-align:center
        }
        .icons-inner td{margin:0 auto}
        .row-content{width:100%!important}
        .stack .column{width:100%;display:block}
        }</style>
        </head>
    <body style="background-color:#fff;margin:0;padding:0;-webkit-text-size-adjust:none;text-size-adjust:none">
        <table class="nl-container" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="font-family: \'Open Sans\';mso-table-lspace:0;mso-table-rspace:0;background-color:#fff">
        <tbody>
            <tr>
                <td>
                    <table class="row row-1" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color: #2976f4;background-color:rgb(41,118,244);background: linear-gradient(45deg, rgba(41,118,244,1) 0%, rgba(31,91,206,1) 100%);">
                    <tbody>
                        <tr>
                            <td>
                                <table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;color:#000;width:1000px" width="500">
                                    <tbody>
                                        <tr>
                                            <td class="column" width="50%" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:top;padding-top:5px;padding-bottom:5px;border-top:0;border-right:0;border-bottom:0;border-left:0">
                                                <table class="image_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0">
                                                    <tr>
                                                        <td style="width:100%;padding-right:0;padding-left:0">
                                                            <div style="line-height:10px">
                                                                <img src="https://tradebull.io/examples/images/logo-design.png" style="padding:0% 5%;display:block;height:auto;border:0;width:200px;max-width:100%;" width="320">
                                                          
                                                        </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <!-- test -->
                                            <td class="column" width="50%" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:top;padding-top:5px;padding-bottom:5px;border-top:0;border-right:0;border-bottom:0;border-left:0">
                                                <table class="image_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0">
                                                    <tr>
                                                        <td style="width:100%;padding-right:0;padding-left:0">
                                                            <div style="line-height:10px; padding: 20px 0%;">
                                                                
                                                            
                                                            <ul style="position: relative;margin: 0;">
                                                                
                                                                <li style="float:right;list-style: none; padding-right:50px;"><a href="#" style="color: #f2f2f2;  text-decoration: none;  font-size: 18px;  font-weight: 400;  transition: all 0.3s ease;">CHAT</a></li> 	 	
                                                                <li style="float:right;list-style: none; padding-right:50px;"><a href="#" style="color: #f2f2f2;  text-decoration: none;  font-size: 18px;  font-weight: 400;  transition: all 0.3s ease;">SUPPORT</a></li>
                                                            </ul>
                                                        </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <!-- <td class="column" width="33.33%" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:top;padding-top:5px;padding-bottom:5px;border-top:0;border-right:0;border-bottom:0;border-left:0">
                                                <table class="image_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0">
                                                    <tr>
                                                        <td style="width:100%;padding-right:0;padding-left:0">
                                                            <div style="line-height:10px">
                                                                
                                                            
                                                            <ul style=" float: right;position: relative;">
                                                                
                                                               
                                                                <li style="float:left;list-style: none;margin-top:50px;transform: translateY(-100%); padding-right:50px;"><a href="#" style="color: #f2f2f2;  text-decoration: none;  font-size: 18px;  font-weight: 400;  transition: all 0.3s ease;">SUPPORT</a></li>
                                                            </ul>
                                                        </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td> -->
                                            <!-- test end -->
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="row row-2" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0">
                    <tbody>
                        <tr>
                            <td>
                                <table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;color:#000;width:1000px"
                                width="1000"><tbody>
                                    <tr>
                                    <td class="column" width="45%" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:top;border-top:0;border-right:0;border-bottom:0;border-left:0">
                                    <table class="heading_block" width="100%" border="0" cellpadding="0" cellspacing="0" 
    role="presentation" style="mso-table-lspace:0;mso-table-rspace:0">
    <tr>
        <td style="width:100%;text-align:center;padding-top:5px;padding-bottom:5px">
        <div style="text-align:left;padding: 5% 10%;">
        <h1>Welcome To Tradebull.</h1>
        <p style="width: 100%;padding: 0% 0%;">Thank you for signing up for a Tradebull Live/Demo Account. We are absolutely thrilled that you have chosen us to start your Forex journey. Download our app to make sure you never miss a market update.</p>
        <h2>MT5 Credentials</h2>
        <h3>Login ID:<span style="font-weight: 400;font-size: 16px;">'.$loginid.'</span></h3>
        <h3>Login Password:<span style="font-weight: 400;font-size: 16px;">'.$mtmpassword.'</span></h3>
        <br>
        <p><a href="Tradebull.io" class=""><span style="font-size: 16px;">Tradebull.io</span></a>  Trader Room credetials</p>
        <h3>Email ID:<span style="font-weight: 400;font-size: 16px;">'.$email.'</span></h3>
        <h3>Password:<span style="font-weight: 400;font-size: 16px;">'.$trd_roompwd.'</span></h3>
        <a href="https://tradebull.io/login.html"><button type="button" class="button1" style="  padding: 15px 45px;    margin-bottom: 25px;    margin-top: 40px;    background: #ef7f3c;    border: none;    border-radius: 50px;    color: white;    font-size: 17px;    font-weight: 500">Log in</button></a>
</div></td>
</tr></table></td>
<td class="column" width="55%" 
    style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:bottom;border-top:0;border-right:0;border-bottom:0;border-left:0">
    <table class="html_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0">
        <tr><td style="padding-top:5px;padding-bottom:5px">
            <div style="font-family: \'Open Sans\';text-align:center;padding: 0% 5%;" align="center">
        <div style="background-color: #2976f4; width: 100%; padding: 3% 10%; border-radius: 60px;color: white;margin-bottom: 10%;">
        <h1 style="font-size: 24px;">Not familiar with Forex trading?</h1>
        <p style="font-size: 16px;text-align: justify;">No worries! We have detailed courses from beginner to expert level trading. Learn everything you need to know and start earning from Day1 with our video courses. Visit www.tradebull.io for more details.</p>
</div>
</div></td></tr></table>
    </td></tr></tbody></table></td></tr></tbody></table><table class="row row-3" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0"><tbody><tr><td><table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;color:#000;width:1000px" width="1000"><tbody><tr><td class="column" width="55%" 
    style="mso-table-lspace:0;mso-table-srspace:0;font-weight:400;text-align:left;vertical-align:top;border-top:0;border-right:0;border-bottom:0;border-left:0"><table class="heading_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0"><tr><td style="width:100%;text-align:center;padding-top:5px;padding-bottom:5px">
        
        <div style="text-align: left;padding: 5% 10%;">
            <h2>MT5 phone Password</h2>
            <h3>Password:<span style="font-weight: 400;font-size: 16px;">'.$mtppass.'</span></h3>
            <br>
            <h2>MT5 Details</h2>
            <h3>Account type:<span style="font-weight: 400;font-size: 16px;">'.$mtppass.'</span></h3>
            <h3>Leverage:<span style="font-weight: 400;font-size: 16px;">'.$mtlev.'</span></h3>
            <a href="https://tradebull.io/login.html"><button type="button" class="button-key" style="  padding: 15px 45px;    margin-bottom: 25px;    margin-top: 40px;    background: #ef7f3c;    border: none;    border-radius: 50px;    color: white;    font-size: 17px;    font-weight: 500">Open Real Account</button></a>
        </div>
    </td></tr></table></td><td class="column" width="55%" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:top;border-top:0;border-right:0;border-bottom:0;border-left:0"><table 
    class="heading_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0"><tr><td style="width:100%;text-align:center;padding-top:5px;padding-bottom:5px">

    <div style="text-align: left;padding: 5% 10%;">
				<h2>MT5 investors password</h2>
				<h3>Investor Password:<span style="font-weight: 400;font-size: 16px;">'.$mtinvetpass.'</span></h3>
			</div>
    </td></tr>
    </table></td></tr></tbody></table></td></tr></tbody></table>
    <table class="row row-4" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0"><tbody><tr><td><table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;color:#000;width:500px" width="500"><tbody><tr><td class="column" width="100%" 
    style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:top;padding-top:5px;padding-bottom:5px;border-top:0;border-right:0;border-bottom:0;border-left:0"><table class="empty_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0"><tr><td><div></div></td></tr></table></td></tr></tbody></table></td></tr></tbody></table>
    <table class="row row-5" align="center" width="100%" border="0" 
    cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color: #2976f4;"><tbody><tr><td><table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;color:#000;width:500px" width="500"><tbody><tr><td class="column" width="100%" 
    style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:top;padding-top:5px;padding-bottom:5px;border-top:0;border-right:0;border-bottom:0;border-left:0"><table class="icons_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0"><tr><td style="color:#9d9d9d;font-family:inherit;font-size:15px;padding-bottom:5px;padding-top:5px;text-align:center"><table width="100%" cellpadding="0" 
    cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0"><tr><td style="text-align:center"><!--[if vml]><table align="left" cellpadding="0" cellspacing="0" role="presentation" style="display:inline-block;padding-left:0px;padding-right:0px;mso-table-lspace: 0pt;mso-table-rspace: 0pt;"><![endif]--><!--[if !vml]><!-->
        <table class="icons-inner" style="mso-table-lspace:0;mso-table-rspace:0;display:inline-block;margin-right:-4px;padding-left:0;padding-right:0" cellpadding="0" 
    cellspacing="0" role="presentation"><!--<![endif]--><tr><td style="text-align:center;padding-top:5px;padding-bottom:5px;padding-left:5px;padding-right:6px">
        <!--<a href="https://www.designedwithbee.com/"><img class="icon" alt="Designed with BEE" src="https://d15k2d11r6t6rl.cloudfront.net/public/users/Integrators/BeeProAgency/53601_510656/Signature/bee.png" height="32" width="34" align="center" style="display:block;height:auto;border:0"></a>--></td><td 
    style="font-family: \'Open Sans\';font-size:15px;color:#9d9d9d;vertical-align:middle;letter-spacing:undefined;text-align:center">
    <!--<a href="https://www.designedwithbee.com/" style="color:#9d9d9d;text-decoration:none;"> </a>--></td></tr></table></td></tr></table></td></tr></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><!-- End --></body></html>';
	
	$subject = "Login Credentials for Trader Room And MT5 Account";
	$headers .= "From: " . $nname . "<". $nemail .">\r\n";
	if(mail($email, $subject, $txtmsg, $headers)) {
		


	define('HOST', 'localhost'); // Database host name ex. localhost
	define('USER', 'mastetnr_tradebull'); // Database user. ex. root ( if your on local server)
	define('PASSWORD', 'TradeBull.Io@#2021'); // user password  (if password is not set for user then keep it empty )
	define('DATABASE', 'mastetnr_tradebullio'); // Database Database name

	function DB()
	{
		try {
			$db = new PDO('mysql:host='.HOST.';dbname='.DATABASE.'', USER, PASSWORD);
			return $db;
		} catch (PDOException $e) {
			return "Error!: " . $e->getMessage();
			die();
		}
	}
		$conn = DB(); 
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
		
     $sql = "INSERT INTO credentials (name,email,password,phone,loginid) VALUES ('$name','$email','$trd_roompwd','$phone','$loginid')";
	$conn->prepare($sql)->execute(); 
	} 
}
	?>