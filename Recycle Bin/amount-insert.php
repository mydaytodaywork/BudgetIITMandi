<?php
	if(!isset($_POST['submit']))
		header("location:amount-table.php");
	$year=$_POST['year'];
	$budget=$_POST['budget'];
	
	//print books
	$pbsbs=$_POST['pbsbs'];
	$pbscee=$_POST['pbscee'];
	$pbse=$_POST['pbse'];
	$pbshss=$_POST['pbshss'];
	$pbmisc=$_POST['pbmisc'];
	
	//Ebooks
	$ebsbs=$_POST['ebsbs'];
	$ebscee=$_POST['ebscee'];
	$ebse=$_POST['ebse'];
	$ebshss=$_POST['ebshss'];
	
	//E-Journals
	$ejsbs=$_POST['ejsbs'];
	$ejscee=$_POST['ejscee'];
	$ejse=$_POST['ejse'];
	$ejshss=$_POST['ejshss'];
	$ejid=$_POST['ejid'];
	
	//others
	$others=$_POST['others'];
	
	//school id's
	$sbsid=1;
	$sceeid=2;
	$seid=3;
	$shssid=4;
	$miscid=5;
	$idid=6;
	
	//collection id's
	$pbid=1;
	$ebid=2;
	$ejid=3;
	$otherid=4;
	
	
?>