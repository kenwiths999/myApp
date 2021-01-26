<?php
$server= "localhost";
$user= "root";
$pass= "";
$db= "sell-book";
$conn = mysqli_connect($server, $user, $pass, $db);

#Neu ko ket noi dc se~ Error
if ( !$conn) 
	{ die("Error conntected" .mysqli_connect_error()); }