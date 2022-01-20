<?php 

session_start();

if( !isset($_SESSION['loginAsAdmin'])) {
	header("Location: ../login");
	exit;
}

?>



<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	<link rel="stylesheet" href="public/dist/css/style.css">
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
				<li class="naviStyle"><a href="admin.php?page=users">List Users</a></li>
				<li class="naviStyle"><a href="admin.php?page=members">List Member</a></li>
				<li class="naviStyle"><a href="app/action_logout.php" onclick="return confirm('Logout?')">Logout</a></li>
			</ul>
		</div>
		<div class="status"></div>
		<div class="contentConfig">
			<?php include "app/config.php"; ?>
		</div>
		<div class="footer">
			<p>Guild 雨Rain 2021</p>
			<div class="navi2">
				<!-- <a href="logout.php" class="naviStyle2">Logout</a> -->
			</div>
		</div>
	</div>
	</div>
</body>
</html>