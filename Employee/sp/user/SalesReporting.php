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
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;} .All{font-size:11px; height:20px;} .All_80{font-size:11px; height:20px; width:80px;}
.All_40{font-size:11px; height:20px; width:40px;} .All_50{font-size:11px; height:20px; width:50px;} .All_70{font-size:11px; height:20px; width:70px;} .All_80{font-size:11px; height:20px; width:80px;}.All_100{font-size:11px; height:20px; width:100px;} .All_120{font-size:11px; height:20px; width:120px;} .All_140{font-size:11px; height:20px; width:140px;} .All_60{font-size:11px; height:20px; width:60px;}
.All_150{font-size:11px; height:20px; width:150px;}.All_170{font-size:11px; height:20px; width:170px;}.All_180{font-size:11px; height:20px; width:180px;}.All_190{font-size:11px; height:20px; width:190px;} .All_200{font-size:11px; height:20px; width:200px;} .All_450{font-size:11px; height:20px; width:450px;}.All_360{font-size:11px; height:20px; width:350px;}.All_540{font-size:11px; height:20px; width:540px;}.All_400{font-size:11px; height:20px; width:400px;} .All_600{font-size:11px; height:20px; width:600px;}
</style>
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<script language="javascript" type="text/javascript">
function ClickMg(){ document.getElementById("MG").style.display='block'; }
/*
function ClickEmp(value) 
{  
   var url = 'ReportingEmp1.php';	var pars = 'Deptid='+value;	var myAjax = new Ajax.Request(
	url, { method: 'post', parameters: pars, onComplete: show_ReportingEmp1	});
} 
function show_ReportingEmp1(originalRequest)
{ document.getElementById('DesigSpan').innerHTML = originalRequest.responseText; }
*/
</script>
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
 <td style="width:390px;" valign="top">
  <table border="1">
  <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Grade</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:320px;font-family:Times New Roman;"><b>Designation</b></td>
  </tr>   
  <tr bgcolor="#FFFFFF">
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><b>MG</b></td>
   <td style="font-size:14px;font-family:Times New Roman;"><b><a href="#" onClick="ClickMg()">Business Head</a></a></b></td>
  </tr> 
  <tr bgcolor="#FFFFFF">
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><b>L5</b></td>
   <td style="font-size:14px;font-family:Times New Roman;"><b><a href="#" onClick="ClickL5()">National Sales Lead</a></b></td>
  </tr> 
  <tr bgcolor="#FFFFFF">
  <td align="center" style="font-size:14px;font-family:Times New Roman;"><b>L4/L3</b></td>
  <td style="font-size:14px;font-family:Times New Roman;"><b><a href="#" onClick="ClickL4()">General Manager Sales</a></b></td>
 </tr>
  <tr bgcolor="#FFFFFF">
  <td align="center" style="font-size:14px;font-family:Times New Roman;"><b>L2</b></td>
  <td style="font-size:14px;font-family:Times New Roman;"><b><a href="#" onClick="ClickL2()">Zonal Business Manager</b></td>
 </tr>
  <tr bgcolor="#FFFFFF">
  <td align="center" style="font-size:14px;font-family:Times New Roman;"><b>L1</b></td>
  <td style="font-size:14px;font-family:Times New Roman;"><b><a href="#" onClick="ClickL1()">Zonal Sales Coordinator</a></b></td>
 </tr>
  <tr bgcolor="#FFFFFF">
  <td align="center" style="font-size:14px;font-family:Times New Roman;"><b>M5/M4</b></td>
  <td style="font-size:14px;font-family:Times New Roman;"><b><a href="#" onClick="ClickM5()">Regional Business Manager</a></b></td>
 </tr>
  <tr bgcolor="#FFFFFF">
  <td align="center" style="font-size:14px;font-family:Times New Roman;"><b>M3/M2</b></td>
  <td style="font-size:14px;font-family:Times New Roman;"><b><a href="#" onClick="ClickM3()">Area Business Manager</a></b></td>
 </tr>
  <tr bgcolor="#FFFFFF">
  <td align="center" style="font-size:14px;font-family:Times New Roman;"><b>M1</b></td>
  <td style="font-size:14px;font-family:Times New Roman;"><b><a href="#" onClick="ClickM1()">Coordinator Sales</a></b></td>
 </tr>
  <tr bgcolor="#FFFFFF">
  <td align="center" style="font-size:14px;font-family:Times New Roman;"><b>J4</b></td>
  <td style="font-size:14px;font-family:Times New Roman;"><b><a href="#" onClick="ClickJ4()">Territory Business Manager</a></b></td>
 </tr>
  <tr bgcolor="#FFFFFF">
  <td align="center" style="font-size:14px;font-family:Times New Roman;"><b>J3</b></td>
  <td style="font-size:14px;font-family:Times New Roman;"><b><a href="#" onClick="ClickJ3()">Senior Territory Sales Executive</a></b></td>
 </tr>
  <tr bgcolor="#FFFFFF">
  <td align="center" style="font-size:14px;font-family:Times New Roman;"><b>J2</b></td>
  <td style="font-size:14px;font-family:Times New Roman;"><b><a href="#" onClick="ClickJ2()">Territory Sales Executive</a></b></td>
 </tr>
  <tr bgcolor="#FFFFFF">
  <td align="center" style="font-size:14px;font-family:Times New Roman;"><b>J1</b></td>
  <td style="font-size:14px;font-family:Times New Roman;"><b><a href="#" onClick="ClickJ1()">Senior Sales Executive/ Sales Executive Trainee</a></b></td>
 </tr>
  <tr bgcolor="#FFFFFF">
  <td align="center" style="font-size:14px;font-family:Times New Roman;"><b>S2</b></td>
  <td style="font-size:14px;font-family:Times New Roman;"><b><a href="#" onClick="ClickS2()">Sales Executive</a></b></td>
 </tr>
  <tr bgcolor="#FFFFFF">
  <td align="center" style="font-size:14px;font-family:Times New Roman;"><b>S1</b></td>
  <td style="font-size:14px;font-family:Times New Roman;"><b><a href="#" onClick="ClickS1()">Sales Trainee</a></b></td>
 </tr>
  </table>
 </td>
 <td valign="top" id="MG" style="display:none; ">
 <span id="RepSpan"> 
  <table border="1">
  <tr bgcolor="#7a6189"><td colspan="3" style="color:#FFFFB3;font-size:14px;width:50px;font-family:Times New Roman;"><b>Designation&nbsp;:&nbsp;Business Head</b></td>
  </tr>  
  <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:13px;width:400px;font-family:Times New Roman;"><b>Name</b></td>
  </tr>   
<?php $sql=mysql_query("select EmpCode,Fname,Sname,Lname,CostCenter,HqId,Gender,Married,DR,hrm_grade.GradeId from hrm_grade INNER JOIN hrm_employee_general ON hrm_grade.GradeId=hrm_employee_general.GradeId INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_grade.GradeValue='MG' AND hrm_employee_general.DepartmentId=6", $con); 
$sn=1; while($res=mysql_fetch_array($sql)){  if($res['DR']=='Y'){$M='Dr.';} elseif($res['Gender']=='M'){$M='Mr.';} elseif($res['Gender']=='F' AND $res['Married']=='Y'){$M='Mrs.';} elseif($res['Gender']=='F' AND $res['Married']=='N'){$M='Miss.';} $Name=$M.' '.$res['Fname'].' '.$res['Sname'].' '.$res['Lname'];
$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId'], $con); $resGrade=mysql_fetch_assoc($sqlGrade);
$sqlHq = mysql_query("SELECT HqName FROM hrm_headquater WHERE HqId=".$res['HqId'], $con) or die(mysql_error()); $resHq = mysql_fetch_assoc($sqlHq); 
$sqlSt=mysql_query("select StateName from hrm_state where StateId=".$res['CostCenter'], $con); $resSt=mysql_fetch_assoc($sqlSt);
?>  
  <tr bgcolor="#FFFFFF">
   <td style="font-size:13px;font-family:Times New Roman;">
   &nbsp;<?php echo '<b>'.$Name.'</b> / '.$resHq['HqName'].'&nbsp;('.$resSt['StateName'].')'; ?>&nbsp;
   <a href="#">RepMgr</a>
   </td>
  </tr>
<?php $sn++; } ?>  
  </table>
  </span>
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