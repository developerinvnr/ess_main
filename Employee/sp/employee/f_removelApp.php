<?php session_start();
if($_SESSION['login'] = true){require_once('../user/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../../../index.php');}
$EmployeeId=$_SESSION['EmployeeID'];
$m=$_REQUEST['m']; $y=$_REQUEST['y']; $hq=$_REQUEST['hq']; $s=$_REQUEST['s']; $md=$_REQUEST['md'];
$rsts=$_REQUEST['rsts'];

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
.CalenderButton {background-image:url(images/CalenderBtn.jpeg);width:16px;height:16px;background-color:#E0DBE3;border-color:#FFFFFF;}
</style>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/><?php /* Calander Open */?>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script><?php /* Calander Close */?>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script language="javascript">
function FunRef(m,y,s,hq,md,rsts){ window.location="f_removelApp.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&md="+md+"&rsts="+rsts; }

function funmd(md,m,y,hq,s,rsts)
{ window.location="f_removelApp.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&md="+md+"&rsts="+rsts; }

function funrsts(rsts,m,y,hq,s,md)
{ window.location="f_removelApp.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&md="+md+"&rsts="+rsts; }


function funsts(rsts,m,y,hq,s,md)
{ window.location="f_removelApp.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&md="+md+"&rsts="+rsts; }


function FucApp(v,sn,fid,m,y,eid)
{ var agree=confirm("Are you sure?");
  if(agree)
  { 
    var url = 'f_claimAppAct.php'; var pars = 'Act=AppRemoval&v='+v+'&sn='+sn+'&fid='+fid+'&m='+m+'&y='+y+'&eid='+eid;	var myAjax = new Ajax.Request(
    url, { method: 'post', parameters: pars, onComplete: show_rst });
  }
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
  elseif($m==2){ if($Y==2012 OR $Y==2016 OR $Y==2020 OR $Y==2024 OR $Y==2028 OR $Y==2032 OR $Y==2036 OR $Y==2040 OR $Y==2044 OR $Y==2048 OR $Y==2052 OR $Y==2056 OR $Y==2060){$day=29;}else{$day=28;} } ?>
<input type="hidden" id="month" name="month" value="<?php echo $m; ?>" />
<input type="hidden" id="year" name="year" value="<?php echo $y; ?>" />
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
	    <td class="htf2" align="left"><u>FA Removel Request</u>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	    <td style="font-family:Georgia;color:#FF80FF;font-weight:bold;font-size:12px; width:60px;"><span style="cursor:pointer;color:#FFFF6A;" onClick="FunRef(<?php echo $m.','.$y.','.$_REQUEST['s'].','.$_REQUEST['hq'].','.$md.','.$rsts; ?>)"><u>refresh</u></span></td>
		
	    <td class="tdf" align="center">&nbsp;</td>
		<input type="hidden" value="0" id="state" name="state"/>
		<input type="hidden" value="0" id="hq" name="hq"/>
 
	 <td class="tdf">&nbsp;Mode</td>
	 <td style="width:120px;"><select style="width:120px;" class="InputSel" id="mode" name="mode" onChange="funmd(this.value,<?php echo $m.','.$y.','.$_REQUEST['hq'].','.$_REQUEST['s']; ?>,'<?php echo $rsts; ?>')"><?php if($_REQUEST['md']>0){ ?><option value='<?php echo $_REQUEST['md'];?>' selected><?php if($_REQUEST['md']==1){$mode='Direct(Sales Executive)';}elseif($_REQUEST['md']==2){$mode='Teamlease';}elseif($_REQUEST['md']==3){$mode='Distributor';}elseif($_REQUEST['md']==4){$mode='All';} echo ucfirst(strtolower($mode));?></option><?php } else { ?><option value="0" selected>select</option><?php } ?>
	 <option value="1">Direct(Sales Executive)</option><option value="2">Teamlease</option>
	 <option value="3">Distributor</option><option value="4">All</option></select></td>
	 
	 <td class="tdf">&nbsp;Status</td>
	 <td style="width:120px;"><select style="width:120px;" class="InputSel" id="rsts" name="rsts" onChange="funsts(this.value,<?php echo $m.','.$y.','.$_REQUEST['hq'].','.$_REQUEST['s'].','.$md; ?>)" >
	 <option value="0" <?php if($_REQUEST['rsts']==0){echo 'selected'; }?>>Draft</option>
	 <option value="1" <?php if($_REQUEST['rsts']==1){echo 'selected'; }?>>Pending</option>
	 <option value="2" <?php if($_REQUEST['rsts']==2){echo 'selected'; }?>>Approved</option>
	 <option value="3" <?php if($_REQUEST['rsts']==3){echo 'selected'; }?>>Rejected</option>
	 <option value="4" <?php if($_REQUEST['rsts']==4){echo 'selected'; }?>>All</option>
	 </select></td>
	 
	   </tr>
	  </table>
	 </td>
	</tr>
<?php if($_REQUEST['md']>0 OR $_REQUEST['rsts']>0){ ?>	
	<tr>
	 <td>
	  <table>
	  <tr style="height:22px;">
      <td colspan="6" class="htf">&nbsp;General Details&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td colspan="3" class="htf">Removel Request</td>
	  <td rowspan="2" style="width:100px;" class="htf">Action</td>
	  </tr>
	  <tr style="height:22px;">
      <td style="width:30px;" class="htf">&nbsp;Sn&nbsp;</td>
      <td style="width:150px;" class="htf">Name</td>
	  <td style="width:100px;" class="htf">Mode</td>
	  <td style="width:100px;" class="htf">HQ</td>
	  <td style="width:60px;" class="htf">Expense</td>
	  <td style="width:200px;" class="htf">Reporting</td>
	  <td style="width:100px;" class="htf">Last Working Date</td>
	  <td style="width:200px;" class="htf">Reason/Remark</td>
	  <td style="width:80px;" class="htf">Date</td>
	  
	  </tr>
	
<?php 

if($_REQUEST['md']==4){ $sqry="1=1"; }else{ $sqry="Mode=".$_REQUEST['md']; }
if($_REQUEST['rsts']==4){ $sqrs="1=1"; }else{ $sqrs="Remove_Reporting_AppSts=".$_REQUEST['rsts']; }
 
$result=mysql_query("select * from fa_details where Remove_Reporting=".$EmployeeId." AND ".$sqrs."  AND ".$sqry." AND (FaStatus='A' OR (FaStatus='D' AND RemoveSts=3)) AND RemoveSts>=1 order by FaId ASC",$con); 

$total_records=mysql_num_rows($result);
if(isset($_GET['page'])){$page=$_GET['page']; $no=(14*($_GET['page']-1))+$_GET['page'];}else{$page = 1; $no=1;} 
$offset = 15; if ($page){ $from = ($page * $offset) - $offset; }else{ $from = 0; }
echo '<input type="hidden" id="pg" value='.$page.'/>';

$sql=mysql_query("select * from fa_details where Remove_Reporting=".$EmployeeId." AND ".$sqrs."  AND ".$sqry." AND (FaStatus='A' OR (FaStatus='D' AND RemoveSts=3)) AND RemoveSts>=1 order by FaId ASC LIMIT ".$from.",".$offset,$con);

$sn=1; while($res=mysql_fetch_array($sql)){ $shq=mysql_query("select CountryName,StateName,HqName,s.CountryId,h.StateId from hrm_headquater h inner join hrm_state s on h.StateId=s.StateId inner join hrm_country c on s.CountryId=c.CountryId where h.HqId=".$res['HqId'], $con); $rhq=mysql_fetch_assoc($shq); ?>	 

<tr style="height:22px;" bgcolor="#FFFFFF" id="TR<?php echo $sn; ?>">
 <td class="tdf2" align="center"><?php echo $sn; ?></td>
 <td class="tdf2"><input class="InputType" style="width:150px;" id="name<?php echo $sn; ?>" value="<?php echo $res['FaName']; ?>" readonly/></td>
<td class="tdf2"><input class="InputType" style="width:100px;" id="mode<?php echo $sn; ?>" value="<?php if($res['Mode']==1){echo 'Direct(Sales Executive)';}elseif($res['Mode']==2){echo 'Teamlease';}elseif($res['Mode']==3){echo 'Distributor';}?>" readonly/></td>
<td class="tdf2"><input class="InputType" style="width:100px;" id="Hq<?php echo $sn; ?>" value="<?php echo ucfirst(strtolower($rhq['HqName'])); ?>" readonly/></td>

	 <td class="tdf2" align="right"><?php echo floatval($res['Salary']+$res['Expences']); ?>&nbsp;</td>
	 <td class="tdf2"><input class="InputType" style="width:200px;" id="rep<?php echo $sn; ?>" value="<?php $e=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$res['Reporting'],$con); $re=mysql_fetch_assoc($e); echo ucfirst(strtolower($re['Fname'].' '.$re['Sname'].' '.$re['Lname'])); ?>" readonly/></td>	 	
	 
	 <td class="tdf2"><input class="InputType" style="width:80px; text-align:center;" id="LWD<?php echo $sn; ?>" value="<?php if($res['LWD']!='0000-00-00' AND $res['LWD']!='1970-01-01'){echo date("d-m-Y",strtotime($res['LWD'])); } ?>" readonly/></td>
	 <td class="tdf2"><input class="InputType" style="width:99%;" id="Rmk<?php echo $sn; ?>" value="<?php echo $res['RemoveRmk']; ?>"/></td>
	 <td class="tdf2" align="center"><?php if($res['RemoveSts']>0){ echo date("d-m-Y",strtotime($res['RemoveReqDate'])); } ?></td>
	 
	 <td class="tdf2" align="center">
	  <select class="InputType" id="SelSts<?=$sn?>" style="width:99%;" <?php if($res['Remove_Reporting_AppSts']==2 OR $res['Remove_Reporting_AppSts']==3){echo 'disabled';} ?> onChange="FucApp(this.value,<?php echo $sn.','.$res['FaId'].', '.$_REQUEST['m'].','.$_REQUEST['y'].','.$EmployeeId;?>)" <?php if($res['Remove_Reporting_AppSts']==2 OR $res['Remove_Reporting_AppSts']==3){echo 'disabled';}?>>
	   <option value="0" <?php if($res['Remove_Reporting_AppSts']==0){echo 'selected';}?>>Darft</option>
	   <option value="1" <?php if($res['Remove_Reporting_AppSts']==1){echo 'selected';}?>>Pending</option>
	   <option value="2" <?php if($res['Remove_Reporting_AppSts']==2){echo 'selected';}?>>Approve</option>
	   <option value="3" <?php if($res['Remove_Reporting_AppSts']==3){echo 'selected';}?>>Reject</option>
	  </select>
	 </td> 
	 	 
	</tr> 
<?php $sn++; } ?>
   <tr>
    <td colspan="2"></td>
    <td colspan="11" style="font-family:Times New Roman;font-size:15px;font-weight:bold;">
     <?php doPages($offset, 'f_removelApp.php', '', $total_records,$_REQUEST['hq'],$_REQUEST['s'],$_REQUEST['m'],$_REQUEST['y'],$_REQUEST['md'],$_REQUEST['rsts']); ?>
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
function doPages($page_size, $thepage, $query_string, $total=0,$hq,$s,$m,$y,$md,$rsts){ $index_limit = 5; $query=''; if(strlen($query_string)>0){ $query = "&amp;".$query_string; }
$current = get_current_page(); $total_pages=ceil($total/$page_size); $start=max($current-intval($index_limit/2), 1); $end=$start+$index_limit-1;
echo '<div class="paging">';
if($current==1){ echo '<span class="prn">&lt; Previous</span>&nbsp;';}else{ $i = $current-1; echo '<a href="'.$thepage.'?page='.$i.$query.'&hq='.$hq.'&s='.$s.'&m='.$m.'&y='.$y.'&md='.$md.'&rsts='.$rsts.'&er=1013&rr=wew101" class="prn" rel="nofollow" title="go to page '.$i.'" style="color:#A6D2FF;text-decoration:none;">&lt; Previous</a>&nbsp;'; echo '<span class="prn">...</span>&nbsp;';}
if($start > 1){ $i = 1; echo '<a href="'.$thepage.'?page='.$i.$query.'&hq='.$hq.'&s='.$s.'&m='.$m.'&y='.$y.'&md='.$md.'&rsts='.$rsts.'&ee=we23&er=1013&rr=wew101" title="go to page '.$i.'" style="color:#A6D2FF;">'.$i.'</a>&nbsp;'; }
for($i = $start; $i <= $end && $i <= $total_pages; $i++)
{ if($i==$current){ echo '<span>'.$i.'</span>&nbsp;';} else { echo '<a href="'.$thepage.'?page='.$i.$query.'&hq='.$hq.'&s='.$s.'&m='.$m.'&y='.$y.'&md='.$md.'&rsts='.$rsts.'&ee=we23&er=1013&rr=wew101" title="go to page '.$i.'" style="color:#A6D2FF;">'.$i.'</a>&nbsp;'; } }
if($total_pages > $end){ $i = $total_pages; echo '<a href="'.$thepage.'?page='.$i.$query.'&hq='.$hq.'&s='.$s.'&m='.$m.'&y='.$y.'&md='.$md.'&rsts='.$rsts.'&ee=we23&er=1013&rr=wew101" title="go to page '.$i.'" style="color:#A6D2FF;">'.$i.'</a>&nbsp;'; } if($current < $total_pages) { $i = $current+1; echo '<span class="prn">...</span>&nbsp;'; echo '<a href="'.$thepage.'?page='.$i.$query.'&hq='.$hq.'&s='.$s.'&m='.$m.'&y='.$y.'&md='.$md.'&rsts='.$rsts.'&ee=we23&er=1013&rr=wew101" class="prn" rel="nofollow" title="go to page '.$i.'" style="color:#A6D2FF;text-decoration:none;" style="color:#A6D2FF;">Next &gt;</a>&nbsp;'; } else { echo '<span class="prn">Next &gt;</span>&nbsp;'; } if ($total != 0){ echo '&nbsp;&nbsp;&nbsp;&nbsp;<font color="#A6D2FF"<h4>[Total '.$total.' Records]</h></div>'; }
}
?>