<?php
require_once('config/config.php');
if(isset($_POST['CCid']) && $_POST['CCid']!=""){
	$CCid = $_POST['CCid'];
	$sqlCC = mysql_query("SELECT CostCenterName,StateId,StateName FROM hrm_costcenter INNER JOIN hrm_state ON hrm_costcenter.CostCenterName=hrm_state.StateId WHERE CostCenterId=".$CCid, $con) or die(mysql_error()); $resCC = mysql_fetch_assoc($sqlCC); ?>
	 <table>
		<tr><td style="font-size:11px; height:18px;">Name :</td><td>
           <select name="CostCenterName" id="CostCenterName" style="font-size:11px; width:220px; height:18px;">
			<option  value="<?php echo $resCC['StateId']; ?>" ><?php echo $resCC['StateName']; ?></option>
<?php $sqlState=mysql_query("select StateId,StateName from hrm_state order by StateName ASC", $con); while($resState=mysql_fetch_array($sqlState)) { ?>			
			<option  value="<?php echo $resState['StateId']; ?>" ><?php echo $resState['StateName']; ?></option><?php } ?>
			</select>
			<input type="hidden" name="CostCenterId" id="CostCenterId" value="<?php echo $CCid; ?>"/></td></tr>
	 </table>
	   
<?php } ?>
