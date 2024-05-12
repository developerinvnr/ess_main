<?php require_once('../AdminUser/config/config.php');  ?>
<?php //if($_REQUEST['E']!='' AND $_REQUEST['M']!='' AND $_REQUEST['YI']!=''){  } ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php include_once('../Title.php'); ?>&nbsp;Incentive</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.Des{font-family:Times New Roman;font-size:12px;width:130px;}.Amt{font-family:Times New Roman;font-size:12px;width:90px;}
.TaxF{font-family:Times New Roman;font-size:12px;width:80px;}
</style>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#D9D1E7">	
<?php $sqlE = mysql_query("SELECT EmpCode,Fname,Sname,Lname,DR,Gender,Married,DesigId,DepartmentId FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmployeeID=".$_REQUEST['E'], $con);  $ResE = mysql_fetch_assoc($sqlE); 
$sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$ResE['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
$sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$ResE['DepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD);
if($ResE['DR']=='Y'){$M='Dr.';} elseif($ResE['Gender']=='M'){$M='Mr.';} elseif($ResE['Gender']=='F' AND $ResE['Married']=='Y'){$M='Mrs.';} elseif($ResE['Gender']=='F' AND $ResE['Married']=='N'){$M='Miss.';}  
$Ename=$M.' '.$ResE['Fname'].' '.$ResE['Sname'].' '.$ResE['Lname']; $LEC=strlen($ResE['EmpCode']); 
if($LEC==1){$EC='000'.$ResE['EmpCode'];} if($LEC==2){$EC='00'.$ResE['EmpCode'];} if($LEC==3){$EC='0'.$ResE['EmpCode'];} if($LEC>=4){$EC=$ResE['EmpCode'];}
?>
<table style="vertical-align:top;" width="400" align="center" border="1">
<?php /*
<tr>
<td colspan="3" style="font-family:Times New Roman;font-size:14px;width:400px; font-weight:bold;background-color:#BCB198; color:#000;">
&nbsp;<font color="#800000">EC:</font>&nbsp;<?php echo $EC.'&nbsp;&nbsp;&nbsp;<font color="#800000">Name:</font>&nbsp;'.$Ename; ?>
</td>
</tr>
<?php */ ?>
<?php $sql = mysql_query("SELECT * FROM hrm_emplyee_tds_incentive WHERE EmployeeID=".$_REQUEST['E']." AND YearId=".$_REQUEST['Y'], $con); 
      $res = mysql_fetch_array($sql); ?>
<tr>
<td style="width:400px;">
<table border="0">
 <tr>
 <td bgcolor="#D9D1E7">
 <table border="1">
 <tr><td colspan="4" align="center" style="font-family:Times New Roman;font-size:12px;width:400px;background-color:#7a6189;color:#FFFFFF;"><b>Incentive</b></td></tr> 
 <tr>
   <td align="center" class="Des" style="background-color:#BCB198;">Month</td>
   <td align="center" class="Amt" style="background-color:#BCB198;">Amount</td>
   <td align="center" class="Amt" style="background-color:#BCB198;">TaxFree</td>
   <td align="center" class="Amt" style="background-color:#BCB198;">Taxable</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;April</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['Apr_Amt']); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['Apr_TaxFree']); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['Apr_Taxble']); ?>&nbsp;</td> 
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;May</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['May_Amt']); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['May_TaxFree']); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['May_Taxble']); ?>&nbsp;</td> 
 </tr>
 <tr>

   <td class="Des" style="background-color:#FFFFFF;">&nbsp;Jun</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['Jun_Amt']); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['Jun_TaxFree']); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['Jun_Taxble']); ?>&nbsp;</td> 
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;July</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['Jul_Amt']); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['Jul_TaxFree']); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['Jul_Taxble']); ?>&nbsp;</td> 
 </tr>
  <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;August</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['Aug_Amt']); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['Aug_TaxFree']); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['Aug_Taxble']); ?>&nbsp;</td> 
 </tr>
  <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;September</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['Sep_Amt']); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['Sep_TaxFree']); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['Sep_Taxble']); ?>&nbsp;</td> 
 </tr>
  <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;October</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['Oct_Amt']); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['Oct_TaxFree']); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['Oct_Taxble']); ?>&nbsp;</td> 
 </tr>
  <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;November</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['Nov_Amt']); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['Nov_TaxFree']); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['Nov_Taxble']); ?>&nbsp;</td> 
 </tr>
  <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;December</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['Dec_Amt']); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['Dec_TaxFree']); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['Dec_Taxble']); ?>&nbsp;</td> 
 </tr>
  <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;January</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['Jan_Amt']); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['Jan_TaxFree']); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['Jan_Taxble']); ?>&nbsp;</td> 
 </tr>
  <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;February</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['Feb_Amt']); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['Feb_TaxFree']); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['Feb_Taxble']); ?>&nbsp;</td> 
 </tr>
  <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;March</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['Mar_Amt']); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['Mar_TaxFree']); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['Mar_Taxble']); ?>&nbsp;</td> 
 </tr>
 <tr>
   <td class="Des" align="right" style="background-color:#BCB198;">&nbsp;Total&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#D1D1D1;"><?php echo intval($res['Tot_Amt']); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#D1D1D1;"><?php echo intval($res['Tot_TaxFree']); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#D1D1D1;"><?php echo intval($res['Tot_Taxble']); ?>&nbsp;</td> 
 </tr>
 </table>
 </td>
 </tr>
</table>
</td>
</tr>
</table>
</body>
</html>