	<div class="rightcolumn">
		<h2 style="font-size: 30px; font-family: cursive; font-weight: bold; text-align: center; animation-name: hot; animation-duration: 4s; position: relative; animation-iteration-count: infinite; animation-direction: alternate-reverse;">Hot</h2>
		<?php
		$sql= "SELECT ID, Name, Content, Picture, Price FROM special";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) >0)
		{
		while ($row = mysqli_fetch_assoc($result)) 
		{
		?>
		<div class="card card-right">
			<a href="single-product.php?id=<?php echo $row['ID']?>" class="product">
				<div class="product-img">
				<img src="img/<?php echo $row['Picture'] ?>">  
				</div>
				<div class="title">
				<h2 class="product-title"><?php echo $row['Name'] ?></h2>
				</div>
			</a>
		</div>
		<?php
		}
		}
		?>	
	</div>