<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}

$mkdate = mktime(0,0,0, $_REQUEST['m'], 1, $_REQUEST['Y']);
$days = date('t',$mkdate);  //Number of days in the given month (28-31)
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.htf{font-family:Times New Roman;;color:#000;font-weight:bold;text-align:center;font-size:18px;height:24px;}
.htf2{font-family:Times New Roman;;color:#000;font-weight:bold;text-align:center;font-size:12px;}
.tdf{ font-family:Times New Roman;font-size:12px;color:#000000;}
.tdft{ background-color:#FFFF9D;font-family:Times New Roman;font-size:14px;color:#000000;}
.tdf2{background-color:#FFFFC4;font-family:Times New Roman;;font-size:12px;text-align:center;}
.tdf22{background-color:#CFF48A;font-family:Times New Roman;;font-size:12px;text-align:center;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px; height:20px;}
.EditInput { font-family:Georgia; font-size:12px; height:20px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.tdfsel{ background-color:#FFFFFF;font-family:Times New Roman;font-size:14px;color:#000000; border:hidden;}
.inner_table{height:450px;overflow-y:auto;width:auto;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/MasterAjaxCall.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<script type="text/javascript" language="javascript">
$(document).ready(function () { $("#table1").freezeHeader({ 'height': '450px' }); })
/*function SelectMonth(value) 
{ var da = document.getElementById("da").value; var D = document.getElementById("Department").value; var Y = document.getElementById("Year").value; 
  var x = 'AttMorEve.php?m='+value+'&D='+D+'&Y='+Y+'&da='+da+"&yy=4%rer&uu=true&rr=false"; window.location=x;}
								  
function SelectMonthDept(value)
{ var da = document.getElementById("da").value; var M = document.getElementById("Month").value; var Y = document.getElementById("Year").value;  
  var x = 'AttMorEve.php?m='+M+'&D='+value+'&Y='+Y+'&da='+da+"&yy=4%rer&uu=true&rr=false"; window.location=x; }
  
function SelectDate(value)
{ var D = document.getElementById("Department").value; var M = document.getElementById("Month").value; var Y = document.getElementById("Year").value;  
  var x = 'AttMorEve.php?m='+M+'&D='+D+'&Y='+Y+'&da='+value+"&yy=4%rer&uu=true&rr=false"; window.location=x; }  
  
function SelectYear(value)
{ var D = document.getElementById("Department").value; var M = document.getElementById("Month").value; 
  var da = document.getElementById("da").value;  var Y = document.getElementById("Year").value;  
  var x = 'AttMorEve.php?m='+M+'&D='+D+'&Y='+value+'&da='+da+"&yy=4%rer&uu=true&rr=false"; window.location=x; }*/ 
  
function FunClick()  
{
 if(document.getElementById("da").value==''){alert("select day!"); return false;}
 else if(document.getElementById("Month").value==''){alert("select month!"); return false;}
 else if(document.getElementById("Year").value==''){alert("select year!"); return false;}
 else if(document.getElementById("Department").value==''){alert("select department!"); return false;}
 else{  window.location='AttMorEve.php?m='+document.getElementById("Month").value+'&D='+document.getElementById("Department").value+'&Y='+document.getElementById("Year").value+'&da='+document.getElementById("da").value+'&yy=4%rer&uu=true&rr=false&accttc=showresult'; }
}     

function ClickEdit(ei,m,y)
{ document.getElementById(ei+"_BtnEdit").style.display='none'; document.getElementById(ei+"_BtnSave").style.display='block'; 
  document.getElementById("btnTd_"+ei).style.background='#59B300'; 
  document.getElementById("Att_"+ei).disabled=false; document.getElementById("Att_"+ei).readOnly=false; 
document.getElementById("UpAtt_"+ei).disabled=false; document.getElementById("UpAtt_"+ei).readOnly=false;  
document.getElementById("MorDate_"+ei).disabled=false; document.getElementById("MorDate_"+ei).readOnly=false; 
document.getElementById("MorRpt_"+ei).disabled=false; document.getElementById("MorRpt_"+ei).readOnly=false;
}

function ClickSave(ei,m,y,yi)
{  
   var MorRpt=document.getElementById("MorRpt_"+ei).value; 
   var s_MorRpt=MorRpt.replace(/[^a-zA-Z0-9 -]/g, "");  
   var M2=document.getElementById("M2").value; var ss_MorRpt=s_MorRpt.replace(/\s+/g,' ').trim(); 
   document.getElementById("MorRpt_"+ei).value=ss_MorRpt;
   var url = 'AddMorRepAtt.php'; var pars = 'action=addMorRep&m='+m+'&y='+y+'&ei='+ei+'&Att='+document.getElementById("Att_"+ei).value+'&UpAtt='+document.getElementById("UpAtt_"+ei).value+'&MorDate='+document.getElementById("MorDate_"+ei).value+'&MorRpt='+ss_MorRpt+'&yi='+yi+'&RDate='+document.getElementById("RDate").value+'&Y2='+document.getElementById("Y2").value+'&YearId2='+document.getElementById("YearId2").value;  
   var myAjax = new Ajax.Request(
   url, { 	method: 'post', parameters:pars, onComplete: show_EditAttendance });
}

function show_EditAttendance(originalRequest)
{ document.getElementById('AttMsgSpan').innerHTML = originalRequest.responseText; 
  var ei=document.getElementById("ei").value; document.getElementById(ei+"_BtnEdit").style.display='block';
  document.getElementById(ei+"_BtnSave").style.display='none';
  document.getElementById("btnTd_"+ei).style.background='#FFFFFF';
}

function Click2Edit(ei,m,y)
{ document.getElementById(ei+"_Btn2Edit").style.display='none'; 
  document.getElementById(ei+"_Btn2Save").style.display='block'; 
  document.getElementById("btn2Td_"+ei).style.background='#59B300'; 
  document.getElementById("InnCnt_"+ei).disabled=false; document.getElementById("OuttCnt_"+ei).disabled=false; 
}

function Click2Save(ei,m,y,yi,InL,OutL,Af15,AttId,aIn,aOut,inn,outt,tapply,attv,relax,allow)
{  
   var url = 'AddMorRepAtt.php'; var pars = 'action=addTimeatt&m='+m+'&y='+y+'&ei='+ei+'&yi='+yi+'&RDate='+document.getElementById("RDate").value+'&InLate='+InL+'&OutLate='+OutL+'&Af15='+Af15+'&AttId='+AttId+'&InnCnt='+document.getElementById("InnCnt_"+ei).value+'&OuttCnt='+document.getElementById("OuttCnt_"+ei).value+'&aIn='+aIn+'&aOut='+aOut+'&inn='+inn+'&outt='+outt+'&tapply='+tapply+'&attv='+attv+'&relax='+relax+'&allow='+allow;  
   var myAjax = new Ajax.Request(
   url, { method: 'post', parameters:pars, onComplete: show_Edit2Attendance });
}

function show_Edit2Attendance(originalRequest)
{ document.getElementById('AttMsgSpan').innerHTML = originalRequest.responseText; 
  document.getElementById(document.getElementById("ei").value+"_Btn2Edit").style.display='block';
  document.getElementById(document.getElementById("ei").value+"_Btn2Save").style.display='none';
  document.getElementById("btn2Td_"+document.getElementById("ei").value).style.background='#FFFFFF';
  document.getElementById("InnCnt_"+document.getElementById("ei").value).disabled=true; 
  document.getElementById("OuttCnt_"+document.getElementById("ei").value).disabled=true;
}

function OpenRow(sn,n)
{
 if(n==1)
 {
  document.getElementById("RowSpan"+sn).style.display='block'; 
  document.getElementById("Idown"+sn).style.display='none'; document.getElementById("Iup"+sn).style.display='block';
 }
 else if(n==2)
 {
  document.getElementById("RowSpan"+sn).style.display='none';
  document.getElementById("Iup"+sn).style.display='none'; document.getElementById("Idown"+sn).style.display='block'; 
 }
 
}


function ExtRep(m,d,y)
{
 var win = window.open("AttMorEveExp.php?m="+m+"&d="+d+"&y="+y,"ExptForm","menubar=no,scrollbars=no,resizable=no,directories=no,width=50,height=50"); 
}

</script> 
</head>
<body class="body">
<table class="table" border="0">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top" align="left"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow">
<?php //************************************************************************************?>
<?php //*************START*****START*****START******START******START***************************?>
<?php //*******************************************************************?>
<table border="0" style="margin-top:0px; width:100%; height:350px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td style="width:320px;" align=""><font color="#2D002D" style='font-family:Times New Roman;' size="4">
	  <b>Mor-Eve Attendance Entry with Timing :</b></font>  <span id="AttMsgSpan"></span></td>
	  <td class="td1" style="font-size:11px; width:50px;" align="left">
      <select style="font-size:12px; width:50px; height:20px; background-color:#DDFFBB; display:block;" name="da" id="da" onChange="SelectDate(this.value)"><option value="<?php echo $_REQUEST['da']; ?>"><?php echo $_REQUEST['da']; ?></option><?php for($i=1;$i<=$days;$i++){?><option value="<?php echo sprintf('%02d',$i);?>"><?php echo sprintf('%02d',$i);?></option><?php } ?></select>
      </td>	  
	  <td class="td1" style="font-size:11px; width:100px;" align="left">
      <select style="font-size:12px; width:100px; height:20px; background-color:#DDFFBB; display:block;" name="Month" id="Month" onChange="SelectMonth(this.value)"><option value="<?php echo $_REQUEST['m']; ?>"><?php if($_REQUEST['m']==1){echo 'JANUARY';}elseif($_REQUEST['m']==2){echo 'FEBRUARY';}elseif($_REQUEST['m']==3){echo 'MARCH';}elseif($_REQUEST['m']==4){echo 'APRIL';}elseif($_REQUEST['m']==5){echo 'MAY';}elseif($_REQUEST['m']==6){echo 'JUNE';}elseif($_REQUEST['m']==7){echo 'JULY';}elseif($_REQUEST['m']==8){echo 'AUGUST';}elseif($_REQUEST['m']==9){echo 'SEPTEMBER';}elseif($_REQUEST['m']==10){echo 'OCTOBER';}elseif($_REQUEST['m']==11){echo 'NOVEMBER';}elseif($_REQUEST['m']==12){echo 'DECEMBER';}; ?></option><?php for($j=1;$j<=12;$j++){ ?><option value="<?php echo $j; ?>"><?php echo strtoupper(date("F",strtotime(date($_REQUEST['Y'].'-'.$j.'-01')))); ?></option><?php } ?>
	 </select>
      </td>
	  <td style="width:60px;"><select style="font-size:12px; width:60px; height:20px; background-color:#DDFFBB;" name="Year" id="Year" onChange="SelectYear(this.value)">
	  <option value="<?php echo $_REQUEST['Y']; ?>"><?php echo $_REQUEST['Y']; ?></option>
	  <?php for($i=date("Y"); $i>=2013; $i--){?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?></select></td> 
	  <td class="td1" style="font-size:11px;width:120px;">			   
	   <select style="font-size:11px; width:120px; height:19px; background-color:#DDFFBB; display:block;" name="Department" id="Department" onChange="SelectMonthDept(this.value)">
<?php if($_REQUEST['D']!='All') { $sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['D'], $con); $resD=mysql_fetch_assoc($sqlD); ?> 
	  <option value="<?php echo $_REQUEST['D']; ?>" style="margin-left:0px; background-color:#84D9D5;">&nbsp;<?php echo $resD['DepartmentCode']; ?></option><?php }else{ ?><option value="All" style="margin-left:0px; background-color:#84D9D5;">&nbsp;All</option><?php } ?>						   
	   <?php $SqlDepartment=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DeptStatus='A' order by DepartmentName ASC", $con); while($ResDepartment=mysql_fetch_array($SqlDepartment)) { ?><option value="<?php echo $ResDepartment['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDepartment['DepartmentCode'];?></option><?php } ?><option value="All">&nbsp;All</option></select>
	   <input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /> 
	   <input type="hidden" name="YearId" id="YearId" value="<?php echo $YearId; ?>" />
	   <input type="hidden" name="da" id="da" value="<?php echo $_REQUEST['da']; ?>" />
	  </td>
	  <td><input type="button" value="click" style="width:60px;" onClick="FunClick()" /></td>	
	  
	  <?php if($_REQUEST['D']>0){?>
	  <td style="color:#0000CC;text-decoration:underline;cursor:pointer;font-size:14px;font-family:Times New Roman;">
	   <span onClick="ExtRep(<?=$_REQUEST['m'].','.$_REQUEST['D'].','.$_REQUEST['Y']?>)">Export</span>
	  </td> 
	  <?php } ?>
	  
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { 

$ExpMonthDate=date('Y-m-d', strtotime("-2 months", strtotime(date("Y-m-d")))); $pp=strtotime($ExpMonthDate);
$ExpMonth=date('m', strtotime("-2 months", strtotime(date("Y-m-d"))));
$ExpYear=date('Y', strtotime("-2 months", strtotime(date("Y-m-d"))));


$BY=date("Y")-1;
if($_REQUEST['Y']>=date("Y"))
{ $AttTable='hrm_employee_attendance'; $AppLeaveTable='hrm_employee_applyleave'; 
  $AttTable2='hrm_employee_attendance_'.$_REQUEST['Y'];
}
elseif($_REQUEST['Y']==$BY AND date("m")=='01' AND $_REQUEST['m']==12)
{ $AttTable='hrm_employee_attendance'; $AppLeaveTable='hrm_employee_applyleave'; 
  $AttTable2='hrm_employee_attendance_'.$_REQUEST['Y'];
}
elseif($_REQUEST['Y']==$BY AND $_REQUEST['m']<12)
{ $AttTable='hrm_employee_attendance'; $AttTable2='hrm_employee_attendance_'.$_REQUEST['Y'];
  $AppLeaveTable='hrm_employee_applyleave_'.$_REQUEST['Y']; }
else
{$AttTable='hrm_employee_attendance'; $AppLeaveTable='hrm_employee_applyleave_'.$_REQUEST['Y']; 
 $AttTable2='hrm_employee_attendance_'.$_REQUEST['Y'];
}
?>	
 <tr>
  <td valign="top">
   <table border="1" id="table1" valign="top" style="width:100%;" cellspacing="0">
   <div class="thead">
   <thead>
<tr>
 <td colspan="6" class="tdf2"><b>General</b></td>
 <td rowspan="2" class="tdf2" style="width:40px;"><b>Edit</b></td>
 <td colspan="2" class="tdf2"><b>In</b></td>
 <td colspan="2" class="tdf2"><b>Out</b></td>
 <td colspan="5" class="tdf2"><b>Morning Reports</b></td>
 <td rowspan="2" class="tdf2" style="width:40px;"><b>More</b></td>
</tr>   
<tr>
 <td class="tdf2" style="width:20px;"><b>SN</b></td>
 <td class="tdf2" style="width:40px;"><b>EC</b></td>
 <td class="tdf2" style="width:150px;"><b>Name</b></td>
 <td class="tdf2" style="width:80px;"><b>Location</b></td>	
 <td class="tdf2" style="width:70px;"><b>Mobile 1</b></td>
 <td class="tdf2" style="width:70px;"><b>Mobile 2</b></td>		
  
   
 <td class="tdf2" style="width:40px;"><b>Allow</b></td>
 <td class="tdf2" style="width:40px;"><b>Time</b></td>
 <td class="tdf2" style="width:40px;"><b>Allow</b></td>
 <td class="tdf2" style="width:40px;"><b>Time</b></td>


 <td class="tdf2" style="width:40px;"><b>Edit</b></td>
 <td class="tdf2" style="width:40px;"><b>Att</b></td>
 <td class="tdf2" style="width:40px;"><b>Up</b></td>
 <td class="tdf2" style="width:80px;"><b>Date Time</b></td>
 <td class="tdf2" style="width:350px;"><b>Reports</b></td>
 
  
 
</tr>
 </thead>
 </div>
<?php 
if($_REQUEST['accttc']=='showresult')
{

if($_REQUEST['D']!='All'){ $sql=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname,TimeApply,InTime,OutTime,HqName,AttMobileNo1,AttMobileNo2,MobileNo_Vnr,p.MobileNo from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId where e.EmpStatus='A' AND g.DepartmentId=".$_REQUEST['D']." AND e.CompanyId=".$CompanyId." AND (e.DateOfSepration='0000-00-00' OR e.DateOfSepration='1970-01-01' OR e.DateOfSepration>='".date($_REQUEST['Y']."-".$_REQUEST['m']."-01")."') AND g.DateJoining<='".date($_REQUEST['Y']."-".$_REQUEST['m']."-31")."' order by EmpCode ASC", $con); }
      if($_REQUEST['D']=='All'){ $sql=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname,TimeApply,InTime,OutTime,HqName,AttMobileNo1,AttMobileNo2,MobileNo_Vnr,p.MobileNo from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND g.DepartmentId!=17 AND g.DepartmentId!=18 AND g.DepartmentId!=23 AND g.DepartmentId!=0 AND (e.DateOfSepration='0000-00-00' OR e.DateOfSepration='1970-01-01' OR e.DateOfSepration>='".date($_REQUEST['Y']."-".$_REQUEST['m']."-01")."') AND g.DateJoining<='".date($_REQUEST['Y']."-".$_REQUEST['m']."-31")."' order by EmpCode ASC", $con); }
$Sno=1; $rows=mysql_num_rows($sql); $sn=1; while($res=mysql_fetch_array($sql)) { 
$month=$_REQUEST['m']; $EId=$res['EmployeeID']; $m=$_REQUEST['m']; $y=$_REQUEST['Y'];

$sqlRpt=mysql_query("select * from hrm_employee_moreve_report_".$_REQUEST['Y']." where EmployeeID=".$res['EmployeeID']." AND MorEveDate='".$_REQUEST['Y']."-".$_REQUEST['m']."-".$_REQUEST['da']."'", $con);
$resRpt=mysql_fetch_assoc($sqlRpt); $rowRpt=mysql_num_rows($sqlRpt); 

$SqlAppL=mysql_query("SELECT * FROM ".$AppLeaveTable." WHERE EmployeeID=".$res['EmployeeID']." AND LeaveStatus!=3 AND LeaveStatus!=4 AND '".date($_REQUEST['Y']."-".$_REQUEST['m']."-".$_REQUEST['da'])."'>=Apply_FromDate AND '".date($_REQUEST['Y']."-".$_REQUEST['m']."-".$_REQUEST['da'])."'<=Apply_ToDate", $con);
$RowAppL=mysql_num_rows($SqlAppL); if($RowAppL>0){$resAppL=mysql_fetch_assoc($SqlAppL); }
?> 	
<form name="formEdit" method="post" onSubmit="return OvalidateEdit(this)">	 
<div class="tbody">
  <tbody>
<tr bgcolor="<?php if($sn%2==0){echo '#D9D1E7';}else{echo '#FFFFFF';} ?>">
 <td class="tdf" style=" text-align:center;"><?php echo $sn; ?>
 <input type="hidden" name="RDate" id="RDate" value="<?php echo $_REQUEST['Y']."-".$_REQUEST['m']."-".$_REQUEST['da']; ?>" /><input type="hidden" name="Y2" id="Y2" value="<?php echo $_REQUEST['Y']; ?>" /><input type="hidden" name="M2" id="M2" value="<?php echo $_REQUEST['m']; ?>" /><input type="hidden" name="YearId2" id="YearId2" value="<?php echo $YearId; ?>" /></td>
 <td class="tdf" style="text-align:center;"><?php echo $res['EmpCode']; ?></td>
 <td class="tdf"><input class="tdfsel" style="width:150px;background-color:<?php if($sn%2==0){echo '#D9D1E7';}else{echo '#FFFFFF';} ?>;" value="<?php echo ucfirst(strtolower($res['Fname'].' '.$res['Sname'].' '.$res['Lname'])); ?>" /></td>
 <td class="tdf"><input class="tdfsel" style="width:80px;background-color:<?php if($sn%2==0){echo '#D9D1E7';}else{echo '#FFFFFF';} ?>;" value="<?php echo ucfirst(strtolower($res['HqName'])); ?>" /></td>
 
 <td class="tdf" style="text-align:center;"><input class="tdf" style="width:68px;text-align:center;background-color:<?php if($sn%2==0){echo '#D9D1E7';}else{echo '#FFFFFF';} ?>;border:hidden;" value="<?php if($res['AttMobileNo1']>0 AND $res['AttMobileNo1']!=''){echo $res['AttMobileNo1'];}elseif($res['MobileNo_Vnr']>0 AND $res['MobileNo_Vnr']!=''){echo $res['MobileNo_Vnr'];}else{echo '';} ?>" /></td>
 <td class="tdf" style="text-align:center;"><input class="tdf" style="width:68px;text-align:center;background-color:<?php if($sn%2==0){echo '#D9D1E7';}else{echo '#FFFFFF';} ?>;border:hidden;" value="<?php if($res['AttMobileNo2']>0 AND $res['AttMobileNo2']!=''){echo $res['AttMobileNo2'];}elseif($res['MobileNo']>0 AND $res['MobileNo']!=''){echo $res['MobileNo'];}else{echo '';} ?>" /></td>
 
<?php /**************/ $d=intval($_REQUEST['da']); ?> 
<?php $s2E=mysql_query("select S".$d.", I".$d.", O".$d." from hrm_employee_attendance_settime where EmployeeID=".$res['EmployeeID'],$con); 
$r2E=mysql_fetch_assoc($s2E); ?>

<?php 
$tt=strtotime(date($_REQUEST['Y']."-".$_REQUEST['m']."-".$_REQUEST['da'])); 
if($tt<$pp){$tab=$AttTable2; }else{$tab=$AttTable; }

 $sAtt=mysql_query("select * from ".$tab." where EmployeeID=".$res['EmployeeID']." AND AttDate='".$_REQUEST['Y']."-".$_REQUEST['m']."-".$_REQUEST['da']."'", $con); 
$rowAtt=mysql_num_rows($sAtt); $rAtt=mysql_fetch_assoc($sAtt); ?>
<td align="center" id="btn2Td_<?php echo $EId; ?>" bgcolor="#FFFFFF"><?php if($rowAtt>0 AND ($rAtt['InnLate']>0 OR $rAtt['OuttLate']>0 OR $rAtt['Af15']>0)){ //AND date("m")==$_REQUEST['m'] ?>
<?php if($_SESSION['User_Permission']=='Edit'){?>
<img src="images/edit.png" border="0" id="<?php echo $EId; ?>_Btn2Edit" onClick="Click2Edit(<?php echo $EId.', '.$m.', '.$y; ?>)" style="display:block;"> <img src="images/save.gif" border="0" id="<?php echo $EId; ?>_Btn2Save" onClick="Click2Save(<?php echo $EId.', '.$m.', '.$y.', '.$YearId.','.$rAtt['InnLate'].','.$rAtt['OuttLate'].','.$rAtt['Af15'].','.$rAtt['AttId'];?>,'<?php echo $rAtt['Inn'];?>','<?php echo $rAtt['Outt'];?>','<?php echo $r2E['I'.$d];?>','<?php echo $r2E['O'.$d];?>','<?php echo $res['TimeApply']; ?>','<?php echo $rAtt['AttValue']; ?>','<?php echo $rAtt['Relax']; ?>','<?php echo $rAtt['Allow']; ?>')" style="display:none;">
<?php } ?>
<?php } ?></td> 
<td class="tdf" style="text-align:center;"><?php if($rowAtt>0 AND $rAtt['InnLate']>0){ ?>
 <select id="InnCnt_<?php echo $EId; ?>" style="width:40px;font-size:12px;height:20px;border:hidden;" disabled class="EditInput"><option value="<?php echo $rAtt['InnCnt']; ?>"><?php echo $rAtt['InnCnt']; ?></option><option value="<?php if($rAtt['InnCnt']=='Y'){echo 'N';}else{echo 'Y';} ?>"><?php if($rAtt['InnCnt']=='Y'){echo 'N';}else{echo 'Y';} ?></option></select><?php }else{ echo '<input type="hidden" id="InnCnt_'.$EId.'" value="Y" />';}  ?></td>
<td class="tdf" style="text-align:center;"><?php if($rowAtt>0){echo date("H:i",strtotime($rAtt['Inn']));}?></td>

<td class="tdf" style="text-align:center;"><?php if($rowAtt>0 AND $rAtt['OuttLate']>0){ ?>
 <select id="OuttCnt_<?php echo $EId; ?>" style="width:40px;font-size:12px;height:20px;border:hidden;" disabled class="EditInput"><option value="<?php echo $rAtt['OuttCnt']; ?>"><?php echo $rAtt['OuttCnt']; ?></option><option value="<?php if($rAtt['OuttCnt']=='Y'){echo 'N';}else{echo 'Y';} ?>"><?php if($rAtt['OuttCnt']=='Y'){echo 'N';}else{echo 'Y';} ?></option></select><?php }else{ echo '<input type="hidden" id="OuttCnt_'.$EId.'" value="Y" />';} ?></td> 
<td class="tdf" style="text-align:center;"><?php if($rowAtt>0){echo date("H:i",strtotime($rAtt['Outt']));}?></td>
<?php /**************/ ?>  
  
  
 <td bgcolor="<?php if($rowRpt>0 OR $rowAtt>0){echo '#FFFFFF';}else{echo '#59B300';} ?>" align="center" id="btnTd_<?php echo $EId; ?>">
 <?php $PreMonth=$ExpMDate=date('m', strtotime("-1 months", strtotime(date("Y-".date("m")."-d")))); ?>
 <?php if($_SESSION['User_Permission']=='Edit'){ if($_REQUEST['m']==date("m") OR $_REQUEST['m']==$PreMonth){ ?>
 <?php if((date("w",strtotime(date($_REQUEST['Y']."-".$_REQUEST['m']."-".$_REQUEST['da'])))!=0) AND $RowAppL==0){ ?>
<img src="images/edit.png" border="0" id="<?php echo $EId; ?>_BtnEdit" onClick="ClickEdit(<?php echo $EId.', '.$m.', '.$y; ?>)" style="display:<?php if($rowRpt>0 OR $rowAtt>0){echo 'block';}else{echo 'none';} ?>;"> <img src="images/save.gif" border="0" id="<?php echo $EId; ?>_BtnSave" onClick="ClickSave(<?php echo $EId.', '.$m.', '.$y.', '.$YearId; ?>)" style="display:<?php if($rowRpt>0 OR $rowAtt>0){echo 'none';}else{echo 'block';} ?>;">
<?php } ?>
<?php } } ?>
 </td>	
 <td class="tdf" style="text-align:center;"><?php if(date("w",strtotime(date($_REQUEST['Y']."-".$_REQUEST['m']."-".$_REQUEST['da'])))!=0){ ?><select id="Att_<?php echo $EId; ?>" style="border:hidden;width:40px;font-size:12px;height:20px;background-color:<?php if(date("w",strtotime(date($_REQUEST['Y'].'-'.$_REQUEST['m'].'-'.$_REQUEST['da'])))==0) { echo '#6B983A'; } elseif($RowAppL>0){ if($resAppL['LeaveStatus']==2){echo '#2D96FF';}else{echo '#FFD6C1';} } ?>;" class="EditInput" <?php if($rowRpt>0 OR $rowAtt>0){echo 'disabled';}else{echo '';} ?>><?php if($rowAtt>0){ ?><option value="<?php echo $rAtt['AttValue']; ?>"><?php echo $rAtt['AttValue']; ?></option><?php } if($rowRpt>0){ ?><option value="<?php echo $resRpt['Att']; ?>"><?php echo $resRpt['Att']; ?></option><?php } elseif($RowAppL>0){ ?><option value="<?php echo $resAppL['Leave_Type']; ?>"><?php echo $resAppL['Leave_Type']; ?></option><?php }else{ ?><option value="P">P</option><?php } ?><option value="P">P</option><option style="background-color:#FAD6CF;" value="A">A</option><option value="HF">HF</option><option style="background-color:#F8FBBB;" value="CL">CL</option><option style="background-color:#F8FBBB;" value="SL">SL</option><option style="background-color:#F8FBBB;" value="PL">PL</option><option style="background-color:#F8FBBB;" value="EL">EL</option><option style="background-color:#F8FBBB;" value="CH">CH</option><option style="background-color:#F8FBBB;" value="SH">SH</option><option style="background-color:#F8FBBB;" value="PH">PH</option><option style="background-color:#FFA4D1;" value="OD">OD</option><option style="background-color:#A9D3F5;" value="HO">HO</option><option style="background-color:#F8FBBB;" value="FL">FL</option><option style="background-color:#F8FBBB;" value="TL">TL</option><option style="background-color:#FFFFFF;" value="ACH">ACH</option><option style="background-color:#FFFFFF;" value="ASH">ASH</option><option style="background-color:#FFFFFF;" value="APH">APH</option><option style="background-color:#FFFFFF;" value="WFH">WFH</option><option style="background-color:#FFFFFF;" value="COV">COV</option><option style="background-color:#FFFFFF;" value=""></option></select><?php } ?></td>
 
 <td class="tdf" style="text-align:center;"><?php if(date("w",strtotime(date($_REQUEST['Y']."-".$_REQUEST['m']."-".$_REQUEST['da'])))!=0){ ?><select id="UpAtt_<?php echo $EId; ?>" style="border:hidden;width:40px;font-size:12px;height:20px;" class="EditInput" <?php if($rowRpt>0 OR $rowAtt>0 OR $RowAppL!=0){echo 'disabled';}else{echo '';} ?>><?php if($rowRpt>0){?><option value="<?php echo $resRpt['UpAtt']; ?>"><?php if($resRpt['UpAtt']=='N'){echo 'N';}else{echo 'Y';} ?></option><option value="<?php if($resRpt['UpAtt']=='N'){echo 'Y';}else{echo 'N';} ?>"><?php if($resRpt['UpAtt']=='N'){echo 'Y';}else{echo 'N';} ?></option><?php } else {?><option value="Y">Y</option><option value="N">N</option></select><?php } } ?></td> 
  
 <td class="tdf" style="text-align:center;"><input id="MorDate_<?php echo $EId; ?>" style="width:78px;border:hidden;background-color:<?php if($sn%2==0){echo '#D9D1E7';}else{echo '#FFFFFF';} ?>;" class="EditInput" value="<?php echo $resRpt['MorDateTime']; ?>" onChange="removeSpaces(this.value)" onKeyDown="removeSpaces(this.value)" onBlur="removeSpaces(this.value)" <?php if($rowRpt>0){echo 'readonly';}else{echo '';} ?>/></td>	
 <td class="tdf" style="text-align:center;"><input id="MorRpt_<?php echo $EId; ?>" style="width:350px;border:hidden;background-color:<?php if($sn%2==0){echo '#D9D1E7';}else{echo '#FFFFFF';} ?>;" class="EditInput" value="<?php echo $resRpt['MorReports']; ?>" <?php if($rowRpt>0){echo 'readonly';}else{echo '';} ?>/></td> 
 <td align="center" style="cursor:pointer;">
  <img src="images/ADown.png" id="Idown<?=$sn?>" onClick="OpenRow(<?=$sn?>,1)">
  <img src="images/AUp.png" id="Iup<?=$sn?>" style="display:none;" onClick="OpenRow(<?=$sn?>,2)">
 </td>	
</tr>
<td style="vertical-align:top;" colspan="17">
 <div id="RowSpan<?=$sn?>" style="display:none;">
 <table border="1" style="width:100%;" cellspacing="0">
  <tr>
   <td colspan="2" class="tdf22"><b>Evening Reports</b></td>
   <td colspan="3" class="tdf22"><b>Sign-In Details</b></td>
   <td colspan="3" class="tdf22"><b>Sign-Out Details</b></td>
  </tr>
  <tr>
   <td class="tdf22" style="width:100px;"><b>DateTime</b></td>
   <td class="tdf22" style="width:250px;"><b>Remark</b></td>
   <td class="tdf22" style="width:100px;"><b>Time</b></td>
   <td class="tdf22" style="width:250px;"><b>Location</b></td>
   <td class="tdf22" style="width:50px;"><b>GPS</b></td>
   <td class="tdf22" style="width:100px;"><b>Time</b></td>
   <td class="tdf22" style="width:250px;"><b>Location</b></td>
   <td class="tdf22" style="width:50px;"><b>GPS</b></td>
  </tr>
  <tr style="background-color:#FFFFFF;">
   <td class="tdf" style=" text-align:center;"><?php echo $resRpt['EveDateTime']; ?></td>
   <td class="tdf"><?php echo $resRpt['EveReports']; ?></td>
   <td class="tdf" style="text-align:center;"><?php echo $resRpt['SignIn_Time']; ?></td>
   <td class="tdf"><?php echo $resRpt['SignIn_Loc']; ?></td>
   <td class="tdf" style="text-align:center;"><?php if($resRpt['SignIn_Lat']!='' && $resRpt['SignIn_Long']!=''){ ?><a href="https://maps.google.com/?q=<?=$resRpt['SignIn_Lat']?>,<?=$resRpt['SignIn_Long']?>" target="_blank">click</a><?php } ?></td>
   <td class="tdf" style="text-align:center;"><?php echo $resRpt['SignOut_Time']; ?></td>
   <td class="tdf"><?php echo $resRpt['SignOut_Loc']; ?></td>
   <td class="tdf" style="text-align:center;"><?php if($resRpt['SignOut_Lat']!='' && $resRpt['SignOut_Long']!=''){ ?><a href="https://maps.google.com/?q=<?=$resRpt['SignOut_Lat']?>,<?=$resRpt['SignOut_Long']?>" target="_blank">click</a><?php } ?></td>
   
  </tr>
 </table>
 </div>
</td>
<tr>
 <td></td>
</tr>
</tbody>
</div>
</form>
<?php $sn++; } ?>
<?php } ?>
<tr>
  <td align="left" class="fontButton" style="width:100%;" colspan="17">
    <table border="0">
     <tr>
	  <td align="left"><input type="button" name="back" id="back" style="width:90px;display:block;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"></td>
   </tr>
   </table>
  </td>
 </tr>
<?php } ?> 
</table>
		
<?php //*********************************************************************?>
<?php /*********************END*****END*****END******END******END***************************/ ?>
<?php //***************************************************************************?>
		
	  </td>
	</tr>
	
	<?php /*?><tr>
	  <td valign="top" align="center">
	    <table border="0" style="margin-top:0px;">
				<tr>
	              <td align="center"><img src="images/home1.png"></td>
				</tr>
	    </table>
	  </td>
	</tr>
	<tr>
	  <td valign="top">
	    <?php require_once("../footer.php"); ?>
	  </td>
	</tr><?php */?>
  </table>
 </td>
</tr>
</table>
</body>
</html>