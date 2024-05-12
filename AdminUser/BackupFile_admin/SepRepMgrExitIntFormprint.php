<?php require_once('../AdminUser/config/config.php'); 
?> 	
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Action for Resignation</title>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<style> .Text {font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;}
.Text2 {font-family:Geneva, Arial, Helvetica, sans-serif;font-size:15px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}</style>
<script language="javascript" type="text/javascript">
function printp(){ window.print(); }
</script>	
</head>
<body bgcolor="#E0DBE3" onload="printp()">

<center>
<table border="0" style="width:550px;" align="center">
<tr>
  <td style="width:550px;" valign="top" align="center">
<?php if($_REQUEST['act']!='')  { ?>	
<?php $sqlSE=mysql_query("select * from hrm_employee_separation where EmpSepId=".$_REQUEST['si'], $con); $resSE=mysql_fetch_assoc($sqlSE);
$sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,DesigId,DepartmentId,DR,Gender,Married from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$resSE['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE); 
$sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resE['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
if($resE['DR']=='Y'){$M='Dr.';} elseif($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';}  $NameE=$M.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'];

$sqlR=mysql_query("select EmpCode,Fname,Sname,Lname,DR,Gender,Married from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$resSE['Rep_EmployeeID'], $con); $resR=mysql_fetch_assoc($sqlR); 
if($resR['DR']=='Y'){$M2='Dr.';} elseif($resR['Gender']=='M'){$M2='Mr.';} elseif($resR['Gender']=='F' AND $resR['Married']=='Y'){$M2='Mrs.';} elseif($resR['Gender']=='F' AND $resR['Married']=='N'){$M2='Miss.';}  $NameR=$M2.' '.$resR['Fname'].' '.$resR['Sname'].' '.$resR['Lname'];

 $sqlExit=mysql_query("select * from hrm_employee_separation_exitint where EmpSepId=".$_REQUEST['si'], $con); 
 $rowExit=mysql_num_rows($sqlExit); if($rowExit>0){$resExit=mysql_fetch_assoc($sqlExit);}
?>	

<form enctype="multipart/form-data" name="formname" method="post" onSubmit="return validate(this)">
<input type="hidden" name="HodId" id="HodId" value="<?php echo $resSE['Hod_EmployeeID']; ?>" /> 
<table border="0">
 <tr>
<?php /*************************************** Reporting *****************************************************/ ?>   
<td style="width:550px;"> 
 <table border="0" cellpadding="0">
  <tr><td class="Text" style="">&nbsp;<b>EC :&nbsp;<?php echo $resE['EmpCode']; ?>/&nbsp;&nbsp;Name :&nbsp;<?php echo $NameE; ?></b></td></tr>
  <tr><td>&nbsp;</td></tr>
  <tr><td class="Text2" style="color:#006200;" align="center"><b>EXIT INTERVIEW FORM</b></td></tr>
  <tr><td style="width:550px;font-family:Times New Roman;font-size:16px;" align="center"><b>(To be filled by the interviewer)</b></td></tr>
  <tr><td>&nbsp;</td></tr>
  <tr>
   <td style="width:550px;">
    <table style="width:550px;" border="0">
	 <tr>
	  <td style="font-size:14px;font-family:Times New Roman;width:550px;"><b>1.</b>&nbsp;Eligible for Rehire:&nbsp;&nbsp;&nbsp;&nbsp;
	   &nbsp;Yes&nbsp;<input type="checkbox" id="Yes_1" onClick="funyn1('Y')" <?php if($resExit['Rep_EligForReHire']=='Y'){echo 'checked';} ?> />&nbsp;&nbsp;
	   No&nbsp;<input type="checkbox" id="No_1" onClick="funyn1('N')" <?php if($resExit['Rep_EligForReHire']=='N'){echo 'checked';} ?> />
	   <input type="hidden" id="Q1_Ans" name="ReHire" value="<?php echo $resExit['Rep_EligForReHire']; ?>" /><input type="hidden" id="SepId" name="SepId" value="<?php echo $_REQUEST['si']; ?>" />
	  </td>
	 </tr>  	
	  <tr>
	  <td style="font-size:14px;font-family:Times New Roman;width:550px;"><b>2.</b>&nbsp;Last Performance rating (On a scale of 1-5):&nbsp;&nbsp;&nbsp;&nbsp;
	   <input id="ReRating" name="ReRating" style="width:20px;text-align:center;" value="<?php echo $resExit['Rep_Rating']; ?>" readOnly/>
	  </td>
	 </tr>  	
	  <tr><td style="font-size:14px;font-family:Times New Roman;width:550px;"><b>3.</b>&nbsp;<b>Interviewer’s summary of the proceedings:</b>&nbsp;&nbsp;&nbsp;&nbsp;</td></tr> 
	  <tr>
	  <td style="font-size:14px;font-family:Times New Roman;width:550px;">
	  <ul><li>Reasons for Leaving</li></ul>
	  <input name="ReasonsLeaving" id="ReasonsLeaving" style="width:550px;" value="<?php echo $resExit['Rep_ReasonsLeaving']; ?>" maxlength="199" /><br>
	  <input name="ReasonsLeaving2" id="ReasonsLeaving2" style="width:550px;" value="<?php echo $resExit['Rep_ReasonsLeaving_2']; ?>" maxlength="199" />
      <ul><li>Executive’s feedback on the organizational culture/ policy, job satisfaction, etc. </li></ul>
	   <input name="CulturePolicy" id="CulturePolicy" style="width:550px;" value="<?php echo $resExit['Rep_CulturePolicy']; ?>" maxlength="199" /><br>
	  <input name="CulturePolicy2" id="CulturePolicy2" style="width:550px;" value="<?php echo $resExit['Rep_CulturePolicy_2']; ?>" maxlength="199" />
	  <ul><li>Suggestions given by the executive for improvement, if any.</li></ul>
	  <input name="SuggImp" id="SuggImp" style="width:550px;" value="<?php echo $resExit['Rep_SuggImp']; ?>" maxlength="199"/><br>
	  <input name="SuggImp2" id="SuggImp2" style="width:550px;" value="<?php echo $resExit['Rep_SuggImp_2']; ?>" maxlength="199" />
	  </td>
	  </tr>  	 	 
	</table>
   </td>
 </tr>
 </table>
</td>

 </tr>
</table>
</form>
<?php } ?>	  
  </td>
</tr>
</table>
</center>
</body>
</html>

