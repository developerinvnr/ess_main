<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}

if(isset($_POST['ReplyQuery']))
{
 if($_POST['RepQ_Value']=='R')
 { if($_POST['NOfT']==1)
   { $sqlUpRep=mysql_query("update hrm_employee_query set QueryReply='".$_POST['ReplyQText']."',QueryReplyDateTime='".date("Y-m-d h:i:s")."',QueryStatus_Emp=2,QStatus_HOD=2,ReplyAns_HOD='".$_POST['ReplyQText']."',DateTimeReplyAns_HOD='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['RepQ_ID'], $con); }
   if($_POST['NOfT']==2)
   { $sqlUpRep=mysql_query("update hrm_employee_query set Query2Reply='".$_POST['ReplyQText']."',QueryReplyDateTime='".date("Y-m-d h:i:s")."',QueryStatus_Emp=2,QStatus_HOD=2,ReplyAns_HOD='".$_POST['ReplyQText']."',DateTimeReplyAns_HOD='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['RepQ_ID'], $con); }
   if($_POST['NOfT']==3)
   { $sqlUpRep=mysql_query("update hrm_employee_query set Query3Reply='".$_POST['ReplyQText']."',QueryReplyDateTime='".date("Y-m-d h:i:s")."',QueryStatus_Emp=2,QStatus_HOD=2,ReplyAns_HOD='".$_POST['ReplyQText']."',DateTimeReplyAns_HOD='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['RepQ_ID'], $con); }
   if($_POST['NOfT']==4)
   { $sqlUpRep=mysql_query("update hrm_employee_query set Query4Reply='".$_POST['ReplyQText']."',QueryReplyDateTime='".date("Y-m-d h:i:s")."',QueryStatus_Emp=2,QStatus_HOD=2,ReplyAns_HOD='".$_POST['ReplyQText']."',DateTimeReplyAns_HOD='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['RepQ_ID'], $con); }
   if($_POST['NOfT']==5)
   { $sqlUpRep=mysql_query("update hrm_employee_query set Query5Reply='".$_POST['ReplyQText']."',QueryReplyDateTime='".date("Y-m-d h:i:s")."',QueryStatus_Emp=2,QStatus_HOD=2,ReplyAns_HOD='".$_POST['ReplyQText']."',DateTimeReplyAns_HOD='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['RepQ_ID'], $con); }
   if($sqlUpRep){$RepMsg='Reply sent successfully!';}
 }
 if($_POST['RepQ_Value']=='P')
 { if($_POST['NOfT']==1)
   {$sqlUpRep=mysql_query("update hrm_employee_query set QueryReply='".$_POST['ReplyQText']."',QueryReplyDateTime='".date("Y-m-d h:i:s")."',QueryStatus_Emp=1,QStatus_HOD=1,ReplyAns_HOD='".$_POST['ReplyQText']."',DateTimeReplyAns_HOD='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['RepQ_ID'], $con); }
   if($_POST['NOfT']==2)
   {$sqlUpRep=mysql_query("update hrm_employee_query set Query2Reply='".$_POST['ReplyQText']."',QueryReplyDateTime='".date("Y-m-d h:i:s")."',QueryStatus_Emp=1,QStatus_HOD=1,ReplyAns_HOD='".$_POST['ReplyQText']."',DateTimeReplyAns_HOD='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['RepQ_ID'], $con); }
   if($_POST['NOfT']==3)
   {$sqlUpRep=mysql_query("update hrm_employee_query set Query3Reply='".$_POST['ReplyQText']."',QueryReplyDateTime='".date("Y-m-d h:i:s")."',QueryStatus_Emp=1,QStatus_HOD=1,ReplyAns_HOD='".$_POST['ReplyQText']."',DateTimeReplyAns_HOD='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['RepQ_ID'], $con); }
   if($_POST['NOfT']==4)
   {$sqlUpRep=mysql_query("update hrm_employee_query set Query4Reply='".$_POST['ReplyQText']."',QueryReplyDateTime='".date("Y-m-d h:i:s")."',QueryStatus_Emp=1,QStatus_HOD=1,ReplyAns_HOD='".$_POST['ReplyQText']."',DateTimeReplyAns_HOD='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['RepQ_ID'], $con); }
   if($_POST['NOfT']==5)
   {$sqlUpRep=mysql_query("update hrm_employee_query set Query5Reply='".$_POST['ReplyQText']."',QueryReplyDateTime='".date("Y-m-d h:i:s")."',QueryStatus_Emp=1,QStatus_HOD=1,ReplyAns_HOD='".$_POST['ReplyQText']."',DateTimeReplyAns_HOD='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['RepQ_ID'], $con); }
   if($sqlUpRep){$RepMsg='Sent successfully!';}
 }
 
 
}

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<style>.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function ReadQuery(QI)
{ var win = window.open("DraftPenReadQuery.php?Qid="+QI,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=500,height=310");
  var timer = setInterval( function() { if(win.closed) {  clearInterval(timer);  window.location="MyTeamDraftQ.php"; } }, 1000);
} 

function HODAction(v,QI,NOfT)
{ if(v=='P') {var agree=confirm("Are you sure you want to reply to In-process this query...?"); 
  if (agree) { var x="MyTeamDraftQ.php?action="+v+"&QR="+QI+"&NOfT="+NOfT; window.location=x; }}
  if(v=='R') {var agree=confirm("Are you sure you want to reply this query...?"); 
  if (agree) { var x="MyTeamDraftQ.php?action="+v+"&QR="+QI+"&NOfT="+NOfT; window.location=x; }}
}

/*
function HODAction(v,QI)
{ if(v=='P') {var agree=confirm("Are you sure you want to reply to pending this query...?"); if (agree) { var x="MyTeamDraftQ.php?action=P&Q="+QI; window.location=x; }}
  if(v=='R') {var x="MyTeamDraftQ.php?action=R&QR="+QI; window.location=x; }
} 
*/
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
	     <table border="0" style="width:100%; height:350px; float:none;" cellpadding="0">
		  <tr> 	
     <td valign="top" style="margin-left:0px; width:130px;">      
	 <table border="0" id="Activity">
	  <tr>
		 <td id="Anni" valign="top">
			<table border="0">
				<tr height="20"><td align="left" valign="top" width="130">
<?php include("EmpImgEmp.php"); ?>
<?php //echo "<img width=105px height=125px src=\"show_images.php?id=".$EmployeeId."\">\n";?></td></tr>
			 </table>
		 </td>
	 </tr>
   </table>
   </td>      
<?php //*******************************************Status********** ?>       
           <td valign="top" style="margin-left:0px; width:750px;">
		     <table border="0">
		   <tr>
			 <td>
			  <table border="0">
			   <tr>
		<td style="font-family:Times New Roman; color:#004A00; font-size:16px;width:650px;" align=""><b><u>Draft/ Pending Query</u></b>
		   &nbsp;&nbsp;&nbsp;<font color="#734A37" style='font-family:Times New Roman;' size="3"><b><?php echo $msg;; ?></b></font></td>
		<td align="center" style="font-family:Times New Roman; color:#004A00;width:82px; font-size:15px;"><a href="javascript:window.location='MyTeamDraftQ.php'"><b>Refresh</b></a></td>
			  </tr>
			 </table>
			</td>
		   </tr>
<?php $sqlQ=mysql_query("select * from hrm_employee_query where QueryTo='HOD' AND Id_HOD=".$EmployeeId." AND (QueryStatus_Emp=0 OR QueryStatus_Emp=1) order by QueryDateTime DESC", $con); 
      $rowQ=mysql_num_rows($sqlQ); ?>	  
			   <tr>
			     <td align="center" id="QueryStatusTD" style="display:;width:750px; margin-left:0px;" valign="top">
				    <table border="1">
					  <tr bgcolor="#7a6189" style="height:22px;">
		   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:50px;"><b>SNo</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:80px;" align="center"><b>Date</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:150px;" align="center"><b>Subject</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:200px;" align="center"><b>Name</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:120px;" align="center"><b>Department</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:70px;" align="center"><b>Details</b></td>
 		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:80px;" align="center"><b>Status</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:82px;" align="center"><b>Action</b></td>
		             </tr>	
<?php if($rowQ>0 AND $_REQUEST['ac']!='CloseQuery') { $Sn=1; while($resQ=mysql_fetch_array($sqlQ)) { ?>
           <tr bgcolor="#FFFFFF" style="height:22px;">
		   <td align="center" style="font:Georgia; font-size:11px; width:50px;" valign="top"><?php echo $Sn; ?></td>
		   <td style="font-family:Times New Roman; font-size:12px; width:80px;" align="center" valign="top"><?php echo date("d-M-y", strtotime($resQ['QueryDateTime'])); ?></td>
		   <td style="font-family:Georgia; font-size:11px; width:120px; overflow:hidden;" valign="top"><?php echo substr_replace($resQ['QuerySubject'], '', 12).'.....'; ?></td>
<?php $sqlE=mysql_query("select Fname,Sname,Lname,DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmployeeID=".$resQ['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE);?>	   
		   <td style="font-family:Georgia; font-size:11px; width:200px;" valign="top"><?php echo $resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; ?></td>
<?php $sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resE['DepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD);?>		   
		   <td style="font-family:Georgia; font-size:11px; width:150px;" valign="top"><?php echo $resD['DepartmentCode']; ?></td>
		   <td style="font-family:Georgia; font-size:11px; width:70px;" align="center" valign="top">
		   <a href="javascript:ReadQuery(<?php echo $resQ['QueryId']; ?>)">Read</a></td>
 		   <td style="font-family:Times New Roman; font-size:12px; width:80px;" align="center" valign="top"><?php if($resQ['QueryStatus_Emp']==0){echo 'Draft';} if($resQ['QueryStatus_Emp']==1){echo '<font color="#F47A00">Pending</font>';} ?></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:80px;" align="center" valign="top">
		   <select name="ActionQuery" id="ActionQuery" style="font-family:Georgia; font-size:11px; width:80px;" onChange="HODAction(this.value,<?php echo $resQ['QueryId'].', '.$resQ['QueryNoOfTime']; ?>)">
		   <option value="">Select</option><option value="P">In-process</option><option value="R">Reply</option></select>
		  </td>
		             </tr>	
<?php $Sn++;} } if($rowQ==0) { ?>
                     <tr>
					    <td colspan="8" style="font:Georgia; color:#D56A00; font-size:12px; width:50px;"><b>Empty....</b></td>
					 </tr>
<?php } ?>					 			 			 
					</table>
				 </td>
			   </tr>
			 </table>
		   </td>
<?php //*******************************************Status Close********** ?> 
<?php //*******************************************Reply********** ?> 
          <td width="310" valign="top">
<?php if($_REQUEST['action']!='' AND $_REQUEST['QR']!='')  { ?>	
<?php $sqlQE=mysql_query("select hrm_employee_query.*,Fname,Sname,Lname from hrm_employee_query INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_query.EmployeeID where hrm_employee_query.QueryId=".$_REQUEST['QR'], $con); $resQE=mysql_fetch_assoc($sqlQE);?>	
          <form name="ReplyForm" onSubmit="validate(this.value)" method="post"> 	  
		  <table border="0">
		    <tr><td colspan="2" style="font-family:Times New Roman; color:#004A00; font-size:16px;width:310px;" align="">
			<b>To :<font color="#00509F"><?php echo $resQE['Fname'].' '.$resQE['Sname'].' '.$resQE['Lname']; ?></font></b></td>
			</tr>
			<tr><td colspan="2" style="font-family:Times New Roman; color:#004A00; font-size:16px;width:310px;" align="">
			<b>Subject : </b><font color="#00509F"><?php echo substr_replace($resQE['QuerySubject'], '', 40).' .....'; ?></font></td>
			</tr>
			<tr><td colspan="2" style="font-family:Times New Roman; color:#004A00; font-size:16px;width:310px;" align="">
			<b>Action : </b><font color="#00509F"><?php if($_REQUEST['action']=='R'){echo 'Reply!';} if($_REQUEST['action']=='P'){echo 'Pending!';} ?></font></td>
			</tr>
			<tr height="20">
				<td colspan="2" align="left" valign="top" width="80" style="font-family:Times New Roman;color:#004993; font-size:16px;">
				<textarea name="ReplyQText" id="ReplyQText" cols="38" rows="8"><?php if($_REQUEST['action']=='R'){echo 'Please type your answer!';} if($_REQUEST['action']=='P'){echo 'Please type reason for pending!';} ?></textarea>
				<input type="hidden" name="RepQ_ID" value="<?php echo $_REQUEST['QR']; ?>" />
				<input type="hidden" name="RepQ_Value" value="<?php echo $_REQUEST['action']; ?>" />
				<input type="hidden" name="NOfT" value="<?php echo $_REQUEST['NOfT']; ?>" /></td>
			</tr>
			<tr height="20">
				<td colspan="2" align="Right" class="fontButton">
		          <table border="0" width="310">
			        <tr>
			         <td align="right"><input type="submit" name="ReplyQuery" id="ReplyQuery" style="width:90px;" value="Send"></td>
			         <td align="right" style="width:70px;"><input type="button" name="Refresh" id="Refresh" style="width:90px;" value="Refresh" onClick="javascript:window.location='MyTeamdraftQ.php?action=R&QR=<?php echo $_REQUEST['QR']; ?>'"/></td>
			       </tr>
		        </table>
		      </td>
	      </tr>
		  <tr><td colspan="2" style="font-family:Times New Roman; color:#CE0000; font-size:16px;width:310px;" align=""><b><?php echo $RepMsg; ?></b></td></tr>
	   </table>
	   </form>
<?php } ?>	  
     </td>
<?php //*******************************************Reply Close********** ?>      
		  </tr>
		</table>
	  </td>
	</tr>
	<tr style="height:50px; "><td>&nbsp;</td></tr>
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

