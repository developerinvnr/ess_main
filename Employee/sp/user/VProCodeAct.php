<?php require_once('config/config.php');
if($_POST['act']=='AddProdCode')
{ 
 $sql=mysql_query("update hrm_sales_seedsproduct set ProdnCode='".$_POST['v']."' where ProductId=".$_REQUEST['pi'],$con);
 if($sql){ echo '<input type="hidden" id="pi" value="'.$_POST['pi'].'" />'; }
}

?>