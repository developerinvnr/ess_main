<?php
require_once('config/config.php');
if(isset($_POST['Cid']) && $_POST['Cid']!=""){
	$Cid = $_POST['Cid'];
	$sqlState = mysql_query("SELECT StateId,StateName FROM hrm_state WHERE CountryId=".$Cid." order by StateName ASC", $con) or die(mysql_error()); ?>
	<select style="font-size:11px; width:170px; height:18px;" name="ComState" onChange="SelectState(this.value)">
	<?php while($resState = mysql_fetch_array($sqlState)){ ?>
	<option value="<?php echo $resState['StateId']; ?>">&nbsp;<?php echo $resState['StateName']; ?></option><?php } ?>
	</select>
<?php } ?>
