<?php

if ( isset($_POST["login"]) ) {

	$username = $_POST['username'];
	$loginAs = $_POST['loginAs'];
	$password = $_POST['password'];

	if( $loginAs == "admin" ){

		$result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' "); 

		// cek admin
		if( mysqli_num_rows($result) === 1 ) {

			$row = mysqli_fetch_assoc($result);

			if (password_verify($password, $row["password"])) {
					$_SESSION['loginAsAdmin'] = true;
					header("Location: admin.php?page=members");
					exit;
			}
		}
		$error = true;

	} elseif( $loginAs == "member" ) {
	
		$result_conf = mysqli_query($conn, "SELECT * FROM confirm_users WHERE username = '$username' ");

		// cek unconfirmed account
		if ( mysqli_num_rows($result_conf) === 1 ) {
			$error2 = true;

		} else {

			$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' "); 

			// cek users
			if( mysqli_num_rows($result) === 1 ) {

				$row = mysqli_fetch_assoc($result);

				if (password_verify($password, $row["password"])) {
					$_SESSION['alertLogin'] = true;
					$_SESSION['loginAsMember'] = true;
					$_SESSION['id_user'] = $row['id_user'];
					$_SESSION['id_member'] = $row['id_member'];
					header("Location: profile");
					exit;
				}
			}
			$error = true;
		}

	}
	
}

?>