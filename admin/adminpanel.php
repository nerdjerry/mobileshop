<?php 
	session_start();
	if($_SESSION['username']=='admin'){
?>

<html>
	<head>
		<title>Admin Panel</title>
	</head>
	<body>
		<table border="1px">
			<thead>
				<tr><th>Mobile ID</th><th>Mobile Name</th><th>Operaing System</th><th>Manufacturer</th>
					<th>Processor</th><th>Memory</th><th>Camera</th><th>Price</th>
					<th>Display Picture</th><th>Change Picture</th><th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php
					require_once '../database_config.php';
					$query = "select * from mobiles";
					$result = mysqli_query($connection,$query);
					while($device = mysqli_fetch_assoc($result)){?>
						<form action="update.php" method="post" enctype="multipart/form-data">
							<tr>
								<td><input type="text" readonly="" value="<?php echo $device['mobile_id'];?>" name="mobile_id"/></td>
								<td><input type="text" value="<?php echo $device['mobile_name']; ?>" name="mobile_name" /></td>
								<td><input type="text" value="<?php echo $device['os']; ?>" name="os" /></td>
								<td><input type="text" value="<?php echo $device['manufacturer']; ?>" name="manufacturer" /></td>
								<td><input type="text" value="<?php echo $device['processor']; ?>" name="processor" /></td>
								<td><input type="text" value="<?php echo $device['memory']; ?>" name="memory" /></td>
								<td><input type="text" value="<?php echo $device['camera']; ?>" name="camera" /></td>
								<td><input type="text" value="<?php echo $device['price']; ?>" name="price" /></td>
								<td><img src="<?php echo "../".$device['product_pic']; ?>" width="50px"/></td>
								<td><input type="file" value="" name="product_pic"/></td>
								<td><select name="status">
									<option value="<?php echo $device['status'];?>" selected='selected'><?php echo ucfirst($device['status']);?></option>
									<option value="live">Live</option>
									<option value="offline">Out of Stock</option>
									<option value="obselete">Obselete</option>
								</select></td>
								<td><input type="submit" name="update" value="Update"/></td>
							</tr>
						</form>
					<?php }
				?>
			</tbody>
			<tfoot>
				<form action="update.php" method="post" enctype="multipart/form-data">
					<tr>
						<td>Autofill</td>
						<td><input type="text" value="" name="mobile_name" /></td>
						<td><input type="text" value="" name="os" /></td>
						<td><input type="text" value="" name="manufacturer" /></td>
						<td><input type="text" value="" name="processor" /></td>
						<td><input type="text" value="" name="memory" /></td>
						<td><input type="text" value="" name="camera" /></td>
						<td><input type="text" value="" name="price" /></td>
						<td>Select a Picture</td>
						<td><input type="file" value="" name="product_pic"/></td>
						<td><select name="status">
							<option value="">--Select option--</optgroup>
							<option value="live">Live</option>
							<option value="offline">Out of Stock</option>
							<option value="obselete">Obselete</option>
						</select></td>
						<td><input type="submit" value="Add Device" name="add" /></td>
						
					</tr>
				</form>
			</tfoot>
		</table>
		<a href="logout.php">Logout</a>
	</body>
</html><?php }else{
	header('location:../index.php');
}
?>