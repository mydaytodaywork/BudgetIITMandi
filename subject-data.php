<head>
<title>Subject Wise Data</title>
<script src="bootstrap/bootstrap.min.js"></script>
<script src="bootstrap/jquery.min.js"></script>
<script>
	function goBack() {
		window.history.back();
	}
</script>
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
	$subject=NULL;
	if(isset($_POST['subject-submit'])){
		$school=$_POST['school'];
		$cid=$_POST['cid'];
		$year=$_POST['year'];
		$sid=$_POST['sid'];
		$collection=$_POST['collection'];
		$subject=$_POST['subject'];
		
		$yearmod=($year%100)+1;
		$yearm=$year."-$yearmod";
	}
	else{
		header("location:home.php");
		exit();	
	}
	echo "<br/><br/><center><code>Showing Results for Subject=<mark>$subject</mark>, Collection=<mark>$collection</mark>, School=<mark>$school</mark> AND Year=<mark>$yearm</mark></code></center><br/>";
	$query="SELECT `indent_no`, `indenter_detail`, `no_of_titles`, `copies`, `proposed_amount`, `remark`,`proposal_date` FROM `expenditure_table` WHERE cid=$cid and years=$year and sid=$sid and subject='".$subject ."' order by eno";
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
    <th>Indenter Detail</th>
    <th>No. Of Titles</th>
    <th>Copies</th>
    <?php
		if(isset($_SESSION['indenter_user_type'])){
	?>
    <th>Remarks</th>
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
				
				if(isset($_SESSION['indenter_user_type']))
					echo "<td>$row[5]</td>";
					
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
				<td></td>";
				
				if(isset($_SESSION['indenter_user_type']))
					echo "<td></td>";	
				
			echo "</tr>
			";
		$index++;
	?>
</table>
</div>
</center>