<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//require_once('PhpFile/AttendanceP.php');
?>
<html>
<head>
<title>Employee PaySlip Details</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:250px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:13px; height:10px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.cell {color:#FFFFFF;font-family:Times New Roman;font-size:14px;font-weight:bold;} 
.cell2 {color:#000;font-family:Times New Roman;font-size:14px;} .cell3 {color:#030303;font-family:Times New Roman;font-size:14px; font-weight:bold;} 
.cellOpe {color:#FFFFFF;font-family:Times New Roman; height:20px; font-size:14px; font-weight:bold;}
.cellOpe2 {color:#000;font-family:Times New Roman; height:20px; font-size:14px; font-weight:bold;}
.cellOpe3 {color:#000;font-family:Times New Roman; width:30px;height:20px; font-size:14px; font-weight:bold;}
thead {	display:table-header-group;}tbody {	display:table-row-group;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/MasterAjaxCall.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" language="javascript">
function PrintWin()
{window.print(); window.close(); 
}
</script>   
</head>
<body class="body" onLoad="PrintWin()">
<table class="table" border="0">
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
	 <tr>
	  <td valign="top" align="center" width="100%" id="MainWindow">
<?php //***********************************************************************************?>
<?php //*************START*****START*****START******START******START****************************?>
<?php //*************************************************************************************?>
<?php if($_REQUEST['m']==1){$SelM='January';} if($_REQUEST['m']==2){$SelM='February';} if($_REQUEST['m']==3){$SelM='March';}if($_REQUEST['m']==4){$SelM='April';} 
if($_REQUEST['m']==5){$SelM='May';} if($_REQUEST['m']==6){$SelM='June';} if($_REQUEST['m']==7){$SelM='July';} if($_REQUEST['m']==8){$SelM='August';} 
if($_REQUEST['m']==9){$SelM='September';} if($_REQUEST['m']==10){$SelM='October';} if($_REQUEST['m']==11){$SelM='November';} if($_REQUEST['m']==12){$SelM='December';} 

$BY=date("Y")-1;
if($_REQUEST['Y']>=date("Y")){ $PayTable='hrm_employee_monthlypayslip'; }
elseif($_REQUEST['Y']==$BY AND date("m")=='01' AND $_REQUEST['m']==12)
{ $PayTable='hrm_employee_monthlypayslip'; }
elseif($_REQUEST['Y']==$BY AND $_REQUEST['m']<12)
{ $PayTable='hrm_employee_monthlypayslip_'.$_REQUEST['Y']; }
else
{ $PayTable='hrm_employee_monthlypayslip_'.$_REQUEST['Y'];  }


?> 	  
<table border="0" style="margin-top:0px; width:100%; height:350px;">
   <thead><tr><td width="100%" align="right"><font color="#0033CC" size="4"><b>VNR Seeds Pvt Ltd</b></font>&nbsp;</td></tr>
  
    <tr>
	  <td valign="top" color="#2D002D" colspan="15" style='font-family:Times New Roman;width:1000px;'>&nbsp;<font  size="4">
	  <b>PaySlip Reports :&nbsp;&nbsp;&nbsp; <u>Year</u> :</b></font>
	  <font style="font:Times New Roman; color:#005500; font-size:17px;font-weight:bold;"><b><?php echo $_REQUEST['Y']; ?></b>&nbsp;&nbsp;</font>
	  <b><u>Month</u> :</b>&nbsp; <font style="font:Times New Roman; color:#005500; font-size:18px;font-weight:bold;"><b><?php echo $SelM; ?></b>&nbsp;&nbsp;</font>
	  <?php if($_REQUEST['D']!='All') { $sqlD=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['D'], $con); 
	  $resD=mysql_fetch_assoc($sqlD); }?><b><u>Department</u> :</b>&nbsp;
	  <font style="font:Times New Roman; color:#005500; font-size:18px;font-weight:bold;"><b>
	  <?php if($_REQUEST['D']!='All') {echo $resD['DepartmentName']; } else { echo  'All'; } ?></font></b></td>
	</tr>
	</thead>
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>	
<table border="1" valign="top" style="width:<?php if($_REQUEST['m']==1 OR $_REQUEST['m']==9){echo '2000';}else{echo '1931';} ?>;">
<tr bgcolor="#7a6189">
 <td colspan="4">&nbsp;</td>
 <td align="center" style="color:#FFFFFF;font-family:Times New Roman; widows:50px;" valign="middle" rowspan="2"><b>Paid Day</b></td>
 <td colspan="<?php if($_REQUEST['m']==1 OR $_REQUEST['m']==9){echo '13';} else{echo '12';}?>" align="center" style="color:#FFFFFF;font-family:Times New Roman;"><b>Earning</b></td>
 <td colspan="8" align="center" style="color:#FFFFFF;font-family:Times New Roman;"><b>Arrears</b></td>
 <td colspan="3" align="center" style="color:#FFFFFF;font-family:Times New Roman;"><b>Tax Saving</b></td>
 <td align="center" style="color:#FFFFFF;font-family:Times New Roman; width:80px;" valign="middle" rowspan="2"><b>Total Earning</b></td>
 <td align="center" colspan="5" style="color:#FFFFFF;font-family:Times New Roman;"><b>Deduct</b></td>
 <td align="center" style="color:#FFFFFF;font-family:Times New Roman; width:80px;" valign="middle" rowspan="2"><b>Total Deduct</b></td>
 <td align="center" style="color:#FFFFFF;font-family:Times New Roman; width:80px;" valign="middle" rowspan="2"><b>Net Amount</b></td>
</tr>
<tr bgcolor="#7a6189">
 <td align="center" style="color:#FFFFFF;" class="All_50"><b>&nbsp;</b></td>
 <td align="center" style="color:#FFFFFF;" class="All_50"><b>SN</b></td>
 <td align="center" style="color:#FFFFFF;" class="All_50"><b>EC</b></td>
 <td align="center" style="color:#FFFFFF;" class="All_250"><b>Name</b></td>
 <td align="center" style="color:#FFFFFF;" class="All_60"><b>Basic</b></td>	
 <td align="center" style="color:#FFFFFF;" class="All_60"><b>Hra</b></td>	
 <td align="center" style="color:#FFFFFF;" class="All_60"><b>Convey</b></td>
 <td align="center" style="color:#FFFFFF;" class="All_60"><b>Car<br>Allow</b></td>
 <td align="center" style="color:#FFFFFF;" class="All_60"><b>Special</b></td>
 <td align="center" style="color:#FFFFFF;" class="All_60"><b>DA</b></td>
 <td align="center" style="color:#FFFFFF;" class="All_60"><b>Incentive</b></td>	
 <td align="center" style="color:#FFFFFF;" class="All_60"><b>Arrear</b></td>
 <td align="center" style="color:#FFFFFF;" class="All_60"><b>Variable Adjust</b></td>	
 <td align="center" style="color:#FFFFFF;" class="All_60"><b>Perform Pay</b></td>
 <td align="center" style="color:#FFFFFF;" class="All_60"><b>CCA</b></td>	
 <td align="center" style="color:#FFFFFF;" class="All_60"><b>RA</b></td>
 
 <td align="center" style="color:#FFFFFF;background-color:#5BADFF;" class="All_60"><b>Basic</b></td>
 <td align="center" style="color:#FFFFFF;background-color:#5BADFF;" class="All_60"><b>HRA</b></td>	
 <td align="center" style="color:#FFFFFF;background-color:#5BADFF;" class="All_60"><b>Car<br>Allow</b></td>
 <td align="center" style="color:#FFFFFF;background-color:#5BADFF;" class="All_60"><b>Spl</b></td>
 <td align="center" style="color:#FFFFFF;background-color:#5BADFF;" class="All_60"><b>Conv</b></td>
 <td align="center" style="color:#FFFFFF;background-color:#5BADFF;" class="All_60"><b>LV<br>Encash</b></td>	
 <td align="center" style="color:#FFFFFF;background-color:#5BADFF;" class="All_60"><b>PF</b></td>
 <td align="center" style="color:#FFFFFF;background-color:#5BADFF;" class="All_60"><b>ESIC</b></td>

 <td align="center" style="color:#000000;background-color:#FFCE9D;" class="All_60"><b>CEA</b></td>
 <td align="center" style="color:#000000;background-color:#FFCE9D;" class="All_60"><b>MR</b></td>	
 <td align="center" style="color:#000000;background-color:#FFCE9D;" class="All_60"><b>LTA</b></td>
 
 <?php if($_REQUEST['m']==9) { ?><td align="center" style="color:#FFFFFF;" class="All_60"><b>Bonus</b></td><?php } ?>
 <?php if($_REQUEST['m']==1) { ?><td align="center" style="color:#FFFFFF;" class="All_60"><b>Leave EnCash</b></td><?php } ?>
 <td align="center" style="color:#FFFFFF;" class="All_60"><b>PF</b></td>
 <td align="center" style="color:#FFFFFF;" class="All_60"><b>ESIC</b></td>
 <td align="center" style="color:#FFFFFF;" class="All_60"><b>TDS</b></td>
 <td align="center" style="color:#FFFFFF;" class="All_60"><b>VC</b></td>	
 <td align="center" style="color:#FFFFFF;" class="All_60"><b>Deduct Adjmnt</b></td>
</tr>
<?php $EmpMgmtId="hrm_employee.EmployeeID!=223 AND hrm_employee.EmployeeID!=224 AND hrm_employee.EmployeeID!=233 AND hrm_employee.EmployeeID!=234 AND hrm_employee.EmployeeID!=235 AND hrm_employee.EmployeeID!=259 AND hrm_employee.EmployeeID!=259"; ?>
<?php if($_REQUEST['D']!='All'){ $SqlEmp=mysql_query("select hrm_employee.*,hrm_employee_general.* from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus!='De' AND hrm_employee_general.DepartmentId=".$_REQUEST['D']." AND hrm_employee.CompanyId=".$CompanyId." AND (hrm_employee.DateOfSepration='0000-00-00' OR hrm_employee.DateOfSepration='1970-01-01' OR hrm_employee.DateOfSepration>='".date($_REQUEST['Y']."-".$_REQUEST['m']."-01")."') AND hrm_employee_general.DateJoining<='".date($_REQUEST['Y']."-".$_REQUEST['m']."-31")."' order by EmpCode ASC", $con); }
      if($_REQUEST['D']=='All'){ $SqlEmp=mysql_query("select hrm_employee.*,hrm_employee_general.* from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus!='De' AND hrm_employee.CompanyId=".$CompanyId." AND AND ".$EmpMgmtId." AND hrm_employee_general.DepartmentId!=0 AND (hrm_employee.DateOfSepration='0000-00-00' OR hrm_employee.DateOfSepration='1970-01-01' OR hrm_employee.DateOfSepration>='".date($_REQUEST['Y']."-".$_REQUEST['m']."-01")."') AND hrm_employee_general.DateJoining<='".date($_REQUEST['Y']."-".$_REQUEST['m']."-31")."' order by EmpCode ASC", $con); }

$Sno=1; $SqlRows=mysql_num_rows($SqlEmp); $sn=1; while($ResEmp=mysql_fetch_array($SqlEmp)) { 
$Ename=$ResEmp['Fname'].' '.$ResEmp['Sname'].' '.$ResEmp['Lname']; $month=$_REQUEST['m'];
$sqlSlip=mysql_query("select * from ".$PayTable." where EmployeeID=".$ResEmp['EmployeeID']." AND Month=".$_REQUEST['m']." AND YEar=".$_REQUEST['Y']."", $con);
$resSlip=mysql_fetch_assoc($sqlSlip);
 ?> 	
<tr bgcolor="<?php if($sn%2==0){echo '#D9D1E7';}else{echo '#FFFFFF';} ?>" id="TR<?php echo $sn; ?>">
 <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo $sn; ?>" onClick="FucChk(<?php echo $sn; ?>)" /></td>
 <td align="center" style="" class="All_50" valign="top"><?php echo $sn; ?></td>
 <td align="center" style="" class="All_50" valign="top"><?php echo $ResEmp['EmpCode']; ?></td>
 <td align="" style="" class="All_250" valign="top"><?php echo $Ename; ?></td>
 <td align="center" style="" class="All_50" valign="top"><?php if($resSlip['PaidDay']!=''){echo $resSlip['PaidDay'];}else{echo '&nbsp;';} ?></td>
 <td align="center" style="" class="All_60" valign="top"><?php if($resSlip['Basic']!=''){echo intval($resSlip['Basic']);}else{echo '&nbsp;';} ?></td>	
 <td align="center" style="" class="All_60" valign="top"><?php if($resSlip['Hra']!=''){echo intval($resSlip['Hra']);}else{echo '&nbsp;';} ?></td>	
 <td align="center" style="" class="All_60" valign="top"><?php if($resSlip['Convance']!=''){echo intval($resSlip['Convance']);}else{echo '&nbsp;';} ?></td>
 
 <td align="center" style="" class="All_60" valign="top"><?php if($resSlip['Car_Allowance']!=''){echo intval($resSlip['Car_Allowance']);}else{echo '&nbsp;';} ?></td>
 <td align="center" style="" class="All_60" valign="top"><?php if($resSlip['Special']!=''){echo intval($resSlip['Special']);}else{echo '&nbsp;';} ?></td>	
 <td align="center" style="" class="All_60" valign="top"><?php if($resSlip['DA']!=''){echo intval($resSlip['DA']);}else{echo '&nbsp;';} ?></td>	
 <td align="center" style="" class="All_60" valign="top"><?php if($resSlip['Incentive']!=''){echo intval($resSlip['Incentive']);}else{echo '&nbsp;';} ?></td>
 <td align="center" style="" class="All_60" valign="top"><?php if($resSlip['Arreares']!=''){echo intval($resSlip['Arreares']);}else{echo '&nbsp;';} ?></td>	
 <td align="center" style="" class="All_60" valign="top"><?php if($resSlip['VariableAdjustment']!=''){echo intval($resSlip['VariableAdjustment']);}else{echo '&nbsp;';} ?></td>
 <td align="center" style="" class="All_60" valign="top"><?php if($resSlip['PerformancePay']!=''){echo intval($resSlip['PerformancePay']);}else{echo '&nbsp;';} ?></td>	
 <td align="center" style="" class="All_60" valign="top"><?php if($resSlip['CCA']!=''){echo intval($resSlip['CCA']);}else{echo '&nbsp;';} ?></td>
 <td align="center" style="" class="All_60" valign="top"><?php if($resSlip['RA']!=''){echo intval($resSlip['RA']);}else{echo '&nbsp;';} ?></td>	
 
 <td align="center" style="background-color:#FFFFBF;" class="All_60" valign="top"><?php if($resSlip['Arr_Basic']!=''){echo intval($resSlip['Arr_Basic']);}else{echo '&nbsp;';} ?></td>	
 <td align="center" style="background-color:#FFFFBF;" class="All_60" valign="top"><?php if($resSlip['Arr_Hra']!=''){echo intval($resSlip['Arr_Hra']);}else{echo '&nbsp;';} ?></td>
 
 <td align="center" style="background-color:#FFFFBF;" class="All_60" valign="top"><?php if($resSlip['Car_Allowance_Arr']!=''){echo intval($resSlip['Car_Allowance_Arr']);}else{echo '&nbsp;';} ?></td>
 
 <td align="center" style="background-color:#FFFFBF;" class="All_60" valign="top"><?php if($resSlip['Arr_Spl']!=''){echo intval($resSlip['Arr_Spl']);}else{echo '&nbsp;';} ?></td>	
 <td align="center" style="background-color:#FFFFBF;" class="All_60" valign="top"><?php if($resSlip['Arr_Conv']!=''){echo intval($resSlip['Arr_Conv']);}else{echo '&nbsp;';} ?></td>
 <td align="center" style="background-color:#FFFFBF;" class="All_60" valign="top"><?php if($resSlip['Arr_LvEnCash']!=''){echo intval($resSlip['Arr_LvEnCash']);}else{echo '&nbsp;';} ?></td>
 <td align="center" style="background-color:#FFFFBF;" class="All_60" valign="top"><?php if($resSlip['Arr_Pf']!=''){echo intval($resSlip['Arr_Pf']);}else{echo '&nbsp;';} ?></td>
 <td align="center" style="background-color:#FFFFBF;" class="All_60" valign="top"><?php if($resSlip['Arr_Esic']!=''){echo intval($resSlip['Arr_Esic']);}else{echo '&nbsp;';} ?></td>

 <td align="center" style="background-color:#FFECD9;" class="All_60" valign="top"><?php if($resSlip['YCea']!=''){echo intval($resSlip['YCea']);}else{echo '&nbsp;';} ?></td>	
 <td align="center" style="background-color:#FFECD9;" class="All_60" valign="top"><?php if($resSlip['YMr']!=''){echo intval($resSlip['YMr']);}else{echo '&nbsp;';} ?></td>
 <td align="center" style="background-color:#FFECD9;" class="All_60" valign="top"><?php if($resSlip['YLta']!=''){echo intval($resSlip['YLta']);}else{echo '&nbsp;';} ?></td>
 
<?php if($_REQUEST['m']==9){ ?><td align="center" style="" class="All_60" valign="top"><?php if($resSlip['Bonus']!=''){echo intval($resSlip['Bonus']);}else{echo '&nbsp;';} ?></td><?php } ?><?php if($_REQUEST['m']==1){ ?><td align="center" style="" class="All_60" valign="top"><?php if($resSlip['LeaveEncash']!=''){echo intval($resSlip['LeaveEncash']);}else{echo '&nbsp;';} ?></td><?php } ?>
<?php 
$TotGross=$resSlip['Tot_Gross']+$resSlip['Bonus']+$resSlip['DA']+$resSlip['Arreares']+$resSlip['LeaveEncash']+$resSlip['Incentive']+$resSlip['VariableAdjustment']+$resSlip['PerformancePay']+$resSlip['CCA']+$resSlip['RA']+$resSlip['Arr_Basic']+$resSlip['Arr_Hra']+$resSlip['Arr_Spl']+$resSlip['Arr_Conv']+$resSlip['YCea']+$resSlip['YMr']+$resSlip['YLta']+$resSlip['Car_Allowance']+$resSlip['Car_Allowance_Arr']+$resSlip['Arr_LvEnCash']; 
$TotDeduct=$resSlip['TDS']+$resSlip['Tot_Deduct']+$resSlip['Arr_Pf']+$resSlip['VolContrib']+$resSlip['Arr_Esic']+$resSlip['DeductAdjmt'];
$TotNetAmount=$TotGross-$TotDeduct; 
?>
 <td align="center" style="" class="All_60" bgcolor="#BFFF80" valign="top"><?php if($TotGross!=''){echo intval($TotGross);}else{echo '&nbsp;';} ?></td>
 <td align="center" style="" class="All_60" valign="top"><?php if($resSlip['EPF_Employee']!=''){echo intval($resSlip['EPF_Employee']);}else{echo '&nbsp;';} ?></td>
 <td align="center" style="" class="All_60" valign="top"><?php if($resSlip['ESCI_Employee']!=''){echo intval($resSlip['ESCI_Employee']);}else{echo '&nbsp;';} ?></td>
 
 <td align="center" style="" class="All_60" valign="top"><a href="javascript:OpenTDS(<?php echo $ResEmp['EmployeeID'].', '.$_REQUEST['m'].', '.$resSlip['PaySlipYearId'].', '.$CompanyId; ?>)"><?php if($resSlip['TDS']!=''){echo intval($resSlip['TDS']);}else{echo '&nbsp;';} ?></a> </td>	
<td align="center" style="" class="All_60" valign="top"><?php if($resSlip['VolContrib']!=''){echo intval($resSlip['VolContrib']);}else{echo '&nbsp;';} ?></td>
<td align="center" style="" class="All_60" valign="top"><?php if($resSlip['DeductAdjmt']!=''){echo intval($resSlip['DeductAdjmt']);}else{echo '&nbsp;';} ?></td>
 <td align="center" style="" class="All_80" bgcolor="#FFD2D2" valign="top"><?php if($TotDeduct!=''){echo intval($TotDeduct);}else{echo '&nbsp;';} ?></td>	
 <td align="center" style="" class="All_80" bgcolor="#BFFF80" valign="top"><?php if($TotNetAmount!=''){echo intval($TotNetAmount);}else{echo '&nbsp;';} ?></td>
</tr>
<?php $sn++; } ?>
<tr>
  <td align="left" class="fontButton" style="width:100%;" colspan="<?php if($_REQUEST['m']==1 OR $_REQUEST['m']==11){echo '33';} else{echo '32';}?>">
    <table border="0">
     <tr>
	  <td align="left"><input type="button" name="back" id="back" style="width:90px;display:block;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"></td>
   </tr>
   </table>
  </td>
 </tr>
<?php } ?> 
</table>
		
<?php //*************************************************************************************?>
<?php //**************END*****END*****END******END******END*********************?>
<?php //*****************************************************************************************?>
		
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>