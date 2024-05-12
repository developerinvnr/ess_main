<?php 
require_once('../AdminUser/config/config.php'); 
if(isset($_POST['ValueId']) && $_POST['ValueId']!=""){ $ValueId = $_POST['ValueId']; $Eid = $_POST['Eid']; $YearId = $_POST['Yid'];
$sqlUp=mysql_query("update hrm_employee_pms set Appraiser_PmsStatus=1, Reviewer_PmsStatus=3, Reviewer_SubmitedDate='".date("Y-m-d")."' where AssessmentYear=".$YearId." AND EmployeeID=".$Eid, $con);
$sqlPmsId=mysql_query("select EmpPmsId from hrm_employee_pms where AssessmentYear=".$YearId." AND EmployeeID=".$Eid, $con); $resPmsId=mysql_fetch_array($sqlPmsId);
 if($sqlPmsId)
 {
  $sqlUpKRA=mysql_query("update hrm_employee_pms_kraforma set AppraiserRating=0, AppraiserScore=0 where EmpPmsId=".$resPmsId['EmpPmsId'], $con);
  $sqlUpFormB=mysql_query("update hrm_employee_pms_behavioralformb set AppraiserRating=0, AppraiserScore=0 where EmpPmsId=".$resPmsId['EmpPmsId'], $con); 
 }
if($sqlUpFormB){echo 'Appraiser Resend Successfully! ';}}

if(isset($_POST['Id']) && $_POST['Id']!=""){ $Id = $_POST['Id']; $Eid = $_POST['Eid']; $YearId = $_POST['Yid'];
$sqlApp=mysql_query("select EmpPmsId,AppraiserFormBScore,AppraiserFormAScore,RevFormAKra_Score,RevFormBBehavi_Score,Appraiser_Remark,Reviewer_Remark,Reviewer_PmsStatus from hrm_employee_pms where AssessmentYear=".$YearId." AND EmployeeID=".$Eid, $con); $resApp=mysql_fetch_array($sqlApp);
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
	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:300px;"><b>KRA</b></td>
	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:50px;"><b>Measure</b></td>
	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:50px;"><b>Unit</b></td>
	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:50px;"><b>Weightage</b></td>
	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:50px;"><b>Target</b></td>	
	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:50px;"><b>Self Ass.</b></td>
	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:150px;"><b>Remark</b></td>
	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:60px;"><b>Appraiser Ass.</b></td>
	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:50px;"><b>Score</b></td>
 </tr>
<?php $sql2=mysql_query("select * from hrm_employee_pms_kraforma where KRAFormAStatus='A' AND EmpPmsId=".$resApp['EmpPmsId'], $con);
	  $Sno=1; while($res2=mysql_fetch_array($sql2)) { 
	  $sqlK2=mysql_query("select * from hrm_pms_kra where KRAId=".$res2['KRAId'], $con); $resK2=mysql_fetch_array($sqlK2)?>		 
<tr bgcolor="#FFFFFF" style="height:20px;" valign="middle">
<td align="center" style="font-family:Times New Roman; font-size:11px;"><?php echo $Sno; ?></td>
<td align="" valign="top" style="font-family:Times New Roman; font-size:11px;"><?php echo $resK2['KRA']; ?></td>
<td align="center" valign="top" style="font-family:Times New Roman; font-size:11px;"><?php echo $resK2['Measure']; ?></td>
<td align="center" valign="top" style="font-family:Times New Roman; font-size:11px;"><?php echo $resK2['Unit']; ?></td>
<td align="center" valign="top" style="font-family:Times New Roman; font-size:11px;;"><?php echo $res2['Weightage']; ?></td>
<td align="center" valign="top" style="font-family:Times New Roman; font-size:11px;"><?php echo $res2['Target']; ?></td>
<td align="center" valign="top" style="font-family:Times New Roman; font-size:11px;"><?php echo $res2['SelfRating']; ?></td>
<td align="" valign="top" style="font-family:Times New Roman; font-size:11px;"><?php echo $res2['AchivementRemark']; ?></td>
<td align="center" valign="top" style="font-family:Times New Roman; font-size:11px;"><?php echo $res2['AppraiserRating']; ?></td>
<td align="center" valign="top" style="font-family:Times New Roman; font-size:11px;"><?php echo $res2['AppraiserScore']; ?></td>
</tr>
<?php $Sno++;} $KRowNo=$Sno-1;?><input type="hidden" id="EmpKraRow" name="EmpKraRow" value="<?php echo $KRowNo; ?>" />
<tr bgcolor="#FFFFFF">
  <td colspan="9" style="font-family:Times New Roman; font-size:11px; width:50px; font-weight:bold;" align="right"> Appraiser Final KRA Score:&nbsp;</td>
  <td align="center" style="font-family:Times New Roman; font-size:12px;">
  <input type="hidden" id="AppraiserFormAScore"  value="<?php echo $resApp['AppraiserFormAScore']; ?>" />
  <?php echo $resApp['AppraiserFormAScore']; ?></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td colspan="9" style="font-family:Times New Roman; font-size:11px; width:50px; font-weight:bold;" align="right"> Reviewer Score:&nbsp;</td>
  <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px;">
 <input id="RevFormAKra_Score" style="font-family:Times New Roman; font-size:11px; width:50px; height:20px; text-align:center;" value="<?php echo $resApp['RevFormAKra_Score']; ?>" <?php if($resApp['Reviewer_PmsStatus']==2) { echo 'readonly'; } ?>/>
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
	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:50px;"><b>Weightage</b></td>
	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:50px;"><b>Target</b></td>
	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:50px;"><b>Self Ass.</b></td>
	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:150px;"><b>Remark</b></td>
	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:60px;"><b>Appraiser Ass.</b></td>
	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:50px;"><b>Score</b></td>
 </tr>
<?php $sql2=mysql_query("select * from hrm_employee_pms_behavioralformb where EmpPmsId=".$resApp['EmpPmsId'], $con);
	  $Sno=1; while($res2=mysql_fetch_array($sql2)) { ?>		 
<tr bgcolor="#FFFFFF" style="height:20px;" valign="middle">
<td align="center" valign="top" style="font-family:Times New Roman; font-size:11px;"><?php echo $Sno; ?></td>
<td align="" valign="top" style="font-family:Times New Roman; font-size:11px;"><?php echo $res2['Skill']; ?></td>
<td align="center" valign="top" style="font-family:Times New Roman; font-size:11px;"><?php echo $res2['Weightage']; ?></td>
<td align="center" valign="top" style="font-family:Times New Roman; font-size:11px;"><?php echo $res2['Target']; ?></td>
<td align="center" valign="top" style="font-family:Times New Roman; font-size:11px;"><?php echo $res2['SelfRating']; ?></td>
<td align="" valign="top" style="font-family:Times New Roman; font-size:11px;"><?php echo $res2['Comments_Example']; ?></td>
<td align="center" valign="top" style="font-family:Times New Roman;font-size:11px;"><?php echo $res2['AppraiserRating']; ?></td>
<td align="center" valign="top" style="font-family:Times New Roman;font-size:11px;"><?php echo $res2['AppraiserScore']; ?></td>
</tr>
<?php $Sno++;} $FormBRowNo=$Sno-1;?><input type="hidden" id="EmpFormBRow" name="EmpFormBRow" value="<?php echo $FormBRowNo; ?>" />
<tr bgcolor="#FFFFFF">
  <td colspan="7" style="font-family:Times New Roman; font-size:11px; width:50px; font-weight:bold;" align="right"> Appraiser Final Score:&nbsp;</td>
  <td align="center" style="font-family:Times New Roman;font-size:11px;">
  <input type="hidden" id="AppraiserFormBScore"  value="<?php echo $resApp['AppraiserFormBScore']; ?>" />
  <?php echo $resApp['AppraiserFormBScore']; ?></td>
 </tr>
 <tr bgcolor="#FFFFFF">
  <td colspan="7" style="font-family:Times New Roman; font-size:11px; width:50px; font-weight:bold;" align="right"> Reviewer Score:&nbsp;</td>
  <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px;">
 <input id="RevFormBBehavi_Score" style="font-family:Times New Roman; font-size:11px; width:50px; height:20px; text-align:center;" value="<?php echo $resApp['RevFormBBehavi_Score']; ?>" <?php if($resApp['Reviewer_PmsStatus']==2) { echo 'readonly'; } ?>/>
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
<input id="RevRemarks" value="<?php echo $resApp['Reviewer_Remark']; ?>" style="font-family:Times New Roman; font-size:11px; width:690px; height:20px;" maxlength="200" <?php if($resApp['Reviewer_PmsStatus']==2) { echo 'readonly'; } ?> />
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
 <input type="button" name="SaveScore" id="SaveScore" style="width:90px;" onClick="return RevScore(<?php echo $resApp['EmpPmsId'].','.$Eid.','.$YearId; ?>)" value="save"/></td>
 <td align="left" style="width:100px;">
 <input type="button" name="SubmitScore" id="SubmitScore" style="width:90px;" onClick="return RevScore2(<?php echo $resApp['EmpPmsId'].','.$Eid.','.$YearId; ?>)" value="submit score"/></td>
 <td style="width:300px;"><font color="#014E05" style='font-family:Times New Roman;' size="4"><b><i><span id="MsgSpan2"></span></i><?php echo $msq; ?></b></font></td>	
 </tr>
   </table>
</td>
 
 </tr>	                           	
													 
</table>		 
</form>
<?php } ?>	
