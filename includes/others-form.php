<style>
form{
	width:80%;
	background-color:#ffffcc;	
}
#indenter_textarea{
	width:220px;
	height:100px;
	resize:none;
	border-radius:10px;
}
.table td{
	text-align:center;
}
legend{
	background-color:#F60;
	COLOR:white;
}
th{
	background-color:#F60;	
}
th{
	text-align:center;	
}

</style>
	
<center>
<form action="others-insert.php" method="post">
	<fieldset>
    <legend>ADD ITEM</legend>
    <table>
    	<tr>
        	<td class='col1'>Financial Year </td>
            <td class='col2'><input name='year' readonly type="text" value="<?php echo $year; ?>" /></td>
        </tr>
        
        <tr>
        	<td class='col1'>Category </td>
            <td class='col2'>
            	<select id='category' name="category">
                	<option selected disabled="disabled" >Select--- </option>
                    <option value="Consumable">Consumable</option>
                    <option value="Minor">Minor</option>
                    <option value="Major">Major</option>
                </select>
            </td>
        </tr>
        
        <tr>
        	<td class='col1'>Item Name </td>
            <td class='col2'><input type="text" name='item' /></td>
        </tr>
        
    	<tr>
        	<td class='col1'>Quantity </td>
            <td class='col2'><input type="text" name='quantity' /></td>
        </tr>
        
        <tr>
        	<td class='col1'>Invoice Number </td>
            <td class='col2'><input type="text" name='invoice_no' /></td>
        </tr>
        
        <tr>
        	<td class='col1'>Invoice Date </td>
            <td class='col2'><input type="date" name='invoice_date' /></td>
        </tr>
        
        <tr>
        	<td class='col1'>Source </td>
            <td class='col2'><input type="text" name='source' /></td>
        </tr>
        
        <tr>
        	<td class='col1'>Price </td>
            <td class='col2'><input type="text" name="price" /></td>
        </tr>
        
        <tr>
        	<td class='col1'>Location </td>
            <td class='col2'><input type="text" name="location" /></td>
        </tr>
        
        <tr>
        	<td class='col1'>Remarks </td>
            <td class='col2'><textarea id='indenter_textarea' type="text" name="remarks" id='indenter_detail'></textarea></td>
        </tr>
    </table>
    
    <input type="submit" name="submit" id="submit"/>
    
    </fieldset>
</form>
</center>