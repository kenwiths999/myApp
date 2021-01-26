<?php
session_start();
include("inc/conn.php");
include("inc/Header-bar-login.php");

if ( $_SERVER['REQUEST_METHOD'] == 'POST')
{
	$id = $_POST['ID'];
	if (empty( $_SESSION['cart'][$id]))
	{
		$q = mysqli_query( $conn, "SELECT * FROM product WHERE id={$id}");
		$product = mysqli_fetch_assoc($q);
		$_SESSION['cart'][$id] = $product;
		$_SESSION['cart'][$id]['number']=$_POST['number']; /*number lay tu single-product*/
	}
	else
	{
		$newnumber=$_SESSION['cart'][$id]['number'] + $_POST['number'];
		$_SESSION['cart'][$id]['number'] = $newnumber;
	}
}

?>


<div class="row">
	<div class="leftcolumn" style="text-align: center;">
		<h3 style="text-align: center; color: white; font-size: 50px;" class="title">Cart</h3>
		<?php
		if (!empty($_SESSION['cart']))
			foreach ($_SESSION['cart'] as $item):
		?>
		<div class="card card-left">
		<a href="single-product.php?id=<?php echo $item['id']?>" class="product">
			<h2 class="product-title"><?php echo $item['Name'] ?></h2>
			<div class="product-img">
				<img src="img/<?php echo $item['Picture'] ?>">
			</div>
			<p class="product-price"><?php echo $item['Price']."$" ?></p>
			<p class="number" style="color: white;">Quantity: <?php echo $item['number'] ?></p>
		</a>
		</div>
		<?php
	endforeach;
	else
		echo "No Product";
		?>
		<div id="total" class="clearfix">
			<?php
			$total = 0;
			foreach ($_SESSION['cart'] as $item) 
			{
			$total = $total + ($item['number'] * $item['Price']);	
			}
			?>
			<h3 style="color: white;">Total: <?php echo number_format($total) ?>$</h3>
		</div>
	</div>
	<?php include ('inc/rightcolumn.php') ?>
</div>
<?php include('inc/footer.php') ?>