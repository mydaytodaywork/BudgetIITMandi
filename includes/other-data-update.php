<?php
	include("connection.php");
	
	$ono=$_POST['ono'];
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
	
	$query="UPDATE `others_table` SET `category`='{$category}',`item_name`='{$item}',`quantity`=$quantity,`invoice_no`='{$invoice_no}',`invoice_date`='{$invoice_date}',`source`='{$source}',`price`=$price,`location`='{$location}',`remarks`='{$remarks}' WHERE ono=$ono and years=$year";	
	$result=mysqli_query($connection,$query);
	
	if(!$result)
		die("Data Updation Failed");
	
	header("location:../others-data.php?year=".$year);
?>