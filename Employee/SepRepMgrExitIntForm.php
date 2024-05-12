<?php require_once('../AdminUser/config/config.php'); 
if(isset($_POST['saveExitInt']))
{ 
  $search =  '!#$/\'-:_' ; $search = str_split($search);
  $ReasonsLeaving=str_replace($search, "", $_POST['ReasonsLeaving']); $ReasonsLeaving2=str_replace($search, "", $_POST['ReasonsLeaving2']);
  $CulturePolicy=str_replace($search, "", $_POST['CulturePolicy']); $CulturePolicy2=str_replace($search, "", $_POST['CulturePolicy2']);
  $SuggImp=str_replace($search, "", $_POST['SuggImp']); $SuggImp2=str_replace($search, "", $_POST['SuggImp2']);
  
  $sql=mysql_query("select ExitIntId from hrm_employee_separation_exitint where EmpSepId=".$_POST['SepId'], $con); $row=mysql_num_rows($sql);
  if($row==0)
  { $sqlIns=mysql_query("insert into hrm_employee_separation_exitint(EmpSepId, Rep_EligForReHire, Rep_ReasonsLeaving, Rep_ReasonsLeaving_2, Rep_CulturePolicy, Rep_CulturePolicy_2, Rep_SuggImp, Rep_SuggImp_2, RepExitIntStatus) values(".$_POST['SepId'].", '".$_POST['ReHire']."', '".$ReasonsLeaving."', '".$ReasonsLeaving2."', '".$CulturePolicy."', '".$CulturePolicy2."', '".$SuggImp."', '".$SuggImp2."', 1)", $con); }
  elseif($row>0)
  { $sqlIns=mysql_query("update hrm_employee_separation_exitint set Rep_EligForReHire='".$_POST['ReHire']."', Rep_ReasonsLeaving='".$ReasonsLeaving."', Rep_ReasonsLeaving_2='".$ReasonsLeaving2."', Rep_CulturePolicy='".$CulturePolicy."', Rep_CulturePolicy_2='".$CulturePolicy2."', Rep_SuggImp='".$SuggImp."', Rep_SuggImp_2='".$SuggImp2."', RepExitIntStatus=1 where EmpSepId=".$_POST['SepId'], $con);}
   if($sqlIns){$msg="Exit interview form save successfully, please submit for complete process.";}
}  

if(isset($_POST['submitExitInt']))
{ 
  $search =  '!#$/\'-:_' ; $search = str_split($search);
  $ReasonsLeaving=str_replace($search, "", $_POST['ReasonsLeaving']); $ReasonsLeaving2=str_replace($search, "", $_POST['ReasonsLeaving2']);
  $CulturePolicy=str_replace($search, "", $_POST['CulturePolicy']); $CulturePolicy2=str_replace($search, "", $_POST['CulturePolicy2']);
  $SuggImp=str_replace($search, "", $_POST['SuggImp']); $SuggImp2=str_replace($search, "", $_POST['SuggImp2']);
 
  $sqlIns=mysql_query("update hrm_employee_separation_exitint set Rep_EligForReHire='".$_POST['ReHire']."', Rep_ReasonsLeaving='".$ReasonsLeaving."', Rep_ReasonsLeaving_2='".$ReasonsLeaving2."', Rep_CulturePolicy='".$CulturePolicy."', Rep_CulturePolicy_2='".$CulturePolicy2."', Rep_SuggImp='".$SuggImp."', Rep_SuggImp_2='".$SuggImp2."', RepExitIntStatus=2 where EmpSepId=".$_POST['SepId'], $con);
  
  if($sqlIns)
  {
   $sqlIns=mysql_query("update hrm_employee_separation set Rep_ExitIntForm='Y' where EmpSepId=".$_POST['SepId'], $con);
   echo '<script>alert("Exit interview form submitted successfully"); window.close();</script>'; 
  }
  
   
}  


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
function funyn1(v)
{ 
 if(v=='Y')
 { if(document.getElementById("Yes_1").checked==true)
   {document.getElementById("No_1").checked=false; document.getElementById("Q1_Ans").value='Y';}
   else{document.getElementById("Q1_Ans").value='';}
 }
 else if(v=='N')
 { if(document.getElementById("No_1").checked==true)
   {document.getElementById("Yes_1").checked=false; document.getElementById("Q1_Ans").value='N';}
   else{document.getElementById("Q1_Ans").value='';}
 }
}

function BEdit(v)
{ document.getElementById("editBtn").style.display='none'; document.getElementById("saveExitInt").style.display='block'; 
  if(v==1){document.getElementById("submitExitInt").style.display='block';}
  document.getElementById("Yes_1").disabled=false; document.getElementById("No_1").disabled=false; 
  document.getElementById("ReasonsLeaving").disabled=false; document.getElementById("ReasonsLeaving2").disabled=false; document.getElementById("CulturePolicy").disabled=false;
  document.getElementById("CulturePolicy2").disabled=false; document.getElementById("SuggImp").disabled=false; document.getElementById("SuggImp2").disabled=false;
}

function validate(formname)
{
  var ReHire = formname.ReHire.value; var ReasonsLeaving = formname.ReasonsLeaving.value; 
  var ReasonsLeaving2 = formname.ReasonsLeaving2.value; var CulturePolicy = formname.CulturePolicy.value; var CulturePolicy2 = formname.CulturePolicy2.value; 
  var SuggImp = formname.SuggImp.value; var SuggImp2 = formname.SuggImp2.value; 
 
  if(ReHire==''){ alert("Please Check Eligible for Rehire."); return false;} 
  if(ReasonsLeaving=='' && ReasonsLeaving2==''){ alert("Please Type Reasons for Leaving ."); return false;} 
  if(CulturePolicy=='' && CulturePolicy2==''){ alert("Please Type Feedback."); return false;} 
  if(SuggImp=='' && SuggImp2==''){ alert("Please Type Suggestions."); return false;} 
  
}
</script>	
</head>
<body bgcolor="#E0DBE3">
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
	   &nbsp;Yes&nbsp;<input type="checkbox" id="Yes_1" onClick="funyn1('Y')" <?php if($resExit['Rep_EligForReHire']=='Y'){echo 'checked';} ?> disabled/>&nbsp;&nbsp;
	   No&nbsp;<input type="checkbox" id="No_1" onClick="funyn1('N')" <?php if($resExit['Rep_EligForReHire']=='N'){echo 'checked';} ?> disabled/>
	   <input type="hidden" id="Q1_Ans" name="ReHire" value="<?php echo $resExit['Rep_EligForReHire']; ?>" /><input type="hidden" id="SepId" name="SepId" value="<?php echo $_REQUEST['si']; ?>" />
	  </td>
	 </tr>
<?php /*   	
	  <tr>
	  <td style="font-size:14px;font-family:Times New Roman;width:550px;"><b>2.</b>&nbsp;Last Performance rating (On a scale of 1-5):&nbsp;&nbsp;&nbsp;&nbsp;
	   <input id="ReRating" name="ReRating" style="width:20px;text-align:center;" value="<?php echo $resExit['Rep_Rating']; ?>" disabled/>
	  </td>
	 </tr>  
*/ ?>	
	  <tr><td style="font-size:14px;font-family:Times New Roman;width:550px;"><b>2.</b>&nbsp;<b>Interviewer’s summary of the proceedings:</b>&nbsp;&nbsp;&nbsp;&nbsp;</td></tr> 
	  <tr>
	  <td style="font-size:14px;font-family:Times New Roman;width:550px;">
	  <ul><li>Reasons for Leaving</li></ul>
	  <input name="ReasonsLeaving" id="ReasonsLeaving" style="width:550px;" value="<?php echo $resExit['Rep_ReasonsLeaving']; ?>" maxlength="199" disabled/><br>
	  <input name="ReasonsLeaving2" id="ReasonsLeaving2" style="width:550px;" value="<?php echo $resExit['Rep_ReasonsLeaving_2']; ?>" maxlength="199" disabled/>
      <ul><li>Executive’s feedback on the organizational culture/ policy, job satisfaction, etc. </li></ul>
	   <input name="CulturePolicy" id="CulturePolicy" style="width:550px;" value="<?php echo $resExit['Rep_CulturePolicy']; ?>" maxlength="199" disabled/><br>
	  <input name="CulturePolicy2" id="CulturePolicy2" style="width:550px;" value="<?php echo $resExit['Rep_CulturePolicy_2']; ?>" maxlength="199" disabled/>
	  <ul><li>Suggestions given by the executive for improvement, if any.</li></ul>
	  <input name="SuggImp" id="SuggImp" style="width:550px;" value="<?php echo $resExit['Rep_SuggImp']; ?>" maxlength="199" disabled/><br>
	  <input name="SuggImp2" id="SuggImp2" style="width:550px;" value="<?php echo $resExit['Rep_SuggImp_2']; ?>" maxlength="199" disabled/>
	  </td>
	  </tr>  	 	 
	</table>
   </td>
 </tr>
  <tr>
   <td align="Right" class="fontButton">
     <table>
	 <tr>
      <td><font size="3" color="#D7FFD7"><?php echo $msg.'&nbsp;'; ?></font></td>
	  <?php if($_REQUEST['st']=='N') { ?>
	  <td><?php if($resExit['RepExitIntStatus']==1){ ?><input type="submit" id="submitExitInt" name="submitExitInt" value="submit" style="display:none;"/><?php } ?></td>
      <td><input type="submit" id="saveExitInt" name="saveExitInt" value="save" style="display:none;"/></td> 
      <td><input type="button" id="editBtn" value="edit" onClick="BEdit(<?php echo $resExit['RepExitIntStatus']; ?>)" style="display:block;"/></td>
      <td> <input type="button" name="Refrash" value="refresh" onClick="javascript:window.location='SepRepMgrExitIntForm.php?act=act&v=v&ss=vty&cc=it@~t~1212&p=value&a=app&true=false&si=<?php echo $_REQUEST['si']; ?>&st=<?php echo $_REQUEST['st']; ?>&ei=<?php echo $_REQUEST['ei']; ?>'"/></td>
      <?php } ?>
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
