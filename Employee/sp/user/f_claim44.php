<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}
$m=$_REQUEST['m']; $y=$_REQUEST['y']; $hq=$_REQUEST['hq']; $s=$_REQUEST['s']; $md=$_REQUEST['md'];
$rbm=$_REQUEST['rbm']; $abm=$_REQUEST['abm'];
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
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
.SaveButton {background-image:url(images/save.gif);width:18px;height:18px;background-repeat:no-repeat;border:0;}
</style>
<script type="text/javascript" src="script/jquery.min.js"></script>
<script type="text/javascript" src="script/jquery.form.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script language="javascript">
function FunRef(m,y,s,hq,md,rbm,abm){ window.location="f_claim.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&md="+md+"&rbm=0&abm=0"; }

function funrbm(rbm,m,y,md)
{ var sts=''; window.location="f_claim.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s=0&hq=0&dis=0&sts="+sts+"&rbm="+rbm+"&abm=0&md="+md; }

function funabm(abm,m,y,md)
{ var sts=''; window.location="f_claim.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s=0&hq=0&dis=0&sts="+sts+"&rbm=0&abm="+abm+"&md="+md; }

function funmonth(m,y,s,hq,md,rbm,abm)
{ window.location="f_claim.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&md="+md+"&rbm="+rbm+"&abm="+abm; }
function funyear(y,m,s,hq,md,rbm,abm)
{ window.location="f_claim.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&md="+md+"&rbm="+rbm+"&abm="+abm;}
function funstate(s,m,y,md,rbm,abm)
{ window.location="f_claim.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq=0&dis=0&md="+md+"&rbm=0&abm=0"; }
function funhq(hq,m,y,s,md,rbm,abm)
{ window.location="f_claim.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&md="+md+"&rbm=0&abm=0"; }
function funmd(md,m,y,hq,s,rbm,abm)
{ window.location="f_claim.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&md="+md+"&rbm="+rbm+"&abm="+abm; }

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

function FunAct(v,sn,m,y,hq,s,md,fid,ei,rbm,abm)
{ 
  if(v==1){var stst='Pending';}else if(v==2){var stst='Verified';}else if(v==22){var stst='Paid';}else if(v==3){var stst='Reject';}
  var agree=confirm('Are you sure, claim status is "'+stst+'"?');
  if(agree) 
  { var win = window.open("f_upload.php?action=uploadFileslip&ee=2421&der=true2&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&md="+md+"&fid="+fid+"&sn="+sn+"&v="+v+"&u="+ei+"&c=false&trht=FTF%%F1","uForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=500,height=500"); 
    var timer = setInterval( function(){ if(win.closed){ clearInterval(timer); window.location="f_claim.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&md="+md+"&rbm="+rbm+"&abm="+abm+"&page="+document.getElementById('pg').value; } }, 1000);
  }
  else{ return false; }
}

function OpenSlip(si)
{ window.open("f_slip.php?si="+si,"slip","width=600,height=600");}

function funDetail(id,rbm,abm)
{ var win = window.open("f_details.php?id="+id+"&rbm="+rbm+"&abm="+abm,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=750,height=500");}

function funCExport(s,hq,m,y,rbm,abm,md)
{ var win = window.open("f_clmexports.php?hq="+hq+"&s="+s+"&m="+m+"&y="+y+"&rbm="+rbm+"&abm="+abm+"&md="+md,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=50,height=50"); }

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
   <table border="0" cellpadding="0" cellspacing="1">
    <tr>
	 <td colspan="35">
	  <table border="0">
   <tr>
	<td>
	 <table border="0">
		<tr>
	    <td colspan="2" class="htf2" align="left"><u>Expenses Claim</u>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	    <td class="tdf" align="center">&nbsp;</td>
		<td class="tdf">&nbsp;RBM/ZBM/ZTM/ZSC</td>
		<td><select style="width:150px;" class="InputSel" id="rbm" name="rbm" onChange="funrbm(this.value,<?php echo $m.','.$y.','.$md; ?>)"><?php if($_REQUEST['rbm']>0){ $sb=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$_REQUEST['rbm'],$con); $rb=mysql_fetch_assoc($sb); ?><option value='<?php echo $_REQUEST['rbm'];?>' selected><?php echo ucwords(strtolower($rb['Fname'].' '.$rb['Sname'].' '.$rb['Lname']));?></option><?php }else{?><option value="0">Select</option><?php } ?><?php $sb2=mysql_query("select e.EmployeeID,Fname,Sname,Lname,DesigCode from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_designation de on g.DesigId=de.DesigId where e.EmpStatus='A' AND (g.DesigId=65 OR g.DesigId=66 OR g.DesigId=358 OR g.DesigId=375)",$con); while($rb2=mysql_fetch_assoc($sb2)){ ?><option value="<?php echo $rb2['EmployeeID']; ?>"><?php echo ucwords(strtolower($rb2['Fname'].' '.$rb2['Sname'].' '.$rb2['Lname'].' - '.$rb2['DesigCode'])); ?></option><?php } ?></select></td>
		<td class="tdf">&nbsp;ABM/ATM/ASC</td>
		<td><select style="width:150px;" class="InputSel" id="abm" name="abm" onChange="funabm(this.value,<?php echo $m.','.$y.','.$md; ?>)"><?php if($_REQUEST['abm']>0){ $sa=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$_REQUEST['abm'],$con); $ra=mysql_fetch_assoc($sa); ?><option value='<?php echo $_REQUEST['abm'];?>' selected><?php echo ucwords(strtolower($ra['Fname'].' '.$ra['Sname'].' '.$ra['Lname']));?></option><?php }else{?><option value="0">Select</option><?php } ?><?php $sa2=mysql_query("select e.EmployeeID,Fname,Sname,Lname,DesigCode from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_designation de on g.DesigId=de.DesigId where e.EmpStatus='A' AND (g.DesigId=67 OR g.DesigId=414 OR g.DesigId=415 OR g.DesigId=212)",$con); while($ra2=mysql_fetch_assoc($sa2)){ ?><option value="<?php echo $ra2['EmployeeID']; ?>"><?php echo ucwords(strtolower($ra2['Fname'].' '.$ra2['Sname'].' '.$ra2['Lname'].' - '.$ra2['DesigCode'])); ?></option><?php } ?></select></td>
		<td class="tdf">&nbsp;Month</td>
		<td style="width:100px;"><select style="width:100px;" class="InputSel" id="month" name="month" onChange="funmonth(this.value,<?php echo $y.','.$_REQUEST['s'].','.$_REQUEST['hq'].','.$md.','.$rbm.','.$abm; ?>)"><option value="<?php echo $m; ?>" selected="selected"><?php echo $Month; ?></option><?php for($i=1;$i<=12;$i++){ if($i!=$m){ ?>
		   <option value="<?php echo $i; ?>"><?php if($i==1){echo 'JANUARY';}elseif($i==2){echo 'FEBRUARY';}elseif($i==3){echo 'MARCH';}elseif($i==4){echo 'APRIL';}elseif($i==5){echo 'MAY';}elseif($i==6){echo 'JUNE';}elseif($i==7){echo 'JULY';}elseif($i==8){echo 'AUGUST';}elseif($i==9){echo 'SEPTEMBER';}elseif($i==10){echo 'OCTOBER';}elseif($i==11){echo 'NOVEMBER';}elseif($i==12){echo 'DECEMBER';} ?></option><?php }} ?></select></td>
		 
		<td class="tdf">&nbsp;Year</td>
		<td style="width:60px;"><select style="width:60px;" class="InputSel" id="year" name="year" onChange="funyear(this.value,<?php echo $m.','.$_REQUEST['s'].','.$_REQUEST['hq'].','.$md.','.$rbm.','.$abm; ?>)"><option value="<?php echo $y; ?>" selected="selected"><?php echo $y; ?></option><?php for($j=2015;$j<=date("Y");$j++){ if($j!=$y){ ?>
		   <option value="<?php echo $j; ?>"><?php echo $j; ?></option><?php }} ?></select></td>   
		</tr>
		<tr>
	    <td colspan="3" class="htf2" style="width:120px;" align="left"></td>
	    <td class="tdf">&nbsp;State</td>
		<td style="width:120px;"><select style="width:120px;" class="InputSel" id="state" name="state" onChange="funstate(this.value,<?php echo $m.','.$y.','.$md.','.$rbm.','.$abm; ?>)">
<?php if($s=='All'){?><option value="All">All</option><?php } elseif($s>0){ $ss=mysql_query("select StateName from hrm_state where StateId=".$s,$con); $rs=mysql_fetch_assoc($ss); ?><option value='<?php echo $s;?>' selected><?php echo ucfirst(strtolower($rs['StateName']));?></option><?php } else { ?><option value="0" selected>select</option><?php } $sqls=mysql_query("select StateId,StateName from hrm_state group by StateId order by StateName ASC",$con); while($ress=mysql_fetch_assoc($sqls)){ ?><option value="<?php echo $ress['StateId']; ?>"><?php echo ucfirst(strtolower($ress['StateName'])); ?></option><?php } ?><option value="All">All</option></select></td>

	 <td class="tdf">&nbsp;HQ</td>
	 <td style="width:120px;"><select style="width:120px;" class="InputSel" id="hq" name="hq" onChange="funhq(this.value,<?php echo $m.','.$y.','.$_REQUEST['s'].','.$md.','.$rbm.','.$abm; ?>)" <?php if($s>0 OR $_REQUEST['hq']>0){echo '';}else{echo 'disabled';} ?>><?php if($_REQUEST['hq']>0){ $shq=mysql_query("select HqName from hrm_headquater where HqId=".$_REQUEST['hq'],$con); $rhq=mysql_fetch_assoc($shq); ?><option value='<?php echo $_REQUEST['hq'];?>' selected><?php echo ucfirst(strtolower($rhq['HqName']));?></option><?php } else { ?><option value="0" selected>select</option><?php } if($_REQUEST['s']>0){ ?><?php $sqlhq=mysql_query("select * from hrm_headquater where StateId=".$_REQUEST['s']." group by HqName order by HqName asc",$con); while($reshq=mysql_fetch_assoc($sqlhq)){ ?><option value="<?php echo $reshq['HqId']; ?>"><?php echo ucfirst(strtolower($reshq['HqName'])); ?></option><?php } } ?></select></td>
	 
	 <td class="tdf">&nbsp;Mode</td>
	 <td style="width:120px;"><select style="width:120px;" class="InputSel" id="mode" name="mode" onChange="funmd(this.value,<?php echo $m.','.$y.','.$_REQUEST['hq'].','.$_REQUEST['s'].','.$rbm.','.$abm; ?>)" <?php //if($_REQUEST['s']>0 OR $_REQUEST['hq']>0){echo '';}else{echo 'disabled';} ?>><?php if($_REQUEST['md']>0){ ?><option value='<?php echo $_REQUEST['md'];?>' selected><?php if($_REQUEST['md']==1){$mode='Direct(Sales Executive)';}elseif($_REQUEST['md']==2){$mode='Teamlease';}elseif($_REQUEST['md']==3){$mode='Distributor';}elseif($_REQUEST['md']==4){$mode='All';} echo ucfirst(strtolower($mode));?></option><?php } else { ?><option value="0" selected>select</option><?php } ?>
	 <option value="1">Direct(Sales Executive)</option><option value="2">Teamlease</option>
	 <option value="3">Distributor</option><option value="4">All</option></select></td>
	 
	 <td style="font-family:Georgia;color:#FF80FF;font-weight:bold;font-size:12px; width:60px;"><span style="cursor:pointer;color:#FFFF6A;" onClick="FunRef(<?php echo $m.','.$y.','.$_REQUEST['s'].','.$_REQUEST['hq'].','.$md.','.$rbm.','.$abm; ?>)"><u>refresh</u></span></td>
	 
	 <td class="tdf2" style="width:100px;" align="center"><?php if($_REQUEST['hq']>0 OR $_REQUEST['s']>0 OR $_REQUEST['s']=='All' OR $_REQUEST['rbm']>0 OR $_REQUEST['abm']>0){ ?><span style="cursor:pointer;color:#FFFFFF;" onClick="funCExport('<?php echo $_REQUEST['s']; ?>',<?php echo $_REQUEST['hq'].','.$_REQUEST['m'].','.$_REQUEST['y'].','.$rbm.','.$abm.','.$md; ?>)"><u>Export</u></span><?php } ?></td>
	 
	   </tr>
	  </table>
	 </td>
	</tr>
<?php if($_REQUEST['hq']>0 OR $_REQUEST['s']>0 OR $_REQUEST['s']=='All' OR $_REQUEST['rbm']>0 OR $_REQUEST['abm']>0){ ?>	
	<tr>
	 <td>
	  <table>
	  <tr style="height:22px;">
	  <td colspan="2" class="htf"><?php if($_REQUEST['rbm']>0 OR $_REQUEST['abm']>0){?><script>function FunClmLet(m,y,r,a,md){window.open("f_printallclaim.php?m="+m+"&y="+y+"&md="+md+"&a="+a+"&r="+r,"slip","width=900,height=600");}</script><span style="cursor:pointer;color:#DF0070;" onClick="FunClmLet(<?php echo $m.','.$y.','.$_REQUEST['rbm'].','.$_REQUEST['abm'].','.$_REQUEST['md']; ?>)"><u>Claim Letter</u></span><?php } ?></td>
      <td colspan="6" class="htf">&nbsp;General Details&nbsp;&nbsp;&nbsp;&nbsp;(P-present,&nbsp;A-absent)</td>
	  <td colspan="3" class="htf">Days</td>
      <td rowspan="2" class="htf" style="width:80px;background-color:#FFAEFF;">Claim<br>Date</td>
	  <td rowspan="2" class="htf" style="width:60px;background-color:#FFAEFF;">Claim Expen.</td>
	  <td rowspan="2" class="htf" style="width:80px;background-color:#00CC66;">Status</td>
	  <td rowspan="2" class="htf" style="width:60px;background-color:#00CC66;">Paid Expen.</td>
	  <td rowspan="2" class="htf" style="width:50px;background-color:#00CC66;">Attach File</td>
	  <td rowspan="2" class="htf" style="width:200px;background-color:#00CC66;">Remark</td>
	</tr>
	  <tr style="height:22px;">
      <td style="width:30px;" class="htf">&nbsp;Sn&nbsp;</td>
      <td style="width:200px;" class="htf">Name</td>
	  <td style="width:80px;" class="htf">Mode</td>
	  <td style="width:60px;" class="htf">DOJ</td>
	  <td style="width:60px;" class="htf">FA HQ</td>
	  <td style="width:60px;" class="htf">Expense</td>
	  <td style="width:150px;" class="htf">Distributor</td>
	  <td style="width:150px;" class="htf">Reporting</td>
	  <td style="width:40px;" class="htf">Total</td>
	  <td style="width:40px;" class="htf">Absent</td>
	  <td style="width:40px;" class="htf">Paid</td>
	  </tr>
	  	  
<?php 
if($_REQUEST['rbm']>0 OR $_REQUEST['abm']>0)  ///1111111111111///
{  

 if($_REQUEST['rbm']>0){$ri=$_REQUEST['rbm'];}else{$ri=$_REQUEST['abm'];}
 $sqlee=mysql_query("select * from fa_notaccemp where RepEmpId=".$ri,$con); $rowee=mysql_num_rows($sqlee);
 if($rowee>0)
 {
  /************************************************/
  if($_REQUEST['md']==4){ $result=mysql_query("select * from fa_notaccemp nf inner join hrm_sales_reporting_level rl on (nf.RepEmpId=rl.EmployeeID OR nf.EmpId=rl.EmployeeID OR nf.EmpId=rl.R1 OR nf.EmpId=rl.R2 OR nf.EmpId=rl.R3 OR nf.EmpId=rl.R4) inner join fa_details fd on rl.EmployeeID=fd.Reporting where (nf.RepEmpId=".$ri." OR rl.EmployeeID=".$ri.") AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' group by FaId order by FaId ASC",$con); }
  elseif($_REQUEST['md']!=4){ $result=mysql_query("select * from fa_notaccemp nf inner join hrm_sales_reporting_level rl on (nf.RepEmpId=rl.EmployeeID OR nf.EmpId=rl.EmployeeID OR nf.EmpId=rl.R1 OR nf.EmpId=rl.R2 OR nf.EmpId=rl.R3 OR nf.EmpId=rl.R4) inner join fa_details fd on rl.EmployeeID=fd.Reporting where (nf.RepEmpId=".$ri." OR rl.EmployeeID=".$ri.") AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' AND Mode=".$_REQUEST['md']." group by FaId order by FaId ASC",$con); }

  $total_records=mysql_num_rows($result);
  if(isset($_GET['page'])){$page=$_GET['page']; $no=(14*($_GET['page']-1))+$_GET['page'];}else{$page = 1; $no=1;} 
  $offset = 15; if ($page){ $from = ($page * $offset) - $offset; }else{ $from = 0; } 
  echo '<input type="hidden" id="pg" value='.$page.' />';

  if($_REQUEST['md']==4){ $sql=mysql_query("select * from fa_notaccemp nf inner join hrm_sales_reporting_level rl on (nf.RepEmpId=rl.EmployeeID OR nf.EmpId=rl.EmployeeID OR nf.EmpId=rl.R1 OR nf.EmpId=rl.R2 OR nf.EmpId=rl.R3 OR nf.EmpId=rl.R4) inner join fa_details fd on rl.EmployeeID=fd.Reporting where (nf.RepEmpId=".$ri." OR rl.EmployeeID=".$ri.") AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' group by FaId order by FaId ASC LIMIT ".$from.",".$offset,$con); }
  elseif($_REQUEST['md']!=4){ $sql=mysql_query("select * from fa_notaccemp nf inner join hrm_sales_reporting_level rl on (nf.RepEmpId=rl.EmployeeID OR nf.EmpId=rl.EmployeeID OR nf.EmpId=rl.R1 OR nf.EmpId=rl.R2 OR nf.EmpId=rl.R3 OR nf.EmpId=rl.R4) inner join fa_details fd on rl.EmployeeID=fd.Reporting where (nf.RepEmpId=".$ri." OR rl.EmployeeID=".$ri.") AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' AND Mode=".$_REQUEST['md']." group by FaId order by FaId ASC LIMIT ".$from.",".$offset,$con); }
  
 /************************************************/
 }
 else
 {
  /************************************************/
  if($_REQUEST['md']==4){ $result=mysql_query("select * from fa_details fd inner join hrm_sales_reporting_level rl on fd.Reporting=rl.EmployeeID where (fd.Reporting=".$ri." OR rl.R1=".$ri." OR rl.R2=".$ri." OR rl.R3=".$ri." OR rl.R4=".$ri." OR rl.R5=".$ri.") AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' order by FaId ASC",$con); }
  elseif($_REQUEST['md']!=4){ $result=mysql_query("select * from fa_details fd inner join hrm_sales_reporting_level rl on fd.Reporting=rl.EmployeeID where (fd.Reporting=".$ri." OR rl.R1=".$ri." OR rl.R2=".$ri." OR rl.R3=".$ri." OR rl.R4=".$ri." OR rl.R5=".$ri.") AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' AND Mode=".$_REQUEST['md']." order by FaId ASC",$con); }

  $total_records=mysql_num_rows($result);
  if(isset($_GET['page'])){$page=$_GET['page']; $no=(14*($_GET['page']-1))+$_GET['page'];}else{$page = 1; $no=1;} 
  $offset = 15; if ($page){ $from = ($page * $offset) - $offset; }else{ $from = 0; } 

  if($_REQUEST['md']==4){ $sql=mysql_query("select * from fa_details fd inner join hrm_sales_reporting_level rl on fd.Reporting=rl.EmployeeID where (fd.Reporting=".$ri." OR rl.R1=".$ri." OR rl.R2=".$ri." OR rl.R3=".$ri." OR rl.R4=".$ri." OR rl.R5=".$ri.") AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' order by FaId ASC LIMIT ".$from.",".$offset,$con);}
  elseif($_REQUEST['md']!=4){ $sql=mysql_query("select * from fa_details fd inner join hrm_sales_reporting_level rl on fd.Reporting=rl.EmployeeID where (fd.Reporting=".$ri." OR rl.R1=".$ri." OR rl.R2=".$ri." OR rl.R3=".$ri." OR rl.R4=".$ri." OR rl.R5=".$ri.") AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' AND Mode=".$_REQUEST['md']." order by FaId ASC LIMIT ".$from.",".$offset,$con);}
  /************************************************/
 }	
 
} 
else    ///1111111111111///
{

  if($_REQUEST['hq']>0 AND $_REQUEST['md']==4){ $result=mysql_query("select * from fa_details where HqId=".$_REQUEST['hq']." AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' order by FaId ASC",$con);}
  elseif($_REQUEST['hq']>0 AND $_REQUEST['md']!=4){ $result=mysql_query("select * from fa_details where HqId=".$_REQUEST['hq']." AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' AND Mode=".$_REQUEST['md']." order by FaId ASC",$con);}
  elseif($_REQUEST['s']=='All' AND $_REQUEST['md']==4){ $result=mysql_query("select * from fa_details where ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' order by FaId ASC",$con);}
  elseif($_REQUEST['s']=='All' AND $_REQUEST['md']!=4){ $result=mysql_query("select * from fa_details where ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' AND Mode=".$_REQUEST['md']." order by FaId ASC",$con);}
  elseif($_REQUEST['s']>0 AND $_REQUEST['md']==4){ $result=mysql_query("select * from fa_details f inner join hrm_headquater hq on f.HqId=hq.HqId where hq.StateId=".$_REQUEST['s']." AND ((FaStatus='A' AND (f.LWD='0000-00-00' OR f.LWD='1970-01-01')) OR (FaStatus='D' AND f.LWD>='".date($y."-".$m."-01")."')) AND f.DOJ<='".date($y."-".$m."-31")."' order by FaId ASC",$con);}
  elseif($_REQUEST['s']>0 AND $_REQUEST['md']!=4){ $result=mysql_query("select * from fa_details f inner join hrm_headquater hq on f.HqId=hq.HqId where hq.StateId=".$_REQUEST['s']." AND ((FaStatus='A' AND (f.LWD='0000-00-00' OR f.LWD='1970-01-01')) OR (FaStatus='D' AND f.LWD>='".date($y."-".$m."-01")."')) AND f.DOJ<='".date($y."-".$m."-31")."' AND Mode=".$_REQUEST['md']." order by FaId ASC",$con);}
  
  $total_records=mysql_num_rows($result);
  if(isset($_GET['page'])){$page=$_GET['page']; $no=(14*($_GET['page']-1))+$_GET['page'];}else{$page = 1; $no=1;} 
  $offset = 15; if ($page){ $from = ($page * $offset) - $offset; }else{ $from = 0; } 
  echo '<input type="hidden" id="pg" value='.$page.' />';

  if($_REQUEST['hq']>0 AND $_REQUEST['md']==4){ $sql=mysql_query("select * from fa_details where HqId=".$_REQUEST['hq']." AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' order by FaId ASC LIMIT ".$from.",".$offset,$con);}
  elseif($_REQUEST['hq']>0 AND $_REQUEST['md']!=4){ $sql=mysql_query("select * from fa_details where HqId=".$_REQUEST['hq']." AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' AND Mode=".$_REQUEST['md']." order by FaId ASC LIMIT ".$from.",".$offset,$con);}
  elseif($_REQUEST['s']=='All' AND $_REQUEST['md']==4){ $sql=mysql_query("select * from fa_details where ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' order by FaId ASC LIMIT ".$from.",".$offset,$con); }
  elseif($_REQUEST['s']=='All' AND $_REQUEST['md']!=4){ $sql=mysql_query("select * from fa_details where ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' AND Mode=".$_REQUEST['md']." order by FaId ASC LIMIT ".$from.",".$offset,$con);}
  elseif($_REQUEST['s']>0 AND $_REQUEST['md']==4){ $sql=mysql_query("select * from fa_details f inner join hrm_headquater hq on f.HqId=hq.HqId where hq.StateId=".$_REQUEST['s']." AND ((FaStatus='A' AND (f.LWD='0000-00-00' OR f.LWD='1970-01-01')) OR (FaStatus='D' AND f.LWD>='".date($y."-".$m."-01")."')) AND f.DOJ<='".date($y."-".$m."-31")."' order by FaId ASC LIMIT ".$from.",".$offset,$con);}
  elseif($_REQUEST['s']>0 AND $_REQUEST['md']!=4){ $sql=mysql_query("select * from fa_details f inner join hrm_headquater hq on f.HqId=hq.HqId where hq.StateId=".$_REQUEST['s']." AND ((FaStatus='A' AND (f.LWD='0000-00-00' OR f.LWD='1970-01-01')) OR (FaStatus='D' AND f.LWD>='".date($y."-".$m."-01")."')) AND f.DOJ<='".date($y."-".$m."-31")."' AND Mode=".$_REQUEST['md']." order by FaId ASC LIMIT ".$from.",".$offset,$con);}

}  ///1111111111111///

      $sn=1; while($res=mysql_fetch_array($sql)){ $shq=mysql_query("select CountryName,StateName,HqName,s.CountryId,h.StateId from hrm_headquater h inner join hrm_state s on h.StateId=s.StateId inner join hrm_country c on s.CountryId=c.CountryId where h.HqId=".$res['HqId'], $con);
	  $rhq=mysql_fetch_assoc($shq); 
	  ?>	 
<tr style="height:22px;" bgcolor="#FFFFFF" id="TR<?php echo $sn; ?>">
<td class="tdf2" align="center"><?php echo $no; ?></td>
<td class="tdf2">&nbsp;<span style="cursor:pointer;color:#0079F2;" onClick="funDetail(<?php echo $res['FaId'].','.$rbm.','.$abm; ?>)"><u><?php echo $res['FaName']; ?></u></span></td>
<td class="tdf2"><input class="InputType" style="width:80px;" id="mode<?php echo $sn; ?>" value="<?php if($res['Mode']==1){echo 'Direct(Sales Executive)';}elseif($res['Mode']==2){echo 'Teamlease';}elseif($res['Mode']==3){echo 'Distributor';}?>" readonly/></td>
<td class="tdf2"><input class="InputType" style="width:80px; text-align:center;" id="Doj<?php echo $sn; ?>" value="<?php echo date("d-m-Y",strtotime($res['DOJ'])); ?>" readonly/></td>
<td class="tdf2"><input class="InputType" style="width:80px;" id="Hq<?php echo $sn; ?>" value="<?php echo ucfirst(strtolower($res['OtherHq'])); ?>" readonly/></td>

	 <td class="tdf2" align="right"><?php echo floatval($res['Salary']+$res['Expences']); ?>&nbsp;</td>
	 <?php $dis2=mysql_query("select DealerName from hrm_sales_dealer where DealerId=".$res['Sal_DealerId'],$con); $rdis2=mysql_fetch_assoc($dis2); ?>
     <td class="tdf2"><input class="InputType" style="width:150px;" id="Dis<?php echo $sn; ?>" value="<?php echo ucfirst(strtolower($rdis2['DealerName'])); ?>" readonly/></td>
	 
	 <td class="tdf2"><input class="InputType" style="width:150px;" id="rep<?php echo $sn; ?>" value="<?php $e=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$res['Reporting'],$con); $re=mysql_fetch_assoc($e); echo ucfirst(strtolower($re['Fname'].' '.$re['Sname'].' '.$re['Lname'])); ?>" readonly/></td>

<?php $p=mysql_query("select count(Attv)as P from fa_attd where Attv='P' AND FaId=".$res['FaId']." AND (Attd between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$day)."')",$con); $rp=mysql_fetch_assoc($p); 
$a=mysql_query("select count(Attv)as A from fa_attd where Attv='A' AND FaId=".$res['FaId']." AND (Attd between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$day)."')",$con); $ra=mysql_fetch_assoc($a); 
$sal=mysql_query("select * from fa_salary where FaId=".$res['FaId']." AND Month=".$_REQUEST['m']." AND Year=".$_REQUEST['y'],$con); $rowS=mysql_num_rows($sal); $resS=mysql_fetch_assoc($sal); ?>	 
	   	 
	 <td class="tdf2" align="center"><?php $totD=$resS['TotP']+$resS['TotA']; if($day>0){echo floatval($day);} //if($resS['TotP']>0){echo floatval($resS['TotP']);}elseif($rP['P']>0){echo $rP['P'];} ?></td>
	 <td class="tdf2" align="center"><?php if($resS['TotA']>0){echo floatval($resS['TotA']);} //if($resS['TotA']>0){echo floatval($resS['TotA']);}elseif($ra['A']>0){echo $ra['A'];} ?></td>
	 
	 <?php $PaidDays=$day-$resS['TotA']; ?>
	 <td class="tdf2" align="center"><?php if($PaidDays>0){echo floatval($PaidDays);} ?></td>
	 
<?php $sal=mysql_query("select * from fa_salary where FaId=".$res['FaId']." AND Month=".$_REQUEST['m']." AND Year=".$_REQUEST['y'],$con); $rowS=mysql_num_rows($sal); $resS=mysql_fetch_assoc($sal); ?>

         <td class="tdf2" align="center"><?php if($rowS>0 AND $resS['ClaimDate']!='0000-00-00' AND $resS['ClaimDate']!='1970-01-01'){echo date("d-m-Y",strtotime($resS['ClaimDate']));}else {echo '';} ?></td>

<?php if($res['Mode']==1 OR $res['Mode']==3){ ?>	 
	 <td class="tdf2"><input class="InputType" style="width:60px;text-align:right;background-color:#FFCCFF;" id="sal<?php echo $sn; ?>" value="<?php if($resS['ClaimSal']>0 OR $resS['ClaimExp']>0){echo floatval($resS['ClaimSal']+$resS['ClaimExp']);} ?>" maxlength="10" readonly/><input type="hidden" id="exp<?php echo $sn; ?>" value="0" maxlength="10" readonly/><input type="hidden" id="tot<?php echo $sn; ?>" value="<?php if($resS['ClaimSal']>0 OR $resS['ClaimExp']>0){ echo floatval($resS['ClaimSal']+$resS['ClaimExp']); } ?>" readonly/></td>
	
<?php } elseif($res['Mode']==2){ ?>	 
	 <td class="tdf2"><input class="InputType" style="width:60px;text-align:right;" id="sal<?php echo $sn; ?>" value="" readonly/><input type="hidden" id="exp<?php echo $sn; ?>" value="" readonly/><input type="hidden" id="tot<?php echo $sn; ?>" value="" readonly/></td>
<?php } ?>	 

	 <td class="tdf2" align="center"><select class="InputSel" style="width:60px;background-color:<?php if($resS['Status']==0 OR $resS['Status']==1){ echo '#FFFFB0';}else{echo '#FFFFFF';}?>;" id="Sts<?php echo $sn; ?>" name="Sts<?php echo $sn; ?>" onChange="FunAct(this.value,<?php echo $sn.','.$_REQUEST['m'].','.$_REQUEST['y'].','.$_REQUEST['hq'].','.$_REQUEST['s'].','.$_REQUEST['md'].','.$res['FaId'].','.$EmployeeId.','.$rbm.','.$abm; ?>)"><?php if($resS['Status']==0){?><option value="0">Draft</option><?php }elseif($resS['Status']==1){?><option value="1">Pending</option><?php }elseif($resS['Status']==2){?><option value="2">Approved/Paid</option><?php }elseif($resS['Status']==3){?><option value="3">Reject</option><?php } ?><?php if($resS['Status']!=1){ ?><option value="1">Pending</option><?php } ?>
<?php if($resS['Status']!=2){ ?><option value="2">Verified</option><option value="22">Paid</option><?php } ?>
<?php if($resS['Status']!=3){ ?><option value="3">Reject</option><?php } ?></select></td>

	 <td class="tdf2" align="center"><input class="InputType" style="width:60px;text-align:right;" id="Pamt<?php echo $sn; ?>" name="Pamt<?php echo $sn; ?>" onKeyPress="return isNumberKey(event)" value="<?php if($resS['ActualSal']>0 OR $resS['ActualExp']>0){echo floatval($resS['ActualSal']+$resS['ActualExp']);} ?>" maxlength="10" readonly/></td>
	 
	 <td class="tdf2" align="center" id="TDAtt<?php echo $sn; ?>"><?php if($resS['Status']==2 AND $resS['Slip']!=''){?><span style="cursor:pointer;color:#0061C1;" onClick="OpenSlip(<?php echo $resS['SalId'];?>)"><u>yes</u></span><?php } elseif($resS['Status']==0 OR $resS['Status']=1){echo ''; }?></td> 
	 
	 <td class="tdf2" valign="top"><?php echo $resS['Remark']; ?></td>
	  
	</tr> 
	
<?php $sn++; $no++; } ?>

   <tr>
    <td colspan="2"></td>
    <td colspan="11" style="font-family:Times New Roman;font-size:15px;font-weight:bold;">
     <?php doPages($offset, 'f_claim.php', '', $total_records,$_REQUEST['hq'],$_REQUEST['s'],$_REQUEST['m'],$_REQUEST['y'],$_REQUEST['md'],$_REQUEST['rbm'],$_REQUEST['abm']); ?>
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
function doPages($page_size, $thepage, $query_string, $total=0,$hq,$s,$m,$y,$md,$rbm,$abm){ $index_limit = 5; $query=''; if(strlen($query_string)>0){ $query = "&amp;".$query_string; }
$current = get_current_page(); $total_pages=ceil($total/$page_size); $start=max($current-intval($index_limit/2), 1); $end=$start+$index_limit-1;
echo '<div class="paging">';
if($current==1){ echo '<span class="prn">&lt; Previous</span>&nbsp;';}else{ $i = $current-1; echo '<a href="'.$thepage.'?page='.$i.$query.'&hq='.$hq.'&s='.$s.'&m='.$m.'&y='.$y.'&md='.$md.'&rbm='.$rbm.'&abm='.$abm.'&er=1013&rr=wew101" class="prn" rel="nofollow" title="go to page '.$i.'" style="color:#A6D2FF;text-decoration:none;">&lt; Previous</a>&nbsp;'; echo '<span class="prn">...</span>&nbsp;';}
if($start > 1){ $i = 1; echo '<a href="'.$thepage.'?page='.$i.$query.'&hq='.$hq.'&s='.$s.'&m='.$m.'&y='.$y.'&md='.$md.'&rbm='.$rbm.'&abm='.$abm.'&ee=we23&er=1013&rr=wew101" title="go to page '.$i.'" style="color:#A6D2FF;">'.$i.'</a>&nbsp;'; }
for($i = $start; $i <= $end && $i <= $total_pages; $i++)
{ if($i==$current){ echo '<span>'.$i.'</span>&nbsp;';} else { echo '<a href="'.$thepage.'?page='.$i.$query.'&hq='.$hq.'&s='.$s.'&m='.$m.'&y='.$y.'&md='.$md.'&rbm='.$rbm.'&abm='.$abm.'&ee=we23&er=1013&rr=wew101" title="go to page '.$i.'" style="color:#A6D2FF;">'.$i.'</a>&nbsp;'; } }
if($total_pages > $end){ $i = $total_pages; echo '<a href="'.$thepage.'?page='.$i.$query.'&hq='.$hq.'&s='.$s.'&m='.$m.'&y='.$y.'&md='.$md.'&rbm='.$rbm.'&abm='.$abm.'&ee=we23&er=1013&rr=wew101" title="go to page '.$i.'" style="color:#A6D2FF;">'.$i.'</a>&nbsp;'; } if($current < $total_pages) { $i = $current+1; echo '<span class="prn">...</span>&nbsp;'; echo '<a href="'.$thepage.'?page='.$i.$query.'&hq='.$hq.'&s='.$s.'&m='.$m.'&y='.$y.'&md='.$md.'&rbm='.$rbm.'&abm='.$abm.'&ee=we23&er=1013&rr=wew101" class="prn" rel="nofollow" title="go to page '.$i.'" style="color:#A6D2FF;text-decoration:none;" style="color:#A6D2FF;">Next &gt;</a>&nbsp;'; } else { echo '<span class="prn">Next &gt;</span>&nbsp;'; } if ($total != 0){ echo '&nbsp;&nbsp;&nbsp;&nbsp;<font color="#A6D2FF"<h4>[Total '.$total.' Records]</h></div>'; }
}
?>