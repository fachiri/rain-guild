<?php 

session_start();

if( !isset($_SESSION['loginAsAdmin'])) {
	header("Location: ../login");
	exit;
}

require 'functions.php';

$id = $_GET["id"];

$anggota = query("SELECT * FROM anggota_guild WHERE id = $id")[0];

if(isset($_POST["submit"])) {

	if( !validJob($_POST["job"]) ){
		echo "<script>
			alert('Job must be filled');
		</script>";
	} else {
		if( edit($_POST) > 0 ){
			echo "<script>
			alert('Data Edited Successfully');
			document.location.href = 'index.php';
		</script>";
		} else {
			echo "<script>
			alert('Data Failed to Edit');
		</script>";
		}
	}
}



?>

