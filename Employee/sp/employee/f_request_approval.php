<?php session_start();
if($_SESSION['login'] = true){require_once('../user/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../../../index.php');}
$EmployeeId=$_SESSION['EmployeeID'];
$p=$_REQUEST['p']; $a=$_REQUEST['a']; $r=$_REQUEST['r']; 

if($_REQUEST['act']=='ActionAppRej' AND $_REQUEST['goid']!='' AND $_REQUEST['v']!='' AND $_REQUEST['lvl']!='')
{ 

  if($_REQUEST['v']==2)
  {
   if($_REQUEST['lvl']==0 OR $_REQUEST['lvl']==1){ $msg='forward'; } 
   else{ $msg='approved'; }  
  }
  elseif($_REQUEST['v']==3){ $msg='rejected'; }
  
  if($_REQUEST['lvl']==0)
  { 
   if($_REQUEST['rep']==$_REQUEST['rev'] && $_REQUEST['rep']!=$_REQUEST['gm'])
   {
    $UpQ="Reporting_Sts=".$_REQUEST['v'].", Reporting_Sts_Date='".date("Y-m-d")."', Rev_Sts=".$_REQUEST['v'].", Rev_Sts_Date='".date("Y-m-d")."'"; $statusc=2; $RepId=$_REQUEST['gm'];
   }
   elseif($_REQUEST['rep']==$_REQUEST['rev'] && $_REQUEST['rep']==$_REQUEST['gm'])
   {
    $UpQ="Reporting_Sts=".$_REQUEST['v'].", Reporting_Sts_Date='".date("Y-m-d")."', Rev_Sts=".$_REQUEST['v'].", Rev_Sts_Date='".date("Y-m-d")."', gm_Sts=".$_REQUEST['v'].", gm_Sts_Date='".date("Y-m-d")."'"; 
	$statusc=3; $RepId=0;
   }
   else{ $UpQ="Reporting_Sts=".$_REQUEST['v'].", Reporting_Sts_Date='".date("Y-m-d")."'"; 
         $statusc=1; $RepId=$_REQUEST['rev']; } 
  }
  elseif($_REQUEST['lvl']==1)
  { 
   if($_REQUEST['rep']==$_REQUEST['gm'])
   {
    $UpQ="Rev_Sts=".$_REQUEST['v'].", Rev_Sts_Date='".date("Y-m-d")."', gm_Sts=".$_REQUEST['v'].", gm_Sts_Date='".date("Y-m-d")."'"; $statusc=3; $RepId=0;
   }
   else{ $UpQ="Rev_Sts=".$_REQUEST['v'].", Rev_Sts_Date='".date("Y-m-d")."'"; $statusc=2; $RepId=$_REQUEST['gm']; } 
  }
  elseif($_REQUEST['lvl']==2){ $UpQ="mg_Sts=".$_REQUEST['v'].", gm_Sts_Date='".date("Y-m-d")."'"; $statusc=3; $RepId=0; }

  if($statusc==3){ if($_REQUEST['v']==2){$status=3;}else{$status=5;} }
  else{ $status=2; }
  
  $up=mysql_query("update fa_request set ".$UpQ.", Status=".$status.", Status_Cycle=".$statusc." where FareqId=".$_REQUEST['goid'],$con);
  if($up)
  {
   //E-Mail
   
   $semp=mysql_query("select Fname,Sname,Lname,EmailId_Vnr from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID where g.EmployeeID=".$_REQUEST['by'],$con); 
   $remp=mysql_fetch_assoc($semp);
   
   if($RepId>0)
   {
     $smail=mysql_query("select Fname,Sname,Lname,EmailId_Vnr from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID where g.EmployeeID=".$RepId,$con); $rmail=mysql_fetch_assoc($smail);
	 
	 if($rmail['EmailId_Vnr']!='')
	 {
	  $to   = $rmail['EmailId_Vnr'];
      $from = 'admin@vnrseeds.co.in';
      $sub  = "New FA request ".$msg;
      $head = "From: ".$from."\r\n";  
      $head.= "MIME-Version: 1.0\r\n";
      $head.= "Content-Type: text/html; charset=ISO-8859-1\r\n";
      $msg .= "<html><head></head><body>";
      $msg .= "Dear <b>Sir/Mam</b> <br><br>\n\n\n";
      $msg .= $remp['Fname']." ".$remp['Sname']." ".$remp['Lname']." new FA request ".$msg." by ".$rmail['Fname']." ".$rmail['Sname']." ".$rmail['Lname'].". For any action please log on to ESS-Salesplan.<br>\n\n";
      $msg .= "From <br><b>ADMIN ESS</b><br>";
      $msg .= "</body></html>";
      //$ok   = @mail($eto,$sub,$msg,$head);
	 }
   } //if($RepId>0)	 
	 
	 if($_REQUEST['lvl']==2)
	 {
	  
	  if($_REQUEST['rep']>0)
	  {
	   $srep=mysql_query("select Fname,Sname,Lname,EmailId_Vnr from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID where g.EmployeeID=".$_REQUEST['rep'],$con); $rrep=mysql_fetch_assoc($srep);
	   if($rrep['EmailId_Vnr']!='')
	   {
	    $to2   = $rrep['EmailId_Vnr'];
        $from2 = 'admin@vnrseeds.co.in';
        $sub2  = "New FA request ".$msg;
        $head2 = "From: ".$from2."\r\n";  
        $head2.= "MIME-Version: 1.0\r\n";
        $head2.= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $msg2 .= "<html><head></head><body>";
        $msg2 .= "Dear <b>Sir/Mam</b> <br><br>\n\n\n";
        $msg2 .= $remp['Fname']." ".$remp['Sname']." ".$remp['Lname']." new FA request is ".$msg.".<br>\n\n";
        $msg2 .= "From <br><b>ADMIN ESS</b><br>";
        $msg2 .= "</body></html>";
        //$ok   = @mail($to2,$sub2,$msg2,$head2);
	   }
	  } //if($_REQUEST['rep']>0)
	  
	  if($_REQUEST['rev']>0)
	  {
	   $srev=mysql_query("select Fname,Sname,Lname,EmailId_Vnr from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID where g.EmployeeID=".$_REQUEST['rev'],$con); $rrev=mysql_fetch_assoc($srev);
	   if($rrev['EmailId_Vnr']!='')
	   {
	    $to3   = $rrev['EmailId_Vnr'];
        $from3 = 'admin@vnrseeds.co.in';
        $sub3  = "New FA request ".$msg;
        $head3 = "From: ".$from3."\r\n";  
        $head3.= "MIME-Version: 1.0\r\n";
        $head3.= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $msg3 .= "<html><head></head><body>";
        $msg3 .= "Dear <b>Sir/Mam</b> <br><br>\n\n\n";
        $msg3 .= $remp['Fname']." ".$remp['Sname']." ".$remp['Lname']." new FA request is ".$msg.".<br>\n\n";
        $msg3 .= "From <br><b>ADMIN ESS</b><br>";
        $msg3 .= "</body></html>";
        //$ok   = @mail($to3,$sub3,$msg3,$head3);
	   }
	  } //if($_REQUEST['rep']>0)
	  
	  if($_REQUEST['by']>0)
	  {
	   if($remp['EmailId_Vnr']!='')
	   {
	    $to4   = $remp['EmailId_Vnr'];
        $from4 = 'admin@vnrseeds.co.in';
        $sub4  = "New FA request ".$msg;
        $head4 = "From: ".$from4."\r\n";  
        $head4.= "MIME-Version: 1.0\r\n";
        $head4.= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $msg4 .= "<html><head></head><body>";
        $msg4 .= "Dear <b>".$remp['Fname']." ".$remp['Sname']." ".$remp['Lname']."</b> <br><br>\n\n\n";
        $msg4 .= "Your new FA request is ".$msg.".<br>\n\n";
        $msg4 .= "From <br><b>ADMIN ESS</b><br>";
        $msg4 .= "</body></html>";
        //$ok   = @mail($to4,$sub4,$msg4,$head4);
	   }
	  } //if($_REQUEST['rep']>0)
	   
	   
	 }//if($_REQUEST['lvl']==2)
	 
   } //if($up)
   
   
  
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
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/><?php /* Calander Open */?>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script><?php /* Calander Close */?>

<Script language="javascript">
function FunRef(a,b,c,d,e,f){ window.location="f_request_approval.php?ern1=r114&ern2w=234&ern3y=10234&a="+a+"&b="+b+"&c="+c+"&d="+d+"&e="+e+"&f="+f+"&s=0"; }

function funDetail(id)
{ var win = window.open("f_request_details.php?id="+id,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=600,height=450");}

function funAction(v,id,p,a,r,lvl,rep,rev,gm,by)
{ 
 if(v==2){var agree=confirm("Are you sure you want to approve FA request?");}
 else if(v==3){var agree=confirm("Are you sure you want to reject FA request?");}
 if(agree){ var x="f_request_approval.php?act=ActionAppRej&v="+v+"&goid="+id+"&p="+p+"&a="+a+"&r="+r+"&lvl="+lvl+"&rep="+rep+"&rev="+rev+"&gm="+gm+"&by="+by; window.location=x; } 
}


function FunCheck(v,f,s)
{ 
 if(v==1){if(document.getElementById("v1").checked==true){var p=1; var a=0; var r=0;}else{var p=0; var a=f; var r=s;}} 
 else if(v==2){if(document.getElementById("v2").checked==true){var a=1; var p=0; var r=0;}else{var a=0; var p=f; var r=s;}} 
 else if(v==3){if(document.getElementById("v3").checked==true){var r=1; var p=0; var a=0;}else{var r=0; var p=f; var a=s;}}
 var x="f_request_approval.php?ern1=r114&ern2w=234&ern3y=10234&s=0&p="+p+"&a="+a+"&r="+r; 
 window.location=x;
}
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
  <tr>
  <td style="width:100%;" valign="top">
   <table style="width:85%;">
    <tr>
	 <td colspan="2" class="htf2"><u>FA Request Approval</u></td>
	 <td colspan="10" class="htf2"><font style="font-size:12px;color:#FFFF64;"><input type="checkbox" id="v1" <?php if($_REQUEST['p']==1){echo 'checked';} ?> onClick="FunCheck(1,<?php echo $_REQUEST['a'].','.$_REQUEST['r'];?>)">:Pending&nbsp;&nbsp;<input type="checkbox" id="v2" <?php if($_REQUEST['a']==1){echo 'checked';} ?> onClick="FunCheck(2,<?php echo $_REQUEST['p'].','.$_REQUEST['r'];?>)">:Approved&nbsp;&nbsp;<input type="checkbox" id="v3" <?php if($_REQUEST['r']==1){echo 'checked';} ?> onClick="FunCheck(3,<?php echo $_REQUEST['p'].','.$_REQUEST['a'];?>)">:Rejected</font>&nbsp;&nbsp;&nbsp;&nbsp;
	 </td>
	 <td class="htf2"><span style="cursor:pointer;color:#FFFF6A;font-size:12px;" onClick="FunRef(<?php echo $a.','.$b.','.$c.','.$d.','.$e.','.$f;?>)"><u>refresh</u></span>
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
	  <td rowspan="2" style="width:80px;" class="htf">Action</td>
	</tr>
	<tr>
	  <td style="width:50px;" class="htf">Last</td>
	  <td style="width:50px;" class="htf">Achiv</td>
	  <td style="width:50px;" class="htf">Target</td>
	</tr>
<?php if($_REQUEST['a']==1){$sts=2;}elseif($_REQUEST['r']==1){$sts=3;}else{$sts=0;}
if($EmployeeId==1315)
{
$stmt=mysql_query("select * from fa_request where Reporting_Sts=".$sts." OR Rev_Sts=".$sts." OR gm_Sts=".$sts."", $con); 
}
else
{
 $stmt=mysql_query("select * from fa_request where ((Reporting=".$EmployeeId." AND Reporting_Sts=".$sts.") OR (Rev=".$EmployeeId." AND Rev_Sts=".$sts.") OR (gm=".$EmployeeId." AND gm_Sts=".$sts."))", $con);    
}

$total_records=mysql_num_rows($stmt);
if(isset($_GET['page'])){$page=$_GET['page']; $no=(14*($_GET['page']-1))+$_GET['page'];}else{$page = 1; $no=1;} 
$offset = 15; if ($page){ $from = ($page * $offset) - $offset; }else{ $from = 0; }
if($EmployeeId==1315)
{
$sql=mysql_query("select * from fa_request where Reporting_Sts=".$sts." OR Rev_Sts=".$sts." OR gm_Sts=".$sts." order by Req_Date ASC LIMIT ".$from.",".$offset, $con); 
}
else
{
 $sql=mysql_query("select * from fa_request where ((Reporting=".$EmployeeId." AND Reporting_Sts=".$sts.") OR (Rev=".$EmployeeId." AND Rev_Sts=".$sts.") OR (gm=".$EmployeeId." AND gm_Sts=".$sts.")) order by Req_Date ASC LIMIT ".$from.",".$offset, $con);    
}
$sn=1; while($res=mysql_fetch_array($sql)){ ?>	
    <tr>
      <td class="tdf2" align="center"><?php echo $sn; ?></td>
	  <?php $sqle=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$res['RequestBy'],$con);  $rese=mysql_fetch_assoc($sqle); ?>	  
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
	  <td class="tdf2" align="center">
	  <?php if($res['Reporting']==$EmployeeId)
	        {
			 if($res['Reporting_Sts']==0){ echo '<font color="#E800E8">Pending</font>'; }
			 elseif($res['Reporting_Sts']==2){ echo '<font color="#FF6B24">Approved</font>'; }
			 elseif($res['Reporting_Sts']==3){ echo '<font color="#000000">Rejected</font>'; }
			}
			elseif($res['Rev']==$EmployeeId)
	        {
			 if($res['Rev_Sts']==0){ echo '<font color="#E800E8">Pending</font>'; }
			 elseif($res['Rev_Sts']==2){ echo '<font color="#FF6B24">Approved</font>'; }
			 elseif($res['Rev_Sts']==3){ echo '<font color="#000000">Rejected</font>'; }
			}
			elseif($res['gm']==$EmployeeId)
	        {
			 if($res['gm_Sts']==0){ echo '<font color="#E800E8">Pending</font>'; }
			 elseif($res['gm_Sts']==2){ echo '<font color="#FF6B24">Approved</font>'; }
			 elseif($res['gm_Sts']==3){ echo '<font color="#000000">Rejected</font>'; }
			}
	  ?>
	  </td>
	  <td class="tdf2" align="center">
	  <?php if($EmployeeId==1315){?>
	  
	  <select style="width:80px;" class="InputSel" onChange="funAction(this.value,<?php echo $res['FareqId'];?>,<?php echo $_REQUEST['p'].','.$_REQUEST['a'].','.$_REQUEST['r'].','.$res['Status_Cycle'].','.$EmployeeId.','.$res['Rev'].','.$res['gm'].','.$res['RequestBy']; ?>)"><option value="" selected>Select</option><option value="2">Approve</option><option value="3">Reject</option></select>>
	  
	  <?php }else{ ?>
	      
	     <?php if(($res['Reporting']==$EmployeeId && $res['Reporting_Sts']==0) OR ($res['Rev']==$EmployeeId && $res['Rev_Sts']==0) OR ($res['gm']==$EmployeeId && $res['gm_Sts']==0)){ ?><select style="width:80px;" class="InputSel" onChange="funAction(this.value,<?php echo $res['FareqId'];?>,<?php echo $_REQUEST['p'].','.$_REQUEST['a'].','.$_REQUEST['r'].','.$res['Status_Cycle'].','.$res['Reporting'].','.$res['Rev'].','.$res['gm'].','.$res['RequestBy']; ?>)"><option value="" selected>Select</option><option value="2">Approve</option><option value="3">Reject</option></select><?php } ?>
	      
	 <?php  } ?></td>
	</tr>
<?php $sn++; } ?>
    <tr>
    <td align="center" colspan="11" style="font-family:Times New Roman;font-size:15px;font-weight:bold;">
     <?php doPages($offset, 'f_request_approval.php', '', $total_records,$a,$b,$c,$d,$e,$f); ?>
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