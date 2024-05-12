<?php 
require_once('../AdminUser/config/config.php'); 
if(isset($_POST['ValueId']) && $_POST['ValueId']!=""){ $ValueId = $_POST['ValueId']; $Eid = $_POST['Eid']; $YearId = $_POST['Yid'];
$sqlUp=mysql_query("update hrm_employee_pms set Emp_PmsStatus=1, Appraiser_PmsStatus=3, Appraiser_SubmitedDate='".date("Y-m-d")."' where AssessmentYear=".$YearId." AND EmployeeID=".$Eid, $con);
if($sqlUp){echo 'Employee Resend Successfully! ';}}

if(isset($_POST['Id']) && $_POST['Id']!=""){ $Id = $_POST['Id']; $Eid = $_POST['Eid']; $YearId = $_POST['Yid'];
$sqlApp=mysql_query("select EmpPmsId,AppraiserFormAScore,AppraiserFormBScore,Appraiser_Remark,Appraiser_PmsStatus from hrm_employee_pms where AssessmentYear=".$YearId." AND EmployeeID=".$Eid, $con); $resApp=mysql_fetch_array($sqlApp);
$sqlEmp=mysql_query("select * from hrm_employee where EmployeeID=".$Eid, $con); $resEmp=mysql_fetch_array($sqlEmp); ?> 
<form name="SubForm" method="post">
<table>
  
 <tr>
    <td>
    <table>
	  <tr>
 <td style="font-family:Times New Roman; font-size:12px; width:200px; font-weight:bold;" align="left"> Form A(KRA):&nbsp;</td>
 <td style="font-family:Times New Roman; font-size:15px; font-weight:bold; width:400px;" align="right">
 <input type="hidden" id="EmpId" name="EmpId" value="<?php echo $Id; ?>" />
 <font color="#EFFA1B"><?php echo $resEmp['EmpCode'].' - '.$resEmp['Fname'].' '.$resEmp['Sname'].' '.$resEmp['Lname']; ?></font>
    </td>
	</tr>
  </table>
 </td>
 </tr>
 <tr>
  <td>
    <table>
	  <tr bgcolor="#7a6189" style="height:20px;" valign="middle">
	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:30px;"><b>SNo.</b></td>
	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:400px;"><b>KRA</b></td>
	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:60px;"><b>Measure</b></td>
	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:60px;"><b>Unit</b></td>
	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:60px;"><b>Weightage</b></td>
	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:60px;"><b>Target</b></td>	
	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:60px;"><b>Self Ass.</b></td>
	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:200px;"><b>Remark</b></td>
	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:60px;"><b>Appraiser Ass.</b></td>
	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:50px;"><b>Score</b></td>
 </tr>
<?php $sql2=mysql_query("select * from hrm_employee_pms_kraforma where KRAFormAStatus='A' AND EmpPmsId=".$resApp['EmpPmsId'], $con);
	  $Sno=1; while($res2=mysql_fetch_array($sql2)) { 
	  $sqlK2=mysql_query("select * from hrm_pms_kra where KRAId=".$res2['KRAId'], $con); $resK2=mysql_fetch_array($sqlK2)?>		 
<tr bgcolor="#FFFFFF" style="height:20px;" valign="middle">
<td align="center" style="font-family:Times New Roman; font-size:12px;"><?php echo $Sno; ?>
<input type="hidden" id="KRAFormAId_<?php echo $Sno; ?>"  value="<?php echo $res2['KRAFormAId']; ?>" /></td>
<td align="" valign="top" style="font-family:Times New Roman; font-size:12px;"><?php echo $resK2['KRA']; ?></td>
<td align="center" valign="top" style="font-family:Times New Roman; font-size:12px;"><?php echo $resK2['Measure']; ?></td>
<td align="center" valign="top" style="font-family:Times New Roman; font-size:12px;"><?php echo $resK2['Unit']; ?></td>
<td align="center" valign="top" style="font-family:Times New Roman; font-size:12px;;">
<input type="hidden" id="WeightageKRA_<?php echo $Sno; ?>"  value="<?php echo $res2['Weightage']; ?>" />
<?php echo $res2['Weightage']; ?></td>
<td align="center" valign="top" style="font-family:Times New Roman; font-size:12px;">
<input type="hidden" id="TargetKRA_<?php echo $Sno; ?>"  value="<?php echo $res2['Target']; ?>" />
<?php echo $res2['Target']; ?></td>
<td align="center" valign="top" style="font-family:Times New Roman; font-size:12px;"><?php echo $res2['SelfRating']; ?></td>
<td align="" valign="top" style="font-family:Times New Roman; font-size:12px;"><?php echo $res2['AchivementRemark']; ?></td>
<td align="center" valign="top" style="font-family:Times New Roman; color:#FFFFFF; font-size:12px;">
 <input id="AppKRARating<?php echo $Sno; ?>" style="font-family:Times New Roman; background-color:#FFFFFF; font-size:12px; width:60px; height:22px; text-align:center;" maxlength="3" value="<?php echo $res2['AppraiserRating']; ?>" <?php if($resApp['Appraiser_PmsStatus']==2) { echo 'readonly'; } ?> onChange="EnterAppKra()"/></td>
<td align="center" valign="top" style="font-family:Times New Roman; color:#FFFFFF; font-size:12px;">
 <input id="AppKRAScore<?php echo $Sno; ?>" style="font-family:Times New Roman; font-size:12px; background-color:#FFFFFF; width:50px; height:22px; text-align:center;" value="<?php echo $res2['AppraiserScore']; ?>"  readonly/>
</td>
</tr>
<?php $Sno++;} $KRowNo=$Sno-1;?><input type="hidden" id="Sno" name="Sno" value="<?php echo $Sno; ?>" />
                                <input type="hidden" id="EmpKraRow" name="EmpKraRow" value="<?php echo $KRowNo; ?>" />
<tr bgcolor="#FFFFFF">
  <td colspan="9" style="font-family:Times New Roman; font-size:11px; width:50px; font-weight:bold;" align="right"> Final Appraiser KRA Score:&nbsp;</td>
  <td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:12px;">
 <input id="AppFormAScore<?php echo $Sno; ?>" style="font-family:Times New Roman;background-color:#FFFFFF; font-size:11px; width:50px; height:22px; text-align:center;" value="<?php echo $resApp['AppraiserFormAScore']; ?>"  readonly/>
  </td>
</tr>
  </table>
 </td>
</tr> 
<tr><td>&nbsp;</td></tr>

<tr><td colspan="2" style="font-family:Times New Roman; font-size:12px; width:50px; font-weight:bold;" align="left"> Form B(Behavioral):&nbsp;</td>
		 <td colspan="9" style="font-family:Times New Roman; font-size:15px; font-weight:bold; width:400px;" align="right">&nbsp;</td>
 </tr>
 <tr>
  <td>
   <table>
      <tr bgcolor="#7a6189" style="height:20px;" valign="middle">
	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:30px;"><b>SNo.</b></td>
	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:300px;"><b>Skill</b></td>
	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:60px;"><b>Weightage</b></td>
	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:60px;"><b>Target</b></td>
	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:60px;"><b>Self Ass.</b></td>
	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:200px;"><b>Remark</b></td>
	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:60px;"><b>Appraiser Ass.</b></td>
	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:50px;"><b>Score</b></td>
 </tr>
<?php $sql2=mysql_query("select * from hrm_employee_pms_behavioralformb where EmpPmsId=".$resApp['EmpPmsId'], $con);
	  $SnoB=1; while($res2=mysql_fetch_array($sql2)) { ?>		 
<tr bgcolor="#FFFFFF" style="height:20px;" valign="middle">
<td align="center" valign="top" style="font-family:Times New Roman; font-size:12px;"><?php echo $SnoB; ?>
<input type="hidden" id="FormBId_<?php echo $SnoB; ?>"  value="<?php echo $res2['BehavioralFormBId']; ?>" />
</td>
<td align="" valign="top" style="font-family:Times New Roman; font-size:12px;"><?php echo $res2['Skill']; ?></td>
<td align="center" valign="top" style="font-family:Times New Roman; font-size:12px;">
<input type="hidden" id="WeightageFormB_<?php echo $SnoB; ?>"  value="<?php echo $res2['Weightage']; ?>" />
<?php echo $res2['Weightage']; ?></td>
<td align="center" valign="top" style="font-family:Times New Roman; font-size:12px;">
<input type="hidden" id="TargetFormB_<?php echo $SnoB; ?>"  value="<?php echo $res2['Target']; ?>" />
<?php echo $res2['Target']; ?></td>
<td align="center" valign="top" style="font-family:Times New Roman; font-size:12px;"><?php echo $res2['SelfRating']; ?></td>
<td align="" valign="top" style="font-family:Times New Roman; font-size:12px;"><?php echo $res2['Comments_Example']; ?></td>
<td align="center" valign="top" style="font-family:Times New Roman; color:#FFFFFF; font-size:12px;">
 <input id="AppFormBRating<?php echo $SnoB; ?>" style="font-family:Times New Roman; font-size:12px; width:60px;background-color:#FFFFFF; height:22px; text-align:center;" value="<?php echo $res2['AppraiserRating']; ?>" maxlength="3" <?php if($resApp['Appraiser_PmsStatus']==2) { echo 'readonly'; } ?> onChange="EnterAppFormB()" /></td>
<td align="center" valign="top" style="font-family:Times New Roman; color:#FFFFFF; font-size:12px;">
 <input id="AppFormBScore<?php echo $SnoB; ?>" style="font-family:Times New Roman; font-size:12px; width:50px;background-color:#FFFFFF; height:22px; text-align:center;" value="<?php echo $res2['AppraiserScore']; ?>"  readonly/>
</td>
</tr>
<?php $SnoB++;} $FormBRowNo=$SnoB-1;?><input type="hidden" id="SnoB" name="SnoB" value="<?php echo $SnoB; ?>" />
                                      <input type="hidden" id="EmpFormBRow" name="EmpFormBRow" value="<?php echo $FormBRowNo; ?>" />
<tr bgcolor="#FFFFFF">
  <td colspan="7" style="font-family:Times New Roman; font-size:12px; width:50px; font-weight:bold;" align="right"> Final Appraiser FormB Score:&nbsp;</td>
  <td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:12px;">
 <input id="AppBehaviFormBScore<?php echo $SnoB; ?>" style="font-family:Times New Roman; font-size:12px;background-color:#FFFFFF; width:50px; height:22px; text-align:center;" value="<?php echo $resApp['AppraiserFormBScore']; ?>"  readonly/>
  </td>
 </tr>
</table>
</td>
</tr>

<tr><td>&nbsp;</td></tr>

<tr>
 <td>
    <table>
	  <tr>
<td style="font-family:Times New Roman; font-size:12px; width:50px; font-weight:bold;" align="left"> Remarks:&nbsp;</td>
<td style="font-family:Times New Roman; font-size:15px; font-weight:bold; width:400px;" align="right">&nbsp;</td>
      </tr>
   </table>
</td>
</tr>
<tr style="height:20px;" valign="middle">
<td>
    <table>
	  <tr bgcolor="#FFFFFF">
<td align="" style="font-family:Times New Roman; color:#FFFFFF; font-size:12px;width:690px;">
<?php $sql3=mysql_query("select Appraiser_PmsStatus from hrm_employee_pms where EmpPmsId=".$resApp['EmpPmsId'], $con);
$res3=mysql_fetch_assoc($sql3); ?>
<input id="AppRemarks" value="<?php echo $resApp['Appraiser_Remark']; ?>" style="font-family:Times New Roman; font-size:11px; width:690px; height:20px;" maxlength="200" <?php if($resApp['Appraiser_PmsStatus']==2) { echo 'readonly'; } ?> />
</td>
</tr>
   </table>
</td>
</tr>






 <tr><td>&nbsp;</td></tr>
 <tr>
 <td>
    <table>
	  <tr>
 <td align="left" style="width:100px;">
 <input type="button" name="SaveScore" id="SaveScore" style="width:90px;" onClick="return AppScore(<?php echo $resApp['EmpPmsId'].','.$Eid.','.$YearId; ?>)" value="save"/></td>
 <td align="left" style="width:100px;">
 <input type="button" name="SubmitScore" id="SubmitScore" style="width:90px;" onClick="return AppScore2(<?php echo $resApp['EmpPmsId'].','.$Eid.','.$YearId; ?>)" value="submit score"/></td>
 <td style="width:300px;"><font color="#014E05" style='font-family:Times New Roman;' size="4"><b><i><span id="MsgSpan2"></span></i><?php echo $msq; ?></b></font></td>	   
 </tr>
   </table>
</td>
 
 </tr>	                           	
													 
</table>		 
</form>
<?php } ?>	
