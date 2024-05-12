<?php
require_once('config/config.php');
if(isset($_POST['bid']) && $_POST['gid']!="")
{ $bid=$_POST['bid']; $gid=$_POST['gid']; 
  $sql=mysql_query("Update hrm_deptgradedesig SET GradeId=0 where DeptGradeDesigId=".$bid, $con);
} 
elseif(isset($_POST['bid2']) && $_POST['gid2']!="")
{ 
  $bid2=$_POST['bid2']; $gid2=$_POST['gid2']; $YId=$_POST['YId']; $UId=$_POST['UId'];
  $sql=mysql_query("Update hrm_deptgradedesig SET GradeId=".$gid2." where DeptGradeDesigId=".$bid2, $con);
}  
?>
