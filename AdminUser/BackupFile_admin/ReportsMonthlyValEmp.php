<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff;font-family:Times New Roman;height:22px;font-size:11px;font-weight:bold;} 
.font1 { font-family:Times New Roman;font-size:12px; color:#000000;} 
.font2 { font-size:11px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:11px; width:120px; height:18px;}
.InputText {font-family:Times New Roman;font-size:12px;height:20px;color:#000066;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<Script>
function ExportVal(y,c,d,m)
{ window.open("ReportsEmpMonthlyValExport.php?action=ReportsEmpMonthlyValExport&y="+y+"&c="+c+"&d="+d+"&m="+m,"ExportForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}

</SCRIPT> 
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //********************************************************************************************?>
<?php //************START*****START*****START******START******START**********************?>
<?php //********************************************************************************************?>
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td class="heading" valign="top" style="width:1150px;">Monthly Values (Employee Wise)
<?php $m=$_REQUEST['m'];
$today=date("Y-m-d"); $timestamp = strtotime($today);
if($_REQUEST['y']!=0)
{ 
 $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['y']."",$con); $rY=mysql_fetch_assoc($sY); 
 $FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; 
 $ffd=date("y",strtotime($rY['FromDate'])); $ttd=date("y",strtotime($rY['ToDate']));
 $prevY=date("Y")-1; $nextY=date("Y")+1;
 if($FD==date("Y") AND $TD==$nextY)
 {
  if(date("m")==1)
  { 
   if($m==4 OR $m==5 OR $m==6 OR $m==7 OR $m==8 OR $m==9 OR $m==10 OR $m==11){ $PayTable='hrm_employee_monthlypayslip_'.$FD; }else{ $PayTable='hrm_employee_monthlypayslip'; }
  }
  elseif(date("m")==2 OR date("m")==3)
  { 
   if($m==4 OR $m==5 OR $m==6 OR $m==7 OR $m==8 OR $m==9 OR $m==10 OR $m==11 OR $m==12){ $PayTable='hrm_employee_monthlypayslip_'.$FD; }else{ $PayTable='hrm_employee_monthlypayslip'; }
  }
  else
  {
   $PayTable='hrm_employee_monthlypayslip'; 
  }
 }
 elseif($FD==$prevY AND $TD==date("Y"))
 { 
  if(date("m")==1)
  { $PayTable='hrm_employee_monthlypayslip'; }
  else
  { 
    if($m==4 OR $m==5 OR $m==6 OR $m==7 OR $m==8 OR $m==9 OR $m==10 OR $m==11 OR $m==12){ $PayTable='hrm_employee_monthlypayslip_'.$FD; }else{ $PayTable='hrm_employee_monthlypayslip'; }
  }
 }
 else
 {
  if($m==4 OR $m==5 OR $m==6 OR $m==7 OR $m==8 OR $m==9 OR $m==10 OR $m==11 OR $m==12){ $PayTable='hrm_employee_monthlypayslip_'.$FD; }else{ $PayTable='hrm_employee_monthlypayslip_'.$TD; }
 }

}

if($_REQUEST['d']>0){ $sqlD=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['d'], $con); $resD=mysql_fetch_assoc($sqlD); }
?>	     
       <b style="color:#3A7500">[ Year:&nbsp;<?php echo $PRD; ?> ]</b>&nbsp; 
	  <?php if($_REQUEST['d']>0){ ?><b style="color:#3A7500">[ Department:&nbsp;<?php echo $resD['DepartmentName']; ?> ]</b>&nbsp;  <?php } ?>
	  <?php if($_REQUEST['m']>0){ ?><b style="color:#3A7500">[ Month:&nbsp;<?php if($_REQUEST['m']==4){echo 'APRIL';}elseif($_REQUEST['m']==5){echo 'MAY';}elseif($_REQUEST['m']==6){echo 'JUNE';}elseif($_REQUEST['m']==7){echo 'JULY';}elseif($_REQUEST['m']==8){echo 'AUGUST';}elseif($_REQUEST['m']==9){echo 'SEPTEMBER';}elseif($_REQUEST['m']==10){echo 'OCTOBER';}elseif($_REQUEST['m']==11){echo 'NOVEMBER';}elseif($_REQUEST['m']==12){echo 'DECEMBER';}elseif($_REQUEST['m']==13){echo 'JANUARY';}elseif($_REQUEST['m']==14){echo 'FEBRUARY';}elseif($_REQUEST['m']==15){echo 'MARCH';} ?> ]</b> <?php } ?>
	  
	  &nbsp;&nbsp;
      <a href="#" onClick="ExportVal(<?php echo $_REQUEST['y'].', '.$_REQUEST['c'].', '.$_REQUEST['d'].', '.$_REQUEST['m']; ?>)" style="font-size:12px;">Export Excel</a>
	 </td> 
   </tr>
   </table>
  </td>
 </tr> 
<?php if($_SESSION['login']=true){ ?>	
 <tr>
<?php //******************* Open Department ******************************************************?> 
<td align="left" id="type" valign="top" style="display:block;width:100%">             
<input type="hidden" id="ey" name="ey" value="<?php echo $_REQUEST['y']; ?>" />  
<table border="0" style="width:2000px;">
<tr>
 <td align="left">
  <table border="1" border="1" bgcolor="#FFFFFF">
  <tr bgcolor="#7a6189">
   <td align="center" class="font" style="width:50px;">SN</td>
   <td align="center" class="font" style="width:50px;">EC</td>
   <td align="center" class="font" style="width:200px;">NAME</td>
   <td align="center" class="font" style="width:50px;">DEPT</td>
   <td align="center" class="font" style="width:50px;">BASIC</td>
   <td align="center" class="font" style="width:50px;">HRA</td>
   <td align="center" class="font" style="width:50px;">CONV</td>
   <td align="center" class="font" style="width:50px;">BONUS_MONTH</td>
   <td align="center" class="font" style="width:50px;">SPECL</td>
   <td align="center" class="font" style="width:50px;">DA</td>
   <td align="center" class="font" style="width:50px;">INCENT</td>
   <td align="center" class="font" style="width:50px;">PP</td>
   <td align="center" class="font" style="width:50px;">LEAVE ENCASH</td>
   <td align="center" class="font" style="width:50px;">VAR ADJUST</td>
   <td align="center" class="font" style="width:50px;">CCA</td>
   <td align="center" class="font" style="width:50px;">RA</td>
   <td align="center" class="font" style="width:50px;">BONUS</td>
   <td align="center" class="font" style="width:50px;">CEA</td>
   <td align="center" class="font" style="width:50px;">MR</td>
   <td align="center" class="font" style="width:50px;">LTA</td>
   <td align="center" class="font" style="width:50px;">ARR BASIC</td>
   <td align="center" class="font" style="width:50px;">ARR HRA</td>
   <td align="center" class="font" style="width:50px;">ARR CONV</td>
   <td align="center" class="font" style="width:50px;">ARR SPECL</td>
   <td align="center" class="font" style="width:50px;">BONUS ADJUSTMENT</td>
   <td align="center" class="font" style="width:50px;">GROSS</td>
   <td align="center" class="font" style="width:50px;">PF</td>
   <td align="center" class="font" style="width:50px;">ARR PF</td>
   <td align="center" class="font" style="width:50px;">ESIC</td>
   <td align="center" class="font" style="width:50px;">ARR ESIC</td>
   <td align="center" class="font" style="width:50px;">TDS</td>
   <td align="center" class="font" style="width:50px;">DEDCT CEA</td>
   <td align="center" class="font" style="width:50px;">DEDCT MR</td>
   <td align="center" class="font" style="width:50px;">DEDCT LTA</td>
   <td align="center" class="font" style="width:50px;">VAL CONT</td>
   <td align="center" class="font" style="width:50px;">DEDCT ADJUST</td>
   <td align="center" class="font" style="width:50px;">TOTAL DEDUCT</td>
   <td align="center" class="font" style="width:50px;">TOTAL NET-AMT</td>
  </tr>
<?php
 if($_REQUEST['act']=='ValMonth')
 { 
   if($_REQUEST['m']<=12){$m=$_REQUEST['m']; $y=$FD;}elseif($_REQUEST['m']==13){$m=1; $y=$TD;}elseif($_REQUEST['m']==14){$m=2; $y=$TD;}elseif($_REQUEST['m']==15){$m=3; $y=$TD;}
   if($_REQUEST['d']>0){ $sql=mysql_query("select mp.*,EmpCode,Fname,Sname,Lname from ".$PayTable." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON mp.EmployeeID=g.EmployeeID where e.CompanyId=".$_REQUEST['c']." AND Month=".$m." AND Year=".$y." AND g.DepartmentId=".$_REQUEST['d']." order by EmpCode ASC", $con); } 
   elseif($_REQUEST['d']==0){ $sql=mysql_query("select mp.*,EmpCode,Fname,Sname,Lname from ".$PayTable." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID where e.CompanyId=".$_REQUEST['c']." AND Month=".$m." AND Year=".$y." order by EmpCode ASC, DepartmentId ASC", $con); }
   
   //AND DepartmentId!=17 AND DepartmentId!=18 AND DepartmentId!=23
 }

/* 
 elseif($_REQUEST['act']=='ValYear')
 {
   $sql=mysql_query("select SUM(Basic) as Bas,SUM(Hra) as Hra,SUM(Convance) as Con,SUM(Special) as Spe,SUM(Bonus) as Bon,SUM(DA) as Da,SUM(Arreares) as Arr,SUM(LeaveEncash) as Lea,SUM(Incentive) as Inc,SUM(VariableAdjustment) as Var,SUM(PerformancePay) as Per,SUM(CCA) as Cca,SUM(RA) as Ra,SUM(Arr_Basic) as ArrBas,SUM(Arr_Hra) as ArrHra,SUM(Arr_Spl) as ArrSpl,SUM(Arr_Conv) as ArrCon,SUM(YCea) as Ycea,SUM(YMr) as Ymr,SUM(YLta) as Ylta,SUM(Tot_Pf_Employee) as TotPfEmp,SUM(TDS) as Tds,SUM(ESCI_Employee) as Esic,SUM(Arr_Pf) as ArrPf,SUM(Arr_Esic) as ArrEsic,SUM(VolContrib) as ValCon,SUM(DeductAdjmt) as DedAduj,SUM(CEA_Ded) as Dedcea,SUM(MA_Ded) as dedma,SUM(LTA_Ded) as Dedlta,EmpCode,Fname,Sname,Lname,DepartmentId from hrm_employee_monthlypayslip INNER JOIN hrm_employee ON hrm_employee_monthlypayslip.EmployeeID=hrm_employee.EmployeeID where hrm_employee.CompanyId=".$_REQUEST['c']." AND ((Month>=4 AND Month<=12 AND Year=".$FD.") OR (Month>=1 AND Month<=3 AND Year=".$TD.")) AND DepartmentId!=17 AND DepartmentId!=18 AND DepartmentId!=23 group by EmployeeID order by EmpCode ASC, DepartmentId ASC", $con);
   
 }
*/ 

  $sn=1; while($res=mysql_fetch_assoc($sql)){ 
  $sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD);
  
if($res['Basic']!=0 OR $res['Hra']!=0 OR $res['Convance']!=0 OR $res['Special']!=0 OR $res['DA']!=0 OR $res['Incentive']!=0 OR $res['PerformancePay']!=0 OR $res['LeaveEncash']!=0 OR $res['VariableAdjustment']!=0 OR $res['CCA']!=0 OR $res['RA']!=0 OR $res['Bonus']!=0 OR $res['YCea']!=0 OR $res['YMr']!=0 OR $res['YLta']!=0 OR $res['Arr_Basic']!=0 OR $res['Arr_Hra']!=0 OR $res['Arr_Conv']!=0 OR $res['Arr_Spl']!=0 OR $res['Tot_Pf_Employee']!=0 OR $res['Arr_Pf']!=0 OR $res['ESCI_Employee']!=0 OR $res['Arr_Esic']!=0 OR $res['TDS']!=0 OR $res['CEA_Ded']!=0 OR $res['MA_Ded']!=0 OR $res['LTA_Ded']!=0 OR $res['VolContrib']!=0 OR $res['DeductAdjmt']!=0 OR $res['Bonus_Adjustment']!=0 OR $res['Bonus_Month']!=0){ 
  ?>  
<tr id="TR<?php echo $sn; ?>">
   <td align="center"class="font1">&nbsp;<?php echo $sn; ?>&nbsp;</td>
   <td align="center" class="font1">&nbsp;<?php echo $res['EmpCode']; ?></td>
   <td align="" class="font1">&nbsp;<?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
   <td align="" class="font1">&nbsp;<?php echo $resD['DepartmentCode']; ?></td>
   <td align="right" class="font1"><?php echo floatval($res['Basic']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['Hra']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['Convance']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['Bonus_Month']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['Special']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['DA']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['Incentive']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['PerformancePay']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['LeaveEncash']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['VariableAdjustment']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['CCA']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['RA']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['Bonus']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['YCea']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['YMr']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['YLta']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['Arr_Basic']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['Arr_Hra']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['Arr_Conv']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['Arr_Spl']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['Bonus_Adjustment']); ?>&nbsp;</td>
<?php $Gross=$res['Basic']+$res['Hra']+$res['Convance']+$res['Bonus_Month']+$res['Special']+$res['DA']+$res['Incentive']+$res['PerformancePay']+$res['LeaveEncash']+$res['VariableAdjustment']+$res['CCA']+$res['RA']+$res['Bonus']+$res['YCea']+$res['YMr']+$res['YLta']+$res['Arr_Basic']+$res['Arr_Hra']+$res['Arr_Conv']+$res['Arr_Spl']+$res['Bonus_Adjustment']; ?>   
   <td align="right" class="font1" bgcolor="#FFD9FF"><?php echo floatval($Gross); ?>&nbsp;</td>
   
   <td align="right" class="font1"><?php echo floatval($res['Tot_Pf_Employee']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['Arr_Pf']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['ESCI_Employee']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['Arr_Esic']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['TDS']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['CEA_Ded']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['MA_Ded']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['LTA_Ded']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['VolContrib']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['DeductAdjmt']); ?>&nbsp;</td>
<?php $TotDeduct=$res['Tot_Pf_Employee']+$res['Arr_Pf']+$res['ESCI_Employee']+$res['Arr_Esic']+$res['TDS']+$res['CEA_Ded']+$res['MA_Ded']+$res['LTA_Ded']+$res['VolContrib']+$res['DeductAdjmt']; ?>   
   <td align="right" class="font1" bgcolor="#FFD9FF"><?php echo floatval($TotDeduct); ?>&nbsp;</td>
<?php $TotalNetAmt=$Gross-$TotDeduct; ?>   
   <td align="right" class="font1" bgcolor="#DDFFBB"><?php echo floatval($TotalNetAmt); ?>&nbsp;</td>
</tr>
<?php } $sn++; } ?>
 

	 </table>
	  </td>
    </tr>
  </table>  
</td>
<?php //******************** Close Department****************************************?>    
 </tr>
<?php } ?> 
</table>
<?php //**********************************************************************************************?>
<?php //***********END*****END*****END******END******END***********************?>
<?php //*********************************************************************************?>
	  </td>
	</tr>
	<tr>
	  <td valign="top" align="center">
	    <table border="0" style="margin-top:0px;">
				<tr>
	              <td align="center"><img src="images/home1.png"></td>
				</tr>
	    </table>
	  </td>
	</tr>
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