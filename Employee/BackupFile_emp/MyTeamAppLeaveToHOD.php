<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}

if($_REQUEST['lid'] AND $_REQUEST['lid']!='')
{
 if($_REQUEST['v']==2)
 {$sqlUp=mysql_query("update hrm_employee_applyleave set LeaveHodStatus=".$_REQUEST['v'].", LeaveHodUpDate='".date("Y-m-d")."' where ApplyLeaveId=".$_REQUEST['lid'], $con);}
 else
 {$sqlUp=mysql_query("update hrm_employee_applyleave set LeaveHodStatus=".$_REQUEST['v'].", LeaveHodUpDate='".date("Y-m-d")."' where ApplyLeaveId=".$_REQUEST['lid'], $con);}
}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>

<style>.font { color:#ffffff; font-family:Georgia; font-size:11px; width:200px;} .font1 { font-family:Georgia; font-size:11px; height:14px; } 
.font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }
.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function LeaveStatus(v){ var x = "MyTeamAppLeaveToHOD.php?AppLeave=yes&value="+v;  window.location=x;}

function OpenWindow(LId)
{window.open("LeaveDetails.php?id="+LId,"leaveForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=350,height=350");}

function ChangeLStatus(v,LId,LT)
{ var value = document.getElementById("ReqValue").value; 
  if(v==2) {var agree=confirm("Are you sure you want to approved this apply leave?"); 
            if (agree) { var x = "MyTeamAppLeaveToHOD.php?AppLeave=yes&value="+value+"&lid="+LId+"&v="+v+"&LT="+LT;  window.location=x; }}
  else {var x = "MyTeamAppLeaveToHOD.php?AppLeave=yes&value="+value+"&lid="+LId+"&v="+v+"&LT="+LT;  window.location=x;}			
}

</script>
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px; ">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	 <tr>
	  <td valign="top">
	     <table border="0" style="width:100%; height:380px; float:none;" cellpadding="0">
		  <tr>
		   <td valign="top"> 
		   
<?php //*************************************************************************************************************************************************** ?>	   
		     <table border="0" id="Activity">
			  <tr>
			     <td id="Anni" valign="top">
				    <table border="0">
						  <tr height="20">
						    <td align="left" valign="top" width="150">
<?php include("EmpImgEmp.php"); ?>
<?php //echo "<img width=105px height=125px src=\"show_images.php?id=".$EmployeeId."\">\n";?></td>
						  </tr>
					 </table>
				 </td>
				  <td align="left" width="850" valign="top">
	     <table border="0" width="1000">
		    <tr>
			 <td colspan="10"><table border="0"><tr>
<?php if($rowApp>0) { ?><td align="center"><a href="MyTeamApplyleave.php?AppLeave=yes&value=0"><img id="Img_manager1" style="display:block;" src="images/manager1.png" border="0"/></a>
		     <img id="Img_manager" style="display:none;" src="images/manager.png" border="0"/></td><?php } ?>
<?php if($rowHod>0) { ?><td align="center"><a href="MyTeamAppLeaveToHOD.php?AppLeave=yes&value=0"><img id="Img_hod1" style="display:none;" src="images/RevHod1.png" border="0"/></a>
		     <img id="Img_hod" style="display:block;" src="images/RevHod.png" border="0"/></td><?php } ?>
			 <td>&nbsp;</td>
			 
			 <td width="800" class="TableHead">
			   <font color="#106809" style='font-family:Times New Roman;' size="4"><i><b>Apply Leave (My Team)</b></i></font>
			   &nbsp;&nbsp;
			   <select name="LeaveS" id="LeaveS" style="font-family:Times New Roman; height:22px; width:150px; background-color:#B3E3B0; color:#000000; font-size:14px;" onChange="return LeaveStatus(this.value)"><option value="<?php echo $_REQUEST['value']; ?>" style="background-color:#FFFFFF;" selected><?php if($_REQUEST['value']=='0'){echo 'Draft';} elseif($_REQUEST['value']=='1'){echo 'Pending';} elseif($_REQUEST['value']=='2'){echo 'Approved';} elseif($_REQUEST['value']=='3'){echo 'DisApproved';} elseif($_REQUEST['value']=='4'){echo 'All';}?></option><option value="4" style="background-color:#FFFFFF;">All</option><option value="0" style="background-color:#FFFFFF;">Drapt</option><option value="1" style="background-color:#FFFFFF;">Pending</option><option value="2" style="background-color:#FFFFFF;">Approved</option><option value="3" style="background-color:#FFFFFF;">DisApproved</option></select> 
			   &nbsp;&nbsp;<font color="#106809" style='font-family:Times New Roman;' size="3"><b><?php if($_REQUEST['value']=='0'){echo 'Draft Leave';} elseif($_REQUEST['value']=='1'){echo 'Pending Leave';} elseif($_REQUEST['value']=='2'){echo 'Approved Leave';} elseif($_REQUEST['value']=='3'){echo 'DisApproved Leave';} elseif($_REQUEST['value']=='4'){echo 'All Leave';}?> </b></font>
			 </td>
			 </tr></table></td>
			</tr>
			<tr>
			 <td>
			   <table border="1">
            <tr bgcolor="#7a6189" style="height:22px;">
		     <td width="40" class="TableHead" align="center"><b>Sno</b></td>
		     <td width="70" class="TableHead" align="center"><b>EmpCode</b></td>
		     <td width="250" class="TableHead" align="center"><b>Name</b></td>
			 <td width="100" class="TableHead" align="center"><b>Apply Date</b></td>
		     <td width="120" class="TableHead" align="center"><b>Leave</b></td>
		     <td width="80" class="TableHead" align="center"><b>From</b></td>
		     <td width="80" class="TableHead" align="center"><b>To</b></td>
		     <td width="60" class="TableHead" align="center"><b>Details</b></td>
			 <td width="120" class="TableHead" align="center"><b>Manager</b></td>
			 <td width="120" class="TableHead" align="center"><b>HOD</b></td>
		     <td width="100" class="TableHead" align="center"><b>Action</b></td>
		   </tr>
<?php if($_REQUEST['AppLeave'] AND $_REQUEST['AppLeave']!=""){ echo '<input type="hidden" id="ReqValue" value="'.$_REQUEST['value'].'"/>';
      $CFromDate=date("Y").'-01-01'; $CToDate=date("Y").'-12-31'; 
	  if($_REQUEST['value']==4){ $sqlCheck=mysql_query("select * from hrm_employee_applyleave where Apply_SentToHOD=".$EmployeeId." AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."') AND Leave_Type='PL' order by Apply_Date ASC", $con); }
	  if($_REQUEST['value']==0 OR $_REQUEST['value']==1 OR $_REQUEST['value']==2 OR $_REQUEST['value']==3){ $sqlCheck=mysql_query("select * from hrm_employee_applyleave where Apply_SentToHOD=".$EmployeeId." AND LeaveHodStatus=".$_REQUEST['value']." AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."') AND Leave_Type='PL' order by Apply_Date ASC", $con); }
	  $rowCheck=mysql_num_rows($sqlCheck); if($rowCheck>0){ $sno=1; while($resL=mysql_fetch_array($sqlCheck)){	  
	  $sqlE=mysql_query("select EmpCode, Fname, Sname, Lname, DesigId, DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmployeeID=".$resL['EmployeeID'], $con); 
      $resE=mysql_fetch_assoc($sqlE); $EmpName=$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; ?>								  					
		   <tr>
		    <td width="40" class="TableHead1" align="center"><?php echo $sno; ?></td>
		    <td width="70" class="TableHead1" align="center"><?php echo $resE['EmpCode']; ?></td>
		    <td width="250" class="TableHead1" align="left"><?php echo $EmpName; ?></td>
			<td width="100" class="TableHead1" align="center"><?php echo $resL['Apply_Date']; ?></td>
		    <td width="120" class="TableHead1" align="center"><?php if($resL['Leave_Type']=='CH'){echo 'Half day CL';} elseif($resL['Leave_Type']=='SH'){echo 'Half day SL';} else {echo $resL['Leave_Type'];} ?></td>
		    <td width="80" class="TableHead1" align="center"><?php echo date("d-m-Y",strtotime($resL['Apply_FromDate'])); ?></td>
		    <td width="80" class="TableHead1" align="center"><?php echo date("d-m-Y",strtotime($resL['Apply_ToDate'])); ?></td>
		    <td width="60" class="TableHead1" align="center"><a href="javascript:OpenWindow(<?php echo $resL['ApplyLeaveId']; ?>)">Details</a></td>
			<td width="120" class="TableHead1" align="center"><?php if($resL['LeaveAppStatus']=='0'){echo 'Draft';} elseif($resL['LeaveAppStatus']=='1'){echo 'Pending';} elseif($resL['LeaveAppStatus']=='2'){echo 'Approved';} elseif($resL['LeaveAppStatus']=='3'){echo 'DisApproved';} ?></td>	
			<td width="120" class="TableHead1" align="center"><?php if($resL['Leave_Type']=='PL') { if($resL['LeaveHodStatus']=='0'){echo 'Draft';} elseif($resL['LeaveHodStatus']=='1'){echo 'Pending';} elseif($resL['LeaveHodStatus']=='2'){echo 'Approved';} elseif($resL['LeaveHodStatus']=='3'){echo 'DisApproved';} }?></td>
		   <td width="100" class="TableHead1" align="center"> 
		   <?php if($resL['LeaveStatus']!=2){?>
<select name="ActionReplyQ" id="ActionReplyQ" style="font-family:Times New Roman; height:20px; width:95px; background-color:#B3E3B0; color:#000000; font-size:13px;" onChange="ChangeLStatus(this.value,<?php echo $resL['ApplyLeaveId']; ?>,'<?php echo $resL['Leave_Type']; ?>')">
<option  style="background-color:#BADCC5;" value="0">Select</option> 
<option value="1" style="background-color:#FFFFFF;">Pending</option>
<option value="2" style="background-color:#FFFFFF;">Approved</option> 
<option value="3" style="background-color:#FFFFFF;">DisApproved</option> 
</select><?php } ?></td>
				
		  </tr>  
<?php $sno++; } } }?>					  
	
              </table>
			 </td>
			</tr>
		 </table>
	           </td>
    </tr>
</table>

			
<?php //*************************************************************************************************************************************************** ?>
		   </td>
		    <td valign="top">
		    <table align="right" border="0" style="margin-top:0px; width:10%; height:380px;">
		    <tr><td align="center" valign="top" width="100">&nbsp;</td></tr>
	        </table>
		   </td>
		    <td valign="top">
		    <table align="right" border="0" style="margin-top:0px; width:10%; height:380px;"><tr><td align="center" valign="top">&nbsp;&nbsp;</td></tr></table>
		   </td>
		  </tr>
		</table>
	  </td>
	</tr>
	
	<tr>
	  <td valign="top" align="center">
	    <table border="0" style="margin-top:0px;">
				<tr>
	              <td align="center"><img src="images/home1.png"></td>
				</tr>
	    </table>
	  </td>
	</tr>
	<tr>
	  <td valign="top">
	    <?php require_once("../footer.php"); ?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>

