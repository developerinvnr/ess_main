<?php require_once('config/config.php');
if(isset($_POST['act']) && $_POST['v']!='' && $_POST['act']=='SetESt'){ 
$sql=mysql_query("select * from hrm_asset_name_emp where EmployeeID=".$_POST['ei']." AND AssetNId=".$_POST['ai'], $con); $row=mysql_num_rows($sql);
//echo 'aa='.$_POST['ai'];
if($row>0)
{ 
  if($_POST['v']=='Y'){ $sqlUp=mysql_query("update hrm_asset_name_emp set AssetESt='".$_POST['v']."' where EmployeeID=".$_POST['ei']." AND AssetNId=".$_POST['ai'], $con); }
  if($_POST['v']=='N'){ $sqlUp=mysql_query("update hrm_asset_name_emp set AssetESt='".$_POST['v']."' where EmployeeID=".$_POST['ei']." AND AssetNId=".$_POST['ai'], $con); }
}
else
{
 if($_POST['v']=='Y'){ $sqlUp=mysql_query("insert into hrm_asset_name_emp(EmployeeID,AssetNId,AssetESt) values(".$_POST['ei'].",".$_POST['ai'].",'".$_POST['v']."')", $con); }
 if($_POST['v']=='N'){ $sqlUp=mysql_query("insert into hrm_asset_name_emp(EmployeeID,AssetNId,AssetESt,AssetELimit) values(".$_POST['ei'].",".$_POST['ai'].",'".$_POST['v']."',0)", $con); }
}
?>
<input type="hidden" id="sn" value="<?php echo $_POST['sn']; ?>"/><input type="hidden" id="ei" value="<?php echo $_POST['ei']; ?>"/>
<input type="hidden" id="ai" value="<?php echo $_POST['ai']; ?>"/>
<input type="hidden" id="action1" value="<?php if($_POST['v']=='Y'){echo 'Y';}else{echo 'N';} ?>"/>
<?php } ?>


<?php if(isset($_POST['act']) && $_POST['v']!='' && $_POST['act']=='SetEAmt'){ 
$sql=mysql_query("select * from hrm_asset_name_emp where EmployeeID=".$_POST['ei']." AND AssetNId=".$_POST['ai'], $con); $row=mysql_num_rows($sql);
if($row>0){ $sqlUp=mysql_query("update hrm_asset_name_emp set AssetELimit='".$_POST['v']."' where EmployeeID=".$_POST['ei']." AND AssetNId=".$_POST['ai'], $con); }
else{ $sqlUp=mysql_query("insert into hrm_asset_name_emp(EmployeeID,AssetNId,AssetELimit) values(".$_POST['ei'].",".$_POST['ai'].",'".$_POST['v']."')", $con); }
?>
<input type="hidden" id="sn2" value="<?php echo $_POST['sn']; ?>"/><input type="hidden" id="ei2" value="<?php echo $_POST['ei']; ?>"/>
<input type="hidden" id="ai2" value="<?php echo $_POST['ai']; ?>"/>
<?php } ?>



<?php if(isset($_POST['act']) && $_POST['v']!='' && $_POST['act']=='SetGSt'){ 
$sql=mysql_query("select * from hrm_asset_name_grade where GradeId=".$_POST['gi']." AND AssetNId=".$_POST['ai'], $con); $row=mysql_num_rows($sql);
if($row>0)
{ 
  if($_POST['v']=='Y')
  { $sqlUp=mysql_query("update hrm_asset_name_grade set AssetGSt='".$_POST['v']."' where GradeId=".$_POST['gi']." AND AssetNId=".$_POST['ai'], $con); }
  if($_POST['v']=='N'){ $sqlUp=mysql_query("update hrm_asset_name_grade set AssetGSt='".$_POST['v']."', AssetGLimit=0 where GradeId=".$_POST['gi']." AND AssetNId=".$_POST['ai'], $con); }
}
else
{
 if($_POST['v']=='Y'){ $sqlUp=mysql_query("insert into hrm_asset_name_grade(GradeId,AssetNId,AssetGSt) values(".$_POST['gi'].",".$_POST['ai'].",'".$_POST['v']."')", $con); }
 if($_POST['v']=='N'){ $sqlUp=mysql_query("insert into hrm_asset_name_grade(GradeId,AssetNId,AssetGSt,AssetGLimit) values(".$_POST['gi'].",".$_POST['ai'].",'".$_POST['v']."',0)", $con); }
}
?>
<input type="hidden" id="sn" value="<?php echo $_POST['sn']; ?>"/><input type="hidden" id="gi" value="<?php echo $_POST['gi']; ?>"/>
<input type="hidden" id="ai" value="<?php echo $_POST['ai']; ?>"/>
<input type="hidden" id="action1" value="<?php if($_POST['v']=='Y'){echo 'Y';}else{echo 'N';} ?>"/>
<?php } ?>


<?php if(isset($_POST['act']) && $_POST['v']!='' && $_POST['act']=='SetGAmt'){ 
$sql=mysql_query("select * from hrm_asset_name_grade where GradeId=".$_POST['gi']." AND AssetNId=".$_POST['ai'], $con); $row=mysql_num_rows($sql);
if($row>0){ $sqlUp=mysql_query("update hrm_asset_name_grade set AssetGLimit='".$_POST['v']."' where GradeId=".$_POST['gi']." AND AssetNId=".$_POST['ai'], $con); }
else{ $sqlUp=mysql_query("insert into hrm_asset_name_grade(GradeId,AssetNId,AssetGLimit) values(".$_POST['gi'].",".$_POST['ai'].",'".$_POST['v']."')", $con); }
?>
<input type="hidden" id="sn2" value="<?php echo $_POST['sn']; ?>"/><input type="hidden" id="gi2" value="<?php echo $_POST['gi']; ?>"/>
<input type="hidden" id="ai2" value="<?php echo $_POST['ai']; ?>"/>
<?php } ?>
