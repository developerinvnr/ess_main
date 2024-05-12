<?php require_once('config/config.php');
if($_POST['action']=='ChangeAV')
{ 
 $sql=mysql_query("select * from hrm_sales_product_arrival where ProductId=".$_POST['p']." AND YearId=".$_POST['y'],$con); $row=mysql_num_rows($sql);
 if($row==1){ $sqlU=mysql_query("update hrm_sales_product_arrival set ".$_POST['m']."=".$_POST['v']." where ProductId=".$_POST['p']." AND YearId=".$_POST['y'], $con); } 
 elseif($row==0){$sqlU=mysql_query("insert into hrm_sales_product_arrival(ProductId, YearId, ".$_POST['m'].") values(".$_POST['p'].", ".$_POST['y'].", ".$_POST['v'].")", $con); }
 
 if($sqlU){ echo '<input type="hidden" id="pi" value="'.$_REQUEST['p'].'" /><input type="hidden" id="yi" value="'.$_REQUEST['y'].'" />';
 echo '<input type="hidden" id="mi" value="'.$_REQUEST['m'].'" />'; }
 
}

?>