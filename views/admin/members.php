<?php

require 'app/functions.php';
$anggota2 = query("SELECT * FROM bio_members");
$confirm_members = query("SELECT * FROM confirm_users");

?>
<div class="confirmMember">
	<p>Confirm Registration</p><hr>
	<?php foreach ($confirm_members as $confirm_member) : ?>
		<ul>
			<li>IGN : <?php echo $confirm_member["ign"]; ?></li>
		</ul>
	<?php endforeach; ?>
</div>
<div class="subtitle">
	<p>List Member</p>
</div>
<div class="content">
	<?php foreach ($anggota2 as $anggota) : ?>
	<div class="anggota">
		<div class="containerBio">
			<div class="bio">
				<p>IGN</p>
				<p>Job</p>
				<p>Name</p>
				<p>Gender</p>
				<p>Age</p>
				<p>Address</p>
			</div>
			<div class="td">
				<p>:</p>
				<p>:</p>
				<p>:</p>
				<p>:</p>
				<p>:</p>
				<p>:</p>
			</div>
			<div class="data">
				<p><?php echo $anggota["ign"]; ?></p> 
				<p><?php echo $anggota["job"]; ?></p>
				<p><?php echo $anggota["name"]; ?></p>
				<p><?php echo $anggota["gender"]; ?></p>
				<p><?php echo $anggota["age"]; ?></p>
				<p><?php echo $anggota["address"]; ?></p>
			</div>
		</div>
		<div class="img" style="background-image: url(public/uploads/ss/<?php if( $anggota['img_char'] == '' ) { echo 'imgnotfound.jpg'; } else { echo $anggota['img_char']; } ?>);">
			<div class="borderImg"></div>
		</div>
		<div class="ket">
			<p><?php echo $anggota["position"]; ?></p>
			<a href="form.php?page=edit_member&id=<?php echo $anggota['id_member']; ?>">Edit</a>
			<a href="app/action_delete.php?id=<?php echo $anggota['id_member']; ?>" onclick=" return confirm('Delete Data?');">Delete</a>
		</div>
	</div>
	<?php endforeach; ?>
</div>