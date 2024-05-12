<table border="0" style="margin-top:-5px; width:100%; height:20px;">
<?php $SqlCom=mysql_query("select BasicId,CompanyName from hrm_company_basic where CompanyId=".$CompanyId."", $con); $resCom=mysql_fetch_assoc($SqlCom);  ?>
				<tr>
				  <td align="Left" valign="top" style="font-family:Times New Roman;color:#003162; font-size:15px; width:800px;">
				  <i><b>Welcome :&nbsp;</b></i>
				  <font style='font-family:Times New Roman;font-size:14px;color:#2E4B33;'><b><?php echo $_SESSION['UserMrMrsMiss'].'&nbsp;&nbsp;'.$_SESSION['UserFirstName'].' '.$_SESSION['UserSecondName'].' '.$_SESSION['UserLastName']; ?></b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  <i><b>Company :&nbsp;</b></i>
				  <font style='font-family:Times New Roman;font-size:14px;color:#2E4B33;'><b><?php echo $resCom['CompanyName']; ?></b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  <i><b>Year :&nbsp;</b></i>
				  <font style='font-family:Times New Roman;font-size:14px;color:#2E4B33;'><b><?php echo $fromdate; ?></b></font>
				  <font style='font-family:Times New Roman;font-size:13px;color:#9B0000;'><b>to</b></font>
				  <font style='font-family:Times New Roman;font-size:14px;color:#2E4B33;'><b><?php echo $todate; ?></b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  <a href="../Home.php?logout=true" id="privacy" style="text-decoration:none;">
				  <font style='font-family:Times New Roman;font-size:16px;color:#9B0000;'><b><u>LogOut</u></b></font></a>&nbsp;&nbsp;&nbsp;
				  <a href="ChangePwd.php" class="top_link" style="text-decoration:none;"><b style="color:#804000;"><u>Change Password</u></b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  <a href="http://vnrdev.in/HR_Mannual" class="top_link" style="text-decoration:none;" target="_blank"><b style="color:#804000;"><u>HR Policy Manual<img src="https://www.vnrseeds.co.in/hrims/Employee/images/new_blink.gif" border="0"></u></b></a>
				  </td>  
				  <td align="right" valign="top" width="50">&nbsp;</td>	
			   </tr>
</table>
