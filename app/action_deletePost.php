<?php

session_start();

if( !isset($_SESSION['loginAsMember'])) {
	header("Location: ../login");
	exit;
}

require 'functions.php';

$id_post = $_GET['id'];

	if( deletePost($id_post) > 0){
		echo "<script>
            alert('Post deleted');
            document.location.href = '../gallery_page';
        </script>";
	} else {
		echo "<script>
            alert('Post Failed to delete');
            document.location.href = '../gallery_page';
        </script>";
	}

?>