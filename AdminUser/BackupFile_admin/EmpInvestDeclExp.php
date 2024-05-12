<?php
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');

if($_REQUEST['action']=='Export')
{

$xls_filename = 'Employee_Investment_Declaration'.$_REQUEST['m'].'-'.$_REQUEST['p'].'.xls';
 
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t"; 
echo "Sn\tEmpCode\tName\tDepartment\tMonth\tPeriod\tRegime\tHRA\tLTA\tCEA\tSec.80D - Medical Insurance Premium\tSec. 80DD - Medical treatment-insurance \tSec 80DDB - Medical treatment\tSec 80E - Repayment of Loan\tSec 80U - Handicapped \tSec 80CCC - Contribution to Pension Fund\t Life Insurance Premium \tDefferred Annuity\tPublic Provident Fund\tTime Deposit in Post Office -Bank\tULIP of UTI-LIC \tPrincipal Loan (Housing Loan) Repayment\tMutual Funds\tInvestment in infrastructure Bonds\tChildren- Tution Fee restricted to max.of 2 children\tDeposit in NHB\tDeposit In NSC\tSukanya Samriddhi\tOthers (please specify) Employee Provident Fund \tNPS (National Pension Scheme)- Atal Pension Yojna(APY) \tCorporate NPS Scheme\t If yes, Form 16 from previous employer or Form 12 B with tax computation statement\tSalary paid by the Previous Employer after Sec.10 Exemption \tPROFESSIOAL TAX deducted by the Previous Employer \tPROVIDENT FUND deducted by the Previous Employer \tINCOME TAX deducted by the Previous Employer\tInterest on Housing Loan\tInterest if the loan is taken before 01-04-99\tStatus\tSave_Date\tSubmit_Date";
print("\n");

 $sql=mysql_query("select EmpCode, Fname, Sname, Lname, g.DepartmentId, l.* from hrm_employee_investment_declaration l INNER JOIN hrm_employee e ON l.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON l.EmployeeID=g.EmployeeID where e.CompanyId=".$_REQUEST['c']."  AND l.Period='".$_REQUEST['p']."' AND l.Month=".$_REQUEST['m']." order by e.EmpCode ASC", $con);
 $no=1;
 while($res=mysql_fetch_array($sql))
 {
 
  $schema_insert = "";
  $schema_insert .= $no.$sep;
  $schema_insert .= $res['EmpCode'].$sep;
  $schema_insert .= $res['Fname'].' '.$res['Sname'].' '.$res['Lname'].$sep;
  $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con);
  $resDept=mysql_fetch_assoc($sqlDept); 
  $schema_insert .= $resDept['DepartmentCode'].$sep;
  		
  $schema_insert .= $res['Month'].$sep;
  $schema_insert .= $res['Period'].$sep;
  $schema_insert .= $res['Regime'].$sep;
  $schema_insert .= $res['HRA'].$sep;
  $schema_insert .= $res['LTA'].$sep;
  $schema_insert .= $res['CEA'].$sep;
  $schema_insert .= $res['MIP'].$sep;
  $schema_insert .= $res['MTI'].$sep;
  $schema_insert .= $res['MTS'].$sep;
  $schema_insert .= $res['ROL'].$sep;
  $schema_insert .= $res['Handi'].$sep;
  $schema_insert .= $res['PenFun'].$sep;
  $schema_insert .= $res['LIP'].$sep;
  $schema_insert .= $res['DA'].$sep;
  $schema_insert .= $res['PPF'].$sep;
  $schema_insert .= $res['PostOff'].$sep;
  $schema_insert .= $res['ULIP'].$sep;
  $schema_insert .= $res['HL'].$sep;
  $schema_insert .= $res['MF'].$sep;
  $schema_insert .= $res['IB'].$sep;
  $schema_insert .= $res['CTF'].$sep;
  $schema_insert .= $res['NHB'].$sep;
  $schema_insert .= $res['NSC'].$sep;
  $schema_insert .= $res['SukS'].$sep;
   $schema_insert .= $res['EPF'].$sep;
  $schema_insert .= $res['NPS'].$sep;
  $schema_insert .= $res['CorNPS'].$sep;
  $schema_insert .= $res['Form16'].$sep;
  $schema_insert .= $res['SPE'].$sep;
  $schema_insert .= $res['PT'].$sep;
  $schema_insert .= $res['PFD'].$sep;
  $schema_insert .= $res['IHL'].$sep;
  $schema_insert .= $res['IL'].$sep;
  
  if($res['FormSubmit']=='Y'){$sts='Save';}else{$sts='Submit';}
  $schema_insert .= $sts.$sep;
  $schema_insert .= $res['Inv_Date'].$sep;
  $schema_insert .= $res['SubmittedDate'].$sep;
 
				  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  $no++;
  
 }

}

?>
