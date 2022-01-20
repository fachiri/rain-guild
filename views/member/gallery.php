<?php 
	// Retrieve posts from the database
	$posts = mysqli_query($conn, "SELECT * FROM posts");
	$id_user = $_SESSION['id_user'];
	$id_member = $_SESSION['id_member'];

	


?>





<div class="subtitle">
	<p>Gallery</p>
</div>
<div class="contentLight">
	<a href="post">Buat Postingan..</a>
	<!-- start looping post -->
	<?php while ($row = mysqli_fetch_array($posts)) { ?>
	<div class="postContent">
		<table class="table-post">
			<tr>
				<?php
					$result2 = mysqli_query($conn, "SELECT id_member FROM users WHERE id_user = ".$row['id_user']." "); 
					$row2 = mysqli_fetch_assoc($result2);
					$result3 = mysqli_query($conn, "SELECT ign, img_profile FROM bio_members WHERE id_member = ".$row2['id_member']." ");
					$row3 = mysqli_fetch_assoc($result3);
				?>
				<td class="r-img p-10"><img class="p-img" src="public/uploads/profile/<?php if( $row3['img_profile'] == '' ) { echo 'default.jpg'; } else { echo $row3['img_profile']; } ?>"></td>
				<td colspan="2"> <?php echo $row3['ign'] ?> </td>
				<td class="td-icon t-p-i">
					<?php if($row['id_user'] == $id_user): ?>
					<img src="public/icons/dots-three-vertical.svg" onclick="showOption('<?php echo $row['id_post'] ?>')">
					<div class="modal" id="option<?php echo $row['id_post'] ?>">
						<div class="modal-content">
							<a href="app/edit_post.php?id=<?php echo $row['id_post'] ?>">Edit</a>
							<a href="app/action_deletePost.php?id=<?php echo $row['id_post'] ?>" onclick="return confirm('Make sure you want to delete this post')">Delete</a>
						</div>
					</div>
					<?php endif; ?>
				</td>
			</tr>
			<tr>
				<!-- <td colspan="4" class="post-img"><img src="public/uploads/ss/imgnotfound.jpg" style="border-top: 1px solid #000; border-bottom: 1px solid #000;"></td>	 -->
			</tr>
			<tr>
				<td colspan="2" class="p-10">
					<?php echo differenceDate($row['datetime']) ?> ago
				</td>
				<td class="td-icon" width="50">
					0
					<img src="public/icons/chat.png">
				</td>
				<td class="td-icon" width="50">
					<span class="likes_count"><?= $row['likes']; ?></span>
					
					<?php 
					// determine if user has already liked this post
					$results = mysqli_query($conn, "SELECT * FROM likes WHERE id_user = $id_user AND id_post=".$row['id_post']."");

					if (mysqli_num_rows($results) == 1 ): ?>
						<!-- user already likes post -->
						<span class="star_fill" data-id="<?php echo $row['id_post']; ?>" data-user="<?php echo $id_user ?>" ><img src="public/icons/star_fill.png"></span>
						<span class="hide star_stroke" data-id="<?php echo $row['id_post']; ?>" data-user="<?php echo $id_user ?>"><img src="public/icons/star_stroke.png"></span>
					<?php else: ?>
						<!-- user has not yet liked post -->
						<span class="star_stroke" data-id="<?php echo $row['id_post']; ?>" data-user="<?php echo $id_user ?>"><img src="public/icons/star_stroke.png"></span>
						<span class="hide star_fill" data-id="<?php echo $row['id_post']; ?>" data-user="<?php echo $id_user ?>"><img src="public/icons/star_fill.png"></span>
					<?php endif ?>
				
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
<script src="public/dist/js/post.js"></script>
