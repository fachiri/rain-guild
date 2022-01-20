<?php 

session_start();

if( isset($_SESSION['loginAsAdmin'])) {
	header("Location: ../admin");
	exit;
}

require 'app/functions.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title id="titlePage"></title>
	<link rel="stylesheet" href="public/dist/css/styleTD.css">
	<link rel="icon" href="public/icons/main.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
	<div class="containerLog">
		<div class="logo"></div>
		<div class="containerForm">
			<?php include "app/config.php"; ?>
		</div>
	</div>
	<script>
		var onPage = window.location.href.split("/").pop();	
		var titlePage = document.getElementById('titlePage');
		switch(onPage){
			case 'login':
			titlePage.innerHTML = "Login - Guild 雨Rain";
			break;

			case 'registration':
			titlePage.innerHTML = "Registration - Guild 雨Rain";
			break;

			case 'post':
			titlePage.innerHTML = "Make a Post";
			break;
		}
	</script>
	<script src="public/dist/js/modal.js"></script>	
</body>
</html>