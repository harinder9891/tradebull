<?php
require_once __DIR__."/../vendor/autoload.php";

use Tarikh\PhpMeta\MetaTraderClient;
use Tarikh\PhpMeta\Entities\User;
use Tarikh\PhpMeta\src\Lib\MTEnDealAction;

include('../src/config/conn.php');


$api = new MetaTraderClient($server, $port, $login, $password);
//$user = $api->getUser($exampleLogin);

/**
 * User Function
 */
//Create Account
$user = new User();
$user->setGroup('real\real');
$user->setName("harry");
$user->setEmail("harry@gmail.com");
$user->setAddress("1234");
$user->setCity("chd");
$user->setState("ut");
$user->setCountry("india");
$user->setMainPassword("Main1002");
$user->setPhone("7657863249");
$user->setPhonePassword("phone1002");
$user->setInvestorPassword("Invest1002");
$user->setLeverage(100);
$user->setZipCode(160036);
$result = $api->createUser($user);
echo'<pre>';
echo $result->getEmail();
//print_r($result);
echo'</pre>';
die;
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

<form _ngcontent-lpw-c119="" novalidate="" class="ng-untouched ng-pristine ng-invalid">
    <div _ngcontent-lpw-c119="" class="row">
        <div _ngcontent-lpw-c119="" class="col-md-12">
            <div _ngcontent-lpw-c119="" class="form-group position-relative">
                <label _ngcontent-lpw-c119="" for="username" class="text-size-13 font-weight-400">Account Type <span _ngcontent-lpw-c119="" class="asterick">*</span></label><br _ngcontent-lpw-c119="" />
                <label _ngcontent-lpw-c119="" for="demo"><input _ngcontent-lpw-c119="" type="radio" value="0" name="account_type" id="demo" /> Demo</label>&nbsp;&nbsp;&nbsp;&nbsp;
                <label _ngcontent-lpw-c119="" for="live"><input _ngcontent-lpw-c119="" type="radio" value="1" name="account_type" id="live" checked="checked" /> Live</label>
            </div>
        </div>
        <div _ngcontent-lpw-c119="" class="col-md-6">
            <div _ngcontent-lpw-c119="" class="form-group position-relative">
                <label _ngcontent-lpw-c119="" for="username " class="text-size-13 font-weight-400">Account Plan <span _ngcontent-lpw-c119="" class="asterick">*</span></label>
                <select _ngcontent-lpw-c119="" name="accountPlan" required="" class="form-control ng-untouched ng-pristine ng-invalid">
                    <option _ngcontent-lpw-c119="" value="" disabled="true">Select Account Plan</option>
                    <option _ngcontent-lpw-c119="" value="1: 1001">Live</option>
                    <!---->
                </select>
            </div>
        </div>
        <div _ngcontent-lpw-c119="" class="col-md-6">
            <div _ngcontent-lpw-c119="" class="form-group position-relative">
                <label _ngcontent-lpw-c119="" for="username " class="text-size-13 font-weight-400">Select Leverage <span _ngcontent-lpw-c119="" class="asterick">*</span></label>
                <select _ngcontent-lpw-c119="" name="leverage" required="" class="form-control ng-untouched ng-pristine ng-invalid">
                    <option _ngcontent-lpw-c119="" value="" disabled="true">Select Leverage</option>
                    <!---->
                </select>
            </div>
        </div>
    </div>
    <div _ngcontent-lpw-c119="" class="row">
        <div _ngcontent-lpw-c119="" class="col-md-6">
            <div _ngcontent-lpw-c119="" class="form-group position-relative">
                <label _ngcontent-lpw-c119="" for="username" class="text-size-13 font-weight-400">First name <span _ngcontent-lpw-c119="" class="asterick">*</span></label>
                <input _ngcontent-lpw-c119="" type="text" name="name" id="usedId " placeholder="Enter your First name " required="" class="form-control text-size-13 main-txt-color bg-f bd-color ng-untouched ng-pristine ng-invalid" />
                <span _ngcontent-lpw-c119="" class="form-icon text-size-12"><i _ngcontent-lpw-c119="" class="fas fa-envelope"></i></span>
                <!---->
            </div>
        </div>
        <div _ngcontent-lpw-c119="" class="col-md-6">
            <div _ngcontent-lpw-c119="" class="form-group position-relative">
                <label _ngcontent-lpw-c119="" for="username" class="text-size-13 font-weight-400">Last name <span _ngcontent-lpw-c119="" class="asterick">*</span></label>
                <input
                    _ngcontent-lpw-c119=""
                    type="text"
                    name="lastname"
                    maxlength="20"
                    id="usedId "
                    placeholder="Enter your Last name "
                    required=""
                    class="form-control text-size-13 main-txt-color bg-f bd-color ng-untouched ng-pristine ng-invalid"
                />
                <span _ngcontent-lpw-c119="" class="form-icon text-size-12"><i _ngcontent-lpw-c119="" class="fas fa-envelope"></i></span>
                <!---->
            </div>
        </div>
    </div>
    <div _ngcontent-lpw-c119="" class="row">
        <div _ngcontent-lpw-c119="" class="col-md-12">
            <div _ngcontent-lpw-c119="" class="form-group position-relative">
                <label _ngcontent-lpw-c119="" for="email" class="text-size-13 font-weight-400">Email address <span _ngcontent-lpw-c119="" class="asterick">*</span></label>
                <input
                    _ngcontent-lpw-c119=""
                    type="text"
                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"
                    name="email"
                    id="usedId "
                    placeholder="Enter your Email address "
                    required=""
                    class="form-control text-size-13 main-txt-color bg-f bd-color ng-untouched ng-pristine ng-invalid"
                />
                <span _ngcontent-lpw-c119="" class="form-icon text-size-12"><i _ngcontent-lpw-c119="" class="fas fa-envelope"></i></span>
                <!---->
            </div>
        </div>
    </div>
    <div _ngcontent-lpw-c119="" class="row">
        <div _ngcontent-lpw-c119="" class="col-md-6">
            <div _ngcontent-lpw-c119="" class="form-group position-relative">
                <label _ngcontent-lpw-c119="" pattern="^-?(0|[1-9]\d*)?$" for="username" class="text-size-13 font-weight-400">Phone Number <span _ngcontent-lpw-c119="" class="asterick">*</span></label>
                <input _ngcontent-lpw-c119="" type=" text " name="phone" id="usedId " placeholder="Enter your phone number " required="" class="form-control text-size-13 main-txt-color bg-f bd-color ng-untouched ng-pristine ng-invalid" />
                <span _ngcontent-lpw-c119="" class="form-icon text-size-12"><i _ngcontent-lpw-c119="" class="fas fa-envelope"></i></span>
                <!----><!---->
            </div>
        </div>
        <div _ngcontent-lpw-c119="" class="col-md-6">
            <div _ngcontent-lpw-c119="" class="form-group position-relative">
                <label _ngcontent-lpw-c119="" for="password " class="text-size-13 font-weight-400">Country <span _ngcontent-lpw-c119="" class="asterick">*</span></label>
                <select _ngcontent-lpw-c119="" name="country" id="exampleFormControlSelect1" required="" class="form-control ng-untouched ng-pristine ng-invalid">
                    <option _ngcontent-lpw-c119="" value="" disabled="true" selected="">Select Your Country</option>
                    <option _ngcontent-lpw-c119="" value="1: Afghanistan">Afghanistan</option>
                    <option _ngcontent-lpw-c119="" value="2: Åland Islands">Åland Islands</option>
                    <option _ngcontent-lpw-c119="" value="3: Albania">Albania</option>
                    <option _ngcontent-lpw-c119="" value="4: Algeria">Algeria</option>
                    <option _ngcontent-lpw-c119="" value="5: American Samoa">American Samoa</option>
                    <option _ngcontent-lpw-c119="" value="6: Andorra">Andorra</option>
                    <option _ngcontent-lpw-c119="" value="7: Angola">Angola</option>
                    <option _ngcontent-lpw-c119="" value="8: Anguilla">Anguilla</option>
                    <option _ngcontent-lpw-c119="" value="9: Antarctica">Antarctica</option>
                    <option _ngcontent-lpw-c119="" value="10: Argentina">Argentina</option>
                    <option _ngcontent-lpw-c119="" value="11: Armenia">Armenia</option>
                    <option _ngcontent-lpw-c119="" value="12: Aruba">Aruba</option>
                    <option _ngcontent-lpw-c119="" value="13: Australia">Australia</option>
                    <option _ngcontent-lpw-c119="" value="14: Austria">Austria</option>
                    <option _ngcontent-lpw-c119="" value="15: Azerbaijan">Azerbaijan</option>
                    <option _ngcontent-lpw-c119="" value="16: Bahamas">Bahamas</option>
                    <option _ngcontent-lpw-c119="" value="17: Bahrain">Bahrain</option>
                    <option _ngcontent-lpw-c119="" value="18: Bangladesh">Bangladesh</option>
                    <option _ngcontent-lpw-c119="" value="19: Barbados">Barbados</option>
                    <option _ngcontent-lpw-c119="" value="20: Belarus">Belarus</option>
                    <option _ngcontent-lpw-c119="" value="21: Belgium">Belgium</option>
                    <option _ngcontent-lpw-c119="" value="22: Belize">Belize</option>
                    <option _ngcontent-lpw-c119="" value="23: Benin">Benin</option>
                    <option _ngcontent-lpw-c119="" value="24: Bermuda">Bermuda</option>
                    <option _ngcontent-lpw-c119="" value="25: Bhutan">Bhutan</option>
                    <option _ngcontent-lpw-c119="" value="26: Bolivia">Bolivia</option>
                    <option _ngcontent-lpw-c119="" value="27: Botswana">Botswana</option>
                    <option _ngcontent-lpw-c119="" value="28: Bouvet Island">Bouvet Island</option>
                    <option _ngcontent-lpw-c119="" value="29: Brazil">Brazil</option>
                    <option _ngcontent-lpw-c119="" value="30: Brunei Darussalam">Brunei Darussalam</option>
                    <option _ngcontent-lpw-c119="" value="31: Bulgaria">Bulgaria</option>
                    <option _ngcontent-lpw-c119="" value="32: Burkina Faso">Burkina Faso</option>
                    <option _ngcontent-lpw-c119="" value="33: Burundi">Burundi</option>
                    <option _ngcontent-lpw-c119="" value="34: Cambodia">Cambodia</option>
                    <option _ngcontent-lpw-c119="" value="35: Cameroon">Cameroon</option>
                    <option _ngcontent-lpw-c119="" value="36: Canada">Canada</option>
                    <option _ngcontent-lpw-c119="" value="37: Cape Verde">Cape Verde</option>
                    <option _ngcontent-lpw-c119="" value="38: Cayman Islands">Cayman Islands</option>
                    <option _ngcontent-lpw-c119="" value="39: Central African Republic">Central African Republic</option>
                    <option _ngcontent-lpw-c119="" value="40: Chad">Chad</option>
                    <option _ngcontent-lpw-c119="" value="41: Chile">Chile</option>
                    <option _ngcontent-lpw-c119="" value="42: China">China</option>
                    <option _ngcontent-lpw-c119="" value="43: Christmas Island">Christmas Island</option>
                    <option _ngcontent-lpw-c119="" value="44: Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                    <option _ngcontent-lpw-c119="" value="45: Colombia">Colombia</option>
                    <option _ngcontent-lpw-c119="" value="46: Comoros">Comoros</option>
                    <option _ngcontent-lpw-c119="" value="47: Congo">Congo</option>
                    <option _ngcontent-lpw-c119="" value="48: Congo">Congo</option>
                    <option _ngcontent-lpw-c119="" value="49: Cook Islands">Cook Islands</option>
                    <option _ngcontent-lpw-c119="" value="50: Costa Rica">Costa Rica</option>
                    <option _ngcontent-lpw-c119="" value="51: Cote">Cote</option>
                    <option _ngcontent-lpw-c119="" value="52: Croatia">Croatia</option>
                    <option _ngcontent-lpw-c119="" value="53: Cuba">Cuba</option>
                    <option _ngcontent-lpw-c119="" value="54: Cyprus">Cyprus</option>
                    <option _ngcontent-lpw-c119="" value="55: Czech Republic">Czech Republic</option>
                    <option _ngcontent-lpw-c119="" value="56: Denmark">Denmark</option>
                    <option _ngcontent-lpw-c119="" value="57: Djibouti">Djibouti</option>
                    <option _ngcontent-lpw-c119="" value="58: Dominica">Dominica</option>
                    <option _ngcontent-lpw-c119="" value="59: Dominican Republic">Dominican Republic</option>
                    <option _ngcontent-lpw-c119="" value="60: Ecuador">Ecuador</option>
                    <option _ngcontent-lpw-c119="" value="61: Egypt">Egypt</option>
                    <option _ngcontent-lpw-c119="" value="62: El Salvador">El Salvador</option>
                    <option _ngcontent-lpw-c119="" value="63: Equatorial Guinea">Equatorial Guinea</option>
                    <option _ngcontent-lpw-c119="" value="64: Eritrea">Eritrea</option>
                    <option _ngcontent-lpw-c119="" value="65: Estonia">Estonia</option>
                    <option _ngcontent-lpw-c119="" value="66: Ethiopia">Ethiopia</option>
                    <option _ngcontent-lpw-c119="" value="67: Falkland Islands">Falkland Islands</option>
                    <option _ngcontent-lpw-c119="" value="68: Faroe Islands">Faroe Islands</option>
                    <option _ngcontent-lpw-c119="" value="69: Fiji">Fiji</option>
                    <option _ngcontent-lpw-c119="" value="70: Finland">Finland</option>
                    <option _ngcontent-lpw-c119="" value="71: France">France</option>
                    <option _ngcontent-lpw-c119="" value="72: French Guiana">French Guiana</option>
                    <option _ngcontent-lpw-c119="" value="73: French Polynesia">French Polynesia</option>
                    <option _ngcontent-lpw-c119="" value="74: French Southern Territories">French Southern Territories</option>
                    <option _ngcontent-lpw-c119="" value="75: Gabon">Gabon</option>
                    <option _ngcontent-lpw-c119="" value="76: Gambia">Gambia</option>
                    <option _ngcontent-lpw-c119="" value="77: Georgia">Georgia</option>
                    <option _ngcontent-lpw-c119="" value="78: Germany">Germany</option>
                    <option _ngcontent-lpw-c119="" value="79: Ghana">Ghana</option>
                    <option _ngcontent-lpw-c119="" value="80: Gibraltar">Gibraltar</option>
                    <option _ngcontent-lpw-c119="" value="81: Greece">Greece</option>
                    <option _ngcontent-lpw-c119="" value="82: Greenland">Greenland</option>
                    <option _ngcontent-lpw-c119="" value="83: Grenada">Grenada</option>
                    <option _ngcontent-lpw-c119="" value="84: Guadeloupe">Guadeloupe</option>
                    <option _ngcontent-lpw-c119="" value="85: Guam">Guam</option>
                    <option _ngcontent-lpw-c119="" value="86: Guatemala">Guatemala</option>
                    <option _ngcontent-lpw-c119="" value="87: Guernsey">Guernsey</option>
                    <option _ngcontent-lpw-c119="" value="88: Guinea">Guinea</option>
                    <option _ngcontent-lpw-c119="" value="89: Guinea-bissau">Guinea-bissau</option>
                    <option _ngcontent-lpw-c119="" value="90: Guyana">Guyana</option>
                    <option _ngcontent-lpw-c119="" value="91: Haiti">Haiti</option>
                    <option _ngcontent-lpw-c119="" value="92: Heard Island">Heard Island</option>
                    <option _ngcontent-lpw-c119="" value="93: Holy See">Holy See</option>
                    <option _ngcontent-lpw-c119="" value="94: Honduras">Honduras</option>
                    <option _ngcontent-lpw-c119="" value="95: Hong Kong">Hong Kong</option>
                    <option _ngcontent-lpw-c119="" value="96: Hungary">Hungary</option>
                    <option _ngcontent-lpw-c119="" value="97: Iceland">Iceland</option>
                    <option _ngcontent-lpw-c119="" value="98: India">India</option>
                    <option _ngcontent-lpw-c119="" value="99: Indonesia">Indonesia</option>
                    <option _ngcontent-lpw-c119="" value="100: Iran">Iran</option>
                    <option _ngcontent-lpw-c119="" value="101: Iraq">Iraq</option>
                    <option _ngcontent-lpw-c119="" value="102: Ireland">Ireland</option>
                    <option _ngcontent-lpw-c119="" value="103: Isle of Man">Isle of Man</option>
                    <option _ngcontent-lpw-c119="" value="104: Israel">Israel</option>
                    <option _ngcontent-lpw-c119="" value="105: Italy">Italy</option>
                    <option _ngcontent-lpw-c119="" value="106: Jamaica">Jamaica</option>
                    <option _ngcontent-lpw-c119="" value="107: Japan">Japan</option>
                    <option _ngcontent-lpw-c119="" value="108: Jersey">Jersey</option>
                    <option _ngcontent-lpw-c119="" value="109: Jordan">Jordan</option>
                    <option _ngcontent-lpw-c119="" value="110: Kazakhstan">Kazakhstan</option>
                    <option _ngcontent-lpw-c119="" value="111: Kenya">Kenya</option>
                    <option _ngcontent-lpw-c119="" value="112: Kiribati">Kiribati</option>
                    <option _ngcontent-lpw-c119="" value="113: Korea">Korea</option>
                    <option _ngcontent-lpw-c119="" value="114: Korea">Korea</option>
                    <option _ngcontent-lpw-c119="" value="115: Kuwait">Kuwait</option>
                    <option _ngcontent-lpw-c119="" value="116: Kyrgyzstan">Kyrgyzstan</option>
                    <option _ngcontent-lpw-c119="" value="117: Latvia">Latvia</option>
                    <option _ngcontent-lpw-c119="" value="118: Lebanon">Lebanon</option>
                    <option _ngcontent-lpw-c119="" value="119: Lesotho">Lesotho</option>
                    <option _ngcontent-lpw-c119="" value="120: Liberia">Liberia</option>
                    <option _ngcontent-lpw-c119="" value="121: Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                    <option _ngcontent-lpw-c119="" value="122: Liechtenstein">Liechtenstein</option>
                    <option _ngcontent-lpw-c119="" value="123: Lithuania">Lithuania</option>
                    <option _ngcontent-lpw-c119="" value="124: Luxembourg">Luxembourg</option>
                    <option _ngcontent-lpw-c119="" value="125: Macao">Macao</option>
                    <option _ngcontent-lpw-c119="" value="126: Macedonia">Macedonia</option>
                    <option _ngcontent-lpw-c119="" value="127: Madagascar">Madagascar</option>
                    <option _ngcontent-lpw-c119="" value="128: Malawi">Malawi</option>
                    <option _ngcontent-lpw-c119="" value="129: Malaysia">Malaysia</option>
                    <option _ngcontent-lpw-c119="" value="130: Maldives">Maldives</option>
                    <option _ngcontent-lpw-c119="" value="131: Mali">Mali</option>
                    <option _ngcontent-lpw-c119="" value="132: Malta">Malta</option>
                    <option _ngcontent-lpw-c119="" value="133: Marshall Islands">Marshall Islands</option>
                    <option _ngcontent-lpw-c119="" value="134: Martinique">Martinique</option>
                    <option _ngcontent-lpw-c119="" value="135: Mauritania">Mauritania</option>
                    <option _ngcontent-lpw-c119="" value="136: Mauritius">Mauritius</option>
                    <option _ngcontent-lpw-c119="" value="137: Mayotte">Mayotte</option>
                    <option _ngcontent-lpw-c119="" value="138: Mexico">Mexico</option>
                    <option _ngcontent-lpw-c119="" value="139: Micronesia">Micronesia</option>
                    <option _ngcontent-lpw-c119="" value="140: Moldova">Moldova</option>
                    <option _ngcontent-lpw-c119="" value="141: Monaco">Monaco</option>
                    <option _ngcontent-lpw-c119="" value="142: Mongolia">Mongolia</option>
                    <option _ngcontent-lpw-c119="" value="143: Montenegro">Montenegro</option>
                    <option _ngcontent-lpw-c119="" value="144: Montserrat">Montserrat</option>
                    <option _ngcontent-lpw-c119="" value="145: Morocco">Morocco</option>
                    <option _ngcontent-lpw-c119="" value="146: Mozambique">Mozambique</option>
                    <option _ngcontent-lpw-c119="" value="147: Myanmar">Myanmar</option>
                    <option _ngcontent-lpw-c119="" value="148: Namibia">Namibia</option>
                    <option _ngcontent-lpw-c119="" value="149: Nauru">Nauru</option>
                    <option _ngcontent-lpw-c119="" value="150: Nepal">Nepal</option>
                    <option _ngcontent-lpw-c119="" value="151: Netherlands">Netherlands</option>
                    <option _ngcontent-lpw-c119="" value="152: Netherlands Antilles">Netherlands Antilles</option>
                    <option _ngcontent-lpw-c119="" value="153: New Caledonia">New Caledonia</option>
                    <option _ngcontent-lpw-c119="" value="154: New Zealand">New Zealand</option>
                    <option _ngcontent-lpw-c119="" value="155: Nicaragua">Nicaragua</option>
                    <option _ngcontent-lpw-c119="" value="156: Niger">Niger</option>
                    <option _ngcontent-lpw-c119="" value="157: Nigeria">Nigeria</option>
                    <option _ngcontent-lpw-c119="" value="158: Niue">Niue</option>
                    <option _ngcontent-lpw-c119="" value="159: Norfolk Island">Norfolk Island</option>
                    <option _ngcontent-lpw-c119="" value="160: Northern Mariana Islands">Northern Mariana Islands</option>
                    <option _ngcontent-lpw-c119="" value="161: Norway">Norway</option>
                    <option _ngcontent-lpw-c119="" value="162: Oman">Oman</option>
                    <option _ngcontent-lpw-c119="" value="163: Pakistan">Pakistan</option>
                    <option _ngcontent-lpw-c119="" value="164: Palau">Palau</option>
                    <option _ngcontent-lpw-c119="" value="165: Palestinian">Palestinian</option>
                    <option _ngcontent-lpw-c119="" value="166: Panama">Panama</option>
                    <option _ngcontent-lpw-c119="" value="167: Papua New Guinea">Papua New Guinea</option>
                    <option _ngcontent-lpw-c119="" value="168: Paraguay">Paraguay</option>
                    <option _ngcontent-lpw-c119="" value="169: Peru">Peru</option>
                    <option _ngcontent-lpw-c119="" value="170: Philippines">Philippines</option>
                    <option _ngcontent-lpw-c119="" value="171: Pitcairn">Pitcairn</option>
                    <option _ngcontent-lpw-c119="" value="172: Poland">Poland</option>
                    <option _ngcontent-lpw-c119="" value="173: Portugal">Portugal</option>
                    <option _ngcontent-lpw-c119="" value="174: Puerto Rico">Puerto Rico</option>
                    <option _ngcontent-lpw-c119="" value="175: Qatar">Qatar</option>
                    <option _ngcontent-lpw-c119="" value="176: Reunion">Reunion</option>
                    <option _ngcontent-lpw-c119="" value="177: Romania">Romania</option>
                    <option _ngcontent-lpw-c119="" value="178: Russian Federation">Russian Federation</option>
                    <option _ngcontent-lpw-c119="" value="179: Rwanda">Rwanda</option>
                    <option _ngcontent-lpw-c119="" value="180: Saint Helena">Saint Helena</option>
                    <option _ngcontent-lpw-c119="" value="181: Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                    <option _ngcontent-lpw-c119="" value="182: Saint Lucia">Saint Lucia</option>
                    <option _ngcontent-lpw-c119="" value="183: Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                    <option _ngcontent-lpw-c119="" value="184: Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                    <option _ngcontent-lpw-c119="" value="185: Samoa">Samoa</option>
                    <option _ngcontent-lpw-c119="" value="186: San Marino">San Marino</option>
                    <option _ngcontent-lpw-c119="" value="187: Sao Tome and Principe">Sao Tome and Principe</option>
                    <option _ngcontent-lpw-c119="" value="188: Saudi Arabia">Saudi Arabia</option>
                    <option _ngcontent-lpw-c119="" value="189: Senegal">Senegal</option>
                    <option _ngcontent-lpw-c119="" value="190: Serbia">Serbia</option>
                    <option _ngcontent-lpw-c119="" value="191: Seychelles">Seychelles</option>
                    <option _ngcontent-lpw-c119="" value="192: Sierra Leone">Sierra Leone</option>
                    <option _ngcontent-lpw-c119="" value="193: Singapore">Singapore</option>
                    <option _ngcontent-lpw-c119="" value="194: Slovakia">Slovakia</option>
                    <option _ngcontent-lpw-c119="" value="195: Slovenia">Slovenia</option>
                    <option _ngcontent-lpw-c119="" value="196: Solomon Islands">Solomon Islands</option>
                    <option _ngcontent-lpw-c119="" value="197: Somalia">Somalia</option>
                    <option _ngcontent-lpw-c119="" value="198: South Africa">South Africa</option>
                    <option _ngcontent-lpw-c119="" value="199: South Georgia">South Georgia</option>
                    <option _ngcontent-lpw-c119="" value="200: Spain">Spain</option>
                    <option _ngcontent-lpw-c119="" value="201: Sri Lanka">Sri Lanka</option>
                    <option _ngcontent-lpw-c119="" value="202: Sudan">Sudan</option>
                    <option _ngcontent-lpw-c119="" value="203: Suriname">Suriname</option>
                    <option _ngcontent-lpw-c119="" value="204: Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                    <option _ngcontent-lpw-c119="" value="205: Swaziland">Swaziland</option>
                    <option _ngcontent-lpw-c119="" value="206: Sweden">Sweden</option>
                    <option _ngcontent-lpw-c119="" value="207: Switzerland">Switzerland</option>
                    <option _ngcontent-lpw-c119="" value="208: Syrian Arab Republic">Syrian Arab Republic</option>
                    <option _ngcontent-lpw-c119="" value="209: Taiwan">Taiwan</option>
                    <option _ngcontent-lpw-c119="" value="210: Tajikistan">Tajikistan</option>
                    <option _ngcontent-lpw-c119="" value="211: Tanzania">Tanzania</option>
                    <option _ngcontent-lpw-c119="" value="212: Thailand">Thailand</option>
                    <option _ngcontent-lpw-c119="" value="213: Timor-leste">Timor-leste</option>
                    <option _ngcontent-lpw-c119="" value="214: Togo">Togo</option>
                    <option _ngcontent-lpw-c119="" value="215: Tokelau">Tokelau</option>
                    <option _ngcontent-lpw-c119="" value="216: Tonga">Tonga</option>
                    <option _ngcontent-lpw-c119="" value="217: Trinidad">Trinidad</option>
                    <option _ngcontent-lpw-c119="" value="218: Tunisia">Tunisia</option>
                    <option _ngcontent-lpw-c119="" value="219: Turkey">Turkey</option>
                    <option _ngcontent-lpw-c119="" value="220: Turkmenistan">Turkmenistan</option>
                    <option _ngcontent-lpw-c119="" value="221: Tuvalu">Tuvalu</option>
                    <option _ngcontent-lpw-c119="" value="222: Uganda">Uganda</option>
                    <option _ngcontent-lpw-c119="" value="223: Ukraine">Ukraine</option>
                    <option _ngcontent-lpw-c119="" value="224: United Arab Emirates">United Arab Emirates</option>
                    <option _ngcontent-lpw-c119="" value="225: United Kingdom">United Kingdom</option>
                    <option _ngcontent-lpw-c119="" value="226: United States">United States</option>
                    <option _ngcontent-lpw-c119="" value="227: Uruguay">Uruguay</option>
                    <option _ngcontent-lpw-c119="" value="228: Uzbekistan">Uzbekistan</option>
                    <option _ngcontent-lpw-c119="" value="229: Vanuatu">Vanuatu</option>
                    <option _ngcontent-lpw-c119="" value="230: Venezuela">Venezuela</option>
                    <option _ngcontent-lpw-c119="" value="231: Viet Nam">Viet Nam</option>
                    <option _ngcontent-lpw-c119="" value="232: Virgin Islands">Virgin Islands</option>
                    <option _ngcontent-lpw-c119="" value="233: Virgin Islands">Virgin Islands</option>
                    <option _ngcontent-lpw-c119="" value="234: Wallis and Futuna">Wallis and Futuna</option>
                    <option _ngcontent-lpw-c119="" value="235: Western Sahara">Western Sahara</option>
                    <option _ngcontent-lpw-c119="" value="236: Yemen">Yemen</option>
                    <option _ngcontent-lpw-c119="" value="237: Zambia">Zambia</option>
                    <option _ngcontent-lpw-c119="" value="238: Zimbabwe">Zimbabwe</option>
                    <!---->
                </select>
            </div>
        </div>
        <div _ngcontent-lpw-c119="" class="col-md-12">
            <div _ngcontent-lpw-c119="" class="form-group position-relative">
                <label _ngcontent-lpw-c119="" for="password" class="text-size-13 font-weight-400">Address <span _ngcontent-lpw-c119="" class="asterick">*</span></label>
                <textarea _ngcontent-lpw-c119="" name="address" required="" class="form-control ng-untouched ng-pristine ng-invalid" style="height: 80px; width: 100%;"></textarea>
            </div>
        </div>
        <div _ngcontent-lpw-c119="" class="col-md-12">
            <div _ngcontent-lpw-c119="" class="form-group position-relative">
                <label _ngcontent-lpw-c119="" for="password" class="text-size-13 font-weight-400">Refer Code <span _ngcontent-lpw-c119="" style="color: green;">(If Any)</span></label>
                <input _ngcontent-lpw-c119="" type="text" name="ReferCode" class="form-control ng-untouched ng-pristine ng-valid" />
            </div>
        </div>
    </div>
    <div _ngcontent-lpw-c119="" class="form-group position-relative">
        <label _ngcontent-lpw-c119="" for="password" class="text-size-13 font-weight-400">Bonus Card <span _ngcontent-lpw-c119="" style="color: green;">(If Any)</span></label>
        <input _ngcontent-lpw-c119="" type="text" name="bonusCard " id="password " placeholder="Enter Bonus Card " class="form-control text-size-13 main-txt-color bg-f bd-color ng-untouched ng-pristine ng-valid" />
        <span _ngcontent-lpw-c119="" class="form-icon text-size-12"><i _ngcontent-lpw-c119="" class="fas fa-lock"></i></span>
    </div>
    <div _ngcontent-lpw-c119="" class="terms-section mb-3">
        <div _ngcontent-lpw-c119="" class="form-check text-size-13 mb-1 clearfix">
            <input _ngcontent-lpw-c119="" type="checkbox" name="terms " id="exampleCheck1 " required="" class="form-check-input ng-untouched ng-pristine ng-invalid" />
            <label _ngcontent-lpw-c119="" for="exampleCheck1 " class="form-check-label">
                I accept the <a _ngcontent-lpw-c119="" href=" ">Terms &amp; Conditions </a> , <a _ngcontent-lpw-c119="" href=" ">Privacy Policy </a> , <a _ngcontent-lpw-c119="" href=" "> Product Statement And Execution Risks</a>
            </label>
            <!---->
        </div>
    </div>
    <div _ngcontent-lpw-c119="" class="submit-btn mb-2">
        <button _ngcontent-lpw-c119="" type="submit" value="Create Account" class="btn btn-primary btn-block text-size-14 position-relative" disabled=""><span _ngcontent-lpw-c119=""></span>Create Account</button>
    </div>
</form>
