<?php
    session_start();
    class eProfile{
        public function profile($name = NULL, $address1 = NULL, $address2 = NULL, $city = NULL, $state = NULL, $zipcode = NULL){
            $db = mysqli_connect('localhost', 'root', 'your_password', 'fuel_thing');
            if(!$db){
                die('Error connectinf to the sql server' . mysqli_connect_error());
            }
            if($name == NULL && ctype_alpha($_POST['name']) && strlen($_POST['name']) <= 50){
                $name = $_POST['name'];
            }
            if($address1 == NULL && strlen($_POST['address1']) <= 100){
                $address1 = $_POST['address1'];
            }
            if($address2 == NULL && isset($_POST['address2']) && strlen($_POST['address2']) <= 100){
                $address2 = $_POST['address2'];
            }
            if($city == NULL && ctype_alpha($_POST['city']) && strlen($_POST['city']) <= 100){
                $city = $_POST['city'];
            }
            if($state == NULL && ctype_alpha($_POST['state']) && strlen($_POST['name']) == 2){
                $state = $_POST['state'];
            }
            $pattern = '/\d{5,9}/';
            if($zipcode == NULL && preg_match($pattern,$_POST['zipcode'])){
                $zipcode = $_POST['zipcode'];
            }

            if($name && $address1 && $city && $state && $zipcode){
                if(isCreated($_SESSION['username'], $db)){
                    $sql = "UPDATE clientInformation 
                    SET client_name = '$name', address1 = '$address1', address2 = '$address2', city = '$city', state ='$state', zipcode = $zipcode, username = '$_SESSION['username']'
                    WHERE username = '$username'";
                }
                else{
                    $sql = "INSERT INTO clientInformation (client_name, address1, address2, city, state, zipcode)
                    VALUES ('$name', '$adddress1', '$address2', '$city', '$state', $zipcode)";
                }
            }
            
            $url = "home.html";
            header("Location: $url");
        }
        public function isCreated($username, $db){
            if($username){
                $sql = "SELECT * FROM clientInformation WHERE username = '$username'";
                if(mysqli_query($db,$sql)){
                    $result = mysqli_query($db,$sql);
                    if($result->num_rows == 0){
                        return false;
                    }
                    else{
                        return true;
                    }
                }
            }
        }
    }

       
        
    
   
?>
