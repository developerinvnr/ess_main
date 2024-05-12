<?php
//?ee=1&aa=1&rr=1&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1
////?ee=emp&aa=apr&rr=rev&hh=hod&sh=shedule&hp=help&fr=form&kr=kra&fq=faq&prt=print&msg=meg&pd=personal details&mt=myteam&mts=myteam status&scr=score&prom=promotion&inc=increment&incr=increment reports&pmsr=pms reports&rg=ratinggraph&h=home&fachiv=acgivement&fa=formA&fb=formB&ffeedb=form feedback
?>
<table>
 <tr>
  <td width="1200">
   <table>
	<tr> 
				
<?php $sqlApp=mysql_query("select Appraiser_EmployeeID from hrm_employee_pms where AssessmentYear=".$resSYP['CurrY']." AND Appraiser_EmployeeID=".$EmployeeId, $con); $rowApp=mysql_num_rows($sqlApp); $sqlRev=mysql_query("select Reviewer_EmployeeID from hrm_employee_pms where AssessmentYear=".$resSYP['CurrY']." AND Reviewer_EmployeeID=".$EmployeeId, $con); $rowRev=mysql_num_rows($sqlRev); $sqlHod=mysql_query("select HOD_EmployeeID from hrm_employee_pms where AssessmentYear=".$resSYP['CurrY']." AND HOD_EmployeeID=".$EmployeeId, $con); $rowHod=mysql_num_rows($sqlHod); ?>
		
<?php if($_SESSION['EmpType']=='E') { ?>
<td align="center" valign="top"><a href="pms.php?log=<?php echo $_SESSION['logCheckEmp']; ?>&ee=0&aa=1&rr=1&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=0&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_emp1" style="display:<?php if($_REQUEST['ee']==1){echo 'block';}else{echo 'none';} ?>;" src="images/emp1.png" border="0"/></a><img id="Img_emp" style="display:<?php if($_REQUEST['ee']==0){echo 'block';}else{echo 'none';} ?>;" src="images/emp.png" border="0"/></td>

<?php } if($rowApp>0) { ?>
<td align="center" valign="top"><a href="ManagerPms.php?ee=1&aa=0&rr=1&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=0&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_manager1" style="display:<?php if($_REQUEST['aa']==1){echo 'block';}else{echo 'none';} ?>;" src="images/manager1.png" border="0"/></a><img id="Img_manager" style="display:<?php if($_REQUEST['aa']==0){echo 'block';}else{echo 'none';} ?>;" src="images/manager.png" border="0"/></td>
		   
<?php } if($rowRev>0) { ?>
<td align="center" valign="top"><a href="HodPms.php?ee=1&aa=1&rr=0&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=0&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" style="display:<?php if($_REQUEST['rr']==1){echo 'block';}else{echo 'none';} ?>;" src="images/hod1.png" border="0"/></a><img id="Img_hod" style="display:<?php if($_REQUEST['rr']==0){echo 'block';}else{echo 'none';} ?>;" src="images/hod.png" border="0"/></td>
		   
<?php } if($rowHod>0) { ?>
<td align="center" valign="top"><a href="RevHodPms.php?ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=0&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" style="display:<?php if($_REQUEST['hh']==1){echo 'block';}else{echo 'none';} ?>;" src="images/RevHod1.png" border="0"/></a><img id="Img_hod" style="display:<?php if($_REQUEST['hh']==0){echo 'block';}else{echo 'none';} ?>;" src="images/RevHod.png" border="0"/></td>
<?php } ?>		   
	
<td width="10">&nbsp;</td>
<?php $sqlPmsId=mysql_query("select * from hrm_employee_pms where AssessmentYear=".$resSYP['CurrY']." AND EmployeeID=".$EmployeeId, $con); $resPmsId=mysql_fetch_assoc($sqlPmsId); $RowPmsId=mysql_num_rows($sqlPmsId);

$sqlY=mysql_query("select Emp_AchivementSave, Emp_KRASave, Emp_SkillSave, Emp_FeedBackSave, Emp_PmsStatus, Appraiser_PmsStatus, Reviewer_PmsStatus, HodSubmit_ScoreStatus, Appraiser_NoOfResend, ExtraAllowPMS from hrm_employee_pms where EmpPmsId=".$resPmsId['EmpPmsId'], $con); $resY=mysql_fetch_assoc($sqlY);
 
$sqlSch=mysql_query("select * from hrm_pms_appdate where AssessmentYear=".$resSYP['CurrY']." AND CompanyId=".$CompanyId, $con); $resSch=mysql_fetch_assoc($sqlSch); $CuDate=date("Y-m-d");

$sqlDoJ=mysql_query("select DateJoining from hrm_employee_general where EmployeeID=".$EmployeeId); 
$resDoJ=mysql_fetch_assoc($sqlDoJ); 

/* Employee - Employee - Employee - Employee - Employee - Employee - Employee */
if($_REQUEST['ee']==0)
{ $sqlKey=mysql_query("select * from hrm_pms_key where Person='emp' AND CompanyId=".$CompanyId, $con); 
  $resKey=mysql_fetch_assoc($sqlKey); }

/* Appraiser - Appraiser - Appraiser - Appraiser - Appraiser - Appraiser - Appraiser */
elseif($_REQUEST['aa']==0)
{ $sqlKey=mysql_query("select * from hrm_pms_key where Person='app' AND CompanyId=".$CompanyId, $con); 
  $resKey=mysql_fetch_assoc($sqlKey); }

/* Reviewer - Reviewer - Reviewer - Reviewer - Reviewer - Reviewer - Reviewer */
elseif($_REQUEST['rr']==0)
{ $sqlKey=mysql_query("select * from hrm_pms_key where Person='rev' AND CompanyId=".$CompanyId, $con); 
  $resKey=mysql_fetch_assoc($sqlKey); }

/* Hod - Hod - Hod - Hod - Hod - Hod - Hod */
elseif($_REQUEST['hh']==0)
{ $sqlKey=mysql_query("select * from hrm_pms_key where Person='hod' AND CompanyId=".$CompanyId, $con); 
  $resKey=mysql_fetch_assoc($sqlKey); }
/* Hod Close- Hod Close - Hod Close - Hod Close - Hod Close - Hod Close - Hod */

?>
<td> <?php /******************** Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg OPEN************/ ?>
<?php 
if($resKey['EmpMsg']=='Y')
{ 	 
 if($_SESSION['EmpType']=='E' AND $_REQUEST['ee']==0) //Employee open
 {       
  if($resY['Emp_AchivementSave']=='Y' AND $resY['Emp_KRASave']=='Y' AND $resY['Emp_SkillSave']=='Y' AND $resY['Emp_FeedBackSave']=='Y' AND $resY['Emp_PmsStatus']==1 AND ($resY['Appraiser_PmsStatus']==0 OR $resY['Appraiser_PmsStatus']==3)){ echo '<font color="#F1EE85" style="font-family:Times New Roman;" size="3"><b><blink>Please click on final submit button for complete your appraisal form.!</blink></font>'; }

  if(($resY['Emp_AchivementSave']=='Y' OR $resY['Emp_KRASave']=='Y' OR $resY['Emp_SkillSave']=='Y' OR $resY['Emp_FeedBackSave']=='Y') AND $resY['Emp_PmsStatus']==1 AND $resY['Appraiser_PmsStatus']==3) { echo '<font color="#FFFFFF" style="font-family:Times New Roman;" size="3"><b></font>'; }

  if($resY['Emp_PmsStatus']==2){ echo '<font color="#F1EE85" style="font-family:Times New Roman;" size="3"><b><blink>You have successfully submitted appraisal form!</blink></font>'; }

  if(($resY['Emp_AchivementSave']=='N' OR $resY['Emp_KRASave']=='N' OR $resY['Emp_SkillSave']=='N' OR $resY['Emp_FeedBackSave']=='N') AND ($resY['Emp_PmsStatus']==0 OR $resY['Emp_PmsStatus']==1)) { echo '<font color="#F1EE85" style="font-family:Times New Roman;" size="3"><b><blink>Please fill appraisal form before last date of self appraisal!</blink></font>'; }
  
  
  if($resKey['KRAForm']=='Y' AND $RD['DepartmentId']!=4 AND $RD['DepartmentId']!=25) 
  {
  
   $sql3=mysql_query("select * from hrm_pms_kra where YearId=".$resSY['CurrY']." AND EmployeeID=".$EmployeeId." AND (KRAStatus='A' OR KRAStatus='R') AND (UseKRA='E' OR UseKRA='A' OR UseKRA='R' OR UseKRA='H')", $con);
   $row3=mysql_num_rows($sql3); $Before31Day=date("Y-m-d",strtotime('-30 day'));  
   $After31DayDoJ=date("Y-m-d",strtotime($resDoJ['DateJoining'].'+31 day'));
  
   if(date("Y-m-d")>=$resDoJ['DateJoining'] AND date("Y-m-d")<=$After31DayDoJ)
   { 
     if($row3==0){ $stE='<font color="#F1EE85" style="font-family:Times New Roman;" size="3"><b><blink>Submit Your KRA by '.date("d-m-Y",strtotime($After31DayDoJ)).'</blink></b></font>'; } 
     if($row3>0)
	 { $res3=mysql_fetch_assoc($sql3); 
       if($res3['KRAStatus']='R' AND $res3['UseKRA']=='E'){$stE='<font color="#F1EE85" style="font-family:Times New Roman;" size="3"><b><blink>Please click on final submit button for complete your KRA form.!</blink></b></font>';} 
       if($res3['KRAStatus']='R' AND $res3['UseKRA']=='A'){$stE='<font color="#F1EE85" style="font-family:Times New Roman;" size="3"><b><blink>You have successfully submited KRA form!.!</blink></b></font>';} 
	 } 
	 if($RD['DepartmentId']!=6){echo $stE;} 
   }
   elseif($CuDate>=$resSch['EmpFromDate'] AND $CuDate<=$resSch['EmpToDate'] AND $resSch['EmpDateStatus']=='A') 
   { 
    if($row3==0){ $stE='<font color="#F1EE85" style="font-family:Times New Roman;" size="3"><b><blink>Please fill KRA form before last date!</blink></b></font>'; } 
    if($row3>0){ $res3=mysql_fetch_assoc($sql3); 
    if($res3['KRAStatus']='R' AND $res3['UseKRA']=='E'){$stE='<font color="#F1EE85" style="font-family:Times New Roman;" size="3"><b><blink>Please click on final submit button for complete your KRA form.!</blink></b></font>';} 
    if($res3['KRAStatus']='R' AND $res3['UseKRA']=='A'){$stE='<font color="#F1EE85" style="font-family:Times New Roman;" size="3"><b><blink>You have successfully submited KRA form!.!</blink></b></font>';} } if($RD['DepartmentId']!=6){echo $stE;} 
   } 
   
  } //if($resKey['KRAForm']=='Y' AND $RD['DepartmentId']!=4 AND $RD['DepartmentId']!=25)
   
  
  
 }  //if($_SESSION['EmpType']=='E' && $_REQUEST['ee']==0)  //Employee Close
 
}	//if($resKey['EmpMsg']=='Y')

?> 	
</td><?php /******************** Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg CLOSE************/ ?>

<td><font color="#014E05" style='font-family:Times New Roman;' size="3"><b><?php echo $msg; ?></b></font></td>
      </tr>
	 </table>
	</td>
   </tr> 
   <tr>
    <td width="1200" valign="top">
	  <table border="0">
	   <tr> 
<?php 
if($_SESSION['EmpType']=='E' AND $_REQUEST['ee']==0) 
{

 if($resKey['PersonalDetails']=='Y'){ ?><td align="center" style="font-family:Times New Roman;font-size:14px;font-weight:bold;width:120px;" valign="top"><a href="pms.php?log=<?php echo $_SESSION['logCheckEmp']; ?>&ee=0&aa=1&rr=1&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=0&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img src="images/PersonalDetails1.png" border="0" style="display:<?php if($_REQUEST['pd']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/PersonalDetails.png" border="0" style="display:<?php if($_REQUEST['pd']==0){echo 'block';}else{echo 'none';} ?>"/></td>
 
 <?php } 
 if($resKey['Schedule']=='Y')
 { ?><td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:120px;" valign="top">
         <?php if($resKey['AppraisalForm']=='Y')
		       { echo '<a href="javascript:OpenWindow()"><img src="images/schedule1.png" border="0"/></a>'; } 
			   if($resKey['KRAForm']=='Y' AND $RD['DepartmentId']!=4 AND $RD['DepartmentId']!=25) 
			   { echo '<a href="javascript:KRAOpenWindow()"><img src="images/schedule1.png" border="0"/></a>'; } ?>
	</td><?php  
 } 
 
 if($resKey['Help_Faq']=='Y') 
 { ?><td align="center" style="font-family:Times New Roman;font-size:14px; font-weight:bold;width:<?php if($resKey['AppraisalForm']=='Y'){echo '120px';}elseif($resKey['KRAForm']=='Y'){echo '50px';} ?>;" valign="top">	
     <?php if($resKey['AppraisalForm']=='Y') { ?><a href="#" onClick="OpenHelpfile('help')"><img src="images/helpbtn.png" border="0"/></a><a href="#" onClick="OpenFaqfile('faq')"><img src="images/faqbtn.png" border="0"/></a><?php } ?>
	<?php if($resKey['KRAForm']=='Y' AND $RD['DepartmentId']!=4 AND $RD['DepartmentId']!=25 AND $RD['DepartmentId']!=6){?><a href="#" onClick="OpenKRAHelpfile('krahelp')"><img src="images/helpbtn.png" border="0"/></a><?php } ?>		 	 
	 </td><?php 
 }
 
 if($resKey['AppraisalForm']=='Y' AND $resDoj['DateJoining']<='2016-03-31') 
 { ?><td align="" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:120px;" valign="top">
     <?php if(($CuDate>=$resSch['EmpFromDate'] AND $CuDate<=$resSch['EmpToDate'] AND $resSch['EmpDateStatus']=='A') OR ($CuDate>=$resSch['AppFromDate'] AND $CuDate<=$resSch['AppToDate'] AND $resSch['AppDateStatus']=='A' AND $resY['Emp_PmsStatus']==1 AND $resY['Appraiser_PmsStatus']==3) OR ($CuDate>=$resSch['RevFromDate'] AND $CuDate<=$resSch['RevToDate'] AND $resSch['RevDateStatus']=='A' AND $resY['Emp_PmsStatus']==1 AND $resY['Appraiser_PmsStatus']==3 AND $resY['Reviewer_PmsStatus']==3) OR ($CuDate>=$resSch['HodFromDate'] AND $CuDate<=$resSch['HodToDate'] AND $resSch['HodDateStatus']=='A' AND $resY['Emp_PmsStatus']==1 AND $resY['Appraiser_PmsStatus']==3 AND $resY['Reviewer_PmsStatus']==3 AND $resY['HodSubmit_ScoreStatus']==3) OR $resY['ExtraAllowPMS']==1){ ?><a href="EmpPmsAppForm.php?ee=0&aa=1&rr=1&hh=1&sh=1&hp=1&fr=0&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=0&fa=1&fb=1&ffeedb=1&org=1"><img src="images/Appraisalfrom1.png" border="0" style="display:<?php if($_REQUEST['fr']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/Appraisalfrom.png" border="0" style="display:<?php if($_REQUEST['fr']==0){echo 'block';}else{echo 'none';} ?>"/><?php } ?></td><?php 
	 
 }
  
 if($resKey['View_Print']=='Y') 
 { ?><td align="center" style="font-family:Times New Roman;width:120px; font-size:14px; font-weight:bold;" valign="top">
	 <?php if($resKey['AppraisalForm']=='Y')
	       { 
		    if($resY['Emp_AchivementSave']=='Y' AND $resY['Emp_KRASave']=='Y' AND $resY['Emp_SkillSave']=='Y' AND $resY['Emp_FeedBackSave']=='Y') { ?><a href="#" onClick="printpage(<?php echo $resPmsId['EmpPmsId'].','.$EmployeeId; ?>)"/><img src="images/ViewPrintForm.png" border="0" /></a><?php } 
		   } ?></td><?php 
 } 
 
 if($resKey['KRAForm']=='Y' AND $RD['DepartmentId']!=4 AND $RD['DepartmentId']!=25) 
 {
  $sql=mysql_query("select * from hrm_pms_kra where YearId=".$resSY['CurrY']." AND CompanyId=".$CompanyId." AND EmployeeID=".$EmployeeId." AND (KRAStatus='R' OR KRAStatus='A') order by KRAId ASC", $con);  $row=mysql_num_rows($sql); 
  if($row>0){$resRe=mysql_fetch_assoc($sql);} $sqlPm=mysql_query("select ExtraAllowKRA from hrm_employee_pms where EmployeeId=".$EmployeeId." AND AssessmentYear=".$resSYP['CurrY'], $con); $resPm=mysql_fetch_assoc($sqlPm); ?>
  <td style="font-family:Times New Roman;width:180px; font-size:14px; font-weight:bold;" valign="middle">
  <?php if(date("Y-m-d")>=$resDoJ['DateJoining'] AND date("Y-m-d")<=$After31DayDoJ)
        { 
         if($row3==0){ ?><a href="EmpAddNewKRA.php?ee=0&aa=1&rr=1&hh=1&sh=1&hp=1&fr=1&kr=0&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=0&fa=1&fb=1&ffeedb=1&org=1"/><img src="images/KraYear1.png" border="0" style="display:<?php if($_REQUEST['kr']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/KraYear.png" border="0" style="display:<?php if($_REQUEST['kr']==0){echo 'block';}else{echo 'none';} ?>"/><?php } 
         if($row3>0)
		 { $res3=mysql_fetch_assoc($sql3); 
           if($res3['KRAStatus']='R' AND $res3['UseKRA']=='E'){?><a href="EmpAddNewKRA.php?ee=0&aa=1&rr=1&hh=1&sh=1&hp=1&fr=1&kr=0&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=0&fa=1&fb=1&ffeedb=1&org=1"/><img src="images/KraYear1.png" border="0" style="display:<?php if($_REQUEST['kr']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/KraYear.png" border="0" style="display:<?php if($_REQUEST['kr']==0){echo 'block';}else{echo 'none';} ?>"/><?php } 
           if($res3['KRAStatus']='R' AND $res3['UseKRA']=='A'){ echo ''; } 
		 }
        } 
        elseif($CuDate<$resSch['EmpFromDate'] OR $CuDate>$resSch['EmpToDate'])
        { 
         if($row3==0){ ?><a href="EmpAddNewKRA.php?ee=0&aa=1&rr=1&hh=1&sh=1&hp=1&fr=1&kr=0&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=0&fa=1&fb=1&ffeedb=1&org=1"/><img src="images/KraYear1.png" border="0" style="display:<?php if($_REQUEST['kr']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/KraYear.png" border="0" style="display:<?php if($_REQUEST['kr']==0){echo 'block';}else{echo 'none';} ?>"/><?php } 
         if($row3>0)
		 { $res3=mysql_fetch_assoc($sql3); 
           if($res3['KRAStatus']='R' AND $res3['UseKRA']=='E'){?><a href="EmpAddNewKRA.php?ee=0&aa=1&rr=1&hh=1&sh=1&hp=1&fr=1&kr=0&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=0&fa=1&fb=1&ffeedb=1&org=1"/><img src="images/KraYear1.png" border="0" style="display:<?php if($_REQUEST['kr']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/KraYear.png" border="0" style="display:<?php if($_REQUEST['kr']==0){echo 'block';}else{echo 'none';} ?>"/><?php } 
           if($res3['KRAStatus']='R' AND $res3['UseKRA']=='A'){ echo ''; } 
		 }
        }
        elseif(($CuDate>=$resSch['EmpFromDate'] AND $CuDate<=$resSch['EmpToDate'] AND $resSch['EmpDateStatus']=='A') OR ($CuDate>=$resSch['AppFromDate'] AND $CuDate<=$resSch['AppToDate'] AND $resSch['AppDateStatus']=='A' AND $resRe['EmpStatus']=='P' AND $resRe['AppStatus']=='R') OR ($CuDate>=$resSch['RevFromDate'] AND $CuDate<=$resSch['RevToDate'] AND $resSch['RevDateStatus']=='A' AND $resRe['EmpStatus']=='P' AND $resRe['AppStatus']=='R' AND $resRe['RevStatus']=='R') OR ($CuDate>=$resSch['HodFromDate'] AND $CuDate<=$resSch['HodToDate'] AND $resSch['HodDateStatus']=='A' AND $resRe['EmpStatus']=='P' AND $resRe['AppStatus']=='R' AND $resRe['RevStatus']=='R' AND $resRe['HODStatus']=='R') OR $resPm['ExtraAllowKRA']==1)
{ ?><a href="EmpAddNewKRA.php?ee=0&aa=1&rr=1&hh=1&sh=1&hp=1&fr=1&kr=0&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=0&fa=1&fb=1&ffeedb=1&org=1"/><img src="images/KraYear1.png" border="0" style="display:<?php if($_REQUEST['kr']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/KraYear.png" border="0" style="display:<?php if($_REQUEST['kr']==0){echo 'block';}else{echo 'none';} ?>"/><?php } ?>
  </td>
  <td style="font-family:Times New Roman;width:120px; font-size:14px; font-weight:bold;" valign="middle">
  <?php if($row3>0) { ?><a href="#" onClick="printpageKRA(<?php echo $CompanyId.', '.$resSY['CurrY'].', '.$EmployeeId; ?>)"/><img src="images/printSaveKRA.png" border="0" /></a><?php } ?>
  </td><?php
 }
 ?>
 
  <td style="width:10px;">&nbsp;</td>
  <td style="font-family:Times New Roman; font-size:16px; font-weight:bold;width:400px; color:#E10000;" >
  <?php if($CuDate>=$resSch['EmpFromDate'] AND $CuDate<=$resSch['EmpToDate'] AND $resSch['EmpDateStatus']=='A') 
		{ 
		 $LastDate=$resSch['EmpToDate']; $CurrentDate=date("Y-m-d"); 
		 $diff = abs(strtotime($LastDate) - strtotime($CurrentDate));
         $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/(60*60*24)); 
         $sqlKK=mysql_query("select * from hrm_pms_kra where YearId=".$resSY['CurrY']." AND CompanyId=".$CompanyId." AND EmployeeID=".$EmployeeId." AND KRAStatus='A' AND UseKRA='H'", $con); $rowKK=mysql_num_rows($sqlKK);		  
		 if($RD['DepartmentId']!=6 AND $RD['DepartmentId']!=4 AND $RD['DepartmentId']!=25) 
		 { if($rowKK==0){ ?><b><blink><?php echo $days; ?> Days Remaining! Last date : <font color="#5B0000"><?php echo date("d-F",strtotime($resSch['EmpToDate'])); ?></font></blink></b><?php } 
		 } 
		} ?>
  <?php if($resKey['AppraisalForm']=='Y') 
		{  
		 if(($CuDate>=$resSch['EmpFromDate'] AND $CuDate<=$resSch['EmpToDate'] AND $resSch['EmpDateStatus']=='A') OR ($CuDate>=$resSch['AppFromDate'] AND $CuDate<=$resSch['AppToDate'] AND $resSch['AppDateStatus']=='A' AND $resY['Emp_PmsStatus']==1 AND $resY['Appraiser_PmsStatus']==3) OR ($CuDate>=$resSch['RevFromDate'] AND $CuDate<=$resSch['RevToDate'] AND $resSch['RevDateStatus']=='A' AND $resY['Emp_PmsStatus']==1 AND $resY['Appraiser_PmsStatus']==3 AND $resY['Reviewer_PmsStatus']==3) OR ($CuDate>=$resSch['HodFromDate'] AND $CuDate<=$resSch['HodToDate'] AND $resSch['HodDateStatus']=='A' AND $resY['Emp_PmsStatus']==1 AND $resY['Appraiser_PmsStatus']==3 AND $resY['Reviewer_PmsStatus']==3 AND $resY['HodSubmit_ScoreStatus']==3) AND $resY['Appraiser_NoOfResend']!=0)
		 { 
		  $sqlMax = mysql_query("SELECT * FROM hrm_employee_pms_resend where EmpPmsId=".$resPmsId['EmpPmsId']." AND EmployeeID=".$EmployeeId." AND App_Reason!=''", $con); $RowC=mysql_num_rows($sqlMax); 
		  if($RowC>0)
		  { $sqlMax = mysql_query("SELECT MAX(ResendId) as RID FROM hrm_employee_pms_resend where EmpPmsId=".$resPmsId['EmpPmsId']." AND EmployeeID=".$EmployeeId." AND App_Reason!=''", $con); $resMax = mysql_fetch_assoc($sqlMax);  
		    $sqlRe = mysql_query("select App_Reason from hrm_employee_pms_resend where ResendId=".$resMax['RID'], $con);
			$resRe=mysql_fetch_assoc($sqlRe); 
		  } 
		 }   
		} ?>         
  </td><?php 
 
 
 
 
} //if($_SESSION['EmpType']=='E' AND && $_REQUEST['ee']==0)  

elseif($_REQUEST['aa']==0) 
{

 if($resKey['Home']=='Y') 
 { ?><td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold; width:80px;"><a href="Indexpms.php?log=<?php echo $_SESSION['logCheckEmp']; ?>&ee=1&aa=1&rr=1&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=0&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img src="images/Home.png" border="0" style="display:<?php if($_REQUEST['h']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/Home1.png" border="0" style="display:<?php if($_REQUEST['h']==0){echo 'block';}else{echo 'none';} ?>"/></td><?php 
 } 
 
 if($resKey['MyTeam']=='Y') 
 { ?><td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:80px;"><a href="ManagerPms.php?ee=1&aa=0&rr=1&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=0&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img src="images/MyTeam1.png" border="0" style="display:<?php if($_REQUEST['mt']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/MyTeam.png" border="0" style="display:<?php if($_REQUEST['mt']==0){echo 'block';}else{echo 'none';} ?>"/></td><?php 
 } 
 
 if($resKey['TeamStatus']=='Y') 
 { ?><td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:80px;">
<?php $sqlCh = mysql_query("select * from hrm_pms_allow where Appraiser_EmployeeID=".$EmployeeId." AND CompanyId=".$CompanyId." AND AssesmentYear=".$resSYP['CurrY'], $con); $sqlCh2  = mysql_query("select EmpPmsId from hrm_employee_pms where Appraiser_PmsStatus=1 AND Reviewer_PmsStatus=3 AND Appraiser_EmployeeID=".$EmployeeId." AND CompanyId=".$CompanyId." AND AssessmentYear=".$YearId, $con); $rowCh=mysql_num_rows($sqlCh); $rowCh2=mysql_num_rows($sqlCh2);
	  if(($CuDate>=$resSch['AppFromDate'] AND $CuDate<=$resSch['AppToDate'] AND $resSch['AppDateStatus']=='A') OR $rowCh>0 OR ($CuDate>$resSch['AppToDate'] AND $rowCh2>0)) 
	  { ?><a href="ManagerTeamStatus.php?action=teamS&ee=1&aa=0&rr=1&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=0&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img src="images/TeamStatus1.png" border="0" style="display:<?php if($_REQUEST['mts']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/TeamStatus.png" border="0" style="display:<?php if($_REQUEST['mts']==0){echo 'block';}else{echo 'none';} ?>"/><?php } ?></td><?php 
 }  
		 
 if($resKey['RatingGraph']=='Y')
 { ?><td align="center" style="font-family:Times New Roman;font-size:14px;font-weight:bold;width:80px;"><a href="ManagerRatingGraph.php?ee=1&aa=0&rr=1&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=0&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img src="images/ratinggraph1.png" border="0" style="display:<?php if($_REQUEST['rg']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/ratinggraph.png" border="0" style="display:<?php if($_REQUEST['rg']==0){echo 'block';}else{echo 'none';} ?>"/></td><?php 
 }
  
 if($resKey['KRAForm']=='Y')
 { $sqlChK = mysql_query("select * from hrm_pms_allowkra where Appraiser_EmployeeID=".$EmployeeId." AND CompanyId=".$CompanyId." AND AssesmentYear=".$resSY['CurrY'], $con); $sqlCh2K  = mysql_query("select KRAId from hrm_pms_kra INNER JOIN hrm_employee_pms ON hrm_pms_kra.EmployeeID=hrm_employee_pms.EmployeeID where (hrm_pms_kra.AppStatus='D' OR hrm_pms_kra.AppStatus='P' OR hrm_pms_kra.AppStatus='R') AND hrm_employee_pms.Appraiser_EmployeeID=".$EmployeeId." AND hrm_pms_kra.CompanyId=".$CompanyId." AND hrm_pms_kra.YearId=".$resSY['CurrY'], $con); $rowChK=mysql_num_rows($sqlChK); $rowCh2K=mysql_num_rows($sqlCh2K); ?>		
    <td style="font-family:Times New Roman;width:180px; font-size:14px; font-weight:bold;" valign="middle"><a href="AppCheckNewKRA.php?ee=1&aa=0&rr=1&hh=1&sh=1&hp=1&fr=1&kr=0&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"/><img src="images/KraYearMyTeam1.png" border="0" style="display:<?php if($_REQUEST['kr']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/KraYearMyTeam.png" border="0" style="display:<?php if($_REQUEST['kr']==0){echo 'block';}else{echo 'none';} ?>"/></td><?php 
 } ?>
	<td style="width:10px;">&nbsp;</td>
	<td style="font-family:Times New Roman; font-size:16px; font-weight:bold;width:400px; color:#E10000;" >
	<?php if($CuDate>=$resSch['AppFromDate'] AND $CuDate<=$resSch['AppToDate'] AND $resSch['AppDateStatus']=='A') 
	      { 
		   $LastDate=$resSch['AppToDate']; $CurrentDate=date("Y-m-d");
		   $diff = abs(strtotime($LastDate) - strtotime($CurrentDate));
           $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); ?>
		   <b><blink><?php echo $days; ?> Days Remaining! Last date : 
		   <font color="#5B0000"><?php echo date("d-F",strtotime($resSch['AppToDate'])); ?></font></blink></b><?php } ?>
	</td> 	   			

<?php
} //if($_REQUEST['aa']==0) 

elseif($_REQUEST['rr']==0) 
{

  if($resKey['Home']=='Y') 
  { ?><td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold; width:80px;"><a href="Indexpms.php?log=<?php echo $_SESSION['logCheckEmp']; ?>&ee=1&aa=1&rr=1&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=0&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img src="images/Home.png" border="0" style="display:<?php if($_REQUEST['h']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/Home1.png" border="0" style="display:<?php if($_REQUEST['h']==0){echo 'block';}else{echo 'none';} ?>"/></td><?php 
  } 
  
  if($resKey['MyTeam']=='Y') 
  { ?><td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:80px;"><a href="HodPms.php?ee=1&aa=1&rr=0&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=0&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img src="images/MyTeam1.png" border="0" style="display:<?php if($_REQUEST['mt']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/MyTeam.png" border="0" style="display:<?php if($_REQUEST['mt']==0){echo 'block';}else{echo 'none';} ?>"/></td><?php 
  }
   
  if($resKey['TeamStatus']=='Y') 
  { ?><td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:80px;">
<?php $sqlCh = mysql_query("select * from hrm_pms_allow where Reviewer_EmployeeID=".$EmployeeId." AND CompanyId=".$CompanyId." AND AssesmentYear=".$resSYP['CurrY'], $con); $sqlCh2  = mysql_query("select EmpPmsId from hrm_employee_pms where Reviewer_PmsStatus=1 AND HodSubmit_ScoreStatus=3  OR (Reviewer_PmsStatus=3 AND HodSubmit_ScoreStatus=3) AND Reviewer_EmployeeID=".$EmployeeId." AND CompanyId=".$CompanyId." AND AssessmentYear=".$resSYP['CurrY'], $con); $rowCh=mysql_num_rows($sqlCh); $rowCh2=mysql_num_rows($sqlCh2);
      if(($CuDate>=$resSch['RevFromDate'] AND $CuDate<=$resSch['RevToDate'] AND $resSch['RevDateStatus']=='A') OR $rowCh>0 OR ($CuDate>$resSch['RevToDate'] AND $rowCh2>0)) 
	  { ?><a href="HodPmsTeamStatus.php?ee=1&aa=1&rr=0&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=0&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img src="images/TeamStatus1.png" border="0" style="display:<?php if($_REQUEST['mts']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/TeamStatus.png" border="0" style="display:<?php if($_REQUEST['mts']==0){echo 'block';}else{echo 'none';} ?>"/>/></a><?php 
	  } ?></td><?php 
	  
  }  
  
  if($resKey['RatingGraph']=='Y') 
  { ?><td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:80px;"><a href="ReviewerRatingGraph.php?ee=1&aa=1&rr=0&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=0&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img src="images/ratinggraph1.png" border="0" style="display:<?php if($_REQUEST['rg']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/ratinggraph.png" border="0" style="display:<?php if($_REQUEST['org']==0){echo 'block';}else{echo 'none';} ?>"/></td>
	  <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:120px;"><a href="ReviewerOverallRatingGraph.php?ee=1&aa=1&rr=0&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=0"><img src="images/OveallRatingGraph1.png" border="0" style="display:<?php if($_REQUEST['org']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/OveallRatingGraph.png" border="0" style="display:<?php if($_REQUEST['org']==0){echo 'block';}else{echo 'none';} ?>"/></td><?php 
  } ?>
		 
	  <td style="width:5px;">&nbsp;</td><?php 
  if($resKey['KRAForm']=='Y') 
  { $sqlChK = mysql_query("select * from hrm_pms_allowkra where Reviewer_EmployeeID=".$EmployeeId." AND CompanyId=".$CompanyId." AND AssesmentYear=".$resSY['CurrY'], $con); $sqlCh2K  = mysql_query("select KRAId from hrm_pms_kra INNER JOIN hrm_employee_pms ON hrm_pms_kra.EmployeeID=hrm_employee_pms.EmployeeID where (hrm_pms_kra.RevStatus='D' OR hrm_pms_kra.RevStatus='P' OR hrm_pms_kra.RevStatus='R') AND hrm_employee_pms.Reviewer_EmployeeID=".$EmployeeId." AND hrm_pms_kra.CompanyId=".$CompanyId." AND hrm_pms_kra.YearId=".$resSY['CurrY'], $con); $rowChK=mysql_num_rows($sqlChK); $rowCh2K=mysql_num_rows($sqlCh2K); ?>			 
      <td style="font-family:Times New Roman;width:180px; font-size:14px; font-weight:bold;" valign="middle"><a href="RevCheckNewKRA.php?ee=1&aa=1&rr=0&hh=1&sh=1&hp=1&fr=1&kr=0&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"/><img src="images/KraYearMyTeam1.png" border="0" style="display:<?php if($_REQUEST['kr']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/KraYearMyTeam.png" border="0" style="display:<?php if($_REQUEST['kr']==0){echo 'block';}else{echo 'none';} ?>"/></td><?php } ?> 
	  <td style="width:20px;">&nbsp;</td>
	  <td style="font-family:Times New Roman; font-size:16px; font-weight:bold;width:400px; color:#E10000;"><?php 
	  if($CuDate>=$resSch['RevFromDate'] AND $CuDate<=$resSch['RevToDate'] AND $resSch['RevDateStatus']=='A') 
	  { 
		$LastDate=$resSch['RevToDate']; $CurrentDate=date("Y-m-d");
		$diff = abs(strtotime($LastDate) - strtotime($CurrentDate));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); ?>
		<b><blink><?php echo $days; ?> Days Remaining! Last date : 
		<font color="#5B0000"><?php echo date("d-F",strtotime($resSch['RevToDate'])); ?></font></blink></b><?php } ?>
	  </td> 	

<?php
} //if($_REQUEST['rr']==0)

elseif($_REQUEST['hh']==0) 
{

  if($resKey['Home']=='Y') 
  { ?><td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold; width:80px;"><a href="Indexpms.php?log=<?php echo $_SESSION['logCheckEmp']; ?>&ee=1&aa=1&rr=1&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=0&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img src="images/Home.png" border="0" style="display:<?php if($_REQUEST['h']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/Home1.png" border="0" style="display:<?php if($_REQUEST['h']==0){echo 'block';}else{echo 'none';} ?>"/></td><?php 
  } 
   
  if($resKey['TeamStatus']=='Y') 
  { ?><td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:90px;"><a href="RevHodPms.php?ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=0&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img src="images/TeamStatus1.png" border="0" style="display:<?php if($_REQUEST['mts']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/TeamStatus.png" border="0" style="display:<?php if($_REQUEST['mts']==0){echo 'block';}else{echo 'none'; } ?>"/></td><?php 
   
  } 
   
  if($resKey['Score']=='Y' OR $resKey['Promotion']=='Y' OR $resKey['Increment']=='Y') 
  { ?><td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:70px;">
<?php $sqlCh = mysql_query("select * from hrm_pms_allow where HOD_EmployeeID=".$EmployeeId." AND CompanyId=".$CompanyId." AND AssesmentYear=".$resSYP['CurrY'], $con); $rowCh=mysql_num_rows($sqlCh);	 
	  if(($CuDate>=$resSch['HodFromDate'] AND $CuDate<=$resSch['HodToDate'] AND $resSch['HodDateStatus']=='A') OR $rowCh>0)      { ?><a href="HodPmsScore.php?ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=0&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img src="images/Score1.png" border="0" style="display:<?php if($_REQUEST['scr']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/Score.png" border="0" style="display:<?php if($_REQUEST['scr']==0){echo 'block';}else{echo 'none';} ?>"/></td> 
		 
	   <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:80px;"><a href="HodPmsPromotion.php?ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=0&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img src="images/promotion1.png" border="0" style="display:<?php if($_REQUEST['prom']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/promotion.png" border="0" style="display:<?php if($_REQUEST['prom']==0){echo 'block';}else{echo 'none';} ?>"/></td> 
	   
	   <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:80px;"><a href="HodPmsIncrement.php?ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=0&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img src="images/Increment1.png" border="0" style="display:<?php if($_REQUEST['inc']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/Increment.png" border="0" style="display:<?php if($_REQUEST['inc']==0){echo 'block';}else{echo 'none';} ?>"/><?php } ?></td><?php 
	  } 
	   
  if($resKey['MyPmsReport']=='Y') 
  { ?><td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:80px;"><a href="HodPmsReports.php?ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=0&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img src="images/pmsreports1.png" border="0" style="display:<?php if($_REQUEST['pmsr']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/pmsreports.png" border="0" style="display:<?php if($_REQUEST['pmsr']==0){echo 'block';}else{echo 'none';} ?>"/></td><?php 
  } 
  
  if($resKey['IncrementReport']=='Y') 
  { ?><td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:80px;">	<a href="HodIncReports.php?ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=0&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img src="images/IncrementReports1.png" border="0" style="display:<?php if($_REQUEST['incr']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/IncrementReports.png" border="0" style="display:<?php if($_REQUEST['incr']==0){echo 'block';}else{echo 'none';} ?>"/></td><?php 
  } 
  
  if($resKey['RatingGraph']=='Y') 
  { ?><td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:80px;"><a href="RatingGraph.php?ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=0&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img src="images/ratinggraph1.png" border="0" style="display:<?php if($_REQUEST['rg']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/ratinggraph.png" border="0" style="display:<?php if($_REQUEST['rg']==0){echo 'block';}else{echo 'none';} ?>"/></td>
  
	  <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:100px;"><a href="CompliteRatingGraph.php?ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=0"><img src="images/OveallRatingGraph1.png" border="0" style="display:<?php if($_REQUEST['org']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/OveallRatingGraph.png" border="0" style="display:<?php if($_REQUEST['org']==0){echo 'block';}else{echo 'none';} ?>"/></td><?php 
  } 
  
  if($resKey['KRAForm']=='Y') 
  { ?><td style="font-family:Times New Roman;width:180px; font-size:14px; font-weight:bold;" valign="middle"><a href="HodFinalEmpKRA.php?ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=0&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"/><img src="images/KraYearMyTeam1.png" border="0" style="display:<?php if($_REQUEST['kr']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/KraYearMyTeam.png" border="0" style="display:<?php if($_REQUEST['kr']==0){echo 'block';}else{echo 'none';} ?>"/> </td><?php 
  } ?> 
	  <td style="font-family:Times New Roman; font-size:16px; font-weight:bold;width:400px; color:#E10000;" >
	  <?php 
	  if($CuDate>=$resSch['HodFromDate'] AND $CuDate<=$resSch['HodToDate'] AND $resSch['HodDateStatus']=='A') 
	  { 
	    $LastDate=$resSch['HodToDate']; $CurrentDate=date("Y-m-d");
		$diff = abs(strtotime($LastDate) - strtotime($CurrentDate));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); ?>
		<b><BLINK><?php echo $days; ?> Days Remaining! Last date : 
	    <font color="#5B0000"><?php echo date("d-F",strtotime($resSch['HodToDate'])); ?></font></BLINK></b><?php 
	  } ?>
	  </td> 

<?php
} //if($_REQUEST['hh']==0) 
?>   			   
		
   </tr>		    			       
  </table>
 </td>
 </tr>
</table>   
