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
function ExportVal(y,c,d)
{ window.open("ReportsEmpYearlyValExport.php?action=ReportsEmpMonthlyValExport&y="+y+"&c="+c+"&d="+d,"ExportForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}

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
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td class="heading" valign="top" style="width:1150px;">Monthly Values (Employee Wise)
<?php $today=date("Y-m-d"); $timestamp = strtotime($today);
      if($_REQUEST['y']!=0){ $BeforeYId=$_REQUEST['y']-1; 
      $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['y']."", $con); $rY=mysql_fetch_assoc($sY); } 
      $FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; 
	  if($_REQUEST['d']>0){ $sqlD=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['d'], $con); $resD=mysql_fetch_assoc($sqlD); }
?>	     
       <b style="color:#3A7500">[ Year:&nbsp;<?php echo $PRD; ?> ]</b>&nbsp; 
	  <?php if($_REQUEST['d']>0){ ?><b style="color:#3A7500">[ Department:&nbsp;<?php echo $resD['DepartmentName']; ?> ]</b>&nbsp;  <?php } ?>
	  <?php if($_REQUEST['m']>0){ ?><b style="color:#3A7500">[ Month:&nbsp;<?php if($_REQUEST['m']==4){echo 'APRIL';}elseif($_REQUEST['m']==5){echo 'MAY';}elseif($_REQUEST['m']==6){echo 'JUNE';}elseif($_REQUEST['m']==7){echo 'JULY';}elseif($_REQUEST['m']==8){echo 'AUGUST';}elseif($_REQUEST['m']==9){echo 'SEPTEMBER';}elseif($_REQUEST['m']==10){echo 'OCTOBER';}elseif($_REQUEST['m']==11){echo 'NOVEMBER';}elseif($_REQUEST['m']==12){echo 'DECEMBER';}elseif($_REQUEST['m']==13){echo 'JANUARY';}elseif($_REQUEST['m']==14){echo 'FEBRUARY';}elseif($_REQUEST['m']==15){echo 'MARCH';} ?> ]</b> <?php } ?>
	  
	  &nbsp;&nbsp;
      <a href="#" onClick="ExportVal(<?php echo $_REQUEST['y'].', '.$_REQUEST['c'].', '.$_REQUEST['d']; ?>)" style="font-size:12px;">Export Excel</a>
	 </td> 
   </tr>
   </table>
  </td>
 </tr> 
<?php if($_SESSION['login']=true){ ?>	
 <tr>
<?php //*********************************************** Open Department ******************************************************?> 
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
 if($_REQUEST['act']=='ValYear')
 {   
 if($_REQUEST['d']>0){ $sqlE=mysql_query("select distinct(hrm_employee_monthlypayslip.EmployeeID) from hrm_employee_monthlypayslip INNER JOIN hrm_employee ON hrm_employee_monthlypayslip.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_monthlypayslip.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DepartmentId=".$_REQUEST['d']." AND ((Month>=4 AND Month<=12 AND Year=".$FD.") OR (Month>=1 AND Month<=3 AND Year=".$TD.")) AND hrm_employee_general.DepartmentId!=17 AND hrm_employee_general.DepartmentId!=18 AND hrm_employee_general.DepartmentId!=23 order by EmployeeID ASC",$con); }
 elseif($_REQUEST['d']==0){ $sqlE=mysql_query("select distinct(hrm_employee_monthlypayslip.EmployeeID) from hrm_employee_monthlypayslip INNER JOIN hrm_employee ON hrm_employee_monthlypayslip.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_monthlypayslip.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.CompanyId=".$_REQUEST['c']." AND ((Month>=4 AND Month<=12 AND Year=".$FD.") OR (Month>=1 AND Month<=3 AND Year=".$TD.")) AND hrm_employee_general.DepartmentId!=17 AND hrm_employee_general.DepartmentId!=18 AND hrm_employee_general.DepartmentId!=23 order by EmployeeID ASC",$con); } 
 }
$sn=1; while($resE=mysql_fetch_assoc($sqlE)){ 
  $sql=mysql_query("select SUM(Basic) as Bas,SUM(Hra) as Hra,SUM(Convance) as Con,SUM(Special) as Spe,SUM(Bonus) as Bon,SUM(DA) as Da,SUM(Arreares) as Arr,SUM(LeaveEncash) as Lea,SUM(Incentive) as Inc,SUM(VariableAdjustment) as Var,SUM(PerformancePay) as Per,SUM(CCA) as Cca,SUM(RA) as Ra,SUM(Arr_Basic) as ArrBas,SUM(Arr_Hra) as ArrHra,SUM(Arr_Spl) as ArrSpl,SUM(Arr_Conv) as ArrCon,SUM(YCea) as Ycea,SUM(YMr) as Ymr,SUM(YLta) as Ylta,SUM(Tot_Pf_Employee) as TotPfEmp,SUM(TDS) as Tds,SUM(ESCI_Employee) as Esic,SUM(Arr_Pf) as ArrPf,SUM(Arr_Esic) as ArrEsic,SUM(VolContrib) as ValCon,SUM(DeductAdjmt) as DedAduj,SUM(CEA_Ded) as Dedcea,SUM(MA_Ded) as dedma,SUM(LTA_Ded) as Dedlta,EmpCode,Fname,Sname,Lname,hrm_employee_general.DepartmentId from hrm_employee_monthlypayslip INNER JOIN hrm_employee ON hrm_employee_monthlypayslip.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_monthlypayslip.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_monthlypayslip.EmployeeID=".$resE['EmployeeID']." AND ((Month>=4 AND Month<=12 AND Year=".$FD.") OR (Month>=1 AND Month<=3 AND Year=".$TD."))", $con); $res=mysql_fetch_assoc($sql);

  
  $sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD);
  
if($res['Bas']!=0 OR $res['Hra']!=0 OR $res['Con']!=0 OR $res['Spe']!=0 OR $res['Da']!=0 OR $res['Inc']!=0 OR $res['Per']!=0 OR $res['Lea']!=0 OR $res['Var']!=0 OR $res['Cca']!=0 OR $res['Ra']!=0 OR $res['Bon']!=0 OR $res['Ycea']!=0 OR $res['Ymr']!=0 OR $res['Ylta']!=0 OR $res['ArrBas']!=0 OR $res['ArrHra']!=0 OR $res['ArrCon']!=0 OR $res['ArrSpl']!=0 OR $res['TotPfEmp']!=0 OR $res['ArrPf']!=0 OR $res['Esic']!=0 OR $res['ArrEsic']!=0 OR $res['Tds']!=0 OR $res['Dedcea']!=0 OR $res['Dedma']!=0 OR $res['Dedlta']!=0 OR $res['VolCon']!=0 OR $res['DedAduj']!=0){ 
  ?>  
<tr id="TR<?php echo $sn; ?>">
   <td align="center"class="font1">&nbsp;<?php echo $sn; ?>&nbsp;</td>
   <td align="center" class="font1">&nbsp;<?php echo $res['EmpCode']; ?></td>
   <td align="" class="font1">&nbsp;<?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
   <td align="" class="font1">&nbsp;<?php echo $resD['DepartmentCode']; ?></td>
   <td align="right" class="font1"><?php echo floatval($res['Bas']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['Hra']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['Con']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['Spe']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['Da']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['Inc']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['Per']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['Lea']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['Var']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['Cca']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['Ra']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['Bon']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['Ycea']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['Ymr']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['Ylta']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['ArrBas']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['ArrHra']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['ArrCon']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['ArrSpl']); ?>&nbsp;</td>
<?php $Gross=$res['Bas']+$res['Hra']+$res['Con']+$res['Spe']+$res['Da']+$res['Inc']+$res['Per']+$res['Lea']+$res['Var']+$res['Cca']+$res['Ra']+$res['Bon']+$res['Ycea']+$res['Ymr']+$res['Ylta']+$res['ArrBas']+$res['ArrHra']+$res['ArrCon']+$res['ArrSpl']; ?>   
   <td align="right" class="font1" bgcolor="#FFD9FF"><?php echo floatval($Gross); ?>&nbsp;</td>   
   <td align="right" class="font1"><?php echo floatval($res['TotPfEmp']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['ArrPf']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['Esic']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['ArrEsic']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['Tds']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['Dedcea']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['Dedma']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['Dedlta']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['VolCon']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res['DedAduj']); ?>&nbsp;</td>
<?php $TotDeduct=$res['TotPfEmp']+$res['ArrPf']+$res['Esic']+$res['ArrEsic']+$res['Tds']+$res['Dedcea']+$res['Dedma']+$res['Dedlta']+$res['VolCon']+$res['DedAduj']; ?>   
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
<?php //*********************************************** Close Department******************************************************?>    
 </tr>
<?php } ?> 
</table>
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************END*****END*****END******END******END***************************************************************?>
<?php //************************************************************************************************************************************************************?>
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