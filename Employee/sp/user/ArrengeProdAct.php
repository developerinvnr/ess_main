<?php require_once('config/config.php');
if($_POST['Act']=='UpArrg' AND $_POST['p']!='' AND $_POST['s']!='' AND $_POST['sn']!='' AND $_POST['v']!='')
{
 $query=mysql_query("select * from hrm_sales_arrange_prod where ProductId=".$_POST['p']." AND StateId=".$_POST['s'], $con); $row=mysql_num_rows($query);
 if($row==1){ $sql=mysql_query("update hrm_sales_arrange_prod set ArrgStatus='".$_POST['v']."' where ProductId=".$_POST['p']." AND StateId=".$_POST['s'], $con); }
 else{ $sql=mysql_query("insert into hrm_sales_arrange_prod set ProductId=".$_POST['p'].", StateId=".$_POST['s'].", ArrgStatus='".$_POST['v']."'", $con); }
 if($sql)
 {  
 $sqlc=mysql_query("select * from hrm_sales_state_prod where ProductId=".$_POST['p']." and StateId=".$_POST['s']." ",$con);
 $roow=mysql_num_rows($sqlc);
 if($roow==0){ $up=mysql_query("insert into hrm_sales_state_prod(ProductId,StateId) values(".$_POST['p'].", ".$_POST['s'].")"); }      
 echo '<input type="hidden" id="sn" value="'.$_POST['sn'].'" /><input type="hidden" id="si" value="'.$_POST['s'].'" /><input type="hidden" id="pi" value="'.$_POST['p'].'" />';
 }  
}
?>