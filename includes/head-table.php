<style>
.click-school{
	color:blue;	
}
.click-school:hover{
	cursor:pointer;	
}
</style>
<form action="insert-head-data.php" method="post">
<table class="table table-bordered">
    <th>Collection Detail </th>
    <th>Sanctioned Amount </th>
    <th>School </th>
    <th>%</th>
    <th>Sanctioned Amount</th>
    <th>Amount Spent</th>
	<th>Pending Amount</th>
    
    <tr>
    	<td rowspan="<?php echo $rowspan; ?>"><?php echo $collection?></td>
        <td rowspan="<?php echo $rowspan; ?>"><input type="text" value='<?php echo $total_amount; ?>' name='total'></td>
        <td><div id='SBS' class="click-school">SBS</div></td>
        <td><?php echo $sbsper; ?></td>
        <td><input type="text" value='<?php echo $sbs; ?>' name='sbs'></td>
        <td><?php echo $sbs_spent; ?></td>
        <td><?php echo $sbsrem; ?></td>
    </tr>
    
    <tr>
        <td><div class="click-school" id='SCEE'>SCEE</div></td>
        <td><?php echo $sceeper; ?></td>
        <td><input type="text" value='<?php echo $scee; ?>' name='scee'></td>
        <td><?php echo $scee_spent; ?></td>
        <td><?php echo $sceerem; ?></td>
    </tr>
    
    <tr>
        <td><div class="click-school" id='SE'>SE</div></td>
        <td><?php echo $seper; ?></td>
        <td><input type="text" value='<?php echo $se; ?>' name='se'></td>
        <td><?php echo $se_spent; ?></td>
        <td><?php echo $serem; ?></td>
    </tr>
    
    <tr>
        <td><div class="click-school" id='SHSS'>SHSS</div></td>
        <td><?php echo $shssper; ?></td>
        <td><input type="text" value='<?php echo $shss; ?>' name='shss'></td>
        <td><?php echo $shss_spent; ?></td>
        <td><?php echo $shssrem; ?></td>
    </tr>
    
    <?php
		if($collection=='Print Books'){
	?>
    <tr>
        <td><div class="click-school" id='Misc'>Misc</div></td>
        <td><?php echo $miscper; ?></td>
        <td><input type="text" value='<?php echo $misc; ?>' name='misc'></td>
        <td><?php echo $misc_spent; ?></td>
        <td><?php echo $miscrem; ?></td>
    </tr>
    <?php
		}
		else if($collection=='E-Journals'){
	?>
    <tr>
        <td><div class="click-school" id='InterDisciplinary'>InterDisciplinary</div></td>
        <td><?php echo $idper; ?></td>
        <td><input type="text" value='<?php echo $id; ?>' name='id'></td>
        <td><?php echo $id_spent; ?></td>
        <td><?php echo $idrem; ?></td>
    </tr>
    <?php
		}
	?>
    
</table>
<input type="hidden" value="<?php echo $year; ?>" name="year"/>
<input type="hidden" value="<?php echo $cid; ?>" name="cid"/>
<center><input type="submit" id='submit' name='submit' value="Upload"/></center>
</form>
