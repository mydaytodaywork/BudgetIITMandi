<head>
<title>Logout</title>
</head>
<style>
#logout{
text-align:center;
 font-size:30px;
 margin-top:6%;
 background-color:#CCC;
 width:500px;
 padding:5px;
 
}
</style>
<?php
	session_start();
	if(!isset($_SESSION['indenter_username']))
		header("location:expenditure.php");
	unset($_SESSION['indenter_username']);
	unset($_SESSION['indenter_user_type']);
	unset($_SESSION['indenter_email']);
	include('includes/header.php');
	
?>
<center>
<div id="logout">
	<?php echo "You have Successfully logged out"; ?>
</div>
</center>