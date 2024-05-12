<?php 
require_once('../AdminUser/config/config.php');
 
if(isset($_POST['P']) && $_POST['P']!=""){  $P=$_POST['P']; $E=$_POST['E']; $Y=$_POST['Y']; $AScoPms=$_POST['AScoPms']; $BScoPms=$_POST['BScoPms']; 
$AppRem=$_POST['AppRem']; $S1=$_POST['S1']; $S2=$_POST['S2']; $TotS1S2=$_POST['TotS1S2']; $ComId=$_POST['ComId']; $DesigId=$_POST['DesigId'];
$GradeId=$_POST['GradeId']; $Justi=$_POST['Justi'];

$sqlRat=mysql_query("select ScoreFrom,ScoreTo,Rating from hrm_pms_rating where CompanyId=".$ComId, $con); 
while($resRat=mysql_fetch_array($sqlRat))
{ if($TotS1S2>=$resRat['ScoreFrom'] AND $TotS1S2<=$resRat['ScoreTo'])
 {$App_Rating=$resRat['Rating'];}} 

$sqlUpPms=mysql_query("update hrm_employee_pms set Appraiser_Remark='".$AppRem."', Appraiser_PmsStatus=1, Appraiser_SubmitedDate='".date("Y-m-d")."', AppraiserFormAScore=".$AScoPms.", AppraiserFinallyFormA_Score=".$S1.", AppraiserFormBScore=".$BScoPms.", AppraiserFinallyFormB_Score=".$S2.", Appraiser_TotalFinalScore=".$TotS1S2.", Appraiser_TotalFinalRating=".$App_Rating.", Appraiser_EmpDesignation=".$DesigId.", Appraiser_EmpGrade=".$GradeId.", Appraiser_Justification='".$Justi."' where EmpPmsId=".$P." AND EmployeeID=".$E, $con);

if($sqlUpPms){echo 'Form saved successfully!';}
}	

  
if(isset($_POST['P2']) && $_POST['P2']!=""){ $P=$_POST['P2']; $E=$_POST['E2']; $Y=$_POST['Y2']; $AScoPms=$_POST['AScoPms2']; $BScoPms=$_POST['BScoPms2']; 
$AppRem=$_POST['AppRem2']; $S1=$_POST['S1']; $S2=$_POST['S2']; $TotS1S2=$_POST['TotS1S2']; $ComId=$_POST['ComId']; $DesigId=$_POST['DesigId'];
$GradeId=$_POST['GradeId']; $Justi=$_POST['Justi'];

$sqlRat=mysql_query("select ScoreFrom,ScoreTo,Rating from hrm_pms_rating where RatingStatus='A' AND CompanyId=".$ComId, $con); 
while($resRat=mysql_fetch_array($sqlRat))
{ if($TotS1S2>=$resRat['ScoreFrom'] AND $TotS1S2<=$resRat['ScoreTo'])
 {$App_Rating=$resRat['Rating'];}} 
 
$sqlUpPms=mysql_query("update hrm_employee_pms set Appraiser_Remark='".$AppRem."', Appraiser_PmsStatus=2, Appraiser_SubmitedDate='".date("Y-m-d")."', AppraiserFormAScore=".$AScoPms.", AppraiserFinallyFormA_Score=".$S1.", AppraiserFormBScore=".$BScoPms.",  AppraiserFinallyFormB_Score=".$S2.", Appraiser_TotalFinalScore=".$TotS1S2.", Appraiser_TotalFinalRating=".$App_Rating.", Appraiser_EmpDesignation=".$DesigId.", Appraiser_EmpGrade=".$GradeId.", Appraiser_Justification='".$Justi."' where EmpPmsId=".$P." AND EmployeeID=".$E, $con);

if($sqlUpPms){echo 'Form submitted successfully!';}
}	

?>
