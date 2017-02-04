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
	
<center>
<form action="proposal-insert.php" method="post">
	<fieldset>
    <legend>Add Indenter Detail</legend>
    <table>
    	<tr>
        	<td class='col1'>Financial Year </td>
            <td class='col2'><input name='year' readonly type="text" value="<?php echo $year; ?>" /></td>
        </tr>
        
        <tr>
        	<td class='col1'>Collection </td>
            <td class='col2'><input readonly type="text" value="<?php echo $collection;?>" name='collection'/></td>
        </tr>
        
        <tr>
        	<td class='col1'>School </td>
            <td class='col2'><input readonly type="text" value="<?php echo $school; ?>" name="school" /></td>
        </tr>
        
    	<tr>
        	<td class='col1'>Total Allocated Amount </td>
            <td class='col2'><input readonly type="text" value="<?php echo $total; ?>" /></td>
        </tr>
        
        <tr>
        	<td class='col1'>Amount Spent Till Today</td>
            <td class='col2'><input readonly type="text" value="<?php echo $spent; ?>" /></td>
        </tr>
        
        <tr>
        	<td class='col1'>Remaining Amount </td>
            <td class='col2'><input readonly type="text" value="<?php echo $pending?>" /></td>
        </tr>
        
        <tr>
        	<td class='col1'>Date </td>
            <td class='col2'><input type="date" name="date" id='date' /></td>
        </tr>
        
        <tr>
        	<td class='col1'>Proposed Amount </td>
            <td class='col2'><input type="text" name="proposed_amount" id='proposed_amount' /></td>
        </tr>
        
        <tr>
        	<td class='col1'>Indent Number </td>
            <td class='col2'><input type="text" name="indent_number" id='indent_number' /></td>
        </tr>
        
        <tr>
        	<td class='col1'>Indenter Detail </td>
            <td class='col2'><input type="text" name="indenter_detail" id='indenter_detail'/></td>
        </tr>
        
        <tr>
        	<td class='col1'>Subject </td>
            <td class='col2'><input type="text" name="subject" id='subject' /></td>
        </tr>
        
        <tr>
        	<td class='col1'>Titles </td>
            <td class='col2'><input type="text" name="title" /></td>
        </tr>
        
        <tr>
        	<td class='col1'>Copies </td>
            <td class='col2'><input type="text" name="copies" id='copies' /></td>
        </tr>
        
        <tr>
        	<td class='col1'>Remarks </td>
            <td class='col2'><textarea id='remarks' type="text" name="remarks"></textarea></td>
        </tr>
    </table>
    
    <input type="hidden" value="<?php echo $sid?>" name="sid"/>
    <input type="hidden" value="<?php echo $cid?>" name="cid"/>
    <input type="submit" name="submit" id="submit"/>
    
    </fieldset>
</form>
</center>