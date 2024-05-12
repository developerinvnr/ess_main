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
<head>
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
.tdl{ font-family:Times New Roman;font-size:14px;text-align:left; }
.tdr{ font-family:Times New Roman;font-size:12px;text-align:right; }
.tdc{ font-family:Times New Roman;font-size:12px;text-align:center; }
.tdinput{ font-family:Times New Roman;font-size:14px;text-align:center;width:100%; border:hidden; }
.tdinputl{ font-family:Times New Roman;font-size:14px;text-align:left;width:100%; border:hidden; }
.tdsel{ font-family:Times New Roman;font-size:14px;text-align:left; width:100%;}
.h{ text-align:center;font-family:Times New Roman;color:#FFFFFF;font-size:12px;font-weight:bold; }
.hl{ font-family:Times New Roman;color:#FFFFFF;font-size:14px;font-weight:bold; }
.td2{ text-align:center;font-family:Times New Roman;font-size:12px;width:100px; }
.td22{ text-align:center;font-family:Times New Roman;font-size:14px;width:50px; }
.td3{ font-family:Times New Roman;font-size:12px;width:100px; }
.td33{ font-family:Times New Roman;font-size:12px;width:50px; }
.inner_table{height:150px;overflow-y:auto;width:auto;}
</style>
<script language="javascript">
function HRSaveElig(E,P,Y,C,U)
{ 
    
  var LodgingCatA = document.getElementById("LodgingCatA").value;  
  var LodgingCatB = document.getElementById("LodgingCatB").value; 
  var LodgingCatC = document.getElementById("LodgingCatC").value;  
  var DaOutSide_HQRs = document.getElementById("DaOutSide_HQRs").value; 
  if(DaOutSide_HQRs!=''){var DaOutSide_HQ='Y';}else{var DaOutSide_HQ='N';}
  var DaInSide_HQRs = document.getElementById("DaInSide_HQRs").value;
  if(DaInSide_HQRs!=''){var DaInSide_HQ='Y';}else{var DaInSide_HQ='N';} 
  
  var TwoWheelerKM = document.getElementById("TwoWheelerKM").value;
  var TwoWRestrict_PD = document.getElementById("TwoWRestrict_PD").value; 
  var TwoWRestrict = document.getElementById("TwoWRestrict").value; 
  var TwoWRestrict_OutSite = document.getElementById("TwoWRestrict_OutSite").value; 
  var FourWheelerKM = document.getElementById("FourWheelerKM").value; 
  var FourWRestrict = document.getElementById("FourWRestrict").value;
  var FourWRestrict_OutSite = document.getElementById("FourWRestrict_OutSite").value;
  var VehiclePolicy = document.getElementById("VehiclePolicy").value;
  
  var TraMode = document.getElementById("TraMode").value;
  if(TraMode!=''){var ModeTraOutSide_HQ='Y';}else{var ModeTraOutSide_HQ='N';}
  var TraClass = document.getElementById("TraClass").value;
  
  var MobileExpRs = document.getElementById("MobileExpRs").value; 
  var Prd = document.getElementById("Prdd").value; 
  if(MobileExpRs!=''){var MoExpeReim='Y';}else{var MoExpeReim='N';}
  
  var MobileHandRs = document.getElementById("MobileHandRs").value; 
  if(MobileHandRs!=''){var MoHandSet='Y';}else{var MoHandSet='N';}
  var MoComHandSet='N';
  var GPSSet=document.getElementById("GPSSet").value;
   
  var MiscExp = document.getElementById("MiscExp").value; 
  var HealthInsu = document.getElementById("HealthInsu").value; 
  var HelthChekUp = document.getElementById("HelthChekUp").value; 
  
  var Bonus = document.getElementById("BonusElig").value;   
  var Gratuity = document.getElementById("GratuityElig").value; 
  var Rmk = document.getElementById("Rmkk").value;
  var CHDate = document.getElementById("CHDate").value;
  
  var Car2Policy = ''; var VehicleCost = ''; var With2Driver = ''; 
  var Advance2Com = ''; var DateOfEPolicy = ''; var LessKm ='';
 

  var agree=confirm("Are you sure you want to save Employee Eligibility?"); 
  if(agree) 
  { 
   var url = 'HRNormalizedInc.php'; var pars = 'LodginggCCatA22='+LodgingCatA+'&LodgingCatB='+LodgingCatB+'&LodgingCatC='+LodgingCatC+'&DaOutSide_HQ='+DaOutSide_HQ+'&DaOutSide_HQRs='+DaOutSide_HQRs+'&DaInSide_HQ='+DaInSide_HQ+'&DaInSide_HQRs='+DaInSide_HQRs+'&TwoWheelerKM='+TwoWheelerKM+'&FourWheelerKM='+FourWheelerKM+'&TraMode='+TraMode+'&TraClass='+TraClass+'&MoExpeReim='+MoExpeReim+'&MiscExp='+MiscExp+'&HealthInsu='+HealthInsu+'&Bonus='+Bonus+'&Gratuity='+Gratuity+'&CHDate='+CHDate+'&E='+E+'&P='+P+'&Y='+Y+'&C='+C+'&U='+U+'&ModeTraOutSide_HQ='+ModeTraOutSide_HQ+'&MobileExpRs='+MobileExpRs+'&MobileHandRs='+MobileHandRs+'&MoHandSet='+MoHandSet+'&TwoWRestrict='+TwoWRestrict+'&TwoWRestrict_PD='+TwoWRestrict_PD+'&FourWRestrict='+FourWRestrict+'&MoComHandSet='+MoComHandSet+'&TwoWRestrict_OutSite='+TwoWRestrict_OutSite+'&FourWRestrict_OutSite='+FourWRestrict_OutSite+'&HelthChekUp='+HelthChekUp+'&Car2Policy='+Car2Policy+'&VehicleCost='+VehicleCost+'&With2Driver='+With2Driver+'&Advance2Com='+Advance2Com+'&DateOfEPolicy='+DateOfEPolicy+'&LessKm='+LessKm+'&Prd='+Prd+'&Rmk='+Rmk+'&VehiclePolicy='+VehiclePolicy+'&GPSSet='+GPSSet; 
   var myAjax = new Ajax.Request(  url, { method: 'post', parameters: pars, onComplete: show_HREmpElig});
   return true; 
  }else{ return false; }
}
function show_HREmpElig(originalRequest)
{ document.getElementById("msgElig").innerHTML = originalRequest.responseText; }
</script>
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
   <tr><td valign="top"><?php if($_SESSION['login'] = true){require_once("AWelcome.php"); } ?></td></tr>
   <tr>
   <td valign="top" align="center"  width="100%" id="MainWindow"><br>

<?php //************START*****START*****START******START******START*************?>
<?php //************START*****START*****START******START******START*************?>
<?php $SqlEmp = mysql_query("SELECT EmpCode, Fname, Sname, Lname, ESCI, EmpAddBenifit_MediInsu_value, gr.GradeId, GradeValue, DepartmentId FROM hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_ctc c ON e.EmployeeID=c.EmployeeID INNER JOIN hrm_grade gr ON g.GradeId=gr.GradeId WHERE c.Status='A' AND e.EmployeeID=".$EMPID, $con);  $ResEmp=mysql_fetch_assoc($SqlEmp);
$Ename = $ResEmp['Fname'].'&nbsp;'.$ResEmp['Sname'].'&nbsp;'.$ResEmp['Lname']; $LEC=strlen($ResEmp['EmpCode']); 
 if($LEC==1){$EC='000'.$ResEmp['EmpCode'];} if($LEC==2){$EC='00'.$ResEmp['EmpCode'];} if($LEC==3){$EC='0'.$ResEmp['EmpCode'];} if($LEC>=4){$EC=$ResEmp['EmpCode'];} ?>
 
<table border="0" style="margin-top:0px;width:100%;">
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
<?php if($_SESSION['login'] = true){ ?>	
 <tr>
  <td style="width:100px;" align="center" valign="top">
   <?php if($_REQUEST['Event']=='Edit'){ include("EmpMasterMenu.php"); } ?>
  </td>
  <td style="width:50px;" align="center" valign="top"></td>
  
  
<?php //****************************************************** Open ?>
<?php //****************************************************** Open ?>

<?php if($_REQUEST['Event']=='Edit'){ ?>
<td id="Eelig" style="vertical-align:top;text-align:left;">

<?php $ei=$EMPID; $ci=$CompanyId; $ui=$UserId; $pi=0; 
      $di=$ResEmp['DepartmentId']; $gi=$ResEmp['GradeId']; $Grade=$ResEmp['GradeValue'];  
	  //echo $ei."-".$ci."-".$ui."-".$pi."-".$di."-".$gi."-".$Grade;
	  
 $sEligE = mysql_query("SELECT * FROM hrm_employee_eligibility WHERE Status='A' AND EmployeeID=".$ei, $con);  
 $rEligE=mysql_fetch_assoc($sEligE);  
?>
<?php include("EmpEligMaster.php"); ?>

</td>
<?php } //if($_REQUEST['Event']=='Edit') ?>

<?php //****************************************************** Close ?>
<?php //****************************************************** Close ?>

 </tr>
 
 
 
<?php } //if($_SESSION['login'] = true) ?> 
</table>

<?php //************END*****END*****END******END******END*************?>
<?php //************END*****END*****END******END******END*************?>	
			
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>

