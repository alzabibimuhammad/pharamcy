<?php

$servername = "localhost";
$username = "root";
$password = "";
// Create connection
$conne = mysqli_connect($servername, $username, $password,'Pharmacy') ;
// Check connection

if ($conne==false) {
die("Connection failed: ");

}

?>