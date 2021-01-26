<div class="list">
<div id="main">
	<table>
		<thead>
			<th>ID</th>
			<th>Image</th>
			<th>Name</th>
			<th>Price</th>
			<th>Content</th>
			<th>Update</th>
			<th>Delete</th>
		</thead>
		<tbody>
			<?php
			$query = "SELECT * FROM product";
			$rs = mysqli_query($conn, $query);
			if (mysqli_num_rows($rs)>0)
			{
				while ($row = mysqli_fetch_assoc($rs))
				{
			?>
				<tr>
					<td style="text-align: center;"><?= $row['ID'] ?></td>
					<td style="padding: 10px;"><img class="Picture-admin" src="../img/<?= $row['Picture'] ?>"></td>
					<td style="text-align: center;"><?= $row['Name'] ?></td>
					<td style="text-align: center;"><?= $row['Price']."$" ?></td>
					<td style="padding: 15px;"><?= $row['Content'] ?></td>
					<td style="text-align: center;"><a href="updateproduct.php?id=<?= $row['ID'] ?>">Update</a></td>
					<td style="text-align: center;"><a href="?Delid=<?=$row['ID']?>">Delete</a></td>

				</tr>

			<?php		
				}
			}
			?>

		</tbody>

	</table>

</div>
</div>