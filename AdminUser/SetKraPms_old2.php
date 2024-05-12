<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}

if(isset($_POST['SaveEdit']))
{
  $SqlUpdate = mysql_query("UPDATE hrm_pms_setting SET OldY=".$_POST['Old'].", CurrY=".$_POST['Curr'].", NewY=".$_POST['New'].", PrintDate='".$_POST['pd']."', EffectedDate='".$_POST['ed']."', EffectedDate2='".date("Y-m-d",strtotime($_POST['ed2']))."', AllowEmpDoj='".date("Y-m-d",strtotime($_POST['ed3']))."', Arrear_NOM=".$_POST['Arrear_NOM'].", WishingMsg='".$_POST['wMsg']."', LettPeriod='".$_POST['LettPeriod']."' WHERE CompanyId=".$CompanyId." AND SettingId=".$_POST['EditId'], $con) or die(mysql_error()); //Prod_EffectedDate='".$_POST['Ped']."',
     if($SqlUpdate){ $msg = "Data has been Updeted successfully...";}   
}

if(isset($_POST['SaveEditH']))
{
  $SqlUpdate = mysql_query("UPDATE hrm_pms_setting SET Show_History='".$_POST['Show_History']."', Show_Ctc='".$_POST['Show_Ctc']."', Show_Elig='".$_POST['Show_Elig']."', Show_GradeDesig='".$_POST['Show_GradeDesig']."' WHERE CompanyId=".$CompanyId." AND SettingId=".$_POST['EditIdH'], $con) or die(mysql_error()); 
  if($SqlUpdate){ $msg = "Data has been Updeted successfully...";}   
}


/***************************** Appraisal Process Open *************************************/
/***************************** Appraisal Process Open *************************************/

if($_REQUEST['action']=='PrsMidPms' AND $_REQUEST['value']=='true')
{

 $sqlSY=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='Mid_PMS'",$con);  
 $resSY=mysql_fetch_array($sqlSY);
 $sql=mysql_query("select EmployeeID,EmpCode from hrm_employee where EmpStatus='A' AND CompanyId=".$CompanyId, $con);
 while($res=mysql_fetch_assoc($sql))
 { 
  $sqlGd=mysql_query("select GradeId,DesigId,DepartmentId from hrm_employee_general where EmployeeID=".$res['EmployeeID'], $con); $resGd=mysql_fetch_assoc($sqlGd);
  if($resGd['GradeId']!=''){$Grade=$resGd['GradeId'];}else{$Grade=0;} 
  if($resGd['DesigId']!=''){$Desig=$resGd['DesigId'];}else{$Desig=0;}
  if($resGd['DepartmentId']!=''){$Dept=$resGd['DepartmentId'];}else{$Dept=0;}
  
  $sqlPer=mysql_query("select * from hrm_pms_percentage where CompanyId=".$CompanyId, $con); 
  while($resPer=mysql_fetch_array($sqlPer))
  { if($Grade>=$resPer['GradeFrom'] AND $Grade<=$resPer['GradeTo'])
    { $KraWeight=$resPer['PerOfFormAKra_WeighScore']; $FormBWeight=$resPer['PerOfFormBBehavi_WeighScore']; } 
  } 
  
  $sql2=mysql_query("select Appraiser_EmployeeID,Reviewer_EmployeeID,HOD_EmployeeID from hrm_employee_pms where YearId=".$resSY['OldY']." AND EmployeeID=".$res['EmployeeID'], $con); $row2=mysql_num_rows($sql2); 
  
  if($row2>0)
  { $res2=mysql_fetch_assoc($sql2); 
    $chkA=mysql_query("select EmpStatus from hrm_employee where EmployeeID=".$res2['Appraiser_EmployeeID'],$con);
	$chkR=mysql_query("select EmpStatus from hrm_employee where EmployeeID=".$res2['Reviewer_EmployeeID'],$con);
	$chkH=mysql_query("select EmpStatus from hrm_employee where EmployeeID=".$res2['HOD_EmployeeID'],$con);
    $rchkA=mysql_fetch_assoc($chkA); $rchkR=mysql_fetch_assoc($chkR); $rchkH=mysql_fetch_assoc($chkH);
    if($rchkA['EmpStatus']=='A'){ $app=$res2['Appraiser_EmployeeID']; }else{ $app=0; }
	if($rchkR['EmpStatus']=='A'){ $rev=$res2['Reviewer_EmployeeID']; }else{ $rev=0; }
	if($rchkH['EmpStatus']=='A'){ $hod=$res2['HOD_EmployeeID']; }else{ $hod=0; }  
  }
  elseif($row2==0)
  { 
   $sr = mysql_query("SELECT AppraiserId,ReviewerId,HodId from hrm_employee_reporting WHERE EmployeeID=".$res['EmployeeID'], $con); $rr=mysql_fetch_assoc($sr);
   if($rr['AppraiserId']!='' AND $rr['AppraiserId']>0){ $app=$rr['AppraiserId']; }else{ $app=0; }
   if($rr['ReviewerId']!='' AND $rr['ReviewerId']>0){ $rev=$rr['ReviewerId']; }else{ $rev=0; }
   if($rr['HodId']!='' AND $rr['HodId']>0){ $hod=$rr['HodId']; }else{ $hod=0; }
   //$app=0; $rev=0; $hod=0; 
  }	
  
  $sql3=mysql_query("select EmpPmsId from hrm_employee_pms where YearId=".$resSY['CurrY']." AND EmployeeID=".$res['EmployeeID'], $con); $row3=mysql_num_rows($sql3);
	
  if($row3>0){ $sqlIns=mysql_query("update hrm_employee_pms set Appraiser_EmployeeID=".$app." Reviewer_EmployeeID=".$rev.", HOD_EmployeeID=".$hod.", FormAKraAllow_PerOfWeightage=".$KraWeight.", FormBBehaviAllow_PerOfWeightage=".$FormBWeight.", HR_CurrDesigId=".$Desig.", HR_CurrGradeId=".$Grade.", HR_Curr_DepartmentId=".$Dept." where AssessmentYear=".$resSY['CurrY']." AND YearId=".$resSY['CurrY']." AND EmployeeID=".$res['EmployeeID']."", $con); }
  elseif($row3==0){ $sqlIns=mysql_query("insert into hrm_employee_pms(AssessmentYear, CompanyId, EmployeeID, Appraiser_EmployeeID, Reviewer_EmployeeID, HOD_EmployeeID, FormAKraAllow_PerOfWeightage, FormBBehaviAllow_PerOfWeightage, HR_CurrDesigId, HR_CurrGradeId, HR_Curr_DepartmentId, YearId) values(".$resSY['CurrY'].", ".$CompanyId.", ".$res['EmployeeID'].", ".$app.", ".$rev.", ".$hod.", ".$KraWeight.", ".$FormBWeight.", ".$Desig.", ".$Grade.", ".$Dept.", ".$resSY['CurrY'].")", $con); }
	
 }             
}

if($_REQUEST['action']=='PrsPms' AND $_REQUEST['value']=='true')
{
 $sqlSY=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='PMS'",$con);  
 $resSY=mysql_fetch_array($sqlSY);
 $sql=mysql_query("select e.EmployeeID,EmpCode,EmpVertical,DepartmentId,GradeId from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where e.EmpStatus='A' AND e.EmpType='E' AND CompanyId=".$CompanyId, $con);
 while($res=mysql_fetch_assoc($sql))
 { 
  $sqlCtc=mysql_query("select INCENTIVE_Value,Tot_GrossMonth,Tot_CTC,BAS_Value from hrm_employee_ctc where EmployeeID=".$res['EmployeeID']." AND Status='A'", $con); $sqlGd=mysql_query("select GradeId,DesigId,DepartmentId from hrm_employee_general where EmployeeID=".$res['EmployeeID'], $con); $resCtc=mysql_fetch_assoc($sqlCtc); $resGd=mysql_fetch_assoc($sqlGd);
  if($resCtc['Tot_GrossMonth']>0){$TotGoss=$resCtc['Tot_GrossMonth'];}else{$TotGoss=0;}
  if($resCtc['Tot_CTC']>0){$TotCtc=$resCtc['Tot_CTC'];}else{$TotCtc=0;}
  if($resCtc['BAS_Value']>0){$AnnBasic=$resCtc['BAS_Value']*12;}else{$AnnBasic=0; }
  if($resCtc['INCENTIVE_Value']>0){$Inctv=$resCtc['INCENTIVE_Value'];}else{$Inctv=0;}
  if($resGd['GradeId']>0){$Grade=$resGd['GradeId'];}else{$Grade=0;} 
  if($resGd['DesigId']>0){$Desig=$resGd['DesigId'];}else{$Desig=0;}
  if($resGd['DepartmentId']>0){$Dept=$resGd['DepartmentId'];}else{$Dept=0;}
  
  $CtcLimit=0; $CtcLimitCross=0;
  if($res['EmpVertical']>0)
  {
   $sqVer=mysql_query("select * from hrm_pms_vertical_increment where DepId=".$res['DepartmentId']." AND VerticalId=".$res['EmpVertical']." AND ".$res['GradeId'].">=Min_GradeId AND ".$res['GradeId']."<=Max_GradeId AND Max_Ctc>0",$con); 
   $rowVer=mysql_num_rows($sqVer); if($rowVer>0){ $CtcLimit=1; }
  
   
   $sqVer=mysql_query("select * from hrm_pms_vertical_increment where DepId=".$res['DepartmentId']." AND VerticalId=".$res['EmpVertical']." AND ".$res['GradeId'].">=Min_GradeId AND ".$res['GradeId']."<=Max_GradeId AND Max_Ctc<=".$TotCtc."",$con); 
   $rowVer=mysql_num_rows($sqVer); if($rowVer>0){ $CtcLimitCross=1; }      
      
  }
  
  
  $sqlPer=mysql_query("select * from hrm_pms_percentage where CompanyId=".$CompanyId, $con); 
  while($resPer=mysql_fetch_array($sqlPer))
  { if($Grade>=$resPer['GradeFrom'] AND $Grade<=$resPer['GradeTo'])
    { $KraWeight=$resPer['PerOfFormAKra_WeighScore']; $FormBWeight=$resPer['PerOfFormBBehavi_WeighScore']; } 
  } 
  
  if($CompanyId==4){ 
  $app=0; $rev=0; $hod=0;
  $KraWeight=85; $FormBWeight=15; 
  }
  
  /*
  $sql2=mysql_query("select Appraiser_EmployeeID,Reviewer_EmployeeID,HOD_EmployeeID from hrm_employee_pms where YearId=".$resSY['OldY']." AND EmployeeID=".$res['EmployeeID'], $con); $row2=mysql_num_rows($sql2); 
  
  if($row2>0)
  { $res2=mysql_fetch_assoc($sql2); 
    $chkA=mysql_query("select EmpStatus from hrm_employee where EmployeeID=".$res2['Appraiser_EmployeeID'],$con);
	$chkR=mysql_query("select EmpStatus from hrm_employee where EmployeeID=".$res2['Reviewer_EmployeeID'],$con);
	$chkH=mysql_query("select EmpStatus from hrm_employee where EmployeeID=".$res2['HOD_EmployeeID'],$con);
    $rchkA=mysql_fetch_assoc($chkA); $rchkR=mysql_fetch_assoc($chkR); $rchkH=mysql_fetch_assoc($chkH);
    if($rchkA['EmpStatus']=='A'){ $app=$res2['Appraiser_EmployeeID']; }else{ $app=0; }
	if($rchkR['EmpStatus']=='A'){ $rev=$res2['Reviewer_EmployeeID']; }else{ $rev=0; }
	if($rchkH['EmpStatus']=='A'){ $hod=$res2['HOD_EmployeeID']; }else{ $hod=0; }  
  }
  elseif($row2==0)
  { 
   $sr = mysql_query("SELECT AppraiserId,ReviewerId,HodId from hrm_employee_reporting WHERE EmployeeID=".$res['EmployeeID'], $con); $rr=mysql_fetch_assoc($sr);
   if($rr['AppraiserId']!='' AND $rr['AppraiserId']>0){ $app=$rr['AppraiserId']; }else{ $app=0; }
   if($rr['ReviewerId']!='' AND $rr['ReviewerId']>0){ $rev=$rr['ReviewerId']; }else{ $rev=0; }
   if($rr['HodId']!='' AND $rr['HodId']>0){ $hod=$rr['HodId']; }else{ $hod=0; }
   //$app=0; $rev=0; $hod=0; 
  }	
  */
  
  //elseif($row2==0){ $app=0; $rev=0; $hod=0; }	
  //Appraiser_EmployeeID=".$app.", Reviewer_EmployeeID=".$rev.", HOD_EmployeeID=".$hod.",
  
  $sql3=mysql_query("select EmpPmsId from hrm_employee_pms where YearId=".$resSY['CurrY']." AND EmployeeID=".$res['EmployeeID'], $con); $row3=mysql_num_rows($sql3); 
	
  if($row3>0){ $sqlIns=mysql_query("update hrm_employee_pms set EmpCurrGrossPM=".$TotGoss.", EmpCurrAnnualBasic=".$AnnBasic.", EmpCurrCtc=".$TotCtc.", EmpCurrIncentivePM=".$Inctv.", FormAKraAllow_PerOfWeightage=".$KraWeight.", FormBBehaviAllow_PerOfWeightage=".$FormBWeight.", Emp_AchivementSave='N', Emp_KRASave='N', Emp_SkillSave='N', Emp_FeedBackSave='N', Emp_PmsStatus=0, Appraiser_PmsStatus=0, Appraiser_SubmitedDate='0000-00-00', Appraiser_NoOfResend=0, Reviewer_PmsStatus=0, Reviewer_SubmitedDate='0000-00-00', Reviewer_NoOfResend=0, HR_CurrDesigId=".$Desig.", HR_CurrGradeId=".$Grade.", HR_Curr_DepartmentId=".$Dept.", CtcLimit=".$CtcLimit.", CtcLimitCross=".$CtcLimitCross." where AssessmentYear=".$resSY['CurrY']." AND YearId=".$resSY['CurrY']." AND EmployeeID=".$res['EmployeeID']."", $con); }
  elseif($row3==0){ $sqlIns=mysql_query("insert into hrm_employee_pms(AssessmentYear, CompanyId, EmployeeID, Appraiser_EmployeeID, Reviewer_EmployeeID, HOD_EmployeeID, EmpCurrGrossPM, EmpCurrAnnualBasic, EmpCurrCtc, EmpCurrIncentivePM, FormAKraAllow_PerOfWeightage, FormBBehaviAllow_PerOfWeightage, Emp_AchivementSave, Emp_KRASave, Emp_SkillSave, Emp_FeedBackSave, Emp_PmsStatus, Appraiser_PmsStatus, Appraiser_SubmitedDate, Appraiser_NoOfResend, Reviewer_PmsStatus, Reviewer_SubmitedDate, Reviewer_NoOfResend, HR_CurrDesigId, HR_CurrGradeId, HR_Curr_DepartmentId, CtcLimit, CtcLimitCross, YearId) values(".$resSY['CurrY'].", ".$CompanyId.", ".$res['EmployeeID'].", ".$app.", ".$rev.", ".$hod.", ".$TotGoss.", ".$AnnBasic.", ".$TotCtc.", ".$Inctv.", ".$KraWeight.", ".$FormBWeight.", 'N', 'N', 'N', 'N', 0, 0, '0000-00-00', 0, 0, '0000-00-00', 0, ".$Desig.", ".$Grade.", ".$Dept.", ".$CtcLimit.", ".$CtcLimitCross.", ".$resSY['CurrY'].")", $con); }
	
 }             
}


/***************************** Setup KRA Open *************************************/
/***************************** Setup KRA Open *************************************/

if($_REQUEST['action']=='PrsKKMidPms' AND $_REQUEST['value']=='true')
{ 
 $sqlSY=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='Mid_PMS'",$con);  
 $resSY=mysql_fetch_array($sqlSY);
 $sql=mysql_query("select EmployeeID from hrm_employee where EmpStatus='A' AND CompanyId=".$CompanyId, $con);
 while($res=mysql_fetch_assoc($sql))
 { 
  $sqlPms=mysql_query("select EmpPmsId from hrm_employee_pms where AssessmentYear=".$resSY['CurrY']." AND EmployeeID=".$res['EmployeeID'], $con); $rowPms=mysql_num_rows($sqlPms); 
  
/****************************/
   if($rowPms>0)
   { $resPms=mysql_fetch_array($sqlPms);
     $sqlKra=mysql_query("select * from hrm_employee_pms_kraforma where EmpPmsId=".$resPms['EmpPmsId']." AND EmpId=".$res['EmployeeID'], $con); $rows=mysql_num_rows($sqlKra); 
     if($rows>0)
     { $sqlK=mysql_query("select * from hrm_pms_kra where YearId=".$resSY['CurrY']." AND EmployeeID=".$res['EmployeeID']." AND KRAStatus!='D' order by KRAId ASC", $con); 
       while($resK=mysql_fetch_array($sqlK))
       { 
	    $sqlKF=mysql_query("select * from hrm_employee_pms_kraforma where KRAId=".$resK['KRAId']." AND EmpPmsId=".$resPms['EmpPmsId']." AND EmpId=".$res['EmployeeID'], $con); $rowKF=mysql_num_rows($sqlKF);
	    if($rowKF>0) 
	    {
		 $sqlUp=mysql_query("update hrm_employee_pms_kraforma set Weightage='".$resK['Weightage']."', Logic='".$resK['Logic']."', Period='".$resK['Period']."', Target='".$resK['Target']."' where KRAId=".$resK['KRAId']." AND EmpPmsId=".$resPms['EmpPmsId']." AND EmpId=".$res['EmployeeID'], $con);
		}
	    else
	    {
	     $sqlUp=mysql_query("insert into hrm_employee_pms_kraforma(EmpPmsId, EmpId, KRAId, Weightage, Logic, Period, Target) values(".$resPms['EmpPmsId'].", '".$res['EmployeeID']."', ".$resK['KRAId'].", '".$resK['Weightage']."', '".$resK['Logic']."', '".$resK['Period']."', '".$resK['Target']."')", $con);       
		 }
	     if($sqlUp)
		 {
		 $msg='KRA set to PMS successfully'; 
	      $sqlUp2=mysql_query("update hrm_employee_pms set KRASetting='Y' where EmpPmsId=".$resPms['EmpPmsId']." AND AssessmentYear=".$resSY['CurrY'], $con); 
		}
      }
	  
	  $sqlCkk=mysql_query("select * from hrm_employee_pms_kraforma where EmpPmsId=".$resPms['EmpPmsId']." AND EmpId=".$resPms['EmpPmsId'], $con); 
	  while($resCkk=mysql_fetch_array($sqlCkk)) 
	  { 
	   $sqlCkf=mysql_query("select * from hrm_pms_kra where KRAId=".$resCkk['KRAId']." AND EmployeeID=".$res['EmployeeID'], $con); $rowCkf=mysql_num_rows($sqlCkf);
	   if($rowCkf==0)
	   { $sqlDel=mysql_query("delete from hrm_employee_pms_kraforma where KRAId=".$resCkk['KRAId']." AND EmpId=".$res['EmployeeID'], $con); }
	  } 
	  
   }
   if($rows==0)
   { 
    $sqlK=mysql_query("select * from hrm_pms_kra where YearId=".$resSY['CurrY']." AND EmployeeID=".$res['EmployeeID']." AND KRAStatus!='D' order by KRAId ASC", $con); 
     while($resK=mysql_fetch_array($sqlK))
     { 
	  $sqlUp=mysql_query("insert into hrm_employee_pms_kraforma(EmpPmsId, EmpId, KRAId, Weightage, Logic, Period, Target) values(".$resPms['EmpPmsId'].", '".$res['EmployeeID']."', ".$resK['KRAId'].", '".$resK['Weightage']."', '".$resK['Logic']."', '".$resK['Period']."', '".$resK['Target']."')", $con); }
      if($sqlUp)
	  { $msg='KRA set to PMS successfully'; 
	    $sqlUp2=mysql_query("update hrm_employee_pms set KRASetting='Y' where EmpPmsId=".$resPms['EmpPmsId']." AND AssessmentYear=".$resSY['CurrY'], $con); 
	  }
     }  
   }
/****************************/  	  
 }          
}

if($_REQUEST['action']=='PrsKKPms' AND $_REQUEST['value']=='true')
{
 $sqlSY=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='PMS'",$con);  
 $resSY=mysql_fetch_array($sqlSY);
 $sql=mysql_query("select EmployeeID from hrm_employee where EmpStatus='A' AND CompanyId=".$CompanyId, $con);
 while($res=mysql_fetch_assoc($sql))
 { 
  $sqlPms=mysql_query("select EmpPmsId from hrm_employee_pms where AssessmentYear=".$resSY['CurrY']." AND EmployeeID=".$res['EmployeeID'], $con); $rowPms=mysql_num_rows($sqlPms); 
  
/****************************/
   if($rowPms>0)
   { $resPms=mysql_fetch_array($sqlPms);
     $sqlKra=mysql_query("select * from hrm_employee_pms_kraforma where EmpPmsId=".$resPms['EmpPmsId']." AND EmpId=".$res['EmployeeID'], $con); $rows=mysql_num_rows($sqlKra); 
     if($rows>0)
     { $sqlK=mysql_query("select * from hrm_pms_kra where YearId=".$resSY['CurrY']." AND EmployeeID=".$res['EmployeeID']." AND KRAStatus!='D' order by KRAId ASC", $con); 
       while($resK=mysql_fetch_array($sqlK))
       { 
	    $sqlKF=mysql_query("select * from hrm_employee_pms_kraforma where KRAId=".$resK['KRAId']." AND EmpPmsId=".$resPms['EmpPmsId']." AND EmpId=".$res['EmployeeID'], $con); $rowKF=mysql_num_rows($sqlKF);
	    if($rowKF>0) 
	    {
		 $sqlUp=mysql_query("update hrm_employee_pms_kraforma set Weightage='".$resK['Weightage']."', Logic='".$resK['Logic']."', Period='".$resK['Period']."', Target='".$resK['Target']."' where KRAId=".$resK['KRAId']." AND EmpPmsId=".$resPms['EmpPmsId']." AND EmpId=".$res['EmployeeID'], $con);
		}
	    else
	    {
	     $sqlUp=mysql_query("insert into hrm_employee_pms_kraforma(EmpPmsId, EmpId, KRAId, Weightage, Logic, Period, Target) values(".$resPms['EmpPmsId'].", '".$res['EmployeeID']."', ".$resK['KRAId'].", '".$resK['Weightage']."', '".$resK['Logic']."', '".$resK['Period']."', '".$resK['Target']."')", $con);       
		 }
	     if($sqlUp)
		 {
		 $msg='KRA set to PMS successfully'; 
	      $sqlUp2=mysql_query("update hrm_employee_pms set KRASetting='Y' where EmpPmsId=".$resPms['EmpPmsId']." AND AssessmentYear=".$resSY['CurrY'], $con); 
		}
      }
	  
	  $sqlCkk=mysql_query("select * from hrm_employee_pms_kraforma where EmpPmsId=".$resPms['EmpPmsId']." AND EmpId=".$resPms['EmpPmsId'], $con); 
	  while($resCkk=mysql_fetch_array($sqlCkk)) 
	  { 
	   $sqlCkf=mysql_query("select * from hrm_pms_kra where KRAId=".$resCkk['KRAId']." AND EmployeeID=".$res['EmployeeID'], $con); $rowCkf=mysql_num_rows($sqlCkf);
	   if($rowCkf==0)
	   { $sqlDel=mysql_query("delete from hrm_employee_pms_kraforma where KRAId=".$resCkk['KRAId']." AND EmpId=".$res['EmployeeID'], $con); }
	  } 
	  
   }
   if($rows==0)
   { 
    $sqlK=mysql_query("select * from hrm_pms_kra where YearId=".$resSY['CurrY']." AND EmployeeID=".$res['EmployeeID']." AND KRAStatus!='D' order by KRAId ASC", $con); 
     while($resK=mysql_fetch_array($sqlK))
     { 
	  $sqlUp=mysql_query("insert into hrm_employee_pms_kraforma(EmpPmsId, EmpId, KRAId, Weightage, Logic, Period, Target) values(".$resPms['EmpPmsId'].", '".$res['EmployeeID']."', ".$resK['KRAId'].", '".$resK['Weightage']."', '".$resK['Logic']."', '".$resK['Period']."', '".$resK['Target']."')", $con); }
      if($sqlUp)
	  { $msg='KRA set to PMS successfully'; 
	    $sqlUp2=mysql_query("update hrm_employee_pms set KRASetting='Y' where EmpPmsId=".$resPms['EmpPmsId']." AND AssessmentYear=".$resSY['CurrY'], $con); 
	  }
     }  
   }
/****************************/  	  
 }                
}


/***************************** Form-B Open *************************************/
/***************************** Form-B Open *************************************/

if($_REQUEST['action']=='PrsBBMidPms' AND $_REQUEST['value']=='true')
{ 
 $sqlSY=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='Mid_PMS'",$con);  
 $resSY=mysql_fetch_array($sqlSY);
 $sql=mysql_query("select e.EmployeeID,GradeId,DepartmentId from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId, $con);
 while($res=mysql_fetch_assoc($sql))
 { 
  $sqlPms=mysql_query("select EmpPmsId from hrm_employee_pms where AssessmentYear=".$resSY['CurrY']." AND EmployeeID=".$res['EmployeeID'], $con); $rowPms=mysql_num_rows($sqlPms); 
  
/****************************/
  if($rowPms>0)
  { $resPms=mysql_fetch_array($sqlPms);
     
   /********************** FormB FormB Open ****************************/
   $sqlb=mysql_query("select * from hrm_employee_pms_behavioralformb where EmpId=".$res['EmployeeID']." AND YearId=".$resSY['CurrY']."", $con); $rowb=mysql_num_rows($sqlb);
   if($rowb>0)
   {
    $sqlbUp=mysql_query("update hrm_employee_pms_behavioralformb set EmpPmsId=".$resPms['EmpPmsId']." where EmpId=".$res['EmployeeID']." AND YearId=".$resSY['CurrY']."", $con);
	if($sqlbUp){ $msg='FormB set successfully'; 
	             $sqlUp2=mysql_query("update hrm_employee_pms set SkillSetting='Y' where EmpPmsId=".$resPms['EmpPmsId']." AND AssessmentYear=".$resSY['CurrY'], $con); }
   }
   
   else
   {
       
    /*   
    $sqlBck=mysql_query("select * from hrm_pms_formb fb INNER JOIN hrm_pms_formb_grade fbg ON fb.FormBId=fbg.FormBId where fb.SkillStatus='A' AND fb.DepartmentId=".$res['DepartmentId']." AND fbg.GradeId=".$res['GradeId'], $con); 
	while($resBck=mysql_fetch_array($sqlBck))
    {
     $sqlIn=mysql_query("insert into hrm_employee_pms_behavioralformb(EmpPmsId, FormBId, EmpId, YearId, EmpStatus, AppStatus) values(".$resPms['EmpPmsId'].", ".$resBck['FormBId'].", ".$res['EmployeeID'].", ".$resSY['CurrY'].", 'A', 'A')",$con);
    }
    */
    
    /* AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA */
	$sqlBck=mysql_query("select * from hrm_pms_formb fb INNER JOIN hrm_pms_formb_grade fbg ON fb.FormBId=fbg.FormBId where fb.SkillStatus='A' AND fb.GroupFor='' AND fb.DepartmentId=".$res['DepartmentId']." AND fbg.GradeId=".$res['GradeId'], $con); 
	while($resBck=mysql_fetch_array($sqlBck))
    {
     $sqlIn=mysql_query("insert into hrm_employee_pms_behavioralformb(EmpPmsId, FormBId, EmpId, YearId) values(".$resPms['EmpPmsId'].", ".$resBck['FormBId'].", ".$res['EmployeeID'].", ".$resSY['CurrY'].")",$con);
    }
	
	/* BBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBB */
	$sqlBck=mysql_query("select * from hrm_pms_formb fb INNER JOIN hrm_pms_formb_grade fbg ON fb.FormBId=fbg.FormBId where fb.SkillStatus='A' AND fb.GroupFor!='' AND fb.DepartmentId=".$res['DepartmentId']." AND fbg.GradeId=".$res['GradeId']." group by GroupFor", $con); 
	while($resBck=mysql_fetch_array($sqlBck))
    {
     $sqlIn=mysql_query("insert into hrm_employee_pms_behavioralformb(EmpPmsId, FormBId, EmpId, YearId) values(".$resPms['EmpPmsId'].", ".$resBck['FormBId'].", ".$res['EmployeeID'].", ".$resSY['CurrY'].")",$con);
    }   
    
    
    
	if($sqlIn){ $msg='FormB set successfully'; $sqlUp2=mysql_query("update hrm_employee_pms set SkillSetting='Y' where EmpPmsId=".$resPms['EmpPmsId']." AND AssessmentYear=".$resSY['CurrY'], $con); }
	 
   } 
    /********************** FormB FormB Close ****************************/
	 
   } //if($rowPms>0)
/****************************/  	  
 }          
}

if($_REQUEST['action']=='PrsBBPms' AND $_REQUEST['value']=='true')
{
 $sqlSY=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='PMS'",$con);  
 $resSY=mysql_fetch_array($sqlSY);
 $sql=mysql_query("select e.EmployeeID,GradeId,DepartmentId from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId, $con);
 while($res=mysql_fetch_assoc($sql))
 { 
  $sqlPms=mysql_query("select EmpPmsId from hrm_employee_pms where AssessmentYear=".$resSY['CurrY']." AND EmployeeID=".$res['EmployeeID'], $con); $rowPms=mysql_num_rows($sqlPms); 
  
/****************************/
   if($rowPms>0)
   { $resPms=mysql_fetch_array($sqlPms);
   
   /********************** FormB FormB Open ****************************/
   $sqlb=mysql_query("select * from hrm_employee_pms_behavioralformb where EmpId=".$res['EmployeeID']." AND YearId=".$resSY['CurrY']."", $con); $rowb=mysql_num_rows($sqlb);
   if($rowb>0)
   {
    $sqlbUp=mysql_query("update hrm_employee_pms_behavioralformb set EmpPmsId=".$resPms['EmpPmsId']." where EmpId=".$res['EmployeeID']." AND YearId=".$resSY['CurrY']."", $con);
	if($sqlbUp){ $msg='FormB set successfully'; 
	             $sqlUp2=mysql_query("update hrm_employee_pms set SkillSetting='Y' where EmpPmsId=".$resPms['EmpPmsId']." AND AssessmentYear=".$resSY['CurrY'], $con); }
   }
   
   else
   {
    $sqlBck=mysql_query("select * from hrm_pms_formb fb INNER JOIN hrm_pms_formb_grade fbg ON fb.FormBId=fbg.FormBId where fb.SkillStatus='A' AND fb.DepartmentId=".$res['DepartmentId']." AND fbg.GradeId=".$res['GradeId'], $con); 
	while($resBck=mysql_fetch_array($sqlBck))
    {
     $sqlIn=mysql_query("insert into hrm_employee_pms_behavioralformb(EmpPmsId, FormBId, EmpId, YearId, EmpStatus, AppStatus) values(".$resPms['EmpPmsId'].", ".$resBck['FormBId'].", ".$res['EmployeeID'].", ".$resSY['CurrY'].", 'A', 'A')",$con);
    }
	if($sqlIn){ $msg='FormB set successfully'; $sqlUp2=mysql_query("update hrm_employee_pms set SkillSetting='Y' where EmpPmsId=".$resPms['EmpPmsId']." AND AssessmentYear=".$resSY['CurrY'], $con); }
	 
   } 
   /********************** FormB FormB Close ****************************/
     
   }
/****************************/  	  
 }                
}


if(isset($_POST['Save33Edit']))
{
  $SqlUpdate = mysql_query("UPDATE hrm_pms_key SET EmpMsg='".$_POST['EmpMsg']."', PersonalDetails='".$_POST['PersonalDetails']."', Schedule='".$_POST['Schedule']."', AppraisalForm='".$_POST['AppraisalForm']."', MidPmsForm='".$_POST['MidPmsForm']."', Help_Faq='".$_POST['Help_Faq']."', View_Print='".$_POST['View_Print']."', KRAForm='".$_POST['KRAForm']."', Home='".$_POST['Home']."', MyTeam='".$_POST['MyTeam']."', TeamStatus='".$_POST['TeamStatus']."', Score='".$_POST['Score']."', Promotion='".$_POST['Promotion']."', Increment='".$_POST['Increment']."', MyPmsReport='".$_POST['MyPmsReport']."', IncrementReport='".$_POST['IncrementReport']."', RatingGraph='".$_POST['RatingGraph']."', FKraForm='".$_POST['FKraForm']."', FPmsForm='".$_POST['FPmsForm']."', FHistoryForm='".$_POST['FHistoryForm']."' WHERE CompanyId=".$CompanyId." AND PmsMId=".$_POST['Edit3Id'],$con);
  if($SqlUpdate){ $msg = "Data has been Updeted successfully...";}   
}




if($_REQUEST['action']=='Newkraentrypro' AND $_REQUEST['value']=='true')
{
 $sqlSY=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='KRA'",$con);  
 $sqlSYP=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='PMS'",$con);  
 $resSY=mysql_fetch_array($sqlSY); $resSYP=mysql_fetch_array($sqlSYP);
 $sql=mysql_query("select EmployeeID,EmpCode from hrm_employee where EmpStatus='A' AND CompanyId=".$CompanyId, $con);
 while($res=mysql_fetch_assoc($sql))
 { 
  
  $sql2=mysql_query("select Appraiser_EmployeeID,Reviewer_EmployeeID,HOD_EmployeeID from hrm_employee_pms where YearId=".$resSYP['CurrY']." AND EmployeeID=".$res['EmployeeID'], $con); $row2=mysql_num_rows($sql2); 
  
  if($row2>0)
  { $res2=mysql_fetch_assoc($sql2); 
    $chkA=mysql_query("select EmpStatus from hrm_employee where EmployeeID=".$res2['Appraiser_EmployeeID'],$con);
	$chkR=mysql_query("select EmpStatus from hrm_employee where EmployeeID=".$res2['Reviewer_EmployeeID'],$con);
	$chkH=mysql_query("select EmpStatus from hrm_employee where EmployeeID=".$res2['HOD_EmployeeID'],$con);
    $rchkA=mysql_fetch_assoc($chkA); $rchkR=mysql_fetch_assoc($chkR); $rchkH=mysql_fetch_assoc($chkH);
    if($rchkA['EmpStatus']=='A'){ $app=$res2['Appraiser_EmployeeID']; }else{ $app=0; }
	if($rchkR['EmpStatus']=='A'){ $rev=$res2['Reviewer_EmployeeID']; }else{ $rev=0; }
	if($rchkH['EmpStatus']=='A'){ $hod=$res2['HOD_EmployeeID']; }else{ $hod=0; }  
  }
  elseif($row2==0)
  { 
   $sr = mysql_query("SELECT AppraiserId,ReviewerId,HodId from hrm_employee_reporting WHERE EmployeeID=".$res['EmployeeID'], $con); $rr=mysql_fetch_assoc($sr);
   if($rr['AppraiserId']!='' AND $rr['AppraiserId']>0){ $app=$rr['AppraiserId']; }else{ $app=0; }
   if($rr['ReviewerId']!='' AND $rr['ReviewerId']>0){ $rev=$rr['ReviewerId']; }else{ $rev=0; }
   if($rr['HodId']!='' AND $rr['HodId']>0){ $hod=$rr['HodId']; }else{ $hod=0; }
   //$app=0; $rev=0; $hod=0; 
  }	
  
  //elseif($row2==0){ $app=0; $rev=0; $hod=0; }	
  
  $sql3=mysql_query("select EmpPmsId from hrm_employee_pms where YearId=".$resSY['CurrY']." AND EmployeeID=".$res['EmployeeID'], $con); $row3=mysql_num_rows($sql3);
	
  if($row3>0){ $sqlIns=mysql_query("update hrm_employee_pms set Appraiser_EmployeeID=".$app.", Reviewer_EmployeeID=".$rev.", HOD_EmployeeID=".$hod.", CompanyId=".$CompanyId." where AssessmentYear=".$resSY['CurrY']." AND YearId=".$resSY['CurrY']." AND EmployeeID=".$res['EmployeeID']."", $con); }
  elseif($row3==0)
  { 
      $sqlIns=mysql_query("insert into hrm_employee_pms(AssessmentYear, CompanyId, EmployeeID, Appraiser_EmployeeID, Reviewer_EmployeeID, HOD_EmployeeID, YearId) values(".$resSY['CurrY'].", ".$CompanyId.", ".$res['EmployeeID'].", ".$app.", ".$rev.", ".$hod.", ".$resSY['CurrY'].")", $con); 
      
      //echo "insert into hrm_employee_pms(AssessmentYear, CompanyId, EmployeeID, Appraiser_EmployeeID, Reviewer_EmployeeID, HOD_EmployeeID, YearId) values(".$resSY['CurrY'].", ".$CompanyId.", ".$res['EmployeeID'].", ".$app.", ".$rev.", ".$hod.", ".$resSY['CurrY'].")";
      
  }
  
	
 }  
 
 if($sqlIns){echo '<script>alert("Successfully Process...");</script>';}
 
}



?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.th{ font-family:Times New Roman;font-size:12px;height:25px;text-align:center;color:#FFFFFF;font-weight:bold;background-color:#7a6189; }
.tdl{ font-family:Times New Roman;font-size:12px;text-align:left; }
.tdc{ font-family:Times New Roman;font-size:12px;text-align:center; }
.tdinput{ font-family:Times New Roman;font-size:14px;text-align:center;width:100%;border:hidden;background-color:#DDFB9F; }
.tdinputl{ font-family:Times New Roman;font-size:14px;text-align:left;width:100%;border:hidden;background-color:#DDFB9F; }
.tdsel{ font-family:Times New Roman;font-size:14px;text-align:left;}
.inner_table{height:500px;overflow-y:auto;width:auto;}
.font{font:Georgia;color:#FFFFFF;font-size:12px;text-align:center;background-color:#7a6189;height:22px;} 
.font1 { font:Georgia; color:#000; font-size:12px;height:22px;} 
.font2 { font-size:11px;width:260px;height:18px;} .font4 {color:#1FAD34;font-family:Times New Roman;font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.TextInput { font-family:"Times New Roman", Times, serif; font-size:11px; width:100px; height:18px;}
.CalenderButton{background-image:url(images/CalenderBtn.jpeg);width:16px;height:16px;background-color:#E0DBE3;border-color:#FFFFFF;}
</style>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/><?php /* Calander Open */?>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script><?php /* Calander Close */ ?>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<!--<script type="text/javascript" src="js/MandatoryAjaxCall.js"></script>-->
<Script type="text/javascript">window.history.forward(1);
function edit(value) { var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "SetKraPms.php?action=edit&eid="+value;  window.location=x;}}

function editH(value) { var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "SetKraPms.php?action=editH&eidH="+value;  window.location=x;}}

function CheckMidPms(){ if(document.getElementById("checkMidPms").checked==true){document.getElementById("P-MidPms").disabled=false;}else{document.getElementById("P-MidPms").disabled=true;} }
function CheckPms(){ if(document.getElementById("checkPms").checked==true){document.getElementById("P-Pms").disabled=false;}
 else{document.getElementById("P-Pms").disabled=true;} }

function ProcessMidPms()
{ agree=confirm("Are you sure, you want to process Mid-Pms?");
  if(agree){ window.location="SetKraPms.php?ee=1&aa=1&rr=1&hh=1&form=v%v&action=PrsMidPms&value=true"; }
  else{ return false; }
}
function ProcessPms()
{ agree=confirm("Are you sure, you want to process Pms?");
  if(agree){ window.location="SetKraPms.php?ee=1&aa=1&rr=1&hh=1&form=v%v&action=PrsPms&value=true"; }
  else{ return false; }
}

function CheckMidPmsK(){ if(document.getElementById("KcheckMidPms").checked==true){document.getElementById("P-KMidPms").disabled=false;}else{document.getElementById("P-KMidPms").disabled=true;} }
function CheckPmsK(){ if(document.getElementById("KcheckPms").checked==true){document.getElementById("P-KPms").disabled=false;}else{document.getElementById("P-KPms").disabled=true;} }

function ProcessKMidPmsK()
{ agree=confirm("Are you sure, you want to set KRA for Mid-Pms?");
  if(agree){ window.location="SetKraPms.php?ee=1&aa=1&rr=1&hh=1&form=v%v&action=PrsKKMidPms&value=true"; }
  else{ return false; }
}
function ProcessKPmsK() 
{ agree=confirm("Are you sure, you want to KRA for Pms?");
  if(agree){ window.location="SetKraPms.php?ee=1&aa=1&rr=1&hh=1&form=v%v&action=PrsKKPms&value=true"; }
  else{ return false; }
}


function CheckMidPmsB(){ if(document.getElementById("BcheckMidPms").checked==true){document.getElementById("P-BMidPms").disabled=false;}else{document.getElementById("P-BMidPms").disabled=true;} }
function CheckPmsB(){ if(document.getElementById("BcheckPms").checked==true){document.getElementById("P-BPms").disabled=false;}else{document.getElementById("P-BPms").disabled=true;} }

function ProcessBMidPmsB()
{ agree=confirm("Are you sure, you want to set Form-B for Mid-Pms?");
  if(agree){ window.location="SetKraPms.php?ee=1&aa=1&rr=1&hh=1&form=v%v&action=PrsBBMidPms&value=true"; }
  else{ return false; }
}
function ProcessBPmsB() 
{ agree=confirm("Are you sure, you want to Form-B for Pms?");
  if(agree){ window.location="SetKraPms.php?ee=1&aa=1&rr=1&hh=1&form=v%v&action=PrsBBPms&value=true"; }
  else{ return false; }
}


function edit3(value){ var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "SetKraPms.php?action=edit3&e3id="+value;  window.location=x;}}

function NCheckk2(){ if(document.getElementById("checkk2").checked==true){document.getElementById("K-Process").disabled=false;}else{document.getElementById("K-Process").disabled=true;} }
function ProcessNeKra() 
{ agree=confirm("Are you sure, you want to process for new KRA entry?");
  if(agree){ window.location="SetKraPms.php?ee=1&aa=1&rr=1&hh=1&form=v%v&action=Newkraentrypro&value=true"; }
  else{ return false; }
}



</SCRIPT> 

 
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top" width="100%">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td></tr>
	<tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow">
<?php //**************************************************************************************************/?>
<?php //***************************START*****START*****START******START******START********************/?>
<?php //***********************************************************************************************/?>
<?php if($_SESSION['UserType']=='S' AND $_SESSION['login'] = true){ ?>	
<table border="0" style="margin-top:0px;width:100%;height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3" width="100%">
   <table border="0" width="100%">
    <tr>
	  <td class="heading" style="width:350px;">Setting KRA, PMS & Mid-PMS</td>
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b style="font-size:16px;"><i><?php echo $msg; ?></i></b></td>
	</tr>
   </table>
  </td>
 </tr>
    <tr>
     <td style="width:100%;">
	  <table border="1" style="width:40%;" cellspacing="0">
	   <tr>
		<td class="th" style="width:50px;">YearId</td>
		<td class="th" style="width:80px;">Year-From</td>
		<td class="th" style="width:80px;">Year-To</td>
		<td class="th" style="width:50px;">Status</td>
		<td class="th" style="width:90px;">Page Back</td>
		<td class="th" style="width:90px;">Page Refresh</td>
	   </tr>
<?php $sqlY=mysql_query("select * from hrm_year order by PmsYearId ASC", $con); while($resY=mysql_fetch_assoc($sqlY)){ ?>
<?php if($resY['Company'.$CompanyId.'Status']=='A'){ ?>	  
		  <tr bgcolor="<?php if($resY['Company'.$CompanyId.'Status']=='A'){echo '#82E776';}else{echo '#FFFFFF';} ?>">
		   <td class="tdc"><?php echo $resY['PmsYearId']; ?></td>
		   <td class="tdc"><?php echo date("Y", strtotime($resY['FromDate'])); ?></td>		   
		   <td class="tdc"><?php echo date("Y", strtotime($resY['ToDate'])); ?></td>
		   <td class="tdc"><?php echo $resY['Company'.$CompanyId.'Status']; ?></td>
		   <td class="tdc" bgcolor="#FFF"><input type="button" name="back" id="back" style="width:90px;background-color:#C5FB88;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/></td>
		   <td class="tdc" bgcolor="#FFF"><input type="button" name="Refrash" value="refresh" style="width:90px;background-color:#C5FB88;" onClick="javascript:window.location='SetKraPms.php'"/></td>
		  </tr>
<?php } } ?>		 		 
	  </table>
	 </td>
   </tr>
  
  
 
   <tr><td>&nbsp;</td></tr>
   <tr>
<?php //*********************************************** Open / Hide *************************** ?> 
<td align="left" id="type" valign="top" style="display:block;width:100%;">             
 <table border="0" style="width:100%;">
 
  <tr>
    <td align="left" style="width:100%;">
	 <table border="1" style="width:50%;" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
	  <tr><td colspan="13" class="th" style="font-size:16px;">[1] Open/ Hide</b></td></tr>
	  <tr>
	   <td class="th" style="width:3%;">Sn</td>
	   <td class="th" style="width:10%;">Edit</td>
	   <td class="th" style="width:10%;">Employee<br>History</td>
	   <td class="th" style="width:10%;">Employee<br>CTC</td>
	   <td class="th" style="width:10%;">Employee<br>Eligibility</td>
	   <td class="th" style="width:10%;">Employee<br>Grade-Designation</td>
	  </tr>
<?php $sqlSetH=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='PMS' ", $con);  
             $resSetH=mysql_fetch_array($sqlSetH);  if(isset($_REQUEST['action']) && $_REQUEST['action']=="editH" && $_REQUEST['eidH']==$resSetH['SettingId']){ ?>
	  <form name="formEditH" method="post" onSubmit="return validateEditH(this)">		  
      <tr style="height:22px;">
	   <td class="tdc">1</td>
	   <td class="tdc"><input type="hidden" name="EditIdH" id="EditIdH" value="<?php echo $_REQUEST['eidH']; ?>"/>
<?php if($_SESSION['User_Permission']=='Edit'){?>&nbsp;<input type="submit" name="SaveEditH"  value="" class="SaveButton">&nbsp;<?php } ?></td>
      <td class="tdc"><select name="Show_History" id="Show_History" class="tdinput"><option value="<?php echo $resSetH['Show_History']; ?>"><?php echo $resSetH['Show_History']; ?></option><option value="<?php if($resSetH['Show_History']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resSetH['Show_History']=='Y')echo 'N'; else echo 'Y'; ?></option></select></td>
       <td class="tdc"><select name="Show_Ctc" id="Show_Ctc" class="tdinput"><option value="<?php echo $resSetH['Show_Ctc']; ?>"><?php echo $resSetH['Show_Ctc']; ?></option><option value="<?php if($resSetH['Show_Ctc']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resSetH['Show_Ctc']=='Y')echo 'N'; else echo 'Y'; ?></option></select></td>
       <td class="tdc"><select name="Show_Elig" id="Show_Elig" class="tdinput"><option value="<?php echo $resSetH['Show_Elig']; ?>"><?php echo $resSetH['Show_Elig']; ?></option><option value="<?php if($resSetH['Show_Elig']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resSetH['Show_Elig']=='Y')echo 'N'; else echo 'Y'; ?></option></select></td>
       <td class="tdc"><select name="Show_GradeDesig" id="Show_GradeDesig" class="tdinput"><option value="<?php echo $resSetH['Show_GradeDesig']; ?>"><?php echo $resSetH['Show_GradeDesig']; ?></option><option value="<?php if($resSetH['Show_GradeDesig']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resSetH['Show_GradeDesig']=='Y')echo 'N'; else echo 'Y'; ?></option></select></td>
	  </tr>
      </form>
<?php } else { ?>	 
	   <tr style="height:22px;">
	    <td class="tdc">1</td>
		<td class="tdc"><?php if($_SESSION['User_Permission']=='Edit'){ ?><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="editH(<?php echo $resSetH['SettingId']; ?>)"></a><?php } ?></td>	
	    <td class="tdc" bgcolor="<?php if($resSetH['Show_History']=='Y'){ echo '#1CA703'; }else{ echo '#F7FA8D'; }?>"><?php echo $resSetH['Show_History']; ?></td>
	    <td class="tdc" bgcolor="<?php if($resSetH['Show_Ctc']=='Y'){ echo '#1CA703'; }else{ echo '#F7FA8D'; }?>"><?php echo $resSetH['Show_Ctc']; ?></td>
	    <td class="tdc" bgcolor="<?php if($resSetH['Show_Elig']=='Y'){ echo '#1CA703'; }else{ echo '#F7FA8D'; }?>"><?php echo $resSetH['Show_Elig']; ?></td>
	    <td class="tdc" bgcolor="<?php if($resSetH['Show_GradeDesig']=='Y'){ echo '#1CA703'; }else{ echo '#F7FA8D'; }?>"><?php echo $resSetH['Show_GradeDesig']; ?></td>
	   </tr>
<?php }  ?>
      </table>
	</td>
  </tr>  
  
   
   <tr><td>&nbsp;</td></tr>
   <tr>
<?php //*********************************************** Open Menu PMS ***************************?> 
<td align="left" id="type" valign="top" style="display:block;width:100%;">             
 <table border="0" style="width:100%;">
 
  <tr>
    <td align="left" style="width:100%;">
	 <table border="1" style="width:100%;" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
	  <tr><td colspan="13" class="th" style="font-size:16px;">[2] Setting Process Year</b></td></tr>
	  <tr>
	   <td class="th" style="width:3%;">Sn</td>
	   <td class="th" style="width:7%;">Process</td>
	   <td class="th" style="width:3%;">Edit</td>
	   <td class="th" style="width:5%;">Old<br>YearId</td>
	   <td class="th" style="width:5%;">Curr<br>YearId</td>
	   <td class="th" style="width:5%;">New<br>YearId</td>
	   <td class="th" style="width:10%;">Letter<br>Print Date</td>
	   <td class="th" style="width:10%;">Letter<br>Effect Date</td>
	   <td class="th" style="width:8%;">Salary<br>Effect Date</td>
	   <td class="th" style="width:8%;">Employee Last<br>Joining Date</td>
	   <td class="th" style="width:4%;">Arrear<br>NOM</td>
	   <td class="th" style="width:17%;">Wishing Msg</td>
	   <td class="th" style="width:17%;">Period Msg</td>
	  </tr>
<?php $sqlSet=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." order by SettingId ASC", $con); $SNo=1; while($resSet=mysql_fetch_array($sqlSet)) { if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$resSet['SettingId']){ ?>
	  <form name="formEdit" method="post" onSubmit="return validateEdit(this)">		  
      <tr style="height:22px;">
	   <td class="tdc"><?php echo $SNo; ?></td>
	   <td class="tdl">&nbsp;<b><?php echo $resSet['Process'];?></b></td>
	   <td class="tdc"><input type="hidden" name="EditId" id="EditId" value="<?php echo $_REQUEST['eid']; ?>"/>
<?php if($_SESSION['User_Permission']=='Edit'){?>&nbsp;<input type="submit" name="SaveEdit"  value="" class="SaveButton">&nbsp;<?php } ?></td>
       <td class="tdc"><input name="Old" class="tdinput" value="<?php echo $resSet['OldY'];?>"></td>
       <td class="tdc"><input name="Curr" class="tdinput" value="<?php echo $resSet['CurrY'];?>"></td>
       <td class="tdc"><input name="New" class="tdinput" value="<?php echo $resSet['NewY'];?>"></td>
	   <?php if($resSet['Process']=='PMS'){ ?>
       <td class="tdc"><input name="pd" class="tdinput" value="<?php echo $resSet['PrintDate'];?>"></td>
       <td class="tdc"><input name="ed" class="tdinput" value="<?php echo $resSet['EffectedDate'];?>"></td>
	   <td class="tdc"><input name="ed2" id="ed2" class="tdinput" value="<?php if($resSet['EffectedDate2']!='1970-01-01' AND $resSet['EffectedDate2']!='0000-00-00'){ echo date("d-m-Y",strtotime($resSet['EffectedDate2'])); }?>" readonly></td>
	   <td class="tdc"><input name="ed3" id="ed3" class="tdinput" value="<?php if($resSet['AllowEmpDoj']!='1970-01-01' AND $resSet['AllowEmpDoj']!='0000-00-00'){ echo date("d-m-Y",strtotime($resSet['AllowEmpDoj'])); }?>" readonly><script type="text/javascript"> var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime:true }); cal.manageFields("ed2", "ed2", "%d-%m-%Y"); cal.manageFields("ed3", "ed3", "%d-%m-%Y");</script></td>
	   <td class="tdc"><select name="Arrear_NOM" class="tdinputl"><option value="<?php echo $resSet['Arrear_NOM'];?>" selected><?php echo '&nbsp;'.$resSet['Arrear_NOM'];?></option>
	   <?php if($resSet['Arrear_NOM']!=1){ ?><option value="1">&nbsp;1</option><?php } ?>
	   <?php if($resSet['Arrear_NOM']!=2){ ?><option value="2">&nbsp;2</option><?php } ?>
	   </td>
	   
	   <td class="tdc"><input name="wMsg" class="tdinputl" value="<?php echo $resSet['WishingMsg'];?>"></td>
	   <td class="tdc"><input name="LettPeriod" id="LettPeriod" class="tdinputl" value="<?php echo $resSet['LettPeriod']; ?>"></td>
	   <?php }else{ ?>
	   <td class="tdc" colspan="7"><input type="hidden" name="pd" value="">
	   <input type="hidden" name="ed" value=""><input type="hidden" name="ed2" value="">
	   <input type="hidden" name="ed3" value=""><input type="hidden" name="Arrear_NOM" value="0">
	   <input type="hidden" name="wMsg" value=""><input type="hidden" name="LettPeriod" value=""></td>
	   <?php } ?>
	  </tr>
      </form>
<?php } else { ?>	 
	   <tr style="height:22px;">
	    <td class="tdc"><?php echo $SNo;?></td>
	    <td class="tdl">&nbsp;<b><?php echo $resSet['Process'];?></b></td>
		<td class="tdc"><?php if($_SESSION['User_Permission']=='Edit'){ ?><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $resSet['SettingId']; ?>)"></a><?php } ?></td>	
	    <td class="tdc"><?php echo $resSet['OldY']; ?></td>
	    <td class="tdc" bgcolor="#FF80FF"><?php echo $resSet['CurrY']; ?></td>
	    <td class="tdc"><?php echo $resSet['NewY']; ?></td>
		<?php if($resSet['Process']=='PMS'){ ?>
	    <td class="tdc"><?php echo $resSet['PrintDate']; ?></td>
	    <td class="tdc"><?php echo $resSet['EffectedDate']; ?></td>
	    <td class="tdc"><?php if($resSet['EffectedDate2']!='1970-01-01' AND $resSet['EffectedDate2']!='0000-00-00'){ echo date("d-m-Y",strtotime($resSet['EffectedDate2'])); } ?></td>
	    <td class="tdc"><?php if($resSet['AllowEmpDoj']!='1970-01-01' AND $resSet['AllowEmpDoj']!='0000-00-00'){ echo date("d-m-Y",strtotime($resSet['AllowEmpDoj'])); } ?></td>
		<td class="tdc"><?php echo $resSet['Arrear_NOM'];?></td>
	    <td class="tdl"><?php echo $resSet['WishingMsg'];?></td>
	    <td class="tdl"><?php echo $resSet['LettPeriod']; ?></td>
		<?php }else{ ?><td class="tdc" colspan="7">&nbsp;</td><?php } ?>
	   </tr>
<?php } $SNo++;} ?>
      </table>
	</td>
  </tr>
  
  
  <tr><td>&nbsp;</td></tr>
  <tr>
    <td align="left" style="width:100%;">
	 <table border="1" style="width:100%;" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
	  <tr><td colspan="23" class="th" style="font-size:16px;">[3] Permission (Open-Close) PMS Menu</b></td></tr>
	  <tr>
	   <td class="th" colspan="6">For All</td>
	   <td class="th" colspan="5">For Employee</td>
	   <td class="th" colspan="6">For App, Rev & HOD ( View Form & Details )</td>
	   <td class="th" colspan="6">For HOD</td>
	  </tr>
	  <tr>
	   <td class="th" style="width:3%;">Sn</td>
	   <td class="th" style="width:7%;">Person</td>
	   <td class="th" style="width:3%;">Edit</td>
	   <td class="th" style="width:4%;">KRA</td>
	   <td class="th" style="width:4%;">Mid<br>PMS</td>
	   <td class="th" style="width:4%;">PMS</td>
	   
	   <td class="th" style="width:4%;">Details</td>
	   <td class="th" style="width:4%;">Popup<br>Msg</td>
	   <td class="th" style="width:4%;">Sche<br>dule</td>
	   <td class="th" style="width:4%;">Helf<br>FAQ</td>
	   <td class="th" style="width:4%;">Veiw<br>Print</td>
	   
	   <td class="th" style="width:4%;">Emp<br>KRA</td>
	   <td class="th" style="width:4%;">Emp<br>PMS</td>
	   <td class="th" style="width:4%;">Emp<br>History</td>
	   <td class="th" style="width:4%;">Home</td>
	   <td class="th" style="width:4%;">My<br>Team</td>
	   <td class="th" style="width:5%;">Team<br>Status</td>
	   
	   <td class="th" style="width:5%;">Score</td>
	   <td class="th" style="width:5%;">Promo<br>tion</td>
	   <td class="th" style="width:5%;">Incre<br>ment</td>
	   <td class="th" style="width:5%;">PMS<br>Report</td>
	   <td class="th" style="width:5%;">Inc<br>Report</td>
	   <td class="th" style="width:5%;">Rating<br>Graph</td> 
	  </tr>
 <?php $sqlPmsKey=mysql_query("select * from hrm_pms_key where CompanyId=".$CompanyId." order by PmsMId ASC", $con); $SNo=1; while($PmsKey=mysql_fetch_array($sqlPmsKey)){ if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit3" && $_REQUEST['e3id']==$PmsKey['PmsMId']){ ?>
      <form name="formEdit" method="post" onSubmit="return validateEdit(this)">	
	  
	  <input type="hidden" name="Edit3Id" id="Edit3Id" value="<?php echo $_REQUEST['e3id']; ?>"/>
	  <input type="hidden" id="AccessName" name="AccessName" value="<?php echo $PmsKey['Person']; ?>" />
	   <tr style="height:22px;">
	    <td class="tdc"><?php echo $SNo; ?></td>
		<td class="tdl">&nbsp;<b><?php if($PmsKey['Person']=='emp')echo 'Employee'; elseif($PmsKey['Person']=='app')echo 'Appraiser'; elseif($PmsKey['Person']=='rev')echo 'Reviewer'; elseif($PmsKey['Person']=='hod')echo 'HOD';?></b></td>
		<td class="tdc"><?php if($_SESSION['User_Permission']=='Edit'){ ?><input type="submit" name="Save33Edit"  value="" class="SaveButton"><?php } ?></td>
		
		<?php if($PmsKey['Person']=='emp'){ ?>
		<td class="tdc"><select name="KRAForm" id="KRAForm" class="tdinput"><option value="<?php echo $PmsKey['KRAForm']; ?>"><?php echo $PmsKey['KRAForm']; ?></option><option value="<?php if($PmsKey['KRAForm']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($PmsKey['KRAForm']=='Y')echo 'N'; else echo 'Y'; ?></option></select></td>
		<td class="tdc"><select name="MidPmsForm" id="MidPmsForm" class="tdinput"><option value="<?php echo $PmsKey['MidPmsForm']; ?>"><?php echo $PmsKey['MidPmsForm']; ?></option><option value="<?php if($PmsKey['MidPmsForm']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($PmsKey['MidPmsForm']=='Y') echo 'N'; else echo 'Y'; ?></option></select></td>
		<td class="tdc"><select name="AppraisalForm" id="AppraisalForm" class="tdinput"><option value="<?php echo $PmsKey['AppraisalForm'];?>"><?php echo $PmsKey['AppraisalForm']; ?></option><option value="<?php if($PmsKey['AppraisalForm']=='Y') echo 'N';else echo 'Y'; ?>"><?php if($PmsKey['AppraisalForm']=='Y') echo 'N'; else echo 'Y';?></option></select></td>
		
	    <td class="tdc"><select name="PersonalDetails" id="PersonalDetails" class="tdinput"><option value="<?php echo $PmsKey['PersonalDetails']; ?>"><?php echo $PmsKey['PersonalDetails']; ?></option><option value="<?php if($PmsKey['PersonalDetails']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($PmsKey['PersonalDetails']=='Y')echo 'N'; else echo 'Y'; ?></option></select></td>		
	    <td class="tdc"><select name="EmpMsg" id="EmpMsg" class="tdinput"><option value="<?php echo $PmsKey['EmpMsg']; ?>"><?php echo $PmsKey['EmpMsg']; ?></option><option value="<?php if($PmsKey['EmpMsg']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($PmsKey['EmpMsg']=='Y')echo 'N'; else echo 'Y'; ?></option></select></td>
        <td class="tdc"><select name="Schedule" id="Schedule" class="tdinput"><option value="<?php echo $PmsKey['Schedule']; ?>"><?php echo $PmsKey['Schedule']; ?></option><option value="<?php if($PmsKey['Schedule']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($PmsKey['Schedule']=='Y')echo 'N'; else echo 'Y'; ?></option></select></td>
        <td class="tdc"><select name="Help_Faq" id="Help_Faq" class="tdinput"><option value="<?php echo $PmsKey['Help_Faq']; ?>"><?php echo $PmsKey['Help_Faq']; ?></option><option value="<?php if($PmsKey['Help_Faq']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($PmsKey['Help_Faq']=='Y')echo 'N'; else echo 'Y'; ?></option></select></td>
        <td class="tdc"><select name="View_Print" id="View_Print" class="tdinput"><option value="<?php echo $PmsKey['View_Print']; ?>"><?php echo $PmsKey['View_Print']; ?></option><option value="<?php if($PmsKey['View_Print']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($PmsKey['View_Print']=='Y')echo 'N'; else echo 'Y'; ?></option></select></td>
		<?php }else{ ?>  
		<td class="tdc" colspan="8"><input type="hidden" name="KRAForm" id="KRAForm" value="N" /><input type="hidden" name="MidPmsForm" id="MidPmsForm" value="N" /><input type="hidden" name="AppraisalForm" id="AppraisalForm" value="N" /><input type="hidden" name="PersonalDetails" id="PersonalDetails" value="N" /><input type="hidden" name="EmpMsg" id="EmpMsg" value="N"/><input type="hidden" name="Schedule" id="Schedule" value="N" /><input type="hidden" name="Help_Faq" id="Help_Faq" value="N" /><input type="hidden" name="View_Print" id="View_Print" value="N" /></td>
		<?php } ?>
	   
	    <?php if($PmsKey['Person']!='emp'){ ?>
	    <td class="tdc"><select name="FKraForm" id="FKraForm" class="tdinput"><option value="<?php echo $PmsKey['FKraForm']; ?>"><?php echo $PmsKey['FKraForm']; ?></option><option value="<?php if($PmsKey['FKraForm']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($PmsKey['FKraForm']=='Y')echo 'N'; else echo 'Y'; ?></option></select></td>
        <td class="tdc"><select name="FPmsForm" id="FPmsForm" class="tdinput"><option value="<?php echo $PmsKey['FPmsForm']; ?>"><?php echo $PmsKey['FPmsForm']; ?></option><option value="<?php if($PmsKey['FPmsForm']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($PmsKey['FPmsForm']=='Y')echo 'N'; else echo 'Y'; ?></option></select></td>
        <td class="tdc"><select name="FHistoryForm" id="FHistoryForm" class="tdinput"><option value="<?php echo $PmsKey['FHistoryForm']; ?>"><?php echo $PmsKey['FHistoryForm']; ?></option><option value="<?php if($PmsKey['FHistoryForm']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($PmsKey['FHistoryForm']=='Y')echo 'N'; else echo 'Y'; ?></option></select></td>
        <td class="tdc"><select name="Home" id="Home" class="tdinput"><option value="<?php echo $PmsKey['Home']; ?>"><?php echo $PmsKey['Home']; ?></option><option value="<?php if($PmsKey['Home']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($PmsKey['Home']=='Y')echo 'N'; else echo 'Y'; ?></option></select></td>
        <td class="tdc"><select name="MyTeam" id="MyTeam" class="tdinput"><option value="<?php echo $PmsKey['MyTeam']; ?>"><?php echo $PmsKey['MyTeam']; ?></option><option value="<?php if($PmsKey['MyTeam']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($PmsKey['MyTeam']=='Y')echo 'N'; else echo 'Y'; ?></option></select></td>
        <td class="tdc"><select name="TeamStatus" id="TeamStatus" class="tdinput"><option value="<?php echo $PmsKey['TeamStatus']; ?>"><?php echo $PmsKey['TeamStatus']; ?></option><option value="<?php if($PmsKey['TeamStatus']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($PmsKey['TeamStatus']=='Y')echo 'N'; else echo 'Y'; ?></option></select></td>
		<?php }else{ ?>
		<td class="tdc" colspan="6"><input type="hidden" name="FKraForm" id="FKraForm" value="N" /><input type="hidden" name="FPmsForm" id="FPmsForm" value="N"/><input type="hidden" name="FHistoryForm" id="FHistoryForm" value="N" /><input type="hidden" name="Home" id="Home" value="N" /><input type="hidden" name="MyTeam" id="MyTeam" value="N" /><input type="hidden" name="TeamStatus" id="TeamStatus" value="N" /></td>
		<?php } ?>
		
		<?php if($PmsKey['Person']=='hod'){ ?>
        <td class="tdc"><select name="Score" id="Score" class="tdinput"><option value="<?php echo $PmsKey['Score']; ?>"><?php echo $PmsKey['Score']; ?></option><option value="<?php if($PmsKey['Score']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($PmsKey['Score']=='Y')echo 'N'; else echo 'Y'; ?></option></select></td>
        <td class="tdc"><select name="Promotion" id="Promotion" class="tdinput"><option value="<?php echo $PmsKey['Promotion']; ?>"><?php echo $PmsKey['Promotion']; ?></option><option value="<?php if($PmsKey['Promotion']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($PmsKey['Promotion']=='Y')echo 'N'; else echo 'Y'; ?></option></select></td>
        <td class="tdc"><select name="Increment" id="Increment" class="tdinput"><option value="<?php echo $PmsKey['Increment']; ?>"><?php echo $PmsKey['Increment']; ?></option><option value="<?php if($PmsKey['Increment']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($PmsKey['Increment']=='Y')echo 'N'; else echo 'Y'; ?></option></select></td>
        <td class="tdc"><select name="MyPmsReport" id="MyPmsReport" class="tdinput"><option value="<?php echo $PmsKey['MyPmsReport']; ?>"><?php echo $PmsKey['MyPmsReport']; ?></option><option value="<?php if($PmsKey['MyPmsReport']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($PmsKey['MyPmsReport']=='Y')echo 'N'; else echo 'Y'; ?></option></select></td>
        <td class="tdc"><select name="IncrementReport" id="IncrementReport" class="tdinput"><option value="<?php echo $PmsKey['IncrementReport']; ?>"><?php echo $PmsKey['IncrementReport']; ?></option><option value="<?php if($PmsKey['IncrementReport']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($PmsKey['IncrementReport']=='Y')echo 'N'; else echo 'Y'; ?></option></select></td>
	    <?php }else{ ?>
		<td class="tdc" colspan="5"><input type="hidden" name="Score" id="Score" value="N" /><input type="hidden" name="Promotion" id="Promotion" value="N"/><input type="hidden" name="Increment" id="Increment" value="N" /><input type="hidden" name="MyPmsReport" id="MyPmsReport" value="N" /><input type="hidden" name="IncrementReport" id="IncrementReport" value="N" /></td>
		<?php } ?>	
		
		<?php if($PmsKey['Person']!='emp'){ ?>
		<td class="tdc"><select name="RatingGraph" id="RatingGraph" class="tdinput"><option value="<?php echo $PmsKey['RatingGraph']; ?>"><?php echo $PmsKey['RatingGraph']; ?></option><option value="<?php if($PmsKey['RatingGraph']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($PmsKey['RatingGraph']=='Y')echo 'N'; else echo 'Y'; ?></option></select></td>
		<?php }else{ ?>
		<td class="tdc"><input type="hidden" name="RatingGraph" id="RatingGraph" value="N" /></td><?php } ?>
	  </tr>
	  </form>
 <?php }else{ ?>
       <tr style="height:22px;">
		<td class="tdc"><?php echo $SNo;?></td>
		<td class="tdl">&nbsp;<b><?php if($PmsKey['Person']=='emp') echo 'Employee'; elseif($PmsKey['Person']=='app')echo 'Appraiser'; elseif($PmsKey['Person']=='rev')echo 'Reviewer'; elseif($PmsKey['Person']=='hod')echo 'HOD';?></b></td>		        
		<td class="tdc"><?php if($_SESSION['User_Permission']=='Edit'){?><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit3(<?php echo $PmsKey['PmsMId']; ?>)"></a><?php } ?></td>
		
		<?php if($PmsKey['Person']=='emp'){ ?>
		<td class="tdc" bgcolor="<?php if($PmsKey['KRAForm']=='Y'){ echo '#1CA703'; }else{ echo '#F7FA8D'; }?>"><?php echo $PmsKey['KRAForm']; ?></td>
		<td class="tdc" bgcolor="<?php if($PmsKey['MidPmsForm']=='Y'){ echo '#1CA703'; }else{ echo '#F7FA8D'; }?>"><?php echo $PmsKey['MidPmsForm']; ?></td>
		<td class="tdc" bgcolor="<?php if($PmsKey['AppraisalForm']=='Y'){ echo '#1CA703'; }else{ echo '#F7FA8D'; }?>"><?php echo $PmsKey['AppraisalForm']; ?></td> 
		
		<td class="tdc" bgcolor="<?php if($PmsKey['PersonalDetails']=='Y'){ echo '#1CA703'; }else{ echo '#F7FA8D'; }?>"><?php echo $PmsKey['PersonalDetails']; ?></td>
		<td class="tdc" bgcolor="<?php if($PmsKey['EmpMsg']=='Y'){ echo '#1CA703'; }else{ echo '#F7FA8D'; }?>"><?php echo $PmsKey['EmpMsg']; ?></td>
		<td class="tdc" bgcolor="<?php if($PmsKey['Schedule']=='Y'){ echo '#1CA703'; }else{ echo '#F7FA8D'; }?>"><?php echo $PmsKey['Schedule']; ?></td>
		<td class="tdc" bgcolor="<?php if($PmsKey['Help_Faq']=='Y'){ echo '#1CA703'; }else{ echo '#F7FA8D'; }?>"><?php echo $PmsKey['Help_Faq']; ?></td>
		<td class="tdc" bgcolor="<?php if($PmsKey['View_Print']=='Y'){ echo '#1CA703'; }else{ echo '#F7FA8D'; }?>"><?php echo $PmsKey['View_Print']; ?></td>
		<?php }else{ ?><td class="tdc" colspan="8">&nbsp;</td><?php } ?>
		
		<?php if($PmsKey['Person']!='emp'){ ?>
		<td class="tdc" bgcolor="<?php if($PmsKey['FKraForm']=='Y'){ echo '#1CA703'; }else{ echo '#F7FA8D'; }?>"><?php echo $PmsKey['FKraForm']; ?></td>
		<td class="tdc" bgcolor="<?php if($PmsKey['FPmsForm']=='Y'){ echo '#1CA703'; }else{ echo '#F7FA8D'; }?>"><?php echo $PmsKey['FPmsForm']; ?></td>
		<td class="tdc" bgcolor="<?php if($PmsKey['FHistoryForm']=='Y'){ echo '#1CA703'; }else{ echo '#F7FA8D'; }?>"><?php echo $PmsKey['FHistoryForm']; ?></td>
        <td class="tdc" bgcolor="<?php if($PmsKey['Home']=='Y'){ echo '#1CA703'; }else{ echo '#F7FA8D'; }?>"><?php echo $PmsKey['Home']; ?></td>
		<td class="tdc" bgcolor="<?php if($PmsKey['MyTeam']=='Y'){ echo '#1CA703'; }else{ echo '#F7FA8D'; }?>"><?php echo $PmsKey['MyTeam']; ?></td>
		<td class="tdc" bgcolor="<?php if($PmsKey['TeamStatus']=='Y'){ echo '#1CA703'; }else{ echo '#F7FA8D'; }?>"><?php echo $PmsKey['TeamStatus']; ?></td>
		<?php }else{ ?><td class="tdc" colspan="6">&nbsp;</td><?php } ?>
		
		<?php if($PmsKey['Person']=='hod'){ ?>
		<td class="tdc" bgcolor="<?php if($PmsKey['Score']=='Y'){ echo '#1CA703'; }else{ echo '#F7FA8D'; }?>"><?php echo $PmsKey['Score']; ?></td>
		<td class="tdc" bgcolor="<?php if($PmsKey['Promotion']=='Y'){ echo '#1CA703'; }else{ echo '#F7FA8D'; }?>"><?php echo $PmsKey['Promotion']; ?></td>
		<td class="tdc" bgcolor="<?php if($PmsKey['Increment']=='Y'){ echo '#1CA703'; }else{ echo '#F7FA8D'; }?>"><?php echo $PmsKey['Increment']; ?></td>
		<td class="tdc" bgcolor="<?php if($PmsKey['MyPmsReport']=='Y'){ echo '#1CA703'; }else{ echo '#F7FA8D'; }?>"><?php echo $PmsKey['MyPmsReport']; ?></td>
        <td class="tdc" bgcolor="<?php if($PmsKey['IncrementReport']=='Y'){ echo '#1CA703'; }else{ echo '#F7FA8D'; }?>"><?php echo $PmsKey['IncrementReport']; ?></td>
		<?php }else{ ?><td class="tdc" colspan="5">&nbsp;</td><?php } ?>
		
		<?php if($PmsKey['Person']!='emp'){ ?>
		<td class="tdc" bgcolor="<?php if($PmsKey['RatingGraph']=='Y'){ echo '#1CA703'; }else{ echo '#F7FA8D'; }?>"><?php echo $PmsKey['RatingGraph']; ?></td>
		<?php }else{ ?><td class="tdc">&nbsp;</td><?php } ?>
		
	   </tr>
 <?php } $SNo++;} ?>	  
      </table>
	</td>
  </tr>
  
  <tr><td>&nbsp;</td></tr>
  <tr>
   <td align="left" style="width:100%;">
	<table border="1" style="width:50%;" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
	  <tr><td colspan="13" class="th" style="font-size:16px;">[4] Appraisal Process, Setup KRA & Setup Form-B</b></td></tr>
	  <tr>
	   <td class="th" style="width:3%;">Sn</td>
	   <td class="th" style="width:21%;">Setup Name</td>
	   <td class="th" style="width:13%;">Mid-PMS</td>
	   <td class="th" style="width:13%;">PMS</td>
	  </tr>
	  <tr style="height:30px;">
	   <td class="tdc">1</td>
	   <td class="tdl"><b style="font-size:15px;">&nbsp;Appraisal (PMS) Process</b></td>
	   <td class="tdc"><input type="checkbox" id="checkMidPms" onClick="CheckMidPms()" disabled/>
	   <input type="button" id="P-MidPms" onClick="ProcessMidPms()" value="Process" style="width:80px;" disabled/></td>
	   <td class="tdc"><input type="checkbox" id="checkPms" onClick="CheckPms()"/>
	   <input type="button" id="P-Pms" onClick="ProcessPms()" value="Process" style="width:80px;" disabled/></td>
	  </tr>
	  <tr style="height:30px;">
	   <td class="tdc">2</td>
	   <td class="tdl"><b style="font-size:15px;">&nbsp;Setup KRA Process</b></td>
	   <td class="tdc"><input type="checkbox" id="KcheckMidPms" onClick="CheckMidPmsK()" disabled/>
	   <input type="button" id="P-KMidPms" onClick="ProcessKMidPmsK()" value="Process" style="width:80px;" disabled/></td>
	   <td class="tdc"><input type="checkbox" id="KcheckPms" onClick="CheckPmsK()"/>
	   <input type="button" id="P-KPms" onClick="ProcessKPmsK()" value="Process" style="width:80px;" disabled/></td>
	  </tr>
	   <tr style="height:30px;">
	   <td class="tdc">3</td>
	   <td class="tdl"><b style="font-size:15px;">&nbsp;Setup Form-B Process</b></td>
	   <td class="tdc"><input type="checkbox" id="BcheckMidPms" onClick="CheckMidPmsB()" disabled/>
	   <input type="button" id="P-BMidPms" onClick="ProcessBMidPmsB()" value="Process" style="width:80px;" disabled/></td>
	   <td class="tdc"><input type="checkbox" id="BcheckPms" onClick="CheckPmsB()"/>
	   <input type="button" id="P-BPms" onClick="ProcessBPmsB()" value="Process" style="width:80px;" disabled/></td>
	  </tr>  
	 </table>
   </td>
  </tr>
  
  <tr><td>&nbsp;</td></tr>
  <tr>
   <td align="left" style="width:100%;">
	<table border="1" style="width:50%;" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
	  <tr><td colspan="13" class="th" style="font-size:16px;">[5] New KRA Process Setup</b></td></tr>
	  <tr>
	   <td class="th" style="width:3%;">Sn</td>
	   <td class="th" style="width:21%;">Setup Name</td>
	   <td class="th" style="width:13%;">KRA</td>
	  </tr>
	  <tr style="height:30px;">
	   <td class="tdc">1</td>
	   <td class="tdl"><b style="font-size:15px;">&nbsp;For New KRA Entry</b></td>
	   <td class="tdc"><input type="checkbox" id="checkk2" onClick="NCheckk2()"/>
	   <input type="button" id="K-Process" onClick="ProcessNeKra()" value="Process" style="width:80px;" disabled/></td>
	  </tr>
	 </table>
   </td>
  </tr>
	
	
	  	
 
  </table>    
</td>
<?php //********************** Close Menu PMS *********************?>    
 </tr>
</table>
<?php } ?>
<?php //******************************************************************/ ?>
<?php //***********************END*****END*****END******END******END****************************************/?>
<?php //*****************************************************************************************/ ?>
	  </td>
	</tr>
	<!--<tr>
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
	    <?php //require_once("../footer.php"); ?>
	  </td>
	</tr>-->
  </table>
 </td>
</tr>
</table>
</body>
</html>



