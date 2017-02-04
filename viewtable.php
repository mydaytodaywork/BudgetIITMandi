<head>
<title>Home</title>
<script src="bootstrap/bootstrap.min.js"></script>
<script src="bootstrap/jquery.min.js"></script>
<link rel="stylesheet" href="bootstrap/bootstrap.min.css"/>
</head>
<style>
th{
	background-color:#F60;
	text-align:center;
	color:white;	
}
td{
	text-align:center;
	background-color:#FF9;
	font-weight:bold;	
}
input[type=text]{
	width:100px;	
}
code{
	font-size:15px;	
}
</style>
<script>
	$(document).ready(function(){
		$(".click-school").click(function(){
			var school=$(this).attr('id');
			$("#hidden-div").append("<input type='hidden' name='school' value='"+school+"'>");
    		document.getElementById("submit-hidden").click();
		});
	});
</script>
<?php
	session_start();
	include("includes/header.php");
	include("includes/connection.php");
	include("includes/resubmission.php");
	//setting nav bar and chekcing session variable
	$collection=$_POST['collection'];
	$year=$_POST['year'];
	if($collection=='Others'){
		header("location:others-data.php?year=$year");
		exit();	
	}
	
	if(!isset($_SESSION['indenter_user_type'])){
		header("location:expenditure.php");	
		exit();	
	}
	
	if(isset($_SESSION['indenter_user_type']) && $_SESSION['indenter_user_type']==0)
		adminnav();
	else if(isset($_SESSION['indenter_user_type']) && $_SESSION['indenter_user_type']==1){
		header("location:expenditure.php");	
		exit();
	}
	
	$yearmod=($year%100)+1;
	$yearm=$year."-$yearmod";
	
	//go ahead
	echo "<center><code>Showing Results for Collection=<mark>$collection</mark> AND Year=<mark>$yearm</mark></code></center><br/>";
	
	
	
	if(!isset($_POST['proceed']) || !(isset($_POST['collection']))){
		header("location:home.php?message=Please Fill All Details");
		exit();	
	}
	
	
	$collection=$_POST['collection'];
	$year=$_POST['year'];
	
	include("includes/table-pre-process.php");
	
	
	$rowspan=6;
	if($collection=='E-Journals')
		$rowspan=5;
	else if($collection=='Others')
		$rowspan=1;
	
	include("includes/head-table.php");
?>

<form action='school-data.php' method="post">
	<div id='hidden-div'>
		<input type="hidden" value="<?php echo $year; ?>" name="year"/>
		<input type="hidden" value="<?php echo $cid; ?>" name="cid"/>
	</div>
    <input type="submit" id='submit-hidden' style="display:none" name='submit-hidden'/>
</form>