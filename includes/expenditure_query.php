<?php
	$sanctioned_query="select sanctioned_amount,collection from year_table y,collection_table c where y.cid=c.cid and years=$year";
	$sanctioned_result=mysqli_query($connection,$sanctioned_query);
	
	$print_books=0;
	$ejournals=0;
	$ebooks=0;
	
	while($row=mysqli_fetch_row($sanctioned_result)){
		if($row[1]=='Print Books')
			$print_books=$row[0];
		else if($row[1]=='E-Journals')
			$ejournals=$row[0];
		else if($row[1]=='E-Books')
			$ebooks=$row[0];	
	}
	
	//get ids
	$sbsid=1;
	$sceeid=2;
	$seid=3;
	$shssid=4;
	$miscid=5;
	$interid=6;
	/*$id_query="select sid,school from school_table";
	$id_result=mysqli_query($connection,$id_query);
	while($row=mysqli_fetch_row($id_result)){
		
	}*/
	
	//collection_ids
	$pbid=1;
	$ebid=2;
	$ejid=3;
	
	//print books sanctioned amount
	$sasbspb=0;
	$sasceepb=0;
	$sashsspb=0;
	$sasepb=0;
	$samiscpb=0;
	$sainterpb=0;
	$query="select sanctioned_amount,sid from amount_table where cid=$pbid and years=$year";
	$result=mysqli_query($connection,$query);
	while($row=mysqli_fetch_row($result)){
		if($row[1]==$sbsid) $sasbspb=$row[0];
		else if($row[1]==$sceeid) $sasceepb=$row[0];
		else if($row[1]==$seid) $sasepb=$row[0];
		else if($row[1]==$shssid) $sashsspb=$row[0];
		else if($row[1]==$miscid) $samiscpb=$row[0];
	}
	
	//ebooks sanctioned amount
	$sasbseb=0;
	$sasceeeb=0;
	$sashsseb=0;
	$saseeb=0;
	$samisceb=0;
	$saintereb=0;
	$query="select sanctioned_amount,sid from amount_table where cid=$ebid and years=$year";
	$result=mysqli_query($connection,$query);
	while($row=mysqli_fetch_row($result)){
		if($row[1]==$sbsid) $sasbseb=$row[0];
		else if($row[1]==$sceeid) $sasceeeb=$row[0];
		else if($row[1]==$seid) $saseeb=$row[0];
		else if($row[1]==$shssid) $sashsseb=$row[0];
	}
	
	//ejournals sanctioned amount
	$sasbsej=0;
	$sasceeej=0;
	$sashssej=0;
	$saseej=0;
	$samiscej=0;
	$sainterej=0;
	$query="select sanctioned_amount,sid from amount_table where cid=$ejid and years=$year";
	$result=mysqli_query($connection,$query);
	while($row=mysqli_fetch_row($result)){
		if($row[1]==$sbsid) $sasbsej=$row[0];
		else if($row[1]==$sceeid) $sasceeej=$row[0];
		else if($row[1]==$seid) $saseej=$row[0];
		else if($row[1]==$shssid) $sashssej=$row[0];
		else if($row[1]==$interid) $sainterej=$row[0];
	}
	
	//print books spent amount
	$spsbspb=0;
	$spsceepb=0;
	$spshsspb=0;
	$spsepb=0;
	$spmiscpb=0;
	$spinterpb=0;
	$query="select sum(proposed_amount),sid from expenditure_table where cid=$pbid and years=$year group by sid";
	$result=mysqli_query($connection,$query);
	while($row=mysqli_fetch_row($result)){
		if($row[1]==$sbsid) $spsbspb=$row[0];
		else if($row[1]==$sceeid) $spsceepb=$row[0];
		else if($row[1]==$seid) $spsepb=$row[0];
		else if($row[1]==$shssid) $spshsspb=$row[0];
		else if($row[1]==$miscid) $spmiscpb=$row[0];
	}
	
	//ebooks spent amount
	$spsbseb=0;
	$spsceeeb=0;
	$spshsseb=0;
	$spseeb=0;
	$spmisceb=0;
	$spintereb=0;
	$query="select sum(proposed_amount),sid from expenditure_table where cid=$ebid and years=$year group by sid";
	$result=mysqli_query($connection,$query);
	while($row=mysqli_fetch_row($result)){
		if($row[1]==$sbsid) $spsbseb=$row[0];
		else if($row[1]==$sceeid) $spsceeeb=$row[0];
		else if($row[1]==$seid) $spseeb=$row[0];
		else if($row[1]==$shssid) $spshsseb=$row[0];
	}
	
	//ebooks spent amount
	$spsbsej=0;
	$spsceeej=0;
	$spshssej=0;
	$spseej=0;
	$spmiscej=0;
	$spinterej=0;
	$query="select sum(proposed_amount),sid from expenditure_table where cid=$ebid and years=$year group by sid";
	$result=mysqli_query($connection,$query);
	while($row=mysqli_fetch_row($result)){
		if($row[1]==$sbsid) $spsbsej=$row[0];
		else if($row[1]==$sceeid) $spsceeej=$row[0];
		else if($row[1]==$seid) $spseej=$row[0];
		else if($row[1]==$shssid) $spshssej=$row[0];
		else if($row[1]==$interid) $spinterej=$row[0];
	}
	
	//remamount .. straight calculate and put
	//sanctioned amount total
	$pb_sa_total=$sasbspb+$sashsspb+$sasceepb+$sasepb+$samiscpb;
	$eb_sa_total=$sasbseb+$sashsseb+$sasceeeb+$saseeb;
	$ej_sa_total=$sasbsej+$sashssej+$sasceeej+$saseej+$sainterej;
	
	//spent amount total
	$pb_sp_total=$spsbspb+$spshsspb+$spsceepb+$spsepb+$spmiscpb;
	$eb_sp_total=$spsbseb+$spshsseb+$spsceeeb+$spseeb;
	$ej_sp_total=$spsbsej+$spshssej+$spsceeej+$spseej+$spinterej;
?>







<?php
	function showtable($index,$collection,$total_amount,$sasbs,$sascee,$sase,$sashss,$samisc,$sainter,$spsbs,$spscee,$spse,$spshss,$spmisc,$spinter,$total,$spent_total){
		$rowspan=6;
		if($collection=='E-Books')
			$rowspan=5;
			
		$query="select cid from collection_table where collection='{$collection}'";
		$result=mysqli_query($GLOBALS['connection'],$query);
		$row=mysqli_fetch_row($result);
		$cid=$row[0];
		
		$remsbs=$sasbs-$spsbs;	
		$remscee=$sascee-$spscee;
		$remse=$sase-$spse;
		$remshss=$sashss-$spshss;
		echo "
		<tr>
			<td class='rowsp' rowspan='{$rowspan}'>".$index."</td>
			<td class='rowsp' rowspan='{$rowspan}'>".$collection."</td>
			<td class='rowsp' rowspan='{$rowspan}'>".$total_amount."</td>
			<td><div id='SBS' data-col='{$cid}' class='click-school'>SBS</div></td>
			<td>".round((($sasbs/$total)*100),2)."</td>
			<td>".$sasbs."</td>
			<td>".$spsbs."</td>
			<td>".$remsbs."</td>
		</tr>
		<tr>
			<td><div id='SCEE' data-col='{$cid}' class='click-school'>SCEE</div></td>
			<td>".round((($sascee/$total)*100),2)."</td>
			<td>".$sascee."</td>
			<td>".$spscee."</td>
			<td>".$remscee."</td>
		</tr>
		
		<tr>
			<td><div id='SE' data-col='{$cid}' class='click-school'>SE</div></td>
			<td>".round((($sase/$total)*100),2)."</td>
			<td>".$sase."</td>
			<td>".$spse."</td>
			<td>".$remse."</td>
		</tr>
		
		<tr>
			<td><div id='SHSS' data-col='{$cid}' class='click-school'>SHSS</div></td>
			<td>".round((($sashss/$total)*100),2)."</td>
			<td>".$sashss."</td>
			<td>".$spshss."</td>
			<td>".$remshss."</td>
		</tr>";
		
		if($collection=='Print Books'){
			$remmisc=$samisc-$spmisc;
			echo "<tr>
				<td><div id='Misc' data-col='{$cid}' class='click-school'>Misc</div></td>
				<td>".round((($samisc/$total)*100),2)."</td>
				<td>".$samisc."</td>
				<td>".$spmisc."</td>
				<td>".$remmisc."</td>
			</tr>";
		}
		
		else if($collection=='E-Journals'){
			$reminter=$sainter-$spinter;
			echo "<tr>
				<td><div id='InterDisciplinary' data-col='{$cid}' class='click-school'>InterDisciplinary</div></td>
				<td>".round((($sainter/$total)*100),2)."</td>
				<td>".$sainter."</td>
				<td>".$spinter."</td>
				<td>".$reminter."</td>
			</tr>";
		}
		$rem=$total-$spent_total;
		echo "<tr>
				<td class='total'>Total</td>
				<td class='total'>100%</td>
				<td class='total'>".$total."</td>
				<td class='total'>".$spent_total."</td>
				<td class='total'>".$rem."</td>
			</tr>";
		
	}
?>