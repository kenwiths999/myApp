<?php
$server= "localhost";
$user= "root";
$pass= "";
$db= "sell-book";
$conn = mysqli_connect($server, $user, $pass, $db);

#Neu ko ket noi dc se~ Error
if ( !$conn) 
	{ die("Error conntected" .mysqli_connect_error()); }

#Added
$sql = "INSERT INTO product (ID, Name, Content, Picture, Price) VALUES ('2', 'Curious', 'Book-Book', 'book2.jpg', '5500')";
if (mysqli_query($conn, $sql))
{
	echo "Added";
} 
else 
{
	echo "Error" .mysqli_error($conn);
}

mysqli_close($conn);
?>
