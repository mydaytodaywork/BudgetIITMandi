<style>
form{
	width:80%;
	background-color:#ffffcc;	
}
#indenter_textarea{
	width:250px;
	height:100px;
	resize:none;
	border-radius:10px;
}
legend{
	background-color:#F60;
	COLOR:white;
	}
#remarks{
	width:220px;
	height:100px;
	border-radius:5px;	
}
</style>

<?php
	$edit_query="SELECT `eno`,`proposal_date`, `subject`, `no_of_titles`, `copies`, `proposed_amount`, `remark` FROM `expenditure_table` WHERE indent_no='".$indentno."'";
	$edit_result=mysqli_query($connection,$edit_query);
	$edit_row=mysqli_fetch_row($edit_result);
	$eno=$edit_row[0];
	$proposal_date=$edit_row[1];
	$subject=$edit_row[2];
	$titles=$edit_row[3];
	$copies=$edit_row[4];
	$proposed_amount=$edit_row[5];
	$remark=$edit_row[6];
?>
<center>
<form action="school-data.php" method="post">
	<fieldset>
    <legend>Edit</legend>
    <table>
    	<tr>
        	<td class='col1'>Financial Year </td>
            <td class='col2'><input name='year' readonly type="text" value="<?php echo $year; ?>" /></td>
        </tr>
        
        <tr>
        	<td class='col1'>Collection </td>
            <td class='col2'><input readonly type="text" value="<?php echo $collection;?>" /></td>
        </tr>
        
        <tr>
        	<td class='col1'>Date </td>
            <td class='col2'><input type="date" name="date" id='date' value="<?php echo $proposal_date; ?>" /></td>
        </tr>
        
        <tr>
        	<td class='col1'>Proposed Amount </td>
            <td class='col2'><input type="text" name="proposed_amount" value="<?php echo $proposed_amount?>" id='proposed_amount' /></td>
        </tr>
        
        <tr>
        	<td class='col1'>Indent Number </td>
            <td class='col2'><input type="text" name="indent_number" id='indent_number' value="<?php echo $indentno?>" /></td>
        </tr>
        
        <tr>
        	<td class='col1'>Indenter Detail </td>
            <td class='col2'><input type="text" name="indenter_detail" id='indenter_detail' value="<?php echo $indenter?>"/></td>
        </tr>
        
        <tr>
        	<td class='col1'>Subject </td>
            <td class='col2'><input type="text" name="subject" id='subject'  value="<?php echo $subject?>"/></td>
        </tr>
        
        <tr>
        	<td class='col1'>Titles </td>
            <td class='col2'><input type="text" name="title" value="<?php echo $titles?>" /></td>
        </tr>
        
        <tr>
        	<td class='col1'>Copies </td>
            <td class='col2'><input type="text" name="copies" id='copies' value="<?php echo $copies?>" /></td>
        </tr>
        
        <tr>
        	<td class='col1'>Remarks </td>
            <td class='col2'><textarea id='remarks' type="text" name="remarks"><?php echo $remark?></textarea></td>
        </tr>
    </table>
    
    <div class="hidden-data">
        <input type="hidden" value="<?php echo $school;?>" name="school">
        <input type="hidden" value="<?php echo $sid;?>" name="sid">
        <input type="hidden" value="<?php echo $collection;?>" name="collection">
        <input type="hidden" value="<?php echo $cid;?>" name="cid">
        <input type="hidden" value="<?php echo $year;?>" name="year">
        <input type="hidden" value="<?php echo $indenter;?>" name="indenter">
        <input type="hidden" value="<?php echo $eno;?>" name="eno">
	</div>
    <input type="submit" id="submit" name="indenter-update-submit"/>
    
    </fieldset>
</form>
</center>