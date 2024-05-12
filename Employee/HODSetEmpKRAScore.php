<?php 
require_once('../AdminUser/config/config.php');
if(isset($_POST['P']) && $_POST['P']!=""){  $P=$_POST['P']; $E=$_POST['E']; $Y=$_POST['Y']; $AScoPms=$_POST['AScoPms']; $BScoPms=$_POST['BScoPms']; $RevRem=$_POST['RevRem']; 
$ComId=$_POST['ComId']; $S1=$_POST['S1']; $S2=$_POST['S2']; $TotS1S2=$_POST['TotS1S2']; $DesigId=$_POST['DesigId']; $GradeId=$_POST['GradeId']; $Justi=$_POST['Justi'];

if($TotS1S2>150){$Rev_TotalFinalRating=5;}
else
{
$sqlRat=mysql_query("select ScoreFrom,ScoreTo,Rating from hrm_pms_rating where YearId=".$Y." AND CompanyId=".$ComId, $con); 
while($resRat=mysql_fetch_array($sqlRat))
{ if($TotS1S2>=$resRat['ScoreFrom'] AND $TotS1S2<=$resRat['ScoreTo'])
 {$Rev_TotalFinalRating=$resRat['Rating'];}} 
}
 $search =  '!"#$/=?*+\';:' ; //&%
 $search = str_split($search);
 $str_Remark = $RevRem;  
 $str_S1 = $_POST['SSk1']; $str_S2 = $_POST['SSk2']; 
 $str_T1 = $_POST['TSk1']; $str_T2 = $_POST['TSk2'];
 $str_Jus = $Justi;
 $RevRemark=str_replace($search, "", $str_Remark);
 $SS1=str_replace($search, "", $str_S1); $SS2=str_replace($search, "", $str_S2); 
 $TT1=str_replace($search, "", $str_T1); $TT2=str_replace($search, "", $str_T2);
 $RevJus=str_replace($search, "", $str_Jus);

$sqlUpPms=mysql_query("update hrm_employee_pms set ReviewerFormAScore=".$AScoPms.", ReviewerFormBScore=".$BScoPms.", Reviewer_Remark='".addslashes($RevRemark)."', Reviewer_PmsStatus=1, Reviewer_SubmitedDate='".date("Y-m-d")."', ReviewerFinallyFormA_Score=".$S1.", ReviewerFinallyFormB_Score=".$S2.", Reviewer_TotalFinalScore=".$TotS1S2.", Reviewer_TotalFinalRating=".$Rev_TotalFinalRating.", Reviewer_EmpDesignation=".$DesigId.", Reviewer_EmpGrade=".$GradeId.", Reviewer_SoftSkill_1='".$_POST['SSk1']."', Reviewer_SoftSkill_2='".$_POST['SSk2']."',Reviewer_SoftSkill_3='".$_POST['SSk3']."', Reviewer_SoftSkill_4='".$_POST['SSk4']."',Reviewer_SoftSkill_5='".$_POST['SSk5']."', Reviewer_SoftSkill_Oth='".$_POST['SSkOth']."', Reviewer_TechSkill_1='".$_POST['TSk1']."', Reviewer_TechSkill_2='".$_POST['TSk2']."', Reviewer_TechSkill_3='".$_POST['TSk3']."', Reviewer_TechSkill_4='".$_POST['TSk4']."', Reviewer_TechSkill_5='".$_POST['TSk5']."', Reviewer_TechSkill_Oth='".$_POST['TSkOth']."', Reviewer_Justification='".addslashes($RevJus)."', Hod_TotalFinalScore=".$TotS1S2.", Hod_TotalFinalRating=".$Rev_TotalFinalRating.", Dummy_RevRating=".$Rev_TotalFinalRating.", Dummy_HodRating=".$Rev_TotalFinalRating." where EmpPmsId=".$P." AND EmployeeID=".$E, $con);

if($sqlUpPms){echo 'Form saved successfully!';}
}	


if(isset($_POST['P2']) && $_POST['P2']!=""){  $P=$_POST['P2']; $E=$_POST['E2']; $Y=$_POST['Y2']; $AScoPms=$_POST['AScoPms2']; $BScoPms=$_POST['BScoPms2']; $RevRem=$_POST['RevRem2']; $ComId=$_POST['ComId2']; $S1=$_POST['S1']; $S2=$_POST['S2']; $TotS1S2=$_POST['TotS1S2']; $DesigId=$_POST['DesigId']; $GradeId=$_POST['GradeId']; $Justi=$_POST['Justi'];

if($TotS1S2>150){$Rev_TotalFinalRating=5;}
else
{
$sqlRat=mysql_query("select ScoreFrom,ScoreTo,Rating from hrm_pms_rating where RatingStatus='A' AND YearId=".$Y." AND CompanyId=".$ComId, $con); 
while($resRat=mysql_fetch_array($sqlRat))
{ if($TotS1S2>=$resRat['ScoreFrom'] AND $TotS1S2<=$resRat['ScoreTo'])
 {$Rev_TotalFinalRating=$resRat['Rating'];}}
} 
 $search =  '!"#$/=?*+\'-;:_' ;   //%&
 $search = str_split($search);
 $str_Remark = $RevRem;  
 $str_S1 = $_POST['SSk1']; $str_S2 = $_POST['SSk2']; 
 $str_T1 = $_POST['TSk1']; $str_T2 = $_POST['TSk2'];
 $str_Jus = $Justi;
 $RevRemark=str_replace($search, "", $str_Remark);
 $SS1=str_replace($search, "", $str_S1); $SS2=str_replace($search, "", $str_S2); 
 $TT1=str_replace($search, "", $str_T1); $TT2=str_replace($search, "", $str_T2);
 $RevJus=str_replace($search, "", $str_Jus);
 
$sqlUpPms=mysql_query("update hrm_employee_pms set ReviewerFormAScore=".$AScoPms.", ReviewerFormBScore=".$BScoPms.", Reviewer_Remark='".addslashes($RevRemark)."', Reviewer_PmsStatus=2, Reviewer_SubmitedDate='".date("Y-m-d")."', ReviewerFinallyFormA_Score=".$S1.", ReviewerFinallyFormB_Score=".$S2.", Reviewer_TotalFinalScore=".$TotS1S2.", Reviewer_TotalFinalRating=".$Rev_TotalFinalRating.", Reviewer_EmpDesignation=".$DesigId.", Reviewer_EmpGrade=".$GradeId.", Reviewer_SoftSkill_1='".$_POST['SSk1']."', Reviewer_SoftSkill_2='".$_POST['SSk2']."',Reviewer_SoftSkill_3='".$_POST['SSk3']."', Reviewer_SoftSkill_4='".$_POST['SSk4']."',Reviewer_SoftSkill_5='".$_POST['SSk5']."', Reviewer_SoftSkill_Oth='".$_POST['SSkOth']."', Reviewer_TechSkill_1='".$_POST['TSk1']."', Reviewer_TechSkill_2='".$_POST['TSk2']."', Reviewer_TechSkill_3='".$_POST['TSk3']."', Reviewer_TechSkill_4='".$_POST['TSk4']."', Reviewer_TechSkill_5='".$_POST['TSk5']."', Reviewer_TechSkill_Oth='".$_POST['TSkOth']."', Reviewer_Justification='".addslashes($RevJus)."', Hod_TotalFinalScore=".$TotS1S2.", Hod_TotalFinalRating=".$Rev_TotalFinalRating.", Dummy_RevRating=".$Rev_TotalFinalRating.", Dummy_HodRating=".$Rev_TotalFinalRating." where EmpPmsId=".$P." AND EmployeeID=".$E, $con);

if($sqlUpPms){ echo '<input type="hidden" id="reportScore" value="Y" />'; echo 'Form submitted successfully!'; }
}	

?>
