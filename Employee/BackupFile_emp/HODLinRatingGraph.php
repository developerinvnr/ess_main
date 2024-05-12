<?php session_start();
include('../AdminUser/config/config.php');
include('EmpMenuSession.php');

$sqlRat1=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$_SESSION['PmsYId']." AND CompanyId=".$CompanyId." AND Rating=1", $con); $resRat1=mysql_fetch_array($sqlRat1); 
$sqlRat2=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$_SESSION['PmsYId']." AND CompanyId=".$CompanyId." AND Rating=2", $con); $resRat2=mysql_fetch_array($sqlRat2); 
$sqlRat25=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$_SESSION['PmsYId']." AND CompanyId=".$CompanyId." AND Rating=2.5", $con); $resRat25=mysql_fetch_array($sqlRat25);
$sqlRat27=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$_SESSION['PmsYId']." AND CompanyId=".$CompanyId." AND Rating=2.7", $con); $resRat27=mysql_fetch_array($sqlRat27);
$sqlRat29=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$_SESSION['PmsYId']." AND CompanyId=".$CompanyId." AND Rating=2.9", $con); $resRat29=mysql_fetch_array($sqlRat29);
$sqlRat3=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$_SESSION['PmsYId']." AND CompanyId=".$CompanyId." AND Rating=3", $con); $resRat3=mysql_fetch_array($sqlRat3); 
$sqlRat32=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$_SESSION['PmsYId']." AND CompanyId=".$CompanyId." AND Rating=3.2", $con); $resRat32=mysql_fetch_array($sqlRat32); 
$sqlRat34=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$_SESSION['PmsYId']." AND CompanyId=".$CompanyId." AND Rating=3.4", $con); $resRat34=mysql_fetch_array($sqlRat34); 
$sqlRat35=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$_SESSION['PmsYId']." AND CompanyId=".$CompanyId." AND Rating=3.5", $con); $resRat35=mysql_fetch_array($sqlRat35); 
$sqlRat37=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$_SESSION['PmsYId']." AND CompanyId=".$CompanyId." AND Rating=3.7", $con); $resRat37=mysql_fetch_array($sqlRat37); 
$sqlRat39=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$_SESSION['PmsYId']." AND CompanyId=".$CompanyId." AND Rating=3.9", $con); $resRat39=mysql_fetch_array($sqlRat39); 
$sqlRat4=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$_SESSION['PmsYId']." AND CompanyId=".$CompanyId." AND Rating=4", $con); $resRat4=mysql_fetch_array($sqlRat4); 
$sqlRat42=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$_SESSION['PmsYId']." AND CompanyId=".$CompanyId." AND Rating=4.2", $con); $resRat42=mysql_fetch_array($sqlRat42); 
$sqlRat44=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$_SESSION['PmsYId']." AND CompanyId=".$CompanyId." AND Rating=4.4", $con); $resRat44=mysql_fetch_array($sqlRat44); 
$sqlRat45=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$_SESSION['PmsYId']." AND CompanyId=".$CompanyId." AND Rating=4.5", $con); $resRat45=mysql_fetch_array($sqlRat45); 
$sqlRat47=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$_SESSION['PmsYId']." AND CompanyId=".$CompanyId." AND Rating=4.7", $con); $resRat47=mysql_fetch_array($sqlRat47); 
$sqlRat49=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$_SESSION['PmsYId']." AND CompanyId=".$CompanyId." AND Rating=4.9", $con); $resRat49=mysql_fetch_array($sqlRat49); 
$sqlRat5=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$_SESSION['PmsYId']." AND CompanyId=".$CompanyId." AND Rating=5", $con); $resRat5=mysql_fetch_array($sqlRat5);



$SqlA=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_SESSION['PmsYId']." AND HOD_EmployeeID=".$EmployeeId, $con); $RowA=mysql_num_rows($SqlA);

$Sql1=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Hod_TotalFinalRating=1 AND p.HOD_EmployeeID=".$EmployeeId, $con); $Row1=mysql_num_rows($Sql1); $v1=number_format($Row1, 0, '.', ''); 

$Sql2=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Hod_TotalFinalRating=2 AND p.HOD_EmployeeID=".$EmployeeId, $con); $Row2=mysql_num_rows($Sql2); $v2=number_format($Row2, 0, '.', '');

$Sql25=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Hod_TotalFinalRating=2.5 AND p.HOD_EmployeeID=".$EmployeeId, $con); $Row25=mysql_num_rows($Sql25); $v25=number_format($Row25, 0, '.', '');
$Sql27=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Hod_TotalFinalRating=2.7 AND p.HOD_EmployeeID=".$EmployeeId, $con); $Row27=mysql_num_rows($Sql27); $v27=number_format($Row27, 0, '.', '');

$Sql29=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Hod_TotalFinalRating=2.9 AND p.HOD_EmployeeID=".$EmployeeId, $con); $Row29=mysql_num_rows($Sql29); $v29=number_format($Row29, 0, '.', ''); 

$Sql3=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Hod_TotalFinalRating=3 AND p.HOD_EmployeeID=".$EmployeeId, $con); $Row3=mysql_num_rows($Sql3); $v3=number_format($Row3, 0, '.', '');

$Sql32=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Hod_TotalFinalRating=3.2 AND p.HOD_EmployeeID=".$EmployeeId, $con); $Row32=mysql_num_rows($Sql32); $v32=number_format($Row32, 0, '.', ''); 

$Sql34=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Hod_TotalFinalRating=3.4 AND p.HOD_EmployeeID=".$EmployeeId, $con); $Row34=mysql_num_rows($Sql34); $v34=number_format($Row34, 0, '.', '');

$Sql35=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Hod_TotalFinalRating=3.5 AND p.HOD_EmployeeID=".$EmployeeId, $con); $Row35=mysql_num_rows($Sql35); $v35=number_format($Row35, 0, '.', '');

$Sql37=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Hod_TotalFinalRating=3.7 AND p.HOD_EmployeeID=".$EmployeeId, $con); $Row37=mysql_num_rows($Sql37); $v37=number_format($Row37, 0, '.', '');

$Sql39=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Hod_TotalFinalRating=3.9 AND p.HOD_EmployeeID=".$EmployeeId, $con); $Row39=mysql_num_rows($Sql39); $v39=number_format($Row39, 0, '.', '');

$Sql4=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Hod_TotalFinalRating=4 AND p.HOD_EmployeeID=".$EmployeeId, $con); $Row4=mysql_num_rows($Sql4); $v4=number_format($Row4, 0, '.', '');

$Sql42=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Hod_TotalFinalRating=4.2 AND p.HOD_EmployeeID=".$EmployeeId, $con); $Row42=mysql_num_rows($Sql42); $v42=number_format($Row42, 0, '.', '');

$Sql44=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Hod_TotalFinalRating=4.4 AND p.HOD_EmployeeID=".$EmployeeId, $con); $Row44=mysql_num_rows($Sql44); $v44=number_format($Row44, 0, '.', '');

$Sql45=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Hod_TotalFinalRating=4.5 AND p.HOD_EmployeeID=".$EmployeeId, $con); $Row45=mysql_num_rows($Sql45); $v45=number_format($Row45, 0, '.', '');

$Sql47=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Hod_TotalFinalRating=4.7 AND p.HOD_EmployeeID=".$EmployeeId, $con); $Row47=mysql_num_rows($Sql47); $v47=number_format($Row47, 0, '.', '');  

$Sql49=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Hod_TotalFinalRating=4.9 AND p.HOD_EmployeeID=".$EmployeeId, $con); $Row49=mysql_num_rows($Sql49); $v49=number_format($Row49, 0, '.', '');

$Sql5=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Hod_TotalFinalRating=5 AND p.HOD_EmployeeID=".$EmployeeId, $con); $Row5=mysql_num_rows($Sql5); $v5=number_format($Row5, 0, '.', ''); 


$Rat=($RowA*$resRat1['NormalDistri'])/100; $Rat2=($RowA*$resRat2['NormalDistri'])/100; $Rat25=($RowA*$resRat25['NormalDistri'])/100; $Rat27=($RowA*$resRat27['NormalDistri'])/100;
$Rat29=($RowA*$resRat29['NormalDistri'])/100; $Rat3=($RowA*$resRat3['NormalDistri'])/100; $Rat32=($RowA*$resRat32['NormalDistri'])/100; $Rat34=($RowA*$resRat34['NormalDistri'])/100;
$Rat35=($RowA*$resRat35['NormalDistri'])/100; $Rat37=($RowA*$resRat37['NormalDistri'])/100; $Rat39=($RowA*$resRat39['NormalDistri'])/100; $Rat4=($RowA*$resRat4['NormalDistri'])/100;
$Rat42=($RowA*$resRat42['NormalDistri'])/100; $Rat44=($RowA*$resRat44['NormalDistri'])/100; $Rat45=($RowA*$resRat45['NormalDistri'])/100; $Rat47=($RowA*$resRat47['NormalDistri'])/100;
$Rat49=($RowA*$resRat49['NormalDistri'])/100; $Rat5=($RowA*$resRat5['NormalDistri'])/100;


include('Graph/phpgraphlib.php');
$graph = new PHPGraphLib(750,280);
$data=array("1" => $Rat, "2" => $Rat2, "2.5" => $Rat25, "2.7" => $Rat27, "2.9" => $Rat29,  "3.0" => $Rat3, "3.2" => $Rat32, "3.4" => $Rat34, "3.5" => $Rat35, "3.7" => $Rat37, "3.9" => $Rat39, "4.0" => $Rat4, "4.2" => $Rat42, "4.4" => $Rat44, "4.5" => $Rat45, "4.7" => $Rat47, "4.9" => $Rat49, "5.0" => $Rat5);
$data2=array("1" => $v1, "2" => $v2, "2.5" => $v25, "2.7" => $v27, "2.9" => $v29,  "3.0" => $v3, "3.2" => $v32, "3.4" => $v34, "3.5" => $v35, "3.7" => $v37, "3.9" => $v39, "4.0" => $v4, "4.2" => $v42, "4.4" => $v44, "4.5" => $v45, "4.7" => $v47, "4.9" => $v49, "5.0" => $v5);
$graph->addData($data, $data2);
$graph->setLineColor('green', 'fuscia');
$graph->setTitle('PMS RATING LINEAR GRAPH (MY TEAM)');
$graph->setBars(false);
$graph->setLegend(true);
$graph->setLine(true);
$graph->setDataPoints(true);
$graph->setDataPointColor('maroon');
$graph->setDataValues(true);
$graph->setDataValueColor('green');
$graph->setGoalLine(.0025);
$graph->setGoalLineColor('green');
$graph->setLegendTitle('Expected', 'Actual');
$graph->createGraph();

?>
