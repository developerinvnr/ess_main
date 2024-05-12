<?php
require_once('config/config.php');
if(isset($_POST['VTid3']) && $_POST['VTid3']!=""){
	  $VTid3 = $_POST['VTid3']; ?>
	  <select style="font-size:11px; background-color:#DDFFBB; width:180px; height:18px;" name="VNameSelectD" id="VNameSelectD" onChange="selectVNameD(this.value)">
	 <option style="background-color:#DBD3E2; " value="">&nbsp;Select</option>
<?php $sqlVType3 = mysql_query("select VendorNameId,VendorsName from hrm_vendorname WHERE VendorTypeId=".$VTid3." AND VendorsNameStatus='A'", $con) or die(mysql_error()); 
      while($resVType3 = mysql_fetch_array($sqlVType3)) { ?>
	  <option value="<?php echo $resVType3['VendorNameId']; ?>">&nbsp;<?php echo $resVType3['VendorsName']; ?></option><?php } ?>
      </select> <input type="hidden" name="VTypeId" id="VTypeId" value="<?php echo $VTid3; ?>" />
<?php } ?>
