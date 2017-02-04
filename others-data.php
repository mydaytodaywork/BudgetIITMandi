<head>
<title>Others Data</title>
<script src="bootstrap/bootstrap.min.js"></script>
<script src="bootstrap/jquery.min.js"></script>
<link rel="stylesheet" href="bootstrap/bootstrap.min.css"/>
<link rel="stylesheet" href="css/form.css"/>
</head>
<style>
.table-content{
	width:80%;	
}
td{
	text-align:center;
	background-color:#FF9;
	font-weight:bold;	
}
th{
	color:white;	
}
.edit,.delete{
	color:blue;
	cursor:pointer;	
}
</style>
<script>
$(document).ready(function(){
	$(".delete").click(function(){
		var del_confirm=confirm("Do you want to delete? ");
		if(del_confirm==true){
			var indentno=$(this).attr('data-indent');
			window.open("others-data.php?year=<?php echo $_GET['year'];?>&action=delete&invoiceno="+indentno,'_self');	
		}
	});
	$(".edit").click(function(){
		var indentno=$(this).attr('data-indent');
		window.open("others-data.php?year=<?php echo $_GET['year'];?>&action=edit&invoiceno="+indentno,'_self');	
	});
});
</script>
<?php
	session_start();
	include("includes/header.php");
	include("includes/connection.php");
	include("includes/resubmission.php");
	//setting nav bar and chekcing session variable
	if(!isset($_SESSION['indenter_user_type'])){
		header("location:expenditure.php");	
		exit();	
	}
	if(isset($_SESSION['indenter_user_type']) && $_SESSION['indenter_user_type']==0)
		adminnav();
	else if(isset($_SESSION['indenter_user_type']) && $_SESSION['indenter_user_type']==1)
		usernav();
	
	if(isset($_GET['action']) && $_GET['action']=='delete' && isset($_GET['year']) && ($_GET['year']!='') 
	&& isset($_GET['invoiceno']) && ($_GET['invoiceno']!='')){
		$delete_query="delete from others_table where invoice_no='{$_GET['invoiceno']}' and years='{$_GET['year']}'";
		$result=mysqli_query($connection,$delete_query);	
	}
	
	//go ahead
	$year=$_GET['year'];
	$query="SELECT `category`, `item_name`, `quantity`, `invoice_no`, `invoice_date`, `source`, `price`, `location`, `remarks` FROM `others_table` WHERE years=$year";
	$result=mysqli_query($connection,$query);
?>
<center>
<div class="table-content">
<table class="table table-bordered">
	<th>Sr. No.</th>
    <th>Amount Spent</th>
    <th>Category</th>
    <th>Item Name</th>
    <th>Quantity</th>
    <th>Invoice No.</th>
    <th>Invoice Date</th>
    <th>Source</th>
    <th>Price</th>
    <th>Location</th>
    <th>Remarks</th>
	<th>Edit</th>
    <th>Delete</th>
	<?php
		$spent=0;
		$index=1;
		while($row=mysqli_fetch_row($result)){
			echo "<tr>
				<td>$index</td>
				<td>$spent</td>
				<td>$row[0]</td>
				<td>$row[1]</td>
				<td>$row[2]</td>
				<td>$row[3]</td>
				<td>$row[4]</td>
				<td>$row[5]</td>
				<td>$row[6]</td>
				<td>$row[7]</td>
				<td>$row[8]</td>
				<td><div class='edit' data-indent=$row[3]>Edit</div></td>
				<td><div class='delete' data-indent=$row[3]>Delete</div></td>
				
			</tr>";
			$spent=$spent+$row[6];
			$index++;	
		}
		echo "<tr>
				<td style='background-color:#F60; COLOR:WHITE'>Total</td>
				<td>$spent</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			";
		$index++;
	?>
</table>
</div>
</content>
<?php
	if(isset($_GET['action']) && $_GET['action']=='edit')
		include("includes/others-edit.php");	
	else
		include("includes/others-form.php");
?>
