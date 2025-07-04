<?php require_once('config/config.php'); ?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script language="javascript" type="text/javascript">
function Printpage() { window.print(); window.close();} 
</script>
</head>
<body onLoad="Printpage()">
<table>
<tr><td style="font-family:Times New Roman;color:#000000;font-size:13px;width:785;" align="right">&nbsp;&nbsp;</td></tr>
<?php  if($_REQUEST['action']=='Letter'){ $sql=mysql_query("SELECT e.EmployeeID, EmpCode, Fname, Sname, Lname, g.HqId, g.TerrId, department_name, department_code, designation_name, grade_name, city_village_name, territory_name, state_name, Married, DR, Gender, DateJoining, DateConfirmation, ConfLetterId, ConfDate FROM hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_employee_confletter cl ON e.EmployeeID=cl.EmployeeID left join core_departments dept on g.DepartmentId=dept.id
  left join core_designation desig on g.DesigId=desig.id
  left join core_grades gr on g.GradeId=gr.id
  left join core_city_village_by_state vlg on g.HqId=vlg.id
  left join core_territory Tr on g.TerrId=Tr.id
  left join core_states st on g.CostCenter=st.id WHERE e.EmployeeID=".$_REQUEST['E']." AND cl.Status='A'", $con) or die(mysql_error()); $res=mysql_fetch_assoc($sql); 
$Ename=$res['Fname'].' '.$res['Sname'].' '.$res['Lname'];  
if($res['DR']=='Y'){$M='Dr.';}elseif($res['Gender']=='M'){$M='Mr.';} elseif($res['Gender']=='F' AND $res['Married']=='Y'){$M='Mrs.';} elseif($res['Gender']=='F' AND $res['Married']=='N'){$M='Miss.';} $NameE=$M.' '.$Ename;
$LEC=strlen($res['EmpCode']); if($LEC==1){$EC='000'.$res['EmpCode'];} if($LEC==2){$EC='00'.$res['EmpCode'];} if($LEC==3){$EC='0'.$res['EmpCode'];} if($LEC>=4){$EC=$res['EmpCode'];}
?> 			
<tr>
 <td align="center">
   <table border="0" width="790">
     <tr><td>&nbsp;</td></tr>	
     <tr><td>&nbsp;</td></tr>
     <tr><td>&nbsp;</td></tr>  
     <tr><td>&nbsp;</td></tr>	
     <tr><td>&nbsp;</td></tr>
     <!--
     <tr>
	 <td>
	  <table>
	    <tr>
	     <td style="width:15px;">&nbsp;</td>
	     <td><img src="../AdminUser/images/ltop.png" border="0" /></td>
	    </tr> 
	  </table>
	 </td>
	</tr>
	<tr><td>&nbsp;</td></tr>
     <tr><td align="center" valign="top" style="font-size:20px; color:#000000; font-family:Times New Roman; font-weight:bold;"><u>CONFIRMATION LETTER</u></td></tr>-->
	 <tr><td>&nbsp;</td></tr>
	 <tr>
	  <td style="font-family:Times New Roman;color:#000000; width:785;" align="center">
	    <table border="0">
		  <tr>
		    <td style="width:105px;">&nbsp;</td>
		    <td style="width:385px;font-size:18px;font-weight:bold;">To,<br><?php echo $NameE; ?><br>Employee Code:&nbsp;<?php echo $EC; ?></td>
			<td style="width:100px;">&nbsp;</td>
			<td style="width:200px;font-size:18px;font-weight:bold;" valign="top" align="right">Date:&nbsp;<?php echo date("d M Y"); ?></td>
			<td style="width:50px;">&nbsp;</td>
		  </tr>
		</table>
	  </td>
	 </tr>
	 <tr><td>&nbsp;</td></tr>
	 <tr>
	  <td style="font-family:Times New Roman;color:#000000; width:785;" align="center">
	    <table border="0">
		  <tr><td style="width:100px;">&nbsp;</td>
		      <td style="width:685px;font-size:18px;color:#000000;"><b>Subject:</b>&nbsp;<u>Extension of Probation Period</u></td>
		      <td style="width:50px;">&nbsp;</td></tr>
		</table>
	  </td>
	 </tr>
	 <tr><td>&nbsp;</td></tr>
	 <tr>
	  <td style="font-family:Times New Roman;color:#000000; width:785;" align="center">
	    <table border="0">
		  <tr><td style="width:100px;">&nbsp;</td>
		      <td style="width:685px;font-size:18px;font-weight:bold;">Dear&nbsp;<?php echo $NameE; ?></td>
		      <td style="width:50px;">&nbsp;</td></tr>
		</table>
	  </td>
	 </tr>  
	 <tr>
	  <td style="font-family:Times New Roman;color:#000000; width:785;" align="center">
	    <table border="0">
		  <tr><td style="width:100px;">&nbsp;</td>
		  <td style="width:685px;font-size:18px;text-align:justify;">
		   <?php if($res['TerrId']>0){$Hq=$res['territory_name'];}else{$Hq=$res['city_village_name']; }  ?> 
		   You were appointed for the position as <b>"<?php echo $res['designation_name']; ?>"</b> in <b><?php echo $res['department_name']; ?></b> Department at <b><?php echo $Hq.' ('.$res['state_name'].')'; ?></b> w.e.f <b><?php echo date("d-m-Y",strtotime($res['DateJoining'])); ?></b> vide terms of appointment letter.<p>
 
In this regard, we wish to inform you that your performance during the probation period has not been satisfactory.<p> 

Therefore, we find it appropriate to extend your probation by <b>3 months</b> and to advise you to work out an appropriate improvement plan in consultation with your manager within one week of receipt of this letter. Your performance shall be reviewed again after 3 months.<p>
         
All other terms and conditions of your appointment letter dated <b><?php echo date("d-m-Y",strtotime($res['DateJoining'])); ?></b>, will remain unchanged.<p>

Kindly return the attached duplicate copy of this letter duly signed by you for our records.<p><p>  
		  </td><td style="width:50px;">&nbsp;</td></tr>
		</table>
	  </td>
	 </tr>	
	 
	 
	 <tr>
	  <td style="font-family:Times New Roman;color:#000000; width:785;" align="center">
	    <table border="0">
		  <tr><td style="width:100px;">&nbsp;</td><td style="width:685px;font-size:18px;font-weight:bold;">&nbsp;</td><td style="width:50px;">&nbsp;</td></tr>
		  <tr><td style="width:100px;">&nbsp;</td><td style="width:685px;font-size:18px;font-weight:bold;">&nbsp;</td><td style="width:50px;">&nbsp;</td></tr>
		  <tr><td style="width:100px;">&nbsp;</td><td style="width:343px;font-size:18px;font-weight:bold;">Yours sincerely,</td><td style="width:50px;">&nbsp;</td></tr>
		  <tr><td style="width:100px;">&nbsp;</td><td style="width:685px;font-size:18px;font-weight:bold;">&nbsp;</td><td style="width:50px;">&nbsp;</td></tr>
		  <tr><td style="width:100px;">&nbsp;</td><td style="width:685px;font-size:18px;font-weight:bold;">&nbsp;</td><td style="width:50px;">&nbsp;</td></tr>
		  <tr><td style="width:100px;">&nbsp;</td><td style="width:343px;font-size:18px;font-weight:bold;">Authorized Signatory</td><td style="width:50px;">&nbsp;</td></tr>
		  <tr><td style="width:100px;">&nbsp;</td><td style="width:343px;font-size:18px;font-weight:bold;"><?php if($_REQUEST['C']==1){ echo 'VNR Seeds Pvt. Ltd'; }elseif($_REQUEST['C']==3){echo 'VNR Nursery Pvt. Ltd';}?></td><td style="width:50px;">&nbsp;</td></tr>
		</table>
	  </td>
	 </tr>	 
	
	<!-- 
    <tr>
	  <td style="font-family:Times New Roman;color:#000000; width:785;" align="center">
	    <table border="0">
		  <tr><td style="width:100px;">&nbsp;</td><td style="width:685px;font-size:18px;font-weight:bold;">&nbsp;</td><td style="width:50px;">&nbsp;</td></tr>
		  <tr><td style="width:100px;">&nbsp;</td><td style="width:343px;font-size:18px;font-weight:bold;">Human Resources</td><td style="width:50px;">&nbsp;</td></tr>
		  <tr><td style="width:100px;">&nbsp;</td><td style="width:343px;height:100px;font-size:15px;"><i>This is an e-generated confirmation letter, no signature is required.</i> </td><td style="width:50px;">&nbsp;</td></tr>
		</table>
	  </td>
	 </tr> 
	 -->
	 
	 <tr><td>&nbsp;</td></tr>	
     <tr><td>&nbsp;</td></tr>

	 
	 <!--
	 <tr><td align="center"><hr color="#000000"></hr></td></tr>
	 <tr><td align="center"><img src="../AdminUser/images/lfooter.png" border="0"/></td></tr> -->	 
   </table>
 </td>
</tr> 
<?php } ?>

</table>  
 
</body>
</html>

