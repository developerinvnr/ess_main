<?php $sqlY=mysql_query("select Appraiser_EmployeeID, Emp_AchivementSave, Emp_KRASave, Emp_SkillSave, Emp_FeedBackSave, Emp_PmsStatus, Appraiser_PmsStatus, Reviewer_PmsStatus, HodSubmit_ScoreStatus, Appraiser_NoOfResend, ExtraAllowPMS, ExtraAllowKRA, Appraiser_EmployeeID, Reviewer_EmployeeID, HOD_EmployeeID, Kra_ext, EmpFormAScore, Mid_EmpFormAScore, EmpFormBScore,Mid_EmpFormBScore, Rev2_EmployeeID, Rev2_PmsStatus from hrm_employee_pms where EmpPmsId=".$_SESSION['ePmsId'], $con); $resY=mysql_fetch_assoc($sqlY); $CuDate=date("Y-m-d"); 

$sqlk=mysql_query("select * from hrm_pms_kra where YearId=".$_SESSION['KraYId']." AND CompanyId=".$CompanyId." AND EmployeeID=".$EmployeeId." AND (KRAStatus='R' OR KRAStatus='A') order by KRAId ASC", $con); $rowk=mysql_num_rows($sqlk);
if($rowk>0){ $resRe=mysql_fetch_assoc($sqlk); } 
$sqlk2=mysql_query("select * from hrm_pms_kra where YearId=".$_SESSION['KraYId']." AND CompanyId=".$CompanyId." AND EmployeeID=".$EmployeeId." AND (KRAStatus='R' OR KRAStatus='A') AND (UseKRA='A' OR UseKRA='R' OR UseKRA='H')", $con); 
$rowk2=mysql_num_rows($sqlk2); 
?>
<table style="width:100%;">
<tr>
 <td style="width:100%;">
 <table style="width:100%;">
<?php /******************** Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg OPEN************/ ?>
<?php if($_SESSION['eMsg']=='Y'){ ?>
<tr>
 <td>
 <?php if(($_SESSION['eAppform']=='Y' OR $_SESSION['eMidform']=='Y') AND $CuDate>=$_SESSION['eFrom'] AND $CuDate<=$_SESSION['eTo'] AND $_SESSION['eSts']=='A'){ $LastDate=$_SESSION['eTo']; $CurrentDate=date("Y-m-d");
		 $diff = abs(strtotime($LastDate) - strtotime($CurrentDate));
         $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/(60*60*24)); ?>
 <font class="msg_r"><font color="#00366C">&nbsp;PMS :</font><span class="blink_me"> <?php echo $days;?> Days Remaining! Last date : <?php echo date("d-F",strtotime($_SESSION['eTo'])); ?> </span></font>
 <?php } ?>
 &nbsp;&nbsp;
 <?php if($_SESSION['eKraform']=='Y' AND $CuDate>=$_SESSION['ekFrom'] AND $CuDate<=$_SESSION['ekTo'] AND $_SESSION['ekSts']=='A'){ $LastDate=$_SESSION['ekTo']; $CurrentDate=date("Y-m-d");
		 $diff = abs(strtotime($LastDate) - strtotime($CurrentDate));
         $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/(60*60*24)); ?>
 <font class="msg_r"><font color="#00366C">KRA :</font><span class="blink_me"> <?php echo $days;?> Days Remaining! Last date : <?php echo date("d-F",strtotime($_SESSION['ekTo'])); ?> </span></font>
 <?php } ?>
 
 </td>
</tr>
<?php } ?>
<?php /******************** Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg CLOSE************/ ?>

<?php $AllowDoj=$_SESSION['AllowDoj']; ?>   
<?php /******************** Btn Open Btn Open Btn Open Btn Open Btn Open Btn Open ************/ ?>
<?php /******************** Btn Open Btn Open Btn Open Btn Open Btn Open Btn Open ************/ ?>

<!--<a href="EmpPmsAppForm.php?ee=0&aa=1&rr=1&rr2=1&hh=1&sh=1&hp=1&fr=0&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=0&fa=1&fb=1&ffeedb=1&org=1">.</a>-->

<tr>
 <td valign="top" style="width:100%;">
  <table>
   <tr>
<!-- Details -->   
<?php if($_SESSION['eDetails']=='Y'){ ?>
<td class="tdc"><a href="pms.php?log=<?php echo $_SESSION['logCheckEmp']; ?>&ee=0&aa=1&rr=1&rr2=1&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=0&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img src="images/PersonalDetails1.png" border="0" style="display:<?php if($_REQUEST['pd']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/PersonalDetails.png" border="0" style="display:<?php if($_REQUEST['pd']==0){echo 'block';}else{echo 'none';} ?>"/></td>

<!-- Schedule -->
<?php } if($_SESSION['eSchedule']=='Y' AND ($_SESSION['eAppform']=='Y' OR $_SESSION['eMidform']=='Y' OR $_SESSION['eKraform']=='Y')){ ?><td class="tdc"><a href="javascript:OpenWindow('<?php echo $_SESSION['eAppform'];?>','<?php echo $_SESSION['eKraform'];?>')"><img src="images/schedule1.png" border="0"/></a></td>

<!-- Help/Kra -->
<?php } if($_SESSION['eHelpfaq']=='Y' AND ($_SESSION['eAppform']=='Y' OR $_SESSION['eMidform']=='Y')){ ?> 
<td class="tdc"><a href="#" onClick="OpenHelpfile('help')"><img src="images/btnPhelp1.png" border="0"/></a></td>
<td class="tdc"><a href="#" onClick="OpenFaqfile('faq')"><img src="images/faqbtn.png" border="0"/></a></a>

<?php /*
<a href="EmpPmsAppForm.php?ee=0&aa=1&rr=1&rr2=1&hh=1&sh=1&hp=1&fr=0&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=0&fa=1&fb=1&ffeedb=1&org=1">.</a> */ ?>

</td>
 
<!-- Appraisal Form -->
<?php } if(($_SESSION['eAppform']=='Y' AND $_SESSION['Joining']<=$AllowDoj) OR ($_SESSION['eMidform']=='Y' AND $_SESSION['Joining']<=date("Y").'-01-31'))
	  { 
	      
	  $sqlChe = mysql_query("select * from hrm_pms_allow where EmployeeID=".$EmployeeId." AND CompanyId=".$CompanyId." AND AssesmentYear=".$_SESSION['PmsYId'], $con); $rowChe=mysql_num_rows($sqlChe);    
	  $sqlCh = mysql_query("select * from hrm_pms_allow where Appraiser_EmployeeID=".$resY['Appraiser_EmployeeID']." AND CompanyId=".$CompanyId." AND AssesmentYear=".$_SESSION['PmsYId'], $con); $rowCh=mysql_num_rows($sqlCh);    
	      
	   if($_SESSION['eMidform']=='Y'){ $pgg='EmpPmsFormA.php'; }else{ $pgg='EmpPmsAppForm.php'; }
	   if(($CuDate>=$_SESSION['eFrom'] AND $CuDate<=$_SESSION['eTo'] AND $_SESSION['eSts']=='A') OR $rowChe>0 OR ($CuDate>=$_SESSION['aFrom'] AND $CuDate<=$_SESSION['aTo'] AND $_SESSION['aSts']=='A' AND $resY['Emp_PmsStatus']==1 AND $resY['Appraiser_PmsStatus']==3) OR ($rowCh>0 AND $_SESSION['aSts']=='A' AND $resY['Emp_PmsStatus']==1 AND $resY['Appraiser_PmsStatus']==3) OR ($CuDate>=$_SESSION['rFrom'] AND $CuDate<=$_SESSION['rTo'] AND $_SESSION['rSts']=='A' AND $resY['Emp_PmsStatus']==1 AND $resY['Appraiser_PmsStatus']==3 AND $resY['Reviewer_PmsStatus']==3) OR ($CuDate>=$_SESSION['hFrom'] AND $CuDate<=$_SESSION['hTo'] AND $_SESSION['hSts']=='A' AND $resY['Emp_PmsStatus']==1 AND $resY['Appraiser_PmsStatus']==3 AND $resY['Reviewer_PmsStatus']==3 AND $resY['HodSubmit_ScoreStatus']==3) OR $resY['ExtraAllowPMS']==1){ ?>
	   <td class="tdc"><a href="<?php echo $pgg;?>?ee=0&aa=1&rr=1&rr2=1&hh=1&sh=1&hp=1&fr=0&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=0&fa=1&fb=1&ffeedb=1&org=1"><img src="images/Appraisalfrom1.png" border="0" style="display:<?php if($_REQUEST['fr']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/Appraisalfrom.png" border="0" style="display:<?php if($_REQUEST['fr']==0){echo 'block';}else{echo 'none';} ?>"/></td><?php } ?>

<!-------------------------------------->
<!-------------------------------------->  
<?php  if($EmployeeId!=6 AND $EmployeeId!=7 AND $EmployeeId!=21 AND $EmployeeId!=51 AND $EmployeeId!=223 AND $EmployeeId!=224 AND $EmployeeId!=461 AND $EmployeeId!=52 AND $EmployeeId!=89){ ?>

<?php $sL=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='PMS'",$con); 
      $rL=mysql_fetch_assoc($sL); 
      if($rL['ViewLeteer_emp']=='Y'){
?>

<script type="text/javascript" language="javascript">
function LetterAllPdf(P,E,Y,C,R,G,D)
{window.open("pmsletter/VeiwAppAllPdf.php?action=All&test=true&rightform=false&cc=102&prp=55&rtr=%true%&ff=ok&P="+P+"&E="+E+"&Y="+Y+"&C="+C+"&R="+R+"&G="+G+"&D="+D,"AppLetter","scrollbars=yes,resizable=no,menubar=yes,width=820,height=750,location=no,directories=no");}
</script>
<?php $SqlP=mysql_query("select Hod_TotalFinalRating,Hod_EmpDesignation,Hod_EmpGrade,HR_CurrDesigId,HR_CurrGradeId,HR_DesigId,HR_GradeId from hrm_employee_pms where AssessmentYear=".$_SESSION['PmsYId']." AND EmployeeID=".$EmployeeId." AND EmpPmsId=".$_SESSION['ePmsId'], $con); $ResP=mysql_fetch_assoc($SqlP);

if($ResP['HR_DesigId']>0){$qryD="DesigId=".$ResP['HR_DesigId'];}else{$qryD="DesigId=".$ResP['Hod_EmpDesignation'];}
if($ResP['HR_GradeId']>0){$qryG="GradeId=".$ResP['HR_GradeId'];}else{$qryG="GradeId=".$ResP['Hod_EmpGrade'];}

$sqlD=mysql_query("select DesigName,DesigId from hrm_designation where ".$qryD,$con); 
$sqlG=mysql_query("select GradeValue from hrm_grade where CompanyId=".$CompanyId." AND ".$qryG,$con);

//$sqlD=mysql_query("select DesigName,DesigId from hrm_designation where DesigId=".$ResP['Hod_EmpDesignation'],$con); 
//$sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$ResP['Hod_EmpGrade']." AND CompanyId=".$CompanyId,$con);


$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeId=".$ResP['Hod_EmpGrade']." AND CompanyId=".$CompanyId,$con); $sqlDe=mysql_query("select DesigName,DesigId from hrm_designation where DesigId=".$ResP['HR_CurrDesigId'], $con);
$sqlGr=mysql_query("select GradeValue from hrm_grade where GradeId=".$ResP['HR_CurrGradeId']." AND CompanyId=".$CompanyId,$con); $resD=mysql_fetch_assoc($sqlD); $resG=mysql_fetch_assoc($sqlG); $resGrade=mysql_fetch_assoc($sqlGrade);
$resDe=mysql_fetch_assoc($sqlDe); $resGr=mysql_fetch_assoc($sqlGr);

if($ResP['Hod_TotalFinalRating']>0){$EmpRating=$ResP['Hod_TotalFinalRating']; } else{$EmpRating=$ResP['Reviewer_TotalFinalRating']; }if($resG['GradeValue']==''){$EmpGrade=$resGr['GradeValue'];} else{$EmpGrade=$resG['GradeValue'];} if($resD['DesigId']==''){$Desig=$resDe['DesigId'];}else {$Desig=$resD['DesigId']; } ?>
<?php //if($EmployeeId==169 OR $EmployeeId==142){ ?><td class="tdc"><a href="#" onClick="LetterAllPdf(<?php echo $_SESSION['ePmsId'].','.$EmployeeId.','.$_SESSION['PmsYId'].','.$CompanyId.','.$EmpRating; ?>,'<?php echo $EmpGrade; ?>',<?php echo $Desig; ?>)"><span class="blink_me"><img src="images/AppLet.png" border="0"/></span></a>&nbsp;</td><?php //} ?>
<?php } //if($rL['ViewLeteer_emp']=='Y') 
   }
?>
<!-------------------------------------->
<!-------------------------------------->


<!-- View/print PMS -->
<?php } if($_SESSION['eVeiwprint']=='Y' AND (($_SESSION['eAppform']=='Y' AND $resY['Emp_AchivementSave']=='Y' AND $resY['Emp_KRASave']=='Y' AND $resY['Emp_SkillSave']=='Y' AND $resY['Emp_FeedBackSave']=='Y') OR ($_SESSION['eMidform']=='Y' AND $resY['Emp_KRASave']=='Y' AND $resY['Emp_SkillSave']=='Y')) ){ ?> 
<td class="tdc"><a href="#" onClick="printpage(<?php echo $_SESSION['ePmsId'].','.$EmployeeId; ?>)"/><img src="images/ViewPrintForm.png" border="0" /></a></td>

<!-- Help/Faq KRA -->
<?php } if($_SESSION['eHelpfaq']=='Y' AND $_SESSION['eKraform']=='Y'){ ?> 
<td class="tdc"><a href="#" onClick="OpenKRAHelpfile('krahelp')"><img src="images/btnKhelp1.png" border="0"/></a></td>

<?php $sdp=mysql_query("select DepartmentId from hrm_employee_general where EmployeeID=".$EmployeeId,$con); $rdp=mysql_fetch_assoc($sdp); 

//if($rdp['DepartmentId']!=4){ ?>

<!-- Kra form -->                                                  <!--AND $CuDate<=$_SESSION['ekTo']--> 
<?php } if($_SESSION['eKraform']=='Y' AND $CuDate>=$_SESSION['ekFrom'] AND $_SESSION['ekSts']=='A'){ if($CompanyId==1){$Lblk='KraYear_1.png'; $Lblk1='KraYear1_1.png';}else{$Lblk='KraYear.png'; $Lblk1='KraYear1.png';}?>
<td class="tdc"><a href="EmpAddNewKRA.php?ee=0&aa=1&rr=1&hh=1&sh=1&hp=1&fr=1&kr=0&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=0&fa=1&fb=1&ffeedb=1&org=1"/><img src="images/<?php echo $Lblk1;?>" border="0" style="display:<?php if($_REQUEST['kr']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/<?php echo $Lblk;?>" border="0" style="display:<?php if($_REQUEST['kr']==0){echo 'block';}else{echo 'none';} ?>"/></td>

<?php } ?>

<?php //} //if($rdp['DepartmentId']!=4) ?>

<?php /*
<a href="<?php echo $pgg;?>?ee=0&aa=1&rr=1&rr2=1&hh=1&sh=1&hp=1&fr=0&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=0&fa=1&fb=1&ffeedb=1&org=1">..</a> */ ?>

   </tr>
  </table>
 </td>
</tr>
<?php /******************** Btn Close Btn Close Btn Close Btn Close Btn Close Btn Close ************/ ?>
<?php /******************** Btn Close Btn Close Btn Close Btn Close Btn Close Btn Close ************/ ?>

 </table>
 </td>
</tr>
</table>
<script type="text/javascript" language="javascript">
function OpenKRAHelpfile(value){window.open("KRAHelpFile.php?a=open&v="+value,"HelpFile","width=800,height=650"); }
function printpage(PmsId,EmpId) 
{ window.open ("EmpAppFormPrint.php?PmsId="+PmsId+"&EmpId="+EmpId,"AppForm","menubar=yes,scrollbars=yes,resizable=1,width=1200,height=600");}
</script>