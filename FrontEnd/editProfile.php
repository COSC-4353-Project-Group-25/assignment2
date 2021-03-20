<?php
    session_start();
    if(isset($_POST['submit']))
    {
        if(isset($_POST["name"])&&isset($_POST["address1"])&&isset($_POST["city"])&&isset($_POST["state"])&&isset($_POST["zipcode"]))
        {
            if(ctype_alpha($_POST['name']))
            {
                $name = $_POST["name"];
            }
            
            $address1 = $_POST["address1"];
            if(isset($_POST['address2']))
            {
                $address2 = $_POST["address2"];
            }
            if(ctype_alpha($_POST['city']))
            {
                $city = $_POST["city"];
            }
            if(ctype_alpha($_POST['state']))
            {
                $state = $_POST["state"];
            }
            $pattern = '/\d{5,9}/';
            if(preg_match($pattern,$_POST['zipcode']))
            {
                $zipcode = $_POST["zipcode"];
            }
        }
       
        $url = "home.html";
        #header("Location: $url");
    }
   
?>