<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
if($_SESSION['login'] = true){require_once('PhpFile/CityClassificationP.php'); } else {$msg= "Session Expiry..............."; }
?>
<?php 
if(isset($_POST['SaveNew']))
{ 
   $SqlInseart = mysql_query("INSERT INTO hrm_employee_assestbill(AccNo, MobileNo, EC, User, Oprator, Dept, State, Plan, TotPlanValue, BillPeriod, BillGenerationDate, LastDateBillpayment, LimitValue, BillPwd, EmailId, EmpDeclStatus, ActivationDate, OldUser, HandoverDate, CompanyId, Any1, CreatedBy, CreatedDate, YearId) VALUES('".$_POST['ACN']."', '".$_POST['MN']."', '".$_POST['EC']."', '".$_POST['CU']."', '".$_POST['Opter']."', '".$_POST['Dept']."', '".$_POST['State']."', '".$_POST['Plan']."', '".$_POST['PV']."', '".$_POST['BP']."', '".$_POST['BGD']."', '".$_POST['LBP']."', '".$_POST['Limit']."', '".$_POST['BPwd']."', '".$_POST['Email']."', '".$_POST['EDS']."', '".date("Y-m-d", strtotime($_POST['AD']))."', '".$_POST['OU']."', '".date("Y-m-d", strtotime($_POST['HOD']))."', ".$CompanyId.", '".$_POST['Any1']."', ".$UserId.", '".date('Y-m-d')."', '".$YearId."')", $con); 
   if($SqlInseart){ $msg = "Data has been Inserted successfully..."; }
}
if(isset($_POST['SaveEdit']))
{
	 $SqlUpdate = mysql_query("UPDATE hrm_employee_assestbill SET AccNo='".$_POST['ACN']."', MobileNo='".$_POST['MN']."', EC='".$_POST['EC']."', User='".$_POST['CU']."', Oprator='".$_POST['Opter']."', Dept='".$_POST['Dept']."', State='".$_POST['State']."', Plan='".$_POST['Plan']."', TotPlanValue='".$_POST['PV']."', BillPeriod='".$_POST['BP']."', BillGenerationDate='".$_POST['BGD']."', LastDateBillpayment='".$_POST['LBP']."', LimitValue='".$_POST['Limit']."', BillPwd='".$_POST['BPwd']."', EmailId='".$_POST['Email']."', EmpDeclStatus='".$_POST['EDS']."', ActivationDate='".date("Y-m-d", strtotime($_POST['AD']))."', OldUser='".$_POST['OU']."', HandoverDate='".date("Y-m-d", strtotime($_POST['HOD']))."', Any1='".$_POST['Any1']."', CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."', YearId=".$YearId." WHERE EmpAssestBillId=".$_POST['EmpAssestBillId'], $con) or die(mysql_error());
     if($SqlUpdate){ $msg = "Data has been Updeted successfully...";} 
}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .head{ font:Times New Roman; color:#FFFFFF; font-size:11px; } .row { font:Times New Roman; color:#000000; font-size:11px;  } 
.font2 { font-size:11px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.ES { font-family:Georgia; font-size:11px; height:18px;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/MandatoryAjaxCall.js"></script>
<Script type="text/javascript">window.history.forward(1);
function edit(value) { var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "EmpAssBill.php?action=edit&eid="+value;  window.location=x;}}
function del(value) { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var x = "EmpAssBill.php?action=delete&did="+value;  window.location=x;}}
function newsave() { var x = "EmpAssBill.php?action=newsave";  window.location=x;}
</SCRIPT> 
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
	  
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td align="right" width="100" class="heading">Assest Bill</td>
	  <td align="left">
	    <b><span id="Vtype" class="span">: -&nbsp;Assest Bill</span></b>
	  </td>
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>	
 <tr>
 <td>&nbsp;</td>
<?php //*********************************************** Open Department******************************************************?> 
<td align="left" id="type" valign="top" style="display:block; width:100%">             
  <form  name="formCityC" method="post" onSubmit="return validate(this)">
   <table border="0" width="2500">
   
<tr>
  <td align="left" width="2500">
	 <table border="1" width="2500" border="1" bgcolor="#FFFFFF">
	 <tr bgcolor="#7a6189">
	   <td class="head" style="width:50px;" valign="top" align="center" ><b>SNo</b></td>
	   <td class="head" style="width:80px;" valign="top" align="center"><b>A/C No</b></td>
	   <td class="head" style="width:60px;" valign="top" align="center"><b>EmpCode</b></td>
	   <td class="head" style="width:80px;" valign="top" align="center"><b>Mobile No</b></td>
	   <td class="head" style="width:200px;" valign="top" align="center"><b>Current User</b></td>
	   <td class="head" style="width:100px;" valign="top" align="center"><b>Oprator</b></td>
	   <td class="head" style="width:100px;" valign="top" align="center"><b>Department</b></td>
	   <td class="head" style="width:60px;" valign="top" align="center"><b>State</b></td>
	   <td class="head" style="width:300px;" valign="top" align="center"><b>Plan</b></td>
	   <td class="head" style="width:80px;" valign="top" align="center"><b>Plan Value</b></td>
	   <td class="head" style="width:150px;" valign="top" align="center"><b>Bill Period</b></td>
	   <td class="head" style="width:100px;" valign="top" align="center"><b>Bill Generation Date</b></td>
	   <td class="head" style="width:100px;" valign="top" align="center"><b>LastDate Bill Payment</b></td>
	   <td class="head" style="width:80px;" valign="top" align="center"><b>Limit</b></td>
	   <td class="head" style="width:100px;" valign="top" align="center"><b>Bill PWD</b></td>
	   <td class="head" style="width:150px;" valign="top" align="center"><b>EmailID</b></td>
	   <td class="head" style="width:50px;" valign="top" align="center"><b>Emp Decl</b></td>
	   <td class="head" style="width:80px;" valign="top" align="center"><b>Activation Date</b></td>
	   <td class="head" style="width:100px;" valign="top" align="center"><b>Old User</b></td>
	   <td class="head" style="width:80px;" valign="top" align="center"><b>HandOver Date</b></td>
	   <td class="head" style="width:100px;" valign="top" align="center"><b>Remark</b></td>
	   <td class="head" style="width:50px;" valign="top" align="center"><b>Action</b></td>
	 </tr>
<?php 
$sql_statement = mysql_query("select * from hrm_employee_assestbill where CompanyId=".$CompanyId." order by user ASC", $con);
$total_records = mysql_num_rows($sql_statement);
if(isset($_GET['page'])) $page = $_GET['page']; else $page = 1;  
$offset = 15; 
if ($page){ $from = ($page * $offset) - $offset; }else{ $from = 0;}

$p=$_REQUEST['page']; $q=$p-1; if($p==1 OR $p==''){$SNo=1;}else{$SNo=($q*$offset)+1;}
$sql_statement = mysql_query("select * from hrm_employee_assestbill where CompanyId=".$CompanyId." order by user ASC LIMIT " . $from . "," . $offset, $con);
while($res=mysql_fetch_array($sql_statement)) {
if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$res['EmpAssestBillId']){ ?>
	  <form name="formEdit" method="post" onSubmit="return validateEdit(this)">	
   <tr bgcolor="<?php if($SNo%2==0){echo '#D0C7E0';}else{echo '#FFFFFF';} ?>">
<td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $SNo; ?></td>
<td class="row" align="center" valign="top"><input name="ACN" id="ACN" class="ES" style="width:78px; " value="<?php echo $res['AccNo']; ?>" /></td>
<td class="row" align="center" valign="top"><input name="EC" id="EC" class="ES" style="width:58px; " value="<?php echo $res['EC']; ?>" /></td>
<td class="row" align="center" valign="top"><input name="MN" id="MN" class="ES" style="width:78px; " value="<?php echo $res['MobileNo']; ?>" /></td>
<td class="row" align="center" valign="top"><input name="CU" id="CU" class="ES" style="width:198px; " value="<?php echo strtoupper($res['User']); ?>" /></td>
<td class="row" align="center" valign="top"><input name="Opter" id="Opter" class="ES" style="width:98px; " value="<?php echo $res['Oprator']; ?>" /></td>
<td class="row" align="center" valign="top"><input name="Dept" id="Dept" class="ES" style="width:98px; " value="<?php echo $res['Dept']; ?>" /></td>
<td class="row" align="center" valign="top"><input name="State" id="State" class="ES" style="width:58px; " value="<?php echo $res['State']; ?>" /></td>
<td class="row" align="center" valign="top"><input name="Plan" id="Plan" class="ES" style="width:298px; " value="<?php echo $res['Plan']; ?>" /></td>
<td class="row" align="center" valign="top"><input name="PV" id="PV" class="ES" style="width:78px; " value="<?php echo $res['TotPlanValue']; ?>" /></td>
<td class="row" align="center" valign="top"><input name="BP" id="BP" class="ES" style="width:148px; " value="<?php echo $res['BillPeriod']; ?>" /></td>
<td class="row" align="center" valign="top"><input name="BGD" id="BGD" class="ES" style="width:98px; " value="<?php echo $res['BillGenerationDate']; ?>" /></td>
<td class="row" align="center" valign="top"><input name="LBP" id="LBP" class="ES" style="width:98px; " value="<?php echo $res['LastDateBillpayment']; ?>" /></td>
<td class="row" align="center" valign="top"><input name="Limit" id="Limit" class="ES" style="width:98px; " value="<?php echo $res['Limit']; ?>" /></td>
<td class="row" align="center" valign="top"><input name="BPwd" id="BPwd" class="ES" style="width:98px; " value="<?php echo $res['BillPwd']; ?>" /></td>
<td class="row" align="center" valign="top"><input name="Email" id="Email" class="ES" style="width:148px; " value="<?php echo $res['EmailId']; ?>" /></td>
<td class="row" align="center" valign="top"><input name="EDS" id="EDS" class="ES" style="width:48px; " value="<?php echo $res['EmpDeclStatus']; ?>" /></td>
<td class="row" align="center" valign="top"><input name="AD" id="AD" class="AD" style="width:98px; " value="<?php echo date("d-M-y", strtotime($res['ActivationDate'])); ?>" /></td>
<td class="row" align="center" valign="top"><input name="OU" id="OU" class="ES" style="width:98px; " value="<?php echo $res['OldUser']; ?>" /></td>
<td class="row" align="center" valign="top" ><input name="HOD" id="HOD" class="ES" style="width:98px; " value="<?php echo date("d-M-y", strtotime($res['HandoverDate'])); ?>" /></td>
<td class="row" align="center" valign="top"><input name="Any1" id="Any1" class="ES" style="width:100px; " value="<?php echo $res['Any1']; ?>" /></td>
<td class="row" align="center" valign="top" style="width:50px;"><input type="submit" name="SaveEdit"  value="" class="SaveButton"><input type="hidden" name="EmpAssestBillId" id="EmpAssestBillId" value="<?php echo $_REQUEST['eid']; ?>"/></td>
   </tr>
	 </form>
	 
<?php } else { ?>	 
	  <tr bgcolor="<?php if($SNo%2==0){echo '#D0C7E0';}else{echo '#FFFFFF';} ?>">
<td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $SNo; ?></td>
<td class="row" align="center" valign="top"><?php if($res['AccNo']==''){echo '&nbsp;';}else{echo $res['AccNo']; } ?></td>
<td class="row" align="center" valign="top"><?php if($res['EC']==''){echo '&nbsp;';}else{echo $res['EC'];  }?></td>
<td class="row" align="center" valign="top"><?php if($res['MobileNo']==''){echo '&nbsp;';}else{echo $res['MobileNo']; }?></td>
<td class="row" align="" valign="top"><?php if($res['User']==''){echo '&nbsp;';}else{echo strtoupper($res['User']); }?></td>
<td class="row" align="" valign="top"><?php if($res['Oprator']==''){echo '&nbsp;';}else{echo $res['Oprator']; }?></td>
<td class="row" align="" valign="top"><?php if($res['Dept']==''){echo '&nbsp;';}else{echo $res['Dept']; }?></td>
<td class="row" align="" valign="top"><?php if($res['State']==''){echo '&nbsp;';}else{echo $res['State']; }?></td>
<td class="row" align="" valign="top"><?php if($res['Plan']==''){echo '&nbsp;';}else{echo $res['Plan']; }?></td>
<td class="row" align="center" valign="top"><?php if($res['TotPlanValue']==''){echo '&nbsp;';}else{echo $res['TotPlanValue']; }?></td>
<td class="row" align="" valign="top"><?php if($res['BillPeriod']==''){echo '&nbsp;';}else{echo $res['BillPeriod']; }?></td>
<td class="row" align="" valign="top"><?php if($res['BillGenerationDate']==''){echo '&nbsp;';}else{echo $res['BillGenerationDate']; }?></td>
<td class="row" align="" valign="top"><?php if($res['LastDateBillpayment']==''){echo '&nbsp;';}else{echo $res['LastDateBillpayment'];} ?></td>
<td class="row" align="center" valign="top"><?php if($res['Limi']==''){echo '&nbsp;';}else{echo $res['Limit']; }?></td>
<td class="row" align="" valign="top"><?php if($res['BillPwd']==''){echo '&nbsp;';}else{echo $res['BillPwd']; }?></td>
<td class="row" align="" valign="top"><?php if($res['EmailId']==''){echo '&nbsp;';}else{echo $res['EmailId']; }?></td>
<td class="row" align="center" valign="top"><?php if($res['EmpDeclStatus']==''){echo '&nbsp;';}else{echo $res['EmpDeclStatus']; }?></td>
<td class="row" align="center" valign="top"><?php if($res['ActivationDate']==''){echo '&nbsp;';}else{echo date("d-M-y", strtotime($res['ActivationDate'])); }?></td>
<td class="row" align="" valign="top"><?php if($res['OldUser']==''){echo '&nbsp;';}else{echo $res['OldUser']; }?></td>
<td class="row" align="center" valign="top"><?php if($res['HandoverDate']==''){echo '&nbsp;';}else{echo date("d-M-y", strtotime($res['HandoverDate'])); }?></td>
<td class="row" align="" valign="top"><?php if($res['Any1']==''){echo '&nbsp;';}else{echo $res['Any1']; }?></td>
<td align="center" valign="middle" style="font:Georgia; font-size:11px; width:50px;">
<a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $res['EmpAssestBillId']; ?>)"></a>
<?php /*&nbsp;&nbsp;<a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="del(<?php echo $res['EmpAssestBillId']; ?>)"></a> */ ?></td>
   </tr>
<?php } $SNo++;} ?>
	 <tr><td bgcolor="#B6E9E2" colspan="20"></td></tr>
	 <?php if(isset($_REQUEST['action']) && $_REQUEST['action']=="newsave"){ ?>
	 <form name="formNew" method="post" onSubmit="return validateNew(this)">
	 <tr bgcolor="<?php if($SNo%2==0){echo '#D0C7E0';}else{echo '#FFFFFF';} ?>">
<td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $SNo; ?></td>
<td class="row" align="center" valign="top"><input name="ACN" id="ACN" class="ES" style="width:78px; " value="" /></td>
<td class="row" align="center" valign="top"><input name="EC" id="EC" class="ES" style="width:58px; " value="" /></td>
<td class="row" align="center" valign="top"><input name="MN" id="MN" class="ES" style="width:78px; " value="" /></td>
<td class="row" align="center" valign="top"><input name="CU" id="CU" class="ES" style="width:198px; " value="" /></td>
<td class="row" align="center" valign="top"><input name="Opter" id="Opter" class="ES" style="width:98px; " value="" /></td>
<td class="row" align="center" valign="top"><input name="Dept" id="Dept" class="ES" style="width:98px; " value="" /></td>
<td class="row" align="center" valign="top"><input name="State" id="State" class="ES" style="width:58px; " value="" /></td>
<td class="row" align="center" valign="top"><input name="Plan" id="Plan" class="ES" style="width:298px; " value="" /></td>
<td class="row" align="center" valign="top"><input name="PV" id="PV" class="ES" style="width:78px; " value="" /></td>
<td class="row" align="center" valign="top"><input name="BP" id="BP" class="ES" style="width:148px; " value="" /></td>
<td class="row" align="center" valign="top"><input name="BGD" id="BGD" class="ES" style="width:98px; " value="" /></td>
<td class="row" align="center" valign="top"><input name="LBP" id="LBP" class="ES" style="width:98px; " value="" /></td>
<td class="row" align="center" valign="top"><input name="Limit" id="Limit" class="ES" style="width:98px; " value="" /></td>
<td class="row" align="center" valign="top"><input name="BPwd" id="BPwd" class="ES" style="width:98px; " value="" /></td>
<td class="row" align="center" valign="top"><input name="Email" id="Email" class="ES" style="width:148px; " value="" /></td>
<td class="row" align="center" valign="top"><input name="EDS" id="EDS" class="ES" style="width:48px; " value="" /></td>
<td class="row" align="center" valign="top"><input name="AD" id="AD" class="AD" style="width:78px; " value="" /></td>
<td class="row" align="center" valign="top"><input name="OU" id="OU" class="ES" style="width:98px; " value="" /></td>
<td class="row" align="center" valign="top"><input name="HOD" id="HOD" class="ES" style="width:78px; " value="" /></td>
<td class="row" align="center" valign="top"><input name="Any1" id="Any1" class="ES" style="width:100px; " value="" /></td>
<td align="center" valign="middle" style="font:Georgia; font-size:11px; width:50px;">&nbsp;<input type="submit" name="SaveNew"  value="" class="SaveButton">&nbsp;</td>
	 </tr>
	 </form>
	 <?php } ?>
		 
		
	 </table>
  </td>
</tr>
	  
   <tr>
      <td align="Right" class="fontButton"><table border="0" width="550">
		<tr>
		<td align="right">
		<input type="button" name="NewSave" id="NewSave" value="new" onClick="newsave()" <?php if($_REQUEST['action']=="newsave" OR $_REQUEST['action']=="edit"){ echo "style=display:none;"; }?>/>
		<input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
				  <input type="button" name="Refrash" value="refresh" onclick="javascript:window.location='EmpAssBill.php'"/>&nbsp;
			     </td>
		</tr></table>
      </td>
   </tr>
   <tr>
<td align="" style="font-family:Times New Roman; font-size:15px; font-weight:bold;">
<?PHP doPages($offset, 'EmpAssBill.php', '', $total_records); ?>
</td>
</tr>	 
  </table>
 </form>     
</td>
<?php //*********************************************** Close Department******************************************************?>    
 </tr>
<?php } ?> 
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

