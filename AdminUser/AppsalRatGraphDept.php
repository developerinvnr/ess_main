<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
if($_REQUEST['YI']==1){$Y=2012; $Y2=2013;}elseif($_REQUEST['YI']==2){$Y=2013; $Y2=2014;}elseif($_REQUEST['YI']==3){$Y=2014; $Y2=2015;}elseif($_REQUEST['YI']==4){$Y=2015; $Y2=2016;}elseif($_REQUEST['YI']==5){$Y=2016; $Y2=2017;}elseif($_REQUEST['YI']==6){$Y=2017; $Y2=2018;}elseif($_REQUEST['YI']==7){$Y=2018; $Y2=2019;}elseif($_REQUEST['YI']==8){$Y=2019; $Y2=2020;}elseif($_REQUEST['YI']==9){$Y=2020; $Y2=2021;}elseif($_REQUEST['YI']==10){$Y=2021; $Y2=2022;}elseif($_REQUEST['YI']==11){$Y=2022; $Y2=2023;}elseif($_REQUEST['YI']==12){$Y=2023; $Y2=2024;}elseif($_REQUEST['YI']==13){$Y=2024; $Y2=2025;}elseif($_REQUEST['YI']==14){$Y=2025; $Y2=2026;}elseif($_REQUEST['YI']==15){$Y=2026; $Y2=2027;}
if($CompanyId==1 OR $CompanyId==2 OR $CompanyId==4){$YYear=$Y;}elseif($CompanyId==3){$YYear=$Y2;}
//****************************************************************************************************************
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;} .All{font-size:11px; height:20px;} .All_80{font-size:11px; height:20px; width:80px;}
.All_40{font-size:11px; height:20px; width:40px;} .All_50{font-size:11px; height:20px; width:50px;} .All_70{font-size:11px; height:20px; width:70px;} .All_80{font-size:11px; height:20px; width:80px;}.All_100{font-size:11px; height:20px; width:100px;} .All_120{font-size:11px; height:20px; width:120px;} .All_140{font-size:11px; height:20px; width:140px;} .All_60{font-size:11px; height:20px; width:60px;}
.All_150{font-size:11px; height:20px; width:150px;}.All_170{font-size:11px; height:20px; width:170px;}.All_180{font-size:11px; height:20px; width:180px;}.All_190{font-size:11px; height:20px; width:190px;} .All_200{font-size:11px; height:20px; width:200px;} .All_450{font-size:11px; height:20px; width:450px;}.All_360{font-size:11px; height:20px; width:350px;}.All_540{font-size:11px; height:20px; width:540px;}.All_400{font-size:11px; height:20px; width:400px;} .All_600{font-size:11px; height:20px; width:600px;}
.recCls{font-family:Georgia; font-size:12px;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<style>.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
<Script type="text/javascript">window.history.forward(1);</script>
<Script type="text/javascript" language="javascript">
function SelectYear(v){window.location='AppsalRatGraphDept.php?YI='+v;}
</Script>
</head>
<body class="body" bgcolor="">
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" name="YId" id="YId" value="<?php echo $YearId; ?>" />
<input type="hidden" name="UserId" id="UserId" value="<?php echo $UserId; ?>" />
<input type="hidden" name="DeptValue" id="DeptValue" value="<?php echo $_REQUEST['value']; ?>" />
<table class="table" border="0">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center" width="100%" id="MainWindow">
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
<table border="0" style="margin-top:0px; width:95%;">
	<tr>
		<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true AND ($_SESSION['PMS']==1 OR $_SESSION['PMS_Report']==1)) { ?>
		<td align="" width="100%" valign="top">
		   <table border="0">
       		 <tr><td colspan="2">
			       <table border="0">
                     <tr>
					  <td colspan="12" align="left" class="heading">Normal Distribustion Rating Graph ALL Emp &nbsp;<span id="ReturnValue">&nbsp;</span></td>
					  <td>
				    <table border="0">
                    <tr>
					 <td class="td1" style="font-size:12px; width:90px;" align="center">
<?php $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI']."", $con); $rY=mysql_fetch_assoc($sY); 
      $FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; ?>					 					 
<select style="font-size:12px; width:100px; height:20px; background-color:#DDFFBB;" name="YearID" id="YearID" onChange="SelectYear(this.value)"><option value="<?php echo $_REQUEST['YI']; ?>" style="margin-left:0px;" selected><?php echo $PRD; ?></option>
<?php for($i=$YearId; $i>=1; $i--){	
	  $s2Y=mysql_query("select * from hrm_year where YearId=".$i,$con); $r2Y=mysql_fetch_assoc($s2Y);
	  $FD2=date("Y",strtotime($r2Y['FromDate'])); $TD2=date("Y",strtotime($r2Y['ToDate'])); ?>
<?php if($_REQUEST['YI']!=$i){ ?><option value="<?php echo $i; ?>"><?php echo $FD2.'-'.$TD2; ?></option><?php } ?>
<?php } ?></select></td>
<td>&nbsp;</td>
                     </tr>
				   </table>					
				   </td>                           
<?php } ?>					 
		           </tr>
                  </table>
				</td>
			 </tr>
<?php //---------------------------------------Display Record----------------------------------------------------------------- ?>
<tr>
 <td>
   <table border="0" width="width="<?php if($_REQUEST['YI']>=2){echo '900';}else{echo '400';} ?>"">
     <tr>
  <td colspan="8" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Times New Roman; font-weight:bold;">&nbsp;Normal Distribustion Rating Graph (ALL Department)&nbsp;&nbsp;&nbsp;
	   <a href="AppsalRatGraphEmpImg.php?action=LinGraph&YI=<?php echo $_REQUEST['YI']; ?>" target="Giframe"><font color="#FFFFFF">Linear graph</font></a>
	  </td>
	</tr>
	<tr style="height:20px;" valign="middle">
	 <td>
   <table border="1">
	<tr>
	 <td bgcolor="#7a6189" align="Right" style="font-family:Times New Roman;color:#FFFFFF; font-size:13px; width:80px;"><b>Rating</b>&nbsp;</td>
<?php $sqlR=mysql_query("select * from hrm_pms_rating where YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND RatingStatus='A' order by Rating ASC", $con); 
      $sn=1; while($resR=mysql_fetch_array($sqlR)){ ?>			 
	  <td bgcolor="#7a6189" align="Center" style="font-family:Times New Roman;color:#FFFFFF; font-size:13px; width:60px;"><b><?php echo $resR['Rating']; ?></b></td>
<?php } ?>	 
	</tr>
	<tr>
	 <td bgcolor="#7a6189" align="Right" style="font-family:Times New Roman;color:#FFFFFF;font-size:13px;"><b>Expected</b>&nbsp;</td>
<?php $sqlR=mysql_query("select * from hrm_pms_rating where YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND RatingStatus='A' order by Rating ASC", $con); 
      $sn=1; while($resR=mysql_fetch_array($sqlR)){ 
	  
$sqlRat=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND Rating=".$resR['Rating'], $con); $resRat=mysql_fetch_array($sqlRat); 
$SqlA=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$Y."-06-30' AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI'], $con); $RowA=mysql_num_rows($SqlA); 
$Rat=($RowA*$resRat['NormalDistri'])/100; ?>	 
	 <td bgcolor="#000000" align="Center" style="font-family:Times New Roman;color:#FFFFFF; font-size:13px;"><?php echo $Rat; ?></td>
<?php } ?>	 	 
	</tr>
	
<?php $SqlDept=mysql_query("select * from core_departments where is_active=1 order by department_name", $con); $sn=1; while($ResDept=mysql_fetch_array($SqlDept)){ ?>	
	<tr>
	 <td bgcolor="#7a6189" align="Right" style="font-family:Times New Roman;color:#FFFFFF; font-size:13px;"><b><?php echo $ResDept['department_name']; ?></b>&nbsp;</td>
<?php $sqlR=mysql_query("select * from hrm_pms_rating where YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND RatingStatus='A' order by Rating ASC", $con); 
      $sn=1; while($resR=mysql_fetch_array($sqlR)){ 
$SqlE=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.HR_Curr_DepartmentId=".$ResDept['id']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND Hod_TotalFinalRating=".$resR['Rating'], $con); 
$RowE=mysql_num_rows($SqlE); $vE=number_format($RowE, 2, '.', '');	?>	 
	 <td bgcolor="#FFFFFF" align="Center" style="font-family:Times New Roman;color:#OOOOOO; font-size:13px;"><?php if($vE!=0){echo $vE;}else{echo '';} //echo $vE; ?></td>
<?php } ?>	
	</tr>
<?php $sn++; } ?>	

   </table>
  </td>
 </tr>
 <tr>
  <td align="left">
   <table border="0" cellpadding="0" cellspacing="0">
    <tr>
	<td colspan="20" style="width:410px; height:200px; border:0; border-style:hidden;" valign="top" align="left">
	  <iframe name="Giframe" src="AppsalRatGraphDept1Img.php?action=LinGraph&YI=<?php echo $_REQUEST['YI']; ?>" style="width:420px; height:200px; border:0; border-style:hidden;"></iframe></td>
	<td colspan="20" style="width:410px; height:200px; border:0; border-style:hidden;" valign="top" align="left">
	  <iframe name="Giframe" src="AppsalRatGraphDept2Img.php?action=LinGraph&YI=<?php echo $_REQUEST['YI']; ?>" style="width:420px; height:200px; border:0; border-style:hidden;"></iframe></td>
	<td colspan="20" style="width:410px; height:200px; border:0; border-style:hidden;" valign="top" align="left">
	  <iframe name="Giframe" src="AppsalRatGraphDept3Img.php?action=LinGraph&YI=<?php echo $_REQUEST['YI']; ?>" style="width:420px; height:200px; border:0; border-style:hidden;"></iframe></td>
	</tr>
	<tr>
	<td colspan="20" style="width:410px; height:200px; border:0; border-style:hidden;" valign="top" align="left">
	  <iframe name="Giframe" src="AppsalRatGraphDept4Img.php?action=LinGraph&YI=<?php echo $_REQUEST['YI']; ?>" style="width:420px; height:200px; border:0; border-style:hidden;"></iframe></td>
	<td colspan="20" style="width:410px; height:200px; border:0; border-style:hidden;" valign="top" align="left">
	  <iframe name="Giframe" src="AppsalRatGraphDept5Img.php?action=LinGraph&YI=<?php echo $_REQUEST['YI']; ?>" style="width:420px; height:200px; border:0; border-style:hidden;"></iframe></td>
	<td colspan="20" style="width:410px; height:200px; border:0; border-style:hidden;" valign="top" align="left">
	  <iframe name="Giframe" src="AppsalRatGraphDept6Img.php?action=LinGraph&YI=<?php echo $_REQUEST['YI']; ?>" style="width:420px; height:200px; border:0; border-style:hidden;"></iframe></td>
	</tr>
	<tr>
	<td colspan="20" style="width:410px; height:200px; border:0; border-style:hidden;" valign="top" align="left">
	  <iframe name="Giframe" src="AppsalRatGraphDept7Img.php?action=LinGraph&YI=<?php echo $_REQUEST['YI']; ?>" style="width:420px; height:200px; border:0; border-style:hidden;"></iframe></td>
	<td colspan="20" style="width:410px; height:200px; border:0; border-style:hidden;" valign="top" align="left">
	  <iframe name="Giframe" src="AppsalRatGraphDept8Img.php?action=LinGraph&YI=<?php echo $_REQUEST['YI']; ?>" style="width:420px; height:200px; border:0; border-style:hidden;"></iframe></td>
	<td colspan="20" style="width:410px; height:200px; border:0; border-style:hidden;" valign="top" align="left">
	  <iframe name="Giframe" src="AppsalRatGraphDept9Img.php?action=LinGraph&YI=<?php echo $_REQUEST['YI']; ?>" style="width:420px; height:200px; border:0; border-style:hidden;"></iframe></td>
	</tr>
	<tr>
	<td colspan="20" style="width:410px; height:200px; border:0; border-style:hidden;" valign="top" align="left">
	  <iframe name="Giframe" src="AppsalRatGraphDept10Img.php?action=LinGraph&YI=<?php echo $_REQUEST['YI']; ?>" style="width:420px; height:200px; border:0; border-style:hidden;"></iframe></td>
	<td colspan="20" style="width:410px; height:200px; border:0; border-style:hidden;" valign="top" align="left">
	  <iframe name="Giframe" src="AppsalRatGraphDept11Img.php?action=LinGraph&YI=<?php echo $_REQUEST['YI']; ?>" style="width:420px; height:200px; border:0; border-style:hidden;"></iframe></td>
	<td colspan="20" style="width:410px; height:200px; border:0; border-style:hidden;" valign="top" align="left">
	  <iframe name="Giframe" src="AppsalRatGraphDept12Img.php?action=LinGraph&YI=<?php echo $_REQUEST['YI']; ?>" style="width:420px; height:200px; border:0; border-style:hidden;"></iframe></td>
	</tr>
	<tr>
	<td colspan="20" style="width:410px; height:200px; border:0; border-style:hidden;" valign="top" align="left">
	  <iframe name="Giframe" src="AppsalRatGraphDept13Img.php?action=LinGraph&YI=<?php echo $_REQUEST['YI']; ?>" style="width:420px; height:200px; border:0; border-style:hidden;"></iframe></td>
	<td colspan="20" style="width:410px; height:200px; border:0; border-style:hidden;" valign="top" align="left">
	  <iframe name="Giframe" src="AppsalRatGraphDept14Img.php?action=LinGraph&YI=<?php echo $_REQUEST['YI']; ?>" style="width:420px; height:200px; border:0; border-style:hidden;"></iframe></td>
	</tr>
   </table>
  </td>
	</tr>
   </table>
 </td>
</tr> 
<?php //-------------------------------------------------------------------------------------------------------- ?>
		<td align="left" width="20%">&nbsp;</td>
	</tr>
</table>
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************END*****END*****END******END******END***************************************************************?>
<?php //************************************************************************************************************************************************************?>
	  </td>
	</tr>
	  </table>
 </td>
</tr>
</table>
</body>
</html>