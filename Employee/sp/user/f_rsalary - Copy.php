<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}
$m=$_REQUEST['m']; $y=$_REQUEST['y']; $hq=$_REQUEST['hq']; $s=$_REQUEST['s']; $md=$_REQUEST['md'];
$rbm=$_REQUEST['rbm']; $abm=$_REQUEST['abm']; $m1=$_REQUEST['m1']; $m2=$_REQUEST['m2']; $m3=$_REQUEST['m3'];
$m4=$_REQUEST['m4']; $m5=$_REQUEST['m5']; $m6=$_REQUEST['m6']; $m7=$_REQUEST['m7']; $m8=$_REQUEST['m8']; $m9=$_REQUEST['m9']; $m10=$_REQUEST['m10']; $m11=$_REQUEST['m11']; $m12=$_REQUEST['m12'];
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
function FunRef(m,y,s,hq,md,rbm,abm){ window.location="f_rsalary.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&md="+md+"&rbm=0&abm=0&m1=0&m2=0&m3=0&m4=0&m5=0&m6=0&m7=0&m8=0&m9=0&m10=0&m11=0&m12=0"; }

function funrbm(rbm,m,y,md)
{ var sts=''; window.location="f_rsalary.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s=0&hq=0&dis=0&sts="+sts+"&rbm="+rbm+"&abm=0&md="+md+"&m1="+document.getElementById("Chhk1").value+"&m2="+document.getElementById("Chhk2").value+"&m3="+document.getElementById("Chhk3").value+"&m4="+document.getElementById("Chhk4").value+"&m5="+document.getElementById("Chhk5").value+"&m6="+document.getElementById("Chhk6").value+"&m7="+document.getElementById("Chhk7").value+"&m8="+document.getElementById("Chhk8").value+"&m9="+document.getElementById("Chhk9").value+"&m10="+document.getElementById("Chhk10").value+"&m11="+document.getElementById("Chhk11").value+"&m12="+document.getElementById("Chhk12").value; }

function funabm(abm,m,y,md)
{ var sts=''; window.location="f_rsalary.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s=0&hq=0&dis=0&sts="+sts+"&rbm=0&abm="+abm+"&md="+md+"&m1="+document.getElementById("Chhk1").value+"&m2="+document.getElementById("Chhk2").value+"&m3="+document.getElementById("Chhk3").value+"&m4="+document.getElementById("Chhk4").value+"&m5="+document.getElementById("Chhk5").value+"&m6="+document.getElementById("Chhk6").value+"&m7="+document.getElementById("Chhk7").value+"&m8="+document.getElementById("Chhk8").value+"&m9="+document.getElementById("Chhk9").value+"&m10="+document.getElementById("Chhk10").value+"&m11="+document.getElementById("Chhk11").value+"&m12="+document.getElementById("Chhk12").value; }

function funmonth(m,y,s,hq,md,rbm,abm)
{ window.location="f_rsalary.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&md="+md+"&rbm="+rbm+"&abm="+abm+"&m1="+document.getElementById("Chhk1").value+"&m2="+document.getElementById("Chhk2").value+"&m3="+document.getElementById("Chhk3").value+"&m4="+document.getElementById("Chhk4").value+"&m5="+document.getElementById("Chhk5").value+"&m6="+document.getElementById("Chhk6").value+"&m7="+document.getElementById("Chhk7").value+"&m8="+document.getElementById("Chhk8").value+"&m9="+document.getElementById("Chhk9").value+"&m10="+document.getElementById("Chhk10").value+"&m11="+document.getElementById("Chhk11").value+"&m12="+document.getElementById("Chhk12").value; }
function funyear(y,m,s,hq,md,rbm,abm)
{ window.location="f_rsalary.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&md="+md+"&rbm="+rbm+"&abm="+abm+"&m1="+document.getElementById("Chhk1").value+"&m2="+document.getElementById("Chhk2").value+"&m3="+document.getElementById("Chhk3").value+"&m4="+document.getElementById("Chhk4").value+"&m5="+document.getElementById("Chhk5").value+"&m6="+document.getElementById("Chhk6").value+"&m7="+document.getElementById("Chhk7").value+"&m8="+document.getElementById("Chhk8").value+"&m9="+document.getElementById("Chhk9").value+"&m10="+document.getElementById("Chhk10").value+"&m11="+document.getElementById("Chhk11").value+"&m12="+document.getElementById("Chhk12").value;}
function funstate(s,m,y,md,rbm,abm)
{ window.location="f_rsalary.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq=0&dis=0&md="+md+"&rbm=0&abm=0&m1="+document.getElementById("Chhk1").value+"&m2="+document.getElementById("Chhk2").value+"&m3="+document.getElementById("Chhk3").value+"&m4="+document.getElementById("Chhk4").value+"&m5="+document.getElementById("Chhk5").value+"&m6="+document.getElementById("Chhk6").value+"&m7="+document.getElementById("Chhk7").value+"&m8="+document.getElementById("Chhk8").value+"&m9="+document.getElementById("Chhk9").value+"&m10="+document.getElementById("Chhk10").value+"&m11="+document.getElementById("Chhk11").value+"&m12="+document.getElementById("Chhk12").value; }
function funhq(hq,m,y,s,md,rbm,abm)
{ window.location="f_rsalary.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&md="+md+"&rbm=0&abm=0&m1="+document.getElementById("Chhk1").value+"&m2="+document.getElementById("Chhk2").value+"&m3="+document.getElementById("Chhk3").value+"&m4="+document.getElementById("Chhk4").value+"&m5="+document.getElementById("Chhk5").value+"&m6="+document.getElementById("Chhk6").value+"&m7="+document.getElementById("Chhk7").value+"&m8="+document.getElementById("Chhk8").value+"&m9="+document.getElementById("Chhk9").value+"&m10="+document.getElementById("Chhk10").value+"&m11="+document.getElementById("Chhk11").value+"&m12="+document.getElementById("Chhk12").value; }
function funmd(md,m,y,hq,s,rbm,abm)
{ window.location="f_rsalary.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&md="+md+"&rbm="+rbm+"&abm="+abm+"&m1="+document.getElementById("Chhk1").value+"&m2="+document.getElementById("Chhk2").value+"&m3="+document.getElementById("Chhk3").value+"&m4="+document.getElementById("Chhk4").value+"&m5="+document.getElementById("Chhk5").value+"&m6="+document.getElementById("Chhk6").value+"&m7="+document.getElementById("Chhk7").value+"&m8="+document.getElementById("Chhk8").value+"&m9="+document.getElementById("Chhk9").value+"&m10="+document.getElementById("Chhk10").value+"&m11="+document.getElementById("Chhk11").value+"&m12="+document.getElementById("Chhk12").value; }

function FucChk(sn)
{ if(document.getElementById("Chk"+sn).checked==true){document.getElementById("TR"+sn).style.background='#9BEF47'; document.getElementById("name"+sn).style.background='#9BEF47'; document.getElementById("mode"+sn).style.background='#9BEF47'; document.getElementById("hq"+sn).style.background='#9BEF47'; document.getElementById("state"+sn).style.background='#9BEF47'; document.getElementById("country"+sn).style.background='#9BEF47'; document.getElementById("crp"+sn).style.background='#9BEF47'; document.getElementById("dealer"+sn).style.background='#9BEF47'; document.getElementById("saldealer"+sn).style.background='#9BEF47'; document.getElementById("email"+sn).style.background='#9BEF47';document.getElementById("rep"+sn).style.background='#9BEF47'; document.getElementById("rep2"+sn).style.background='#9BEF47'; document.getElementById("rep3"+sn).style.background='#9BEF47'; 
 }
  else if(document.getElementById("Chk"+sn).checked==false){document.getElementById("TR"+sn).style.background='#FFFFFF'; document.getElementById("name"+sn).style.background='#FFFFFF'; document.getElementById("mode"+sn).style.background='#FFFFFF'; document.getElementById("hq"+sn).style.background='#FFFFFF'; document.getElementById("state"+sn).style.background='#FFFFFF'; document.getElementById("country"+sn).style.background='#FFFFFF'; document.getElementById("crp"+sn).style.background='#FFFFFF'; document.getElementById("dealer"+sn).style.background='#FFFFFF'; document.getElementById("saldealer"+sn).style.background='#FFFFFF'; document.getElementById("email"+sn).style.background='#FFFFFF'; document.getElementById("rep"+sn).style.background='#FFFFFF'; document.getElementById("rep2"+sn).style.background='#FFFFFF'; document.getElementById("rep3"+sn).style.background='#FFFFFF'; }
}

function OpenSlip(si)
{ window.open("f_slip.php?si="+si,"slip","width=600,height=600");}

function funExport(s,hq,m,y,rbm,abm,md)
{ var win = window.open("f_salexports.php?hq="+hq+"&s="+s+"&m="+m+"&y="+y+"&rbm="+rbm+"&abm="+abm+"&md="+md+"&m1="+document.getElementById("Chhk1").value+"&m2="+document.getElementById("Chhk2").value+"&m3="+document.getElementById("Chhk3").value+"&m4="+document.getElementById("Chhk4").value+"&m5="+document.getElementById("Chhk5").value+"&m6="+document.getElementById("Chhk6").value+"&m7="+document.getElementById("Chhk7").value+"&m8="+document.getElementById("Chhk8").value+"&m9="+document.getElementById("Chhk9").value+"&m10="+document.getElementById("Chhk10").value+"&m11="+document.getElementById("Chhk11").value+"&m12="+document.getElementById("Chhk12").value,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=50,height=50"); }

function funDetail(id,y,rbm,abm)
{ var win = window.open("f_salyear.php?id="+id+"&y="+y+"&rbm="+rbm+"&abm="+abm+"&m1="+document.getElementById("Chhk1").value+"&m2="+document.getElementById("Chhk2").value+"&m3="+document.getElementById("Chhk3").value+"&m4="+document.getElementById("Chhk4").value+"&m5="+document.getElementById("Chhk5").value+"&m6="+document.getElementById("Chhk6").value+"&m7="+document.getElementById("Chhk7").value+"&m8="+document.getElementById("Chhk8").value+"&m9="+document.getElementById("Chhk9").value+"&m10="+document.getElementById("Chhk10").value+"&m11="+document.getElementById("Chhk11").value+"&m12="+document.getElementById("Chhk12").value,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=800,height=500"); }

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
<?php if($m==1){$Month='January';}elseif($m==2){$Month='February';}elseif($m==3){$Month='March';}elseif($m==4){$Month='April';}elseif($m==5){$Month='May';}elseif($m==6){$Month='June';}elseif($m==7){$Month='July';}elseif($m==8){$Month='August';}elseif($m==9){$Month='September';}elseif($m==10){$Month='October';}elseif($m==11){$Month='November';}elseif($m==12){$Month='December';}elseif($m==13){$Month='All Month';} 
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
	    <td colspan="2" class="htf2" align="left"><u>FA Expenses Reports</u></td>
	    <td colspan="10" class="tdf" style="font-size:14px;">&nbsp;Month:&nbsp;&nbsp;&nbsp;
<script>function Funchk(i){if(document.getElementById("m"+i).checked==true){document.getElementById("Chhk"+i).value=1;}else{document.getElementById("Chhk"+i).value=0;}}</script>		
		<font style="color:#FFFF84;">
		<?php for($i=1; $i<=12; $i++){ ?>
		<?php echo date("M",strtotime(date("Y-".$i."-01"))); ?><input type="checkbox" name="<?php echo 'm'.$i; ?>" id="<?php echo 'm'.$i; ?>" value="<?php echo $i; ?>" onClick="Funchk(<?php echo $i ?>)" <?php if($_REQUEST['m'.$i]==1){echo 'checked';} ?> /><input type="hidden" id="Chhk<?php echo $i; ?>" name="Chhk<?php echo $i; ?>" value="<?php echo $_REQUEST['m'.$i]; ?>" /><?php if($i<=11){echo '&nbsp;&nbsp;';} ?>
		<?php } ?>
		</font>
		&nbsp;&nbsp;&nbsp;<span class="tdf">&nbsp;Year&nbsp;&nbsp;</sapn><select style="width:60px;" class="InputSel" id="year" name="year" onChange="funyear(this.value,<?php echo $m.','.$_REQUEST['s'].','.$_REQUEST['hq'].','.$md.','.$rbm.','.$abm; ?>)"><option value="<?php echo $y; ?>" selected="selected"><?php echo $y; ?></option><?php for($j=2015;$j<=date("Y");$j++){ if($j!=$y){ ?><option value="<?php echo $j; ?>"><?php echo $j; ?></option><?php }} ?></select>
		<input type="hidden" id="month" name="month" onChange="funmonth(this.value,<?php echo $y.','.$_REQUEST['s'].','.$_REQUEST['hq'].','.$md.','.$rbm.','.$abm; ?>)" value="<?php echo $m; ?>" />
	   <?php if($i==1){echo 'JANUARY';}elseif($i==2){echo 'FEBRUARY';}elseif($i==3){echo 'MARCH';}elseif($i==4){echo 'APRIL';}elseif($i==5){echo 'MAY';}elseif($i==6){echo 'JUNE';}elseif($i==7){echo 'JULY';}elseif($i==8){echo 'AUGUST';}elseif($i==9){echo 'SEPTEMBER';}elseif($i==10){echo 'OCTOBER';}elseif($i==11){echo 'NOVEMBER';}elseif($i==12){echo 'DECEMBER';} ?>
		
		</td> 
	   </tr>
	    <tr>
	    <td colspan="2" class="tdf2" align="center">
		<span style="cursor:pointer;color:#FFFF6A;" onClick="FunRef(<?php echo $m.','.$y.','.$_REQUEST['s'].','.$_REQUEST['hq'].','.$md.','.$rbm.','.$abm; ?>)"><u>refresh</u></span>
	    &nbsp;&nbsp;
		<?php if($_REQUEST['hq']>0 OR $_REQUEST['s']>0 OR $_REQUEST['s']=='All' OR $_REQUEST['rbm']>0 OR $_REQUEST['abm']>0){ ?><span style="cursor:pointer;color:#FFFFFF;" onClick="funExport('<?php echo $_REQUEST['s']; ?>',<?php echo $_REQUEST['hq'].','.$_REQUEST['m'].','.$_REQUEST['y'].','.$rbm.','.$abm.','.$md; ?>)"><u>Export</u></span><?php } ?>
		</td>
	
		<td class="tdf">&nbsp;State</td>
		<td style="width:120px;"><select style="width:120px;" class="InputSel" id="state" name="state" onChange="funstate(this.value,<?php echo $m.','.$y.','.$md.','.$rbm.','.$abm; ?>)">
<?php if($s=='All'){?><option value="All">All</option><?php } elseif($s>0){ $ss=mysql_query("select StateName from hrm_state where StateId=".$s,$con); $rs=mysql_fetch_assoc($ss); ?><option value='<?php echo $s;?>' selected><?php echo ucfirst(strtolower($rs['StateName']));?></option><?php } else { ?><option value="0" selected>select</option><?php } $sqls=mysql_query("select StateId,StateName from hrm_state group by StateId order by StateName ASC",$con); while($ress=mysql_fetch_assoc($sqls)){ ?><option value="<?php echo $ress['StateId']; ?>"><?php echo ucfirst(strtolower($ress['StateName'])); ?></option><?php } ?><option value="All">All</option></select></td>

	 <td class="tdf">&nbsp;HQ</td>
	 <td style="width:120px;"><select style="width:120px;" class="InputSel" id="hq" name="hq" onChange="funhq(this.value,<?php echo $m.','.$y.','.$_REQUEST['s'].','.$md.','.$rbm.','.$abm; ?>)" <?php if($s>0 OR $_REQUEST['hq']>0){echo '';}else{echo 'disabled';} ?>><?php if($_REQUEST['hq']>0){ $shq=mysql_query("select HqName from hrm_headquater where HqId=".$_REQUEST['hq'],$con); $rhq=mysql_fetch_assoc($shq); ?><option value='<?php echo $_REQUEST['hq'];?>' selected><?php echo ucfirst(strtolower($rhq['HqName']));?></option><?php } else { ?><option value="0" selected>select</option><?php } if($_REQUEST['s']>0){ ?><?php $sqlhq=mysql_query("select * from hrm_headquater where StateId=".$_REQUEST['s']." group by HqName order by HqName asc",$con); while($reshq=mysql_fetch_assoc($sqlhq)){ ?><option value="<?php echo $reshq['HqId']; ?>"><?php echo ucfirst(strtolower($reshq['HqName'])); ?></option><?php } } ?></select></td>
	 
	 <td class="tdf">&nbsp;Mode</td>
	 <td style="width:100px;"><select style="width:100px;" class="InputSel" id="mode" name="mode" onChange="funmd(this.value,<?php echo $m.','.$y.','.$_REQUEST['hq'].','.$_REQUEST['s'].','.$rbm.','.$abm; ?>)" <?php if($_REQUEST['s']>0 OR $_REQUEST['hq']>0){echo '';}else{echo '';} ?>><?php if($_REQUEST['md']>0){ ?><option value='<?php echo $_REQUEST['md'];?>' selected><?php if($_REQUEST['md']==1){$mode='Direct(Sales Executive)';}elseif($_REQUEST['md']==2){$mode='Teamlease';}elseif($_REQUEST['md']==3){$mode='Distributor';}elseif($_REQUEST['md']==4){$mode='All';} echo ucfirst(strtolower($mode));?></option><?php } else { ?><option value="0" selected>select</option><?php } ?>
	 <option value="1">Direct(Sales Executive)</option><option value="2">Teamlease</option>
	 <option value="3">Distributor</option><option value="4">All</option></select></td>
	 
        <td class="tdf">&nbsp;RBM/ZBM</td>
		<td><select style="width:150px;" class="InputSel" id="rbm" name="rbm" onChange="funrbm(this.value,<?php echo $m.','.$y.','.$md; ?>)"><?php if($_REQUEST['rbm']>0){ $sb=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$_REQUEST['rbm'],$con); $rb=mysql_fetch_assoc($sb); ?><option value='<?php echo $_REQUEST['rbm'];?>' selected><?php echo ucwords(strtolower($rb['Fname'].' '.$rb['Sname'].' '.$rb['Lname']));?></option><?php }else{?><option value="0">Select</option><?php } ?><?php $sb2=mysql_query("select e.EmployeeID,Fname,Sname,Lname,DesigCode from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_designation de on g.DesigId=de.DesigId where e.EmpStatus='A' AND (g.DesigId=65 OR g.DesigId=66 OR g.DesigId=358 OR g.DesigId=375)",$con); while($rb2=mysql_fetch_assoc($sb2)){ ?><option value="<?php echo $rb2['EmployeeID']; ?>"><?php echo ucwords(strtolower($rb2['Fname'].' '.$rb2['Sname'].' '.$rb2['Lname'].' - '.$rb2['DesigCode'])); ?></option><?php } ?></select></td>
		<td class="tdf">&nbsp;ABM/ATM</td>
		<td><select style="width:150px;" class="InputSel" id="abm" name="abm" onChange="funabm(this.value,<?php echo $m.','.$y.','.$md; ?>)"><?php if($_REQUEST['abm']>0){ $sa=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$_REQUEST['abm'],$con); $ra=mysql_fetch_assoc($sa); ?><option value='<?php echo $_REQUEST['abm'];?>' selected><?php echo ucwords(strtolower($ra['Fname'].' '.$ra['Sname'].' '.$ra['Lname']));?></option><?php }else{?><option value="0">Select</option><?php } ?><?php $sa2=mysql_query("select e.EmployeeID,Fname,Sname,Lname,DesigCode from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_designation de on g.DesigId=de.DesigId where e.EmpStatus='A' AND (g.DesigId=67 OR g.DesigId=414 OR g.DesigId=415 OR g.DesigId=212)",$con); while($ra2=mysql_fetch_assoc($sa2)){ ?><option value="<?php echo $ra2['EmployeeID']; ?>"><?php echo ucwords(strtolower($ra2['Fname'].' '.$ra2['Sname'].' '.$ra2['Lname'].' - '.$ra2['DesigCode'])); ?></option><?php } ?></select></td>
		
	   </tr>
		<tr>
	    <td colspan="2"></td>
	    
	 
	   </tr>
	  </table>
	 </td>
	</tr>
	
<?php if($_REQUEST['hq']>0 OR $_REQUEST['s']>0 OR $_REQUEST['s']=='All' OR $_REQUEST['rbm']>0 OR $_REQUEST['abm']>0){ ?>	
    <tr>
	 <td>
	  <table style="width:100%;">
	  <tr style="height:22px;">
	  <td style="width:50px;" class="htf">&nbsp;</td>
      <td style="width:30px;" class="htf">&nbsp;Sn&nbsp;</td>
      <td style="width:200px;" class="htf">Name</td>
	  <td style="width:150px;" class="htf">Mode</td>
	  <td style="width:80px;" class="htf">FA HQ</td>
	  <?php /*?><td style="width:80px;" class="htf">State</td>
	  <td style="width:80px;" class="htf">Country</td>
	  <td style="width:80px;" class="htf">DOJ</td>
	  <td style="width:80px;" class="htf">DOB</td><?php */?>
	  <td style="width:50px;" class="htf">Staus</td>
	  <td style="width:60px;" class="htf">Actual Expen.</td>
	  
	  <td style="width:100px;" class="htf">Month</td>
	  <td style="width:50px;" class="htf">Year</td>
	 <?php /*?> <td style="width:50px;" class="htf">TotalDay</td>
	  <td style="width:50px;" class="htf">Absent</td><?php */?>
	  <td style="width:50px;" class="htf">Paid <br>Day</td>
	  
	  <td style="width:50px;" class="htf">Paid Expen.</td>
	  <td style="width:50px;" class="htf">Slip</td>
	  <td style="width:50px;" class="htf">Paid Status</td>
	  
	 <?php /*?> <td style="width:150px;" class="htf">Crop</td>
	  <td style="width:150px;" class="htf">Distributor</td>
	  <td style="width:150px;" class="htf">Expen. Dis.</td>
	  <td style="width:80px;" class="htf">Expen. Mode</td>
	  <td style="width:150px;" class="htf">Email-ID</td><?php */?>
	  <td style="width:100px;" class="htf">Job Status</td>
	  <td style="width:150px;" class="htf">Reporting</td>
<?php /*?>	  <td style="width:100px;" class="htf">Rep:Level-2</td>
	  <td style="width:100px;" class="htf">Rep:Level-3</td><?php */?>
	  <td style="width:100px;" class="htf">ContactNo</td>
	  </tr>
<?php if($_REQUEST['rbm']>0 OR $_REQUEST['abm']>0)  ///1111111111111///
{  

 if($_REQUEST['rbm']>0){$ri=$_REQUEST['rbm'];}else{$ri=$_REQUEST['abm'];}
 $sqlee=mysql_query("select * from fa_notaccemp where RepEmpId=".$ri,$con); $rowee=mysql_num_rows($sqlee);
 if($rowee>0)
 {
  /************************************************/
  if($_REQUEST['md']==4){ $result=mysql_query("select * from fa_notaccemp nf inner join hrm_sales_reporting_level rl on (nf.RepEmpId=rl.EmployeeID OR nf.EmpId=rl.EmployeeID OR nf.EmpId=rl.R1 OR nf.EmpId=rl.R2 OR nf.EmpId=rl.R3 OR nf.EmpId=rl.R4) inner join fa_details fd on rl.EmployeeID=fd.Reporting where (nf.RepEmpId=".$ri." OR rl.EmployeeID=".$ri.") AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' group by FaId  order by FaId ASC",$con); }
  elseif($_REQUEST['md']!=4){ $result=mysql_query("select * from fa_notaccemp nf inner join hrm_sales_reporting_level rl on (nf.RepEmpId=rl.EmployeeID OR nf.EmpId=rl.EmployeeID OR nf.EmpId=rl.R1 OR nf.EmpId=rl.R2 OR nf.EmpId=rl.R3 OR nf.EmpId=rl.R4) inner join fa_details fd on rl.EmployeeID=fd.Reporting where (nf.RepEmpId=".$ri." OR rl.EmployeeID=".$ri.") AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' AND Mode=".$_REQUEST['md']." group by FaId  order by FaId ASC",$con); }

  $total_records=mysql_num_rows($result);
  if(isset($_GET['page'])){$page=$_GET['page']; $no=(14*($_GET['page']-1))+$_GET['page'];}else{$page = 1; $no=1;} 
  $offset = 15; if ($page){ $from = ($page * $offset) - $offset; }else{ $from = 0; } 

  if($_REQUEST['md']==4){ $sql=mysql_query("select * from fa_notaccemp nf inner join hrm_sales_reporting_level rl on (nf.RepEmpId=rl.EmployeeID OR nf.EmpId=rl.EmployeeID OR nf.EmpId=rl.R1 OR nf.EmpId=rl.R2 OR nf.EmpId=rl.R3 OR nf.EmpId=rl.R4) inner join fa_details fd on rl.EmployeeID=fd.Reporting where (nf.RepEmpId=".$ri." OR rl.EmployeeID=".$ri.") AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' group by FaId  order by FaId ASC LIMIT ".$from.",".$offset,$con); }
  elseif($_REQUEST['md']!=4){ $sql=mysql_query("select * from fa_notaccemp nf inner join hrm_sales_reporting_level rl on (nf.RepEmpId=rl.EmployeeID OR nf.EmpId=rl.EmployeeID OR nf.EmpId=rl.R1 OR nf.EmpId=rl.R2 OR nf.EmpId=rl.R3 OR nf.EmpId=rl.R4) inner join fa_details fd on rl.EmployeeID=fd.Reporting where (nf.RepEmpId=".$ri." OR rl.EmployeeID=".$ri.") AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' AND Mode=".$_REQUEST['md']." group by FaId  order by FaId ASC LIMIT ".$from.",".$offset,$con); }
  
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

  if($_REQUEST['hq']>0 AND $_REQUEST['md']==4){ $sql=mysql_query("select * from fa_details where HqId=".$_REQUEST['hq']." AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' order by FaId ASC LIMIT ".$from.",".$offset,$con);}
  elseif($_REQUEST['hq']>0 AND $_REQUEST['md']!=4){ $sql=mysql_query("select * from fa_details where HqId=".$_REQUEST['hq']." AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' AND Mode=".$_REQUEST['md']." order by FaId ASC LIMIT ".$from.",".$offset,$con);}
  elseif($_REQUEST['s']=='All' AND $_REQUEST['md']==4){ $sql=mysql_query("select * from fa_details where ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' order by FaId ASC LIMIT ".$from.",".$offset,$con); }
  elseif($_REQUEST['s']=='All' AND $_REQUEST['md']!=4){ $sql=mysql_query("select * from fa_details where ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' AND Mode=".$_REQUEST['md']." order by FaId ASC LIMIT ".$from.",".$offset,$con);}
  elseif($_REQUEST['s']>0 AND $_REQUEST['md']==4){ $sql=mysql_query("select * from fa_details f inner join hrm_headquater hq on f.HqId=hq.HqId where hq.StateId=".$_REQUEST['s']." AND ((FaStatus='A' AND (f.LWD='0000-00-00' OR f.LWD='1970-01-01')) OR (FaStatus='D' AND f.LWD>='".date($y."-".$m."-01")."')) AND f.DOJ<='".date($y."-".$m."-31")."' order by FaId ASC LIMIT ".$from.",".$offset,$con);}
  elseif($_REQUEST['s']>0 AND $_REQUEST['md']!=4){ $sql=mysql_query("select * from fa_details f inner join hrm_headquater hq on f.HqId=hq.HqId where hq.StateId=".$_REQUEST['s']." AND ((FaStatus='A' AND (f.LWD='0000-00-00' OR f.LWD='1970-01-01')) OR (FaStatus='D' AND f.LWD>='".date($y."-".$m."-01")."')) AND f.DOJ<='".date($y."-".$m."-31")."' AND Mode=".$_REQUEST['md']." order by FaId ASC LIMIT ".$from.",".$offset,$con);}

}  ///1111111111111///

      $sn=1; while($res=mysql_fetch_array($sql)){ $shq=mysql_query("select CountryName,StateName,HqName,s.CountryId,h.StateId from hrm_headquater h inner join hrm_state s on h.StateId=s.StateId inner join hrm_country c on s.CountryId=c.CountryId where h.HqId=".$res['HqId'], $con);
	  $rhq=mysql_fetch_assoc($shq); ?>	 
<tr style="height:22px;" bgcolor="#FFFFFF" id="TR<?php echo $sn; ?>">
<td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo $sn; ?>" onClick="FucChk(<?php echo $sn; ?>)" /></td>
<td class="tdf2" align="center"><?php echo $no; ?></td>
<td class="tdf2">&nbsp;<span style="cursor:pointer;color:#0079F2;" onClick="funDetail(<?php echo $res['FaId'].','.$_REQUEST['y'].','.$rbm.','.$abm; ?>)"><u><?php echo $res['FaName']; ?></u></span></td>
<td class="tdf2"><input class="InputType" style="width:150px;" id="mode<?php echo $sn; ?>" value="<?php if($res['Mode']==1){echo 'Direct(Sales Executive)';}elseif($res['Mode']==2){echo 'Teamlease';}elseif($res['Mode']==3){echo 'Distributor';}?>" readonly/></td>
<td class="tdf2"><input class="InputType" style="width:80px;" id="hq<?php echo $sn; ?>" value="<?php echo ucfirst(strtolower($res['OtherHq'])); ?>" readonly/></td>
<?php /*?><td class="tdf2"><input class="InputType" style="width:80px;" id="state<?php echo $sn; ?>" value="<?php echo ucfirst(strtolower($rhq['StateName'])); ?>" readonly/></td>
<td class="tdf2"><input class="InputType" style="width:80px;" id="country<?php echo $sn; ?>" value="<?php echo ucfirst(strtolower($rhq['CountryName'])); ?>" readonly/></td>
<td class="tdf2" align="center"><?php echo date("d-m-y",strtotime($res['DOJ'])); ?></td>
<td class="tdf2" align="center"><?php echo date("d-m-y",strtotime($res['DOB'])); ?></td><?php */?>
<td class="tdf2" align="center"><?php echo $res['FaStatus']; ?></td>
	 <td class="tdf2" align="right"><?php echo floatval($res['Salary']+$res['Expences']); ?>&nbsp;</td>
	 
	 <td class="tdf2" align="center"><?php echo $Month; ?></td>
	 <td class="tdf2" align="center"><?php echo $_REQUEST['y']; ?></td>
<?php $sal=mysql_query("select * from fa_salary where FaId=".$res['FaId']." AND Month=".$m." AND Year=".$y,$con); 
$rowS=mysql_num_rows($sal); $resS=mysql_fetch_assoc($sal);
      $totD=$resS['TotP']+$resS['TotA'];
      $PaidDays=$day-$resS['TotA'];
 ?>	
	 
<?php /*?>	 <td class="tdf2" align="center"><?php if($day>0){echo floatval($day);} ?></td>
	 <td class="tdf2" align="center"><?php if($resS['TotA']>0){echo floatval($resS['TotA']);} ?></td><?php */?>
	 <td class="tdf2" align="center"><?php if($PaidDays>0){echo floatval($PaidDays);} ?></td>
	 
<?php $sal=mysql_query("select * from fa_salary where FaId=".$res['FaId']." AND Month=".$_REQUEST['m']." AND Year=".$_REQUEST['y'],$con); $rowS=mysql_num_rows($sal); $resS=mysql_fetch_assoc($sal); ?>	 
<td class="tdf2" align="right"><?php if($resS['ActualSal']>0 OR $resS['ActualExp']>0){echo floatval($resS['ActualSal']+$resS['ActualExp']);} ?>&nbsp;</td>
	 
	 <td class="tdf2" align="center"><?php if($rowS>0){ if($resS['Status']==2 AND $resS['Slip']!=''){?><span style="cursor:pointer;color:#0061C1;" onClick="OpenSlip(<?php echo $resS['SalId'];?>)"><u>click</u></span><?php } elseif($resS['Status']==0 OR $resS['Status']=1){echo ''; } }else{echo '';}?></td>
	 
	 <td class="tdf2" align="center"><?php if($rowS>0){ if($resS['Status']==0){echo 'Draft';}elseif($resS['Status']==1){echo 'Pending';}elseif($resS['Status']==2){echo 'Paid';}elseif($resS['Status']==3){echo 'Reject'; }  }else{echo '';} ?></td>
	 
	 <?php /*?><td class="tdf2"><input class="InputType" style="width:150px;" id="crp<?php echo $sn; ?>" value="<?php $crp=mysql_query("select ItemName from fa_details_crop rc inner join hrm_sales_seedsitem si on rc.ItemId=si.ItemId where FaId=".$res['FaId']." order by ItemName ASC",$con); while($rcrp=mysql_fetch_assoc($crp)){ echo ucfirst(strtolower($rcrp['ItemName'])).', '; } ?>" readonly/></td>
	 <td class="tdf2"><input class="InputType" style="width:150px;" id="dealer<?php echo $sn; ?>" value="<?php $dis=mysql_query("select DealerName from fa_details_dealer rd inner join hrm_sales_dealer sd on rd.DealerId=sd.DealerId where FaId=".$res['FaId']." order by DealerName ASC",$con); while($rdis=mysql_fetch_assoc($dis)){ echo ucfirst(strtolower($rdis['DealerName'])).', '; } ?>" readonly/></td>

	 <td class="tdf2"><input class="InputType" style="width:150px;" id="saldealer<?php echo $sn; ?>" value="<?php $dis2=mysql_query("select DealerName from hrm_sales_dealer where DealerId=".$res['Sal_DealerId'],$con); $rdis2=mysql_fetch_assoc($dis2); echo ucfirst(strtolower($rdis2['DealerName'])); ?>" readonly/></td>
	 <td class="tdf2" align="center"><?php echo $res['SalaryMode']; ?></td>
	 <td class="tdf2"><input class="InputType" style="width:150px;" id="email<?php echo $sn; ?>" value="<?php echo $res['EmailId']; ?>" readonly/></td><?php */?>
	 <td class="tdf2" align="center"><?php echo $res['JobStatus']; ?></td>
	 <td class="tdf2"><input class="InputType" style="width:150px;" id="rep<?php echo $sn; ?>" value="<?php $e=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$res['Reporting'],$con); $re=mysql_fetch_assoc($e); echo ucfirst(strtolower($re['Fname'].' '.$re['Sname'].' '.$re['Lname'])); ?>" readonly/></td>
	 
<?php /*?><?php $sqlL=mysql_query("select R1,R2 from hrm_sales_reporting_level where EmployeeID=".$res['Reporting'],$con); 
      $resL=mysql_fetch_assoc($sqlL); ?>	 
	 <td class="tdf2"><input class="InputType" style="width:100px;" id="rep2<?php echo $sn; ?>" value="<?php if($resL['R1']>0){ $e1=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$resL['R1'],$con); $r1=mysql_fetch_assoc($e1); echo ucfirst(strtolower($r1['Fname'].' '.$r1['Sname'].' '.$r1['Lname'])); } ?>" readonly/></td>
	 <td class="tdf2"><input class="InputType" style="width:100px;" id="rep3<?php echo $sn; ?>" value="<?php if($resL['R2']>0){ $e2=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$resL['R2'],$con); $r2=mysql_fetch_assoc($e2); echo ucfirst(strtolower($r2['Fname'].' '.$r2['Sname'].' '.$r2['Lname'])); } ?>" readonly/></td><?php */?>
	 <td class="tdf2" align="center"><?php echo $res['ContactNo']; ?></td>  
	</tr> 
<?php $sn++; $no++; } ?>
   <tr>
    <td colspan="2"></td>
    <td colspan="11" style="font-family:Times New Roman;font-size:15px;font-weight:bold;">
     <?php doPages($offset, 'f_rsalary.php', '', $total_records,$_REQUEST['hq'],$_REQUEST['s'],$_REQUEST['m'],$_REQUEST['y'],$_REQUEST['md'],$_REQUEST['rbm'],$_REQUEST['abm']); ?>
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