<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
if($_SESSION['login'] = true){require_once('PhpFile/QueryP.php'); } else {$msg= "Session Expiry..............."; }
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:250px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:13px; height:10px;}
.span {display:block; font-family:Times New Roman; color:#620000;font-size:15px; }.span1 {display:block; font-family:Times New Roman; color:#620000;font-size:15px;  }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }
.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:150px; height:19px; }
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<Script type="text/javascript">window.history.forward(1);</script>
<script type="text/javascript" src="js/Query.js" ></script>
<script language="javascript">
function ReadQuery(QI)
{window.open("ReadQuery.php?Qid="+QI,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=350,height=310");}
function ReadAnswer(QI,UT,AC)
{window.open("ReadQAnswer.php?Aid="+QI+"&UT="+UT+"&AC="+AC,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=350,height=310");}

function AdminAction(v,QI)
{var UI = document.getElementById("UserId").value; 
 //if(v==1){ var agree=confirm("Are you sure you want to in process this query status...?");
 //if (agree) {window.open("ReplyQueryAnswer.php?action=P&Q="+QI+"&U="+UI+"&UT=A","QReplyForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=470,height=360");}}
 if(v==2){ var agree=confirm("Are you sure you want to Reply this query?");
 if (agree) {window.open("ReplyQueryAnswer.php?action=R&Q="+QI+"&U="+UI+"&UT=A","QReplyForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=470,height=360");}}
 if(v==3){ var agree=confirm("Are you sure you want to forward query in HR...?");
 if (agree) {window.open("ReplyQueryAnswer.php?action=F&Q="+QI+"&U="+UI+"&UT=A","QReplyForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=470,height=360");}}
}

function SAdminAction(v,QI)
{var UI = document.getElementById("UserId").value; 
 //if(v==1){ var agree=confirm("Are you sure you want to in process this query status...?");
 //if (agree) {window.open("ReplyQueryAnswer.php?action=P&Q="+QI+"&U="+UI+"&UT=S","QReplyForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=470,height=360");}}
 if(v==2){ var agree=confirm("Are you sure you want to Reply this query?");
 if (agree) {window.open("ReplyQueryAnswer.php?action=R&Q="+QI+"&U="+UI+"&UT=S","QReplyForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=470,height=360");}}
}

</script>
</head>
<body class="body">
<input type="hidden" id="UserId" value="<?php echo $UserId; ?>" />
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow">
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>	  
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td width="600" class="heading">&nbsp;Pending Query</td>
	  <td><font style="font-family:Times New Roman;color:#AA0000;font-size:15px; font-weight:bold;"><?php echo $Msg; ?></font></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='M' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true) { ?>	
<?php //***********************************************Reply To Query******************************************************?> 
<tr> 
<td align="left" id="ReplyToQuery" valign="top" style="display:block;">             
   <table border="0">
	<tr>
	  <td align="left" style="width:1000px;">
		<table border="1" bgcolor="#7a6189">
		  <tr>
		    <td colspan="8" class="TableHead" align="center" valign="top"><b>Query Details</b></td>
			<td colspan="<?php if($_SESSION['UserType']=='A'){echo '2';}if($_SESSION['UserType']=='S'){echo '3';}?>" class="TableHead" align="center" valign="top"><b>Process</b></td>
		  </tr>
		  <tr>
		   <td width="40" class="TableHead" align="center"><b>Sno</b></td>
		   <td width="60" class="TableHead" align="center"><b>EC</b></td>
		   <td width="250" class="TableHead" align="center"><b>Name</b></td>
		   <td width="120" class="TableHead" align="center"><b>Department</b></td>
		   <td width="150" class="TableHead" align="center"><b>Subject</b></td>
		   <td width="60" class="TableHead" align="center"><b>Query</b></td>
		   <td width="80" class="TableHead" align="center"><b>Date</b></td>
		   <td width="80" class="TableHead" align="center"><b>Status</b></td>
<?php if($_SESSION['UserType']=='A') { ?>
           <td width="80" class="TableHead" align="center"><b>Admin</b></td> 
		   <td width="80" class="TableHead" align="center"><b>Action</b></td>
<?php } if($_SESSION['UserType']=='S') { ?>	   
           <td width="80" class="TableHead" align="center"><b>Admin</b></td> 
           <td width="80" class="TableHead" align="center"><b>HR</b></td>
		   <td width="80" class="TableHead" align="center"><b>Action</b></td>	
<?php } ?>		   
		  </tr>
<?php $sqlQ=mysql_query("select * from hrm_employee_query INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_query.EmployeeID where hrm_employee_query.QueryTo='HR' AND hrm_employee_query.QueryStatus_Emp=1 AND hrm_employee_query.QAction_SAdmin!=3 AND hrm_employee_query.QAction_SAdmin!=4 AND hrm_employee.CompanyId=".$CompanyId." order by QueryDateTime DESC", $con); 
      $rowQ=mysql_num_rows($sqlQ); if($rowQ>0) { $Sno=1; while($resQ=mysql_fetch_array($sqlQ)) { ?>	
	     <tr>
	      <td width="40" class="TableHead1" align="center" valign="top"><?php echo $Sno; ?></td>
<?php $sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmployeeID=".$resQ['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE);?>	 		  
	      <td width="60" class="TableHead1" align="center" valign="top"><?php echo $resE['EmpCode']; ?></td>
		  <td width="250" class="TableHead1" align="left" valign="top"><?php echo $resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; ?></td>
<?php $sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resE['DepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD);?>		  
		  <td width="120" class="TableHead1" align="left" valign="top"><?php echo $resD['DepartmentCode']; ?></td>
		  <td width="150" class="TableHead1" align="left" valign="top"><?php echo substr_replace($resQ['QuerySubject'], '', 15).'.....'; ?></td>
		  <td width="60" class="TableHead1" align="center" valign="top"><a href="javascript:ReadQuery(<?php echo $resQ['QueryId']; ?>)">Read</a></td>
		  <td width="80" class="TableHead1" align="center" valign="top"><?php echo date("d-M-y", strtotime($resQ['QueryDateTime'])); ?></td>
		  <td width="80" class="TableHead1" align="center" valign="top" style="background-color:#C4FFC4;">Pending</td>
<?php if($_SESSION['UserType']=='A') { ?>		  
		  <td width="80" class="TableHead1" align="center" valign="top"><?php if($resQ['QStatus_Admin']==0){echo 'Open';} if($resQ['QStatus_Admin']==1){ ?> <a href="javascript:ReadAnswer(<?php echo $resQ['QueryId']; ?>,'A','P')"><font color="#F27900">Inprocess </font></a> <?php } if($resQ['QStatus_Admin']==2){echo 'Reply';} if($resQ['QStatus_Admin']==3){ ?> <a href="javascript:ReadAnswer(<?php echo $resQ['QueryId']; ?>,'A','F')"><font color="#F27900">Forward</font></a> <?php } ?></td>
		  <td width="80" class="TableHead1" align="center" valign="top">
		  <select name="ActionAdmin" id="ActionAdmin" onChange="AdminAction(this.value,<?php echo $resQ['QueryId']; ?>)" class="All_80" <?php if(date("Y-m-d h:i:s")>=$resQ['QToAdmin_DateTime'] AND date("Y-m-d h:i:s")<$resQ['QToSAdmin_DateTime'] AND $resQ['QStatus_Admin']!=3){ echo ''; } else { echo 'disabled'; }?>>
		  <option value="0">&nbsp;Select</option><option value="2">&nbsp;Reply</option>
		  <option value="3">&nbsp;Forward To HR</option></select></td>
		  
		  
<?php } if($_SESSION['UserType']=='S') { ?>		  
		  <td width="80" class="TableHead1" align="center" valign="top"><?php if($resQ['QStatus_Admin']==0){echo 'Open';} if($resQ['QStatus_Admin']==1){ ?> <a href="javascript:ReadAnswer(<?php echo $resQ['QueryId']; ?>,'A','P')"><font color="#F27900">Inprocess </font></a> <?php } if($resQ['QStatus_Admin']==2){echo 'Reply';} if($resQ['QStatus_Admin']==3){ ?> <a href="javascript:ReadAnswer(<?php echo $resQ['QueryId']; ?>,'A','F')"><font color="#F27900">Forward</font></a> <?php }?></td>
		  <td width="80" class="TableHead1" align="center" valign="top"><?php if($resQ['QStatus_SAdmin']==0){echo 'Open';} if($resQ['QStatus_SAdmin']==1){ ?> <a href="javascript:ReadAnswer(<?php echo $resQ['QueryId']; ?>,'S','P')"><font color="#F27900">Inprocess </font></a> <?php } if($resQ['QStatus_SAdmin']==2){echo 'Reply';} if($resQ['QStatus_SAdmin']==3){echo 'Edit Ans';}?></td>
		  <td width="80" class="TableHead1" align="center" valign="top">
		  <select name="ActionSAdmin" id="ActionSAdmin" onChange="SAdminAction(this.value,<?php echo $resQ['QueryId']; ?>)" class="All_80" <?php if((date("Y-m-d h:i:s")>=$resQ['QToSAdmin_DateTime'] AND date("Y-m-d h:i:s")<$resQ['QToMngmt_DateTime']) OR ($resQ['QStatus_Admin']==3 AND date("Y-m-d h:i:s")<$resQ['QToMngmt_DateTime'])){ echo ''; } else { echo 'disabled'; }?>>
		  <option value="0">&nbsp;Select</option><option value="2">&nbsp;Reply</option></select></td>
<?php } ?>		  
		  
		</tr>
<?php $Sno++; }} ?>		
		</table>
      </td>
   </tr>
  </table>    
</td>
</tr>
<?php //*********************************************** Close Reply to Query******************************************************?>      
<?php } ?> 
</table>
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************END*****END*****END******END******END***************************************************************?>
<?php //************************************************************************************************************************************************************?>
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
