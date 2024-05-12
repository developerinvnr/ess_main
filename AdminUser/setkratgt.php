<?php session_start();
require_once('config/config.php');
if($_REQUEST['n']==1){$fn='KRAId'; $sqlk=mysql_query("select KRA from hrm_pms_kra where KRAId=".$_REQUEST['kid'],$con); 
$resk=mysql_fetch_assoc($sqlk);} elseif($_REQUEST['n']==2){$fn='KRASubId'; $sqlk=mysql_query("select KRA from hrm_pms_krasub where KRASubId=".$_REQUEST['kid'],$con); $resk=mysql_fetch_assoc($sqlk); }

if($_REQUEST['prd']=='Monthly'){ $tit='Month'; $num=12; $tgt=round(($_REQUEST['tgt']/12),2); }
elseif($_REQUEST['prd']=='Quarter'){ $tit='Quarter'; $num=4; $tgt=round($_REQUEST['tgt']/4); }
elseif($_REQUEST['prd']=='1/2 Annual'){ $tit='Year'; $num=2; $tgt=round($_REQUEST['tgt']/2); } 
 
if(isset($_POST['subsave']))
{
 for($i=1; $i<=$_POST['TotRow']; $i++)
 {
   $sqlchk=mysql_query("select * from hrm_pms_kra_tgtdefin where ".$fn."=".$_POST['Idd']." AND Tital='".$_POST['tit'.$i]."' AND Tgt='".$_POST['tgt'.$i]."'",$con); $row=mysql_num_rows($sqlchk);
   if($row>0)
   { 
    $upIn=mysql_query("update hrm_pms_kra_tgtdefin set Remark='".$_POST['Remark'.$i]."' where ".$fn."=".$_POST['Idd']." AND Tital='".$_POST['tit'.$i]."' AND Tgt='".$_POST['tgt'.$i]."'");
   }
   else
   {
    $upIn=mysql_query("insert into hrm_pms_kra_tgtdefin(".$fn.", Tital, Tgt, Remark) values(".$_POST['Idd'].", '".$_POST['tit'.$i]."', '".$_POST['tgt'.$i]."', '".$_POST['Remark'.$i]."')",$con);
   } 
 }
 if($upIn){echo '<script>alert("Data save successfully");</script>';}
}


if($_REQUEST['actionv']=='revert')
{
 
 $sqlu=mysql_query("update hrm_pms_kra_tgtdefin set lockk=0,Applockk=0,Revlockk=0 where TgtDefId=".$_REQUEST['revertId'],$con); 
 if($sqlu){ echo '<script>alert("Revert Successfully!"); window.location="setkratgt.php?act=setkratgt&n='.$_REQUEST['n'].'&valueins=true&checkalpha=false&d=12&pa=4&y=2&kid='.$_REQUEST['kid'].'&prd='.$_REQUEST['prd'].'&yy=t1t&tgt='.$_REQUEST['tgt'].'"; </script>'; }
}

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Target Define</title>
<style>.h{font-size:16px;font-family:Georgia;text-align:center;font-weight:bold;color:#FFF;}
.t{font-size:12px;font-family:Georgia;text-align:center;font-weight:bold;color:#FFFFFF;}
.d{font-size:12px;font-family:Georgia;color:#000000;}
</style>
<script type="text/javascript" language="javascript">
function funRevert(id)
{
 var agree=confirm("Are you sure?");
 if(agree)
 {
  var prd=document.getElementById("prd").value; var tgt=document.getElementById("tgt").value;
  var kid=document.getElementById("kid").value; var nn=document.getElementById("nn").value;
window.location="setkratgt.php?act=setkratgt&n="+nn+"&valueins=true&checkalpha=false&d=12&pa=4&y=2&kid="+kid+"&prd="+prd+"&yy=t1t&tgt="+tgt+"&actionv=revert&revertId="+id; 
 }
 else
 {
  return false;
 }
}
</script>
</head>
<body bgcolor="#6C6C00">
<center>
<input type="hidden" id="prd" value="<?php echo $_REQUEST['prd']; ?>" /> 
<input type="hidden" id="tgt" value="<?php echo $_REQUEST['tgt']; ?>" /> 
<input type="hidden" id="kid" value="<?php echo $_REQUEST['kid']; ?>" /> 
<input type="hidden" id="nn" value="<?php echo $_REQUEST['n']; ?>" />
<table style="width:880px;">
 <tr>
  <td style="width:100%;" valign="top">
   <table align="center" border="0" cellspacing="1">
    <tr><td colspan="6" class="h">Define Target</td></tr>
	<tr><td>&nbsp;</td></tr>	
    <tr style="background-color:#CC9900;height:25px;">
	 <td class="t" style="width:40px;">Sn</td>
	 <td class="t" style="width:80px;"><?php echo $tit; ?></td>
	 <td class="t" style="width:60px;">Target</td>
	 <td class="t" style="width:300px;">Activity Performed</td>
	 <td class="t" style="width:60px;">Achive</td>
	 <td class="t" style="width:300px;">Remark</td>
	 <td class="t" style="width:50px;">Revert</td>
	</tr>		
<form name="TgtForm" method="post">	
	<?php for($i=1; $i<=$num; $i++){ ?>
	<tr style="background-color:#FFFFFF;height:24px;">
	 <td class="d" align="center"><?php echo $i; ?></td>
	 <td class="d" align="center">
	  <?php 
	    if($_REQUEST['prd']=='Monthly'){ if($i==1){$t='January'; $ld=date("Y-02-28"); $lm=3; }elseif($i==2){$t='February'; $ld=date("Y-02-28"); $lm=3; }elseif($i==3){$t='March'; $ld=date("Y-03-31"); $lm=3; }elseif($i==4){$t='April';$ld=date("Y-04-30"); $lm=4; }elseif($i==5){$t='May'; $ld=date("Y-05-31"); $lm=5; }elseif($i==6){$t='June'; $ld=date("Y-06-30"); $lm=6; }elseif($i==7){$t='July'; $ld=date("Y-07-31"); $lm=7; }elseif($i==8){$t='August'; $ld=date("Y-08-31"); $lm=8; }elseif($i==9){$t='September'; $ld=date("Y-09-30"); $lm=9; }elseif($i==10){$t='October'; $ld=date("Y-10-31"); $lm=10; }elseif($i==11){$t='November'; $ld=date("Y-11-30"); $lm=11; }elseif($i==12){$t='December'; $ld=date("Y-12-31"); $lm=12; } }	
        elseif($_REQUEST['prd']=='Quarter'){ if($i==1){$t='Quarter 1'; $ld=date("Y-03-31"); $lm=3; }elseif($i==2){$t='Quarter 2'; $ld=date("Y-06-30"); $lm=4; }elseif($i==3){$t='Quarter 3'; $ld=date("Y-09-30"); $lm=7; }elseif($i==4){$t='Quarter 4'; $ld=date("Y-12-31"); $lm=10; } }
        elseif($_REQUEST['prd']=='1/2 Annual'){ if($i==1){$t='Half Year 1'; $ld=date("Y-06-30"); $lm=3; }elseif($i==2){$t='Half Year 2'; $ld=date("Y-12-31"); $lm=7; } }
		echo $t;
      ?><input type="hidden" name="tit<?php echo $i; ?>" value="<?php echo $t; ?>"/>
	 </td>
	 <td class="d" align="center">
	 <?php echo $tgt; ?><input type="hidden" name="tgt<?php echo $i; ?>" value="<?php echo $tgt; ?>"/>
	 </td> 
	 
<?php $sql=mysql_query("select * from hrm_pms_kra_tgtdefin where ".$fn."=".$_REQUEST['kid']." AND Tital='".$t."' AND NtgtN='".$i."'",$con); $res=mysql_fetch_assoc($sql); ?>
	 <td class="d" bgcolor="#FFFFC6"><input type="text" name="Remark<?php echo $i; ?>" class="d" style="width:300px;border:hidden;background-color:#FFFFC6;" value="<?php if($res['Remark']!=''){echo $res['Remark'];}else{echo $resk['KRA'];}?>" maxlength="500"/></td>
	 
	 <td class="d" bgcolor="#FFFFFF"><input type="text" name="Ach<?php echo $i; ?>" class="d" style="width:60px;border:hidden;background-color:#FFFFFF; text-align:center;" value="<?php echo $res['Ach']; ?>" readonly/></td>
	 <td class="d" bgcolor="#D5FFAA"><input type="text" name="Cmnt<?php echo $i; ?>" class="d" style="width:300px;border:hidden;background-color:#D5FFAA;" value="<?php echo $res['Cmnt']; ?>" readonly/></td>
	 
	 <td class="d" align="center"><?php if($res['lockk']>0){?><img src="images/go-back-icon.png" onClick="funRevert(<?php echo $res['TgtDefId']; ?>)"><?php } ?></td>
	 
	</tr>
    <?php } ?>
	<tr style="background-color:#FFFFFF;height:24px;">
	 <td class="d" colspan="2" align="right"><b>Total:&nbsp;</b></td>
	 <td class="d" align="center" bgcolor="#FFFFC6"><b><?php echo $_REQUEST['tgt']; ?></b></td>
	 <td class="d" align="right" bgcolor="#FFFFC6">&nbsp;</td>
	 <td class="d" align="center" bgcolor="#D5FFAA"><b><?php echo ''; ?></b></td>
	 <td class="d" align="right" bgcolor="#D5FFAA">&nbsp;</td>
	</tr>
	<tr style="background-color:#6C6C00;height:24px;">
	 <td class="d" colspan="4" align="center" style="background-color:#CC9900;">
	 <input type="hidden" name="TotRow" value="<?php echo $num; ?>" />
	 <input type="hidden" name="Idd" value="<?php echo $_REQUEST['kid']; ?>" />
	 <input type="submit" name="subsave" style="width:100px;height:25px;" value="save" />
	 </td>
	</tr>
</form>	
   </table>
  </td>
 </tr>
</table>
</center>
</body>
</html>