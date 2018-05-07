<?php
	session_start();
	require_once 'database_config.php';
	$did=isset($_GET['did'])?$_GET['did']:'';
	$quantity=1;
	if(isset($_SESSION['username'])){
		$username=$_SESSION['username'];
		$sessionid=session_id();
		$sql="select quantity from cart where username='".$username."' and deviceid='".$did."'";
		$result=mysqli_query($connection,$sql) or die("Error retrieving deviceids");
		$qty_db=mysqli_fetch_assoc($result);
		if($qty_db>0){
			$quantity=1+$qty_db['quantity'];
			$sql="update cart set quantity='".$quantity."',modified=now() where deviceid='".$did."' and username='".$username."'";
		}else{
			$sql="insert into cart values('".$sessionid."','".$username."','".$did."','".$quantity."',now(),now())";
		}
			mysqli_query($connection,$sql) or die("Error entering into table");
		$sum="select sum(quantity) as cart_value from cart where username='".$username."'";
		$result=mysqli_query($connection,$sum) or die("Error calculating sum");
		$cart=mysqli_fetch_assoc($result);
		$cart_value=$cart['cart_value'];
	}
	else{
		if(!isset($_COOKIE['session_id'])){
			$sessionid=session_id();
			$sql="select quantity from cart where sessionid='".$sessionid."' and deviceid='".$did."'";
			$result=mysqli_query($connection,$sql) or die("Error retrieving deviceids");
			$qty_db=mysqli_fetch_assoc($result);
			if($qty_db>0){
				$quantity=1+$qty_db['quantity'];
				$sql="update cart set quantity='".$quantity."',modified=now()  where deviceid='".$did."' and sessionid='".$sessionid."'";
			}else{
				$sql="insert into cart values('".$sessionid."','','".$did."','".$quantity."',now(),now())";
			}
			mysqli_query($connection,$sql) or die("Error entering into table");
			$sum="select sum(quantity) as cart_value from cart where sessionid='".$sessionid."'";
			$result=mysqli_query($connection,$sum) or die("Error calculating sum");
			$cart=mysqli_fetch_assoc($result);
			$cart_value=$cart['cart_value'];
		}else{
			$sessionid=$_COOKIE['session_id'];
			$sql="select quantity from cart where sessionid='".$sessionid."' and deviceid='".$did."'";
			$result=mysqli_query($connection,$sql) or die("Error retrieving deviceids");
			$qty_db=mysqli_fetch_assoc($result);
			if($qty_db>0){
				$quantity=1+$qty_db['quantity'];
				$sql="update cart set quantity='".$quantity."',modified=now()  where deviceid='".$did."' and sessionid='".$sessionid."'";
			}else{
				$sql="insert into cart values('".$sessionid."','','".$did."','".$quantity."',now(),now())";
			}
			mysqli_query($connection,$sql) or die("Error entering into table");
			$sum="select sum(quantity) as cart_value from cart where sessionid='".$sessionid."'";
			$result=mysqli_query($connection,$sum) or die("Error calculating sum");
			$cart=mysqli_fetch_assoc($result);
			$cart_value=$cart['cart_value'];
			}
		}
		setcookie('cart_number',"$cart_value",time()+60*60*24*3);
		setcookie('session_id',"$sessionid",time()+60*60*24*3);
		header("location:cart.php");
?>
