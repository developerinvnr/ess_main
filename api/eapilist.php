<?php 
require_once('../AdminUser/config/config.php');


 if($_REQUEST['value'] == ''){ echo json_encode(array("msg" => "Parameter Missing!") ); }
 
 /******************************* Attendance Open *************************************/
 /******************************* Attendance Open *************************************/
 elseif($_REQUEST['value'] == 'upempatted')
 {
   if($_REQUEST['empcode']!='' AND $_REQUEST['empcom']!='' AND $_REQUEST['attvalue']!='' AND $_REQUEST['attdate']!='')
   {
    
	$ec=$_REQUEST['empcode'];
	$com=$_REQUEST['empcom'];
	$attv=$_REQUEST['attvalue'];
	$attd=date("Y-m-d",strtotime($_REQUEST['attdate']));
	
	$sY=mysql_query("select YearId from hrm_year where Company".$com."Status='A'", $con);
	$rY=mysql_fetch_assoc($sY);
	
	$sqlE=mysql_query("select EmployeeID from hrm_employee where EmpCode=".$ec." AND CompanyId=".$com, $con); 
	$rowE=mysql_num_rows($sqlE); $resE=mysql_fetch_assoc($sqlE); 
	
	if($rowE>0)
    {
	
	  $sql=mysql_query("select Leave_Type,LeaveStatus from hrm_employee_applyleave WHERE EmployeeID=".$resE['EmployeeID']." AND ('".$attd."'>=Apply_FromDate AND '".$attd."'<=Apply_ToDate) AND LeaveStatus!=3 AND LeaveCancelStatus!='Y'", $con); 
	  $row=mysql_num_rows($sql);
	 
	  if($row==0)
      {
	   if($attv=='A' OR $attv=='P' OR $attv=='OD' OR $attv=='WFH') 
       {
	    
		/*************************/
		$sql2=mysql_query("select * from hrm_employee_attendance WHERE EmployeeID=".$resE['EmployeeID']." AND AttDate='".$attd."'", $con); $row2=mysql_num_rows($sql2);
	     
		if($row2>0)
	    { 
		 $res2=mysql_fetch_assoc($sql2); 
		 if($res2['AttValue']!='CL' AND $res2['AttValue']!='CH' AND $res2['AttValue']!='SL' AND $res2['AttValue']!='SH' AND $res2['AttValue']!='PL' AND $res2['AttValue']!='PH' AND $res2['AttValue']!='EL' AND $res2['AttValue']!='FL' AND $res2['AttValue']!='TL')
		 { 
		  $sqlUp=mysql_query("update hrm_employee_attendance set AttValue='".$attv."' WHERE EmployeeID=".$resE['EmployeeID']." AND AttDate='".$attd."'", $con); 
		 } 
	    } //if($row2>0)
	   
	    elseif($row2==0 AND date("w",strtotime($attd))!=0)	
	    {      
	     $sqlUp = mysql_query("insert into hrm_employee_attendance(EmployeeID, AttValue, AttDate, Year, YearId) values(".$resE['EmployeeID'].",'".$attv."', '".$attd."', '".date("Y")."', ".$rY['YearId'].")", $con); 
	    } //elseif($row2==0 AND date("w",strtotime($attd))!=0)
		else{ echo json_encode(array("success" => "Error", "response" => "Please check your date!") ); }
		
		if($sqlUp)
		{
		  echo json_encode(array("success" => "True", "response" => "Attendance sent successfully!") ); 
		}
		
		/*************************/
		
	   } //if($attv=='A' OR $attv=='P' OR $attv=='OD' OR $attv=='WFH')
	   else{ echo json_encode(array("success" => "Error", "response" => "Apply only A, P, OD or WFH!") ); }
	   
      } //if($row==0)
	  else{ echo json_encode(array("success" => "Error", "response" => "You have already applied leave on this day!") ); }
	
    }
	//if($rowE>0)
	 
   }
   //if($_REQUEST['empcode']!='' AND $_REQUEST['empcom']!='' AND $_REQUEST['attvalue']!='' AND $_REQUEST['attdate']!='')
   
 
 }
 /******************************* Attendance Close *************************************/
 /******************************* Attendance Close *************************************/
 
 
 elseif($_REQUEST['value'] == 'userlist')
 {
   
   $run_qry=mysql_query("select e.EmpCode,e.Fname,e.Sname,e.Lname, d.DepartmentId,d.DepartmentName,de.DesigId,de.DesigName, EmailId_Vnr as EmailId, MobileNo_Vnr as MobileNo from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId inner join hrm_designation de on g.DesigId=de.DesigId where e.CompanyId=1 and e.EmpStatus='A' order by e.EmpCode asc");
   $num=mysql_num_rows($run_qry);
   if($num>0)
   {
     while($res=mysql_fetch_assoc($run_qry)){ $farray[]=$res; }
     echo json_encode(array("user_list" => $farray) ); 
   }
   else{ echo json_encode(array("msg" => "Invalid value for user!") ); }  
 
 }
 
