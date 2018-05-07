<?php
if(isset($_POST['update']) || isset($_POST['add'])){
	require_once '../database_config.php';
	$mobile_id = isset($_POST['mobile_id'])?$_POST['mobile_id']:'';
	$mobile_name = $_POST['mobile_name'];
	$os = $_POST['os'];
	$manufacturer = $_POST['manufacturer'];
	$processor = $_POST['processor'];
	$memory= $_POST['memory'];
	$camera = $_POST['camera'];
	$price = $_POST['price'];
	$product_pic = isset($_FILES['product_pic']['name'])?"mobile/$mobile_name.png":'';
	$path="../$product_pic";
	$status = $_POST['status'];
	if(!is_dir("../mobile")){
		mkdir("../mobile");
	}
	if($mobile_id==''){
		$query = "insert into mobiles values('','".$mobile_name."','".$os."','".$manufacturer."','".$processor."','".$memory."','".$camera."',
		'".$price."','".$product_pic."','".$status."',now(),now())";
		$result = mysqli_query($connection,$query);
		move_uploaded_file($_FILES['product_pic']['tmp_name'],$path) or die("Upload failed");
		header('location:adminpanel.php');
	}
	else{
		if($product_pic==''){
			$query ="update mobiles set mobile_name='".$mobile_name."',
									os='".$os."',
									manufacturer='".$manufacturer."',
									processor='".$processor."',
									memory='".$memory."',
									camera='".$camera."',
									price='".$price."',
									status='".$status."',
									modified=now()
									where mobile_id='".$mobile_id."'";
		$result = mysqli_query($connection,$query)or die("querry error");
		header('location:adminpanel.php');
		}else{
			$query ="update mobiles set mobile_name='".$mobile_name."',
									os='".$os."',
									manufacturer='".$manufacturer."',
									processor='".$processor."',
									memory='".$memory."',
									camera='".$camera."',
									price='".$price."',
									product_pic='".$product_pic."',
									status='".$status."',
									modified=now()
									where mobile_id='".$mobile_id."'";
		$result = mysqli_query($connection,$query) or die("querry error");
		move_uploaded_file($_FILES['product_pic']['tmp_name'], $product_pic);
		header('location:adminpanel.php');
		}
	}
}else{
	header('location:admin/adminpanel.php');
}
?>
