<?php
require_once('config/config.php');
if(isset($_POST['VTid2']) && $_POST['VTid2']!=""){
	$VTid2 = $_POST['VTid2']; ?>
	  <select style="width:180px; background-color:#F1EDF8;" name="VNameSelect" id="VNameSelect" size="8" onChange="selectVName(this.value)">
<?php $sqlVType2 = mysql_query("select VendorNameId,VendorsName from hrm_vendorname WHERE VendorTypeId=".$VTid2." AND VendorsNameStatus='A'", $con) or die(mysql_error()); 
      while($resVType2 = mysql_fetch_array($sqlVType2)) { ?>
	  <option value="<?php echo $resVType2['VendorNameId']; ?>">&nbsp;<?php echo $resVType2['VendorsName']; ?></option><?php } ?>
      </select>
<?php } ?>
