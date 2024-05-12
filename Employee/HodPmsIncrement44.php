<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
include("SetKraPmsy.php");
/******************************************************************************/
$sql22=mysql_query("select e.EmpCode,e.EmployeeID from hrm_employee e INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$YearId." AND p.HOD_EmployeeID=".$EmployeeId, $con); 
while($res22=mysql_fetch_array($sql22))
{    				
 $sqlM = mysql_query("SELECT MAX(SalaryChange_Date) as SalaryChDate FROM hrm_pms_appraisal_history where SalaryChange_Date!='".date("Y-10-01")."' AND EmpCode=".$res22['EmpCode']." AND CompanyId=".$CompanyId, $con); 
 $resM = mysql_fetch_assoc($sqlM);
 $sqlAmt=mysql_query("select Previous_GrossSalaryPM, Incentive from hrm_pms_appraisal_history where SalaryChange_Date='".$resM['SalaryChDate']."' AND EmpCode=".$res22['EmpCode']." AND CompanyId=".$CompanyId, $con); 
 $resAmt=mysql_fetch_assoc($sqlAmt); 
}

$SqlCount=mysql_query("select SUM(EmpCurrGrossPM) as Old_GROSS, SUM(EmpCurrIncentivePM) as Old_Inc, SUM(Hod_ProIncSalary) as H_IS, SUM(Hod_ProCorrSalary) as H_SC, SUM(Hod_Incentive) as H_Inc from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$YearId." AND hrm_employee_pms.HOD_EmployeeID=".$EmployeeId, $con); 
$sno=1; $ResCount=mysql_fetch_array($SqlCount);

$TotEGross=$ResCount['Old_GROSS']+$ResCount['Old_Inc']; 
$TotHIS=$ResCount['H_IS']+$ResCount['H_Inc']; $TotHSC=$ResCount['H_SC'];
$Diff=$TotHIS-$TotEGross; $TotHInC=$Diff+$ResCount['H_SC']; $TotHMonthGS=$TotHIS+$ResCount['H_SC'];
$One=($TotEGross*1)/100; $OnePerPre=number_format($One, 2, '.', ''); 
$TotOldGrossPM=number_format($TotEGross, 2, '.', '');
$TotNewGrossPM=number_format($TotHMonthGS, 2, '.', '');
$Increment=number_format($TotHInC, 2, '.', '');
$IncPer=$TotHInC/$OnePerPre; $PerInc=number_format($IncPer, 2, '.', '');
$TotalPerPIS=$Diff/$OnePerPre; $TotalTPerPIS=number_format($TotalPerPIS, 2, '.', '');
$TotalPerPSC=$ResCount['H_SC']/$OnePerPre; $TotalTPerPSC=number_format($TotalPerPSC, 2, '.', '');
$INCPer=$ResCount['H_Inc']/$OnePerPre;

$sqlSet=mysql_query("select EffectedDate2,AllowEmpDoj from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='PMS'", $con); $resSet=mysql_fetch_array($sqlSet); $EffDate=$resSet['EffectedDate2']; $AllowDoj=$resSet['AllowEmpDoj'];
$Prev_From_EffDate=date("Y-m-d",strtotime('-1 day', strtotime($resSet['EffectedDate2']))); 

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<style>.font {color:#000; font-family:Times New Roman; font-size:15px; font-weight:bold;} 
.Input{font-family:"Times New Roman", Times, serif; font-size:14px; height:22px;border-style:hidden; border-bottom-color:#FFFFFF; border-left-color:#FFFFFF; border-right-color:#FFFFFF; border-top-color:#FFFFFF; border:0;}.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;} .font1 { font-family:Georgia; font-size:11px; height:14px; } .font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
.td1{ text-align:center;font-family:Times New Roman;color:#FFFFFF;font-size:14px;font-weight:bold; }
.td1l{ font-family:Times New Roman;color:#FFFFFF;font-size:14px;font-weight:bold; }
.td2{ text-align:center;font-family:Times New Roman;font-size:12px; }
.td3{ font-family:Times New Roman;font-size:12px; }
.td22{ text-align:center;font-family:Times New Roman;font-size:14px; }
.td33{ font-family:Times New Roman;font-size:14px; }
</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">		
function ClickEdit(Sno,EI,v)
{
  document.getElementById("ProGSPM_"+Sno).disabled=false; document.getElementById("ProSC_"+Sno).disabled=false; 
  if(v==0){document.getElementById("ProGSPM_"+Sno).readOnly=true;}
  document.getElementById("SpanEdit_"+Sno).style.display='none';  
  document.getElementById("SpanEditSave_"+Sno).style.display='block'; 
  document.getElementById("msg_"+Sno).style.display='none'; 
  document.getElementById("TDD1_"+Sno).style.backgroundColor='#9FCFFF';
  document.getElementById("ProGSPM_"+Sno).style.backgroundColor='#9FCFFF';
  document.getElementById("TDD2_"+Sno).style.backgroundColor='#9FCFFF';
  document.getElementById("ProSC_"+Sno).style.backgroundColor='#9FCFFF';
  var IncenCheck = document.getElementById("IncenCheck_"+Sno).value; 
  
  if(IncenCheck=='Y')
  { 
   document.getElementById("EmpInctv"+Sno).disabled=false; 
   document.getElementById("EmpInctv"+Sno).style.backgroundColor='#9FCFFF'; 
  }
  var NewGross = parseFloat(document.getElementById("NewGross_"+Sno).value);
  var GrossAmt = document.getElementById("ProGSPM_"+Sno).value=Math.round((NewGross)*100)/100;
  CalProInc(Sno);
}

function CalProInc(Sno)
{ 
var ProGSPM = parseFloat(document.getElementById("ProGSPM_"+Sno).value);
var Per_ProGSPM = parseFloat(document.getElementById("Per_ProGSPM_"+Sno).value);
var ProSC = parseFloat(document.getElementById("ProSC_"+Sno).value);
var TotalProGSPM = parseFloat(document.getElementById("TotalProGSPM_"+Sno).value);
var Per_TotalProGSPM = parseFloat(document.getElementById("Per_TotalProGSPM_"+Sno).value);
var GS = parseFloat(document.getElementById("GS_"+Sno).value); 
var MinV = parseFloat(document.getElementById("MinV_"+Sno).value); 
var MaxV = parseFloat(document.getElementById("MaxV_"+Sno).value); 
var OnePerPre = parseFloat(document.getElementById("OnePerPre").value);
var ETIncG = parseFloat(document.getElementById("EmpTTIncGross"+Sno).value);
var ETIncGP = parseFloat(document.getElementById("EmpTTIncGrossPercent"+Sno).value);
var ETPISP = parseFloat(document.getElementById("EmpTTPISPercent"+Sno).value);
var ETSCGP = parseFloat(document.getElementById("EmpTTSCPercent"+Sno).value); 
var Cal_OnePer = Math.round(((GS*1)/100)*100)/100;  
var Cal_MinGSV = document.getElementById("Cal_MinGSV"+Sno).value=Math.round((ProGSPM-GS)*100)/100;
var Cal_Per_ProInc = document.getElementById("Per_ProGSPM_"+Sno).value=Math.round((Cal_MinGSV/Cal_OnePer)*100)/100; 
var Cal_Per_ProSC = document.getElementById("Per_SalaryCorr"+Sno).value=Math.round((ProSC/Cal_OnePer)*100)/100; 
var Cal_TotGSPM = document.getElementById("TotalProGSPM_"+Sno).value=Math.round((ProGSPM+ProSC)*100)/100; 
var Cal_Per_TotGSPM = document.getElementById("Per_TotalProGSPM_"+Sno).value=Math.round((Cal_Per_ProInc+Cal_Per_ProSC)*100)/100;
var Cal_IncGrossAnnual = document.getElementById("TotalAnnualSalary"+Sno).value=Math.round((Cal_TotGSPM*12)*100)/100;
var Cal_IncGrossMonthalySalary = document.getElementById("IncSalaryPM"+Sno).value=Math.round((Cal_MinGSV+ProSC)*100)/100;
var Cal_ETIncG = document.getElementById("EmpTTIncGross"+Sno).value=Math.round((Cal_MinGSV+ProSC)*100)/100;
var Cal_ETIncGP = document.getElementById("EmpTTIncGrossPercent"+Sno).value=Math.round((Cal_ETIncG/OnePerPre)*100)/100;
var Cal_ETPISP = document.getElementById("EmpTTPISPercent"+Sno).value=Math.round((Cal_MinGSV/OnePerPre)*100)/100;
var Cal_ETSCGP = document.getElementById("EmpTTSCPercent"+Sno).value=Math.round((ProSC/OnePerPre)*100)/100;
var IncenCheck = document.getElementById("IncenCheck_"+Sno).value; 
if(IncenCheck=='Y') {var EmpInctv = parseFloat(document.getElementById("EmpInctv"+Sno).value); 
var Per_EmpInctv = document.getElementById("IncentivePer"+Sno).value=Math.round((EmpInctv/Cal_OnePer)*100)/100; 
var TotalPay = document.getElementById("TotalPay"+Sno).value=Math.round((EmpInctv+Cal_TotGSPM)*100)/100; }
var TotIncrement = document.getElementById("TotIncrement"+Sno).value=Math.round((Cal_Per_TotGSPM+Per_EmpInctv)*100)/100; //TotalPay
}

function ClickSaveEdit(No,PmsId,EmpId,C,Y,HE)
{ var ProGSPM=document.getElementById("ProGSPM_"+No).value; var Per_ProGSPM=document.getElementById("Per_ProGSPM_"+No).value;
  var ProSC=document.getElementById("ProSC_"+No).value; var TotalProGSPM=document.getElementById("TotalProGSPM_"+No).value; 
  var Per_TotalProGSPM=document.getElementById("Per_TotalProGSPM_"+No).value; 
  var ComId=document.getElementById("ComId").value; var MinV=parseFloat(document.getElementById("MinV_"+No).value); 
  var MaxV=parseFloat(document.getElementById("MaxV_"+No).value);
  var Per_ProSC=document.getElementById("Per_SalaryCorr"+No).value; 
  var IncSalaryPM=document.getElementById("IncSalaryPM"+No).value; 
  var TotalAnnualSalary=document.getElementById("TotalAnnualSalary"+No).value; 
  var Cal_MinGSV=document.getElementById("Cal_MinGSV"+No).value;
  var ETIncGP = document.getElementById("EmpTTIncGrossPercent"+No).value; 
  var ETPISP = document.getElementById("EmpTTPISPercent"+No).value;
  var ETSCGP = document.getElementById("EmpTTSCPercent"+No).value; 
  var MTPreG = document.getElementById("MyTTPreGross").value; var OnePerPre = document.getElementById("OnePerPre").value; 
  var UpDesigId = document.getElementById("UpDesigId_"+No).value; 
  var IncenCheck = document.getElementById("IncenCheck_"+No).value; 
  var IncentivePer = document.getElementById("IncentivePer"+No).value; 
  var Extra3Month = document.getElementById("Extra3Month"+No).value; 
  if(IncenCheck=='Y'){var EmpInctv = document.getElementById("EmpInctv"+No).value;}
  if(IncenCheck=='N'){var EmpInctv = 0.00;} var Numfilter=/^[0-9. ]+$/;  var test_num = Numfilter.test(EmpInctv);
  if(test_num==false) { alert('Please check incentive!'); return false; }

  var Per_SC=parseFloat(document.getElementById("Per_SalaryCorr"+No).value);   //alert(Per_SC);
  var Per_AG=parseFloat(document.getElementById("ActualPer_Gross_"+No).value); //alert(Per_AG);
  var ActualPer=Math.round((Per_SC+Per_AG)*100)/100; //alert(ActualPer);	
 
  var agree=confirm("Are you sure you want to save data?"); 
  if (agree) { 
  var url = 'NormalizedInc.php'; var pars = 'ProGSPM='+ProGSPM+'&PmsId='+PmsId+'&EmpId='+EmpId+'&Per_ProGSPM='+Per_ProGSPM+'&ProSC='+ProSC+'&Per_ProSC='+Per_ProSC+'&TotalProGSPM='+TotalProGSPM+'&Per_TotalProGSPM='+Per_TotalProGSPM+'&IncSalaryPM='+IncSalaryPM+'&TotalAnnualSalary='+TotalAnnualSalary+'&No='+No+'&ETIncGP='+ETIncGP+'&ETPISP='+ETPISP+'&ETSCGP='+ETSCGP+'&C='+C+'&Y='+Y+'&HE='+HE+'&MTPreG='+MTPreG+'&OnePerPre='+OnePerPre+'&EmpInctv='+EmpInctv+'&IncentivePer='+IncentivePer+'&ActualPer='+ActualPer+'&Extra3Month='+Extra3Month;  
  var myAjax = new Ajax.Request(
  url, { 	method: 'post', parameters: pars, onComplete: show_IncNormalized });
  return true; } else {return false;}
}
function show_IncNormalized(originalRequest)
{ document.getElementById("msg").innerHTML = originalRequest.responseText; var Sno=document.getElementById("NoId").value; 
  var TPGrossPM=document.getElementById("TPGrossPM").value; var IGrossS=document.getElementById("IGrossS").value; 
  var PIGrossS=document.getElementById("PIGrossS").value;  var TPPIS=document.getElementById("TPPIS").value; 
  var TPPSC=document.getElementById("TPPSC").value; 
  document.getElementById("MyTTProGross").value=TPGrossPM; document.getElementById("MyTTIncGross").value=IGrossS;
  document.getElementById("MyTTIncGrossPercent").value=PIGrossS; document.getElementById("MyTTPISPercent").value=TPPIS;
  document.getElementById("MyTTSCPercent").value=TPPSC; document.getElementById("msg_"+Sno).style.display='block';
  document.getElementById("SpanEdit_"+Sno).style.display='block'; 
  document.getElementById("SpanEditSave_"+Sno).style.display='none';
  document.getElementById("ProGSPM_"+Sno).disabled=true; document.getElementById("ProSC_"+Sno).disabled=true;
  document.getElementById("TDD1_"+Sno).style.backgroundColor='#B9FFB9';
  document.getElementById("ProGSPM_"+Sno).style.backgroundColor='#B9FFB9'; 
  document.getElementById("TDD1_"+Sno).style.backgroundColor='#B9FFB9';
  document.getElementById("ProSC_"+Sno).style.backgroundColor='#B9FFB9'; 
  document.getElementById("FinalSubmit_"+Sno).disabled=false;
}

function FinalSubmit(No,PmsId,EmpId)
{
  var agree=confirm("Are you sure you want to submit data?"); 
  if(agree) 
  {
   var url = 'NormalizedInc.php'; var pars = 'action=submit&PmsId='+PmsId+'&EmpId='+EmpId+'&No='+No; 
   var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_SubIncNormalized });
   return true; 
  } 
  else{ return false; }
}
function show_SubIncNormalized(originalRequest)
{ document.getElementById("msg").innerHTML = originalRequest.responseText; var Sno=document.getElementById("NoId").value; 
  document.getElementById("msg_"+Sno).style.display='none'; document.getElementById("msgSub_"+Sno).style.display='block'; 
  document.getElementById("FinalSubmit_"+Sno).disabled=true; document.getElementById("SpanEdit_"+Sno).style.display='none';
  document.getElementById("SpanEditSave_"+Sno).style.display='none';
}

function OverAllSubmit(y,e)
{
 var No = document.getElementById("RowNo").value; 
 var agree=confirm("Are you sure you want to over all final submit data?"); 
 if(agree) 
 {
  var url = 'NormalizedInc.php'; var pars = 'OverAll=OverAllsubmit&Y='+y+'&E='+e+'&N='+No; 
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_OverAll });
  return true; 
  }
  else{ return false; }
}
function show_OverAll(originalRequest)
{ document.getElementById("OverAllmsg").innerHTML = originalRequest.responseText; 
  var Sno=document.getElementById("RowNoId").value; document.getElementById("OneOverAllSubmit").disabled=true; 
  for(var i=1; i<=Sno; i++){ document.getElementById("FinalSubmit_"+i).disabled=true } 
  document.getElementById("TwoOverAllSubmit").disabled=true;
}

function SelectDeptEmp(d,e){ window.location="HodPmsIncrement.php?deptId="+d+"&e="+e+"&ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=0&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"; }

</script>
</head>
<body class="body">
<table class="table">
<tr>
 <td>
<table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table> 
 </td>
</tr>
<tr>
 <td>
 <table width="100%" style="margin-top:0px; ">
  <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
  <tr>
   <td valign="top">
   <table border="0"  width="100%" height="100%" style="width:100%; height:100%; float:none;" cellpadding="0">
	<tr>
	 <td valign="top" width="100%" style="background-image:url(images/pmsback.png);"> 
<?php //*************************************************************************************** ?>	   
     <table border="0" id="Activity">
	  <tr>
	   <td width="100%" valign="top">
	   <table border="0" width="100%">
<?php //*************************************** Start ********************************************* ?>					
<tr>
 <td colspan="5" width="100%">	 
 <table width="100%">
  <tr><td><?php include("SetKraPmsmh.php"); ?></td></tr>
  <tr>
   <td width="100%">
   <table border="0" width="100%">
	<tr>
<?php /****************************************** Form Start **************************/ ?>
<?php /***************** Submitted **************************/ ?>		 
<td id="Submitted" width="100%" style="display:block;">
<input type="hidden" id="EmployeeId" value="<?php echo $EmployeeId; ?>" />
<input type="hidden" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" id="YearId" value="<?php echo $YearId; ?>" />
<input type="hidden" id="FormMin5" value="0" /><input type="hidden" id="FormMax5" value="0" />	
<input type="hidden" id="PerValue" /><input type="hidden" id="OnePerPre" value="<?php echo $OnePerPre; ?>"/>
<table border="0" width="100%">
 <tr>
  <td width="100%">
  <table border="0" width="100%">
   <tr>
    <td style="font-family:Times New Roman;font-size:18px;font-weight:bold;" width="100%">
	<font color="#00468C">(<i>Team Increment</i>)</font>
	&nbsp;&nbsp;&nbsp;&nbsp;
	<font style="font-family:Times New Roman;font-weight:bold;color:#FDFD00;font-size:15px;">Pre - <font color="#004080">Previouse</font>,&nbsp;&nbsp;Pro - <font color="#004080">Proposed</font>,&nbsp;&nbsp;PGSPM - <font color="#004080">Proposed Gross Salary Per Month</font>,&nbsp;&nbsp;PIS - <font color="#004080">Proposed Increment Salary</font>,&nbsp;&nbsp;SC - <font color="#004080">Salary Correction</font>
	</font> 
	&nbsp;&nbsp;&nbsp;&nbsp;
	<font style="font-family:Georgia;color:#FFFF06;font-size:15px;font-weight:bold;">
	 <i><span id="msg"></span></i>
	</font>
	</td>
   </tr>
   <tr>
    <td width="100%" style="font-family:Times New Roman;font-weight:bold; color:#FFFFFF;font-size:15px;" valign="bottom">
	<style>.rinput{width:100px;font-family:Times New Roman;font-weight:bold;color:#9F0000;font-size:15px;text-align:center;height:21px;}</style>
    &nbsp;&nbsp;<u>Previous GSPM</u>&nbsp;:&nbsp;&nbsp;&nbsp;
	<input class="rinput" style="width:100px;" id="MyTTPreGross" value="<?php echo $TotOldGrossPM; ?>" />
	&nbsp;&nbsp;<u>Proposed GSPM</u>&nbsp;:&nbsp;&nbsp;
	<input class="rinput" style="width:100px;" id="MyTTProGross" value="<?php echo $TotNewGrossPM; ?>" />
    &nbsp;&nbsp;<u>Increment</u>&nbsp;:&nbsp;&nbsp;
	<input class="rinput" style="width:100px;" id="MyTTIncGross" value="<?php echo $Increment; ?>"/>&nbsp;&nbsp;<input class="rinput" style="width:60px;" id="MyTTIncGrossPercent" value="<?php echo $PerInc; ?>"/>&nbsp;%&nbsp;&nbsp;
    &nbsp;&nbsp;<u>PIS</u>&nbsp;:&nbsp;&nbsp;<input class="rinput" style="width:60px;" id="MyTTPISPercent" value="<?php echo $TotalTPerPIS; ?>" />&nbsp;%&nbsp;&nbsp;
    &nbsp;&nbsp;<u>SC</u>&nbsp;:&nbsp;&nbsp;<input class="rinput" style="width:60px;" id="MyTTSCPercent" value="<?php echo $TotalTPerPSC; ?>" />&nbsp;%
    
    
    <div style="position:fixed;right:3%;top:2%;color:#000000;background-color:#FFFF80;padding:7px;">
	<style>.rinput{width:100px;font-family:Times New Roman;font-weight:bold;color:#9F0000;font-size:15px;text-align:center;height:21px;}</style>
	&nbsp;&nbsp;
    &nbsp;&nbsp;<u>Previous GSPM</u>&nbsp;:&nbsp;&nbsp;&nbsp;
	<input class="rinput" style="width:100px;" id="MyTTPreGross" value="<?php echo $TotOldGrossPM; ?>" />
	&nbsp;&nbsp;<u>Proposed GSPM</u>&nbsp;:&nbsp;&nbsp;
	<input class="rinput" style="width:100px;" id="MyTTProGross" value="<?php echo $TotNewGrossPM; ?>" />
    &nbsp;&nbsp;<u>Increment</u>&nbsp;:&nbsp;&nbsp;
	<input class="rinput" style="width:100px;" id="MyTTIncGross" value="<?php echo $Increment; ?>"/>&nbsp;&nbsp;<input class="rinput" style="width:60px;" id="MyTTIncGrossPercent" value="<?php echo $PerInc; ?>"/>&nbsp;%&nbsp;&nbsp;
    &nbsp;&nbsp;<u>PIS</u>&nbsp;:&nbsp;&nbsp;<input class="rinput" style="width:60px;" id="MyTTPISPercent" value="<?php echo $TotalTPerPIS; ?>" />&nbsp;%&nbsp;&nbsp;
    &nbsp;&nbsp;<u>SC</u>&nbsp;:&nbsp;&nbsp;<input class="rinput" style="width:60px;" id="MyTTSCPercent" value="<?php echo $TotalTPerPSC; ?>" />&nbsp;%
	&nbsp;&nbsp;
	</div>
    
    
	</td>
   </tr>
   <tr>
	<td width="100%" valign="bottom">
	 <table width="100%" border="0">
	  <tr>
	   <td width="11%" style="font-family:Times New Roman;font-weight:bold;color:#FFFFFF;font-size:15px;">&nbsp;Select Department :</td>
	   <td width="12%"><select style="font-size:12px;height:21px;width:150px;background-color:#DDFFBB;display:block;" name="DeE" id="DeE" onChange="SelectDeptEmp(this.value,<?php echo $EmployeeId; ?>)"><?php if($_REQUEST['deptId']==0){ ?><option value="0">&nbsp;All</option><?php } elseif($_REQUEST['deptId']>0){ $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['deptId'], $con); $resDept=mysql_fetch_assoc($sqlDept); ?><option value="<?php echo $_REQUEST['deptId']; ?>"><?php echo strtoupper($resDept['DepartmentCode']);?></option><?php } else { ?>	<option value="" style="margin-left:0px; background-color:#84D9D5;" selected>DEPARTMENT</option><?php } ?>
<?php $SqlDe=mysql_query("select hrm_department.DepartmentId,DepartmentCode from hrm_department INNER JOIN hrm_employee_general ON hrm_department.DepartmentId=hrm_employee_general.DepartmentId INNER JOIN hrm_employee_pms ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_pms.HOD_EmployeeID=".$EmployeeId." AND hrm_employee_pms.AssessmentYear=".$YearId." group by DepartmentCode ASC", $con); while($ResDe=mysql_fetch_array($SqlDe)) { ?><option value="<?php echo $ResDe['DepartmentId']; ?>"><?php echo $ResDe['DepartmentCode'];?></option><?php } ?>
<?php if($_REQUEST['deptId']!=0){ ?><option value="0">All</option><?php } ?>
           </select></td>
	   <td width="75%" style="font-family:Times New Roman;font-weight:bold;color:#FFFFFF;font-size:15px;" align="right" valign="bottom">
       <?php $sql2=mysql_query("select EmpPmsId from hrm_employee_pms where AssessmentYear=".$YearId." AND HOD_EmployeeID=".$EmployeeId." AND (Hod_GrossMonthlySalary=0 OR Hod_GrossMonthlySalary=0.00) AND HodSubmit_IncStatus=1", $con); $rows=mysql_num_rows($sql2); $sql3=mysql_query("select EmpPmsId from hrm_employee_pms where AssessmentYear=".$YearId." AND HOD_EmployeeID=".$EmployeeId." AND (Hod_GrossMonthlySalary!=0 OR Hod_GrossMonthlySalary!=0.00) AND HodSubmit_IncStatus=1", $con);  $rows2=mysql_num_rows($sql3); if($rows==0){ ?>
       <?php if($_REQUEST['deptId']==0){ ?><input type="button" id="OneOverAllSubmit" onClick="return OverAllSubmit(<?php echo $YearId.','.$EmployeeId; ?>)" value="Over All Final Submit" <?php if($rows2==0){ echo 'disabled'; } ?>/>
 <?php } elseif($_REQUEST['deptId']>0){ echo ''; } else { ?><input type="button" id="OneOverAllSubmit" onClick="return OverAllSubmit(<?php echo $YearId.','.$EmployeeId; ?>)" value="Over All Final Submit" <?php if($rows2==0){ echo 'disabled'; } ?>/><?php } } ?>	 
       </td>	   
	  </tr>
	 </table>
	 </td>
    </tr>
  </table>
  </td>
 </tr>	   
 <tr>
  <td width="100%">   
  <table border="0" width="100%">
   <tr>
<?php //************************************************ Start ******************************// ?>
	<td width="100%" id="EmpAppInc">
     <span id="MyTeamIncSpan"></span>
	 <span id="MyTeamInc">
	 <table border="0" width="100%">
<?php if($_REQUEST['deptId']>0){ $sql=mysql_query("select hrm_employee.*, EmpPmsId, Appraiser_EmployeeID, Reviewer_EmployeeID, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Hod_TotalFinalScore, Hod_TotalFinalRating, HodSubmit_IncStatus, Hod_EmpDesignation, Hod_EmpGrade, Hod_ProIncSalary, Hod_Percent_ProIncSalary, Hod_ProCorrSalary, Hod_Percent_ProCorrSalary, Hod_IncNetMonthalySalary, Hod_Percent_IncNetMonthalySalary, Hod_GrossMonthlySalary, Hod_GrossAnnualSalary, Hod_Incentive, HodPer_PIS_From_PreMyTGrossPM, HodPer_SC_From_PreMyTGrossPM, HodPer_TISPM_From_PreMyTGrossPM, HR_CurrDesigId, HR_CurrGradeId, HR_Curr_DepartmentId, DepartmentId, DesigId, DesigId2, GradeId, HqId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$YearId." AND hrm_employee_pms.HOD_EmployeeID=".$EmployeeId." AND hrm_employee_general.DepartmentId=".$_REQUEST['deptId']." order by EmpCode ASC", $con); }
else { $sql=mysql_query("select hrm_employee.*, EmpPmsId, Reviewer_TotalFinalScore, Appraiser_EmployeeID, Reviewer_EmployeeID, Reviewer_TotalFinalRating, Hod_TotalFinalScore, Hod_TotalFinalRating, HodSubmit_IncStatus, Hod_EmpDesignation, Hod_EmpGrade, Hod_ProIncSalary, Hod_Percent_ProIncSalary, Hod_ProCorrSalary, Hod_Percent_ProCorrSalary, Hod_IncNetMonthalySalary, Hod_Percent_IncNetMonthalySalary, Hod_GrossMonthlySalary, Hod_GrossAnnualSalary, Hod_Incentive, HodPer_PIS_From_PreMyTGrossPM, HodPer_SC_From_PreMyTGrossPM, HodPer_TISPM_From_PreMyTGrossPM, HR_CurrDesigId, HR_CurrGradeId, HR_Curr_DepartmentId, DepartmentId, DesigId, DesigId2, GradeId, HqId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$YearId." AND hrm_employee_pms.HOD_EmployeeID=".$EmployeeId." order by EmpCode ASC", $con); }
$sno=1; while($res=mysql_fetch_array($sql)){ 
$sqlIncen=mysql_query("select INCENTIVE from hrm_employee_ctc where Status='A' AND EmployeeID=".$res['EmployeeID'], $con); $resIncen=mysql_fetch_assoc($sqlIncen);
$sqlCount=mysql_query("select SUM(Incentive) as INC from hrm_pms_appraisal_history INNER JOIN hrm_employee ON hrm_pms_appraisal_history.EmpCode=hrm_employee.EmpCode where hrm_employee.EmployeeID=".$res['EmployeeID']." AND hrm_employee.CompanyId=".$CompanyId, $con); while($Count=mysql_fetch_array($sqlCount)){ $TotInEM=$Count['INC']; }
?>  
	  <tr style="height:23px;" width="100%">
	   <td>
		<table border="1" width="100%" cellspacing="1">
		  <tr bgcolor="#006BD7" style="height:25px;">
			<td align="center" class="td1"><?php echo $sno; ?></td>
			<td colspan="<?php if($TotInEM>0) {?>13<?php } else { ?>11 <?php } ?>" class="td1l" valign="top">
			 <table width="100%" border="0" class="td1l">
			  <tr>
<?php /************** 111111111111111111 Open Open *****************/ ?>			  
			   <td width="70%">
			   &nbsp;&nbsp;<font color="#DDDD00">EmpCode: </font><font color="#FFFFFF"><?php echo $res['EmpCode']; ?></font>
			   &nbsp;&nbsp;&nbsp;<font color="#DDDD00">Name: </font><font color="#FFFFFF"><?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></font>&nbsp;&nbsp;&nbsp;<font color="#DDDD00">Department: </font>
               <?php $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con);  $resDept=mysql_fetch_assoc($sqlDept); ?><font color="#FFFFFF"><?php echo $resDept['DepartmentCode'];?></font>
			   <input type="hidden" id="IncenCheck_<?php echo $sno; ?>" value="<?php echo $resIncen['INCENTIVE']; ?>" />
			   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			   <script>function FunTgtAch(e,y){window.open("HodPmsTgtAch.php?e="+e+"&y="+y+"&grp=3","TcForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=800,height=600");}</script>
			   <?php if($res['DepartmentId']==6){ echo '<span style="cursor:pointer;" onClick="FunTgtAch('.$res['EmployeeID'].','.$YearId.')"><font color="#fff"><u>Tgt/Ach</u></span>'; }else{echo '';} ?>
			   </td>
<?php /************** 111111111111111111 Close Close *****************/ ?>	

<?php /************** 222222222222222222 Open Open *****************/ ?>
<?php /************** 222222222222222222 Open Open *****************/ ?>			   
               <td width="30%" align="right">
			   <?php  $sqlMax = mysql_query("SELECT MAX(SalaryChange_Date) as SalaryChDate FROM hrm_pms_appraisal_history INNER JOIN hrm_employee ON hrm_pms_appraisal_history.EmpCode=hrm_employee.EmpCode where hrm_employee.EmployeeID=".$res['EmployeeID']." AND SalaryChange_Date!='".$EffDate."' AND hrm_pms_appraisal_history.CompanyId=".$CompanyId, $con); 
				      $resMax = mysql_fetch_assoc($sqlMax); 
               $sqlS = mysql_query("SELECT Previous_GrossSalaryPM,TotalProp_GSPM,Incentive FROM hrm_pms_appraisal_history INNER JOIN hrm_employee ON hrm_pms_appraisal_history.EmpCode=hrm_employee.EmpCode  where SalaryChange_Date='".$resMax['SalaryChDate']."' AND hrm_employee.EmployeeID=".$res['EmployeeID']." AND hrm_pms_appraisal_history.CompanyId=".$CompanyId, $con); $resS = mysql_fetch_assoc($sqlS); $TPreGross=$resS['TotalProp_GSPM']; ?> 
			   <input type="hidden" id="GS_<?php echo $sno; ?>" value="<?php echo $resS['TotalProp_GSPM']; ?>" />		

               <?php $sqlDJ=mysql_query("select DateJoining from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID where e.EmployeeID=".$res['EmployeeID']." AND e.CompanyId=".$CompanyId, $con);  
			         $resDJ=mysql_fetch_assoc($sqlDJ); $DJ=$resDJ['DateJoining']; $CuDate=$Prev_From_EffDate;
                     $diff = abs(strtotime($CuDate) - strtotime($DJ));  
					 $daysDJ = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); 
                     if($res['Hod_TotalFinalRating']>0){ $RatingHod=$res['Hod_TotalFinalRating']; } 
					 else{ $RatingHod=$res['Reviewer_TotalFinalRating']; } 
 
//$EmployeeId  //HR_Curr_DepartmentId //Appraiser_EmployeeID, Reviewer_EmployeeID,
$ss= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_disrev WHERE Rating=".$RatingHod." AND HodId=".$EmployeeId." AND (RevId=".$res['Appraiser_EmployeeID']." OR RevId=".$res['Reviewer_EmployeeID'].")  AND YearId=".$YearId." AND IncDistriFrom>0 AND CompanyId=".$CompanyId, $con); $rr=mysql_num_rows($ss);
if($rr>0){ $resMaxMin = mysql_fetch_assoc($ss); }
else
{
 $ss1= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_disdept WHERE Rating=".$RatingHod." AND HodId=".$EmployeeId." AND DeptId=".$res['HR_Curr_DepartmentId']." AND YearId=".$YearId." AND IncDistriFrom>0 AND CompanyId=".$CompanyId, $con); $rr1=mysql_num_rows($ss1);
 if($rr1>0){ $resMaxMin = mysql_fetch_assoc($ss1); }
 else
 {
  $ss2= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dishod WHERE Rating=".$RatingHod." AND HodId=".$EmployeeId." AND YearId=".$YearId." AND IncDistriFrom>0 AND CompanyId=".$CompanyId, $con); 
  $rr2=mysql_num_rows($ss2);
  if($rr2>0){ $resMaxMin = mysql_fetch_assoc($ss2); }
  else
  {
   $sqlMaxMin= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dis WHERE Rating=".$RatingHod." AND YearId=".$YearId." AND CompanyId=".$CompanyId, $con); $resMaxMin = mysql_fetch_assoc($sqlMaxMin); 
  }
 }
}    
 
 
                     //$sqlMaxMin= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dis WHERE Rating=".$RatingHod." AND YearId=".$YearId." AND CompanyId=".$CompanyId, $con); $resMaxMin = mysql_fetch_assoc($sqlMaxMin); 
					 
              /**(1)************************* If Allow Minimum/Maximum *************************/
	                 if($daysDJ>=180){ $Min=($TPreGross*$resMaxMin['IncDistriFrom'])/100;} 
	                 else { $Min=($TPreGross*5)/100;} 
	                 $Max=($TPreGross*$resMaxMin['IncDistriTo'])/100;	
	                 $OkMin=$TPreGross+$Min; $OkMax=$TPreGross+$Max; 
              
			  /**(2)************************* If Allow Fix Value *******************************/	  
	               //$NewAmt=($resS['TotalProp_GSPM']*$resMaxMin['IncDistriFrom'])/100;
	               //$NewGrossAmt=$resS['TotalProp_GSPM']+$NewAmt;
	  
  // [Logic] 
  // (1) Joining <= 1st Apr 2016 --> Actual + 3 Month Extra
  // (2) Joining >= 1st Apr 2016 ---> Actual + Extra Day(Prorata wise)
  // (3) Joining >= 1st Jan 2017 ---> Actual	  
/**(3)*************************If Prorata wise New Open Open Open Open Open **************************/

  $EffDM=date("m-d",strtotime($EffDate));                              //$EffDate=2018-01-01  
  $MinMD=date("m-d",strtotime($Prev_From_EffDate));                    //$Prev_From_EffDate=2017-12-31, $MinMD=12-31 
  $ExtraOneD=date("Y-m-d",strtotime('+1 day', strtotime($AllowDoj)));  //$AllowDoj=2017-06-30, $ExtraOneD=2017-07-01
  $ExtraOneMD=date("m-d",strtotime($ExtraOneD));                       //07-01
  $PrvY=date("Y",strtotime($AllowDoj));                                //2017
  $PrvMD=date("m-d",strtotime($AllowDoj));                             //06-30
  $cY=$PrvY; $pY=$PrvY-1; //$cY=date("Y"); $pY=date("Y")-1;            //$cY=2017, $pY=2016
	
	                      //$pY.'-'.$PrvMD -->update after process @@@@@@@@@@@@
  if($resDJ['DateJoining']<=$pY.'-03-31' AND $RatingHod>0)  //if($resDJ['DateJoining']<=$pY.'-03-31' AND $RatingHod>0)
  {
   $TotIncAmt=($TPreGross*$resMaxMin['IncDistriFrom'])/100;
   $NewGrossAmt=10*(ceil(($TPreGross+$TotIncAmt)/10)); 
   $NewGrossAmt2=$TPreGross+$TotIncAmt;
   $TotInc2=0;
  }	 
                    //Dj>=2016-04-01 AND Dj<=2017-03-31 -->Old
                    //Dj>=2016-07-01 AND Dj<=2017-06-30 -->New
					
					          //$pY.'-'.$ExtraOneMD -->update after process @@@@@@@@@@@@
  elseif($resDJ['DateJoining']>=$pY.'-04-01' AND $resDJ['DateJoining']<=$cY.'-'.$PrvMD AND $RatingHod>0)
  {
   $sqlCorr=mysql_query("SELECT MAX(SalaryChange_Date) as SalaryChDate FROM hrm_pms_appraisal_history INNER JOIN hrm_employee ON hrm_pms_appraisal_history.EmpCode=hrm_employee.EmpCode where hrm_employee.EmployeeID=".$res['EmployeeID']." AND Previous_GrossSalaryPM!=".$resS['TotalProp_GSPM']." AND SalaryChange_Date>='".$resDJ['DateJoining']."' AND hrm_pms_appraisal_history.CompanyId=".$CompanyId, $con); $resCorr=mysql_fetch_assoc($sqlCorr); 
   $sqlCk1 = mysql_query("SELECT Previous_GrossSalaryPM,TotalProp_GSPM FROM hrm_pms_appraisal_history INNER JOIN hrm_employee ON hrm_pms_appraisal_history.EmpCode=hrm_employee.EmpCode where SalaryChange_Date='".$resDJ['DateJoining']."' AND hrm_employee.EmployeeID=".$res['EmployeeID']." AND hrm_pms_appraisal_history.CompanyId=".$CompanyId, $con); 
   $resCk1=mysql_fetch_assoc($sqlCk1);
   $sqlCk2 = mysql_query("SELECT Previous_GrossSalaryPM,TotalProp_GSPM FROM hrm_pms_appraisal_history INNER JOIN hrm_employee ON hrm_pms_appraisal_history.EmpCode=hrm_employee.EmpCode where SalaryChange_Date='".$resCorr['SalaryChDate']."' AND hrm_employee.EmployeeID=".$res['EmployeeID']." AND hrm_pms_appraisal_history.CompanyId=".$CompanyId, $con); 
   $resCk2=mysql_fetch_assoc($sqlCk2);
   
                   //Dj>=2016-04-01 AND Dj<=2016-09-30 -->Old
                   //Dj>=2016-07-01 AND Dj<=2016-12-31 -->New
				           //$pY.'-'.$ExtraOneMD -->update after process @@@@@@@@@@@@
   if($resDJ['DateJoining']>=$pY.'-04-01' AND $resDJ['DateJoining']<=$pY.'-'.$MinMD AND $RatingHod>0)
   { 
   
    if($resCorr>0 AND $resCk2['TotalProp_GSPM']>$resCk1['TotalProp_GSPM'])
    {  
	 
	 /* //not calculate mid-term increment conditoion ***************************/
	 /*
     $date1 = new DateTime($resCorr['SalaryChDate']); $date2 = new DateTime($cY."-09-30");
     $interval = date_diff($date2, $date1);
     $Y=$interval->format('%y');  $M=$interval->format('%m'); $D=$interval->format('%d')+1;
     $PerM=$resMaxMin['IncDistriFrom']/12;  $PerD=$PerM/30;
     $Month_Per=round($PerM*$M, 2); $Day_Per=round($PerD*$D, 2);
     $MSal=($resS['TotalProp_GSPM']*$Month_Per)/100; 
     $DSal=($resS['TotalProp_GSPM']*$Day_Per)/100; 
     $TotInc=round($MSal+$DSal);
     $NewGrossAmt=10*(ceil(($resS['TotalProp_GSPM']+$TotInc)/10)); 
     $NewGrossAmt2=$resS['TotalProp_GSPM']+$TotInc;  
	 $TotInc2=0;
	 */
	 /* //not calculate mid-term increment conditoion ***************************/
	 
	 $TotIncAmt=($TPreGross*$resMaxMin['IncDistriFrom'])/100;
     $NewGrossAmt=10*(ceil(($TPreGross+$TotIncAmt)/10)); 
     $NewGrossAmt2=$TPreGross+$TotIncAmt;

	 $date11 = new DateTime($resDJ['DateJoining']);  $date22 = new DateTime($pY."-".$MinMD);
     $interval = date_diff($date22, $date11);
     $YY=$interval->format('%y');  $MM=$interval->format('%m');  $DD=$interval->format('%d');
	 $PerM2=$resMaxMin['IncDistriFrom']/12;  $PerD2=$PerM2/30;
	 $Month_Per2=round($PerM2*$MM, 3); $Day_Per2=round($PerD2*$DD, 3);
	 $MSal2=($TPreGross*$Month_Per2)/100; 
	 $DSal2=($TPreGross*$Day_Per2)/100; 
	 $TotInc2=round($MSal2+$DSal2);         //Extra
    }
    else
	{
	 $TotIncAmt=($TPreGross*$resMaxMin['IncDistriFrom'])/100;
     $NewGrossAmt=10*(ceil(($TPreGross+$TotIncAmt)/10)); 
     $NewGrossAmt2=$TPreGross+$TotIncAmt;
	 
	 $date11 = new DateTime($resDJ['DateJoining']);  $date22 = new DateTime($pY."-".$MinMD);
     $interval = date_diff($date22, $date11);
     $YY=$interval->format('%y');  $MM=$interval->format('%m');  $DD=$interval->format('%d');
	 $PerM2=$resMaxMin['IncDistriFrom']/12;  $PerD2=$PerM2/30;
	 $Month_Per2=round($PerM2*$MM, 3); $Day_Per2=round($PerD2*$DD, 3);
	 $MSal2=($TPreGross*$Month_Per2)/100; 
	 $DSal2=($TPreGross*$Day_Per2)/100; 
	 $TotInc2=round($MSal2+$DSal2);       //Extra
	}
	
   }            
                //Dj>=2016-10-01 AND Dj<=2017-03-31 -->Old
                //Dj>=2017-01-01 AND Dj<=2017-06-30 -->New
   elseif($resDJ['DateJoining']>=$cY.'-'.$EffDM AND $resDJ['DateJoining']<=$cY.'-'.$PrvMD AND $RatingHod>0)
   {
    
    if($resCorr>0 AND $resCk2['TotalProp_GSPM']>$resCk1['TotalProp_GSPM'])
	{ //If mid-term increment $date1 = new DateTime($resCorr['SalaryChDate']);
	  $date1 = new DateTime($resDJ['DateJoining']); } 
	else{ $date1 = new DateTime($resDJ['DateJoining']); }
    $date2 = new DateTime($cY."-".$MinMD);
    $interval = date_diff($date2, $date1);
    $Y=$interval->format('%y');  $M=$interval->format('%m');  $D=$interval->format('%d');
    $PerM=$resMaxMin['IncDistriFrom']/12;  $PerD=$PerM/30;
    $Month_Per=round($PerM*$M, 3); $Day_Per=round($PerD*$D, 3);
    $MSal=($TPreGross*$Month_Per)/100; 
    $DSal=($TPreGross*$Day_Per)/100; 
    $TotInc=round($MSal+$DSal);
    $NewGrossAmt=10*(ceil(($TPreGross+$TotInc)/10)); 
    $NewGrossAmt2=$TPreGross+$TotInc; 
	$TotInc2=0;                        //Not Extra  
   }
        
  }
  else
  {
  
   $NewGrossAmt=10*(ceil($TPreGross/10)); 
   $NewGrossAmt2=$TPreGross; 
   $TotInc2=0;                        //Not Extra 
  }
  
  if($TotInc2>0){$ActualNewGS=10*(ceil(($NewGrossAmt2+$TotInc2)/10));}
  else{$ActualNewGS=10*(ceil(($NewGrossAmt+$TotInc2)/10));}
 
/**(3)************************* If Prorata wise New Close Close Close Close Close **************************/
  
  /****** Only For Current Appraisal Year 2016-2017 Open Open Open Open Open******/
  if($resDJ['DateJoining']<='2016-03-31'){ $Extra_3Month=$TotIncAmt*3; }
  else{ $Extra_3Month=0; }
  /****** Only For Current Appraisal Year 2016-2017 Close Close Close Close ******/
     
?> 
              <input type="hidden" id="Extra3Month<?php echo $sno; ?>" value="<?php echo $Extra_3Month; ?>" />
              <input type="hidden" id="ActualPer_Gross_<?php echo $sno; ?>" value="<?php if($resMaxMin['IncDistriFrom']!=''){ echo $resMaxMin['IncDistriFrom']; } else {echo 0;} ?>"/><input type="hidden" id="NewGross_<?php echo $sno; ?>" value="<?php echo $ActualNewGS; ?>"/><input type="hidden" id="MinV_<?php echo $sno; ?>" value="<?php echo $OkMin; ?>"/><input type="hidden" id="MaxV_<?php echo $sno; ?>" value="<?php echo $OkMax; ?>"/> <font color="#DDDD00">Proposed Gross Salary Per Month:</font>&nbsp;<font color="#FFFFFF"><?php echo $ActualNewGS; ?></font>&nbsp;&nbsp; 			  
              
<?php /*<font color="#DDDD00">Proposed Gross Salary Per Month:</font>&nbsp;<font color="#FFCEE7">Minimum</font>-<font color="#FFFFFF"><?php echo $OkMin; ?></font>&nbsp;<font color="#FFCEE7">Maximum</font>- <font color="#FFFFFF"><?php echo $OkMax; ?></font>*/ ?>
               </td>
<?php /************** 222222222222222222 Close Close *****************/ ?>	
<?php /************** 222222222222222222 Close Close *****************/ ?>			   
			  </tr>
			 </table>
			 </td>
			 <td colspan="2" align="center">
			  <input type="button" id="FinalSubmit_<?php echo $sno; ?>" onClick="return FinalSubmit(<?php echo $sno.','.$res['EmpPmsId'].','.$res['EmployeeID']; ?>)" value="Final Submit" <?php if($res['Hod_GrossMonthlySalary']==0 OR $res['Hod_GrossMonthlySalary']==0.00 OR $res['HodSubmit_IncStatus']==2) { echo 'disabled'; } ?>  />
			 </td>
			</tr>			
			<tr bgcolor="#7a6189">
			 <td class="td1" style="width:50px;"><b>Pre. Grade</b></td>
		     <td class="td1" style="width:50px;"><b>Pro. Grade</b></td>
		     <td class="td1" style="width:400px;"><b>Previouse Designation</b></td>
		     <td class="td1" style="width:400px;"><b>Proposed Designation</b></td>
		     <td class="td1" style="width:80px;"><b>Change<br>Date</b></td>
		     <td class="td1" style="width:80px;"><b>&nbsp;</b></td>		  
		     <td class="td1" style="width:80px;"><b>Pre.<br>GSPM</b></td>			  
		     <td class="td1" style="width:80px;"><b>PGSPM</b></td>
		     <td class="td1" style="width:50px;"><b>% PIS</b></td>
		     <td class="td1" style="width:80px;"><b>Salary<br>Correction</b></td>
		     <td class="td1" style="width:80px;"><b>Total<br>PGSPM</b></td>
		     <td class="td1" style="width:50px;"><b>% Total<br>PGSPM</b></td>
           <?php if($TotInEM>0) { ?>
             <td class="td1" style="width:80px;"><b>INCENTIVE</b></td>
             <td class="td1" style="width:80px;"><b>Total<br>Pay PM</b></td>
           <?php } ?>			  
		     <td class="td1" style="width:50px;"><b>Score</b></td>
		     <td class="td1" style="width:50px;"><b>Rating</b></td>
			</tr>
            <?php $sqlHistory=mysql_query("select * from hrm_pms_appraisal_history INNER JOIN hrm_employee ON (hrm_pms_appraisal_history.EmpCode=hrm_employee.EmpCode AND hrm_pms_appraisal_history.CompanyId=hrm_employee.CompanyId) where hrm_employee.EmployeeID=".$res['EmployeeID']." AND hrm_employee.CompanyId=".$CompanyId." AND SalaryChange_Date<='".date("2011-12-31")."' order by SalaryChange_Date ASC", $con); while($resHistory=mysql_fetch_array($sqlHistory)){
if($resHistory['Previous_GrossSalaryPM']!=$resHistory['TotalProp_GSPM']){ ?>			
			<tr bgcolor="#FFFFFF" height="20px;">
			 <td class="td2"><?php echo $resHistory['Current_Grade']; ?></td>
		     <td class="td2"><?php echo $resHistory['Proposed_Grade']; ?></td>
		     <td class="td3"><?php echo $resHistory['Current_Designation']; ?></td>
		     <td class="td3"><?php echo $resHistory['Proposed_Designation']; ?></td>
		     <td class="td2"><?php echo date("d-M-y",strtotime($resHistory['SalaryChange_Date'])); ?></td>
		     <td class="td2">&nbsp;</td>
		     <td class="td2"><?php echo ''; ?></td>			  
		     <td class="td3" align="right"><?php echo ''; ?></td>
		     <td class="td2"><?php echo ''; ?></td>
		     <td class="td3" align="right"><?php echo ''; ?></td> <?php  ?>
	<td class="td33" align="right"><?php echo $resHistory['Previous_GrossSalaryPM']; //$resHistory['TotalProp_GSPM'] ?></td>
    <td class="td22"><?php echo $resHistory['Prop_PeInc_GSPM']; //$resHistory['TotalProp_PerInc_GSPM']; ?></td>
           <?php if($TotInEM>0) { ?>
             <td class="td22"><?php echo $resHistory['Incentive']; ?></td>
             <?php $TotalPay=$resHistory['Previous_GrossSalaryPM']+$resHistory['Incentive']; ?>
             <td class="td22"><?php echo number_format($TotalPay, 2, '.', ''); ?></td>
		   <?php } ?>			  
		     <td class="td22"><?php echo $resHistory['Score']; ?></td>
		     <td class="td22"><?php echo $resHistory['Rating']; ?></td>
			</tr>
            <?php } } ?>	
						
            <?php $sqlHistory=mysql_query("select * from hrm_pms_appraisal_history INNER JOIN hrm_employee ON (hrm_pms_appraisal_history.EmpCode=hrm_employee.EmpCode AND hrm_pms_appraisal_history.CompanyId=hrm_employee.CompanyId) where hrm_employee.EmployeeID=".$res['EmployeeID']." AND hrm_employee.CompanyId=".$CompanyId." AND SalaryChange_Date>='".date("2012-01-01")."' AND SalaryChange_Date!='".date("Y-10-01")."' order by SalaryChange_Date ASC", $con); while($resHistory=mysql_fetch_array($sqlHistory)){ if($resHistory['Previous_GrossSalaryPM']!=$resHistory['TotalProp_GSPM']){ ?>			
			<tr bgcolor="#FFFFFF" height="20px;">
			 <td class="td2"><?php echo $resHistory['Current_Grade']; ?></td>
		     <td class="td2"><?php echo $resHistory['Proposed_Grade']; ?></td>
		     <td class="td3"><?php echo $resHistory['Current_Designation']; ?></td>
		     <td class="td3"><?php echo $resHistory['Proposed_Designation']; ?></td>
		     <td class="td2"><?php echo date("d-M-y",strtotime($resHistory['SalaryChange_Date'])); ?></td>
		     <td class="td2">&nbsp;</td>
		     <td class="td33" align="right"><?php echo $resHistory['Previous_GrossSalaryPM']; ?></td>			  
		     <td class="td33" align="right"><?php echo $resHistory['Proposed_GrossSalaryPM']; ?></td>
		     <td class="td22"><?php echo $resHistory['Prop_PeInc_GSPM']; ?></td>
		     <td class="td33" align="right"><?php echo $resHistory['PropSalary_Correction']; ?></td>
		     <td class="td33" align="right"><?php echo $resHistory['TotalProp_GSPM']; ?></td>
		     <td class="td22"><?php echo $resHistory['TotalProp_PerInc_GSPM']; ?></td>
           <?php if($TotInEM>0) { ?>
             <td class="td22"><?php echo $resHistory['Incentive']; ?></td>
             <?php $TotalPay=$resHistory['TotalProp_GSPM']+$resHistory['Incentive']; ?>
             <td class="td22"><?php echo number_format($TotalPay, 2, '.', ''); ?></td>
		   <?php } ?>			  
		     <td class="td22"><?php echo $resHistory['Score']; ?></td>
		     <td class="td22"><?php echo $resHistory['Rating']; ?></td>
			</tr>
            <?php } } ?>	

<?php //$EffDate -->Salary Change Date
            $sqlHi2=mysql_query("select * from hrm_pms_appraisal_history INNER JOIN hrm_employee ON (hrm_pms_appraisal_history.EmpCode=hrm_employee.EmpCode AND hrm_pms_appraisal_history.CompanyId=hrm_employee.CompanyId) where hrm_employee.EmployeeID=".$res['EmployeeID']." AND hrm_employee.CompanyId=".$CompanyId." AND SalaryChange_Date='".$EffDate."'", $con); $rowHi2=mysql_num_rows($sqlHi2);
            $sqlChh=mysql_query("select * from hrm_pms_allow_inc where EmployeeID=".$res['EmployeeID']." AND CompanyId=".$CompanyId." AND AssesmentYear=".$YearId, $con); $rowChh=mysql_num_rows($sqlChh); 
            $sqlGr=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['HR_CurrGradeId'], $con);
			$sqlGrH=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Hod_EmpGrade'], $con); 
			$resGr=mysql_fetch_assoc($sqlGr); $resGrH=mysql_fetch_assoc($sqlGrH);
			$sqlD1=mysql_query("select DesigName from hrm_designation where DesigId=".$res['HR_CurrDesigId'], $con);
			$sqlD2=mysql_query("select DesigName from hrm_designation where DesigId=".$res['Hod_EmpDesignation'], $con); 
			$resD1=mysql_fetch_assoc($sqlD1); $resD2=mysql_fetch_assoc($sqlD2);
		    
		    if($CompanyId==1 OR $CompanyId==2){ /*Check Open*/ ?>
            <tr bgcolor="#FFFFFF">						
			 <td class="td2"><?php echo $resGr['GradeValue']; ?></td>
		     <td class="td2" bgcolor="#B9FFB9"><?php if($res['HR_CurrGradeId']!=$res['Hod_EmpGrade'] AND $res['Hod_EmpGrade']>0){ echo $resGrH['GradeValue']; } ?></td>
             <td class="td3"><?php echo $resD1['DesigName'];?><input type="hidden" id="UpDesigId_<?php echo $sno; ?>" value="<?php echo $res['HR_CurrDesigId']; ?>" /></td>	
		     <td class="td3" bgcolor="#B9FFB9"><?php if($res['HR_CurrDesigId']!=$res['Hod_EmpDesignation']){ echo $resD2['DesigName']; } ?></td>
		     <td class="td2"><?php echo date("d-M-y",strtotime($EffDate)); //$SalChDate; ?></td>
		     <td class="td2">
			 <?php if($res['HodSubmit_IncStatus']!=2) { ?>
			 <SPAN id="SpanEdit_<?php echo $sno; ?>"><img src="images/edit.png" border="0" onClick="return ClickEdit(<?php echo $sno.', '.$res['EmployeeID'].', '.$rowChh; ?>)"/></SPAN>
	         <SPAN id="SpanEditSave_<?php echo $sno; ?>" style="display:none;"><img src="images/Floppy-Small-icon.png" border="0" onClick="CalProInc(<?php echo $sno; ?>); return ClickSaveEdit(<?php echo $sno.','.$res['EmpPmsId'].','.$res['EmployeeID'].','.$CompanyId.','.$YearId.','.$EmployeeId; ?>)"></SPAN>
			 <?php } ?> 			  
			 </td>
			 <td class="td33" align="right" style="width:100px;"><b><?php echo $TPreGross; ?></b></td>
		     <td class="td2" bgcolor="#B9FFB9" id="TDD1_<?php echo $sno; ?>"><input id="ProGSPM_<?php echo $sno; ?>" class="td33" style="border-style:hidden;border:0;background-color:#B9FFB9;width:80px;text-align:right;" value="<?php echo $res['Hod_ProIncSalary']; ?>" maxlength="15" <?php if($rowChh>0){ echo ''; }else{ echo 'disabled'; echo 'readOnly'; }?> onKeyUp="CalProInc(<?php echo $sno; ?>)" onClick="CalProInc(<?php echo $sno; ?>)" onChange="CalProInc(<?php echo $sno; ?>)"/>
			 </td>
		     <td class="td2" bgcolor="#B9FFB9"><input id="Per_ProGSPM_<?php echo $sno; ?>" class="td22" style="border-style:hidden;border:0;background-color:#B9FFB9;width:50px;" value="<?php echo $res['Hod_Percent_ProIncSalary']; ?>" readOnly maxlength="12"/>
			 </td>
		     <td class="td2" bgcolor="#B9FFB9" id="TDD2_<?php echo $sno; ?>"><input id="ProSC_<?php echo $sno; ?>" class="td33" style="border-style:hidden;border:0;background-color:#B9FFB9; width:80px;text-align:right;" value="<?php echo $res['Hod_ProCorrSalary']; ?>" <?php if($rowChh>0){ echo ''; }else{ echo 'disabled'; }?>  maxlength="15" onKeyUp="CalProInc(<?php echo $sno; ?>)" onClick="CalProInc(<?php echo $sno; ?>)" onChange="CalProInc(<?php echo $sno; ?>)"/>
			  </td>
		      <td class="td2" bgcolor="#B9FFB9"><input id="TotalProGSPM_<?php echo $sno; ?>" class="td33" style="border-style:hidden; border:0; background-color:#B9FFB9;width:80px;text-align:right;" value="<?php echo $res['Hod_GrossMonthlySalary']; ?>" readOnly maxlength="15"/>
			  </td>
		      <td class="td2" bgcolor="#B9FFB9"><input id="Per_TotalProGSPM_<?php echo $sno; ?>" class="td22" style="border-style:hidden; border:0; background-color:#B9FFB9;width:50px;" value="<?php echo $res['Hod_Percent_IncNetMonthalySalary']; ?>" readOnly maxlength="15"/>
  <input type="hidden" value="" id="Cal_MinGSV<?php echo $sno; ?>" />
  <input type="hidden" value="<?php echo $res['Hod_Percent_ProCorrSalary'];?>" id="Per_SalaryCorr<?php echo $sno;?>"/> 
  <input type="hidden" value="<?php echo $res['Hod_IncNetMonthalySalary'];?>" id="IncSalaryPM<?php echo $sno;?>"/>
  <input type="hidden" value="<?php echo $res['Hod_GrossAnnualSalary'];?>" id="TotalAnnualSalary<?php echo $sno;?>"/> 
  <input type="hidden" value="<?php echo $res['HodPer_PIS_From_PreMyTGrossPM'];?>" id="HodMyTeamPIS<?php echo $sno;?>"/>
  <input type="hidden" value="<?php echo $res['HodPer_SC_From_PreMyTGrossPM'];?>" id="HodMyTeamSC<?php echo $sno;?>"/> 
  <input type="hidden" value="<?php echo $res['HodPer_TISPM_From_PreMyTGrossPM'];?>" id="HodMyTeamTISPM<?php echo $sno;?>"/> 
	          </td>
			 <?php if($TotInEM>0){?>
			  <td class="td2">
			  <?php if($resIncen['INCENTIVE']=='Y') { ?><input class="td22" style="border-style:hidden;border:0;background-color:#B9FFB9;width:100%;" id="EmpInctv<?php echo $sno; ?>" value="<?php echo $res['Hod_Incentive']; ?>" maxlength="15" onKeyUp="CalProInc(<?php echo $sno; ?>)" onClick="CalProInc(<?php echo $sno; ?>)" onChange="CalProInc(<?php echo $sno; ?>)" disabled/><?php } ?></td>
              <?php $TotpayEmp=$res['Hod_GrossMonthlySalary']+$res['Hod_Incentive']; ?>
              <td class="td2"><?php if($resIncen['INCENTIVE']=='Y') { ?><input class="td22" style="border-style:hidden;border:0;background-color:#B9FFB9;width:100%; height:20px;text-align:center;" id="TotalPay<?php echo $sno; ?>" value="<?php echo number_format($TotpayEmp, 2, '.', ''); ?>" maxlength="15" readonly/>
<?php } ?></td><?php } ?> 
		      <td bgcolor="#B9FFB9" class="td2"><input class="td22" style="border-style:hidden;border:0;background-color:#B9FFB9;width:100%;" value="<?php if($res['Hod_TotalFinalScore']>0) {echo $res['Hod_TotalFinalScore']; } else {echo $res['Reviewer_TotalFinalScore'];} ?>" readOnly/></td>
		      <td bgcolor="#B9FFB9" class="td2"><input style="border-style:hidden;border:0;background-color:#B9FFB9;width:100%;" class="td22" value="<?php  if($res['Hod_TotalFinalRating']>0){echo $res['Hod_TotalFinalRating']; } else {echo $res['Reviewer_TotalFinalRating'];} ?>" readOnly/></td>
			 </tr>
             <?php } /*Check Close*/?>

            <?php 
			 //$MyTTIncGrossPercent=$res['Hod_IncNetMonthalySalary']/$OnePerPre; 
			 //$MyTTIGP=number_format($MyTTIncGrossPercent, 2, '.', '');
			?>			
			<tr style="height:22px;">
			<td class="td3" colspan="7" bgcolor="#FFFFFF" style="width:100%;font-weight:bold;" align="right">
            <input type="hidden" class="td22" id="IncentivePer<?php echo $sno; ?>" value="0" /> 
			<input type="hidden" class="td22" id="TotIncrement<?php echo $sno; ?>" value="" />
            <?php /*My Team - Increment */ ?><input type="hidden" class="td22" id="EmpTTIncGross<?php echo $sno; ?>" value="<?php echo $res['Hod_IncNetMonthalySalary']; ?>" /><input type="hidden" class="td22" id="EmpTTIncGrossPercent<?php echo $sno; ?>" value="<?php echo $res['HodPer_TISPM_From_PreMyTGrossPM']; ?>" />
			<?php /*PIS */ ?><input type="hidden" class="td22" id="EmpTTPISPercent<?php echo $sno; ?>" value="<?php echo $res['HodPer_PIS_From_PreMyTGrossPM']; ?>" />
            <?php /*SC */ ?><input type="hidden" class="td22" id="EmpTTSCPercent<?php echo $sno; ?>" value="<?php echo $res['HodPer_SC_From_PreMyTGrossPM']; ?>" />
			</td>
			<td colspan="<?php if($TotInEM>0) {?>9<?php } else { ?>7<?php } ?>" class="td33" style="color:#800000;font-size:15px;font-weight:bold;background-color:#FFFFFF;"><i><span id="msg_<?php echo $sno; ?>" style="display:none;">&nbsp;&nbsp;&nbsp;&nbsp;Data save successfully...</span></i><i><span id="msgSub_<?php echo $sno; ?>" style="display:none;">&nbsp;&nbsp;&nbsp;&nbsp;Data submitted successfully...</span></i>
			</td>
		   </tr>		
		  </table>
		  </td>
	    </tr>
	    <tr><td>&nbsp;</td></tr>
<?php $sno++;} $no=$sno-1; echo '<input type="hidden" id="RowNo" value="'.$no.'" />';?> 
     
	    <tr>
	     <td>
<?php $sql2=mysql_query("select EmpPmsId from hrm_employee_pms where AssessmentYear=".$YearId." AND HOD_EmployeeID=".$EmployeeId." AND (Hod_GrossMonthlySalary=0 OR Hod_GrossMonthlySalary=0.00) AND HodSubmit_IncStatus=1", $con); $rows=mysql_num_rows($sql2); $sql3=mysql_query("select EmpPmsId from hrm_employee_pms where AssessmentYear=".$YearId." AND HOD_EmployeeID=".$EmployeeId." AND (Hod_GrossMonthlySalary!=0 OR Hod_GrossMonthlySalary!=0.00) AND HodSubmit_IncStatus=1", $con);  $rows2=mysql_num_rows($sql3); 
         if($rows==0)
		 { 
		  if($_REQUEST['deptId']==0)
		  { ?>
		  <input type="button" id="OneOverAllSubmit" onClick="return OverAllSubmit(<?php echo $YearId.','.$EmployeeId; ?>)" value="Over All Final Submit" <?php if($rows2==0){ echo 'disabled'; } ?>/>
 <?php } elseif($_REQUEST['deptId']>0){ echo ''; } else { ?><input type="button" id="OneOverAllSubmit" onClick="return OverAllSubmit(<?php echo $YearId.','.$EmployeeId; ?>)" value="Over All Final Submit" <?php if($rows2==0){ echo 'disabled'; } ?>/>     
    <?php } } ?>	   
	     </td>
	    </tr>
	   </table>
	   </span>		
	   </td>
<?php //************************************************ Close ******************************// ?>	  	   
	  </tr>
     </table>
     </td>
    </tr>
   </table>
   </td>
<?php /****************************************** Form Close **************************/ ?>		   
  </tr>
 </table>
 </td>
</tr>
<?php //******************************************** ?>    
  </table>
 </td>
</tr>					
<?php //************************************ Close ************************************* ?>					
				  </table>
				 </td>
			  </tr>
			</table>
           </td>
			  </tr>
	        </table>
<?php //******************************************************************************* ?>
		   </td>
		  </tr>
		</table>
	  </td>
	</tr>
	<tr>
	  <td valign="top">
	    <?php //require_once("../footer.php"); ?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>