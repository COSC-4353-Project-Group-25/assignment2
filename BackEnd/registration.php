<?php
    session_start();
    if(isset($_POST['username'])&&isset($_POST['password']))
    {    
        if( $_POST["username"] && $_POST["password"] )
        {
           
             $_SESSION["username"] = $_POST["username"];
        }
        $url = "loginPage.html";
        header("Location: $url");
        
    }
?>
