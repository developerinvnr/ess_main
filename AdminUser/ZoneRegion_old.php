<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//**********************************************************************************
//Hq
if(isset($_POST['SaveNew_Hq']))
{  
 $SqlInseart = mysql_query("INSERT INTO hrm_headquater(HqName, StateId, RegionId, CompanyId, HQStatus, CreatedBy, CreatedDate, YearId) VALUES('".$_POST['HqName']."', '".$_POST['StateId']."', '".$_POST['RegionId']."', ".$CompanyId.", 'A', ".$UserId.", '".date('Y-m-d')."', ".$YearId.")", $con);  
 if($SqlInseart){ $msg = "Data has been Inserted successfully..."; }
}

if(isset($_POST['SaveEdit_Hq']))
{ 

 $SqlUpdate = mysql_query("UPDATE hrm_headquater SET HqName='".$_POST['HqName']."', StateId='".$_POST['StateId']."', RegionId='".$_POST['RegionId']."', CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."' WHERE HqId=".$_POST['HqId'], $con) or die(mysql_error());  
 if($SqlUpdate){$msg="Data has been Updeted successfully...";}
}

if($_REQUEST['action']=='delete_Hq')
{ 

 $SqlDel = mysql_query("update hrm_headquater set HQStatus='D' WHERE HqId=".$_REQUEST['eid_Hq'], $con);  
 if($SqlDel){$msg="Data has been Deleted successfully...";}
}

//Region
if(isset($_POST['SaveNew']))
{  
 $SqlInseart = mysql_query("INSERT INTO hrm_sales_region(RegionName, ZoneId, crby, crdate) VALUES('".$_POST['RegionName']."','".$_POST['ZoneId']."', ".$UserId.", '".date('Y-m-d')."')", $con);  
 if($SqlInseart){ $msg2 = "Data has been Inserted successfully..."; }
}

if(isset($_POST['SaveEdit']))
{ 

 $SqlUpdate = mysql_query("UPDATE hrm_sales_region SET RegionName='".$_POST['RegionName']."', ZoneId='".$_POST['ZoneId']."', crby=".$UserId.", crdate='".date("Y-m-d")."' WHERE RegionId=".$_POST['RegionId'], $con) or die(mysql_error());  
 if($SqlUpdate){$msg2="Data has been Updeted successfully...";}
}

if($_REQUEST['action']=='delete')
{ 

 $SqlDel = mysql_query("update hrm_sales_region set sts='D' WHERE RegionId=".$_REQUEST['eid'], $con);  
 if($SqlDel){$msg2="Data has been Deleted successfully...";}
}

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> 
.th{ font-family:Times New Roman;font-size:14px;height:25px;text-align:center;color:#FFFFFF;font-weight:bold; }
.tdl{ font-family:Times New Roman;font-size:14px;text-align:left; }
.tdc{ font-family:Times New Roman;font-size:14px;text-align:center; }
.thh{ font-family:Times New Roman;font-size:12px;height:25px;text-align:center;color:#FFFFFF;font-weight:bold; }
.tdll{ font-family:Times New Roman;font-size:12px;text-align:left; }
.tdcc{ font-family:Times New Roman;font-size:12px;text-align:center; }
.tdinput{ font-family:Times New Roman;font-size:14px;text-align:center;width:100%; border:hidden; }
.tdinputl{ font-family:Times New Roman;font-size:14px;text-align:left;width:100%; border:hidden; }
.tdsel{ font-family:Times New Roman;font-size:14px;text-align:left;}
.inner_table{height:500px;overflow-y:auto;width:auto;}
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:11px; width:120px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; width:100px; height:20px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>

<Script>
//HQ

function edit_Hq(value){ var agree=confirm("Are you sure you want to edit this record?");
if(agree){ var x = "ZoneRegion.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&action=edit_Hq&eid_Hq="+value+"&d=0";  window.location=x;}}

function del_Hq(value){ var agree=confirm("Are you sure you want to delete this record?");
if(agree){ var x = "ZoneRegion.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&action=delete_Hq&eid_Hq="+value+"&d=0";  window.location=x;}}

function newsave_Hq(){ var x = "ZoneRegion.php?action=newsave_Hq&act=checkdept&d=23&rr=false&rr=98&ff=23&dd=3&&d=0";  
window.location=x;}


function validate2Edit(formEdit){
  var HqName = formEdit.HqName.value;  var StateId = formEdit.StateId.value; var RegionId = formEdit.RegionId.value;
  var filter=/^[a-zA-Z. /]+$/; var test_bool4 = filter.test(HqName);
  if (HqName.length === 0) { alert("please enter Hq name field.");  return false; } 
  if(test_bool4==false) { alert('Please enter only alphabets in the HeadQuarter name Field');  return false; } 
  if(StateId.length === 0) { alert("please enter State name field.");  return false; } 
  if(RegionId.length === 0) { alert("please enter Region name field.");  return false; } 
} 

//Region
function edit(value){ var agree=confirm("Are you sure you want to edit this record?");
if(agree){ var x = "ZoneRegion.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&action=edit&eid="+value+"&d=0";  window.location=x;}}

function del(value){ var agree=confirm("Are you sure you want to delete this record?");
if(agree){ var x = "ZoneRegion.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&action=delete&eid="+value+"&d=0";  window.location=x;}}

function newsave(){ var x = "ZoneRegion.php?action=newsave&act=checkdept&d=23&rr=false&rr=98&ff=23&dd=3&&d=0";  
window.location=x;}

function validateEdit(formEdit){
  var RegionName = formEdit.RegionName.value; var filter=/^[a-zA-Z. /]+$/; var test_bool4 = filter.test(RegionName);
  if (RegionName.length === 0) { alert("please enter region name field.");  return false; } 
  if(test_bool4==false) { alert('Please enter only alphabets in the region name Field');  return false; } 
}   

function SelState(v,t)
{
 window.location="ZoneRegion.php?actty=true&opt=false&vlu=45&vt_v="+v+"&vt_t="+t+"&sec=comback&ee=%rr%&ff=true&r2r=true&d=0";
}


/*
function ExportRegion(d,c)
{    
  window.open("ExportZoneRegion.php?action=FormRegionExport&c="+c+"&d="+d,"ExportForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}
*/
                       
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
	  <td valign="top" align="center"  width="100%" id="MainWindow">
<?php //************************************************************************************?>
<?php //****************START*****START*****START******START******START*************************?>
<?php //*****************************************************************************?>

<table style="width:100%;">
<tr>
 <td style="width:50%;vertical-align:top;">
<!-- 111111111111111111111111111111111111111111111111111111111 Open -->
<!-- 111111111111111111111111111111111111111111111111111111111 Open -->
<table border="0" style="margin-top:0px;width:100%;">
<?php if($_SESSION['login'] = true){ ?>	
 <tr>
  <td style="width:2px;">&nbsp;</td>
  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
 </tr>
  
<tr>
<td colspan="5" align="left" id="type" valign="top">             
 <table border="0" width="100%">
<?php if($_SESSION['User_Permission']=='Edit'){ ?>	  
 <tr>
  <td>&nbsp;&nbsp;
<input type="button" name="NewSave" id="NewSave" style="width:80px;" value="new" onClick="newsave_Hq(<?php echo $_REQUEST['d'];?>)" <?php if($_REQUEST['action']=="newsave_Hq" OR $_REQUEST['action']=="edit_Hq"){ echo "style=display:none;"; }?>/>
<input type="button" name="back" id="back" style="width:80px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
<input type="button" name="Refresh" style="width:80px;" value="refresh" onClick="javascript:window.location='ZoneRegion.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&d=<?=$_REQUEST['d'];?>&ed=4'"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<select name="StateId" id="StateId" onChange="SelState(this.value,'S')" style="width:150px; background-color:#CBFF97;">
<option value="0">Select State</option>
  <?php $sqlSt=mysql_query("select * from hrm_state where StateStatus='A' order by StateName ASC", $con); 
      while($resSt=mysql_fetch_array($sqlSt)){ ?><option value="<?=$resSt['StateId']?>">&nbsp;<?=$resSt['StateName']?></option><?php } ?>
  </select>

<select name="RegionId" id="RegionId" onChange="SelState(this.value,'R')" style="width:150px; background-color:#CBFF97;">
<option value="0">Select Region</option>
  <?php $sqlReg=mysql_query("select * from hrm_sales_region where sts='A' order by RegionName ASC", $con); 
      while($resReg=mysql_fetch_array($sqlReg)){ ?><option value="<?=$resReg['RegionId']?>">&nbsp;<?=$resReg['RegionName']?></option><?php } ?>
  </select>

</td>
 </td>
 </tr>
<?php } ?> 
  <tr>
   <td align="left" width="100%">
<table border="1" width="100%" bgcolor="#FFFFFF" cellspacing="1">
 
 <tr bgcolor="#7a6189" style="height:25px;">
  <td colspan="5" class="th"><b>Head Quarter</b></td>
 </tr>
 <tr bgcolor="#7a6189" style="height:25px;">
  <td class="th" style="width:5%;"><b>Sn</b></td>
  <td class="th" style="width:20%;"><b>HQ Name</b></td>
  <td class="th" style="width:20%;"><b>State Name</b></td>
  <td class="th" style="width:20%;"><b>Region Name</b></td>
  <td class="th" style="width:5%;"><b>Action</b></td>
 </tr>
<?php if(isset($_REQUEST['action']) && $_REQUEST['action']=="newsave_Hq"){ ?>
<form name="formEdit" method="post" onSubmit="return validate2Edit(this)">
<input type="hidden" id="DeptId" name="DeptId" value="0" /> 
<tr>
 <td class="tdc"><?php //echo $SNo; ?></td>
 <td class="tdc"><input name="HqName" id="HqName" class="EditInput" style="width:99%;"/></td> 
 <td class="tdc"><select name="StateId" id="StateId" class="tdinput" style="width:99%;">
  <?php $sqlSt=mysql_query("select * from hrm_state where StateStatus='A' order by StateName ASC", $con); 
      while($resSt=mysql_fetch_array($sqlSt)){ ?><option value="<?=$resSt['StateId']?>">&nbsp;<?=$resSt['StateName']?></option><?php } ?>
  </select>
  </td>
  <td class="tdc"><select name="RegionId" id="RegionId" class="tdinput" style="width:99%;">
  <?php $sqlReg=mysql_query("select * from hrm_sales_region where sts='A' order by RegionName ASC", $con); 
      while($resReg=mysql_fetch_array($sqlReg)){ ?><option value="<?=$resReg['RegionId']?>">&nbsp;<?=$resReg['RegionName']?></option><?php } ?>
  </select>
  </td>
 
 <td class="tdc"><?php if($_SESSION['User_Permission']=='Edit'){ ?>&nbsp;<input type="submit" name="SaveNew_Hq"  value="" class="SaveButton">&nbsp;<?php } ?></td>
</tr>
</form>
<?php } ?>  
 
<?php if($_REQUEST['vt_v']!='' && $_REQUEST['vt_t']!='')
{
 if($_REQUEST['vt_t']=='S'){ $subQ='hq.StateId='.$_REQUEST['vt_v']; }
 elseif($_REQUEST['vt_t']=='R'){ $subQ='hq.RegionId='.$_REQUEST['vt_v']; }
 else{ $subQ='1=1'; }
}
else{ $subQ='1=1'; }


$sqlRat=mysql_query("select hq.*,s.StateName from hrm_headquater hq inner join hrm_state s on hq.StateId=s.StateId where HQStatus='A' AND hq.CompanyId=".$CompanyId." AND ".$subQ." order by hq.HqName ASC", $con); 
      $SNo=1; while($resRat=mysql_fetch_array($sqlRat)) {
	  
	  $sqlRat2=mysql_query("select RegionName from hrm_sales_region where RegionId=".$resRat['RegionId'], $con); 
	  $resRat2=mysql_fetch_assoc($sqlRat2);
	  
  if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit_Hq" && $_REQUEST['eid_Hq']==$resRat['HqId']){ ?>
<form name="formEdit" method="post" onSubmit="return validate2Edit(this)">	
 <tr style="height:24px;">
  <td class="tdc"><?php echo $SNo; ?></td>
  <td class="tdl"><input name="HqName" id="HqName" class="EditInput" style="width:99%;border:hidden;" value="<?php echo $resRat['HqName']; ?>" /></td>
  
  <td class="tdc"><select name="StateId" id="StateId" class="tdinput" style="width:99%;">
  <option value="0" <?php if($resRat['StateId']==0){echo 'selected';}?>>&nbsp;Select</option>
  <?php $sqlSt=mysql_query("select * from hrm_state where StateStatus='A' order by StateName ASC", $con); 
      while($resSt=mysql_fetch_array($sqlSt)){ ?><option value="<?=$resSt['StateId']?>" <?php if($resRat['StateId']==$resSt['StateId']){echo 'selected';}?>>&nbsp;<?=$resSt['StateName']?></option><?php } ?>
  </select>
  </td>
  <td class="tdc"><select name="RegionId" id="RegionId" class="tdinput" style="width:99%;">
  <option value="0" <?php if($resRat['RegionId']==0){echo 'selected';}?>>&nbsp;Select</option>
  <?php $sqlReg=mysql_query("select * from hrm_sales_region where sts='A' order by RegionName ASC", $con); 
      while($resReg=mysql_fetch_array($sqlReg)){ ?><option value="<?=$resReg['RegionId']?>" <?php if($resRat['RegionId']==$resReg['RegionId']){echo 'selected';}?>>&nbsp;<?=$resReg['RegionName']?></option><?php } ?>
  </select>
  </td>
  
  <td class="tdc"><input type="hidden" id="ed" name="ed" value="<?php echo $_REQUEST['d']; ?>" />  
<?php if($_SESSION['User_Permission']=='Edit'){ ?>&nbsp;<input type="submit" name="SaveEdit_Hq"  value="" class="SaveButton">&nbsp;<input type="hidden" name="HqId" id="HqId" value="<?php echo $_REQUEST['eid_Hq']; ?>"/><?php } ?></td>
 </tr>
</form>

<?php } else { ?>	 
<tr style="height:24px;">
 <td class="tdc"><?php echo $SNo; ?></td>
 <td class="tdl">&nbsp;<?php echo $resRat['HqName']; ?></td>
 <td class="tdl">&nbsp;<?php echo $resRat['StateName']; ?></td>
 <td class="tdl">&nbsp;<?php echo $resRat2['RegionName']; ?></td>
 <td class="tdc"><?php if($_SESSION['User_Permission']=='Edit'){ ?><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit_Hq(<?php echo $resRat['HqId']; ?>)"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="del_Hq(<?php echo $resRat['HqId']; ?>)"></a><?php } ?></td>
</tr>
<?php } $SNo++;} ?>
<tr><td bgcolor="#B6E9E2" colspan="10"></td></tr>

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
 
 <td style="width:2%;">&nbsp;</td>
 
 <td style="width:40%;vertical-align:top;">
<!--222222222222222222222222222222222222222222222222222222222 Open -->
<!--222222222222222222222222222222222222222222222222222222222 Open -->
<table border="0" style="margin-top:0px;width:100%;height:300px;">
<?php if($_SESSION['login'] = true){ ?>	
 <tr>
  <td style="width:2px;">&nbsp;</td>
  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg2; ?></b></td>
 </tr>
  
<tr>
<td colspan="5" align="left" id="type" valign="top">             
 <table border="0" width="100%">
<?php if($_SESSION['User_Permission']=='Edit'){ ?>	  
<tr>
<td>&nbsp;&nbsp;
<input type="button" style="width:80px;" name="NewSave" id="NewSave" value="new" onClick="newsave(<?php echo $_REQUEST['d']; ?>)" <?php if($_REQUEST['action']=="newsave" OR $_REQUEST['action']=="edit"){ echo "style=display:none;"; }?>/>
<input type="button" name="back" id="back" style="width:80px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
<input type="button" name="Refresh" style="width:80px;" value="refresh" onClick="javascript:window.location='ZoneRegion.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&d=<?=$_REQUEST['d'];?>&ed=4'"/>
</td>
</tr>
<?php } ?> 
  <tr>
   <td align="left" width="100%">
<table border="1" width="100%" bgcolor="#FFFFFF" cellspacing="1">
 <tr bgcolor="#7a6189" style="height:25px;">
  <td colspan="4" class="th"><b>Region</b></td>
 </tr>
 <tr bgcolor="#7a6189" style="height:25px;">
  <td class="th" style="width:5%;"><b>Sn</b></td>
  <td class="th" style="width:30%;"><b>Region Name</b></td>
  <td class="th" style="width:20%;"><b>Zone Name</b></td>
  <td class="th" style="width:5%;"><b>Action</b></td>
 </tr>
<?php if(isset($_REQUEST['action']) && $_REQUEST['action']=="newsave"){ ?>
<form name="formEdit" method="post" onSubmit="return validateEdit(this)">
<input type="hidden" id="DeptId" name="DeptId" value="0" /> 
<tr>
 <td class="tdc"><?php //echo $SNo; ?></td>
 <td class="tdc"><input name="RegionName" id="RegionName" class="EditInput" style="width:99%;"/></td> 
  <td class="tdc"><select name="ZoneId" id="ZoneId" class="tdinputl" style="width:99%;">
  <?php $sqlZon=mysql_query("select * from hrm_sales_zone order by ZoneName ASC", $con); 
      while($resZon=mysql_fetch_array($sqlZon)){ ?>
	  <option value="<?=$resZon['ZoneId']?>">&nbsp;<?=$resZon['ZoneName']?></option><?php } ?>
  </select>
  </td>
 
 <td class="tdc"><?php if($_SESSION['User_Permission']=='Edit'){ ?>&nbsp;<input type="submit" name="SaveNew"  value="" class="SaveButton">&nbsp;<?php } ?></td>
</tr>
</form>
<?php } ?>     
 
<?php $sqlRat=mysql_query("select r.*,z.ZoneName from hrm_sales_region r inner join hrm_sales_zone z on r.ZoneId=z.ZoneId where r.sts='A' order by r.RegionName ASC", $con); 
      $SNo=1; while($resRat=mysql_fetch_array($sqlRat)) {
  if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$resRat['RegionId']){ ?>
<form name="formEdit" method="post" onSubmit="return validateEdit(this)">	
 <tr style="height:24px;">
  <td class="tdc"><?php echo $SNo; ?></td>
  <td class="tdl"><input name="RegionName" id="RegionName" class="EditInput" style="width:99%;border:hidden;" value="<?php echo $resRat['RegionName']; ?>" /></td>
  
  <td class="tdc"><select name="ZoneId" id="ZoneId" class="tdinput" style="width:99%;">
  <option value="0" <?php if($resRat['ZoneId']==0){echo 'selected';}?>>&nbsp;Select</option>
  <?php $sqlZon=mysql_query("select * from hrm_sales_zone order by ZoneName ASC", $con); 
      while($resZon=mysql_fetch_array($sqlZon)){ ?><option value="<?=$resZon['ZoneId']?>" <?php if($resRat['ZoneId']==$resZon['ZoneId']){echo 'selected';}?>>&nbsp;<?=$resZon['ZoneName']?></option><?php } ?>
  </select>
  </td>
  
  <td class="tdc"><input type="hidden" id="ed" name="ed" value="<?php echo $_REQUEST['d']; ?>" />  
<?php if($_SESSION['User_Permission']=='Edit'){ ?>&nbsp;<input type="submit" name="SaveEdit"  value="" class="SaveButton">&nbsp;<input type="hidden" name="RegionId" id="RegionId" value="<?php echo $_REQUEST['eid']; ?>"/><?php } ?></td>
 </tr>
</form>

<?php } else { ?>	 
<tr style="height:24px;">
 <td class="tdc"><?php echo $SNo; ?></td>
 <td class="tdl">&nbsp;<?php echo $resRat['RegionName']; ?></td>
 <td class="tdl">&nbsp;<?php echo $resRat['ZoneName']; ?></td>
 <td class="tdc"><?php if($_SESSION['User_Permission']=='Edit'){ ?><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $resRat['RegionId']; ?>)"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="del(<?php echo $resRat['RegionId']; ?>)"></a><?php } ?></td>
</tr>
<?php } $SNo++;} ?>
<tr><td bgcolor="#B6E9E2" colspan="10"></td></tr>



 </table>
 </td>
</tr>

  </table>  
</td>
 </tr>
<?php } ?> 
</table>
<!--222222222222222222222222222222222222222222222222222222222 Close -->
<!--222222222222222222222222222222222222222222222222222222222 Close --> 
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


