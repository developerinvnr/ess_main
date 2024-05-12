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
<?php if($_REQUEST['action']=='DeptPersonal') { $CompanyId=$_REQUEST['c']; $YearId=$_REQUEST['y']; ?>
<tr>
 <td>
   <table border="1" width="1500">
     <tr>
<?php if($_REQUEST['value']!='All') {$sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); } ?>	 
	  <td colspan="31" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Georgia; font-weight:bold;">&nbsp;Employee Personal Details :
	  &nbsp;&nbsp;(&nbsp;Department - <?php if($_REQUEST['value']!='All') {echo $resA['DepartmentName']; } else {echo 'All';} ?>&nbsp;)&nbsp;&nbsp;&nbsp;
	  <a href="#" onClick="Printpage('<?php echo $_REQUEST['value']; ?>')" style="color:#F9F900; font-size:12px;">Print</a>
	  </td>
	 </tr>
	 <tr bgcolor="#7a6189"> 
<td align="center" style="color:#FFFFFF;" class="All_50"><b>SNo.</b></td>
<td align="center" style="color:#FFFFFF;" class="All_70"><b>&nbsp;EC&nbsp;</b></td>
<td align="center" style="color:#FFFFFF;" class="All_200"><b>Name</b></td>
<td align="center" style="color:#FFFFFF;" class="All_80"><b>Department</b></td>
<td align="center" style="color:#FFFFFF;" class="All_200"><b>Designation</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_50"><b>Gender</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>Blood Group</b></td>	
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>Sr Citizen</b></td>	
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>Metro City</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Mobile</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Email_ID</b></td>
        <td align="center" style="color:#FFFFFF;" class="All_80"><b>Aadhar No</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>Cast</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Religion</b></td> 

	<td align="center" style="color:#FFFFFF;" class="All_100"><b>PanCard</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Passport</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_70"><b>ValidTo</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_70"><b>ValidFrom</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Driving Lic</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_70"><b>ValidTo</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_70"><b>ValidFrom</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>Marital Status</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_70"><b>Date</b></td>
	</tr>
<?php if($_REQUEST['value']=='All') {$sql=mysql_query("select hrm_employee.*, hrm_employee_personal.*,DepartmentId,DesigId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' order by EmpCode ASC", $con); }
else {$sql=mysql_query("select hrm_employee.*, hrm_employee_personal.*,DepartmentId,DesigId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' order by EmpCode ASC", $con); } 
$Sno=1; while($res=mysql_fetch_array($sql)){ $Ename=$res['Fname'].' '.$res['Sname'].' '.$res['Lname']; 
$sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
$sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$res['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
?> 
   <tr bgcolor="#FFFFFF">
	<td align="center" style="" class="All_50" valign="top"><?php echo $Sno; ?></td>
	<td align="center" style="background-color:#E8D2FB;" class="All_70" valign="top"><?php echo $res['EmpCode']; ?></td>
	<td align="" style="background-color:#E8D2FB;" class="All_200" valign="top"><?php echo $Ename; ?></td>
   <td align="" style="background-color:#E8D2FB;" class="All_80" valign="top"><?php echo $resDept['DepartmentCode']; ?></td>
   <td align="" style="" class="All_200" valign="top"><?php echo $resDesig['DesigName']; ?></td>     
    <td align="center" style="" class="All_50" valign="top"><?php if($res['Gender']=='M'){echo 'Male';}else {echo 'Female';}?></td>
	<td align="center" style="" class="All_50" valign="top"><?php echo $res['BloodGroup']; ?></td>	
	<td align="center" style="" class="All_50" valign="top"><?php if($res['SeniorCitizen']=='Y'){echo 'YES';}else {echo 'NO';} ?></td>	
	<td align="center" style="" class="All_50" valign="top"><?php if($res['MetroCity']=='Y'){echo 'YES';}else {echo 'NO';} ?></td>
	<td align="" style="background-color:#95CAFF;" class="All_80" valign="top"><?php echo $res['MobileNo']; ?></td>
	<td align="" style="background-color:#95CAFF;" class="All_150" valign="top"><?php echo $res['EmailId_Self']; ?></td>
        <td align="" style="background-color:#95CAFF;" class="All_150" valign="top"><?php echo $res['AadharNo']; ?></td>
	<td align="" style="background-color:#95CAFF;" class="All_150" valign="top"><?php echo $res['Categoryy']; ?></td>
	<td align="" style="background-color:#95CAFF;" class="All_150" valign="top"><?php echo $res['Religion']; ?></td>

	<td align="" style="background-color:#C9FDB0;" class="All_100" valign="top"><?php echo $res['PanNo']; ?></td>
	<td align="" style="background-color:#C9FDB0;" class="All_80" valign="top"><?php echo $res['PassportNo']; ?></td>
	<td align="center" style="background-color:#C9FDB0;" class="All_70" valign="top"><?php echo date("d-M-y", strtotime($res['Passport_ExpiryDateFrom'])); ?></td>
	<td align="center" style="background-color:#C9FDB0;" class="All_70" valign="top"><?php echo date("d-M-y", strtotime($res['Passport_ExpiryDateTo'])); ?></td>
	<td align="" style="background-color:#C9FDB0;" class="All_80" valign="top"><?php echo $res['DrivingLicNo']; ?></td>
	<td align="center" style="background-color:#C9FDB0;" class="All_70" valign="top"><?php echo date("d-M-y", strtotime($res['Driv_ExpiryDateFrom'])); ?></td>
	<td align="center" style="background-color:#C9FDB0;" class="All_70" valign="top"><?php echo date("d-M-y", strtotime($res['Driv_ExpiryDateTo'])); ?></td>
	<td align="center" style="background-color:#FCFAB1;" class="All_50" valign="top"><?php if($res['Married']=='Y'){echo 'Married';}else {echo 'Single';} ?></td>
	<td align="center" style="background-color:#FCFAB1;" class="All_70" valign="top"><?php if($res['Married']=='Y') {echo date("d-M-y", strtotime($res['MarriageDate']));} else {echo '';}?></td>
	</tr>   
	 <?php $Sno++; } ?>	
   </table>
 </td>
</tr> 
<?php } ?>

</table>  
 
</body>
</html>

