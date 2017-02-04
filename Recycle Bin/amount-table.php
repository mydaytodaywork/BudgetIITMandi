<head>
<title>Amount Table</title>
<script src="bootstrap/bootstrap.min.js"></script>
<script src="bootstrap/jquery.min.js"></script>
<link rel="stylesheet" href="bootstrap/bootstrap.min.css"/>
</head>
<style>
	th,td{
		text-align:center;	
	}
	th{
		background-color:#F93;	
	}
	#top-table{
		margin-top:20px;	
	}
	.main-inp{
		margin-left:100px;	
		margin-top:10px;
	}
	.label-head{
		margin-top:10px;	
	}
	#submit{
		background-color:#09f;
		border:none;
		border-radius:10px;
		width:150px;
		height:32px;
		padding:5px;
		color:white;	
	}
</style>
<?php
	include("includes/connection.php");
	include("includes/header.php");
?>
<center>
<form method="post" action="amount-insert.php">
	<table id='top-table'>
    	<tr><td><label class="label-head">Financial Year:</label></td><td><input class='main-inp' type="text" name='year'></input></td></tr>
    	<tr><td><label class="label-head">Total Budget:</label></td><td><input class='main-inp' type="text" name='budget'></input></td></tr>
    
    <table class="table table-bordered">	
        <thead><h3>1. Print Books</h3></thead>
    	<tr><th>SBS</th>
        <th>SCEE</th>
        <th>SE</th>
        <th>SHSS</th>
        <th>Misc</th>
        </tr>
		
        <tr>
        	<td><input type="text" name="pbsbs" class="inp"/></td>
            <td><input type="text" name="pbscee" class="inp"/></td>
            <td><input type="text" name="pbse" class="inp"/></td>
            <td><input type="text" name="pbshss" class="inp"/></td>
            <td><input type="text" name="pbmisc" class="inp"/></td>
        </tr>
   </table>
   
   <table class="table table-bordered">	
        <thead><h3>2. E-Books</h3></thead>
    	<tr><th>SBS</th>
        <th>SCEE</th>
        <th>SE</th>
        <th>SHSS</th>
        </tr>
		
        <tr>
        	<td><input type="text" name="ebsbs" class="inp"/></td>
            <td><input type="text" name="ebscee" class="inp"/></td>
            <td><input type="text" name="ebse" class="inp"/></td>
            <td><input type="text" name="ebshss" class="inp"/></td>
        </tr>
   </table>
   
   <table class="table table-bordered">	
        <thead><h3>3. E-Journals</h3></thead>
    	<tr><th>SBS</th>
        <th>SCEE</th>
        <th>SE</th>
        <th>SHSS</th>
        <th>InterDisciplinary</th>
        </tr>
		
        <tr>
        	<td><input type="text" name="ejsbs" class="inp"/></td>
            <td><input type="text" name="ejscee" class="inp"/></td>
            <td><input type="text" name="ejse" class="inp"/></td>
            <td><input type="text" name="ejshss" class="inp"/></td>
            <td><input type="text" name="ejid" class="inp"/></td>
        </tr>
   </table>
   
   <table class="table table-bordered">	
        <thead><h3>4. Others</h3></thead>
        <th>Amount Allocated</th>
    	
        <tr>
        	<td><input type="text" name="others" class="inp"/></td>
        </tr>
   </table>
   
   <input type="submit" name="submit" id='submit'/>
</form>
</center>