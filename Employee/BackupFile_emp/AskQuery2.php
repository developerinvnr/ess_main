<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');} 
if(isset($_POST['AskQuery']))
{ 
 $After3Day = date("Y-m-d h:i:s",strtotime('+3 day')); $After6Day = date("Y-m-d h:i:s",strtotime('+6 day')); $After9Day = date("Y-m-d h:i:s",strtotime('+9 day'));
 if($_POST['SubValue']!=0){ $sqlSub=mysql_query("select * from hrm_deptquerysub where DeptQSubId=".$_POST['SubValue'], $con); $resSub=mysql_fetch_assoc($sqlSub);
 $QSubject=$resSub['DeptQSubject']; $OthQSub='N'; $AssigEmp=$resSub['AssignEmpId']; 
 $sqlR=mysql_query("select RepEmployeeID from hrm_employee_general where EmployeeID=".$AssigEmp, $con); $resR=mysql_fetch_assoc($sqlR); $RepId=$resR['RepEmployeeID'];
 $sqlH=mysql_query("select HodId from hrm_employee_reporting where EmployeeID=".$AssigEmp, $con); $resH=mysql_fetch_assoc($sqlH);      $HodId=$resH['HodId']; 
 } else { $QSubject='N'; $OthQSub=$_POST['OthSub']; $AssigEmp=0; $RepId=0; $HodId=0; }
 if($CompanyId==1){$MnmtId=223;} elseif($CompanyId==2){$MnmtId=233;}elseif($CompanyId==3){$MnmtId=259;}
 
 $SqlQIns=mysql_query("insert into hrm_employee_queryemp(EmployeeID, RepMgrId, HodId, QToDepartmentId, QuerySubject, OtherSubject, AssignEmpId, HideYesNo, QueryValue, QueryDT, QueryNoOfTime, Level_1ID, Level_1QToDT, Level_2ID, Level_2QToDT, Level_3ID, Level_3QToDT, Mngmt_ID, Mngmt_QToDT, QueryYearId)values(".$EmployeeId.", ".$_POST['RepID'].", ".$_POST['HodID'].", '".$_POST['DeptName']."', '".$QSubject."', '".$OthQSub."', ".$AssigEmp.", '".$_POST['VCheck']."', '".$_POST['Query']."', '".date("Y-m-d h:i:s")."', 1, ".$AssigEmp.", '".date("Y-m-d h:i:s")."', ".$RepId.", '".$After3Day."', ".$HodId.", '".$After6Day."', ".$MnmtId.", '".$After9Day."', ".$YearId.")", $con); 

   $sqlDD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_POST['DeptName']." AND CompanyId=".$CompanyId, $con); $resDD=mysql_fetch_assoc($sqlDD);    
   if($QSubject=='N'){$QS=$OthQSub;}else{$QS=$QSubject;}	
   if($_POST['VCheck']=='Y'){$name='Undisclosed';}else{$name=$_POST['Ename'];}
   
   /*
   if($_POST['EmailRep']!='')
   {
    $email_to = $_POST['EmailRep'];
    if($_POST['EmailSelf']==''){$email_from = $_POST['Ename'];} else {$email_from=$_POST['EmailSelf'];}
	$email_subject = "Ask Query to ".$name." from ESS";  $email_txt = "Ask Query";   $headers = "From: ".$email_from;  $semi_rand = md5(time()); 
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
    $headers .= "\nMIME-Version: 1.0\n" . 
                "Content-Type: multipart/mixed;\n" . 
                " boundary=\"{$mime_boundary}\""; 
    $email_message .= "--{$mime_boundary}\n" . 
                      "Content-Type:text/html; charset=\"iso-8859-1\"\n" . 
                      "Content-Transfer-Encoding: 7bit\n\n" . 
    $email_message . $name." has ask query for subject ".$QS." to department ".$resDD['DepartmentCode'].", check details log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a> to approve\n\n"; 
    $data = chunk_split(base64_encode($data)); 
    $email_message .= "--{$mime_boundary}\n" . 
                      "Content-Transfer-Encoding: base64\n\n" . 
                      $data . "\n\n" . 
                      "--{$mime_boundary}--\n"; 
   $ok = @mail($email_to, $email_subject, $email_message, $headers);
   }
   
   if($_POST['EmailHod  ']!='')
   {
    $email_to = $_POST['EmailHod  '];
    if($_POST['EmailSelf']==''){$email_from = $_POST['Ename'];} else {$email_from=$_POST['EmailSelf'];}
	$email_subject = "Ask Query to ".$name." from ESS";  $email_txt = "Ask Query";   $headers = "From: ".$email_from;  $semi_rand = md5(time()); 
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
    $headers .= "\nMIME-Version: 1.0\n" . 
                "Content-Type: multipart/mixed;\n" . 
                " boundary=\"{$mime_boundary}\""; 
    $email_message .= "--{$mime_boundary}\n" . 
                      "Content-Type:text/html; charset=\"iso-8859-1\"\n" . 
                      "Content-Transfer-Encoding: 7bit\n\n" . 
    $email_message . $name." has ask query for subject ".$QS." to department ".$resDD['DepartmentCode'].", check details log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a> to approve\n\n"; 
    $data = chunk_split(base64_encode($data)); 
    $email_message .= "--{$mime_boundary}\n" . 
                      "Content-Transfer-Encoding: base64\n\n" . 
                      $data . "\n\n" . 
                      "--{$mime_boundary}--\n"; 
   $ok = @mail($email_to, $email_subject, $email_message, $headers);
   }
   */
 
if($SqlQIns) {$msg='Your Query has been submitted!';}
}

if($_REQUEST['ac']=='CloseQuery' AND $_REQUEST['QCid']!='')
{$sqlDel=mysql_query("update hrm_employee_queryemp set QueryStatus_Emp=3 where QueryId=".$_REQUEST['QCid'], $con); }

//if($_REQUEST['action']=='delete' AND $_REQUEST['Q']!='')
//{$sqlDel=mysql_query("delete from hrm_employee_queryemp where QueryId=".$_REQUEST['Q'], $con); if($sqlDel){$DelMsg='Your Query Deleted SuccessFully!';} }
//if($_REQUEST['action']=='DelClose' AND $_REQUEST['Q']!='')
//{$sqlDel=mysql_query("update hrm_employee_query set QueryStatus_Emp=4 where QueryId=".$_REQUEST['Q'], $con); if($sqlDel){$DelMsg='Your Query Deleted SuccessFully!';} }

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
function SelDept(d)
{ var url = 'DeptQsubject.php';	var pars = 'DeptQS='+d;	var myAjax = new Ajax.Request(
	url, {	method: 'post',	parameters: pars, onComplete: show_DeptQS });
} 
function show_DeptQS(originalRequest)
{ document.getElementById('SubSpan').innerHTML = originalRequest.responseText; }

function SelSubject(v)
{ if(v==""){alert("Please select subject!"); document.getElementById("AskQuery").disabled=true; document.getElementById("HideCheck").disabled=true; return false;}
  else if(v==0){document.getElementById("TD_1").style.display='block'; document.getElementById("TD_2").style.display='block';} 
  else {document.getElementById("TD_1").style.display='none'; document.getElementById("TD_2").style.display='none';} 
  if(v!=""){document.getElementById("AskQuery").disabled=false; document.getElementById("HideCheck").disabled=false;}
   document.getElementById("SubValue").value=v;
}


function validate(AskQform) 
{ var QuerySub=document.getElementById("QuerySubj").value; 
  if(QuerySub==''){alert("Please select subject name!"); return false;}
  if(QuerySub==0)
  { var OtherSub=document.getElementById("OthSub").value;
    if(OtherSub.length == 0){ alert("Please type other subject name!"); return false;}
  }
  var Query=document.getElementById("Query").value;
  if(Query.length == 0){ alert("Please type Query!"); return false;}
  //if(Query.length<25){alert("Please type minimum 20 charector in query field!"); return false;}
  if(document.getElementById("HideCheck").checked==true){document.getElementById("HideCheck").value='Y'; document.getElementById("VCheck").value='Y';}
  else if(document.getElementById("HideCheck").checked==false){document.getElementById("HideCheck").value='N'; document.getElementById("VCheck").value='N';}
  
  var agree=confirm("Are you sure? your query will be send?"); if (agree) { return true; } else { return false;}
} 

function ReadQuery(QI)
{window.open("ReadQuery.php?Qid="+QI,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=500,height=310");} 

function CloseQ(i)
{var agree=confirm("Are you sure you want to close this query...?"); if (agree) {window.location="AskQuery.php?ac=CloseQuery&QCid="+i;}}


function ReOpenQ(QId,NOfT,QT)
{ var agree=confirm("Are you sure you want to reopen this query...?"); 
  if (agree) 
  { var win = window.open("QueryReOpen.php?action=ReOpen&Q="+QId+"&NOfT="+NOfT+"&QT="+QT,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=500,height=350"); 
    var timer = setInterval( function() { if(win.closed) {  clearInterval(timer);  window.location="AskQuery.php"; } }, 1000);
  }
}

/*
function ReadAnswer(AI)
{window.open("ReadQAnswer.php?Aid="+AI,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=350,height=310");}
function ReadPending(AI)
{window.open("ReadQPending.php?Aid="+AI,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=350,height=310");}

function DeleteQ(QId)
{var agree=confirm("Are you sure you want to delete this query...?"); if (agree) { var x="AskQuery.php?action=delete&Q="+QId; window.location=x; }}
function DeleteQC(QId)
{var agree=confirm("Are you sure you want to close this query...?"); if (agree) { var x="AskQuery.php?action=DelClose&ac=CloseQuery&Q="+QId; window.location=x; }}
function ReadQueryDetils(QI)
{window.open("ReadQuerydetails.php?Qid="+QI,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=350,height=350");} 

*/

function QueryHelpDoc()
{window.open("QueryHelpDoc.php?action=help","HelpDoc","menubar=no,scrollbars=yes,resizable=no,directories=no,width=720,height=400");}
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
		   <td valign="top"> 
		   
<?php //*************************************************************************************************************************************************** ?>	   
	 <table border="0" id="Activity">
	  <tr>
		 <td id="Anni" valign="top">
			<table border="0">
				<tr height="20"><td align="left" valign="top" width="150"><?php echo "<img width=105px height=125px src=\"show_images.php?id=".$EmployeeId."\">\n";?></td></tr>
			 </table>
		 </td>
<?php /******************************************** Query I ******************************************/ ?>		
<?php $sqlMax=mysql_query("select QueryId from hrm_employee_queryemp where EmployeeID=".$EmployeeId, $con); $rowMax=mysql_num_rows($sqlMax); ?>	  
		<td width="50" valign="top">
		  <table border="0">
			<tr><td colspan="5" style="font-family:Times New Roman; color:#620000; font-size:17px;width:460px;" align="center"><b><u>Ask Query</u></b></td></tr>
			<tr><td colspan="5">&nbsp;</td></tr>
<form name="AskQform" method="post" onSubmit="return validate(this)">
<tr height="20">
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;width:100px;font-size:16px;"><b>Query no :</b></td>
 <td style="width:120px;"><input style="width:50px;height:22px;" name="QueryNo" id="QueryNo" value="<?php echo $rowMax+1; ?>" readonly></td>
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;width:80px;font-size:16px;">&nbsp;</td>
 <td align="center" style="font-family:Times New Roman;width:150px;"><a href="#" onClick="QueryHelpDoc()"><font color="#000099" size="3" ><b>Help Document</b></font></font></a></td>
</tr>
<tr height="20">
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;width:100px;font-size:16px;"><b>CC :</b></td>
 <td colspan="4" style="width:120px;"><input style="width:360px;font-family:Times New Roman;font-size:15px;height:22px;" value="Reporting Manager, HOD" readonly /></td>
</tr>
<tr height="20">
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;width:100px;font-size:16px;"><b>Department :</b></td>
 <td style="font-family:Times New Roman;color:#00000;font-size:15px;width:120px;">
 <select style="width:120px;font-family:Times New Roman;font-size:12px;" name="DeptName" onChange="SelDept(this.value)"><option style="background-color:#FAF2D8; ">&nbsp;SELECT</option>
<?php $sqlD=mysql_query("select DepartmentId,DepartmentCode from hrm_department where CompanyId=".$CompanyId." AND DeptStatus='A' order by DepartmentCode ASC", $con); 
 while($resD=mysql_fetch_array($sqlD)){  ?><option value="<?php echo $resD['DepartmentId']; ?>">&nbsp;<?php echo $resD['DepartmentCode']; ?></option><?php } ?></select></td>
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;width:80px;font-size:16px;"><b>Subject :</b></td>
 <td style="font-family:Times New Roman;color:#00000;width:150px;" align="right">
 <span id="SubSpan"><select style="width:150px;font-family:Times New Roman;font-size:12px;" disabled><option>SELECT</option></select></span></td>
</tr>
<tr height="20" id="TROthSub">
 <td colspan="2" align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:16px;">
   <span id="TD_1" style="display:none;"><b>Please type subject name :</b></span></td>
 <td colspan="3" align="right"><input type="hidden" name="SubValue" id="SubValue" value="" />
   <span id="TD_2" style="display:none;"><input style="font-family:Times New Roman;font-size:15px;width:230px;height:22px;" name="OthSub" id="OthSub"></span></td>
</tr>
<tr height="20">
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:16px; width:100px;"><b>Query :</b></td>
 <td colspan="4" align="right"><textarea name="Query" id="Query" style="font-family:Times New Roman;font-size:15px;" cols="50" rows="6"></textarea></td>
<?php $sqlRep=mysql_query("select RepEmployeeID,ReportingEmailId from hrm_employee_general where EmployeeID=".$EmployeeId, $con); $resRep=mysql_fetch_assoc($sqlRep);
      $sqlHod=mysql_query("select EmailId_Vnr,HodId from hrm_employee_general INNER JOIN hrm_employee_reporting ON hrm_employee_general.EmployeeID=hrm_employee_reporting.HodId where hrm_employee_reporting.EmployeeID=".$EmployeeId, $con); $resHod=mysql_fetch_assoc($sqlHod);
	  $sqlSelf=mysql_query("select EmailId_Vnr from hrm_employee_general where EmployeeID=".$EmployeeId, $con); $resSelf=mysql_fetch_assoc($sqlSelf);
?>
<input type="hidden" name="EmailRep" value="<?php echo $resRep['ReportingEmailId']; ?>" /><input type="hidden" name="RepID" value="<?php echo $resRep['RepEmployeeID']; ?>" />
<input type="hidden" name="EmailHod" value="<?php echo $resHod['EmailId_Vnr']; ?>" /><input type="hidden" name="HodID" value="<?php echo $resHod['HodId']; ?>" />
<input type="hidden" name="EmailSelf" value="<?php echo $resSelf['EmailId_Vnr']; ?>" />		
<input type="hidden" name="Ename" value="<?php echo $M.' '.$Ename; ?>" />	
</tr>
<tr height="20">
 <td colspan="5" style="font-family:Times New Roman;color:#004993;font-size:15px;width:120px;">
 Do you want to hide your name for Reporting Mgr & HOD? &nbsp;<input type="checkbox" name="HideCheck" id="HideCheck" disabled/>
 <input type="hidden" id="VCheck" name="VCheck" value=""/></td>
</tr>
<tr height="20">
  <td colspan="5" align="Right" class="fontButton">
  <table border="0" width="460">
  <tr>
   <td align="right"><input type="submit" name="AskQuery" id="AskQuery" style="width:90px;" value="send" disabled></td>
   <td align="right" style="width:70px;"><input type="button" name="Refresh" id="Refresh" style="width:90px;" value="refresh" onClick="javascript:window.location='AskQuery.php'"/></td>
  </tr>
  </table>
  </td>
</tr>
</form>
<tr height="20">
  <td colspan="5" align="">
  <table border="0" width="450">
  <tr><td valign="top" colspan="2">&nbsp;<font color="#008000" style='font-family:Times New Roman;' size="3"><b><?php echo $msg; ?></b></font></td></tr>
  </table>
  </td>
</tr>
</table>
     </td>
	</tr>
  </table>
	
<?php //*************************************************************************************************************************************************** ?>
<?php //*******************************************Status********** ?>
           <td style="margin-left:0px; width:10px;">&nbsp;</td>          
		   <td bgcolor="#7a6189" style="margin-left:0px;">&nbsp;</td>  
           <td valign="top" style="margin-left:0px;">
		     <table border="0">
			   <tr><td style="font-family:Times New Roman; color:#620000; font-size:17px;width:440px;" align="center"><b><u>Query Status</u></b></td>
			       <td style="font-family:Times New Roman; color:#620000; font-size:17px;width:110px;" align="center">
				   <img src="images/go-back-icon.png" border="0" /><b style="font-size:14px;">&nbsp;->&nbsp;Re-Open</b></td></tr>

<?php 
$sql_statement = mysql_query("select * from hrm_employee_queryemp where EmployeeID=".$EmployeeId." AND QueryStatus_Emp!=3 AND QueryStatus_Emp!=4 order by QueryDT DESC", $con);
$total_records = mysql_num_rows($sql_statement);
if(isset($_GET['page'])) $page = $_GET['page']; else $page = 1;  
$offset = 10;
if ($page){ $from = ($page * $offset) - $offset; }else{ $from = 0;}

$sql_statement = mysql_query("select * from hrm_employee_queryemp where EmployeeID=".$EmployeeId." AND QueryStatus_Emp!=3 AND QueryStatus_Emp!=4 order by QueryDT DESC LIMIT " . $from . "," . $offset, $con);
?>	  
			   <tr>
			     <td colspan="2" align="center" id="QueryStatusTD" style="display:;width:550px; margin-left:0px;" valign="top">
				    <table border="1">
					  <tr bgcolor="#7a6189" style="height:22px;">
		   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:40px;"><b>SNo</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:70px;" align="center"><b>Date</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:100px;" align="center"><b>Subject</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" align="center"><b>Details</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:100px;" align="center"><b>Department</b></td>
 		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:80px;" align="center"><b>Status</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:80px;" align="center"><b>Action</b></td>
		             </tr>	
<?php if($total_records>0) { if($_REQUEST['page']==1){$Sn=1;} elseif($_REQUEST['page']==2){$Sn=11;} elseif($_REQUEST['page']==3){$Sn=21;}
	  elseif($_REQUEST['page']==4){$Sn=31;} elseif($_REQUEST['page']==5){$Sn=41;} elseif($_REQUEST['page']==6){$Sn=51;} 
	  elseif($_REQUEST['page']==7){$Sn=61;} elseif($_REQUEST['page']==8){$Sn=71;} elseif($_REQUEST['page']==9){$Sn=81;} 
	  elseif($_REQUEST['page']==10){$Sn=91;} else{$Sn=1;}  while($resQ=mysql_fetch_array($sql_statement)) { ?>
           <tr bgcolor="#FFFFFF" style="height:22px;">
		   <td align="center" style="font:Georgia; font-size:11px; width:40px;" valign="top"><?php echo $Sn; ?></td>
		   <td style="font-family:Times New Roman; font-size:12px; width:70px;" align="center" valign="top"><?php if($resQ['QueryNoOfTime']==1){ echo date("d-M-y", strtotime($resQ['QueryDT'])); } elseif($resQ['QueryNoOfTime']==2){ echo date("d-M-y", strtotime($resQ['Query2DT'])); } elseif($resQ['QueryNoOfTime']==3){ echo date("d-M-y", strtotime($resQ['Query3DT'])); } elseif($resQ['QueryNoOfTime']==4){ echo date("d-M-y", strtotime($resQ['Query4DT'])); } elseif($resQ['QueryNoOfTime']==5){ echo date("d-M-y", strtotime($resQ['Query5DT'])); } ?></td>
		   <td style="font-family:Georgia; font-size:11px; width:100px; overflow:hidden;" valign="top"><?php if($resQ['QuerySubject']!='N'){ echo substr_replace($resQ['QuerySubject'], '', 13).'..'; } else { echo substr_replace($resQ['OtherSubject'], '', 13).'..'; } ?></td>
		   <td style="font-family:Georgia; font-size:11px; width:60px;" align="center" valign="top">
		   <a href="javascript:ReadQuery(<?php echo $resQ['QueryId']; ?>)">Read</a></td>
<?php $sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resQ['QToDepartmentId']." AND CompanyId=".$CompanyId, $con); $resD=mysql_fetch_assoc($sqlD); ?>		
		   <td style="font-family:Times New Roman; font-size:12px; width:100px;" align="" valign="top">&nbsp;<?php echo $resD['DepartmentCode']; ?></td>
 		   <td style="font-family:Times New Roman; font-size:12px; width:80px;" align="center" valign="top"><?php if($resQ['QStatus']==0){echo 'Draft';}elseif($resQ['QStatus']==1){ echo '<font color="#FF2020">InProcess</font>'; } elseif($resQ['QStatus']==2 AND $resQ['QCloseStatus']=='N'){ echo '<font color="#FF2020">InProcess</font>'; }  elseif($resQ['QStatus']==2 AND $resQ['QCloseStatus']=='Y'){ echo '<font color="#004000">Answer</font>'; } ?></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:80px;" align="center" valign="middle">
	<?php if($resQ['QStatus']==2 AND $resQ['QCloseStatus']=='Y' AND $resQ['QueryNoOfTime']>=5){?>
	<a href="#" onClick="CloseQ(<?php echo $resQ['QueryId']; ?>)"><img src="images/delete.png" border="0"/></a><?php } ?>
	<?php if($resQ['QStatus']==2 AND $resQ['QCloseStatus']=='Y' AND $resQ['QueryNoOfTime']<5){?>
	<a href="#" onClick="ReOpenQ(<?php echo $resQ['QueryId'].', '.$resQ['QueryNoOfTime']; ?>, 1)"><img src="images/go-back-icon.png" border="0" /></a>&nbsp;&nbsp;&nbsp;    <a href="#" onClick="CloseQ(<?php echo $resQ['QueryId']; ?>)"><img src="images/delete.png" border="0" /></a><?php } ?>
		  </td>
		             </tr>	
<?php $Sn++;} } if($rowQ==0) { ?>
                     <tr>
					    <td colspan="7" style="font:Georgia; color:#D56A00; font-size:12px; width:50px;"><b>Empty....</b></td>
					 </tr>
<?php } ?>					 			 			 
					</table>
				 </td>
			   </tr>
<tr>
<td align="center" style="font-family:Times New Roman; font-size:15px; font-weight:bold;" colspan="2">
<?PHP doPages($offset, 'AskQuery.php', '', $total_records); ?>
</td>
</tr>							   
			 </table>
		   </td>
<?php //*******************************************Status Close********** ?> 
		   </td>
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
<?php
function check_integer($which) {
if(isset($_REQUEST[$which])){
if (intval($_REQUEST[$which])>0) {
return intval($_REQUEST[$which]);
} else {
return false;
}
}
return false;
}
function get_current_page() {
if(($var=check_integer('page'))) {
return $var;
} else {
//return 1, if it wasnt set before, page=1
return 1;
}
}
function doPages($page_size, $thepage, $query_string, $total=0) {
$index_limit = 4;
$query='';
if(strlen($query_string)>0){
$query = "&amp;".$query_string;
}
$current = get_current_page();
$total_pages=ceil($total/$page_size);
$start=max($current-intval($index_limit/2), 1);
$end=$start+$index_limit-1;
echo '<div class="paging">';
if($current==1) {
echo '<span class="prn">&lt; Previous</span>&nbsp;';
} else {
$i = $current-1;
echo '<a href="'.$thepage.'?page='.$i.$query.'" class="prn" rel="nofollow" title="go to page '.$i.'">&lt; Previous</a>&nbsp;';
echo '<span class="prn">...</span>&nbsp;';
}
if($start > 1) {
$i = 1;
echo '<a href="'.$thepage.'?page='.$i.$query.'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
for ($i = $start; $i <= $end && $i <= $total_pages; $i++){
if($i==$current) {
echo '<span>'.$i.'</span>&nbsp;';
} else {
echo '<a href="'.$thepage.'?page='.$i.$query.'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
}
if($total_pages > $end){
$i = $total_pages;
echo '<a href="'.$thepage.'?page='.$i.$query.'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
if($current < $total_pages) {
$i = $current+1;
echo '<span class="prn">...</span>&nbsp;';
echo '<a href="'.$thepage.'?page='.$i.$query.'" class="prn" rel="nofollow" title="go to page '.$i.'">Next &gt;</a>&nbsp;';
} else {
echo '<span class="prn">Next &gt;</span>&nbsp;';
}
if ($total != 0){
//prints the total result count just below the paging
echo '&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ee4545"<h4>(Total '.$total.' Records)</h4></font></div>';
}
}
?>



