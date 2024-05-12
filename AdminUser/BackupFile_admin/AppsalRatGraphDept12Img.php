<?php session_start();
include('config/config.php');
include('AdminMenuSession.php');
if($_REQUEST['action']=='LinGraph')
{
//12
$s12_1=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=12 AND Hod_TotalFinalRating=1", $con); $r12_1=mysql_num_rows($s12_1); 
$s12_2=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=12 AND Hod_TotalFinalRating=2", $con); $r12_1=mysql_num_rows($s12_1);
$s12_25=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=12 AND Hod_TotalFinalRating=2.5", $con); $r12_25=mysql_num_rows($s12_25);
$s12_27=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=12 AND Hod_TotalFinalRating=2.7", $con); $r12_27=mysql_num_rows($s12_27); 
$s12_29=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=12 AND Hod_TotalFinalRating=2.9", $con); $r12_29=mysql_num_rows($s12_29);
$s12_3=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=12 AND Hod_TotalFinalRating=3", $con); $r12_3=mysql_num_rows($s12_3); 
$s12_32=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=12 AND Hod_TotalFinalRating=3.2", $con); $r12_32=mysql_num_rows($s12_32);
$s12_34=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=12 AND Hod_TotalFinalRating=3.4", $con); $r12_34=mysql_num_rows($s12_34);
$s12_35=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=12 AND Hod_TotalFinalRating=3.5", $con); $r12_35=mysql_num_rows($s12_35);
$s12_37=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=12 AND Hod_TotalFinalRating=3.7", $con); $r12_37=mysql_num_rows($s12_37); 
$s12_39=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=12 AND Hod_TotalFinalRating=3.9", $con); $r12_39=mysql_num_rows($s12_39); 
$s12_4=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=12 AND Hod_TotalFinalRating=4.0", $con); $r12_4=mysql_num_rows($s12_4);
$s12_42=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=12 AND Hod_TotalFinalRating=4.2", $con); $r12_42=mysql_num_rows($s12_42); 
$s12_44=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=12 AND Hod_TotalFinalRating=4.4", $con); $r12_44=mysql_num_rows($s12_44);
$s12_45=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=12 AND Hod_TotalFinalRating=4.5", $con); $r12_45=mysql_num_rows($s12_45);
$s12_47=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=12 AND Hod_TotalFinalRating=4.7", $con); $r12_47=mysql_num_rows($s12_47); 
$s12_49=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=12 AND Hod_TotalFinalRating=4.9", $con); $r12_49=mysql_num_rows($s12_49); 
$s12_5=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=12 AND Hod_TotalFinalRating=5", $con); $r12_5=mysql_num_rows($s12_5);

$v12_1=number_format($r12_1, 0, '.', ''); $v12_2=number_format($r12_2, 0, '.', ''); $v12_25=number_format($r12_25, 0, '.', '');  $v12_27=number_format($r12_27, 0, '.', ''); $v12_29=number_format($r12_29, 0, '.', ''); $v12_3=number_format($r12_3, 0, '.', ''); $v12_32=number_format($r12_32, 0, '.', ''); $v12_34=number_format($r12_34, 0, '.', ''); $v12_35=number_format($r12_35, 0, '.', ''); $v12_37=number_format($r12_37, 0, '.', ''); $v12_39=number_format($r12_39, 0, '.', ''); $v12_4=number_format($r12_4, 0, '.', ''); $v12_42=number_format($r12_42, 0, '.', ''); $v12_44=number_format($r12_44, 0, '.', ''); $v12_45=number_format($r12_45, 0, '.', ''); $v12_47=number_format($r12_47, 0, '.', ''); $v12_49=number_format($r12_49, 0, '.', ''); $v12_5=number_format($r12_5, 0, '.', '');

if($v12_1==0){$e12_1='';}else{$e12_1=$v12_1;}if($v12_2==0){$e12_2='';}else{$e12_2=$v12_2;}if($v12_25==0){$e12_25='';}else{$e12_25=$v12_25;}if($v12_27==0){$e12_27='';}else{$e12_27=$v12_27;}if($v12_29==0){$e12_29='';}else{$e12_29=$v12_29;}if($v12_3==0){$e12_3='';}else{$e12_3=$v12_3;}if($v12_32==0){$e12_32='';}else{$e12_32=$v12_32;}if($v12_34==0){$e12_34='';}else{$e12_34=$v12_34;}if($v12_35==0){$e12_35='';}else{$e12_35=$v12_35;}if($v12_37==0){$e12_37='';}else{$e12_37=$v12_37;}if($v12_39==0){$e12_39='';}else{$e12_39=$v12_39;}if($v12_4==0){$e12_4='';}else{$e12_4=$v12_4;}if($v12_42==0){$e12_42='';}else{$e12_42=$v12_42;}if($v12_44==0){$e12_44='';}else{$e12_44=$v12_44;}if($v12_45==0){$e12_45='';}else{$e12_45=$v12_45;}if($v12_47==0){$e12_47='';}else{$e12_47=$v12_47;}if($v12_49==0){$e12_49='';}else{$e12_49=$v12_49;}if($v12_5==0){$e12_5='';}else{$e12_5=$v12_5;}

if($_REQUEST['YI']==1){$Y=2012;}elseif($_REQUEST['YI']==2){$Y=2013;}elseif($_REQUEST['YI']==3){$Y=2014;}elseif($_REQUEST['YI']==4){$Y=2015;}elseif($_REQUEST['YI']==5){$Y=2016;}elseif($_REQUEST['YI']==6){$Y=2017;}elseif($_REQUEST['YI']==7){$Y=2018;}elseif($_REQUEST['YI']==8){$Y=2019;}elseif($_REQUEST['YI']==9){$Y=2020;}
$SqlA=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$Y."-06-30' AND hrm_employee.EmpCode<=11000 AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI'], $con); $RowA=mysql_num_rows($SqlA);

$sqlRat1=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND Rating=1", $con); $resRat1=mysql_fetch_array($sqlRat1); $vRat1=($RowA*$resRat1['NormalDistri'])/100;
$sqlRat2=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND Rating=2", $con); $resRat2=mysql_fetch_array($sqlRat2); $vRat2=($RowA*$resRat2['NormalDistri'])/100;
$sqlRat25=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND Rating=2.5", $con); $resRat25=mysql_fetch_array($sqlRat25); $vRat25=($RowA*$resRat25['NormalDistri'])/100;
$sqlRat27=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND Rating=2.7", $con); $resRat27=mysql_fetch_array($sqlRat27); $vRat27=($RowA*$resRat27['NormalDistri'])/100;
$sqlRat29=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND Rating=2.9", $con); $resRat29=mysql_fetch_array($sqlRat29); $vRat29=($RowA*$resRat29['NormalDistri'])/100;
$sqlRat3=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND Rating=3", $con); $resRat3=mysql_fetch_array($sqlRat3); $vRat3=($RowA*$resRat3['NormalDistri'])/100;
$sqlRat32=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND Rating=3.2", $con); $resRat32=mysql_fetch_array($sqlRat32); $vRat32=($RowA*$resRat32['NormalDistri'])/100;
$sqlRat34=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND Rating=3.4", $con); $resRat34=mysql_fetch_array($sqlRat34); $vRat34=($RowA*$resRat34['NormalDistri'])/100;
$sqlRat35=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND Rating=3.5", $con); $resRat35=mysql_fetch_array($sqlRat35); $vRat35=($RowA*$resRat35['NormalDistri'])/100;
$sqlRat37=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND Rating=3.7", $con); $resRat37=mysql_fetch_array($sqlRat37); $vRat37=($RowA*$resRat37['NormalDistri'])/100;
$sqlRat39=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND Rating=3.9", $con); $resRat39=mysql_fetch_array($sqlRat39); $vRat39=($RowA*$resRat39['NormalDistri'])/100;
$sqlRat4=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND Rating=4", $con); $resRat4=mysql_fetch_array($sqlRat4); $vRat4=($RowA*$resRat4['NormalDistri'])/100;
$sqlRat42=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND Rating=4.2", $con); $resRat42=mysql_fetch_array($sqlRat42); $vRat42=($RowA*$resRat42['NormalDistri'])/100;
$sqlRat44=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND Rating=4.4", $con); $resRat44=mysql_fetch_array($sqlRat44); $vRat44=($RowA*$resRat44['NormalDistri'])/100;
$sqlRat45=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND Rating=4.5", $con); $resRat45=mysql_fetch_array($sqlRat45); $vRat45=($RowA*$resRat45['NormalDistri'])/100;
$sqlRat47=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND Rating=4.7", $con); $resRat47=mysql_fetch_array($sqlRat47); $vRat47=($RowA*$resRat47['NormalDistri'])/100;
$sqlRat49=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND Rating=4.9", $con); $resRat49=mysql_fetch_array($sqlRat49); $vRat49=($RowA*$resRat49['NormalDistri'])/100;
$sqlRat5=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND Rating=5", $con); $resRat5=mysql_fetch_array($sqlRat5); $vRat5=($RowA*$resRat5['NormalDistri'])/100;

if($vRat1==0){$Rat1='';}else{$Rat1=$vRat1;} if($vRat2==0){$Rat2='';}else{$Rat2=$vRat2;} if($vRat25==0){$Rat25='';}else{$Rat25=$vRat25;} if($vRat27==0){$Rat27='';}else{$Rat27=$vRat27;}if($vRat29==0){$Rat29='';}else{$Rat29=$vRat29;} if($vRat3==0){$Rat3='';}else{$Rat3=$vRat3;} if($vRat32==0){$Rat32='';}else{$Rat32=$vRat32;} if($vRat34==0){$Rat34='';}else{$Rat34=$vRat34;}if($vRat35==0){$Rat35='';}else{$Rat35=$vRat35;} if($vRat37==0){$Rat37='';}else{$Rat37=$vRat37;} if($vRat39==0){$Rat39='';}else{$Rat39=$vRat39;} if($vRat4==0){$Rat4='';}else{$Rat4=$vRat4;}if($vRat42==0){$Rat42='';}else{$Rat42=$vRat42;} if($vRat44==0){$Rat44='';}else{$Rat44=$vRat44;} if($vRat45==0){$Rat45='';}else{$Rat45=$vRat45;} if($vRat47==0){$Rat47='';}else{$Rat47=$vRat47;}if($vRat49==0){$Rat49='';}else{$Rat49=$vRat49;} if($vRat5==0){$Rat5='';}else{$Rat5=$vRat5;}

include('Graph/phplot.php');
$plot = new PHPlot(400,180);
//Set titles
$plot->SetTitle("OVERALL RATING LINEAR GRAPH - MARKETING ");
$plot->SetXTitle('Rating');
$plot->SetYTitle('Employee');

//Define some data
$example_data = array(
array('1',$e12_1,$Rat1),
array('2',$e12_2,$Rat2),    
array('2.5',$e12_25,$Rat25),
array('2.7',$e12_27,$Rat27),
array('2.9',$e12_29,$Rat29),
array('3',$e12_3,$Rat3),     
array('3.2',$e12_32,$Rat32),
array('3.4',$e12_34,$Rat34),  
array('3.5',$e12_35,$Rat35),
array('3.7',$e12_37,$Rat37),
array('3.9',$e12_39,$Rat39),
array('4.0',$e12_4,$Rat4),
array('4.2',$e12_42,$Rat42), 
array('4.4',$e12_44,$Rat44),
array('4.5',$e12_45,$Rat45),
array('4.7',$e12_47,$Rat47),
array('4.9',$e12_49,$Rat49),
array('5',$e12_5,$Rat5)
);

$plot->SetDataValues($example_data);
//Turn off X axis ticks and labels because they get in the way:
$plot->SetXTickLabelPos('none');
$plot->SetXTickPos('none');
//Draw it
$plot->DrawGraph();

}


?>

