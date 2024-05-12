<?php
require_once('config/config.php');
if(isset($_POST['CSCid']) && $_POST['CSCid']!=""){
	$CSCid = $_POST['CSCid']; ?>
	<select style="font-size:11px; width:180px; height:18px; background-color:#DDFFBB;" name="CouCitySelect" id="CouCitySelect" onChange="selectCouCity(this.value)">
	<?php $sqlCSC = mysql_query("SELECT * FROM hrm_state where CountryId=".$CSCid." order by StateName ASC", $con) or die(mysql_error()); while($resCSC = mysql_fetch_array($sqlCSC)){ ?>
	<option value="<?php echo $resCSC['StateId']; ?>">&nbsp;<?php echo $resCSC['StateName']; ?></option><?php } ?></select>
<?php } ?>
