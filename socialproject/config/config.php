<?php
ob_start();
session_start();
$timezone=date_default_timezone_set("America/Chicago");
$con = mysqli_connect("localhost","root","","social");//connection variable
if(mysqli_connect_errno()){
	echo "Faild to connect: ".mysqli_connect_errno();
}

?>