<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Employee Registered Reports</title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:250px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:13px; height:10px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.cell {color:#FFFFFF;font-family:Times New Roman;font-size:14px;font-weight:bold;} 
.cell2 {color:#000;font-family:Times New Roman;font-size:14px;} .cell3 {color:#030303;font-family:Times New Roman;font-size:14px; font-weight:bold;} 
.cellOpe {color:#FFFFFF;font-family:Times New Roman; height:25px; font-size:14px; font-weight:bold;}
.cellOpe2 {color:#000;font-family:Times New Roman; height:25px; font-size:14px; font-weight:bold;}
.cellOpe3 {color:#000;font-family:Times New Roman; width:30px;height:20px; font-size:14px; font-weight:bold;}
thead {	display:table-header-group;}tbody {	display:table-row-group;}
</style>
<script type="text/javascript" language="javascript">
function PrintWin()
{window.print(); //window.close(); 
}
</script>   
</head>
<body onLoad="PrintWin()">
<table class="table">
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
  <thead><tr><td width="100%" align="right"><font color="#0033CC" size="5"><b>VNR Seeds Pvt Ltd</b></font>&nbsp;</td></tr></thead>
	 <tr>
	  <td valign="top"  align="center" width="100%" class="body">
<?php //**********************************************************************************?>
<?php //*****************START*****START*****START******START******START**********************************?>
<?php //********************************************************************************?>
<?php if($_REQUEST['m']==1){$SelM='January';} if($_REQUEST['m']==2){$SelM='February';} if($_REQUEST['m']==3){$SelM='March';}if($_REQUEST['m']==4){$SelM='April';} 
if($_REQUEST['m']==5){$SelM='May';} if($_REQUEST['m']==6){$SelM='June';} if($_REQUEST['m']==7){$SelM='July';} if($_REQUEST['m']==8){$SelM='August';} 
if($_REQUEST['m']==9){$SelM='September';} if($_REQUEST['m']==10){$SelM='October';} if($_REQUEST['m']==11){$SelM='November';} if($_REQUEST['m']==12){$SelM='December';} ?> 	
<?php if($_REQUEST['D']!='All') { $sqlD=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['D'], $con); $resD=mysql_fetch_assoc($sqlD); ?>
<?php $Dept=$resD['DepartmentName']; } else { $Dept='All'; }?>
   <table border="0">
   <thead>
    <tr style="height:30px;">
	  <td style="width:1500px;font-family:Times New Roman;" align="">&nbsp;
	  <b><u>Register Reports</u> :- <font color="#0033CC" size="+2">
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>year</i> :&nbsp;<?php echo $_REQUEST['Y']; ?>
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>month</i> :&nbsp;<?php echo $SelM; ?>
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>Department</i> :&nbsp;<?php echo $Dept; ?></font>
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <font color="#0080FF">P</font>– Present,&nbsp;&nbsp; <font color="#0080FF">A</font>- Absent,&nbsp;&nbsp;
	  <font color="#0080FF">CH</font>– Half day CL,&nbsp;&nbsp; <font color="#0080FF">SH</font>– Half day SL,&nbsp;&nbsp; 
	  <font color="#0080FF">H</font>- Holiday,&nbsp;&nbsp;  
	  <font color="#0080FF">OD</font>- Outdoor Duties  </b></td>
	  </td>
	</tr>
	</thead>
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { 

$BY=date("Y")-1;
if($_REQUEST['Y']>=date("Y"))
{ $AttTable='hrm_employee_attendance'; $AttReport='hrm_employee_attreport'; 
  $LeaveTable='hrm_employee_monthlyleave_balance'; $PayTable='hrm_employee_monthlypayslip'; }
elseif($_REQUEST['Y']==$BY AND date("m")=='01' AND $_REQUEST['m']==12)
{ $AttTable='hrm_employee_attendance'; $AttReport='hrm_employee_attreport'; 
  $LeaveTable='hrm_employee_monthlyleave_balance'; $PayTable='hrm_employee_monthlypayslip'; }
elseif($_REQUEST['Y']==$BY AND $_REQUEST['m']<12)
{ $AttTable='hrm_employee_attendance_'.$_REQUEST['Y']; $AttReport='hrm_employee_attreport_'.$_REQUEST['Y']; 
  $LeaveTable='hrm_employee_monthlyleave_balance_'.$_REQUEST['Y']; $PayTable='hrm_employee_monthlypayslip_'.$_REQUEST['Y']; }
else
{$AttTable='hrm_employee_attendance_'.$_REQUEST['Y']; $AttReport='hrm_employee_attreport_'.$_REQUEST['Y']; 
  $LeaveTable='hrm_employee_monthlyleave_balance_'.$_REQUEST['Y']; $PayTable='hrm_employee_monthlypayslip_'.$_REQUEST['Y']; }

?>	
 <tr>
<?php //******************** Open ************************************* ?> 
<td align="left" id="type" valign="top" width="100%">             
<form method="post" name="FormAtt" onSubmit="return validate(this)">
   <table border="0" cellpadding="0" cellspacing="0">
     <thead>
     <tr><td width="1600">
	   <table border="1" cellpadding="0" cellspacing="0" width="1600" style="margin-top:0px;">
	     <thead>
	     <tr style="height:25px;">
<td style="background-color:#7a6189;color:#FFFFFF;font-family:Times New Roman; width:30px; font-size:13px;" align="center"><b>SNo</b></td>		 
<td style="background-color:#7a6189;color:#FFFFFF;font-family:Times New Roman; width:30px; font-size:13px;" align="center"><b>EC</b></td>
<td style="background-color:#7a6189;color:#FFFFFF;font-family:Times New Roman; width:150px; font-size:13px;" align="center"><b>Name</b></td>
<td style="background-color:#7a6189;color:#FFFFFF;font-family:Times New Roman; width:750px; font-size:14px;" align=""><b>&nbsp;Month :</b>&nbsp;
<font style="font:Times New Roman; color:#FFFFFF; font-size:16px; background-color:#7a6189; font-weight:bold;"><?php echo $SelM; ?></font>
&nbsp;&nbsp;&nbsp;<?php if($_REQUEST['D']!='All') { $sqlD=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['D'], $con); 
$resD=mysql_fetch_assoc($sqlD); }?><b>Department :</b>&nbsp;
<font style="font:Times New Roman; color:#FFFFFF; font-size:14px; background-color:#7a6189;font-weight:bold;">
<?php if($_REQUEST['D']!='All') {echo $resD['DepartmentName']; } else { echo  'All'; } ?></font>
</td>
<td style="background-color:#7a6189;color:#FFFFFF;font-family:Times New Roman; width:280px; font-size:14px;" align="center"><b>Total</b></td>
<td style="background-color:#7a6189;color:#FFFFFF;font-family:Times New Roman; width:35px; font-size:14px;" align="center" valign="bottom"><b>Paid</b></td>
<td style="background-color:#7a6189;color:#FFFFFF;font-family:Times New Roman; width:50px; font-size:14px;" align="center" valign="bottom"><b>Actual</b></td>
<td style="background-color:#7a6189;color:#FFFFFF;font-family:Times New Roman; width:50px; font-size:14px;" align="center" valign="bottom"><b>Paid</b></td>
<td style="background-color:#7a6189;color:#FFFFFF;font-family:Times New Roman; width:50px; font-size:14px;" align="center" valign="bottom"><b>PF</b></td>
<td style="background-color:#7a6189;color:#FFFFFF;font-family:Times New Roman; width:50px; font-size:14px;" align="center" valign="bottom"><b>PF</b></td>
	     </tr>
		 </thead>
	   </table>
	    </td></tr>
	  
	   <tr><td width="1600"> 
	   <table border="1" cellpadding="0" cellspacing="0" width="1600">
	    <thead>
	     <tr>
<td style="background-color:#7a6189;color:#FFF;font-family:Times New Roman; width:30px; font-size:13px;" align="center">&nbsp;</td>
<td style="background-color:#7a6189;color:#FFF;font-family:Times New Roman; width:30px; font-size:13px;" align="center">&nbsp;</td>
<td style="background-color:#7a6189;color:#FFF;font-family:Times New Roman; width:150px; font-size:13px;"align="center">&nbsp;</td>		 
<td style="background-color:#7a6189;color:#FFF;font-family:Times New Roman; width:750px; font-size:14px;" align="left">
<table border="1">
<thead>
 <tr>
<?php $id=$_REQUEST['m']; $Y=$_REQUEST['Y']; ?>
<?php if($id==1 OR $id==3 OR $id==5 OR $id==7 OR $id==8 OR $id==10 OR $id==12){ $day=31; } 
	  elseif($id==4 OR $id==6 OR $id==9 OR $id==11){ $day=30; }
	  elseif($id==2){ if($Y==2012 OR $Y==2016 OR $Y==2020 OR $Y==2024 OR $Y==2028 OR $Y==2032 OR $Y==2036 OR $Y==2040){$day=29;}else{$day=28;} } ?> 
<?php for($i=1; $i<=$day; $i++) { ?><td align="center" class="cell" style="background-color:<?php if(date("w",strtotime(date($Y.'-'.$id.'-'.$i)))==0) {echo '#6B983A';} else {echo '#7a6189';} ?>;" width="20"><?php echo $i; ?></td><?php } ?>
 </tr>
 </thead>
</table>	  
</td>
<td style="background-color:#7a6189;color:#FFF;font-family:Times New Roman; width:280px; font-size:14px;" align="center">
      <table border="1">
	  <thead>
	  <tr>
	  <td class="cellOpe" align="center" width="35">Ho</td>
	  <td class="cellOpe" align="center" width="35">CL</td>
	  <td class="cellOpe" align="center" width="35">SL</td>
      <td class="cellOpe" align="center" width="35">PL</td>
	  <td class="cellOpe" align="center" width="35">EL</td>
	  <td class="cellOpe" align="center" width="35">FL</td>
	  <td class="cellOpe" align="center" width="35">ML</td>
	  <td class="cellOpe" align="center" width="35">OD</td>
	  <td class="cellOpe" align="center" width="35">Ab</td></tr>
	  </thead>
	  </table>
</td>
<td style="background-color:#7a6189;color:#FFF;font-family:Times New Roman; width:35px; font-size:14px;" align="center" valign="top"><b>Day</b></td>
<td style="background-color:#7a6189;color:#FFF;font-family:Times New Roman; width:50px; font-size:14px;" align="center" valign="top"><b>Basic</b></td>
<td style="background-color:#7a6189;color:#FFF;font-family:Times New Roman; width:50px; font-size:14px;" align="center" valign="top"><b>Basic</b></td>
<td style="background-color:#7a6189;color:#FFF;font-family:Times New Roman; width:50px; font-size:14px;" align="center" valign="top"><b>Wages</b></td>
<td style="background-color:#7a6189;color:#FFF;font-family:Times New Roman; width:50px; font-size:14px;" align="center" valign="top"><b>Deduct</b></td>
	   </tr>
</thead>	   
	   </table>
	    </td></tr>
</thead>
<tbody>		
		<tr><td style="width:1600px; font-size:14px; height:25px;" align="left"> 
<?php $EmpMgmtId="hrm_employee.EmployeeID!=223 AND hrm_employee.EmployeeID!=224 AND hrm_employee.EmployeeID!=233 AND hrm_employee.EmployeeID!=234 AND hrm_employee.EmployeeID!=235 AND hrm_employee.EmployeeID!=259 AND hrm_employee.EmployeeID!=259"; ?>
<table  border="1" bgcolor="#FFFFFF" cellpadding="0" cellspacing="0" width="1600"> 
<?php if($_REQUEST['D']!='All'){ $SqlEmp=mysql_query("select hrm_employee.*,hrm_employee_general.* from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus!='De' AND hrm_employee_general.DepartmentId=".$_REQUEST['D']." AND (hrm_employee.DateOfSepration='0000-00-00' OR hrm_employee.DateOfSepration='1970-01-01' OR hrm_employee.DateOfSepration>='".date($_REQUEST['Y']."-".$_REQUEST['m']."-01")."') AND hrm_employee_general.DateJoining<='".date($_REQUEST['Y']."-".$_REQUEST['m']."-31")."' AND hrm_employee.EmpCode<=11000 order by EmpCode ASC", $con); }
      if($_REQUEST['D']=='All'){ $SqlEmp=mysql_query("select hrm_employee.*,hrm_employee_general.* from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus!='De' AND hrm_employee.CompanyId=".$_REQUEST['C']." AND ".$EmpMgmtId." AND hrm_employee_general.DepartmentId!=0 AND (hrm_employee.DateOfSepration='0000-00-00' OR hrm_employee.DateOfSepration='1970-01-01' OR hrm_employee.DateOfSepration>='".date($_REQUEST['Y']."-".$_REQUEST['m']."-01")."') AND hrm_employee_general.DateJoining<='".date($_REQUEST['Y']."-".$_REQUEST['m']."-31")."' AND hrm_employee.EmpCode<=11000 order by EmpCode ASC", $con); }
$Sno=1; $SqlRows=mysql_num_rows($SqlEmp); while($ResEmp=mysql_fetch_array($SqlEmp)) { 
$Ename=$ResEmp['Fname'].' '.$ResEmp['Sname'].' '.$ResEmp['Lname']; $month=$_REQUEST['m'];
?>
<tr bgcolor="<?php if($Sno%2==0){echo '#ffffff';}else {echo '#AED7FF';} ?>" style="height:25px;">
<td style="color:#000;font-family:Times New Roman; width:30px;font-size:13px;" align="center" valign="top">&nbsp;<?php echo $Sno; ?></td>
<td style="color:#000;font-family:Times New Roman; width:30px;font-size:13px;" align="center" valign="top">&nbsp;<?php echo $ResEmp['EmpCode']; ?></td>
<td style="color:#000;font-family:Times New Roman; width:150px;font-size:13px;" valign="top">&nbsp;<?php echo strtoupper($Ename); ?>
<input type="hidden" name="EmpId" id="EmpId" value="<?php echo $ResEmp['EmployeeID']; ?>" />
</td>
<td style="color:#000;font-family:Times New Roman; width:750px; font-size:14px;" align="left" >
<table border="1">
 <tr style="height:25px;"> 
 <?php if($month==1 OR $month==3 OR $month==5 OR $month==7 OR $month==8 OR $month==10 OR $month==12){ $day=31; } 
	  elseif($month==4 OR $month==6 OR $month==9 OR $month==11){ $day=30; }
	  elseif($month==2){ if($Y==2012 OR $Y==2016 OR $Y==2020 OR $Y==2024 OR $Y==2028 OR $Y==2032 OR $Y==2036 OR $Y==2040){$day=29;}else{$day=28;} } ?>
<?php $SqlEmp2=mysql_query("SELECT * FROM ".$AttReport." WHERE EmployeeID =".$ResEmp['EmployeeID']." AND Year=".$Y." AND Month=".$month, $con); $ResEmp2=mysql_fetch_array($SqlEmp2); for($i=1; $i<=$day; $i++) { ?>
<td align="center" class="cell2" <?php if(date("w",strtotime(date($Y.'-'.$month.'-'.$i)))==0) {echo 'bgcolor="#6B983A"';} ?> width="20" <?php if($ResEmp2['A'.$i]=='HO'){echo 'bgcolor="#A9D3F5"';} elseif($ResEmp2['A'.$i]=='CL' OR $ResEmp2['A'.$i]=='SL' OR $ResEmp2['A'.$i]=='PL' OR $ResEmp2['A'.$i]=='EL' OR $ResEmp2['A'.$i]=='CH' OR $ResEmp2['A'.$i]=='SH' OR $ResEmp2['A'.$i]=='PH' OR $ResEmp2['A'.$i]=='FL' OR $ResEmp2['A'.$i]=='TL' OR $ResEmp2['A'.$i]=='ML' OR $ResEmp2['A'.$i]=='ACH' OR $ResEmp2['A'.$i]=='ASH' OR $ResEmp2['A'.$i]=='APH'){echo 'bgcolor="#F8FBBB"';} elseif($ResEmp2['A'.$i]=='A'){echo 'bgcolor="#FAD6CF"';} elseif($ResEmp2['A'.$i]=='P' OR $ResEmp2['A'.$i]=='WFH'){echo 'bgcolor="#FFFFFF"';} elseif($ResEmp2['A'.$i]=='OD'){echo 'bgcolor="#FFA4D1"';} ?> ><?php if($ResEmp2['A'.$i]==''){echo '&nbsp;';} else {echo $ResEmp2['A'.$i];} ?></td><?php } ?>
 </tr>
</table>
</td>
<td style="color:#FFF;font-family:Times New Roman; width:280px; font-size:13px;" align="center">
<?php $sqlTotAtt=mysql_query("select * from ".$LeaveTable." where Year=".$Y." AND EmployeeID=".$ResEmp['EmployeeID']." AND Month=".$month."", $con);
      $resTotAtt=mysql_fetch_assoc($sqlTotAtt);
 ?>
 
   <table border="1" cellspacing="0"><tr style="height:25px;">
      <td class="cellOpe2" align="center" style="background-color:#A9D3F5;height:24px;" width="35" valign="top"><?php if($resTotAtt['MonthAtt_TotHO']!=''){ echo $resTotAtt['MonthAtt_TotHO']; } else {echo '&nbsp;';} ?></td>
      <td class="cellOpe2" align="center" style="background-color:#F8FBBB;height:24px;" width="35" valign="top"><?php if($resTotAtt['MonthAtt_TotCL']!=''){ echo $resTotAtt['MonthAtt_TotCL']; } else {echo '&nbsp;';} ?></td>
	  <td class="cellOpe2" align="center" style="background-color:#F8FBBB;height:24px;" width="35" valign="top"><?php if($resTotAtt['MonthAtt_TotSL']!=''){ echo $resTotAtt['MonthAtt_TotSL']; } else {echo '&nbsp;';} ?></td>
	  
      <td class="cellOpe2" align="center" style="background-color:#F8FBBB;height:24px;" width="35" valign="top"><?php if($resTotAtt['MonthAtt_TotPL']!=''){ echo $resTotAtt['MonthAtt_TotPL']; } else {echo '&nbsp;';} ?></td>
	  <td class="cellOpe2" align="center" style="background-color:#F8FBBB;height:24px;" width="35" valign="top"><?php if($resTotAtt['MonthAtt_TotEL']!=''){ echo $resTotAtt['MonthAtt_TotEL']; } else {echo '&nbsp;';} ?></td>
	  <td class="cellOpe2" align="center" style="background-color:#F8FBBB;height:24px;" width="35" valign="top"><?php if($resTotAtt['MonthAtt_TotOL']!=''){ echo $resTotAtt['MonthAtt_TotOL']; } else {echo '&nbsp;';} ?></td>
	  <td class="cellOpe2" align="center" style="background-color:#F8FBBB;" width="35" valign="top"><?php if($resTotAtt['MonthAtt_TotML']!=''){ echo $resTotAtt['MonthAtt_TotML']; } else {echo '&nbsp;';} ?></td>
	   <td class="cellOpe2" align="center" style="background-color:#FFA4D1;height:24px;" width="35" valign="top"><?php if($resTotAtt['MonthAtt_TotOD']!=''){ echo $resTotAtt['MonthAtt_TotOD']; } else {echo '&nbsp;';} ?></td>
	  <td class="cellOpe2" align="center" style="background-color:#FAD6CF;height:24px;" width="35" valign="top"><?php if($resTotAtt['MonthAtt_TotAP']!=''){ echo $resTotAtt['MonthAtt_TotAP']; } else {echo '&nbsp;';} ?></td>
	  </tr>
   </table>
</td>
<td style="color:#000;font-family:Times New Roman; width:35px; font-size:14px; background-color:#B6F1BD; font-weight:bold;height:25px;" align="center">
<?php if($resTotAtt['MonthAtt_TotPaidDay']>26){$PaidDay=26;}else{$PaidDay=$resTotAtt['MonthAtt_TotPaidDay'];}
      if($PaidDay!=''){ echo $PaidDay; } else {echo '&nbsp;';} ?>
</td>
<?php 
$sqlCTC=mysql_query("select BAS_Value from hrm_employee_ctc where EmployeeID=".$ResEmp['EmployeeID']." AND Status='A'", $con); $resCTC=mysql_fetch_assoc($sqlCTC); 
$sqlMP=mysql_query("select ActualBasic,Basic,EPF_Employee,Arr_Basic,Arr_Pf,Arr_Esic from ".$PayTable." where EmployeeID=".$ResEmp['EmployeeID']." AND Month=".$month." AND Year=".$Y, $con); 
$rowMP=mysql_num_rows($sqlMP); if($rowMP>0){$resMP=mysql_fetch_assoc($sqlMP);}
$sqlPF=mysql_query("select Pf_MaxSalPf from hrm_company_statutory_pf where CompanyId=".$_REQUEST['C'], $con); $resPF=mysql_fetch_assoc($sqlPF);
//if($resMP['ActualBasic']<=$resPF['Pf_MaxSalPf']){$PFWages=$resMP['Basic'];}else{$PFWages=$resPF['Pf_MaxSalPf'];}
if($resMP['Basic']<=$resPF['Pf_MaxSalPf']){$PFWages=$resMP['Basic'];}else{$PFWages=$resPF['Pf_MaxSalPf'];}
?>
<td style="color:#000;font-family:Times New Roman; width:50px; font-size:14px;height:25px; background-color:; font-weight:bold;" align="center">
<?php if($resMP['ActualBasic']!=''){ echo intval($resMP['ActualBasic']); } else {echo '&nbsp;';} ?>
</td>
<td style="color:#000;font-family:Times New Roman; width:50px; font-size:14px;height:25px; background-color:; font-weight:bold;" align="center">
<?php if($PaidDay!='')
      { if($resMP['Basic']!=''){ echo intval($resMP['Basic']); } else {echo '&nbsp;';} 
        if($resMP['Arr_Basic']!=0){echo '<br><font style="font-size:12px;color:#EC0000;">Ar:&nbsp;'.intval($resMP['Arr_Basic']).'</font>';}
      } else {echo '&nbsp;';}?>
</td>
<td style="color:#000;font-family:Times New Roman; width:50px; font-size:14px;height:25px; background-color:; font-weight:bold;" align="center">
<?php if($PaidDay!=''){ if($resMP['Basic']==0){echo '0';}else { echo intval($PFWages); } } else {echo '&nbsp;';}?>
</td>
<td style="color:#000;font-family:Times New Roman; width:50px; font-size:14px;height:25px; background-color:; font-weight:bold;" align="center">
<?php if($PaidDay!='')
      { if($resMP['EPF_Employee']!=''){ echo intval($resMP['EPF_Employee']); } else {echo '&nbsp;';} 
        if($resMP['Arr_Pf']!=0){echo '<br><font style="font-size:12px;color:#EC0000;">Ar:&nbsp;'.intval($resMP['Arr_Pf']).'</font>';}
      } else {echo '&nbsp;';}?>
</td>
</tr>
<?php $Sno++; } ?> 	
</table>
        </td></tr>
	   </table>
	    </td>
		</tr>
  </table>
 </form>     
</td>
<?php //****************** Close ******************************************************?>    
  

 </tr>
<?php } ?> 
</table>
		
<?php //**************************************************************************************?>
<?php //***************END*****END*****END******END******END************************?>
<?php //****************************************************************************************?>
		
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>