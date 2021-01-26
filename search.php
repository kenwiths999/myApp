<?php
include ('inc/conn.php');
include ('inc/Header-bar-login.php');

$search = "";
if (!empty($_GET['search']))
{
	$search = $_GET['search'];
}
?>



<div class="row">
	<div class="leftcolumn">
		<h3 class="title" style="margin-left: 25px; color: white;"> Search: <?=$search?> </h3>
		<?php
		if (!empty($search))
		{
			$result = mysqli_query($conn, "SELECT * FROM product WHERE Name LIKE '%{$search}%'");
		
		while ( $row=mysqli_fetch_assoc($result))
		{
		?>
		<div class="card card-left">
		<a href="single-product.php?id=<?php echo $row['ID'] ?>" class="product">
				<h2 class="product-title"> <?php echo $row['Name'] ?> </h2>
				<div class="product-img">
				<img src="img/<?php echo $row['Picture'] ?>">  
				</div>
				<p class="product-price">
				<?php echo $row['Price']."$" ?>
				</p>
		</a>
		</div>


		<?php
		}
		}
		?>


	</div>
	<?php include ('inc/rightcolumn.php') ?>

</div>
<?php include ('inc/footer.php') ?>