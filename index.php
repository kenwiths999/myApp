<?php
require_once("inc/conn.php");
include('inc/Header-bar-login.php');
?>
<div class="row">
	<div class="leftcolumn">
		<?php
		// ?page=2 => $_GET['page']=3 
		if (!empty($_GET['page']))
		{
			$page = $_GET['page']-1;
		}
		else 
		{
			$page = 0;
		}



		$product_per_page=8;
		$offset = $product_per_page * $page;
		$sql = "SELECT * FROM product LIMIT $offset, $product_per_page";
		$result = mysqli_query($conn, $sql);


		if (mysqli_num_rows($result)>0)
		{
			while ($row = mysqli_fetch_assoc($result))
			{
		?>
			<div class="card card-left">
			<a href="single-product.php?id=<?php echo $row['ID']?>" class="product">
				<div class="title">
				<h2 class="product-title"><?php echo $row['Name'] ?></h2>
				</div>
				<div class="product-img">
					<img src="img/<?php echo $row['Picture'] ?>">
				</div>
				<p class="product-price">
					<?php echo $row['Price']."$"?>	
				</p>
			</a>
			</div>

		<?php
			}#end
		}

		?>
		   <?php include('inc/pagination.php');?>
	</div>
	<?php include('inc/rightcolumn.php'); ?>

</div>
	<?php include('inc/footer.php'); ?>