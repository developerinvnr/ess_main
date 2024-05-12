<?php session_start();
require_once('../../Employee/sp/user/config/config.php');

if(isset($_POST['action']) && $_POST['action']=='add')
{ 
$fi = $_POST['fi']; $m = $_POST['m']; $y = $_POST['y']; $ci = $_POST['Ci']; $sn=$_POST['sn'];
for($j=1; $j<=$ci; $j++) 
{ 
 if($_POST['e_'.$j]!='') 
 { 
   $Sql=mysql_query("select * from fa_attd where FaId=".$fi." AND Attd='".date($y."-".$m."-".$j)."'",$con); 
   $row=mysql_num_rows($Sql);
   if($row==0) { $sI=mysql_query("insert into fa_attd(FaId,Attd,Attv)values(".$fi.",'".date($y."-".$m."-".$j)."','".$_POST['e_'.$j]."')",$con);}
   elseif($row>0){$sU=mysql_query("update fa_attd set Attv='".$_POST['e_'.$j]."' where FaId=".$fi." AND Attd='".date($y."-".$m."-".$j)."'",$con);} 
 }
 if($_POST['e_'.$j]=='') 
 { 
   $Sql=mysql_query("select * from fa_attd where FaId=".$fi." AND Attd='".date($y."-".$m."-".$j)."'",$con);
   $row=mysql_num_rows($Sql);
   if($row>0){$U=mysql_query("delete from fa_attd where FaId=".$fi." AND Attd='".date($y."-".$m."-".$j)."'",$con);}  
 }
}  

$p=mysql_query("select count(Attv)as P from fa_attd where Attv='P' AND FaId=".$fi." AND (Attd between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$ci)."')",$con); $rp=mysql_fetch_assoc($p); 
$a=mysql_query("select count(Attv)as A from fa_attd where Attv='A' AND FaId=".$fi." AND (Attd between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$ci)."')",$con); $ra=mysql_fetch_assoc($a);
?>	  
<input type="hidden" id="sn" value="<?php echo $sn; ?>" />
<input type="hidden" id="fi" value="<?php echo $fi; ?>" />
<input type="hidden" id="Pr" value="<?php echo $rp['P']; ?>" />
<input type="hidden" id="Ab" value="<?php echo $ra['A']; ?>" />
<?php } ?>







