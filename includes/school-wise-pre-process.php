<?php
	//school id from db
	$query="select sid from school_table where school='".$school."'";
	$result=mysqli_query($connection,$query);
	$row=mysqli_fetch_row($result);
	$sid=$row[0];
	
	//collection
	$query="select collection from collection_table where cid=$cid";
	$result=mysqli_query($connection,$query);
	$row=mysqli_fetch_row($result);
	$collection=$row[0];
	
	//from expenditure_table
	$expenditure_query="SELECT `indent_no`, `indenter_detail`, `subject`, `no_of_titles`, `copies`, `proposed_amount`, `remark`,`proposal_date` FROM `expenditure_table` WHERE years=$year and sid=$sid and cid=$cid order by eno";
	$expenditure_result=mysqli_query($connection,$expenditure_query);
	
	
	//from amount_table get sanctioned amount
	$sanctioned_query="select sanctioned_amount from amount_table where years=$year and cid=$cid and sid=$sid";
	$sanctioned_result=mysqli_query($connection,$sanctioned_query);
	$total=0;
	if($sanctioned_result){
		$sanctioned_row=mysqli_fetch_row($sanctioned_result);
		$total=$sanctioned_row[0];
	}
	
	
?>