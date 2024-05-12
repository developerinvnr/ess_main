<?php require_once('../AdminUser/config/config.php');
if(isset($_POST['HS']) && $_POST['HS']!=""){ $HS=$_POST['HS']; $PmsId=$_POST['PmsId']; $EmpId=$_POST['EmpId']; $ComId=$_POST['ComId']; $No=$_POST['No']; $HR=$_POST['HR'];
echo '<input type="hidden" id="NoId" value="'.$No.'" />';
$sqlR=mysql_query("select RatingName from hrm_pms_rating where Rating=".$HR, $con); $resR=mysql_fetch_assoc($sqlR); 
$sqlUp=mysql_query("update hrm_employee_pms set Hod_TotalFinalScore=".$HS.", Hod_TotalFinalRating=".$HR.", Hod_RatingName='".$resR['RatingName']."', HodSubmit_ScoreStatus=2, HodSubmit_ScoreDate='".date("Y-m-d")."', HodSubmit_IncStatus=1, Dummy_HodRating=".$HR." where EmpPmsId=".$PmsId." AND EmployeeID=".$EmpId, $con);  
if($sqlUp){echo 'Normalized Score Save Successfully...';}
} ?>

<?php if(isset($_POST['Reason']) && $_POST['Reason']!=""){ $PmsId=$_POST['PmsId']; $EmpId=$_POST['EmpId']; $ComId=$_POST['ComId']; $No=$_POST['No']; //$Reason=$_POST['Reason'];

  $search =  '!"#$%&/=?*+\'-;:_' ;
  $search = str_split($search);
  $str_Remark = $_POST['Reason'];  
  $Reason=str_replace($search, "", $str_Remark);

echo '<input type="hidden" id="NoId" value="'.$No.'" />';
$sql=mysql_query("select Emp_SubmitedDate, EmpFormAScore, EmpFormBScore, EmpFinallyFormA_Score, EmpFinallyFormB_Score, Emp_TotalFinalScore, Emp_TotalFinalRating, Appraiser_SubmitedDate, AppraiserFormAScore, AppraiserFormBScore, AppraiserFinallyFormA_Score, AppraiserFinallyFormB_Score, Appraiser_TotalFinalScore, Appraiser_TotalFinalRating, Reviewer_SubmitedDate, ReviewerFormAScore, ReviewerFormBScore, ReviewerFinallyFormA_Score, ReviewerFinallyFormB_Score, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Hod_NoOfResend from hrm_employee_pms where EmpPmsId=".$PmsId." AND EmployeeID=".$EmpId, $con); $res=mysql_fetch_assoc($sql);

$NoReSend=$res['Hod_NoOfResend']+1;
$sqlUp=mysql_query("update hrm_employee_pms set Reviewer_PmsStatus=1, Rev2_PmsStatus=1, HodSubmit_ScoreStatus=3, Hod_NoOfResend=".$NoReSend." where EmpPmsId=".$PmsId." AND EmployeeID=".$EmpId, $con);

if($sqlUp)
{ 
  $sqlIns=mysql_query("insert into hrm_employee_pms_resend(EmpPmsId, CompanyId, EmployeeID, Emp_SubmitedDate, EmpFormAScore, EmpFormBScore, EmpFinallyFormA_Score, EmpFinallyFormB_Score, Emp_TotalFinalScore, Emp_TotalFinalRating, App_SubmitedDate, AppFormAScore, AppFormBScore, AppFinallyFormA_Score, AppFinallyFormB_Score, App_TotalFinalScore, App_TotalFinalRating, Rev_SubmitedDate, RevFormAScore, RevFormBScore, RevFinallyFormA_Score, RevFinallyFormB_Score, Rev_TotalFinalScore, Rev_TotalFinalRating, Hod_Reason, Hod_SendReasonDate) values(".$PmsId.", ".$ComId.", ".$EmpId.", '".$res['Emp_SubmitedDate']."', ".$res['EmpFormAScore'].", ".$res['EmpFormBScore'].", ".$res['EmpFinallyFormA_Score'].", ".$res['EmpFinallyFormB_Score'].", ".$res['Emp_TotalFinalScore'].", ".$res['Emp_TotalFinalRating'].", '".$res['Appraiser_SubmitedDate']."', ".$res['AppraiserFormAScore'].", ".$res['AppraiserFormBScore'].", ".$res['AppraiserFinallyFormA_Score'].", ".$res['AppraiserFinallyFormB_Score'].", ".$res['Appraiser_TotalFinalScore'].", ".$res['Appraiser_TotalFinalRating'].", '".$res['Reviewer_SubmitedDate']."', ".$res['ReviewerFormAScore'].", ".$res['ReviewerFormBScore'].", ".$res['ReviewerFinallyFormA_Score'].", ".$res['ReviewerFinallyFormB_Score'].", ".$res['Reviewer_TotalFinalScore'].", ".$res['Reviewer_TotalFinalRating'].", '".$Reason."', '".date("Y-m-d")."')", $con);	
}

if($sqlIns){echo 'Reviewer Resend Successfully...';}
} ?>

