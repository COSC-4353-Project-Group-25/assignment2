<?php
class fqh
{
    public function table()
    {
        session_start();
        $username = $_SESSION['username'];
        $db = mysqli_connect('localhost','root','your_password','fuel_thing');
        $sql = "SELECT gal_requested, del_address, del_date, price_per_gal, total_due FROM fuelform WHERE client_username = '$username'";
        if(mysqli_query($db,$sql)){
            $result = mysqli_query($db,$sql);
            while($row = $result->fetch_row())
            {
                echo "
                <tr>
                    <td>$row[0]</td>
                    <td>$row[1]</td>
                    <td>$row[2]</td>
                    <td>$row[3]</td>
                    <td>$row[4]</td>
                </tr>";
            }
        }
        else
        {
            die('fail');
        }
    }
}

?>