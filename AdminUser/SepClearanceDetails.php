<?php require_once('../AdminUser/config/config.php'); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
</script> 
</head>
<body bgcolor="#E0DBE3">
<center>
<table border="0" style="width:790px;" align="center">
<tr>
  <td style="width:790px;" valign="top" align="center">
<?php if($_REQUEST['act']!='')  { ?>	
<?php $sqlSE=mysql_query("select * from hrm_employee_separation where EmpSepId=".$_REQUEST['si'], $con); $resSE=mysql_fetch_assoc($sqlSE);
$sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,DesigId,DepartmentId,DR,Gender,Married from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$resSE['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE); 
$sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resE['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
if($resE['DR']=='Y'){$M='Dr.';} elseif($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';}  $NameE=$M.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; 
?>	
<table border="0">
 <tr>
<?php /*************************************** ADMIN *****************************************************/ ?>  
<td style="display:;width:790px;"> <?php //if($_REQUEST['Dept']=='Ad'){echo 'block';}else{echo 'block';}?>
 <table border="0" cellpadding="0">
  <tr><td>&nbsp;</td><td class="Text" style="">&nbsp;<b>EC :&nbsp;<?php echo $resE['EmpCode']; ?>/&nbsp;&nbsp;Name :&nbsp;<?php echo $NameE; ?></b></td></tr>
  <tr><td>&nbsp;</td><td class="Text2" style="color:#006200;" align="center"><b>CLEARANCE FORM</b></td></tr>
  <tr>
   <td style="width:30px;">&nbsp;</td>
   <td>
    <table border="1" style="width:810px; ">
	  <tr bgcolor="#7a6189">
       <td class="Text" style="width:30px;color:#FFFFFF;" align="center"><b>Sn</b></td>
       <td class="Text" style="width:230px;color:#FFFFFF;" align="center"><b>Particular</b></td>
	   <td class="Text" style="width:150px;color:#FFFFFF;" align="center"><b>NA /Yes /No</b></td>
	   <td class="Text" style="width:80px;color:#FFFFFF;" align="center" valign="top"><b>Recovery Amount</b></td>
	   <td class="Text" style="width:320px;color:#FFFFFF;" align="center"><b>Remark</b></td>
     </tr>
<?php /******************************************* IT *********************************************/ ?>	 
	 <tr bgcolor="#FFFFFF">
       <td colspan="5" class="Text" style="width:30px;" align="">&nbsp;<b>Information Technology</b>&nbsp;&nbsp;/ <b><?php if($resSE['IT_NOC']=='Y'){echo '<font color="#007100"><b>Submitted</font>';}else{echo '<font color="#FF8000">Pending</font>';} ?></b></td>
     </tr>
<?php $sqlit=mysql_query("select * from hrm_employee_separation_nocit where EmpSepId=".$_REQUEST['si'], $con); $it=mysql_fetch_assoc($sqlit);?>	 
     <tr bgcolor="#FFFFFF">
       <td class="Text" style="width:30px;" align="center">1</td>
       <td class="Text" style="width:230px;" align="">&nbsp;Sim Submitted</td>
	   <td class="Text" style="width:150px;" align="center">
	   NA<?php if($it['ItSS']=='A'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   Yes<?php if($it['ItSS']=='Y'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   No<?php if($it['ItSS']=='N'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   <input type="hidden" id="ItSS_YN" name="ItSS_YN" value="<?php echo $it['ItSS']; ?>" /></td>
	   <td class="Text" style="width:70px;" align="center" valign="top"><input style="width:68px;background-color:#EAEAEA;text-align:right;" id="ItSS_Amt" name="ItSS_Amt" value="<?php if($it['ItSS_Amt']!=0){echo $it['ItSS_Amt'];} ?>" readonly maxlength="8" onChange="ItAmtFun()" onBlur="ItAmtFun()"/></td>
	   <td class="Text" style="width:320px;" align="center" valign="top"><input id="ItSS_Remark" name="ItSS_Remark" style="width:318px;" value="<?php echo $it['ItSS_Remark'] ?>" readonly/></td>
     </tr> 
	 <tr bgcolor="#FFFFFF">
       <td class="Text" style="width:30px;" align="center">2</td>
       <td class="Text" style="width:230px;" align="">&nbsp;Company Handset Submitted</td>
	   <td class="Text" style="width:150px;" align="center" valign="top">
	   NA<?php if($it['ItCHS']=='A'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   Yes<?php if($it['ItCHS']=='Y'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   No<?php if($it['ItCHS']=='N'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   <input type="hidden" id="ItCHS_YN" name="ItCHS_YN" value="<?php echo $it['ItCHS']; ?>" /></td>
	   <td class="Text" style="width:70px;" align="center" valign="top"><input style="width:68px;background-color:#EAEAEA;text-align:right;" id="ItCHS_Amt" name="ItCHS_Amt" value="<?php if($it['ItCHS_Amt']!=0){echo $it['ItCHS_Amt'];} ?>" readonly maxlength="8" onChange="ItAmtFun()" onBlur="ItAmtFun()"/></td>
	   <td class="Text" style="width:320px;" align="center" valign="top"><input id="ItCHS_Remark" name="ItCHS_Remark" style="width:318px;" value="<?php echo $it['ItCHS_Remark'] ?>" readonly/></td>
     </tr>
	 <tr bgcolor="#FFFFFF">
       <td class="Text" style="width:30px;" align="center">3</td>
       <td class="Text" style="width:230px;" align="">&nbsp;Laptop/ Desktop Handour</td>
	   <td class="Text" style="width:150px;" align="center" valign="top">
	   NA<?php if($it['ItLDH']=='A'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   Yes<?php if($it['ItLDH']=='Y'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   No<?php if($it['ItLDH']=='N'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   <input type="hidden" id="ItLDH_YN" name="ItLDH_YN" value="<?php echo $it['ItLDH']; ?>" /></td>
	   <td class="Text" style="width:70px;" align="center" valign="top"><input style="width:68px;background-color:#EAEAEA;text-align:right;" id="ItLDH_Amt" name="ItLDH_Amt" value="<?php if($it['ItLDH_Amt']!=0){echo $it['ItLDH_Amt'];} ?>" readonly maxlength="8" onChange="ItAmtFun()" onBlur="ItAmtFun()"/></td>
	   <td class="Text" style="width:320px;" align="center" valign="top"><input id="ItLDH_Remark" name="ItLDH_Remark" style="width:318px;" value="<?php echo $it['ItLDH_Remark'] ?>" readonly/></td>
     </tr> 
	 <tr bgcolor="#FFFFFF"> 
       <td class="Text" style="width:30px;" align="center">4</td>
       <td class="Text" style="width:230px;" align="">&nbsp;Camera Submitted</td>
	   <td class="Text" style="width:150px;" align="center" valign="top">
	   NA<?php if($it['ItCS']=='A'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   Yes<?php if($it['ItCS']=='Y'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   No<?php if($it['ItCS']=='N'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   <input type="hidden" id="ItCS_YN" name="ItCS_YN" value="<?php echo $it['ItCS']; ?>" /></td>
	   <td class="Text" style="width:70px;" align="center" valign="top"><input style="width:68px;background-color:#EAEAEA;text-align:right;" id="ItCS_Amt" name="ItCS_Amt" value="<?php if($it['ItCS_Amt']!=0){echo $it['ItCS_Amt'];} ?>" readonly maxlength="8" onChange="ItAmtFun()" onBlur="ItAmtFun()"/></td>
	   <td class="Text" style="width:320px;" align="center" valign="top"><input id="ItCS_Remark" name="ItCS_Remark" style="width:318px;" value="<?php echo $it['ItCS_Remark'] ?>" readonly/></td>
     </tr>
	  <tr bgcolor="#FFFFFF">
       <td class="Text" style="width:30px;" align="center">5</td>
       <td class="Text" style="width:230px;" align="">&nbsp;Datacard Submitted</td>
	   <td class="Text" style="width:150px;" align="center" valign="top">
	   NA<?php if($it['ItDC']=='A'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   Yes<?php if($it['ItDC']=='Y'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   No<?php if($it['ItDC']=='N'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   <input type="hidden" id="ItDC_YN" name="ItDC_YN" value="<?php echo $it['ItDC']; ?>" /></td>
	   <td class="Text" style="width:70px;" align="center" valign="top"><input style="width:68px;background-color:#EAEAEA;text-align:right;" id="ItDC_Amt" name="ItDC_Amt" value="<?php if($it['ItDC_Amt']!=0){echo $it['ItDC_Amt'];} ?>" readonly maxlength="8" onChange="ItAmtFun()" onBlur="ItAmtFun()"/></td>
	   <td class="Text" style="width:320px;" align="center" valign="top"><input id="ItDC_Remark" name="ItDC_Remark" style="width:318px;" value="<?php echo $it['ItDC_Remark'] ?>" readonly/></td>
     </tr>
	  <tr bgcolor="#FFFFFF"> 
       <td class="Text" style="width:30px;" align="center">6</td>
       <td class="Text" style="width:230px;" align="">&nbsp;Email Account Blocked</td>
	   <td class="Text" style="width:150px;" align="center" valign="top">
	   NA<?php if($it['ItEAB']=='A'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   Yes<?php if($it['ItEAB']=='Y'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   No<?php if($it['ItEAB']=='N'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   <input type="hidden" id="ItEAB_YN" name="ItEAB_YN" value="<?php echo $it['ItEAB']; ?>" /></td>
	   <td class="Text" style="width:70px;" align="center" valign="top"><input style="width:68px;background-color:#EAEAEA;text-align:right;" id="ItEAB_Amt" name="ItEAB_Amt" value="<?php if($it['ItEAB_Amt']!=0){echo $it['ItEAB_Amt'];} ?>" readonly maxlength="8" onChange="ItAmtFun()" onBlur="ItAmtFun()"/></td>
	   <td class="Text" style="width:320px;" align="center" valign="top"><input id="ItEAB_Remark" name="ItEAB_Remark" style="width:318px;" value="<?php echo $it['ItEAB_Remark'] ?>" readonly/></td>
     </tr> 
	  <tr bgcolor="#FFFFFF"> 
       <td class="Text" style="width:30px;" align="center">7</td>
       <td class="Text" style="width:230px;" align="">&nbsp;Mob. No. Disabled/ Transfered</td>
	   <td class="Text" style="width:150px;" align="center" valign="top">
	   NA<?php if($it['ItMND']=='A'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   Yes<?php if($it['ItMND']=='Y'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   No<?php if($it['ItMND']=='N'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   <input type="hidden" id="ItMND_YN" name="ItMND_YN" value="<?php echo $it['ItMND']; ?>" /></td>
	   <td class="Text" style="width:70px;" align="center" valign="top"><input style="width:68px;background-color:#EAEAEA;text-align:right;" id="ItMND_Amt" name="ItMND_Amt" value="<?php if($it['ItMND_Amt']!=0){echo $it['ItMND_Amt'];} ?>" readonly maxlength="8" onChange="ItAmtFun()" onBlur="ItAmtFun()"/></td>
	   <td class="Text" style="width:320px;" align="center" valign="top"><input id="ItMND_Remark" name="ItMND_Remark" style="width:318px;" value="<?php echo $it['ItMND_Remark'] ?>" readonly/></td>
     </tr>
<?php for($i=8; $i<=15; $i++) { if($it['ItAO_Txt'.$i]!=''){ ?>   	 
	  <tr bgcolor="#FFFFFF"> 
       <td class="Text" style="width:30px;" align="center"><?php echo $i; ?></td>
       <td class="Text" style="width:230px;" valign="top">&nbsp;<?php echo $it['ItAO_Txt'.$i]; ?><input type="hidden" id="ItAO_Txt<?php echo $i; ?>" name="ItAO_Txt<?php echo $i; ?>" value="<?php echo $it['ItAO_Txt'.$i]; ?>"/></td>
	   <td class="Text" style="width:150px;" align="center" valign="top">
	   NA<?php if($it['ItAO'.$i]=='A'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   Yes<?php if($it['ItAO'.$i]=='Y'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   No<?php if($it['ItAO'.$i]=='N'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   <input type="hidden" id="ItAO_YN<?php echo $i; ?>" name="ItAO_YN<?php echo $i; ?>" value="<?php echo $it['ItAO'.$i]; ?>" /></td>
	   <td class="Text" style="width:70px;" align="center" valign="top"><input style="width:68px;background-color:#EAEAEA;text-align:right;" id="ItAO_Amt<?php echo $i; ?>" name="ItAO_Amt<?php echo $i; ?>" value="<?php if($it['ItAO_Amt'.$i]!=0){ echo $it['ItAO_Amt'.$i]; } ?>" readonly maxlength="8" onChange="FunItAmt(<?php echo $i; ?>)" onBlur="FunItAmt(<?php echo $i; ?>)"/></td>
	   <td class="Text" style="width:320px;" align="center" valign="top"><input id="ItAO_Remark<?php echo $i; ?>" name="ItAO_Remark<?php echo $i; ?>" style="width:318px;" value="<?php echo $it['ItAO_Remark'.$i] ?>" readonly/></td>
     </tr>
<?php } if($it['ItAO_Txt'.$i]!=''){$c=$i+1;} } ?><input type="hidden" id="ItRow" value="<?php echo $c-1; ?>" />
     <tr>
	  <td colspan="3" align="right" class="Text"><b>Total IT Recovery Amount :</b>&nbsp;</td>
	  <td align="center"><input style="font-weight:bold;background-color:#0079F2;color:#FFFFFF;width:68px;text-align:right;" id="TotItAmt" name="TotItAmt" value="<?php if($it['TotItAmt']>0){ echo $it['TotItAmt']; }else{echo 0;} ?>" readonly maxlength="8"/></td>
	  <td>
	   <?php for($j=8; $j<=15; $j++) { ?>
	   <input type="hidden" id="ItOth_Amt<?php echo $j; ?>" name="ItOth_Amt<?php echo $j; ?>" value="<?php if($it['ItAO_Amt'.$j]>0){echo $it['ItAO_Amt'.$j];}else{echo 0;} ?>"/>
	   <?php } ?>
	  </td>
	 </tr>
<?php /******************************************* Reporting Managers *********************************************/ ?>	 
<?php
$sqlRR=mysql_query("select EmpCode,Fname,Sname,Lname,DR,Gender,Married from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$resSE['Rep_EmployeeID'], $con); 
$resRR=mysql_fetch_assoc($sqlRR); 
if($resRR['DR']=='Y'){$MR='Dr.';} elseif($resRR['Gender']=='M'){$MR='Mr.';} elseif($resRR['Gender']=='F' AND $resRR['Married']=='Y'){$MR='Mrs.';} elseif($resRR['Gender']=='F' AND $resRR['Married']=='N'){$MR='Miss.';}  $NameRR=$MR.' '.$resRR['Fname'].' '.$resRR['Sname'].' '.$resRR['Lname'];
?>
	 <tr bgcolor="#FFFFFF">
       <td colspan="5" class="Text" align="">&nbsp;<b>Departmental&nbsp;(<i><?php echo $NameRR; ?></i>)</b>&nbsp;&nbsp;/ <b>Reporting:&nbsp;<?php if($resSE['Rep_NOC']=='Y'){echo '<font color="#007100">Submitted</font>';}else{echo '<font color="#FF8000">Pending</font>';} ?>&nbsp;&nbsp;
	   <?php if($resE['DepartmentId']==6){?>Logistics:&nbsp;<?php if($resSE['Log_NOC']=='Y'){echo '<font color="#007100">Submitted</font>';}else{echo '<font color="#FF8000">Pending</font>';} ?></b><?php } ?></td>
     </tr>
<?php $sqlRep=mysql_query("select * from hrm_employee_separation_nocrep where EmpSepId=".$_REQUEST['si'], $con); $rep=mysql_fetch_assoc($sqlRep); ?>
    <tr bgcolor="#FFFFFF">
       <td class="Text" style="width:30px;" align="center">1<input type="hidden" id="si" name="si" value="<?php echo $_REQUEST['si']; ?>" />
       <input type="hidden" id="ei" name="ei" value="<?php echo $_REQUEST['ei']; ?>" />
	   <input type="hidden" name="Ename" id="Ename" value="<?php echo $NameE; ?>" /></td>
       <td class="Text" style="width:230px;" align="">&nbsp;Handover Of Data Document etc</td>
	   <td class="Text" style="width:150px;" align="center" valign="top">
	   NA<?php if($rep['DDH']=='A'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   Yes<?php if($rep['DDH']=='Y'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   No<?php if($rep['DDH']=='N'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   <input type="hidden" id="DDH_YN" name="DDH_YN" value="<?php echo $rep['DDH']; ?>" /></td>
	   <td class="Text" style="width:70px;" align="center" valign="top"><input style="width:68px;background-color:#EAEAEA;text-align:right;" id="DDH_Amt" name="DDH_Amt" value="<?php if($rep['DDH_Amt']!=0){echo $rep['DDH_Amt'];} ?>" maxlength="10" readonly maxlength="8" onChange="RepAmtFun()" onBlur="RepAmtFun()"/></td>
	   <td class="Text" style="width:320px;" align="center" valign="top"><input id="DDH_Remark" name="DDH_Remark" style="width:318px;" value="<?php echo $rep['DDH_Remark']; ?>" maxlength="90" readonly/></td>
     </tr>
	  <tr bgcolor="#FFFFFF"> 
       <td class="Text" style="width:30px;" align="center">2</td>
       <td class="Text" style="width:230px;" align="">&nbsp;Handover Of ID Card</td>
	   <td class="Text" style="width:150px;" align="center" valign="top">
	   NA<?php if($rep['TID']=='A'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   Yes<?php if($rep['TID']=='Y'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   No<?php if($rep['TID']=='N'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   <input type="hidden" id="TID_YN" name="TID_YN" value="<?php echo $rep['TID']; ?>" /></td>
	   <td class="Text" style="width:70px;" align="center" valign="top"><input style="width:68px;background-color:#EAEAEA;text-align:right;" id="TID_Amt" name="TID_Amt" value="<?php if($rep['TID_Amt']!=0){echo $rep['TID_Amt'];} ?>" maxlength="10" readonly maxlength="8" onChange="RepAmtFun()" onBlur="RepAmtFun()"/></td>
	   <td class="Text" style="width:320px;" align="center" valign="top"><input id="TID_Remark" name="TID_Remark" style="width:318px;" value="<?php echo $rep['TID_Remark']; ?>" maxlength="90" readonly/></td>
     </tr>
	 <tr bgcolor="#FFFFFF"> 
       <td class="Text" style="width:30px;" align="center">3</td>
       <td class="Text" style="width:230px;" align="">&nbsp;Complition Of Pending Task</td>
	   <td class="Text" style="width:150px;" align="center" valign="top">
	   NA<?php if($rep['APTC']=='A'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   Yes<?php if($rep['APTC']=='Y'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   No<?php if($rep['APTC']=='N'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   <input type="hidden" id="APTC_YN" name="APTC_YN" value="<?php echo $rep['APTC']; ?>" /></td>
	   <td class="Text" style="width:70px;" align="center" valign="top"><input style="width:68px;background-color:#EAEAEA;text-align:right;" id="APTC_Amt" name="APTC_Amt" value="<?php if($rep['APTC_Amt']!=0){echo $rep['APTC_Amt'];} ?>" maxlength="10" readonly maxlength="8" onChange="RepAmtFun()" onBlur="RepAmtFun()"/></td>
	   <td class="Text" style="width:320px;" align="center" valign="top"><input id="APTC_Remark" name="APTC_Remark" style="width:318px;" value="<?php echo $rep['APTC_Remark']; ?>" maxlength="90" readonly/></td>
     </tr>
	 <tr bgcolor="#FFFFFF"> 
       <td class="Text" style="width:30px;" align="center">4</td>
       <td class="Text" style="width:230px;" align="">&nbsp;Handover Of Health Card</td>
	   <td class="Text" style="width:150px;" align="center" valign="top">
	   NA<?php if($rep['HOAS']=='A'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   Yes<?php if($rep['HOAS']=='Y'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   No<?php if($rep['HOAS']=='N'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   <input type="hidden" id="HOAS_YN" name="HOAS_YN" value="<?php echo $rep['HOAS']; ?>" /> </td>
	   <td class="Text" style="width:70px;" align="center" valign="top"><input style="width:68px;background-color:#EAEAEA;text-align:right;" id="HOAS_Amt" name="HOAS_Amt" value="<?php if($rep['HOAS_Amt']!=0){echo $rep['HOAS_Amt'];} ?>" maxlength="10" readonly maxlength="8" onChange="RepAmtFun()" onBlur="RepAmtFun()"/></td>
	   <td class="Text" style="width:320px;" align="center" valign="top"><input id="HOAS_Remark" name="HOAS_Remark" style="width:318px;" value="<?php echo $rep['HOAS_Remark']; ?>" maxlength="90" readonly/></td>
     </tr>
	 <tr><td colspan="5" class="Text" style="background-color:#FFFFFF;" align="">&nbsp;<b>Parties Clearance</b></td></tr>
<?php for($i=1; $i<=40; $i++) { if($rep['Prtis'.$i]!=''){ ?>    	 
	  <tr bgcolor="#FFFFFF"> 
       <td class="Text" style="width:30px;" align="center"><?php echo $i; ?></td>
       <td class="Text" style="width:230px;" valign="top">&nbsp;<?php echo $rep['Prtis'.$i]; ?><input type="hidden" id="Prtis<?php echo $i; ?>" name="Prtis<?php echo $i; ?>" value="<?php echo $rep['Prtis'.$i]; ?>" maxlength="45"/></td>
	   <td class="Text" style="width:150px;" align="center" valign="top">
	   NA<?php if($rep['Prtis_'.$i]=='A'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   Yes<?php if($rep['Prtis_'.$i]=='Y'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   No<?php if($rep['Prtis_'.$i]=='N'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   <input type="hidden" id="Prtis_YN<?php echo $i; ?>" name="Prtis_YN<?php echo $i; ?>" value="<?php echo $rep['Prtis_'.$i]; ?>" /></td>
	   <td class="Text" style="width:70px;" align="center" valign="top"><input style="width:68px;background-color:#EAEAEA;text-align:right;" id="Prtis_Amt<?php echo $i; ?>" name="Prtis_Amt<?php echo $i; ?>" value="<?php if($rep['Prtis_'.$i.'Amt']!=0){echo $rep['Prtis_'.$i.'Amt'];} ?>" maxlength="10" readonly maxlength="8" onChange="FunRepAmt(<?php echo $i; ?>)" onBlur="FunRepAmt(<?php echo $i; ?>)" /></td>
	   <td class="Text" style="width:320px;" align="center" valign="top"><input id="Prtis_Remark<?php echo $i; ?>" name="Prtis_Remark<?php echo $i; ?>" style="width:318px;" value="<?php echo $rep['Prtis_'.$i.'Remark']; ?>" maxlength="90" readonly /></td>
     </tr>
<?php } if($rep['Prtis'.$i]!=''){$a=$i+1;} } ?><input type="hidden" id="RepRow" value="<?php echo $a-1; ?>" />

<?php $TotRepAmt=$rep['Prtis_1Amt']+$rep['Prtis_2Amt']+$rep['Prtis_3Amt']+$rep['Prtis_4Amt']+$rep['Prtis_5Amt']+$rep['Prtis_6Amt']+$rep['Prtis_7Amt']+$rep['Prtis_8Amt']+$rep['Prtis_9Amt']+$rep['Prtis_10Amt']+$rep['Prtis_11Amt']+$rep['Prtis_12Amt']+$rep['Prtis_13Amt']+$rep['Prtis_14Amt']+$rep['Prtis_15Amt']+$rep['Prtis_16Amt']+$rep['Prtis_17Amt']+$rep['Prtis_18Amt']+$rep['Prtis_19Amt']+$rep['Prtis_20Amt']+$rep['Prtis_21Amt']+$rep['Prtis_22Amt']+$rep['Prtis_23Amt']+$rep['Prtis_24Amt']+$rep['Prtis_25Amt']+$rep['Prtis_26Amt']+$rep['Prtis_27Amt']+$rep['Prtis_28Amt']+$rep['Prtis_29Amt']+$rep['Prtis_30Amt']+$rep['Prtis_31Amt']+$rep['Prtis_32Amt']+$rep['Prtis_33Amt']+$rep['Prtis_34Amt']+$rep['Prtis_35Amt']+$rep['Prtis_36Amt']+$rep['Prtis_37Amt']+$rep['Prtis_38Amt']+$rep['Prtis_39Amt']+$rep['Prtis_40Amt'];
//$rep['TotRepAmt'] 
?>

      <tr>
	  <td colspan="3" align="right" class="Text"><b>Total Departmental Recovery Amount :</b>&nbsp;</td>
	  <td align="center"><input style="font-weight:bold;background-color:#0079F2;color:#FFFFFF;width:68px;text-align:right;" id="TotRepAmt" name="TotRepAmt" value="<?php if($TotRepAmt>0){ echo $TotRepAmt; }else{echo 0;} ?>" readonly maxlength="8"/></td><td></td>
	 </tr>	 
<?php /******************************************* Account *********************************************/ ?>	 
	 <tr bgcolor="#FFFFFF">
       <td colspan="5" class="Text" align="">&nbsp;<b>Account</b>&nbsp;&nbsp;/ <b><?php if($resSE['Acc_NOC']=='Y'){echo '<font color="#007100"><b>Submitted</font>';}else{echo '<font color="#FF8000">Pending</font>';} ?></b></td>
     </tr>
<?php $sqlAcc=mysql_query("select * from hrm_employee_separation_nocacc where EmpSepId=".$_REQUEST['si'], $con); $acc=mysql_fetch_assoc($sqlAcc); ?>	 
	 <tr>
	  <td colspan="5">
	   <table border="1">
	   <tr bgcolor="#7a6189">
       <td class="Text" style="width:30px;color:#FFFFFF;" align="center"><b>Sn</b></td>
       <td class="Text" style="width:260px;color:#FFFFFF;" align="center"><b>Particular</b></td>
	   <td class="Text" style="width:150px;color:#FFFFFF;" align="center"><b>NA /Yes /No</b></td>
	   <td class="Text" style="width:70px;color:#FFFFFF;" align="center" valign="top"><b>Earning</b></td>
	   <td class="Text" style="width:70px;color:#FFFFFF;" align="center" valign="top"><b>Deduct</b></td>
	   <td class="Text" style="width:240px;color:#FFFFFF;" align="center"><b>Remark</b></td>
     </tr>	 
	   <tr bgcolor="#FFFFFF">
       <td class="Text" style="width:30px;" align="center">1<input type="hidden" id="TotAmt" name="TotAmt" value="<?php echo $acc['TotAmt']; ?>" /><input type="hidden" id="TotAmt2" name="TotAmt2" value="<?php echo $acc['TotAmt2']; ?>" /><input type="hidden" id="TotAccAmt" name="TotAccAmt" value="<?php echo $acc['TotAccAmt']; ?>" /></td>
       <td class="Text" style="width:230px;" align="">&nbsp;Expenses Claim Pending</td>
	   <td class="Text" style="width:150px;" align="center" valign="top">
	   NA<?php if($acc['AccECP']=='A'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   Yes<?php if($acc['AccECP']=='Y'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   No<?php if($acc['AccECP']=='N'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?></td>
	   <td class="Text" style="width:70px;" align="center" valign="top">
	    <input style="width:68px;background-color:<?php if($acc['AccECP']=='N' OR $acc['AccECP']==''){echo '#EAEAEA';}else{echo '#FFFFFF';} ?>;text-align:right;" id="AccECP_Amt" name="AccECP_Amt" value="<?php if($acc['AccECP_Amt']>0){echo intval($acc['AccECP_Amt']);}else{echo 0;} ?>" <?php if($acc['AccECP']=='N' OR $acc['AccECP']==''){echo 'readonly';} ?>/>
	   </td>
	   <td class="Text" style="width:70px;" align="center" valign="top">
	    <input style="width:68px;background-color:<?php if($acc['AccECP']=='N' OR $acc['AccECP']==''){echo '#EAEAEA';}else{echo '#FFFFFF';} ?>;text-align:right;" id="AccECP_Amt2" name="AccECP_Amt2" value="<?php if($acc['AccECP_Amt2']>0){echo intval($acc['AccECP_Amt2']);}else{echo 0;} ?>" <?php if($acc['AccECP']=='N' OR $acc['AccECP']==''){echo 'readonly';} ?>/>
	   </td>
	   <td class="Text" style="width:240px;" align="center" valign="top">
	    <input id="AccECP_Remark" name="AccECP_Remark" style="width:235px;" value="<?php echo $acc['AccECP_Remark'] ?>" />
	   </td>
     </tr>
	 <tr bgcolor="#FFFFFF"> 
       <td class="Text" style="width:30px;" align="center">2</td>
       <td class="Text" style="width:230px;" align="">&nbsp;Investment Proofs Submited</td>
	   <td class="Text" style="width:150px;" align="center" valign="top">
	   NA<?php if($acc['AccECP']=='A'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   Yes<?php if($acc['AccECP']=='Y'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   No<?php if($acc['AccECP']=='N'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?></td>
	   <td class="Text" style="width:70px;" align="center" valign="top">
	    <input style="width:68px;background-color:<?php if($acc['AccIPS']=='N' OR $acc['AccIPS']==''){echo '#EAEAEA';}else{echo '#FFFFFF';} ?>;text-align:right;" id="AccIPS_Amt" name="AccIPS_Amt" value="<?php if($acc['AccIPS_Amt']>0){echo intval($acc['AccIPS_Amt']);}else{echo 0;} ?>" <?php if($acc['AccIPS']=='N' OR $acc['AccIPS']==''){echo 'readonly';} ?>/>
	   </td>
	   <td class="Text" style="width:70px;" align="center" valign="top">
	    <input style="width:68px;background-color:<?php if($acc['AccIPS']=='N' OR $acc['AccIPS']==''){echo '#EAEAEA';}else{echo '#FFFFFF';} ?>;text-align:right;" id="AccIPS_Amt2" name="AccIPS_Amt2" value="<?php if($acc['AccIPS_Amt2']>0){echo intval($acc['AccIPS_Amt2']);}else{echo 0;} ?>" <?php if($acc['AccIPS']=='N' OR $acc['AccIPS']==''){echo 'readonly';} ?>/>
	   </td>
	   <td class="Text" style="width:240px;" align="center" valign="top">
	    <input id="AccIPS_Remark" name="AccIPS_Remark" style="width:235px;" value="<?php echo $acc['AccIPS_Remark'] ?>" />
	   </td>
     </tr>
	 <tr bgcolor="#FFFFFF"> 
       <td class="Text" style="width:30px;" align="center">3</td>
       <td class="Text" style="width:230px;" align="">&nbsp;Advance Amount Settled</td>
	   <td class="Text" style="width:150px;" align="center" valign="top">
	   NA<?php if($acc['AccECP']=='A'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   Yes<?php if($acc['AccECP']=='Y'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   No<?php if($acc['AccECP']=='N'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?></td>
	   <td class="Text" style="width:70px;" align="center" valign="top">
	    <input style="width:68px;background-color:<?php if($acc['AccAMS']=='N' OR $acc['AccAMS']==''){echo '#EAEAEA';}else{echo '#FFFFFF';} ?>;text-align:right;" id="AccAMS_Amt" name="AccAMS_Amt" value="<?php if($acc['AccAMS_Amt']>0){echo intval($acc['AccAMS_Amt']);}else{echo 0;} ?>" <?php if($acc['AccAMS']=='N' OR $acc['AccAMS']==''){echo 'readonly';} ?>/>
	   </td>
	   <td class="Text" style="width:70px;" align="center" valign="top">
	    <input style="width:68px;background-color:<?php if($acc['AccAMS']=='N' OR $acc['AccAMS']==''){echo '#EAEAEA';}else{echo '#FFFFFF';} ?>;text-align:right;" id="AccAMS_Amt2" name="AccAMS_Amt2" value="<?php if($acc['AccAMS_Amt2']>0){echo intval($acc['AccAMS_Amt2']);}else{echo 0;} ?>" <?php if($acc['AccAMS']=='N' OR $acc['AccAMS']==''){echo 'readonly';} ?>/>
	   </td>
	   <td class="Text" style="width:240px;" align="center" valign="top">
	    <input id="AccAMS_Remark" name="AccAMS_Remark" style="width:235px;" value="<?php echo $acc['AccAMS_Remark'] ?>" />
	   </td>
     </tr> 
	  <tr bgcolor="#FFFFFF"> 
       <td class="Text" style="width:30px;" align="center">4</td>
       <td class="Text" style="width:230px;" align="">&nbsp;Salary Advance Recovery</td>
	   <td class="Text" style="width:150px;" align="center" valign="top">
	   NA<?php if($acc['AccSAR']=='A'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   Yes<?php if($acc['AccSAR']=='Y'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   No<?php if($acc['AccSAR']=='N'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?></td>
	   <td class="Text" style="width:70px;" align="center" valign="top">
	    <input style="width:68px;background-color:<?php if($acc['AccSAR']=='N' OR $acc['AccSAR']==''){echo '#EAEAEA';}else{echo '#FFFFFF';} ?>;text-align:right;" id="AccSAR_Amt" name="AccSAR_Amt" value="<?php if($acc['AccSAR_Amt']>0){echo intval($acc['AccSAR_Amt']);}else{echo 0;} ?>" <?php if($acc['AccSAR']=='N' OR $acc['AccSAR']==''){echo 'readonly';} ?>/>
	   </td>
	   <td class="Text" style="width:70px;" align="center" valign="top">
	    <input style="width:68px;background-color:<?php if($acc['AccSAR']=='N' OR $acc['AccSAR']==''){echo '#EAEAEA';}else{echo '#FFFFFF';} ?>;text-align:right;" id="AccSAR_Amt2" name="AccSAR_Amt2" value="<?php if($acc['AccSAR_Amt2']>0){echo intval($acc['AccSAR_Amt2']);}else{echo 0;} ?>" <?php if($acc['AccSAR']=='N' OR $acc['AccSAR']==''){echo 'readonly';} ?>/>
	   </td>
	   <td class="Text" style="width:240px;" align="center" valign="top">
	    <input id="AccSAR_Remark" name="AccSAR_Remark" style="width:235px;" value="<?php echo $acc['AccSAR_Remark'] ?>" />
	   </td>
     </tr> 
	 <tr bgcolor="#FFFFFF"> 
       <td class="Text" style="width:30px;" align="center">5</td>
       <td class="Text" style="width:230px;" align="">&nbsp;White Goods Recovery</td>
	   <td class="Text" style="width:150px;" align="center" valign="top">
	   NA<?php if($acc['AccWGR']=='A'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   Yes<?php if($acc['AccWGR']=='Y'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   No<?php if($acc['AccWGR']=='N'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?></td>
	   <td class="Text" style="width:70px;" align="center" valign="top">
	    <input style="width:68px;background-color:<?php if($acc['AccWGR']=='N' OR $acc['AccWGR']==''){echo '#EAEAEA';}else{echo '#FFFFFF';} ?>;text-align:right;" id="AccWGR_Amt" name="AccWGR_Amt" value="<?php if($acc['AccWGR_Amt']>0){echo intval($acc['AccWGR_Amt']);}else{echo 0;} ?>" <?php if($acc['AccWGR']=='N' OR $acc['AccWGR']==''){echo 'readonly';} ?>/>
	   </td>
	   <td class="Text" style="width:70px;" align="center" valign="top">
	    <input style="width:68px;background-color:<?php if($acc['AccWGR']=='N' OR $acc['AccWGR']==''){echo '#EAEAEA';}else{echo '#FFFFFF';} ?>;text-align:right;" id="AccWGR_Amt2" name="AccWGR_Amt2" value="<?php if($acc['AccWGR_Amt2']>0){echo intval($acc['AccWGR_Amt2']);}else{echo 0;} ?>" <?php if($acc['AccWGR']=='N' OR $acc['AccWGR']==''){echo 'readonly';} ?>/>
	   </td>
	   <td class="Text" style="width:240px;" align="center" valign="top">
	    <input id="AccWGR_Remark" name="AccWGR_Remark" style="width:235px;" value="<?php echo $acc['AccWGR_Remark'] ?>" />
	   </td>
     </tr> 
	 <tr bgcolor="#FFFFFF"> 
       <td class="Text" style="width:30px;" align="center">6</td>
       <td class="Text" style="width:230px;" align="">&nbsp;Service Bond</td>
	   <td class="Text" style="width:150px;" align="center" valign="top">
	   NA<?php if($acc['AccSB']=='A'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   Yes<?php if($acc['AccSB']=='Y'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   No<?php if($acc['AccSB']=='N'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?></td>
	   <td class="Text" style="width:70px;" align="center" valign="top">
	    <input style="width:68px;background-color:<?php if($acc['AccSB']=='N' OR $acc['AccSB']==''){echo '#EAEAEA';}else{echo '#FFFFFF';} ?>;text-align:right;" id="AccSB_Amt" name="AccSB_Amt" value="<?php if($acc['AccSB_Amt']>0){echo intval($acc['AccSB_Amt']);}else{echo 0;} ?>" <?php if($acc['AccSB']=='N' OR $acc['AccSB']==''){echo 'readonly';} ?>/>
	   </td>
	   <td class="Text" style="width:70px;" align="center" valign="top">
	    <input style="width:68px;background-color:<?php if($acc['AccSB']=='N' OR $acc['AccSB']==''){echo '#EAEAEA';}else{echo '#FFFFFF';} ?>;text-align:right;" id="AccSB_Amt2" name="AccSB_Amt2" value="<?php if($acc['AccSB_Amt2']>0){echo intval($acc['AccSB_Amt2']);}else{echo 0;} ?>" <?php if($acc['AccSB']=='N' OR $acc['AccSB']==''){echo 'readonly';} ?>/>
	   </td>
	   <td class="Text" style="width:240px;" align="center" valign="top">
	    <input id="AccSB_Remark" name="AccSB_Remark" style="width:235px;" value="<?php echo $acc['AccSB_Remark'] ?>" />
	   </td>
     </tr> 
	 <tr bgcolor="#FFFFFF"> 
       <td class="Text" style="width:30px;" align="center">7</td>
       <td class="Text" style="width:230px;" align="">&nbsp;TDS Adjustment</td>
	   <td class="Text" style="width:150px;" align="center" valign="top">
	   NA<?php if($acc['AccTDSA']=='A'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   Yes<?php if($acc['AccTDSA']=='Y'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   No<?php if($acc['AccTDSA']=='N'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?></td>
	   <td class="Text" style="width:70px;" align="center" valign="top">
	    <input style="width:68px;background-color:<?php if($acc['AccTDSA']=='N' OR $acc['AccTDSA']==''){echo '#EAEAEA';}else{echo '#FFFFFF';} ?>;text-align:right;" id="AccTDSA_Amt" name="AccTDSA_Amt" value="<?php if($acc['AccTDSA_Amt']>0){echo intval($acc['AccTDSA_Amt']);}else{echo 0;} ?>" <?php if($acc['AccTDSA']=='N' OR $acc['AccTDSA']==''){echo 'readonly';} ?>/>
	   </td>
	   <td class="Text" style="width:70px;" align="center" valign="top">
	    <input style="width:68px;background-color:<?php if($acc['AccTDSA']=='N' OR $acc['AccTDSA']==''){echo '#EAEAEA';}else{echo '#FFFFFF';} ?>;text-align:right;" id="AccTDSA_Amt2" name="AccTDSA_Amt2" value="<?php if($acc['AccTDSA_Amt2']>0){echo intval($acc['AccTDSA_Amt2']);}else{echo 0;} ?>" <?php if($acc['AccTDSA']=='N' OR $acc['AccTDSA']==''){echo 'readonly';} ?>/>
	   </td>
	   <td class="Text" style="width:240px;" align="center" valign="top">
	    <input id="AccTDSA_Remark" name="AccTDSA_Remark" style="width:235px;" value="<?php echo $acc['AccTDSA_Remark'] ?>" />
	   </td>
     </tr> 
<?php for($i=8; $i<=15; $i++) { if($acc['AccAO_Txt'.$i]!=''){ ?>  
	<tr bgcolor="#FFFFFF"> 
       <td class="Text" style="width:38px;" align="center"><?php echo $i; ?></td>
       <td class="Text" style="width:190px;" align="" valign="top">&nbsp;<?php echo $acc['AccAO_Txt'.$i]; ?>
	   </td>
	   <td class="Text" style="width:150px;" align="center" valign="top">
	   NA<?php if($acc['AccAO'.$i]=='A'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   Yes<?php if($acc['AccAO'.$i]=='Y'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   No<?php if($acc['AccAO'.$i]=='N'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?></td>
	   <td class="Text" style="width:72px;" align="center" valign="top">
	    <input style="width:70px;background-color:<?php if($acc['AccAO'.$i]=='N' OR $acc['AccAO'.$i]==''){echo '#EAEAEA';}else{echo '#FFFFFF';} ?>;text-align:right;" id="AccAO_Amt<?php echo $i; ?>" name="AccAO_Amt<?php echo $i; ?>" value="<?php if($acc['AccAO_Amt'.$i]>0){echo intval($acc['AccAO_Amt'.$i]);}else{echo 0;} ?>" <?php if($acc['AccAO'.$i]=='N' OR $acc['AccAO'.$i]==''){echo 'readonly';} ?>/>
	   </td>
	   <td class="Text" style="width:72px;" align="center" valign="top">
	    <input style="width:70px;background-color:<?php if($acc['AccAO'.$i]=='N' OR $acc['AccAO'.$i]==''){echo '#EAEAEA';}else{echo '#FFFFFF';} ?>;text-align:right;" id="AccAO2_Amt<?php echo $i; ?>" name="AccAO2_Amt<?php echo $i; ?>" value="<?php if($acc['AccAO2_Amt'.$i]>0){echo intval($acc['AccAO2_Amt'.$i]);}else{echo 0;} ?>" <?php if($acc['AccAO'.$i]=='N' OR $acc['AccAO'.$i]==''){echo 'readonly';} ?>/>
	   </td>
	   <td class="Text" style="width:240px;" align="center" valign="top">
	    <input id="AccAO_Remark<?php echo $i; ?>" name="AccAO_Remark<?php echo $i; ?>" style="width:235px;" value="<?php echo $acc['AccAO_Remark'.$i] ?>" />
	   </td>
  </tr>
<?php } } ?>  
  	 <tr bgcolor="#FFFFFF"> 
       <td colspan="3" class="Text" style="width:30px;" align="Right"><b>Total Amount :</b>&nbsp;</td>
	   <td align="center"><input style="font-weight:bold;background-color:#0079F2;color:#FFFFFF;width:68px;text-align:right;" id="TotRepAmt" name="TotRepAmt" value="<?php if($acc['TotAmt']>0){ echo intval($acc['TotAmt']);}else{echo 0;} ?>" readonly maxlength="8"/></td>
	   <td align="center"><input style="font-weight:bold;background-color:#0079F2;color:#FFFFFF;width:68px;text-align:right;" id="TotRepAmt" name="TotRepAmt" value="<?php if($acc['TotAmt2']>0){ echo intval($acc['TotAmt2']);}else{echo 0;} ?>" readonly maxlength="8"/></td><td></td>
     </tr> 
  
	   </table>
	  </td>
	 </tr>


<?php /*******/ ?>	 
	
	
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
