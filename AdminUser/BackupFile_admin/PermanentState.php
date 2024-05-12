<?php
require_once('config/config.php');
if(isset($_POST['Stateid']) && $_POST['Stateid']!=""){
	$Stateid = $_POST['Stateid']; ?>
	<select class="All_120" id="EmpPerAddCity" name="EmpPerAddCity" style="text-transform:uppercase;">
	<?php $sqlCity = mysql_query("SELECT * FROM hrm_city where StateId=".$Stateid." order by CityName ASC", $con) or die(mysql_error()); while($resCity = mysql_fetch_array($sqlCity)) {?>
	<option value="<?php echo $resCity['CityId']; ?>"><?php echo $resCity['CityName']; ?></option><?php } ?></select>
	<input type="hidden" name="StateIdPer" id="StateIdPer" value="<?php echo $Stateid; ?>"/>
<?php } ?>