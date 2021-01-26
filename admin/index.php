<?php 
include ("inc/conn.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['Delid']))
{
	$delete = $_GET['Delid'];
	$sql = "DELETE FROM product WHERE ID={$delete} limit 1";
	if (mysqli_query($conn, $sql))
	{
		echo "Deleted <br>".$delete;
	}
	else
	{
		echo "Fail".mysqli_error($conn);
	}
}
include ('inc/Header-bar-login.php');
include ('list.php');



?>
