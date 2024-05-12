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
<?php if($_REQUEST['action']=='DeptCTC') { $CompanyId=$_REQUEST['c']; $YearId=$_REQUEST['y']; }?>
<?php if($_REQUEST['action']=='DeptCTC') { ?>
    <tr>
<?php if($_REQUEST['value']!='All') { $sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); } ?>	
	 <td valign="top" style=" width:800px;font-size:14px; color:#005BB7; font-family:Georgia; font-weight:bold;">&nbsp;Employee CTC Details :
	  &nbsp;&nbsp;(&nbsp;Department - <?php if($_REQUEST['value']!='All') {echo $resA['DepartmentName']; } else {echo 'All';} ?>&nbsp;)&nbsp;&nbsp;&nbsp;
	  <a href="#" onClick="PrintDept('<?php echo $_REQUEST['value']; ?>')" style="font-size:12px;">Print</a>
	 </td>
	</tr>
<?php } ?>
<?php if($_REQUEST['action']=='DeptCTC') { ?>
<tr>
 <td>
   <table border="1" width="2000">
<tr bgcolor="#7a6189">
<td align="center" style="color:#FFFFFF;" class="All_50"><b>SNo.</b></td>
<td align="center" style="color:#FFFFFF;" class="All_60"><b>EC</b></td>
<td align="center" style="color:#FFFFFF;" class="All_200"><b>Name</b></td>
<td align="center" style="color:#FFFFFF;" class="All_80"><b>Department</b></td>
<td align="center" style="color:#FFFFFF;" class="All_200"><b>Designation</b></td>
<td align="center" style="color:#FFFFFF;" class="All_70"><b>Basic</b></td>
<td align="center" style="color:#FFFFFF;" class="All_70"><b>Stipend</b></td>	
<td align="center" style="color:#FFFFFF;" class="All_70"><b>Incentive</b></td>	
<td align="center" style="color:#FFFFFF;" class="All_70"><b>HRA</b></td>
<td align="center" style="color:#FFFFFF;" class="All_70"><b>Conv</b></td>
<td align="center" style="color:#FFFFFF;" class="All_70"><b>Bonus</b></td>
<td align="center" style="color:#FFFFFF;" class="All_70"><b>TA</b></td>
<td align="center" style="color:#FFFFFF;" class="All_70"><b>Special</b></td>
<td align="center" style="color:#FFFFFF;" class="All_70"><b>Gross Monthly</b></td>
<td align="center" style="color:#FFFFFF;" class="All_70"><b>Gross Monthly (PAC)</b></td>
<td align="center" style="color:#FFFFFF;" class="All_70"><b>PF</b></td>	
<td align="center" style="color:#FFFFFF;" class="All_70"><b>ESIC</b></td>
<td align="center" style="color:#FFFFFF;" class="All_70"><b>NPS</b></td>
<td align="center" style="color:#FFFFFF;" class="All_70"><b>Net Monthaly</b></td>
<td align="center" style="color:#FFFFFF;" class="All_70"><b>Medical Reim.</b></td>	
<td align="center" style="color:#FFFFFF;" class="All_70"><b>LTA</b></td>
<td align="center" style="color:#FFFFFF;" class="All_70"><b>CEA</b></td>	
<td align="center" style="color:#FFFFFF;" class="All_70"><b>Annual Gross</b></td>
<!--<td align="center" style="color:#FFFFFF;" class="All_70"><b>Bonus</b></td>-->
<td align="center" style="color:#FFFFFF;" class="All_70"><b>Gratuity</b></td>
<td align="center" style="color:#FFFFFF;" class="All_70"><b>PF Contri</b></td>	
<td align="center" style="color:#FFFFFF;" class="All_70"><b>ESIC Contri</b></td>	
<td align="center" style="color:#FFFFFF;" class="All_70"><b>MPP</b></td>
<td align="center" style="color:#FFFFFF;" class="All_70"><b>CTC</b></td>	
<td align="center" style="color:#FFFFFF;" class="All_70"><b>MIC</b></td>
<td align="center" style="color:#FFFFFF;" class="All_70"><b>Car Allowance</b></td>
</tr>
<?php if($_REQUEST['value']=='All') {$sql=mysql_query("select hrm_employee.*,DepartmentId,DesigId,hrm_employee_ctc.* from hrm_employee_ctc INNER JOIN hrm_employee ON hrm_employee_ctc.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_ctc.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus!='De' AND hrm_employee_ctc.Status='A' order by EmpCode ASC", $con); }
else {$sql=mysql_query("select hrm_employee.*,DepartmentId,DesigId,hrm_employee_ctc.* from hrm_employee_ctc INNER JOIN hrm_employee ON hrm_employee_ctc.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_ctc.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus!='De' AND hrm_employee_ctc.Status='A' order by EmpCode ASC", $con); } 
$Sno=1; while($res=mysql_fetch_array($sql)){ $Ename=$res['Fname'].' '.$res['Sname'].' '.$res['Lname']; 
$sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
$sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$res['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
?> 
<tr bgcolor="#FFFFFF">
<td align="center" style="" class="All_50" valign="top"><?php echo $Sno; ?></td>
<td align="center" style="background-color:#E8D2FB;" class="All_60" valign="top"><?php echo $res['EmpCode']; ?></td>
<td align="" style="background-color:#E8D2FB;" class="All_200" valign="top"><?php echo $Ename; ?></td>
<td align="" style="" class="All_80" valign="top"><?php echo $resDept['DepartmentCode']; ?></td>
<td align="" style="" class="All_200" valign="top"><?php echo $resDesig['DesigName']; ?></td>
<td align="right" style="background-color:#FFFFBF;" class="All_70"><?php echo $res['BAS_Value']; ?>&nbsp;</td>
<td align="right" style="background-color:#FFFFBF;" class="All_70"><?php echo $res['STIPEND_Value']; ?>&nbsp;</td>	
<td align="right" style="background-color:#FFFFBF;" class="All_70"><?php echo $res['INCENTIVE_Value']; ?>&nbsp;</td>	
<td align="right" style="background-color:#FFFFBF;" class="All_70"><?php echo $res['HRA_Value']; ?>&nbsp;</td>
<td align="right" style="background-color:#FFFFBF;" class="All_70"><?php echo $res['CONV_Value']; ?>&nbsp;</td>
<td align="right" style="background-color:#FFFFBF;" class="All_70"><?php echo $res['Bonus_Month']; ?>&nbsp;</td>
<td align="right" style="background-color:#FFFFBF;" class="All_70"><?php echo $res['TA_Value']; ?>&nbsp;</td>
<td align="right" style="background-color:#FFFFBF;" class="All_70"><?php echo $res['SPECIAL_ALL_Value']; ?>&nbsp;</td>
<td align="right" style="background-color:#BFFF80;" class="All_70"><?php echo $res['Tot_GrossMonth']; ?>&nbsp;</td>
<td align="right" style="background-color:#BFFF80;" class="All_70"><?php echo $res['GrossSalary_PostAnualComponent_Value']; ?>&nbsp;</td>
<td align="right" style="background-color:#8CC6FF;" class="All_70"><?php echo $res['PF_Employee_Contri_Value']; ?>&nbsp;</td>	
<td align="right" style="background-color:#8CC6FF;" class="All_70"><?php echo $res['ESIC']; ?>&nbsp;</td>
<td align="right" style="background-color:#8CC6FF;" class="All_70"><?php echo $res['NPS_Value']; ?>&nbsp;</td>
<td align="right" style="background-color:#8CC6FF;" class="All_70"><?php echo $res['NetMonthSalary_Value']; ?>&nbsp;</td>
<td align="right" style="background-color:#8CC6FF;" class="All_70"><?php echo $res['MED_REM_Value']; ?>&nbsp;</td>	
<td align="right" style="background-color:#8CC6FF;" class="All_70"><?php echo $res['LTA_Value']; ?>&nbsp;</td>
<td align="right" style="background-color:#8CC6FF;" class="All_70"><?php echo $res['CHILD_EDU_ALL_Value']; ?>&nbsp;</td>	
<td align="right" style="background-color:#BFFF80;" class="All_70"><?php echo $res['Tot_Gross_Annual']; ?>&nbsp;</td>
<?php /*?><td align="right" style="background-color:#FFD2D2;" class="All_70"><?php echo $res['BONUS_Value']; ?>&nbsp;</td><?php */?>
<td align="right" style="background-color:#FFD2D2;" class="All_70"><?php echo $res['GRATUITY_Value']; ?>&nbsp;</td>
<td align="right" style="background-color:#FFD2D2;" class="All_70"><?php echo $res['PF_Employer_Contri_Annul']; ?>&nbsp;</td>	
<td align="right" style="background-color:#FFD2D2;" class="All_70"><?php echo $res['AnnualESCI']; ?>&nbsp;</td>	
<td align="right" style="background-color:#FFD2D2;" class="All_70"><?php echo $res['Mediclaim_Policy']; ?>&nbsp;</td>
<td align="right" style="background-color:#F3D15C;" class="All_70"><?php echo $res['Tot_CTC']; ?>&nbsp;</td>	
<td align="right" style="" class="All_70"><?php echo $res['EmpAddBenifit_MediInsu_value']; ?>&nbsp;</td>
<td align="right" style="" class="All_70"><?php echo $res['CAR_ALL_Value']; ?>&nbsp;</td>
</tr>
<?php } ?> 
   </table>
 </td>
</tr> 
<?php } ?>

</table>  
 
</body>
</html>

