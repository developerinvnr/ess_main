<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//**********************************************************************************************************************

//* Open Attendance Update *//
if($_REQUEST['action']=='UpAttMonth' && $_REQUEST['v']!='')
{

 $M=$_REQUEST['v'];
 if(date("m")==01){ if($M==12){$Y=date("Y")-1;}else{$Y=date("Y");} }
 if(date("m")!=01){ $Y=date("Y");}  
 $sqlEI=mysql_query("select EmployeeID from hrm_employee where CompanyId=".$CompanyId." AND EmpStatus!='De'", $con); 
 while($resEI=mysql_fetch_assoc($sqlEI))
 {	  
   $SqlPH=mysql_query("select count(DISTINCT AttDate)as PH from hrm_employee_attendance where AttValue='PH' AND EmployeeID=".$resEI['EmployeeID']." AND (AttDate between '".date($Y."-".$M."-1")."' AND '".date($Y."-".$M."-31")."')", $con); $SqlPL=mysql_query("select count(DISTINCT AttDate)as PL from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$resEI['EmployeeID']." AND (AttDate between '".date($Y."-".$M."-1")."' AND '".date($Y."-".$M."-31")."')", $con); 
    $ResPH=mysql_fetch_array($SqlPH); $ResPL=mysql_fetch_array($SqlPL); 
	$CountPH=$ResPH['PH']/2; $TotalPL=$ResPL['PL']+$CountPH; 
	   
/********************************************** Open 1 ***********/
	  $SL=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$resEI['EmployeeID']." AND Month='".$M."' AND Year='".$Y."'", $con); $RowL=mysql_num_rows($SL);
	  if($RowL>0) { $RL=mysql_fetch_assoc($SL); 
	  if($M!=1) { $TotBalPL=$RL['OpeningPL']-$TotalPL; }  
	  if($M==1) { $TotPLT=$RL['EnCashPL']+$TotalPL; $TotBalPL=$RL['TotPL']-$TotPLT; }         
	  $sUpL=mysql_query("UPDATE hrm_employee_monthlyleave_balance set AvailedPL='".$TotalPL."', BalancePL='".$TotBalPL."' where EmployeeID=".$resEI['EmployeeID']." AND Month='".$M."' AND Year='".$Y."'", $con); }
/********************************************** Close 1 **********/
/********************************************** Open 2 ***********/	   
       $SqlMonthLeave=mysql_query("select * from hrm_employee_monthatt where EmployeeID=".$resEI['EmployeeID']." AND Month=".$M." AND Year='".$Y."'", $con); $RowMonthLeave=mysql_num_rows($SqlMonthLeave);
       if($RowMonthLeave>0){ $InsUpMonth=mysql_query("UPDATE hrm_employee_monthatt SET MonthAtt_TotPL='".$TotalPL."' where EmployeeID=".$resEI['EmployeeID']." AND Month=".$M." AND Year='".$Y."'", $con);}
/********************************************** Close 1 **********/	   
   
   if($M==1){$SelM='January';} if($M==2){$SelM='February';} if($M==3){$SelM='March';} 
   if($M==4){$SelM='April';} if($M==5){$SelM='May';} if($M==6){$SelM='June';} 
   if($M==7){$SelM='July';} if($M==8){$SelM='August';} if($M==9){$SelM='September';} 
   if($M==10){$SelM='October';} if($M==11){$SelM='November';} if($M==12){$SelM='December';}
   if($InsUpMonth){ $msgUpAtt= 'Employee attendance update for month '.$SelM.' uploaded successfully...';}
     
 } 

}



/* Open Monthaly Pay process */
if($_REQUEST['action']=='PayMonth' && $_REQUEST['v']!='')
{
 if(date("m")==01){ if($_REQUEST['v']==12){$Y=date("Y")-1;}else{$Y=date("Y");} }
 if(date("m")!=01){ $Y=date("Y");}
 $fd=date("Y",strtotime($_SESSION['fromdate'])); $td=date("Y",strtotime($_SESSION['todate'])); $PRD=$fd.'-'.$td;
 $sqlStD=mysql_query("select * from hrm_company_statutory_tds where CompanyId=".$CompanyId." AND Status='A'", $con); $resStD=mysql_fetch_assoc($sqlStD);
 $sqlE=mysql_query("select hrm_employee.EmployeeID,DepartmentId,DesigId,GradeId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining!='0000-00-00' AND hrm_employee_general.DateJoining!='1970-01-01' AND hrm_employee_general.DateJoining<='".date($Y.'-'.$_REQUEST['v'].'-31')."' ", $con); 

 //$sqlE=mysql_query("select EmployeeID from hrm_employee where CompanyId=".$CompanyId." AND EmpStatus!='De'", $con); 
 //$sqlE=mysql_query("select hrm_employee.* from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=11", $con); 
  while($resE=mysql_fetch_assoc($sqlE))
  { $m=$_REQUEST['v']; $id=$resE['EmployeeID']; 
    $sqlME=mysql_query("select * from hrm_employee_monthatt where Year=".$Y." AND EmployeeID=".$id." AND Month=".$m."", $con); 
	$rowME=mysql_num_rows($sqlME); 
	if($rowME>0) 
	{ 
	  $resME=mysql_fetch_assoc($sqlME);
/*********************************************************************************/
	  if($m==1 OR $m==2 OR $m==3 OR $m==4 OR $m==5 OR $m==6 OR $m==7 OR $m==8 OR $m==9){ $FY=date("Y")-1; $TY=date("Y"); }
	  elseif($m==10 OR $m==11 OR $m==12){ $FY=date("Y"); $TY=date("Y"); } 
	  $FromD=$FY.'-10-01'; $ToD=$TY.'-'.$m.'-31';
	  $sql_1=mysql_query("select MAX(CtcId) as MaxID from hrm_employee_ctc where EmployeeID=".$id." AND CtcCreatedDate!='0000-00-00' AND CtcCreatedDate!='1970-01-01' AND CtcCreatedDate>='".$FromD."' AND CtcCreatedDate<='".$ToD."'", $con); $row_1=mysql_num_rows($sql_1);
	  $res_1=mysql_fetch_assoc($sql_1); $MaxCtcId=$res_1['MaxID']; 
	  if($MaxCtcId!=''){$sqlCTC=mysql_query("select * from hrm_employee_ctc where EmployeeID=".$id." AND CtcId=".$MaxCtcId, $con);}
	  elseif($MaxCtcId==''){$sqlCTC=mysql_query("select * from hrm_employee_ctc where EmployeeID=".$id." AND Status='A'", $con);}
	  $resCTC=mysql_fetch_assoc($sqlCTC); 
/*********************************************************************************/	 
      //$sqlCTC=mysql_query("select * from hrm_employee_ctc where EmployeeID=".$id." AND CtcId=".$res_1['MaxID'], $con); $resCTC=mysql_fetch_assoc($sqlCTC); 
     //$sqlCTC=mysql_query("select * from hrm_employee_ctc where EmployeeID=".$id." AND Status='A'", $con); $resCTC=mysql_fetch_assoc($sqlCTC);

	  $SqlLumSum=mysql_query("select hrm_company_statutory_lumpsum.*,hrm_company_statutory_taxsaving.*,hrm_company_statutory_pf.* from hrm_company_statutory_lumpsum INNER JOIN hrm_company_statutory_taxsaving ON hrm_company_statutory_lumpsum.CompanyId=hrm_company_statutory_taxsaving.CompanyId INNER JOIN hrm_company_statutory_pf ON hrm_company_statutory_lumpsum.CompanyId=hrm_company_statutory_pf.CompanyId where hrm_company_statutory_lumpsum.CompanyId=".$CompanyId, $con); $ResLumSum=mysql_fetch_assoc($SqlLumSum);
	
	 //if($resME['MonthAtt_TotPaidDay']!=''){$PaidDay=$resME['MonthAtt_TotPaidDay'];}else{$PaidDay=0;}
	 //if($PaidDay>26){$PaidDay=26;}else{$PaidDay=$PaidDay;}
	
	
	$WorkDay=$resME['MonthAtt_TotWorkDay'];
        $TotalWorkDay=$resME['MonthAtt_TotLeave']+$resME['MonthAtt_TotOD']+$resME['MonthAtt_TotHO']+$resME['MonthAtt_TotPR']+$resME['MonthAtt_TotAP'];

       $SqlSun=mysql_query("select count(CheckSunday)as SUN from hrm_employee_attendance where CheckSunday='Y' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con); $ResSun=mysql_fetch_array($SqlSun); $TotSun=$ResSun['SUN'];
       if($TotSun>0){$TotalWork=$TotalWorkDay-$TotSun;}else{$TotalWork=$TotalWorkDay;} 
       $PrDay=$TotalWork-$resME['MonthAtt_TotAP'];
	  
       if($TotalWork==24 OR $TotalWork==25){$TotalWD=$WorkDay;}else{$TotalWD=$TotalWork;}
       if($TotalWD>$WorkDay){$TWD=$WorkDay;}else{$TWD=$TotalWD;}

        //if($resME['MonthAtt_TotAP']>0){$ActPD=$TWD-$resME['MonthAtt_TotAP'];}else{$ActPD=$TWD;}
	   
	if($resME['MonthAtt_TotAP']>0 AND $resME['MonthAtt_TotAP']>=10){$ActPD=$TotalWork-$resME['MonthAtt_TotAP'];}
	elseif($resME['MonthAtt_TotAP']>0 AND $resME['MonthAtt_TotAP']<10){$ActPD=$TWD-$resME['MonthAtt_TotAP'];}
	else{$ActPD=$TWD;}
        if($PrDay>0){$PaidDay=$ActPD;}else{$PaidDay=0;}
	 
	  $sqlUp=mysql_query("update hrm_employee_monthatt set MonthAtt_TotPaidDay=".$PaidDay." where Year=".$Y." AND EmployeeID=".$id." AND Month=".$m."",$con);
	  $Absent=$resME['MonthAtt_TotAP'];

	  if($resCTC['BAS_Value']>0) {$OneDay_Basic=$resCTC['BAS_Value']/$WorkDay; $Basic=round($OneDay_Basic*$PaidDay);} else {$Basic=0;}

          //if($resCTC['BAS_Value']<=$ResLumSum['Pf_MaxSalPf']){$WageBasic=$resCTC['BAS_Value'];}else{$WageBasic=$ResLumSum['Pf_MaxSalPf'];}
	  //if($WageBasic>0) {$OneDay_WageBasic=$WageBasic/$WorkDay; $PFBasic=round($OneDay_WageBasic*$PaidDay);} else {$PFBasic=0;}

          if($Basic<=$ResLumSum['Pf_MaxSalPf']){$PFBasic=$Basic;}else{$PFBasic=$ResLumSum['Pf_MaxSalPf'];}


	  if($resCTC['STIPEND_Value']>0) {$OneDay_Stip=$resCTC['STIPEND_Value']/$WorkDay; $Stip=round($OneDay_Stip*$PaidDay);} else {$Stip=0;}
	  if($resCTC['HRA_Value']>0) {$OneDay_Hra=$resCTC['HRA_Value']/$WorkDay; $HRA=round($OneDay_Hra*$PaidDay);} else {$HRA=0;}
	  if($resCTC['CONV_Value']>0) {$OneDay_Con=$resCTC['CONV_Value']/$WorkDay; $Con=round($OneDay_Con*$PaidDay);} else {$Con=0;}
	  if($resCTC['SPECIAL_ALL_Value']>0) {$OneDay_Spe=$resCTC['SPECIAL_ALL_Value']/$WorkDay; $Special=round($OneDay_Spe*$PaidDay);} else {$Special=0;}
	  if($resCTC['CHILD_EDU_ALL_Value']>0)
	  { if($resCTC['CHILD_EDU_ALL_Value']==1200){$CEA=$ResLumSum['CEA_PerChildMonth'];} if($resCTC['CHILD_EDU_ALL_Value']==2400){$CEA=$ResLumSum['CEA_PerChildMonth']*2;}} 
	  else {$CEA=0;}
	  if($resCTC['MED_REM_Value']>0) {$MR=$ResLumSum['MR_PerMonth'];} else {$MR=0;}  
	  if($resCTC['LTA_Value']>0){$LTA=round($resCTC['LTA_Value']/12);} else {$LTA=0;}  
	  
	  //if($Basic<=$ResLumSum['Pf_MaxSalPf']){ $Emp_PF=round(($PFBasic*12)/100);} else {$Emp_PF=round(($ResLumSum['Pf_MaxSalPf']*12)/100);}

      $Emp_PF=round(($PFBasic*12)/100); 
      $Emp_EPS=0; $Emp_EDLI=0; $Emp_PFAdminCharge=0; $Emp_EDLIAdminCharge=0;
	  $Contri_PF=round(($PFBasic*$ResLumSum['Pf_PfContriRate'])/100); $Contri_EPS=round(($PFBasic*$ResLumSum['Pf_EpsContriRate'])/100); 
	  $Contri_EDLI=round(($PFBasic*$ResLumSum['Pf_DliContribution'])/100);  $Contri_PFAdminCharge=round(($PFBasic*$ResLumSum['Pf_PfAdminCharge'])/100); 
	  $Contri_EDLIAdminCharge=round((($PFBasic*$ResLumSum['Pf_DliAdminCharge'])/100), 2);
	  $TotPF_Emp=$Emp_PF+$Emp_EPS+$Emp_EDLI+$Emp_PFAdminCharge+$Emp_EDLIAdminCharge;
	  $TotPF_Contri=$Contri_PF+$Contri_EPS+$Contri_EDLI+$Contri_PFAdminCharge+$Contri_EDLIAdminCharge;
	  $TotPF=$TotPF_Emp+$TotPF_Contri;
	  if($resCTC['GrossSalary_PostAnualComponent_Value']>0) 
	  { //$OneDay_Gross=$resCTC['GrossSalary_PostAnualComponent_Value']/$WorkDay;
	    //$TotGross=round($OneDay_Gross*$PaidDay);
		$TotGross=$Basic+$HRA+$Con+$Special;
	  } 
	  else {$TotGross=0;}
	  
	  if($resCTC['ESCI']>0){ $ESCI=ceil(($TotGross*1.75)/100); $ComESCI=ceil(($TotGross*4.75)/100); }
	  else{ $ESCI=0; $ComESCI=0; }
	  
	  $TotDeduct=$TotPF_Emp+$ESCI;
	  $Tot_NetAmount=$TotGross-$TotDeduct;
	  $YI=$YearId;
	  $sqlME2=mysql_query("select * from hrm_employee_monthlypayslip where EmployeeID=".$id." AND Month=".$m." AND Year=".$Y."", $con); $rowME2=mysql_num_rows($sqlME2);
	  if($rowME2>0)
	  { $sqlUp=mysql_query("update hrm_employee_monthlypayslip set DepartmentId=".$resE['DepartmentId'].", DesigId=".$resE['DesigId'].", GradeId=".$resE['GradeId'].", TotalDay=".$WorkDay.", PaidDay=".$PaidDay.", Absent=".$Absent.", ActualBasic=".$resCTC['BAS_Value'].", Basic=".$Basic.",  Stipend=".$Stip.", Hra=".$HRA.", Convance=".$Con.", Special=".$Special.", CEA_Ded=".$CEA.", MA_Ded=".$MR.", LTA_Ded=".$LTA.", EPF_Employee=".$Emp_PF.", EPF_Employer=".$Contri_PF.", ESCI_Employee=".$ESCI.", ESCI_Employer=".$ComESCI.", EPS_Employee=".$Emp_EPS.", EPS_Employer=".$Contri_EPS.", EDLI_Employee=".$Emp_EDLI.", EDLI_Employer=".$Contri_EDLI.", EPF_AdminCharge_Employee=".$Emp_PFAdminCharge.", EPF_AdminCharge_Employer=".$Contri_PFAdminCharge.", EDLI_AdminCharge_Employee=".$Emp_EDLIAdminCharge.", EDLI_AdminCharge_Employer=".$Contri_EDLIAdminCharge.", Tot_Pf_Employee=".$TotPF_Emp.", Tot_Pf_Employer=".$TotPF_Contri.", Tot_Pf=".$TotPF.", Tot_Gross=".$TotGross.", Tot_Deduct=".$TotDeduct.", Tot_NetAmount=".$Tot_NetAmount.", PaySlipCreatedBy=".$UserId.", PaySlipCreatedDate='".date("Y-m-d")."', PaySlipYearId=".$YearId." where EmployeeID=".$id." AND Month=".$m." AND Year=".$Y."", $con); }
	  if($rowME2==0)
	  {
	   $sqlUp=mysql_query("insert into hrm_employee_monthlypayslip(EmployeeID, Month, Year, DepartmentId, DesigId, GradeId, TotalDay, PaidDay, Absent, ActualBasic, Basic, Stipend, Hra, Convance, Special, CEA_Ded, MA_Ded, LTA_Ded, EPF_Employee, EPF_Employer, ESCI_Employee, ESCI_Employer, EPS_Employee, EPS_Employer, EDLI_Employee, EDLI_Employer, EPF_AdminCharge_Employee, EPF_AdminCharge_Employer, EDLI_AdminCharge_Employee, EDLI_AdminCharge_Employer, Tot_Pf_Employee, Tot_Pf_Employer, Tot_Pf, Tot_Gross, Tot_Deduct, Tot_NetAmount, PaySlipCreatedBy, PaySlipCreatedDate, PaySlipYearId) values(".$id.", ".$m.", ".$Y.", ".$resE['DepartmentId'].", ".$resE['DesigId'].", ".$resE['GradeId'].", ".$WorkDay.", ".$PaidDay.", ".$Absent.", ".$resCTC['BAS_Value'].", ".$Basic.",  ".$Stip.", ".$HRA.", ".$Con.", ".$Special.", ".$CEA.", ".$MR.", ".$LTA.", ".$Emp_PF.", ".$Contri_PF.", ".$ESCI.", ".$ComESCI.", ".$Emp_EPS.", ".$Contri_EPS.", ".$Emp_EDLI.", ".$Contri_EDLI.", ".$Emp_PFAdminCharge.", ".$TotPF_Contri.", ".$Emp_EDLIAdminCharge.", ".$Contri_EDLIAdminCharge.", ".$TotPF_Emp.", ".$TotPF_Contri.", ".$TotPF.", ".$TotGross.", ".$TotDeduct.", ".$Tot_NetAmount.", ".$UserId.", '".date("Y-m-d")."', ".$YI.")", $con); }
	 } 
	 
/* TDS Component Process Open */	/* TDS Component Process Open */	/* TDS Component Process Open */	

/* Upload Hear PaySlipTdsProcess.php check file same folder */

/* TDS Component Process Close */	 /* TDS Component Process Close */	/* TDS Component Process Close */	

  }
  if($sqlUp) {  $msgPay='Successfully process monthly pay...';  }
}
/* Close Monthaly Pay process */

/********************************************************************** Open TDS ************************************************************************/
if($_REQUEST['action']=='TDSMonth' && $_REQUEST['v']!='')
{   
if(date("m")==01){ if($_REQUEST['v']==12){$Y=date("Y")-1;}else{$Y=date("Y");} }
if(date("m")!=01){ $Y=date("Y");}
$fd=date("Y",strtotime($_SESSION['fromdate'])); $td=date("Y",strtotime($_SESSION['todate'])); $PRD=$fd.'-'.$td;
$sqlStD=mysql_query("select * from hrm_company_statutory_tds where CompanyId=".$CompanyId." AND Status='A'", $con); $resStD=mysql_fetch_assoc($sqlStD);
$sqlE=mysql_query("select hrm_employee.EmployeeID from hrm_employee INNER JOIN hrm_employee_ctc ON hrm_employee.EmployeeID=hrm_employee_ctc.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_ctc.Status='A' AND hrm_employee_ctc.Tot_CTC>=200000 order by EmployeeID ASC", $con); 
 while($resE=mysql_fetch_assoc($sqlE))
 { $m=$_REQUEST['v']; $id=$resE['EmployeeID']; 
/*
$Ma=mysql_query("select Tot_TaxFree,Tot_Taxble from hrm_emplyee_tds_medicalallow where EmployeeID=".$id." AND Month=".$m." AND Period='".$PRD."'", $con); $resMa=mysql_fetch_assoc($Ma);
$Co=mysql_query("select Tot_TaxFree,Tot_Taxble from hrm_emplyee_tds_convey where EmployeeID=".$id." AND Month=".$m." AND Period='".$PRD."'", $con); $resCo=mysql_fetch_assoc($Co);
$Va=mysql_query("select Tot_TaxFree,Tot_Taxble from hrm_emplyee_tds_variableallow where EmployeeID=".$id." AND Month=".$m." AND Period='".$PRD."'", $con); $resVa=mysql_fetch_assoc($Va);
$Cea=mysql_query("select Tot_TaxFree,Tot_Taxble from hrm_emplyee_tds_cea where EmployeeID=".$id." AND Month=".$m." AND Period='".$PRD."'", $con); $resCea=mysql_fetch_assoc($Cea);
$Lta=mysql_query("select Tot_TaxFree,Tot_Taxble from hrm_emplyee_tds_lta where EmployeeID=".$id." AND Month=".$m." AND Period='".$PRD."'", $con); $resLta=mysql_fetch_assoc($Lta);
$Mr=mysql_query("select Tot_TaxFree,Tot_Taxble from hrm_emplyee_tds_mr where EmployeeID=".$id." AND Month=".$m." AND Period='".$PRD."'", $con); $resMr=mysql_fetch_assoc($Mr);
*/

$Ar=mysql_query("select * from hrm_emplyee_tds_arrear where EmployeeID=".$id." AND Period='".$PRD."'", $con); $resAr=mysql_fetch_assoc($Ar);
$Le=mysql_query("select * from hrm_emplyee_tds_leaveencash where EmployeeID=".$id." AND Period='".$PRD."'", $con); $resLe=mysql_fetch_assoc($Le);
$Bo=mysql_query("select * from hrm_emplyee_tds_bonus where EmployeeID=".$id." AND Period='".$PRD."'", $con); $resBo=mysql_fetch_assoc($Bo);
$Da=mysql_query("select * from hrm_emplyee_tds_da where EmployeeID=".$id." AND Period='".$PRD."'", $con); $resDa=mysql_fetch_assoc($Da);
$In=mysql_query("select * from hrm_emplyee_tds_incentive where EmployeeID=".$id." AND Period='".$PRD."'", $con); $resIn=mysql_fetch_assoc($In);
$Ba=mysql_query("select Tot_TaxFree,Tot_Taxble from hrm_emplyee_tds_basic where EmployeeID=".$id." AND Month=".$m." AND Period='".$PRD."'", $con); $resBa=mysql_fetch_assoc($Ba);
$Ta=mysql_query("select Tot_TaxFree,Tot_Taxble from hrm_emplyee_tds_tranallow where EmployeeID=".$id." AND Month=".$m." AND Period='".$PRD."'", $con); $resTa=mysql_fetch_assoc($Ta);
$Sp=mysql_query("select Tot_TaxFree,Tot_Taxble from hrm_emplyee_tds_specialallow where EmployeeID=".$id." AND Month=".$m." AND Period='".$PRD."'", $con); $resSp=mysql_fetch_assoc($Sp);
$Hr=mysql_query("select TotFinal_TaxFree,TotFinal_Taxble from hrm_emplyee_tds_hra where EmployeeID=".$id." AND Month=".$m." AND Period='".$PRD."'", $con); $resHr=mysql_fetch_assoc($Hr);

if($m==1){$SMAmt='Jan_Taxble'; $SMTaxFAmt='Jan_TaxFree'; $SMAmtAmt='Jan_Amt';} if($m==2){$SMAmt='Feb_Taxble'; $SMTaxFAmt='Feb_TaxFree'; $SMAmtAmt='Feb_Amt';} if($m==3){$SMAmt='Mar_Taxble'; $SMTaxFAmt='Mar_TaxFree'; $SMAmtAmt='Mar_Amt';}if($m==4){$SMAmt='Apr_Taxble'; $SMTaxFAmt='Apr_TaxFree'; $SMAmtAmt='Apr_Amt';} if($m==5){$SMAmt='May_Taxble'; $SMTaxFAmt='May_TaxFree'; $SMAmtAmt='May_Amt';} if($m==6){$SMAmt='Jun_Taxble'; $SMTaxFAmt='Jun_TaxFree'; $SMAmtAmt='Jun_Amt';}if($m==7){$SMAmt='Jul_Taxble'; $SMTaxFAmt='Jul_TaxFree'; $SMAmtAmt='Jul_Amt';} if($m==8){$SMAmt='Aug_Taxble'; $SMTaxFAmt='Aug_TaxFree'; $SMAmtAmt='Aug_Amt';} if($m==9){$SMAmt='Sep_Taxble'; $SMTaxFAmt='Sep_TaxFree'; $SMAmtAmt='Sep_Amt';}if($m==10){$SMAmt='Oct_Taxble'; $SMTaxFAmt='Oct_TaxFree'; $SMAmtAmt='Oct_Amt';} if($m==11){$SMAmt='Nov_Taxble'; $SMTaxFAmt='Nov_TaxFree'; $SMAmtAmt='Nov_Amt';} if($m==12){$SMAmt='Dec_Taxble'; $SMTaxFAmt='Dec_TaxFree'; $SMAmtAmt='Dec_Amt';}

/* ---- hrm_emplyee_tds_salary ---- */
$SqlSalary=mysql_query("select TdsSalaryId from hrm_emplyee_tds_salary where EmployeeID=".$id." AND Month=".$m." AND Period='".$PRD."'", $con); $RowSalary=mysql_num_rows($SqlSalary);
if($RowSalary==0){$InsSalary=mysql_query("insert into hrm_emplyee_tds_salary(EmployeeID, Period, YearId, Month, BasicSalary_Amt, BasicSalary_TaxFree, Arrear_Amt, Arrear_TaxFree, LeaveEncash_Amt, LeaveEncash_TaxFree, Convey_Amt, Convey_TaxFree, Bonus_Amt, Bonus_TaxFree, MedicalAllow_Amt, MedicalAllow_TaxFree, Status, CreatedBy, CreatedDate) values(".$id.", '".$PRD."', ".$YearId.", ".$m.", '".$resBa['Tot_Taxble']."', '".$resBa['Tot_TaxFree']."', '".$resAr[$SMAmt]."', '".$resAr[$SMTaxFAmt]."', '".$resLe[$SMAmt]."', '".$resLe[$SMTaxFAmt]."', 0, 0, '".$resBo[$SMAmt]."', '".$resBo[$SMTaxFAmt]."', 0, 0, 'A', ".$UserId.", '".date("Y-m-d")."')", $con);}
if($RowSalary>0){$UpSalary=mysql_query("update hrm_emplyee_tds_salary set YearId=".$YearId.", BasicSalary_Amt='".$resBa['Tot_Taxble']."', BasicSalary_TaxFree='".$resBa['Tot_TaxFree']."', Arrear_Amt='".$resAr[$SMAmt]."', Arrear_TaxFree='".$resAr[$SMTaxFAmt]."', LeaveEncash_Amt='".$resLe[$SMAmt]."', LeaveEncash_TaxFree='".$resLe[$SMTaxFAmt]."', Convey_Amt=0, Convey_TaxFree=0, Bonus_Amt='".$resBo[$SMAmt]."', Bonus_TaxFree='".$resBo[$SMTaxFAmt]."', MedicalAllow_Amt=0, MedicalAllow_TaxFree=0, Status='A', CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."' where EmployeeID=".$id." AND Month=".$m." AND Period='".$PRD."'", $con);}

/* ---- hrm_emplyee_tds_allowance ---- */
$SqlAllow=mysql_query("select TdsAllowId from hrm_emplyee_tds_allowance where EmployeeID=".$id." AND Month=".$m." AND Period='".$PRD."'", $con); $RowAllow=mysql_num_rows($SqlAllow);
if($RowAllow==0){$InsSalary=mysql_query("insert into hrm_emplyee_tds_allowance(EmployeeID, Period, YearId, Month, Hra_Amt, Hra_TaxFree, SpeAllow_Amt, SpeAllow_TaxFree, Transport_Amt, Transport_TaxFree, CEA_Amt, CEA_TaxFree, LTA_Amt, LTA_TaxFree, MR_Amt, MR_TaxFree, DA_Amt, DA_TaxFree, VariableAllow_Amt, VariableAllow_TaxFree, Incentive_Amt, Incentive_TaxFree, Status, CreatedBy, CreatedDate) values(".$id.", '".$PRD."', ".$YearId.", ".$m.", '".$resHr['TotFinal_Taxble']."', '".$resHr['TotFinal_TaxFree']."', '".$resSp['Tot_Taxble']."', '".$resSp['Tot_TaxFree']."', '".$resTa['Tot_Taxble']."', '".$resTa['Tot_TaxFree']."', 0, 0, 0, 0, 0, 0, '".$resDa[$SMAmt]."', '".$resDa[$SMTaxFAmt]."', 0, 0, '".$resIn[$SMAmt]."', '".$resIN[$SMTaxFAmt]."', 'A', ".$UserId.", '".date("Y-m-d")."')", $con);}
if($RowAllow>0){$UpSalary=mysql_query("update hrm_emplyee_tds_allowance set YearId=".$YearId.", Hra_Amt='".$resHr['TotFinal_Taxble']."', Hra_TaxFree='".$resHr['TotFinal_TaxFree']."', SpeAllow_Amt='".$resSp['Tot_Taxble']."', SpeAllow_TaxFree='".$resSp['Tot_TaxFree']."', Transport_Amt='".$resTa['Tot_Taxble']."', Transport_TaxFree='".$resTa['Tot_TaxFree']."', CEA_Amt=0, CEA_TaxFree=0, LTA_Amt=0, LTA_TaxFree=0, MR_Amt=0, MR_TaxFree=0, DA_Amt='".$resDa[$SMAmt]."', DA_TaxFree='".$resDa[$SMTaxFAmt]."', VariableAllow_Amt=0, VariableAllow_TaxFree=0, Incentive_Amt='".$resIn[$SMAmt]."', Incentive_TaxFree='".$resIn[$SMTaxFAmt]."', Status='A', CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."' where EmployeeID=".$id." AND Month=".$m." AND Period='".$PRD."'", $con);}

/* ---- hrm_emplyee_tds_otherincome ---- */
$SqlOI=mysql_query("select * from hrm_emplyee_tds_otherincome where EmployeeID=".$id." AND Period='".$PRD."'", $con); $RowOI=mysql_num_rows($SqlOI);
if($RowOI>0){$ResOI=mysql_fetch_assoc($SqlOI);}
$TAnySal=$ResOI['Divident']+$ResOI['CapitalGain']+$ResOI['Interest']+$ResOI['ProfitLossBussi']+$ResOI['AnyOther1']+$ResOI['AnyOther2'];
$TotAnyIncSal=$TAnySal+$ResOI['HouseProperty'];
$SqlUpOI=mysql_query("update hrm_emplyee_tds_otherincome set TotalAnyAmt=".$TotAnyIncSal." where EmployeeID=".$id." AND Period='".$PRD."'", $con);

/* ---- hrm_emplyee_tds_Income From Salary ---- */
$SqlSal=mysql_query("select * from hrm_emplyee_tds_salary where EmployeeID=".$id." AND Month=".$m." AND Period='".$PRD."'", $con); $ResSal=mysql_fetch_assoc($SqlSal);
$IncSalAmt=$ResSal['BasicSalary_Amt']+$ResSal['Arrear_Amt']+$ResSal['LeaveEncash_Amt']+$ResSal['Convey_Amt']+$ResSal['Bonus_Amt']+$ResSal['MedicalAllow_Amt'];
$IncSalTaxFreeAmt=$ResSal['BasicSalary_TaxFree']+$ResSal['Arrear_TaxFree']+$ResSal['LeaveEncash_TaxFree']+$ResSal['Convey_TaxFree']+$ResSal['Bonus_TaxFree']+$ResSal['MedicalAllow_TaxFree'];
$SqlAll=mysql_query("select * from hrm_emplyee_tds_allowance where EmployeeID=".$id." AND Month=".$m." AND Period='".$PRD."'", $con); $ResAll=mysql_fetch_assoc($SqlAll);
$IncAllAmt=$ResAll['Hra_Amt']+$ResAll['SpeAllow_Amt']+$ResAll['Transport_Amt']+$ResAll['CEA_Amt']+$ResAll['LTA_Amt']+$ResAll['MR_Amt']+$ResAll['DA_Amt']+$ResAll['VariableAllow_Amt']+$ResAll['Incentive_Amt'];
$IncAllTaxFreeAmt=$ResAll['Hra_TaxFree']+$ResAll['SpeAllow_TaxFree']+$ResAll['Transport_TaxFree']+$ResAll['CEA_TaxFree']+$ResAll['LTA_TaxFree']+$ResAll['MR_TaxFree']+$ResAll['DA_TaxFree']+$ResAll['VariableAllow_TaxFree']+$ResAll['Incentive_TaxFree'];

//$SqlPq=mysql_query("select * from hrm_emplyee_tds_perquisites where EmployeeID=".$id." AND Month=".$m." AND Period='".$PRD."'", $con); $ResPq=mysql_fetch_assoc($SqlPq);
$IncPeqAmt=0; $IncPeqTaxFreeAmt=0;
$IncGrossAmt=$IncSalAmt+$IncAllAmt+$IncPeqAmt; 
$IncGrossTaxFreeAmt=$IncSalTaxFreeAmt+$IncAllTaxFreeAmt+$IncPeqTaxFreeAmt;

//$Pt=mysql_query("select Tot_Amt from hrm_emplyee_tds_ptax where EmployeeID=".$id." AND Month=".$m." AND Period='".$PRD."'", $con); $ResPt=mysql_fetch_assoc($Pt);
//$IncPtAmt=$ResPt['Tot_Amt']; $IncPtTaxFreeAmt=0; $IncStdDeductAmt=0; $IncStdDeductTaxFreeAmt=0;
$IncPtAmt=0; $IncPtTaxFreeAmt=0; $IncStdDeductAmt=0; $IncStdDeductTaxFreeAmt=0;

$TotDeductAmt=$IncPtAmt+$IncStdDeductAmt; $TotDeductTaxFreeAmt=$IncPtTaxFreeAmt+$IncStdDeductTaxFreeAmt;
$TotIncSalaryAmt=$IncGrossAmt-$TotDeductAmt; $TotIncTaxFreeSalaryAmt=$IncGrossTaxFreeAmt-$TotDeductTaxFreeAmt;

$IncS=mysql_query("select * from hrm_emplyee_tds_incfromsalary where EmployeeID=".$id." AND Month=".$m." AND Period='".$PRD."'", $con); $RowIncS=mysql_num_rows($IncS);
if($RowIncS==0){$InsInc=mysql_query("insert into hrm_emplyee_tds_incfromsalary(EmployeeID, Period, YearId, Month, Salary_Amt, Salary_TaxFree, Allowance_Amt, Allowance_TaxFree, Perquistes_Amt, Perquistes_TaxFree, GrossSalary_Amt, GrossSalary_TaxFree, StandDeduction_Amt, StandDeduction_TaxFree, PTax_Amt, PTax_TaxFree, IncomeFromSal_Amt, IncomeFromSal_TaxFree, Status, CreatedBy, CreatedDate) values(".$id.", '".$PRD."', ".$YearId.", ".$m.", '".$IncSalAmt."', '".$IncSalTaxFreeAmt."', '".$IncAllAmt."', '".$IncAllTaxFreeAmt."', '".$IncPeqAmt."', '".$IncPeqTaxFreeAmt."', '".$IncGrossAmt."', '".$IncGrossTaxFreeAmt."', '".$IncStdDeductAmt."', '".$IncStdDeductTaxFreeAmt."', '".$IncPtAmt."', '".$IncPtTaxFreeAmt."', '".$TotIncSalaryAmt."', '".$TotIncTaxFreeSalaryAmt."', 'A', ".$UserId.", '".date("Y-m-d")."')", $con);}
if($RowIncS>0){$UpInc=mysql_query("update hrm_emplyee_tds_incfromsalary set YearId=".$YearId.", Salary_Amt='".$IncSalAmt."', Salary_TaxFree='".$IncSalTaxFreeAmt."', Allowance_Amt='".$IncAllAmt."', Allowance_TaxFree='".$IncAllTaxFreeAmt."', Perquistes_Amt='".$IncPeqAmt."', Perquistes_TaxFree='".$IncPeqTaxFreeAmt."', GrossSalary_Amt='".$IncGrossAmt."', GrossSalary_TaxFree='".$IncGrossTaxFreeAmt."', StandDeduction_Amt='".$IncStdDeductAmt."', StandDeduction_TaxFree='".$IncStdDeductTaxFreeAmt."', PTax_Amt='".$IncPtAmt."', PTax_TaxFree='".$IncPtTaxFreeAmt."', IncomeFromSal_Amt='".$TotIncSalaryAmt."', IncomeFromSal_TaxFree='".$TotIncTaxFreeSalaryAmt."', Status='A', CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."' where EmployeeID=".$id." AND Month=".$m." AND Period='".$PRD."'", $con);}

/* Main Componenets */
$SSal=mysql_query("select * from hrm_emplyee_tds_incfromsalary where EmployeeID=".$id." AND Month=".$m." AND Period='".$PRD."'", $con);$RSal=mysql_fetch_assoc($SSal);
$IFSAmt=round($RSal['IncomeFromSal_Amt']); $IFSAmtTaxFree=round($RSal['IncomeFromSal_TaxFree']);
$AOI=mysql_query("select TotalAnyAmt from hrm_emplyee_tds_otherincome where EmployeeID=".$id." AND Period='".$PRD."'", $con); $RowAOI=mysql_num_rows($AOI);
if($RowAOI>0) { $ResAOI=mysql_fetch_assoc($AOI); $IFOSAmt=$ResAOI['TotalAnyAmt']; } else {$IFOSAmt=0;} $IFOSAmtTaxFree=0;
 
$max80c= $resStD['TDSMax80C'];
$SqlInv=mysql_query("select * from hrm_employee_investment_declaration where EmployeeID=".$id." AND Period='".$PRD."' AND FormSubmit='YY'", $con); 
$rowInv=mysql_num_rows($SqlInv); 
 if($rowInv>0)
 { $resInv=mysql_fetch_assoc($SqlInv); 
   $LessDed80c=$resInv['PenFun']+$resInv['LIP']+$resInv['DA']+$resInv['PPF']+$resInv['PostOff']+$resInv['ULIP']+$resInv['HL']+$resInv['MF']+$resInv['IB']+$resInv['CTF']+$resInv['NHB']+$resInv['NSC']+$resInv['EPF'];
   if($LessDed80c<=$max80c){$LessUnder80C=$LessDed80c;}else{$LessUnder80C=$max80c;}
   $DTC=($resInv['DTC']*$resInv['80G_Per'])/100;
   $LessUnderVI=$resInv['MIP']+$resInv['MTI']+$resInv['MTS']+$resInv['ROL']+$resInv['Handi']+$DTC+$resInv['DFS'];
   //$LessUnderVI=$resInv['MIP']+$resInv['MTI']+$resInv['MTS']+$resInv['ROL']+$resInv['Handi']+$resInv['DTC']+$resInv['DFS'];
   $TotalUnderDeductAmt=$LessUnder80C+$LessUnderVI;  $TotalDTaxFAmt=0;  
 }
 else { $TotalUnderDeductAmt=0; $TotalDTaxFAmt=0; }
 
 $TotSalOthInc=$IFSAmt+$IFOSAmt; 
 //$roundvar = ((int) round($b/10)) * 10;
 //$NetTxbleIncome=$TotSalOthInc-$TotalUnderDeductAmt;
 $TxtIncTValue=$TotSalOthInc-$TotalUnderDeductAmt;
 $NetTxbleIncome=((int) round($TxtIncTValue/10)) * 10;
 $NetTxbleFree=0;  //$NetTxbleFree=$IFSAmtTaxFree+$IFOSAmtTaxFree+$TotalDTaxFAmt;
if($NetTxbleIncome>200000) 
{
  $SEmp=mysql_query("select DOB,Gender,SeniorCitizen from hrm_employee_general INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$id, $con); $REmp=mysql_fetch_assoc($SEmp);
  $timestamp_start = strtotime($REmp['DOB']);  $timestamp_end = strtotime(date("Y-m-d")); $difference = abs($timestamp_end - $timestamp_start); 
  $days = floor($difference/(60*60*24)); $months = floor($difference/(60*60*24*30)); $years2 = $difference/(60*60*24*365); 
  $AgeMain=number_format($years2, 1); //echo $id.'-aa='.$REmp['DOB'].''.$REmp['Gender'].''.$REmp['SeniorCitizen'].''.'<br>';

  if($REmp['SeniorCitizen']=='N' AND $REmp['Gender']=='M')
  {  $LessValue=$NetTxbleIncome-200000;
     if($LessValue>0)
     { 
     if($LessValue>=1 AND $LessValue<=300000) {$Tax10=($LessValue*10)/100; $Tax20=0; $Tax30=0;}
     elseif($LessValue>=1 AND $LessValue<=800000) {$Tax10=30000; $ExtraT=$LessValue-300000; $Tax20=($ExtraT*20)/100; $Tax30=0;}
     elseif($LessValue>800000) {$Tax10=30000; $Tax20=100000; $ExtraT=$LessValue-800000; $Tax30=($ExtraT*30)/100;}  
     //echo '$id='.$id.' $NetTxbleIncome='.$NetTxbleIncome.' $LessValue='.$LessValue.' $Tax10='.$Tax10.' $Tax20='.$Tax20.' $Tax30='.$Tax30; echo '<br>';
     }
  }
  elseif($REmp['SeniorCitizen']=='N' AND $REmp['Gender']=='F')
  {  $LessValue=$NetTxbleIncome-200000;
     if($LessValue>0)
     {
     if($LessValue>=1 AND $LessValue<=300000) {$Tax10=($LessValue*10)/100; $Tax20=0; $Tax30=0;}
     elseif($LessValue>=1 AND $LessValue<=800000) {$Tax10=30000; $ExtraT=$LessValue-300000; $Tax20=($ExtraT*20)/100; $Tax30=0;}
     elseif($LessValue>800000) {$Tax10=30000; $Tax20=100000; $ExtraT=$LessValue-800000; $Tax30=($ExtraT*30)/100;}  
     }
  }
  elseif($REmp['SeniorCitizen']=='Y' AND $AgeMain<80)
  {  $LessValue=$NetTxbleIncome-250000;
     if($LessValue>0)
     {
     if($LessValue>=1 AND $LessValue<=250000) {$Tax10=($LessValue*10)/100; $Tax20=0; $Tax30=0; }
     elseif($LessValue>=1 AND $LessValue<=750000) {$Tax10=25000; $ExtraT=$LessValue-250000; $Tax20=($ExtraT*20)/100; $Tax30=0;}
     elseif($LessValue>750000) {$Tax10=25000; $Tax20=100000; $ExtraT=$LessValue-750000; $Tax30=($ExtraT*30)/100;} 
     }
  }
  elseif($REmp['SeniorCitizen']=='Y' AND $AgeMain>80)
  {  $LessValue=$NetTxbleIncome-500000;
     if($LessValue>0)
     {
     if($LessValue>=1 AND $LessValue<=500000) {$Tax10=0; $Tax20=($LessValue*20)/100; $Tax30=0; }
     elseif($LessValue>500000) {$Tax10=0; $Tax20=100000; $ExtraT=$LessValue-500000; $Tax30=($ExtraT*30)/100;} 
     }
  } 	
  $GrossTax=round($Tax10+$Tax20+$Tax30);  $GrossTaxFreeAmt=0;
  $RelifUs89=0;  $RelifUs89TaxFree=0;
  $EduCess=round(($GrossTax*3)/100); $EduCessTaxFree=0;
  if($NetTxbleIncome>$resStD['SurchargeTaxIncome']) {$Surcharge=round(($GrossTax*10)/100);} else{$Surcharge=0;} $SurchargeTaxFree=0;
  $Payable=$GrossTax+$RelifUs89+$EduCess+$Surcharge; 
  $PayableTaxFree=$GrossTaxFreeAmt+$RelifUs89TaxFree+$EduCessTaxFree+$SurchargeTaxFree;
  
}  
else { $GrossTax=0; $GrossTaxFreeAmt=0; $RelifUs89=0;  $RelifUs89TaxFree=0;  $EduCess=0; $EduCessTaxFree=0; 
       $Surcharge=0; $SurchargeTaxFree=0; $Payable=0; $PayableTaxFree=0;
	 }
//echo 'id='.$id.'$NetTxbleIncome='.$NetTxbleIncome.' $GrossTax='.$GrossTax.' <br><br>';

 

  if($resStD['Rebate']=='Y'){$RebateRs=$resStD['RebateRs86']+$resStD['RebateRs89']+$resStD['RebateRs90']+$resStD['RebateRs90A']+$resStD['RebateRs91'];} else {$RebateRs=0;}
  if($NetTxbleIncome<=$resStD['RebateRsIncomeUp'] AND $GrossTax>0){$RebatAmt=$RebateRs;} else {$RebatAmt=0;} $RebatTaxFreeAmt=0;
  $PayTax=$Payable-$RebatAmt; if($PayTax>0){$NTPayable=$PayTax;}else{$NTPayable=0;}
  //$NTPayable=$Payable-$RebatAmt; 
  $NTPayableTaxFree=$PayableTaxFree;
  $NTTdsDed=round($NTPayable/12); $NTBalanceTax=$NTPayable-$NTTdsDed;

$MainC=mysql_query("select * from hrm_emplyee_tds_maincompo where EmployeeID=".$id." AND Month=".$m." AND Period='".$PRD."'", $con); $RowMainC=mysql_num_rows($MainC);
if($RowMainC==0){$MnC=mysql_query("insert into hrm_emplyee_tds_maincompo(EmployeeID, Period, Month, YearId, IncFromSalary_Amt, IncFromSalary_TaxFree, IncFromOtherSource_Amt, IncFromOtherSource_TaxFree, DeductVIA_Amt, DeductVIA_TaxFree, NetTaxableIncome_Amt, NetTaxableIncome_TaxFree, GrossTax_Amt, GrossTax_TaxFree, Relif89_Amt, Relif89_TaxFree, EduCess_Amt, EduCess_TaxFree, SurCharge_Amt, SurCharge_TaxFree, Payble_Amt, Payble_TaxFree, Rebate_Amt, Rebate_TaxFree, NetTaxPayble_Amt, NetTaxPayble_TaxFree, TDSDeduction_Amt, Balance_TaxFree, Status, CreatedBy, CreatedDate) values(".$id.", '".$PRD."', ".$m.", ".$YearId.", '".$IFSAmt."', '".$IFSAmtTaxFree."', '".$IFOSAmt."', '".$IFOSAmtTaxFree."', '".$TotalUnderDeductAmt."', '".$TotalDTaxFAmt."', '".$NetTxbleIncome."', '".$NetTxbleFree."', '".$GrossTax."', '".$GrossTaxFreeAmt."', '".$RelifUs89."', '".$RelifUs89TaxFree."', '".$EduCess."', '".$EduCessTaxFree."', '".$Surcharge."', '".$SurchargeTaxFree."', '".$Payable."', '".$PayableTaxFree."', '".$RebatAmt."', '".$RebatTaxFreeAmt."', '".$NTPayable."', '".$NTPayableTaxFree."', '".$NTTdsDed."', '".$NTBalanceTax."', 'A', ".$UserId.", '".date("Y-m-d")."')", $con);}
if($RowMainC>0){$MnC=mysql_query("update hrm_emplyee_tds_maincompo set YearId=".$YearId.", IncFromSalary_Amt='".$IFSAmt."', IncFromSalary_TaxFree='".$IFSAmtTaxFree."', IncFromOtherSource_Amt='".$IFOSAmt."', IncFromOtherSource_TaxFree='".$IFOSAmtTaxFree."', DeductVIA_Amt='".$TotalUnderDeductAmt."', DeductVIA_TaxFree='".$TotalDTaxFAmt."', NetTaxableIncome_Amt='".$NetTxbleIncome."', NetTaxableIncome_TaxFree='".$NetTxbleFree."', GrossTax_Amt='".$GrossTax."', GrossTax_TaxFree='".$GrossTaxFreeAmt."', Relif89_Amt='".$RelifUs89."', Relif89_TaxFree='".$RelifUs89TaxFree."', EduCess_Amt='".$EduCess."', EduCess_TaxFree='".$EduCessTaxFree."', SurCharge_Amt='".$Surcharge."', SurCharge_TaxFree='".$SurchargeTaxFree."', Payble_Amt='".$Payable."', Payble_TaxFree='".$PayableTaxFree."', Rebate_Amt='".$RebatAmt."', Rebate_TaxFree='".$RebatTaxFreeAmt."', NetTaxPayble_Amt='".$NTPayable."', NetTaxPayble_TaxFree='".$NTPayableTaxFree."', TDSDeduction_Amt='".$NTTdsDed."', Balance_TaxFree='".$NTBalanceTax."', Status='A', CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."' where EmployeeID=".$id." AND Month=".$m." AND Period='".$PRD."'", $con);}

$sqlMP=mysql_query("select * from hrm_employee_monthlypayslip where EmployeeID=".$id." AND Month=".$m." AND Year=".$Y."", $con); $rowMP=mysql_num_rows($sqlMP);
if($rowMP>0){$FinalUp=mysql_query("update hrm_employee_monthlypayslip set TDS='".$NTTdsDed."' where EmployeeID=".$id." AND Month=".$m." AND Year=".$Y."", $con);}
else{$FinalUp=mysql_query("insert into hrm_employee_monthlypayslip(EmployeeID, Month, Year, TDS) values(".$id.", ".$m.", ".$Y.", '".$NTTdsDed."')", $con);}

//$sqlMP=mysql_query("select * from hrm_employee_monthlypayslip where EmployeeID=".$id." AND Month=".$m." AND Year=".$Y."", $con); $rowMP=mysql_num_rows($sqlMP);
//if($rowMP>0){$FinalUp=mysql_query("update hrm_employee_monthlypayslip set TDS='".$NTTdsDed."', DA='".$resDa[$SMAmtAmt]."', Arreares='".$resAr[$SMAmt]."', LeaveEncash='".$resLe[$SMAmt]."', Incentive='".$resIn[$SMAmt]."' where EmployeeID=".$id." AND Month=".$m." AND Year=".$Y."", $con);}
//else{$FinalUp=mysql_query("insert into hrm_employee_monthlypayslip(EmployeeID, Month, Year, TDS, DA, Arreares, LeaveEncash, Incentive) values(".$id.", ".$m.", ".$Y.", '".$NTTdsDed."', '".$resDa[$SMAmt]."', '".$resAr[$SMAmt]."', '".$resLe[$SMAmt]."', '".$resIn[$SMAmt]."')", $con);}
}	

if($FinalUp) { $msgTDS='Successfully process monthly TDS...';  } 
}
/********************************************************************** Close TDS ************************************************************************/

if($_REQUEST['action']=='LeaveMonth' && $_REQUEST['v']!='')
{

    if(date("m")==01){ if($_REQUEST['v']==12){$Y=date("Y")-1;}else{$Y=date("Y");} }
    if(date("m")!=01){ $Y=date("Y");}
	if($_REQUEST['v']==1){$NM=2; $NY=$Y;}if($_REQUEST['v']==2){$NM=3; $NY=$Y;}if($_REQUEST['v']==3){$NM=4; $NY=$Y;}if($_REQUEST['v']==4){$NM=5; $NY=$Y;}
	if($_REQUEST['v']==5){$NM=6; $NY=$Y;}if($_REQUEST['v']==6){$NM=7; $NY=$Y;}if($_REQUEST['v']==7){$NM=8; $NY=$Y;}if($_REQUEST['v']==8){$NM=9; $NY=$Y;}
	if($_REQUEST['v']==9){$NM=10; $NY=$Y;}if($_REQUEST['v']==10){$NM=11; $NY=$Y;}if($_REQUEST['v']==11){$NM=12; $NY=$Y;}if($_REQUEST['v']==12){$NM=1; $NY=$Y+1;}
	$sqlE=mysql_query("select EmployeeID from hrm_employee where CompanyId=".$CompanyId." AND EmpStatus='A'", $con);
    //$sqlE=mysql_query("select EmployeeID from hrm_employee where EmployeeID=211 AND CompanyId=".$CompanyId." AND EmpStatus!='De'", $con); 
  //$sqlE=mysql_query("select hrm_employee.* from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=11", $con); 
  while($resE=mysql_fetch_assoc($sqlE))
  { $m=$_REQUEST['v']; $id=$resE['EmployeeID']; 
    //echo "select * from hrm_employee_monthlyleave_balance where Year=".$Y." AND EmployeeID=".$id." AND Month=".$m."<br><br>";
    $sqlME=mysql_query("select * from hrm_employee_monthlyleave_balance where Year=".$Y." AND EmployeeID=".$id." AND Month=".$m."", $con); 
	$rowME=mysql_num_rows($sqlME); 
	if($rowME>0) 
	{ 
	  $resME=mysql_fetch_assoc($sqlME);
	  //echo "select * from hrm_employee_monthlyleave_balance where EmployeeID=".$id." AND Month=".$NM." AND Year=".$NY."<br><br>";
	  $sqlME2=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$id." AND Month=".$NM." AND Year=".$NY."", $con); $rowME2=mysql_num_rows($sqlME2);
	  //echo $rowME2."<br>";
	  if($rowME2>0)
	  { $sqlUp=mysql_query("update hrm_employee_monthlyleave_balance set OpeningPL=".$resME['BalancePL'].", BalancePL=".$resME['BalancePL']." where EmployeeID=".$id." AND Month=".$NM." AND Year=".$NY, $con);}
	}
	
	//Att Process //
if($NM==1 OR $NM==3 OR $NM==5 OR $NM==7 OR $NM==8 OR $NM==10 OR $NM==12){ $day=31; } 
elseif($NM==4 OR $NM==6 OR $NM==9 OR $NM==11){ $day=30; }
elseif($NM==2){ if($NY==2012 OR $NY==2016 OR $NY==2020 OR $NY==2024 OR $NY==2028 OR $NY==2032 OR $NY==2036 OR $NY==2040){$day=29;}else{$day=28;} }
 
$SqlPH=mysql_query("select count(AttValue)as PH from hrm_employee_attendance where AttValue='PH' AND EmployeeID=".$id." AND (AttDate between '".date($NY."-".$NM."-1")."' AND '".date($NY."-".$NM."-".$day)."')", $con); $SqlPL=mysql_query("select count(AttValue)as PL from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$id." AND (AttDate between '".date($NY."-".$NM."-1")."' AND '".date($NY."-".$NM."-".$day)."')", $con); $ResPH=mysql_fetch_array($SqlPH);
 
   $CountPH=$ResPH['PH']/2; $TotalPL=$ResPL['PL']+$CountPH; 
 /******************** hrm_employee_monthlyleave_balance open*****************************/
	  $SL=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$id." AND Month='".$NM."' AND Year='".$NY."'", $con);  
	  $RowL=mysql_num_rows($SL);
	  if($RowL>0) { $RL=mysql_fetch_assoc($SL); 
	  if($m!=1) { $TotBalPL=$RL['OpeningPL']-$TotalPL; } 
	  if($m==1) { $TotBalPL=$RL['OpeningPL']-$TotalPL; } 			  
				     
	  $sUpL=mysql_query("UPDATE hrm_employee_monthlyleave_balance set AvailedPL='".$TotalPL."' BalancePL='".$TotBalPL."' where EmployeeID=".$id." AND Month='".$NM."' AND Year='".$NY."'", $con); }
	/************************** hrm_employee_monthlyleave_balance close *************************/
   
    /********************************************** hrm_employee_monthatt ******************/  
   $SqlMonthLeave=mysql_query("select * from hrm_employee_monthatt where EmployeeID=".$id." AND Month=".$NM." AND Year='".$NY."'", $con); $RowMonthLeave=mysql_num_rows($SqlMonthLeave);
   if($RowMonthLeave>0){ $InsUpMonth=mysql_query("UPDATE hrm_employee_monthatt SET MonthAtt_TotPL='".$TotalPL."' where EmployeeID=".$id." AND Month=".$NM." AND Year='".$NY."'", $con); }
   
   
  }
  if($InsUpMonth){$msgLeave="Successfully process monthly leave."; }
// Att Process // 

}

/*********************** Insert AttReports Open *****************************************/
if($_REQUEST['action']=='AttMonth' && $_REQUEST['v']!='')
{ if(date("m")==01){ if($_REQUEST['v']==12){$Y=date("Y")-1;}else{$Y=date("Y");} }
  if(date("m")!=01){ $Y=date("Y");}
  $sqlE=mysql_query("select EmployeeID from hrm_employee where CompanyId=".$CompanyId." AND EmpStatus!='De'", $con); 
  while($resE=mysql_fetch_assoc($sqlE))
  { $m=$_REQUEST['v'];  
    for($i=1; $i<=31; $i++)
    { $sAtt=mysql_query("select AttValue from hrm_employee_attendance where EmployeeID=".$resE['EmployeeID']." AND AttDate='".date($Y.'-'.$m.'-'.$i)."'", $con); 
      $rowAtt=mysql_num_rows($sAtt); //echo '$rowAtt='.$rowAtt;
      if($rowAtt>0)
      { $resAtt=mysql_fetch_assoc($sAtt); $sIAtt=mysql_query("select * from hrm_employee_attreport where EmployeeID=".$resE['EmployeeID']." AND Month=".$m." AND Year=".$Y, $con); 
        $rowIAtt=mysql_num_rows($sIAtt);
        if($rowIAtt>0)
	    { $sUAtt=mysql_query("update hrm_employee_attreport set A".$i."='".$resAtt['AttValue']."' where EmployeeID=".$resE['EmployeeID']." AND Month=".$m." AND Year=".$Y, $con); }
        else
	    { $sUAtt=mysql_query("insert into hrm_employee_attreport(EmployeeID, Month, Year, A".$i.", YearId) values(".$resE['EmployeeID'].", ".$m.", ".$Y.", '".$resAtt['AttValue']."', ".$YearId.")", $con);	}
      } 
      else
      { $AttUpV=mysql_query("update hrm_employee_attreport set A".$i."='' where EmployeeID=".$resE['EmployeeID']." AND Month=".$m." AND Year=".$Y, $con); } 
    }
  }	
  if($sUAtt){$msgAtt="Successfully process attendance."; }
}
/*********************** Insert AttReports Close *****************************************/ 

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
<style> .font { color:#ffffff; font-family:Times New Roman; font-size:15px; width:200px;} .font1 { font-family:Times New Roman; font-size:12px; height:14px; width:200px; } 
.font2 { font-size:12px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; height:18px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/MandatoryAjaxCall.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script>
function MonthUpAtt(v)
{ if(v!=''){document.getElementById("BtnsubUpAtt").disabled=false; var x = "MonthlyProcess.php?act=SelUpAttMonth&v="+v;   window.location=x;} 
  if(v==''){document.getElementById("BtnsubUpAtt").disabled=true; var x = "MonthlyProcess.php?act=SelUpAttMonth&v="+v; window.location=x;} 
}
function SelMonthUpAtt() 
{ var value=document.getElementById("CMonthUpAtt").value;  
  if(value==1){var m='January';}if(value==2){var m='February';}if(value==3){var m='March';}if(value==4){var m='April';}if(value==5){var m='May';}
  if(value==6){var m='June';}if(value==7){var m='July';}if(value==8){var m='August';}if(value==9){var m='September';}if(value==10){var m='October';}
  if(value==11){var m='November';}if(value==12){var m='December';}

  var agree1=confirm("Are you sure you want to process monthly attendance upadte for the month "+m+"?");
  if(agree1)
  { var agree2=confirm("aa");
    if(agree2)
	{ var agree3=confirm("bb");
	  if(agree3)
	  { var x = "MonthlyProcess.php?action=UpAttMonth&v="+value;  window.location=x; }
	}
  }
}

function MonthPay(v)
{ if(v!=''){document.getElementById("BtnsubPay").disabled=false; var x = "MonthlyProcess.php?act=SelMonth&v="+v;   window.location=x;} 
  if(v==''){document.getElementById("BtnsubPay").disabled=true; var x = "MonthlyProcess.php?act=SelMonth&v="+v; window.location=x;} 
}
function SelMonthPay() 
{ var value=document.getElementById("CMonthPay").value;  
  if(value==1){var m='January';}if(value==2){var m='February';}if(value==3){var m='March';}if(value==4){var m='April';}if(value==5){var m='May';}
  if(value==6){var m='June';}if(value==7){var m='July';}if(value==8){var m='August';}if(value==9){var m='September';}if(value==10){var m='October';}
  if(value==11){var m='November';}if(value==12){var m='December';}

  var agree1=confirm("Are you sure you want to process monthly pay for the month "+m+"?");
  if(agree1)
  { var agree2=confirm("aa");
    if(agree2)
	{ var agree3=confirm("bb");
	  if(agree3)
	  { var x = "MonthlyProcess.php?action=PayMonth&v="+value;  window.location=x; }
	}
  }
}

/*
function MonthTDS(v)
{ if(v!=''){document.getElementById("BtnsubTDS").disabled=false; var x = "MonthlyProcess.php?act=SelMonthTDS&v="+v; window.location=x;} 
  if(v==''){document.getElementById("BtnsubTDS").disabled=true; var x = "MonthlyProcess.php?act=SelMonthTDS&v="+v; window.location=x;} 
}


function SelMonthTDS() 
{ var value=document.getElementById("CMonthTDS").value;  
  if(value==1){var m='January';}if(value==2){var m='February';}if(value==3){var m='March';}if(value==4){var m='April';}if(value==5){var m='May';}
  if(value==6){var m='June';}if(value==7){var m='July';}if(value==8){var m='August';}if(value==9){var m='September';}if(value==10){var m='October';}
  if(value==11){var m='November';}if(value==12){var m='December';}

  var agree1=confirm("Are you sure you want to process monthly TDS for the month "+m+"?");
  if(agree1)
  { var agree2=confirm("aa");
    if(agree2)
	{ var agree3=confirm("bb");
	  if(agree3)
	  { var x = "MonthlyProcess.php?action=TDSMonth&v="+value;  window.location=x; }
	}
  }
}

*/

function MonthLeave(v)
{ if(v!=''){document.getElementById("BtnsubLeave").disabled=false; var x = "MonthlyProcess.php?act=SelMonthLeave&v="+v; window.location=x;} 
  if(v==''){document.getElementById("BtnsubLeave").disabled=true; var x = "MonthlyProcess.php?act=SelMonthLeave&v="+v; window.location=x;} 
}
function SelMonthLeave() 
{ var value=document.getElementById("CMonthLeave").value;  
  if(value==1){var m='January';}if(value==2){var m='February';}if(value==3){var m='March';}if(value==4){var m='April';}if(value==5){var m='May';}
  if(value==6){var m='June';}if(value==7){var m='July';}if(value==8){var m='August';}if(value==9){var m='September';}if(value==10){var m='October';}
  if(value==11){var m='November';}if(value==12){var m='December';}

  var agree1=confirm("Are you sure you want to process monthly leave for the month "+m+"?");
  if(agree1)
  { var agree2=confirm("aa");
    if(agree2)
	{ var agree3=confirm("bb");
	  if(agree3)
	  { var x = "MonthlyProcess.php?action=LeaveMonth&v="+value;  window.location=x; }
	}
  }
}

function MonthAtt(v)
{ if(v!=''){document.getElementById("BtnsubAtt").disabled=false; var x = "MonthlyProcess.php?act=SelMonthAtt&v="+v; window.location=x;} 
  if(v==''){document.getElementById("BtnsubAtt").disabled=true; var x = "MonthlyProcess.php?act=SelMonthAtt&v="+v; window.location=x;} 
}
function SelMonthAtt() 
{ var value=document.getElementById("CMonthAtt").value;  
  if(value==1){var m='January';}if(value==2){var m='February';}if(value==3){var m='March';}if(value==4){var m='April';}if(value==5){var m='May';}
  if(value==6){var m='June';}if(value==7){var m='July';}if(value==8){var m='August';}if(value==9){var m='September';}if(value==10){var m='October';}
  if(value==11){var m='November';}if(value==12){var m='December';}

  var agree1=confirm("Are you sure you want to process Attendance for the month "+m+"?");
  if(agree1)
  { var agree2=confirm("aa");
    if(agree2)
	{ var agree3=confirm("bb");
	  if(agree3)
	  { var x = "MonthlyProcess.php?action=AttMonth&v="+value;  window.location=x; }
	}
  }
}

//if (agree) { var x = "Close.php?action=edit&eid="+value;  window.location=x;}
</SCRIPT> 
</head>
<body class="body">
<table class="table">
<tr>
 <td><?php  //$b=111111443; $roundvar = ((int) round($b/10)) * 10; echo 'aa='.$roundvar; ?>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
<?php 
      if(date("m")==1){$OneDM=12; $OneTM='December'; $TwoDM=01; $TwoTM='January';} if(date("m")==2){$OneDM=01; $OneTM='January'; $TwoDM=02; $TwoTM='February';}  
      if(date("m")==3){$OneDM=02; $OneTM='February'; $TwoDM=03; $TwoTM='March';}   if(date("m")==4){$OneDM=03; $OneTM='March'; $TwoDM=04; $TwoTM='April';}
      if(date("m")==5){$OneDM=04; $OneTM='April'; $TwoDM=05; $TwoTM='May';}        if(date("m")==6){$OneDM=05; $OneTM='May'; $TwoDM=06; $TwoTM='June';}
      if(date("m")==7){$OneDM=06; $OneTM='June'; $TwoDM=07; $TwoTM='July';}        if(date("m")==8){$OneDM=07; $OneTM='July'; $TwoDM=08; $TwoTM='August';}
      if(date("m")==9){$OneDM=08; $OneTM='August'; $TwoDM=09; $TwoTM='September';} if(date("m")==10){$OneDM=09; $OneTM='September'; $TwoDM=10; $TwoTM='October';}
      if(date("m")==11){$OneDM=10; $OneTM='October'; $TwoDM=11; $TwoTM='November';}if(date("m")==12){$OneDM=11; $OneTM='November'; $TwoDM=12; $TwoTM='December';}
	  
	  //$sqlCMOne=mysql_query("select * from hrm_closemonth where Month=".$OneDM." AND Year=".date("Y")."", $con); $rowCMOne=mysql_num_rows($sqlCMOne);
	  //$sqlCMTwo=mysql_query("select * from hrm_closemonth where Month=".$TwoDM." AND Year=".date("Y")."", $con); $rowCMTwo=mysql_num_rows($sqlCMTwo);
?>
<?php 

     if($_REQUEST['act']=='SelUpAttMonth') 
     {if($_REQUEST['v']==1){$SelM='January';} if($_REQUEST['v']==2){$SelM='February';} if($_REQUEST['v']==3){$SelM='March';} 
      if($_REQUEST['v']==4){$SelM='April';} if($_REQUEST['v']==5){$SelM='May';} if($_REQUEST['v']==6){$SelM='June';} 
	  if($_REQUEST['v']==7){$SelM='July';} if($_REQUEST['v']==8){$SelM='August';} if($_REQUEST['v']==9){$SelM='September';} 
	  if($_REQUEST['v']==10){$SelM='October';} if($_REQUEST['v']==11){$SelM='November';} if($_REQUEST['v']==12){$SelM='December';}
	 }  

     if($_REQUEST['act']=='SelMonth') 
     {if($_REQUEST['v']==1){$SelM='January';} if($_REQUEST['v']==2){$SelM='February';} if($_REQUEST['v']==3){$SelM='March';} 
      if($_REQUEST['v']==4){$SelM='April';} if($_REQUEST['v']==5){$SelM='May';} if($_REQUEST['v']==6){$SelM='June';} 
	  if($_REQUEST['v']==7){$SelM='July';} if($_REQUEST['v']==8){$SelM='August';} if($_REQUEST['v']==9){$SelM='September';} 
	  if($_REQUEST['v']==10){$SelM='October';} if($_REQUEST['v']==11){$SelM='November';} if($_REQUEST['v']==12){$SelM='December';}
	 } 
	 if($_REQUEST['act']=='SelMonthTDS') 
     {if($_REQUEST['v']==1){$SelM='January';} if($_REQUEST['v']==2){$SelM='February';} if($_REQUEST['v']==3){$SelM='March';} 
      if($_REQUEST['v']==4){$SelM='April';} if($_REQUEST['v']==5){$SelM='May';} if($_REQUEST['v']==6){$SelM='June';} 
	  if($_REQUEST['v']==7){$SelM='July';} if($_REQUEST['v']==8){$SelM='August';} if($_REQUEST['v']==9){$SelM='September';} 
	  if($_REQUEST['v']==10){$SelM='October';} if($_REQUEST['v']==11){$SelM='November';} if($_REQUEST['v']==12){$SelM='December';}
	 } 
	  if($_REQUEST['act']=='SelMonthLeave') 
     {if($_REQUEST['v']==1){$SelM='January';} if($_REQUEST['v']==2){$SelM='February';} if($_REQUEST['v']==3){$SelM='March';} 
      if($_REQUEST['v']==4){$SelM='April';} if($_REQUEST['v']==5){$SelM='May';} if($_REQUEST['v']==6){$SelM='June';} 
	  if($_REQUEST['v']==7){$SelM='July';} if($_REQUEST['v']==8){$SelM='August';} if($_REQUEST['v']==9){$SelM='September';} 
	  if($_REQUEST['v']==10){$SelM='October';} if($_REQUEST['v']==11){$SelM='November';} if($_REQUEST['v']==12){$SelM='December';}
	 }  
	 if($_REQUEST['act']=='SelMonthAtt') 
     {if($_REQUEST['v']==1){$SelM='January';} if($_REQUEST['v']==2){$SelM='February';} if($_REQUEST['v']==3){$SelM='March';} 
      if($_REQUEST['v']==4){$SelM='April';} if($_REQUEST['v']==5){$SelM='May';} if($_REQUEST['v']==6){$SelM='June';} 
	  if($_REQUEST['v']==7){$SelM='July';} if($_REQUEST['v']==8){$SelM='August';} if($_REQUEST['v']==9){$SelM='September';} 
	  if($_REQUEST['v']==10){$SelM='October';} if($_REQUEST['v']==11){$SelM='November';} if($_REQUEST['v']==12){$SelM='December';}
	 } 
?>	
						  
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
        <tr>
	  <td align="" width="210" style="font-family:Times New Roman;font-size:16px;color:#452969;font-weight:bold;">&nbsp;&nbsp;&nbsp;(1) <u>Attendance</u> :&nbsp;</td>
	  <td align="" style="font-family:Times New Roman; font-size:14px; color:#008000;" ><b>&nbsp;Select Month :</b></td>
	  <td align="left"><select style="font-family:Times New Roman;font-size:14px; width:100px; height:22px; font-weight:bold;" id="CMonthAtt" onChange="MonthAtt(this.value)">
	  <?php if($_REQUEST['act']=='SelMonthAtt') { ?><option value="<?php echo $_REQUEST['v']; ?>"><?php echo $SelM; ?></option><?php } ?>
<option value="">Select</option>
<?php if(date("m")==1 OR date("m")==2 OR $CompanyId==3){ ?><option value="1" style="color:#008000;">January</option><?php } ?>
<?php if(date("m")==2 OR date("m")==3){ ?><option value="2" style="color:#008000;">February</option><?php } ?>
<?php if(date("m")==3 OR date("m")==4){ ?><option value="3" style="color:#008000;">March</option><?php } ?>
<?php if(date("m")==4 OR date("m")==5){ ?><option value="4" style="color:#008000;">April</option><?php } ?>
<?php if(date("m")==5 OR date("m")==6){ ?><option value="5" style="color:#008000;">May</option><?php } ?>
<?php if(date("m")==6 OR date("m")==7){ ?><option value="6" style="color:#008000;">June</option><?php } ?>
<?php if(date("m")==7 OR date("m")==8){ ?><option value="7" style="color:#008000;">July</option><?php } ?>
<?php if(date("m")==8 OR date("m")==9){ ?><option value="8" style="color:#008000;">August</option><?php } ?>
<?php if(date("m")==9 OR date("m")==10){ ?><option value="9" style="color:#008000;">September</option><?php } ?>
<?php if(date("m")==10 OR date("m")==11){ ?><option value="10" style="color:#008000;">October</option><?php } ?>
<?php if(date("m")==11 OR date("m")==12){ ?><option value="11" style="color:#008000;">November</option><?php } ?>
<?php if(date("m")==12 OR date("m")==1){ ?><option value="12" style="color:#008000;">December</option><?php } ?>
	   </select></td>
	  <td style="font-family:Times New Roman; font-size:14px; color:#4A0000; font-weight:bold;">
<?php if($_SESSION['User_Permission']=='Edit'){?>
	  <input type="button" id="BtnsubAtt" value="submit" onClick="SelMonthAtt()" <?php if($_REQUEST['act']=='SelMonthAtt' AND $_REQUEST['v']!=''){ echo '';} else {echo 'disabled';} ?> style="width:80px; "/>&nbsp;&nbsp;&nbsp;<?php echo $msgAtt; ?>
<?php } ?>
</td>
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
	</tr>



        <tr>
	  <td align="" width="210" style="font-family:Times New Roman;font-size:16px;color:#452969;font-weight:bold;">&nbsp;&nbsp;&nbsp;(2) <u>Update Attendance</u> :&nbsp;</td>
	  <td align="" style="font-family:Times New Roman; font-size:14px; color:#008000;" ><b>&nbsp;Select Month :</b></td>
	  <td align="left"><select style="font-family:Times New Roman;font-size:14px; width:100px; height:22px; font-weight:bold;" id="CMonthUpAtt" onChange="MonthUpAtt(this.value)">
	  <?php if($_REQUEST['act']=='SelUpAttMonth') { ?><option value="<?php echo $_REQUEST['v']; ?>"><?php echo $SelM; ?></option><?php } ?>
<option value="">Select</option>
<?php //if(date("m")==1 OR date("m")==2){ ?><option value="1" style="color:#008000;">January</option><?php //} ?>
<?php //if(date("m")==2 OR date("m")==3){ ?><option value="2" style="color:#008000;">February</option><?php //} ?>
<?php //if(date("m")==3 OR date("m")==4){ ?><option value="3" style="color:#008000;">March</option><?php //} ?>
<?php //if(date("m")==4 OR date("m")==5){ ?><option value="4" style="color:#008000;">April</option><?php //} ?>
<?php //if(date("m")==5 OR date("m")==6){ ?><option value="5" style="color:#008000;">May</option><?php //} ?>
<?php //if(date("m")==6 OR date("m")==7){ ?><option value="6" style="color:#008000;">June</option><?php //} ?>
<?php //if(date("m")==7 OR date("m")==8){ ?><option value="7" style="color:#008000;">July</option><?php //} ?>
<?php //if(date("m")==8 OR date("m")==9){ ?><option value="8" style="color:#008000;">August</option><?php //} ?>
<?php //if(date("m")==9 OR date("m")==10){ ?><option value="9" style="color:#008000;">September</option><?php //} ?>
<?php //if(date("m")==10 OR date("m")==11){ ?><option value="10" style="color:#008000;">October</option><?php //} ?>
<?php if(date("m")==11 OR date("m")==12){ ?><option value="11" style="color:#008000;">November</option><?php } ?>
<?php if(date("m")==12 OR date("m")==1){ ?><option value="12" style="color:#008000;">December</option><?php } ?>
	   </select></td>
	  <td style="font-family:Times New Roman; font-size:14px; color:#4A0000; font-weight:bold;">
<?php if($_SESSION['User_Permission']=='Edit'){?>
	  <input type="button" id="BtnsubUpAtt" value="submit" onClick="SelMonthUpAtt()" <?php if($_REQUEST['act']=='SelUpAttMonth' AND $_REQUEST['v']!=''){ echo '';} else {echo 'disabled';} ?> style="width:80px; "/>&nbsp;&nbsp;&nbsp;<?php echo $msgUpAtt; ?>
<?php } ?>
</td>
	</tr>

<?php /*
	 <tr>
	  <td align="" width="210" style="font-family:Times New Roman;font-size:16px;color:#452969;font-weight:bold;">&nbsp;&nbsp;&nbsp;(4) <u>Monthly TDS</u> :&nbsp;</td>
	  <td align="" style="font-family:Times New Roman; font-size:14px; color:#008000;" ><b>&nbsp;Select Month :</b></td>
	  <td align="left"><select style="font-family:Times New Roman;font-size:14px; width:100px; height:22px; font-weight:bold;" id="CMonthTDS" onChange="MonthTDS(this.value)">
	  <?php if($_REQUEST['act']=='SelMonthTDS') { ?><option value="<?php echo $_REQUEST['v']; ?>"><?php echo $SelM; ?></option><?php } ?>
<option value="">Select</option>
<?php if(date("m")==1 OR date("m")==2){ ?><option value="1" style="color:#008000;">January</option><?php } ?>
<?php if(date("m")==2 OR date("m")==3){ ?><option value="2" style="color:#008000;">February</option><?php } ?>
<?php if(date("m")==3 OR date("m")==4){ ?><option value="3" style="color:#008000;">March</option><?php } ?>
<?php if(date("m")==4 OR date("m")==5){ ?><option value="4" style="color:#008000;">April</option><?php } ?>
<?php if(date("m")==5 OR date("m")==6){ ?><option value="5" style="color:#008000;">May</option><?php } ?>
<?php if(date("m")==6 OR date("m")==7){ ?><option value="6" style="color:#008000;">June</option><?php } ?>
<?php if(date("m")==7 OR date("m")==8){ ?><option value="7" style="color:#008000;">July</option><?php } ?>
<?php if(date("m")==8 OR date("m")==9){ ?><option value="8" style="color:#008000;">August</option><?php } ?>
<?php if(date("m")==9 OR date("m")==10){ ?><option value="9" style="color:#008000;">September</option><?php } ?>
<?php if(date("m")==10 OR date("m")==11){ ?><option value="10" style="color:#008000;">October</option><?php } ?>
<?php if(date("m")==11 OR date("m")==12){ ?><option value="11" style="color:#008000;">November</option><?php } ?>
<?php if(date("m")==12 OR date("m")==1){ ?><option value="12" style="color:#008000;">December</option><?php } ?>	 
	   </select></td>
	  <td style="font-family:Times New Roman; font-size:14px; color:#4A0000; font-weight:bold;">
<?php if($_SESSION['User_Permission']=='Edit'){?>
	  <input type="button" id="BtnsubTDS" value="submit" onClick="SelMonthTDS()" <?php if($_REQUEST['act']=='SelMonthTDS' AND $_REQUEST['v']!=''){ echo '';} else {echo 'disabled';} ?> style="width:80px; " disabled/>&nbsp;&nbsp;&nbsp;<?php echo $msgTDS; ?>
<?php } ?>
</td>
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
	</tr>
    <tr> 
*/ ?>

	  <td align="" width="210" style="font-family:Times New Roman;font-size:16px;color:#452969;font-weight:bold;">&nbsp;&nbsp;&nbsp;(3) <u>Monthly Leave</u> :&nbsp;</td>
	  <td align="" style="font-family:Times New Roman; font-size:14px; color:#008000;" ><b>&nbsp;Select Month :</b></td>
	  <td align="left"><select style="font-family:Times New Roman;font-size:14px; width:100px; height:22px; font-weight:bold;" id="CMonthLeave" onChange="MonthLeave(this.value)">
	  <?php if($_REQUEST['act']=='SelMonthLeave') { ?><option value="<?php echo $_REQUEST['v']; ?>"><?php echo $SelM; ?></option><?php } ?>
<option value="">Select</option>
<?php //if(date("m")==1 OR date("m")==2){ ?><option value="1" style="color:#008000;">January</option><?php //} ?>
<?php //if(date("m")==2 OR date("m")==3){ ?><option value="2" style="color:#008000;">February</option><?php //} ?>
<?php //if(date("m")==3 OR date("m")==4){ ?><option value="3" style="color:#008000;">March</option><?php //} ?>
<?php //if(date("m")==4 OR date("m")==5){ ?><option value="4" style="color:#008000;">April</option><?php //} ?>
<?php //if(date("m")==5 OR date("m")==6){ ?><option value="5" style="color:#008000;">May</option><?php //} ?>
<?php //if(date("m")==6 OR date("m")==7){ ?><option value="6" style="color:#008000;">June</option><?php //} ?>
<?php //if(date("m")==7 OR date("m")==8){ ?><option value="7" style="color:#008000;">July</option><?php //} ?>
<?php //if(date("m")==8 OR date("m")==9){ ?><option value="8" style="color:#008000;">August</option><?php //} ?>
<?php //if(date("m")==9 OR date("m")==10){ ?><option value="9" style="color:#008000;">September</option><?php //} ?>
<?php //if(date("m")==10 OR date("m")==11){ ?><option value="10" style="color:#008000;">October</option><?php //} ?>
<?php if(date("m")==11 OR date("m")==12){ ?><option value="11" style="color:#008000;">November</option><?php } ?>
<?php if(date("m")==12 OR date("m")==1){ ?><option value="12" style="color:#008000;">December</option><?php } ?>	   
	   </select></td>
	  <td style="font-family:Times New Roman; font-size:14px; color:#4A0000; font-weight:bold;">
<?php if($_SESSION['User_Permission']=='Edit'){?>
	  <input type="button" id="BtnsubLeave" value="submit" onClick="SelMonthLeave()" <?php if($_REQUEST['act']=='SelMonthLeave' AND $_REQUEST['v']!=''){ echo '';} else {echo 'disabled';} ?> style="width:80px; "/>&nbsp;&nbsp;&nbsp;<?php echo $msgLeave; ?>
<?php } ?>
</td>
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
	</tr>



	<tr>
	  <td align="" width="210" style="font-family:Times New Roman;font-size:16px;color:#452969;font-weight:bold;">&nbsp;&nbsp;&nbsp;(4) <u>Monthly Pay</u> :&nbsp;</td>
	  <td align="" style="font-family:Times New Roman; font-size:14px; color:#008000;" ><b>&nbsp;Select Month :</b></td>
	  <td align="left"><select style="font-family:Times New Roman;font-size:14px; width:100px; height:22px; font-weight:bold;" id="CMonthPay" onChange="MonthPay(this.value)">
	  <?php if($_REQUEST['act']=='SelMonth') { ?><option value="<?php echo $_REQUEST['v']; ?>"><?php echo $SelM; ?></option><?php } ?>
<option value="">Select</option>
<?php if(date("m")==1 OR date("m")==2){ ?><option value="1" style="color:#008000;">January</option><?php } ?>
<?php if(date("m")==2 OR date("m")==3){ ?><option value="2" style="color:#008000;">February</option><?php } ?>
<?php if(date("m")==3 OR date("m")==4){ ?><option value="3" style="color:#008000;">March</option><?php } ?>
<?php if(date("m")==4 OR date("m")==5){ ?><option value="4" style="color:#008000;">April</option><?php } ?>
<?php if(date("m")==5 OR date("m")==6){ ?><option value="5" style="color:#008000;">May</option><?php } ?>
<?php if(date("m")==6 OR date("m")==7){ ?><option value="6" style="color:#008000;">June</option><?php } ?>
<?php if(date("m")==7 OR date("m")==8){ ?><option value="7" style="color:#008000;">July</option><?php } ?>
<?php if(date("m")==8 OR date("m")==9){ ?><option value="8" style="color:#008000;">August</option><?php } ?>
<?php if(date("m")==9 OR date("m")==10){ ?><option value="9" style="color:#008000;">September</option><?php } ?>
<?php if(date("m")==10 OR date("m")==11){ ?><option value="10" style="color:#008000;">October</option><?php } ?>
<?php if(date("m")==11 OR date("m")==12){ ?><option value="11" style="color:#008000;">November</option><?php } ?>
<?php if(date("m")==12 OR date("m")==1){ ?><option value="12" style="color:#008000;">December</option><?php } ?>
	   </select></td>
	  <td style="font-family:Times New Roman; font-size:14px; color:#4A0000; font-weight:bold;">
<?php if($_SESSION['User_Permission']=='Edit'){?>
	  <input type="button" id="BtnsubPay" value="submit" onClick="SelMonthPay()" <?php if($_REQUEST['act']=='SelMonth' AND $_REQUEST['v']!=''){ echo '';} else {echo 'disabled';} ?> style="width:80px; "/>&nbsp;&nbsp;&nbsp;<?php echo $msgPay; ?>
<?php } ?>
</td>
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
	</tr>
<?php if($_SESSION['User_Permission']=='Edit'){?>
<script>
function FunArrCal(c,y,m1,m2,m3,y1,y2,y3,uid){window.open("ArrCal.php?act=cal&c="+c+"&y="+y+"&m1="+m1+"&m2="+m2+"&m3="+m3+"&y1="+y1+"&y2="+y2+"&y3="+y3+"&chk=0&uid="+uid+"&dept=0&v1=1&v2=0","CF","menubar=no,scrollbars=yes,resizable=no,directories=no,width=1000,height=600"); }
</script>
	<tr>
	  <td align="" width="210" style="font-family:Times New Roman;font-size:16px;color:#452969;font-weight:bold;">&nbsp;&nbsp;&nbsp;(5) <span style="cursor:pointer" onClick="FunArrCal(<?php echo $CompanyId.','.$YearId.','.date("m").','.date("m").','.date("m").','.date("Y").','.date("Y").','.date("Y").','.$UserId; ?>)"><u>Arrear Calculation</u></span>&nbsp;</td>
	</tr>
<?php } ?>	
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true) { ?>	
 <tr>
<?php //*********************************************** Open Month******************************************************?> 
 <td width="10">&nbsp;</td>
<?php //*********************************************** Close Month******************************************************?>    
 </tr>
<?php } ?> 
</table>
		
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************END*****END*****END******END******END***************************************************************?>
<?php //************************************************************************************************************************************************************?>
		
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
