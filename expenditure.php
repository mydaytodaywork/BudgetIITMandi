<head>
<title>Expenditure</title>
<script src="bootstrap/bootstrap.min.js"></script>
<script src="bootstrap/jquery.min.js"></script>
<link rel="stylesheet" href="bootstrap/bootstrap.min.css"/>
<link rel="stylesheet" href="css/form.css"/>
</head>
<style>
.total{
	background-color:#F60;
	color:white;	
}
th{
	background-color:#F60;
	color:white;
	text-align:center;	
}
td{
	text-align:center;	
	background-color:#FF9;
	font-weight:bold;
}
.click-school{
	color:blue;	
}
.click-school:hover{
	cursor:pointer;	
}
.table-content{
	width:80%;	
}
#title{
	color:#333366;
	font-family: "Palatino", "Palatino Linotype", Georgia, sans-serif;	
}
</style>
<script>
	$(document).ready(function(){
		$(".click-school").click(function(){
			var cid=$(this).attr('data-col');
			var school=$(this).attr('id');
			$(".hidden-div").append("<input type='hidden' name='cid' value='"+cid+"'/>");
			$(".hidden-div").append("<input type='hidden' name='school' value='"+school+"'/>");
			document.getElementById("submit-hidden").click();
		});		
	});
</script>
<?php
	session_start();
	include("includes/header.php");
	include("includes/connection.php");
	include("includes/resubmission.php");
	if(isset($_SESSION['indenter_user_type']) && $_SESSION['indenter_user_type']==0)
		adminnav();
	else if(isset($_SESSION['indenter_user_type']) && $_SESSION['indenter_user_type']==1)
		usernav();
	
	/*$curr_year=date("Y");
	$curr_month=date("m");
	
	//check if new financial year
	$year=$curr_year-1;*/
	$query="select min(years) as minyear,max(years) as maxyear from year_table";
	$result=mysqli_query($connection,$query);
	$row=mysqli_fetch_row($result);
	$minyear=$row[0];
	$maxyear=$row[1];	
	
	$year=$maxyear;

	if(isset($_POST['year']) && $_POST['year']!='')
		$year=$_POST['year'];
	
	include("includes/expenditure_query.php");
	$lasttwo=$year%100;
	$lasttwo++;
	$yearstr=$year."-".$lasttwo;
	
?>

<center>

<?php
if(isset($_SESSION['indenter_user_type'])){
	echo "<form method='post' action='expenditure.php'>
		<input type='number' name='year' placeholder='Year' min=".$minyear ." max=".$maxyear."></input>
		<input type='submit' value='Search' name='search'/>
	</form>";
}
?>

<h2 id='title'>Library Budget & Expenditure Detail <?php echo $yearstr;?></h2>
<div class="table-content">
<table class='table table-bordered' >
    <th>Sr. No. </th>
    <th>Collection Detail </th>
    <th>Sanctioned Amount (Rs.) </th>
    <th>School </th>
    <th>%</th>
    <th>Sanctioned Amount (Rs.) </th>
    <th>Amount Spent (Rs.) </th>
    <th>Pending Amount (Rs.) </th>
    
    <?php
		showtable(1,"Print Books",$print_books,$sasbspb,$sasceepb,$sasepb,$sashsspb,$samiscpb,$sainterpb,$spsbspb,$spsceepb,$spsepb,$spshsspb,$spmiscpb,$spinterpb,$pb_sa_total,$pb_sp_total);
		showtable(2,"E-Books",$ebooks,$sasbseb,$sasceeeb,$saseeb,$sashsseb,$samisceb,$saintereb,$spsbseb,$spsceeeb,$spseeb,$spshsseb,$spmisceb,$spintereb,$eb_sa_total,$eb_sp_total);
		showtable(3,"E-Journals",$ejournals,$sasbsej,$sasceeej,$saseej,$sashssej,$samiscej,$sainterej,$spsbsej,$spsceeej,
		$spseej,$spshssej,$spmiscej,$spinterej,$ej_sa_total,$ej_sp_total);
		
		$others_query="select sum(price) from others_table";
		$others_result=mysqli_query($connection,$others_query);
		$others_row=mysqli_fetch_row($others_result);
		$cost=$others_row[0];
		
		echo "<tr>
				<td>4</td>
				<td>Others/Misc</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>$cost</td>
				<td></td>
			
			</tr>";	
	?>
</table>

<form action="school-data.php" method="post">
	<div class="hidden-div">
		<input type="hidden" value="<?php echo $year;?>" name='year'>
	</div>	
    <input type="submit" id="submit-hidden" style="display:none" name="submit-hidden" />
</form>
</div>
</center>