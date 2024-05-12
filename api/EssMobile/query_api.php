<?php 
//require_once('../../AdminUser/config/config.php');

/******************/
//$con = mysqli_connect("localhost","vnrseed2_demo","vnrseed2_demo","vnrseed2_demo");

$con=mysqli_connect('localhost','hrims_user','hrims@192');
if(!$con) die("Failed to connect to database!");
mysqli_select_db($con, "hrims");
date_default_timezone_set('Asia/Calcutta');

//$con=mysqli_connect('localhost','root','ajaydbajay');
//if(!$con) die("Failed to connect to database!");
//$db=mysqli_select_db( $con, 'vnrseed2_hrims');

//include "firebase_api.php"; 


if($_REQUEST['empid'] >0){
$run_qry=mysqli_query($con,"select * from hrm_employee where EmployeeID =".$_REQUEST['empid']." AND EmpStatus = 'A'");
$num=mysqli_num_rows($run_qry); 
if($num == 0){
    echo json_encode(array("Code" => "404") ); 
    die;
}}


if($_REQUEST['value'] == ''){ echo json_encode(array("msg" => "Parameter Missing!") ); }
 
//Employee Wise Department for Post Query
elseif($_REQUEST['value'] == 'Qdept_list' && $_REQUEST['empid']>0 && $_REQUEST['comid']>0)
{
 $sdept=mysqli_query($con,"select DepartmentId from hrm_employee_general where EmployeeID=".$_REQUEST['empid']);
 $rdept=mysqli_fetch_assoc($sdept);
 if($rdept['DepartmentId']==2){ $sbq="1=1"; }else{ $sbq="DepartmentId!=2"; }  
 $run_qry=mysqli_query($con,"select DepartmentId,DepartmentCode from hrm_department where CompanyId=".$_REQUEST['comid']." AND ".$sbq." AND DepartmentId!=4 AND DepartmentId!=6 AND DepartmentId!=26 AND DepartmentId!=17 AND DepartmentId!=18 AND DeptStatus='A' order by DepartmentCode ASC");
 $num=mysqli_num_rows($run_qry); $carray = array();
 if($num>0)
 {
  while($res=mysqli_fetch_assoc($run_qry)){ $carray[]=$res; }
  echo json_encode(array("Code" => "300", "Qdept_list" => $carray) ); 
 }
 else{ echo json_encode(array("Code" => "100", "msg" => "Error!") ); }  
}



//Department Wise Query Subject List
elseif($_REQUEST['value'] == 'Qsub_list' && $_REQUEST['deptid']!='' && $_REQUEST['empid']>0)
{  
 $run_qry=mysqli_query($con,"SELECT DeptQSubId as QSubId,DeptQSubject as QSubName FROM hrm_deptquerysub where DepartmentId=".$_REQUEST['deptid']." AND AssignEmpId!=0 AND AssignEmpId!='' AND Status='A' order by DeptQSubject ASC");
 $num=mysqli_num_rows($run_qry); $carray = array();
 if($num>0)
 {
  while($res=mysqli_fetch_assoc($run_qry)){ $carray[]=$res; }
  echo json_encode(array("Code" => "300", "Qsub_list" => $carray) ); 
 }
 else{ echo json_encode(array("Code" => "100", "msg" => "Error!") ); }  
}



//My Query List
elseif($_REQUEST['value'] == 'MyQuery_list' && $_REQUEST['empid']>0)
{  
    
 $run_qry=mysqli_query($con,"select q.*, DepartmentCode from hrm_employee_queryemp q inner join hrm_department d on q.QToDepartmentId=d.DepartmentId where q.EmployeeID=".$_REQUEST['empid']." AND q.QueryStatus_Emp!=4 order by q.QueryDT DESC");
 $num=mysqli_num_rows($run_qry); $Qarray = array();
 if($num>0)
 {
  while($res=mysqli_fetch_assoc($run_qry)){ $Qarray[]=$res; }
  echo json_encode(array("Code" => "300", "MyQuery_list" => $Qarray) ); 
 }
 else{ echo json_encode(array("Code" => "100", "msg" => "Error!") ); }  
}



//Post Query
elseif($_REQUEST['value'] == 'Query_post' && $_REQUEST['deptid']!='' && $_REQUEST['subid']!='' && $_REQUEST['Query']!='' && $_REQUEST['empid']>0 && $_REQUEST['comid']>0 && $_REQUEST['VCheck']!='')
{  
  
  $scc=mysqli_query($con,"select Fname, Sname, Lname,CostCenter, EmailId_Vnr, ReportingEmailId from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID where g.EmployeeID=".$_REQUEST['empid']);  $rcc=mysqli_fetch_assoc($scc); 
  if($_REQUEST['subid']!=0)
  { 
    $sqlSub=mysqli_query($con,"select * from hrm_deptquerysub where DeptQSubId=".$_REQUEST['subid']); 
    $resSub=mysqli_fetch_assoc($sqlSub);
    $QSubject=$resSub['DeptQSubject']; $OthQSub='N'; $EmpAssign=$resSub['AssignEmpId']; 
  
    if($_REQUEST['deptid']==2 && $_REQUEST['subid']==86)
    { 
	 $sqlaR=mysqli_query($con,"select * from hrm_employee_reporting where EmployeeID=".$_REQUEST['empid']);
	 $resaR=mysqli_fetch_assoc($sqlaR); 
	 if($resaR['AppraiserId']==7 OR $resaR['ReviewerId']==7 OR $resaR['HodId']==7){ $AssigEmp=7; }
	 elseif($resaR['AppraiserId']==89 OR $resaR['ReviewerId']==89 OR $resaR['HodId']==89){ $AssigEmp=89; }
    }
    elseif($EmpAssign!=9999){$AssigEmp=$resSub['AssignEmpId'];}
    elseif($EmpAssign==9999)
    {
     $sEI=mysqli_query($con,"select * from hrm_employee_state where StateId=".$rcc['CostCenter']." AND CompanyId=".$_REQUEST['comid']); $rEI=mysqli_fetch_array($sEI);
     if($_REQUEST['deptid']==1){$AssigEmp=$rEI['HR_EId'];} 
	 elseif($_REQUEST['deptid']==2){$AssigEmp=$rEI['RD_EId'];}
	 elseif($_REQUEST['deptid']==3){$AssigEmp=$rEI['PD_EId'];} 
	 elseif($_REQUEST['deptid']==4){$AssigEmp=$rEI['PRODUCTION_EId'];}
	 elseif($_REQUEST['deptid']==5){$AssigEmp=$rEI['PPROCESSING_EId'];} 
	 elseif($_REQUEST['deptid']==6){$AssigEmp=$rEI['SALES_EId'];}
	 elseif($_REQUEST['deptid']==7){$AssigEmp=$rEI['LOGISTICS_EId'];}	
	 elseif($_REQUEST['deptid']==8){$AssigEmp=$rEI['FINANCE_EId'];}
	 elseif($_REQUEST['deptid']==9){$AssigEmp=$rEI['IT_EId'];} 
	 elseif($_REQUEST['deptid']==10){$AssigEmp=$rEI['LEGAL_EId'];}
	 elseif($_REQUEST['deptid']==11){$AssigEmp=$rEI['ADMIN_EId'];} 
	 elseif($_REQUEST['deptid']==12){$AssigEmp=$rEI['MARKETING_EId'];}
	 elseif($_REQUEST['deptid']==24){$AssigEmp=$rEI['QA_EId'];} 
	 elseif($_REQUEST['deptid']==25){$AssigEmp=$rEI['FS_EId'];}
    }
  
    $sqlR=mysqli_query($con,"select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr,tokenid,tokenid_ios from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_personal p ON g.EmployeeID=p.EmployeeID where g.EmployeeID=".$AssigEmp); $resR=mysqli_fetch_assoc($sqlR); 
    if($resR['DR']=='Y'){$M2='Dr.';} elseif($resR['Gender']=='M'){$M2='Mr.';} elseif($resR['Gender']=='F' AND $resR['Married']=='Y'){$M2='Mrs.';} elseif($resR['Gender']=='F' AND $resR['Married']=='N'){$M2='Miss.';}  
	$RName=$M2.' '.$resR['Fname'].' '.$resR['Sname'].' '.$resR['Lname'];  

    if($_REQUEST['deptid']==2 && $_REQUEST['subid']==86){ $RepId=$AssigEmp; $HodId=$AssigEmp; }
    else
    {
     $sqlH=mysqli_query($con,"select AppraiserId,HodId from hrm_employee_reporting where EmployeeID=".$AssigEmp); 
     $resH=mysqli_fetch_assoc($sqlH); $RepId=$resH['AppraiserId']; $HodId=$resH['HodId'];
    }
 
    $Eone=date("Y-m-d"); $Etwo=date("Y-m-d",strtotime('+3 day')); $Eno=0; 
    $Estart=new DateTime($Eone);
    $Eend=new DateTime($Etwo);
    $interval=DateInterval::createFromDateString('1 day');
    $Eperiod=new DatePeriod($Estart, $interval, $Eend);
    foreach($Eperiod as $dt) {if($dt->format('N')==7){$Eno++;}}  
	$sqlE = mysqli_query($con,"SELECT * FROM hrm_employee_attendance WHERE EmployeeID=".$AssigEmp." AND AttValue='HO' AND AttDate>='".date("Y-m-d")."' AND AttDate<='".date("Y-m-d",strtotime('+3 day'))."'"); $rowE = mysqli_num_rows($sqlE); 
	$TotE=$Eno+$rowE; $TotDEmp=$TotE+3; $EmpDay = date("Y-m-d h:i:s",strtotime('+'.$TotDEmp.' day'));
  
    $Aone=date("Y-m-d"); $Atwo=date("Y-m-d",strtotime('+6 day')); $Ano=0; 
    $Astart=new DateTime($Aone);
    $Aend=new DateTime($Atwo);
    $interval=DateInterval::createFromDateString('1 day');
    $Aperiod=new DatePeriod($Astart, $interval, $Aend);
    foreach($Aperiod as $dt) {if($dt->format('N')==7){$Ano++;}}  
	$sqlA = mysqli_query($con,"SELECT * FROM hrm_employee_attendance WHERE EmployeeID=".$RepId." AND AttValue='HO' AND AttDate>='".date("Y-m-d")."' AND AttDate<='".date("Y-m-d",strtotime('+6 day'))."'"); $rowA = mysqli_num_rows($sqlA); 
	$TotA=$Ano+$rowA; $TotDApp=$TotA+6; $AppDay = date("Y-m-d h:i:s",strtotime('+'.$TotDApp.' day'));
  
    $Hone=date("Y-m-d"); $Htwo=date("Y-m-d",strtotime('+9 day')); $Hno=0; 
    $Hstart=new DateTime($Hone);
    $Hend=new DateTime($Htwo);
    $interval=DateInterval::createFromDateString('1 day');
    $Hperiod=new DatePeriod($Hstart, $interval, $Hend);
    foreach($Hperiod as $dt) {if($dt->format('N')==7){$Hno++;}} 
    $sqlH = mysqli_query($con,"SELECT * FROM hrm_employee_attendance WHERE EmployeeID=".$HodId." AND AttValue='HO' AND AttDate>='".date("Y-m-d")."' AND AttDate<='".date("Y-m-d",strtotime('+9 day'))."'"); $rowH = mysqli_num_rows($sqlH); 
	$TotH=$Hno+$rowH; $TotDHod=$TotH+9; $HodDay = date("Y-m-d h:i:s",strtotime('+'.$TotDHod.' day'));
  
 } //if($_REQUEST['subid']!=0)
 else 
 { 
   $QSubject='N'; $OthQSub=$_REQUEST['OthSub']; $AssigEmp=0; $RepId=0; $HodId=0; 
   $EmpDay='0000-00-00 00:00:00'; $AppDay='0000-00-00 00:00:00'; $HodDay='0000-00-00 00:00:00'; 
 }
 
 if($_REQUEST['comid']==1){$MnmtId=223;} 
 elseif($_REQUEST['comid']==2){$MnmtId=233;}
 elseif($_REQUEST['comid']==3){$MnmtId=259;}
 
 $search =  '!"#$%&/=*+\'-;:_';
 $search = str_split($search);
 $str_Q = $_REQUEST['Query']; 
 $EmpQ=str_replace($search, "", $str_Q);
 
 if($_REQUEST['deptid']==2 && $_REQUEST['subid']==86)
 {
   $EmpDay = date("Y-m-d h:i:s",strtotime('+30 day'));
   $AppDay = date("Y-m-d h:i:s",strtotime('+30 day')); 
   $HodDay = date("Y-m-d h:i:s",strtotime('+30 day')); 
   $MnmtId = $HodId;
 }
 
 $sqlAh=mysqli_query($con,"select AppraiserId,HodId from hrm_employee_reporting where EmployeeID=".$_REQUEST['empid']); 
 $resAh=mysqli_fetch_assoc($sqlAh);
 $sqlyi=mysqli_query($con,"select YearId from hrm_year where Company".$_REQUEST['comid']."Status='A'"); 
 $resyi=mysqli_fetch_assoc($sqlyi);
 
 $SqlQIns=mysqli_query($con,"insert into hrm_employee_queryemp(EmployeeID, RepMgrId, HodId, QToDepartmentId, QSubjectId, QuerySubject, OtherSubject, AssignEmpId, HideYesNo, QueryValue, QueryDT, QueryNoOfTime, MailTo_Emp, MailTo_QueryOwner, Level_1ID, Level_1QToDT, Level_2ID, Level_2QToDT, Level_3ID, Level_3QToDT, Mngmt_ID, Mngmt_QToDT, QueryYearId)values(".$_REQUEST['empid'].", ".$resAh['AppraiserId'].", ".$resAh['HodId'].", '".$_REQUEST['deptid']."', ".$_REQUEST['subid'].", '".$QSubject."', '".$OthQSub."', ".$AssigEmp.", '".$_REQUEST['VCheck']."', '".$EmpQ."', '".date("Y-m-d h:i:s")."', 1, 1, 1, ".$AssigEmp.", '".date("Y-m-d h:i:s")."', ".$RepId.", '".$EmpDay."', ".$HodId.", '".$AppDay."', ".$MnmtId.", '".$HodDay."', ".$resyi['YearId'].")"); 

 $sqlDD=mysqli_query($con,"select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['deptid']." AND CompanyId=".$_REQUEST['comid']); $resDD=mysqli_fetch_assoc($sqlDD);    
 if($QSubject=='N'){$QS=$OthQSub;}else{$QS=$QSubject;}	
 if($_REQUEST['VCheck']=='Y'){$name='Name Undisclosed';}else{$name=$rcc['Fname'].' '.$rcc['Sname'].' '.$rcc['Lname'];}
   
  $sqlMK=mysqli_query($con,"select * from hrm_employee_querymail_key where QueryMailId=1 AND CompanyId=".$_REQUEST['comid']);  $resMK=mysqli_fetch_assoc($sqlMK);  

  //Self
  if($rcc['EmailId_Vnr']!='' AND $resMK['Employee']=='Y')
  {
	//$email_to = $rcc['EmailId_Vnr'];
    //$email_from='admin@vnrseeds.co.in';
	$email_subject = "Posted Query";  
	//$headers = "From: " . $email_from . "\r\n";
	//$semi_rand = md5(time());
    //$headers .= "MIME-Version: 1.0\r\n";
    //$headers .= "Content-type: text/html; charset=ISO-8859-1\r\n";
	$email_message .= "Dear <b>".$name."</b> <br><br>\n\n\n";
    $email_message .="<html><head></head><body>";
    $email_message .= "We have recieved your query about Subject-<b>".$QS."</b> raised to Department-<b>".$resDD['DepartmentCode']."</b>.<br>";
	$email_message .= "We have forwarded the same to appropriate owner and a reply shall be sent soon.<br><br>\n\n\n";
	$email_message .= "From <br><b>ADMIN ESS</b><br>";
    $email_message .="</body></html>";	           
    //$ok = @mail($email_to, $email_subject, $email_message, $headers);
    
       $subject=$email_subject;
       $body=$email_message;
       $email_to=$rcc['EmailId_Vnr'];
       require 'vendor/mail_admin.php';
  }
         
   //Query owner
   if($_REQUEST['subid']!=0 AND $resR['EmailId_Vnr']!='' AND $resMK['Leve_l']=='Y')
   {
	//$email_toT = $resR['EmailId_Vnr'];
    //$email_from='admin@vnrseeds.co.in';
	$email_subjectT = "Query from ".$name;   
	//$headers = "From: $email_from ". "\r\n";
    $email_messageT .= "Dear <b>".$RName."</b> <br><br>\n\n\n";
	$email_messageT .="<html><head></head><body>";
    $email_messageT .= $name." has raised a query on Subject-<b>".$QS."</b>, go to <b>ESS-QUERY</b> for more details <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.<br>"; 
	
	if($_REQUEST['deptid']==2 && $_REQUEST['subid']==86){ $email_messageT .= "<br>\n\n\n"; }
	else{ $email_messageT .= "<b>You</b> need to answer query in 3 working days after which it will get escalated to next level.<br><br>\n\n\n"; }

	$email_messageT .= "From <br><b>ADMIN ESS</b><br>";
	$email_messageT .="</body></html>";	
    //$ok = @mail($email_toT, $email_subjectT, $email_messageT, $headers);
    
       $subject=$email_subjectT;
       $body=$email_messageT;
       $email_to=$resR['EmailId_Vnr'];
       require 'vendor/mail_admin.php';
    
   }  
   
      /************ Firbase *******************/
      if($resR['tokenid']!='')
      {  
         include "firebase_api.php";
         $user_token = $resR['tokenid']; 
      }
      elseif($resR['tokenid_ios']!='')
      {  
         
         include "firebase_ios_api.php"; 
         $user_token = $resR['tokenid_ios'];
      }
      
      //$user_token=[];
      //$user_token[] = $resR['tokenid'];
      $data1['subject'] = "Query from ".$name;
      $data1['msg_body'] = $name." has raised a query on Subject ".$QS;
	  android($data1,$user_token);
	  /************ Firbase *******************/


   if($_REQUEST['deptid']!=2 && $_REQUEST['subid']!=86)
   {

    //Reporting Manager
    if($rcc['ReportingEmailId']!='' AND $resMK['ReportingMgr']=='Y')
    {
	 //$email_toR = $rcc['ReportingEmailId'];
     //$email_from='admin@vnrseeds.co.in';
	 $email_subjectR = "Query Raised By ".$name;  
	 //$headersR = "From: $email_from ". "\r\n";
	 //$semi_rand = md5(time());
     //$headersR .= "MIME-Version: 1.0\r\n";
     //$headersR .= "Content-type: text/html; charset=ISO-8859-1\r\n"; 
	 $email_messageR .= "Dear <b>".$rcc['ReportingName']."</b> <br><br>\n\n\n";
     $email_messageR .="<html><head></head><body>";
     $email_messageR .= "Your team member ".$name." has raised a query about Subject-<b>".$QS."</b> to Department-<b>".$resDD['DepartmentCode']."</b>.<br>";
	 $email_messageR .= "Kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a> for more details.<br>";
	 $email_messageR .= "From <br><b>ADMIN ESS</b><br>";
     $email_messageR .="</body></html>";	           
     //$ok = @mail($email_toR, $email_subjectR, $email_messageR, $headersR);
     
       $subject=$email_subjectR;
       $body=$email_messageR;
       $email_to=$rcc['ReportingEmailId'];
       require 'vendor/mail_admin.php';
     
    }   
   
    
	//HOD
	if($resAh['HodId']>0){ $sch=mysqli_query($con,"select Fname,Sname,Lname,EmailId_Vnr from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID where g.EmployeeID=".$resAh['HodId']);  $rch=mysqli_fetch_assoc($sch); }
	
    if($rch['EmailId_Vnr']!='' AND $resMK['HOD']=='Y')
    {
	 //$email_toH = $rch['EmailId_Vnr'];
     //$email_from='admin@vnrseeds.co.in';
	 $email_subjectH = "Query Raised By ".$name;  
	 //$headersH = "From: $email_from ". "\r\n";
	 //$semi_rand = md5(time());
     //$headersH .= "MIME-Version: 1.0\r\n";
     //$headersH .= "Content-type: text/html; charset=ISO-8859-1\r\n";
	 $email_messageH .= "Dear <b>".$rch['Fname'].' '.$rch['Sname'].' '.$rch['Lname']."</b> <br><br>\n\n\n";
     $email_messageH .="<html><head></head><body>";
     $email_messageH .= "Your team member ".$name." has raised a query about Subject-<b>".$QS."</b> to Department-<b>".$resDD['DepartmentCode']."</b>.<br>";
	 $email_messageH .= "Kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a> for more details.<br>";
	 $email_messageH .= "From <br><b>ADMIN ESS</b><br>";
     $email_messageH .="</body></html>";	           
     //$ok = @mail($email_toH, $email_subjectH, $email_messageH, $headersH);
     
       $subject=$email_subjectH;
       $body=$email_messageH;
       $email_to=$rch['EmailId_Vnr'];
       require 'vendor/mail_admin.php';
     
    }
   
   } //if($_REQUEST['deptid']!=2 AND $_REQUEST['subid']!=86)

   //HR
   if($_REQUEST['subid']==0 AND $resMK['HR']=='Y')
   {
	//$email_toHR = 'vspl.hr@vnrseeds.com';
    if($rcc['EmailId_Vnr']==''){$email_fromHR = $name;} else {$email_fromHR=$rcc['EmailId_Vnr'];}
	$email_subjectHR = "Query from ".$name;   
	//$headersHR = "From: $email_fromHR ". "\r\n";
	//$semi_rand = md5(time());
	//$headersHR .= "MIME-Version: 1.0\r\n";
    //$headersHR .= "Content-type: text/html; charset=ISO-8859-1\r\n";
	$email_messageHR .="<html><head></head><body>";
    $email_messageHR .= $name." has raised a query on subject select <b>others</b>, go to <b>ESS-QUERY</b> for more details <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.<br>"; 
	$email_messageHR .= "<b>Please</b> assign query to appropriate owner.<br><br>\n\n\n";
	$email_messageHR .= "From <br><b>ADMIN ESS</b><br>";
	$email_messageHR .="</body></html>";	
    //$ok = @mail($email_toHR, $email_subjectHR, $email_messageHR, $headersHR);
    
       $subject=$email_subjectHR;
       $body=$email_messageHR;
       $email_to='vspl.hr@vnrseeds.com';
       require 'vendor/mail_admin.php';
    
   }  
 
 if($SqlQIns)
 {
  echo json_encode(array("Code" => "300", "msg" => "Query Post Successfully") ); 
 }
 else{ echo json_encode(array("Code" => "100", "msg" => "Error!") ); }  
}





//Reopen Reopen Reopen Reopen Reopen Reopen
elseif($_REQUEST['value'] == 'Query_Reopen' && $_REQUEST['QueryId']!='' && $_REQUEST['QValue']!='' && $_REQUEST['QueryNoOfTime']>0 && $_REQUEST['comid']>0)
{
  
  /********************************/
  /********************************/
  $sql = mysqli_query($con,"SELECT * FROM hrm_employee_queryemp WHERE QueryId=".$_REQUEST['QueryId']); 
  $res = mysqli_fetch_assoc($sql); 
  
  $NOfQ=$_REQUEST['QueryNoOfTime']+1;
  
  if($res['Level_1QStatus']==3)
  {
   $Eone=date("Y-m-d"); $Etwo=date("Y-m-d",strtotime('+3 day')); $Eno=0;  
   for($i=$Eone;$i<=$Etwo;$i++){ $Eday=date("N",strtotime($i)); if($Eday==7) { $Eno++; } } 
   $sqlE = mysqli_query("SELECT * FROM hrm_employee_attendance WHERE EmployeeID=".$res['Level_1ID']." AND AttValue='HO' AND AttDate>='".date("Y-m-d")."' AND AttDate<='".date("Y-m-d",strtotime('+3 day'))."'"); $rowE = mysqli_num_rows($sqlE);
   $TotE=$Eno+$rowE; $TotDEmp=$TotE+3; $EmpDay = date("Y-m-d h:i:s",strtotime('+'.$TotDEmp.' day'));

   $Aone=date("Y-m-d"); $Atwo=date("Y-m-d",strtotime('+6 day')); $Ano=0; 
   for($i=$Aone;$i<=$Atwo;$i++){ $Aday=date("N",strtotime($i)); if($Aday==7) { $Ano++; } } 
   $sqlA = mysqli_query($con,"SELECT * FROM hrm_employee_attendance WHERE EmployeeID=".$res['Level_2ID']." AND AttValue='HO' AND AttDate>='".date("Y-m-d")."' AND AttDate<='".date("Y-m-d",strtotime('+6 day'))."'"); $rowA = mysqli_num_rows($sqlA); $TotA=$Ano+$rowA; $TotDApp=$TotA+6; $AppDay = date("Y-m-d h:i:s",strtotime('+'.$TotDApp.' day'));
  
   $Hone=date("Y-m-d"); $Htwo=date("Y-m-d",strtotime('+9 day')); $Hno=0; 
   for($i=$Hone;$i<=$Htwo;$i++){ $Hday=date("N",strtotime($i)); if($Hday==7) { $Hno++; } } 
   $sqlH = mysqli_query($con,"SELECT * FROM hrm_employee_attendance WHERE EmployeeID=".$res['Level_3ID']." AND AttValue='HO' AND AttDate>='".date("Y-m-d")."' AND AttDate<='".date("Y-m-d",strtotime('+9 day'))."'"); $rowH = mysqli_num_rows($sqlH); $TotH=$Hno+$rowH; $TotDHod=$TotH+9; $HodDay = date("Y-m-d h:i:s",strtotime('+'.$TotDHod.' day'));
   $L1QDT=date("Y-m-d h:i:s"); $L2QDT=$EmpDay; $L3QDT=$AppDay; $L4QDT=$HodDay;
  }
  
  elseif($res['Level_2QStatus']==3)
  {
   $Aone=date("Y-m-d"); $Atwo=date("Y-m-d",strtotime('+3 day')); $Ano=0; 
   for($i=$Aone;$i<=$Atwo;$i++){ $Aday=date("N",strtotime($i)); if($Aday==7) { $Ano++; } } 
   $sqlA = mysqli_query($con,"SELECT * FROM hrm_employee_attendance WHERE EmployeeID=".$res['Level_2ID']." AND AttValue='HO' AND AttDate>='".date("Y-m-d")."' AND AttDate<='".date("Y-m-d",strtotime('+3 day'))."'"); $rowA = mysqli_num_rows($sqlA); $TotA=$Ano+$rowA; $TotDApp=$TotA+3; $AppDay = date("Y-m-d h:i:s",strtotime('+'.$TotDApp.' day'));
  
   $Hone=date("Y-m-d"); $Htwo=date("Y-m-d",strtotime('+6 day')); $Hno=0; 
   for($i=$Hone;$i<=$Htwo;$i++){ $Hday=date("N",strtotime($i)); if($Hday==7) { $Hno++; } } 
   $sqlH = mysqli_query($con,"SELECT * FROM hrm_employee_attendance WHERE EmployeeID=".$res['Level_3ID']." AND AttValue='HO' AND AttDate>='".date("Y-m-d")."' AND AttDate<='".date("Y-m-d",strtotime('+6 day'))."'"); $rowH = mysqli_num_rows($sqlH); $TotH=$Hno+$rowH; $TotDHod=$TotH+6; $HodDay = date("Y-m-d h:i:s",strtotime('+'.$TotDHod.' day'));
   $L1QDT=$_POST['EmpQDT']; $L2QDT=date("Y-m-d h:i:s"); $L3QDT=$AppDay; $L4QDT=$HodDay;
  }
  
  elseif($res['Level_3QStatus']==3)
  {
   $Hone=date("Y-m-d"); $Htwo=date("Y-m-d",strtotime('+3 day')); $Hno=0; 
   for($i=$Hone;$i<=$Htwo;$i++){ $Hday=date("N",strtotime($i)); if($Hday==7) { $Hno++; } } 
   $sqlH = mysqli_query($con,"SELECT * FROM hrm_employee_attendance WHERE EmployeeID=".$res['Level_3ID']." AND AttValue='HO' AND AttDate>='".date("Y-m-d")."' AND AttDate<='".date("Y-m-d",strtotime('+3 day'))."'"); $rowH = mysqli_num_rows($sqlH); $TotH=$Hno+$rowH; $TotDHod=$TotH+3; $HodDay = date("Y-m-d h:i:s",strtotime('+'.$TotDHod.' day'));
   $L1QDT=$_POST['EmpQDT']; $L2QDT=$_POST['RepQDT']; $L3QDT=date("Y-m-d h:i:s"); $L4QDT=$HodDay;
  }
  
  elseif($res['Mngmt_QStatus']==3)
  { $L1QDT=$res['Level_1QToDT']; $L2QDT=$res['Level_2QToDT']; $L3QDT=$res['Level_3QToDT']; $L4QDT=date("Y-m-d h:i:s"); }  

   if($NOfQ==2)
   {$SqlQU=mysqli_query($con,"update hrm_employee_queryemp set QStatus=1, QCloseStatus='N', Query2Value='".$_REQUEST['QValue']."', Query2DT='".date("Y-m-d h:i:s")."', QueryNoOfTime=".$NOfQ.", MailTo_Emp=1, MailTo_QueryOwner=1, QueryStatus_Emp=0, Level_1QToDT='".$L1QDT."', Level_1QStatus=0, Level_2QToDT='".$L2QDT."', Level_2QStatus=0, Level_3QToDT='".$L3QDT."', Level_3QStatus=0, Mngmt_QToDT='".$L4QDT."', Mngmt_QStatus=0, Mngmt_QAction=0 where QueryId=".$_REQUEST['QueryId']);}
   if($NOfQ==3)
   {$SqlQU=mysqli_query($con,"update hrm_employee_queryemp set QStatus=1, QCloseStatus='N', Query3Value='".$_REQUEST['QValue']."', Query3DT='".date("Y-m-d h:i:s")."', QueryNoOfTime=".$NOfQ.", MailTo_Emp=1, MailTo_QueryOwner=1, QueryStatus_Emp=0, Level_1QToDT='".$L1QDT."', Level_1QStatus=0, Level_2QToDT='".$L2QDT."', Level_2QStatus=0, Level_3QToDT='".$L3QDT."', Level_3QStatus=0, Mngmt_QToDT='".$L4QDT."', Mngmt_QStatus=0, Mngmt_QAction=0 where QueryId=".$_REQUEST['QueryId']);}
   if($NOfQ==4)
   {$SqlQU=mysqli_query($con,"update hrm_employee_queryemp set QStatus=1, QCloseStatus='N', Query4Value='".$_REQUEST['QValue']."', Query4DT='".date("Y-m-d h:i:s")."', QueryNoOfTime=".$NOfQ.", MailTo_Emp=1, MailTo_QueryOwner=1, QueryStatus_Emp=0, Level_1QToDT='".$L1QDT."', Level_1QStatus=0, Level_2QToDT='".$L2QDT."', Level_2QStatus=0, Level_3QToDT='".$L3QDT."', Level_3QStatus=0, Mngmt_QToDT='".$L4QDT."', Mngmt_QStatus=0, Mngmt_QAction=0 where QueryId=".$_REQUEST['QueryId']);}
   if($NOfQ==5)
   {$SqlQU=mysqli_query($con,"update hrm_employee_queryemp set QStatus=1, QCloseStatus='N', Query5Value='".$_REQUEST['QValue']."', Query5DT='".date("Y-m-d h:i:s")."', QueryNoOfTime=".$NOfQ.", MailTo_Emp=1, MailTo_QueryOwner=1, QueryStatus_Emp=0, Level_1QToDT='".$L1QDT."', Level_1QStatus=0, Level_2QToDT='".$L2QDT."',Level_2QStatus=0, Level_3QToDT='".$L3QDT."', Level_3QStatus=0, Mngmt_QToDT='".$L4QDT."', Mngmt_QStatus=0, Mngmt_QAction=0 where QueryId=".$_REQUEST['QueryId']);} 
 
   
   $sqlDD=mysqli_query($con,"select DepartmentCode from hrm_department where DepartmentId=".$res['QToDepartmentId']); 
   $resDD=mysqli_fetch_assoc($sqlDD);    
   if($res['QuerySubject']=='N'){$QS=$res['OtherSubject'];}else{$QS=$res['QuerySubject'];}
   
   $sqlE=mysqli_query($con,"select EmpCode,Fname,Sname,Lname,Married,Gender,DR,EmailId_Vnr from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID where e.EmployeeID=".$res['EmployeeID']); $resE=mysqli_fetch_assoc($sqlE); 
   if($resE['DR']=='Y'){$M='Dr.';} elseif($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';}  $NameE=$M.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'];
   if($res['HideYesNo']=='Y'){$name='Name Undisclosed';}else{$name=$NameE;}
   
   $sqlQE=mysqli_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID where e.EmployeeID=".$res['Level_1ID']); 
$resQE=mysqli_fetch_assoc($sqlQE); if($resQE['DR']=='Y'){$ME='Dr.';} elseif($resQE['Gender']=='M'){$ME='Mr.';} elseif($resQE['Gender']=='F' AND $resQE['Married']=='Y'){$ME='Mrs.';} elseif($resQE['Gender']=='F' AND $resQE['Married']=='N'){$ME='Miss.';}  $QEName=$ME.' '.$resQE['Fname'].' '.$resQE['Sname'].' '.$resQE['Lname']; 

   $sqlQR=mysqli_query($con,"select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID where e.EmployeeID=".$res['Level_2ID']);
$resQR=mysqli_fetch_assoc($sqlQR);  if($resQR['DR']=='Y'){$MR='Dr.';} elseif($resQR['Gender']=='M'){$MR='Mr.';} elseif($resQR['Gender']=='F' AND $resQR['Married']=='Y'){$MR='Mrs.';} elseif($resQR['Gender']=='F' AND $resQR['Married']=='N'){$MR='Miss.';}  $QRName=$MR.' '.$resQR['Fname'].' '.$resQR['Sname'].' '.$resQR['Lname'];

   $sqlQH=mysqli_query($con,"select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID where e.EmployeeID=".$res['Level_3ID']); 
$resQH=mysql_fetch_assoc($sqlQH);  if($resQH['DR']=='Y'){$MH='Dr.';} elseif($resQH['Gender']=='M'){$MH='Mr.';} elseif($resQH['Gender']=='F' AND $resQH['Married']=='Y'){$MH='Mrs.';} elseif($resQH['Gender']=='F' AND $resQH['Married']=='N'){$MH='Miss.';}  $QHName=$MH.' '.$resQH['Fname'].' '.$resQH['Sname'].' '.$resQH['Lname'];

$sqlQM=mysqli_query($con,"select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID where e.EmployeeID=".$res['Mngmt_ID']); 
$resQM=mysqli_fetch_assoc($sqlQM);  if($resQM['DR']=='Y'){$MM='Dr.';} elseif($resQM['Gender']=='M'){$MM='Mr.';} elseif($resQM['Gender']=='F' AND $resQM['Married']=='Y'){$MM='Mrs.';} elseif($resQM['Gender']=='F' AND $resQM['Married']=='N'){$MM='Miss.';}  $QMName=$MM.' '.$resQM['Fname'].' '.$resQM['Sname'].' '.$resQM['Lname'];
   
   $sqlMK2=mysqli_query($con,"select * from hrm_employee_querymail_key where QueryMailId=2 AND CompanyId=".$_REQUEST['comid']); $resMK2=mysqli_fetch_assoc($sqlMK2);
   
   //Self
   if($resE['EmailId_Vnr']!='' AND $resMK2['Employee']=='Y')
   {
	//$email_to = $resE['EmailId_Vnr'];
    //if($resE['EmailId_Vnr']==''){$email_from = $NameE;} else {$email_from=$resE['EmailId_Vnr'];}
	$email_subject = "Query Re-opened";  $semi_rand = md5(time()); 
	//$headers = "From: $email_from ". "\r\n";
    $email_message .= "Dear <b>".$name."</b> <br><br>\n\n\n";
    $email_message .= "We have recieved your re-opened query about Subject-<b>".$QS."</b> raised to Department-<b>".$resDD['DepartmentCode']."</b>.<br>";
	$email_message .= "We have forwarded the same to appropriate owner and a reply shall be sent soon within 3 working days.<br><br>\n\n\n";
	$email_message .= "From <br><b>ADMIN ESS</b><br>";
    //$ok = @mail($email_to, $email_subject, $email_message, $headers);
    
       $subject=$email_subject;
       $body=$email_message;
       $email_to=$resE['EmailId_Vnr'];
       require 'vendor/mail_admin.php';
    
   }
     
   
   //Query owner
   if($res['Level_1QStatus']==3 AND $resMK2['Leve_l']=='Y')
   { 
    //$email_to2 = $resQE['EmailId_Vnr'];
    //if($resE['EmailId_Vnr']==''){$email_from = $NameE;} else {$email_from=$resE['EmailId_Vnr'];}
	$email_subject2 = "Query Re-opened from ".$name;  $semi_rand = md5(time()); 
	//$headers2 = "From: $email_from ". "\r\n";
    $email_message2 .= "Dear <b>".$QEName."</b> <br><br>\n\n\n";
    $email_message2 .= $name." has re-opened the query on Subject-<b>".$QS."</b>, go to <b>ESS-QUERY</b> for more details <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.<br>"; 
	$email_message2 .= "You need to answer query in 3 working days after which it will get escalated to next level.<br><br>\n\n\n";
	$email_message2 .= "From <br><b>ADMIN ESS</b><br>";
    //$ok = @mail($email_to2, $email_subject2, $email_message2, $headers2);
    
       $subject=$email_subject2;
       $body=$email_message2;
       $email_to=$resQE['EmailId_Vnr'];
       require 'vendor/mail_admin.php';
    
   }
  
  elseif($res['Level_2QStatus']==3 AND $resMK2['Leve_2']=='Y')
  { 
    //$email_to2 = $resQR['EmailId_Vnr'];
    //if($resE['EmailId_Vnr']==''){$email_from2 = $NameE;} else {$email_from2=$resE['EmailId_Vnr'];}
	$email_subject2 = "Query Re-opened from ".$name;  $semi_rand = md5(time()); 
	//$headers2 = "From: $email_from2 ". "\r\n"; 
	
	//$headers2 .= "MIME-Version: 1.0\r\n";
    //$headers2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $email_message2 .= "Dear <b>".$QRName."</b> <br><br>\n\n\n";
    $email_message2 .= $name." has re-opened the query on Subject-<b>".$QS."</b>, go to <b>ESS-QUERY</b> for more details <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.<br>"; 
	$email_message2 .= "You need to answer query in 3 working days after which it will get escalated to next level.<br><br>\n\n\n";
	$email_message2 .= "From <br><b>ADMIN ESS</b><br>";
    //$ok = @mail($email_to2, $email_subject2, $email_message2, $headers2);
    
       $subject=$email_subject2;
       $body=$email_message2;
       $email_to=$resQR['EmailId_Vnr'];
       require 'vendor/mail_admin.php';
    
  }  
  
  elseif($res['Level_3QStatus']==3 AND $resMK2['Leve_3']=='Y')
  { 
    //$email_to2 = $resQH['EmailId_Vnr'];
    //if($resE['EmailId_Vnr']==''){$email_from2 = $NameE;} else {$email_from2=$resE['EmailId_Vnr'];}
	$email_subject2 = "Query Re-opened from ".$name;  $semi_rand = md5(time()); 
	//$headers2 = "From: $email_from2 ". "\r\n"; 
	
	//$headers2 .= "MIME-Version: 1.0\r\n";
    //$headers2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $email_message2 .= "Dear <b>".$QHName."</b> <br><br>\n\n\n";
    $email_message2 .= $name." has re-opened the query on Subject-<b>".$QS."</b>, go to <b>ESS-QUERY</b> for more details <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.<br>"; 
	$email_message2 .= "You need to answer query in 3 working days after which it will get escalated to next level.<br><br>\n\n\n";
	$email_message2 .= "From <br><b>ADMIN ESS</b><br>";
    //$ok = @mail($email_to2, $email_subject2, $email_message2, $headers2);
    
       $subject=$email_subject2;
       $body=$email_message2;
       $email_to=$resQH['EmailId_Vnr'];
       require 'vendor/mail_admin.php';
    
  }  
  
  elseif($res['Mngmt_QStatus']==3 AND $resMK2['Leve_4']=='Y')
  { 
    //$email_to2 = $resQM['EmailId_Vnr'];
    //if($resE['EmailId_Vnr']==''){$email_from2 = $NameE;} else {$email_from2=$resE['EmailId_Vnr'];}
	$email_subject2 = "Query Re-opened from ".$name;   
	//$headers2 = "From: $email_from2 ". "\r\n";
	//$headers2 .= "MIME-Version: 1.0\r\n";
    //$headers2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $email_message2 .= "Dear <b>".$QMName."</b> <br><br>\n\n\n";
    $email_message2 .= $name." has re-opened the query on Subject-<b>".$QS."</b>, go to <b>ESS-QUERY</b> for more details <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.<br>"; 
	$email_message2 .= "You need to answer query in 3 working days after which it will get escalated to next level.<br><br>\n\n\n";
	$email_message2 .= "From <br><b>ADMIN ESS</b><br>";
    //$ok = @mail($email_to2, $email_subject2, $email_message2, $headers2);
    
       $subject=$email_subject2;
       $body=$email_message2;
       $email_to=$resQM['EmailId_Vnr'];
       require 'vendor/mail_admin.php';
    
   }       
  
  if($SqlQU)
  { 
   echo json_encode(array("Code" => "300", "msg" => "Your query has been submitted!") ); 
  }
  else{ echo json_encode(array("Code" => "100", "msg" => "Error!") ); }
  
  /********************************/
  /********************************/
  
}




//Rating Rating Rating Rating Rating Rating
elseif($_REQUEST['value'] == 'Query_Rating' && $_REQUEST['QueryId']!='' && $_REQUEST['Rating']>0)
{
 $run_qry=mysqli_query($con, "update hrm_employee_queryemp set QueryStatus_Emp=3, EmpQRating=".$_REQUEST['Rating']." where QueryId=".$_REQUEST['QueryId']);
 if($run_qry)
 {
  echo json_encode(array("Code" => "300", "msg" => "Successfull") ); 
 }
 else{ echo json_encode(array("Code" => "100", "msg" => "Error!") ); }  
}




//Query Log Query LogQuery LogQuery LogQuery LogQuery LogQuery Log
elseif($_REQUEST['value'] == 'Query_Log' && $_REQUEST['empid']!='' && $_REQUEST['QuerySts']!='' && $_REQUEST['RaisedBy']!='' && $_REQUEST['QValue']!='' && $_REQUEST['QDate']!='' && $_REQUEST['ClsDate']!='' && $_REQUEST['QRmk']!='')
{
 if($_REQUEST['QuerySts']=='Closed'){$ClosedDate=date("Y-m-d",strtotime($_REQUEST['ClsDate']));}
 elseif($_REQUEST['QuerySts']=='Open'){$ClosedDate='0000-00-00';}

 $run_qry=mysqli_query($con, "insert into hrm_employee_querylog(EmployeeID, Query, QueryLogDate, Status, ClosedDate, Reason_NonClosed, Emp_CreatedBy, Emp_CreatedDate)values(".$_REQUEST['RaisedBy'].", '".$_REQUEST['QValue']."', '".date("Y-m-d",strtotime($_REQUEST['QDate']))."', '".$_REQUEST['QuerySts']."', '".$ClosedDate."', '".$_REQUEST['QRmk']."', ".$_REQUEST['empid'].", '".date("Y-m-d")."')");
 if($run_qry)
 {
  echo json_encode(array("Code" => "300", "msg" => "Query Saved Successfully!") ); 
 }
 else{ echo json_encode(array("Code" => "100", "msg" => "Error!") ); }  
}



//QueryLog List QueryLog List QueryLog List QueryLog List
elseif($_REQUEST['value'] == 'QueryLog_List' && $_REQUEST['empid']>0)
{  
    
 $subQ='1=1';   
 if($_REQUEST['year']>0)
 { 
  $y=$_REQUEST['year'];
  $subQ="QueryLogDate>='".date($y."-01-01")."' AND QueryLogDate<='".date($y."-12-31")."'"; 
 }	    
 $run_qry=mysqli_query($con,"select Fname,Sname,Lname,q.* from hrm_employee_querylog q inner join hrm_employee e on q.EmployeeID=e.EmployeeID where q.Emp_CreatedBy=".$_REQUEST['empid']." AND ".$subQ." order by QueryLogDate DESC");
 $num=mysqli_num_rows($run_qry); $QLarray = array();
 if($num>0)
 {
  while($res=mysqli_fetch_assoc($run_qry)){ $QLarray[]=$res; }
  echo json_encode(array("Code" => "300", "MyQueryLoglist" => $QLarray) ); 
 }
 else{ echo json_encode(array("Code" => "100", "msg" => "Data Not Found!") ); }  
}



//QueryLog Employee List QueryLog Employee List QueryLog Employee List 
elseif($_REQUEST['value'] == 'QueryEmp_List' && $_REQUEST['comid']>0)
{  
    
 $run_qry=mysqli_query($con,"select e.EmployeeID,Fname,Sname,Lname from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_employee_personal p on e.EmployeeID=p.EmployeeID where e.EmpStatus='A' and e.CompanyId=".$_REQUEST['comid']." order by Fname ASC");
 $num=mysqli_num_rows($run_qry); $EmpLarray = array();
 if($num>0)
 {
  while($res=mysqli_fetch_assoc($run_qry)){ $EmpLarray[]=$res; }
  echo json_encode(array("Code" => "300", "EmpList" => $EmpLarray) ); 
 }
 else{ echo json_encode(array("Code" => "100", "msg" => "Data Not Found!") ); }  
}



//Query Log Delete Query Log Delete Query Log Delete Query Log Delete
elseif($_REQUEST['value'] == 'QueryLog_Delete' && $_REQUEST['empid']!='' && $_REQUEST['QueryId']!='')
{

 $run_qry=mysqli_query($con, "delete from hrm_employee_querylog where QueryLogId =".$_REQUEST['QueryId']);
 if($run_qry)
 {
  echo json_encode(array("Code" => "300", "msg" => "Query Log Deleted Successfully!") ); 
 }
 else{ echo json_encode(array("Code" => "100", "msg" => "Error!") ); }  
}





//Query Delete Query Delete Query Delete Query Delete
elseif($_REQUEST['value'] == 'Query_Delete' && $_REQUEST['empid']!='' && $_REQUEST['QueryId']!='')
{

 $run_qry=mysqli_query($con, "delete from hrm_employee_queryemp where QueryId =".$_REQUEST['QueryId']);
 if($run_qry)
 {
     
  $sqlR=mysqli_query($con,"select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr,tokenid,tokenid_ios from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_personal p ON g.EmployeeID=p.EmployeeID where g.EmployeeID=".$_REQUEST['empid']); $resR=mysqli_fetch_assoc($sqlR); 
    if($resR['DR']=='Y'){$M2='Dr.';} elseif($resR['Gender']=='M'){$M2='Mr.';} elseif($resR['Gender']=='F' AND $resR['Married']=='Y'){$M2='Mrs.';} elseif($resR['Gender']=='F' AND $resR['Married']=='N'){$M2='Miss.';}  
	$RName=$M2.' '.$resR['Fname'].' '.$resR['Sname'].' '.$resR['Lname'];
	
  //$email_toHR = 'vspl.hr@vnrseeds.com';
  $email_subjectHR = $RName." deleted the query";   
  //$headersHR = "From: $email_fromHR ". "\r\n";
  //$headersHR .= "MIME-Version: 1.0\r\n";
  //$headersHR .= "Content-type: text/html; charset=ISO-8859-1\r\n";
  $email_messageHR .="<html><head></head><body>";
  $email_messageHR .= $RName." deleted the raised query.<br>"; 
  $email_messageHR .= "From <br><b>ADMIN ESS</b><br>";
  $email_messageHR .="</body></html>";	
  //$ok = @mail($email_toHR, $email_subjectHR, $email_messageHR, $headersHR);  
  
       $subject=$email_subjectHR;
       $body=$email_messageHR;
       $email_to='vspl.hr@vnrseeds.com';
       require 'vendor/mail_admin.php';
     
  echo json_encode(array("Code" => "300", "msg" => "Query Deleted Successfully!") ); 
 }
 else{ echo json_encode(array("Code" => "100", "msg" => "Error!") ); }  
}









