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
if(isset($_POST['SubmitFormA']))
{  $n=$_POST['KRow'];  for($i=1; $i<=$n; $i++)
  { $sqlUp=mysql_query("update hrm_employee_pms_kraforma set SelfRating=".$_POST['SelfRating'.$i].", SelfKRAScore=".$_POST['EmpKRAScore'.$i].", AchivementRemark='".$_POST['SelfRatingRemark'.$i]."' where EmpPmsId=".$resPmsId['EmpPmsId']." AND KRAFormAId=".$_POST['KRAFormAId'.$i], $con); 
  } if($sqlUp)
     {	  $sqlUp=mysql_query("update hrm_employee_pms set Emp_KRASave='Y', Emp_PmsStatus=1, EmpFormAScore=".$_POST['EmpFinalFormAScore']." where EmpPmsId=".$resPmsId['EmpPmsId'], $con);
	  $msg="Data saved successfully!";
	 }
}
//***************************************************************************************************************
if($_REQUEST['action']=='submit')
{  
$sql=mysql_query("select EmpFormAScore, EmpFormBScore, FormAKraAllow_PerOfWeightage, FormBBehaviAllow_PerOfWeightage from hrm_employee_pms where EmpPmsId=".$resPmsId['EmpPmsId']." AND EmployeeID=".$EmployeeId, $con); $res=mysql_fetch_assoc($sql);
echo "select EmpFormAScore, EmpFormBScore, FormAKraAllow_PerOfWeightage, FormBBehaviAllow_PerOfWeightage from hrm_employee_pms where EmpPmsId=".$resPmsId['EmpPmsId']." AND EmployeeID=".$EmployeeId;
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

function ValidationKRA(KRAForm)

{ 

  var KRow=document.getElementById("KRow").value;

  for(var i=1; i<=KRow; i++)

   { 

     //if(document.getElementById("SelfRating"+i).value==0)

	 //{alert("please enter self rating");  return false; }

	 //if(document.getElementById("SelfRating"+i).value=="")

	 //{alert("please enter self rating");  return false; }

	 //if(document.getElementById("SelfRating"+i).value>150)

	 //{alert("Please check self rating value");  return false; }

	 var Numfilter=/^[0-9. ]+$/;  var test_num = Numfilter.test(document.getElementById("SelfRating"+i).value)

     if(test_num==false) { alert('Please Enter Only Number in the self rating Field');  return false; } 

   }

  

  var agree=confirm("Are you sure you want to save KRA form?");

  if (agree) { return true;} else {return false;}

}





function EnterEmpKra()

{ var EmpKRARow=document.getElementById("KRow").value; var Sno=document.getElementById("Sno").value; 

  var SUM = parseFloat(document.getElementById("KraSum").value); var FormAScore=parseFloat(document.getElementById("EmpFormAScore"+Sno).value);

  for(var i=1; i<=EmpKRARow; i++)

  { 

    var KRAWeight = parseFloat(document.getElementById("WeightageKRA_"+i).value); var KRATarget = parseFloat(document.getElementById("TargetKRA_"+i).value);

    var EmpKRARating = parseFloat(document.getElementById("SelfRating"+i).value); var EmpKRAScore = parseFloat(document.getElementById("EmpKRAScore"+i).value);

    var NewEmpKRAScore=document.getElementById("EmpKRAScore"+i).value=Math.round(((EmpKRARating/KRATarget)*KRAWeight)*100)/100;

	var Score=document.getElementById("KraScore"+i).value=Math.round((NewEmpKRAScore)*100)/100;

  }

 var s1= parseFloat(document.getElementById("KraScore"+1).value); var s2= parseFloat(document.getElementById("KraScore"+2).value);

 var s3= parseFloat(document.getElementById("KraScore"+3).value); var s4= parseFloat(document.getElementById("KraScore"+4).value);

 var s5= parseFloat(document.getElementById("KraScore"+5).value); var s6= parseFloat(document.getElementById("KraScore"+6).value);

 var s7= parseFloat(document.getElementById("KraScore"+7).value); var s8= parseFloat(document.getElementById("KraScore"+8).value);

 var s9= parseFloat(document.getElementById("KraScore"+9).value); var s10= parseFloat(document.getElementById("KraScore"+10).value);

 var s11= parseFloat(document.getElementById("KraScore"+11).value); var s12= parseFloat(document.getElementById("KraScore"+12).value);

 var s13= parseFloat(document.getElementById("KraScore"+13).value); var s14= parseFloat(document.getElementById("KraScore"+14).value);

 var s15= parseFloat(document.getElementById("KraScore"+15).value); var s16= parseFloat(document.getElementById("KraScore"+16).value);

 var s17= parseFloat(document.getElementById("KraScore"+17).value); var s18= parseFloat(document.getElementById("KraScore"+18).value);

 var s19= parseFloat(document.getElementById("KraScore"+19).value); var s20= parseFloat(document.getElementById("KraScore"+20).value);

 var q = document.getElementById("KraSum").value=Math.round((s1+s2+s3+s4+s5+s6+s7+s8+s9+s10+s11+s12+s13+s14+s15+s16+s17+s18+s19+s20)*100)/100; 

 document.getElementById("EmpFormAScore"+Sno).value=Math.round((q)*100)/100; 

}		











function editFormA()

{ document.getElementById("SubmitFormA").style.display='block'; document.getElementById("editSubmitFormA").style.display='none'; 

  var KRowY=document.getElementById("KRow").value; 

  for(var i=1; i<=KRowY; i++) {document.getElementById("SelfRating"+i).readOnly=false;document.getElementById("SelfRatingRemark"+i).readOnly=false;}

}







function FinalSubmit() { var agree=confirm("Are you sure you want to submit appraisal form.?");

if (agree) { var x = "EmpPmsFormA.php?action=submit";  window.location=x;}}			 



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
<?php for($i=1; $i<=20; $i++) { ?><input type="hidden" id="KraScore<?php echo $i; ?>" value="0" /><?php } ?><input type="hidden" id="KraSum" value="0"/>

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

   <td style="font-family:Times New Roman; font-size:14px; font-weight:bold;"><a href="EmpPmsFormA.php"><font color="#FFFFFF">Form A(KRA)</font></a></td>

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

   <?php /***************** Form A(KRA) **************************/ ?>

<form name="KRAForm" method="post" onSubmit="return ValidationKRA(this)">    

   <td id="FormA" style="">

	 <table border="0">

 <tr><td colspan="9" align="center" class="font" style="color:#000084; width:1150px;" valign="middle">

	  List the KRA/ Goals set for the given assessment year. Score the performance against each objective.</td></tr>

 <tr bgcolor="#EEF0AA" style="height:22px;">	   

	  <td align="center" class="font" style="width:40px;">SNo.</td>

	  <td class="font" align="center" style="width:250px;">KRA/Goals</td>

	  <td class="font" align="center" style="width:500px;">Description</td>  

	  <td class="font" align="center" style="width:60px;">Measure</td>

	  <td class="font" align="center" style="width:60px;">Unit</td>

	  <td class="font" align="center" style="width:60px;">Weightage</td>

	  <td class="font" align="center" style="width:50px;">Target</td>

	  <td class="font" align="center" style="width:60px;">Self Rating</td>

	  <td class="font" align="center" style="width:150px;">Remarks</td>

 </tr>

<?php $sqlYNK=mysql_query("select Emp_AchivementSave,Emp_KRASave,Emp_SkillSave,Emp_FeedBackSave,Emp_PmsStatus,Appraiser_PmsStatus from hrm_employee_pms where EmpPmsId=".$resPmsId['EmpPmsId'], $con); $resYNK=mysql_fetch_assoc($sqlYNK);

$sqlK=mysql_query("select * from hrm_employee_pms_kraforma INNER JOIN hrm_employee_pms ON hrm_employee_pms_kraforma.EmpPmsId=hrm_employee_pms.EmpPmsId where hrm_employee_pms.AssessmentYear=".$YearId." AND hrm_employee_pms.EmployeeID=".$EmployeeId." AND hrm_employee_pms_kraforma.KRAFormAStatus='A' order by KRAFormAId ASC", $con); 

      $Sno=1; while($resK=mysql_fetch_array($sqlK)){ 

	  $sqlK2=mysql_query("select * from hrm_pms_kra where KRAId=".$resK['KRAId'], $con); $resK2=mysql_fetch_array($sqlK2)

	  ?>	

<tr bgcolor="#FFFFFF"> 	   

	  <td align="center" class="font" style="width:40px;" valign="top"><?php echo $Sno; ?></td>

	  <td class="font1" align="" style="width:250px;" valign="top"><?php echo $resK2['KRA'];?></td>

	  <td class="font1" align="" style="width:500px;" valign="top"><?php echo $resK2['KRA_Description'];?></td>  

	  <td class="font1" align="center" style="width:60px;" valign="top"><?php echo $resK2['Measure'];?></td>

	  <td class="font1" align="center" style="width:60px;" valign="top"><?php echo $resK2['Unit'];?></td>

	  <td class="font1" align="center" style="width:60px;" valign="top">

<input type="hidden" id="WeightageKRA_<?php echo $Sno; ?>"  value="<?php echo $resK['Weightage']; ?>" /><?php echo $resK['Weightage'];?></td>

	  <td class="font1" align="center" style="width:50px;" valign="top">

<input type="hidden" id="TargetKRA_<?php echo $Sno; ?>"  value="<?php echo $resK['Target']; ?>" /><?php echo $resK['Target'];?></td>

	  <td class="font1" align="center" style="width:60px;" valign="top"><input name="SelfRating<?php echo $Sno; ?>" id="SelfRating<?php echo $Sno; ?>" style="font:Georgia; font-size:11px; width:60px; height:20px; background-color:#FFFFFF; text-align:center;" value="<?php if($resYNK['Emp_KRASave']=='Y'){ echo $resK['SelfRating']; } if($resYNK['Emp_KRASave']=='N'){ echo '0'; }?>" onChange="EnterEmpKra()" maxlength="5" <?php if($resYNK['Emp_KRASave']=='Y'){echo 'readonly';} ?> />

<input type="hidden" id="EmpKRAScore<?php echo $Sno; ?>" name="EmpKRAScore<?php echo $Sno; ?>" style="font-size:12px;width:60px; height:22px; text-align:center;" value="<?php echo $resK['SelfKRAScore']; ?>"  readonly/></td>



	  <td class="font" align="" style="width:80px;" valign="top">

	  <textarea name="SelfRatingRemark<?php echo $Sno; ?>" id="SelfRatingRemark<?php echo $Sno; ?>" cols="25" rows="2" <?php if($resYNK['Emp_KRASave']=='Y'){echo 'readonly';} ?> style="font:Georgia; font-size:11px; background-color:#FFFFFF;"><?php echo $resK['AchivementRemark'];?></textarea>

	  <input type="hidden" name="KRAFormAId<?php echo $Sno; ?>" value="<?php echo $resK['KRAFormAId']; ?>" />

	 </td>

 </tr>

 <?php $Sno++;} $Krow=$Sno-1; ?> <input type="hidden" id="Sno" name="Sno" value="<?php echo $Sno; ?>" />

                                 <input type="hidden" name="KRow" id="KRow" value="<?php echo $Krow; ?>" />	  

 <tr><td colspan="9" align="right">

<?php $sqlA=mysql_query("select EmpFormAScore from hrm_employee_pms where EmpPmsId=".$resPmsId['EmpPmsId'], $con); $resA=mysql_fetch_assoc($sqlA); ?> 

 <input type="hidden" id="EmpFormAScore<?php echo $Sno; ?>" name="EmpFinalFormAScore" style="font-family:Times New Roman;background-color:#FFFFFF; font-size:11px; width:60px; height:22px; text-align:center;" value="<?php echo $resA['EmpFormAScore']; ?>"  readonly/>

 

 &nbsp;</td></tr>
 <tr><td colspan="8" style="font-family:Times New Roman;font-size:14px;color:#400000;font-weight:bold;">Please ignore special characters(#, @, ~, ', ", etc).</td></tr>
 <tr><td colspan="9" ><table><tr>
     <td align="left" style="width:100px;">
     <?php if($resYNK['Emp_KRASave']=='N' AND $resYNK['Appraiser_PmsStatus']==0) { ?>
     <input type="Submit" name="SubmitFormA" id="SubmitFormA" style="width:145px;" value="save as draft"/>
     <input type="button" id="editSubmitFormA" style="width:90px;display:none;" value="edit" onClick="editFormA()"/>
     <?php } ?>
     <?php if($resYNK['Emp_KRASave']=='Y' AND $resYNK['Emp_PmsStatus']==1) { ?>
     <input type="Submit" name="SubmitFormA" id="SubmitFormA" style="width:150px; display:none;" value="save as draft"/>
     <input type="button" id="editSubmitFormA" style="width:90px;" value="edit" onClick="editFormA()"/>
     <?php } ?>
    </td>
	<td><?php $sqlY=mysql_query("select Emp_AchivementSave,Emp_KRASave,Emp_SkillSave,Emp_FeedBackSave,Emp_PmsStatus,Appraiser_PmsStatus from hrm_employee_pms where EmpPmsId=".$resPmsId['EmpPmsId'], $con); $resY=mysql_fetch_assoc($sqlY); if($resY['Emp_AchivementSave']=='Y' AND $resY['Emp_KRASave']=='Y' AND $resY['Emp_SkillSave']=='Y' AND $resY['Emp_FeedBackSave']=='Y' AND $resY['Emp_PmsStatus']==1 AND ($resY['Appraiser_PmsStatus']==0 OR $resY['Appraiser_PmsStatus']==3)) {?> 

				 <input type="button" name="FinalAppSubmit" id="FinalAppSubmit_4" value="final submit" style="width:100px;" onClick="FinalSubmit()"/>

				 <?php } ?>

	</td>

	 </tr></table></td>		 

	</tr>

<tr>

 <td colspan="10" style="display:none;">

<?php /* if($resY['Emp_PmsStatus']==2) {?> 

    <table border="0">

	  <tr><td colspan="10" style="font-family:Times New Roman; font-size:18px; width:750px; font-weight:bold;color:#00468C;" align="left">(<i>Your PMS Score</i>)&nbsp;</td></tr>

	  <tr bgcolor="#7a6189" style="height:20px; ">

	   <td style="font-family:Times New Roman;color:#FFFFFF; font-size:12px; width:100px; font-weight:bold;" align="center">KRA Form</td>

	   <td style="font-family:Times New Roman;color:#FFFFFF; font-size:12px; width:100px; font-weight:bold;" align="center">(%) Weigthage</td>

	   <td style="font-family:Times New Roman;color:#FFFFFF; font-size:12px; width:100px; font-weight:bold;" align="center">(A) KRA Score</td>

	   <td style="font-family:Times New Roman;color:#FFFFFF; font-size:12px; width:100px; font-weight:bold;" align="center">Behavioral Form </td>

	   <td style="font-family:Times New Roman;color:#FFFFFF; font-size:12px; width:100px; font-weight:bold;" align="center">(%) Weigthage</td>

	   <td style="font-family:Times New Roman;color:#FFFFFF; font-size:12px; width:150px; font-weight:bold;" align="center">(B) Behavioral Score</td>

	   <td style="font-family:Times New Roman;color:#FFFFFF; font-size:12px; width:100px; font-weight:bold;" align="center">PMS Score (A+B)</td>

	  </tr>

<?php

$sqlApp=mysql_query("select EmpPmsId, FormAKraAllow_PerOfWeightage, FormBBehaviAllow_PerOfWeightage, EmpFormAScore, EmpFormBScore, EmpFinallyFormA_Score, EmpFinallyFormB_Score, Emp_TotalFinalScore from hrm_employee_pms where EmpPmsId=".$resPmsId['EmpPmsId']); $resApp=mysql_fetch_array($sqlApp);

?>	 

	  <tr bgcolor="#FFFFFF" style="height:20px; ">

	   <td style="font-family:Times New Roman; font-size:12px; width:70px;" align="center"><?php echo $resApp['EmpFormAScore']; ?></td>

	   <td style="font-family:Times New Roman; font-size:12px; width:100px;" align="center"><?php echo $resApp['FormAKraAllow_PerOfWeightage']; ?></td>

	   <td style="font-family:Times New Roman; font-size:12px; width:80px;background-color:#FFE8DD;" align="center"><?php echo $resApp['EmpFinallyFormA_Score']; ?></td>

	   <td style="font-family:Times New Roman; font-size:12px; width:70px; " align="center"><?php echo $resApp['EmpFormBScore']; ?></td>

	   <td style="font-family:Times New Roman; font-size:12px; width:100px;" align="center"><?php echo $resApp['FormBBehaviAllow_PerOfWeightage']; ?></td>

	   <td style="font-family:Times New Roman; font-size:12px; width:80px;background-color:#FFE8DD; " align="center"><?php echo $resApp['EmpFinallyFormB_Score']; ?></td>

	   <td style="font-family:Times New Roman; font-size:12px; width:100px;background-color:#F7FCD6;font-weight:bold;" align="center"><?php echo $resApp['Emp_TotalFinalScore']; ?></td>

	  </tr>

   </table>

<?php } */ ?>   

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



