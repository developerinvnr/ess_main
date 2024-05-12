<?php
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');

$xls_filename = 'Training-Reports.xls';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t"; 
echo "Sn\tTitle\tDate\tDuration\tInstitute\tTrainer\tLocation\tCost\tMandays\tTotal Participants\tParticipants Name\tDepartment\t\t\t\t\t\t";
print("\n");

if($_REQUEST['v']!='All')
{ $sqlT = mysql_query("SELECT * from hrm_company_training WHERE TraYear=".$_REQUEST['v']." AND CompanyId=".$_REQUEST['C']." order by TraFrom DESC", $con); }
else{ $sqlT = mysql_query("SELECT * from hrm_company_training WHERE CompanyId=".$_REQUEST['C']." order by TraFrom DESC", $con); }
 $no=1; while($resT = mysql_fetch_assoc($sqlT)) 
 { 
 
  $spar=mysql_query("select * from hrm_company_training_participant where TrainingId=".$resT['TrainingId'],$con);
  $row=mysql_num_rows($spar);
if($row>0)
{
  	
  
  $sn=1; while($rpar=mysql_fetch_assoc($spar))
  {
  
    if($rpar['EmployeeID']>0)	
   	{
      $semp=mysql_query("select EmpCode,Fname,Sname,Lname,DepartmentName from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId where e.EmployeeID=".$rpar['EmployeeID'],$con);   	
      $remp=mysql_fetch_assoc($semp); $name=$remp['EmpCode'].'-'.$remp['Fname'].' '.$remp['Sname'].' '.$remp['Lname'];
      $dept=$remp['DepartmentName'];
    }
    else{ $name=$rpar['OtherName']; $dept=''; }
	
  $blank='.';
   
  $schema_insert = "";
  
  if($nno!=$no)
  {
  $schema_insert .= $no.$sep;
  $schema_insert .= $resT['TraTitle'].$sep;
  $schema_insert .= date("d-M-y",strtotime($resT['TraFrom'])).$sep;		
  $schema_insert .= $resT['Duration'].$sep;
  $schema_insert .= $resT['Institute'].$sep;
  $schema_insert .= $resT['TrainerName'].$sep;
  $schema_insert .= $resT['Location'].$sep;
  $schema_insert .= $resT['TotalCost'].$sep;
  $schema_insert .= $resT['Man_Day'].$sep;	
  $schema_insert .= $resT['TotalParticipant'].$sep;
  }
  else
  {
  $schema_insert .= $blank.$sep;
  $schema_insert .= $blank.$sep;
  $schema_insert .= $blank.$sep;		
  $schema_insert .= $blank.$sep;
  $schema_insert .= $blank.$sep;
  $schema_insert .= $blank.$sep;
  $schema_insert .= $blank.$sep;
  $schema_insert .= $blank.$sep;
  $schema_insert .= $blank.$sep;
  $schema_insert .= $blank.$sep;
  }
    
  
  $schema_insert .= $name.$sep;
  $schema_insert .= $dept.$sep;

			  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  
  $sn++; $nno=$no;
   	
  }  
  print "\n";
  
} //$row  
else
{
  $schema_insert = "";
  $schema_insert .= $no.$sep;
  $schema_insert .= $resT['TraTitle'].$sep;
  $schema_insert .= date("d-M-y",strtotime($resT['TraFrom'])).$sep;		
  $schema_insert .= $resT['Duration'].$sep;
  $schema_insert .= $resT['Institute'].$sep;
  $schema_insert .= $resT['TrainerName'].$sep;
  $schema_insert .= $resT['Location'].$sep;
  $schema_insert .= $resT['TotalCost'].$sep;
  
  //$qcost=mysql_query("select c.*,Particular from hrm_company_training_cost c inner join hrm_company_training_particular p on c.ParticularId=p.ParticularId where c.TrainingId=".$resT['TrainingId'],$con); 
  //while($rcost=mysql_fetch_assoc($qcost)){ $arrayc[]=$rcost['Particular'].'-'.$rcost['Amount']; }
  //$CostDetails = implode(',', $arrayc);
  //$schema_insert .= $CostDetails.$sep;
  
  $schema_insert .= $resT['TotalParticipant'].$sep;
  $blank='';
  $schema_insert .= $blank.$sep;
  $schema_insert .= $blank.$sep;
  $schema_insert .= $resT['Man_Day'].$sep;
			  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
}
  
  $no++;
 } //while
?>




<?php /*
require_once('config/config.php');
#  Create the Column Headings
$csv_output .= '"Sn",'; 
$csv_output .= '"Title",';
$csv_output .= '"Date",';
$csv_output .= '"Duration",';
$csv_output .= '"Institute",';
$csv_output .= '"Trainer",';	
$csv_output .= '"Location",';	
$csv_output .= '"Cost",';
$csv_output .= '"Total Participants",';
$csv_output .= '"Mandays",';
$csv_output .= "\n";		
# Get Users Details form the DB #$result = mysql_query("SELECT * from formResults WHERE formID = '$formID'" );

 if($_REQUEST['v']!='All'){ $sqlT = mysql_query("SELECT * from hrm_company_training WHERE TraYear=".$_REQUEST['v']." AND CompanyId=".$_REQUEST['C']." order by TraFrom DESC", $con); }
 if($_REQUEST['v']=='All'){ $sqlT = mysql_query("SELECT * from hrm_company_training WHERE CompanyId=".$_REQUEST['C']." order by TraFrom DESC", $con); }
 $Sno=1; while($resT = mysql_fetch_assoc($sqlT)) { 
 
$csv_output .= '"'.str_replace('"', '""', $Sno).'",';
$csv_output .= '"'.str_replace('"', '""', $resT['TraTitle']).'",';
$csv_output .= '"'.str_replace('"', '""', date("d-M-y",strtotime($resT['TraFrom']))).'",';
$csv_output .= '"'.str_replace('"', '""', $resT['Duration']).'",';
$csv_output .= '"'.str_replace('"', '""', $resT['Institute']).'",';	
$csv_output .= '"'.str_replace('"', '""', $resT['TrainerName']).'",';
$csv_output .= '"'.str_replace('"', '""', $resT['Location']).'",';
$csv_output .= '"'.str_replace('"', '""', $resT['TotalCost']).'",';
$csv_output .= '"'.str_replace('"', '""', $resT['TotalParticipant']).'",';
$csv_output .= '"'.str_replace('"', '""', $resT['Man_Day']).'",';
$csv_output .= "\n";
$Sno++; }

# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=Training-Reports.csv");
echo $csv_output;
exit;
*/

?>