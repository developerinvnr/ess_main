<?php require_once('../AdminUser/config/config.php'); 
if($_REQUEST['action']=='AccApproved')
{ 
  $sql=mysql_query("update hrm_employee_separation set HR_AccNocConf='Y' where EmpSepId=".$_REQUEST['si'], $con); 
  $msg='Clearance form approved successfully';
}

?>
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
function FunApprovedAcc(si,ui,ci)
{ var agree=confirm("Are you sure, you want approve NOC form to Acc.");
  if(agree) 
  { window.location="SepAccClearForm.php?act=act&action=AccApproved&v=v&ss=vty&v=v&ss=vty&cc=it@~t~1212&p=value&a=app&true=false&si="+si+"&ui="+ui+"&ci="+ci; }
}

function FunResendAcc(si,ui,ci)
{ var agree=confirm("Are you sure, you want resend form to account.");
  if(agree)
  { var win=window.open("SepResentAccDept.php?act=AccResend&si="+si,"Form","menubar=no,scrollbars=yes,resizable=no,directories=no,width=400,height=130");
    var timer = setInterval( function() { if(win.closed) {  clearInterval(timer);  window.location="SepAccClearForm.php?act=act&v=v&ss=vty&cc=Acc@~t~1212&p=value&a=app&true=false&si="+si+"&ui="+ui+"&ci="+ci; } }, 1000);
  }
}

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
  <tr><td>&nbsp;</td><td class="Text2" style="color:#006200;" align="center"><b>ACCOUNT CLEARANCE FORM</b></td></tr>
  <tr>
   <td style="width:30px;">&nbsp;</td>
   <td>
    <table border="1" style="width:810px; ">
<?php /******************************************* Account *********************************************/ ?>	 
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
       <td class="Text" style="width:230px;" align="">&nbsp;Advance Amount Recovery</td>
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
	  <tr>
  <td colspan="6" align="Right" class="fontButton">
  <table>
    <tr>
	  <td><font size="3" color="#D7FFD7"><b><?php echo $msg.'&nbsp;'; ?></b></font>&nbsp;
	  
	  <?php if($rowNocAcc>0){ ?>
      <font color="#FFFFA6">Save Date:</font>&nbsp;
      <font style="color:#FFF;"><?=date("d-m-Y",strtotime($acc['NocSubmAccDate']));?></font><?php } ?>
      &nbsp;&nbsp;
	  
	  </td>
	  <td><font size="3" color="#D7FFD7"><?php if($resSE['HR_AccNocConf']=='Y'){ echo "HR Approved"; } ?>&nbsp;</td>
      <td><?php if($resSE['Acc_NOC']=='N' AND date("Y-m-d")>=$resSE['HR_Date']) { ?>
	  <input type="submit" id="submitAccNoc" name="submitAccNoc" style="background-color:#FFCAFF;display:block;width:80px;" value="save"/><?php } ?></td>
	  <?php if($resSE['Acc_NOC']=='Y' AND $resSE['HR_AccNocConf']=='N') { ?>
	  <td><input type="button" id="ResendAcc" value="send back" style="background-color:#FFCAFF;display:block;width:80px;" onClick="FunResendAcc(<?php echo $_REQUEST['si'].', '.$_REQUEST['ui'].', '.$_REQUEST['ci']; ?>)"/></td>
	 <td><input type="button" id="ApproveAcc" value="approved" style="background-color:#FFCAFF;display:block;width:80px;" onClick="FunApprovedAcc(<?php echo $_REQUEST['si'].', '.$_REQUEST['ui'].', '.$_REQUEST['ci']; ?>)"/></td>
	  <?php } ?>
     <td><input type="button" name="Refrash" id="Refrash" value="refresh" style="background-color:#FFCAFF;" onClick="javascript:window.location='SepAccClearForm.php?act=act&v=v&ss=vty&cc=it@~t~1212&p=value&a=app&true=false&si=<?php echo $_REQUEST['si']; ?>&ui=<?php echo $_REQUEST['ui']; ?>&ci=<?php echo $_REQUEST['ci']; ?>'" style="display:block;"/></td>
	</tr>
  </table>
  </td>
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
