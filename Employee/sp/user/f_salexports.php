<?php
session_start();
require_once('config/config.php');
$m=$_REQUEST['m']; $y=$_REQUEST['y']; $hq=$_REQUEST['hq']; $s=$_REQUEST['s']; $md=$_REQUEST['md'];
$m1=$_REQUEST['m1']; $m2=$_REQUEST['m2']; $m3=$_REQUEST['m3'];
$m4=$_REQUEST['m4']; $m5=$_REQUEST['m5']; $m6=$_REQUEST['m6']; $m7=$_REQUEST['m7']; $m8=$_REQUEST['m8']; $m9=$_REQUEST['m9']; $m10=$_REQUEST['m10']; $m11=$_REQUEST['m11']; $m12=$_REQUEST['m12'];
if($m==1 OR $m==3 OR $m==5 OR $m==7 OR $m==8 OR $m==10 OR $m==12){ $day=31; } 
  elseif($m==4 OR $m==6 OR $m==9 OR $m==11){ $day=30; }
  elseif($m==2){ if($Y==2012 OR $Y==2016 OR $Y==2020 OR $Y==2024 OR $Y==2028 OR $Y==2032 OR $Y==2036 OR $Y==2040 OR $Y==2044 OR $Y==2048 OR $Y==2052 OR $Y==2056 OR $Y==2060){$day=29;}else{$day=28;} } 


date_default_timezone_set('Asia/Calcutta');
$xls_filename = 'FASalary_Reports_'.date('d-m-Y').'.xls'; // Define Excel (.xls) file name
// Header info settings
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
 
/***** Start of Formatting for Excel *****/
// Define separator (defines columns in excel &amp; tabs in word)
$sep = "\t"; // tabbed character
 
// Start of printing column names as names of MySQL fields

if($_REQUEST['rbm']>0 OR $_REQUEST['abm']>0)  ///1111111111111///
{  

 if($_REQUEST['rbm']>0){$ri=$_REQUEST['rbm'];}else{$ri=$_REQUEST['abm'];}
 $sqlee=mysql_query("select * from fa_notaccemp where RepEmpId=".$ri,$con); $rowee=mysql_num_rows($sqlee);
 if($rowee>0)
 { 
  if($_REQUEST['md']==4){ $sql=mysql_query("select * from fa_notaccemp nf inner join hrm_sales_reporting_level rl on (nf.EmpId=rl.EmployeeID OR nf.EmpId=rl.R1 OR nf.EmpId=rl.R2 OR nf.EmpId=rl.R3 OR nf.EmpId=rl.R4) inner join fa_details fd on rl.EmployeeID=fd.Reporting where (nf.RepEmpId=".$ri." OR rl.EmployeeID=".$ri.") AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01' OR LWD>='".date($y."-01-01")."')) OR (FaStatus='D' AND LWD>='".date($y."-01-01")."')) AND DOJ<='".date($y."-".$m."-31")."' order by FaId ASC",$con); }
  elseif($_REQUEST['md']!=4){ $sql=mysql_query("select * from fa_notaccemp nf inner join hrm_sales_reporting_level rl on (nf.EmpId=rl.EmployeeID OR nf.EmpId=rl.R1 OR nf.EmpId=rl.R2 OR nf.EmpId=rl.R3 OR nf.EmpId=rl.R4) inner join fa_details fd on rl.EmployeeID=fd.Reporting where (nf.RepEmpId=".$ri." OR rl.EmployeeID=".$ri.") AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01' OR LWD>='".date($y."-01-01")."')) OR (FaStatus='D' AND LWD>='".date($y."-01-01")."')) AND DOJ<='".date($y."-".$m."-31")."' AND Mode=".$_REQUEST['md']." order by FaId",$con); }
 }
 else
 {
  if($_REQUEST['md']==4){ $sql=mysql_query("select * from fa_details fd inner join hrm_sales_reporting_level rl on fd.Reporting=rl.EmployeeID where (fd.Reporting=".$ri." OR rl.R1=".$ri." OR rl.R2=".$ri." OR rl.R3=".$ri." OR rl.R4=".$ri." OR rl.R5=".$ri.") AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01' OR LWD>='".date($y."-01-01")."')) OR (FaStatus='D' AND LWD>='".date($y."-01-01")."')) AND DOJ<='".date($y."-".$m."-31")."' order by FaId",$con);}
  elseif($_REQUEST['md']!=4){ $sql=mysql_query("select * from fa_details fd inner join hrm_sales_reporting_level rl on fd.Reporting=rl.EmployeeID where (fd.Reporting=".$ri." OR rl.R1=".$ri." OR rl.R2=".$ri." OR rl.R3=".$ri." OR rl.R4=".$ri." OR rl.R5=".$ri.") AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01' OR LWD>='".date($y."-01-01")."')) OR (FaStatus='D' AND LWD>='".date($y."-01-01")."')) AND DOJ<='".date($y."-".$m."-31")."' AND Mode=".$_REQUEST['md']." order by FaId",$con);}
 }	
 
} 
else    ///1111111111111///
{
  if($_REQUEST['hq']>0 AND $_REQUEST['md']==4){ $sql=mysql_query("select * from fa_details where HqId=".$_REQUEST['hq']." AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01' OR LWD>='".date($y."-01-01")."')) OR (FaStatus='D' AND LWD>='".date($y."-01-01")."')) AND DOJ<='".date($y."-".$m."-31")."' order by FaId ASC",$con);}
  elseif($_REQUEST['hq']>0 AND $_REQUEST['md']!=4){ $sql=mysql_query("select * from fa_details where HqId=".$_REQUEST['hq']." AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01' OR LWD>='".date($y."-01-01")."')) OR (FaStatus='D' AND LWD>='".date($y."-01-01")."')) AND DOJ<='".date($y."-".$m."-31")."' AND Mode=".$_REQUEST['md']." order by FaId ASC",$con);}
  elseif($_REQUEST['s']=='All' AND $_REQUEST['md']==4){ $sql=mysql_query("select * from fa_details where ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01' OR LWD>='".date($y."-01-01")."')) OR (FaStatus='D' AND LWD>='".date($y."-01-01")."')) AND DOJ<='".date($y."-".$m."-31")."' order by FaId ASC",$con); }
  elseif($_REQUEST['s']=='All' AND $_REQUEST['md']!=4){ $sql=mysql_query("select * from fa_details where ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01' OR LWD>='".date($y."-01-01")."')) OR (FaStatus='D' AND LWD>='".date($y."-01-01")."')) AND DOJ<='".date($y."-".$m."-31")."' AND Mode=".$_REQUEST['md']." order by FaId ASC",$con);}
  elseif($_REQUEST['s']>0 AND $_REQUEST['md']==4){ $sql=mysql_query("select * from fa_details f inner join hrm_headquater hq on f.HqId=hq.HqId where hq.StateId=".$_REQUEST['s']." AND ((FaStatus='A' AND (f.LWD='0000-00-00' OR f.LWD='1970-01-01' OR LWD>='".date($y."-01-01")."')) OR (FaStatus='D' AND f.LWD>='".date($y."-01-01")."')) AND f.DOJ<='".date($y."-".$m."-31")."' order by FaId ASC",$con);}
  elseif($_REQUEST['s']>0 AND $_REQUEST['md']!=4){ $sql=mysql_query("select * from fa_details f inner join hrm_headquater hq on f.HqId=hq.HqId where hq.StateId=".$_REQUEST['s']." AND ((FaStatus='A' AND (f.LWD='0000-00-00' OR f.LWD='1970-01-01' OR LWD>='".date($y."-01-01")."')) OR (FaStatus='D' AND f.LWD>='".date($y."-01-01")."')) AND f.DOJ<='".date($y."-".$m."-31")."' AND Mode=".$_REQUEST['md']." order by FaId ASC",$con);}

}  ///1111111111111///

echo "Sn\tName\tMode\tFA Hq\tDOJ\tDOB\tStatus\tExpense\tExpenses\tYear\tJan\tFeb\tMarch\tApr\tMay\tJun\tJul\tAug\tSep\tOct\tNov\tDec\tTotal_Amt\tExpen. Dis.\tExpen. Mode\tEmailID\tJob Status \tReporting\tRep:Level-2\tRep:Level-3\tContact1";  //\tState\tCountry\tCrop\tDistributor
print("\n");
// End of printing column names
 $sn=1;

while($res = mysql_fetch_array($sql)) // Start while loop to get data
{
	  
  $schema_insert = "";
  $schema_insert .= $sn.$sep;
  $schema_insert .= $res['FaName'].$sep;
  
if($res['Mode']==1){$mode='Direct(Sales Executive)';}
elseif($res['Mode']==2){$mode='Teamlease';}elseif($res['Mode']==3){$mode='Distributor';}  
  $schema_insert .= $mode.$sep;
  
$hq=mysql_query("select CountryName,StateName,HqName,s.CountryId,h.StateId from hrm_headquater h inner join hrm_state s on h.StateId=s.StateId inner join hrm_country c on s.CountryId=c.CountryId where h.HqId=".$res['HqId'], $con);
  $rhq=mysql_fetch_assoc($hq); 
   
  $schema_insert .= ucfirst(strtolower($res['OtherHq'])).$sep; 
  //$schema_insert .= ucfirst(strtolower($rhq['HqName'])).$sep;
  //$schema_insert .= ucfirst(strtolower($rhq['StateName'])).$sep;				
  //$schema_insert .= ucfirst(strtolower($rhq['CountryName'])).$sep;				
  $schema_insert .= date("d-m-y",strtotime($res['DOJ'])).$sep;
  $schema_insert .= date("d-m-y",strtotime($res['DOB'])).$sep;	
  $schema_insert .= $res['FaStatus'].$sep;
  $schema_insert .= floatval($res['Salary']).$sep ;
  $schema_insert .= floatval($res['Expences']).$sep;
  $schema_insert .= $_REQUEST['y'].$sep;

  for($i=1; $i<=12; $i++){ 
  $sal=mysql_query("select * from fa_salary where FaId=".$res['FaId']." AND Month=".$i." AND Year=".$_REQUEST['y'],$con); $resS=mysql_fetch_assoc($sal); $Sal=floatval($resS['ActualSal']+$resS['ActualExp']);
  $schema_insert .= $Sal.$sep;
  }	
	  
if($m1==1){$mm1=1;}else{$mm1=0;}if($m2==1){$mm2=2;}else{$mm2=0;}if($m3==1){$mm3=3;}else{$mm3=0;}
if($m4==1){$mm4=4;}else{$mm4=0;}if($m5==1){$mm5=5;}else{$mm5=0;}if($m6==1){$mm6=6;}else{$mm6=0;}
if($m7==1){$mm7=7;}else{$mm7=0;}if($m8==1){$mm8=8;}else{$mm8=0;}if($m9==1){$mm9=9;}else{$mm9=0;}
if($m10==1){$mm10=10;}else{$mm10=0;}if($m11==1){$mm11=11;}else{$mm11=0;}if($m12==1){$mm12=12;}else{$mm12=0;}	
$Mth='(Month='.$mm1.' OR Month='.$mm2.' OR Month='.$mm3.' OR Month='.$mm4.' OR Month='.$mm5.' OR Month='.$mm6.' OR Month='.$mm7.' OR Month='.$mm8.' OR Month='.$mm9.' OR Month='.$mm10.' OR Month='.$mm11.' OR Month='.$mm12.')'; 
$sal2=mysql_query("select SUM(ActualSal) as sal,SUM(ActualExp) as exp from fa_salary where FaId=".$res['FaId']." AND Year=".$_REQUEST['y'],$con); $resS2=mysql_fetch_assoc($sal2);	 
$SalTot=floatval($resS2['sal']+$resS2['exp']);
 $schema_insert .= $SalTot.$sep;

$sal=mysql_query("select * from fa_salary where FaId=".$res['FaId']." AND Month=".$_REQUEST['m']." AND Year=".$_REQUEST['y'],$con); $rowS=mysql_num_rows($sal); $resS=mysql_fetch_assoc($sal);
  

$dis2=mysql_query("select DealerName from hrm_sales_dealer where DealerId=".$res['Sal_DealerId'],$con); 
$rdis2=mysql_fetch_assoc($dis2);
  $schema_insert .= ucfirst(strtolower($rdis2['DealerName'])).$sep;
  $schema_insert .= $res['SalaryMode'].$sep;
  $schema_insert .= $res['EmailId'].$sep;
  $schema_insert .= $res['JobStatus'].$sep;
  if($res['tl']==0){ $e=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$res['Reporting'],$con); $re=mysql_fetch_assoc($e); $RName=ucfirst(strtolower($re['Fname'].' '.$re['Sname'].' '.$re['Lname'])); }else{ $e2=mysql_query("select TLName from hrm_sales_tlemp where TLEId=".$res['Reporting']." AND TLStatus='A'",$con); $re2=mysql_fetch_assoc($e2); $RName=ucfirst(strtolower($re2['TLName'])); }
//$e=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$res['Reporting'],$con); $re=mysql_fetch_assoc($e);  
  $schema_insert .= $RName.$sep;
$sqlL=mysql_query("select R1,R2 from hrm_sales_reporting_level where EmployeeID=".$res['Reporting'],$con); 
$resL=mysql_fetch_assoc($sqlL); 
if($resL['R1']>0){ $e1=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$resL['R1'],$con); $r1=mysql_fetch_assoc($e1); $rr1=$r1['Fname'].' '.$r1['Sname'].' '.$r1['Lname'];}else{$rr1='';}
if($resL['R2']>0){ $e2=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$resL['R2'],$con); $r2=mysql_fetch_assoc($e2); $rr2=$r2['Fname'].' '.$r2['Sname'].' '.$r2['Lname'];}else{$rr2='';}
  $schema_insert .= ucfirst(strtolower($rr1)).$sep;
  $schema_insert .= ucfirst(strtolower($rr2)).$sep;
  
  $schema_insert .= $res['ContactNo'].$sep;				  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  $sn++; 
}
?>