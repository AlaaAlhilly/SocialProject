<?php
require 'includes/form_handlers/login_handler.php';
if(isset($_SESSION['username'])){
	$user=$_SESSION['username'];
}
?>
<html>
    <head>
        <title>social project</title>
        
    </head>
    <body>
        <?php if($_SESSION['username']) echo "hello ".$user;?>
    </body>
</html>