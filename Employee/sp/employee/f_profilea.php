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
.SaveButton {background-image:url(images/save.png);width:18px;height:18px;background-repeat:no-repeat;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script language="javascript">
function FunRef(m,y,s,hq){ window.location="f_profilea.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq; }
function funstate(s,m,y)
{ window.location="f_profilea.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq=0&dis=0"; }
function funhq(hq,m,y,s)
{ window.location="f_profilea.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0"; }

function FucChk(sn)
{ if(document.getElementById("Chk"+sn).checked==true){document.getElementById("TR"+sn).style.background='#9BEF47'; document.getElementById("name"+sn).style.background='#9BEF47'; document.getElementById("mode"+sn).style.background='#9BEF47'; document.getElementById("hq"+sn).style.background='#9BEF47'; document.getElementById("state"+sn).style.background='#9BEF47'; document.getElementById("country"+sn).style.background='#9BEF47'; document.getElementById("crp"+sn).style.background='#9BEF47'; document.getElementById("dealer"+sn).style.background='#9BEF47'; document.getElementById("saldealer"+sn).style.background='#9BEF47'; document.getElementById("email"+sn).style.background='#9BEF47';document.getElementById("rep"+sn).style.background='#9BEF47'; document.getElementById("bg"+sn).style.background='#9BEF47'; document.getElementById("quali"+sn).style.background='#9BEF47'; document.getElementById("loc"+sn).style.background='#9BEF47'; document.getElementById("add1"+sn).style.background='#9BEF47'; document.getElementById("add2"+sn).style.background='#9BEF47'; document.getElementById("bank"+sn).style.background='#9BEF47'; document.getElementById("acc"+sn).style.background='#9BEF47'; 
 }
  else if(document.getElementById("Chk"+sn).checked==false){document.getElementById("TR"+sn).style.background='#FFFFFF'; document.getElementById("name"+sn).style.background='#FFFFFF'; document.getElementById("mode"+sn).style.background='#FFFFFF'; document.getElementById("hq"+sn).style.background='#FFFFFF'; document.getElementById("state"+sn).style.background='#FFFFFF'; document.getElementById("country"+sn).style.background='#FFFFFF'; document.getElementById("crp"+sn).style.background='#FFFFFF'; document.getElementById("dealer"+sn).style.background='#FFFFFF'; document.getElementById("saldealer"+sn).style.background='#FFFFFF'; document.getElementById("email"+sn).style.background='#FFFFFF'; document.getElementById("rep"+sn).style.background='#FFFFFF'; document.getElementById("bg"+sn).style.background='#FFFFFF'; document.getElementById("quali"+sn).style.background='#FFFFFF'; document.getElementById("loc"+sn).style.background='#FFFFFF'; document.getElementById("add1"+sn).style.background='#FFFFFF'; document.getElementById("add2"+sn).style.background='#FFFFFF'; document.getElementById("bank"+sn).style.background='#FFFFFF'; document.getElementById("acc"+sn).style.background='#FFFFFF'; }
}


function fundocDetail(v,fid)
{ var win = window.open("f_docdetails.php?fid="+fid+"&v="+v,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=750,height=600");}

function funExport(s,hq,m,y)
{ var win = window.open("f_faexports.php?hq="+hq+"&s="+s+"&m="+m+"&y="+y,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=50,height=50"); }
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
	  <table style="width:1500px;" border="0">
   <tr>
	<td>
	 <table>
		<tr>
	    <td colspan="2" class="htf2" style="width:180px;" align="left"><u>FA Profile</u></td>
	    <td style="font-family:Georgia;color:#FF80FF;font-weight:bold;font-size:12px; width:80px;"><span style="cursor:pointer;color:#FFFF6A;" onClick="FunRef(<?php echo $m.','.$y.','.$_REQUEST['s'].','.$_REQUEST['hq']; ?>)"><u>refresh</u></span></td>
	    <td class="tdf" align="center">&nbsp;</td>
	    <td class="tdf">&nbsp;State</td>
	    <td class="tdf" align="center">:</td>
		<td><select style="width:150px;" class="InputSel" id="state" name="state" onChange="funstate(this.value,<?php echo $m.','.$y; ?>)">
<?php if($_REQUEST['s']>0){ $ss=mysql_query("select StateName from hrm_state where StateId=".$_REQUEST['s'],$con); $rs=mysql_fetch_assoc($ss); ?><option value='<?php echo $_REQUEST['s'];?>' selected><?php echo ucfirst(strtolower($rs['StateName']));?></option><?php }else{?><option value="0">Select</option><?php } if($_REQUEST['s']=='All'){ ?><option value="All" selected>All</option><?php } ?><?php $sqls=mysql_query("select StateId,StateName from hrm_state group by StateName order by StateName ASC",$con); while($ress=mysql_fetch_assoc($sqls)){ ?><option value="<?php echo $ress['StateId']; ?>"><?php echo ucfirst(strtolower($ress['StateName'])); ?></option><?php } ?><option value="All">All</option></select></td>
	 <td class="tdf">&nbsp;HeadQuarter</td>
	 <td class="tdf" style="width:10px;" align="center">:</td>
	 <td style="width:150px;"><select style="width:150px;" class="InputSel" id="hq" name="hq" onChange="funhq(this.value,<?php echo $m.','.$y.','.$_REQUEST['s']; ?>)"><?php if($_REQUEST['hq']>0){ $shq=mysql_query("select HqName from hrm_headquater where HqId=".$_REQUEST['hq'],$con); $rhq=mysql_fetch_assoc($shq); ?><option value='<?php echo $_REQUEST['hq'];?>' selected><?php echo ucfirst(strtolower($rhq['HqName']));?></option><?php }else{?><option value="0">select</option><?php } if($_REQUEST['s']>0){ $sqlhq=mysql_query("select * from hrm_headquater where StateId=".$_REQUEST['s']." group by HqName order by HqName asc",$con); while($reshq=mysql_fetch_assoc($sqlhq)){ ?><option value="<?php echo $reshq['HqId']; ?>"><?php echo ucfirst(strtolower($reshq['HqName'])); ?></option><?php } } else { ?><option value="0">Select</option><?php $sqlhq2=mysql_query("select * from hrm_headquater group by HqName order by HqName asc",$con); while($reshq2=mysql_fetch_assoc($sqlhq2)){ ?><option value="<?php echo $reshq2['HqId']; ?>"><?php echo ucfirst(strtolower($reshq2['HqName'])); ?></option><?php } } ?></select></td>
	  <td class="tdf2" style="width:100px;" align="center"><?php if($_REQUEST['hq']>0 OR $_REQUEST['s']>0 OR $_REQUEST['s']=='All'){ ?><span style="cursor:pointer;color:#FFFFFF;" onClick="funExport('<?php echo $_REQUEST['s']; ?>',<?php echo $_REQUEST['hq'].','.$_REQUEST['m'].','.$_REQUEST['y']; ?>)"><u>Export</u></span><?php } ?></td>
	   </tr>
	  </table>
	 </td>
	</tr>
<?php if($_REQUEST['hq']>0 OR $_REQUEST['s']>0 OR $_REQUEST['s']=='All'){ ?>	
	<tr>
	 <td>
	  <table>
	   <tr style="height:22px;">
	  <td class="htf">&nbsp;</td>
      <td style="width:30px;" class="htf">&nbsp;Sn&nbsp;</td>
      <td style="width:150px;" class="htf">Name</td>
	  <td style="width:150px;" class="htf">Mode</td>
	  <td style="width:80px;" class="htf">HQ</td>
	  <td style="width:80px;" class="htf">State</td>
	  <td style="width:80px;" class="htf">Country</td>
	  <td style="width:80px;" class="htf">DOJ</td>
	  <td style="width:80px;" class="htf">DOB</td>
	  <td style="width:50px;" class="htf">Staus</td>
	  <td style="width:60px;" class="htf">Expense</td>
	  <td style="width:150px;" class="htf">Crop</td>
	  <td style="width:150px;" class="htf">Distributor</td>
	  <td style="width:150px;" class="htf">Expen. Dis.</td>
	  <td style="width:80px;" class="htf">Expen. Mode</td>
	  <td style="width:150px;" class="htf">Email-ID</td>
	  <td style="width:80px;" class="htf">Job Status</td>
	  <td style="width:150px;" class="htf">Reporting</td>
	  <td style="width:150px;" class="htf">Rep:Level-2</td>
	  <td style="width:150px;" class="htf">Rep:Level-3</td>
	  <td style="width:80px;" class="htf">Cont-1</td>
	  <td style="width:80px;" class="htf">Cont-2</td>
	  <td style="width:50px;" class="htf">Gender</td>
	  <td style="width:50px;" class="htf">Married</td>
	  <td style="width:50px;" class="htf">BG</td>
	  <td style="width:120px;" class="htf">Quali</td>
	  <td style="width:100px;" class="htf">Location</td>
	  <td style="width:150px;" class="htf">Add-1</td>
	  <td style="width:150px;" class="htf">Add-2</td>
	  <td style="width:150px;" class="htf">Bank/Branch</td>
	  <td style="width:100px;" class="htf">A/c No</td>
	  <td style="width:80px;" class="htf">Aadhar</td>
	  <td style="width:80px;" class="htf">DL</td>
	  <td style="width:80px;" class="htf">PAN</td>
	  <td style="width:80px;" class="htf">VoterId</td>
	  
	  <td style="width:50px;" class="htf">Photo</td>
	  <td style="width:50px;" class="htf">Resume</td>
	  <td style="width:50px;" class="htf">Any1</td>
	  <td style="width:50px;" class="htf">Any2</td>
	  
	</tr>
	
<?php if($_REQUEST['s']=='All'){ $result=mysql_query("select * from fa_details where (FaStatus='A' OR FaStatus='D') order by FaId ASC",$con); }elseif($_REQUEST['hq']>0){ $result=mysql_query("select * from fa_details where HqId=".$_REQUEST['hq']." AND (FaStatus='A' OR FaStatus='D') order by FaId ASC",$con); }elseif($_REQUEST['s']>0){ $result=mysql_query("select * from fa_details f inner join hrm_headquater hq on f.HqId=hq.HqId where hq.StateId=".$_REQUEST['s']." AND (FaStatus='A' OR FaStatus='D') order by FaId ASC",$con);}

$total_records=mysql_num_rows($result);
if(isset($_GET['page'])){$page=$_GET['page']; $no=(14*($_GET['page']-1))+$_GET['page'];}else{$page = 1; $no=1;} 
$offset = 15; if ($page){ $from = ($page * $offset) - $offset; }else{ $from = 0; }

if($_REQUEST['s']=='All'){ $sql=mysql_query("select * from fa_details where (FaStatus='A' OR FaStatus='D') order by FaId ASC LIMIT ".$from.",".$offset,$con); }elseif($_REQUEST['hq']>0){ $sql=mysql_query("select * from fa_details where HqId=".$_REQUEST['hq']." AND (FaStatus='A' OR FaStatus='D') order by FaId ASC LIMIT ".$from.",".$offset,$con); }elseif($_REQUEST['s']>0){ $sql=mysql_query("select * from fa_details f inner join hrm_headquater hq on f.HqId=hq.HqId where hq.StateId=".$_REQUEST['s']." AND (FaStatus='A' OR FaStatus='D') order by FaId ASC LIMIT ".$from.",".$offset,$con);}

      $sn=1; while($res=mysql_fetch_array($sql)){ $hq=mysql_query("select CountryName,StateName,HqName,s.CountryId,h.StateId from hrm_headquater h inner join hrm_state s on h.StateId=s.StateId inner join hrm_country c on s.CountryId=c.CountryId where h.HqId=".$res['HqId'], $con);
	  $rhq=mysql_fetch_assoc($hq); ?>
<tr style="height:22px;" bgcolor="#FFFFFF" id="TR<?php echo $sn; ?>">
<td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo $sn; ?>" onClick="FucChk(<?php echo $sn; ?>)" /></td>
<td class="tdf2" align="center"><?php echo $sn; ?></td>

<td class="tdf2"><input class="InputType" style="width:150px;" id="name<?php echo $sn; ?>" value="<?php echo $res['FaName']; ?>" readonly/></td>
<td class="tdf2"><input class="InputType" style="width:150px;" id="mode<?php echo $sn; ?>" value="<?php if($res['Mode']==1){echo 'Direct(Sales Executive)';}elseif($res['Mode']==2){echo 'Teamlease';}elseif($res['Mode']==3){echo 'Distributor';}?>" readonly/></td>
<td class="tdf2"><input class="InputType" style="width:80px;" id="hq<?php echo $sn; ?>" value="<?php echo ucfirst(strtolower($rhq['HqName'])); ?>" readonly/></td>
<td class="tdf2"><input class="InputType" style="width:80px;" id="state<?php echo $sn; ?>" value="<?php echo ucfirst(strtolower($rhq['StateName'])); ?>" readonly/></td>
<td class="tdf2"><input class="InputType" style="width:80px;" id="country<?php echo $sn; ?>" value="<?php echo ucfirst(strtolower($rhq['CountryName'])); ?>" readonly/></td>
<td class="tdf2" align="center"><?php echo date("d-m-y",strtotime($res['DOJ'])); ?></td>
<td class="tdf2" align="center"><?php echo date("d-m-y",strtotime($res['DOB'])); ?></td>
<td class="tdf2" align="center"><?php echo $res['FaStatus']; ?></td>
	 <td class="tdf2" align="right"><?php echo floatval($res['Salary']+$res['Expences']); ?>&nbsp;</td>
	 <td class="tdf2"><input class="InputType" style="width:150px;" id="crp<?php echo $sn; ?>" value="<?php $crp=mysql_query("select ItemName from fa_details_crop rc inner join hrm_sales_seedsitem si on rc.ItemId=si.ItemId where FaId=".$res['FaId']." order by ItemName ASC",$con); while($rcrp=mysql_fetch_assoc($crp)){ echo ucfirst(strtolower($rcrp['ItemName'])).', '; } ?>" readonly/></td>
	 <td class="tdf2"><input class="InputType" style="width:150px;" id="dealer<?php echo $sn; ?>" value="<?php $dis=mysql_query("select DealerName from fa_details_dealer rd inner join hrm_sales_dealer sd on rd.DealerId=sd.DealerId where FaId=".$res['FaId']." order by DealerName ASC",$con); while($rdis=mysql_fetch_assoc($dis)){ echo ucfirst(strtolower($rdis['DealerName'])).', '; } ?>" readonly/></td>
	 <td class="tdf2"><input class="InputType" style="width:150px;" id="saldealer<?php echo $sn; ?>" value="<?php $dis2=mysql_query("select DealerName from hrm_sales_dealer where DealerId=".$res['Sal_DealerId'],$con); $rdis2=mysql_fetch_assoc($dis2); echo ucfirst(strtolower($rdis2['DealerName'])); ?>" readonly/></td>
	 <td class="tdf2" align="center"><?php echo $res['SalaryMode']; ?></td>
	 <td class="tdf2"><input class="InputType" style="width:150px;" id="email<?php echo $sn; ?>" value="<?php echo $res['EmailId']; ?>" readonly/></td>
	 <td class="tdf2" align="center"><?php echo $res['JobStatus']; ?></td>
	 <td class="tdf2"><input class="InputType" style="width:150px;" id="rep<?php echo $sn; ?>" value="<?php $e=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$res['Reporting'],$con); $re=mysql_fetch_assoc($e); echo ucfirst(strtolower($re['Fname'].' '.$re['Sname'].' '.$re['Lname'])); ?>" readonly/></td>
	 
<?php $sqlL=mysql_query("select R1,R2 from hrm_sales_reporting_level where EmployeeID=".$res['Reporting'],$con); 
      $resL=mysql_fetch_assoc($sqlL); ?>	 
	 <td class="tdf2"><input class="InputType" style="width:150px;" id="rep<?php echo $sn; ?>" value="<?php if($resL['R1']>0){ $e1=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$resL['R1'],$con); $r1=mysql_fetch_assoc($e1); echo ucfirst(strtolower($r1['Fname'].' '.$r1['Sname'].' '.$r1['Lname'])); } ?>" readonly/></td>
	 <td class="tdf2"><input class="InputType" style="width:150px;" id="rep<?php echo $sn; ?>" value="<?php if($resL['R2']>0){ $e2=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$resL['R2'],$con); $r2=mysql_fetch_assoc($e2); echo ucfirst(strtolower($r2['Fname'].' '.$r2['Sname'].' '.$r2['Lname'])); } ?>" readonly/></td>
	 
	 
	 <td class="tdf2" align="center"><?php echo $res['ContactNo']; ?></td>
	 <td class="tdf2" align="center"><?php echo $res['Contact2No']; ?></td>
	 <td class="tdf2" align="center"><?php echo $res['Gender']; ?></td>
	 <td class="tdf2" align="center"><?php echo $res['Married']; ?></td>
	 <td class="tdf2" align="center"><input class="InputType" style="width:50px;" id="bg<?php echo $sn; ?>" value="<?php echo $res['BloodGroup']; ?>" readonly/></td>
	 <td class="tdf2"><input class="InputType" style="width:120px;" id="quali<?php echo $sn; ?>" value="<?php echo $res['Qualif']; ?>" readonly/></td>
	 
	 <td class="tdf2"><input class="InputType" style="width:100px;" id="loc<?php echo $sn; ?>" value="<?php echo $res['Location']; ?>" readonly/></td>
	 <td class="tdf2"><input class="InputType" style="width:150px;" id="add1<?php echo $sn; ?>" value="<?php echo $res['Address1']; ?>" readonly/></td>
	 <td class="tdf2"><input class="InputType" style="width:150px;" id="add2<?php echo $sn; ?>" value="<?php echo $res['Address2']; ?>" readonly/></td>
	 <td class="tdf2"><input class="InputType" style="width:150px;" id="bank<?php echo $sn; ?>" value="<?php echo $res['BankName']; ?>" readonly/></td>
	 <td class="tdf2"><input class="InputType" style="width:100px;" id="acc<?php echo $sn; ?>" value="<?php echo $res['AccountNo']; ?>" readonly/></td> 
 
	 <td class="tdf2" align="center"><?php if($res['Upld_aadhar']!=''){?><span style="cursor:pointer;color:#0079F2;" onClick="fundocDetail(<?php echo '1,'.$res['FaId']; ?>)"><u><?php echo $res['AadharNo']; ?></u></span><?php }else{ echo $res['AadharNo']; } ?></td>
	 <td class="tdf2" align="center"><?php if($res['Upld_dl']!=''){?><span style="cursor:pointer;color:#0079F2;" onClick="fundocDetail(<?php echo '2,'.$res['FaId']; ?>)"><u><?php echo $res['DrivLic']; ?></u></span><?php }else{ echo $res['DrivLic']; } ?></td>
	 <td class="tdf2" align="center"><?php if($res['Upld_pan']!=''){?><span style="cursor:pointer;color:#0079F2;" onClick="fundocDetail(<?php echo '3,'.$res['FaId']; ?>)"><u><?php echo $res['PanNo']; ?></u></span><?php }else{ echo $res['PanNo']; } ?></td>
	 <td class="tdf2" align="center"><?php if($res['Upld_voterId']!=''){?><span style="cursor:pointer;color:#0079F2;" onClick="fundocDetail(<?php echo '4,'.$res['FaId']; ?>)"><u><?php echo $res['VoterId']; ?></u></span><?php }else{ echo $res['VoterId']; } ?></td>
	 
	 <td class="tdf2" align="center"><?php if($res['Upld_pic']!=''){?><span style="cursor:pointer;color:#0079F2;" onClick="fundocDetail(<?php echo '5,'.$res['FaId']; ?>)"><u>click</u></span><?php } ?></td>
	 <td class="tdf2" align="center"><?php if($res['Upld_resume']!=''){?><span style="cursor:pointer;color:#0079F2;" onClick="fundocDetail(<?php echo '6,'.$res['FaId']; ?>)"><u>click</u></span><?php } ?></td>
	 <td class="tdf2" align="center"><?php if($res['Upld_other1']!=''){?><span style="cursor:pointer;color:#0079F2;" onClick="fundocDetail(<?php echo '7,'.$res['FaId']; ?>)"><u>click</u></span><?php } ?></td>
	 <td class="tdf2" align="center"><?php if($res['Upld_other2']!=''){?><span style="cursor:pointer;color:#0079F2;" onClick="fundocDetail(<?php echo '8,'.$res['FaId']; ?>)"><u>click</u></span><?php } ?></td>
	 
	</tr> 
<?php $sn++; } ?>
   <tr>
    <td colspan="2"></td>
    <td colspan="11" style="font-family:Times New Roman;font-size:15px;font-weight:bold;">
     <?php doPages($offset, 'f_profilea.php', '', $total_records,$_REQUEST['hq'],$_REQUEST['s'],$_REQUEST['m'],$_REQUEST['y']); ?>
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
function doPages($page_size, $thepage, $query_string, $total=0,$hq,$s,$m,$y){ $index_limit = 5; $query=''; if(strlen($query_string)>0){ $query = "&amp;".$query_string; }
$current = get_current_page(); $total_pages=ceil($total/$page_size); $start=max($current-intval($index_limit/2), 1); $end=$start+$index_limit-1;
echo '<div class="paging">';
if($current==1){ echo '<span class="prn">&lt; Previous</span>&nbsp;';}else{ $i = $current-1; echo '<a href="'.$thepage.'?page='.$i.$query.'&hq='.$hq.'&s='.$s.'&m='.$m.'&y='.$y.'&er=1013&rr=wew101" class="prn" rel="nofollow" title="go to page '.$i.'" style="color:#A6D2FF;text-decoration:none;">&lt; Previous</a>&nbsp;'; echo '<span class="prn">...</span>&nbsp;';}
if($start > 1){ $i = 1; echo '<a href="'.$thepage.'?page='.$i.$query.'&hq='.$hq.'&s='.$s.'&m='.$m.'&y='.$y.'&ee=we23&er=1013&rr=wew101" title="go to page '.$i.'" style="color:#A6D2FF;">'.$i.'</a>&nbsp;'; }
for($i = $start; $i <= $end && $i <= $total_pages; $i++)
{ if($i==$current){ echo '<span>'.$i.'</span>&nbsp;';} else { echo '<a href="'.$thepage.'?page='.$i.$query.'&hq='.$hq.'&s='.$s.'&m='.$m.'&y='.$y.'&ee=we23&er=1013&rr=wew101" title="go to page '.$i.'" style="color:#A6D2FF;">'.$i.'</a>&nbsp;'; } }
if($total_pages > $end){ $i = $total_pages; echo '<a href="'.$thepage.'?page='.$i.$query.'&hq='.$hq.'&s='.$s.'&m='.$m.'&y='.$y.'&ee=we23&er=1013&rr=wew101" title="go to page '.$i.'" style="color:#A6D2FF;">'.$i.'</a>&nbsp;'; } if($current < $total_pages) { $i = $current+1; echo '<span class="prn">...</span>&nbsp;'; echo '<a href="'.$thepage.'?page='.$i.$query.'&hq='.$hq.'&s='.$s.'&m='.$m.'&y='.$y.'&ee=we23&er=1013&rr=wew101" class="prn" rel="nofollow" title="go to page '.$i.'" style="color:#A6D2FF;text-decoration:none;" style="color:#A6D2FF;">Next &gt;</a>&nbsp;'; } else { echo '<span class="prn">Next &gt;</span>&nbsp;'; } if ($total != 0){ echo '&nbsp;&nbsp;&nbsp;&nbsp;<font color="#A6D2FF"<h4>[Total '.$total.' Records]</h></div>'; }
}
?>