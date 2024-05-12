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
 { window.print(); } //window.close();
</script>
</head>
<body class="body">
<?php $CompanyId=$_REQUEST['c']; $YearId=$_REQUEST['y'];
     if($_REQUEST['value']!='All') {$sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); } 
?>
<table>
<tr><td>&nbsp;</td></tr>
<?php if($_REQUEST['action']=='Feed') { ?>
<tr>
 <td>
   <table border="1" width="1100">
   <tr>
	  <td colspan="8" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Georgia; font-weight:bold;">&nbsp;Employee Feedback:
	  &nbsp;&nbsp;(&nbsp;Department - <?php if($_REQUEST['value']!='All'){echo $resA['DepartmentName']; }else{echo 'All Department';}  ?>&nbsp;)&nbsp;&nbsp;&nbsp;
	  <a href="#" onClick="Printpage()" style="color:#F9F900; font-size:12px;">Print</a>&nbsp;&nbsp;
	  </td>
	 </tr>
	 <tr bgcolor="#7a6189">
	   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>SNo</b></td>
	   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:200px;"><b>Name</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:350px;" valign="top" align="center"><b>Environment</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:700px;" valign="top" align="center"><b>Feedcack</b></td>
	</tr>  
<?php if($_REQUEST['value']=='All') { $sqlFe = mysql_query("SELECT hrm_employee_pms_workenvironment.*,Fname,Sname,Lname from hrm_employee_pms_workenvironment INNER JOIN hrm_employee_pms ON hrm_employee_pms_workenvironment.EmpPmsId=hrm_employee_pms.EmpPmsId INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$YearId." AND hrm_employee_pms_workenvironment.Answer!='' order by WorkEnvironment ASC", $con) or die(mysql_error()); } else {$sqlFe = mysql_query("SELECT hrm_employee_pms_workenvironment.*,Fname,Sname,Lname from hrm_employee_pms_workenvironment INNER JOIN hrm_employee_pms ON hrm_employee_pms_workenvironment.EmpPmsId=hrm_employee_pms.EmpPmsId INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$YearId." AND hrm_employee_pms_workenvironment.Answer!='' AND hrm_employee_pms.HR_Curr_DepartmentId=".$_REQUEST['value']." order by WorkEnvironment ASC", $con) or die(mysql_error());} $Sno=1;  while($resFe = mysql_fetch_assoc($sqlFe)) { ?> 
	    <tr bgcolor="#FFFFFF">
		   <td align="center" style="font:Georgia; font-size:11px; width:50px;" valign="top"><?php echo $Sno; ?></td>
		   <td style="font:Georgia; font-size:11px; width:200px;" valign="top"><?php echo $resFe['Fname'].' '.$resFe['Sname'].' '.$resFe['Lname']; ?></td>
		   <td style="font-family:Times New Roman;font-size:14px; width:350px;" valign="top"><?php echo $resFe['WorkEnvironment']; ?></td>
		   <td style="font-family:Times New Roman; font-size:14px; width:700px;" valign="top"><?php echo $resFe['Answer']; ?></td>
		</tr>
<?php $Sno++; } ?>
   </table>
 </td>
</tr> 
<?php }  if($_REQUEST['action']=='NFeed') { ?>
<tr>
 <td>
   <table border="1" width="1100">
   <tr>
	  <td colspan="8" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Georgia; font-weight:bold;">&nbsp;Employee Feedback:
	  &nbsp;&nbsp;(&nbsp;Department - <?php if($_REQUEST['value']!='All'){echo $resA['DepartmentName']; }else{echo 'All Department';}  ?>&nbsp;)&nbsp;&nbsp;&nbsp;
	  <a href="#" onClick="Printpage()" style="color:#F9F900; font-size:12px;">Print</a>&nbsp;&nbsp;
	  </td>
	 </tr>
	 <tr bgcolor="#7a6189">
	   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>SNo</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:350px;" valign="top" align="center"><b>Environment</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:700px;" valign="top" align="center"><b>Feedcack</b></td>
	</tr> 
<?php $sqlE=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value'],$con); 
while($resE=mysql_fetch_array($sqlE)){$Ename=$resE['EmpCode'].' - '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'];
?>		
 <tr bgcolor="#7a6189">
	   <td colspan="3" align="left" style="font:Times New Roman;color:#FFFFFF; font-size:12px; width:1000px;">&nbsp;&nbsp;<b><?php echo $Ename; ?></b></td>
	</tr>
	 
<?php if($_REQUEST['value']=='All') { $sqlFe = mysql_query("SELECT * from hrm_employee_pms_workenvironment INNER JOIN hrm_employee_pms ON hrm_employee_pms_workenvironment.EmpPmsId=hrm_employee_pms.EmpPmsId INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$YearId." AND hrm_employee_pms.EmployeeID=".$resE['EmployeeID']." AND hrm_employee_pms_workenvironment.Answer!='' order by WorkEnvironment ASC", $con) or die(mysql_error()); } else {$sqlFe = mysql_query("SELECT * from hrm_employee_pms_workenvironment INNER JOIN hrm_employee_pms ON hrm_employee_pms_workenvironment.EmpPmsId=hrm_employee_pms.EmpPmsId INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$YearId." AND hrm_employee_pms_workenvironment.Answer!='' AND hrm_employee_pms.EmployeeID=".$resE['EmployeeID']." order by WorkEnvironment ASC", $con) or die(mysql_error());} $Sno=1;  while($resFe = mysql_fetch_assoc($sqlFe)) { ?> 
	    <tr bgcolor="#FFFFFF">
		   <td align="center" style="font:Georgia; font-size:11px; width:50px;" valign="top"><?php echo $Sno; ?></td>
		   <td style="font-family:Times New Roman;font-size:14px; width:350px;" valign="top"><?php echo $resFe['WorkEnvironment']; ?></td>
		   <td style="font-family:Times New Roman; font-size:14px; width:700px;" valign="top"><?php echo $resFe['Answer']; ?></td>
		</tr>
<?php $Sno++; } }?>
   </table>
 </td>
</tr> 
<?php } ?>
</table>  
</body>
</html>



