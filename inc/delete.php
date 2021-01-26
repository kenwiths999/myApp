<?php
$server= "localhost";
$user= "root";
$pass= "";
$db= "sell-book";
$conn = mysqli_connect($server, $user, $pass, $db);

#Neu ko ket noi dc se~ Error
if ( !$conn) 
	{ die("Error conntected" .mysqli_connect_error()); }

#xoa san pham

$sql = "DELETE FROM product WHERE ID=1";
if (mysqli_query($conn, $sql))
{
	echo "Deleted<br>";
}
else 
{ 
	echo "Error" .mysqli_error($conn);
}
mysqli_close($conn);
