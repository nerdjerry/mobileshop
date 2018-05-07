<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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