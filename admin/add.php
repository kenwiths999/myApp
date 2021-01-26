<?php
include ("../inc/conn.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$tensp = $_POST['tensp'];
	$mota = $_POST['noidung'];
	$giasp = $_POST['giasp'];
	$sql = "INSERT INTO product(Name, Content, Price) VALUES (?, ?, ?)";
	$stmt = mysqli_prepare($conn, $sql);
	mysqli_stmt_bind_param($stmt, "ssd", $tensp, $mota, $giasp);


	if (mysqli_stmt_execute($stmt))
	{
		echo "Success";
	}
	else
	{
		echo "Fail";
	}
}
include ("inc/Header-bar-login.php");

?>
<div class="list" style="border: 1px solid black; margin-top: 20px">
<form class="form" method="POST">
	<label>Name</label>
	<input type="text" name="tensp">
	<label>Price</label>
	<input type="number" name="giasp">
	<label>Content</label>
	<textarea name="noidung"></textarea>
	<!--<label>Picture</label>
	<input type="file" name="anhsp">-->
	<input type="submit" name="submit" value="Add" style="margin-top: 20px">
	
</form>
</div>
