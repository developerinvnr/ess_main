<?php require_once('config/config.php');
if($_POST['Action']=='RequireOneTwo')
{ 
 $sql=mysql_query("select * from hrm_sales_product_plan where ProductId=".$_POST['pi']." AND SeasonId=".$_POST['si']." AND YearId=".$_POST['yi']." AND M=".$_POST['m']." AND Y=".$_POST['y'], $con);
 $row=mysql_num_rows($sql);
 if($row==1){$sqlU=mysql_query("update hrm_sales_product_plan set Estmt_Req=".$_POST['StmtReq'].", Buffer=".$_POST['Buff'].", PlanDate='".date("Y-m-d")."' where ProductId=".$_POST['pi']." AND SeasonId=".$_POST['si']." AND YearId=".$_POST['yi']." AND M=".$_POST['m']." AND Y=".$_POST['y'], $con); } elseif($row==0){$sqlU=mysql_query("insert into hrm_sales_product_plan(ProductId, SeasonId, YearId, M, Y, Estmt_Req, Buffer, PlanDate) values(".$_POST['pi'].", ".$_POST['si'].", ".$_POST['yi'].", ".$_POST['m'].", ".$_POST['y'].", ".$_POST['StmtReq'].", ".$_POST['Buff'].", '".date("Y-m-d")."')", $con);}
 echo '<input type="hidden" id="sn" value="'.$_POST['sn'].'" /><input type="hidden" id="pi" value="'.$_POST['pi'].'" />';
 echo '<input type="hidden" id="si" value="'.$_POST['si'].'" />';
}
?>