<?php 
$QKe=mysql_query("select * from hrm_pms_key where Person='emp' AND CompanyId=".$CompanyId,$con);
$QKa=mysql_query("select * from hrm_pms_key where Person='app' AND CompanyId=".$CompanyId,$con);
$QKr=mysql_query("select * from hrm_pms_key where Person='rev' AND CompanyId=".$CompanyId,$con); 
$QKh=mysql_query("select * from hrm_pms_key where Person='hod' AND CompanyId=".$CompanyId,$con);
$Keye=mysql_fetch_assoc($QKe); $Keya=mysql_fetch_assoc($QKa); $Keyr=mysql_fetch_assoc($QKr); $Keyh=mysql_fetch_assoc($QKh);

/*Emp*/ $_SESSION['eMsg']=$Keye['EmpMsg']; $_SESSION['eDetails']=$Keye['PersonalDetails']; 
$_SESSION['eSchedule']=$Keye['Schedule']; $_SESSION['eAppform']=$Keye['AppraisalForm']; 
$_SESSION['eMidform']=$Keye['MidPmsForm']; $_SESSION['eKraform']=$Keye['KRAForm'];  
$_SESSION['eHelpfaq']=$Keye['Help_Faq']; $_SESSION['eVeiwprint']=$Keye['View_Print']; 

/*App*/ $_SESSION['aHome']=$Keya['Home']; $_SESSION['aTeam']=$Keya['MyTeam']; $_SESSION['aStatus']=$Keya['TeamStatus']; 
$_SESSION['aEKform']=$Keya['FKraForm']; $_SESSION['aEPform']=$Keya['FPmsForm']; $_SESSION['aEHform']=$Keya['FHistoryForm']; 
$_SESSION['aRating']=$Keya['RatingGraph'];

/*Rev*/ $_SESSION['rHome']=$Keyr['Home']; $_SESSION['rTeam']=$Keyr['MyTeam']; $_SESSION['rStatus']=$Keyr['TeamStatus']; 
$_SESSION['rEKform']=$Keyr['FKraForm']; $_SESSION['rEPform']=$Keyr['FPmsForm']; $_SESSION['rEHform']=$Keyr['FHistoryForm']; $_SESSION['rRating']=$Keyr['RatingGraph'];

/*HOD*/ $_SESSION['hHome']=$Keyh['Home']; $_SESSION['hTeam']=$Keyh['MyTeam']; $_SESSION['hStatus']=$Keyh['TeamStatus']; 
$_SESSION['hEKform']=$Keyh['FKraForm']; $_SESSION['hEPform']=$Keyh['FPmsForm']; $_SESSION['hEHform']=$Keyh['FHistoryForm'];
$_SESSION['hScore']=$Keyh['Score']; $_SESSION['hProm']=$Keyh['Promotion']; $_SESSION['hInc']=$Keyh['Increment']; 
$_SESSION['hPmsreport']=$Keyh['MyPmsReport']; $_SESSION['hIncreport']=$Keyh['IncrementReport']; 
$_SESSION['hRating']=$Keyh['RatingGraph'];

$Qyeark=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='KRA'",$con);
if($_SESSION['eMidform']=='Y'){ $Qyearp=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='Mid_PMS'",$con); }else{ $Qyearp=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='PMS'", $con); } $Yeark=mysql_fetch_assoc($Qyeark); $Yearp=mysql_fetch_assoc($Qyearp);

$_SESSION['KraYId']=$Yeark['CurrY']; $_SESSION['PmsYId']=$Yearp['CurrY']; 
$_SESSION['AllowDoj']=$Yearp['AllowEmpDoj']; $_SESSION['EffDate']=$Yearp['EffectedDate2'];

$sqlKy=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_SESSION['KraYId'], $con); 
$sqlPy=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_SESSION['PmsYId'], $con); 
$resKy=mysql_fetch_assoc($sqlKy); $resPy=mysql_fetch_assoc($sqlPy); 
$kf=date("Y",strtotime($resKy['FromDate'])); $kt=date("Y",strtotime($resKy['ToDate'])); $kt2=$kf-1; 
$pf=date("Y",strtotime($resPy['FromDate'])); $pt=date("Y",strtotime($resPy['ToDate'])); $pt2=$pf-1;

if($CompanyId==1){ $_SESSION['KraYear']=$kf; $_SESSION['PmsYear']=$pf; }
else{ $_SESSION['KraYear']=$kf.'-'.$kt; $_SESSION['PmsYear']=$pf.'-'.$pt; }
//else{ $_SESSION['KraYear']=$kt2.'-'.$kf; $_SESSION['PmsYear']=$pt2.'-'.$pf; }
$_SESSION['KraYId_Old']=$Yeark['OldY']; $_SESSION['KraYId_New']=$Yeark['NewY'];

$SD=mysql_query("select EmpCode,DepartmentId,GradeId,DesigId,DateJoining,HqId,RetiStatus,RetiDate from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID where g.EmployeeID=".$EmployeeId,$con); $RD=mysql_fetch_assoc($SD); 
$_SESSION['Dept']=$RD['DepartmentId']; $_SESSION['Desig']=$RD['DesigId']; $_SESSION['Grade']=$RD['GradeId'];
$_SESSION['Hq']=$RD['HqId']; $_SESSION['Joining']=$RD['DateJoining']; $_SESSION['RetiStatus']=$RD['RetiStatus']; 
$_SESSION['RetiDate']=$RD['RetiDate']; $_SESSION['Before31Day']=date("Y-m-d",strtotime('-30 day'));  
$_SESSION['After31DayDoJ']=date("Y-m-d",strtotime($_SESSION['Joining'].'+31 day'));
$_SESSION['EmpCode']=$RD['EmpCode'];

$sPSch=mysql_query("select * from hrm_pms_appdate where AssessmentYear=".$_SESSION['PmsYId']." AND CompanyId=".$CompanyId, $con); $rPSch=mysql_fetch_assoc($sPSch); 
$_SESSION['eFrom']=$rPSch['EmpFromDate']; $_SESSION['eTo']=$rPSch['EmpToDate']; $_SESSION['eSts']=$rPSch['EmpDateStatus'];
$_SESSION['aFrom']=$rPSch['AppFromDate']; $_SESSION['aTo']=$rPSch['AppToDate']; $_SESSION['aSts']=$rPSch['AppDateStatus'];
$_SESSION['rFrom']=$rPSch['RevFromDate']; $_SESSION['rTo']=$rPSch['RevToDate']; $_SESSION['rSts']=$rPSch['RevDateStatus'];
$_SESSION['hFrom']=$rPSch['HodFromDate']; $_SESSION['hTo']=$rPSch['HodToDate']; $_SESSION['hSts']=$rPSch['HodDateStatus'];

$sKSch=mysql_query("select * from hrm_pms_kradate where AssessmentYear=".$_SESSION['KraYId']." AND CompanyId=".$CompanyId, $con); $KSch=mysql_fetch_assoc($sKSch); 
$_SESSION['ekFrom']=$KSch['EmpFromDate']; $_SESSION['ekTo']=$KSch['EmpToDate']; $_SESSION['ekSts']=$KSch['EmpDateStatus'];
$_SESSION['akFrom']=$KSch['AppFromDate']; $_SESSION['akTo']=$KSch['AppToDate']; $_SESSION['akSts']=$KSch['AppDateStatus'];
$_SESSION['rkFrom']=$KSch['RevFromDate']; $_SESSION['rkTo']=$KSch['RevToDate']; $_SESSION['rkSts']=$KSch['RevDateStatus'];
$_SESSION['hkFrom']=$KSch['HodFromDate']; $_SESSION['hkTo']=$KSch['HodToDate']; $_SESSION['hkSts']=$KSch['HodDateStatus'];


$sqlApp=mysql_query("select Appraiser_EmployeeID from hrm_employee_pms where AssessmentYear=".$_SESSION['PmsYId']." AND Appraiser_EmployeeID=".$EmployeeId, $con); $rowApp=mysql_num_rows($sqlApp); $_SESSION['BtnApp']=$rowApp;
$sqlRev=mysql_query("select Reviewer_EmployeeID from hrm_employee_pms where AssessmentYear=".$_SESSION['PmsYId']." AND Reviewer_EmployeeID=".$EmployeeId, $con); $rowRev=mysql_num_rows($sqlRev); $_SESSION['BtnRev']=$rowRev;
$sqlRev2=mysql_query("select Rev2_EmployeeID from hrm_employee_pms where AssessmentYear=".$_SESSION['PmsYId']." AND Rev2_EmployeeID=".$EmployeeId, $con); $rowRev2=mysql_num_rows($sqlRev2); $_SESSION['BtnRev2']=$rowRev2;
$sqlHod=mysql_query("select HOD_EmployeeID from hrm_employee_pms where AssessmentYear=".$_SESSION['PmsYId']." AND HOD_EmployeeID=".$EmployeeId, $con); $rowHod=mysql_num_rows($sqlHod); $_SESSION['BtnHod']=$rowHod;
  

$sqlKApp=mysql_query("select Appraiser_EmployeeID from hrm_employee_pms where AssessmentYear=".$_SESSION['KraYId']." AND Appraiser_EmployeeID=".$EmployeeId, $con); $rowKApp=mysql_num_rows($sqlKApp); $_SESSION['BtnKApp']=$rowKApp;
$sqlKRev=mysql_query("select Reviewer_EmployeeID from hrm_employee_pms where AssessmentYear=".$_SESSION['KraYId']." AND Reviewer_EmployeeID=".$EmployeeId, $con); $rowKRev=mysql_num_rows($sqlKRev); $_SESSION['BtnKRev']=$rowKRev;


/* update FormA/ FormB weightage Open Open Open Open Open 85-15, 75-25, 65-35*/
$sqlPmsId=mysql_query("select EmpPmsId,FormAKraAllow_PerOfWeightage,FormBBehaviAllow_PerOfWeightage from hrm_employee_pms where AssessmentYear=".$_SESSION['PmsYId']." AND EmployeeID=".$EmployeeId, $con); $resPmsId=mysql_fetch_assoc($sqlPmsId);
$_SESSION['ePmsId']=$resPmsId['EmpPmsId'];

if($resPmsId['FormAKraAllow_PerOfWeightage']==0 OR $resPmsId['FormAKraAllow_PerOfWeightage']=='' OR $resPmsId['FormBBehaviAllow_PerOfWeightage']==0 OR $resPmsId['FormBBehaviAllow_PerOfWeightage']=='')
{
 $sqlPer=mysql_query("select * from hrm_pms_percentage where YearId=".$_SESSION['PmsYId']." AND CompanyId=".$CompanyId,$con);
 while($resPer=mysql_fetch_array($sqlPer))
 {
  if($_SESSION['Grade']>=$resPer['GradeFrom'] AND $_SESSION['Grade']<=$resPer['GradeTo'])
  { $KraWeight=$resPer['PerOfFormAKra_WeighScore']; $FormBWeight=$resPer['PerOfFormBBehavi_WeighScore']; } 
 } 
 $sqlInsW=mysql_query("update hrm_employee_pms set FormAKraAllow_PerOfWeightage=".$KraWeight.", FormBBehaviAllow_PerOfWeightage=".$FormBWeight." where EmpPmsId=".$_SESSION['ePmsId'], $con);
}  
/* update FormA/ FormB weightage Close Close Close Close 85-15, 75-25, 65-35*/ 

 
   
?>