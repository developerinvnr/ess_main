<table border="0" style="margin-top:-5px;width:1200px; height:20px;">
<?php $sqlDr=mysql_query("select DR from hrm_employee_personal where EmployeeID=".$EmployeeId, $con); $resDr=mysql_fetch_assoc($sqlDr);
      if($resDr['DR']=='Y'){$M='Dr.';} elseif($_SESSION['Gender']=='M'){$M='Mr.';} elseif($_SESSION['Gender']=='F' AND $_SESSION['Married']=='Y'){$M='Mrs.';} elseif($_SESSION['Gender']=='F' AND $_SESSION['Married']=='N'){$M='Miss.';}  $NameE=$M.' '.$Ename; 
      $sqlSN=mysql_query("select * from hrm_upnotification where NotificationStatus='A'", $con); $resSN=mysql_fetch_assoc($sqlSN); 
	  $sqlSE=mysql_query("select ProfileCertify,EmpCode from hrm_employee where EmployeeID=".$EmployeeId, $con); $resSE=mysql_fetch_assoc($sqlSE); $LEC=strlen($resSE['EmpCode']); 
      if($LEC==1){$EC='000'.$resSE['EmpCode'];} if($LEC==2){$EC='00'.$resSE['EmpCode'];} if($LEC==3){$EC='0'.$resSE['EmpCode'];} if($LEC>=4){$EC=$resSE['EmpCode'];}
	  $SqlCom=mysql_query("select CompanyName from hrm_company_basic where CompanyId=".$CompanyId."", $con); $resCom=mysql_fetch_assoc($SqlCom); 
?>	  
	  
				<tr>
				  <td align="Left" valign="top" style="font-family:Times New Roman;color:#003162; font-size:15px; width:1200px; ">
				  <i><b>Welcome :&nbsp;</b></i>
				  <font style='font-family:Times New Roman;font-size:14px;color:#2E4B33;'><b><?php echo $NameE;?></b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  <i><b>EmpCode :&nbsp;</b></i>
				  <font style='font-family:Times New Roman;font-size:14px;color:#2E4B33;'><b><?php echo $EC; ?></b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  <i><b>Year :&nbsp;</b></i>
				  <font style='font-family:Times New Roman;font-size:14px;color:#2E4B33;'><b><?php echo $fromdate; ?></b></font>
				  <font style='font-family:Times New Roman;font-size:13px;color:#9B0000;'><b>to</b></font>
				  <font style='font-family:Times New Roman;font-size:14px;color:#2E4B33;'><b><?php echo $todate; ?></b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  <i><b>Company :&nbsp;</b></i>
				  <font style='font-family:Times New Roman;font-size:14px;color:#2E4B33;'><b><?php echo $resCom['CompanyName']; ?></b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  <a href="../Home.php?logout=true" id="privacy" style="text-decoration:none;">
				  <font style='font-family:Times New Roman;font-size:16px;color:#9B0000;'><b><u>LogOut</u></b></font></a> &nbsp;&nbsp;
				  </td>  								
			   </tr>
</table>

