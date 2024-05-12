<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}
$a=$_REQUEST['a']; $b=$_REQUEST['b']; $c=$_REQUEST['c']; $d=$_REQUEST['d']; 
$e=$_REQUEST['e']; $f=$_REQUEST['f'];

if($_REQUEST['act']=='closedreq' AND $_REQUEST['closeid']!='')
{ $up=mysql_query("update fa_request set Status=4, Status_Cycle=3 where FareqId=".$_REQUEST['closeid'],$con);
  if($up){ echo '<script>alert("FA request closed successfully..");</script>'; }
}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> /*background-color:#D9D9FF;  background-color:#EEEEEE; */
.CalenderButton {background-image:url(images/CalenderBtn.jpeg);width:16px;height:16px;background-color:#E0DBE3;border-color:#FFFFFF;}
.htf{font-family:Georgia;color:#000;font-weight:bold;text-align:center;font-size:12px;background-color:#97FFFF;}
.htf2{font-family:Georgia;color:#FF80FF;font-weight:bold;text-align:center;font-size:18px;height:24px;}
.tdf{font-family:Georgia;font-size:12px;height:20px;color:#fff;}
.tdf2{background-color:#FFFFFF;font-family:Georgia;font-size:12px;height:20px;color:#000000;}
.InputSel {font-family:Georgia;font-size:12px;text-align:left; }
.InputType {font-family:Georgia;font-size:12px;text-align:left; }
.InputType2 {font-family:Georgia;font-size:12px;border:hidden;}
.SaveButton {background-image:url(images/save.png);width:18px;height:18px;background-repeat:no-repeat;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script language="javascript">
function FunRef(a,b,c,d,e,f){ window.location="f_requestst.php?ern1=r114&ern2w=234&ern3y=10234&a="+a+"&b="+b+"&c="+c+"&d="+d+"&e="+e+"&f="+f+"&s=0"; }

function funDetail(id)
{ var win = window.open("f_request_details.php?id="+id,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=600,height=450");}

function FunCheck(v,a,b,c,d,e,f)
{ 
 if(v==0){ if(document.getElementById("v0").checked==true){var vk=1;}else{var vk=0;} 
 var x="f_requestst.php?ern1=r114&ern2w=234&ern3y=10234&s="+st+"&a="+vk+"&b="+b+"&c="+c+"&d="+d+"&e="+e+"&f="+f; }
 else if(v==1){ if(document.getElementById("v1").checked==true){var vk=1;}else{var vk=0;} 
 var x="f_requestst.php?ern1=r114&ern2w=234&ern3y=10234&s="+st+"&a="+a+"&b="+vk+"&c="+c+"&d="+d+"&e="+e+"&f="+f; }
 else if(v==2){ if(document.getElementById("v2").checked==true){var vk=1;}else{var vk=0;} 
 var x="f_requestst.php?ern1=r114&ern2w=234&ern3y=10234&s="+st+"&a="+a+"&b="+b+"&c="+vk+"&d="+d+"&e="+e+"&f="+f; }
 else if(v==3){ if(document.getElementById("v3").checked==true){var vk=1;}else{var vk=0;} 
 var x="f_requestst.php?ern1=r114&ern2w=234&ern3y=10234&s="+st+"&a="+a+"&b="+b+"&c="+c+"&d="+vk+"&e="+e+"&f="+f; }
 else if(v==4){ if(document.getElementById("v4").checked==true){var vk=1;}else{var vk=0;} 
 var x="f_requestst.php?ern1=r114&ern2w=234&ern3y=10234&s="+st+"&a="+a+"&b="+b+"&c="+c+"&d="+d+"&e="+vk+"&f="+f; }
 else if(v==5){ if(document.getElementById("v5").checked==true){var vk=1;}else{var vk=0;} 
 var x="f_requestst.php?ern1=r114&ern2w=234&ern3y=10234&s="+st+"&a="+a+"&b="+b+"&c="+c+"&d="+d+"&e="+e+"&f="+vk; }
 window.location=x;
}

function funClose(value,a,b,c,d,e,f)
{ var agree=confirm("Are you sure you want to close FA request?"); 
if(agree){ var x="f_requestst.php?act=closedreq&closeid="+value+"&a="+a+"&b="+b+"&c="+c+"&d="+d+"&e="+e+"&f="+f; window.location=x;} }

</Script>
</head>
<body class="body">
<input type="hidden" id="st" value="<?php echo $_REQUEST['s']; ?>" />
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
	  <td valign="top" width="100%" id="MainWindow"><br>
<!DOCTYPE html>
<html>
<?php //***************START*****START*****START******START******START***************************?>
<table border="0" style="margin-top:0px;width:100%;height:150px;">	
<tr>
 <td valign="top" style="width:100%;">
 <table border="0" style="width:100%;">
 <tr>
<td style="width:100%;">
 <table border="0" style="width:100%;">
  <td style="width:100%;" valign="top">
   <table style="width:85%;">
    <tr>
	 <td colspan="2" class="htf2"><u>Status</u></td>
	 <td colspan="10" class="htf2"><font style="font-size:12px;color:#FFFF64;"><input type="checkbox" id="v1" <?php if($_REQUEST['b']==1){echo 'checked';} ?> onClick="FunCheck(1,<?php echo $a.','.$b.','.$c.','.$d.','.$e.','.$f; ?>)">:Pending GM&nbsp;&nbsp;<input type="checkbox" id="v2" <?php if($_REQUEST['c']==1){echo 'checked';} ?> onClick="FunCheck(2,<?php echo $a.','.$b.','.$c.','.$d.','.$e.','.$f; ?>)">:Pending Mkt&nbsp;&nbsp;<input type="checkbox" id="v3" <?php if($_REQUEST['d']==1){echo 'checked';} ?> onClick="FunCheck(3,<?php echo $a.','.$b.','.$c.','.$d.','.$e.','.$f; ?>)">:Approved&nbsp;&nbsp;<input type="checkbox" id="v4" <?php if($_REQUEST['e']==1){echo 'checked';} ?> onClick="FunCheck(4,<?php echo $a.','.$b.','.$c.','.$d.','.$e.','.$f; ?>)">:Close&nbsp;&nbsp;<input type="checkbox" id="v5" <?php if($_REQUEST['f']==1){echo 'checked';} ?> onClick="FunCheck(5,<?php echo $a.','.$b.','.$c.','.$d.','.$e.','.$f; ?>)">:Rejected&nbsp;&nbsp;</font>&nbsp;&nbsp;&nbsp;&nbsp;
	 </td>
	 <td class="htf2"><span style="cursor:pointer;color:#FFFF6A;font-size:12px;" onClick="FunRef(<?php echo $a.','.$b.','.$c.','.$d.','.$e.','.$f; ?>)"><u>refresh</u></span>
	 </td>
	</tr>
	<tr>
      <td rowspan="2" style="width:30px;" class="htf">&nbsp;Sn&nbsp;</td>
	  <td rowspan="2" style="width:150px;" class="htf">Request By</td>
      <td rowspan="2" style="width:80px;" class="htf">Mode</td>
	  <td rowspan="2" style="width:150px;" class="htf">Crop</td>
	  <td rowspan="2" style="width:80px;" class="htf">Hq</td>
	  <td rowspan="2" style="width:40px;" class="htf">Detail</td>
	  <td colspan="3" style="width:150px;" class="htf">Plan (Year)</td>
	  <td rowspan="2" style="width:50px;" class="htf">Expense</td>
	  <td rowspan="2" style="width:60px;" class="htf">Request Date</td>
	  <td rowspan="2" style="width:60px;" class="htf">Status</td>
	  <td rowspan="2" style="width:50px;" class="htf">Action</td>
	</tr>
	<tr>
	  <td style="width:50px;" class="htf">Last</td>
	  <td style="width:50px;" class="htf">Achiv</td>
	  <td style="width:50px;" class="htf">Target</td>
	</tr>
<?php if($a==1){$aa=0;}else{$aa=10;} if($b==1){$bb=1;}else{$bb=20;} if($c==1){$cc=2;}else{$cc=30;} 
      if($d==1){$dd=3;}else{$dd=40;} if($e==1){$ee=4;}else{$ee=50;} if($f==1){$ff=5;}else{$ff=60;}

$stmt=mysql_query("select * from fa_request where (Status=".$bb." OR Status=".$cc." OR Status=".$dd." OR Status=".$ee." OR Status=".$ff.")", $con); $total_records=mysql_num_rows($stmt);
if(isset($_GET['page'])){$page=$_GET['page']; $no=(14*($_GET['page']-1))+$_GET['page'];}else{$page = 1; $no=1;} 
$offset = 15; if ($page){ $from = ($page * $offset) - $offset; }else{ $from = 0; }
$sql=mysql_query("select * from fa_request where (Status=".$bb." OR Status=".$cc." OR Status=".$dd." OR Status=".$ee." OR Status=".$ff.") order by Req_Date ASC LIMIT ".$from.",".$offset, $con); 	$sn=1; while($res=mysql_fetch_array($sql)){ ?>	
    <tr>
      <td class="tdf2" align="center"><?php echo $sn; ?></td>
<?php $sqle=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$res['RequestBy'],$con); 
      $rese=mysql_fetch_assoc($sqle); ?>	  
	  <td class="tdf2" valign="top"><?php echo $rese['Fname'].' '.$rese['Sname'].' '.$rese['Lname']; ?></td>
      <td class="tdf2" valign="top"><?php if($res['Mode']==1){echo 'DIRECT(Sales)';}elseif($res['Mode']==2){echo 'TEAMLEASE';}elseif($res['Mode']==3){echo 'DISTRIBUTOR';}?></td>
	  <td class="tdf2" valign="top"><?php $crp=mysql_query("select ItemName from fa_request_crop rc inner join hrm_sales_seedsitem si on rc.ItemId=si.ItemId where FareqId=".$res['FareqId']." order by ItemName ASC",$con); while($rcrp=mysql_fetch_assoc($crp)){ echo $rcrp['ItemName'].', '; } ?></td>
	  <td class="tdf2" valign="top"><?php $hq=mysql_query("select HqName from hrm_headquater where HqId=".$res['HqId'],$con); $rhq=mysql_fetch_assoc($hq); echo $rhq['HqName']; ?></td>
	  <td class="tdf2" align="center"><span style="cursor:pointer;color:#0079F2;" onClick="funDetail(<?php echo $res['FareqId']; ?>)"><u>click</u></span></td>
	  <td class="tdf2" align="right"><?php echo floatval($res['Plan_last']); ?>&nbsp;</td>
	  <td class="tdf2" align="right"><?php echo floatval($res['Plan_tgt']); ?>&nbsp;</td>
	  <td class="tdf2" align="right"><?php echo floatval($res['Plan_proj']); ?>&nbsp;</td>
	  <td class="tdf2" align="right"><?php echo floatval($res['Salary']); ?>&nbsp;</td>
	  <td class="tdf2" align="center"><?php echo date("d M y",strtotime($res['Req_Date'])); ?></td>
	  <td class="tdf2" align="center"><?php if($res['Status']==1){ ?><font color="#E800E8">Pending GM</font>
	  <?php } elseif($res['Status']==2){ ?><font color="#FF6B24">Pending Mkt</font>
	  <?php } elseif($res['Status']==3){ ?><font color="#008000">Approved</font>
	  <?php } elseif($res['Status']==4){ ?><font color="#000000">Closed</font>
	  <?php } elseif($res['Status']==5){ ?><font color="#000000">Rejected</font><?php } ?>
	  </td>
	  <td class="tdf2" align="center"><?php if($res['Status']==3){ ?><span style="cursor:pointer;color:#0079F2;" onClick="funClose(<?php echo $res['FareqId'];?>,<?php echo $a.','.$b.','.$c.','.$d.','.$e.','.$f; ?>)"><u>close</u></span><?php } ?>
	  </td>
	</tr>
<?php $sn++; } ?>
    <tr>
    <td align="center" colspan="11" style="font-family:Times New Roman;font-size:15px;font-weight:bold;">
     <?php doPages($offset, 'f_requestst.php', '', $total_records,$a,$b,$c,$d,$e,$f); ?>
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
function doPages($page_size, $thepage, $query_string, $total=0,$a,$b,$c,$d,$e,$f){ $index_limit = 5; $query=''; if(strlen($query_string)>0){ $query = "&amp;".$query_string; }
$current = get_current_page(); $total_pages=ceil($total/$page_size); $start=max($current-intval($index_limit/2), 1); $end=$start+$index_limit-1;
echo '<div class="paging">';
if($current==1){ echo '<span class="prn">&lt; Previous</span>&nbsp;';}else{ $i = $current-1; echo '<a href="'.$thepage.'?page='.$i.$query.'&a='.$a.'&b='.$b.'&c='.$c.'&d='.$d.'&e='.$e.'&f='.$f.'&er=1013&rr=wew101" class="prn" rel="nofollow" title="go to page '.$i.'" style="color:#A6D2FF;text-decoration:none;">&lt; Previous</a>&nbsp;'; echo '<span class="prn">...</span>&nbsp;';}
if($start > 1){ $i = 1; echo '<a href="'.$thepage.'?page='.$i.$query.'&a='.$a.'&b='.$b.'&c='.$c.'&d='.$d.'&e='.$e.'&f='.$f.'&ee=we23&er=1013&rr=wew101" title="go to page '.$i.'" style="color:#A6D2FF;">'.$i.'</a>&nbsp;'; }
for($i = $start; $i <= $end && $i <= $total_pages; $i++)
{ if($i==$current){ echo '<span>'.$i.'</span>&nbsp;';} else { echo '<a href="'.$thepage.'?page='.$i.$query.'&a='.$a.'&b='.$b.'&c='.$c.'&d='.$d.'&e='.$e.'&f='.$f.'&ee=we23&er=1013&rr=wew101" title="go to page '.$i.'" style="color:#A6D2FF;">'.$i.'</a>&nbsp;'; } }
if($total_pages > $end){ $i = $total_pages; echo '<a href="'.$thepage.'?page='.$i.$query.'&a='.$a.'&b='.$b.'&c='.$c.'&d='.$d.'&e='.$e.'&f='.$f.'&ee=we23&er=1013&rr=wew101" title="go to page '.$i.'" style="color:#A6D2FF;">'.$i.'</a>&nbsp;'; } if($current < $total_pages) { $i = $current+1; echo '<span class="prn">...</span>&nbsp;'; echo '<a href="'.$thepage.'?page='.$i.$query.'&a='.$a.'&b='.$b.'&c='.$c.'&d='.$d.'&e='.$e.'&f='.$f.'&ee=we23&er=1013&rr=wew101" class="prn" rel="nofollow" title="go to page '.$i.'" style="color:#A6D2FF;text-decoration:none;" style="color:#A6D2FF;">Next &gt;</a>&nbsp;'; } else { echo '<span class="prn">Next &gt;</span>&nbsp;'; } if ($total != 0){ echo '&nbsp;&nbsp;&nbsp;&nbsp;<font color="#A6D2FF"<h4>[Total '.$total.' Records]</h></div>'; }
}
?>	