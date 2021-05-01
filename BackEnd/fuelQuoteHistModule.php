<?php
$file = fopen("test.txt", "r") or die("Unable to open file!");
while(feof($file) == false){
    echo fgets($file) . "<br>";
}
fclose($file);
?>
