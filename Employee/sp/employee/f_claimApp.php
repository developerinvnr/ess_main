<?php session_start();
if($_SESSION['login'] = true){require_once('../user/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../../../index.php');}
$EmployeeId=$_SESSION['EmployeeID'];
$m=$_REQUEST['m']; $y=$_REQUEST['y']; $hq=$_REQUEST['hq']; $s=$_REQUEST['s']; $md=$_REQUEST['md'];
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> /*background-color:#D9D9FF;  background-color:#EEEEEE; */
.cell {color:#000;font-family:Times New Roman;font-size:14px;font-weight:bold;}
.htf{font-family:Georgia;color:#000;font-weight:bold;text-align:center;font-size:12px;background-color:#97FFFF;height:22px;}
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
function FunRef(m,y,s,hq,md,rsts){ window.location="f_claimApp.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&md="+md+"&rsts="+rsts; }
function funmonth(m,y,s,hq,md,rsts)
{ window.location="f_claimApp.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&md="+md+"&rsts="+rsts; }
function funyear(y,m,s,hq,md,rsts)
{ window.location="f_claimApp.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&md="+md+"&rsts="+rsts;}
function funstate(s,m,y,md,rsts)
{ window.location="f_claimApp.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq=0&dis=0&md="+md+"&rsts="+rsts; }
function funhq(hq,m,y,s,md,rsts)
{ window.location="f_claimApp.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&md="+md+"&rsts="+rsts; }
function funmd(md,m,y,hq,s,rsts)
{ window.location="f_claimApp.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&md="+md+"&rsts="+rsts; }
function funsts(rsts,m,y,hq,s,md)
{ window.location="f_claimApp.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&md="+md+"&rsts="+rsts; }


<!--
function isNumberKey(evt)
{
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if (charCode != 46 && charCode > 31 
	&& (charCode < 48 || charCode > 57))
	 return false;
  return true;
}
//-->


function funClaim(fid,m,y,hq,s,md,sn) 
{ 
 var pg=document.getElementById("pg").value;
 var tP=document.getElementById("PaidDays"+sn).value; var tA=document.getElementById("A"+sn).value;
 var LvRmk=document.getElementById("LeaveRmk"+sn).value;
 var LeaveRmk = LvRmk.replace(/[`~!#$%^&*_|+\-=;:'"<>\{\}\[\]\\\/]/gi, '');
 
 var s1=document.getElementById("sal"+sn).value; if(s1!=''){var s2=parseFloat(s1);}else{var s2=0;}
 var e1=document.getElementById("exp"+sn).value; if(e1!=''){var e2=parseFloat(e1);}else{var e2=0;}
 if(s2>=0 || e2>=0){var tot=document.getElementById("tot"+sn).value=Math.round((s2+e2)*100)/100; }
 var ctot=parseFloat(document.getElementById("tsal"+sn).value);
 
 if(document.getElementById("sal"+sn).value=='' || document.getElementById("sal"+sn).value==0){alert("please check expense amount!"); return false;}
 else if(tot>ctot){alert("please check expense amount!"); return false;}
 else { var agree=confirm("Are you sure?"); if(agree){ window.location="f_claimApp.php?action=cClaimSal&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&md="+md+"&fid="+fid+"&s2="+s2+"&e2="+e2+"&tP="+tP+"&tA="+tA+"&LeaveRmk="+LeaveRmk+"&page="+pg; } else {return false;} }
}

/*
function ClaExpP(v,n)
{ 
 var tdy=parseFloat(document.getElementById("tdays").value);
 var OneD=parseFloat(document.getElementById("tsal"+n).value)/tdy; 
 var AA=parseFloat(document.getElementById("A"+n).value); var vv=parseFloat(v); 
 if(document.getElementById("A"+n).value==''){var A=0;}else{var A=AA;}  var TotD=Math.round((A+vv)*100)/100;
 if(TotD>tdy){alert("Please check total number of day!"); document.getElementById("sal"+n).value=0; return false;}
 else{var TotExpV=document.getElementById("sal"+n).value=Math.round(v*OneD);}
}
*/

function ClaExpA(v,n)
{ 
 var tdy=parseFloat(document.getElementById("tdays").value); 
 var OneD=parseFloat(document.getElementById("tsal"+n).value)/tdy; 
 var PP=parseFloat(document.getElementById("P"+n).value); var vv=parseFloat(v);  
 if(document.getElementById("P"+n).value==''){var P=0;}else{var P=PP;}
 var TotPD=Math.round((P-vv)*100)/100; document.getElementById("PaidDays"+n).value=TotPD;
 if(vv>tdy){alert("Please check absent number of day!"); document.getElementById("sal"+n).value=0; return false;} 
 else{var TotExpV=document.getElementById("sal"+n).value=Math.round(TotPD*OneD);}
  
 
}


function OpenSlip(si)
{ window.open("fslip.php?si="+si+"&ei="+document.getElementById("EmpId").value,"slip","width=600,height=600");}

function OpenClaim(si,ei)
{ window.open("f_printclaim.php?si="+si+"&e="+ei,"slip","width=800,height=600");}

function OpenallClaim(m,y,s,hq,md,ei)
{ window.open("f_printallclaim.php?m="+m+"&y="+y+"&s="+s+"&hq="+hq+"&md="+md+"&e="+ei,"slip","width=900,height=600");}

function Opencourier(m,y,ei)
{ window.open("f_courierd.php?m="+m+"&y="+y+"&e="+ei,"slip","width=800,height=450"); }

function AttachImg(fid,m,y,hq,s,md,sn)
{
   var win = window.open("f_upcuslett.php?m="+m+"&y="+y+"&fid="+fid+"&hq="+hq+"&s="+s+"&md="+md+"&sn="+sn,"slip","width=400,height=400");
   var timer = setInterval( function() { if(win.closed){ clearInterval(timer);  document.getElementById("spanB"+sn).style.display='block'; } }, 1000);   
}

function FucApp(v,sn,sid,fid,m,y,eid)
{ 
  var url = 'f_claimAppAct.php'; var pars = 'Act=AppCalim&v='+v+'&sn='+sn+'&fid='+fid+'&m='+m+'&y='+y+'&sid='+sid+'&eid='+eid;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_rst });
} 
function show_rst(originalRequest)
{  document.getElementById('SpanRst').innerHTML = originalRequest.responseText; var sn=document.getElementById("sno").value;
    var v=document.getElementById("RstPval").value;
    if(document.getElementById("Rstval").value==1)
    {
      if(v==1){var Act='Pending';}else if(v==2){var Act='Approved';}else if(v==3){var Act='Rejected';}
      alert(Act+" successfull!");
	  if(v==2 || v==3){ document.getElementById("SelSts"+sn).disabled=true; }
    }
    else
    {
     alert("Error!");
    } 
 }

</Script>
</head>
<body class="body">
<span id="AttMsgSpan"></span><span id="SpanRst"></span>
<input type="hidden" id="EmpId" name="EmpId" value="<?php echo $EmployeeId; ?>" />
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
   <table border="0" cellpadding="0" cellspacing="1">
    <tr>
	 <td colspan="35">
	  <table border="0">
   <tr>
	<td>
	 <table border="0">
		<tr>
	    <td class="htf2" align="left"><u>Expense Claim Approval</u>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	    <td style="font-family:Georgia;color:#FF80FF;font-weight:bold;font-size:12px; width:60px;"><span style="cursor:pointer;color:#FFFF6A;" onClick="FunRef(<?php echo $m.','.$y.','.$_REQUEST['s'].','.$_REQUEST['hq'].','.$md.','.$_REQUEST['hq']; ?>)"><u>refresh</u></span></td>
	    <td class="tdf" align="center">&nbsp;</td>
		<td class="tdf">&nbsp;Month</td>
		<td style="width:100px;"><select style="width:100px;" class="InputSel" id="month" name="month" onChange="funmonth(this.value,<?php echo $y.','.$_REQUEST['s'].','.$_REQUEST['hq'].','.$md.','.$_REQUEST['rsts']; ?>)"><option value="<?php echo $m; ?>" selected="selected"><?php echo $Month; ?></option><?php for($i=1;$i<=12;$i++){ if($i!=$m){ ?>
		   <option value="<?php echo $i; ?>"><?php if($i==1){echo 'JANUARY';}elseif($i==2){echo 'FEBRUARY';}elseif($i==3){echo 'MARCH';}elseif($i==4){echo 'APRIL';}elseif($i==5){echo 'MAY';}elseif($i==6){echo 'JUNE';}elseif($i==7){echo 'JULY';}elseif($i==8){echo 'AUGUST';}elseif($i==9){echo 'SEPTEMBER';}elseif($i==10){echo 'OCTOBER';}elseif($i==11){echo 'NOVEMBER';}elseif($i==12){echo 'DECEMBER';} ?></option><?php }} ?></select></td>
		 
		<td class="tdf">&nbsp;Year</td>
		<td style="width:60px;"><select style="width:60px;" class="InputSel" id="year" name="year" onChange="funyear(this.value,<?php echo $m.','.$_REQUEST['s'].','.$_REQUEST['hq'].','.$md.','.$_REQUEST['rsts']; ?>)"><option value="<?php echo $y; ?>" selected="selected"><?php echo $y; ?></option><?php for($j=2015;$j<=date("Y");$j++){ if($j!=$y){ ?>
		   <option value="<?php echo $j; ?>"><?php echo $j; ?></option><?php }} ?></select></td>   
		
		<input type="hidden" value="0" id="state" name="state"/>
		<input type="hidden" value="0" id="hq" name="hq"/>
	 
	 <td class="tdf">&nbsp;Mode</td>
	 <td style="width:120px;"><select style="width:120px;" class="InputSel" id="mode" name="mode" onChange="funmd(this.value,<?php echo $m.','.$y.','.$_REQUEST['hq'].','.$_REQUEST['s'].','.$_REQUEST['rsts']; ?>)" <?php if($m>0){echo '';}else{echo 'disabled';} ?>><?php if($_REQUEST['md']>0){ ?><option value='<?php echo $_REQUEST['md'];?>' selected><?php if($_REQUEST['md']==1){$mode='Direct(Sales Executive)';}elseif($_REQUEST['md']==2){$mode='Teamlease';}elseif($_REQUEST['md']==3){$mode='Distributor';}elseif($_REQUEST['md']==4){$mode='All';} echo ucfirst(strtolower($mode));?></option><?php } else { ?><option value="0" selected>select</option><?php } ?>
	 <option value="1">Direct(Sales Executive)</option><option value="2">Teamlease</option>
	 <option value="3">Distributor</option><option value="4">All</option></select></td>
	 
	 <td class="tdf">&nbsp;Status</td>
	 <td style="width:120px;"><select style="width:120px;" class="InputSel" id="rsts" name="rsts" onChange="funsts(this.value,<?php echo $m.','.$y.','.$_REQUEST['hq'].','.$_REQUEST['s'].','.$md; ?>)" >
	 <option value="0" <?php if($_REQUEST['rsts']==0) {echo 'selected'; }?>>Draft</option>
	 <option value="1" <?php if($_REQUEST['rsts']==1) {echo 'selected'; }?>>Pending</option>
	 <option value="2" <?php if($_REQUEST['rsts']==2) {echo 'selected'; }?>>Approved</option>
	 <option value="3" <?php if($_REQUEST['rsts']==3) {echo 'selected'; }?>>Rejected</option>
	 <option value="4" <?php if($_REQUEST['rsts']==4) {echo 'selected'; }?>>All</option>
	 </select></td>
	 
<?php 
$scm=mysql_query("select * from fa_setclaimdate where ClmdId=1",$con); $rcm=mysql_fetch_assoc($scm);
$d1=date($rcm['Op']); $d2=date($rcm['Cl']); $ExtD=date($rcm['AnyOneDt']); $d3=date("d"); 

if(date("m")==1 OR date("m")==3 OR date("m")==5 OR date("m")==7 OR date("m")==8 OR date("m")==10 OR date("m")==12)
{$ExtD=31;}
elseif(date("m")==4 OR date("m")==6 OR date("m")==9 OR date("m")==11){$ExtD=30;}
elseif(date("m")==2)
{
  if(date("Y")==2012 OR date("Y")==2016 OR date("Y")==2020 OR date("Y")==2024 OR date("Y")==2028 OR date("Y")==2032 OR date("Y")==2036 OR date("Y")==2040){$ExtD=29;}
  else{$ExtD=28; }
}

if($_REQUEST['m']!=1)
{
$PrvM=date('m',strtotime("-1 months",strtotime(date("Y-m-d"))));    
}
else
{
$PrvM=0;    
}



$NxtM=date('m',strtotime("+1 months",strtotime(date("Y-m-d"))));
$sqlee=mysql_query("select * from fa_notaccemp where RepEmpId=".$EmployeeId,$con); $rowee=mysql_num_rows($sqlee); 

if($EmployeeId==1315)
{
    
 if($m>0)
 {
  if($rowee>0)
  {
  $schk=mysql_query("select count(*) as totfa from fa_notaccemp nf inner join fa_details fd on nf.RepEmpId=fd.Reporting where (fd.Mode=1 OR fd.Mode=3) AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01' OR LWD>='".date($y."-".$m."-01")."')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' group by FaId order by FaId ASC",$con); $rchk=mysql_fetch_assoc($schk); 
  $schk2=mysql_query("select count(*) as totclm from fa_salary fs inner join fa_details fd on fs.FaId=fd.FaId where (fd.Mode=1 OR fd.Mode=3) AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01' OR LWD>='".date($y."-".$m."-01")."')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' AND Month=".$m." AND Year=".$y,$con); 
  $rchk2=mysql_fetch_assoc($schk2); 
  }
  else
  {
  $schk=mysql_query("select count(*) as totfa from fa_details fd inner join hrm_sales_hq_temp hqtmp on fd.HqId=hqtmp.HqId inner join hrm_headquater hq on hqtmp.HqId=hq.HqId where HqTEmpStatus='A' AND hq.StateId=".$s." AND hq.StateId=".$s." AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01' OR LWD>='".date($y."-".$m."-01")."')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' AND (Mode=1 OR Mode=3)",$con); $rchk=mysql_fetch_assoc($schk); 
  $schk2=mysql_query("select count(*) as totclm from fa_salary fs inner join fa_details fd on fs.FaId=fd.FaId inner join hrm_sales_hq_temp hqtmp on fd.HqId=hqtmp.HqId inner join hrm_headquater hq on hqtmp.HqId=hq.HqId where (Mode=1 OR Mode=3) AND hq.StateId=".$s." AND HqTEmpStatus='A' AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01' OR LWD>='".date($y."-".$m."-01")."')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' AND Month=".$_REQUEST['m']." AND Year=".$_REQUEST['y'],$con); $rchk2=mysql_fetch_assoc($schk2); 
  } 
 }    
    
}
else
{

if($m>0)
{
 if($rowee>0)
 {
  $schk=mysql_query("select count(*) as totfa from fa_notaccemp nf inner join hrm_sales_reporting_level rl on (nf.RepEmpId=rl.EmployeeID OR nf.EmpId=rl.EmployeeID OR nf.EmpId=rl.R1 OR nf.EmpId=rl.R2 OR nf.EmpId=rl.R3 OR nf.EmpId=rl.R4) inner join fa_details fd on rl.EmployeeID=fd.Reporting where (nf.RepEmpId=".$EmployeeId." OR rl.EmployeeID=".$EmployeeId.") AND (fd.Mode=1 OR fd.Mode=3) AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01' OR LWD>='".date($y."-".$m."-01")."')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' group by FaId order by FaId ASC",$con); $rchk=mysql_fetch_assoc($schk); 
  $schk2=mysql_query("select count(*) as totclm from fa_salary fs inner join fa_details fd on fs.FaId=fd.FaId inner join hrm_sales_reporting_level rl on fd.Reporting=rl.EmployeeID inner join fa_notaccemp nf on (rl.EmployeeID=nf.EmpId OR rl.R1=nf.EmpId OR rl.R2=nf.EmpId OR rl.R3=nf.EmpId OR rl.R4=nf.EmpId) where (nf.RepEmpId=".$EmployeeId." OR rl.EmployeeID=".$EmployeeId.") AND (fd.Mode=1 OR fd.Mode=3) AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01' OR LWD>='".date($y."-".$m."-01")."')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' AND Month=".$m." AND Year=".$y,$con); 
  $rchk2=mysql_fetch_assoc($schk2); 
 }
 else
 {
  $schk=mysql_query("select count(*) as totfa from fa_details fd inner join hrm_sales_hq_temp hqtmp on fd.HqId=hqtmp.HqId inner join hrm_sales_reporting_level rl on hqtmp.EmployeeID=rl.EmployeeID inner join hrm_headquater hq on hqtmp.HqId=hq.HqId where HqTEmpStatus='A' AND hq.StateId=".$s." AND (hqtmp.EmployeeID=".$EmployeeId." OR rl.R1=".$EmployeeId." OR rl.R2=".$EmployeeId." OR rl.R3=".$EmployeeId." OR rl.R4=".$EmployeeId." OR rl.R5=".$EmployeeId.") AND hq.StateId=".$s." AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01' OR LWD>='".date($y."-".$m."-01")."')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' AND (Mode=1 OR Mode=3)",$con); $rchk=mysql_fetch_assoc($schk); 
  $schk2=mysql_query("select count(*) as totclm from fa_salary fs inner join fa_details fd on fs.FaId=fd.FaId inner join hrm_sales_hq_temp hqtmp on fd.HqId=hqtmp.HqId inner join hrm_headquater hq on hqtmp.HqId=hq.HqId where (Mode=1 OR Mode=3) AND hq.StateId=".$s." AND HqTEmpStatus='A' AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01' OR LWD>='".date($y."-".$m."-01")."')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' AND Month=".$_REQUEST['m']." AND Year=".$_REQUEST['y'],$con); $rchk2=mysql_fetch_assoc($schk2); 
 } 
} 

} //else
?>

	 
	   </tr>
	  </table>
	 </td>
	</tr>
<?php $mkdate = mktime(0,0,0, $_REQUEST['m'], 1, $_REQUEST['y']); $days = date('t',$mkdate); ?>	
<input type="hidden" id="tdays" value="<?php echo $days; ?>" />
<?php if($m>0){ ?>	
	<tr>
	 <td>
	  <table>
	  <tr style="height:22px;">
       <td colspan="6" class="htf">&nbsp;General Details</td>
	   <td colspan="3" class="htf">Days</td>
	   <td rowspan="2" style="width:60px;" class="htf">Claim Expense</td>
	   <td rowspan="2" style="width:200px;" class="htf">Any Remark For <br> Leave</td>
	   <td rowspan="2" style="width:50px;" class="htf">Customer<br>Letter<br>view</td>
	   <td rowspan="2" style="width:80px;" class="htf">Action</td>
	</tr>
	  <tr style="height:22px;">
       <td style="width:30px;" class="htf">&nbsp;Sn&nbsp;</td>
       <td style="width:150px;" class="htf">Name</td>
	   <td style="width:100px;" class="htf">Mode</td>
	   <td style="width:80px;" class="htf">HQ</td>
	   <td style="width:60px;" class="htf">Expense</td>
	   <td style="width:120px;" class="htf">Reporting</td>
	   <?php /*?><td style="width:120px;" class="htf">Distributor</td><?php */?>
	   <td style="width:40px;" class="htf">Total</td>
	   <td style="width:40px;" class="htf">Absent</td>
	   <td style="width:40px;" class="htf">Paid</td>
	  </tr>
	
<?php 
 if($_REQUEST['md']==4){ $sqry="1=1"; }else{ $sqry="Mode=".$_REQUEST['md']; }
 if($_REQUEST['rsts']==4){ $sqrs="1=1"; }else{ $sqrs="Rep_AppSts=".$_REQUEST['rsts']; }
if($EmployeeId==1315)
{
 $result=mysql_query("select fs.*,FaName,Mode,HqId,Salary,Expences,Reporting from fa_salary fs inner join fa_details fd on fs.FaId=fd.FaId where Month=".$_REQUEST['m']." AND Year=".$_REQUEST['y']." AND ((fd.FaStatus='A' AND (fd.LWD='0000-00-00' OR fd.LWD='1970-01-01' OR fd.LWD>='".date($y."-".$m."-01")."')) OR (fd.FaStatus='D' AND fd.LWD>='".date($y."-".$m."-01")."')) AND fd.DOJ<='".date($y."-".$m."-31")."' AND ".$sqrs."  AND ".$sqry." order by FaId ASC",$con); 
}
else
{
$result=mysql_query("select fs.*,FaName,Mode,HqId,Salary,Expences,Reporting from fa_salary fs inner join fa_details fd on fs.FaId=fd.FaId where fs.RepId=".$EmployeeId." AND Month=".$_REQUEST['m']." AND Year=".$_REQUEST['y']." AND ((fd.FaStatus='A' AND (fd.LWD='0000-00-00' OR fd.LWD='1970-01-01' OR fd.LWD>='".date($y."-".$m."-01")."')) OR (fd.FaStatus='D' AND fd.LWD>='".date($y."-".$m."-01")."')) AND fd.DOJ<='".date($y."-".$m."-31")."' AND ".$sqrs."  AND ".$sqry." order by FaId ASC",$con); 
}
$total_records=mysql_num_rows($result);
if(isset($_GET['page'])){$page=$_GET['page']; $no=(14*($_GET['page']-1))+$_GET['page'];}else{$page = 1; $no=1;} 
$offset = 15; if ($page){ $from = ($page * $offset) - $offset; }else{ $from = 0; }
echo '<input type="hidden" id="pg" value='.$page.'/>';
if($EmployeeId==1315)
{
$sql=mysql_query("select fs.*,FaName,Mode,HqId,Salary,Expences,Reporting from fa_salary fs inner join fa_details fd on fs.FaId=fd.FaId where Month=".$_REQUEST['m']." AND Year=".$_REQUEST['y']." AND ((fd.FaStatus='A' AND (fd.LWD='0000-00-00' OR fd.LWD='1970-01-01' OR fd.LWD>='".date($y."-".$m."-01")."')) OR (fd.FaStatus='D' AND fd.LWD>='".date($y."-".$m."-01")."')) AND fd.DOJ<='".date($y."-".$m."-31")."' AND ".$sqrs." AND ".$sqry." order by FaId ASC LIMIT ".$from.",".$offset,$con);
}
else
{
$sql=mysql_query("select fs.*,FaName,Mode,HqId,Salary,Expences,Reporting from fa_salary fs inner join fa_details fd on fs.FaId=fd.FaId where fs.RepId=".$EmployeeId." AND Month=".$_REQUEST['m']." AND Year=".$_REQUEST['y']." AND ((fd.FaStatus='A' AND (fd.LWD='0000-00-00' OR fd.LWD='1970-01-01' OR fd.LWD>='".date($y."-".$m."-01")."')) OR (fd.FaStatus='D' AND fd.LWD>='".date($y."-".$m."-01")."')) AND fd.DOJ<='".date($y."-".$m."-31")."' AND ".$sqrs." AND ".$sqry." order by FaId ASC LIMIT ".$from.",".$offset,$con);
}

      $sn=1; while($res=mysql_fetch_array($sql)){ $shq=mysql_query("select CountryName,StateName,HqName,s.CountryId,h.StateId from hrm_headquater h inner join hrm_state s on h.StateId=s.StateId inner join hrm_country c on s.CountryId=c.CountryId where h.HqId=".$res['HqId'], $con);
	  $rhq=mysql_fetch_assoc($shq);
	  
	?>	  	 
<tr style="height:22px;" bgcolor="#FFFFFF" id="TR<?php echo $no; ?>">
 <td class="tdf2" align="center"><?php echo $no; ?></td> 
 <td class="tdf2"><input class="InputType" style="width:150px;" id="name<?php echo $sn; ?>" value="<?php echo $res['FaName']; ?>" readonly/></td>
 <td class="tdf2"><input class="InputType" style="width:100px;" id="mode<?php echo $sn; ?>" value="<?php if($res['Mode']==1){echo 'Direct(Sales Executive)';}elseif($res['Mode']==2){echo 'Teamlease';}elseif($res['Mode']==3){echo 'Distributor';}?>" readonly/></td>
 <td class="tdf2"><input class="InputType" style="width:80px;" id="Hq<?php echo $sn; ?>" value="<?php echo ucfirst(strtolower($rhq['HqName'])); ?>" readonly/></td> 
 <td class="tdf2" align="right"><?php echo floatval($res['Salary']+$res['Expences']); ?>&nbsp;</td>
	 <input type="hidden" id="tsal<?php echo $sn; ?>" value="<?php echo floatval($res['Salary']+$res['Expences']); ?>"/>
 <td class="tdf2"><input class="InputType" style="width:120px;" id="rep<?php echo $sn; ?>" value="<?php $e=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$res['Reporting'],$con); $re=mysql_fetch_assoc($e); echo ucfirst(strtolower($re['Fname'].' '.$re['Sname'].' '.$re['Lname'])); ?>" readonly/></td>	 	 

<?php 
$p=mysql_query("select count(Attv)as P from fa_attd where Attv='P' AND FaId=".$res['FaId']." AND (Attd between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$day)."')",$con); 
$a=mysql_query("select count(Attv)as A from fa_attd where Attv='A' AND FaId=".$res['FaId']." AND (Attd between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$day)."')",$con); 
$sal=mysql_query("select * from fa_salary where FaId=".$res['FaId']." AND Month=".$_REQUEST['m']." AND Year=".$_REQUEST['y'],$con); 
$rp=mysql_fetch_assoc($p);  $ra=mysql_fetch_assoc($a);  $rowS=mysql_num_rows($sal); $resS=mysql_fetch_assoc($sal); ?>	  	 
	 
	 <td class="tdf2" align="center"><input class="InputType" style="width:40px;text-align:center;background-color:<?php if($res['Mode']==1 OR $res['Mode']==3){echo '#FFFFA4';}else{echo '#FFFFFF';}?>;" id="P<?php echo $sn; ?>" onKeyPress="return isNumberKey(event)" value="<?php echo $days; ?>" maxlength="2" readonly/></td>
	 
	 <td class="tdf2" align="center"><input class="InputType" style="width:40px;text-align:center;background-color:<?php if($res['Mode']==1 OR $res['Mode']==3){echo '#FFFFA4';}else{echo '#FFFFFF';}?>;" id="A<?php echo $sn; ?>" value="<?php if($resS['TotA']>0){echo floatval($resS['TotA']);}elseif($ra['A']>0){echo $ra['A'];} ?>" readonly/></td>
	 
	 <?php $PaidDays=$days-$resS['TotA']; //$PaidDays=$resS['TotP']-$resS['TotA']; ?>
	 <td class="tdf2" align="center"><input class="InputType" style="width:40px;text-align:center;background-color:<?php if($res['Mode']==1 OR $res['Mode']==3){echo '#FFFFA4';}else{echo '#FFFFFF';}?>;" id="PaidDays<?php echo $sn; ?>" value="<?php if($PaidDays>0){echo $PaidDays;} elseif($resS['TotP']>0){echo floatval($resS['TotP']);}?>" readonly/></td>
	 
<?php if($res['Mode']==1 OR $res['Mode']==3){ ?>
	 
	 <td class="tdf2"><input class="InputType" style="width:60px;text-align:right;background-color:#FFFFA4;" id="sal<?php echo $sn; ?>" onKeyPress="return isNumberKey(event)" value="<?php if($resS['ClaimSal']>0 OR $resS['ClaimExp']>0){echo floatval($resS['ClaimSal']+$resS['ClaimExp']);}else{echo floatval($res['Salary']+$res['Expences']); } ?>" maxlength="10" readonly/><input type="hidden" id="exp<?php echo $sn; ?>" value="0" maxlength="10"/><input type="hidden" id="tot<?php echo $sn; ?>" value="<?php if($resS['ClaimSal']>0 OR $resS['ClaimExp']>0){ echo floatval($resS['ClaimSal']+$resS['ClaimExp']);}else{echo floatval($res['Salary']+$res['Expences']); }?>" readonly/></td>
	 <td class="tdf2"><input class="InputType" style="width:200px;" id="LeaveRmk<?php echo $sn; ?>" value="<?php echo $resS['LeaveRmk']; ?>" maxlength="100"/></td>
	 <td class="tdf2" align="center"><span id="spanB<?php echo $sn; ?>" style="display:<?php if($resS['ClmImag']!='') {echo 'block';}else{echo 'none';}?>;"><a href="ExpenseImg/<?php echo $resS['ClmImag']; ?>" target="_blank">Attached</a></span></td>
	 
	 <td class="tdf2" align="center">
	  <select class="InputType" id="SelSts<?=$sn?>" style="width:99%;" <?php if($res['Rep_AppSts']==2 OR $res['Rep_AppSts']==3){echo 'disabled';} ?> onChange="FucApp(this.value,<?php echo $sn.','.$res['SalId'].','.$res['FaId'].', '.$_REQUEST['m'].','.$_REQUEST['y'].','.$EmployeeId;?>)" <?php if($res['Rep_AppSts']==2 OR $res['Rep_AppSts']==3){echo 'disabled';}?>>
	   <option value="0" <?php if($res['Rep_AppSts']==0){echo 'selected';}?>>Darft</option>
	   <option value="1" <?php if($res['Rep_AppSts']==1){echo 'selected';}?>>Pending</option>
	   <option value="2" <?php if($res['Rep_AppSts']==2){echo 'selected';}?>>Approve</option>
	   <option value="3" <?php if($res['Rep_AppSts']==3){echo 'selected';}?>>Reject</option>
	  </select>
	 </td> 
	 
<?php } elseif($res['Mode']==2){ ?>	 

	 <td class="tdf2"><input class="InputType" style="width:60px;text-align:right;background-color:#FFFFFF;color:#FFFFFF;" id="sal<?php echo $sn; ?>" value="" readonly/><input type="hidden" id="exp<?php echo $sn; ?>" value="" readonly/><input type="hidden" id="tot<?php echo $sn; ?>" value="" readonly/></td>
	 <td class="tdf2"><input class="InputType" style="width:200px;" id="LeaveRmk<?php echo $sn; ?>" value="<?php echo $resS['LeaveRmk']; ?>" maxlength="100"/></td>
	 <td class="tdf2" align="center"><span id="spanB<?php echo $sn; ?>" style="display:<?php if($resS['ClmImag']!='') {echo 'block';}else{echo 'none';}?>;"><a href="ExpenseImg/<?php echo $resS['ClmImag']; ?>" target="_blank">Attached</a></span></td>
	 
	  <td class="tdf2" align="center">
	  <select class="InputType" id="SelSts<?=$sn?>" style="width:99%;" <?php if($res['Rep_AppSts']==2 OR $res['Rep_AppSts']==3){echo 'disabled';} ?> onChange="FucApp(this.value,<?php echo $sn.','.$res['SalId'].','.$res['FaId'].', '.$_REQUEST['m'].','.$_REQUEST['y'].','.$EmployeeId;?>)" <?php if($res['Rep_AppSts']==2 OR $res['Rep_AppSts']==3){echo 'disabled';}?>>
	   <option value="0" <?php if($res['Rep_AppSts']==0){echo 'selected';}?>>Darft</option>
	   <option value="1" <?php if($res['Rep_AppSts']==1){echo 'selected';}?>>Pending</option>
	   <option value="2" <?php if($res['Rep_AppSts']==2){echo 'selected';}?>>Approve</option>
	   <option value="3" <?php if($res['Rep_AppSts']==3){echo 'selected';}?>>Reject</option>
	  </select>
	 </td>
	 
	 <?php } ?>	 
	 	 
	</tr> 
<?php $sn++; $no++; } ?>

   <tr>
    <td colspan="14" style="font-family:Times New Roman;font-size:15px;font-weight:bold;" align="center"><?php doPages($offset, 'f_claimApp.php', '', $total_records,$_REQUEST['hq'],$_REQUEST['s'],$_REQUEST['m'],$_REQUEST['y'],$_REQUEST['md'],$_REQUEST['rsts']); ?>
    </td>
   </tr>
<?php } ?> 
    
    
	  </table>
	 </td>
	</tr>
	
 </table>
</td>
</tr>
	   
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
<?php function check_integer($which){ if(isset($_REQUEST[$which])){ if (intval($_REQUEST[$which])>0){ return intval($_REQUEST[$which]); } else { return false; } } return false; }
function get_current_page(){ if(($var=check_integer('page'))) { return $var; } else { return 1; } }
function doPages($page_size, $thepage, $query_string, $total=0,$hq,$s,$m,$y,$md,$sts){ $index_limit = 5; $query=''; if(strlen($query_string)>0){ $query = "&amp;".$query_string; }
$current = get_current_page(); $total_pages=ceil($total/$page_size); $start=max($current-intval($index_limit/2), 1); $end=$start+$index_limit-1;
echo '<div class="paging">';
if($current==1){ echo '<span class="prn">&lt; Previous</span>&nbsp;';}else{ $i = $current-1; echo '<a href="'.$thepage.'?page='.$i.$query.'&hq='.$hq.'&s='.$s.'&m='.$m.'&y='.$y.'&md='.$md.'&rsts='.$sts.'&er=1013&rr=wew101" class="prn" rel="nofollow" title="go to page '.$i.'" style="color:#A6D2FF;text-decoration:none;">&lt; Previous</a>&nbsp;'; echo '<span class="prn">...</span>&nbsp;';}
if($start > 1){ $i = 1; echo '<a href="'.$thepage.'?page='.$i.$query.'&hq='.$hq.'&s='.$s.'&m='.$m.'&y='.$y.'&md='.$md.'&rsts='.$sts.'&ee=we23&er=1013&rr=wew101" title="go to page '.$i.'" style="color:#A6D2FF;">'.$i.'</a>&nbsp;'; }
for($i = $start; $i <= $end && $i <= $total_pages; $i++)
{ if($i==$current){ echo '<span>'.$i.'</span>&nbsp;';} else { echo '<a href="'.$thepage.'?page='.$i.$query.'&hq='.$hq.'&s='.$s.'&m='.$m.'&y='.$y.'&md='.$md.'&rsts='.$sts.'&ee=we23&er=1013&rr=wew101" title="go to page '.$i.'" style="color:#A6D2FF;">'.$i.'</a>&nbsp;'; } }
if($total_pages > $end){ $i = $total_pages; echo '<a href="'.$thepage.'?page='.$i.$query.'&hq='.$hq.'&s='.$s.'&m='.$m.'&y='.$y.'&md='.$md.'&rsts='.$sts.'&ee=we23&er=1013&rr=wew101" title="go to page '.$i.'" style="color:#A6D2FF;">'.$i.'</a>&nbsp;'; } if($current < $total_pages) { $i = $current+1; echo '<span class="prn">...</span>&nbsp;'; echo '<a href="'.$thepage.'?page='.$i.$query.'&hq='.$hq.'&s='.$s.'&m='.$m.'&y='.$y.'&md='.$md.'&rsts='.$sts.'&ee=we23&er=1013&rr=wew101" class="prn" rel="nofollow" title="go to page '.$i.'" style="color:#A6D2FF;text-decoration:none;" style="color:#A6D2FF;">Next &gt;</a>&nbsp;'; } else { echo '<span class="prn">Next &gt;</span>&nbsp;'; } if ($total != 0){ echo '&nbsp;&nbsp;&nbsp;&nbsp;<font color="#A6D2FF"<h4>[Total '.$total.' Records]</h></div>'; }
}
?>