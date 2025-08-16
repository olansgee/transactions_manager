<?php
$host = "localhost";
$username = "olansgee_olansgee";
$password = "#,Adewunmi16!";
$db = "olansgee_transaction_management";


 $con = mysqli_connect($host, $username, $password, $db);

if (mysqli_connect_errno()) {
	echo "Error: could not connect to database.Please try again later";
	exit;

}


?>
