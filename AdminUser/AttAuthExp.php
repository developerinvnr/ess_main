<?php 
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');
$sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $MY=$FD-1;  $PRD=$FD.'-'.$TD;
/*************************************************************************************************************/

$xls_filename = 'Att_Auth.xls';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t"; 
echo "Sn\tEmpCode\tName\tDate\tCreated\tInTime\tOutTime\tReason\tRemark\tIn-Reason\tIn-Remark\tOut-Reason\tOut-Remark\tReporting_Remark";
print("\n");


$BY=date("Y")-1;
if($_REQUEST['y']>=date("Y")){ $AttTable='hrm_employee_attendance'; }
elseif($_REQUEST['y']==$BY AND date("m")=='01'){ $AttTable='hrm_employee_attendance'; }
elseif($_REQUEST['y']==$BY AND date("m")>1){ $AttTable='hrm_employee_attendance_'.$_REQUEST['y']; }
else{$AttTable='hrm_employee_attendance_'.$_REQUEST['y']; }


if($_REQUEST['e']==0 OR $_REQUEST['e']==''){ $qemp='1=1'; }
elseif($_REQUEST['e']>0){ $qemp='rq.EmployeeID='.$_REQUEST['e']; }

if($_REQUEST['a']==0){$query2="select rq.* from hrm_employee_attendance_req rq inner join hrm_employee e on rq.EmployeeID=e.EmployeeID where e.CompanyId=".$_REQUEST['c']." AND ".$qemp." AND AttDate>='".$_REQUEST['y']."-01-01' AND AttDate<='".$_REQUEST['y']."-12-31' order by AttDate DESC"; }
elseif($_REQUEST['a']==1){$query2="select rq.* from hrm_employee_attendance_req rq inner join hrm_employee e on rq.EmployeeID=e.EmployeeID where e.CompanyId=".$_REQUEST['c']." AND ".$qemp." AND Status=0 AND AttDate>='".$_REQUEST['y']."-01-01' AND AttDate<='".$_REQUEST['y']."-12-31' order by AttDate DESC LIMIT "; }
elseif($_REQUEST['a']==2){$query2="select rq.* from hrm_employee_attendance_req rq inner join hrm_employee e on rq.EmployeeID=e.EmployeeID where e.CompanyId=".$_REQUEST['c']." AND ".$qemp." AND Status=1 AND AttDate>='".$_REQUEST['y']."-01-01' AND AttDate<='".$_REQUEST['y']."-12-31' order by AttDate DESC"; }
 $sql = mysql_query($query2,$con);
 $Sno=1; while($res=mysql_fetch_array($sql))
 { 
 
  $sqla = mysql_query("select Inn,Outt,InnLate,OuttLate from ".$AttTable." where EmployeeID=".$res['EmployeeID']." AND AttDate='".$res['AttDate']."'", $con); $resa=mysql_fetch_array($sqla);  
	    
  $sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,DesigId,DepartmentId from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID where e.EmployeeID=".$res['EmployeeID'], $con); 
  $resE=mysql_fetch_assoc($sqlE);
 
  $schema_insert = "";
  $schema_insert .= $Sno.$sep;
  $schema_insert .= $resE['EmpCode'].$sep;
  $schema_insert .= $resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'].$sep;		
  $schema_insert .= $res['AttDate'].$sep;
  $schema_insert .= $res['CrDate'].' '.$res['CrTime'].$sep;
  if($resa['Inn']!='' && $resa['Inn']!='00:00:00'){
  $schema_insert .= date("h:i",strtotime($resa['Inn'])).$sep; }
  else{ $schema_insert .= ''.$sep; }
  if($resa['Outt']!='' && $resa['Outt']!='00:00:00'){
  $schema_insert .= date("h:i",strtotime($resa['Outt'])).$sep; }
  else{ $schema_insert .= ''.$sep; }
 
  //if($res['Reason']!='')
  //{
   $schema_insert .= $res['Reason'].$sep;			  
   $schema_insert .= $res['Remark'].$sep;
   //if($res['Status']==0){$sts='Draft';}elseif($res['Status']==1){$sts='Pending';}elseif($res['Status']==2){$sts='Approved';}
   //$schema_insert .= $sts.$sep;
  //}
  
  //if($res['InReason']!='')
  //{
   $schema_insert .= $res['InReason'].$sep;			  
   $schema_insert .= $res['InRemark'].$sep;
   //if($res['InStatus']==0){$Insts='Draft';}elseif($res['InStatus']==1){$Insts='Pending';}elseif($res['InStatus']==2){$Insts='Approved';}
   //$schema_insert .= $Insts.$sep;
  //}
  
 //if($res['OutReason']!='')
  //{
   $schema_insert .= $res['OutReason'].$sep;			  
   $schema_insert .= $res['OutRemark'].$sep;
   //if($res['OutStatus']==0){$Outsts='Draft';}elseif($res['OutStatus']==1){$Outsts='Pending';}elseif($res['OutStatus']==2){$Outsts='Approved';}
   //$schema_insert .= $Outsts.$sep;
  //}
  
  $schema_insert .= $res['R_Remark'].$sep;
  
  
  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  $Sno++;
 }

?>