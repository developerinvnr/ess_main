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

$sqlE=mysql_query("select Fname,Sname,Lname,EmpCode,DesigId,DepartmentId,GradeId,Gender,PanNo,CostCenter,AccountNo,BankName,PfAccountNo,g.HqId,DOB,DateJoining,DR,Married,StateName,HqName from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_state s ON g.CostCenter=s.StateId where e.EmployeeID=".$_REQUEST['E'], $con); $resE=mysql_fetch_assoc($sqlE); 
//$sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$resE['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
//$sqlD=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$resE['DepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD);
//$sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$resE['GradeId'], $con); $resG=mysql_fetch_assoc($sqlG);
$SqlCC=mysql_query("select StateName from hrm_state where StateId=".$resE['CostCenter'], $con); $resCC=mysql_fetch_assoc($SqlCC);
$sqlHq=mysql_query("select HqName from hrm_headquater where HqId=".$resE['HqId'], $con); $resHq=mysql_fetch_assoc($sqlHq);
if($resE['DR']=='Y'){$M='Dr.';} elseif($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';}  
$Ename=$M.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; $LEC=strlen($resE['EmpCode']); 
if($LEC==1){$EC='000'.$resE['EmpCode'];} if($LEC==2){$EC='00'.$resE['EmpCode'];} if($LEC==3){$EC='0'.$resE['EmpCode'];} if($LEC>=4){$EC=$resE['EmpCode'];}


$SqlPay=mysql_query("SELECT * FROM ".$PayTable." WHERE EmployeeID=".$_REQUEST['E']." AND Month=".$_REQUEST['M']." AND YEAR=".$_REQUEST['Y']."", $con); 

$RowPay=mysql_num_rows($SqlPay);
 if($RowPay==0)
 { 
  $SqlPay=mysql_query("SELECT * FROM hrm_employee_monthlypayslip WHERE EmployeeID=".$_REQUEST['E']." AND Month=".$_REQUEST['M']." AND Year=".$_REQUEST['Y']."", $con); $ResPay=mysql_fetch_assoc($SqlPay);
  
 }
 else{$ResPay=mysql_fetch_assoc($SqlPay); }
 
 
    if($ResPay['GradeId']>0)
    {
     $SqlG=mysql_query("SELECT GradeValue FROM hrm_grade WHERE GradeId=".$ResPay['GradeId'], $con); 
     //echo 'G1='."SELECT GradeValue FROM hrm_grade WHERE GradeId=".$ResPay['GradeId']; 
     $ResG=mysql_fetch_assoc($SqlG); 
     $GradeValue=$ResG['GradeValue'];
    }
    else 
    { $SqlG=mysql_query("SELECT GradeValue FROM hrm_grade WHERE GradeId=".$resE['GradeId'], $con); 
    //echo 'G2='."SELECT GradeValue FROM hrm_grade WHERE GradeId=".$resE['GradeId']; 
    $ResG=mysql_fetch_assoc($SqlG); 
     $GradeValue=$ResG['GradeValue']; 
    }
    
    if($ResPay['DepartmentId']>0)
    {
     $SqlD=mysql_query("SELECT DepartmentName FROM hrm_department WHERE DepartmentId=".$ResPay['DepartmentId'], $con); 
     //echo 'D1='."SELECT DepartmentName FROM hrm_department WHERE DepartmentId=".$ResPay['DepartmentId'];
     $ResD=mysql_fetch_assoc($SqlD); 
     $DeptValue=$ResD['DepartmentName'];
    }
    else 
    { $SqlD=mysql_query("SELECT DepartmentName FROM hrm_department WHERE DepartmentId=".$resE['DepartmentId'], $con); 
    //echo 'D2='."SELECT DepartmentName FROM hrm_department WHERE DepartmentId=".$resE['DepartmentId'];
    $ResD=mysql_fetch_assoc($SqlD); 
     $DeptValue=$ResD['DepartmentName']; 
        
    }
    
    
    if($ResPay['DesigId']>0)
    {
     $SqlDe=mysql_query("SELECT DesigName FROM hrm_designation WHERE DesigId=".$ResPay['DesigId'], $con); 
     //echo 'De1='."SELECT DesigName FROM hrm_designation WHERE DesigId=".$ResPay['DesigId'];
     $ResDe=mysql_fetch_assoc($SqlDe); 
     $DesigValue=$ResDe['DesigName'];
    }
    else 
    { $SqlDe=mysql_query("SELECT DesigName FROM hrm_designation WHERE DesigId=".$resE['DesigId'], $con); 
    //echo 'De2='."SELECT DesigName FROM hrm_designation WHERE DesigId=".$resE['DesigId'];
    $ResDe=mysql_fetch_assoc($SqlDe); 
     $DesigValue=$ResDe['DesigName']; 
        
    }


//$GradeValue=$ResPay['GradeValue'];

/*if($ResPay['DesigId']>0){ $sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$ResPay['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig); }
if($ResPay['DepartmentId']>0){ $sqlD=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$ResPay['DepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD); }
if($ResPay['GradeId']>0){ $sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$ResPay['GradeId'], $con); $resG=mysql_fetch_assoc($sqlG); }*/


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
   <tr><td align="center" style="width:100px;"><img src="../images/VNRLogo3.png" border="0" style="width:100px; height:130px;"/></td></tr>
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

