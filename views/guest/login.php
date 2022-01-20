<div class="header">
	<p>Login</p>
</div>
<br>
<form action="" method="post">
<div class="formUser">
	<label for="username" class="label">Username</label>
	<input class="inputStyle" type="text" name="username" id="username" required>
</div>
<div class="formAs">
	<label for="loginAs" class="label">Login As</label>
	<select class="inputStyle" name="loginAs" id="loginAs">
		<option value="admin">Admin</option>
		<option value="member" selected>Member</option>
	</select>
</div>
<div class="formPass">
	<label for="password" class="label">Password</label>
	<input class="inputStyle" type="Password" required name="password" id="password">
</div>
<?php if( isset($error) ) : ?>
	<p style="color: red; font-family: sans-serif; font-style: italic; margin-left: 160px;">Username / Password Salah</p>
<?php endif;  ?>


<div class="allButton">	
	<div class="submit">
		<button class="submitButton" type="submit" name="login">Login</button>
	</div>
	<div class="back">
		<button class="submitButton" type="button" onclick="history.back()">Back</button>
	</div>			
</div>

<!-- Trigger/Open The Modal -->
<!-- <button id="myBtn">Open Modal</button> -->

<?php if( isset($error2) ) : ?>

	<!-- The Modal -->
	<div id="myModal" class="modal" style="display: block;">

	  <!-- Modal content -->
	  <div class="modal-content">
	    <img src="public/imgs/sticker1.png" class="sticker" >
	    <p>Your account has not been confirmed, contact admin for more information ( Line ID : dark_dm )</p><br>
	    <p><span class="close">Close</span></p>
	  </div>

	</div>
	
<?php endif;  ?>

