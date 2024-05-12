<?php session_start();

require_once('config/config.php');

require_once('AdminMenuSession.php');
$sqlRat1=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$YearId." AND CompanyId=".$CompanyId." AND Rating=1", $con); 
$resRat1=mysql_fetch_array($sqlRat1); $sqlRat2=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$YearId." AND CompanyId=".$CompanyId." AND Rating=2", $con); $resRat2=mysql_fetch_array($sqlRat2); $sqlRat3=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$YearId." AND CompanyId=".$CompanyId." AND Rating=2.5", $con); $resRat3=mysql_fetch_array($sqlRat3); $sqlRat4=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$YearId." AND CompanyId=".$CompanyId." AND Rating=3", $con); $resRat4=mysql_fetch_array($sqlRat4); $sqlRat5=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$YearId." AND CompanyId=".$CompanyId." AND Rating=3.5", $con); $resRat5=mysql_fetch_array($sqlRat5); $sqlRat6=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$YearId." AND CompanyId=".$CompanyId." AND Rating=4", $con); $resRat6=mysql_fetch_array($sqlRat6); $sqlRat7=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$YearId." AND CompanyId=".$CompanyId." AND Rating=4.5", $con); $resRat7=mysql_fetch_array($sqlRat7); $sqlRat8=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$YearId." AND CompanyId=".$CompanyId." AND Rating=5", $con); $resRat8=mysql_fetch_array($sqlRat8);



$SqlA=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$YearId, $con); $RowA=mysql_num_rows($SqlA); 

$Sql1=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=1", $con); $Row1=mysql_num_rows($Sql1); 

$Sql2=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=2", $con); $Row2=mysql_num_rows($Sql2); 

$Sql3=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=2.5", $con); $Row3=mysql_num_rows($Sql3); 

$Sql4=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=3", $con); $Row4=mysql_num_rows($Sql4); 

$Sql5=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=3.5", $con); $Row5=mysql_num_rows($Sql5); 

$Sql6=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=4", $con); $Row6=mysql_num_rows($Sql6); 

$Sql7=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=4.5", $con); $Row7=mysql_num_rows($Sql7); 

$Sql8=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=5", $con); $Row8=mysql_num_rows($Sql8); 

$Ex1=($RowA*$resRat1['NormalDistri'])/100; $Ex2=($RowA*$resRat2['NormalDistri'])/100; $Ex3=($RowA*$resRat3['NormalDistri'])/100; $Ex4=($RowA*$resRat4['NormalDistri'])/100; 

$Ex5=($RowA*$resRat5['NormalDistri'])/100; $Ex6=($RowA*$resRat6['NormalDistri'])/100; $Ex7=($RowA*$resRat7['NormalDistri'])/100; $Ex8=($RowA*$resRat8['NormalDistri'])/100;

$v1=number_format($Row1, 2, '.', '');  $v2=number_format($Row2, 2, '.', ''); $v3=number_format($Row3, 2, '.', ''); $v4=number_format($Row4, 2, '.', ''); 

$v5=number_format($Row5, 2, '.', ''); $v6=number_format($Row6, 2, '.', ''); $v7=number_format($Row7, 2, '.', ''); $v8=number_format($Row8, 2, '.', '');



include('Graph/phpgraphlib.php');

$graph=new PHPGraphLib(520,280);

$data=array("1" => $Ex1, "2" => $Ex2, "2.5" => $Ex3,

"3" => $Ex4, "3.5" => $Ex5, "4" => $Ex6, "4.5" => $Ex7, "5" => $Ex8);

$data2=array("1" => $v1, "2" => $v2, "2.5" => $v3,

"3" => $v4, "3.5" => $v5, "4" => $v6, "4.5" => $v7, "5" => $v8);

$graph->addData($data, $data2);

$graph->setBarColor('green', 'fuscia');

$graph->setTitle('PMS RATING BAR GRAPH (ALL EMP)');

$graph->setupYAxis(12, 'blue');

$graph->setupXAxis(20);

$graph->setGrid(true);

$graph->setLegend(true);

$graph->setDataPoints(true);

$graph->setDataValues(true);

$graph->setTitleLocation('left');

$graph->setTitleColor('blue');

$graph->setLegendOutlineColor('white');

$graph->setLegendTitle('Expected', 'Actual');

$graph->setXValuesHorizontal(true);

$graph->createGraph();

?>