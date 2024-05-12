<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
$LastYId=$YearId-1;
$Ei=$EmployeeId; if($_REQUEST['yi']>0){$Yi=$_REQUEST['yi'];}else{$Yi=$YearId;}
$sqlY=mysql_query("select * from hrm_year where YearId=".$Yi, $con); $resY=mysql_fetch_assoc($sqlY); 
$FromY=date("Y", strtotime($resY['FromDate'])); $ToY=date("Y", strtotime($resY['ToDate'])); 

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.All_80H{font-size:12px;height:20px;width:80px;text-align:center;color:#FFFFFF;font-family:Times New Roman;}.All_80{font-size:12px;height:20px;width:80px;text-align:right;font-family:Times New Roman;}.All_200H{font-size:12px;height:20px;width:200px;text-align:center;color:#FFFFFF;font-family:Times New Roman;}.All_200{font-size:14px;height:20px;width:200px;font-family:Times New Roman;}
</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function FunPrint(yi,ei)
{ window.open("AsrDetailsPrint.php?action=Print&ei="+ei+"&yi="+yi+"&ci="+document.getElementById("ComID").value+"&yearid="+document.getElementById("YearId").value,"PrintForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=1000,height=400"); }
</script>

</head>
<body class="body">
<input type="hidden" id="ComID" value="<?php echo $CompanyId; ?>" >
<input type="hidden" id="YearId" value="<?php echo $YearId; ?>" >
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px;">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top">
	     <table border="0" style="width:100%; height:380px; float:none;" cellpadding="0">
		  <tr>
		   <td valign="top"> 
		   
<?php //******************************************************************************************** ?>	   
<table border="0" id="Activity">
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
<td align="left" width="850" valign="top">
<?php if($resMK['Payslip']=='Y') { ?>	
<table>
<tr>
 <td style="font-family:Times New Roman;font-size:18px;"><b>&nbsp;Anuual Salary</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <?php if($Yi==$LastYId){?>[<a href="AsrDetails.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&yi=<?php echo $YearId; ?>&wew=e%e@er%rdd=012&m=3">Curr.Year</a>]
 <?php } if($Yi==$YearId){?>[<a href="AsrDetails.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&yi=<?php echo $LastYId; ?>&wew=e%e@er%rdd=012&m=3">LastYear</a>]
 <?php } ?>
 &nbsp;&nbsp;/&nbsp;&nbsp;<a href="#" onClick="FunPrint(<?php echo $Yi.','.$Ei; ?>)"/>Print</a></td>
 
</tr>
<?php $sqlPayM=mysql_query("select * from hrm_employee_key_paymonth where CompanyId=".$CompanyId, $con); $SNo=1; $resPayM=mysql_fetch_array($sqlPayM); ?>
<tr>
 <td>
   <table border="1" width="1050">
<tr bgcolor="#7a6189">
<td class="All_200H"><b>Payment Head</b></td><td class="All_80H"><b>APR</b></td><td class="All_80H"><b>MAY</b></td><td class="All_80H"><b>JUN</b></td><td class="All_80H"><b>JUL</b></td><td class="All_80H"><b>AUG</b></td><td class="All_80H"><b>SEP</b></td><td class="All_80H"><b>OCT</b></td><td class="All_80H"><b>NOV</b></td><td class="All_80H"><b>DEC</b></td><td class="All_80H"><b>JAN</b></td><td class="All_80H"><b>FEB</b></td><td class="All_80H"><b>MAR</b></td><td class="All_80H"><b>Total</b></td>
</tr>
<?php 
if($Yi==$LastYId)
{ 
  if(date("m")==1 OR date("m")==2 OR date("m")==3)
  { $PayT1='hrm_employee_monthlypayslip_'.$FromY; $PayT2='hrm_employee_monthlypayslip_'.$ToY; }
  else{ $PayT1='hrm_employee_monthlypayslip_'.$FromY; $PayT2='hrm_employee_monthlypayslip'; }
 
 $Sql_4=mysql_query("select * from ".$PayT1." where Month=4 AND EmployeeID=".$Ei." AND Year=".$FromY); 
 $Row_4=mysql_num_rows($Sql_4); if($Row_4>0){$Res_4=mysql_fetch_assoc($Sql_4);}
 $Sql_5=mysql_query("select * from ".$PayT1." where Month=5 AND EmployeeID=".$Ei." AND Year=".$FromY); 
 $Row_5=mysql_num_rows($Sql_5); if($Row_5>0){$Res_5=mysql_fetch_assoc($Sql_5);} 
 $Sql_6=mysql_query("select * from ".$PayT1." where Month=6 AND EmployeeID=".$Ei." AND Year=".$FromY); 
 $Row_6=mysql_num_rows($Sql_6); if($Row_6>0){$Res_6=mysql_fetch_assoc($Sql_6);}
 $Sql_7=mysql_query("select * from ".$PayT1." where Month=7 AND EmployeeID=".$Ei." AND Year=".$FromY); 
 $Row_7=mysql_num_rows($Sql_7); if($Row_7>0){$Res_7=mysql_fetch_assoc($Sql_7);}
 $Sql_8=mysql_query("select * from ".$PayT1." where Month=8 AND EmployeeID=".$Ei." AND Year=".$FromY); 
 $Row_8=mysql_num_rows($Sql_8); if($Row_8>0){$Res_8=mysql_fetch_assoc($Sql_8);}
 $Sql_9=mysql_query("select * from ".$PayT1." where Month=9 AND EmployeeID=".$Ei." AND Year=".$FromY); 
 $Row_9=mysql_num_rows($Sql_9); if($Row_9>0){$Res_9=mysql_fetch_assoc($Sql_9);} 
 $Sql_10=mysql_query("select * from ".$PayT1." where Month=10 AND EmployeeID=".$Ei." AND Year=".$FromY); 
 $Row_10=mysql_num_rows($Sql_10); if($Row_10>0){$Res_10=mysql_fetch_assoc($Sql_10);} 
 $Sql_11=mysql_query("select * from ".$PayT1." where Month=11 AND EmployeeID=".$Ei." AND Year=".$FromY); 
 $Row_11=mysql_num_rows($Sql_11); if($Row_11>0){$Res_11=mysql_fetch_assoc($Sql_11);}
 $Sql_12=mysql_query("select * from ".$PayT1." where Month=12 AND EmployeeID=".$Ei." AND Year=".$FromY); 
 $Row_12=mysql_num_rows($Sql_12); if($Row_12>0){$Res_12=mysql_fetch_assoc($Sql_12);} 
 $Sql_1=mysql_query("select * from ".$PayT2." where Month=1 AND EmployeeID=".$Ei." AND Year=".$ToY); 
 $Row_1=mysql_num_rows($Sql_1); if($Row_1>0){$Res_1=mysql_fetch_assoc($Sql_1);} 
 $Sql_2=mysql_query("select * from ".$PayT2." where Month=2 AND EmployeeID=".$Ei." AND Year=".$ToY); 
 $Row_2=mysql_num_rows($Sql_2); if($Row_2>0){$Res_2=mysql_fetch_assoc($Sql_2);} 
 $Sql_3=mysql_query("select * from ".$PayT2." where Month=3 AND EmployeeID=".$Ei." AND Year=".$ToY); 
 $Row_3=mysql_num_rows($Sql_3); if($Row_3>0){$Res_3=mysql_fetch_assoc($Sql_3);} 
}
else
{
  if(date("m")==1)
  { $PayT1='hrm_employee_monthlypayslip'; $PayT2='hrm_employee_monthlypayslip'; }
  if(date("m")==2 OR date("m")==3)
  { $PayT1='hrm_employee_monthlypayslip_'.$FromY; $PayT2='hrm_employee_monthlypayslip'; }
  else{ $PayT1='hrm_employee_monthlypayslip'; $PayT2='hrm_employee_monthlypayslip'; }
 
 if($resPayM['Apr']=='Y'){ $Sql_4=mysql_query("select * from ".$PayT1." where Month=4 AND EmployeeID=".$Ei." AND Year=".$FromY); $Row_4=mysql_num_rows($Sql_4); if($Row_4>0){$Res_4=mysql_fetch_assoc($Sql_4);}
 } if($resPayM['May']=='Y'){ $Sql_5=mysql_query("select * from ".$PayT1." where Month=5 AND EmployeeID=".$Ei." AND Year=".$FromY); $Row_5=mysql_num_rows($Sql_5); if($Row_5>0){$Res_5=mysql_fetch_assoc($Sql_5);} 
 } if($resPayM['Jun']=='Y'){ $Sql_6=mysql_query("select * from ".$PayT1." where Month=6 AND EmployeeID=".$Ei." AND Year=".$FromY); $Row_6=mysql_num_rows($Sql_6); if($Row_6>0){$Res_6=mysql_fetch_assoc($Sql_6);}
 } if($resPayM['Jul']=='Y'){ $Sql_7=mysql_query("select * from ".$PayT1." where Month=7 AND EmployeeID=".$Ei." AND Year=".$FromY); $Row_7=mysql_num_rows($Sql_7); if($Row_7>0){$Res_7=mysql_fetch_assoc($Sql_7);}
 } if($resPayM['Aug']=='Y'){ $Sql_8=mysql_query("select * from ".$PayT1." where Month=8 AND EmployeeID=".$Ei." AND Year=".$FromY); $Row_8=mysql_num_rows($Sql_8); if($Row_8>0){$Res_8=mysql_fetch_assoc($Sql_8);}
 } if($resPayM['Sep']=='Y'){ $Sql_9=mysql_query("select * from ".$PayT1." where Month=9 AND EmployeeID=".$Ei." AND Year=".$FromY); $Row_9=mysql_num_rows($Sql_9); if($Row_9>0){$Res_9=mysql_fetch_assoc($Sql_9);} 
 } if($resPayM['Oct']=='Y'){ $Sql_10=mysql_query("select * from ".$PayT1." where Month=10 AND EmployeeID=".$Ei." AND Year=".$FromY); $Row_10=mysql_num_rows($Sql_10); if($Row_10>0){$Res_10=mysql_fetch_assoc($Sql_10);} 
 } if($resPayM['Nov']=='Y'){ $Sql_11=mysql_query("select * from ".$PayT1." where Month=11 AND EmployeeID=".$Ei." AND Year=".$FromY); $Row_11=mysql_num_rows($Sql_11); if($Row_11>0){$Res_11=mysql_fetch_assoc($Sql_11);}
 } if($resPayM['Decm']=='Y'){ $Sql_12=mysql_query("select * from ".$PayT1." where Month=12 AND EmployeeID=".$Ei." AND Year=".$FromY); $Row_12=mysql_num_rows($Sql_12); if($Row_12>0){$Res_12=mysql_fetch_assoc($Sql_12);} 
 } if($resPayM['Jan']=='Y'){ $Sql_1=mysql_query("select * from ".$PayT2." where Month=1 AND EmployeeID=".$Ei." AND Year=".$ToY); $Row_1=mysql_num_rows($Sql_1); if($Row_1>0){$Res_1=mysql_fetch_assoc($Sql_1);} 
 } if($resPayM['Feb']=='Y'){ $Sql_2=mysql_query("select * from ".$PayT2." where Month=2 AND EmployeeID=".$Ei." AND Year=".$ToY); $Row_2=mysql_num_rows($Sql_2); if($Row_2>0){$Res_2=mysql_fetch_assoc($Sql_2);} 
 } if($resPayM['Mar']=='Y'){ $Sql_3=mysql_query("select * from ".$PayT2." where Month=3 AND EmployeeID=".$Ei." AND Year=".$ToY); $Row_3=mysql_num_rows($Sql_3); if($Row_3>0){$Res_3=mysql_fetch_assoc($Sql_3);} 
 }

}

?> 

<tr bgcolor="#FFFFFF">
<td class="All_200">&nbsp;Basic</td>
<td class="All_80"><?php echo intval($Res_4['Basic']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_5['Basic']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_6['Basic']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_7['Basic']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_8['Basic']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_9['Basic']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_10['Basic']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_11['Basic']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_12['Basic']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_1['Basic']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_2['Basic']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_3['Basic']); ?>&nbsp;</td><td class="All_80" bgcolor="#55AAFF"><b><?php echo intval($Res_4['Basic']+$Res_5['Basic']+$Res_6['Basic']+$Res_7['Basic']+$Res_8['Basic']+$Res_9['Basic']+$Res_10['Basic']+$Res_11['Basic']+$Res_12['Basic']+$Res_1['Basic']+$Res_2['Basic']+$Res_3['Basic']); ?></b>&nbsp;</td>
</tr>
<tr bgcolor="#FFFFFF">
<td class="All_200">&nbsp;Conveyance Allowance</td>
<td class="All_80"><?php echo intval($Res_4['Convance']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_5['Convance']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_6['Convance']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_7['Convance']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_8['Convance']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_9['Convance']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_10['Convance']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_11['Convance']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_12['Convance']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_1['Convance']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_2['Convance']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_3['Convance']); ?>&nbsp;</td><td class="All_80" bgcolor="#55AAFF"><b><?php echo intval($Res_4['Convance']+$Res_5['Convance']+$Res_6['Convance']+$Res_7['Convance']+$Res_8['Convance']+$Res_9['Convance']+$Res_10['Convance']+$Res_11['Convance']+$Res_12['Convance']+$Res_1['Convance']+$Res_2['Convance']+$Res_3['Convance']); ?></b>&nbsp;</td>
</tr>
<tr bgcolor="#FFFFFF">
<td class="All_200">&nbsp;Transport Allowance</td>
<td class="All_80"><?php echo intval($Res_4['TA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_5['TA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_6['TA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_7['TA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_8['TA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_9['TA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_10['TA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_11['TA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_12['TA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_1['TA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_2['TA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_3['TA']); ?>&nbsp;</td><td class="All_80" bgcolor="#55AAFF"><b><?php echo intval($Res_4['TA']+$Res_5['TA']+$Res_6['TA']+$Res_7['TA']+$Res_8['TA']+$Res_9['TA']+$Res_10['TA']+$Res_11['TA']+$Res_12['TA']+$Res_1['TA']+$Res_2['TA']+$Res_3['TA']); ?></b>&nbsp;</td>
</tr>


<tr bgcolor="#FFFFFF">
<td class="All_200">&nbsp;House Rent Allowance</td>
<td class="All_80"><?php echo intval($Res_4['Hra']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_5['Hra']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_6['Hra']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_7['Hra']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_8['Hra']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_9['Hra']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_10['Hra']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_11['Hra']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_12['Hra']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_1['Hra']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_2['Hra']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_3['Hra']); ?>&nbsp;</td>	
<td class="All_80" bgcolor="#55AAFF"><b><?php echo intval($Res_4['Hra']+$Res_5['Hra']+$Res_6['Hra']+$Res_7['Hra']+$Res_8['Hra']+$Res_9['Hra']+$Res_10['Hra']+$Res_11['Hra']+$Res_12['Hra']+$Res_1['Hra']+$Res_2['Hra']+$Res_3['Hra']); ?></b>&nbsp;</td>
</tr>
<tr bgcolor="#FFFFFF">
<td class="All_200">&nbsp;Special Allowance</td>
<td class="All_80"><?php echo intval($Res_4['Special']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_5['Special']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_6['Special']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_7['Special']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_8['Special']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_9['Special']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_10['Special']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_11['Special']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_12['Special']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_1['Special']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_2['Special']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_3['Special']); ?>&nbsp;</td><td class="All_80" bgcolor="#55AAFF"><b><?php echo intval($Res_4['Special']+$Res_5['Special']+$Res_6['Special']+$Res_7['Special']+$Res_8['Special']+$Res_9['Special']+$Res_10['Special']+$Res_11['Special']+$Res_12['Special']+$Res_1['Special']+$Res_2['Special']+$Res_3['Special']); ?></b>&nbsp;</td>
</tr>
<?php if($Res_4['Bonus']>0 OR $Res_5['Bonus']>0 OR $Res_6['Bonus']>0 OR $Res_7['Bonus']>0 OR $Res_8['Bonus']>0 OR $Res_9['Bonus']>0 OR $Res_10['Bonus']>0 OR $Res_11['Bonus']>0 OR $Res_12['Bonus']>0 OR $Res_1['Bonus']>0 OR $Res_2['Bonus']>0 OR $Res_3['Bonus']>0){ ?>
<tr bgcolor="#FFFFFF">
<td class="All_200">&nbsp;Bonus/ Exgeatia</td>
<td class="All_80"><?php echo intval($Res_4['Bonus']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_5['Bonus']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_6['Bonus']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_7['Bonus']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_8['Bonus']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_9['Bonus']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_10['Bonus']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_11['Bonus']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_12['Bonus']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_1['Bonus']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_2['Bonus']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_3['Bonus']); ?>&nbsp;</td><td class="All_80" bgcolor="#55AAFF"><b><?php echo intval($Res_4['Bonus']+$Res_5['Bonus']+$Res_6['Bonus']+$Res_7['Bonus']+$Res_8['Bonus']+$Res_9['Bonus']+$Res_10['Bonus']+$Res_11['Bonus']+$Res_12['Bonus']+$Res_1['Bonus']+$Res_2['Bonus']+$Res_3['Bonus']); ?></b>&nbsp;</td>
</tr>
<?php } if($Res_4['DA']>0 OR $Res_5['DA']>0 OR $Res_6['DA']>0 OR $Res_7['DA']>0 OR $Res_8['DA']>0 OR $Res_9['DA']>0 OR $Res_10['DA']>0 OR $Res_11['DA']>0 OR $Res_12['DA']>0 OR $Res_1['DA']>0 OR $Res_2['DA']>0 OR $Res_3['DA']>0){ ?>
<tr bgcolor="#FFFFFF">
<td class="All_200">&nbsp;DA</td>
<td class="All_80"><?php echo intval($Res_4['DA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_5['DA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_6['DA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_7['DA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_8['DA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_9['DA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_10['DA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_11['DA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_12['DA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_1['DA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_2['DA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_3['DA']); ?>&nbsp;</td><td class="All_80" bgcolor="#55AAFF"><b><?php echo intval($Res_4['DA']+$Res_5['DA']+$Res_6['DA']+$Res_7['DA']+$Res_8['DA']+$Res_9['DA']+$Res_10['DA']+$Res_11['DA']+$Res_12['DA']+$Res_1['DA']+$Res_2['DA']+$Res_3['DA']); ?></b>&nbsp;</td>
</tr>
<?php } if($Res_4['LeaveEncash']>0 OR $Res_5['LeaveEncash']>0 OR $Res_6['LeaveEncash']>0 OR $Res_7['LeaveEncash']>0 OR $Res_8['LeaveEncash']>0 OR $Res_9['LeaveEncash']>0 OR $Res_10['LeaveEncash']>0 OR $Res_11['LeaveEncash']>0 OR $Res_12['LeaveEncash']>0 OR $Res_1['LeaveEncash']>0 OR $Res_2['LeaveEncash']>0 OR $Res_3['LeaveEncash']>0){ ?>
<tr bgcolor="#FFFFFF">
<td class="All_200">&nbsp;Leave Encash</td>
<td class="All_80"><?php echo intval($Res_4['LeaveEncash']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_5['LeaveEncash']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_6['LeaveEncash']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_7['LeaveEncash']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_8['LeaveEncash']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_9['LeaveEncash']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_10['LeaveEncash']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_11['LeaveEncash']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_12['LeaveEncash']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_1['LeaveEncash']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_2['LeaveEncash']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_3['LeaveEncash']); ?>&nbsp;</td><td class="All_80" bgcolor="#55AAFF"><b><?php echo intval($Res_4['LeaveEncash']+$Res_5['LeaveEncash']+$Res_6['LeaveEncash']+$Res_7['LeaveEncash']+$Res_8['LeaveEncash']+$Res_9['LeaveEncash']+$Res_10['LeaveEncash']+$Res_11['LeaveEncash']+$Res_12['LeaveEncash']+$Res_1['LeaveEncash']+$Res_2['LeaveEncash']+$Res_3['LeaveEncash']); ?></b>&nbsp;</td>
</tr>
<?php } if($Res_4['Arreares']>0 OR $Res_5['Arreares']>0 OR $Res_6['Arreares']>0 OR $Res_7['Arreares']>0 OR $Res_8['Arreares']>0 OR $Res_9['Arreares']>0 OR $Res_10['Arreares']>0 OR $Res_11['Arreares']>0 OR $Res_12['Arreares']>0 OR $Res_1['Arreares']>0 OR $Res_2['Arreares']>0 OR $Res_3['Arreares']>0){ ?>
<tr bgcolor="#FFFFFF">
<td class="All_200">&nbsp;Arrear</td>
<td class="All_80"><?php echo intval($Res_4['Arreares']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_5['Arreares']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_6['Arreares']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_7['Arreares']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_8['Arreares']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_9['Arreares']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_10['Arreares']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_11['Arreares']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_12['Arreares']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_1['Arreares']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_2['Arreares']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_3['Arreares']); ?>&nbsp;</td><td class="All_80" bgcolor="#55AAFF"><b><?php echo intval($Res_4['Arreares']+$Res_5['Arreares']+$Res_6['Arreares']+$Res_7['Arreares']+$Res_8['Arreares']+$Res_9['Arreares']+$Res_10['Arreares']+$Res_11['Arreares']+$Res_12['Arreares']+$Res_1['Arreares']+$Res_2['Arreares']+$Res_3['Arreares']); ?></b>&nbsp;</td>
</tr>
<?php } if($Res_4['Incentive']>0 OR $Res_5['Incentive']>0 OR $Res_6['Incentive']>0 OR $Res_7['Incentive']>0 OR $Res_8['Incentive']>0 OR $Res_9['Incentive']>0 OR $Res_10['Incentive']>0 OR $Res_11['Incentive']>0 OR $Res_12['Incentive']>0 OR $Res_1['Incentive']>0 OR $Res_2['Incentive']>0 OR $Res_3['Incentive']>0){ ?>
<tr bgcolor="#FFFFFF">
<td class="All_200">&nbsp;Incentive</td>
<td class="All_80"><?php echo intval($Res_4['Incentive']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_5['Incentive']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_6['Incentive']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_7['Incentive']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_8['Incentive']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_9['Incentive']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_10['Incentive']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_11['Incentive']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_12['Incentive']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_1['Incentive']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_2['Incentive']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_3['Incentive']); ?>&nbsp;</td><td class="All_80" bgcolor="#55AAFF"><b><?php echo intval($Res_4['Incentive']+$Res_5['Incentive']+$Res_6['Incentive']+$Res_7['Incentive']+$Res_8['Incentive']+$Res_9['Incentive']+$Res_10['Incentive']+$Res_11['Incentive']+$Res_12['Incentive']+$Res_1['Incentive']+$Res_2['Incentive']+$Res_3['Incentive']); ?></b>&nbsp;</td>
</tr>
<?php } if($Res_4['VariableAdjustment']>0 OR $Res_5['VariableAdjustment']>0 OR $Res_6['VariableAdjustment']>0 OR $Res_7['VariableAdjustment']>0 OR $Res_8['VariableAdjustment']>0 OR $Res_9['VariableAdjustment']>0 OR $Res_10['VariableAdjustment']>0 OR $Res_11['VariableAdjustment']>0 OR $Res_12['VariableAdjustment']>0 OR $Res_1['VariableAdjustment']>0 OR $Res_2['VariableAdjustment']>0 OR $Res_3['VariableAdjustment']>0){ ?>
<tr bgcolor="#FFFFFF">
<td class="All_200">&nbsp;Variable Adjustment</td>
<td class="All_80"><?php echo intval($Res_4['VariableAdjustment']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_5['VariableAdjustment']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_6['VariableAdjustment']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_7['VariableAdjustment']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_8['VariableAdjustment']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_9['VariableAdjustment']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_10['VariableAdjustment']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_11['VariableAdjustment']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_12['VariableAdjustment']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_1['VariableAdjustment']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_2['VariableAdjustment']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_3['VariableAdjustment']); ?>&nbsp;</td><td class="All_80" bgcolor="#55AAFF"><b><?php echo intval($Res_4['VariableAdjustment']+$Res_5['VariableAdjustment']+$Res_6['VariableAdjustment']+$Res_7['VariableAdjustment']+$Res_8['VariableAdjustment']+$Res_9['VariableAdjustment']+$Res_10['VariableAdjustment']+$Res_11['VariableAdjustment']+$Res_12['VariableAdjustment']+$Res_1['VariableAdjustment']+$Res_2['VariableAdjustment']+$Res_3['VariableAdjustment']); ?></b>&nbsp;</td>
</tr>
<?php } if($Res_4['PerformancePay']>0 OR $Res_5['PerformancePay']>0 OR $Res_6['PerformancePay']>0 OR $Res_7['PerformancePay']>0 OR $Res_8['PerformancePay']>0 OR $Res_9['PerformancePay']>0 OR $Res_10['PerformancePay']>0 OR $Res_11['PerformancePay']>0 OR $Res_12['PerformancePay']>0 OR $Res_1['PerformancePay']>0 OR $Res_2['PerformancePay']>0 OR $Res_3['PerformancePay']>0){ ?>
<tr bgcolor="#FFFFFF">
<td class="All_200">&nbsp;Performance Pay</td>
<td class="All_80"><?php echo intval($Res_4['PerformancePay']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_5['PerformancePay']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_6['PerformancePay']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_7['PerformancePay']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_8['PerformancePay']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_9['PerformancePay']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_10['PerformancePay']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_11['PerformancePay']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_12['PerformancePay']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_1['PerformancePay']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_2['PerformancePay']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_3['PerformancePay']); ?>&nbsp;</td><td class="All_80" bgcolor="#55AAFF"><b><?php echo intval($Res_4['PerformancePay']+$Res_5['PerformancePay']+$Res_6['PerformancePay']+$Res_7['PerformancePay']+$Res_8['PerformancePay']+$Res_9['PerformancePay']+$Res_10['PerformancePay']+$Res_11['PerformancePay']+$Res_12['PerformancePay']+$Res_1['PerformancePay']+$Res_2['PerformancePay']+$Res_3['PerformancePay']); ?></b>&nbsp;</td>
</tr>
<?php } if($Res_4['CCA']>0 OR $Res_5['CCA']>0 OR $Res_6['CCA']>0 OR $Res_7['CCA']>0 OR $Res_8['CCA']>0 OR $Res_9['CCA']>0 OR $Res_10['CCA']>0 OR $Res_11['CCA']>0 OR $Res_12['CCA']>0 OR $Res_1['CCA']>0 OR $Res_2['CCA']>0 OR $Res_3['CCA']>0){ ?>
<tr bgcolor="#FFFFFF">
<td class="All_200">&nbsp;City Compensatory Allowance</td>
<td class="All_80"><?php echo intval($Res_4['CCA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_5['CCA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_6['CCA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_7['CCA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_8['CCA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_9['CCA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_10['CCA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_11['CCA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_12['CCA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_1['CCA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_2['CCA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_3['CCA']); ?>&nbsp;</td><td class="All_80" bgcolor="#55AAFF"><b><?php echo intval($Res_4['CCA']+$Res_5['CCA']+$Res_6['CCA']+$Res_7['CCA']+$Res_8['CCA']+$Res_9['CCA']+$Res_10['CCA']+$Res_11['CCA']+$Res_12['CCA']+$Res_1['CCA']+$Res_2['CCA']+$Res_3['CCA']); ?></b>&nbsp;</td>
</tr>
<?php } if($Res_4['RA']>0 OR $Res_5['RA']>0 OR $Res_6['RA']>0 OR $Res_7['RA']>0 OR $Res_8['RA']>0 OR $Res_9['RA']>0 OR $Res_10['RA']>0 OR $Res_11['RA']>0 OR $Res_12['RA']>0 OR $Res_1['RA']>0 OR $Res_2['RA']>0 OR $Res_3['RA']>0){ ?>
<tr bgcolor="#FFFFFF">
<td class="All_200">&nbsp;Relocation Allownace</td>
<td class="All_80"><?php echo intval($Res_4['RA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_5['RA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_6['RA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_7['RA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_8['RA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_9['RA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_10['RA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_11['RA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_12['RA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_1['RA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_2['RA']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_3['RA']); ?>&nbsp;</td><td class="All_80" bgcolor="#55AAFF"><b><?php echo intval($Res_4['RA']+$Res_5['RA']+$Res_6['RA']+$Res_7['RA']+$Res_8['RA']+$Res_9['RA']+$Res_10['RA']+$Res_11['RA']+$Res_12['RA']+$Res_1['RA']+$Res_2['RA']+$Res_3['RA']); ?></b>&nbsp;</td>
</tr>
<?php } if($Res_4['Arr_Basic']>0 OR $Res_5['Arr_Basic']>0 OR $Res_6['Arr_Basic']>0 OR $Res_7['Arr_Basic']>0 OR $Res_8['Arr_Basic']>0 OR $Res_9['Arr_Basic']>0 OR $Res_10['Arr_Basic']>0 OR $Res_11['Arr_Basic']>0 OR $Res_12['Arr_Basic']>0 OR $Res_1['Arr_Basic']>0 OR $Res_2['Arr_Basic']>0 OR $Res_3['Arr_Basic']>0){ ?>
<tr bgcolor="#FFFFFF">
<td class="All_200">&nbsp;Arrear Basic</td>
<td class="All_80"><?php echo intval($Res_4['Arr_Basic']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_5['Arr_Basic']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_6['Arr_Basic']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_7['Arr_Basic']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_8['Arr_Basic']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_9['Arr_Basic']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_10['Arr_Basic']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_11['Arr_Basic']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_12['Arr_Basic']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_1['Arr_Basic']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_2['Arr_Basic']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_3['Arr_Basic']); ?>&nbsp;</td><td class="All_80" bgcolor="#55AAFF"><b><?php echo intval($Res_4['Arr_Basic']+$Res_5['Arr_Basic']+$Res_6['Arr_Basic']+$Res_7['Arr_Basic']+$Res_8['Arr_Basic']+$Res_9['Arr_Basic']+$Res_10['Arr_Basic']+$Res_11['Arr_Basic']+$Res_12['Arr_Basic']+$Res_1['Arr_Basic']+$Res_2['Arr_Basic']+$Res_3['Arr_Basic']); ?></b>&nbsp;</td>
</tr>
<?php } if($Res_4['Arr_Hra']>0 OR $Res_5['Arr_Hra']>0 OR $Res_6['Arr_Hra']>0 OR $Res_7['Arr_Hra']>0 OR $Res_8['Arr_Hra']>0 OR $Res_9['Arr_Hra']>0 OR $Res_10['Arr_Hra']>0 OR $Res_11['Arr_Hra']>0 OR $Res_12['Arr_Hra']>0 OR $Res_1['Arr_Hra']>0 OR $Res_2['Arr_Hra']>0 OR $Res_3['Arr_Hra']>0){ ?>
<tr bgcolor="#FFFFFF">
<td class="All_200">&nbsp;Arrear Hra</td>
<td class="All_80"><?php echo intval($Res_4['Arr_Hra']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_5['Arr_Hra']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_6['Arr_Hra']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_7['Arr_Hra']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_8['Arr_Hra']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_9['Arr_Hra']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_10['Arr_Hra']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_11['Arr_Hra']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_12['Arr_Hra']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_1['Arr_Hra']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_2['Arr_Hra']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_3['Arr_Hra']); ?>&nbsp;</td><td class="All_80" bgcolor="#55AAFF"><b><?php echo intval($Res_4['Arr_Hra']+$Res_5['Arr_Hra']+$Res_6['Arr_Hra']+$Res_7['Arr_Hra']+$Res_8['Arr_Hra']+$Res_9['Arr_Hra']+$Res_10['Arr_Hra']+$Res_11['Arr_Hra']+$Res_12['Arr_Hra']+$Res_1['Arr_Hra']+$Res_2['Arr_Hra']+$Res_3['Arr_Hra']); ?></b>&nbsp;</td>
</tr>
<?php } if($Res_4['Arr_Spl']>0 OR $Res_5['Arr_Spl']>0 OR $Res_6['Arr_Spl']>0 OR $Res_7['Arr_Spl']>0 OR $Res_8['Arr_Spl']>0 OR $Res_9['Arr_Spl']>0 OR $Res_10['Arr_Spl']>0 OR $Res_11['Arr_Spl']>0 OR $Res_12['Arr_Spl']>0 OR $Res_1['Arr_Spl']>0 OR $Res_2['Arr_Spl']>0 OR $Res_3['Arr_Spl']>0){ ?>
<tr bgcolor="#FFFFFF">
<td class="All_200">&nbsp;Arrear Spl</td>
<td class="All_80"><?php echo intval($Res_4['Arr_Spl']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_5['Arr_Spl']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_6['Arr_Spl']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_7['Arr_Spl']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_8['Arr_Spl']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_9['Arr_Spl']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_10['Arr_Spl']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_11['Arr_Spl']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_12['Arr_Spl']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_1['Arr_Spl']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_2['Arr_Spl']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_3['Arr_Spl']); ?>&nbsp;</td><td class="All_80" bgcolor="#55AAFF"><b><?php echo intval($Res_4['Arr_Spl']+$Res_5['Arr_Spl']+$Res_6['Arr_Spl']+$Res_7['Arr_Spl']+$Res_8['Arr_Spl']+$Res_9['Arr_Spl']+$Res_10['Arr_Spl']+$Res_11['Arr_Spl']+$Res_12['Arr_Spl']+$Res_1['Arr_Spl']+$Res_2['Arr_Spl']+$Res_3['Arr_Spl']); ?></b>&nbsp;</td>
</tr>
<?php } if($Res_4['Arr_Conv']>0 OR $Res_5['Arr_Conv']>0 OR $Res_6['Arr_Conv']>0 OR $Res_7['Arr_Conv']>0 OR $Res_8['Arr_Conv']>0 OR $Res_9['Arr_Conv']>0 OR $Res_10['Arr_Conv']>0 OR $Res_11['Arr_Conv']>0 OR $Res_12['Arr_Conv']>0 OR $Res_1['Arr_Conv']>0 OR $Res_2['Arr_Conv']>0 OR $Res_3['Arr_Conv']>0){ ?>
<tr bgcolor="#FFFFFF">
<td class="All_200">&nbsp;Arrear Conv</td>
<td class="All_80"><?php echo intval($Res_4['Arr_Conv']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_5['Arr_Conv']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_6['Arr_Conv']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_7['Arr_Conv']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_8['Arr_Conv']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_9['Arr_Conv']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_10['Arr_Conv']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_11['Arr_Conv']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_12['Arr_Conv']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_1['Arr_Conv']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_2['Arr_Conv']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_3['Arr_Conv']); ?>&nbsp;</td><td class="All_80" bgcolor="#55AAFF"><b><?php echo intval($Res_4['Arr_Conv']+$Res_5['Arr_Conv']+$Res_6['Arr_Conv']+$Res_7['Arr_Conv']+$Res_8['Arr_Conv']+$Res_9['Arr_Conv']+$Res_10['Arr_Conv']+$Res_11['Arr_Conv']+$Res_12['Arr_Conv']+$Res_1['Arr_Conv']+$Res_2['Arr_Conv']+$Res_3['Arr_Conv']); ?></b>&nbsp;</td>
</tr>
<?php } if($Res_4['YCea']>0 OR $Res_5['YCea']>0 OR $Res_6['YCea']>0 OR $Res_7['YCea']>0 OR $Res_8['YCea']>0 OR $Res_9['YCea']>0 OR $Res_10['YCea']>0 OR $Res_11['YCea']>0 OR $Res_12['YCea']>0 OR $Res_1['YCea']>0 OR $Res_2['YCea']>0 OR $Res_3['YCea']>0){ ?>
<tr bgcolor="#FFFFFF">
<td class="All_200">&nbsp;CEA</td>
<td class="All_80"><?php echo intval($Res_4['YCea']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_5['YCea']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_6['YCea']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_7['YCea']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_8['YCea']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_9['YCea']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_10['YCea']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_11['YCea']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_12['YCea']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_1['YCea']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_2['YCea']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_3['YCea']); ?>&nbsp;</td><td class="All_80" bgcolor="#55AAFF"><b><?php echo intval($Res_4['YCea']+$Res_5['YCea']+$Res_6['YCea']+$Res_7['YCea']+$Res_8['YCea']+$Res_9['YCea']+$Res_10['YCea']+$Res_11['YCea']+$Res_12['YCea']+$Res_1['YCea']+$Res_2['YCea']+$Res_3['YCea']); ?></b>&nbsp;</td>
</tr>
<?php } if($Res_4['YMr']>0 OR $Res_5['YMr']>0 OR $Res_6['YMr']>0 OR $Res_7['YMr']>0 OR $Res_8['YMr']>0 OR $Res_9['YMr']>0 OR $Res_10['YMr']>0 OR $Res_11['YMr']>0 OR $Res_12['YMr']>0 OR $Res_1['YMr']>0 OR $Res_2['YMr']>0 OR $Res_3['YMr']>0){ ?>
<tr bgcolor="#FFFFFF">
<td class="All_200">&nbsp;MR</td>
<td class="All_80"><?php echo intval($Res_4['YMr']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_5['YMr']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_6['YMr']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_7['YMr']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_8['YMr']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_9['YMr']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_10['YMr']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_11['YMr']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_12['YMr']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_1['YMr']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_2['YMr']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_3['YMr']); ?>&nbsp;</td><td class="All_80" bgcolor="#55AAFF"><b><?php echo intval($Res_4['YMr']+$Res_5['YMr']+$Res_6['YMr']+$Res_7['YMr']+$Res_8['YMr']+$Res_9['YMr']+$Res_10['YMr']+$Res_11['YMr']+$Res_12['YMr']+$Res_1['YMr']+$Res_2['YMr']+$Res_3['YMr']); ?></b>&nbsp;</td>
</tr>
<?php } if($Res_4['YLta']>0 OR $Res_5['YLta']>0 OR $Res_6['YLta']>0 OR $Res_7['YLta']>0 OR $Res_8['YLta']>0 OR $Res_9['YLta']>0 OR $Res_10['YLta']>0 OR $Res_11['YLta']>0 OR $Res_12['YLta']>0 OR $Res_1['YLta']>0 OR $Res_2['YLta']>0 OR $Res_3['YLta']>0){ ?>
<tr bgcolor="#FFFFFF">
<td class="All_200">&nbsp;LTA</td>
<td class="All_80"><?php echo intval($Res_4['YLta']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_5['YLta']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_6['YLta']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_7['YLta']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_8['YLta']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_9['YLta']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_10['YLta']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_11['YLta']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_12['YLta']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_1['YLta']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_2['YLta']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_3['YLta']); ?>&nbsp;</td><td class="All_80" bgcolor="#55AAFF"><b><?php echo intval($Res_4['YLta']+$Res_5['YLta']+$Res_6['YLta']+$Res_7['YLta']+$Res_8['YLta']+$Res_9['YLta']+$Res_10['YLta']+$Res_11['YLta']+$Res_12['YLta']+$Res_1['YLta']+$Res_2['YLta']+$Res_3['YLta']); ?></b>&nbsp;</td>
</tr>
<?php } ?>
<?php $TotG4=$Res_4['Tot_Gross']+$Res_4['Bonus']+$Res_4['DA']+$Res_4['Arreares']+$Res_4['LeaveEncash']+$Res_4['Incentive']+$Res_4['VariableAdjustment']+$Res_4['PerformancePay']+$Res_4['CCA']+$Res_4['RA']+$Res_4['Arr_Basic']+$Res_4['Arr_Hra']+$Res_4['Arr_Spl']+$Res_4['Arr_Conv']+$Res_4['YCea']+$Res_4['YMr']+$Res_4['YLta'];
$TotG5=$Res_5['Tot_Gross']+$Res_5['Bonus']+$Res_5['DA']+$Res_5['Arreares']+$Res_5['LeaveEncash']+$Res_5['Incentive']+$Res_5['VariableAdjustment']+$Res_5['PerformancePay']+$Res_5['CCA']+$Res_5['RA']+$Res_5['Arr_Basic']+$Res_5['Arr_Hra']+$Res_5['Arr_Spl']+$Res_5['Arr_Conv']+$Res_5['YCea']+$Res_5['YMr']+$Res_5['YLta'];
$TotG6=$Res_6['Tot_Gross']+$Res_6['Bonus']+$Res_6['DA']+$Res_6['Arreares']+$Res_6['LeaveEncash']+$Res_6['Incentive']+$Res_6['VariableAdjustment']+$Res_6['PerformancePay']+$Res_6['CCA']+$Res_6['RA']+$Res_6['Arr_Basic']+$Res_6['Arr_Hra']+$Res_6['Arr_Spl']+$Res_6['Arr_Conv']+$Res_6['YCea']+$Res_6['YMr']+$Res_6['YLta'];
$TotG7=$Res_7['Tot_Gross']+$Res_7['Bonus']+$Res_7['DA']+$Res_7['Arreares']+$Res_7['LeaveEncash']+$Res_7['Incentive']+$Res_7['VariableAdjustment']+$Res_7['PerformancePay']+$Res_7['CCA']+$Res_7['RA']+$Res_7['Arr_Basic']+$Res_7['Arr_Hra']+$Res_7['Arr_Spl']+$Res_7['Arr_Conv']+$Res_7['YCea']+$Res_7['YMr']+$Res_7['YLta'];
$TotG8=$Res_8['Tot_Gross']+$Res_8['Bonus']+$Res_8['DA']+$Res_8['Arreares']+$Res_8['LeaveEncash']+$Res_8['Incentive']+$Res_8['VariableAdjustment']+$Res_8['PerformancePay']+$Res_8['CCA']+$Res_8['RA']+$Res_8['Arr_Basic']+$Res_8['Arr_Hra']+$Res_8['Arr_Spl']+$Res_8['Arr_Conv']+$Res_8['YCea']+$Res_8['YMr']+$Res_8['YLta'];
$TotG9=$Res_9['Tot_Gross']+$Res_9['Bonus']+$Res_9['DA']+$Res_9['Arreares']+$Res_9['LeaveEncash']+$Res_9['Incentive']+$Res_9['VariableAdjustment']+$Res_9['PerformancePay']+$Res_9['CCA']+$Res_9['RA']+$Res_9['Arr_Basic']+$Res_9['Arr_Hra']+$Res_9['Arr_Spl']+$Res_9['Arr_Conv']+$Res_9['YCea']+$Res_9['YMr']+$Res_9['YLta'];
$TotG10=$Res_10['Tot_Gross']+$Res_10['Bonus']+$Res_10['DA']+$Res_10['Arreares']+$Res_10['LeaveEncash']+$Res_10['Incentive']+$Res_10['VariableAdjustment']+$Res_10['PerformancePay']+$Res_10['CCA']+$Res_10['RA']+$Res_10['Arr_Basic']+$Res_10['Arr_Hra']+$Res_10['Arr_Spl']+$Res_10['Arr_Conv']+$Res_10['YCea']+$Res_10['YMr']+$Res_10['YLta'];
$TotG11=$Res_11['Tot_Gross']+$Res_11['Bonus']+$Res_11['DA']+$Res_11['Arreares']+$Res_11['LeaveEncash']+$Res_11['Incentive']+$Res_11['VariableAdjustment']+$Res_11['PerformancePay']+$Res_11['CCA']+$Res_11['RA']+$Res_11['Arr_Basic']+$Res_11['Arr_Hra']+$Res_11['Arr_Spl']+$Res_11['Arr_Conv']+$Res_11['YCea']+$Res_11['YMr']+$Res_11['YLta'];
$TotG12=$Res_12['Tot_Gross']+$Res_12['Bonus']+$Res_12['DA']+$Res_12['Arreares']+$Res_12['LeaveEncash']+$Res_12['Incentive']+$Res_12['VariableAdjustment']+$Res_12['PerformancePay']+$Res_12['CCA']+$Res_12['RA']+$Res_12['Arr_Basic']+$Res_12['Arr_Hra']+$Res_12['Arr_Spl']+$Res_12['Arr_Conv']+$Res_12['YCea']+$Res_12['YMr']+$Res_12['YLta'];
$TotG1=$Res_1['Tot_Gross']+$Res_1['Bonus']+$Res_1['DA']+$Res_1['Arreares']+$Res_1['LeaveEncash']+$Res_1['Incentive']+$Res_1['VariableAdjustment']+$Res_1['PerformancePay']+$Res_1['CCA']+$Res_1['RA']+$Res_1['Arr_Basic']+$Res_1['Arr_Hra']+$Res_1['Arr_Spl']+$Res_1['Arr_Conv']+$Res_1['YCea']+$Res_1['YMr']+$Res_1['YLta'];
$TotG2=$Res_2['Tot_Gross']+$Res_2['Bonus']+$Res_2['DA']+$Res_2['Arreares']+$Res_2['LeaveEncash']+$Res_2['Incentive']+$Res_2['VariableAdjustment']+$Res_2['PerformancePay']+$Res_2['CCA']+$Res_2['RA']+$Res_2['Arr_Basic']+$Res_2['Arr_Hra']+$Res_2['Arr_Spl']+$Res_2['Arr_Conv']+$Res_2['YCea']+$Res_2['YMr']+$Res_2['YLta'];
$TotG3=$Res_3['Tot_Gross']+$Res_3['Bonus']+$Res_3['DA']+$Res_3['Arreares']+$Res_3['LeaveEncash']+$Res_3['Incentive']+$Res_3['VariableAdjustment']+$Res_3['PerformancePay']+$Res_3['CCA']+$Res_3['RA']+$Res_3['Arr_Basic']+$Res_3['Arr_Hra']+$Res_3['Arr_Spl']+$Res_3['Arr_Conv']+$Res_3['YCea']+$Res_3['YMr']+$Res_3['YLta'];
?>
<tr bgcolor="#D5FFD5" style="font-weight:bold;">
<td class="All_200">&nbsp;Gross Earning</td>
<td class="All_80"><?php echo intval($TotG4); ?>&nbsp;</td><td class="All_80"><?php echo intval($TotG5); ?>&nbsp;</td><td class="All_80"><?php echo intval($TotG6); ?>&nbsp;</td><td class="All_80"><?php echo intval($TotG7); ?>&nbsp;</td><td class="All_80"><?php echo intval($TotG8); ?>&nbsp;</td><td class="All_80"><?php echo intval($TotG9); ?>&nbsp;</td><td class="All_80"><?php echo intval($TotG10); ?>&nbsp;</td><td class="All_80"><?php echo intval($TotG11); ?>&nbsp;</td><td class="All_80"><?php echo intval($TotG12); ?>&nbsp;</td><td class="All_80"><?php echo intval($TotG1); ?>&nbsp;</td><td class="All_80"><?php echo intval($TotG2); ?>&nbsp;</td><td class="All_80"><?php echo intval($TotG3); ?>&nbsp;</td><td class="All_80" bgcolor="#55AAFF"><b><?php echo intval($TotG4+$TotG5+$TotG6+$TotG7+$TotG8+$TotG9+$TotG10+$TotG11+$TotG12+$TotG1+$TotG2+$TotG3); ?></b>&nbsp;</td>
</tr>
<tr bgcolor="#FFFFFF">
<td class="All_200">&nbsp;Provident Fund</td>
<td class="All_80"><?php echo intval($Res_4['Tot_Pf_Employee']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_5['Tot_Pf_Employee']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_6['Tot_Pf_Employee']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_7['Tot_Pf_Employee']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_8['Tot_Pf_Employee']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_9['Tot_Pf_Employee']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_10['Tot_Pf_Employee']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_11['Tot_Pf_Employee']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_12['Tot_Pf_Employee']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_1['Tot_Pf_Employee']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_2['Tot_Pf_Employee']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_3['Tot_Pf_Employee']); ?>&nbsp;</td><td class="All_80" bgcolor="#55AAFF"><b><?php echo intval($Res_4['Tot_Pf_Employee']+$Res_5['Tot_Pf_Employee']+$Res_6['Tot_Pf_Employee']+$Res_7['Tot_Pf_Employee']+$Res_8['Tot_Pf_Employee']+$Res_9['Tot_Pf_Employee']+$Res_10['Tot_Pf_Employee']+$Res_11['Tot_Pf_Employee']+$Res_12['Tot_Pf_Employee']+$Res_1['Tot_Pf_Employee']+$Res_2['Tot_Pf_Employee']+$Res_3['Tot_Pf_Employee']); ?></b>&nbsp;</td>
</tr>
<?php if($Res_4['TDS']>0 OR $Res_5['TDS']>0 OR $Res_6['TDS']>0 OR $Res_7['TDS']>0 OR $Res_8['TDS']>0 OR $Res_9['TDS']>0 OR $Res_10['TDS']>0 OR $Res_11['TDS']>0 OR $Res_12['TDS']>0 OR $Res_1['TDS']>0 OR $Res_2['TDS']>0 OR $Res_3['TDS']>0) { ?>
<tr bgcolor="#FFFFFF">
<td class="All_200">&nbsp;TDS</td>
<td class="All_80"><?php echo intval($Res_4['TDS']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_5['TDS']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_6['TDS']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_7['TDS']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_8['TDS']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_9['TDS']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_10['TDS']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_11['TDS']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_12['TDS']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_1['TDS']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_2['TDS']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_3['TDS']); ?>&nbsp;</td><td class="All_80" bgcolor="#55AAFF"><b><?php echo intval($Res_4['TDS']+$Res_5['TDS']+$Res_6['TDS']+$Res_7['TDS']+$Res_8['TDS']+$Res_9['TDS']+$Res_10['TDS']+$Res_11['TDS']+$Res_12['TDS']+$Res_1['TDS']+$Res_2['TDS']+$Res_3['TDS']); ?></b>&nbsp;</td>
</tr>
<?php } if($Res_4['ESCI_Employee']>0 OR $Res_5['ESCI_Employee']>0 OR $Res_6['ESCI_Employee']>0 OR $Res_7['ESCI_Employee']>0 OR $Res_8['ESCI_Employee']>0 OR $Res_9['ESCI_Employee']>0 OR $Res_10['ESCI_Employee']>0 OR $Res_11['ESCI_Employee']>0 OR $Res_12['ESCI_Employee']>0 OR $Res_1['ESCI_Employee']>0 OR $Res_2['ESCI_Employee']>0 OR $Res_3['ESCI_Employee']>0){ ?>
<tr bgcolor="#FFFFFF">
<td class="All_200">&nbsp;ESCI</td>
<td class="All_80"><?php echo intval($Res_4['ESCI_Employee']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_5['ESCI_Employee']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_6['ESCI_Employee']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_7['ESCI_Employee']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_8['ESCI_Employee']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_9['ESCI_Employee']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_10['ESCI_Employee']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_11['ESCI_Employee']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_12['ESCI_Employee']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_1['ESCI_Employee']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_2['ESCI_Employee']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_3['ESCI_Employee']); ?>&nbsp;</td><td class="All_80" bgcolor="#55AAFF"><b><?php echo intval($Res_4['ESCI_Employee']+$Res_5['ESCI_Employee']+$Res_6['ESCI_Employee']+$Res_7['ESCI_Employee']+$Res_8['ESCI_Employee']+$Res_9['ESCI_Employee']+$Res_10['ESCI_Employee']+$Res_11['ESCI_Employee']+$Res_12['ESCI_Employee']+$Res_1['ESCI_Employee']+$Res_2['ESCI_Employee']+$Res_3['ESCI_Employee']); ?></b>&nbsp;</td>
</tr>
<?php } if($Res_4['Arr_Pf']>0 OR $Res_5['Arr_Pf']>0 OR $Res_6['Arr_Pf']>0 OR $Res_7['Arr_Pf']>0 OR $Res_8['Arr_Pf']>0 OR $Res_9['Arr_Pf']>0 OR $Res_10['Arr_Pf']>0 OR $Res_11['Arr_Pf']>0 OR $Res_12['Arr_Pf']>0 OR $Res_1['Arr_Pf']>0 OR $Res_2['Arr_Pf']>0 OR $Res_3['Arr_Pf']>0){ ?>
<tr bgcolor="#FFFFFF">
<td class="All_200">&nbsp;Arrear Pf</td>
<td class="All_80"><?php echo intval($Res_4['Arr_Pf']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_5['Arr_Pf']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_6['Arr_Pf']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_7['Arr_Pf']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_8['Arr_Pf']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_9['Arr_Pf']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_10['Arr_Pf']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_11['Arr_Pf']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_12['Arr_Pf']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_1['Arr_Pf']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_2['Arr_Pf']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_3['Arr_Pf']); ?>&nbsp;</td><td class="All_80" bgcolor="#55AAFF"><b><?php echo intval($Res_4['Arr_Pf']+$Res_5['Arr_Pf']+$Res_6['Arr_Pf']+$Res_7['Arr_Pf']+$Res_8['Arr_Pf']+$Res_9['Arr_Pf']+$Res_10['Arr_Pf']+$Res_11['Arr_Pf']+$Res_12['Arr_Pf']+$Res_1['Arr_Pf']+$Res_2['Arr_Pf']+$Res_3['Arr_Pf']); ?></b>&nbsp;</td>
</tr>
<?php } if($Res_4['Arr_Esic']>0 OR $Res_5['Arr_Esic']>0 OR $Res_6['Arr_Esic']>0 OR $Res_7['Arr_Esic']>0 OR $Res_8['Arr_Esic']>0 OR $Res_9['Arr_Esic']>0 OR $Res_10['Arr_Esic']>0 OR $Res_11['Arr_Esic']>0 OR $Res_12['Arr_Esic']>0 OR $Res_1['Arr_Esic']>0 OR $Res_2['Arr_Esic']>0 OR $Res_3['Arr_Esic']>0){ ?>
<tr bgcolor="#FFFFFF">
<td class="All_200">&nbsp;Arrear Esic</td>
<td class="All_80"><?php echo intval($Res_4['Arr_Esic']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_5['Arr_Esic']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_6['Arr_Esic']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_7['Arr_Esic']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_8['Arr_Esic']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_9['Arr_Esic']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_10['Arr_Esic']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_11['Arr_Esic']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_12['Arr_Esic']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_1['Arr_Esic']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_2['Arr_Esic']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_3['Arr_Esic']); ?>&nbsp;</td><td class="All_80" bgcolor="#55AAFF"><b><?php echo intval($Res_4['Arr_Esic']+$Res_5['Arr_Esic']+$Res_6['Arr_Esic']+$Res_7['Arr_Esic']+$Res_8['Arr_Esic']+$Res_9['Arr_Esic']+$Res_10['Arr_Esic']+$Res_11['Arr_Esic']+$Res_12['Arr_Esic']+$Res_1['Arr_Esic']+$Res_2['Arr_Esic']+$Res_3['Arr_Esic']); ?></b>&nbsp;</td>
</tr>
<?php } if($Res_4['VolContrib']>0 OR $Res_5['VolContrib']>0 OR $Res_6['VolContrib']>0 OR $Res_7['VolContrib']>0 OR $Res_8['VolContrib']>0 OR $Res_9['VolContrib']>0 OR $Res_10['VolContrib']>0 OR $Res_11['VolContrib']>0 OR $Res_12['VolContrib']>0 OR $Res_1['VolContrib']>0 OR $Res_2['VolContrib']>0 OR $Res_3['VolContrib']>0){ ?>
<tr bgcolor="#FFFFFF">
<td class="All_200">&nbsp;Voluntary Contribution</td>
<td class="All_80"><?php echo intval($Res_4['VolContrib']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_5['VolContrib']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_6['VolContrib']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_7['VolContrib']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_8['VolContrib']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_9['VolContrib']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_10['VolContrib']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_11['VolContrib']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_12['VolContrib']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_1['VolContrib']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_2['VolContrib']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_3['VolContrib']); ?>&nbsp;</td><td class="All_80" bgcolor="#55AAFF"><b><?php echo intval($Res_4['VolContrib']+$Res_5['VolContrib']+$Res_6['VolContrib']+$Res_7['VolContrib']+$Res_8['VolContrib']+$Res_9['VolContrib']+$Res_10['VolContrib']+$Res_11['VolContrib']+$Res_12['VolContrib']+$Res_1['VolContrib']+$Res_2['VolContrib']+$Res_3['VolContrib']); ?></b>&nbsp;</td>
</tr>
<?php } if($Res_4['DeductAdjmt']>0 OR $Res_5['DeductAdjmt']>0 OR $Res_6['DeductAdjmt']>0 OR $Res_7['DeductAdjmt']>0 OR $Res_8['DeductAdjmt']>0 OR $Res_9['DeductAdjmt']>0 OR $Res_10['DeductAdjmt']>0 OR $Res_11['DeductAdjmt']>0 OR $Res_12['DeductAdjmt']>0 OR $Res_1['DeductAdjmt']>0 OR $Res_2['DeductAdjmt']>0 OR $Res_3['DeductAdjmt']>0){ ?>
<tr bgcolor="#FFFFFF">
<td class="All_200">&nbsp;Deduct Adjustment</td>
<td class="All_80"><?php echo intval($Res_4['DeductAdjmt']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_5['DeductAdjmt']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_6['DeductAdjmt']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_7['DeductAdjmt']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_8['DeductAdjmt']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_9['DeductAdjmt']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_10['DeductAdjmt']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_11['DeductAdjmt']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_12['DeductAdjmt']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_1['DeductAdjmt']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_2['DeductAdjmt']); ?>&nbsp;</td><td class="All_80"><?php echo intval($Res_3['DeductAdjmt']); ?>&nbsp;</td><td class="All_80" bgcolor="#55AAFF"><b><?php echo intval($Res_4['DeductAdjmt']+$Res_5['DeductAdjmt']+$Res_6['DeductAdjmt']+$Res_7['DeductAdjmt']+$Res_8['DeductAdjmt']+$Res_9['DeductAdjmt']+$Res_10['DeductAdjmt']+$Res_11['DeductAdjmt']+$Res_12['DeductAdjmt']+$Res_1['DeductAdjmt']+$Res_2['DeductAdjmt']+$Res_3['DeductAdjmt']); ?></b>&nbsp;</td>
</tr>
<?php } ?>
<?php $TotD4=$Res_4['Tot_Deduct']+$Res_4['TDS']+$Res_4['Arr_Pf']+$Res_4['Arr_Esic']+$Res_4['VolContrib']+$Res_4['DeductAdjmt'];
$TotD5=$Res_5['Tot_Deduct']+$Res_5['TDS']+$Res_5['Arr_Pf']+$Res_5['Arr_Esic']+$Res_5['VolContrib']+$Res_5['DeductAdjmt'];
$TotD6=$Res_6['Tot_Deduct']+$Res_6['TDS']+$Res_6['Arr_Pf']+$Res_6['Arr_Esic']+$Res_6['VolContrib']+$Res_6['DeductAdjmt'];
$TotD7=$Res_7['Tot_Deduct']+$Res_7['TDS']+$Res_7['Arr_Pf']+$Res_7['Arr_Esic']+$Res_7['VolContrib']+$Res_7['DeductAdjmt'];
$TotD8=$Res_8['Tot_Deduct']+$Res_8['TDS']+$Res_8['Arr_Pf']+$Res_8['Arr_Esic']+$Res_8['VolContrib']+$Res_8['DeductAdjmt'];
$TotD9=$Res_9['Tot_Deduct']+$Res_9['TDS']+$Res_9['Arr_Pf']+$Res_9['Arr_Esic']+$Res_9['VolContrib']+$Res_9['DeductAdjmt'];
$TotD10=$Res_10['Tot_Deduct']+$Res_10['TDS']+$Res_10['Arr_Pf']+$Res_10['Arr_Esic']+$Res_10['VolContrib']+$Res_10['DeductAdjmt'];
$TotD11=$Res_11['Tot_Deduct']+$Res_11['TDS']+$Res_11['Arr_Pf']+$Res_11['Arr_Esic']+$Res_11['VolContrib']+$Res_11['DeductAdjmt'];
$TotD12=$Res_12['Tot_Deduct']+$Res_12['TDS']+$Res_12['Arr_Pf']+$Res_12['Arr_Esic']+$Res_12['VolContrib']+$Res_12['DeductAdjmt'];
$TotD1=$Res_1['Tot_Deduct']+$Res_1['TDS']+$Res_1['Arr_Pf']+$Res_1['Arr_Esic']+$Res_1['VolContrib']+$Res_1['DeductAdjmt'];
$TotD2=$Res_2['Tot_Deduct']+$Res_2['TDS']+$Res_2['Arr_Pf']+$Res_2['Arr_Esic']+$Res_2['VolContrib']+$Res_2['DeductAdjmt'];
$TotD3=$Res_3['Tot_Deduct']+$Res_3['TDS']+$Res_3['Arr_Pf']+$Res_3['Arr_Esic']+$Res_3['VolContrib']+$Res_3['DeductAdjmt'];
?>
<tr bgcolor="#FFD2D2" style="font-weight:bold;">
<td class="All_200">&nbsp;Gross Deduction</td>
<td class="All_80"><?php echo intval($TotD4); ?>&nbsp;</td><td class="All_80"><?php echo intval($TotD5); ?>&nbsp;</td><td class="All_80"><?php echo intval($TotD6); ?>&nbsp;</td><td class="All_80"><?php echo intval($TotD7); ?>&nbsp;</td><td class="All_80"><?php echo intval($TotD8); ?>&nbsp;</td><td class="All_80"><?php echo intval($TotD9); ?>&nbsp;</td><td class="All_80"><?php echo intval($TotD10); ?>&nbsp;</td><td class="All_80"><?php echo intval($TotD11); ?>&nbsp;</td><td class="All_80"><?php echo intval($TotD12); ?>&nbsp;</td><td class="All_80"><?php echo intval($TotD1); ?>&nbsp;</td><td class="All_80"><?php echo intval($TotD2); ?>&nbsp;</td><td class="All_80"><?php echo intval($TotD3); ?>&nbsp;</td><td class="All_80" bgcolor="#55AAFF"><b><?php echo intval($TotD4+$TotD5+$TotD6+$TotD7+$TotD8+$TotD9+$TotD10+$TotD11+$TotD12+$TotD1+$TotD2+$TotD3); ?></b>&nbsp;</td>
</tr>

<?php $TotNet4=$TotG4-$TotD4; $TotNet5=$TotG5-$TotD5; $TotNet6=$TotG6-$TotD6; $TotNet7=$TotG7-$TotD7; $TotNet8=$TotG8-$TotD8; $TotNet9=$TotG9-$TotD9; $TotNet10=$TotG10-$TotD10; $TotNet11=$TotG11-$TotD11; $TotNet12=$TotG12-$TotD12; $TotNet1=$TotG1-$TotD1; $TotNet2=$TotG2-$TotD2; $TotNet3=$TotG3-$TotD3; ?>

<tr bgcolor="#BFFF80" style="font-weight:bold;">
<td class="All_200">&nbsp;Net Amount</td>
<td class="All_80"><?php echo intval($TotNet4); ?>&nbsp;</td><td class="All_80"><?php echo intval($TotNet5); ?>&nbsp;</td><td class="All_80"><?php echo intval($TotNet6); ?>&nbsp;</td><td class="All_80"><?php echo intval($TotNet7); ?>&nbsp;</td><td class="All_80"><?php echo intval($TotNet8); ?>&nbsp;</td><td class="All_80"><?php echo intval($TotNet9); ?>&nbsp;</td><td class="All_80"><?php echo intval($TotNet10); ?>&nbsp;</td><td class="All_80"><?php echo intval($TotNet11); ?>&nbsp;</td><td class="All_80"><?php echo intval($TotNet12); ?>&nbsp;</td><td class="All_80"><?php echo intval($TotNet1); ?>&nbsp;</td><td class="All_80"><?php echo intval($TotNet2); ?>&nbsp;</td><td class="All_80"><?php echo intval($TotNet3); ?>&nbsp;</td><td class="All_80" bgcolor="#55AAFF"><b><?php echo intval($TotNet4+$TotNet5+$TotNet6+$TotNet7+$TotNet8+$TotNet9+$TotNet10+$TotNet11+$TotNet12+$TotNet1+$TotNet2+$TotNet3); ?></b>&nbsp;</td>
</tr>
   </table> 
 </td>
</tr> 
</table>  
<?php } ?>
</td>
</tr>	
</table>
</td>
</tr> 
</table>
<?php //**************************************************************************** ?>
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

