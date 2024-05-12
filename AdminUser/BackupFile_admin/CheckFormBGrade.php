<?php
require_once('config/config.php');
if(isset($_POST['bid']) && $_POST['gid']!="")
{ $bid=$_POST['bid']; $gid=$_POST['gid']; 
  $sql=mysql_query("delete from hrm_pms_formb_grade where FormBId=".$bid." AND GradeId=".$gid, $con);
} 
elseif(isset($_POST['bid2']) && $_POST['gid2']!="")
{ 
  $bid2=$_POST['bid2']; $gid2=$_POST['gid2']; $YId=$_POST['YId']; $UId=$_POST['UId'];
  $sqlCheck=mysql_query("select * from hrm_pms_formb_grade where FormBId=".$bid2." AND GradeId=".$gid2, $con);  $row=mysql_num_rows($sqlCheck);
  if($row==0)
  { $sqlMax = mysql_query("SELECT MAX(GradeFormBId) as GradeFormBId FROM hrm_pms_formb_grade", $con); $resMax = mysql_fetch_assoc($sqlMax);
	$NextFormBId = $resMax['GradeFormBId']+1;
    $sql2=mysql_query("insert into hrm_pms_formb_grade(GradeFormBId,YearId,FormBId,GradeId,CreatedBy,CreatedDate) values(".$NextFormBId.",".$YId.",".$bid2.",".$gid2.",".$UId.",'".date("Y-m-d")."')", $con);	  }
}  
?>
