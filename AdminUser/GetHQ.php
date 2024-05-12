<?php
require_once('config/config.php');
if(isset($_POST['HQid']) && $_POST['HQid']!=""){
	$HQid = $_POST['HQid'];
	$sqlHQ = mysql_query("SELECT * FROM hrm_headquater WHERE HqId=".$HQid, $con) or die(mysql_error()); $resHQ = mysql_fetch_assoc($sqlHQ);
	$sqlState = mysql_query("SELECT * FROM hrm_state WHERE StateId=".$resHQ['StateId'], $con) or die(mysql_error()); $resState = mysql_fetch_assoc($sqlState); ?>
	 <table>
	  <tr><td style="font-size:11px; height:18px;">Head Quater :</td><td><input name="HQName" id="HQName" value="<?php echo $resHQ['HqName']; ?>" style="font-size:11px; width:220px; height:18px;"/></td></tr>
	  <tr><td style="font-size:11px; height:18px;">State :&nbsp;</td><td>
	  <select name="HQState" id="HQState" style="font-size:11px; width:150px; height:18px;">
	  <option value="<?php echo $resState['StateId']; ?>"><?php echo $resState['StateName']; ?></option>
<?php $sqlS = mysql_query("SELECT * FROM hrm_state", $con) or die(mysql_error()); while($resS = mysql_fetch_assoc($sqlS)){ ?>  
      <option value="<?php echo $resS['StateId']; ?>"><?php echo $resS['StateName']; ?></option><?php } ?>
	  </select><input type="hidden" name="HQId" id="HQId" value="<?php echo $HQid; ?>"/></td></tr>
	</table>
	   
<?php } ?>
