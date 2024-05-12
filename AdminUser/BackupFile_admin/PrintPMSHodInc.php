<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
if($_REQUEST['YI']==1){$Y=2012;}elseif($_REQUEST['YI']==2){$Y=2013;}elseif($_REQUEST['YI']==3){$Y=2014;}elseif($_REQUEST['YI']==4){$Y=2015;}elseif($_REQUEST['YI']==5){$Y=2016;}elseif($_REQUEST['YI']==6){$Y=2017;}elseif($_REQUEST['YI']==7){$Y=2018;}elseif($_REQUEST['YI']==8){$Y=2019;}elseif($_REQUEST['YI']==9){$Y=2020;}
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
window.print(); window.close();
</Script>
</head>
<body class="body">
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" name="YId" id="YId" value="<?php echo $YearId; ?>" />
<input type="hidden" name="UserId" id="UserId" value="<?php echo $UserId; ?>" />
<input type="hidden" name="DeptValue" id="DeptValue" value="<?php echo $_REQUEST['value']; ?>" />
<table class="table" border="0">
<tr>
 <td>
  <table width="100%" style="margin-top:0px;" border="0">
   	 <tr>
	  <td valign="top" align="center" width="100%" id="MainWindow">
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
<table border="0" style="margin-top:0px; width:95%;">
	<tr>
		<td align="" width="100%" valign="top">
		   <table border="0">
       		 <tr><td colspan="2">
			       <table border="0">
                     <tr>
					  <td colspan="12" align="left" class="heading">HOD Increment &nbsp;<span id="ReturnValue">&nbsp;</span></td>
					  <td>			
				   </td>                           			 
		           </tr>
                  </table>
				</td>
			 </tr>
<?php //---------------------------------------Display Record----------------------------------------------------------------- ?>
<?php $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI']."", $con); $rY=mysql_fetch_assoc($sY); 
      $FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; ?>					 					 
<?php 
if($_REQUEST['ee']=='Dept')
{ $name='Department Wise'; 
  if($_REQUEST['value']!=0)
  { $sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); $name2=$resA['DepartmentName']; }
  else{$name2='All Department';}
}
elseif($_REQUEST['ee']=='App')
{ $name='Apraiser Wise';
  $sqlA=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); 
  $name2=$resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname'];
}
elseif($_REQUEST['ee']=='Rev')
{ $name='Reviewer Wise';
  $sqlA=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); 
  $name2=$resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname'];
}
elseif($_REQUEST['ee']=='Hod')
{ $name='HOD Wise';
  $sqlA=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); 
  $name2=$resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname'];
}
?>

<tr>
 <td>
   <table border="1" width="1800">
     <tr> 
 <td colspan="11" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Times New Roman; font-weight:bold;">&nbsp;HOD Increment <?php echo $name; ?> : &nbsp;&nbsp;(&nbsp;<?php echo $name2.'-'.$PRD; ?>&nbsp;)&nbsp;&nbsp;&nbsp;
<a href="#" onClick="PrintHodInc(<?php echo $_REQUEST['value']; ?>,<?php echo $_REQUEST['YI']; ?>,'<?php echo $_REQUEST['ee']; ?>')" style="color:#F9F900; font-size:12px;">Print</a>&nbsp;&nbsp;<a href="#" onClick="ExportHodInc(<?php echo $_REQUEST['value']; ?>,<?php echo $_REQUEST['YI']; ?>,'<?php echo $_REQUEST['ee']; ?>')" style="color:#F9F900; font-size:12px;">Export Excel</a>
	  </td>
	  <td rowspan="2" bgcolor="#7a6189" align="center" style="color:#FFFFFF;" class="All_50"><b>PREVIOUS GROSS</b></td>
	  <td colspan="11" bgcolor="#7a6189" align="center" style="color:#FFFFFF;" class="All_50"><b>PROPOSED</b></td>
	 </tr>
	 <tr bgcolor="#7a6189">
	    <td>&nbsp;</td>
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>SNo.</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>EC</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_250"><b>Name</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_120"><b>Department</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>Grade</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_150"><b>Designation</b></td>	
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>Form</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>Attach</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>Score</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>Rating</b></td>
		
   		<td align="center" style="color:#FFFFFF;" class="All_50"><b>Score</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>Rating</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>Grade</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_150"><b>Designation</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>PGSPM</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>% PIS</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>PSC</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>% PSC</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>TISPM</b></td>		 
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>% TISPM</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>TPGSPM</b></td>

	</tr>
<?php 
if($_REQUEST['ee']=='Dept')
{  
  if($_REQUEST['value']==0)
  { $sql=mysql_query("select hrm_employee.*,EmpPmsId,Emp_TotalFinalScore,Emp_TotalFinalRating,EmpCurrGrossPM,Hod_TotalFinalScore,Hod_TotalFinalRating,Hod_EmpDesignation,Hod_EmpGrade,Hod_ProIncSalary,Hod_Percent_ProIncSalary,Hod_ProCorrSalary,Hod_Percent_ProCorrSalary,Hod_IncNetMonthalySalary,Hod_Percent_IncNetMonthalySalary,Hod_GrossMonthlySalary,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$Y."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by hrm_employee.EmpCode ASC", $con); }
  else{ $sql=mysql_query("select hrm_employee.*,EmpPmsId,Emp_TotalFinalScore,Emp_TotalFinalRating,EmpCurrGrossPM,Hod_TotalFinalScore,Hod_TotalFinalRating,Hod_EmpDesignation,Hod_EmpGrade,Hod_ProIncSalary,Hod_Percent_ProIncSalary,Hod_ProCorrSalary,Hod_Percent_ProCorrSalary,Hod_IncNetMonthalySalary,Hod_Percent_IncNetMonthalySalary,Hod_GrossMonthlySalary,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$Y."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by hrm_employee.EmpCode ASC", $con); }
}
elseif($_REQUEST['ee']=='App')
{ $sql=mysql_query("select hrm_employee.*,EmpPmsId,Emp_TotalFinalScore,Emp_TotalFinalRating,EmpCurrGrossPM,Hod_TotalFinalScore,Hod_TotalFinalRating,Hod_EmpDesignation,Hod_EmpGrade,Hod_ProIncSalary,Hod_Percent_ProIncSalary,Hod_ProCorrSalary,Hod_Percent_ProCorrSalary,Hod_IncNetMonthalySalary,Hod_Percent_IncNetMonthalySalary,Hod_GrossMonthlySalary,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Appraiser_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by hrm_employee.EmpCode ASC", $con);
}
elseif($_REQUEST['ee']=='Rev')
{ $sql=mysql_query("select hrm_employee.*,EmpPmsId,Emp_TotalFinalScore,Emp_TotalFinalRating,EmpCurrGrossPM,Hod_TotalFinalScore,Hod_TotalFinalRating,Hod_EmpDesignation,Hod_EmpGrade,Hod_ProIncSalary,Hod_Percent_ProIncSalary,Hod_ProCorrSalary,Hod_Percent_ProCorrSalary,Hod_IncNetMonthalySalary,Hod_Percent_IncNetMonthalySalary,Hod_GrossMonthlySalary,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Reviewer_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by hrm_employee.EmpCode ASC", $con);
}
elseif($_REQUEST['ee']=='Hod')
{ $sql=mysql_query("select hrm_employee.*,EmpPmsId,Emp_TotalFinalScore,Emp_TotalFinalRating,EmpCurrGrossPM,Hod_TotalFinalScore,Hod_TotalFinalRating,Hod_EmpDesignation,Hod_EmpGrade,Hod_ProIncSalary,Hod_Percent_ProIncSalary,Hod_ProCorrSalary,Hod_Percent_ProCorrSalary,Hod_IncNetMonthalySalary,Hod_Percent_IncNetMonthalySalary,Hod_GrossMonthlySalary,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by hrm_employee.EmpCode ASC", $con);
}
 $Sno=1; while($res=mysql_fetch_array($sql)){ 
 $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['HR_Curr_DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); 
 $sqlDesig=mysql_query("select DesigName,DesigCode from hrm_designation where DesigId=".$res['HR_CurrDesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
 $sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['HR_CurrGradeId'], $con);  $resG=mysql_fetch_assoc($sqlG);
 ?>	   
	 <tr bgcolor="#FFFFFF" id="TR<?php echo $Sno; ?>">
	    <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo $Sno; ?>" onClick="FucChk(<?php echo $Sno; ?>)" /></td>
		<td align="center" class="recCls"><?php echo $Sno; ?></td>
		<td align="center" class="recCls"><?php echo $res['EmpCode']; ?></td>
		<td class="recCls"><?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>	
		<td class="recCls"><?php echo $resDept['DepartmentCode']; ?></td>
		<td align="center" class="recCls"><?php echo $resG['GradeValue']; ?></td>
		<td class="recCls"><?php echo $resDesig['DesigCode']; ?></td>
		<td align="center" class="recCls"><a href="javascript:OpenWindow(<?php echo $res['EmployeeID'].','.$res['EmpPmsId']; ?>)">Click</a></td>
		<td align="center" class="recCls"><?php $sqlR=mysql_query("select * from hrm_employee_pms_uploadfile where EmpPmsId=".$res['EmpPmsId']." AND EmployeeID=".$res['EmployeeID']." AND YearId=".$_REQUEST['YI'], $con); $no=1; $resR=mysql_num_rows($sqlR); if($resR>0){ ?><a href="#" onClick="UploadEmpfile(<?php echo $res['EmpPmsId'].','.$res['EmployeeID']; ?>)">Yes</a><?php } if($resR==0){echo 'No'; }?></td>	
		<td align="center" class="recCls"><?php echo $res['Emp_TotalFinalScore']; ?></td>
		<td align="center" class="recCls"><?php echo $res['Emp_TotalFinalRating']; ?></td>		
        <td align="right" class="recCls"><?php echo $res['EmpCurrGrossPM']; ?></td>
				
		<td align="center" class="recCls"><?php echo $res['Hod_TotalFinalScore']; ?></td> 
		<td align="center" class="recCls"><?php echo $res['Hod_TotalFinalRating']; ?></td> 
<?php if($res['Hod_EmpDesignation']!=$res['HR_CurrDesigId']){ $sqlDesigH=mysql_query("select DesigName,DesigCode from hrm_designation where DesigId=".$res['Hod_EmpDesignation']." AND CompanyId=".$CompanyId, $con); $resDesigH=mysql_fetch_assoc($sqlDesigH); $DesigH=$resDesigH['DesigCode']; }else{$DesigH='';}
if($res['Hod_EmpGrade']!=$res['HR_CurrGradeId']){ $sqlGH=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Hod_EmpGrade']." AND CompanyId=".$CompanyId, $con); $resGH=mysql_fetch_assoc($sqlGH); $GradeH=$resGH['GradeValue']; }else{$GradeH='';} ?>	
		<td class="recCls" align="center"><?php echo $GradeH; ?></td>
        <td class="recCls"><?php echo $DesigH; ?></td> 		
		<td class="recCls" align="right"><?php echo $res['Hod_ProIncSalary']; ?></td>
		<td class="recCls" align="center"><?php echo $res['Hod_Percent_ProIncSalary']; ?></td>
		<td class="recCls" align="right"><?php echo $res['Hod_ProCorrSalary']; ?></td>
        <td class="recCls" align="center"><?php echo $res['Hod_Percent_ProCorrSalary']; ?></td> 		
        <td class="recCls" align="right"><?php echo $res['Hod_IncNetMonthalySalary']; ?></td>
        <td class="recCls" align="center"><?php echo $res['Hod_Percent_IncNetMonthalySalary']; ?></td>
		<td class="recCls" align="right"><?php echo $res['Hod_GrossMonthlySalary']; ?></td> 		
		
	 </tr>
	 <?php $Sno++; } ?>   </table>
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