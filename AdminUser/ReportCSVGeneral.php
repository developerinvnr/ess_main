<?php 
require_once('config/config.php');
$sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['Y']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $MY=$FD-1;  $PRD=$MY.'-'.$FD;
/*************************************************************************************************************/

if($_REQUEST['action']='GeneralExport') 
{ 

    $xls_filename = 'General_reports.xls';
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=$xls_filename");
    header("Pragma: no-cache"); header("Expires: 0"); $sep = "\t"; 
    echo "Sn \tEmpCode \tName \tStatus \tResigned \tFunction \tVertical \tDepartment \tSub Department \tSection \tBonus Category \tDesignation \tGrade \tDOJ \tState \tBU \tZone \tRegion \tHQ \tSub Location \tMobile \tMobile-2 \tEmail \tReporting Name \tReporting Contact \tReporting Email \tFile No \tDOB \tAge \tVNR Exp \tPrevious Exp \tBankName \tA/C No \tIFSC \tBranch \tAddress \tInsu. No \tPF No \tUAN No \tESIC No"; //$TotalExp
    print("\n");

    if($_REQUEST['dept']>0){ $Qdept="g.DepartmentId=".$_REQUEST['dept']; }elseif($_REQUEST['dept']=='All'){ $Qdept="1=1"; }
    if($_REQUEST['sts']=='All'){ $QSts="e.EmpStatus!='De'"; }else{ $QSts="e.EmpStatus='".$_REQUEST['sts']."'"; } 
    $qry = "SELECT e.EmployeeID, e.EmpCode, e.EmpStatus, concat(Fname, ' ', Sname, ' ', Lname) as Name, g.*, DR, Gender, Married, DOB, function_name, vertical_name, department_name, sub_department_name, section_name, designation_name, grade_name, state_name, city_village_name, business_unit_name, zone_name, region_name, territory_name, 
  CASE 
  WHEN DR = 'Y' THEN 'Dr.'
  WHEN Gender = 'M' THEN 'Mr.'
  WHEN Gender = 'F' AND Married = 'Y' THEN 'Mrs.'
  WHEN Gender = 'F' AND Married = 'N' THEN 'Miss.'
  ELSE '' END as Greeting FROM hrm_employee_general g 
  left join hrm_employee e ON g.EmployeeID=e.EmployeeID 
  left join hrm_employee_personal p on g.EmployeeID=p.EmployeeID
  left join core_functions fun on g.EmpFunction=fun.id
  left join core_verticals ver on g.EmpVertical=ver.id
  left join core_departments dept on g.DepartmentId=dept.id
  left join core_sub_department_master subdept on g.SubDepartmentId=subdept.id
  left join core_section sec on g.EmpSection=sec.id
  left join core_designation desig on g.DesigId=desig.id
  left join core_grades gr on g.GradeId=gr.id
  left join core_states st on g.CostCenter=st.id
  left join core_city_village_by_state vlg on g.HqId=vlg.id 
  left join core_business_unit Bu on g.BUId=Bu.id
  left join core_zones Zn on g.ZoneId=Zn.id
  left join core_regions Rg on g.RegionId=Rg.id
  left join core_territory Tr on g.TerrId=Tr.id 
  WHERE ".$QSts." AND ".$Qdept." AND e.CompanyId=".$_REQUEST['C']." order by e.ECode ASC";
    $sql = mysql_query($qry, $con); $no=1;
    while($res=mysql_fetch_array($sql))
    {
      $ResAppSts='No';    
      $sqlch=mysql_query("select * from hrm_employee_separation where EmployeeID=".$res['EmployeeID']." AND Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C'", $con); $rowch=mysql_num_rows($sqlch);
      if($rowch>0 OR $res['EmpStatus']=='D'){ $ResAppSts='Yes'; }
      
      
      $schema_insert = "";
      $schema_insert .= $no.$sep;	
      $schema_insert .= $res['EmpCode'].$sep;
      $schema_insert .= $res['Name'].$sep;
      $schema_insert .= $res['EmpStatus'].$sep;
      $schema_insert .= $ResAppSts.$sep;
      $schema_insert .= $res['function_name'].$sep;
      $schema_insert .= $res['vertical_name'].$sep;
      $schema_insert .= $res['department_name'].$sep;
      $schema_insert .= $res['sub_department_name'].$sep;
      $schema_insert .= $res['section_name'].$sep;

      $sBw=mysql_query("select Category from hrm_bonus_wages where BWageId=".$res['BWageId'],$con); $rBw=mysql_fetch_assoc($sBw);
      $schema_insert .= $rBw['Category'].$sep;

      $schema_insert .= $res['designation_name'].$sep;
      $schema_insert .= $res['grade_name'].$sep;
      $schema_insert .= date("d-m-Y",strtotime($res['DateJoining'])).$sep;
      $schema_insert .= $res['state_name'].$sep;
      $schema_insert .= $res['business_unit_name'].$sep;
      $schema_insert .= $res['zone_name'].$sep;
      $schema_insert .= $res['region_name'].$sep;
      if($res['TerrId']>0){$Hq=$res['territory_name'];}else{$Hq=$res['city_village_name']; }
      $schema_insert .= $Hq.$sep;
      $schema_insert .= $res['SubLocation'].$sep;
      
      $schema_insert .= $res['MobileNo_Vnr'].$sep;
      $schema_insert .= $res['MobileNo2_Vnr'].$sep;
      $schema_insert .= $res['EmailId_Vnr'].$sep;
      $schema_insert .= $res['ReportingName'].$sep;
      $schema_insert .= $res['ReportingContactNo'].$sep;
      $schema_insert .= $res['ReportingEmailId'].$sep;
      $schema_insert .= $res['FileNo'].$sep;
      $schema_insert .= date("d-m-Y",strtotime($res['DOB'])).$sep;

/**********************************************************************/
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
/**********************************************************************/  
      $schema_insert .= $AgeMain.$sep;

/**********************************************************************/
$dos=date("d-m-Y",strtotime($res['DateJoining']));
$localtime = getdate();
$today = $localtime['mday']."-".$localtime['mon']."-".$localtime['year'];
if($res['EmpStatus']!='A' AND $res['DateOfSepration']>='2011-01-01')
{ $today = date("d-m-Y",strtotime($res['DateOfSepration'])); }

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
/**********************************************************************/
      $schema_insert .= $VNRExpMain.$sep;

      $schema_insert .=  $res['PreviousExpYear'].$sep;
/**********************************************************************/
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
/**********************************************************************/
      //$schema_insert .= $val.$sep;

      $schema_insert .= $res['BankName'].$sep;
      $schema_insert .= $res['AccountNo'].$sep;
      $schema_insert .= $res['BankIfscCode'].$sep;
      $schema_insert .= $res['BranchName'].$sep;
      $schema_insert .= $res['BranchAdd'].$sep;
      $schema_insert .= $res['InsuCardNo'].$sep;
      $schema_insert .= $res['PfAccountNo'].$sep;
      $schema_insert .= $res['PF_UAN'].$sep;
      $schema_insert .= $res['EsicNo'].$sep;

                  
      $schema_insert = str_replace($sep."$", "", $schema_insert);
      $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
      $schema_insert .= "\t";
      print(trim($schema_insert)); print "\n"; 
      $no++;
    }
}
?>