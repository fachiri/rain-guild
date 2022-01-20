<?php 

session_start();

if( isset($_SESSION['loginAsAdmin'])) {
	header("Location: ../admin");
	exit;
}

require '../functions.php';



if(isset($_POST["submit"])) {

	if( !validJob($_POST["job"]) ){
		echo "<script>
			alert('Job must be filled');
		</script>";
	} else {
		if( tambahData($_POST) > 0 ){
			echo "<script>
			alert('Data Added Successfully');
			document.location.href = '../list';
		</script>";
		} else {
			echo "<script>
			alert('Data Failed to Add');
		</script>";
		}
	}
}



?>

<!DOCTYPE html>
<html>
<head>
	<title>form</title>
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
			<p>Fill in Your Bio</p>
		</div>
		<div class="greatings">
			<p>Hello Adventurers, Welcome to The 雨Rain Guild. <br>Everyday is an adventure. Let's build up your epic journey with us in The 雨Rain Guild.</p>
		</div>
		<form action="" method="post" enctype="multipart/form-data" name="myForm" class="form">
			<div class="formIgn">
				<label class="label" for="ign">In Game Name</label>
				<input class="inputStyle" type="text" name="ign" id="ign" placeholder="Add your IGN here" required>
			</div>
			<div class="formJob">
				<label class="label" for="job">Job In Game</label>
				<select class="inputStyle" name="job" id="job" >
					<option value="" >Select Your Job</option>
					<option value="Swordman">1st Job - Swordman</option>
					<option value="Warrior">2nd Job - Warrior</option>
					<option value="Berserker">2nd Job - Berserker</option>
					<option value="Braver">3rd Job - Braver</option>
					<option value="Vanguard">3rd Job - Vanguard</option>
					<option value="Samurai">Extra Job - Samurai</option>
					<option value="Cleric">1st Job - Cleric</option>
					<option value="Paladin">2nd Job - Paladin</option>
					<option value="Priest">2nd Job - Priest</option>
					<option value="Holy Knight">3rd Job - Holy Knight</option>
					<option value="High Priest">3rd Job - High Priest</option>
					<option value="Guardian">Extra Job - Guardian</option>
					<option value="Scout">1st Job - Scout</option>
					<option value="Archer">2nd Job - Archer</option>
					<option value="Trickster">2nd Job - Trickster</option>
					<option value="Sniper">3rd Job - Sniper</option>
					<option value="Agent">3rd Job - Agent</option>
					<option value="Shinobi">Extra Job - Shinobi</option>
					<option value="Magician">1st Job - Magician</option>
					<option value="Arcmage">2nd Job - Arcmage</option>
					<option value="Wizard">2nd Job - Wizard</option>
					<option value="Sage">3rd Job - Sage</option>
					<option value="Sorcerer">3rd Job - Sorcerer</option>
					<option value="Mana Slanger">Extra Job - Mana Slanger</option>
				</select>
			</div>
			<div>
				<label class="label" for="name">Name</label>
				<input class="inputStyle"type="text" name="name" id="name" placeholder="Add your real name here" required>
			</div>
			<div class="formGender" style="display: inline-block;">
				<label class="label">Gender</label>
				<div class="inputGenderStyle" style="display: inline-block;">
					<input type="radio" name="gender" id="male" value="Male" checked>
					<label for="male">Male</label>
					<input type="radio" name="gender" id="female" value="Female" >
					<label for="female">Female</label>
				</div>
			</div>
			<div class="formAge" style="display: inline-block;">
				<label class="label" for="age">Age</label>
				<input class="inputAgeStyle" type="number" min="1" max="100" name="age" id="age" placeholder="Add your age here" required>
			</div>
			<div>
				<label class="label" for="address">Address</label>
				<input class="inputStyle" type="text" name="address" id="address" placeholder="City or Region (Country)   |   Example : Jakarta (Indonesia) " required>
			</div>
			<div>
				<label class="label" for="img">Image</label>
				<input class="inputStyle" type="file" name="img" id="img" onchange="PreviewImage();"required >
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
	</div>
			<div class="allButton">
				<div class="reset">
					<button class="submitButton" type="reset">Reset</button>
				</div>
				<div class="submit">
					<button class="submitButton" type="submit" name="submit">Submit</button>
				</div>				
			</div>

		</form>
	</div>
	</div>
</body>
</html>