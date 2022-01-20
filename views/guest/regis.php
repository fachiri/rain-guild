<div class="header">
	<p>Registration</p>
</div>
<form action="" method="post">
	<div class="formUser">
		<label for="username" class="label">Username</label>
		<input class="inputStyle" type="text" name="username" id="username" placeholder="Add your username" required>
	</div>
	<div class="formIgn">
		<label class="label labelIgnRegis" for="ign">In Game Name</label>
		<input class="inputStyle" type="text" name="ign" id="ign" placeholder="Add your IGN" required>
	</div>
	<div class="formPass">
		<label for="password" class="label">Password</label>
		<input class="inputStyle" type="Password" name="password" id="password" placeholder="Add your password" required>
	</div>
	<div class="formConpw">
		<label for="conpw" class="label">Confirm Pass</label>
		<input class="inputStyle" type="Password" name="conpw" id="conpw" placeholder="Repeat your password" required>
	</div>
	<div class="allButton">	
		<div class="submit">
			<button class="submitButton" type="submit" name="register">Register</button>
		</div>
		<div class="back">
			<button class="submitButton" type="button" onclick="history.back()">Back</button>
		</div>			
	</div>
</form>