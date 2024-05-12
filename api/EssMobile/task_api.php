<?php
header('Content-Type: application/json'); 
//error_reporting(E_ALL);
//ini_set('display_errors', '1');

$con=mysqli_connect('localhost','hrims_user','hrims@192');
if(!$con) die("Failed to connect to database!");
$db=mysqli_select_db( $con, 'hrims');
if(!$db) die("Failed to select database!");
date_default_timezone_set('Asia/Calcutta');


if($_REQUEST['value']=='')
{ 
    echo json_encode(array("msg" => "Parameter Missing!") ); 
    
}


//Department
elseif($_REQUEST['value']=='get_dept' && $_REQUEST['empid']>0 && $_REQUEST['comid']>0)
{
 
 $sql=mysqli_query($con,"select DepartmentId,DepartmentCode,DepartmentName from hrm_department where DeptStatus='A' AND CompanyId=".$_REQUEST['comid']." order by DepartmentCode ASC");
 $num=mysqli_num_rows($sql); $DeptList = array();
 if($num>0)
 {
  while($res=mysqli_fetch_assoc($sql)){ 
      $DeptList[]=$res; 
  }
  
  echo json_encode(array("Code" => "300", "Dept_List" => $DeptList) ); 
 }
 else{ echo json_encode(array("Code" => "100", "msg" => "Data Not Found!") ); } 
 
}



//Department_Emp
elseif($_REQUEST['value']=='get_deptemp' && $_REQUEST['deptid']>0)
{
 
 $sql=mysqli_query($con,"select e.EmployeeID as empid,EmpCode,Fname,Sname,Lname from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where g.DepartmentId=".$_REQUEST['deptid']." AND e.EmpStatus='A' order by e.Fname ASC");
 $num=mysqli_num_rows($sql); $EmpList = array();
 if($num>0)
 {
  while($res=mysqli_fetch_assoc($sql)){ $EmpList[]=$res; }
  echo json_encode(array("Code" => "300", "Emp_List" => $EmpList) ); 
 }
 else{ echo json_encode(array("Code" => "100", "msg" => "Data Not Found!") ); } 
 
}


//New Task
elseif($_REQUEST['value']=='new_task' && $_REQUEST['empid']>0 && $_REQUEST['title']!='' && $_REQUEST['tdate']!='' && $_REQUEST['ttime']!='' && $_REQUEST['remark']!='' && $_REQUEST['emp_list']!='')
{ 
    
 $sMx=mysqli_query($con,"select MAX(TaskId) as MaxID from hrm_api_task"); 
 $rMx=mysqli_fetch_assoc($sMx);
 $NxtId=$rMx['MaxID']+1;
 
 $sqlIns=mysqli_query($con,"insert into hrm_api_task(TaskId, CrEmpId, DateTime, Title, Remark, SysDate) values(".$NxtId.", ".$_REQUEST['empid'].", '".date("Y-m-d",strtotime($_REQUEST['tdate']))." ".date("H:i:s",strtotime($_REQUEST['ttime']))."', '".$_REQUEST['title']."', '".addslashes($_REQUEST['remark'])."', '".date("Y-m-d")."')");
 
 $emp_list = json_decode($_REQUEST['emp_list'], true);
 
 $tempArr = array_unique(array_column($emp_list, 'empid'));
 $new_list = (array_intersect_key($emp_list, $tempArr));

 $flag = 0;

 foreach($new_list as $lst_arr) {
   $sqlIns=mysqli_query($con,"insert into hrm_api_task_team(TaskId, EmpId, SysDate) values(".$NxtId.", ".$lst_arr['empid'].", '".date("Y-m-d")."')");
   $flag=1;
 }    
 
 if($flag==1){ echo json_encode(
     array("Code" => "300", "msg" => "task inserted successfully") );  
 }
 else{ 
     echo json_encode(array("Code" => "100", "msg" => "Error..") );  
 }
}
  
 

//Update Task
elseif($_REQUEST['value']=='update_task' && $_REQUEST['empid']>0 && $_REQUEST['title']!='' && $_REQUEST['tdate']!='' && $_REQUEST['ttime']!='' && $_REQUEST['remark']!='' && $_REQUEST['emp_list']!='' && $_REQUEST['TaskId']>0)
{ 
 
 $sqlIns=mysqli_query($con,"update hrm_api_task set DateTime='".date("Y-m-d",strtotime($_REQUEST['tdate']))." ".date("H:i:s",strtotime($_REQUEST['ttime']))."', Title='".$_REQUEST['title']."', Remark='".addslashes($_REQUEST['remark'])."', SysDate='".date("Y-m-d")."' where TaskId=".$_REQUEST['TaskId']." AND CrEmpId=".$_REQUEST['empid']);
 
 $del=mysqli_query($con,"delete from hrm_api_task_team where TaskId=".$_REQUEST['TaskId']);
 if($del)
 {
  
  $emp_list = json_decode($_REQUEST['emp_list'], true);
 
    $tempArr = array_unique(array_column($emp_list, 'empid'));
    $new_list = (array_intersect_key($emp_list, $tempArr));
  

  foreach($new_list as $lst_arr)
  {
   $sqlIns=mysqli_query($con,"insert into hrm_api_task_team(TaskId, EmpId, SysDate) values(".$_REQUEST['TaskId'].", ".$lst_arr['empid'].", '".date("Y-m-d")."')");
  }
 }     
 
 if($sqlIns){ echo json_encode(array("Code" => "300", "msg" => "task updated successfully") );  }
 else{ echo json_encode(array("Code" => "100", "msg" => "Error..") );  }

}



//Delete Task
elseif($_REQUEST['value']=='task_delete' && $_REQUEST['empid']>0 && $_REQUEST['TaskId']>0){
    
 $sql=mysqli_query($con,"select * from hrm_api_task where TaskId=".$_REQUEST['TaskId']." AND CrEmpId=".$_REQUEST['empid']);
 if(mysqli_num_rows($sql)){
    $del=mysqli_query($con,"delete from hrm_api_task_team where TaskId=".$_REQUEST['TaskId']);
    if($del){
      $del=mysqli_query($con,"delete from hrm_api_task where TaskId=".$_REQUEST['TaskId']);
      
      echo json_encode(array('Code'=>"300",'msg'=>'Task deleted.'));
    } else {
        echo json_encode(array('Code'=>"500",'msg'=>'Task not deleted.'));
    }    
 } else {
     echo json_encode(array('Code'=>"404",'msg'=>'Task not found.'));
 }
}



//Task_Report
elseif($_REQUEST['value'] == 'task_report' && $_REQUEST['empid']>0 && $_REQUEST['month']>0 && $_REQUEST['year']>0)
{

  $from_date = $_REQUEST['year'].'-'.str_pad($_REQUEST['month'],2,"0",STR_PAD_LEFT).'-'.'01';
  $to_date = date("Y-m-t", strtotime($from_date) );
  
  $sql=mysqli_query($con,"select TaskId,Title,CAST(DateTime as DATE) as DateTime from hrm_api_task where TaskId in (SELECT DISTINCT(TaskId) FROM `hrm_api_task_team` WHERE EmpId = '".$_REQUEST['empid']."') AND CAST(DateTime as DATE) >= '".$from_date."' AND CAST(DateTime as DATE) <='".$to_date."'  order by DateTime DESC");
  $num=mysqli_num_rows($sql); $DeptList = array();
  if($num>0)
  {
      
  while($res=mysqli_fetch_assoc($sql))
  {  
//     $sT=mysqli_query($con,"select t.TaskId,t.Title,t.DateTime, concat_ws(' ',Fname,Sname,Lname) as name from hrm_api_task_team where TaskId=".$res['TaskId']." order by Fname ASC");
// 	$team_list = array(); 
// 	while($resT=mysqli_fetch_assoc($sT)){ 
// 	    $team_list[]=$resT; 
// 	}
	
// 	$res['team_details']=$team_list;
	$TaskList[]=$res;
  }
  
  echo json_encode(array("Code" => "300", "Task_List" => $TaskList) ); 
 }
 else{ echo json_encode(array("Code" => "100", "msg" => "Data Not Found!") ); }
}  

elseif($_REQUEST['value'] == 'task_detail' && $_REQUEST['task_id']>0){
    $task_detail = array();
    $task_participants = array();
    
    $sql=mysqli_query($con,"select * from hrm_api_task where TaskId = ".$_REQUEST['task_id']);
    
    if(mysqli_num_rows($sql) > 0){
        $task_detail= mysqli_fetch_assoc($sql);
        $task_detail['time'] = date('h:i a',strtotime($task_detail['DateTime']));
         
        $sql=mysqli_query($con,"select t.TeamId,t.EmpId,t.EmpId as empid,t.SysDate,e.EmpCode,e.Fname,e.Sname,e.Lname, CONCAT(e.Fname,' ',e.Sname,' ',e.Lname) as fullname from hrm_api_task_team t join hrm_employee e on e.EmployeeID = t.EmpId where t.TaskId = ".$_REQUEST['task_id']); 
        if(mysqli_num_rows($sql) > 1){    
            $res = array();
            while($res=mysqli_fetch_assoc($sql)){  
    	        $task_participants[]=$res;
            }
            $task_detail['task_participants'] = $task_participants;
            echo json_encode(array('Code'=>'300','msg'=>'Task Detail','TaskId'=>$task_detail['TaskId'],'CrEmpId'=>$task_detail['CrEmpId'],'DateTime'=>$task_detail['DateTime'],'Title'=>$task_detail['Title'],'Remark'=>$task_detail['Remark'],'SysDate'=>$task_detail['SysDate'],'task_participants'=>$task_detail['task_participants'],'time'=>date('h:i a',strtotime($task_detail['DateTime'])),'data'=>$task_detail));
        } else {
            echo json_encode(array('Code'=>'300','msg'=>'No participant found','TaskId'=>$task_detail['TaskId'],'CrEmpId'=>$task_detail['CrEmpId'],'DateTime'=>$task_detail['DateTime'],'Title'=>$task_detail['Title'],'Remark'=>$task_detail['Remark'],'SysDate'=>$task_detail['SysDate'],'time'=>date('h:i a',strtotime($task_detail['DateTime'])),'task_participants'=>'','data'=>$task_detail));
        }   
    } else {
        echo json_encode(array('Code'=>'501','msg'=>'Task not found.'));
    }
    
}

  
?>