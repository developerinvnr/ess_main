<?php
require_once('config/config.php');
if(isset($_POST['Stid']) && $_POST['Stid']!=""){
	$Stid = $_POST['Stid']; ?>
	<?php $sqlSt = mysql_query("SELECT * FROM hrm_state where StateId=".$Stid."", $con) or die(mysql_error()); $resSt = mysql_fetch_array($sqlSt); ?>
	<input name="StateName" id="StateName" style="font-size:11px; width:180px; height:18px;" value="<?php echo $resSt['StateName']; ?>"/>
	<input type="hidden" name="StateId" id="StateId" value="<?php echo $resSt['StateId']; ?>" />
<?php } ?>