<?php

require 'functions.php';

$id_member = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM confirm_users WHERE id = $id_member");
$data_member = mysqli_fetch_assoc($result);
$ign = $data_member['ign'];

if ( confirm_member($data_member) > 0 ) {
	// delete data from table confirm_users
	mysqli_query($conn, "DELETE FROM confirm_users WHERE id = $id_member");
	echo "<script>
			alert('$ign has confirmed');
			document.location.href = '../admin.php?page=users';
		</script>";
} else {
	echo "<script>
			alert('$ign failed to confirm');
			document.location.href = '../admin.php?page=users';
		</script>";
}

?>