<?php

require 'app/functions.php';
$members = query("SELECT * FROM users");
$confirm_members = query("SELECT * FROM confirm_users");

if ($confirm_members == null) {
	$null_regis = true;
}

?>

<div class="subtitle ml75 textCenter">
	<p>List Users and Confirm Registration</p>
</div>
<div class="contentLight w940">
	<h1 class="pcl">List of Users</h1>
	<table class="table-skills">
		<tr class="trHeader">
			<td width="100">Username</td>
			<td>Encrypted Password</td>
			<td>Action</td>
		</tr>
		<?php foreach ($members as $member) : ?>
		<tr>
			<td><?php echo $member['username']; ?></td>
			<td><?php echo $member['password']; ?></td>
			<td>
				<a href="#" class="hrefButton">View</a>
				<a href="#" class="hrefButton">Edit</a>
				<a href="app/action_delete.php?id_user=<?= $member['id_user'] ?>&id_member=<?= $member['id_member'] ?>&page=users" class="hrefButton" onclick="return confirm('Are you sure that you want to delete this user?')">Delete</a>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<br>
	<h1 class="pcl">Confirm Registration</h1>
	<ul>
		<?php foreach ($confirm_members as $confirm_member) : ?>
		<li class="card">
			<p>IGN : <?php echo $confirm_member["ign"]; ?></p>
			<p>Username : <?php echo $confirm_member["username"]; ?></p>
			<p>Password : ******</p>
			<hr>
			<a href="app/action_confirm.php?id=<?php echo $confirm_member["id"]; ?>">
				<button class="submitButton">Confirm</button>
			</a>
		</li>
		<?php endforeach; ?>
	</ul>
	<?php if( isset($null_regis) ) : ?>
	<p class="card" style="color: red;">No registration yet to be confirmed</p>
<?php endif;  ?> 	
</div>