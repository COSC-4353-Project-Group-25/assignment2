<?php

session_start();
class loginMod{
	public function  login(){
		$username = $_POST['username'];
		$password = $_POST['password'];
		if ($this->validUsername($username)){
			if ($this->correctCredentials($username,$password)){
				$_SESSION['username'] = $username;
				$url = '//localhost/home.html';
				header("Location: $url");
			}else {
				echo "<script>alert('Wrong credentials try again')</script>";//Invalid Login
			}
		}
		else {
			echo "<script>alert('Wrong credentials try again')</script>";//Invalid Login
		}
	}
	public function validUsername(string $username):  bool {
		$userinfo = array(
                'username1'=>'password1',
                'username2'=>'password2'
                );
		if (array_key_exists($username,$userinfo)){
			return true;
		}
		else{
			return false;
		}
	}
	public function correctCredentials($username, $password): bool {
		$userinfo = array(
                'username1'=>'password1',
                'username2'=>'password2'
                );
		return true;
	}
}	
?>
