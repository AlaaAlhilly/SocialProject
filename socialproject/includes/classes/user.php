<?php
	/**
	* 
	this class will create user object to get
	the info we need from the database
	*/
	class User
	{
		private $user;
		private $con;

		function __construct($con,$user)	
		{
			$this->con = $con;
			$user_details_query = mysqli_query($con,"SELECT * FROM users WHERE username='$user'");
			$this->user = mysqli_fetch_array($user_details_query);
		}
		public function getUserName()
		{
			# code...
			return $this->user['username'];
		}
		public function getFirstAndLastName(){
			$username = $this->user['username'];
			$query = mysqli_query($this->con,"SELECT first_name,last_name FROM users WHERE username='$username'");
				$row = mysqli_fetch_array($query);
				return $row['first_name']." ".$row['last_name'];
		}
		public function getNumPosts()
		{
			# code...
			$username = $this->user['username'];
			$query=mysqli_query($this->con,"SELECT num_posts FROM users WHERE username='$username'");
			$row=mysqli_fetch_array($query);
			return $row['num_posts'];

		}
		public function isClosed()
		{
			# code...
			$username = $this->user['username'];
			$query=mysqli_query($this->con,"SELECT user_closed FROM users WHERE username='$username'");
			$row=mysqli_fetch_array($query);
			if($row['user_closed']=='yes'){
				return true;
			}
			return false;
		}
		public function isFriend($username_to_check)
		{
			# code...
			$usernameComma = "," . $username_to_check . ",";
			if(strstr($this->user['friend_array'],$usernameComma) || $username_to_check == $this->user['username']){
				return true;
			}else{
				return false;
			}
		}
	}
?>