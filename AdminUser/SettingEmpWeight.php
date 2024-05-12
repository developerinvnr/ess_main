<?php 
require_once('config/config.php');
if(isset($_POST['Eid']) && $_POST['Eid']!=""){	$Eid = $_POST['Eid'];  $Yid = $_POST['Yid'];?>
<form name="formEdit" method="post" onSubmit="return validateEdit(this)">	
	   <table border="1" width="950" border="1">
	    <tr bgcolor="#7a6189">
		   <td align="" style="width:40px;">&nbsp;</td>
		   <td colspan="8" align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:950px;">
<?php $sql=mysql_query("select * from hrm_employee where EmployeeID=".$Eid, $con);  $res=mysql_fetch_assoc($sql); ?> 		   
		   <b><?php echo $res['EmpCode'].' - '.$res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></b>
		   </td>  
		 </tr>
		 <tr bgcolor="#7a6189">
		   <td align="" style="width:40px;"><b>&nbsp;</b></td>
		   <td colspan="8"><table><tr>
		   <td align="" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>SN</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:300px;" valign="top" align="center"><b>KRA</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:300px;" valign="top" align="center"><b>Description</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:110px;" valign="top" align="center"><b>Measure</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:90px;" valign="top" align="center"><b>Unit</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:90px;" valign="top" align="center"><b>Weightage</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:90px;" valign="top" align="center"><b>Target</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:90px;" valign="top" align="center"><b>Status</b></td>	
		   </tr></table></td>   
		 </tr>
<?php $sql2=mysql_query("select KRASetting,EmpPmsId from hrm_employee_pms where AssessmentYear=".$Yid." AND EmployeeID=".$Eid, $con); $res2=mysql_fetch_assoc($sql2); 
      if($res2['KRASetting']=='Y') {
	  $sql3=mysql_query("select * from hrm_employee_pms_kraforma where EmpPmsId=".$res2['EmpPmsId']." order by KRAFormAId ASC", $con); $SNo=1; 
	  while($res3=mysql_fetch_array($sql3)) { 
	  $sql4=mysql_query("select * from hrm_pms_kra where KRAId=".$res3['KRAId'], $con); $res4=mysql_fetch_assoc($sql4);
?>
<tr>
   <td align="" style="width:40px;">&nbsp;</td>
   <td colspan="8"><table bgcolor="#FFFFFF"><tr>
   <td align="center" style="font:Georgia; font-size:12px; width:50px;">&nbsp;<?php echo $SNo; ?>&nbsp;</td>
   <td style="width:300px;" align="center">
   <input type="hidden" name="Eid" id="Eid" value="<?php echo $Eid; ?>" /><input type="hidden" name="Yid" id="Yid" value="<?php echo $Yid; ?>" />
   <input type="hidden" name="KraId_<?php echo $SNo; ?>" id="KraId_<?php echo $SNo; ?>" value="<?php echo $res3['KRAId']; ?>" />
   <input name="KRA_<?php echo $SNo; ?>" id="KRA" style="font-family:Georgia; font-size:12px; width:300px; height:20px;" maxlength="4" value="<?php echo $res4['KRA']; ?>" readonly /></td>
   <td style="width:300px;" align="center">
   <input name="KRA_Des_<?php echo $SNo; ?>" id="KRA_Des" style="font-family:Georgia; font-size:12px; width:300px; height:20px;" maxlength="4" value="<?php echo $res4['KRA_Description']; ?>" readonly /></td>
   <td style="width:90px;" align="center">
   <input name="Measure_<?php echo $SNo; ?>" id="Measure" style="font-family:Georgia; font-size:12px; width:110px; height:20px;text-align:center;" maxlength="4" value="<?php echo $res4['Measure']; ?>" readonly /></td>
   <td style="width:90px;" align="center">
   <input name="Unit_<?php echo $SNo; ?>" id="Unit" style="font-family:Georgia; font-size:12px; width:90px; height:20px;text-align:center;" maxlength="4" value="<?php echo $res4['Unit']; ?>" readonly /></td>
   <td style="width:90px;" align="center">
   <input name="Weightage_<?php echo $SNo; ?>" id="Weightage_<?php echo $SNo; ?>" style="font-family:Georgia; font-size:12px; width:90px; height:20px;text-align:center;" maxlength="4" value="<?php echo $res3['Weightage']; ?>"/></td>
   <td style="width:90px;" align="center">
   <input name="Target_<?php echo $SNo; ?>" id="Target" style="font-family:Georgia; font-size:12px; width:90px; height:20px;text-align:center;" maxlength="4" value="<?php echo $res3['Target']; ?>"/></td>
   <td style="width:90px;" align="center">
   <select name="KRAFormAStatus_<?php echo $SNo; ?>" id="KRAFormAStatus_<?php echo $SNo; ?>" style="font-size:11px; width:88px; height:18px; background-color:<?php if($res3['KRAFormAStatus']=='A'){ echo '#DDFFDD'; } if($res3['KRAFormAStatus']=='D'){ echo '#FBDEDD'; }?>;">
   <option value="<?php echo $res3['KRAFormAStatus']; ?>"><?php if($res3['KRAFormAStatus']=='A'){ echo 'Active'; } else { echo 'Deactive';} ?></option>
   <option value="<?php if($res3['KRAFormAStatus']=='A'){ echo 'D'; } else { echo 'A';} ?>"><?php if($res3['KRAFormAStatus']=='A'){ echo 'Deactive'; } else { echo 'Active';} ?></option>
   </select></td>
   </tr></table></td> 
</tr><?php $SNo++;} $no=$SNo-1; echo '<input type="hidden" name="Sno" id="Sno" value="'.$no.'" />';}
    elseif($res2['KRASetting']=='N') { $sql3=mysql_query("select * from hrm_pms_kra INNER JOIN hrm_pms_kra_designation ON hrm_pms_kra.KRAId=hrm_pms_kra_designation.KRAId INNER JOIN hrm_employee_general ON (hrm_pms_kra_designation.DesigId=hrm_employee_general.DesigId OR hrm_pms_kra_designation.DesigId=hrm_employee_general.DesigId2) where hrm_employee_general.EmployeeID=".$Eid." order by hrm_pms_kra_designation.KRAId ASC", $con); $SNo=1; while($res3=mysql_fetch_array($sql3)) { ?>
<tr>
   <td align="" style="width:40px;">&nbsp;</td>
   <td colspan="8"><table bgcolor="#FFFFFF"><tr>
   <td align="center" style="font:Georgia; font-size:12px; width:50px;">&nbsp;<?php echo $SNo; ?>&nbsp;</td>
   <td style="width:300px;" align="center">
  <input type="hidden" name="Eid" id="Eid" value="<?php echo $Eid; ?>" /><input type="hidden" name="Yid" id="Yid" value="<?php echo $Yid; ?>" />
  <input type="hidden" name="KraId_<?php echo $SNo; ?>" id="KraId_<?php echo $SNo; ?>" value="<?php echo $res3['KRAId']; ?>" />
   <input name="KRA_<?php echo $SNo; ?>" id="KRA" style="font-family:Georgia; font-size:12px; width:300px; height:20px;" maxlength="4" value="<?php echo $res3['KRA']; ?>" readonly /></td>
   <td style="width:300px;" align="center">
   <input name="KRA_Des_<?php echo $SNo; ?>" id="KRA_Des" style="font-family:Georgia; font-size:12px; width:300px; height:20px;" maxlength="4" value="<?php echo $res3['KRA_Description']; ?>" readonly /></td>
   <td style="width:90px;" align="center">
   <input name="Measure_<?php echo $SNo; ?>" id="Measure" style="font-family:Georgia; font-size:12px; width:110px; height:20px;text-align:center;" maxlength="4" value="<?php echo $res3['Measure']; ?>" readonly /></td>
   <td style="width:90px;" align="center">
   <input name="Unit_<?php echo $SNo; ?>" id="Unit" style="font-family:Georgia; font-size:12px; width:90px; height:20px;text-align:center;" maxlength="4" value="<?php echo $res3['Unit']; ?>" readonly /></td>
   <td style="width:90px;" align="center">
   <input name="Weightage_<?php echo $SNo; ?>" id="Weightage_<?php echo $SNo; ?>" style="font-family:Georgia; font-size:12px; width:90px; height:20px;text-align:center;" maxlength="4" value=""/></td>
   <td style="width:90px;" align="center">
   <input name="Target_<?php echo $SNo; ?>" id="Target_<?php echo $SNo; ?>" style="font-family:Georgia; font-size:12px; width:90px; height:20px;text-align:center;" maxlength="4" value=""/></td>
   <td style="width:90px;" align="center">
  <select name="KRAFormAStatus_<?php echo $SNo; ?>" id="KRAFormAStatus_<?php echo $SNo; ?>" style="font-size:11px; width:88px; height:18px;">
  <option value="A">Active</option><option value="D">Deactive</option></select></td>
  </tr></table></td> 
</tr><?php $SNo++;} } ?> <?php echo '<input type="hidden" name="Sno" id="Sno" value="'.$SNo.'" />'; ?>


<?php /*for($i=$SNo; $i<=12; $i++){ ?> 
 <tr>
    <td id="AppImg_<?php echo $i; ?>">
<img src="images/Addnew.png" <?php if($i>$SNo) { echo 'style="display:none;"';} ?> border="0" id="addImg_<?php echo $i; ?>" onClick="ShowRow(<?php echo $i; ?>)"/>
<img src="images/Minusnew.png" id="minusImg_<?php echo $i; ?>" <?php if($i>=$SNo){ echo 'style="display:none;"'; } ?> border="0" onClick="HideRow(<?php echo $i; ?>)"/></td>
   <td colspan="8">
		<table style="display:none;" id="Row_<?php echo $i; ?>" bgcolor="#FFFFFF">
		<tr>
   <td align="center" style="font:Georgia; font-size:12px; width:50px;">&nbsp;<?php echo $i;?>&nbsp;</td>	   
   <td style="width:300px;" align="center">
  <input type="hidden" name="Eid" id="Eid" value="<?php echo $Eid; ?>" /><input type="hidden" name="Yid" id="Yid" value="<?php echo $Yid; ?>" />
  <input type="hidden" name="KraId_<?php echo $i; ?>" id="KraId_<?php echo $i; ?>" value="<?php echo $res3['KRAId']; ?>" />
  <input name="KRAY_<?php echo $i; ?>" id="KRA_<?php echo $i; ?>" style="font-family:Georgia; font-size:12px; width:300px; height:20px;" maxlength="4" value="<?php echo $res3['KRA']; ?>" /></td>
   <td style="width:300px;" align="center">
   <input name="KRA_DesY_<?php echo $i; ?>" id="KRA_Des_<?php echo $i; ?>" style="font-family:Georgia; font-size:12px; width:300px; height:20px;" maxlength="4" value="<?php echo $res3['KRA_Description']; ?>" /></td>
   <td style="width:90px;" align="center">
   <input name="MeasureY_<?php echo $i; ?>" id="Measure_<?php echo $i; ?>" style="font-family:Georgia; font-size:12px; width:110px; height:20px;text-align:center;" maxlength="4" value="<?php echo $res3['Measure']; ?>" /></td>
   <td style="width:90px;" align="center">
   <input name="UnitY_<?php echo $i; ?>" id="Unit_<?php echo $i; ?>" style="font-family:Georgia; font-size:12px; width:90px; height:20px;text-align:center;" maxlength="4" value="<?php echo $res3['Unit']; ?>" /></td>
   <td style="width:90px;" align="center">
   <input name="WeightageY_<?php echo $i; ?>" id="Weightage_<?php echo $i; ?>" style="font-family:Georgia; font-size:12px; width:90px; height:20px;text-align:center;" maxlength="4" value=""/></td>
   <td style="width:90px;" align="center">
   <input name="TargetY_<?php echo $i; ?>" id="Target_<?php echo $i; ?>" style="font-family:Georgia; font-size:12px; width:90px; height:20px;text-align:center;" maxlength="4" value=""/></td>
   <td style="width:90px;" align="center">
  <select name="KRAFormAStatusY_<?php echo $i; ?>" id="KRAFormAStatus_<?php echo $i; ?>" style="font-size:11px; width:88px; height:18px;">
  <option value="A">Active</option><option value="D">Deactive</option></select></td>
  </tr>
		</table>
	 </td> 
 </tr>		  	 	 
<?php } $snoY=$i-1; echo '<input type="hidden" name="SnoY" id="SnoY" value="'.$snoY.'" />'; */ ?>




<tr bgcolor="#7a6189">
   <td align="" style="width:40px;">&nbsp;</td>
   <td colspan="8" class="fontButton" align="right" width="100%">
     <table border="0" width="100%">
		<tr>
		    <td align="right" style="width:1500px; ">
			<input type="button" name="" id="" value="Back" onClick="ClickBack()"/>
			<input type="submit" name="SubmitEmpKRA" id="SubmitEmpKRA" value="Save"/>
			</td></tr>
	</table> 
  </td>
</tr>
</table>
</form>	 
<?php } ?>

