<?php
	//find cid
	$query="select cid from collection_table where collection='".$collection."'";
	$result=mysqli_query($connection,$query);
	$row=mysqli_fetch_row($result);
	$cid=$row[0];
	
	//total cost
	$query="select sanctioned_amount from year_table where years=$year and cid=$cid";
	$result=mysqli_query($connection,$query);
	$total_amount=0;
	if($result && mysqli_num_rows($result)>0){
		$row=mysqli_fetch_row($result);
		if($row[0]!='')
			$total_amount=$row[0];
	}
	
	//sbs
	$query="select sanctioned_amount from amount_table where years=$year and cid=$cid and sid in (select sid from school_table where school='SBS')";
	$result=mysqli_query($connection,$query);
	$sbs=0;
	if($result){
		$row=mysqli_fetch_row($result);
		if($row[0]!='')
			$sbs=$row[0];
	}
	
	//scee
	$query="select sanctioned_amount from amount_table where years=$year and cid=$cid and sid in (select sid from school_table where school='SCEE')";
	$result=mysqli_query($connection,$query);
	$scee=0;
	if($result){
		$row=mysqli_fetch_row($result);
		if($row[0]!='')
			$scee=$row[0];
	}
	
	//SE
	$query="select sanctioned_amount from amount_table where years=$year and cid=$cid and sid in (select sid from school_table where school='SE')";
	$result=mysqli_query($connection,$query);
	$se=0;
	if($result){
		$row=mysqli_fetch_row($result);
		if($row[0]!='')
			$se=$row[0];
	}
	
	//SHSS
	$query="select sanctioned_amount from amount_table where years=$year and cid=$cid and sid in (select sid from school_table where school='SHSS')";
	$result=mysqli_query($connection,$query);
	$shss=0;
	if($result){
		$row=mysqli_fetch_row($result);
		if($row[0]!='')
			$shss=$row[0];
	}
	
	//misc
	$query="select sanctioned_amount from amount_table where years=$year and cid=$cid and sid in (select sid from school_table where school='Misc')";
	$result=mysqli_query($connection,$query);
	$misc=0;
	if($result){
		$row=mysqli_fetch_row($result);
		if($row[0]!='')
			$misc=$row[0];
	}
	
	//interdisciplinary
	$query="select sanctioned_amount from amount_table where years=$year and cid=$cid and sid in (select sid from school_table where school='InterDisciplinary')";
	$result=mysqli_query($connection,$query);
	$id=0;
	if($result){
		$row=mysqli_fetch_row($result);
		if($row[0]!='')
			$id=$row[0];
	}
	
	$sbsper=0;
	$sceeper=0;
	$shssper=0;
	$seper=0;
	$miscper=0;
	$idper=0;	
	
	if($collection=='Print Books'){
		$total=($sbs+$scee+$se+$shss+$misc);
		if($total!=0){
			$sbsper=round((($sbs/$total)*100),2);
			$sceeper=round((($scee/$total)*100),2);
			$seper=round((($se/$total)*100),2);
			$shssper=round((($shss/$total)*100),2);
			$miscper=round((($misc/$total)*100),2);
		}
	}
	else if($collection=='E-Books'){
		$total=($sbs+$scee+$se+$shss);
		if($total!=0){
			$sbsper=round((($sbs/$total)*100),2);
			$sceeper=round((($scee/$total)*100),2);
			$seper=round((($se/$total)*100),2);
			$shssper=round((($shss/$total)*100),2);
		}
	}
	else if($collection=='E-Journals'){
		$total=($sbs+$scee+$se+$shss+$id);
		if($total!=0){
			$sbsper=round((($sbs/$total)*100),2);
			$sceeper=round((($scee/$total)*100),2);
			$seper=round((($se/$total)*100),2);
			$shssper=round((($shss/$total)*100),2);
			$idper=round((($id/$total)*100),2);
		}
	}
	
	//sbs spent
	$query="select sum(proposed_amount) from expenditure_table where years=$year and cid=$cid and sid in (select sid from school_table where school='SBS')";
	$result=mysqli_query($connection,$query);
	$sbs_spent=0;
	if($result){
		$row=mysqli_fetch_row($result);
		if($row[0]!='')
			$sbs_spent=$row[0];
	}
	
	//scee
	$query="select sum(proposed_amount) from expenditure_table where years=$year and cid=$cid and sid in (select sid from school_table where school='SCEE')";
	$result=mysqli_query($connection,$query);
	$scee_spent=0;
	if($result){
		$row=mysqli_fetch_row($result);
		if($row[0]!='')
			$scee_spent=$row[0];
	}
	
	//SE
	$query="select sum(proposed_amount) from expenditure_table where years=$year and cid=$cid and sid in (select sid from school_table where school='SE')";
	$result=mysqli_query($connection,$query);
	$se_spent=0;
	if($result){
		$row=mysqli_fetch_row($result);
		if($row[0]!='')
			$se_spent=$row[0];
	}
	
	//SHSS
	$query="select sum(proposed_amount) from expenditure_table where years=$year and cid=$cid and sid in (select sid from school_table where school='SHSS')";
	$result=mysqli_query($connection,$query);
	$shss_spent=0;
	if($result){
		$row=mysqli_fetch_row($result);
		if($row[0]!='')
			$shss_spent=$row[0];
	}
	
	//misc
	$query="select sum(proposed_amount) from expenditure_table where years=$year and cid=$cid and sid in (select sid from school_table where school='Misc')";
	$result=mysqli_query($connection,$query);
	$misc_spent=0;
	if($result){
		$row=mysqli_fetch_row($result);
		if($row[0]!='')
			$misc_spent=$row[0];
	}
	
	//interdisciplinary
	$query="select sum(proposed_amount) from expenditure_table years=$year and cid=$cid and sid in (select sid from school_table where school='InterDisciplinary')";
	$result=mysqli_query($connection,$query);
	$id_spent=0;
	if($result){
		$row=mysqli_fetch_row($result);
		if($row[0]!='')
			$id_spent=$row[0];
	}
	
	//remaining amounts
	$sbsrem=$sbs-$sbs_spent;
	$sceerem=$scee-$scee_spent;
	$shssrem=$shss-$shss_spent;
	$serem=$se-$se_spent;
	$miscrem=$misc-$misc_spent;
	$idrem=$id-$id_spent;
?>