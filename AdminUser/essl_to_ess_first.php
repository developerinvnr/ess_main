<?php
$con=mysqli_connect('localhost','hrims_user','hrims@192');
if(!$con) die("Failed to connect to database!");
$db=mysqli_select_db( $con, 'hrims');
if(!$db) die("Failed to select database!");

$OldDate=date("d-m-Y",strtotime('-1 day', strtotime(date("Y-m-d"))));
//$OldDate=date("10-11-2023");
$json = file_get_contents('http://45.124.144.98:6868/essl/attendance/date/'.date("d-m-Y"));
$obj = json_decode($json);

foreach($obj->data as $key =>$value)
{
   
 if($value->CompanySName=='VSPL' || $value->CompanySName=='VNPL' || $value->CompanySName=='Farm Division')
 {  
 
   $ec=$value->UserId;
   $date=date("Y-m-d",strtotime($value->attendanceDate));
   $y=date("Y",strtotime($date));
   $m=intval(date("m",strtotime($date)));
   $mm=date("m",strtotime($date));
   $c10=date("H:i:00",strtotime($value->inTime));         //inTime
   $c11=date("H:i:00",strtotime($value->outTime));        //outTime
   $diff=$value->MinuteDiff;
   $com=trim($value->CompanySName); //VSPL VVNR VNPL
   
   if($diff==0){ $c11='00:00:00'; }
   
   $mkdate = mktime(0,0,0, $m, 1, $y);
   $nodinm = date('t',$mkdate);  //Number of days in the given month (28-31)
   $dv=''; $comid=0; $YearId=0;
   if($com=='VSPL'){$comid=1;}
   elseif($com=='Farm Division'){$comid=2;}
   elseif($com=='VNPL'){$comid=3;}
   
   $sY=mysqli_query($con,"select YearId from hrm_year where Company".$comid."Status='A'"); 
   $rY=mysqli_fetch_assoc($sY); $YearId=$rY['YearId'];
   
   if($comid==3 OR $comid==2){ $condn="EsslCode=".$ec; }else{ $condn="EmpCode=".$ec; }
   
   $sE=mysqli_query($con,"select EmployeeID, TimeApply, InTime, OutTime from hrm_employee where ".$condn." AND CompanyId=".$comid); $rowE=mysqli_num_rows($sE); 
   if($rowE>0)
   {
    $rE=mysqli_fetch_assoc($sE); 
	$ei=$rE['EmployeeID'];
	
	if($rE['TimeApply']=='Y' AND (($c10!='' AND $c10!='00:00' AND $c10!='00:00:00') OR ($c11!='' AND $c11!='00:00' AND $c11!='00:00:00')))
	{
	  
/********************************* OPEN ******************************************/
/********************************* OPEN ******************************************/

//$dv = intval(date("d",strtotime($date)));
$dv = date("d",strtotime($date));

$chk=mysqli_query($con,"select * from hrm_employee_attendance WHERE EmployeeID=".$ei." AND AttDate='".$y."-".$mm."-".$dv."'");$rowchk=mysqli_num_rows($chk);
if($rowchk>0)
{ 
 $Up=mysqli_query($con,"update hrm_employee_attendance set Inn='".$c10."' WHERE EmployeeID=".$ei." AND AttDate='".$y."-".$mm."-".$dv."'");
} 
elseif($rowchk==0)
{
 $Up = mysqli_query($con,"insert into hrm_employee_attendance(EmployeeID, AttDate, Year, YearId, Inn) values(".$ei.", '".$y."-".$mm."-".$dv."', '".$y."', ".$YearId.", '".$c10."')");
}
 	
/********************************* CLOSE *****************************************/
/********************************* CLOSE *****************************************/	  
	  
	 	  
	} //if($rE['TimeApply']=='Y')
   
   } //if($rowE>0)
   
 
 } //if($value->CompanySName=='VSPL' || $value->CompanySName=='VNPL')
 
}



/*************** For Notification Punch Missed ****/
/*************** For Notification Punch Missed ****/
date_default_timezone_set('Asia/Calcutta');
$sTd=mysqli_query($con,"select DepartmentId,InTime from hrm_api_punch_department where Sts='Y'");
while($resTd=mysqli_fetch_assoc($sTd)) 
{
  
 if($resTd['InTime']<=date("H:i:s") && date("w",strtotime(date("Y-m-d")))!=0)
 {
  $sqlE=mysqli_query($con,"select e.EmployeeID,Fname,Sname,Lname,tokenid from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID where g.DepartmentId=".$resTd['DepartmentId']); 
  
  //g.DepartmentId=".$resTd['DepartmentId']
  //echo $rE['tokenid'].' - '.$rE['EmployeeID'];
  
  $rE=mysqli_fetch_assoc($sqlE);
  if($rE['EmployeeID']>0 && $rE['tokenid']!='')
  {
  
   /********************************/
   $sch1=mysqli_query($con,"select * from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$rE['EmployeeID']." AND Apply_Date>='".date("Y-m-d")."' AND Apply_Date<='".date("Y-m-d")."'"); $rch1=mysqli_num_rows($sch1); 
   $sch2=mysqli_query($con,"select * from hrm_employee_attendance where EmployeeID=".$rE['EmployeeID']." AND AttDate>='".date("Y-m-d")."' AND AttDate<='".date("Y-m-d")."' AND AttValue!=''"); $rch2=mysqli_num_rows($sch2); 
   $sch3=mysqli_query($con,"select * from hrm_employee_attendance_req where EmployeeID=".$rE['EmployeeID']." AND AttDate='".date("Y-m-d")."' "); $rch3=mysqli_num_rows($sch3);
        
   if(date("w",strtotime(date("Y-m-d")))!=0 && $rch1==0 && $rch2==0 && $rch3==0)
   {	 
     $sql=mysqli_query($con,"select MorEveDate from hrm_employee_moreve_reports_".date("Y")." where EmployeeID=".$rE['EmployeeID']." AND MorEveDate='".date("Y-m-d")."' AND MorReports!=''"); $row=mysqli_num_rows($sql);
     if($row==0)
	 {  
	  
/* --------------------------- */
/* --------------------------- */

$serverKey = "AAAAM2Omfpk:APA91bF7xuwVbmJKmyObP4VbBL0QKyAB1XtoOZBdUzj4Yc8BwH5tyEmVvtlzOs8PWi6lYstd5BViG8NhHAXtH4uTtNOD2KCO6katfNXbuDd2B2eFtPxGWtSwcLuzHahiZA-H7LpSCFi4";



$title = 'Missed Punch-In';
$body = 'You have missed punching your attendance today('.date("d-m-Y").'). Apply for attendance authorization';
$url = "https://fcm.googleapis.com/fcm/send";

$notification = array('title' =>$title , 'body' => $body, 'sound' => 'default', 'badge' => '1');


$to=$rE['tokenid'];
if($to!='')
{
      
   $arrayToSend = array('to' => $to, 'notification' => $notification, 'priority'=>'high', 'content_available' => true);
   $json = json_encode($arrayToSend);
   $headers = array();
   $headers[] = 'Content-Type: application/json';
   $headers[] = 'Authorization: key='.$serverKey;
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $url);
   curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
   curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
   curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
   $response = curl_exec($ch);
   if($response === FALSE){ die('FCM Send Error: ' . curl_error($ch)); }
   curl_close($ch);
}
/* --------------------------- */
/* --------------------------- */
	 
	 } 
   }
   /********************************/
  
  }
  
 } //if($resTd['InTime']<=date("H:i:s"))

} 
 
/*************** For Notification Punch Missed Closed ****/
/*************** For Notification Punch Missed Closed ****/


?>