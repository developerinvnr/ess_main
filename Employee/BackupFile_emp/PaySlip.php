<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<style>
.td13c{font-family:"Courier New", Courier, monospace;font-size:13px;background-color:#D9D1E7;}.td14c{font-family:"Courier New", Courier, monospace;font-size:14px;background-color:#D9D1E7;}.td15c{font-family:"Courier New", Courier, monospace;font-size:15px;background-color:#D9D1E7;}.td13{font-family:"Courier New", Courier, monospace;font-size:13px;}.td14{font-family:"Courier New", Courier, monospace;font-size:14px;}.td15{font-family:"Courier New", Courier, monospace;font-size:15px;}.td13r{font-family:"Courier New", Courier, monospace;font-size:13px;text-align:right;}.td14r{font-family:"Courier New", Courier, monospace;font-size:14px;text-align:right;}.td15r{font-family:"Courier New", Courier, monospace;font-size:15px;text-align:right;}.td14ce{font-family:"Courier New", Courier, monospace;font-size:14px;}.font1 { font-family:"Courier New", Courier, monospace;font-size:12px;height:14px; }.td11 { font-family:"Courier New", Courier, monospace;font-size:11px; text-align:center;color:#FFFFFF; } 
</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function SelMonth(v){ var x='PaySlip.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&wew=e%e@er%rdd=012&m='+v; window.location=x; }

function PrintPay(EI,M,Y,YI)
{ //alert(EI+"-"+M+"-"+Y+"-"+YI); 
  var CI=document.getElementById("ComID").value;
  window.open("PrintPaySlip.php?action=Print&EI="+EI+"&m="+M+"&Y="+Y+"&YI="+YI+"&CI="+CI,"PrintForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=20,height=20");
}
//width=850,height=650
</script>

</head>
<body class="body">
<input type="hidden" id="ComID" value="<?php echo $CompanyId; ?>" >
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table></td></tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px;">
    <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
	<tr>
	 <td valign="top">
	   <table border="0" style="width:100%; height:380px; float:none;" cellpadding="0">
		<tr>
		 <td valign="top"> 
		   
<?php //********************************************************************************************** ?>	   
<table border="0" id="Activity" cellspacing="0">
<tr>
<td id="Anni" valign="top">
 <table border="0">
	  <tr height="20">
		<td align="left" valign="top" width="150">
<?php include("EmpImgEmp.php"); ?>
<?php //echo "<img width=105px height=125px src=\"show_images.php?id=".$EmployeeId."\">\n";?></td>
	  </tr>
 </table>
</td>
<?php $sqlE=mysql_query("select Fname,Sname,Lname,EmpCode,StateName,HqName,Gender,PanNo,CostCenter,AccountNo,BankName,PfAccountNo,DOB,DateJoining,DR,Married,DepartmentId,GradeId,DesigId from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_state s ON g.CostCenter=s.StateId where e.EmployeeID=".$EmployeeId, $con); 
$resE=mysql_fetch_assoc($sqlE); 


if($resE['DR']=='Y'){$M='Dr.';} elseif($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';}  
$Ename=$M.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; $LEC=strlen($resE['EmpCode']); 
if($LEC==1){$EC='000'.$resE['EmpCode'];} if($LEC==2){$EC='00'.$resE['EmpCode'];} if($LEC==3){$EC='0'.$resE['EmpCode'];} if($LEC>=4){$EC=$resE['EmpCode'];}

$m=$_REQUEST['m'];
if(date("m")==1){$YY=date("Y")-1;}
elseif(date("m")==2){  if($m==1){$YY=date("Y");} else{$YY=date("Y")-1;}  }
elseif(date("m")==3){  if($m==1 OR $m==2){$YY=date("Y");}else{$YY=date("Y")-1;}  }
elseif(date("m")==4){  if($m==1 OR $m==2 OR $m==3){$YY=date("Y");}else{$YY=date("Y")-1;}  } 
elseif(date("m")==5 OR date("m")==6 OR date("m")==7 OR date("m")==8 OR date("m")==9 OR date("m")==10 OR date("m")==11 OR date("m")==12){$YY=date("Y");}

if(date("m")==1 OR date("m")==2 OR date("m")==3){$YId=$YearId;}
if(date("m")==4){$YId=$YearId-1;}
if(date("m")==5 OR date("m")==6 OR date("m")==7 OR date("m")==8 OR date("m")==9 OR date("m")==10 OR date("m")==11 OR date("m")==12){$YId=$YearId;}
 

$BY=date("Y")-1;
if($YY>=date("Y")){ $PayTable='hrm_employee_monthlypayslip'; }
elseif($YY==$BY AND date("m")=='01' AND $m==12)
{ $PayTable='hrm_employee_monthlypayslip'; }
elseif($YY==$BY AND $m<12){ $PayTable='hrm_employee_monthlypayslip_'.$YY; }
else{$PayTable='hrm_employee_monthlypayslip_'.$YY; }



$sqlPayM=mysql_query("select * from hrm_employee_key_paymonth where CompanyId=".$CompanyId, $con);  
$sqlKey=mysql_query("select Payslip from hrm_employee_key where CompanyId=".$CompanyId, $con);  
$resPayM=mysql_fetch_array($sqlPayM); $resKey=mysql_fetch_array($sqlKey);

if(($m==1 AND $resPayM['Jan']=='Y') OR ($m==2 AND $resPayM['Feb']=='Y') OR ($m==3 AND $resPayM['Mar']=='Y') OR ($m==4 AND $resPayM['Apr']=='Y') OR ($m==5 AND $resPayM['May']=='Y') OR ($m==6 AND $resPayM['Jun']=='Y') OR ($m==7 AND $resPayM['Jul']=='Y') OR ($m==8 AND $resPayM['Aug']=='Y') OR ($m==9 AND $resPayM['Sep']=='Y') OR ($m==10 AND $resPayM['Oct']=='Y') OR ($m==11 AND $resPayM['Nov']=='Y') OR ($m==12 AND $resPayM['Decm']=='Y')) 
{

 $SqlPay=mysql_query("SELECT * FROM ".$PayTable." WHERE EmployeeID=".$EmployeeId." AND Month=".$_REQUEST['m']." AND Year=".$YY."", $con); 
 
 $RowPay=mysql_num_rows($SqlPay);

 if($RowPay==0)
 { 
  $SqlPay=mysql_query("SELECT * FROM hrm_employee_monthlypayslip WHERE EmployeeID=".$EmployeeId." AND Month=".$_REQUEST['m']." AND Year=".$YY."", $con); $ResPay=mysql_fetch_assoc($SqlPay);
  
 }
 else{$ResPay=mysql_fetch_assoc($SqlPay); }
 
 
    if($ResPay['GradeId']>0)
    {
     $SqlG=mysql_query("SELECT GradeValue FROM hrm_grade WHERE GradeId=".$ResPay['GradeId'], $con); $ResG=mysql_fetch_assoc($SqlG); 
     $GradeValue=$ResG['GradeValue'];
    }
    else 
    { $SqlG=mysql_query("SELECT GradeValue FROM hrm_grade WHERE GradeId=".$resE['GradeId'], $con); $ResG=mysql_fetch_assoc($SqlG); 
     $GradeValue=$ResG['GradeValue']; 
    }
    
    if($ResPay['DepartmentId']>0)
    {
     $SqlD=mysql_query("SELECT DepartmentName,FunName FROM hrm_department WHERE DepartmentId=".$ResPay['DepartmentId'], $con); $ResD=mysql_fetch_assoc($SqlD); 
     $DeptValue=$ResD['DepartmentName']; $FunValue=$ResD['FunName'];
    }
    else 
    { $SqlD=mysql_query("SELECT DepartmentName,FunName FROM hrm_department WHERE DepartmentId=".$resE['DepartmentId'], $con); $ResD=mysql_fetch_assoc($SqlD); 
     $DeptValue=$ResD['DepartmentName']; $FunValue=$ResD['FunName'];
        
    }
    
    
    if($ResPay['DesigId']>0)
    {
     $SqlDe=mysql_query("SELECT DesigName FROM hrm_designation WHERE DesigId=".$ResPay['DesigId'], $con); $ResDe=mysql_fetch_assoc($SqlDe); 
     $DesigValue=$ResDe['DesigName'];
    }
    else 
    { $SqlDe=mysql_query("SELECT DesigName FROM hrm_designation WHERE DesigId=".$resE['DesigId'], $con); $ResDe=mysql_fetch_assoc($SqlDe); 
     $DesigValue=$ResDe['DesigName']; 
        
    }
 
}
?> 
<td align="left" width="850" valign="top">
<?php if($resKey['Payslip']=='Y') { 

if($m==1){$SelM='January';} if($m==2){$SelM='February';} if($m==3){$SelM='March';}if($m==4){$SelM='April';}
if($m==5){$SelM='May';} if($m==6){$SelM='June';} if($m==7){$SelM='July';} if($m==8){$SelM='August';} 
if($m==9){$SelM='September';} if($m==10){$SelM='October';} if($m==11){$SelM='November';} if($m==12){$SelM='December';}
?>	
<table border="0" width="850" align="center">
<tr>
 <td style="width:100px;font-family:Times New Roman;font-size:14px;">Month:&nbsp;
<select style="font-family:Times New Roman;font-size:14px; width:90px;" onChange="SelMonth(this.value)">
<option value="<?php echo $_REQUEST['m']; ?>"><?php echo $SelM; ?></option>
<?php if($resPayM['Mar']=='Y'){?><option value="3">March</option><?php } ?>
<?php if($resPayM['Feb']=='Y'){?><option value="2">February</option><?php } ?>
<?php if($resPayM['Jan']=='Y'){?><option value="1">January</option><?php } ?>
<?php if($resPayM['Decm']=='Y'){?><option value="12">December</option><?php } ?>
<?php if($resPayM['Nov']=='Y'){?><option value="11">November</option><?php } ?>
<?php if($resPayM['Oct']=='Y'){?><option value="10">October</option><?php } ?>
<?php if($resPayM['Sep']=='Y'){?><option value="9">September</option><?php } ?>
<?php if($resPayM['Aug']=='Y'){?><option value="8">August</option><?php } ?>
<?php if($resPayM['Jul']=='Y'){?><option value="7">July</option><?php } ?>
<?php if($resPayM['Jun']=='Y'){?><option value="6">June</option><?php } ?>
<?php if($resPayM['May']=='Y'){?><option value="5">May</option><?php } ?>
<?php if($resPayM['Apr']=='Y'){?><option value="4">April</option><?php } ?>
</select>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onClick="PrintPay(<?php echo $EmployeeId.', '.$_REQUEST['m'].', '.$YY.', '.$YId; ?>)"><b><font style="font-size:14px;">Print</font></b></a>		   
 </td>
</tr>
<tr>
<?php //********************** // ?>
<td>
 <table border="1" bgcolor="#FFFFFF" cellspacing="0">
 <tr>
 <td style="width:800px;" align="center">
  <table style="width:800px;" border="0" bgcolor="#FFFFFF" align="center">
<?php $SqlCom=mysql_query("select cb.*,StateName from hrm_company_basic cb inner join hrm_state s on cb.StateId=s.StateId where cb.CompanyId=".$CompanyId, $con); $resCom=mysql_fetch_assoc($SqlCom); ?>   
<tr>
 <td style="width:100px;" align="center" valign="middle">
  <table style="width:100px;">
   <tr><td align="center" style="width:100px;"><img src="../images/VNRLogo3.png" border="0" style="width:100px; height:130px;"/></td></tr>
  </table>
 </td>
 <td style="width:580px;" align="center">
  <table style="width:580px;">
   <tr><td align="center" style='font-family:Geneva, Arial, Helvetica, sans-serif;width:600px;font-size:20px; color:#005500;'><b><?php echo strtoupper($resCom['CompanyName']); ?></b></td></tr>
   <tr><td align="center" style='font-family:Geneva, Arial, Helvetica, sans-serif;width:600px;font-size:12px;'><b><?php echo $resCom['AdminOffice_Address']; ?></b></td></tr>
   <tr><td align="center" style='font-family:Geneva, Arial, Helvetica, sans-serif;width:600px;font-size:12px;'>
   <b><?php echo $resCom['AdminOffice'].' ('.$resCom['PinNo'].') ['.$resCom['StateName'].']'; ?></b></td></tr>
   <tr><td align="center" style='font-family:Times New Roman;width:600px; font-size:14px;'>
   <b>PAYSLIP FOR THE MONTH OF <font color="#930000"><u><?php echo strtoupper($SelM).'-'.$YY; ?></u></b></font></td></tr>
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
 <?php include("PayslipMain.php"); ?>
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
<?php $sqlLV=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$EmployeeId." AND Month=".$_REQUEST['m']." AND Year='".$YY."'", $con); 
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
<?php } ?>
  </td>
 </tr>
<?php /************************************* Leave **********************************/ ?> 
 </table>
</td>
<?php //********************** // ?> 
</tr>
</table>
</td>
</tr>	
</table>
</td>
</tr> 
</table>
<?php //******************************************************************************* ?>
		   </td>
		    <td valign="top">
		    <table align="right" border="0" style="margin-top:0px; width:10%; height:380px;">
		    <tr><td align="center" valign="top" width="100">&nbsp;</td></tr>
	        </table>
		   </td>
		    <td valign="top">
		    <table align="right" border="0" style="margin-top:0px; width:10%; height:380px;"><tr><td align="center" valign="top">&nbsp;&nbsp;</td></tr></table>
		   </td>
		  </tr>
		</table>
	  </td>
	</tr>
	
	<tr><td valign="top" align="center">&nbsp;</td></tr>
	<tr>
	  <td valign="top">
	    <?php require_once("../footer.php"); ?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>


