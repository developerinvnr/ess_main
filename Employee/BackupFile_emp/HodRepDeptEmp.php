<?php 

require_once('../AdminUser/config/config.php');

if(isset($_POST['StDeptid']) && $_POST['StDeptid']!=""){ $StDeptid = $_POST['StDeptid']; $EmpId = $_POST['EmpId']; $YI = $_POST['YI'];?>	 

<table border="">

		  <tr bgcolor="#7a6189" style="height:20px;" valign="middle">

	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:30px;"><b>SN</b></td>

	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>EC</b></td>

	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:200px;"><b>Name</b></td>

	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:100px;"><b>Department</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:200px;"><b>Designation</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>Grade</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:120px;"><b>State</b></td>			

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>Score</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>Rating</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:200px;"><b>PD</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>PG</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>PGSPM</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>% PIS</b></td>

            <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>PSC</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>% SC</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>TISPM</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>% TISPM</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>TPGSPM</b></td>

		 </tr>

<?php $sql=mysql_query("select hrm_employee.*,Hod_TotalFinalScore,Hod_TotalFinalRating,Hod_EmpDesignation,Hod_EmpGrade,Hod_ProIncSalary,Hod_Percent_ProIncSalary,Hod_ProCorrSalary,Hod_Percent_ProCorrSalary,Hod_IncNetMonthalySalary,Hod_Percent_IncNetMonthalySalary,Hod_GrossMonthlySalary,hrm_employee_general.DepartmentId,hrm_employee_general.DesigId,hrm_employee_general.DesigId2,hrm_employee_general.HqId,GradeId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID INNER JOIN hrm_headquater ON hrm_employee_general.HqId=hrm_headquater.HqId where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$YI." AND hrm_employee_general.DepartmentId=".$StDeptid." AND hrm_employee_pms.HOD_EmployeeID=".$EmpId, $con);



 $sno=1; while($res=mysql_fetch_array($sql)){ ?>     		

		<tr style="height:20px; background-color:<?php if($sno%2==0){echo '#ECFFEC';} else {echo '#FFFFFF';} ?>;" valign="middle">

	        <td align="center" style="font:Georgia; font-size:11px; width:30px;"><?php echo $sno; ?></td>

	        <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $res['EmpCode']; ?></td>

	        <td align="" style="font:Georgia; font-size:11px; width:200px;"><?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>

<?php $sql2=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con); 

      $res2=mysql_fetch_assoc($sql2);?><td align="" style="font:Georgia; font-size:11px; width:100px;">&nbsp;<?php echo $res2['DepartmentCode'];?></td>

<?php $sql3=mysql_query("select DesigName from hrm_designation where DesigId=".$res['DesigId']." OR DesigId=".$res['DesigId2'], $con); 

      $res3=mysql_fetch_assoc($sql3);?>			

			<td align="" style="font:Georgia; font-size:11px; width:200px;">&nbsp;&nbsp;<?php echo $res3['DesigName'];?></td>

<?php $sql5=mysql_query("select StateName from hrm_state INNER JOIN hrm_headquater ON hrm_state.StateId=hrm_headquater.StateId where hrm_headquater.HqId=".$res['HqId'], $con); 

      $res5=mysql_fetch_assoc($sql5);?>		

<?php $sql4=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId'], $con);  $res4=mysql_fetch_assoc($sql4);?>			

			<td align="center" style="font:Georgia; font-size:11px; width:50px;">&nbsp;&nbsp;<?php echo $res4['GradeValue'];?></td>			

			<td align="" style="font:Georgia; font-size:11px; width:120px;">&nbsp;<?php echo $res5['StateName'];?></td>

<?php /* $sqlApp=mysql_query("select * from hrm_employee where EmployeeID=".$res['Appraiser_EmployeeID']);  $resApp=mysql_fetch_assoc($sqlApp);?>						

			<td align="" style="font:Georgia; font-size:11px; width:200px;"><?php echo $resApp['Fname'].' '.$resApp['Sname'].' '.$resApp['Lname']; ?></td>	

<?php $sqlRev=mysql_query("select * from hrm_employee where EmployeeID=".$res['Reviewer_EmployeeID']);  $resRev=mysql_fetch_assoc($sqlRev);?>			

			<td align="" style="font:Georgia; font-size:11px; width:200px;"><?php echo $resRev['Fname'].' '.$resRev['Sname'].' '.$resRev['Lname']; ?></td> */ ?>

			<td align="center" style="font:Georgia; font-size:11px; width:50px; background-color:#FFDDDD;"><?php echo $res['Hod_TotalFinalScore']; ?></td>	

			<td align="center" style="font:Georgia; font-size:11px; width:50px; background-color:#FFDDDD;"><?php echo $res['Hod_TotalFinalRating']; ?></td>

<?php $sql6=mysql_query("select DesigName from hrm_designation where DesigId=".$res['Hod_EmpDesignation'], $con); $res6=mysql_fetch_assoc($sql6);?>					

			<td align="" style="font:Georgia; font-size:11px; width:200px; background-color:#C4FFC4;"><?php echo $res6['DesigName']; ?></td>	

			<td align="center" style="font:Georgia; font-size:11px; width:50px;background-color:#C4FFC4;"><?php echo $res['Hod_EmpGrade']; ?></td>		

			<td align="center" style="font:Georgia; font-size:11px; width:80px; background-color:#BFDFFF;"><?php echo $res['Hod_ProIncSalary']; ?></td>

			<td align="center" style="font:Georgia; font-size:11px; width:50px; background-color:#BFDFFF;"><?php echo $res['Hod_Percent_ProIncSalary']; ?></td>	

			<td align="center" style="font:Georgia; font-size:11px; width:80px; background-color:#FFFFB9;"><?php echo $res['Hod_ProCorrSalary']; ?></td>

			<td align="center" style="font:Georgia; font-size:11px; width:50px; background-color:#FFFFB9;"><?php echo $res['Hod_Percent_ProCorrSalary']; ?></td>	

			<td align="center" style="font:Georgia; font-size:11px; width:80px; background-color:#DDDDFF;"><?php echo $res['Hod_IncNetMonthalySalary']; ?></td>

			<td align="center" style="font:Georgia; font-size:11px; width:50px;background-color:#DDDDFF;"><?php echo $res['Hod_Percent_IncNetMonthalySalary']; ?></td>	

			<td align="center" style="font:Georgia; font-size:11px; width:80px; background-color:#FFC68C;"><?php echo $res['Hod_GrossMonthlySalary']; ?></td>

		 </tr>

<?php $sno++;} ?>		

</table>	 	

<?php } ?>

