<?php
	$con=mysqli_connect("localhost","root","","social");
	if(mysqli_connect_errno()){
    echo "Failed to connect: ".mysqli_connect_errno();
	}
	$con=mysqli_connect("localhost","root","","social");
if(mysqli_connect_errno()){
    echo "Failed to connect: ".mysqli_connect_errno();
}
$fname="";
$lname="";
$em="";
$em2="";
$password="";
$password2="";
$date="";
$error_array="";//holds error messages
if(isset($_POST['register_button'])){
	//first name
	$fname=strip_tags($_POST['reg_fname']);//remove html tags
	$fname=str_replace(' ', '', $fname);//remove spaces
	$fname=ucfirst($fname);//uppercase first letter
	//Last name
	$lname=strip_tags($_POST['reg_lname']);//remove html tags
	$lname=str_replace(' ', '', $lname);//remove spaces
	$lname=ucfirst($lname);//uppercase first letter
	//email
	$em=strip_tags($_POST['reg_email']);//remove html tags
	$em=str_replace(' ', '', $em);//remove spaces
	$em=ucfirst($em);//uppercase first letter
	//email2
	$em2=strip_tags($_POST['reg_fname']);//remove html tags
	$em2=str_replace(' ', '', $em2);//remove spaces
	$em2=ucfirst($em2);//uppercase first letter
	//password
	$password=strip_tags($_POST['reg_password']);//remove html tags
	//first name
	$password2=strip_tags($_POST['reg_password2']);//remove html tags
	//date
	$date=date("Y-m-d");//current date
	if($em==$em2){
		if(filter_var(($em,FILTER_VALIDATE_EMAIL))){
			$EM=filter_var(($em,FILTER_VALIDATE_EMAIL);
			if()
		}else{
			echo "Email address is not valid";
		}
	}else{
		echo "Emails don't match";
	}
}
?>


<html>
<head>
	<title>Registeration Page</title>
</head>
<body>
	<form action="register.php" method="POST">
		<input type="text" name="reg_fname" placeholder="First Name" required>
		<br>
		<input type="text" name="reg_lname" placeholder="Last Name" required>
		<br>
		<input type="email" name="reg_email" placeholder="Email" required>
		<br>
		<input type="email" name="reg_email2" placeholder="Confirm email" required>
		<br>
		<input type="password" name="reg_password" placeholder="Password" required>
		<br>
		<input type="password" name="reg_password2" placeholder="Confirm password" required>
		<br>
		<input type="submit" name="reg_button" value="Register">


	</form>

</body>
</html>