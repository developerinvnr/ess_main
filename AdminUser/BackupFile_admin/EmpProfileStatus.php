<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//****************************************************************************************************************
if($_REQUEST['act']=='ReDir' AND $_REQUEST['EI']!='')
{ $sqlE=mysql_query("select * from hrm_employee where EmployeeID=".$_REQUEST['EI'], $con); $resE=mysql_fetch_assoc($sqlE);
  if($resE['EmpGen_Status']=='N') { $sqlU=mysql_query("update hrm_employee set EmpGen_Status='Y' where EmployeeID=".$_REQUEST['EI'], $con); }
  if($resE['EmpPer_Status']=='N') { $sqlU=mysql_query("update hrm_employee set EmpPer_Status='Y' where EmployeeID=".$_REQUEST['EI'], $con); }
  if($resE['EmpCon_Status']=='N') { $sqlU=mysql_query("update hrm_employee set EmpCon_Status='Y' where EmployeeID=".$_REQUEST['EI'], $con); }
  if($resE['EmpEdu_Status']=='N') { $sqlU=mysql_query("update hrm_employee set EmpEdu_Status='Y' where EmployeeID=".$_REQUEST['EI'], $con); }
  if($resE['EmpExp_Status']=='N') { $sqlU=mysql_query("update hrm_employee set EmpExp_Status='Y' where EmployeeID=".$_REQUEST['EI'], $con); }
  if($resE['EmpFam_Status']=='N') { $sqlU=mysql_query("update hrm_employee set EmpFam_Status='Y' where EmployeeID=".$_REQUEST['EI'], $con); }
  if($resE['EmpLang_Status']=='N') { $sqlU=mysql_query("update hrm_employee set EmpLang_Status='Y' where EmployeeID=".$_REQUEST['EI'], $con);}
  //if($sqlU){echo '<script>alert('successfully updated..');<script>';}
}

if($_REQUEST['act']=='ClearChange' AND $_REQUEST['EI']!='')
{ $sqlU2=mysql_query("update hrm_employee set ExtraChangeStatus='N',ExtraChange='' where EmployeeID=".$_REQUEST['EI'], $con); }

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;} .All{font-size:11px; height:20px;} .All_80{font-size:11px; height:20px; width:80px;}
.All_40{font-size:11px; height:20px; width:40px;} .All_50{font-size:11px; height:20px; width:50px;} .All_70{font-size:11px; height:20px; width:70px;} .All_80{font-size:11px; height:20px; width:80px;}.All_100{font-size:11px; height:20px; width:100px;} .All_120{font-size:11px; height:20px; width:120px;} .All_140{font-size:11px; height:20px; width:140px;} .All_60{font-size:11px; height:20px; width:60px;}
.All_150{font-size:11px; height:20px; width:150px;}.All_170{font-size:11px; height:20px; width:170px;}.All_180{font-size:11px; height:20px; width:180px;}.All_190{font-size:11px; height:20px; width:190px;} .All_200{font-size:11px; height:20px; width:200px;} .All_450{font-size:11px; height:20px; width:450px;}.All_360{font-size:11px; height:20px; width:350px;}.All_540{font-size:11px; height:20px; width:540px;}.All_400{font-size:11px; height:20px; width:400px;} .All_480{font-size:11px; height:20px; width:480px;}.All_600{font-size:11px; height:20px; width:600px;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<style>.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
<Script type="text/javascript">window.history.forward(1);</script>
<Script type="text/javascript" language="javascript">
function SelectDeptEmpprofile(v){ window.location='EmpProfileStatus.php?action=EmpProfile&value='+v;}
function ClickEmpReason(EI)
{window.open("EmpProfileReason.php?id="+EI,"Profile","scrollbars=yes,resizable=no,width=500,height=500"); }
function ClickExtraEmpReason(EI)
{window.open("EmpProfileEtraReason.php?id="+EI,"Profile","scrollbars=yes,resizable=no,width=500,height=200"); }
function ReDir(EI)
{ var DeId=document.getElementById("DeId").value; var agree=confirm("Are you sure..?");
  if (agree) { var x = "EmpProfileStatus.php?act=ReDir&EI="+EI+"&value="+DeId+"&action=EmpProfile";  window.location=x;}}

function ClearChange(EI)
{ var DeId=document.getElementById("DeId").value; var agree=confirm("Are you sure..?");
  if (agree) { var x = "EmpProfileStatus.php?act=ClearChange&EI="+EI+"&value="+DeId+"&action=EmpProfile";  window.location=x;}}  
 
</Script>
</head>
<body class="body">
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" name="YId" id="YId" value="<?php echo $YearId; ?>" />
<input type="hidden" name="UserId" id="UserId" value="<?php echo $UserId; ?>" />
<input type="hidden" name="DeId" id="DeId" value="<?php echo $_REQUEST['value']; ?>" />
<table class="table" border="0">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center" width="100%" id="MainWindow">
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
<table border="0" style="margin-top:0px; width:95%; height:400px;">
	<tr>
		<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>
		<td align="" width="100%" valign="top">
		   <table border="0">
       		 <tr><td colspan="2">
			       <table border="0">
                     <tr>
					  <td colspan="12" align="left" class="heading">Employee Profile Status Report &nbsp;<span id="ReturnValue">&nbsp;</span></td>
					  <td class="td1" style="font-size:11px; width:150px;" align="center">
                       <select style="font-size:11px; width:148px; height:18px; background-color:#DDFFBB;" name="DeptEmpprofile" id="DeptEmpprofile" onChange="SelectDeptEmpprofile(this.value)">                       <option value="" style="margin-left:0px;" selected>Select Department</option>
<?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?>
                       <option value="<?php echo $ResDept['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDept['DepartmentCode'];?></option><?php } ?>
					   <option value="All">&nbsp;All</option>
					   </select></td>
					 </tr>
                  </table>
				</td>
			 </tr>
<?php //---------------------------------------Display Record----------------------------------------------------------------- ?>
<?php if($_REQUEST['action']=='EmpProfile') { ?>
<tr>
 <td>
   <table border="1" width="1100">
     <tr>
<?php if($_REQUEST['value']!='All') {$sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con);  $resA=mysql_fetch_assoc($sqlA); } ?>	
	  <td colspan="16" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Georgia; font-weight:bold;">&nbsp;Employee Profile Status Department Wise :
	  &nbsp;&nbsp;(&nbsp;Department - <?php if($_REQUEST['value']!='All') { echo $resA['DepartmentName'];  } else echo 'All';?>&nbsp;)&nbsp;&nbsp;&nbsp;
	 <?php  /* <a href="#" onClick="PrintAppRev(<?php if($_REQUEST['value']!='All') { echo $resA['DepartmentName'];  } else echo 'All';?>)" style="color:#F9F900; font-size:12px;">Print</a> */ ?>
	  </td>
	 </tr>
	  <tr bgcolor="#7a6189">
    <td align="center" colspan="4" style="color:#FFFFFF;" class="All_340"></td>
	<td align="center" style="color:#FFFFFF;" colspan="7" class="All_480"><b>Profile Status</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_70"></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"></td>
	<td align="center" style="color:#FFFFFF;" class="All_40"></td>
	<td align="center" style="color:#FFFFFF;" class="All_70"></td>
	<td align="center" style="color:#FFFFFF;" class="All_40"></td>
 </tr>
<tr bgcolor="#7a6189">
    <td align="center" style="color:#FFFFFF;" class="All_40"><b>SNo.</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_60"><b>EmpCode</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_180"><b>Name</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_100"><b>Department</b></td>
 
    <td align="center" style="color:#FFFFFF;" class="All_80"><b>General</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_80"><b>Personal</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Contact</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_80"><b>Education</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Experience</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_80"><b>Family</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Language</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_70"><b>Click</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>Certify</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_40"><b></b></td>
	<td align="center" style="color:#FFFFFF;" class="All_70"><b>Change</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_40"><b>Clear</b></td>
 </tr>
<?php if($_REQUEST['value']=='All') { $sql = mysql_query("SELECT hrm_employee.*, DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID WHERE hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." order by EmpCode ASC", $con); }
      else { $sql = mysql_query("SELECT hrm_employee.*, DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID WHERE hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." order by EmpCode ASC", $con); }
$no=1; while($res = mysql_fetch_array($sql)) { ?>
<tr id="TR_<?php echo $no; ?>" <?php if($res['ExtraAllowPMS']==1) { ?> bgcolor="#2C9326" <?php } else { ?> bgcolor="#FFFFFF" <?php } ?> >
    <td align="center" style="" class="All_40"><?php echo $no; ?></td>
    <td align="center" style="" class="All_60"><?php echo $res['EmpCode']; ?></td>
	<td align="" style="" class="All_180">&nbsp;<?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
<?php $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con);  $resDept=mysql_fetch_assoc($sqlDept); ?> 
	<td align="" style="" class="All_120">&nbsp;<?php echo $resDept['DepartmentCode']; ?></td>
	<td align="center" style="background-color:<?php if($res['EmpGen_Status']=='YY'){echo '#88FF88';}if($res['EmpGen_Status']=='Y'){echo '#FFFFFF';}if($res['EmpGen_Status']=='N'){echo '#FF7171';} ?>;"  class="All_80">
	<?php if($res['EmpGen_Status']=='YY'){echo 'Agree';}if($res['EmpGen_Status']=='Y'){echo 'NoAction';}if($res['EmpGen_Status']=='N'){echo 'DisAgree';} ?></td>
	<td align="center" style="background-color:<?php if($res['EmpPer_Status']=='YY'){echo '#88FF88';}if($res['EmpPer_Status']=='Y'){echo '#FFFFFF';}if($res['EmpPer_Status']=='N'){echo '#FF7171';} ?>;"  class="All_80">
	<?php if($res['EmpPer_Status']=='YY'){echo 'Agree';}if($res['EmpPer_Status']=='Y'){echo 'NoAction';}if($res['EmpPer_Status']=='N'){echo 'DisAgree';} ?></td>
	<td align="center" style="background-color:<?php if($res['EmpCon_Status']=='YY'){echo '#88FF88';}if($res['EmpCon_Status']=='Y'){echo '#FFFFFF';}if($res['EmpCon_Status']=='N'){echo '#FF7171';} ?>;"  class="All_80">
	<?php if($res['EmpCon_Status']=='YY'){echo 'Agree';}if($res['EmpCon_Status']=='Y'){echo 'NoAction';}if($res['EmpCon_Status']=='N'){echo 'DisAgree';} ?></td>	
	<td align="center" style="background-color:<?php if($res['EmpEdu_Status']=='YY'){echo '#88FF88';}if($res['EmpEdu_Status']=='Y'){echo '#FFFFFF';}if($res['EmpEdu_Status']=='N'){echo '#FF7171';} ?>;"  class="All_80">
	<?php if($res['EmpEdu_Status']=='YY'){echo 'Agree';}if($res['EmpEdu_Status']=='Y'){echo 'NoAction';}if($res['EmpEdu_Status']=='N'){echo 'DisAgree';} ?></td>
	<td align="center" style="background-color:<?php if($res['EmpExp_Status']=='YY'){echo '#88FF88';}if($res['EmpExp_Status']=='Y'){echo '#FFFFFF';}if($res['EmpExp_Status']=='N'){echo '#FF7171';} ?>;"  class="All_80">
	<?php if($res['EmpExp_Status']=='YY'){echo 'Agree';}if($res['EmpExp_Status']=='Y'){echo 'NoAction';}if($res['EmpExp_Status']=='N'){echo 'DisAgree';} ?></td>
	<td align="center" style="background-color:<?php if($res['EmpFam_Status']=='YY'){echo '#88FF88';}if($res['EmpFam_Status']=='Y'){echo '#FFFFFF';}if($res['EmpFam_Status']=='N'){echo '#FF7171';} ?>;" class="All_80">
	<?php if($res['EmpFam_Status']=='YY'){echo 'Agree';}if($res['EmpFam_Status']=='Y'){echo 'NoAction';}if($res['EmpFam_Status']=='N'){echo 'DisAgree';} ?></td>
	<td align="center" style="background-color:<?php if($res['EmpLang_Status']=='YY'){echo '#88FF88';}if($res['EmpLang_Status']=='Y'){echo '#FFFFFF';}if($res['EmpLang_Status']=='N'){echo '#FF7171';} ?>;" class="All_80">
	<?php if($res['EmpLang_Status']=='YY'){echo 'Agree';}if($res['EmpLang_Status']=='Y'){echo 'NoAction';}if($res['EmpLang_Status']=='N'){echo 'DisAgree';} ?></td>
	<td align="center" style="" class="All_80">
	<?php if($res['EmpGen_Status']=='N' OR $res['EmpPer_Status']=='N' OR $res['EmpCon_Status']=='N' OR $res['EmpEdu_Status']=='N' OR $res['EmpFam_Status']=='N' OR $res['EmpExp_Status']=='N' OR $res['EmpLang_Status']=='N') {?>
	<a href="#" onClick="ClickEmpReason(<?php echo $res['EmployeeID']; ?>)">Reason</a><?php } ?></td>
	<td align="center" style="background-color:<?php if($res['ProfileCertify']=='Y'){echo '#88FF88';}if($res['ProfileCertify']=='N'){echo '#FF7171';} ?>;" class="All_50"><?php if($res['ProfileCertify']=='N') { echo 'NO';}if($res['ProfileCertify']=='Y') { echo 'YES';}?></td>
	<td align="center">
<?php if($_SESSION['User_Permission']=='Edit'){?>
	<?php if($res['EmpGen_Status']=='N' OR $res['EmpPer_Status']=='N' OR $res['EmpCon_Status']=='N' OR $res['EmpEdu_Status']=='N' OR $res['EmpExp_Status']=='N' OR $res['EmpFam_Status']=='N' OR $res['EmpLang_Status']=='N') { ?>
	<a href="#"><img src="images/go-back-icon.png" onClick="ReDir(<?php echo $res['EmployeeID']; ?>)" border="0"></a>
	<?php } ?>
<?php } ?>
	</td>
	<td align="center" style="" class="All_70">
	<?php if($res['ExtraChangeStatus']=='Y') {?><a href="#" onClick="ClickExtraEmpReason(<?php echo $res['EmployeeID']; ?>)">Reason</a><?php } ?></td>
	<td align="center">
<?php if($_SESSION['User_Permission']=='Edit'){?>
<a href="#"><img src="images/go-back-icon.png" onClick="ClearChange(<?php echo $res['EmployeeID']; ?>)" border="0"></a>
<?php } ?>
</td>
</tr>
<?php $no++;} ?> 
   </table>
 </td>
</tr> 
   </table>
 </td>
</tr> 
<?php } ?>
<?php //---------------------------------------Close Record----------------------------------------------------------------- ?>
	   </table>
     </tr>
</table>
		 </td> 
	   </tr>
	 </table>
   </td>
 </tr>
		   </table>
		    </form>  		
		</td>
        <?php } ?>
		<?php //-------------------------------------------------------------------------------------------------------- ?>
		<td align="left" width="20%">&nbsp;</td>
	</tr>
</table>
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************END*****END*****END******END******END***************************************************************?>
<?php //************************************************************************************************************************************************************?>
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