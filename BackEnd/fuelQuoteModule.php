<?php



if(isset($_POST['gallons']))
{
   $gallons = $_POST["gallons"];
   $dDate = $_POST["dDate"];
   $fq = new fuelQuote;
   $fq->quote($gallons,$dDate);
}

if(isset($_POST['del_address']))
{
   echo("hello");
   $submitGallons2 = $_POST["submitGallons"];
   $del_address2 = $_POST["del_address"];
   $date2 = $_POST["dDate"];
   $ppg2 = $_POST["ppg"];
   $total2 = $_POST["total"];
   $fq2 = new fuelQuote;
   $fq2->submitF($submitGallons2, $del_address2, $date2, $ppg2, $total2);
}


class fuelQuote
{
   
   public function submitF($gallons, $del_address, $date, $ppg, $total)
   {
      $db = mysqli_connect('localhost', 'root', 'your_password', 'fuel_thing');
      if(!$db){
         die('Error connectinf to the sql server' . mysqli_connect_error());
      }
      session_start();
      $uname = $_SESSION['username'];
      $sql = "INSERT INTO fuelForm (gal_requested, del_address, client_username, del_date, price_per_gal, total_due)
                  VALUES ($gallons, '$del_address', '$uname', '$date', $ppg, $total)";
      $result = mysqli_query($db,$sql);
      if(!$result)
      {
         echo("confusion");
         die("Error description: " . $db -> error);
      }
      echo($result);
   }
   public function quote($gallons=NULL, $date=NULL)
   {
      $db = mysqli_connect('localhost', 'root', 'your_password', 'fuel_thing');
      if(!$db){
         die('Error connectinf to the sql server' . mysqli_connect_error());
      }
      if($gallons==NULL)
      {
         $gallons = $_POST['gallons'];
      }
      if($date==NULL)
      {
         $date = $_POST['dDate'];
         
      }
      if($gallons&&$date)
      {
         session_start();
         $uname = $_SESSION['username'];
         $ppg = $this->pricingModule($db,$uname,$gallons);
         $total = $gallons * $ppg;
         $sql = "SELECT address1 FROM ClientInformation WHERE username='$uname'";
         $result = mysqli_query($db,$sql);
         $row = $result->fetch_row();
         $del_address = $row[0];
         //$sql = "INSERT INTO fuelForm (gal_requested, del_address, client_username, del_date, price_per_gal, total_due)
                   //VALUES ($gallons, '$del_address', '$uname', '$date', $ppg, $total)";
         $obj[] = array 
          (  'del_address' => $del_address,
            'price_per_gallon' => $ppg,
            'total' => $total,
         );
         //if(!mysqli_query($db,$sql))
         //{
           // die("Error description: " . $db -> error);
        // }
         $url = "home.html";
         //header("Location: $url");           
      }
      echo json_encode(array 
      (  'del_address' => $del_address,
        'price_per_gallon' => $ppg,
        'total' => $total,
     ));
   }
   public function pricingModule($db,$username,$gallons):float
   {
      //$username = $_SESSION['username'];
      $sql = "SELECT * FROM fuelform WHERE client_username = '$username'";
      if(mysqli_query($db,$sql)){
         //echo("tesaaaat");
         $result = mysqli_query($db,$sql);
         if ($result->num_rows==0){
               $rateHistoryFactor = 0;
         }
         else{
               $rateHistoryFactor = 0.01;
         }
      }
      $sql = "SELECT * FROM ClientInformation WHERE username = '$username' and state = 'TX'";
      if(mysqli_query($db,$sql)){
         //echo("test");
         $result = mysqli_query($db,$sql);
         if ($result->num_rows==0){
               $locationFactor = 0.04;
         }
         else{
               $locationFactor = 0.02;
         }
      }
      if ($gallons > 1000){
         $gallonsRequestedFactor = 0.02;
      }
      else {
         $gallonsRequestedFactor = 0.03;
      }
      $companyProfitFactor = 0.1;
      $margin = 1.5 * ($locationFactor - $rateHistoryFactor + $gallonsRequestedFactor + $companyProfitFactor);
      return 1.5 + $margin;
    }
}

?>
