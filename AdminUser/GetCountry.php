<?php
require_once('config/config.php');
if(isset($_POST['Couid']) && $_POST['Couid']!=""){
	$Couid = $_POST['Couid'];
	$sqlCou = mysql_query("SELECT * FROM hrm_country where CountryId=".$Couid, $con) or die(mysql_error()); $resCou = mysql_fetch_assoc($sqlCou); ?>
	 <table>
		<tr><td style="font-size:11px; height:18px;">Name :</td><td><input name="CountryName" id="CountryName" style="font-size:11px; width:150px; height:18px;" value="<?php echo $resCou['CountryName']; ?>"/><input type="hidden" name="CountryId" id="CountryId" value="<?php echo $Couid; ?>"/></td></tr>
	 </table>
	   
<?php } ?>
