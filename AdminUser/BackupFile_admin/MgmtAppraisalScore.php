<?php 
require_once('config/config.php');
if(isset($_POST['PmsId']) && $_POST['PmsId']!=""){ $PmsId = $_POST['PmsId']; $EmpId = $_POST['EmpId']; $ComId = $_POST['ComId']; $YId = $_POST['YId']; 
$sql = mysql_query("select hrm_employee.*,hrm_employee_pms.*,DepartmentId,DesigId,DesigId2,GradeId,Tot_GrossMonth,Tot_Gross_Annual,Tot_CTC from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_ctc ON hrm_employee_pms.EmployeeID=hrm_employee_ctc.EmployeeID where hrm_employee_pms.EmpPmsId=".$PmsId." AND hrm_employee_pms.EmployeeID=".$EmpId, $con);
$res=mysql_fetch_assoc($sql); $Name=$res['Fname'].' '.$res['Sname'].' '.$res['Lname'];?>

<table border="0">
<tr>
  <td style="font:Georgia; font-size:12px; width:150px;" valign="top">Employee :</td>
  <td colspan="2" style="width:300px; font-size:12px; color:#005900; font-weight:bold;" valign="top">&nbsp;<?php echo $Name.' ('.$resDept['DepartmentName'].')'; ?></td>
</tr>
<tr>
  <td style="font:Georgia; font-size:12px; width:150px;" valign="top">Department :</td>
<?php $sqlDept = mysql_query("SELECT DepartmentName FROM hrm_department WHERE DepartmentId=".$res['DepartmentId'], $con);      
      $resDept = mysql_fetch_assoc($sqlDept); ?>
  <input type="hidden" value="<?php echo $res['DepartmentId']; ?>" id="DeptId" /> 
  <td colspan="2" style="width:300px; font-size:12px; color:#005900; font-weight:bold;" valign="top">&nbsp;<?php echo $resDept['DepartmentName']; ?></td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
  <td style="font:Georgia; font-size:12px; width:150px;">Overall Score :</td>
  <td style="width:150px;" valign="top"><input id="OverAllScore" style="width:50px; height:20px; text-align:center;" maxlength="3" value="<?php echo $res['AppRev_TotalFinalScore']; ?>" readonly="readonly"/></td>
</tr>
<tr>
  <td style="font:Georgia; font-size:12px;width:150px;">Overall Rating :</td>
  <td style="width:150px;"><input id="OverAllRating" style="width:50px; height:20px; text-align:center;" value="<?php echo $res['AppRev_TotalFinalRating']; ?>" readonly="readonly"/></td>
</tr>
<tr>
  <td colspan="2" style="font:Georgia;color:#FFF;background-color:#0A78F1;font-size:12px;width:300px;font-weight:bold;" align="center"><i>Current History </i>:</td>
  <td colspan="2" style="font:Georgia;color:#FFF;background-color:#0A78F1;font-size:12px;width:300px;font-weight:bold;" align="center"><i>Revised Increment </i> :</td>
</tr>
<tr bgcolor="#FFFFFF">
  <td style="font:Georgia;font-size:12px;font:Georgia; width:150px;">Department :</td>
  <td style="font:Georgia;width:150px;font-size:12px;"><?php echo $resDept['DepartmentName']; ?></td>
  <td style="font:Georgia;font-size:12px;font:Georgia; width:150px;">Department :</td>
  <td style="width:150px;">
       <select style="width:150px; height:20px; background-color:#DDFFBB;font-size:12px;" id="DeptId" disabled onchange="GetDeptPms(this.value)">
       <?php if($res['AfterPms_DepartmentId']==0) { ?>    
       <option style="background-color:#FFFFFF;" value="<?php echo $res['DepartmentId']; ?>"><?php echo $resDept['DepartmentName']; ?></option>
       <?php } if($res['AfterPms_DepartmentId']!=0 AND $res['AfterPms_DepartmentId']!="") { ?> 
<?php $sqlDeptAfter = mysql_query("SELECT DepartmentName FROM hrm_department WHERE DepartmentId=".$res['AfterPms_DepartmentId'], $con);      
      $resDeptAfter = mysql_fetch_assoc($sqlDeptAfter); ?>          
       <option style="background-color:#FFFFFF;" value="<?php echo $res['AfterPms_DepartmentId']; ?>"><?php echo $resDeptAfter['DepartmentName']; ?></option>
       <?php } ?>
<?php $sqlDept2 = mysql_query("SELECT * FROM hrm_department", $con); while($resDept2 = mysql_fetch_array($sqlDept2)) {  ?>    
       <option style="background-color:#FFFFFF;" value="<?php echo $resDept['DepartmentId']; ?>"><?php echo $resDept2['DepartmentName']; ?></option><?php } ?>
       </select>
 </td>
</tr>
<tr bgcolor="#FFFFFF">
  <td style="font:Georgia;font-size:12px;font:Georgia; width:150px;">Designation :</td>
<?php $sqlDesig = mysql_query("SELECT DesigId,DesigName FROM hrm_designation WHERE DesigId=".$res['DesigId']." OR DesigId=".$res['DesigId2'], $con);      $resDesig = mysql_fetch_assoc($sqlDesig); ?> 
  <td style="font:Georgia;width:150px;font-size:12px;"><?php echo $resDesig['DesigName']; ?></td>
  <td style="font:Georgia;font-size:12px;font:Georgia; width:150px;">Designation :</td>
  <td style="width:150px;">
       <select style="width:150px; height:20px; background-color:#DDFFBB;font-size:12px;" id="DesigId" disabled>
       <?php if($res['AfterPms_DesigId']==0) { ?>    
       <option style="background-color:#FFFFFF;" value="<?php echo $resDesig['DesigId']; ?>"><?php echo $resDesig['DesigName']; ?></option>
       <?php } if($res['AfterPms_DesigId']!=0 AND $res['AfterPms_DesigId']!="") { ?> 
<?php $sqlDesigAfter = mysql_query("SELECT DesigName FROM hrm_designation WHERE DesigId=".$res['AfterPms_DesigId'], $con);      
      $resDesigAfter = mysql_fetch_assoc($sqlDesigAfter); ?>          
       <option style="background-color:#FFFFFF;" value="<?php echo $res['AfterPms_DesigId']; ?>"><?php echo $resDesigAfter['DesigName']; ?></option>
       <?php } ?>
<?php $sqlDept = mysql_query("SELECT DesigId FROM hrm_deptgradedesig WHERE DepartmentId=".$res['DepartmentId'], $con); 
      while($resDept = mysql_fetch_assoc($sqlDept)) { $sqlDesig2 = mysql_query("SELECT DesigName FROM hrm_designation WHERE DesigId=".$resDept['DesigId'], $con); $resDesig2 = mysql_fetch_assoc($sqlDesig2); ?>    
       <option style="background-color:#FFFFFF;" value="<?php echo $resDept['DesigId']; ?>"><?php echo $resDesig2['DesigName']; ?></option><?php } ?>
       </select>
 </td>
</tr>
<tr bgcolor="#FFFFFF">
 <td style="font:Georgia;font-size:12px;width:150px;">Grade :</td>
<?php $sqlGrade = mysql_query("SELECT GradeId,GradeValue FROM hrm_grade WHERE GradeId=".$res['GradeId'], $con); 
      $resGrade = mysql_fetch_assoc($sqlGrade); ?>   
 <td style="font:Georgia;width:150px;font-size:12px;"><?php echo $resGrade['GradeValue']; ?></td>
 <td style="font:Georgia;font-size:12px;width:150px;">Grade :</td>     
 <td style="font:Georgia; font-size:12px;width:70px;">
       <select style="width:50px; height:20px; background-color:#DDFFBB;font-size:12px;" id="GradeId" disabled>
       <?php if($res['AfterPms_GradeId']==0) { ?>      
       <option style="background-color:#FFFFFF;" value="<?php echo $resGrade['GradeId']; ?>"><?php echo $resGrade['GradeValue']; ?></option>
        <?php } if($res['AfterPms_GradeId']!=0 AND $res['AfterPms_GradeId']!="") { ?>
<?php $sqlGradeAfter = mysql_query("SELECT GradeValue FROM hrm_grade WHERE GradeId=".$res['AfterPms_GradeId'], $con); 
      $resGradeAfter = mysql_fetch_assoc($sqlGradeAfter); ?>          
       <option style="background-color:#FFFFFF;" value="<?php echo $resGrade['GradeId']; ?>"><?php echo $resGradeAfter['GradeValue']; ?></option>
       <?php } ?>
<?php $sqlGrade2 = mysql_query("SELECT * FROM hrm_grade", $con);  while($resGrade2 = mysql_fetch_array($sqlGrade2)){ ?>    
       <option style="background-color:#FFFFFF;" value="<?php echo $resGrade2['GradeId']; ?>"><?php echo $resGrade2['GradeValue']; ?></option><?php } ?>
       </select>
 </td>
</tr>
<tr bgcolor="#FFFFFF">
 <td style="font:Georgia;font-size:12px;width:150px;">Gross Monthly :</td>   
 <td style="font:Georgia;width:150px;font-size:12px;">
 <input type="hidden" id="GrossMonth" value="<?php echo $res['Tot_GrossMonth']; ?>" /> <?php echo $res['Tot_GrossMonth']; ?></td>
 <td style="font:Georgia;font-size:12px;width:150px;">Proposed Increment :</td>     
 <td style="font:Georgia; font-size:12px;width:70px;">
 <input style="width:80px; height:20px; background-color:#DDFFBB;font-size:12px;" id="ProInc" value="<?php echo $res['Proposed_IncrementSalary'] ?>" onChange="CalProInc()" onKeyDown="CalProInc()" maxlength="5"  readonly />
  <input style="width:40px; height:20px; background-color:#DDFFBB;font-size:12px;" id="Per_ProInc" value="<?php echo $res['Per_ProInc'] ?>" maxlength="3" readonly />%
 </td>
<?php $sqlMaxMin= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dis WHERE Rating=".$res['AppRev_TotalFinalRating']." AND CompanyId=".$ComId, $con); 
      $resMaxMin = mysql_fetch_assoc($sqlMaxMin); 
	  $Min=($res['Tot_GrossMonth']*$resMaxMin['IncDistriFrom'])/100; $Max=($res['Tot_GrossMonth']*$resMaxMin['IncDistriTo'])/100;	?> 
 <td style="font:Georgia; font-size:11px;width:100px;" align="center">
 Min.- <input style="width:50px; height:20px; background-color:#DDFFBB;font-size:12px;" id="MinV" value="<?php echo $Min; ?>" readonly /></td>
 <td style="font:Georgia; font-size:11px;width:100px;" align="center">
 Max.- <input style="width:50px; height:20px; background-color:#DDFFBB;font-size:12px;" id="MaxV" value="<?php echo $Max; ?>" readonly /></td>
</tr>
<tr bgcolor="#FFFFFF">
 <td style="font:Georgia;font-size:12px;width:150px;">Gross Annual :</td>   
 <td style="font:Georgia;width:150px;font-size:12px;"><?php echo $res['Tot_Gross_Annual']; ?></td>
 <td style="font:Georgia;font-size:12px;width:150px;">Proposed Salary Correction :</td>     
 <td style="font:Georgia; font-size:12px;width:70px;">
 <input style="width:80px; height:20px; background-color:#DDFFBB;font-size:12px;" id="ProSalCorr" onChange="CalProInc()" onKeyDown="CalProInc()" maxlength="5" value="<?php echo $res['Proposed_CorrectionSalary']; ?>"  readonly/>
 </td>
</tr>
<tr bgcolor="#FFFFFF">
 <td style="font:Georgia;font-size:12px; width:150px;">CTC :</td>   
 <td style="font:Georgia;width:150px;font-size:12px;"><?php echo $res['Tot_CTC']; ?></td>
 <td style="font:Georgia;font-size:12px;width:150px;">Total Increment :</td>     
 <td style="font:Georgia; font-size:12px;width:70px;">
 <input style="width:80px; height:20px; background-color:#DDFFBB;font-size:12px;" readonly id="TotInc" value="<?php echo $res['NetMonthaly_IncrementSalary']; ?>" />
 <input style="width:40px; height:20px; background-color:#DDFFBB;font-size:12px;" id="Per_TotInc" value="<?php echo $res['Per_TotInc']; ?>" maxlength="3" readonly />%
 </td>
</tr>
<tr>
 <td style="font:Georgia;font-size:12px; width:150px;"></td>   
 <td style="font:Georgia;width:150px;font-size:12px;"></td>
 <td bgcolor="#FFFFFF" style="font:Georgia;font-size:12px; width:150px;">Gross Monthaly</td>     
 <td bgcolor="#FFFFFF" style="font:Georgia; font-size:12px;width:70px;">
 <input style="width:80px; height:20px; background-color:#DDFFBB;font-size:12px;" readonly id="IncGrossMonthaly" value="<?php echo $res['AfterPms_GrossMonthlySalary']; ?>"/>
 </td>
 <td></td>
</tr>
<tr>
 <td style="font:Georgia;font-size:12px; width:150px;"></td>   
 <td style="font:Georgia;width:150px;font-size:12px;"></td>
 <td bgcolor="#FFFFFF" style="font:Georgia;font-size:12px; width:150px;">Gross Annual</td>     
 <td bgcolor="#FFFFFF" style="font:Georgia; font-size:12px;width:70px;">
 <input style="width:80px; height:20px; background-color:#DDFFBB;font-size:12px;" readonly id="IncGrossAnnual" value="<?php echo $res['AfterPms_GrossAnnualSalary']; ?>"/>
 </td>
 <td></td>
</tr>
<tr>
 <td style="font:Georgia;font-size:12px; width:150px;"></td>   
 <td style="font:Georgia;width:150px;font-size:12px;"></td>
 <td bgcolor="#FFFFFF" style="font:Georgia;font-size:12px; width:150px;">Date (d-m-y)</td>     
 <td bgcolor="#FFFFFF" style="font:Georgia; font-size:12px;width:70px;">
<select name="day" id="day" style="width:45px; height:20px; background-color:#DDFFBB;font-size:12px;">
<?php for($i=1; $i<=31; $i++) { ?><option value="<?php echo $i; ?>" <?php if(date("d")==$i){echo 'selected';} ?>><?php echo $i; ?></option><?php } ?></select>
 <select name="month" id="month" style="width:45px; height:20px; background-color:#DDFFBB;font-size:12px;">
<?php for($j=1; $j<=12; $j++) { ?><option value="<?php echo $j; ?>" <?php if(date("m")==$j){echo 'selected';} ?>><?php echo $j; ?></option><?php } ?></select>
 <select name="year" id="year" style="width:45px; height:20px; background-color:#DDFFBB;font-size:12px;">
 <option value="<?php echo date("Y"); ?>" selected><?php echo date("y"); ?></option></select>
 
 <input type="hidden" style="width:100px; height:20px; background-color:#DDFFBB;font-size:12px;" id="EffDate" value="<?php echo date("d-m-Y"); ?>" readonly/>
 </td>
 <td></td>
</tr>
<tr>
 <td style="font:Georgia;font-size:12px; width:150px;" valign="top">Recommendation for promotion :</td>   
 <td style="font:Georgia;width:500px;font-size:12px;" valign="top" colspan="4">
 <textarea cols="65" rows="3" style="" id="RecPro" readonly><?php echo $res['RecomForPromotion']; ?></textarea></td>
</tr>
<tr>
 <td align="Right" colspan="8" class="fontButton" colspan="5">
    <table border="0">
      <tr>
	   <td style="width:95px;" align="center"><input type="button" name="editButton" id="editButton" onclick="editButton()" style="width:90px;" value="edit"></td>
	  <td style="width:100px;" align="right"><input type="button" name="SubmitAppraisalHR" id="SubmitAppraisalHR" onclick="return SubmitPmsHR(<?php echo $PmsId.','.$EmpId; ?>)" style="width:90px;" value="submit" <?php if($res['HR_PmsStatus']==0 OR $res['HR_PmsStatus']==2) {echo 'disabled';}?> ></td>
	  <td align="left" style="width:130px; "><input type="button" name="AppraisalHR" id="SaveAppraisalHR" onclick="return SavePmsHR(<?php echo $PmsId.','.$EmpId; ?>)" style="width:120px;" value="save as draft" disabled></td></tr>
    </table>
 </td>
<tr>    
</table>
   	 
<?php } ?>
