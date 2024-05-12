<?php require_once('config/config.php');
if($_POST['act']=='AddStdPrductV')
{ 
 $sql=mysql_query("select * from hrm_sales_product_stdprod where ProductId=".$_POST['pi']." AND VillageLocId=".$_POST['vli'], $con); $row=mysql_num_rows($sql);
 if($row==0)
 { 
  $Up=mysql_query("insert into hrm_sales_product_stdprod(ProductId, VillageLocId, StdProdPerAcr) values(".$_POST['pi'].", ".$_POST['vli'].", ".$_POST['v'].")", $con);
 }
 elseif($row>0)
 { 
  $Up=mysql_query("update hrm_sales_product_stdprod set StdProdPerAcr='".$_POST['v']."' where ProductId=".$_POST['pi']." AND VillageLocId=".$_POST['vli'], $con); 
 }
 if($Up){ echo '<input type="hidden" id="pi" value="'.$_POST['pi'].'" />'; echo '<input type="hidden" id="vli" value="'.$_POST['vli'].'" />'; }
}

?>