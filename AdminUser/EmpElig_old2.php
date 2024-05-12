<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//**********************************
$_SESSION['EmpID']=$_REQUEST['ID'];
$EMPID=$_SESSION['EmpID'];
//**********************************
if(isset($_POST['EditEligE']))
{
 $sqlCode=mysql_query("select EmpCode from hrm_employee where EmployeeID=".$EMPID, $con); 
 $resCode=mysql_fetch_assoc($sqlCode);
 if($_POST['ModeTraOutSide_HQ']=='N'){$TraMode=''; $TraClass='';} else {$TraMode=$_POST['TraMode']; $TraClass=$_POST['TraClass'];}
 $sqlElig = mysql_query("select * from hrm_employee_eligibility where EmployeeID=".$EMPID." AND EligCreatedDate='".date("Y-m-d")."' AND Status='A'", $con); 
 $rowElig=mysql_num_rows($sqlElig);
 if($rowElig>0)
 { 
     
     $SqlInsElig = mysql_query("UPDATE hrm_employee_eligibility SET EC=".$resCode['EmpCode'].", Lodging_CategoryA='".$_POST['LodgingCatA']."', Lodging_CategoryB='".$_POST['LodgingCatB']."', Lodging_CategoryC='".$_POST['LodgingCatC']."', DA_Outside_Hq='".$_POST['DaOutSide_HQRs']."', DA_Inside_Hq='".$_POST['DA_InSide_HQRs']."', DA_Outside_HqWithNightH='".$_POST['DaOutSide_HQRs_WithNH']."', DA_Outside_HqWithOutNightH='".$_POST['DaOutSide_HQRs_WithOutNH']."', Travel_TwoWeeKM='".$_POST['TwoWheelerKM']."', Travel_FourWeeKM='".$_POST['FourWheelerKM']."', Travel_TwoWeeLimitPerMonth='".$_POST['TwoWRestrict']."', Travel_TwoWeeLimitPerDay='".$_POST['TwoWRestrict_PD']."', Travel_FourWeeLimitPerMonth='".$_POST['FourWRestrict']."', Travel_FourWeeLimitPerDay='".$_POST['FourWRestrict_PD']."', TwoWeeOutSide_Restric='".$_POST['TwoWRestrict_OutSite']."', FourWeeOutSide_Restric='".$_POST['FourWRestrict_OutSite']."', Mode_Travel_Outside_Hq='".$TraMode."', TravelClass_Outside_Hq='".$TraClass."', Mobile_Exp_Rem='".$_POST['MoExpeReim']."', Mobile_Exp_Rem_Rs='".$_POST['MobileExpRs']."', Mobile_Company_Hand='".$_POST['MoComHandSet']."', Mobile_Hand_Elig='".$_POST['MoHandSet']."', Mobile_Hand_Elig_Rs='".$_POST['MobileHandRs']."', Misc_Expenses='".$_POST['MiscExp']."', Health_Insurance='".$_POST['HealthInsu']."', EligCreatedBy=".$UserId.", EligCreatedDate='".date("Y-m-d")."', EligYearId=".$YearId.", Plan='".$_POST['Plan']."'  WHERE EmployeeId=".$EMPID." AND EligCreatedDate='".date("Y-m-d")."' AND Status='A'", $con);
 }
 if($rowElig==0)
 { 
   $sqlU= mysql_query("UPDATE hrm_employee_eligibility SET Status='D' where EmployeeID=".$EMPID." AND Status='A'", $con);
   $SqlInsElig = mysql_query("insert into hrm_employee_eligibility(EmployeeId, EC, Lodging_CategoryA, Lodging_CategoryB, Lodging_CategoryC, DA_Outside_Hq, DA_Inside_Hq, DA_Outside_HqWithNightH, DA_Outside_HqWithOutNightH, Travel_TwoWeeKM, Travel_FourWeeKM, Travel_TwoWeeLimitPerMonth, Travel_TwoWeeLimitPerDay, Travel_FourWeeLimitPerMonth, Travel_FourWeeLimitPerDay, TwoWeeOutSide_Restric, FourWeeOutSide_Restric, Mode_Travel_Outside_Hq, TravelClass_Outside_Hq, Mobile_Exp_Rem, Mobile_Exp_Rem_Rs, Mobile_Company_Hand, Mobile_Hand_Elig, Mobile_Hand_Elig_Rs, Misc_Expenses, Health_Insurance, Plan, Status, EligCreatedBy, EligCreatedDate, EligYearId) values(".$EMPID.", ".$resCode['EmpCode'].", '".$_POST['LodgingCatA']."', '".$_POST['LodgingCatB']."', '".$_POST['LodgingCatC']."', '".$_POST['DaOutSide_HQRs']."', '".$_POST['DA_InSide_HQRs']."', '".$_POST['DaOutSide_HQRs_WithNH']."', '".$_POST['DaOutSide_HQRs_WithOutNH']."', '".$_POST['TwoWheelerKM']."', '".$_POST['FourWheelerKM']."', '".$_POST['TwoWRestrict']."', '".$_POST['TwoWRestrict_PD']."', '".$_POST['FourWRestrict']."', '".$_POST['FourWRestrict_PD']."', '".$_POST['TwoWRestrict_OutSite']."', '".$_POST['FourWRestrict_OutSite']."', '".$TraMode."', '".$TraClass."', '".$_POST['MoExpeReim']."', '".$_POST['MobileExpRs']."', '".$_POST['MoComHandSet']."', '".$_POST['MoHandSet']."', '".$_POST['MobileHandRs']."', '".$_POST['MiscExp']."', '".$_POST['HealthInsu']."', '".$_POST['Plan']."', 'A', ".$UserId.", '".date("Y-m-d")."', ".$YearId.")", $con);
 }
  if($SqlInsElig) {$msg="Employee Eligibility updated Successfully....."; }
}

?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
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
<script language="javascript">
function EditElig()
{
 document.getElementById("TDFirst").style.display = 'none'; document.getElementById("TDSecond").style.display = 'block';
}

function DAOutSite(value)
{ 
 var A1=document.getElementById("A1").value; 
 if(value=='N'){document.getElementById("DaOutSide_HQRs").value = ' '; }
 else if(value=='Y'){document.getElementById("DaOutSide_HQRs").value = A1; }
}

function DAInSite(value)
{ 
 var B1=document.getElementById("B1").value;
 if(value=='N'){document.getElementById("DaInSide_HQRs").value = ' ';}
 else if(value=='Y'){document.getElementById("DaInSide_HQRs").value = B1;}
}

function ModeTravel(value)
{ 
 if(value=='N'){document.getElementById("TraMode").disabled = true; }
 else if(value=='Y'){document.getElementById("TraMode").disabled = false; }
} 

/*function DAOutSitePD(value)
{ 
 var B1=document.getElementById("B1").value;
 if(value=='N'){document.getElementById("DaOutSide_HQPDRs").value = '';}
 else if(value=='Y'){document.getElementById("DaOutSide_HQPDRs").value = B1;}
}*/
  
function ClickGPRS()
{ 
 if(document.getElementById("GPCheck").checked==true){document.getElementById("MobileHandRs").value=document.getElementById("MH_GPRS").value;}else if(document.getElementById("GPCheck").checked==false){document.getElementById("MobileHandRs").value=document.getElementById("MobileHand").value; }
}   

function SelectMoExpeReim(value)
{ 
 var D2=document.getElementById("D2").value; var P2=document.getElementById("P2").value; 
 var DeId=document.getElementById("DeId").value; 
 var ME1=document.getElementById("ME1").value;  var ME2=document.getElementById("ME2").value;
 var ME3=document.getElementById("ME3").value; var prd3=document.getElementById("prd3").value;
 var prd1=document.getElementById("prd1").value;  var prd2=document.getElementById("prd2").value;  //alert(DeId);
 
 if(value=='N'){document.getElementById("MobileExpRs").value = '';}
 
 //else if(value=='Y' && (DeId==D2 || DeId==P2 || DeId==27)) 
 else if(value=='Y' && (DeId==3 || DeId==4 || DeId==6 || DeId==12 || DeId==25 || DeId==27))
 {document.getElementById("MobileExpRs").value = ME1; document.getElementById("Prdd").value = prd1;  }
 else if(value=='Y' && DeId==2)
 {document.getElementById("MobileExpRs").value = ME3; document.getElementById("Prdd").value = prd3;  }
 //else if(value=='Y' && DeId!=D2 && DeId!=P2 && DeId!=27)
 else if(value=='Y' && (DeId==1 || DeId==5 || DeId==7 || DeId==8 || DeId==9 || DeId==10 || DeId==11 || DeId==24))
 {document.getElementById("MobileExpRs").value = ME2; document.getElementById("Prdd").value = prd2; } 
}

function SelectMoHandSet(value)
{ 
 var MobileHand=document.getElementById("MobileHand").value;  
 if(value=='N'){document.getElementById("MobileHandRs").value = '';}
 else if(value=='Y'){document.getElementById("MobileHandRs").value = MobileHand;} 
}
  
function HRSaveElig(E,P,Y,C,U)
{ 
  var ModeTraOutSide_HQ = document.getElementById("ModeTraOutSide_HQ").value;  
  var TraMode = document.getElementById("TraMode").value; 
  if (ModeTraOutSide_HQ == 'Y' && TraMode == 0) { alert("Please Select Travel Mode.");  return false; }
  var LodgingCatA = document.getElementById("LodgingCatA").value;  
  var ModeTraOutSide_HQ = document.getElementById("ModeTraOutSide_HQ").value;   
  var LodgingCatB = document.getElementById("LodgingCatB").value; 
  var LodgingCatC = document.getElementById("LodgingCatC").value;  
  
  var DaOutSide_HQ = document.getElementById("DaOutSide_HQ").value; 
  var DaOutSide_HQRs = document.getElementById("DaOutSide_HQRs").value; 
  var DaInSide_HQ = document.getElementById("DaInSide_HQ").value; 
  var DaInSide_HQRs = document.getElementById("DaInSide_HQRs").value; 
  
  var TwoWheelerKM = document.getElementById("TwoWheelerKM").value; 
  var TwoWRestrict = document.getElementById("TwoWRestrict").value; 
  var TwoWRestrict_PD = document.getElementById("TwoWRestrict_PD").value;
  var FourWRestrict = document.getElementById("FourWRestrict").value;
  var FourWheelerKM = document.getElementById("FourWheelerKM").value; 
  var TraMode = document.getElementById("TraMode").value; 
  var TraClass = document.getElementById("TraClass").value; 
  var MoExpeReim = document.getElementById("MoExpeReim").value;
  var MobileExpRs = document.getElementById("MobileExpRs").value; 
  var MobileHandRs = document.getElementById("MobileHandRs").value;  
  var MoHandSet = document.getElementById("MoHandSet").value; 
  var MoComHandSet = document.getElementById("MoComHandSet").value; 
  var MiscExp = document.getElementById("MiscExp").value; 
  var HealthInsu = document.getElementById("HealthInsu").value; 
  var Bonus = document.getElementById("BonusElig").value;   
  var Gratuity = document.getElementById("GratuityElig").value; 
  var CHDate = document.getElementById("CHDate").value;
  var TwoWRestrict_OutSite = document.getElementById("TwoWRestrict_OutSite").value; 
  var FourWRestrict_OutSite = document.getElementById("FourWRestrict_OutSite").value;
  
  var HelthChekUp = document.getElementById("HelthChekUp").value; 
  var Car2Policy = document.getElementById("Car2Policy").value; 
  var VehicleCost = document.getElementById("VehicleCost").value; 
  var With2Driver = document.getElementById("With2Driver").value; 
  var Advance2Com = document.getElementById("Advance2Com").value; 
  var DateOfEPolicy = document.getElementById("DateOfEPolicy").value;
  var LessKm = document.getElementById("Less2Km").value;
  var Prd = document.getElementById("Prdd").value; 
  var Rmk = document.getElementById("Rmkk").value;
  
  var agree=confirm("Are you sure you want to save Employee Eligibility?"); 
  if(agree) 
  { 
   var url = 'HRNormalizedInc_old3.php'; var pars = 'LodgingCatA22='+LodgingCatA+'&LodgingCatB='+LodgingCatB+'&LodgingCatC='+LodgingCatC+'&DaOutSide_HQ='+DaOutSide_HQ+'&DaOutSide_HQRs='+DaOutSide_HQRs+'&DaInSide_HQ='+DaInSide_HQ+'&DaInSide_HQRs='+DaInSide_HQRs+'&TwoWheelerKM='+TwoWheelerKM+'&FourWheelerKM='+FourWheelerKM+'&TraMode='+TraMode+'&TraClass='+TraClass+'&MoExpeReim='+MoExpeReim+'&MiscExp='+MiscExp+'&HealthInsu='+HealthInsu+'&Bonus='+Bonus+'&Gratuity='+Gratuity+'&CHDate='+CHDate+'&E='+E+'&P='+P+'&Y='+Y+'&C='+C+'&U='+U+'&ModeTraOutSide_HQ='+ModeTraOutSide_HQ+'&MobileExpRs='+MobileExpRs+'&MobileHandRs='+MobileHandRs+'&MoHandSet='+MoHandSet+'&TwoWRestrict='+TwoWRestrict+'&TwoWRestrict_PD='+TwoWRestrict_PD+'&FourWRestrict='+FourWRestrict+'&MoComHandSet='+MoComHandSet+'&TwoWRestrict_OutSite='+TwoWRestrict_OutSite+'&FourWRestrict_OutSite='+FourWRestrict_OutSite+'&HelthChekUp='+HelthChekUp+'&Car2Policy='+Car2Policy+'&VehicleCost='+VehicleCost+'&With2Driver='+With2Driver+'&Advance2Com='+Advance2Com+'&DateOfEPolicy='+DateOfEPolicy+'&LessKm='+LessKm+'&Prd='+Prd+'&Rmk='+Rmk; 
   var myAjax = new Ajax.Request(  url, { method: 'post', parameters: pars, onComplete: show_HREmpElig});
   return true; 
  }else{ return false; }
}
function show_HREmpElig(originalRequest)
{ document.getElementById("msgElig").innerHTML = originalRequest.responseText; }

</script>
</head>
<body class="body">
<?php $SqlEmp = mysql_query("SELECT EmpCode, Fname, Sname, Lname, ESCI, EmpAddBenifit_MediInsu_value, gr.GradeId, GradeValue, DepartmentId FROM hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_ctc c ON e.EmployeeID=c.EmployeeID INNER JOIN hrm_grade gr ON g.GradeId=gr.GradeId WHERE c.Status='A' AND e.EmployeeID=".$EMPID, $con);  $ResEmp=mysql_fetch_assoc($SqlEmp);
$Ename = $ResEmp['Fname'].'&nbsp;'.$ResEmp['Sname'].'&nbsp;'.$ResEmp['Lname']; $LEC=strlen($ResEmp['EmpCode']); 
 if($LEC==1){$EC='000'.$ResEmp['EmpCode'];} if($LEC==2){$EC='00'.$ResEmp['EmpCode'];} if($LEC==3){$EC='0'.$ResEmp['EmpCode'];} if($LEC>=4){$EC=$ResEmp['EmpCode'];}

 
$Grade=$ResEmp['GradeValue']; 
if($Grade!='')
{ 
 $sqlLod=mysql_query("select * from hrm_lodentitle where GradeValue='".$Grade."' AND CompanyId=".$CompanyId, $con); 
 $sqlDaily=mysql_query("select * from hrm_dailyallow where GradeValue='".$Grade."' AND CompanyId=".$CompanyId, $con);
 $sqlEnt=mysql_query("select * from hrm_travelentitle where GradeValue='".$Grade."' AND CompanyId=".$CompanyId, $con);
 $sqlElig=mysql_query("select * from hrm_traveleligibility where GradeValue='".$Grade."' AND CompanyId=".$CompanyId, $con);
 $resLod=mysql_fetch_assoc($sqlLod);  $resDaily=mysql_fetch_assoc($sqlDaily);
 $resEnt=mysql_fetch_assoc($sqlEnt);  $resElig=mysql_fetch_assoc($sqlElig); 
 $sqlVehp=mysql_query("select * from hrm_vehiclepolicy where GradeValue='".$Grade."' AND CompanyId=".$CompanyId,$con); 
 $resVehp=mysql_fetch_assoc($sqlVehp);
 $sqlVehpn=mysql_query("select * from hrm_vehiclepolicy_new where GradeValue='".$Grade."' AND CompanyId=".$CompanyId,$con); 
 $resVehpn=mysql_fetch_assoc($sqlVehpn);
}  
 
$SqlEligEmp = mysql_query("SELECT * FROM hrm_employee_eligibility WHERE Status='A' AND EmployeeID=".$EMPID, $con);  $ResEligEmp=mysql_fetch_assoc($SqlEligEmp);

if($ResEmp['GradeValue']=='M4' OR $ResEmp['GradeValue']=='M5' OR $ResEmp['GradeValue']=='L1'){$Cond='(Approval based)';}
elseif($ResEmp['GradeValue']=='L2' OR $ResEmp['GradeValue']=='L3'){$Cond='(Need based)';}
else{$Cond='';}  

/* DA head Quarter */
if($ResEmp['DepartmentId']==3){$InsideHq=$resDaily['OutSiteHQ_PD']; $OutsideHq=$resDaily['OutSiteHQ']; } 
elseif($ResEmp['DepartmentId']==4){$InsideHq=$resDaily['OutSiteHQ_Prod']; $OutsideHq=$resDaily['OutSiteHQ']; }
elseif($ResEmp['DepartmentId']==6){$InsideHq=$resDaily['OutSiteHQ_Sales']; $OutsideHq=$resDaily['OutSiteHQ']; }
else{ $InsideHq=''; $OutsideHq=$resDaily['OutSiteHQ']; }

/* Two Weeler Four Weeler Eligibility */ 
$TwoW=$resElig['TwoWheeler']; $FourW=$resElig['FourWheeler'];
if($ResEmp['DepartmentId']==2)
{ 
 $TwoW=$resElig['TwoWheeler_R']; $FourW=$resElig['FourWheeler_R'];    
 $TwoMxPD=$resElig['TwoWheeler_Restric_Resrch_PD'];  $TwoMxPM=$resElig['TwoWheeler_Restric_Resrch']; 
 $TwoMxPD_Out=$resElig['TwoWheeler_Restric_OutSite_Resrch_PD']; $TwoMxPM_Out=$resElig['TwoWheeler_Restric_OutSite_Resrch'];
 $FourMxPM=$resElig['FourWheeler_Restric_Resrch']; $FourMxPM_Out=$resElig['FourWheeler_Restric_OutSite_Resrch'];
} 
elseif($ResEmp['DepartmentId']==6 OR $ResEmp['DepartmentId']==3 OR $ResEmp['DepartmentId']==4)
{ 
 $TwoW=$resElig['TwoWheeler_S']; $FourW=$resElig['FourWheeler_S'];    
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

<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){require_once("AMenu.php"); } ?></td></tr></table></td></tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
  <tr><td valign="top"><?php if($_SESSION['login'] = true){require_once("AWelcome.php"); } ?></td></tr>
  <tr>
  <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //**********************************************START*****START*****START******START******START*************?>
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="4">
   <table border="0">
    <tr>
	  <td align="right" width="270" class="heading">Eligibility</td>
	  <!--<td style="font-family:Times New Roman; font-size:16px; color:#287126; font-weight:bold;"><font color="#FF0000" size="4">*</font>  - Require Field</td>-->
	  <td class="All_100" align="right">EmpCode :</td><td class="All_90"><input name="EmpCode" id="EmpCode" style="background-color:#E6EBC5;" class="All_80" value="<?php echo $EC; ?>" readonly></td>
 <td class="All_50" align="right">Name :</td><td class="All_220"><input name="EmpName" id="EmpName" style="width:210px; height:18px; font-size:11px;background-color:#E6EBC5;" value="<?php echo $Ename; ?>" readonly></td>
	  <td><table><tr><td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><span id="msgspan"><?php echo $msg; ?></span></b></td></tr></table></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true){ ?>	
 <tr>
 <td style="width:100px;" align="center" valign="top"><?php if($_REQUEST['Event']=='Edit') { include("EmpMasterMenu.php"); } ?></td>
 <td style="width:50px;" align="center" valign="top"></td>
<?php //***************************************************************************************************?>

<?php $sqlD2=mysql_query("select DepartmentId from hrm_department where DepartmentName='Sales' AND DepartmentCode='SALES' AND CompanyId=".$CompanyId, $con); $sqlP2=mysql_query("select DepartmentId from hrm_department where DepartmentName='Production' AND DepartmentCode='PRODUCTION' AND CompanyId=".$CompanyId, $con);$sqlPD2=mysql_query("select DepartmentId from hrm_department where DepartmentCode='PD' AND CompanyId=".$CompanyId, $con); $resD2=mysql_fetch_assoc($sqlD2); $resP2=mysql_fetch_assoc($sqlP2); $resPD2=mysql_fetch_assoc($sqlPD2); ?>

<?php if($_REQUEST['Event']=='Edit') {?>
 <td align="left" id="Eelig" valign="top">             
<form enctype="multipart/form-data" name="formEelig" method="post" onSubmit="return validate(this)">
<table border="0">
<tr> 
<input type="hidden" id="D2" class="All_100" value="<?php echo $resD2['DepartmentId']; ?>"/>  
<input type="hidden" id="P2" class="All_100" value="<?php echo $resP2['DepartmentId']; ?>"/>
<input type="hidden" id="DeId" class="All_100" value="<?php echo $ResEmp['DepartmentId']; ?>"/>
<input type="hidden" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" id="A1" name="A1" value="<?=$OutsideHq?>" /> 
<input type="hidden" id="B1" name="B1" value="<?=$InsideHq?>" />
<input type="hidden" Name="MH" id="MH" value="<?php echo $resDaily['MH']; ?>"/>
<input type="hidden" Name="MRSP" id="MRSP" value="<?php echo $resDaily['MRSP']; ?>"/>
<input type="hidden" Name="MRNS" id="MRNS" value="<?php echo $resDaily['MRNS']; ?>"/>
<input type="hidden" Name="MCS" id="MCS" value="<?php echo $resDaily['MCS']; ?>"/>
<input type="hidden" Name="MCSSP" id="MCSSP" value="<?php echo $resDaily['MCSSP']; ?>"/>
<input type="hidden" Name="DaOutSide_HQRs_WithNH" id="DaOutSide_HQRs_WithNH" class="All_100" value="0" readonly/>
<input type="hidden" Name="DaOutSide_HQRs_WithOutNH" id="DaOutSide_HQRs_WithOutNH" class="All_100" value="0" readonly/>


<?php /////////////////////////////////// First Table Data Open //////////////////////////////?>
<?php /////////////////////////////////// First Table Data Open //////////////////////////////?>
<?php /////////////////////////////////// First Table Data Open //////////////////////////////?>
 
<td align="left" valign="top" id="TDFirst" style="display:block;">
<input type="hidden" id="ComId" value="<?php echo $CompanyId; ?>" />
<table class="td3" border="0" width="100%" id="TEmp" cellspacing="0">
<tr>
 <td class="td3" style="width:2%;"></td>
 <td class="td3" style="width:98%;">
 <table border="0" width="100%">
 <tr>
  <td class="td3" width="25%">Lodging :</td>
  <td class="td2" width="20%">Category A</td>
  <td class="td2" width="20%">Category B</td>
  <td class="td2" width="20%">Category C</td>
  <td class="td2" width="15%"></td>
 </tr>
 <tr>
  <td class="td3">&nbsp;</td>
  <td class="td2"><input class="td2" style="width:100px;" readonly value="<?php if($ResEligEmp['Lodging_CategoryA']>0){echo floatval($ResEligEmp['Lodging_CategoryA']);}elseif($ResEligEmp['Lodging_CategoryA']!=''){echo $ResEligEmp['Lodging_CategoryA'];} ?>"/></td>
  <td class="td2"><input class="td2" style="width:100px;" readonly value="<?php if($ResEligEmp['Lodging_CategoryB']>0){echo floatval($ResEligEmp['Lodging_CategoryB']);}elseif($ResEligEmp['Lodging_CategoryB']!=''){echo $ResEligEmp['Lodging_CategoryB'];} ?>"/></td>
  <td class="td2"><input class="td2" style="width:100px;" readonly value="<?php if($ResEligEmp['Lodging_CategoryC']>0){echo floatval($ResEligEmp['Lodging_CategoryC']);}elseif($ResEligEmp['Lodging_CategoryC']!=''){echo $ResEligEmp['Lodging_CategoryC'];} ?>"/></td>
  <td class="td2"></td>
 </tr>
 </table>
 </td>
</tr>
<tr>
 <td class="td2"></td>
 <td>
 <table border="0">
  <tr>
   <td class="td3" style="width:350px;">DA Outside H.Q. :</td>
   <td class="td3" style="width:52px;" align="right"><select class="td3" style="width:50px;" onChange="DAOutSite(this.value)" disabled><option value="Y" <?php if($ResEligEmp['DA_Outside_Hq']!='' AND $ResEligEmp['DA_Outside_Hq']!=' '){echo 'selected';}?>>Yes</option><option value="N" <?php if($ResEligEmp['DA_Outside_Hq']=='' OR $ResEligEmp['DA_Outside_Hq']==' '){echo 'selected';}?>>No</option></select></td>
  <td class="td3" style="width:140px;">&nbsp;Rs. :&nbsp;<input class="td2" style="width:100px;" value="<?php echo $ResEligEmp['DA_Outside_Hq']; ?>" readonly/></td><td class="td3" style="width:60px;">Per Day</td>
 </tr>
 <tr>
  <td class="td3">DA @ H.Q.<?php if($ResEmp['DepartmentId']==3){ echo 'In case of day tour involving more than 40 kms. travel'; }elseif($ResEmp['DepartmentId']==4){ echo 'If the work needs touring for more than 6 hours in a day & as per the applicability of the seasons'; }elseif($ResEmp['DepartmentId']==6){ echo '(Only For Sales Staff)'; }elseif($ResEmp['DepartmentId']==24 OR $ResEmp['DepartmentId']==25){ echo 'If the work needs touring for more than 6 hours in a day'; } ?> :
  </td>
  <td class="td3" align="right"><select class="td3" style="width:50px;" onChange="DAInSite(this.value)" disabled><option value="Y" <?php if($ResEligEmp['DA_Inside_Hq']!='' AND $ResEligEmp['DA_Inside_Hq']!=' '){echo 'selected';}?>>Yes</option><option value="N" <?php if($ResEligEmp['DA_Inside_Hq']=='' OR $ResEligEmp['DA_Inside_Hq']==' '){echo 'selected';}?>>No</option></select></td>
  <td class="td3">&nbsp;Rs. :&nbsp;<input class="td2" style="width:100px;" value="<?php echo $ResEligEmp['DA_Inside_Hq'];?>" readonly/></td><td class="td3">Per Day</td>
 </tr>
 </table>
 </td>
</tr>
<tr>
 <td class="td2"></td>
 <td>
 <table border="0">
 <tr>
  <td class="td3" style="width:90px;">TwoWheeler:</td>
  <td class="td3" style="width:75px;"><input class="td3" style="width:70px;" value="<?php if($ResEligEmp['Travel_TwoWeeKM']!='' AND $ResEligEmp['Travel_TwoWeeKM']!='NA' AND $ResEligEmp['Travel_TwoWeeKM']!='0'){echo $ResEligEmp['Travel_TwoWeeKM'].'&nbsp;Per KM';}else{echo 'NA';} ?>" readonly/></td>
  <td class="td3" style="width:40px;"><?php if($ResEmp['DepartmentId']==2 AND $ResEmp['GradeId']>72){echo 'Min';}else{echo 'Max';} ?> :</td>
  <td class="td3" style="width:150px;"><input class="td3" style="width:150px;" value="<?php if($ResEligEmp['Travel_TwoWeeLimitPerMonth']!='' AND $ResEligEmp['Travel_TwoWeeLimitPerMonth']!='NA'){echo $ResEligEmp['Travel_TwoWeeLimitPerDay'].'&nbsp;KM PD&nbsp;/&nbsp;'.$ResEligEmp['Travel_TwoWeeLimitPerMonth'].'&nbsp;KM PM'; }else{echo 'NA';} ?>" readonly/></td>
  <td class="td3" style="width:80px;">OutSite HQ :</td>
  <td class="td3" style="width:62px;"><input class="td3" style="width:100px;" value="<?php echo $ResEligEmp['TwoWeeOutSide_Restric']; ?>" readonly/></td>
 </tr>
 
 <?php /*if($ResEligEmp['LessKm']=='Y'){ ?>
 <tr>
  <td class="td3">FourWheeler:</td>
  <td class="td3" colspan="5">Fuel expense reimbursement on Actual on submission of bill</td>
 </tr>
 <?php }else{ */?>
  <tr>
  <td class="td3">FourWheeler:</td>
  <td class="td3"><input class="td3" style="width:70px;" value="<?php if($ResEligEmp['Travel_FourWeeKM']!='' AND $ResEligEmp['Travel_FourWeeKM']!='NA' AND $ResEligEmp['Travel_FourWeeKM']!='0'){echo $ResEligEmp['Travel_FourWeeKM'].'&nbsp;Per KM';}else{echo 'NA';} ?>" readonly/></td>
  <td class="td3"><?php if($ResEmp['DepartmentId']==2 AND $ResEmp['GradeId']>72){echo 'Min';}else{echo 'Max';} ?> :</td>
  <td class="td3"><input class="td3" style="width:150px;" value="<?php if($ResEligEmp['Travel_FourWeeLimitPerMonth']!='' AND $ResEligEmp['Travel_FourWeeLimitPerMonth']!='NA' AND $ResEligEmp['Travel_FourWeeLimitPerMonth']!='0'){if($ResEligEmp['Travel_FourWeeLimitPerMonth']>0){$PerA=$ResEligEmp['Travel_FourWeeLimitPerMonth']*12; $PerAnnum=$PerA.'&nbsp;KM PA';}elseif($ResEligEmp['Travel_FourWeeLimitPerMonth']=='Actual'){$PerAnnum='Actual&nbsp;KM PA';} else{$PerAnnum='';} echo $ResEligEmp['Travel_FourWeeLimitPerMonth'].'&nbsp;KM PM&nbsp;/&nbsp;'.$PerAnnum;}else{echo 'NA';}?>" readonly/></td>
  <td class="td3" style="width:80px;">OutSite HQ :</td>
  <td style="width:62px;"><input class="td3" style="width:100px;" value="<?php echo $ResEligEmp['FourWeeOutSide_Restric']; ?>" readonly/></td>
 </tr>
 <?php //} ?>
 
 </table>
 </td>
</tr>
<?php if($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='Y'){$Mode='Flight'.$Cond.'/Train'; $Class=$resEnt['TravelClass_Flight'].'/'.$resEnt['TravelClass_Train'];} elseif($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='N') {$Mode='Flight'.$Cond; $Class=$resEnt['TravelClass_Flight'];} elseif($resEnt['ModeTravel_Flight']=='N' AND $resEnt['ModeTravel_Train']=='Y') {$Mode='Train'; $Class=$resEnt['TravelClass_Train'];} ?>

<tr>
 <td class="td2"></td>
 <td>
 <table border="0">
 <tr>
  <td class="td3" style="width:213px;">Mode of Travels OutSide H.Q. :</td>
  <td class="td3" style="width:50px;"><select class="td3" style="width:50px;" onChange="ModeTravel(this.value)" disabled><option value="" selected><?php if($ResEligEmp['Mode_Travel_Outside_Hq']!=''){echo '&nbsp;Yes';}else{echo '&nbsp;No';} ?></option><option value="<?php if(($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='Y') OR ($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='N') OR ($resEnt['ModeTravel_Flight']=='N' AND $resEnt['ModeTravel_Train']=='Y')) echo 'Y'; else echo 'N'; ?>">&nbsp;<?php if(($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='Y') OR ($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='N') OR ($resEnt['ModeTravel_Flight']=='N' AND $resEnt['ModeTravel_Train']=='Y')) echo 'Yes'; else echo 'No'; ?></option><option value="<?php if(($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='Y') OR ($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='N') OR ($resEnt['ModeTravel_Flight']=='N' AND $resEnt['ModeTravel_Train']=='Y')) echo 'N'; else echo 'Y'; ?>">&nbsp;<?php if(($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='Y') OR ($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='N') OR ($resEnt['ModeTravel_Flight']=='N' AND $resEnt['ModeTravel_Train']=='Y')) echo 'No'; else echo 'Yes'; ?></option></select></td>
  <td class="td3" style="width:96px;"><select class="td3" style="width:96px;" disabled onChange="Selectmode(this.value)"/><option value="<?php echo $ResEligEmp['Mode_Travel_Outside_Hq']; ?>" selected><?php echo $ResEligEmp['Mode_Travel_Outside_Hq']; ?></option><option value="<?php if(($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='Y') OR ($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='N') OR ($resEnt['ModeTravel_Flight']=='N' AND $resEnt['ModeTravel_Train']=='Y')) echo $Mode; ?>">&nbsp;<?php if(($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='Y') OR ($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='N') OR ($resEnt['ModeTravel_Flight']=='N' AND $resEnt['ModeTravel_Train']=='Y')) echo $Mode; ?></option><option value="Train">&nbsp;Train</option><option value="Flight">&nbsp;Flight</option></select></td>
  <td class="td3" style="width:80px;">Class :</td>
  <td class="td3" style="width:100px;"><span id="ModeClassSpan"><select class="All_100" disabled>  <option value="<?php echo $ResEligEmp['TravelClass_Outside_Hq']; ?>" selected><?php echo $ResEligEmp['TravelClass_Outside_Hq']; ?></option><option value="<?php if(($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='Y') OR ($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='N') OR ($resEnt['ModeTravel_Flight']=='N' AND $resEnt['ModeTravel_Train']=='Y')) echo $Class; ?>">&nbsp;<?php if(($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='Y') OR ($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='N') OR ($resEnt['ModeTravel_Flight']=='N' AND $resEnt['ModeTravel_Train']=='Y')) echo $Class; ?></option><option value="General">General</option><option value="Sleeper">Sleeper</option><option value="AC-I">AC-I</option><option value="AC-II">AC-II</option><option value="AC-III" class>AC-III</option></select></span></td>
 </tr>
 </table>
 </td>
</tr>
<?php if($resD2['DepartmentId']==$ResEmp['DepartmentId'] OR $resP2['DepartmentId']==$ResEmp['DepartmentId']) $MR=$resDaily['MRSP']; if($resD2['DepartmentId']!=$ResEmp['DepartmentId'] AND $resP2['DepartmentId']!=$ResEmp['DepartmentId']) $MR=$resDaily['MRNS']; ?>

<tr>
 <td class="td2"></td>
 <td>
 <table border="0">
 <tr>
  <td class="td3" style="width:395px;">Mobile expenses Reimbursement :</td>
  <td class="td3" style="width:52px;"><select class="td3" style="width:50px;" onChange="SelectMoExpeReim(this.value)" disabled><option value="<?php if($ResEligEmp['Lodging_CategoryA']>0){if($ResEligEmp['Mobile_Exp_Rem']=='Y') echo 'Y'; else echo 'N';} else { echo 'Y'; } ?>">&nbsp;<?php if($ResEligEmp['Lodging_CategoryA']>0){if($ResEligEmp['Mobile_Exp_Rem']=='Y') echo 'Yes'; else echo 'No';} else { echo 'Yes'; } ?></option><option value="<?php if($ResEligEmp['Lodging_CategoryA']>0){if($ResEligEmp['Mobile_Exp_Rem']=='Y') echo 'N'; else echo 'Y';} else { echo 'N'; } ?>">&nbsp;<?php if($ResEligEmp['Lodging_CategoryA']>0){if($ResEligEmp['Mobile_Exp_Rem']=='Y') echo 'No'; else echo 'Yes';} else { echo 'No'; } ?></option></select></td>
  <td class="td3">
  <input type="hidden" id="ME1" class="All_100" value="<?php echo $resDaily['MRSP']; ?>"/>
  <input type="hidden" id="ME2" class="All_100" value="<?php echo $resDaily['MRNS']; ?>"/>
  <input type="hidden" id="ME3" class="All_100" value="<?php echo $resDaily['MRNS_RD']; ?>"/>
  <input type="hidden" id="prd1" value="<?php echo $resDaily['prd_1']; ?>"/>
  <input type="hidden" id="prd2" value="<?php echo $resDaily['prd_2']; ?>"/>
  <input type="hidden" id="prd3" value="<?php echo $resDaily['prd_3']; ?>"/>
  <input class="td3" style="width:50px;" value="<?php if($ResEligEmp['Mobile_Exp_Rem_Rs']!=''){echo $ResEligEmp['Mobile_Exp_Rem_Rs'];} else {echo ''; }?>" readonly maxlength="10"/>
  <input class="td3" style="width:40px;" value="<?php if($ResEligEmp['Prd']!=''){echo $ResEligEmp['Prd'];} else {echo ''; }?>" readonly maxlength="10"/>
  
  </td>						 </tr>
 </table>
 </td>
</tr>
<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
 <tr>
  <td class="td3" style="width:179px;">Mobile Handset :</td>
  <td class="td3" style="width:202px;" align="right">Company Handset:&nbsp;
  <select class="td3" style="width:50px;" onChange="SelectComMoHandSet(this.value)" disabled>
  <option value="<?php if($ResEligEmp['Mobile_Company_Hand']=='Y'){echo 'Y';} else{echo 'N';} ?>">&nbsp;<?php if($ResEligEmp['Mobile_Company_Hand']=='Y'){echo 'Yes';} else{echo 'No';} ?></option><option value="<?php if($ResEligEmp['Mobile_Company_Hand']=='Y'){echo 'N';} else{echo 'Y';} ?>">&nbsp;<?php if($ResEligEmp['Mobile_Company_Hand']=='Y'){echo 'No';} else{echo 'Yes';} ?></option></select></td>
  <td class="td3" style="width:6px;"></td>
  <td class="td3" style="width:52px;"><select class="td3" style="width:50px;" onChange="SelectMoHandSet(this.value)" disabled><option value="<?php if($ResEligEmp['Lodging_CategoryA']>0){if(($ResEligEmp['Mobile_Hand_Elig_Rs']>0 OR $ResEligEmp['Mobile_Hand_Elig_Rs']!='') AND $ResEligEmp['Mobile_Hand_Elig']=='Y') echo 'Y'; else echo 'N';} else { echo 'Y'; } ?>">&nbsp;<?php if($ResEligEmp['Lodging_CategoryA']>0){if(($ResEligEmp['Mobile_Hand_Elig_Rs']>0 OR $ResEligEmp['Mobile_Hand_Elig_Rs']!='') AND $ResEligEmp['Mobile_Hand_Elig']=='Y') echo 'Yes'; else echo 'No';} else { echo 'Yes'; } ?></option><option value="<?php if($ResEligEmp['Lodging_CategoryA']>0){if(($ResEligEmp['Mobile_Hand_Elig_Rs']>0 OR $ResEligEmp['Mobile_Hand_Elig_Rs']!='') AND $ResEligEmp['Mobile_Hand_Elig']=='Y') echo 'N'; else echo 'Y';} else { echo 'N'; } ?>">&nbsp;<?php if($ResEligEmp['Lodging_CategoryA']>0){if(($ResEligEmp['Mobile_Hand_Elig_Rs']>0 OR $ResEligEmp['Mobile_Hand_Elig_Rs']!='') AND $ResEligEmp['Mobile_Hand_Elig']=='Y') echo 'No'; else echo 'Yes';} else { echo 'No';} ?></option></select></td>
  <td class="td3" style="width:100px;"><input class="td3" style="width:50px;" value="<?php if($ResEligEmp['Lodging_CategoryA']>0){echo $ResEligEmp['Mobile_Hand_Elig_Rs'];} else { if($resDaily['MH']!='') echo $resDaily['MH']; }?>" readonly maxlength="10"/>
      <input type="checkbox" <?php if($ResEligEmp['Mobile_Hand_Elig_Rs']==$resDaily['MH_GPRS'] AND $ResEligEmp['Mobile_Hand_Elig_Rs']!='' AND $ResEligEmp['Mobile_Hand_Elig_Rs']!='0'){echo 'checked';} ?> disabled /><font size="1">GPRS</font></td>
 </tr>
 </table>
 </td>
</tr>
<tr>
<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
  <tr>
   <td class="td3" style="width:395px;">Misc. expenses(like stationery/photocopy/fax/e-mail/etc) :</td>
   <td class="td3" style="width:52px;"><select class="td3" style="width:50px;" disabled><option value="<?php if($ResEligEmp['Lodging_CategoryA']>0){ echo $ResEligEmp['Misc_Expenses']; } elseif($resD2['DepartmentId']==$ResEmp['DepartmentId'] OR $resP2['DepartmentId']==$ResEmp['DepartmentId']) echo 'Y'; else 'N'; ?>">&nbsp;<?php if($ResEligEmp['Lodging_CategoryA']>0){ if($ResEligEmp['Misc_Expenses']=='Y') echo 'Yes'; else echo 'No'; } elseif($resD2['DepartmentId']==$ResEmp['DepartmentId'] OR $resP2['DepartmentId']==$ResEmp['DepartmentId']) echo 'Yes'; else echo 'No'; ?></option><option value="<?php if($ResEligEmp['Lodging_CategoryA']>0){ if($ResEligEmp['Misc_Expenses']=='Y') echo 'N'; else echo 'Y'; } elseif($resD2['DepartmentId']==$ResEmp['DepartmentId'] OR $resP2['DepartmentId']==$ResEmp['DepartmentId']) echo 'N'; else echo 'Y'; ?>">&nbsp;<?php if($ResEligEmp['Lodging_CategoryA']>0){ if($ResEligEmp['Misc_Expenses']=='Y') echo 'No'; else echo 'Yes'; } elseif($resD2['DepartmentId']==$ResEmp['DepartmentId'] OR $resP2['DepartmentId']==$ResEmp['DepartmentId']) echo 'No'; else echo 'Yes'; ?></option></select></td>														   
  </tr>
 </table>
 </td>
</tr>
<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
  <tr>
   <td class="td3" style="width:452px;">Health Insurance(Premium Paid by Company) :</td>
   <td class="td3" style="width:52px;"><input class="td3" style="width:100px;" value="<?php if($ResEligEmp['Health_Insurance']>0){echo intval($ResEligEmp['Health_Insurance']);}else {echo intval($ResEmp['EmpAddBenifit_MediInsu_value']); }?><?php //echo $ResEligEmp['Health_Insurance']; ?>" readonly/></td>
  </tr>
 </table>
 </td>
</tr>

<?php /******* New * New * New * New * New * New * New 2222  ********/ ?>
<?php $sqldb=mysql_query("select DOB from hrm_employee_general where EmployeeID=".$EMPID,$con); 
$resdb=mysql_fetch_assoc($sqldb);
$date1 = $resdb['DOB'];
$date2 = date("Y-m-d");
$diff = abs(strtotime($date2) - strtotime($date1));
$years = floor($diff/(365*60*60*24));
$months = floor(($diff-$years*365*60*60*24)/(30*60*60*24));
$days = floor(($diff-$years*365*60*60*24-$months*30*60*60*24)/(60*60*24)); 
$VNRExpMain=$years.'.'.$months;	
?>
<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
  <tr>
   <td class="td3" style="width:452px;">Executive Health Check-up (Once in 2 yrs) :</td>
   <td class="td3" style="width:100px;"><input class="td3" style="width:100px;" value="<?php if($ResEligEmp['HelthCheck']!='' AND $VNRExpMain>40){echo $resDaily['HelthChekUp'];}else{'NA'; }?>" readonly/></td>
  </tr>
 </table>
 </td>
</tr>
<?php if($ResEligEmp['CostOfVehicle']>0 AND $ResEligEmp['CostOfVehicle']!=''){?>
<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
  <tr>
   <td class="td3" style="width:452px;">Vehicle entitlement value :</td>
   <td class="td3" style="width:52px;"><input class="td3" style="width:100px;" value="<?php if($ResEligEmp['CostOfVehicle']>0){echo $ResEligEmp['CostOfVehicle']; } ?>" readonly/></td>
  </tr>
 </table>
 </td>
</tr>
<?php } ?>
<?php /******* New * New * New * New * New * New * New 2222  ********/ ?>

<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
  <tr>
   <td class="td3" style="width:452px;">Bonus/Exgretia(yearly) :</td>
   <td class="td3" style="width:52px;"><input class="td3" style="width:100px;" value="As per law" readonly/></td>
  </tr>
  </table>
 </td>
</tr>
<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
  <tr>
   <td class="td3" style="width:452px;">Gratuity :</td>
   <td class="td3" style="width:52px;"><input class="td3" style="width:100px;" value="As per law" readonly/></td>
  </tr>
  </table>
 </td>
</tr>
<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
  <tr>
   <td class="td3" style="width:152px;">Remark :</td>
   <td class="td3" style="width:100px;"><input class="td3" style="width:400px;" value="<?php echo $ResEligEmp['Remark']; ?>"/></td>
  </tr>
 </table>
 </td>
</tr>
<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
 <tr>
  <td class="td3" style="width:196px;">Deduction :</td>
  <td class="td3" style="width:280px;"></td>
 </tr>
 </table>
 </td>
</tr>
<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
 <tr>
  <td class="td3" style="width:196px;">* Deduction - As Per law :</td>
  <td class="td3" style="width:350px;">Provident Fund/ ESCI/ Tax on Employment/ Income Tax</td>
 </tr>
 </table>
 </td>
</tr>
<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
 <tr>
  <td class="td3" style="width:196px;">* Deduction - Actual :</td>
  <td class="td3" style="width:350px;">Any dues to company(if any)/ Advances</td>
 </tr>
 </table>
 </td>
</tr>
<tr>
 <td align="Right" class="fontButton" colspan="6">
  <table border="0" align="right" class="fontButton">
   <tr>	 
     <td class="td33" style="color:#fff;" align="right"><b>&nbsp;Date :</b></td>
   <td class="td33" style="color:#fff;"><input class="td22" style="width:100px;font-weight:bold;background-color:#CCFFCC;" value="<?php echo date("d-m-Y",strtotime($ResEligEmp['EligCreatedDate'])); ?>" readonly/></td>
	<td class="td3" align="right" style="width:90px;"><input type="button" name="ChangeElig" id="ChangeElig" style="width:90px; display:block;" value="edit" onClick="EditElig()" ></td>
   </tr>
  </table>
 </td>
</tr>
</table>
</td>

<?php /////////////////////////////////// First Table Data Close //////////////////////////////?>
<?php /////////////////////////////////// First Table Data Close //////////////////////////////?>
<?php /////////////////////////////////// First Table Data Close //////////////////////////////?>

<?php /////////////////////////////////// First Table Data Close //////////////////////////////?>
<?php /////////////////////////////////// First Table Data Close //////////////////////////////?>
<?php /////////////////////////////////// First Table Data Close //////////////////////////////?>
 
<?php /////////////////////////////////// Second Table Data Open //////////////////////////////?>
<?php /////////////////////////////////// Second Table Data Open //////////////////////////////?>
<?php /////////////////////////////////// Second Table Data Open //////////////////////////////?>

<td align="left" valign="top" id="TDSecond" style="display:none; ">

<table border="0" width="100%" id="TEmp" cellspacing="0">
<tr>
 <td class="td3" style="width:2%;"></td>
 <td class="td3" style="width:98%;">
 <table border="0" width="100%">
 <tr>
  <td class="td3" width="25%">Lodging :</td>
  <td class="td2" width="20%">Category A</td>
  <td class="td2" width="20%">Category B</td>
  <td class="td2" width="20%">Category C</td>
  <td class="td2" width="15%"></td>
 </tr>
 <tr>
  <td class="td3">&nbsp;</td>
  <td class="td2"><input class="td2" style="width:100px;" Name="LodgingCatA" id="LodgingCatA" readonly value="<?php echo $resLod['CategoryA_City']; ?>"/></td>
  <td class="td2"><input class="td2" style="width:100px;" Name="LodgingCatB" id="LodgingCatB" readonly value="<?php echo $resLod['CategoryB_City']; ?>"/></td>
  <td class="td2"><input class="td2" style="width:100px;" Name="LodgingCatC" id="LodgingCatC" readonly value="<?php echo $resLod['CategoryC_City']; ?>"/></td>
  <td class="td2"></td>
 </tr>
 </table>
 </td>
</tr>
<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
  <tr>
   <td class="td3" style="width:350px;">DA Outside H.Q. :</td>
   <td class="td3" style="width:52px;" align="right"><select Name="DaOutSide_HQ" id="DaOutSide_HQ" class="td3" style="width:50px;" onChange="DAOutSite(this.value)"><option value="Y" <?php if($OutsideHq!=''){echo 'selected';}?>>Yes</option><option value="N" <?php if($OutsideHq==''){echo 'selected';}?>>No</option></td>
  <td class="td3" style="width:140px;">&nbsp;Rs. :&nbsp;<input Name="DaOutSide_HQRs" id="DaOutSide_HQRs" class="td2" style="width:100px;" value="<?php echo $OutsideHq;?>"/></td><td class="td3" style="width:60px;">Per Day</td>
 </tr>
 <tr>
  <td class="td3">DA @ H.Q.<?php if($ResEmp['DepartmentId']==3){ echo 'In case of day tour involving more than 40 kms. travel'; }elseif($ResEmp['DepartmentId']==4){ echo 'If the work needs touring for more than 6 hours in a day & as per the applicability of the seasons'; }elseif($ResEmp['DepartmentId']==6){ echo '(Only For Sales Staff)'; }elseif($ResEmp['DepartmentId']==24 OR $ResEmp['DepartmentId']==25){ echo 'If the work needs touring for more than 6 hours in a day'; } ?> :
  </td>
  <td class="td3" align="right"><select Name="DaInSide_HQ" id="DaInSide_HQ" class="td3" style="width:50px;" onChange="DAInSite(this.value)"><option value="Y" <?php if($InsideHq!=''){echo 'selected';}?>>Yes</option><option value="N" <?php if($InsideHq==''){echo 'selected';}?>>No</option></select></td>
  <td class="td3">&nbsp;Rs. :&nbsp;<input Name="DaInSide_HQRs" id="DaInSide_HQRs" class="td2" style="width:100px;" value="<?php echo $InsideHq;?>"/></td><td class="td3">Per Day</td>
 </tr>
 </table>
 </td>
</tr>


<?php /******* New * New * New * New * New * New * New ********/ ?>
<?php /******* New * New * New * New * New * New * New ********/ ?>
<script type="text/javascript" language="javascript">
function FunCPolicy()
{
  if(document.getElementById("CarPolicy").checked==true)
  { 
   document.getElementById("OldPlan").disabled=true; document.getElementById("NewPlan").disabled=true;
   document.getElementById("Car2Policy").value='Y'; document.getElementById("VehicleCost").disabled=false; document.getElementById("WithDriver").disabled=false; document.getElementById("AdvanceCom").disabled=false; document.getElementById("DateOfEPolicy").disabled=false; 
   
   if(document.getElementById("Plan").value=='o')
   { document.getElementById("FourWheelerKM").value=document.getElementById("oWt2").value; }
   else{ document.getElementById("FourWheelerKM").value=document.getElementById("oWt3").value; }
   
   document.getElementById("VehicleCost").value=document.getElementById("FwLimit").value; document.getElementById("DateOfEPolicy").value=document.getElementById("CDate").value;
  }
  else
  { 
   document.getElementById("OldPlan").disabled=false; document.getElementById("NewPlan").disabled=false;
   document.getElementById("Car2Policy").value='N'; document.getElementById("VehicleCost").value=0; document.getElementById("VehicleCost").disabled=true; document.getElementById("WithDriver").checked=false; document.getElementById("WithDriver").disabled=true; document.getElementById("AdvanceCom").checked=false; document.getElementById("AdvanceCom").disabled=true; document.getElementById("DateOfEPolicy").value=''; document.getElementById("DateOfEPolicy").disabled=true; document.getElementById("FourWheelerKM").value=document.getElementById("Wy").value; document.getElementById("VehicleCost").value=0;
  } 
}

function FunAdvanceCom(d)
{
 if(document.getElementById("AdvanceCom").checked==true)
 { 
   document.getElementById("Advance2Com").value='Y'; 
   /*if(document.getElementById("WithDriver").checked==true)
   { 
    if(document.getElementById("Plan").value=='o')
    { document.getElementById("FourWheelerKM").value=document.getElementById("nW2").value; }
    else{ document.getElementById("FourWheelerKM").value=document.getElementById("nW3").value; }
   }
   else
   { 
    if(document.getElementById("Plan").value=='o')
    { document.getElementById("FourWheelerKM").value=document.getElementById("nWt2").value; }
    else{ document.getElementById("FourWheelerKM").value=document.getElementById("nWt3").value; }
   }*/
 }
 else
 { 
   document.getElementById("Advance2Com").value='N'; 
   /*if(document.getElementById("WithDriver").checked==true)
   { 
    if(document.getElementById("Plan").value=='o')
    { document.getElementById("FourWheelerKM").value=document.getElementById("oW2").value; }
    else{ document.getElementById("FourWheelerKM").value=document.getElementById("oW3").value; }
   }
   else
   { 
    if(document.getElementById("Plan").value=='o')
    { document.getElementById("FourWheelerKM").value=document.getElementById("oWt2").value; }
    else{ document.getElementById("FourWheelerKM").value=document.getElementById("oWt3").value; }
   }*/
 }
  var fwk= parseFloat(document.getElementById("FourWheelerKM").value); 
  if(document.getElementById("AdvanceCom").checked==true && fwk>0)
  {
   document.getElementById("FourWheelerKM").value=fwk-0.5; 
  }
  else
  {
   if(document.getElementById("Plan").value=='o')
   { var fwk=document.getElementById("oWt2").value; }
   else{var fwk=document.getElementById("oWt3").value; }
   document.getElementById("FourWheelerKM").value=fwk;
  }
  
}


function FunWDriver(d) 
{
  if(document.getElementById("WithDriver").checked==true)
  {
    document.getElementById("With2Driver").value='Y'; 
	if(document.getElementById("AdvanceCom").checked==true)
    { 
	 if(document.getElementById("Plan").value=='o')
     { document.getElementById("FourWheelerKM").value=document.getElementById("nW2").value; }
     else{ document.getElementById("FourWheelerKM").value=document.getElementById("nW3").value; }
	}
    else
    { 
	 if(document.getElementById("Plan").value=='o')
     { document.getElementById("FourWheelerKM").value=document.getElementById("oW2").value; }
     else{ document.getElementById("FourWheelerKM").value=document.getElementById("oW3").value; }
	}
  }
  else
  {
    document.getElementById("With2Driver").value='N'; 
	if(document.getElementById("AdvanceCom").checked==true)
    { 
	 if(document.getElementById("Plan").value=='o')
     { document.getElementById("FourWheelerKM").value=document.getElementById("nWt2").value; }
     else{ document.getElementById("FourWheelerKM").value=document.getElementById("nWt3").value; }
	}
    else
    { 
	 if(document.getElementById("Plan").value=='o')
     { document.getElementById("FourWheelerKM").value=document.getElementById("oWt2").value; }
     else{ document.getElementById("FourWheelerKM").value=document.getElementById("oWt3").value; }
	}
  }
}

function FunLessKm()
{
  if(document.getElementById("LessKm").checked==true)
  { document.getElementById("Less2Km").value='Y'; document.getElementById("VehicleCost").disabled=false; }
  else{ document.getElementById("Less2Km").value='N'; }
}

</script>
<?php $DptId=$ResEmp['DepartmentId']; 
	  if($DptId==4 OR $DptId==25)  //Prod && FS
	  { $FwLimit=$resVehp['LimitsPrd']; $nWy=$resElig['FourWheeler'];
	    $nW2y=$resVehp['nWDr_2yPrd'];   $nW35y=$resVehp['nWDr_35yPrd']; 
	    $nWt2y=$resVehp['nWtDr_2yPrd']; $nWt35y=$resVehp['nWtDr_35yPrd']; 
		$oW2y=$resVehp['oWDr_2yPrd'];   $oW35y=$resVehp['oWDr_35yPrd'];
		$oWt2y=$resVehp['oWtDr_2yPrd']; $oWt35y=$resVehp['oWtDr_35yPrd'];
		
		$FwLimitn=$resVehpn['LimitsPrd'];
	    $nW3y=$resVehpn['nWDr_3yPrd'];   $nW47y=$resVehpn['nWDr_47yPrd']; 
	    $nWt3y=$resVehpn['nWtDr_3yPrd']; $nWt47y=$resVehpn['nWtDr_47yPrd']; 
		$oW3y=$resVehpn['oWDr_3yPrd'];   $oW47y=$resVehpn['oWDr_47yPrd'];
		$oWt3y=$resVehpn['oWtDr_3yPrd']; $oWt47y=$resVehpn['oWtDr_47yPrd'];
	  }
	  elseif($DptId==6 OR $DptId==3)  //Sal && PD
	  { $FwLimit=$resVehp['LimitsSal']; $nWy=$resElig['FourWheeler_S'];
	    $nW2y=$resVehp['nWDr_2ySal'];   $nW35y=$resVehp['nWDr_35ySal']; 
	    $nWt2y=$resVehp['nWtDr_2ySal']; $nWt35y=$resVehp['nWtDr_35ySal']; 
		$oW2y=$resVehp['oWDr_2ySal'];   $oW35y=$resVehp['oWDr_35ySal'];
		$oWt2y=$resVehp['oWtDr_2ySal']; $oWt35y=$resVehp['oWtDr_35ySal'];
		
		$FwLimitn=$resVehpn['LimitsSal']; 
	    $nW3y=$resVehpn['nWDr_3ySal'];   $nW35y=$resVehpn['nWDr_47ySal']; 
	    $nWt3y=$resVehpn['nWtDr_3ySal']; $nWt35y=$resVehpn['nWtDr_47ySal']; 
		$oW3y=$resVehpn['oWDr_3ySal'];   $oW35y=$resVehpn['oWDr_47ySal'];
		$oWt3y=$resVehpn['oWtDr_3ySal']; $oWt35y=$resVehpn['oWtDr_47ySal'];
	  } 
	  elseif($DptId==2)  //R&D
	  { $FwLimit=$resVehp['LimitsSal']; $nWy=$resElig['FourWheeler_R'];
	    $nW2y=$resVehp['nWDr_2ySal'];   $nW35y=$resVehp['nWDr_35ySal']; 
	    $nWt2y=$resVehp['nWtDr_2ySal']; $nWt35y=$resVehp['nWtDr_35ySal']; 
		$oW2y=$resVehp['oWDr_2ySal'];   $oW35y=$resVehp['oWDr_35ySal'];
		$oWt2y=$resVehp['oWtDr_2ySal']; $oWt35y=$resVehp['oWtDr_35ySal'];
		
		$FwLimitn=$resVehpn['LimitsSal']; 
	    $nW3y=$resVehpn['nWDr_3ySal'];   $nW35y=$resVehpn['nWDr_47ySal']; 
	    $nWt3y=$resVehpn['nWtDr_3ySal']; $nWt35y=$resVehpn['nWtDr_47ySal']; 
		$oW3y=$resVehpn['oWDr_3ySal'];   $oW35y=$resVehpn['oWDr_47ySal'];
		$oWt3y=$resVehpn['oWtDr_3ySal']; $oWt35y=$resVehpn['oWtDr_47ySal'];
	  } 
	  else
	  { $FwLimit=0; $nWy=$resElig['FourWheeler']; 
	    $nW2y=0; $nW35y=0; $nWt2y=0; $nWt35y=0; $oW2y=0; $oW35y=0; $oWt2y=0; $oWt35y=0;
		$FwLimitn=0;
		$nW3y=0; $nW47y=0; $nWt3y=0; $nWt47y=0; $oW3y=0; $oW47y=0; $oWt3y=0; $oWt47y=0;
	  }
	  
echo '<input type="hidden" id="FwLimit" value="'.$FwLimit.'"/><input type="hidden" id="Wy" value="'.$nWy.'"/>';
echo '<input type="hidden" id="nW2" value="'.$nW2y.'"/><input type="hidden" id="nW35" value="'.$nW35y.'"/>';
echo '<input type="hidden" id="nWt2" value="'.$nWt2y.'"/><input type="hidden" id="nWt35" value="'.$nWt35y.'"/>';
echo '<input type="hidden" id="oW2" value="'.$oW2y.'"/><input type="hidden" id="oW35" value="'.$oW35y.'"/>';
echo '<input type="hidden" id="oWt2" value="'.$oWt2y.'"/><input type="hidden" id="oWt35" value="'.$oWt35y.'"/>';
echo '<input type="hidden" id="DptId" value="'.$DptId.'"/>';
echo '<input type="hidden" id="CDate" value="'.date("d-m-Y").'"/>';

echo '<input type="hidden" id="FwLimitn" value="'.$FwLimitn.'"/>';
echo '<input type="hidden" id="nW3" value="'.$nW3y.'"/><input type="hidden" id="nW47" value="'.$nW47y.'"/>';
echo '<input type="hidden" id="nWt3" value="'.$nWt3y.'"/><input type="hidden" id="nWt47" value="'.$nWt47y.'"/>';
echo '<input type="hidden" id="oW3" value="'.$oW3y.'"/><input type="hidden" id="oW47" value="'.$oW47y.'"/>';
echo '<input type="hidden" id="oWt3" value="'.$oWt3y.'"/><input type="hidden" id="oWt47" value="'.$oWt47y.'"/>';
?>

<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
<script type="text/javascript">
function FunPlan(v)
{
 if(v==1)
 {
  if(document.getElementById("OldPlan").checked==true)
  {
   document.getElementById("Plan").value='o';  document.getElementById("NewPlan").checked=false; 
   document.getElementById("CarPolicy").disabled=false; document.getElementById("LessKm").disabled=false; 
  }
  else{ document.getElementById("CarPolicy").disabled=true; document.getElementById("LessKm").disabled=true; 
        document.getElementById("Plan").value=''; }
 }
 else if(v==2)
 {
  if(document.getElementById("NewPlan").checked==true)
  {
   document.getElementById("Plan").value='n'; document.getElementById("OldPlan").checked=false; 
   document.getElementById("CarPolicy").disabled=false; document.getElementById("LessKm").disabled=false; 
  }
  else{ document.getElementById("CarPolicy").disabled=true; document.getElementById("LessKm").disabled=true; 
        document.getElementById("Plan").value='';}
 }
}
</script> 
  <tr>
   <td class="td3" colspan="2">
   <b style="color:#FF0000;">Old Plan:</b>&nbsp;<input type="checkbox" id="OldPlan" <?php if($ResEligEmp['Plan']=='o'){echo 'checked';} ?> onClick="FunPlan(1)" />
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <b style="color:#FF0000;">New Plan:</b>&nbsp;<input type="checkbox" id="NewPlan" <?php if($ResEligEmp['Plan']=='n'){echo 'checked';} ?> onClick="FunPlan(2)" />
   <input type="hidden" id="Plan" name="Plan" value="<?php echo $ResEligEmp['Plan']; ?>" />
   </td>
  </tr>
 
 
  <tr>
   <td class="td3" style="width:300px;"><b>Own Your Car Policy Eligibility:</b>&nbsp;<input type="checkbox" id="CarPolicy" <?php if($ResEligEmp['FourWElig']=='Y'){echo 'checked';} ?> onClick="FunCPolicy()" disabled/><input type="hidden" id="Car2Policy" name="Car2Policy" value="<?php echo $ResEligEmp['FourWElig']; ?>" /></td>
   <td class="td3" style="width:240px;"><b>Less Km run:</b>&nbsp;<input type="checkbox" id="LessKm" <?php if($ResEligEmp['LessKm']=='Y'){echo 'checked';} ?> onClick="FunLessKm()" disabled/><input type="hidden" id="Less2Km" name="Less2Km" value="<?php echo $ResEligEmp['LessKm']; ?>" /></td>
  </tr>
 </table>
 </td>
</tr>
<tr>
 <td class="td3"></td>
 <td>
 <table border="1" cellspacing="1" style="background-color:#D6F46C;">
   <tr>
   <td class="td3" style="width:300px;">&nbsp;Policy Entry Date :&nbsp;<input id="DateOfEPolicy" name="DateOfEPolicy" value="<?php if($ResEligEmp['FourWElig']=='Y'){ if($ResEligEmp['DateOfEntryPolicy']!='0000-00-00' AND $ResEligEmp['DateOfEntryPolicy']!='1970-01-01'){ echo date("d-m-Y",strtotime($ResEligEmp['DateOfEntryPolicy'])); }else { echo date("d-m-Y"); } } ?>" <?php if($ResEligEmp['FourWElig']=='N'){echo 'disabled';} ?> style="width:100px; text-align:center;" class="td3" readonly /><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); cal.manageFields("DateOfEPolicy", "DateOfEPolicy", "%d-%m-%Y");</script></td>
   <td class="td3" style="width:240px;">&nbsp;Cost Of Vehicle:&nbsp;<select id="VehicleCost" name="VehicleCost" style="width:80px;" class="td3" <?php if($ResEligEmp['FourWElig']=='N'){echo 'disabled';} ?>><option value="<?php if($ResEligEmp['CostOfVehicle']!=''){echo $ResEligEmp['CostOfVehicle'];}else{echo 0;} ?>"><?php if($ResEligEmp['CostOfVehicle']!=''){echo $ResEligEmp['CostOfVehicle'];}else{echo 'select';} ?></option><option value="0.65 Lac">0.65 Lac</option><option value="6 Lacs">6 Lacs</option><option value="7.5 Lacs">7.5 Lacs</option><option value="9 Lacs">9 Lacs</option><option value="10 Lacs">10 Lacs</option><option value="11 Lacs">11 Lacs</option><option value="12 Lacs">12 Lacs</option><option value="14 Lacs">14 Lacs</option></select></td>
  </tr>
  <tr>
   <td class="td3">&nbsp;Advance Of Company:&nbsp;<input type="checkbox" id="AdvanceCom" <?php if($ResEligEmp['AdvanceCom']=='Y'){echo 'checked';} ?> onClick="FunAdvanceCom(<?php echo $DptId; ?>)" <?php if($ResEligEmp['FourWElig']=='N'){echo 'disabled';} ?> /><input type="hidden" id="Advance2Com" name="Advance2Com" value="<?php echo $ResEligEmp['AdvanceCom']; ?>" /></td>
   <td class="td3">&nbsp;With Driver:&nbsp;<input type="checkbox" id="WithDriver" <?php if($ResEligEmp['WithDriver']=='Y'){echo 'checked';} ?> onClick="FunWDriver(<?php echo $DptId; ?>)" <?php if($ResEligEmp['FourWElig']=='N'){echo 'disabled';} ?> /><input type="hidden" id="With2Driver" name="With2Driver" value="<?php echo $ResEligEmp['WithDriver']; ?>" /></td>
  </tr>
 </table>
 </td>
</tr>
<?php /******* New * New * New * New * New * New * New ********/ ?>

<?php /************* Open **********************/ ?>
<?php /************* Open **********************/ ?>
<tr>
 <td class="td3"></td>
 <td>
  <table border="0">
  <tr>
   <td class="td3" style="width:90px;">TwoWheeler:</td>
   <td class="td3" style="width:75px;"><input Name="TwoWheelerKM" id="TwoWheelerKM" class="td3" style="width:30px;text-align:center;" value="<?php if($TwoW!=''){echo $TwoW;}?>"/>&nbsp;Per KM</td><td class="td3" style="width:40px;"><?php if($ResEmp['DepartmentId']==2 AND $ResEmp['GradeId']>72){echo 'Min';}else{echo 'Max';} ?> :</td>
   <td class="td3" style="width:150px;"><input Name="TwoWRestrict_PD" id="TwoWRestrict_PD" class="td3" style="width:50px;" value="<?php if($TwoMxPD!=''){echo $TwoMxPD;}else{echo 'NA';} ?>"/>&nbsp;PD&nbsp;<input Name="TwoWRestrict" id="TwoWRestrict" class="td3" style="width:50px;" value="<?php if($TwoMxPM!=''){echo $TwoMxPM;}else{echo 'NA';} ?>" />&nbsp;PM</td>
   <td class="td3" style="width:80px;">OutSite HQ :</td><td class="td3" style="width:62px;"><input class="td3" style="width:100px;" Name="TwoWRestrict_OutSite" id="TwoWRestrict_OutSite" value="<?php if($TwoMxPM_Out!=''){echo $TwoMxPM_Out.'&nbsp;KM PM';}else{echo 'NA';} ?>"/></td>
  </tr>
  <tr>
   <td class="td3" style="width:90px;">FourWheeler:</td>
   <td class="td3" style="width:75px;"><input Name="FourWheelerKM" id="FourWheelerKM" class="td3" style="width:30px; text-align:center;" value="<?php if($FourW!=''){echo $FourW;}else{echo 'NA';}?>"/>&nbsp;Per KM</td>
   <td class="td3" style="width:40px;"><?php if($ResEmp['DepartmentId']==2 AND $ResEmp['GradeId']>72){echo 'Min';}else{echo 'Max';} ?> :</td>
   <td class="td3" style="width:150px;"><input Name="FourWRestrict" id="FourWRestrict" class="td3" style="width:50px;" value="<?php if($FourMxPM!=''){echo $FourMxPM;}else{echo 'NA';}?>"/>&nbsp;PM&nbsp;<input Name="FourWRestrict_PD" id="FourWRestrict_PD" class="td3" style="width:50px;" value="<?php if($FourMxPM>0){echo $FourMxPM*12;}elseif($FourMxPM!=''){echo $FourMxPM;}else{echo 'NA';}?>"/>&nbsp;PA</td>
   <td class="td3" style="width:80px;">OutSite HQ :</td><td class="td3" style="width:62px;"><input class="td3" style="width:100px;" Name="FourWRestrict_OutSite" id="FourWRestrict_OutSite" value="<?php if($FourMxPM_Out!=''){echo $FourMxPM_Out.'&nbsp;KM PM';}else{echo 'NA';} ?>"/></td>
 </tr>
 </table>
 </td>
</tr>
<?php /************** Close ********************/  ?>
<?php /************** Close ********************/  ?>

<?php if($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='Y'){$Mode='Flight'.$Cond.'/Train'; $Class=$resEnt['TravelClass_Flight'].'/'.$resEnt['TravelClass_Train'];} elseif($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='N') {$Mode='Flight'.$Cond; $Class=$resEnt['TravelClass_Flight'];} elseif($resEnt['ModeTravel_Flight']=='N' AND $resEnt['ModeTravel_Train']=='Y') {$Mode='Train'; $Class=$resEnt['TravelClass_Train'];}?>
<tr>
 <td class="td3"></td>
 <td>
  <table border="0"><tr>
   <td class="td3" style="width:213px;">Mode of Travels OutSide H.Q. :</td>
   <td class="td3" style="width:50px;"><select Name="ModeTraOutSide_HQ" id="ModeTraOutSide_HQ" class="td3" style="width:50px;" onChange="ModeTravel(this.value)"><option value="<?php if($ResEligEmp['Mode_Travel_Outside_Hq']!='' AND $ResEligEmp['Mode_Travel_Outside_Hq']!='NA'){echo 'Y';}else{ echo 'N';} ?>">&nbsp;<?php if($ResEligEmp['Mode_Travel_Outside_Hq']!='' AND $ResEligEmp['Mode_Travel_Outside_Hq']!='NA'){echo 'Yes';}else{ echo 'No';} ?></option>  <option value="<?php if($ResEligEmp['Mode_Travel_Outside_Hq']!='' AND $ResEligEmp['Mode_Travel_Outside_Hq']!='NA'){echo 'N';}else{ echo 'Y';} ?>">&nbsp;<?php if($ResEligEmp['Mode_Travel_Outside_Hq']!='' AND $ResEligEmp['Mode_Travel_Outside_Hq']!='NA'){echo 'No';}else{ echo 'Yes';} ?></option></select></td>
   <td class="td3" style="width:96px;"><select Name="TraMode" id="TraMode" class="td3" style="width:96px;" onChange="Selectmode(this.value)"/><option value="<?php if(($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='Y') OR ($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='N') OR ($resEnt['ModeTravel_Flight']=='N' AND $resEnt['ModeTravel_Train']=='Y')) echo $Mode; ?>" selected>&nbsp;<?php if(($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='Y') OR ($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='N') OR ($resEnt['ModeTravel_Flight']=='N' AND $resEnt['ModeTravel_Train']=='Y')) echo $Mode; ?></option><option value="Flight">&nbsp;Flight</option><option value="Train">&nbsp;Train</option><option value="Flight/Train">&nbsp;Flight/Train</option></select></td>
   <td class="td3" style="width:80px;">Class :</td>
   <td class="td3" style="width:100px;"><span id="ModeClassSpan"><select Name="TraClass" id="TraClass" class="td3" style="width:100px;"><option value="<?php if(($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='Y') OR ($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='N') OR ($resEnt['ModeTravel_Flight']=='N' AND $resEnt['ModeTravel_Train']=='Y')) echo $Class; ?>" selected><?php if(($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='Y') OR ($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='N') OR ($resEnt['ModeTravel_Flight']=='N' AND $resEnt['ModeTravel_Train']=='Y')) echo $Class; ?></option><option value="General">General</option><option value="Sleeper">Sleeper</option><option value="Economy/AC">Economy/AC</option><option value="AC">AC</option><option value="AC-I">AC-I</option><option value="AC-II">AC-II</option><option value="AC-III" class>AC-III</option><option value="Economy">Economy</option></select></span></td>
  </tr>
 </table>
 </td>
</tr>
<?php if($ResEmp['DepartmentId']==6 OR $ResEmp['DepartmentId']==4 OR $ResEmp['DepartmentId']==3 OR $ResEmp['DepartmentId']==25){ $MR=$resDaily['MRSP'];} else{ $MR=$resDaily['MRNS']; } ?>
<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
 <tr>
  <td class="td3" style="width:395px;">Mobile expenses Reimbursement :</td>
  <td class="td3" style="width:52px;"><select Name="MoExpeReim" id="MoExpeReim" class="td3" style="width:50px;" onChange="SelectMoExpeReim(this.value)"><option value="<?php if($ResEligEmp['Lodging_CategoryA']>0){if($ResEligEmp['Mobile_Exp_Rem']=='Y') echo 'Y'; else echo 'N';} else { echo 'Y'; } ?>">&nbsp;<?php if($ResEligEmp['Lodging_CategoryA']>0){if($ResEligEmp['Mobile_Exp_Rem']=='Y') echo 'Yes'; else echo 'No';} else { echo 'Yes'; } ?></option><option value="<?php if($ResEligEmp['Lodging_CategoryA']>0){if($ResEligEmp['Mobile_Exp_Rem']=='Y') echo 'N'; else echo 'Y';} else { echo 'N'; } ?>">&nbsp;<?php if($ResEligEmp['Lodging_CategoryA']>0){if($ResEligEmp['Mobile_Exp_Rem']=='Y') echo 'No'; else echo 'Yes';} else { echo 'No'; } ?></option></select></td>
  <td class="td3" style="width:100px;">
  <input type="hidden" id="ME1" class="All_100" value="<?php echo $resDaily['MRSP']; ?>"/>
  <input type="hidden" id="ME2" class="All_100" value="<?php echo $resDaily['MRNS']; ?>"/>
  <input type="hidden" id="ME3" class="All_100" value="<?php echo $resDaily['MRNS_RD']; ?>"/>
  <input type="hidden" id="prd1" value="<?php echo $resDaily['prd_1']; ?>"/>
  <input type="hidden" id="prd2" value="<?php echo $resDaily['prd_2']; ?>"/>
  <input type="hidden" id="prd3" value="<?php echo $resDaily['prd_3']; ?>"/>
  
  <input Name="MobileExpRs" id="MobileExpRs" class="td3" style="width:50px;" value="<?php if($ResEligEmp['Lodging_CategoryA']>0){echo $ResEligEmp['Mobile_Exp_Rem_Rs'];} else { if($MR!='') echo $MR; }?>" maxlength="10"/>
  <select Name="Prdd" id="Prdd" class="td3" style="width:40px;"><?php if($ResEligEmp['Prd']!=''){ ?><option value="<?php echo $ResEligEmp['Prd']; ?>"><?php echo $ResEligEmp['Prd']; ?></option><?php }else{?><option value=""></option><?php } ?><option value="Month">Mnt</option><option value="Qtr">Qtr</option><option value="Annual">Annual</option></select>


  
  </td>														
 </tr>
 </table>
 </td>
</tr>
<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
  <tr>
   <td class="td3" style="width:179px;">Mobile Handset :</td>
   <td class="td3" style="width:202px;" align="right">Company Handset:&nbsp;<select Name="MoComHandSet" id="MoComHandSet" class="td3" style="width:50px;" onChange="SelectComMoHandSet(this.value)"><option value="<?php if($ResEligEmp['Mobile_Company_Hand']=='Y'){echo 'Y';} else{echo 'N';} ?>">&nbsp;<?php if($ResEligEmp['Mobile_Company_Hand']=='Y'){echo 'Yes';} else{echo 'No';} ?></option><option value="<?php if($ResEligEmp['Mobile_Company_Hand']=='Y'){echo 'N';} else{echo 'Y';} ?>">&nbsp;<?php if($ResEligEmp['Mobile_Company_Hand']=='Y'){echo 'No';} else{echo 'Yes';} ?></option></select></td>
   <td class="td3" style="width:6px;"></td>
   <td class="td3" style="width:52px;"><select Name="MoHandSet" id="MoHandSet" class="td3" style="width:50px;" onChange="SelectMoHandSet(this.value)"><option value="<?php if($ResEligEmp['Lodging_CategoryA']>0){if(($ResEligEmp['Mobile_Hand_Elig_Rs']>0 OR $ResEligEmp['Mobile_Hand_Elig_Rs']!='') AND $ResEligEmp['Mobile_Hand_Elig']=='Y') echo 'Y'; else echo 'N';} else { echo 'Y'; } ?>">&nbsp;<?php if($ResEligEmp['Lodging_CategoryA']>0){if(($ResEligEmp['Mobile_Hand_Elig_Rs']>0 OR $ResEligEmp['Mobile_Hand_Elig_Rs']!='') AND $ResEligEmp['Mobile_Hand_Elig']=='Y') echo 'Yes'; else echo 'No';} else { echo 'Yes'; } ?></option><option value="<?php if($ResEligEmp['Lodging_CategoryA']>0){if(($ResEligEmp['Mobile_Hand_Elig_Rs']>0 OR $ResEligEmp['Mobile_Hand_Elig_Rs']!='') AND $ResEligEmp['Mobile_Hand_Elig']=='Y') echo 'N'; else echo 'Y';} else { echo 'N'; } ?>">&nbsp;<?php if($ResEligEmp['Lodging_CategoryA']>0){if(($ResEligEmp['Mobile_Hand_Elig_Rs']>0 OR $ResEligEmp['Mobile_Hand_Elig_Rs']!='') AND $ResEligEmp['Mobile_Hand_Elig']=='Y') echo 'No'; else echo 'Yes';} else { echo 'No';} ?></option></select></td>
   <td class="td3" style="width:100px;"><input Name="MobileHandRs" id="MobileHandRs" class="td3" style="width:50px;" value="<?php if($ResEligEmp['Lodging_CategoryA']>0){echo $ResEligEmp['Mobile_Hand_Elig_Rs'];} else { if($resDaily['MH']!='') echo $resDaily['MH']; }?>" maxlength="10"/><input type="checkbox" name="GPCheck" id="GPCheck" onClick="ClickGPRS()" <?php if($ResEligEmp['Mobile_Hand_Elig_Rs']==$resDaily['MH_GPRS'] AND $ResEligEmp['Mobile_Hand_Elig_Rs']!='' AND $ResEligEmp['Mobile_Hand_Elig_Rs']!='0'){echo 'checked';} ?> /><font size="1">GPRS</font>
  <input type="hidden" name="MH_GPRS" id="MH_GPRS" value="<?php echo $resDaily['MH_GPRS']; ?>" /><input type="hidden" id="MobileHand" class="td3" style="width:100px;" value="<?php echo $resDaily['MH']; ?>" readonly/></td>
  </tr>
 </table>
 </td>
</tr>
<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
  <tr>
   <td class="td3" style="width:395px;">Misc. expenses(like stationery/photocopy/fax/e-mail/etc) :</td>
   <td class="td3" style="width:52px;"><select Name="MiscExp" id="MiscExp" class="td3" style="width:50px;"><option value="<?php if($ResEligEmp['Lodging_CategoryA']>0){ echo $ResEligEmp['Misc_Expenses']; } elseif($ResEmp['DepartmentId']==6 OR $ResEmp['DepartmentId']==4 OR $ResEmp['DepartmentId']==3 OR $ResEmp['DepartmentId']==25 OR $ResEmp['DepartmentId']==27) echo 'Y'; else 'N'; ?>">&nbsp;<?php if($ResEligEmp['Lodging_CategoryA']>0){ if($ResEligEmp['Misc_Expenses']=='Y') echo 'Yes'; else echo 'No'; } elseif($ResEmp['DepartmentId']==6 OR $ResEmp['DepartmentId']==4 OR $ResEmp['DepartmentId']==3 OR $ResEmp['DepartmentId']==25 OR $ResEmp['DepartmentId']==27) echo 'Yes'; else echo 'No'; ?></option><option value="<?php if($ResEligEmp['Lodging_CategoryA']>0){ if($ResEligEmp['Misc_Expenses']=='Y') echo 'N'; else echo 'Y'; } elseif($ResEmp['DepartmentId']==6 OR $ResEmp['DepartmentId']==4 OR $ResEmp['DepartmentId']==3 OR $ResEmp['DepartmentId']==25) echo 'N'; else echo 'Y'; ?>">&nbsp;<?php if($ResEligEmp['Lodging_CategoryA']>0){ if($ResEligEmp['Misc_Expenses']=='Y') echo 'No'; else echo 'Yes'; } elseif($ResEmp['DepartmentId']==6 OR $ResEmp['DepartmentId']==4 OR $ResEmp['DepartmentId']==3 OR $ResEmp['DepartmentId']==25 OR $ResEmp['DepartmentId']==27) echo 'No'; else echo 'Yes'; ?></option></select></td>													
  </tr>
 </table>
 </td>
</tr>
<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
  <tr>
   <td class="td3" style="width:452px;">Health Insurance(Premium Paid by Company) :</td>
   <td class="td3" style="width:100px;"><input Name="HealthInsu" id="HealthInsu" class="td3" style="width:100px;" value="<?php echo $ResEmp['EmpAddBenifit_MediInsu_value']; //if($resDaily['MCSSP']!='' AND ($resD2['DepartmentId']==$ResEmp['DepartmentId'] OR $resP2['DepartmentId']==$ResEmp['DepartmentId'])){echo intval($resDaily['MCSSP']);}else {echo intval($resDaily['MCS']); }?><?php //echo $ResEligEmp['Health_Insurance']; ?>"/></td>
  </tr>
 </table>
 </td>
</tr>

<?php /******* New * New * New * New * New * New * New 2222  ********/ ?>
<?php $sqldb=mysql_query("select DOB from hrm_employee_general where EmployeeID=".$EMPID,$con); 
$resdb=mysql_fetch_assoc($sqldb);
$date1 = $resdb['DOB'];
$date2 = date("Y-m-d");
$diff = abs(strtotime($date2) - strtotime($date1));
$years = floor($diff/(365*60*60*24));
$months = floor(($diff-$years*365*60*60*24)/(30*60*60*24));
$days = floor(($diff-$years*365*60*60*24-$months*30*60*60*24)/(60*60*24)); 
$VNRExpMain=$years.'.'.$months;	
?>
<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
  <tr>
   <td class="td3" style="width:452px;">Executive Health Check-up (Once in 2 yrs) :</td>
   <td class="td3" style="width:100px;"><input class="td3" style="width:100px;" value="<?php if($resDaily['HelthChekUp']!='' AND $VNRExpMain>40){echo $resDaily['HelthChekUp'];}else{echo 'NA'; }?>" readonly/><input type="hidden" Name="HelthChekUp" id="HelthChekUp" value="<?php if($resDaily['HelthChekUp']!='' AND $VNRExpMain>40){echo 'Y';}else{echo 'N'; }?>" /></td>
  </tr>
 </table>
 </td>
</tr>
<?php /******* New * New * New * New * New * New * New 2222  ********/ ?>

<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
  <tr>
   <td class="td3" style="width:452px;">Bonus/Exgretia(yearly) :</td>
   <td class="td3" style="width:100px;"><input Name="BonusElig" id="BonusElig" class="td3" style="width:100px;" value="As per law" readonly/></td>
  </tr>
 </table>
 </td>
</tr>
<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
  <tr>
   <td class="td3" style="width:452px;">Gratuity :</td>
   <td class="td3" style="width:100px;"><input Name="GratuityElig" id="GratuityElig" class="td3" style="width:100px;" value="As per law" readonly/></td>
  </tr>
 </table>
 </td>
</tr>
<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
  <tr>
   <td class="td3" style="width:152px;">Remark :</td>
   <td class="td3" style="width:100px;"><input Name="Rmkk" id="Rmkk" class="td3" style="width:400px;" value=""/></td>
  </tr>
 </table>
 </td>
</tr>
<!--<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
 <tr>
  <td class="td3" style="width:196px;">Deduction :</td>
  <td class="td3" style="width:280px;"></td>
 </tr>
 </table>
 </td>
</tr>
<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
 <tr>
  <td class="td3" style="width:196px;">* Deduction - As Per law :</td>
  <td class="td3" style="width:350px;">Provident Fund/ ESCI/ Tax on Employment/ Income Tax</td>
 </tr>
 </table>
 </td>
</tr>
<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
 <tr>
  <td class="td3" style="width:196px;">* Deduction - Actual :</td>
  <td class="td3" style="width:350px;">Any dues to company(if any)/ Advances</td>
 </tr>
 </table>
 </td>
</tr>
-->
<tr>
 <td align="Right" class="fontButton" colspan="6">
  <table border="0" align="right" class="fontButton">
   <tr>	
   <td class="td3" style="color:#FFFFFF;font-weight:bold;font-size:15px;"><span id="msgElig">&nbsp;</span></td>	 
   <td class="td33" style="color:#fff;"><input class="td22" style="width:100px;font-weight:bold;background-color:#CCFFCC;" id="CHDate" name="CHDate" value="<?php echo date("d-m-Y"); ?>"/><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); cal.manageFields("CHDate", "CHDate", "%d-%m-%Y");</script></td>
   <td class="td3" style="width:90px;" align="right"><input type="button" name="EditEligE" id="EditEligE" style="width:90px;" value="save" onClick="return HRSaveElig(<?php echo $EMPID.', 0, '.$YearId.', '.$CompanyId.', '.$UserId; ?>)" /></td>
    <td class="td3" style="width:90px;" align="right"><input type="button" name="RefreshEligE" id="RefreshEligE" style="width:90px;" value="refresh"  onClick="javascript:window.location='EmpElig.php?ID=<?php echo $EMPID; ?>&Event=Edit'"/></td>
   </tr>
 </table>
 </td>
</tr>
</table>
</td>
<?php /////////////////////////////////// Second Table Data Close //////////////////////////////?>
<?php /////////////////////////////////// Second Table Data Close //////////////////////////////?>
<?php /////////////////////////////////// Second Table Data Close //////////////////////////////?>

<?php include("EmpImg.php"); ?>
 </tr>
</table>
</form> 
</td>
<?php } ?>
<?php //**************************************************************************************?>
</tr>
<?php } ?> 
</table>
				
	  </td>
	</tr>
	
	
	
  </table>
 </td>
</tr>
</table>
</body>
</html>

