<?php
	session_start();
	include("includes/connection.php");
	
	if(!isset($_SESSION['indenter_user_type'])){
		header("location:expenditure.php");
		exit();	
	}
	
	$year=$_POST['year'];
	$collection=$_POST['collection'];
	$school=$_POST['school'];
	
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
	header("location:school-data.php?school=$school&year=$year&cid=$cid");
?>