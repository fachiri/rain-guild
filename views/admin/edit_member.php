<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
	<link rel="stylesheet" href="../styleTD.css">
	<link rel="icon" href="../icon.png">

	<script type="text/javascript">
		function PreviewImage() {
		var oFReader = new FileReader();
		oFReader.readAsDataURL(document.getElementById("img").files[0]);
		oFReader.onload = function (oFREvent)
		 {
		    document.getElementById("uploadPreview").src = oFREvent.target.result;
		};
		};
	</script>

</head>
<body>
	<div class="container">
	<div class="logo"></div>
	<div class="containerForm" >
		<div class="header">
			<p>Edit Data</p>
		</div>
		<form action="" method="post" enctype="multipart/form-data" name="myForm" class="form">
				<input type="hidden" name="id" value="<?= $anggota['id']; ?>">
			<div class="formIgn">
				<label class="label" for="ign">In Game Name</label>
				<input class="inputStyle" type="text" name="ign" id="ign" placeholder="Edit IGN here" required value="<?= $anggota['ign']; ?>"></div>
			<div class="formJob">
				<label class="label" for="job">Job In Game</label>

				<?php $selected = $anggota["job"]; ?>

				<select class="inputStyle" name="job" id="job">
					<option value="" >Edit Job</option>
					<option value="Swordman" <?php if( $selected == 'Swordman') { echo('selected') ; } ?> >1st Job - Swordman</option>
					<option value="Warrior" <?php if( $selected == 'Warrior') { echo('selected') ; } ?> >2nd Job - Warrior</option>
					<option value="Berserker" <?php if( $selected == 'Berserker') { echo('selected') ; } ?> >2nd Job - Berserker</option>
					<option value="Braver" <?php if( $selected == 'Braver') { echo('selected') ; } ?> >3rd Job - Braver</option>
					<option value="Vanguard" <?php if( $selected == 'Vanguard') { echo('selected') ; } ?> >3rd Job - Vanguard</option>
					<option value="Samurai" <?php if( $selected == 'Samurai') { echo('selected') ; } ?> >Extra Job - Samurai</option>
					<option value="Cleric" <?php if( $selected == 'Cleric') { echo('selected') ; } ?> >1st Job - Cleric</option>
					<option value="Paladin" <?php if( $selected == 'Paladin') { echo('selected') ; } ?> >2nd Job - Paladin</option>
					<option value="Priest" <?php if( $selected == 'Priest') { echo('selected') ; } ?> >2nd Job - Priest</option>
					<option value="Holy Knight" <?php if( $selected == 'Holy Knight') { echo('selected') ; } ?> >3rd Job - Holy Knight</option>
					<option value="High Priest" <?php if( $selected == 'High Priest') { echo('selected') ; } ?> >3rd Job - High Priest</option>
					<option value="Guardian" <?php if( $selected == 'Guardian') { echo('selected') ; } ?> >Extra Job - Guardian</option>
					<option value="Scout" <?php if( $selected == 'Scout') { echo('selected') ; } ?> >1st Job - Scout</option>
					<option value="Archer" <?php if( $selected == 'Archer') { echo('selected') ; } ?> >2nd Job - Archer</option>
					<option value="Trickster" <?php if( $selected == 'Trickster') { echo('selected') ; } ?> >2nd Job - Trickster</option>
					<option value="Sniper" <?php if( $selected == 'Sniper') { echo('selected') ; } ?> >3rd Job - Sniper</option>
					<option value="Agent" <?php if( $selected == 'Agent') { echo('selected') ; } ?> >3rd Job - Agent</option>
					<option value="Shinobi" <?php if( $selected == 'Shinobi') { echo('selected') ; } ?> >Extra Job - Shinobi</option>
					<option value="Magician" <?php if( $selected == 'Magician') { echo('selected') ; } ?> >1st Job - Magician</option>
					<option value="Arcmage" <?php if( $selected == 'Arcmage') { echo('selected') ; } ?> >2nd Job - Arcmage</option>
					<option value="Wizard" <?php if( $selected == 'Wizard') { echo('selected') ; } ?> >2nd Job - Wizard</option>
					<option value="Sage" <?php if( $selected == 'Sage') { echo('selected') ; } ?> >3rd Job - Sage</option>
					<option value="Sorcerer" <?php if( $selected == 'Sorcerer') { echo('selected') ; } ?> >3rd Job - Sorcerer</option>
					<option value="Mana Slanger" <?php if( $selected == 'Mana Slanger') { echo('selected') ; } ?> >Extra Job - Mana Slanger</option>
				</select>
			</div>
			<div class="formPosition">
				<label class="label" for="position">Position</label>

				<?php $selected2 = $anggota["position"]; ?>

				<select class="inputStyle" name="position" id="position">
					<option value="">Edit Position</option>
					<option value="Guild Master" <?php if( $selected2 == 'Guild Master') { echo('selected') ; } ?> >Guild Master</option>
					<option value="Sub Master" <?php if( $selected2 == 'Sub Master') { echo('selected') ; } ?> >Sub Master</option>
					<option value="Senior" <?php if( $selected2 == 'Senior') { echo('selected') ; } ?> >Senior</option>
					<option value="Regular" <?php if( $selected2 == 'Regular') { echo('selected') ; } ?> >Regular</option>
					<option value="Rookie" <?php if( $selected2 == 'Rookie') { echo('selected') ; } ?> >Rookie</option>
				</select>
			</div>
			<div>
				<label class="label" for="name">Name</label>
				<input class="inputStyle"type="text" name="name" id="name" placeholder="Edit real name here" required value="<?= $anggota['name']; ?>">
			</div>
			<div class="formGender" style="display: inline-block;">
				<label class="label">Gender</label>

				<?php $checked = $anggota["gender"]; ?>

				<div class="inputGenderStyle" style="display: inline-block;">
					<input type="radio" name="gender" id="male" value="Male" <?php if( $checked == 'Male') { echo('checked') ; } ?> >
					<label for="male">Male</label>
					<input type="radio" name="gender" id="female" value="Female" <?php if( $checked == 'Female') { echo('checked') ; } ?> >
					<label for="female">Female</label>
				</div>
			</div>
			<div class="formAge" style="display: inline-block;">
				<label class="label" for="age">Age</label>
				<input class="inputAgeStyle" type="number" min="1" max="100" name="age" id="age" placeholder="Edit age here" required value="<?= $anggota['age']; ?>">
			</div>
			<div>
				<label class="label" for="address">Address</label>
				<input class="inputStyle" type="text" name="address" id="address" placeholder="Edit City or Region (Country)   |   Example : Jakarta (Indonesia) " required value="<?= $anggota['address']; ?>">
			</div>

			<!-- <div>
				<label class="label" for="img">Image</label>
				<input class="inputStyle" type="file" name="img" id="img" onchange="PreviewImage();"required value="../ss/<?= $anggota['img']; ?>">
			</div>
			<div class="preview">
				<label for="uploadPreview" class="label">Preview Image</label><br>
				<img id="uploadPreview">
			</div>	
			<div class="note">
				<p>Upload an image with one of the following sizes for optimal results :</p>
					<li>320 x 214 px</li>
					<li>640 x 428 px (recommended)</li>
					<li>1280 x 856 px (recommended)</li>
			</div> -->

			<div class="allButton">
				<div class="submit">
					<button class="submitButton" type="submit" name="submit">Edit</button>
				</div>
				<div class="back">
					<a href="index.php"><button class="submitButton" type="button">Back</button></a>
				</div>				
			</div>

		</form>
	</div>
	</div>
</body>
</html>