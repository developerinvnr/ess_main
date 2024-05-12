<?php $sqlDr=mysql_query("select DR from hrm_employee_personal where EmployeeID=".$EmployeeId, $con); 
      $resDr=mysql_fetch_assoc($sqlDr);
      if($resDr['DR']=='Y'){$M='Dr.';} elseif($_SESSION['Gender']=='M'){$M='Mr.';} elseif($_SESSION['Gender']=='F' AND $_SESSION['Married']=='Y'){$M='Mrs.';} elseif($_SESSION['Gender']=='F' AND $_SESSION['Married']=='N'){$M='Miss.';}  
	  $NameE=$M.' '.$Ename; 
      $sqlSN=mysql_query("select * from hrm_upnotification where NotificationStatus='A'", $con); 
	  $resSN=mysql_fetch_assoc($sqlSN); 
	  $sqlSE=mysql_query("select ProfileCertify,EmpCode from hrm_employee where EmployeeID=".$EmployeeId, $con); 
	  $resSE=mysql_fetch_assoc($sqlSE); $LEC=strlen($resSE['EmpCode']); 
      if($LEC==1){$EC='000'.$resSE['EmpCode'];}elseif($LEC==2){$EC='00'.$resSE['EmpCode'];}elseif($LEC==3){$EC='0'.$resSE['EmpCode'];}elseif($LEC>=4){$EC=$resSE['EmpCode'];} ?>
<table border="0" style="margin-top:-5px;width:100%;height:20px;">
 <tr>
  <td align="Left" valign="top" style="font-family:Times New Roman;color:#003162;font-size:15px;width:100%; ">
				  
<?php if($resReti['RetiStatus']=='N'){	/* Start */ ?>	
   <i><b>Company :&nbsp;</b></i>
   <font style='font-size:14px;color:#2E4B33;'><b><?php echo $resCom['CompanyName']; ?></b></font>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <i><b>Year :&nbsp;</b></i>
   <font style='font-size:14px;color:#2E4B33;'><b><?php echo $fromdate; ?></b></font>
   <font style='font-size:13px;color:#9B0000;'><b>to</b></font>
   <font style='font-size:14px;color:#2E4B33;'><b><?php echo $todate; ?></b></font>
<?php } /* Close */?>	

<?php if($resReti['RetiStatus']=='Y'){	/* Start */?>
   <i><b>Company :&nbsp;</b></i>
   <font style='font-size:14px;color:#2E4B33;'><b><?php echo 'Consulted';; ?></b></font>
<?php } ?>	
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="ChangePwd.php" class="top_link" style="text-decoration:none;"><b style="color:#804000;"><u>Change Password</u></b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 <a href="../Home.php?logout=true" class="top_link" style="text-decoration:none;">
    <b style="color:#804000;"><u>LogOut</u></b>
   </a>
 
				  				  
   </td>  								
  </tr>
</table>

