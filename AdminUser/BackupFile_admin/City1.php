<?php
require_once('config/config.php');
if(isset($_POST['Sid']) && $_POST['Sid']!=""){
	$Sid = $_POST['Sid'];
	$sqlCity = mysql_query("SELECT CityId,CityName FROM hrm_city WHERE StateId=".$Sid." order by CityName ASC", $con) or die(mysql_error()); ?>
	<select style="font-size:11px; width:165px; height:18px;" name="VCity" id="VCity">
	<?php while($resCity = mysql_fetch_array($sqlCity)){ ?>
	<option value="<?php echo $resCity['CityId']; ?>">&nbsp;<?php echo $resCity['CityName']; ?></option><?php } ?>
	</select>
<?php } ?>
