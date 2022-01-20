<?php 

session_start();

if( isset($_SESSION['loginAsAdmin'])) {
	header("Location: admin");
	exit;
}

require 'app/functions.php';

?>


<!DOCTYPE html>
<html>
<head>
	<title id="titlePage">Guild 雨Rain</title>
	<link rel="stylesheet" href="public/dist/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<link rel="icon" href="public/icons/main.png">
</head>
<body>
	<div class="container">
	<div class="kassen">
		<div class="headerLine">
		</div>
		<div class="header">
			<!-- <h1 class="title">Guild 雨Rain</h1> -->
		</div>
		<div class="naviBG">
			<ul class="navi">
				<li class="naviStyle" style="border-left: none;"><a href="homepage">Homepage</a></li>
				<li class="naviStyle"><a href="announcement_page">Announcement</a></li>
				<li class="naviStyle" ><a href="list_member_page">List Member</a></li>
				<li class="naviStyle"><a href="guide_page">Game Guide</a></li>
				<li class="naviStyle"><a href="gallery_page">Guild Gallery</a></li>
				<li class="naviStyle"><a href="profile">My Profile</a></li>
			</ul>
		</div>
		<div class="status"></div>
		
		<div class="contentConfig">
			<?php include "app/config.php"; ?>
		</div>

		<div class="footer">
			<p>Guild 雨Rain 2021</p>
			<div class="navi2">
				<a href="app/action_logout.php" class="naviStyle2">Logout</a>
				<!-- <a href="registration" class="naviStyle2">Registration</a> -->
				<a href="#" class="naviStyle2">Contact Us</a>
				<a href="#" class="naviStyle2">About</a>
			</div>
		</div>
	</div>
	</div>
	<script>
		var onPage = window.location.href.split("/").pop();	
		var titlePage = document.getElementById('titlePage');
		// var naviLink = document.getElementsByClassName('naviLink');
		var naviLink = document.querySelectorAll('ul.navi li a');
		switch(onPage) {
			case 'homepage':
			titlePage.innerHTML = "Homepage - Guild 雨Rain";
			naviLink[0].setAttribute('id', 'active');
			break;

			case 'announcement_page':
			titlePage.innerHTML = "Announcement - Guild 雨Rain";
			naviLink[1].setAttribute('id', 'active');
			break;

			case 'list_member_page':
			titlePage.innerHTML = "List Member - Guild 雨Rain";
			naviLink[2].setAttribute('id', 'active');
			break;

			case 'guide_page':
			titlePage.innerHTML = "Guide - Guild 雨Rain";
			naviLink[3].setAttribute('id', 'active');
			break;

			case 'gallery_page':
			titlePage.innerHTML = "Gallery - Guild 雨Rain";
			naviLink[4].setAttribute('id', 'active');
			break;

			case 'profile':
			titlePage.innerHTML = "My Profile - Guild 雨Rain";
			naviLink[5].setAttribute('id', 'active');
			break;
		}
	</script>
	<script src="public/dist/js/script.js"></script>
	<script src="public/dist/js/modal.js"></script>	
</body>
</html>