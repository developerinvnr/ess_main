<?php
require_once('config/config.php');
if(isset($_POST['VTid']) && $_POST['VTid']!=""){
	$VTid = $_POST['VTid']; 
	$sqlVType = mysql_query("select VendorsTypeName from hrm_vendortype WHERE VendorTypeId=".$VTid, $con) or die(mysql_error()); $resVType = mysql_fetch_array($sqlVType); ?>
	<input type="text" name="VTypeName" id="VTypeName" style="font-size:11px; width:220px; height:18px;" value="<?php echo $resVType['VendorsTypeName']; ?>"/>
	<input type="hidden" name="VTypeNameId" id="VTypeNameId" value="<?php echo $VTid;?>"/>
<?php } ?>
