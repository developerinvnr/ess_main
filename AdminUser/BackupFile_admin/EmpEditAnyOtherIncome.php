<?php require_once('../AdminUser/config/config.php');  ?>
<?php //if($_REQUEST['E']!='' AND $_REQUEST['M']!='' AND $_REQUEST['YI']!=''){  } ?>
<?php
if(isset($_POST['Save']))
{ 
/*
$Up=mysql_query("update hrm_emplyee_tds_otherincome set Divident='".$_POST['DD']."', CapitalGain='".$_POST['CG']."', HouseProperty='".$_POST['HP']."', Interest='".$_POST['IN']."', ProfitLossBussi='".$_POST['PL']."', AnyOther1='".$_POST['AOI']."', TotalAnyAmt='".$_POST['Tot']."', CreatedBy=".$_POST['U'].", CreatedDate='".date("Y-m-d")."' where EmployeeID=".$_POST['E']." AND YearId=".$_POST['Y'], $con); if($Up){$msg='Successfully updated...';}
*/
}
 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php include_once('../Title.php'); ?>&nbsp;Any Other Income</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.Des{font-family:Times New Roman;font-size:12px;width:240px;}.Amt{font-family:Times New Roman;font-size:12px;width:80px;}
.TaxF{font-family:Times New Roman;font-size:12px;width:80px;}
</style>
<script language="javascript" language="javascript">
function EditAOI()
{document.getElementById("Save").style.display='block'; document.getElementById("Change").style.display='none'; 
 document.getElementById("HP").readOnly=true; document.getElementById("DD").readOnly=false; document.getElementById("CG").readOnly=false;
 document.getElementById("IN").readOnly=false; document.getElementById("PL").readOnly=false; document.getElementById("AOI").readOnly=false;
 document.getElementById("Tot").readOnly=true;
}

function Calcu()
{
 var HP=parseFloat(document.getElementById("HP").value); var DD=parseFloat(document.getElementById("DD").value); var CG=parseFloat(document.getElementById("CG").value);
 var IN=parseFloat(document.getElementById("IN").value); var PL=parseFloat(document.getElementById("PL").value); var AOI=parseFloat(document.getElementById("AOI").value);
 var Tot=parseFloat(document.getElementById("Tot").value);
 var Total=document.getElementById("Tot").value=Math.round((HP+DD+CG+IN+PL+AOI)*100)/100;
}
  
</script>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#D9D1E7">	
<?php $sqlE = mysql_query("SELECT EmpCode,Fname,Sname,Lname,DR,Gender,Married,DesigId,DepartmentId FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmployeeID=".$_REQUEST['E'], $con);  $ResE = mysql_fetch_assoc($sqlE); 
$sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$ResE['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
$sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$ResE['DepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD);
if($ResE['DR']=='Y'){$M='Dr.';} elseif($ResE['Gender']=='M'){$M='Mr.';} elseif($ResE['Gender']=='F' AND $ResE['Married']=='Y'){$M='Mrs.';} elseif($ResE['Gender']=='F' AND $ResE['Married']=='N'){$M='Miss.';}  
$Ename=$M.' '.$ResE['Fname'].' '.$ResE['Sname'].' '.$ResE['Lname']; $LEC=strlen($ResE['EmpCode']); 
if($LEC==1){$EC='000'.$ResE['EmpCode'];} if($LEC==2){$EC='00'.$ResE['EmpCode'];} if($LEC==3){$EC='0'.$ResE['EmpCode'];} if($LEC>=4){$EC=$ResE['EmpCode'];}
?>
<form name="AOIform" method="post">
<table border="0">
 <tr>
<td colspan="3" style="font-family:Times New Roman;font-size:14px;width:400px; font-weight:bold;background-color:#BCB198; color:#000;">
&nbsp;<font color="#800000">EC:</font>&nbsp;<?php echo $EC.'&nbsp;&nbsp;&nbsp;<font color="#800000">Name:</font>&nbsp;'.$Ename; ?>
</td>
</tr>
<?php $sql = mysql_query("SELECT * FROM hrm_emplyee_tds_otherincome WHERE EmployeeID=".$_REQUEST['E']." AND YearId=".$_REQUEST['Y'], $con); 
      $resIFOS = mysql_fetch_array($sql); ?>
<tr>
 <tr>
 <td bgcolor="#D9D1E7">
 <table border="1">
 <tr><td colspan="3" align="center" style="font-family:Times New Roman;font-size:12px;width:400px;background-color:#7a6189;color:#FFFFFF;"><b>Income From Other Source</b></td></tr> 
  <tr>
   <td align="center" class="Des" style="background-color:#BCB198;">Description</td>
   <td align="center" class="Amt" style="background-color:#BCB198;">Amount</td>
   <td align="center" class="TaxF" style="background-color:#BCB198;">TaxFree</td>
  </tr>
  <tr>
   <td class="Des" style="background-color:#FFFFFF;" valign="top">&nbsp;Income From House Property(Minus)</td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;" valign="top"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="HP" name="HP" value="<?php echo intval($resIFOS['HouseProperty']); ?>" onChange="Calcu()" onKeyDown="Calcu()" onClick="Calcu()" readonly /></td>
   <td align="right" class="TaxF" style="background-color:#FFFFFF;" valign="top">0&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;" valign="top">&nbsp;Income From Dividend</td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;" valign="top"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="DD" name="DD" value="<?php echo intval($resIFOS['Divident']); ?>" onChange="Calcu()" onKeyDown="Calcu()" onClick="Calcu()" readonly /></td>
   <td align="right" class="TaxF" style="background-color:#FFFFFF;" valign="top">0&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;" valign="top">&nbsp;Capital Gain</td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="CG" name="CG" value="<?php echo intval($resIFOS['CapitalGain']); ?>" onChange="Calcu()" onKeyDown="Calcu()" onClick="Calcu()" readonly /></td>
   <td align="right" class="TaxF" style="background-color:#FFFFFF;">0&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;" valign="top">&nbsp;Income From Interest (Bank/ NSC/ PostOffice/ SavingBond/ Kishan Vikas patra)</td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;" valign="top"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="IN" name="IN" value="<?php echo intval($resIFOS['Interest']); ?>" onChange="Calcu()" onKeyDown="Calcu()" onClick="Calcu()" readonly /></td>
   <td align="right" class="TaxF" style="background-color:#FFFFFF;" valign="top">0&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;" valign="top">&nbsp;Profit/Loss Bussiness</td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;" valign="top"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="PL" name="PL" value="<?php echo intval($resIFOS['ProfitLossBussi']); ?>" onChange="Calcu()" onKeyDown="Calcu()" onClick="Calcu()" readonly /></td>
   <td align="right" class="TaxF" style="background-color:#FFFFFF;" valign="top">0&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;" valign="top">&nbsp;Any Other Income</td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;" valign="top"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="AOI" name="AOI" value="<?php echo intval($resIFOS['AnyOther1']); ?>" onChange="Calcu()" onKeyDown="Calcu()" onClick="Calcu()" readonly /></td>
   <td align="right" class="TaxF" style="background-color:#FFFFFF;" valign="top">0&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#B5B5B5;">&nbsp;Total Income</td>
   <td align="center" class="Amt" style="background-color:#B5B5B5;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="Tot" name="Tot" value="<?php echo intval($resIFOS['TotalAnyAmt']); ?>" onChange="Calcu()" onBlur="Calcu()" onKeyDown="Calcu()" readonly />
   <input type="hidden" name="E" value="<?php echo $_REQUEST['E']; ?>" /><input type="hidden" name="C" value="<?php echo $_REQUEST['C']; ?>" />
   <input type="hidden" name="Y" value="<?php echo $_REQUEST['Y']; ?>" /><input type="hidden" name="U" value="<?php echo $_REQUEST['U']; ?>" />
   </td>
   <td align="right" class="TaxF" style="background-color:#B5B5B5;">0&nbsp;</td>
 </tr>
 <tr bgcolor="#7a6189">
   <td align="right" colspan="3">
    <table>
	 <tr>
	 <td style="font-family:Times New Roman;font-size:12px; font-weight:bold; color:#00D900;"><?php echo $msg; ?>&nbsp;</td>
	 <td align="right"><input type="button" name="Change" id="Change" style="width:80px;" value="edit" onClick="EditAOI()">
					   <input type="submit" name="Save" id="Save" value="save" style="display:none;width:80px;"></td>
	 <td align="right" style="width:90px;"><input type="button" name="Refresh" id="Refresh" style="width:90px;" value="refresh" onClick="javascript:window.location='EmpEditAnyOtherIncome.php?E=<?php echo $_REQUEST['E']; ?>&C=<?php echo $_REQUEST['C']; ?>&Y=<?php echo $_REQUEST['Y']; ?>&U=<?php echo $_REQUEST['U']; ?>'"/> </td>				   
	</tr>
	</table>
	</td>
	</tr>
 </table>
 </td>
 </tr>
</table>
</form>
</body>
</html>