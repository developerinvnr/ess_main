<?php
require_once('config/config.php');
if(isset($_POST['Desigid']) && $_POST['Desigid']!=""){
	$Desigid = $_POST['Desigid'];
	$sqlDesig = mysql_query("SELECT * FROM hrm_designation WHERE DesigId=".$Desigid, $con) or die(mysql_error()); $resDesig = mysql_fetch_assoc($sqlDesig); ?>
	 <table>
		<tr><td style="font-size:11px; height:18px;">Designation :</td><td><input name="DesigName" id="DesigName" style="font-size:11px; width:220px; height:20px;" value="<?php echo $resDesig['DesigName']; ?>"/></td></tr>
	    <tr><td style="font-size:11px; height:18px;">Code :&nbsp;</td><td><input name="DesigCode" id="DesigCode" style="font-size:11px; width:150px; height:20px;" value="<?php echo $resDesig['DesigCode']; ?>" readOnly/></td></tr>
	    <tr><td style="font-size:11px; height:18px;">P. Code :&nbsp;</td><td><input name="Desig_ShortCode" id="Desig_ShortCode" style="font-size:11px; width:150px; height:20px;" value="<?php echo $resDesig['Desig_ShortCode']; ?>"/></td></tr>
	    
	    <tr><td style="font-size:11px; height:18px;">Status :&nbsp;</td><td><select name="Desig_Sts" id="Desig_Sts" style="font-size:11px; width:150px; height:20px;"><option value="A" <?php if($resDesig['DesigStatus']=='A'){echo 'selected';}?>>Active</option><option value="D" <?php if($resDesig['DesigStatus']=='D'){echo 'selected';}?>>Deactive</option></select>
		
		<input type="hidden" name="DesigId" id="DesigId" value="<?php echo $Desigid; ?>"/></td></tr>
	    
	 </table>
	   
<?php } ?>
