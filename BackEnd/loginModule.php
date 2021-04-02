<?php

session_start();
class loginMod{
	public function  login($username = null, $password = null){
		$db = mysqli_connect('localhost','root','your_password','fuel_thing');
				if(!$db)	
				{
					die('Error Connecting to Sql Server' . mysqli_connect_error());
				}
		if ($username == null){
			$username = $_POST['username'];
		}
		if ($password == null){
			$password = $_POST['password'];
		}
		if ($this->validUsername($username,$db) && $this->correctCredentials($username,$password,$db)){
			$_SESSION['username'] = $username;
			$sql = "SELECT * FROM ClientInformation WHERE username = '$username'";
			if(mysqli_query($db,$sql)){
				$result = mysqli_query($db,$sql);
				if($result->num_rows == 0){
					$url = '//localhost/editProfile.html';
				}
				else{
					$url = '//localhost/home.html';
				}
			}
			else
			{
				die('Query Failed');
			}
			header("Location: $url");
		}
		else {
			echo "<script>alert('Wrong credentials try again')</script>";//Invalid Login
		}
	}
	public function validUsername($username,$db):  bool {
		
		$sql = "SELECT * FROM UserCredentials WHERE id = '$username'";
		if(mysqli_query($db,$sql)){
			$result = mysqli_query($db,$sql);
			if($result->num_rows == 0){
				return false;
			}
			else{
				return true;
			}
		}
		else
		{
			die("query failed");
		}
	}
	public function correctCredentials($username, $password,$db): bool {
		$sql = "SELECT * FROM UserCredentials WHERE id = '$username' and pswd = '$password'";
		if(mysqli_query($db,$sql)){
			$result = mysqli_query($db,$sql);
			if($result->num_rows == 0){
				return false;
			}
			else{
				return true;
			}
		}
		else
		{
			die("query failed");
		}
	}
}	
?>
