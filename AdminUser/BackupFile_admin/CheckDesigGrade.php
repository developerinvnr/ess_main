<?php
require_once('config/config.php');
if(isset($_POST['did']) && $_POST['gid']!="")
{ 
  $sql=mysql_query("select * from hrm_deptgradedesig where DepartmentId=".$_POST['dptId']." AND DesigId=".$_POST['did'], $con); $res=mysql_fetch_assoc($sql); 
  if($res['GradeId']==$_POST['gid'])
  {$sqlU=mysql_query("Update hrm_deptgradedesig SET GradeId=0 where DepartmentId=".$_POST['dptId']." AND DesigId=".$_POST['did'], $con);}
  elseif($res['GradeId_2']==$_POST['gid'])
  {$sqlU=mysql_query("Update hrm_deptgradedesig SET GradeId_2=0 where DepartmentId=".$_POST['dptId']." AND DesigId=".$_POST['did'], $con);}
  elseif($res['GradeId_3']==$_POST['gid'])
  {$sqlU=mysql_query("Update hrm_deptgradedesig SET GradeId_3=0 where DepartmentId=".$_POST['dptId']." AND DesigId=".$_POST['did'], $con);} 
  elseif($res['GradeId_4']==$_POST['gid'])
  {$sqlU=mysql_query("Update hrm_deptgradedesig SET GradeId_4=0 where DepartmentId=".$_POST['dptId']." AND DesigId=".$_POST['did'], $con);}
  elseif($res['GradeId_5']==$_POST['gid'])
  {$sqlU=mysql_query("Update hrm_deptgradedesig SET GradeId_5=0 where DepartmentId=".$_POST['dptId']." AND DesigId=".$_POST['did'], $con);} 
  
  echo '<input type="hidden" id="DptId" value="'.$_POST['dptId'].'" /> ';
  echo '<input type="hidden" id="DsgId" value="'.$_POST['did'].'" /> ';
  echo '<input type="hidden" id="GrdId" value="'.$_POST['gid'].'" /> ';
} 


if(isset($_POST['did2']) && $_POST['gid2']!="")
{ 
 $sql=mysql_query("select * from hrm_deptgradedesig where DepartmentId=".$_POST['dptId']." AND DesigId=".$_POST['did2'], $con); $row=mysql_num_rows($sql); 
 if($row>0)
 { $res=mysql_fetch_assoc($sql);
   if($res['GradeId']==0 OR $res['GradeId']=='')
   {$sqlU=mysql_query("Update hrm_deptgradedesig SET GradeId=".$_POST['gid2']." where DepartmentId=".$_POST['dptId']." AND DesigId=".$_POST['did2'], $con);}
   elseif($res['GradeId_2']==0 AND $res['GradeId_2']==0)
   {$sqlU=mysql_query("Update hrm_deptgradedesig SET GradeId_2=".$_POST['gid2']." where DepartmentId=".$_POST['dptId']." AND DesigId=".$_POST['did2'], $con);}
   elseif($res['GradeId_3']==0 AND $res['GradeId_3']==0)
   {$sqlU=mysql_query("Update hrm_deptgradedesig SET GradeId_3=".$_POST['gid2']." where DepartmentId=".$_POST['dptId']." AND DesigId=".$_POST['did2'], $con);} 
   elseif($res['GradeId_4']==0 AND $res['GradeId_4']==0)
   {$sqlU=mysql_query("Update hrm_deptgradedesig SET GradeId_4=".$_POST['gid2']." where DepartmentId=".$_POST['dptId']." AND DesigId=".$_POST['did2'], $con);}
   elseif($res['GradeId_5']==0 AND $res['GradeId_5']==0)
   {$sqlU=mysql_query("Update hrm_deptgradedesig SET GradeId_5=".$_POST['gid2']." where DepartmentId=".$_POST['dptId']." AND DesigId=".$_POST['did2'], $con);} 
   
   echo '<input type="hidden" id="DptId" value="'.$_POST['dptId'].'" /> ';
   echo '<input type="hidden" id="DsgId" value="'.$_POST['did2'].'" /> ';
   echo '<input type="hidden" id="GrdId" value="'.$_POST['gid2'].'" /> '; 
 }
}



if($_POST['act']=='upDesigSts' && $_POST['v']!='' && $_POST['de']!='')
{ 
 $SUp = mysql_query("UPDATE hrm_designation SET DesigStatus='".$_POST['v']."' WHERE DesigId=".$_POST['de'],$con); 
 if($SUp){ echo '<input type="hidden" id="Rstv" value="1" />'; }else{ echo '<input type="hidden" id="Rstv" value="0"/>'; }
}
?>
