<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
if($_SESSION['login'] = true){require_once('PhpFile/DeptGradeDesigP.php'); } else {$msg= "Session Expiry..............."; }
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
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/MandatoryAjaxCall.js"></script>
<Script type="text/javascript">window.history.forward(1);</script>
<Script type="text/javascript">window.history.forward(1);
function deleteDeptGradeDesig() { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var a = document.getElementById("DeptGradeDesigId").value; var x = "DeptGradeDesig.php?action=delete&did="+a;  window.location=x;}}
</Script>
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
	  <td align="right" width="480" class="heading">Department-Grade-Designation</td>
	  <td align="left">
	    <b><span id="Vtype" class="span">: -&nbsp;deptgradedesig</span></b>
	  </td>
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>	
 <tr>
 <td style="width:100px;" valign="top" align="center">&nbsp;
   <table border="0" cellpadding="0px;" align="center">
	<tr><td align="center">&nbsp;</td></tr>
   </table>
 </td>
 <td width="100">&nbsp;</td>
<?php //*********************************************** Open Department******************************************************?> 
<td align="left" id="type" valign="top" style="display:block;">             
  <form  name="formDeptGradeDesig" method="post" onSubmit="return validate(this)">
   <table border="0">
	<tr>
	  <td align="left"><table border="0" width="650">
	    <tr>
		   <td class="td1" style="font-size:11px; width:380px;" valign="top">
		   <span id="SubDGD"> </span>
		      <table id="tableSubDGD" style="display:block;">
			     <tr><td style="font-size:11px; height:18px;">Department :</td>
				     <td><select style="font-size:11px; width:220px; height:18px; background-color:#DDFFBB;" name="DeptName" id="DeptName" onChange="DGD_Dept(this.value)">
			             <option style="background-color:#DBD3E2;" value="">&nbsp;Select</option>
 <?php $SqlDept=mysql_query("select * from hrm_department where DeptStatus='A' AND CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?>
						 <option value="<?php echo $ResDept['DepartmentId']; ?>">&nbsp;<?php echo $ResDept['DepartmentCode'].'&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;'.$ResDept['DepartmentName']; ?></option><?php } ?>
						 </select>
						 <input type="hidden" name="CompanyId" id="CompanyId" value="<?php echo $_SESSION['CompanyId']; ?>" /></td>
				 </tr>
				 
				 <tr><td style="font-size:11px; height:18px;">Designation :</td>
				     <td><select style="font-size:11px; width:220px; height:18px; background-color:#DDFFBB;" name="DesigName" id="DesigName" onChange="DGD_Designation(this.value)" disabled>
			             <option style="background-color:#DBD3E2;" value="">&nbsp;Select</option>
 <?php $SqlDesig=mysql_query("select * from hrm_designation where DesigStatus='A' AND CompanyId=".$CompanyId." order by DesigId ASC", $con); while($ResDesig=mysql_fetch_array($SqlDesig)) { ?>
						<option value="<?php echo $ResDesig['DesigId']; ?>">&nbsp;<?php echo $ResDesig['DesigCode'].'&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;'.$ResDesig['DesigName']; ?></option><?php } ?>
						</select></td>
				 </tr>		 
			  </table>
		  
		   </td>
		   <td align="right" style="font-size:11px; width:180px;"><span id="DGD">
                            <select style="width:250px; background-color:#F1EDF8;" name="SelectDGD_Desig"  size="8" disabled>
                             <option value="">&nbsp;</option>
                            </select>
                            </span></td>
		</tr></table>
	  </td>
    </tr>
<?php if($_SESSION['User_Permission']=='Edit'){?>	  
   <tr>
      <td align="Right" class="fontButton"><table border="0" width="550">
		<tr>
		 
		 <td align="right"><input type="submit" name="ChangeDeptGradeDesig" id="ChangeDeptGradeDesig" style="width:90px; display:none;" value="change"></td>
		 <td align="right" style="width:70px;"><input type="button" name="DeleteDeptGradeDesig" id="DeleteDeptGradeDesig" value="delete" style="width:90px; display:none;" onClick="deleteDeptGradeDesig()">
		                                       <input type="submit" name="AddNewDeptGradeDesig" id="AddNewDeptGradeDesig" style="width:90px; display:block;" value="add new" disabled></td>
		 <td align="right" style="width:80px;"><input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/></td>
		 <td align="right" style="width:70px;"><input type="button" name="RefreshDeptGradeDesig" id="RefreshDeptGradeDesig" style="width:90px;" value="refresh" onClick="javascript:window.location='DeptGradeDesig.php'"/></td>
		</tr></table>
      </td>
   </tr>
<?php } ?>
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
