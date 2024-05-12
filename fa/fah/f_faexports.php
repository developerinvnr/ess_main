<?php
session_start();
require_once('../../Employee/sp/user/config/config.php');
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
if($_REQUEST['md']==4){ $mod=''; }else{ $mod='AND Mode='.$_REQUEST['md']; }
if($_REQUEST['s']=='All')
{ 
if($_REQUEST['sts']==''){ $sql=mysql_query("select * from fa_details where (FaStatus='A' OR FaStatus='D') ".$mod." order by FaId ASC",$con); }else{ $sql=mysql_query("select * from fa_details where FaStatus='".$_REQUEST['sts']."' ".$mod." order by FaId ASC",$con); } 
}
elseif($_REQUEST['rbm']>0 OR $_REQUEST['abm']>0)  ///1111111111111///
{
 ////////////////////////////////////
 if($_REQUEST['rbm']>0){$ri=$_REQUEST['rbm'];}else{$ri=$_REQUEST['abm'];}
 $sqlee=mysql_query("select * from fa_notaccemp where RepEmpId=".$ri,$con); $rowee=mysql_num_rows($sqlee);
 if($rowee>0)
 {
  if($_REQUEST['sts']==''){ $sql=mysql_query("select * from fa_notaccemp nf inner join hrm_sales_reporting_level rl on (nf.RepEmpId=rl.EmployeeID OR nf.EmpId=rl.EmployeeID OR nf.EmpId=rl.R1 OR nf.EmpId=rl.R2 OR nf.EmpId=rl.R3 OR nf.EmpId=rl.R4) inner join fa_details fd on rl.EmployeeID=fd.Reporting where (nf.RepEmpId=".$ri." OR rl.EmployeeID=".$ri.") AND FaStatus='".$_REQUEST['sts']."' ".$mod." group by FaId order by FaId",$con);}else{$sql=mysql_query("select * from fa_notaccemp nf inner join hrm_sales_reporting_level rl on (nf.RepEmpId=rl.EmployeeID OR nf.EmpId=rl.EmployeeID OR nf.EmpId=rl.R1 OR nf.EmpId=rl.R2 OR nf.EmpId=rl.R3 OR nf.EmpId=rl.R4) inner join fa_details fd on rl.EmployeeID=fd.Reporting where (nf.RepEmpId=".$ri." OR rl.EmployeeID=".$ri.") ".$mod." group by FaId order by FaId",$con);}
   
 }
 else
 {
  if($_REQUEST['sts']==''){
  $sql=mysql_query("select * from fa_details fd inner join hrm_sales_reporting_level rl on fd.Reporting=rl.EmployeeID where (FaStatus='A' OR FaStatus='D') AND (fd.Reporting=".$ri." OR rl.R1=".$ri." OR rl.R2=".$ri." OR rl.R3=".$ri." OR rl.R4=".$ri." OR rl.R5=".$ri.") ".$mod." order by FaId ASC",$con);}else{$sql=mysql_query("select * from fa_details fd inner join hrm_sales_reporting_level rl on fd.Reporting=rl.EmployeeID where (fd.Reporting=".$ri." OR rl.R1=".$ri." OR rl.R2=".$ri." OR rl.R3=".$ri." OR rl.R4=".$ri." OR rl.R5=".$ri.") AND FaStatus='".$_REQUEST['sts']."' ".$mod." order by FaId ASC",$con);}
 }
 /////////////////////////////////////
}
elseif($_REQUEST['hq']>0)
{ 
if($_REQUEST['sts']==''){ $sql=mysql_query("select * from fa_details where (FaStatus='A' OR FaStatus='D') AND HqId=".$_REQUEST['hq']." ".$mod." order by FaId ASC",$con); }else{ $sql=mysql_query("select * from fa_details where HqId=".$_REQUEST['hq']." AND FaStatus='".$_REQUEST['sts']."' ".$mod." order by FaId ASC",$con); }
}
elseif($_REQUEST['s']>0)
{ 
if($_REQUEST['sts']==''){ $sql=mysql_query("select * from fa_details f inner join hrm_headquater hq on f.HqId=hq.HqId where (f.FaStatus='A' OR f.FaStatus='D') AND hq.StateId=".$_REQUEST['s']." ".$mod." order by FaId ASC",$con); }else{ $sql=mysql_query("select * from fa_details f inner join hrm_headquater hq on f.HqId=hq.HqId where hq.StateId=".$_REQUEST['s']." AND FaStatus='".$_REQUEST['sts']."' ".$mod." order by FaId ASC",$con); }
}

echo "Sn\tName\tMode\tHq\tState\tCountry\tDOJ\tLWD\tDOB\tStatus\tExpenses\tExpenses\tFA HQ\tExpen. Dis.\tExpen. Mode\tEmailID\tJob Status \tReporting\tRep:Level-2\tRep:Level-3\tContact1\tContact2\tGender\tMarried\tBloodGroup\tQuali\tLocation\tAdd1\tAdd2\tBank-Branch\tAccountNo\tAadhar\tDL\tPan\tVoterId\tPhoto\tResume\tAny1\tAny2";  //\tCrop\tDistributor
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
  $schema_insert .= $res['DOJ'].$sep;
  if($res['LWD']!='1970-01-01' AND $res['LWD']!='0000-00-00'){ $LWD=$res['LWD']; }else{$LWD='';}
  $schema_insert .= $LWD.$sep;
  $schema_insert .= $res['DOB'].$sep;	
  $schema_insert .= $res['FaStatus'].$sep;
  $schema_insert .= floatval($res['Salary']).$sep ;
  $schema_insert .= floatval($res['Expences']).$sep;
  $schema_insert .= $res['OtherHq'].$sep;

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