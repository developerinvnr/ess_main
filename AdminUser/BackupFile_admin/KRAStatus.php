<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
$sqlSYP=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='PMS'", $con); 
$sqlSY=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='KRA'", $con); $resSYP=mysql_fetch_array($sqlSYP); $resSY=mysql_fetch_array($sqlSY); 
$sqlOld=mysql_query("select * from hrm_year where YearId=".$resSY['OldY'], $con); 
$sqlCurr=mysql_query("select * from hrm_year where YearId=".$resSY['CurrY'], $con);
$sqlNew=mysql_query("select * from hrm_year where YearId=".$resSY['NewY'], $con); 
$resOld=mysql_fetch_assoc($sqlOld); $resCurr=mysql_fetch_assoc($sqlCurr); $resNew=mysql_fetch_assoc($sqlNew);	
$FromOld=date("Y", strtotime($resOld['FromDate'])); $ToOld=date("Y", strtotime($resOld['ToDate'])); 
$FromCurr=date("Y", strtotime($resCurr['FromDate'])); $ToCurr=date("Y", strtotime($resCurr['ToDate']));
$FromNew=date("Y", strtotime($resNew['FromDate'])); $ToNew=date("Y", strtotime($resNew['ToDate']));
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.td1{ text-align:center;font-family:Times New Roman;color:#FFFFFF;font-size:14px; }
.td2{ text-align:center;font-family:Times New Roman;font-size:14px;text-transform:capitalize;}
.td3{ font-family:Times New Roman;font-size:14px;text-transform:capitalize;} 
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<style>.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
<Script type="text/javascript">//window.history.forward(1);</script>
<Script type="text/javascript" language="javascript">
function SelectAppRev(v){ window.location='KRAStatus.php?action=DW&value='+v;}
function SelectAppScore(v){ window.location='KRAStatus.php?action=APPW&value='+v;}
function SelectRevScore(v){ window.location='KRAStatus.php?action=REVW&value='+v;}
function SelectHodScore(v){ window.location='KRAStatus.php?action=HODW&value='+v;}
function SelectAppAllowPMS(v){ window.location='KRAStatus.php?action=AllowPms&value='+v;}

function Click(Y,E,N)
{ 
  if(document.getElementById('AllowKRA_'+N).checked==true)
  { var url = 'AllExtraPMSTime.php';	var pars = 'YearId='+Y+'&N='+N+'&E='+E;	var myAjax = new Ajax.Request(
	url, { 	method: 'post', parameters: pars,  onComplete: show_AllowPMSTrue }); }
  else if(document.getElementById('AllowKRA_'+N).checked==false)
   { var url = 'AllExtraPMSTime.php';	var pars = 'YId='+Y+'&N='+N+'&E='+E; var myAjax = new Ajax.Request(
	url, { 	method: 'post', parameters: pars,  onComplete: show_AllowPMSFalse }); }	
}

function show_AllowPMSTrue(originalRequest)
{ document.getElementById('ReturnValue').innerHTML = originalRequest.responseText; var No = document.getElementById("Sno").value; document.getElementById("TR_"+No).style.backgroundColor='#2C9326'; }
function show_AllowPMSFalse(originalRequest)
{ document.getElementById('ReturnValue').innerHTML = originalRequest.responseText; var No = document.getElementById("Sno").value; document.getElementById("TR_"+No).style.backgroundColor='#FFFFFF'; }


function AppRevClick(E,C,Y,N,V)
{  var U = document.getElementById("UserId").value;
   if(document.getElementById('AllowKRA_'+N).checked==true)
   { var url = 'AllAppRevPMSTime.php';	var pars = 'KRACheck=KRACheck&E='+E+'&Y='+Y+'&V='+V+'&U='+U+'&C='+C+'&N='+N;	var myAjax = new Ajax.Request(
	 url, { method: 'post', parameters: pars,  onComplete: show_CheckAppRevAllowPMS});
   }
  else if(document.getElementById('AllowKRA_'+N).checked==false)
  { var url = 'AllAppRevPMSTime.php';	var pars = 'KRACheck=KRAUnCheck&E='+E+'&Y='+Y+'&V='+V+'&U='+U+'&C='+C+'&N='+N;	var myAjax = new Ajax.Request(
	url, { 	method: 'post', parameters: pars,  onComplete: show_UnCheckAppRevAllowPMS});
  }
}


function show_CheckAppRevAllowPMS(originalRequest)
{ document.getElementById('ReturnValue').innerHTML = originalRequest.responseText; var No = document.getElementById("SNo").value; document.getElementById("TR_"+No).style.backgroundColor='#2C9326'; document.getElementById("TDALLPMS"+No).style.display='block';
}

function show_UnCheckAppRevAllowPMS(originalRequest)
{ document.getElementById('ReturnValue').innerHTML = originalRequest.responseText; var No = document.getElementById("SNo").value; document.getElementById("TR_"+No).style.backgroundColor='#FFFFFF'; document.getElementById("TDALLPMS"+No).style.display='none';
}

function EmpKRA(CId,YId,EmpId) 
{ window.open ("EmpKraForm.php?YId="+YId+"&EmpId="+EmpId+"&CId="+CId,"KRAForm","menubar=yes,scrollbars=yes,resizable=1,width=1100,height=500");}


function FunUnLckKRA(Y,E,N)
{ 
  if(document.getElementById('UnLckKRA_'+N).checked==true){ var url = 'AllExtraPMSTime.php';	
  var pars = 'act=falseUnLck&YId='+Y+'&N='+N+'&E='+E; var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars,  onComplete: show_True }); }
  else if(document.getElementById('UnLckKRA_'+N).checked==false){ var url = 'AllExtraPMSTime.php';	
  var pars = 'act=trueUnLck&YId='+Y+'&N='+N+'&E='+E; var myAjax = new Ajax.Request( url, { 	method: 'post', parameters: pars,  onComplete: show_False }); }
}

function show_True(originalRequest)
{ document.getElementById('ReturnValue').innerHTML = originalRequest.responseText; 
  document.getElementById("TDD_"+document.getElementById("Sno").value).style.backgroundColor='#FFAAFF'; }
function show_False(originalRequest)
{ document.getElementById('ReturnValue').innerHTML = originalRequest.responseText; 
  document.getElementById("TDD_"+document.getElementById("Sno").value).style.backgroundColor='#FFFF80'; }
</Script>
</head>
<body class="body">
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" name="YId" id="YId" value="<?php echo $resSY['CurrY']; ?>" />
<input type="hidden" name="UserId" id="UserId" value="<?php echo $UserId; ?>" />
<table class="table" border="0">
<tr>
 <td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
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
<?php //************************************************************************************************?>
<?php /******************START*****START*****START******START******START*************************************/?>
<?php //*******************************************************************************************************?>
<table border="0" style="margin-top:0px; width:95%; height:400px;">
 <tr>
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true){ ?>
  <td align="" width="100%" valign="top">
  <table border="0">
   <tr>
	<td colspan="2">
    <table border="0">
	 <tr><td colspan="12" align="left" class="heading">KRA - Status Report &nbsp;<span id="ReturnValue">&nbsp;</span></td></tr>
	 <tr>
	  <td>
	  <table border="0">
	   <tr><td colspan="4" bgcolor="#7a6189" style="width:600px; height:20px; font-size:12px; font-family:Georgia; color:#FFFFFF; font-weight:bold;" align="center">KRA Progress Status</td></tr>							
       <tr bgcolor="#DDFFBB">
		<td class="td1" style="width:150px;"><select class="td3" style="width:148px;height:22px;background-color:#DDFFBB;" name="DeptAppRev" id="DeptAppRev" onChange="SelectAppRev(this.value)"><option value="" style="margin-left:0px;" selected>Select Department</option><?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)){?><option value="<?php echo $ResDept['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDept['DepartmentCode'];?></option><?php } ?><option value="All">&nbsp;All</option></select></td>

		<td class="td1" style="width:150px;"><select class="td3" style="width:148px;height:22px;background-color:#DDFFBB;" name="AppScore" id="AppScore" onChange="SelectAppScore(this.value)"><option value="" style="margin-left:0px;" selected>Select Appraiser</option><?php $SqlHod=mysql_query("SELECT Appraiser_EmployeeID,Fname,Sname,Lname from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.Appraiser_EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$resSYP['CurrY']." GROUP BY Appraiser_EmployeeID ORDER BY Fname ASC", $con); while($ResHod=mysql_fetch_array($SqlHod)) { $EnameH=$ResHod['Fname'].' '.$ResHod['Sname'].' '.$ResHod['Lname']; ?><option value="<?php echo $ResHod['Appraiser_EmployeeID']; ?>"><?php echo $EnameH; ?></option><?php } ?></select></td>

		<td class="td1" style="width:150px;"><select class="td3" style="width:148px;height:22px;background-color:#DDFFBB;" name="RevScore" id="RevScore" onChange="SelectRevScore(this.value)"><option value="" style="margin-left:0px;" selected>Select Reviewer</option><?php $SqlHod=mysql_query("SELECT Reviewer_EmployeeID,Fname,Sname,Lname from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.Reviewer_EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$resSYP['CurrY']." GROUP BY Reviewer_EmployeeID ORDER BY Fname ASC", $con); while($ResHod=mysql_fetch_array($SqlHod)) { $EnameH=$ResHod['Fname'].' '.$ResHod['Sname'].' '.$ResHod['Lname']; ?><option value="<?php echo $ResHod['Reviewer_EmployeeID']; ?>"><?php echo $EnameH; ?></option><?php } ?></select></td>

		<td class="td1" style="width:150px;"><select class="td3" style="width:148px;height:22px;background-color:#DDFFBB;" name="HodScore" id="HodScore" onChange="SelectHodScore(this.value)"><option value="" style="margin-left:0px;" selected>Select HOD</option><?php $SqlHod=mysql_query("SELECT HOD_EmployeeID,Fname,Sname,Lname from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.HOD_EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$resSYP['CurrY']." GROUP BY HOD_EmployeeID ORDER BY Fname ASC", $con); while($ResHod=mysql_fetch_array($SqlHod)) { $EnameH=$ResHod['Fname'].' '.$ResHod['Sname'].' '.$ResHod['Lname']; ?><option value="<?php echo $ResHod['HOD_EmployeeID']; ?>"><?php echo $EnameH; ?></option><?php } ?></select></td>

       </tr>
      </table>					
      </td> 
      <td>&nbsp;</td>
	  <td>
      <table border="0">
       <tr>
	    <td class="td1" bgcolor="#7a6189" style="width:150px;height:20px;font-weight:bold;">Allow KRA</td>
	   </tr>					
       <tr bgcolor="#DDFFBB"> 
	    <td class="td1" style="width:150px;"><select class="td3" style="width:148px;height:20px;background-color:#DDFFBB;" name="AppAllowPMS" id="AppAllowPMS" onChange="SelectAppAllowPMS(this.value)"><option value="" style="margin-left:0px;" selected>Select App./ Rev.</option><option value="App" style="margin-left:0px;">Appraiser</option><option value="Rev" style="margin-left:0px;">Reviewer</option></select></td>				 
       </tr>
	  </table>					
	  </td>      
      <td>&nbsp;</td>
     </tr>
    </table>
    </td>
  </tr>
<?php //--------- Display Record --------------------------- ?>
<?php if($_REQUEST['action']=='DW' OR $_REQUEST['action']=='APPW' OR $_REQUEST['action']=='REVW' OR $_REQUEST['action']=='HODW'){ 

if($_REQUEST['action']=='DW'){ $wise='Department'; if($_REQUEST['value']!='All'){ $sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); $name=$resA['DepartmentName'];}else{$name='All';} }
elseif($_REQUEST['action']=='APPW'){ $wise='Appraiser'; }
elseif($_REQUEST['action']=='REVW'){ $wise='Reviewer'; }
elseif($_REQUEST['action']=='HODW'){ $wise='HOD'; }

if($_REQUEST['action']=='APPW' OR $_REQUEST['action']=='REVW' OR $_REQUEST['action']=='HODW')
{ $sqlA=mysql_query("select Fname, Sname, Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); $name=$resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname']; }
?>

<tr>
 <td>
 <table border="1" width="100%" cellspacing="1">
  <tr bgcolor="#7a6189">	
   <td colspan="11" class="td1" style="background-color:#0069D2;font-weight:bold;">&nbsp;PMS Status <?php echo $wise; ?> Wise :&nbsp;&nbsp;(&nbsp;<?php echo $name; ?>&nbsp;)&nbsp;&nbsp;&nbsp;</td>
   <td class="td1" style="width:50px;" rowspan="3"><b>Extra<br>Time</b></td>
   <td class="td1" style="width:50px;" rowspan="3"><b>Un<br>Lock</b></td>
  </tr>
  <tr bgcolor="#7a6189">
    <td class="td1" colspan="7">Name</b></td>
	<td class="td1" colspan="4"><b>Status</b></td>
  </tr>
  <tr bgcolor="#7a6189">
    <td class="td1" style="width:40px;"><b>SNo.</b></td>
    <td class="td1" style="width:50px;"><b>Code</b></td>
	<td class="td1" style="width:100px;"><b>Department</b></td>
    <td class="td1" style="width:180px;"><b>Emp</b></td>
    <td class="td1" style="width:180px;"><b>Appraiser</b></td>
    <td class="td1" style="width:180px;"><b>Reviewer</b></td>
	<td class="td1" style="width:180px;"><b>HOD</b></td>
    <td class="td1" style="width:60px;"><b>Emp</b></td>
    <td class="td1" style="width:60px;"><b>App</b></td>
    <td class="td1" style="width:60px;"><b>Rev</b></td>
	<td class="td1" style="width:50px;"><b>KRA</b></td>
  </tr>
<?php
if($_REQUEST['action']=='DW')
{ 
 if($_REQUEST['value']=='All'){ $sql = mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, DepartmentCode, ExtraAllowKRA, UnLckKRA, Appraiser_EmployeeID, Reviewer_EmployeeID, HOD_EmployeeID from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_employee_pms p on e.EmployeeID=p.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId where e.EmpStatus='A' AND e.EmpCode!=1001 AND e.EmpCode!=1002 AND e.EmpCode!=1003 AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$resSY['CurrY']." order by e.EmpCode asc",$con); }else{ $sql = mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, DepartmentCode, ExtraAllowKRA, UnLckKRA, Appraiser_EmployeeID, Reviewer_EmployeeID, HOD_EmployeeID from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_employee_pms p on e.EmployeeID=p.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId where g.DepartmentId=".$_REQUEST['value']." AND e.EmpStatus='A' AND e.EmpCode!=1001 AND e.EmpCode!=1002 AND e.EmpCode!=1003 AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$resSY['CurrY']." order by e.EmpCode asc",$con); }
}
elseif($_REQUEST['action']=='APPW')
{ $sql = mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, DepartmentCode, ExtraAllowKRA, UnLckKRA, Appraiser_EmployeeID, Reviewer_EmployeeID, HOD_EmployeeID from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_employee_pms p on e.EmployeeID=p.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId where p.Appraiser_EmployeeID=".$_REQUEST['value']." AND p.AssessmentYear=".$resSY['CurrY']." AND e.EmpStatus='A' AND e.EmpCode!=1001 AND e.EmpCode!=1002 AND e.EmpCode!=1003 AND e.CompanyId=".$CompanyId." order by e.EmpCode asc",$con); }
elseif($_REQUEST['action']=='REVW')
{ $sql = mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, DepartmentCode, ExtraAllowKRA, UnLckKRA, Appraiser_EmployeeID, Reviewer_EmployeeID, HOD_EmployeeID from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_employee_pms p on e.EmployeeID=p.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId where p.Reviewer_EmployeeID=".$_REQUEST['value']." AND p.AssessmentYear=".$resSY['CurrY']." AND e.EmpStatus='A' AND e.EmpCode!=1001 AND e.EmpCode!=1002 AND e.EmpCode!=1003 AND e.CompanyId=".$CompanyId." order by e.EmpCode asc",$con); }
elseif($_REQUEST['action']=='HODW')
{ $sql = mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, DepartmentCode, ExtraAllowKRA, UnLckKRA, Appraiser_EmployeeID, Reviewer_EmployeeID, HOD_EmployeeID from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_employee_pms p on e.EmployeeID=p.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId where p.HOD_EmployeeID=".$_REQUEST['value']." AND p.AssessmentYear=".$resSY['CurrY']." AND e.EmpStatus='A' AND e.EmpCode!=1001 AND e.EmpCode!=1002 AND e.EmpCode!=1003 AND e.CompanyId=".$CompanyId." order by e.EmpCode asc",$con); }

$row=mysql_num_rows($sql); if($row>0){ $no=1; while($res = mysql_fetch_array($sql)){ 

$sqlA = mysql_query("SELECT * from hrm_employee where EmployeeID=".$res['Appraiser_EmployeeID'],$con); 
$sqlR = mysql_query("SELECT * from hrm_employee where EmployeeID=".$res['Reviewer_EmployeeID'], $con); 
$sqlH = mysql_query("SELECT * from hrm_employee where EmployeeID=".$res['HOD_EmployeeID'], $con);
$resA=mysql_fetch_assoc($sqlA); $resR=mysql_fetch_assoc($sqlR); $resH=mysql_fetch_assoc($sqlH);
?>  

  <tr id="TR_<?php echo $no; ?>" bgcolor="<?php if($res['ExtraAllowKRA']==1){echo '#2C9326';}else{echo '#FFFFFF';}?>" >
   <td class="td2"><?php echo $no; ?></td>
   <td class="td2"><?php echo $res['EmpCode']; ?></td>
   <td class="td2">&nbsp;<?php echo strtolower($res['DepartmentCode']); ?></td>
   <td class="td3">&nbsp;<?php echo strtolower($res['Fname'].' '.$res['Sname'].' '.$res['Lname']); ?></td>
   <td class="td3">&nbsp;<?php echo strtolower($resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname']); ?></td>
   <td class="td3">&nbsp;<?php echo strtolower($resR['Fname'].' '.$resR['Sname'].' '.$resR['Lname']); ?></td>
   <td class="td3">&nbsp;<?php echo strtolower($resH['Fname'].' '.$resH['Sname'].' '.$resH['Lname']); ?></td>

<?php $sql3E=mysql_query("select EmpStatus,AppStatus,RevStatus from hrm_pms_kra where YearId=".$resSY['CurrY']." AND EmployeeID=".$res['EmployeeID'], $con); $row3E=mysql_num_rows($sql3E); 
      if($row3E==0){ $stE='Draft'; $stA='Draft'; $stR='Draft';} 
	  if($row3E>0)
	  { $res3E=mysql_fetch_assoc($sql3E);
	    if($res3E['EmpStatus']=='D'){$stE='Draft'; $clrE='#A40000';}elseif($res3E['EmpStatus']=='P'){$stE='Pending'; $clrE='#36006C';}elseif($res3E['EmpStatus']=='A'){$stE='Submitted'; $clrE='#005300';}else{$stE='';}
		if($res3E['AppStatus']=='D'){$stA='Draft'; $clrA='#A40000';}elseif($res3E['AppStatus']=='P'){$stA='Pending'; $clrA='#36006C';}elseif($res3E['AppStatus']=='A'){$stA='Submitted'; $clrA='#005300';}else{$stA='';}
		if($res3E['RevStatus']=='D'){$stR='Draft'; $clrR='#A40000';}elseif($res3E['RevStatus']=='P'){$stR='Pending'; $clrR='#36006C';}elseif($res3E['RevStatus']=='A'){$stR='Submitted'; $clrR='#005300';}else{$stR='';} 
	  
	  } 		
?>	  	   
   <td class="td2" style="color:<?php echo $clrE;?>;"><?php echo $stE;?></td>
   <td class="td2" style="color:<?php echo $clrA;?>;"><?php echo $stA;?></td>
   <td class="td2" style="color:<?php echo $clrR;?>;"><?php echo $stR;?></td>   
   <td class="td2"><?php if($res3E['EmpStatus']=='A'){ ?><a href="#" onClick="EmpKRA(<?php echo $CompanyId.', '.$resSY['CurrY'].', '.$res['EmployeeID']; ?>)">Click</a><?php } ?></td> 
   <td class="td2" style="background-color:#9FCFFF;"><input type="checkbox" style="height:10px;" name="AllowKRA_<?php echo $no; ?>" id="AllowKRA_<?php echo $no; ?>" <?php if($res['ExtraAllowKRA']==1){echo 'checked';}?> onClick="Click(<?php echo $resSY['CurrY']; ?>,<?php echo $res['EmployeeID'].','.$no; ?>)" /></td>
   
   <td class="td2" id="TDD_<?php echo $no; ?>" style="background-color:<?php if($res['UnLckKRA']==1){echo '#FFAAFF';}else{echo '#FFFF80';}?>;"><input type="checkbox" style="height:10px;" name="UnLckKRA_<?php echo $no; ?>" id="UnLckKRA_<?php echo $no; ?>" <?php if($res['UnLckKRA']==1){echo 'checked';}?> onClick="FunUnLckKRA(<?php echo $resSY['CurrY']; ?>,<?php echo $res['EmployeeID'].','.$no; ?>)" /></td>
  </tr>
<?php $no++;} } ?> 
 </table>
 </td>
</tr> 

<?php } elseif($_REQUEST['action']=='AllowPms'){ ?>	
<tr>
 <td>
 <table border="1" width="700">
  <tr>
   <td class="td1" colspan="13" style="background-color:#0069D2;font-weight:bold;">&nbsp;Allow PMS :&nbsp;&nbsp;(<?php if($_REQUEST['value']=='App'){ echo 'Appraiser'; }elseif($_REQUEST['value']=='Rev'){ echo 'Reviewer'; }elseif($_REQUEST['value']=='Hod'){ echo 'HOD'; }?>)&nbsp;&nbsp;&nbsp;</td>
  </tr>
  <tr bgcolor="#7a6189">
    <td class="td1" style="width:40px;"><b>SNo.</b></td>
    <td class="td1" style="width:60px;"><b>EmpCode</b></td>
	<td class="td1" style="width:150px;"><b>Department</b></td>
    <td class="td1" style="width:250px;"><b>Name</b></td>
	<td class="td1" style="width:80px;"><b>Extra Time</b></td>
  </tr>
<?php if($_REQUEST['value']=='App'){ $sql=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, DepartmentCode, Appraiser_EmployeeID from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_employee_pms p on e.EmployeeID=p.Appraiser_EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId where p.AssessmentYear=".$resSY['CurrY']." AND e.EmpStatus='A' AND e.CompanyId=".$CompanyId." group by Appraiser_EmployeeID order by e.EmpCode asc",$con); }

      elseif($_REQUEST['value']=='Rev') { $sql=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, DepartmentCode, Reviewer_EmployeeID from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_employee_pms p on e.EmployeeID=p.Reviewer_EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId where p.AssessmentYear=".$resSY['CurrY']." AND e.EmpStatus='A' AND e.CompanyId=".$CompanyId." group by Reviewer_EmployeeID order by e.EmpCode asc",$con); }
	  
	  elseif($_REQUEST['value']=='Hod') { $sql=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, DepartmentCode, HOD_EmployeeID from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_employee_pms p on e.EmployeeID=p.HOD_EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId where p.AssessmentYear=".$resSY['CurrY']." AND e.EmpStatus='A' AND e.CompanyId=".$CompanyId." group by HOD_EmployeeID order by e.EmpCode asc",$con); }

	 $no=1; while($res=mysql_fetch_array($sql)){  
	 if($_REQUEST['value']=='App'){ $Nmn='Appraiser_EmployeeID'; } 
	 elseif($_REQUEST['value']=='Rev'){ $Nmn='Reviewer_EmployeeID'; }
	 elseif($_REQUEST['value']=='Hod'){ $Nmn='HOD_EmployeeID'; }
	 $sqlCh=mysql_query("select * from hrm_pms_allowkra where ".$Nmn."=".$res['EmployeeID']." AND CompanyId=".$CompanyId." AND AssesmentYear=".$resSY['CurrY']."", $con);	$RowCh=mysql_num_rows($sqlCh);
?>

  <tr id="TR_<?php echo $no;?>" bgcolor="<?php if($RowCh>0){echo '#2C9326';}else{echo '#FFFFFF';}?>" >
   <td class="td2"><?php echo $no; ?></td>
   <td class="td2"><?php echo $res['EmpCode']; ?></td> 
   <td class="td2"><?php echo strtolower($res['DepartmentCode']); ?></td>
   <td class="td3">&nbsp;<?php echo strtolower($res['Fname'].' '.$res['Sname'].' '.$res['Lname']); ?></td>
   <td class="td2" style="background-color:#9FCFFF;"><?php if($_SESSION['User_Permission']=='Edit'){ ?><input type="checkbox" style="height:10px;" name="AllowKRA_<?php echo $no; ?>" id="AllowKRA_<?php echo $no; ?>" <?php if($RowCh>0){echo 'checked';}?> onClick="AppRevClick(<?php echo $res['EmployeeID'].','.$CompanyId.','.$resSY['CurrY'].','.$no; ?>,'<?php echo $_REQUEST['value']; ?>')" /><?php } ?></td>
  </tr>
  <?php $no++;} ?> 
 </table>
 </td>
</tr> 
<?php } ?>
  </table>
  </td>
 </tr> 
<?php //---------------------Close Record---------------------------------------------- ?>

	   </table>
     </tr>
	 <tr>
 </tr> 
</table>
		 </td> 
	   </tr>
	 </table>
   </td>
 </tr>

		   </table>
		    </form>  		
		</td>
        <?php } ?>
		<?php //-------------------------------------------------------------------------------------------------------- ?>
		<td align="left" width="20%">&nbsp;</td>
	</tr>
</table>
<?php //*********************************************************************************?>
<?php //**********************END*****END*****END******END******END**************************?>
<?php //*******************************************************************************************?>

	  </td>
	</tr>
	<tr>
	  <td valign="top">
	    <?php require_once("../footer.php"); ?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>