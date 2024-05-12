<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
</head>
<body class="body" LINK="#0033CC" ALINK="#008000" VLINK="red">
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" name="YId" id="YId" value="<?php echo $YearId; ?>" />
<input type="hidden" name="UserId" id="UserId" value="<?php echo $UserId; ?>" />
<table class="table" border="0">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center" width="100%" id="MainWindow">
<?php /*************/ ?>
<table border="0" width="100%">
<tr><td class="heading">&nbsp;Sales Team</td></tr>
<tr>
 <td style="width:420px;" valign="top">
  <table border="1">
  <tr bgcolor="#808000">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:350px;font-family:Times New Roman;"><b>Designation</b></td>
  </tr>   
  <tr bgcolor="#FFFFFF">
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><b><a href="#" onClick="ClickMg()">Business Head</a></a></b></td>
  </tr> 
  <tr bgcolor="#FFFFFF">
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><b><a href="#" onClick="ClickL5()">National Sales Lead</a></b></td>
  </tr> 
  <tr bgcolor="#FFFFFF">
  <td align="center" style="font-size:14px;font-family:Times New Roman;"><b><a href="#" onClick="ClickL4()">General Manager Sales</a></b></td>
 </tr>
  <tr bgcolor="#FFFFFF">
  <td align="center" style="font-size:14px;font-family:Times New Roman;"><b><a href="#" onClick="ClickL2()">Zonal Business Manager</b></td>
 </tr>
  <tr bgcolor="#FFFFFF">
  <td align="center" style="font-size:14px;font-family:Times New Roman;"><b><a href="#" onClick="ClickL1()">Zonal Sales Coordinator</a></b></td>
 </tr>
  <tr bgcolor="#FFFFFF">
  <td align="center" style="font-size:14px;font-family:Times New Roman;"><b><a href="#" onClick="ClickM5()">Regional Business Manager</a></b></td>
 </tr>
  <tr bgcolor="#FFFFFF">
  <td align="center" style="font-size:14px;font-family:Times New Roman;"><b><a href="#" onClick="ClickM3()">Area Business Manager</a></b></td>
 </tr>
  <tr bgcolor="#FFFFFF">
  <td align="center" style="font-size:14px;font-family:Times New Roman;"><b><a href="#" onClick="ClickM1()">Coordinator Sales</a></b></td>
 </tr>
  <tr bgcolor="#FFFFFF">
  <td align="center" style="font-size:14px;font-family:Times New Roman;"><b><a href="#" onClick="ClickJ4()">Territory Business Manager</a></b></td>
 </tr>
  <tr bgcolor="#FFFFFF">
  <td align="center" style="font-size:14px;font-family:Times New Roman;"><b><a href="#" onClick="ClickJ3()">Senior Territory Sales Executive</a></b></td>
 </tr>
  <tr bgcolor="#FFFFFF">
  <td align="center" style="font-size:14px;font-family:Times New Roman;"><b><a href="#" onClick="ClickJ2()">Territory Sales Executive</a></b></td>
 </tr>
  <tr bgcolor="#FFFFFF">
  <td align="center" style="font-size:14px;font-family:Times New Roman;"><b><a href="#" onClick="ClickJ1()">Senior Sales Executive/ Sales Executive Trainee</a></b></td>
 </tr>
  <tr bgcolor="#FFFFFF">
  <td align="center" style="font-size:14px;font-family:Times New Roman;"><b><a href="#" onClick="ClickS2()">Sales Executive</a></b></td>
 </tr>
  <tr bgcolor="#FFFFFF">
  <td align="center" style="font-size:14px;font-family:Times New Roman;"><b><a href="#" onClick="ClickS1()">Sales Trainee</a></b></td>
 </tr>
  </table>
 </td>
<?php /************ MG */ ?>
<Script type="text/javascript" language="javascript">
function ClickMg()
{ document.getElementById("MG").style.display='block'; document.getElementById("L5").style.display='none'; document.getElementById("L4").style.display='none'; document.getElementById("L3").style.display='none'; document.getElementById("L2").style.display='none'; document.getElementById("L1").style.display='none'; document.getElementById("M5").style.display='none'; document.getElementById("M4").style.display='none'; document.getElementById("M3").style.display='none'; document.getElementById("M2").style.display='none'; document.getElementById("M1").style.display='none'; document.getElementById("J4").style.display='none'; document.getElementById("J3").style.display='none'; document.getElementById("J2").style.display='none'; document.getElementById("J1").style.display='none'; document.getElementById("S2").style.display='none'; document.getElementById("S1").style.display='none'; }
</Script>  
 <td valign="top" id="MG" style=" display:none;">
  <table border="1">
  <tr bgcolor="#7a6189"><td colspan="5" style="color:#FFFFB3;font-size:14px;width:50px;font-family:Times New Roman;"><b>Designation&nbsp;:&nbsp;Business Head</b></td>
  </tr>  
  <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Sn</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Code</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:350px;font-family:Times New Roman;"><b>Name</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:300px;font-family:Times New Roman;"><b>Location</b></td>
  </tr>   
<?php $sql=mysql_query("select EmpCode,Fname,Sname,Lname,CostCenter,HqId,Gender,Married,DR,hrm_grade.GradeId from hrm_grade INNER JOIN hrm_employee_general ON hrm_grade.GradeId=hrm_employee_general.GradeId INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_grade.GradeValue='MG' AND hrm_employee_general.DepartmentId=6", $con); 
$sn=1; while($res=mysql_fetch_array($sql)){  if($res['DR']=='Y'){$M='Dr.';} elseif($res['Gender']=='M'){$M='Mr.';} elseif($res['Gender']=='F' AND $res['Married']=='Y'){$M='Mrs.';} elseif($res['Gender']=='F' AND $res['Married']=='N'){$M='Miss.';} 
$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId'], $con); $resGrade=mysql_fetch_assoc($sqlGrade);
$sqlHq = mysql_query("SELECT HqName FROM hrm_headquater WHERE HqId=".$res['HqId'], $con) or die(mysql_error()); $resHq = mysql_fetch_assoc($sqlHq); 
$sqlSt=mysql_query("select StateName from hrm_state where StateId=".$res['CostCenter'], $con); $resSt=mysql_fetch_assoc($sqlSt);
?>  
  <tr bgcolor="#FFFFFF">
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><?php echo $sn; ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $res['EmpCode']; ?></td>
   <td style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $M.' '.$res['Fname'].' '.$res['Sname'].' '.$res['Lname'];; ?></td>
   <td style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $resHq['HqName'].'&nbsp;('.$resSt['StateName'].')';?></td>
  </tr>
<?php $sn++; } ?>  
  </table>
 </td>
<?php /************ L5 */ ?>
<Script type="text/javascript" language="javascript">
function ClickL5()
{ document.getElementById("MG").style.display='none'; document.getElementById("L5").style.display='block'; document.getElementById("L4").style.display='none'; document.getElementById("L3").style.display='none'; document.getElementById("L2").style.display='none'; document.getElementById("L1").style.display='none'; document.getElementById("M5").style.display='none'; document.getElementById("M4").style.display='none'; document.getElementById("M3").style.display='none'; document.getElementById("M2").style.display='none'; document.getElementById("M1").style.display='none'; document.getElementById("J4").style.display='none'; document.getElementById("J3").style.display='none'; document.getElementById("J2").style.display='none'; document.getElementById("J1").style.display='none'; document.getElementById("S2").style.display='none'; document.getElementById("S1").style.display='none'; }
</Script>  
 <td valign="top" id="L5" style=" display:none;">
  <table border="1">
  <tr bgcolor="#7a6189"><td colspan="5" style="color:#FFFFB3;font-size:14px;width:50px;font-family:Times New Roman;"><b>Designation&nbsp;:&nbsp;National Sales Lead</b></td>
  </tr>  
  <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Sn</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Code</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:350px;font-family:Times New Roman;"><b>Name</b></td>
   
   <td align="center" style="color:#FFFFFF;font-size:14px;width:300px;font-family:Times New Roman;"><b>Location</b></td>
  </tr>   
<?php $sql=mysql_query("select EmpCode,Fname,Sname,Lname,CostCenter,HqId,Gender,Married,DR,hrm_grade.GradeId from hrm_grade INNER JOIN hrm_employee_general ON hrm_grade.GradeId=hrm_employee_general.GradeId INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_grade.GradeValue='L5' AND hrm_employee_general.DepartmentId=6", $con); 
$sn=1; while($res=mysql_fetch_array($sql)){  if($res['DR']=='Y'){$M='Dr.';} elseif($res['Gender']=='M'){$M='Mr.';} elseif($res['Gender']=='F' AND $res['Married']=='Y'){$M='Mrs.';} elseif($res['Gender']=='F' AND $res['Married']=='N'){$M='Miss.';} 
$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId'], $con); $resGrade=mysql_fetch_assoc($sqlGrade);
$sqlHq = mysql_query("SELECT HqName FROM hrm_headquater WHERE HqId=".$res['HqId'], $con) or die(mysql_error()); $resHq = mysql_fetch_assoc($sqlHq); 
$sqlSt=mysql_query("select StateName from hrm_state where StateId=".$res['CostCenter'], $con); $resSt=mysql_fetch_assoc($sqlSt);
?>  
  <tr bgcolor="#FFFFFF">
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><?php echo $sn; ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $res['EmpCode']; ?></td>
   <td style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $M.' '.$res['Fname'].' '.$res['Sname'].' '.$res['Lname'];; ?></td>
   
   <td style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $resHq['HqName'].'&nbsp;('.$resSt['StateName'].')';?></td>
  </tr>
<?php $sn++; } ?>  
  </table>
 </td>
<?php /************ L4 */ ?>
<Script type="text/javascript" language="javascript">
function ClickL4()
{ document.getElementById("MG").style.display='none'; document.getElementById("L5").style.display='none'; document.getElementById("L4").style.display='block'; document.getElementById("L3").style.display='none'; document.getElementById("L2").style.display='none'; document.getElementById("L1").style.display='none'; document.getElementById("M5").style.display='none'; document.getElementById("M4").style.display='none'; document.getElementById("M3").style.display='none'; document.getElementById("M2").style.display='none'; document.getElementById("M1").style.display='none'; document.getElementById("J4").style.display='none'; document.getElementById("J3").style.display='none'; document.getElementById("J2").style.display='none'; document.getElementById("J1").style.display='none'; document.getElementById("S2").style.display='none'; document.getElementById("S1").style.display='none'; }
</Script>  
 <td valign="top" id="L4" style=" display:none;">
  <table border="1">
  <tr bgcolor="#7a6189"><td colspan="5" style="color:#FFFFB3;font-size:14px;width:50px;font-family:Times New Roman;"><b>Designation&nbsp;:&nbsp;General Manager Sales</b></td>
  </tr>  
  <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Sn</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Code</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:350px;font-family:Times New Roman;"><b>Name</b></td>
   
   <td align="center" style="color:#FFFFFF;font-size:14px;width:300px;font-family:Times New Roman;"><b>Location</b></td>
  </tr>   
<?php $sql=mysql_query("select EmpCode,Fname,Sname,Lname,CostCenter,HqId,Gender,Married,DR,hrm_grade.GradeId from hrm_grade INNER JOIN hrm_employee_general ON hrm_grade.GradeId=hrm_employee_general.GradeId INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND (hrm_grade.GradeValue='L4' OR hrm_grade.GradeValue='L3') AND hrm_employee_general.DepartmentId=6", $con); 
$sn=1; while($res=mysql_fetch_array($sql)){  if($res['DR']=='Y'){$M='Dr.';} elseif($res['Gender']=='M'){$M='Mr.';} elseif($res['Gender']=='F' AND $res['Married']=='Y'){$M='Mrs.';} elseif($res['Gender']=='F' AND $res['Married']=='N'){$M='Miss.';} 
$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId'], $con); $resGrade=mysql_fetch_assoc($sqlGrade);
$sqlHq = mysql_query("SELECT HqName FROM hrm_headquater WHERE HqId=".$res['HqId'], $con) or die(mysql_error()); $resHq = mysql_fetch_assoc($sqlHq); 
$sqlSt=mysql_query("select StateName from hrm_state where StateId=".$res['CostCenter'], $con); $resSt=mysql_fetch_assoc($sqlSt);
?>  
  <tr bgcolor="#FFFFFF">
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><?php echo $sn; ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $res['EmpCode']; ?></td>
   <td style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $M.' '.$res['Fname'].' '.$res['Sname'].' '.$res['Lname'];; ?></td>
   
   <td style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $resHq['HqName'].'&nbsp;('.$resSt['StateName'].')';?></td>
  </tr>
<?php $sn++; } ?>  
  </table>
 </td> 
<?php /************ L3 */ ?>
<Script type="text/javascript" language="javascript">
/*
function ClickL3()
{ document.getElementById("MG").style.display='none'; document.getElementById("L5").style.display='none'; document.getElementById("L4").style.display='none'; document.getElementById("L3").style.display='block'; document.getElementById("L2").style.display='none'; document.getElementById("L1").style.display='none'; document.getElementById("M5").style.display='none'; document.getElementById("M4").style.display='none'; document.getElementById("M3").style.display='none'; document.getElementById("M2").style.display='none'; document.getElementById("M1").style.display='none'; document.getElementById("J4").style.display='none'; document.getElementById("J3").style.display='none'; document.getElementById("J2").style.display='none'; document.getElementById("J1").style.display='none'; document.getElementById("S2").style.display='none'; document.getElementById("S1").style.display='none'; }
*/
</Script>  
 <td valign="top" id="L3" style=" display:none;">
  <table border="1">
  <tr bgcolor="#7a6189"><td colspan="5" style="color:#FFFFB3;font-size:14px;width:50px;font-family:Times New Roman;"><b>Designation&nbsp;:&nbsp;General Manager Sales</b></td>
  </tr>  
  <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Sn</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Code</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:350px;font-family:Times New Roman;"><b>Name</b></td>
   
   <td align="center" style="color:#FFFFFF;font-size:14px;width:300px;font-family:Times New Roman;"><b>Location</b></td>
  </tr>   
<?php $sql=mysql_query("select EmpCode,Fname,Sname,Lname,CostCenter,HqId,Gender,Married,DR,hrm_grade.GradeId from hrm_grade INNER JOIN hrm_employee_general ON hrm_grade.GradeId=hrm_employee_general.GradeId INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_grade.GradeValue='L3' AND hrm_employee_general.DepartmentId=6", $con); 
$sn=1; while($res=mysql_fetch_array($sql)){  if($res['DR']=='Y'){$M='Dr.';} elseif($res['Gender']=='M'){$M='Mr.';} elseif($res['Gender']=='F' AND $res['Married']=='Y'){$M='Mrs.';} elseif($res['Gender']=='F' AND $res['Married']=='N'){$M='Miss.';} 
$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId'], $con); $resGrade=mysql_fetch_assoc($sqlGrade);
$sqlHq = mysql_query("SELECT HqName FROM hrm_headquater WHERE HqId=".$res['HqId'], $con) or die(mysql_error()); $resHq = mysql_fetch_assoc($sqlHq); 
$sqlSt=mysql_query("select StateName from hrm_state where StateId=".$res['CostCenter'], $con); $resSt=mysql_fetch_assoc($sqlSt);
?>  
  <tr bgcolor="#FFFFFF">
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><?php echo $sn; ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $res['EmpCode']; ?></td>
   <td style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $M.' '.$res['Fname'].' '.$res['Sname'].' '.$res['Lname'];; ?></td>
   
   <td style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $resHq['HqName'].'&nbsp;('.$resSt['StateName'].')';?></td>
  </tr>
<?php $sn++; } ?>  
  </table>
 </td> 
<?php /************ L2 */ ?>
<Script type="text/javascript" language="javascript">
function ClickL2()
{ document.getElementById("MG").style.display='none'; document.getElementById("L5").style.display='none'; document.getElementById("L4").style.display='none'; document.getElementById("L3").style.display='none'; document.getElementById("L2").style.display='block'; document.getElementById("L1").style.display='none'; document.getElementById("M5").style.display='none'; document.getElementById("M4").style.display='none'; document.getElementById("M3").style.display='none'; document.getElementById("M2").style.display='none'; document.getElementById("M1").style.display='none'; document.getElementById("J4").style.display='none'; document.getElementById("J3").style.display='none'; document.getElementById("J2").style.display='none'; document.getElementById("J1").style.display='none'; document.getElementById("S2").style.display='none'; document.getElementById("S1").style.display='none';}
</Script>  
 <td valign="top" id="L2" style=" display:none;">
  <table border="1">
  <tr bgcolor="#7a6189"><td colspan="5" style="color:#FFFFB3;font-size:14px;width:50px;font-family:Times New Roman;"><b>Designation&nbsp;:&nbsp;Zonal Business Manager</b></td>
  </tr>  
  <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Sn</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Code</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:350px;font-family:Times New Roman;"><b>Name</b></td>
   
   <td align="center" style="color:#FFFFFF;font-size:14px;width:300px;font-family:Times New Roman;"><b>Location</b></td>
  </tr>   
<?php $sql=mysql_query("select EmpCode,Fname,Sname,Lname,CostCenter,HqId,Gender,Married,DR,hrm_grade.GradeId from hrm_grade INNER JOIN hrm_employee_general ON hrm_grade.GradeId=hrm_employee_general.GradeId INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_grade.GradeValue='L2' AND hrm_employee_general.DepartmentId=6", $con); 
$sn=1; while($res=mysql_fetch_array($sql)){  if($res['DR']=='Y'){$M='Dr.';} elseif($res['Gender']=='M'){$M='Mr.';} elseif($res['Gender']=='F' AND $res['Married']=='Y'){$M='Mrs.';} elseif($res['Gender']=='F' AND $res['Married']=='N'){$M='Miss.';} 
$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId'], $con); $resGrade=mysql_fetch_assoc($sqlGrade);
$sqlHq = mysql_query("SELECT HqName FROM hrm_headquater WHERE HqId=".$res['HqId'], $con) or die(mysql_error()); $resHq = mysql_fetch_assoc($sqlHq); 
$sqlSt=mysql_query("select StateName from hrm_state where StateId=".$res['CostCenter'], $con); $resSt=mysql_fetch_assoc($sqlSt);
?>  
  <tr bgcolor="#FFFFFF">
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><?php echo $sn; ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $res['EmpCode']; ?></td>
   <td style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $M.' '.$res['Fname'].' '.$res['Sname'].' '.$res['Lname'];; ?></td>
   
   <td style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $resHq['HqName'].'&nbsp;('.$resSt['StateName'].')';?></td>
  </tr>
<?php $sn++; } ?>  
  </table>
 </td>  
<?php /************ L1 */ ?>
<Script type="text/javascript" language="javascript">
function ClickL1()
{ document.getElementById("MG").style.display='none'; document.getElementById("L5").style.display='none'; document.getElementById("L4").style.display='none'; document.getElementById("L3").style.display='none'; document.getElementById("L2").style.display='none'; document.getElementById("L1").style.display='block'; document.getElementById("M5").style.display='none'; document.getElementById("M4").style.display='none'; document.getElementById("M3").style.display='none'; document.getElementById("M2").style.display='none'; document.getElementById("M1").style.display='none'; document.getElementById("J4").style.display='none'; document.getElementById("J3").style.display='none'; document.getElementById("J2").style.display='none'; document.getElementById("J1").style.display='none'; document.getElementById("S2").style.display='none'; document.getElementById("S1").style.display='none'; }
</Script>  
 <td valign="top" id="L1" style=" display:none;">
  <table border="1">
  <tr bgcolor="#7a6189"><td colspan="5" style="color:#FFFFB3;font-size:14px;width:50px;font-family:Times New Roman;"><b>Designation&nbsp;:&nbsp;Zonal Business Manager</b></td>
  </tr>  
  <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Sn</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Code</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:350px;font-family:Times New Roman;"><b>Name</b></td>
   
   <td align="center" style="color:#FFFFFF;font-size:14px;width:300px;font-family:Times New Roman;"><b>Location</b></td>
  </tr>   
<?php $sql=mysql_query("select EmpCode,Fname,Sname,Lname,CostCenter,HqId,Gender,Married,DR,hrm_grade.GradeId from hrm_grade INNER JOIN hrm_employee_general ON hrm_grade.GradeId=hrm_employee_general.GradeId INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_grade.GradeValue='L1' AND hrm_employee_general.DepartmentId=6", $con); 
$sn=1; while($res=mysql_fetch_array($sql)){  if($res['DR']=='Y'){$M='Dr.';} elseif($res['Gender']=='M'){$M='Mr.';} elseif($res['Gender']=='F' AND $res['Married']=='Y'){$M='Mrs.';} elseif($res['Gender']=='F' AND $res['Married']=='N'){$M='Miss.';} 
$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId'], $con); $resGrade=mysql_fetch_assoc($sqlGrade);
$sqlHq = mysql_query("SELECT HqName FROM hrm_headquater WHERE HqId=".$res['HqId'], $con) or die(mysql_error()); $resHq = mysql_fetch_assoc($sqlHq); 
$sqlSt=mysql_query("select StateName from hrm_state where StateId=".$res['CostCenter'], $con); $resSt=mysql_fetch_assoc($sqlSt);
?>  
  <tr bgcolor="#FFFFFF">
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><?php echo $sn; ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $res['EmpCode']; ?></td>
   <td style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $M.' '.$res['Fname'].' '.$res['Sname'].' '.$res['Lname'];; ?></td>
   
   <td style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $resHq['HqName'].'&nbsp;('.$resSt['StateName'].')';?></td>
  </tr>
<?php $sn++; } ?>  
  </table>
 </td>  
<?php /************ M5 */ ?>
<Script type="text/javascript" language="javascript">
function ClickM5()
{ document.getElementById("MG").style.display='none'; document.getElementById("L5").style.display='none'; document.getElementById("L4").style.display='none'; document.getElementById("L3").style.display='none'; document.getElementById("L2").style.display='none'; document.getElementById("L1").style.display='none'; document.getElementById("M5").style.display='block'; document.getElementById("M4").style.display='none'; document.getElementById("M3").style.display='none'; document.getElementById("M2").style.display='none'; document.getElementById("M1").style.display='none'; document.getElementById("J4").style.display='none'; document.getElementById("J3").style.display='none'; document.getElementById("J2").style.display='none'; document.getElementById("J1").style.display='none'; document.getElementById("S2").style.display='none'; document.getElementById("S1").style.display='none'; }
</Script>  
 <td valign="top" id="M5" style=" display:none;">
  <table border="1">
  <tr bgcolor="#7a6189"><td colspan="5" style="color:#FFFFB3;font-size:14px;width:50px;font-family:Times New Roman;"><b>Designation&nbsp;:&nbsp;Regional Business Manager</b></td>
  </tr>  
  <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Sn</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Code</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:350px;font-family:Times New Roman;"><b>Name</b></td>
   
   <td align="center" style="color:#FFFFFF;font-size:14px;width:300px;font-family:Times New Roman;"><b>Location</b></td>
  </tr>   
<?php $sql=mysql_query("select EmpCode,Fname,Sname,Lname,CostCenter,HqId,Gender,Married,DR,hrm_grade.GradeId from hrm_grade INNER JOIN hrm_employee_general ON hrm_grade.GradeId=hrm_employee_general.GradeId INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND (hrm_grade.GradeValue='M5' OR hrm_grade.GradeValue='M4') AND hrm_employee_general.DepartmentId=6", $con); 
$sn=1; while($res=mysql_fetch_array($sql)){  if($res['DR']=='Y'){$M='Dr.';} elseif($res['Gender']=='M'){$M='Mr.';} elseif($res['Gender']=='F' AND $res['Married']=='Y'){$M='Mrs.';} elseif($res['Gender']=='F' AND $res['Married']=='N'){$M='Miss.';} 
$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId'], $con); $resGrade=mysql_fetch_assoc($sqlGrade);
$sqlHq = mysql_query("SELECT HqName FROM hrm_headquater WHERE HqId=".$res['HqId'], $con) or die(mysql_error()); $resHq = mysql_fetch_assoc($sqlHq); 
$sqlSt=mysql_query("select StateName from hrm_state where StateId=".$res['CostCenter'], $con); $resSt=mysql_fetch_assoc($sqlSt);
?>  
  <tr bgcolor="#FFFFFF">
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><?php echo $sn; ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $res['EmpCode']; ?></td>
   <td style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $M.' '.$res['Fname'].' '.$res['Sname'].' '.$res['Lname'];; ?></td>
   
   <td style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $resHq['HqName'].'&nbsp;('.$resSt['StateName'].')';?></td>
  </tr>
<?php $sn++; } ?>  
  </table>
 </td>
<?php /************ M4 */ ?>
<Script type="text/javascript" language="javascript">
/*
function ClickM4()
{ document.getElementById("MG").style.display='none'; document.getElementById("L5").style.display='none'; document.getElementById("L4").style.display='none'; document.getElementById("L3").style.display='none'; document.getElementById("L2").style.display='none'; document.getElementById("L1").style.display='none'; document.getElementById("M5").style.display='none'; document.getElementById("M4").style.display='block'; document.getElementById("M3").style.display='none'; document.getElementById("M2").style.display='none'; document.getElementById("M1").style.display='none'; document.getElementById("J4").style.display='none'; document.getElementById("J3").style.display='none'; document.getElementById("J2").style.display='none'; document.getElementById("J1").style.display='none'; document.getElementById("S2").style.display='none'; document.getElementById("S1").style.display='none'; }
*/
</Script>  
 <td valign="top" id="M4" style=" display:none;">
  <table border="1">
  <tr bgcolor="#7a6189"><td colspan="5" style="color:#FFFFB3;font-size:14px;width:50px;font-family:Times New Roman;"><b>Designation&nbsp;:&nbsp;Regional Business Manager</b></td>
  </tr>  
  <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Sn</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Code</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:350px;font-family:Times New Roman;"><b>Name</b></td>
   
   <td align="center" style="color:#FFFFFF;font-size:14px;width:300px;font-family:Times New Roman;"><b>Location</b></td>
  </tr>   
<?php $sql=mysql_query("select EmpCode,Fname,Sname,Lname,CostCenter,HqId,Gender,Married,DR,hrm_grade.GradeId from hrm_grade INNER JOIN hrm_employee_general ON hrm_grade.GradeId=hrm_employee_general.GradeId INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND (hrm_grade.GradeValue='M4' OR hrm_grade.GradeValue='M3') AND hrm_employee_general.DepartmentId=6", $con); 
$sn=1; while($res=mysql_fetch_array($sql)){  if($res['DR']=='Y'){$M='Dr.';} elseif($res['Gender']=='M'){$M='Mr.';} elseif($res['Gender']=='F' AND $res['Married']=='Y'){$M='Mrs.';} elseif($res['Gender']=='F' AND $res['Married']=='N'){$M='Miss.';} 
$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId'], $con); $resGrade=mysql_fetch_assoc($sqlGrade);
//$sqlHq = mysql_query("SELECT HqName FROM hrm_headquater WHERE HqId=".$res['HqId'], $con) or die(mysql_error()); $resHq = mysql_fetch_assoc($sqlHq); 
$sqlSt=mysql_query("select StateName from hrm_state where StateId=".$res['CostCenter'], $con); $resSt=mysql_fetch_assoc($sqlSt);
?>  
  <tr bgcolor="#FFFFFF">
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><?php echo $sn; ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $res['EmpCode']; ?></td>
   <td style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $M.' '.$res['Fname'].' '.$res['Sname'].' '.$res['Lname'];; ?></td>
   
   <td style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $resHq['HqName'].'&nbsp;('.$resSt['StateName'].')';?></td>
  </tr>
<?php $sn++; } ?>  
  </table>
 </td> 
<?php /************ M3 */ ?>
<Script type="text/javascript" language="javascript">
function ClickM3()
{ document.getElementById("MG").style.display='none'; document.getElementById("L5").style.display='none'; document.getElementById("L4").style.display='none'; document.getElementById("L3").style.display='none'; document.getElementById("L2").style.display='none'; document.getElementById("L1").style.display='none'; document.getElementById("M5").style.display='none'; document.getElementById("M4").style.display='none'; document.getElementById("M3").style.display='block'; document.getElementById("M2").style.display='none'; document.getElementById("M1").style.display='none'; document.getElementById("J4").style.display='none'; document.getElementById("J3").style.display='none'; document.getElementById("J2").style.display='none'; document.getElementById("J1").style.display='none'; document.getElementById("S2").style.display='none'; document.getElementById("S1").style.display='none'; }
</Script>  
 <td valign="top" id="M3" style=" display:none;">
  <table border="1">
  <tr bgcolor="#7a6189"><td colspan="5" style="color:#FFFFB3;font-size:14px;width:50px;font-family:Times New Roman;"><b>Designation&nbsp;:&nbsp;Area Business Manager</b></td>
  </tr>  
  <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Sn</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Code</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:350px;font-family:Times New Roman;"><b>Name</b></td>
   
   <td align="center" style="color:#FFFFFF;font-size:14px;width:300px;font-family:Times New Roman;"><b>Location</b></td>
  </tr>   
<?php $sql=mysql_query("select EmpCode,Fname,Sname,Lname,CostCenter,HqId,Gender,Married,DR,hrm_grade.GradeId from hrm_grade INNER JOIN hrm_employee_general ON hrm_grade.GradeId=hrm_employee_general.GradeId INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND (hrm_grade.GradeValue='M3' OR hrm_grade.GradeValue='M2') AND hrm_employee_general.DepartmentId=6", $con); 
$sn=1; while($res=mysql_fetch_array($sql)){  if($res['DR']=='Y'){$M='Dr.';} elseif($res['Gender']=='M'){$M='Mr.';} elseif($res['Gender']=='F' AND $res['Married']=='Y'){$M='Mrs.';} elseif($res['Gender']=='F' AND $res['Married']=='N'){$M='Miss.';} 
$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId'], $con); $resGrade=mysql_fetch_assoc($sqlGrade);
$sqlHq = mysql_query("SELECT HqName FROM hrm_headquater WHERE HqId=".$res['HqId'], $con) or die(mysql_error()); $resHq = mysql_fetch_assoc($sqlHq); 
$sqlSt=mysql_query("select StateName from hrm_state where StateId=".$res['CostCenter'], $con); $resSt=mysql_fetch_assoc($sqlSt);
?>  
  <tr bgcolor="#FFFFFF">
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><?php echo $sn; ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $res['EmpCode']; ?></td>
   <td style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $M.' '.$res['Fname'].' '.$res['Sname'].' '.$res['Lname'];; ?></td>
   
   <td style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $resHq['HqName'].'&nbsp;('.$resSt['StateName'].')';?></td>
  </tr>
<?php $sn++; } ?>  
  </table>
 </td> 
<?php /************ M2 */ ?>
<Script type="text/javascript" language="javascript">
/*
function ClickM2()
{ document.getElementById("MG").style.display='none'; document.getElementById("L5").style.display='none'; document.getElementById("L4").style.display='none'; document.getElementById("L3").style.display='none'; document.getElementById("L2").style.display='none'; document.getElementById("L1").style.display='none'; document.getElementById("M5").style.display='none'; document.getElementById("M4").style.display='none'; document.getElementById("M3").style.display='none'; document.getElementById("M2").style.display='block'; document.getElementById("M1").style.display='none'; document.getElementById("J4").style.display='none'; document.getElementById("J3").style.display='none'; document.getElementById("J2").style.display='none'; document.getElementById("J1").style.display='none'; document.getElementById("S2").style.display='none'; document.getElementById("S1").style.display='none'; }
*/
</Script>  
 <td valign="top" id="M2" style=" display:none;">
  <table border="1">
  <tr bgcolor="#7a6189"><td colspan="5" style="color:#FFFFB3;font-size:14px;width:50px;font-family:Times New Roman;"><b>Designation&nbsp;:&nbsp;Area Business Manager</b></td>
  </tr>  
  <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Sn</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Code</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:350px;font-family:Times New Roman;"><b>Name</b></td>
   
   <td align="center" style="color:#FFFFFF;font-size:14px;width:300px;font-family:Times New Roman;"><b>Location</b></td>
  </tr>   
<?php $sql=mysql_query("select EmpCode,Fname,Sname,Lname,CostCenter,HqId,Gender,Married,DR,hrm_grade.GradeId from hrm_grade INNER JOIN hrm_employee_general ON hrm_grade.GradeId=hrm_employee_general.GradeId INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_grade.GradeValue='M2' AND hrm_employee_general.DepartmentId=6", $con); 
$sn=1; while($res=mysql_fetch_array($sql)){  if($res['DR']=='Y'){$M='Dr.';} elseif($res['Gender']=='M'){$M='Mr.';} elseif($res['Gender']=='F' AND $res['Married']=='Y'){$M='Mrs.';} elseif($res['Gender']=='F' AND $res['Married']=='N'){$M='Miss.';} 
$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId'], $con); $resGrade=mysql_fetch_assoc($sqlGrade);
$sqlHq = mysql_query("SELECT HqName FROM hrm_headquater WHERE HqId=".$res['HqId'], $con) or die(mysql_error()); $resHq = mysql_fetch_assoc($sqlHq); 
$sqlSt=mysql_query("select StateName from hrm_state where StateId=".$res['CostCenter'], $con); $resSt=mysql_fetch_assoc($sqlSt);
?>  
  <tr bgcolor="#FFFFFF">
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><?php echo $sn; ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $res['EmpCode']; ?></td>
   <td style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $M.' '.$res['Fname'].' '.$res['Sname'].' '.$res['Lname'];; ?></td>
   
   <td style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $resHq['HqName'].'&nbsp;('.$resSt['StateName'].')';?></td>
  </tr>
<?php $sn++; } ?>  
  </table>
 </td>  
<?php /************ M1 */ ?>
<Script type="text/javascript" language="javascript">
function ClickM1()
{ document.getElementById("MG").style.display='none'; document.getElementById("L5").style.display='none'; document.getElementById("L4").style.display='none'; document.getElementById("L3").style.display='none'; document.getElementById("L2").style.display='none'; document.getElementById("L1").style.display='none'; document.getElementById("M5").style.display='none'; document.getElementById("M4").style.display='none'; document.getElementById("M3").style.display='none'; document.getElementById("M2").style.display='none'; document.getElementById("M1").style.display='block'; document.getElementById("J4").style.display='none'; document.getElementById("J3").style.display='none'; document.getElementById("J2").style.display='none'; document.getElementById("J1").style.display='none'; document.getElementById("S2").style.display='none'; document.getElementById("S1").style.display='none'; }
</Script>  
 <td valign="top" id="M1" style=" display:none;">
  <table border="1">
  <tr bgcolor="#7a6189"><td colspan="5" style="color:#FFFFB3;font-size:14px;width:50px;font-family:Times New Roman;"><b>Designation&nbsp;:&nbsp;Coordinator State</b></td>
  </tr>  
  <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Sn</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Code</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:350px;font-family:Times New Roman;"><b>Name</b></td>
   
   <td align="center" style="color:#FFFFFF;font-size:14px;width:300px;font-family:Times New Roman;"><b>Location</b></td>
  </tr>   
<?php $sql=mysql_query("select EmpCode,Fname,Sname,Lname,CostCenter,HqId,Gender,Married,DR,hrm_grade.GradeId from hrm_grade INNER JOIN hrm_employee_general ON hrm_grade.GradeId=hrm_employee_general.GradeId INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_grade.GradeValue='M1' AND hrm_employee_general.DepartmentId=6", $con); 
$sn=1; while($res=mysql_fetch_array($sql)){  if($res['DR']=='Y'){$M='Dr.';} elseif($res['Gender']=='M'){$M='Mr.';} elseif($res['Gender']=='F' AND $res['Married']=='Y'){$M='Mrs.';} elseif($res['Gender']=='F' AND $res['Married']=='N'){$M='Miss.';} 
$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId'], $con); $resGrade=mysql_fetch_assoc($sqlGrade);
$sqlHq = mysql_query("SELECT HqName FROM hrm_headquater WHERE HqId=".$res['HqId'], $con) or die(mysql_error()); $resHq = mysql_fetch_assoc($sqlHq); 
$sqlSt=mysql_query("select StateName from hrm_state where StateId=".$res['CostCenter'], $con); $resSt=mysql_fetch_assoc($sqlSt);
?>  
  <tr bgcolor="#FFFFFF">
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><?php echo $sn; ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $res['EmpCode']; ?></td>
   <td style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $M.' '.$res['Fname'].' '.$res['Sname'].' '.$res['Lname'];; ?></td>
   
   <td style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $resHq['HqName'].'&nbsp;('.$resSt['StateName'].')';?></td>
  </tr>
<?php $sn++; } ?>  
  </table>
 </td> 
<?php /************ J4 */ ?>
<Script type="text/javascript" language="javascript">
function ClickJ4()
{ document.getElementById("MG").style.display='none'; document.getElementById("L5").style.display='none'; document.getElementById("L4").style.display='none'; document.getElementById("L3").style.display='none'; document.getElementById("L2").style.display='none'; document.getElementById("L1").style.display='none'; document.getElementById("M5").style.display='none'; document.getElementById("M4").style.display='none'; document.getElementById("M3").style.display='none'; document.getElementById("M2").style.display='none'; document.getElementById("M1").style.display='none'; document.getElementById("J4").style.display='block'; document.getElementById("J3").style.display='none'; document.getElementById("J2").style.display='none'; document.getElementById("J1").style.display='none'; document.getElementById("S2").style.display='none'; document.getElementById("S1").style.display='none'; }
</Script>  
 <td valign="top" id="J4" style=" display:none;">
  <table border="1">
  <tr bgcolor="#7a6189"><td colspan="5" style="color:#FFFFB3;font-size:14px;width:50px;font-family:Times New Roman;"><b>Designation&nbsp;:&nbsp;Territory Business Manager</b></td>
  </tr>  
  <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Sn</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Code</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:350px;font-family:Times New Roman;"><b>Name</b></td>
   
   <td align="center" style="color:#FFFFFF;font-size:14px;width:300px;font-family:Times New Roman;"><b>Location</b></td>
  </tr>   
<?php $sql=mysql_query("select EmpCode,Fname,Sname,Lname,CostCenter,HqId,Gender,Married,DR,hrm_grade.GradeId from hrm_grade INNER JOIN hrm_employee_general ON hrm_grade.GradeId=hrm_employee_general.GradeId INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_grade.GradeValue='J4' AND hrm_employee_general.DepartmentId=6", $con); 
$sn=1; while($res=mysql_fetch_array($sql)){  if($res['DR']=='Y'){$M='Dr.';} elseif($res['Gender']=='M'){$M='Mr.';} elseif($res['Gender']=='F' AND $res['Married']=='Y'){$M='Mrs.';} elseif($res['Gender']=='F' AND $res['Married']=='N'){$M='Miss.';} 
$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId'], $con); $resGrade=mysql_fetch_assoc($sqlGrade);
$sqlHq = mysql_query("SELECT HqName FROM hrm_headquater WHERE HqId=".$res['HqId'], $con) or die(mysql_error()); $resHq = mysql_fetch_assoc($sqlHq); 
$sqlSt=mysql_query("select StateName from hrm_state where StateId=".$res['CostCenter'], $con); $resSt=mysql_fetch_assoc($sqlSt);
?>  
  <tr bgcolor="#FFFFFF">
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><?php echo $sn; ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $res['EmpCode']; ?></td>
   <td style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $M.' '.$res['Fname'].' '.$res['Sname'].' '.$res['Lname'];; ?></td>
   
   <td style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $resHq['HqName'].'&nbsp;('.$resSt['StateName'].')';?></td>
  </tr>
<?php $sn++; } ?>  
  </table>
 </td> 
<?php /************ J3 */ ?>
<Script type="text/javascript" language="javascript">
function ClickJ3()
{ document.getElementById("MG").style.display='none'; document.getElementById("L5").style.display='none'; document.getElementById("L4").style.display='none'; document.getElementById("L3").style.display='none'; document.getElementById("L2").style.display='none'; document.getElementById("L1").style.display='none'; document.getElementById("M5").style.display='none'; document.getElementById("M4").style.display='none'; document.getElementById("M3").style.display='none'; document.getElementById("M2").style.display='none'; document.getElementById("M1").style.display='none'; document.getElementById("J4").style.display='none'; document.getElementById("J3").style.display='block'; document.getElementById("J2").style.display='none'; document.getElementById("J1").style.display='none'; document.getElementById("S2").style.display='none'; document.getElementById("S1").style.display='none'; }
</Script>  
 <td valign="top" id="J3" style=" display:none;">
  <table border="1">
  <tr bgcolor="#7a6189"><td colspan="5" style="color:#FFFFB3;font-size:14px;width:50px;font-family:Times New Roman;"><b>Designation&nbsp;:&nbsp;Senior Territory Sales Executive</b></td>
  </tr>  
  <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Sn</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Code</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:350px;font-family:Times New Roman;"><b>Name</b></td>
   
   <td align="center" style="color:#FFFFFF;font-size:14px;width:300px;font-family:Times New Roman;"><b>Location</b></td>
  </tr>   
<?php $sql=mysql_query("select EmpCode,Fname,Sname,Lname,CostCenter,HqId,Gender,Married,DR,hrm_grade.GradeId from hrm_grade INNER JOIN hrm_employee_general ON hrm_grade.GradeId=hrm_employee_general.GradeId INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_grade.GradeValue='J3' AND hrm_employee_general.DepartmentId=6", $con); 
$sn=1; while($res=mysql_fetch_array($sql)){  if($res['DR']=='Y'){$M='Dr.';} elseif($res['Gender']=='M'){$M='Mr.';} elseif($res['Gender']=='F' AND $res['Married']=='Y'){$M='Mrs.';} elseif($res['Gender']=='F' AND $res['Married']=='N'){$M='Miss.';} 
$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId'], $con); $resGrade=mysql_fetch_assoc($sqlGrade);
$sqlHq = mysql_query("SELECT HqName FROM hrm_headquater WHERE HqId=".$res['HqId'], $con) or die(mysql_error()); $resHq = mysql_fetch_assoc($sqlHq); 
$sqlSt=mysql_query("select StateName from hrm_state where StateId=".$res['CostCenter'], $con); $resSt=mysql_fetch_assoc($sqlSt);
?>  
  <tr bgcolor="#FFFFFF">
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><?php echo $sn; ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $res['EmpCode']; ?></td>
   <td style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $M.' '.$res['Fname'].' '.$res['Sname'].' '.$res['Lname'];; ?></td>
   
   <td style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $resHq['HqName'].'&nbsp;('.$resSt['StateName'].')';?></td>
  </tr>
<?php $sn++; } ?>  
  </table>
 </td> 
<?php /************ J2 */ ?>
<Script type="text/javascript" language="javascript">
function ClickJ2()
{ document.getElementById("MG").style.display='none'; document.getElementById("L5").style.display='none'; document.getElementById("L4").style.display='none'; document.getElementById("L3").style.display='none'; document.getElementById("L2").style.display='none'; document.getElementById("L1").style.display='none'; document.getElementById("M5").style.display='none'; document.getElementById("M4").style.display='none'; document.getElementById("M3").style.display='none'; document.getElementById("M2").style.display='none'; document.getElementById("M1").style.display='none'; document.getElementById("J4").style.display='none'; document.getElementById("J3").style.display='none'; document.getElementById("J2").style.display='block'; document.getElementById("J1").style.display='none'; document.getElementById("S2").style.display='none'; document.getElementById("S1").style.display='none'; }
</Script>  
 <td valign="top" id="J2" style=" display:none;">
  <table border="1">
  <tr bgcolor="#7a6189"><td colspan="5" style="color:#FFFFB3;font-size:14px;width:50px;font-family:Times New Roman;"><b>Designation&nbsp;:&nbsp;Territory Sales Executive</b></td>
  </tr>  
  <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Sn</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Code</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:350px;font-family:Times New Roman;"><b>Name</b></td>
   
   <td align="center" style="color:#FFFFFF;font-size:14px;width:300px;font-family:Times New Roman;"><b>Location</b></td>
  </tr>   
<?php $sql=mysql_query("select EmpCode,Fname,Sname,Lname,CostCenter,HqId,Gender,Married,DR,hrm_grade.GradeId from hrm_grade INNER JOIN hrm_employee_general ON hrm_grade.GradeId=hrm_employee_general.GradeId INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_grade.GradeValue='J2' AND hrm_employee_general.DepartmentId=6", $con); 
$sn=1; while($res=mysql_fetch_array($sql)){  if($res['DR']=='Y'){$M='Dr.';} elseif($res['Gender']=='M'){$M='Mr.';} elseif($res['Gender']=='F' AND $res['Married']=='Y'){$M='Mrs.';} elseif($res['Gender']=='F' AND $res['Married']=='N'){$M='Miss.';}
$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId'], $con); $resGrade=mysql_fetch_assoc($sqlGrade); 
$sqlHq = mysql_query("SELECT HqName FROM hrm_headquater WHERE HqId=".$res['HqId'], $con) or die(mysql_error()); $resHq = mysql_fetch_assoc($sqlHq); 
$sqlSt=mysql_query("select StateName from hrm_state where StateId=".$res['CostCenter'], $con); $resSt=mysql_fetch_assoc($sqlSt);
?>  
  <tr bgcolor="#FFFFFF">
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><?php echo $sn; ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $res['EmpCode']; ?></td>
   <td style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $M.' '.$res['Fname'].' '.$res['Sname'].' '.$res['Lname'];; ?></td>
   
   <td style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $resHq['HqName'].'&nbsp;('.$resSt['StateName'].')';?></td>
  </tr>
<?php $sn++; } ?>  
  </table>
 </td>  
<?php /************ J1 */ ?>
<Script type="text/javascript" language="javascript">
function ClickJ1()
{ document.getElementById("MG").style.display='none'; document.getElementById("L5").style.display='none'; document.getElementById("L4").style.display='none'; document.getElementById("L3").style.display='none'; document.getElementById("L2").style.display='none'; document.getElementById("L1").style.display='none'; document.getElementById("M5").style.display='none'; document.getElementById("M4").style.display='none'; document.getElementById("M3").style.display='none'; document.getElementById("M2").style.display='none'; document.getElementById("M1").style.display='none'; document.getElementById("J4").style.display='none'; document.getElementById("J3").style.display='none'; document.getElementById("J2").style.display='none'; document.getElementById("J1").style.display='block'; document.getElementById("S2").style.display='none'; document.getElementById("S1").style.display='none'; }
</Script>  
 <td valign="top" id="J1" style=" display:none;">
  <table border="1">
  <tr bgcolor="#7a6189"><td colspan="5" style="color:#FFFFB3;font-size:14px;width:50px;font-family:Times New Roman;"><b>Designation&nbsp;:&nbsp;Senior Sales Executive/ Sales Executive Trainee</b></td>
  </tr>  
  <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Sn</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Code</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:350px;font-family:Times New Roman;"><b>Name</b></td>
   
   <td align="center" style="color:#FFFFFF;font-size:14px;width:300px;font-family:Times New Roman;"><b>Location</b></td>
  </tr>   
<?php $sql=mysql_query("select EmpCode,Fname,Sname,Lname,CostCenter,HqId,Gender,Married,DR,hrm_grade.GradeId from hrm_grade INNER JOIN hrm_employee_general ON hrm_grade.GradeId=hrm_employee_general.GradeId INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_grade.GradeValue='J1' AND hrm_employee_general.DepartmentId=6", $con); 
$sn=1; while($res=mysql_fetch_array($sql)){  if($res['DR']=='Y'){$M='Dr.';} elseif($res['Gender']=='M'){$M='Mr.';} elseif($res['Gender']=='F' AND $res['Married']=='Y'){$M='Mrs.';} elseif($res['Gender']=='F' AND $res['Married']=='N'){$M='Miss.';} 
$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId'], $con); $resGrade=mysql_fetch_assoc($sqlGrade);
$sqlHq = mysql_query("SELECT HqName FROM hrm_headquater WHERE HqId=".$res['HqId'], $con) or die(mysql_error()); $resHq = mysql_fetch_assoc($sqlHq); 
$sqlSt=mysql_query("select StateName from hrm_state where StateId=".$res['CostCenter'], $con); $resSt=mysql_fetch_assoc($sqlSt);
?>  
  <tr bgcolor="#FFFFFF">
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><?php echo $sn; ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $res['EmpCode']; ?></td>
   <td style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $M.' '.$res['Fname'].' '.$res['Sname'].' '.$res['Lname'];; ?></td>
   
   <td style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $resHq['HqName'].'&nbsp;('.$resSt['StateName'].')';?></td>
  </tr>
<?php $sn++; } ?>  
  </table>
 </td>  
<?php /************ S2 */ ?>
<Script type="text/javascript" language="javascript">
function ClickS2()
{ document.getElementById("MG").style.display='none'; document.getElementById("L5").style.display='none'; document.getElementById("L4").style.display='none'; document.getElementById("L3").style.display='none'; document.getElementById("L2").style.display='none'; document.getElementById("L1").style.display='none'; document.getElementById("M5").style.display='none'; document.getElementById("M4").style.display='none'; document.getElementById("M3").style.display='none'; document.getElementById("M2").style.display='none'; document.getElementById("M1").style.display='none'; document.getElementById("J4").style.display='none'; document.getElementById("J3").style.display='none'; document.getElementById("J2").style.display='none'; document.getElementById("J1").style.display='none'; document.getElementById("S2").style.display='block'; document.getElementById("S1").style.display='none'; }
</Script>  
 <td valign="top" id="S2" style=" display:none;">
  <table border="1">
  <tr bgcolor="#7a6189"><td colspan="5" style="color:#FFFFB3;font-size:14px;width:50px;font-family:Times New Roman;"><b>Designation&nbsp;:&nbsp;Sales Executive</b></td>
  </tr>  
  <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Sn</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Code</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:350px;font-family:Times New Roman;"><b>Name</b></td>
   
   <td align="center" style="color:#FFFFFF;font-size:14px;width:300px;font-family:Times New Roman;"><b>Location</b></td>
  </tr>   
<?php $sql=mysql_query("select EmpCode,Fname,Sname,Lname,CostCenter,HqId,Gender,Married,DR,hrm_grade.GradeId from hrm_grade INNER JOIN hrm_employee_general ON hrm_grade.GradeId=hrm_employee_general.GradeId INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_grade.GradeValue='S2' AND hrm_employee_general.DepartmentId=6", $con); 
$sn=1; while($res=mysql_fetch_array($sql)){  if($res['DR']=='Y'){$M='Dr.';} elseif($res['Gender']=='M'){$M='Mr.';} elseif($res['Gender']=='F' AND $res['Married']=='Y'){$M='Mrs.';} elseif($res['Gender']=='F' AND $res['Married']=='N'){$M='Miss.';} 
$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId'], $con); $resGrade=mysql_fetch_assoc($sqlGrade);
$sqlHq = mysql_query("SELECT HqName FROM hrm_headquater WHERE HqId=".$res['HqId'], $con) or die(mysql_error()); $resHq = mysql_fetch_assoc($sqlHq); 
$sqlSt=mysql_query("select StateName from hrm_state where StateId=".$res['CostCenter'], $con); $resSt=mysql_fetch_assoc($sqlSt);
?>  
  <tr bgcolor="#FFFFFF">
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><?php echo $sn; ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $res['EmpCode']; ?></td>
   <td style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $M.' '.$res['Fname'].' '.$res['Sname'].' '.$res['Lname'];; ?></td>
   <td style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $resHq['HqName'].'&nbsp;('.$resSt['StateName'].')';?></td>
  </tr>
<?php $sn++; } ?>  
  </table>
 </td>  
<?php /************ S1 */ ?>
<Script type="text/javascript" language="javascript">
function ClickS1()
{ document.getElementById("MG").style.display='none'; document.getElementById("L5").style.display='none'; document.getElementById("L4").style.display='none'; document.getElementById("L3").style.display='none'; document.getElementById("L2").style.display='none'; document.getElementById("L1").style.display='none'; document.getElementById("M5").style.display='none'; document.getElementById("M4").style.display='none'; document.getElementById("M3").style.display='none'; document.getElementById("M2").style.display='none'; document.getElementById("M1").style.display='none'; document.getElementById("J4").style.display='none'; document.getElementById("J3").style.display='none'; document.getElementById("J2").style.display='none'; document.getElementById("J1").style.display='none'; document.getElementById("S2").style.display='none'; document.getElementById("S1").style.display='block'; }
</Script>  
 <td valign="top" id="S1" style=" display:none;">
  <table border="1">
  <tr bgcolor="#7a6189"><td colspan="5" style="color:#FFFFB3;font-size:14px;width:50px;font-family:Times New Roman;"><b>Designation&nbsp;:&nbsp;Sales Trainee</b></td>
  </tr>  
  <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Sn</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Code</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:350px;font-family:Times New Roman;"><b>Name</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:300px;font-family:Times New Roman;"><b>Location</b></td>
  </tr>   
<?php $sql=mysql_query("select EmpCode,Fname,Sname,Lname,CostCenter,HqId,Gender,Married,DR,hrm_grade.GradeId from hrm_grade INNER JOIN hrm_employee_general ON hrm_grade.GradeId=hrm_employee_general.GradeId INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_grade.GradeValue='S1' AND hrm_employee_general.DepartmentId=6", $con); 
$sn=1; while($res=mysql_fetch_array($sql)){  if($res['DR']=='Y'){$M='Dr.';} elseif($res['Gender']=='M'){$M='Mr.';} elseif($res['Gender']=='F' AND $res['Married']=='Y'){$M='Mrs.';} elseif($res['Gender']=='F' AND $res['Married']=='N'){$M='Miss.';} 
$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId'], $con); $resGrade=mysql_fetch_assoc($sqlGrade);
$sqlHq = mysql_query("SELECT HqName FROM hrm_headquater WHERE HqId=".$res['HqId'], $con) or die(mysql_error()); $resHq = mysql_fetch_assoc($sqlHq); 
$sqlSt=mysql_query("select StateName from hrm_state where StateId=".$res['CostCenter'], $con); $resSt=mysql_fetch_assoc($sqlSt);
?>  
  <tr bgcolor="#FFFFFF">
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><?php echo $sn; ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $res['EmpCode']; ?></td>
   <td style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $M.' '.$res['Fname'].' '.$res['Sname'].' '.$res['Lname'];; ?></td>
   
   <td style="font-size:14px;font-family:Times New Roman;">&nbsp;<?php echo $resHq['HqName'].'&nbsp;('.$resSt['StateName'].')';?></td>
  </tr>
<?php $sn++; } ?>  
  </table>
 </td>   
</tr>
</table>	  
<?php /*************/ ?>	  
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>