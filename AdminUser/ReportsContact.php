<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//****************************************************************************************************************
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;} .All{font-size:11px; height:20px;} .All_80{font-size:11px; height:20px; width:80px;}
.All_40{font-size:11px; height:20px; width:40px;} .All_50{font-size:11px; height:20px; width:50px;} .All_70{font-size:11px; height:20px; width:70px;} .All_80{font-size:11px; height:20px; width:80px;}.All_100{font-size:11px; height:20px; width:100px;} .All_120{font-size:11px; height:20px; width:120px;} .All_140{font-size:11px; height:20px; width:140px;} .All_60{font-size:11px; height:20px; width:60px;}
.All_150{font-size:11px; height:20px; width:150px;}.All_170{font-size:11px; height:20px; width:170px;}.All_180{font-size:11px; height:20px; width:180px;}.All_190{font-size:11px; height:20px; width:190px;} .All_200{font-size:11px; height:20px; width:200px;} .All_450{font-size:11px; height:20px; width:450px;}.All_360{font-size:11px; height:20px; width:350px;}.All_540{font-size:11px; height:20px; width:540px;}.All_400{font-size:11px; height:20px; width:400px;} .All_600{font-size:11px; height:20px; width:600px;}
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
function SelectDept(v){ window.location='ReportsContact.php?action=DeptContact&value='+v;}
function PrintDept(v)
{ var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value; var DeptValue=document.getElementById("DeptValue").value;  
  window.open("PrintContactReport.php?action=DeptContact&value="+v+"&c="+ComId+"&y="+YId+"&value="+DeptValue,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=1250,height=650");}
</Script>  
</head>
<body class="body">
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" name="YId" id="YId" value="<?php echo $YearId; ?>" />
<input type="hidden" name="UserId" id="UserId" value="<?php echo $UserId; ?>" />
<input type="hidden" name="DeptValue" id="DeptValue" value="<?php echo $_REQUEST['value']; ?>" />
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
			 <tr><td>
			       <table>
				     <tr>
<?php  if($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') { ?>
				   <td>
				    <table border="0">						
                    <tr>
				<td class="td1" style="width:2800px; height:20px; font-size:15px; font-family:Times New Roman; color:#00274F; font-weight:bold;" align="">Department :
					 &nbsp;&nbsp;
                       <select style="font-size:11px; width:148px; height:18px; background-color:#DDFFBB;" name="Dept" id="Dept" onChange="SelectDept(this.value)">                       <option value="" style="margin-left:0px;" selected>Select Department</option>
<?php $SqlDept=mysql_query("select * from core_departments where is_active=1 order by department_name", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?>
                       <option value="<?php echo $ResDept['id']; ?>"><?php echo '&nbsp;'.$ResDept['department_name'];?></option><?php } ?>
					   <option value="All">&nbsp;All</option></select>
					   &nbsp;&nbsp;(Reports Contact)</td>
                     </tr>
				   </table>					
				   </td> 
<?php } ?>
		           </tr>
                  </table>
				</td>
			 </tr>
<?php //---------------------------------------Display Record----------------------------------------------------------------- ?>



<?php if($_REQUEST['action']=='DeptContact') { ?>
<tr>
 <td>
   <table border="1" width="2000">
     <tr>
<?php if($_REQUEST['value']!='All') { $sqlA=mysql_query("select department_name as DepartmentName from core_departments where id=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); } ?>	
	  <td colspan="25" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Georgia; font-weight:bold;">&nbsp;Employee Contact Details :
	  &nbsp;&nbsp;(&nbsp;Department - <?php if($_REQUEST['value']!='All') {echo $resA['DepartmentName']; } else {echo 'All';} ?>&nbsp;)&nbsp;&nbsp;&nbsp;
	  <a href="#" onClick="PrintDept('<?php echo $_REQUEST['value']; ?>')" style="color:#F9F900; font-size:12px;">Export</a>
	  </td>
	 </tr>
	 <tr bgcolor="#7a6189">
	 <td colspan="4" align="center" style="color:#FFFFFF;font-size:11px;" class="All_100"></td>
	 <td colspan="4" align="center" style="color:#FFFFFF;font-size:11px;"><b>Current</b></td>
	 <td colspan="4" align="center" style="color:#FFFFFF;font-size:11px;"><b>Parmanent</b></td>
	 <td colspan="4" align="center" style="color:#FFFFFF;font-size:11px;"><b>Emergency</b></td>
	 <td colspan="4" align="center" style="color:#FFFFFF;font-size:11px;"><b>Referance(Personal)</b></td>
	 <td colspan="5" align="center" style="color:#FFFFFF;font-size:11px;"><b>Referance(Professional)</b></td>
	 </tr>
 <tr bgcolor="#7a6189">
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>SNo.</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_70"><b>EC</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_200"><b>Name</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_80"><b>Department</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_200"><b>Designation</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Address</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>State</b></td>	
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>City</b></td>	
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>PinNo</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Address</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>State</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>City</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>PinNo</b></td>
	
	<td align="center" style="color:#FFFFFF;" class="All_120"><b>Name</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_70"><b>Contact</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Relation</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>EmailId</b></td>
	
	<td align="center" style="color:#FFFFFF;" class="All_120"><b>Name</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_70"><b>Contact</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Relation</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>EmailId</b></td>
	
	<td align="center" style="color:#FFFFFF;" class="All_120"><b>Name</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_70"><b>Contact</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>EmailId</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Company</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_100"><b>Desig</b></td>
</tr>

<?php if($_REQUEST['value']=='All') {$sql=mysql_query("select hrm_employee.*, hrm_employee_contact.*,DepartmentId,DesigId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_contact ON hrm_employee_general.EmployeeID=hrm_employee_contact.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' order by ECode ASC", $con); }
else {$sql=mysql_query("select hrm_employee.*, hrm_employee_contact.*,DepartmentId,DesigId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_contact ON hrm_employee_general.EmployeeID=hrm_employee_contact.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' order by ECode ASC", $con); } 
$Sno=1; while($res=mysql_fetch_array($sql)){ $Ename=$res['Fname'].' '.$res['Sname'].' '.$res['Lname']; 
$sqlDept=mysql_query("select department_code as DepartmentCode from core_departments where id=".$res['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
$sqlDesig=mysql_query("select designation_name as DesigName from core_designation where id=".$res['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
?> 
   <tr bgcolor="#FFFFFF">
	<td align="center" style="" class="All_50" valign="top"><?php echo $Sno; ?></td>
	<td align="center" style="background-color:#E8D2FB;" class="All_70" valign="top"><?php echo $res['EmpCode']; ?></td>
	<td align="" style="background-color:#E8D2FB;" class="All_200" valign="top"><?php echo $Ename; ?></td>
    <td align="" style="background-color:#E8D2FB;" class="All_80" valign="top"><?php echo $resDept['DepartmentCode']; ?></td>
    <td align="" style="" class="All_200" valign="top"><?php echo $resDesig['DesigName']; ?></td>    
	<td align="" style="" class="All_150" valign="top"><?php echo $res['CurrAdd']; ?></td>
<?php $sqlS1=mysql_query("select StateName from hrm_state where StateId=".$res['CurrAdd_State'], $con); $resS1=mysql_fetch_assoc($sqlS1); ?>	
	<td align="" style="" class="All_80" valign="top"><?php echo $resS1['StateName']; ?></td>	
<?php $sqlC1=mysql_query("select CityName from hrm_city where CityId=".$res['CurrAdd_City'], $con); $resC1=mysql_fetch_assoc($sqlC1); ?>	
	<td align="" style="" class="All_80" valign="top"><?php echo $resC1['CityName']; ?></td>	
	<td align="" style="" class="All_50" valign="top"><?php echo $res['CurrAdd_PinNo']; ?></td>
	<td align="" style="" class="All_150" valign="top"><?php echo $res['ParAdd']; ?></td>
<?php $sqlS2=mysql_query("select StateName from hrm_state where StateId=".$res['ParAdd_State'], $con); $resS2=mysql_fetch_assoc($sqlS2); ?>	
	<td align="" style="" class="All_80" valign="top"><?php echo $resS2['StateName']; ?></td>
<?php $sqlC2=mysql_query("select CityName from hrm_city where CityId=".$res['ParAdd_City'], $con); $resC2=mysql_fetch_assoc($sqlC2); ?>	
	<td align="" style="" class="All_80" valign="top"><?php echo $resC2['CityName']; ?></td>
	<td align="" style="" class="All_50" valign="top"><?php echo $res['ParAdd_PinNo']; ?></td>
	
	<td align="" style="background-color:#95CAFF;" class="All_120" valign="top"><?php echo $res['EmgName']; ?></td>
	<td align="" style="background-color:#95CAFF;" class="All_70" valign="top"><?php echo $res['EmgContactNo']; ?></td>
	<td align="" style="background-color:#95CAFF;" class="All_80" valign="top"><?php echo $res['EmgRelation']; ?></td>
	<td align="" style="background-color:#95CAFF;" class="All_150" valign="top"><?php echo $res['EmgEmailId']; ?></td>
	
	<td align="" style="background-color:#C9FDB0;" class="All_120" valign="top"><?php echo $res['Personal_RefName']; ?></td>
	<td align="" style="background-color:#C9FDB0;" class="All_70" valign="top"><?php echo $res['Personal_RefContactNo']; ?></td>
	<td align="" style="background-color:#C9FDB0;" class="All_80" valign="top"><?php echo $res['Personal_RefRelation']; ?></td>
	<td align="" style="background-color:#C9FDB0;" class="All_150" valign="top"><?php echo $res['Personal_RefEmailId']; ?></td>
	
	<td align="" style="background-color:#FCFAB1;" class="All_120" valign="top"><?php echo $res['Prof_RefName']; ?></td>
	<td align="" style="background-color:#FCFAB1;" class="All_70" valign="top"><?php echo $res['Prof_RefContactNo']; ?></td>
	<td align="" style="background-color:#FCFAB1;" class="All_150" valign="top"><?php echo $res['Prof_RefEmailId']; ?></td>
	<td align="" style="background-color:#FCFAB1;" class="All_150" valign="top"><?php echo $res['Prof_RefCompany']; ?></td>
	<td align="" style="background-color:#FCFAB1;" class="All_100" valign="top"><?php echo $res['Prof_RefDesig']; ?></td>
	</tr>   
	 <?php $Sno++; } ?> 
   </table>
 </td>
</tr> 
<?php } ?>
<?php //---------------------------------------Close Record----------------------------------------------------------------- ?>

	   </table>
     </tr>
	 <tr>
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