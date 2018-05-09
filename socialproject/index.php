<?php
include("includes/header.php");
include("includes/classes/user.php");
include("includes/classes/posts.php");
if(isset($_POST['post'])){
	// echo "<div>"."iam here"."</div>";
	$post = new Post($con,$userLoggedIn);
	$post->submitPost($_POST['post_text'],'none');
}?>
       <div class="user_details column">
       		<a href="<?php echo $userLoggedIn?>">
       			<img src="<?php echo $user['profile_pic']?>">
       			</a>
       			<div class="user_details_left_right">
	       			<a href="<?php echo $userLoggedIn?>">
	       			<?php 
	       				echo $user['first_name']." ".$user['last_name'];
	       			?>
	       			</a>
	       			<br>
	       			<?php 
	       				echo  "Posts: ".$user['num_posts']."</br>";
	       				echo "Likes: ".$user['num_likes']."</br>";

	       			 ?>
       			</div>
        </div>
        <div class="main_column column" >
        	<form class="post_form" action="index.php" method="POST">
        		<textarea name="post_text" id="post_text" placeholder="Got something to say"></textarea>
        		<input type="submit" name="post" id="post_button" value="Post">
        	</form>
        	<?php
        		$post = new Post($con,$userLoggedIn);
        		echo $post->loadPostsFriends();
        	?>
        </div>
   </div>
    </body>
</html>