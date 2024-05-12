<?php 
require_once('../AdminUser/config/config.php');
if($_REQUEST['yer']>0){ $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['yer']."", $con); $rY=mysql_fetch_assoc($sY); 
$fromdate=date("Y",strtotime($rY['FromDate'])); $todate=date("Y",strtotime($rY['ToDate'])); } else { $fromdate='All_Year'; $todate='';}
/*************************************************************************************************************/
if($_REQUEST['action']='RRtrue' AND $_REQUEST['reqt']>0) 
{ 

//chk=9&allot=0&reqt=1&all=0&d=AllD&ast=AllA&yer=4&ss=89&f=0i&wer=true&c=1&chk2=9


if($_REQUEST['yer']>0)         ///////////////////////////////////////////////////(AAAAAAAAAA)
{

 if($_REQUEST['d']=='AllD') {  //----->>>(11)  
  if($_REQUEST['reqt']==1){   //---(C)
    if($_REQUEST['ast']==0 OR $_REQUEST['ast']=='AllA')
    {  echo "select * from hrm_asset_employee_request where PurDate>='".$fromdate."-04-01' AND PurDate<='".$todate."-03-31' order by PurDate DESC";
    $sqla2=mysql_query("select * from hrm_asset_employee_request where PurDate>='".$fromdate."-04-01' AND PurDate<='".$todate."-03-31' AND Status=1 order by PurDate DESC", $con);  
    }
    if($_REQUEST['ast']>0)
    {
     $sqla2=mysql_query("select * from hrm_asset_employee_request where AssetNId=".$_REQUEST['ast']." AND PurDate>='".$fromdate."-04-01' AND PurDate<='".$todate."-03-31' AND Status=1 order by PurDate DESC", $con);   
    } 
  }
    
 } elseif($_REQUEST['d']>0) { //----->>>(22)  
   if($_REQUEST['reqt']==1){   //---(C)
    if($_REQUEST['ast']==0 OR $_REQUEST['ast']=='AllA')
    { 
    $sqla2=mysql_query("select hrm_asset_employee_request.* from hrm_asset_employee_request INNER JOIN hrm_employee_general ON hrm_asset_employee_request.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." AND PurDate>='".$fromdate."-04-01' AND PurDate<='".$todate."-03-31' AND hrm_asset_employee_request.Status=1 order by PurDate DESC", $con);  
    }
    if($_REQUEST['ast']>0)
    {
     $sqla2=mysql_query("select hrm_asset_employee_request.* from hrm_asset_employee_request INNER JOIN hrm_employee_general ON hrm_asset_employee_request.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." AND AssetNId=".$_REQUEST['ast']." AND PurDate>='".$fromdate."-04-01' AND PurDate<='".$todate."-03-31' AND hrm_asset_employee_request.Status=1 order by PurDate DESC", $con);   
    } 
   } 
 }
 
}
if($_REQUEST['yer']=='AllY')    ///////////////////////////////////////////////////(BBBBBBBBBBB)
{
 
  if($_REQUEST['d']=='AllD') {  //----->>>(11)  
  if($_REQUEST['reqt']==1){   //---(C)
    if($_REQUEST['ast']==0 OR $_REQUEST['ast']=='AllA')
    { 
    $sqla2=mysql_query("select * from hrm_asset_employee_request AND Status=1 order by PurDate DESC", $con);  
    }
    if($_REQUEST['ast']>0)
    {
     $sqla2=mysql_query("select * from hrm_asset_employee_request where AssetNId=".$_REQUEST['ast']." AND Status=1 order by PurDate DESC", $con);   
    } 
  }
    
 } elseif($_REQUEST['d']>0) { //----->>>(22)  
   if($_REQUEST['reqt']==1){   //---(C)
    if($_REQUEST['ast']==0 OR $_REQUEST['ast']=='AllA')
    { 
    $sqla2=mysql_query("select hrm_asset_employee_request.* from hrm_asset_employee_request INNER JOIN hrm_employee_general ON hrm_asset_employee_request.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." AND hrm_asset_employee_request.Status=1 order by PurDate DESC", $con);  
    }
    if($_REQUEST['ast']>0)
    {
     $sqla2=mysql_query("select hrm_asset_employee_request.* from hrm_asset_employee_request INNER JOIN hrm_employee_general ON hrm_asset_employee_request.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." AND AssetNId=".$_REQUEST['ast']." AND hrm_asset_employee_request.Status=1 order by PurDate DESC", $con);   
    } 
   } 
 }
 
}


#  Create the Column Headings
$csv_output .= '"SNo.",'; 
$csv_output .= '"EmpCode",'; 
$csv_output .= '"Name",';
$csv_output .= '"Department",';
$csv_output .= '"Contact No",';
$csv_output .= '"Name Of Asset",';
$csv_output .= '"Model",';	
$csv_output .= '"Model No",';
$csv_output .= '"Price",';
$csv_output .= '"Maximum Limit",';
$csv_output .= '"Request Amount",';
$csv_output .= '"Approval Amount",';
$csv_output .= '"Purchase Date",';
$csv_output .= '"Request Date",';
$csv_output .= '"Bill Copy",';
$csv_output .= '"Asset Copy",';
$csv_output .= '"Approval",';
$csv_output .= '"Amount Expiry Date",';
$csv_output .= '"Bill No",';
$csv_output .= '"EMI No",';
$csv_output .= '"Sr. No",';
$csv_output .= '"Dealer Name",';
$csv_output .= '"Dealer ContactNo",';
$csv_output .= '"Dealer Email-Id",';
$csv_output .= '"Dealer Address",';
$csv_output .= '"Battery Company",';
$csv_output .= '"Battery Model",';
$csv_output .= '"Emp Remark",';
$csv_output .= '"HOD Remark",';
$csv_output .= '"IT Remark",';
$csv_output .= '"A/C Remark",';
$csv_output .= "\n";

$sno=1; while($resa2=mysql_fetch_assoc($sqla2)){ $SqlEmp = mysql_query("SELECT EmpCode,Fname,Sname,Lname,DepartmentId,MobileNo_Vnr,MobileNo from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmployeeID=".$resa2['EmployeeID'], $con); $ResEmp=mysql_fetch_assoc($SqlEmp);
$Ename = $ResEmp['Fname'].'&nbsp;'.$ResEmp['Sname'].'&nbsp;'.$ResEmp['Lname']; $LEC=strlen($ResEmp['EmpCode']); 
if($LEC==1){$EC='000'.$ResEmp['EmpCode'];} if($LEC==2){$EC='00'.$ResEmp['EmpCode'];} if($LEC==3){$EC='0'.$ResEmp['EmpCode'];} if($LEC>=4){$EC=$ResEmp['EmpCode'];}
$sDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$ResEmp['DepartmentId'], $con); $rDept=mysql_fetch_assoc($sDept);		
$sqlAn=mysql_query("select AssetName from hrm_asset_name where AssetNId=".$resa2['AssetNId']); $resAn=mysql_fetch_array($sqlAn);
$csv_output .= '"'.str_replace('"', '""', $sno).'",'; 
$csv_output .= '"'.str_replace('"', '""', $EC).'",';
$csv_output .= '"'.str_replace('"', '""', $Ename).'",';
$csv_output .= '"'.str_replace('"', '""', $rDept['DepartmentCode']).'",';
$csv_output .= '"'.str_replace('"', '""', $ResEmp['MobileNo']).'",';
$csv_output .= '"'.str_replace('"', '""', $resAn['AssetName']).'",';	
$csv_output .= '"'.str_replace('"', '""', $resa2['ModelName']).'",';
$csv_output .= '"'.str_replace('"', '""', $resa2['ModelNo']).'",';
$csv_output .= '"'.str_replace('"', '""', $resa2['Price']).'",';
$csv_output .= '"'.str_replace('"', '""', $resa2['MaxLimitAmt']).'",'; 
$csv_output .= '"'.str_replace('"', '""', $resa2['ReqAmt']).'",'; 
$csv_output .= '"'.str_replace('"', '""', $resa2['ApprovalAmt']).'",'; 
if($resa2['PurDate']=='0000-00-00' OR $resa2['PurDate']=='1970-01-01'){$PurDate='';} else {$PurDate=date("d My",strtotime($resa2['PurDate']));} 
if($resa2['ReqDate']=='0000-00-00' OR $resa2['ReqDate']=='1970-01-01'){$ReqDate='';} else {$ReqDate=date("d My",strtotime($resa2['ReqDate']));} 
$csv_output .= '"'.str_replace('"', '""', $PurDate).'",'; 
$csv_output .= '"'.str_replace('"', '""', $ReqDate).'",'; 
if($resa2['ReqBillImgExtName']!=''){$B='Yes';}else{$B='No';}
if($resa2['ReqAssestImgExtName']!=''){$A='Yes';}else{$A='No';}
$csv_output .= '"'.str_replace('"', '""', $B).'",'; 
$csv_output .= '"'.str_replace('"', '""', $A).'",'; 
if($resa2['AccPayStatus']==0){$apMsg='Draft';}elseif($resa2['AccPayStatus']==1){$apMsg='Pending';}elseif($resa2['AccPayStatus']==2){$apMsg='Approved';}elseif($resa2['AccPayStatus']==3){$apMsg='Rejected';}
$csv_output .= '"'.str_replace('"', '""', $apMsg).'",'; 
if($resa2['ReqAmtExpiryDate']=='0000-00-00' OR $resa2['ReqAmtExpiryDate']=='1970-01-01'){$PExp='';} else {$PExp=date("d My",strtotime($resa2['ReqAmtExpiryDate']));}
$csv_output .= '"'.str_replace('"', '""', $PExp).'",'; 
$csv_output .= '"'.str_replace('"', '""', $resa2['BillNo']).'",'; 
$csv_output .= '"'.str_replace('"', '""', $resa2['EmiNo']).'",'; 
$csv_output .= '"'.str_replace('"', '""', $resa2['Srn']).'",'; 
$csv_output .= '"'.str_replace('"', '""', $resa2['DealeName']).'",'; 
$csv_output .= '"'.str_replace('"', '""', $resa2['DealerContNo']).'",'; 
$csv_output .= '"'.str_replace('"', '""', $resa2['DealerEmail']).'",'; 
$csv_output .= '"'.str_replace('"', '""', $resa2['DealerAdd']).'",'; 
$csv_output .= '"'.str_replace('"', '""', $resa2['BatteryCom']).'",';
$csv_output .= '"'.str_replace('"', '""', $resa2['BatteryModel']).'",';
$csv_output .= '"'.str_replace('"', '""', $resa2['AnyOtherRemark']).'",';
$csv_output .= '"'.str_replace('"', '""', $resa2['HODRemark']).'",';
$csv_output .= '"'.str_replace('"', '""', $resa2['ITRemark']).'",';
$csv_output .= '"'.str_replace('"', '""', $resa2['AccRemark']).'",';
$csv_output .= "\n";
$sno++; }
# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=Employee_Asset_Request_".$fromdate."-".$todate.".csv");
echo $csv_output;
exit; 
}



if($_REQUEST['action']='AAtrue' AND $_REQUEST['allot']>0) 
{ 

//chk=9&allot=0&reqt=1&all=0&d=AllD&ast=AllA&yer=4&ss=89&f=0i&wer=true&c=1&chk2=9


if($_REQUEST['yer']>0)         ///////////////////////////////////////////////////(AAAAAAAAAA)
{

 if($_REQUEST['d']=='AllD') {  //----->>>(11)  
  if($_REQUEST['allot']==1){  //---(B) 
    if($_REQUEST['ast']==0 OR $_REQUEST['ast']=='AllA')
    { 
    $sqla=mysql_query("select * from hrm_asset_employee where APurDate>='".$fromdate."-04-01' AND APurDate<='".$todate."-03-31' order by APurDate DESC", $con);    }
    if($_REQUEST['ast']>0)
    {
    $sqla=mysql_query("select * from hrm_asset_employee where AssetNId=".$_REQUEST['ast']." AND APurDate>='".$fromdate."-04-01' AND APurDate<='".$todate."-03-31' order by APurDate DESC", $con); 
	} 
  
  } 
    
 } elseif($_REQUEST['d']>0) { //----->>>(22)  
   if($_REQUEST['allot']==1){  //---(B) 
    if($_REQUEST['ast']==0 OR $_REQUEST['ast']=='AllA')
    { 
    $sqla=mysql_query("select hrm_asset_employee.* from hrm_asset_employee INNER JOIN hrm_employee_general ON hrm_asset_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." AND APurDate>='".$fromdate."-04-01' AND APurDate<='".$todate."-03-31' order by APurDate DESC", $con);    }
    if($_REQUEST['ast']>0)
    {
    $sqla=mysql_query("select hrm_asset_employee.* from hrm_asset_employee INNER JOIN hrm_employee_general ON hrm_asset_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." AND AssetNId=".$_REQUEST['ast']." AND APurDate>='".$fromdate."-04-01' AND APurDate<='".$todate."-03-31' order by APurDate DESC", $con); 
	} 
  } 
 }
 
}
if($_REQUEST['yer']=='AllY')    ///////////////////////////////////////////////////(BBBBBBBBBBB)
{
 
  if($_REQUEST['d']=='AllD') {  //----->>>(11)  
  if($_REQUEST['allot']==1){  //---(B) 
    if($_REQUEST['ast']==0 OR $_REQUEST['ast']=='AllA')
    { 
    $sqla=mysql_query("select * from hrm_asset_employee order by APurDate DESC", $con);    }
    if($_REQUEST['ast']>0)
    {
    $sqla=mysql_query("select * from hrm_asset_employee where AssetNId=".$_REQUEST['ast']." order by APurDate DESC", $con); 
	} 
  
  } 
    
 } elseif($_REQUEST['d']>0) { //----->>>(22)  
   if($_REQUEST['allot']==1){  //---(B) 
    if($_REQUEST['ast']==0 OR $_REQUEST['ast']=='AllA')
    { 
    $sqla=mysql_query("select hrm_asset_employee.* from hrm_asset_employee INNER JOIN hrm_employee_general ON hrm_asset_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." order by APurDate DESC", $con);    }
    if($_REQUEST['ast']>0)
    {
    $sqla=mysql_query("select hrm_asset_employee.* from hrm_asset_employee INNER JOIN hrm_employee_general ON hrm_asset_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." AND AssetNId=".$_REQUEST['ast']." order by APurDate DESC", $con); 
	} 
  
  } 
 }
 
}


#  Create the Column Headings
$csv_output .= '"SNo.",'; 
$csv_output .= '"EmpCode",'; 
$csv_output .= '"Name",';
$csv_output .= '"Department",';
$csv_output .= '"Contact No",';
$csv_output .= '"Name Of Asset",';
$csv_output .= '"Model",';	
$csv_output .= '"Model No",';
$csv_output .= '"Price",';
$csv_output .= '"Purchase Date",';
$csv_output .= '"Bill No",';
$csv_output .= '"EMI No",';
$csv_output .= '"Sr. No",';
$csv_output .= '"Processor",';
$csv_output .= '"External HDD",';
$csv_output .= '"RAM",';
$csv_output .= '"Laptop Bag",';
$csv_output .= '"OS",';
$csv_output .= '"Allocation",';
$csv_output .= '"Return",';
$csv_output .= '"OS",';
$csv_output .= '"Dealer Name",';
$csv_output .= '"Dealer ContactNo",';
$csv_output .= '"Dealer Email-Id",';
$csv_output .= '"Dealer Address",';
$csv_output .= '"Battery Company",';
$csv_output .= '"Battery Model",';
$csv_output .= '"Remark",';
$csv_output .= "\n";

$sno2=1; while($resa=mysql_fetch_assoc($sqla)){ $SqlEmp2 = mysql_query("SELECT EmpCode,Fname,Sname,Lname,DepartmentId,MobileNo_Vnr,MobileNo from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmployeeID=".$resa['EmployeeID'], $con); $ResEmp2=mysql_fetch_assoc($SqlEmp2);
$Ename2 = $ResEmp2['Fname'].'&nbsp;'.$ResEmp2['Sname'].'&nbsp;'.$ResEmp2['Lname']; $LEC2=strlen($ResEmp2['EmpCode']); 
if($LEC2==1){$EC2='000'.$ResEmp2['EmpCode'];} if($LEC2==2){$EC2='00'.$ResEmp2['EmpCode'];} if($LEC2==3){$EC2='0'.$ResEmp2['EmpCode'];} if($LEC2>=4){$EC2=$ResEmp2['EmpCode'];}
$sDept2=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$ResEmp2['DepartmentId'], $con); $rDept2=mysql_fetch_assoc($sDept2);
$sqlAn2=mysql_query("select AssetName from hrm_asset_name where AssetNId=".$resa['AssetNId']); $resAn2=mysql_fetch_array($sqlAn2);
$csv_output .= '"'.str_replace('"', '""', $sno2).'",'; 
$csv_output .= '"'.str_replace('"', '""', $EC2).'",';
$csv_output .= '"'.str_replace('"', '""', $Ename2).'",';
$csv_output .= '"'.str_replace('"', '""', $rDept2['DepartmentCode']).'",';
$csv_output .= '"'.str_replace('"', '""', $ResEmp2['MobileNo']).'",';
$csv_output .= '"'.str_replace('"', '""', $resAn2['AssetName']).'",';	
$csv_output .= '"'.str_replace('"', '""', $resa['AModelName']).'",';
$csv_output .= '"'.str_replace('"', '""', $resa['AModelNo']).'",';
$csv_output .= '"'.str_replace('"', '""', $resa['APrice']).'",';
if($resa['APurDate']=='0000-00-00' OR $resa['APurDate']=='1970-01-01'){$PurDate='';} else {$PurDate=date("d My",strtotime($resa['APurDate']));}  
$csv_output .= '"'.str_replace('"', '""', $PurDate).'",';  
$csv_output .= '"'.str_replace('"', '""', $resa['ABillNo']).'",'; 
$csv_output .= '"'.str_replace('"', '""', $resa['AEmiNo']).'",'; 
$csv_output .= '"'.str_replace('"', '""', $resa['ASrn']).'",'; 
$csv_output .= '"'.str_replace('"', '""', $resa['AProcessor']).'",';
$csv_output .= '"'.str_replace('"', '""', $resa['AHDD']).'",'; 
$csv_output .= '"'.str_replace('"', '""', $resa['ARAM']).'",'; 
$csv_output .= '"'.str_replace('"', '""', $resa['ALaptopBag']).'",'; 
$csv_output .= '"'.str_replace('"', '""', $resa['AOS']).'",'; 
if($resa['AAllocate']=='0000-00-00' OR $resa['AAllocate']=='1970-01-01'){$AA='';} else {$AA=date("d My",strtotime($resa['AAllocate']));}
if($resa['ADeAllocate']=='0000-00-00' OR $resa['ADeAllocate']=='1970-01-01'){$DD='';} else {$DD=date("d My",strtotime($resa['ADeAllocate']));}
$csv_output .= '"'.str_replace('"', '""', $AA).'",'; 
$csv_output .= '"'.str_replace('"', '""', $DD).'",'; 
$csv_output .= '"'.str_replace('"', '""', $resa['ADealeName']).'",'; 
$csv_output .= '"'.str_replace('"', '""', $resa['ADealerContNo']).'",'; 
$csv_output .= '"'.str_replace('"', '""', $resa['ADealerEmail']).'",'; 
$csv_output .= '"'.str_replace('"', '""', $resa['ADealerAdd']).'",'; 
$csv_output .= '"'.str_replace('"', '""', $resa['ABatteryCom']).'",';
$csv_output .= '"'.str_replace('"', '""', $resa['ABatteryModel']).'",';
$csv_output .= '"'.str_replace('"', '""', $resa['AnyOtherRemark']).'",';
$csv_output .= "\n";
$sno2++; }
# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=Employee_Asset_Allotment_".$fromdate."-".$todate.".csv");
echo $csv_output;
exit; 
}

?>