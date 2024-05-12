<?php
$con=mysqli_connect('localhost','vnrseed2_hr','vnrhrims321');
if(!$con) die("Failed to connect to database!");
$db=mysqli_select_db( $con, 'vnrseed2_hrims');
if(!$db) die("Failed to select database!");

$OldDate=date("d-m-Y",strtotime('-1 day', strtotime(date("Y-m-d"))));
$json = file_get_contents('http://45.124.144.98:6868/essl/attendance/date/'.date("d-m-Y"));
$obj = json_decode($json);

foreach($obj->data as $key =>$value)
{
   
 if($value->CompanySName=='VSPL' || $value->CompanySName=='VNPL')
 {  
 
   $ec=$value->UserId;
   $date=date("Y-m-d",strtotime($value->attendanceDate));
   $y=date("Y",strtotime($date));
   $m=intval(date("m",strtotime($date)));
   $mm=date("m",strtotime($date));
   $c10=date("H:i:00",strtotime($value->inTime));         //inTime
   $c11=date("H:i:00",strtotime($value->outTime));        //outTime
   $diff=$value->MinuteDiff;
   $com=$value->CompanySName; //VSPL VVNR VNPL
   
   if($diff==0){ $c11='00:00:00'; }
   
   $mkdate = mktime(0,0,0, $m, 1, $y);
   $nodinm = date('t',$mkdate);  //Number of days in the given month (28-31)
   $dv=''; $comid=0; $YearId=0;
   if($com=='VSPL'){$comid=1;}elseif($com=='VNPL'){$comid=3;}
   
   $sY=mysqli_query($con,"select YearId from hrm_year where Company".$comid."Status='A'"); 
   $rY=mysqli_fetch_assoc($sY); $YearId=$rY['YearId'];
   
   if($comid==3){ $condn="EsslCode=".$ec; }else{ $condn="EmpCode=".$ec; }
   
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


?>