<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}
//**********************************************************************************************************************
if(isset($_POST['SaveNew']))
{ $SqlIns=mysql_query("INSERT INTO hrm_sales_revised_opnclose(YearId,Month,Quarter,Year,Status) VALUES(".$YearId.",".$_POST['Mv'].",".$_POST['Qv'].",".$_POST['Yv'].",'".$_POST['Sv']."')", $con); 
  if($SqlIns){$msg='Data inserted successfully!';}
}
if(isset($_POST['SaveEdit']))
{ $SqlUp=mysql_query("UPDATE hrm_sales_revised_opnclose SET Month=".$_POST['Mv'].",Quarter=".$_POST['Qv'].",Year=".$_POST['Yv'].",Status='".$_POST['Sv']."' WHERE RevsdOCId=".$_POST['RevsdOCId'], $con); if($SqlUp){$msg='Data updated successfully!';} }
if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
{ $SqlDel=mysql_query("delete from hrm_sales_revised_opnclose WHERE RevsdOCId=".$_REQUEST['did'], $con); if($SqlDel){$msg='Data deleted successfully!';} }
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<style> .font { color:#ffffff; font-family:Times New Roman; font-size:15px; width:200px;} .font1 { font-family:Times New Roman;font-size:12px; } 
.font2 { font-family:Times New Roman;font-size:14px;height:22px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; height:18px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<Script>
function edit(value) { var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "PlanRevisedMonth.php?ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&action=edit&eid="+value;  window.location=x;}}
function del(value) { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var x = "PlanRevisedMonth.php?ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&action=delete&did="+value;  window.location=x;}}
function newsave() { var x = "PlanRevisedMonth.php?ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&action=newsave";  window.location=x;}
</Script> 
</head>
<body class="body">
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table></td></tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
   <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
   <tr>
	<td valign="top"  width="100%" id="MainWindow" align="left"><br>
    <table border="0" style="margin-top:0px; width:100%; height:300px;">
    <tr>
    <td align="left" id="type" valign="top" style="display:block; width:50%" align="left">             
     <table border="0" width="600">
	 <tr><td class="heading">&nbsp;Revised Month &nbsp;&nbsp;<font color="#5CB900"><i><?php echo $msg; ?></i></font></td></tr>
	 <tr>
	 <td align="left" width="650">
	 <table border="1" width="650" border="1" bgcolor="#FFFFFF">
<tr bgcolor="#808000">
<?php /* <td class="font" align="center" style="width:50px;"><b>SNo</b></td> */ ?>
 <td class="font" align="center" style="width:120px;"><b>Financial Year</b></td>
 <td class="font" align="center" style="width:60px;"><b>Year</b></td>
 <td class="font" align="center" style="width:100px;"><b>Month</b></td>
 <td class="font" align="center" style="width:100px;"><b>Quarter</b></td>
 <td class="font" align="center" style="width:100px;"><b>Status</b></td>
 <td class="font" align="center" style="width:100px;"><b>Action</b></td>
</tr>
<?php if(isset($_REQUEST['action']) && $_REQUEST['action']=="newsave"){ ?>
<?php $syy=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$YearId,$con); $ryy=mysql_fetch_assoc($syy); ?>
<form name="formEdit" method="post" onSubmit="return validateEdit(this)">
<tr>
<?php /*  <td class="font2" align="center"><?php echo $SNo; ?></td> */ ?>
 <td class="font2" align="center"><?php echo date("Y",strtotime($ryy['FromDate'])).'-'.date("Y",strtotime($ryy['ToDate'])); ?></td>
 <td align="center">
 <select id="Yv" name="Yv" class="font2" style="width:60px;"><?php for($i=2015;$i<=2050;$i++){ ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?></select>
 </td> 
 <td align="center">
 <select id="Mv" name="Mv" class="font2" style="width:100px;"><?php for($j=1;$j<=12;$j++){ ?><option value="<?php echo $j; ?>"><?php if($j==1){echo 'January';}elseif($j==2){echo 'February';}elseif($j==3){echo 'March';}elseif($j==4){echo 'April';}elseif($j==5){echo 'May';}elseif($j==6){echo 'June';}elseif($j==7){echo 'July';}elseif($j==8){echo 'August';}elseif($j==9){echo 'September';}elseif($j==10){echo 'October';}elseif($j==11){echo 'November';}elseif($j==12){echo 'December';} ?></option><?php } ?></select>
 </td>
 <td align="center">
  <select id="Qv" name="Qv" class="font2" style="width:100px;"><?php for($k=1;$k<=4;$k++){ ?><option value="<?php echo $k; ?>"><?php if($k==1){echo 'Quarter - 01';}elseif($k==2){echo 'Quarter - 02';}if($k==3){echo 'Quarter - 03';}if($k==4){echo 'Quarter - 04';} ?></option><?php } ?></select>
 </td>
 <td align="center">
 <select id="Sv" name="Sv" class="font2" style="width:100px;"><option value="A">Active</option><option value="D">Deactive</option></select>
 </td>
 <td align="center" valign="middle"><input type="submit" name="SaveNew"  value="" class="SaveButton"></td>
</tr>
</form>
<tr><td bgcolor="#B6E9E2" colspan="6"></td></tr>
<?php } ?>

<?php $sql=mysql_query("select * from hrm_sales_revised_opnclose order by Year DESC, Month DESC, Quarter DESC", $con); while($res=mysql_fetch_array($sql)) {
if($res['Month']==1){$m='January';}elseif($res['Month']==2){$m='February';}elseif($res['Month']==3){$m='March';}elseif($res['Month']==4){$m='April';}elseif($res['Month']==5){$m='May';}elseif($res['Month']==6){$m='June';}elseif($res['Month']==7){$m='July';}elseif($res['Month']==8){$m='August';}elseif($res['Month']==9){$m='September';}elseif($res['Month']==10){$m='October';}elseif($res['Month']==11){$m='November';}elseif($res['Month']==12){$m='December';}
if($res['Quarter']==1){$q='Quarter - 01';}elseif($res['Quarter']==2){$q='Quarter - 02';}if($res['Quarter']==3){$q='Quarter - 03';}if($res['Quarter']==4){$q='Quarter - 04';} ?>

<?php $sy=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$res['YearId'],$con); $ry=mysql_fetch_assoc($sy); ?>
<?php if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$res['RevsdOCId']){ ?>
<form name="OformEdit" method="post" onSubmit="return OvalidateEdit(this)">	
<tr>
<?php /*  <td class="font2" align="center"><?php echo $SNo; ?></td> */ ?>
 <td class="font2" align="center"><?php echo date("Y",strtotime($ry['FromDate'])).'-'.date("Y",strtotime($ry['ToDate'])); ?></td> 
 <td align="center">
 <select id="Yv" name="Yv" class="font2" style="width:60px;"><option value="<?php echo $res['Year']; ?>" selected><?php echo $res['Year']; ?></option><?php for($i=2015;$i<=2050;$i++){ if($i!=$res['Year']){ ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } } ?></select>
 </td> 
 <td align="center">
 <select id="Mv" name="Mv" class="font2" style="width:100px;"><option value="<?php echo $res['Month']; ?>" selected><?php echo $m; ?></option><?php for($j=1;$j<=12;$j++){ if($j!=$res['Month']){ ?><option value="<?php echo $j; ?>"><?php if($j==1){echo 'January';}elseif($j==2){echo 'February';}elseif($j==3){echo 'March';}elseif($j==4){echo 'April';}elseif($j==5){echo 'May';}elseif($j==6){echo 'June';}elseif($j==7){echo 'July';}elseif($j==8){echo 'August';}elseif($j==9){echo 'September';}elseif($j==10){echo 'October';}elseif($j==11){echo 'November';}elseif($j==12){echo 'December';} ?></option><?php } } ?></select>
 </td>
 <td align="center">
  <select id="Qv" name="Qv" class="font2" style="width:100px;"><option value="<?php echo $res['Quarter']; ?>" selected><?php echo $q; ?></option><?php for($k=1;$k<=4;$k++){ if($k!=$res['Quarter']){ ?><option value="<?php echo $k; ?>"><?php if($k==1){echo 'Quarter - 01';}elseif($k==2){echo 'Quarter - 02';}if($k==3){echo 'Quarter - 03';}if($k==4){echo 'Quarter - 04';} ?></option><?php } } ?></select>
 </td>
 <td align="center">
 <select id="Sv" name="Sv" class="font2" style="width:100px;"><option value="<?php echo $res['Status']; ?>" selected><?php if($res['Status']=='A'){echo 'Active';}else{echo 'Deactive';} ?></option><option value="<?php if($res['Status']=='A'){echo 'D';}else{echo 'A';} ?>"><?php if($res['Status']=='A'){echo 'Deactive';}else{echo 'Active';} ?></option></select>
 </td>
 <td align="center" valign="middle" style="font:Georgia; font-size:11px;width:100px;" valign="top">
 <input type="submit" name="SaveEdit"  value="" class="SaveButton"><input type="hidden" name="RevsdOCId" id="RevsdOCId" value="<?php echo $_REQUEST['eid']; ?>"/></td>
</tr>
</form> 
<?php } else { ?>	 
<tr>
<?php /*  <td class="font2" align="center"><?php echo $SNo; ?></td> */ ?>
 <td class="font2" align="center"><?php echo date("Y",strtotime($ry['FromDate'])).'-'.date("Y",strtotime($ry['ToDate'])); ?></td> 
 <td class="font2" align="center"><?php echo $res['Year']; ?></td> 
 <td class="font2" align="center"><?php echo $m; ?></td>
 <td class="font2" align="center"><?php echo $q; ?></td>
 <td class="font2" align="center"><?php if($res['Status']=='A'){echo 'Active';}else{echo 'Dective';} ?></td>
 <td class="font2" align="center" valign="middle"><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $res['RevsdOCId']; ?>)"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="del(<?php echo $res['RevsdOCId']; ?>)"></a></td>
</tr>
<?php } $SNo++;} ?>
<tr>
 <td colspan="6" align="right" class="fontButton">
<input type="button" name="NewSave" id="NewSave" value="new" onClick="newsave()" <?php if($_REQUEST['action']=="newsave" OR $_REQUEST['action']=="edit"){ echo "style=display:none;"; }?>/>
<input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
<input type="button" name="Refrash" value="refresh" onClick="javascript:window.location='PlanRevisedMonth.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq'"/>&nbsp;
     </td>
</tr>
	  </table>
	 </td>
    </tr>
  </table>  
</td>
</tr>
</table>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>
