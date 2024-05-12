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
<style> .font { color:#ffffff;font-family:Times New Roman;height:22px;font-size:12px;font-weight:bold;} 
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
<Script type="text/javascript">window.history.forward(1);</Script>
<Script>
function SelectYear(v){window.location='RsAttrition.php?y='+v;}

function PrintAttrition(y,c)
{ window.open("RsAttritionPrint.php?action=PrintAttrition&y="+y+"&c="+c,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=50,height=50");}

function ExportAttrition(y,c)
{ window.open("RsAttritionExport.php?action=RsAttritionExport&y="+y+"&c="+c,"ExportForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}

function FucChk(sn)
{ if(document.getElementById("Chk"+sn).checked==true){document.getElementById("TR"+sn).style.background='#9BEF47'; }
  else if(document.getElementById("Chk"+sn).checked==false){document.getElementById("TR"+sn).style.background='#FFFFFF'; }
}

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
	  <td class="heading" valign="top">Attrition&nbsp;</td>
<?php if($_REQUEST['y']!=0){ $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['y']."", $con); $rY=mysql_fetch_assoc($sY); } 
      $FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; ?>	     
    <td class="td1" style="font-size:14px;width:2000px;font-family:Times New Roman;" valign="top">&nbsp;&nbsp;<b>Year:</b>&nbsp;<select style="font-size:12px; width:100px; background-color:#DDFFBB;" name="YearID" id="YearID" onChange="SelectYear(this.value)">
    
    <?php $sY=mysql_query("select YearId,FromDate,ToDate from hrm_year where YearId<=".$YearId." order by YearId desc",$con); while($rY=mysql_fetch_assoc($sY)){ ?>
    <option value="<?=$rY['YearId']?>" <?php if($_REQUEST['y']==$rY['YearId']){echo "selected";} ?>><?=date("Y",strtotime($rY['FromDate'])).'-'.date("Y",strtotime($rY['ToDate']))?></option>
    <?php } ?>
    <option value="0" <?php if($_REQUEST['y']==0){echo "selected";} ?>>--All--</option>
</select>
   &nbsp;&nbsp;
<?php /*<a href="#" onClick="PrintAttrition(<?php echo $_REQUEST['y'].', '.$CompanyId; ?>)" style="font-size:12px;">Print</a>&nbsp;&nbsp;*/ ?><a href="#" onClick="ExportAttrition(<?php echo $_REQUEST['y'].', '.$CompanyId; ?>)" style="font-size:12px;">Export Excel</a></td>
   </tr>
   </table>
  </td>
 </tr>
<?php if($_SESSION['login']=true){ ?>	
 <tr>
<?php //*********************************************** Open Department******************************************************?> 
<td align="left" id="type" valign="top" style="display:block; width:100%">             
<input type="hidden" id="ey" name="ey" value="<?php echo $_REQUEST['y']; ?>" />  
<table border="0" style="width:1900px;">
<tr>
 <td align="left">
  <table border="1" border="1" bgcolor="#FFFFFF">
  <tr bgcolor="#7a6189">
   <td colspan="2" align="center" class="font" style="width:100px;">Month</td>
   <td align="center" class="font" style="width:40px;">SN</td>
   <td align="center" class="font" style="width:50px;">EC</td>
   <td align="center" class="font" style="width:250px;">Name</td>
   <td align="center" class="font" style="width:100px;">Department</td>
   <td align="center" class="font" style="width:80px;">DOJ</td>
   <td align="center" class="font" style="width:80px;">DOR</td>
   <td align="center" class="font" style="width:80px;">DOS</td>
   <td align="center" class="font" style="width:50px;">Ageing</td>
   <td align="center" class="font" style="width:80px;">F&F Status</td>
   <td align="center" class="font" style="width:80px;">Payment</td>
   <td align="center" class="font" style="width:200px;">Recovery Details</td>
   <td align="center" class="font" style="width:80px;">Total Recovery</td>
   <td align="center" class="font" style="width:100px;">Outstanding</td>
   <td align="center" class="font" style="width:80px;">F&F Date</td>
   <td align="center" class="font" style="width:120px;">Reason For Delay</td>
   <td align="center" class="font" style="width:200px;">Reason For Leaving</td>
   <td align="center" class="font" style="width:150px;">New Employer Name</td>
   <td align="center" class="font" style="width:150px;">New Offer</td>
   <td align="center" class="font" style="width:100px;">New Location</td>
  </tr>
<?php if($_REQUEST['y']!=0){ 
$sql4=mysql_query("select * from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee_separation.EmployeeID=hrm_employee.EmployeeID where Emp_ResignationDate>='".$FD."-04-01' AND Emp_ResignationDate<='".$FD."-04-30' AND hrm_employee.CompanyId=".$CompanyId, $con); $row4=mysql_num_rows($sql4);
$sql5=mysql_query("select * from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee_separation.EmployeeID=hrm_employee.EmployeeID where Emp_ResignationDate>='".$FD."-05-01' AND Emp_ResignationDate<='".$FD."-05-31' AND hrm_employee.CompanyId=".$CompanyId, $con); $row5=mysql_num_rows($sql5);
$sql6=mysql_query("select * from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee_separation.EmployeeID=hrm_employee.EmployeeID where Emp_ResignationDate>='".$FD."-06-01' AND Emp_ResignationDate<='".$FD."-06-30' AND hrm_employee.CompanyId=".$CompanyId, $con); $row6=mysql_num_rows($sql6);
$sql7=mysql_query("select * from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee_separation.EmployeeID=hrm_employee.EmployeeID where Emp_ResignationDate>='".$FD."-07-01' AND Emp_ResignationDate<='".$FD."-07-31' AND hrm_employee.CompanyId=".$CompanyId, $con); $row7=mysql_num_rows($sql7);
$sql8=mysql_query("select * from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee_separation.EmployeeID=hrm_employee.EmployeeID where Emp_ResignationDate>='".$FD."-08-01' AND Emp_ResignationDate<='".$FD."-08-31' AND hrm_employee.CompanyId=".$CompanyId, $con); $row8=mysql_num_rows($sql8);
$sql9=mysql_query("select * from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee_separation.EmployeeID=hrm_employee.EmployeeID where Emp_ResignationDate>='".$FD."-09-01' AND Emp_ResignationDate<='".$FD."-09-30' AND hrm_employee.CompanyId=".$CompanyId, $con); $row9=mysql_num_rows($sql9);
$sql10=mysql_query("select * from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee_separation.EmployeeID=hrm_employee.EmployeeID where Emp_ResignationDate>='".$FD."-10-01' AND Emp_ResignationDate<='".$FD."-10-31' AND hrm_employee.CompanyId=".$CompanyId, $con); $row10=mysql_num_rows($sql10);
$sql11=mysql_query("select * from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee_separation.EmployeeID=hrm_employee.EmployeeID where Emp_ResignationDate>='".$FD."-11-01' AND Emp_ResignationDate<='".$FD."-11-30' AND hrm_employee.CompanyId=".$CompanyId, $con); $row11=mysql_num_rows($sql11);
$sql12=mysql_query("select * from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee_separation.EmployeeID=hrm_employee.EmployeeID where Emp_ResignationDate>='".$FD."-12-01' AND Emp_ResignationDate<='".$FD."-12-31' AND hrm_employee.CompanyId=".$CompanyId, $con); $row12=mysql_num_rows($sql12);
$sql1=mysql_query("select * from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee_separation.EmployeeID=hrm_employee.EmployeeID where Emp_ResignationDate>='".$TD."-01-01' AND Emp_ResignationDate<='".$TD."-01-31' AND hrm_employee.CompanyId=".$CompanyId, $con); $row1=mysql_num_rows($sql1);
$sql2=mysql_query("select * from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee_separation.EmployeeID=hrm_employee.EmployeeID where Emp_ResignationDate>='".$TD."-02-01' AND Emp_ResignationDate<='".$TD."-02-29' AND hrm_employee.CompanyId=".$CompanyId, $con); $row2=mysql_num_rows($sql2);
$sql3=mysql_query("select * from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee_separation.EmployeeID=hrm_employee.EmployeeID where Emp_ResignationDate>='".$TD."-03-01' AND Emp_ResignationDate<='".$TD."-03-31' AND hrm_employee.CompanyId=".$CompanyId, $con); $row3=mysql_num_rows($sql3); 

$sql=mysql_query("select hrm_employee.EmpCode,Fname,Sname,Lname,DepartmentId,DateJoining,DOB,DateOfResignation,DateOfSepration,hrm_employee_separation.* from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee_separation.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where Emp_ResignationDate>='".$FD."-04-01' AND Emp_ResignationDate<='".$TD."-03-31' AND hrm_employee.CompanyId=".$CompanyId." order by hrm_employee_separation.Emp_ResignationDate DESC", $con);
} else { $sql=mysql_query("select hrm_employee.EmpCode,Fname,Sname,Lname,DepartmentId,DateJoining,DOB,DateOfResignation,DateOfSepration,hrm_employee_separation.* from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee_separation.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.CompanyId=".$CompanyId." order by hrm_employee_separation.Emp_ResignationDate DESC", $con); } 
$SNo=1; while($res=mysql_fetch_array($sql)){ 
$m=date('m',strtotime($res['Emp_ResignationDate'])); if($m==4){$mn='APR';}elseif($m==5){$mn='MAY';}elseif($m==6){$mn='JUN';}elseif($m==7){$mn='JUL';}elseif($m==8){$mn='AUG';}elseif($m==9){$mn='SEP';}elseif($m==10){$mn='OCT';}elseif($m==11){$mn='NOV';}elseif($m==12){$mn='DEC';}elseif($m==1){$mn='JAN';}elseif($m==2){$mn='FEB';}elseif($m==3){$mn='MAR';}
$sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'],$con); $resD=mysql_fetch_assoc($sqlD);
$sqlEInt=mysql_query("select ComName,Location,Designation from hrm_employee_separation_exitint where EmpSepId=".$res['EmpSepId'],$con); $resEInt=mysql_fetch_assoc($sqlEInt);
?>
<tr id="TR<?php echo $SNo; ?>">
   <td align="center" style="width:30px;"><input type="checkbox" id="Chk<?php echo $SNo; ?>" onClick="FucChk(<?php echo $SNo; ?>)" /></td>
   <td bgcolor="<?php if($m==1 OR $m==3 OR $m==5 OR $m==7 OR $m==9 OR $m==11){echo '#AE5EFF'; }else{echo '#FFFF9B';} ?>" align="center" class="font1">&nbsp;<?php echo $mn; ?>&nbsp;</td>
   <td align="center" class="font1"><?php echo $SNo; ?></td>
   <td align="center" class="font1"><?php echo $res['EmpCode']; ?></td>
   <td align="" class="font1"><?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
   <td align="" class="font1"><?php echo $resD['DepartmentCode']; ?></td>
   <td align="center" class="font1"><?php echo date("d-m-Y", strtotime($res['DateJoining'])); ?></td>
   <td align="center" class="font1">
   <?php if($res['Emp_ResignationDate']!='1970-01-01' AND $res['Emp_ResignationDate']!='0000-00-00'){echo date("d-m-Y", strtotime($res['Emp_ResignationDate'])); } ?></td>
   <td align="center" class="font1">
   <?php if($res['DateOfSepration']!='1970-01-01' AND $res['DateOfSepration']!='0000-00-00'){echo date("d-m-Y", strtotime($res['DateOfSepration'])); } ?></td>
   <td align="center" class="font1"><?php $date1 = $res['DateJoining']; $date2 = $res['Emp_ResignationDate']; $diff = abs(strtotime($date2) - strtotime($date1));
$years = floor($diff/(365*60*60*24)); $months = floor(($diff-$years*365*60*60*24)/(30*60*60*24)); $days = floor(($diff-$years*365*60*60*24-$months*30*60*60*24)/(60*60*24)); 
$AgeMain=$years.'.'.$months;  echo $AgeMain; ?></td>
   <td align="center" class="font1"><?php if($res['HR_FullFinal_Submit']=='Y'){echo '<font color="#006C00">OK</font>';}else{echo '<font color="#FF6464">PENDING</font>';} ?></td>
   <td align="right" class="font1"><?php if($res['TotalEarn']>$res['TotalDeduct']){echo $res['TotalPayable']; } ?></td>
   
<?php /************/ ?>  
<?php $sqlHr=mysql_query("select * from hrm_employee_separation_nochr where EmpSepId=".$res['EmpSepId'],$con); 
      $sqlAcc=mysql_query("select * from hrm_employee_separation_nocacc where EmpSepId=".$res['EmpSepId'],$con); 
	  $sqlIt=mysql_query("select * from hrm_employee_separation_nocit where EmpSepId=".$res['EmpSepId'],$con);
      $sqlRep=mysql_query("select * from hrm_employee_separation_nocrep where EmpSepId=".$res['EmpSepId'],$con);
	  $resHr=mysql_fetch_assoc($sqlHr); $resAcc=mysql_fetch_assoc($sqlAcc); $resIt=mysql_fetch_assoc($sqlIt); 
      $resRep=mysql_fetch_assoc($sqlRep); ?>
 
 
   <td align="center" class="font1">
   <?php //echo 'aa='.$TotalDeduct=$resHr['TotDeduct']+$resAcc['TotAmt2']+$resIt['TotItAmt']+$TotRepAmt; ?>  
   
   
    <?php if($resHr['AdminIC_Amt']>0){echo 'IDCardRecovery=<font color="#FF0000">'.floatval($resHr['AdminIC_Amt']).'</font>, ';}  ?>
	<?php if($resHr['AdminVC_Amt']>0){echo 'VisitingCardsRecovery=<font color="#FF0000">'.floatval($resHr['AdminVC_Amt']).'</font>, ';}  ?>
	<?php if($resHr['CV_Amt']>0){echo 'ComVehicle=<font color="#FF0000">'.floatval($resHr['CV_Amt']).'</font>, ';}  ?>
	<?php if($resHr['NPR']>0){echo 'NoticePeriod=<font color="#FF0000">'.floatval($resHr['NPR']).'</font>, ';}  ?>
	<?php if($resHr['RTSB']>0){echo 'RecoveryTowardsServiceBond=<font color="#FF0000">'.floatval($resHr['RTSB']).'</font>, ';}  ?>
    <?php if($resHr['VolC']>0){echo 'VolContri=<font color="#FF0000">'.floatval($resHr['VolC']).'</font>, ';}  ?>
    <?php if($resHr['RA_allow']>0){echo 'RA=<font color="#FF0000">'.floatval($resHr['RA_allow']).'</font>, ';}  ?>
    <?php if($resAcc['AccECP_Amt2']>0){echo 'ExpClaimPending=<font color="#FF0000">'.floatval($resAcc['AccECP_Amt2']).'</font>, ';}  ?>
	<?php if($resAcc['AccIPS_Amt2']>0){echo 'InvtProofSub=<font color="#FF0000">'.floatval($resAcc['AccIPS_Amt2']).'</font>, ';}  ?>
	<?php if($resAcc['AccAMS_Amt2']>0){echo 'AdvanceAmtSett=<font color="#FF0000">'.floatval($resAcc['AccAMS_Amt2']).'</font>, ';}  ?>
	<?php if($resAcc['AccSAR_Amt2']>0){echo 'SalaryAdvRecovery=<font color="#FF0000">'.floatval($resAcc['AccSAR_Amt2']).'</font>, ';}  ?>
	<?php if($resAcc['AccWGR_Amt2']>0){echo 'WhiteGoodsRecovery=<font color="#FF0000">'.floatval($resAcc['AccWGR_Amt2']).', ';}  ?>
	<?php if($resAcc['AccSB_Amt2']>0){echo 'ServiceBond=<font color="#FF0000">'.floatval($resAcc['AccSB_Amt2']).'</font>, ';}  ?>
	<?php if($resAcc['AccTDSA_Amt2']>0){echo 'TDSAdjustment=<font color="#FF0000">'.floatval($resAcc['AccTDSA_Amt2']).'</font>, ';}  ?>
	<?php if($resIt['ItCHS_Amt']>0){echo 'ComHandset=<font color="#FF0000">'.floatval($resIt['ItCHS_Amt']).'</font>, ';}  ?>
	<?php if($resIt['ItLDH_Amt']>0){echo 'Laptop/DesktopHandour=<font color="#FF0000">'.floatval($resIt['ItLDH_Amt']).'</font>, ';}  ?>
	<?php if($resIt['ItCS_Amt']>0){echo 'CameraSub=<font color="#FF0000">'.floatval($resIt['ItCS_Amt']).', ';}  ?>
	<?php if($resIt['ItDC_Amt']>0){echo 'DataCard=<font color="#FF0000">'.floatval($resIt['ItDC_Amt']).', ';}  ?>
	<?php $RepTotAmt=$resRep['DDH_Amt']+$resRep['TID_Amt']+$resRep['APTC_Amt']+$resRep['HOAS_Amt'];
	$TotRepAmt=$resRep['Prtis_1Amt']+$resRep['Prtis_2Amt']+$resRep['Prtis_3Amt']+$resRep['Prtis_4Amt']+$resRep['Prtis_5Amt']+$resRep['Prtis_6Amt']+$resRep['Prtis_7Amt']+$resRep['Prtis_8Amt']+$resRep['Prtis_9Amt']+$resRep['Prtis_10Amt']+$resRep['Prtis_11Amt']+$resRep['Prtis_12Amt']+$resRep['Prtis_13Amt']+$resRep['Prtis_14Amt']+$resRep['Prtis_15Amt']+$resRep['Prtis_16Amt']+$resRep['Prtis_17Amt']+$resRep['Prtis_18Amt']+$resRep['Prtis_19Amt']+$resRep['Prtis_20Amt']+$resRep['Prtis_21Amt']+$resRep['Prtis_22Amt']+$resRep['Prtis_23Amt']+$resRep['Prtis_24Amt']+$resRep['Prtis_25Amt']+$resRep['Prtis_26Amt']+$resRep['Prtis_27Amt']+$resRep['Prtis_28Amt']+$resRep['Prtis_29Amt']+$resRep['Prtis_30Amt']+$resRep['Prtis_31Amt']+$resRep['Prtis_32Amt']+$resRep['Prtis_33Amt']+$resRep['Prtis_34Amt']+$resRep['Prtis_35Amt']+$resRep['Prtis_36Amt']+$resRep['Prtis_37Amt']+$resRep['Prtis_38Amt']+$resRep['Prtis_39Amt']+$resRep['Prtis_40Amt']+$RepTotAmt; ?>
	<?php if($RepTotAmt>0){echo 'RecoveryFromReporting=<font color="#FF0000">'.floatval($RepTotAmt).'</font>, ';}  ?>
	
   
   </td>
<?php /************/ ?>      
   
   <td align="right" class="font1"><?php if($res['TotalEarn']<$res['TotalDeduct']){echo $res['TotalPayable']; } ?></td>
   <td align="center" class="font1"><?php echo ''; ?></td>
   <td align="center" class="font1">
   <?php if($res['FullFinalDate']!='1970-01-01' AND $res['FullFinalDate']!='0000-00-00'){echo date("d-m-Y", strtotime($res['FullFinalDate'])); } ?></td>
   <td align="" class="font1">
   <?php if($res['HR_FullFinal_Submit']=='N'){  
   
   if($res['Rep_Approved']=='N' AND $res['Hod_Approved']=='N'){echo 'Approval';}
   elseif($res['HR_Approved']=='N'){echo 'Approval Pending';}
   elseif($res['DepartmentId']!=6 AND ($res['Rep_NOC']=='N' OR $res['IT_NOC']=='N' OR $res['HR_NOC']=='N' OR $res['Acc_NOC']=='N')){echo 'NOC Clearance';}
   elseif($res['DepartmentId']==6 AND ($res['Rep_NOC']=='N' OR $res['Log_NOC']=='N' OR $res['IT_NOC']=='N' OR $res['HR_NOC']=='N' OR $res['Acc_NOC']=='N')){echo 'NOC Clearance';}
   else{echo 'F&F Pending';}
   } ?>
   </td>
   <td align="" class="font1"><input class="InputText" style="width:200px;" value="<?php echo $res['Emp_Reason']; ?>"/></td>
   <td align="" class="font1"><input class="InputText" style="width:150px;" value="<?php echo $resEInt['ComName']; ?>"/></td>
   <td align="" class="font1"><input class="InputText" style="width:150px;" value="<?php echo $resEInt['Designation']; ?>"/></td>
   <td align="" class="font1"><input class="InputText" style="width:100px;" value="<?php echo $resEInt['Location']; ?>"/></td>
  </tr>
 <?php $SNo++;} ?>
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