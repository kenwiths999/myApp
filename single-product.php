<?php
session_start();
include('inc/conn.php');
include('inc/Header-bar-login.php')
?>

<div class="row">
	<div class="leftcolumn">
		<?php
		$id = $_GET['id'];
		$sql = "SELECT * FROM product WHERE id = {$id}";
		$rs = mysqli_query($conn, $sql);
		while ($row = mysqli_fetch_assoc($rs))
		{
		?>
			<div class="single-product">
				<h2 class="product-title" style="font-size: 35px;"> 
					<?php echo $row['Name'] ?> 
				</h2>
				<div class="product-img">
				<img src="img/<?php echo $row['Picture'] ?>" style="width: 28%; max-height: 350px;">  
				</div>
				<p class="product-price">
					<?php echo $row['Price']."$" ?>
				</p>
				<br>
				<form method="POST" action="cart.php" style="color: white;">
					Quantity: <input type="number" name="number" value="1" style="border: 1px solid white; border-radius: 8px;">
					<input type="hidden" name="ID" value="<?= $id ?>">
					<button type="submit" class="button-buy" style="border: 1px solid white; border-radius: 8px;">
						Buy
					</button>
				</form>
				<div class="product-content" style="color: white; float: left; padding: 15px; text-align: left;">
					<h3> Product Information: </h3>
					<div style="border: 2px solid white; border-radius: 8px; padding: 10px; font-size: 20px;">
					<?php echo $row['Content'] ?>
					</div>
				</div>
			</div>




		<?php
		}
		?>

	</div>
	<?php include('inc/rightcolumn.php'); ?>
</div>
<?php include('inc/footer.php'); ?>