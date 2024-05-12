<?php session_start();

if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
$sqlSY=mysql_query("select OldY,CurrY,NewY from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='KRA'", $con); $resSY=mysql_fetch_array($sqlSY); 
$sqlSYP=mysql_query("select OldY,CurrY,NewY from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='PMS'", $con); $resSYP=mysql_fetch_array($sqlSYP); 
/******************************************************************************/
$sql22=mysql_query("select hrm_employee.EmpCode, hrm_employee.EmployeeID from hrm_employee INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$YearId." AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_pms.HOD_EmployeeID=".$EmployeeId, $con); 
while($res22=mysql_fetch_array($sql22)){    				
$sqlM = mysql_query("SELECT MAX(SalaryChange_Date) as SalaryChDate FROM hrm_pms_appraisal_history where SalaryChange_Date!='".date("Y-10-01")."' AND EmpCode=".$res22['EmpCode']." AND CompanyId=".$CompanyId, $con); $resM = mysql_fetch_assoc($sqlM);
$sqlAmt=mysql_query("select Previous_GrossSalaryPM, Incentive from hrm_pms_appraisal_history where SalaryChange_Date='".$resM['SalaryChDate']."' AND EmpCode=".$res22['EmpCode']." AND CompanyId=".$CompanyId, $con); $resAmt=mysql_fetch_assoc($sqlAmt); 
//$sqlUp=mysql_query("update hrm_pms_appraisal_history set HOD_EmployeeID=".$EmployeeId." where EmpCode=".$res22['EmpCode']." AND CompanyId=".$CompanyId, $con);
//$sqlUp=mysql_query("update hrm_employee_pms set EmpCurrGrossPM=".$resAmt['Previous_GrossSalaryPM'].", EmpCurrIncentivePM=".$resAmt['Incentive']." where EmployeeID=".$res22['EmployeeID']." AND CompanyId=".$CompanyId." AND AssessmentYear=".$YearId, $con); 
}
$SqlCount=mysql_query("select SUM(EmpCurrGrossPM) as TEGSPM, SUM(EmpCurrIncentivePM) as TEAMINC, SUM(Hod_IncNetMonthalySalary) as TINMS, SUM(Hod_GrossMonthlySalary) as TEPGS, SUM(HodPer_PIS_From_PreMyTGrossPM) as PIS, SUM(HodPer_SC_From_PreMyTGrossPM) as PSC, SUM(Hod_Incentive) as HINCentv from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$YearId." AND hrm_employee_pms.HOD_EmployeeID=".$EmployeeId, $con); $sno=1; while($ResCount=mysql_fetch_array($SqlCount))
{ $TTeamPreGPM=$ResCount['TEGSPM']; $TTeamProGPM=$ResCount['TEPGS']; $INCTV=$ResCount['TEAMINC']; 
  $TotalTPerPIS=number_format($ResCount['PIS'], 2, '.', ''); $TotalTPerPSC=number_format($ResCount['PSC'], 2, '.', ''); $Inc=$ResCount['TINMS']; 
  $HINCentv=$ResCount['HINCentv']; }

$TPreGrossSalary=$TTeamPreGPM+$INCTV; $TotalTeamPreGrossPM=number_format($TPreGrossSalary, 2, '.', '');
$TProGrossSalary=$TTeamProGPM+$HINCentv; $TotalTeamProposedGrossPM=number_format($TProGrossSalary, 2, '.', '');
$One=($TotalTeamPreGrossPM*1)/100; $OnePerPre=number_format($One, 2, '.', ''); 
if($HINCentv>0){$Increment=number_format($Inc+$HINCentv, 2, '.', '');;}else{$Increment=number_format($Inc, 2, '.', '');}
$IncPer=$Increment/$OnePerPre;
$PerInc=number_format($IncPer, 4, '.', '');
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<style>.font {color:#000; font-family:Times New Roman; font-size:15px; font-weight:bold;} 
.Input{font-family:"Times New Roman", Times, serif; font-size:14px; height:22px;border-style:hidden; border-bottom-color:#FFFFFF; border-left-color:#FFFFFF; border-right-color:#FFFFFF; border-top-color:#FFFFFF; border:0;}.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;} .font1 { font-family:Georgia; font-size:11px; height:14px; } .font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">		
/*
if(EI!=6 && EI!=7 && EI!=21 && EI!=22 && EI!=51 && EI!=27)
  { 
   document.getElementById("ProGSPM_"+Sno).disabled=false; 
   document.getElementById("ProSC_"+Sno).disabled=false; 
   document.getElementById("ProGSPM_"+Sno).readOnly=true;
  }
*/

function ClickEdit(Sno,EI,v)
{
  document.getElementById("ProGSPM_"+Sno).disabled=false; 
  document.getElementById("ProSC_"+Sno).disabled=false; 
  if(v==0){document.getElementById("ProGSPM_"+Sno).readOnly=true;}
  document.getElementById("SpanEdit_"+Sno).style.display='none';  document.getElementById("SpanEditSave_"+Sno).style.display='block'; 
  document.getElementById("msg_"+Sno).style.display='none'; document.getElementById("ProGSPM_"+Sno).style.backgroundColor='#9FCFFF';
  document.getElementById("ProSC_"+Sno).style.backgroundColor='#9FCFFF';
  var IncenCheck = document.getElementById("IncenCheck_"+Sno).value; 
  if(IncenCheck=='Y'){document.getElementById("EmpInctv"+Sno).disabled=false; document.getElementById("EmpInctv"+Sno).style.backgroundColor='#9FCFFF';}

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
  var Per_TotalProGSPM=document.getElementById("Per_TotalProGSPM_"+No).value; var ComId=document.getElementById("ComId").value;
  var MinV=parseFloat(document.getElementById("MinV_"+No).value); var MaxV=parseFloat(document.getElementById("MaxV_"+No).value);
  var Per_ProSC=document.getElementById("Per_SalaryCorr"+No).value; var IncSalaryPM=document.getElementById("IncSalaryPM"+No).value; 
  var TotalAnnualSalary=document.getElementById("TotalAnnualSalary"+No).value; var Cal_MinGSV=document.getElementById("Cal_MinGSV"+No).value;
  var ETIncGP = document.getElementById("EmpTTIncGrossPercent"+No).value; var ETPISP = document.getElementById("EmpTTPISPercent"+No).value;
  var ETSCGP = document.getElementById("EmpTTSCPercent"+No).value; var MTPreG = document.getElementById("MyTTPreGross").value;
  var OnePerPre = document.getElementById("OnePerPre").value; var UpDesigId = document.getElementById("UpDesigId_"+No).value; 
  var IncenCheck = document.getElementById("IncenCheck_"+No).value; var IncentivePer = document.getElementById("IncentivePer"+No).value; 
  if(IncenCheck=='Y'){var EmpInctv = document.getElementById("EmpInctv"+No).value;}
  if(IncenCheck=='N'){var EmpInctv = 0.00;} var Numfilter=/^[0-9. ]+$/;  var test_num = Numfilter.test(EmpInctv);
  if(test_num==false) { alert('Please check incentive!'); return false; }

  var Per_SC=parseFloat(document.getElementById("Per_SalaryCorr"+No).value);   //alert(Per_SC);
  var Per_AG=parseFloat(document.getElementById("ActualPer_Gross_"+No).value); //alert(Per_AG);
  
   //var A_Per=Math.round((Per_SC+Per_AG)*100)/100; //alert(ActualPer);	
   //if(A_Per==''){var ActualPer=0;}else{var ActualPer=A_Per;}
  
    var ActualPer=Math.round((Per_SC+Per_AG)*100)/100; //alert(ActualPer);	
 // if(ActualPer==''){var ActualPer=0;}

  //alert(UpDesigId); 
  //if(UpDesigId!=113 && UpDesigId!=147 && UpDesigId!=120 && UpDesigId!=115 && UpDesigId!=116 && UpDesigId!=117)
  //{ if(ProGSPM<MinV || ProGSPM>MaxV) { alert("Proposed gross salary value beetween "+MinV+" and "+MaxV+" !");  return false; } }
  var agree=confirm("Are you sure you want to save data?"); 
  if (agree) { 
  var url = 'NormalizedInc.php'; var pars = 'ProGSPM='+ProGSPM+'&PmsId='+PmsId+'&EmpId='+EmpId+'&Per_ProGSPM='+Per_ProGSPM+'&ProSC='+ProSC+'&Per_ProSC='+Per_ProSC+'&TotalProGSPM='+TotalProGSPM+'&Per_TotalProGSPM='+Per_TotalProGSPM+'&IncSalaryPM='+IncSalaryPM+'&TotalAnnualSalary='+TotalAnnualSalary+'&No='+No+'&ETIncGP='+ETIncGP+'&ETPISP='+ETPISP+'&ETSCGP='+ETSCGP+'&C='+C+'&Y='+Y+'&HE='+HE+'&MTPreG='+MTPreG+'&OnePerPre='+OnePerPre+'&EmpInctv='+EmpInctv+'&IncentivePer='+IncentivePer+'&ActualPer='+ActualPer; 
  var myAjax = new Ajax.Request(
  url, { 	method: 'post', parameters: pars, onComplete: show_IncNormalized });
  return true; } else {return false;}
}
function show_IncNormalized(originalRequest)
{ document.getElementById("msg").innerHTML = originalRequest.responseText; var Sno=document.getElementById("NoId").value; 
  var TPGrossPM=document.getElementById("TPGrossPM").value; var IGrossS=document.getElementById("IGrossS").value; 
  var PIGrossS=document.getElementById("PIGrossS").value;  var TPPIS=document.getElementById("TPPIS").value; var TPPSC=document.getElementById("TPPSC").value; 
  document.getElementById("MyTTProGross").value=TPGrossPM; document.getElementById("MyTTIncGross").value=IGrossS;
  document.getElementById("MyTTIncGrossPercent").value=PIGrossS; document.getElementById("MyTTPISPercent").value=TPPIS;
  document.getElementById("MyTTSCPercent").value=TPPSC; document.getElementById("msg_"+Sno).style.display='block';
  document.getElementById("SpanEdit_"+Sno).style.display='block'; document.getElementById("SpanEditSave_"+Sno).style.display='none';
  document.getElementById("ProGSPM_"+Sno).disabled=true; document.getElementById("ProSC_"+Sno).disabled=true;
  document.getElementById("ProGSPM_"+Sno).style.backgroundColor='#B9FFB9'; document.getElementById("ProSC_"+Sno).style.backgroundColor='#B9FFB9'; 
  document.getElementById("FinalSubmit_"+Sno).disabled=false;
}

function FinalSubmit(No,PmsId,EmpId)
{
var agree=confirm("Are you sure you want to submit data?"); 
  if (agree) {
  var url = 'NormalizedInc.php'; var pars = 'action=submit&PmsId='+PmsId+'&EmpId='+EmpId+'&No='+No; 
  var myAjax = new Ajax.Request(
  url, { 	method: 'post', parameters: pars, onComplete: show_SubIncNormalized });
  return true; } else {return false;}
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
  if (agree) {
  var url = 'NormalizedInc.php'; var pars = 'OverAll=OverAllsubmit&Y='+y+'&E='+e+'&N='+No; 
  var myAjax = new Ajax.Request(
  url, { 	method: 'post', parameters: pars, onComplete: show_OverAll });
  return true; } else {return false;}
}
function show_OverAll(originalRequest)
{ document.getElementById("OverAllmsg").innerHTML = originalRequest.responseText; var Sno=document.getElementById("RowNoId").value;  
  document.getElementById("OneOverAllSubmit").disabled=true; 
  for(var i=1; i<=Sno; i++){document.getElementById("FinalSubmit_"+i).disabled=true} 
  document.getElementById("TwoOverAllSubmit").disabled=true;
}

function SelectDeptEmp(d,e){ window.location="HodPmsIncrement.php?deptId="+d+"&e="+e; }

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
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top">
	     <table border="0"  width="100%" height="100%" style="width:100%; height:100%; float:none;" cellpadding="0">
		  <tr>
		   <td valign="top"> 
<?php //*************************************************************************************************************************************************** ?>	   
		     <table border="0" id="Activity">
			  <tr>
				 <td width="1300" valign="top">
				  <table border="0">
<?php //*************************************************************** Start ******************************************************************************** ?>					
<tr>
 <td width="1300" style="background-image:url(images/pmsback.png) ">
 <?php $sqlSch=mysql_query("select * from hrm_pms_appdate where AssessmentYear=".$YearId." AND CompanyId=".$CompanyId, $con); 
      $resSch=mysql_fetch_assoc($sqlSch); $CuDate=date("Y-m-d");?>
  <table>
<?php //******************************************** ?>  
   <tr>
    <td width="1300">
	  <table>
	    <tr>
        <?php if($_SESSION['EmpType']=='E') {?>
		 <td align="center"><a href="pms.php?log=<?php echo $_SESSION['logCheckEmp']; ?>"><img id="Img_emp1" style="display:block;" src="images/emp1.png" border="0"/></a>
		   <img id="Img_emp" style="display:none;" src="images/emp.png" border="0"/></td> 
<?php } $sqlApp=mysql_query("select Appraiser_EmployeeID from hrm_employee_pms where AssessmentYear=".$YearId." AND Appraiser_EmployeeID=".$EmployeeId, $con); $rowApp=mysql_num_rows($sqlApp); 
      if($rowApp>0) { ?>	   
		 <td align="center"><a href="ManagerPms.php"><img id="Img_manager1" style="display:block;" src="images/manager1.png" border="0"/></a>
		   <img id="Img_manager" style="display:none;" src="images/manager.png" border="0"/></td>
<?php }  $sqlRev=mysql_query("select Reviewer_EmployeeID from hrm_employee_pms where AssessmentYear=".$YearId." AND Reviewer_EmployeeID=".$EmployeeId, $con); $rowRev=mysql_num_rows($sqlRev); 
      if($rowRev>0) { ?>		   
		 <td align="center"><a href="HodPms.php"><img id="Img_hod1" style="display:block;" src="images/hod1.png" border="0"/></a>
		   <img id="Img_hod" style="display:none;" src="images/hod.png" border="0"/></td>
<?php }  $sqlHod=mysql_query("select HOD_EmployeeID from hrm_employee_pms where AssessmentYear=".$YearId." AND HOD_EmployeeID=".$EmployeeId, $con); $rowHod=mysql_num_rows($sqlHod); 
      if($rowHod>0) { ?> 			   
		 <td align="center"><a href="RevHodPms.php"><img id="Img_hod1" style="display:none;" src="images/RevHod1.png" border="0"/></a>
		   <img id="Img_hod" style="display:block;" src="images/RevHod.png" border="0"/></td>			     
<?php } ?>		
        <td style="width:10px;">&nbsp;</td>
	<td style="width:20px;"><font color="#014E05" style='font-family:Times New Roman; font-weight:bold;' size="3"><span id="MsgSpan">&nbsp;<b><?php echo $msg; ?></b></span></font></td>
 <td style="font-family:Georgia; color:#004A00; font-size:15px; font-weight:bold;">&nbsp;&nbsp;<span id="OverAllmsg">&nbsp;</span></td>	
		 	
	  </table>
	</td>
   </tr>
   <tr>
    <td width="1300">
	  <table>
	    <tr> 
		 <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:80px;">
		 <a href="Indexpms.php?log=<?php echo $_SESSION['logCheckEmp']; ?>"><img src="images/Home.png" border="0" /></a></td>
		 <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:90px;">
		 <a href="RevHodPms.php"><img src="images/TeamStatus1.png" border="0" /></a></td>    			   
		 <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:70px;">
<?php $sqlCh = mysql_query("select * from hrm_pms_allow where HOD_EmployeeID=".$EmployeeId." AND CompanyId=".$CompanyId." AND AssesmentYear=".$YearId, $con); 
      $rowCh=mysql_num_rows($sqlCh);	 
		 if(($CuDate>=$resSch['HodFromDate'] AND $CuDate<=$resSch['HodToDate'] AND $resSch['HodDateStatus']=='A') OR $rowCh>0) { ?> 	
         <a href="HodPmsScore.php"><img src="images/Score1.png" border="0" /></td> 
		  <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:80px;">	
         <a href="HodPmsPromotion.php"><img src="images/promotion1.png" border="0" /></a></td> 
		 <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:80px;">	
         <a href="HodPmsIncrement.php"><img src="images/Increment.png" border="0" /></a><?php } ?></td>
		 <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:100px;">	
         <a href="HodPmsReports.php"><img src="images/pmsreports1.png" border="0" /></a></td>
		 <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:100px;">	
         <a href="HodIncReports.php"><img src="images/IncrementReports1.png" border="0" /></a></td>
		 <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:100px;">	
         <a href="RatingGraph.php"><img src="images/ratinggraph1.png" border="0" /></a></td> 
         <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:100px;">	
         <a href="CompliteRatingGraph.php"><img src="images/OveallRatingGraph1.png" border="0" /></a></td> 
         <td>&nbsp;</td>
		 <td style="font-family:Times New Roman; font-size:16px; font-weight:bold;width:400px; color:#E10000;" >
		  <?php if($CuDate>=$resSch['HodFromDate'] AND $CuDate<=$resSch['HodToDate'] AND $resSch['HodDateStatus']=='A') { 
		   $LastDate=$resSch['HodToDate']; $CurrentDate=date("Y-m-d");
		  $diff = abs(strtotime($LastDate) - strtotime($CurrentDate));
          //$years = floor($diff / (365*60*60*24));
          //$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
          $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); ?>
		  <b><blink><?php echo $days; ?> Days Remaining! Last date : 
		  <font color="#5B0000"><?php echo date("d-F",strtotime($resSch['HodToDate'])); ?></font></blink></b><?php } ?>
		 </td> 	   	 
 
		
    </tr>			     			       
 </table>
	</td>
   </tr>
   <tr>
    <td>
	  <table border="0">
	    <tr>
<?php /****************************************** Form Start **************************/ ?>
<?php /***************** Submitted **************************/ ?>		 
		 <td id="Submitted" style="width:1300px;display:block;">
<input type="hidden" id="EmployeeId" value="<?php echo $EmployeeId; ?>" /><input type="hidden" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" id="YearId" value="<?php echo $YearId; ?>" /><input type="hidden" id="FormMin5" value="0" /><input type="hidden" id="FormMax5" value="0" />	
<input type="hidden" id="PerValue" /><input type="hidden" id="OnePerPre" value="<?php echo $OnePerPre; ?>"/>
	  		   		   <table border="0">
 <tr>
  <td>
    <table border="0">
	<tr>
 <td style="font-family:Times New Roman; font-size:18px; font-weight:bold; width:150px;"><font color="#00468C">(<i>Team Increment</i>)</font><br></td>
 <td style="width:1000px;font-family:Times New Roman; font-weight:bold; color:#FDFD00; font-size:14px;">Pre - <font color="#004080">Previouse</font>,&nbsp;&nbsp;Pro - <font color="#004080">Proposed</font>,&nbsp;&nbsp;PGSPM - <font color="#004080">Proposed Gross Salary Per Month</font>,&nbsp;&nbsp;PIS - <font color="#004080">Proposed Increment Salary</font>&nbsp;&nbsp;SC - <font color="#004080">Salary Correction</font>,</td>
 <td style="width:10px;font-family:Georgia; color:#FFFF06; font-size:15px; font-weight:bold;">&nbsp;<i><span id="msg"></span></i></td>
    </tr>
	<tr><td colspan="4" style="width:1000px;font-family:Times New Roman; font-weight:bold; color:#FFFFFF; font-size:15px;" valign="bottom">
    &nbsp;&nbsp;<u>Previous GSPM&nbsp;:</u>&nbsp;&nbsp;&nbsp;<input style="width:100px;font-family:Times New Roman;font-weight:bold;color:#9F0000;font-size:14px;text-align:center;height:21px;" id="MyTTPreGross" value="<?php echo $TotalTeamPreGrossPM; ?>" />
	&nbsp;&nbsp;<u>Proposed GSPM&nbsp;:</u>&nbsp;&nbsp;<input style="width:100px;font-family:Times New Roman;font-weight:bold;color:#9F0000;font-size:14px;text-align:center;height:21px;" id="MyTTProGross" value="<?php echo $TotalTeamProposedGrossPM; ?>" />
 &nbsp;&nbsp;<u>Increment&nbsp;:</u>&nbsp;&nbsp;<input style="width:100px;font-family:Times New Roman;font-weight:bold;color:#9F0000;font-size:14px;text-align:center;height:21px;" id="MyTTIncGross" value="<?php echo $Increment; ?>" />&nbsp;&nbsp;<input style="width:60px;font-family:Times New Roman;font-weight:bold;color:#9F0000;font-size:14px;text-align:center;height:21px;" id="MyTTIncGrossPercent" value="<?php echo $PerInc; ?>" />&nbsp;%&nbsp;&nbsp;
 &nbsp;&nbsp;<u>PIS&nbsp;:</u>&nbsp;&nbsp;<input style="width:60px;font-family:Times New Roman;font-weight:bold;color:#9F0000;font-size:14px;text-align:center;height:21px;" id="MyTTPISPercent" value="<?php echo $TotalTPerPIS; ?>" />&nbsp;%&nbsp;&nbsp;
 &nbsp;&nbsp;<u>SC&nbsp;:</u>&nbsp;&nbsp;<input style="width:60px;font-family:Times New Roman;font-weight:bold;color:#9F0000;font-size:14px;text-align:center;height:21px;" id="MyTTSCPercent" value="<?php echo $TotalTPerPSC; ?>" />&nbsp;%
	</td>
	</tr>
	<tr>
	<td colspan="3" style="font-family:Times New Roman; font-weight:bold; color:#FFFFFF; font-size:15px;" valign="bottom">
	<select style="font-size:12px; width:150px; height:20px; background-color:#DDFFBB;display:block;" name="DeE" id="DeE" onChange="SelectDeptEmp(this.value,<?php echo $EmployeeId; ?>)">
<?php if($_REQUEST['deptId']==0){ ?><option value="0">&nbsp;All</option><?php } elseif($_REQUEST['deptId']>0){ $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['deptId'], $con); $resDept=mysql_fetch_assoc($sqlDept); ?><option value="<?php echo $_REQUEST['deptId']; ?>">&nbsp;<?php echo strtoupper($resDept['DepartmentCode']);?></option><?php } else { ?>	<option value="" style="margin-left:0px; background-color:#84D9D5;" selected>DEPARTMENT</option><?php } ?>
<?php $SqlDe=mysql_query("select hrm_department.DepartmentId,DepartmentCode from hrm_department INNER JOIN hrm_employee_general ON hrm_department.DepartmentId=hrm_employee_general.DepartmentId INNER JOIN hrm_employee_pms ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_pms.HOD_EmployeeID=".$EmployeeId." AND hrm_employee_pms.AssessmentYear=".$YearId." group by DepartmentCode ASC", $con); while($ResDe=mysql_fetch_array($SqlDe)) { ?><option value="<?php echo $ResDe['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDe['DepartmentCode'];?></option><?php } ?>
<?php if($_REQUEST['deptId']!=0){ ?><option value="0">&nbsp;All</option><?php } ?>
    </select>
	</td>
    <td style="font-family:Times New Roman; font-weight:bold; color:#FFFFFF; font-size:15px;" valign="bottom">
  <?php $sql2=mysql_query("select EmpPmsId from hrm_employee_pms where AssessmentYear=".$YearId." AND HOD_EmployeeID=".$EmployeeId." AND (Hod_GrossMonthlySalary=0 OR Hod_GrossMonthlySalary=0.00) AND HodSubmit_IncStatus=1", $con); $rows=mysql_num_rows($sql2);
      $sql3=mysql_query("select EmpPmsId from hrm_employee_pms where AssessmentYear=".$YearId." AND HOD_EmployeeID=".$EmployeeId." AND (Hod_GrossMonthlySalary!=0 OR Hod_GrossMonthlySalary!=0.00) AND HodSubmit_IncStatus=1", $con);  $rows2=mysql_num_rows($sql3); 
 if($rows==0){ ?>
 <?php if($_REQUEST['deptId']==0){ ?>
 <input type="button" id="OneOverAllSubmit" onClick="return OverAllSubmit(<?php echo $YearId.','.$EmployeeId; ?>)" value="Over All Final Submit" <?php if($rows2==0){ echo 'disabled'; } ?>/>
 <?php } elseif($_REQUEST['deptId']>0){ echo ''; } else { ?><input type="button" id="OneOverAllSubmit" onClick="return OverAllSubmit(<?php echo $YearId.','.$EmployeeId; ?>)" value="Over All Final Submit" <?php if($rows2==0){ echo 'disabled'; } ?>/> <?php } ?>
<?php }?>	 
 </td>
    </tr>
  </table>
  </td>
 </tr>	   
 <tr>
   <td style="width:1300px;">   
     <table border="0">
	  <tr>
	  <?php //************************************************ Start ******************************// ?>
	   <td style="width:1300px;" id="EmpAppInc" style="display:block;">
       <span id="MyTeamIncSpan"></span>	   
	   <span id="MyTeamInc">
	<table border="0">
<?php 
if($_REQUEST['deptId']>0){ $sql=mysql_query("select hrm_employee.*, EmpPmsId, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Hod_TotalFinalScore, Hod_TotalFinalRating, HodSubmit_IncStatus, Hod_EmpDesignation, Hod_EmpGrade, Hod_ProIncSalary, Hod_Percent_ProIncSalary, Hod_ProCorrSalary, Hod_Percent_ProCorrSalary, Hod_IncNetMonthalySalary, Hod_Percent_IncNetMonthalySalary, Hod_GrossMonthlySalary, Hod_GrossAnnualSalary, Hod_Incentive, HodPer_PIS_From_PreMyTGrossPM, HodPer_SC_From_PreMyTGrossPM, HodPer_TISPM_From_PreMyTGrossPM, HR_CurrDesigId, HR_CurrGradeId, DepartmentId, DesigId, DesigId2, GradeId, HqId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$YearId." AND hrm_employee_pms.HOD_EmployeeID=".$EmployeeId." AND hrm_employee_general.DepartmentId=".$_REQUEST['deptId']." order by EmpCode ASC", $con); }
else { $sql=mysql_query("select hrm_employee.*, EmpPmsId, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Hod_TotalFinalScore, Hod_TotalFinalRating, HodSubmit_IncStatus, Hod_EmpDesignation, Hod_EmpGrade, Hod_ProIncSalary, Hod_Percent_ProIncSalary, Hod_ProCorrSalary, Hod_Percent_ProCorrSalary, Hod_IncNetMonthalySalary, Hod_Percent_IncNetMonthalySalary, Hod_GrossMonthlySalary, Hod_GrossAnnualSalary, Hod_Incentive, HodPer_PIS_From_PreMyTGrossPM, HodPer_SC_From_PreMyTGrossPM, HodPer_TISPM_From_PreMyTGrossPM, HR_CurrDesigId, HR_CurrGradeId, DepartmentId, DesigId, DesigId2, GradeId, HqId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$YearId." AND hrm_employee_pms.HOD_EmployeeID=".$EmployeeId." order by EmpCode ASC", $con); }
$sno=1; while($res=mysql_fetch_array($sql)){ 
$sqlIncen=mysql_query("select INCENTIVE from hrm_employee_ctc where EmployeeID=".$res['EmployeeID'], $con); $resIncen=mysql_fetch_assoc($sqlIncen);
$sqlCount=mysql_query("select SUM(Incentive) as INC from hrm_pms_appraisal_history INNER JOIN hrm_employee ON hrm_pms_appraisal_history.EmpCode=hrm_employee.EmpCode where hrm_employee.EmployeeID=".$res['EmployeeID']." AND hrm_employee.CompanyId=".$CompanyId, $con); while($Count=mysql_fetch_array($sqlCount)){ $TotInEM=$Count['INC']; }
?>  
	<tr bgcolor="" style="height:23px;">
		  <table border="1" style="width:1300px;">
		    <tr bgcolor="#006BD7" style="height:25px;">
			  <td align="center" style="font:Georgia; font-size:11px; font-weight:bold; width:30px; color:#FFFFFF;"><?php echo $sno; ?></td>
			  <td colspan="<?php if($TotInEM>0) {?>13<?php } else { ?>11 <?php } ?>" align="" style="font:Georgia; font-size:11px; font-weight:bold;">
			  <input type="hidden" id="IncenCheck_<?php echo $sno; ?>" value="<?php echo $resIncen['INCENTIVE']; ?>" />
			  &nbsp;&nbsp;&nbsp;
			  <font color="#DDDD00">EmpCode :</font>
			  <font color="#FFFFFF"><?php echo $res['EmpCode']; ?></font>
			  &nbsp;&nbsp;&nbsp;
			  <font color="#DDDD00">Name :</font>
			  <font color="#FFFFFF"><?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></font>
			  &nbsp;&nbsp;&nbsp;
			  <font color="#DDDD00">Department :</font>
<?php $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con);  $resDept=mysql_fetch_assoc($sqlDept);?>			  			  <font color="#FFFFFF"><?php echo $resDept['DepartmentCode'];?></font>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php $sqlMax = mysql_query("SELECT MAX(SalaryChange_Date) as SalaryChDate FROM hrm_pms_appraisal_history INNER JOIN hrm_employee ON hrm_pms_appraisal_history.EmpCode=hrm_employee.EmpCode where hrm_employee.EmployeeID=".$res['EmployeeID']." AND SalaryChange_Date!='".date("Y-10-01")."' AND hrm_pms_appraisal_history.CompanyId=".$CompanyId, $con); $resMax = mysql_fetch_assoc($sqlMax); 

      $sqlS = mysql_query("SELECT Previous_GrossSalaryPM,TotalProp_GSPM,Incentive FROM hrm_pms_appraisal_history INNER JOIN hrm_employee ON hrm_pms_appraisal_history.EmpCode=hrm_employee.EmpCode  where SalaryChange_Date='".$resMax['SalaryChDate']."' AND hrm_employee.EmployeeID=".$res['EmployeeID']." AND hrm_pms_appraisal_history.CompanyId=".$CompanyId, $con); $resS = mysql_fetch_assoc($sqlS); 
	  
//if($res['EmployeeID']==51){$TPreGross=$resS['TotalProp_GSPM']+$resS['Incentive'];}else{$TPreGross=$resS['TotalProp_GSPM'];}
$TPreGross=$resS['TotalProp_GSPM'];

	  ?> <input type="hidden" id="GS_<?php echo $sno; ?>" value="<?php echo $TPreGross; ?>" />		

<?php $sqlDJ=mysql_query("select DateJoining from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmployeeID=".$res['EmployeeID']." AND hrm_employee.CompanyId=".$CompanyId, $con);  $resDJ=mysql_fetch_assoc($sqlDJ); $DJ=$resDJ['DateJoining']; $CuDate=date("Y-09-30");
$diff = abs(strtotime($CuDate) - strtotime($DJ));  $daysDJ = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); 
 
 if($res['Hod_TotalFinalRating']>0){$RatingHod=$res['Hod_TotalFinalRating']; } else {$RatingHod=$res['Reviewer_TotalFinalRating'];} 
 $sqlMaxMin= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dis WHERE Rating=".$RatingHod." AND YearId=".$YearId." AND CompanyId=".$CompanyId, $con); $resMaxMin = mysql_fetch_assoc($sqlMaxMin); 

/***************************If Allow Minimum/Maximum**************************************************************/
	  if($daysDJ>=180){ $Min=($TPreGross*$resMaxMin['IncDistriFrom'])/100;} 
	  else { $Min=($TPreGross*5)/100;} 
	  $Max=($TPreGross*$resMaxMin['IncDistriTo'])/100;	
	  $OkMin=$TPreGross+$Min; $OkMax=$TPreGross+$Max; 

/***************************If Allow Fix Value **************************************************************/	  
	  //$NewAmt=($resS['TotalProp_GSPM']*$resMaxMin['IncDistriFrom'])/100;
	  //$NewGrossAmt=$resS['TotalProp_GSPM']+$NewAmt;
	  
/***************************If Prorata  wise**************************************************************/	 
	  if($resDJ['DateJoining']<='2014-09-30' AND $RatingHod>0)
	  { 
	    $TotIncAmt=($TPreGross*$resMaxMin['IncDistriFrom'])/100;
	    //$AANewGrossAmt=$resS['TotalProp_GSPM']+$TotIncAmt;
           $NewGrossAmt=10*(ceil(($TPreGross+$TotIncAmt)/10)); 
           $NewGrossAmt2=$TPreGross+$TotIncAmt;
	  }
	  elseif($resDJ['DateJoining']>='2014-10-01' AND $resDJ['DateJoining']<='2015-03-31' AND $RatingHod>0)
	  {  
	   $date1 = new DateTime($resDJ['DateJoining']);  $date2 = new DateTime("2015-09-30");
       $interval = date_diff($date2, $date1);
       $Y=$interval->format('%y');  $M=$interval->format('%m');  $D=$interval->format('%d')+1;
	   $PerM=$resMaxMin['IncDistriFrom']/12;  $PerD=$PerM/30;
	   $Month_Per=round($PerM*$M, 2); $Day_Per=round($PerD*$D, 2);
	   $MSal=($TPreGross*$Month_Per)/100; 
	   $DSal=($TPreGross*$Day_Per)/100; 
	   $TotInc=round($MSal+$DSal);
	   //$AANewGrossAmt=$resS['TotalProp_GSPM']+$TotInc;
        $NewGrossAmt=10*(ceil(($TPreGross+$TotInc)/10)); 
        $NewGrossAmt2=$TPreGross+$TotInc;  
	  }                                                    
	  else
	  {
	    //$AANewGrossAmt=$resS['TotalProp_GSPM'];
         $NewGrossAmt=10*(ceil($TPreGross/10)); 
         $NewGrossAmt2=$TPreGross; 
	  } 
	  
/***************************If Prorata  wise Extra Not allow previous time PMS process **************************************************************/	 
	  if($resDJ['DateJoining']>='2014-04-01' AND $resDJ['DateJoining']<='2014-09-30' AND $RatingHod>0)
	  {  
	   $date11 = new DateTime($resDJ['DateJoining']);  $date22 = new DateTime("2014-09-30");
       $interval = date_diff($date22, $date11);
       $YY=$interval->format('%y');  $MM=$interval->format('%m');  $DD=$interval->format('%d')+1;
	   $PerM2=$resMaxMin['IncDistriFrom']/12;  $PerD2=$PerM2/30;
	   $Month_Per2=round($PerM2*$MM, 2); $Day_Per2=round($PerD2*$DD, 2);
	   $MSal2=($TPreGross*$Month_Per2)/100; 
	   $DSal2=($TPreGross*$Day_Per2)/100; 
	   $TotInc2=round($MSal2+$DSal2);  
       //$NewGrossAmt2=10*(ceil(($resS['TotalProp_GSPM']+$TotInc2)/10));  
	  }     
	  else{ $TotInc2=0; }  

      if($TotInc2>0){$ActualNewGS=10*(ceil(($NewGrossAmt2+$TotInc2)/10));}
	  else{$ActualNewGS=10*(ceil(($NewGrossAmt+$TotInc2)/10));}
	                                               
	  //$ActualNewGS=$NewGrossAmt+$TotInc2;

?> 
            <input type="hidden" id="ActualPer_Gross_<?php echo $sno; ?>" value="<?php if($resMaxMin['IncDistriFrom']!=''){ echo $resMaxMin['IncDistriFrom']; } else {echo 0;} ?>"/>
            <input type="hidden" id="NewGross_<?php echo $sno; ?>" value="<?php echo $ActualNewGS; ?>"/> 
	  <font color="#DDDD00">Proposed Gross Salary Per Month:</font>&nbsp;<font color="#FFFFFF"><?php echo $ActualNewGS; ?></font> 			  
              <?php /*
			  <font color="#DDDD00">Proposed Gross Salary Per Month:</font>&nbsp;
			  <font color="#FFCEE7">Minimum</font>-<font color="#FFFFFF"><?php echo $OkMin; ?></font>&nbsp;
			  <font color="#FFCEE7">Maximum</font>- <font color="#FFFFFF"><?php echo $OkMax; ?></font>
               */ ?>
			  <input type="hidden" id="MinV_<?php echo $sno; ?>" value="<?php echo $OkMin; ?>"/> 
			  <input type="hidden" id="MaxV_<?php echo $sno; ?>" value="<?php echo $OkMax; ?>"/>
			  </td>
			  <td colspan="2" align="center" style="font:Georgia; font-size:11px; font-weight:bold;">			  
<input type="button" id="FinalSubmit_<?php echo $sno; ?>" onClick="return FinalSubmit(<?php echo $sno.','.$res['EmpPmsId'].','.$res['EmployeeID']; ?>)" value="Final Submit" <?php if($res['Hod_GrossMonthlySalary']==0 OR $res['Hod_GrossMonthlySalary']==0.00 OR $res['HodSubmit_IncStatus']==2) { echo 'disabled'; } ?>  />
			  </td>
			</tr>			
			<tr bgcolor="#7a6189">
			  <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:50px;"><b>Pre. Grade</b></td>
		      <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:50px;"><b>Pro. Grade</b></td>
		      <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:370px;"><b>Previouse Designation</b></td>
		      <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:370px;"><b>Proposed Designation</b></td>
		      <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:80px;"><b>Change Date</b></td>
		      <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:80px;"><b>&nbsp;</b></td>		  
		      <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:80px;"><b>Pre. GSPM</b></td>			  
		      <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:80px;"><b>PGSPM</b></td>
		      <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:80px;"><b>% PIS</b></td>
		      <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:80px;"><b>Salary Correction</b></td>
		      <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:80px;"><b>Total PGSPM</b></td>
		      <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:80px;"><b>% Total PGSPM</b></td>
<?php if($TotInEM>0) { ?><td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:80px;"><b>INCENTIVE</b></td>
              <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:80px;"><b>Total Pay PM</b></td>
<?php } ?>			  
		      <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:50px;"><b>Score</b></td>
		      <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:50px;"><b>Rating</b></td>
			</tr>
<?php $sqlHistory=mysql_query("select * from hrm_pms_appraisal_history INNER JOIN hrm_employee ON (hrm_pms_appraisal_history.EmpCode=hrm_employee.EmpCode AND hrm_pms_appraisal_history.CompanyId=hrm_employee.CompanyId) where hrm_employee.EmployeeID=".$res['EmployeeID']." AND hrm_employee.CompanyId=".$CompanyId." AND SalaryChange_Date<='".date("2011-12-31")."' order by SalaryChange_Date ASC", $con); while($resHistory=mysql_fetch_array($sqlHistory)){
if($resHistory['Previous_GrossSalaryPM']!=$resHistory['TotalProp_GSPM']) {

 ?>			
			<tr bgcolor="#FFFFFF" height="20px;">
			  <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $resHistory['Current_Grade']; ?></td>
		      <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $resHistory['Proposed_Grade']; ?></td>
		      <td align="" style="font:Georgia; font-size:11px; width:370px;"><?php echo $resHistory['Current_Designation']; ?></td>
		      <td align="" style="font:Georgia; font-size:11px; width:370px;"><?php echo $resHistory['Proposed_Designation']; ?></td>
		      <td align="center" style="font:Georgia; font-size:11px; width:80px;"><?php echo date("d-M-y",strtotime($resHistory['SalaryChange_Date'])); ?></td>
		      <td align="center" style="font:Georgia; font-size:11px; width:80px;">&nbsp;</td>
		      <td align="center" style="font:Georgia; font-size:11px; width:80px;"><?php echo ''; ?></td>			  
		      <td align="right" style="font:Georgia; font-size:11px; width:80px;"><?php echo ''; ?></td>
		      <td align="center" style="font:Georgia; font-size:11px; width:80px;"><?php echo ''; ?></td>
		      <td align="right" style="font:Georgia; font-size:11px; width:80px;"><?php echo ''; ?></td>
		      <td align="right" style="font:Georgia; font-size:11px; width:80px;"><?php echo $resHistory['Previous_GrossSalaryPM']; //$resHistory['TotalProp_GSPM'] ?></td>
		      <td align="center" style="font:Georgia; font-size:11px; width:80px;"><?php echo $resHistory['Prop_PeInc_GSPM']; //$resHistory['TotalProp_PerInc_GSPM']; ?></td>
<?php if($TotInEM>0) { ?><td align="center" style="font:Georgia; font-size:11px; width:80px;"><?php echo $resHistory['Incentive']; ?></td>
<?php $TotalPay=$resHistory['Previous_GrossSalaryPM']+$resHistory['Incentive']; ?>
                         <td align="center" style="font:Georgia; font-size:11px; width:80px;"><?php echo number_format($TotalPay, 2, '.', ''); ?></td><?php } ?>			  
		      <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $resHistory['Score']; ?></td>
		      <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $resHistory['Rating']; ?></td>
			</tr>
<?php } } ?>	

			
<?php $sqlHistory=mysql_query("select * from hrm_pms_appraisal_history INNER JOIN hrm_employee ON (hrm_pms_appraisal_history.EmpCode=hrm_employee.EmpCode AND hrm_pms_appraisal_history.CompanyId=hrm_employee.CompanyId) where hrm_employee.EmployeeID=".$res['EmployeeID']." AND hrm_employee.CompanyId=".$CompanyId." AND SalaryChange_Date>='".date("2012-01-01")."' AND SalaryChange_Date!='".date("Y-10-01")."' order by SalaryChange_Date ASC", $con); while($resHistory=mysql_fetch_array($sqlHistory)){
if($resHistory['Previous_GrossSalaryPM']!=$resHistory['TotalProp_GSPM']) {

 ?>			
			<tr bgcolor="#FFFFFF" height="20px;">
			  <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $resHistory['Current_Grade']; ?></td>
		      <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $resHistory['Proposed_Grade']; ?></td>
		      <td align="" style="font:Georgia; font-size:11px; width:370px;"><?php echo $resHistory['Current_Designation']; ?></td>
		      <td align="" style="font:Georgia; font-size:11px; width:370px;"><?php echo $resHistory['Proposed_Designation']; ?></td>
		      <td align="center" style="font:Georgia; font-size:11px; width:80px;"><?php echo date("d-M-y",strtotime($resHistory['SalaryChange_Date'])); ?></td>
		      <td align="center" style="font:Georgia; font-size:11px; width:80px;">&nbsp;</td>
		      <td align="right" style="font:Georgia; font-size:11px; width:80px;"><?php echo $resHistory['Previous_GrossSalaryPM']; ?></td>			  
		      <td align="right" style="font:Georgia; font-size:11px; width:80px;"><?php echo $resHistory['Proposed_GrossSalaryPM']; ?></td>
		      <td align="center" style="font:Georgia; font-size:11px; width:80px;"><?php echo $resHistory['Prop_PeInc_GSPM']; ?></td>
		      <td align="right" style="font:Georgia; font-size:11px; width:80px;"><?php echo $resHistory['PropSalary_Correction']; ?></td>
		      <td align="right" style="font:Georgia; font-size:11px; width:80px;"><?php echo $resHistory['TotalProp_GSPM']; ?></td>
		      <td align="center" style="font:Georgia; font-size:11px; width:80px;"><?php echo $resHistory['TotalProp_PerInc_GSPM']; ?></td>
<?php if($TotInEM>0) { ?><td align="center" style="font:Georgia; font-size:11px; width:80px;"><?php echo $resHistory['Incentive']; ?></td>
<?php $TotalPay=$resHistory['TotalProp_GSPM']+$resHistory['Incentive']; ?>
                         <td align="center" style="font:Georgia; font-size:11px; width:80px;"><?php echo number_format($TotalPay, 2, '.', ''); ?></td><?php } ?>			  
		      <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $resHistory['Score']; ?></td>
		      <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $resHistory['Rating']; ?></td>
			</tr>
<?php } } ?>	


<?php if($CompanyId==1){$SalChDate="01-Oct-".date("y"); $SalChDate2=date("Y")."-10-01"; $sqlHi2=mysql_query("select * from hrm_pms_appraisal_history INNER JOIN hrm_employee ON (hrm_pms_appraisal_history.EmpCode=hrm_employee.EmpCode AND hrm_pms_appraisal_history.CompanyId=hrm_employee.CompanyId) where hrm_employee.EmployeeID=".$res['EmployeeID']." AND hrm_employee.CompanyId=".$CompanyId." AND SalaryChange_Date='".$SalChDate2."'", $con);}
      elseif($CompanyId==2){$SalChDate="01-Oct-".date("y"); $SalChDate2=date("Y")."-10-01"; $sqlHi2=mysql_query("select * from hrm_pms_appraisal_history INNER JOIN hrm_employee ON (hrm_pms_appraisal_history.EmpCode=hrm_employee.EmpCode AND hrm_pms_appraisal_history.CompanyId=hrm_employee.CompanyId) where hrm_employee.EmployeeID=".$res['EmployeeID']." AND hrm_employee.CompanyId=".$CompanyId." AND SalaryChange_Date='".$SalChDate2."'", $con);}
      elseif($CompanyId==3){$SalChDate="01-Apr-".date("y"); $SalChDate2=date("Y")."-04-01"; $sqlHi2=mysql_query("select * from hrm_pms_appraisal_history INNER JOIN hrm_employee ON (hrm_pms_appraisal_history.EmpCode=hrm_employee.EmpCode AND hrm_pms_appraisal_history.CompanyId=hrm_employee.CompanyId) where hrm_employee.EmployeeID=".$res['EmployeeID']." AND hrm_employee.CompanyId=".$CompanyId." AND SalaryChange_Date='".$SalChDate2."'", $con);}
	  $rowHi2=mysql_num_rows($sqlHi2);
 ?>		
<?php $sqlChh=mysql_query("select * from hrm_pms_allow_inc where EmployeeID=".$res['EmployeeID']." AND CompanyId=".$CompanyId." AND AssesmentYear=".$YearId, $con); 
	  $rowChh=mysql_num_rows($sqlChh); 
?>



            <?php if(($CompanyId==1 OR $CompanyId==2) AND $rowHi2==0){ /*Check Open*/ ?>
            <tr bgcolor="#FFFFFF" height="20px;">					
			  <?php $sqlGr=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['HR_CurrGradeId'], $con); $resGr=mysql_fetch_assoc($sqlGr);
			        $sqlGrH=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Hod_EmpGrade'], $con); $resGrH=mysql_fetch_assoc($sqlGrH);
			  ?>		
			  <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $resGr['GradeValue']; ?></td>
		      <td bgcolor="#B9FFB9" align="center" style="font:Georgia; font-size:11px; width:50px;">
			  <?php if($res['HR_CurrGradeId']!=$res['Hod_EmpGrade'] AND $res['Hod_EmpGrade']>0){ echo $resGrH['GradeValue']; } ?></td>
              <?php $sqlD1=mysql_query("select DesigName from hrm_designation where DesigId=".$res['HR_CurrDesigId'], $con); $resD1=mysql_fetch_assoc($sqlD1);?>
              <td align="" style="font:Georgia; font-size:11px; width:370px;">
			  <input type="hidden" id="UpDesigId_<?php echo $sno; ?>" value="<?php echo $res['HR_CurrDesigId']; ?>" /><?php echo $resD1['DesigName'];?></td>	
			  <?php $sqlD2=mysql_query("select DesigName from hrm_designation where DesigId=".$res['Hod_EmpDesignation'], $con); $resD2=mysql_fetch_assoc($sqlD2);?>
		      <td bgcolor="#B9FFB9" align="" style="font:Georgia; font-size:11px; width:370px;">
			  <?php if($res['HR_CurrDesigId']!=$res['Hod_EmpDesignation']){ echo $resD2['DesigName']; } ?></td>
		      <td align="center" style="font:Georgia; font-size:11px; width:80px;"><?php echo $SalChDate; ?></td>
		      <td align="center" style="font:Georgia; font-size:11px; font-weight:bold; width:80px;">
			  <?php if($res['HodSubmit_IncStatus']!=2) { ?>
			  <SPAN id="SpanEdit_<?php echo $sno; ?>"><img src="images/edit.png" border="0" onClick="return ClickEdit(<?php echo $sno.', '.$res['EmployeeID'].', '.$rowChh; ?>)"/></SPAN>
	          <SPAN id="SpanEditSave_<?php echo $sno; ?>" style="display:none;">
	          <img src="images/Floppy-Small-icon.png" border="0" onClick="CalProInc(<?php echo $sno; ?>); return ClickSaveEdit(<?php echo $sno.','.$res['EmpPmsId'].','.$res['EmployeeID'].','.$CompanyId.','.$YearId.','.$EmployeeId; ?>)"></SPAN>
			  <?php } ?> 			  
			  </td>
			  <td align="right" style="font:Georgia; font-size:11px; font-weight:bold; width:80px;"><?php echo $TPreGross; ?></td>
		      <td bgcolor="#B9FFB9" align="center" style="font:Georgia; font-size:11px; width:80px;" valign="top">
			  <input id="ProGSPM_<?php echo $sno; ?>" style="border-style:hidden; border:0; background-color:#B9FFB9; width:78px; height:20px;text-align:right;" height="20" value="<?php echo $res['Hod_ProIncSalary']; ?>" maxlength="12" <?php if($rowChh>0){ echo ''; }else{ echo 'disabled'; echo 'readOnly'; }?> onKeyDown="CalProInc(<?php echo $sno; ?>)" onClick="CalProInc(<?php echo $sno; ?>)" onChange="CalProInc(<?php echo $sno; ?>)"/></td>
		      <td bgcolor="#B9FFB9" align="center" style="font:Georgia; font-size:11px; width:80px;" valign="top">
			  <input id="Per_ProGSPM_<?php echo $sno; ?>" style="border-style:hidden; border:0; background-color:#B9FFB9; width:78px; height:20px;text-align:center;" height="20" value="<?php echo $res['Hod_Percent_ProIncSalary']; ?>" readOnly maxlength="12"/>
			  </td>
		      <td bgcolor="#B9FFB9" align="center" style="font:Georgia; font-size:11px; width:80px;" valign="top">
			  <input id="ProSC_<?php echo $sno; ?>" style="border-style:hidden; border:0; background-color:#B9FFB9; width:78px; height:20px;text-align:right;" height="20" value="<?php echo $res['Hod_ProCorrSalary']; ?>" <?php if($rowChh>0){ echo ''; }else{ echo 'disabled'; }?>  maxlength="12" onKeyDown="CalProInc(<?php echo $sno; ?>)" onClick="CalProInc(<?php echo $sno; ?>)" onChange="CalProInc(<?php echo $sno; ?>)"/>
			  </td>
		      <td bgcolor="#B9FFB9" align="center" style="font:Georgia; font-size:11px; width:80px;" valign="top">
			  <input id="TotalProGSPM_<?php echo $sno; ?>" style="border-style:hidden; border:0; background-color:#B9FFB9; width:78px; height:20px;text-align:right;" height="20" value="<?php echo $res['Hod_GrossMonthlySalary']; ?>" readOnly maxlength="12"/>
			  </td>
		      <td bgcolor="#B9FFB9" align="center" style="font:Georgia; font-size:11px; width:80px;" valign="top">
			  <input id="Per_TotalProGSPM_<?php echo $sno; ?>" style="border-style:hidden; border:0; background-color:#B9FFB9; width:78px; height:20px;text-align:center;" height="20" value="<?php echo $res['Hod_Percent_IncNetMonthalySalary']; ?>" readOnly maxlength="12"/>
			  <input type="hidden" value="" id="Cal_MinGSV<?php echo $sno; ?>" />
			  <input type="hidden" value="<?php echo $res['Hod_Percent_ProCorrSalary']; ?>" id="Per_SalaryCorr<?php echo $sno; ?>" /> 
			  <input type="hidden" value="<?php echo $res['Hod_IncNetMonthalySalary']; ?>" id="IncSalaryPM<?php echo $sno; ?>" />
			  <input type="hidden" value="<?php echo $res['Hod_GrossAnnualSalary']; ?>" id="TotalAnnualSalary<?php echo $sno; ?>" /> 
			  <input type="hidden" value="<?php echo $res['HodPer_PIS_From_PreMyTGrossPM']; ?>" id="HodMyTeamPIS<?php echo $sno; ?>" /> 
			  <input type="hidden" value="<?php echo $res['HodPer_SC_From_PreMyTGrossPM']; ?>" id="HodMyTeamSC<?php echo $sno; ?>" /> 
			  <input type="hidden" value="<?php echo $res['HodPer_TISPM_From_PreMyTGrossPM']; ?>" id="HodMyTeamTISPM<?php echo $sno; ?>" /> 
	          </td>
			 <?php if($TotInEM>0) {?><td align="center" style="font:Georgia; font-size:11px; font-weight:bold; width:80px;"><?php if($resIncen['INCENTIVE']=='Y') { ?>
<input style="border-style:hidden; border:0; background-color:#B9FFB9; width:78px; height:20px;text-align:center;" id="EmpInctv<?php echo $sno; ?>" value="<?php echo $res['Hod_Incentive']; ?>" maxlength="12" onKeyDown="CalProInc(<?php echo $sno; ?>)" onClick="CalProInc(<?php echo $sno; ?>)" onChange="CalProInc(<?php echo $sno; ?>)" disabled/>
<?php } ?></td>
          <?php $TotpayEmp=$res['Hod_GrossMonthlySalary']+$res['Hod_Incentive']; ?>
          <td align="center" style="font:Georgia; font-size:11px; font-weight:bold; width:80px;"><?php if($resIncen['INCENTIVE']=='Y') { ?>
<input style="border-style:hidden; border:0; background-color:#B9FFB9; width:78px; height:20px;text-align:center;" id="TotalPay<?php echo $sno; ?>" value="<?php echo number_format($TotpayEmp, 2, '.', ''); ?>" maxlength="12" readonly/>
<?php } ?></td><?php } ?> 

		      <td bgcolor="#B9FFB9" align="center" style="font:Georgia; font-size:11px; width:50px;" valign="top"><input style="border-style:hidden; border:0; background-color:#B9FFB9; width:50px; height:20px; text-align:center;" height="20" value="<?php if($res['Hod_TotalFinalScore']>0) {echo $res['Hod_TotalFinalScore']; } else {echo $res['Reviewer_TotalFinalScore'];} ?>" readOnly/></td>
		      <td bgcolor="#B9FFB9" align="center" style="font:Georgia; font-size:11px; width:50px;" valign="top"><input style="border-style:hidden; border:0; background-color:#B9FFB9; width:50px; height:20px;text-align:center;" height="20" value="<?php  if($res['Hod_TotalFinalRating']>0){echo $res['Hod_TotalFinalRating']; } else {echo $res['Reviewer_TotalFinalRating'];} ?>" readOnly/></td>
			</tr>

                 <?php } /*Check Close*/?>



<?php //$MyTTIncGrossPercent=$res['Hod_IncNetMonthalySalary']/$OnePerPre; $MyTTIGP=number_format($MyTTIncGrossPercent, 2, '.', '');?>			
			<tr>
			<td colspan="7" bgcolor="#FFFFFF" style="width:1000px;font-family:Times New Roman; font-weight:bold; color:#000000; font-size:15px;" align="right" valign="middle">
<input type="hidden" id="IncentivePer<?php echo $sno; ?>" value="0" /> <input type="hidden" style="border-style:hidden; border:0; background-color:ffffff; width:78px; height:20px;text-align:center;" id="TotIncrement<?php echo $sno; ?>" value="" />
 <?php /*My Team - Increment */ ?>&nbsp;&nbsp;&nbsp;<input type="hidden" style="width:100px;font-family:Times New Roman;font-weight:bold;color:#9F0000;font-size:14px;text-align:center;height:21px;" id="EmpTTIncGross<?php echo $sno; ?>" value="<?php echo $res['Hod_IncNetMonthalySalary']; ?>" />
 &nbsp;&nbsp;<input type="hidden" style="width:60px;font-family:Times New Roman;font-weight:bold;color:#9F0000;font-size:14px;text-align:center;height:21px;" id="EmpTTIncGrossPercent<?php echo $sno; ?>" value="<?php echo $res['HodPer_TISPM_From_PreMyTGrossPM']; ?>" />&nbsp;

 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php /*PIS */ ?>&nbsp;&nbsp;&nbsp;<input type="hidden" style="width:60px;font-family:Times New Roman;font-weight:bold;color:#9F0000;font-size:14px;text-align:center;height:21px;" id="EmpTTPISPercent<?php echo $sno; ?>" value="<?php echo $res['HodPer_PIS_From_PreMyTGrossPM']; ?>" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

 &nbsp;&nbsp;<?php /*SC */ ?>&nbsp;&nbsp;&nbsp;<input type="hidden" style="width:60px;font-family:Times New Roman;font-weight:bold;color:#9F0000;font-size:14px;text-align:center;height:21px;" id="EmpTTSCPercent<?php echo $sno; ?>" value="<?php echo $res['HodPer_SC_From_PreMyTGrossPM']; ?>" />&nbsp

			&nbsp;
			</td>
			<td colspan="<?php if($TotInEM>0) {?>9<?php } else { ?>7<?php } ?>" style="font-family:Georgia; color:#800000; font-size:15px; font-weight:bold;background-color:#FFFFFF;">
			<i><span id="msg_<?php echo $sno; ?>" style="display:none;">&nbsp;&nbsp;&nbsp;&nbsp;Data save successfully...</span></i>
			<i><span id="msgSub_<?php echo $sno; ?>" style="display:none;">&nbsp;&nbsp;&nbsp;&nbsp;Data submitted successfully...</span></i>
			</td></tr>		
		   </table>
		</td>
	 </tr>
	 <tr><td>&nbsp;</td></tr>
<?php $sno++;} $no=$sno-1; echo '<input type="hidden" id="RowNo" value="'.$no.'" />';?> 
     <tr>
	   <td>
<?php $sql2=mysql_query("select EmpPmsId from hrm_employee_pms where AssessmentYear=".$YearId." AND HOD_EmployeeID=".$EmployeeId." AND (Hod_GrossMonthlySalary=0 OR Hod_GrossMonthlySalary=0.00) AND HodSubmit_IncStatus=1", $con); $rows=mysql_num_rows($sql2);
      $sql3=mysql_query("select EmpPmsId from hrm_employee_pms where AssessmentYear=".$YearId." AND HOD_EmployeeID=".$EmployeeId." AND (Hod_GrossMonthlySalary!=0 OR Hod_GrossMonthlySalary!=0.00) AND HodSubmit_IncStatus=1", $con);  $rows2=mysql_num_rows($sql3); 
 if($rows==0){ ?>
 <?php if($_REQUEST['deptId']==0){ ?>
 <input type="button" id="OneOverAllSubmit" onClick="return OverAllSubmit(<?php echo $YearId.','.$EmployeeId; ?>)" value="Over All Final Submit" <?php if($rows2==0){ echo 'disabled'; } ?>/>
 <?php } elseif($_REQUEST['deptId']>0){ echo ''; } else { ?><input type="button" id="OneOverAllSubmit" onClick="return OverAllSubmit(<?php echo $YearId.','.$EmployeeId; ?>)" value="Over All Final Submit" <?php if($rows2==0){ echo 'disabled'; } ?>/> <?php } ?>
 
<?php }?>	   
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

<?php /****************************************** Form Close **************************/ ?>		   
		</tr>
	  </table>
	</td>
   </tr>
<?php //******************************************** ?>    
  </table>
 </td>
</tr>					
<?php //*************************************************************** Close ******************************************************************************** ?>					
				  </table>
				 </td>
			  </tr>
			</table>
           </td>
			  </tr>
	        </table>
<?php //*************************************************************************************************************************************************** ?>
		   </td>
		  </tr>
		</table>
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