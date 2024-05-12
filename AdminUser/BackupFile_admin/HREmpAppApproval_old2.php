<?php session_start(); 
require_once('config/config.php');

if($_REQUEST['action']=='approve' AND $_REQUEST['action']!='') 
{ 
 $PmsId=$_REQUEST['P']; $EmpId=$_REQUEST['E']; $YearId=$_REQUEST['Y']; $ComId=$_REQUEST['C']; $UId=$_REQUEST['U'];
 
 $SqlCtc = mysql_query("SELECT e.EmployeeID,EmpCode,Fname,Sname,Lname,c.*,d.DepartmentId, EmpAddBenifit_MediInsu_value, g.GradeId,g.DesigId,DepartmentName FROM hrm_employee e INNER JOIN hrm_employee_ctc c ON e.EmployeeID=c.EmployeeID INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId WHERE e.CompanyId=".$ComId." AND c.Status='A' AND e.EmployeeID=".$EmpId, $con) or die(mysql_error()); $ResCtc=mysql_fetch_assoc($SqlCtc); 
//$Ename = $ResCtc['Fname'].' '.$ResCtc['Sname'].' '.$ResCtc['Lname'];

$SqlStat=mysql_query("select hrm_company_statutory_lumpsum.*,hrm_company_statutory_taxsaving.*,hrm_company_statutory_pf.* from hrm_company_statutory_lumpsum INNER JOIN hrm_company_statutory_taxsaving ON hrm_company_statutory_lumpsum.CompanyId=hrm_company_statutory_taxsaving.CompanyId INNER JOIN hrm_company_statutory_pf ON hrm_company_statutory_lumpsum.CompanyId=hrm_company_statutory_pf.CompanyId where hrm_company_statutory_lumpsum.CompanyId=".$ComId, $con); $ResStat=mysql_fetch_assoc($SqlStat);

$sqlSet=mysql_query("select EffectedDate2,AllowEmpDoj,Arrear_NOM from hrm_pms_setting where CompanyId=".$ComId." AND Process='PMS'", $con); $resSet=mysql_fetch_array($sqlSet); 
$EffDate=$resSet['EffectedDate2']; $AllowDoj=$resSet['AllowEmpDoj'];
$Prev_From_EffDate=date("Y-m-d",strtotime('-1 day', strtotime($resSet['EffectedDate2'])));
?> 
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.th{ font-family:Times New Roman;font-size:12px;height:25px;text-align:center;color:#FFFFFF;font-weight:bold; }
.tdl{ font-family:Times New Roman;font-size:12px;text-align:left; }
.tdc{ font-family:Times New Roman;font-size:12px;text-align:center; }
.tdinput{ font-family:Times New Roman;font-size:14px;text-align:center;width:100%; border:hidden; }
.tdinputl{ font-family:Times New Roman;font-size:14px;text-align:left;width:100%; border:hidden; }
.tdsel{ font-family:Times New Roman;font-size:14px;text-align:left; width:100%;}
.h{ text-align:center;font-family:Times New Roman;color:#FFFFFF;font-size:12px;font-weight:bold; }
.hl{ font-family:Times New Roman;color:#FFFFFF;font-size:14px;font-weight:bold; }
.td2{ text-align:center;font-family:Times New Roman;font-size:12px; }
.td22{ text-align:center;font-family:Times New Roman;font-size:14px; }
.td3{ font-family:Times New Roman;font-size:12px; }
.td33{ font-family:Times New Roman;font-size:14px; }
 .inner_table{height:150px;overflow-y:auto;width:auto;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<!--<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>-->
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<Script type="text/javascript" language="javascript">
$(document).ready(function () { $("#table1").freezeHeader({ 'height': '150px' }); })

/*------------------------------------------------HR SAVE Open --------------------------------*/
function ClickEdit(value) 
{ 
 if(value==1)
 { 
  document.getElementById("PIS").readOnly=false; document.getElementById("PCS").readOnly=false;
  document.getElementById("SaveIcon").style.display='block';
  document.getElementById("TD").style.backgroundColor='#CCFFCC'; 
  document.getElementById("TD2").style.backgroundColor='#CCFFCC';
  document.getElementById("PIS").style.backgroundColor='#CCFFCC'; 
  document.getElementById("PCS").style.backgroundColor='#CCFFCC'; 
  var TDNo=document.getElementById("No").value; document.getElementById("HRRemark").disabled=false;
  CalArrProInc();
 } 
 if(value==2)
 { 
  document.getElementById("PIS").readOnly=true; document.getElementById("PCS").readOnly=true;
  document.getElementById("SaveIcon").style.display='none';
  document.getElementById("TD").style.backgroundColor='#FFFFFF'; 
  document.getElementById("TD2").style.backgroundColor='#FFFFFF';
  document.getElementById("PIS").style.backgroundColor='#FFFFFF'; 
  document.getElementById("PCS").style.backgroundColor='#FFFFFF'; 
  var TDNo=document.getElementById("No").value; document.getElementById("HRRemark").disabled=true; 
  document.getElementById("TDC"+TDNo).style.backgroundColor='#FFFFFF'; 
  var PmsId=document.getElementById("PmsId").value; var EmpId=document.getElementById("EmpId").value; 
  var ProGSPM = parseFloat(document.getElementById("PIS").value); 
  var Per_ProGSPM = parseFloat(document.getElementById("PPIS").value); 
  var ProSC = parseFloat(document.getElementById("PCS").value); 
  var TotalProGSPM = parseFloat(document.getElementById("GMS").value); 
  var Per_TotalProGSPM = parseFloat(document.getElementById("PINMS").value); 
  var ComId=document.getElementById("ComId").value; var Rating=document.getElementById("Rating").value;
  var MinV=parseFloat(document.getElementById("MinV").value); var MaxV=parseFloat(document.getElementById("MaxV").value);
  var Per_ProSC=document.getElementById("PPCS").value; var IncSalaryPM=document.getElementById("INMS").value; 
  var TotalAnnualSalary=document.getElementById("GAS").value; var Cal_MinGSV=document.getElementById("Cal_MinGSV").value; 
  var UId=document.getElementById("UId").value; var Score=document.getElementById("Score").value; 
  var DesigId=document.getElementById("DesigId").value; var GradeId=document.getElementById("GradeId").value;  
  var HRRemark=document.getElementById("HRRemark").value; var CurrDesigId=document.getElementById("EmpCurrDesigId").value;
  var CurrGradeId=document.getElementById("EmpCurrGradeId").value;
  var Per_SC=parseFloat(document.getElementById("PPCS").value);  
  var Per_AG=parseFloat(document.getElementById("ActualPer_Gross").value); 
  var ActualPer=Math.round((Per_SC+Per_AG)*100)/100; 
  var UpDesigId = document.getElementById("UpDesigId").value; 
  var Extra3Month = document.getElementById("Extra3Month").value;
  var agree=confirm("Are you sure you want to approved data?"); 
  if(agree) 
  {
   var url = 'HRNormalizedInc.php'; var pars = 'AppProGSPM='+ProGSPM+'&PmsId='+PmsId+'&EmpId='+EmpId+'&Per_ProGSPM='+Per_ProGSPM+'&ProSC='+ProSC+'&Per_ProSC='+Per_ProSC+'&TProGSPM='+TotalProGSPM+'&Per_TProGSPM='+Per_TotalProGSPM+'&IncSalaryPM='+IncSalaryPM+'&TAS='+TotalAnnualSalary+'&UId='+UId+'&Score='+Score+'&Rating='+Rating+'&DesigId='+DesigId+'&GradeId='+GradeId+'&Remark='+HRRemark+'&CurrDId='+CurrDesigId+'&CurrGId='+CurrGradeId+'&ActualPer='+ActualPer+'&Extra3Month='+Extra3Month; 
   var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_ApprovedInc });
   return true; 
  }else{ return false; }
 } 
}
function show_ApprovedInc(originalRequest)
{ document.getElementById("msg").innerHTML = originalRequest.responseText; 
  var GSPM = parseFloat(document.getElementById("GMS").value); 
  var EmpGS = document.getElementById("EmpGrossMonSalary").value=Math.round((GSPM)*100)/100; 
  document.getElementById("ChangeCtc").disabled=false; 
  document.getElementById("ChangeElig").disabled=false; 
  
  document.getElementById("EmpActPf").disabled=false; 
  document.getElementById("EmpComActPf").disabled=false; 
  
  var GS_PAC = document.getElementById("GrossMonSalary_PAC").value=Math.round((GSPM)*100)/100;  
  var GMS_PAC = document.getElementById("GMS_PAC").value=Math.round((GSPM)*100)/100; 
  GrossSalary(); 
} 


function CalArrProInc()
{
/****************************** Arreaer Open ******/
var IncSalaryPM = parseFloat(document.getElementById("INMS").value);
document.getElementById("Extra3Month").value=0;
/*
var Dojj = document.getElementById("Doj").value;
var Apr_16="04/01/2016"; var Sep_16="09/30/2016"; var Dec_16="12/31/2016"; 
var Doj = new Date(Dojj); 
var Apr16 = new Date(Apr_16); var Sep16 = new Date(Sep_16); var Dec16 = new Date(Dec_16); 

if(Doj<Apr16 || (Doj>=Apr16 && Doj<=Sep16))
{ document.getElementById("Extra3Month").value=Math.round((IncSalaryPM*1)*100)/100; }	
 else if(Doj>Sep16 && Doj<=Dec16)
 {
  var timeDiff = Math.abs(Dec16.getTime()-Doj.getTime());
  var diffDays = Math.ceil(timeDiff/(1000*3600*24));
  
  if(diffDays<=30){var m=0; var d=diffDays; }
  else if(diffDays>31 && diffDays<=61){var m=1; var d=diffDays-31; }
  else if(diffDays>61 && diffDays<=90){var m=2; var d=diffDays-61; }
  else if(diffDays>90){var m=3; var d=0; }
	   
  var PerM2=IncSalaryPM;  var PerD2=PerM2/30;
  var Month_Per2=PerM2*m; var Day_Per2=PerD2*d; 
  document.getElementById("Extra3Month").value=Math.round(Month_Per2+Day_Per2);
  //alert(Month_Per2+Day_Per2);
   
 }
 else if(Doj>Dec16){ document.getElementById("Extra3Month").value=0; }
*/
}

function CalProInc()
{ 
 var ProGSPM = parseFloat(document.getElementById("PIS").value); 
 var Per_ProGSPM = parseFloat(document.getElementById("PPIS").value); 
 var ProSC = parseFloat(document.getElementById("PCS").value);
 var TotalProGSPM = parseFloat(document.getElementById("GMS").value);
 var Per_TotalProGSPM = parseFloat(document.getElementById("PINMS").value); 
 var GS = parseFloat(document.getElementById("GS").value); 
 var MinV = parseFloat(document.getElementById("MinV").value); 
 var MaxV= parseFloat(document.getElementById("MaxV").value);  
 var Cal_OnePer = Math.round(((GS*1)/100)*100)/100;  
 var Cal_MinGSV = document.getElementById("Cal_MinGSV").value=Math.round((ProGSPM-GS)*100)/100; 
 var Cal_Per_ProInc = document.getElementById("PPIS").value=Math.round((Cal_MinGSV/Cal_OnePer)*100)/100;  
 var Cal_Per_ProSC = document.getElementById("PPCS").value=Math.round((ProSC/Cal_OnePer)*100)/100; 
 var Cal_TotGSPM = document.getElementById("GMS").value=Math.round((ProGSPM+ProSC)*100)/100; 
 var Cal_Per_TotGSPM = document.getElementById("PINMS").value=Math.round((Cal_Per_ProInc+Cal_Per_ProSC)*100)/100;
 var Cal_IncGrossAnnual = document.getElementById("GAS").value=Math.round((Cal_TotGSPM*12)*100)/100;
 var Cal_IncGrossMonthalySalary = document.getElementById("INMS").value=Math.round((Cal_MinGSV+ProSC)*100)/100;
 
/****************************** Arreaer Open ******
var IncSalaryPM = parseFloat(document.getElementById("INMS").value);
var Dojj = document.getElementById("Doj").value;
var Apr_16="04/01/2016"; var Sep_16="09/30/2016"; var Dec_16="12/31/2016"; 
var Doj = new Date(Dojj); 
var Apr16 = new Date(Apr_16); var Sep16 = new Date(Sep_16); var Dec16 = new Date(Dec_16); 

if(Doj<Apr16 || (Doj>=Apr16 && Doj<=Sep16))
{ document.getElementById("Extra3Month").value=Math.round((IncSalaryPM*3)*100)/100; }	
else if(Doj>Sep16 && Doj<=Dec16)
{
  var timeDiff = Math.abs(Dec16.getTime()-Doj.getTime());
  var diffDays = Math.ceil(timeDiff/(1000*3600*24));
  
  if(diffDays<=30){var m=0; var d=diffDays; }
  else if(diffDays>31 && diffDays<=61){var m=1; var d=diffDays-31; }
  else if(diffDays>61 && diffDays<=90){var m=2; var d=diffDays-61; }
  else if(diffDays>90){var m=3; var d=0; }
	   
  var PerM2=IncSalaryPM;  var PerD2=PerM2/30;
  var Month_Per2=PerM2*m; var Day_Per2=PerD2*d; 
  document.getElementById("Extra3Month").value=Math.round(Month_Per2+Day_Per2);
  //alert(Month_Per2+Day_Per2);
   
}
else if(Doj>Dec16){ document.getElementById("Extra3Month").value=0; }

//alert(Incm_Per+"-"+OldGross+"-"+Doj+"-"+Apr16+"-"+Sep16+"-"+Oct16+"-"+Dec16+"-"+Jan17);
/**************************** Arreaer Close ********/
  
}

function ClickSaveEdit(EmpId,PmsId)
{ 
 var ProGSPM = parseFloat(document.getElementById("PIS").value); 
 var Per_ProGSPM = parseFloat(document.getElementById("PPIS").value); 
 var ProSC = parseFloat(document.getElementById("PCS").value); 
 var TotalProGSPM = parseFloat(document.getElementById("GMS").value); 
 var Per_TotalProGSPM = parseFloat(document.getElementById("PINMS").value);  
 var ComId=document.getElementById("ComId").value; var Rating=document.getElementById("Rating").value;
 var MinV=parseFloat(document.getElementById("MinV").value); var MaxV=parseFloat(document.getElementById("MaxV").value);
 var Per_ProSC=document.getElementById("PPCS").value; var IncSalaryPM=document.getElementById("INMS").value; 
 var TotalAnnualSalary=document.getElementById("GAS").value; var Cal_MinGSV=document.getElementById("Cal_MinGSV").value; 
 var UId=document.getElementById("UId").value; var Score=document.getElementById("Score").value;  
 var DesigId=document.getElementById("DesigId").value; var GradeId=document.getElementById("GradeId").value;  
 var HRRemark=document.getElementById("HRRemark").value; var CurrDesigId=document.getElementById("EmpCurrDesigId").value;
 var CurrGradeId=document.getElementById("EmpCurrGradeId").value; 
 var UpDesigId = document.getElementById("UpDesigId").value;  var Y = document.getElementById("YId").value;
 var Per_SC=parseFloat(document.getElementById("PPCS").value);   
 var Per_AG=parseFloat(document.getElementById("ActualPer_Gross").value); 
 var ActualPer=Math.round((Per_SC+Per_AG)*100)/100; 
 var Extra3Month = document.getElementById("Extra3Month").value;
 
 var agree=confirm("Are you sure you want to save data?"); 
 if (agree) 
 {
  var url = 'HRNormalizedInc.php'; var pars = 'ProGSPM='+ProGSPM+'&PmsId='+PmsId+'&EmpId='+EmpId+'&Per_ProGSPM='+Per_ProGSPM+'&ProSC='+ProSC+'&Per_ProSC='+Per_ProSC+'&TProGSPM='+TotalProGSPM+'&Per_TProGSPM='+Per_TotalProGSPM+'&IncSalaryPM='+IncSalaryPM+'&TAS='+TotalAnnualSalary+'&UId='+UId+'&Score='+Score+'&Rating='+Rating+'&DesigId='+DesigId+'&GradeId='+GradeId+'&Remark='+HRRemark+'&CurrDId='+CurrDesigId+'&CurrGId='+CurrGradeId+'&ActualPer='+ActualPer+'&Y='+Y+'&Extra3Month='+Extra3Month; 
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_HRIncNormalized });
  return true; 
 }else{ return false; } 
}
function show_HRIncNormalized(originalRequest)
{ document.getElementById("msg").innerHTML = originalRequest.responseText; 
  document.getElementById("PIS").readOnly=true; document.getElementById("PCS").readOnly=true;
  document.getElementById("SaveIcon").style.display='none';
  document.getElementById("TD").style.backgroundColor='#FFFFFF'; 
  document.getElementById("TD2").style.backgroundColor='#FFFFFF';
  document.getElementById("PIS").style.backgroundColor='#FFFFFF'; 
  document.getElementById("PCS").style.backgroundColor='#FFFFFF';
  var TDNo=document.getElementById("No").value; document.getElementById("TDC"+TDNo).style.backgroundColor='#FFFFFF'; 
  var GSPM = parseFloat(document.getElementById("GMS").value);  
  var EmpGS = document.getElementById("EmpGrossMonSalary").value=Math.round((GSPM)*100)/100;
  var GS_PAC = document.getElementById("GrossMonSalary_PAC").value=Math.round((GSPM)*100)/100;  
  var GMS_PAC = document.getElementById("GMS_PAC").value=Math.round((GSPM)*100)/100; 
  document.getElementById("ChangeCtc").disabled=false; 
  document.getElementById("ChangeElig").disabled=false;
  
  document.getElementById("EmpActPf").disabled=false; 
  document.getElementById("EmpComActPf").disabled=false;
  
  GrossSalary();
}
/*------------------------------------------------HR SAVE Close --------------------------------*/ 
</script>

</head>
<body class="body">
<?php $SqlP=mysql_query("select * from hrm_employee_pms where AssessmentYear=".$YearId." AND EmployeeID=".$EmpId." AND EmpPmsId=".$PmsId, $con); $ResP=mysql_fetch_assoc($SqlP);
$sqlD=mysql_query("select DesigName,DesigId from hrm_designation where DesigId=".$ResP['Hod_EmpDesignation'],$con); 
$sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$ResP['Hod_EmpGrade']." AND CompanyId=".$ComId,$con);
$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeId=".$ResP['Hod_EmpGrade']." AND CompanyId=".$ComId,$con); $sqlDe=mysql_query("select DesigName,DesigId from hrm_designation where DesigId=".$ResP['HR_CurrDesigId'], $con);
$sqlGr=mysql_query("select GradeValue from hrm_grade where GradeId=".$ResP['HR_CurrGradeId']." AND CompanyId=".$ComId,$con);
$resD=mysql_fetch_assoc($sqlD); $resG=mysql_fetch_assoc($sqlG); $resGrade=mysql_fetch_assoc($sqlGrade);
$resDe=mysql_fetch_assoc($sqlDe); $resGr=mysql_fetch_assoc($sqlGr);
$sqlN1 = mysql_query("select Fname, Sname, Lname from hrm_employee where EmployeeID=".$ResP['Appraiser_EmployeeID'],$con); 
$sqlN2 = mysql_query("select Fname, Sname, Lname from hrm_employee where EmployeeID=".$ResP['Reviewer_EmployeeID'],$con);
$sqlN3 = mysql_query("select Fname, Sname, Lname from hrm_employee where EmployeeID=".$ResP['HOD_EmployeeID'], $con);
$resN1=mysql_fetch_assoc($sqlN1); $resN2=mysql_fetch_assoc($sqlN2); $resN3=mysql_fetch_assoc($sqlN3);

if($resGrade['GradeValue']!=''){ $Grade=$resGrade['GradeValue']; }  
elseif($resGrade['GradeValue']=='') {$Grade=$resGr['GradeValue'];} 

if($Grade!='')
{ 
 $sqlLod=mysql_query("select * from hrm_lodentitle where GradeValue='".$Grade."' AND CompanyId=".$ComId, $con); 
 $sqlDaily=mysql_query("select * from hrm_dailyallow where GradeValue='".$Grade."' AND CompanyId=".$ComId, $con);
 $sqlEnt=mysql_query("select * from hrm_travelentitle where GradeValue='".$Grade."' AND CompanyId=".$ComId, $con);
 $sqlElig=mysql_query("select * from hrm_traveleligibility where GradeValue='".$Grade."' AND CompanyId=".$ComId, $con);
 $resLod=mysql_fetch_assoc($sqlLod);  $resDaily=mysql_fetch_assoc($sqlDaily);
 $resEnt=mysql_fetch_assoc($sqlEnt);  $resElig=mysql_fetch_assoc($sqlElig); 
 $sqlVehp=mysql_query("select * from hrm_vehiclepolicy where GradeValue='".$Grade."' AND CompanyId=".$ComId,$con); 
 $resVehp=mysql_fetch_assoc($sqlVehp);
} 
$SqlEligEmp = mysql_query("SELECT * FROM hrm_employee_eligibility WHERE Status='A' AND EmployeeID=".$EmpId, $con);  $ResEligEmp=mysql_fetch_assoc($SqlEligEmp); 
if($Grade=='M4' OR $Grade=='M5' OR $Grade=='L1'){$Cond='(Approval based)';}
elseif($Grade=='L2' OR $Grade=='L3'){$Cond='(Need based)';}
else{$Cond='';}

/* DA head Quarter */
if($ResCtc['DepartmentId']==3){$InsideHq=$resDaily['OutSiteHQ_PD']; $OutsideHq=$resDaily['OutSiteHQ']; } 
elseif($ResCtc['DepartmentId']==4){$InsideHq=$resDaily['OutSiteHQ_Prod']; $OutsideHq=$resDaily['OutSiteHQ']; }
elseif($ResCtc['DepartmentId']==6){$InsideHq=$resDaily['OutSiteHQ_Sales']; $OutsideHq=$resDaily['OutSiteHQ']; }
else{ $InsideHq=''; $OutsideHq=$resDaily['OutSiteHQ']; }

/* Two Weeler Four Weeler Eligibility */ 
$TwoW=$resElig['TwoWheeler']; $FourW=$resElig['FourWheeler'];
if($ResEmp['DepartmentId']==2)
{ 
 $TwoMxPD=$resElig['TwoWheeler_Restric_Resrch_PD'];  $TwoMxPM=$resElig['TwoWheeler_Restric_Resrch']; 
 $TwoMxPD_Out=$resElig['TwoWheeler_Restric_OutSite_Resrch_PD']; $TwoMxPM_Out=$resElig['TwoWheeler_Restric_OutSite_Resrch'];
 $FourMxPM=$resElig['FourWheeler_Restric_Resrch']; $FourMxPM_Out=$resElig['FourWheeler_Restric_OutSite_Resrch'];
} 
elseif($ResCtc['DepartmentId']==6)
{ 
 $TwoMxPD=$resElig['TwoWheeler_Restric_Sales_PD'];  $TwoMxPM=$resElig['TwoWheeler_Restric_Sales']; 
 $TwoMxPD_Out=$resElig['TwoWheeler_Restric_OutSite_Sales_PD'];  $TwoMxPM_Out=$resElig['TwoWheeler_Restric_OutSite_Sales'];
 $FourMxPM=$resElig['FourWheeler_Restric_Sales']; $FourMxPM_Out=$resElig['FourWheeler_Restric_OutSite_Sales'];
}
else
{  
 $TwoMxPD=$resElig['TwoWheeler_Restric_PD'];  $TwoMxPM=$resElig['TwoWheeler_Restric']; 
 $TwoMxPD_Out=$resElig['TwoWheeler_Restric_OutSite_PD'];  $TwoMxPM_Out=$resElig['TwoWheeler_Restric_OutSite'];
 $FourMxPM=$resElig['FourWheeler_Restric']; $FourMxPM_Out=$resElig['FourWheeler_Restric_OutSite'];
} 

?>   

<table class="table" style="width:100%;">
 <tr>
 <td valign="top">
 <input type="hidden" id="EmpId" value="<?php echo $resSet['Arrear_NOM']; ?>" />
 <input type="hidden" id="EmpId" value="<?php echo $EmpId; ?>" />
 <input type="hidden" id="PmsId" value="<?php echo $PmsId; ?>" />
 <input type="hidden" id="YId" value="<?php echo $YearId; ?>" /> 
 <input type="hidden" id="UId" value="<?php echo $UId; ?>" />
 <input type="hidden" id="ComId" value="<?php echo $ComId; ?>" />
 <input type="hidden" id="EmpCurrDesigId" value="<?php echo $ResCtc['DesigId']; ?>" />
 <input type="hidden" id="EmpCurrGradeId" value="<?php echo $ResCtc['GradeId']; ?>" />
 <input type="hidden" id="UpDesigId" value="<?php echo $ResCtc['DesigId']; ?>" />
 <table style="width:100%;margin-top:0px;" border="0">
  <tr>
   <td>
   <table style="width:100%;">
    <tr>	
     <td valign="top" style="width:100%;">
     <table border="0" width="100%">
     <tr>
	  <td class="h" style="color:#000000;font-size:18px;">
	  <font color="#6A3500">EmpCode: </font><?php echo $ResCtc['EmpCode']; ?>,&nbsp;&nbsp;&nbsp;&nbsp;
	  <font color="#6A3500">Name: </font><?php echo $ResCtc['Fname'].' '.$ResCtc['Sname'].' '.$ResCtc['Lname']; ?>,&nbsp;&nbsp;&nbsp;&nbsp;
	  <font color="#6A3500">Department: </font><?php echo $ResCtc['DepartmentName']; ?>,&nbsp;&nbsp;&nbsp;&nbsp;
	  </td>
	 </tr>
	 <tr>
	  <td class="h" style="color:#0060BF;">
	  <font color="#6A3500"><u>Appraiser</u>: </font><?php echo $resN1['Fname'].' '.$resN1['Sname'].' '.$resN1['Lname']; ?>,&nbsp;&nbsp;&nbsp;&nbsp;<font color="#6A3500"><u>Reviewer</u>: </font><?php echo $resN2['Fname'].' '.$resN2['Sname'].' '.$resN2['Lname']; ?>,&nbsp;&nbsp;&nbsp;&nbsp;<font color="#6A3500"><u>HOD</u>: </font><?php echo $resN3['Fname'].' '.$resN3['Sname'].' '.$resN3['Lname']; ?>
	  </td>
	 </tr>
     </table>
     </td>
    </tr>
   </table>	
   </td>
  </tr>
  <tr>
  <td style="width:100%;">
  <table border="1" id="table1" cellspacing="0" style="width:100%;">
   <div class="thead">
   <thead>
   <tr bgcolor="#7a6189">
	<td class="h" style="width:4%;">Pre. Grade</td>
	<td class="h" style="width:4%;">Pro. Grade</td>
    <td class="h" style="width:15%;">Previouse Designation</td>
    <td class="h" style="width:15%;">Proposed Designation</td>
    <td class="h" style="width:5%;">Change_Date</td>
    <td class="h" style="width:5%;">Basic</td> 
    <td class="h" style="width:5%;">HRA</td> 
    <td class="h" style="width:5%;">CA</td> 
    
    <td class="h" style="width:5%;">Car Allowance</td>
    
    <td class="h" style="width:5%;">SA</td>   
    <td class="h" style="width:5%;">Pre.<br>GSPM</td>
    <td class="h" style="width:5%;">PGSPM</td>
    <td class="h" style="width:5%;">% PIS</td>
    <td class="h" style="width:5%;">Salary<br>Correction</td>
    <td class="h" style="width:5%;">Total<br>PGSPM</td>
    <td class="h" style="width:5%;">% Total<br>PGSPM</td>
    <td class="h" style="width:5%;">CTC</td>
    <td class="h" style="width:4%;">Score</td>
    <td class="h" style="width:4%;">Rating</td>
   </tr>
   </thead>
   </div>
   <?php $sqlHistory=mysql_query("select * from hrm_pms_appraisal_history where EmpCode=".$ResCtc['EmpCode']." AND CompanyId=".$ComId." order by SalaryChange_Date DESC", $con); $Sno=1; while($resHistory=mysql_fetch_array($sqlHistory)){ 
   
   $sn_ctc=mysql_query("select CAR_ALL_Value,Tot_CTC from hrm_employee_ctc where CtcCreatedDate='".$resHistory['SalaryChange_Date']."' AND CtcId=(select Max(CtcId) from hrm_employee_ctc where EmployeeID=".$EmpId." AND CtcCreatedDate='".$resHistory['SalaryChange_Date']."')",$con); $rn_ctc=mysql_fetch_assoc($sn_ctc);
   
   
   ?>			
   <div class="tbody">
   <tbody>
   <tr bgcolor="#FFFFFF"><input type="hidden" value="<?php echo $Sno; ?>" />
    <td class="td22"><?php echo $resHistory['Current_Grade']; ?></td>
	<td class="td22"><?php if($resHistory['Current_Grade']!=$resHistory['Proposed_Grade'] AND $resHistory['Proposed_Grade']!=''){ echo $resHistory['Proposed_Grade']; }?></td>
	<td class="td33"><?php echo ucwords(strtolower($resHistory['Current_Designation'])); ?></td>
	<td class="td33"><?php if($resHistory['Proposed_Designation']!=$resHistory['Current_Designation']){ echo ucwords(strtolower($resHistory['Proposed_Designation'])); }?></td>
	<td class="td22"><?php echo date("d-M-y",strtotime($resHistory['SalaryChange_Date'])); ?></td>
	<td class="td22"><?php echo floatval($resHistory['Salary_Basic']); ?></td>
	<td class="td22"><?php echo floatval($resHistory['Salary_HRA']); ?></td>
	<td class="td22"><?php echo floatval($resHistory['Salary_CA']); ?></td>
	
	<td class="td22"><?php echo floatval($rn_ctc['CAR_ALL_Value']); ?></td>
	
	<td class="td22"><?php echo floatval($resHistory['Salary_SA']); ?></td>
	<td class="td22" id="TDC<?php echo $Sno; ?>"><?php echo floatval($resHistory['Previous_GrossSalaryPM']); ?></td>
	<td class="td22"><?php echo floatval($resHistory['Proposed_GrossSalaryPM']); ?></td>
	<td class="td22"><?php echo floatval($resHistory['Prop_PeInc_GSPM']); ?></td>
	<td class="td22"><?php echo floatval($resHistory['PropSalary_Correction']); ?></td>
	<td class="td22"><?php echo floatval($resHistory['TotalProp_GSPM']); ?></td>
	<td class="td22"><?php echo floatval($resHistory['TotalProp_PerInc_GSPM']); ?></td>
	<td class="td22"><?php echo floatval($rn_ctc['Tot_CTC']); ?></td>
	<td class="td22"><?php echo floatval($resHistory['Score']); ?></td>
	<td class="td22"><?php echo floatval($resHistory['Rating']); ?></td>
   </tr>
   </tbody>
   </div>
   <?php $Sno++;} $no=$Sno-1; ?><input type="hidden" id="No" value="<?php echo $no; ?>" />	
  </table>
  </td>
 </tr>
 
 <form enctype="multipart/form-data" name="formEctc" method="post" onSubmit="return validate(this)">
 <?php $sqlM = mysql_query("SELECT MAX(SalaryChange_Date) as SalaryChDate FROM hrm_pms_appraisal_history where EmpCode=".$ResCtc['EmpCode']." AND SalaryChange_Date!='".$EffDate."' AND CompanyId=".$ComId, $con); 
       $resM = mysql_fetch_assoc($sqlM);  
       $sqlS = mysql_query("SELECT Previous_GrossSalaryPM,TotalProp_GSPM,Incentive FROM hrm_pms_appraisal_history where SalaryChange_Date='".$resM['SalaryChDate']."' AND EmpCode=".$ResCtc['EmpCode']." AND CompanyId=".$ComId, $con); 
	   $resS = mysql_fetch_assoc($sqlS);
	   $TPreGross=$resS['TotalProp_GSPM'];
       $sqlDJ=mysql_query("select DateJoining from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID where e.EmployeeID=".$EmpId." AND e.CompanyId=".$ComId, $con); 
	   $resDJ=mysql_fetch_assoc($sqlDJ); $DJ=$resDJ['DateJoining']; $CuDate=$Prev_From_EffDate;       
	   $diff = abs(strtotime($CuDate) - strtotime($DJ));  
	   $daysDJ = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); 
       if($ResP['Hod_TotalFinalRating']>0){ $RatingHod=$ResP['Hod_TotalFinalRating']; } 
	   else{ $RatingHod=$ResP['Reviewer_TotalFinalRating']; } 

//$ResP['HOD_EmployeeID']  //$ResP['HR_Curr_DepartmentId'] //Appraiser_EmployeeID, Reviewer_EmployeeID,
$ss= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_disrev WHERE Rating=".$RatingHod." AND HodId=".$ResP['HOD_EmployeeID']." AND (RevId=".$ResP['Appraiser_EmployeeID']." OR RevId=".$ResP['Reviewer_EmployeeID'].")  AND YearId=".$YearId." AND IncDistriFrom>0 AND CompanyId=".$ComId, $con); 
$rr=mysql_num_rows($ss);
if($rr>0){ $resMaxMin = mysql_fetch_assoc($ss); }
else
{
 $ss1= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_disdept WHERE Rating=".$RatingHod." AND HodId=".$ResP['HOD_EmployeeID']." AND DeptId=".$ResP['HR_Curr_DepartmentId']." AND YearId=".$YearId." AND IncDistriFrom>0 AND CompanyId=".$ComId, $con); $rr1=mysql_num_rows($ss1);
 if($rr1>0){ $resMaxMin = mysql_fetch_assoc($ss1); }
 else
 {
  $ss2= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dishod WHERE Rating=".$RatingHod." AND HodId=".$ResP['HOD_EmployeeID']." AND YearId=".$YearId." AND IncDistriFrom>0 AND CompanyId=".$ComId, $con); 
  $rr2=mysql_num_rows($ss2);
  if($rr2>0){ $resMaxMin = mysql_fetch_assoc($ss2); }
  else
  {
   $sqlMaxMin= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dis WHERE Rating=".$RatingHod." AND YearId=".$YearId." AND CompanyId=".$ComId, $con); $resMaxMin = mysql_fetch_assoc($sqlMaxMin); 
  }
 }
}	   
	   
	  //$sqlMaxMin= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dis WHERE Rating=".$RatingHod." AND YearId=".$YearId." AND CompanyId=".$ComId, $con); $resMaxMin = mysql_fetch_assoc($sqlMaxMin);
	  
       /**(1)************************* If Allow Minimum/Maximum *************************/
	   if($daysDJ>=180){ $Min=($TPreGross*$resMaxMin['IncDistriFrom'])/100;}else { $Min=($TPreGross*5)/100;}  				
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
  $EffDM=date("m-d",strtotime($_SESSION['EffDate']));                             // $_SESSION['EffDate']=2018-01-01  
  $MinMD=date("m-d",strtotime($Prev_From_EffDate));                    // $Prev_From_EffDate=2018-12-31, $MinMD=12-31 
  $ExtraOneD=date("Y-m-d",strtotime('+1 day', strtotime($AllowDoj)));  // $_SESSION['AllowDoj']=2018-06-30
                                                                                   // $ExtraOneD=2018-07-01
  $ExtraOneMD=date("m-d",strtotime($ExtraOneD));                                   //07-01
  $PrvY=date("Y",strtotime($AllowDoj));                                //2018
  $PrvMD=date("m-d",strtotime($AllowDoj));                             //06-30
  $cY=$PrvY; $pY=$PrvY-1;                                              //$cY=date("Y"); $pY=date("Y")-1; $cY=2018, $pY=2017

  //echo $resDJ['DateJoining'];
  //Joining<=2017-06-30 
  if($resDJ['DateJoining']<=$pY.'-'.$PrvMD AND $RatingHod>0)  //if($res['DateJoining']<=$pY.'-03-31' AND $RatingHod>0)
  {
   $TotIncAmt=($TPreGross*$resMaxMin['IncDistriFrom'])/100;
   $NewGrossAmt=10*(ceil(($TPreGross+$TotIncAmt)/10)); 
   $NewGrossAmt2=$TPreGross+$TotIncAmt;
   $TotInc2=0;
  }	 
 
  //New--> Dj>=2017-07-01 AND Dj<=2018-06-30  
  //Joining>=2017-07-01 AND Joining<=2018-06-30 
  
  elseif($resDJ['DateJoining']>=$pY.'-'.$ExtraOneMD AND $resDJ['DateJoining']<=$cY.'-'.$PrvMD AND $RatingHod>0)  
  { 
   $sqlCorr=mysql_query("SELECT MAX(SalaryChange_Date) as SalaryChDate FROM hrm_pms_appraisal_history INNER JOIN hrm_employee ON hrm_pms_appraisal_history.EmpCode=hrm_employee.EmpCode where hrm_employee.EmployeeID=".$EmpId." AND Previous_GrossSalaryPM!=".$resS['TotalProp_GSPM']." AND SalaryChange_Date>='".$resDJ['DateJoining']."' AND hrm_pms_appraisal_history.CompanyId=".$ComId, $con); $resCorr=mysql_fetch_assoc($sqlCorr); 
   $sqlCk1 = mysql_query("SELECT Previous_GrossSalaryPM,TotalProp_GSPM FROM hrm_pms_appraisal_history INNER JOIN hrm_employee ON hrm_pms_appraisal_history.EmpCode=hrm_employee.EmpCode where SalaryChange_Date='".$resDJ['DateJoining']."' AND hrm_employee.EmployeeID=".$EmpId." AND hrm_pms_appraisal_history.CompanyId=".$ComId, $con); 
   $resCk1=mysql_fetch_assoc($sqlCk1);
   $sqlCk2 = mysql_query("SELECT Previous_GrossSalaryPM,TotalProp_GSPM FROM hrm_pms_appraisal_history INNER JOIN hrm_employee ON hrm_pms_appraisal_history.EmpCode=hrm_employee.EmpCode where SalaryChange_Date='".$resCorr['SalaryChDate']."' AND hrm_employee.EmployeeID=".$EmpId." AND hrm_pms_appraisal_history.CompanyId=".$ComId, $con); 
   $resCk2=mysql_fetch_assoc($sqlCk2);
   
   //Joining>=2017-07-01 AND Joining<=2017-12-31 -->New
   if($resDJ['DateJoining']>=$pY.'-'.$ExtraOneMD AND $resDJ['DateJoining']<=$pY.'-'.$MinMD AND $RatingHod>0)
   {
     $TotIncAmt=($TPreGross*$resMaxMin['IncDistriFrom'])/100;
     $NewGrossAmt=10*(ceil(($TPreGross+$TotIncAmt)/10)); 
     $NewGrossAmt2=$TPreGross+$TotIncAmt;
	 
	 $date11 = new DateTime($resDJ['DateJoining']); $date22 = new DateTime($pY.'-'.$MinMD);
     $interval = date_diff($date22, $date11);
     $YY=$interval->format('%y');  $MM=$interval->format('%m');  $DD=$interval->format('%d');
	 $PerM2=$resMaxMin['IncDistriFrom']/12;  $PerD2=$PerM2/30;
	 $Month_Per2=round($PerM2*$MM, 3); $Day_Per2=round($PerD2*$DD, 3);
	 $MSal2=($TPreGross*$Month_Per2)/100; 
	 $DSal2=($TPreGross*$Day_Per2)/100; 
	 $TotInc2=round($MSal2+$DSal2);  //Extra 
   }      
   //Joining>=2018-01-01 AND Dj<=2018-06-30 -->New
   elseif($resDJ['DateJoining']>=$cY.'-'.$EffDM AND $resDJ['DateJoining']<=$cY.'-'.$PrvMD AND $RatingHod>0)
   {
   
    if($resCorr>0 AND $resCk2['TotalProp_GSPM']>$resCk1['TotalProp_GSPM'])
	{ //If mid-term increment $date1 = new DateTime($resCorr['SalaryChDate']);
	  $date1 = new DateTime($resDJ['DateJoining']); } 
	else{ $date1 = new DateTime($resDJ['DateJoining']); }
    $date2 = new DateTime($cY."-".$MinMD);  //$PrvMD
    $interval = date_diff($date2, $date1);
    $Y=$interval->format('%y');  $M=$interval->format('%m');  $D=$interval->format('%d');
    $PerM=$resMaxMin['IncDistriFrom']/12;  $PerD=$PerM/30;
    $Month_Per=round($PerM*$M, 3); $Day_Per=round($PerD*$D, 3);
    $MSal=($TPreGross*$Month_Per)/100; 
    $DSal=($TPreGross*$Day_Per)/100; 
    $TotInc=round($MSal+$DSal);
    $NewGrossAmt=10*(ceil(($TPreGross+$TotInc)/10)); 
    $NewGrossAmt2=$TPreGross+$TotInc; 
	$TotInc2=0; //Not Extra                      
   }
   
  }
  else
  {
   $NewGrossAmt=10*(ceil($TPreGross/10)); 
   $NewGrossAmt2=$TPreGross; 
   $TotInc2=0; //Not Extra                       
  } 
  
  if($TotInc2>0){$ActualNewGS=10*(ceil(($NewGrossAmt2+$TotInc2)/10));}
  else{$ActualNewGS=10*(ceil(($NewGrossAmt+$TotInc2)/10));}
 
/**(3)************************* If Prorata wise New Close Close Close Close Close **************************/
$Extra_3Month=0;   
?> 			  
  <tr>
   <td width="100%">
   <table width="100%">
    <tr>
     <td class="hl" style="font-size:15px;color:#005100;">Current Appraisal:&nbsp;&nbsp;
	 <input type="hidden" id="Doj" value="<?php echo date("m/d/Y",strtotime($resDJ['DateJoining']));?>"/>
	 <input type="hidden" id="Extra3Month" value="<?php echo $Extra_3Month; ?>" />
	 <input type="hidden" id="ActualPer_Gross" value="<?php if($resMaxMin['IncDistriFrom']!=''){ echo $resMaxMin['IncDistriFrom']; } else {echo 0;} ?>"/><input type="hidden" id="NewGross" value="<?php echo $ActualNewGS; ?>"/>
	 <font color="#000066">Proposed Gross Salary Per Month:</font>&nbsp;<font color="#FF2D2D"><?php echo $ActualNewGS; ?></font><input type="hidden" id="GS" name="GS" value="<?php echo $TPreGross; ?>" />
	 <input type="hidden" id="MinV" value="<?php echo $OkMin; ?>"/>
	 <input type="hidden" id="MaxV" value="<?php echo $OkMax; ?>"/>
<?php /*<font color="#480000" size="3"><u>Proposed Gross Salary Per Month</u> :</font>&nbsp;<font color="#D70000" size="3">Minimum -</font><font color="#006CD9" size="2">&nbsp;<?php echo $OkMin; ?></font>&nbsp;&nbsp;<font color="#D70000" size="3">Maximum -</font><font color="#006CD9" size="2">&nbsp;<?php echo $OkMax; ?></font>*/ ?>
	 &nbsp;&nbsp;&nbsp;<span id="msg" style="color:#C46200;"><?php echo $msg; ?></span>
	 </td>
	</tr>
   </table>
   </td>
  </tr>
  <tr>		
  <!--<tr>
   <td width="100%" class="hl" style="color:#000000;">&nbsp;<b>PG:</b>&nbsp;<font color="#004080">Proposed Grade,</font>&nbsp;&nbsp;<b>PGSPM:</b>&nbsp;<font color="#004080">Proposed Gross Salary Per Month</font>,&nbsp;&nbsp;<b>PSC :</b>&nbsp;<font color="#004080">Proposed Salary Correction</font>,&nbsp;&nbsp;<b>PNIS :</b>&nbsp;<font color="#004080">Proposed Net Increment Salary</font>,&nbsp;&nbsp;<b>TPGSPM :</b>&nbsp;<font color="#004080">Total Proposed Gross Salary Per Month</font>   </td>
  </tr>-->
  <tr>
   <td width="100%">
   <input type="hidden" id="CDesigName" value="<?php echo $resDe['DesigName']; ?>" />
   <input type="hidden" id="CGradeName" value="<?php echo $resGr['GradeValue']; ?>" />
   <input type="hidden" id="DepartmentName" name="DepartmentName" value="<?php echo $ResCtc['DepartmentName']; ?>" />
   <input type="hidden" id="EmpCode" value="<?php echo $ResCtc['EmpCode']; ?>" />
   <input type="hidden" id="Ename" value="<?php echo $ResCtc['Fname'].' '.$ResCtc['Sname'].' '.$ResCtc['Lname']; ?>" />
   <table border="1" cellspacing="1" width="100%">
	<tr bgcolor="#004000">
     <td style="width:60px;">&nbsp;</td>	 
     <td class="td22" style="color:#F9F900;font-weight:bold;width:50px;">Score</td>			
     <td class="td22" style="color:#F9F900;font-weight:bold;width:50px;">Rating</td>
     <td class="td22" style="color:#F9F900;font-weight:bold;width:350px;">Designation</td>
     <td class="td22" style="color:#F9F900;font-weight:bold;width:50px;">Grade</td>
     <td class="td22" style="color:#F9F900;font-weight:bold;width:70px;">PGSPM</td>
     <td class="td22" style="color:#F9F900;font-weight:bold;width:50px;">(%) PIS</td>
     <td class="td22" style="color:#F9F900;font-weight:bold;width:70px;">PSC</td>
     <td class="td22" style="color:#F9F900;font-weight:bold;width:50px;">(%) PSC</td>
     <td class="td22" style="color:#F9F900;font-weight:bold;width:70px;">PNIS</td>
     <td class="td22" style="color:#F9F900;font-weight:bold;width:50px;">(%) PNIS</td>
     <td class="td22" style="color:#F9F900;font-weight:bold;width:70px;">TPGSPM</td>
     <td class="td22" style="color:#F9F900;font-weight:bold;width:70px;">TPGSPA</td>
     <td class="td22" style="color:#F9F900;font-weight:bold;width:40px;">Save</td>
     <td class="td22" style="color:#F9F900;font-weight:bold;width:90px;">Action</td>
	</tr>
	<tr bgcolor="#FFFFFF">
     <td class="td33" style="font-weight:bold;color:#006A00;">&nbsp;HOD :</td>	
     <td class="td22" style="font-weight:bold;"><?php if($ResP['Hod_TotalFinalScore']>0){echo $ResP['Hod_TotalFinalScore']; } else {echo $ResP['Reviewer_TotalFinalScore']; }?></td>
     <td class="td22" style="font-weight:bold;"><?php if($ResP['Hod_TotalFinalRating']>0){echo $ResP['Hod_TotalFinalRating']; } else{echo $ResP['Reviewer_TotalFinalRating']; } ?></td>
     <td class="td33" style="font-weight:bold;"><?php if($resD['DesigName']==''){echo $resDe['DesigName'];}else{echo ucwords(strtolower($resD['DesigName']));} ?></td>
     <td class="td22" style="font-weight:bold;"><?php if($resG['GradeValue']==''){echo $resGr['GradeValue'];} else{echo $resG['GradeValue'];} ?></td>
     <td class="td22" style="font-weight:bold;"><?php echo floatval($ResP['Hod_ProIncSalary']); ?></td>
     <td class="td22" style="font-weight:bold;"><?php echo floatval($ResP['Hod_Percent_ProIncSalary']); ?></td>
     <td class="td22" style="font-weight:bold;"><?php echo floatval($ResP['Hod_ProCorrSalary']); ?></td>
     <td class="td22" style="font-weight:bold;"><?php echo floatval($ResP['Hod_Percent_ProCorrSalary']); ?></td>
     <td class="td22" style="font-weight:bold;"><?php echo floatval($ResP['Hod_IncNetMonthalySalary']); ?></td>
     <td class="td22" style="font-weight:bold;"><?php echo floatval($ResP['Hod_Percent_IncNetMonthalySalary']); ?></td>
     <td class="td22" style="font-weight:bold;"><?php echo floatval($ResP['Hod_GrossMonthlySalary']); ?></td>
     <td class="td22" style="font-weight:bold;"><?php echo floatval($ResP['Hod_GrossAnnualSalary']); ?></td> 
     <td class="td22" colspan="2" >&nbsp;</td>
    </tr>
    <tr bgcolor="#FFFFFF">
     <td class="td33" style="font-weight:bold;color:#006A00;">&nbsp;HR :</td>	  
     <td class="td22" style="color:#0080FF;font-weight:bold;"><?php if($ResP['Hod_TotalFinalScore']>0){echo $ResP['Hod_TotalFinalScore']; } else {echo $ResP['Reviewer_TotalFinalScore']; }?><input type="hidden" id="Score" name="Score" value="<?php if($ResP['Hod_TotalFinalScore']>0){echo $ResP['Hod_TotalFinalScore']; } else {echo $ResP['Reviewer_TotalFinalScore']; }?>" /></td>
     <td class="td22" style="color:#0080FF;font-weight:bold;" align="center"><?php if($ResP['Hod_TotalFinalRating']>0){echo $ResP['Hod_TotalFinalRating']; } else{echo $ResP['Reviewer_TotalFinalRating']; } ?><input type="hidden" id="Rating" name="Rating" value="<?php if($ResP['Hod_TotalFinalRating']>0){echo $ResP['Hod_TotalFinalRating']; } else{echo $ResP['Reviewer_TotalFinalRating']; } ?>" /></td>
	 <td class="td33" style="color:#0080FF;font-weight:bold;"><?php if($resD['DesigName']==''){echo ucwords(strtolower($resDe['DesigName']));}else {echo ucwords(strtolower($resD['DesigName'])); } ?><input type="hidden" id="DesigId" value="<?php echo $ResP['Hod_EmpDesignation']; ?>" /><input type="hidden" name="DesigName" id="DesigName" value="<?php if($resD['DesigName']==''){echo $resDe['DesigName'];}else {echo $resD['DesigName']; } ?>" /></td>
	 <td class="td22" style="color:#0080FF;font-weight:bold;"><?php if($resG['GradeValue']==''){echo $resGr['GradeValue'];} else{echo $resG['GradeValue'];} ?><input type="hidden" id="GradeId" value="<?php echo $ResP['Hod_EmpGrade']; ?>" /><input type="hidden" name="GradeName" id="GradeName" value="<?php if($resG['GradeValue']==''){echo $resGr['GradeValue'];} else{echo $resG['GradeValue'];} ?>" /></td>
	 <td class="td22" style="background-color:#FFFFFF;" id="TD"><input type="text" class="td22" style="border-style:hidden;border:0;text-align:center;color:#0080FF;font-weight:bold;background-color:#FFFFFF;width:100%;" id="PIS" name="PIS" value="<?php if($ResP['HR_PmsStatus']==2){echo floatval($ResP['HR_ProIncSalary']); } else { echo floatval($ResP['Hod_ProIncSalary']); } ?>" onKeyUp="CalProInc()" onChange="CalProInc()" readonly/></td>
     <td class="td22"><input type="text" class="td22" style="border-style:hidden;color:#0080FF;font-weight:bold;text-align:center;border:0;width:100%;background-color:#FFFFFF;" id="PPIS" name="PPIS" value="<?php if($ResP['HR_PmsStatus']==2){echo floatval($ResP['HR_Percent_ProIncSalary']); } else { echo floatval($ResP['Hod_Percent_ProIncSalary']); } ?>" readonly/></td>
     <td class="td22" style="background-color:#FFFFFF;" id="TD2"><input type="text" class="td22" style="border-style:hidden; border:0;width:100%;text-align:center;color:#0080FF;font-weight:bold;background-color:#FFFFFF;" id="PCS" name="PCS" value="<?php if($ResP['HR_PmsStatus']==2){echo floatval($ResP['HR_ProCorrSalary']); } else { echo floatval($ResP['Hod_ProCorrSalary']); } ?>" onKeyUp="CalProInc()" onChange="CalProInc()" readonly/></td>
     <td class="td22"><input type="text" class="td22" style="border-style:hidden;border:0;width:100%;color:#0080FF;font-weight:bold;text-align:center;background-color:#FFFFFF;" id="PPCS" name="PPCS" value="<?php if($ResP['HR_PmsStatus']==2){echo floatval($ResP['HR_Percent_ProCorrSalary']); } else { echo floatval($ResP['Hod_Percent_ProCorrSalary']); } ?>" readonly/></td>
     <td class="td22"><input type="text" class="td22" style="border-style:hidden;border:0;width:100%;color:#0080FF;font-weight:bold;text-align:center;background-color:#FFFFFF;" id="INMS" value="<?php if($ResP['HR_PmsStatus']==2){echo floatval($ResP['HR_IncNetMonthalySalary']); } else { echo floatval($ResP['Hod_IncNetMonthalySalary']); } ?>" readonly/></td>
     <td class="td22"><input type="text" class="td22" style="border-style:hidden; border:0;width:100%;color:#0080FF;font-weight:bold;text-align:center;background-color:#FFFFFF;" id="PINMS" name="PINMS" value="<?php if($ResP['HR_PmsStatus']==2){echo floatval($ResP['HR_Percent_IncNetMonthalySalary']); } else { echo floatval($ResP['Hod_Percent_IncNetMonthalySalary']); } ?>" readonly/></td>
     <td class="td22"><input type="text" class="td22" style="border-style:hidden;border:0;width:100%;color:#0080FF;font-weight:bold;text-align:center;background-color:#FFFFFF;" id="GMS" name="GMS" value="<?php if($ResP['HR_PmsStatus']==2){echo floatval($ResP['HR_GrossMonthlySalary']); } else { echo floatval($ResP['Hod_GrossMonthlySalary']); }?>" readonly/></td>
     <td class="td22"><input type="text" class="td22" style="border-style:hidden;border:0;width:100%;color:#0080FF;font-weight:bold;text-align:center;background-color:#FFFFFF;" id="GAS" name="GAS" value="<?php if($ResP['HR_PmsStatus']==2){echo floatval($ResP['HR_GrossAnnualSalary']); } else { echo floatval($ResP['Hod_GrossAnnualSalary']); } ?>" readonly/>
     <input type="hidden" value="" id="Cal_MinGSV" /></td>

     <td align="center"><img src="images/save.gif" border="0" id="SaveIcon" onClick="return ClickSaveEdit(<?php echo $EmpId.','.$PmsId; ?>); CalProInc();" style="display:none;"/></td>
     <td class="td22"><select class="td33" id="ActionInc" style="width:100%;background-color:#CCFFCC;" onChange="return ClickEdit(this.value)"><option value="0" style="background-color:#FFFFFF;">Select</option><option value="1">Edit</option><option value="2">Approved</option></select></td>
    </tr>
   </table>	 
   </td>
  </tr>	
  <tr>
   <td class="td33" style="width:100%;color:#000000;">
    <table border="0">
	 <tr>
	  <td class="td33" style="width:10%;color:#000000;"><b>&nbsp;HR Remark :</b></td>
	  <td class="td33" style="width:80%;color:#000000;"><input class="td33" style="width:100%;background-color:#FFFFFF;" id="HRRemark" value="<?php echo $ResP['HR_Remark']; ?>" maxlength="250" disabled/></td>
	  <td class="td33" style="width:5%;color:#000000;" align="right"><b>&nbsp;Date :</b></td>
	  <td class="td33" style="width:10%;color:#000000;"><input class="td22" style="width:100px;font-weight:bold;background-color:#CCFFCC;" id="CHDate" name="CHDate" value="<?php echo date("d-m-Y",strtotime($EffDate)); ?>" readonly/>
   <?php /*?>&nbsp;<button id="PPTo" class="CalenderButton" disabled></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); cal.manageFields("PPTo", "CHDate", "%d-%m-%Y");</script><?php */?></td>
	 </tr>
	</table>
    </td>
   </tr>  
  </table> 
  </td>
 </tr>
 <tr>		
  <td valign="top" align="center" width="100%" id="MainWindow">
  
<?php /***************START*****START*****START******START******START****************************/ ?>
<?php /***************START*****START*****START******START******START****************************/ ?>
  <table border="0" style="margin-top:0px;width:100%;">
  <tr> 
   <td align="left" id="Ectc" valign="top">             
   <table border="1" width="100%" cellspacing="1">
    <tr>
	 <td class="td22" style="width:50%;font-weight:bold;height:20px;background-color:#6FB7FF;">Cost To Company</td>
     <td class="td22" style="width:50%;font-weight:bold;height:20px;background-color:#6FB7FF;">Eligibility</td>
    </tr> 
    <tr> 
     <td align="left" valign="top"><?php include("Sett_Ctc.php"); ?></td>
     <td align="left" id="Eelig" valign="top"> 
      <table border="0">
       <tr><?php include("Sett_Elig.php"); ?></tr>

       <tr><td>&nbsp;</td></tr>
       <tr>
        <td colspan="6">
         <table border="1" cellspacing="1" style="background-color:#6FB7FF;width:100%;">
          <tr><td class="td22" style="width:100%;color:#000000;font-weight:bold;">Print & View</td></tr>
         </table>
        </td>
       </tr>
<script>
function LetterClick(P,E,Y,C,R,G,D)
{ window.open("VeiwAppLetter.php?action=Letter&P="+P+"&E="+E+"&Y="+Y+"&C="+C+"&R="+R+"&G="+G+"&D="+D,"AppLetter","scrollbars=yes,resizable=no,width=820,height=750,menubar=no,location=no,directories=no");}
function LetterCTC(P,E,Y,C,R,G,D)
{window.open("VeiwAppCTC.php?action=Ctc&P="+P+"&E="+E+"&Y="+Y+"&C="+C+"&R="+R+"&G="+G+"&D="+D,"AppLetter","scrollbars=yes,resizable=no,width=820,menubar=yes,height=750,location=no,directories=no");}
function LetterElig(P,E,Y,C,R,G,D)
{window.open("VeiwAppElig.php?action=Elig&P="+P+"&E="+E+"&Y="+Y+"&C="+C+"&R="+R+"&G="+G+"&D="+D,"AppLetter","scrollbars=yes,resizable=no,menubar=yes,width=820,height=750,location=no,directories=no");}
function LetterAll(P,E,Y,C,R,G,D)
{window.open("VeiwAppAll.php?action=All&P="+P+"&E="+E+"&Y="+Y+"&C="+C+"&R="+R+"&G="+G+"&D="+D,"AppLetter","scrollbars=yes,resizable=no,menubar=yes,width=820,height=750,location=no,directories=no");}
function LetterAllPdf(P,E,Y,C,R,G,D)
{window.open("VeiwAppAllPdf.php?action=All&P="+P+"&E="+E+"&Y="+Y+"&C="+C+"&R="+R+"&G="+G+"&D="+D,"AppLetter","scrollbars=yes,resizable=no,menubar=yes,width=820,height=750,location=no,directories=no");}
</script>
       <tr>
        <td colspan="6" align="center">
         <table border="0">
          <tr>
           <td class="td22" style="width:150px;font-weight:bold;">
           <?php if($ResP['Hod_TotalFinalRating']>0){$EmpRating=$ResP['Hod_TotalFinalRating']; } else{$EmpRating=$ResP['Reviewer_TotalFinalRating']; }if($resG['GradeValue']==''){$EmpGrade=$resGr['GradeValue'];} else{$EmpGrade=$resG['GradeValue'];} if($resD['DesigId']==''){$Desig=$resDe['DesigId'];}else {$Desig=$resD['DesigId']; }?>
    <a href="#" onClick="LetterClick(<?php echo $PmsId.','.$EmpId.','.$YearId.','.$ComId.','.$EmpRating; ?>,'<?php echo $EmpGrade; ?>',<?php echo $Desig; ?>)"><font color="#005100">Appraisal Letter</font></a></td>
	  
           <td class="td22" style="width:150px;font-weight:bold;"><a href="#" onClick="LetterCTC(<?php echo $PmsId.','.$EmpId.','.$YearId.','.$ComId.','.$EmpRating; ?>,'<?php echo $EmpGrade; ?>',<?php echo $Desig; ?>)"><font color="#005100">CTC</font></td>	
           <td class="td22" style="width:150px;font-weight:bold;"><a href="#" onClick="LetterElig(<?php echo $PmsId.','.$EmpId.','.$YearId.','.$ComId.','.$EmpRating; ?>,'<?php echo $EmpGrade; ?>',<?php echo $Desig; ?>)"><font color="#005100">Eligibility</font></td> 
           <td class="td22" style="width:150px;font-weight:bold;"><a href="#" onClick="LetterAll(<?php echo $PmsId.','.$EmpId.','.$YearId.','.$ComId.','.$EmpRating; ?>,'<?php echo $EmpGrade; ?>',<?php echo $Desig; ?>)"><font color="#005100">All</font></td> 
           <td class="td22" style="width:150px;font-weight:bold;"><a href="#" onClick="LetterAllPdf(<?php echo $PmsId.','.$EmpId.','.$YearId.','.$ComId.','.$EmpRating; ?>,'<?php echo $EmpGrade; ?>',<?php echo $Desig; ?>)"><font color="#005100">Pdf</font></td>	
          </tr>
        </table>
       </td>
      </tr>
     </table>
   </form> 
  </td>
 </tr>
</table>
  </td>
 </tr>
</table>
   </td>
 </tr>
</table>
  </td>
 </tr>
<?php //*************END*****END*****END******END******END************************/ ?>
<?php //*************END*****END*****END******END******END************************/ ?>	
 <tr><td style="height:100px;">&nbsp;</td></tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>
<?php } ?>