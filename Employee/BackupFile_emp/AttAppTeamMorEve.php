<?php require_once('../AdminUser/config/config.php'); ?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="../AdminUser/css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff; font-family:Times New Roman; font-size:15px; width:200px;} .font1 { font-family:Times New Roman; font-size:12px; height:14px; width:200px; } 
.All_350{font-size:11px; height:18px; width:350px;}
.font2 { font-size:12px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;} 
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
</style>
</head>
<body class="body">
 <table border="0" style="width:1250px;" cellpadding="0">
  <tr>
   <td valign="top"> 
		   
<?php //*************************************************************************************************************************************************** ?>	   
<?php if($_REQUEST['m']==1){$Month='JANUARY';}elseif($_REQUEST['m']==2){$Month='FEBRUARY';}elseif($_REQUEST['m']==3){$Month='MARCH';}elseif($_REQUEST['m']==4){$Month='APRIL';}elseif($_REQUEST['m']==5){$Month='MAY';}elseif($_REQUEST['m']==6){$Month='JUNE';}elseif($_REQUEST['m']==7){$Month='JULY';}elseif($_REQUEST['m']==8){$Month='AUGUST';}elseif($_REQUEST['m']==9){$Month='SEPTEMBER';}elseif($_REQUEST['m']==10){$Month='OCTOBER';}elseif($_REQUEST['m']==11){$Month='NOVEMBER';}elseif($_REQUEST['m']==12){$Month='DECEMBER';} ?>	
<table border="0" style="margin-top:0px; width:1250px; height:250px;">
 <tr>
  <td align="left" valign="top" style="margin-top:0px;height:40px;">
<?php 
 $Emp=mysql_query("SELECT EmpCode,Fname,Sname,Lname,Married,Gender,DR FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmployeeID=".$_REQUEST['E'], $con); $rEmp=mysql_fetch_array($Emp); 
 if($rEmp['DR']=='Y'){$M='Dr.';} elseif($rEmp['Gender']=='M'){$M='Mr.';} elseif($rEmp['Gender']=='F' AND $rEmp['Married']=='Y'){$M='Mrs.';} elseif($rEmp['Gender']=='F' AND $rEmp['Married']=='N'){$M='Miss.';}  $rEname=$rEmp['Fname'].' '.$rEmp['Sname'].' '.$rEmp['Lname'];  
?>  
  
   <table border="0">
    <tr>
	  <td style="width:450px;" valign="top"><font color="#2D002D" style='font-family:Times New Roman;' size="4">
	  <b>(<font color="#0079F2" style="font-size:14px;"><?php echo 'Team: '.$M.' '.$rEname.'</font>'; ?>) Morning-Evening Reports :</b></font></td>
	  <td>&nbsp;</td>
	  <td style="font-size:14px;width:70px;font-family:Times New Roman;color:#2CB13D;">&nbsp;<b><?php echo 'Date : <font style="color:#005900;">'.$_REQUEST['da']; ?></font></b></td>
	  <td style="font-size:14px;width:150px;font-family:Times New Roman;color:#2CB13D;">&nbsp;<b><?php echo 'Month : <font style="color:#005900;">'.$Month; ?></font></b></td>
	  <td style="font-size:14px;width:100px;font-family:Times New Roman;color:#2CB13D;">&nbsp;<b><?php echo 'Year : <font style="color:#005900;">'.date("Y"); ?></font></b></td> 
	   <td class="td1" style="font-size:11px; width:170px;">			   
	   <input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /> 
	   <input type="hidden" name="Year" id="Year" value="<?php echo $_REQUEST['Y']; ?>" /> 
	   <input type="hidden" name="YearId" id="YearId" value="<?php echo $YearId; ?>" />
	   <input type="hidden" name="da" id="da" value="<?php echo $_REQUEST['da']; ?>" />
	   <input type="hidden" name="Month" id="Month" value="<?php echo $_REQUEST['m']; ?>" />
	  </td>	 
	</tr>
   </table>
  </td>
 </tr>
 <tr>
  <td valign="top">
   <table border="1" valign="top" style="width:1230px;"> 
<tr bgcolor="#7a6189">
 <td align="center" style="color:#FFFFFF;" class="All_30"><b>SN</b></td>
 <td align="center" style="color:#FFFFFF;" class="All_50"><b>EC</b></td>
 <td align="center" style="color:#FFFFFF;" class="All_200"><b>Name</b></td>
 <td align="center" style="color:#FFFFFF;" class="All_150"><b>Designation</b></td>	
 <td align="center" style="color:#FFFFFF;" class="All_100"><b>Location</b></td>	
 <td align="center" style="color:#FFFFFF;" class="All_500"><b>Morning Reports</b></td>
 <td align="center" style="color:#FFFFFF;" class="All_250"><b>Evening Reports</b></td>
</tr>
<?php $SqlEmp=mysql_query("SELECT hrm_employee.EmployeeID,DepartmentId,DesigId,HqId,EmpCode,Fname,Sname,Lname,Married,Gender,DR FROM hrm_employee_reporting INNER JOIN hrm_employee ON hrm_employee_reporting.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_reporting.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_reporting.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee_reporting.AppraiserId=".$_REQUEST['E']." AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['C']." order by EmpCode ASC", $con); $Sno=1; while($ResEmp=mysql_fetch_array($SqlEmp)) { 
if($ResEmp['DR']=='Y'){$MS='Dr.';} elseif($ResEmp['Gender']=='M'){$MS='Mr.';} elseif($ResEmp['Gender']=='F' AND $ResEmp['Married']=='Y'){$MS='Mrs.';} elseif($ResEmp['Gender']=='F' AND $ResEmp['Married']=='N'){$MS='Miss.';}  $Ename=$ResEmp['Fname'].' '.$ResEmp['Sname'].' '.$ResEmp['Lname'];  
$SqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$ResEmp['DepartmentId'], $con); $ResDept=mysql_fetch_assoc($SqlDept);	
$SqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$ResEmp['DesigId'], $con); $ResDesig=mysql_fetch_assoc($SqlDesig);
$sqlHQ=mysql_query("select HqName from hrm_headquater where HqId=".$ResEmp['HqId'], $con); $resHQ=mysql_fetch_assoc($sqlHQ);

$sqlRpt=mysql_query("select * from hrm_employee_moreve_report where EmployeeID=".$ResEmp['EmployeeID']." AND MorEveDate='".$_REQUEST['Y']."-".$_REQUEST['m']."-".$_REQUEST['da']."'", $con); $resRpt=mysql_fetch_assoc($sqlRpt);
?>

<tr bgcolor="#FFFFFF">
 <td align="center" class="All_30" valign="top"><?php echo $Sno; ?></td>
 <td bgcolor="#75BAFF" align="center" class="All_50" valign="top"><b><?php echo $ResEmp['EmpCode']; ?></b></td>
 <td class="All_200" valign="top"><?php echo strtoupper($Ename); ?></td>
 <td class="All_150" valign="top"><?php echo $ResDesig['DesigName']; ?></td>
 <td class="All_100" valign="top"><?php echo $resHQ['HqName']; ?></td>	
 <td bgcolor="#FFFFD2" class="All_500" valign="top"><?php echo '<b>'.$resRpt['MorDateTime'].'</b>  '.$resRpt['MorReports']; ?></td>	
 <td bgcolor="#D2FFD2" class="All_250" valign="top"><?php echo '<b>'.$resRpt['EveDateTime'].'</b>  '.$resRpt['EveReports']; ?></td>	
</tr>
<?php $Sno++; } ?>

</table>
<?php //*************************************************************************************************************************************************** ?>
		   </td>
		  </tr>
		</table>
</body>
</html>

