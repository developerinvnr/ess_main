<?php session_start();
require_once('config/config.php');
$m=$_REQUEST['m']; $y=$_REQUEST['y']; $hq=$_REQUEST['hq']; $s=$_REQUEST['s']; $md=$_REQUEST['md'];

if($m==1){$Mt='jan';}elseif($m==2){$Mt='feb';}elseif($m==3){$Mt='mar';}elseif($m==4){$Mt='apr';}elseif($m==5){$Mt='may';}elseif($m==6){$Mt='jun';}elseif($m==7){$Mt='jul';}elseif($m==8){$Mt='aug';}elseif($m==9){$Mt='sep';}elseif($m==10){$Mt='oct';}elseif($m==11){$Mt='nov';}elseif($m==12){$Mt='dec';} 
if($m==1 OR $m==3 OR $m==5 OR $m==7 OR $m==8 OR $m==10 OR $m==12){ $day=31; } 
  elseif($m==4 OR $m==6 OR $m==9 OR $m==11){ $day=30; }
  elseif($m==2){ if($Y==2012 OR $Y==2016 OR $Y==2020 OR $Y==2024 OR $Y==2028 OR $Y==2032 OR $Y==2036 OR $Y==2040 OR $Y==2044 OR $Y==2048 OR $Y==2052 OR $Y==2056 OR $Y==2060){$day=29;}else{$day=28;} } 


date_default_timezone_set('Asia/Calcutta');
$xls_filename = 'FA_Attendance_Reports_'.date('d-m-Y').'.xls'; // Define Excel (.xls) file name
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
  $sql=mysql_query("select * from fa_notaccemp nf inner join hrm_sales_reporting_level rl on (nf.EmpId=rl.EmployeeID OR nf.EmpId=rl.R1 OR nf.EmpId=rl.R2 OR nf.EmpId=rl.R3 OR nf.EmpId=rl.R4) inner join fa_details fd on rl.EmployeeID=fd.Reporting where (nf.RepEmpId=".$ri." OR rl.EmployeeID=".$ri.") AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' order by FaId ASC",$con);
 }
 else
 {
  $sql=mysql_query("select * from fa_details fd inner join hrm_sales_reporting_level rl on fd.Reporting=rl.EmployeeID where (fd.Reporting=".$ri." OR rl.R1=".$ri." OR rl.R2=".$ri." OR rl.R3=".$ri." OR rl.R4=".$ri." OR rl.R5=".$ri.") AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' order by FaId ASC",$con);
 }	
 
} 
elseif($_REQUEST['s']=='All'){ $sql=mysql_query("select * from fa_details where ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' order by FaId ASC",$con); } elseif($_REQUEST['hq']>0){ $sql=mysql_query("select * from fa_details where HqId=".$_REQUEST['hq']." AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' order by FaId ASC",$con); }elseif($_REQUEST['s']>0){ $sql=mysql_query("select * from fa_details f inner join hrm_headquater hq on f.HqId=hq.HqId where hq.StateId=".$_REQUEST['s']." AND ((FaStatus='A' AND (f.LWD='0000-00-00' OR f.LWD='1970-01-01')) OR (FaStatus='D' AND f.LWD>='".date($y."-".$m."-01")."')) AND f.DOJ<='".date($y."-".$m."-31")."' order by FaId ASC",$con);}

echo "Sn\tName\tMode\tHq\tState\tCountry\tDOJ\tMonth\tYear\tTot-Present\tTot-Absent\t1-".$Mt."\t2-".$Mt."\t3-".$Mt."\t4-".$Mt."\t5-".$Mt."\t6-".$Mt."\t7-".$Mt."\t8-".$Mt."\t9-".$Mt."\t10-".$Mt."\t11-".$Mt."\t12-".$Mt."\t13-".$Mt."\t14-".$Mt."\t15-".$Mt."\t16-".$Mt."\t17-".$Mt."\t18-".$Mt."\t19-".$Mt."\t20-".$Mt."\t21-".$Mt."\t22-".$Mt."\t23-".$Mt."\t24-".$Mt."\t25-".$Mt."\t26-".$Mt."\t27-".$Mt."\t28-".$Mt."\t29-".$Mt."\t30-".$Mt."\t31-".$Mt;   
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
  $schema_insert .= date("d-m-y",strtotime($res['DOJ'])).$sep;
  $schema_insert .= $Mt.$sep;
  $schema_insert .= $_REQUEST['y'].$sep;

$p=mysql_query("select count(Attv)as P from fa_attd where Attv='P' AND FaId=".$res['FaId']." AND (Attd between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$day)."')",$con); $rp=mysql_fetch_assoc($p); if($rp['P']>0){$P=$rp['P'];}else{$P='';}
$a=mysql_query("select count(Attv)as A from fa_attd where Attv='A' AND FaId=".$res['FaId']." AND (Attd between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$day)."')",$con); $ra=mysql_fetch_assoc($a); if($ra['A']>0){$A=$ra['A'];}else{$A='';}
  $schema_insert .= $P.$sep;
  $schema_insert .= $A.$sep;
  
for($i=1; $i<=$day; $i++)
{ $sqlF=mysql_query("select * from fa_attd where FaId=".$res['FaId']." AND Attd='".date($y."-".$m."-".$i)."'", $con); $resF=mysql_fetch_array($sqlF); //if($resF['Attv']==''){ $att=''; } else {echo $att=$resF['Attv'];}
$schema_insert .= $resF['Attv'].$sep;
}     
			  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  $sn++; 
}
?>