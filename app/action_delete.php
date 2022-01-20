<?php

session_start();

if( !isset($_SESSION['loginAsAdmin'])) {
	header("Location: ../login");
	exit;
}

require 'functions.php';

$id_member = $_GET['id_member'];
$id_user = $_GET['id_user'];
$page = $_GET['page'];

if( $page == 'users' ) {
	if( deleteUser($id_user) > 0){
		if( deleteBio($id_member) > 0){
			echo "<script>
					alert('User & Bio Deleted Successfully');
					document.location.href = '../admin.php?page=users';
				</script>";

		} else {
			echo "<script>
					alert('Data Bio Failed to delete');
					document.location.href = '../admin.php?page=users';
				</script>";
		}
	} else {
		echo "<script>
					alert('User Failed to delete');
					document.location.href = '../admin.php?page=users';
				</script>";
	}
}

?>