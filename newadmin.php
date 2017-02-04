<head>
<title>ADD USERS</title>
</head>

<?php
	include("includes/header.php");
	include('includes/connection.php');
	session_start();
	if(!isset($_SESSION['indenter_user_type'])){
		header("location:expenditure.php");	
	}
	else if($_SESSION['indenter_user_type']==1)
		header("location:home.php");
		
	if($_SESSION['indenter_user_type']==0)
		adminnav();
	else if($_SESSION['indenter_user_type']==1)
		usernav();
	
	if(isset($_GET['remove'])){
		$email=$_GET['email'];
		$query="delete from admin_table where email='".$email."'";
		$result=mysqli_query($connection,$query);	
		if(!$result)
			die("Error!");
	}
	
	else if(isset($_POST['email']) && isset($_POST['name']) && isset($_POST['userid']) && isset($_POST['pass'])){
		$email=$_POST['email'];
		$name=$_POST['name'];
		$userid=$_POST['userid'];
		$pass=$_POST['pass'];
		$pass=md5($pass);
		
		$query="insert into admin_table values ('".$userid."','".$email."','".$name."','".$pass."',1)";
		$result=mysqli_query($connection,$query);
		if(!$result)
			die("Error!");
	}
	include("includes/admin_table.php");
	include("includes/admin_modal.php");
?>