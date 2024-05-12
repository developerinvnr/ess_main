<?php require_once('../AdminUser/config/config.php'); 
if(isset($_POST['ProGSPM']) && $_POST['ProGSPM']!=""){
$Extra3Month=$_POST['Extra3Month']; 

$sqlUp=mysql_query("update hrm_employee_pms set HodSubmit_IncStatus=1, HodSubmit_IncDate='".date("Y-m-d")."', Hod_ProIncSalary=".$_POST['ProGSPM'].", Hod_Percent_ProIncSalary=".$_POST['Per_ProGSPM'].", Hod_ProCorrSalary='".$_POST['ProSC']."', Hod_Percent_ProCorrSalary=".$_POST['Per_ProSC'].", Hod_IncNetMonthalySalary=".$_POST['IncSalaryPM'].", Hod_Percent_IncNetMonthalySalary=".$_POST['Per_TotalProGSPM'].", Hod_Proposed_ActualPercent=".$_POST['ActualPer'].", Hod_GrossMonthlySalary=".$_POST['TotalProGSPM'].", Hod_GrossAnnualSalary=".$_POST['TotalAnnualSalary'].",  Hod_Incentive=".$_POST['EmpInctv'].", Hod_PerIncentive=".$_POST['IncentivePer'].", HodPer_PIS_From_PreMyTGrossPM=".$_POST['ETPISP'].", HodPer_SC_From_PreMyTGrossPM=".$_POST['ETSCGP'].", HodPer_TISPM_From_PreMyTGrossPM=".$_POST['ETIncGP'].", Extra3Month=".$Extra3Month." where EmpPmsId=".$_POST['PmsId']." AND EmployeeID=".$_POST['EmpId'], $con); //$_POST['Extra3Month'] 

    if($sqlUp)
   {
    $SqlCount=mysql_query("select SUM(EmpCurrGrossPM) as Old_GROSS, SUM(EmpCurrIncentivePM) as Old_Inc, SUM(Hod_ProIncSalary) as H_IS, SUM(Hod_ProCorrSalary) as H_SC, SUM(Hod_Incentive) as H_Inc, SUM(Hod_IncNetMonthalySalary) as Tinc from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$_POST['C']." AND p.AssessmentYear=".$_POST['Y']." AND p.HOD_EmployeeID=".$_POST['HE'], $con); 
	$res=mysql_fetch_array($SqlCount);
	
	 $TotEGross=$res['Old_GROSS']+$res['Old_Inc'];                        //Total Old Gross
	 $One=($TotEGross*1)/100; $OnePerPre=number_format($One, 2, '.', ''); //One Percent from Old Gross
	 $TotHIS=$res['H_IS']+$res['H_Inc']+$res['H_SC'];                     //Total Proposed Increment
	 
	 //if($TotHIS>$TotEGross){ $Diff=$TotHIS-$TotEGross; }else{ $Diff=$TotEGross-$TotHIS; } //Total Increment
     $Diff=$res['Tinc']; $TotIncPer=$Diff/$OnePerPre;     
	 
	 $DiffHpInc=$Diff-$res['H_SC']; $ISPer=$DiffHInc/$OnePerPre;
	 $SCPer=$res['H_SC']/$OnePerPre;
	 
	 //$TotHInC=$Diff;         //Total HOD Increment
	 //$TotHMonthGS=$TotHIS;
	 //$TotHSC=$res['H_SC'];
	 //$INCPer=$res['H_Inc']/$OnePerPre;	 
	 
     echo '<input type="hidden" id="NoId" value="'.$_POST['No'].'" />'; 
	 echo '<input type="hidden" id="TPGrossPM" value="'.number_format($TotHIS, 2, '.', '').'" />'; 
	 echo '<input type="hidden" id="IGrossS" value="'.number_format($Diff, 2, '.', '').'" />'; 
	 echo '<input type="hidden" id="PIGrossS" value="'.number_format($TotIncPer, 2, '.', '').'" />'; 
	 echo '<input type="hidden" id="TPPIS_Amt" value="'.number_format($DiffHpInc, 2, '.', '').'" />'; 
	 echo '<input type="hidden" id="TPPIS" value="'.number_format($ISPer, 2, '.', '').'" />'; 
	 echo '<input type="hidden" id="TPPSC_Amt" value="'.number_format($res['H_SC'], 2, '.', '').'" />'; 
	 echo '<input type="hidden" id="TPPSC" value="'.number_format($SCPer, 2, '.', '').'" />'; 
  }

} 

if(isset($_POST['action']) && $_POST['action']!=""){ $EmpId = $_POST['EmpId']; $PmsId = $_POST['PmsId']; $No = $_POST['No']; 
$sqlUp=mysql_query("update hrm_employee_pms set HodSubmit_IncStatus=2, HodSubmit_IncDate='".date("Y-m-d")."' where EmpPmsId=".$PmsId." AND EmployeeID=".$EmpId, $con);  
if($sqlUp){echo '<input type="hidden" id="NoId" value="'.$No.'" />'; }
} 

if(isset($_POST['OverAll']) && $_POST['OverAll']!="")
{ 
 $Emp = $_POST['E']; $YI = $_POST['Y'];  $No = $_POST['N']; 
 
 $sql=mysql_query("select EmpPmsId from hrm_employee_pms where AssessmentYear=".$YI." AND HOD_EmployeeID=".$Emp." AND Hod_IncNetMonthalySalary>0 AND HodSubmit_IncStatus=1", $con); 
 while($res=mysql_fetch_assoc($sql))
 {
  $sqlUp=mysql_query("update hrm_employee_pms set HodSubmit_IncStatus=2, HodSubmit_IncDate='".date("Y-m-d")."' where EmpPmsId=".$res['EmpPmsId']." AND AssessmentYear=".$YI." AND HOD_EmployeeID=".$Emp, $con);
 } 
      
if($sqlUp){echo 'Data submitted successfully'; echo '<input type="hidden" id="RowNoId" value="'.$No.'" />';}
} 
?>
