<?php

if( isset($_POST["register"]) ){

	if( registrasi($_POST) > 0 ) {
		echo "<script>
			alert('Registration request sent successfully!');
			document.location.href = 'form.php?page=unconfirm';
		</script>";
	} else {
		echo mysqli_error($conn);
	}

}

?>