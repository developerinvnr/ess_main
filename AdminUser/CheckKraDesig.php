<?php
require_once('config/config.php');
if(isset($_POST['kid']) && $_POST['kid']!="")
{ $kid=$_POST['kid']; $did=$_POST['did']; 
  $sql=mysql_query("delete from hrm_pms_kra_designation where KRAId=".$kid." AND DesigId=".$did, $con);
} 
elseif(isset($_POST['kid2']) && $_POST['kid2']!="")
{ 
  $kid2=$_POST['kid2']; $did2=$_POST['did2']; $YId=$_POST['YId']; $UId=$_POST['UId'];
  $sqlCheck=mysql_query("select * from hrm_pms_kra_designation where KRAId=".$kid2." AND DesigId=".$did2, $con);  $row=mysql_num_rows($sqlCheck);
  if($row==0)
  { $sqlMax = mysql_query("SELECT MAX(DesigKraId) as DesigKraId FROM hrm_pms_kra_designation", $con); $resMax = mysql_fetch_assoc($sqlMax);
	$NextKraId = $resMax['DesigKraId']+1;
    $sql2=mysql_query("insert into hrm_pms_kra_designation(DesigKraId,YearId,KRAId,DesigId,CreatedBy,CreatedDate) values(".$NextKraId.",".$YId.",".$kid2.",".$did2.",".$UId.",'".date("Y-m-d")."')", $con);	  }
}  
?>
