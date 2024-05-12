<?php require_once('../AdminUser/config/config.php'); ?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;} .All{font-size:11px; height:20px;} .All_80{font-size:11px; height:20px; width:80px;}
.All_40{font-size:11px; height:20px; width:40px;} .All_50{font-size:11px; height:20px; width:50px;} .All_70{font-size:11px; height:20px; width:70px;} .All_80{font-size:11px; height:20px; width:80px;}.All_100{font-size:11px; height:20px; width:100px;} .All_120{font-size:11px; height:20px; width:120px;} .All_140{font-size:11px; height:20px; width:140px;} .All_60{font-size:11px; height:20px; width:60px;}
.All_150{font-size:11px; height:20px; width:150px;}.All_170{font-size:11px; height:20px; width:170px;}.All_180{font-size:11px; height:20px; width:180px;}.All_190{font-size:11px; height:20px; width:190px;} .All_200{font-size:11px; height:20px; width:200px;} .All_450{font-size:11px; height:20px; width:450px;}.All_360{font-size:11px; height:20px; width:350px;}.All_540{font-size:11px; height:20px; width:540px;}.All_400{font-size:11px; height:20px; width:400px;} .All_600{font-size:11px; height:20px; width:600px;}
</style>
<script language="javascript" type="text/javascript">
function Printpage()
 { window.print(); window.close(); }
</script>
</head>
<body class="body">
<table>
<tr><td>&nbsp;</td></tr>
<?php if($_REQUEST['action']=='AppRev') { $CompanyId=$_REQUEST['c']; $YearId=$_REQUEST['y']; ?>
<tr>
 <td>
   <table border="1" width="1250">
     <tr>
<?php $sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); ?>	 
	  <td colspan="8" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Georgia; font-weight:bold;">&nbsp;Appraiser/ Reviewer/ HOD Name :
	  &nbsp;&nbsp;(&nbsp;Department - <?php echo $resA['DepartmentName']; ?>&nbsp;)&nbsp;&nbsp;&nbsp;
	  <a href="#" onClick="Printpage()" style="color:#F9F900; font-size:12px;">Print</a>
	  </td>
	 </tr>
	 <tr bgcolor="#7a6189">
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>SNo.</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>EmpCode</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_200"><b>Name</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_120"><b>Department</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_200"><b>Designation</b></td>	
		<td align="center" style="color:#FFFFFF;" class="All_200"><b>Appraiser Name</b></td>	
		<td align="center" style="color:#FFFFFF;" class="All_200"><b>Reviewer Name</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_200"><b>HOD Name</b></td>
	</tr>
<?php $sqlD=mysql_query("select hrm_employee.*, hrm_employee_general.DepartmentId, hrm_employee_general.DesigId, hrm_employee_general.HqId, hrm_employee_general.GradeId, hrm_employee_general.DesigId, Appraiser_EmployeeID, Reviewer_EmployeeID, HOD_EmployeeID from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee_pms.HR_Curr_DepartmentId=".$_REQUEST['value']." AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$YearId, $con); $Sno=1; while($resD=mysql_fetch_array($sqlD)){ ?>    
	 <tr bgcolor="#FFFFFF">
		<td align="center" style="" class="All_50"><?php echo $Sno; ?></td>
		<td align="center" style="" class="All_80"><?php echo $resD['EmpCode']; ?></td>
		<td align="" style="" class="All_200"><?php echo $resD['Fname'].' '.$resD['Sname'].' '.$resD['Lname']; ?></td>
<?php $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resD['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); ?>		
		<td align="" style="" class="All_120"><?php echo $resDept['DepartmentCode']; ?></td>
<?php $sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$resD['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig); ?>		
		<td align="" style="" class="All_200"><?php echo $resDesig['DesigName']; ?></td>
<?php $sqlE1=mysql_query("select Fname, Sname, Lname from hrm_employee where EmployeeID=".$resD['Appraiser_EmployeeID'], $con); $resE1=mysql_fetch_assoc($sqlE1); ?>		
		<td bgcolor="#D5FFD5" align="" style="" class="All_200"><?php echo $resE1['Fname'].' '.$resE1['Sname'].' '.$resE1['Lname']; ?></td>
<?php $sqlE2=mysql_query("select Fname, Sname, Lname from hrm_employee where EmployeeID=".$resD['Reviewer_EmployeeID'], $con); $resE2=mysql_fetch_assoc($sqlE2); ?>	
		<td bgcolor="#D5FFD5" align="" style="" class="All_200"><?php echo $resE2['Fname'].' '.$resE2['Sname'].' '.$resE2['Lname']; ?></td>
<?php $sqlE3=mysql_query("select Fname, Sname, Lname from hrm_employee where EmployeeID=".$resD['HOD_EmployeeID'], $con); $resE3=mysql_fetch_assoc($sqlE3); ?>			
		 <td bgcolor="#D5FFD5" align="" style="" class="All_200"><?php echo $resE3['Fname'].' '.$resE3['Sname'].' '.$resE3['Lname']; ?></td>
	 </tr>
	 <?php $Sno++; } ?> 
   </table>
 </td>
</tr> 
<?php } if($_REQUEST['action']=='DeptScore') { $CompanyId=$_REQUEST['c']; $YearId=$_REQUEST['y']; ?>
<tr>
 <td>
   <table border="1" width="1250">
     <tr>
<?php $sqlB=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resB=mysql_fetch_assoc($sqlB); ?>		 
	  <td colspan="13" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Georgia; font-weight:bold;">&nbsp;PMS Score Department Wise :
	  &nbsp;&nbsp;(&nbsp;Department - <?php echo $resB['DepartmentName']; ?>&nbsp;)&nbsp;&nbsp;&nbsp;
	  <a href="#" onClick="Printpage()" style="color:#F9F900; font-size:12px;">Print</a>
	  </td>
	 </tr>
	 <tr bgcolor="#7a6189">
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>SNo.</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>EmpCode</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_250"><b>Name</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_120"><b>Department</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_200"><b>Designation</b></td>	
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>Grade</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_150"><b>State</b></td>	
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>Emp</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>App</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>Rev</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>HOD</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>Score</b></td>		 
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>Rating</b></td>
	</tr>
<?php $sqlD=mysql_query("select hrm_employee.*, hrm_employee_general.DepartmentId, hrm_employee_general.DesigId, hrm_employee_general.HqId, hrm_employee_general.GradeId, hrm_employee_general.DesigId, Emp_TotalFinalScore, Appraiser_TotalFinalScore, Reviewer_TotalFinalScore, Hod_TotalFinalScore, HR_Score, HR_Rating from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee_pms.HR_Curr_DepartmentId=".$_REQUEST['value']." AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$YearId, $con); $Sno=1; while($resD=mysql_fetch_array($sqlD)){ ?>    
	 <tr bgcolor="#FFFFFF">
		<td align="center" style="" class="All_50"><?php echo $Sno; ?></td>
		<td align="center" style="" class="All_80"><?php echo $resD['EmpCode']; ?></td>
		<td align="" style="" class="All_250"><?php echo $resD['Fname'].' '.$resD['Sname'].' '.$resD['Lname']; ?></td>
<?php $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resD['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); ?>		
		<td align="" style="" class="All_120"><?php echo $resDept['DepartmentCode']; ?></td>
<?php $sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$resD['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig); ?>		
		<td align="" style="" class="All_200"><?php echo $resDesig['DesigName']; ?></td>
<?php $sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$resD['GradeId'], $con); $resG=mysql_fetch_assoc($sqlG); ?>		
		<td align="center" style="" class="All_50"><?php echo $resG['GradeValue']; ?></td>
<?php $sqlS=mysql_query("select StateName from hrm_state INNER JOIN hrm_headquater ON hrm_state.StateId=hrm_headquater.StateId where HqId=".$resD['HqId'], $con); $resS=mysql_fetch_assoc($sqlS); ?>			
		<td align="" style="" class="All_150"><?php echo $resS['StateName']; ?></td>
		<td align="center" style="" class="All_60"><?php echo $resD['Emp_TotalFinalScore']; ?></td>
		<td align="center" style="" class="All_60"><?php echo $resD['Appraiser_TotalFinalScore']; ?></td>
		<td align="center" style="" class="All_60"><?php echo $resD['Reviewer_TotalFinalScore']; ?></td>
		<td align="center" style="" class="All_60"><?php echo $resD['Hod_TotalFinalScore']; ?></td> 
		<td bgcolor="#D5FFD5" align="center" style="" class="All_60"><?php echo $resD['HR_Score']; ?></td>
		<td bgcolor="#D5FFD5" align="center" style="" class="All_80"><?php echo $resD['HR_Rating']; ?></td>
	 </tr>
	 <?php $Sno++; } ?> 
   </table>
 </td>
</tr> 
<?php } if($_REQUEST['action']=='HodScore') { $CompanyId=$_REQUEST['c']; $YearId=$_REQUEST['y']; ?>
<tr>
 <td>
   <table border="1" width="1250">
    <tr>
<?php $sqlA=mysql_query("select Fname, Sname, Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); ?>	
	  <td colspan="13" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Georgia; font-weight:bold;">&nbsp;PMS Score HOD Wise :
	  &nbsp;&nbsp;(&nbsp;HOD - <?php echo $resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname']; ?>&nbsp;)&nbsp;&nbsp;&nbsp;
	  <a href="#" onClick="Printpage()" style="color:#F9F900; font-size:12px;">Print</a>
	  </td>
	 </tr>
	 <tr bgcolor="#7a6189">
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>SNo.</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>EmpCode</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_250"><b>Name</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_120"><b>Department</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_200"><b>Designation</b></td>	
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>Grade</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_150"><b>State</b></td>	
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>Emp</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>App</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>Rev</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>HOD</b></td> 
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>Score</b></td> 
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>Rating</b></td>
	</tr>
<?php $sqlH=mysql_query("select hrm_employee.*, hrm_employee_general.DepartmentId, hrm_employee_general.DesigId, hrm_employee_general.HqId, hrm_employee_general.GradeId, hrm_employee_general.DesigId, Emp_TotalFinalScore, Appraiser_TotalFinalScore, Reviewer_TotalFinalScore, Hod_TotalFinalScore, HR_Score, HR_Rating from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$YearId, $con); 
$Sno=1; while($resH=mysql_fetch_array($sqlH)){ ?>    
	 <tr bgcolor="#FFFFFF">
		<td align="center" style="" class="All_50"><?php echo $Sno; ?></td>
		<td align="center" style="" class="All_80"><?php echo $resH['EmpCode']; ?></td>
		<td align="" style="" class="All_250"><?php echo $resH['Fname'].' '.$resH['Sname'].' '.$resH['Lname']; ?></td>
<?php $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resH['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); ?>		
		<td align="" style="" class="All_120"><?php echo $resDept['DepartmentCode']; ?></td>
<?php $sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$resH['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig); ?>		
		<td align="" style="" class="All_200"><?php echo $resDesig['DesigName']; ?></td>
<?php $sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$resH['GradeId'], $con); $resG=mysql_fetch_assoc($sqlG); ?>		
		<td align="center" style="" class="All_50"><?php echo $resG['GradeValue']; ?></td>
<?php $sqlS=mysql_query("select StateName from hrm_state INNER JOIN hrm_headquater ON hrm_state.StateId=hrm_headquater.StateId where HqId=".$resH['HqId'], $con); $resS=mysql_fetch_assoc($sqlS); ?>			
		<td align="" style="" class="All_150"><?php echo $resS['StateName']; ?></td>
		<td align="center" style="" class="All_60"><?php echo $resH['Emp_TotalFinalScore']; ?></td>
		<td align="center" style="" class="All_60"><?php echo $resH['Appraiser_TotalFinalScore']; ?></td>
		<td align="center" style="" class="All_60"><?php echo $resH['Reviewer_TotalFinalScore']; ?></td>
		<td align="center" style="" class="All_60"><?php echo $resH['Hod_TotalFinalScore']; ?></td> 
		<td bgcolor="#D5FFD5" align="center" style="" class="All_60"><?php echo $resH['HR_Score']; ?></td>
		<td bgcolor="#D5FFD5" align="center" style="" class="All_80"><?php echo $resH['HR_Rating']; ?></td>
	 </tr>
	 <?php $Sno++; } ?> 
   </table>
 </td>
</tr> 
<?php } if($_REQUEST['action']=='DeptInc') { $CompanyId=$_REQUEST['c']; $YearId=$_REQUEST['y']; ?>
<tr>
 <td>
   <table border="1" width="1500">
   <tr bgcolor="#FFFFFF" style="height:20px;">
    <td colspan="18" style="font-family:Georgia; font-size:12px;">
	<font color="#400000"><b>CD</b> :&nbsp;</font><font color="#004600">Current Designation,&nbsp;</font>
	<font color="#400000"><b>PD</b> :&nbsp;</font><font color="#004600">Proposed Designation,&nbsp;</font>
	<font color="#400000"><b>CG</b> :&nbsp;</font><font color="#004600">Current Grade,&nbsp;</font>
	<font color="#400000"><b>PG</b> :&nbsp;</font><font color="#004600">Proposed Grade,&nbsp;</font>
	<font color="#400000"><b>PGSPM</b> :&nbsp;</font><font color="#004600">Proposed Gross Salary Per Month,&nbsp;</font>
	<font color="#400000"><b>PIS</b> :&nbsp;</font><font color="#004600">Proposed Increment Salary,&nbsp;</font>
	<font color="#400000"><b>PSC</b> :&nbsp;</font><font color="#004600">Proposed Salary Correction,&nbsp;</font>
	<font color="#400000"><b>TISPM</b> :&nbsp;</font><font color="#004600">Total Increment Salary Per Month&nbsp;</font>
   </td>
   </tr>
   <tr>
<?php $sqlC=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resC=mysql_fetch_assoc($sqlC); ?>	   
	 <td colspan="18" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Georgia; font-weight:bold;">&nbsp;PMS Increment Reports Department Wise :
	  &nbsp;&nbsp;(&nbsp;Department - <?php echo $resC['DepartmentName']; ?>&nbsp;)&nbsp;&nbsp;&nbsp;
	  <a href="#" onClick="Printpage()" style="color:#F9F900; font-size:12px;">Print</a>
	  </td>
	 </tr>
	 <tr bgcolor="#7a6189">
		<td align="center" style="color:#FFFFFF;" class="All_40"><b>SNo.</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_70"><b>EmpCode</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_200"><b>Name</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_120"><b>Department</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>Score</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>Rating</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_150"><b>CD</b></td>	
		<td align="center" style="color:#FFFFFF;" class="All_150"><b>PD</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_40"><b>CG</b></td>	
		<td align="center" style="color:#FFFFFF;" class="All_40"><b>PG</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_70"><b>Pre_PGSPM</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_70"><b>PGSPM</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>% PIS</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_70"><b>PSC</b></td> 
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>% PSC</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_70"><b>TISPM</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>% TISPM</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_70"><b>TPGSPM</b></td>		
	</tr>
<?php $sqlD=mysql_query("select hrm_employee.*, hrm_employee_general.DepartmentId, hrm_employee_general.DesigId, hrm_employee_general.HqId, hrm_employee_general.GradeId, hrm_employee_general.DesigId, HR_CurrDesigId, HR_CurrGradeId, HR_Score, HR_Rating, HR_DesigId, HR_GradeId, HR_ProIncSalary, HR_Percent_ProIncSalary, HR_ProCorrSalary, HR_Percent_ProCorrSalary, HR_IncNetMonthalySalary, HR_Percent_IncNetMonthalySalary, HR_GrossMonthlySalary, HR_GrossAnnualSalary, HR_CTC from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee_pms.HR_Curr_DepartmentId=".$_REQUEST['value']." AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$YearId, $con); 
$Sno=1; while($resD=mysql_fetch_array($sqlD)){ ?>        
	 <tr bgcolor="#FFFFFF" <?php //if($Sno%2==0){ echo 'bgcolor="#FFE1FF"';  } else { echo 'bgcolor="#FFFFFF"';}?>>
		<td align="center" style="" class="All_40"><?php echo $Sno; ?></td>
		<td align="center" style="" class="All_70"><?php echo $resD['EmpCode']; ?></td>
		<td align="" style="" class="All_200"><?php echo $resD['Fname'].' '.$resD['Sname'].' '.$resD['Lname']; ?></td>
<?php $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resD['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); ?>		
		<td align="" style="" class="All_120"><?php echo $resDept['DepartmentCode']; ?></td>
		<td align="center" style="" class="All_50"><?php echo $resD['HR_Score']; ?></td>
		<td align="center" style="" class="All_60"><?php echo $resD['HR_Rating']; ?></td>		
<?php $sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$resD['HR_CurrDesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig); ?>		
		<td align="" style="" class="All_150"><?php echo $resDesig['DesigName']; ?></td>
<?php $sqlDesig2=mysql_query("select DesigName from hrm_designation where DesigId=".$resD['HR_DesigId'], $con); $resDesig2=mysql_fetch_assoc($sqlDesig2); ?>				
		<td align="" style="" class="All_150"><?php if($resD['HR_DesigId']!=$resD['HR_CurrDesigId']){echo $resDesig2['DesigName']; }?></td>
<?php $sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$resD['HR_CurrGradeId'], $con); $resG=mysql_fetch_assoc($sqlG); ?>		
		<td align="center" style="" class="All_40"><?php echo $resG['GradeValue']; ?></td>
<?php $sqlG2=mysql_query("select GradeValue from hrm_grade where GradeId=".$resD['HR_GradeId'], $con); $resG2=mysql_fetch_assoc($sqlG2); ?>				
		<td align="center" style="" class="All_40"><?php if($resD['HR_GradeId']!=$resD['HR_CurrGradeId']){echo $resG2['GradeValue'];} ?></td>
<?php $sqlPre=mysql_query("select Previous_GrossSalaryPM from hrm_pms_appraisal_history where EmpCode=".$resD['EmpCode']." AND CompanyId=".$CompanyId." AND YearId=".$YearId, $con); $resPre=mysql_fetch_assoc($sqlPre); ?>		
		<td align="right" style="" class="All_70" bgcolor="#66B3FF"><?php echo $resPre['Previous_GrossSalaryPM']; ?>&nbsp;</td>		
        <td align="right" style="" class="All_70"><?php echo $resD['HR_ProIncSalary']; ?>&nbsp;</td>
		<td align="center" style="" class="All_60"><?php echo $resD['HR_Percent_ProIncSalary']; ?></td>
		<td align="right" style="" class="All_70"><?php echo $resD['HR_ProCorrSalary']; ?>&nbsp;</td> 
		<td align="center" style="" class="All_60"><?php echo $resD['HR_Percent_ProCorrSalary']; ?></td>
		<td align="right" style="" class="All_70"><?php echo $resD['HR_IncNetMonthalySalary']; ?>&nbsp;</td>
		<td bgcolor="#D5FFD5" align="center" style="" class="All_60"><?php echo $resD['HR_Percent_IncNetMonthalySalary']; ?></td>
		<td bgcolor="#D5FFD5" align="right" style="" class="All_70"><?php echo $resD['HR_GrossMonthlySalary']; ?>&nbsp;</td>	
	 </tr>
	 <?php $Sno++; } ?> 
   </table>
 </td>
</tr> 
<?php } if($_REQUEST['action']=='HodInc') { $CompanyId=$_REQUEST['c']; $YearId=$_REQUEST['y']; ?>
<tr>
 <td>
   <table border="1" width="1500">
   <tr bgcolor="#FFFFFF" style="height:20px;">
    <td colspan="18" style="font-family:Georgia; font-size:12px;">
	<font color="#400000"><b>CD</b> :&nbsp;</font><font color="#004600">Current Designation,&nbsp;</font>
	<font color="#400000"><b>PD</b> :&nbsp;</font><font color="#004600">Proposed Designation,&nbsp;</font>
	<font color="#400000"><b>CG</b> :&nbsp;</font><font color="#004600">Current Grade,&nbsp;</font>
	<font color="#400000"><b>PG</b> :&nbsp;</font><font color="#004600">Proposed Grade,&nbsp;</font>
	<font color="#400000"><b>PGSPM</b> :&nbsp;</font><font color="#004600">Proposed Gross Salary Per Month,&nbsp;</font>
	<font color="#400000"><b>PIS</b> :&nbsp;</font><font color="#004600">Proposed Increment Salary,&nbsp;</font>
	<font color="#400000"><b>PSC</b> :&nbsp;</font><font color="#004600">Proposed Salary Correction,&nbsp;</font>
	<font color="#400000"><b>TISPM</b> :&nbsp;</font><font color="#004600">Total Increment Salary Per Month&nbsp;</font>
   </td>
   </tr>
   <tr>
<?php $sqlB=mysql_query("select Fname, Sname, Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resB=mysql_fetch_assoc($sqlB); ?>   
	 <td colspan="18" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Georgia; font-weight:bold;">&nbsp;PMS Increment Reports HOD Wise :
	  &nbsp;&nbsp;(&nbsp;HOD - <?php echo $resB['Fname'].' '.$resB['Sname'].' '.$resB['Lname']; ?>&nbsp;)&nbsp;&nbsp;&nbsp;
	  <a href="#" onClick="Printpage()" style="color:#F9F900; font-size:12px;">Print</a>
	  </td>
	 </tr>
	 <tr bgcolor="#7a6189">
		<td align="center" style="color:#FFFFFF;" class="All_40"><b>SNo.</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_70"><b>EmpCode</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_200"><b>Name</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_120"><b>Department</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>Score</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>Rating</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_150"><b>CD</b></td>	
		<td align="center" style="color:#FFFFFF;" class="All_150"><b>PD</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_40"><b>CG</b></td>	
		<td align="center" style="color:#FFFFFF;" class="All_40"><b>PG</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_70"><b>Pre_PGSPM</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_70"><b>PGSPM</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>% PIS</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_70"><b>PSC</b></td> 
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>% PSC</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_70"><b>TISPM</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>% TISPM</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_70"><b>TPGSPM</b></td>		
	</tr>
<?php $sqlD=mysql_query("select hrm_employee.*, hrm_employee_general.DepartmentId, hrm_employee_general.DesigId, hrm_employee_general.HqId, hrm_employee_general.GradeId, hrm_employee_general.DesigId, HR_CurrDesigId, HR_CurrGradeId, HR_Score, HR_Rating, HR_DesigId, HR_GradeId, HR_ProIncSalary, HR_Percent_ProIncSalary, HR_ProCorrSalary, HR_Percent_ProCorrSalary, HR_IncNetMonthalySalary, HR_Percent_IncNetMonthalySalary, HR_GrossMonthlySalary, HR_GrossAnnualSalary, HR_CTC from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$YearId, $con); 
$Sno=1; while($resD=mysql_fetch_array($sqlD)){ ?>        
	 <tr bgcolor="#FFFFFF" <?php //if($Sno%2==0){ echo 'bgcolor="#FFE1FF"';  } else { echo 'bgcolor="#FFFFFF"';}?>>
		<td align="center" style="" class="All_40"><?php echo $Sno; ?></td>
		<td align="center" style="" class="All_70"><?php echo $resD['EmpCode']; ?></td>
		<td align="" style="" class="All_200"><?php echo $resD['Fname'].' '.$resD['Sname'].' '.$resD['Lname']; ?></td>
<?php $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resD['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); ?>		
		<td align="" style="" class="All_120"><?php echo $resDept['DepartmentCode']; ?></td>
		<td align="center" style="" class="All_50"><?php echo $resD['HR_Score']; ?></td>
		<td align="center" style="" class="All_60"><?php echo $resD['HR_Rating']; ?></td>		
<?php $sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$resD['HR_CurrDesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig); ?>		
		<td align="" style="" class="All_150"><?php echo $resDesig['DesigName']; ?></td>
<?php $sqlDesig2=mysql_query("select DesigName from hrm_designation where DesigId=".$resD['HR_DesigId'], $con); $resDesig2=mysql_fetch_assoc($sqlDesig2); ?>				
		<td align="" style="" class="All_150"><?php if($resD['HR_DesigId']!=$resD['HR_CurrDesigId']){echo $resDesig2['DesigName']; }?></td>
<?php $sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$resD['HR_CurrGradeId'], $con); $resG=mysql_fetch_assoc($sqlG); ?>		
		<td align="center" style="" class="All_40"><?php echo $resG['GradeValue']; ?></td>
<?php $sqlG2=mysql_query("select GradeValue from hrm_grade where GradeId=".$resD['HR_GradeId'], $con); $resG2=mysql_fetch_assoc($sqlG2); ?>				
		<td align="center" style="" class="All_40"><?php if($resD['HR_GradeId']!=$resD['HR_CurrGradeId']){echo $resG2['GradeValue'];} ?></td>
<?php $sqlPre=mysql_query("select Previous_GrossSalaryPM from hrm_pms_appraisal_history where EmpCode=".$resD['EmpCode']." AND CompanyId=".$CompanyId." AND YearId=".$YearId, $con); $resPre=mysql_fetch_assoc($sqlPre); ?>		
		<td align="right" style="" class="All_70" bgcolor="#66B3FF"><?php echo $resPre['Previous_GrossSalaryPM']; ?>&nbsp;</td>				
        <td align="right" style="" class="All_70"><?php echo $resD['HR_ProIncSalary']; ?>&nbsp;</td>
		<td align="center" style="" class="All_60"><?php echo $resD['HR_Percent_ProIncSalary']; ?></td>
		<td align="cright" style="" class="All_70"><?php echo $resD['HR_ProCorrSalary']; ?>&nbsp;</td> 
		<td align="center" style="" class="All_60"><?php echo $resD['HR_Percent_ProCorrSalary']; ?></td>
		<td align="right" style="" class="All_70"><?php echo $resD['HR_IncNetMonthalySalary']; ?>&nbsp;</td>
		<td bgcolor="#D5FFD5" align="center" style="" class="All_60"><?php echo $resD['HR_Percent_IncNetMonthalySalary']; ?></td>
		<td bgcolor="#66B3FF" align="right" style="" class="All_70"><?php echo $resD['HR_GrossMonthlySalary']; ?>&nbsp;</td>	
	 </tr>
	 <?php $Sno++; } ?> 
   </table>
 </td>
</tr> 
<?php } ?>

</table>  
 
</body>
</html>

