<?php
	include_once 'header.php';
	require_once 'database_config.php';
	if(isset($_SESSION['username'])){
		$username=$_SESSION['username'];
		$sql="select * from cart where username='".$username."'";
		$result = mysqli_query($connection,$sql);
		show_cart($result,$connection);
	}
	elseif(isset($_COOKIE['session_id'])){
		$sessionid=$_COOKIE['session_id'];
		$sql="select * from cart where sessionid='".$sessionid."'";
		$result = mysqli_query($connection,$sql);
		show_cart($result,$connection);
	}
	else{
		echo "No product added to card";
	}
	function show_cart($result,$connection){
		$total_price=0;
		?>
		<div id="main">
			<div class="cl">&nbsp;</div>
			<div class="box cart">
			<table>
				<thead>
					<tr>
						<th class="photo"></th>
						<th>Mobile</th>
						<th>Unit Price</th>
						<th>Quantity</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						while($cartitem=mysqli_fetch_assoc($result)){
							$sql2="select * from mobiles where mobile_id='".$cartitem['deviceid']."'";
							$sql2_result=mysqli_query($connection,$sql2);
							$device=mysqli_fetch_assoc($sql2_result);?>
							<tr>
								  <td id="photo"><img src="<?php echo $device['product_pic'];?>" alt="No Preview Available" width="80px"/></td>
								  <td id="name"><p><?php echo $device['mobile_name'];?></p></td>
								  <td><p><?php echo $device['price']." INR";?></p></td>
								  <td id="price"><p><?php echo $cartitem['quantity'];?></p></td>					
							</tr>
					<?php
							$total_price+=$device['price']*$cartitem['quantity'];
					}?>
				</tbody>
				<tfoot>
					<tr>
						<td></td>
						<td></td>
						<td id="total_price"><p><?php echo $total_price." INR";?></p></td>
						<td></td>
					</tr>
				</tfoot>
			</table>
			</div>
			<div class="cl">&nbsp;</div>
		</div>
	<?php }
	include_once 'footer.html';
?>
