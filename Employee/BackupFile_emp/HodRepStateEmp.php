<?php require_once('../AdminUser/config/config.php'); ?>
<style>
.td1{ text-align:center;font-family:Times New Roman;color:#FFFFFF;font-size:14px;font-weight:bold; }
.td1l{ font-family:Times New Roman;color:#FFFFFF;font-size:14px;font-weight:bold; }
.td2{ text-align:center;font-family:Times New Roman;font-size:12px; }
.td3{ font-family:Times New Roman;font-size:12px; }
.td22{ text-align:center;font-family:Times New Roman;font-size:13px; }
.td33{ font-family:Times New Roman;font-size:13px; }
</style>
<table border="1" cellspacing="1">
 <tr bgcolor="#7a6189" style="height:20px;" valign="middle">
  <td class="td1" style="width:30px;"><b>SN</b></td>
  <td class="td1" style="width:50px;"><b>EC</b></td>
  <td class="td1" style="width:200px;"><b>Name</b></td>
  <td class="td1" style="width:100px;"><b>Department</b></td>
  <td class="td1" style="width:200px;"><b>Designation</b></td>
  <td class="td1" style="width:50px;"><b>Grade</b></td>
  <td class="td1" style="width:120px;"><b>State</b></td>			
  <td class="td1" style="width:50px;"><b>Score</b></td>
  <td class="td1" style="width:50px;"><b>Rating</b></td>
  <td class="td1" style="width:200px;"><b>Proposed Designation</b></td>
  <td class="td1" style="width:50px;"><b>PG</b></td>
  <td class="td1" style="width:80px;"><b>PGSPM</b></td>
  <td class="td1" style="width:50px;"><b>% PIS</b></td>
  <td class="td1" style="width:80px;"><b>SC</b></td>
  <td class="td1" style="width:50px;"><b>% PSC</b></td>
  <td class="td1" style="width:80px;"><b>TISPM</b></td>
  <td class="td1" style="width:50px;"><b>% TISPM</b></td>
  <td class="td1" style="width:80px;"><b>TPGSPM</b></td>
 </tr> 		

<?php 
if(isset($_POST['StHQid']) && $_POST['StHQid']!="")
{ 
 $StHQid = $_POST['StHQid']; $EmpId = $_POST['EmpId']; $YI = $_POST['YI']; 	 

if($StHQid=='All') { $sql=mysql_query("select hrm_employee.*, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Reviewer_EmpDesignation, Reviewer_EmpGrade, Hod_TotalFinalScore, Hod_TotalFinalRating, Hod_EmpDesignation, Hod_EmpGrade, Hod_ProIncSalary, Hod_Percent_ProIncSalary, Hod_ProCorrSalary, Hod_Percent_ProCorrSalary, Hod_IncNetMonthalySalary, Hod_Percent_IncNetMonthalySalary, Hod_GrossMonthlySalary, HR_CurrDesigId, HR_CurrGradeId, DepartmentId, DesigId, DesigId2, hrm_headquater.HqId, GradeId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID INNER JOIN hrm_headquater ON hrm_employee_general.HqId=hrm_headquater.HqId where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$YI." AND hrm_employee_pms.HOD_EmployeeID=".$EmpId, $con); }
    if($StHQid!='All') { $sql=mysql_query("select hrm_employee.*, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Reviewer_EmpDesignation, Reviewer_EmpGrade, Hod_TotalFinalScore, Hod_TotalFinalRating, Hod_EmpDesignation, Hod_EmpGrade, Hod_ProIncSalary, Hod_Percent_ProIncSalary, Hod_ProCorrSalary, Hod_Percent_ProCorrSalary, Hod_IncNetMonthalySalary, Hod_Percent_IncNetMonthalySalary, Hod_GrossMonthlySalary, HR_CurrDesigId, HR_CurrGradeId, DepartmentId, DesigId, DesigId2, hrm_headquater.HqId, GradeId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID INNER JOIN hrm_headquater ON hrm_employee_general.HqId=hrm_headquater.HqId where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$YI." AND hrm_headquater.StateId=".$StHQid." AND hrm_employee_pms.HOD_EmployeeID=".$EmpId, $con); }
 $sno=1; while($res=mysql_fetch_array($sql)){ 
 $sql2=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con); 
 $sql3=mysql_query("select DesigName from hrm_designation where DesigId=".$res['HR_CurrDesigId'], $con); 
 $sql4=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['HR_CurrGradeId'], $con);  
 $res2=mysql_fetch_assoc($sql2);  $res3=mysql_fetch_assoc($sql3); $res4=mysql_fetch_assoc($sql4);
 $sql5=mysql_query("select StateName from hrm_state INNER JOIN hrm_headquater ON hrm_state.StateId=hrm_headquater.StateId where hrm_headquater.HqId=".$res['HqId'], $con); $res5=mysql_fetch_assoc($sql5);
 
 ?>     		
		<tr style="height:20px; background-color:<?php if($sno%2==0){echo '#ECFFEC';} else {echo '#FFFFFF';} ?>;">
		<td class="td2"><?php echo $sno; ?></td>
		<td class="td2"><?php echo $res['EmpCode']; ?></td>
		<td class="td3"><?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
        <td class="td2"><?php echo $res2['DepartmentCode'];?></td>			
		<td class="td3"><?php echo $res3['DesigName'];?></td>			
		<td class="td2"><?php echo $res4['GradeValue'];?></td>			
		<td class="td3"><?php echo $res5['StateName'];?></td>
<td class="td22" style="background-color:#FFDDDD;"><?php if($res['Hod_TotalFinalScore']>0) {echo $res['Hod_TotalFinalScore']; } else {echo $res['Reviewer_TotalFinalScore'];} ?></td>	
		<td class="td22" style="background-color:#FFDDDD;"><?php  if($res['Hod_TotalFinalRating']>0){echo $res['Hod_TotalFinalRating']; } else {echo $res['Reviewer_TotalFinalRating'];} ?></td>
<?php if($res['Hod_EmpDesignation']!=0 AND $res['Hod_EmpDesignation']>0) {$sqlHD=mysql_query("select DesigName from hrm_designation where DesigId=".$res['Hod_EmpDesignation'], $con); $resHD=mysql_fetch_assoc($sqlHD);} 
  if($res['Hod_EmpGrade']!=0 AND $res['Hod_EmpGrade']>0) {$sqlHG=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Hod_EmpGrade'], $con); $resHG=mysql_fetch_assoc($sqlHG);} ?>					
	    <td align="" style="background-color:#C4FFC4;"><?php if($res['Hod_EmpDesignation']>0 AND $res['Hod_EmpDesignation']!=$res['HR_CurrDesigId']) { echo $resHD['DesigName'];} ?></td>	
		<td class="td2" style="background-color:#C4FFC4;"><?php if($res['Hod_EmpGrade']>0 AND $res['Hod_EmpGrade']!=$res['HR_CurrGradeId']) { echo $resHG['GradeValue'];} ?></td>		
   <td class="td33" align="right" style="background-color:#BFDFFF;"><?php echo floatval($res['Hod_ProIncSalary']); ?></td>
   <td class="td22" style="background-color:#BFDFFF;"><?php echo $res['Hod_Percent_ProIncSalary']; ?></td>	
   <td class="td33" align="right" style="background-color:#FFFFB9;"><?php echo floatval($res['Hod_ProCorrSalary']); ?></td>
   <td class="td22" style="background-color:#FFFFB9;"><?php echo $res['Hod_Percent_ProCorrSalary']; ?></td>	
   <td class="td33" align="right" style="background-color:#DDDDFF;"><?php echo floatval($res['Hod_IncNetMonthalySalary']); ?></td>
   <td class="td22" style="background-color:#DDDDFF;"><?php echo $res['Hod_Percent_IncNetMonthalySalary']; ?></td>	
   <td class="td33" align="right" style="background-color:#FFC68C;"><?php echo floatval($res['Hod_GrossMonthlySalary']);?></td>
  </tr>
<?php $sno++;} ?>		 	
<?php } ?>


<?php 
if(isset($_POST['StDeptid']) && $_POST['StDeptid']!="")
{ 
 $StDeptid = $_POST['StDeptid']; $EmpId = $_POST['EmpId']; $YI = $_POST['YI'];	 
 $sql=mysql_query("select hrm_employee.*, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Reviewer_EmpDesignation, Reviewer_EmpGrade, Hod_TotalFinalScore, Hod_TotalFinalRating, Hod_EmpDesignation, Hod_EmpGrade, Hod_ProIncSalary, Hod_Percent_ProIncSalary, Hod_ProCorrSalary, Hod_Percent_ProCorrSalary, Hod_IncNetMonthalySalary, Hod_Percent_IncNetMonthalySalary, Hod_GrossMonthlySalary, HR_CurrDesigId, HR_CurrGradeId, DepartmentId, DesigId, DesigId2, hrm_headquater.HqId, GradeId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID INNER JOIN hrm_headquater ON hrm_employee_general.HqId=hrm_headquater.HqId where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$YI." AND hrm_employee_general.DepartmentId=".$StDeptid." AND hrm_employee_pms.HOD_EmployeeID=".$EmpId, $con);
 $sno=1; while($res=mysql_fetch_array($sql)){      		
 $sql2=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con); 
 $sql3=mysql_query("select DesigName from hrm_designation where DesigId=".$res['HR_CurrDesigId'], $con); 
 $sql4=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['HR_CurrGradeId'], $con);  
 $res2=mysql_fetch_assoc($sql2);  $res3=mysql_fetch_assoc($sql3); $res4=mysql_fetch_assoc($sql4);
 $sql5=mysql_query("select StateName from hrm_state INNER JOIN hrm_headquater ON hrm_state.StateId=hrm_headquater.StateId where hrm_headquater.HqId=".$res['HqId'], $con); $res5=mysql_fetch_assoc($sql5);
 
 ?>     		
		<tr style="height:20px; background-color:<?php if($sno%2==0){echo '#ECFFEC';} else {echo '#FFFFFF';} ?>;">
		<td class="td2"><?php echo $sno; ?></td>
		<td class="td2"><?php echo $res['EmpCode']; ?></td>
		<td class="td3"><?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
        <td class="td2"><?php echo $res2['DepartmentCode'];?></td>			
		<td class="td3"><?php echo $res3['DesigName'];?></td>			
		<td class="td2"><?php echo $res4['GradeValue'];?></td>			
		<td class="td3"><?php echo $res5['StateName'];?></td>
<td class="td22" style="background-color:#FFDDDD;"><?php if($res['Hod_TotalFinalScore']>0) {echo $res['Hod_TotalFinalScore']; } else {echo $res['Reviewer_TotalFinalScore'];} ?></td>	
		<td class="td22" style="background-color:#FFDDDD;"><?php  if($res['Hod_TotalFinalRating']>0){echo $res['Hod_TotalFinalRating']; } else {echo $res['Reviewer_TotalFinalRating'];} ?></td>
<?php if($res['Hod_EmpDesignation']!=0 AND $res['Hod_EmpDesignation']>0) {$sqlHD=mysql_query("select DesigName from hrm_designation where DesigId=".$res['Hod_EmpDesignation'], $con); $resHD=mysql_fetch_assoc($sqlHD);} 
  if($res['Hod_EmpGrade']!=0 AND $res['Hod_EmpGrade']>0) {$sqlHG=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Hod_EmpGrade'], $con); $resHG=mysql_fetch_assoc($sqlHG);} ?>					
	    <td align="" style="background-color:#C4FFC4;"><?php if($res['Hod_EmpDesignation']>0 AND $res['Hod_EmpDesignation']!=$res['HR_CurrDesigId']) { echo $resHD['DesigName'];} ?></td>	
		<td class="td2" style="background-color:#C4FFC4;"><?php if($res['Hod_EmpGrade']>0 AND $res['Hod_EmpGrade']!=$res['HR_CurrGradeId']) { echo $resHG['GradeValue'];} ?></td>		
   <td class="td33" align="right" style="background-color:#BFDFFF;"><?php echo floatval($res['Hod_ProIncSalary']); ?></td>
   <td class="td22" style="background-color:#BFDFFF;"><?php echo $res['Hod_Percent_ProIncSalary']; ?></td>	
   <td class="td33" align="right" style="background-color:#FFFFB9;"><?php echo floatval($res['Hod_ProCorrSalary']); ?></td>
   <td class="td22" style="background-color:#FFFFB9;"><?php echo $res['Hod_Percent_ProCorrSalary']; ?></td>	
   <td class="td33" align="right" style="background-color:#DDDDFF;"><?php echo floatval($res['Hod_IncNetMonthalySalary']); ?></td>
   <td class="td22" style="background-color:#DDDDFF;"><?php echo $res['Hod_Percent_IncNetMonthalySalary']; ?></td>	
   <td class="td33" align="right" style="background-color:#FFC68C;"><?php echo floatval($res['Hod_GrossMonthlySalary']);?></td>
  </tr>
<?php $sno++;} ?>
<?php } ?>


</table>