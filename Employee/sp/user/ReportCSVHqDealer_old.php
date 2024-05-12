<?php require_once('config/config.php');

if($_REQUEST['action']=='HqDealExport') 
{  $sqlhq=mysql_query("SELECT HqName FROM hrm_headquater where HqId=".$_REQUEST['value'], $con); $reshq=mysql_fetch_array($sqlhq);
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
$csv_output .= '"Territory",';
$csv_output .= '"Designation",';
$csv_output .= '"Reporting-2",';
$csv_output .= '"Designation",';
$csv_output .= '"Reporting-3",';
$csv_output .= '"Designation",';
$csv_output .= "\n";		
$sqlDeal=mysql_query("select * from hrm_sales_dealer where HqId=".$_REQUEST['value']." order by DealerName ASC",$con); $sn=1; $rowDeal=mysql_num_rows($sqlDeal); while($resDeal=mysql_fetch_assoc($sqlDeal)){
$s123=mysql_query("select hrm_sales_reporting_level.EmployeeID,R1,R2 from hrm_sales_reporting_level INNER JOIN hrm_sales_hq_temp ON hrm_sales_reporting_level.EmployeeID=hrm_sales_hq_temp.EmployeeID where hrm_sales_hq_temp.HqId=".$resDeal['HqId']." AND HqTEmpStatus='A'",$con); $r123=mysql_fetch_assoc($s123); 
if($r123['R1']>0){ $sR1=mysql_query("select Fname,Sname,Lname,DesigName from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_designation ON hrm_employee_general.DesigId=hrm_designation.DesigId where hrm_employee.EmployeeID=".$r123['R1']." AND hrm_employee.CompanyId=1", $con);  
$rR1=mysql_fetch_assoc($sR1); }
if($r123['R2']>0){ $sR2=mysql_query("select Fname,Sname,Lname,DesigName from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_designation ON hrm_employee_general.DesigId=hrm_designation.DesigId where hrm_employee.EmployeeID=".$r123['R2']." AND hrm_employee.CompanyId=1", $con); 
$rR2=mysql_fetch_assoc($sR2); }
if($r123['EmployeeID']>0){ $sRE=mysql_query("select Fname,Sname,Lname,DesigName from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_designation ON hrm_employee_general.DesigId=hrm_designation.DesigId where hrm_employee.EmployeeID=".$r123['EmployeeID']." AND hrm_employee.CompanyId=1", $con); 
$rRE=mysql_fetch_assoc($sRE); }
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
$csv_output .= '"'.str_replace('"', '""', $rRE['Fname'].' '.$rRE['Sname'].' '.$rRE['Lname']).'",';
$csv_output .= '"'.str_replace('"', '""', $rRE['DesigName']).'",';
if($r123['R1']!=51 AND $r123['R1']!=224){$R1Name=$rR1['Fname'].' '.$rR1['Sname'].' '.$rR1['Lname']; $DesigR1=$rR1['DesigName'];}else{$R1Name=''; $DesigR1='';}
if($r123['R2']!=51 AND $r123['R2']!=224){$R2Name=$rR2['Fname'].' '.$rR2['Sname'].' '.$rR2['Lname']; $DesigR2=$rR2['DesigName'];}else{$R2Name=''; $DesigR2='';}
$csv_output .= '"'.str_replace('"', '""', $R1Name).'",';
$csv_output .= '"'.str_replace('"', '""', $DesigR1).'",';
$csv_output .= '"'.str_replace('"', '""', $R2Name).'",';
$csv_output .= '"'.str_replace('"', '""', $DesigR2).'",';
$csv_output .= "\n";
$sn++; }

# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=DealerList_".$reshq['HqName'].".csv");
echo $csv_output;
exit;
}

elseif($_REQUEST['action']=='StDealExport') 
{  $sqlS=mysql_query("SELECT StateName FROM hrm_state where StateId=".$_REQUEST['value'], $con); $resS=mysql_fetch_array($sqlS);
#  Create the Column Headings
$csv_output .= '"Sn",';
$csv_output .= '"HeadQuarter Name",'; 
$csv_output .= '"Dealer Name",';
$csv_output .= '"Dealer City",'; 
$csv_output .= '"DealerID",';
$csv_output .= '"Status",';
$csv_output .= '"Contact Person",';
$csv_output .= '"EmailID",';
$csv_output .= '"Contact-01",';
$csv_output .= '"Contact-02",';
$csv_output .= '"Address",';
$csv_output .= '"Territory",';
$csv_output .= '"Designation",';
$csv_output .= '"Reporting-2",';
$csv_output .= '"Designation",';
$csv_output .= '"Reporting-3",';
$csv_output .= '"Designation",';
$csv_output .= "\n";		
$sqlDeal=mysql_query("select hrm_sales_dealer.*,HqName from hrm_sales_dealer INNER JOIN hrm_headquater ON hrm_sales_dealer.HqId=hrm_headquater.HqId where hrm_headquater.StateId=".$_REQUEST['value']." order by HqName ASC, DealerName ASC",$con); $sn=1; while($resDeal=mysql_fetch_assoc($sqlDeal)){
$s123=mysql_query("select hrm_sales_reporting_level.EmployeeID,R1,R2 from hrm_sales_reporting_level INNER JOIN hrm_sales_hq_temp ON hrm_sales_reporting_level.EmployeeID=hrm_sales_hq_temp.EmployeeID where hrm_sales_hq_temp.HqId=".$resDeal['HqId']." AND HqTEmpStatus='A'",$con); $r123=mysql_fetch_assoc($s123); 
if($r123['R1']>0){ $sR1=mysql_query("select Fname,Sname,Lname,DesigName from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_designation ON hrm_employee_general.DesigId=hrm_designation.DesigId where hrm_employee.EmployeeID=".$r123['R1']." AND hrm_employee.CompanyId=1", $con);  
$rR1=mysql_fetch_assoc($sR1); }
if($r123['R2']>0){ $sR2=mysql_query("select Fname,Sname,Lname,DesigName from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_designation ON hrm_employee_general.DesigId=hrm_designation.DesigId where hrm_employee.EmployeeID=".$r123['R2']." AND hrm_employee.CompanyId=1", $con); 
$rR2=mysql_fetch_assoc($sR2); }
if($r123['EmployeeID']>0){ $sRE=mysql_query("select Fname,Sname,Lname,DesigName from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_designation ON hrm_employee_general.DesigId=hrm_designation.DesigId where hrm_employee.EmployeeID=".$r123['EmployeeID']." AND hrm_employee.CompanyId=1", $con); 
$rRE=mysql_fetch_assoc($sRE); }
$csv_output .= '"'.str_replace('"', '""', $sn).'",';
$csv_output .= '"'.str_replace('"', '""', $resDeal['HqName']).'",';
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
$csv_output .= '"'.str_replace('"', '""', $rRE['Fname'].' '.$rRE['Sname'].' '.$rRE['Lname']).'",';
$csv_output .= '"'.str_replace('"', '""', $rRE['DesigName']).'",';
if($r123['R1']!=51 AND $r123['R1']!=224){$R1Name=$rR1['Fname'].' '.$rR1['Sname'].' '.$rR1['Lname']; $DesigR1=$rR1['DesigName'];}else{$R1Name=''; $DesigR1='';}
if($r123['R2']!=51 AND $r123['R2']!=224){$R2Name=$rR2['Fname'].' '.$rR2['Sname'].' '.$rR2['Lname']; $DesigR2=$rR2['DesigName'];}else{$R2Name=''; $DesigR2='';}
$csv_output .= '"'.str_replace('"', '""', $R1Name).'",';
$csv_output .= '"'.str_replace('"', '""', $DesigR1).'",';
$csv_output .= '"'.str_replace('"', '""', $R2Name).'",';
$csv_output .= '"'.str_replace('"', '""', $DesigR2).'",';
$csv_output .= "\n";
$sn++; }

# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=DealerList_".$resS['StateName'].".csv");
echo $csv_output;
exit;
}

elseif($_REQUEST['action']=='CoDealExport') 
{ $sqlC=mysql_query("SELECT CountryName FROM hrm_country where CountryId=".$_REQUEST['value'], $con); $resC=mysql_fetch_array($sqlC);
#  Create the Column Headings
$csv_output .= '"Sn",';
$csv_output .= '"State",'; 
$csv_output .= '"State-ID",'; 
$csv_output .= '"HeadQuarter Name",'; 
$csv_output .= '"HQ-ID",';
$csv_output .= '"Dealer Name",'; 
$csv_output .= '"Dealer City",';
$csv_output .= '"DealerID",';
$csv_output .= '"Status",';
$csv_output .= '"Contact Person",';
$csv_output .= '"EmailID",';
$csv_output .= '"Contact-01",';
$csv_output .= '"Contact-02",';
$csv_output .= '"Address",';
$csv_output .= '"Territory",';
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
$sqlDeal=mysql_query("select hrm_sales_dealer.*,hrm_state.StateId,StateName,HqName from hrm_sales_dealer INNER JOIN hrm_headquater ON hrm_sales_dealer.HqId=hrm_headquater.HqId INNER JOIN hrm_state ON hrm_headquater.StateId=hrm_state.StateId where hrm_state.CountryId=".$_REQUEST['value']." order by StateName ASC,HqName ASC,DealerName ASC",$con); 
$sn=1; while($resDeal=mysql_fetch_assoc($sqlDeal)){ 
$s123=mysql_query("select hrm_sales_reporting_level.EmployeeID,R1,R2,R3,R4 from hrm_sales_reporting_level INNER JOIN hrm_sales_hq_temp ON hrm_sales_reporting_level.EmployeeID=hrm_sales_hq_temp.EmployeeID where hrm_sales_hq_temp.HqId=".$resDeal['HqId']." AND HqTEmpStatus='A'",$con); $r123=mysql_fetch_assoc($s123); 
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
$csv_output .= '"'.str_replace('"', '""', $resDeal['StateName']).'",';
$csv_output .= '"'.str_replace('"', '""', $resDeal['StateId']).'",';
$csv_output .= '"'.str_replace('"', '""', $resDeal['HqName']).'",';
$csv_output .= '"'.str_replace('"', '""', $resDeal['HqId']).'",';
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
header("Content-Disposition: attachment; filename=DealerList_".$resC['CountryName'].".csv");
echo $csv_output;
exit;
}


elseif($_REQUEST['action']=='CoOnlyDealExport') 
{ 
#  Create the Column Headings
$csv_output .= '"Sn",';
$csv_output .= '"Territory",';
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