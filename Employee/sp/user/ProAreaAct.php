<?php require_once('config/config.php');
if($_POST['p']!='' AND $_POST['a']!='' AND $_POST['s']!='')
{
$query=mysql_query("select * from `hrm_sales_product_area` where ProductId=".$_POST['p']." and VillageLocId=".$_POST['a']." and SeasonId=".$_POST['s'], $con);
$row=mysql_num_rows($query);
 if($row==1)
 {
  $status_fetch=mysql_fetch_array($query);
  if($status_fetch['ActiveStatus']==0)
  { $chk=0; $sql=mysql_query("update hrm_sales_product_area set ActiveStatus=1 where ProductId=".$_POST['p']." and VillageLocId=".$_POST['a']." and SeasonId=".$_POST['s'], $con); }
  if($status_fetch['ActiveStatus']==1)
  { $chk=1; $sql=mysql_query("update hrm_sales_product_area set ActiveStatus=0 where ProductId=".$_POST['p']." and VillageLocId=".$_POST['a']." and SeasonId=".$_POST['s'], $con); }
 }
 else
 {
   $chk=0;
   $sql=mysql_query("insert into hrm_sales_product_area set VillageLocId=".$_POST['a'].", ProductId=".$_POST['p'].", SeasonId=".$_POST['s'].", ActiveStatus=1", $con);
 }
   
  echo '<input type="hidden" id="sn" value="'.$_POST['sn'].'" /><input type="hidden" id="si" value="'.$_POST['s'].'" /><input type="hidden" id="chk" value="'.$chk.'" />';
   
}
?>