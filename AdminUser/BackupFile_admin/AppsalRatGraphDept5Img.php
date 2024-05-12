<?php session_start();
include('config/config.php');
include('AdminMenuSession.php');
if($_REQUEST['action']=='LinGraph')
{
//5
$s5_1=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=5 AND Hod_TotalFinalRating=1", $con); $r5_1=mysql_num_rows($s5_1); 
$s5_2=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=5 AND Hod_TotalFinalRating=2", $con); $r5_1=mysql_num_rows($s5_1);
$s5_25=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=5 AND Hod_TotalFinalRating=2.5", $con); $r5_25=mysql_num_rows($s5_25);
$s5_27=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=5 AND Hod_TotalFinalRating=2.7", $con); $r5_27=mysql_num_rows($s5_27); 
$s5_29=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=5 AND Hod_TotalFinalRating=2.9", $con); $r5_29=mysql_num_rows($s5_29);
$s5_3=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=5 AND Hod_TotalFinalRating=3", $con); $r5_3=mysql_num_rows($s5_3); 
$s5_32=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=5 AND Hod_TotalFinalRating=3.2", $con); $r5_32=mysql_num_rows($s5_32);
$s5_34=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=5 AND Hod_TotalFinalRating=3.4", $con); $r5_34=mysql_num_rows($s5_34);
$s5_35=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=5 AND Hod_TotalFinalRating=3.5", $con); $r5_35=mysql_num_rows($s5_35);
$s5_37=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=5 AND Hod_TotalFinalRating=3.7", $con); $r5_37=mysql_num_rows($s5_37); 
$s5_39=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=5 AND Hod_TotalFinalRating=3.9", $con); $r5_39=mysql_num_rows($s5_39); 
$s5_4=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=5 AND Hod_TotalFinalRating=4.0", $con); $r5_4=mysql_num_rows($s5_4);
$s5_42=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=5 AND Hod_TotalFinalRating=4.2", $con); $r5_42=mysql_num_rows($s5_42); 
$s5_44=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=5 AND Hod_TotalFinalRating=4.4", $con); $r5_44=mysql_num_rows($s5_44);
$s5_45=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=5 AND Hod_TotalFinalRating=4.5", $con); $r5_45=mysql_num_rows($s5_45);
$s5_47=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=5 AND Hod_TotalFinalRating=4.7", $con); $r5_47=mysql_num_rows($s5_47); 
$s5_49=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=5 AND Hod_TotalFinalRating=4.9", $con); $r5_49=mysql_num_rows($s5_49); 
$s5_5=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=5 AND Hod_TotalFinalRating=5", $con); $r5_5=mysql_num_rows($s5_5);

$v5_1=number_format($r5_1, 0, '.', ''); $v5_2=number_format($r5_2, 0, '.', ''); $v5_25=number_format($r5_25, 0, '.', '');  $v5_27=number_format($r5_27, 0, '.', ''); $v5_29=number_format($r5_29, 0, '.', ''); $v5_3=number_format($r5_3, 0, '.', ''); $v5_32=number_format($r5_32, 0, '.', ''); $v5_34=number_format($r5_34, 0, '.', ''); $v5_35=number_format($r5_35, 0, '.', ''); $v5_37=number_format($r5_37, 0, '.', ''); $v5_39=number_format($r5_39, 0, '.', ''); $v5_4=number_format($r5_4, 0, '.', ''); $v5_42=number_format($r5_42, 0, '.', ''); $v5_44=number_format($r5_44, 0, '.', ''); $v5_45=number_format($r5_45, 0, '.', ''); $v5_47=number_format($r5_47, 0, '.', ''); $v5_49=number_format($r5_49, 0, '.', ''); $v5_5=number_format($r5_5, 0, '.', '');

if($v5_1==0){$e5_1='';}else{$e5_1=$v5_1;}if($v5_2==0){$e5_2='';}else{$e5_2=$v5_2;}if($v5_25==0){$e5_25='';}else{$e5_25=$v5_25;}if($v5_27==0){$e5_27='';}else{$e5_27=$v5_27;}if($v5_29==0){$e5_29='';}else{$e5_29=$v5_29;}if($v5_3==0){$e5_3='';}else{$e5_3=$v5_3;}if($v5_32==0){$e5_32='';}else{$e5_32=$v5_32;}if($v5_34==0){$e5_34='';}else{$e5_34=$v5_34;}if($v5_35==0){$e5_35='';}else{$e5_35=$v5_35;}if($v5_37==0){$e5_37='';}else{$e5_37=$v5_37;}if($v5_39==0){$e5_39='';}else{$e5_39=$v5_39;}if($v5_4==0){$e5_4='';}else{$e5_4=$v5_4;}if($v5_42==0){$e5_42='';}else{$e5_42=$v5_42;}if($v5_44==0){$e5_44='';}else{$e5_44=$v5_44;}if($v5_45==0){$e5_45='';}else{$e5_45=$v5_45;}if($v5_47==0){$e5_47='';}else{$e5_47=$v5_47;}if($v5_49==0){$e5_49='';}else{$e5_49=$v5_49;}if($v5_5==0){$e5_5='';}else{$e5_5=$v5_5;}

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
$plot->SetTitle("OVERALL RATING LINEAR GRAPH - PROCESSING ");
$plot->SetXTitle('Rating');
$plot->SetYTitle('Employee');

//Define some data
$example_data = array(
array('1',$e5_1,$Rat1),
array('2',$e5_2,$Rat2),    
array('2.5',$e5_25,$Rat25),
array('2.7',$e5_27,$Rat27),
array('2.9',$e5_29,$Rat29),
array('3',$e5_3,$Rat3),     
array('3.2',$e5_32,$Rat32),
array('3.4',$e5_34,$Rat34),  
array('3.5',$e5_35,$Rat35),
array('3.7',$e5_37,$Rat37),
array('3.9',$e5_39,$Rat39),
array('4.0',$e5_4,$Rat4),
array('4.2',$e5_42,$Rat42), 
array('4.4',$e5_44,$Rat44),
array('4.5',$e5_45,$Rat45),
array('4.7',$e5_47,$Rat47),
array('4.9',$e5_49,$Rat49),
array('5',$e5_5,$Rat5)
);

$plot->SetDataValues($example_data);
//Turn off X axis ticks and labels because they get in the way:
$plot->SetXTickLabelPos('none');
$plot->SetXTickPos('none');
//Draw it
$plot->DrawGraph();

}


?>

