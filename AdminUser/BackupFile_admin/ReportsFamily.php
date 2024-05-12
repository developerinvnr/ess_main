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
function SelectDept(v){ window.location='ReportsFamily.php?action=DeptFamily&value='+v;}
function PrintDept(v)
{ var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value; var DeptValue=document.getElementById("DeptValue").value;  
  window.open("PrintFamilyReport.php?action=DeptFamily&value="+v+"&c="+ComId+"&y="+YId+"&value="+DeptValue,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=850,height=650");}
  
function Print2Dept(v)
{ var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value; var DeptValue=document.getElementById("DeptValue").value;  
  window.open("PrintFamilyReport.php?action=Dept2Family&value="+v+"&c="+ComId+"&y="+YId+"&value="+DeptValue,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=850,height=650");}  
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
<?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DepartmentCode!='MANAGEMENT' order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?>
                       <option value="<?php echo $ResDept['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDept['DepartmentCode'];?></option><?php } ?>
					   <option value="All">&nbsp;All</option></select>
					   &nbsp;&nbsp;(Reports Family)</td>
                     </tr>
				   </table>					
				   </td> 
<?php } ?>
		           </tr>
                  </table>
				</td>
			 </tr>
<?php //---------------------------------------Display Record----------------------------------------------------------------- ?>
<?php if($_REQUEST['action']=='DeptFamily') { ?>
    <tr>
<?php if($_REQUEST['value']!='All') { $sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); } ?>	
	 <td valign="top" style=" width:700px;font-size:14px; color:#005BB7; font-family:Georgia; font-weight:bold;">&nbsp;Employee Family Details :
	  &nbsp;&nbsp;(&nbsp;Department - <?php if($_REQUEST['value']!='All') {echo $resA['DepartmentName']; } else {echo 'All';} ?>&nbsp;)&nbsp;&nbsp;&nbsp;
	  <a href="#" onClick="PrintDept('<?php echo $_REQUEST['value']; ?>')" style="font-size:12px;">Export</a>
	  
	  &nbsp;&nbsp;
	  <a href="#" onClick="Print2Dept('<?php echo $_REQUEST['value']; ?>')" style="font-size:12px;">Export [Without Family]</a>
	  
	 </td>
	</tr>
<?php } ?>


<?php if($_REQUEST['action']=='DeptFamily') { ?>
<tr>
 <td>
   <table border="1" width="1000">
 <tr bgcolor="#7a6189">
	<td align="center" style="color:#FFFFFF;" class="All_100"><b>Relation</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_250"><b>Name</b></td>	
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Qualification</b></td>	
	<td align="center" style="color:#FFFFFF;" class="All_70"><b>DOB</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Occupation</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_100"><b>Covid<br>Dose-1</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_100"><b>Covid<br>Dose-2</b></td>	
	<td align="center" style="color:#FFFFFF;" class="All_100"><b>Dose-1<br>Certificate</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_100"><b>Dose-2<br>Certificate</b></td>
 </tr>

<?php if($_REQUEST['value']=='All') {$sql=mysql_query("select hrm_employee.*,DepartmentId,Married,Gender,Covid_Vaccin,Covid_Vaccin2,Covid_Vaccin_file,Covid_Vaccin2_file from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' order by EmpCode ASC", $con); }
else {$sql=mysql_query("select hrm_employee.*,DepartmentId,Married,Gender,Covid_Vaccin,Covid_Vaccin2,Covid_Vaccin_file,Covid_Vaccin2_file from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' order by EmpCode ASC", $con); } 
$Sno=1; while($res=mysql_fetch_array($sql)){ $Ename=$res['Fname'].' '.$res['Sname'].' '.$res['Lname']; 
$sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
?> 
   <tr bgcolor="#BFFF80"><td colspan="5" class="All_400"><b>(<?php echo $Sno; ?>)&nbsp;&nbsp;EC :&nbsp;<?php echo $res['EmpCode']; ?>, &nbsp;&nbsp;Name :&nbsp;<?php echo $Ename; if($_REQUEST['value']=='All'){ ?>	, &nbsp;&nbsp;Department :&nbsp;<?php echo $resDept['DepartmentCode']; } ?></b></td>
   <td align="center" style="" class="All_100"><?php echo $res['Covid_Vaccin']; ?></td>
   <td align="center" style="" class="All_100"><?php echo $res['Covid_Vaccin2']; ?></td>
   <td align="center" style="" class="All_100"><?php if($res['Covid_Vaccin_file']!=''){ echo '<a href="../Employee/CovidCert/'.$res['Covid_Vaccin_file'].'" target="_blank">Uploaded</a>'; } ?></td>
   <td align="center" style="" class="All_100"><?php if($res['Covid_Vaccin2_file']!=''){ echo '<a href="../Employee/CovidCert/'.$res['Covid_Vaccin2_file'].'" target="_blank">Uploaded</a>'; } ?></td>
   </tr>
   
<?php $sqlEF=mysql_query("select * from hrm_employee_family where EmployeeID=".$res['EmployeeID'], $con); $rowEF=mysql_num_rows($sqlEF); $resEF=mysql_fetch_assoc($sqlEF);?>	
 <tr bgcolor="#FFFFFF">
	<td align="" style="" class="All_200"><?php echo 'Father'; ?></td>
	<td align="" style="" class="All_250"><?php echo $resEF['Fa_SN'].'. '.$resEF['FatherName']; ?></td>	
	<td align="" style="" class="All_150"><?php echo $resEF['FatherQuali']; ?></td>	
	<td align="center" style="" class="All_70"><?php if($resEF['FatherDOB']=='1970-01-01' OR $resEF['FatherDOB']=='0000-00-00'){echo '';}else {echo date("d-M-y", strtotime($resEF['FatherDOB'])); } ?></td>
	<td align="" style="" class="All_150"><?php echo $resEF['FatherOccupation']; ?></td>
	<td align="center" style="" class="All_100"><?php echo $resEF['Covid_VaccinF']; ?></td>
    <td align="center" style="" class="All_100"><?php echo $resEF['Covid_VaccinF2']; ?></td>
    <td align="center" style="" class="All_100"><?php if($resEF['Covid_VaccinF_file']!=''){ echo '<a href="../Employee/CovidCert/'.$resEF['Covid_VaccinF_file'].'" target="_blank">Uploaded</a>'; } ?></td>
    <td align="center" style="" class="All_100"><?php if($resEF['Covid_VaccinF2_file']!=''){ echo '<a href="../Employee/CovidCert/'.$resEF['Covid_VaccinF2_file'].'" target="_blank">Uploaded</a>'; } ?></td>
 </tr>
 <tr bgcolor="#FFFFFF">
	<td align="" style="" class="All_200"><?php echo 'Mother'; ?></td>
	<td align="" style="" class="All_250"><?php echo $resEF['Mo_SN'].'. '.$resEF['MotherName']; ?></td>	
	<td align="" style="" class="All_150"><?php echo $resEF['MotherQuali']; ?></td>	
	<td align="center" style="" class="All_70"><?php if($resEF['MotherDOB']=='1970-01-01' OR $resEF['MotherDOB']=='0000-00-00'){echo '';}else {echo date("d-M-y", strtotime($resEF['MotherDOB'])); }?></td>
	<td align="" style="" class="All_150"><?php echo $resEF['MotherOccupation']; ?></td>
	<td align="center" style="" class="All_100"><?php echo $resEF['Covid_VaccinM']; ?></td>
    <td align="center" style="" class="All_100"><?php echo $resEF['Covid_VaccinM2']; ?></td>
    <td align="center" style="" class="All_100"><?php if($resEF['Covid_VaccinM_file']!=''){ echo '<a href="../Employee/CovidCert/'.$resEF['Covid_VaccinM_file'].'" target="_blank">Uploaded</a>'; } ?></td>
    <td align="center" style="" class="All_100"><?php if($resEF['Covid_VaccinM2_file']!=''){ echo '<a href="../Employee/CovidCert/'.$resEF['Covid_VaccinM2_file'].'" target="_blank">Uploaded</a>'; } ?></td>
 </tr>
 <?php if($res['Married']=='Y') { ?> 	
 <tr bgcolor="#FFFFFF">
	<td align="" style="" class="All_200"><?php if($res['Gender']=='M'){echo 'Wife';} else{echo 'Husband';} ?></td>
	<td align="" style="" class="All_250"><?php echo $resEF['HW_SN'].'. '.$resEF['HusWifeName']; ?></td>	
	<td align="" style="" class="All_150"><?php echo $resEF['HusWifeQuali']; ?></td>	
	<td align="center" style="" class="All_70"><?php if($resEF['HusWifeDOB']=='1970-01-01' OR $resEF['HusWifeDOB']=='0000-00-00'){echo '';}else { echo date("d-M-y", strtotime($resEF['HusWifeDOB'])); }?></td>
	<td align="" style="" class="All_150"><?php echo $resEF['HusWifeOccupation']; ?></td>
	<td align="center" style="" class="All_100"><?php echo $resEF['Covid_VaccinW']; ?></td>
    <td align="center" style="" class="All_100"><?php echo $resEF['Covid_VaccinW2']; ?></td>
    <td align="center" style="" class="All_100"><?php if($resEF['Covid_VaccinW_file']!=''){ echo '<a href="../Employee/CovidCert/'.$resEF['Covid_VaccinW_file'].'" target="_blank">Uploaded</a>'; } ?></td>
    <td align="center" style="" class="All_100"><?php if($resEF['Covid_VaccinW2_file']!=''){ echo '<a href="../Employee/CovidCert/'.$resEF['Covid_VaccinW2_file'].'" target="_blank">Uploaded</a>'; } ?></td>
 </tr>
<?php } $sqlEF2=mysql_query("select * from hrm_employee_family2 where EmployeeID=".$res['EmployeeID'], $con); 
$rowEF2=mysql_num_rows($sqlEF2); if($rowEF2>0) { while($resEF2=mysql_fetch_array($sqlEF2)) {?> 
 <tr bgcolor="#FFFFFF">
	<td align="" style="" class="All_200"><?php echo $resEF2['FamilyRelation']; ?></td>
	<td align="" style="" class="All_250"><?php echo $resEF2['Fa2_SN'].'. '.$resEF2['FamilyName']; ?></td>	
	<td align="" style="" class="All_150"><?php echo $resEF2['FamilyQualification']; ?></td>	
	<td align="center" style="" class="All_70"><?php if($resEF['FamilyDOB']=='1970-01-01' OR $resEF['FamilyDOB']=='0000-00-00'){echo date("d-M-y", strtotime($resEF2['FamilyDOB'])); }?></td>
	<td align="" style="" class="All_150"><?php echo $resEF2['FamilyOccupation']; ?></td>
	<td align="center" style="" class="All_100"><?php echo $resEF2['Covid_Vaccin']; ?></td>
    <td align="center" style="" class="All_100"><?php echo $resEF2['Covid_Vaccin2']; ?></td>
    <td align="center" style="" class="All_100"><?php if($resEF2['Covid_Vaccin_file']!=''){ echo '<a href="../Employee/CovidCert/'.$resEF2['Covid_Vaccin_file'].'" target="_blank">Uploaded</a>'; } ?></td>
    <td align="center" style="" class="All_100"><?php if($resEF2['Covid_Vaccin2_file']!=''){ echo '<a href="../Employee/CovidCert/'.$resEF2['Covid_Vaccin2_file'].'" target="_blank">Uploaded</a>'; } ?></td>
 </tr>
<?php } } $Sno++; } ?> 
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