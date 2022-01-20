<?php 
	// connect to the database
    require 'conn.php';

	if (isset($_POST['liked'])) {
		$postid = $_POST['postid'];
        $userid = $_POST['userid'];
		$result = mysqli_query($conn, "SELECT * FROM posts WHERE id_post=$postid");
		$row = mysqli_fetch_array($result); 
		$n = $row['likes'];

		mysqli_query($conn, "INSERT INTO likes (id_user, id_post) VALUES ($userid, $postid)");
		mysqli_query($conn, "UPDATE posts SET likes=$n+1 WHERE id_post=$postid");

		echo $n+1;
		exit();
	}
	if (isset($_POST['unliked'])) {
		$postid = $_POST['postid'];
        $userid = $_POST['userid'];
		$result = mysqli_query($conn, "SELECT * FROM posts WHERE id_post=$postid");
		$row = mysqli_fetch_array($result);
		$n = $row['likes'];

		mysqli_query($conn, "DELETE FROM likes WHERE id_post=$postid AND id_user=$userid");
		mysqli_query($conn, "UPDATE posts SET likes=$n-1 WHERE id_post=$postid");
		
		echo $n-1;
		exit();
	}
?>