<?php
    
    class eProfile{
        public function isCreated($username, $db):bool{
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
        public function profile($name = NULL, $address1 = NULL, $address2 = NULL, $city = NULL, $state = NULL, $zipcode = NULL){
            $db = mysqli_connect('localhost', 'root', 'your_password', 'fuel_thing');
            if(!$db){
                die('Error connectinf to the sql server' . mysqli_connect_error());
            }
            if($name == NULL && strlen($_POST['name']) <= 50){
                $name = $_POST['name'];
            }
            else{die('name');}
            if($address1 == NULL && strlen($_POST['address1']) <= 100){
                $address1 = $_POST['address1'];
            }
            else{die('address1');}
            if($address2 == NULL && isset($_POST['address2']) && strlen($_POST['address2']) <= 100){
                $address2 = $_POST['address2'];
            }
            if($city == NULL && strlen($_POST['city']) <= 100){
                $city = $_POST['city'];
            }
            else{die('city');}
            if($state == NULL && ctype_alpha($_POST['state'])){
                $state = $_POST['state'];
            }
            else{die($_POST['state']);}
            $pattern = '/\d{5,9}/';
            if($zipcode == NULL && preg_match($pattern,$_POST['zipcode'])){
                $zipcode = $_POST['zipcode'];
            }
            else{die('zipcode');}
            if($name && $address1 && $city && $state && $zipcode){
                session_start();
                $uname = $_SESSION['username'];
                
                if($this->isCreated($uname, $db)){
                    
                    $sql = "UPDATE clientInformation 
                    SET client_name = '$name', address1 = '$address1', address2 = '$address2', city = '$city', state ='$state', zipcode = $zipcode
                    WHERE username = '$uname'";
                    mysqli_query($db,$sql);
                    $url = "home.html";
                    header("Location: $url");
                }
                else{
                    $sql = "INSERT INTO clientInformation (client_name, address1, address2, city, state, zipcode, username)
                    VALUES ('$name', '$address1', '$address2', '$city', '$state', $zipcode, '$uname')";
                    if(!mysqli_query($db,$sql))
                    {
                        die("Error description: " . $db -> error);
		    }
                    $url = "home.html";
                    header("Location: $url");
                }
            }
            
            
        }
        
    }

       
        
    
   
?>
