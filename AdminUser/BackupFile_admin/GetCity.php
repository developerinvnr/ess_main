<?php
require_once('config/config.php');
if(isset($_POST['Cityid']) && $_POST['Cityid']!=""){
	$Cityid = $_POST['Cityid']; ?>
	<?php $sqlCity = mysql_query("SELECT * FROM hrm_city where CityId=".$Cityid."", $con) or die(mysql_error()); $resCity = mysql_fetch_array($sqlCity); ?>
	<input name="CityName" id="CityName" style="font-size:11px; width:180px; height:18px;" value="<?php echo $resCity['CityName']; ?>"/>
	<input type="hidden" name="CityId" id="CityId" value="<?php echo $resCity['CityId']; ?>" />
<?php } ?>