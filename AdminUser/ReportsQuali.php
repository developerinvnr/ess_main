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
function SelectDept(v){ window.location='ReportsQuali.php?action=DeptQuali&value='+v;}
function PrintDept(v)
{ var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value; var DeptValue=document.getElementById("DeptValue").value;  
  window.open("PrintQualiReport.php?action=DeptQuali&value="+v+"&c="+ComId+"&y="+YId+"&value="+DeptValue,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=850,height=650");}
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
<?php //**********************************************START*****START*****START******START******START********************************************?>
<?php //********************************************************************************************************************************?>
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
					   &nbsp;&nbsp;(Reports Qualification Proficiency)</td>
                     </tr>
				   </table>					
				   </td> 
<?php } ?>
		           </tr>
                  </table>
				</td>
			 </tr>
<?php //---------------------------------------Display Record----------------------------------------------------------------- ?>
<?php if($_REQUEST['action']=='DeptQuali') { ?>
    <tr>
<?php if($_REQUEST['value']!='All') { $sqlA=mysql_query("select department_name as DepartmentName from core_departments where id=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); } ?>	
	 <td valign="top" style=" width:700px;font-size:14px; color:#005BB7; font-family:Georgia; font-weight:bold;">&nbsp;Employee Qualification Details :
	  &nbsp;&nbsp;(&nbsp;Department - <?php if($_REQUEST['value']!='All') {echo $resA['DepartmentName']; } else {echo 'All';} ?>&nbsp;)&nbsp;&nbsp;&nbsp;
	  <a href="#" onClick="PrintDept('<?php echo $_REQUEST['value']; ?>')" style="font-size:12px;">Export</a>
	 </td>
	</tr>
<?php } ?>


<?php if($_REQUEST['action']=='DeptQuali') { ?>
<tr>
 <td>
   <table border="1" width="800">
 <tr bgcolor="#7a6189">
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Qualification</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Specialization</b></td>	
	<td align="center" style="color:#FFFFFF;" class="All_200"><b>Institute</b></td>	
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Subject</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>PassOut</b></td>	
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Grade/%</b></td>
 </tr>

<?php if($_REQUEST['value']=='All') {$sql=mysql_query("select hrm_employee.*,DepartmentId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' order by ECode ASC", $con); }
else {$sql=mysql_query("select hrm_employee.*,DepartmentId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' order by ECode ASC", $con); } 
$Sno=1; while($res=mysql_fetch_array($sql)){ $Ename=$res['Fname'].' '.$res['Sname'].' '.$res['Lname']; 
$sqlDept=mysql_query("select department_code as DepartmentCode from core_departments where id=".$res['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
?> 
   <tr bgcolor="#BFFF80"><td colspan="6" class="All_400"><b>(<?php echo $Sno; ?>)&nbsp;&nbsp;EC :&nbsp;<?php echo $res['EmpCode']; ?>, &nbsp;&nbsp;Name :&nbsp;<?php echo $Ename; if($_REQUEST['value']=='All'){ ?>	, &nbsp;&nbsp;Department :&nbsp;<?php echo $resDept['DepartmentCode']; } ?></b></td></tr>
    
<?php $sqlQ=mysql_query("select * from hrm_employee_qualification where EmployeeID=".$res['EmployeeID']." order by QualificationId ASC", $con); 
      while($resQ=mysql_fetch_assoc($sqlQ)) { ?>	
   <tr bgcolor="#FFFFFF">
	<td align="" style="" class="All_150"><?php echo $resQ['Qualification']; ?></td>
	<td align="" style="" class="All_150"><?php echo $resQ['Specialization']; ?></td>	
	<td align="" style="" class="All_200"><?php echo $resQ['Institute']; ?></td>	
	<td align="" style="" class="All_150"><?php echo $resQ['Subject']; ?></td>
	<td align="center" style="" class="All_80"><?php echo $resQ['PassOut']; ?></td>	
	<td align="center" style="" class="All_80"><?php echo $resQ['Grade_Per'];?></td>
   </tr>
	 <?php }$Sno++; } ?> 
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