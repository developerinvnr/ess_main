<?php 
require_once('config/config.php');
$sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['Y']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $MY=$FD-1;  $PRD=$MY.'-'.$FD;
/*************************************************************************************************************/

if($_REQUEST['action']='GeneralExport') 
{ 
 if($_REQUEST['value']=='All') {$DeptV='All_Employee';}
  else{ $sqlDeptV=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resDeptV=mysql_fetch_assoc($sqlDeptV); 
        $DeptV=$resDeptV['DepartmentCode'];}
  
#  Create the Column Headings
$csv_output .= '"Sn",';
$csv_output .= '"EmpCode",'; 
$csv_output .= '"Name",';
$csv_output .= '"Department",';
$csv_output .= '"DesigCode",';
$csv_output .= '"DesigName",';
$csv_output .= '"Grade",';
$csv_output .= '"Bonus Category",';
$csv_output .= '"Vertical",';

$csv_output .= '"FileNo",';	
$csv_output .= '"DOJ",';	
$csv_output .= '"DOC",';
$csv_output .= '"DOB",';
$csv_output .= '"Age",';
$csv_output .= '"CostCenter",';
$csv_output .= '"HQ",';
$csv_output .= '"Mobile",';
$csv_output .= '"Email-ID",';
$csv_output .= '"VNR Exp",';
$csv_output .= '"Pre Exp",'; 
$csv_output .= '"Total Exp",'; 

$csv_output .= '"BankName",';
$csv_output .= '"A/C No",';
$csv_output .= '"IFSC",';
$csv_output .= '"Branch",';
$csv_output .= '"Address",';

$csv_output .= '"BankName",';
$csv_output .= '"A/C No",';
$csv_output .= '"IFSC",';
$csv_output .= '"Branch",';
$csv_output .= '"Address",';
$csv_output .= '"Insu. No",';
$csv_output .= '"PF No",';
$csv_output .= '"PF UAN",';
//$csv_output .= '"ESIC No",'; 
$csv_output .= '"ReportingName",'; 
$csv_output .= '"ReportingDesignation",';
$csv_output .= '"ReportingEmailID",'; 
$csv_output .= '"ReportingContact",';
$csv_output .= "\n";		

# Get Users Details form the DB #$result = mysql_query("SELECT * from formResults WHERE formID = '$formID'" );
 if($_REQUEST['value']=='All') {$sql=mysql_query("select hrm_employee.*, hrm_employee_general.* from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.CompanyId=".$_REQUEST['C']." AND hrm_employee.EmpStatus='A' order by EmpCode ASC", $con); }
else {$sql=mysql_query("select hrm_employee.*, hrm_employee_general.* from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee.CompanyId=".$_REQUEST['C']." AND hrm_employee.EmpStatus='A' order by EmpCode ASC", $con); } 
$Sno=1; while($res=mysql_fetch_array($sql)){ $Ename=$res['Fname'].' '.$res['Sname'].' '.$res['Lname']; 
$sqlDept=mysql_query("select DepartmentCode,DepartmentName from hrm_department where DepartmentId=".$res['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
$sqlDesig=mysql_query("select DesigCode,DesigName from hrm_designation where DesigId=".$res['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId'], $con); $resGrade=mysql_fetch_assoc($sqlGrade);
$sqlCC=mysql_query("select StateName from hrm_state where StateId=".$res['CostCenter'], $con); $resCC=mysql_fetch_assoc($sqlCC);
$sqlHQ=mysql_query("select HqName from hrm_headquater where HqId=".$res['HqId'], $con); $resHQ=mysql_fetch_assoc($sqlHQ);

if($res['RetiStatus']=='Y'){ $DOJ=date("d-M-y", strtotime($res['RetiDate'])); } else{ $DOJ=date("d-M-y", strtotime($res['DateJoining'])); }
if($res['DateConfirmation']!='1970-01-01' AND $res['DateConfirmation']!='0000-00-00' AND $res['RetiStatus']=='N') { $DOC=date("d-M-y", strtotime($res['DateConfirmation'])); }else{$DOC='';}

//$timestamp_start = strtotime($res['DOB']);  
//$timestamp_end = strtotime(date("Y-m-d")); $difference = abs($timestamp_end - $timestamp_start); 
//$days = floor($difference/(60*60*24)); $months = floor($difference/(60*60*24*30)); 
//$years2 = $difference/(60*60*24*365); //$Y2=$years2*12; $M22=$months-$Y2;
//$AgeMain=number_format($years2, 1);

$dos=date("d-m-Y",strtotime($res['DOB']));
$localtime = getdate();
$today = $localtime['mday']."-".$localtime['mon']."-".$localtime['year'];
$dob_a = explode("-", $dos);
$today_a = explode("-", $today);
$dob_d = $dob_a[0];$dob_m = $dob_a[1];$dob_y = $dob_a[2];
$today_d = $today_a[0];$today_m = $today_a[1];$today_y = $today_a[2];
$years = $today_y - $dob_y;
$months = $today_m - $dob_m;
if ($today_m.$today_d < $dob_m.$dob_d){ $years--; $months = 12 + $today_m - $dob_m; }
if ($today_d < $dob_d){ $months--; }
$firstMonths=array(1,3,5,7,8,10,12);
$secondMonths=array(4,6,9,11);
$thirdMonths=array(2);
if($today_m - $dob_m == 1) 
{
if(in_array($dob_m, $firstMonths)){ array_push($firstMonths, 0); }
elseif(in_array($dob_m, $secondMonths)){ array_push($secondMonths, 0); }
elseif(in_array($dob_m, $thirdMonths)){ array_push($thirdMonths, 0); }
}
//$AgeMain=$years.'Y - '.$months.'M';
$len2=strlen($months); //if($len2==1){$months='0'.$months;}else{$months=$months;}
if($months<10){ $mnt='0.0'.$months; } 
elseif($months>=10 && $months<12){ $mnt='0.'.$months; } 
//if($months<12){ $mnt='0.'.$months; }  
elseif($months>=12 AND $months<24){ $m1=$months-12; $l=strlen($m1);if($l==1){$mnt='1.0'.$m1;}else{$mnt='1.'.$m1;} }
elseif($months>=24 AND $months<36){$m1=$months-24; $l=strlen($m1);if($l==1){$mnt='2.0'.$m1;}else{$mnt='2.'.$m1;} }
elseif($months>=36 AND $months<48){$m1=$months-36; $l=strlen($m1);if($l==1){$mnt='3.0'.$m1;}else{$mnt='3.'.$m1;} }
elseif($months>=48 AND $months<60){$m1=$months-48; $l=strlen($m1);if($l==1){$mnt='4.0'.$m1;}else{$mnt='4.'.$m1;} }
elseif($months>=60 AND $months<72){$m1=$months-60; $l=strlen($m1);if($l==1){$mnt='5.0'.$m1;}else{$mnt='5.'.$m1;} }
elseif($months>=72 AND $months<84){$m1=$months-72; $l=strlen($m1);if($l==1){$mnt='6.0'.$m1;}else{$mnt='6.'.$m1;} }
elseif($months>=84 AND $months<96){$m1=$months-84; $l=strlen($m1);if($l==1){$mnt='7.0'.$m1;}else{$mnt='7.'.$m1;} }
elseif($months>=96 AND $months<108){$m1=$months-96; $l=strlen($m1);if($l==1){$mnt='8.0'.$m1;}else{$mnt='8.'.$m1;} }
$str_a = explode('.',$mnt);
$AgeMain=($years+$str_a[0]).'.'.$str_a[1];


if($res['RepEmployeeID']>0){
$sqlRn=mysql_query("select DesigId from hrm_employee_general where EmployeeID=".$res['RepEmployeeID'], $con); $resRn=mysql_fetch_assoc($sqlRn);
$sqlDesigR=mysql_query("select DesigCode from hrm_designation where DesigId=".$resRn['DesigId'], $con); $resDesigR=mysql_fetch_assoc($sqlDesigR); }

//$timestamp_start = strtotime($res['DateJoining']);  
//$timestamp_end = strtotime(date("Y-m-d")); $difference = abs($timestamp_end - $timestamp_start); 
//$days = floor($difference/(60*60*24)); $months = floor($difference/(60*60*24*30)); 
//$years = $difference/(60*60*24*365); /* $Y2=$years*12;  $M2=$months-$Y2; */ 
//$VNRExpMain=number_format($years, 1); $TotalExp=$VNRExpMain+$res['PreviousExpYear'];

$dos=date("d-m-Y",strtotime($res['DateJoining']));
$localtime = getdate();
$today = $localtime['mday']."-".$localtime['mon']."-".$localtime['year'];
$dob_a = explode("-", $dos);
$today_a = explode("-", $today);
$dob_d = $dob_a[0];$dob_m = $dob_a[1];$dob_y = $dob_a[2];
$today_d = $today_a[0];$today_m = $today_a[1];$today_y = $today_a[2];
$years = $today_y - $dob_y;
$months = $today_m - $dob_m;
if ($today_m.$today_d < $dob_m.$dob_d){ $years--; $months = 12 + $today_m - $dob_m; }
if ($today_d < $dob_d){ $months--; }
$firstMonths=array(1,3,5,7,8,10,12);
$secondMonths=array(4,6,9,11);
$thirdMonths=array(2);
if($today_m - $dob_m == 1) 
{
if(in_array($dob_m, $firstMonths)){ array_push($firstMonths, 0); }
elseif(in_array($dob_m, $secondMonths)){ array_push($secondMonths, 0); }
elseif(in_array($dob_m, $thirdMonths)){ array_push($thirdMonths, 0); }
}
//$VNRExpMain=$years.'Y - '.$months.'M';

$len2=strlen($months); //if($len2==1){$months='0'.$months;}else{$months=$months;}
if($months<10){ $mnt='0.0'.$months; } 
elseif($months>=10 && $months<12){ $mnt='0.'.$months; } 
//if($months<12){ $mnt='0.'.$months; }  
elseif($months>=12 AND $months<24){ $m1=$months-12; $l=strlen($m1);if($l==1){$mnt='1.0'.$m1;}else{$mnt='1.'.$m1;} }
elseif($months>=24 AND $months<36){$m1=$months-24; $l=strlen($m1);if($l==1){$mnt='2.0'.$m1;}else{$mnt='2.'.$m1;} }
elseif($months>=36 AND $months<48){$m1=$months-36; $l=strlen($m1);if($l==1){$mnt='3.0'.$m1;}else{$mnt='3.'.$m1;} }
elseif($months>=48 AND $months<60){$m1=$months-48; $l=strlen($m1);if($l==1){$mnt='4.0'.$m1;}else{$mnt='4.'.$m1;} }
elseif($months>=60 AND $months<72){$m1=$months-60; $l=strlen($m1);if($l==1){$mnt='5.0'.$m1;}else{$mnt='5.'.$m1;} }
elseif($months>=72 AND $months<84){$m1=$months-72; $l=strlen($m1);if($l==1){$mnt='6.0'.$m1;}else{$mnt='6.'.$m1;} }
elseif($months>=84 AND $months<96){$m1=$months-84; $l=strlen($m1);if($l==1){$mnt='7.0'.$m1;}else{$mnt='7.'.$m1;} }
elseif($months>=96 AND $months<108){$m1=$months-96; $l=strlen($m1);if($l==1){$mnt='8.0'.$m1;}else{$mnt='8.'.$m1;} }
$str_a = explode('.',$mnt);
$VNRExpMain=($years+$str_a[0]).'.'.$str_a[1];

$csv_output .= '"'.str_replace('"', '""', $Sno).'",';
$csv_output .= '"'.str_replace('"', '""', $res['EmpCode']).'",';
$csv_output .= '"'.str_replace('"', '""', $Ename).'",';
$csv_output .= '"'.str_replace('"', '""', $resDept['DepartmentCode']).'",';
$csv_output .= '"'.str_replace('"', '""', $resDesig['DesigCode']).'",';
$csv_output .= '"'.str_replace('"', '""', $resDesig['DesigName']).'",';
$csv_output .= '"'.str_replace('"', '""', $resGrade['GradeValue']).'",';

if($res['BWageId']==0){ $sB=mysql_query("select BWageId from hrm_employee_general where EmployeeID=".$res['EmployeeID'],$con); $rB=mysql_fetch_assoc($sB);
	    $sqlCat=mysql_query("select Category from hrm_bonus_wages where BWageId=".$rB['BWageId'], $con); }else{ $sqlCat=mysql_query("select Category from hrm_bonus_wages where BWageId=".$res['BWageId'], $con); } $resCat=mysql_fetch_assoc($sqlCat);
	    $resCat=mysql_fetch_assoc($sqlCat);
$csv_output .= '"'.str_replace('"', '""', strtoupper($resCat['Category'])).'",';


$sqlVer=mysql_query("select VerticalName from hrm_department_vertical where VerticalId=".$res['EmpVertical'], $con); $resVer=mysql_fetch_assoc($sqlVer);
$csv_output .= '"'.str_replace('"', '""', $resVer['VerticalName']).'",';

$csv_output .= '"'.str_replace('"', '""', $res['FileNo']).'",';
$csv_output .= '"'.str_replace('"', '""', $DOJ).'",';
$csv_output .= '"'.str_replace('"', '""', $DOC).'",';	
$csv_output .= '"'.str_replace('"', '""', date("d-M-y", strtotime($res['DOB']))).'",';
$csv_output .= '"'.str_replace('"', '""', $AgeMain).'",';
$csv_output .= '"'.str_replace('"', '""', $resCC['StateName']).'",';
$csv_output .= '"'.str_replace('"', '""', $resHQ['HqName']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['MobileNo_Vnr']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['EmailId_Vnr']).'",';
$csv_output .= '"'.str_replace('"', '""', $VNRExpMain).'",';
$csv_output .= '"'.str_replace('"', '""', $res['PreviousExpYear']).'",';

$chr="."; $val=''; $Tot1=0; $Tot2=0;
$Vfirst = strtok($VNRExpMain, $chr); $Ofirst = strtok($res['PreviousExpYear'], $chr);
$Tot1=$Vfirst+$Ofirst;     
$VSec=strpbrk($VNRExpMain, $chr); $OSec=strpbrk($res['PreviousExpYear'], $chr);
$VSecond = strtok($VSec, $chr); $OSecond = strtok($OSec, $chr);

$tot2=$VSecond+$OSecond;
if($tot2==24){ $val=($Tot1+2).'.00'; }
elseif($tot2==12){ $val=($Tot1+1).'.00'; }
elseif($tot2>12 && $tot2<24){ $v1=$tot2-12; if($v1<=9){$v2='0'.$v1;}else{$v2=$v1;} $val=($Tot1+1).'.'.$v2; }
elseif($tot2<12){ $v1=$tot2; if($v1<=9){$v2='0'.$v1;}else{$v2=$v1;} $val=$Tot1.'.'.$v2; }
$csv_output .= '"'.str_replace('"', '""', $val).'",';

$csv_output .= '"'.str_replace('"', '""', $res['BankName']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['AccountNo']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['BankIfscCode']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['BranchName']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['BranchAdd']).'",';

$csv_output .= '"'.str_replace('"', '""', $res['BankName2']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['AccountNo2']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['BankIfscCode2']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['BranchName2']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['BranchAdd2']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['InsuCardNo']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['PfAccountNo']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['PF_UAN']).'",';
//$csv_output .= '"'.str_replace('"', '""', $res['EsicNo']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['ReportingName']).'",';
$csv_output .= '"'.str_replace('"', '""', $resDesigR['DesigCode']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['ReportingEmailId']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['ReportingContactNo']).'",';
$csv_output .= "\n";
$Sno++; }

# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=Employee_GeneralReports_".$DeptV.".csv");
echo $csv_output;
exit;
}
?>