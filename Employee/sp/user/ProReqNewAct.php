<?php require_once('config/config.php'); ?>
<?php   
if($_POST['Act']=='SavePtarget')
{ 
 if($_POST['Req']!=''){$Req=$_POST['Req'];}else{$Req=0;} if($_POST['NewReq']!=''){$NewReq=$_POST['NewReq'];}else{$NewReq=0;}
 if($_POST['PBuff']!=''){$PBuff=$_POST['PBuff'];}else{$PBuff=0;} if($_POST['TotReq']!=''){$TotReq=$_POST['TotReq'];}else{$TotReq=0;}
 if($_POST['PhyStck']!=''){$PhyStck=$_POST['PhyStck'];}else{$PhyStck=0;} if($_POST['UFStck']!=''){$UFStck=$_POST['UFStck'];}else{$UFStck=0;}
 if($_POST['NTPduce']!=''){$NTPduce=$_POST['NTPduce'];}else{$NTPduce=0;} if($_POST['ProdBuff']!=''){$ProdBuff=$_POST['ProdBuff'];}else{$ProdBuff=0;}
 if($_POST['ProdTgt']!=''){$ProdTgt=$_POST['ProdTgt'];}else{$ProdTgt=0;}

$sql=mysql_query("select * from hrm_sales_product_target where YearId=".$_POST['y']." AND ProductId=".$_POST['p'],$con); $row=mysql_num_rows($sql);
if($row>0){$sqlUp=mysql_query("update hrm_sales_product_target set Req=".$Req.", NewReq=".$NewReq.", PBuff=".$PBuff.", TotReq=".$TotReq.", PhyStck=".$PhyStck.", UFStck=".$UFStck.", NTPduce=".$NTPduce.", ProdBuff=".$ProdBuff.", ProdTgt=".$ProdTgt." where YearId=".$_POST['y']." AND ProductId=".$_POST['p'],$con);}
elseif($row==0){$sqlUp=mysql_query("insert into hrm_sales_product_target(ProductId, YearId, Req, NewReq, PBuff, TotReq, PhyStck, UFStck, NTPduce, ProdBuff, ProdTgt)values(".$_POST['p'].", ".$_POST['y'].", ".$Req.", ".$NewReq.", ".$PBuff.", ".$TotReq.", ".$PhyStck.", ".$UFStck.", ".$NTPduce.", ".$ProdBuff.", ".$ProdTgt.")",$con);}
if($sqlUp){echo '<input type="hidden" id="no" value="'.$_POST['n'].'" /> '; }
}
?>