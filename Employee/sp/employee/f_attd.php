<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}
$m=$_REQUEST['m']; $y=$_REQUEST['y']; 
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
.tdf2{background-color:#FFFFFF;font-family:Georgia;font-size:12px;height:20px;color:#000000;}
.InputSel {font-family:Georgia;font-size:12px;text-align:left; }
.InputSelAtt {font-family:Times New Roman;font-size:12px;text-align:left; }
.InputType {font-family:Georgia;font-size:12px;text-align:left; height:20px; border:hidden; }
.InputType2 {font-family:Georgia;font-size:12px;border:hidden;}
.SaveButton {background-image:url(images/save.png);width:18px;height:18px;background-repeat:no-repeat;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script language="javascript">
function FunRef(m,y,s,hq){ window.location="f_attd.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq; }

function ClickEdit(sn,fi,m,y)
{ var Ci=document.getElementById("ColNo").value; document.getElementById(sn+"_BtnEdit").style.display='none'; document.getElementById(sn+"_BtnSave").style.display='block'; 
 for(var i=1; i<=Ci; i++){document.getElementById(sn+"_"+i).disabled=false; document.getElementById("btnTd_"+fi).style.background='#D7FFAE'; }
}

function ClickSave(sn,fi,m,y)
{  var Ci=document.getElementById("ColNo").value;
   if(Ci==28){ var url = 'f_addAtt.php';	var pars = 'action=add&m='+m+'&y='+y+'&fi='+fi+'&e_1='+document.getElementById(sn+"_1").value+'&e_2='+document.getElementById(sn+"_2").value+'&e_3='+document.getElementById(sn+"_3").value+'&e_4='+document.getElementById(sn+"_4").value+'&e_5='+document.getElementById(sn+"_5").value+'&e_6='+document.getElementById(sn+"_6").value+'&e_7='+document.getElementById(sn+"_7").value+'&e_8='+document.getElementById(sn+"_8").value+'&e_9='+document.getElementById(sn+"_9").value+'&e_10='+document.getElementById(sn+"_10").value+'&e_11='+document.getElementById(sn+"_11").value+'&e_12='+document.getElementById(sn+"_12").value+'&e_13='+document.getElementById(sn+"_13").value+'&e_14='+document.getElementById(sn+"_14").value+'&e_15='+document.getElementById(sn+"_15").value+'&e_16='+document.getElementById(sn+"_16").value+'&e_17='+document.getElementById(sn+"_17").value+'&e_18='+document.getElementById(sn+"_18").value+'&e_19='+document.getElementById(sn+"_19").value+'&e_20='+document.getElementById(sn+"_20").value+'&e_21='+document.getElementById(sn+"_21").value+'&e_22='+document.getElementById(sn+"_22").value+'&e_23='+document.getElementById(sn+"_23").value+'&e_24='+document.getElementById(sn+"_24").value+'&e_25='+document.getElementById(sn+"_25").value+'&e_26='+document.getElementById(sn+"_26").value+'&e_27='+document.getElementById(sn+"_27").value+'&e_28='+document.getElementById(sn+"_28").value+'&Ci='+Ci+'&sn='+sn; var myAjax = new Ajax.Request(
   url, { 	method: 'post',  parameters: pars, 	onComplete: show_EditAttendance });
   }
   if(Ci==29){ var url = 'f_addAtt.php';	var pars = 'action=add&m='+m+'&y='+y+'&fi='+fi+'&e_1='+document.getElementById(sn+"_1").value+'&e_2='+document.getElementById(sn+"_2").value+'&e_3='+document.getElementById(sn+"_3").value+'&e_4='+document.getElementById(sn+"_4").value+'&e_5='+document.getElementById(sn+"_5").value+'&e_6='+document.getElementById(sn+"_6").value+'&e_7='+document.getElementById(sn+"_7").value+'&e_8='+document.getElementById(sn+"_8").value+'&e_9='+document.getElementById(sn+"_9").value+'&e_10='+document.getElementById(sn+"_10").value+'&e_11='+document.getElementById(sn+"_11").value+'&e_12='+document.getElementById(sn+"_12").value+'&e_13='+document.getElementById(sn+"_13").value+'&e_14='+document.getElementById(sn+"_14").value+'&e_15='+document.getElementById(sn+"_15").value+'&e_16='+document.getElementById(sn+"_16").value+'&e_17='+document.getElementById(sn+"_17").value+'&e_18='+document.getElementById(sn+"_18").value+'&e_19='+document.getElementById(sn+"_19").value+'&e_20='+document.getElementById(sn+"_20").value+'&e_21='+document.getElementById(sn+"_21").value+'&e_22='+document.getElementById(sn+"_22").value+'&e_23='+document.getElementById(sn+"_23").value+'&e_24='+document.getElementById(sn+"_24").value+'&e_25='+document.getElementById(sn+"_25").value+'&e_26='+document.getElementById(sn+"_26").value+'&e_27='+document.getElementById(sn+"_27").value+'&e_28='+document.getElementById(sn+"_28").value+'&Ci='+Ci+'&sn='+sn+'&e_29='+document.getElementById(sn+"_29").value; var myAjax = new Ajax.Request(
   url, { 	method: 'post',  parameters: pars, 	onComplete: show_EditAttendance });
   }
   else if(Ci==30){ var url = 'f_addAtt.php';	var pars = 'action=add&m='+m+'&y='+y+'&fi='+fi+'&e_1='+document.getElementById(sn+"_1").value+'&e_2='+document.getElementById(sn+"_2").value+'&e_3='+document.getElementById(sn+"_3").value+'&e_4='+document.getElementById(sn+"_4").value+'&e_5='+document.getElementById(sn+"_5").value+'&e_6='+document.getElementById(sn+"_6").value+'&e_7='+document.getElementById(sn+"_7").value+'&e_8='+document.getElementById(sn+"_8").value+'&e_9='+document.getElementById(sn+"_9").value+'&e_10='+document.getElementById(sn+"_10").value+'&e_11='+document.getElementById(sn+"_11").value+'&e_12='+document.getElementById(sn+"_12").value+'&e_13='+document.getElementById(sn+"_13").value+'&e_14='+document.getElementById(sn+"_14").value+'&e_15='+document.getElementById(sn+"_15").value+'&e_16='+document.getElementById(sn+"_16").value+'&e_17='+document.getElementById(sn+"_17").value+'&e_18='+document.getElementById(sn+"_18").value+'&e_19='+document.getElementById(sn+"_19").value+'&e_20='+document.getElementById(sn+"_20").value+'&e_21='+document.getElementById(sn+"_21").value+'&e_22='+document.getElementById(sn+"_22").value+'&e_23='+document.getElementById(sn+"_23").value+'&e_24='+document.getElementById(sn+"_24").value+'&e_25='+document.getElementById(sn+"_25").value+'&e_26='+document.getElementById(sn+"_26").value+'&e_27='+document.getElementById(sn+"_27").value+'&e_28='+document.getElementById(sn+"_28").value+'&Ci='+Ci+'&sn='+sn+'&e_29='+document.getElementById(sn+"_29").value+'&e_30='+document.getElementById(sn+"_30").value; var myAjax = new Ajax.Request(
   url, { 	method: 'post',  parameters: pars, 	onComplete: show_EditAttendance });
   }
   else if(Ci==31){ var url = 'f_addAtt.php'; var pars = 'action=add&m='+m+'&y='+y+'&fi='+fi+'&e_1='+document.getElementById(sn+"_1").value+'&e_2='+document.getElementById(sn+"_2").value+'&e_3='+document.getElementById(sn+"_3").value+'&e_4='+document.getElementById(sn+"_4").value+'&e_5='+document.getElementById(sn+"_5").value+'&e_6='+document.getElementById(sn+"_6").value+'&e_7='+document.getElementById(sn+"_7").value+'&e_8='+document.getElementById(sn+"_8").value+'&e_9='+document.getElementById(sn+"_9").value+'&e_10='+document.getElementById(sn+"_10").value+'&e_11='+document.getElementById(sn+"_11").value+'&e_12='+document.getElementById(sn+"_12").value+'&e_13='+document.getElementById(sn+"_13").value+'&e_14='+document.getElementById(sn+"_14").value+'&e_15='+document.getElementById(sn+"_15").value+'&e_16='+document.getElementById(sn+"_16").value+'&e_17='+document.getElementById(sn+"_17").value+'&e_18='+document.getElementById(sn+"_18").value+'&e_19='+document.getElementById(sn+"_19").value+'&e_20='+document.getElementById(sn+"_20").value+'&e_21='+document.getElementById(sn+"_21").value+'&e_22='+document.getElementById(sn+"_22").value+'&e_23='+document.getElementById(sn+"_23").value+'&e_24='+document.getElementById(sn+"_24").value+'&e_25='+document.getElementById(sn+"_25").value+'&e_26='+document.getElementById(sn+"_26").value+'&e_27='+document.getElementById(sn+"_27").value+'&e_28='+document.getElementById(sn+"_28").value+'&Ci='+Ci+'&sn='+sn+'&e_29='+document.getElementById(sn+"_29").value+'&e_30='+document.getElementById(sn+"_30").value+'&e_31='+document.getElementById(sn+"_31").value; var myAjax = new Ajax.Request(
   url, { 	method: 'post',  parameters: pars, 	onComplete: show_EditAttendance });
   }
}

function show_EditAttendance(originalRequest)
{ document.getElementById('AttMsgSpan').innerHTML = originalRequest.responseText; 
  var sn=document.getElementById("sn").value; var fi=document.getElementById("fi").value;
  document.getElementById(sn+"_BtnEdit").style.display='block'; 
  document.getElementById(sn+"_BtnSave").style.display='none';
  document.getElementById("btnTd_"+fi).style.background='#ACDBFD';
  document.getElementById("P_"+fi).value=document.getElementById("Pr").value;
  document.getElementById("A_"+fi).value=document.getElementById("Ab").value;
}

function funmonth(m,y,s,hq)
{ window.location="f_attd.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0"; }
function funyear(y,m,s,hq)
{ window.location="f_attd.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0";}
function funstate(s,m,y)
{ window.location="f_attd.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq=0&dis=0"; }
function funhq(hq,m,y,s)
{ window.location="f_attd.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0"; }

function funDetail(id)
{ var win = window.open("f_details.php?id="+id,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=750,height=500");}

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
	    <td class="tdf" align="center">&nbsp;</td>
		<td class="tdf">&nbsp;Month</td>
	    <td class="tdf" align="center">:</td>
		<td><select style="width:100px;" class="InputSel" id="month" name="month" onChange="funmonth(this.value,<?php echo $y.','.$_REQUEST['s'].','.$_REQUEST['hq']; ?>)"><option value="<?php echo $m; ?>" selected="selected"><?php echo $Month; ?></option><?php for($i=1;$i<=12;$i++){ if($i!=$m){ ?>
		   <option value="<?php echo $i; ?>"><?php if($i==1){echo 'JANUARY';}elseif($i==2){echo 'FEBRUARY';}elseif($i==3){echo 'MARCH';}elseif($i==4){echo 'APRIL';}elseif($i==5){echo 'MAY';}elseif($i==6){echo 'JUNE';}elseif($i==7){echo 'JULY';}elseif($i==8){echo 'AUGUST';}elseif($i==9){echo 'SEPTEMBER';}elseif($i==10){echo 'OCTOBER';}elseif($i==11){echo 'NOVEMBER';}elseif($i==12){echo 'DECEMBER';} ?></option><?php }} ?></select></td>
		 
		<td class="tdf">&nbsp;Year</td>
	    <td class="tdf" align="center">:</td>
		<td><select style="width:100px;" class="InputSel" id="year" name="year" onChange="funyear(this.value,<?php echo $m.','.$_REQUEST['s'].','.$_REQUEST['hq']; ?>)"><option value="<?php echo $y; ?>" selected="selected"><?php echo $y; ?></option><?php for($j=2015;$j<=date("Y");$j++){ if($j!=$y){ ?>
		   <option value="<?php echo $j; ?>"><?php echo $j; ?></option><?php }} ?></select></td>   
		
	    <td class="tdf">&nbsp;State</td>
	    <td class="tdf" align="center">:</td>
		<td><select style="width:150px;" class="InputSel" id="state" name="state" onChange="funstate(this.value,<?php echo $m.','.$y; ?>)">
<?php if($_REQUEST['s']>0){ $ss=mysql_query("select StateName from hrm_state where StateId=".$_REQUEST['s'],$con); $rs=mysql_fetch_assoc($ss); ?><option value='<?php echo $_REQUEST['s'];?>' selected><?php echo ucfirst(strtolower($rs['StateName']));?></option><?php } if($_REQUEST['s']=='All'){ ?><option value="All" selected>All</option><?php } ?><?php $sqls=mysql_query("select StateId,StateName from hrm_state group by StateName order by StateName ASC",$con); while($ress=mysql_fetch_assoc($sqls)){ ?><option value="<?php echo $ress['StateId']; ?>"><?php echo ucfirst(strtolower($ress['StateName'])); ?></option><?php } ?><option value="All">All</option></select></td>
	 <td class="tdf">&nbsp;HeadQuarter</td>
	 <td class="tdf" style="width:10px;" align="center">:</td>
	 <td style="width:150px;"><select style="width:150px;" class="InputSel" id="hq" name="hq" onChange="funhq(this.value,<?php echo $m.','.$y.','.$_REQUEST['s']; ?>)"><?php if($_REQUEST['hq']>0){ $shq=mysql_query("select HqName from hrm_headquater where HqId=".$_REQUEST['hq'],$con); $rhq=mysql_fetch_assoc($shq); ?><option value='<?php echo $_REQUEST['hq'];?>' selected><?php echo ucfirst(strtolower($rhq['HqName']));?></option><?php } if($_REQUEST['s']>0){ ?><option value="0">select</option><?php $sqlhq=mysql_query("select * from hrm_headquater where StateId=".$_REQUEST['s']." group by HqName order by HqName asc",$con); while($reshq=mysql_fetch_assoc($sqlhq)){ ?><option value="<?php echo $reshq['HqId']; ?>"><?php echo ucfirst(strtolower($reshq['HqName'])); ?></option><?php } } else { ?><option value="0">Select</option><?php $sqlhq2=mysql_query("select * from hrm_headquater group by HqName order by HqName asc",$con); while($reshq2=mysql_fetch_assoc($sqlhq2)){ ?><option value="<?php echo $reshq2['HqId']; ?>"><?php echo ucfirst(strtolower($reshq2['HqName'])); ?></option><?php } } ?></select></td>
	   </tr>
	  </table>
	 </td>
	</tr>

	<tr>
      <td rowspan="2" style="width:30px;" class="htf">&nbsp;Sn&nbsp;</td>
      <td rowspan="2" style="width:200px;" class="htf">Name</td>
	  <td rowspan="2" style="width:90px;" class="htf">Fa Hq</td>
	  <td rowspan="2" style="width:90px;" class="htf">State</td>
	  <td colspan="2" class="htf">Total</td>
	  <td rowspan="2" style="width:50px;" class="htf">&nbsp;&nbsp;Edit&nbsp;&nbsp;</td>
	  <td colspan="<?php echo $day; ?>" class="htf"></td>
	</tr>
	<tr>
	 <td class="htf" width="40">P</td>
     <td class="htf" width="40">A</td>
	 <?php for($i=1; $i<=$day; $i++) { ?> 
      <td align="center" class="cell" bgcolor="<?php if(date("w",strtotime(date($y.'-'.$m.'-'.$i)))==0) {echo '#6B983A';}else{echo '#97FFFF';}?>" width="35"><?php echo $i; ?></td>
	  <?php } $Ci=$i-1; echo '<input type="hidden" id="ColNo" value="'.$Ci.'" />'; ?>
	</tr>
<?php if($_REQUEST['s']=='All'){ $sql=mysql_query("select * from fa_details where ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' order by FaId ASC",$con); } elseif($_REQUEST['hq']>0){ $sql=mysql_query("select * from fa_details where HqId=".$_REQUEST['hq']." AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' order by FaId ASC",$con); }elseif($_REQUEST['s']>0){ $sql=mysql_query("select * from fa_details f inner join hrm_headquater hq on f.HqId=hq.HqId where hq.StateId=".$_REQUEST['s']." AND ((FaStatus='A' AND (f.LWD='0000-00-00' OR f.LWD='1970-01-01')) OR (FaStatus='D' AND f.LWD>='".date($y."-".$m."-01")."')) AND f.DOJ<='".date($y."-".$m."-31")."' order by FaId ASC",$con);}
      $sn=1; while($res=mysql_fetch_array($sql)){ $hq=mysql_query("select HqName,StateName from hrm_headquater hq inner join hrm_state st on hq.StateId=st.StateId where hq.HqId=".$res['HqId'],$con); $rhq=mysql_fetch_assoc($hq);?>
    <tr id="btnTRR_<?php echo $res['FaId'];?>">
	  <td class="tdf2" align="center"><?php echo $sn; ?></td>
	  <td class="tdf2">&nbsp;<span style="cursor:pointer;color:#0079F2;" onClick="funDetail(<?php echo $res['FaId']; ?>)"><u><?php echo $res['FaName']; ?></u></span></td>
	  <td class="tdf2"><input class="InputType" style="width:90px;" value="<?php echo ucfirst(strtolower($res['OtherHq'])); ?>"/></td>
	  <td class="tdf2"><input class="InputType" style="width:90px;" value="<?php echo ucfirst(strtolower($rhq['StateName'])); ?>"/></td>

<?php $p=mysql_query("select count(Attv)as P from fa_attd where Attv='P' AND FaId=".$res['FaId']." AND (Attd between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$day)."')",$con); $rp=mysql_fetch_assoc($p); 
$a=mysql_query("select count(Attv)as A from fa_attd where Attv='A' AND FaId=".$res['FaId']." AND (Attd between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$day)."')",$con); $ra=mysql_fetch_assoc($a); ?>	  
	  <td class="tdf2" align="center"><input class="InputType" id="P_<?php echo $res['FaId']; ?>" style="width:40px;text-align:center;background-color:#FFFFAE;" value="<?php if($rp['P']>0){echo $rp['P'];} ?>" readonly/></td>
      <td class="tdf2" align="center"><input class="InputType" id="A_<?php echo $res['FaId']; ?>" style="width:40px;text-align:center;background-color:#FFFFAE;" value="<?php if($ra['A']>0){echo $ra['A'];} ?>" readonly/></td>
	  
	  <td bgcolor="#FFFFFF" align="center" id="btnTd_<?php echo $res['FaId']; ?>">
<img src="images/edit.png" border="0" id="<?php echo $sn; ?>_BtnEdit" onClick="ClickEdit(<?php echo $sn.', '.$res['FaId'].', '.$m.', '.$y; ?>)" style="display:block;">
<img src="images/save.gif" border="0" id="<?php echo $sn; ?>_BtnSave" onClick="ClickSave(<?php echo $sn.', '.$res['FaId'].', '.$m.', '.$y; ?>)" style="display:none;">
     </td>
	 <?php for($i=1; $i<=$day; $i++){ $sqlF=mysql_query("select * from fa_attd where FaId=".$res['FaId']." AND Attd='".date($y."-".$m."-".$i)."'", $con); $resF=mysql_fetch_array($sqlF); ?>
    <td align="center" valign="middle" width="35" id="TDId_<?php echo $i.'_'.$sn; ?>" bgcolor="<?php if(date("w",strtotime(date($y.'-'.$m.'-'.$i)))==0) {echo '#6B983A';}else{echo '#fff';}?>">
<select name="<?php echo $sn.'_'.$i; ?>" id="<?php echo $sn.'_'.$i; ?>" class="InputSel" style="width:35px;" disabled><option value="<?php echo $resF['Attv'];?>"><?php if($resF['Attv']==''){ echo ''; } else {echo $resF['Attv'];} ?></option>
<option value="P">P</option><option value="A">A</option><option value=""></option></select>
    </td>
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
