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
function AppRevClick(P,E,C,Y,N)
{  //alert(P+"-"+E+"-"+C+"-"+Y);
   if(document.getElementById('AllowPMS_'+N).checked==true)
   { var url = 'HRAllowEmpINCAjax.php';	var pars = 'Check=Check&E='+E+'&Y='+Y+'&P='+P+'&C='+C+'&N='+N;	var myAjax = new Ajax.Request(
	 url, { method: 'post', parameters: pars,  onComplete: show_CheckAppRevAllowPMS});
   }
  else if(document.getElementById('AllowPMS_'+N).checked==false)
  { document.getElementById("TR_"+N).style.backgroundColor='#FFFFFF'; }
}
function show_CheckAppRevAllowPMS(originalRequest)
{ document.getElementById('ReturnValue').innerHTML = originalRequest.responseText; var No = document.getElementById("SNo").value;
  document.getElementById("TR_"+No).style.backgroundColor='#2C9326'; document.getElementById("AllowPMS_"+No).disabled=true;
}

</Script>
</head>
<body class="body">
<input type="hidden" name="ComId" id="ComId" value="<?php echo $_REQUEST['C']; ?>" />
<input type="hidden" name="YId" id="YId" value="<?php echo $_REQUEST['Y']; ?>" />
<table class="table" border="0">
<tr>
 <td>
<span id="ReturnValue"></span> 
  <table width="100%" style="margin-top:0px;" border="0">
	 <tr>
	  <td valign="top" align="center" width="100%" id="MainWindow">
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>

<table border="0" style="margin-top:0px; width:95%; height:400px;">
	<tr>

		<td align="" width="100%" valign="top">
		   <table border="0">

       

<?php //---------------------------------------Display Record----------------------------------------------------------------- ?>

<?php if($_REQUEST['action']=='approve') { ?>

<tr>

 <td>

   <table border="1" width="800">
<tr bgcolor="#7a6189">
    <td align="center" style="color:#FFFFFF;" class="All_40"><b>SNo.</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_60"><b>EmpCode</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_100"><b>Department</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_200"><b>Name</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>Check</b></td>
 </tr>
<?php $sql = mysql_query("SELECT hrm_employee.*, hrm_employee_general.*, hrm_employee_personal.*, hrm_employee_pms.EmpPmsId, hrm_employee_pms.HodSubmit_IncStatus FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE EmpStatus='A' AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['E']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['Y']." AND hrm_employee.CompanyId=".$_REQUEST['C'], $con); 

      $no=1; while($res = mysql_fetch_array($sql)) { ?>

<tr id="TR_<?php echo $no; ?>"  <?php if($res['HodSubmit_IncStatus']==1) { ?> bgcolor="#2C9326" <?php } else { ?> bgcolor="#FFFFFF" <?php } ?>>
    <td align="center" style="" class="All_40"><?php echo $no; ?></td>
    <td align="center" style="" class="All_60"><?php echo $res['EmpCode']; ?></td>
<?php $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con);  $resDept=mysql_fetch_assoc($sqlDept); ?> 
	<td align="" style="" class="All_100">&nbsp;<?php echo $resDept['DepartmentCode']; ?></td>
    <td align="" style="" class="All_180">&nbsp;<?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?>
	<input type="hidden" id="UpDesigId_<?php echo $sno; ?>" value="<?php echo $res['DesigId']; ?>" /></td>    
	 <td style="width:50px; background-color:#9FCFFF;" align="center">
	<input type="checkbox" style="height:10px;" name="AllowPMS_<?php echo $no; ?>" <?php if($res['HodSubmit_IncStatus']==1){echo 'disabled';}?> id="AllowPMS_<?php echo $no; ?>" <?php if($res['HodSubmit_IncStatus']==1){echo 'checked';}?> onClick="AppRevClick(<?php echo $res['EmpPmsId'].','.$res['EmployeeID'].','.$_REQUEST['C'].','.$_REQUEST['Y'].','.$no; ?>)" />
	 </td>
 </tr>
<?php $no++;} ?> 

   </table>

 </td>

</tr> 

   </table>

 </td>

</tr> 

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

	

  </table>

 </td>

</tr>

</table>

</body>

</html>