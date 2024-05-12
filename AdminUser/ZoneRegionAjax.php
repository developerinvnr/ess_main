<?php require_once('config/config.php'); 

if(isset($_POST['act']) && $_POST['act']=='UpdHqVDepReg')
{

 $sn=$_POST['Sn'];
 if($_POST['IId']>0)
 {
  $SqlUpdate = mysql_query("UPDATE hrm_sales_verhq SET RegionId=".$_POST['RegionId'].", CreatedBy=".$_POST['U'].", CreatedDate='".date("Y-m-d")."' where VHqId=".$_POST['IId'], $con) or die(mysql_error());
 }
 else
 {
  $SqlUpdate = mysql_query("insert into hrm_sales_verhq (Vertical, HqId, RegionId, CompanyId, DeptId, Status, CreatedBy, CreatedDate) values(".$_POST['VerticalId'].", ".$_POST['HqId'].", ".$_POST['RegionId'].", ".$_POST['C'].", ".$_POST['DepartmentId'].", 'A', ".$_POST['U'].", '".date("Y-m-d")."')", $con) or die(mysql_error());
 }
   
 if($SqlUpdate){ $msg=1; }else{ $msg=0; }
 echo '<input type="hidden" id="ActRest" value='.$msg.' /><input type="hidden" id="ActSn" value='.$sn.' />';
}

?>
