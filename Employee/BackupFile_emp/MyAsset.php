<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');} 
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<style>.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function FunClickAsset(Aei,ID)
{ window.open("MyAssetEmpAnyField.php?CheckAct=ExtraField&ID="+ID+"&Aei="+Aei,"AForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=550,height=250"); }
</script>
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px; ">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	 <tr>
	  <td valign="top">
	     <table border="0" style="height:350px; float:none;" cellpadding="0">
		  <tr>
		   <td valign="top"> 
<?php //*************************************************************************************************************************************************** ?>	   
<table border="0" id="Activity">
<tr>
 <td id="Anni" valign="top">
	<table border="0">
		<tr height="20">
		 <td align="left" valign="top" style="width:width:105px;">
<?php include("EmpImgEmp.php"); ?></td>
		 <td>&nbsp;</td>
		 </tr>
	 </table>
 </td>	 
<td valign="top">
  <table border="0">
	<tr><td colspan="4" style="font-family:Times New Roman; color:#620000; font-size:17px;width:400px;" align="center"><b><u>My Asset</u></b></td></tr>
	<tr>
	<td colspan="4">
	<table border="0">
<?php $sql_statement = mysql_query("select hrm_asset_employee.* from hrm_asset_employee INNER JOIN hrm_asset_name ON hrm_asset_employee.AssetNId=hrm_asset_name.AssetNId where hrm_asset_employee.EmployeeID=".$EmployeeId." AND hrm_asset_name.ShowInEmp='Y' order by AAllocate DESC", $con);
$total_records = mysql_num_rows($sql_statement);
if(isset($_GET['page'])) $page = $_GET['page']; else $page = 1;  
$offset = 10; 
if ($page){ $from = ($page * $offset) - $offset; }else{ $from = 0;}
$sql_statement = mysql_query("select hrm_asset_employee.* from hrm_asset_employee INNER JOIN hrm_asset_name ON hrm_asset_employee.AssetNId=hrm_asset_name.AssetNId where hrm_asset_employee.EmployeeID=".$EmployeeId." AND hrm_asset_name.ShowInEmp='Y' order by AAllocate DESC LIMIT " . $from . "," . $offset, $con);
?>	  
   <tr>
    <td colspan="2" align="center" id="QueryStatusTD" style="margin-left:0px;" valign="top">
	<table border="1">
	  <tr bgcolor="#7a6189" style="height:22px;">
  <td style="width:50px;font-size:12px;font-family:Times New Roman;color:#FFFFFF;" align="center"><b>SNo.</b></td>
  <td style="width:150px;font-size:12px;font-family:Times New Roman;color:#FFFFFF;" align="center"><b>Type Of Asset</b></td>
  <td style="width:100px;font-size:12px;font-family:Times New Roman;color:#FFFFFF;" align="center"><b>Assest ID</b></td>
  <td style="width:150px;font-size:12px;font-family:Times New Roman;color:#FFFFFF;" align="center"><b>Company</b></td>
  <td style="width:100px;font-size:12px;font-family:Times New Roman;color:#FFFFFF;" align="center"><b>Model Name</b></td>
  <td style="width:150px;font-size:12px;font-family:Times New Roman;color:#FFFFFF;" align="center"><b>Serial No</b></td>
  <td style="width:60px;font-size:12px;font-family:Times New Roman;color:#FFFFFF;" align="center"><b>Details</b></td>
  <td style="width:80px;font-size:12px;font-family:Times New Roman;color:#FFFFFF;" align="center"><b>Allocated</b></td>
  <td style="width:80px;font-size:12px;font-family:Times New Roman;color:#FFFFFF;" align="center"><b>Returned</b></td>
</tr>	
<?php if($total_records>0){ if($_REQUEST['page']==1){$Sn=1;} elseif($_REQUEST['page']==2){$Sn=11;} elseif($_REQUEST['page']==3){$Sn=21;}
	  elseif($_REQUEST['page']==4){$Sn=31;}elseif($_REQUEST['page']==5){$Sn=41;} elseif($_REQUEST['page']==6){$Sn=51;} 
	  elseif($_REQUEST['page']==7){$Sn=61;}elseif($_REQUEST['page']==8){$Sn=71;} elseif($_REQUEST['page']==9){$Sn=81;} 
	  elseif($_REQUEST['page']==10){$Sn=91;}else{$Sn=1;} while($res=mysql_fetch_array($sql_statement)){ ?>
<tr bgcolor="#FFFFFF">
<td align="center" style="font-size:12px; font-family:Times New Roman;"><?php echo $Sn; ?></td>
<td style="font-size:12px; font-family:Times New Roman;"><?php if($res['AssetNId']!=''){ $sqlAn=mysql_query("select AssetName from hrm_asset_name where AssetNId=".$res['AssetNId']); $resAn=mysql_fetch_array($sqlAn); echo $resAn['AssetName']; } else {echo '';} ?></td>
<td style="font-size:12px;font-family:Times New Roman;"><?php echo $res['AssetId']; ?></td>
<td style="font-size:12px;font-family:Times New Roman;"><?php echo $res['AComName']; ?></td>
<td style="font-size:12px;font-family:Times New Roman;"><?php echo $res['AModelName']; ?></td>
<td style="font-size:12px;font-family:Times New Roman;"><?php echo $res['ASrn']; ?></td>
<td align="center" style="font-size:12px; font-family:Times New Roman;"><a href="#" onClick="FunClickAsset(<?php echo $res['AssetEmpId'].','.$EmployeeId; ?>)">Click</a></td>
<td align="center" style="font-size:12px; font-family:Times New Roman;"><?php if($res['AAllocate']=='0000-00-00' OR $res['AAllocate']=='1970-01-01'){echo '';} else {echo date("d-m-Y",strtotime($res['AAllocate']));} ?></td>
<td align="center" style="font-size:12px; font-family:Times New Roman;"><?php if($res['ADeAllocate']=='0000-00-00' OR $res['ADeAllocate']=='1970-01-01'){echo '';} else {echo date("d-m-Y",strtotime($res['ADeAllocate']));} ?></td>
</tr>
<?php $Sn++;} } if($total_records==0) { ?>
      <tr>
	   <td colspan="11" style="font:Times New Roman; color:#D56A00; font-size:12px; width:50px;"><b>Empty....</b></td>
	  </tr>
<?php } ?>					 			 			 
	</table>
	</td>
  </tr>
<tr>
<td align="center" style="font-family:Times New Roman; font-size:15px; font-weight:bold;" colspan="2">
<?PHP doPages($offset, 'AskQuery.php', '', $total_records); ?>
</td>
</tr>
<?php /*				
<tr>
 <td style="font-family:Times New Roman;font-size:14px;" colspan="2">
   <b>Note:</b>&nbsp;Kindly rate the closed queries as per your satisfaction levels on the overall query resolution process. When you shall consider the parameters:-&nbsp;(<b>1</b> Being not satisfied, <b>5</b> for highly satisfied)
 </td>
</tr>	
*/ ?>		   
  </table>
	
	</td></tr>

</table>
</td>
</tr>
</table>
	
<?php //*************************************************************************************************************************************************** ?>
		   </td>
		  </tr>
		</table>
	  </td>
	</tr>
	<tr style="height:50px; "><td>&nbsp;</td></tr>
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
$index_limit = 4;
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
echo '<span class="prn">&lt; Previous</span>&nbsp;';
} else {
$i = $current-1;
echo '<a href="'.$thepage.'?page='.$i.$query.'" class="prn" rel="nofollow" title="go to page '.$i.'">&lt; Previous</a>&nbsp;';
echo '<span class="prn">...</span>&nbsp;';
}
if($start > 1) {
$i = 1;
echo '<a href="'.$thepage.'?page='.$i.$query.'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
for ($i = $start; $i <= $end && $i <= $total_pages; $i++){
if($i==$current) {
echo '<span>'.$i.'</span>&nbsp;';
} else {
echo '<a href="'.$thepage.'?page='.$i.$query.'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
}
if($total_pages > $end){
$i = $total_pages;
echo '<a href="'.$thepage.'?page='.$i.$query.'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
if($current < $total_pages) {
$i = $current+1;
echo '<span class="prn">...</span>&nbsp;';
echo '<a href="'.$thepage.'?page='.$i.$query.'" class="prn" rel="nofollow" title="go to page '.$i.'">Next &gt;</a>&nbsp;';
} else {
echo '<span class="prn">Next &gt;</span>&nbsp;';
}
if ($total != 0){
//prints the total result count just below the paging
echo '&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ee4545"<h4>(Total '.$total.' Records)</h4></font></div>';
}
}
?>



