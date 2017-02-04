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
<?php 
	$other_update="SELECT `ono`, `category`, `item_name`, `quantity`, `invoice_date`, `source`, `price`, `location`, `remarks` FROM `others_table` WHERE years={$_GET['year']} and invoice_no='{$_GET['invoiceno']}'";
	$other_update_result=mysqli_query($connection,$other_update);
	$other_row=mysqli_fetch_row($other_update_result);
	$ono=$other_row[0];
	$category=$other_row[1];
	$item=$other_row[2];
	$quantity=$other_row[3];
	$invoice_date=$other_row[4];
	$source=$other_row[5];
	$price=$other_row[6];
	$location=$other_row[7];
	$remarks=$other_row[8];
	$invoiceno=$_GET['invoiceno'];
?>

<center>
<form action="includes/other-data-update.php" method="post">
	<fieldset>
    <legend>EDIT ITEM</legend>
    <table>
    	<tr>
        	<td class='col1'>Financial Year </td>
            <td class='col2'><input name='year' readonly type="text" value="<?php echo $year; ?>" /></td>
        </tr>
        
        <tr>
        	<td class='col1'>Category </td>
            <td class='col2'>
            	<select id='category' name="category">
                	<option <?php if($category=='Consumable') echo "selected"; ?> value="Consumable">Consumable</option>
                    <option <?php if($category=='Minor') echo "selected"; ?> value="Minor">Minor</option>
                    <option <?php if($category=='Major') echo "selected"; ?> value="Major">Major</option>
                </select>
            </td>
        </tr>
        
        <tr>
        	<td class='col1'>Item Name </td>
            <td class='col2'><input type="text" name='item' value="<?php echo $item; ?>" /></td>
        </tr>
        
    	<tr>
        	<td class='col1'>Quantity </td>
            <td class='col2'><input type="text" name='quantity' value="<?php echo $quantity; ?>" /></td>
        </tr>
        
        <tr>
        	<td class='col1'>Invoice Number </td>
            <td class='col2'><input type="text" name='invoice_no' value="<?php echo $invoiceno; ?>" /></td>
        </tr>
        
        <tr>
        	<td class='col1'>Invoice Date </td>
            <td class='col2'><input type="date" name='invoice_date' value="<?php echo $invoice_date; ?>" /></td>
        </tr>
        
        <tr>
        	<td class='col1'>Source </td>
            <td class='col2'><input type="text" name='source' value="<?php echo $source; ?>"/></td>
        </tr>
        
        <tr>
        	<td class='col1'>Price </td>
            <td class='col2'><input type="text" name="price" value="<?php echo $price; ?>" /></td>
        </tr>
        
        <tr>
        	<td class='col1'>Location </td>
            <td class='col2'><input type="text" name="location" value="<?php echo $location; ?>"/></td>
        </tr>
        
        <tr>
        	<td class='col1'>Remarks </td>
            <td class='col2'><textarea id='indenter_textarea' type="text" name="remarks" id='indenter_detail'><?php echo $remarks; ?></textarea></td>
        </tr>
    </table>
    <input type="hidden" name="ono" value="<?php echo $ono;?>"/>
    <input type="submit" name="submit" id="submit"/>
    
    </fieldset>
</form>
</center>