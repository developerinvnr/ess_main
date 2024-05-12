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
<?php if($_REQUEST['action']=='DeptElig') { $CompanyId=$_REQUEST['c']; $YearId=$_REQUEST['y']; }?>
<?php if($_REQUEST['action']=='DeptElig') { ?>
    <tr>
<?php if($_REQUEST['value']!='All') { $sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); } ?>	
	 <td valign="top" style=" width:800px;font-size:14px; color:#005BB7; font-family:Georgia; font-weight:bold;">&nbsp;Employee Eliigibility Details :
	  &nbsp;&nbsp;(&nbsp;Department - <?php if($_REQUEST['value']!='All') {echo $resA['DepartmentName']; } else {echo 'All';} ?>&nbsp;)&nbsp;&nbsp;&nbsp;
	  <a href="#" onClick="PrintDept('<?php echo $_REQUEST['value']; ?>')" style="font-size:12px;">Print</a>
	 </td>
	</tr>
<?php } ?>
<?php if($_REQUEST['action']=='DeptElig') { ?>
<tr>
 <td>
   <table border="1" width="1500">
<tr bgcolor="#7a6189">
    <td align="center" style="color:#FFFFFF;" class="All_50"><b>SNo.</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_70"><b>EC</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_200"><b>Name</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_80"><b>Department</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_200"><b>Designation</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>CategoryA</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>CategoryB</b></td>	
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>CategoryC</b></td>	

<td align="center" style="color:#FFFFFF;" class="All_80"><b>DA Outside HQ</b></td>
<td align="center" style="color:#FFFFFF;" class="All_80"><b>DA Inside HQ</b></td>

    <td align="center" style="color:#FFFFFF;" class="All_50"><b>Travel (TW)</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>Travel (FW)</b></td>	
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Travel Mode</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Travel Class</b></td>	
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Mobile Exp. Reim</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Mobile Hand. Elig</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Validity</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Misc Expenses</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Health Insu</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Bonus</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Gratuity</b></td>	
 </tr>
<?php if($_REQUEST['value']=='All') {$sql=mysql_query("select hrm_employee.*,DepartmentId,DesigId,hrm_employee_eligibility.* from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_eligibility ON hrm_employee_general.EmployeeID=hrm_employee_eligibility.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_eligibility.Status='A' order by EmpCode ASC", $con); }
else {$sql=mysql_query("select hrm_employee.*,DepartmentId,DesigId,hrm_employee_eligibility.* from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_eligibility ON hrm_employee_general.EmployeeID=hrm_employee_eligibility.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_eligibility.Status='A' order by EmpCode ASC", $con); } 
$Sno=1; while($res=mysql_fetch_array($sql)){ $Ename=$res['Fname'].' '.$res['Sname'].' '.$res['Lname']; 
$sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
$sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$res['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
?> 
   <tr bgcolor="#FFFFFF">
    <td align="center" style="" class="All_50" valign="top"><?php echo $Sno; ?></td>
	<td align="center" style="background-color:#E8D2FB;" class="All_70" valign="top"><?php echo $res['EmpCode']; ?></td>
	<td align="" style="background-color:#E8D2FB;" class="All_200" valign="top"><?php echo $Ename; ?></td>
    <td align="" style="" class="All_80" valign="top"><?php echo $resDept['DepartmentCode']; ?></td>
	<td align="" style="" class="All_200" valign="top"><?php echo $resDesig['DesigName']; ?></td>
	<td align="center" style="background-color:#BFFF80;" class="All_80"><?php echo $res['Lodging_CategoryA']; ?></td>
	<td align="center" style="background-color:#BFFF80;" class="All_80"><?php echo $res['Lodging_CategoryB']; ?></td>	
	<td align="center" style="background-color:#BFFF80;" class="All_80"><?php echo $res['Lodging_CategoryC']; ?></td>
		
<td align="center" style="background-color:#FFD2D2;" class="All_80"><?php echo $res['DA_Outside_Hq']; ?></td>
<td align="center" style="background-color:#FFD2D2;" class="All_80"><?php echo $res['DA_Inside_Hq']; ?></td>
	
    <td align="center" style="" class="All_50"><?php echo $res['Travel_TwoWeeKM']; ?></td>
	<td align="center" style="" class="All_50"><?php echo $res['Travel_FourWeeKM']; ?></td>	
	<td align="" style="background-color:#8CC6FF;" class="All_80"><?php echo $res['Mode_Travel_Outside_Hq']; ?></td>
	<td align="" style="background-color:#8CC6FF;" class="All_80"><?php echo $res['TravelClass_Outside_Hq']; ?></td>	
	<td align="center" style="" class="All_80"><?php echo $res['Mobile_Exp_Rem_Rs']; ?></td>
	<td align="center" style="" class="All_80"><?php echo $res['Mobile_Hand_Elig_Rs']; ?></td>
	
	<?php $GpsSetYN=''; if($res['Mobile_Hand_Elig_Rs']>0){ $sqlGp=mysql_query("select Mobile,Mobile_WithGPS from hrm_master_eligibility where DepartmentId=".$res['DepartmentId']." AND CompanyId=".$CompanyId." AND GradeId=".$res['GradeId']."",$con); $resGp=mysql_fetch_assoc($sqlGp);
	if($res['GPSSet']=='Y'){$GpsSetYN='Once in 2 yrs';}elseif($resGp['Mobile']!=$resGp['Mobile_WithGPS'] AND $resGp['Mobile_WithGPS']==$res['Mobile_Hand_Elig_Rs']){$GpsSetYN='Once in 2 yrs';}else{$GpsSetYN='Once in 3 yrs';} } ?>
	
	<td align="center" style="" class="All_80"><?php echo $GpsSetYN; ?></td>
	<td align="center" style="" class="All_80"><?php echo $res['Misc_Expenses']; ?></td>
	<td align="center" style="" class="All_80"><?php echo $res['Health_Insurance']; ?></td>
	<td align="" style="background-color:#FFFFBF;" class="All_80"><?php echo 'As per law'; ?></td>
	<td align="" style="background-color:#FFFFBF;" class="All_80"><?php echo 'As per law'; ?></td>
   </tr>
 <?php $Sno++; } ?>
   </table>
 </td>
</tr> 
<?php } ?>

</table>  
 
</body>
</html>

