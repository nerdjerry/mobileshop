<html>
<head>
<title>Mobile Shop</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Droid+Serif:700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/myown.css" type="text/css" media="all" />
<!--[if lte IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->
<script src="js/jquery-1.4.1.min.js" type="text/javascript"></script>
<script src="js/jquery.jcarousel.pack.js" type="text/javascript"></script>
<script src="js/jquery-func.js" type="text/javascript"></script>
</head>
<body>
<!-- Shell -->
<div class="shell">
  <!-- Header -->
  <div id="header">
    <h1 id="logo"><a href="index.php">Mobile Shop</a></h1>
    <!-- Cart -->
    <div id="cart"> <a href="cart.php" class="cart-link">Your Shopping Cart</a>
      <div class="cl">&nbsp;</div>
      <?php $articles=isset($_COOKIE['cart_number'])?$_COOKIE['cart_number']:0; ?>
      <span>Articles: <strong><?php echo $articles;?></strong></span> &nbsp;&nbsp; <!--<span>Cost: <strong>$250.99</strong></span>--> </div>
    <!-- End Cart -->
    <!-- Navigation -->
    <div id="navigation">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="thestore.php">The Store</a></li>
        <?php 
        	session_start();
			require_once 'database_config.php';
			$username=isset($_SESSION['username'])?$_SESSION['username']:'';
			$sql="select first_name from users where username='".$username."'";
			$result=mysqli_query($connection,$sql) or die("Error getting username");
			$user=mysqli_fetch_assoc($result);
			$name=$user['first_name'];
			$log=isset($_SESSION['username'])?"Logout":"Login";
			if($log=="Login"){
				echo "<li><a href=\"myaccount.php\">$log</a></li>";
			}else{
				echo "<li><a href=\"logout.php\">$log</a></li>
					<li><a href=\"#\">Howdy,$name</a></li>";
			}
			
		?>	
      </ul>
    </div>
    <!-- End Navigation -->
  </div>
  <!-- End Header -->
  <!-- Main -->
  <div id="main">
    <div class="cl">&nbsp;</div>
    <!-- Content -->
    <div id="content">
      <!-- Content Slider -->
      <div id="slider" class="box">
        <div id="slider-holder">
          <ul>
            <li><a href="thestore.php"><img src="css/images/phone1.png" alt="" width="378px" height="252px" /></a></li>
            <li><a href="thestore.php?brand=apple"><img src="css/images/phone2.png" alt="" width="378px" height="252px" /></a></li>
            <li><a href="thestore.php?os=android"><img src="css/images/phone3.png" alt="" width="378px" height="252px" /></a></li>
            <li><a href="thestore.php?brand=htc"><img src="css/images/phone4.png" alt="" width="378px" height="252px" /></a></li>
          </ul>
        </div>
        <div id="slider-nav"> <a href="#" class="active">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> </div>
      </div>
      <!-- End Content Slider -->
      <!-- Products -->
      <?php
      	require_once 'database_config.php';
      	$sql = "select * from mobiles where status='live' order by modified desc limit 3";
		$result = mysqli_query($connection,$sql) or die("Querry error!");
		$device1 = mysqli_fetch_assoc($result);
      	?>
      <div class="products">
        <div class="cl">&nbsp;</div>
        <ul>
          <li style="width:200px"> <a href="thedevice.php?did=<?php echo $device1['mobile_id'];?>"><img src="<?php echo $device1['product_pic'];?>" alt="" /></a>
            <div class="product-info">
              <h3><?php echo strtoupper($device1['mobile_name']);?></h3>
              <div class="product-desc">
                <h4><?php echo strtoupper($device1['os']);?></h4>
                <p>Lorem ipsum dolor sit<br />
                  amet</p>
                <strong class="price"><?php echo strtoupper($device1['price'].'inr');?></strong> </div>
            </div>
          </li>
          <?php $device2 = mysqli_fetch_assoc($result);?>
          <li style="width:200px"><a href="thedevice.php?did=<?php echo $device2['mobile_id'];?>"><img src="<?php echo $device2['product_pic'];?>" alt="" /></a>
            <div class="product-info">
              <h3><?php echo strtoupper($device2['mobile_name']);?></h3>
              <div class="product-desc">
                <h4><?php echo strtoupper($device2['os']);?></h4>
                <p>Lorem ipsum dolor sit<br />
                  amet</p>
                <strong class="price"><?php echo strtoupper($device2['price'].'inr');?></strong> </div>
            </div>
          </li>
          <?php $device3 = mysqli_fetch_assoc($result);?>
            <li style="width:200px"><a href="thedevice.php?did=<?php echo $device3['mobile_id'];?>"><img src="<?php echo $device3['product_pic'];?>" alt="" /></a>
            <div class="product-info">
              <h3><?php echo strtoupper($device3['mobile_name']);?></h3>
              <div class="product-desc">
                <h4><?php echo strtoupper($device3['os']);?></h4>
                <p>Lorem ipsum dolor sit<br />
                  amet</p>
                <strong class="price"><?php echo strtoupper($device3['price'].'inr');?></strong> </div>
            </div>
          </li>
        </ul>
        <div class="cl">&nbsp;</div>
      </div>
      <!-- End Products -->
    </div>
    <!-- End Content -->
    <!-- Sidebar -->
    <div id="sidebar">
      <!-- Search -->
      <div class="box search">
        <h2>Search by <span></span></h2>
        <div class="box-content">
          <form action="thestore.php" method="post">
            <label>Mobile Name</label>
            <input type="text" class="field" name="keyword"/>
            <label>Operating System</label>
            <select class="field" name="os">
              <option value="">-- Select Category --</option>
              <option value="Android">Android</option>
              <option value="iOS">iOS</option>
              <option value="Windows">Windows</option>
            </select>
            <div class="inline-field">
              <label>Price</label>
              <select class="field small-field" name="start_price">
              	<option value="">--Select one--</option>
                <option value="5000">5,000INR</option>
                <option value="10000">10,000INR</option>
                <option value="15000">15,000INR</option>
                <option value="20000">20,000INR</option>
                <option value="30000">30,000INR</option>
                <option value="40000">40,000INR</option>
                <option value="50000">50,000INR</option>
              </select>
              <label>to:</label>
              <select class="field small-field" name="end_price">
              	<option value="">--Select one--</option>
                <option value="10000">10,000INR</option>
                <option value="15000">15,000INR</option>
                <option value="20000">20,000INR</option>
                <option value="30000">30,000INR</option>
                <option value="40000">40,000INR</option>
                <option value="50000">50,000INR</option>
                <option value="60000">60,000INR</option>
              </select>
            </div>
            <input type="submit" class="search-submit" value="Search" />
            <p> <a href="thestore.php" class="bul">All Devices</a><br />
              <a href="#" class="bul">Contact Customer Support</a> </p>
          </form>
        </div>
      </div>
      <!-- End Search -->
      <!-- Categories -->
      <div class="box categories">
        <h2>Brand<span></span></h2>
        <div class="box-content">
          <ul>
            <li><a href="thestore.php?brand=apple">Apple</a></li>
            <li><a href="thestore.php?brand=motorola">Motorola</a></li>
            <li><a href="thestore.php?brand=samsung">Samsung</a></li>
            <li><a href="thestore.php?brand=htc">HTC</a></li>
            <li><a href="thestore.php?brand=lg">LG</a></li>
            <li><a href="thestore.php?brand=sony">Sony</a></li>
            <li><a href="thestore.php?brand=blackberry">Blackberry</a></li>
            <li class="last"><a href="#">Micromax</a></li>
          </ul>
        </div>
      </div>
      <!-- End Categories -->
    </div>
    <!-- End Sidebar -->
    <div class="cl">&nbsp;</div>
  </div>
  <!-- End Main -->
  <!-- Side Full -->
  <div class="side-full">
    <!-- More Products -->
    <div class="more-products">
      <div class="more-products-holder">
        <ul>
          <li><a href="#"><img src="css/images/motoe.png" alt="" width="47px" height="94px"/></a></li>
          <li><a href="#"><img src="css/images/nexus5.png" alt="" width="47px" height="94px"/></a></li>
          <li><a href="#"><img src="css/images/iphone4.png" alt="" width="47px" height="94px"/></a></li>
          <li><a href="#"><img src="css/images/motog.png" alt="" width="47px" height="94px"/></a></li>
          <li><a href="#"><img src="css/images/lumia630.png" alt="" width="47px" height="94px"/></a></li>
          <li><a href="#"><img src="css/images/motox.png" alt="" width="47px" height="94px"/></a></li>
          <li><a href="#"><img src="css/images/iphone5s.png" alt="" width="47px" height="94px"/></a></li>
          <li><a href="#"><img src="css/images/galaxys4.png" alt="" width="47px" height="94px"/></a></li>
         <li><a href="#"><img src="css/images/motoe.png" alt="" width="47px" height="94px"/></a></li>
          <li><a href="#"><img src="css/images/nexus5.png" alt="" width="47px" height="94px"/></a></li>
          <li><a href="#"><img src="css/images/iphone4.png" alt="" width="47px" height="94px"/></a></li>
          <li><a href="#"><img src="css/images/motog.png" alt="" width="47px" height="94px"/></a></li>
          <li><a href="#"><img src="css/images/lumia630.png" alt="" width="47px" height="94px"/></a></li>
          <li><a href="#"><img src="css/images/motox.png" alt="" width="47px" height="94px"/></a></li>
          <li><a href="#"><img src="css/images/iphone5s.png" alt="" width="47px" height="94px"/></a></li>
          <li><a href="#"><img src="css/images/galaxys4.png" alt="" width="47px" height="94px"/></a></li>
          <li><a href="#"><img src="css/images/motox.png" alt="" width="47px" height="94px"/></a></li>
          <li><a href="#"><img src="css/images/motoe.png" alt="" width="47px" height="94px"/></a></li>
          <li><a href="#"><img src="css/images/nexus5.png" alt="" width="47px" height="94px"/></a></li>
          <li><a href="#"><img src="css/images/iphone4.png" alt="" width="47px" height="94px"/></a></li>
          <li class="last"><a href="#"><img src="css/images/motox.png" alt="" width="47px" height="94px"/></a></li>
        </ul>
      </div>
      <div class="more-nav"> <a href="#" class="prev">previous</a> <a href="#" class="next">next</a> </div>
    </div>
    <!-- End More Products -->
    <!-- Text Cols -->
    <div class="cols">
      <div class="cl">&nbsp;</div>
      <div class="col">
        <h3 class="ico ico1">Donec imperdiet</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec imperdiet, metus ac cursus auctor, arcu felis ornare dui.</p>
        <p class="more"><a href="#" class="bul">Lorem ipsum</a></p>
      </div>
      <div class="col">
        <h3 class="ico ico2">Donec imperdiet</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec imperdiet, metus ac cursus auctor, arcu felis ornare dui.</p>
        <p class="more"><a href="#" class="bul">Lorem ipsum</a></p>
      </div>
      <div class="col">
        <h3 class="ico ico3">Donec imperdiet</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec imperdiet, metus ac cursus auctor, arcu felis ornare dui.</p>
        <p class="more"><a href="#" class="bul">Lorem ipsum</a></p>
      </div>
      <div class="col col-last">
        <h3 class="ico ico4">Donec imperdiet</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec imperdiet, metus ac cursus auctor, arcu felis ornare dui.</p>
        <p class="more"><a href="#" class="bul">Lorem ipsum</a></p>
      </div>
      <div class="cl">&nbsp;</div>
    </div>
    <!-- End Text Cols -->
  </div>
  <!-- End Side Full -->
  <!-- Footer -->
  <div id="footer">
    <p class="left"> <a href="#">Home</a> <span>|</span> <a href="#">Support</a> <span>|</span> <a href="myaccount.php">My Account</a> <span>|</span> <a href="thestore.php">The Store</a> <span>|</span> <a href="#">Contact</a> </p>
    <p class="right"> &copy; 2010 Shop Around.</p>
  </div>
  <!-- End Footer -->
</div>
<!-- End Shell -->
</body>
</html>
