<?php session_start();
include('../AdminUser/config/config.php');
include('EmpMenuSession.php');

$Sql1=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=1 AND (p.Appraiser_EmployeeID=".$EmployeeId." OR p.Reviewer_EmployeeID=".$EmployeeId.")", $con); $Row1=mysql_num_rows($Sql1); $v1=number_format($Row1, 0, '.', ''); 

$Sql2=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=2 AND (p.Appraiser_EmployeeID=".$EmployeeId." OR p.Reviewer_EmployeeID=".$EmployeeId.")", $con); $Row2=mysql_num_rows($Sql2); $v2=number_format($Row2, 0, '.', '');

$Sql25=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=2.5 AND (p.Appraiser_EmployeeID=".$EmployeeId." OR p.Reviewer_EmployeeID=".$EmployeeId.")", $con); $Row25=mysql_num_rows($Sql25); $v25=number_format($Row25, 0, '.', '');
$Sql27=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=2.7 AND (p.Appraiser_EmployeeID=".$EmployeeId." OR p.Reviewer_EmployeeID=".$EmployeeId.")", $con); $Row27=mysql_num_rows($Sql27); $v27=number_format($Row27, 0, '.', '');

$Sql29=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=2.9 AND (p.Appraiser_EmployeeID=".$EmployeeId." OR p.Reviewer_EmployeeID=".$EmployeeId.")", $con); $Row29=mysql_num_rows($Sql29); $v29=number_format($Row29, 0, '.', ''); 

$Sql3=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=3 AND (p.Appraiser_EmployeeID=".$EmployeeId." OR p.Reviewer_EmployeeID=".$EmployeeId.")", $con); $Row3=mysql_num_rows($Sql3); $v3=number_format($Row3, 0, '.', '');

$Sql32=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=3.2 AND (p.Appraiser_EmployeeID=".$EmployeeId." OR p.Reviewer_EmployeeID=".$EmployeeId.")", $con); $Row32=mysql_num_rows($Sql32); $v32=number_format($Row32, 0, '.', ''); 

$Sql34=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=3.4 AND (p.Appraiser_EmployeeID=".$EmployeeId." OR p.Reviewer_EmployeeID=".$EmployeeId.")", $con); $Row34=mysql_num_rows($Sql34); $v34=number_format($Row34, 0, '.', '');

$Sql35=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=3.5 AND (p.Appraiser_EmployeeID=".$EmployeeId." OR p.Reviewer_EmployeeID=".$EmployeeId.")", $con); $Row35=mysql_num_rows($Sql35); $v35=number_format($Row35, 0, '.', '');

$Sql37=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=3.7 AND (p.Appraiser_EmployeeID=".$EmployeeId." OR p.Reviewer_EmployeeID=".$EmployeeId.")", $con); $Row37=mysql_num_rows($Sql37); $v37=number_format($Row37, 0, '.', '');

$Sql39=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=3.9 AND (p.Appraiser_EmployeeID=".$EmployeeId." OR p.Reviewer_EmployeeID=".$EmployeeId.")", $con); $Row39=mysql_num_rows($Sql39); $v39=number_format($Row39, 0, '.', '');

$Sql4=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=4 AND (p.Appraiser_EmployeeID=".$EmployeeId." OR p.Reviewer_EmployeeID=".$EmployeeId.")", $con); $Row4=mysql_num_rows($Sql4); $v4=number_format($Row4, 0, '.', '');

$Sql42=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=4.2 AND (p.Appraiser_EmployeeID=".$EmployeeId." OR p.Reviewer_EmployeeID=".$EmployeeId.")", $con); $Row42=mysql_num_rows($Sql42); $v42=number_format($Row42, 0, '.', '');

$Sql44=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=4.4 AND (p.Appraiser_EmployeeID=".$EmployeeId." OR p.Reviewer_EmployeeID=".$EmployeeId.")", $con); $Row44=mysql_num_rows($Sql44); $v44=number_format($Row44, 0, '.', '');

$Sql45=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=4.5 AND (p.Appraiser_EmployeeID=".$EmployeeId." OR p.Reviewer_EmployeeID=".$EmployeeId.")", $con); $Row45=mysql_num_rows($Sql45); $v45=number_format($Row45, 0, '.', '');

$Sql47=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=4.7 AND (p.Appraiser_EmployeeID=".$EmployeeId." OR p.Reviewer_EmployeeID=".$EmployeeId.")", $con); $Row47=mysql_num_rows($Sql47); $v47=number_format($Row47, 0, '.', '');  

$Sql49=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=4.9 AND (p.Appraiser_EmployeeID=".$EmployeeId." OR p.Reviewer_EmployeeID=".$EmployeeId.")", $con); $Row49=mysql_num_rows($Sql49); $v49=number_format($Row49, 0, '.', '');

$Sql5=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=5 AND (p.Appraiser_EmployeeID=".$EmployeeId." OR p.Reviewer_EmployeeID=".$EmployeeId.")", $con); $Row5=mysql_num_rows($Sql5); $v5=number_format($Row5, 0, '.', ''); 

$ActEmp=$Row1+$Row2+$Row25+$Row27+$Row29+$Row3+$Row32+$Row34+$Row35+$Row37+$Row39+$Row4+$Row42+$Row44+$Row45+$Row47+$Row49+$Row5;
  	
if($v1==0){$E1='';}else{$E1=$v1;}     if($v2==0){$E2='';}else{$E2=$v2;}     if($v25==0){$E25='';}else{$E25=$v25;} 
if($v27==0){$E27='';}else{$E27=$v27;} if($v29==0){$E29='';}else{$E29=$v29;} if($v3==0){$E3='';}else{$E3=$v3;} 
if($v32==0){$E32='';}else{$E32=$v32;} if($v34==0){$E34='';}else{$E34=$v34;} if($v35==0){$E35='';}else{$E35=$v35;} 
if($v37==0){$E37='';}else{$E37=$v37;} if($v39==0){$E39='';}else{$E39=$v39;} if($v4==0){$E4='';}else{$E4=$v4;}
if($v42==0){$E42='';}else{$E42=$v42;} if($v44==0){$E44='';}else{$E44=$v44;} if($v45==0){$E45='';}else{$E45=$v45;} 
if($v47==0){$E47='';}else{$E47=$v47;} if($v49==0){$E49='';}else{$E49=$v49;} if($v5==0){$E5='';}else{$E5=$v5;}
			    
include('Graph/phplot.php');
$plot = new PHPlot(700,250);
//Set titles
$plot->SetTitle("REVIEWER OVERALL PMS RATING GRAPH (MY TEAM)");
$plot->SetXTitle('Rating');
$plot->SetYTitle('Employee');

//Define some data
$example_data = array(
	 array('1',$E1),
     array('2',$E2),
     array('2.5',$E25),
     array('2.7',$E27),
     array('2.9',$E29),
     array('3',$E3),
     array('3.2',$E32),
	 array('3.4',$E34),
     array('3.5',$E35),
     array('3.7',$E37),
     array('3.9',$E39),
	 array('4.0',$E4),
     array('4.2',$E42),
     array('4.4',$E44),
     array('4.5',$E45),
	 array('4.7',$E47),
     array('4.9',$E49),
     array('5',$E5)  
);
$plot->SetDataValues($example_data);
//Turn off X axis ticks and labels because they get in the way:
$plot->SetXTickLabelPos('none');
$plot->SetXTickPos('none');
//Draw it
$plot->DrawGraph();

?>