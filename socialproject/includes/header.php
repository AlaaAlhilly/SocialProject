<?php
require 'config/config.php';
if(isset($_SESSION['username'])){
	$userLoggedIn=$_SESSION['username'];
	$user_details_query=mysqli_query($con,"SELECT * FROM users WHERE username='$userLoggedIn'");
	$user=mysqli_fetch_array($user_details_query);
}else{
	header("Location:register.php");
}
?>
<html>
    <head>
        <title>social project</title>
        <!--javascript-->
        	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        	<script src="assests/js/bootstrap.js"></script>
        	<!--CSS-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
        	<link rel="stylesheet" type="text/css" href="assests/css/bootstrap.css">
        	<link rel="stylesheet" type="text/css" href="assests/css/style.css">
    </head>
      
    <body>

    	<div class="top_bar">
    		
    		<div class="logo">
    			
    			<a href="index.php">Friends</a>
    		</div>

    		<nav>
    			<a href="#"><?php echo $user['first_name']?></i></a>
    			<a href="index.php">
    				<i class="fa fa-home fa-lg"></i>
    			</a>
    			<a href="#"><i class="fa fa-envelope fa-lg"></i></a>
    			<a href=""><i class="fas fa-bell-o fa-lg"></i></a>
    			<a href=""><i class="fas fa-users fa-lg"></i></a>
    			<a href=""><i class="fas fa-cog fa-lg"></i></a>
    		</nav>
    	</div>