<?php require_once('config/config.php'); ?>
<html>
<head>
<title>Employee PaySlip</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>

<style>
.td13c{font-family:"Courier New", Courier, monospace;font-size:13px;background-color:#D9D1E7;}.td14c{font-family:"Courier New", Courier, monospace;font-size:14px;background-color:#D9D1E7;}.td15c{font-family:"Courier New", Courier, monospace;font-size:15px;background-color:#D9D1E7;}.td13{font-family:"Courier New", Courier, monospace;font-size:13px;}.td14{font-family:"Courier New", Courier, monospace;font-size:14px;}.td15{font-family:"Courier New", Courier, monospace;font-size:15px;}.td13r{font-family:"Courier New", Courier, monospace;font-size:13px;text-align:right;}.td14r{font-family:"Courier New", Courier, monospace;font-size:14px;text-align:right;}.td15r{font-family:"Courier New", Courier, monospace;font-size:15px;text-align:right;}.td14ce{font-family:"Courier New", Courier, monospace;font-size:14px;}.font1 { font-family:"Courier New", Courier, monospace;font-size:12px;height:14px; }.td11 { font-family:"Courier New", Courier, monospace;font-size:11px; text-align:center;color:#FFFFFF; } 
</style>

<!--<style>.font { color:#ffffff; font-family:Georgia; font-size:11px; width:200px;} .font1 { font-family:Georgia; font-size:11px; height:14px; } 
.font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }
.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>-->
<Script type="text/javascript">
function printp(EI,M,Y,YI,CI)
{ window.location="PrintPaySlip.php?action=Print&EI="+EI+"&m="+M+"&Y="+Y+"&YI="+YI+"&CI="+CI; }
</Script>
</head>
<body class="body">
&nbsp;&nbsp;<a href="#" onClick="printp(<?php echo $_REQUEST['E'].','.$_REQUEST['M'].','.$_REQUEST['Y'].','.$_REQUEST['YI'].','.$_REQUEST['C'] ?>)">Print</a>
<center>
<?php //*********************************************************************************************** ?>	   
<?php 

$BY=date("Y")-1;
if($_REQUEST['Y']>=date("Y")){ $PayTable='hrm_employee_monthlypayslip'; $LeaveTable='hrm_employee_monthlyleave_balance'; }
elseif($_REQUEST['Y']==$BY AND date("m")=='01' AND $_REQUEST['M']==12)
{ $PayTable='hrm_employee_monthlypayslip'; $LeaveTable='hrm_employee_monthlyleave_balance'; }
elseif($_REQUEST['Y']==$BY AND $_REQUEST['M']<12)
{ $PayTable='hrm_employee_monthlypayslip_'.$_REQUEST['Y']; $LeaveTable='hrm_employee_monthlyleave_balance_'.$_REQUEST['Y']; }
else
{ $PayTable='hrm_employee_monthlypayslip_'.$_REQUEST['Y']; $LeaveTable='hrm_employee_monthlyleave_balance_'.$_REQUEST['Y'];  }

if($_REQUEST['Y']>=2025)
 {
    
  $sel="p.*, e.EmpCode, concat(Fname, ' ', Sname, ' ', Lname) as Name, DateJoining, p.HqId, p.TerrId, MobileNo_Vnr, EmailId_Vnr, DR, Gender, Married, PanNo, CostCenter, AccountNo, BankName, PfAccountNo, DOB, DateJoining, function_name, vertical_name, department_name, sub_department_name, designation_name, grade_name, state_name, city_village_name, territory_name,
  CASE 
  WHEN DR = 'Y' THEN 'Dr.'
  WHEN Gender = 'M' THEN 'Mr.'
  WHEN Gender = 'F' AND Married = 'Y' THEN 'Mrs.'
  WHEN Gender = 'F' AND Married = 'N' THEN 'Miss.'
  ELSE '' END as Greeting";    
  
  $join="p 
  left join hrm_employee_general g ON p.EmployeeID=g.EmployeeID
  left join hrm_employee e ON g.EmployeeID=e.EmployeeID 
  left join hrm_employee_personal pr on g.EmployeeID=pr.EmployeeID
  left join core_functions fun on p.FunId=fun.id
  left join core_verticals ver on p.VerId=ver.id
  left join core_departments dept on p.DepartmentId=dept.id
  left join core_sub_department_master subdept on p.SubDeptId=subdept.id
  left join core_designation desig on p.DesigId=desig.id
  left join core_grades gr on p.GradeId=gr.id
  left join core_states st on p.StateId=st.id
  left join core_city_village_by_state vlg on p.HqId=vlg.id 
  left join core_territory Tr on p.TerrId=Tr.id";
 }
 else
 {
        
    $sel="p.*, e.EmpCode, concat(Fname, ' ', Sname, ' ', Lname) as Name, DateJoining, p.HqId, p.TerrId, MobileNo_Vnr, EmailId_Vnr, DR, Gender, Married, PanNo, CostCenter, AccountNo, BankName, PfAccountNo, DOB, DateJoining, DepartmentName as department_name, DesigName as designation_name, GradeValue as grade_name, StateName as state_name, hq.HqName as city_village_name,
  CASE 
  WHEN DR = 'Y' THEN 'Dr.'
  WHEN Gender = 'M' THEN 'Mr.'
  WHEN Gender = 'F' AND Married = 'Y' THEN 'Mrs.'
  WHEN Gender = 'F' AND Married = 'N' THEN 'Miss.'
  ELSE '' END as Greeting";    
   
  $join="p 
  left join hrm_employee_general g ON p.EmployeeID=g.EmployeeID
  left join hrm_employee e ON g.EmployeeID=e.EmployeeID 
  left join hrm_employee_personal pr on g.EmployeeID=pr.EmployeeID
  left join hrm_department dept on p.DepartmentId=dept.DepartmentId
  left join hrm_designation desig on p.DesigId=desig.DesigId
  left join hrm_grade gr on p.GradeId=gr.GradeId
  left join hrm_state st on p.StateId=st.StateId
  left join hrm_headquater hq on p.HqId=hq.HqId"; 
 }
    
  $cond="p.EmployeeID=".$_REQUEST['E']." AND p.Month=".$_REQUEST['M']." AND p.Year=".$_REQUEST['Y']."";

$SqlPay=mysql_query("SELECT ".$sel." FROM ".$PayTable." ".$join." WHERE ".$cond, $con); 

$RowPay=mysql_num_rows($SqlPay);
 if($RowPay==0)
 { 
  $SqlPay=mysql_query("SELECT ".$sel." FROM hrm_employee_monthlypayslip ".$join." WHERE ".$cond, $con); $ResPay=mysql_fetch_assoc($SqlPay);
  
 }
 else{$ResPay=mysql_fetch_assoc($SqlPay); }
 
 $LEC = strlen($ResPay['EmpCode']);
 if($LEC==1){$EC='000'.$ResPay['EmpCode'];} if($LEC==2){$EC='00'.$ResPay['EmpCode'];} if($LEC==3){$EC='0'.$ResPay['EmpCode'];} if($LEC>=4){$EC=$ResPay['EmpCode'];}
 
 $fun=''; $vert=''; $dept=''; $subdept=''; $desig=''; $grade=''; $state=''; $hq=''; 
  if($ResPay['function_name']!=''){ $fun=$ResPay['function_name']; }
  if($ResPay['vertical_name']!=''){ $vert=$ResPay['vertical_name']; }
  if($ResPay['department_name']!=''){ $dept=$ResPay['department_name']; }
  if($ResPay['sub_department_name']!=''){ $subdept=$ResPay['sub_department_name']; }
  if($ResPay['designation_name']!=''){ $desig=$ResPay['designation_name']; }
  if($ResPay['grade_name']!=''){ $grade=$ResPay['grade_name']; }
  if($ResPay['state_name']!=''){$state=$ResPay['state_name'];}
  if($ResPay['TerrId']>0){$hq=$ResPay['territory_name'];}else{$hq=$ResPay['city_village_name']; } 
 

if($_REQUEST['M']==1){$SelM='January';} if($_REQUEST['M']==2){$SelM='February';} if($_REQUEST['M']==3){$SelM='March';}if($_REQUEST['M']==4){$SelM='April';} 
if($_REQUEST['M']==5){$SelM='May';} if($_REQUEST['M']==6){$SelM='June';} if($_REQUEST['M']==7){$SelM='July';} if($_REQUEST['M']==8){$SelM='August';} 
if($_REQUEST['M']==9){$SelM='September';} if($_REQUEST['M']==10){$SelM='October';} if($_REQUEST['M']==11){$SelM='November';} if($_REQUEST['M']==12){$SelM='December';}

?> 
 <table border="1" bgcolor="#FFFFFF">
 <tr>
 <td style="width:800px;" align="center" valign="top">
  <table style="width:800px;" border="0" bgcolor="#FFFFFF" align="center">
<?php $SqlCom=mysql_query("select * from hrm_company_basic where CompanyId=".$_REQUEST['C'], $con); $resCom=mysql_fetch_assoc($SqlCom); 
      $SqlS=mysql_query("select StateName from hrm_state where StateId=".$resCom['StateId'], $con); $resS=mysql_fetch_assoc($SqlS);  
?>   
<tr>
 <td style="width:100px;" align="center" valign="middle">
  <table style="width:100px;">
   <tr>
   <td align="center" style="width:100px;">
        <?php if($_REQUEST['C']==3){?>
        <img src="../images/vnrnursery_logo.png" border="0" height="50"/>
        <?php }else{?>
        <img src="../images/VNRLogo3.png" border="0" style="width:100px; height:130px;"/>
        <?php }?>
   </td>
   </tr>
  </table>
 </td>
 <td style="width:580px;" align="center">
  <table style="width:580px;">
   <tr><td align="center" style='font-family:Geneva, Arial, Helvetica, sans-serif;width:600px;font-size:20px; color:#005500;'><b><?php echo strtoupper($resCom['CompanyName']); ?></b></td></tr>
   <tr><td align="center" style='font-family:Times New Roman;width:600px; font-size:14px;'><b><?php echo $resCom['AdminOffice_Address']; ?></b></td></tr>
   <tr><td align="center" style='font-family:Times New Roman;width:600px; font-size:14px;'>
   <b><?php echo $resCom['AdminOffice'].' ('.$resCom['PinNo'].') ['.$resS['StateName'].']'; ?></b></td></tr>
   <tr><td align="center" style='font-family:Times New Roman;width:600px; font-size:14px;'>
   <b>PAYSLIP FOR THE MONTH OF <font color="#930000"><u><?php echo strtoupper($SelM).'-'.$_REQUEST['Y']; ?></u></b></font></td></tr>
  </table>
 </td>
 <td style="width:100px;" align="center" valign="middle">
  <table style="width:100px;">
   <tr><td align="center" style="width:100px;"><?php /*<img src="../images/VNRLogo3.png" border="0" style="width:78px; height:100px; "/> */ ?></td></tr>
  </table>
 </td>
<tr>
  </table>
 </td>
 </tr>
 
 <?php /******************* Start ***************************/ ?>
 <?php /******************* Start ***************************/ ?>
 <?php include("../Employee/PayslipMain.php"); ?>
 <?php /******************* Close ***************************/ ?>
 <?php /******************* Close ***************************/ ?>
 
  </table>
  </td>
 </tr>
<?php /************************************* Leave **********************************/ ?>
<tr><td class="td14r" style="color:#0000CC;border-bottom:hidden;"><b>LEAVE DETAILS</b>
<?php if($_REQUEST['m']==1) { ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php } else { ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php } ?>
</td></tr>
<?php $sqlLV=mysql_query("select * from ".$LeaveTable." where EmployeeID=".$_REQUEST['E']." AND Month=".$_REQUEST['M']." AND Year='".$_REQUEST['Y']."'", $con); 
      $resLV=mysql_fetch_array($sqlLV); ?>
  <tr>
  <td align="right" style="border-top:hidden;">
<?php if($_REQUEST['m']==1) { ?>  
 <table style="width:500px;" border="1" cellspacing="0">
 <tr bgcolor="#7a6189" style="height:25px;">
 <td class="td11" style="width:50px;"><b>LV</b></td>
 <td class="td11" style="width:50px;"><b>Opening</b></td>
 <td class="td11" style="width:70px;"><b>Credit</b></td>
 <td class="td11" style="width:70px;"><b>Total</b></td>
 <td class="td11" style="width:70px;"><b>EnCash</b></td>
 <td class="td11" style="width:70px;"><b>Availed</b></td>
 <td class="td11" style="width:70px;"><b>Balance</b></td>
 </tr>
 <tr style="height:22px;">
 <td class="font1" align="center">CL</td>
 <td class="font1" align="center"><?php echo $resLV['OpeningCL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['CreditedCL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['TotCL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['EnCashCL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['AvailedCL']; ?></td>
 <td class="font1" align="center" bgcolor="#FFE1E1"><b><?php echo $resLV['BalanceCL']; ?></b></td>
</tr>
<tr style="height:22px;">
 <td class="font1" align="center">SL</td>
 <td class="font1" align="center"><?php echo $resLV['OpeningSL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['CreditedSL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['TotSL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['EnCashSL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['AvailedSL']; ?></td>
 <td class="font1" align="center" bgcolor="#FFE1E1"><b><?php echo $resLV['BalanceSL']; ?></b></td>
</tr>
<tr style="height:22px;">
 <td class="font1" align="center">PL</td>
 <td class="font1" align="center"><?php echo $resLV['OpeningPL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['CreditedPL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['TotPL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['EnCashPL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['AvailedPL']; ?></td>
 <td class="font1" align="center" bgcolor="#FFE1E1"><b><?php echo $resLV['BalancePL']; ?></b></td>
</tr>
<tr style="height:22px;">
 <td class="font1" align="center">EL</td>
 <td class="font1" align="center"><?php echo $resLV['OpeningEL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['CreditedEL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['TotEL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['EnCashEL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['AvailedEL']; ?></td>
 <td class="font1" align="center" bgcolor="#FFE1E1"><b><?php echo $resLV['BalanceEL']; ?></b></td>
</tr>
<?php if(date($YY."-".$_REQUEST['m']."-01")>='2014-02-01'){ ?>
<tr style="height:22px;">
 <td class="font1" align="center">FL</td>
 <td class="font1" align="center"><?php echo $resLV['OpeningOL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['CreditedOL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['TotOL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['EnCashOL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['AvailedOL']; ?></td>
 <td class="font1" align="center" bgcolor="#FFE1E1"><b><?php echo $resLV['BalanceOL']; ?></b></td>
</tr>
<?php } ?>
</table>
<?php } else {?>
<table border="1" cellspacing="1">
<tr bgcolor="#7a6189" style="height:25px;">
 <td class="td11" style="width:100px;"><b>Leave</b></td>
 <td class="td11" style="width:100px;"><b>Opening</b></td>
 <td class="td11" style="width:100px;"><b>Availed</b></td>
 <td class="td11" style="width:100px;"><b>Balance</b></td>
</tr>
<tr style="height:22px;">
 <td class="font1" align="center">CL</td>
 <td class="font1" align="center"><?php echo $resLV['OpeningCL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['AvailedCL']; ?></td>
 <td class="font1" align="center" bgcolor="#FFE1E1"><b><?php echo $resLV['BalanceCL']; ?></b></td>
</tr>
<tr style="height:22px;">
 <td class="font1" align="center">SL</td>
 <td class="font1" align="center"><?php echo $resLV['OpeningSL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['AvailedSL']; ?></td>
 <td class="font1" align="center" bgcolor="#FFE1E1"><b><?php echo $resLV['BalanceSL']; ?></b></td>
</tr>
<tr style="height:22px;">
 <td class="font1" align="center">PL</td>
 <td class="font1" align="center"><?php echo $resLV['OpeningPL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['AvailedPL']; ?></td>
 <td class="font1" align="center" bgcolor="#FFE1E1"><b><?php echo $resLV['BalancePL']; ?></b></td>
</tr>
<tr style="height:22px;">
 <td class="font1" align="center">EL</td>
 <td class="font1" align="center"><?php echo $resLV['OpeningEL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['AvailedEL']; ?></td>
 <td class="font1" align="center" bgcolor="#FFE1E1"><b><?php echo $resLV['BalanceEL']; ?></b></td>
</tr>
<?php if(date($YY."-".$_REQUEST['m']."-01")>='2014-02-01'){ ?>
<tr style="height:22px;">
 <td class="font1" align="center">FL</td>
 <td class="font1" align="center"><?php echo $resLV['OpeningOL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['AvailedOL']; ?></td>
 <td class="font1" align="center" bgcolor="#FFE1E1"><b><?php echo $resLV['BalanceOL']; ?></b></td>
</tr>
<?php } ?>
</table>
<?php } ?>
  </td>
 </tr>
<?php /************************************* Leave **********************************/ ?> 
 </table>
</td>
<?php //********************** // ?> 
</tr>
</table>
<?php //*************************************************************************************************************************************************** ?>
</center>
</body>
</html>

