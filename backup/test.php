<!DOCTYPE html>
<html class="overf">

<head>


    <meta charset="utf-8">
    <title>TradeBull</title>

    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="keywords" content="">



    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!--Favicon-->
    <link rel="icon" type="image/png" href="assets/img/root/favicon.png">
    <!--Framework-->
    <link rel="stylesheet" href="assets/css/framework/bootstrap.min.css">
    <!--Fonts-->
    <link rel="stylesheet" href="assets/fonts/Inter/style.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <!--Plugins-->
    <link rel="stylesheet" href="assets/css/vlt-plugins.min.css">
    <!--Style-->
    <link rel="stylesheet" href="assets/css/vlt-main.min.css">
    <!--Custom-->
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/fontawesome.min.css">
    
    <style>
    
        [type=radio] { 
        position: absolute;
        opacity: 0;
        width: 0;
        height: 0;
        }

        [type=radio] + img {
        cursor: pointer;
        }

        [type=radio]:checked + img {
        outline: 2px solid #f00;
        }

    </style>

</head>

<body class="overf">


    <!--Main-->
    <main>
        <Section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 d-none d-lg-block">
                        <div class="container" id="container" style="display:none">
                            <div class="overlay-container">
                                <div class="overlay">
                                    <div class="overlay-panel overlay-left">
                                        <h1>Welcome Back!</h1>
                                        <p>To keep connected with us please login with your personal info</p>
                                        <button class="ghost" id="signIn">Sign In</button>
                                    </div>
                                    <div class="overlay-panel overlay-right">
                                        <img class="black" src="assets/img/root/logo-white.png" alt="img">
                                        <h1>TRADE WITH TRUST <br>TRADE WITH US.</h1>
                                        <p>Forex, CFDs on Shares, Futures, Indices, Metals & Energies</p>


                                        <a href="#">Forgot your password?</a>
                                        <button class="ghost" id="signUp">Sign Up</button>
                                    </div>
                                </div>
                            </div>






                            <div class="form-container sign-in-container">
                                <form action="#">
                                    <h1>Login</h1>
                                    <p>Welcome back! Please sign in to continue.</p>
                                    <div class="social-container">
                                        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                                        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                    <span>or use your account</span>
                                    <input type="email" placeholder="Email" />
                                    <input type="password" placeholder="Password" />
                                    <div class="form-group m-2 required">
                                        <label for="name">Name*</label>
                                        <input type="text" class="form-control" id="name" name="name" required="">
                                        <span class="error"></span>
                                    </div>
                                    <div class="form-group m-2 required">
                                        <label for="email">Email*</label>
                                        <input type="email" class="form-control" id="email" name="email" required="">
                                        <span class="error"></span>
                                    </div>

                                    <a href="#">Forgot your password?</a>
                                    <button>Sign In</button>
                                </form>
                            </div>
                            <div class="form-container sign-up-container">
                                <form action="#">
                                    <h1>Cre6ate Account</h1>
                                    <div class="social-container">
                                        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                                        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                    <span>or use your email for registration</span>
                                    <input type="text" placeholder="Name" />
                                    <input type="email" placeholder="Email" />
                                    <input type="password" placeholder="Password" />
                                    <button>Sign Up</button>
                                </form>
                            </div>
                        </div>




                        <div class="login-process">
                            <div class="login-left">
                                <div class="login-left-dark">
                                    <img class="black" src="assets/img/root/logo-white.png" alt="img">
                                    <h1>TRADE WITH TRUST <br>TRADE WITH US.</h1>
                                    <p>Forex, CFDs on Shares, Futures, Indices, Metals & Energies</p>
                                    <div class="login-button">
                                        <a href="#">Forgot your password?</a>
                                        <button class="blue-bttn" id="signUp">Sign Up</button>
                                    </div>
                                </div>
                                <div class="login-left-light">
                                    <form action="#">
                                        <h2>Login</h2>
                                        <p>Welcome back! Please sign in to continue.</p>


                                        <div class="form-group">
                                            <label for="name">Name*</label>
                                            <input type="text" class="form-control" id="login_left_name" name="login_left_name" required="">
                                            <span class="error"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email*</label>
                                            <input type="email" class="form-control" id="login_left_email" name="login_left_email" required="">
                                            <span class="error"></span>
                                        </div>

                                        <a href="#">Forgot your password?</a>
                                        <button>Login</button>
                                    </form>
                                </div>


                            </div>
                            <div class="login-right">
                                <div class="login-right-left">
                                    <!-- MultiStep Form -->
                                    <div class="form__container">
                                        <div class="body__container">
                                            <div class="left__container">
                                                <div class="progress__bar__container">
                                                    <ul>
                                                        <li class="active" id="icon1">
                                                            <ion-icon name="person-outline"></ion-icon>

                                                        </li>
                                                        <li id="icon2">
                                                            <ion-icon name="book-outline"></ion-icon>
                                                        </li>
                                                        <li id="icon3">
                                                            <ion-icon name="layers-outline"></ion-icon>
                                                        </li>
                                                        <li id="icon4">
                                                            <ion-icon name="pricetag-outline"></ion-icon>
                                                        </li>
                                                        <li id="icon5">
                                                            <ion-icon name="mail-outline"></ion-icon>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="side__titles">
                                                    <div class="title__name">
                                                        <h3>Personal Info</h3>
                                                    </div>
                                                    <div class="title__name">
                                                        <h3>Account Info</h3>
                                                    </div>
                                                    <div class="title__name">
                                                        <h3>Verification</h3>
                                                    </div>
                                                    <div class="title__name">
                                                        <h3>Deposit Funds</h3>
                                                    </div>
                                                    <div class="title__name">
                                                        <h3>Start trading</h3>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="right__container">
                                                <fieldset id="form1">
                                                    <div class="sub__title__container ">
                                                        <h2>Personal information</h2>
                                                    </div>
                                                    <div class="input__container">
                                                        <div class="row">
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="name">first Name*</label>
                                                                    <input type="text" class="form-control field" id="fname" name="fname" placeholder="Enter your first name" required="">
                                                                    <span id="error_fname" class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="name">last Name*</label>
                                                                    <input type="text" class="form-control field" id="lname" name="lname" placeholder="Enter your last name" required="">
                                                                    <span id="error_lname" class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-12">
                                                                <div class="form-group">
                                                                    <label for="name">email*</label>
                                                                    <input type="text" class="form-control field" id="pi_email" name="pi_email" placeholder="Enter your email address" required="">
                                                                    <span id="error_email" class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="name">phone number*</label>
                                                                    <input type="text" class="form-control field" id="phone" name="phone" placeholder="Enter your phone number" required="">
                                                                    <span id="error_phone" class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="name">country</label>
                                                                    <select name="country" id="country" class="field">
                                                                        <option selected>Select your country </option>
                                                                        <option value="india"> India </option>
                                                                        <option value="USA"> USA</option>
                                                                        <option value="Australia"> Australia</option>
                                                                    </select>
                                                                    <span id="error_country" class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-12">
                                                                <div class="form-group">
                                                                    <label for="name">address *</label>
                                                                    <input type="text" class="form-control field" id="address" name="address" placeholder="Enter your address" required="">
                                                                    <span id="error_address" class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>

														<a class="nxt__btn " id="stop" onclick="nextForm()"> Next</a>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="active__form" id="form2">
                                                    <div class="sub__title__container">
                                                        <h2>Account Information</h2>
                                                    </div>
                                                    <div class="input__container">
                                                        <div class="row">
                                                            <div class="col-md-12 col-12">
                                                                <div class="form-group">
                                                                    <label for="name">Account Type</label>
                                                                    <span><input type="radio" name="select" id="demo" checked> Demo</span>
                                                                    <span><input type="radio" name="select" id="live"> Live</span>
                                                                    <span id="select"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="name">Annual Plan</label>
                                                                    <input type="text" class="form-control" id="ann_plan" name="ann_plan" placeholder="Select Annual Plan" required="">
                                                                    <span id="error_ann_plan" class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="name">Select Leverage</label>
                                                                    <select name="leverage" id="leverage">
                                                                        <option selected>Select Leverage</option>
                                                                        <option value="100"> 100 </option>
                                                                        <option value="200"> 200</option>
                                                                        <option value="300"> 300</option>
																		<option value="400"> 400</option>
																		<option value="500"> 500</option>
                                                                    </select>
                                                                    <span id="error_leverage" class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-12">
                                                                <div class="form-group">
                                                                    <label for="name">Refer Code (if Any)</label>
                                                                    <input type="text" class="form-control" id="refercode" name="refercode" placeholder="Enter your refer code" required="">
                                                                    <span class="error"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-12">
                                                                <div class="form-group">
                                                                    <label for="name">Bonus Code (if Any)</label>
                                                                    <input type="text" class="form-control" id="bonuscode" name="bonusocode" placeholder="Enter your bonus code" required="">
                                                                    <span class="error"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="buttons"> <a class="prev__btn" onclick="prevForm();">Back</a> <a class="nxt__btn" onclick="nextForm1()">Next</a> </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="active__form" id="form3">
                                                    <div class="sub__title__container">
                                                        <h2>Verification</h2>
                                                    </div>
                                                    <div class="input__container">
                                                        <div class="row">
                                                            <div class="col-md-12 col-12">
                                                                <div class="verification">
                                                                    <img src="assets/img/verify.png" />
                                                                    <h3>Verification Your Email Address</h3>
                                                                    <p>You've entered example@email.com as the email address for your account. please verify this email address by clicking button below.</p>
                                                                    <div class="otp-box">
                                                                        <div class="d-flex flex-row ">
                                                                            <input type="text" class="form-control" autofocus="">
                                                                            <input type="text" class="form-control">
                                                                            <input type="text" class="form-control">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="buttons"> <a class="prev__btn" onclick="prevForm();">Back</a> <a class="nxt__btn" onclick="nextForm();">Verify OTP</a> </div>
                                                        <div class="text-right"><span class="mobile-text">Didn't receive the OTP? </span><span class="font-weight-bold cursor">Resend OTP</span></div>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="active__form" id="form4">
                                                    <div class="sub__title__container">
                                                        <h2>Deposit Funds</h2>
                                                    </div>
                                                    <div class="input__container">
                                                        <div class="row">
                                                            <div class="col-md-12 col-12">
                                                                <div class="form-group">
                                                                    <label for="name">Secure Payment info <br>
                                                                    <input type="radio" name="online" id="paytm" value="paytm" >
                                                                    <img src="assets/img/paytm3.png" />&nbsp;&nbsp;&nbsp;|
                                                                    <input type="radio" name="online" id="gpay" value="gpay" >
                                                                    <img src="assets/img/google-pay-logo-0.png" />
                                                                    </label>
                                                                    <span id="error_sec_pay" class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-12">
                                                                <div class="form-group">
                                                                    <label for="name">Name (as it appear on the card)</label>
                                                                    <input type="text" class="form-control" id="cardname" name="cardname" placeholder="Enter Name " required="">
                                                                    <span id="error_cardname" class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-12">
                                                                <div class="form-group">
                                                                    <label for="name">Card Number</label>
                                                                    <input type="text" class="form-control" id="cardnumber" name="cardnumber" placeholder="Enter Card Number" required="">
                                                                    <span id="error_cardnumber" class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="name">Expiration Date</label>
                                                                    <input type="text" class="form-control" id="exp_date" name="exp_date" placeholder=" Enter expire date">
                                                                    <span id="error_expdate" class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="name">CVV</label>
                                                                    <input type="text" class="form-control" id="cvv" name="cvv" placeholder="Enter CVV Number address" required="">
                                                                    <span id="error_cvv" class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-12">
                                                                <div class="text-right"><span class="mobile-text d-block text-right">The CVV number is the last three digits on the back of your card </span></div>
                                                            </div>
                                                        </div>

                                                        <div class="buttons"> <a class="prev__btn" onclick="prevForm();">Back</a> <a class="nxt__btn" onclick="nextForm();">Next</a> </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="active__form" id="form5">
                                                    <div class="sub__title__container">
                                                        <h2>All Done</h2>
                                                    </div>
                                                    <div class="input__container">
                                                        <div class="row">
                                                            <div class="col-md-12 col-12 text-center">
                                                                <div class="complete-step">
                                                                    <img src="assets/img/ok.gif" />
                                                                    <h3>You are all set to GO</h3>
                                                                    <a class="sbt__btn" id="submitBtn" onclick="nextForm();">Start Trading Now </a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- login-right-left -->

                                <div class="login-left-dark">
                                    <img class="black" src="assets/img/root/logo-white.png" alt="img">
                                    <h1>TRADE WITH TRUST <br>TRADE WITH US.</h1>
                                    <p>Forex, CFDs on Shares, Futures, Indices, Metals & Energies</p>
                                    <div class="login-button">
                                        <a href="#">Already have an account</a>
                                        <button class="blue-bttn" id="signUp">Login</button>
                                    </div>
                                </div>
                                <!-- login-right-right -->



                            </div>
                            <!-- login-right -->



                        </div>
                    </div>

                </div>
            </div>


            <Section>
    </main>
    <!--Libs-->
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src="assets/vendors/jquery-3.5.1.min.js"></script>
    <script src="assets/scripts/vlt-plugins.min.js"></script>
    <script src="assets/scripts/vlt-helpers.js"></script>
    <script src="assets/scripts/vlt-controllers.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script type='text/Javascript'>
	
const nxtBtn = document.querySelector("#submitBtn");
const form1 = document.querySelector("#form1");
const form2 = document.querySelector("#form2");
const form3 = document.querySelector("#form3");
const form4 = document.querySelector("#form4");
const form5 = document.querySelector("#form5");
const icon1 = document.querySelector("#icon1");
const icon2 = document.querySelector("#icon2");
const icon3 = document.querySelector("#icon3");
const icon4 = document.querySelector("#icon4");
const icon5 = document.querySelector("#icon5");
var viewId = 1;
function nextForm() {
	formone();
    progressBar();
    displayForms();
    //console.log(viewId);
	
}
function nextForm1() {
	formtwo();
    progressBar();
    displayForms();
    //console.log(viewId);
	
}
function prevForm() {
	viewId > 5 ;
    viewId = viewId - 1;
    //console.log(viewId);
    progressBar1();
    displayForms();
}
function progressBar1() {
    if (viewId === 1) {
        icon2.classList.add("active");
        icon2.classList.remove("active");
        icon3.classList.remove("active");
        icon4.classList.remove("active");
        icon5.classList.remove("active");
    }
    if (viewId === 2) {
        icon2.classList.add("active");
        icon3.classList.remove("active");
        icon4.classList.remove("active");
        icon5.classList.remove("active");
    }
    if (viewId === 3) {
        icon3.classList.add("active");
        icon4.classList.remove("active");
        icon5.classList.remove("active");
    }
    if (viewId === 4) {
        icon4.classList.add("active");
        icon5.classList.remove("active");
    }
    if (viewId === 5) {
        icon5.classList.add("active");
        nxtBtn.innerHTML = "Start Trading Now ";
    }
    if (viewId > 5) {
        icon2.classList.remove("active");
        icon3.classList.remove("active");
        icon4.classList.remove("active");
        icon5.classList.remove("active");
    }
}
function progressBar() {
    if (viewId === 2) {
        icon2.classList.add("active");
    }
    if (viewId === 3) {
        icon3.classList.add("active");
    }
    if (viewId === 4) {
        icon4.classList.add("active");
    }
    if (viewId === 5) {
        icon5.classList.add("active");
        nxtBtn.innerHTML = "Start Trading Now ";
    }
    if (viewId > 5) {
        icon2.classList.remove("active");
        icon3.classList.remove("active");
        icon4.classList.remove("active");
        icon5.classList.remove("active");
    }
}
function displayForms() {
    if (viewId > 5) {
        viewId = 1;
    }
    if (viewId === 1 ) {
        form1.style.display = "block";
        form2.style.display = "none";
        form3.style.display = "none";
        form4.style.display = "none";
        form5.style.display = "none";
    } else if (viewId === 2) {
        form1.style.display = "none";
        form2.style.display = "block";
        form3.style.display = "none";
        form4.style.display = "none";
        form5.style.display = "none";
    } else if (viewId === 3) {
        form1.style.display = "none";
        form2.style.display = "none";
        form3.style.display = "block";
        form4.style.display = "none";
        form5.style.display = "none";
    } else if (viewId === 4) {
        form1.style.display = "none";
        form2.style.display = "none";
        form3.style.display = "none";
        form4.style.display = "block";
        form5.style.display = "none";
    } else if (viewId === 5) {
        form1.style.display = "none";
        form2.style.display = "none";
        form3.style.display = "none";
        form4.style.display = "none";
        form5.style.display = "block";
    }
} 
// for slider var slider = document.querySelector(".slider"); var
// output = document.querySelector(".output__value");
// output.innerHTML = slider.value;
// slider.oninput = function () {
//     output.innerHTML = this.value;
// };


    
	
        function formone()
        {
			    viewId = viewId + 1;
                var error_fname='';
                var error_lname='';
                var error_email = '';
                var error_phone='';
                var error_country='';
                var error_address='';
                var count =$('#country').val();
            
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var mobile_validation = /^\d{10}$/;

            
            if ($.trim($('#fname').val()).length == 0) {
                error_fname = 'First Name is required';
                $('#error_fname').text(error_fname);
                $('#fname').addClass('has-error');
            } else {
                error_fname = '';
                $('#error_fname').text(error_fname);
                $('#fname').removeClass('has-error');
            }

            if ($.trim($('#lname').val()).length == 0) {
                error_lname = 'Last Name is required';
                $('#error_lname').text(error_lname);
                $('#lname').addClass('has-error');
            } else {
                error_lname = '';
                $('#error_lname').text(error_lname);
                $('#lname').removeClass('has-error');
            }

            if (($.trim($('#pi_email').val()).length == 0  || !filter.test($('#pi_email').val()))){
                error_email = 'Email is required or email is invalid';
                $('#error_email').text(error_email);
                $('#pi_email').addClass('has-error');
            } else
            {
                     error_email = '';
                    $('#error_email').text(error_email);
                    $('#pi_email').removeClass('has-error');
                }
      

            if ($.trim($('#phone').val()).length == 0) 
            {
                error_phone = 'Mobile Number is required';
                $('#error_phone').text(error_phone);
                $('#phone').addClass('has-error');
            } else {
                if (!mobile_validation.test($('#phone').val())) {
                    error_phone = 'Invalid Mobile Number';
                    $('#error_phone').text(error_phone);
                    $('#phone').addClass('has-error');
                } else {
                    error_phone = '';
                    $('#error_phone').text(error_phone);
                    $('#phone').removeClass('has-error');
                }
            }
            if (count=="Select your country"){
                error_country = 'Select your country please';
                $('#error_country').text(error_country);
                $('#country').addClass('has-error');

            }else{
                error_country ='';
                $('#error_country').text(error_country);
                $('#country').removeClass('has-error');
            }

            if ($.trim($('#address').val()).length == 0) {
                error_address = 'Address is required';
                $('#error_address').text(error_address);
                $('#address').addClass('has-error');
            } else {
                error_address = '';
                $('#error_address').text(error_address);
                $('#address').removeClass('has-error');
            }
			
				
        };
			/*
			$('.field').on('input', 'change', function() {
				if($(this).val() != '') {
					$('#stop').prop('disabled', false);
				} else {
					$('#stop').prop('disabled', true);
				}
				
				});
				
				$('#fname, #lname , #email,#phone,#country ,#address').blur(function() {
				   if($('#fname').val() !== "" && $('#lname').val() !== "" && $('#email').val() !== "" && $('#phone').val() !=="" && $('#country').val() !=="" && $('#address').val() !=='' ){
					   $('#stop').attr('disabled','enable');
				   } else {
					  $('#stop').removeAttr('disabled','disabled');
				   }
				});
			*/
			
	
			function formtwo()
			{
					viewId = viewId +1;
					var error_ann_plan ='';
					var error_leverage='';
					var lev = $('#leverage').val();
				
				if ($('#ann_plan').val() < 5000) 
				{
					
					error_ann_plan = ' !! only digits are allowed or  ammount is less then 5000';
					$('#error_ann_plan').text(error_ann_plan);
					$('#ann_plan').addClass('has-error');
				} 
				 else {
						error_ann_plan = '';
						$('#error_ann_plan').text(error_ann_plan);
						$('#ann_plan').removeClass('has-error');
					}
				if (lev =="Select Leverage"){
					error_leverage = 'Select your leverage';
					$('#error_leverage').text(error_leverage);
					$('#leverage').addClass('has-error');

				}else{
					error_leverage ='';
					$('#error_leverage').text(error_leverage);
					$('#leverage').removeClass('has-error');
				}	
			};
	
			
			
    </script>

</body>

</html>