<?php 
include( "../inc/conn.php" );


if(   $_SERVER['REQUEST_METHOD'] == 'POST' ){

	$id = $_GET['id'];
	$tensp = $_POST['tensp'];
	$giasp= $_POST['giasp'];
	$mota = $_POST['mota'];

	$file = $_FILES['anhsp']; // 1 mang chua thong tin file da upload  

	//chỉ update file nếu người dùng có chọn file upload.

	if( !empty( $file ) ){
		$tenFile = rand() . $file['name']; //asdasd232anh.jpg cho hai file trong thu muc khong bi trung=>ten file luu trong server
		if( move_uploaded_file($file['tmp_name'], "../img/" . $tenFile ) ){

			$sql = "UPDATE product SET Picture=? WHERE ID=? "; //php prepare statement
			$stmt = mysqli_prepare($conn ,$sql);
			mysqli_stmt_bind_param( $stmt, "sd" , $tenFile, $id );
			mysqli_stmt_execute($stmt);
			echo "File is updated <br/>";

		}
		else{
			echo " Error Upload File! <br> ";
		}	
	}
	


	// $anh = $_POST['anhsp'];
	//$q = "UPDATE product SET tieude =  , noidung = $noidung , anh ='{$anh}' "; //gay co kha nang loi sql injection + gay kho viet 
	// mysqli_query($conn , $q);


	$sql = "UPDATE product SET Name=?, Content=?, Price=?  WHERE ID=? "; //php prepare statement
	$stmt = mysqli_prepare($conn ,$sql);
	mysqli_stmt_bind_param( $stmt, "ssdd" , $tensp, $mota, $giasp, $id );

	//s = string 
	// d = double 
	// i = integer
	if( mysqli_stmt_execute($stmt) ) {
		echo "đã cập nhật sản phẩm thành công! ";
	}else{
		echo "Lõi : " . mysqli_error($conn);//ham lay loi gan nhat cua connection sinh ra
	}


}// POST 

//lay id san pham 


$id = $_GET['id'];
$sql = mysqli_query( $conn , "SELECT * FROM product WHERE ID={$id}" );
$row =  mysqli_fetch_assoc($sql);
include ("inc/Header-bar-login.php");
?>
<div class="list" style="border: 1px solid black; margin-top: 10px; margin-left:50px; width: 90%; margin-bottom: 20px;">
	<h2> Update: <?= $row['Name'] ?> </h2>

	<!-- phai co ectype="multipart/form-data" thi moi upload dc file len server  -->
	<form class="form" method="post" enctype="multipart/form-data">
	  <label>Name </label>
		<input type="text" name="tensp" value="<?= $row['Name'] ?>"/>
		<label>Price</label>
		<input type="number" name="giasp" value="<?= $row['Price'] ?>">

		<label>Content</label>
		<textarea name="mota"><?= $row['Content']?></textarea>
		<label style="margin-bottom: 5px;">Picture</label><br>
		<img class="anhsp" src="../img/<?= $row['Picture']?>" style="float: none">
	    <br><input type="file" name="anhsp" >
		<input type="submit" name="submit" value="Update">
	</form>
</div>