<?php
if($_REQUEST['action']=='submit')
{  

 if($_SESSION['eAppform']=='Y')
 {
   
   $sql=mysql_query("select EmpFormAScore, EmpFormBScore, FormAKraAllow_PerOfWeightage, FormBBehaviAllow_PerOfWeightage from hrm_employee_pms where EmpPmsId=".$_SESSION['ePmsId']." AND EmployeeID=".$EmployeeId, $con); $res=mysql_fetch_assoc($sql);
   
   //echo $res['EmpFormAScore'];
   
   $Aweight=$res['FormAKraAllow_PerOfWeightage']; $Bweight=$res['FormBBehaviAllow_PerOfWeightage'];
   $EmpFinallyFormAScore=($res['EmpFormAScore']*$res['FormAKraAllow_PerOfWeightage'])/100;
   $EmpFinallyFormBScore=($res['EmpFormBScore']*$res['FormBBehaviAllow_PerOfWeightage'])/100;
   $Emp_TotalFinalScore=$EmpFinallyFormAScore+$EmpFinallyFormBScore;
   
   $sqlM = mysql_query("SELECT INCENTIVE_Value,Tot_GrossMonth,Tot_CTC FROM hrm_employee_ctc where EmployeeID=".$EmployeeId." AND Status='A'", $con); $resM = mysql_fetch_assoc($sqlM);
   
   //$Emp_TotalFinalScore=round($Emp_TotalFinalScore,2);
   //if($EmployeeId==441){echo $Emp_TotalFinalScore;}
   
   if($Emp_TotalFinalScore>150){$Emp_TotalFinalRating=5;}
   else
   { 
    $sqlRat=mysql_query("select ScoreFrom,ScoreTo,Rating from hrm_pms_rating where RatingStatus='A' AND YearId=".$_SESSION['PmsYId']." AND CompanyId=".$CompanyId, $con); 
    while($resRat=mysql_fetch_array($sqlRat))
    { if($Emp_TotalFinalScore>=$resRat['ScoreFrom'] AND $Emp_TotalFinalScore<=$resRat['ScoreTo'])
	  { $Emp_TotalFinalRating=$resRat['Rating'];}
	}
   } 
    
    $SD=mysql_query("select DepartmentId,GradeId,DesigId from hrm_employee_general where EmployeeID=".$EmployeeId,$con);  $RD=mysql_fetch_assoc($SD); 
    $_SESSION['Dept']=$RD['DepartmentId']; $_SESSION['Desig']=$RD['DesigId']; $_SESSION['Grade']=$RD['GradeId'];
   
    $sqlUp=mysql_query("update hrm_employee_pms set EmpCurrGrossPM=".$resM['Tot_GrossMonth'].", EmpCurrCtc='".$resM['Tot_CTC']."', EmpCurrIncentivePM=".$resM['INCENTIVE_Value'].", Emp_PmsStatus=2, Emp_SubmitedDate='".date("Y-m-d")."', EmpFinallyFormA_Score=".$EmpFinallyFormAScore.", EmpFinallyFormB_Score=".$EmpFinallyFormBScore.", Emp_TotalFinalScore=".$Emp_TotalFinalScore.", Emp_TotalFinalRating=".$Emp_TotalFinalRating.", Dummy_EmpRating=".$Emp_TotalFinalRating.", HR_CurrDesigId=".$RD['DesigId'].", HR_CurrGradeId=".$RD['GradeId'].", HR_Curr_DepartmentId=".$RD['DepartmentId']." where EmpPmsId=".$_SESSION['ePmsId'], $con);
  //$msg="You have successfully submitted appraisal form!";
 
 }
 elseif($resKeey['MidPmsForm']=='Y')
 {
   
   $sqlUp=mysql_query("update hrm_employee_pms set Emp_PmsStatus=2, Mid_Emp_SubmitedDate='".date("Y-m-d")."', Mid_EmpFinallyFormA_Score=0, Mid_EmpFinallyFormB_Score=0, Mid_Emp_TotalFinalScore=0, Mid_Emp_TotalFinalRating=0 where EmpPmsId=".$_SESSION['ePmsId'], $con);
   
 }
 
}

?>
