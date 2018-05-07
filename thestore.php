<?php 
	include_once 'header.php';
	include_once 'main_head.html';
?>
	<!--Main Section-->
	<?php
		require_once 'database_config.php';
		$brand=isset($_GET['brand'])?$_GET['brand']:'%';
		$start_price = !isset($_POST['start_price']) || $_POST['start_price']==''?5000:$_POST['start_price'];
		$end_price = !isset($_POST['end_price']) || $_POST['end_price']==''?60000:$_POST['end_price'];
		if(isset($_POST['os']) && $_POST['os']!=''){$os=$_POST['os'];}
		elseif(isset($_GET['os'])){$os=$_GET['os'];}
		else{$os='%';}
		$keyword=isset($_POST['keyword'])?ucfirst(strtolower($_POST['keyword'])):'';
		$sql="select * from mobiles where mobile_name like '%".$keyword."%' and os like '".$os."' and status='live' and manufacturer like '".$brand."' and price between ".$start_price." and ".$end_price." ";
		$result = mysqli_query($connection,$sql) or die("Querry Error in searching mobile");
		if(mysqli_num_rows($result)>0){		
	?>
	<div class="section box">
		 <div class="products">
        <div class="cl">&nbsp;</div>
        <ul>
        	<?php while($device = mysqli_fetch_assoc($result)){?>
          <li style="width:200px"> <a href="thedevice.php?did=<?php echo $device['mobile_id'];?>"><img src="<?php echo $device['product_pic'];?>" alt="" /></a>
            <div class="product-info">
              <h3><?php echo $device['mobile_name'];?></h3>
              <div class="product-desc">
                <h4><?php echo $device['os'];?></h4>
                <p>Lorem ipsum dolor sit<br />
                  amet</p>
                <strong class="price"><?php echo $device['price']."INR";?></strong> </div>
            </div>
          </li>
          <?php } ?>
        </ul>
        <div class="cl">&nbsp;</div>
      </div>
	</div>
<?php
	}else{
		echo "NO PHONE HERE";
	}
	include_once 'main_footer.html';
	include_once 'footer.html';
?>
