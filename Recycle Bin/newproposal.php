<head>
<title>New Proposal</title>
<script src="bootstrap/bootstrap.min.js"></script>
<script src="bootstrap/jquery.min.js"></script>
<link rel="stylesheet" href="bootstrap/bootstrap.min.css"/>
</head>
<?php
	include("includes/header.php");
	include("includes/connection.php");
?>
<style>
	select{
		width:200px;
		height:32px;	
	}
	form{
		margin-top:4%;
		background-color:#CCC;
		padding:10px 40px 40px 40px;
		width:400px;
		height:400px;	
	}
	#school,#category,#year,#submit{
		margin-top:20px;
	}
	#submit{
		border:none;	
		background-color:#F60;
		color:white;
		border-radius:5px;
		width:100px;
		height:32px;
		outline:none;
	}
</style>
<center>
<form action="proposal-form.php" method="post">
	<fieldset>
    <legend>New Proposal</legend>
	<label for="year">Financial Year:</label><input id='year' type="number" min=1970 max=2999 name='year'/><br/>
    <select name="collection" id='category'>
    	<option selected disabled>Collection</option>
        <option value="Print Books">Print Books</option>
        <option value="E-Books">E-Books</option>
        <option value="E-Journals">E-Journals</option>
        <option value="Others">Others</option>
    </select><br/>
    
    <select name="school" id='school'>
    	<option selected disabled>School</option>
    	<option value="SBS">SBS</option>
        <option value="SCEE">SCEE</option>
        <option value="SE">SE</option>
        <option value="SHSS">SHSS</option>
        <option value="InterDisciplinary">InterDisciplinary</option>
        <option value="Misc">Misc</option>
    </select><br/>
    <input type="submit" id='submit' name="submit"/>
    </fieldset>
</form>
</center>