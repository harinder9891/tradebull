<!DOCTYPE html>
<html class="no-js vlt-is--custom-cursor" lang="en">
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
	<!--Plugins
	<link rel="stylesheet" href="assets/css/vlt-plugins.min.css">-->
	<!--Style-->
	<link rel="stylesheet" href="assets/css/vlt-main.min.css">
	<!--Custom-->
	<link rel="stylesheet" href="assets/css/custom.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>
	<!--Header-->
	<header class="vlt-header">
		<div class="vlt-navbar vlt-navbar--main vlt-navbar--fixed light-head blue-bar">
			<div class="vlt-navbar-background"></div>
			<div class="vlt-navbar-inner">
				<div class="vlt-navbar-inner--left"> 
					<!--Logo--><a class="vlt-navbar-logo" href="index.php"><img class="white" src="assets/img/root/logo-white.png" alt="logo"></a>
					<!--Contacts-->
					<nav class="vlt-navbar-contacts d-none d-md-block">
						<ul>
							<li><a href="https://tradebull.io/index.php" >HOME</a></li>
							<li>
								<label for="drop-1" class="toggle"  id="clickme"> SERVICES</label>
								<a href="javascript:void(0);"> SERVICES  <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#ffffff"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M7 10l5 5 5-5H7z"/></svg></a>
								<input type="checkbox" id="drop-1"/>
								<ul>
									<li> <a href="/rollover"> ROLLOVERS </a></li>
									<li>  <a href="/pricing"> LIVE PRICING </a> </li>
									<li><a href="/execution">EXECUTION SCOREBOARD </a></li>
								</ul>
							</li>
							
							<li><a href="/about" >ABOUT</a></li> 
							
							<li>
								<label for="drop-1" class="toggle"  id="clickme"> PLATFORMS</label>
								<a href="javascript:void(0);"> PLATFORMS  <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#ffffff"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M7 10l5 5 5-5H7z"/></svg></a>
								<input type="checkbox" id="drop-1"/>
								<ul>
									<li> <a href="/platforms">MetaTrader 5  </a></li>
									<li> <a href="">MetaTrader Web  </a> </li>
									<li> <a href="/meta-trader-mobile">MetaTrader Mobile  </a></li>
									<li> <a href="/download">Downloads</a></li>
								</ul>
							</li>
							<li> <a href="/education">EDUCATION </a></li>
							<li> <a href="/blogs">Blogs </a></li>
							<li><a href="/contact" >CONTACT</a></li>
							
							<li class="sep">&nbsp;&nbsp;</li><li class="sep">&nbsp;&nbsp;</li>
							<li><a class="vlt-login" href="https://client.tradebull.io/"><img class="white" src="assets/img/root/login-white.png" alt="login">Login</a></li>
						</ul>
					</nav> 
				</div>
				<div class="vlt-navbar-inner--right">
					<div class="d-flex align-items-center">
						<!--Menu Burger--><a class="vlt-menu-burger js-offcanvas-menu-open" id="vlt-menu-burger" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="round">
						<line x1="3" y1="12" x2="21" y2="12" />
						<line x1="3" y1="6" x2="21" y2="6" />
						<line x1="3" y1="18" x2="21" y2="18" /></svg></a>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!--Offcanvas Menu-->
	<div class="vlt-offcanvas-menu ">
		<span id='close'>x</span>
		<nav class="vlt-offcanvas-menu__navigation">
			<!--Navigation-->
			<ul class="sf-menu">
				<li><a href="index.php">HOME</a></li>
				<li>
					<label for="drop-1" class="toggle"  id="clickme"> SERVICES</label>
					<a href="javascript:void(0);"> SERVICES  <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#ffffff"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M7 10l5 5 5-5H7z"/></svg></a>
					<input type="checkbox" id="drop-1"/>
					<ul>
						<li> <a href="/rollover"> ROLLOVERS </a></li>
						<li> <a href="/pricing"> LIVE PRICING </a> </li>
						<li> <a href="/execution">EXECUTION SCOREBOARD </a></li>
					</ul>
				</li>
				
				<li><a href="/about" >ABOUT</a></li> 
				
				<li>
					<label for="drop-1" class="toggle"  id="clickme"> PLATFORMS</label>
					<a href="javascript:void(0);"> PLATFORMS  <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#ffffff"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M7 10l5 5 5-5H7z"/></svg></a>
					<input type="checkbox" id="drop-1"/>
					<ul>
						<li> <a href="/platform">MetaTrader 5  </a></li>
						<li> <a href="">MetaTrader Web  </a> </li>
						<li> <a href="/meta-trader-mobile">MetaTrader Mobile  </a></li>
						<li> <a href=""></a></li>
					</ul>
				</li>
				<li> <a href="/blogs">EDUCATION </a></li>
				<li> <a href="/blogs">Blogs </a></li>
				<li><a href="/contact">CONTACT</a></li>
				<li><a href="https://client.tradebull.io/">Login</a></li>
			</ul>
		</nav>
	</div>
	
	
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script>
	
	const hamburger = document.querySelector(".hamburger");
const navLinks = document.querySelector(".nav-links");
const links = document.querySelectorAll(".nav-links li");

hamburger.addEventListener('click', ()=>{
   //Animate Links
    navLinks.classList.toggle("open");
    links.forEach(link => {
        link.classList.toggle("fade");
    });

    //Hamburger Animation
    hamburger.classList.toggle("toggle");
});



$(document).ready(function(){
count=1;

$("#clickme").click(function() {
var num = count++;

if(num ==2){
window.location.href="https://www.google.com";
}
});

});
	</script>