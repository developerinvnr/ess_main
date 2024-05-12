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
if(isset($_POST['SubmitFormB']))
{   $n=$_POST['FormBRow'];  for($i=1; $i<=$n; $i++)
  { $sqlIns=mysql_query("insert into hrm_employee_pms_behavioralformb(EmpPmsId,FormBId,SelfRating,SelfFormBScore,Comments_Example) values(".$resPmsId['EmpPmsId'].",'".$_POST['FormBId'.$i]."',".$_POST['SelfRatingB'.$i].",".$_POST['EmpBScore'.$i].",'".$_POST['Comments_Example'.$i]."')", $con); 
  } if($sqlIns)
     {
	  $sqlUp=mysql_query("update hrm_employee_pms set Emp_SkillSave='Y', Emp_PmsStatus=1, EmpFormBScore=".$_POST['EmpFinalFormBScore']." where EmpPmsId=".$resPmsId['EmpPmsId'], $con);
	  $msg="Data saved successfully!";
	 }
}
if(isset($_POST['SubmitResetFormB']))
{   
    $n=$_POST['BRow'];  for($i=1; $i<=$n; $i++)
  {  $sqlIns=mysql_query("update hrm_employee_pms_behavioralformb set SelfRating=".$_POST['BSelfRatingB'.$i].", SelfFormBScore=".$_POST['BEmpBScore'.$i].", Comments_Example='".$_POST['Comments_Example'.$i]."' where EmpPmsId=".$resPmsId['EmpPmsId']." AND BehavioralFormBId=".$_POST['BehaFormBId'.$i], $con);
  } if($sqlIns)
     {
	  $sqlUp=mysql_query("update hrm_employee_pms set Emp_SkillSave='Y', Emp_PmsStatus=1, EmpFormBScore=".$_POST['EmpFinalFormBScore']." where EmpPmsId=".$resPmsId['EmpPmsId'], $con);
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

function ValidationFormB(SkillFormB)

{ 

  var FormBRow=document.getElementById("FormBRow").value;

  for(var i=1; i<=FormBRow; i++)

   { 

     //if(document.getElementById("SelfRatingB"+i).value==0)

	 //{alert("please enter self rating");  return false; }

	 //if(document.getElementById("SelfRatingB"+i).value=="")

	 //{alert("please enter self rating");  return false; }

	 if(document.getElementById("SelfRatingB"+i).value>150)

	 {alert("Please check self rating value");  return false; }

	 var Numfilter=/^[0-9. ]+$/;  var test_numB = Numfilter.test(document.getElementById("SelfRatingB"+i).value)

     if(test_numB==false) { alert('Please Enter Only Number in the self rating Field');  return false; } 

   }

   

  var agree=confirm("Are you sure you want to save form B?");

  if (agree) { return true;} else {return false;}

}		



function EnterEmpFormB()

{ var EmpFormBRow=document.getElementById("FormBRow").value; var SnoB=document.getElementById("SnoB").value;  

  var SUM = parseFloat(document.getElementById("FormBSum").value);  var FormBScore=parseFloat(document.getElementById("EmpFormBScore"+SnoB).value); 

  for(var i=1; i<=EmpFormBRow; i++)

  { 

    var FormBWeight = parseFloat(document.getElementById("WeightageB"+i).value); var FormBTarget = parseFloat(document.getElementById("TargetB"+i).value);

    var EmpFormBRating = parseFloat(document.getElementById("SelfRatingB"+i).value); var EmpFormBScore = parseFloat(document.getElementById("EmpBScore"+i).value);

    var NewEmpFormBScore=document.getElementById("EmpBScore"+i).value=Math.round(((EmpFormBRating/FormBTarget)*FormBWeight)*100)/100;

	var Score=document.getElementById("FormBScore"+i).value=Math.round((NewEmpFormBScore)*100)/100;

  }

 var s1= parseFloat(document.getElementById("FormBScore"+1).value); var s2= parseFloat(document.getElementById("FormBScore"+2).value);

 var s3= parseFloat(document.getElementById("FormBScore"+3).value); var s4= parseFloat(document.getElementById("FormBScore"+4).value);

 var s5= parseFloat(document.getElementById("FormBScore"+5).value); var s6= parseFloat(document.getElementById("FormBScore"+6).value);

 var s7= parseFloat(document.getElementById("FormBScore"+7).value); var s8= parseFloat(document.getElementById("FormBScore"+8).value);

 var s9= parseFloat(document.getElementById("FormBScore"+9).value); var s10= parseFloat(document.getElementById("FormBScore"+10).value);

 var s11= parseFloat(document.getElementById("FormBScore"+11).value); var s12= parseFloat(document.getElementById("FormBScore"+12).value);

 var s13= parseFloat(document.getElementById("FormBScore"+13).value); var s14= parseFloat(document.getElementById("FormBScore"+14).value);

 var s15= parseFloat(document.getElementById("FormBScore"+15).value); var s16= parseFloat(document.getElementById("FormBScore"+16).value);

 var s17= parseFloat(document.getElementById("FormBScore"+17).value); var s18= parseFloat(document.getElementById("FormBScore"+18).value);

 var s19= parseFloat(document.getElementById("FormBScore"+19).value); var s20= parseFloat(document.getElementById("FormBScore"+20).value);

 var P = document.getElementById("FormBSum").value=Math.round((s1+s2+s3+s4+s5+s6+s7+s8+s9+s10+s11+s12+s13+s14+s15+s16+s17+s18+s19+s20)*100)/100; 

 document.getElementById("EmpFormBScore"+SnoB).value=Math.round((P)*100)/100; 

}		



function BEnterEmpFormB()

{ var EmpFormBRow=document.getElementById("BRow").value; var SnoB=document.getElementById("BSnoB").value;  

  var SUM = parseFloat(document.getElementById("FormBSum").value);  var FormBScore=parseFloat(document.getElementById("EmpFormBScore"+SnoB).value); 

  for(var i=1; i<=EmpFormBRow; i++)

  { 

    var FormBWeight = parseFloat(document.getElementById("BWeightageB"+i).value); var FormBTarget = parseFloat(document.getElementById("BTargetB"+i).value); 

    var EmpFormBRating = parseFloat(document.getElementById("BSelfRatingB"+i).value); var EmpFormBScore = parseFloat(document.getElementById("BEmpBScore"+i).value); 

    var NewEmpFormBScore=document.getElementById("BEmpBScore"+i).value=Math.round(((EmpFormBRating/FormBTarget)*FormBWeight)*100)/100; 

	var Score=document.getElementById("FormBScore"+i).value=Math.round((NewEmpFormBScore)*100)/100; //alert("aa");

  }

 var s1= parseFloat(document.getElementById("FormBScore"+1).value); var s2= parseFloat(document.getElementById("FormBScore"+2).value);

 var s3= parseFloat(document.getElementById("FormBScore"+3).value); var s4= parseFloat(document.getElementById("FormBScore"+4).value);

 var s5= parseFloat(document.getElementById("FormBScore"+5).value); var s6= parseFloat(document.getElementById("FormBScore"+6).value);

 var s7= parseFloat(document.getElementById("FormBScore"+7).value); var s8= parseFloat(document.getElementById("FormBScore"+8).value);

 var s9= parseFloat(document.getElementById("FormBScore"+9).value); var s10= parseFloat(document.getElementById("FormBScore"+10).value);

 var s11= parseFloat(document.getElementById("FormBScore"+11).value); var s12= parseFloat(document.getElementById("FormBScore"+12).value);

 var s13= parseFloat(document.getElementById("FormBScore"+13).value); var s14= parseFloat(document.getElementById("FormBScore"+14).value);

 var s15= parseFloat(document.getElementById("FormBScore"+15).value); var s16= parseFloat(document.getElementById("FormBScore"+16).value);

 var s17= parseFloat(document.getElementById("FormBScore"+17).value); var s18= parseFloat(document.getElementById("FormBScore"+18).value);

 var s19= parseFloat(document.getElementById("FormBScore"+19).value); var s20= parseFloat(document.getElementById("FormBScore"+20).value);

 var P = document.getElementById("FormBSum").value=Math.round((s1+s2+s3+s4+s5+s6+s7+s8+s9+s10+s11+s12+s13+s14+s15+s16+s17+s18+s19+s20)*100)/100; 

 document.getElementById("EmpFormBScore"+SnoB).value=Math.round((P)*100)/100; 

}		









function FinalSubmit() { var agree=confirm("Are you sure you want to submit appraisal form.?");

if (agree) { var x = "EmpPmsFormB.php?action=submit";  window.location=x;}}			 



function editFormBN()

{ document.getElementById("SubmitFormB").style.display='block'; document.getElementById("FormBN").style.display='none'; 

  var FormBRowY=document.getElementById("FormBRow").value; 

  for(var i=1; i<=FormBRowY; i++) {document.getElementById("SelfRatingB"+i).readOnly=false;document.getElementById("Comments_Example"+i).readOnly=false;}

}

function editFormBY()

{ document.getElementById("SubmitResetFormB").style.display='block'; document.getElementById("FormBY").style.display='none'; 

  var BRowY=document.getElementById("BRow").value; 

  for(var i=1; i<=BRowY; i++) {document.getElementById("BSelfRatingB"+i).readOnly=false;document.getElementById("Comments_Example"+i).readOnly=false;}

}





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
<?php for($j=1; $j<=20; $j++) { ?><input type="hidden" id="FormBScore<?php echo $j; ?>" value="0" /><?php } ?><input type="hidden" id="FormBSum" value="0"/>  

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

<?php }  ?>		   

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

		 <td id="AppraisalForm" style="width:1150px;display:block;">

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

   <td style="font-family:Times New Roman; font-size:14px; font-weight:bold;"><a href="EmpPmsFormB.php"><font color="#FFFFFF">Form B(Skills)</font></a></td>

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



   <?php /***************** Form B(Skill) **************************/ ?>

<form name="SkillFormB" method="post" onSubmit="return ValidationFormB(this)"> 

   <td id="FormB" style="">

	 <table border="0">

 <tr><td colspan="9" align="center" class="font" style="color:#000084; width:1150px;" valign="middle">

	  Rate your Competency level for current role as listed below. Self rating shall be in % against the 100% target Score. Score = rating/target*Weightage</td></tr>

 <tr bgcolor="#EEF0AA" style="height:22px;">   

	  <td align="center" class="font" style="width:40px;">SNo.</td>

	  <td class="font" align="center" style="width:250px;">Behavioral/Skills</td>

	  <td class="font" align="center" style="width:550px;">Description</td>

	  <td class="font" align="center" style="width:60px;">Weightage</td>

	  <td class="font" align="center" style="width:60px;">Target</td>

	  <td class="font" align="center" style="width:80px;">Self Rating</td>

	  <td class="font" align="center" style="width:100px;">Comments</td>

 </tr>

<?php $sqlYNB=mysql_query("select Emp_AchivementSave,Emp_KRASave,Emp_SkillSave,Emp_FeedBackSave,Emp_PmsStatus,Appraiser_PmsStatus from hrm_employee_pms where EmpPmsId=".$resPmsId['EmpPmsId'], $con); $resYNB=mysql_fetch_assoc($sqlYNB); 
      if($resYNB['Emp_SkillSave']=='Y') { $sqlBY=mysql_query("select * from hrm_employee_pms_behavioralformb where EmpPmsId=".$resPmsId['EmpPmsId']." order by BehavioralFormBId ASC", $con);
	  $SnoB=1; while($resBY=mysql_fetch_array($sqlBY)){
	  $sqlB2=mysql_query("select Skill,SkillComment,Weightage,Target from hrm_pms_formb where FormBId=".$resBY['FormBId'], $con); 
	  $resB2=mysql_fetch_assoc($sqlB2);  ?>

	 <tr bgcolor="#FFFFFF">   

	  <td align="center" class="font1" style="width:40px;" valign="top"><?php echo $SnoB; ?>

	  <input type="hidden" name="BehaFormBId<?php echo $SnoB; ?>" value="<?php echo $resBY['BehavioralFormBId']; ?>" />

	  </td>

	  <td align="" valign="top" class="font1" style="width:250px;"><?php echo $resB2['Skill'] ?></td>

	  <td class="font1" valign="top" align="" style="width:550px;"><?php echo $resB2['SkillComment']; ?></td>

	  <td class="font1" valign="top" align="center" style="width:60px;">

	  <input type="hidden" name="BWeightageB<?php echo $SnoB; ?>" id="BWeightageB<?php echo $SnoB; ?>" value="<?php echo $resB2['Weightage'] ?>" readonly/><?php echo $resB2['Weightage'] ?></td>

	  <td class="font1" valign="top" align="center" style="width:60px;">

	  <input type="hidden" name="BTargetB<?php echo $SnoB; ?>" id="BTargetB<?php echo $SnoB; ?>" value="<?php echo $resB2['Target']; ?>" readonly/><?php echo $resB2['Target']; ?></td>

	  <td class="font1" valign="top" align="center" style="width:80px;"> <input name="BSelfRatingB<?php echo $SnoB; ?>" id="BSelfRatingB<?php echo $SnoB; ?>" style="font:Georgia; font-size:11px; width:80px; height:20px; background-color:#FFFFFF; text-align:center;" readonly value="<?php echo $resBY['SelfRating']; ?>" onChange="BEnterEmpFormB()" maxlength="5"/>

	  <input type="hidden" id="BEmpBScore<?php echo $SnoB; ?>" name="BEmpBScore<?php echo $SnoB; ?>" style="font-size:12px;width:60px; height:22px; text-align:center;" value="<?php echo $resBY['SelfFormBScore']; ?>"  readonly/>

	  </td>

	  <td class="font1" valign="top" align="" style="width:100px;"><textarea name="Comments_Example<?php echo $SnoB; ?>" id="Comments_Example<?php echo $SnoB; ?>" cols="25" rows="2" style="font:Georgia; font-size:11px; background-color:#FFFFFF;" readonly ><?php echo $resBY['Comments_Example']; ?></textarea></td>

     </tr> 

	    

	<?php $SnoB++;} $FormBRow=$SnoB-1; ?><input type="hidden" id="BSnoB" name="BSnoB" value="<?php echo $SnoB; ?>" />

	                                     <input type="hidden" name="BRow" id="BRow" value="<?php echo $FormBRow; ?>" /> 

	<?php  } if($resYNB['Emp_SkillSave']=='N') { 
	$SqlG=mysql_query("select GradeId,DepartmentId From hrm_employee_general where EmployeeID=".$EmployeeId, $con); $ResG=mysql_fetch_assoc($SqlG);
	$sqlB=mysql_query("select * from hrm_pms_formb INNER JOIN hrm_pms_formb_grade ON hrm_pms_formb.FormBId=hrm_pms_formb_grade.FormBId where hrm_pms_formb.SkillStatus='A' AND hrm_pms_formb.DepartmentId=".$ResG['DepartmentId']." AND hrm_pms_formb_grade.GradeId=".$ResG['GradeId']." order by hrm_pms_formb.FormBId ASC", $con); 

	$SnoB=1; while($resB=mysql_fetch_array($sqlB)){ ?>

 <tr bgcolor="#FFFFFF">   

	  <td align="center" class="font" style="width:30px;" valign="top"><?php echo $SnoB; ?></td>

	  <td align="" valign="top" class="font1" style="width:250px;">

	  <input type="hidden" name="FormBId<?php echo $SnoB; ?>" value="<?php echo $resB['FormBId'] ?>"/><?php echo $resB['Skill'] ?></td>

	  <td class="font1" valign="top" align="" style="width:480px;"><?php echo $resB['SkillComment']; ?></td>

	  <td class="font1" valign="top" align="center" style="width:50px;">

	  <input type="hidden" name="WeightageB<?php echo $SnoB; ?>" id="WeightageB<?php echo $SnoB; ?>" value="<?php echo $resB['Weightage'] ?>" readonly /><?php echo $resB['Weightage'] ?></td>

	  <td class="font1" valign="top" align="center" style="width:50px;">

	  <input type="hidden" name="TargetB<?php echo $SnoB; ?>" id="TargetB<?php echo $SnoB; ?>" value="<?php echo $resB['Target']; ?>" readonly/><?php echo $resB['Target']; ?></td>

	  <td class="font1" valign="top" align="center" style="width:80px;">

	  <input name="SelfRatingB<?php echo $SnoB; ?>" id="SelfRatingB<?php echo $SnoB; ?>" style="font:Georgia; font-size:11px; width:80px; height:20px; background-color:#FFFFFF; text-align:center;" value="0" onChange="EnterEmpFormB()" maxlength="5" />

	  

	  <input type="hidden" id="EmpBScore<?php echo $SnoB; ?>" name="EmpBScore<?php echo $SnoB; ?>" style="font-size:12px;width:60px; height:22px; text-align:center;" value="0"  readonly/>

	  </td>

	  <td class="font1" valign="top" align="center" style="width:100px;">

	  <textarea name="Comments_Example<?php echo $SnoB; ?>" id="Comments_Example<?php echo $SnoB; ?>" cols="25" rows="2" style="font:Georgia; font-size:11px; background-color:#FFFFFF;"></textarea>

	  </td>

 </tr>

<?php $SnoB++;} $FormBRow=$SnoB-1; ?><input type="hidden" id="SnoB" name="SnoB" value="<?php echo $SnoB; ?>" />

                                     <input type="hidden" name="FormBRow" id="FormBRow" value="<?php echo $FormBRow; ?>" /><?php } ?>

 <tr><td colspan="9" align="right">

 <?php $sqlB=mysql_query("select EmpFormBScore from hrm_employee_pms where EmpPmsId=".$resPmsId['EmpPmsId'], $con); $resB=mysql_fetch_assoc($sqlB); ?> 

 <input type="hidden" id="EmpFormBScore<?php echo $SnoB; ?>" name="EmpFinalFormBScore" style="font-family:Times New Roman;background-color:#FFFFFF; font-size:11px; width:60px; height:22px; text-align:center;" value="<?php echo $resB['EmpFormBScore']; ?>"  readonly/>

 

 &nbsp;</td></tr>

<tr><td colspan="8" style="font-family:Times New Roman;font-size:14px;color:#400000;font-weight:bold;">Please ignore special characters(#, @, ~, ', ", etc).</td></tr>
<tr><td colspan="9"><table><tr>
    <td colspan="9" align="left" style="width:100px;">
     <?php if($resYNB['Emp_SkillSave']=='N' AND $resYNB['Appraiser_PmsStatus']==0) { ?>
     <input type="Submit" name="SubmitFormB" id="SubmitFormB" style="width:145px;" value="save as draft"/>
     <input type="button" id="FormBN" style="width:90px;display:none;" value="edit" onClick="editFormBN()"/>
     <?php } ?>
     <?php if($resYNB['Emp_SkillSave']=='Y' AND $resYNB['Emp_PmsStatus']==1) { ?> 
     <input type="Submit" name="SubmitResetFormB" id="SubmitResetFormB" style="width:150px;display:none;" value="save as draft"/>
     <input type="button" id="FormBY" style="width:90px;" value="edit" onClick="editFormBY()"/>
     <?php } ?>
 </td>
 <td><?php $sqlY=mysql_query("select Emp_AchivementSave,Emp_KRASave,Emp_SkillSave,Emp_FeedBackSave,Emp_PmsStatus,Appraiser_PmsStatus from hrm_employee_pms where EmpPmsId=".$resPmsId['EmpPmsId'], $con); $resY=mysql_fetch_assoc($sqlY); if($resY['Emp_AchivementSave']=='Y' AND $resY['Emp_KRASave']=='Y' AND $resY['Emp_SkillSave']=='Y' AND $resY['Emp_FeedBackSave']=='Y' AND $resY['Emp_PmsStatus']==1 AND ($resY['Appraiser_PmsStatus']==0 OR $resY['Appraiser_PmsStatus']==3)) {?> 

				 <input type="button" name="FinalAppSubmit" id="FinalAppSubmit_4" value="final submit" style="width:100px;" onClick="FinalSubmit()"/>

				 <?php } ?>

 </td>

 </tr></table></td>

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



