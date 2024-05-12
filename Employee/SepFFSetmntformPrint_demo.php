<?php require_once('../AdminUser/config/config.php'); ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Action for Resignation</title>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<style> .Text {font-family:Times New Roman;font-size:14px;}
.Text2 {font-family:Times New Roman;font-size:16px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}</style>
<script language="javascript" type="text/javascript">
function PrintPage() 
{ window.print(); window.close(); }
</script>
</head>
<body bgcolor="#E0DBE3" onLoad="PrintPage()">
<table border="0" style="width:950px;" align="center">
<tr>
  <td style="width:1090px;" valign="top" align="center">
<?php if($_REQUEST['act']!='')  { ?>	
<?php $sqlSE=mysql_query("select * from hrm_employee_separation where EmpSepId=".$_REQUEST['si'], $con); $resSE=mysql_fetch_assoc($sqlSE);
$sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,DesigId,DepartmentId,DR,Gender,Married,ParAdd,ParAdd_State,ParAdd_City,DateJoining,Fa_SN,FatherName,GradeId,AccountNo,BankName,BranchName from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_contact ON hrm_employee.EmployeeID=hrm_employee_contact.EmployeeID INNER JOIN hrm_employee_family ON hrm_employee.EmployeeID=hrm_employee_family.EmployeeID where hrm_employee.EmployeeID=".$resSE['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE); 
$sqlDept=mysql_query("select DepartmentCode,DepartmentName from hrm_department where DepartmentId=".$resE['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
if($resE['DR']=='Y'){$M='Dr.';} elseif($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';}  $NameE=$M.' '.strtoupper($resE['Fname']).' '.strtoupper($resE['Sname']).' '.strtoupper($resE['Lname']); 
$sqlCity=mysql_query("select CityName from hrm_city where CityId=".$resE['ParAdd_City'], $con); $resCity=mysql_fetch_assoc($sqlCity);
$sqlState=mysql_query("select StateName from hrm_state where StateId=".$resE['ParAdd_State'], $con); $resState=mysql_fetch_assoc($sqlState);
$sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$resE['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig); 
$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeId=".$resE['GradeId'], $con); $resGrade=mysql_fetch_assoc($sqlGrade);  
?>	
<table border="0">
 <tr>
<?php /*************************************** ADMIN *****************************************************/ ?>  
<td style="display:;width:950px;"> <?php //if($_REQUEST['Dept']=='Ad'){echo 'block';}else{echo 'block';}?>
 <table border="0" cellpadding="0" style="width:950px;">
  <tr><td>&nbsp;</td></tr>
  <tr><td class="Text2" style="color:#006200; font-size:18px;" align="center"><b>VNR SEEDS PVT. LTD.</b></td></tr> 
  <tr><td class="Text2" style="" align="center"><b>Full & Final Settlement Statement</b></td></tr> 
  <tr><td>&nbsp;</td></tr>
  <tr><td>&nbsp;</td></tr>
  <tr><td>&nbsp;</td></tr>
  <tr>
   <td>
    <table>
	 <tr><td class="Text2"><b><u>Personal History</u></b></td></tr>
<form enctype="multipart/form-data" name="formname" method="post" onSubmit="return validate(this)">	 
	 <tr>
	  <td><table border="0"><tr><td class="Text" style="width:110px;">Reference No. :</td>
	  <td>
	   <table border="1">
		<tr bgcolor="#FFFFFF">
		 <td class="Text" style="width:20px;" align="center"> F </td><td class="Text" style="width:20px;" align="center"> & </td>
		 <td class="Text" style="width:20px;" align="center"> F </td>
		 <td class="Text" style="width:20px;" align="center"><?php echo date("d",strtotime($resSE['FullFinalDate'])); ?></td>
		 <td class="Text" style="width:20px;" align="center"><?php echo date("m",strtotime($resSE['FullFinalDate'])); ?></td>
		 <td class="Text" style="width:40px;" align="center"><?php echo date("Y",strtotime($resSE['FullFinalDate'])); ?></td>
         <input type="hidden" name="SId" value="<?php echo $_REQUEST['si']; ?>" /> 
		</tr>
	   </table>
	  </td></tr></table></td>
	 </tr> 
	 <tr>
	  <td><table border="0"><tr>
	  <td>
	   <table border="1">
		<tr bgcolor="#FFFFFF">
		  <td class="Text" style="width:115px;" align="">&nbsp;Employee Name :</td><td class="Text" style="width:265px;">&nbsp;<?php echo $NameE; ?></td>
		  <td rowspan="2" style="width:20px;" bgcolor="#E0DBE3">&nbsp;</td>
		  <td class="Text" style="width:60px;" align="">&nbsp;Grade :</td><td class="Text" style="width:100px;">&nbsp;<?php echo $resGrade['GradeValue']; ?></td>
		  <td rowspan="2" style="width:20px;" bgcolor="#E0DBE3"></td>
		  <td class="Text" style="width:90px;" align="">&nbsp;Department :</td><td class="Text" style="width:140px;">&nbsp;<?php echo $resDept['DepartmentName']; ?></td>
		</tr>
		<tr bgcolor="#FFFFFF">
		  <td class="Text" style="width:115px;" align="">&nbsp;Designation :</td><td class="Text" style="width:265px;">&nbsp;<?php echo $resDesig['DesigName']; ?></td>
		  <td class="Text" style="width:60px;" align="">&nbsp;DOJ :</td><td class="Text" style="width:100px;">&nbsp;<?php echo date("d-m-Y",strtotime($resE['DateJoining'])); ?></td>
		  <td class="Text" style="width:90px;" align="">&nbsp;Resignation :</td><td class="Text" style="width:140px;">&nbsp;<?php echo date("d-m-Y",strtotime($resSE['Emp_ResignationDate'])); ?></td>
		</tr>
		<tr bgcolor="#FFFFFF">
		  <td class="Text" style="width:115px;" align="">&nbsp;Relieving Date :</td><td class="Text" style="width:265px;">&nbsp;<?php echo date("d-m-Y",strtotime($resSE['HR_RelievingDate'])); ?></td>
		  <td colspan="6" style="width:20px;" bgcolor="#E0DBE3">&nbsp;</td>
		</tr>
	   </table>
	  </td></tr></table></td>
	  </tr>
	  <tr><td>&nbsp;</td></tr>
	  
	      <tr><td class="Text2"><b><u>Bank Account Details</u></b></td></tr>
     	  <tr>
	      <td><table border="0"><tr><td class="Text" style="width:110px;">Account No :</td>
		  <td>
		   <table border="1">
		    <tr bgcolor="#FFFFFF">
			  <td class="Text" style="width:150px;font-size:14px;" align="">&nbsp;<?php echo '000'.$resE['AccountNo']; ?></td>
			</tr>
		   </table>
		  </td></tr></table></td>
	  </tr>
     <tr>
	      <td><table border="0"><tr><td class="Text" style="width:110px;">Bank name :</td>
		  <td>
		   <table border="1">
		    <tr bgcolor="#FFFFFF">
			  <td class="Text" style="width:300px;" align="">&nbsp;<?php echo $resE['BankName']; ?></td>
			</tr>
		   </table>
		  </td></tr></table></td>
	  </tr>
     <tr>
	      <td><table border="0"><tr><td class="Text" style="width:110px;">Branch :</td>
		  <td>
		   <table border="1">
		    <tr bgcolor="#FFFFFF">
			  <td class="Text" style="width:300px;" align="">&nbsp;<?php echo $resE['BranchName']; ?></td>
			</tr>
		   </table>
		  </td></tr></table></td>
	  </tr>
	  <tr><td>&nbsp;</td></tr>
	  
	  <tr><td class="Text2"><b><u>Details Of Notice Pay Cheque Collected from Employee</u></b></td></tr>
	   <tr>
	      <td><table border="0"><tr><td class="Text" style="width:110px;">Cheque No :</td>
		  <td>
		   <table border="1">
		    <tr bgcolor="#FFFFFF">
			  <td class="Text" style="width:300px;" align="">&nbsp;<?php if($resSE['ChequeNo']!='' AND $resSE['ChequeNo']!=0){echo $resSE['ChequeNo'];} ?></td>
			</tr>
		   </table>
		  </td></tr></table></td>
	  </tr>
	  <tr>
	      <td><table border="0"><tr><td class="Text" style="width:110px;">MICR No :</td>
		  <td>
		   <table border="1">
		    <tr bgcolor="#FFFFFF">
			  <td class="Text" style="width:300px;" align="">&nbsp;<?php if($resSE['MICRNo']!='' AND $resSE['MICRNo']!=0){echo $resSE['MICRNo'];} ?></td>
			</tr>
		   </table>
		  </td></tr></table></td>
	  </tr>
	  <tr>
	      <td><table border="0"><tr><td class="Text" style="width:110px;">Bank Name :</td>
		  <td>
		   <table border="1">
		    <tr bgcolor="#FFFFFF">
			  <td class="Text" style="width:300px;" align="">&nbsp;<?php if($resSE['NoticeBankName']!=''){echo $resSE['NoticeBankName'];} ?></td>
			</tr>
		   </table>
		  </td></tr></table></td>
	  </tr>
	  <tr>
	      <td><table border="0"><tr><td class="Text" style="width:110px;">Amount :</td>
		  <td>
		   <table border="1">
		    <tr bgcolor="#FFFFFF">
			  <td class="Text" style="width:150px;" align="">&nbsp;<?php if($resSE['NoticeAmount']!='' AND $resSE['NoticeAmount']!=0){echo $resSE['NoticeAmount'];} ?></td>
			</tr>
		   </table>
		  </td></tr></table></td>
	  </tr>
	   <tr>
	      <td><table border="0"><tr><td class="Text" style="width:110px;">Remark :</td>
		  <td>
		   <table border="1">
		    <tr bgcolor="#FFFFFF">
			  <td class="Text" style="width:650px;" align="">&nbsp;<?php if($resSE['NoticeRemark']!=''){echo $resSE['NoticeRemark'];} ?></td>
			</tr>
		   </table>
		  </td></tr></table></td>
	  </tr>
	  <tr><td>&nbsp;</td></tr> 
	  <tr><td>&nbsp;</td></tr>
	  <tr><td class="Text2"><b>Contact Details</b></td></tr>
	  <tr>
	   <td style="width:800px;"><table border="0">
	    <tr bgcolor="#E0DBE3">
	     <td class="Text" style="width:400px;" align="center"><b>Personal</b></td>
		 <td  style="width:50px;">&nbsp;</td>
		 <td class="Text" style="width:400px;" align="center"><b>Permanent</b></td>
		</tr>
		</table>
	  </tr> 
<?php $sqlCont=mysql_query("select * from hrm_employee_contact where EmployeeID=".$resSE['EmployeeID'],$con); $resCont=mysql_fetch_assoc($sqlCont);?>	  
	   <tr>
	   <td style="width:800px;"><table border="0">
	    <tr bgcolor="#E0DBE3">
	     <td class="Text" style="width:400px;" align="center">
		   <table bgcolor="#FFFFFF" border="1">
		   <tr>
		    <td style="width:100px;" class="Text">&nbsp;Name</td>
			<td style="width:300px;" class="Text">&nbsp;<?php echo $NameE; ?></td>
		   </tr>
		   <tr>
		    <td style="width:100px;" class="Text">&nbsp;Address</td>
			<td style="width:300px;" class="Text">&nbsp;<?php echo $resCont['CurrAdd']; ?></td>
		   </tr>
		   <tr>
<?php
$sqlCity2=mysql_query("select CityName from hrm_city where CityId=".$resCont['CurrAdd_City'], $con); $resCity2=mysql_fetch_assoc($sqlCity2);
$sqlState2=mysql_query("select StateName from hrm_state where StateId=".$resCont['CurrAdd_State'], $con); $resState2=mysql_fetch_assoc($sqlState2);
?>		   
		    <td style="width:100px;" class="Text">&nbsp;State</td>
			<td style="width:300px;" class="Text">&nbsp;<?php echo $resState2['StateName']; ?></td>
		   </tr>
		   <tr>
		    <td style="width:100px;" class="Text">&nbsp;City</td>
			<td style="width:300px;" class="Text">&nbsp;<?php echo $resCity2['CityName']; ?></td>
		   </tr>
		   <tr>
		    <td style="width:100px;" class="Text">&nbsp;Pin No</td>
			<td style="width:300px;" class="Text">&nbsp;<?php echo $resCont['CurrAdd_PinNo']; ?></td>
		   </tr>
		  </table>
		 </td>
		 <td  style="width:50px;">&nbsp;</td>
		 <td class="Text" style="width:400px;" align="center">
		   <table bgcolor="#FFFFFF" border="1">
		   <tr>
		    <td style="width:100px;" class="Text">&nbsp;Name</td>
			<td style="width:300px;" class="Text">&nbsp;<?php echo $NameE; ?></td>
		   </tr>
		   <tr>
		    <td style="width:100px;" class="Text">&nbsp;Address</td>
			<td style="width:300px;" class="Text">&nbsp;<?php echo $resCont['ParAdd']; ?></td>
		   </tr>
<?php
$sqlCity3=mysql_query("select CityName from hrm_city where CityId=".$resCont['ParAdd_City'], $con); $resCity3=mysql_fetch_assoc($sqlCity3);
$sqlState3=mysql_query("select StateName from hrm_state where StateId=".$resCont['ParAdd_State'], $con); $resState3=mysql_fetch_assoc($sqlState3);
?>				   
		   <tr>
		    <td style="width:100px;" class="Text">&nbsp;State</td>
			<td style="width:300px;" class="Text">&nbsp;<?php echo $resState3['StateName']; ?></td>
		   </tr>
		   <tr>
		    <td style="width:100px;" class="Text">&nbsp;City</td>
			<td style="width:300px;" class="Text">&nbsp;<?php echo $resCity3['CityName']; ?></td>
		   </tr>
		   <tr>
		    <td style="width:100px;" class="Text">&nbsp;Pin No</td>
			<td style="width:300px;" class="Text">&nbsp;<?php echo $resCont['ParAdd_PinNo']; ?></td>
		   </tr>
		  </table>
		 </td>
		</tr>
		</table>
	  </tr>
<?php 	
      $timestamp_start = strtotime($resE['DateJoining']);  $timestamp_end = strtotime(date("Y-m-d")); $difference = abs($timestamp_end - $timestamp_start); 
	  $days = floor($difference/(60*60*24)); $months = floor($difference/(60*60*24*30)); $years = $difference/(60*60*24*365); /* $Y2=$years*12;  $M2=$months-$Y2; */ 
	  $VNRExpMain=number_format($years, 1);
?> 		 
        <tr><td>&nbsp;</td></tr>
     	<tr>
	      <td><table border="0"><tr><td class="Text" style="width:235px;"><b>Total VNR Experience (In Years) :</b></td>
		  <td>
		   <table border="1">
		    <tr bgcolor="#FFFFFF">
			  <td class="Text" style="width:150px;font-size:14px;" align="">&nbsp;<?php echo $resSE['FF_EmpVnrExp'].'   year'; ?></td>
			</tr>
		   </table>
		  </td></tr></table></td>
	  </tr>
	  <tr><td>&nbsp;</td></tr>
	  <tr><td>&nbsp;</td></tr>
<?php $sqlCtc=mysql_query("select * from hrm_employee_ctc where EmployeeID=".$resSE['EmployeeID']." AND Status='A'",$con); $resCtc=mysql_fetch_assoc($sqlCtc);?>	  
	  <tr>
	   <td style="width:800px;"><table border="1">
	    <tr bgcolor="#7a6189">
	     <td style="width:850px;" colspan="4" class="Text" style="width:400px;" align="center"><b style="color:#FFFFFF;">
		 Gratuity Calculation (Only for VNR Experience> or=5 yrs)</b></td>
		</tr>
		
		<tr bgcolor="#FFFFFF">
	     <td style="width:250px;" class="Text">&nbsp;Monthly Basic(Rs)</td>
		 <td style="width:200px;" class="Text">&nbsp;<?php if($resCtc['BAS']=='Y' AND $resCtc['STIPEND']=='N') { echo intval($resCtc['BAS_Value']); } if($resCtc['BAS']=='N' AND $resCtc['STIPEND']=='Y') { echo intval($resCtc['STIPEND_Value']); }?></td>
		 <td style="width:250px;" class="Text">&nbsp;Gross Monthly (Rs)</td>
		 <td style="width:200px;" class="Text">&nbsp;<?php echo $resCtc['GrossSalary_PostAnualComponent_Value']; ?></td>
		</tr>	
<?php $sqlHr=mysql_query("select * from hrm_employee_separation_nochr where EmpSepId=".$_REQUEST['si'],$con); $resHr=mysql_fetch_assoc($sqlHr); ?>						
		<tr bgcolor="#FFFFFF">
	     <td style="width:250px;" class="Text">&nbsp;Gratuity to be Paid</td>
		 <td style="width:200px;" class="Text">&nbsp;<?php echo intval($resHr['Gratuity']); ?></td>
		 <td style="width:250px;" class="Text">&nbsp;</td>
		 <td style="width:200px;" class="Text">&nbsp; </td>
		</tr>		
		<tr bgcolor="#7a6189"><td colspan="4" class="Text" style="width:400px;" align="center"><b style="color:#FFFFFF;">Leave Encashment</b></td></tr>
		<tr bgcolor="#FFFFFF">
	     <td style="width:250px;" class="Text">&nbsp;Available EL(Days)</td>
		 <td style="width:200px;" class="Text">&nbsp;<?php echo $resHr['TotEL']; ?></td>
		 <td style="width:250px;" class="Text">&nbsp;Encashment EL (Days)</td>
		 <td style="width:200px;" class="Text">&nbsp;<?php echo $resHr['EnCashEL']; ?></td>
		</tr>
		<tr bgcolor="#FFFFFF">
		 <td style="width:250px;" class="Text">&nbsp;Encashable amount(Rs.)</td>
		 <td style="width:200px;" class="Text">&nbsp;<?php echo $resHr['LE']; ?></td>
		</tr>
		<tr bgcolor="#7a6189"><td colspan="4" class="Text" style="width:400px;" align="center"><b style="color:#FFFFFF;">Notice Period</b></td></tr>
		<tr bgcolor="#FFFFFF">
	     <td style="width:250px;" class="Text">&nbsp;Actual Notice Period(Days)</td>
		 <td style="width:200px;" class="Text">&nbsp;<?php echo 26; ?></td>
		 <td style="width:250px;" class="Text">&nbsp;Served notice period(Days)</td>
		 <td style="width:200px;" class="Text">&nbsp;<?php echo $resHr['ServedDay']; ?></td>
		</tr>
		<tr bgcolor="#FFFFFF">
		 <td style="width:250px;" class="Text">&nbsp;Recoverable notice period(Days)</td>
		 <td style="width:200px;" class="Text">&nbsp;<?php echo $resHr['RecoveryDay']; ?></td>
		 <td style="width:250px;" class="Text">&nbsp;Notice Period Amount</td>
		 <td style="width:200px;" class="Text">&nbsp;<?php echo $resHr['NPR_Actual']; ?></td>
		</tr>
		</table>
	  </tr> 
	  <tr><td>&nbsp;</td></tr>
	  <tr><td>&nbsp;</td></tr>
	  <tr><td>&nbsp;</td></tr>
	  <tr><td>&nbsp;</td></tr>
	  <tr><td>&nbsp;</td></tr>
	  <tr><td>&nbsp;</td></tr>
	  <tr><td>&nbsp;</td></tr>
	  <tr><td>&nbsp;</td></tr>
	  <tr><td>&nbsp;</td></tr>
	  <tr><td class="Text2" align="center"><b><u>Final Calculation</u></b></td></tr>
	  <tr><td>&nbsp;</td></tr>
	  <tr><td>&nbsp;</td></tr>
	  <tr><td>&nbsp;</td></tr>
      <tr><td class="Text2">&nbsp;Salaried days =&nbsp;&nbsp;<u>&nbsp;&nbsp;<b><?php echo $resHr['TotWorkDay']; ?></b>&nbsp;&nbsp;</u>&nbsp;days.&nbsp;&nbsp;<?php /*(Mention Months)*/ ?></td></tr>
	   <tr>
	   <td style="width:800px;"><table border="0">
	    <tr bgcolor="#E0DBE3">
	     <td class="Text" style="width:400px;" align="center" valign="top">
		   <table bgcolor="#FFFFFF" border="1">
		   <tr bgcolor="#7a6189">
		    <td style="width:240px;color:#FFFFFF;" class="Text" align="center"><b>Earningd(Rs.)</b></td>
			<td style="width:80px;color:#FFFFFF;" class="Text" align="center"><b>Rate</b></td>
			<td style="width:80px;color:#FFFFFF;" class="Text" align="center"><b>Monthly</b></td>
		   </tr>
		   <tr bgcolor="#FFFFFF">
		    <td style="width:240px;" class="Text" align="">&nbsp;Basic</td>
			<td style="width:80px;" class="Text" align="right"><?php if($resCtc['BAS']=='Y' AND $resCtc['STIPEND']=='N') { echo intval($resCtc['BAS_Value']); } if($resCtc['BAS']=='N' AND $resCtc['STIPEND']=='Y') { echo intval($resCtc['STIPEND_Value']); }?>&nbsp;</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resHr['Basic']); ?>&nbsp;</td>
		   </tr>
		   <tr bgcolor="#FFFFFF">
		    <td style="width:240px;" class="Text" align="">&nbsp;HRA</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resCtc['HRA_Value']); ?>&nbsp;</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resHr['HRA']); ?>&nbsp;</td>
		   </tr>
		   <tr bgcolor="#FFFFFF">
		    <td style="width:240px;" class="Text" align="">&nbsp;Conveyance Allowance</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resCtc['CONV_Value']); ?>&nbsp;</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resHr['CA']); ?>&nbsp;</td>
		   </tr>
		   <tr bgcolor="#FFFFFF">
		    <td style="width:240px;" class="Text" align="">&nbsp;Special Allowance</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resCtc['SPECIAL_ALL_Value']); ?>&nbsp;</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resHr['SA']); ?>&nbsp;</td>
		   </tr>
		   <tr bgcolor="#FFFFFF">
		    <td style="width:240px;" class="Text" align="">&nbsp;Daily Allowance</td>
			<td style="width:80px;" class="Text" align="right">&nbsp;</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resHr['DA']); ?>&nbsp;</td>
		   </tr>	
		    <tr bgcolor="#FFFFFF">
		    <td style="width:240px;" class="Text" align="">&nbsp;Arrear</td>
			<td style="width:80px;" class="Text" align="right">&nbsp;</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resHr['Arrear']); ?>&nbsp;</td>
		   </tr>	
		    <tr bgcolor="#FFFFFF">
		    <td style="width:240px;" class="Text" align="">&nbsp;Incentive</td>
			<td style="width:80px;" class="Text" align="right">&nbsp;</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resHr['Incen']); ?>&nbsp;</td>
		   </tr>	
		   <tr bgcolor="#8F8F8F">
		    <td style="width:240px;" class="Text" align="">&nbsp;<b>Monthly Gross Earnings</b></td>
			<td style="width:80px;" class="Text" align="right"><b><?php echo intval($resCtc['GrossSalary_PostAnualComponent_Value']); ?></b>&nbsp;</td>
			<td style="width:80px;" class="Text" align="right"><b><?php echo intval($resHr['Gross']); ?></b>&nbsp;</td>
		   </tr>	
		   	<tr bgcolor="#FFFFFF">
		    <td style="width:240px;" class="Text" align="">&nbsp;LTA</td>
			<td style="width:80px;" class="Text" align="right"><?php echo round($resCtc['LTA_Value']/12); ?>&nbsp;</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resHr['LTA']); ?>&nbsp;</td>
		   </tr>
		   <tr bgcolor="#FFFFFF">
		    <td style="width:240px;" class="Text" align="">&nbsp;Medical Allowance</td>
			<td style="width:80px;" class="Text" align="right"><?php echo round($resCtc['MED_REM_Value']/12); ?>&nbsp;</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resHr['MA']); ?>&nbsp;</td>
		   </tr>
		   <tr bgcolor="#FFFFFF">
		    <td style="width:240px;" class="Text" align="">&nbsp;CEA</td>
			<td style="width:80px;" class="Text" align="right"><?php echo round($resCtc['CHILD_EDU_ALL_Value']/12); ?>&nbsp;</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resHr['CEA']); ?>&nbsp;</td>
		   </tr>	
		   	<tr bgcolor="#8F8F8F">
		    <td style="width:240px;" class="Text" align="">&nbsp;<b>Annual Components earnings</b></td>
			<td style="width:80px;" class="Text" align="right">&nbsp;</td>
			<td style="width:80px;" class="Text" align="right">&nbsp;</td>
		   </tr>	
		   	<tr bgcolor="#FFFFFF">
		    <td colspan="2" style="width:240px;" class="Text" align="">&nbsp;Leave encashment</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resHr['LE']); ?>&nbsp;</td>
		   </tr>
		   <tr bgcolor="#FFFFFF">
		    <td colspan="2" style="width:240px;" class="Text" align="">&nbsp;Bonus</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resHr['Bonus']); ?>&nbsp;</td>
		   </tr>
		   <tr bgcolor="#FFFFFF">
		    <td colspan="2" style="width:240px;" class="Text" align="">&nbsp;Gratuity</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resHr['Gratuity']); ?>&nbsp;</td>
		   </tr>
                   <tr bgcolor="#FFFFFF">
		    <td colspan="2" style="width:240px;" class="Text" align="">&nbsp;Mediclaim Expense</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resHr['Mediclaim']); ?>&nbsp;</td>
		   </tr>
		   <tr bgcolor="#FFFFFF">
		    <td colspan="2" style="width:240px;" class="Text" align="">&nbsp;Recovery Towards Service Bond</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resHr['RTSB']); ?>&nbsp;</td>
		   </tr>
		   	<tr bgcolor="#8F8F8F">
		    <td colspan="2" style="width:240px;" class="Text" align="">&nbsp;<b>Other earnings</b></td>
			<td style="width:80px;" class="Text" align="right">&nbsp;</td>
		   </tr>	
<?php $sqlAcc=mysql_query("select * from hrm_employee_separation_nocacc where EmpSepId=".$_REQUEST['si'],$con); $resAcc=mysql_fetch_assoc($sqlAcc); ?>			
<?php if($resAcc['AccECP']=='Y' AND $resAcc['AccECP_Amt']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td colspan="2" style="width:240px;" class="Text" align="">&nbsp;Expenses Claim Pending</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resAcc['AccECP_Amt']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resAcc['AccIPS']=='Y' AND $resAcc['AccIPS_Amt']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td colspan="2" style="width:240px;" class="Text" align="">&nbsp;Investment Proofs Submited</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resAcc['AccIPS_Amt']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resAcc['AccAMS']=='Y' AND $resAcc['AccAMS_Amt']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td colspan="2" style="width:240px;" class="Text" align="">&nbsp;Advance Amount Settled</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resAcc['AccAMS_Amt']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resAcc['AccSAR']=='Y' AND $resAcc['AccSAR_Amt']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td colspan="2" style="width:240px;" class="Text" align="">&nbsp;Refund of excess payment pf notice pay received</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resAcc['AccSAR_Amt']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resAcc['AccWGR']=='Y' AND $resAcc['AccWGR_Amt']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td colspan="2" style="width:240px;" class="Text" align="">&nbsp;White Goods Recovery</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resAcc['AccWGR_Amt']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resAcc['AccSB']=='Y' AND $resAcc['AccSB_Amt']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td colspan="2" style="width:240px;" class="Text" align="">&nbsp;Service Bond</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resAcc['AccSB_Amt']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resAcc['AccTDSA']=='Y' AND $resAcc['AccTDSA_Amt']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td colspan="2" style="width:240px;" class="Text" align="">&nbsp;TDS Adjustment</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resAcc['AccTDSA_Amt']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resAcc['AccAO8']=='Y' AND $resAcc['AccAO_Amt8']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td colspan="2" style="width:240px;" class="Text" align="">&nbsp;<?php echo $resAcc['AccAO_Txt8']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resAcc['AccAO_Amt8']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resAcc['AccAO9']=='Y' AND $resAcc['AccAO_Amt9']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td colspan="2" style="width:240px;" class="Text" align="">&nbsp;<?php echo $resAcc['AccAO_Txt9']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resAcc['AccAO_Amt9']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resAcc['AccAO10']=='Y' AND $resAcc['AccAO_Amt10']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td colspan="2" style="width:240px;" class="Text" align="">&nbsp;<?php echo $resAcc['AccAO_Txt10']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resAcc['AccAO_Amt10']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resAcc['AccAO11']=='Y' AND $resAcc['AccAO_Amt11']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td colspan="2" style="width:240px;" class="Text" align="">&nbsp;<?php echo $resAcc['AccAO_Txt11']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resAcc['AccAO_Amt11']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resAcc['AccAO12']=='Y' AND $resAcc['AccAO_Amt12']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td colspan="2" style="width:240px;" class="Text" align="">&nbsp;<?php echo $resAcc['AccAO_Txt12']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resAcc['AccAO_Amt12']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resAcc['AccAO13']=='Y' AND $resAcc['AccAO_Amt13']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td colspan="2" style="width:240px;" class="Text" align="">&nbsp;<?php echo $resAcc['AccAO_Txt13']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resAcc['AccAO_Amt13']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resAcc['AccAO14']=='Y' AND $resAcc['AccAO_Amt14']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td colspan="2" style="width:240px;" class="Text" align="">&nbsp;<?php echo $resAcc['AccAO_Txt14']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resAcc['AccAO_Amt14']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resAcc['AccAO15']=='Y' AND $resAcc['AccAO_Amt15']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td colspan="2" style="width:240px;" class="Text" align="">&nbsp;<?php echo $resAcc['AccAO_Txt15']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resAcc['AccAO_Amt15']); ?>&nbsp;</td>
		   </tr>	
<?php } $TotalEarn=$resHr['TotEar']+$resAcc['TotAmt'];?>
<input type="hidden" name="TotalEarn" style="width:450px;" value="<?php echo $TotalEarn; ?>" />																											
		   <tr bgcolor="#8F8F8F">
		    <td colspan="2" style="width:240px;" class="Text" align="">&nbsp;<b>Total earnings</b></td>
			<td style="width:80px;" class="Text" align="right"><b><?php echo intval($TotalEarn); ?></b>&nbsp;</td>
		   </tr>			      		   		   
		  </table>
		 </td>
		 <td style="width:50px; "></td>
		 <td class="Text" style="width:330px;" align="center" valign="top">
		  <table bgcolor="#FFFFFF" border="1">
		   <tr bgcolor="#7a6189">
		    <td style="width:250px;color:#FFFFFF;" class="Text" align="center"><b>Deduction(Rs.)</b></td>
			<td style="width:80px;color:#FFFFFF;" class="Text" align="center"><b>Amount</b></td>
		   </tr>
		   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;PF</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resHr['PF']); ?>&nbsp;</td>
		   </tr>
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;Notice period</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resHr['NPR']); ?>&nbsp;</td>
		   </tr>
                  <?php if($resHr['ESIC']>0){ ?>
		   <tr bgcolor="#FFFFFF">
		    <td style="width:320px;" class="Text" align="">&nbsp;ESIC</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resHr['ESIC']); ?>&nbsp;</td>
		   </tr>
		   <?php } if($resHr['ARR_ESIC']>0){ ?>
		   <tr bgcolor="#FFFFFF">
		    <td style="width:320px;" class="Text" align="">&nbsp;Arrear For ESIC</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resHr['ARR_ESIC']); ?>&nbsp;</td>
		   </tr>
		   <?php } ?>

<?php if($resAcc['AccECP']=='Y' AND $resAcc['AccECP_Amt2']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;Expenses Claim Pending</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resAcc['AccECP_Amt2']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resAcc['AccIPS']=='Y' AND $resAcc['AccIPS_Amt2']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;Investment Proofs Submited</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resAcc['AccIPS_Amt2']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resAcc['AccAMS']=='Y' AND $resAcc['AccAMS_Amt2']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;Advance Amount Settled</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resAcc['AccAMS_Amt2']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resAcc['AccSAR']=='Y' AND $resAcc['AccSAR_Amt2']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td tyle="width:250px;" class="Text" align="">&nbsp;Salary Advance Recovery</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resAcc['AccSAR_Amt2']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resAcc['AccWGR']=='Y' AND $resAcc['AccWGR_Amt2']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;White Goods Recovery</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resAcc['AccWGR_Amt2']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resAcc['AccSB']=='Y' AND $resAcc['AccSB_Amt2']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;Service Bond</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resAcc['AccSB_Amt2']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resAcc['AccTDSA']=='Y' AND $resAcc['AccTDSA_Amt2']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;TDS Adjustment</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resAcc['AccTDSA_Amt2']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resAcc['AccAO8']=='Y' AND $resAcc['AccAO2_Amt8']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;<?php echo $resAcc['AccAO_Txt8']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resAcc['AccAO2_Amt8']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resAcc['AccAO9']=='Y' AND $resAcc['AccAO2_Amt9']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;<?php echo $resAcc['AccAO_Txt9']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resAcc['AccAO2_Amt9']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resAcc['AccAO10']=='Y' AND $resAcc['AccAO2_Amt10']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;<?php echo $resAcc['AccAO_Txt10']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resAcc['AccAO2_Amt10']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resAcc['AccAO11']=='Y' AND $resAcc['AccAO2_Amt11']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;<?php echo $resAcc['AccAO_Txt11']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resAcc['AccAO2_Amt11']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resAcc['AccAO12']=='Y' AND $resAcc['AccAO2_Amt12']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;<?php echo $resAcc['AccAO_Txt12']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resAcc['AccAO2_Amt12']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resAcc['AccAO13']=='Y' AND $resAcc['AccAO2_Amt13']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;<?php echo $resAcc['AccAO_Txt13']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resAcc['AccAO2_Amt13']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resAcc['AccAO14']=='Y' AND $resAcc['AccAO2_Amt14']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;<?php echo $resAcc['AccAO_Txt14']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resAcc['AccAO2_Amt14']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resAcc['AccAO15']=='Y' AND $resAcc['AccAO2_Amt15']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;<?php echo $resAcc['AccAO_Txt15']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resAcc['AccAO2_Amt15']); ?>&nbsp;</td>
		   </tr>	
<?php } ?>		
	
<?php if($resHr['BEP_Amt']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;Block ESS Password</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resHr['BEP_Amt']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resHr['BPP_Amt']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;Block Paypac Password</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resHr['BPP_Amt']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resHr['BExP_Amt']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:380px;" class="Text" align="">&nbsp;Block Expro Password</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resHr['BExP_Amt']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resHr['CV_Amt']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;Company Vehicle</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resHr['CV_Amt']); ?>&nbsp;</td>
		   </tr>	
<?php } ?>				
   
<?php $sqlIt=mysql_query("select * from hrm_employee_separation_nocit where EmpSepId=".$_REQUEST['si'],$con); $resIt=mysql_fetch_assoc($sqlIt); ?>				   
<?php if($resIt['ItSS_Amt']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;Sim Submitted</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resIt['ItSS_Amt']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resIt['ItCHS_Amt']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;Company Handset Submitted</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resIt['ItCHS_Amt']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resIt['ItLDH_Amt']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;Laptop/ Desktop Handour</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resIt['ItLDH_Amt']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resIt['ItCS_Amt']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;Camera Submitted</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resIt['ItCS_Amt']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resIt['ItDC_Amt']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;Datacard Submitted</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resIt['ItDC_Amt']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resIt['ItEAB_Amt']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;Email Account Blocked</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resIt['ItEAB_Amt']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resIt['ItMND_Amt']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;Mobile Number Disabled/ Transfered</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resIt['ItMND_Amt']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resIt['ItAO_Amt8']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;<?php echo $resIt['ItAO_Txt8']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resIt['ItAO_Amt8']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resIt['ItAO_Amt9']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;<?php echo $resIt['ItAO_Txt9']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resIt['ItAO_Amt9']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resIt['ItAO_Amt10']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;<?php echo $resIt['ItAO_Txt10']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resIt['ItAO_Amt10']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resIt['ItAO_Amt11']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;<?php echo $resIt['ItAO_Txt11']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resIt['ItAO_Amt11']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resIt['ItAO_Amt12']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;<?php echo $resIt['ItAO_Txt12']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resIt['ItAO_Amt12']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resIt['ItAO_Amt13']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;<?php echo $resIt['ItAO_Txt13']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resIt['ItAO_Amt13']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resIt['ItAO_Amt14']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;<?php echo $resIt['ItAO_Txt14']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resIt['ItAO_Amt14']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resIt['ItAO_Amt15']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;<?php echo $resIt['ItAO_Txt15']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resIt['ItAO_Amt15']); ?>&nbsp;</td>
		   </tr>	
<?php } ?>																												   
<?php $sqlRep=mysql_query("select * from hrm_employee_separation_nocrep where EmpSepId=".$_REQUEST['si'],$con); $resRep=mysql_fetch_assoc($sqlRep); ?>				   
<?php if($resRep['DDH_Amt']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;Handover Of Data Document etc</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resRep['DDH_Amt']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resRep['TID_Amt']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;Handour Of ID Card</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resRep['TID_Amt']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resRep['APTC_Amt']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;Complition Of Pending Task</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resRep['APTC_Amt']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resRep['HOAS_Amt']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;Handour Of Health Card</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resRep['HOAS_Amt']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resRep['Prtis_1Amt']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;<?php echo $resRep['Prtis1']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resRep['Prtis_1Amt']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resRep['Prtis_2Amt']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;<?php echo $resRep['Prtis2']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resRep['Prtis_2Amt']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resRep['Prtis_3Amt']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;<?php echo $resRep['Prtis3']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resRep['Prtis_3Amt']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resRep['Prtis_4Amt']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;<?php echo $resRep['Prtis4']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resRep['Prtis_4Amt']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resRep['Prtis_5Amt']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;<?php echo $resRep['Prtis5']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resRep['Prtis_5Amt']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resRep['Prtis_6Amt']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;<?php echo $resRep['Prtis6']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resRep['Prtis_6Amt']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resRep['Prtis_7Amt']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;<?php echo $resRep['Prtis7']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resRep['Prtis_7Amt']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resRep['Prtis_8Amt']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;<?php echo $resRep['Prtis8']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resRep['Prtis_8Amt']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resRep['Prtis_9Amt']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;<?php echo $resRep['Prtis9']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resRep['Prtis_9Amt']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resRep['Prtis_10Amt']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;<?php echo $resRep['Prtis10']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resRep['Prtis_10Amt']); ?>&nbsp;</td>
		   </tr>	
<?php } ?>  		   
<?php //$sqlAdmin=mysql_query("select * from hrm_employee_separation_nocadmin where EmpSepId=".$_REQUEST['si'],$con); $resAdmin=mysql_fetch_assoc($sqlAdmin); ?>		     		   
<?php if($resAdmin['AdminIC_Amt']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;ID Card Submitted</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resAdmin['AdminIC_Amt']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resAdmin['AdminVC_Amt']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;Visiting Cards Submitted</td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resAdmin['AdminVC_Amt']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resAdmin['AdminAO_Amt3']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;<?php echo $resAdmin['AdminAO_Txt3']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resAdmin['AdminAO_Amt3']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resAdmin['AdminAO_Amt4']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;<?php echo $resAdmin['AdminAO_Txt4']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resAdmin['AdminAO_Amt4']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resAdmin['AdminAO_Amt5']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;<?php echo $resAdmin['AdminAO_Txt5']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resAdmin['AdminAO_Amt5']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resAdmin['AdminAO_Amt6']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;<?php echo $resAdmin['AdminAO_Txt6']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resAdmin['AdminAO_Amt6']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resAdmin['AdminAO_Amt7']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;<?php echo $resAdmin['AdminAO_Txt7']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resAdmin['AdminAO_Amt7']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resAdmin['AdminAO_Amt8']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;<?php echo $resAdmin['AdminAO_Txt8']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resAdmin['AdminAO_Amt8']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resAdmin['AdminAO_Amt9']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;<?php echo $resAdmin['AdminAO_Txt9']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resAdmin['AdminAO_Amt9']); ?>&nbsp;</td>
		   </tr>	
<?php } if($resAdmin['AdminAO_Amt10']>0) { ?>   
		   <tr bgcolor="#FFFFFF">
		    <td style="width:250px;" class="Text" align="">&nbsp;<?php echo $resAdmin['AdminAO_Txt10']; ?></td>
			<td style="width:80px;" class="Text" align="right"><?php echo intval($resAdmin['AdminAO_Amt10']); ?>&nbsp;</td>
		   </tr>	
<?php } $TotalDeduct=$resHr['TotDeduct']+$resAcc['TotAmt2']+$resIt['TotItAmt']+$resRep['TotRepAmt']+$resAdmin['TotAdminAmt']; ?>          		     		   
		   <tr bgcolor="#8F8F8F">
		    <td style="width:250px;" class="Text" align="">&nbsp;<b>Total Deductions</b></td>
			<td style="width:80px;" class="Text" align="right"><b><?php echo intval($TotalDeduct); ?></b>&nbsp;</td>
		   </tr>	
<?php if($TotalEarn>=$TotalDeduct){$TotalPayable=$TotalEarn-$TotalDeduct;}elseif($TotalEarn<$TotalDeduct){$TotalPayable=$TotalDeduct-$TotalEarn;} ?>		
<input type="hidden" name="TotalDeduct" style="width:450px;" value="<?php echo $TotalDeduct; ?>" />   
<input type="hidden" name="TotalPayable" style="width:450px;" value="<?php echo $TotalPayable; ?>" />
		   	<tr bgcolor="#8F8F8F">
		    <td style="width:250px;" class="Text" align="">&nbsp;<b><?php if($TotalEarn>=$TotalDeduct){echo 'Total Amount to be Paid';}elseif($TotalEarn<$TotalDeduct){echo 'Total Amount to be Recovered';} ?></b></td>
			<td style="width:80px;" class="Text" align="right"><b><?php echo intval($TotalPayable); ?></b>&nbsp;</td>
		   </tr>		   			   	   		   		   
		  </table>
		 </td>
		</tr>
		</table>
	  </tr> 
          <tr>
	   <td>
	    <table border="0">
		 <tr>
		  <td class="Text2" style="width:50px;" align=""><b>Note:</b></td>
		  <td><?php echo $resSE['Note'];?></td>
		 </tr>
		</table>
	   </td>
	  </tr>
	  <tr><td>&nbsp;</td></tr>
	  <tr><td>&nbsp;</td></tr>
	  <tr><td>&nbsp;</td></tr>
	  <tr><td>&nbsp;</td></tr>
	  <tr><td>&nbsp;</td></tr>
	  
	  <tr>
	   <td>
	    <table border="0">
		 <tr>
		  <td class="Text2" style="width:500px;" align="center">&nbsp;</td>
	      <td class="Text2" style="width:500px;" align="center"><b>Authorised Signatory</b></td>
		 </tr>
		</table>
	   </td>
	  </tr>
	  <tr><td>&nbsp;</td></tr>
	  <tr>
	   <td>
	    <table border="0">
		 <tr>
		  <td class="Text2" style="width:500px;" align=""><b>Verified by</b></td>
	      <td class="Text2" style="width:500px;" align="center"><b>VNR Seeds Pvt. Ltd.</b></td>
		 </tr>
		</table>
	   </td>
	  </tr>
	  <tr><td>&nbsp;</td></tr>
	  <tr><td colspan="2" class="Text2"><b><u>Acknowledgement</u></b></td></tr>
<?php 
    function no_to_words($no)
    {
    $words = array('0'=> '' ,'1'=> 'one' ,'2'=> 'two' ,'3' => 'three','4' => 'four','5' => 'five','6' => 'six','7' => 'seven','8' => 'eight','9' => 'nine','10' => 'ten','11' => 'eleven','12' => 'twelve','13' => 'thirteen','14' => 'fouteen','15' => 'fifteen','16' => 'sixteen','17' => 'seventeen','18' => 'eighteen','19' => 'nineteen','20' => 'twenty','30' => 'thirty','40' => 'fourty','50' => 'fifty','60' => 'sixty','70' => 'seventy','80' => 'eighty','90' => 'ninty','100' => 'hundred &','1000' => 'thousand','100000' => 'lakh','10000000' => 'crore');
    if($no == 0)
    return ' ';
    else { $novalue=''; $highno=$no; $remainno=0; $value=100;  $value1=1000;  
	while($no>=100) 
	{
     if(($value <= $no) &&($no < $value1)) {
     $novalue=$words["$value"];
     $highno = (int)($no/$value);
     $remainno = $no % $value;
     break;
    }
    $value= $value1;  $value1 = $value * 100;
    }
    if(array_key_exists("$highno",$words))
    return $words["$highno"]." ".$novalue." ".no_to_words($remainno);
    else {
    $unit=$highno%10;
    $ten =(int)($highno/10)*10;
    return $words["$ten"]." ".$words["$unit"]." ".$novalue." ".no_to_words($remainno);
    }
    }
    }
	$InWorld=no_to_words($TotalPayable);
    //echo no_to_words(123);
?>
<?php if($TotalEarn>=$TotalDeduct){ ?>	  
	  <tr style="display:<?php if($resSE['HR_Fvalue']=='O'){ echo 'none';}else{echo 'block';} ?>;"><td colspan="2" class="Text2">Certified, that I have received my full & final settlement from the company on this day by way of cheque of <b><?php echo 'Rs. '.$TotalPayable.'/-'; ?></b> (In Word: <b><?php echo ucfirst($InWorld).' rupees only'; ?></b>) being the full & final settlement of my dues, and I <b><?php echo strtoupper($resE['Fname']).' '.strtoupper($resE['Sname']).' '.strtoupper($resE['Lname']); ?></b> have no further claim of whatsoever nature in future.</td></tr>
<?php } elseif($TotalEarn<$TotalDeduct) { ?>
      <tr style="display:<?php if($resSE['HR_Fvalue']=='O'){ echo 'none';}else{echo 'block';} ?>;"><td colspan="2" class="Text2">Certified, that I have received my full & final settlement from the company on this day stating recovery claim of <b><?php echo 'Rs. '.$TotalPayable.'/-'; ?></b> (In Word: <b><?php echo ucfirst($InWorld).' rupees only'; ?></b>) being the full & final settlement of my dues, and  I <b><?php echo ucfirst(strtolower($resE['Fname'])).' '.ucfirst(strtolower($resE['Sname'])).' '.ucfirst(strtolower($resE['Lname'])); ?></b> have no further claim of whatsoever nature in future.</td></tr>
<?php } ?>	 
      <tr style="display:<?php if($resSE['HR_Fvalue']=='O'){ echo 'block';}else{echo 'none';} ?>;">
	   <td colspan="2" class="Text2"><?php echo $resSE['HR_Finaly_Other_Remark']; ?></td>
	  </tr> 
	  
	  <tr><td>&nbsp;</td></tr>
	  <tr><td>&nbsp;</td></tr>
	  <tr><td>&nbsp;</td></tr>
	  <tr><td>&nbsp;</td></tr>
	  <tr>
	   <td>
	    <table border="0">
		 <tr>
		  <td class="Text2" style="width:500px;" align=""><b>Employee Name :&nbsp;<?php echo $M.' '.ucfirst(strtolower($resE['Fname'])).' '.ucfirst(strtolower($resE['Sname'])).' '.ucfirst(strtolower($resE['Lname'])); ?></b></td>
	      <td class="Text2" style="width:500px;" align="center"><b>Date :</b></td>
		 </tr>
		</table>
	   </td>
	  </tr>
	  <tr><td>&nbsp;</td></tr>
	  <tr><td>&nbsp;</td></tr>
	  <tr><td>&nbsp;</td></tr>
	  <tr>
	   <td>
	    <table border="0">
		 <tr>
		  <td class="Text2" style="width:500px;" align=""><b>Signature :</b></td>
	      <td class="Text2" style="width:500px;" align="">&nbsp;</td>
		 </tr>
		</table>
	   </td>
	  </tr>
	</table>
   </td>
  </tr>
 </table>
   </td>
  </tr>
 </table>
</td>
 </tr>
</table>
</form>
<?php } ?>	  
  </td>
</tr>
</table>
</body>
</html>
