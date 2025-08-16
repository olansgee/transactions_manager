<?php
require_once('config.php');

 $con = mysqli_connect($host, $username, $password, $db);

if (mysqli_connect_errno()) {
	echo "Error: could not connect to database.Please try again later";
	exit;

}

?>
