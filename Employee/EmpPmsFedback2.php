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
//*************************************************************************************************************
if(isset($_POST['SubmitFeedBack']))
{   $n=$_POST['FeedBackRow'];  for($i=1; $i<=$n; $i++)
  { 
    $sqlIns=mysql_query("insert into hrm_employee_pms_workenvironment(EmpPmsId,WorkEnvironment,Answer) values(".$resPmsId['EmpPmsId'].",'".$_POST['Environment'.$i]."','".$_POST['EnvReplyF'.$i]."')", $con); }
    if($sqlIns)
     {
	  $sqlUp=mysql_query("update hrm_employee_pms set Emp_FeedBackSave='Y', Emp_PmsStatus=1 where EmpPmsId=".$resPmsId['EmpPmsId'], $con);
	  $msg="Data saved successfully!";
	 }
}
if(isset($_POST['ResetSubmitFeedBack']))
{   $sqlDel=mysql_query("delete from hrm_employee_pms_workenvironment where EmpPmsId=".$resPmsId['EmpPmsId'], $con);
    $n=$_POST['ResetFBRow'];  for($i=1; $i<=$n; $i++)
  { 
     $sqlIns=mysql_query("insert into hrm_employee_pms_workenvironment(EmpPmsId,WorkEnvironment,Answer) values(".$resPmsId['EmpPmsId'].", '".$_POST['Environment'.$i]."', '".$_POST['EnvReplyF'.$i]."')", $con); }
   if($sqlIns)
     {
	  $sqlUp=mysql_query("update hrm_employee_pms set Emp_FeedBackSave='Y', Emp_PmsStatus=1 where EmpPmsId=".$resPmsId['EmpPmsId'], $con);
	  $msg="Data saved successfully!";
	 }
}

//***************************************************************************************************************
if($_REQUEST['action']=='submit')
{  
$sql=mysql_query("select EmpFormAScore, EmpFormBScore, FormAKraAllow_PerOfWeightage, FormBBehaviAllow_PerOfWeightage from hrm_employee_pms where EmpPmsId=".$resPmsId['EmpPmsId']." AND EmployeeID=".$EmployeeId, $con); $res=mysql_fetch_assoc($sql);
$Aweight=$res['FormAKraAllow_PerOfWeightage']; $Bweight=$res['FormBBehaviAllow_PerOfWeightage'];
$EmpFinallyFormAScore=($res['EmpFormAScore']*$res['FormAKraAllow_PerOfWeightage'])/100;
$EmpFinallyFormBScore=($res['EmpFormBScore']*$res['FormBBehaviAllow_PerOfWeightage'])/100;
$Emp_TotalFinalScore=$EmpFinallyFormAScore+$EmpFinallyFormBScore;

$sqlRat=mysql_query("select ScoreFrom,ScoreTo,Rating from hrm_pms_rating where RatingStatus='A' AND CompanyId=".$CompanyId, $con); 
while($resRat=mysql_fetch_array($sqlRat))
{ if($Emp_TotalFinalScore>$resRat['ScoreFrom'] AND $Emp_TotalFinalScore<=$resRat['ScoreTo'])
 {$Emp_TotalFinalRating=$resRat['Rating'];}} 
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

function ValidationFeedback(FeedBackForm)

{ 

  var FeedBackRow=document.getElementById("FeedBackRow").value; 

  for(var i=1; i<=FeedBackRow; i++)

   { 

	 if(document.getElementById("EnvReplyF"+i).value=="")

	 {alert("please enter feedback Answer");  return false; }

	 //var filter=/^[a-zA-Z., ]+$/;  var test_bool = filter.test(document.getElementById("EnvReplyF"+i).value)

     //if(test_bool==false) { alert('Please Enter Only Alphabets in the Feedback Answer Field');  return false; } 

   }

   

  var agree=confirm("Are you sure you want to save this feedback form?");

  if (agree) { return true;} else {return false;}

}



function editNFeedBack()

{ document.getElementById("SubmitFeedBack").style.display='block'; document.getElementById("NFeedBack").style.display='none'; 

  var FeedBackRowY=document.getElementById("FeedBackRow").value; 

  for(var i=1; i<=FeedBackRowY; i++) {document.getElementById("Environment"+i).readOnly=false;document.getElementById("EnvReplyF"+i).readOnly=false;}

}

function editYFeedBack()

{ document.getElementById("ResetSubmitFeedBack").style.display='block'; document.getElementById("YFeedBack").style.display='none'; 

  var ResetFBRowY=document.getElementById("ResetFBRow").value; 

  for(var i=1; i<=ResetFBRowY; i++) {document.getElementById("Environment"+i).readOnly=false;document.getElementById("EnvReplyF"+i).readOnly=false;}

}



	

function FinalSubmit() { var agree=confirm("Are you sure you want to submit appraisal form.?");

if (agree) { var x = "EmpPmsFedback.php?action=submit";  window.location=x;}}			 



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

      $resSch=mysql_fetch_assoc($sqlSch); $CuDate=date("Y-m-d");?> 	  	 

  <table>

<?php //******************************************** ?>  

   <tr>

    <td width="1200">

	  <table>

	    <tr>

        <?php if($_SESSION['EmpType']=='E') {?> 

		 <td align="center"><a href="pms.php?log=<?php echo $_SESSION['logCheckEmp']; ?>"><img id="Img_emp1" style="display:none;" src="images/emp1.png" border="0"/></a>

		   <img id="Img_emp" style="display:block;" src="images/emp.png" border="0"/></td>          

<?php } $sqlApp=mysql_query("select Appraiser_EmployeeID from hrm_employee_pms where Appraiser_EmployeeID=".$EmployeeId, $con); $rowApp=mysql_num_rows($sqlApp); 

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

		 <td id="AppraisalForm" style="width:1100px;display:block;">

		   <table>		   

 <tr>

   <td colspan="6">

     <table>

	  <tr>

   <td style="font-family:Times New Roman; font-size:18px; font-weight:bold;"><font color="#00468C">(<i>Appraisal Form</i>) :&nbsp;</font><br></td>

   <td style="font-family:Times New Roman; font-size:14px; font-weight:bold;"><a href="EmpPmsAppForm.php"><font color="#0231EE">Achievements</font></a></td>

   <td style="width:5px;">&nbsp;</td>

   <td style="font-family:Times New Roman; font-size:14px; font-weight:bold;"><a href="EmpPmsFormA.php"><font color="#0231EE">Form A(KRA)</font></a></td>

   <td style="width:5px;">&nbsp;</td>

   <td style="font-family:Times New Roman; font-size:14px; font-weight:bold;"><a href="EmpPmsFormB.php"><font color="#0231EE">Form B(Skills)</font></a></td>

   <td style="width:5px;">&nbsp;</td>

   <td style="font-family:Times New Roman; font-size:14px; font-weight:bold;"><a href="EmpPmsFedback.php"><font color="#FFFFFF">FeedBack</font></a></td>

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

   <?php /***************** Feedback **************************/ ?>

<form name="FeedBackForm" method="post" onSubmit="return ValidationFeedback(this)">   

   <td id="FeedBack" style="display:block;">

	 <table border="0">

<tr><td colspan="9" align="center" style="color:#000084; width:1000px;font-family:Georgia; font-size:12px; font-weight:bold;" valign="middle">Work Environment</td></tr>

<?php $sqlYNF=mysql_query("select Emp_AchivementSave,Emp_KRASave,Emp_SkillSave,Emp_FeedBackSave,Emp_PmsStatus,Appraiser_PmsStatus from hrm_employee_pms where EmpPmsId=".$resPmsId['EmpPmsId'], $con); $resYNF=mysql_fetch_assoc($sqlYNF);

      if($resYNF['Emp_FeedBackSave']=='Y') { $sqlFY=mysql_query("select * from hrm_employee_pms_workenvironment where EmpPmsId=".$resPmsId['EmpPmsId']." order by EmpWorkEnvId ASC", $con);

	  $SnoFY=1; while($resFY=mysql_fetch_array($sqlFY)){?>

 <tr>   

	  <td align="left" class="font" style="width:1050px;">

	   <table border="0">

	    <tr>

		 <td align="center" style="width:15px; font-family:Georgia; font-size:12px; font-weight:bold;" valign="top"><?php echo $SnoFY; ?>&nbsp;:&nbsp;</td>

		 <td align="left" style="width:1050px; font-family:Georgia; font-size:12px; color:#000000;" valign="top">

		 <input type="hidden" name="Environment<?php echo $SnoFY; ?>" id="Environment<?php echo $SnoFY; ?>" value="<?php echo $resFY['WorkEnvironment']; ?>"/>

		 <?php echo $resFY['WorkEnvironment']; ?></td>

		</tr>

		<tr bgcolor="#FFFFFF">

		 <td colspan="2" class="font1" align="left" style="width:1050px; height:20px;" valign="top">

		 <input name="EnvReplyF<?php echo $SnoFY; ?>" id="EnvReplyF<?php echo $SnoFY; ?>" class="Input" readonly style="width:1050px;" maxlength="400" value="<?php echo $resFY['Answer']; ?>" <?php  if($resYNF['Emp_FeedBackSave']=='Y' AND $resYNF['Emp_PmsStatus']==2) { echo 'readonly'; } ?>/></td>

		</tr>

	   </table>

	  </td>

 </tr>	  

<?php $SnoFY++; } $ResetFeedBackRow=$SnoFY-1; ?><input type="hidden" name="ResetFBRow" id="ResetFBRow" value="<?php echo $ResetFeedBackRow; ?>" /> 



<?php } if($resYNF['Emp_FeedBackSave']=='N') { $sqlF=mysql_query("select * from hrm_pms_workenvironment where WorkEnStatus='A' AND companyid=".$CompanyId);  

$SnoF=1; while($resF=mysql_fetch_array($sqlF)) {?> 

 <tr>   

	  <td align="left" class="font" style="width:1050px;">

	   <table border="0">

	    <tr>

		 <td align="center" style="width:15px; font-family:Georgia; font-size:12px; font-weight:bold;" valign="top"><?php echo $SnoF; ?>&nbsp;:&nbsp;</td>

		 <td align="left" style="width:1050px; font-family:Georgia; font-size:12px;color:#000000;" valign="top">

		  <input type="hidden" name="Environment<?php echo $SnoF; ?>" id="Environment<?php echo $SnoF; ?>" value="<?php echo $resF['Environment']; ?>"/>

		  <?php echo $resF['Environment']; ?>

		 </td>

		</tr>

		<tr bgcolor="#FFFFFF">

		 <td colspan="2" class="font" align="left" style="width:10500px;" valign="top">

		 <input name="EnvReplyF<?php echo $SnoF; ?>" id="EnvReplyF<?php echo $SnoF; ?>" class="Input" style="width:1050px;" maxlength="400" value=""/></td>

		</tr>

	   </table>

	  </td>

 </tr>

<?php $SnoF++;} $FeedBackRow=$SnoF-1; ?>

  <tr>   

	  <td align="left" class="font" style="width:1050px;">

	   <table border="0">

	    <tr>

		 <td align="center" style="width:15px; font-family:Georgia; font-size:12px; font-weight:bold;" valign="top"><?php echo $SnoF; ?>&nbsp;:&nbsp;</td>

		 <td align="left" style="width:1050px; font-family:Georgia; font-size:12px;color:#000000;" valign="top">

		  <input type="hidden" name="Environment<?php echo $SnoF; ?>" id="Environment<?php echo $SnoF; ?>" value="Any other feedback !"/>

		  Any other feedback !

		 </td>

		</tr>

		<tr bgcolor="#FFFFFF">

		 <td colspan="2" class="font" align="left" style="width:10500px;" valign="top">

		 <input name="EnvReplyF<?php echo $SnoF; ?>" id="EnvReplyF<?php echo $SnoF; ?>" class="Input" style="width:1050px;" maxlength="400" value="."/></td>

		</tr>

	   </table>

	  </td>

 </tr>

 <input type="hidden" name="FeedBackRow" id="FeedBackRow" value="<?php echo $SnoF; ?>" /><?php } ?>

 

 
 <tr><td colspan="8" style="font-family:Times New Roman;font-size:14px;color:#400000;font-weight:bold;">Please ignore special characters(#, @, ~, ', ", etc).</td></tr>
 <tr><td colspan="9" align="left"><table><tr>
     <td style="width:100px;">
     <?php if($resYNF['Emp_FeedBackSave']=='N' AND $resYNF['Appraiser_PmsStatus']==0) { ?>
     <input type="Submit" name="SubmitFeedBack" id="SubmitFeedBack" style="width:145px;" value="save as draft"/>
     <input type="button" id="NFeedBack" style="width:90px;display:none;" value="edit" onClick="editNFeedBack()"/>
     <?php } ?>
     <?php if($resYNF['Emp_FeedBackSave']=='Y' AND $resYNF['Emp_PmsStatus']==1) { ?> 
     <input type="Submit" name="ResetSubmitFeedBack" id="ResetSubmitFeedBack" style="width:150px;display:none;" value="save as draft"/>
     <input type="button" id="YFeedBack" style="width:90px;" value="edit" onClick="editYFeedBack()"/>
     <?php } ?>
 </td>
 <td><?php $sqlY=mysql_query("select Emp_AchivementSave,Emp_KRASave,Emp_SkillSave,Emp_FeedBackSave,Emp_PmsStatus,Appraiser_PmsStatus from hrm_employee_pms where EmpPmsId=".$resPmsId['EmpPmsId'], $con); $resY=mysql_fetch_assoc($sqlY); if($resY['Emp_AchivementSave']=='Y' AND $resY['Emp_KRASave']=='Y' AND $resY['Emp_SkillSave']=='Y' AND $resY['Emp_FeedBackSave']=='Y' AND $resY['Emp_PmsStatus']==1 AND ($resY['Appraiser_PmsStatus']==0 OR $resY['Appraiser_PmsStatus']==3)) {?> 

				 <input type="button" name="FinalAppSubmit" id="FinalAppSubmit_4" value="final submit" style="width:100px;" onClick="FinalSubmit()"/>

 <?php } ?></td>

 </tr></table></td>			 

 </tr>

	 </table>

   </td>

   

 </tr>

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



