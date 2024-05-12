<?php
require_once('config/config.php');

if($_POST['For']=='ChkUseApps' && $_POST['Eid']!='' && $_POST['vv']!='' && $_POST['n']!='')
{ 
  if($_POST['n']==1){ $qry="UseApps='".$_POST['vv']."'";}elseif($_POST['n']==2){ $qry="UseApps_Punch='".$_POST['vv']."'";}
  $Du=mysql_query("update hrm_employee set ".$qry." where EmployeeID=".$_POST['Eid'],$con); 
  if($Du){ echo '<input type="hidden"  id="ChkV" value="1"  />'; }else{echo '<input type="hidden"  id="ChkV" value="0"  />'; }
  echo '<input type="hidden"  id="ChkVEmp" value='.$_POST['Eid'].'  />';
  echo '<input type="hidden"  id="ChkVvv" value='.$_POST['vv'].'  />';
  echo '<input type="hidden"  id="nn" value='.$_POST['n'].'  />';
}



elseif($_POST['For']=='ChkUsePunch' && $_POST['Did']!='' && $_POST['vv']!='')
{ 
  $Su=mysql_query("select * from hrm_api_punch_department where DepartmentId=".$_POST['Did'],$con);
  $rowU=mysql_num_rows($Su);
  if($rowU>0){ $Du=mysql_query("update hrm_api_punch_department set Sts='".$_POST['vv']."' where DepartmentId=".$_POST['Did'],$con); }else{ $Du=mysql_query("insert into hrm_api_punch_department(DepartmentId, Sts, CrDate) values(".$_POST['Did'].", '".$_POST['vv']."', '".date("Y-m-d")."')", $con); }
  
  if($Du)
  { echo '<input type="hidden"  id="ChkV" value="1"  />'; }
  else{echo '<input type="hidden"  id="ChkV" value="0"  />'; }
  echo '<input type="hidden"  id="ChkVDept" value='.$_POST['Did'].'  />';
  echo '<input type="hidden"  id="ChkVvv" value='.$_POST['vv'].'  />';
}


elseif($_POST['For']=='ChkGps_Tracking' && $_POST['Did']!='' && $_POST['vv']!='')
{ 
  $Su=mysql_query("select * from hrm_api_punch_department where DepartmentId=".$_POST['Did'],$con);
  $rowU=mysql_num_rows($Su);
  if($rowU>0){ $Du=mysql_query("update hrm_api_punch_department set Gps_Tracking='".$_POST['vv']."' where DepartmentId=".$_POST['Did'],$con); }else{ $Du=mysql_query("insert into hrm_api_punch_department(DepartmentId, Gps_Tracking, CrDate) values(".$_POST['Did'].", '".$_POST['vv']."', '".date("Y-m-d")."')", $con); }
  
  if($Du)
  { echo '<input type="hidden"  id="ChkV" value="1"  />'; }
  else{echo '<input type="hidden"  id="ChkV" value="0"  />'; }
  echo '<input type="hidden"  id="ChkVDept" value='.$_POST['Did'].'  />';
  echo '<input type="hidden"  id="ChkVvv" value='.$_POST['vv'].'  />';
}



elseif($_POST['For']=='ChkUseGps_Tracking' && $_POST['eid']!='' && $_POST['vv']!='')
{ 
  $Du=mysql_query("update hrm_employee set UseApps_GpsTracking='".$_POST['vv']."' where EmployeeID=".$_POST['eid'],$con); 
  
  if($Du)
  { echo '<input type="hidden"  id="ChkV" value="1"  />'; }
  else{echo '<input type="hidden"  id="ChkV" value="0"  />'; }
  echo '<input type="hidden"  id="ChkVDept" value='.$_POST['eid'].'  />';
  echo '<input type="hidden"  id="ChkVvv" value='.$_POST['vv'].'  />';
}


elseif($_POST['For']=='ChkInTime' && $_POST['Did']!='' && $_POST['vv']!='')
{ 
  $Su=mysql_query("select * from hrm_api_punch_department where DepartmentId=".$_POST['Did'],$con);
  $rowU=mysql_num_rows($Su);
  if($rowU>0){ $Du=mysql_query("update hrm_api_punch_department set InTime='".$_POST['vv']."' where DepartmentId=".$_POST['Did'],$con); }else{ $Du=mysql_query("insert into hrm_api_punch_department(DepartmentId, Sts, InTime, CrDate) values(".$_POST['Did'].", 'N', '".$_POST['vv']."', '".date("Y-m-d")."')", $con); }
  
  if($Du)
  { echo '<input type="hidden"  id="ChkV" value="1"  />'; }
  else{echo '<input type="hidden"  id="ChkV" value="0"  />'; }
  echo '<input type="hidden"  id="ChkVDept" value='.$_POST['Did'].'  />';
  echo '<input type="hidden"  id="ChkVvv" value='.$_POST['vv'].'  />';
}



elseif($_POST['For']=='UpVersionPunchTime' && $_POST['VR']!='' && $_POST['PT']!='' && $_POST['ST']!='' && $_POST['SIKS']!='' && $_POST['SIKE']!='')
{ 
  $DP=mysql_query("update hrm_api_punch_time set InTime='".$_POST['PT']."' where CompanyId=".$_POST['C'],$con); 
  
  $DV=mysql_query("update hrm_api_version set VersionD='".$_POST['VR']."', Apps_Link='".$_POST['Lnk']."', Sink_Interval='".$_POST['ST']."', SinkTime_Start='".$_POST['SIKS']."', SinkTime_end='".$_POST['SIKE']."' where CompanyId=".$_POST['C']."",$con);
  
  if($DP OR $DV){ echo '<input type="hidden"  id="ChkV" value="1"  />'; }
  else{echo '<input type="hidden"  id="ChkV" value="0"  />'; }
  
}



elseif($_POST['For']=='ChkUseTools' && $_POST['id']!='' && $_POST['n']!='' && $_POST['vv']!='')
{ 
  $DP=mysql_query("update hrm_api_toolperm set Permission='".$_POST['vv']."' where ToolId=".$_POST['id'],$con); 
  if($DP){ echo '<input type="hidden"  id="ChkV" value="1"  />'; }
  else{echo '<input type="hidden"  id="ChkV" value="0"  />'; }
  
  echo '<input type="hidden"  id="ChkVID" value='.$_POST['id'].'  />';
  echo '<input type="hidden"  id="ChkVvv" value='.$_POST['vv'].'  />';
}


?>
