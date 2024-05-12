<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//**********************************************************************************
if(isset($_POST['SaveNew']))
{  
 $sqCheck=mysql_query("select * from hrm_pms_vertical_increment where VerticalId=".$_POST['VerticalId']." AND Min_GradeId=".$_POST['Min_GradeId']." AND Max_GradeId=".$_POST['Max_GradeId']."",$con); $rowCheck=mysql_num_rows($sqCheck);
 
 if($rowCheck==0)
 {
 $SqlInseart = mysql_query("INSERT INTO hrm_pms_vertical_increment(DepId, VerticalId, Min_GradeId, Max_GradeId, Min_Ctc, Max_Ctc, ComId, crby, crdate) VALUES('".$_POST['DepId']."', '".$_POST['VerticalId']."', '".$_POST['Min_GradeId']."', '".$_POST['Max_GradeId']."', '".$_POST['Min_Ctc']."', '".$_POST['Max_Ctc']."', ".$CompanyId.", ".$UserId.", '".date('Y-m-d')."')", $con);  
 if($SqlInseart){ $msg = "Data has been Inserted successfully..."; }
 }
 else
 {
   echo '<script>alert("Same vertical with Grade value allready exist");</script>'; 
 }
}

if(isset($_POST['SaveEdit']))
{ 
 $sqCheck=mysql_query("select * from hrm_pms_vertical_increment where VerticalId=".$_POST['VerticalId']." AND Min_GradeId=".$_POST['Min_GradeId']." AND Max_GradeId=".$_POST['Max_GradeId']." AND Min_Ctc='".$_POST['Min_Ctc']."' AND Max_Ctc='".$_POST['Max_Ctc']."'",$con); $rowCheck=mysql_num_rows($sqCheck);
 
 if($rowCheck==0)
 {
 $SqlUpdate = mysql_query("UPDATE hrm_pms_vertical_increment SET DepId='".$_POST['DepId']."', VerticalId='".$_POST['VerticalId']."', Min_GradeId='".$_POST['Min_GradeId']."', Max_GradeId='".$_POST['Max_GradeId']."', Min_Ctc='".$_POST['Min_Ctc']."', Max_Ctc='".$_POST['Max_Ctc']."', crby=".$UserId.", crdate='".date("Y-m-d")."' WHERE VerIncId=".$_POST['VerIncId'], $con) or die(mysql_error());  
 if($SqlUpdate){$msg="Data has been Updeted successfully...";}
 }
 else
 {
   echo '<script>alert("Same vertical with Grade value allready exist");</script>'; 
 }
}

?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> 
.th{ font-family:Times New Roman;font-size:14px;height:25px;text-align:center;color:#FFFFFF;font-weight:bold; }
.tdl{ font-family:Times New Roman;font-size:14px;text-align:left; }
.tdc{ font-family:Times New Roman;font-size:14px;text-align:center; }
.tdr{ font-family:Times New Roman;font-size:14px;text-align:right; }
.thh{ font-family:Times New Roman;font-size:12px;height:25px;text-align:center;color:#FFFFFF;font-weight:bold; }
.tdll{ font-family:Times New Roman;font-size:12px;text-align:left; }
.tdcc{ font-family:Times New Roman;font-size:12px;text-align:center; }
.tdinput{ font-family:Arial;font-size:14px;text-align:center;width:100%; border:hidden; }
.tdinputl{ font-family:Arial;font-size:14px;text-align:left;width:100%; border:hidden; }
.tdsel{ font-family:Times New Roman;font-size:14px;text-align:left;}
.inner_table{height:500px;overflow-y:auto;width:auto;}
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Arial; font-size:11px; width:120px; height:18px;}
.EditInput { font-family:Arial; font-size:12px; width:100px; height:20px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>

<Script>
function SelectDept(v)
{window.location='MinMaxVertical.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&d='+v+'&ed=4';}

function edit(value,ed) { var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "MinMaxVertical.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&action=edit&eid="+value+"&d="+ed;  window.location=x;}}
function newsave(ed) { var x = "MinMaxVertical.php?action=newsave&act=checkdept&d=23&rr=false&rr=98&ff=23&dd=3&&d="+ed;  
window.location=x;}

function validateEdit(formEdit){
  var Min_GradeId = formEdit.Min_GradeId.value;  var Max_GradeId = formEdit.Max_GradeId.value;
  var Min_Ctc = parseFloat(formEdit.Min_Ctc.value);  var Max_Ctc = parseFloat(formEdit.Max_Ctc.value);
 
  //if(Max_GradeId<=Min_GradeId) { alert("Maximum grade value more then minimum grade value.");  return false; } 
  if(Min_Ctc.length === 0) { alert("Please enter minimum CTC value.");  return false; }
  if(Max_Ctc.length === 0) { alert("Please enter maximum CTC value.");  return false; } 
  if(Max_Ctc<=Min_Ctc) { alert("Maximum CTC value more then minimum CTC value.");  return false; }
  if(test_bool4==false) { alert('Please enter only alphabets in the category name Field');  return false; } 
}                          
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
<?php //************************************************************************************?>
<?php //****************START*****START*****START******START******START*************************?>
<?php //*****************************************************************************?>

<table style="width:100%;">
<tr>
 <td style="width:60%;vertical-align:top;">
<!-- 111111111111111111111111111111111111111111111111111111111 Open -->
<!-- 111111111111111111111111111111111111111111111111111111111 Open -->
<table border="0" style="margin-top:0px;width:100%;">
<?php if($_SESSION['login'] = true){ ?>	
 <tr>
  <td style="width:2px;">&nbsp;</td>
  <td width="400" class="heading"><u>Setting Vertical Minimun/ Maximum:</u></td>    
  <td class="td1" style="font-size:14px;width:210px;font-family:Times New Roman;" >&nbsp;
	<select class="tdsel" style="background-color:#DDFFBB;width:200px;" name="DeptId" id="DeptId" onChange="SelectDept(this.value)"><?php $sD=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName asc", $con); while($rD=mysql_fetch_assoc($sD)){ ?><option value="<?php echo $rD['DepartmentId'];?>" <?php if($_REQUEST['d']==$rD['DepartmentId']){echo 'selected';} ?>><?php echo strtoupper($rD['DepartmentName']); ?></option><?php }?></select></td>
  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
 </tr>
  
<tr>
<td colspan="5" align="left" id="type" valign="top">             
 <table border="0" width="80%">
  <tr>
   <td align="left" width="100%">
<table border="1" width="100%" bgcolor="#FFFFFF" cellspacing="1">
 <tr bgcolor="#7a6189" style="height:25px;">
  <td class="th" style="width:5%;"><b>Sn</b></td>
  <td class="th" style="width:20%;"><b>Department</b></td>
  <td class="th" style="width:30%;"><b>Vertical Name</b></td>
  <td class="th" style="width:10%;"><b>Min. Grade</b></td>
  <td class="th" style="width:10%;"><b>Max. Grade</b></td>
  <td class="th" style="width:10%;"><b>Min. CTC</b></td>
  <td class="th" style="width:10%;"><b>Max. CTC</b></td>
  <td class="th" style="width:5%;"><b>Action</b></td>
 </tr>
<?php $sqlRat=mysql_query("select a.*,b.VerticalName,c.DepartmentName from hrm_pms_vertical_increment a inner join hrm_department_vertical b on a.VerticalId=b.VerticalId inner join hrm_department c on a.DepId=c.DepartmentId where a.ComId=".$CompanyId." AND a.DepId=".$_REQUEST['d']." order by b.VerticalName ASC, a.Min_GradeId ASC", $con); $SNo=1; while($resRat=mysql_fetch_array($sqlRat)) {

$sqlG1=mysql_query("select GradeValue from hrm_grade where GradeId=".$resRat['Min_GradeId']);
$sqlG2=mysql_query("select GradeValue from hrm_grade where GradeId=".$resRat['Max_GradeId']);
$resG1=mysql_fetch_assoc($sqlG1); $resG2=mysql_fetch_assoc($sqlG2);

  if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$resRat['VerIncId']){ ?>
<form name="formEdit" method="post" onSubmit="return validateEdit(this)">	
<input type="hidden" id="DepId" name="DepId" value="<?php echo $_REQUEST['d']; ?>" /> 
 
 <tr style="height:24px;">
  <td class="tdc"><?php echo $SNo; ?></td>
  <td class="tdl"><?php echo $resRat['DepartmentName'];?></td>
  <td class="tdl"><select name="VerticalId" id="VerticalId" class="tdinput" style="width:99%;">
  <?php $sqlV=mysql_query("select * from hrm_department_vertical where ComId=".$CompanyId." AND DeptId=".$_REQUEST['d']." order by VerticalName ASC", $con); while($resV=mysql_fetch_array($sqlV)){ ?>
  <option value="<?php echo $resV['VerticalId'];?>" <?php if($resRat['VerticalId']==$resV['VerticalId']){echo 'selected';}?>><?php echo $resV['VerticalName'];?></option><?php } ?></select></td>
  
  <td class="tdc"><select name="Min_GradeId" id="Min_GradeId" class="tdinput" style="width:99%;">
  <?php $sqlG=mysql_query("select GradeId,GradeValue from hrm_grade where CompanyId=".$CompanyId." AND GradeStatus='A' AND GradeId>60 order by GradeId asc",$con); while($resG=mysql_fetch_assoc($sqlG)){ ?>
  <option value="<?php echo $resG['GradeId']; ?>" <?php if($resRat['Min_GradeId']==$resG['GradeId']){echo 'selected';}?>><?php echo $resG['GradeValue']; ?></option><?php } ?></select></td>
  
  <td class="tdc"><select name="Max_GradeId" id="Max_GradeId" class="tdinput" style="width:99%;">
  <?php $sqlG=mysql_query("select GradeId,GradeValue from hrm_grade where CompanyId=".$CompanyId." AND GradeStatus='A' AND GradeId>60 order by GradeId asc",$con); while($resG=mysql_fetch_assoc($sqlG)){ ?>
  <option value="<?php echo $resG['GradeId']; ?>" <?php if($resRat['Max_GradeId']==$resG['GradeId']){echo 'selected';}?>><?php echo $resG['GradeValue']; ?></option><?php } ?></select></td>
  
  <td class="tdl"><input name="Min_Ctc" id="Min_Ctc" class="EditInput" style="width:99%;border:hidden;text-align:right; padding-right:2px;" value="<?php echo floatval($resRat['Min_Ctc']); ?>" /></td>
  <td class="tdl"><input name="Max_Ctc" id="Max_Ctc" class="EditInput" style="width:99%;border:hidden;text-align:right; padding-right:2px;" value="<?php echo floatval($resRat['Max_Ctc']); ?>" /></td>
  
  <td class="tdc"><input type="hidden" id="ed" name="ed" value="<?php echo $_REQUEST['d']; ?>" />  
<?php if($_SESSION['User_Permission']=='Edit'){ ?>&nbsp;<input type="submit" name="SaveEdit"  value="" class="SaveButton">&nbsp;<input type="hidden" name="VerIncId" id="VerIncId" value="<?php echo $_REQUEST['eid']; ?>"/><?php } ?></td>
 </tr>
</form>

<?php } else { ?>	 
<tr style="height:24px;">
 <td class="tdc"><?php echo $SNo; ?></td>
 <td class="tdl">&nbsp;<?php echo $resRat['DepartmentName']; ?></td>
 <td class="tdl">&nbsp;<?php echo $resRat['VerticalName']; ?></td>
 <td class="tdc"><?php echo $resG1['GradeValue']; ?></td>
 <td class="tdc"><?php echo $resG2['GradeValue']; ?></td>
 <td class="tdr"><?php echo floatval($resRat['Min_Ctc']); ?>&nbsp;</td>
 <td class="tdr"><?php echo floatval($resRat['Max_Ctc']); ?>&nbsp;</td>
 <td class="tdc"><?php if($_SESSION['User_Permission']=='Edit'){ ?><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $resRat['VerIncId'].', '.$_REQUEST['d']; ?>)"></a><?php /*?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="del(<?php echo $resRat['VerIncId'].', '.$_REQUEST['d']; ?>)"></a><?php */?><?php } ?></td>
</tr>
<?php } $SNo++;} ?>
<tr><td bgcolor="#B6E9E2" colspan="10"></td></tr>

<?php if(isset($_REQUEST['action']) && $_REQUEST['action']=="newsave"){ ?>
<form name="formEdit" method="post" onSubmit="return validateEdit(this)">
<input type="hidden" id="DepId" name="DepId" value="<?php echo $_REQUEST['d']; ?>" /> 
<tr>
 <td class="tdc"><?php echo $SNo; ?></td>
 <td class="tdl"><?php echo $resRat['DepartmentName'];?></td>
  <td class="tdl"><select name="VerticalId" id="VerticalId" class="tdinput" style="width:99%;">
  <?php $sqlV=mysql_query("select * from hrm_department_vertical where ComId=".$CompanyId." AND DeptId=".$_REQUEST['d']." order by VerticalName ASC", $con); while($resV=mysql_fetch_array($sqlV)){ ?>
  <option value="<?php echo $resV['VerticalId'];?>"><?php echo $resV['VerticalName'];?></option><?php } ?></select></td>
  
  <td class="tdc"><select name="Min_GradeId" id="Min_GradeId" class="tdinput" style="width:99%;">
  <?php $sqlG=mysql_query("select GradeId,GradeValue from hrm_grade where CompanyId=".$CompanyId." AND GradeStatus='A' AND GradeId>60 order by GradeId asc",$con); while($resG=mysql_fetch_assoc($sqlG)){ ?>
  <option value="<?php echo $resG['GradeId']; ?>"><?php echo $resG['GradeValue']; ?></option><?php } ?></select></td>
  
  <td class="tdc"><select name="Max_GradeId" id="Max_GradeId" class="tdinput" style="width:99%;">
  <?php $sqlG=mysql_query("select GradeId,GradeValue from hrm_grade where CompanyId=".$CompanyId." AND GradeStatus='A' AND GradeId>60 order by GradeId asc",$con); while($resG=mysql_fetch_assoc($sqlG)){ ?>
  <option value="<?php echo $resG['GradeId']; ?>"><?php echo $resG['GradeValue']; ?></option><?php } ?></select></td>
  
  <td class="tdl"><input name="Min_Ctc" id="Min_Ctc" class="EditInput" style="width:99%;border:hidden;text-align:right; padding-right:2px;" value="" /></td>
  <td class="tdl"><input name="Max_Ctc" id="Max_Ctc" class="EditInput" style="width:99%;border:hidden;text-align:right; padding-right:2px;" value="" /></td>
 
 <td class="tdc"><?php if($_SESSION['User_Permission']=='Edit'){ ?>&nbsp;<input type="submit" name="SaveNew"  value="" class="SaveButton">&nbsp;<?php } ?></td>
</tr>
</form>
<?php } ?>    

<?php if($_SESSION['User_Permission']=='Edit'){ ?>	  
<tr>
<td colspan="8" align="Right" class="fontButton"><table border="0" width="550">
<tr><td align="right">
<input type="button" name="NewSave" id="NewSave" value="new" onClick="newsave(<?php echo $_REQUEST['d']; ?>)" <?php if($_REQUEST['action']=="newsave" OR $_REQUEST['action']=="edit"){ echo "style=display:none;"; }?>/>
<input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
<input type="button" name="Refresh" value="refresh" onClick="javascript:window.location='MinMaxVertical.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&d=<?=$_REQUEST['d'];?>&ed=4'"/>&nbsp;</td>
</tr></table>
</td>
</tr>
<?php } ?>

 </table>
 </td>
</tr>

  </table>  
</td>
 </tr>
<?php } ?> 
</table>
<!--111111111111111111111111111111111111111111111111111111111 Close -->
<!--111111111111111111111111111111111111111111111111111111111 Close --> 
 </td>
 
</tr>
</table>



<?php //***********************************************************************************************?>
<?php //*******************END*****END*****END******END******END************************?>
<?php //****************************************************************************?>
	  </td>
	</tr>  </table>
 </td>
</tr>
</table>
</body>
</html>


