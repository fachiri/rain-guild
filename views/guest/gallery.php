<?php 
	// Retrieve posts from the database
	$posts = mysqli_query($conn, "SELECT * FROM posts");
?>

<div class="subtitle">
	<p>Gallery</p>
</div>
<div class="contentLight">
	<!-- start looping post -->
	<?php while ($row = mysqli_fetch_array($posts)) { ?>
	<div class="postContent">
		<table class="table-post">
			<tr>
				<td class="r-img p-10"><img class="p-img" src="public/imgs/otsusuki.jpg"></td>
				<td colspan="2">username</td>
				<td class="t-p-i"><i class="fas fa-ellipsis-v"></i></td>
			</tr>
			<tr>
				<td colspan="4" class="post-img"><img src="public/uploads/post/post1.jpg"></td>	
			</tr>
			<tr>
				<td colspan="2" class="p-10">Posted on <?= $row['datetime'] ?> </td>
				<td class="td-icon" width="50">
					5
					<img src="public/icons/chat.png">
				</td>
				<td class="td-icon" width="50">
					<span class="likes_count"><?= $row['likes']; ?></span>
					<span class="star_stroke" onclick="window.location.href = 'login';"><img src="public/icons/star_stroke.png"></span>
				</td>	
			</tr>
			<tr>
				<td colspan="4" class="p-10"> <?= $row['caption'] ?> </td>
			</tr>
			<tr>
				<td colspan="4" class="p-10"> <?= $row['hashtag'] ?> </td>
			</tr>
		</table>
	</div>
	<?php } ?>
	<!-- end looping post -->
</div>