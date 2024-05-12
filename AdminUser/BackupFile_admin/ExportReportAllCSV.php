<?php
require_once('config/config.php');
$sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['Y']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD;
/*************************************************************************************************************/
if($_REQUEST['action']='ExportReportAll') 
{
if($_REQUEST['value']=='All') {$DeptV='All_Employee';}
  else{ $sqlDeptV=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resDeptV=mysql_fetch_assoc($sqlDeptV); 
        $DeptV=$resDeptV['DepartmentCode'];}
  
#  Create the Column Headings
$csv_output .= '"SNo.",'; 
$csv_output .= '"EC",'; 
$csv_output .= '"Name",'; 
$csv_output .= '"Department",'; 
$csv_output .= '"Desig Code",'; 
$csv_output .= '"Designation",'; 
$csv_output .= '"Grade",'; 	
$csv_output .= '"Bonus Category",';
$csv_output .= '"Vertical",';

$csv_output .= '"FileNo",'; 	
$csv_output .= '"DOJ",'; 
$csv_output .= '"DOC",'; 
$csv_output .= '"DOB",'; 
$csv_output .= '"Age",'; 
$csv_output .= '"Status",';
$csv_output .= '"Resignation",';
$csv_output .= '"Sepration",';
$csv_output .= '"CostCenter",'; 
$csv_output .= '"HQ",'; 
$csv_output .= '"Mobile",'; 
$csv_output .= '"Email-ID",'; 
$csv_output .= '"VNR Exp",'; 
$csv_output .= '"Pre Exp",'; 
$csv_output .= '"Total Exp",';

$csv_output .= '"Qualification_Main",'; 
$csv_output .= '"Qualification_Top",'; 
$csv_output .= '"Qualification_Other",';

$csv_output .= '"Name",'; 
$csv_output .= '"A/C No",'; 
$csv_output .= '"IFSC",'; 
$csv_output .= '"Branch",'; 
$csv_output .= '"Address",';

$csv_output .= '"Name",'; 
$csv_output .= '"A/C No",'; 
$csv_output .= '"IFSC",'; 
$csv_output .= '"Branch",'; 
$csv_output .= '"Address",';  

$csv_output .= '"Insu. No",'; 
$csv_output .= '"PF No",'; 
$csv_output .= '"PF UAN",';
$csv_output .= '"ESIC No",';

$csv_output .= '"Reporting Name ",'; 
$csv_output .= '"Reporting Designation",'; 
$csv_output .= '"Reporting EmailID",'; 
$csv_output .= '"Reporting Contact",'; 

$csv_output .= '"Gender",'; 
$csv_output .= '"Aadhar",'; 
$csv_output .= '"Cast",'; 
$csv_output .= '"Religion",'; 
$csv_output .= '"Blood Group",'; 	
$csv_output .= '"Sr Citizen",'; 	
$csv_output .= '"Metro City",'; 
$csv_output .= '"Mobile",'; 
$csv_output .= '"Email_ID",'; 
$csv_output .= '"PanCard",'; 
$csv_output .= '"Passport",'; 
$csv_output .= '"ValidTo",'; 
$csv_output .= '"ValidFrom",'; 
$csv_output .= '"Driving Lic",'; 
$csv_output .= '"ValidTo",'; 
$csv_output .= '"ValidFrom",'; 
$csv_output .= '"Marital Status",'; 
$csv_output .= '"Married Date",';

$csv_output .= '"Covid Dose-1",';
$csv_output .= '"Certificate",';
$csv_output .= '"Covid Dose-2",'; 
$csv_output .= '"Certificate",';

$csv_output .= '"Current Address",'; 
$csv_output .= '"State",'; 	
$csv_output .= '"City",'; 	
$csv_output .= '"PinNo",'; 

$csv_output .= '"Parmanent Address",'; 
$csv_output .= '"State",'; 
$csv_output .= '"City",'; 
$csv_output .= '"PinNo",'; 

$csv_output .= '"Emergency Name",'; 
$csv_output .= '"Emergency Contact",'; 
$csv_output .= '"Relation",'; 
$csv_output .= '"EmailId",'; 

$csv_output .= '"Referance(Personal) Name",'; 
$csv_output .= '"Contact",'; 
$csv_output .= '"Relation",'; 
$csv_output .= '"EmailId",'; 

$csv_output .= '"Referance(Professional) Name",'; 
$csv_output .= '"Contact",'; 
$csv_output .= '"EmailId",'; 
$csv_output .= '"Company",'; 
$csv_output .= '"Designation",'; 

$csv_output .= '"Father Name",'; 	
$csv_output .= '"Qualification",'; 	
$csv_output .= '"DOB",'; 
$csv_output .= '"Occupation",'; 	
$csv_output .= '"Mother Name",'; 	
$csv_output .= '"Qualification",'; 	
$csv_output .= '"DOB",'; 
$csv_output .= '"Occupation",'; 
$csv_output .= '"Spouse Name",'; 	
$csv_output .= '"Qualification",'; 	
$csv_output .= '"DOB",'; 
$csv_output .= '"Occupation",'; 		
$csv_output .= '"Name_1",'; 	
$csv_output .= '"Relation",'; 	
$csv_output .= '"DOB",'; 
$csv_output .= '"Qualification",'; 
$csv_output .= '"Occupation",'; 	
$csv_output .= '"Name_2",'; 	
$csv_output .= '"Relation",'; 	
$csv_output .= '"DOB",'; 
$csv_output .= '"Qualification",'; 
$csv_output .= '"Occupation",'; 	
$csv_output .= '"Name_3",'; 	
$csv_output .= '"Relation",'; 	
$csv_output .= '"DOB",'; 
$csv_output .= '"Qualification",'; 
$csv_output .= '"Occupation",'; 	
$csv_output .= '"Name_4",'; 	
$csv_output .= '"Relation",'; 	
$csv_output .= '"DOB",'; 
$csv_output .= '"Qualification",'; 
$csv_output .= '"Occupation",'; 	
$csv_output .= '"Name_5",'; 	
$csv_output .= '"Relation",'; 
$csv_output .= '"DOB",'; 	
$csv_output .= '"Qualification",'; 
$csv_output .= '"Occupation",'; 	
$csv_output .= '"Basic",'; 
$csv_output .= '"Stipend",'; 	
$csv_output .= '"Incentive",'; 	
$csv_output .= '"HRA",'; 
$csv_output .= '"Conveyance",'; 
$csv_output .= '"Bonus",';
$csv_output .= '"Special",'; 
$csv_output .= '"Gross Monthly",'; 
$csv_output .= '"Gross Monthly (PAC)",'; 
$csv_output .= '"PF",'; 	
$csv_output .= '"ESIC",';
$csv_output .= '"Net Monthaly",'; 
$csv_output .= '"Medical Reim.",'; 	
$csv_output .= '"LTA",'; 
$csv_output .= '"CEA",'; 	
$csv_output .= '"Annual Gross",'; 
/*$csv_output .= '"Bonus",';*/ 
$csv_output .= '"Gratuity",'; 
$csv_output .= '"PF Contri",'; 	
$csv_output .= '"ESIC Contri",';
$csv_output .= '"MPP",'; 
$csv_output .= '"CTC",'; 	
$csv_output .= '"MIC",'; 
$csv_output .= '"Car Entit",'; 

$csv_output .= '"CategoryA",'; 
$csv_output .= '"CategoryB",'; 	
$csv_output .= '"CategoryC",'; 	
$csv_output .= '"DA OutsideHQ",';
$csv_output .= '"DA @ HQ",';
$csv_output .= '"Travel (TW)",'; 
$csv_output .= '"Travel (FW)",'; 	
$csv_output .= '"Travel Mode",'; 
$csv_output .= '"Travel Class",'; 	
$csv_output .= '"Mobile Exp. Reim",'; 
$csv_output .= '"Mobile Hand. Elig",'; 	
$csv_output .= '"Validity",';
$csv_output .= '"Misc Expenses",'; 
$csv_output .= '"Health Insu",'; 
$csv_output .= '"Bonus",'; 
$csv_output .= '"Gratuity",'; 
$csv_output .= '"Rating",';	
$csv_output .= "\n";		

# Get Users Details form the DB #$result = mysql_query("SELECT * from formResults WHERE formID = '$formID'" );
if($_REQUEST['value']=='All')
{ 
 if($_REQUEST['s']=='AD')
 {
  $result=mysql_query("select e.*, p.*,g.*,c.*,f.*,ct.*,el.* from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_personal p ON g.EmployeeID=p.EmployeeID INNER JOIN hrm_employee_contact c ON g.EmployeeID=c.EmployeeID INNER JOIN hrm_employee_family f ON g.EmployeeID=f.EmployeeID INNER JOIN hrm_employee_ctc ct ON g.EmployeeID=ct.EmployeeID INNER JOIN hrm_employee_eligibility el ON g.EmployeeID=el.EmployeeID where e.CompanyId=".$_REQUEST['C']." AND (e.EmpStatus='A' OR e.EmpStatus='D') AND ct.Status='A' AND el.Status='A' group by e.EmpCode order by e.EmpCode ASC", $con);
 }
 else
 {
  $result=mysql_query("select e.*, p.*,g.*,c.*,f.*,ct.*,el.* from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_personal p ON g.EmployeeID=p.EmployeeID INNER JOIN hrm_employee_contact c ON g.EmployeeID=c.EmployeeID INNER JOIN hrm_employee_family f ON g.EmployeeID=f.EmployeeID INNER JOIN hrm_employee_ctc ct ON g.EmployeeID=ct.EmployeeID INNER JOIN hrm_employee_eligibility el ON g.EmployeeID=el.EmployeeID where e.CompanyId=".$_REQUEST['C']." AND e.EmpStatus='".$_REQUEST['s']."' AND ct.Status='A' AND el.Status='A' group by e.EmpCode order by e.EmpCode ASC", $con);
 } 
}
else 
{ 
 if($_REQUEST['s']=='AD')
 {
  $result=mysql_query("select e.*, p.*,g.*,c.*,f.*,ct.*,el.* from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_personal p ON g.EmployeeID=p.EmployeeID INNER JOIN hrm_employee_contact c ON g.EmployeeID=c.EmployeeID INNER JOIN hrm_employee_family f ON g.EmployeeID=f.EmployeeID INNER JOIN hrm_employee_ctc ct ON g.EmployeeID=ct.EmployeeID INNER JOIN hrm_employee_eligibility el ON g.EmployeeID=el.EmployeeID where g.DepartmentId=".$_REQUEST['value']." AND e.CompanyId=".$_REQUEST['C']." AND (e.EmpStatus='A' OR e.EmpStatus='D') AND ct.Status='A' AND el.Status='A' group by e.EmpCode order by e.EmpCode ASC", $con);
 }
 else
 {
  $result=mysql_query("select e.*, p.*,g.*,c.*,f.*,ct.*,el.* from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_personal p ON g.EmployeeID=p.EmployeeID INNER JOIN hrm_employee_contact c ON g.EmployeeID=c.EmployeeID INNER JOIN hrm_employee_family f ON g.EmployeeID=f.EmployeeID INNER JOIN hrm_employee_ctc ct ON g.EmployeeID=ct.EmployeeID INNER JOIN hrm_employee_eligibility el ON g.EmployeeID=el.EmployeeID where g.DepartmentId=".$_REQUEST['value']." AND e.CompanyId=".$_REQUEST['C']." AND e.EmpStatus='".$_REQUEST['s']."' AND ct.Status='A' AND el.Status='A' group by e.EmpCode order by e.EmpCode ASC", $con);
 }
  
} 

$Sno=1; while($res = mysql_fetch_array($result))
{ $Ename=$res['Fname'].' '.$res['Sname'].' '.$res['Lname']; 
$sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
$sqlDesig=mysql_query("select DesigCode,DesigName from hrm_designation where DesigId=".$res['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId'], $con); $resGrade=mysql_fetch_assoc($sqlGrade);
$sqlCC=mysql_query("select StateName from hrm_state where StateId=".$res['CostCenter'], $con); $resCC=mysql_fetch_assoc($sqlCC);
$sqlHQ=mysql_query("select HqName from hrm_headquater where HqId=".$res['HqId'], $con); $resHQ=mysql_fetch_assoc($sqlHQ);





if($res['RepEmployeeID']>0){
$sqlRn=mysql_query("select DesigId from hrm_employee_general where EmployeeID=".$res['RepEmployeeID'], $con); $resRn=mysql_fetch_assoc($sqlRn);
$sqlDesigR=mysql_query("select DesigCode from hrm_designation where DesigId=".$resRn['DesigId'], $con); $resDesigR=mysql_fetch_assoc($sqlDesigR); }
if($res['Gender']=='M'){$Gen='Male';}else {$Gen='Female';}
if($res['SeniorCitizen']=='Y'){$SenCi='YES';}else {$SenCi='NO';}
if($res['MetroCity']=='Y'){$MetroCity='YES';}else {$MetroCity='NO';}
$sqlS1=mysql_query("select StateName from hrm_state where StateId=".$res['CurrAdd_State'], $con); $resS1=mysql_fetch_assoc($sqlS1);
$sqlC1=mysql_query("select CityName from hrm_city where CityId=".$res['CurrAdd_City'], $con); $resC1=mysql_fetch_assoc($sqlC1);
$sqlS2=mysql_query("select StateName from hrm_state where StateId=".$res['ParAdd_State'], $con); $resS2=mysql_fetch_assoc($sqlS2);
$sqlC2=mysql_query("select CityName from hrm_city where CityId=".$res['ParAdd_City'], $con); $resC2=mysql_fetch_assoc($sqlC2);
if($res['FatherDOB']=='1970-01-01' OR $res['FatherDOB']=='0000-00-00'){$FDate='';}else{$FDate=date("d-M-y", strtotime($res['FatherDOB'])); }
if($res['MotherDOB']=='1970-01-01' OR $res['MotherDOB']=='0000-00-00'){$MDate='';}else{$MDate=date("d-M-y", strtotime($res['MotherDOB'])); }
if($res['HusWifeDOB']=='1970-01-01' OR $res['HusWifeDOB']=='0000-00-00'){$HWDate='';}else{$HWDate=date("d-M-y", strtotime($res['HusWifeDOB'])); }
$sqlF=mysql_query("select * from hrm_employee_family2 where EmployeeID=".$res['EmployeeID'], $con); 
$csv_output .= '"'.str_replace('"', '""', $Sno).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['EmpCode'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($Ename)).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($resDept['DepartmentCode'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($resDesig['DesigCode'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($resDesig['DesigName'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($resGrade['GradeValue'])).'",';

if($res['BWageId']==0){ $sB=mysql_query("select BWageId from hrm_employee_general where EmployeeID=".$res['EmployeeID'],$con); $rB=mysql_fetch_assoc($sB);
	    $sqlCat=mysql_query("select Category from hrm_bonus_wages where BWageId=".$rB['BWageId'], $con); }else{ $sqlCat=mysql_query("select Category from hrm_bonus_wages where BWageId=".$res['BWageId'], $con); } $resCat=mysql_fetch_assoc($sqlCat);
	    
	    $resCat=mysql_fetch_assoc($sqlCat);
$csv_output .= '"'.str_replace('"', '""', strtoupper($resCat['Category'])).'",';

$sqlVer=mysql_query("select VerticalName from hrm_department_vertical where VerticalId=".$res['EmpVertical'], $con); $resVer=mysql_fetch_assoc($sqlVer);
$csv_output .= '"'.str_replace('"', '""', $resVer['VerticalName']).'",';	

$csv_output .= '"'.str_replace('"', '""', $res['FileNo']).'",';	
$DOJ=''; if($res['DateJoining']!='1970-01-01' AND $res['DateJoining']!='0000-00-00') { if($res['RetiStatus']=='Y'){ $DOJ=date("d-M-y", strtotime($res['RetiDate'])); } else{ $DOJ=date("d-M-y", strtotime($res['DateJoining'])); } } else { $DOJ='';}
$csv_output .= '"'.str_replace('"', '""', $DOJ).'",';
$DateConf=''; if($res['DateConfirmation']!='1970-01-01' AND $res['DateConfirmation']!='0000-00-00' AND $res['RetiStatus']=='N') { $DateConf=date("d-M-y", strtotime($res['DateConfirmation'])); } else { $DateConf='';}
$csv_output .= '"'.str_replace('"', '""', $DateConf).'",';
$DOB=''; if($res['DOB']!='1970-01-01' AND $res['DOB']!='0000-00-00') { $DOB=date("d-M-y", strtotime($res['DOB'])); } else { $DOB='';}
$csv_output .= '"'.str_replace('"', '""', $DOB).'",';
//$timestamp_start = strtotime($res['DOB']);  $timestamp_end = strtotime(date("Y-m-d")); 
//$difference = abs($timestamp_end - $timestamp_start); 
//$days = floor($difference/(60*60*24)); $months = floor($difference/(60*60*24*30)); 
//$years2 = $difference/(60*60*24*365); $AgeMain=number_format($years2, 1);

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
	
$csv_output .= '"'.str_replace('"', '""', $AgeMain).'",';
$csv_output .= '"'.str_replace('"', '""', $res['EmpStatus']).'",';

if($res['DateOfResignation']=='1970-01-01' OR $res['DateOfResignation']=='0000-00-00'){$ResigD='';}else{$ResigD=date("d-M-y", strtotime($res['DateOfResignation'])); }
if($res['DateOfSepration']=='1970-01-01' OR $res['DateOfSepration']=='0000-00-00'){$SepD='';}else{$SepD=date("d-M-y", strtotime($res['DateOfSepration'])); }
$csv_output .= '"'.str_replace('"', '""', $ResigD).'",';
$csv_output .= '"'.str_replace('"', '""', $SepD).'",';

$csv_output .= '"'.str_replace('"', '""', strtoupper($resCC['StateName'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($resHQ['HqName'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['MobileNo_Vnr']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['EmailId_Vnr']).'",';

//$timestamp_start = strtotime($res['DateJoining']);  $timestamp_end = strtotime(date("Y-m-d")); 
//$difference = abs($timestamp_end - $timestamp_start); 
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

$csv_output .= '"'.str_replace('"', '""', $VNRExpMain).'",';
$csv_output .= '"'.str_replace('"', '""', $res['PreviousExpYear']).'",';
$csv_output .= '"'.str_replace('"', '""', $TotalExp).'",';

$sqlQuali=mysql_query("select Qualification,Specialization,Subject,Institute from hrm_employee_qualification where EmployeeID=".$res['EmployeeID']." order by QualificationId ASC ", $con); 
$sqlQ1=mysql_query("select Qualification,Specialization,Institute from hrm_employee_qualification where Qualification='10th' AND EmployeeID=".$res['EmployeeID'], $con); 
$sqlQ2=mysql_query("select Qualification,Specialization,Institute from hrm_employee_qualification where Qualification='12th' AND EmployeeID=".$res['EmployeeID'], $con); 
$sqlQ3=mysql_query("select Qualification,Specialization,Institute from hrm_employee_qualification where Qualification='Graduation' AND EmployeeID=".$res['EmployeeID'], $con); 
$sqlQ4=mysql_query("select Qualification,Specialization,Institute from hrm_employee_qualification where Qualification='Post_Graduation' AND EmployeeID=".$res['EmployeeID'], $con); 
$rowQ1=mysql_num_rows($sqlQ1); $rowQ2=mysql_num_rows($sqlQ2); $rowQ3=mysql_num_rows($sqlQ3); $rowQ4=mysql_num_rows($sqlQ4);
if($rowQ1>0){$resQ1=mysql_fetch_assoc($sqlQ1);} if($rowQ2>0){$resQ2=mysql_fetch_assoc($sqlQ2);} 
if($rowQ3>0){$resQ3=mysql_fetch_assoc($sqlQ3);} if($rowQ4>0){$resQ4=mysql_fetch_assoc($sqlQ4);}
$sqlQQ=mysql_query("select Qualification,Specialization from hrm_employee_qualification where Qualification!='10th' AND Qualification!='12th' AND Qualification!='Graduation' AND Qualification!='Post_Graduation' AND EmployeeID=".$res['EmployeeID'], $con); $rowQQ=mysql_num_rows($sqlQQ); 

$Qua1=''; $Qua2=''; $Qua3=''; $Qua4=''; $Qua5='';
$no=1; while($resQuali=mysql_fetch_array($sqlQuali)) 
{ 
 if($no==1){ if($resQuali['Institute']!=''){ $Qua1=$resQuali['Qualification'].','; }else{$Qua1='';} }
 if($no==2){ if($resQuali['Institute']!=''){ $Qua2=$resQuali['Qualification'].','; }else{$Qua2='';} }
 if($no==3){ if($resQuali['Specialization']!=''){ $Qua3=$resQuali['Specialization'].','; }else{$Qua3='';} } 
 if($no==4){ if($resQuali['Specialization']!=''){ $Qua4=$resQuali['Specialization'].','; }else{$Qua4='';} } 
 
 if($no>=5){ $Qua5=$resQuali['Qualification'].'-'.$resQuali['Specialization']; }else{$Qua5='';}
 
 $Qual=$Qua1.' '.$Qua2.' '.$Qua3.' '.$Qua4.' '.$Qua5;
$no++;
/*if($resQuali['Specialization']!='')if($no==3 OR $no==4){$Qual=$resQuali['Specialization'].', '; } if($no>=5){$Qual=$resQuali['Specialization'].' '; } $no++;*/
}
$csv_output .= '"'.str_replace('"', '""', strtoupper($Qual)).'",';

if($resQ4['Specialization']!=''){$Qual2=$resQ4['Specialization'];}elseif($resQ3['Specialization']!=''){$Qual2=$resQ3['Specialization'];}elseif($resQ2['Institute']!=''){$Qual2='12th';}elseif($resQ1['Institute']!=''){$Qual2='10th';}else{$Qual2='';}
$csv_output .= '"'.str_replace('"', '""',strtoupper($Qual2)).'",';

if($rowQQ>0){ while($resQQ=mysql_fetch_assoc($sqlQQ)){$Qual3=$resQQ['Qualification'].'-'.$resQQ['Specialization'].', '; }}
else { $Qual3='';}
$csv_output .= '"'.str_replace('"', '""', strtoupper($Qual3)).'",';

$csv_output .= '"'.str_replace('"', '""', strtoupper($res['BankName'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['AccountNo'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['BankIfscCode'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['BranchName'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['BranchAdd'])).'",';

$csv_output .= '"'.str_replace('"', '""', strtoupper($res['BankName2'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['AccountNo2'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['BankIfscCode2'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['BranchName2'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['BranchAdd2'])).'",';

$csv_output .= '"'.str_replace('"', '""', strtoupper($res['InsuCardNo'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['PfAccountNo'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['PF_UAN'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['EsicNo'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['ReportingName'])).'",';

$csv_output .= '"'.str_replace('"', '""', strtoupper($resDesigR['DesigCode'])).'",';	
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['ReportingEmailId'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['ReportingContactNo'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($Gen)).'",';

$csv_output .= '"'.str_replace('"', '""', strtoupper($res['AadharNo'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['Categoryy'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['Religion'])).'",';

$csv_output .= '"'.str_replace('"', '""', strtoupper($res['BloodGroup'])).'",';	
$csv_output .= '"'.str_replace('"', '""', strtoupper($SenCi)).'",';	
$csv_output .= '"'.str_replace('"', '""', strtoupper($MetroCity)).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['MobileNo'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['EmailId_Self']).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['PanNo'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['PassportNo'])).'",';

$PExpFrom=''; if($res['Passport_ExpiryDateFrom']!='1970-01-01' AND $res['Passport_ExpiryDateFrom']!='0000-00-00') { $PExpFrom=date("d-M-y", strtotime($res['Passport_ExpiryDateFrom'])); } else { $PExpFrom='';}
$csv_output .= '"'.str_replace('"', '""', $PExpFrom).'",';
$PExpTo=''; if($res['Passport_ExpiryDateTo']!='1970-01-01' AND $res['Passport_ExpiryDateTo']!='0000-00-00') { $PExpTo=date("d-M-y", strtotime($res['Passport_ExpiryDateTo'])); } else { $PExpTo='';}
$csv_output .= '"'.str_replace('"', '""', $PExpTo).'",';
$csv_output .= '"'.str_replace('"', '""', $res['DrivingLicNo']).'",';
$DLExpFrom=''; if($res['Driv_ExpiryDateFrom']!='1970-01-01' AND $res['Driv_ExpiryDateFrom']!='0000-00-00') { $DLExpFrom=date("d-M-y", strtotime($res['Driv_ExpiryDateFrom'])); } else { $DLExpFrom='';}
$csv_output .= '"'.str_replace('"', '""', $DLExpFrom).'",';
$DLExpTo=''; if($res['Driv_ExpiryDateTo']!='1970-01-01' AND $res['Driv_ExpiryDateTo']!='0000-00-00') { $DLExpTo=date("d-M-y", strtotime($res['Driv_ExpiryDateTo'])); } else { $DLExpTo='';}
$csv_output .= '"'.str_replace('"', '""', $DLExpTo).'",';
if($res['Married']=='Y'){$Marr='Married';}else {$Marr='Single';}
if($res['Married']=='Y') {$MarriedDate=date("d-M", strtotime($res['MarriageDate']));} else {$MarriedDate='';}
$csv_output .= '"'.str_replace('"', '""', strtoupper($Marr)).'",';
$csv_output .= '"'.str_replace('"', '""', $MarriedDate).'",';

if($res['Covid_Vaccin_file']!=''){$dos1='uploaded';}else{$dos1='';}
if($res['Covid_Vaccin2_file']!=''){$dos2='uploaded';}else{$dos2='';}
$csv_output .= '"'.str_replace('"', '""', $res['Covid_Vaccin']).'",';
$csv_output .= '"'.str_replace('"', '""', $dos1).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Covid_Vaccin2']).'",';
$csv_output .= '"'.str_replace('"', '""', $dos2).'",';

$csv_output .= '"'.str_replace('"', '""', strtoupper($res['CurrAdd'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($resS1['StateName'])).'",';	
$csv_output .= '"'.str_replace('"', '""', strtoupper($resC1['CityName'])).'",';	
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['CurrAdd_PinNo'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['ParAdd'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($resS2['StateName'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($resC2['CityName'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['ParAdd_PinNo'])).'",';
	
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['EmgName'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['EmgContactNo']).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['EmgRelation'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['EmgEmailId'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['Personal_RefName'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['Personal_RefContactNo'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['Personal_RefRelation'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['Personal_RefEmailId'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['Prof_RefName'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['Prof_RefContactNo'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['Prof_RefEmailId'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['Prof_RefCompany'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['Prof_RefDesig'])).'",';
	
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['Fa_SN'].'. '.$res['FatherName'])).'",';	
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['FatherQuali'])).'",';	
$csv_output .= '"'.str_replace('"', '""', $FDate).'",';	
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['FatherOccupation'])).'",';	
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['Mo_SN'].'. '.$res['MotherName'])).'",';	
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['MotherQuali'])).'",';	
$csv_output .= '"'.str_replace('"', '""', $MDate).'",';	
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['MotherOccupation'])).'",';	
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['HW_SN'].'. '.$res['HusWifeName'])).'",';	
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['HusWifeQuali'])).'",';	
$csv_output .= '"'.str_replace('"', '""', $HWDate).'",';	
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['HusWifeOccupation'])).'",';

$noF=1; while($resF=mysql_fetch_array($sqlF)) { if($noF<=5){
$csv_output .= '"'.str_replace('"', '""', strtoupper($resF['FamilyName'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($resF['FamilyRelation'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($resF['FamilyDOB'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($resF['FamilyQualification'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($resF['FamilyOccupation'])).'",';
$noF++;} } 
if($noF==1){ $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; } 

elseif($noF==2){ $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",';$csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",';  } 

elseif($noF==3){ $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",';  } 

elseif($noF==4){ $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",';  } 

elseif($noF==5){ $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",'; $csv_output .= '"'.str_replace('"', '""', ' ').'",';  } 

	
$csv_output .= '"'.str_replace('"', '""', $res['BAS_Value']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['STIPEND_Value']).'",';	
$csv_output .= '"'.str_replace('"', '""', $res['INCENTIVE_Value']).'",';	
$csv_output .= '"'.str_replace('"', '""', $res['HRA_Value']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['CONV_Value']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Bonus_Month']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['SPECIAL_ALL_Value']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Tot_GrossMonth']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['GrossSalary_PostAnualComponent_Value']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['PF_Employee_Contri_Value']).'",';	
$csv_output .= '"'.str_replace('"', '""', $res['ESCI']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['NetMonthSalary_Value']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['MED_REM_Value']).'",';	
$csv_output .= '"'.str_replace('"', '""', $res['LTA_Value']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['CHILD_EDU_ALL_Value']).'",';	
$csv_output .= '"'.str_replace('"', '""', $res['Tot_Gross_Annual']).'",';
/*$csv_output .= '"'.str_replace('"', '""', $res['BONUS_Value']).'",';*/
$csv_output .= '"'.str_replace('"', '""', $res['GRATUITY_Value']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['PF_Employer_Contri_Annul']).'",';	
$csv_output .= '"'.str_replace('"', '""', $res['AnnualESCI']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Mediclaim_Policy']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Tot_CTC']).'",';	
$csv_output .= '"'.str_replace('"', '""', $res['EmpAddBenifit_MediInsu_value']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Car_Entitlement']).'",';

$csv_output .= '"'.str_replace('"', '""', $res['Lodging_CategoryA']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Lodging_CategoryB']).'",';	
$csv_output .= '"'.str_replace('"', '""', $res['Lodging_CategoryC']).'",';	
$csv_output .= '"'.str_replace('"', '""', $res['DA_Outside_Hq']).'",';  
$csv_output .= '"'.str_replace('"', '""', $res['DA_Inside_Hq']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Travel_TwoWeeKM']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Travel_FourWeeKM']).'",';	
$csv_output .= '"'.str_replace('"', '""', $res['Mode_Travel_Outside_Hq']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['TravelClass_Outside_Hq']).'",';	
$csv_output .= '"'.str_replace('"', '""', $res['Mobile_Exp_Rem_Rs']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Mobile_Hand_Elig_Rs']).'",';

$GpsSetYN=''; if($res['Mobile_Hand_Elig_Rs']>0){ $sqlGp=mysql_query("select Mobile,Mobile_WithGPS from hrm_master_eligibility where DepartmentId=".$res['DepartmentId']." AND CompanyId=".$_REQUEST['C']." AND GradeId=".$res['GradeId']."",$con); $resGp=mysql_fetch_assoc($sqlGp);
	if($res['GPSSet']=='Y'){$GpsSetYN='Once in 2 yrs';}elseif($resGp['Mobile']!=$resGp['Mobile_WithGPS'] AND $resGp['Mobile_WithGPS']==$res['Mobile_Hand_Elig_Rs']){$GpsSetYN='Once in 2 yrs';}else{$GpsSetYN='Once in 3 yrs';}  }

$csv_output .= '"'.str_replace('"', '""', $GpsSetYN).'",';

$csv_output .= '"'.str_replace('"', '""', $res['Misc_Expenses']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Health_Insurance']).'",';
$csv_output .= '"'.str_replace('"', '""', 'As per law').'",';
$csv_output .= '"'.str_replace('"', '""', 'As per law').'",';
$LY=$_REQUEST['Y']-1; 

$sqlRating=mysql_query("select HR_Rating from hrm_employee_pms where EmployeeID=".$res['EmployeeID']." AND HR_Rating>0 AND YearId=".$_REQUEST['Y'], $con); $rowRating=mysql_num_rows($sqlRating);
if($rowRating>0){$resRating=mysql_fetch_array($sqlRating);}
else
{
  $sqlRating=mysql_query("select HR_Rating from hrm_employee_pms where EmployeeID=".$res['EmployeeID']." AND YearId=".$LY, $con);  
  $resRating=mysql_fetch_array($sqlRating);
}

 
$csv_output .= '"'.str_replace('"', '""', $resRating['HR_Rating']).'",';
$csv_output .= "\n";
$Sno++;}
# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=Employee_AllDetails_".$DeptV.".csv");
echo $csv_output;
exit;
}
?>