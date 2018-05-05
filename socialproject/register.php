<?php  
session_start();
$con = mysqli_connect("localhost","root","","social");//connection variable
if(mysqli_connect_errno()){
	echo "Faild to connect: ".mysqli_connect_errno();
}

//Declaring variables to prevent errors
$fname="";//First Name
$lname="";//Last Name
$em="";//email
$em2="";//confirm email
$password="";//password
$password2="";//confirm password
$date="";//sign up date
$errors_array=array();//Holds error messages

if(isset($_POST['reg_button'])){
	//Registration form values

	//First Name
	$fname=strip_tags($_POST['reg_fname']);//remove html tags
	$fname=str_replace(' ', '', $fname);//remove space
	$fname=ucfirst((strtolower($fname)));//upper case first letter
	$_SESSION['reg_fname']=$fname;//stores first name in a session
	//Last Name
	$lname=strip_tags($_POST['reg_lname']);//remove html tags
	$lname=str_replace(' ', '', $lname);//remove space
	$lname=ucfirst((strtolower($lname)));//upper case first letter
	$_SESSION['reg_lname']=$lname;//stores last name in a session

    //email
	$em=strip_tags($_POST['reg_email']);//remove html tags
	$em=str_replace(' ', '', $em);//remove space
	//$em=ucfirst((strtolower($em)));//upper case first letter	
	$_SESSION['reg_email']=$em;//stores email in a session

	//confirm email
	$em2=strip_tags($_POST['reg_email2']);//remove html tags
	$em2=str_replace(' ', '', $em2);//remove space
	//$em2=ucfirst((strtolower($em2)));//upper case first letter
	$_SESSION['reg_email2']=$em2;//stores email in a session


	//password
	$password=strip_tags($_POST['reg_password']);//remove html tags
	$_SESSION['reg_password']=$password;//stores password in a session

	//confirm password
	$password2=strip_tags($_POST['reg_password2']);//remove html tags
	$_SESSION['reg_password2']=$password2;//stores password in a session

	$date=date("Y-m-d");//current date
	if($em==$em2){
		//check if email is in valid format
		if(filter_var($em,FILTER_VALIDATE_EMAIL)){
			$em=filter_var($em,FILTER_VALIDATE_EMAIL);
			//check if email already exists
			$e_check=mysqli_query($con,"SELECT email FROM users WHERE email='$em'");
			$num_rows=mysqli_num_rows($e_check);
			if($num_rows>0){
				array_push($errors_array, "Email is already in use</br>");
			}
		}else{
			array_push($errors_array, "Email is not valid</br>");
		}
	}else{
		array_push($errors_array, "Emails don't match</br>");
		
	}
	if(strlen($fname)>25 || strlen($fname)<2){
		array_push($errors_array, "Your first name must be between 2 and 25 characters</br>");		
	}
	if(strlen($lname)>25 || strlen($lname)<2){
		array_push($errors_array, "Your last name must be between 2 and 25 characters"."</br>");		

		echo "";
	}
	if($password != $password2){
		array_push($errors_array, "passwords do not match</br>");		
	}else{
		if(preg_match('/[^A-Za-z0-9]/', $password)){
		array_push($errors_array, "Your password should contain english characters or numbers</br>");		
		}
	}
	if(strlen($password)>30||strlen($password)<5){
		array_push($errors_array, "Your password must be between 5 and 30</br>");		
	}
	if(empty($errors_array)){
		$password=md5($password);//Encrypt password befor sending to database
		//Generate username by concatenating first name and last name
		$username = strtolower($fname,"_",$lname);
		$check_username_query=mysqli_query($con,"SELECT username FROM users WHERE username='$username'");
		$i=0;
		//if username exist add number to username
		while(mysqli_num_rows($check_username_query)!=0){
			$i++;
			$username=$username."_".$i;
			$check_username_query=mysqli_query($con,"SELECT username FROM users WHERE username='$username'");
		}
	}
}
?>

<html>
<head>
	<title>Registeration Page</title>
</head>
<body>
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


	</form>

</body>
</html>