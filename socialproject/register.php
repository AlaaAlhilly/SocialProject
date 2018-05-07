<?php  
require 'includes/form_handlers/login_handler.php';
?>

<html>
<head>
	<title>Registeration Page</title>
	<link rel="stylesheet" type="text/css" href="assests/css/register_style.css">
</head>
<body>
	<div class="wrapper">
		<div class="login_box">
			<div class="login_header">
				<h1>Friends</h1>
				signup or login below
			</div>
			<form action="register.php" method="POST">
				<input type="email" name="log_email" value="<?php
		          if(isset($_SESSION['log_email'])) echo($_SESSION['log_email']);
				?>" placeholder="Email Address">
				<br>
				<input type="password" name="log_password" value="<?php
				  if(isset($_SESSION['log_email'])) echo($_SESSION['password']);
				?>" placeholder="Password">
				<br>
				<input type="submit" name="log_button" value="Login">
				<?php if(in_array("Email or password was incorrect<br>", $errors_array)) echo "Email or password was incorrect<br>";?>
			</form>

			<form action="register.php" method="POST">
				<input type="text" name="reg_fname" value="<?php 
					if(isset($_SESSION['reg_fname'])){
						echo $_SESSION['reg_fname'];
					}
				?>" placeholder="First Name" required>
				<br>
				<?php if(in_array("Your first name must be between 2 and 25 characters</br>", $errors_array)) echo "Your first name must be between 2 and 25 characters</br>";?>
				<input type="text" name="reg_lname" value="<?php 
					if(isset($_SESSION['reg_lname'])){
						echo $_SESSION['reg_lname'];
					} 
					?>" placeholder="Last Name" required>
				<br>
				<?php if(in_array("Your last name must be between 2 and 25 characters</br>", $errors_array)) echo "Your last name must be between 2 and 25 characters</br>";?>
				<input type="email" name="reg_email" value="<?php 
					if(isset($_SESSION['reg_email'])){
						echo $_SESSION['reg_email'];
					}  
					?>" placeholder="Email" required>
				<br>
				<?php if(in_array("Email is already in use</br>", $errors_array)) echo "Email is already in use</br>";?>
				<?php if(in_array("Email is not valid</br>", $errors_array)) echo "Email is not valid</br>";?>
				<input type="email" name="reg_email2" value="<?php 
					if(isset($_SESSION['reg_email2'])){
						echo $_SESSION['reg_email2'];
					} 
					?>" placeholder="Confirm email" required>
				<br>
				<?php if(in_array("Emails don't match</br>", $errors_array)) echo "Emails don't match</br>";?>
				<input type="password" name="reg_password" placeholder="Password" required>
				<br>
				<?php if(in_array("Your password should contain english characters or numbers</br>", $errors_array)) echo "Your password should contain english characters or numbers</br>";?>
				<?php if(in_array("Your password must be between 5 and 30</br>", $errors_array)) echo "Your password must be between 5 and 30</br>"; ?>
				<input type="password" name="reg_password2" placeholder="Confirm password" required>
				<br>
				<?php if(in_array("passwords do not match</br>", $errors_array)) echo "passwords do not match</br>"; ?>

				<input type="submit" name="reg_button" value="Register">
				<?php if(in_array("<span style='color:#14c800'>You're all set! Goahead and login!</span><br>", $errors_array)) echo "<span style='color:#14c800'>You're all set! Goahead and login!</span><br>";?>
			</form>
		</div>
	</div>
</body>
</html>