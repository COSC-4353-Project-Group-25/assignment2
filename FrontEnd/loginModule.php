<?php

session_start();
$userinfo = array(
                'username1'=>'password1',
                'username2'=>'password2'
                );
	if(isset($_POST['username'])) {
    if(array_key_exists($_POST['username'],$userinfo) && $userinfo[$_POST['username']] == $_POST['password']) {
        $_SESSION['username'] = $_POST['username'];
		$url = '//localhost/home.html';
		header("Location: $url");
    }else {
        echo "<script>alert('Wrong password try again')</script>";//Invalid Login
    }
}			
?>
