<?php session_start();
if($_SESSION['login'] = true){require_once('../../Employee/sp/user/config/config.php');}
$y=$_REQUEST['y'];
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> /*background-color:#D9D9FF;background-color:#EEEEEE; */
.htf{font-family:Times New Roman;;color:#000;font-weight:bold;text-align:center;font-size:18px;height:24px;}
.htf2{font-family:Times New Roman;;color:#000;font-weight:bold;text-align:center;font-size:12px;}
.tdf{ background-color:#FFFFFF;font-family:Times New Roman;font-size:14px;height:22px;color:#000000;}
.tdft{ background-color:#FFFF9D;font-family:Times New Roman;font-size:14px;height:22px;color:#000000;}
.tdf2{background-color:#FFFFC4;font-family:Times New Roman;;font-size:15px;height:22px;text-align:center;}
</style>
<script language="javascript" type="text/javascript">
function printfun(){ window.print(); }
</script>
</head>
<body style="background-color:#FFF;" onLoad="printfun()">
<?php 
if($_REQUEST['id']>0)
{ 
$sql=mysql_query("select * from fa_details where FaId=".$_REQUEST['id'],$con);$res=mysql_fetch_assoc($sql);if($res['Mode']==1){$mode='Direct(Sales Executive)';}elseif($res['Mode']==2){$mode='Teamlease';}elseif($res['Mode']==3){$mode='Distributor';} 
$sc=mysql_query("select CountryName,StateName,HqName,s.CountryId,h.StateId from hrm_headquater h inner join hrm_state s on h.StateId=s.StateId inner join hrm_country c on s.CountryId=c.CountryId where h.HqId=".$res['HqId'], $con); $rc=mysql_fetch_assoc($sc); 
} 
?>  

<table class="table">
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
	 <tr>
	  <td valign="top" width="100%" id="MainWindow">
<?php //***************START*****START*****START******START******START***************************?>
<table border="0" style="margin-top:0px;width:100%;height:150px;">	
<tr><td style="width:100%;" class="htf" align="center"><b><u>Annual Expenses Reports</u></b></td></tr>
<tr><td style="width:100%;" class="htf2" align="center"><?php echo strtoupper($res['FaName']); ?></td></tr>
<tr><td style="width:100%;" class="htf2" align="center"><?php echo 'HQ:'.ucfirst(strtolower($rc['HqName'])).'('.strtoupper($rc['StateName']).')';?></td></tr>
<tr><td style="width:100%;" class="htf2" align="center"><?php echo 'YEAR:'.$_REQUEST['y']; ?></td></tr>

<tr>
 <td valign="top" style="width:100%;">
 <table border="0" style="width:100%;">
 <tr>
<td style="width:100%;">
 <table border="0" style="width:100%;">
  <tr>
   <td style="width:90%;" valign="top" align="center">
   <table border="1" cellspacing="0">
	  <tr style="height:22px;">
	  <td style="width:100px;" class="tdf2"><b>Month</b></td>
	  <td style="width:60px;" class="tdf2"><b>Present</b></td>
	  <td style="width:60px;" class="tdf2"><b>Absent</b></td>
	  <td style="width:80px;" class="tdf2"><b>Expense</b></td>
	  <td style="width:80px;" class="tdf2"><b>Slip</b></td>
	  <td style="width:80px;" class="tdf2"><b>Status</b></td>
	  </tr>
<?php for($m=1;$m<=12; $m++){ if($m==1){$Month='January';}elseif($m==2){$Month='February';}elseif($m==3){$Month='March';}elseif($m==4){$Month='April';}elseif($m==5){$Month='May';}elseif($m==6){$Month='June';}elseif($m==7){$Month='July';}elseif($m==8){$Month='August';}elseif($m==9){$Month='September';}elseif($m==10){$Month='October';}elseif($m==11){$Month='November';}elseif($m==12){$Month='December';} 
  if($m==1 OR $m==3 OR $m==5 OR $m==7 OR $m==8 OR $m==10 OR $m==12){ $day=31; } 
  elseif($m==4 OR $m==6 OR $m==9 OR $m==11){ $day=30; }
  elseif($m==2){ if($Y==2012 OR $Y==2016 OR $Y==2020 OR $Y==2024 OR $Y==2028 OR $Y==2032 OR $Y==2036 OR $Y==2040 OR $Y==2044 OR $Y==2048 OR $Y==2052 OR $Y==2056 OR $Y==2060){$day=29;}else{$day=28;} } 
?>
<tr style="height:22px;" bgcolor="#FFFFFF">	 
	 <td class="tdf" align="center"><?php echo $Month; ?></td>
	 
<?php $p=mysql_query("select count(Attv)as P from fa_attd where Attv='P' AND FaId=".$_REQUEST['id']." AND (Attd between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$day)."')",$con); $rp=mysql_fetch_assoc($p); 
$a=mysql_query("select count(Attv)as A from fa_attd where Attv='A' AND FaId=".$res['FaId']." AND (Attd between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$day)."')",$con); $ra=mysql_fetch_assoc($a); 
$sal=mysql_query("select * from fa_salary where FaId=".$_REQUEST['id']." AND Month=".$m." AND Year=".$y,$con); 
$rowS=mysql_num_rows($sal); $resS=mysql_fetch_assoc($sal); ?>	  	 
	 <td class="tdf" align="center"><?php if($resS['TotP']>0){echo floatval($resS['TotP']);}elseif($rp['P']>0){echo $rp['P'];} ?></td><td class="tdf" align="center"><?php if($resS['TotA']>0){echo floatval($resS['TotA']);}elseif($ra['A']>0){echo $ra['A'];} ?></td>
	 
<?php $sal=mysql_query("select * from fa_salary where FaId=".$_REQUEST['id']." AND Month=".$m." AND Year=".$_REQUEST['y'],$con); $rowS=mysql_num_rows($sal); $resS=mysql_fetch_assoc($sal); ?>	 
<td class="tdf" align="right"><?php if($resS['ActualSal']>0 OR $resS['ActualExp']>0){echo floatval($resS['ActualSal']+$resS['ActualExp']);} ?>&nbsp;</td>
	 
	 <td class="tdf" align="center"><?php if($rowS>0){ if($resS['Status']==2 AND $resS['Slip']!=''){echo 'Attach'; } elseif($resS['Status']==0 OR $resS['Status']=1){echo ''; } }else{echo '';}?></td>
	 
	 <td class="tdf" align="center"><?php if($rowS>0){ if($resS['Status']==0){echo 'Draft';}elseif($resS['Status']==1){echo 'Pending';}elseif($resS['Status']==2){echo 'Paid';}elseif($resS['Status']==3){echo 'Reject'; }  }else{echo '';} ?></td>  
	</tr> 
<?php } ?>
    <tr style="height:22px;">	 
	 <td class="tdft" align="right"><b>Total:</b>&nbsp;</td>
	 
<?php $pt=mysql_query("select count(Attv)as P from fa_attd where Attv='P' AND FaId=".$_REQUEST['id']." AND (Attd between '".date($y."-01-01")."' AND '".date($y."-12-31")."')",$con); $rpt=mysql_fetch_assoc($pt); 
$at=mysql_query("select count(Attv)as A from fa_attd where Attv='A' AND FaId=".$res['FaId']." AND (Attd between '".date($y."-01-01")."' AND '".date($y."-12-31")."')",$con); $rat=mysql_fetch_assoc($at); 
$salt=mysql_query("select sum(TotP)as tP,sum(TotA)as tA from fa_salary where FaId=".$_REQUEST['id']." AND Year=".$y,$con); 
$rowSt=mysql_num_rows($salt); $resSt=mysql_fetch_assoc($salt);?>	
	 <td class="tdft" align="center"><?php if($resSt['tP']>0){echo floatval($resSt['tP']);}elseif($rpt['P']>0){echo $rpt['P'];} ?></td><td class="tdft" align="center"><?php if($resSt['tA']>0){echo floatval($resSt['tA']);}elseif($rat['A']>0){echo $rat['A'];} ?></td>
	 
<?php $sal=mysql_query("select SUM(ActualSal) as sal,SUM(ActualExp) as exp from fa_salary where FaId=".$_REQUEST['id']." AND Year=".$_REQUEST['y'],$con); $rowS=mysql_num_rows($sal); $resS=mysql_fetch_assoc($sal); ?>	 
<td class="tdft" align="right"><?php if($resS['sal']>0 OR $resS['exp']>0){echo floatval($resS['sal']+$resS['exp']);} ?>&nbsp;</td>
	 
	 <td colspan="2" class="tdf" align="center"></td>  
	</tr>  
    
    
     </table>
</td>  
  </tr>
 </table>
 </td>
</tr>
</table>	

<?php //*****************END*****END*****END******END******END**************************?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>
