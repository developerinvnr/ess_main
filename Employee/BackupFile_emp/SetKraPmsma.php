<?php $CuDate=date("Y-m-d"); ?>
<table style="width:100%;">
<tr>
 <td style="width:100%;">
 <table style="width:100%;">

<?php /******************** Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg OPEN************/ ?>
<?php if($_SESSION['eMsg']=='Y'){ ?>
<tr>
 <td>
 <?php if(($_SESSION['eAppform']=='Y' OR $_SESSION['eMidform']=='Y') AND $CuDate>=$_SESSION['aFrom'] AND $CuDate<=$_SESSION['aTo'] AND $_SESSION['aSts']=='A'){ $LastDate=$_SESSION['aTo']; $CurrentDate=date("Y-m-d");
		 $diff = abs(strtotime($LastDate) - strtotime($CurrentDate));
         $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/(60*60*24)); ?>
 <font class="msg_r"><font color="#00366C">&nbsp;PMS :</font><span class="blink_me"> <?php echo $days;?> Days Remaining! Last date : <?php echo date("d-F",strtotime($_SESSION['aTo'])); ?> </span></font>
 <?php } ?>
 &nbsp;&nbsp;
 <?php if($_SESSION['eKraform']=='Y' AND $CuDate>=$_SESSION['akFrom'] AND $CuDate<=$_SESSION['akTo'] AND $_SESSION['akSts']=='A'){ $LastDate=$_SESSION['akTo']; $CurrentDate=date("Y-m-d");
		 $diff = abs(strtotime($LastDate) - strtotime($CurrentDate));
         $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/(60*60*24)); ?>
 <font class="msg_r"><font color="#00366C">KRA :</font><span class="blink_me"> <?php echo $days;?> Days Remaining! Last date : <?php echo date("d-F",strtotime($_SESSION['akTo'])); ?> </span></font>
 <?php } ?>
 
 </td>
</tr>
<?php } ?>
<?php /******************** Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg CLOSE************/ ?> 


<?php /******************** Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg OPEN************ ?>
<?php if($_SESSION['eMsg']=='Y'){ ?>
<?php if(($_SESSION['eAppform']=='Y' OR $_SESSION['eMidform']=='Y') AND $CuDate>=$_SESSION['aFrom'] AND $CuDate<=$_SESSION['aTo'] AND $_SESSION['aSts']=='A'){ $LastDate=$_SESSION['aTo']; $CurrentDate=date("Y-m-d");
		 $diff = abs(strtotime($LastDate) - strtotime($CurrentDate));
         $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/(60*60*24)); ?>
 <td><font class="msg_r"><span class="blink_me"><?php echo $days;?> Days Remaining! Last date : <?php echo date("d-F",strtotime($_SESSION['aTo'])); ?> </span></font></td>
  
<?php } } ?>
<?php /******************** Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg CLOSE************/ ?>


   
<?php /******************** Btn Open Btn Open Btn Open Btn Open Btn Open Btn Open ************/ ?>
<?php /******************** Btn Open Btn Open Btn Open Btn Open Btn Open Btn Open ************/ ?>
<tr>
 <td valign="top" style="width:100%;">
  <table>
   <tr>
<!-- Home -->   
<?php if($_SESSION['aHome']=='Y'){ ?>
<td class="tdc"><a href="Indexpms.php?log=<?php echo $_SESSION['logCheckEmp']; ?>&ee=1&aa=1&rr=1&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=0&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img src="images/Home.png" border="0" style="display:<?php if($_REQUEST['h']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/Home1.png" border="0" style="display:<?php if($_REQUEST['h']==0){echo 'block';}else{echo 'none';} ?>"/></td>

<!-- Team -->
<?php } if($_SESSION['aTeam']=='Y'){ ?><td class="tdc"><a href="ManagerPms.php?ee=1&aa=0&rr=1&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=0&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img src="images/MyTeam1.png" border="0" style="display:<?php if($_REQUEST['mt']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/MyTeam.png" border="0" style="display:<?php if($_REQUEST['mt']==0){echo 'block';}else{echo 'none';} ?>"/></td>

<!-- Team Status -->
<?php } if($_SESSION['aStatus']=='Y' AND ($_SESSION['eAppform']=='Y' OR $_SESSION['eMidform']=='Y')){ ?> 
<td class="tdc"><?php $sqlCh = mysql_query("select * from hrm_pms_allow where Appraiser_EmployeeID=".$EmployeeId." AND CompanyId=".$CompanyId." AND AssesmentYear=".$_SESSION['PmsYId'], $con); $sqlCh2  = mysql_query("select EmpPmsId from hrm_employee_pms where (Appraiser_PmsStatus=1 OR Appraiser_PmsStatus=3) AND Reviewer_PmsStatus=3 AND Appraiser_EmployeeID=".$EmployeeId." AND CompanyId=".$CompanyId." AND AssessmentYear=".$_SESSION['PmsYId'], $con); $rowCh=mysql_num_rows($sqlCh); $rowCh2=mysql_num_rows($sqlCh2);  if(($CuDate>=$_SESSION['aFrom'] AND $CuDate<=$_SESSION['aTo'] AND $_SESSION['aSts']=='A') OR $rowCh>0 OR ($CuDate>$_SESSION['aTo'] AND $rowCh2>0)){ ?><a href="ManagerTeamStatus.php?action=teamS&ee=1&aa=0&rr=1&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=0&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img src="images/TeamStatus1.png" border="0" style="display:<?php if($_REQUEST['mts']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/TeamStatus.png" border="0" style="display:<?php if($_REQUEST['mts']==0){echo 'block';}else{echo 'none';} ?>"/><?php } ?>

<?php /*
<a href="ManagerTeamStatus.php?action=teamS&ee=1&aa=0&rr=1&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=0&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1">.</a> */ ?>


</td>
 
<!-- Rating Graph -->
<?php } if($_SESSION['aRating']=='Y' AND ($_SESSION['eAppform']=='Y' OR $_SESSION['eMidform']=='Y')){ ?> 
<td class="tdc"><a href="ManagerRatingGraph.php?ee=1&aa=0&rr=1&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=0&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img src="images/ratinggraph1.png" border="0" style="display:<?php if($_REQUEST['rg']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/ratinggraph.png" border="0" style="display:<?php if($_REQUEST['rg']==0){echo 'block';}else{echo 'none';} ?>"/></td>

<!-- Kra form -->
<?php } if($_SESSION['eKraform']=='Y' AND $CuDate>=$_SESSION['akFrom'] AND $_SESSION['akSts']=='A'){ if($CompanyId==1){$Lblk='KraYearMyTeam_1.png'; $Lblk1='KraYearMyTeam1_1.png';}else{$Lblk='KraYearMyTeam.png'; $Lblk1='KraYearMyTeam1.png';} ?> 
<td class="tdc"><a href="AppCheckNewKRA.php?ee=1&aa=0&rr=1&hh=1&sh=1&hp=1&fr=1&kr=0&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"/><img src="images/<?php echo $Lblk1;?>" border="0" style="display:<?php if($_REQUEST['kr']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/<?php echo $Lblk;?>" border="0" style="display:<?php if($_REQUEST['kr']==0){echo 'block';}else{echo 'none';} ?>"/></td>
<?php } ?>

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
