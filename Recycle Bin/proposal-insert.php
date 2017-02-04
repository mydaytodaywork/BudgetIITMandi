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
	$cid=$_POST['cid'];
	$sid=$_POST['sid'];
	$indent_number=$_POST['indent_number'];
	$indenter_detail=$_POST['indenter_detail'];
	$proposed_amount=$_POST['proposed_amount'];
	$subject=$_POST['subject'];
	$title=$_POST['title'];
	$copies=$_POST['copies'];
	$remarks=$_POST['remarks'];
	$date=$_POST['date'];
	
	
	$query="insert into expenditure_table (`years`, `cid`, `sid`, `indent_no`, `indenter_detail`, `subject`, `no_of_titles`, `copies`, `proposed_amount`, `remark`,`proposal_date`) VALUES ($year,$cid,$sid,'{$indent_number}','{$indenter_detail}','{$subject}',$title,$copies,$proposed_amount,'{$remarks}','{$date}')";
	$result=mysqli_query($connection,$query);
	if(!$result)
		die("Data Entry Failed");
?>
<center><h3>Data Successfully Inserted</h3></center>