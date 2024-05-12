<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
/******************************************************************************/
?>
<html>
<head>
<title>Leave Details</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript">
function Details(LId)
{ var EI=document.getElementById("EI").value; var LT=document.getElementById("LT").value; 
  var x = "EmpLDetails.php?action=details&LI="+LId+"&LT="+LT+"&EI="+EI;  window.location=x; 
}

</script>
<style>.font { color:#ffffff; font-family:Georgia; font-size:11px; width:200px;} .font1 { font-family:Georgia; font-size:11px; height:14px; } 
.font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }
.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
</head>
<body class="body">
<center>
<?php $sql=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$_REQUEST['EI'], $con); $res=mysql_fetch_assoc($sql);  
$ename=$res['Fname'].' '.$res['Sname'].' '.$res['Lname'];
?>
<input type="hidden" id="EI" value="<?php echo $_REQUEST['EI']; ?>" /><input type="hidden" id="LT" value="<?php echo $_REQUEST['LT']; ?>" />
<table border="0" style="margin-top:0px;">
    <tr>
	 <td>
	  <table>
	    <tr>
		 <td style="font-family:Times New Roman; font-size:14px; color:#0080FF;"><b><?php echo $ename; ?></b></td>
		 <td>&nbsp;&nbsp;&nbsp;</td>
		 <td style="font-family:Times New Roman;">Leave :&nbsp;</td>
		 <td style="font-family:Times New Roman; font-size:14px;"><b><?php echo $_REQUEST['LT']; ?></b></td>
		</tr>
	  </table>
	 </td>
	</tr>
	<tr>		  
	  <td align="center" id="LeaveStatusTD" style="width:680px;">
		<table border="1">
		  <tr bgcolor="#7a6189" style="height:22px;">
		   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:50px;"><b>SNo</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:100px;" align="center"><b>Apply Date</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:100px;" align="center"><b>Leave</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:100px;" align="center"><b>From</b></td>
 		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:100px;" align="center"><b>To</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:100px;" align="center"><b>Total Day</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:80px;" align="center"><b>Details</b></td>
		  </tr>	
<?php $sqlCheck=mysql_query("select * from hrm_employee_applyleave where Leave_Type='".$_REQUEST['LT']."' AND EmployeeID=".$_REQUEST['EI']." AND LeaveStatus=2 AND LeaveCancelStatus='N'", $con); 
      $Sn=1; while($resCheck=mysql_fetch_array($sqlCheck)) { ?>
           <tr bgcolor="#FFFFFF" style="height:22px;">
		   <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $Sn; ?></td>
		   <td style="font-family:Times New Roman; font-size:12px; width:100px;" align="center"><?php echo date("d M y", strtotime($resCheck['Apply_Date'])); ?></td>
		   <td style="font-family:Georgia; font-size:11px; width:100px;" align="center"><?php if($resCheck['Leave_Type']=='CH'){echo 'Half day CL';} elseif($resCheck['Leave_Type']=='SH'){echo 'Half day SL';} else {echo $resCheck['Leave_Type'];} ?></td>
		   <td style="font-family:Times New Roman; font-size:12px; width:100px;" align="center"><?php echo date("d M y", strtotime($resCheck['Apply_FromDate'])); ?></td>
 		   <td style="font-family:Times New Roman; font-size:12px; width:100px;" align="center"><?php echo date("d M y", strtotime($resCheck['Apply_ToDate'])); ?></td>
		   <td style="font-family:Times New Roman; font-size:12px; width:100px; background-color:#CCFFCC;" align="center"><?php echo $resCheck['Apply_TotalDay']; ?></td>
		   <td style="font-family:Georgia; font-size:11px; width:80px;" align="center">
		   <a href="#" onClick="Details(<?php echo $resCheck['ApplyLeaveId']; ?>)">Details</a></td>
		 </tr>	
<?php $Sn++;} ?> 			 
		</table>
		</td>
	  </tr>
	  <tr><td>&nbsp;</td></tr>
	  <tr>
	  <td style="display:<?php if($_REQUEST['action']=='details'){echo 'block';} else{echo 'none;';} ?>;">
	  <?php $sqlL = mysql_query("SELECT Apply_DuringAddress,Apply_Reason,Apply_ContactNo FROM hrm_employee_applyleave WHERE ApplyLeaveId=".$_REQUEST['LI'], $con); 
			$resL = mysql_fetch_array($sqlL); ?>
	  <table>
	   <tr><td style="font-family:Times New Roman;"><u><b>During Address :</b></u>&nbsp;</td>
	   <td style="font-family:Times New Roman; font-size:14pxpx;"><?php echo $resL['Apply_DuringAddress']; ?></td></tr>
	   <tr><td style="font-family:Times New Roman;"><u><b>Reason :</b></u>&nbsp;</td>
	   <td style="font-family:Times New Roman; font-size:14pxpx;"><?php echo $resL['Apply_Reason']; ?></td></tr>
	  </table>
	  </td>
	 </tr>				
</table>
</center>
</body>
</html>

