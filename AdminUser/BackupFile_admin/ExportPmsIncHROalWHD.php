<?php 
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');
$sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $MY=$FD-1;  $PRD=$FD.'-'.$TD;
/*************************************************************************************************************/
if($_REQUEST['YI']==1){$Y=2012;}elseif($_REQUEST['YI']==2){$Y=2013;}elseif($_REQUEST['YI']==3){$Y=2014;}elseif($_REQUEST['YI']==4){$Y=2015;}elseif($_REQUEST['YI']==5){$Y=2016;}elseif($_REQUEST['YI']==6){$Y=2017;}elseif($_REQUEST['YI']==7){$Y=2018;}elseif($_REQUEST['YI']==8){$Y=2019;}elseif($_REQUEST['YI']==9){$Y=2020;}elseif($_REQUEST['YI']==10){$Y=2021;}elseif($_REQUEST['YI']==11){$Y=2022;}elseif($_REQUEST['YI']==12){$Y=2023;}elseif($_REQUEST['YI']==13){$Y=2024;}elseif($_REQUEST['YI']==14){$Y=2025;}elseif($_REQUEST['YI']==15){$Y=2026;}elseif($_REQUEST['YI']==16){$Y=2027;}elseif($_REQUEST['YI']==18){$Y=2029;}elseif($_REQUEST['YI']==19){$Y=2030;}


if($_REQUEST['action']='IncoalExport') 
{ 
 if($_REQUEST['ee']=='Dept')
 { $name='Department_Wise_(Without_Management)'; }
 elseif($_REQUEST['ee']=='Hod')
 { $name='HOD_Wise_(Without_Management)';
}

$xls_filename = 'HR_EmpPMS_OverallRpt_'.$PRD.'-'.$name.'.xls';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t"; 
echo "Sn";
if($_REQUEST['ee']=='Dept'){ echo "\tDeaprtment"; }
if($_REQUEST['ee']=='Hod'){ echo "\tHOD"; }

if($_REQUEST['YI']<=7){ echo "\tNOE\tPIS\t% PIS\tPSC\t% PSC\tTISPM\t% TISPM\tTPGSPM"; }
else{ echo "\tNOE\tProp. CTC\t% Prop. CTC\tCTC Corr.\t% CTC Corr.\tTotal Inc.\t% Total Inc.\tTotal Prop. CTC"; }

//\tPREV. GROSS //\tPREV. CTC

print("\n");		

if($_REQUEST['YI']<=7)
{ $qry='SUM(EmpCurrGrossPM) as E_GROSS, SUM(EmpCurrIncentivePM) as EINC_GROSS, SUM(HR_ProIncSalary) as H_IS, SUM(HR_ProCorrSalary) as H_SC, SUM(Hod_Incentive) as H_Inc, SUM(HR_IncNetMonthalySalary) as Tinc, DepartmentId, HOD_EmployeeID'; }
else
{ $qry='SUM(EmpCurrCtc) as E_GROSS, SUM(HR_ProIncCTC) as H_IS, SUM(HR_ProCorrCTC) as H_SC, SUM(HR_IncNetCTC) as Tinc, DepartmentId, HOD_EmployeeID';} 

if($_REQUEST['YI']>=9){ $sq="p.EmployeeID!=52 AND p.EmployeeID!=89";}else{$sq="1=1";}

# Get Users Details form the DB #$result = mysql_query("SELECT * from formResults WHERE formID = '$formID'" );
if($_REQUEST['ee']=='Dept')
{  
  $sql=mysql_query("select ".$qry." from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID where p.EmployeeID!=6 AND p.EmployeeID!=7 AND p.EmployeeID!=51 AND p.EmployeeID!=223 AND p.EmployeeID!=224 AND p.EmployeeID!=461 AND ".$sq." AND e.EmpStatus='A' AND e.CompanyId=".$_REQUEST['c']." AND p.AssessmentYear=".$_REQUEST['YI']." AND p.HOD_EmployeeID>0 AND p.Appraiser_EmployeeID!=0 group by DepartmentId", $con); //g.DateJoining<='".$Y."-06-30'
}
elseif($_REQUEST['ee']=='Hod')
{ $sql=mysql_query("select ".$qry." from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID where p.EmployeeID!=6 AND p.EmployeeID!=7 AND p.EmployeeID!=51 AND p.EmployeeID!=223 AND p.EmployeeID!=224 AND p.EmployeeID!=461 AND ".$sq." AND e.EmpStatus='A' AND e.CompanyId=".$_REQUEST['c']." AND p.AssessmentYear=".$_REQUEST['YI']." AND p.HOD_EmployeeID>0 AND p.Appraiser_EmployeeID!=0 group by HOD_EmployeeID", $con); //g.DateJoining<='".$Y."-06-30'
}

 $Sno=1; while($res=mysql_fetch_array($sql)){ 
 
 if($_REQUEST['YI']<=7){ $inc=$res['EINC_GROSS']; $incH=$res['H_Inc']; }else{ $inc=0; $incH=0; }
 
 $TotEGross=$res['E_GROSS']+$inc; $TotHIS=$res['H_IS']+$incH; $TotHSC=$res['H_SC'];
 
 //$Diff=$TotHIS-$TotEGross; $TotHInC=$Diff+$res['H_SC']; 
 $Diff=$res['Tinc']-$res['H_SC']; 
 $TotHInC=$Diff+$res['H_SC'];
 
 $TotHMonthGS=$TotHIS+$res['H_SC'];
 $One=($TotEGross*1)/100; 
 if($One>0)
 {
 $TotIncPer=$TotHInC/$One;
 $ISPer=$Diff/$One; $SCPer=$res['H_SC']/$One; $INCPer=$incH/$One; 
 }
 if($_REQUEST['ee']=='Dept')
{ $sqlE=mysql_query("select * from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID where p.EmployeeID!=6 AND p.EmployeeID!=7 AND p.EmployeeID!=51 AND p.EmployeeID!=223 AND p.EmployeeID!=224 AND p.EmployeeID!=461 AND ".$sq." AND e.EmpStatus='A' AND e.CompanyId=".$_REQUEST['c']." AND p.AssessmentYear=".$_REQUEST['YI']." AND p.HOD_EmployeeID>0 AND g.DepartmentId=".$res['DepartmentId']." AND p.Appraiser_EmployeeID!=0", $con); //g.DateJoining<='".date($FD.'-06-30')."'
$rowNOE=mysql_num_rows($sqlE); $sD=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$res['DepartmentId'], $con); $rD=mysql_fetch_assoc($sD); 
}  
if($_REQUEST['ee']=='Hod'){ $sqlE=mysql_query("select * from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID where p.EmployeeID!=6 AND p.EmployeeID!=7 AND p.EmployeeID!=51 AND p.EmployeeID!=223 AND p.EmployeeID!=224 AND p.EmployeeID!=461 AND ".$sq." AND e.EmpStatus='A' AND e.CompanyId=".$_REQUEST['c']." AND p.AssessmentYear=".$_REQUEST['YI']." AND p.HOD_EmployeeID>0 AND p.HOD_EmployeeID=".$res['HOD_EmployeeID']." AND p.Appraiser_EmployeeID!=0", $con); //g.DateJoining<='".date($FD.'-06-30')."'
 $rowNOE=mysql_num_rows($sqlE); $sH=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$res['HOD_EmployeeID'], $con); $rH=mysql_fetch_assoc($sH); }	

  $schema_insert = "";
  $schema_insert .= $Sno.$sep;
if($_REQUEST['ee']=='Dept'){  $schema_insert .= $rD['DepartmentName'].$sep; }
if($_REQUEST['ee']=='Hod'){  $schema_insert .= $rH['Fname'].' '.$rH['Sname'].' '.$rH['Lname'].$sep;	}	
  $schema_insert .= $rowNOE.$sep;
  //$schema_insert .= $TotEGross.$sep;
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
  $Sno++;
 }

if($_REQUEST['ee']=='Dept')
{  
  $sqlT=mysql_query("select ".$qry." from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID where p.EmployeeID!=6 AND p.EmployeeID!=7 AND p.EmployeeID!=51 AND p.EmployeeID!=223 AND p.EmployeeID!=224 AND p.EmployeeID!=461 AND ".$sq." AND e.EmpStatus='A' AND e.CompanyId=".$_REQUEST['c']." AND p.AssessmentYear=".$_REQUEST['YI']." AND p.HOD_EmployeeID>0 AND p.Appraiser_EmployeeID!=0", $con); //g.DateJoining<='".$Y."-06-30'
}
elseif($_REQUEST['ee']=='Hod')
{ $sqlT=mysql_query("select ".$qry." from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID where p.EmployeeID!=6 AND p.EmployeeID!=7 AND p.EmployeeID!=51 AND p.EmployeeID!=223 AND p.EmployeeID!=224 AND p.EmployeeID!=461 AND ".$sq." AND e.EmpStatus='A' AND e.CompanyId=".$_REQUEST['c']." AND p.AssessmentYear=".$_REQUEST['YI']." AND p.HOD_EmployeeID>0 AND p.Appraiser_EmployeeID!=0", $con); //g.DateJoining<='".$Y."-06-30'
}
 while($resT=mysql_fetch_array($sqlT)){ 

 if($_REQUEST['YI']<=7){ $inc=$resT['EINC_GROSS']; $incH=$resT['H_Inc']; }else{ $inc=0; $incH=0; }

 $TotEGross=$resT['E_GROSS']+$inc; $TotHIS=$resT['H_IS']+$incH; $TotHSC=$resT['H_SC'];
 
 //$Diff=$TotHIS-$TotEGross; $TotHInC=$Diff+$resT['H_SC']; 
 $Diff=$resT['Tinc']-$resT['H_SC']; 
 $TotHInC=$Diff+$resT['H_SC'];
 
 $TotHMonthGS=$TotHIS+$resT['H_SC'];
 $One=($TotEGross*1)/100; $TotIncPer=$TotHInC/$One;
 $ISPer=$Diff/$One; $SCPer=$resT['H_SC']/$One; $INCPer=$incH/$One;  }

 $sqlTE=mysql_query("select * from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID where p.EmployeeID!=6 AND p.EmployeeID!=7 AND p.EmployeeID!=51 AND p.EmployeeID!=223 AND p.EmployeeID!=224 AND p.EmployeeID!=461 AND ".$sq." AND e.EmpStatus='A' AND e.CompanyId=".$_REQUEST['c']." AND p.HOD_EmployeeID>0 AND p.AssessmentYear=".$_REQUEST['YI']." AND p.Appraiser_EmployeeID!=0", $con); 
 //g.DateJoining<='".date($FD.'-06-30')."' 
 $rowTNOE=mysql_num_rows($sqlTE); 

  $schema_insert = "";
  $schema_insert .= '=>'.$sep;
  $schema_insert .= 'Total'.$sep;
  $schema_insert .= $rowTNOE.$sep;		
  //$schema_insert .= $TotEGross.$sep;
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