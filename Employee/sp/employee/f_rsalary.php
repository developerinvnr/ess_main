<?php session_start();
if($_SESSION['login'] = true){require_once('../user/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../../../index.php');}
$EmployeeId=$_SESSION['EmployeeID'];
$m=$_REQUEST['m']; $y=$_REQUEST['y']; $hq=$_REQUEST['hq']; $s=$_REQUEST['s']; $md=$_REQUEST['md']; 
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
function FunRef(m,y,s,hq,md){ window.location="f_rsalary.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&md="+md; }
function funmonth(m,y,s,hq,md)
{ window.location="f_rsalary.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&md="+md; }
function funyear(y,m,s,hq,md)
{ window.location="f_rsalary.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&md="+md;}
function funstate(s,m,y,md)
{ window.location="f_rsalary.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq=0&dis=0&md="+md; }
function funhq(hq,m,y,s,md)
{ window.location="f_rsalary.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&md="+md; }
function funmd(md,m,y,hq,s)
{ window.location="f_rsalary.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&md="+md; }

function FucChk(sn)
{ if(document.getElementById("Chk"+sn).checked==true){document.getElementById("TR"+sn).style.background='#9BEF47'; document.getElementById("name"+sn).style.background='#9BEF47'; document.getElementById("mode"+sn).style.background='#9BEF47'; document.getElementById("hq"+sn).style.background='#9BEF47'; document.getElementById("state"+sn).style.background='#9BEF47'; document.getElementById("country"+sn).style.background='#9BEF47'; document.getElementById("crp"+sn).style.background='#9BEF47'; document.getElementById("dealer"+sn).style.background='#9BEF47'; document.getElementById("saldealer"+sn).style.background='#9BEF47'; document.getElementById("email"+sn).style.background='#9BEF47';document.getElementById("rep"+sn).style.background='#9BEF47'; document.getElementById("rep2"+sn).style.background='#9BEF47'; document.getElementById("rep3"+sn).style.background='#9BEF47'; 
 }
  else if(document.getElementById("Chk"+sn).checked==false){document.getElementById("TR"+sn).style.background='#FFFFFF'; document.getElementById("name"+sn).style.background='#FFFFFF'; document.getElementById("mode"+sn).style.background='#FFFFFF'; document.getElementById("hq"+sn).style.background='#FFFFFF'; document.getElementById("state"+sn).style.background='#FFFFFF'; document.getElementById("country"+sn).style.background='#FFFFFF'; document.getElementById("crp"+sn).style.background='#FFFFFF'; document.getElementById("dealer"+sn).style.background='#FFFFFF'; document.getElementById("saldealer"+sn).style.background='#FFFFFF'; document.getElementById("email"+sn).style.background='#FFFFFF'; document.getElementById("rep"+sn).style.background='#FFFFFF'; document.getElementById("rep2"+sn).style.background='#FFFFFF'; document.getElementById("rep3"+sn).style.background='#FFFFFF'; }
}

function OpenSlip(si)
{ window.open("f_slip.php?si="+si,"slip","width=600,height=600");}


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
<?php if($m==1){$Month='January';}elseif($m==2){$Month='February';}elseif($m==3){$Month='March';}elseif($m==4){$Month='April';}elseif($m==5){$Month='May';}elseif($m==6){$Month='June';}elseif($m==7){$Month='July';}elseif($m==8){$Month='August';}elseif($m==9){$Month='September';}elseif($m==10){$Month='October';}elseif($m==11){$Month='November';}elseif($m==12){$Month='December';} 
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
	    <td class="htf2" align="left"><u>FA Expenses Reports</u>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	    <td style="font-family:Georgia;color:#FF80FF;font-weight:bold;font-size:12px; width:60px;"><span style="cursor:pointer;color:#FFFF6A;" onClick="FunRef(<?php echo $m.','.$y.','.$_REQUEST['s'].','.$_REQUEST['hq'].','.$md; ?>)"><u>refresh</u></span></td>
	    <td class="tdf" align="center">&nbsp;</td>
		<td class="tdf">&nbsp;Month</td>
		<td style="width:100px;"><select style="width:100px;" class="InputSel" id="month" name="month" onChange="funmonth(this.value,<?php echo $y.','.$_REQUEST['s'].','.$_REQUEST['hq'].','.$md; ?>)"><option value="<?php echo $m; ?>" selected="selected"><?php echo $Month; ?></option><?php for($i=1;$i<=12;$i++){ if($i!=$m){ ?>
		   <option value="<?php echo $i; ?>"><?php if($i==1){echo 'JANUARY';}elseif($i==2){echo 'FEBRUARY';}elseif($i==3){echo 'MARCH';}elseif($i==4){echo 'APRIL';}elseif($i==5){echo 'MAY';}elseif($i==6){echo 'JUNE';}elseif($i==7){echo 'JULY';}elseif($i==8){echo 'AUGUST';}elseif($i==9){echo 'SEPTEMBER';}elseif($i==10){echo 'OCTOBER';}elseif($i==11){echo 'NOVEMBER';}elseif($i==12){echo 'DECEMBER';} ?></option><?php }} ?></select></td>
		 
		<td class="tdf">&nbsp;Year</td>
		<td style="width:60px;"><select style="width:60px;" class="InputSel" id="year" name="year" onChange="funyear(this.value,<?php echo $m.','.$_REQUEST['s'].','.$_REQUEST['hq'].','.$md; ?>)"><option value="<?php echo $y; ?>" selected="selected"><?php echo $y; ?></option><?php for($j=2015;$j<=date("Y");$j++){ if($j!=$y){ ?>
		   <option value="<?php echo $j; ?>"><?php echo $j; ?></option><?php }} ?></select></td>   
		
	    <td class="tdf">&nbsp;State</td>
		<input type="hidden" value="0" id="state" name="state"/>
		<input type="hidden" value="0" id="hq" name="hq"/>
		
		<?php /*?><td style="width:120px;"><select style="width:120px;" class="InputSel" id="state" name="state" onChange="funstate(this.value,<?php echo $m.','.$y.','.$md; ?>)"><?php if($s>0){ $ss=mysql_query("select StateName from hrm_state where StateId=".$s,$con); $rs=mysql_fetch_assoc($ss); ?><option value='<?php echo $s;?>' selected><?php echo ucfirst(strtolower($rs['StateName']));?></option><?php } else { ?><option value="0" selected>select</option><?php } $sqls=mysql_query("select st.StateId,StateName from hrm_state st inner join hrm_headquater hq on st.StateId=hq.StateId inner join hrm_sales_hq_temp hqtmp on hq.HqId=hqtmp.HqId inner join hrm_sales_reporting_level rl on hqtmp.EmployeeID=rl.EmployeeID where HqTEmpStatus='A' AND (hqtmp.EmployeeID=".$EmployeeId." OR rl.R1=".$EmployeeId." OR rl.R2=".$EmployeeId." OR rl.R3=".$EmployeeId." OR rl.R4=".$EmployeeId." OR rl.R5=".$EmployeeId.") group by StateId order by StateName ASC",$con); while($ress=mysql_fetch_assoc($sqls)){ ?><option value="<?php echo $ress['StateId']; ?>"><?php echo ucfirst(strtolower($ress['StateName'])); ?></option><?php } ?></select></td>

	 <td class="tdf">&nbsp;HQ</td>
	 <td style="width:120px;"><select style="width:120px;" class="InputSel" id="hq" name="hq" onChange="funhq(this.value,<?php echo $m.','.$y.','.$_REQUEST['s'].','.$md; ?>)" <?php if($s>0 OR $_REQUEST['hq']>0){echo '';}else{echo 'disabled';} ?>><?php if($_REQUEST['hq']>0){ $shq=mysql_query("select HqName from hrm_headquater where HqId=".$_REQUEST['hq'],$con); $rhq=mysql_fetch_assoc($shq); ?><option value='<?php echo $_REQUEST['hq'];?>' selected><?php echo ucfirst(strtolower($rhq['HqName']));?></option><?php } else { ?><option value="0" selected>select</option><?php } if($_REQUEST['s']>0){ ?><?php $sqlhq=mysql_query("select * from hrm_headquater where StateId=".$_REQUEST['s']." group by HqName order by HqName asc",$con); while($reshq=mysql_fetch_assoc($sqlhq)){ ?><option value="<?php echo $reshq['HqId']; ?>"><?php echo ucfirst(strtolower($reshq['HqName'])); ?></option><?php } } ?></select></td><?php */?>
	 
	 <td class="tdf">&nbsp;Mode</td>
	 <td style="width:120px;"><select style="width:120px;" class="InputSel" id="mode" name="mode" onChange="funmd(this.value,<?php echo $m.','.$y.','.$_REQUEST['hq'].','.$_REQUEST['s']; ?>)" ><?php if($_REQUEST['md']>0){ ?><option value='<?php echo $_REQUEST['md'];?>' selected><?php if($_REQUEST['md']==1){$mode='Direct(Sales Executive)';}elseif($_REQUEST['md']==2){$mode='Teamlease';}elseif($_REQUEST['md']==3){$mode='Distributor';}elseif($_REQUEST['md']==4){$mode='All';} echo ucfirst(strtolower($mode));?></option><?php } else { ?><option value="0" selected>select</option><?php } ?>
	 <option value="1">Direct(Sales Executive)</option><option value="2">Teamlease</option>
	 <option value="3">Distributor</option><option value="4">All</option></select></td>
	 
	   </tr>
	  </table>
	 </td>
	</tr>
	
<?php if($_REQUEST['md']!=''){ ?>	
    <tr>
	 <td>
	  <table style="width:95%;">
	  <tr style="height:22px;">
	  <td style="width:30px;" class="htf">&nbsp;</td>
      <td style="width:30px;" class="htf">&nbsp;Sn&nbsp;</td>
      <td style="width:200px;" class="htf">Name</td>
	  <td style="width:150px;" class="htf">Mode</td>
	  <td style="width:80px;" class="htf">HQ</td>
	  <td style="width:80px;" class="htf">State</td>
	  <td style="width:60px;" class="htf">Country</td>
	  <td style="width:80px;" class="htf">DOJ</td>
	  <td style="width:60px;" class="htf">Actual Expen.</td>
	  <td style="width:60px;" class="htf">Month</td>
	  <td style="width:50px;" class="htf">Year</td>
	  
	  <td style="width:50px;" class="htf">Total- day</td>
	  <td style="width:50px;" class="htf">Abs- ent</td>
	  <td style="width:50px;" class="htf">Paid- day</td>
	  
	  <td style="width:50px;" class="htf">Paid Expen.</td>
	  <td style="width:50px;" class="htf">Slip</td>
	  <td style="width:120px;" class="htf">Remark</td>
	  <td style="width:50px;" class="htf">Paid Status</td>
	  </tr>
<?php 
$sqlee=mysql_query("select * from fa_notaccemp where RepEmpId=".$EmployeeId,$con); $rowee=mysql_num_rows($sqlee);
if($EmployeeId==1315)
{

 if($rowee>0)
 {
  if($_REQUEST['md']==4){ $result=mysql_query("select * from fa_notaccemp nf  inner join fa_details fd on nf.EmpId=fd.Reporting where ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01' OR LWD>='".date($y."-".$m."-01")."')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' order by FaId ASC",$con); }
  elseif($_REQUEST['md']!=4){ $result=mysql_query("select * from fa_notaccemp nf  inner join fa_details fd on nf.EmpId=fd.Reporting where ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01' OR LWD>='".date($y."-".$m."-01")."')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' AND Mode=".$_REQUEST['md']." order by FaId ASC",$con); }
 }
 else
 {
  if($_REQUEST['md']==4){ $result=mysql_query("select * from fa_details fd  where ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01' OR LWD>='".date($y."-".$m."-01")."')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' order by FaId ASC",$con); }
  elseif($_REQUEST['md']!=4){ $result=mysql_query("select * from fa_details fd  where ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01' OR LWD>='".date($y."-".$m."-01")."')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' AND Mode=".$_REQUEST['md']." order by FaId ASC",$con); }
 }

}
else
{

 if($rowee>0)
 {
  if($_REQUEST['md']==4){ $result=mysql_query("select * from fa_notaccemp nf inner join hrm_sales_reporting_level rl on (nf.EmpId=rl.EmployeeID OR nf.EmpId=rl.R1 OR nf.EmpId=rl.R2 OR nf.EmpId=rl.R3 OR nf.EmpId=rl.R4) inner join fa_details fd on rl.EmployeeID=fd.Reporting where (nf.RepEmpId=".$EmployeeId." OR rl.EmployeeID=".$EmployeeId.") AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01' OR LWD>='".date($y."-".$m."-01")."')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' order by FaId ASC",$con); }
  elseif($_REQUEST['md']!=4){ $result=mysql_query("select * from fa_notaccemp nf inner join hrm_sales_reporting_level rl on (nf.EmpId=rl.EmployeeID OR nf.EmpId=rl.R1 OR nf.EmpId=rl.R2 OR nf.EmpId=rl.R3 OR nf.EmpId=rl.R4) inner join fa_details fd on rl.EmployeeID=fd.Reporting where (nf.RepEmpId=".$EmployeeId." OR rl.EmployeeID=".$EmployeeId.") AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01' OR LWD>='".date($y."-".$m."-01")."')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' AND Mode=".$_REQUEST['md']." order by FaId ASC",$con); }
 }
 else
 {
  if($_REQUEST['md']==4){ $result=mysql_query("select * from fa_details fd inner join hrm_sales_reporting_level rl on fd.Reporting=rl.EmployeeID where (fd.Reporting=".$EmployeeId." OR rl.R1=".$EmployeeId." OR rl.R2=".$EmployeeId." OR rl.R3=".$EmployeeId." OR rl.R4=".$EmployeeId." OR rl.R5=".$EmployeeId.") AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01' OR LWD>='".date($y."-".$m."-01")."')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' order by FaId ASC",$con); }
  elseif($_REQUEST['md']!=4){ $result=mysql_query("select * from fa_details fd inner join hrm_sales_reporting_level rl on fd.Reporting=rl.EmployeeID where (fd.Reporting=".$EmployeeId." OR rl.R1=".$EmployeeId." OR rl.R2=".$EmployeeId." OR rl.R3=".$EmployeeId." OR rl.R4=".$EmployeeId." OR rl.R5=".$EmployeeId.") AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01' OR LWD>='".date($y."-".$m."-01")."')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' AND Mode=".$_REQUEST['md']." order by FaId ASC",$con); }
 }    
    
} //else

$total_records=mysql_num_rows($result);
if(isset($_GET['page'])){$page=$_GET['page']; $no=(14*($_GET['page']-1))+$_GET['page'];}else{$page = 1; $no=1;} 
$offset = 15; if ($page){ $from = ($page * $offset) - $offset; }else{ $from = 0; }
echo '<input type="hidden" id="pg" value='.$page.'/>';

if($EmployeeId==1315)
{
    
 if($rowee>0)
 {
  if($_REQUEST['md']==4){ $sql=mysql_query("select * from fa_notaccemp nf inner join fa_details fd on nf.EmpId=fd.Reporting where ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01' OR LWD>='".date($y."-".$m."-01")."')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' order by FaId ASC LIMIT ".$from.",".$offset,$con); }
  elseif($_REQUEST['md']!=4){ $sql=mysql_query("select * from fa_notaccemp nf inner join fa_details fd on nf.EmpIdD=fd.Reporting where ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01' OR LWD>='".date($y."-".$m."-01")."')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' AND Mode=".$_REQUEST['md']." order by FaId ASC LIMIT ".$from.",".$offset,$con); }
 }
 else
 {
  if($_REQUEST['md']==4){ $sql=mysql_query("select * from fa_details fd where ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01' OR LWD>='".date($y."-".$m."-01")."')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' order by FaId ASC LIMIT ".$from.",".$offset,$con); }
  elseif($_REQUEST['md']!=4){ $sql=mysql_query("select * from fa_details fd  where ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01' OR LWD>='".date($y."-".$m."-01")."')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' AND Mode=".$_REQUEST['md']." order by FaId ASC LIMIT ".$from.",".$offset,$con); }
 }

}
else
{

 if($rowee>0)
 {
  if($_REQUEST['md']==4){ $sql=mysql_query("select * from fa_notaccemp nf inner join hrm_sales_reporting_level rl on (nf.EmpId=rl.EmployeeID OR nf.EmpId=rl.R1 OR nf.EmpId=rl.R2 OR nf.EmpId=rl.R3 OR nf.EmpId=rl.R4) inner join fa_details fd on rl.EmployeeID=fd.Reporting where (nf.RepEmpId=".$EmployeeId." OR rl.EmployeeID=".$EmployeeId.") AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01' OR LWD>='".date($y."-".$m."-01")."')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' order by FaId ASC LIMIT ".$from.",".$offset,$con); }
  elseif($_REQUEST['md']!=4){ $sql=mysql_query("select * from fa_notaccemp nf inner join hrm_sales_reporting_level rl on (nf.EmpId=rl.EmployeeID OR nf.EmpId=rl.R1 OR nf.EmpId=rl.R2 OR nf.EmpId=rl.R3 OR nf.EmpId=rl.R4) inner join fa_details fd on rl.EmployeeID=fd.Reporting where (nf.RepEmpId=".$EmployeeId." OR rl.EmployeeID=".$EmployeeId.") AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01' OR LWD>='".date($y."-".$m."-01")."')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' AND Mode=".$_REQUEST['md']." order by FaId ASC LIMIT ".$from.",".$offset,$con); }
 }
 else
 {
  if($_REQUEST['md']==4){ $sql=mysql_query("select * from fa_details fd inner join hrm_sales_reporting_level rl on fd.Reporting=rl.EmployeeID where (fd.Reporting=".$EmployeeId." OR rl.R1=".$EmployeeId." OR rl.R2=".$EmployeeId." OR rl.R3=".$EmployeeId." OR rl.R4=".$EmployeeId." OR rl.R5=".$EmployeeId.") AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01' OR LWD>='".date($y."-".$m."-01")."')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' order by FaId ASC LIMIT ".$from.",".$offset,$con); }
  elseif($_REQUEST['md']!=4){ $sql=mysql_query("select * from fa_details fd inner join hrm_sales_reporting_level rl on fd.Reporting=rl.EmployeeID where (fd.Reporting=".$EmployeeId." OR rl.R1=".$EmployeeId." OR rl.R2=".$EmployeeId." OR rl.R3=".$EmployeeId." OR rl.R4=".$EmployeeId." OR rl.R5=".$EmployeeId.") AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01' OR LWD>='".date($y."-".$m."-01")."')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' AND Mode=".$_REQUEST['md']." order by FaId ASC LIMIT ".$from.",".$offset,$con); }
 }    
    
}//else

      $sn=1; while($res=mysql_fetch_array($sql)){ $shq=mysql_query("select CountryName,StateName,HqName,s.CountryId,h.StateId from hrm_headquater h inner join hrm_state s on h.StateId=s.StateId inner join hrm_country c on s.CountryId=c.CountryId where h.HqId=".$res['HqId'], $con);
	  $rhq=mysql_fetch_assoc($shq); ?> 
<tr style="height:22px;" bgcolor="#FFFFFF" id="TR<?php echo $sn; ?>">
<td align="center" style="width:30px;"><input type="checkbox" id="Chk<?php echo $sn; ?>" onClick="FucChk(<?php echo $sn; ?>)" /></td>
<td class="tdf2" align="center"><?php echo $sn; ?></td>
<td class="tdf2">&nbsp;<?php echo $res['FaName']; ?></td>
<td class="tdf2"><?php if($res['Mode']==1){echo 'Direct(Sales Executive)';}elseif($res['Mode']==2){echo 'Teamlease';}elseif($res['Mode']==3){echo 'Distributor';}?></td>
<td class="tdf2"><?php echo ucfirst(strtolower($rhq['HqName'])); ?></td>
<td class="tdf2"><?php echo ucfirst(strtolower($rhq['StateName'])); ?></td>
<td class="tdf2"><?php echo ucfirst(strtolower($rhq['CountryName'])); ?></td>
<td class="tdf2" align="center"><?php echo date("d-m-y",strtotime($res['DOJ'])); ?></td>
<td class="tdf2" align="right"><?php echo floatval($res['Salary']+$res['Expences']); ?>&nbsp;</td>
	 
	 <td class="tdf2" align="center"><?php echo $Month; ?></td>
	 <td class="tdf2" align="center"><?php echo $_REQUEST['y']; ?></td>
	 
<?php $sal=mysql_query("select * from fa_salary where FaId=".$res['FaId']." AND Month=".$_REQUEST['m']." AND Year=".$_REQUEST['y'],$con); $rowS=mysql_num_rows($sal); $resS=mysql_fetch_assoc($sal); 
      $totD=$resS['TotP']+$resS['TotA']; $PaidDays=$day-$resS['TotA']; ?>	  	 
     <td class="tdf2" align="center"><?php if($day>0){echo floatval($day);} ?></td>
	 <td class="tdf2" align="center"><?php if($resS['TotA']>0){echo floatval($resS['TotA']);} ?></td>
	 <td class="tdf2" align="center"><?php if($PaidDays>0){echo floatval($PaidDays);} ?></td>
	 
<td class="tdf2" align="right"><?php if($resS['ActualSal']>0 OR $resS['ActualExp']>0){echo floatval($resS['ActualSal']+$resS['ActualExp']);} ?>&nbsp;</td>
	 
	 <td class="tdf2" align="center"><?php if($rowS>0){ if($resS['Status']==2 AND $resS['Slip']!=''){?><span style="cursor:pointer;color:#0061C1;" onClick="OpenSlip(<?php echo $resS['SalId'];?>)"><u>click</u></span><?php } elseif($resS['Status']==0 OR $resS['Status']=1){echo ''; } }else{echo '';}?></td>
	 <td class="tdf2" valign="top"><?php echo $resS['Remark']; ?></td>
	 <td class="tdf2" align="center"><?php if($rowS>0){ if($resS['Status']==0){echo 'Draft';}elseif($resS['Status']==1){echo '<font color="#FFA448">Pending</font>';}elseif($resS['Status']==2){echo '<font color="#3D830E">Paid</font>';}elseif($resS['Status']==3){echo '<font color="#FF2222">Reject</font>'; }  }else{echo '';} ?></td>
	</tr> 
<?php $sn++; } ?>
   <tr>
    <td colspan="2"></td>
    <td colspan="11" style="font-family:Times New Roman;font-size:15px;font-weight:bold;">
     <?php doPages($offset, 'f_rsalary.php', '', $total_records,$_REQUEST['hq'],$_REQUEST['s'],$_REQUEST['m'],$_REQUEST['y'],$_REQUEST['md']); ?>
    </td>
   </tr>
<?php } ?> 


<?php /******************************** TeamLease Open **********************/ ?>
<?php /******************************** TeamLease Open **********************/ ?>    
<?php $sql=mysql_query("select * from fa_details fd inner join hrm_sales_tlemp tle on fd.Reporting=tle.TLEId where tle.TLRepId=".$EmployeeId." AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01' OR LWD>='".date($y."-".$m."-01")."')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' order by FaId ASC",$con); $row=mysql_num_rows($sql); if($row>0){ ?>

<tr style="height:22px;"><td colspan="18" class="htf"></td></tr>
<?php  $sn2=101; $no2=1; while($res=mysql_fetch_array($sql)){ $shq=mysql_query("select CountryName,StateName,HqName,s.CountryId,h.StateId from hrm_headquater h inner join hrm_state s on h.StateId=s.StateId inner join hrm_country c on s.CountryId=c.CountryId where h.HqId=".$res['HqId'], $con);
	  $rhq=mysql_fetch_assoc($shq); ?> 
<tr style="height:22px;" bgcolor="#FFFFFF" id="TR<?php echo $sn2; ?>">
<td align="center" style="width:30px;"><input type="checkbox" id="Chk<?php echo $sn2; ?>" onClick="FucChk(<?php echo $sn2; ?>)" /></td>
<td class="tdf2" align="center"><?php echo $no2; ?></td>
<td class="tdf2">&nbsp;<?php echo $res['FaName']; ?></td>
<td class="tdf2"><?php if($res['Mode']==1){echo 'Direct(Sales Executive)';}elseif($res['Mode']==2){echo 'Teamlease';}elseif($res['Mode']==3){echo 'Distributor';}?></td>
<td class="tdf2"><?php echo ucfirst(strtolower($rhq['HqName'])); ?></td>
<td class="tdf2"><?php echo ucfirst(strtolower($rhq['StateName'])); ?></td>
<td class="tdf2"><?php echo ucfirst(strtolower($rhq['CountryName'])); ?></td>
<td class="tdf2" align="center"><?php echo date("d-m-y",strtotime($res['DOJ'])); ?></td>
<td class="tdf2" align="right"><?php echo floatval($res['Salary']+$res['Expences']); ?>&nbsp;</td>
	 
	 <td class="tdf2" align="center"><?php echo $Month; ?></td>
	 <td class="tdf2" align="center"><?php echo $_REQUEST['y']; ?></td>
	 
<?php $sal=mysql_query("select * from fa_salary where FaId=".$res['FaId']." AND Month=".$_REQUEST['m']." AND Year=".$_REQUEST['y'],$con); $rowS=mysql_num_rows($sal); $resS=mysql_fetch_assoc($sal); 
      $totD=$resS['TotP']+$resS['TotA']; $PaidDays=$day-$resS['TotA']; ?>	  	 
     <td class="tdf2" align="center"><?php if($day>0){echo floatval($day);} ?></td>
	 <td class="tdf2" align="center"><?php if($resS['TotA']>0){echo floatval($resS['TotA']);} ?></td>
	 <td class="tdf2" align="center"><?php if($PaidDays>0){echo floatval($PaidDays);} ?></td>
	 
<td class="tdf2" align="right"><?php if($resS['ActualSal']>0 OR $resS['ActualExp']>0){echo floatval($resS['ActualSal']+$resS['ActualExp']);} ?>&nbsp;</td>
	 
	 <td class="tdf2" align="center"><?php if($rowS>0){ if($resS['Status']==2 AND $resS['Slip']!=''){?><span style="cursor:pointer;color:#0061C1;" onClick="OpenSlip(<?php echo $resS['SalId'];?>)"><u>click</u></span><?php } elseif($resS['Status']==0 OR $resS['Status']=1){echo ''; } }else{echo '';}?></td>
	 <td class="tdf2" valign="top"><?php echo $resS['Remark']; ?></td>
	 
	 <td class="tdf2" align="center"><?php if($rowS>0){ if($resS['Status']==0){echo 'Draft';}elseif($resS['Status']==1){echo '<font color="#FFA448">Pending</font>';}elseif($resS['Status']==2){echo '<font color="#3D830E">Paid</font>';}elseif($resS['Status']==3){echo '<font color="#FF2222">Reject</font>'; }  }else{echo '';} ?></td>
	</tr> 
<?php $sn2++; $no2++; } } ?>
<?php /**************************** Teamlease Close **************************/ ?>
<?php /**************************** Teamlease Close **************************/ ?>
    
    
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
function doPages($page_size, $thepage, $query_string, $total=0,$hq,$s,$m,$y,$md){ $index_limit = 5; $query=''; if(strlen($query_string)>0){ $query = "&amp;".$query_string; }
$current = get_current_page(); $total_pages=ceil($total/$page_size); $start=max($current-intval($index_limit/2), 1); $end=$start+$index_limit-1;
echo '<div class="paging">';
if($current==1){ echo '<span class="prn">&lt; Previous</span>&nbsp;';}else{ $i = $current-1; echo '<a href="'.$thepage.'?page='.$i.$query.'&hq='.$hq.'&s='.$s.'&m='.$m.'&y='.$y.'&md='.$md.'&er=1013&rr=wew101" class="prn" rel="nofollow" title="go to page '.$i.'" style="color:#A6D2FF;text-decoration:none;">&lt; Previous</a>&nbsp;'; echo '<span class="prn">...</span>&nbsp;';}
if($start > 1){ $i = 1; echo '<a href="'.$thepage.'?page='.$i.$query.'&hq='.$hq.'&s='.$s.'&m='.$m.'&y='.$y.'&md='.$md.'&ee=we23&er=1013&rr=wew101" title="go to page '.$i.'" style="color:#A6D2FF;">'.$i.'</a>&nbsp;'; }
for($i = $start; $i <= $end && $i <= $total_pages; $i++)
{ if($i==$current){ echo '<span>'.$i.'</span>&nbsp;';} else { echo '<a href="'.$thepage.'?page='.$i.$query.'&hq='.$hq.'&s='.$s.'&m='.$m.'&y='.$y.'&md='.$md.'&ee=we23&er=1013&rr=wew101" title="go to page '.$i.'" style="color:#A6D2FF;">'.$i.'</a>&nbsp;'; } }
if($total_pages > $end){ $i = $total_pages; echo '<a href="'.$thepage.'?page='.$i.$query.'&hq='.$hq.'&s='.$s.'&m='.$m.'&y='.$y.'&md='.$md.'&ee=we23&er=1013&rr=wew101" title="go to page '.$i.'" style="color:#A6D2FF;">'.$i.'</a>&nbsp;'; } if($current < $total_pages) { $i = $current+1; echo '<span class="prn">...</span>&nbsp;'; echo '<a href="'.$thepage.'?page='.$i.$query.'&hq='.$hq.'&s='.$s.'&m='.$m.'&y='.$y.'&md='.$md.'&ee=we23&er=1013&rr=wew101" class="prn" rel="nofollow" title="go to page '.$i.'" style="color:#A6D2FF;text-decoration:none;" style="color:#A6D2FF;">Next &gt;</a>&nbsp;'; } else { echo '<span class="prn">Next &gt;</span>&nbsp;'; } if ($total != 0){ echo '&nbsp;&nbsp;&nbsp;&nbsp;<font color="#A6D2FF"<h4>[Total '.$total.' Records]</h></div>'; }
}
?>