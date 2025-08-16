<?php
$file = fopen("HotelDetails.php","r");
echo file_get_contents("HotelDetails.php") ;
fclose($file);
?>
