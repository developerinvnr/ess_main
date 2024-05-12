<?php session_start();
include('config/config.php');
include('AdminMenuSession.php');
if($_REQUEST['action']=='LinGraph')
{
//11
$s11_1=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=11 AND Hod_TotalFinalRating=1", $con); $r11_1=mysql_num_rows($s11_1); 
$s11_2=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=11 AND Hod_TotalFinalRating=2", $con); $r11_1=mysql_num_rows($s11_1);
$s11_25=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=11 AND Hod_TotalFinalRating=2.5", $con); $r11_25=mysql_num_rows($s11_25);
$s11_27=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=11 AND Hod_TotalFinalRating=2.7", $con); $r11_27=mysql_num_rows($s11_27); 
$s11_29=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=11 AND Hod_TotalFinalRating=2.9", $con); $r11_29=mysql_num_rows($s11_29);
$s11_3=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=11 AND Hod_TotalFinalRating=3", $con); $r11_3=mysql_num_rows($s11_3); 
$s11_32=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=11 AND Hod_TotalFinalRating=3.2", $con); $r11_32=mysql_num_rows($s11_32);
$s11_34=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=11 AND Hod_TotalFinalRating=3.4", $con); $r11_34=mysql_num_rows($s11_34);
$s11_35=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=11 AND Hod_TotalFinalRating=3.5", $con); $r11_35=mysql_num_rows($s11_35);
$s11_37=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=11 AND Hod_TotalFinalRating=3.7", $con); $r11_37=mysql_num_rows($s11_37); 
$s11_39=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=11 AND Hod_TotalFinalRating=3.9", $con); $r11_39=mysql_num_rows($s11_39); 
$s11_4=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=11 AND Hod_TotalFinalRating=4.0", $con); $r11_4=mysql_num_rows($s11_4);
$s11_42=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=11 AND Hod_TotalFinalRating=4.2", $con); $r11_42=mysql_num_rows($s11_42); 
$s11_44=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=11 AND Hod_TotalFinalRating=4.4", $con); $r11_44=mysql_num_rows($s11_44);
$s11_45=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=11 AND Hod_TotalFinalRating=4.5", $con); $r11_45=mysql_num_rows($s11_45);
$s11_47=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=11 AND Hod_TotalFinalRating=4.7", $con); $r11_47=mysql_num_rows($s11_47); 
$s11_49=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=11 AND Hod_TotalFinalRating=4.9", $con); $r11_49=mysql_num_rows($s11_49); 
$s11_5=mysql_query("select EmpPmsId from hrm_employee_pms pms INNER JOIN hrm_employee e ON pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND pms.HR_Curr_DepartmentId=11 AND Hod_TotalFinalRating=5", $con); $r11_5=mysql_num_rows($s11_5);

$v11_1=number_format($r11_1, 0, '.', ''); $v11_2=number_format($r11_2, 0, '.', ''); $v11_25=number_format($r11_25, 0, '.', '');  $v11_27=number_format($r11_27, 0, '.', ''); $v11_29=number_format($r11_29, 0, '.', ''); $v11_3=number_format($r11_3, 0, '.', ''); $v11_32=number_format($r11_32, 0, '.', ''); $v11_34=number_format($r11_34, 0, '.', ''); $v11_35=number_format($r11_35, 0, '.', ''); $v11_37=number_format($r11_37, 0, '.', ''); $v11_39=number_format($r11_39, 0, '.', ''); $v11_4=number_format($r11_4, 0, '.', ''); $v11_42=number_format($r11_42, 0, '.', ''); $v11_44=number_format($r11_44, 0, '.', ''); $v11_45=number_format($r11_45, 0, '.', ''); $v11_47=number_format($r11_47, 0, '.', ''); $v11_49=number_format($r11_49, 0, '.', ''); $v11_5=number_format($r11_5, 0, '.', '');

if($v11_1==0){$e11_1='';}else{$e11_1=$v11_1;}if($v11_2==0){$e11_2='';}else{$e11_2=$v11_2;}if($v11_25==0){$e11_25='';}else{$e11_25=$v11_25;}if($v11_27==0){$e11_27='';}else{$e11_27=$v11_27;}if($v11_29==0){$e11_29='';}else{$e11_29=$v11_29;}if($v11_3==0){$e11_3='';}else{$e11_3=$v11_3;}if($v11_32==0){$e11_32='';}else{$e11_32=$v11_32;}if($v11_34==0){$e11_34='';}else{$e11_34=$v11_34;}if($v11_35==0){$e11_35='';}else{$e11_35=$v11_35;}if($v11_37==0){$e11_37='';}else{$e11_37=$v11_37;}if($v11_39==0){$e11_39='';}else{$e11_39=$v11_39;}if($v11_4==0){$e11_4='';}else{$e11_4=$v11_4;}if($v11_42==0){$e11_42='';}else{$e11_42=$v11_42;}if($v11_44==0){$e11_44='';}else{$e11_44=$v11_44;}if($v11_45==0){$e11_45='';}else{$e11_45=$v11_45;}if($v11_47==0){$e11_47='';}else{$e11_47=$v11_47;}if($v11_49==0){$e11_49='';}else{$e11_49=$v11_49;}if($v11_5==0){$e11_5='';}else{$e11_5=$v11_5;}

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
$plot->SetTitle("OVERALL RATING LINEAR GRAPH - ADMIN ");
$plot->SetXTitle('Rating');
$plot->SetYTitle('Employee');

//Define some data
$example_data = array(
array('1',$e11_1,$Rat1),
array('2',$e11_2,$Rat2),    
array('2.5',$e11_25,$Rat25),
array('2.7',$e11_27,$Rat27),
array('2.9',$e11_29,$Rat29),
array('3',$e11_3,$Rat3),     
array('3.2',$e11_32,$Rat32),
array('3.4',$e11_34,$Rat34),  
array('3.5',$e11_35,$Rat35),
array('3.7',$e11_37,$Rat37),
array('3.9',$e11_39,$Rat39),
array('4.0',$e11_4,$Rat4),
array('4.2',$e11_42,$Rat42), 
array('4.4',$e11_44,$Rat44),
array('4.5',$e11_45,$Rat45),
array('4.7',$e11_47,$Rat47),
array('4.9',$e11_49,$Rat49),
array('5',$e11_5,$Rat5)
);

$plot->SetDataValues($example_data);
//Turn off X axis ticks and labels because they get in the way:
$plot->SetXTickLabelPos('none');
$plot->SetXTickPos('none');
//Draw it
$plot->DrawGraph();

}


?>

