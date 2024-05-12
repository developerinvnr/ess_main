
<table>
 <tr>
  <td class="formh">(<i>Appraisal Form</i>) :&nbsp;<br></td>
  <?php if($_SESSION['eAppform']=='Y'){ ?>
  <td><a href="EmpPmsAppForm.php?ee=0&aa=1&rr=1&hh=1&sh=1&hp=1&fr=0&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=0&fa=1&fb=1&ffeedb=1&org=1" style="text-decoration:<?php if($_REQUEST['fachiv']==1){echo 'underline';}else{echo 'none';} ?>;"><font class="<?php if($_REQUEST['fachiv']==1){echo 'formb';}else{echo 'formw';} ?>">Achievements</font></a></td>
  <td style="width:5px;">&nbsp;</td>
  
  <?php } if($_SESSION['eAppform']=='Y' OR $_SESSION['eMidform']=='Y'){ ?>
  <td><a href="EmpPmsFormA.php?ee=0&aa=1&rr=1&hh=1&sh=1&hp=1&fr=0&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=0&fb=1&ffeedb=1&org=1" style="text-decoration:<?php if($_REQUEST['fa']==1){echo 'underline';}else{echo 'none';} ?>;"><font class="<?php if($_REQUEST['fa']==1){echo 'formb';}else{echo 'formw';} ?>">Form A(KRA)</font></a></td>
  <td style="width:5px;">&nbsp;</td>
  
  <?php } if($_SESSION['eAppform']=='Y' OR $_SESSION['eMidform']=='Y'){ ?>
  <td><a href="EmpPmsFormB.php?ee=0&aa=1&rr=1&hh=1&sh=1&hp=1&fr=0&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=0&ffeedb=1&org=1" style="text-decoration:<?php if($_REQUEST['fb']==1){echo 'underline';}else{echo 'none';} ?>;"><font class="<?php if($_REQUEST['fb']==1){echo 'formb';}else{echo 'formw';} ?>">Form B(Skills)</font></a></td>
  <td style="width:5px;">&nbsp;</td>
  
  <?php } if($_SESSION['eAppform']=='Y'){ ?>
  <td><a href="EmpPmsFedback.php?ee=0&aa=1&rr=1&hh=1&sh=1&hp=1&fr=0&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=0&org=1" style="text-decoration:<?php if($_REQUEST['ffeedb']==1){echo 'underline';}else{echo 'none';} ?>;"><font class="<?php if($_REQUEST['ffeedb']==1){echo 'formb';}else{echo 'formw';} ?>">FeedBack</font></a></td>
  <td style="width:5px;">&nbsp;</td>
  <?php if($resY['Emp_PmsStatus']!=2){ ?><td><a href="#" onClick="UploadEmpfile(<?php echo $_SESSION['ePmsId'].','.$EmployeeId.','.$YearId; ?>)"><font class="forma">UploadFile</font></a></td><?php } ?>
  <?php } ?>
  
  
<?php /******************** Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg OPEN************/ ?>
<?php /******************** Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg OPEN************/ ?>
<?php if($_SESSION['eMsg']=='Y'){ ?>
<td style="width:5px;">&nbsp;</td>

<?php if($_SESSION['eAppform']=='Y'){ ?>
 <td> 
<?php 
if($resY['Emp_AchivementSave']=='Y' AND $resY['Emp_KRASave']=='Y' AND $resY['Emp_SkillSave']=='Y' AND $resY['Emp_FeedBackSave']=='Y' AND $resY['Emp_PmsStatus']==1 AND ($resY['Appraiser_PmsStatus']==0 OR $resY['Appraiser_PmsStatus']==3)){ echo '<font class="msg_y"><span class="blink_me">Please click on final submit button for submitting your appraisal form!</span></font>'; }

if($resY['Emp_PmsStatus']==2){ echo '<font class="msg_g"><span class="blink_me">You have successfully submitted appraisal form!</span></font>'; }
if(($resY['Emp_AchivementSave']=='N' OR $resY['Emp_KRASave']=='N' OR $resY['Emp_SkillSave']=='N' OR $resY['Emp_FeedBackSave']=='N') AND ($resY['Emp_PmsStatus']==0 OR $resY['Emp_PmsStatus']==1)){ echo '<font class="msg_y"><span class="blink_me">Please fill appraisal form before last date of self appraisal!</span></font>'; }
?>
 </td>


<?php } if($_SESSION['eMidform']=='Y'){ ?>
 <td>
<blink> 
<?php
if($resY['Emp_KRASave']=='Y' AND $resY['Emp_SkillSave']=='Y' AND $resY['Emp_PmsStatus']==1 AND ($resY['Appraiser_PmsStatus']==0 OR $resY['Appraiser_PmsStatus']==3)){echo '<font class="msg_y"><span class="blink_me">Please click on final submit button for complete your mid-year appraisal form!</span></font>';}

if($resY['Emp_PmsStatus']==2){ echo '<font class="msg_g">You have successfully submitted mid-year appraisal form!</font>'; }
if(($resY['Emp_KRASave']=='N' OR $resY['Emp_SkillSave']=='N') AND ($resY['Emp_PmsStatus']==0 OR $resY['Emp_PmsStatus']==1)){ echo '<font class="msg_y"><span class="blink_me">Please fill mid-year appraisal form before last date of self appraisal!</span></font>'; }
?>
</blink>
 </td>

<?php } ?>

<?php } ?>
<?php /******************** Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg CLOSE************/ ?>
<?php /******************** Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg CLOSE************/ ?>
  
 </tr>
</table>