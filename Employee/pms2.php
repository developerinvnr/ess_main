<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');} 
if($_SESSION['login'] = true){require_once('StartEmpMenuSession.php');}
$sqlSY=mysql_query("select OldY,CurrY,NewY from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='KRA'", $con); $resSY=mysql_fetch_array($sqlSY); 
$sqlSYP=mysql_query("select OldY,CurrY,NewY from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='PMS'", $con); $resSYP=mysql_fetch_array($sqlSYP); 
//echo $resSY['OldY'].'-'.$resSY['CurrY'].'-'.$resSY['NewY'].'-'.$resSYP['OldY'].'-'.$resSYP['CurrY'].'-'.$resSYP['NewY'];
/******************************************************************************/
$sqlKy=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$resSY['CurrY'], $con); $resKy=mysql_fetch_assoc($sqlKy);
$sqlPy=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$resSYP['CurrY'], $con); $resPy=mysql_fetch_assoc($sqlPy);
$kf=date("Y",strtotime($resKy['FromDate'])); $kt=date("Y",strtotime($resKy['ToDate'])); $kt2=$kf-1; $KYear=$kt2.'-'.$kf;
$pf=date("Y",strtotime($resPy['FromDate'])); $pt=date("Y",strtotime($resPy['ToDate'])); $pt2=$pf-1; $PYear=$pt2.'-'.$pf; //echo $KYear.'--'.$PYear;

$SD=mysql_query("select DepartmentId,GradeId,DesigId from hrm_employee_general where EmployeeID=".$EmployeeId, $con); $RD=mysql_fetch_assoc($SD);
$sqlPmsId=mysql_query("select EmpPmsId from hrm_employee_pms where AssessmentYear=".$resSYP['CurrY']." AND EmployeeID=".$EmployeeId, $con); 
$resPmsId=mysql_fetch_assoc($sqlPmsId); $RowPmsId=mysql_num_rows($sqlPmsId);
/******************************************************************************/
$sqlPer=mysql_query("select * from hrm_pms_percentage where CompanyId=".$CompanyId, $con); 
while($resPer=mysql_fetch_array($sqlPer))
{if($row['GradeId']>=$resPer['GradeFrom'] AND $row['GradeId']<=$resPer['GradeTo'])
 {$KraWeight=$resPer['PerOfFormAKra_WeighScore']; $FormBWeight=$resPer['PerOfFormBBehavi_WeighScore']; } } 
$sqlInsW=mysql_query("update hrm_employee_pms set FormAKraAllow_PerOfWeightage=".$KraWeight.", FormBBehaviAllow_PerOfWeightage=".$FormBWeight." where EmpPmsId=".$resPmsId['EmpPmsId'], $con);  
 /******************************************************************************/
if($_REQUEST['action']=='submit')
{  
$sql=mysql_query("select EmpFormAScore, EmpFormBScore, FormAKraAllow_PerOfWeightage, FormBBehaviAllow_PerOfWeightage from hrm_employee_pms where EmpPmsId=".$resPmsId['EmpPmsId']." AND EmployeeID=".$EmployeeId, $con); $res=mysql_fetch_assoc($sql);
$Aweight=$res['FormAKraAllow_PerOfWeightage']; $Bweight=$res['FormBBehaviAllow_PerOfWeightage'];
$EmpFinallyFormAScore=($res['EmpFormAScore']*$res['FormAKraAllow_PerOfWeightage'])/100;
$EmpFinallyFormBScore=($res['EmpFormBScore']*$res['FormBBehaviAllow_PerOfWeightage'])/100;
$Emp_TotalFinalScore=$EmpFinallyFormAScore+$EmpFinallyFormBScore;
$sqlM = mysql_query("SELECT INCENTIVE_Value,Tot_GrossMonth FROM hrm_employee_ctc where EmployeeID=".$EmployeeId." AND Status='A'", $con); $resM = mysql_fetch_assoc($sqlM);
$sqlRat=mysql_query("select ScoreFrom,ScoreTo,Rating from hrm_pms_rating where RatingStatus='A' AND YearId=".$resSYP['CurrY']." AND CompanyId=".$CompanyId, $con); 
while($resRat=mysql_fetch_array($sqlRat))
{ //echo 'a='.$Emp_TotalFinalScore.'  '.'b='.$resRat['ScoreFrom'].'  '.'c='.$resRat['ScoreTo'].'<br>';
  if($Emp_TotalFinalScore>=$resRat['ScoreFrom'] AND $Emp_TotalFinalScore<=$resRat['ScoreTo']) {$Emp_TotalFinalRating=$resRat['Rating'];}
} 
  $sqlUp=mysql_query("update hrm_employee_pms set EmpCurrGrossPM=".$resM['Tot_GrossMonth'].", EmpCurrIncentivePM=".$resM['INCENTIVE_Value'].", Emp_PmsStatus=2, Emp_SubmitedDate='".date("Y-m-d")."', EmpFinallyFormA_Score=".$EmpFinallyFormAScore.", EmpFinallyFormB_Score=".$EmpFinallyFormBScore.", Emp_TotalFinalScore=".$Emp_TotalFinalScore.", Emp_TotalFinalRating=".$Emp_TotalFinalRating.", Dummy_EmpRating=".$Emp_TotalFinalRating.", HR_CurrDesigId=".$RD['DesigId'].", HR_CurrGradeId=".$RD['GradeId'].", HR_Curr_DepartmentId=".$RD['DepartmentId']." where EmpPmsId=".$resPmsId['EmpPmsId'], $con);
  //$msg="You have successfully submitted appraisal form!";

}
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
<style>.font {color:#000; font-family:Georgia; font-size:15px; font-weight:bold;}  .font {color:#000; font-family:Times New Roman; font-size:12px;}
.Input{font-family:"Times New Roman", Times, serif; font-size:14px; height:22px;border-style:hidden; border-bottom-color:#FFFFFF; border-left-color:#FFFFFF; border-right-color:#FFFFFF; border-top-color:#FFFFFF; border:0;}.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;} .font1 { font-family:Georgia; font-size:11px; height:14px; } .font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }</style>
<style>.head{font-family:Times New Roman;font-size:14px;font-weight:bold;}.data{font-family:Times New Roman;font-size:13px;}</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function FinalSubmit() { var agree=confirm("Are you sure you want to submit appraisal form.?");
if (agree) { var x = "pms.php?action=submit&log=@4323yy6twecdsayaEay456ad";  window.location=x;}}	

function OpenWindow() {var CI=document.getElementById("ComId").value; var YI=document.getElementById("YId").value; 
window.open("AppraisalSchedule.php?C="+CI+"&Y="+YI,"Schedule","menubar='no',resizable=1,width=850,height=350");}

function KRAOpenWindow(){var CI=document.getElementById("ComId").value; var YI=document.getElementById("KraYId").value;
window.open("KRASchedule.php?C="+CI+"&Y="+YI,"Schedule","menubar='no',resizable=1,width=850,height=350");}

function OpenHelpfile(value){window.open("HelpFile.php?a=open&v="+value,"HelpFile","width=800,height=650"); }
function OpenFaqfile(value){window.open("HelpFile.php?a=FaqOpen&v="+value,"HelpFile","width=800,height=650"); }
function OpenKRAHelpfile(value){window.open("KRAHelpFile.php?a=open&v="+value,"HelpFile","width=800,height=650"); }
function OpenKRAFaqfile(value){window.open("KRAHelpFile.php?a=FaqOpen&v="+value,"HelpFile","width=800,height=650"); }
function printpage(PmsId,EmpId){window.open("EmpAppFormPrint.php?PmsId="+PmsId+"&EmpId="+EmpId,"AppForm","menubar=yes,scrollbars=yes,resizable=1,width=1050,height=600");}
function printpageKRA(CId,YId,EmpId){window.open("EmpKraFormPrint.php?YId="+YId+"&EmpId="+EmpId+"&CId="+CId,"KRAForm","menubar=yes,scrollbars=yes,resizable=1,width=1170,height=500");}

<!--
function doBlink() {
	var blink = document.all.tags("BLINK")
	for (var i=0; i<blink.length; i++)
		blink[i].style.visibility = blink[i].style.visibility == "" ? "hidden" : "" 
}
function startBlink() {
	if (document.all)
		setInterval("doBlink()",1000)
}
window.onload = startBlink;
// -->
</SCRIPT>
</head>
<body class="body">   
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /><input type="hidden" name="YId" id="YId" value="<?php echo $YearId; ?>" /><input type="hidden" name="KraYId" id="KraYId" value="<?php echo $resSY['CurrY']; ?>" /> <input type="hidden" name="PmsYId" id="PmsYId" value="<?php echo $resSYP['CurrY']; ?>" />
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table></td></tr>
<tr>
 <td><table width="100%" style="margin-top:0px;">
     <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
	 <tr><td valign="top">
	     <table border="0" style="width:100%; height:380px; float:none;" cellpadding="0">
		 <tr>
		 <td valign="top">   
<?php //*************************************************************************************************************************************************** ?>	   
		 <table border="0" id="Activity">
		 <tr>
		  <td id="Anni" valign="top" style="width:5px;"></td>
		  <td colspan="2" width="1200" valign="top">
		   <table border="0">
<?php //*************************************************************** Start ******************************************************************************** ?>					
<tr>
 <td colspan="5" width="1200" style="background-image:url(images/pmsback.png); ">
<?php $sqlKey=mysql_query("select * from hrm_pms_key where Person='emp' AND CompanyId=".$CompanyId, $con); $resKey=mysql_fetch_assoc($sqlKey); 
      $sqlSch=mysql_query("select * from hrm_pms_appdate where AssessmentYear=".$resSYP['CurrY']." AND CompanyId=".$CompanyId, $con); $resSch=mysql_fetch_assoc($sqlSch);
      $CuDate=date("Y-m-d"); ?> 	 
<table>
  <tr>
  <td width="1200">
  <table>
	<tr> 
<?php if($_SESSION['EmpType']=='E') { ?> 			
	<td align="center"><a href="Index.php?log=<?php echo $_SESSION['logCheckEmp']; ?>"><img id="Img_emp1" style="display:none;" src="images/emp1.png" border="0"/></a>
    <img id="Img_emp" style="display:block;" src="images/emp.png" border="0"/></td>  
<?php } $sqlApp=mysql_query("select Appraiser_EmployeeID from hrm_employee_pms where AssessmentYear=".$resSYP['CurrY']." AND Appraiser_EmployeeID=".$EmployeeId, $con); $rowApp=mysql_num_rows($sqlApp); 
if($rowApp>0) { ?> 			   
	<td align="center"><a href="ManagerPms.php"><img id="Img_manager1" style="display:block;" src="images/manager1.png" border="0"/></a>
    <img id="Img_manager" style="display:none;" src="images/manager.png" border="0"/></td>
<?php } $sqlRev=mysql_query("select Reviewer_EmployeeID from hrm_employee_pms where AssessmentYear=".$resSYP['CurrY']." AND Reviewer_EmployeeID=".$EmployeeId, $con); $rowRev=mysql_num_rows($sqlRev); 
if($rowRev>0) { ?> 			   
    <td align="center"><a href="HodPms.php"><img id="Img_hod1" style="display:block;" src="images/hod1.png" border="0"/></a>
    <img id="Img_hod" style="display:none;" src="images/hod.png" border="0"/></td>
<?php } $sqlHod=mysql_query("select HOD_EmployeeID from hrm_employee_pms where AssessmentYear=".$resSYP['CurrY']." AND HOD_EmployeeID=".$EmployeeId, $con); $rowHod=mysql_num_rows($sqlHod); 
if($rowHod>0) { ?>	   
    <td align="center"><a href="RevHodPms.php"><img id="Img_hod1" style="display:block;" src="images/RevHod1.png" border="0"/></a>
	<img id="Img_hod" style="display:none;" src="images/RevHod.png" border="0"/></td>
<?php } ?>		   
	<td width="10">&nbsp;</td>
	<td>
<?php if($resKey['EmpMsg']=='Y') { ?>		 
<?php if($_SESSION['EmpType']=='E') { ?>         
<?php $sqlY=mysql_query("select Emp_AchivementSave,Emp_KRASave,Emp_SkillSave,Emp_FeedBackSave,Emp_PmsStatus,Appraiser_PmsStatus,Reviewer_PmsStatus,HodSubmit_ScoreStatus, Appraiser_NoOfResend, ExtraAllowPMS from hrm_employee_pms where EmpPmsId=".$resPmsId['EmpPmsId'], $con); $resY=mysql_fetch_assoc($sqlY); if($resY['Emp_AchivementSave']=='Y' AND $resY['Emp_KRASave']=='Y' AND $resY['Emp_SkillSave']=='Y' AND $resY['Emp_FeedBackSave']=='Y' AND $resY['Emp_PmsStatus']==1 AND ($resY['Appraiser_PmsStatus']==0 OR $resY['Appraiser_PmsStatus']==3)) {?>
<font color="#F1EE85" style="font-family:Times New Roman;" size="3"><b><blink>Please click on final submit button for complete your appraisal form.!</blink></font>
<?php } if(($resY['Emp_AchivementSave']=='Y' OR $resY['Emp_KRASave']=='Y' OR $resY['Emp_SkillSave']=='Y' OR $resY['Emp_FeedBackSave']=='Y') AND $resY['Emp_PmsStatus']==1 AND $resY['Appraiser_PmsStatus']==3) { ?>
<font color="#FFFFFF" style="font-family:Times New Roman;" size="3"><b></font>
<?php } if($resY['Emp_PmsStatus']==2){ ?>
<font color="#F1EE85" style="font-family:Times New Roman;" size="3"><b><blink>You have successfully submitted appraisal form!</blink></font>
<?php } if(($resY['Emp_AchivementSave']=='N' OR $resY['Emp_KRASave']=='N' OR $resY['Emp_SkillSave']=='N' OR $resY['Emp_FeedBackSave']=='N') AND ($resY['Emp_PmsStatus']==0 OR $resY['Emp_PmsStatus']==1)) {  ?>
<font color="#F1EE85" style="font-family:Times New Roman;" size="3"><b><blink>Please fill appraisal form before last date of self appraisal!</blink></font>
<?php } } }?>	
<?php if($resKey['KRAForm']=='Y') { if($CuDate>=$resSch['EmpFromDate'] AND $CuDate<=$resSch['EmpToDate'] AND $resSch['EmpDateStatus']=='A') { ?>
<?php $sql3=mysql_query("select * from hrm_pms_kra where YearId=".$resSY['CurrY']." AND EmployeeID=".$EmployeeId." AND (KRAStatus='A' OR KRAStatus='R') AND (UseKRA='E' OR UseKRA='A' OR UseKRA='R' OR UseKRA='H')", $con); $row3=mysql_num_rows($sql3); 
if($row3==0){ $stE='<font color="#F1EE85" style="font-family:Times New Roman;" size="3"><b><blink>Please fill KRA form before last date!</blink></b></font>'; } 
if($row3>0){ $res3=mysql_fetch_assoc($sql3); 
if($res3['KRAStatus']='R' AND $res3['UseKRA']=='E') {$stE='<font color="#F1EE85" style="font-family:Times New Roman;" size="3"><b><blink>Please click on final submit button for complete your KRA form.!</blink></b></font>';} 
if($res3['KRAStatus']='R' AND $res3['UseKRA']=='A'){$stE='<font color="#F1EE85" style="font-family:Times New Roman;" size="3"><b><blink>You have successfully submited KRA form!.!</blink></b></font>';} } if($RD['DepartmentId']!=6 AND $RD['DepartmentId']!=4 AND $RD['DepartmentId']!=25) {echo $stE;} ?>
<?php } }?> 	 
		</td>
		<td><font color="#014E05" style='font-family:Times New Roman;' size="3"><b><?php echo $msg; ?></b></font></td>
	 </table>
	
	</td>
  </tr>
 <?php $sqlDoj=mysql_query("select DateJoining from hrm_employee_general where EmployeeID=".$EmployeeId, $con); $resDoj=mysql_fetch_assoc($sqlDoj); ?> 
   <tr>
    <td width="1200" valign="top">
	  <table border="0">
	    <tr> 
		 <?php if($_SESSION['EmpType']=='E') {?>
		 <?php if($resKey['PersonalDetails']=='Y') { ?><td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:120px;" valign="top">
         <a href="pms.php?log=<?php echo $_SESSION['logCheckEmp']; ?>"><img src="images/PersonalDetails.png" border="0"/></a></td><?php } ?>
		 <?php if($resKey['Schedule']=='Y') { ?>
		 <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:120px;" valign="top">
         <?php if($resKey['AppraisalForm']=='Y') { ?><a href="javascript:OpenWindow()"><img src="images/schedule1.png" border="0"/></a><?php } ?>
		 <?php if($resKey['KRAForm']=='Y' AND $RD['DepartmentId']!=4 AND $RD['DepartmentId']!=25) { ?>
		 <a href="javascript:KRAOpenWindow()"><img src="images/schedule1.png" border="0"/></a>
		 <?php } ?>
		 </td>
		 <?php } ?>    <?php //if($resKey['AppraisalForm']=='Y' AND $resDoj['DateJoining']<='2013-03-31') ?>    			   
		 <?php if($resKey['AppraisalForm']=='Y' AND $resDoj['DateJoining']<='2014-03-31') { ?><td align="" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:120px;" valign="top">
<?php if(($CuDate>=$resSch['EmpFromDate'] AND $CuDate<=$resSch['EmpToDate'] AND $resSch['EmpDateStatus']=='A') OR ($CuDate>=$resSch['AppFromDate'] AND $CuDate<=$resSch['AppToDate'] AND $resSch['AppDateStatus']=='A' AND $resY['Emp_PmsStatus']==1 AND $resY['Appraiser_PmsStatus']==3) OR ($CuDate>=$resSch['RevFromDate'] AND $CuDate<=$resSch['RevToDate'] AND $resSch['RevDateStatus']=='A' AND $resY['Emp_PmsStatus']==1 AND $resY['Appraiser_PmsStatus']==3 AND $resY['Reviewer_PmsStatus']==3) OR ($CuDate>=$resSch['HodFromDate'] AND $CuDate<=$resSch['HodToDate'] AND $resSch['HodDateStatus']=='A' AND $resY['Emp_PmsStatus']==1 AND $resY['Appraiser_PmsStatus']==3 AND $resY['Reviewer_PmsStatus']==3 AND $resY['HodSubmit_ScoreStatus']==3) OR $resY['ExtraAllowPMS']==1){ ?>  	
<a href="EmpPmsAppForm.php"><img src="images/Appraisalfrom1.png" border="0"/></a><?php }?></td><?php } ?>
		 <?php if($resKey['Help_Faq']=='Y') { ?>
		 <td align="center" style="font-family:Times New Roman;font-size:14px; font-weight:bold;width:<?php if($resKey['AppraisalForm']=='Y'){echo '120px';}elseif($resKey['KRAForm']=='Y'){echo '50px';} ?>;" valign="top">	
		 <?php if($resKey['AppraisalForm']=='Y') { ?><a href="#" onClick="OpenHelpfile('help')"><img src="images/helpbtn.png" border="0"/></a>
		 <a href="#" onClick="OpenFaqfile('faq')"><img src="images/faqbtn.png" border="0"/></a><?php } ?>
		 <?php if($resKey['KRAForm']=='Y' AND $RD['DepartmentId']!=4 AND $RD['DepartmentId']!=25) { ?>
		 <?php if($RD['DepartmentId']!=6) { ?><a href="#" onClick="OpenKRAHelpfile('krahelp')"><img src="images/helpbtn.png" border="0"/></a><?php } }?>		 	 
		 </td>
		 <?php } ?> 
		 <?php if($resKey['View_Print']=='Y') { ?> 
         <td align="center" style="font-family:Times New Roman;width:120px; font-size:14px; font-weight:bold;" valign="top">
		 <?php if($resKey['AppraisalForm']=='Y') { ?>
		 <?php if($resY['Emp_AchivementSave']=='Y' AND $resY['Emp_KRASave']=='Y' AND $resY['Emp_SkillSave']=='Y' AND $resY['Emp_FeedBackSave']=='Y') { ?>
         <a href="#" onClick="printpage(<?php echo $resPmsId['EmpPmsId'].','.$EmployeeId; ?>)"/><img src="images/ViewPrintForm.png" border="0" /></a><?php } }?> 
		 </td>
		 <?php } ?>
<?php $sql=mysql_query("select * from hrm_pms_kra where YearId=".$resSY['CurrY']." AND CompanyId=".$CompanyId." AND EmployeeID=".$EmployeeId." AND (KRAStatus='R' OR KRAStatus='A') order by KRAId ASC", $con);  $row=mysql_num_rows($sql); if($row>0){$resRe=mysql_fetch_assoc($sql);}
$sqlPm=mysql_query("select ExtraAllowKRA from hrm_employee_pms where EmployeeId=".$EmployeeId." AND AssessmentYear=".$resSYP['CurrY'], $con); $resPm=mysql_fetch_assoc($sqlPm);
?>			 
<?php if($resKey['KRAForm']=='Y') { ?>	  
<?php if(($CuDate>=$resSch['EmpFromDate'] AND $CuDate<=$resSch['EmpToDate'] AND $resSch['EmpDateStatus']=='A') OR ($CuDate>=$resSch['AppFromDate'] AND $CuDate<=$resSch['AppToDate'] AND $resSch['AppDateStatus']=='A' AND $resRe['EmpStatus']=='P' AND $resRe['AppStatus']=='R') OR ($CuDate>=$resSch['RevFromDate'] AND $CuDate<=$resSch['RevToDate'] AND $resSch['RevDateStatus']=='A' AND $resRe['EmpStatus']=='P' AND $resRe['AppStatus']=='R' AND $resRe['RevStatus']=='R') OR ($CuDate>=$resSch['HodFromDate'] AND $CuDate<=$resSch['HodToDate'] AND $resSch['HodDateStatus']=='A' AND $resRe['EmpStatus']=='P' AND $resRe['AppStatus']=='R' AND $resRe['RevStatus']=='R' AND $resRe['HODStatus']=='R') OR $resPm['ExtraAllowKRA']==1){ 
if($RD['DepartmentId']!=4 AND $RD['DepartmentId']!=25){
?> 			 			
         <td style="font-family:Times New Roman;width:180px; font-size:14px; font-weight:bold;" valign="middle">
         <a href="EmpAddNewKRA.php"/><img src="images/KraYear1.png" border="0" /></a></td>
<?php } }?>	 
		 <td style="font-family:Times New Roman;width:120px; font-size:14px; font-weight:bold;" valign="middle">
    <?php if($row>0) { ?><a href="#" onClick="printpageKRA(<?php echo $CompanyId.', '.$resSY['CurrY'].', '.$EmployeeId; ?>)"/><img src="images/printSaveKRA.png" border="0" /></a><?php } ?>
		 </td>		 
        <?php } ?>
		 <td style="width:10px;">&nbsp;</td>
		 <td style="font-family:Times New Roman; font-size:16px; font-weight:bold;width:400px; color:#E10000;" >
		  <?php if($CuDate>=$resSch['EmpFromDate'] AND $CuDate<=$resSch['EmpToDate'] AND $resSch['EmpDateStatus']=='A') { 
		  $LastDate=$resSch['EmpToDate']; $CurrentDate=date("Y-m-d");
		  $diff = abs(strtotime($LastDate) - strtotime($CurrentDate));
          //$years = floor($diff / (365*60*60*24));
          //$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
          $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); ?>
<?php $sqlKK=mysql_query("select * from hrm_pms_kra where YearId=".$resSY['CurrY']." AND CompanyId=".$CompanyId." AND EmployeeID=".$EmployeeId." AND KRAStatus='A' AND UseKRA='H'", $con);  
      $rowKK=mysql_num_rows($sqlKK); ?>		  
		  <?php if($RD['DepartmentId']!=6 AND $RD['DepartmentId']!=4 AND $RD['DepartmentId']!=25) {  if($rowKK==0){ ?>
		  <b><blink><?php echo $days; ?> Days Remaining! Last date : 
		  <font color="#5B0000"><?php echo date("d-F",strtotime($resSch['EmpToDate'])); ?></font></blink></b><?php } } }?>
		  <?php if($resKey['AppraisalForm']=='Y') { ?> 
		  <?php if(($CuDate>=$resSch['EmpFromDate'] AND $CuDate<=$resSch['EmpToDate'] AND $resSch['EmpDateStatus']=='A') OR ($CuDate>=$resSch['AppFromDate'] AND $CuDate<=$resSch['AppToDate'] AND $resSch['AppDateStatus']=='A' AND $resY['Emp_PmsStatus']==1 AND $resY['Appraiser_PmsStatus']==3) OR ($CuDate>=$resSch['RevFromDate'] AND $CuDate<=$resSch['RevToDate'] AND $resSch['RevDateStatus']=='A' AND $resY['Emp_PmsStatus']==1 AND $resY['Appraiser_PmsStatus']==3 AND $resY['Reviewer_PmsStatus']==3) OR ($CuDate>=$resSch['HodFromDate'] AND $CuDate<=$resSch['HodToDate'] AND $resSch['HodDateStatus']=='A' AND $resY['Emp_PmsStatus']==1 AND $resY['Appraiser_PmsStatus']==3 AND $resY['Reviewer_PmsStatus']==3 AND $resY['HodSubmit_ScoreStatus']==3) AND $resY['Appraiser_NoOfResend']!=0) { 
		  $sqlMax = mysql_query("SELECT * FROM hrm_employee_pms_resend where EmpPmsId=".$resPmsId['EmpPmsId']." AND EmployeeID=".$EmployeeId." AND App_Reason!=''", $con); 
		  $RowC=mysql_num_rows($sqlMax); if($RowC>0){  
		  $sqlMax = mysql_query("SELECT MAX(ResendId) as RID FROM hrm_employee_pms_resend where EmpPmsId=".$resPmsId['EmpPmsId']." AND EmployeeID=".$EmployeeId." AND App_Reason!=''", $con); $resMax = mysql_fetch_assoc($sqlMax);  
		  $sqlRe = mysql_query("select App_Reason from hrm_employee_pms_resend where ResendId=".$resMax['RID'], $con); $resRe=mysql_fetch_assoc($sqlRe);
		  //echo $resRe['App_Reason']; 
		  } }  ?>  
		  <?php } ?>         
		 </td> 	   		
		 <?php } ?>   			       
	  </table>
	</td>
   </tr>
   
  </tr>
  <tr>
    <td>
	  <table border="0">
	    <tr>
		 <td style="width:5px;">&nbsp;</td>
<?php /****************************************** Form Start **************************/ ?>
<?php /***************** PersonalDetails **************************/ ?>
<?php $LEC=strlen($EmpCode);  if($LEC==1){$EC='000'.$EmpCode;} if($LEC==2){$EC='00'.$EmpCode;} if($LEC==3){$EC='0'.$EmpCode;} if($LEC>=4){$EC=$EmpCode;}  ?>				 
<?php if($_SESSION['EmpType']=='E') {?>
		 <td id="PersonalDetails" style="width:1000px;display:block;">
		   <table border="0">
 <tr><td colspan="8" style="font-family:Times New Roman; font-size:18px; font-weight:bold;"><font color="#00468C">(<i>Personal Details</i>)</font><br></td></tr>	   
 <tr>
    <td align="center" style="width:140px;" valign="top"><?php echo "<img width=105px height=120px border=1 src=\"show_images.php?id=".$EmployeeId."\">\n";?></td>
	<td>&nbsp;</td>
	<td style="vertical-align:top;" valign="top">
	<table border="1" bgcolor="#FFFFFF" style="vertical-align:top;width:800px;" valign="top">
	 <tr bgcolor="#FFFFFF">
	  <tr>
		<td class="head" style="width:120px;" valign="top">&nbsp;Name</td>
		<td class="data" style="width:250px;text-transform:uppercase;" valign="top">&nbsp;<?php echo $NameE; ?></td>
		<td class="head" style="width:120px;" valign="top">&nbsp;EmpCode</td>
		<td class="data" style="width:250px;" valign="top">&nbsp;<?php echo $EC; ?></td>
	  </tr>
	  <tr>
		<td class="head" style="width:120px;" valign="top">&nbsp;Designation</td>
<?php $sqlDe=mysql_query("select DesigName from hrm_designation where DesigId=".$_SESSION['DesigId'], $con); $resDe=mysql_fetch_assoc($sqlDe); ?>			
		<td class="data" style="width:250px;text-transform:uppercase;" valign="top">&nbsp;<?php echo $resDe['DesigName']; ?></td>
		<td class="head" style="width:120px;" valign="top">&nbsp;Department</td>
<?php $sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_SESSION['DepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD); ?>		
		<td class="data" style="width:250px;text-transform:uppercase;" valign="top">&nbsp;<?php echo $resD['DepartmentCode']; ?></td>
	  </tr>
	  <tr>
		<td class="head" style="width:120px;" valign="top">&nbsp;Grade</td>
<?php $sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$_SESSION['GradeId'], $con); $resG=mysql_fetch_assoc($sqlG); ?>		
		<td class="data" style="width:250px;text-transform:uppercase;" valign="top">&nbsp;<?php echo $resG['GradeValue']; ?></td>
		<td class="head" style="width:120px;" valign="top">&nbsp;Head Quarter</td>
<?php $sqlH=mysql_query("select HqName from hrm_headquater where HqId=".$_SESSION['HqId'], $con); $resH=mysql_fetch_assoc($sqlH); ?>			
		<td class="data" style="width:250px;text-transform:uppercase;" valign="top">&nbsp;<?php echo $resH['HqName']; ?></td>
	  </tr>
	  <tr>
		<td class="head" style="width:120px;" valign="top">&nbsp;Assessment Year</td>		
		<td class="data" style="width:250px;text-transform:uppercase;" valign="top">&nbsp;<?php if($resKey['KRAForm']=='Y'){echo $KYear;}elseif($resKey['AppraisalForm']=='Y'){echo $PYear;} ?></td>
		<td class="head" style="width:80px;" valign="top">&nbsp;DOJ</td>
<?php $sqlJ=mysql_query("select DateJoining from hrm_employee_general where EmployeeID=".$EmployeeId, $con); $resJ=mysql_fetch_assoc($sqlJ);?>			
		<td class="data" style="width:250px;text-transform:uppercase;" valign="top">&nbsp;<?php echo date("d-m-Y",strtotime($resJ['DateJoining'])); ?></td>
	  </tr>
<?php $sqlJ=mysql_query("select DateJoining from hrm_employee_general where EmployeeID=".$EmployeeId, $con); $row=mysql_fetch_assoc($sqlJ);	

      //$timestamp_start = strtotime($row['DateJoining']);  $timestamp_end = strtotime(date("Y-m-d")); $difference = abs($timestamp_end - $timestamp_start); 
      //$days = floor($difference/(60*60*24)); $months = floor($difference/(60*60*24*30)); $years = $difference/(60*60*24*365); /* $Y2=$years*12;  $M2=$months-$Y2; */ 
      //$VNRExpMain=number_format($years, 1);

$date1 = $row['DateJoining'];
$date2 = date("Y-m-d");
$diff = abs(strtotime($date2) - strtotime($date1));
$years = floor($diff/(365*60*60*24));
$months = floor(($diff-$years*365*60*60*24)/(30*60*60*24));
$days = floor(($diff-$years*365*60*60*24-$months*30*60*60*24)/(60*60*24)); 
$VNRExpMain=$years.'.'.$months;	  


      $sql=mysql_query("select HR_DesigDate from hrm_employee_pms where EmployeeID=".$EmployeeId." AND HR_DesigId=".$_SESSION['GradeId'], $con); 
	  $row=mysql_num_rows($sql); $res=mysql_fetch_array($sql); if($row==0){$CurrPerExp=$years; }
	  if($row>0){ $timestamp_start2 = strtotime($res['HR_DesigDate']);  $timestamp_end2 = strtotime(date("Y-m-d")); $difference2 = abs($timestamp_end2 - $timestamp_start2); 
	  $days2 = floor($difference2/(60*60*24)); $months2 = floor($difference2/(60*60*24*30)); $years2 = floor($difference2/(60*60*24*365)); $CurrPerExp=$years2;  }
?> 	  	  
	   <tr>
		<td class="head" style="width:120px;" valign="top">&nbsp;Total VNR-Exp.</td>
		<td class="data" style="width:250px;text-transform:uppercase;" valign="top">&nbsp;<?php echo $VNRExpMain.'   year'; ?></td>
		
<?php $sqlA=mysql_query("select Appraiser_EmployeeID,Reviewer_EmployeeID,HOD_EmployeeID,ReviewerType from hrm_employee_pms where AssessmentYear=".$resSYP['CurrY']." AND EmployeeID=".$EmployeeId, $con); $resA=mysql_fetch_assoc($sqlA); 
if($resA['Appraiser_EmployeeID']>0){
$sqlAp=mysql_query("select hrm_employee.*,Gender,Married,DR from hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$resA['Appraiser_EmployeeID'], $con); $resAp=mysql_fetch_assoc($sqlAp);  
if($resAp['DR']=='Y'){$M='Dr.';}elseif($resAp['Gender']=='M'){$M='Mr.';} elseif($resAp['Gender']=='F' AND $resAp['Married']=='Y'){$M='Mrs.';} elseif($resAp['Gender']=='F' AND $resAp['Married']=='N'){$M='Miss.';}  $NameAp=$M.' '.$resAp['Fname'].' '.$resAp['Sname'].' '.$resAp['Lname']; }   ?>				
		<td class="head" style="width:120px;" valign="top">&nbsp;Appraiser</td>
		<td class="data" style="width:250px;text-transform:uppercase;" valign="top">&nbsp;<?php echo $NameAp; ?></td>
	  </tr>
	  <tr>
		<td class="head" style="width:120px;" valign="top">&nbsp;Reviewer</td>			
<?php if($resA['Reviewer_EmployeeID']>0){ $sqlRe=mysql_query("select hrm_employee.*,Gender,Married,DR from hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$resA['Reviewer_EmployeeID'], $con); $resRe=mysql_fetch_assoc($sqlRe);
	   if($resRe['DR']=='Y'){$M2='Dr.';}elseif($resRe['Gender']=='M'){$M2='Mr.';} elseif($resRe['Gender']=='F' AND $resRe['Married']=='Y'){$M2='Mrs.';} elseif($resRe['Gender']=='F' AND $resRe['Married']=='N'){$M2='Miss.';} $NameRe=$M2.' '.$resRe['Fname'].' '.$resRe['Sname'].' '.$resRe['Lname']; }   ?>				
		<td class="data" style="width:250px;text-transform:uppercase;" valign="top">&nbsp;<?php echo $NameRe; ?></td>
		<td class="head" style="width:120px;" valign="top">&nbsp;HOD</td>		
<?php if($resA['HOD_EmployeeID']>0){ $sqlHo=mysql_query("select hrm_employee.*,Gender,Married,DR from hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$resA['HOD_EmployeeID'], $con); $resHo=mysql_fetch_assoc($sqlHo);
	   if($resHo['DR']=='Y'){$M3='Dr.';}elseif($resHo['Gender']=='M'){$M3='Mr.';} elseif($resHo['Gender']=='F' AND $resHo['Married']=='Y'){$M3='Mrs.';} elseif($resHo['Gender']=='F' AND $resHo['Married']=='N'){$M3='Miss.';} $NameHo=$M3.' '.$resHo['Fname'].' '.$resHo['Sname'].' '.$resHo['Lname']; }   ?>		
		<td class="data" style="width:250px;text-transform:uppercase;" valign="top">&nbsp;<?php echo $NameHo; ?></td>
	  </tr>
	</table>
	</td>
 </tr>
 <tr><td colspan="8">&nbsp;</td></tr>
 <tr><td align="center"><?php if($RowPmsId>0) { $sqlY=mysql_query("select Emp_AchivementSave,Emp_KRASave,Emp_SkillSave,Emp_FeedBackSave,Emp_PmsStatus,Appraiser_PmsStatus from hrm_employee_pms where EmpPmsId=".$resPmsId['EmpPmsId'], $con); $resY=mysql_fetch_assoc($sqlY); } 
 if($resY['Emp_AchivementSave']=='Y' AND $resY['Emp_KRASave']=='Y' AND $resY['Emp_SkillSave']=='Y' AND $resY['Emp_FeedBackSave']=='Y' AND $resY['Emp_PmsStatus']==1 AND ($resY['Appraiser_PmsStatus']==0 OR $resY['Appraiser_PmsStatus']==3)) {?> 
				 <input type="button" name="FinalAppSubmit" id="FinalAppSubmit_4" value="final submit" style="width:100px;" onClick="FinalSubmit()"/>
				 <?php } ?></td></tr>
  
      </table>
		</td>
<?php } ?>		
		</tr>
	  </table>
	</td>
   </tr>    
  </table>
 </td>
</tr>					
<?php //*************************************************************** Close ******************************************************************************** ?>					
				  </table>
				 </td>
			  </tr>
			 
			  <tr>
			     <td style="width:5px;">&nbsp;</td>
			     <td align="" class="fontButton" width="400">
				  
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
	  <td valign="top" align="center">
	    <table border="0" style="margin-top:0px;">
				<tr>
	              <td align="center"><img src="images/home1.png"></td>
				</tr>
	    </table>
	  </td>
	</tr>
	<tr>
	  <td valign="top" style="">
	    <?php require_once("../footer.php"); ?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>

