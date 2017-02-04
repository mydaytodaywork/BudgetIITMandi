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
</style>
	
<center>
<form action="proposal-insert.php" method="post">
	<fieldset>
    <legend>Proposal Form</legend>
    <table>
    	<tr>
        	<td class='col1'>Financial Year </td>
            <td class='col2'><input readonly type="text" value="<?php echo $year; ?>" /></td>
        </tr>
        
        <tr>
        	<td class='col1'>Collection </td>
            <td class='col2'><input readonly type="text" value="<?php echo $collection;?>" /></td>
        </tr>
        
        <tr>
        	<td class='col1'>School </td>
            <td class='col2'><input readonly type="text" value="<?php echo $school; ?>" /></td>
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
        	<td class='col1'>Proposed Amount </td>
            <td class='col2'><input type="text" name="proposed_amount" id='proposed_amount' /></td>
        </tr>
        
        <tr>
        	<td class='col1'>Indent Number </td>
            <td class='col2'><input type="text" name="indent_number" id='indent_number' /></td>
        </tr>
        
        <tr>
        	<td class='col1'>Indenter Detail </td>
            <td class='col2'><textarea id='indenter_textarea' type="text" name="indenter_detail" id='indenter_detail'></textarea></td>
        </tr>
        
        <tr>
        	<td class='col1'>Subject </td>
            <td class='col2'><input type="text" name="subject" id='subject' /></td>
        </tr>
        
        <tr>
        	<td class='col1'>Title </td>
            <td class='col2'><input type="text" name="title" id='title' /></td>
        </tr>
        
        <tr>
        	<td class='col1'>Copies </td>
            <td class='col2'><input type="text" name="copies" id='copies' /></td>
        </tr>
        
        
    </table>
    
    <input type="submit" name="submit" id="submit"/>
    
    </fieldset>
</form>
</center>