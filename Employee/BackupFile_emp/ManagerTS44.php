<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
/******************************************************************************/
if(isset($_POST['SaveScore']))
{
  for($i=1; $i<=$_POST['EmpKraRow']; $i++)
  { $sqlUpK=mysql_query("update hrm_employee_pms_kraforma set AppraiserRating=".$_POST['AppKRARating'.$i].", AppraiserScore=".$_POST['AppKRAScore'.$i]." where KRAFormAId=".$_POST['KRAFormAId_'.$i], $con);  }
  for($j=1; $j<=$_POST['EmpFormBRow']; $j++)
  { $sqlUpB=mysql_query("update hrm_employee_pms_behavioralformb set AppraiserRating=".$_POST['AppFormBRating'.$j].", AppraiserScore=".$_POST['AppFormBScore'.$j]." where BehavioralFormBId=".$_POST['FormBId_'.$j], $con);  }
  $sqlRat=mysql_query("select ScoreFrom,ScoreTo,Rating from hrm_pms_rating where CompanyId=".$_POST['ComId'], $con); while($resRat=mysql_fetch_array($sqlRat))
  { if($_POST['TotalScore_12']>=$resRat['ScoreFrom'] AND $_POST['TotalScore_12']<=$resRat['ScoreTo']) {$App_Rating=$resRat['Rating'];}} 

  $NoK=$_POST['Sno']; $NoB=$_POST['SnoB'];

  $search =  '!"#$%&/=?*+\'-;:_' ;
  $search = str_split($search);
  $str_Remark = $_POST['AppRemarks'];  
  $str_S1 = $_POST['AppSoftSkill_1']; $str_S2 = $_POST['AppSoftSkill_2']; 
  $str_T1 = $_POST['AppTechSkill_1']; $str_T2 = $_POST['AppTechSkill_2'];
  $str_Jus = $_POST['Justification'];
  $AppRemark=str_replace($search, "", $str_Remark);
  $S1=str_replace($search, "", $str_S1); $S2=str_replace($search, "", $str_S2); 
  $T1=str_replace($search, "", $str_T1); $T2=str_replace($search, "", $str_T2);
  $AppJus=str_replace($search, "", $str_Jus);

  $sqlUpPms=mysql_query("update hrm_employee_pms set Appraiser_Remark='".$AppRemark."', Appraiser_PmsStatus=1, Appraiser_SubmitedDate='".date("Y-m-d")."', AppraiserFormAScore=".$_POST['AppFormAScore'.$NoK].", AppraiserFormBScore=".$_POST['AppBehaviFormBScore'.$NoB].", AppraiserFinallyFormA_Score=".$_POST['Score_1'].", AppraiserFinallyFormB_Score=".$_POST['Score_2'].", Appraiser_TotalFinalScore=".$_POST['TotalScore_12'].", Appraiser_TotalFinalRating=".$App_Rating.", Dummy_AppRating=".$App_Rating.", Appraiser_EmpDesignation=".$_POST['DesigId'].", Appraiser_EmpGrade=".$_POST['GradeId'].", Appraiser_SoftSkill_1='".$S1."', Appraiser_SoftSkill_2='".$S2."', Appraiser_TechSkill_1='".$T1."', Appraiser_TechSkill_2='".$T2."', Appraiser_Justification='".$AppJus."' where EmpPmsId=".$_POST['PmsId']." AND EmployeeID=".$_POST['EmpId'], $con);
   if($sqlUpPms){$msg = 'Form saved successfully!';}
}
if(isset($_POST['SubmitScore']))
{
for($i=1; $i<=$_POST['EmpKraRow']; $i++)
  { $sqlUpK=mysql_query("update hrm_employee_pms_kraforma set AppraiserRating=".$_POST['AppKRARating'.$i].", AppraiserScore=".$_POST['AppKRAScore'.$i]." where KRAFormAId=".$_POST['KRAFormAId_'.$i], $con);  }
  for($j=1; $j<=$_POST['EmpFormBRow']; $j++)
  { $sqlUpB=mysql_query("update hrm_employee_pms_behavioralformb set AppraiserRating=".$_POST['AppFormBRating'.$j].", AppraiserScore=".$_POST['AppFormBScore'.$j]." where BehavioralFormBId=".$_POST['FormBId_'.$j], $con);  }
  $sqlRat=mysql_query("select ScoreFrom,ScoreTo,Rating from hrm_pms_rating where YearId=".$YearId." AND CompanyId=".$_POST['ComId'], $con); while($resRat=mysql_fetch_array($sqlRat))
  { if($_POST['TotalScore_12']>=$resRat['ScoreFrom'] AND $_POST['TotalScore_12']<=$resRat['ScoreTo']) {$App_Rating=$resRat['Rating'];}} 

  $NoK=$_POST['Sno']; $NoB=$_POST['SnoB'];

  $search =  '!"#$%&/=?*+\'-;:_' ;
  $search = str_split($search);
  $str_Remark = $_POST['AppRemarks'];  
  $str_S1 = $_POST['AppSoftSkill_1']; $str_S2 = $_POST['AppSoftSkill_2']; 
  $str_T1 = $_POST['AppTechSkill_1']; $str_T2 = $_POST['AppTechSkill_2'];
  $str_Jus = $_POST['Justification'];
  $AppRemark=str_replace($search, "", $str_Remark);
  $S1=str_replace($search, "", $str_S1); $S2=str_replace($search, "", $str_S2); 
  $T1=str_replace($search, "", $str_T1); $T2=str_replace($search, "", $str_T2);
  $AppJus=str_replace($search, "", $str_Jus);

  $sqlUpPms=mysql_query("update hrm_employee_pms set Appraiser_Remark='".$AppRemark."', Appraiser_PmsStatus=2, Appraiser_SubmitedDate='".date("Y-m-d")."', AppraiserFormAScore=".$_POST['AppFormAScore'.$NoK].", AppraiserFormBScore=".$_POST['AppBehaviFormBScore'.$NoB].", AppraiserFinallyFormA_Score=".$_POST['Score_1'].", AppraiserFinallyFormB_Score=".$_POST['Score_2'].", Appraiser_TotalFinalScore=".$_POST['TotalScore_12'].", Appraiser_TotalFinalRating=".$App_Rating.", Dummy_AppRating=".$App_Rating.", Appraiser_EmpDesignation=".$_POST['DesigId'].", Appraiser_EmpGrade=".$_POST['GradeId'].", Appraiser_SoftSkill_1='".$S1."', Appraiser_SoftSkill_2='".$S2."', Appraiser_TechSkill_1='".$T1."', Appraiser_TechSkill_2='".$T2."', Appraiser_Justification='".$AppJus."' where EmpPmsId=".$_POST['PmsId']." AND EmployeeID=".$_POST['EmpId'], $con);
   if($sqlUpPms){$msg = 'Form submitted successfully!';}
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
<style>.font {color:#000; font-family:Times New Roman; font-size:15px; font-weight:bold;} 
.Input{font-family:"Times New Roman", Times, serif; font-size:14px; height:22px;border-style:hidden; border-bottom-color:#FFFFFF; border-left-color:#FFFFFF; border-right-color:#FFFFFF; border-top-color:#FFFFFF; border:0;}.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;} .font1 { font-family:Georgia; font-size:11px; height:14px; } .font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function EnterAppKra(v,n)
{ var AppKRARow=document.getElementById("EmpKraRow").value; var Sno=document.getElementById("Sno").value; 
  var SUM = parseFloat(document.getElementById("KraSum").value); var FormAScore=parseFloat(document.getElementById("AppFormAScore"+Sno).value);
  var Weight_A=parseFloat(document.getElementById("weight_A").value); var Score_1=parseFloat(document.getElementById("Score_1").value);
  var Score_2=parseFloat(document.getElementById("Score_2").value);
  for(var i=1; i<=AppKRARow; i++)
  { 
    var KRAWeight = parseFloat(document.getElementById("WeightageKRA_"+i).value); var KRATarget = parseFloat(document.getElementById("TargetKRA_"+i).value);
    var AppKRARating = parseFloat(document.getElementById("AppKRARating"+i).value); var AppKRAScore = parseFloat(document.getElementById("AppKRAScore"+i).value);
    var NewAppKRAScore=document.getElementById("AppKRAScore"+i).value=Math.round(((AppKRARating/KRATarget)*KRAWeight)*100)/100;
    var Score=document.getElementById("KraScore"+i).value=Math.round((NewAppKRAScore)*100)/100;	
  }
 var AppKRARatingS = document.getElementById("AppKRARating"+n).value; var NewAppKRAScoreS = document.getElementById("AppKRAScore"+n).value;
 //var url = 'SetEmpKRAScoreK.php';	var pars = 'KId='+v+'&KRat='+AppKRARatingS+'&KSco='+NewAppKRAScoreS;
 //var myAjax = new Ajax.Request( url,  { method: 'post', parameters: pars,  onComplete: show_MsgKRA});
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
 document.getElementById("AppFormAScore"+Sno).value=Math.round((q)*100)/100; 
 var FormA=document.getElementById("FormAScore").value=Math.round((q)*100)/100;
 var Score1=document.getElementById("Score_1").value=Math.round(((FormA*Weight_A)/100)*100)/100;
 var Score12=document.getElementById("TotalScore_12").value=Math.round((Score1+Score_2)*100)/100;

 var Rating12=parseFloat(document.getElementById("TotalRating_12").value);
 var Num = parseFloat(document.getElementById("Number").value);
 for(var i=1; i<=Num; i++) 
  { SFrom = parseFloat(document.getElementById("SFrom_"+i).value); STo = parseFloat(document.getElementById("STo_"+i).value); 
    Rating = parseFloat(document.getElementById("Rating_"+i).value); 
	if(Score12>=SFrom && Score12<=STo){document.getElementById("TotalRating_12").value=Rating;} 
  } 


}		

function EnterAppFormB(v,n)
{ var EmpFormBRow=document.getElementById("EmpFormBRow").value; var SnoB=document.getElementById("SnoB").value;  
  var SUM = parseFloat(document.getElementById("FormBSum").value);  var FormBScore=parseFloat(document.getElementById("AppBehaviFormBScore"+SnoB).value); 
  var Weight_B=parseFloat(document.getElementById("weight_B").value); var Score_1=parseFloat(document.getElementById("Score_1").value);
  var Score_2=parseFloat(document.getElementById("Score_2").value);
  for(var i=1; i<=EmpFormBRow; i++)
 { 
  var FormBWeight = parseFloat(document.getElementById("WeightageFormB_"+i).value); var FormBTarget = parseFloat(document.getElementById("TargetFormB_"+i).value);
  var AppFormBRating = parseFloat(document.getElementById("AppFormBRating"+i).value); var AppFormBScore = parseFloat(document.getElementById("AppFormBScore"+i).value);
  var NewAppFormBScore=document.getElementById("AppFormBScore"+i).value=Math.round(((AppFormBRating/FormBTarget)*FormBWeight)*100)/100;
  var Score=document.getElementById("FormBScore"+i).value=Math.round((NewAppFormBScore)*100)/100;
 } 

 var AppFormBRatingS = document.getElementById("AppFormBRating"+n).value; var AppFormBScoreS = document.getElementById("AppFormBScore"+n).value;
 //var url = 'SetEmpKRAScoreB.php';	var pars = 'BId='+v+'&BRat='+AppFormBRatingS+'&BSco='+AppFormBScoreS;	
 //var myAjax = new Ajax.Request(	 url,  { method: 'post', parameters: pars }); 
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
 document.getElementById("AppBehaviFormBScore"+SnoB).value=Math.round((P)*100)/100; 
 var FormB=document.getElementById("FormBScore").value=Math.round((P)*100)/100; 
 var Score2=document.getElementById("Score_2").value=Math.round(((FormB*Weight_B)/100)*100)/100;
 var Score12=document.getElementById("TotalScore_12").value=Math.round((Score_1+Score2)*100)/100;

 var Rating12=parseFloat(document.getElementById("TotalRating_12").value);
 var Num = parseFloat(document.getElementById("Number").value);
 for(var i=1; i<=Num; i++) 
  { SFrom = parseFloat(document.getElementById("SFrom_"+i).value); STo = parseFloat(document.getElementById("STo_"+i).value); 
    Rating = parseFloat(document.getElementById("Rating_"+i).value); 
	if(Score12>=SFrom && Score12<=STo){document.getElementById("TotalRating_12").value=Rating;} 
  } 
}		

function Validation()
{ var EmpDesig=document.getElementById("EmpDesig").value; var EmpGrade=document.getElementById("EmpGrade").value; var AppRemark=document.getElementById("AppRemarks").value;
  var DesigId=document.getElementById("DesigId").value; var GradeId=document.getElementById("GradeId").value;
  var Justification=document.getElementById("Justification").value; 
  if (EmpDesig!=DesigId && Justification.length === 0) { alert("Please type Justification !");  return false; }
  if (EmpGrade!=GradeId && Justification.length === 0) { alert("Please type Justification !");  return false; }
  if (AppRemark.length === 0) { alert("Appraiser remark field can't be blank.");  return false; }
}

/*		
function AppScore(PmsId,EId,YId)
{ var AppKRARow=document.getElementById("EmpKraRow").value; var AppFormBRow=document.getElementById("EmpFormBRow").value; 
  var Sno=document.getElementById("Sno").value; var SnoB=document.getElementById("SnoB").value; var ComId=document.getElementById("ComId").value;
  var AppRemark=document.getElementById("AppRemarks").value; var AppFormAScore=document.getElementById("AppFormAScore"+Sno).value;
  var AppFormBScore=document.getElementById("AppBehaviFormBScore"+SnoB).value; var Score_1=document.getElementById("Score_1").value; 
  var Score_2=document.getElementById("Score_2").value; var TotalScore_12=document.getElementById("TotalScore_12").value; 
  var EmpDesig=document.getElementById("EmpDesig").value; var EmpGrade=document.getElementById("EmpGrade").value;
  var DesigId=document.getElementById("DesigId").value; var GradeId=document.getElementById("GradeId").value;
  var Justification=document.getElementById("Justification").value; 
  if (EmpDesig!=DesigId && Justification.length === 0) { alert("Please type Justification !");  return false; }
  if (EmpGrade!=GradeId && Justification.length === 0) { alert("Please type Justification !");  return false; }
  if (AppRemark.length === 0) { alert("Appraiser remark field can't be blank.");  return false; }
  var url = 'SetEmpKRAScore.php';	var pars = 'P='+PmsId+'&E='+EId+'&Y='+YId+'&AScoPms='+AppFormAScore+'&BScoPms='+AppFormBScore+'&AppRem='+AppRemark+'&S1='+Score_1+'&S2='+Score_2+'&TotS1S2='+TotalScore_12+'&ComId='+ComId+'&DesigId='+DesigId+'&GradeId='+GradeId+'&Justi='+Justification;	
  var myAjax = new Ajax.Request(	 url,  { method: 'post', parameters: pars,  onComplete: show_EnterAppKra }); 
}

function show_EnterAppKra(originalRequest)
{ document.getElementById('MsgSpan').innerHTML = originalRequest.responseText; document.getElementById('MsgSpan2').innerHTML = originalRequest.responseText;}

function AppScore2(PmsId,EId,YId)
{  
  var AppKRARow=document.getElementById("EmpKraRow").value; var AppFormBRow=document.getElementById("EmpFormBRow").value; 
  var Sno=document.getElementById("Sno").value; var SnoB=document.getElementById("SnoB").value; var ComId=document.getElementById("ComId").value;
  var AppRemark=document.getElementById("AppRemarks").value; var AppFormAScore=document.getElementById("AppFormAScore"+Sno).value;
  var AppFormBScore=document.getElementById("AppBehaviFormBScore"+SnoB).value; var Score_1=document.getElementById("Score_1").value; 
  var Score_2=document.getElementById("Score_2").value; var TotalScore_12=document.getElementById("TotalScore_12").value;
  var EmpDesig=document.getElementById("EmpDesig").value; var EmpGrade=document.getElementById("EmpGrade").value;
  var DesigId=document.getElementById("DesigId").value; var GradeId=document.getElementById("GradeId").value;
  var Justification=document.getElementById("Justification").value;
  if (EmpDesig!=DesigId && Justification.length === 0) { alert("Please type Justification !");  return false; }
  if (EmpGrade!=GradeId && Justification.length === 0) { alert("Please type Justification !");  return false; }
  if (AppRemark.length === 0) { alert("Appraiser remark field can't be blank.");  return false; }
  var agree=confirm("Are you sure you want to submit record?");
  if (agree) 
  { 
  var url = 'SetEmpKRAScore.php';	var pars = 'P2='+PmsId+'&E2='+EId+'&Y2='+YId+'&AScoPms2='+AppFormAScore+'&BScoPms2='+AppFormBScore+'&AppRem2='+AppRemark+'&S1='+Score_1+'&S2='+Score_2+'&TotS1S2='+TotalScore_12+'&ComId='+ComId+'&DesigId='+DesigId+'&GradeId='+GradeId+'&Justi='+Justification;	
  var myAjax = new Ajax.Request(	 url,  { method: 'post', parameters: pars,  onComplete: show_EnterAppKra2 }); 
  return true;} else {return false;}
}

function show_EnterAppKra2(originalRequest)
{ document.getElementById('MsgSpan').innerHTML = originalRequest.responseText; document.getElementById('MsgSpan2').innerHTML = originalRequest.responseText;}
*/
</script>
<SCRIPT>
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
<?php for($i=1; $i<=20; $i++) { ?><input type="hidden" id="KraScore<?php echo $i; ?>" value="0" /><?php } ?><input type="hidden" id="KraSum" value="0"/>
<?php for($j=1; $j<=20; $j++) { ?><input type="hidden" id="FormBScore<?php echo $j; ?>" value="0" /><?php } ?><input type="hidden" id="FormBSum" value="0"/>
<?php $sqlRat=mysql_query("select ScoreFrom,ScoreTo,Rating from hrm_pms_rating where RatingStatus='A' AND YearId=".$YearId." AND CompanyId=".$CompanyId, $con); 
$Sn=1; while($resRat=mysql_fetch_array($sqlRat)) {  ?>
<input type="hidden" id="SFrom_<?php echo $Sn; ?>" value="<?php echo $resRat['ScoreFrom']; ?>" />
<input type="hidden" id="STo_<?php echo $Sn; ?>" value="<?php echo $resRat['ScoreTo']; ?>" />
<input type="hidden" id="Rating_<?php echo $Sn; ?>" value="<?php echo $resRat['Rating']; ?>" />
<?php $Sn++; } $n=$Sn-1; ?><input type="hidden" id="Number" value="<?php echo $n; ?>" />	
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
			     <td id="Anni" valign="top">&nbsp;</td>
				 <td width="1200" valign="top">
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
		 <td align="center"><a href="pms.php?log=<?php echo $_SESSION['logCheckEmp']; ?>"><img id="Img_emp1" style="display:block;" src="images/emp1.png" border="0"/></a>
		   <img id="Img_emp" style="display:none;" src="images/emp.png" border="0"/></td>
        <?php }?>   
<?php $sqlApp=mysql_query("select Appraiser_EmployeeID from hrm_employee_pms where AssessmentYear=".$YearId." AND Appraiser_EmployeeID=".$EmployeeId, $con); $rowApp=mysql_num_rows($sqlApp); 
      if($rowApp>0) { ?>	
		 <td align="center"><a href="ManagerPms.php"><img id="Img_manager1" style="display:none;" src="images/manager1.png" border="0"/></a>
		   <img id="Img_manager" style="display:block;" src="images/manager.png" border="0"/></td>
<?php }  $sqlRev=mysql_query("select Reviewer_EmployeeID from hrm_employee_pms where AssessmentYear=".$YearId." AND Reviewer_EmployeeID=".$EmployeeId, $con); $rowRev=mysql_num_rows($sqlRev); 
      if($rowRev>0) { ?>
		 <td align="center"><a href="HodPms.php"><img id="Img_hod1" style="display:block;" src="images/hod1.png" border="0"/></a>
		   <img id="Img_hod" style="display:none;" src="images/hod.png" border="0"/></td>
<?php }  $sqlHod=mysql_query("select HOD_EmployeeID from hrm_employee_pms where AssessmentYear=".$YearId." AND HOD_EmployeeID=".$EmployeeId, $con); $rowHod=mysql_num_rows($sqlHod); 
      if($rowHod>0) { ?>
		 <td align="center"><a href="RevHodPms.php"><img id="Img_hod1" style="display:block;" src="images/RevHod1.png" border="0"/></a>
		   <img id="Img_hod" style="display:none;" src="images/RevHod.png" border="0"/></td>			     
<?php  } ?>	
         <td style="width:50px;">&nbsp;</td>
		 <td style="width:300px;"><font color="#014E05" style='font-family:Times New Roman;' size="4"><b><i><span id="MsgSpan"></span></i><?php echo $msg; ?></b></font></td>	   
	  </table>
	</td>
   </tr>

<?php $sqlKey=mysql_query("select * from hrm_pms_key where Person='app' AND CompanyId=".$CompanyId, $con); $resKey=mysql_fetch_assoc($sqlKey);  ?>
    <tr>



    <td width="1200">



	  <table>



	    <tr>



		 <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold; width:80px;">
		 <a href="Indexpms.php?log=<?php echo $_SESSION['logCheckEmp']; ?>"><img src="images/Home.png" border="0" /></a></td>    
		 <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:80px;">
		 <a href="ManagerPms.php"><a href="ManagerPms.php"><img src="images/MyTeam1.png" border="0" /></a></td>    			   
		 <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:80px;">
<?php $sqlCh = mysql_query("select * from hrm_pms_allow where Appraiser_EmployeeID=".$EmployeeId." AND CompanyId=".$CompanyId." AND AssesmentYear=".$YearId, $con); 
	  $sqlCh2  = mysql_query("select EmpPmsId from hrm_employee_pms where Appraiser_PmsStatus=1 AND Reviewer_PmsStatus=3 AND Appraiser_EmployeeID=".$EmployeeId." AND CompanyId=".$CompanyId." AND AssessmentYear=".$YearId, $con); $rowCh=mysql_num_rows($sqlCh); $rowCh2=mysql_num_rows($sqlCh2);
	  if(($CuDate>=$resSch['AppFromDate'] AND $CuDate<=$resSch['AppToDate'] AND $resSch['AppDateStatus']=='A') OR $rowCh>0 OR ($CuDate>$resSch['AppToDate'] AND $rowCh2>0)) { ?> 
         <a href="ManagerTeamStatus.php?action=teamS"><img src="images/TeamStatus1.png" border="0" /></a><?php } ?></td>  			       
         <?php if($resKey['RatingGraph']=='Y') { ?><td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:80px;">
         <a href="ManagerRatingGraph.php"><img src="images/ratinggraph1.png" border="0" /></a></td><?php } ?> 


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



		   		   <table border="0">   



 <tr>



   <td style="width:1150px;">



     <table border="0">



	  <tr>



	  <?php //************************************************ Start ******************************// ?>



	   <td style="width:1150px;" id="EmpkraStatus" style="display:block;">



<?php if(isset($_REQUEST['Id']) && $_REQUEST['Id']!=""){ $Id = $_REQUEST['Id']; $Eid = $_REQUEST['Eid']; $YearId = $_REQUEST['Yid'];



$sqlApp=mysql_query("select EmpPmsId, AppraiserFormAScore, AppraiserFormBScore, Appraiser_Remark, Appraiser_PmsStatus, EmpFormAScore, EmpFormBScore, FormAKraAllow_PerOfWeightage, FormBBehaviAllow_PerOfWeightage, EmpFinallyFormA_Score, EmpFinallyFormB_Score, Emp_TotalFinalScore, AppraiserFinallyFormA_Score, AppraiserFinallyFormA_Score, AppraiserFinallyFormB_Score, Appraiser_TotalFinalScore, Appraiser_TotalFinalRating, Appraiser_EmpDesignation, Appraiser_EmpGrade, Appraiser_SoftSkill_1, Appraiser_SoftSkill_2, Appraiser_TechSkill_1, Appraiser_TechSkill_2, Appraiser_Justification from hrm_employee_pms where AssessmentYear=".$YearId." AND EmployeeID=".$Eid, $con); $resApp=mysql_fetch_array($sqlApp);



$sqlEmp=mysql_query("select * from hrm_employee where EmployeeID=".$Eid, $con); $resEmp=mysql_fetch_array($sqlEmp); ?> 



<table border="0">







<tr><td style="font-family:Times New Roman; font-size:15px; font-weight:bold; width:900px;" align="center">





 EmpCode :



 <font color="#EFFA1B"><?php echo $resEmp['EmpCode'].'</font> &nbsp;/&nbsp;Name : <font color="#EFFA1B">'.$resEmp['Fname'].' '.$resEmp['Sname'].' '.$resEmp['Lname']; ?></font>



    </td>



</tr>



<tr><td style="width:1100px;font-family:Georgia; font-size:13px;font-weight:bold; color:#0067CE;">&nbsp; (Achievement)</td></tr>



<tr>



 <td id="Achivement">



   <table>



<?php $sqlAc=mysql_query("select * from hrm_employee_pms_achivement where EmpPmsId=".$resApp['EmpPmsId']." order by AchivementId ASC", $con);  



      $Sno=1; while($resAc=mysql_fetch_array($sqlAc)){?>   



    <tr bgcolor="#FFFFFF">	   



     <td bgcolor="#7a6189" align="center" style="width:30px; font-size:11px;height:20px;" valign="top"><?php echo $Sno; ?></td>	  



	  <td align="" style="width:1069px;font-size:11px;height:20px;">&nbsp;<?php echo $resAc['Achivement']; ?></td>  



    </tr>



<?php $Sno++;} ?>



   </table>



   </td>



<tr><td>&nbsp;</td></tr>



<tr><td style="width:1100px;font-family:Georgia; font-size:13px;font-weight:bold; color:#0067CE;">&nbsp; (Feedback)</td></tr>



<tr>



 <td id="Achivement">



   <table>



<?php $sqlW=mysql_query("select * from hrm_employee_pms_workenvironment where EmpPmsId=".$resApp['EmpPmsId']." order by EmpWorkEnvId ASC", $con);  



      $SnoB=1; while($resW=mysql_fetch_array($sqlW)){?>   



    <tr>



	 <td style="width:1100px;">



	  <table>



	  <tr>   



      <td bgcolor="#7a6189" align="center" style="width:30px; font-size:11px;" valign="top"><?php echo $SnoB; ?></td>	  



	  <td bgcolor="#7a6189" align="" style="width:1080px;font-size:11px; height:20px; color:#FFFFFF;">&nbsp;<?php echo $resW['WorkEnvironment']; ?></td> 



	  </tr>



	   <tr>   



      <td bgcolor="#7a6189" align="center" style="width:30px; font-size:11px;" valign="top">Ans.</td>	  



	  <td bgcolor="#FFFFFF" align="" style="width:1080px;font-size:11px;height:20px;" valign="top">&nbsp;<?php echo $resW['Answer']; ?></td> 



	  </tr>



	  </table></td>	 



    </tr>



<?php $SnoB++;} ?>



<tr><td>&nbsp;</td></tr>



   



 <tr>



    <td>



    <table>



	  <tr>



 <td style="font-family:Georgia; font-size:13px; width:1150px; font-weight:bold;color:#0067CE;" align="left"> (Form A(KRA):)&nbsp;</td>



	</tr>



  </table>



 </td>



 </tr>



 <tr>

<form name="AppraisalForm" method="post" onSubmit="return Validation(this)">

  <td style="width:1150px;">

  <input type="hidden" id="ComId" name="ComId" value="<?php echo $CompanyId; ?>" />	

  <input type="hidden" id="PmsId" name="PmsId" value="<?php echo $resApp['EmpPmsId']; ?>" />

  <input type="hidden" id="EmpId" name="EmpId" value="<?php echo $Eid; ?>" />

    <table>



	  <tr bgcolor="#7a6189" style="height:20px;" valign="middle">



	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:30px;"><b>SNo.</b></td>



	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:330px;"><b>KRA</b></td>
	
	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:500px;"><b>Descriptions</b></td>



	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:100px;"><b>Measure</b></td>



	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:60px;"><b>Unit</b></td>



	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:80px;"><b>Weightage</b></td>



	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:60px;"><b>Target</b></td>	



	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:80px;"><b>Self Ass.</b></td>



	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:200px;"><b>Remark</b></td>



	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:80px;"><b>Appraiser Ass.</b></td>



	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:60px;"><b>Score</b></td>



 </tr>



<?php $sql2=mysql_query("select * from hrm_employee_pms_kraforma where KRAFormAStatus='A' AND EmpPmsId=".$resApp['EmpPmsId']." order by KRAFormAId ASC", $con);



	  $Sno=1; while($res2=mysql_fetch_array($sql2)) { 



	  $sqlK2=mysql_query("select * from hrm_pms_kra where KRAId=".$res2['KRAId'], $con); $resK2=mysql_fetch_array($sqlK2)?>		 



<tr bgcolor="#FFFFFF" style="height:20px;" valign="middle">



<td align="center" style="font-family:Times New Roman; font-size:12px;" valign="top"><?php echo $Sno; ?>



<input type="hidden" id="KRAFormAId_<?php echo $Sno; ?>" name="KRAFormAId_<?php echo $Sno; ?>" value="<?php echo $res2['KRAFormAId']; ?>" /></td>



<td align="" valign="top" style="font-family:Times New Roman; font-size:12px;"><?php echo $resK2['KRA']; ?></td>

<td align="" valign="top" style="font-family:Times New Roman; font-size:12px;"><?php echo $resK2['KRA_Description']; ?></td>



<td align="center" valign="top" style="font-family:Times New Roman; font-size:12px;"><?php echo $resK2['Measure']; ?></td>



<td align="center" valign="top" style="font-family:Times New Roman; font-size:12px;"><?php echo $resK2['Unit']; ?></td>



<td align="center" valign="top" style="font-family:Times New Roman; font-size:12px;;">



<input type="hidden" id="WeightageKRA_<?php echo $Sno; ?>"  value="<?php echo $res2['Weightage']; ?>" />



<?php echo $res2['Weightage']; ?></td>



<td align="center" valign="top" style="font-family:Times New Roman; font-size:12px;">



<input type="hidden" id="TargetKRA_<?php echo $Sno; ?>" name="TargetKRA_<?php echo $Sno; ?>" value="<?php echo $res2['Target']; ?>" />



<?php echo $res2['Target']; ?></td>



<td align="center" valign="top" style="font-family:Times New Roman; font-size:12px;"><?php echo $res2['SelfRating']; ?></td>



<td align="" valign="top" style="font-family:Times New Roman; font-size:12px;"><?php echo $res2['AchivementRemark']; ?></td>



<td align="center" valign="top" style="font-family:Times New Roman; color:#FFFFFF; font-size:12px;">



 <input id="AppKRARating<?php echo $Sno; ?>" name="AppKRARating<?php echo $Sno; ?>" style="font-family:Times New Roman; background-color:#FFFFFF; font-size:12px; width:80px; height:22px; text-align:center;" maxlength="5" value="<?php echo $res2['AppraiserRating']; ?>" <?php if($resApp['Appraiser_PmsStatus']==2) { echo 'readonly'; } ?> onKeyDown="EnterAppKra(<?php echo $res2['KRAFormAId'].','.$Sno; ?>)" onChange="EnterAppKra(<?php echo $res2['KRAFormAId'].','.$Sno; ?>)"/></td>



<td align="center" valign="top" style="font-family:Times New Roman; color:#FFFFFF; font-size:12px;">



 <input id="AppKRAScore<?php echo $Sno; ?>" name="AppKRAScore<?php echo $Sno; ?>" style="font-family:Times New Roman; font-size:12px; background-color:#FFFFFF; width:60px; height:22px; text-align:center;" value="<?php echo $res2['AppraiserScore']; ?>"  readonly/>



</td>



</tr>



<?php $Sno++;} $KRowNo=$Sno-1;?><input type="hidden" id="Sno" name="Sno" value="<?php echo $Sno; ?>" />



                                <input type="hidden" id="EmpKraRow" name="EmpKraRow" value="<?php echo $KRowNo; ?>" />



<tr bgcolor="#FFFFFF">



  <td colspan="10" style="font-family:Times New Roman; font-size:11px; width:800px; font-weight:bold;" align="right"> Final Appraiser KRA Score:&nbsp;</td>



  <td align="right" style="font-family:Times New Roman; color:#FFFFFF; font-size:12px;">



 <input id="AppFormAScore<?php echo $Sno; ?>" name="AppFormAScore<?php echo $Sno; ?>" style="font-family:Times New Roman;background-color:#9BCDFF;font-weight:bold; font-size:11px; width:60px; height:22px; text-align:center;" value="<?php echo $resApp['AppraiserFormAScore']; ?>"  readonly/>



  </td>



</tr>



  </table>



 </td>



</tr> 



<tr><td>&nbsp;</td></tr>







<tr><td colspan="2" style="font-family:Georgia; font-size:13px; width:1150px; font-weight:bold;color:#0067CE;" align="left"> (Skill/ Behavioral:)&nbsp;</td>



	<td colspan="9" style="font-family:Times New Roman; font-size:15px; font-weight:bold; width:400px;" align="right">&nbsp;</td>



 </tr>



 <tr>



  <td>



   <table>



      <tr bgcolor="#7a6189" style="height:20px;" valign="middle">



	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:30px;"><b>SNo.</b></td>



	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:200px;"><b>Skill</b></td>
	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:400px;"><b>SkillComment</b></td>



	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:80px;"><b>Weightage</b></td>



	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:80px;"><b>Target</b></td>



	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:80px;"><b>Self Ass.</b></td>



	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:276px;"><b>Remark</b></td>



	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:80px;"><b>Appraiser Ass.</b></td>



	<td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:60px;"><b>Score</b></td>



 </tr>



<?php $sql2=mysql_query("select * from hrm_employee_pms_behavioralformb where EmpPmsId=".$resApp['EmpPmsId']." order by BehavioralFormBId ASC", $con);



	  $SnoB=1; while($res2=mysql_fetch_array($sql2)) { 



	  $sqlB2=mysql_query("select Skill,SkillComment,Weightage,Target from hrm_pms_formb where FormBId=".$res2['FormBId'], $con); 



	  $resB2=mysql_fetch_assoc($sqlB2); ?>		 



<tr bgcolor="#FFFFFF" style="height:20px;" valign="middle">



<td align="center" valign="top" style="font-family:Times New Roman; font-size:12px;" valign="top"><?php echo $SnoB; ?>



<input type="hidden" id="FormBId_<?php echo $SnoB; ?>"  name="FormBId_<?php echo $SnoB; ?>" value="<?php echo $res2['BehavioralFormBId']; ?>" />



</td>



<td align="" valign="top" style="font-family:Times New Roman; font-size:12px;"><?php echo $resB2['Skill']; ?></td>
<td align="" valign="top" style="font-family:Times New Roman; font-size:12px;"><?php echo $resB2['SkillComment']; ?></td>



<td align="center" valign="top" style="font-family:Times New Roman; font-size:12px;">



<input type="hidden" id="WeightageFormB_<?php echo $SnoB; ?>"  value="<?php echo $resB2['Weightage']; ?>" />



<?php echo $resB2['Weightage']; ?></td>



<td align="center" valign="top" style="font-family:Times New Roman; font-size:12px;">



<input type="hidden" id="TargetFormB_<?php echo $SnoB; ?>"  value="<?php echo $resB2['Target']; ?>" />



<?php echo $resB2['Target']; ?></td>



<td align="center" valign="top" style="font-family:Times New Roman; font-size:12px;"><?php echo $res2['SelfRating']; ?></td>



<td align="" valign="top" style="font-family:Times New Roman; font-size:12px;"><?php echo $res2['Comments_Example']; ?></td>



<td align="center" valign="top" style="font-family:Times New Roman; color:#FFFFFF; font-size:12px;">



 <input id="AppFormBRating<?php echo $SnoB; ?>" name="AppFormBRating<?php echo $SnoB; ?>" style="font-family:Times New Roman; font-size:12px; width:80px;background-color:#FFFFFF; height:22px; text-align:center;" value="<?php echo $res2['AppraiserRating']; ?>" maxlength="5" <?php if($resApp['Appraiser_PmsStatus']==2) { echo 'readonly'; } ?> onKeyDown="EnterAppFormB(<?php echo $res2['BehavioralFormBId'].','.$SnoB; ?>)" onChange="EnterAppFormB(<?php echo $res2['BehavioralFormBId'].','.$SnoB; ?>)"/></td>



<td align="center" valign="top" style="font-family:Times New Roman; color:#FFFFFF; font-size:12px;">



 <input id="AppFormBScore<?php echo $SnoB; ?>" name="AppFormBScore<?php echo $SnoB; ?>" style="font-family:Times New Roman; font-size:12px; width:60px;background-color:#FFFFFF; height:22px; text-align:center;" value="<?php echo $res2['AppraiserScore']; ?>"  readonly/>



</td>



</tr>



<?php $SnoB++;} $FormBRowNo=$SnoB-1;?><input type="hidden" id="SnoB" name="SnoB" value="<?php echo $SnoB; ?>" />

                                      <input type="hidden" id="EmpFormBRow" name="EmpFormBRow" value="<?php echo $FormBRowNo; ?>" />



<tr bgcolor="#FFFFFF">



  <td colspan="8" style="font-family:Times New Roman; font-size:12px; width:800px; font-weight:bold;" align="right"> Final Appraiser FormB Score:&nbsp;</td>



  <td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:12px;">



 <input id="AppBehaviFormBScore<?php echo $SnoB; ?>" name="AppBehaviFormBScore<?php echo $SnoB; ?>" style="font-family:Times New Roman;font-weight:bold; font-size:12px;background-color:#9BCDFF; width:60px; height:22px; text-align:center;" value="<?php echo $resApp['AppraiserFormBScore']; ?>"  readonly/>



  </td>



 </tr>



</table>



</td>



</tr>







<tr><td>&nbsp;</td></tr>







<tr>



 <td>



    <table border="0">



	  <tr><td colspan="10" style="font-family:Georgia; font-size:13px; width:750px; font-weight:bold;color:#0067CE;" align="left">(Calculation of PMS score)&nbsp;</td></tr>



	  <tr bgcolor="#7a6189" style="height:20px; ">



	   <td style="font-family:Times New Roman;color:#FFFFFF; font-size:12px; width:100px; font-weight:bold;" align="">&nbsp;</td>



	   <td style="font-family:Times New Roman;color:#FFFFFF; font-size:12px; width:100px; font-weight:bold;" align="center">KRA Form</td>



	   <td style="font-family:Times New Roman;color:#FFFFFF; font-size:12px; width:100px; font-weight:bold;" align="center">(%) Weigthage</td>



	   <td style="font-family:Times New Roman;color:#FFFFFF; font-size:12px; width:100px; font-weight:bold;" align="center">(A) KRA Score</td>



	   <td style="font-family:Times New Roman;color:#FFFFFF; font-size:12px; width:100px; font-weight:bold;" align="center">Behavioral Form </td>



	   <td style="font-family:Times New Roman;color:#FFFFFF; font-size:12px; width:100px; font-weight:bold;" align="center">(%) Weigthage</td>



	   <td style="font-family:Times New Roman;color:#FFFFFF; font-size:12px; width:150px; font-weight:bold;" align="center">(B) Behavioral Score</td>



	   <td style="font-family:Times New Roman;color:#FFFFFF; font-size:12px; width:100px; font-weight:bold;" align="center">PMS Score (A+B)</td>
           <td align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:11px; width:60px;"><b>Rating</b></td>



	  </tr>



<?php



//$Aweight=$resApp['FormAKraAllow_PerOfWeightage']; $Bweight=$resApp['FormBBehaviAllow_PerOfWeightage'];



//$EmpFinallyFormAScore=($resApp['EmpFormAScore']*$resApp['FormAKraAllow_PerOfWeightage'])/100;



//$EmpFinallyFormBScore=($resApp['EmpFormBScore']*$resApp['FormBBehaviAllow_PerOfWeightage'])/100;



//$Emp_TotalFinalScore=$EmpFinallyFormAScore+$EmpFinallyFormBScore;



?>	  



<?php /* ?>	  <tr bgcolor="#FFFFFF" style="height:20px;">



	   <td style="font-family:Georgia; color:#FF0000; font-size:12px; width:100px;font-weight:bold;" align="">&nbsp;&nbsp;Employee :</td>



	   <td style="font-family:Times New Roman; font-size:12px; width:100px;" align="center"><?php echo $resApp['EmpFormAScore']; ?></td>



	   <td style="font-family:Times New Roman; font-size:12px; width:100px;" align="center"><?php echo $resApp['FormAKraAllow_PerOfWeightage']; ?></td>



	   <td style="font-family:Times New Roman; font-size:12px; width:100px;" align="center"><?php echo $resApp['EmpFinallyFormA_Score']; ?></td>



	   <td style="font-family:Times New Roman; font-size:12px; width:100px; " align="center"><?php echo $resApp['EmpFormBScore']; ?></td>



	   <td style="font-family:Times New Roman; font-size:12px; width:100px;" align="center"><?php echo $resApp['FormBBehaviAllow_PerOfWeightage']; ?></td>



	   <td style="font-family:Times New Roman; font-size:12px; width:150px; " align="center"><?php echo $resApp['EmpFinallyFormB_Score']; ?></td>



	   <td style="font-family:Times New Roman; font-size:12px; width:100px;background-color:#FFFFFFF;font-weight:bold;" align="center"><?php echo $resApp['Emp_TotalFinalScore']; ?></td>



	  </tr> <?php */ ?>



	   <tr style="height:20px; ">



	   <td bgcolor="#FFFFFF" style="font-family:Georgia; color:#FF0000; font-size:12px; width:100px;font-weight:bold;" align="">&nbsp;&nbsp;Appraiser :</td>



	   <td bgcolor="#FFFFFF" style="font-family:Times New Roman; font-size:12px; width:100px;" align="center">



	   <input id="FormAScore" style="font-family:Times New Roman;font-size:12px;font-weight:bold; border-style:hidden;background-color:#9BCDFF; width:100px; height:22px; text-align:center;" value="<?php echo $resApp['AppraiserFormAScore']; ?>"  readonly/>



	   </td>



	   <td bgcolor="#C1FFC1" style="font-family:Times New Roman; font-size:12px; width:100px;" align="center">



	   <input type="hidden" id="weight_A" value="<?php echo $resApp['FormAKraAllow_PerOfWeightage']; ?>" /><?php echo $resApp['FormAKraAllow_PerOfWeightage']; ?></td>



	   <td bgcolor="#FFFFFF" style="font-family:Times New Roman; font-size:12px; width:100px;" align="center">



	   <input id="Score_1" name="Score_1" style="font-family:Times New Roman;background-color:#FFE6E6;border-style:hidden;font-weight:bold; font-size:12px;width:100px; height:22px; text-align:center;" value="<?php echo $resApp['AppraiserFinallyFormA_Score']; ?>"  readonly/>



	   </td>



	   <td bgcolor="#FFFFFF" style="font-family:Times New Roman; font-size:12px; width:100px; " align="center">



	   <input id="FormBScore" style="font-family:Times New Roman;background-color:#9BCDFF;border-style:hidden;font-weight:bold; font-size:12px;width:100px; height:22px; text-align:center;" value="<?php echo $resApp['AppraiserFormBScore']; ?>"  readonly/>



	   </td>



	   <td bgcolor="#C1FFC1" style="font-family:Times New Roman; font-size:12px; width:100px;" align="center">



	   <input type="hidden" id="weight_B" value="<?php echo $resApp['FormBBehaviAllow_PerOfWeightage']; ?>" /><?php echo $resApp['FormBBehaviAllow_PerOfWeightage']; ?></td>



	   <td bgcolor="#FFFFFF" style="font-family:Times New Roman; font-size:12px; width:150px; " align="center">



	    <input id="Score_2" name="Score_2" style="font-family:Times New Roman;background-color:#FFE6E6;border-style:hidden;font-weight:bold; font-size:12px;width:150px; height:22px; text-align:center;" value="<?php echo $resApp['AppraiserFinallyFormB_Score']; ?>"  readonly/>



	   </td>



	   <td bgcolor="#FFFFFF" style="font-family:Times New Roman; font-size:12px; width:100px; background-color:#F7FCD6;font-weight:bold;" align="center">
	   <input id="TotalScore_12" name="TotalScore_12" style="font-family:Times New Roman;background-color:#F7FCD6;border-style:hidden;font-weight:bold; font-size:12px;width:100px; height:22px; text-align:center;" value="<?php echo $resApp['Appraiser_TotalFinalScore']; ?>"  readonly/>
	   </td>
           <td bgcolor="#FFFFFF" style="font-family:Times New Roman; font-size:12px; width:60px; background-color:#F7FCD6;font-weight:bold;" align="center">
	   <input id="TotalRating_12" name="TotalRating_12" style="font-family:Times New Roman;background-color:#F7FCD6;border-style:hidden;font-weight:bold; font-size:12px;width:60px; height:22px; text-align:center;" value="<?php echo $resApp['Appraiser_TotalFinalRating']; ?>"  readonly/>
	   </td>


	   <td style="" align="center"><img src="images/BlinkingArrow.gif" border="0" style="height:15px; width:40px; " /></td>



	  </tr>



   </table>



</td>



</tr>







<tr><td>&nbsp;</td></tr>







<tr>



 <td>



    <table>



	  <tr>



<td colspan="5" style="font-family:Georgia; font-size:13px; width:400px; font-weight:bold;color:#0067CE;" align="left"> (Promotion Recommendation)&nbsp;</td>



      </tr>



<?php $sql = mysql_query("select DepartmentId,DesigId,DesigId2,GradeId from hrm_employee_general where EmployeeID=".$Eid, $con); $res=mysql_fetch_assoc($sql);  ?> 
<?php $sqlG = mysql_query("SELECT GradeValue FROM hrm_grade WHERE GradeId=".$res['GradeId'], $con); $resG = mysql_fetch_assoc($sqlG); 
      $NextGrade=$resG['GradeValue']+1; $NextGrade2=$resG['GradeValue']+2; ?>       
      <tr bgcolor="#7a6189" style="height:20px;">
<td style="width:120px;">&nbsp;</td>      
<td style="font-family:Georgia; font-size:12px; width:150px; font-weight:bold; color:#FFF;" align="center">Current</td>
<td style="font-family:Georgia; font-size:12px; width:150px; font-weight:bold; color:#FFF;" align="center">Proposed</td>
      </tr>
      <tr style="height:20px;">
<td bgcolor="#FFFFFF" style="font-family:Georgia; font-size:12px; width:120px; font-weight:bold; color:#FF0000;">&nbsp;&nbsp;Designation :</td> 
<?php $sqlDesig = mysql_query("SELECT DesigName FROM hrm_designation WHERE DesigId=".$res['DesigId'], $con); $resDesig = mysql_fetch_assoc($sqlDesig); ?>
<td bgcolor="#FFFFFF" style="font-family:Georgia; font-size:12px; width:150px;" align="center">
<input type="hidden" id="EmpDesig" value="<?php echo $res['DesigId']; ?>" /><?php echo $resDesig['DesigName']; ?></td>
<td bgcolor="#FFFFFF" style="font-family:Georgia; font-size:12px; width:150px; font-weight:bold;" align="">
<select style="width:150px; height:20px; background-color:#DDFFBB;font-size:12px;" id="DesigId" name="DesigId">
<?php if($resApp['Appraiser_EmpDesignation']!=0) { $sqlD = mysql_query("SELECT DesigName FROM hrm_designation WHERE DesigId=".$resApp['Appraiser_EmpDesignation'], $con); $resD = mysql_fetch_assoc($sqlD); ?>
<option style="background-color:#FFFFFF;" value="<?php echo $resApp['Appraiser_EmpDesignation']; ?>"><?php echo $resD['DesigName']; ?></option>
<?php } if($resApp['Appraiser_EmpDesignation']==0) { ?>
<option style="background-color:#FFFFFF;" value="<?php echo $res['DesigId']; ?>"><?php echo $resDesig['DesigName']; ?></option>
<?php } ?>
<?php $sqlDept = mysql_query("SELECT DesigId FROM hrm_deptgradedesig WHERE DepartmentId=".$res['DepartmentId']." AND (GradeId=".$NextGrade." OR GradeId=".$NextGrade2.")", $con); 
      while($resDept = mysql_fetch_assoc($sqlDept)) { $sqlDesig2 = mysql_query("SELECT DesigName FROM hrm_designation WHERE DesigId=".$resDept['DesigId'], $con); $resDesig2 = mysql_fetch_assoc($sqlDesig2); ?>    
<option style="background-color:#FFFFFF;" value="<?php echo $resDept['DesigId']; ?>"><?php echo $resDesig2['DesigName']; ?></option><?php } ?>
</select>
</td><td style="width:300px;">&nbsp;</td><td style="width:200px;">&nbsp;</td>
      </tr>
      <tr style="height:20px;">
<td bgcolor="#FFFFFF" style="font-family:Georgia; font-size:12px; width:120px; font-weight:bold; color:#FF0000;">&nbsp;&nbsp;Grade :</td> 
<?php $sqlGrade = mysql_query("SELECT GradeValue FROM hrm_grade WHERE GradeId=".$res['GradeId'], $con); $resGrade = mysql_fetch_assoc($sqlGrade); ?>        
<td bgcolor="#FFFFFF" style="font-family:Georgia; font-size:12px; width:150px; font-weight:bold;" align="center">
<input type="hidden" id="EmpGrade" value="<?php echo $res['GradeId']; ?>" /><?php echo $resGrade['GradeValue']; ?></td>
<td bgcolor="#FFFFFF" style="font-family:Georgia; font-size:12px; width:150px; font-weight:bold;" align="">
<select style="width:50px; height:20px; background-color:#DDFFBB;font-size:12px;" id="GradeId" name="GradeId">
<?php if($resApp['Appraiser_EmpGrade']!=0) { $sqlG = mysql_query("SELECT GradeValue FROM hrm_grade WHERE GradeId=".$resApp['Appraiser_EmpGrade'], $con); $resG = mysql_fetch_assoc($sqlG);?>
<option style="background-color:#FFFFFF;" value="<?php echo $resApp['Appraiser_EmpGrade']; ?>"><?php echo $resG['GradeValue']; ?></option>
<?php } ?>
<option style="background-color:#FFFFFF;" value="<?php echo $res['GradeId']; ?>"><?php echo $resGrade['GradeValue']; ?></option> 
<option style="background-color:#FFFFFF;" value="<?php echo $NextGrade; ?>"><?php echo $NextGrade; ?></option>
</select>
</td><td>&nbsp;</td><td>&nbsp;</td>
      </tr> 
      <tr bgcolor="#FFFFFF" style="height:20px;">
<td style="font-family:Georgia; font-size:12px; width:120px; font-weight:bold; color:#FF0000;">&nbsp;&nbsp;Justification :</td>         
<td colspan="4" style="font-family:Georgia; font-size:12px; width:800px; font-weight:bold;" align="">
<input name="Justification" id="Justification" style="height:20px;font-size:11px;width:800px; border-style:hidden;" value="<?php echo $resApp['Appraiser_Justification']; ?>" maxlength="450"/>
</td>
      </tr>          
   </table>
</td>
</tr>
<tr><td>&nbsp;</td></tr>
<?php $sql3=mysql_query("select Appraiser_PmsStatus from hrm_employee_pms where EmpPmsId=".$resApp['EmpPmsId'], $con); $res3=mysql_fetch_assoc($sql3); ?>
<tr>
 <td>
    <table border="0">
	  <tr>
<td style="font-family:Georgia; font-size:13px; width:1150px; font-weight:bold;color:#0067CE;" align="left"> (Training Requirements)&nbsp;&nbsp;<font style="color:#000000;font-size:12px;">Mention training requirement during the next appraisal cycle.</font></td>
<td style="font-family:Georgia; font-size:12px; font-weight:bold; width:400px;" align="right">&nbsp;</td>
      </tr>
   </table>
</td>
</tr>
<tr style="height:20px;" valign="middle">
<td>
 <table>
  <tr><td style="font-family:Georgia;font-size:13px;"><b>a)&nbsp;Soft Skills Training</b>[Based on Behavioral parameter]</td></tr>
  <tr bgcolor="#FFFFFF">
<td align="" style="font-family:Times New Roman; color:#FFFFFF; font-size:12px;width:1100px;">
<input id="AppSoftSkill_1" name="AppSoftSkill_1" value="<?php echo $resApp['Appraiser_SoftSkill_1']; ?>" style="font-family:Times New Roman; font-size:12px; width:1100px; height:20px;" maxlength="400" <?php if($resApp['Appraiser_PmsStatus']==2) { echo 'readonly'; } ?> />
</td>
  </tr>
  <tr bgcolor="#FFFFFF">
<td align="" style="font-family:Times New Roman; color:#FFFFFF; font-size:12px;width:1100px;">
<input id="AppSoftSkill_2" name="AppSoftSkill_2" value="<?php echo $resApp['Appraiser_SoftSkill_2']; ?>" style="font-family:Times New Roman; font-size:12px; width:1100px; height:20px;" maxlength="400" <?php if($resApp['Appraiser_PmsStatus']==2) { echo 'readonly'; } ?> />
</td>
  </tr>
  <tr><td style="font-family:Georgia;font-size:13px;"><b>b)&nbsp;Technical Training</b>[Job related]</td></tr>
  <tr bgcolor="#FFFFFF">
<td align="" style="font-family:Times New Roman; color:#FFFFFF; font-size:12px;width:1100px;">
<input id="AppTechSkill_1" name="AppTechSkill_1" value="<?php echo $resApp['Appraiser_TechSkill_1']; ?>" style="font-family:Times New Roman; font-size:12px; width:1100px; height:20px;" maxlength="400" <?php if($resApp['Appraiser_PmsStatus']==2) { echo 'readonly'; } ?> />
</td>
  </tr>
  <tr bgcolor="#FFFFFF">
<td align="" style="font-family:Times New Roman; color:#FFFFFF; font-size:12px;width:1100px;">
<input id="AppTechSkill_2" name="AppTechSkill_2" value="<?php echo $resApp['Appraiser_TechSkill_2']; ?>" style="font-family:Times New Roman; font-size:12px; width:1100px; height:20px;" maxlength="400" <?php if($resApp['Appraiser_PmsStatus']==2) { echo 'readonly'; } ?> />
</td>
  </tr>
 </table>
</td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
 <td>
    <table>
	  <tr>
<td style="font-family:Georgia; font-size:13px; width:1150px; font-weight:bold;color:#0067CE;" align="left"> (Remarks)&nbsp;</td>
<td style="font-family:Georgia; font-size:12px; font-weight:bold; width:400px;" align="right">&nbsp;</td>
      </tr>
   </table>
</td>
</tr>
<tr style="height:20px;" valign="middle">
<td>
    <table>
	  <tr bgcolor="#FFFFFF">
<td align="" style="font-family:Times New Roman; color:#FFFFFF; font-size:12px;width:1100px;">
<input id="AppRemarks" name="AppRemarks" value="<?php echo $resApp['Appraiser_Remark']; ?>" style="font-family:Times New Roman; font-size:11px; width:1100px; height:20px;" maxlength="450" <?php if($resApp['Appraiser_PmsStatus']==2) { echo 'readonly'; } ?> />
</td>
</tr>
   </table>
</td>
</tr>



























 <tr><td>&nbsp;</td></tr>
 <tr>
 <td>
    <table>
	  <tr>
 <td align="left" style="width:100px;">
 <input type="submit" name="SaveScore" id="SaveScore" style="width:90px;" onClick="return AppScore(<?php echo $resApp['EmpPmsId'].','.$Eid.','.$YearId; ?>)" value="save"/></td>
 <td align="left" style="width:150px;">
 <input type="submit" name="SubmitScore" id="SubmitScore" style="width:120px;" onClick="return AppScore2(<?php echo $resApp['EmpPmsId'].','.$Eid.','.$YearId; ?>)" value="submit form"/></td>
 <td style="width:300px;"><font color="#014E05" style='font-family:Times New Roman;' size="4"><b><i><span id="MsgSpan2"></span></i><?php echo $msg; ?></b></font></td>	   
 </tr>
   </table>
</td>
 </tr>	                           						
</table>		 
</form>
<?php } ?>	
	   </td>
      <?php //************************************************ Close ******************************// ?>	  	   
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



<?php //******************************************** ?>    



  </table>



 </td>



</tr>					



<?php //*************************************************************** Close ******************************************************************************** ?>					



				  </table>



				 </td>



			  </tr>



			 



			  <tr>



			     <td>&nbsp;</td>



			     <td align="Right" class="fontButton" width="100%">



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







