<?php
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');

if($_REQUEST['action']=='Export')
{

$name='All'; 
$xls_filename = 'Employee_Investment_Declaration_'.$_REQUEST['M'].'_'.$_REQUEST['P'].'.xls';
 
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t"; 
echo "Sn\tEmpCode\tName\tDepartment\tPeriod\tRegime\tHRA\tLTA\tCEA\tChap VI-A(Sec-80D MIP)\tChap VI-A(Sec-80DD)\tChap VI-A(Sec-80DDB)\tChap VI-A(Sec-80E)\tChap VI-A(Sec-80U)\tSec-80C(Sec 80CCC)\tSec-80C(LIC)\tSec-80C(Defferred Annuity)\tSec-80C(PPF)\tSec-80C(Deposit PostOffice/Bank)\tSec-80C(ULIP of UTI/LIC)\tSec-80C(Principal Loan (Housing Loan) Repayment)\tSec-80C(Mutual Funds)\tSec-80C(Investment in infrastructure Bonds)\tSec-80C(Children- Tution Fee)\tSec-80C(Deposit in NHB)\tSec-80C(Deposit In NSC)\tSec-80C(Sukanya Samriddhi)\tSec-80C(Others (please specify) Employee Provident Fund)\tSec-80CCD NPS\tCorporate NPS Scheme\tMax NPS\tPrev-Employment(Form 16 / Form 12 B)\tPrev-Employment(Salary paid - Sec.10 Exemption )\tPrev-Employment(PROFESSIOAL TAX)\tPrev-Employment(PROVIDENT FUND)\tPrev-Employment(INCOME TAX)\tSec-24(Interest on Housing Loan)\tSec-24(Interest if the loan is taken before 01/04/99)\tStatus\tSave_Date\tSubmit_Date";
print("\n");


$sqlE=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname,department_name as DepartmentName,ectc.BAS_Value from hrm_employee e LEFT join hrm_employee_general g on e.EmployeeID=g.EmployeeID left join core_departments d on g.DepartmentId=d.id LEFT join hrm_employee_ctc ectc on ectc.EmployeeID = e.EmployeeID where e.CompanyId=".$_REQUEST['CI']." AND e.EmpStatus='A' and ectc.Status='A' order by e.ECode ASC", $con);

 $no=1;
 while($resE=mysql_fetch_array($sqlE))
 {
     
  $sql=mysql_query("select * from hrm_employee_investment_declaration where EmployeeID=".$resE['EmployeeID']." AND Period='".$_REQUEST['P']."' AND Month=".$_REQUEST['M'], $con);  $row=mysql_num_rows($sql);
  
  if($row>0)
  {
      
  $res=mysql_fetch_array($sql); 
     
  $LEC=strlen($resE['EmpCode']);
  if($LEC==1){$EC='000'.$resE['EmpCode'];} 
  elseif($LEC==2){$EC='00'.$resE['EmpCode'];} 
  elseif($LEC==3){$EC='0'.$resE['EmpCode'];} 
  elseif($LEC>=4){$EC=$resE['EmpCode'];}
   $monthly_nps = $resE['BAS_Value'] * 0.14;  // 14% of monthly basic
  $max_nps = $monthly_nps * 12;   
  $schema_insert = "";
  $schema_insert .= $no.$sep;
  $schema_insert .= $EC.$sep;
  $schema_insert .= $resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'].$sep;
  $schema_insert .= $resE['DepartmentName'].$sep;		
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
    $schema_insert .= $max_nps.$sep;
  
  $schema_insert .= $res['Form16'].$sep;
  $schema_insert .= $res['SPE'].$sep;
  $schema_insert .= $res['PT'].$sep;
  $schema_insert .= $res['PFD'].$sep;
  $schema_insert .= $res['IT'].$sep;
  
  $schema_insert .= $res['IHL'].$sep;
  $schema_insert .= $res['IL'].$sep;
  
  if($row>0)
  {
   if($res['FormSubmit']=='Y'){$sts='Save';}else{$sts='Submit';}
   $schema_insert .= $sts.$sep;
   $schema_insert .= $res['Inv_Date'].$sep;
   $schema_insert .= $res['SubmittedDate'].$sep;
  }
  else
  {
   $mkk='Blank';
   $schema_insert .= $mkk.$sep;
   $schema_insert .= $mkk.$sep;
   $schema_insert .= $mkk.$sep;      
  }
				  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  $no++;
  
  } //if($row>0)
  
 }

}

?>
