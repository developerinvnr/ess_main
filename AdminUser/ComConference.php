<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
if($_REQUEST['action']=='ManDay')
{
 $sql=mysql_query("select ConferenceId from hrm_company_conference_participant where ConferenceId=".$_REQUEST['id'], $con);
 $row=mysql_num_rows($sql); 
 if($row>0)
 {
  $sqlc=mysql_query("select Duration from hrm_company_conference where ConferenceId=".$_REQUEST['id'], $con); $resc=mysql_fetch_assoc($sqlc);
  $TotManDay=$resc['Duration']*$row; 
  $sqlU=mysql_query("UPDATE hrm_company_conference SET TotalParticipant=".$row.", Man_Day=".$TotManDay." WHERE ConferenceId=".$_REQUEST['id'], $con);
 }
 elseif($row==0)
 {
  $sqlU=mysql_query("UPDATE hrm_company_conference SET TotalParticipant=".$row.", Man_Day=0 WHERE TrainingId=".$_REQUEST['id'], $con);
 }

}

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:250px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:13px; height:10px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.cell {color:#FFFFFF;font-family:Times New Roman;font-size:14px;font-weight:bold;} 
.cell2 {color:#000;font-family:Times New Roman;font-size:14px;} .cell3 {color:#030303;font-family:Times New Roman;font-size:14px; font-weight:bold;} 
.cellOpe {color:#FFFFFF;font-family:Times New Roman; height:20px; font-size:14px; font-weight:bold;}
.cellOpe2 {color:#000;font-family:Times New Roman; height:20px; font-size:14px; font-weight:bold;}
.cellOpe3 {color:#000;font-family:Times New Roman; width:30px;height:20px; font-size:14px; font-weight:bold;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/MasterAjaxCall.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</script>
<script type="text/javascript" language="javascript">
function SelectYear(value) 
{ var Y = document.getElementById("Year").value; var x = 'ComConference.php?Y='+Y+'&page=1'; window.location=x;}
								  
function ClickNew(c,u,yi,y,p)
{ var win=window.open("NewConferenceProg.php?c="+c+"&u="+u+"&yi="+yi,"leaveForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=380,height=290");
  var timer = setInterval( function() { if(win.closed) { clearInterval(timer);  window.location="ComConference.php?Y="+y+"&page="+p; } }, 1000);
}

function EditTra(c,u,id,y,p,yi)
{ var win=window.open("ConferenceProgDetails.php?c="+c+"&u="+u+"&id="+id+"&yi="+yi,"leaveForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=1040,height=550");
  var timer = setInterval( function() { if(win.closed) { clearInterval(timer);  window.location="ComConference.php?Y="+y+"&action=ManDay&id="+id+"&page="+p; } }, 1000);
}

function PrintData(v)
{ var ComId=document.getElementById("ComId").value; 
  window.open("PrintConfData.php?v="+v+"&C="+ComId,"PrintForm","menubar=no,scrollbars=no,resizable=no,directories=no,width=50,height=50");
}
  
function ExportData(v)
{ var ComId=document.getElementById("ComId").value;   
  window.open("ExportConfData.php?v="+v+"&C="+ComId,"PrintForm","menubar=no,scrollbars=no,resizable=no,directories=no,width=20,height=20");
}
    
</script>   
</head>
<body class="body">
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
<table class="table" border="0">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top" align="left"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow">
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>	  
<table border="0" style="margin-top:0px; width:100%; height:350px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td style="width:160px;" align="">&nbsp;<font color="#2D002D" style='font-family:Times New Roman;' size="4"><b>Conference : Year</b></font></td>
	  <td style="width:80px;"><select style="font-size:12px; width:60px; height:20px; background-color:#DDFFBB;" name="Year" id="Year" onChange="SelectYear(this.value)">
	  <option value="<?php echo $_REQUEST['Y']; ?>"><?php echo $_REQUEST['Y']; ?></option>
	  <?php for($i=date("Y"); $i>=2005; $i--){ ?>
<?php if($_REQUEST['Y']!=$i){ ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?>
<?php } ?>
	  <option value="All">All</option></select></td> 
	  <td style="font-size:14px;height:20px;font-family:Times New Roman;"><a href="NewConfParticular.php">Add New Particular</a></td>
	  <td>&nbsp;</td>
	  <td style="font-size:14px;height:20px;font-family:Times New Roman;">
	  <a href="#" onClick="PrintData('<?php echo $_REQUEST['Y']; ?>')">Print</a>
	  &nbsp;&nbsp;<a href="#" onClick="ExportData('<?php echo $_REQUEST['Y']; ?>')">Export Excel</a></td>
	  <td style="width:500px;">&nbsp;</td>
	  <td style="widht:500px;" align="">&nbsp;<font color="#383838" style='font-family:Times New Roman;' size="3"><b>NOP</b>&nbsp;[No. of Participants]</font></td>
	</tr>
   </table>
  </td>
 </tr>
 <tr>
  <td valign="top">
   <table border="1" valign="top" style="width:1050px;">
 <tr bgcolor="#7a6189">
	<td align="center" style="color:#FFFFFF;" class="All_30"><b>SN</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Title</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_60"><b>Date</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Duration</b></td>
<?php /*<td align="center" style="color:#FFFFFF;" class="All_150"><b>Institute</b></td>*/ ?>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Conducted By</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Location</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_60"><b>Cost</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>NOP</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>Mandays</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>&nbsp;</b></td>
 </tr> 
<?php
if($_REQUEST['Y']!='All'){ $sql_statement = mysql_query("SELECT * from hrm_company_conference WHERE ConfYear=".$_REQUEST['Y']." AND CompanyId=".$CompanyId." order by ConfFrom DESC", $con);}
if($_REQUEST['Y']=='All'){ $sql_statement= mysql_query("SELECT * from hrm_company_conference WHERE CompanyId=".$CompanyId." order by ConfFrom DESC", $con); }
$total_records = mysql_num_rows($sql_statement);
if(isset($_GET['page']))
$page = $_GET['page'];
else
$page = 1;
$offset = 15;
if ($page){
$from = ($page * $offset) - $offset;
}else{
$from = 0;
}

 if($_REQUEST['Y']!='All'){ $sqlT = mysql_query("SELECT * from hrm_company_conference WHERE ConfYear=".$_REQUEST['Y']." AND CompanyId=".$CompanyId." order by ConfFrom DESC LIMIT ".$from.",".$offset, $con); }
 if($_REQUEST['Y']=='All'){ $sqlT = mysql_query("SELECT * from hrm_company_conference WHERE CompanyId=".$CompanyId." order by ConfFrom DESC LIMIT ".$from.",".$offset, $con); }
 if($total_records>0) 
 { if($_REQUEST['page']==1){$Sno=1;} elseif($_REQUEST['page']==2){$Sno=16;} elseif($_REQUEST['page']==3){$Sno=31;}
   elseif($_REQUEST['page']==4){$Sno=46;} elseif($_REQUEST['page']==5){$Sno=61;} elseif($_REQUEST['page']==6){$Sno=76;} 
   elseif($_REQUEST['page']==7){$Sno=91;} elseif($_REQUEST['page']==8){$Sno=106;} elseif($_REQUEST['page']==9){$Sno=121;} 
   elseif($_REQUEST['page']==10){$Sno=136;} 
 } else{$Sno=1;}
 while($resT = mysql_fetch_assoc($sqlT)) { 
?> 	 
 <tr bgcolor="<?php if($Sno%2){ echo '#FFFFFF'; } else {echo '#D9D1E7';}?>">
	<td align="center" style="" class="All_30"><?php echo $Sno; ?></td>
	<td align="" style="" class="All_150" valign="top"><?php echo $resT['ConfTitle']; ?></td>
	<td align="center" style="" class="All_60" valign="top"><?php echo date("d-M-y",strtotime($resT['ConfFrom'])); ?></td>
	<td align="center" style="" class="All_80" valign="top"><?php echo $resT['Duration']; ?>&nbsp;<?php if($resT['Duration']>1){echo 'Days';}else{echo 'Day';}; ?></td>
<?php /*<td align="" style="" class="All_150" valign="top"><?php echo $resT['Institute']; ?></td> */ ?>
	<td align="" style="" class="All_150" valign="top"><?php echo $resT['ConductedBy']; ?></td>
	<td align="" style="" class="All_150" valign="top"><?php echo $resT['Location']; ?></td>
	<td align="right" style="" class="All_60" valign="top"><?php echo intval($resT['TotalCost']); ?>&nbsp;</td>
	<td align="center" style="" class="All_60" valign="top"><?php echo $resT['TotalParticipant']; ?></td>
	<td align="center" style="" class="All_50" valign="top"><?php echo $resT['Man_Day']; ?></td>
	<td align="center" style="" class="All_50" valign="top">
	<a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="EditTra(<?php echo $CompanyId.', '.$UserId.', '.$resT['ConferenceId']; ?>, '<?php echo $_REQUEST['Y']; ?>', <?php echo $_REQUEST['page'].', '.$YearId; ?>)"></a></td>
 </tr>
<?php $Sno++; }?> 
<tr>
  <td class="fontButton" align="center" colspan="9" style="font-family:Times New Roman; font-size:15px; font-weight:bold;">
  <?PHP doPages($offset, 'ComConference.php', '', $total_records); ?>
  </td>
  <td align="right" class="fontButton" colspan="2">
    <table border="0">
     <tr>
	   <td align="right"><input type="button" name="new" id="new" style="width:50px;display:block;" value="new" onClick="ClickNew(<?php echo $CompanyId.', '.$UserId.', '.$YearId.', '.$_REQUEST['Y'].', '.$_REQUEST['page']; ?>)"></td>
	  <td align="right"><input type="button" name="back" id="back" style="width:50px;display:block;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"></td>
   </tr>
   </table>
  </td>
 </tr>
</table>
		
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************END*****END*****END******END******END***************************************************************?>
<?php //************************************************************************************************************************************************************?>
		
	  </td>
	</tr>
	
	<tr>
	  <td valign="top" align="center">
	    <table border="0" style="margin-top:0px;">
				<tr>
	              <td align="center"><img src="images/home1.png"></td>
				</tr>
	    </table>
	  </td>
	</tr>
	<tr>
	  <td valign="top">
	    <?php require_once("../footer.php"); ?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>
<?php
function check_integer($which) {
if(isset($_REQUEST[$which])){
if (intval($_REQUEST[$which])>0) {
return intval($_REQUEST[$which]);
} else {
return false;
}
}
return false;
}
function get_current_page() {
if(($var=check_integer('page'))) {
return $var;
} else {
//return 1, if it wasnt set before, page=1
return 1;
}
}
function doPages($page_size, $thepage, $query_string, $total=0) {
$index_limit = 5;
$query='';
if(strlen($query_string)>0){
$query = "&amp;".$query_string;
}
$current = get_current_page();
$total_pages=ceil($total/$page_size);
$start=max($current-intval($index_limit/2), 1);
$end=$start+$index_limit-1;
echo '<div class="paging">';
if($current==1) {
echo '<span class="prn"><font color="#FFFFFF">&lt; Previous</font></span>&nbsp;';
} else {
$i = $current-1;
echo '<a href="'.$thepage.'?page='.$i.$query.'&Y='.$_REQUEST['Y'].'" class="prn" rel="nofollow" title="go to page '.$i.'"><font color="#FFFFFF">&lt;Previous</font></a>&nbsp;';
echo '<span class="prn"><font color="#FFFFFF">...</font></span>&nbsp;';
}
if($start > 1) {
$i = 1;
echo '<a href="'.$thepage.'?page='.$i.$query.'&Y='.$_REQUEST['Y'].'" title="go to page '.$i.'"><font color="#FFFFFF">'.$i.'</font></a>&nbsp;';
}
for ($i = $start; $i <= $end && $i <= $total_pages; $i++){
if($i==$current) {
echo '<span><font color="#FFFFFF">'.$i.'</font></span>&nbsp;';
} else {
echo '<a href="'.$thepage.'?page='.$i.$query.'&Y='.$_REQUEST['Y'].'" title="go to page '.$i.'"><font color="#FFFFFF">'.$i.'</font></a>&nbsp;';
}
}
if($total_pages > $end){
$i = $total_pages;
echo '<a href="'.$thepage.'?page='.$i.$query.'&Y='.$_REQUEST['Y'].'" title="go to page '.$i.'"><font color="#FFFFFF">'.$i.'</font></a>&nbsp;';
}
if($current < $total_pages) {
$i = $current+1;
echo '<span class="prn"><font color="#FFFFFF">...</font></span>&nbsp;';
echo '<a href="'.$thepage.'?page='.$i.$query.'&Y='.$_REQUEST['Y'].'" class="prn" rel="nofollow" title="go to page '.$i.'"><font color="#FFFFFF">Next &gt;</font></a>&nbsp;';
} else {
echo '<span class="prn"><font color="#FFFFFF">Next &gt;</font></span>&nbsp;';
}
if ($total != 0){
//prints the total result count just below the paging
echo '&nbsp;&nbsp;&nbsp;&nbsp;<font color="#FFEEFF"<h4>(Total '.$total.' Records)</h></div>';
}
}
?>       