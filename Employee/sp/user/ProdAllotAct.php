<?php require_once('config/config.php');
if($_POST['act']=='SeasonValue')
{ 
 $sql=mysql_query("select * from hrm_sales_product_season_stock where ProductId=".$_REQUEST['pi']." AND SeasonId=".$_REQUEST['si']." AND YearId=".$_REQUEST['yi'],$con);
 $row=mysql_num_rows($sql);
 if($row==1){$sqlU=mysql_query("update hrm_sales_product_season_stock set ActlMonth=".$_REQUEST['mv'].", ActlYear=".$_REQUEST['yv'].", EstStock=".$_REQUEST['sv']." where ProductId=".$_REQUEST['pi']." AND SeasonId=".$_REQUEST['si']." AND YearId=".$_REQUEST['yi'], $con); } elseif($row==0){$sqlU=mysql_query("insert into hrm_sales_product_season_stock(ProductId, SeasonId, YearId, ActlMonth, ActlYear, EstStock) values(".$_REQUEST['pi'].", ".$_REQUEST['si'].", ".$_REQUEST['yi'].", ".$_REQUEST['mv'].", ".$_REQUEST['yv'].", ".$_REQUEST['sv'].")", $con);}
 echo '<input type="hidden" id="snS" value="'.$_REQUEST['sn'].'" /><input type="hidden" id="piS" value="'.$_REQUEST['pi'].'" />';
 echo '<input type="hidden" id="siS" value="'.$_REQUEST['si'].'" />';
}

if($_POST['act']=='AreaValue')
{ 
 $sql=mysql_query("select * from hrm_sales_product_area_stock where ProductId=".$_REQUEST['pi']." AND SeasonId=".$_REQUEST['si']." AND AreaId=".$_REQUEST['ai']." AND YearId=".$_REQUEST['yi'],$con); $row=mysql_num_rows($sql);
 if($row==1){$sqlU=mysql_query("update hrm_sales_product_area_stock set ActlAMonth=".$_REQUEST['mv'].", ActlAYear=".$_REQUEST['yv'].", EstAStock=".$_REQUEST['av']." where ProductId=".$_REQUEST['pi']." AND SeasonId=".$_REQUEST['si']." AND AreaId=".$_REQUEST['ai']." AND YearId=".$_REQUEST['yi'], $con); } elseif($row==0){$sqlU=mysql_query("insert into hrm_sales_product_area_stock(ProductId, SeasonId, AreaId, YearId, ActlAMonth, ActlAYear, EstAStock) values(".$_REQUEST['pi'].", ".$_REQUEST['si'].", ".$_REQUEST['ai'].", ".$_REQUEST['yi'].", ".$_REQUEST['mv'].", ".$_REQUEST['yv'].", ".$_REQUEST['av'].")", $con);}
 $sTotA=mysql_query("select SUM(EstAStock) as AreaStck from hrm_sales_product_area_stock where ProductId=".$_REQUEST['pi']." AND SeasonId=".$_REQUEST['si']." AND YearId=".$_REQUEST['yi'], $con); $rTotA=mysql_fetch_assoc($sTotA);
 echo '<input type="hidden" id="snA" value="'.$_REQUEST['sn'].'" /><input type="hidden" id="piA" value="'.$_REQUEST['pi'].'" />';
 echo '<input type="hidden" id="siA" value="'.$_REQUEST['si'].'" /><input type="hidden" id="TotA" value="'.$rTotA['AreaStck'].'" />';
 echo '<input type="hidden" id="aiA" value="'.$_REQUEST['ai'].'" />';
 
}

if($_POST['act']=='FarmerValue')
{ 
 $sql=mysql_query("select * from hrm_sales_product_farmer_stock where ProductId=".$_REQUEST['pi']." AND SeasonId=".$_REQUEST['si']." AND AreaId=".$_REQUEST['ai']." AND FarmerId=".$_REQUEST['fi']." AND YearId=".$_REQUEST['yi'],$con); $row=mysql_num_rows($sql);
 if($row==1){$sqlU=mysql_query("update hrm_sales_product_farmer_stock set ActlFMonth=".$_REQUEST['mv'].", ActlFYear=".$_REQUEST['yv'].", EstFStock=".$_REQUEST['fv']." where ProductId=".$_REQUEST['pi']." AND SeasonId=".$_REQUEST['si']." AND AreaId=".$_REQUEST['ai']." AND FarmerId=".$_REQUEST['fi']." AND YearId=".$_REQUEST['yi'], $con); } elseif($row==0){$sqlU=mysql_query("insert into hrm_sales_product_farmer_stock(ProductId, SeasonId, AreaId, FarmerId, YearId, ActlFMonth, ActlFYear, EstFStock) values(".$_REQUEST['pi'].", ".$_REQUEST['si'].", ".$_REQUEST['ai'].", ".$_REQUEST['fi'].", ".$_REQUEST['yi'].", ".$_REQUEST['mv'].", ".$_REQUEST['yv'].", ".$_REQUEST['fv'].")", $con);}
 $sTotF=mysql_query("select SUM(EstFStock) as FrmerStck from hrm_sales_product_farmer_stock where ProductId=".$_REQUEST['pi']." AND SeasonId=".$_REQUEST['si']." AND AreaId=".$_REQUEST['ai']." AND YearId=".$_REQUEST['yi'], $con); $rTotF=mysql_fetch_assoc($sTotF);
 echo '<input type="hidden" id="snF" value="'.$_REQUEST['sn'].'" /><input type="hidden" id="piF" value="'.$_REQUEST['pi'].'" />';
 echo '<input type="hidden" id="siF" value="'.$_REQUEST['si'].'" /><input type="hidden" id="aiF" value="'.$_REQUEST['ai'].'" />';
 echo '<input type="hidden" id="fiF" value="'.$_REQUEST['fi'].'" /><input type="hidden" id="TotF" value="'.$rTotF['FrmerStck'].'" />';
}
?>