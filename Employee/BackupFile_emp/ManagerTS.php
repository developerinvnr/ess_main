<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}else{header('Location:../index.php');}
//include("SetKraPmsy.php");

if(isset($_POST['SaveScore']))  
{ 
  for($i=1; $i<=$_POST['EmpKraRow']; $i++)
  { $sqlUpK=mysql_query("update hrm_employee_pms_kraforma set AppraiserRating=".$_POST['AppKRARating'.$i].", AppraiserRemark='".addslashes($_POST['AppKRARemark'.$i])."', AppraiserLogic=".$_POST['AppKRALogic'.$i].", AppraiserScore=".$_POST['AppKRAScore'.$i]." where KRAFormAId=".$_POST['KRAFormAId_'.$i], $con);
  
    
	if($_POST['rowSubK'.$i]>0)
	{
	  for($j=1; $j<=$_POST['rowSubK'.$i]; $j++)
      { 
		$sqlUp=mysql_query("update hrm_pms_krasub set AppraiserRating=".$_POST['AppKRARating'.$i."_".$j].", AppraiserRemark='".addslashes($_POST['AppKRARemark'.$i."_".$j])."', AppraiserLogic=".$_POST['AppKRALogic'.$i."_".$j].", AppraiserScore=".$_POST['AppKRAScore'.$i."_".$j]." where KRASubId=".$_POST['SubKraId_'.$i."_".$j], $con); 
	  } 
	}
  }
  for($j=1; $j<=$_POST['EmpFormBRow']; $j++)
  { $sqlUpB=mysql_query("update hrm_employee_pms_behavioralformb set AppraiserRating=".$_POST['AppFormBRating'.$j].", AppraiserLogic=".$_POST['AppBLogic'.$j].", AppraiserScore=".$_POST['AppFormBScore'.$j]." where BehavioralFormBId=".$_POST['FormBId_'.$j], $con);  
  
    if($_POST['rowSubB'.$j]>0)
    {
     for($k=1; $k<=$_POST['rowSubB'.$j]; $k++)
     { 
	  $sqlUp=mysql_query("update hrm_employee_pms_behavioralformb_sub set AppraiserRating=".$_POST['BSelfRatingB'.$j."_".$k].", AppraiserLogic=".$_POST['EmpBLogic'.$j."_".$k].", AppraiserScore=".$_POST['BEmpBScore'.$j."_".$k]." where FormBSubId=".$_POST['SubFormBId_'.$j."_".$k], $con);   
     } 
    }
    
  
  }

  if($_POST['TotalScore_12']>150){$App_Rating=5;}  
  else
  {
  $sqlRat=mysql_query("select ScoreFrom,ScoreTo,Rating from hrm_pms_rating where YearId=".$_SESSION['PmsYId']." AND CompanyId=".$_POST['ComId'], $con); while($resRat=mysql_fetch_array($sqlRat))
  { if($_POST['TotalScore_12']>=$resRat['ScoreFrom'] AND $_POST['TotalScore_12']<=$resRat['ScoreTo']) {$App_Rating=$resRat['Rating'];}} 
  }
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
  $sqlUpPms=mysql_query("update hrm_employee_pms set Appraiser_Remark='".$AppRemark."', Appraiser_PmsStatus=1, Appraiser_SubmitedDate='".date("Y-m-d")."', AppraiserFormAScore=".$_POST['AppFormAScore'.$NoK].", AppraiserFormBScore=".$_POST['AppBehaviFormBScore'.$NoB].", AppraiserFinallyFormA_Score=".$_POST['Score_1'].", AppraiserFinallyFormB_Score=".$_POST['Score_2'].", Appraiser_TotalFinalScore=".$_POST['TotalScore_12'].", Appraiser_TotalFinalRating=".$App_Rating.", Dummy_AppRating=".$App_Rating.", Appraiser_EmpDesignation=".$_POST['DesigId'].", Appraiser_EmpGrade=".$_POST['GradeId'].", Appraiser_SoftSkill_1='".addslashes($_POST['TopAA_1'])."', Appraiser_SoftSkill_2='".addslashes($_POST['TopAA_2'])."', Appraiser_SoftSkill_3='".addslashes($_POST['TopAA_3'])."', Appraiser_SoftSkill_4='".addslashes($_POST['TopAA_4'])."', Appraiser_SoftSkill_5='".addslashes($_POST['TopAA_5'])."', Appraiser_TechSkill_1='".addslashes($_POST['TopB_1'])."', Appraiser_TechSkill_2='".addslashes($_POST['TopB_2'])."', Appraiser_TechSkill_3='".addslashes($_POST['TopB_3'])."', Appraiser_TechSkill_4='".addslashes($_POST['TopB_4'])."', Appraiser_TechSkill_5='".addslashes($_POST['TopB_5'])."', Appraiser_SoftSkill_Oth='".$_POST['TraS_Oth']."', Appraiser_TechSkill_Oth='".$_POST['TraT_Oth']."', Appraiser_Justification='".$AppJus."' where EmpPmsId=".$_POST['PmsId']." AND EmployeeID=".$_POST['EmpId'], $con);
  
  //if($_REQUEST['Eid']==238){ echo "update hrm_employee_pms set Appraiser_Remark='".$AppRemark."', Appraiser_PmsStatus=1, Appraiser_SubmitedDate='".date("Y-m-d")."', AppraiserFormAScore=".$_POST['AppFormAScore'.$NoK].", AppraiserFormBScore=".$_POST['AppBehaviFormBScore'.$NoB].", AppraiserFinallyFormA_Score=".$_POST['Score_1'].", AppraiserFinallyFormB_Score=".$_POST['Score_2'].", Appraiser_TotalFinalScore=".$_POST['TotalScore_12'].", Appraiser_TotalFinalRating=".$App_Rating.", Dummy_AppRating=".$App_Rating.", Appraiser_EmpDesignation=".$_POST['DesigId'].", Appraiser_EmpGrade=".$_POST['GradeId'].", Appraiser_SoftSkill_1='".addslashes($_POST['TopAA_1'])."', Appraiser_SoftSkill_2='".addslashes($_POST['TopAA_2'])."', Appraiser_SoftSkill_3='".addslashes($_POST['TopAA_3'])."', Appraiser_SoftSkill_4='".addslashes($_POST['TopAA_4'])."', Appraiser_SoftSkill_5='".addslashes($_POST['TopAA_5'])."', Appraiser_TechSkill_1='".addslashes($_POST['TopB_1'])."', Appraiser_TechSkill_2='".addslashes($_POST['TopB_2'])."', Appraiser_TechSkill_3='".addslashes($_POST['TopB_3'])."', Appraiser_TechSkill_4='".addslashes($_POST['TopB_4'])."', Appraiser_TechSkill_5='".addslashes($_POST['TopB_5'])."', Appraiser_SoftSkill_Oth='".$_POST['TraS_Oth']."', Appraiser_TechSkill_Oth='".$_POST['TraT_Oth']."', Appraiser_Justification='".$AppJus."' where EmpPmsId=".$_POST['PmsId']." AND EmployeeID=".$_POST['EmpId']; }
  
   if($sqlUpPms){ echo '<script>alert("Form saved successfully!");</script>'; $msg = 'Form saved successfully!';}
}


if(isset($_POST['SubmitScore']))
{
for($i=1; $i<=$_POST['EmpKraRow']; $i++)
  { $sqlUpK=mysql_query("update hrm_employee_pms_kraforma set AppraiserRating=".$_POST['AppKRARating'.$i].", AppraiserRemark='".addslashes($_POST['AppKRARemark'.$i])."', AppraiserLogic=".$_POST['AppKRALogic'.$i].", AppraiserScore=".$_POST['AppKRAScore'.$i]." where KRAFormAId=".$_POST['KRAFormAId_'.$i], $con);
    
    if($_POST['rowSubK'.$i]>0)
	{
	  for($j=1; $j<=$_POST['rowSubK'.$i]; $j++)
      { 
		$sqlUp=mysql_query("update hrm_pms_krasub set AppraiserRating=".$_POST['AppKRARating'.$i."_".$j].", AppraiserRemark='".addslashes($_POST['AppKRARemark'.$i."_".$j])."', AppraiserLogic=".$_POST['AppKRALogic'.$i."_".$j].", AppraiserScore=".$_POST['AppKRAScore'.$i."_".$j]." where KRASubId=".$_POST['SubKraId_'.$i."_".$j], $con); 
	  } 
	}
	
  }
  for($j=1; $j<=$_POST['EmpFormBRow']; $j++)
  { $sqlUpB=mysql_query("update hrm_employee_pms_behavioralformb set AppraiserRating=".$_POST['AppFormBRating'.$j].", AppraiserLogic=".$_POST['AppBLogic'.$j].", AppraiserScore=".$_POST['AppFormBScore'.$j]." where BehavioralFormBId=".$_POST['FormBId_'.$j], $con);  
  
    if($_POST['rowSubB'.$j]>0)
    {
     for($k=1; $k<=$_POST['rowSubB'.$j]; $k++)
     { 
	  $sqlUp=mysql_query("update hrm_employee_pms_behavioralformb_sub set AppraiserRating=".$_POST['BSelfRatingB'.$j."_".$k].", AppraiserLogic=".$_POST['EmpBLogic'.$j."_".$k].", AppraiserScore=".$_POST['BEmpBScore'.$j."_".$k]." where FormBSubId=".$_POST['SubFormBId_'.$j."_".$k], $con);   
     } 
    }
  
  }

  if($_POST['TotalScore_12']>150){$App_Rating=5;}
  else
  {
  $sqlRat=mysql_query("select ScoreFrom,ScoreTo,Rating from hrm_pms_rating where YearId=".$_SESSION['PmsYId']." AND CompanyId=".$_POST['ComId'], $con); while($resRat=mysql_fetch_array($sqlRat))
  { if($_POST['TotalScore_12']>=$resRat['ScoreFrom'] AND $_POST['TotalScore_12']<=$resRat['ScoreTo']) {$App_Rating=$resRat['Rating'];}} 
  }
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

  $sqlUpPms=mysql_query("update hrm_employee_pms set Appraiser_Remark='".$AppRemark."', Appraiser_PmsStatus=2, Appraiser_SubmitedDate='".date("Y-m-d")."', AppraiserFormAScore=".$_POST['AppFormAScore'.$NoK].", AppraiserFormBScore=".$_POST['AppBehaviFormBScore'.$NoB].", AppraiserFinallyFormA_Score=".$_POST['Score_1'].", AppraiserFinallyFormB_Score=".$_POST['Score_2'].", Appraiser_TotalFinalScore=".$_POST['TotalScore_12'].", Appraiser_TotalFinalRating=".$App_Rating.", Dummy_AppRating=".$App_Rating.", Appraiser_EmpDesignation=".$_POST['DesigId'].", Appraiser_EmpGrade=".$_POST['GradeId'].", Appraiser_SoftSkill_1='".addslashes($_POST['TopAA_1'])."', Appraiser_SoftSkill_2='".addslashes($_POST['TopAA_2'])."', Appraiser_SoftSkill_3='".addslashes($_POST['TopAA_3'])."', Appraiser_SoftSkill_4='".addslashes($_POST['TopAA_4'])."', Appraiser_SoftSkill_5='".addslashes($_POST['TopAA_5'])."', Appraiser_TechSkill_1='".addslashes($_POST['TopB_1'])."', Appraiser_TechSkill_2='".addslashes($_POST['TopB_2'])."', Appraiser_TechSkill_3='".addslashes($_POST['TopB_3'])."', Appraiser_TechSkill_4='".addslashes($_POST['TopB_4'])."', Appraiser_TechSkill_5='".addslashes($_POST['TopB_5'])."', Appraiser_SoftSkill_Oth='".$_POST['TraS_Oth']."', Appraiser_TechSkill_Oth='".$_POST['TraT_Oth']."', Appraiser_Justification='".$AppJus."' where EmpPmsId=".$_POST['PmsId']." AND EmployeeID=".$_POST['EmpId'], $con);
   if($sqlUpPms){ echo '<script>alert("Form submitted successfully!");</script>'; $msg = 'Form submitted successfully!';}
}

/***********************Mid Year Appraisal Open **************/
if(isset($_POST['Mid_SaveScore']))
{ 
  for($i=1; $i<=$_POST['EmpKraRow']; $i++)
  { $sqlUpK=mysql_query("update hrm_employee_pms_kraforma set Mid_AppraiserRating=".$_POST['AppKRARating'.$i].", Mid_AppraiserLogic=".$_POST['AppKRALogic'.$i].", Mid_AppraiserScore=".$_POST['AppKRAScore'.$i]." where KRAFormAId=".$_POST['KRAFormAId_'.$i], $con);
   
    if($_POST['rowSubK'.$i]>0)
	{
	  for($j=1; $j<=$_POST['rowSubK'.$i]; $j++)
      { 
		$sqlUp=mysql_query("update hrm_pms_krasub set Mid_AppraiserRating=".$_POST['AppKRARating'.$i."_".$j].", Mid_AppraiserLogic=".$_POST['AppKRALogic'.$i."_".$j].", Mid_AppraiserScore=".$_POST['AppKRAScore'.$i."_".$j]." where KRASubId=".$_POST['SubKraId_'.$i."_".$j], $con); 
	  } 
	}
    
  }
  for($j=1; $j<=$_POST['EmpFormBRow']; $j++)
  { $sqlUpB=mysql_query("update hrm_employee_pms_behavioralformb set Mid_AppraiserRating=".$_POST['AppFormBRating'.$j].", AppraiserLogic=".$_POST['AppBLogic'.$j].", Mid_AppraiserScore=".$_POST['AppFormBScore'.$j]." where BehavioralFormBId=".$_POST['FormBId_'.$j], $con);  
  }

  if($_POST['TotalScore_12']>150){$App_Rating=5;}
  else{$App_Rating=0;}
  /*
  else
  { 
   $sqlRat=mysql_query("select ScoreFrom,ScoreTo,Rating from hrm_pms_rating where YearId=".$_SESSION['PmsYId']." AND CompanyId=".$_POST['ComId'], $con); 
   while($resRat=mysql_fetch_array($sqlRat))
   { $_POST['TotalScore_12'];if($_POST['TotalScore_12']>=$resRat['ScoreFrom'] AND $_POST['TotalScore_12']<=$resRat['ScoreTo']) 
     {$App_Rating=$resRat['Rating'];}else{$App_Rating=0;}
   } 
  }
  */
  $NoK=$_POST['Sno']; $NoB=$_POST['SnoB'];
  $search =  '!"#$%&/=?*+\'-;:_' ; $search = str_split($search);
  $str_Remark = $_POST['AppRemarks']; $AppRemark=str_replace($search, "", $str_Remark);
  
  $sqlUpPms=mysql_query("update hrm_employee_pms set Mid_Appraiser_Remark='".$AppRemark."', Appraiser_PmsStatus=1, Mid_Appraiser_SubmitedDate='".date("Y-m-d")."', Mid_AppraiserFormAScore=".$_POST['AppFormAScore'.$NoK].", Mid_AppraiserFormBScore=".$_POST['AppBehaviFormBScore'.$NoB].", Mid_AppraiserFinallyFormA_Score=".$_POST['Score_1'].", Mid_AppraiserFinallyFormB_Score=".$_POST['Score_2'].", Mid_Appraiser_TotalFinalScore=".$_POST['TotalScore_12'].", Mid_Appraiser_TotalFinalRating=".$App_Rating." where EmpPmsId=".$_POST['PmsId']." AND EmployeeID=".$_POST['EmpId'], $con);
   if($sqlUpPms){$msg = 'Form saved successfully!';}
}


if(isset($_POST['Mid_SubmitScore']))
{
  for($i=1; $i<=$_POST['EmpKraRow']; $i++)
  { $sqlUpK=mysql_query("update hrm_employee_pms_kraforma set Mid_AppraiserRating=".$_POST['AppKRARating'.$i].", Mid_AppraiserLogic=".$_POST['AppKRALogic'.$i].", Mid_AppraiserScore=".$_POST['AppKRAScore'.$i]." where KRAFormAId=".$_POST['KRAFormAId_'.$i], $con); 
  
    if($_POST['rowSubK'.$i]>0)
	{
	  for($j=1; $j<=$_POST['rowSubK'.$i]; $j++)
      { 
		$sqlUp=mysql_query("update hrm_pms_krasub set Mid_AppraiserRating=".$_POST['AppKRARating'.$i."_".$j].", Mid_AppraiserLogic=".$_POST['AppKRALogic'.$i."_".$j].", Mid_AppraiserScore=".$_POST['AppKRAScore'.$i."_".$j]." where KRASubId=".$_POST['SubKraId_'.$i."_".$j], $con); 
	  } 
	}
   
  }
  for($j=1; $j<=$_POST['EmpFormBRow']; $j++)
  { $sqlUpB=mysql_query("update hrm_employee_pms_behavioralformb set Mid_AppraiserRating=".$_POST['AppFormBRating'.$j].", AppraiserLogic=".$_POST['AppBLogic'.$j].", Mid_AppraiserScore=".$_POST['AppFormBScore'.$j]." where BehavioralFormBId=".$_POST['FormBId_'.$j], $con);  
  }

  if($_POST['TotalScore_12']>150){$App_Rating=5;}
  else{$App_Rating=0;}
  /*
  else
  {
  $sqlRat=mysql_query("select ScoreFrom,ScoreTo,Rating from hrm_pms_rating where YearId=".$_SESSION['PmsYId']." AND CompanyId=".$_POST['ComId'], $con); 
  while($resRat=mysql_fetch_array($sqlRat))
   { if($_POST['TotalScore_12']>=$resRat['ScoreFrom'] AND $_POST['TotalScore_12']<=$resRat['ScoreTo']) {$App_Rating=$resRat['Rating'];}
   } 
  }
  */
  
  
  $NoK=$_POST['Sno']; $NoB=$_POST['SnoB'];

  $search =  '!"#$%&/=?*+\'-;:_' ; $search = str_split($search);
  $str_Remark = $_POST['AppRemarks']; $AppRemark=str_replace($search, "", $str_Remark);
  $sqlUpPms=mysql_query("update hrm_employee_pms set Mid_Appraiser_Remark='".$AppRemark."', Appraiser_PmsStatus=2, Mid_Appraiser_SubmitedDate='".date("Y-m-d")."', Mid_AppraiserFormAScore=".$_POST['AppFormAScore'.$NoK].", Mid_AppraiserFormBScore=".$_POST['AppBehaviFormBScore'.$NoB].", Mid_AppraiserFinallyFormA_Score=".$_POST['Score_1'].", Mid_AppraiserFinallyFormB_Score=".$_POST['Score_2'].", Mid_Appraiser_TotalFinalScore=".$_POST['TotalScore_12'].", Mid_Appraiser_TotalFinalRating=".$App_Rating." where EmpPmsId=".$_POST['PmsId']." AND EmployeeID=".$_POST['EmpId'], $con);
  if($sqlUpPms){$msg = 'Form submitted successfully!';} 
}
/***********************Mid Year Appraisal Close *********/

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<link type="text/css" href="css/mycss.css" rel="stylesheet"/>

<script type="text/javascript" language="javascript">
function EnterAppKra(v,n)
{ 
  var KRAWeight = parseFloat(document.getElementById("WeightageKRA_"+n).value); 
  var KRATarget = parseFloat(document.getElementById("TargetKRA_"+n).value); 
  var AppKRARating = parseFloat(document.getElementById("AppKRARating"+n).value); 
  var AppKRAScore = parseFloat(document.getElementById("AppKRAScore"+n).value);
  var PeriodKRA = document.getElementById("PeriodKRA_"+n).value;
  var lgc = document.getElementById("LogicKRA_"+n).value; 
  
  if(lgc=='Logic1')  //MScore.toFixed(1)
  { 
   //var Per50=Math.round((KRATarget/2)*100)/100;
   var Per50=Math.round(((KRATarget*20)/100)*100)/100; var Per150=Math.round((KRATarget+Per50)*100)/100;
   if(AppKRARating<=Per150){var EScore=document.getElementById("AppKRALogic"+n).value=AppKRARating;}
   else{var EScore=document.getElementById("AppKRALogic"+n).value=Per150;} 
   var MScore=document.getElementById("AppKRAScore"+n).value=Math.round(((EScore/KRATarget)*KRAWeight)*100)/100;
   var Score=document.getElementById("KraScore"+n).value=MScore;
  }
  else if(lgc=='Logic2')
  {
   if(AppKRARating<=KRATarget){var EScore=document.getElementById("AppKRALogic"+n).value=AppKRARating;}
   else{var EScore=document.getElementById("AppKRALogic"+n).value=KRATarget;}
   var MScore=document.getElementById("AppKRAScore"+n).value=Math.round(((EScore/KRATarget)*KRAWeight)*100)/100;
   var Score=document.getElementById("KraScore"+n).value=MScore;
  }
  else if(lgc=='Logic3')
  { 
   if(AppKRARating==KRATarget){var EScore=document.getElementById("AppKRALogic"+n).value=AppKRARating;}
   else{var EScore=document.getElementById("AppKRALogic"+n).value=0;}
   var MScore=document.getElementById("AppKRAScore"+n).value=Math.round(((EScore/KRATarget)*KRAWeight)*100)/100;
   var Score=document.getElementById("KraScore"+n).value=MScore; 
  }
  else if(lgc=='Logic4')
  {
   if(AppKRARating>=KRATarget){var EScore=document.getElementById("AppKRALogic"+n).value=KRATarget;}
   else{var EScore=document.getElementById("AppKRALogic"+n).value=0;}
   var MScore=document.getElementById("AppKRAScore"+n).value=Math.round(((EScore/KRATarget)*KRAWeight)*100)/100;
   var Score=document.getElementById("KraScore"+n).value=MScore;
  }
  else if(lgc=='Logic5')
  {
   var Per30=Math.round(((KRATarget*30)/100)*100)/100; var Per70=Math.round((KRATarget-Per30)*100)/100;
  if(AppKRARating>=Per70 && AppKRARating<KRATarget){var EScore=document.getElementById("AppKRALogic"+n).value=AppKRARating;}
   else if(AppKRARating>=KRATarget){var EScore=document.getElementById("AppKRALogic"+n).value=KRATarget;}
   else{var EScore=document.getElementById("AppKRALogic"+n).value=0;}
   var MScore=document.getElementById("AppKRAScore"+n).value=Math.round(((EScore/KRATarget)*KRAWeight)*100)/100;
   var Score=document.getElementById("KraScore"+n).value=MScore;
  }
  else if(lgc=='Logic6')
  {
   var Per150=Math.round(((KRATarget*150)/100)*100)/100; var PerAct=Math.round(((KRATarget*AppKRARating)/100)*100)/100; 
   var ScoAct=Math.round((KRATarget-PerAct)*100)/100;
   if(AppKRARating==0){var EScore=document.getElementById("AppKRALogic"+n).value=Per150;}
   else if(AppKRARating>=0 && AppKRARating<=25){var EScore=document.getElementById("AppKRALogic"+n).value=ScoAct;}
   else{var EScore=document.getElementById("AppKRALogic"+n).value=0;}
   var MScore=document.getElementById("AppKRAScore"+n).value=Math.round(((EScore/KRATarget)*KRAWeight)*100)/100;
   var Score=document.getElementById("KraScore"+n).value=MScore;
  }
  else if(lgc=='Logic7')
  {
   var Per150=Math.round(((KRATarget*150)/100)*100)/100; var PerAct=Math.round(((KRATarget*AppKRARating)/100)*100)/100; 
   var ScoAct=Math.round((KRATarget-PerAct)*100)/100;
   if(AppKRARating==0){var EScore=document.getElementById("AppKRALogic"+n).value=Per150;}
   else if(AppKRARating>=0 && AppKRARating<=10){var EScore=document.getElementById("AppKRALogic"+n).value=ScoAct;}
   else{var EScore=document.getElementById("AppKRALogic"+n).value=0;}
   var MScore=document.getElementById("AppKRAScore"+n).value=Math.round(((EScore/KRATarget)*KRAWeight)*100)/100;
   var Score=document.getElementById("KraScore"+n).value=MScore;
  }
  else if(lgc=='Logic8a')
  {
   var KRAWeight=parseInt(35);      
   var Percent=((AppKRARating/KRATarget)*115)/100; 
   var MScore=document.getElementById("AppKRAScore"+n).value=Math.round((Percent*KRAWeight)*100)/100;
   var Score=document.getElementById("KraScore"+n).value=MScore;
  }
  else if(lgc=='Logic8b')
  {
   var KRAWeight=parseInt(35);      
   var Percent=((AppKRARating/KRATarget)*100)/100; 
   var MScore=document.getElementById("AppKRAScore"+n).value=Math.round((Percent*KRAWeight)*100)/100;
   var Score=document.getElementById("KraScore"+n).value=MScore;
  }
  else if(lgc=='Logic8c')
  {
   var KRAWeight=parseInt(35);      
   var Percent=((AppKRARating/KRATarget)*90)/100; 
   var MScore=document.getElementById("AppKRAScore"+n).value=Math.round((Percent*KRAWeight)*100)/100;
   var Score=document.getElementById("KraScore"+n).value=MScore;
  }
  else if(lgc=='Logic8d')
  {
   var KRAWeight=parseInt(35);      
   var Percent=((AppKRARating/KRATarget)*65)/100; 
   var MScore=document.getElementById("AppKRAScore"+n).value=Math.round((Percent*KRAWeight)*100)/100;
   var Score=document.getElementById("KraScore"+n).value=MScore;
  }
  else if(lgc=='Logic8e')
  {
   var KRAWeight=parseInt(35);      
   var Percent=((AppKRARating/KRATarget)*(-100))/100; 
   var MScore=document.getElementById("AppKRAScore"+n).value=Math.round((Percent*KRAWeight)*100)/100;
   var Score=document.getElementById("KraScore"+n).value=MScore;
  }
  else if(lgc=='Logic9')
  {
   var Per10=Math.round(((KRATarget*10)/100)*100)/100; var Per90=Math.round((KRATarget-Per10)*100)/100;
   if(AppKRARating<Per90){var EScore=document.getElementById("AppKRALogic"+n).value=AppKRARating;}
   else if(AppKRARating>=Per90){var EScore=document.getElementById("AppKRALogic"+n).value=KRATarget;}
   else{var EScore=document.getElementById("AppKRALogic"+n).value=0;}
   var MScore=document.getElementById("AppKRAScore"+n).value=Math.round(((EScore/KRATarget)*KRAWeight)*100)/100;
   var Score=document.getElementById("KraScore"+n).value=MScore;
  }
  else if(lgc=='Logic10')
 {
 var Per1=Math.round(((KRATarget*1)/100)*100)/100; var Per2=Math.round(((KRATarget*2)/100)*100)/100; 
 var Per3=Math.round(((KRATarget*3)/100)*100)/100; var Per5=Math.round(((KRATarget*5)/100)*100)/100; 
 var Per6=Math.round(((KRATarget*6)/100)*100)/100; var Per7=Math.round(((KRATarget*7)/100)*100)/100; 
 var Per10=Math.round(((KRATarget*10)/100)*100)/100; var Per20=Math.round(((KRATarget*20)/100)*100)/100;
 var Per90=Math.round((KRATarget-Per10)*100)/100; var Per91=Math.round((Per90+Per1)*100)/100;
 var Per93=Math.round((Per90+Per3)*100)/100; var Per94=Math.round((KRATarget-Per6)*100)/100;
 var Per97=Math.round((KRATarget-Per3)*100)/100; var Per98=Math.round((KRATarget-Per2)*100)/100;
 var Per98=Math.round((KRATarget-Per2)*100)/100; var Per105=Math.round((KRATarget+Per5)*100)/100;
 var Per110=Math.round((KRATarget+Per10)*100)/100; var Per120=Math.round((KRATarget+Per20)*100)/100;
  
  if(AppKRARating<Per90){var EScore=document.getElementById("AppKRALogic"+n).value=0;}
  else if(AppKRARating==Per90){var EScore=document.getElementById("AppKRALogic"+n).value=KRATarget;}
  else if(AppKRARating>Per90 && AppKRARating<=Per93){var EScore=document.getElementById("AppKRALogic"+n).value=Per105;}
  else if(AppKRARating>Per93 && AppKRARating<=Per97){var EScore=document.getElementById("AppKRALogic"+n).value=Per110;}
  else if(AppKRARating>Per97){var EScore=document.getElementById("AppKRALogic"+n).value=Per120;}
  else{var EScore=document.getElementById("AppKRALogic"+n).value=0;}
  var MScore=document.getElementById("AppKRAScore"+n).value=Math.round(((EScore/KRATarget)*KRAWeight)*100)/100;
  var Score=document.getElementById("KraScore"+n).value=MScore;
 } 
  
  else if(lgc=='Logic11')
 { 
  var EScore=document.getElementById("AppKRALogic"+n).value=AppKRARating; 
  var MScore=document.getElementById("AppKRAScore"+n).value=Math.round(((KRATarget/EScore)*KRAWeight)*100)/100;
  var Score=document.getElementById("KraScore"+n).value=MScore;
 }
  FunCal();  
}	


function EnterAppKraSub(v,i,j)
{ 
  var Weight = parseFloat(document.getElementById("WeightageKRA_"+i+"_"+j).value); 
  var Target = parseFloat(document.getElementById("TargetKRA_"+i+"_"+j).value); 
  var Rating = parseFloat(document.getElementById("AppKRARating"+i+"_"+j).value); 
  var Score = parseFloat(document.getElementById("AppKRAScore"+i+"_"+j).value); 
  var PeriodKRA = document.getElementById("PeriodKRA_"+i+"_"+j).value;
  var lgc = document.getElementById("LogicKRA_"+i+"_"+j).value; 

  if(lgc=='Logic1')   //MScore.toFixed(1)
  { 
   //var Per50=Math.round((Target/2)*100)/100;
   var Per50=Math.round(((Target*20)/100)*100)/100; var Per150=Math.round((Target+Per50)*100)/100;
   if(Rating<=Per150){var EScore=document.getElementById("AppKRALogic"+i+"_"+j).value=Rating;}
   else{var EScore=document.getElementById("AppKRALogic"+i+"_"+j).value=Per150;} 
   var MScore=Math.round(((EScore/Target)*Weight)*100)/100;
   if(MScore>0){document.getElementById("AppKRAScore"+i+"_"+j).value=MScore; document.getElementById("KraScoreSub"+i+"_"+j).value=MScore;}else{document.getElementById("AppKRAScore"+i+"_"+j).value=0;}
  }
  else if(lgc=='Logic2')
  {
   if(Rating<=Target){var EScore=document.getElementById("AppKRALogic"+i+"_"+j).value=Rating;}
   else{var EScore=document.getElementById("AppKRALogic"+i+"_"+j).value=Target;}
   var MScore=Math.round(((EScore/Target)*Weight)*100)/100;
   if(MScore>0){document.getElementById("AppKRAScore"+i+"_"+j).value=MScore; document.getElementById("KraScoreSub"+i+"_"+j).value=MScore;}else{document.getElementById("AppKRAScore"+i+"_"+j).value=0;}
  }
  else if(lgc=='Logic3')
  { 
   if(Rating==Target){var EScore=document.getElementById("AppKRALogic"+i+"_"+j).value=Rating;}
   else{var EScore=document.getElementById("AppKRALogic"+i+"_"+j).value=0;}
   var MScore=Math.round(((EScore/Target)*Weight)*100)/100;
   if(MScore>0){document.getElementById("AppKRAScore"+i+"_"+j).value=MScore; document.getElementById("KraScoreSub"+i+"_"+j).value=MScore;}else{document.getElementById("AppKRAScore"+i+"_"+j).value=0;}
  }
  else if(lgc=='Logic4')
  {
   if(Rating>=Target){var EScore=document.getElementById("AppKRALogic"+i+"_"+j).value=Target;}
   else{var EScore=document.getElementById("AppKRALogic"+i+"_"+j).value=0;}
   var MScore=Math.round(((EScore/Target)*Weight)*100)/100;
   if(MScore>0){document.getElementById("AppKRAScore"+i+"_"+j).value=MScore; document.getElementById("KraScoreSub"+i+"_"+j).value=MScore;}else{document.getElementById("AppKRAScore"+i+"_"+j).value=0;}
  }
  else if(lgc=='Logic5')
  {
   var Per30=Math.round(((Target*30)/100)*100)/100; var Per70=Math.round((Target-Per30)*100)/100;
   if(Rating>=Per70 && Rating<Target){var EScore=document.getElementById("AppKRALogic"+i+"_"+j).value=Rating;}
   else if(Rating>=Target){var EScore=document.getElementById("AppKRALogic"+i+"_"+j).value=Target;}
   else{var EScore=document.getElementById("AppKRALogic"+i+"_"+j).value=0;}
   var MScore=document.getElementById("AppKRAScore"+i+"_"+j).value=Math.round(((EScore/Target)*Weight)*100)/100;
   if(MScore>0){document.getElementById("AppKRAScore"+i+"_"+j).value=MScore; document.getElementById("KraScoreSub"+i+"_"+j).value=MScore;}else{document.getElementById("AppKRAScore"+i+"_"+j).value=0;}
  }
  else if(lgc=='Logic6')
  {
   var Per150=Math.round(((Target*150)/100)*100)/100; var PerAct=Math.round(((Target*Rating)/100)*100)/100; 
   var ScoAct=Math.round((Target-PerAct)*100)/100;
   if(Rating==0){var EScore=document.getElementById("AppKRALogic"+i+"_"+j).value=Per150;}
   else if(Rating>=0 && Rating<=25){var EScore=document.getElementById("AppKRALogic"+i+"_"+j).value=ScoAct;}
   else{var EScore=document.getElementById("AppKRALogic"+i+"_"+j).value=0;}
   var MScore=document.getElementById("AppKRAScore"+i+"_"+j).value=Math.round(((EScore/Target)*Weight)*100)/100;
   if(MScore>0){document.getElementById("AppKRAScore"+i+"_"+j).value=MScore; document.getElementById("KraScoreSub"+i+"_"+j).value=MScore;}else{document.getElementById("AppKRAScore"+i+"_"+j).value=0;}
  }
  else if(lgc=='Logic7')
  {
   var Per150=Math.round(((Target*150)/100)*100)/100; var PerAct=Math.round(((Target*Rating)/100)*100)/100; 
   var ScoAct=Math.round((Target-PerAct)*100)/100;
   if(Rating==0){var EScore=document.getElementById("AppKRALogic"+i+"_"+j).value=Per150;}
   else if(Rating>=0 && Rating<=10){var EScore=document.getElementById("AppKRALogic"+i+"_"+j).value=ScoAct;}
   else{var EScore=document.getElementById("AppKRALogic"+i+"_"+j).value=0;}
   var MScore=document.getElementById("AppKRAScore"+i+"_"+j).value=Math.round(((EScore/Target)*Weight)*100)/100;
   if(MScore>0){document.getElementById("AppKRAScore"+i+"_"+j).value=MScore; document.getElementById("KraScoreSub"+i+"_"+j).value=MScore;}else{document.getElementById("AppKRAScore"+i+"_"+j).value=0;}
  }
  else if(lgc=='Logic8a')
  {
   var Weight=parseInt(35);
   var Percent=((Rating/Target)*115)/100; 
   var MScore=document.getElementById("AppKRAScore"+i+"_"+j).value=Math.round((Percent*Weight)*100)/100;
   var Score=document.getElementById("KraScoreSub"+i+"_"+j).value=MScore;
  }
  else if(lgc=='Logic8b')
  {
   var Weight=parseInt(35); 
   var Percent=((Rating/Target)*100)/100; 
   var MScore=document.getElementById("AppKRAScore"+i+"_"+j).value=Math.round((Percent*Weight)*100)/100;
   var Score=document.getElementById("KraScoreSub"+i+"_"+j).value=MScore;
  }
  else if(lgc=='Logic8c')
  {
   var Weight=parseInt(35);
   var Percent=((Rating/Target)*90)/100; 
   var MScore=document.getElementById("AppKRAScore"+i+"_"+j).value=Math.round((Percent*Weight)*100)/100;
   var Score=document.getElementById("KraScoreSub"+i+"_"+j).value=MScore;
  }
  else if(lgc=='Logic8d')
  {
   var Weight=parseInt(35);
   var Percent=((Rating/Target)*65)/100; 
   var MScore=document.getElementById("AppKRAScore"+i+"_"+j).value=Math.round((Percent*Weight)*100)/100;
   var Score=document.getElementById("KraScoreSub"+i+"_"+j).value=MScore;
  }
  else if(lgc=='Logic8e')
  {
   var Weight=parseInt(35);
   var Percent=((Rating/Target)*(-100))/100; 
   var MScore=document.getElementById("AppKRAScore"+i+"_"+j).value=Math.round((Percent*Weight)*100)/100;
   var Score=document.getElementById("KraScoreSub"+i+"_"+j).value=MScore;
  }
  else if(lgc=='Logic9')
  {
   var Per10=Math.round(((Target*10)/100)*100)/100; var Per90=Math.round((Target-Per10)*100)/100;
   if(Rating<Per90){var EScore=document.getElementById("AppKRALogic"+i+"_"+j).value=Rating;}
   else if(Rating>=Per90){var EScore=document.getElementById("AppKRALogic"+i+"_"+j).value=Target;}
   else{var EScore=document.getElementById("AppKRALogic"+i+"_"+j).value=0;}
   var MScore=document.getElementById("AppKRAScore"+i+"_"+j).value=Math.round(((EScore/Target)*Weight)*100)/100;
   var Score=document.getElementById("KraScoreSub"+i+"_"+j).value=MScore;
  }
  else if(lgc=='Logic10')
 {
 var Per1=Math.round(((Target*1)/100)*100)/100; var Per2=Math.round(((Target*2)/100)*100)/100; 
 var Per3=Math.round(((Target*3)/100)*100)/100; var Per5=Math.round(((Target*5)/100)*100)/100; 
 var Per6=Math.round(((Target*6)/100)*100)/100; var Per7=Math.round(((Target*7)/100)*100)/100; 
 var Per10=Math.round(((Target*10)/100)*100)/100; var Per20=Math.round(((Target*20)/100)*100)/100;
 var Per90=Math.round((Target-Per10)*100)/100; var Per91=Math.round((Per90+Per1)*100)/100;
 var Per93=Math.round((Per90+Per3)*100)/100; var Per94=Math.round((Target-Per6)*100)/100;
 var Per97=Math.round((Target-Per3)*100)/100; var Per98=Math.round((Target-Per2)*100)/100;
 var Per98=Math.round((Target-Per2)*100)/100; var Per105=Math.round((Target+Per5)*100)/100;
 var Per110=Math.round((Target+Per10)*100)/100; var Per120=Math.round((Target+Per20)*100)/100;
  
  if(Rating<Per90){var EScore=document.getElementById("AppKRALogic"+i+"_"+j).value=0;}
  else if(Rating==Per90){var EScore=document.getElementById("AppKRALogic"+i+"_"+j).value=Target;}
  else if(Rating>Per90 && Rating<=Per93){var EScore=document.getElementById("AppKRALogic"+i+"_"+j).value=Per105;}
  else if(Rating>Per93 && Rating<=Per97){var EScore=document.getElementById("AppKRALogic"+i+"_"+j).value=Per110;}
  else if(Rating>Per97){var EScore=document.getElementById("AppKRALogic"+i+"_"+j).value=Per120;}
  else{var EScore=document.getElementById("AppKRALogic"+i+"_"+j).value=0;}
  var MScore=document.getElementById("AppKRAScore"+i+"_"+j).value=Math.round(((EScore/Target)*Weight)*100)/100;
  var Score=document.getElementById("KraScoreSub"+i+"_"+j).value=MScore;
 } 
 else if(lgc=='Logic11')
 { 
  var EScore=document.getElementById("AppKRALogic"+i+"_"+j).value=Rating; 
  var MScore=document.getElementById("AppKRAScore"+i+"_"+j).value=Math.round(((Target/EScore)*Weight)*100)/100;
  var Score=document.getElementById("KraScoreSub"+i+"_"+j).value=MScore;
 }
  
  FunCal();
  	
}
	

function EnterAppFormB(v,n)
{ 
  
  var Weight = parseFloat(document.getElementById("WeightageFormB_"+n).value); 
  var Target = parseFloat(document.getElementById("TargetFormB_"+n).value);  
  var Rating = parseFloat(document.getElementById("AppFormBRating"+n).value);  
  var EmpBScore = parseFloat(document.getElementById("AppFormBScore"+n).value); 
  var PeriodB = document.getElementById("AppPeriodB_"+n).value; 
  var lgc = document.getElementById("AppLogicB_"+n).value; 
  
  if(lgc=='Logic1')
  {
   var Per50=Math.round(((Target*20)/100)*100)/100; var Per150=Math.round((Target+Per50)*100)/100;
   if(Rating<=Per150){var EScore=document.getElementById("AppBLogic"+n).value=Rating;}
   else{var EScore=document.getElementById("AppBLogic"+n).value=Per150;} 
   var MScore=document.getElementById("AppFormBScore"+n).value=Math.round(((EScore/Target)*Weight)*100)/100;
   if(MScore>0){document.getElementById("AppFormBScore"+n).value=MScore;}else{document.getElementById("AppFormBScore"+n).value=0;}
  }
  else if(lgc=='Logic2')
  {
   if(Rating<=Target){var EScore=document.getElementById("AppBLogic"+n).value=Rating;}
   else{var EScore=document.getElementById("AppBLogic"+n).value=Target;}
   var MScore=document.getElementById("AppFormBScore"+n).value=Math.round(((EScore/Target)*Weight)*100)/100;
   if(MScore>0){document.getElementById("AppFormBScore"+n).value=MScore;}else{document.getElementById("AppFormBScore"+n).value=0;}
  }
  else if(lgc=='Logic3')
  { 
   if(Rating==Target){var EScore=document.getElementById("AppBLogic"+n).value=Rating;}
   else{var EScore=document.getElementById("AppBLogic"+n).value=0;}
   var MScore=document.getElementById("AppFormBScore"+n).value=Math.round(((EScore/Target)*Weight)*100)/100;
   if(MScore>0){document.getElementById("AppFormBScore"+n).value=MScore;}else{document.getElementById("AppFormBScore"+n).value=0;}
  }
  else if(lgc=='Logic4')
  {
   if(Rating>=Target){var EScore=document.getElementById("AppBLogic"+n).value=Target;}
   else{var EScore=document.getElementById("AppBLogic"+n).value=0;}
   var MScore=document.getElementById("AppFormBScore"+n).value=Math.round(((EScore/Target)*Weight)*100)/100;
   if(MScore>0){document.getElementById("AppFormBScore"+n).value=MScore;}else{document.getElementById("AppFormBScore"+n).value=0;}
  }



  for(var i=1; i<=document.getElementById("EmpFormBRow").value; i++)
  { 
   /*var FormBWeight = parseFloat(document.getElementById("WeightageFormB_"+i).value); var FormBTarget = parseFloat(document.getElementById("TargetFormB_"+i).value); var AppFormBRating = parseFloat(document.getElementById("AppFormBRating"+i).value); var AppFormBScore = parseFloat(document.getElementById("AppFormBScore"+i).value);
   var NewAppFormBScore=document.getElementById("AppFormBScore"+i).value=Math.round(((AppFormBRating/FormBTarget)*FormBWeight)*100)/100;*/ 
   var NewAppFormBScore=document.getElementById("AppFormBScore"+i).value;
   var Score=document.getElementById("FormBScore"+i).value=Math.round((NewAppFormBScore)*100)/100;
  } 
  
  var SnoB=document.getElementById("SnoB").value;  var Weight_B=parseFloat(document.getElementById("weight_B").value); 
  var Score_1=parseFloat(document.getElementById("Score_1").value); 
  var Score_2=parseFloat(document.getElementById("Score_2").value);
  
  var s1= parseFloat(document.getElementById("FormBScore"+1).value); var s2= parseFloat(document.getElementById("FormBScore"+2).value); var s3= parseFloat(document.getElementById("FormBScore"+3).value); var s4= parseFloat(document.getElementById("FormBScore"+4).value); var s5= parseFloat(document.getElementById("FormBScore"+5).value); var s6= parseFloat(document.getElementById("FormBScore"+6).value); var s7= parseFloat(document.getElementById("FormBScore"+7).value); var s8= parseFloat(document.getElementById("FormBScore"+8).value); var s9= parseFloat(document.getElementById("FormBScore"+9).value); var s10= parseFloat(document.getElementById("FormBScore"+10).value); var s11= parseFloat(document.getElementById("FormBScore"+11).value); var s12= parseFloat(document.getElementById("FormBScore"+12).value); var s13= parseFloat(document.getElementById("FormBScore"+13).value); var s14= parseFloat(document.getElementById("FormBScore"+14).value); var s15= parseFloat(document.getElementById("FormBScore"+15).value); var s16= parseFloat(document.getElementById("FormBScore"+16).value); var s17= parseFloat(document.getElementById("FormBScore"+17).value); var s18= parseFloat(document.getElementById("FormBScore"+18).value); var s19= parseFloat(document.getElementById("FormBScore"+19).value); var s20= parseFloat(document.getElementById("FormBScore"+20).value);
  
  var P = document.getElementById("FormBSum").value=Math.round((s1+s2+s3+s4+s5+s6+s7+s8+s9+s10+s11+s12+s13+s14+s15+s16+s17+s18+s19+s20)*100)/100; document.getElementById("AppBehaviFormBScore"+SnoB).value=Math.round((P)*100)/100; 
  var FormB=document.getElementById("FormBScore").value=Math.round((P)*100)/100; 
  var Score2=document.getElementById("Score_2").value=Math.round(((FormB*Weight_B)/100)*100)/100;
  var Score12=document.getElementById("TotalScore_12").value=Math.round((Score_1+Score2)*100)/100;

  var Rating12=parseFloat(document.getElementById("TotalRating_12").value);
  var Num = parseFloat(document.getElementById("Number").value);
  for(var i=1; i<=Num; i++) 
  { SFrom = parseFloat(document.getElementById("SFrom_"+i).value); 
    STo = parseFloat(document.getElementById("STo_"+i).value); 
    Rating = parseFloat(document.getElementById("Rating_"+i).value); 
	if(Score12>=SFrom && Score12<=STo){document.getElementById("TotalRating_12").value=Rating;} 
  } 
}		


function FunTgt(sn,kid,prd,tgt,wgt,lgc)
{ var e=document.getElementById("e").value; var eid=document.getElementById("empiid").value; 
  document.getElementById('tsn').value=sn; 
  var win = window.open("setkrapptgtpms.php?act=setkratgt&n=1&valueins=true&checkalpha=false&d=12&pa=4&y=2&kid="+kid+"&prd="+prd+"&yy=t1t&tgt="+tgt+"&e="+e+"&lgc="+lgc+"&wgt="+wgt+"&eid="+eid+"&sn="+sn, "QForm", "menubar=no,scrollbars=yes,resizable=no,directories=no,width=1200,height=600"); 
  var timer = setInterval( function()
                          {   
						   if(win.closed) 
						   { clearInterval(timer); var url = 'setkrapptgtactpms.php'; var pars = 'tact=tgtact&n==1&kid='+kid+'&sn='+sn; var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_NewDE }); } 
						  }, 1000);
}
function show_NewDE(originalRequest)
{ document.getElementById('NewSpam').innerHTML = originalRequest.responseText; 
  //document.getElementById('AppKRARating'+document.getElementById('tsn').value).value=document.getElementById('tAch').value; 
  document.getElementById('AppKRARating'+document.getElementById('tsn').value).value=document.getElementById('tLogScr').value; 
  document.getElementById('AppKRAScore'+document.getElementById('tsn').value).value=document.getElementById('tScor').value;
  document.getElementById('AppKRALogic'+document.getElementById('tsn').value).value=document.getElementById('tLogScr').value;
  FunCal();
} 

function FunSubTgt(sn,sn2,kid,prd,tgt,wgt,lgc)
{ var e=document.getElementById("e").value; var eid=document.getElementById("empiid").value;
  document.getElementById('tsn').value=sn; document.getElementById('tsn2').value=sn2;
  var win =  window.open("setkrapptgtpms.php?act=setkratgt&n=2&valueins=true&checkalpha=false&d=12&pa=4&y=2&kid="+kid+"&prd="+prd+"&yy=t1t&tgt="+tgt+"&e="+e+"&lgc="+lgc+"&wgt="+wgt+"&eid="+eid+"&sn="+sn, "QForm", "menubar=no,scrollbars=yes,resizable=no,directories=no,width=1200,height=600");
 var timer = setInterval( function()
                          {   
						   if(win.closed) 
						   { clearInterval(timer); var url = 'setkrapptgtactpms.php'; var pars = 'tact=subtgtact&n==2&kid='+kid+'&sn='+sn+'&sn2='+sn2; var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_NewDEE }); } 
						  }, 1000); 
}
function show_NewDEE(originalRequest)
{ document.getElementById('NewSpam').innerHTML = originalRequest.responseText; 
  //document.getElementById('AppKRARating'+document.getElementById('tsn').value+'_'+document.getElementById('tsn2').value).value=document.getElementById('tAch').value; 
  document.getElementById('AppKRARating'+document.getElementById('tsn').value+'_'+document.getElementById('tsn2').value).value=document.getElementById('tLogScr').value; 
  document.getElementById('AppKRAScore'+document.getElementById('tsn').value+'_'+document.getElementById('tsn2').value).value=document.getElementById('tScor').value;
  document.getElementById('AppKRALogic'+document.getElementById('tsn').value+'_'+document.getElementById('tsn2').value).value=document.getElementById('tLogScr').value;
  FunCal();
}

function Validation()
{ var EmpDesig=document.getElementById("EmpDesig").value; var EmpGrade=document.getElementById("EmpGrade").value; var AppRemark=document.getElementById("AppRemarks").value;
  var DesigId=document.getElementById("DesigId").value; var GradeId=document.getElementById("GradeId").value;
  var Justification=document.getElementById("Justification").value; 
  if (EmpDesig!=DesigId && Justification.length === 0) { alert("Please type Justification !");  return false; }
  if (EmpGrade!=GradeId && Justification.length === 0) { alert("Please type Justification !");  return false; }
  if (AppRemark.length === 0) { alert("Appraiser remark field can't be blank.");  return false; }
}

function FunCal()
{
 for(var i=1; i<=document.getElementById("EmpKraRow").value; i++) 
 { 
  if(document.getElementById("rowSubK"+i).value>0)
  { 
   for(var j=1; j<=document.getElementById("rowSubK"+i).value; j++)
   {document.getElementById("KraScoreSub"+i+"_"+j).value=document.getElementById("AppKRAScore"+i+"_"+j).value;}
     
   var s1s= parseFloat(document.getElementById("KraScoreSub"+i+"_1").value); var s2s= parseFloat(document.getElementById("KraScoreSub"+i+"_2").value); var s3s= parseFloat(document.getElementById("KraScoreSub"+i+"_3").value); var s4s= parseFloat(document.getElementById("KraScoreSub"+i+"_4").value); var s5s= parseFloat(document.getElementById("KraScoreSub"+i+"_5").value); document.getElementById("AppKRAScore"+i).value=Math.round((s1s+s2s+s3s+s4s+s5s)*100)/100; document.getElementById("KraScore"+i).value=Math.round((s1s+s2s+s3s+s4s+s5s)*100)/100;
  }
 }
 FunCal2();
}

function FunCal2()
{
 var Sno=document.getElementById("Sno").value;
 for(var i=1; i<=document.getElementById("EmpKraRow").value; i++) 
 { document.getElementById("KraScore"+i).value=document.getElementById("AppKRAScore"+i).value; }
 var s1= parseFloat(document.getElementById("KraScore"+1).value); var s2= parseFloat(document.getElementById("KraScore"+2).value); var s3= parseFloat(document.getElementById("KraScore"+3).value); var s4= parseFloat(document.getElementById("KraScore"+4).value); var s5= parseFloat(document.getElementById("KraScore"+5).value); var s6= parseFloat(document.getElementById("KraScore"+6).value); var s7= parseFloat(document.getElementById("KraScore"+7).value); var s8= parseFloat(document.getElementById("KraScore"+8).value); var s9= parseFloat(document.getElementById("KraScore"+9).value); var s10= parseFloat(document.getElementById("KraScore"+10).value); var s11= parseFloat(document.getElementById("KraScore"+11).value); var s12= parseFloat(document.getElementById("KraScore"+12).value); var s13= parseFloat(document.getElementById("KraScore"+13).value); var s14= parseFloat(document.getElementById("KraScore"+14).value); var s15= parseFloat(document.getElementById("KraScore"+15).value); var s16= parseFloat(document.getElementById("KraScore"+16).value); var s17= parseFloat(document.getElementById("KraScore"+17).value); var s18= parseFloat(document.getElementById("KraScore"+18).value); var s19= parseFloat(document.getElementById("KraScore"+19).value); var s20= parseFloat(document.getElementById("KraScore"+20).value);
 var q = document.getElementById("KraSum").value=Math.round((s1+s2+s3+s4+s5+s6+s7+s8+s9+s10+s11+s12+s13+s14+s15+s16+s17+s18+s19+s20)*100)/100; document.getElementById("AppFormAScore"+Sno).value=Math.round((q)*100)/100;
   var FormA=document.getElementById("FormAScore").value=Math.round((q)*100)/100;
   
   var Weight_A=parseFloat(document.getElementById("weight_A").value);
   var Score_1=parseFloat(document.getElementById("Score_1").value); 
   var Score_2=parseFloat(document.getElementById("Score_2").value);
   var Score1=document.getElementById("Score_1").value=Math.round(((FormA*Weight_A)/100)*100)/100;
   var Score12=document.getElementById("TotalScore_12").value=Math.round((Score1+Score_2)*100)/100;
   var Num = parseFloat(document.getElementById("Number").value);
   for(var i=1; i<=Num; i++) 
   { SFrom = parseFloat(document.getElementById("SFrom_"+i).value); 
     STo = parseFloat(document.getElementById("STo_"+i).value); 
     Rating = parseFloat(document.getElementById("Rating_"+i).value); 
	 if(Score12>=SFrom && Score12<=STo){document.getElementById("TotalRating_12").value=Rating;} 
   } 
}




function FunFormBTgt(sn,yid,fbid,prd,tgt,wgt,lgc)
{ var e=document.getElementById("e").value; var c=document.getElementById("ComId").value; 
  document.getElementById('tsn').value=sn;  var eid=document.getElementById("empiid").value;
  var win = window.open("setkrapptgtformbpms.php?act=setkratgt&n=1&valueins=true&checkalpha=false&d=12&pa=4&y=2&fbid="+fbid+"&prd="+prd+"&yy=t1t&tgt="+tgt+"&e="+e+"&lgc="+lgc+"&wgt="+wgt+"&yid="+yid+"&c="+c+"&eid="+eid, "QForm", "menubar=no,scrollbars=yes,resizable=no,directories=no,width=1200,height=600"); 
  var timer = setInterval( function()
                          {   
						   if(win.closed) 
						   { clearInterval(timer); var url = 'setkrapptgtformbactpms.php'; var pars = 'tact=tgtact&n==1&fbid='+fbid+'&sn='+sn+'&e='+e+'&yid='+yid+"&eid="+eid; var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_NewDEBB }); } 
						  }, 1000); 
  
}
function show_NewDEBB(originalRequest)
{ document.getElementById('NewSpam').innerHTML = originalRequest.responseText; 
 document.getElementById('AppFormBRating'+document.getElementById('tsn').value).value=document.getElementById('tLogScr').value; 
  document.getElementById('AppFormBScore'+document.getElementById('tsn').value).value=document.getElementById('tScor').value;
  document.getElementById('AppBLogic'+document.getElementById('tsn').value).value=document.getElementById('tLogScr').value;
  FunCalFormB();
} 


function FunFormBSubTgt(sn,sn2,yid,fbid,prd,tgt,wgt,lgc)
{ var e=document.getElementById("e").value; var c=document.getElementById("ComId").value; 
  var eid=document.getElementById("empiid").value;
  document.getElementById('tsn').value=sn; document.getElementById('tsn2').value=sn2;
  var win = window.open("setkrapptgtformbpms.php?act=setkratgt&n=2&valueins=true&checkalpha=false&d=12&pa=4&y=2&fbid="+fbid+"&prd="+prd+"&yy=t1t&tgt="+tgt+"&e="+e+"&lgc="+lgc+"&wgt="+wgt+"&yid="+yid+"&c="+c+"&eid="+eid, "QForm", "menubar=no,scrollbars=yes,resizable=no,directories=no,width=1200,height=600"); 
  var timer = setInterval( function()
                          {   
						   if(win.closed) 
						   { clearInterval(timer); var url = 'setkrapptgtformbactpms.php'; var pars = 'tact=subtgtact&n==2&fbid='+fbid+'&sn='+sn+'&sn2='+sn2+'&e='+e+'&yid='+yid+"&eid="+eid; var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_NewDEEBB }); } 
						  }, 1000);
  
} 
function show_NewDEEBB(originalRequest)
{ document.getElementById('NewSpam').innerHTML = originalRequest.responseText;

document.getElementById('BSelfRatingB'+document.getElementById('tsn').value+'_'+document.getElementById('tsn2').value).value=document.getElementById('tLogScr').value; 
  
  document.getElementById('BEmpBScore'+document.getElementById('tsn').value+'_'+document.getElementById('tsn2').value).value=document.getElementById('tScor').value; 
  document.getElementById('EmpBLogic'+document.getElementById('tsn').value+'_'+document.getElementById('tsn2').value).value=document.getElementById('tLogScr').value;
  FunCalFormB();
}

function FunCalFormB()
{
 for(var i=1; i<=document.getElementById("EmpFormBRow").value; i++) 
 { 
  if(document.getElementById("rowSubB"+i).value>0)
  { 
   for(var j=1; j<=document.getElementById("rowSubB"+i).value; j++)
   {document.getElementById("BAppBScoreSub"+i+"_"+j).value=document.getElementById("BEmpBScore"+i+"_"+j).value;}
     
   var s1s= parseFloat(document.getElementById("BAppBScoreSub"+i+"_1").value); var s2s= parseFloat(document.getElementById("BAppBScoreSub"+i+"_2").value); var s3s= parseFloat(document.getElementById("BAppBScoreSub"+i+"_3").value); var s4s= parseFloat(document.getElementById("BAppBScoreSub"+i+"_4").value); var s5s= parseFloat(document.getElementById("BAppBScoreSub"+i+"_5").value); document.getElementById("AppFormBScore"+i).value=Math.round((s1s+s2s+s3s+s4s+s5s)*100)/100; document.getElementById("FormBScore"+i).value=Math.round((s1s+s2s+s3s+s4s+s5s)*100)/100;
  }
 }
 FunCalFormB2();
}


function FunCalFormB2()
{
 var Sno=document.getElementById("SnoB").value; 
 for(var i=1; i<=document.getElementById("EmpFormBRow").value; i++) 
 { document.getElementById("FormBScore"+i).value=document.getElementById("AppFormBScore"+i).value;  }
 var s1= parseFloat(document.getElementById("FormBScore"+1).value); var s2= parseFloat(document.getElementById("FormBScore"+2).value); var s3= parseFloat(document.getElementById("FormBScore"+3).value); var s4= parseFloat(document.getElementById("FormBScore"+4).value); var s5= parseFloat(document.getElementById("FormBScore"+5).value); var s6= parseFloat(document.getElementById("FormBScore"+6).value); var s7= parseFloat(document.getElementById("FormBScore"+7).value); var s8= parseFloat(document.getElementById("FormBScore"+8).value); var s9= parseFloat(document.getElementById("FormBScore"+9).value); var s10= parseFloat(document.getElementById("FormBScore"+10).value); var s11= parseFloat(document.getElementById("FormBScore"+11).value); var s12= parseFloat(document.getElementById("FormBScore"+12).value); var s13= parseFloat(document.getElementById("FormBScore"+13).value); var s14= parseFloat(document.getElementById("FormBScore"+14).value); var s15= parseFloat(document.getElementById("FormBScore"+15).value); var s16= parseFloat(document.getElementById("FormBScore"+16).value); var s17= parseFloat(document.getElementById("FormBScore"+17).value); var s18= parseFloat(document.getElementById("FormBScore"+18).value); var s19= parseFloat(document.getElementById("FormBScore"+19).value); var s20= parseFloat(document.getElementById("FormBScore"+20).value); 
 var q = document.getElementById("FormBSum").value=Math.round((s1+s2+s3+s4+s5+s6+s7+s8+s9+s10+s11+s12+s13+s14+s15+s16+s17+s18+s19+s20)*100)/100; document.getElementById("AppBehaviFormBScore"+Sno).value=Math.round((q)*100)/100;


 for(var i=1; i<=document.getElementById("EmpFormBRow").value; i++)
  { 
   /*var FormBWeight = parseFloat(document.getElementById("WeightageFormB_"+i).value); var FormBTarget = parseFloat(document.getElementById("TargetFormB_"+i).value); var AppFormBRating = parseFloat(document.getElementById("AppFormBRating"+i).value); var AppFormBScore = parseFloat(document.getElementById("AppFormBScore"+i).value);
   var NewAppFormBScore=document.getElementById("AppFormBScore"+i).value=Math.round(((AppFormBRating/FormBTarget)*FormBWeight)*100)/100;*/ 
   var NewAppFormBScore=document.getElementById("AppFormBScore"+i).value;
   var Score=document.getElementById("FormBScore"+i).value=Math.round((NewAppFormBScore)*100)/100;
  } 
  
  var SnoB=document.getElementById("SnoB").value;  var Weight_B=parseFloat(document.getElementById("weight_B").value); 
  var Score_1=parseFloat(document.getElementById("Score_1").value); 
  var Score_2=parseFloat(document.getElementById("Score_2").value);
  
  var s1= parseFloat(document.getElementById("FormBScore"+1).value); var s2= parseFloat(document.getElementById("FormBScore"+2).value); var s3= parseFloat(document.getElementById("FormBScore"+3).value); var s4= parseFloat(document.getElementById("FormBScore"+4).value); var s5= parseFloat(document.getElementById("FormBScore"+5).value); var s6= parseFloat(document.getElementById("FormBScore"+6).value); var s7= parseFloat(document.getElementById("FormBScore"+7).value); var s8= parseFloat(document.getElementById("FormBScore"+8).value); var s9= parseFloat(document.getElementById("FormBScore"+9).value); var s10= parseFloat(document.getElementById("FormBScore"+10).value); var s11= parseFloat(document.getElementById("FormBScore"+11).value); var s12= parseFloat(document.getElementById("FormBScore"+12).value); var s13= parseFloat(document.getElementById("FormBScore"+13).value); var s14= parseFloat(document.getElementById("FormBScore"+14).value); var s15= parseFloat(document.getElementById("FormBScore"+15).value); var s16= parseFloat(document.getElementById("FormBScore"+16).value); var s17= parseFloat(document.getElementById("FormBScore"+17).value); var s18= parseFloat(document.getElementById("FormBScore"+18).value); var s19= parseFloat(document.getElementById("FormBScore"+19).value); var s20= parseFloat(document.getElementById("FormBScore"+20).value);
  
  var P = document.getElementById("FormBSum").value=Math.round((s1+s2+s3+s4+s5+s6+s7+s8+s9+s10+s11+s12+s13+s14+s15+s16+s17+s18+s19+s20)*100)/100; document.getElementById("AppBehaviFormBScore"+SnoB).value=Math.round((P)*100)/100; 
  var FormB=document.getElementById("FormBScore").value=Math.round((P)*100)/100; 
  var Score2=document.getElementById("Score_2").value=Math.round(((FormB*Weight_B)/100)*100)/100;
  var Score12=document.getElementById("TotalScore_12").value=Math.round((Score_1+Score2)*100)/100;

  var Rating12=parseFloat(document.getElementById("TotalRating_12").value);
  var Num = parseFloat(document.getElementById("Number").value);
  for(var i=1; i<=Num; i++) 
  { SFrom = parseFloat(document.getElementById("SFrom_"+i).value); 
    STo = parseFloat(document.getElementById("STo_"+i).value); 
    Rating = parseFloat(document.getElementById("Rating_"+i).value); 
	if(Score12>=SFrom && Score12<=STo){document.getElementById("TotalRating_12").value=Rating;} 
  } 


}




function doBlink() 
{ var blink = document.all.tags("BLINK")
  for (var i=0; i<blink.length; i++) blink[i].style.visibility = blink[i].style.visibility == "" ? "hidden" : "" }
function startBlink() {	if (document.all)setInterval("doBlink()",1000) } window.onload = startBlink;
</script>
</head>
<body class="body" onLoad="FunCal()">
<span id="NewSpam"></span>
<input type="hidden" id="tsn" value="0" />
<input type="hidden" id="tsn2" value="0" />
<?php for($i=1; $i<=20; $i++) { ?><input type="hidden" id="KraScore<?php echo $i; ?>" value="0" /><?php } ?>
<input type="hidden" id="KraSum" value="0"/>
<?php for($j=1; $j<=20; $j++) { ?><input type="hidden" id="FormBScore<?php echo $j; ?>" value="0" /><?php } ?>
<input type="hidden" id="FormBSum" value="0"/>
<?php $sqlRat=mysql_query("select ScoreFrom,ScoreTo,Rating from hrm_pms_rating where RatingStatus='A' AND YearId=".$_SESSION['PmsYId']." AND CompanyId=".$CompanyId, $con); $Sn=1; while($resRat=mysql_fetch_array($sqlRat)) {  ?>
<input type="hidden" id="SFrom_<?php echo $Sn; ?>" value="<?php echo $resRat['ScoreFrom']; ?>" />
<input type="hidden" id="STo_<?php echo $Sn; ?>" value="<?php echo $resRat['ScoreTo']; ?>" />
<input type="hidden" id="Rating_<?php echo $Sn; ?>" value="<?php echo $resRat['Rating']; ?>" />
<?php $Sn++; } $n=$Sn-1; ?><input type="hidden" id="Number" value="<?php echo $n; ?>" />	
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table></td></tr>
<tr>
 <td>
 <table width="100%" style="margin-top:0px;">
  <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
  <tr>
   <td valign="top" style="background-image:url(images/pmsback.png);width:100%;">
   <table border="0" style="width:100%;height:500px;float:none;" cellpadding="0">
   <tr>
    <td valign="top" style="width:100%;">      
    <table border="0" id="Activity" style="width:100%;">
	<tr>
     <td style="width:100%;" valign="top">
	 <table border="0" style="width:100%;">
<?php //*************************************** Start ********************************************* ?>	
<?php //*************************************** Start ********************************************* ?>
					
<tr>
 <td style="background-image:url(images/pmsback.png);width:100%;">	 
 <table style="width:100%;">
<!--  Head Parts Open Open Open  --> 
<!--  Head Parts Open Open Open  --> 
 <tr>
  <td>
   <table>
    <tr>
<?php if($_SESSION['EmpType']=='E'){ ?>
<td align="center" valign="top"><a href="pms.php?log=<?php echo $_SESSION['logCheckEmp']; ?>&ee=0&aa=1&rr=1&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=0&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_emp1" src="images/emp1.png" border="0"/></a></td>

<?php } if($_SESSION['BtnApp']>0) { ?>
<td align="center" valign="top"><img id="Img_manager1" src="images/manager.png" border="0"/></td>
		   
<?php } if($_SESSION['BtnRev']>0) { ?><td align="center" valign="top"><a href="HodPms.php?ee=1&aa=1&rr2=1&rr=0&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=0&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" src="images/hod1.png" border="0"/></a></td>

<?php } if($_SESSION['BtnRev2']>0) { ?><td align="center" valign="top"><a href="Rev2HodPms.php?ee=1&rr2=0&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=0&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" src="images/RevHod1.png" border="0"/></a></td>	
		   
<?php } if($_SESSION['BtnHod']>0) { ?><td align="center" valign="top"><a href="RevHodPms.php?ee=1&rr2=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=0&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" src="images/m1.png" border="0"/></a></td><?php } ?>

<td><font class="msg_b"><i><?php echo $msg; ?></i></font><font class="formc"><span id="MsgSpan"></span></font></td>	 
	</tr>
   </table>
  </td>
 </tr>
 
 <tr><td style="vertical-align:top;width:100%;"><?php include("SetKraPmsma.php"); ?></td></tr>
<!--  Head Parts Close Close Close  --> 
<!--  Head Parts Close Close Close  --> 
 
  <tr>
    <td style="width:100%;">
	  <table border="0" style="width:100%;">
	    <tr>
<?php /****************************************** Form Start **************************/ ?> 	 
<?php /***************** AppraisalForm **************************/ ?>
<td id="AppraisalForm" style="display:block;width:100%;">
<table border="0">   
  <tr>
   <td width="100%">
   <table border="0" width="100%">
	<tr>
<?php //************************************************ Start ******************************// ?>
<input type="hidden" id="e" value="<?php echo $EmployeeId; ?>"/>
<input type="hidden" id="empiid" value="<?php echo $_REQUEST['Eid']; ?>"/>
    <td id="EmpkraStatus" style="display:block;width:100%;">

<?php 
if(isset($_REQUEST['Id']) && $_REQUEST['Id']!="")
{ 
 $Id = $_REQUEST['Id']; $Eid = $_REQUEST['Eid']; $YearId = $_REQUEST['Yid']; 
 $sqlApp=mysql_query("select p.*,EmpCode,Fname,Sname,Lname from hrm_employee_pms p inner join hrm_employee e on p.EmployeeID=e.EmployeeID where p.AssessmentYear=".$_SESSION['PmsYId']." AND p.EmployeeID=".$Eid,$con); 
 $resApp=mysql_fetch_array($sqlApp); ?> 
	   
<table border="0" style="width:100%;">
 <tr><td align="center" class="head"><u>Appraisal Form</u></td></tr>
 <tr><td></td></tr>
 <tr>
  <td class="head" align="center">
  &nbsp;EmpCode :&nbsp;<font class="body2"><?php echo $resApp['EmpCode']; ?></font>
  &nbsp;&nbsp;Name :&nbsp;<font class="body2"><?php echo ucfirst(strtolower($resApp['Fname'].' '.$resApp['Sname'].' '.$resApp['Lname'])); ?></font>
  </td>
 </tr>

 <!-- //1111111111111 OPEN -->
 <?php if($_SESSION['eAppform']=='Y'){ ?>
 <tr><td class="bdy"><b><i>(Achievement)</i></b></td></tr>
 <tr>
  <td id="Achivement">
   <table border="1" style="width:100%;" cellspacing="0">
<?php $sqlAc=mysql_query("select * from hrm_employee_pms_achivement where EmpPmsId=".$resApp['EmpPmsId']." order by AchivementId ASC", $con); $Sno=1; while($resAc=mysql_fetch_array($sqlAc)){?>   
    <tr bgcolor="#FFF" style="height:24px;">	   
     <td class="h" style="width:3%;background-color:#FFFF6C;" valign="top"><?php echo $Sno; ?></td>	  
	 <td class="bl" style="width:97%;background-color:#FFFFFF;">&nbsp;<?php echo $resAc['Achivement']; ?></td>  
    </tr>
<?php $Sno++;} ?>
   </table>
  </td>
 </tr>
 
 <tr><td>&nbsp;</td></tr>
 <tr><td class="bdy"><b><i>(Feedback)</i></b></td></tr>
 <tr>
  <td id="Achivement">
   <table border="1" style="width:100%;" cellspacing="0">
<?php $sqlW=mysql_query("select * from hrm_employee_pms_workenvironment where EmpPmsId=".$resApp['EmpPmsId']." order by EmpWorkEnvId ASC", $con); $SnoB=1; while($resW=mysql_fetch_array($sqlW)){ ?>   
    <tr bgcolor="#FFF" style="height:24px;">	   
     <td class="h" style="width:3%;background-color:#FFFF6C;" valign="top"><?php echo $SnoB; ?></td>	  
	 <td class="bl" style="width:97%;background-color:#C5FF8A;">&nbsp;<?php echo $resW['WorkEnvironment']; ?></td>  
    </tr>
	<tr bgcolor="#FFF" style="height:24px;">	   
     <td class="h" style="width:3%;background-color:#FFFF6C;" valign="top">Ans.</td>	  
	 <td class="bl" style="width:97%;background-color:#FFFFFF;">&nbsp;<?php echo $resW['Answer']; ?></td>  
    </tr>
<?php $SnoB++;} ?>
   </table>
  </td>
 </tr> 
  
 <tr><td>&nbsp;</td></tr>
 <?php } ?> 
 <!-- //1111111111111 CLOSE --> 
  
 <!-- //2222222222222222 Open --> 
 <?php if($_SESSION['eAppform']=='Y' OR $_SESSION['eMidform']=='Y'){ ?>	
 <tr><td class="bdy"><b><i>Form-A(KRA)</i></b></td></tr>
 <tr>
 <form name="AppraisalForm" method="post" onSubmit="return Validation(this)">
  <input type="hidden" id="ComId" name="ComId" value="<?php echo $CompanyId; ?>" />
  <input type="hidden" id="PmsId" name="PmsId" value="<?php echo $resApp['EmpPmsId']; ?>" />
  <input type="hidden" id="EmpId" name="EmpId" value="<?php echo $Eid; ?>" /> 
  <td style="width:100%;">
   <table border="0" cellspacing="1" style="width:100%;">
	<tr bgcolor="#FFFF53" style="height:25px;">
	 <td class="fhead" style="width:3%;">Sn</td>
     <td class="fhead" style="width:15%;">KRA/Goals</td>
     <td class="fhead" style="width:25%;">Description</td>  
     <td class="fhead" style="width:5%;">Measure</td>
     <td class="fhead" style="width:5%;">Unit</td>
     <td class="fhead" style="width:4%;">Weigh<br>tage</td>
     <td class="fhead" style="width:5%;">Logic</td>
     <td class="fhead" style="width:5%;">Period</td>
     <td class="fhead" style="width:5%;">Target</td>
	 <?php if($_SESSION['eAppform']=='Y' OR $_SESSION['eMidform']=='Y'){ ?>	
	 <td class="fhead" style="width:5%;">Self Rating</td>
	 <td class="fhead" style="width:15%;">Remarks</td>
	 <td class="fhead" style="width:5%;"><b>Appraiser Ass.</b></td>
	 <?php /*?><td class="fhead" style="width:4%;">Allow Logic</td><?php */?>
	 <td class="fhead" style="width:5%;"><b>Score</b></td>
	 <td class="fhead" style="width:15%;"><b>Appraiser Remark</b></td>
	 <?php } ?>
    </tr>
<?php $sql2=mysql_query("select * from hrm_employee_pms_kraforma where KRAFormAStatus='A' AND EmpPmsId=".$resApp['EmpPmsId']." order by KRAFormAId ASC", $con); $Sno=1; while($res2=mysql_fetch_array($sql2)){ 
	 $sqlK2=mysql_query("select * from hrm_pms_kra where KRAId=".$res2['KRAId'], $con); $resK2=mysql_fetch_array($sqlK2);
	 $sSubK=mysql_query("select * from hrm_pms_krasub where KRAId=".$res2['KRAId']." AND KSubStatus='A' order by KRASubId ASC",$con); $rowSubK=mysql_num_rows($sSubK); $n=0;
	  if($resK2['Period']=='Monthly' OR $resK2['Period']=='Quarter' OR $resK2['Period']=='1/2 Annual'){ $n=1; $sqlt=mysql_query("select SUM(Ach) as tAche, SUM(LogScr) as tELogScr, SUM(AppAch) as tAch, SUM(AppLogScr) as tLogScr, SUM(AppScor) as tScor from hrm_pms_kra_tgtdefin where KRAId=".$resK2['KRAId'],$con); $rest=mysql_fetch_assoc($sqlt); }else{$n=0;} ?>
	  	
	 <input type="hidden" id="KRAFormAId_<?php echo $Sno; ?>" name="KRAFormAId_<?php echo $Sno; ?>" value="<?php echo $res2['KRAFormAId']; ?>" /><input type="hidden" id="WeightageKRA_<?php echo $Sno; ?>"  value="<?php echo $res2['Weightage']; ?>" /><input type="hidden" id="LogicKRA_<?php echo $Sno; ?>"  value="<?php echo $res2['Logic']; ?>" /><input type="hidden" id="PeriodKRA_<?php echo $Sno; ?>"  value="<?php echo $res2['Period']; ?>" /><input type="hidden" id="TargetKRA_<?php echo $Sno; ?>" name="TargetKRA_<?php echo $Sno; ?>" value="<?php echo $res2['Target']; ?>" />	
		
     <tr bgcolor="#FFFFFF" style="height:25px;">
      <td class="fbodyc"><b><?php echo $Sno; ?></b></td>
      <td class="fbody"><?php echo $resK2['KRA']; ?></td>
      <td class="fbody"><?php echo $resK2['KRA_Description']; ?></td>
      <td class="fbodyc"><?php if($rowSubK>0){echo '';}else{echo $resK2['Measure'];} ?></td>
      <td class="fbodyc"><?php if($rowSubK>0){echo '';}else{echo $resK2['Unit'];} ?></td>
      <td class="fbodyc"><?php echo floatval($res2['Weightage']); ?></td>
      <td class="fbodyc"><?php echo $res2['Logic']; ?></td>
      <td class="fbodyc"><?php echo $res2['Period']; ?></td>
      <td class="fbodyc" style="background-color:<?php if($res2['Period']!='Annual' AND $res2['Period']!=''){echo '#B9DCFF';}else{echo '#FFFFFF';} ?>;"><span style="text-decoration:<?php if($res2['Period']!='Annual' AND $res2['Period']!=''){ echo 'underline'; }else{echo 'none';}?>;color:<?php if($res2['Period']!='Annual' AND $res2['Period']!=''){ echo '#000099'; }else{echo '#000';}?>;cursor:<?php if($res2['Period']!='Annual' AND $res2['Period']!=''){echo 'pointer';} ?>;" maxlength="8" <?php if($res2['Period']!='Annual' AND $res2['Period']!=''){?> onClick="FunTgt(<?php echo $Sno.','.$res2['KRAId']; ?>,'<?php echo $res2['Period']; ?>',<?php echo $res2['Target'].','.intval($res2['Weightage']); ?>,'<?php echo $res2['Logic']; ?>')" <?php } ?> ><?php if($rowSubK>0){echo '';}else{echo floatval($res2['Target']);}?></span></td>
      <?php /*?>onMouseOver="FunTgt(<?php echo $Sno.','.$res2['KRAId']; ?>,'<?php echo $res2['Period']; ?>',<?php echo $res2['Target'].','.intval($res2['Weightage']); ?>,'<?php echo $res2['Logic']; ?>')"<?php */?>
	  
	  <?php if($_SESSION['eAppform']=='Y' OR $_SESSION['eMidform']=='Y'){ ?>
      <td class="fbodyc" style="color:<?php if($rowSubK>0){echo '#FFFFFF';}?>;"><?php if($_SESSION['eAppform']=='Y'){ if($n==1){echo floatval($rest['tELogScr']);}else{echo floatval($res2['SelfRating']);} }elseif($_SESSION['eMidform']=='Y'){ echo $res2['Mid_SelfRating']; } ?></td>
      <td class="fbody" valign="top"><?php if($_SESSION['eAppform']=='Y'){ echo $res2['AchivementRemark']; }elseif($_SESSION['eMidform']=='Y'){echo $res2['Mid_AchivementRemark']; } ?></td>
	  
      <td class="fbodyc"><input type="<?php if($rowSubK>0){echo 'hidden';}else{echo 'text';} ?>" id="AppKRARating<?php echo $Sno; ?>" name="AppKRARating<?php echo $Sno; ?>" style="font-family:Times New Roman;background-color:<?php if($rowSubK>0 OR $n==1){echo '#FFFFFF';}else{echo '#B9DCFF';} ?>; font-size:12px;width:100%;height:24px;text-align:center;" maxlength="10" value="<?php if($n==1){ echo floatval($rest['tLogScr']); }elseif($_SESSION['eAppform']=='Y'){ echo floatval($res2['AppraiserRating']); }elseif($_SESSION['eMidform']=='Y'){echo $res2['Mid_AppraiserRating']; }  ?>" <?php if($n==0){ ?> onKeyUp="EnterAppKra(<?php echo $res2['KRAFormAId'].','.$Sno; ?>)" onChange="EnterAppKra(<?php echo $res2['KRAFormAId'].','.$Sno; ?>)" <?php } ?> oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" <?php if($resApp['Appraiser_PmsStatus']==2 OR $rowSubK>0 OR $n==1) { echo 'readonly'; } ?> />
	 
	  <input type="hidden" id="AppKRALogic<?php echo $Sno; ?>" name="AppKRALogic<?php echo $Sno;?>" style="font-family:Times New Roman;font-size:12px;background-color:#FFFFFF;width:100%;height:24px;text-align:center;border:hidden;" value="<?php if($rowSubK>0){echo '';}elseif($n==1){ echo floatval($rest['tLogScr']); }elseif($_SESSION['eAppform']=='Y'){ echo $res2['AppraiserLogic'];}elseif($_SESSION['eMidform']=='Y'){echo $res2['Mid_AppraiserLogic']; }else{echo 0;} ?>" readonly/></td>
	  
	  <?php /*?><td align="center" class="fbody"><input type="text" id="AppKRALogic<?php echo $Sno; ?>" name="AppKRALogic<?php echo $Sno;?>" style="font-family:Times New Roman;font-size:12px;background-color:#FFFFFF;width:60px;height:22px;text-align:center;border:hidden;" value="<?php if($rowSubK>0){echo '';}elseif($n==1){ echo floatval($rest['tLogScr']); }elseif($_SESSION['eAppform']=='Y'){ echo $res2['AppraiserLogic'];}elseif($_SESSION['eMidform']=='Y'){echo $res2['Mid_AppraiserLogic']; }else{echo 0;} ?>" readonly/></td><?php */?>
	  
      <td class="fbodyc"><input type="text" id="AppKRAScore<?php echo $Sno; ?>" name="AppKRAScore<?php echo $Sno; ?>" style="font-family:Times New Roman;font-size:12px;width:100%;height:24px;text-align:center;border:hidden;background-color:#FF9DFF;font-weight:bold;" value="<?php if($n==1){ echo floatval($rest['tScor']); }elseif($_SESSION['eAppform']=='Y'){ echo floatval($res2['AppraiserScore']); }elseif($_SESSION['eMidform']=='Y'){echo $res2['Mid_AppraiserScore']; } ?>"  readonly/>
 <input type="hidden" name="KRAFormAId<?php echo $Sno; ?>" value="<?php echo $res2['KRAFormAId']; ?>" />
 <input type="hidden" id="rowSubK<?php echo $Sno; ?>" name="rowSubK<?php echo $Sno; ?>" value="<?php echo $rowSubK; ?>" />
      </td>
	  
	  <td class="fbodyc" valign="top"><textarea type="text" id="AppKRARemark<?php echo $Sno; ?>" name="AppKRARemark<?php echo $Sno; ?>" style="font-family:Times New Roman;background-color:#B9DCFF';font-size:12px;" rows="1" cols="10" maxlength="200" value="" <?php if($resApp['Appraiser_PmsStatus']==2 OR $rowSubK>0){ echo 'readonly'; } ?> ><?php echo $res2['AppraiserRemark'];?></textarea>
	  </td>
	  
      <?php } else { ?>
      <input type="hidden" id="AppKRARating<?php echo $Sno; ?>" name="AppKRARating<?php echo $Sno; ?>" value="0" />
	  <input type="hidden" id="AppKRARemark<?php echo $Sno; ?>" name="AppKRARemark<?php echo $Sno; ?>" value="" />
	  <input type="hidden" name="AppKRALogic<?php echo $Sno; ?>" id="AppKRALogic<?php echo $Sno; ?>" value="0"/>
      <input type="hidden" id="AppKRAScore<?php echo $Sno; ?>" name="AppKRAScore<?php echo $Sno; ?>" value="0" />
      <input type="hidden" name="KRAFormAId<?php echo $Sno; ?>" value="<?php echo $res2['KRAFormAId']; ?>" />
      <input type="hidden" id="rowSubK<?php echo $Sno; ?>" name="rowSubK<?php echo $Sno;?>" value="<?php echo $rowSubK;?>"/>
      <?php } ?>
    </tr>

<?php for($i=1; $i<=5; $i++) { ?><input type="hidden" id="KraScoreSub<?php echo $Sno."_".$i; ?>" value="0" /><?php } ?>
<?php  if($rowSubK>0){ ?> 
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& Start Start */ ?>
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& Start Start */ ?>  
 <tr>
  <td colspan="14" align="right" style="border:hidden;border-style:none;">
   <div id="Div<?php echo $Sno; ?>" style="display:<?php if($rowSubK>0){echo 'block';}else{echo 'none';} ?>;">
    <table style="width:97%;background-color:#71FF71;" border="1" cellpadding="0" cellspacing="0"> 
     <tr style="background-color:#71FF71;">  
	  <!--<td rowspan="6" class="Input2a" style="background-color:#71FF71;border:hidden;width:50px;" valign="middle" align="center">Sub<br>KRA</td>--> 
      <td class="fhead2" style="width:3%;">Sn</td>
      <td class="fhead2" style="width:15%;">Sub KRA/Goals</td>
      <td class="fhead2" style="width:20%;">Sub KRA Description</td>  
      <td class="fhead2" style="width:5%;">Measure</td>
      <td class="fhead2" style="width:5%;">Unit</td>
      <td class="fhead2" style="width:5%;">Weigh<br>tage</td>
	  <td class="fhead2" style="width:5%;">Logic</td>
	  <td class="fhead2" style="width:5%;">Period</td>
      <td class="fhead2" style="width:4%;">Target</td>
	  <?php if($_SESSION['eAppform']=='Y' OR $_SESSION['eMidform']=='Y'){ ?>
	  <td class="fhead2" style="width:5%;">Self<br>Rating</td>
	  <td class="fhead2" style="width:10%;">Remarks</td>
	  <td class="fhead2" style="width:5%;"><b>Appraiser Ass.</b></td>
	  <!--<td class="fhead2" style="width:4%;">Allow Logic</td>-->
	  <td class="fhead2" style="width:5%;"><b>Score</b></td>
	  <td class="fhead2" style="width:10%;"><b>Appraiser Remark</b></td>
      <?php } ?>
	  
	  
	 </tr>
<?php if($rowSubK==0){$num=5;}elseif($rowSubK==1){$num=4;}elseif($rowSubK==2){$num=3;}elseif($rowSubK==3){$num=2;}elseif($rowSubK==4){$num=1;}elseif($rowSubK==5){$num=0;} ?>
<?php /* While Open*/ $m=1; while($rSubK=mysql_fetch_assoc($sSubK)){
      $nn=0;
	  if($rSubK['Period']=='Monthly' OR $rSubK['Period']=='Quarter' OR $rSubK['Period']=='1/2 Annual'){ $nn=1; $sqltt=mysql_query("select SUM(Ach) as tAche, SUM(LogScr) as tELogScr,  SUM(AppAch) as tAch, SUM(AppLogScr) as tLogScr, SUM(AppScor) as tScor from hrm_pms_kra_tgtdefin where KRASubId=".$rSubK['KRASubId'],$con); $restt=mysql_fetch_assoc($sqltt); }else{$nn=0;} ?>
<input type="hidden" id="KraId_<?php echo $Sno; ?>" Name="KraId_<?php echo $Sno; ?>" value="<?php echo $res2['KRAId']; ?>" />
<input type="hidden" id="SubKraId_<?php echo $Sno.'_'.$m; ?>" name="SubKraId_<?php echo $Sno.'_'.$m; ?>" value="<?php echo $rSubK['KRASubId']; ?>" />
<?php if($m==1){$n='(a)';}elseif($m==2){$n='(b)';}elseif($m==3){$n='(c)';}elseif($m==4){$n='(d)';}elseif($m==5){$n='(e)';} ?>
     
	 <input type="hidden" id="KraIdNo_a<?php echo $Sno.'_'.$m; ?>">
     <input type="hidden" id="WeightageKRA_<?php echo $Sno.'_'.$m; ?>" value="<?php echo $rSubK['Weightage']; ?>"/>
     <input type="hidden" id="LogicKRA_<?php echo $Sno.'_'.$m; ?>" value="<?php echo $rSubK['Logic']; ?>"/>
     <input type="hidden" id="PeriodKRA_<?php echo $Sno.'_'.$m; ?>" value="<?php echo $rSubK['Period']; ?>"/>
     <input type="hidden" id="TargetKRA_<?php echo $Sno.'_'.$m; ?>" value="<?php echo $rSubK['Target']; ?>"/>
	 
	 <tr style="background-color:#FFFFFF;">  
      <td class="fbodyc"><b style="color:#006FDD;"><?php echo $n; ?></b></td>
      <td class="fbody"><?php echo $rSubK['KRA']; ?></td>
      <td class="fbody"><?php echo $rSubK['KRA_Description']; ?></td>    
      <td class="fbodyc"><?php echo $rSubK['Measure']; ?></td>
      <td class="fbodyc"><?php echo $rSubK['Unit'];?></td>
      <td class="fbodyc"><?php echo floatval($rSubK['Weightage']); ?></td>
      <td class="fbodyc"><?php echo $rSubK['Logic']; ?></td>
      <td class="fbodyc"><?php echo $rSubK['Period']; ?></td>
      <td class="fbodyc" style="background-color:<?php if($rSubK['Period']!='Annual' AND $rSubK['Period']!=''){echo '#B9DCFF';}else{echo '#FFFFFF';} ?>;"><span style="text-decoration:<?php if($rSubK['Period']!='Annual' AND $rSubK['Period']!=''){ echo 'underline'; }else{echo 'none';}?>;color:<?php if($rSubK['Period']!='Annual' AND $rSubK['Period']!=''){ echo '#000099'; }else{echo '#000';}?>;cursor:<?php if($rSubK['Period']!='Annual' AND $rSubK['Period']!=''){echo 'pointer';} ?>;" maxlength="8" <?php if($rSubK['Period']!='Annual' AND $rSubK['Period']!=''){ ?> onClick="FunSubTgt(<?php echo $Sno.','.$m.','.$rSubK['KRASubId']; ?>,'<?php echo $rSubK['Period']; ?>',<?php echo $rSubK['Target'].','.intval($rSubK['Weightage']); ?>,'<?php echo $rSubK['Logic']; ?>')" <?php } ?> ><?php echo floatval($rSubK['Target']); ?></span></td>
	  <?php /*?>onMouseOver="FunSubTgt(<?php echo $Sno.','.$m.','.$rSubK['KRASubId']; ?>,'<?php echo $rSubK['Period']; ?>',<?php echo $rSubK['Target'].','.intval($rSubK['Weightage']); ?>,'<?php echo $rSubK['Logic']; ?>')"<?php */?>
  
      <?php if($_SESSION['eAppform']=='Y' OR $_SESSION['eMidform']=='Y'){ ?>
      <td class="fbodyc"><?php if($_SESSION['eAppform']=='Y'){ if($restt['tELogScr']>0){echo floatval($restt['tELogScr']);}else{echo floatval($rSubK['SelfRating']);} }elseif($_SESSION['eMidform']=='Y'){echo $rSubK['Mid_SelfRating']; } ?></td>
      <td class="fbody"><?php if($_SESSION['eAppform']=='Y'){ echo $rSubK['AchivementRemark']; }elseif($_SESSION['eMidform']=='Y'){echo $rSubK['Mid_AchivementRemark']; } ?></td>
      <td class="fbodyc"><input name="AppKRARating<?php echo $Sno.'_'.$m; ?>" id="AppKRARating<?php echo $Sno.'_'.$m; ?>" style="font:Georgia;font-size:11px;width:100%;height:24px;background-color:<?php if($nn==1){echo '#FFFFFF';}else{echo '#B9DCFF';} ?>;text-align:center;" value="<?php if($nn==1){ echo floatval($restt['tLogScr']); }elseif($_SESSION['eAppform']=='Y'){ echo floatval($rSubK['AppraiserRating']); }elseif($_SESSION['eMidform']=='Y'){echo $rSubK['Mid_AppraiserRating']; } ?>" <?php if($nn==0){ ?> onKeyUp="EnterAppKraSub(<?php echo $res2['KRAFormAId'].','.$Sno.','.$m; ?>)" onChange="EnterAppKraSub(<?php echo $res2['KRAFormAId'].','.$Sno.','.$m; ?>)" <?php } ?> maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" <?php if($resApp['Appraiser_PmsStatus']==2 OR $nn==1) { echo 'readonly'; } ?> /></td>
	  
	   <input type="hidden" class="input" id="AppKRALogic<?php echo $Sno.'_'.$m; ?>" name="AppKRALogic<?php echo $Sno.'_'.$m; ?>" style="width:100%;text-align:center;border:hidden;height:24px;" value="<?php if($nn==1){ echo floatval($restt['tLogScr']); }elseif($_SESSION['eAppform']=='Y'){ echo floatval($rSubK['AppraiserLogic']);}elseif($_SESSION['eMidform']=='Y'){echo $rSubK['Mid_AppraiserLogic']; }else{echo 0;} ?>"  readonly/>
	  
	   <?php /*?><td class="fbodyc"><input type="text" class="input" id="AppKRALogic<?php echo $Sno.'_'.$m; ?>" name="AppKRALogic<?php echo $Sno.'_'.$m; ?>" style="width:100%;text-align:center;border:hidden;height:24px;" value="<?php if($nn==1){ echo floatval($restt['tLogScr']); }elseif($_SESSION['eAppform']=='Y'){ echo $rSubK['AppraiserLogic'];}elseif($_SESSION['eMidform']=='Y'){echo $rSubK['Mid_AppraiserLogic']; }else{echo 0;} ?>"  readonly/></td><?php */?>
	  
	  <td class="fbodyc"><input class="input" name="AppKRAScore<?php echo $Sno.'_'.$m; ?>" id="AppKRAScore<?php echo $Sno.'_'.$m; ?>" style="width:100%;height:24px;background-color:<?php if($resYNK['Emp_KRASave']=='N'){echo '#FFFFAE';}else{echo '#FFFFFF';}?>;text-align:center;border:hidden;" value="<?php if($nn==1){ echo floatval($restt['tScor']); }elseif($_SESSION['eAppform']=='Y'){ echo floatval($rSubK['AppraiserScore']); }elseif($_SESSION['eMidform']=='Y'){echo floatval($rSubK['Mid_AppraiserScore']); } ?>" readonly/>
      <input type="hidden" name="KRASubId<?php echo $Sno.'_'.$m; ?>" value="<?php echo $rSubK['KRASubId']; ?>" />
      </td>
	  <td class="fbodyc" valign="top"><textarea type="text" id="AppKRARemark<?php echo $Sno.'_'.$m; ?>" name="AppKRARemark<?php echo $Sno.'_'.$m; ?>" style="font-family:Times New Roman;background-color:#B9DCFF';font-size:12px;" rows="1" cols="8" maxlength="200"><?php echo $rSubK['AppraiserRemark']; ?></textarea>
	  </td>
	  
      <?php } else { ?>
   <input type="hidden" name="AppKRARating<?php echo $Sno.'_'.$m; ?>" id="AppKRARating<?php echo $Sno.'_'.$m;?>" value="0"/>
   <input type="hidden" id="AppKRARemark<?php echo $Sno.'_'.$m; ?>" name="AppKRARemark<?php echo $Sno.'_'.$m; ?>" value="" />
   <input type="hidden" name="AppKRALogic<?php echo $Sno.'_'.$m; ?>" id="AppKRALogic<?php echo $Sno.'_'.$m; ?>" value="0"/>
   <input type="hidden" name="AppKRAScore<?php echo $Sno.'_'.$m; ?>" id="AppKRAScore<?php echo $Sno.'_'.$m; ?>" value="0"/>
   <input type="hidden" name="KRASubId<?php echo $Sno.'_'.$m; ?>" value="<?php echo $rSubK['KRASubId']; ?>" />
      <?php } ?>
     </tr> 
     <?php $m++;} $KrowSub=$m-1; ?><input type="hidden" id="SnoSub<?php echo $Sno; ?>" name="SnoSub<?php echo $Sno; ?>" value="<?php echo $Sno; ?>" /><input type="hidden" name="KRowSub<?php echo $Sno; ?>" id="KRowSub<?php echo $Sno; ?>" value="<?php echo $KrowSub; ?>" />
<?php /* While Close*/ ?>	 
    </table>
   </div> 
  </td>
 </tr>
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& End End */ ?> 
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& End End */ ?> 
<?php } ?> 

<?php $Sno++;} $KRowNo=$Sno-1;?><input type="hidden" id="Sno" name="Sno" value="<?php echo $Sno; ?>" />
<input type="hidden" id="EmpKraRow" name="EmpKraRow" value="<?php echo $KRowNo; ?>" />

 <?php if($_SESSION['eAppform']=='Y' OR $_SESSION['eMidform']=='Y'){ ?>
 <tr bgcolor="#FFFFFF">
  <td colspan="12" class="fbody" style="font-weight:bold; vertical-align:middle;" align="right">Final Appraiser KRA Score:&nbsp;</td><td align="right" class="h"><input id="AppFormAScore<?php echo $Sno; ?>" name="AppFormAScore<?php echo $Sno; ?>" class="h" style="background-color:#9BCDFF;width:60px;" value="<?php if($_SESSION['eAppform']=='Y'){ echo $resApp['AppraiserFormAScore']; }elseif($_SESSION['eMidform']=='Y'){echo $resApp['Mid_AppraiserFormAScore']; }  ?>"  readonly/></td>
  <td>&nbsp;</td>
 </tr>
 <?php } else{ ?>
 <input type="hidden" id="AppFormAScore<?php echo $Sno; ?>" name="AppFormAScore<?php echo $Sno; ?>" value="0" />
 <?php } ?>
 </table>
 </td>
 </tr> 
 <tr><td>&nbsp;</td></tr>


 <tr><td class="bdy"><b><i>Form-B (Skill/ Behavioral)&nbsp;</i></b></td></tr>
 <tr>
  <td>
  <table style="width:100%;">
   <tr bgcolor="#FFFF53" style="height:25px;">
	<td class="fhead" style="width:5%;"><b>Sn</b></td>
	<td class="fhead" style="width:15%;"><b>Skill</b></td>
	<td class="fhead" style="width:30%;"><b>SkillComment</b></td>
	<td class="fhead" style="width:5%;"><b>Weightage</b></td>
	<td class="fhead" style="width:5%;"><b>Logic</b></td>
	<td class="fhead" style="width:5%;"><b>Period</b></td>
	<td class="fhead" style="width:5%;"><b>Target</b></td>
	<?php if($_SESSION['eAppform']=='Y' OR $_SESSION['eMidform']=='Y'){ ?>
	<td class="fhead" style="width:5%;"><b>Self Ass.</b></td>
	<td class="fhead" style="width:15%;"><b>Remark</b></td>
	<td class="fhead" style="width:5%;"><b>Appraiser Ass.</b></td>
	<td class="fhead" style="width:5%;"><b>Score</b></td>
	<?php } ?>
   </tr>
<?php $sql2=mysql_query("select * from hrm_employee_pms_behavioralformb where EmpPmsId=".$resApp['EmpPmsId']." order by BehavioralFormBId ASC", $con); $SnoB=1; while($res2=mysql_fetch_array($sql2)){ 
	  $sqlB2=mysql_query("select Skill,SkillComment,Weightage,Logic,Period,Target from hrm_pms_formb where FormBId=".$res2['FormBId'], $con); $resB2=mysql_fetch_assoc($sqlB2); 
	  
$sSubB22=mysql_query("select * from hrm_pms_formbsub where FormBId=".$res2['FormBId']." AND BSubStatus='A' order by FormBSubId ASC",$con); $rowSubB=mysql_num_rows($sSubB22); 

$n=0; 
if($resB2['Period']=='Monthly' OR $resB2['Period']=='Quarter' OR $resB2['Period']=='1/2 Annual'){ $n=1; $sqlt=mysql_query("select SUM(Ach) as tAche, SUM(LogScr) as tELogScr,  SUM(AppAch) as tAch, SUM(AppLogScr) as tLogScr, SUM(AppScor) as tScor from hrm_pms_formb_tgtdefin where EmployeeID=".$Eid." AND YearId=".$_SESSION['PmsYId']." AND FormBId=".$res2['FormBId'],$con); $rest=mysql_fetch_assoc($sqlt); }else{$n=0;}	  


?>		 
	
<input type="hidden" id="rowSubB<?php echo $SnoB; ?>" name="rowSubB<?php echo $SnoB; ?>" value="<?php echo $rowSubB; ?>" /> 
   <input type="hidden" id="FormBId_<?php echo $SnoB; ?>"  name="FormBId_<?php echo $SnoB; ?>" value="<?php echo $res2['BehavioralFormBId']; ?>" /><input type="hidden" id="WeightageFormB_<?php echo $SnoB; ?>"  value="<?php echo $resB2['Weightage']; ?>" /><input type="hidden" id="TargetFormB_<?php echo $SnoB; ?>"  value="<?php echo $resB2['Target']; ?>" /> 
   <input type="hidden" id="AppPeriodB_<?php echo $SnoB; ?>"  value="<?php echo $resB2['Period']; ?>" />
   <input type="hidden" id="AppLogicB_<?php echo $SnoB; ?>"  value="<?php echo $resB2['Logic']; ?>" />
	  
   <tr bgcolor="#FFFFFF">
    <td class="fbodyc"><b><?php echo $SnoB; ?></b></td>
    <td class="fbody"><?php echo $resB2['Skill']; ?></td>
    <td class="fbody"><?php echo $resB2['SkillComment']; ?></td>
    <td class="fbodyc"><?php echo floatval($resB2['Weightage']); ?></td>
	<td class="fbodyc"><?php echo $resB2['Logic']; ?></td>
	<td class="fbodyc"><?php echo $resB2['Period']; ?></td>
    <td class="fbodyc"><span <?php if($resB2['Period']!='Annual' AND $resB2['Period']!=''){ echo 'style="cursor:pointer;text-decoration:underline;color:#000099;"';} if($resB2['Period']!='Annual' AND $resB2['Period']!=''){ ?> onClick="FunFormBTgt(<?php echo $SnoB.', '.$_SESSION['PmsYId'].','.$res2['FormBId']; ?>,'<?php echo $resB2['Period']; ?>',<?php echo $resB2['Target'].','.intval($resB2['Weightage']); ?>,'<?php echo $resB2['Logic']; ?>')" <?php } ?>  ><?php echo floatval($resB2['Target']); ?></span></td>
	
    <?php if($_SESSION['eAppform']=='Y' OR $_SESSION['eMidform']=='Y'){ ?>
    <td class="fbodyc"><?php if($n==1){ echo floatval($rest['tELogScr']); }elseif($_SESSION['eAppform']=='Y'){echo floatval($res2['SelfRating']);}elseif($_SESSION['eMidform']=='Y'){echo $res2['Mid_SelfRating'];} ?></td>
    <td class="fbody"><?php if($_SESSION['eAppform']=='Y'){echo $res2['Comments_Example'];}elseif($_SESSION['eMidform']=='Y'){echo $res2['Mid_Comments_Example'];} ?></td>
    
	<td class="fbodyc"><input type="<?php if($rowSubB>0){echo 'hidden';}else{echo 'text';} ?>" id="AppFormBRating<?php echo $SnoB; ?>" name="AppFormBRating<?php echo $SnoB; ?>" style="font-family:Times New Roman;font-size:12px;width:100%;background-color:<?php if($rowSubB>0 OR $n==1){echo '#FFFFFF';}else{echo '#B9DCFF';} ?>;height:24px;text-align:center;" value="<?php if($n==1){ echo floatval($rest['tLogScr']); }elseif($_SESSION['eAppform']=='Y'){echo floatval($res2['AppraiserRating']);}elseif($_SESSION['eMidform']=='Y'){echo $res2['Mid_AppraiserRating'];} ?>" maxlength="5" <?php if($resApp['Appraiser_PmsStatus']==2 OR $rowSubB>0 OR $n==1) { echo 'readonly'; } ?> onKeyUp="EnterAppFormB(<?php echo $res2['BehavioralFormBId'].','.$SnoB; ?>)" onKeyDown="EnterAppFormB(<?php echo $res2['BehavioralFormBId'].','.$SnoB; ?>)" onChange="EnterAppFormB(<?php echo $res2['BehavioralFormBId'].','.$SnoB; ?>)"/></td>
	
	<td class="fbodyc"><input id="AppFormBScore<?php echo $SnoB; ?>" name="AppFormBScore<?php echo $SnoB; ?>" style="font-family:Times New Roman; border:hidden;font-size:12px;width:100%;background-color:#FFFFFF;height:24px;text-align:center;" value="<?php if($n==1){ echo floatval($rest['tScor']); } /*elseif($rowSubB==0){*/ elseif($_SESSION['eAppform']=='Y'){echo floatval($res2['AppraiserScore']);}elseif($_SESSION['eMidform']=='Y'){echo $res2['Mid_AppraiserScore'];} /*}*/ ?>" readonly/></td>
	
	<input type="hidden" class="input" id="AppBLogic<?php echo $SnoB; ?>" name="AppBLogic<?php echo $SnoB; ?>" style="width:60px;text-align:center;border:hidden;" value="<?php if($n==1){ echo floatval($rest['tLogScr']); }elseif($_SESSION['eAppform']=='Y'){ echo $$res2['AppraiserLogic'];}elseif($_SESSION['eMidform']=='Y'){echo $res2['Mid_AppraiserLogic']; }else{echo 0;} ?>"  readonly/>
	
    <?php } else { ?>
    <input type="hidden" id="AppFormBRating<?php echo $SnoB; ?>" name="AppFormBRating<?php echo $SnoB; ?>" value="0" />
	<input type="hidden" id="AppBLogic<?php echo $SnoB; ?>" name="AppBLogic<?php echo $SnoB; ?>" value="0"/>
    <input type="hidden" id="AppFormBScore<?php echo $SnoB; ?>" name="AppFormBScore<?php echo $SnoB; ?>" value="0" />
    <?php } ?>
   </tr>

<?php for($i=1; $i<=5; $i++) { ?>
<input type="hidden" id="BAppBScoreSub<?php echo $SnoB."_".$i; ?>" value="0" /><?php } ?> 
   
<?php if($rowSubB>0){ ?>   
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& Start Start */ ?>
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& Start Start */ ?>
  
 <tr>
  <td colspan="11" align="right" style="border:hidden;border-style:none;">
  <div id="Div<?php echo $SnoB; ?>" style="display:<?php if($rowSubB>0){echo 'block';}else{echo 'none';} ?>;">
     <table style="width:95%;background-color:#71FF71;" border="0" cellpadding="0" cellspacing="1"> 
     <tr style="background-color:#71FF71;">   
      <td class="fhead2" style="width:40px;">SNo</td>
      <td class="fhead2" style="width:250px;">Sub Skill</td>
      <td class="fhead2" style="width:350px;">Sub Skill Description</td>  
      <td class="fhead2" style="width:60px;">Weightage</td>
	  <td class="fhead2" style="width:60px;">Logic</td>
	  <td class="fhead2" style="width:80px;">Period</td>
      <td class="fhead2" style="width:60px;">Target</td>
	  <td class="fhead2" style="width:60px;">Self<br>Rating</td>
	  <td class="fhead2" style="width:200px;">Remarks</td>
	  <td class="fhead2" style="width:60px;">Appraiser<br>Ass.</td>
	  <td class="fhead2" style="width:60px;">Score</td>
      
     </tr>

<?php if($rowSubK==0){$num=5;}elseif($rowSubK==1){$num=4;}elseif($rowSubK==2){$num=3;}elseif($rowSubK==3){$num=2;}elseif($rowSubK==4){$num=1;}elseif($rowSubK==5){$num=0;} ?>

<?php 

$sSubB=mysql_query("select * from hrm_employee_pms_behavioralformb_sub s inner join hrm_pms_formbsub bb on s.FormBSubId=bb.FormBSubId where s.EmpId=".$Eid." AND s.YearId=".$_SESSION['PmsYId'],$con); /* While Open*/ $m=1; while($rSubB=mysql_fetch_assoc($sSubB)){ 

$nn=0;
	  if($rSubB['Period']=='Monthly' OR $rSubB['Period']=='Quarter' OR $rSubB['Period']=='1/2 Annual'){ $nn=1; 
	  
	  $sqltt=mysql_query("select SUM(Ach) as tAche, SUM(LogScr) as tELogScr,  SUM(AppAch) as tAch, SUM(AppLogScr) as tLogScr, SUM(AppScor) as tScor from hrm_pms_formb_tgtdefin where EmployeeID=".$Eid." AND YearId=".$_SESSION['PmsYId']." AND FormBSubId=".$rSubB['FormBSubId'],$con); $restt=mysql_fetch_assoc($sqltt); }else{$nn=0;}

?>

  <input type="hidden" id="FormBId_<?php echo $SnoB; ?>" value="<?php echo $res2['FormBId']; ?>" />
   
  <tr style="background-color:#FFFFFF;">  
<?php if($m==1){$n='a';}elseif($m==2){$n='b';}elseif($m==3){$n='c';}elseif($m==4){$n='d';}elseif($m==5){$n='e';} ?>  
  <td align="center" class="fbody2"><?php echo $n; ?></b>
  <input type="hidden" name="SubFormBId_<?php echo $SnoB.'_'.$m; ?>" id="SubFormBId_<?php echo $SnoB.'_'.$m; ?>" value="<?php echo $rSubB['FormBSubId']; ?>" /> 
  <input type="hidden" id="FormBIdNo_a<?php echo $SnoB.'_'.$m; ?>">
  <input type="hidden" id="WWei_a<?php echo $SnoB.'_'.$m; ?>" value="<?php echo $rSubB['Weightage']; ?>"/>
  <input type="hidden" id="Log_a<?php echo $SnoB.'_'.$m; ?>" value="<?php echo $rSubB['Logic']; ?>"/>
  <input type="hidden" id="Per_a<?php echo $SnoB.'_'.$m; ?>" value="<?php echo $rSubB['Period']; ?>"/>
  <input type="hidden" id="Tar_a<?php echo $SnoB.'_'.$m; ?>" value="<?php echo $rSubB['Target']; ?>"/>
  <input type="hidden" id="PrdN_<?php echo $SnoB.'_'.$m; ?>"  value="<?php echo $nn; ?>" />
  </td>
  <td class="fbody" valign="top"><?php echo $rSubB['Skill']; ?></td>
  <td class="fbody" valign="top"><?php echo $rSubB['SkillComment']; ?></td>  
  <td align="center" class="fbody2"><?php echo $rSubB['Weightage']; ?></td>
  <td align="center" class="fbody2"><?php echo $rSubB['Logic']; ?></td>
  <td align="center" class="fbody2"><?php echo $rSubB['Period']; ?></td>
  
  <td align="center" class="fbody2">
  <span style="cursor:<?php if($rSubB['Period']!='Annual' AND $rSubB['Period']!=''){echo 'pointer';} ?>;text-align:center;text-decoration:<?php if($rSubB['Period']!='Annual' AND $rSubB['Period']!=''){ echo 'underline'; }?>;color:<?php if($rSubB['Period']!='Annual' AND $rSubB['Period']!=''){ echo '#000099'; }?>;" <?php if($rSubB['Period']!='Annual' AND $rSubB['Period']!=''){ ?> onClick="FunFormBSubTgt(<?php echo $SnoB.','.$m.','.$_SESSION['PmsYId'].','.$rSubB['FormBSubId']; ?>,'<?php echo $rSubB['Period']; ?>',<?php echo $rSubB['Target'].','.intval($rSubB['Weightage']); ?>,'<?php echo $rSubB['Logic']; ?>')" <?php } ?>><?php echo intval($rSubB['Target']); ?></span>  
  </td>

  <td align="center" class="fbody2"><?php if($nn==1){ echo floatval($restt['tELogScr']); }elseif($resY['Emp_SkillSave']=='Y'){ if($_SESSION['eAppform']=='Y'){ echo $rSubB['SelfRating']; } }elseif($rSubB['Emp_SkillSave']=='N'){ echo '0'; }?></td>	  
  <td class="fbody2"><?php echo $rSubB['AchivementRemark'];?></td>
  
 
  <td align="center" class="fbody2"><input name="BSelfRatingB<?php echo $SnoB.'_'.$m; ?>" id="BSelfRatingB<?php echo $SnoB.'_'.$m; ?>" style="width:100%;background-color:<?php if($nn==1){echo '#FFFFFF';}else{echo '#B9DCFF';}?>;text-align:center;" readonly value="<?php if($nn==1){ echo floatval($restt['tLogScr']); }else{ echo $rSubB['AppraiserRating']; }?>" onKeyUp="BEnterEmpFormBSub(<?php echo $SnoB.','.$m; ?>)" onChange="BEnterEmpFormBSub(<?php echo $SnoB.','.$m; ?>)" maxlength="5" Add input field: oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" <?php if($nn==1){ echo 'readonly'; } ?> onKeyPress="return isNumberKey(event)"/>
	  
   <input type="hidden" class="input" id="EmpBLogic<?php echo $SnoB.'_'.$m; ?>" name="EmpBLogic<?php echo $SnoB.'_'.$m; ?>" style="width:60px;text-align:center;border:hidden;" value="<?php if($nn==1){ echo floatval($restt['tLogScr']); }elseif($_SESSION['eAppform']=='Y'){ echo $rSubB['AppraiserLogic'];}elseif($_SESSION['eMidform']=='Y'){echo $rSubB['Mid_AppraiserLogic']; }else{echo 0;} ?>"  readonly/> 
  </td>
 	  
  <td align="center" class="fbody2">
   <input type="text" style="font:Georgia; font-size:12px; width:60px; height:20px;text-align:center;border:hidden;" id="BEmpBScore<?php echo $SnoB.'_'.$m; ?>" name="BEmpBScore<?php echo $SnoB.'_'.$m; ?>" value="<?php if($nn==1){ echo floatval($restt['tScor']); }elseif($_SESSION['eAppform']=='Y'){ echo $rSubB['AppraiserScore'];}elseif($_SESSION['eMidform']=='Y'){echo $rSubB['Mid_AppraiserScore']; } ?>"  readonly/>
  </td>
  
  
</tr> 
<?php $m++;} ?>	
<?php /* While Close*/ ?>	

     </table>
  </div> 
  </td>
 </tr>
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& End End */ ?> 
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& End End */ ?> 
<?php } ?> 
   
   
   
<?php $SnoB++;} $FormBRowNo=$SnoB-1;?>
   <input type="hidden" id="SnoB" name="SnoB" value="<?php echo $SnoB; ?>" />
   <input type="hidden" id="EmpFormBRow" name="EmpFormBRow" value="<?php echo $FormBRowNo; ?>" />

   <?php if($_SESSION['eAppform']=='Y' OR $_SESSION['eMidform']=='Y'){ ?>									  
   <tr bgcolor="#FFFFFF">
    <td colspan="10" class="fbody" style="font-weight:bold; vertical-align:middle;" align="right"> Final Appraiser FormB Score:&nbsp;</td><td align="right" class="h"><input id="AppBehaviFormBScore<?php echo $SnoB; ?>" name="AppBehaviFormBScore<?php echo $SnoB; ?>" class="h" style="font-weight:bold;background-color:#9BCDFF;width:60px;" value="<?php if($_SESSION['eAppform']=='Y'){ echo $resApp['AppraiserFormBScore']; }elseif($_SESSION['eMidform']=='Y'){echo $resApp['Mid_AppraiserFormBScore']; } ?>"  readonly/></td>
   </tr>
   <?php } else{ ?><input type="hidden" id="AppBehaviFormBScore<?php echo $SnoB;?>" name="AppBehaviFormBScore<?php echo $SnoB;?>" value="0" /><?php } ?> 
  </table>
  </td>
 </tr>
 <tr><td>&nbsp;</td></tr>
 
 <?php /********************** New Feedback Form Open *************************** ?>
 <tr><td class="bdy"><b><i>Other Skill/ Behavioral related feedback&nbsp;</i></b></td></tr>
 <tr>
  <td>
  <table width="95%">
   <tr bgcolor="#FFFF53" style="height:22px;">
	<td class="fhead" style="width:30px;"><b>SNo.</b></td>
	<td class="fhead" style="width:200px;"><b>Feedback By</b></td>	
	<td class="fhead" style="width:100px;"><b>Department</b></td>
	<td class="fhead" style="width:80px;"><b>Feedback<br>Date</b></td>
	<td class="fhead" style="width:200px;"><b>Attribute</b></td>
	<td class="fhead" style="width:400px;"><b>Comment</b></td>
   </tr>
<?php $sql=mysql_query("select Fname,Sname,Lname,DepartmentCode,f.* from hrm_feedback f inner join hrm_employee e on f.SubBy=e.EmployeeID inner join hrm_employee_general g on f.SubBy=g.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId where f.EmployeeID=".$Eid." order by f.SubDate DESC",$con); 
	$sno=1; while($res=mysql_fetch_array($sql)){ ?>
	<tr style="height:20px;background-color:#FFFFFF;">
		<td class="fbody" align="center"><?php echo $sno; ?></td>
		<td class="fbody"><?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
        <td class="fbody"><?php echo $res['DepartmentCode'];?></td>			
		<td class="fbody" align="center"><?php echo date("d M y",strtotime($res['SubDate']));?></td>	
		<td class="fbody"><?php echo $res['BehAtt'];?></td>		
		<td class="fbody"><?php echo $res['Remark'];?></td>
	</tr>
	<?php $sno++; } ?>
  </table>
  </td>
 </tr>
 <tr><td>&nbsp;</td></tr>
 <?php /********************** New Feedback Form Close **************************/ ?>
 
 <?php 
 $DjY=date("Y",strtotime($_SESSION['AllowDoj'])); $Djmd=date("m-d",strtotime($_SESSION['AllowDoj'])); $DjmY2=$DjY-1; 
 $DojmY2=date("Y-m-d",strtotime($_SESSION['AllowDoj']));
 $DojY=$DjmY2."-".$Djmd; 
 
 $sqlEdt=mysql_query("select DateJoining,DateConfirmationYN from hrm_employee_general where EmployeeID=".$Eid,$con);
 $resEdt=mysql_fetch_assoc($sqlEdt);
 
 $FirstRating='';
 if($resEdt['DateConfirmationYN']=='Y' AND $resEdt['DateJoining']>$DojY AND $resEdt['DateJoining']<=$DojmY2)
 { 
  $sqlRt=mysql_query("select Rating from hrm_employee_confletter where ConfLetterId=(select ConfLetterId from hrm_employee_confletter where EmployeeID=".$Eid." AND Status='A')",$con);
  $rowsRt=mysql_num_rows($sqlRt); 
  if($rowsRt>0){ $resRt=mysql_fetch_assoc($sqlRt); $FirstRating=$resRt['Rating']; }else{ $FirstRating=''; }
 }
 if($FirstRating>0){
 ?>
 <tr>
  <td>
  <table border="0" cellspacing="1">
   <tr>
    <td colspan="10" class="bdy"><b><i>Confirmation Rating:&nbsp;</i>
	<font color="#FF0000"><?php echo $FirstRating; ?></font>
	</b></td>
	
   </tr> 
  </table>
  </td>
 </tr>
 <?php } //if($FirstRating>0) ?>

 <?php if($_SESSION['eAppform']=='Y'){ ?>
 <tr>
  <td>
  <table border="0" cellspacing="1">
   <tr><td colspan="10" class="bdy"><b><i>Calculation of PMS score&nbsp;</i></b></td></tr>
   <tr bgcolor="#FFFF53" style="height:22px;">
	<td class="fhead" style="width:150px;">&nbsp;</td>
	<td class="fhead" style="width:100px;">KRA Form</td>
	<td class="fhead" style="width:100px;">(%)<br>Weigthage</td>
	<td class="fhead" style="width:100px;">(A)<br>KRA Score</td>
	<td class="fhead" style="width:100px;">Behavioral Form </td>
	<td class="fhead" style="width:100px;">(%)<br>Weigthage</td>
	<td class="fhead" style="width:120px;">(B)<br>Behavioral Score</td>
	<td class="fhead" style="width:100px;">(A+B)<br>PMS Score </td>
    <td class="fhead" style="width:80px;"><b>Rating</b></td>
   </tr>
   <tr>
	<td bgcolor="#FFFFFF" style="font-family:Times New Roman;font-size:14px;font-weight:bold;vertical-align:middle;">&nbsp;Employee :</td>
	<td align="center" bgcolor="#9BCDFF" class="b"><?php if($_SESSION['eAppform']=='Y'){echo $resApp['EmpFormAScore'];}elseif($_SESSION['eMidform']=='Y'){echo $resApp['Mid_EmpFormAScore'];} ?></td>
	<td align="center" bgcolor="#C1FFC1" class="b"><?php echo $resApp['FormAKraAllow_PerOfWeightage']; ?></td>
	<td align="center" bgcolor="#FFE6E6" class="b"><?php if($_SESSION['eAppform']=='Y'){echo $resApp['EmpFinallyFormA_Score'];}elseif($_SESSION['eMidform']=='Y'){echo $resApp['Mid_EmpFinallyFormA_Score'];} ?></td>
	<td align="center" bgcolor="#9BCDFF" class="b"><?php if($_SESSION['eAppform']=='Y'){echo $resApp['EmpFormBScore'];}elseif($_SESSION['eMidform']=='Y'){echo $resApp['Mid_EmpFormBScore'];} ?></td>
	<td align="center" bgcolor="#C1FFC1" class="b"><?php echo $resApp['FormBBehaviAllow_PerOfWeightage']; ?></td>
	<td align="center" bgcolor="#FFE6E6" class="b"><?php if($_SESSION['eAppform']=='Y'){echo $resApp['EmpFinallyFormB_Score'];}elseif($_SESSION['eMidform']=='Y'){echo $resApp['Mid_EmpFinallyFormB_Score'];} ?></td>
	<td align="center" bgcolor="#F7FCD6" class="b"><?php if($_SESSION['eAppform']=='Y'){echo $resApp['Emp_TotalFinalScore'];}elseif($_SESSION['eMidform']=='Y'){echo $resApp['Mid_Emp_TotalFinalScore'];} ?></td>
	<td align="center" bgcolor="#F7FCD6" class="h"><?php if($_SESSION['eAppform']=='Y'){ echo $resApp['Emp_TotalFinalRating'];}elseif($_SESSION['eMidform']=='Y'){ echo $resApp['Mid_Emp_TotalFinalRating'];} ?></td>
   </tr>
   <tr>
	<td bgcolor="#FFFFFF" style="font-family:Times New Roman;font-size:14px;font-weight:bold;vertical-align:middle;">&nbsp;Appraiser :</td>
	<td align="center" bgcolor="#9BCDFF"><input id="FormAScore" class="b" style="border-style:hidden;background-color:#9BCDFF;width:80px;" value="<?php if($_SESSION['eAppform']=='Y'){echo $resApp['AppraiserFormAScore'];}elseif($_SESSION['eMidform']=='Y'){echo $resApp['Mid_AppraiserFormAScore'];} ?>" readonly/></td>
	<td align="center" bgcolor="#C1FFC1" class="b"><?php echo $resApp['FormAKraAllow_PerOfWeightage']; ?>
	<input type="hidden" id="weight_A" value="<?php echo $resApp['FormAKraAllow_PerOfWeightage']; ?>" /></td>
	<td align="center" bgcolor="#FFE6E6"><input id="Score_1" name="Score_1" class="b" style="border-style:hidden;background-color:#FFE6E6;width:80px;" value="<?php if($_SESSION['eAppform']=='Y'){echo $resApp['AppraiserFinallyFormA_Score'];}elseif($_SESSION['eMidform']=='Y'){echo $resApp['Mid_AppraiserFinallyFormA_Score'];} ?>" readonly/></td>
	<td align="center" bgcolor="#9BCDFF"><input id="FormBScore" class="b" style="border-style:hidden;background-color:#9BCDFF;width:80px; height:22px;" value="<?php if($_SESSION['eAppform']=='Y'){echo $resApp['AppraiserFormBScore'];}elseif($_SESSION['eMidform']=='Y'){echo $resApp['Mid_AppraiserFormBScore'];} ?>" readonly/></td>
	<td align="center" bgcolor="#C1FFC1" class="b"><?php echo $resApp['FormBBehaviAllow_PerOfWeightage']; ?>
	<input type="hidden" id="weight_B" value="<?php echo $resApp['FormBBehaviAllow_PerOfWeightage']; ?>" /></td>
	<td align="center" bgcolor="#FFE6E6"><input id="Score_2" name="Score_2" class="b" style="border-style:hidden;background-color:#FFE6E6;width:80px;" value="<?php if($_SESSION['eAppform']=='Y'){echo $resApp['AppraiserFinallyFormB_Score'];}elseif($_SESSION['eMidform']=='Y'){echo $resApp['Mid_AppraiserFinallyFormB_Score'];} ?>"  readonly/></td>
	<td align="center" bgcolor="#F7FCD6"><input id="TotalScore_12" name="TotalScore_12" class="b" style="border-style:hidden;background-color:#F7FCD6;width:80px;" value="<?php if($_SESSION['eAppform']=='Y'){echo $resApp['Appraiser_TotalFinalScore'];}elseif($_SESSION['eMidform']=='Y'){echo $resApp['Mid_Appraiser_TotalFinalScore'];} ?>"  readonly/></td>
	<td align="center" bgcolor="#F7FCD6"><input id="TotalRating_12" name="TotalRating_12" class="h" style="border-style:hidden;background-color:#F7FCD6;width:80px;" value="<?php if($_SESSION['eAppform']=='Y'){ echo $resApp['Appraiser_TotalFinalRating'];}elseif($_SESSION['eMidform']=='Y'){ echo $resApp['Mid_Appraiser_TotalFinalRating'];} ?>"  readonly/></td>
	<td align="center"><img src="images/BlinkingArrow.gif" border="0" style="height:15px;width:40px; " /></td>
   </tr>
  </table>
  </td>
 </tr>
 <tr><td>&nbsp;</td></tr>
 <?php } else { ?>
 <input type="hidden" id="Score_1" name="Score_1" value="0" />
 <input type="hidden" id="Score_2" name="Score_2" value="0" />
 <input type="hidden" id="TotalScore_12" name="TotalScore_12" value="0" />
 <input type="hidden" id="TotalRating_12" name="TotalRating_12" value="0" />
 <input type="hidden" value="0" />
 <?php } ?>
 <?php } ?>
 <!-- ////2222222222222222 Close -->

 <?php if($_SESSION['eAppform']=='Y'){ //333333333333333 OPEn ?>
 <tr>
  <td>
  <table style="width:100%;">
   <tr><td colspan="5" class="bdy"><b><i>Promotion Recommendation&nbsp;</i></b></td></tr>
   <?php $sql = mysql_query("select DepartmentId,DesigId,GradeId from hrm_employee_general where EmployeeID=".$Eid, $con); 
$res=mysql_fetch_assoc($sql); $sqlG = mysql_query("SELECT GradeValue FROM hrm_grade WHERE GradeId=".$res['GradeId'], $con);$resG = mysql_fetch_assoc($sqlG); 
      if($resG['GradeValue']!='MG')
      { $NextGradeId=$res['GradeId']+1; 
      $sqlG2 = mysql_query("SELECT GradeValue FROM hrm_grade WHERE GradeId=".$NextGradeId, $con); 
	  $resG2 = mysql_fetch_assoc($sqlG2); $NextGrade=$resG2['GradeValue']; 
      } elseif($resG['GradeValue']=='MG'){$NextGrade=$resG['GradeValue'];}
	  //$NextGrade=$resG['GradeValue']+1; $NextGrade2=$resG['GradeValue']+2; ?> 
      
   <tr bgcolor="#FFFF53" style="height:22px;">
    <td class="fhead" style="width:150px;">&nbsp;</td>      
    <td class="fhead" style="width:300px;">Current</td>
    <td class="fhead" style="width:300px;">Proposed</td>
   </tr>
   <tr>
    <td bgcolor="#FFFFFF" style="font-family:Times New Roman;font-size:14px;font-weight:bold;vertical-align:middle;">&nbsp;&nbsp;Grade :</td> 
    <?php $sqlGrade = mysql_query("SELECT GradeValue FROM hrm_grade WHERE GradeId=".$res['GradeId'], $con); $resGrade = mysql_fetch_assoc($sqlGrade); ?>        
    <td bgcolor="#FFFFFF" class="b" align="center"><?php echo $resGrade['GradeValue']; ?>
    <input type="hidden" id="EmpGrade" value="<?php echo $res['GradeId']; ?>" /></td>
    <td bgcolor="#FFFFFF">
    <select style="width:60px;background-color:#DDFFBB;" class="b" id="GradeId" name="GradeId" onChange="SelectGrade(this.value,<?php echo $res['DepartmentId'].', '.$res['GradeId']; ?>)">
	<?php if($resApp['Appraiser_EmpGrade']!=0) 
	      { $sqlG = mysql_query("SELECT GradeValue FROM hrm_grade WHERE GradeId=".$resApp['Appraiser_EmpGrade'], $con); $resG = mysql_fetch_assoc($sqlG); ?><option style="background-color:#FFFFFF;" value="<?php echo $resApp['Appraiser_EmpGrade']; ?>"><?php echo $resG['GradeValue']; ?></option><?php } ?>	  
    <option style="background-color:#FFFFFF;" value="<?php echo $res['GradeId']; ?>"><?php echo $resGrade['GradeValue']; ?></option><option style="background-color:#FFFFFF;" value="<?php echo $NextGradeId; ?>"><?php echo $NextGrade; ?></option>
    </select>
    </td>
   </tr> 
   <tr>
    <td bgcolor="#FFFFFF" style="font-family:Times New Roman;font-size:14px;font-weight:bold;vertical-align:middle;">&nbsp;&nbsp;Designation :</td> 
    <?php $sqlDesig = mysql_query("SELECT DesigName FROM hrm_designation WHERE DesigId=".$res['DesigId'], $con); $resDesig = mysql_fetch_assoc($sqlDesig); ?>
    <td bgcolor="#FFFFFF" class="b" align="center"><?php echo strtoupper($resDesig['DesigName']); ?>
    <input type="hidden" id="EmpDesig" value="<?php echo $res['DesigId']; ?>" /></td>
    <td bgcolor="#FFFFFF"><span id="SpanDesig"><select class="b" style="width:350px; background-color:#DDFFBB;" id="DesigId" name="DesigId">
    <?php if($resApp['Appraiser_EmpDesignation']!=0)
	      { $sqlD = mysql_query("SELECT DesigName FROM hrm_designation WHERE DesigId=".$resApp['Appraiser_EmpDesignation'], $con); $resD = mysql_fetch_assoc($sqlD); ?><option style="background-color:#FFFFFF;" value="<?php echo $resApp['Appraiser_EmpDesignation']; ?>"><?php echo strtoupper($resD['DesigName']); ?></option>
    <?php } if($resApp['Appraiser_EmpDesignation']==0) { ?><option style="background-color:#FFFFFF;" value="<?php echo $res['DesigId']; ?>"><?php echo strtoupper($resDesig['DesigName']); ?></option>
    <?php } ?>
    <?php $sqlEx=mysql_query("select hrm_deptgradedesig.DesigId,DesigName from hrm_deptgradedesig INNER JOIN hrm_designation ON hrm_deptgradedesig.DesigId=hrm_designation.DesigId where DepartmentId=".$res['DepartmentId']." AND (GradeId=".$NextGradeId." OR GradeId_2=".$NextGradeId." OR GradeId_3=".$NextGradeId." OR GradeId_4=".$NextGradeId." OR GradeId_5=".$NextGradeId.") AND hrm_designation.DesigStatus='A' order by DesigName ASC", $con); while($resEx=mysql_fetch_assoc($sqlEx)){ ?><option style="background-color:#FFFFFF;" value="<?php echo $resEx['DesigId']; ?>"><?php echo strtoupper($resEx['DesigName']); ?></option><?php } ?>
    </select></span>
    </td>
	<td style="width:200px;">&nbsp;</td>
   </tr>
   <tr style="height:23px;">
    <td bgcolor="#FFFFFF" style="font-family:Times New Roman;font-size:14px;font-weight:bold;vertical-align:middle;">&nbsp;&nbsp;Justification :</td>         
    <td colspan="3" bgcolor="#FFFFFF"><input name="Justification" id="Justification" class="bl" style="width:100%;border-style:hidden;" value="<?php echo $resApp['Appraiser_Justification']; ?>" maxlength="450"/></td>
   </tr>          
  </table>
  </td>
 </tr>
 <tr><td>&nbsp;</td></tr>

<?php /*
 <tr>
  <td>
  <table border="0" style="width:100%;">
   <tr><td colspan="5" class="bdy"><b><i>Training Requirements&nbsp;</i></b>&nbsp;&nbsp;<font style="color:#000000;font-size:18px;">[Mention training requirement during the next appraisal cycle.]</font></td></tr>
  </table>
  </td>
 </tr>
 <tr valign="middle">
  <td>
  <table style="width:100%;">
   <tr><td class="hl"><b>a)&nbsp;Soft Skills Training</b> [Based on Behavioral parameter]</td></tr>
   <tr bgcolor="#FFFFFF">
    <td><input id="AppSoftSkill_1" name="AppSoftSkill_1" value="<?php echo $resApp['Appraiser_SoftSkill_1']; ?>" class="bl" style="width:100%;border:hidden;" maxlength="400" <?php if($resApp['Appraiser_PmsStatus']==2) { echo 'readonly'; } ?> /></td>
   </tr>
   <tr bgcolor="#FFFFFF">
    <td><input id="AppSoftSkill_2" name="AppSoftSkill_2" value="<?php echo $resApp['Appraiser_SoftSkill_2']; ?>" class="bl" style="width:100%;border:hidden;" maxlength="400" <?php if($resApp['Appraiser_PmsStatus']==2) { echo 'readonly'; } ?> /></td>
   </tr>
   <tr><td class="hl"><b>b)&nbsp;Technical Training</b> [Job related]</td></tr>
   <tr bgcolor="#FFFFFF">
    <td><input id="AppTechSkill_1" name="AppTechSkill_1" value="<?php echo $resApp['Appraiser_TechSkill_1']; ?>" class="bl" style="width:100%;border:hidden;" maxlength="400" <?php if($resApp['Appraiser_PmsStatus']==2) { echo 'readonly'; } ?> /></td>
   </tr>
   <tr bgcolor="#FFFFFF">
    <td><input id="AppTechSkill_2" name="AppTechSkill_2" value="<?php echo $resApp['Appraiser_TechSkill_2']; ?>" class="bl" style="width:100%;border:hidden;" maxlength="400" <?php if($resApp['Appraiser_PmsStatus']==2) { echo 'readonly'; } ?> /></td>
   </tr>
  </table>
  </td>
 </tr>
 <tr><td>&nbsp;</td></tr>
 */ ?>
 
 
  <tr>
  <td>
  <table border="0" style="width:100%;">
   <tr><td colspan="5" class="bdy"><b><i>Training Requirements&nbsp;</i></b>&nbsp;&nbsp;<font style="color:#000000;font-size:18px;">[Mention training requirement during the next appraisal cycle.]</font></td></tr>
  </table>
  </td>
 </tr>
<script type="text/javascript">
function SelectACat(v,n)
{
 document.getElementById("ActID").value=n;
 var url = 'GetPMSTranning.php'; var pars = 'act=Get_A_Topic&v='+v+'&n='+n; 
 var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_FunAT }); 
}
function show_FunAT(originalRequest)
{ document.getElementById('SpnATop'+document.getElementById("ActID").value).innerHTML = originalRequest.responseText; }


function SelectATop(v,n)
{ 
 document.getElementById("ActID").value=n; document.getElementById("TopAA_"+n).value=v;
 var url = 'GetPMSTranning.php'; var pars = 'act=Get_A_Des&v='+v+'&n='+n;
 var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_FunAD });
}
function show_FunAD(originalRequest)
{ document.getElementById('SpnADes'+document.getElementById("ActID").value).innerHTML = originalRequest.responseText; }


function SelectBTop(v,n)
{ 
 document.getElementById("ActBID").value=n; //alert(v+"-"+n);
 var url = 'GetPMSTranning.php'; var pars = 'act=Get_B_Des&v='+v+'&n='+n;
 var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_FunBD });
}
function show_FunBD(originalRequest)
{ document.getElementById('SpnBDes'+document.getElementById("ActBID").value).innerHTML = originalRequest.responseText; }
  
  
function FunAddMin(T,n,V)
{
 
 if(T==1)
 { 
  var n0=n-1; var n1=n+1; 
  document.getElementById("TR_"+V+"_"+n1).style.background='#FFFFFF'; 
  if(n<4)
  {
   document.getElementById("Add_"+V+"_"+n1).style.display='block'; 
   document.getElementById("Min_"+V+"_"+n0).style.display='none';
  }
  else
  { 
   document.getElementById("Min_"+V+"_"+n0).style.display='none'; 
   document.getElementById("Min_"+V+"_"+n).style.display='none'; 
  }
  document.getElementById("SpnSn_"+V+"_"+n1).style.display='block'; 
  if(V=='A'){ document.getElementById("Spn"+V+"Cat"+n1).style.display='block'; } 
  document.getElementById("Spn"+V+"Top"+n1).style.display='block'; 
  document.getElementById("Spn"+V+"Des"+n1).style.display='block';
  document.getElementById("Add_"+V+"_"+n).style.display='none'; 
  document.getElementById("Min_"+V+"_"+n).style.display='block';
 }
 else if(T==2)
 {
  var n0=n-1; var n1=n+1; 
  document.getElementById("TR_"+V+"_"+n1).style.background=''; 
  if(n<4)
  { 
    document.getElementById("Add_"+V+"_"+n1).style.display='none'; 
    if(n!=2){ document.getElementById("Min_"+V+"_"+n0).style.display='block'; } 
  }
  else
  { 
   document.getElementById("Min_"+V+"_"+n0).style.display='block'; 
   document.getElementById("Min_"+V+"_"+n).style.display='block';
  }
  document.getElementById("SpnSn_"+V+"_"+n1).style.display='none';
  if(V=='A'){ document.getElementById("Spn"+V+"Cat"+n1).style.display='block'; }  
  document.getElementById("Spn"+V+"Top"+n1).style.display='none'; 
  document.getElementById("Spn"+V+"Des"+n1).style.display='none';
  document.getElementById("Add_"+V+"_"+n).style.display='block'; 
  document.getElementById("Min_"+V+"_"+n).style.display='none';
  if(V=='A'){ document.getElementById("Spn"+V+"Cat"+n1).style.display='none'; } 
 }

}

function FunOthr(v,n)
{
 if(n==1){ document.getElementById("TraS_Oth").value=v; }
 else if(n==2){ document.getElementById("TraT_Oth").value=v; }
}  
  
</script>
 <?php $sqlDpt=mysql_query("select DepartmentCode from hrm_department d inner join hrm_employee_general g on d.DepartmentId=g.DepartmentId where g.EmployeeID=".$Eid,$con); $resDpt=mysql_fetch_array($sqlDpt); ?>
 <tr valign="middle">
  <td>
  <table style="width:100%;">
   <tr><td class="hl"><b>a)&nbsp;Soft Skills Training</b> [Based on Behavioral parameter]</td></tr>
   <tr>
    <td style="vertical-align:top;">
	 <table style="width:100%;">
	  <tr bgcolor="#FFFF53" style="height:22px;">
	   <td class="fhead" style="width:2%;"></td>
	   <td class="fhead" style="width:2%;">Sn</td> 
       <td class="fhead" style="width:15%;">Category</td>      
       <td class="fhead" style="width:18%;">Topic</td>
       <td class="fhead" style="width:63%;">Description</td>
      </tr>
	   <?php for($i=1; $i<=5; $i++){ ?>
	   <tr id="TR_A_<?=$i?>" style="height:22px;background-color:<?php if($i<=2 || $resApp['Appraiser_SoftSkill_'.$i]!=''){echo '#FFFFFF';}else{echo '';}?>;">
	    <td class="b" id="TD<?=$i?>1">
		 <?php if($i<=4){ ?>
		 <img src="images/Addnew.png" id="Add_A_<?=$i?>" style="display:<?php if(($i==2 && $resApp['Appraiser_SoftSkill_'.$i]=='') OR ($i>=2 && $resApp['Appraiser_SoftSkill_'.$i]!='')){echo 'block';}else{echo 'none';}?>;" onClick="FunAddMin(1,<?=$i?>,'A')">
		 <img src="images/Minusnew.png" id="Min_A_<?=$i?>" style="display:<?php if($i>2 && $resApp['Appraiser_SoftSkill_'.$i]!=''){echo 'block';}else{echo 'none';}?>;" onClick="FunAddMin(2,<?=$i?>,'A')">
		 <?php } ?>
		</td>
	    <td class="b" id="TD<?=$j?>2">
		 <span id="SpnSn_A_<?=$i?>" style="display:<?php if($i>=3 && $resApp['Appraiser_SoftSkill_'.$i]==''){echo 'none';}else{echo 'block';}?>;">
		  <?=$i?>
		 </span>
		</td>
        <td id="TD<?=$i?>3">
		<span id="SpnACat<?=$i?>" style="display:<?php if($i>=3 && $resApp['Appraiser_SoftSkill_'.$i]==''){echo 'none';}else{echo 'block';}?>;">
	    <select style="width:99%;background-color:#DDFFBB;" class="a" id="CatA_<?=$i?>" name="CatA_<?=$i?>" onChange="SelectACat(this.value,<?=$i?>)">
		<?php if($resApp['Appraiser_SoftSkill_'.$i]!='' OR $resApp['Appraiser_SoftSkill_'.$i]!='0'){ $sSS1 = mysql_query("SELECT Tid,Category FROM hrm_pms_training WHERE Tid=".$resApp['Appraiser_SoftSkill_'.$i],$con); $rSS1 = mysql_fetch_assoc($sSS1);?><option style="background-color:#FFFFFF;" value="<?=$rSS1['Tid']?>"><?=$rSS1['Category']?></option>
		<?php }else{?><option style="background-color:#FFFFFF;" value="">Select</option><?php } ?>
		<?php $sS1 = mysql_query("SELECT Tid,Category FROM hrm_pms_training WHERE Type='Soft Skill' AND Category!='Other' AND Sts='A' group by Category order by Category",$con); while($rS1 = mysql_fetch_assoc($sS1)){ ?><option style="background-color:#FFFFFF;" value="<?=$rS1['Category']?>"><?=$rS1['Category']?></option><?php } ?>
		<?php /*?><option style="background-color:#FFFFFF;" value="Other" <?php if($resApp['Appraiser_SoftSkill_'.$i]==69){echo 'selected';}?>>Other</option><?php */?>
		</select>
		</span>
	    </td>      
        <td>
		<span id="SpnATop<?=$i?>" style="display:<?php if($i>=3 && $resApp['Appraiser_SoftSkill_'.$i]==''){echo 'none';}else{echo 'block';}?>;">
	    <select style="width:99%;background-color:#DDFFBB;" class="a" id="TopA_<?=$i?>" name="TopA_<?=$i?>" onChange="SelectATop(this.value,<?=$i?>)" <?php if($resApp['Appraiser_SoftSkill_'.$i]=='' OR $resApp['Appraiser_SoftSkill_'.$i]=='0'){ echo 'disabled';}?> >
		<?php if($resApp['Appraiser_SoftSkill_'.$i]=='' OR $resApp['Appraiser_SoftSkill_'.$i]=='0'){?>
		<option style="background-color:#FFFFFF;" value="">Select</option><?php } ?>
		<?php $sS2 = mysql_query("SELECT Tid,Topic FROM hrm_pms_training WHERE Type='Soft Skill' AND Sts='A' group by Topic order by Topic,Category", $con); while($rS2 = mysql_fetch_assoc($sS2)){ ?><option style="background-color:#FFFFFF;" value="<?=$rS2['Tid']?>" <?php if($rS2['Tid']==$resApp['Appraiser_SoftSkill_'.$i]){echo 'selected';}?>><?=$rS2['Topic']?></option><?php } ?>
		<option style="background-color:#FFFFFF;" value="69" <?php if($resApp['Appraiser_SoftSkill_'.$i]==69){echo 'selected';}?>>Other</option>
		</select>
		</span>
		
		<input type="hidden" name="TopAA_<?=$i?>" id="TopAA_<?=$i?>" value="<?=$resApp['Appraiser_SoftSkill_'.$i]?>"/>
		
	    </td>
        <td class="bdy" id="TD<?=$i?>4" class="bdy" style="font-size:14px;">
<?php $desc=''; if($resApp['Appraiser_SoftSkill_'.$i]!='' && $resApp['Appraiser_SoftSkill_'.$i]!='69'){ $sDs = mysql_query("SELECT Description FROM hrm_pms_training WHERE Tid=".$resApp['Appraiser_SoftSkill_'.$i], $con); $rDs = mysql_fetch_assoc($sDs); $desc=$rDs['Description']; }elseif($resApp['Appraiser_SoftSkill_'.$i]=='69'){$desc=$resApp['Appraiser_SoftSkill_Oth'];} ?>  
		 <span id="SpnADes<?=$i?>" style="display:<?php if($i>=3 && $resApp['Appraiser_SoftSkill_'.$i]==''){echo 'none';}else{echo 'block';}?>;">
		 <?=$desc?>
		 </span>
		</td>
       </tr>
	   <?php } ?>
	 </table> 
	 
	 
	<input type="hidden" id="ActID" value="0"/><input type="hidden" id="ActBID" value="0"/>  
	<input type="hidden" name="TraS_Oth" id="TraS_Oth" value="<?=$resApp['Appraiser_SoftSkill_Oth']?>"/>
	<input type="hidden" name="TraT_Oth" id="TraT_Oth" value="<?=$resApp['Appraiser_TechSkill_Oth']?>"/>
	<input type="hidden" id="AppSoftSkill_1" name="AppSoftSkill_1" value="<?php echo $resApp['Appraiser_SoftSkill_1']; ?>" class="bl" style="width:100%;border:hidden;" maxlength="400" <?php if($resApp['Appraiser_PmsStatus']==2) { echo 'readonly'; } ?> /><input type="hidden" id="AppSoftSkill_2" name="AppSoftSkill_2" value="<?php echo $resApp['Appraiser_SoftSkill_2']; ?>" class="bl" style="width:100%;border:hidden;" maxlength="400" <?php if($resApp['Appraiser_PmsStatus']==2) { echo 'readonly'; } ?> />
	</td>
   </tr>
  
   <tr><td class="hl"><b>b)&nbsp;Functional Skills</b> [Job related]</td></tr>
   <tr>
    <td style="vertical-align:top;">
	 <table style="width:100%;">
	  <tr bgcolor="#FFFF53" style="height:22px;">
	   <td class="fhead" style="width:2%;"></td>
	   <td class="fhead" style="width:3%;">Sn</td> 
       <td class="fhead" style="width:18%;">Topic</td>
       <td class="fhead" style="width:77%;">Description</td>
      </tr>
	   <?php for($j=1; $j<=5; $j++){ ?>
	   
	   <tr id="TR_B_<?=$j?>" style="height:22px;background-color:<?php if($j<=2 || $resApp['Appraiser_TechSkill_'.$j]!=''){echo '#FFFFFF';}else{echo '';}?>;">
	    
		<td class="b" id="TD<?=$j?>1">
		 <?php if($j<=4){ ?>
		 <img src="images/Addnew.png" id="Add_B_<?=$j?>" style="display:<?php if(($j==2 && $resApp['Appraiser_TechSkill_'.$j]=='') OR ($j>=2 && $resApp['Appraiser_TechSkill_'.$j]!='')){echo 'block';}else{echo 'none';}?>;" onClick="FunAddMin(1,<?=$j?>,'B')">
		 <img src="images/Minusnew.png" id="Min_B_<?=$j?>" style="display:<?php if($j>2 && $resApp['Appraiser_TechSkill_'.$j]!=''){echo 'block';}else{echo 'none';}?>;" onClick="FunAddMin(2,<?=$j?>,'B')">
		 <?php } ?>
		</td>
		<td class="b" id="TD<?=$j?>2">
		 <span id="SpnSn_B_<?=$j?>" style="display:<?php if($j>=3 && $resApp['Appraiser_TechSkill_'.$j]==''){echo 'none';}else{echo 'block';}?>;">
		  <?=$j?>
		 </span>
		</td>   
        <td id="TD<?=$j?>3">
		<span id="SpnBTop<?=$j?>" style="display:<?php if($j>=3 && $resApp['Appraiser_TechSkill_'.$j]==''){echo 'none';}else{echo 'block';}?>;">
	     <select style="width:99%;background-color:#DDFFBB;" class="a" id="TopB_<?=$j?>" name="TopB_<?=$j?>" onChange="SelectBTop(this.value,<?=$j?>)">
		 <?php if($resApp['Appraiser_TechSkill_'.$j]=='' OR $resApp['Appraiser_TechSkill_'.$j]=='0'){?>
		 <option style="background-color:#FFFFFF;" value="">Select</option><?php } ?>
		<?php $sS2 = mysql_query("SELECT Tid,Topic FROM hrm_pms_training WHERE Type='Functional Skills' AND Category='".$resDpt['DepartmentCode']."' AND Sts='A' group by Topic order by Topic,Category", $con); while($rS2 = mysql_fetch_assoc($sS2)){ ?><option style="background-color:#FFFFFF;" value="<?=$rS2['Tid']?>" <?php if($rS2['Tid']==$resApp['Appraiser_TechSkill_'.$j]){echo 'selected';}?>><?=$rS2['Topic']?></option><?php } ?>
		<option style="background-color:#FFFFFF;" value="70" <?php if($resApp['Appraiser_TechSkill_'.$j]==70){echo 'selected';}?>>Other</option>
		<option style="background-color:#FFFFFF;" value="70">Other</option>
		 </select>
		</span>
	    </td>
        <td id="TD<?=$j?>4" class="bdy" style="font-size:14px;">
		<?php $descB=''; if($resApp['Appraiser_TechSkill_'.$j]!='' && $resApp['Appraiser_TechSkill_'.$j]!='70'){ $sDsB = mysql_query("SELECT Description FROM hrm_pms_training WHERE Tid=".$resApp['Appraiser_TechSkill_'.$j], $con); $rDsB = mysql_fetch_assoc($sDsB); $descB=$rDsB['Description']; }elseif($resApp['Appraiser_TechSkill_'.$j]=='70'){$descB=$resApp['Appraiser_TechSkill_Oth'];} ?>
		 <span id="SpnBDes<?=$j?>" style="display:<?php if($j>=3 && $resApp['Appraiser_TechSkill_'.$j]==''){echo 'none';}else{echo 'block';}?>;">
		 <?=$descB?>
		 </span>
		</td>
       </tr>
	  
	   <?php } ?>
	 </table>

	<input type="hidden" id="AppTechSkill_1" name="AppTechSkill_1" value="<?php echo $resApp['Appraiser_TechSkill_1']; ?>" class="bl" style="width:100%;border:hidden;" maxlength="400" <?php if($resApp['Appraiser_PmsStatus']==2) { echo 'readonly'; } ?> />
	<input type="hidden" id="AppTechSkill_2" name="AppTechSkill_2" value="<?php echo $resApp['Appraiser_TechSkill_2']; ?>" class="bl" style="width:100%;border:hidden;" maxlength="400" <?php if($resApp['Appraiser_PmsStatus']==2) { echo 'readonly'; } ?> />
	</td>
   </tr>
  </table>
  </td>
 </tr>
 <tr><td>&nbsp;</td></tr>
 
 <?php } //333333333333333 Close ?>

 <tr>
  <td>
  <table style="width:100%;"> 
   <tr><td colspan="5" class="bdy"><b><i>Remarks&nbsp;</i></b></td></tr>
   <tr bgcolor="#FFFFFF" style="height:24px;">
    <td style="font-family:Times New Roman; color:#FFFFFF;font-size:12px;width:1100px;">
<input id="AppRemarks" name="AppRemarks" value="<?php if($_SESSION['eAppform']=='Y'){ echo $resApp['Appraiser_Remark']; }elseif($_SESSION['eMidform']=='Y'){echo $resApp['Mid_Appraiser_Remark']; } ?>" class="bl" style="width:100%;border:hidden;" maxlength="450" <?php if($resApp['Appraiser_PmsStatus']==2){ echo 'readonly'; } ?> />
    </td>
   </tr>
  </table>
  </td>
 </tr>
 <tr><td>&nbsp;</td></tr>
 
 <tr>
  <td>
  <?php if($resApp['Appraiser_PmsStatus']!=2) { ?>
  <table>
   <tr style="height:24px;">
    <td style="width:100px;"><input type="submit" name="<?php if($_SESSION['eAppform']=='Y'){echo 'SaveScore';}elseif($_SESSION['eMidform']=='Y'){echo 'Mid_SaveScore';} ?>" id="SaveScore" style="width:90px;height:25px;" onClick="return AppScore(<?php echo $resApp['EmpPmsId'].','.$Eid.','.$YearId; ?>)" value="save"/></td>
    <td align="left" style="width:150px;"><input type="submit" name="<?php if($_SESSION['eAppform']=='Y'){echo 'SubmitScore';}elseif($_SESSION['eMidform']=='Y'){echo 'Mid_SubmitScore';} ?>" id="SubmitScore" style="width:120px;height:25px;" onClick="return AppScore2(<?php echo $resApp['EmpPmsId'].','.$Eid.','.$YearId; ?>)" value="submit form"/>
    </td>
    <td style="width:300px;"><font color="#014E05" style='font-family:Times New Roman;' size="4"><b><i><span id="MsgSpan2"></span></i><?php echo $msg; ?></b></font></td>	   
   </tr>
  </table> 
  <?php } ?>
  
  <?php /*
   <input type="submit" name="<?php if($_SESSION['eAppform']=='Y'){echo 'SaveScore';}elseif($_SESSION['eMidform']=='Y'){echo 'Mid_SaveScore';} ?>" id="SaveScore" style="width:90px;height:25px;" onClick="return AppScore(<?php echo $resApp['EmpPmsId'].','.$Eid.','.$YearId; ?>)" value="."/>
    
    <input type="submit" name="<?php if($_SESSION['eAppform']=='Y'){echo 'SubmitScore';}elseif($_SESSION['eMidform']=='Y'){echo 'Mid_SubmitScore';} ?>" id="SubmitScore" style="width:120px;height:25px;" onClick="return AppScore2(<?php echo $resApp['EmpPmsId'].','.$Eid.','.$YearId; ?>)" value=".."/>
  */ ?>
  
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
<?php //****************************** Close ****************************** ?>					
				  </table>
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
	<tr>
	  <td valign="top">
	    <?php //require_once("../footer.php"); ?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>







