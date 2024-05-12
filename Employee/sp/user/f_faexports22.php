<?php
session_start();
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');
$xls_filename = 'FA_Reports_'.date('d-m-Y').'.xls'; // Define Excel (.xls) file name
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

echo "Sn\tName\tMode\tHq\tState\tCountry\tDOJ\tDOB\tStatus\tExpenses\tExpenses\tFA HQ\tExpen. Dis.\tExpen. Mode\tEmailID\tJob Status \tReporting\tRep:Level-2\tRep:Level-3\tContact1\tContact2\tGender\tMarried\tBloodGroup\tQuali\tLocation\tAdd1\tAdd2\tBank-Branch\tAccountNo\tAadhar\tDL\tPan\tVoterId\tPhoto\tResume\tAny1\tAny2";  //\tCrop\tDistributor
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
  $schema_insert .= date("d-m-y",strtotime($res['DOB'])).$sep;	
  $schema_insert .= $res['FaStatus'].$sep;
  $schema_insert .= floatval($res['Salary']).$sep ;
  $schema_insert .= floatval($res['Expences']).$sep;
  $schema_insert .= floatval($res['OtherHq']).$sep;

/* 
$crp=mysql_query("select ItemName from fa_details_crop rc inner join hrm_sales_seedsitem si on rc.ItemId=si.ItemId where FaId=".$res['FaId']." order by ItemName ASC",$con);  
  $schema_insert .= while($rcrp=mysql_fetch_assoc($crp)){ echo ucfirst(strtolower($rcrp['ItemName'])).', '; }.$sep;
$dis=mysql_query("select DealerName from fa_details_dealer rd inner join hrm_sales_dealer sd on rd.DealerId=sd.DealerId where FaId=".$res['FaId']." order by DealerName ASC",$con);  
  $schema_insert .= while($rdis=mysql_fetch_assoc($dis)){ echo ucfirst(strtolower($rdis['DealerName'])).', '; }.$sep;
*/    

$dis2=mysql_query("select DealerName from hrm_sales_dealer where DealerId=".$res['Sal_DealerId'],$con); 
$rdis2=mysql_fetch_assoc($dis2);
  $schema_insert .= ucfirst(strtolower($rdis2['DealerName'])).$sep;
  $schema_insert .= $res['SalaryMode'].$sep;
  $schema_insert .= $res['EmailId'].$sep;
  $schema_insert .= $res['JobStatus'].$sep;
$e=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$res['Reporting'],$con); 
$re=mysql_fetch_assoc($e);  
  $schema_insert .= ucfirst(strtolower($re['Fname'].' '.$re['Sname'].' '.$re['Lname'])).$sep;
$sqlL=mysql_query("select R1,R2 from hrm_sales_reporting_level where EmployeeID=".$res['Reporting'],$con); 
$resL=mysql_fetch_assoc($sqlL); 
if($resL['R1']>0){ $e1=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$resL['R1'],$con); $r1=mysql_fetch_assoc($e1); $rr1=$r1['Fname'].' '.$r1['Sname'].' '.$r1['Lname'];}else{$rr1='';}
if($resL['R2']>0){ $e2=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$resL['R2'],$con); $r2=mysql_fetch_assoc($e2); $rr2=$r2['Fname'].' '.$r2['Sname'].' '.$r2['Lname'];}else{$rr2='';}
  $schema_insert .= ucfirst(strtolower($rr1)).$sep;
  $schema_insert .= ucfirst(strtolower($rr2)).$sep;
  
  $schema_insert .= $res['ContactNo'].$sep;
  $schema_insert .= $res['Contact2No'].$sep;
  $schema_insert .= $res['Gender'].$sep;
  $schema_insert .= $res['Married'].$sep;
  $schema_insert .= $res['BloodGroup'].$sep;
  $schema_insert .= $res['Qualif'].$sep;
  $schema_insert .= $res['Location'].$sep;
  $schema_insert .= $res['Address1'].$sep;
  $schema_insert .= $res['Address2'].$sep;
  $schema_insert .= $res['BankName'].$sep;
  $schema_insert .= $res['AccountNo'].$sep;
  $schema_insert .= $res['AadharNo'].$sep;
  $schema_insert .= $res['DrivLic'].$sep;
  $schema_insert .= $res['PanNo'].$sep;
  $schema_insert .= $res['VoterId'].$sep;
if($res['Upld_pic']!=''){$pic='ok';}else{$pic='';}  
  $schema_insert .= $pic.$sep;
if($res['Upld_resume']!=''){$resume='ok';}else{$resume='';}   
  $schema_insert .= $resume.$sep;
if($res['Upld_other1']!=''){$oth1='ok';}else{$oth1='';}   
  $schema_insert .= $oth1.$sep; 
if($res['Upld_other2']!=''){$oth2='ok';}else{$oth2='';}   
  $schema_insert .= $oth2.$sep;
  						  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  $sn++; 
}
?>