<?php 
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');
$sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $MY=$FD-1;  $PRD=$FD.'-'.$TD;
/*************************************************************************************************************/
if($_REQUEST['YI']==1){$Y=2012;}elseif($_REQUEST['YI']==2){$Y=2013;}elseif($_REQUEST['YI']==3){$Y=2014;}elseif($_REQUEST['YI']==4){$Y=2015;}elseif($_REQUEST['YI']==5){$Y=2016;}elseif($_REQUEST['YI']==6){$Y=2017;}elseif($_REQUEST['YI']==7){$Y=2018;}elseif($_REQUEST['YI']==8){$Y=2019;}elseif($_REQUEST['YI']==9){$Y=2020;}elseif($_REQUEST['YI']==10){$Y=2021;}elseif($_REQUEST['YI']==11){$Y=2022;}


if($_REQUEST['action']='IncoalExport') 
{ 
 if($_REQUEST['ee']=='Dept')
 { $name='Department_Wise'; }
 elseif($_REQUEST['ee']=='Hod')
 { $name='HOD_Wise';
}

$xls_filename = 'Emp_PMS_Score/Rating_'.$PRD.'-'.$name.'.xls';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t"; 
echo "Sn";
if($_REQUEST['ee']=='Dept'){ echo "\tDeaprtment"; }
if($_REQUEST['ee']=='Hod'){ echo "\tHOD"; }
echo "\tNOE\tPREV. GROSS\tPIS\t% PIS\tPSC\t% PSC\tTISPM\t% TISPM\tTPGSPM";
print("\n");		

# Get Users Details form the DB #$result = mysql_query("SELECT * from formResults WHERE formID = '$formID'" );
if($_REQUEST['ee']=='Dept')
{  
  $sql=mysql_query("select SUM(EmpCurrGrossPM) as E_GROSS, SUM(EmpCurrIncentivePM) as EINC_GROSS, SUM(Hod_ProIncSalary) as H_IS, SUM(Hod_ProCorrSalary) as H_SC, SUM(Hod_Incentive) as H_Inc, DepartmentId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DateJoining<='".$Y."-06-30' AND hrm_employee_pms.Appraiser_EmployeeID!=0 group by DepartmentId", $con); 
}
elseif($_REQUEST['ee']=='Hod')
{ $sql=mysql_query("select SUM(EmpCurrGrossPM) as E_GROSS, SUM(EmpCurrIncentivePM) as EINC_GROSS, SUM(Hod_ProIncSalary) as H_IS, SUM(Hod_ProCorrSalary) as H_SC, SUM(Hod_Incentive) as H_Inc, HOD_EmployeeID from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DateJoining<='".$Y."-06-30' AND hrm_employee_pms.Appraiser_EmployeeID!=0 group by HOD_EmployeeID", $con); 
}
 $Sno=1; while($res=mysql_fetch_array($sql)){ 
 //$TotEGross=$res['E_GROSS']+$res['EINC_GROSS']; $TotHIS=$res['H_IS']+$res['H_Inc']; $TotHSC=$res['H_SC'];  
 //$Diff=$res['H_IS']-$res['E_GROSS']; $TotHInC=$Diff+$res['H_SC']; $TotHMonthGS=$TotHIS+$TotHSC;
 //$One=($TotEGross*1)/100; $ISPer=$Diff/$One; $SCPer=$TotHSC/$One; $TotIncPer=$TotHInC/$One;
 
 $TotEGross=$res['E_GROSS']+$res['EINC_GROSS']; $TotHIS=$res['H_IS']+$res['H_Inc']; $TotHSC=$res['H_SC'];
 $Diff=$TotHIS-$TotEGross; $TotHInC=$Diff+$res['H_SC']; $TotHMonthGS=$TotHIS+$res['H_SC'];
 $One=($TotEGross*1)/100; 
 if($One>0)
 {
 $TotIncPer=$TotHInC/$One;
 $ISPer=$Diff/$One; $SCPer=$res['H_SC']/$One; $INCPer=$res['H_Inc']/$One; 
 }
 if($_REQUEST['ee']=='Dept'){ $sqlE=mysql_query("select * from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DateJoining<='".date($FD.'-06-30')."' AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); $rowNOE=mysql_num_rows($sqlE); $sD=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$res['DepartmentId'], $con); $rD=mysql_fetch_assoc($sD); }
if($_REQUEST['ee']=='Hod'){ $sqlE=mysql_query("select * from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DateJoining<='".date($FD.'-06-30')."' AND hrm_employee_pms.HOD_EmployeeID=".$res['HOD_EmployeeID']." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); $rowNOE=mysql_num_rows($sqlE); $sH=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$res['HOD_EmployeeID'], $con); $rH=mysql_fetch_assoc($sH); }	

  $schema_insert = "";
  $schema_insert .= $Sno.$sep;
if($_REQUEST['ee']=='Dept'){  $schema_insert .= $rD['DepartmentName'].$sep; }
if($_REQUEST['ee']=='Hod'){  $schema_insert .= $rH['Fname'].' '.$rH['Sname'].' '.$rH['Lname'].$sep;	}	
  $schema_insert .= $rowNOE.$sep;
  $schema_insert .= $TotEGross.$sep;
  $schema_insert .= $TotHIS.$sep;
  $schema_insert .= number_format($ISPer, 2, '.', '').$sep;
  $schema_insert .= $res['H_SC'].$sep;
  $schema_insert .= number_format($SCPer, 2, '.', '').$sep;
  $schema_insert .= $TotHInC.$sep;
  $schema_insert .= number_format($TotIncPer, 2, '.', '').$sep;
  $schema_insert .= $TotHMonthGS.$sep;
  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  $Sno++;
 }

if($_REQUEST['ee']=='Dept')
{  
  $sqlT=mysql_query("select SUM(EmpCurrGrossPM) as E_GROSS, SUM(EmpCurrIncentivePM) as EINC_GROSS, SUM(Hod_ProIncSalary) as H_IS, SUM(Hod_ProCorrSalary) as H_SC, SUM(Hod_Incentive) as H_Inc, DepartmentId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DateJoining<='".$Y."-06-30' AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); 
}
elseif($_REQUEST['ee']=='Hod')
{ $sqlT=mysql_query("select SUM(EmpCurrGrossPM) as E_GROSS, SUM(EmpCurrIncentivePM) as EINC_GROSS, SUM(Hod_ProIncSalary) as H_IS, SUM(Hod_ProCorrSalary) as H_SC, SUM(Hod_Incentive) as H_Inc, HOD_EmployeeID from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DateJoining<='".$Y."-06-30' AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); 
}
 while($resT=mysql_fetch_array($sqlT)){ 
 //$TotEGross=$resT['E_GROSS']+$resT['EINC_GROSS']; $TotHIS=$resT['H_IS']+$resT['H_Inc']; $TotHSC=$resT['H_SC'];  
 //$Diff=$resT['H_IS']-$resT['E_GROSS']; $TotHInC=$Diff+$resT['H_SC']; $TotHMonthGS=$TotHIS+$TotHSC;
 //$One=($TotEGross*1)/100; $ISPer=$Diff/$One; $SCPer=$TotHSC/$One; $TotIncPer=$TotHInC/$One;
 
 $TotEGross=$resT['E_GROSS']+$resT['EINC_GROSS']; $TotHIS=$resT['H_IS']+$resT['H_Inc']; $TotHSC=$resT['H_SC'];
 $Diff=$TotHIS-$TotEGross; $TotHInC=$Diff+$resT['H_SC']; $TotHMonthGS=$TotHIS+$resT['H_SC'];
 $One=($TotEGross*1)/100; $TotIncPer=$TotHInC/$One;
 $ISPer=$Diff/$One; $SCPer=$resT['H_SC']/$One; $INCPer=$resT['H_Inc']/$One;
  }
 
  $sqlTE=mysql_query("select * from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DateJoining<='".date($FD.'-06-30')."' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); $rowTNOE=mysql_num_rows($sqlTE);

  $schema_insert = "";
  $schema_insert .= '=>'.$sep;
  $schema_insert .= 'Total'.$sep;
  $schema_insert .= $rowTNOE.$sep;		
  $schema_insert .= $TotEGross.$sep;
  $schema_insert .= $TotHIS.$sep;
  $schema_insert .= number_format($ISPer, 2, '.', '').$sep;
  $schema_insert .= $TotHSC.$sep;
  $schema_insert .= number_format($SCPer, 2, '.', '').$sep;
  $schema_insert .= $TotHInC.$sep;
  $schema_insert .= number_format($TotIncPer, 2, '.', '').$sep;
  $schema_insert .= $TotHMonthGS.$sep;

  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n"; 


}
?>