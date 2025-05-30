<?php require_once('config/config.php'); ?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script language="javascript" type="text/javascript">
function PrintPage() 
{window.print(); } //window.close();
</script>
</head>
<body onLoad="PrintPage()">
<table border="0">
<tr><td style="font-family:Times New Roman;color:#000000;font-size:13px;width:785;" align="right">
<a href="#" onClick="ClickPrint(<?php echo $_REQUEST['si']; ?>)" style="text-decoration:none;"><font id="FonPC" style="color:#000099;"></font></a>&nbsp;&nbsp;</td></tr>
<?php $sqlSE=mysql_query("select * from hrm_employee_separation where EmpSepId=".$_REQUEST['si'], $con); $resSE=mysql_fetch_assoc($sqlSE);
$sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,g.HqId, g.TerrId, department_name, sub_department_name, section_name, designation_name, grade_name, state_name, city_village_name, territory_name,DR,Gender,Married,ParAdd,ParAdd_State,ParAdd_City,DateJoining,Fa_SN,FatherName,CompanyId from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_employee_contact c ON e.EmployeeID=c.EmployeeID INNER JOIN hrm_employee_family f ON e.EmployeeID=f.EmployeeID left join core_departments dept on g.DepartmentId=dept.id
  left join core_sub_department_master subdept on g.SubDepartmentId=subdept.id
  left join core_section sec on g.EmpSection=sec.id
  left join core_designation desig on g.DesigId=desig.id
  left join core_grades gr on g.GradeId=gr.id
  left join core_states st on g.CostCenter=st.id
  left join core_city_village_by_state vlg on g.HqId=vlg.id
  left join core_territory Tr on g.TerrId=Tr.id where e.EmployeeID=".$resSE['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE); 

if($resE['DR']=='Y'){$M='Dr.';} elseif($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';}  $NameE=$M.' '.strtoupper($resE['Fname']).' '.strtoupper($resE['Sname']).' '.strtoupper($resE['Lname']); 
$sqlCity=mysql_query("select CityName from hrm_city where CityId=".$resE['ParAdd_City'], $con); $resCity=mysql_fetch_assoc($sqlCity);
$sqlState=mysql_query("select StateName from hrm_state where StateId=".$resE['ParAdd_State'], $con); $resState=mysql_fetch_assoc($sqlState);
?>	
<?php $sc=mysql_query("select CompanyName from hrm_company_basic where CompanyId=".$resE['CompanyId'],$con); $rc=mysql_fetch_assoc($sc); ?>
 <td align="center">
   <table border="0" width="790">
     <tr><td>&nbsp;</td></tr>
	 <tr><td style="height:100px;">&nbsp;</td></tr>
	 <tr>
	  <td style="font-family:Times New Roman;color:#000000; width:785px;" align="center">
	    <table border="0">
		<form name="formfile" method="post"><input type="hidden" name="SId" value="<?php echo $_REQUEST['si']; ?>" /> 
		<tr><td colspan="3" style="width:785px;font-size:15px;font-weight:bold;" align="center"><u>Registered AD/ Speed Post / Email 
            </u></td></tr>
		  <tr>
		 
		      <td colspan="3" style="text-align:right;font-size:18px;"><b>Date :&nbsp;<?php if($resSE['ExperienceDate']!='0000-00-00' AND $resSE['ExperienceDate']!='1970-01-01'){echo date("d-M-Y",strtotime($resSE['ExperienceDate']));} ?></b></td></tr>
       </form>
		  <tr><td>&nbsp;</td></tr>	  

		  <tr><td colspan="3" style="width:785px;font-size:18px;font-weight:bold;" align="center"><u>EXPERIENCE CERTIFICATE</u></td></tr>	 
		  <tr><td>&nbsp;</td></tr>	  
		  <tr><td>&nbsp;</td></tr>	  
		  <tr><td colspan="3" style="width:785px;font-size:16px;font-weight:bold;" align="center"><u>TO WHOMSOEVER IT MAY CONCERN</u></td></tr>	 
		  <tr><td>&nbsp;</td></tr>	  
		  <tr><td style="width:50px;">&nbsp;</td>
		  <td colspan="2" style="width:735px;font-size:18px;text-align:justify;">This is to certify that <b><?php echo $NameE; ?></b> <?php if($resE['Gender']=='M'){echo 'S/o';}elseif($resE['Gender']=='F'){echo 'D/o';} ?> <b><?php echo $resE['Fa_SN'].' '.strtoupper($resE['FatherName']); ?></b>, was employed with <?php echo $rc['CompanyName']; ?>  from <b><?php echo date("d-m-Y",strtotime($resE['DateJoining'])); ?></b> to <b><?php echo date("d-m-Y",strtotime($resSE['HR_RelievingDate'])); ?></b>.<p><p>During 
		  <?php if($resE['Gender']=='M'){echo 'his';}elseif($resE['Gender']=='F'){echo 'her';} ?> tenure, <?php if($resE['Gender']=='M'){echo 'he';}elseif($resE['Gender']=='F'){echo 'she';} ?> fulfilled the responsibillities assigned to <?php if($resE['Gender']=='M'){echo 'him';}elseif($resE['Gender']=='F'){echo 'her';} ?>. <?php if($resE['Gender']=='M'){echo 'He';}elseif($resE['Gender']=='F'){echo 'She';} ?> was working as <?= $resE['designation_name'];?> in the <?= $resE['department_name'];?> department as <?php if($resE['Gender']=='M'){echo 'his';}elseif($resE['Gender']=='F'){echo 'her';} ?> last assignment in the company.<p> 
		  
		  We wish <?php if($resE['Gender']=='M'){echo 'him';}elseif($resE['Gender']=='F'){echo 'her';} ?> all the best for <?php if($resE['Gender']=='M'){echo 'his';}elseif($resE['Gender']=='F'){echo 'her';} ?> future endeavors.<p><p>
		  Best Regards,</p><p style="font-weight:bold;">For 
          <?php echo $rc['CompanyName']; ?><p><p>
		  </td></tr>
		  <tr><td>&nbsp;</td></tr>
		  <tr><td>&nbsp;</td></tr>
		  <tr><td style="width:50px;">&nbsp;</td>
		  <td colspan="2" style="width:735px;font-size:18px;text-align:justify;font-weight:bold;">Authorized Signatory</td></tr>
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

