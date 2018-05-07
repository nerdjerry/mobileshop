	session_start();
	$did=isset($_GET['did'])?$_GET['did']:'';
	$sessionid = session_id();
	$quantity=1;
	require_once 'database_config.php';
	if(isset($_SESSION['username'])){
		$sql="select deviceid from cart where username='".$username."' and deviceid='".$did."'";
		$result=mysqli_query($connection,$sql) or die("1");
		if(mysqli_num_rows($result)>0){
			$quantity=1+mysqli_num_rows($result);
		}		
		$sql = "insert into cart values($sessionid,$username,$did,$quantity,now(),now())";
		mysqli_query($connection,$sql);
		$sql2 = "select * from cart where username='".$username."'";
		$cartvalue=mysqli_num_rows(mysqli_query($connection,$sql2) or die("2"));
		setcookie("cart_number","$cartvalue",time()+60*60*24*3);
		header('location:thestore.php');
	}else{
		$sql="select deviceid from cart where sessionid='".$sessionid."'and deviceid='".$did."'";
		$result=mysqli_query($connection,$sql);
		if(mysqli_num_rows($result)>0){
			$quantity=1+mysqli_num_rows($result);
		}	
		$sql = "insert into cart values($sessionid,'',$did,$quantity,now(),now())";
		mysqli_query($connection,$sql);
		$sql2 = "select * from cart where sessionid='".$sessionid."'";
		$cartvalue=mysqli_num_rows(mysqli_query($connection,$sql2) or die("2"));
		setcookie("cart_number",$cartvalue,time()+60*60*24*3);
		header('location:thestore.php');
	}
