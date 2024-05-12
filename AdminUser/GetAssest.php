<?php
require_once('config/config.php');
if(isset($_POST['Asstid']) && $_POST['Asstid']!=""){
	$Asstid = $_POST['Asstid'];
	$sqlAsst = mysql_query("SELECT * FROM hrm_assest_name WHERE AssestNameId=".$Asstid, $con) or die(mysql_error()); $resAsst = mysql_fetch_assoc($sqlAsst); ?>
	 <table>
		<tr><td style="font-size:11px; height:18px;">Assest Name :</td><td><input name="AsstName" id="AsstName" style="font-size:11px; width:220px; height:18px;" value="<?php echo $resAsst['AssestName']; ?>"/><input type="hidden" name="AsstId" id="AsstId" value="<?php echo $Asstid; ?>"/></td></tr>
	 </table>   
<?php } ?>
