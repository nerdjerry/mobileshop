<?php
if(isset($_POST['login'])){
		if(isset($_POST['username'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		require_once 'database_config.php';
		$query = "select username,password,role from users where username='".$username."' and password=md5('".$password."')";
		$result = mysqli_query($connection,$query) or die("query error");
		$user = mysqli_num_rows($result);
		if($user==1){
			session_start();
			$_SESSION['username'] = $username;
			$_SESSION['password'] = md5($password);
	
			$sql_login = "update users set account_login=now() where username='".$username."'";
			mysqli_query($connection,$sql_login) or die("query error");
			$user=mysqli_fetch_assoc($result);
			$role=$user['role'];	
			if($role=='user'){
			//Setting cookie for cart value
			$sum="select sum(quantity) as cart_value from cart where username='".$username."'";
			$result=mysqli_query($connection,$sum) or die("Error calculating sum");
			$cart=mysqli_fetch_assoc($result);
			$cart_value=$cart['cart_value'];	
			setcookie('cart_number',"$cart_value",time()+60*60*24*3);
			
			header('location:index.php');
			}elseif($role=='admin'){
				header('location:admin/adminpanel.php');
			}
		}
		}else{
			header('location:myaccount.php');
		}
	}else{
		header('location:myaccount.php');
	}


	
?>