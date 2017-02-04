<head>
<title>Data Insertion</title>
<script src="bootstrap/bootstrap.min.js"></script>
<script src="bootstrap/jquery.min.js"></script>
<link rel="stylesheet" href="bootstrap/bootstrap.min.css"/>
<link rel="stylesheet" href="css/form.css"/>
</head>
<?php
	session_start();
	include("includes/connection.php");
	include("includes/header.php");
	
	
	if(!isset($_SESSION['indenter_username'])){
		header("location:expenditure.php");
		exit();	
	}
	if(isset($_SESSION['indenter_user_type']) && $_SESSION['indenter_user_type']==0)
		adminnav();
	else if(isset($_SESSION['indenter_user_type']) && $_SESSION['indenter_user_type']==1)
		usernav();
		
	$year=$_POST['year'];
	$cid=$_POST['cid'];
	
	//get category
	$query="select collection from collection_table where cid=$cid";
	$result=mysqli_query($connection,$query);
	$row=mysqli_fetch_row($result);
	$collection=$row[0];
	
	//get all data
	$total=$_POST['total'];
	$sbs=$_POST['sbs'];
	$scee=$_POST['scee'];
	$se=$_POST['se'];
	$shss=$_POST['shss'];
	$misc=0;
	$id=0;
	if($cid==1)
		$misc=$_POST['misc'];
	if($cid==3)
		$id=$_POST['id'];
		
	//insert into year_table
	$query="replace into year_table (years,cid,sanctioned_amount) values ($year,$cid,$total)";
	$result=mysqli_query($connection,$query);
	
	//insert into amount_table
	$query="replace into amount_table (`years`, `cid`, `sid`, `sanctioned_amount`) VALUES ($year,$cid,1,$sbs),($year,$cid,2,$scee),($year,$cid,3,$se),($year,$cid,4,$shss)";
	if($cid==1)
		$query.=", ($year,$cid,5,$misc)";
	if($cid==3)
		$query.=", ($year,$cid,6,$id)";
	$result=mysqli_query($connection,$query);
	//header("location:../home.php?message=Data Inserted");
?>
<center><h3>Data Updated!</h3></center>
<!--
<form action="viewtable.php" method="post">
	<input type="hidden" value="<?php echo $collection; ?>" name='collection'/>
	<input type="hidden" value="<?php echo $year; ?>" name="year"/> 
    <input type="submit" style="display:none" id='submit' />   
</form>

-->