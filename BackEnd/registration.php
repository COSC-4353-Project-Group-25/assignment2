<?php
    session_start();
	class registration
	{
			public function uniqueUsername($username,$db)
			{
				if($username)
				{
					$sql = "SELECT * FROM UserCredentials WHERE id = '$username'";
					if(mysqli_query($db,$sql))
					{
						$result = mysqli_query($db,$sql);
						if($result->num_rows==0)
						{
							return true;
						}
						else
						{
							return false;
						}
					}
				}
			}
			public function register($username = NULL, $password = NULL)
			{
				$db = mysqli_connect('localhost','root','your_password','fuel_thing');
				if(!$db)	
				{
					die('Error Connecting to Sql Server' . mysqli_connect_error());
				}
				if($username==NULL)
				{
					$username = $_POST['username'];
				}
				if($password==NULL)
				{
					$password = $_POST['password'];
				}
				if( $username && $password )
				{
					if($this->uniqueUsername($username,$db))
					{
						$sql = "INSERT INTO UserCredentials(id,pswd) 
						VALUES ('$username','$password')";
						if (mysqli_query($db,$sql))
						{
							$_SESSION["username"] = $_POST["username"];
							$url = "Frontend/loginPage.html";
							header("Location: $url");
						}
					}
					else
					{
						die('username already taken');
					}
					
				}
				mysqli_close($db);
			}
			
	}
	
?>
