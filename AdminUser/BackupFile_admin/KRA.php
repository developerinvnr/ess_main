<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//**********************************************************************************************************************
if(isset($_POST['SaveNew']))
{ $SqlInseart = mysql_query("INSERT INTO hrm_pms_kra(YearId,DepartmentId,KRA,KRA_Description,Measure,Unit,CompanyId,CreatedBy,CreatedDate) VALUES(".$YearId.",".$_SESSION['DPid'].", '".$_POST['KRA']."', '".$_POST['KRA_Description']."', '".$_POST['Measure']."', '".$_POST['Unit']."', ".$CompanyId.", ".$UserId.", '".date('Y-m-d')."')", $con); 
   if($SqlInseart){ $msg = "Data has been Inserted successfully..."; }
}

if(isset($_POST['SaveEdit']))
{ 
 $Sql2=mysql_query("Select * from hrm_pms_kra WHERE KRAId=".$_POST['KRAId']." AND YearId=".$YearId." AND CompanyId=".$CompanyId, $con); 
 $Rows = mysql_num_rows($Sql2); 
 if($Rows>0) 
 { $SqlUpdate = mysql_query("UPDATE hrm_pms_kra SET KRA='".$_POST['KRA']."', KRA_Description='".$_POST['KRA_Description']."', Measure='".$_POST['Measure']."', Unit='".$_POST['Unit']."', CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."' WHERE KRAId=".$_POST['KRAId'], $con) or die(mysql_error());  
   if($SqlUpdate){$msg="Data has been Updated successfully...";}
 }

 if($Rows==0)
 { 
 $Sql3=mysql_query("update hrm_pms_kra set KRAStatus='D' WHERE KRAId=".$_POST['KRAId']." AND CompanyId=".$CompanyId, $con);
    if($Sql3)
    { $Sql4=mysql_query("INSERT INTO hrm_pms_kra(YearId,DepartmentId,KRA,KRA_Description,Measure,Unit,CompanyId,CreatedBy,CreatedDate) VALUES(".$YearId.",".$_SESSION['DPid'].", '".$_POST['KRA']."', '".$_POST['KRA_Description']."', '".$_POST['Measure']."', '".$_POST['Unit']."', ".$CompanyId.", ".$UserId.", '".date('Y-m-d')."')", $con); 
	}
 }
 if($Sql4){ $msg = "Data has been Updated successfully...";}

}

if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
{
  $SqlDelete=mysql_query("UPDATE hrm_pms_kra SET KRAStatus='De' WHERE KRAId=".$_REQUEST['did'], $con) or die(mysql_error());
  if($SqlDelete) { $msg = "Data has been deleted successfully..."; }
}

?>

<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> 
.th{ font-family:Times New Roman;font-size:12px;height:25px;text-align:center;color:#FFFFFF;font-weight:bold; }
.tdl{ font-family:Times New Roman;font-size:12px;text-align:left; }
.tdc{ font-family:Times New Roman;font-size:12px;text-align:center; }
.tdinput{ font-family:Times New Roman;font-size:14px;text-align:left;width:100%; border:hidden; }
.tdsel{ font-family:Times New Roman;font-size:14px;text-align:left;width:100%; }
.inner_table{height:500px;overflow-y:auto;width:auto;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<Script>
function SelectYear(v){window.location='KRA.php?YI='+v;}
function SelectDeptEmp(value)
{  var YId=document.getElementById("YId").value; var x = 'KRA.php?DPid='+value+'&YI='+YId; 
   window.location=x; document.getElementById("PrintSpan").style.display='block';
}   

function OpenWindow() 
{ var C=document.getElementById("ComId").value;  var Y=document.getElementById("YId").value; var D=document.getElementById("DeptId").value; 
  window.open("PrintDeptKRA.php?action=PrintKRA&D="+D+"&Y="+Y+"&C="+C,"Deptkra","scrollbars=yes,menubar=yes,resizable=no,width=1200,height=650"); 
}            

$(document).ready(function () { $("#table1").freezeHeader({ 'height': '500px' }); })       
</SCRIPT> 
</head>
<body class="body">
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" name="YId" id="YId" value="<?php echo $_REQUEST['YI']; ?>" />
<input type="hidden" name="UserId" id="UserId" value="<?php echo $UserId; ?>" />
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
<?php //******************************************************************************* ?>
<?php //*******START*****START*****START******START******START********************* ?>
<?php //******************************************************************************* ?>

<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
     <tr>
	 <td style="width:10px;">&nbsp;</td>
	 <td width="150" class="heading">PMS - KRA&nbsp;&nbsp;</td>
	 
	 
<?php $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI']."", $con); $rY=mysql_fetch_assoc($sY); 
      $FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; ?>					 
     <td class="tdl" style="width:40px;"><b>Year<b></td>
     <td class="td1" style="width:120px;" align="center"><select class="tdsel" style="background-color:#DDFFBB;" name="YearID" id="YearID" onChange="SelectYear(this.value)"><option value="<?php echo $_REQUEST['YI']; ?>" style="margin-left:0px;" selected><?php echo $PRD; ?></option>
<?php for($i=$YearId; $i>=1; $i--){	
	  $s2Y=mysql_query("select * from hrm_year where YearId=".$i,$con); $r2Y=mysql_fetch_assoc($s2Y);
	  $FD2=date("Y",strtotime($r2Y['FromDate'])); $TD2=date("Y",strtotime($r2Y['ToDate'])); ?>
<?php if($_REQUEST['YI']!=$i){ ?><option value="<?php echo $i; ?>"><?php echo $FD2.'-'.$TD2; ?></option><?php } ?>
<?php } ?>
</select></td>

	
	<td class="td1" style="width:150px;"><select class="tdsel" style="background-color:#DDFFBB;" name="DepartmentE" id="DepartmentE" onChange="SelectDeptEmp(this.value)"><?php if($_REQUEST['DPid']!=''){ $SqlDept=mysql_query("select * from hrm_department where DepartmentId=".$_REQUEST['DPid'], $con); $ResDept=mysql_fetch_array($SqlDept); ?><option value="<?php echo $ResDept['DepartmentId']; ?>"><?php echo $ResDept['DepartmentCode'];?></option><?php }else{ ?><option value="" selected>Department</option><?php } $SqlDepartment=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDepartment=mysql_fetch_array($SqlDepartment)) { ?><option value="<?php echo $ResDepartment['DepartmentId']; ?>"><?php echo $ResDepartment['DepartmentCode'];?></option><?php } ?></select>
<input type="hidden" name="DeptId" id="DeptId" value="<?php echo $_REQUEST['DPid']; ?>" /></td>
		
		<td class="font4" align="left">&nbsp;&nbsp;<b><?php //echo $msg; ?></b></td>
	    <td class="tdl"><a href="#" onClick="javascript:OpenWindow()">Print</a></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(( $_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>	
 <tr>
 <td style="width:10px;" valign="top" align="center">&nbsp;</td>
<?php //*********************************************** Open Department******************************************************?> 
<td align="left" id="type" valign="top" style="display:block; width:100%">             
 <table border="0" width="100%">
  <tr>
   <td align="left" width="100%">
   <table border="1" id="table1" cellspacing="1" width="100%" border="1" bgcolor="#FFFFFF">
    <div class="thead">
    <thead>
    <tr bgcolor="#7a6189">
     <td class="th" style="width:3%;">Sn</td>
     <td class="th" style="width:15%;">KRA</td>
     <td class="th" style="width:60%;">Description</td>
     <td class="th" style="width:7%;">Measure</td>
     <td class="th" style="width:5%;">Unit</td>
    </tr>
	</thead>
	</div>
<?php if($_REQUEST['DPid']){ $_SESSION['DPid']=$_REQUEST['DPid'];  		  
$sqlDP = mysql_query("SELECT * from hrm_pms_kra WHERE CompanyId=".$CompanyId." AND YearId=".$_REQUEST['YI']." AND DepartmentId=".$_REQUEST['DPid']." AND (KRAStatus='A' OR KRAStatus='R') GROUP BY KRA order by KRAId ASC", $con); 
      $Sno=1;  while($resDP = mysql_fetch_assoc($sqlDP)) { ?>
	 <div class="tbody">
     <tbody>
	 <tr>
	  <td class="tdc"><?php echo $Sno; ?></td>
	  <td class="tdl"><?php echo $resDP['KRA']; ?></td>
	  <td class="tdl"><?php echo $resDP['KRA_Description']; ?></td>
	  <td class="tdc"><?php echo $resDP['Measure']; ?></td>
	  <td class="tdc"><?php echo $resDP['Unit']; ?></td>
	 </tr>
	 </tbody>
	 </div>
<?php $Sno++; } ?>
<?php  } ?>		
	</table>	 
    </td>
   </tr> 
   <tr>
    <td align="Right" class="fontButton">
	 <table border="0" width="550">
      <tr><td align="right"><?php if($_REQUEST['DPid']){ ?>
		<input type="button" name="NewSave" id="NewSave" value="New" onClick="newsave(<?php echo $_SESSION['DPid']; ?>)" <?php if($_REQUEST['action']=="newsave" OR $_REQUEST['action']=="edit"){ echo "style=display:none;"; }?>/>
		<?php } ?>
		<input type="button" name="back" id="back" style="width:90px;" value="Back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
		<input type="button" name="Refrash" value="Refresh" onClick="javascript:window.location='KRA.php'"/>&nbsp; </td>
		</tr></table>
      </td>
   </tr>
  </table>  
</td>

<?php //******************* Close Department *************************************?>    
 </tr>
<?php } ?> 
</table>

<?php //**************************************************************************?>
<?php //************END*****END*****END******END******END*************************************?>
<?php //*******************************************************************************************?>

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

