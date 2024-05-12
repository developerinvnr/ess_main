<?php 
require_once('../AdminUser/config/config.php');
if(isset($_POST['StHQid']) && $_POST['StHQid']!=""){ $StHQid = $_POST['StHQid']; $EmpId = $_POST['EmpId']; $YI = $_POST['YI'];?>	 
<table border="">
		  <tr bgcolor="#7a6189" style="height:20px;" valign="middle">
	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:40px;"><b>SNo.</b></td>
	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>EmpCode</b></td>
	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:200px;"><b>Name</b></td>
	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:120px;"><b>Department</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:120px;"><b>State</b></td>			
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>PGSPM</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>% PIS</b></td>
            <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>SC</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>% SC</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>TISPM</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>% TISPM</b></td>
		 </tr>
<?php if($StHQid=='All') { $sql=mysql_query("select hrm_employee.*,Hod_TotalFinalScore,Hod_TotalFinalRating,Hod_EmpDesignation,Hod_EmpGrade,Hod_ProIncSalary,Hod_Percent_ProIncSalary,Hod_ProCorrSalary,Hod_Percent_ProCorrSalary,Hod_IncNetMonthalySalary,Hod_Percent_IncNetMonthalySalary,Hod_GrossMonthlySalary,DepartmentId,DesigId,DesigId2,HqId,GradeId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$YI." AND hrm_employee_pms.HOD_EmployeeID=".$EmpId, $con); }
    if($StHQid!='All') { $sql=mysql_query("select hrm_employee.*,Hod_TotalFinalScore,Hod_TotalFinalRating,Hod_EmpDesignation,Hod_EmpGrade,Hod_ProIncSalary,Hod_Percent_ProIncSalary,Hod_ProCorrSalary,Hod_Percent_ProCorrSalary,Hod_IncNetMonthalySalary,Hod_Percent_IncNetMonthalySalary,Hod_GrossMonthlySalary,hrm_employee_general.DepartmentId,hrm_employee_general.DesigId,hrm_employee_general.DesigId2,hrm_employee_general.HqId,GradeId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID INNER JOIN hrm_headquater ON hrm_employee_general.HqId=hrm_headquater.HqId where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$YI." AND hrm_headquater.StateId=".$StHQid." AND hrm_employee_pms.HOD_EmployeeID=".$EmpId, $con); }

 $sno=1; while($res=mysql_fetch_array($sql)){ ?>     		
		<tr style="height:20px; background-color:#FFFFFF;" valign="middle">
	        <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $sno; ?></td>
	        <td align="center" style="font:Georgia; font-size:11px; width:80px;"><?php echo $res['EmpCode']; ?></td>
	        <td align="" style="font:Georgia; font-size:11px; width:200px;"><?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
<?php $sql2=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con); 
      $res2=mysql_fetch_assoc($sql2);?><td align="" style="font:Georgia; font-size:11px; width:120px;">&nbsp;<?php echo $res2['DepartmentCode'];?></td>
<?php $sql5=mysql_query("select StateName from hrm_state INNER JOIN hrm_headquater ON hrm_state.StateId=hrm_headquater.StateId where hrm_headquater.HqId=".$res['HqId'], $con); 
      $res5=mysql_fetch_assoc($sql5);?>					
			<td align="" style="font:Georgia; font-size:11px; width:120px;">&nbsp;<?php echo $res5['StateName'];?></td>
			<td align="center" style="font:Georgia; font-size:11px; width:80px; background-color:#FFFFFF;"><?php echo $res['Hod_ProIncSalary']; ?></td>
			<td align="center" style="font:Georgia; font-size:11px; width:80px; background-color:#FFEAEA;"><?php echo $res['Hod_Percent_ProIncSalary']; ?></td>	
			<td align="center" style="font:Georgia; font-size:11px; width:80px; background-color:#FFFFFF;"><?php echo $res['Hod_ProCorrSalary']; ?></td>
			<td align="center" style="font:Georgia; font-size:11px; width:80px; background-color:#FFEAEA;"><?php echo $res['Hod_Percent_ProCorrSalary']; ?></td>	
			<td align="center" style="font:Georgia; font-size:11px; width:80px; background-color:#FFFFFF;"><?php echo $res['Hod_IncNetMonthalySalary']; ?></td>
			<td align="center" style="font:Georgia; font-size:11px; width:80px;background-color:#FFEAEA;"><?php echo $res['Hod_Percent_IncNetMonthalySalary']; ?></td>	
		 </tr>
<?php $sno++;} ?>
<?php if($StHQid=='All') {$SqlCount=mysql_query("select SUM(Hod_Percent_ProIncSalary) as PIS, SUM(Hod_Percent_ProCorrSalary) as PSC, SUM(Hod_Percent_IncNetMonthalySalary)as NIS from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$YI." AND hrm_employee_pms.HOD_EmployeeID=".$EmpId, $con); }
if($StHQid!='All') { $SqlCount=mysql_query("select SUM(Hod_Percent_ProIncSalary) as PIS, SUM(Hod_Percent_ProCorrSalary) as PSC, SUM(Hod_Percent_IncNetMonthalySalary)as NIS from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_headquater ON hrm_employee_general.HqId=hrm_headquater.HqId where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$YI." AND hrm_headquater.StateId=".$StHQid." AND hrm_employee_pms.HOD_EmployeeID=".$EmpId, $con); } while($ResCount=mysql_fetch_array($SqlCount)){ ?> 
          <tr style="height:20px; background-color:#FFFFFF;" valign="middle">
	        <td colspan="6" align="Right" style="font:Georgia; font-size:11px;font-weight:bold; width:640px;">OVERALL TOTAL INCREMENT :&nbsp;&nbsp;</td>
			<td align="center" style="font:Georgia; font-size:11px; width:80px;font-weight:bold;  background-color:#C4FFC4;"><?php echo $ResCount['PIS']; ?></td>	
			<td align="center" style="font:Georgia; font-size:11px; width:80px; background-color:#FFFFFF;"></td>
			<td align="center" style="font:Georgia; font-size:11px; width:80px;font-weight:bold;  background-color:#C4FFC4;"><?php echo $ResCount['PSC']; ?></td>	
			<td align="center" style="font:Georgia; font-size:11px; width:80px; background-color:#FFFFFF;"></td>
			<td align="center" style="font:Georgia; font-size:11px; width:80px;font-weight:bold; background-color:#C4FFC4;"><?php echo $ResCount['NIS']; ?></td>	
		 </tr>	
<?php } ?>		 		
</table>	 	
<?php } ?>
