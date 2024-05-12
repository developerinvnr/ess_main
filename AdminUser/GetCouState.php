<?php
require_once('config/config.php');
if(isset($_POST['CSid']) && $_POST['CSid']!=""){
	$CSid = $_POST['CSid']; ?>
	<select style="width:180px; background-color:#F1EDF8;" name="StateSelect" id="StateSelect" size="8" onChange="selectState(this.value)">	
	<?php $sqlCS = mysql_query("SELECT * FROM hrm_state where CountryId=".$CSid." order by StateName ASC", $con) or die(mysql_error()); while($resCS = mysql_fetch_array($sqlCS)){ ?>
	<option value="<?php echo $resCS['StateId']; ?>">&nbsp;<?php echo $resCS['StateName']; ?></option><?php } ?></select>
<?php } ?>
