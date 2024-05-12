<?php session_start();
require_once('../AdminUser/config/config.php');
if($_REQUEST['n']==1){ $fn='KRAId'; $sqlk=mysql_query("select KRA,KRA_Description from hrm_pms_kra where KRAId=".$_REQUEST['kid'],$con); }elseif($_REQUEST['n']==2){ $fn='KRASubId'; $sqlk=mysql_query("select KRA,KRA_Description from hrm_pms_krasub where KRASubId=".$_REQUEST['kid'],$con); } $resk=mysql_fetch_assoc($sqlk);

if($_REQUEST['prd']=='Monthly')
{ $countrow=12; $tit='Month'; $num=12; $tgt=round(($_REQUEST['tgt']/12),2); $wgt=round(($_REQUEST['wgt']/12),2); }
elseif($_REQUEST['prd']=='Quarter')
{ $countrow=4; $tit='Quarter'; $num=4; $tgt=round($_REQUEST['tgt']/4); $wgt=round(($_REQUEST['wgt']/4),2); }
elseif($_REQUEST['prd']=='1/2 Annual')
{ $countrow=2; $tit='Year'; $num=2; $tgt=round($_REQUEST['tgt']/2); $wgt=round(($_REQUEST['wgt']/2),2); } 

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Target Define</title>
<style>.h{font-size:16px;font-family:Georgia;text-align:center;font-weight:bold;color:#FFF;}
.t{font-size:12px;font-family:Georgia;text-align:center;font-weight:bold;color:#FFFFFF;}
.d{font-size:12px;font-family:Georgia;color:#000000;}
</style>
<script type="text/javascript" src="js/Prototype.js"></script><?php /* Ajax */ ?>
<script type="text/javascript" language="javascript">

</script>
</head>
<body bgcolor="#6C6C00">
<span id="ResultSpan"></span>
<?php for($i=1; $i<=12; $i++){ ?>
<input type="hidden" id="AchScore<?php echo $i; ?>" value="0" />
<input type="hidden" id="KraScore<?php echo $i; ?>" value="0" />
<?php } ?>
<?php $sqle=mysql_query("select EmpCode,Fname,Sname,Lname from hrm_employee where EmployeeID=".$_REQUEST['eid'],$con);
      $rese=mysql_fetch_assoc($sqle); ?>
<center>
<table style="width:100%;">
 <tr>
  <td style="width:100%;" valign="top">
   <table align="center" border="0" cellspacing="1">
    <tr><td colspan="16" class="h"><u>Define Target</u></td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td colspan="16"><font color="#9BFFFF">Name:</font>&nbsp;<font color="#FFFFFF"><?php echo $rese['EmpCode'].': '.$rese['Fname'].' '.$rese['Sname'].' '.$rese['Lname']; ?></font></td></tr>
	<tr><td colspan="16"><font color="#9BFFFF">Logic:</font>&nbsp;<font color="#FFFFFF"><?php echo $_REQUEST['lgc']; ?></font>&nbsp;,&nbsp;<font color="#9BFFFF">KRA:</font>&nbsp;<font color="#FFFFFF"><?php echo $resk['KRA']; ?></font></td></tr><tr><td colspan="16"><font color="#9BFFFF">Description:</font>&nbsp;<font color="#FFFFFF"><?php echo $resk['KRA_Description']; ?></td></font></tr>	
    <tr style="background-color:#CC9900;height:25px;">
	 <td rowspan="2" class="t" style="width:40px;">Sn</td>
	 <td rowspan="2" class="t" style="width:80px;"><?php echo $tit; ?></td>
	 <td rowspan="2" class="t" style="width:50px;">Weigh<br>tage</td>
	 <td rowspan="2" class="t" style="width:50px;">Target</td>
	 <td rowspan="2" class="t" style="width:200px;">Activity Performed</td>
	 <td colspan="3" class="t">Employee Rating Deatis</td>
	 <td colspan="3" class="t">Reporting Rating Deatis</td>
	 <td rowspan="2" class="t" style="width:200px;">Reviewer Remark</td>
	</tr>
	<tr style="background-color:#CC9900;height:25px;">
	 <td class="t" style="width:50px;color:#FFF;">Self Rating</td>
	 <td class="t" style="width:200px;color:#FFF;">Remark</td>
	 <!--<td class="t" style="width:50px;color:#FFF;">Allow Logic</td>-->
	 <td class="t" style="width:50px;color:#FFF;">Score</td>
	 <td class="t" style="width:50px;color:#FFF;">Rep Rating</td>
	 <td class="t" style="width:200px;color:#FFF;">Remark</td>
	 <!--<td class="t" style="width:50px;color:#FFF;">Allow Logic</td>-->
	 <td class="t" style="width:50px;color:#FFF;">Score</td>
	</tr>
<form name="TgtForm" method="post" onSubmit="return ValidatCmt(this)">	
<input type="hidden" name="numr" id="numr" value="<?php echo $num; ?>"/>
<input type="hidden" name="fn" id="fn" value="<?php echo $fn; ?>"/>
<input type="hidden" name="kid" id="kid" value="<?php echo $_REQUEST['kid']; ?>"/>
<input type="hidden" name="lgc" id="lgc" value="<?php echo $_REQUEST['lgc']; ?>"/>
<input type="hidden" name="wgt" id="wgt" value="<?php echo $_REQUEST['wgt']; ?>"/>

	<?php for($i=1; $i<=$num; $i++){ ?>
	<tr style="background-color:#FFFFFF;height:24px;">
	 <td class="d" align="center"><?php echo $i; ?></td>
	 <td class="d" align="center">
	  <?php 
	    if($_REQUEST['prd']=='Monthly'){ if($i==1){$t='January'; $ld=date("Y-02-28"); }elseif($i==2){$t='February'; $ld=date("Y-02-28"); }elseif($i==3){$t='March'; $ld=date("Y-03-31"); }elseif($i==4){$t='April';$ld=date("Y-04-30"); }elseif($i==5){$t='May'; $ld=date("Y-05-31"); }elseif($i==6){$t='June'; $ld=date("Y-06-30"); }elseif($i==7){$t='July'; $ld=date("Y-07-31"); }elseif($i==8){$t='August'; $ld=date("Y-08-31"); }elseif($i==9){$t='September'; $ld=date("Y-09-30"); }elseif($i==10){$t='October'; $ld=date("Y-10-31"); }elseif($i==11){$t='November'; $ld=date("Y-11-30"); }elseif($i==12){$t='December'; $ld=date("Y-12-31"); } }	
        elseif($_REQUEST['prd']=='Quarter'){ if($i==1){$t='Quarter 1'; $ld=date("Y-03-31"); }elseif($i==2){$t='Quarter 2'; $ld=date("Y-06-30"); }elseif($i==3){$t='Quarter 3'; $ld=date("Y-09-30"); }elseif($i==4){$t='Quarter 4'; $ld=date("Y-12-31"); } }
        elseif($_REQUEST['prd']=='1/2 Annual'){ if($i==1){$t='Half Year 1'; $ld=date("Y-06-30"); }elseif($i==2){$t='Half Year 2'; $ld=date("Y-12-31"); } }
		
		echo $t; ?><input type="hidden" name="tit<?php echo $i; ?>" value="<?php echo $t; ?>"/>
	 </td>
	 
<?php $sql=mysql_query("select * from hrm_pms_kra_tgtdefin where ".$fn."=".$_REQUEST['kid']." AND Tital='".$t."' AND NtgtN='".$i."'",$con); $row=mysql_num_rows($sql); $res=mysql_fetch_assoc($sql); ?> 	 
	 
	 <td class="d" align="center"><?php if($res['Wgt']!=''){echo floatval($res['Wgt']);}else{echo floatval($wgt);} ?></td>
	 <td class="d" align="center"><?php if($res['Tgt']!=''){echo floatval($res['Tgt']);}else{echo floatval($tgt);} ?>
	 <input type="hidden" id="wgt<?php echo $i; ?>" name="wgt<?php echo $i; ?>" value="<?php if($res['Wgt']!=''){echo floatval($res['Wgt']);}else{echo floatval($wgt);} ?>"/>
	 <input type="hidden" id="tgt<?php echo $i; ?>" name="tgt<?php echo $i; ?>" value="<?php if($res['Tgt']!=''){echo floatval($res['Tgt']);}else{echo floatval($tgt);} ?>"/>
	 <input type="hidden" id="NtgtN<?php echo $i; ?>" name="NtgtN<?php echo $i; ?>" value="<?php echo $i; ?>"/>
	 </td> 

	 <td class="d" id="TDD<?php echo $i; ?>" valign="top"><?php if($res['Remark']!=''){echo $res['Remark'];}else{echo $resk['KRA'];}?>
	 <input type="hidden" name="ld<?php echo $i; ?>" value="<?php if($row>0 AND $res['Ldate']!='0000-00-00' AND $res['Ldate']!='1970-01-01'){ echo $res['Ldate']; }else{ echo $ld; } ?>"/>
	 </td>
	 
	 <td class="d" bgcolor="#D5EAFF" align="center"><?php if($res['Cmnt']!=''){ echo floatval($res['Ach']); }else{echo 0;} ?></td>
	 <td class="d" bgcolor="#D5EAFF" valign="top"><?php echo $res['Cmnt']; ?></td>
	 
	 <?php /*?><td class="d" bgcolor="#D5EAFF" align="center"><?php if($res['LogScr']!=''){ echo $res['LogScr'];}else{echo 0;} ?></td><?php */?>
	 
	 <td class="d" bgcolor="#D5EAFF" align="center"><?php if($res['Scor']!=''){ echo $res['Scor'];}else{echo 0;} ?></td>
	 <td class="d" bgcolor="#FFFFAE" align="center"><?php if($res['AppCmnt']!=''){ echo floatval($res['AppAch']); }else{echo 0;} ?></td>
	 <td class="d" bgcolor="#FFFFAE" valign="top"><?php echo $res['AppCmnt']; ?></td>
	 
	 <?php /*?><td class="d" bgcolor="#FFFFAE" align="center"><?php if($res['AppLogScr']!=''){ echo $res['AppLogScr'];}else{echo 0;} ?></td><?php */?>
	 
	 <td class="d" bgcolor="#FFFFAE" align="center"><?php if($res['AppScor']!=''){ echo $res['AppScor'];}else{echo 0;} ?></td>
	 <td class="d" bgcolor="#D5FFAA" id="TD1<?php echo $i; ?>" valign="top"><?php echo $res['RevCmnt']; ?></td> 
	 
	</tr>
    <?php } ?>
	<tr style="height:24px;">
	 <td class="d" colspan="2" align="right" bgcolor="#FFFFFF"><b>Total:&nbsp;</b></td>
	 <td class="d" align="center" bgcolor="#FFFFFF"><b><?php echo $_REQUEST['wgt']; ?></b></td>
	 <td class="d" align="center" bgcolor="#FFFFFF"><b><?php echo $_REQUEST['tgt']; ?></b></td>
	 <td class="d" align="" bgcolor="#FFFFFF"></td>
<?php $sqlt=mysql_query("select SUM(Ach) as tAch, SUM(LogScr) as tLogScr, SUM(Scor) as tScor, SUM(AppAch) as tAppAch, SUM(AppLogScr) as tAppLogScr, SUM(AppScor) as tAppScor from hrm_pms_kra_tgtdefin where ".$fn."=".$_REQUEST['kid'],$con); $rest=mysql_fetch_assoc($sqlt); ?>	 
	 <td class="d" align="center" bgcolor="#D5EAFF"><b><?php if($rest['tAch']>0){echo floatval($rest['tAch']);} ?></b></td>
	 <td class="d" align="" bgcolor="#FFFFFF"></td>	 
	 
<?php /*?><td class="d" align="center" bgcolor="#D5EAFF"><b><?php if($rest['tLogScr']>0){echo floatval($rest['tLogScr']);}?></b></td>	<?php */?> 	

<td class="d" align="center" bgcolor="#D5EAFF"><b><?php if($rest['tScor']>0){echo floatval($rest['tScor']);} ?></b></td>

	 <td class="d" align="center" bgcolor="#FFFFAE"><b><?php if($rest['tAppAch']>0){echo floatval($rest['tAppAch']);} ?></b></td>
	 <td class="d" align="" bgcolor="#FFFFFF"></td>	
	  
	 <?php /*?><td class="d" align="center" bgcolor="#FFFFAE"><b><?php if($rest['tAppLogScr']>0){echo floatval($rest['tAppLogScr']);} ?></b></td><?php */?>
	 	 	 
	  <td class="d" align="center" bgcolor="#FFFFAE"><b><?php if($rest['tAppScor']>0){echo floatval($rest['tAppScor']);} ?></b></td>
	 <td class="d" align="right" bgcolor="#FFFFFF">&nbsp;</td>
	</tr>
</form>	
   </table>
  </td>
 </tr>
 <tr><td style="height:20px;">&nbsp;</td></tr>

</table>
</center>
</body>
</html>
