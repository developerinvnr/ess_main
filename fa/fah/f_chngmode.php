<?php session_start();
if($_SESSION['login'] = true){require_once('../../Employee/sp/user/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
$EmployeeId=$_SESSION['ID'];

$m=$_REQUEST['m']; $y=$_REQUEST['y']; $hq=$_REQUEST['hq']; $s=$_REQUEST['s']; $md=$_REQUEST['md']; $rsts=$_REQUEST['rsts'];

if($_REQUEST['action'] && $_REQUEST['action']=='cActChangeModeFA')
{ 
  if($_REQUEST['v']==3){$sqlU=mysql_query("update fa_details set Mode=".$_REQUEST['NMode'].", MdChngSts=".$_REQUEST['v'].", MdChngDate='".date("Y-m-d")."', MdChngBy=".$EmployeeId." where FaId=".$_REQUEST['fid'],$con);}
  else{$sqlU=mysql_query("update fa_details set MdChngSts=".$_REQUEST['v'].", MdChngDate='".date("Y-m-d")."', MdChngBy=".$EmployeeId." where FaId=".$_REQUEST['fid'],$con);}
  
 if($sqlU){echo '<script>alert("Data update successfully.."); window.location="f_chngmode.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m='.$_REQUEST['m'].'&y='.$_REQUEST['y'].'&filter=zero&s='.$_REQUEST['s'].'&hq='.$_REQUEST['hq'].'&dis=0&md='.$_REQUEST['md'].'&rsts='.$_REQUEST['rsts'].'";</script>';}
}

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
function FunRef(m,y,s,hq,md,rsts){ window.location="f_chngmode.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&md="+md+"&rsts="+rsts; }

function funrsts(rsts,m,y,hq,s,md)
{ window.location="f_chngmode.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&md="+md+"&rsts="+rsts; }

function ActionModeFA(v,fid,m,y,hq,s,md,sn,ei,nm,rsts)
{ 
 var agree=confirm("Are you sure?"); if(agree){ window.location="f_chngmode.php?action=cActChangeModeFA&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&md="+md+"&fid="+fid+"&rsts="+rsts+"&v="+v+"&ei="+ei+"&ei="+ei+"&NMode="+nm; } else {return false;} 
}


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
   <table border="0" cellpadding="0" cellspacing="1">
    <tr>
	 <td colspan="35">
	  <table border="0">
   <tr>
	<td>
	 <table border="0">
		<tr>
	    <td class="htf2" align="left"><u>FA Change Mode Request</u>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	    <td style="font-family:Georgia;color:#FF80FF;font-weight:bold;font-size:12px; width:60px;"><span style="cursor:pointer;color:#FFFF6A;" onClick="FunRef(<?php echo $m.','.$y.','.$_REQUEST['s'].','.$_REQUEST['hq'].','.$md.','.$rsts; ?>)"><u>refresh</u></span></td>
	    <td class="tdf" align="center">&nbsp;</td>
	    <td class="tdf">&nbsp;Status</td>
	    <td style="width:120px;"><select style="width:120px;" class="InputSel" id="rsts" name="rsts" onChange="funrsts(this.value,<?php echo $m.','.$y.','.$_REQUEST['hq'].','.$_REQUEST['s'].','.$_REQUEST['md']; ?>)"><option value='<?php echo $_REQUEST['rsts'];?>' selected><?php if($_REQUEST['rsts']=='All'){$rsts='All';}elseif($_REQUEST['rsts']==1){$rsts='Draft';}elseif($_REQUEST['rsts']==2){$rsts='Pending';}elseif($_REQUEST['rsts']==3){$rsts='Approved';}elseif($_REQUEST['rsts']==4){$rsts='Reject';}elseif($_REQUEST['rsts']==0){$rsts='Without Request';} echo ucfirst(strtolower($rsts));?></option> 
  <?php if($_REQUEST['rsts']!=1){ ?><option value="1">Draft</option><?php } ?>
  <?php if($_REQUEST['rsts']!=2){ ?><option value="2">Pending</option><?php } ?>
  <?php if($_REQUEST['rsts']!=3){ ?><option value="3">Approved</option><?php } ?>
  <?php if($_REQUEST['rsts']!=4){ ?><option value="4">Reject</option><?php } ?>
  <?php if($_REQUEST['rsts']!='All'){ ?><option value="All">All</option><?php } ?></select></td>
	   </tr>
	  </table>
	 </td>
	</tr>
<?php if($_REQUEST['rsts']>0 OR $_REQUEST['rsts']=='All'){ ?>	
	<tr>
	 <td>
	  <table>
	  <tr style="height:22px;">
      <td colspan="7" class="htf">&nbsp;General Details&nbsp;&nbsp;&nbsp;&nbsp;</td>
	  <td colspan="2" class="htf" style="background-color:#FFAEFF;">Mode Change Request Details</td>
	  <td colspan="4" class="htf" style="background-color:#FFAEFF;">Status</td>
	  <td rowspan="2" style="width:70px;" class="htf">Action</td>
	</tr>
	  <tr style="height:22px;">
      <td style="width:30px;" class="htf">&nbsp;Sn&nbsp;</td>
      <td style="width:150px;" class="htf">Name</td>
	  <td style="width:100px;" class="htf">Old Mode</td>
	  <td style="width:100px;" class="htf">Curr. Mode</td>
	  <td style="width:80px;" class="htf">FA HQ</td>
	  <td style="width:60px;" class="htf">Expen.</td>
	  <td style="width:120px;" class="htf">Reporting</td>
	  
	  <td style="width:100px;" class="htf">Change Mode</td>
	  <td style="width:120px;" class="htf">Reason/Remark</td>
	  <td style="width:60px;" class="htf">Rep</td>
	  <td style="width:60px;" class="htf">Gm</td>
	  <td style="width:60px;" class="htf">Mkt</td>
	  <td style="width:60px;" class="htf">Admin</td>
	 </tr>
	
<?php if($_REQUEST['rsts']=='All'){ $result=mysql_query("select * from fa_details where (FaStatus='A' OR (FaStatus='D' AND MdChngSts=3)) AND MdChngSts>=1",$con); }
if($_REQUEST['rsts']>0){ $result=mysql_query("select * from fa_details where (FaStatus='A' OR (FaStatus='D' AND MdChngSts=3)) AND MdChngSts=".$_REQUEST['rsts'],$con); }

$total_records=mysql_num_rows($result);
if(isset($_GET['page'])){$page=$_GET['page']; $no=(14*($_GET['page']-1))+$_GET['page'];}else{$page = 1; $no=1;} 
$offset = 15; if ($page){ $from = ($page * $offset) - $offset; }else{ $from = 0; }

if($_REQUEST['rsts']=='All'){ $sql=mysql_query("select * from fa_details where (FaStatus='A' OR (FaStatus='D' AND MdChngSts=3)) AND MdChngSts>=1 order by FaId ASC LIMIT ".$from.",".$offset,$con); }
if($_REQUEST['rsts']>0){ $sql=mysql_query("select * from fa_details where (FaStatus='A' OR (FaStatus='D' AND MdChngSts=3)) AND MdChngSts=".$_REQUEST['rsts']."  order by FaId ASC LIMIT ".$from.",".$offset,$con); }

      $sn=1; while($res=mysql_fetch_array($sql)){ $shq=mysql_query("select CountryName,StateName,HqName,s.CountryId,h.StateId from hrm_headquater h inner join hrm_state s on h.StateId=s.StateId inner join hrm_country c on s.CountryId=c.CountryId where h.HqId=".$res['HqId'], $con);
	  $rhq=mysql_fetch_assoc($shq); ?>	 
<tr style="height:22px;" bgcolor="#FFFFFF" id="TR<?php echo $sn; ?>">
<td class="tdf2" align="center"><?php echo $sn; ?></td>
<td class="tdf2">&nbsp;<span style="cursor:pointer;color:#0079F2;" onClick="funDetail(<?php echo $res['FaId']; ?>)"><u><?php echo $res['FaName']; ?></u></span></td>
<td class="tdf2"><input class="InputType" style="width:100px;" value="<?php if($res['MdChngSts']==3){ if($res['Md_Prev']==1){echo 'Direct(Sales Executive)';}elseif($res['Md_Prev']==2){echo 'Teamlease';}elseif($res['Md_Prev']==3){echo 'Distributor';} }?>" readonly/></td>

<td class="tdf2"><input class="InputType" style="width:100px;" id="mode<?php echo $sn; ?>" value="<?php if($res['Mode']==1){echo 'Direct(Sales Executive)';}elseif($res['Mode']==2){echo 'Teamlease';}elseif($res['Mode']==3){echo 'Distributor';}?>" readonly/></td>
<td class="tdf2"><input class="InputType" style="width:80px;" id="Hq<?php echo $sn; ?>" value="<?php echo ucfirst(strtolower($res['OtherHq'])); ?>" readonly/></td>

	 <td class="tdf2" align="right"><?php echo floatval($res['Salary']+$res['Expences']); ?>&nbsp;</td>
	 <?php if($res['tl']==0){ $e=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$res['Reporting'],$con); $re=mysql_fetch_assoc($e); $RName=ucfirst(strtolower($re['Fname'].' '.$re['Sname'].' '.$re['Lname'])); }else{ $e2=mysql_query("select TLName from hrm_sales_tlemp where TLEId=".$res['Reporting'],$con); $re2=mysql_fetch_assoc($e2); $RName=ucfirst(strtolower($re2['TLName'])); } ?>
	 <td class="tdf2"><input class="InputType" style="width:120px;" id="rep<?php echo $sn; ?>" value="<?php echo $RName; ?>" readonly/></td>	
	  
	 <td class="tdf2"><input class="InputType" style="width:100px;" value="<?php if($res['Md_Curr']==1){echo 'Direct(Sales Executive)';}elseif($res['Md_Curr']==2){echo 'Teamlease';}elseif($res['Md_Curr']==3){echo 'Distributor';}?>" readonly/></td>
	 <input type="hidden" id="NMode<?php echo $sn; ?>" value="<?php echo $res['Md_Curr']; ?>" />
	  
	 <td class="tdf2"><input class="InputType" style="width:180px;" id="Rmk<?php echo $sn; ?>" value="<?php echo $res['MdChngRmk']; ?>"/></td> 
	 
	 <td class="tdf2" align="center"><?php if($res['MdChng_Reporting_AppSts']==0){echo 'Draft';}elseif($res['MdChng_Reporting_AppSts']==1){echo '<font color="#FF8040">Pending</font>';}elseif($res['MdChng_Reporting_AppSts']==2){echo '<font color="#1C951F">Approved</font>';}elseif($res['MdChng_Reporting_AppSts']==3){echo '<font color="#FF0000">Reject</font>';} ?></td>
	 
	 <td class="tdf2" align="center"><?php if($res['MdChng2Sts']==1){echo 'Draft';}elseif($res['MdChng2Sts']==2){echo '<font color="#FF8040">Pending</font>';}elseif($res['MdChng2Sts']==3){echo '<font color="#1C951F">Approved</font>';}elseif($res['MdChng2Sts']==4){echo '<font color="#FF0000">Reject</font>';} ?></td>
	 <td class="tdf2" align="center"><?php if($res['MdChng3Sts']==1){echo 'Draft';}elseif($res['MdChng3Sts']==2){echo '<font color="#FF8040">Pending</font>';}elseif($res['MdChng3Sts']==3){echo '<font color="#1C951F">Approved</font>';}elseif($res['MdChng3Sts']==4){echo '<font color="#FF0000">Reject</font>';} ?></td>
	 <td class="tdf2" align="center"><?php if($res['MdChngSts']==1){echo 'Draft';}elseif($res['MdChngSts']==2){echo '<font color="#FF8040">Pending</font>';}elseif($res['MdChngSts']==3){echo '<font color="#1C951F">Approved</font>';}elseif($res['MdChngSts']==4){echo '<font color="#FF0000">Reject</font>';} ?></td>	
	 
	 <td class="tdf2" align="center"><?php if($res['MdChngSts']!=3 AND $res['MdChngSts']!=4 AND $res['MdChng2Sts']==3){ ?>
	 <select class="InputSel" style="width:80px;background-color:<?php if($resS['Status']==1){ echo '#FFFFB0';}else{echo '#FFFFFF';}?>;" onChange="ActionModeFA(this.value,<?php echo $res['FaId'].','.$_REQUEST['m'].','.$_REQUEST['y'].','.$_REQUEST['hq'].','.$_REQUEST['s'].','.$_REQUEST['md'].','.$sn.','.$EmployeeId.','.$res['Md_Curr']; ?>,'<?php echo $_REQUEST['rsts']; ?>')"><option value="">Select</option><option value="2">Pending</option><option value="3">Approved</option><option value="4">Reject</option></select><?php } ?>
	 </td>

	  
	</tr> 
<?php $sn++; } ?>
   <tr>
    <td colspan="2"></td>
    <td colspan="11" style="font-family:Times New Roman;font-size:15px;font-weight:bold;">
     <?php doPages($offset, 'f_chngmode.php', '', $total_records,$_REQUEST['hq'],$_REQUEST['s'],$_REQUEST['m'],$_REQUEST['y'],$_REQUEST['md'],$_REQUEST['rsts']); ?>
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