<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.th{ font-family:Times New Roman;font-size:12px;height:25px;text-align:center;color:#FFFFFF;font-weight:bold; }
.tdl{ font-family:Times New Roman;font-size:12px;text-align:left; }
.tdc{ font-family:Times New Roman;font-size:12px;text-align:center; }
.tdinput{ font-family:Times New Roman;font-size:14px;text-align:center;width:100%; border:hidden; }
.tdinputl{ font-family:Times New Roman;font-size:14px;text-align:left;width:100%; border:hidden; }
.tdsel{ font-family:Times New Roman;font-size:14px;text-align:left; width:100%;}
.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;} .All{font-size:11px; height:20px;} .All_80{font-size:11px; height:20px; width:80px;}
.All_40{font-size:11px; height:20px; width:40px;} .All_50{font-size:11px; height:20px; width:50px;} .All_70{font-size:11px; height:20px; width:70px;} .All_80{font-size:11px; height:20px; width:80px;}.All_100{font-size:11px; height:20px; width:100px;} .All_120{font-size:11px; height:20px; width:120px;} .All_140{font-size:11px; height:20px; width:140px;} .All_60{font-size:11px; height:20px; width:60px;}
.All_150{font-size:11px; height:20px; width:150px;}.All_170{font-size:11px; height:20px; width:170px;}.All_180{font-size:11px; height:20px; width:180px;}.All_190{font-size:11px; height:20px; width:190px;} .All_200{font-size:11px; height:20px; width:200px;} .All_450{font-size:11px; height:20px; width:450px;}.All_360{font-size:11px; height:20px; width:350px;}.All_540{font-size:11px; height:20px; width:540px;}.All_400{font-size:11px; height:20px; width:400px;} .All_600{font-size:11px; height:20px; width:600px;}.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}.inner_table{height:500px;overflow-y:auto;width:auto;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<Script type="text/javascript" language="javascript">
$(document).ready(function () { $("#table1").freezeHeader({ 'height': '500px' }); })

function SelectAppRev(v){ window.location='AppsalPmsAllw.php?action=DW&value='+v;}
function SelectAppAllowPMS(v){ window.location='AppsalPmsAllw.php?action=AllowPms&value='+v;}
function Click(I,N){ 
  if(document.getElementById('AllowPMS_'+N).checked==false)
   { var url = 'AllExtraPMSTime.php';	var pars = 'PId='+I+'&No='+N;	var myAjax = new Ajax.Request(
	url, { 	method: 'post', parameters: pars,  onComplete: show_AllowPMSFalse });
   }
  else if(document.getElementById('AllowPMS_'+N).checked==true)
  { var url = 'AllExtraPMSTime.php';	var pars = 'PmsId='+I+'&No='+N;	var myAjax = new Ajax.Request(
	url, { 	method: 'post', parameters: pars,  onComplete: show_AllowPMSTrue });
  }
}
function show_AllowPMSFalse(originalRequest)
{ document.getElementById('ReturnValue').innerHTML = originalRequest.responseText; var No = document.getElementById("Sno").value;
  document.getElementById("TR_"+No).style.backgroundColor='#FFFFFF'; }
function show_AllowPMSTrue(originalRequest)
{ document.getElementById('ReturnValue').innerHTML = originalRequest.responseText; var No = document.getElementById("Sno").value;
  document.getElementById("TR_"+No).style.backgroundColor='#2C9326'; }
  
function AppRevClick(E,C,Y,N,V)
{  var U = document.getElementById("UserId").value;
   if(document.getElementById('AllowPMS_'+N).checked==true)
   { var url = 'AllAppRevPMSTime.php';	var pars = 'Check=Check&E='+E+'&Y='+Y+'&V='+V+'&U='+U+'&C='+C+'&N='+N;	var myAjax = new Ajax.Request(
	 url, { method: 'post', parameters: pars,  onComplete: show_CheckAppRevAllowPMS});
   }
  else if(document.getElementById('AllowPMS_'+N).checked==false)
  { var url = 'AllAppRevPMSTime.php';	var pars = 'Check=UnCheck&E='+E+'&Y='+Y+'&V='+V+'&U='+U+'&C='+C+'&N='+N;	var myAjax = new Ajax.Request(
	url, { 	method: 'post', parameters: pars,  onComplete: show_UnCheckAppRevAllowPMS});
  }
}
function show_CheckAppRevAllowPMS(originalRequest)
{ document.getElementById('ReturnValue').innerHTML = originalRequest.responseText; var No = document.getElementById("SNo").value;
  document.getElementById("TR_"+No).style.backgroundColor='#2C9326'; document.getElementById("TDALLPMS"+No).style.display='block';
}
function show_UnCheckAppRevAllowPMS(originalRequest)
{ document.getElementById('ReturnValue').innerHTML = originalRequest.responseText; var No = document.getElementById("SNo").value;
  document.getElementById("TR_"+No).style.backgroundColor='#FFFFFF'; document.getElementById("TDALLPMS"+No).style.display='none';
}

function ClickHODClick(E,Y,C)
{window.open("HRAllowEmpINC.php?action=approve&E="+E+"&Y="+Y+"&C="+C,"AppRove","scrollbars=yes,resizable=no,width=1000,height=600"); }

</Script>
</head>
<body class="body">
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" name="YId" id="YId" value="<?php echo $YearId; ?>" />
<input type="hidden" name="UserId" id="UserId" value="<?php echo $UserId; ?>" />
<input type="hidden" name="DeptValue" id="DeptValue" value="<?php echo $_REQUEST['value']; ?>" />
<table class="table" border="0">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center" width="100%" id="MainWindow">
<?php //******************************************************************************?>
<?php //***************START*****START*****START******START******START******************************?>
<?php //*******************************************************************************?>
<table border="0" style="margin-top:0px; width:100%;">
<tr>
<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true){ ?>
<td style="width:100%;" valign="top">
 <table border="0" style="width:100%;">
 <tr>
  <td colspan="2">
  <table border="0">
  <tr>
   <td colspan="12" align="left" class="heading">Allow PMS &nbsp;<span id="ReturnValue">&nbsp;</span></td>
   <td class="td1" style="font-size:11px;width:200px;" align="center"><select class="tdsel" name="DeptAppRev" id="DeptAppRev" onChange="SelectAppRev(this.value)"><option value="" style="margin-left:0px;" selected>SELECT DEPARTMENT</option>
<?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)){ ?><option value="<?php echo $ResDept['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDept['DepartmentCode'];?></option><?php } ?><option value="All">&nbsp;All</option></select></td>
   <td>&nbsp;</td>
   <td class="td1" style="font-size:11px; width:200px;" align="center"><select class="tdsel" name="AppAllowPMS" id="AppAllowPMS" onChange="SelectAppAllowPMS(this.value)"><option value="" style="margin-left:0px;" selected>SELECT APP/ REV/ HOD</option><option value="App" style="margin-left:0px;">APPRAISER</option><option value="Rev" style="margin-left:0px;">REVIEWER</option><option value="Hod" style="margin-left:0px;">HOD</option>
 </select></td>
<?php } ?>					 
  </tr>
  </table>
  </td>
 </tr>
<?php //--------------------Display Record----------------------------------------------- ?>
<?php if($_REQUEST['action']=='DW') { ?>
 <tr>
  <td valign="top" style="width:100%;">
  <table border="1" id="table1" cellspacing="0" style="width:100%;">
  <div class="thead">
  <thead>
  <tr>
   <?php if($_REQUEST['value']!='All') {$sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con);  $resA=mysql_fetch_assoc($sqlA); } ?><td colspan="13" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Georgia; font-weight:bold;">&nbsp;Allow PMS Employee Wise :&nbsp;&nbsp;(&nbsp;Department - <?php if($_REQUEST['value']!='All') { echo $resA['DepartmentName'];  } else echo 'All';?>&nbsp;)&nbsp;&nbsp;&nbsp;</td>
  </tr>
  <tr bgcolor="#7a6189">
    <td class="th" style="width:3%;">SNo</td>
    <td class="th" style="width:5%;">EmpCode</td>
	<td class="th" style="width:10%;">Department</td>
    <td class="th" style="width:20%;">Emp</td>
    <td class="th" style="width:20%;">Appraiser</td>
    <td class="th" style="width:20%;">Reviewer</td>
	<td class="th" style="width:17%;">HOD</td>	
	<td class="th" style="width:5%;">Allow</td>
  </tr>
  </thead>
  </div>
<?php if($YearId==1){$Y=2012; $Y2=2013;}elseif($YearId==2){$Y=2013; $Y2=2014;}elseif($YearId==3){$Y=2014; $Y2=2015;}elseif($YearId==4){$Y=2015; $Y2=2016;}elseif($YearId==5){$Y=2016; $Y2=2017;}elseif($YearId==6){$Y=2017; $Y2=2018;}elseif($YearId==7){$Y=2018; $Y2=2019;}elseif($YearId==8){$Y=2019; $Y2=2020;}elseif($YearId==9){$Y=2020; $Y2=2021;}elseif($YearId==10){$Y=2021; $Y2=2022;}elseif($YearId==11){$Y=2022; $Y2=2023;}
if($CompanyId==1 OR $CompanyId==2 OR $CompanyId==4){$YYear=$Y;}elseif($CompanyId==3){$YYear=$Y2;}

if($_REQUEST['value']=='All') { 
$sql = mysql_query("SELECT e.EmployeeID, EmpCode, Fname, Sname, Lname, DepartmentCode, EmpPmsId, Appraiser_EmployeeID, Reviewer_EmployeeID, HOD_EmployeeID, Emp_PmsStatus, Appraiser_PmsStatus, Reviewer_PmsStatus, HodSubmit_IncStatus, HR_PmsStatus, ExtraAllowPMS FROM hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId WHERE e.EmpStatus='A' AND g.DateJoining<='".$YYear."-06-30' AND p.AssessmentYear=".$YearId." AND e.CompanyId=".$CompanyId." AND p.Appraiser_EmployeeID!=0 order by e.EmpCode ASC", $con); }
      else { 
$sql = mysql_query("SELECT e.EmployeeID, EmpCode, Fname, Sname, Lname, DepartmentCode, EmpPmsId, Appraiser_EmployeeID, Reviewer_EmployeeID, HOD_EmployeeID, Emp_PmsStatus, Appraiser_PmsStatus, Reviewer_PmsStatus, HodSubmit_IncStatus, HR_PmsStatus, ExtraAllowPMS FROM hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId WHERE e.EmpStatus='A' AND g.DateJoining<='".$YYear."-06-30' AND p.AssessmentYear=".$YearId." AND e.CompanyId=".$CompanyId." AND g.DepartmentId=".$_REQUEST['value']." AND p.Appraiser_EmployeeID!=0 order by e.EmpCode ASC", $con); }
$no=1; while($res = mysql_fetch_array($sql)) { 
$sqlA = mysql_query("SELECT * from hrm_employee where EmployeeID=".$res['Appraiser_EmployeeID'], $con); 
$sqlR = mysql_query("SELECT * from hrm_employee where EmployeeID=".$res['Reviewer_EmployeeID'], $con); 
$sqlH = mysql_query("SELECT * from hrm_employee where EmployeeID=".$res['HOD_EmployeeID'], $con); 
$resA=mysql_fetch_assoc($sqlA); $resR=mysql_fetch_assoc($sqlR); $resH=mysql_fetch_assoc($sqlH);
?>
   <div class="tbody">
   <tbody>
   <tr id="TR_<?php echo $no;?>" style="background-color:<?php if($res['ExtraAllowPMS']==1){echo '#2C9326';}else{echo '#FFFFFF';}?>;">
    <td class="tdc"><?php echo $no; ?></td>
    <td class="tdc"><?php echo $res['EmpCode']; ?></td> 
	<td class="tdl"><?php echo $res['DepartmentCode']; ?></td>
    <td class="tdl"><?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>    
    <td class="tdl"><?php echo $resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname']; ?></td> 
    <td class="tdl"><?php echo $resR['Fname'].' '.$resR['Sname'].' '.$resR['Lname']; ?></td>  
    <td class="tdl"><?php echo $resH['Fname'].' '.$resH['Sname'].' '.$resH['Lname']; ?></td>
	<td class="tdc"><?php if($_SESSION['User_Permission']=='Edit'){?><input type="checkbox" style="height:10px;" name="AllowPMS_<?php echo $no; ?>" id="AllowPMS_<?php echo $no; ?>" <?php if($res['ExtraAllowPMS']==1){echo 'checked';}?> onClick="Click(<?php echo $res['EmpPmsId'].','.$no; ?>)" /><?php } ?></td>
   </tr>
   </tbody>
   </div>
<?php $no++;} ?> 
  </table>
  </td>
 </tr> 
<?php } if($_REQUEST['action']=='AllowPms') {  ?>	
<tr>
 <td valign="top" style="width:100%;">
 <table border="1" id="table1" cellspacing="0" style="width:100%;">
 <div class="thead">
 <thead>
 <tr>
  <td colspan="13" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Georgia; font-weight:bold;">&nbsp;Allow PMS :&nbsp;&nbsp;(<?php if($_REQUEST['value']=='App') { echo 'Appraiser'; } if($_REQUEST['value']=='Rev') { echo 'Reviewer'; } if($_REQUEST['value']=='Hod') { echo 'Employee Wise HOD'; }?> &nbsp;&nbsp;)&nbsp;&nbsp;&nbsp;</td>
 </tr>
 <tr bgcolor="#7a6189">
   <td class="th" style="width:5%;">SNo</td>
   <td class="th" style="width:10%;">EmpCode</td>
   <td class="th" style="width:15%;">Department</td>
   <td class="th" style="width:50%;">Name</td>
   <td class="th" style="width:10%;">Allow</td>
   <?php if($_REQUEST['value']=='Hod'){ ?><td class="th" style="width:10%;">Click</td><?php } ?>
 </tr>
 </thead>
 </div>
<?php if($_REQUEST['value']=='App'){ $SqlAppRev=mysql_query("SELECT e.EmployeeID,EmpCode,Fname,Sname,Lname,DepartmentCode, Appraiser_EmployeeID from hrm_employee_pms p INNER JOIN hrm_employee e ON p.Appraiser_EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON p.Appraiser_EmployeeID=g.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId WHERE p.CompanyId=".$CompanyId." AND p.AssessmentYear=".$YearId." GROUP BY p.Appraiser_EmployeeID ORDER BY e.EmpCode ASC", $con); }
      if($_REQUEST['value']=='Rev') { $SqlAppRev=mysql_query("SELECT e.EmployeeID,EmpCode,Fname,Sname,Lname,DepartmentCode, Reviewer_EmployeeID from hrm_employee_pms p INNER JOIN hrm_employee e ON p.Reviewer_EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON p.Reviewer_EmployeeID=g.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId WHERE p.CompanyId=".$CompanyId." AND p.AssessmentYear=".$YearId." GROUP BY p.Reviewer_EmployeeID ORDER BY e.EmpCode ASC", $con); } 
	  if($_REQUEST['value']=='Hod') { $SqlAppRev=mysql_query("SELECT e.EmployeeID,EmpCode,Fname,Sname,Lname,DepartmentCode, HOD_EmployeeID from hrm_employee_pms p INNER JOIN hrm_employee e ON p.HOD_EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON p.HOD_EmployeeID=g.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId WHERE p.CompanyId=".$CompanyId." AND p.AssessmentYear=".$YearId." GROUP BY p.HOD_EmployeeID ORDER BY e.EmpCode ASC", $con); }
	  $no=1; while($ResAppRev=mysql_fetch_array($SqlAppRev))
	  { $EnameAppRev=$ResAppRev['Fname'].' '.$ResAppRev['Sname'].' '.$ResAppRev['Lname'];  
	 if($_REQUEST['value']=='App'){ $sqlCh=mysql_query("select * from hrm_pms_allow where Appraiser_EmployeeID=".$ResAppRev['EmployeeID']." AND CompanyId=".$CompanyId." AND AssesmentYear=".$YearId, $con); }
	 if($_REQUEST['value']=='Rev'){ $sqlCh=mysql_query("select * from hrm_pms_allow where Reviewer_EmployeeID=".$ResAppRev['EmployeeID']." AND CompanyId=".$CompanyId." AND AssesmentYear=".$YearId, $con); } 
	 if($_REQUEST['value']=='Hod'){ $sqlCh=mysql_query("select * from hrm_pms_allow where HOD_EmployeeID=".$ResAppRev['EmployeeID']." AND CompanyId=".$CompanyId." AND AssesmentYear=".$YearId, $con); } $RowCh=mysql_num_rows($sqlCh); ?>
  <div class="tbody">
  <tbody>	 
  <tr id="TR_<?php echo $no; ?>" <?php if($RowCh>0) { ?> bgcolor="#2C9326" <?php } else { ?> bgcolor="#FFFFFF" <?php } ?> >
    <td class="tdc"><?php echo $no; ?></td>
    <td class="tdc"><?php echo $ResAppRev['EmpCode']; ?></td> 
	<td class="tdl">&nbsp;<?php echo $ResAppRev['DepartmentCode']; ?></td>
    <td class="tdl">&nbsp;<?php echo $EnameAppRev ?></td>
	<td class="tdc"><?php if($_SESSION['User_Permission']=='Edit'){?><input type="checkbox" style="height:10px;" name="AllowPMS_<?php echo $no; ?>" id="AllowPMS_<?php echo $no; ?>" <?php if($RowCh>0){echo 'checked';}?> onClick="AppRevClick(<?php echo $ResAppRev['EmployeeID'].','.$CompanyId.','.$YearId.','.$no; ?>,'<?php echo $_REQUEST['value']; ?>')" /><?php } ?>
	</td>
	<?php if($_REQUEST['value']=='Hod'){ ?><td class="tdc"><?php if($_SESSION['User_Permission']=='Edit'){?><span id="TDALLPMS<?php echo $no;?>" <?php if($RowCh>0){echo 'style="display:block;"';} else {echo 'style="display:none;"';}?>><a href="#" onClick="ClickHODClick(<?php echo $ResAppRev['EmployeeID'].','.$YearId.','.$CompanyId; ?>)">Click</a></span><?php } ?>
	 </td><?php } ?>
  </tr>
  </tbody>
  </div>
<?php $no++;} ?> 
   </table>
 </td>
</tr> 
<?php } ?>
<?php //-------------------------------------------------------------------------------------------------------- ?>
	</tr>
</table>
<?php //*********************************************************************************?>
<?php //***************END*****END*****END******END******END*************************************?>
<?php //******************************************************************************?>
	  </td>
	</tr>
	  </table>
 </td>
</tr>
</table>
</body>
</html>