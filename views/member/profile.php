<?php 

$id_user = $_SESSION['id_user'];

$query = $conn->prepare("SELECT * FROM users INNER JOIN bio_members on users.id_member=bio_members.id_member WHERE id_user = '$id_user'");
$query->execute();
$result = $query->get_result();
$field = $result->fetch_object();

$ign = $field->ign;

if( isset($_SESSION['alertLogin'])) {
	myAlert('Login successfully! <br> Welcome to our website page, ', 'Close', $ign);
	unset($_SESSION['alertLogin']);
}

// var_dump($field);

?>

<div class="subtitle ml75 textCenter fs20">
	<p>Profile <?= $field->ign ?></p>
</div>
<div class="contentLight w940">
	<div class="profilePict">
		<img src="public/uploads/profile/<?php if( $field->img_profile == '' ) { echo 'default.jpg'; } else { echo $field->img_profile; } ?>">
		<a href="views/member/edit_profile.php" class="submitButton">Edit Profile</a>
	</div>
	<div class="profileForm">
		<table class="table-profile">
			<tr>
				<td>IGN</td>
				<td>:</td>
				<td><?php echo $field->ign; ?></td> 				
			</tr>
			<tr>
				<td>Job</td>
				<td>:</td>
				<td><?php echo $field->job; ?></td>
			</tr>
			<tr>
				<td>Position</td>
				<td>:</td>
				<td><?php echo $field->position; ?></td>
			</tr>
			<tr>
				<td>Name</td>
				<td>:</td>
				<td><?php echo $field->name; ?></td>
			</tr>
			<tr>
				<td>Gender</td>
				<td>:</td>
				<td><?php echo $field->gender; ?></td>
			</tr>
			<tr>
				<td>Age</td>
				<td>:</td>
				<td><?php echo $field->age; ?></td>
			</tr>
			<tr>
				<td>Address</td>
				<td>:</td>
				<td><?php echo $field->address; ?></td>
			</tr>
			<tr>
				<td>Screenshot Char</td>
				<td>:</td>
				<td>
					<div class="img" style="background-image: url(public/uploads/ss/<?php if( $field->img_char == '' ) { echo 'imgnotfound.jpg'; } else { echo $field->img_char; } ?>);">
						<div class="borderImg"></div>
					</div>
				</td>
			</tr>
		</table>
	</div>
</div>