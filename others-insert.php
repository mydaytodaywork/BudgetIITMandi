<head>
<title>Data Insertion</title>
<script src="bootstrap/bootstrap.min.js"></script>
<script src="bootstrap/jquery.min.js"></script>
<link rel="stylesheet" href="bootstrap/bootstrap.min.css"/>
<link rel="stylesheet" href="css/form.css"/>
</head>
<?php
	session_start();
	include("includes/header.php");
	include("includes/connection.php");
	
	if(!isset($_SESSION['indenter_user_type'])){
		header("location:expenditure.php");
		exit();	
	}
	
	if(isset($_SESSION['indenter_user_type']) && $_SESSION['indenter_user_type']==0)
		adminnav();
	else if(isset($_SESSION['indenter_user_type']) && $_SESSION['indenter_user_type']==1)
		usernav();
	
	$year=$_POST['year'];
	$category=$_POST['category'];
	$item=$_POST['item'];
	$source=$_POST['source'];
	$quantity=$_POST['quantity'];
	$invoice_no=$_POST['invoice_no'];
	$location=$_POST['location'];
	$invoice_date=$_POST['invoice_date'];
	$price=$_POST['price'];
	$remarks=$_POST['remarks'];
	
	$query="INSERT INTO `others_table`(`years`, `category`, `item_name`, `quantity`, `invoice_no`, `invoice_date`, `source`, `price`, `location`, `remarks`) VALUES ($year,'{$category}','{$item}',$quantity,'{$invoice_no}','{$invoice_date}','{$source}',$price,'{$location}','{$remarks}')";
	$result=mysqli_query($connection,$query);
	if(!$result)
		die("Data Entry Failed");
		
	header("location:others-data.php?year=".$year);
?>