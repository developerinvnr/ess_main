<?php 
require_once('config/config.php');
/*************************************************************************************************************/

if($_REQUEST['action']='RsAttExport') 
{ 
 $id=$_REQUEST['m']; $Y=$_REQUEST['Y'];
if($_REQUEST['m']==1){$SelM='January';} if($_REQUEST['m']==2){$SelM='February';} if($_REQUEST['m']==3){$SelM='March';}if($_REQUEST['m']==4){$SelM='April';} 
if($_REQUEST['m']==5){$SelM='May';} if($_REQUEST['m']==6){$SelM='June';} if($_REQUEST['m']==7){$SelM='July';} if($_REQUEST['m']==8){$SelM='August';} 
if($_REQUEST['m']==9){$SelM='September';} if($_REQUEST['m']==10){$SelM='October';} if($_REQUEST['m']==11){$SelM='November';} if($_REQUEST['m']==12){$SelM='December';}
if($Y>0){ $sY=mysql_query("select * from hrm_year where YearId=".$Y."", $con); $rY=mysql_fetch_assoc($sY);  
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$SelM; } else {$PRD=$SelM.'_ALL'; }

$ExpMonthDate=date('Y-m-d', strtotime("-2 months", strtotime(date("Y-m-d")))); $pp=strtotime($ExpMonthDate);
$ExpMonth=date('m', strtotime("-2 months", strtotime(date("Y-m-d"))));
$ExpYear=date('Y', strtotime("-2 months", strtotime(date("Y-m-d"))));

$BY=date("Y")-1;
if($_REQUEST['Y']>=date("Y"))
{ $AttTable='hrm_employee_attendance'; $AttReport='hrm_employee_attreport'; 
  $LeaveTable='hrm_employee_monthlyleave_balance'; $AttTable2='hrm_employee_attendance_'.$_REQUEST['Y'];  }
elseif($_REQUEST['Y']==$BY AND date("m")=='01' AND $_REQUEST['m']==12)
{ $AttTable='hrm_employee_attendance'; $AttReport='hrm_employee_attreport'; 
  $LeaveTable='hrm_employee_monthlyleave_balance'; $AttTable2='hrm_employee_attendance_'.$_REQUEST['Y']; }
elseif($_REQUEST['Y']==$BY AND $_REQUEST['m']<12)
{ $AttTable='hrm_employee_attendance'; $AttReport='hrm_employee_attreport_'.$_REQUEST['Y']; 
  $LeaveTable='hrm_employee_monthlyleave_balance_'.$_REQUEST['Y']; $AttTable2='hrm_employee_attendance_'.$_REQUEST['Y']; }
else
{ $AttTable='hrm_employee_attendance'; $AttReport='hrm_employee_attreport_'.$_REQUEST['Y']; 
  $LeaveTable='hrm_employee_monthlyleave_balance_'.$_REQUEST['Y']; $AttTable2='hrm_employee_attendance_'.$_REQUEST['Y']; }


$csv_output .= '"SN",'; 
$csv_output .= '"EC",';
$csv_output .= '"Name",';
$csv_output .= '"Department",';
$csv_output .= '"Designation",';
$csv_output .= '"HQ",';
$csv_output .= '"Reporting",';

if($id==1 OR $id==3 OR $id==5 OR $id==7 OR $id==8 OR $id==10 OR $id==12){$day=31;} 
elseif($id==4 OR $id==6 OR $id==9 OR $id==11){$day=30;}
elseif($id==2){if($Y==2012 OR $Y==2016 OR $Y==2020 OR $Y==2024 OR $Y==2028 OR $Y==2032 OR $Y==2036 OR $Y==2040) { $day=29; } else { $day=28;} } 

for($i=1; $i<=$day; $i++){ $csv_output .= $i.',';} 

/*
$csv_output .= '"Le",';
$csv_output .= '"Ho",';
$csv_output .= '"Od",';
$csv_output .= '"Pr",';
$csv_output .= '"Ab",';
*/
$csv_output .= "\n";	


if($_REQUEST['ty']==0){ $limit=""; }
elseif($_REQUEST['ty']==1){ $limit="limit 0,200"; }
elseif($_REQUEST['ty']==2){ $limit="limit 200,200"; }
elseif($_REQUEST['ty']==3){ $limit="limit 400,200"; }
elseif($_REQUEST['ty']==4){ $limit="limit 600,200"; }
elseif($_REQUEST['ty']==4){ $limit="limit 800,200"; }

if($_REQUEST['D']!='All' AND $_REQUEST['rpi']==0){ $CondQ="g.DepartmentId=".$_REQUEST['D']; }
elseif($_REQUEST['D']=='All' AND $_REQUEST['rpi']==0){ $CondQ="1=1"; }
elseif($_REQUEST['D']!='All' AND $_REQUEST['rpi']>0){ $CondQ="g.DepartmentId=".$_REQUEST['D']." AND g.RepEmployeeID=".$_REQUEST['rpi']; }
elseif($_REQUEST['D']=='All' AND $_REQUEST['rpi']>0){ $CondQ="g.RepEmployeeID=".$_REQUEST['rpi']; }


$SqlEmp=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname,DepartmentCode,DesigCode,HqName,RepEmployeeID from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId inner join hrm_designation de on g.DesigId=de.DesigId inner join hrm_headquater hq on g.hqId=hq.HqId where e.EmpStatus='A' AND e.CompanyId=".$_REQUEST['c']." AND g.DepartmentId!=17 AND g.DepartmentId!=18 AND g.DepartmentId!=23 AND g.DepartmentId!=0 AND ".$CondQ." AND (e.DateOfSepration='0000-00-00' OR e.DateOfSepration='1970-01-01' OR e.DateOfSepration>='".date($_REQUEST['Y']."-".$_REQUEST['m']."-01")."') AND g.DateJoining<='".date($_REQUEST['Y']."-".$_REQUEST['m']."-31")."' order by e.EmpCode ASC ".$limit, $con);

/*
if($_REQUEST['D']!='All' AND $_REQUEST['rpi']==0){ $SqlEmp=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname,DepartmentCode,DesigCode,HqName,RepEmployeeID from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId inner join hrm_designation de on g.DesigId=de.DesigId inner join hrm_headquater hq on g.hqId=hq.HqId where e.EmpStatus='A' AND g.DepartmentId=".$_REQUEST['D']." AND e.CompanyId=".$_REQUEST['c']." AND (e.DateOfSepration='0000-00-00' OR e.DateOfSepration='1970-01-01' OR e.DateOfSepration>='".date($_REQUEST['Y']."-".$_REQUEST['m']."-01")."') AND g.DateJoining<='".date($_REQUEST['Y']."-".$_REQUEST['m']."-31")."' order by e.EmpCode ASC", $con); }

elseif($_REQUEST['D']=='All'  AND $_REQUEST['rpi']==0){ $SqlEmp=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname,DepartmentCode,DesigCode,HqName,RepEmployeeID from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId inner join hrm_designation de on g.DesigId=de.DesigId inner join hrm_headquater hq on g.hqId=hq.HqId where e.EmpStatus='A' AND e.CompanyId=".$_REQUEST['c']." AND g.DepartmentId!=17 AND g.DepartmentId!=18 AND g.DepartmentId!=23 AND g.DepartmentId!=0 AND (e.DateOfSepration='0000-00-00' OR e.DateOfSepration='1970-01-01' OR e.DateOfSepration>='".date($_REQUEST['Y']."-".$_REQUEST['m']."-01")."') AND g.DateJoining<='".date($_REQUEST['Y']."-".$_REQUEST['m']."-31")."' order by e.EmpCode ASC", $con); }

elseif($_REQUEST['D']!='All' AND $_REQUEST['rpi']>0){ $SqlEmp=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname,DepartmentCode,DesigCode,HqName,RepEmployeeID from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId inner join hrm_designation de on g.DesigId=de.DesigId inner join hrm_headquater hq on g.hqId=hq.HqId where e.EmpStatus='A' AND g.DepartmentId=".$_REQUEST['D']." AND g.RepEmployeeID=".$_REQUEST['rpi']." AND e.CompanyId=".$_REQUEST['c']." AND (e.DateOfSepration='0000-00-00' OR e.DateOfSepration='1970-01-01' OR e.DateOfSepration>='".date($_REQUEST['Y']."-".$_REQUEST['m']."-01")."') AND g.DateJoining<='".date($_REQUEST['Y']."-".$_REQUEST['m']."-31")."' order by e.EmpCode ASC", $con); }

elseif($_REQUEST['D']=='All' AND $_REQUEST['rpi']>0){ $SqlEmp=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname,DepartmentCode,DesigCode,HqName,RepEmployeeID from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId inner join hrm_designation de on g.DesigId=de.DesigId inner join hrm_headquater hq on g.hqId=hq.HqId where e.EmpStatus='A' AND g.RepEmployeeID=".$_REQUEST['rpi']." AND e.CompanyId=".$_REQUEST['c']." AND g.DepartmentId!=17 AND g.DepartmentId!=18 AND g.DepartmentId!=23 AND g.DepartmentId!=0 AND (e.DateOfSepration='0000-00-00' OR e.DateOfSepration='1970-01-01' OR e.DateOfSepration>='".date($_REQUEST['Y']."-".$_REQUEST['m']."-01")."') AND g.DateJoining<='".date($_REQUEST['Y']."-".$_REQUEST['m']."-31")."' order by e.EmpCode ASC", $con); }
*/


$Sno=1; $SqlRows=mysql_num_rows($SqlEmp); while($ResEmp=mysql_fetch_array($SqlEmp)) { 
$Ename=$ResEmp['Fname'].' '.$ResEmp['Sname'].' '.$ResEmp['Lname']; $month=$_REQUEST['m'];
$sqlRep=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeId=".$ResEmp['RepEmployeeID'], $con); $resRep=mysql_fetch_assoc($sqlRep);

 
$csv_output .= '"'.str_replace('"', '""', $Sno).'",'; 
$csv_output .= '"'.str_replace('"', '""', $ResEmp['EmpCode']).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($Ename)).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($ResEmp['DepartmentCode'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($ResEmp['DesigCode'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($ResEmp['HqName'])).'",'; 
$csv_output .= '"'.str_replace('"', '""', strtoupper($resRep['Fname'].' '.$resRep['Sname'].' '.$resRep['Lname'])).'",';
 
//if($_REQUEST['OldNew']=='Old'){ $SqlEmp2=mysql_query("SELECT * FROM ".$AttReport." WHERE EmployeeID =".$ResEmp['EmployeeID']." AND Year=".$Y." AND Month=".$month, $con); $ResEmp2=mysql_fetch_array($SqlEmp2); }
for($i=1; $i<=$day; $i++) 
{ 
  $tt=strtotime(date($Y."-".$month."-".$i)); 
  if($tt<$pp){$tab=$AttTable2; }else{$tab=$AttTable; }
  
 if($_REQUEST['OldNew']=='New'){ $SqlEmp2=mysql_query("SELECT AttValue FROM ".$tab." WHERE EmployeeID =".$ResEmp['EmployeeID']." AND AttDate='".date($Y."-".$month."-".$i)."'", $con); }
 else{ $SqlEmp2=mysql_query("SELECT * FROM ".$AttReport." WHERE EmployeeID =".$ResEmp['EmployeeID']." AND Year=".$Y." AND Month=".$month, $con); }
 $ResEmp2=mysql_fetch_array($SqlEmp2);
 
 if($_REQUEST['OldNew']=='Old')
 {
 if($ResEmp2['A'.$i]==''){ $csv_output .= '"'.str_replace('"', '""', '').'",'; }
 else{$csv_output .= '"'.str_replace('"', '""', $ResEmp2['A'.$i]).'",'; } 
 }
 else
 {
  if($ResEmp2['AttValue']==''){ $csv_output .= '"'.str_replace('"', '""', '').'",'; }
  else{$csv_output .= '"'.str_replace('"', '""', $ResEmp2['AttValue']).'",'; }
 }
} 

/*
$sAtt=mysql_query("select * from ".$LeaveTable." where Year=".$Y." AND EmployeeID=".$ResEmp['EmployeeID']." AND Month=".$id."", $con); $rAtt=mysql_fetch_assoc($sAtt);
$csv_output .= '"'.str_replace('"', '""', $rAtt['MonthAtt_TotLeave']).'",';
$csv_output .= '"'.str_replace('"', '""', $rAtt['MonthAtt_TotHO']).'",';
$csv_output .= '"'.str_replace('"', '""', $rAtt['MonthAtt_TotOD']).'",';
$csv_output .= '"'.str_replace('"', '""', $rAtt['MonthAtt_TotPR']).'",';
$csv_output .= '"'.str_replace('"', '""', $rAtt['MonthAtt_TotAP']).'",';
*/

$csv_output .= "\n";
$Sno++; }

# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=Attendance_Reports_Month_".$PRD."_".$_REQUEST['ty'].".csv");
echo $csv_output;
exit; 
}
?>