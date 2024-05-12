<?php require_once('../AdminUser/config/config.php'); ?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script language="javascript" type="text/javascript">
function PrintLetter(E,C) 
{window.open("VeiwExtConfLetterPrint.php?action=Letter&E="+E+"&C="+C,"AppLetter","location=no,scrollbars=no,resizable=no,menubar=no,width=820,height=750");}
</script>
</head>
<body>
<table>
<tr><td style="font-family:Times New Roman;color:#000000;font-size:13px;width:785;" align="right">
<a href="#" onClick="PrintLetter(<?php echo $_REQUEST['E'].','.$_REQUEST['C']; ?>)" style="text-decoration:none;"><font id="FonPC" style="color:#000099;">Print</font></a>&nbsp;&nbsp;</td></tr>
<?php  if($_REQUEST['action']=='Letter') {$sql=mysql_query("SELECT e.EmployeeID, EmpCode, Fname, Sname, Lname, DesigName, DepartmentName, HqName, StateName, Married, DR, Gender, DateJoining, DateConfirmation, ConfLetterId, ConfDate FROM hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_employee_confletter cl ON e.EmployeeID=cl.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de ON g.DesigId=de.DesigId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_state s ON hq.StateId=s.StateId WHERE e.EmployeeID=".$_REQUEST['E']." AND cl.Status='A'", $con) or die(mysql_error()); $res=mysql_fetch_assoc($sql); 
if($res['Sname']!=''){$Ename=$res['Fname'].' '.$res['Sname'].' '.$res['Lname'];}else{$Ename=$res['Fname'].' '.$res['Lname'];}
if($res['DR']=='Y'){$M='Dr.';}elseif($res['Gender']=='M'){$M='Mr.';} elseif($res['Gender']=='F' AND $res['Married']=='Y'){$M='Mrs.';} elseif($res['Gender']=='F' AND $res['Married']=='N'){$M='Miss.';} $NameE=$M.' '.$Ename;
$LEC=strlen($res['EmpCode']); if($LEC==1){$EC='000'.$res['EmpCode'];} if($LEC==2){$EC='00'.$res['EmpCode'];} if($LEC==3){$EC='0'.$res['EmpCode'];} if($LEC>=4){$EC=$res['EmpCode'];}
?> 			
<tr>
 <td align="center">
   <table border="0" width="790">
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
	<!--<tr><td>&nbsp;</td></tr>
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
		  You were appointed for the position as <b>"<?php echo $res['DesigName']; ?>"</b> in <b><?php echo $res['DepartmentName']; ?></b> Department at <b><?php echo $res['HqName'].' ('.$res['StateName'].')'; ?></b> w.e.f <b><?php echo date("d-m-Y",strtotime($res['DateJoining'])); ?></b> vide terms of appointment letter.<p>
 
In this regard, we wish to inform you that your performance during the probation period has not been satisfactory.<p> 

Therefore, we find it appropriate to extend your probation by <b>3 months</b> and to advise you to work out an appropriate improvement plan in consultation with your manager within one week of receipt of this letter. Your performance shall be reviewed again after 3 months.<p>
         
All other terms and conditions of your appointment letter dated <b><?php echo date("d-m-Y",strtotime($res['DateJoining'])); ?></b>, will remain unchanged.<p>

Kindly return the attached duplicate copy of this letter duly signed by you for our records.<p>  
		  </td><td style="width:50px;">&nbsp;</td></tr>
		</table>
	  </td>
	 </tr>	
  <tr>
	  <td style="font-family:Times New Roman;color:#000000; width:785;" align="center">
	    <table border="0">
		  <tr><td style="width:100px;">&nbsp;</td><td style="width:685px;font-size:18px;font-weight:bold;">&nbsp;</td><td style="width:50px;">&nbsp;</td></tr>
		  <tr><td style="width:100px;">&nbsp;</td><td style="width:343px;font-size:18px;font-weight:bold;">Human Resources</td><td style="width:50px;">&nbsp;</td></tr>
		  <tr><td style="width:100px;">&nbsp;</td><td style="width:343px;height:100px;font-size:15px;"><i>This is an e-generated confirmation letter, no signature is required.</i> </td><td style="width:50px;">&nbsp;</td></tr>
		</table>
	  </td>
	 </tr>
	 <tr><td align="center"><hr color="#000000"></hr></td></tr>	
	 <tr><td align="center"><img src="../AdminUser/images/lfooter.png" border="0"/></td></tr>	 	 
   </table>
 </td>
</tr> 
<?php } ?>

</table>  
 
</body>
</html>

