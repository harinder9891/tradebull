<?php
require_once __DIR__."/../vendor/autoload.php";
use Tarikh\PhpMeta\MetaTraderClient;
use Tarikh\PhpMeta\Entities\User;
use Tarikh\PhpMeta\src\Lib\MTEnDealAction;


if(isset($_POST['submit'])){
die('i am here');
include('../src/config/conn.php');

$api = new MetaTraderClient($server, $port, $login, $password);
// Get Client ID by login
// $login = [];
// $request = $api->getUserLogins('demoforex', $login);

// Get User Information
// $user = $api->getUser($exampleLogin);
// var_dump($user);
}

//$user = $api->getUser($exampleLogin);

/**
 * User Function
 */
//Create Account
// $user = new User();
// $user->setGroup('real\real');
// $user->setName("harry");
// $user->setEmail("harry@gmail.com");
// $user->setAddress("1234");
// $user->setCity("chd");
// $user->setState("ut");
// $user->setCountry("india");
// $user->setMainPassword("Main1002");
// $user->setPhone("7657863249");
// $user->setPhonePassword("phone1002");
// $user->setInvestorPassword("Invest1002");
// $user->setLeverage(100);
// $user->setZipCode(160036);
// $result = $api->createUser($user);
// echo'<pre>';
// echo $result->getEmail();
// //print_r($result);
// echo'</pre>';
// die;
// Get Client ID by login
// $login = [];
// $request = $api->getUserLogins('demoforex', $login);

// Get User Information
// $user = $api->getUser($exampleLogin);
// var_dump($user);

// Update User Information
// $user = $client->getUser(21001480007);
// $user->Name = "Name Changed";
// $newUser = $client->updateUser($user);


// Delete User
// $user = $api->deleteUser(2024); 

// Change User Password
// $type = "MAIN"; // Change $type to INVESTOR if you want to change investor password
// $api->changePasswordUser($exampleLogin, 'SecurePassword', $type);

/**
 * ORDER FUNCTION
 */

// Get Order Detail
// $order = $api->getOrder($ticket = 100);
// var_dump($order);


// Get Open Order Total and pagination
// $total = $api->getOrderTotal($exampleLogin);
// $trades = $api->getOrderPagination($login, $offset, $total);
// var_dump($total);


// Get Closed Order Details by ticket
// $order = $api->getOrderHistory(4914208);
// var_dump($order);

// Get Closed Order Total and pagination
// $total = $api->getOrderHistoryTotal($exampleLogin, $timestampfrom, $timestampto);
// $trades = $api->getOrderHistoryPagination($exampleLogin, $timestampfrom, $timestampto, 0, $total);
// foreach ($trades as $trade) {
//     // see class MTOrder
//     echo "LOGIN : ".$trade->Login.PHP_EOL;
//     echo "TICKET : ".$trade->Order.PHP_EOL;
// }

// Get Open Position
// $total = $api->getPositionTotal($exampleLogin);
// $positions = $api->getPositionPaginate($exampleLogin, 0, $total);
// foreach ($positions as $p) {
//     echo "SYMBOL : ".$p->Symbol.PHP_EOL;
//     echo "LOGIN : ".$p->Login.PHP_EOL;
// }

// Get Deal By Ticket
// $deal = $api->dealGet(1402053);

// Get Deal Paginate
// $total = $api->dealGetTotal($exampleLogin, $timestampfrom, $timestampto);
// $deals = $api->dealGetPaginate($exampleLogin, $timestampfrom, $timestampto, 0, $total);
// var_dump($deals);


/**
 * BALANCE OPERATION
 */
// Conduct User Balance (CREDIT, DEBIT, DEPOSIT, WITHDRAWAL) see MTEnDealAction
// $ticket = $api->conductUserBalance(2024 , MTEnDealAction::DEAL_BALANCE, 100, 'your comment here');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form _ngcontent-rfn-c120="" novalidate="" class="ng-dirty ng-touched ng-valid" method="post" action="">
    <div _ngcontent-rfn-c120="" class="form-group position-relative">
        <label _ngcontent-rfn-c120="" for="username" class="text-size-13 font-weight-400">Email address</label>
        <input _ngcontent-rfn-c120="" autocomplete="off" ngmodel="" required="" email="" name="useremail" type="email" id="usedId " placeholder="Enter your email address" class="form-control text-size-13 main-txt-color bg-f bd-color ng-dirty ng-valid ng-touched">
        <span _ngcontent-rfn-c120="" class="form-icon text-size-12"><i _ngcontent-rfn-c120="" class="fas fa-envelope"></i></span>
        <!----></div>
        <div _ngcontent-rfn-c120="" class="form-group position-relative">
            <label _ngcontent-rfn-c120="" for="password " class="text-size-13 font-weight-400">Password</label>
            <input _ngcontent-rfn-c120="" autocomplete="off" ngmodel="" required="" name="userpassword" type="password" id="password " placeholder="Enter your password" class="form-control text-size-13 main-txt-color bg-f bd-color ng-dirty ng-valid ng-touched">
            <span _ngcontent-rfn-c120="" class="form-icon text-size-12"><i _ngcontent-rfn-c120="" class="fas fa-lock"></i></span><!---->
        </div>
            <div _ngcontent-rfn-c120="" class="forgot-password mb-3 text-size-13 clearfix">
                <a _ngcontent-rfn-c120="" class="float-right" href="#/auth/forget-password">Forgot Password ?</a>
            </div>
            <div _ngcontent-rfn-c120="" class="submit-btn mb-2">
                <button _ngcontent-rfn-c120="" type="submit" value="Sign In" name="submit" type="submit">
                    <span _ngcontent-rfn-c120=""></span>Sign In</button>
                </div>
                </form>
                <a href="change_password.php"><p>change password</p></a>

</body>
</html>