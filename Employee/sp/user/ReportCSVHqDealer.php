<?php require_once('config/config.php');

if($_REQUEST['action']=='HqDealExport') 
{  
  if($_REQUEST['t']=='hq')
  {$sqln=mysql_query("SELECT HqName as tN FROM hrm_headquater where HqId=".$_REQUEST['value'],$con); }
  elseif($_REQUEST['t']=='s')
  {$sqln=mysql_query("SELECT StateName as tN FROM hrm_state where StateId=".$_REQUEST['value'],$con);}
  elseif($_REQUEST['t']=='c')
  {$sqln=mysql_query("SELECT CountryName as tN FROM hrm_country where CountryId=".$_REQUEST['value'],$con);} 
  $resn=mysql_fetch_array($sqln);
 
  
#  Create the Column Headings
$csv_output .= '"Sn",';
$csv_output .= '"Dealer Name",';
$csv_output .= '"Dealer City",';
$csv_output .= '"DealerID",'; 
$csv_output .= '"Status",';
$csv_output .= '"Contact Person",';
$csv_output .= '"EmailID",';
$csv_output .= '"Contact-01",';
$csv_output .= '"Contact-02",';
$csv_output .= '"Address",';
$csv_output .= '"State",';
$csv_output .= '"HQ",';
$csv_output .= '"Hq_VC",';
$csv_output .= '"Hq_FC",';
$csv_output .= '"Territory_VC",';
//$csv_output .= '"Designation",';
$csv_output .= '"Reporting-2",';
$csv_output .= '"Designation",';
$csv_output .= '"Reporting-3",';
$csv_output .= '"Designation",';

$csv_output .= '"Territory_FC",';
//$csv_output .= '"Designation",';
$csv_output .= '"Reporting-2",';
$csv_output .= '"Designation",';
$csv_output .= '"Reporting-3",';
$csv_output .= '"Designation",';
//$csv_output .= '"Territory",';

$csv_output .= "\n";	

if($_REQUEST['t']=='hq')
{
  $sqlDeal=mysql_query("select * from hrm_sales_dealer where HqId=".$_REQUEST['value']." group by DealerId order by DealerName ASC",$con);
}
elseif($_REQUEST['t']=='s')
{
 $sqlDeal=mysql_query("select * from hrm_sales_dealer d inner join hrm_headquater hq on d.HqId=hq.HqId where hq.StateId=".$_REQUEST['value']." group by DealerId order by DealerName ASC",$con);
}
elseif($_REQUEST['t']=='c')
{
 $sqlDeal=mysql_query("select * from hrm_sales_dealer d inner join hrm_headquater hq on d.HqId=hq.HqId inner join hrm_state s on hq.StateId=s.StateId where s.CountryId=".$_REQUEST['value']." group by DealerId order by DealerName ASC",$con);
} 

$sn=1; $rowDeal=mysql_num_rows($sqlDeal); while($resDeal=mysql_fetch_assoc($sqlDeal)){

$csv_output .= '"'.str_replace('"', '""', $sn).'",';
$csv_output .= '"'.str_replace('"', '""', $resDeal['DealerName']).'",';
$csv_output .= '"'.str_replace('"', '""', $resDeal['DealerCity']).'",';

$LEC=strlen($resDeal['DealerId']); 
if($LEC==1){$EC='000'.$resDeal['DealerId'];} 
elseif($LEC==2){$EC='00'.$resDeal['DealerId'];} 
elseif($LEC==3){$EC='0'.$resDeal['DealerId'];} 
elseif($LEC>=4){$EC=$resDeal['DealerId'];}
$csv_output .= '"'.str_replace('"', '""',  "'".$EC."'").'",';

$csv_output .= '"'.str_replace('"', '""', $resDeal['DealerSts']).'",';
$csv_output .= '"'.str_replace('"', '""', $resDeal['DealerPerson']).'",';
$csv_output .= '"'.str_replace('"', '""', $resDeal['DealerEmail']).'",';
$csv_output .= '"'.str_replace('"', '""', $resDeal['DealerCont']).'",';
$csv_output .= '"'.str_replace('"', '""', $resDeal['DealerCont2']).'",';
$csv_output .= '"'.str_replace('"', '""', $resDeal['DealerAdd']).'",';

$sSt = mysql_query("SELECT HqName,StateName FROM hrm_state s inner join hrm_headquater hq on s.StateId=hq.StateId where HqId=".$resDeal['HqId'],$con); $rSt=mysql_fetch_assoc($sSt);
$csv_output .= '"'.str_replace('"', '""', $rSt['StateName']).'",';
$csv_output .= '"'.str_replace('"', '""', $rSt['HqName']).'",';

$sHqvc = mysql_query("SELECT HqName FROM hrm_headquater where HqId=".$resDeal['Hq_vc'],$con); 
$sHqfc = mysql_query("SELECT HqName FROM hrm_headquater where HqId=".$resDeal['Hq_fc'],$con); 
$rHqvc=mysql_fetch_assoc($sHqvc); $rHqfc=mysql_fetch_assoc($sHqfc);
$csv_output .= '"'.str_replace('"', '""', strtoupper($rHqvc['HqName'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($rHqfc['HqName'])).'",';

$sTrvc = mysql_query("SELECT Fname,Sname,Lname FROM hrm_employee where EmployeeID=".$resDeal['Terr_vc'],$con);
$sTrfc = mysql_query("SELECT Fname,Sname,Lname FROM hrm_employee where EmployeeID=".$resDeal['Terr_fc'],$con); 
$rTrvc=mysql_fetch_assoc($sTrvc); $TrrVc=$rTrvc['Fname'].' '.$rTrvc['Sname'].' '.$rTrvc['Lname'];
$rTrfc=mysql_fetch_assoc($sTrfc); $TrrFc=$rTrfc['Fname'].' '.$rTrfc['Sname'].' '.$rTrfc['Lname'];
$csv_output .= '"'.str_replace('"', '""', strtoupper($TrrVc)).'",';

$s123=mysql_query("select R1,R2 from hrm_sales_reporting_level where EmployeeID=".$resDeal['Terr_vc'],$con); 
$row123=mysql_num_rows($s123); $r123=mysql_fetch_assoc($s123); 
if($r123['R1']>0){ $sR1=mysql_query("select Fname,Sname,Lname,DesigName from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_designation de ON g.DesigId=de.DesigId where e.EmployeeID=".$r123['R1']." AND e.CompanyId=1", $con);  $rR1=mysql_fetch_assoc($sR1); }
if($r123['R2']>0){ $sR2=mysql_query("select Fname,Sname,Lname,DesigName from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_designation de ON g.DesigId=de.DesigId where e.EmployeeID=".$r123['R2']." AND e.CompanyId=1", $con); $rR2=mysql_fetch_assoc($sR2); }
if($r123['R1']!=51 AND $r123['R1']!=224 AND $row123>0){$R1Name=$rR1['Fname'].' '.$rR1['Sname'].' '.$rR1['Lname']; $DesigR1=$rR1['DesigName'];}else{$R1Name=''; $DesigR1='';}
if($r123['R2']!=51 AND $r123['R2']!=224 AND $row123>0){$R2Name=$rR2['Fname'].' '.$rR2['Sname'].' '.$rR2['Lname']; $DesigR2=$rR2['DesigName'];}else{$R2Name=''; $DesigR2='';}
$csv_output .= '"'.str_replace('"', '""', $R1Name).'",';
$csv_output .= '"'.str_replace('"', '""', $DesigR1).'",';
$csv_output .= '"'.str_replace('"', '""', $R2Name).'",';
$csv_output .= '"'.str_replace('"', '""', $DesigR2).'",';

$csv_output .= '"'.str_replace('"', '""', strtoupper($TrrFc)).'",';
$s123f=mysql_query("select R1,R2 from hrm_sales_reporting_level where EmployeeID=".$resDeal['Terr_fc'],$con); 
$row123f=mysql_num_rows($s123f); $r123f=mysql_fetch_assoc($s123f); 
if($r123f['R1']>0){ $sR1f=mysql_query("select Fname,Sname,Lname,DesigName from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_designation de ON g.DesigId=de.DesigId where e.EmployeeID=".$r123f['R1']." AND e.CompanyId=1", $con);  $rR1f=mysql_fetch_assoc($sR1f); }
if($r123f['R2']>0){ $sR2f=mysql_query("select Fname,Sname,Lname,DesigName from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_designation de ON g.DesigId=de.DesigId where e.EmployeeID=".$r123f['R2']." AND e.CompanyId=1", $con); $rR2f=mysql_fetch_assoc($sR2f); }

if($r123f['R1']!=51 AND $r123f['R1']!=224 AND $row123f>0){$R1Namef=$rR1f['Fname'].' '.$rR1f['Sname'].' '.$rR1f['Lname']; $DesigR1f=$rR1f['DesigName'];}else{$R1Namef=''; $DesigR1f='';}
if($r123f['R2']!=51 AND $r123f['R2']!=224 AND $row123f>0){$R2Namef=$rR2f['Fname'].' '.$rR2f['Sname'].' '.$rR2f['Lname']; $DesigR2f=$rR2f['DesigName'];}else{$R2Namef=''; $DesigR2f='';}
$csv_output .= '"'.str_replace('"', '""', $R1Namef).'",';
$csv_output .= '"'.str_replace('"', '""', $DesigR1f).'",';
$csv_output .= '"'.str_replace('"', '""', $R2Namef).'",';
$csv_output .= '"'.str_replace('"', '""', $DesigR2f).'",';

//$csv_output .= '"'.str_replace('"', '""', $rRE['Fname'].' '.$rRE['Sname'].' '.$rRE['Lname']).'",';
//$csv_output .= '"'.str_replace('"', '""', $rRE['DesigName']).'",';

$csv_output .= "\n";
$sn++; }

# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=DealerList_".$resn['tN'].".csv");
echo $csv_output;
exit;
}

elseif($_REQUEST['action']=='CoOnlyDealExport') 
{ 
#  Create the Column Headings
$csv_output .= '"Sn",';
$csv_output .= '"Territory_VC",';
$csv_output .= '"Designation",';
$csv_output .= '"Reporting-2",';
$csv_output .= '"Designation",';
$csv_output .= '"Reporting-3",';
$csv_output .= '"Designation",';
$csv_output .= '"Reporting-4",';
$csv_output .= '"Designation",';
$csv_output .= '"Reporting-5",';
$csv_output .= '"Designation",';


$csv_output .= "\n";	
	
$s123=mysql_query("select * from hrm_sales_reporting_level",$con); $sn=1; while($r123=mysql_fetch_assoc($s123)){ 

if($r123['R1']>0){ $sR1=mysql_query("select Fname,Sname,Lname,DesigName from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_designation ON hrm_employee_general.DesigId=hrm_designation.DesigId where hrm_employee.EmployeeID=".$r123['R1']." AND hrm_employee.CompanyId=1", $con);  
$rR1=mysql_fetch_assoc($sR1); }
if($r123['R2']>0){ $sR2=mysql_query("select Fname,Sname,Lname,DesigName from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_designation ON hrm_employee_general.DesigId=hrm_designation.DesigId where hrm_employee.EmployeeID=".$r123['R2']." AND hrm_employee.CompanyId=1", $con); 
$rR2=mysql_fetch_assoc($sR2); }
if($r123['R3']>0){ $sR3=mysql_query("select Fname,Sname,Lname,DesigName from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_designation ON hrm_employee_general.DesigId=hrm_designation.DesigId where hrm_employee.EmployeeID=".$r123['R3']." AND hrm_employee.CompanyId=1", $con); 
$rR3=mysql_fetch_assoc($sR3); }
if($r123['R4']>0){ $sR4=mysql_query("select Fname,Sname,Lname,DesigName from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_designation ON hrm_employee_general.DesigId=hrm_designation.DesigId where hrm_employee.EmployeeID=".$r123['R4']." AND hrm_employee.CompanyId=1", $con); 
$rR4=mysql_fetch_assoc($sR4); }
if($r123['EmployeeID']>0){ $sRE=mysql_query("select Fname,Sname,Lname,DesigName from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_designation ON hrm_employee_general.DesigId=hrm_designation.DesigId where hrm_employee.EmployeeID=".$r123['EmployeeID']." AND hrm_employee.CompanyId=1", $con); 
$rRE=mysql_fetch_assoc($sRE); }
$csv_output .= '"'.str_replace('"', '""', $sn).'",';

$csv_output .= '"'.str_replace('"', '""', $rRE['Fname'].' '.$rRE['Sname'].' '.$rRE['Lname']).'",';
$csv_output .= '"'.str_replace('"', '""', $rRE['DesigName']).'",';
$R1Name=$rR1['Fname'].' '.$rR1['Sname'].' '.$rR1['Lname']; $DesigR1=$rR1['DesigName'];
$R2Name=$rR2['Fname'].' '.$rR2['Sname'].' '.$rR2['Lname']; $DesigR2=$rR2['DesigName'];
$csv_output .= '"'.str_replace('"', '""', $R1Name).'",';
$csv_output .= '"'.str_replace('"', '""', $DesigR1).'",';
$csv_output .= '"'.str_replace('"', '""', $R2Name).'",';
$csv_output .= '"'.str_replace('"', '""', $DesigR2).'",';
$R3Name=$rR3['Fname'].' '.$rR3['Sname'].' '.$rR3['Lname']; $DesigR3=$rR3['DesigName'];
$R4Name=$rR4['Fname'].' '.$rR4['Sname'].' '.$rR4['Lname']; $DesigR4=$rR4['DesigName'];
$csv_output .= '"'.str_replace('"', '""', $R3Name).'",';
$csv_output .= '"'.str_replace('"', '""', $DesigR3).'",';
$csv_output .= '"'.str_replace('"', '""', $R4Name).'",';
$csv_output .= '"'.str_replace('"', '""', $DesigR4).'",';
$csv_output .= "\n";
$sn++; }

# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=ReportingList_OnlySalesTeam.csv");
echo $csv_output;
exit;
}


?>