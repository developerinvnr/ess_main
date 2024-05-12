<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
if($_SESSION['login'] = true){require_once('PhpFile/CompanyDetailsP.php'); }

mysql_query("SET SESSION sql_mode = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");

////////////////////////////////////////////////////////////////////////////////////////////





//<!------------------------------------------------------------------>
//<!------------------------------------------------------------------>

/*

$sql=mysql_query("select e.EmpCode,p.EmployeeID,g.EmpVertical,HR_Curr_DepartmentId,HR_CurrGradeId from hrm_employee_pms p inner join hrm_employee_general g on p.EmployeeID=g.EmployeeID inner join hrm_employee e on p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.EmpType='E' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=9", $con);
while($res=mysql_fetch_assoc($sql))
{ 
 
 $CtcLimit=0; 
 if($res['EmpVertical']>0)
 {
  
  $sqVer=mysql_query("select * from hrm_pms_vertical_increment where DepId=".$res['HR_Curr_DepartmentId']." AND VerticalId=".$res['EmpVertical']." AND ".$res['HR_CurrGradeId'].">=Min_GradeId AND ".$res['HR_CurrGradeId']."<=Max_GradeId AND Max_Ctc>0",$con); 
 $rowVer=mysql_num_rows($sqVer); if($rowVer>0){ $CtcLimit=1; }
 }
  
  $up=mysql_query("update hrm_employee_pms set CtcLimit=".$CtcLimit." where EmployeeID=".$res['EmployeeID']." AND AssessmentYear=9",$con); 

}

*/


/*

$sql=mysql_query("select e.EmpCode,p.EmployeeID,g.EmpVertical,EmpCurrCtc,HR_Curr_DepartmentId,HR_CurrGradeId from hrm_employee_pms p inner join hrm_employee_general g on p.EmployeeID=g.EmployeeID inner join hrm_employee e on p.EmployeeID=e.EmployeeID where p.CtcLimit=1 AND e.EmpStatus='A' AND e.EmpType='E' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=9", $con);
while($res=mysql_fetch_assoc($sql))
{ 
 
 $CtcLimitCross=0; 
 if($res['EmpVertical']>0)
 {
  
  $sqVer=mysql_query("select * from hrm_pms_vertical_increment where DepId=".$res['HR_Curr_DepartmentId']." AND VerticalId=".$res['EmpVertical']." AND ".$res['HR_CurrGradeId'].">=Min_GradeId AND ".$res['HR_CurrGradeId']."<=Max_GradeId AND Max_Ctc<=".$res['EmpCurrCtc']."",$con); 
 $rowVer=mysql_num_rows($sqVer); if($rowVer>0){ $CtcLimitCross=1; }
 }
  
  $up=mysql_query("update hrm_employee_pms set CtcLimitCross=".$CtcLimitCross." where EmployeeID=".$res['EmployeeID']." AND AssessmentYear=9",$con); 

}


*/


/*
$sql=mysql_query("select EmployeeID from hrm_employee_pms where CtcLimitCross=1 AND AssessmentYear=9", $con);
while($res=mysql_fetch_assoc($sql))
{ 
  $AnnBasic=0;
  $sqlBsic=mysql_query("select BAS_Value from hrm_employee_ctc where EmployeeID=".$res['EmployeeID']." AND Status='A'",$con); $resBsic=mysql_fetch_assoc($sqlBsic); 
  if($resBsic['BAS_Value']>0){ $AnnBasic=$resBsic['BAS_Value']*12; }
  
  $up=mysql_query("update hrm_employee_pms set EmpCurrAnnualBasic=".$AnnBasic." where EmployeeID=".$res['EmployeeID']." AND AssessmentYear=9",$con); 

}

*/

//<!------------------------------------------------------------------>
//<!------------------------------------------------------------------>


/*
$sql=mysql_query("Select e.EmployeeID,g.EmpVertical from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where e.EmpStatus='A' and e.CompanyId=1",$con);
while($res=mysql_fetch_assoc($sql))
{
  
$sqlUp=mysql_query("update hrm_employee_pms set EmpVertical=".$res['EmpVertical']." where EmployeeID=".$res['EmployeeID']." AND AssessmentYear=8",$con);

}
*/

/*
$sql=mysql_query("SELECT EmployeeID,BWageId FROM `hrm_employee_ctc` WHERE Status='A' AND BWageId>0 order by EmployeeID asc",$con); 
while($res=mysql_fetch_assoc($sql))
{
$up=mysql_query("update hrm_employee_general set BWageId=".$res['BWageId']." where EmployeeID=".$res['EmployeeID'],$con);
}
*/

/*
$email_to = 'ajaykumar.dewangan@vnrseeds.in';
$email_from='admin@vnrseeds.co.in';
$email_subject = "Leave Application";
$email_txt = "Leave Application"; 
$headers = "From: ".$email_from."\r\n"; 
$semi_rand = md5(time()); 
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$_POST['Ename']='XYZ'; $TotDays=2; $EmployeeId=169; $_POST['FromDate']='30-05-2019'; $_POST['ToDate']='31-05-2019';
$_POST['LeaveType']='PL'; $YearId=8; $Reason='Personal reason';

$email_message .= "<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head><body>";  
$email_message .= $_POST['Ename']." has submitted leave application for <b>".$_POST['LeaveType']."</b> from <b>".$_POST['FromDate']."</b> to <b>".$_POST['ToDate']."</b>, Stating reason as <b>'" .$Reason. "'</b>.<br> Log in ESS to approve or click on the following buttons.<br><br>\n\n";

$email_message .="<a href='https://www.vnrseeds.co.in/hrims/lvapi.php?viewto=".base64_encode('A')."&totd=".base64_encode($TotDays)."&ei=".base64_encode($EmployeeId)."&fd=".base64_encode($_POST['FromDate'])."&td=".base64_encode($_POST['ToDate'])."&lp=".base64_encode($_POST['LeaveType'])."&aplydt=".base64_encode(date('Y-m-d'))."&eType=".base64_encode('Rep')."&yi=".base64_encode($YearId)."' style='text-decoration:none;cursor:pointer;'><input type='button' value='Accept' style='width:90px;height:25px;' /></a>&nbsp;&nbsp;&nbsp;<a href='https://www.vnrseeds.co.in/hrims/lvapi.php?viewto=".base64_encode('R')."&totd=".base64_encode($TotDays)."&ei=".base64_encode($EmployeeId)."&fd=".base64_encode($_POST['FromDate'])."&td=".base64_encode($_POST['ToDate'])."&lp=".base64_encode($_POST['LeaveType'])."&aplydt=".base64_encode(date('Y-m-d'))."&eType=".base64_encode('Rep')."&yi=".base64_encode($YearId)."' style='text-decoration:none;cursor:pointer;'><input type='button' value='Reject' style='width:90px;height:25px;' /></a><br><br>\n\n";

$email_message .= " If Rejected, please state reason.<br><br>\n\n";

$email_message .="From,<br>Admin ESS<br>";
$email_message .="</body></html>";
$ok = @mail($email_to, $email_subject, $email_message, $headers);
*/


/*
$Qyeark=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='KRA'",$con);
$Yeark=mysql_fetch_assoc($Qyeark); $_SESSION['KraYId']=$Yeark['CurrY'];

//Employee 1day On Month
$sql=mysql_query("Select e.EmployeeID,Fname,Sname,Lname,EmailId_Vnr from hrm_pms_kra k inner join hrm_employee e on k.EmployeeID=e.EmployeeID inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where k.YearId=".$Yeark['CurrY']." and k.EmpStatus='A' and e.EmpStatus='A' and k.UseKRA!='E' group by e.EmployeeID",$con);
while($res=mysql_fetch_assoc($sql))
{
 if($res['EmailId_Vnr']!='')
 {
   $email_to = $res['EmailId_Vnr'];
   $email_from='admin@vnrseeds.co.in';
   $email_subject = "Communication: KRA: Self-Assessment";
   $headers = "From: ".$email_from."\r\n"; 
   $semi_rand = md5(time()); 
   $headers .= "MIME-Version: 1.0\r\n";
   $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
   $email_message .= "<html><head></head><body>";
   //$email_message .= "Dear <b>".$res['Fname']." ".$res['Sname']." ".$res['Lname'].", </b> <br><br>\n\n\n";
   $email_message .= "Dear Sir/Mam<b>, </b> <br><br>\n\n\n";
   $email_message .= "Please fill your achievements for your KRAs by 7th of this month if you have set your KRA in monthly,Quarterly breakup. Go to PMS module in ESS.<br><br>\n\n";
   $email_message .= "From <br><b>ADMIN ESS</b><br>";
   $email_message .="</body></html>";	      
   $ok=@mail($email_to, $email_subject, $email_message, $headers);
   //echo $i.'-'.$email_to.' <br>';
 } //$i++;
}

*/
  

/*
$sql=mysql_query("SELECT e.EmployeeID,EmpCode,Fname,Sname,Lname,DepartmentName FROM `hrm_employee_general` g inner join hrm_employee e on g.EmployeeID=e.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId WHERE `DateConfirmationYN`='N' and e.CompanyId=1 and e.EmpStatus='A' order by e.EmpCode asc",$con); 
while($res=mysql_fetch_assoc($sql))
{
$up=mysql_query("update hrm_employee_monthlyleave_balance set OpeningOL=0, CreditedOL=0, TotOL=0, BalanceOL=0 where EmployeeID=".$res['EmployeeID']." AND Month=1 AND Year=2019",$con);
}
*/


/*
$sql=mysql_query("select EmployeeID from hrm_employee",$con);
while($res=mysql_fetch_array($sql))
{
 $sql2=mysql_query("select Cast from hrm_opinion where EmployeeID=".$res['EmployeeID'],$con); $row2=mysql_num_rows($sql2);
 if($row2>0)
 {
 $res2=mysql_fetch_assoc($sql2);
 $up=mysql_query("update hrm_employee_personal set Categoryy='".$res2['Cast']."' where EmployeeID=".$res['EmployeeID'],$con);
 }
}
*/

/*
$ExpMDate=date('Y-m-d', strtotime("-2 months", strtotime(date("Y-m-d")))); 
$Year=date('Y', strtotime("-2 months", strtotime(date("Y-m-d")))); 

$sql=mysql_query("select * from hrm_employee_attendance where AttDate='".$ExpMDate."' order by AttId ASC",$con);
while($res=mysql_fetch_assoc($sql))
{ 
 $sqlchk=mysql_query("select * from hrm_employee_attendance_".$Year." where EmployeeID=".$res['EmployeeID']." AND AttDate='".$ExpMDate."'",$con); $rowchk=mysql_num_rows($sqlchk);
 if($rowchk>0)
 {
  $ins=mysql_query("update hrm_employee_attendance_".$Year." set AttDate='".$res['AttDate']."', CheckSunday='".$res['CheckSunday']."', Year=".$res['Year'].", YearId=".$res['YearId'].", II='".$res['II']."', OO='".$res['OO']."', Inn='".$res['Inn']."', InnCnt='".$res['InnCnt']."', InnLate='".$res['InnLate']."', Outt='".$res['Outt']."', OuttCnt='".$res['OuttCnt']."', OuttLate='".$res['OuttLate']."', Late='".$res['Late']."', Relax='".$res['Relax']."', Allow='".$res['Allow']."', Af15='".$res['Af15']."' where EmployeeID=".$res['EmployeeID']." AND AttDate='".$ExpMDate."'",$con);
  
     //$ins=mysql_query("insert into hrm_employee_attendance_demo(AttId, EmployeeID, AttValue, AttDate, CheckSunday) values(".$res['AttId'].", ".$res['EmployeeID'].", '".$res['AttValue']."', '".$res['AttDate']."', '0')",$con);
 }
 else
 {
  $ins=mysql_query("insert into hrm_employee_attendance_".$Year."(AttId, EmployeeID, AttValue, AttDate, CheckSunday, Year, YearId, II, OO, Inn, InnCnt, InnLate, Outt, OuttCnt, OuttLate, Late, Relax, Allow, Af15) values(".$res['AttId'].", ".$res['EmployeeID'].", '".$res['AttValue']."', '".$res['AttDate']."', '".$res['CheckSunday']."', ".$res['Year'].", ".$res['YearId'].", '".$res['II']."', '".$res['OO']."', '".$res['Inn']."', '".$res['InnCnt']."', '".$res['InnLate']."', '".$res['Outt']."', '".$res['OuttCnt']."', '".$res['OuttLate']."', '".$res['Late']."', '".$res['Relax']."', '".$res['Allow']."', '".$res['Af15']."')",$con);
  
   //$ins=mysql_query("insert into hrm_employee_attendance_demo(AttId, EmployeeID, AttValue, AttDate, CheckSunday) values(".$res['AttId'].", ".$res['EmployeeID'].", '".$res['AttValue']."', '".$res['AttDate']."', '1')",$con);
  
 }
 
 
 
}

*/


/*
$sql=mysql_query("select EmployeeID from hrm_employee where EmpStatus='A' AND CompanyId=".$CompanyId, $con);
while($res=mysql_fetch_assoc($sql))
{ 
 $sqlB=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$res['EmployeeID']." AND Month=2 AND Year=2018", $con); $rowB=mysql_num_rows($sqlB);
  if($rowB>0)
  {
   $resB=mysql_fetch_assoc($sqlB);
   if($resB['OpeningOL']>0)
   {
    $BalOL=$resB['OpeningOL']-$resB['AvailedOL'];
    $sqlUp=mysql_query("update hrm_employee_monthlyleave_balance set BalanceOL='".$BalOL."' where EmployeeID=".$res['EmployeeID']." AND Month=2 AND Year=2018", $con);
   } 
  } 
}
*/

/*
$sql=mysql_query("select EmployeeID from hrm_employee where EmpStatus='A' AND CompanyId=".$CompanyId, $con);
while($res=mysql_fetch_assoc($sql))
{ 
 $sqlB=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$res['EmployeeID']." AND Month=1 AND Year=2018", $con); $rowB=mysql_num_rows($sqlB);
  if($rowB>0)
  {
   $resB=mysql_fetch_assoc($sqlB);
   $TotEL=$resB['OpeningEL']+$resB['CreditedEL'];
   if($TotEL>0)
   {
    $BalEL=$TotEL-$resB['AvailedEL'];
    $sqlUp=mysql_query("update hrm_employee_monthlyleave_balance set TotEL=".$TotEL.", BalanceEL='".$BalEL."' where EmployeeID=".$res['EmployeeID']." AND Month=1 AND Year=2018", $con);
   } 
  } 
}
*/



/* //Set hrm_employee_pms yearid=5 

$sql=mysql_query("select EmployeeID,EmpCode from hrm_employee where EmpStatus='A' AND EmpType='E' AND CompanyId=".$CompanyId, $con);
while($res=mysql_fetch_assoc($sql))
{ 
$sqlCtc=mysql_query("select INCENTIVE_Value,Tot_GrossMonth from hrm_employee_ctc where EmployeeID=".$res['EmployeeID']." AND Status='A'", $con); $resCtc=mysql_fetch_assoc($sqlCtc);
 $sqlGd=mysql_query("select GradeId,DesigId,DepartmentId from hrm_employee_general where EmployeeID=".$res['EmployeeID'], $con); $resGd=mysql_fetch_assoc($sqlGd);
 if($resCtc['Tot_GrossMonth']!=''){$TotGoss=$resCtc['Tot_GrossMonth'];}else{$TotGoss=0;}
 if($resCtc['INCENTIVE_Value']!=''){$Inctv=$resCtc['INCENTIVE_Value'];}else{$Inctv=0;}
 if($resGd['GradeId']!=''){$Grade=$resGd['GradeId'];}else{$Grade=0;} if($resGd['DesigId']!=''){$Desig=$resGd['DesigId'];}else{$Desig=0;}
 if($resGd['DepartmentId']!=''){$Dept=$resGd['DepartmentId'];}else{$Dept=0;}
 
 $sql2=mysql_query("select Appraiser_EmployeeID,Reviewer_EmployeeID,HOD_EmployeeID from hrm_employee_pms where YearId=4 AND EmployeeID=".$res['EmployeeID'], $con); 
 $row2=mysql_num_rows($sql2); 
 if($row2>0)
 { $res2=mysql_fetch_assoc($sql2);
   $app=$res2['Appraiser_EmployeeID'];
   $rev=$res2['Reviewer_EmployeeID'];
   $hod=$res2['HOD_EmployeeID'];
   
   $sql3=mysql_query("select EmpPmsId from hrm_employee_pms where YearId=5 AND EmployeeID=".$res['EmployeeID'], $con); $row3=mysql_num_rows($sql3);
   if($row3==0){ $sqlIns=mysql_query("insert into hrm_employee_pms(AssessmentYear,CompanyId,EmployeeID,Appraiser_EmployeeID,Reviewer_EmployeeID,HOD_EmployeeID,EmpCurrGrossPM,EmpCurrIncentivePM,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId,YearId) values(5, ".$CompanyId.", ".$res['EmployeeID'].", ".$app.", ".$rev.", ".$hod.", ".$TotGoss.", ".$Inctv.", ".$Desig.", ".$Grade.", ".$Dept.", 5)", $con); }
 }
 if($row2==0)
 { 
   $sql3=mysql_query("select EmpPmsId from hrm_employee_pms where YearId=5 AND EmployeeID=".$res['EmployeeID'], $con); $row3=mysql_num_rows($sql3);
   if($row3==0)
   { $sqlIns=mysql_query("insert into hrm_employee_pms(AssessmentYear,CompanyId,EmployeeID,Appraiser_EmployeeID,Reviewer_EmployeeID,HOD_EmployeeID,EmpCurrGrossPM,EmpCurrIncentivePM,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId,YearId) values(5, ".$CompanyId.", ".$res['EmployeeID'].", 0, 0, 0, ".$TotGoss.", ".$Inctv.", ".$Desig.", ".$Grade.", ".$Dept.", 5)", $con); 
   }
 }
}	

*/


/* //Change SL SL SL SL SL SL SL SL SL SL SL SL SL SL SL SL SL SL SL SL SL//

$sql=mysql_query("select EmployeeID from hrm_employee where EmpStatus='A' AND EmpType='E' AND CompanyId=".$CompanyId, $con); 
while($res=mysql_fetch_assoc($sql))
{
  $sqlB=mysql_query("select BalanceSL from hrm_employee_monthlyleave_balance where EmployeeID=".$res['EmployeeID']." AND Month=12 AND Year=2015", $con); 
  $rowB=mysql_num_rows($sqlB); $resB=mysql_fetch_assoc($sqlB);
  if($rowB>0 AND $resB['BalanceSL']>5)
  {
  
    $OSL=$resB['BalanceSL']; $TSL=$resB['BalanceSL']+5;
	$sqlB1=mysql_query("select AvailedSL from hrm_employee_monthlyleave_balance where EmployeeID=".$res['EmployeeID']." AND Month=1 AND Year=2016", $con);
	$resB1=mysql_fetch_assoc($sqlB1);
	if($resB1['AvailedSL']>0){$BalSL1=$TSL-$resB1['AvailedSL'];}else{$BalSL1=$TSL;}
    $sqlUp=mysql_query("update hrm_employee_monthlyleave_balance set OpeningSL=".$OSL.", CreditedSL=5, TotSL=".$TSL.", BalanceSL=".$BalSL1." where EmployeeID=".$res['EmployeeID']." AND Month=1 AND Year=2016", $con);
	
	$sqlB2=mysql_query("select AvailedSL from hrm_employee_monthlyleave_balance where EmployeeID=".$res['EmployeeID']." AND Month=2 AND Year=2016", $con);
	$resB2=mysql_fetch_assoc($sqlB2);
	if($resB2['AvailedSL']>0){$BalSL2=$BalSL1-$resB2['AvailedSL'];}else{$BalSL2=$BalSL1;}
    $sqlUp=mysql_query("update hrm_employee_monthlyleave_balance set OpeningSL=".$BalSL1.", BalanceSL=".$BalSL2." where EmployeeID=".$res['EmployeeID']." AND Month=2 AND Year=2016", $con);
	
	$sqlB3=mysql_query("select AvailedSL from hrm_employee_monthlyleave_balance where EmployeeID=".$res['EmployeeID']." AND Month=3 AND Year=2016", $con);
	$resB3=mysql_fetch_assoc($sqlB3);
	if($resB3['AvailedSL']>0){$BalSL3=$BalSL2-$resB3['AvailedSL'];}else{$BalSL3=$BalSL2;}
    $sqlUp=mysql_query("update hrm_employee_monthlyleave_balance set OpeningSL=".$BalSL2.", BalanceSL=".$BalSL3." where EmployeeID=".$res['EmployeeID']." AND Month=3 AND Year=2016", $con);
	
	$sqlB4=mysql_query("select AvailedSL from hrm_employee_monthlyleave_balance where EmployeeID=".$res['EmployeeID']." AND Month=4 AND Year=2016", $con);
	$resB4=mysql_fetch_assoc($sqlB4);
	if($resB4['AvailedSL']>0){$BalSL4=$BalSL3-$resB4['AvailedSL'];}else{$BalSL4=$BalSL3;}
    $sqlUp=mysql_query("update hrm_employee_monthlyleave_balance set OpeningSL=".$BalSL3.", BalanceSL=".$BalSL4." where EmployeeID=".$res['EmployeeID']." AND Month=4 AND Year=2016", $con);	
	
	$sqlB5=mysql_query("select AvailedSL from hrm_employee_monthlyleave_balance where EmployeeID=".$res['EmployeeID']." AND Month=5 AND Year=2016", $con);
	$resB5=mysql_fetch_assoc($sqlB5);
	if($resB5['AvailedSL']>0){$BalSL5=$BalSL4-$resB5['AvailedSL'];}else{$BalSL5=$BalSL4;}
    $sqlUp=mysql_query("update hrm_employee_monthlyleave_balance set OpeningSL=".$BalSL4.", BalanceSL=".$BalSL5." where EmployeeID=".$res['EmployeeID']." AND Month=5 AND Year=2016", $con);
	    
  }
  
}
*/




/*
$sql=mysql_query("select * from hrm_sales_sal_details where DealerId=1028 AND YearId=4", $con); 
while($res=mysql_fetch_assoc($sql))
{ 
 $sql2=mysql_query("select * from hrm_sales_sal_details where DealerId=1113 AND ItemId=".$res['ItemId']." AND ProductId=".$res['ProductId']." AND YearId=4", $con);
 $row2=mysql_num_rows($sql2);

 if($row2>0)
 { $res2=mysql_fetch_assoc($sql2);
   $sqlUp=mysql_query("update hrm_sales_sal_details set M4_Ach='".$res['M4_Ach']."', M5_Ach='".$res['M5_Ach']."', M6_Ach='".$res['M6_Ach']."', M10_Ach='".$res['M10_Ach']."' where DealerId=1113 AND ItemId=".$res['ItemId']." AND ProductId=".$res['ProductId']." AND YearId=4", $con);
 }
 elseif($row2==0)
 {
  $sqlUp=mysql_query("insert into hrm_sales_sal_details(DealerId, ItemId, ProductId, YearId, M4_Ach, M5_Ach, M6_Ach, M10_Ach) values(1113, ".$res['ItemId'].", ".$res['ProductId'].", 4, '".$res['M4_Ach']."', '".$res['M5_Ach']."', '".$res['M6_Ach']."', '".$res['M10_Ach']."')", $con);
 }
}
*/



/*Update Employee Asset*/
/*
$sql=mysql_query("select EmployeeID from hrm_employee where EmpStatus='A' AND EmpType='E' AND CompanyId=".$CompanyId, $con);
while($res=mysql_fetch_assoc($sql))
{ $sqlG=mysql_query("select GradeId from hrm_employee_general where EmployeeID=".$res['EmployeeID'], $con); $resG=mysql_fetch_assoc($sqlG);
  $sqla=mysql_query("select * from hrm_asset_name where Status='A'", $con);
  while($resa=mysql_fetch_assoc($sqla))
  {
    $sqlchk=mysql_query("select * from hrm_asset_name_grade where GradeId=".$resG['GradeId']." AND AssetNId=".$resa['AssetNId']." AND AssetGSt='Y'", $con); 
	$rowchk=mysql_num_rows($sqlchk);
	if($rowchk>0)
	{ $reschk=mysql_fetch_assoc($sqlchk);
	  $sqlchkE=mysql_query("select * from hrm_asset_name_emp where EmployeeID=".$res['EmployeeID']." AND AssetNId=".$resa['AssetNId'], $con); $rowchkE=mysql_num_rows($sqlchkE);
	  if($rowchkE==0)
	  {$sqlIns=mysql_query("insert into hrm_asset_name_emp(EmployeeID, AssetNId, AssetESt, AssetELimit) values(".$res['EmployeeID'].", ".$resa['AssetNId'].", 'Y', '".$reschk['AssetGLimit']."')", $con);}
	}
  }  
}
*/

/*
$sql=mysql_query("select EmployeeID,EmpCode from hrm_employee where EmpStatus='A' AND EmpType='E' AND CompanyId=".$CompanyId, $con);
while($res=mysql_fetch_assoc($sql))
{ 
$sqlCtc=mysql_query("select INCENTIVE_Value,Tot_GrossMonth from hrm_employee_ctc where EmployeeID=".$res['EmployeeID']." AND Status='A'", $con); $resCtc=mysql_fetch_assoc($sqlCtc);
 $sqlGd=mysql_query("select GradeId,DesigId,DepartmentId from hrm_employee_general where EmployeeID=".$res['EmployeeID'], $con); $resGd=mysql_fetch_assoc($sqlGd);
 if($resCtc['Tot_GrossMonth']!=''){$TotGoss=$resCtc['Tot_GrossMonth'];}else{$TotGoss=0;}
 if($resCtc['INCENTIVE_Value']!=''){$Inctv=$resCtc['INCENTIVE_Value'];}else{$Inctv=0;}
 if($resGd['GradeId']!=''){$Grade=$resGd['GradeId'];}else{$Grade=0;} if($resGd['DesigId']!=''){$Desig=$resGd['DesigId'];}else{$Desig=0;}
 if($resGd['DepartmentId']!=''){$Dept=$resGd['DepartmentId'];}else{$Dept=0;}
 
 $sql2=mysql_query("select Appraiser_EmployeeID,Reviewer_EmployeeID,HOD_EmployeeID from hrm_employee_pms where YearId=3 AND EmployeeID=".$res['EmployeeID'], $con); 
 $row2=mysql_num_rows($sql2); 
 if($row2>0)
 { $res2=mysql_fetch_assoc($sql2);
   $sql3=mysql_query("select EmpPmsId from hrm_employee_pms where YearId=4 AND EmployeeID=".$res['EmployeeID'], $con); $row3=mysql_num_rows($sql3);
   if($row3==0){ $sqlIns=mysql_query("insert into hrm_employee_pms(AssessmentYear,CompanyId,EmployeeID,Appraiser_EmployeeID,Reviewer_EmployeeID,HOD_EmployeeID,EmpCurrGrossPM,EmpCurrIncentivePM,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId,YearId) values(4, ".$CompanyId.", ".$res['EmployeeID'].", ".$res2['Appraiser_EmployeeID'].", ".$res2['Reviewer_EmployeeID'].", ".$res2['HOD_EmployeeID'].", ".$TotGoss.", ".$Inctv.", ".$Desig.", ".$Grade.", ".$Dept.", 4)", $con); }
 }
 if($row2==0)
 { 
   $sql3=mysql_query("select EmpPmsId from hrm_employee_pms where YearId=4 AND EmployeeID=".$res['EmployeeID'], $con); $row3=mysql_num_rows($sql3);
   if($row3==0)
   { $sqlIns=mysql_query("insert into hrm_employee_pms(AssessmentYear,CompanyId,EmployeeID,Appraiser_EmployeeID,Reviewer_EmployeeID,HOD_EmployeeID,EmpCurrGrossPM,EmpCurrIncentivePM,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId,YearId) values(4, ".$CompanyId.", ".$res['EmployeeID'].", 0, 0, 0, ".$TotGoss.", ".$Inctv.", ".$Desig.", ".$Grade.", ".$Dept.", 4)", $con); 
   }
 }
}	

*/

/** Update Sales Reporting Level Open
$sql=mysql_query("select hrm_employee.EmployeeID,RepEmployeeID from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.EmpType='E' AND CompanyId=".$CompanyId, $con); //AND DepartmentId=6
while($res=mysql_fetch_assoc($sql))
{  

 $E=$res['EmployeeID']; 
 if($res['RepEmployeeID']>0)
 { $R1=$res['RepEmployeeID'];
   $sqlR2=mysql_query("select RepEmployeeID from hrm_employee_general where EmployeeID=".$res['RepEmployeeID'], $con); $resR2=mysql_fetch_assoc($sqlR2);
   if($resR2['RepEmployeeID']>0)
   { $R2=$resR2['RepEmployeeID'];
     $sqlR3=mysql_query("select RepEmployeeID from hrm_employee_general where EmployeeID=".$resR2['RepEmployeeID'], $con); $resR3=mysql_fetch_assoc($sqlR3); 
	 if($resR3['RepEmployeeID']>0)
     { $R3=$resR3['RepEmployeeID'];
	   $sqlR4=mysql_query("select RepEmployeeID from hrm_employee_general where EmployeeID=".$resR3['RepEmployeeID'], $con); $resR4=mysql_fetch_assoc($sqlR4); 
	   if($resR4['RepEmployeeID']>0)
       { $R4=$resR4['RepEmployeeID'];
	     $sqlR5=mysql_query("select RepEmployeeID from hrm_employee_general where EmployeeID=".$resR4['RepEmployeeID'], $con); $resR5=mysql_fetch_assoc($sqlR5); 
         if($resR5['RepEmployeeID']>0){ $R5=$resR5['RepEmployeeID']; } else{$R5=0;}
       } else{$R4=0; $R5=0;}
     } else{$R3=0; $R4=0; $R5=0;}
   } else{$R2=0; $R3=0; $R4=0; $R5=0;}
  } else{$R1=0; $R2=0; $R3=0; $R4=0; $R5=0;}
 
  $sqlSE=mysql_query("select * from hrm_sales_reporting_level where EmployeeID=".$E, $con); $rowSE=mysql_num_rows($sqlSE);
  if($rowSE==0)
  { $sqlU=mysql_query("insert into hrm_sales_reporting_level(EmployeeID,R1,R2,R3,R4,R5) values(".$E.",".$R1.",".$R2.",".$R3.",".$R4.",".$R5.")", $con); }
  elseif($rowSE>0)
  { $sqlU=mysql_query("update hrm_sales_reporting_level set R1=".$R1.",R2=".$R2.",R3=".$R3.",R4=".$R4.",R5=".$R5." where EmployeeID=".$E, $con); }
  
}  
 Update Sales Reporting Level Close **/



/*
$sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.EmpType='E' AND CompanyId=".$CompanyId, $con);
while($res=mysql_fetch_assoc($sql)){
$sql2=mysql_query("select EmpPmsId from hrm_employee_pms where YearId=4 AND EmployeeID=".$res['EmployeeID'], $con); $row=mysql_num_rows($sql2);
if($row==0){ $sqlIns=mysql_query("insert into hrm_employee_pms(AssessmentYear,CompanyId,EmployeeID,HR_Curr_DepartmentId,YearId) values(4, ".$CompanyId.", ".$res['EmployeeID'].", ".$res['DepartmentId'].", 4)", $con); } }
*/

/*
$sql=mysql_query("select EmployeeID from hrm_employee where EmpStatus='A' AND CompanyId=".$CompanyId, $con); 
 while($res=mysql_fetch_assoc($sql))
 {
  $sqlG=mysql_query("select RepEmployeeID from hrm_employee_general where EmployeeID=".$res['EmployeeID'], $con); $resG=mysql_fetch_assoc($sqlG); 
  $sqlUp=mysql_query("update hrm_employee_reporting set AppraiserId=".$resG['RepEmployeeID']." where EmployeeID=".$res['EmployeeID'], $con);  
 }
*/


/*
$sql=mysql_query("select EmployeeID from hrm_employee where EmpStatus='A' AND CompanyId=".$CompanyId, $con); 
 while($res=mysql_fetch_assoc($sql))
 {
  $sqlB=mysql_query("select EC from hrm_employee_monthlyleave_balance where EmployeeID=".$res['EmployeeID']." AND Month=1 AND Year=2014 AND BalancePL=8", $con); 
  $sqlL=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where EmployeeID=".$res['EmployeeID']." AND Apply_Date>='2014-01-01' AND Leave_Type='PL'", $con); 
  $rowB=mysql_num_rows($sqlB); 
  $rowL=mysql_num_rows($sqlL); //echo $rowB.'-'.$rowL;
  if($rowB>0 AND $rowL==0)
  {   
    $sqlUp=mysql_query("update hrm_employee_monthlyleave_balance set OpeningPL=6, OpeningOL=2, TotPL=6, TotOL=2, BalancePL=6, BalanceOL=2 where EmployeeID=".$res['EmployeeID']." AND Month=2 AND Year=2014", $con);    
  }
 }
*/



/*
if($_REQUEST['Action']=='ReSetTabGeneral')
{
 $sql=mysql_query("select hrm_restructuring.*,EmpCode from hrm_restructuring INNER JOIN hrm_employee ON hrm_restructuring.EmployeeID=hrm_employee.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_restructuring.Year=2014", $con); 
 while($res=mysql_fetch_assoc($sql))
 { //While Open;
   $sqlDeptC = mysql_query("select DepartmentName from hrm_department where DepartmentId=".$res['Current_DepartmentId'], $con); $resDeptC=mysql_fetch_assoc($sqlDeptC);
   $sqlDeC=mysql_query("select DesigName from hrm_designation where DesigId=".$res['Current_DesigId'], $con); $resDeC=mysql_fetch_assoc($sqlDeC);
   $sqlGrC=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Current_GradeId']." AND CompanyId=".$CompanyId, $con); $resGrC=mysql_fetch_assoc($sqlGrC);
   $sqlDeptN = mysql_query("select DepartmentName from hrm_department where DepartmentId=".$res['New_DepartmentId'], $con); $resDeptN=mysql_fetch_assoc($sqlDeptN);
   $sqlDeN=mysql_query("select DesigName from hrm_designation where DesigId=".$res['New_DesigId'], $con); $resDeN=mysql_fetch_assoc($sqlDeN);
   $sqlGrN=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['New_GradeId']." AND CompanyId=".$CompanyId, $con); $resGrN=mysql_fetch_assoc($sqlGrN);
   
   $sqlHC = mysql_query("SELECT MAX(SalaryChange_Date) as SalaryChD FROM hrm_pms_appraisal_history where EmpCode=".$res['EmpCode']." AND CompanyId=".$CompanyId, $con); 
   $resHC = mysql_fetch_assoc($sqlHC); 
   $sqlMax = mysql_query("SELECT * FROM hrm_pms_appraisal_history where SalaryChange_Date='".$resHC['SalaryChD']."' AND EmpCode=".$res['EmpCode']." AND CompanyId=".$CompanyId, $con);
   $resMax = mysql_fetch_assoc($sqlMax);
   
   $sqlHis=mysql_query("select * from hrm_pms_appraisal_history where EmpCode=".$res['EmpCode']." AND SalaryChange_Date='2014-01-31' AND CompanyId=".$CompanyId, $con); 
   $rowHis=mysql_num_rows($sqlHis); 
   if($rowHis>0)
    { 
    $sqlUpIns=mysql_query("update hrm_pms_appraisal_history set Current_Grade='".$resGrC['GradeValue']."', Proposed_Grade='".$resGrN['GradeValue']."', Department='".$resDeptN['DepartmentName']."', Current_Designation='".$resDeC['DesigName']."', Proposed_Designation='".$resDeN['DesigName']."' where EmpCode=".$res['EmpCode']." AND SalaryChange_Date='2014-01-31' AND CompanyId=".$CompanyId, $con); 
    }
   if($rowHis==0)
    { 
    $sqlUpIns=mysql_query("insert into hrm_pms_appraisal_history(EmpPmsId, EmpCode, EmpName, Current_Grade, Proposed_Grade, Department, Current_Designation, Proposed_Designation, SalaryChange_Date, Salary_Basic, Salary_HRA, Salary_CA, Salary_SA, Previous_GrossSalaryPM, Current_GrossSalaryPM, Proposed_GrossSalaryPM, BonusAnnual_September, Prop_PeInc_GSPM, PropSalary_Correction, TotalProp_GSPM, TotalProp_PerInc_GSPM, Score, Rating, CompanyId, YearId) values(0, ".$res['EmpCode'].", '".$resMax['EmpName']."', '".$resGrC['GradeValue']."', '".$resGrN['GradeValue']."', '".$resDeptN['DepartmentName']."', '".$resDeC['DesigName']."', '".$resDeN['DesigName']."', '2014-02-01', '".$resMax['Salary_Basic']."', '".$resMax['Salary_HRA']."', '".$resMax['Salary_CA']."', '".$resMax['Salary_SA']."', '".$resMax['Previous_GrossSalaryPM']."', '".$resMax['Current_GrossSalaryPM']."', 0, '".$resMax['BonusAnnual_September']."', 0, 0, '".$resMax['TotalProp_GSPM']."', 0, 0, 0, ".$CompanyId.", ".$YearId.")", $con);
    }
    if($sqlUpIns)
	{
	 $SqlUpGen = mysql_query("UPDATE hrm_employee_general2 SET DepartmentId=".$res['New_DepartmentId'].", DesigId=".$res['New_DesigId'].", GradeId=".$res['New_GradeId'].", CreatedBy=".$UserId.", CreatedDate='2014-01-31', YearId=".$YearId." WHERE EmployeeID=".$res['EmployeeID'], $con);
         $SqlUpGen = mysql_query("UPDATE hrm_employee_general SET DepartmentId=".$res['New_DepartmentId'].", DesigId=".$res['New_DesigId'].", GradeId=".$res['New_GradeId'].", CreatedBy=".$UserId.", CreatedDate='2014-01-31', YearId=".$YearId." WHERE EmployeeID=".$res['EmployeeID'], $con); 
	}
     
 } //While Closed;

  if($SqlUpGen){echo '<script>alert("Data Updated Successfully...");</script>';}
}

*/


/*
if($_REQUEST['Action']=='ReStructure') {
$sql=mysql_query("select hrm_employee.EmployeeID,DepartmentId,DesigId,GradeId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId, $con); while($res=mysql_fetch_assoc($sql)){
$sql2=mysql_query("select ReStrId from hrm_restructuring where EmployeeID=".$res['EmployeeID']." AND Year=2014", $con); $row=mysql_num_rows($sql2);
if($row==0){ $sqlIns=mysql_query("insert into hrm_restructuring(YearId,Year,StrDate,EmployeeID,Current_DepartmentId,Current_GradeId,Current_DesigId,New_DepartmentId,New_DesigId) values(".$YearId.", 2014, '2014-02-01', ".$res['EmployeeID'].", ".$res['DepartmentId'].", ".$res['GradeId'].", ".$res['DesigId'].", ".$res['DepartmentId'].", ".$res['DesigId'].")", $con); } }
}
*/



/*
$sql22=mysql_query("select EmployeeID from hrm_employee where EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId, $con); 
while($res22=mysql_fetch_array($sql22)){    		
$sql = mysql_query("SELECT Dummy_EmpRating FROM hrm_employee_pms where EmployeeID=".$res22['EmployeeID']." AND AssessmentYear=".$YearId." AND CompanyId=".$CompanyId." AND Dummy_EmpRating>0 AND Dummy_AppRating=0 AND Dummy_RevRating=0 AND Dummy_HodRating=0", $con); $row=mysql_num_rows($sql); $res = mysql_fetch_assoc($sql);
if($row>0){
$sqlUp=mysql_query("update hrm_employee_pms set Dummy_AppRating=".$res['Dummy_EmpRating'].", Dummy_RevRating=".$res['Dummy_EmpRating'].", Dummy_HodRating=".$res['Dummy_EmpRating']." where EmployeeID=".$res22['EmployeeID']." AND CompanyId=".$CompanyId." AND AssessmentYear=".$YearId, $con);} 
} 
*/

/*
$sql22=mysql_query("select EmployeeID from hrm_employee where EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId, $con); 
while($res22=mysql_fetch_array($sql22)){    		
$sql = mysql_query("SELECT Dummy_AppRating FROM hrm_employee_pms where EmployeeID=".$res22['EmployeeID']." AND AssessmentYear=".$YearId." AND CompanyId=".$CompanyId." AND Dummy_EmpRating>0 AND Dummy_AppRating>0 AND Dummy_RevRating=0 AND Dummy_HodRating=0", $con); $row=mysql_num_rows($sql); $res = mysql_fetch_assoc($sql);
if($row>0){
$sqlUp=mysql_query("update hrm_employee_pms set Dummy_RevRating=".$res['Dummy_AppRating'].", Dummy_HodRating=".$res['Dummy_AppRating']." where EmployeeID=".$res22['EmployeeID']." AND CompanyId=".$CompanyId." AND AssessmentYear=".$YearId, $con); } 
} 
*/

/*
$sql22=mysql_query("select EmployeeID from hrm_employee where EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId, $con); 
while($res22=mysql_fetch_array($sql22)){    		
$sql = mysql_query("SELECT Dummy_RevRating FROM hrm_employee_pms where EmployeeID=".$res22['EmployeeID']." AND AssessmentYear=".$YearId." AND CompanyId=".$CompanyId." AND Dummy_EmpRating>0 AND Dummy_AppRating>0 AND Dummy_RevRating>0 AND Dummy_HodRating=0", $con); $row=mysql_num_rows($sql); $res = mysql_fetch_assoc($sql);
if($row>0){
$sqlUp=mysql_query("update hrm_employee_pms set Dummy_HodRating=".$res['Dummy_RevRating']." where EmployeeID=".$res22['EmployeeID']." AND CompanyId=".$CompanyId." AND AssessmentYear=".$YearId, $con); } 
} 
*/

////////////////////////////////////////////////////////////////////////////////////////////

/*
$sql22=mysql_query("select EmployeeID from hrm_employee where EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId, $con); 
while($res22=mysql_fetch_array($sql22)){    		
$sqlD = mysql_query("SELECT DepartmentId FROM hrm_employee_general where EmployeeID=".$res22['EmployeeID'], $con); $resD = mysql_fetch_assoc($sqlD);
$sqlUp=mysql_query("update hrm_employee_pms set HR_Curr_DepartmentId=".$resD['DepartmentId']." where EmployeeID=".$res22['EmployeeID']." AND CompanyId=".$CompanyId." AND AssessmentYear=".$YearId, $con); } 
*/



/*
$sql22=mysql_query("select EmployeeID from hrm_employee where EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId, $con); 
while($res22=mysql_fetch_array($sql22)){    		
$sqlM = mysql_query("SELECT INCENTIVE_Value,Tot_GrossMonth FROM hrm_employee_ctc where EmployeeID=".$res22['EmployeeID']." AND Status='A'", $con); $resM = mysql_fetch_assoc($sqlM);
$sqlUp=mysql_query("update hrm_employee_pms set EmpCurrGrossPM=".$resM['Tot_GrossMonth'].", EmpCurrIncentivePM=".$resM['INCENTIVE_Value']." where EmployeeID=".$res22['EmployeeID']." AND CompanyId=".$CompanyId." AND AssessmentYear=".$YearId, $con); 
} 
*/

/*
$sql=mysql_query("select EmployeeID from hrm_employee where EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId, $con); 
while($res=mysql_fetch_array($sql)){    		
$sqlRat = mysql_query("SELECT Emp_TotalFinalRating,Appraiser_TotalFinalRating,Reviewer_TotalFinalRating,Hod_TotalFinalRating FROM hrm_employee_pms where EmployeeID=".$res['EmployeeID']." AND AssessmentYear=2", $con); $resRat = mysql_fetch_assoc($sqlRat);
$sqlUp=mysql_query("update hrm_employee_pms set Dummy_EmpRating=".$resRat['Emp_TotalFinalRating'].", Dummy_AppRating=".$resRat['Appraiser_TotalFinalRating'].", Dummy_RevRating=".$resRat['Reviewer_TotalFinalRating'].", Dummy_HodRating=".$resRat['Reviewer_TotalFinalRating']." where EmployeeID=".$res['EmployeeID']." AND CompanyId=".$CompanyId." AND AssessmentYear=2", $con); 
} 
*/

/*
$sql=mysql_query("select EmployeeID from hrm_employee where EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId, $con); 
while($res=mysql_fetch_array($sql)){    		
$sqlRat = mysql_query("SELECT Reviewer_TotalFinalScore,Reviewer_TotalFinalRating FROM hrm_employee_pms where EmployeeID=".$res['EmployeeID']." AND AssessmentYear=2", $con); 
$resRat = mysql_fetch_assoc($sqlRat);
$sqlUp=mysql_query("update hrm_employee_pms set Hod_TotalFinalScore=".$resRat['Reviewer_TotalFinalScore'].", Hod_TotalFinalRating=".$resRat['Reviewer_TotalFinalRating'].", Dummy_HodRating=".$resRat['Reviewer_TotalFinalRating']." where EmployeeID=".$res['EmployeeID']." AND CompanyId=".$CompanyId." AND AssessmentYear=2", $con); 
}
*/

if($_REQUEST['Action']=='ScalatedQuery') { $CurrDate=date('Y-m-d h:i:s');  /*Escalated mailing Query*/
/*Rporting*/ $sqlQA = mysql_query("select * from hrm_employee_queryemp where (QStatus=0 OR QStatus=1) AND QCloseStatus='N' AND MailTo_Emp=1 AND MailTo_QueryOwner=1 AND QueryStatus_Emp!=3 AND QueryStatus_Emp!=4 AND '".$CurrDate."'>=Level_2QToDT AND '".$CurrDate."'<=Level_3QToDT order by QueryId DESC", $con); $rowQA=mysql_num_rows($sqlQA);
if($rowQA>0){ while($resQA=mysql_fetch_array($sqlQA)){
$sqlEA=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$resQA['EmployeeID'], $con); 
$resEA=mysql_fetch_assoc($sqlEA);  if($resEA['DR']=='Y'){$M2='Dr.';} elseif($resEA['Gender']=='M'){$M2='Mr.';} elseif($resEA['Gender']=='F' AND $resEA['Married']=='Y'){$M2='Mrs.';} elseif($resEA['Gender']=='F' AND $resEA['Married']=='N'){$M2='Miss.';}  $EName=$M2.' '.$resEA['Fname'].' '.$resEA['Sname'].' '.$resEA['Lname'];
$sqlRA=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$resQA['Level_1ID'], $con); 
$resRA=mysql_fetch_assoc($sqlRA);  if($resRA['DR']=='Y'){$M3='Dr.';} elseif($resRA['Gender']=='M'){$M3='Mr.';} elseif($resRA['Gender']=='F' AND $resRA['Married']=='Y'){$M3='Mrs.';} elseif($resRA['Gender']=='F' AND $resRA['Married']=='N'){$M3='Miss.';}  $RName=$M3.' '.$resRA['Fname'].' '.$resRA['Sname'].' '.$resRA['Lname'];
$sqlRA2=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$resQA['Level_2ID'], $con); 
$resRA2=mysql_fetch_assoc($sqlRA2);  if($resRA2['DR']=='Y'){$M4='Dr.';} elseif($resRA2['Gender']=='M'){$M4='Mr.';} elseif($resRA2['Gender']=='F' AND $resRA2['Married']=='Y'){$M4='Mrs.';} elseif($resRA2['Gender']=='F' AND $resRA2['Married']=='N'){$M4='Miss.';}  $R2Name=$M4.' '.$resRA2['Fname'].' '.$resRA2['Sname'].' '.$resRA2['Lname'];
if($resQA['QuerySubject']=='N'){$QS=$resQA['OtherSubject'];}else{$QS=$resQA['QuerySubject'];} if($resQA['HideYesNo']=='Y'){$name='Name Undisclosed';}else{$name=$EName;}

$sqlMK4=mysql_query("select * from hrm_employee_querymail_key where QueryMailId=4 AND CompanyId=".$CompanyId, $con); $resMK4=mysql_fetch_assoc($sqlMK4);

   if($resEA['EmailId_Vnr']!='' AND $resMK4['Employee']=='Y')   //Self
   {
    //$email_to = "ajaykumar.dewangan@vnrseeds.in"; 
	$email_to = $resEA['EmailId_Vnr'];
    if($resEA['EmailId_Vnr']==''){$email_from = $name;} else {$email_from=$resEA['EmailId_Vnr'];}
	$email_subject = "Query scalated to next level";  $semi_rand = md5(time()); 
	$headers = "From: " . $email_from . "\r\n"; $headers .= "MIME-Version: 1.0\r\n"; $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $email_message .= "Dear <b>".$name."</b> <br><br>\n\n\n"; 
	$email_message .= "The query raised by you on subject-<b>".$QS."</b> could not be resolved at  level-1 and the same has been escalated to the next level (Level-2) for resolution.<br>";
	$email_message .= "The Level-2 query owner will revert on your query within 3 working days.<br><br>\n\n\n";
	$email_message .= "From <br><b>ADMIN ESS</b><br>";
    $ok = @mail($email_to, $email_subject, $email_message, $headers);
   }         
   
   
   if($resRA2['EmailId_Vnr']!='' AND $resMK4['Leve_2']=='Y')  // //Query owner(Reporting)
   {
    //$email_to2 = "ajaykumar.dewangan@vnrseeds.in";
	$email_to2 = $resRA2['EmailId_Vnr'];
    if($resRA['EmailId_Vnr']==''){$email_from2 = $RName;} else {$email_from2=$resRA['EmailId_Vnr'];}
	$email_subject2 = "Escalation of query by ".$RName;  $semi_rand = md5(time()); 
	$headers2 = "From: " . $email_from2 . "\r\n";  $headers2 .= "MIME-Version: 1.0\r\n";  $headers2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $email_message2 .= "Dear <b>".$R2Name."</b> <br><br>\n\n\n";
    $email_message2 .= "The query raised by <b>".$EName."</b> on subject-<b>".$QS."</b> could not be resolved at level-1 and the same has been escalated to you for resolution, go to <b>ESS-QUERY</b> for more details <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.<br>"; 
	$email_message2 .= "You need to answer the query in 3 working days after which it will get escalated to HOD.<br><br>\n\n\n";
	$email_message2 .= "From <br><b>ADMIN ESS</b><br>";
    $ok = @mail($email_to2, $email_subject2, $email_message2, $headers2);
   }

$sqlRH=mysql_query("select RepMgrId,Level_1ID from hrm_employee_queryemp where QueryId=".$resQA['QueryId'], $con); $resRH=mysql_fetch_assoc($sqlRH); 
$sqlR=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$resRH['RepMgrId'], $con); 
$resR=mysql_fetch_assoc($sqlR);  if($resR['DR']=='Y'){$MR='Dr.';} elseif($resR['Gender']=='M'){$MR='Mr.';} elseif($resR['Gender']=='F' AND $resR['Married']=='Y'){$MR='Mrs.';} elseif($resR['Gender']=='F' AND $resR['Married']=='N'){$MR='Miss.';}  $NameR=$MR.' '.$resR['Fname'].' '.$resR['Sname'].' '.$resR['Lname'];

$sql_1=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$resRH['Level_1ID'], $con); 
$res_1=mysql_fetch_assoc($sql_1);  if($res_1['DR']=='Y'){$M_1='Dr.';} elseif($res_1['Gender']=='M'){$M_1='Mr.';} elseif($res_1['Gender']=='F' AND $res_1['Married']=='Y'){$M_1='Mrs.';} elseif($res_1['Gender']=='F' AND $res_1['Married']=='N'){$M_1='Miss.';}  $Name_1=$M_1.' '.$res_1['Fname'].' '.$res_1['Sname'].' '.$res_1['Lname'];
   
   //Reporting Mgr
   if($resR['EmailId_Vnr']!='' AND $resMK4['ReportingMgr']=='Y')
   {
    //$email_toR = "ajaykumar.dewangan@vnrseeds.in";
	$email_toR = $resR['EmailId_Vnr'];
    if($resE['EmailId_Vnr']==''){$email_fromR = $EName;} else {$email_fromR=$resE['EmailId_Vnr'];}
	$email_subjectR = "Escalation of query in level-2.";  $semi_rand = md5(time()); 
	$headersR = "From: " . $email_fromR . "\r\n";
    $headersR .= "MIME-Version: 1.0\r\n";
    $headersR .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $email_messageR = "Dear <b>".$NameR."</b> <br><br>\n\n\n";
    $email_messageR .= "The query raised by your team member ".$name." on subject-<b>".$QS."</b> could not be resolved at level-1 and the same has been escalated to the next level (Level-2) for resolution.<br><br>\n\n\n";
	$email_messageR .= "From <br><b>ADMIN ESS</b><br>";
    $ok = @mail($email_toR, $email_subjectR, $email_messageR, $headersR);
   }
      
   
   //Level_1 Query owner
   if($res_1['EmailId_Vnr']!='' AND $resMK4['Leve_1']=='Y')
   {
    //$email_to_1 = "ajaykumar.dewangan@vnrseeds.in";
	$email_to_1 = $res_1['EmailId_Vnr'];
    if($resE['EmailId_Vnr']==''){$email_from_1 = $EName;} else {$email_from_1=$resE['EmailId_Vnr'];}
	$email_subject_1 = "Escalation of query in level-2.";  $semi_rand = md5(time()); 
	$headers_1 = "From: " . $email_from_1 . "\r\n";
    $headers_1 .= "MIME-Version: 1.0\r\n";
    $headers_1 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $email_message_1 = "Dear <b>".$Name_1."</b> <br><br>\n\n\n";
    $email_message_1 .= "The query raised by ".$name." on subject-<b>".$QS."</b> could not be resolved at your level and the same has been escalated to your reporting manager for resolution.<br><br>\n\n\n";
	$email_message_1 .= "From <br><b>ADMIN ESS</b><br>";
    $ok = @mail($email_to_1, $email_subject_1, $email_message_1, $headers_1);
   }      
  
   $sqlUp=mysql_query("update hrm_employee_queryemp set MailTo_Emp=2, MailTo_QueryOwner=2 where QueryId=".$resQA['QueryId'], $con);
} }

/*HOD*/ $sqlQH = mysql_query("select * from hrm_employee_queryemp where (QStatus=0 OR QStatus=1) AND QCloseStatus='N' AND MailTo_Emp=2 AND MailTo_QueryOwner=2 AND QueryStatus_Emp!=3 AND QueryStatus_Emp!=4 AND '".$CurrDate."'>=Level_3QToDT AND '".$CurrDate."'<=Mngmt_QToDT order by QueryId DESC", $con); $rowQH=mysql_num_rows($sqlQH);
if($rowQH>0){ while($resQH=mysql_fetch_array($sqlQH)){
$sqlEH=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$resQH['EmployeeID'], $con); 
$resEH=mysql_fetch_assoc($sqlEH);  if($resEH['DR']=='Y'){$MH2='Dr.';} elseif($resEH['Gender']=='M'){$MH2='Mr.';} elseif($resEH['Gender']=='F' AND $resEH['Married']=='Y'){$MH2='Mrs.';} elseif($resEH['Gender']=='F' AND $resEH['Married']=='N'){$MH2='Miss.';}  $EHName=$MH2.' '.$resEH['Fname'].' '.$resEH['Sname'].' '.$resEH['Lname'];
$sqlRH=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$resQH['Level_2ID'], $con); 
$resRH=mysql_fetch_assoc($sqlRH);  if($resRH['DR']=='Y'){$MH3='Dr.';} elseif($resRH['Gender']=='M'){$MH3='Mr.';} elseif($resRH['Gender']=='F' AND $resRH['Married']=='Y'){$MH3='Mrs.';} elseif($resRH['Gender']=='F' AND $resRH['Married']=='N'){$MH3='Miss.';}  $RHName=$MH3.' '.$resRH['Fname'].' '.$resRH['Sname'].' '.$resRH['Lname'];
$sqlRH2=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$resQH['Level_3ID'], $con); 
$resRH2=mysql_fetch_assoc($sqlRH2);  if($resRH2['DR']=='Y'){$MH4='Dr.';} elseif($resRH2['Gender']=='M'){$MH4='Mr.';} elseif($resRH2['Gender']=='F' AND $resRH2['Married']=='Y'){$MH4='Mrs.';} elseif($resRH2['Gender']=='F' AND $resRH2['Married']=='N'){$MH4='Miss.';}  $RH2Name=$MH4.' '.$resRH2['Fname'].' '.$resRH2['Sname'].' '.$resRH2['Lname'];
if($resQH['QuerySubject']=='N'){$QSH=$resQH['OtherSubject'];}else{$QSH=$resQH['QuerySubject'];} if($resQH['HideYesNo']=='Y'){$nameH='Name Undisclosed';}else{$nameH=$EHName;}

$sqlMK5=mysql_query("select * from hrm_employee_querymail_key where QueryMailId=5 AND CompanyId=".$CompanyId, $con); $resMK5=mysql_fetch_assoc($sqlMK5);

   if($resEH['EmailId_Vnr']!='' AND $resMK5['Employee']=='Y')   //Self
   {
    //$email_toH = "ajaykumar.dewangan@vnrseeds.in"; 
	$email_toH = $resEH['EmailId_Vnr'];
    if($resEH['EmailId_Vnr']==''){$email_fromH = $nameH;} else {$email_fromH=$resEH['EmailId_Vnr'];}
	$email_subjectH = "Query scalated to next level";  $semi_rand = md5(time()); 
	$headersH = "From: " . $email_fromH . "\r\n"; $headersH .= "MIME-Version: 1.0\r\n"; $headersH .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $email_messageH .= "Dear <b>".$nameH."</b> <br><br>\n\n\n"; 
	$email_messageH .= "The query raised by you on subject-<b>".$QSH."</b> could not be resolved at level-2 and the same has been escalated to the next level (Level-3) for resolution.</b>.<br>";
	$email_messageH .= "The Level-3 query owner will revert on your query within 3 working days.<br><br>\n\n\n";
	$email_messageH .= "From <br><b>ADMIN ESS</b><br>";
    $ok = @mail($email_toH, $email_subjectH, $email_messageH, $headersH);
   }

   
   if($resRH2['EmailId_Vnr']!='' AND $resMK5['Leve_3']=='Y')  // //Query owner(HOD)
   {
    //$email_toH2 = "ajaykumar.dewangan@vnrseeds.in";
	$email_toH2 = $resRH2['EmailId_Vnr'];
    if($resRH['EmailId_Vnr']==''){$email_fromH2 = $RHName;} else {$email_fromH2=$resRH['EmailId_Vnr'];}
	$email_subjectH2 = "Escalation of query by ".$RHName;  $semi_rand = md5(time()); 
	$headersH2 = "From: " . $email_fromH2 . "\r\n";  $headersH2 .= "MIME-Version: 1.0\r\n";  $headersH2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $email_messageH2 .= "Dear <b>".$RH2Name."</b> <br><br>\n\n\n";
    $email_messageH2 .= "The query raised by <b>".$EHName."</b> on subject-<b>".$QSH."</b> could not be resolved at level-1 & Level-2 and the same has been escalated to you for resolution, go to <b>ESS-QUERY</b> for more details <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.<br>"; 
	$email_messageH2 .= "You need to answer the query in 3 working days after which it will get escalated to Management.<br><br>\n\n\n";
	$email_messageH2 .= "From <br><b>ADMIN ESS</b><br>";
    $ok = @mail($email_toH2, $email_subjectH2, $email_messageH2, $headersH2);
   }
   
$sqlRH2=mysql_query("select RepMgrId,Level_2ID from hrm_employee_queryemp where QueryId=".$resQH['QueryId'], $con); $resRH2=mysql_fetch_assoc($sqlRH2); 
$sqlR2=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$resRH2['RepMgrId'], $con); 
$resR2=mysql_fetch_assoc($sqlR2);  if($resR2['DR']=='Y'){$MR2='Dr.';} elseif($resR2['Gender']=='M'){$MR2='Mr.';} elseif($resR2['Gender']=='F' AND $resR2['Married']=='Y'){$MR2='Mrs.';} elseif($resR2['Gender']=='F' AND $resR2['Married']=='N'){$MR2='Miss.';}  $NameR2=$MR2.' '.$resR2['Fname'].' '.$resR2['Sname'].' '.$resR2['Lname'];

$sql_2=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$resRH2['Level_2ID'], $con); 
$res_2=mysql_fetch_assoc($sql_2);  if($res_2['DR']=='Y'){$M_2='Dr.';} elseif($res_2['Gender']=='M'){$M_2='Mr.';} elseif($res_2['Gender']=='F' AND $res_2['Married']=='Y'){$M_2='Mrs.';} elseif($res_2['Gender']=='F' AND $res_2['Married']=='N'){$M_2='Miss.';}  $Name_2=$M_2.' '.$res_2['Fname'].' '.$res_2['Sname'].' '.$res_2['Lname'];
   
   //Reporting Mgr
   if($resR2['EmailId_Vnr']!='' AND $resMK5['ReportingMgr']=='Y')
   {
    //$email_toR2 = "ajaykumar.dewangan@vnrseeds.in";
	$email_toR2 = $resR2['EmailId_Vnr'];
    if($resE['EmailId_Vnr']==''){$email_fromR2 = $EName;} else {$email_fromR2=$resE['EmailId_Vnr'];}
	$email_subjectR2 = "Escalation of query in level-3.";  $semi_rand = md5(time()); 
	$headersR2 = "From: " . $email_fromR2 . "\r\n";
    $headersR2 .= "MIME-Version: 1.0\r\n";
    $headersR2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $email_messageR2 = "Dear <b>".$NameR2."</b> <br><br>\n\n\n";
    $email_messageR2 .= "The query raised by your team member ".$name." on subject-<b>".$QSH."</b> could not be resolved at level-2 and the same has been further escalated to the next level (Level-3) for resolution.<br><br>\n\n\n";
	$email_messageR2 .= "From <br><b>ADMIN ESS</b><br>";
    $ok = @mail($email_toR2, $email_subjectR2, $email_messageR2, $headersR2);
   }
      
   
   //Level_2 Query owner
   if($res_1['EmailId_Vnr']!='' AND $resMK5['Leve_2']=='Y')
   {
    //$email_to_2 = "ajaykumar.dewangan@vnrseeds.in";
	$email_to_2 = $res_2['EmailId_Vnr'];
    if($resE['EmailId_Vnr']==''){$email_from_2 = $EName;} else {$email_from_2=$resE['EmailId_Vnr'];}
	$email_subject_2 = "Escalation of query in level-3.";  $semi_rand = md5(time()); 
	$headers_2 = "From: " . $email_from_2 . "\r\n";
    $headers_2 .= "MIME-Version: 1.0\r\n";
    $headers_2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $email_message_2 = "Dear <b>".$Name_2."</b> <br><br>\n\n\n";
    $email_message_2 .= "The query raised by ".$name." on subject-<b>".$QSH."</b> could not be resolved at your level and the same has been escalated to your HOD for resolution.<br><br>\n\n\n";
	$email_message_2 .= "From <br><b>ADMIN ESS</b><br>";
    $ok = @mail($email_to_2, $email_subject_2, $email_message_2, $headers_2);
   }  
   
   $sqlUp=mysql_query("update hrm_employee_queryemp set MailTo_Emp=3, MailTo_QueryOwner=3 where QueryId=".$resQH['QueryId'], $con);
} }

/*management*/ $sqlQM = mysql_query("select * from hrm_employee_queryemp where (QStatus=0 OR QStatus=1) AND QCloseStatus='N' AND MailTo_Emp=3 AND MailTo_QueryOwner=3 AND QueryStatus_Emp!=3 AND QueryStatus_Emp!=4 AND '".$CurrDate."'>Mngmt_QToDT order by QueryId DESC", $con); $rowQM=mysql_num_rows($sqlQM);
if($rowQM>0){ while($resQM=mysql_fetch_array($sqlQM)){
$sqlEM=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$resQM['EmployeeID'], $con); 
$resEM=mysql_fetch_assoc($sqlEM);  if($resEM['DR']=='Y'){$MM2='Dr.';} elseif($resEM['Gender']=='M'){$MM2='Mr.';} elseif($resEM['Gender']=='F' AND $resEM['Married']=='Y'){$MM2='Mrs.';} elseif($resEM['Gender']=='F' AND $resEM['Married']=='N'){$MM2='Miss.';}  $EMName=$MM2.' '.$resEM['Fname'].' '.$resEM['Sname'].' '.$resEM['Lname'];
$sqlRM=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$resQM['Level_3ID'], $con); 
$resRM=mysql_fetch_assoc($sqlRM);  if($resRM['DR']=='Y'){$MM3='Dr.';} elseif($resRM['Gender']=='M'){$MM3='Mr.';} elseif($resRM['Gender']=='F' AND $resRM['Married']=='Y'){$MM3='Mrs.';} elseif($resRM['Gender']=='F' AND $resRM['Married']=='N'){$MM3='Miss.';}  $RMName=$MM3.' '.$resRM['Fname'].' '.$resRM['Sname'].' '.$resRM['Lname'];
$sqlRM2=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$resQM['Mngmt_ID'], $con); 
$resRM2=mysql_fetch_assoc($sqlRM2);  if($resRM2['DR']=='Y'){$MM4='Dr.';} elseif($resRM2['Gender']=='M'){$MM4='Mr.';} elseif($resRM2['Gender']=='F' AND $resRM2['Married']=='Y'){$MM4='Mrs.';} elseif($resRM2['Gender']=='F' AND $resRM2['Married']=='N'){$MM4='Miss.';}  $RM2Name=$MM4.' '.$resRM2['Fname'].' '.$resRM2['Sname'].' '.$resRM2['Lname'];
if($resQM['QuerySubject']=='N'){$QSM=$resQM['OtherSubject'];}else{$QSM=$resQM['QuerySubject'];} if($resQM['HideYesNo']=='Y'){$nameM='Name Undisclosed';}else{$nameM=$EMName;}

$sqlMK6=mysql_query("select * from hrm_employee_querymail_key where QueryMailId=6 AND CompanyId=".$CompanyId, $con); $resMK6=mysql_fetch_assoc($sqlMK6);


   if($resEM['EmailId_Vnr']!='' AND $resMK6['Employee']=='Y')   //Self
   {
    //$email_toM = "ajaykumar.dewangan@vnrseeds.in"; 
	$email_to = $resEM['EmailId_Vnr'];
    if($resEM['EmailId_Vnr']==''){$email_fromM = $nameM;} else {$email_fromM=$resEM['EmailId_Vnr'];}
	$email_subjectM = "Query scalated to next level";  $semi_rand = md5(time()); 
	$headersM = "From: " . $email_fromM . "\r\n"; $headersM .= "MIME-Version: 1.0\r\n"; $headersM .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $email_messageM .= "Dear <b>".$nameM."</b> <br><br>\n\n\n"; 
	$email_messageM .= "The query raised by you on subject-<b>".$QSM."</b> could not be resolved at level-3 and the same has been escalated to the Management for resolution.</b>.<br>";
	$email_messageM .= "The Management will revert on your query within 3 working days.<br><br>\n\n\n";
	$email_messageM .= "From <br><b>ADMIN ESS</b><br>";
    $ok = @mail($email_toM, $email_subjectM, $email_messageM, $headersM);
   }

   
   if($resRM2['EmailId_Vnr']!='' AND $resMK6['Leve_4']=='Y')  //Query owner(MANAGEMENT)
   {
    //$email_toM2 = "ajaykumar.dewangan@vnrseeds.in";
	$email_to = $resRM2['EmailId_Vnr'];
    if($resRM['EmailId_Vnr']==''){$email_fromM2 = $RMName;} else {$email_fromM2=$resRM['EmailId_Vnr'];}
	$email_subjectM2 = "Escalation of query by ".$RMName;  $semi_rand = md5(time()); 
	$headersM2 = "From: " . $email_fromM2 . "\r\n";  $headersM2 .= "MIME-Version: 1.0\r\n";  $headersM2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $email_messageM2 .= "Dear <b>".$RM2Name."</b> <br><br>\n\n\n";
    $email_messageM2 .= "The query raised by <b>".$EMName."</b> on subject-<b>".$QSM."</b> could not be resolved at level-1, level2 & Level-3 and the same has been escalated to you for resolution, go to <b>ESS-QUERY</b> for more details <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.<br>"; 
	$email_messageM2 .= "You need to answer the query in 3 working days and close it.<br><br>\n\n\n";
	$email_messageM2 .= "From <br><b>ADMIN ESS</b><br>";
    $ok = @mail($email_toM2, $email_subjectM2, $email_messageM2, $headersM2);
   } 

   
$sqlRM=mysql_query("select RepMgrId,Level_3ID from hrm_employee_queryemp where QueryId=".$resQM['QueryId'], $con); $resRM=mysql_fetch_assoc($sqlRM); 
$sqlR3=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$resRM['RepMgrId'], $con); 
$resR3=mysql_fetch_assoc($sqlR3);  if($resR3['DR']=='Y'){$MR3='Dr.';} elseif($resR3['Gender']=='M'){$MR3='Mr.';} elseif($resR3['Gender']=='F' AND $resR3['Married']=='Y'){$MR3='Mrs.';} elseif($resR3['Gender']=='F' AND $resR3['Married']=='N'){$MR3='Miss.';}  $NameR3=$MR3.' '.$resR3['Fname'].' '.$resR3['Sname'].' '.$resR3['Lname'];

$sql_3=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$resRM['Level_3ID'], $con); 
$res_3=mysql_fetch_assoc($sql_3);  if($res_3['DR']=='Y'){$M_3='Dr.';} elseif($res_3['Gender']=='M'){$M_3='Mr.';} elseif($res_3['Gender']=='F' AND $res_3['Married']=='Y'){$M_3='Mrs.';} elseif($res_3['Gender']=='F' AND $res_3['Married']=='N'){$M_3='Miss.';}  $Name_3=$M_3.' '.$res_3['Fname'].' '.$res_3['Sname'].' '.$res_3['Lname'];
   
   //Reporting Mgr
   if($resR3['EmailId_Vnr']!='' AND $resMK6['ReportingMgr']=='Y')
   {
    //$email_toR3 = "ajaykumar.dewangan@vnrseeds.in";
	$email_toR3 = $resR3['EmailId_Vnr'];
    if($resE['EmailId_Vnr']==''){$email_fromR3 = $EName;} else {$email_fromR3=$resE['EmailId_Vnr'];}
	$email_subjectR3 = "Escalation of query in level-4.";  $semi_rand = md5(time()); 
	$headersR3 = "From: " . $email_fromR3 . "\r\n";
    $headersR3 .= "MIME-Version: 1.0\r\n";
    $headersR3 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $email_messageR3 = "Dear <b>".$NameR3."</b> <br><br>\n\n\n";
    $email_messageR3 .= "The query raised by your team member ".$name." on subject-<b>".$QSM."</b> could not be resolved at level-3 and the same has been further escalated to management (Level-4) for resolution.<br><br>\n\n\n";
	$email_messageR3 .= "From <br><b>ADMIN ESS</b><br>";
    $ok = @mail($email_toR3, $email_subjectR3, $email_messageR3, $headersR3);
   }       
      
   
   //Level_3 Query owner
   if($res_1['EmailId_Vnr']!='' AND $resMK4['Leve_3']=='Y')
   {
    //$email_to_3 = "ajaykumar.dewangan@vnrseeds.in";
	$email_to_3 = $res_3['EmailId_Vnr'];
    if($resE['EmailId_Vnr']==''){$email_from_3 = $EName;} else {$email_from_3=$resE['EmailId_Vnr'];}
	$email_subject_3 = "Escalation of query in level-3.";  $semi_rand = md5(time()); 
	$headers_3 = "From: " . $email_from_3 . "\r\n";
    $headers_3 .= "MIME-Version: 1.0\r\n";
    $headers_3 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $email_message_3 = "Dear <b>".$Name_3."</b> <br><br>\n\n\n";
    $email_message_3 .= "The query raised by ".$name." on subject-<b>".$QSM."</b> could not be resolved at your level and the same has been escalated to your management for resolution.<br><br>\n\n\n";
	$email_message_3 .= "From <br><b>ADMIN ESS</b><br>";
    $ok = @mail($email_to_3, $email_subject_3, $email_message_3, $headers_3);
   }     
   
   $sqlUp=mysql_query("update hrm_employee_queryemp set MailTo_Emp=4, MailTo_QueryOwner=4 where QueryId=".$resQM['QueryId'], $con);
} }

} 



if($_REQUEST['Action']=='MoveTabAtt') 
{

 $ExpMDatee=date('Y-m-d', strtotime($_REQUEST['dt'])); $Yearr=date('Y', strtotime($ExpMDatee)); 
 $sql=mysql_query("select * from hrm_employee_attendance where AttDate='".$ExpMDatee."'",$con);
 

 while($res=mysql_fetch_assoc($sql))
 { 
  $sqlchk=mysql_query("select * from hrm_employee_attendance_".$Yearr." where EmployeeID=".$res['EmployeeID']." AND AttDate='".$ExpMDatee."'",$con); $rowchk=mysql_num_rows($sqlchk);
  if($rowchk>0)
  {
   $ins=mysql_query("update hrm_employee_attendance_".$Yearr." set AttDate='".$res['AttDate']."', CheckSunday='".$res['CheckSunday']."', Year='".$res['Year']."', YearId='".$res['YearId']."', II='".$res['II']."', OO='".$res['OO']."', Inn='".$res['Inn']."', InnCnt='".$res['InnCnt']."', InnLate='".$res['InnLate']."', Outt='".$res['Outt']."', OuttCnt='".$res['OuttCnt']."', OuttLate='".$res['OuttLate']."', Late='".$res['Late']."', Relax='".$res['Relax']."', Allow='".$res['Allow']."', Af15='".$res['Af15']."' where EmployeeID=".$res['EmployeeID']." AND AttDate='".$ExpMDatee."'",$con);
  }
  else
  {
   $ins=mysql_query("insert into hrm_employee_attendance_".$Yearr."(EmployeeID, AttValue, AttDate, CheckSunday, Year, YearId, II, OO, Inn, InnCnt, InnLate, Outt, OuttCnt, OuttLate, Late, Relax, Allow, Af15) values(".$res['EmployeeID'].", '".$res['AttValue']."', '".$res['AttDate']."', '".$res['CheckSunday']."', '".$res['Year']."', '".$res['YearId']."', '".$res['II']."', '".$res['OO']."', '".$res['Inn']."', '".$res['InnCnt']."', '".$res['InnLate']."', '".$res['Outt']."', '".$res['OuttCnt']."', '".$res['OuttLate']."', '".$res['Late']."', '".$res['Relax']."', '".$res['Allow']."', '".$res['Af15']."')",$con); 
  }
 }

}


if($_REQUEST['Action']=='AllowAppraisal') {
//$sqlDate=mysql_query("select EmpFromDate from hrm_pms_appdate"); $resDate=mysql_fetch_assoc($sqlDate);
//$ed=date("Y-m-1",strtotime($resDate['EmpFromDate']));$day = 60 * 60 * 24;
//Before3Month = date("Y-m-d",strtotime('-90 day'));
//$sql=mysql_query("select hrm_employee.EmployeeID,EmpCode from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.EmpType='E' AND hrm_employee_general.DateJoining<='".$Before3Month."' AND CompanyId=".$CompanyId); 
}

/*
if($_REQUEST['Action']=='EditEmpId') {
$sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.EmpType='E' AND CompanyId=".$CompanyId, $con);
while($res=mysql_fetch_assoc($sql)){
$sql2=mysql_query("select EmpPmsId from hrm_employee_pms where YearId=".$YearId." AND EmployeeID=".$res['EmployeeID'], $con); $row=mysql_num_rows($sql2);
if($row==0){ $sqlIns=mysql_query("insert into hrm_employee_pms(AssessmentYear,CompanyId,EmployeeID,HR_Curr_DepartmentId,YearId) values(".$YearId.", ".$CompanyId.", ".$res['EmployeeID'].", ".$res['DepartmentId'].", ".$YearId.")", $con); } }
//$sdate=substr($cdate,6,4)	
}
*/


if($_REQUEST['Action']=='EmpPass') 
{
$sql=mysql_query("select * from hrm_employee where EmpCode=".$_REQUEST['dtCode']." AND (EmpStatus='A' OR EmpStatus='D') AND CompanyId=".$CompanyId, $con); 
$res=mysql_fetch_assoc($sql); echo $res['EmpCode'].'-'.$res['Fname'].' '.decrypt($res['EmpPass']); 
}


if($_REQUEST['Action']=='UserPass') {
//$sql=mysql_query("select * from hrm_user where User_status='A' and CompanyId=".$CompanyId, $con); while($res=mysql_fetch_assoc($sql))
//{ echo $res['User_name'].' '.decrypt($res['User_pass']).'<br>'; }
}

if($_REQUEST['Action']=='InsrtHoliday'){
//Insert Holidays in Employee Attendance ************************************//  
/*
$sqlE_1=mysql_query("select hrm_employee.EmployeeID from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.CostCenter!=1 AND hrm_employee_general.CostCenter!=30 AND hrm_employee_general.CostCenter!=14 AND hrm_employee_general.CostCenter!=13 AND hrm_employee_general.CostCenter!=26 AND CostCenter!=0", $con); $rowE_1=mysql_num_rows($sqlE_1);  
if($rowE_1>0) 
{while($resE_1=mysql_fetch_array($sqlE_1))
 {
  $sqlS_1=mysql_query("select HolidayDate from hrm_holiday where State_1=1 AND Year='".date("Y")."' AND status='A' order by HolidayId ASC", $con); 
  while($resS_1=mysql_fetch_array($sqlS_1))
  {
   $sql_1=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$resE_1['EmployeeID']." AND AttDate='".$resS_1['HolidayDate']."'", $con); $row_1=mysql_num_rows($sql_1);
   if($row_1==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$resE_1['EmployeeID'].",'HO','".$resS_1['HolidayDate']."','".date("Y")."',".$YearId.")");}
   elseif($row_1>0) { $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='HO' where EmployeeID=".$resE_1['EmployeeID']." AND AttDate='".$resS_1['HolidayDate']."' AND YearId=".$YearId);} 
  }
 }
}

$sqlE_2=mysql_query("select hrm_employee.EmployeeID from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND (hrm_employee_general.CostCenter=1 OR hrm_employee_general.CostCenter=30 OR hrm_employee_general.CostCenter=14 OR hrm_employee_general.CostCenter=13 OR hrm_employee_general.CostCenter=26) AND CostCenter!=0", $con); $rowE_2=mysql_num_rows($sqlE_2);  
if($rowE_2>0) 
{while($resE_2=mysql_fetch_array($sqlE_2))
 {
  $sqlS_2=mysql_query("select HolidayDate from hrm_holiday where State_2=1 AND Year='".date("Y")."' AND status='A' order by HolidayId ASC", $con); 
  while($resS_2=mysql_fetch_array($sqlS_2))
  {
   $sql_2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$resE_2['EmployeeID']." AND AttDate='".$resS_2['HolidayDate']."'", $con); $row_2=mysql_num_rows($sql_2);
   if($row_2==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$resE_2['EmployeeID'].",'HO','".$resS_2['HolidayDate']."','".date("Y")."',".$YearId.")");}
   elseif($row_2>0) { $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='HO' where EmployeeID=".$resE_2['EmployeeID']." AND AttDate='".$resS_2['HolidayDate']."' AND YearId=".$YearId);} 
  }
 }
}

*/

/*

// Hyderabad Plant EmpCode 148/200/581/612/644 /1028/1070/1080/1081//1126
$sqlEmp1=mysql_query("select EmployeeID from hrm_employee where EmpCode=148", $con); $rowEmp1=mysql_num_rows($sqlEmp1); 
if($rowEmp1>0) 
{ $resEmp1=mysql_fetch_assoc($sqlEmp1);
  $SqlDel1=mysql_query("delete from hrm_employee_attendance where EmployeeID=".$resEmp1['EmployeeID']." AND AttValue='HO'", $con) or die(mysql_error());
  $sqlS_3=mysql_query("select HolidayDate from hrm_holiday where State_3=1 AND Year='".date("Y")."' AND status='A' order by HolidayId ASC", $con); 
  while($resS_3=mysql_fetch_array($sqlS_3))
  { 
   $sql_3=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$resEmp1['EmployeeID']." AND AttDate='".$resS_3['HolidayDate']."'", $con); $row_3=mysql_num_rows($sql_3);
   if($row_3==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$resEmp1['EmployeeID'].",'HO','".$resS_3['HolidayDate']."','".date("Y")."',".$YearId.")");}
   elseif($row_3>0) { $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='HO' where EmployeeID=".$resEmp1['EmployeeID']." AND AttDate='".$resS_3['HolidayDate']."' AND YearId=".$YearId);} 
  }
}

$sqlEmp2=mysql_query("select EmployeeID from hrm_employee where EmpCode=200", $con); $rowEmp2=mysql_num_rows($sqlEmp2); 
if($rowEmp2>0) 
{ $resEmp2=mysql_fetch_assoc($sqlEmp2);
  $SqlDel2=mysql_query("delete from hrm_employee_attendance where EmployeeID=".$resEmp2['EmployeeID']." AND AttValue='HO'", $con) or die(mysql_error());
  $sqlS_3=mysql_query("select HolidayDate from hrm_holiday where State_3=1 AND Year='".date("Y")."' AND status='A' order by HolidayId ASC", $con); 
  while($resS_3=mysql_fetch_array($sqlS_3))
  {
   $sql_3=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$resEmp2['EmployeeID']." AND AttDate='".$resS_3['HolidayDate']."'", $con); $row_3=mysql_num_rows($sql_3);
   if($row_3==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$resEmp2['EmployeeID'].",'HO','".$resS_3['HolidayDate']."','".date("Y")."',".$YearId.")");}
   elseif($row_3>0) { $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='HO' where EmployeeID=".$resEmp2['EmployeeID']." AND AttDate='".$resS_3['HolidayDate']."' AND YearId=".$YearId);} 
  }
}


$sqlEmp7=mysql_query("select EmployeeID from hrm_employee where EmpCode=581", $con); $rowEmp7=mysql_num_rows($sqlEmp7); 
if($rowEmp7>0) 
{ $resEmp7=mysql_fetch_assoc($sqlEmp7);
  $SqlDel7=mysql_query("delete from hrm_employee_attendance where EmployeeID=".$resEmp7['EmployeeID']." AND AttValue='HO'", $con) or die(mysql_error());
  $sqlS_3=mysql_query("select HolidayDate from hrm_holiday where State_3=1 AND Year='".date("Y")."' AND status='A' order by HolidayId ASC", $con); 
  while($resS_3=mysql_fetch_array($sqlS_3))
  {
   $sql_3=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$resEmp7['EmployeeID']." AND AttDate='".$resS_3['HolidayDate']."'", $con); $row_3=mysql_num_rows($sql_3);
   if($row_3==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$resEmp7['EmployeeID'].",'HO','".$resS_3['HolidayDate']."','".date("Y")."',".$YearId.")");}
   elseif($row_3>0) { $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='HO' where EmployeeID=".$resEmp7['EmployeeID']." AND AttDate='".$resS_3['HolidayDate']."' AND YearId=".$YearId);} 
  }
} 

$sqlEmp8=mysql_query("select EmployeeID from hrm_employee where EmpCode=612", $con); $rowEmp8=mysql_num_rows($sqlEmp8); 
if($rowEmp8>0) 
{ $resEmp8=mysql_fetch_assoc($sqlEmp8);
  $SqlDel8=mysql_query("delete from hrm_employee_attendance where EmployeeID=".$resEmp8['EmployeeID']." AND AttValue='HO'", $con) or die(mysql_error());
  $sqlS_3=mysql_query("select HolidayDate from hrm_holiday where State_3=1 AND Year='".date("Y")."' AND status='A' order by HolidayId ASC", $con); 
  while($resS_3=mysql_fetch_array($sqlS_3))
  {
   $sql_3=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$resEmp8['EmployeeID']." AND AttDate='".$resS_3['HolidayDate']."'", $con); $row_3=mysql_num_rows($sql_3);
   if($row_3==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$resEmp8['EmployeeID'].",'HO','".$resS_3['HolidayDate']."','".date("Y")."',".$YearId.")");}
   elseif($row_3>0) { $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='HO' where EmployeeID=".$resEmp8['EmployeeID']." AND AttDate='".$resS_3['HolidayDate']."' AND YearId=".$YearId);} 
  }
} 

$sqlEmp9=mysql_query("select EmployeeID from hrm_employee where EmpCode=644", $con); $rowEmp9=mysql_num_rows($sqlEmp9); 
if($rowEmp9>0) 
{ $resEmp9=mysql_fetch_assoc($sqlEmp9);
  $SqlDel9=mysql_query("delete from hrm_employee_attendance where EmployeeID=".$resEmp9['EmployeeID']." AND AttValue='HO'", $con) or die(mysql_error());
  $sqlS_3=mysql_query("select HolidayDate from hrm_holiday where State_3=1 AND Year='".date("Y")."' AND status='A' order by HolidayId ASC", $con); 
  while($resS_3=mysql_fetch_array($sqlS_3))
  {
   $sql_3=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$resEmp9['EmployeeID']." AND AttDate='".$resS_3['HolidayDate']."'", $con); $row_3=mysql_num_rows($sql_3);
   if($row_3==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$resEmp9['EmployeeID'].",'HO','".$resS_3['HolidayDate']."','".date("Y")."',".$YearId.")");}
   elseif($row_3>0) { $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='HO' where EmployeeID=".$resEmp9['EmployeeID']." AND AttDate='".$resS_3['HolidayDate']."' AND YearId=".$YearId);} 
  }
}  


$sqlEmp10=mysql_query("select EmployeeID from hrm_employee where EmpCode=1028 AND EmpStatus='A'", $con); $rowEmp10=mysql_num_rows($sqlEmp10); 
if($rowEmp10>0) 
{ $resEmp10=mysql_fetch_assoc($sqlEmp10);
  $SqlDel10=mysql_query("delete from hrm_employee_attendance where EmployeeID=".$resEmp10['EmployeeID']." AND AttValue='HO'", $con) or die(mysql_error());
  $sqlS_3=mysql_query("select HolidayDate from hrm_holiday where State_3=1 AND Year='".date("Y")."' AND status='A' order by HolidayId ASC", $con); 
  while($resS_3=mysql_fetch_array($sqlS_3))
  {
   $sql_3=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$resEmp10['EmployeeID']." AND AttDate='".$resS_3['HolidayDate']."'", $con); $row_3=mysql_num_rows($sql_3);
   if($row_3==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$resEmp10['EmployeeID'].",'HO','".$resS_3['HolidayDate']."','".date("Y")."',".$YearId.")");}
   elseif($row_3>0) { $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='HO' where EmployeeID=".$resEmp10['EmployeeID']." AND AttDate='".$resS_3['HolidayDate']."' AND YearId=".$YearId);} 
  }
}  


$sqlEmp11=mysql_query("select EmployeeID from hrm_employee where EmpCode=1070 AND EmpStatus='A'", $con); $rowEmp11=mysql_num_rows($sqlEmp11); 
if($rowEmp11>0) 
{ $resEmp11=mysql_fetch_assoc($sqlEmp11);
  $SqlDel11=mysql_query("delete from hrm_employee_attendance where EmployeeID=".$resEmp11['EmployeeID']." AND AttValue='HO'", $con) or die(mysql_error());
  $sqlS_3=mysql_query("select HolidayDate from hrm_holiday where State_3=1 AND Year='".date("Y")."' AND status='A' order by HolidayId ASC", $con); 
  while($resS_3=mysql_fetch_array($sqlS_3))
  {
   $sql_3=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$resEmp11['EmployeeID']." AND AttDate='".$resS_3['HolidayDate']."'", $con); $row_3=mysql_num_rows($sql_3);
   if($row_3==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$resEmp11['EmployeeID'].",'HO','".$resS_3['HolidayDate']."','".date("Y")."',".$YearId.")");}
   elseif($row_3>0) { $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='HO' where EmployeeID=".$resEmp11['EmployeeID']." AND AttDate='".$resS_3['HolidayDate']."' AND YearId=".$YearId);} 
  }
}  


$sqlEmp12=mysql_query("select EmployeeID from hrm_employee where EmpCode=1080 AND EmpStatus='A'", $con); $rowEmp12=mysql_num_rows($sqlEmp12); 
if($rowEmp12>0) 
{ $resEmp12=mysql_fetch_assoc($sqlEmp12);
  $SqlDel12=mysql_query("delete from hrm_employee_attendance where EmployeeID=".$resEmp12['EmployeeID']." AND AttValue='HO'", $con) or die(mysql_error());
  $sqlS_3=mysql_query("select HolidayDate from hrm_holiday where State_3=1 AND Year='".date("Y")."' AND status='A' order by HolidayId ASC", $con); 
  while($resS_3=mysql_fetch_array($sqlS_3))
  {
   $sql_3=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$resEmp12['EmployeeID']." AND AttDate='".$resS_3['HolidayDate']."'", $con); $row_3=mysql_num_rows($sql_3);
   if($row_3==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$resEmp12['EmployeeID'].",'HO','".$resS_3['HolidayDate']."','".date("Y")."',".$YearId.")");}
   elseif($row_3>0) { $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='HO' where EmployeeID=".$resEmp12['EmployeeID']." AND AttDate='".$resS_3['HolidayDate']."' AND YearId=".$YearId);} 
  }
}  


$sqlEmp13=mysql_query("select EmployeeID from hrm_employee where EmpCode=1081 AND EmpStatus='A'", $con); $rowEmp13=mysql_num_rows($sqlEmp13); 
if($rowEmp13>0) 
{ $resEmp13=mysql_fetch_assoc($sqlEmp13);
  $SqlDel13=mysql_query("delete from hrm_employee_attendance where EmployeeID=".$resEmp13['EmployeeID']." AND AttValue='HO'", $con) or die(mysql_error());
  $sqlS_3=mysql_query("select HolidayDate from hrm_holiday where State_3=1 AND Year='".date("Y")."' AND status='A' order by HolidayId ASC", $con); 
  while($resS_3=mysql_fetch_array($sqlS_3))
  {
   $sql_3=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$resEmp13['EmployeeID']." AND AttDate='".$resS_3['HolidayDate']."'", $con); $row_3=mysql_num_rows($sql_3);
   if($row_3==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$resEmp13['EmployeeID'].",'HO','".$resS_3['HolidayDate']."','".date("Y")."',".$YearId.")");}
   elseif($row_3>0) { $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='HO' where EmployeeID=".$resEmp13['EmployeeID']." AND AttDate='".$resS_3['HolidayDate']."' AND YearId=".$YearId);} 
  }
}

$sqlEmp13=mysql_query("select EmployeeID from hrm_employee where EmpCode=1126 AND EmpStatus='A'", $con); $rowEmp13=mysql_num_rows($sqlEmp13); 
if($rowEmp13>0) 
{ $resEmp13=mysql_fetch_assoc($sqlEmp13);
  $SqlDel13=mysql_query("delete from hrm_employee_attendance where EmployeeID=".$resEmp13['EmployeeID']." AND AttValue='HO'", $con) or die(mysql_error());
  $sqlS_3=mysql_query("select HolidayDate from hrm_holiday where State_3=1 AND Year='".date("Y")."' AND status='A' order by HolidayId ASC", $con); 
  while($resS_3=mysql_fetch_array($sqlS_3))
  {
   $sql_3=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$resEmp13['EmployeeID']." AND AttDate='".$resS_3['HolidayDate']."'", $con); $row_3=mysql_num_rows($sql_3);
   if($row_3==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$resEmp13['EmployeeID'].",'HO','".$resS_3['HolidayDate']."','".date("Y")."',".$YearId.")");}
   elseif($row_3>0) { $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='HO' where EmployeeID=".$resEmp13['EmployeeID']." AND AttDate='".$resS_3['HolidayDate']."' AND YearId=".$YearId);} 
  }
}

*/

}

if($_REQUEST['SentAnnBirthday']) {

/************************ Other Action 1 ******************************
/************************ Other Action 1 ******************************
$sqlCheck=mysql_query("select * from hrm_company_annbirth where AnnBirthDate='".date("Y-m-d")."' AND YesNo='Y'",$con); $rowCheck=mysql_num_rows($sqlCheck);
if($rowCheck==0)
{
 /* Part-1 open Anniversary 
$fileatt = "AnnBirth/A_2.jpg"; $fileatt_type = "image/jpg"; $fileatt_name = "AnnImages"; $email_from = "vspl.hr@vnrseeds.com"; 
$email_subject = "Marriage Anniversary"; $email_txt = "Hello"; $headers = "From: " . $email_from . "\r\n";
$headers .= "MIME-Version: 1.0\r\n"; $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$file = fopen($fileatt,'rb'); $data = fread($file,filesize($fileatt)); $semi_rand = md5(time()); 

$sqlAnn=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname,Gender,DR,Married,MarriageDate,MarriageDate_dm,HusWifeName,DepartmentId from hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_family ON hrm_employee.EmployeeID=hrm_employee_family.EmployeeID where Married='Y' AND hrm_employee_personal.MarriageDate!='1970-01-01' AND hrm_employee_personal.MarriageDate_dm='".date("0000-m-d")."' AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId, $con); $rowAnn=mysql_num_rows($sqlAnn); 
 if($rowAnn>0)
 {
   while($resAnn=mysql_fetch_array($sqlAnn))
   {  
    $sqlDN=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resAnn['DepartmentId'], $con); $resDN=mysql_fetch_assoc($sqlDN);
    if($resAnn['DR']=='Y'){$MS='DR. '.$resAnn['Fname'].' '.$resAnn['Sname'].' '.$resAnn['Lname']. ' ('.$resDN['DepartmentCode'].')';}
	elseif($resAnn['DR']=='N' AND $resAnn['Gender']=='M'){$MS='Mr. '.$resAnn['Fname'].' '.$resAnn['Sname'].' '.$resAnn['Lname']. ' ('.$resDN['DepartmentCode'].')';}
	elseif($resAnn['DR']=='N' AND $resAnn['Gender']=='F'){$MS='Mrs. '.$resAnn['Fname'].' '.$resAnn['Sname'].' '.$resAnn['Lname']. ' ('.$resDN['DepartmentCode'].')';}
	$email_message .= "Marriage Anniversary - ".$MS." <br>From : VSPL HR.\n\n\n";
    $email_message .="<html><head></head><body><table border='2'><tr><td>";
    $email_message .="<img src='https://www.vnrseeds.co.in/hrims/AdminUser/AnnBirth/A_2.jpg' alt=''/>\n\n";
    $email_message .="</td></tr></table></body></html>";
	$sqlDept=mysql_query("select DepartmentId from hrm_department where CompanyId=".$CompanyId." AND DeptStatus='A'", $con); 
	while($resDept=mysql_fetch_array($sqlDept))
	{
	 $sqlEmail=mysql_query("select EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId=".$resDept['DepartmentId'], $con);
     while($resEmail=mysql_fetch_assoc($sqlEmail))
     {
	  if($resEmail['EmailId_Vnr']!='' AND $resEmail['EmailId_Vnr']!='NA') 
      { $email_to = $resEmail['EmailId_Vnr'];
        //$ok = mail($email_to, $email_subject, $email_message, $headers); 		  
      }  
	 }
    }
	 
  }  
 }
/* Part-1 close Anniversary */
/* Part-2 open Birthday  
$fileatt = "AnnBirth/B_2.jpg"; $fileatt_type = "image/jpg"; $fileatt_name = "AnnImages"; $email_from = "vspl.hr@vnrseeds.com"; 
$email_subject = "Birthday Wishes"; $email_txt = "Hello"; $headers = "From: " . $email_from . "\r\n";
$headers .= "MIME-Version: 1.0\r\n"; $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$file = fopen($fileatt,'rb'); $data = fread($file,filesize($fileatt)); $semi_rand = md5(time()); 

$sqlBir=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname,Gender,DR,DOB,DOB_dm,DepartmentId from hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_family ON hrm_employee.EmployeeID=hrm_employee_family.EmployeeID where Married='Y' AND hrm_employee_general.DOB!='1970-01-01' AND hrm_employee_general.DOB_dm='".date("0000-m-d")."' AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId, $con); $rowBir=mysql_num_rows($sqlBir); 
 if($rowBir>0)
 {
   while($resBir=mysql_fetch_array($sqlBir))
   {  
    $sqlDN2=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resBir['DepartmentId'], $con); $resDN2=mysql_fetch_assoc($sqlDN2);
    if($resBir['DR']=='Y'){$MS='DR. '.$resBir['Fname'].' '.$resBir['Sname'].' '.$resBir['Lname']. ' ('.$resDN2['DepartmentCode'].')';}
	elseif($resBir['DR']=='N' AND $resBir['Gender']=='M'){$MS='Mr. '.$resBir['Fname'].' '.$resBir['Sname'].' '.$resBir['Lname']. ' ('.$resDN2['DepartmentCode'].')';}
	elseif($resBir['DR']=='N' AND $resBir['Gender']=='F'){$MS='Mrs. '.$resBir['Fname'].' '.$resBir['Sname'].' '.$resBir['Lname']. ' ('.$resDN2['DepartmentCode'].')';}
	$email_message .= "Birthday Wishes - ".$MS." <br>From : VSPL HR.\n\n\n";
    $email_message .="<html><head></head><body><table border='2'><tr><td>";
    $email_message .="<img src='https://www.vnrseeds.co.in/hrims/AdminUser/AnnBirth/B_2.jpg' alt=''/>\n\n";
    $email_message .="</td></tr></table></body></html>";
	$sqlDept2=mysql_query("select DepartmentId from hrm_department where CompanyId=".$CompanyId." AND DeptStatus='A'", $con); 
	while($resDept2=mysql_fetch_array($sqlDept2))
	{
	 $sqlEmail2=mysql_query("select EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId=".$resDept2['DepartmentId'], $con);
     while($resEmail2=mysql_fetch_assoc($sqlEmail2))
     {
	  if($resEmail2['EmailId_Vnr']!='' AND $resEmail2['EmailId_Vnr']!='NA') 
      { $email_to = $resEmail2['EmailId_Vnr'];
        //$ok = mail($email_to, $email_subject, $email_message, $headers); 		  
      }  
	 }
    }
	 
  }  
 }
}
*/

/************************ Thought For the Day ******************************
$sqlThCh=mysql_query("select * from hrm_com_send_thought where SendThougtDate='".date("Y-m-d")."' AND YesNo='Y' AND CompanyId=".$CompanyId, $con); $rowThCh=mysql_num_rows($sqlThCh);
if($rowThCh==0)
{ if(date("d")=='01'){$day=1;}elseif(date("d")=='02'){$day=2;}elseif(date("d")=='03'){$day=3;}elseif(date("d")=='04'){$day=4;}elseif(date("d")=='05'){$day=5;}
  elseif(date("d")=='06'){$day=6;}elseif(date("d")=='07'){$day=7;}elseif(date("d")=='08'){$day=8;}elseif(date("d")=='09'){$day=9;}else{$day=date("d");}
$fileatt = "ThoughtImg/".$day.".jpeg";  $fileatt_type = "image/jpeg"; $fileatt_name = "ThoughtImages";  
$email_from = "vspl.hr@vnrseeds.com"; $email_Tsubject = "Thought For The Day"; $email_txt = "Hello"; $headers = "From: " . $email_from . "\r\n";
$headers .= "MIME-Version: 1.0\r\n"; $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$file = fopen($fileatt,'rb'); $data = fread($file,filesize($fileatt)); $semi_rand = md5(time()); 
$email_Tmessage .= "Todays Thought For The Day <br>From : VSPL HR.\n\n\n";
$email_Tmessage .="<html><head></head><body><table border='2'><tr><td>";
$email_Tmessage .="<img src='https://www.vnrseeds.co.in/hrims/AdminUser/ThoughtImg/".$day.".jpeg' alt=''/>\n\n";
$email_Tmessage .="</td></tr></table></body></html>";	           
//$email_to = 'vspl.employees@vnrseeds.com';
//$email_to = "ajaykumar.dewangan@vnrseeds.in";
//$okT = mail($email_to, $email_Tsubject, $email_Tmessage, $headers); 			  
if($okT) { $InsTh=mysql_query("insert into hrm_com_send_thought(SendThougtDate,YesNo,CompanyId) values('".date("Y-m-d")."','Y',".$CompanyId.")", $con);}
}


/************************ Other Action 2 ******************************
/************************ Other Action 2 ******************************
/************************ Anniversary ******************************
$sqlAnn=mysql_query("select * from hrm_com_send_anniversary where AnnDate='".date("Y-m-d")."' AND YesNo='Y' AND CompanyId=".$CompanyId, $con); $rowAnn=mysql_num_rows($sqlAnn);
if($rowAnn==0)
{
if(date("d")==01 OR date("d")==02 OR date("d")==03 OR date("d")==04){$AImg='A_1';} elseif(date("d")==05 OR date("d")==06 OR date("d")==07 OR date("d")==08){$AImg='A_2';}
elseif(date("d")==9 OR date("d")==10 OR date("d")==11 OR date("d")==12){$AImg='A_3';} elseif(date("d")==13 OR date("d")==14 OR date("d")==15 OR date("d")==16){$AImg='A_4';}
elseif(date("d")==17 OR date("d")==18 OR date("d")==19 OR date("d")==20){$AImg='A_5';} elseif(date("d")==21 OR date("d")==22 OR date("d")==23 OR date("d")==24){$AImg='A_6';}
elseif(date("d")==25 OR date("d")==26 OR date("d")==27){$AImg='A_7';} elseif(date("d")==28 OR date("d")==29 OR date("d")==30 OR date("d")==31){$AImg='A_8';} 
$fileatt = "AnnBirth/".$AImg.".jpg"; $fileatt_type = "image/jpg"; $fileatt_name = "AnnImages"; $email_from = "vspl.hr@vnrseeds.com"; 
$email_Asubject = "Marriage Anniversary Wishes"; $email_txt = "Hello"; $headers = "From: " . $email_from . "\r\n"; 
$headers .= "MIME-Version: 1.0\r\n"; $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$file = fopen($fileatt,'rb'); $data = fread($file,filesize($fileatt)); $semi_rand = md5(time()); 
//$email_to = 'vspl.employees@vnrseeds.com';
//$email_to = 'ajaykumar.dewangan@vnrseeds.in';
$sql2Ann=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname,Gender,DR,Married,MarriageDate,MarriageDate_dm,HusWifeName,DepartmentId from hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_family ON hrm_employee.EmployeeID=hrm_employee_family.EmployeeID where Married='Y' AND hrm_employee_personal.MarriageDate!='1970-01-01' AND hrm_employee_personal.MarriageDate_dm='".date("0000-m-d")."' AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." group by EmployeeID", $con); 
$row2Ann=mysql_num_rows($sql2Ann); 
 if($row2Ann>0)
 {
   while($resAnn=mysql_fetch_array($sql2Ann))
   {  
    $sqlDN=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resAnn['DepartmentId'], $con); $resDN=mysql_fetch_assoc($sqlDN);
    if($resAnn['DR']=='Y'){$MS='DR. '.$resAnn['Fname'].' '.$resAnn['Sname'].' '.$resAnn['Lname']. ' (<b style="color:#B30000;">'.$resDN['DepartmentCode'].'</b>)';}
	elseif($resAnn['DR']=='N' AND $resAnn['Gender']=='M'){$MS='Mr. '.$resAnn['Fname'].' '.$resAnn['Sname'].' '.$resAnn['Lname']. ' ('.$resDN['DepartmentCode'].')';}
	elseif($resAnn['DR']=='N' AND $resAnn['Gender']=='F'){$MS='Mrs. '.$resAnn['Fname'].' '.$resAnn['Sname'].' '.$resAnn['Lname']. ' ('.$resDN['DepartmentCode'].')';}
	$email_Amessage .= "<b style='font-size:15px;'>".$MS.", &nbsp;&nbsp;</b>\n\n\n";	   
   } 
    $email_Amessage .="<html><head></head><body><table border='0'><tr><td style='font-size:15px;'>";
    $email_Amessage .="<img src='https://www.vnrseeds.co.in/hrims/AdminUser/AnnBirth/".$AImg.".jpg' alt=''/>\n\n";
    $email_Amessage .="<br><b>From : VSPL HR.</b></td></tr></table></body></html>";
    //$okA = mail($email_to, $email_Asubject, $email_Amessage, $headers);  
 }
 if($okA) { $InsAnn=mysql_query("insert into hrm_com_send_anniversary(AnnDate,YesNo,CompanyId) values('".date("Y-m-d")."','Y',".$CompanyId.")", $con); }
}

/************************ Birthday ******************************
$sqlBirth=mysql_query("select * from hrm_com_send_birthday where BirthDate='".date("Y-m-d")."' AND YesNo='Y' AND CompanyId=".$CompanyId, $con); $rowBirth=mysql_num_rows($sqlBirth);
if($rowBirth==0)
{
if(date("d")==01 OR date("d")==02 OR date("d")==03 OR date("d")==04){$BImg='B_1';} elseif(date("d")==05 OR date("d")==06 OR date("d")==07 OR date("d")==08){$BImg='B_2';}
elseif(date("d")==9 OR date("d")==10 OR date("d")==11 OR date("d")==12){$BImg='B_3';} elseif(date("d")==13 OR date("d")==14 OR date("d")==15 OR date("d")==16){$BImg='B_4';}
elseif(date("d")==17 OR date("d")==18 OR date("d")==19 OR date("d")==20){$BImg='B_5';} elseif(date("d")==21 OR date("d")==22 OR date("d")==23 OR date("d")==24){$BImg='B_6';}
elseif(date("d")==25 OR date("d")==26 OR date("d")==27){$BImg='B_7';} elseif(date("d")==28 OR date("d")==29 OR date("d")==30 OR date("d")==31){$BImg='B_8';}
$fileatt = "AnnBirth/".$BImg.".jpg"; $fileatt_type = "image/jpg"; $fileatt_name = "AnnImages"; $email_from = "vspl.hr@vnrseeds.com"; 
$email_Bsubject = "Birthday Wishes"; $email_txt = "Hello"; $headers = "From: " . $email_from . "\r\n";
$headers .= "MIME-Version: 1.0\r\n"; $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$file = fopen($fileatt,'rb'); $data = fread($file,filesize($fileatt)); $semi_rand = md5(time()); 
//$email_to = 'vspl.employees@vnrseeds.com';
//$email_to = 'ajaykumar.dewangan@vnrseeds.in';
$sqlBir=mysql_query("select hrm_employee.*,Gender,DR,DOB,DOB_dm,DepartmentId from hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DOB!='1970-01-01' AND hrm_employee_general.DOB_dm='".date("0000-m-d")."' AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId, $con); 
$rowBir=mysql_num_rows($sqlBir);  
 if($rowBir>0)
 {
   while($resBir=mysql_fetch_array($sqlBir))
   {  
    $sqlDN2=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resBir['DepartmentId'], $con); $resDN2=mysql_fetch_assoc($sqlDN2);
    if($resBir['DR']=='Y'){$MS='DR. '.$resBir['Fname'].' '.$resBir['Sname'].' '.$resBir['Lname']. ' (<b style="color:#B30000;">'.$resDN2['DepartmentCode'].'</b>)';}
	elseif($resBir['DR']=='N' AND $resBir['Gender']=='M'){$MS='Mr. '.$resBir['Fname'].' '.$resBir['Sname'].' '.$resBir['Lname']. ' ('.$resDN2['DepartmentCode'].')';}
	elseif($resBir['DR']=='N' AND $resBir['Gender']=='F'){$MS='Mrs. '.$resBir['Fname'].' '.$resBir['Sname'].' '.$resBir['Lname']. ' ('.$resDN2['DepartmentCode'].')';}
	$email_Bmessage .= "<b style='font-size:15px;'>".$MS.", &nbsp;&nbsp;</b>\n\n\n";
   }  
    $email_Bmessage .="<html><head></head><body><table border='0'><tr><td style='font-size:15px;'>";
    $email_Bmessage .="<img src='https://www.vnrseeds.co.in/hrims/AdminUser/AnnBirth/".$BImg.".jpg' alt=''/>\n\n";
    $email_Bmessage .="<br><b>From : VSPL HR.</b></td></tr></table></body></html>";
    //$okB = mail($email_to, $email_Bsubject, $email_Bmessage, $headers);
 }
 if($okB) { $InsBirth=mysql_query("insert into hrm_com_send_birthday(BirthDate,YesNo,CompanyId) values('".date("Y-m-d")."','Y',".$CompanyId.")", $con); } 
}
*/




}
?>

<html> 
<head>
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:250px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:13px; height:10px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/MasterAjaxCall.js"></script>
<Script type="text/javascript">window.history.forward(1);</script>
<script type="text/javascript" src="js/CompanyDetails.js" ></script>  
<script language="javascript" language="javascript">
function ScalatedQ(){ var agree=confirm("Are you sure you want Scalated Query Process...?"); if(agree){window.location="AjayUpdatedDetails.php?Action=ScalatedQuery";}}
function AllowAppraisal(){ var agree=confirm("Are you sure you want check not participat appraisal employee list...?"); if(agree){window.location="AjayUpdatedDetails.php?Action=AllowAppraisal";}}
function EditEmpId(){ var agree=confirm("Are you sure you want Edit EmployeeID, YearId,CompanyId, etc from table hrm_employee_pms table...?"); if(agree){window.location="AjayUpdatedDetails.php?Action=EditEmpId";}}
function NewEmpPms(){ var agree=confirm("Are you sure you create new rowPms for new joining employee in table hrm_employee_pms...?"); if(agree){window.location="AjayUpdatedDetails.php?Action=NewEmpPms";}}
function EncryptEmpPass(){ var agree=confirm("Are you sure you want encrypt employee pwd...?"); if(agree){window.location="AjayUpdatedDetails.php?Action=EncryptEmpPass";}}
function EncryptUserPass(){ var agree=confirm("Are you sure you want encrypt user pwd...?"); if(agree){window.location="AjayUpdatedDetails.php?Action=EncryptUserPass";}}

function EmpPass(){ var agree=confirm("Are you sure you want check employee pwd...?"); if(agree){window.location="AjayUpdatedDetails.php?Action=EmpPass&dtCode="+document.getElementById("moveCode").value;}}

function UserPass(){ var agree=confirm("Are you sure you want check user pwd...?"); if(agree){window.location="AjayUpdatedDetails.php?Action=UserPass";}}

function InsrtHoliday(){ var agree=confirm("Are you sure you want Insert Holiday in Employee attendance...?"); if(agree){window.location="AjayUpdatedDetails.php?Action=InsrtHoliday";}}
function SentAnnBirthday(){ var agree=confirm("Are you sure you want sent anniversary birthday...?"); if(agree){window.location="AjayUpdatedDetails.php?Action=SentAnnBirthday";}}
function SentRestructure(){ var agree=confirm("Are you sure...?"); if(agree){window.location="AjayUpdatedDetails.php?Action=ReStructure";}}
function ResetReStr(){ var agree=confirm("Are you sure you...?"); if(agree){window.location="AjayUpdatedDetails.php?Action=ReSetTabGeneral";}}

function MoveAtt(){ var agree=confirm("Are you sure you...?"); if(agree){window.location="AjayUpdatedDetails.php?Action=MoveTabAtt&dt="+document.getElementById("moveDate").value+"&dty="+document.getElementById("moveYear").value;} }

</script>
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
	  
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td align="" width="500" class="heading">My Page Details :</td>
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
	</tr>
<?php $B3M=date('Y-m-d', strtotime("-2 months", strtotime(date("Y-m-d")))); $Y22ear=date('Y', strtotime($B3M)); 
      $sqlc=mysql_query("select MAX(AttDate) as TDate from hrm_employee_attendance_".$Y22ear."",$con);
      $sqlm=mysql_query("select * from hrm_employee_attendance where AttDate='".$B3M."'",$con);
	  $sqlr=mysql_query("select * from hrm_employee_attendance_".$Y22ear." where AttDate='".$B3M."'",$con);
      $resc=mysql_fetch_assoc($sqlc); $rowm=mysql_num_rows($sqlm); $rowr=mysql_num_rows($sqlr); 
?>	
	<tr>
	  <td colspan="2" align="" width="352" class="heading"><?php  echo 'Before 2-Month: <font color="#FF0000">'. $B3M.'</font>, Main_Tbl:<font color="#FF0000">'. $rowm.'</font>,&nbsp;&nbsp; Att_Tbl_y:<font color="#FF0000">'. $rowr.'</font>'; ?></td>
	</tr>
	<tr>
	  <td colspan="2" align="" width="352" class="heading"><?php echo 'Max_Date:<font color="#FF0000">'. $resc['TDate'].'</font>'; ?></td>
	</tr>
	
	<?php if($_REQUEST['Action']=='MoveTabAtt')
	{
    $Exp2MDate=date('Y-m-d', strtotime($_REQUEST['dt'])); $Y2ear=date('Y', strtotime($Exp2MDate)); 
	$sqlm2=mysql_query("select * from hrm_employee_attendance where AttDate='".$Exp2MDate."'",$con);
	$sqlr2=mysql_query("select * from hrm_employee_attendance_".$Y2ear." where AttDate='".$Exp2MDate."'",$con);
    $rowm2=mysql_num_rows($sqlm2); $rowr2=mysql_num_rows($sqlr2); ?>
    <tr><td>&nbsp;</td></tr>
	<tr>
	  <td colspan="2" align="" width="352" class="heading"><?php  echo 'Move Date: <font color="#FF0000">'.$Exp2MDate.'</font>, Main_Tbl:<font color="#FF0000">'.$rowm2.'</font>,&nbsp;&nbsp; Att_Tbl_y:<font color="#FF0000">'.$rowr2.'</font>'; ?></td>
	</tr>
	<?php } ?>
	
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='S') AND $_SESSION['login'] = true) { ?>	
<tr>
<td style="width:620px;" valign="top" align="">
<table border="1" cellpadding="0px;" align="" bgcolor="#FFFFFF">
 <tr bgcolor="#4F3C6F" style="height:22px; ">
  <td style="width:500px;font-family:Times New Roman;font-size:15px;font-weight:bold;color:#FFFFFF;" valign="middle" align="center">Process</td>
  <td style="width:100px;font-family:Times New Roman;font-size:15px;font-weight:bold;color:#FFFFFF;" valign="middle" align="center">Action</td></td>
 </tr>
 <tr>
  <td style="width:500px;font-family:Times New Roman;font-size:15px;font-weight:bold;">&nbsp;Scalated Query :</td>
  <td bgcolor="#008000"><input type="button" style="width:100px;font-family:Times New Roman;font-size:15px;font-weight:bold;" value="Click" onClick="ScalatedQ()"/></td>
 </tr>
 <?php /*
 <tr>
  <td style="width:500px;font-family:Times New Roman;font-size:15px;font-weight:bold;">&nbsp;Not Participet Appraisal :</td>
  <td bgcolor="#008000"><input type="button" style="width:100px;font-family:Times New Roman;font-size:15px;font-weight:bold;" value="Click" onClick="AllowAppraisal()"/></td>
 </tr>
 <tr>
  <td style="width:500px;font-family:Times New Roman;font-size:15px;font-weight:bold;">&nbsp;Insert EmployeeID,YearId From hrm_employee_pms Table :</td>
  <td bgcolor="#008000"><input type="button" style="width:100px;font-family:Times New Roman;font-size:15px;font-weight:bold;" value="Click" onClick="EditEmpId()"/></td>
 </tr>
  <tr>
  <td style="width:500px;font-family:Times New Roman;font-size:15px;font-weight:bold;">&nbsp;Insert NewRow For New Employee Into hrm_employee_pms Table :</td>
  <td bgcolor="#008000"><input type="button" style="width:100px;font-family:Times New Roman;font-size:15px;font-weight:bold;" value="Click" onClick="NewEmpPms()"/></td>
 </tr>
 <tr>
  <td style="width:500px;font-family:Times New Roman;font-size:15px;font-weight:bold;">&nbsp;Update/Encrypted Employee Password :</td>
  <td bgcolor="#008000"><input type="button" style="width:100px;font-family:Times New Roman;font-size:15px;font-weight:bold;" value="Click" onClick="EncryptEmpPass()"/></td>
 </tr>
 <tr>
  <td style="width:500px;font-family:Times New Roman;font-size:15px;font-weight:bold;">&nbsp;Update/Encrypted User Password :</td>
  <td bgcolor="#008000"><input type="button" style="width:100px;font-family:Times New Roman;font-size:15px;font-weight:bold;" value="Click" onClick="EncryptUserPass()"/></td>
 </tr>
 */ ?>
 <tr>
  <td style="width:500px;font-family:Times New Roman;font-size:15px;font-weight:bold;">&nbsp;E-Password :
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  Code:&nbsp;<input type="text" id="moveCode" value="0" style="width:50px;text-align:center;"/>
  </td>
  <td bgcolor="#008000"><input type="button" style="width:100px;font-family:Times New Roman;font-size:15px;font-weight:bold;" value="Click" onClick="EmpPass()"/></td>
 </tr>
 
 <?php /*
 <tr>
  <td style="width:500px;font-family:Times New Roman;font-size:15px;font-weight:bold;">&nbsp;User Password :</td>
  <td bgcolor="#008000"><input type="button" style="width:100px;font-family:Times New Roman;font-size:15px;font-weight:bold;" value="Click" onClick="UserPass()"/></td>
 </tr>
 */ ?>
 <tr>
  <td style="width:500px;font-family:Times New Roman;font-size:15px;font-weight:bold;">&nbsp;Insert Holiday In Employee Attendance :</td>
  <td bgcolor="#008000"><input type="button" style="width:100px;font-family:Times New Roman;font-size:15px;font-weight:bold;" value="Click" onClick="InsrtHoliday()"/></td>
 </tr>
 <tr>
  <?php /*     
  <td style="width:500px;font-family:Times New Roman;font-size:15px;font-weight:bold;">&nbsp;Sent Anniversary Birthday :</td>
  <td bgcolor="#008000"><input type="button" style="width:100px;font-family:Times New Roman;font-size:15px;font-weight:bold;" value="Click" onClick="SentAnnBirthday()"/></td>
 </tr>
  <tr>
  <td style="width:500px;font-family:Times New Roman;font-size:15px;font-weight:bold;">&nbsp;Re-Structure :</td>
  <td bgcolor="#008000"><input type="button" style="width:100px;font-family:Times New Roman;font-size:15px;font-weight:bold;" value="Click" onClick="SentRestructure()"/></td>
 </tr>
 <tr>
  <td style="width:500px;font-family:Times New Roman;font-size:15px;font-weight:bold;">&nbsp;Re-SetStucture :</td>
  <td bgcolor="#008000"><input type="button" style="width:100px;font-family:Times New Roman;font-size:15px;font-weight:bold;" value="Click" onClick="ResetReStr()"/></td>
 </tr>
 */ ?>
 <tr>
  <td style="width:500px;font-family:Times New Roman;font-size:15px;font-weight:bold;">&nbsp;Move Attendance:
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <?php $ExpMDa2te=date('Y-m-d', strtotime("-2 months", strtotime(date("Y-m-d")))); 
        $Yea2r=date('Y', strtotime("-2 months", strtotime(date("Y-m-d")))); ?>
       Tbl Year:&nbsp;<input type="text" id="moveYear" value="<?php echo $Yea2r; ?>" style="width:50px;text-align:center;"/>
	&nbsp;&nbsp;&nbsp;&nbsp;
	Date:&nbsp;<input type="text" id="moveDate" value="<?php echo $ExpMDa2te; ?>" style="width:80px;text-align:center;"/>
  </td>
  <td bgcolor="#008000"><input type="button" style="width:100px;font-family:Times New Roman;font-size:15px;font-weight:bold;" value="Click" onClick="MoveAtt()"/></td>
 </tr>
 
</table>
</td>
</tr>
<?php } ?> 
</table>
		
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************END*****END*****END******END******END***************************************************************?>
<?php //************************************************************************************************************************************************************?>
		
	  </td>
	</tr>
	
	<tr>
	  <td valign="top" align="center">
	    <table border="0" style="margin-top:0px;">
				<tr>
	              <td align="center"><img src="images/home1.png"></td>
				</tr>
	    </table>
	  </td>
	</tr>
	<tr>
	  <td valign="top">
	    <?php require_once("../footer.php"); ?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>