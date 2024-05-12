<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
/******************************************************************************/
$SD=mysql_query("select DepartmentId,GradeId,DesigId from hrm_employee_general where EmployeeID=".$EmployeeId, $con); $RD=mysql_fetch_assoc($SD);
$sqlPmsId=mysql_query("select EmpPmsId from hrm_employee_pms where AssessmentYear=".$YearId." AND EmployeeID=".$EmployeeId, $con); 
$resPmsId=mysql_fetch_assoc($sqlPmsId);

if(isset($_POST['SubmitAchieve']))
{   $n=$_POST['Sno'];  for($i=1; $i<=$n; $i++)
  { if($_POST['Achive_'.$i]!="")
    {$sqlIns=mysql_query("insert into hrm_employee_pms_achivement(EmpPmsId,Achivement) values(".$resPmsId['EmpPmsId'].", '".$_POST['Achive_'.$i]."')", $con); }
  } if($sqlIns)
    {
    $sqlUp=mysql_query("update hrm_employee_pms set Emp_AchivementSave='Y', Emp_PmsStatus=1 where EmpPmsId=".$resPmsId['EmpPmsId'], $con);
    $msg="Date saved successfully!";
	}
}
if(isset($_POST['ResetSubmitAchieve']))
{   $sqlDel=mysql_query("delete from hrm_employee_pms_achivement where EmpPmsId=".$resPmsId['EmpPmsId'], $con);
    $n=$_POST['NoRow']; $snY=$_POST['SnoY']; for($i=1; $i<=$n; $i++)
    { if($_POST['Achive_'.$i]!="")
    {$sqlIns=mysql_query("insert into hrm_employee_pms_achivement(EmpPmsId,Achivement) values(".$resPmsId['EmpPmsId'].", '".$_POST['Achive_'.$i]."')", $con); }
    } 
	for($j=$n+1; $j<=$snY; $j++)
    { if($_POST['AchiveY_'.$j]!="")
    {$sqlIns=mysql_query("insert into hrm_employee_pms_achivement(EmpPmsId,Achivement) values(".$resPmsId['EmpPmsId'].", '".$_POST['AchiveY_'.$j]."')", $con); }	
	}
  
   if($sqlIns)
    {
    $sqlUp=mysql_query("update hrm_employee_pms set Emp_AchivementSave='Y', Emp_PmsStatus=1 where EmpPmsId=".$resPmsId['EmpPmsId'], $con);
    $msg="Data saved successfully!";
	}
}

if($_REQUEST['action']=='submit')
{  
$sql=mysql_query("select EmpFormAScore, EmpFormBScore, FormAKraAllow_PerOfWeightage, FormBBehaviAllow_PerOfWeightage from hrm_employee_pms where EmpPmsId=".$resPmsId['EmpPmsId']." AND EmployeeID=".$EmployeeId, $con); $res=mysql_fetch_assoc($sql);
$Aweight=$res['FormAKraAllow_PerOfWeightage']; $Bweight=$res['FormBBehaviAllow_PerOfWeightage'];
$EmpFinallyFormAScore=($res['EmpFormAScore']*$res['FormAKraAllow_PerOfWeightage'])/100;
$EmpFinallyFormBScore=($res['EmpFormBScore']*$res['FormBBehaviAllow_PerOfWeightage'])/100;
$Emp_TotalFinalScore=$EmpFinallyFormAScore+$EmpFinallyFormBScore;

$sqlRat=mysql_query("select ScoreFrom,ScoreTo,Rating from hrm_pms_rating where RatingStatus='A' AND CompanyId=".$CompanyId, $con); 
while($resRat=mysql_fetch_array($sqlRat))
{ if($Emp_TotalFinalScore>$resRat['ScoreFrom'] AND $Emp_TotalFinalScore<=$resRat['ScoreTo']){$Emp_TotalFinalRating=$resRat['Rating'];}} 
  $sqlUp=mysql_query("update hrm_employee_pms set Emp_PmsStatus=2, Emp_SubmitedDate='".date("Y-m-d")."', EmpFinallyFormA_Score=".$EmpFinallyFormAScore.", EmpFinallyFormB_Score=".$EmpFinallyFormBScore.", Emp_TotalFinalScore=".$Emp_TotalFinalScore.", Emp_TotalFinalRating=".$Emp_TotalFinalRating.", HR_CurrDesigId=".$RD['DesigId'].", HR_CurrGradeId=".$RD['GradeId']." where EmpPmsId=".$resPmsId['EmpPmsId'], $con);
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
.Input{font-family:"Times New Roman", Times, serif; font-size:14px; height:22px;border-style:hidden; border-bottom-color:#FFFFFF; border-left-color:#FFFFFF; border-right-color:#FFFFFF; border-top-color:#FFFFFF; border:0;}.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;} .font1 { font-family:Georgia; font-size:11px; height:14px; } .font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">

for(var j=6; j<10; j++) 
{ function ShowRow(j) 
  {
  var u = j+1;  var u1 = j-1; //var a = j+2; c=a-1; alert("a="+a+"j="+c);
  if(j<=9) {document.getElementById('minusImg_'+j).style.display = 'block'; document.getElementById('addImg_'+j).style.display = 'none';
   document.getElementById('Row_'+j).style.display = 'block'; document.getElementById('addImg_'+u).style.display = 'block';
   document.getElementById('minusImg_'+u1).style.display = 'none';} 
  else { document.getElementById('minusImg_'+j).style.display = 'block'; document.getElementById('addImg_'+j).style.display = 'none';
    document.getElementById('Row_'+j).style.display = 'block';  document.getElementById('minusImg_'+u1).style.display = 'none';  } 
  }
  function HideRow(j)
  { 
  var u = j+1;  var u1 = j-1; 
  if(j<=9)
  {document.getElementById('minusImg_'+j).style.display = 'none'; document.getElementById('addImg_'+j).style.display = 'block';
   document.getElementById('Row_'+j).style.display = 'none'; document.getElementById('addImg_'+u).style.display = 'none';
   document.getElementById('minusImg_'+u1).style.display = 'block'; }
  else { document.getElementById('minusImg_'+j).style.display = 'none'; document.getElementById('addImg_'+j).style.display = 'block';
    document.getElementById('Row_'+j).style.display = 'none';  document.getElementById('minusImg_'+u1).style.display = 'block'; }  
  } 
}	
	
function ValidationAchive(AppraisalForm)
{
  //var row=document.getElementById("Sno").value
  var Achive_1 = AppraisalForm.Achive_1.value; 
  if (Achive_1.length === 0) { alert("please write minimum one achievement.");  return false; }
  if (Achive_1.length<15) { alert("please write minimum 15 character in first achievement.");  return false; } 
  var agree=confirm("Are you sure you want to save this achievement?");
  if (agree) { return true;} else {return false;}
}

/*
function EditArchN()
{ document.getElementById("SubmitAchieve").style.display='block'; document.getElementById("editArchiveN").style.display='none'; 
  for(var i=1; i<=10; i++) {document.getElementById("Achive_"+i).readOnly=false;} }
*/

function EditArchY()
{ document.getElementById("ResetSubmitAchieve").style.display='block'; document.getElementById("editArchiveY").style.display='none';
  var NoRowY=parseFloat(document.getElementById("NoRow").value); var SnoY=document.getElementById("SnoY").value;
  for(var i=1; i<=NoRowY; i++) {document.getElementById("Achive_"+i).readOnly=false;} 
  for(var j=NoRowY+1; j<=SnoY; j++) { document.getElementById("AchiveY_"+j).readOnly=false;}
  
}

function FinalSubmit() { var agree=confirm("Are you sure you want to submit appraisal form.?");
if (agree) { var x = "EmpPmsAppForm.php?action=submit";  window.location=x;}}	


function printpage(PmsId,EmpId) 
{ window.open ("EmpAppFormPrint.php?PmsId="+PmsId+"&EmpId="+EmpId,"AppForm","menubar=yes,scrollbars=yes,resizable=1,width=1050,height=600");}

function UploadEmpfile(p,e,y)
{ window.open("UploadAppFileEmp.php?action=up&P="+p+"&E="+e+"&Y="+y,"UploadFile","menubar=no,scrollbars=yes,resizable='no',width=650,height=500");} 

function OpenWindow()
{var CI=document.getElementById("ComId").value; var YI=document.getElementById("YId").value; 
 window.open("AppraisalSchedule.php?C="+CI+"&Y="+YI,"Schedule","menubar='no',resizable=1,width=850,height=350");}
 

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
</script>
</head>
<body class="body">   
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" name="YId" id="YId" value="<?php echo $YearId; ?>" />
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
<?php $sqlSch=mysql_query("select * from hrm_pms_appdate where AssessmentYear=".$YearId." AND CompanyId=".$CompanyId, $con); 
      $resSch=mysql_fetch_assoc($sqlSch); $CuDate=date("Y-m-d"); ?> 	 	  
  <table>
<?php //******************************************** ?>  
   <tr>
    <td width="1200">
	  <table>
	    <tr>
        <?php if($_SESSION['EmpType']=='E') {?> 
		 <td align="center"><a href="pms.php?log=<?php echo $_SESSION['logCheckEmp']; ?>"><img id="Img_emp1" style="display:none;" src="images/emp1.png" border="0"/></a>
		   <img id="Img_emp" style="display:block;" src="images/emp.png" border="0"/></td>  
<?php }  $sqlApp=mysql_query("select Appraiser_EmployeeID from hrm_employee_pms where Appraiser_EmployeeID=".$EmployeeId, $con); $rowApp=mysql_num_rows($sqlApp); 
      if($rowApp>0) { ?>			   
		 <td align="center"><a href="ManagerPms.php"><img id="Img_manager1" style="display:block;" src="images/manager1.png" border="0"/></a>
		   <img id="Img_manager" style="display:none;" src="images/manager.png" border="0"/></td>
<?php }  $sqlRev=mysql_query("select Reviewer_EmployeeID from hrm_employee_pms where Reviewer_EmployeeID=".$EmployeeId, $con); $rowRev=mysql_num_rows($sqlRev); 
      if($rowRev>0) { ?>			   
		 <td align="center"><a href="HodPms.php"><img id="Img_hod1" style="display:block;" src="images/hod1.png" border="0"/></a>
		   <img id="Img_hod" style="display:none;" src="images/hod.png" border="0"/></td>
<?php }  $sqlHod=mysql_query("select HOD_EmployeeID from hrm_employee_pms where HOD_EmployeeID=".$EmployeeId, $con); $rowHod=mysql_num_rows($sqlHod); 
      if($rowHod>0) { ?>		   
		 <td align="center"><a href="RevHodPms.php"><img id="Img_hod1" style="display:block;" src="images/RevHod1.png" border="0"/></a>
		   <img id="Img_hod" style="display:none;" src="images/RevHod.png" border="0"/></td>		   
<?php } ?>		   
		 <td width="10">&nbsp;</td>
		 <td>
<?php if($_SESSION['EmpType']=='E') {?>         
<?php $sqlY=mysql_query("select Emp_AchivementSave,Emp_KRASave,Emp_SkillSave,Emp_FeedBackSave,Emp_PmsStatus,Appraiser_PmsStatus,Reviewer_PmsStatus,HodSubmit_ScoreStatus, ExtraAllowPMS from hrm_employee_pms where EmpPmsId=".$resPmsId['EmpPmsId'], $con); $resY=mysql_fetch_assoc($sqlY); if($resY['Emp_AchivementSave']=='Y' AND $resY['Emp_KRASave']=='Y' AND $resY['Emp_SkillSave']=='Y' AND $resY['Emp_FeedBackSave']=='Y' AND $resY['Emp_PmsStatus']==1 AND ($resY['Appraiser_PmsStatus']==0 OR $resY['Appraiser_PmsStatus']==3)) {?>
<font color="#F1EE85" style="font-family:Times New Roman;" size="3"><b><blink>Please click on final submit button for complete your appraisal form.!</blink></font>
<?php } if(($resY['Emp_AchivementSave']=='Y' OR $resY['Emp_KRASave']=='Y' OR $resY['Emp_SkillSave']=='Y' OR $resY['Emp_FeedBackSave']=='Y') AND $resY['Emp_PmsStatus']==1 AND $resY['Appraiser_PmsStatus']==3) { ?>
<font color="#FFFFFF" style="font-family:Times New Roman;" size="3"><b></font>
<?php } if($resY['Emp_PmsStatus']==2){ ?>
<font color="#F1EE85" style="font-family:Times New Roman;" size="3"><b><blink>You have successfully submited appraisal form!</blink></font>
<?php } if(($resY['Emp_AchivementSave']=='N' OR $resY['Emp_KRASave']=='N' OR $resY['Emp_SkillSave']=='N' OR $resY['Emp_FeedBackSave']=='N') AND ($resY['Emp_PmsStatus']==0 OR $resY['Emp_PmsStatus']==1)) {  ?>
<font color="#F1EE85" style="font-family:Times New Roman;" size="3"><b><blink>Please fill appraisal form before last date of self appraisal!</blink></font>
<?php } }?>			 
		 
		 </td>
		 <td><font color="#014E05" style='font-family:Times New Roman;' size="3"><b><?php echo $msg; ?></b></font></td>  
	  </table>
	</td>
   </tr>
    <tr>
   <tr>
    <td width="1200">
	  <table>
	    <tr>
		 <?php if($_SESSION['EmpType']=='E') {?>
		 <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:140px;">
		 <a href="pms.php?log=<?php echo $_SESSION['logCheckEmp']; ?>"><font color="#620000">Personal_Details</font></a></td>   
		 <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:100px;">
		 <a href="javascript:OpenWindow()"><font color="#620000">Schedule</font></a></td>   			   
		 <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:110px;">
		 <?php if(($CuDate>=$resSch['EmpFromDate'] AND $CuDate<=$resSch['EmpToDate'] AND $resSch['EmpDateStatus']=='A') OR ($CuDate>=$resSch['AppFromDate'] AND $CuDate<=$resSch['AppToDate'] AND $resSch['AppDateStatus']=='A' AND $resY['Emp_PmsStatus']==1 AND $resY['Appraiser_PmsStatus']==3) OR ($CuDate>=$resSch['RevFromDate'] AND $CuDate<=$resSch['RevToDate'] AND $resSch['RevDateStatus']=='A' AND $resY['Emp_PmsStatus']==1 AND $resY['Appraiser_PmsStatus']==3 AND $resY['Reviewer_PmsStatus']==3) OR ($CuDate>=$resSch['HodFromDate'] AND $CuDate<=$resSch['HodToDate'] AND $resSch['HodDateStatus']=='A' AND $resY['Emp_PmsStatus']==1 AND $resY['Appraiser_PmsStatus']==3 AND $resY['Reviewer_PmsStatus']==3 AND $resY['HodSubmit_ScoreStatus']==3) OR $resY['ExtraAllowPMS']==1){ ?> 	 	
         <a href="EmpPmsAppForm.php"><font color="#FFFFFF">Appraisal_Form</font></a><?php } ?></td>
		  <td style="width:20px;">&nbsp;</td>
		 <td style="font-family:Times New Roman; font-size:16px; font-weight:bold;width:400px; color:#E10000;" >
		  <?php if($CuDate>=$resSch['EmpFromDate'] AND $CuDate<=$resSch['EmpToDate'] AND $resSch['EmpDateStatus']=='A') { 
		  $LastDate=$resSch['EmpToDate']; $CurrentDate=date("Y-m-d");
		  $diff = abs(strtotime($LastDate) - strtotime($CurrentDate));
          //$years = floor($diff / (365*60*60*24));
          //$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
          $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); ?>
		  <b><blink><?php echo $days; ?> Days Remaining! Last date : 
		  <font color="#5B0000"><?php echo date("d-F",strtotime($resSch['EmpToDate'])); ?></font></blink></b><?php } ?>
		 </td> 	   		
		 <?php } ?>  			       
	  </table>
	</td>
   </tr>
   
   <tr>
    <td>
	  <table border="0">
	    <tr>
		 <td style="width:5px;">&nbsp;</td>
<?php /****************************************** Form Start **************************/ ?>	 
<?php /***************** AppraisalForm **************************/ ?>	
		 <td id="AppraisalForm" style="width:1000px;display:block;">
		   <table>		   
 <tr>
   <td colspan="6">
     <table>
	  <tr>
   <td style="font-family:Times New Roman; font-size:18px; font-weight:bold;"><font color="#00468C">(<i>Appraisal Form</i>) :&nbsp;</font><br></td>
   <td style="font-family:Times New Roman; font-size:14px; font-weight:bold;"><a href="EmpPmsAppForm.php"><font color="#FFFFFF">Achievements</font></a></td>
   <td style="width:5px;">&nbsp;</td>
   <td style="font-family:Times New Roman; font-size:14px; font-weight:bold;"><a href="EmpPmsFormA.php"><font color="#0231EE">Form A(KRA)</font></a></td>
   <td style="width:5px;">&nbsp;</td>
   <td style="font-family:Times New Roman; font-size:14px; font-weight:bold;"><a href="EmpPmsFormB.php"><font color="#0231EE">Form B(Skills)</font></a></td>
   <td style="width:5px;">&nbsp;</td>
   <td style="font-family:Times New Roman; font-size:14px; font-weight:bold;"><a href="EmpPmsFedback.php"><font color="#0231EE">FeedBack</font></a></td>
   <td style="width:5px;">&nbsp;</td>
   <?php if($resY['Emp_PmsStatus']!=2) { ?> <td style="font-family:Times New Roman; font-size:14px; font-weight:bold;">
   <a href="#" onClick="UploadEmpfile(<?php echo $resPmsId['EmpPmsId'].','.$EmployeeId.','.$YearId; ?>)"><font color="#9732A3">UploadFile</font></a></td>
   <?php } ?>
   <td style="width:5px;">&nbsp;</td>
   <?php if($resY['Emp_AchivementSave']=='Y' OR $resY['Emp_KRASave']=='Y' OR $resY['Emp_SkillSave']=='Y' OR $resY['Emp_FeedBackSave']=='Y') { ?>   
   <td style="font-family:Times New Roman; font-size:14px; font-weight:bold;" valign="middle">
   <a href="#" onClick="printpage(<?php echo $resPmsId['EmpPmsId'].','.$EmployeeId; ?>)"/><font color="#004F00">View/ Print My Form</font></a></td>
   <td style="width:5px;">&nbsp;</td>
  <?php } ?>
   <td style="font-family:Times New Roman; font-size:14px; font-weight:bold;"><font color="#006400"><span id="MsgSpan"></span></font></td> 
      </tr>
	</table>
   </td>
 <tr>
   <?php /***************** Achivement **************************/ ?>
<form name="AppraisalForm" method="post" onSubmit="return ValidationAchive(this)">   
   <td id="Achivement" style="">
	 <table border="0">
 <tr><td colspan="6" align="center" class="font" style="color:#000084; width:1100px;" valign="middle">
      <?php $to=$fromdate-1; ?>
	  List down your Significant Contribution(Achievement) for Assessment Year&nbsp;<?php echo $to.'-'.$fromdate;?></td></tr>
<?php $sqlYN=mysql_query("select Emp_AchivementSave,Emp_KRASave,Emp_SkillSave,Emp_FeedBackSave,Emp_PmsStatus,Appraiser_PmsStatus from hrm_employee_pms where EmpPmsId=".$resPmsId['EmpPmsId'], $con); $resYN=mysql_fetch_assoc($sqlYN);
      
	  if($resYN['Emp_AchivementSave']=='Y') {
	  $sqlC=mysql_query("select AchivementId,Achivement from hrm_employee_pms_achivement INNER JOIN hrm_employee_pms ON hrm_employee_pms_achivement.EmpPmsId=hrm_employee_pms.EmpPmsId where hrm_employee_pms.AssessmentYear=".$YearId." AND hrm_employee_pms.EmployeeID=".$EmployeeId." order by AchivementId ASC", $con); $rows=mysql_num_rows($sqlC);  $No=1; while($resC=mysql_fetch_array($sqlC)) { ?>
     <tr><td></td>
	 <td class="font" style="width:50px;" align="center">&nbsp;<?php echo $No; ?>&nbsp;:&nbsp;</td>
	 <td style="width:1050px;"><input name="Achive_<?php echo $No; ?>" id="Achive_<?php echo $No; ?>" class="Input" style="width:1050px; background-color:#FFFFFF;" maxlength="350" readonly value="<?php echo $resC['Achivement'];  ?>" /></td></tr><?php $No++; } $NoRow=$No-1; echo '<input type="hidden" name="NoRow" id="NoRow" value="'.$NoRow.'" />'; ?>

<?php if($resYN['Emp_AchivementSave']=='Y' AND $resYN['Emp_PmsStatus']==1) { ?>
<?php for($i=$No; $i<=10; $i++){ ?> 
 <tr>
    <td id="AppImg_<?php echo $i; ?>">
<img src="images/Addnew.png" <?php if($i>$No) { echo 'style="display:none;"';} ?> border="0" id="addImg_<?php echo $i; ?>" onClick="ShowRow(<?php echo $i; ?>)"/>
<img src="images/Minusnew.png" id="minusImg_<?php echo $i; ?>" <?php if($i>=$No){ echo 'style="display:none;"'; } ?> border="0" onClick="HideRow(<?php echo $i; ?>)"/></td>
    <td colspan="2">
		<table style="display:none;" id="Row_<?php echo $i; ?>">
<tr><td class="font" style="width:50px;" align="center">&nbsp;<?php echo $i;?>&nbsp;:&nbsp;</td>
  <td style="width:1050px;"><input name="AchiveY_<?php echo $i; ?>" id="AchiveY_<?php echo $i; ?>" class="Input" style="width:1050px; background-color:#FFFFFF;" maxlength="350" readonly/></td>
</tr>
		</table>
	 </td>
 </tr>		  	 	 
<?php } $snoY=$i-1; echo '<input type="hidden" name="SnoY" id="SnoY" value="'.$snoY.'" />'; } ?>

<?php } if($resYN['Emp_AchivementSave']=='N' AND $resYN['Appraiser_PmsStatus']==0) { ?>	 	  
<tr><td></td>
 <td class="font" style="width:50px;" align="center">&nbsp;1&nbsp;:&nbsp;</td>
 <td style="width:1050px;"><input name="Achive_1" id="Achive_1" class="Input" style="width:1050px; background-color:#FFFFFF;" maxlength="350"/></td></tr>
<tr><td></td>
 <td class="font" style="width:50px;" align="center">&nbsp;2&nbsp;:&nbsp;</td>
 <td style="width:1050px;"><input name="Achive_2" id="Achive_2" class="Input" style="width:1050px; background-color:#FFFFFF;" maxlength="350"/></td></tr>
<tr><td></td>
 <td class="font" style="width:50px;" align="center">&nbsp;3&nbsp;:&nbsp;</td>
 <td style="width:1050px;"><input name="Achive_3" id="Achive_3" class="Input" style="width:1050px; background-color:#FFFFFF;" maxlength="350"/></td></tr>	 
<tr><td></td>
 <td class="font" style="width:50px;" align="center">&nbsp;4&nbsp;:&nbsp;</td>
 <td style="width:1050px;"><input name="Achive_4" id="Achive_4" class="Input" style="width:1050px; background-color:#FFFFFF;" maxlength="350"/></td></tr>	
<tr><td></td>
 <td class="font" style="width:50px;" align="center">&nbsp;5&nbsp;:&nbsp;</td>
 <td style="width:1050px;"><input name="Achive_5" id="Achive_5" class="Input" style="width:1050px; background-color:#FFFFFF;" maxlength="350"/></td></tr>
<?php for($i=6; $i<=10; $i++){ ?> 
 <tr>
    <td id="AppImg_<?php echo $i; ?>">
<img src="images/Addnew.png" <?php if($i>6) { echo 'style="display:none;"';} ?> border="0" id="addImg_<?php echo $i; ?>" onClick="ShowRow(<?php echo $i; ?>)"/>
<img src="images/Minusnew.png" id="minusImg_<?php echo $i; ?>" <?php if($i>=6){ echo 'style="display:none;"'; } ?> border="0" onClick="HideRow(<?php echo $i; ?>)"/></td>
    <td colspan="2">
		<table style="display:none;" id="Row_<?php echo $i; ?>">
<tr><td class="font" style="width:50px;" align="center">&nbsp;<?php echo $i;?>&nbsp;:&nbsp;</td>
  <td style="width:1050px;"><input name="Achive_<?php echo $i; ?>" id="Achive_<?php echo $i; ?>" class="Input" style="width:1050px; background-color:#FFFFFF;" maxlength="350"/></td>
</tr>
		</table>
	 </td>
 </tr>		  	 	 
<?php } $sno=$i-1; echo '<input type="hidden" name="Sno" id="Sno" value="'.$sno.'" />'; ?>
<?php } ?>
 <tr><td colspan="8" style="font-family:Times New Roman;font-size:14px;color:#400000;font-weight:bold;">Please ignore special characters(#, @, ~, ', ", etc).</td></tr>
 <tr><td colspan="6" align="" style="width:150px;"><table><tr><td>
     <?php if($resYN['Emp_AchivementSave']=='N' AND $resYN['Appraiser_PmsStatus']==0) { ?>
     <input type="Submit" name="SubmitAchieve" id="SubmitAchieve" style="width:145px;" value="save as draft"/>
     <input type="button" id="editArchiveN" style="width:90px; display:none;" value="edit" onClick="EditArchN()"/>
     <?php } ?>
     <?php if($resYN['Emp_AchivementSave']=='Y' AND $resYN['Emp_PmsStatus']==1) { ?> 
     <input type="Submit" name="ResetSubmitAchieve" id="ResetSubmitAchieve" style="width:145px;display:none;" value="save as draft"/>
     <input type="button" id="editArchiveY" style="width:90px;" value="edit" onClick="EditArchY()"/>
     <?php } ?>
     </td>
     <td><?php $sqlY=mysql_query("select Emp_AchivementSave,Emp_KRASave,Emp_SkillSave,Emp_FeedBackSave,Emp_PmsStatus,Appraiser_PmsStatus from hrm_employee_pms where EmpPmsId=".$resPmsId['EmpPmsId'], $con); $resY=mysql_fetch_assoc($sqlY); if($resY['Emp_AchivementSave']=='Y' AND $resY['Emp_KRASave']=='Y' AND $resY['Emp_SkillSave']=='Y' AND $resY['Emp_FeedBackSave']=='Y' AND $resY['Emp_PmsStatus']==1 AND ($resY['Appraiser_PmsStatus']==0 OR $resY['Appraiser_PmsStatus']==3)) {?> 
				 <input type="button" name="FinalAppSubmit" id="FinalAppSubmit_4" value="final submit" style="width:100px;" onClick="FinalSubmit()"/>
				 <?php } ?>
	  </td> 
      </tr></table>
 </td></tr>
 
 	  	 	  
	 </table>
   </td>
</form>    
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

