<head>
<title>Indenter Wise Data</title>
<script src="bootstrap/bootstrap.min.js"></script>
<script src="bootstrap/jquery.min.js"></script>
<link rel="stylesheet" href="bootstrap/bootstrap.min.css"/>
<link rel="stylesheet" href="css/form.css"/>
</head>
<script>
	function goBack() {
		window.history.back();
	}
	
	$(document).ready(function(){
		$(".delete").click(function(){
			var del_confirm=confirm("Do you want to delete? ");
			if(del_confirm==true){
				var indentno=$(this).attr('data-indent');
				$(".hidden-delete-data").append("<input type='hidden' name='indentno' value='"+indentno+"'>");	
				document.getElementById("hidden-delete-submit").click();	
			}
		});
		
		$(".edit").click(function(){
			var indentno=$(this).attr('data-indent');
			$(".hidden-edit-data").append("<input type='hidden' name='indentno' value='"+indentno+"'>");	
			document.getElementById("hidden-edit-submit").click();	
		});
	});
</script>
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
.table-content{
	width:80%;	
}
code{
	font-size:15px;	
}
#back-btn{
	float:left;
	margin-top:20px;
	margin-left:10px;
	border:none;
	background-color:#09F;
	color:white;
	height:40px;
	width:100px;
	padding:10px;
	border-radius:5px;	
}
.edit,.delete{
	color:blue;
	cursor:pointer;	
}
</style>
<?php
	session_start();
	include("includes/connection.php");
	include("includes/header.php");
	include("includes/resubmission.php");
	
	if(isset($_SESSION['indenter_user_type']) && $_SESSION['indenter_user_type']==0)
		adminnav();
	else if(isset($_SESSION['indenter_user_type']) && $_SESSION['indenter_user_type']==1)
		usernav();
	
	echo "<button onclick='goBack()' id='back-btn'>Go Back</button>";
	
	$school=NULL;
	$sid=NULL;
	$cid=NULL;
	$year=NULL;
	$collection=NULL;
	$indenter=NULL;
	if(isset($_POST['indenter-submit'])){
		$school=$_POST['school'];
		$cid=$_POST['cid'];
		$year=$_POST['year'];
		$sid=$_POST['sid'];
		$collection=$_POST['collection'];
		$indenter=$_POST['indenter'];
	}
	else if(isset($_POST['edit-submit'])){
		$school=$_POST['school'];
		$cid=$_POST['cid'];
		$year=$_POST['year'];
		$sid=$_POST['sid'];
		$collection=$_POST['collection'];
		$indenter=$_POST['indenter'];
		$indentno=$_POST['indentno'];	
	}
	else{
		header("location:home.php");
		exit();
	}
	$yearmod=($year%100)+1;
	$yearm=$year."-$yearmod";
	
	echo "<br/><br/><center><code>Showing Results for Indenter=<mark>$indenter</mark>, Collection=<mark>$collection</mark>, School=<mark>$school</mark> AND Financial Year=<mark>$yearm</mark></code></center><br/>";
	$query="SELECT `indent_no`, `subject`, `no_of_titles`, `copies`, `proposed_amount`, `remark`,`proposal_date` FROM `expenditure_table` WHERE cid=$cid and years=$year and sid=$sid and indenter_detail='".$indenter ."' order by eno";
	$result=mysqli_query($connection,$query);
?>
<center>
<div class="table-content">
<table class="table table-bordered">
	<th>Sr. No.</th>
    <th>Amount Spent (Rs.) </th>
    <th>Proposal Date</th>
    <th>Proposed Amount (Rs.) </th>
    <th>Indent Number</th>
    <th>Subject</th>
    <th>No. Of Titles</th>
    <th>Copies</th>
    <?php
		if(isset($_SESSION['indenter_user_type'])){
	?>
    <th>Remarks</th>
    <th>Edit</th>
    <th>Delete</th>
	<?php
		}
		
		$spent=0;
		$index=1;
		while($row=mysqli_fetch_row($result)){
			echo "<tr>
				<td>$index</td>
				<td>$spent</td>
				<td>$row[6]</td>
				<td>$row[4]</td>
				<td>$row[0]</td>
				<td>$row[1]</td>
				<td>$row[2]</td>
				<td>$row[3]</td>";
				
				if(isset($_SESSION['indenter_user_type'])){
					echo "<td>$row[5]</td>";
					echo "<td><div class='edit' data-indent=$row[0]>Edit</div></td>";
					echo "<td><div class='delete' data-indent=$row[0]>Delete</div></td>";
				}
				
			echo "</tr>";
			$spent=$spent+$row[4];
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
				";
				
				if(isset($_SESSION['indenter_user_type'])){
					echo "<td></td><td></td>
				<td></td>";
				}
					
			echo "</tr>
			";
		$index++;
	?>
</table>
</div>
<?php
	if(isset($_POST['edit-submit'])){
		include("includes/editform.php");	
	}
?>
</center>

<!-- delete -->
<form action="school-data.php" method="post">
	<div class="hidden-delete-data">
    	<input type="hidden" value="<?php echo $school;?>" name="school">
        <input type="hidden" value="<?php echo $sid;?>" name="sid">
        <input type="hidden" value="<?php echo $collection;?>" name="collection">
        <input type="hidden" value="<?php echo $cid;?>" name="cid">
        <input type="hidden" value="<?php echo $year;?>" name="year">
        <input type="hidden" value="<?php echo $indenter;?>" name="indenter">
        <input id='hidden-delete-submit' type="submit" style="display:none;" name="delete-submit">
    </div>
</form>

<form action="indenter-data.php" method="post">
	<div class="hidden-edit-data">
    	<input type="hidden" value="<?php echo $school;?>" name="school">
        <input type="hidden" value="<?php echo $sid;?>" name="sid">
        <input type="hidden" value="<?php echo $collection;?>" name="collection">
        <input type="hidden" value="<?php echo $cid;?>" name="cid">
        <input type="hidden" value="<?php echo $year;?>" name="year">
        <input type="hidden" value="<?php echo $indenter;?>" name="indenter">
        <input id='hidden-edit-submit' type="submit" style="display:none;" name="edit-submit">
    </div>
</form>