<head>
<title>Home</title>
<script src="bootstrap/bootstrap.min.js"></script>
<script src="bootstrap/jquery.min.js"></script>
<link rel="stylesheet" href="bootstrap/bootstrap.min.css"/>
</head>
<?php
	session_start();
	include("includes/header.php");
	include("includes/connection.php");
	include("includes/resubmission.php");
	if(isset($_POST['login'])){
		$email=$_POST['email'];
		$pass=md5($_POST['pass']);
		$query="select name,password,user_type,email from admin_table where email='".$email."'";
		$result=mysqli_query($connection,$query);	
		$row=mysqli_fetch_row($result);
		if($pass!=$row[1]){
			header("location:login.php?error=Invalid Password Or Email do not Exist");
			exit();
		}
		else{
			$_SESSION['indenter_username']=$row[0];
			$_SESSION['indenter_user_type']=$row[2];
			$_SESSION['indenter_email']=$row[3];
		}
	}
	if(isset($_SESSION['indenter_user_type']) && $_SESSION['indenter_user_type']==0)
		adminnav();
	else if(isset($_SESSION['indenter_user_type']) && $_SESSION['indenter_user_type']==1)
		usernav();
		
	if(!isset($_SESSION['indenter_user_type'])){
		header("location:expenditure.php");	
		exit();
	}
	
	$year=date("Y");
	$month=date("m");
	if($month<=3)
		$year=$year-1;
		
?>
<style>
#year{
	margin-left:20px;
	padding:2px;	
}
form{
	background-color:#CCC;
	width:60%;
	margin-top:20px;
	padding:30px;	
	padding-top:10px;
}
#collection{
	height:32px;
	width:150px;	
}
#submit{
	border:none;
	background-color:#F60;	
	color:white;
	height:32px;
}
</style>
<center>
<form method="post" action="viewtable.php">
	<legend>BUDGET DETAIL</legend>
    <label for='year'>Year:</label>
    <input required type="number" min=1970 max=2999 id='year' name='year' value=<?php echo $year?>></input>
	<br/><br/>
    <select required name='collection' id='collection'>
    	<option disabled selected>Select Collection</option>
        <option value="Print Books">Print Books</option>
        <option value="E-Books">E-Books</option>
        <option value="E-Journals">E-Journals</option>
        <option value="Others">Others</option>
    </select><br/><br/>
    <input type="submit" value='Proceed' id='submit' name='proceed'/>
</form>
</center>