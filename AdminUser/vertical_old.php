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
 $SqlInseart = mysql_query("INSERT INTO hrm_department_vertical(VerticalName, DeptId, ComId, crby, crdate) VALUES('".$_POST['VerticalName']."','".$_POST['DeptId']."', ".$CompanyId.", ".$UserId.", '".date('Y-m-d')."')", $con);  
 if($SqlInseart){ $msg = "Data has been Inserted successfully..."; }
}

if(isset($_POST['SaveEdit']))
{ 

 $SqlUpdate = mysql_query("UPDATE hrm_department_vertical SET VerticalName='".$_POST['VerticalName']."', DeptId='".$_POST['DeptId']."', crby=".$UserId.", crdate='".date("Y-m-d")."' WHERE VerticalId=".$_POST['VerticalId'], $con) or die(mysql_error());  
 if($SqlUpdate){$msg="Data has been Updeted successfully...";}
}

if($_REQUEST['action']=='delete')
{ 

 $SqlDel = mysql_query("delete from hrm_department_vertical WHERE VerticalId=".$_REQUEST['eid'], $con);  
 if($SqlDel){$msg="Data has been Deleted successfully...";}
}


if(isset($_POST['VerticalUp']))
{
 for($i=1; $i<=$_POST['TotRow']; $i++ )
 {
  $queryup=mysql_query("update hrm_employee_general set EmpVertical=".$_POST['EmpVertical_'.$i]." where EmployeeId=".$_POST['eid_'.$i]."",$con);
 }
 if($queryup){ echo '<script>alert("Vertical Update Successfully");</script>'; }
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
function SelectDept(v)
{window.location='vertical.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&d='+v+'&ed=4';}

function edit(value,ed) { var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "vertical.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&action=edit&eid="+value+"&d="+ed;  window.location=x;}}

function del(value,ed) { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var x = "vertical.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&action=delete&eid="+value+"&d="+ed;  window.location=x;}}

function newsave(ed) { var x = "vertical.php?action=newsave&act=checkdept&d=23&rr=false&rr=98&ff=23&dd=3&&d="+ed;  
window.location=x;}

function validateEdit(formEdit){
  var VerticalName = formEdit.VerticalName.value; var filter=/^[a-zA-Z. /]+$/; var test_bool4 = filter.test(VerticalName);
  if (VerticalName.length === 0) { alert("please enter vertical name field.");  return false; } 
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
 <td style="width:40%;vertical-align:top;">
<!-- 111111111111111111111111111111111111111111111111111111111 Open -->
<!-- 111111111111111111111111111111111111111111111111111111111 Open -->
<table border="0" style="margin-top:0px;width:100%;">
<?php if($_SESSION['login'] = true){ ?>	
 <tr>
  <td style="width:2px;">&nbsp;</td>
  <td width="300" class="heading"><u>Department Vertical Master :</u></td>    
  <td class="td1" style="font-size:14px;width:210px;font-family:Times New Roman;" >&nbsp;
	<select class="tdsel" style="background-color:#DDFFBB;width:200px;" name="DeptId" id="DeptId" onChange="SelectDept(this.value)"><?php $sD=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName asc", $con); while($rD=mysql_fetch_assoc($sD)){ ?><option value="<?php echo $rD['DepartmentId'];?>" <?php if($_REQUEST['d']==$rD['DepartmentId']){echo 'selected';} ?>><?php echo strtoupper($rD['DepartmentName']); ?></option><?php }?></select></td>
  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
 </tr>
  
<tr>
<td colspan="5" align="left" id="type" valign="top">             
 <table border="0" width="50%">
  <tr>
   <td align="left" width="100%">
<table border="1" width="100%" bgcolor="#FFFFFF" cellspacing="1">
 <tr bgcolor="#7a6189" style="height:25px;">
  <td class="th" style="width:5%;"><b>Sn</b></td>
  <td class="th" style="width:30%;"><b>Vertical Name</b></td>
  <td class="th" style="width:5%;"><b>Action</b></td>
 </tr>
<?php $sqlRat=mysql_query("select * from hrm_department_vertical where ComId=".$CompanyId." AND DeptId=".$_REQUEST['d']." order by VerticalName ASC", $con); $SNo=1; while($resRat=mysql_fetch_array($sqlRat)) {
  if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$resRat['VerticalId']){ ?>
<form name="formEdit" method="post" onSubmit="return validateEdit(this)">	
<input type="hidden" id="DeptId" name="DeptId" value="<?php echo $_REQUEST['d']; ?>" /> 
 
 <tr style="height:24px;">
  <td class="tdc"><?php echo $SNo; ?></td>
  <td class="tdl"><input name="VerticalName" id="VerticalName" class="EditInput" style="width:99%;border:hidden;" value="<?php echo $resRat['VerticalName']; ?>" /></td>
  
  <?php /*?><td class="tdc"><select name="BWageStatus" id="BWageStatus" class="tdinput" style="width:99%;">
  <option value="A" <?php if($resRat['BWageStatus']=='A'){echo 'selected';}?>>&nbsp;A</option>
  <option value="D" <?php if($resRat['BWageStatus']=='D'){echo 'selected';}?>>&nbsp;D</option>
  </select>
  </td><?php */?>
  
  <td class="tdc"><input type="hidden" id="ed" name="ed" value="<?php echo $_REQUEST['d']; ?>" />  
<?php if($_SESSION['User_Permission']=='Edit'){ ?>&nbsp;<input type="submit" name="SaveEdit"  value="" class="SaveButton">&nbsp;<input type="hidden" name="VerticalId" id="VerticalId" value="<?php echo $_REQUEST['eid']; ?>"/><?php } ?></td>
 </tr>
</form>

<?php } else { ?>	 
<tr style="height:24px;">
 <td class="tdc"><?php echo $SNo; ?></td>
 <td class="tdl">&nbsp;<?php echo $resRat['VerticalName']; ?></td>
 <?php /*?><td class="tdc"><?php echo $resRat['BWageStatus']; ?></td><?php */?>
 <td class="tdc"><?php if($_SESSION['User_Permission']=='Edit'){ ?><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $resRat['VerticalId'].', '.$_REQUEST['d']; ?>)"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="del(<?php echo $resRat['VerticalId'].', '.$_REQUEST['d']; ?>)"></a><?php } ?></td>
</tr>
<?php } $SNo++;} ?>
<tr><td bgcolor="#B6E9E2" colspan="10"></td></tr>

<?php if(isset($_REQUEST['action']) && $_REQUEST['action']=="newsave"){ ?>
<form name="formEdit" method="post" onSubmit="return validateEdit(this)">
<input type="hidden" id="DeptId" name="DeptId" value="<?php echo $_REQUEST['d']; ?>" /> 
<tr>
 <td class="tdc"><?php echo $SNo; ?></td>
 <td class="tdc"><input name="VerticalName" id="VerticalName" class="EditInput" style="width:99%;"/></td> 
 <!--<td class="tdc"><select name="BWageStatus" id="BWageStatus" class="tdinput" style="width:99%;">
  <option value="A">&nbsp;A</option>
  <option value="D">&nbsp;D</option>
  </select>
  </td>-->
 
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
<input type="button" name="Refresh" value="refresh" onClick="javascript:window.location='vertical.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&d=<?=$_REQUEST['d'];?>&ed=4'"/>&nbsp;</td>
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
 
 <td style="width:2%;">&nbsp;</td>
 
 <td style="width:58%;vertical-align:top;">
<!--222222222222222222222222222222222222222222222222222222222 Open -->
<!--222222222222222222222222222222222222222222222222222222222 Open -->
<table border="0" style="margin-top:0px;width:100%;height:300px;">
<?php if($_SESSION['login'] = true){ ?>	
 <tr>
  <td style="width:2px;">&nbsp;</td>
  <td width="180" class="heading"><u>Mapped Employee :</u></td>
  <input type="hidden" id="ey" name="ey" value="<?php echo $_REQUEST['ey']; ?>" />  	     
  <td class="td1" style="font-size:14px;width:200px;font-family:Times New Roman;">
	<select class="tdsel" style="background-color:#DDFFBB;width:150px;" name="DeptID" id="DeptID" onChange="SelectDept(this.value,<?=date("Y");?>)"><?php if($_REQUEST['d']>0){ $SqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['d'], $con); $ResD=mysql_fetch_array($SqlD); ?><option value="<?php echo $_REQUEST['d']; ?>"><?php echo $ResD['DepartmentCode']; ?></option><?php }else{ ?><option value="0" selected>Select Department</option><?php } $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DeptStatus='A' order by DepartmentCode ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)){ ?><option value="<?php echo $ResDept['DepartmentId']; ?>"><?php echo $ResDept['DepartmentCode']; ?></option><?php } ?></select></td>
  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg2; ?></b></td>
 </tr>

<?php $sqMxb=mysql_query("select Lumpsum_MaxBonus from hrm_company_statutory_lumpsum where CompanyId=".$CompanyId."",$con);
$rsMxb=mysql_fetch_assoc($sqMxb); 

$sCat=mysql_query("select * from hrm_department_vertical where ComId=".$CompanyId." AND DeptId=".$_REQUEST['d']." order by VerticalName ASC"); while($rCat=mysql_fetch_assoc($sCat)){ $CatArr[$rCat['VerticalId']]=$rCat['VerticalName']; }
?>  
<tr>
<td colspan="5" align="left" id="type" valign="top">             
 <table border="0" width="100%">
  <tr>
   <td align="left" width="100%">
<table border="1" width="100%" bgcolor="#FFFFFF"  cellspacing="1">
 <tr bgcolor="#7a6189" style="height:25px;">
  <td class="thh" style="width:5%;"><b>Sno</b></td>
  <td class="thh" style="width:5%;"><b>EmpCode</b></td>
  <td class="thh" style="width:40%;"><b>Name</b></td>
  <td class="thh" style="width:20%;"><b>Department</b></td>
  <td class="thh" style="width:10%;"><b>Garde</b></td>
  <td class="thh" style="width:20%;"><b>Vertical</b></td>
 </tr>
<?php $sqlEmp=mysql_query("select e.EmployeeID,e.EmpCode,Fname,Sname,Lname,de.DepartmentCode,gr.GradeValue,g.EmpVertical from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_department de on g.DepartmentId=de.DepartmentId inner join hrm_grade gr on g.GradeId=gr.GradeId where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND g.DepartmentId=".$_REQUEST['d']." order by e.EmpCode ASC", $con); $no=1; while($resEmp=mysql_fetch_array($sqlEmp)) { ?>
 
<form name="formEdit" method="post" onSubmit="return validateEdit(this)">	
<input type="hidden" id="ey" name="ey" value="<?php echo $_REQUEST['ey']; ?>" /> 
<input type="hidden" id="ed" name="ed" value="<?php echo $_REQUEST['ed']; ?>" />
<input type="hidden" id="eid_<?=$no;?>" name="eid_<?=$no;?>" value="<?php echo $resEmp['EmployeeID']; ?>" />  
<tr style="height:22px;">
 <td class="tdcc"><?php echo $no; ?></td>
 <td class="tdcc"><?php echo $resEmp['EmpCode']; ?></td>
 <td class="tdll">&nbsp;<?php echo $resEmp['Fname'].' '.$resEmp['Sname'].' '.$resEmp['Lname']; ?></td>
 <td class="tdll">&nbsp;<?php echo $resEmp['DepartmentCode']; ?></td>
 <td class="tdcc"><?php echo $resEmp['GradeValue']; ?></td>
 <td class="tdcc"><select name="EmpVertical_<?=$no;?>" id="EmpVertical_<?=$no;?>" class="tdinput" style="width:99%;">
  <?php if($resEmp['EmpVertical']==0){?><option value="0">Select</option><?php } ?>
  <?php foreach($CatArr as $key =>$value){ ?>
				 <option value="<?=$key?>" <?=($resEmp['EmpVertical']==$key)?'selected':'';?>><?=$value?></option>
  <?php } ?>
  <option value="0">None</option>
  </select></td>
</tr>
<?php $no++;} $ActNo=$no-1; ?><input type="hidden" id="TotRow" name="TotRow" value="<?=$ActNo;?>" />


<?php if($_SESSION['User_Permission']=='Edit'){ ?>	  
<tr>
<td colspan="7" align="Right" class="fontButton"><table border="0" width="550">
<tr><td align="right"><input type="submit" name="VerticalUp" id="VerticalUp" value="update"/></td>
</tr></table>
</td>
</tr>
<?php } ?>
</form>
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


