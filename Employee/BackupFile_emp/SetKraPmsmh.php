<?php $CuDate=date("Y-m-d"); ?>
<table style="width:100%;">
<tr>
 <td style="width:100%;">
 <table style="width:100%;">
   
<?php /******************** Btn Open Btn Open Btn Open Btn Open Btn Open Btn Open ************/ ?>
<?php /******************** Btn Open Btn Open Btn Open Btn Open Btn Open Btn Open ************/ ?>   
<tr>
 <td valign="top" style="width:100%;">
  <table>
   <tr>
 
<?php if($_REQUEST['hh']==0 AND $_SESSION['BtnHod']>0){ ?>

<!-- Home --> 
<?php if($_SESSION['hHome']=='Y'){ ?>
<td class="tdc"><a href="Indexpms.php?log=<?php echo $_SESSION['logCheckEmp']; ?>&ee=1&aa=1&rr=1&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=0&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img src="images/Home.png" border="0" style="display:<?php if($_REQUEST['h']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/Home1.png" border="0" style="display:<?php if($_REQUEST['h']==0){echo 'block';}else{echo 'none';} ?>"/></td>
<?php } ?>

<!-- Eform Open Eform Open Open Open Open Open Open Open Open -->
<!-- Eform Open Eform Open Open Open Open Open Open Open Open -->
<?php if($_SESSION['eAppform']=='Y'){ ?>

<!-- Team Status -->
<?php if($_SESSION['hStatus']=='Y'){ ?> 
<td class="tdc"><a href="RevHodPms.php?ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=0&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img src="images/TeamStatus1.png" border="0" style="display:<?php if($_REQUEST['mts']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/TeamStatus.png" border="0" style="display:<?php if($_REQUEST['mts']==0){echo 'block';}else{echo 'none'; } ?>"/></td>
<?php } ?>

<!-- ************************************************* Open -->
<!-- ************************************************* Open -->
<?php $sqlCh = mysql_query("select * from hrm_pms_allow where HOD_EmployeeID=".$EmployeeId." AND CompanyId=".$CompanyId." AND AssesmentYear=".$_SESSION['PmsYId'], $con); $rowCh=mysql_num_rows($sqlCh); 
if(($CuDate>=$_SESSION['hFrom'] AND $CuDate<=$_SESSION['hTo'] AND $_SESSION['hSts']=='A') OR $rowCh>0){ ?>

<!-- Score -->
<?php if($_SESSION['hScore']=='Y'){ ?>
<td class="tdc"><a href="HodPmsScore.php?ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=0&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img src="images/Score1.png" border="0" style="display:<?php if($_REQUEST['scr']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/Score.png" border="0" style="display:<?php if($_REQUEST['scr']==0){echo 'block';}else{echo 'none';} ?>"/></td> 
	  
<!-- Promotion -->
<?php } if($_SESSION['hProm']=='Y'){ ?>
<td class="tdc"><a href="HodPmsPromotion.php?ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=0&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img src="images/promotion1.png" border="0" style="display:<?php if($_REQUEST['prom']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/promotion.png" border="0" style="display:<?php if($_REQUEST['prom']==0){echo 'block';}else{echo 'none';} ?>"/></td> 

<!-- Increment -->
<?php } if($_SESSION['hInc']=='Y'){ ?>
<td class="tdc"><a href="HodPmsIncrement.php?ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=0&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img src="images/Increment1.png" border="0" style="display:<?php if($_REQUEST['inc']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/Increment.png" border="0" style="display:<?php if($_REQUEST['inc']==0){echo 'block';}else{echo 'none';} ?>"/></td>
<?php } ?>

<?php } //$_SESSION['hSts']=='A') OR $rowCh>0 ?>
<!-- ************************************************* Close -->
<!-- ************************************************* Close -->

<!-- PMS Reports -->
<?php if($_SESSION['hPmsreport']=='Y'){ ?>
<td class="tdc"><a href="HodPmsReports.php?ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=0&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img src="images/pmsreports1.png" border="0" style="display:<?php if($_REQUEST['pmsr']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/pmsreports.png" border="0" style="display:<?php if($_REQUEST['pmsr']==0){echo 'block';}else{echo 'none';} ?>"/></td>

<!-- Increment Reports -->
<?php } if($_SESSION['hIncreport']=='Y'){ ?>
<td class="tdc"><a href="HodIncReports.php?ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=0&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img src="images/IncrementReports1.png" border="0" style="display:<?php if($_REQUEST['incr']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/IncrementReports.png" border="0" style="display:<?php if($_REQUEST['incr']==0){echo 'block';}else{echo 'none';} ?>"/></td>

<!-- Rating Graph -->
<?php } if($_SESSION['hRating']=='Y'){ ?>
<td class="tdc"><a href="RatingGraph.php?ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=0&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img src="images/ratinggraph1.png" border="0" style="display:<?php if($_REQUEST['rg']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/ratinggraph.png" border="0" style="display:<?php if($_REQUEST['rg']==0){echo 'block';}else{echo 'none';} ?>"/></td>
<td class="tdc"><a href="CompliteRatingGraph.php?ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=0"><img src="images/OveallRatingGraph1.png" border="0" style="display:<?php if($_REQUEST['org']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/OveallRatingGraph.png" border="0" style="display:<?php if($_REQUEST['org']==0){echo 'block';}else{echo 'none';} ?>"/></td>
<?php } ?>

<?php } //if($_SESSION['eAppform']=='Y') ?>
<!-- Eform Close Eform Close Close Close Close Close Close Close -->
<!-- Eform Close Eform Close Close Close Close Close Close Close -->

<?php if($_SESSION['eKraform']=='Y' AND $CuDate>=$_SESSION['hkFrom'] AND $_SESSION['hkSts']=='A'){ if($CompanyId==1){$Lblk='KraYearMyTeam_1.png'; $Lblk1='KraYearMyTeam1_1.png';}else{$Lblk='KraYearMyTeam.png'; $Lblk1='KraYearMyTeam1.png';} ?>
<td class="tdc"><a href="HodFinalEmpKRA.php?ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=0&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"/><img src="images/<?php echo $Lblk1;?>" border="0" style="display:<?php if($_REQUEST['kr']==1){echo 'block';}else{echo 'none';} ?>"/></a><img src="images/<?php echo $Lblk;?>" border="0" style="display:<?php if($_REQUEST['kr']==0){echo 'block';}else{echo 'none';} ?>"/> </td>
<?php } ?>


<?php } //if($_REQUEST['rr']==0) ?> 			   
	  
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
