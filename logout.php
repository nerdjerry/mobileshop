<?php
	session_start();
	if(isset($_SESSION['username'])){
		unset($_SESSION['username']);
		unset($_SESSION['password']);
		//deleting cookie for cart value.
		setcookie('cart_number','',-60*60);
		setcookie('session_id','',-60*60);
		session_destroy();
		header('location:index.php');
	}
	else{
		header('location:index.php');
	}
?>
