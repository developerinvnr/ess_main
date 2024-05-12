<?php
require_once('config/config.php');
if(isset($_POST['Secid']) && $_POST['Secid']!=""){
	$Secid = $_POST['Secid'];
	$sqlSec = mysql_query("SELECT * FROM hrm_section where SectionId=".$Secid, $con) or die(mysql_error()); $resSec = mysql_fetch_assoc($sqlSec); ?>
	 <table>
		<tr><td style="font-size:11px; height:18px;">Name :</td><td><input name="SectionName" id="SectionName" style="font-size:11px; width:150px; height:18px;" value="<?php echo $resSec['SectionName']; ?>"/><input type="hidden" name="SectionId" id="SectionId" value="<?php echo $Secid; ?>"/></td></tr>
	 </table>
	   
<?php } ?>
