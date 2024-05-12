<?php require_once('config/config.php'); 

if($_POST['savedate'])
{$sqlUp=mysql_query("update hrm_employee_separation set ResigAcceptDate='".date("Y-m-d",strtotime($_POST['ResAcceptDate']))."' where EmpSepId=".$_POST['SId'], $con); }

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/><?php /* Calander Open */?>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script><?php /* Calander Close */?>
<style>.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
<script language="javascript" type="text/javascript">
function ClickPrint(si)
{window.open("SepResAcceptPrint.php?action=act&si="+si,"Form","scrollbars=yes,resizable=no,width=820,height=750,menubar=no,location=no,directories=no"); }
</script>
</head>
<body>
<table border="0">
<tr><td style="font-family:Times New Roman;color:#000000;font-size:13px;width:785;" align="right">
<a href="#" onClick="ClickPrint(<?php echo $_REQUEST['si']; ?>)" style="text-decoration:none;"><font id="FonPC" style="color:#000099;">Print</font></a>&nbsp;&nbsp;</td></tr>
<?php $sqlSE=mysql_query("select * from hrm_employee_separation where EmpSepId=".$_REQUEST['si'], $con); $resSE=mysql_fetch_assoc($sqlSE);
$sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,DesigId,DepartmentId,DR,Gender,Married,ParAdd,ParAdd_State,ParAdd_City,CompanyId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_contact ON hrm_employee.EmployeeID=hrm_employee_contact.EmployeeID where hrm_employee.EmployeeID=".$resSE['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE); 
$sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resE['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
if($resE['DR']=='Y'){$M='Dr.';} elseif($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';}  $NameE=$M.' '.strtoupper($resE['Fname']).' '.strtoupper($resE['Sname']).' '.strtoupper($resE['Lname']); 
$sqlCity=mysql_query("select CityName from hrm_city where CityId=".$resE['ParAdd_City'], $con); $resCity=mysql_fetch_assoc($sqlCity);
$sqlState=mysql_query("select StateName from hrm_state where StateId=".$resE['ParAdd_State'], $con); $resState=mysql_fetch_assoc($sqlState);
$sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$resE['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
?>	
 <td align="center">
   <table border="0" width="790">
	 <tr><td>&nbsp;</td></tr>
	 <tr>
	  <td style="font-family:Times New Roman;color:#000000; width:785;" align="center">
	    <table border="0">
		<form name="formfile" method="post"><input type="hidden" name="SId" value="<?php echo $_REQUEST['si']; ?>" /> 
		  <tr><td style="width:100px;">&nbsp;</td><td style="width:600px;font-size:18px;font-weight:bold;">To,</td>
		      <td style="width:185px;"><input name="ResAcceptDate" id="ResAcceptDate" maxlength="25" style="font-family:Georgia; font-size:12px; width:80px; height:20px;" value="<?php if($resSE['ResigAcceptDate']!='0000-00-00' AND $resSE['ResigAcceptDate']!='1970-01-01'){echo date("d-m-Y",strtotime($resSE['ResigAcceptDate']));} ?>"><button id="f_btn1" class="CalenderButton"></button>
   <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
   cal.manageFields("f_btn1", "ResAcceptDate", "%d-%m-%Y");</script><input type="submit" name="savedate" value="save" /></td></tr>
       </form>
		  <tr><td style="width:50px;">&nbsp;</td><td style="width:600px;font-size:18px;color:#660000;font-weight:bold;"><?php echo $NameE; ?></td>
		      <td style="width:185px;">&nbsp;</td></tr>
		  <tr><td style="width:50px;">&nbsp;</td><td style="width:600px;font-size:18px;font-weight:bold;"><?php echo ucwords(strtolower($resE['ParAdd'])); ?></td>
		      <td style="width:185px;">&nbsp;</td></tr>

		<tr><td style="width:50px;">&nbsp;</td><td style="width:600px;font-size:18px;font-weight:bold;"><?php echo ucwords(strtolower($resCity['CityName'])).', '.ucwords(strtolower($resState['StateName'])); ?></td>

		      <td style="width:185px;">&nbsp;</td></tr>	 
		  <tr><td>&nbsp;</td></tr>	  
		  <tr><td style="width:50px;">&nbsp;</td><td style="width:600px;font-size:18px;font-weight:bold;">Sub: RESIGNATION ACCEPTANCE</td>
		      <td style="width:185px;">&nbsp;</td></tr>	 
		  <tr><td>&nbsp;</td></tr>	  
		  <tr><td style="width:50px;">&nbsp;</td><td style="width:600px;font-size:18px;font-weight:bold;"><?php echo 'Dear '.$NameE; ?></td>
		      <td style="width:185px;">&nbsp;</td></tr>	  	   
		  <tr><td>&nbsp;</td></tr>
		  <tr><td style="width:50px;">&nbsp;</td>
		  <td colspan="2" style="width:735px;font-size:18px;text-align:justify;">This refers to your letter of resignation, dated <b><?php echo date("d-m-Y",strtotime($resSE['Emp_ResignationDate'])); ?></b> from the post of <b><?php echo $resDesig['DesigName']; ?></b>.<p>
		  We wish to inform you that your resignation from the services of the company has been accepted by the management.<p>
		  Subsequently your relieving on dated <b><?php echo date("d-m-Y",strtotime($resSE['HR_RelievingDate'])); ?></b> shall be confirmed only after fulfillment of all formalities and clearance of dues.<p>
		  Kindly note that until the company issues letter of relieving on settlement of your accounts, you will remain liable to us towards clearance of your accounts and other related matters.<p><p>
		  We wish you all the best in the upcoming endeavors.<p><p>
		  With best regards,<p><p>
          For <?php $sc=mysql_query("select CompanyName from hrm_company_basic where CompanyId=".$resE['CompanyId'],$con); $rc=mysql_fetch_assoc($sc); ?>
          <?php echo $rc['CompanyName']; ?><p><p>
		  </td></tr>
		  <tr><td>&nbsp;</td></tr>
		  <tr><td>&nbsp;</td></tr>
		  <tr><td style="width:50px;">&nbsp;</td>
		  <td colspan="2" style="width:735px;font-size:18px;text-align:justify;">Authorized Signatory<br><b></b></td></tr>
		  <tr><td>&nbsp;</td></tr>
		  <tr><td>&nbsp;</td></tr>
		  <tr><td>&nbsp;</td></tr>
		  <tr><td>&nbsp;</td></tr>
		</table>
	  </td>
	 </tr>	 
   </table>
 </td>
</tr> 

</table>  
 
</body>
</html>

