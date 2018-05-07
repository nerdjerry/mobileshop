<?php 
	include_once 'header.php';
	require_once 'database_config.php';
	$did = isset($_GET['did'])?$_GET['did']:1;
	$sql="select * from mobiles where mobile_id='".$did."'";
	$result=mysqli_query($connection,$sql) or die("Querry Error in displaying device");
	if(mysqli_num_rows($result)==1){
		$device=mysqli_fetch_assoc($result);
	}
	
?>
	<div id="main">
		<div class="cl">&nbsp;</div>
		<div class="box device">
			<div id="image">
				<img src="<?php echo $device['product_pic'];?>" alt="NO PREVIEW AVAILABLE"/>
				<h1><?php echo $device['price'].' INR';?></h1>
				<a href="addtocart.php?did=<?php echo $device['mobile_id'];?>"><div id="button"><p>ADD TO CART</p></div></a>
			</div>
			<div id="specification">
				<ul class="details">
					<li>
						<label>Device Name:</label>
						<p><?php echo $device['mobile_name'];?></p>
					</li>
					<li>
						<label>Operating System:</label>
						<p><?php echo $device['os'];?></p>
					</li>
					<li>
						<label>Manufacturer:</label>
						<p><?php echo $device['manufacturer'];?></p>
					</li>
					<li>
						<label>Processor:</label>
						<p><?php echo $device['processor'];?></p>
					</li>
					<li>
						<label>Memory:</label>
						<p><?php echo $device['memory']." GB";?></p>
					</li>
					<li>
						<label>Camera:</label>
						<p><?php echo $device['camera']." MP";?></p>
					</li>
				</ul>
			</div>
		</div>
		<div class="cl">&nbsp;</div>
	</div>
<?php
	include_once 'footer.html';
?>