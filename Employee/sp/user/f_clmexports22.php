<?php
session_start();
require_once('config/config.php');
$m=$_REQUEST['m']; $y=$_REQUEST['y']; $hq=$_REQUEST['hq']; $s=$_REQUEST['s']; $md=$_REQUEST['md'];
if($m==1 OR $m==3 OR $m==5 OR $m==7 OR $m==8 OR $m==10 OR $m==12){ $day=31; } 
  elseif($m==4 OR $m==6 OR $m==9 OR $m==11){ $day=30; }
  elseif($m==2){ if($Y==2012 OR $Y==2016 OR $Y==2020 OR $Y==2024 OR $Y==2028 OR $Y==2032 OR $Y==2036 OR $Y==2040 OR $Y==2044 OR $Y==2048 OR $Y==2052 OR $Y==2056 OR $Y==2060){$day=29;}else{$day=28;} } 


date_default_timezone_set('Asia/Calcutta');
$xls_filename = 'FAClaim_Reports_'.date('d-m-Y').'.xls'; // Define Excel (.xls) file name
// Header info settings
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
 
/***** Start of Formatting for Excel *****/
// Define separator (defines columns in excel &amp; tabs in word)
$sep = "\t"; // tabbed character
 
// Start of printing column names as names of MySQL fields
$sql = "select * from hrm_sales_fa_details as a INNER JOIN hrm_sales_fa_location as b
on a.locationId=b.locationId INNER JOIN hrm_sales_dealer as c
on a.DealerId=c.DealerId inner join hrm_Employee as d on a.RepEmployeeID=d.EmployeeID where a.approval='true'";

if($_REQUEST['s']=='All'){ $sql=mysql_query("select * from fa_details where FaStatus='A' order by FaId ASC",$con); } 
elseif($_REQUEST['hq']>0){ $sql=mysql_query("select * from fa_details where HqId=".$_REQUEST['hq']." AND FaStatus='A' order by FaId ASC",$con); }
elseif($_REQUEST['s']>0){ $sql=mysql_query("select * from fa_details f inner join hrm_headquater hq on f.HqId=hq.HqId where hq.StateId=".$_REQUEST['s']." AND FaStatus='A' order by FaId ASC",$con);}

echo "Sn\tName\tMode\tHq\tState\tCountry\tStatus\tExpense\tExpense\tDistributor\tReporting\tPresent\tAbsent\tClaim-Exp\tClaim-Exp\tClaim-Total\tPaid-Status\tPaid-Exp\tPaid-Exp\tPaid-Total\tPaid-Attachfile\tPaid-Remark";  //\tCrop\tDistributor
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
   
  $schema_insert .= ucfirst(strtolower($rhq['HqName'])).$sep;
  $schema_insert .= ucfirst(strtolower($rhq['StateName'])).$sep;				
  $schema_insert .= ucfirst(strtolower($rhq['CountryName'])).$sep;				
  $schema_insert .= $res['FaStatus'].$sep;
  $schema_insert .= floatval($res['Salary']).$sep ;
  $schema_insert .= floatval($res['Expences']).$sep;
  
  $dis2=mysql_query("select DealerName from hrm_sales_dealer where DealerId=".$res['Sal_DealerId'],$con); 
$rdis2=mysql_fetch_assoc($dis2);
  $schema_insert .= ucfirst(strtolower($rdis2['DealerName'])).$sep;
  $e=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$res['Reporting'],$con); 
$re=mysql_fetch_assoc($e);  
  $schema_insert .= ucfirst(strtolower($re['Fname'].' '.$re['Sname'].' '.$re['Lname'])).$sep;

$p=mysql_query("select count(Attv)as P from fa_attd where Attv='P' AND FaId=".$res['FaId']." AND (Attd between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$day)."')",$con); $rp=mysql_fetch_assoc($p); if($rp['P']>0){$P=$rp['P'];}else{$P='';}
$a=mysql_query("select count(Attv)as A from fa_attd where Attv='A' AND FaId=".$res['FaId']." AND (Attd between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$day)."')",$con); $ra=mysql_fetch_assoc($a); if($ra['A']>0){$A=$ra['A'];}else{$A='';}
  $schema_insert .= $P.$sep;
  $schema_insert .= $A.$sep;
  
$sal=mysql_query("select * from fa_salary where FaId=".$res['FaId']." AND Month=".$_REQUEST['m']." AND Year=".$_REQUEST['y'],$con); $rowS=mysql_num_rows($sal); $resS=mysql_fetch_assoc($sal);
if($resS['ClaimSal']>0){$vcSal=floatval($resS['ClaimSal']);}else{$vcSal='';}
if($resS['ClaimExp']>0){$vcExp=floatval($resS['ClaimExp']);}else{$vcExp='';} $totc=$vcSal+$vcExp;
  $schema_insert .= $vcSal.$sep;
  $schema_insert .= $vcExp.$sep;
  $schema_insert .= $totc.$sep;
if($resS['Status']==1){$vSt='Pending';}elseif($resS['Status']==2){$vSt='Approved/Paid';}elseif($resS['Status']==3){$vSt='Reject';}else{$vSt='';}
  $schema_insert .= $vSt.$sep;  
if($resS['ActualSal']>0){$vSal=floatval($resS['ActualSal']);}else{$vSal='';}
if($resS['ActualExp']>0){$vExp=floatval($resS['ActualExp']);}else{$vExp='';} $tot=$vSal+$vExp;  
  $schema_insert .= $vSal.$sep;
  $schema_insert .= $vExp.$sep;
  $schema_insert .= $tot.$sep;
  
if($rowS>0){ if($resS['Status']==2 AND $resS['Slip']!=''){$slip='Attach';}elseif($resS['Status']==0 OR $resS['Status']=1){$slip='';} }else{$slip='';}  
  $schema_insert .= $slip.$sep; 
  $schema_insert .= $resS['Remark'].$sep;

  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  $sn++; 
}
?>