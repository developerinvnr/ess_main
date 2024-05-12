<?php
require_once('config/config.php');
if(isset($_POST['Caid']) && $_POST['Caid']!=""){
	$Caid = $_POST['Caid'];
	$sqlCa = mysql_query("SELECT * FROM hrm_category where CategoryId=".$Caid, $con) or die(mysql_error()); $resCa = mysql_fetch_assoc($sqlCa); ?>
	 <table>
		<tr><td style="font-size:11px; height:18px;">Name :</td><td><input name="CategoryName" id="CategoryName" style="font-size:11px; width:150px; height:18px;" value="<?php echo $resCa['CategoryName']; ?>"/><input type="hidden" name="CategoryId" id="CategoryId" value="<?php echo $Caid; ?>"/></td></tr>
	 </table>
	   
<?php } ?>
