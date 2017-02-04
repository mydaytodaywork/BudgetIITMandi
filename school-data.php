<head>
<title>School Wise Data</title>
<script src="bootstrap/bootstrap.min.js"></script>
<script src="bootstrap/jquery.min.js"></script>
<link rel="stylesheet" href="bootstrap/bootstrap.min.css"/>
<link rel="stylesheet" href="css/form.css"/>
</head>
<style>
th{
	background-color:#F60;
	text-align:center;
	color:white;	
}
.indenter{
	color:blue;	
}
.indenter:hover{
	cursor:pointer;	
}
.subject{
	color:blue;	
}
.subject:hover{
	cursor:pointer;	
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
<script>
	function goBack() {
		window.history.back();
	}
	<?php
		if(isset($_POST['indenter-update-submit']) || (isset($_POST['delete-submit']))){
	?>
			$(document).ready(function(){
				$("#back-btn").css('display','none');
			});
	<?php
		}
	?>
</script>
<script>
	$(document).ready(function(){
        $(".indenter").click(function(){
			var indenter=$(this).attr('id');
			$(".hidden-data").append("<input type='hidden' name='indenter' value='"+indenter+"'>");	
			document.getElementById("hidden-submit").click();
		});
		
		$(".subject").click(function(){
			var subject=$(this).attr('id');
			$(".hidden-subject-data").append("<input type='hidden' name='subject' value='"+subject+"'>");	
			document.getElementById("hidden-sub-submit").click();
		});
		
    });
</script>
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
	$cid=NULL;
	$year=NULL;
	if(isset($_POST['submit-hidden'])){
		$school=$_POST['school'];
		$cid=$_POST['cid'];
		$year=$_POST['year'];
	}
	else if(isset($_GET['school']) && isset($_GET['cid']) && isset($_GET['year'])){
		$school=$_GET['school'];
		$cid=$_GET['cid'];
		$year=$_GET['year'];
	}
	else if(isset($_POST['delete-submit'])){
		$school=$_POST['school'];
		$cid=$_POST['cid'];
		$year=$_POST['year'];
		$sid=$_POST['sid'];
		$collection=$_POST['collection'];
		$indenter=$_POST['indenter'];
		$indentno=$_POST['indentno'];
		$delete_query="delete from expenditure_table where indent_no='{$indentno}' and years=$year";
		$result=mysqli_query($connection,$delete_query);
	}
	else if(isset($_POST['indenter-update-submit'])){
		$school=$_POST['school'];
		$cid=$_POST['cid'];
		$year=$_POST['year'];
		$sid=$_POST['sid'];
		$collection=$_POST['collection'];
		$indenter=$_POST['indenter_detail'];
		$eno=$_POST['eno'];	
		$date=$_POST['date'];
		$proposed=$_POST['proposed_amount'];
		$indentno=$_POST['indent_number'];
		$indent_detail=$_POST['indenter_detail'];
		$subject=$_POST['subject'];
		$title=$_POST['title'];
		$copies=$_POST['copies'];
		$remarks=$_POST['remarks'];
		$update_query="UPDATE `expenditure_table` SET `proposal_date`='{$date}',`indent_no`='{$indentno}',`indenter_detail`='{$indent_detail}',`subject`='{$subject}',`no_of_titles`='{$title}',`copies`='{$copies}',`proposed_amount`='{$proposed}',`remark`='{$remarks}' WHERE eno=$eno ";
		$update_result=mysqli_query($connection,$update_query);
	}
	else{
		header("location:home.php");
		exit();	
	}

	$yearmod=($year%100)+1;
	$yearm=$year."-$yearmod";
	
	include("includes/school-wise-pre-process.php");
	echo "<br/><br/><center><code>Showing Results for Collection=<mark>$collection</mark>, School=<mark>$school</mark> AND Year=<mark>$yearm</mark></code></center><br/>";
	
?>
<center>
<div class="table-content">
<table class="table table-bordered">
	<th>Sr. No.</th>
    <th>Sanctioned Amount (Rs.) </th>
    <th>Amount Spent (Rs.) </th>
    <th>Pending Amount (Rs.) </th>
    <th>Proposal Date</th>
    <th>Proposed Amount (Rs.) </th>
    <th>Indent Number</th>
    <th>Indent Detail</th>
    <th>Subject</th>
    <th>No. Of Titles</th>
    <th>Copies</th>
    
    <?php
		if(isset($_SESSION['indenter_user_type'])){
	?>
    <th>Remarks</th>
	<?php
		}
		
		$spent=0;
		$pending=$total;
		$index=1;
		while($row=mysqli_fetch_row($expenditure_result)){
			echo "<tr>
				<td>$index</td>
				<td>$total</td>
				<td>$spent</td>
				<td>$pending</td>
				<td>$row[7]</td>
				<td>$row[5]</td>
				<td>$row[0]</td>
				<td><div class='indenter' id='{$row[1]}' >$row[1]</div></td>
				<td><div class='subject' id='{$row[2]}' >$row[2]</div></td>
				<td>$row[3]</td>
				<td>$row[4]</td>";
				
				if(isset($_SESSION['indenter_user_type']))
					echo "<td>$row[6]</td>";
				
				
			echo "</tr>";
			
			$spent=$spent+$row[5];
			$pending=$pending-$row[5];
			$index++;	
		}
		echo "<tr>
				<td style='background-color:#F60; COLOR:WHITE'>Total</td>
				<td>$total</td>
				<td>$spent</td>
				<td>$pending</td>
				<td></td>
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
<div style="height:100px; "></div>

<?php
	if(isset($_SESSION['indenter_user_type'])){
		include("includes/proposal-form.php");
	}
?>
<form action="indenter-data.php" method="post">
	<div class="hidden-data">
        <input type="hidden" value="<?php echo $school;?>" name="school">
        <input type="hidden" value="<?php echo $sid;?>" name="sid">
        <input type="hidden" value="<?php echo $collection;?>" name="collection">
        <input type="hidden" value="<?php echo $cid;?>" name="cid">
        <input type="hidden" value="<?php echo $year;?>" name="year">
        <input id='hidden-submit' type="submit" style="display:none;" name="indenter-submit">
	</div>
</form>

<form action="subject-data.php" method="post">
	<div class="hidden-subject-data">
        <input type="hidden" value="<?php echo $school;?>" name="school">
        <input type="hidden" value="<?php echo $sid;?>" name="sid">
        <input type="hidden" value="<?php echo $collection;?>" name="collection">
        <input type="hidden" value="<?php echo $cid;?>" name="cid">
        <input type="hidden" value="<?php echo $year;?>" name="year">
        <input id='hidden-sub-submit' type="submit" style="display:none;" name="subject-submit">
	</div>
</form>
</div>
</center>