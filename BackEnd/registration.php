<?php
    session_start();
	$db = new mysqli_connect('localhost','root','root','fuel_thing')
	or die('Error Connecting to Sql Server');
	
	
    if(isset($_POST['username'])&&isset($_POST['password']))
    {    
        if( $_POST["username"] && $_POST["password"] )
        {
			$sql = "Insert INTO UserCredentials(id,pswd) 
			VALUES ($username,$password)";
			if ($db->query($sql) == TRUE){
				$_SESSION["username"] = $_POST["username"];
				$url = "loginPage.html";
				header("Location: $url");
			}
             
        }
    }
?>
