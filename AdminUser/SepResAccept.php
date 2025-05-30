<?php require_once('config/config.php'); 

if($_POST['savedate'])
{
    
    $sqlUp=mysql_query("update hrm_employee_separation set ResigAcceptDate='".date("Y-m-d",strtotime($_POST['ResAcceptDate']))."' where EmpSepId=".$_POST['SId'], $con); }

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
<?php 
$sqlSE=mysql_query("select * from hrm_employee_separation where EmpSepId=".$_REQUEST['si'], $con); $resSE=mysql_fetch_assoc($sqlSE);
   

    $sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,g.HqId, g.TerrId, department_name, sub_department_name, section_name, designation_name, grade_name, state_name, city_village_name, territory_name,DR,Gender,Married,ParAdd,ParAdd_State,ParAdd_City,DateJoining,Fa_SN,FatherName,CompanyId from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_employee_contact c ON e.EmployeeID=c.EmployeeID INNER JOIN hrm_employee_family f ON e.EmployeeID=f.EmployeeID left join core_departments dept on g.DepartmentId=dept.id
  left join core_sub_department_master subdept on g.SubDepartmentId=subdept.id
  left join core_section sec on g.EmpSection=sec.id
  left join core_designation desig on g.DesigId=desig.id
  left join core_grades gr on g.GradeId=gr.id
  left join core_states st on g.CostCenter=st.id
  left join core_city_village_by_state vlg on g.HqId=vlg.id
  left join core_territory Tr on g.TerrId=Tr.id where e.EmployeeID=".$resSE['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE); 
$sqlDept=mysql_query("select department_name as DepartmentCode from core_departments where id=".$resE['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
if($resE['DR']=='Y'){$M='Dr.';} elseif($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';}  $NameE=$M.' '.strtoupper($resE['Fname']).' '.strtoupper($resE['Sname']).' '.strtoupper($resE['Lname']); 
$sqlCity=mysql_query("select CityName from hrm_city where CityId=".$resE['ParAdd_City'], $con); $resCity=mysql_fetch_assoc($sqlCity);
$sqlState=mysql_query("select StateName from hrm_state where StateId=".$resE['ParAdd_State'], $con); $resState=mysql_fetch_assoc($sqlState);
$sqlDesig=mysql_query("select designation_name as DesigName from core_designation where id=".$resE['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
?>	
<?php $sc=mysql_query("select CompanyName from hrm_company_basic where CompanyId=".$resE['CompanyId'],$con); $rc=mysql_fetch_assoc($sc); ?>
 <td align="center">
  <table border="0" width="790">
	 <tr><td>&nbsp;</td></tr>
	 <tr>
	  <td style="font-family:Times New Roman;color:#000000; width:785;" align="center">
	    <table border="0">
		<form name="formfile" method="post"><input type="hidden" name="SId" value="<?php echo $_REQUEST['si']; ?>" /> 
		  <tr><td style="width:100px;">&nbsp;</td><td style="width:600px;font-size:18px;font-weight:bold;"></td>
		      <td style="width:185px;"><input name="ResAcceptDate" id="ResAcceptDate" maxlength="25" style="font-family:Georgia; font-size:12px; width:80px; height:20px;" value="<?php if($resSE['ResigAcceptDate']!='0000-00-00' AND $resSE['ResigAcceptDate']!='1970-01-01'){echo date("d-m-Y",strtotime($resSE['ResigAcceptDate']));} ?>"><button id="f_btn1" class="CalenderButton"></button>
   <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
   cal.manageFields("f_btn1", "ResAcceptDate", "%d-%m-%Y");</script><input type="submit" name="savedate" value="save" /></td></tr>
       </form>
	       <tr><td style="width:100px;">&nbsp;</td><td style="width:600px;font-size:18px;font-weight:bold;">To,</td>
		       <td style="width:185px;"></td></tr>
		  <tr><td style="width:50px;">&nbsp;</td><td style="width:600px;font-size:16px;font-weight:bold;"><?php echo $NameE; ?></td>
		      <td style="width:185px;">&nbsp;</td></tr>
		  <tr><td style="width:50px;">&nbsp;</td><td style="width:600px;font-size:18px;font-weight:bold;"><?php echo ucwords(strtolower($resE['ParAdd'])); ?> <?php echo ucwords(strtolower($resCity['CityName'])).', '.ucwords(strtolower($resState['StateName'])); ?></td>
		      <td style="width:185px;">&nbsp;</td></tr>
		  <tr><td>&nbsp;</td></tr>		  
		  <tr><td style="width:50px;">&nbsp;</td><td colspan="2" style="width:600px;font-size:16px;font-weight:bold;" align="left">Sub: <u> Resignation Acceptance
</u></td></tr>	 
		  <tr><td>&nbsp;</td></tr>	  
		  <tr><td style="width:50px;">&nbsp;</td><td style="width:600px;font-size:18px;font-weight:bold;"><?php echo 'Dear '.$NameE; ?></td>
		      <td style="width:185px;">&nbsp;</td></tr>	  	   
		  <tr><td>&nbsp;</td></tr>
		  <tr><td style="width:50px;">&nbsp;</td>
		  <td colspan="2" style="width:735px;font-size:18px;text-align:justify;">
		      <p>We acknowledge receipt of your resignation as detailed below:</p>
		    <ul>
		        <li><b>Name:</b> &nbsp;<?php echo $NameE; ?></li>
		        <li><b><?php
		        if($resE['Gender']=='M'){echo 'S/o';}elseif($resE['Gender']=='F'){echo 'D/o';}
		        ?>:</b> &nbsp;<?php echo $resE['Fa_SN'].' '.strtoupper($resE['FatherName']); ?></li>
		         <li><b>Date of Resignation Submitted:</b>&nbsp;<?php echo date("d-m-Y",strtotime($resSE['Emp_ResignationDate'])); ?></li>
		         <li><b>Current Position:</b>&nbsp; <?= $resE['designation_name'];?></li>
		         <li><b>Department:</b>&nbsp; <?= $resE['department_name'];?></li>
		    </ul>   
		    <p>Your resignation has been accepted by your Reporting Manager/HR Manager. Your last working day with the company will be <b><?php echo date("d-m-Y",strtotime($resSE['HR_RelievingDate'])); ?></b>.</p>
		    <p>You are required to complete all pending tasks and prepare a comprehensive list of ongoing assignments. Please coordinate with your Reporting Manager for a smooth handover. Additionally, ensure the transfer of all documents, information, knowledge, data, and any physical or digital assets in your possession during your tenure.</p>
		    <p>You are expected to adhere, confidentiality and non-competitive clauses of your employment agreement.
</p>
<p>Kindly note that this communication serves as an acknowledgment of your resignation. Your Relieving Letter and Experience Certificate will be issued upon successful completion of all no-dues formalities and necessary clearances from the concerned departments.
</p>
<p>We appreciate your contributions to the organization and wish you success in your future endeavors.
</p>
        <p>Best Regards,</p>
		  <p style="font-weight:bold">
                  For
          <?php echo $rc['CompanyName']; ?><p><p>
		  </td></tr>
		  <tr><td>&nbsp;</td></tr>
		  <tr><td>&nbsp;</td></tr>
		  <tr><td style="width:50px;">&nbsp;</td>
		  <td colspan="2" style="width:735px;font-size:18px;text-align:justify;font-weight:bold;">Authorized Signatory<br><b></b></td></tr>
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

