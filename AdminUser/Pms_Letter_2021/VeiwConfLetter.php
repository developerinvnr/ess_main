<?php require_once('config/config.php'); ?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script language="javascript" type="text/javascript">
function PrintLetter(E,C) 
{window.open("VeiwConfLetterPrint.php?action=Letter&E="+E+"&C="+C,"AppLetter","location=no,scrollbars=no,resizable=no,menubar=no,width=820,height=750");}
</script>
</head>
<body>
<table>
<tr><td style="font-family:Times New Roman;color:#000000;font-size:13px;width:785;" align="right">
<a href="#" onClick="PrintLetter(<?php echo $_REQUEST['E'].','.$_REQUEST['C']; ?>)" style="text-decoration:none;"><font id="FonPC" style="color:#000099;">Print</font></a>&nbsp;&nbsp;</td></tr>
<?php  if($_REQUEST['action']=='Letter') {$sql=mysql_query("SELECT hrm_employee.*,hrm_employee_confletter.DesigId,hrm_employee_confletter.GradeId,Married,DR,Gender,DateJoining,DateConfirmation,ConfLetterId FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_confletter ON hrm_employee.EmployeeID=hrm_employee_confletter.EmployeeID WHERE hrm_employee.EmployeeID=".$_REQUEST['E']." AND hrm_employee_confletter.Status='A'", $con) or die(mysql_error()); 
$res=mysql_fetch_assoc($sql); $Ename=$res['Fname'].' '.$res['Sname'].' '.$res['Lname'];  
if($res['DR']=='Y'){$M='Dr.';}elseif($res['Gender']=='M'){$M='Mr.';} elseif($res['Gender']=='F' AND $res['Married']=='Y'){$M='Mrs.';} elseif($res['Gender']=='F' AND $res['Married']=='N'){$M='Miss.';} $NameE=$M.' '.$Ename;
$LEC=strlen($res['EmpCode']);
if($LEC==1){$EC='000'.$res['EmpCode'];} if($LEC==2){$EC='00'.$res['EmpCode'];} if($LEC==3){$EC='0'.$res['EmpCode'];} if($LEC>=4){$EC=$res['EmpCode'];}
$sql2=mysql_query("SELECT ConfDate FROM hrm_employee_confletter WHERE EmployeeID=".$_REQUEST['E']." AND Status='A'", $con) or die(mysql_error()); $res2=mysql_fetch_assoc($sql2);
?> 			
<tr>
 <td align="center">
   <table border="0" width="790">
     <tr><td align="center" valign="top" style="font-size:20px; color:#000000; font-family:Times New Roman; font-weight:bold;"><u>CONFIRMATION LETTER</u></td></tr>
	 <tr><td>&nbsp;</td></tr>
	 <tr>
	  <td style="font-family:Times New Roman;color:#000000; width:785;" align="center">
	    <table border="0">
		  <tr>
		    <td style="width:105px;">&nbsp;</td>
		    <td style="width:385px;font-size:18px;font-weight:bold;">Ref: HR/CL/<?php echo $EC.'R'.$res['ConfLetterId']; ?>/<?php echo date("y");  ?></td>
			<td style="width:100px;">&nbsp;</td>
			<td style="width:200px;font-size:18px;font-weight:bold;" align="right">Date:&nbsp;<?php echo date("d/m/Y"); ?></td>
			<td style="width:50px;">&nbsp;</td>
		  </tr>
		</table>
	  </td>
	 </tr>
	 <tr><td>&nbsp;</td></tr>
	 <tr><td>&nbsp;</td></tr>
	 <tr>
	  <td style="font-family:Times New Roman;color:#000000; width:785;" align="center">
	    <table border="0">
		  <tr><td style="width:100px;">&nbsp;</td>
		      <td style="width:685px;font-size:18px;font-weight:bold;color:#660000;"><?php echo $NameE; ?></td>
			  <td style="width:50px;">&nbsp;</td></tr>
		  <tr><td style="width:50px;">&nbsp;</td>
		      <td style="width:685px;font-size:18px;color:#000000;font-weight:bold;">Employee Code:&nbsp;<?php echo $EC; ?></td>
		      <td style="width:50px;">&nbsp;</td></tr>
		  <tr><td>&nbsp;</td></tr>	  
		</table>
	  </td>
	 </tr>
	 <tr>
	  <td style="font-family:Times New Roman;color:#000000; width:785;" align="center">
	    <table border="0">
		  <tr><td style="width:100px;">&nbsp;</td>
		      <td style="width:685px;font-size:18px;color:#000000;font-weight:bold;">Subject:&nbsp;Confirmation Letter</td>
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
		   With reference to your appointment letter dated <b><?php echo date("d/m/Y",strtotime($res['DateJoining'])); ?></b> we here by confirm your services upon successful completion of the probation period.<p> 
           We are now pleased to confirm your services with effect from <b><?php echo date("d-m-Y", strtotime($res2['ConfDate'])); //$ConfDate; ?></b>.<p>
           All other terms of your employment remains the same as stated in your appointment letter referred above. <p>
           We take this opportunity to wish you a long, happy and successful career with the organisation. <p>  
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
   </table>
 </td>
</tr> 
<?php } ?>

</table>  
 
</body>
</html>

