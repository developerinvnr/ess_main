<?php 
require_once('config/config.php');
if($_REQUEST['y']!=0){ $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['y']."", $con); $rY=mysql_fetch_assoc($sY);  
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; } else {$PRD='ALL'; }
/*************************************************************************************************************/

if($_REQUEST['action']='RsAttrition') 
{ 
 
$csv_output .= '"Month",';
$csv_output .= '"SN",'; 
$csv_output .= '"EC",';
$csv_output .= '"Name",';
$csv_output .= '"Department",';
$csv_output .= '"DOJ",';
$csv_output .= '"DOR",';
$csv_output .= '"DOS",';
$csv_output .= '"Ageing",';
$csv_output .= '"F&F Status",';
$csv_output .= '"Payment",';
$csv_output .= '"Recovery Details",';
$csv_output .= '"Total Recovery",';
$csv_output .= '"Outstanding",';
$csv_output .= '"F&F Date",';
$csv_output .= '"Reason For Delay",';
$csv_output .= '"Reason For Leaving",';
$csv_output .= '"New Employer Name",';
$csv_output .= '"New Offer",';
$csv_output .= '"New Location",';
$csv_output .= "\n";		

if($_REQUEST['y']!=0){ 
$sql4=mysql_query("select * from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee_separation.EmployeeID=hrm_employee.EmployeeID where Emp_ResignationDate>='".$FD."-04-01' AND Emp_ResignationDate<='".$FD."-04-30' AND hrm_employee.CompanyId=".$_REQUEST['c'], $con); $row4=mysql_num_rows($sql4);
$sql5=mysql_query("select * from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee_separation.EmployeeID=hrm_employee.EmployeeID where Emp_ResignationDate>='".$FD."-05-01' AND Emp_ResignationDate<='".$FD."-05-31' AND hrm_employee.CompanyId=".$_REQUEST['c'], $con); $row5=mysql_num_rows($sql5);
$sql6=mysql_query("select * from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee_separation.EmployeeID=hrm_employee.EmployeeID where Emp_ResignationDate>='".$FD."-06-01' AND Emp_ResignationDate<='".$FD."-06-30' AND hrm_employee.CompanyId=".$_REQUEST['c'], $con); $row6=mysql_num_rows($sql6);
$sql7=mysql_query("select * from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee_separation.EmployeeID=hrm_employee.EmployeeID where Emp_ResignationDate>='".$FD."-07-01' AND Emp_ResignationDate<='".$FD."-07-31' AND hrm_employee.CompanyId=".$_REQUEST['c'], $con); $row7=mysql_num_rows($sql7);
$sql8=mysql_query("select * from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee_separation.EmployeeID=hrm_employee.EmployeeID where Emp_ResignationDate>='".$FD."-08-01' AND Emp_ResignationDate<='".$FD."-08-31' AND hrm_employee.CompanyId=".$_REQUEST['c'], $con); $row8=mysql_num_rows($sql8);
$sql9=mysql_query("select * from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee_separation.EmployeeID=hrm_employee.EmployeeID where Emp_ResignationDate>='".$FD."-09-01' AND Emp_ResignationDate<='".$FD."-09-30' AND hrm_employee.CompanyId=".$_REQUEST['c'], $con); $row9=mysql_num_rows($sql9);
$sql10=mysql_query("select * from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee_separation.EmployeeID=hrm_employee.EmployeeID where Emp_ResignationDate>='".$FD."-10-01' AND Emp_ResignationDate<='".$FD."-10-31' AND hrm_employee.CompanyId=".$_REQUEST['c'], $con); $row10=mysql_num_rows($sql10);
$sql11=mysql_query("select * from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee_separation.EmployeeID=hrm_employee.EmployeeID where Emp_ResignationDate>='".$FD."-11-01' AND Emp_ResignationDate<='".$FD."-11-30' AND hrm_employee.CompanyId=".$_REQUEST['c'], $con); $row11=mysql_num_rows($sql11);
$sql12=mysql_query("select * from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee_separation.EmployeeID=hrm_employee.EmployeeID where Emp_ResignationDate>='".$FD."-12-01' AND Emp_ResignationDate<='".$FD."-12-31' AND hrm_employee.CompanyId=".$_REQUEST['c'], $con); $row12=mysql_num_rows($sql12);
$sql1=mysql_query("select * from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee_separation.EmployeeID=hrm_employee.EmployeeID where Emp_ResignationDate>='".$TD."-01-01' AND Emp_ResignationDate<='".$TD."-01-31' AND hrm_employee.CompanyId=".$_REQUEST['c'], $con); $row1=mysql_num_rows($sql1);
$sql2=mysql_query("select * from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee_separation.EmployeeID=hrm_employee.EmployeeID where Emp_ResignationDate>='".$TD."-02-01' AND Emp_ResignationDate<='".$TD."-02-29' AND hrm_employee.CompanyId=".$_REQUEST['c'], $con); $row2=mysql_num_rows($sql2);
$sql3=mysql_query("select * from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee_separation.EmployeeID=hrm_employee.EmployeeID where Emp_ResignationDate>='".$TD."-03-01' AND Emp_ResignationDate<='".$TD."-03-31' AND hrm_employee.CompanyId=".$_REQUEST['c'], $con); $row3=mysql_num_rows($sql3); 

$sql=mysql_query("select hrm_employee.EmpCode,Fname,Sname,Lname,DepartmentId,DateJoining,DOB,DateOfResignation,DateOfSepration,hrm_employee_separation.* from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee_separation.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where Emp_ResignationDate>='".$FD."-04-01' AND Emp_ResignationDate<='".$TD."-03-31' AND hrm_employee.CompanyId=".$_REQUEST['c']." order by hrm_employee_separation.Emp_ResignationDate DESC", $con);
} else { $sql=mysql_query("select hrm_employee.EmpCode,Fname,Sname,Lname,DepartmentId,DateJoining,DOB,DateOfResignation,DateOfSepration,hrm_employee_separation.* from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee_separation.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.CompanyId=".$_REQUEST['c']." order by hrm_employee_separation.Emp_ResignationDate DESC", $con); } 
$SNo=1; while($res=mysql_fetch_array($sql)){ 
$m=date('m',strtotime($res['Emp_ResignationDate'])); if($m==4){$mn='APR';}elseif($m==5){$mn='MAY';}elseif($m==6){$mn='JUN';}elseif($m==7){$mn='JUL';}elseif($m==8){$mn='AUG';}elseif($m==9){$mn='SEP';}elseif($m==10){$mn='OCT';}elseif($m==11){$mn='NOV';}elseif($m==12){$mn='DEC';}elseif($m==1){$mn='JAN';}elseif($m==2){$mn='FEB';}elseif($m==3){$mn='MAR';}
$sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'],$con); $resD=mysql_fetch_assoc($sqlD);
$sqlEInt=mysql_query("select ComName,Location,Designation from hrm_employee_separation_exitint where EmpSepId=".$res['EmpSepId'],$con); $resEInt=mysql_fetch_assoc($sqlEInt);
 
$csv_output .= '"'.str_replace('"', '""', $mn).'",';
$csv_output .= '"'.str_replace('"', '""', $Sno).'",'; 
$csv_output .= '"'.str_replace('"', '""', $res['EmpCode']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Fname'].' '.$res['Sname'].' '.$res['Lname']).'",';
$csv_output .= '"'.str_replace('"', '""', $resD['DepartmentCode']).'",';
$csv_output .= '"'.str_replace('"', '""', date("d-m-Y", strtotime($res['DateJoining']))).'",';
if($res['Emp_ResignationDate']!='1970-01-01' AND $res['Emp_ResignationDate']!='0000-00-00')
{ $csv_output .= '"'.str_replace('"', '""', date("d-m-Y", strtotime($res['Emp_ResignationDate']))).'",'; }
else { $csv_output .= '"'.str_replace('"', '""', '').'",'; }
if($res['DateOfSepration']!='1970-01-01' AND $res['DateOfSepration']!='0000-00-00')
{ $csv_output .= '"'.str_replace('"', '""', date("d-m-Y", strtotime($res['DateOfSepration']))).'",'; }
else { $csv_output .= '"'.str_replace('"', '""', '').'",'; }
$date1 = $res['DateJoining']; $date2 = $res['Emp_ResignationDate']; $diff = abs(strtotime($date2)-strtotime($date1));
$years = floor($diff/(365*60*60*24)); $months=floor(($diff-$years*365*60*60*24)/(30*60*60*24)); $days = floor(($diff-$years*365*60*60*24-$months*30*60*60*24)/(60*60*24)); 
$AgeMain=$years.'.'.$months; 

$csv_output .= '"'.str_replace('"', '""', $AgeMain).'",';
if($res['HR_FullFinal_Submit']=='Y'){$sub='OK';}else{$sub='PENDING';} 
$csv_output .= '"'.str_replace('"', '""', $sub).'",'; 
if($res['TotalEarn']>$res['TotalDeduct']){$csv_output .= '"'.str_replace('"', '""', $res['TotalPayable']).'",'; }else{ $csv_output .= '"'.str_replace('"', '""', '').'",'; }

$sqlHr=mysql_query("select * from hrm_employee_separation_nochr where EmpSepId=".$res['EmpSepId'],$con); 
      $sqlAcc=mysql_query("select * from hrm_employee_separation_nocacc where EmpSepId=".$res['EmpSepId'],$con); 
	  $sqlIt=mysql_query("select * from hrm_employee_separation_nocit where EmpSepId=".$res['EmpSepId'],$con);
      $sqlRep=mysql_query("select * from hrm_employee_separation_nocrep where EmpSepId=".$res['EmpSepId'],$con);
	  $resHr=mysql_fetch_assoc($sqlHr); $resAcc=mysql_fetch_assoc($sqlAcc); $resIt=mysql_fetch_assoc($sqlIt); 
      $resRep=mysql_fetch_assoc($sqlRep); 

     if($resHr['AdminIC_Amt']>0){$e1='IDCardRecovery='.floatval($resHr['AdminIC_Amt']).', ';}else{$e1='';}  
	 if($resHr['AdminVC_Amt']>0){$e2='VisitingCardsRecovery='.floatval($resHr['AdminVC_Amt']).', ';}else{$e2='';}  
	 if($resHr['CV_Amt']>0){$e3='ComVehicle='.floatval($resHr['CV_Amt']).', ';}else{$e3='';}  
	 if($resHr['NPR']>0){$e4='NoticePeriod='.floatval($resHr['NPR']).', ';}else{$e4='';}  
	 if($resHr['RTSB']>0){$e5='RecoveryTowardsServiceBond='.floatval($resHr['RTSB']).', ';}else{$e5='';}  
     if($resHr['VolC']>0){$e6='VolContri='.floatval($resHr['VolC']).', ';}else{$e6='';}  
     if($resHr['RA_allow']>0){$e7='RA='.floatval($resHr['RA_allow']).', ';}else{$e7='';}  
     if($resAcc['AccECP_Amt2']>0){$e8='ExpClaimPending='.floatval($resAcc['AccECP_Amt2']).', ';}else{$e8='';}  
	 if($resAcc['AccIPS_Amt2']>0){$e9='InvtProofSub='.floatval($resAcc['AccIPS_Amt2']).', ';}else{$e9='';}  
	 if($resAcc['AccAMS_Amt2']>0){$e10='AdvanceAmtSett='.floatval($resAcc['AccAMS_Amt2']).', ';}else{$e10='';} 
	 if($resAcc['AccSAR_Amt2']>0){$e11='SalaryAdvRecovery='.floatval($resAcc['AccSAR_Amt2']).', ';}else{$e11='';}  
	 if($resAcc['AccWGR_Amt2']>0){$e12='WhiteGoodsRecovery='.floatval($resAcc['AccWGR_Amt2']).', ';}else{$e12='';}  
	 if($resAcc['AccSB_Amt2']>0){$e13='ServiceBond='.floatval($resAcc['AccSB_Amt2']).', ';}else{$e13='';}  
	 if($resAcc['AccTDSA_Amt2']>0){$e14='TDSAdjustment='.floatval($resAcc['AccTDSA_Amt2']).', ';}else{$e14='';}  
	 if($resIt['ItCHS_Amt']>0){$e15='ComHandset='.floatval($resIt['ItCHS_Amt']).', ';}else{$e15='';}  
	 if($resIt['ItLDH_Amt']>0){$e16='Laptop/DesktopHandour='.floatval($resIt['ItLDH_Amt']).', ';}else{$e16='';}  
	 if($resIt['ItCS_Amt']>0){$e17='CameraSub='.floatval($resIt['ItCS_Amt']).', ';}else{$e17='';}  
	 if($resIt['ItDC_Amt']>0){$e18='DataCard='.floatval($resIt['ItDC_Amt']).', ';}else{$e18='';}  
	 $RepTotAmt=$resRep['DDH_Amt']+$resRep['TID_Amt']+$resRep['APTC_Amt']+$resRep['HOAS_Amt'];
	 $TotRepAmt=$resRep['Prtis_1Amt']+$resRep['Prtis_2Amt']+$resRep['Prtis_3Amt']+$resRep['Prtis_4Amt']+$resRep['Prtis_5Amt']+$resRep['Prtis_6Amt']+$resRep['Prtis_7Amt']+$resRep['Prtis_8Amt']+$resRep['Prtis_9Amt']+$resRep['Prtis_10Amt']+$resRep['Prtis_11Amt']+$resRep['Prtis_12Amt']+$resRep['Prtis_13Amt']+$resRep['Prtis_14Amt']+$resRep['Prtis_15Amt']+$resRep['Prtis_16Amt']+$resRep['Prtis_17Amt']+$resRep['Prtis_18Amt']+$resRep['Prtis_19Amt']+$resRep['Prtis_20Amt']+$resRep['Prtis_21Amt']+$resRep['Prtis_22Amt']+$resRep['Prtis_23Amt']+$resRep['Prtis_24Amt']+$resRep['Prtis_25Amt']+$resRep['Prtis_26Amt']+$resRep['Prtis_27Amt']+$resRep['Prtis_28Amt']+$resRep['Prtis_29Amt']+$resRep['Prtis_30Amt']+$resRep['Prtis_31Amt']+$resRep['Prtis_32Amt']+$resRep['Prtis_33Amt']+$resRep['Prtis_34Amt']+$resRep['Prtis_35Amt']+$resRep['Prtis_36Amt']+$resRep['Prtis_37Amt']+$resRep['Prtis_38Amt']+$resRep['Prtis_39Amt']+$resRep['Prtis_40Amt']+$RepTotAmt; 
	 if($RepTotAmt>0){$e19='RecoveryFromReporting='.floatval($RepTotAmt).', ';}else{$e19='';}  
	 
     $csv_output .= '"'.str_replace('"', '""', $e1.''.$e2.''.$e3.''.$e4.''.$e5.''.$e6.''.$e7.''.$e8.''.$e9.''.$e10.''.$e11.''.$e12.''.$e13.''.$e14.''.$e15.''.$e16.''.$e17.''.$e18.''.$e19).'",'; 


if($res['TotalEarn']<$res['TotalDeduct']){$csv_output .= '"'.str_replace('"', '""', $res['TotalPayable']).'",'; }else{ $csv_output .= '"'.str_replace('"', '""', '').'",'; }

$csv_output .= '"'.str_replace('"', '""', '').'",';
if($res['FullFinalDate']!='1970-01-01' AND $res['FullFinalDate']!='0000-00-00')
{$csv_output .= '"'.str_replace('"', '""', date("d-m-Y", strtotime($res['FullFinalDate']))).'",'; }
else {$csv_output .= '"'.str_replace('"', '""', '').'",';}

if($res['HR_FullFinal_Submit']=='N'){  
if($res['Rep_Approved']=='N' AND $res['Hod_Approved']=='N'){$delay='Approval';}
elseif($res['HR_Approved']=='N'){$delay='Approval Pending';}
elseif($res['DepartmentId']!=6 AND ($res['Rep_NOC']=='N' OR $res['IT_NOC']=='N' OR $res['HR_NOC']=='N' OR $res['Acc_NOC']=='N')){$delay='NOC Clearance';}
elseif($res['DepartmentId']==6 AND ($res['Rep_NOC']=='N' OR $res['Log_NOC']=='N' OR $res['IT_NOC']=='N' OR $res['HR_NOC']=='N' OR $res['Acc_NOC']=='N')){$delay='NOC Clearance';}
else{$delay='F&F Pending';}
$csv_output .= '"'.str_replace('"', '""', $delay).'",';
} 
else {$csv_output .= '"'.str_replace('"', '""', '').'",';}

$csv_output .= '"'.str_replace('"', '""', $res['Emp_Reason']).'",';
$csv_output .= '"'.str_replace('"', '""', $resEInt['ComName']).'",';
$csv_output .= '"'.str_replace('"', '""', $resEInt['Designation']).'",';
$csv_output .= '"'.str_replace('"', '""', $resEInt['Location']).'",';
$csv_output .= "\n";
$Sno++; }

# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=Attrition_Year_".$PRD.".csv");
echo $csv_output;
exit; 
}
?>