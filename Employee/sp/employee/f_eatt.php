<?php session_start();
if($_SESSION['login'] = true){require_once('../user/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../../../index.php');}
$EmployeeId=$_SESSION['EmployeeID'];
$m=$_REQUEST['m']; $y=$_REQUEST['y']; $hq=$_REQUEST['hq']; $s=$_REQUEST['s']; $md=$_REQUEST['md']; $rsts=$_REQUEST['rsts'];
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> /*background-color:#D9D9FF;  background-color:#EEEEEE; */
.cell {color:#000;font-family:Times New Roman;font-size:14px;font-weight:bold;}
.htf{font-family:Georgia;color:#000;font-weight:bold;text-align:center;font-size:12px;background-color:#97FFFF;}
.htf2{font-family:Georgia;color:#FF80FF;font-weight:bold;text-align:center;font-size:18px;height:24px;}
.tdf{font-family:Georgia;font-size:12px;height:20px;color:#fff;}
.tdf2{font-family:Georgia;font-size:12px;height:20px;color:#000000;}
.InputSel {font-family:Georgia;font-size:12px;text-align:left; }
.InputSelAtt {font-family:Times New Roman;font-size:12px;text-align:left; }
.InputType {font-family:Georgia;font-size:12px;text-align:left; height:20px; border:hidden; }
.InputType2 {font-family:Georgia;font-size:12px;border:hidden;}
.SaveButton {background-image:url(images/save.png);width:18px;height:18px;background-repeat:no-repeat;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script language="javascript">
function FunRef(m,y,s,hq){ window.location="f_eatt.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq; }

function funmonth(m,y,s,hq)
{ window.location="f_eatt.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0"; }
function funyear(y,m,s,hq)
{ window.location="f_eatt.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0";}
function funstate(s,m,y)
{ window.location="f_eatt.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq=0&dis=0"; }
function funhq(hq,m,y,s)
{ window.location="f_eatt.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0"; }


function FucChk(sn)
{ if(document.getElementById("Chk"+sn).checked==true){document.getElementById("TR"+sn).style.background='#9BEF47'; document.getElementById("mode"+sn).style.background='#9BEF47';  document.getElementById("hq"+sn).style.background='#9BEF47'; document.getElementById("state"+sn).style.background='#9BEF47'; 
 }
  else if(document.getElementById("Chk"+sn).checked==false){document.getElementById("TR"+sn).style.background='#FFFFFF'; document.getElementById("mode"+sn).style.background='#FFFFFF'; document.getElementById("hq"+sn).style.background='#FFFFFF'; document.getElementById("state"+sn).style.background='#FFFFFF'; }
}

</Script>
</head>
<body class="body">
<span id="AttMsgSpan"></span>
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login']=true){ require_once("EMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" width="100%" id="MainWindow">
<!DOCTYPE html>
<html>
<?php //***************START*****START*****START******START******START***************************?>
<?php if($m==1){$Month='JANUARY';}elseif($m==2){$Month='FEBRUARY';}elseif($m==3){$Month='MARCH';}elseif($m==4){$Month='APRIL';}elseif($m==5){$Month='MAY';}elseif($m==6){$Month='JUNE';}elseif($m==7){$Month='JULY';}elseif($m==8){$Month='AUGUST';}elseif($m==9){$Month='SEPTEMBER';}elseif($m==10){$Month='OCTOBER';}elseif($m==11){$Month='NOVEMBER';}elseif($m==12){$Month='DECEMBER';} 
  if($m==1 OR $m==3 OR $m==5 OR $m==7 OR $m==8 OR $m==10 OR $m==12){ $day=31; } 
  elseif($m==4 OR $m==6 OR $m==9 OR $m==11){ $day=30; }
  elseif($m==2){ if($Y==2012 OR $Y==2016 OR $Y==2020 OR $Y==2024 OR $Y==2028 OR $Y==2032 OR $Y==2036 OR $Y==2040 OR $Y==2044 OR $Y==2048 OR $Y==2052 OR $Y==2056 OR $Y==2060){$day=29;}else{$day=28;} } 
?>
<table border="0" style="margin-top:0px;width:100%;height:150px;">	
<tr>
 <td valign="top" style="width:100%;">
 <table border="0" style="width:100%;">
 <tr>
<td style="width:100%;">
 <table border="0" style="width:100%;">
  <td style="width:100%;" valign="top">
<?php $tot=(35*$day)+500; ?>  
   <table style="width:<?php echo $tot; ?>px;" border="0" cellpadding="0" cellspacing="1">
    <tr>
	 <td colspan="35">
	  <table>
	   <tr>
	    <td colspan="2" class="htf2" style="width:180px;" align="left"><u>FA Attendance</u></td>
	    <td style="font-family:Georgia;color:#FF80FF;font-weight:bold;font-size:12px; width:80px;"><span style="cursor:pointer;color:#FFFF6A;" onClick="FunRef(<?php echo $m.','.$y.','.$_REQUEST['s'].','.$_REQUEST['hq']; ?>)"><u>refresh</u></span></td>
	    <td class="tdf" align="center">&nbsp;<input type="hidden" style="width:120px;" class="InputSel" id="state" name="state" value="<?php echo $s;?>" /></td>
		<td class="tdf">&nbsp;Month</td>
	    <td class="tdf" align="center">:</td>
		<td><select style="width:100px;" class="InputSel" id="month" name="month" onChange="funmonth(this.value,<?php echo $y.','.$_REQUEST['s'].','.$_REQUEST['hq']; ?>)"><option value="<?php echo $m; ?>" selected="selected"><?php echo $Month; ?></option><?php for($i=1;$i<=12;$i++){ if($i!=$m){ ?>
		   <option value="<?php echo $i; ?>"><?php if($i==1){echo 'JANUARY';}elseif($i==2){echo 'FEBRUARY';}elseif($i==3){echo 'MARCH';}elseif($i==4){echo 'APRIL';}elseif($i==5){echo 'MAY';}elseif($i==6){echo 'JUNE';}elseif($i==7){echo 'JULY';}elseif($i==8){echo 'AUGUST';}elseif($i==9){echo 'SEPTEMBER';}elseif($i==10){echo 'OCTOBER';}elseif($i==11){echo 'NOVEMBER';}elseif($i==12){echo 'DECEMBER';} ?></option><?php }} ?></select></td>
		 
		<td class="tdf">&nbsp;Year</td>
	    <td class="tdf" align="center">:</td>
		<td><select style="width:100px;" class="InputSel" id="year" name="year" onChange="funyear(this.value,<?php echo $m.','.$_REQUEST['s'].','.$_REQUEST['hq']; ?>)"><option value="<?php echo $y; ?>" selected="selected"><?php echo $y; ?></option><?php for($j=2015;$j<=date("Y");$j++){ if($j!=$y){ ?>
		   <option value="<?php echo $j; ?>"><?php echo $j; ?></option><?php }} ?></select></td>   
		
	 <td class="tdf">&nbsp;HeadQuarter</td>
	 <td class="tdf" style="width:10px;" align="center">:</td>
	 <td style="width:150px;"><select style="width:120px;" class="InputSel" id="hq" name="hq" onChange="funhq(this.value,<?php echo $m.','.$y.','.$_REQUEST['s']; ?>)"><?php if($_REQUEST['hq']==9999){ ?><option value="9999">All HeadQuarter</option><?php } elseif($_REQUEST['hq']>0 AND $_REQUEST['hq']<=9998){ $shq=mysql_query("select HqName from hrm_headquater where HqId=".$_REQUEST['hq'],$con); $rhq=mysql_fetch_assoc($shq); ?><option value='<?php echo $_REQUEST['hq'];?>' selected><?php echo ucfirst(strtolower($rhq['HqName']));?></option><?php } else { ?><option value="0" selected>select</option><?php } ?><?php $sqlhq=mysql_query("select * from hrm_headquater hq inner join hrm_sales_hq_temp hqt on hq.HqId=hqt.HqId where hqt.EmployeeID=".$EmployeeId." group by HqName order by HqName asc",$con); $rowhq=mysql_num_rows($sqlhq); while($reshq=mysql_fetch_assoc($sqlhq)){ ?><option value="<?php echo $reshq['HqId']; ?>"><?php echo ucfirst(strtolower($reshq['HqName'])); ?></option><?php } if($rowhq>0){ ?><option value="9999">All HQ</option><?php } ?></select></td>
	   </tr>
	  </table>
	 </td>
	</tr>

	<tr>
	  <td rowspan="2" style="width:50px;" class="htf">&nbsp;</td>
      <td rowspan="2" style="width:30px;" class="htf">&nbsp;Sn&nbsp;</td>
      <td rowspan="2" style="width:200px;" class="htf">Name</td>
	  <td rowspan="2" style="width:150px;" class="htf">Mode</td>
	  <td rowspan="2" style="width:90px;" class="htf">Hq</td>
	  <td rowspan="2" style="width:90px;" class="htf">State</td>
	  <td colspan="2" class="htf">Total</td>
	  <td colspan="<?php echo $day; ?>" class="htf"></td>
	</tr>
	<tr>
	 <td class="htf" width="40">P</td>
     <td class="htf" width="40">A</td>
	 <?php for($i=1; $i<=$day; $i++) { ?> 
      <td align="center" class="cell" bgcolor="<?php if(date("w",strtotime(date($y.'-'.$m.'-'.$i)))==0) {echo '#6B983A';}else{echo '#97FFFF';}?>" width="35"><?php echo $i; ?></td>
	  <?php } $Ci=$i-1; echo '<input type="hidden" id="ColNo" value="'.$Ci.'" />'; ?>
	</tr>
<?php if($_REQUEST['hq']==9999){ $sql=mysql_query("select * from fa_details fd inner join hrm_sales_hq_temp hqt on fd.HqId=hqt.HqId where hqt.EmployeeID=".$EmployeeId." AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' order by FaId ASC",$con); }elseif($_REQUEST['hq']>0 AND $_REQUEST['hq']<=9998){ $sql=mysql_query("select * from fa_details where HqId=".$_REQUEST['hq']." AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' order by FaId ASC",$con);}

      $sn=1; while($res=mysql_fetch_array($sql)){ $hq=mysql_query("select HqName,StateName from hrm_headquater hq inner join hrm_state st on hq.StateId=st.StateId where hq.HqId=".$res['HqId'],$con); $rhq=mysql_fetch_assoc($hq);?>
    <tr bgcolor="#FFFFFF" id="TR<?php echo $sn; ?>">
      <td align="center" class="tdf2" style="width:50px;"><input type="checkbox" id="Chk<?php echo $sn; ?>" onClick="FucChk(<?php echo $sn; ?>)" /></td>
	  <td class="tdf2" align="center"><?php echo $sn; ?></td>
	  <td class="tdf2">&nbsp;<?php echo $res['FaName']; ?></td>
	  <td class="tdf2"><input class="InputType" style="width:150px;" id="mode<?php echo $sn; ?>" value="<?php if($res['Mode']==1){echo 'Direct(Sales Executive)';}elseif($res['Mode']==2){echo 'Teamlease';}elseif($res['Mode']==3){echo 'Distributor';}?>" readonly/></td>
	  <td class="tdf2"><input class="InputType" style="width:90px;" id="hq<?php echo $sn; ?>" value="<?php echo ucfirst(strtolower($rhq['HqName'])); ?>"/></td>
	  <td class="tdf2"><input class="InputType" style="width:90px;" id="state<?php echo $sn; ?>" value="<?php echo ucfirst(strtolower($rhq['StateName'])); ?>"/></td>

<?php $p=mysql_query("select count(Attv)as P from fa_attd where Attv='P' AND FaId=".$res['FaId']." AND (Attd between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$day)."')",$con); $rp=mysql_fetch_assoc($p); 
$a=mysql_query("select count(Attv)as A from fa_attd where Attv='A' AND FaId=".$res['FaId']." AND (Attd between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$day)."')",$con); $ra=mysql_fetch_assoc($a); ?>	  
<td class="tdf2" align="center" style="background-color:#FFD1A4;"><?php if($rp['P']>0){echo $rp['P'];} ?></td>
<td class="tdf2" align="center" style="background-color:#FFD1A4;"><?php if($ra['A']>0){echo $ra['A'];} ?></td>
	  
	 <?php for($i=1; $i<=$day; $i++){ $sqlF=mysql_query("select * from fa_attd where FaId=".$res['FaId']." AND Attd='".date($y."-".$m."-".$i)."'", $con); $resF=mysql_fetch_array($sqlF); ?>
    <td align="center" class="tdf2" valign="middle" width="35" bgcolor="<?php if(date("w",strtotime(date($y.'-'.$m.'-'.$i)))==0) {echo '#6B983A';}?>"><?php if($resF['Attv']==''){ echo ''; } else {echo $resF['Attv'];} ?></td>
<?php } ?>
	</tr>
<?php $sn++; } ?> 
   </table>
  </td>
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
