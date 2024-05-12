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
function SelectDept(v){ window.location='ReportsCTC.php?action=DeptCTC&value='+v;}
function PrintDept(v)
{ var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value; var DeptValue=document.getElementById("DeptValue").value;  
  window.open("PrintCTCReport.php?action=DeptCTC&value="+v+"&c="+ComId+"&y="+YId+"&value="+DeptValue,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=1600,height=650");}

function ExportCtc(v)
{ var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value; var DeptValue=document.getElementById("DeptValue").value;  
  window.open("ReportCSVCtc.php?action=CtcExport&value="+v+"&C="+ComId+"&Y="+YId+"&value="+DeptValue,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");} 

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
				<td class="td1" style="width:2200px; height:20px; font-size:15px; font-family:Times New Roman; color:#00274F; font-weight:bold;" align="">Department :
					 &nbsp;&nbsp;
                       <select style="font-size:11px; width:148px; height:18px; background-color:#DDFFBB;" name="Dept" id="Dept" onChange="SelectDept(this.value)">                       <option value="" style="margin-left:0px;" selected>Select Department</option>
<?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DepartmentCode!='MANAGEMENT' order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?>
                       <option value="<?php echo $ResDept['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDept['DepartmentCode'];?></option><?php } ?>
					   <option value="All">&nbsp;All</option></select>
					   &nbsp;&nbsp;(Reports CTC)</td>
                     </tr>
				   </table>					
				   </td> 
<?php } ?>
		           </tr>
                  </table>
				</td>
			 </tr>
<?php //---------------------------------------Display Record----------------------------------------------------------------- ?>
<?php if($_REQUEST['action']=='DeptCTC') { ?>
    <tr>
<?php if($_REQUEST['value']!='All') { $sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); } ?>	
	 <td valign="top" style=" width:700px;font-size:14px; color:#005BB7; font-family:Georgia; font-weight:bold;">&nbsp;Employee CTC Details :
	  &nbsp;&nbsp;(&nbsp;Department - <?php if($_REQUEST['value']!='All') {echo $resA['DepartmentName']; } else {echo 'All';} ?>&nbsp;)&nbsp;&nbsp;&nbsp;
	  <a href="#" onClick="PrintDept('<?php echo $_REQUEST['value']; ?>')" style="font-size:12px;">Print</a>
          &nbsp;&nbsp;<a href="#" onClick="ExportCtc('<?php echo $_REQUEST['value']; ?>')" style="font-size:12px;">Export Excel</a>
	 </td>
	</tr>
<?php } ?>


<?php if($_REQUEST['action']=='DeptCTC') { ?>
<tr>
 <td>
   <table border="1" width="2000">
<tr bgcolor="#7a6189">
<td align="center" style="color:#FFFFFF;" class="All_50"><b>SNo.</b></td>
<td align="center" style="color:#FFFFFF;" class="All_60"><b>EC</b></td>
<td align="center" style="color:#FFFFFF;" class="All_200"><b>Name</b></td>
<td align="center" style="color:#FFFFFF;" class="All_80"><b>Department</b></td>
<td align="center" style="color:#FFFFFF;" class="All_200"><b>Designation</b></td>
<td align="center" style="color:#FFFFFF;" class="All_70"><b>Basic</b></td>
<td align="center" style="color:#FFFFFF;" class="All_70"><b>Stipend</b></td>	
<td align="center" style="color:#FFFFFF;" class="All_70"><b>Incentive</b></td>	
<td align="center" style="color:#FFFFFF;" class="All_70"><b>HRA</b></td>
<td align="center" style="color:#FFFFFF;" class="All_70"><b>Conv</b></td>
<td align="center" style="color:#FFFFFF;" class="All_70"><b>Bonus</b></td>
<td align="center" style="color:#FFFFFF;" class="All_70"><b>TA</b></td>
<td align="center" style="color:#FFFFFF;" class="All_70"><b>Special</b></td>
<td align="center" style="color:#FFFFFF;" class="All_70"><b>Gross Monthly</b></td>
<td align="center" style="color:#FFFFFF;" class="All_70"><b>Gross Monthly (PAC)</b></td>
<td align="center" style="color:#FFFFFF;" class="All_70"><b>PF</b></td>	
<td align="center" style="color:#FFFFFF;" class="All_70"><b>ESIC</b></td>
<td align="center" style="color:#FFFFFF;" class="All_70"><b>NPS</b></td>
<td align="center" style="color:#FFFFFF;" class="All_70"><b>Net Monthaly</b></td>
<td align="center" style="color:#FFFFFF;" class="All_70"><b>Medical Reim.</b></td>	
<td align="center" style="color:#FFFFFF;" class="All_70"><b>LTA</b></td>
<td align="center" style="color:#FFFFFF;" class="All_70"><b>CEA</b></td>	
<td align="center" style="color:#FFFFFF;" class="All_70"><b>Annual Gross</b></td>
<!--<td align="center" style="color:#FFFFFF;" class="All_70"><b>Bonus</b></td>-->
<td align="center" style="color:#FFFFFF;" class="All_70"><b>Gratuity</b></td>
<td align="center" style="color:#FFFFFF;" class="All_70"><b>PF Contri</b></td>	
<td align="center" style="color:#FFFFFF;" class="All_70"><b>ESIC Contri</b></td>
<td align="center" style="color:#FFFFFF;" class="All_70"><b>MPP</b></td>
<td align="center" style="color:#FFFFFF;" class="All_70"><b>CTC</b></td>	
<td align="center" style="color:#FFFFFF;" class="All_70"><b>MIC</b></td>
<td align="center" style="color:#FFFFFF;" class="All_70"><b>Car Allowance</b></td>
</tr>
<?php if($_REQUEST['value']=='All') { $sql=mysql_query("select hrm_employee.*,DepartmentId,DesigId,hrm_employee_ctc.* from hrm_employee_ctc INNER JOIN hrm_employee ON hrm_employee_ctc.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_ctc.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus!='De' AND hrm_employee_ctc.Status='A' order by EmpCode ASC", $con); }
else {$sql=mysql_query("select hrm_employee.*,DepartmentId,DesigId,hrm_employee_ctc.* from hrm_employee_ctc INNER JOIN hrm_employee ON hrm_employee_ctc.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_ctc.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus!='De' AND hrm_employee_ctc.Status='A' order by EmpCode ASC", $con); } 
$Sno=1; while($res=mysql_fetch_array($sql)){ $Ename=$res['Fname'].' '.$res['Sname'].' '.$res['Lname']; 
$sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
$sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$res['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
?> 
<tr bgcolor="#FFFFFF">
<td align="center" style="" class="All_50" valign="top"><?php echo $Sno; ?></td>
<td align="center" style="background-color:#E8D2FB;" class="All_60" valign="top"><?php echo $res['EmpCode']; ?></td>
<td align="" style="background-color:#E8D2FB;" class="All_200" valign="top"><?php echo $Ename; ?></td>
<td align="" style="" class="All_80" valign="top"><?php echo $resDept['DepartmentCode']; ?></td>
<td align="" style="" class="All_200" valign="top"><?php echo $resDesig['DesigName']; ?></td>
<td align="right" style="background-color:#FFFFBF;" class="All_70"><?php echo $res['BAS_Value']; ?>&nbsp;</td>
<td align="right" style="background-color:#FFFFBF;" class="All_70"><?php echo $res['STIPEND_Value']; ?>&nbsp;</td>	
<td align="right" style="background-color:#FFFFBF;" class="All_70"><?php echo $res['INCENTIVE_Value']; ?>&nbsp;</td>	
<td align="right" style="background-color:#FFFFBF;" class="All_70"><?php echo $res['HRA_Value']; ?>&nbsp;</td>
<td align="right" style="background-color:#FFFFBF;" class="All_70"><?php echo $res['CONV_Value']; ?>&nbsp;</td>
<td align="right" style="background-color:#FFFFBF;" class="All_70"><?php echo $res['Bonus_Month']; ?>&nbsp;</td>
<td align="right" style="background-color:#FFFFBF;" class="All_70"><?php echo $res['TA_Value']; ?>&nbsp;</td>
<td align="right" style="background-color:#FFFFBF;" class="All_70"><?php echo $res['SPECIAL_ALL_Value']; ?>&nbsp;</td>
<td align="right" style="background-color:#BFFF80;" class="All_70"><?php echo $res['Tot_GrossMonth']; ?>&nbsp;</td>
<td align="right" style="background-color:#BFFF80;" class="All_70"><?php echo $res['GrossSalary_PostAnualComponent_Value']; ?>&nbsp;</td>
<td align="right" style="background-color:#8CC6FF;" class="All_70"><?php echo $res['PF_Employee_Contri_Value']; ?>&nbsp;</td>	
<td align="right" style="background-color:#8CC6FF;" class="All_70"><?php echo $res['ESCI']; ?>&nbsp;</td>
<td align="right" style="background-color:#8CC6FF;" class="All_70"><?php echo $res['NPS_Value']; ?>&nbsp;</td>
<td align="right" style="background-color:#8CC6FF;" class="All_70"><?php echo $res['NetMonthSalary_Value']; ?>&nbsp;</td>
<td align="right" style="background-color:#8CC6FF;" class="All_70"><?php echo $res['MED_REM_Value']; ?>&nbsp;</td>	
<td align="right" style="background-color:#8CC6FF;" class="All_70"><?php echo $res['LTA_Value']; ?>&nbsp;</td>
<td align="right" style="background-color:#8CC6FF;" class="All_70"><?php echo $res['CHILD_EDU_ALL_Value']; ?>&nbsp;</td>	
<td align="right" style="background-color:#BFFF80;" class="All_70"><?php echo $res['Tot_Gross_Annual']; ?>&nbsp;</td>
<?php /*?><td align="right" style="background-color:#FFD2D2;" class="All_70"><?php echo $res['BONUS_Value']; ?>&nbsp;</td><?php */?>
<td align="right" style="background-color:#FFD2D2;" class="All_70"><?php echo $res['GRATUITY_Value']; ?>&nbsp;</td>
<td align="right" style="background-color:#FFD2D2;" class="All_70"><?php echo $res['PF_Employer_Contri_Annul']; ?>&nbsp;</td>	
<td align="right" style="background-color:#FFD2D2;" class="All_70"><?php echo $res['AnnualESCI']; ?>&nbsp;</td>
<td align="right" style="background-color:#FFD2D2;" class="All_70"><?php echo $res['Mediclaim_Policy']; ?>&nbsp;</td>
<td align="right" style="background-color:#F3D15C;" class="All_70"><?php echo $res['Tot_CTC']; ?>&nbsp;</td>	
<td align="right" style="" class="All_70"><?php echo $res['EmpAddBenifit_MediInsu_value']; ?>&nbsp;</td>
<td align="right" style="" class="All_70"><?php echo $res['CAR_ALL_Value']; ?>&nbsp;</td>
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