<?php
require_once('config/config.php');
if(isset($_POST['VNid']) && $_POST['VNid']!=""){
$VNid = $_POST['VNid'];
$sqlVName = mysql_query("select VendorsName from hrm_vendorname WHERE VendorNameId=".$VNid, $con) or die(mysql_error()); $resVName = mysql_fetch_array($sqlVName); ?>
<input type="text" name="VNameS" id="VNameS" style="font-size:11px; width:180px; height:18px;" value="<?php echo $resVName['VendorsName']; ?>"/>
<input type="hidden" name="VNameSId" id="VNameSId" value="<?php echo $VNid;?>"/>
<?php } ?>