<?php
$server= "localhost";
$user= "root";
$pass= "";
$db= "sell-book";
$conn = mysqli_connect($server, $user, $pass, $db);

#Neu ko ket noi dc se~ Error
if ( !$conn) 
	{ die("Error conntected" .mysqli_connect_error()); }

#lay san pham

$sql= "SELECT ID, Name, Content, Price FROM product";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) >0)
	{
		while ($row = mysqli_fetch_assoc($result)) 
		{
			echo "ID: ".$row["ID"]. "<br>Name: " .$row["Name"]. "<br>Content: " .$row["Content"]. "<br>Price: " .$row["Price"]. "<br>";

		} 
	}
else { echo "No product";}
mysqli_close($conn);
?>
