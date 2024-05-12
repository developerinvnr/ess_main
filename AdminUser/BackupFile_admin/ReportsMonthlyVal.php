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
.font1br {font-family:Times New Roman;font-size:12px; color:#000000;font-weight:bold;text-align:right;}
.font1r {font-family:Times New Roman;font-size:12px; color:#000000;text-align:right;}
.font1b {font-family:Times New Roman;font-size:12px;color:#000000;font-weight:bold;}
.font1 {font-family:Times New Roman;font-size:12px; color:#000000;}
 
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
function SelectYear(v,d){window.location='ReportsMonthlyVal.php?act=true&wew=e%e@er%rdd=012&y='+v+'&d='+d+'&yy=utu&mailto=promt';}
function SelectDept(v,y){window.location='ReportsMonthlyVal.php?act=true&wew=e%e@er%rdd=012&y='+y+'&d='+v+'&yy=utu&mailto=promt';}

function PrintCopensation(y,c,d)
{ window.open("ReportsMonthlyValPrint.php?act=true&wew=e%e@er%rdd=012&y="+y+"&c="+c+"&d="+d+"&yy=utu&mailto=promt","PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=50,height=50");}

function ExportCopensation(y,c,d)
{ window.open("ReportsMonthlyValExport.php?action=ReportsMonthlyValExport&y="+y+"&c="+c+"&d="+d,"ExportForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}

function FucChk(sn)
{ if(document.getElementById("Chk"+sn).checked==true){document.getElementById("TR"+sn).style.background='#9BEF47'; }
  else if(document.getElementById("Chk"+sn).checked==false){document.getElementById("TR"+sn).style.background='#FFFFFF'; }
}

function FunM(m,y,c,d)
{ window.open("ReportsMonthlyValEmp.php?act=ValMonth&wew=e%e@er%rdd=012&y="+y+"&c="+c+"&m="+m+"&d="+d+"&yy=utu&mailto=promt", '_blank'); window.focus(); }

/*function FunY(y,c,d)
{ window.open("ReportsYearlyValEmp.php?act=ValYear&wew=e%e@er%rdd=012&y="+y+"&c="+c+"&d="+d+"&yy=utu&mailto=promt", '_blank'); window.focus(); }*/

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
<?php //*****************************************************************************************?>
<?php //**********START*****START*****START******START******START**************************?>
<?php //**************************************************************************************?>
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td class="heading" valign="top" style="width:330px;">Paid Values of Salary Components</td>
<?php 
$today=date("Y-m-d"); $timestamp = strtotime($today);
if($_REQUEST['y']!=0)
{ 
 $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['y']."",$con); $rY=mysql_fetch_assoc($sY); 
 $FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; 
 $prevY=date("Y")-1; $nextY=date("Y")+1;
 if($FD==date("Y") AND $TD==$nextY)
 {
  if(date("m")==1)
  { $PayTable1='hrm_employee_monthlypayslip'; $PayTable2='hrm_employee_monthlypayslip'; }
  elseif(date("m")==2 OR date("m")==3)
  { $PayTable1='hrm_employee_monthlypayslip_'.$FD; $PayTable2='hrm_employee_monthlypayslip'; }
  else{ $PayTable1='hrm_employee_monthlypayslip'; $PayTable2='hrm_employee_monthlypayslip'; }
 }
 elseif($FD==$prevY AND $TD==date("Y"))
 {
  if(date("m")==1)
  { $PayTable1='hrm_employee_monthlypayslip'; $PayTable2='hrm_employee_monthlypayslip'; }
  else{ $PayTable1='hrm_employee_monthlypayslip_'.$FD; $PayTable2='hrm_employee_monthlypayslip'; }
 }
 else
 {
  $PayTable1='hrm_employee_monthlypayslip_'.$FD;
  $PayTable2='hrm_employee_monthlypayslip_'.$TD;
 }

}

?>	     
	<td class="td1" style="font-size:14px;font-family:Times New Roman;" valign="top">&nbsp;&nbsp;<b>Year:</b>&nbsp;<select style="font-size:12px; width:100px; background-color:#DDFFBB;" name="YearID" id="YearID" onChange="SelectYear(this.value,<?php echo $_REQUEST['d']; ?>)"><?php if($_REQUEST['y']!=0){ ?><option value="<?php echo $_REQUEST['y']; ?>" selected><?php echo $PRD; ?></option><?php } ?>
<?php for($i=$YearId; $i>=2; $i--){ 
$ssY=mysql_query("select * from hrm_year where YearId=".$i."",$con); $rrY=mysql_fetch_assoc($ssY); 
$FFD=date("Y",strtotime($rrY['FromDate'])); $TTD=date("Y",strtotime($rrY['ToDate'])); $PPRD=$FFD.'-'.$TTD; ?>	
<?php if($_REQUEST['y']!=$i){ ?><option value="<?php echo $i; ?>"><?php echo $PPRD; ?></option><?php } } ?>
</select></td>
    <td class="td1" style="font-size:14px;font-family:Times New Roman;" valign="top">&nbsp;&nbsp;<b>Department:</b>&nbsp;<select style="font-size:12px; width:150px; background-color:#DDFFBB;" name="DeptID" id="DeptID" onChange="SelectDept(this.value,<?php echo $_REQUEST['y']; ?>)">
	<?php $sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['d'], $con); $resD=mysql_fetch_assoc($sqlD); ?>
<?php if($_REQUEST['d']!=0){ ?><option value="<?php echo $_REQUEST['d']; ?>" selected><?php echo $resD['DepartmentCode']; ?></option>
<?php } elseif($_REQUEST['d']==0){ ?><option value="<?php echo $_REQUEST['d']; ?>" selected><?php echo 'All Department'; ?></option><?php } ?>
<?php $sqlD2=mysql_query("select DepartmentId,DepartmentCode from hrm_department where CompanyId=".$CompanyId, $con); while($resD2=mysql_fetch_assoc($sqlD2)){ ?>
<option value="<?php echo $resD2['DepartmentId']; ?>"><?php echo $resD2['DepartmentCode']; ?></option><?php } ?>
<option value="0"><?php echo 'All'; ?></option>
</select>
   &nbsp;&nbsp;
<a href="#" onClick="PrintCopensation(<?php echo $_REQUEST['y'].', '.$CompanyId.', '.$_REQUEST['d']; ?>)" style="font-size:12px;">Print</a>&nbsp;&nbsp;<a href="#" onClick="ExportCopensation(<?php echo $_REQUEST['y'].', '.$CompanyId.', '.$_REQUEST['d']; ?>)" style="font-size:12px;">Export Excel</a></td>
   </tr>
   </table>
  </td>
 </tr> 
<?php if($_SESSION['login']=true){ ?>	
 <tr>
<?php //******************* Open Department**********************************?> 
<td align="left" id="type" valign="top" style="display:block; width:100%">             
<input type="hidden" id="ey" name="ey" value="<?php echo $_REQUEST['y']; ?>" />  
<table border="0" style="width:1200px;">
<tr>
 <td align="left">
  <table border="1" border="1" bgcolor="#FFFFFF">
  <tr bgcolor="#7a6189">
   <td colspan="2" align="center" class="font" style="width:50px;">SN</td>
   <td align="center" class="font" style="width:120px;">COMPONENTS</td>
<?php for($i=4; $i<=15; $i++){ if($i==4){$mn='APR';}elseif($i==5){$mn='MAY';}elseif($i==6){$mn='JUN';}elseif($i==7){$mn='JUL';}elseif($i==8){$mn='AUG';}elseif($i==9){$mn='SEP';}elseif($i==10){$mn='OCT';}elseif($i==11){$mn='NOV';}elseif($i==12){$mn='DEC';}elseif($i==13){$mn='JAN';}elseif($i==14){$mn='FEB';}elseif($i==15){$mn='MAR';}?>   
   <td align="center" class="font" style="width:100px;">
    <a href="#" onClick="FunM(<?php echo $i.','.$_REQUEST['y'].','.$CompanyId.','.$_REQUEST['d']; ?>)" style="color:#FFFFFF;"><?php echo $mn; ?></a>
   </td>
<?php } ?>
   <td align="center" class="font" style="width:100px;"><a href="#" onClick="FunY(<?php echo $_REQUEST['y'].','.$CompanyId.', '.$_REQUEST['d']; ?>)" style="color:#FFFFFF;">TOTAL</a></td>
  </tr>
<?php  $Selstar='SUM(Basic) as Bas,SUM(Hra) as Hra,SUM(Convance) as Con, SUM(Car_Allowance) as CarAll, SUM(Bonus_Month) as BonusM, SUM(VarRemburmnt) as VarRemburmnt, SUM(TA) as Ta, SUM(Special) as Spe,SUM(Bonus) as Bon,SUM(DA) as Da,SUM(Arreares) as Arr,SUM(LeaveEncash) as Lea,SUM(Incentive) as Inc,SUM(VariableAdjustment) as Var,SUM(PerformancePay) as Per,SUM(CCA) as Cca,SUM(RA) as Ra,SUM(Arr_Basic) as ArrBas,SUM(Arr_Hra) as ArrHra,SUM(Arr_Spl) as ArrSpl,SUM(Arr_Conv) as ArrCon,SUM(YCea) as Ycea,SUM(YMr) as Ymr,SUM(YLta) as Ylta,SUM(Tot_Pf_Employee) as TotPfEmp,SUM(TDS) as Tds,SUM(ESCI_Employee) as Esic,SUM(Arr_Pf) as ArrPf,SUM(Arr_Esic) as ArrEsic,SUM(VolContrib) as ValCon,SUM(DeductAdjmt) as DedAduj,SUM(CEA_Ded) as Dedcea,SUM(MA_Ded) as dedma,SUM(LTA_Ded) as Dedlta, SUM(Arr_LvEnCash) as ArrLvEncash, SUM(Arr_Bonus) as ArrBonus, SUM(Arr_RA) as ArrRASUM(Bonus_Adjustment) as Bonus_Adjustment'; 
    
if($_REQUEST['d']>0)
{
 $sql4=mysql_query("select ".$Selstar." from ".$PayTable1." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON mp.EmployeeID=g.EmployeeID where g.DepartmentId=".$_REQUEST['d']." AND e.CompanyId=".$CompanyId." AND Month=4 AND Year=".$FD, $con); $sql5=mysql_query("select ".$Selstar." from ".$PayTable1." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON mp.EmployeeID=g.EmployeeID where g.DepartmentId=".$_REQUEST['d']." AND e.CompanyId=".$CompanyId." AND Month=5 AND Year=".$FD, $con); $sql6=mysql_query("select ".$Selstar." from ".$PayTable1." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON mp.EmployeeID=g.EmployeeID where g.DepartmentId=".$_REQUEST['d']." AND e.CompanyId=".$CompanyId." AND Month=6 AND Year=".$FD, $con); $sql7=mysql_query("select ".$Selstar." from ".$PayTable1." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON mp.EmployeeID=g.EmployeeID where g.DepartmentId=".$_REQUEST['d']." AND e.CompanyId=".$CompanyId." AND Month=7 AND Year=".$FD, $con); $sql8=mysql_query("select ".$Selstar." from ".$PayTable1." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON mp.EmployeeID=g.EmployeeID where g.DepartmentId=".$_REQUEST['d']." AND e.CompanyId=".$CompanyId." AND Month=8 AND Year=".$FD, $con); $sql9=mysql_query("select ".$Selstar." from ".$PayTable1." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON mp.EmployeeID=g.EmployeeID where g.DepartmentId=".$_REQUEST['d']." AND e.CompanyId=".$CompanyId." AND Month=9 AND Year=".$FD, $con); $sql10=mysql_query("select ".$Selstar." from ".$PayTable1." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON mp.EmployeeID=g.EmployeeID where g.DepartmentId=".$_REQUEST['d']." AND e.CompanyId=".$CompanyId." AND Month=10 AND Year=".$FD, $con); $sql11=mysql_query("select ".$Selstar." from ".$PayTable1." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON mp.EmployeeID=g.EmployeeID where g.DepartmentId=".$_REQUEST['d']." AND e.CompanyId=".$CompanyId." AND Month=11 AND Year=".$FD, $con); $sql12=mysql_query("select ".$Selstar." from ".$PayTable1." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON mp.EmployeeID=g.EmployeeID where g.DepartmentId=".$_REQUEST['d']." AND e.CompanyId=".$CompanyId." AND Month=12 AND Year=".$FD, $con); $sql1=mysql_query("select ".$Selstar." from ".$PayTable2." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON mp.EmployeeID=g.EmployeeID where g.DepartmentId=".$_REQUEST['d']." AND e.CompanyId=".$CompanyId." AND Month=1 AND Year=".$TD, $con); $sql2=mysql_query("select ".$Selstar." from ".$PayTable2." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON mp.EmployeeID=g.EmployeeID where g.DepartmentId=".$_REQUEST['d']." AND e.CompanyId=".$CompanyId." AND Month=2 AND Year=".$TD, $con); $sql3=mysql_query("select ".$Selstar." from ".$PayTable2." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON mp.EmployeeID=g.EmployeeID where g.DepartmentId=".$_REQUEST['d']." AND e.CompanyId=".$CompanyId." AND Month=3 AND Year=".$TD, $con); 
} 
elseif($_REQUEST['d']==0)
{
 $sql4=mysql_query("select ".$Selstar." from ".$PayTable1." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID where e.CompanyId=".$CompanyId." AND Month=4 AND Year=".$FD, $con); 
 $sql5=mysql_query("select ".$Selstar." from ".$PayTable1." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID where e.CompanyId=".$CompanyId." AND Month=5 AND Year=".$FD, $con); $sql6=mysql_query("select ".$Selstar." from ".$PayTable1." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID where e.CompanyId=".$CompanyId." AND Month=6 AND Year=".$FD, $con); 
 $sql7=mysql_query("select ".$Selstar." from ".$PayTable1." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID where e.CompanyId=".$CompanyId." AND Month=7 AND Year=".$FD, $con); 
 $sql8=mysql_query("select ".$Selstar." from ".$PayTable1." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID where e.CompanyId=".$CompanyId." AND Month=8 AND Year=".$FD, $con); 
 $sql9=mysql_query("select ".$Selstar." from ".$PayTable1." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID where e.CompanyId=".$CompanyId." AND Month=9 AND Year=".$FD, $con); 
 $sql10=mysql_query("select ".$Selstar." from ".$PayTable1." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID where e.CompanyId=".$CompanyId." AND Month=10 AND Year=".$FD, $con); 
 $sql11=mysql_query("select ".$Selstar." from ".$PayTable1." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID where e.CompanyId=".$CompanyId." AND Month=11 AND Year=".$FD, $con); 
 $sql12=mysql_query("select ".$Selstar." from ".$PayTable1." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID where e.CompanyId=".$CompanyId." AND Month=12 AND Year=".$FD, $con); 
 $sql1=mysql_query("select ".$Selstar." from ".$PayTable2." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID where e.CompanyId=".$CompanyId." AND Month=1 AND Year=".$TD, $con); 
 $sql2=mysql_query("select ".$Selstar." from ".$PayTable2." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID where e.CompanyId=".$CompanyId." AND Month=2 AND Year=".$TD, $con); 
 $sql3=mysql_query("select ".$Selstar." from ".$PayTable2." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID where e.CompanyId=".$CompanyId." AND Month=3 AND Year=".$TD, $con); 
}
 
 $res4=mysql_fetch_assoc($sql4); $res5=mysql_fetch_assoc($sql5); $res6=mysql_fetch_assoc($sql6); 
 $res7=mysql_fetch_assoc($sql7); $res8=mysql_fetch_assoc($sql8); $res9=mysql_fetch_assoc($sql9); 
 $res10=mysql_fetch_assoc($sql10); $res11=mysql_fetch_assoc($sql11); $res12=mysql_fetch_assoc($sql12); 
 $res1=mysql_fetch_assoc($sql1);  $res2=mysql_fetch_assoc($sql2); $res3=mysql_fetch_assoc($sql3); ?>  
<?php /**** Basic ****/ ?>
<tr id="TR<?php echo '1'; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo '1'; ?>" onClick="FucChk(<?php echo '1'; ?>)" /></td> 
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo '1'; ?>&nbsp;</td>
   <td class="font1">&nbsp;<?php echo 'BASIC'; ?></td>
   <td class="font1r"><?php echo number_format(floatval($res4['Bas'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res5['Bas'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res6['Bas'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res7['Bas'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res8['Bas'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res9['Bas'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res10['Bas'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res11['Bas'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res12['Bas'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res1['Bas'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res2['Bas'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res3['Bas'])); ?>&nbsp;</td>
<?php $TotBas=$res4['Bas']+$res5['Bas']+$res6['Bas']+$res7['Bas']+$res8['Bas']+$res9['Bas']+$res10['Bas']+$res11['Bas']+$res12['Bas']+$res1['Bas']+$res2['Bas']+$res3['Bas']; ?>  
   <td align="right" class="font1" bgcolor="#97CBFF" style="font-size:12px;font-weight:bold;"><?php echo number_format($TotBas); ?>&nbsp;</td> 
</tr>
<?php /**** HRA ****/ ?>
<tr id="TR<?php echo '2'; ?>">
<td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo '2'; ?>" onClick="FucChk(<?php echo '2'; ?>)" /></td> 
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo '2'; ?>&nbsp;</td>
   <td class="font1">&nbsp;<?php echo 'HRA'; ?></td>
   <td class="font1r"><?php echo number_format(floatval($res4['Hra'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res5['Hra'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res6['Hra'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res7['Hra'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res8['Hra'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res9['Hra'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res10['Hra'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res11['Hra'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res12['Hra'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res1['Hra'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res2['Hra'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res3['Hra'])); ?>&nbsp;</td>
<?php $TotHra=$res4['Hra']+$res5['Hra']+$res6['Hra']+$res7['Hra']+$res8['Hra']+$res9['Hra']+$res10['Hra']+$res11['Hra']+$res12['Hra']+$res1['Hra']+$res2['Hra']+$res3['Hra']; ?>  
   <td align="right" class="font1" bgcolor="#97CBFF" style="font-size:12px;font-weight:bold;"><?php echo number_format($TotHra); ?>&nbsp;</td> 
</tr>  
<?php /**** CONVEYANCE ****/ ?>
<tr id="TR<?php echo '3'; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo '3'; ?>" onClick="FucChk(<?php echo '3'; ?>)" /></td> 
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo '3'; ?>&nbsp;</td>
   <td class="font1">&nbsp;<?php echo 'CONVEYANCE'; ?></td>
   <td class="font1r"><?php echo number_format(floatval($res4['Con'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res5['Con'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res6['Con'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res7['Con'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res8['Con'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res9['Con'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res10['Con'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res11['Con'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res12['Con'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res1['Con'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res2['Con'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res3['Con'])); ?>&nbsp;</td>
<?php $TotCon=$res4['Con']+$res5['Con']+$res6['Con']+$res7['Con']+$res8['Con']+$res9['Con']+$res10['Con']+$res11['Con']+$res12['Con']+$res1['Con']+$res2['Con']+$res3['Con']; ?>  
   <td align="right" class="font1" bgcolor="#97CBFF" style="font-size:12px;font-weight:bold;"><?php echo number_format($TotCon); ?>&nbsp;</td> </tr>
   
   
<?php /**** Transport ****/ ?>
<tr id="TR<?php echo '4'; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo '4'; ?>" onClick="FucChk(<?php echo '4'; ?>)" /></td> 
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo '4'; ?>&nbsp;</td>
   <td class="font1">&nbsp;<?php echo 'TRANSPORT'; ?></td>
   <td class="font1r"><?php echo number_format(floatval($res4['Ta'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res5['Ta'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res6['Ta'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res7['Ta'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res8['Ta'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res9['Ta'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res10['Ta'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res11['Ta'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res12['Ta'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res1['Ta'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res2['Ta'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res3['Ta'])); ?>&nbsp;</td>
<?php $TotTa=$res4['Ta']+$res5['Ta']+$res6['Ta']+$res7['Ta']+$res8['Ta']+$res9['Ta']+$res10['Ta']+$res11['Ta']+$res12['Ta']+$res1['Ta']+$res2['Ta']+$res3['Ta']; ?>  
   <td align="right" class="font1" bgcolor="#97CBFF" style="font-size:12px;font-weight:bold;"><?php echo number_format($TotTa); ?>&nbsp;</td> </tr>   
 
<?php /**** Car Allowance ****/ ?>
<tr id="TR<?php echo '5'; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo '5'; ?>" onClick="FucChk(<?php echo '5'; ?>)" /></td> 
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo '5'; ?>&nbsp;</td>
   <td class="font1">&nbsp;<?php echo 'CAR ALLOWANCE'; ?></td>
   <td class="font1r"><?php echo number_format(floatval($res4['CarAll'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res5['CarAll'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res6['CarAll'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res7['CarAll'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res8['CarAll'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res9['CarAll'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res10['CarAll'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res11['CarAll'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res12['CarAll'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res1['CarAll'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res2['CarAll'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res3['CarAll'])); ?>&nbsp;</td>
<?php $TotCarAll=$res4['CarAll']+$res5['CarAll']+$res6['CarAll']+$res7['CarAll']+$res8['CarAll']+$res9['CarAll']+$res10['CarAll']+$res11['CarAll']+$res12['CarAll']+$res1['CarAll']+$res2['CarAll']+$res3['CarAll']; ?>  
   <td align="right" class="font1" bgcolor="#97CBFF" style="font-size:12px;font-weight:bold;"><?php echo number_format($TotCarAll); ?>&nbsp;</td> </tr>
   
   
<?php /**** Bonus Month ****/ ?> 
<tr id="TR<?php echo '6'; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo '6'; ?>" onClick="FucChk(<?php echo '6'; ?>)" /></td> 
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo '6'; ?>&nbsp;</td>
   <td class="font1">&nbsp;<?php echo 'MONTHLY BONUS'; ?></td>
   <td class="font1r"><?php echo number_format(floatval($res4['BonusM'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res5['BonusM'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res6['BonusM'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res7['BonusM'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res8['BonusM'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res9['BonusM'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res10['BonusM'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res11['BonusM'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res12['BonusM'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res1['BonusM'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res2['BonusM'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res3['BonusM'])); ?>&nbsp;</td>
<?php $TotBonusM=$res4['BonusM']+$res5['BonusM']+$res6['BonusM']+$res7['BonusM']+$res8['BonusM']+$res9['BonusM']+$res10['BonusM']+$res11['BonusM']+$res12['BonusM']+$res1['BonusM']+$res2['BonusM']+$res3['BonusM']; ?>  
   <td align="right" class="font1" bgcolor="#97CBFF" style="font-size:12px;font-weight:bold;"><?php echo number_format($TotBonusM); ?>&nbsp;</td> </tr>   
   
<?php /**** Special ****/ ?>
<tr id="TR<?php echo '7'; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo '7'; ?>" onClick="FucChk(<?php echo '7'; ?>)" /></td> 
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo '7'; ?>&nbsp;</td>
   <td class="font1">&nbsp;<?php echo 'SPECIAL'; ?></td>
   <td class="font1r"><?php echo number_format(floatval($res4['Spe'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res5['Spe'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res6['Spe'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res7['Spe'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res8['Spe'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res9['Spe'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res10['Spe'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res11['Spe'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res12['Spe'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res1['Spe'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res2['Spe'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res3['Spe'])); ?>&nbsp;</td>
<?php $TotSpe=$res4['Spe']+$res5['Spe']+$res6['Spe']+$res7['Spe']+$res8['Spe']+$res9['Spe']+$res10['Spe']+$res11['Spe']+$res12['Spe']+$res1['Spe']+$res2['Spe']+$res3['Spe']; ?>  
   <td align="right" class="font1" bgcolor="#97CBFF" style="font-size:12px;font-weight:bold;"><?php echo number_format($TotSpe); ?>&nbsp;</td>
</tr>
<?php /**** DA ****/ ?>
<tr id="TR<?php echo '8'; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo '8'; ?>" onClick="FucChk(<?php echo '8'; ?>)" /></td> 
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo '8'; ?>&nbsp;</td>
   <td class="font1">&nbsp;<?php echo 'DA'; ?></td>
   <td class="font1r"><?php echo number_format(floatval($res4['Da'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res5['Da'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res6['Da'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res7['Da'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res8['Da'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res9['Da'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res10['Da'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res11['Da'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res12['Da'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res1['Da'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res2['Da'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res3['Da'])); ?>&nbsp;</td>
<?php $TotDa=$res4['Da']+$res5['Da']+$res6['Da']+$res7['Da']+$res8['Da']+$res9['Da']+$res10['Da']+$res11['Da']+$res12['Da']+$res1['Da']+$res2['Da']+$res3['Da']; ?>  
   <td align="right" class="font1" bgcolor="#97CBFF" style="font-size:12px;font-weight:bold;"><?php echo number_format($TotDa); ?>&nbsp;</td> 
</tr>
<?php /**** Incentive ****/ ?>
<tr id="TR<?php echo '9'; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo '9'; ?>" onClick="FucChk(<?php echo '9'; ?>)" /></td> 
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo '9'; ?>&nbsp;</td>
   <td class="font1">&nbsp;<?php echo 'INCENTIVE'; ?></td>
   <td class="font1r"><?php echo number_format(floatval($res4['Inc'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res5['Inc'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res6['Inc'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res7['Inc'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res8['Inc'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res9['Inc'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res10['Inc'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res11['Inc'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res12['Inc'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res1['Inc'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res2['Inc'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res3['Inc'])); ?>&nbsp;</td>
<?php $TotInc=$res4['Inc']+$res5['Inc']+$res6['Inc']+$res7['Inc']+$res8['Inc']+$res9['Inc']+$res10['Inc']+$res11['Inc']+$res12['Inc']+$res1['Inc']+$res2['Inc']+$res3['Inc']; ?>  
   <td align="right" class="font1" bgcolor="#97CBFF" style="font-size:12px;font-weight:bold;"><?php echo number_format($TotInc); ?>&nbsp;</td> 
</tr>
<?php /**** Performance Pay ****/ ?>
<tr id="TR<?php echo '10'; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo '10'; ?>" onClick="FucChk(<?php echo '10'; ?>)" /></td> 
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo '10'; ?>&nbsp;</td>
   <td class="font1">&nbsp;<?php echo 'PERFORMANCE_PAY'; ?></td>
   <td class="font1r"><?php echo number_format(floatval($res4['Per'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res5['Per'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res6['Per'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res7['Per'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res8['Per'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res9['Per'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res10['Per'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res11['Per'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res12['Per'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res1['Per'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res2['Per'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res3['Per'])); ?>&nbsp;</td>
<?php $TotPer=$res4['Per']+$res5['Per']+$res6['Per']+$res7['Per']+$res8['Per']+$res9['Per']+$res10['Per']+$res11['Per']+$res12['Per']+$res1['Per']+$res2['Per']+$res3['Per']; ?>  
   <td align="right" class="font1" bgcolor="#97CBFF" style="font-size:12px;font-weight:bold;"><?php echo number_format($TotPer); ?>&nbsp;</td> 
</tr>
<?php /**** LeaveEncash ****/ ?>
<tr id="TR<?php echo '11'; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo '11'; ?>" onClick="FucChk(<?php echo '11'; ?>)" /></td> 
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo '11'; ?>&nbsp;</td>
   <td class="font1">&nbsp;<?php echo 'LEAVE ENCASH'; ?></td>
   <td class="font1r"><?php echo number_format(floatval($res4['Lea'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res5['Lea'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res6['Lea'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res7['Lea'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res8['Lea'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res9['Lea'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res10['Lea'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res11['Lea'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res12['Lea'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res1['Lea'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res2['Lea'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res3['Lea'])); ?>&nbsp;</td>
<?php $TotLea=$res4['Lea']+$res5['Lea']+$res6['Lea']+$res7['Lea']+$res8['Lea']+$res9['Lea']+$res10['Lea']+$res11['Lea']+$res12['Lea']+$res1['Lea']+$res2['Lea']+$res3['Lea']; ?>  
   <td align="right" class="font1" bgcolor="#97CBFF" style="font-size:12px;font-weight:bold;"><?php echo number_format($TotLea); ?>&nbsp;</td>
</tr>
<?php /**** Variable Adjustment ****/ ?>
<tr id="TR<?php echo '12'; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo '12'; ?>" onClick="FucChk(<?php echo '12'; ?>)" /></td> 
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo '12'; ?>&nbsp;</td>
   <td class="font1">&nbsp;<?php echo 'VAR ADJUST'; ?></td>
   <td class="font1r"><?php echo number_format(floatval($res4['Var'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res5['Var'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res6['Var'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res7['Var'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res8['Var'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res9['Var'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res10['Var'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res11['Var'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res12['Var'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res1['Var'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res2['Var'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res3['Var'])); ?>&nbsp;</td>
<?php $TotVar=$res4['Var']+$res5['Var']+$res6['Var']+$res7['Var']+$res8['Var']+$res9['Var']+$res10['Var']+$res11['Var']+$res12['Var']+$res1['Var']+$res2['Var']+$res3['Var']; ?>  
   <td align="right" class="font1" bgcolor="#97CBFF" style="font-size:12px;font-weight:bold;"><?php echo number_format($TotVar); ?>&nbsp;</td> 
</tr>


<?php /**** Variable Reimbursement ****/ ?>
<tr id="TR<?php echo '13'; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo '13'; ?>" onClick="FucChk(<?php echo '13'; ?>)" /></td> 
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo '13'; ?>&nbsp;</td>
   <td class="font1">&nbsp;<?php echo 'VAR REIMBURSE<sup>n</sup>'; ?></td>
   <td class="font1r"><?php echo number_format(floatval($res4['VarRemburmnt'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res5['VarRemburmnt'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res6['VarRemburmnt'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res7['VarRemburmnt'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res8['VarRemburmnt'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res9['VarRemburmnt'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res10['VarRemburmnt'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res11['VarRemburmnt'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res12['VarRemburmnt'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res1['VarRemburmnt'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res2['VarRemburmnt'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res3['VarRemburmnt'])); ?>&nbsp;</td>
<?php $TotVar=$res4['VarRemburmnt']+$res5['VarRemburmnt']+$res6['VarRemburmnt']+$res7['VarRemburmnt']+$res8['VarRemburmnt']+$res9['VarRemburmnt']+$res10['VarRemburmnt']+$res11['VarRemburmnt']+$res12['VarRemburmnt']+$res1['VarRemburmnt']+$res2['VarRemburmnt']+$res3['VarRemburmnt']; ?>  
   <td align="right" class="font1" bgcolor="#97CBFF" style="font-size:12px;font-weight:bold;"><?php echo number_format($TotVar); ?>&nbsp;</td> 
</tr>

<?php /**** CCA (City Compenstarry Allowance)****/ ?>
<tr id="TR<?php echo '14'; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo '14'; ?>" onClick="FucChk(<?php echo '14'; ?>)" /></td> 
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo '14'; ?>&nbsp;</td>
   <td class="font1">&nbsp;<?php echo 'CCA'; ?></td>
   <td class="font1r"><?php echo number_format(floatval($res4['Cca'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res5['Cca'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res6['Cca'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res7['Cca'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res8['Cca'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res9['Cca'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res10['Cca'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res11['Cca'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res12['Cca'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res1['Cca'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res2['Cca'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res3['Cca'])); ?>&nbsp;</td>
<?php $TotCca=$res4['Cca']+$res5['Cca']+$res6['Cca']+$res7['Cca']+$res8['Cca']+$res9['Cca']+$res10['Cca']+$res11['Cca']+$res12['Cca']+$res1['Cca']+$res2['Cca']+$res3['Cca']; ?>  
   <td align="right" class="font1" bgcolor="#97CBFF" style="font-size:12px;font-weight:bold;"><?php echo number_format($TotCca); ?>&nbsp;</td> 
</tr>
<?php /**** RA Reallocation Allowance ****/ ?>
<tr id="TR<?php echo '15'; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo '15'; ?>" onClick="FucChk(<?php echo '15'; ?>)" /></td> 
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo '15'; ?>&nbsp;</td>
   <td class="font1">&nbsp;<?php echo 'RA'; ?></td>
   <td class="font1r"><?php echo number_format(floatval($res4['Ra'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res5['Ra'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res6['Ra'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res7['Ra'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res8['Ra'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res9['Ra'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res10['Ra'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res11['Ra'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res12['Ra'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res1['Ra'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res2['Ra'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res3['Ra'])); ?>&nbsp;</td>
<?php $TotRa=$res4['Ra']+$res5['Ra']+$res6['Ra']+$res7['Ra']+$res8['Ra']+$res9['Ra']+$res10['Ra']+$res11['Ra']+$res12['Ra']+$res1['Ra']+$res2['Ra']+$res3['Ra']; ?>  
   <td align="right" class="font1" bgcolor="#97CBFF" style="font-size:12px;font-weight:bold;"><?php echo number_format($TotRa); ?>&nbsp;</td> 
</tr>
<?php /**** Bonus ****/ ?>
<tr id="TR<?php echo '16'; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo '16'; ?>" onClick="FucChk(<?php echo '16'; ?>)" /></td> 
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo '16'; ?>&nbsp;</td>
   <td class="font1">&nbsp;<?php echo 'BONUS'; ?></td>
   <td class="font1r"><?php echo number_format(floatval($res4['Bon'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res5['Bon'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res6['Bon'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res7['Bon'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res8['Bon'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res9['Bon'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res10['Bon'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res11['Bon'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res12['Bon'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res1['Bon'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res2['Bon'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res3['Bon'])); ?>&nbsp;</td>
<?php $TotBon=$res4['Bon']+$res5['Bon']+$res6['Bon']+$res7['Bon']+$res8['Bon']+$res9['Bon']+$res10['Bon']+$res11['Bon']+$res12['Bon']+$res1['Bon']+$res2['Bon']+$res3['Bon']; ?>  
   <td align="right" class="font1" bgcolor="#97CBFF" style="font-size:12px;font-weight:bold;"><?php echo number_format($TotBon); ?>&nbsp;</td> 
</tr>
<?php /**** cea ****/ ?>
<tr id="TR<?php echo '17'; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo '17'; ?>" onClick="FucChk(<?php echo '17'; ?>)" /></td> 
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo '17'; ?>&nbsp;</td>
   <td class="font1">&nbsp;<?php echo 'CEA'; ?></td>
   <td class="font1r"><?php echo number_format(floatval($res4['Ycea'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res5['Ycea'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res6['Ycea'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res7['Ycea'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res8['Ycea'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res9['Ycea'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res10['Ycea'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res11['Ycea'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res12['Ycea'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res1['Ycea'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res2['Ycea'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res3['Ycea'])); ?>&nbsp;</td>
<?php $TotYcea=$res4['Ycea']+$res5['Ycea']+$res6['Ycea']+$res7['Ycea']+$res8['Ycea']+$res9['Ycea']+$res10['Ycea']+$res11['Ycea']+$res12['Ycea']+$res1['Ycea']+$res2['Ycea']+$res3['Ycea']; ?>  
   <td align="right" class="font1" bgcolor="#97CBFF" style="font-size:12px;font-weight:bold;"><?php echo number_format($TotYcea); ?>&nbsp;</td> 
</tr>
<?php /**** mr ****/ ?>
<tr id="TR<?php echo '18'; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo '18'; ?>" onClick="FucChk(<?php echo '18'; ?>)" /></td> 
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo '18'; ?>&nbsp;</td>
   <td class="font1">&nbsp;<?php echo 'MR'; ?></td>
   <td class="font1r"><?php echo number_format(floatval($res4['Ymr'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res5['Ymr'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res6['Ymr'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res7['Ymr'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res8['Ymr'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res9['Ymr'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res10['Ymr'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res11['Ymr'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res12['Ymr'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res1['Ymr'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res2['Ymr'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res3['Ymr'])); ?>&nbsp;</td>
<?php $TotYmr=$res4['Ymr']+$res5['Ymr']+$res6['Ymr']+$res7['Ymr']+$res8['Ymr']+$res9['Ymr']+$res10['Ymr']+$res11['Ymr']+$res12['Ymr']+$res1['Ymr']+$res2['Ymr']+$res3['Ymr']; ?>  
   <td align="right" class="font1" bgcolor="#97CBFF" style="font-size:12px;font-weight:bold;"><?php echo number_format($TotYmr); ?>&nbsp;</td> 
</tr>
<?php /**** lta ****/ ?>
<tr id="TR<?php echo '19'; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo '19'; ?>" onClick="FucChk(<?php echo '19'; ?>)" /></td> 
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo '19'; ?>&nbsp;</td>
   <td class="font1">&nbsp;<?php echo 'LTA'; ?></td>
   <td class="font1r"><?php echo number_format(floatval($res4['Ylta'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res5['Ylta'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res6['Ylta'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res7['Ylta'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res8['Ylta'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res9['Ylta'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res10['Ylta'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res11['Ylta'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res12['Ylta'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res1['Ylta'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res2['Ylta'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res3['Ylta'])); ?>&nbsp;</td>
<?php $TotYlta=$res4['Ylta']+$res5['Ylta']+$res6['Ylta']+$res7['Ylta']+$res8['Ylta']+$res9['Ylta']+$res10['Ylta']+$res11['Ylta']+$res12['Ylta']+$res1['Ylta']+$res2['Ylta']+$res3['Ylta']; ?>  
   <td align="right" class="font1" bgcolor="#97CBFF" style="font-size:12px;font-weight:bold;"><?php echo number_format($TotYlta); ?>&nbsp;</td> 
</tr>
<?php /**** Arr_Basic ****/ ?>
<tr id="TR<?php echo '20'; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo '20'; ?>" onClick="FucChk(<?php echo '20'; ?>)" /></td> 
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo '20'; ?>&nbsp;</td>
   <td class="font1">&nbsp;<?php echo 'ARR_BASIC'; ?></td>
   <td class="font1r"><?php echo number_format(floatval($res4['ArrBas'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res5['ArrBas'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res6['ArrBas'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res7['ArrBas'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res8['ArrBas'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res9['ArrBas'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res10['ArrBas'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res11['ArrBas'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res12['ArrBas'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res1['ArrBas'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res2['ArrBas'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res3['ArrBas'])); ?>&nbsp;</td>
<?php $TotArrBas=$res4['ArrBas']+$res5['ArrBas']+$res6['ArrBas']+$res7['ArrBas']+$res8['ArrBas']+$res9['ArrBas']+$res10['ArrBas']+$res11['ArrBas']+$res12['ArrBas']+$res1['ArrBas']+$res2['ArrBas']+$res3['ArrBas']; ?>  
   <td align="right" class="font1" bgcolor="#97CBFF" style="font-size:12px;font-weight:bold;"><?php echo number_format($TotArrBas); ?>&nbsp;</td> 
</tr>
<?php /**** Arr_HRA ****/ ?>
<tr id="TR<?php echo '21'; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo '21'; ?>" onClick="FucChk(<?php echo '21'; ?>)" /></td> 
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo '21'; ?>&nbsp;</td>
   <td class="font1">&nbsp;<?php echo 'ARR_HRA'; ?></td>
   <td class="font1r"><?php echo number_format(floatval($res4['ArrHra'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res5['ArrHra'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res6['ArrHra'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res7['ArrHra'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res8['ArrHra'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res9['ArrHra'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res10['ArrHra'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res11['ArrHra'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res12['ArrHra'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res1['ArrHra'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res2['ArrHra'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res3['ArrHra'])); ?>&nbsp;</td>
<?php $TotArrHra=$res4['ArrHra']+$res5['ArrHra']+$res6['ArrHra']+$res7['ArrHra']+$res8['ArrHra']+$res9['ArrHra']+$res10['ArrHra']+$res11['ArrHra']+$res12['ArrHra']+$res1['ArrHra']+$res2['ArrHra']+$res3['ArrHra']; ?>  
   <td align="right" class="font1" bgcolor="#97CBFF" style="font-size:12px;font-weight:bold;"><?php echo number_format($TotArrHra); ?>&nbsp;</td> 
</tr>
<?php /**** Arr_Conveyance ****/ ?>
<tr id="TR<?php echo '22'; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo '22'; ?>" onClick="FucChk(<?php echo '22'; ?>)" /></td> 
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo '22'; ?>&nbsp;</td>
   <td class="font1">&nbsp;<?php echo 'ARR_CONV'; ?></td>
   <td class="font1r"><?php echo number_format(floatval($res4['ArrCon'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res5['ArrCon'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res6['ArrCon'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res7['ArrCon'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res8['ArrCon'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res9['ArrCon'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res10['ArrCon'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res11['ArrCon'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res12['ArrCon'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res1['ArrCon'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res2['ArrCon'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res3['ArrCon'])); ?>&nbsp;</td>
<?php $TotArrCon=$res4['ArrCon']+$res5['ArrCon']+$res6['ArrCon']+$res7['ArrCon']+$res8['ArrCon']+$res9['ArrCon']+$res10['ArrCon']+$res11['ArrCon']+$res12['ArrCon']+$res1['ArrCon']+$res2['ArrCon']+$res3['ArrCon']; ?>  
   <td align="right" class="font1" bgcolor="#97CBFF" style="font-size:12px;font-weight:bold;"><?php echo number_format($TotArrCon); ?>&nbsp;</td> 
</tr>

<?php /**** Arr_Special ****/ ?>
<tr id="TR<?php echo '23'; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo '23'; ?>" onClick="FucChk(<?php echo '23'; ?>)" /></td> 
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo '23'; ?>&nbsp;</td>
   <td class="font1">&nbsp;<?php echo 'ARR_SPECIAL'; ?></td>
   <td class="font1r"><?php echo number_format(floatval($res4['ArrSpl'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res5['ArrSpl'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res6['ArrSpl'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res7['ArrSpl'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res8['ArrSpl'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res9['ArrSpl'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res10['ArrSpl'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res11['ArrSpl'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res12['ArrSpl'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res1['ArrSpl'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res2['ArrSpl'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res3['ArrSpl'])); ?>&nbsp;</td>
<?php $TotArrSpl=$res4['ArrSpl']+$res5['ArrSpl']+$res6['ArrSpl']+$res7['ArrSpl']+$res8['ArrSpl']+$res9['ArrSpl']+$res10['ArrSpl']+$res11['ArrSpl']+$res12['ArrSpl']+$res1['ArrSpl']+$res2['ArrSpl']+$res3['ArrSpl']; ?>  
   <td align="right" class="font1" bgcolor="#97CBFF" style="font-size:12px;font-weight:bold;"><?php echo number_format($TotArrSpl); ?>&nbsp;</td> 
</tr>


<?php /**** Arr_LvEncash ****/ ?>
<tr id="TR<?php echo '24'; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo '24'; ?>" onClick="FucChk(<?php echo '24'; ?>)" /></td> 
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo '24'; ?>&nbsp;</td>
   <td class="font1">&nbsp;<?php echo 'ARR_LEAVE_ENCASH'; ?></td>
   <td class="font1r"><?php echo number_format(floatval($res4['ArrLvEncash'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res5['ArrLvEncash'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res6['ArrLvEncash'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res7['ArrLvEncash'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res8['ArrLvEncash'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res9['ArrLvEncash'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res10['ArrLvEncash'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res11['ArrLvEncash'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res12['ArrLvEncash'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res1['ArrLvEncash'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res2['ArrLvEncash'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res3['ArrLvEncash'])); ?>&nbsp;</td>
<?php $TotArrLvEncash=$res4['ArrLvEncash']+$res5['ArrLvEncash']+$res6['ArrLvEncash']+$res7['ArrLvEncash']+$res8['ArrLvEncash']+$res9['ArrLvEncash']+$res10['ArrLvEncash']+$res11['ArrLvEncash']+$res12['ArrLvEncash']+$res1['ArrLvEncash']+$res2['ArrLvEncash']+$res3['ArrLvEncash']; ?>  
   <td align="right" class="font1" bgcolor="#97CBFF" style="font-size:12px;font-weight:bold;"><?php echo number_format($TotArrLvEncash); ?>&nbsp;</td> 
</tr>


<?php /**** Arr_Bonus ****/ ?>
<tr id="TR<?php echo '25'; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo '25'; ?>" onClick="FucChk(<?php echo '25'; ?>)" /></td> 
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo '25'; ?>&nbsp;</td>
   <td class="font1">&nbsp;<?php echo 'ARR_BONUS'; ?></td>
   <td class="font1r"><?php echo number_format(floatval($res4['ArrBonus'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res5['ArrBonus'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res6['ArrBonus'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res7['ArrBonus'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res8['ArrBonus'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res9['ArrBonus'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res10['ArrBonus'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res11['ArrBonus'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res12['ArrBonus'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res1['ArrBonus'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res2['ArrBonus'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res3['ArrBonus'])); ?>&nbsp;</td>
<?php $TotArrBonus=$res4['ArrBonus']+$res5['ArrBonus']+$res6['ArrBonus']+$res7['ArrBonus']+$res8['ArrBonus']+$res9['ArrBonus']+$res10['ArrBonus']+$res11['ArrBonus']+$res12['ArrBonus']+$res1['ArrBonus']+$res2['ArrBonus']+$res3['ArrBonus']; ?>  
   <td align="right" class="font1" bgcolor="#97CBFF" style="font-size:12px;font-weight:bold;"><?php echo number_format($TotArrBonus); ?>&nbsp;</td> 
</tr>


<?php /**** Arr_RA ****/ ?>
<tr id="TR<?php echo '26'; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo '26'; ?>" onClick="FucChk(<?php echo '26'; ?>)" /></td> 
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo '26'; ?>&nbsp;</td>
   <td class="font1">&nbsp;<?php echo 'ARR_RELOCATION_ALLOWANCE'; ?></td>
   <td class="font1r"><?php echo number_format(floatval($res4['ArrRA'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res5['ArrRA'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res6['ArrRA'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res7['ArrRA'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res8['ArrRA'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res9['ArrRA'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res10['ArrRA'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res11['ArrRA'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res12['ArrRA'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res1['ArrRA'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res2['ArrRA'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res3['ArrRA'])); ?>&nbsp;</td>
<?php $TotArrRA=$res4['ArrRA']+$res5['ArrRA']+$res6['ArrRA']+$res7['ArrRA']+$res8['ArrRA']+$res9['ArrRA']+$res10['ArrRA']+$res11['ArrRA']+$res12['ArrRA']+$res1['ArrRA']+$res2['ArrRA']+$res3['ArrRA']; ?>  
   <td align="right" class="font1" bgcolor="#97CBFF" style="font-size:12px;font-weight:bold;"><?php echo number_format($TotArrRA); ?>&nbsp;</td> 
</tr>

<?php /**** Bonus Adjustment ****/ ?>
<tr id="TR<?php echo '35'; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo '35'; ?>" onClick="FucChk(<?php echo '35'; ?>)" /></td> 
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo '35'; ?>&nbsp;</td>
   <td class="font1">&nbsp;<?php echo 'BONUS'; ?></td>
   <td class="font1r"><?php echo number_format(floatval($res4['Bonus_Adjustment'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res5['Bonus_Adjustment'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res6['Bonus_Adjustment'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res7['Bonus_Adjustment'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res8['Bonus_Adjustment'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res9['Bonus_Adjustment'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res10['Bonus_Adjustment'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res11['Bonus_Adjustment'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res12['Bonus_Adjustment'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res1['Bonus_Adjustment'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res2['Bonus_Adjustment'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res3['Bonus_Adjustment'])); ?>&nbsp;</td>
<?php $TotBonus_Adjustment=$res4['Bonus_Adjustment']+$res5['Bonus_Adjustment']+$res6['Bonus_Adjustment']+$res7['Bonus_Adjustment']+$res8['Bonus_Adjustment']+$res9['Bonus_Adjustment']+$res10['Bonus_Adjustment']+$res11['Bonus_Adjustment']+$res12['Bonus_Adjustment']+$res1['Bonus_Adjustment']+$res2['Bonus_Adjustment']+$res3['Bonus_Adjustment']; ?>  
   <td align="right" class="font1" bgcolor="#97CBFF" style="font-size:12px;font-weight:bold;"><?php echo number_format($TotBonus_Adjustment); ?>&nbsp;</td> </tr>

<?php /**** Gross ****/ ?>
<?php
$TotG4=$res4['Bas']+$res4['Hra']+$res4['Con']+$res4['Ta']+$res4['Spe']+$res4['BonusM']+$res4['Da']+$res4['Inc']+$res4['Per']+$res4['Lea']+$res4['Var']+$res_4['VarRemburmnt']+$res4['Cca']+$res4['Ra']+$res4['Bon']+$res4['Ycea']+$res4['Ymr']+$res4['Ylta']+$res4['ArrBas']+$res4['ArrHra']+$res4['ArrCon']+$res4['ArrSpl']+$res4['CarAll']+$res4['ArrLvEncash']+$res4['ArrBonus']+$res4['ArrRA']+$res4['Bonus_Adjustment'];
$TotG5=$res5['Bas']+$res5['Hra']+$res5['Con']+$res5['Ta']+$res5['Spe']+$res5['BonusM']+$res5['Da']+$res5['Inc']+$res5['Per']+$res5['Lea']+$res5['Var']+$res_5['VarRemburmnt']+$res5['Cca']+$res5['Ra']+$res5['Bon']+$res5['Ycea']+$res5['Ymr']+$res5['Ylta']+$res5['ArrBas']+$res5['ArrHra']+$res5['ArrCon']+$res5['ArrSpl']+$res5['CarAll']+$res5['ArrLvEncash']+$res5['ArrBonus']+$res5['ArrRA']+$res5['Bonus_Adjustment'];
$TotG6=$res6['Bas']+$res6['Hra']+$res6['Con']+$res6['Ta']+$res6['Spe']+$res6['BonusM']+$res6['Da']+$res6['Inc']+$res6['Per']+$res6['Lea']+$res6['Var']+$res_6['VarRemburmnt']+$res6['Cca']+$res6['Ra']+$res6['Bon']+$res6['Ycea']+$res6['Ymr']+$res6['Ylta']+$res6['ArrBas']+$res6['ArrHra']+$res6['ArrCon']+$res6['ArrSpl']+$res6['CarAll']+$res6['ArrLvEncash']+$res6['ArrBonus']+$res6['ArrRA']+$res6['Bonus_Adjustment'];
$TotG7=$res7['Bas']+$res7['Hra']+$res7['Con']+$res7['Ta']+$res7['Spe']+$res7['BonusM']+$res7['Da']+$res7['Inc']+$res7['Per']+$res7['Lea']+$res7['Var']+$res_7['VarRemburmnt']+$res7['Cca']+$res7['Ra']+$res7['Bon']+$res7['Ycea']+$res7['Ymr']+$res7['Ylta']+$res7['ArrBas']+$res7['ArrHra']+$res7['ArrCon']+$res7['ArrSpl']+$res7['CarAll']+$res7['ArrLvEncash']+$res7['ArrBonus']+$res7['ArrRA']+$res7['Bonus_Adjustment'];
$TotG8=$res8['Bas']+$res8['Hra']+$res8['Con']+$res8['Ta']+$res8['Spe']+$res8['BonusM']+$res8['Da']+$res8['Inc']+$res8['Per']+$res8['Lea']+$res8['Var']+$res_8['VarRemburmnt']+$res8['Cca']+$res8['Ra']+$res8['Bon']+$res8['Ycea']+$res8['Ymr']+$res8['Ylta']+$res8['ArrBas']+$res8['ArrHra']+$res8['ArrCon']+$res8['ArrSpl']+$res8['CarAll']+$res8['ArrLvEncash']+$res8['ArrBonus']+$res8['ArrRA']+$res8['Bonus_Adjustment'];
$TotG9=$res9['Bas']+$res9['Hra']+$res9['Con']+$res9['Ta']+$res9['Spe']+$res9['BonusM']+$res9['Da']+$res9['Inc']+$res9['Per']+$res9['Lea']+$res9['Var']+$res_9['VarRemburmnt']+$res9['Cca']+$res9['Ra']+$res9['Bon']+$res9['Ycea']+$res9['Ymr']+$res9['Ylta']+$res9['ArrBas']+$res9['ArrHra']+$res9['ArrCon']+$res9['ArrSpl']+$res9['CarAll']+$res9['ArrLvEncash']+$res9['ArrBonus']+$res9['ArrRA']+$res9['Bonus_Adjustment']; 
$TotG10=$res10['Bas']+$res10['Hra']+$res10['Con']+$res10['Ta']+$res10['Spe']+$res10['BonusM']+$res10['Da']+$res10['Inc']+$res10['Per']+$res10['Lea']+$res10['Var']+$res_10['VarRemburmnt']+$res10['Cca']+$res10['Ra']+$res10['Bon']+$res10['Ycea']+$res10['Ymr']+$res10['Ylta']+$res10['ArrBas']+$res10['ArrHra']+$res10['ArrCon']+$res10['ArrSpl']+$res10['CarAll']+$res10['ArrLvEncash']+$res10['ArrBonus']+$res10['ArrRA']+$res10['Bonus_Adjustment'];
$TotG11=$res11['Bas']+$res11['Hra']+$res11['Con']+$res11['Ta']+$res11['Spe']+$res11['BonusM']+$res11['Da']+$res11['Inc']+$res11['Per']+$res11['Lea']+$res11['Var']+$res_11['VarRemburmnt']+$res11['Cca']+$res11['Ra']+$res11['Bon']+$res11['Ycea']+$res11['Ymr']+$res11['Ylta']+$res11['ArrBas']+$res11['ArrHra']+$res11['ArrCon']+$res11['ArrSpl']+$res11['CarAll']+$res11['ArrLvEncash']+$res11['ArrBonus']+$res11['ArrRA']+$res11['Bonus_Adjustment'];
$TotG12=$res12['Bas']+$res12['Hra']+$res12['Con']+$res12['Ta']+$res12['Spe']+$res12['BonusM']+$res12['Da']+$res12['Inc']+$res12['Per']+$res12['Lea']+$res12['Var']+$res_12['VarRemburmnt']+$res12['Cca']+$res12['Ra']+$res12['Bon']+$res12['Ycea']+$res12['Ymr']+$res12['Ylta']+$res12['ArrBas']+$res12['ArrHra']+$res12['ArrCon']+$res12['ArrSpl']+$res12['CarAll']+$res12['ArrLvEncash']+$res12['ArrBonus']+$res12['ArrRA']+$res12['Bonus_Adjustment'];
$TotG1=$res1['Bas']+$res1['Hra']+$res1['Con']+$res1['Ta']+$res1['Spe']+$res1['BonusM']+$res1['Da']+$res1['Inc']+$res1['Per']+$res1['Lea']+$res1['Var']+$res_1['VarRemburmnt']+$res1['Cca']+$res1['Ra']+$res1['Bon']+$res1['Ycea']+$res1['Ymr']+$res1['Ylta']+$res1['ArrBas']+$res1['ArrHra']+$res1['ArrCon']+$res1['ArrSpl']+$res1['CarAll']+$res1['ArrLvEncash']+$res1['ArrBonus']+$res1['ArrRA']+$res1['Bonus_Adjustment']; 
$TotG2=$res2['Bas']+$res2['Hra']+$res2['Con']+$res2['Ta']+$res2['Spe']+$res2['BonusM']+$res2['Da']+$res2['Inc']+$res2['Per']+$res2['Lea']+$res2['Var']+$res_2['VarRemburmnt']+$res2['Cca']+$res2['Ra']+$res2['Bon']+$res2['Ycea']+$res2['Ymr']+$res2['Ylta']+$res2['ArrBas']+$res2['ArrHra']+$res2['ArrCon']+$res2['ArrSpl']+$res2['CarAll']+$res2['ArrLvEncash']+$res2['ArrBonus']+$res2['ArrRA']+$res2['Bonus_Adjustment']; 
$TotG3=$res3['Bas']+$res3['Hra']+$res3['Con']+$res3['Ta']+$res3['Spe']+$res3['BonusM']+$res3['Da']+$res3['Inc']+$res3['Per']+$res3['Lea']+$res3['Var']+$res_3['VarRemburmnt']+$res3['Cca']+$res3['Ra']+$res3['Bon']+$res3['Ycea']+$res3['Ymr']+$res3['Ylta']+$res3['ArrBas']+$res3['ArrHra']+$res3['ArrCon']+$res3['ArrSpl']+$res3['CarAll']+$res3['ArrLvEncash']+$res3['ArrBonus']+$res3['ArrRA']+$res3['Bonus_Adjustment']; 
?>
<tr id="TR<?php echo '27'; ?>" bgcolor="#FF9BFF">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo '27'; ?>" onClick="FucChk(<?php echo '27'; ?>)" disabled checked/></td> 
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo '27'; ?>&nbsp;</td>
   <td class="font1">&nbsp;<?php echo 'GROSS'; ?></td>
   <td class="font1br"><?php echo number_format($TotG4); ?>&nbsp;</td>
   <td class="font1br"><?php echo number_format($TotG5); ?>&nbsp;</td>
   <td class="font1br"><?php echo number_format($TotG6); ?>&nbsp;</td>
   <td class="font1br"><?php echo number_format($TotG7); ?>&nbsp;</td>
   <td class="font1br"><?php echo number_format($TotG8); ?>&nbsp;</td>
   <td class="font1br"><?php echo number_format($TotG9); ?>&nbsp;</td>
   <td class="font1br"><?php echo number_format($TotG10); ?>&nbsp;</td>
   <td class="font1br"><?php echo number_format($TotG11); ?>&nbsp;</td>
   <td class="font1br"><?php echo number_format($TotG12); ?>&nbsp;</td>
   <td class="font1br"><?php echo number_format($TotG1); ?>&nbsp;</td>
   <td class="font1br"><?php echo number_format($TotG2); ?>&nbsp;</td>
   <td class="font1br"><?php echo number_format($TotG3); ?>&nbsp;</td>
<?php $TotalGross=$TotG4+$TotG5+$TotG6+$TotG7+$TotG8+$TotG9+$TotG10+$TotG11+$TotG12+$TotG1+$TotG2+$TotG3;?>  
   <td class="font1br" bgcolor="#FF9BFF"><?php echo number_format($TotalGross); ?>&nbsp;</td> 
</tr>
<?php /**** PF ****/ ?>
<tr id="TR<?php echo '28'; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo '28'; ?>" onClick="FucChk(<?php echo '28'; ?>)" /></td> 
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo '28'; ?>&nbsp;</td>
   <td class="font1">&nbsp;<?php echo 'PF'; ?></td>
   <td class="font1r"><?php echo number_format(floatval($res4['TotPfEmp'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res5['TotPfEmp'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res6['TotPfEmp'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res7['TotPfEmp'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res8['TotPfEmp'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res9['TotPfEmp'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res10['TotPfEmp'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res11['TotPfEmp'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res12['TotPfEmp'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res1['TotPfEmp'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res2['TotPfEmp'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res3['TotPfEmp'])); ?>&nbsp;</td>
<?php $TotTotPfEmp=$res4['TotPfEmp']+$res5['TotPfEmp']+$res6['TotPfEmp']+$res7['TotPfEmp']+$res8['TotPfEmp']+$res9['TotPfEmp']+$res10['TotPfEmp']+$res11['TotPfEmp']+$res12['TotPfEmp']+$res1['TotPfEmp']+$res2['TotPfEmp']+$res3['TotPfEmp']; ?>  
   <td align="right" class="font1" bgcolor="#97CBFF" style="font-size:12px;font-weight:bold;"><?php echo number_format($TotTotPfEmp); ?>&nbsp;</td> 
</tr>
<?php /**** Arreaer PF ****/ ?>
<tr id="TR<?php echo '29'; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo '29'; ?>" onClick="FucChk(<?php echo '29'; ?>)" /></td> 
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo '29'; ?>&nbsp;</td>
   <td class="font1">&nbsp;<?php echo 'ARREAR PF'; ?></td>
  <td class="font1r"><?php echo number_format(floatval($res4['ArrPf'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res5['ArrPf'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res6['ArrPf'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res7['ArrPf'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res8['ArrPf'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res9['ArrPf'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res10['ArrPf'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res11['ArrPf'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res12['ArrPf'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res1['ArrPf'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res2['ArrPf'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res3['ArrPf'])); ?>&nbsp;</td>
<?php $TotArrPf=$res4['ArrPf']+$res5['ArrPf']+$res6['ArrPf']+$res7['ArrPf']+$res8['ArrPf']+$res9['ArrPf']+$res10['ArrPf']+$res11['ArrPf']+$res12['ArrPf']+$res1['ArrPf']+$res2['ArrPf']+$res3['ArrPf']; ?>  
   <td align="right" class="font1" bgcolor="#97CBFF" style="font-size:12px;font-weight:bold;"><?php echo number_format($TotArrPf); ?>&nbsp;</td> 
</tr>
<?php /**** ESIC ****/ ?>
<tr id="TR<?php echo '30'; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo '30'; ?>" onClick="FucChk(<?php echo '30'; ?>)" /></td> 
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo '30'; ?>&nbsp;</td>
   <td class="font1">&nbsp;<?php echo 'ESIC'; ?></td>
   <td class="font1r"><?php echo number_format(floatval($res4['Esic'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res5['Esic'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res6['Esic'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res7['Esic'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res8['Esic'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res9['Esic'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res10['Esic'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res11['Esic'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res12['Esic'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res1['Esic'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res2['Esic'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res3['Esic'])); ?>&nbsp;</td>
<?php $TotEsic=$res4['Esic']+$res5['Esic']+$res6['Esic']+$res7['Esic']+$res8['Esic']+$res9['Esic']+$res10['Esic']+$res11['Esic']+$res12['Esic']+$res1['Esic']+$res2['Esic']+$res3['Esic']; ?>  
   <td align="right" class="font1" bgcolor="#97CBFF" style="font-size:12px;font-weight:bold;"><?php echo number_format($TotEsic); ?>&nbsp;</td> 
</tr>
<?php /**** Arrear ESIC ****/ ?>
<tr id="TR<?php echo '31'; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo '31'; ?>" onClick="FucChk(<?php echo '31'; ?>)" /></td> 
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo '31'; ?>&nbsp;</td>
   <td class="font1">&nbsp;<?php echo 'ARREAR ESIC'; ?></td>
   <td class="font1r"><?php echo number_format(floatval($res4['ArrEsic'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res5['ArrEsic'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res6['ArrEsic'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res7['ArrEsic'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res8['ArrEsic'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res9['ArrEsic'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res10['ArrEsic'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res11['ArrEsic'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res12['ArrEsic'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res1['ArrEsic'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res2['ArrEsic'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res3['ArrEsic'])); ?>&nbsp;</td>
<?php $TotArrEsic=$res4['ArrEsic']+$res5['ArrEsic']+$res6['ArrEsic']+$res7['ArrEsic']+$res8['ArrEsic']+$res9['ArrEsic']+$res10['ArrEsic']+$res11['ArrEsic']+$res12['ArrEsic']+$res1['ArrEsic']+$res2['ArrEsic']+$res3['ArrEsic']; ?>  
   <td align="right" class="font1" bgcolor="#97CBFF" style="font-size:12px;font-weight:bold;"><?php echo number_format($TotArrEsic); ?>&nbsp;</td> 
</tr>
<?php /**** TDS ****/ ?>
<tr id="TR<?php echo '32'; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo '32'; ?>" onClick="FucChk(<?php echo '32'; ?>)" /></td> 
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo '32'; ?>&nbsp;</td>
   <td class="font1">&nbsp;<?php echo 'TDS'; ?></td>
   <td class="font1r"><?php echo number_format(floatval($res4['Tds'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res5['Tds'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res6['Tds'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res7['Tds'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res8['Tds'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res9['Tds'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res10['Tds'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res11['Tds'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res12['Tds'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res1['Tds'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res2['Tds'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res3['Tds'])); ?>&nbsp;</td>
<?php $TotTds=$res4['Tds']+$res5['Tds']+$res6['Tds']+$res7['Tds']+$res8['Tds']+$res9['Tds']+$res10['Tds']+$res11['Tds']+$res12['Tds']+$res1['Tds']+$res2['Tds']+$res3['Tds']; ?>  
   <td align="right" class="font1" bgcolor="#97CBFF" style="font-size:12px;font-weight:bold;"><?php echo number_format($TotTds); ?>&nbsp;</td> 
</tr>
<?php /**** ded_cea ****/ ?>
<tr id="TR<?php echo '33'; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo '33'; ?>" onClick="FucChk(<?php echo '33'; ?>)" /></td> 
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo '33'; ?>&nbsp;</td>
   <td class="font1">&nbsp;<?php echo 'DEDUCT_CEA'; ?></td>
   <td class="font1r"><?php echo number_format(floatval($res4['Dedcea'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res5['Dedcea'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res6['Dedcea'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res7['Dedcea'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res8['Dedcea'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res9['Dedcea'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res10['Dedcea'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res11['Dedcea'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res12['Dedcea'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res1['Dedcea'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res2['Dedcea'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res3['Dedcea'])); ?>&nbsp;</td>
<?php $TotDedcea=$res4['Dedcea']+$res5['Dedcea']+$res6['Dedcea']+$res7['Dedcea']+$res8['Dedcea']+$res9['Dedcea']+$res10['Dedcea']+$res11['Dedcea']+$res12['Dedcea']+$res1['Dedcea']+$res2['Dedcea']+$res3['Dedcea']; ?>  
   <td align="right" class="font1" bgcolor="#97CBFF" style="font-size:12px;font-weight:bold;"><?php echo number_format($TotDedcea); ?>&nbsp;</td> 
</tr>
<?php /**** ded_mr ****/ ?>
<tr id="TR<?php echo '34'; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo '34'; ?>" onClick="FucChk(<?php echo '34'; ?>)" /></td> 
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo '34'; ?>&nbsp;</td>
   <td class="font1">&nbsp;<?php echo 'DEDUCT_MR'; ?></td>
   <td class="font1r"><?php echo number_format(floatval($res4['Dedma'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res5['Dedma'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res6['Dedma'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res7['Dedma'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res8['Dedma'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res9['Dedma'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res10['Dedma'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res11['Dedma'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res12['Dedma'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res1['Dedma'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res2['Dedma'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res3['Dedma'])); ?>&nbsp;</td>
<?php $TotDedma=$res4['Dedma']+$res5['Dedma']+$res6['Dedma']+$res7['Dedma']+$res8['Dedma']+$res9['Dedma']+$res10['Dedma']+$res11['Dedma']+$res12['Dedma']+$res1['Dedma']+$res2['Dedma']+$res3['Dedma']; ?>  
   <td align="right" class="font1" bgcolor="#97CBFF" style="font-size:12px;font-weight:bold;"><?php echo number_format($TotDedma); ?>&nbsp;</td> 
</tr>
<?php /**** ded_lta ****/ ?>
<tr id="TR<?php echo '35'; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo '35'; ?>" onClick="FucChk(<?php echo '35'; ?>)" /></td> 
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo '35'; ?>&nbsp;</td>
   <td class="font1">&nbsp;<?php echo 'DEDUCT_LTA'; ?></td>
   <td class="font1r"><?php echo number_format(floatval($res4['Dedlta'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res5['Dedlta'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res6['Dedlta'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res7['Dedlta'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res8['Dedlta'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res9['Dedlta'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res10['Dedlta'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res11['Dedlta'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res12['Dedlta'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res1['Dedlta'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res2['Dedlta'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res3['Dedlta'])); ?>&nbsp;</td>
<?php $TotDedlta=$res4['Dedlta']+$res5['Dedlta']+$res6['Dedlta']+$res7['Dedlta']+$res8['Dedlta']+$res9['Dedlta']+$res10['Dedlta']+$res11['Dedlta']+$res12['Dedlta']+$res1['Dedlta']+$res2['Dedlta']+$res3['Dedlta']; ?>  
   <td align="right" class="font1" bgcolor="#97CBFF" style="font-size:12px;font-weight:bold;"><?php echo number_format($TotDedlta); ?>&nbsp;</td> 
</tr>
<?php /**** Value ****/ ?>
<tr id="TR<?php echo '36'; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo '36'; ?>" onClick="FucChk(<?php echo '36'; ?>)" /></td> 
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo '36'; ?>&nbsp;</td>
   <td class="font1">&nbsp;<?php echo 'VAL_CONTRIBUS<sup>n</sup>'; ?></td>
   <td class="font1r"><?php echo number_format(floatval($res4['ValCon'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res5['ValCon'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res6['ValCon'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res7['ValCon'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res8['ValCon'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res9['ValCon'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res10['ValCon'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res11['ValCon'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res12['ValCon'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res1['ValCon'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res2['ValCon'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res3['ValCon'])); ?>&nbsp;</td>
<?php $TotValCon=$res4['ValCon']+$res5['ValCon']+$res6['ValCon']+$res7['ValCon']+$res8['ValCon']+$res9['ValCon']+$res10['ValCon']+$res11['ValCon']+$res12['ValCon']+$res1['ValCon']+$res2['ValCon']+$res3['ValCon']; ?>  
   <td align="right" class="font1" bgcolor="#97CBFF" style="font-size:12px;font-weight:bold;"><?php echo number_format($TotValCon); ?>&nbsp;</td>  
</tr>
<?php /**** ded_adjustment ****/ ?>
<tr id="TR<?php echo '37'; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo '37'; ?>" onClick="FucChk(<?php echo '37'; ?>)" /></td> 
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo '37'; ?>&nbsp;</td>
   <td class="font1">&nbsp;<?php echo 'DEDUCT_ADJUST'; ?></td>
   <td class="font1r"><?php echo number_format(floatval($res4['DedAduj'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res5['DedAduj'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res6['DedAduj'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res7['DedAduj'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res8['DedAduj'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res9['DedAduj'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res10['DedAduj'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res11['DedAduj'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res12['DedAduj'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res1['DedAduj'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res2['DedAduj'])); ?>&nbsp;</td>
   <td class="font1r"><?php echo number_format(floatval($res3['DedAduj'])); ?>&nbsp;</td>
<?php $TotDedAduj=$res4['DedAduj']+$res5['DedAduj']+$res6['DedAduj']+$res7['DedAduj']+$res8['DedAduj']+$res9['DedAduj']+$res10['DedAduj']+$res11['DedAduj']+$res12['DedAduj']+$res1['DedAduj']+$res2['DedAduj']+$res3['DedAduj']; ?>  
   <td align="right" class="font1" bgcolor="#97CBFF" style="font-size:12px;font-weight:bold;"><?php echo number_format($TotDedAduj); ?>&nbsp;</td> 
</tr>


<?php /**** Total Deduct****/ ?>
<?php
$TotDed4=$res4['TotPfEmp']+$res4['ArrPf']+$res4['Esic']+$res4['ArrEsic']+$res4['Tds']+$res4['Dedcea']+$res4['Dedma']+$res4['Dedlta']+$res4['ValCon']+$res4['DedAduj'];
$TotDed5=$res5['TotPfEmp']+$res5['ArrPf']+$res5['Esic']+$res5['ArrEsic']+$res5['Tds']+$res5['Dedcea']+$res5['Dedma']+$res5['Dedlta']+$res5['ValCon']+$res5['DedAduj'];
$TotDed6=$res6['TotPfEmp']+$res6['ArrPf']+$res6['Esic']+$res6['ArrEsic']+$res6['Tds']+$res6['Dedcea']+$res6['Dedma']+$res6['Dedlta']+$res6['ValCon']+$res6['DedAduj'];
$TotDed7=$res7['TotPfEmp']+$res7['ArrPf']+$res7['Esic']+$res7['ArrEsic']+$res7['Tds']+$res7['Dedcea']+$res7['Dedma']+$res7['Dedlta']+$res7['ValCon']+$res7['DedAduj'];
$TotDed8=$res8['TotPfEmp']+$res8['ArrPf']+$res8['Esic']+$res8['ArrEsic']+$res8['Tds']+$res8['Dedcea']+$res8['Dedma']+$res8['Dedlta']+$res8['ValCon']+$res8['DedAduj'];
$TotDed9=$res9['TotPfEmp']+$res9['ArrPf']+$res9['Esic']+$res9['ArrEsic']+$res9['Tds']+$res9['Dedcea']+$res9['Dedma']+$res9['Dedlta']+$res9['ValCon']+$res9['DedAduj'];
$TotDed10=$res10['TotPfEmp']+$res10['ArrPf']+$res10['Esic']+$res10['ArrEsic']+$res10['Tds']+$res10['Dedcea']+$res10['Dedma']+$res10['Dedlta']+$res10['ValCon']+$res10['DedAduj'];
$TotDed11=$res11['TotPfEmp']+$res11['ArrPf']+$res11['Esic']+$res11['ArrEsic']+$res11['Tds']+$res11['Dedcea']+$res11['Dedma']+$res11['Dedlta']+$res11['ValCon']+$res11['DedAduj'];
$TotDed12=$res12['TotPfEmp']+$res12['ArrPf']+$res12['Esic']+$res12['ArrEsic']+$res12['Tds']+$res12['Dedcea']+$res12['Dedma']+$res12['Dedlta']+$res12['ValCon']+$res12['DedAduj'];
$TotDed1=$res1['TotPfEmp']+$res1['ArrPf']+$res1['Esic']+$res1['ArrEsic']+$res1['Tds']+$res1['Dedcea']+$res1['Dedma']+$res1['Dedlta']+$res1['ValCon']+$res1['DedAduj'];
$TotDed2=$res2['TotPfEmp']+$res2['ArrPf']+$res2['Esic']+$res2['ArrEsic']+$res2['Tds']+$res2['Dedcea']+$res2['Dedma']+$res2['Dedlta']+$res2['ValCon']+$res2['DedAduj'];
$TotDed3=$res3['TotPfEmp']+$res3['ArrPf']+$res3['Esic']+$res3['ArrEsic']+$res3['Tds']+$res3['Dedcea']+$res3['Dedma']+$res3['Dedlta']+$res3['ValCon']+$res3['DedAduj'];
?>
<tr id="TR<?php echo '38'; ?>" bgcolor="#FF9BFF">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo '38'; ?>" onClick="FucChk(<?php echo '38'; ?>)" disabled checked/></td>
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo '38'; ?>&nbsp;</td>
   <td class="font1" style="font-size:12px;font-weight:bold;">&nbsp;<?php echo 'TOTAL DEDUCT'; ?></td> 
   <td class="font1br"><?php echo number_format($TotDed4); ?>&nbsp;</td>
   <td align="right" class="font1" style=""><?php echo number_format($TotDed5); ?>&nbsp;</td>
   <td class="font1br"><?php echo number_format($TotDed6); ?>&nbsp;</td>
   <td class="font1br"><?php echo number_format($TotDed7); ?>&nbsp;</td>
   <td class="font1br"><?php echo number_format($TotDed8); ?>&nbsp;</td>
   <td class="font1br"><?php echo number_format($TotDed9); ?>&nbsp;</td>
   <td class="font1br"><?php echo number_format($TotDed10); ?>&nbsp;</td>
   <td class="font1br"><?php echo number_format($TotDed11); ?>&nbsp;</td>
   <td class="font1br"><?php echo number_format($TotDed12); ?>&nbsp;</td>
   <td class="font1br"><?php echo number_format($TotDed1); ?>&nbsp;</td>
   <td class="font1br"><?php echo number_format($TotDed2); ?>&nbsp;</td>
   <td class="font1br"><?php echo number_format($TotDed3); ?>&nbsp;</td>
<?php $TotalDeduct=$TotDed4+$TotDed5+$TotDed6+$TotDed7+$TotDed8+$TotDed9+$TotDed10+$TotDed11+$TotDed12+$TotDed1+$TotDed2+$TotDed3;?>
   <td class="font1br"><?php echo number_format($TotalDeduct); ?>&nbsp;</td>
 </tr>
<?php /**** Total NET AMOUNT ****/ ?>
<?php 
$TotNetAmt4=$TotG4-$TotDed4; $TotNetAmt5=$TotG5-$TotDed5; $TotNetAmt6=$TotG6-$TotDed6; $TotNetAmt7=$TotG7-$TotDed7; $TotNetAmt8=$TotG8-$TotDed8; 
$TotNetAmt9=$TotG9-$TotDed9; $TotNetAmt10=$TotG10-$TotDed10; $TotNetAmt11=$TotG11-$TotDed11; $TotNetAmt12=$TotG12-$TotDed12; $TotNetAmt1=$TotG1-$TotDed1; 
$TotNetAmt2=$TotG2-$TotDed2; $TotNetAmt3=$TotG3-$TotDed3;
?>
 <tr bgcolor="#97CBFF">
   <td align="right" colspan="3" class="font" bgcolor="#7a6189"><b>TOTAL NET_AMOUNT</b>&nbsp;</td>
   <td class="font1br"><?php echo number_format($TotNetAmt4); ?>&nbsp;</td>
   <td class="font1br"><?php echo number_format($TotNetAmt5); ?>&nbsp;</td>
   <td class="font1br"><?php echo number_format($TotNetAmt6); ?>&nbsp;</td>
   <td class="font1br"><?php echo number_format($TotNetAmt7); ?>&nbsp;</td>
   <td class="font1br"><?php echo number_format($TotNetAmt8); ?>&nbsp;</td>
   <td class="font1br"><?php echo number_format($TotNetAmt9); ?>&nbsp;</td>
   <td class="font1br"><?php echo number_format($TotNetAmt10); ?>&nbsp;</td>
   <td class="font1br"><?php echo number_format($TotNetAmt11); ?>&nbsp;</td>
   <td class="font1br"><?php echo number_format($TotNetAmt12); ?>&nbsp;</td>
   <td class="font1br"><?php echo number_format($TotNetAmt1); ?>&nbsp;</td>
   <td class="font1br"><?php echo number_format($TotNetAmt2); ?>&nbsp;</td>
   <td class="font1br"><?php echo number_format($TotNetAmt3); ?>&nbsp;</td>
<?php $TotalNetAmount=$TotNetAmt4+$TotNetAmt5+$TotNetAmt6+$TotNetAmt7+$TotNetAmt8+$TotNetAmt9+$TotNetAmt10+$TotNetAmt11+$TotNetAmt12+$TotNetAmt1+$TotNetAmt2+$TotNetAmt3; ?>  
   <td class="font1br" bgcolor="#A9FF53"><?php echo number_format($TotalNetAmount); ?>&nbsp;</td>
 </tr> 

	 </table>
	  </td>
    </tr>
  </table>  
</td>
<?php //************************** Close Department***********************************?>    
 </tr>
<?php } ?> 
</table>
<?php //**************************************************************************************?>
<?php //*************END*****END*****END******END******END***********************************?>
<?php //**************************************************************************************?>
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