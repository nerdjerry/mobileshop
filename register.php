<?php
	if(isset($_POST['register'])){
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$email= $_POST['email'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		//To validate that username and emailid is unique.
		require_once 'database_config.php';
		$query="insert into users values('','".$username."','".$password."','".$email."','".$first_name."','".$last_name."','user',now(),now())";
		$result=mysqli_query($connection,$query) or die("Registration error");
		session_start();
		$_SESSION['username']=$username;
		$_SESSION['password']=$password;
		header('location:index.php');
	}else{
		header('location:myaccount.php');
	}



?>