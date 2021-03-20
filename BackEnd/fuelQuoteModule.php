<?php

if(isset($_POST['submit'])){
   $address = "654 sgsjjhhhkd Denton, Tx 75068";
   $suggested_price = "5 dollars per gallon";
   $due = "45 dollars";

   $file = fopen("test.txt", "w");
      if($file == false){
         echo ("wrong bitch");
         exit();
      }
      fwrite($file, $_POST['gallons']);
      fwrite($file, "\n");
      fwrite($file, "$address");
      fwrite($file, "\n");
      fwrite($file, $_POST['dDate']);
      fwrite($file, "\n");
      fwrite($file, "$suggested_price");
      fwrite($file, "\n");
      fwrite($file, "$due");
      fwrite($file, "\n");
      
   
   fclose($file);
}

?>
