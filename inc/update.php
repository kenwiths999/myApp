<?php
$server= "localhost";
$user= "root";
$pass= "";
$db= "sell-book";
$conn = mysqli_connect($server, $user, $pass, $db);

#Neu ko ket noi dc se~ Error
if ( !$conn) 
	{ die("Error conntected" .mysqli_connect_error()); }

#Reqair, Cap nhat thong tin cua ID do' thanh` cai' khac'
$sql = "UPDATE product SET Name='The Future' WHERE ID=1";
if (mysqli_query($conn, $sql))
{
	echo "Repaired";
}
else
{
	echo "error" .mysqli_error($conn);
}

mysqli_close($conn);
