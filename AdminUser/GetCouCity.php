<?php
require_once('config/config.php');
if(isset($_POST['Ciid']) && $_POST['Ciid']!=""){
	$Ciid = $_POST['Ciid']; ?>
	<select style="width:180px; background-color:#F1EDF8;" name="CitySelect" id="CitySelect" size="8" onChange="selectCity(this.value)">	
	<?php $sqlCi = mysql_query("SELECT * FROM hrm_city where StateId=".$Ciid." order by CityName ASC", $con) or die(mysql_error()); while($resCi = mysql_fetch_array($sqlCi)){ ?>
	<option value="<?php echo $resCi['CityId']; ?>">&nbsp;<?php echo $resCi['CityName']; ?></option><?php } ?></select>
	<input type="hidden" name="CityStateId" id="CityStateId" value="<?php echo $Ciid; ?>" />
<?php } ?>
