<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
if($_REQUEST['ac']=='CloseQuery' AND $_REQUEST['QCid']!='')
{
  $QueryEmp=$_REQUEST['QEI']; 
  $sqlE=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$QueryEmp, $con); $resE=mysql_fetch_assoc($sqlE);  if($resE['DR']=='Y'){$M2='Dr.';} elseif($resE['Gender']=='M'){$M2='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M2='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M2='Miss.';}  $EName=$M2.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'];
  
  $sqlDel=mysql_query("update hrm_employee_queryemp set QCloseStatus='Y', Level_3QStatus=3 where QueryId=".$_REQUEST['QCid'], $con); 
  $sqlDD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['DI'], $con); $resDD=mysql_fetch_assoc($sqlDD);    
  $QS=$_REQUEST['QS'];	if($_REQUEST['HYN']=='Y'){$name='Name Undisclosed';}else{$name=$EName;}

$sqlMK3=mysql_query("select * from hrm_employee_querymail_key where QueryMailId=3 AND CompanyId=".$CompanyId, $con); $resMK3=mysql_fetch_assoc($sqlMK3);
   
  if($sqlDel)
  {
   if($resE['EmailId_Vnr']!='' AND $resMK3['Employee']=='Y')
   {
    //$email_to = "ajaykumar.dewangan@vnrseeds.in";
	//$email_to = $resE['EmailId_Vnr'];
        //$email_from='admin@vnrseeds.co.in';
    //if($resE['EmailId_Vnr']==''){$email_from = $EName;} else {$email_from=$resE['EmailId_Vnr'];}
	$email_subject = "Your Query has been closed.";  $semi_rand = md5(time()); 
	//$headers = "From: " . $email_from . "\r\n";
    //$headers .= "MIME-Version: 1.0\r\n";
    //$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $email_message .= "Dear <b>".$name."</b> <br><br>\n\n\n";
    $email_message .= "Your query about Subject-<b>".$QS."</b>  has been closed, visit <b>ESS-QUERY MODULE</b> for more detailed.<br>";
	$email_message .= "You may re-open the query if the response is unsatisfactory or you require more information. If satisfied, we would like you to provide overall rating on the query resolution in ESS, based on your experience with the resolution process and various parameters like time taken, quality of answer, satisfaction level etc on scale of 1-5(1 being lowest). Kindly select & submit Rating in ESS.<br><br>\n\n\n";
	$email_message .= "From <br><b>ADMIN ESS</b><br>";
    //$ok = @mail($email_to, $email_subject, $email_message, $headers);
    
$subject=$email_subject;
$body=$email_message;
$email_to=$resE['EmailId_Vnr'];
require 'vendor/mail_admin.php';
    
   }

$sqlRH=mysql_query("select RepMgrId,HodId from hrm_employee_queryemp where QueryId=".$_REQUEST['QCid'], $con); $resRH=mysql_fetch_assoc($sqlRH); 
$sqlR=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$resRH['RepMgrId'], $con); 
$resR=mysql_fetch_assoc($sqlR);  if($resR['DR']=='Y'){$MR='Dr.';} elseif($resR['Gender']=='M'){$MR='Mr.';} elseif($resR['Gender']=='F' AND $resR['Married']=='Y'){$MR='Mrs.';} elseif($resR['Gender']=='F' AND $resR['Married']=='N'){$MR='Miss.';}  $NameR=$MR.' '.$resR['Fname'].' '.$resR['Sname'].' '.$resR['Lname'];
$sqlH=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$resRH['HodId'], $con); 
$resH=mysql_fetch_assoc($sqlH);  if($resH['DR']=='Y'){$MH='Dr.';} elseif($resH['Gender']=='M'){$MH='Mr.';} elseif($resH['Gender']=='F' AND $resH['Married']=='Y'){$MH='Mrs.';} elseif($resH['Gender']=='F' AND $resH['Married']=='N'){$MH='Miss.';}  $NameH=$MH.' '.$resH['Fname'].' '.$resH['Sname'].' '.$resH['Lname'];
   
   //Reporting Mgr
   if($resR['EmailId_Vnr']!='' AND $resMK3['ReportingMgr']=='Y')
   {
    //$email_toR = "ajaykumar.dewangan@vnrseeds.in";
	//$email_toR = $resR['EmailId_Vnr'];
    //$email_fromR='admin@vnrseeds.co.in';
    //if($resE['EmailId_Vnr']==''){$email_fromR = $EName;} else {$email_fromR=$resE['EmailId_Vnr'];}
	$email_subjectR = "Query closed.";  $semi_rand = md5(time()); 
	//$headersR = "From: " . $email_fromR . "\r\n";
    //$headersR .= "MIME-Version: 1.0\r\n";
    //$headersR .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $email_messageR .= "Dear <b>".$NameR."</b> <br><br>\n\n\n";
    $email_messageR .= "Query raised by your team member ".$name." has been closed.<br>";
	$email_messageR .= "Kindly visit ESS-QUERY MODULE for more details.<br><br>\n\n\n";
	$email_messageR .= "From <br><b>ADMIN ESS</b><br>";
    //$ok = @mail($email_toR, $email_subjectR, $email_messageR, $headersR);
    
$subject=$email_subjectR;
$body=$email_messageR;
$email_to=$resR['EmailId_Vnr'];
require 'vendor/mail_admin.php';

   }
   
   //HOD
   if($resH['EmailId_Vnr']!='' AND $resMK3['HOD']=='Y')
   {
    //$email_toH = "ajaykumar.dewangan@vnrseeds.in";
	//$email_toH = $resH['EmailId_Vnr'];
    //$email_fromH='admin@vnrseeds.co.in';
    //if($resE['EmailId_Vnr']==''){$email_fromH = $EName;} else {$email_fromH=$resE['EmailId_Vnr'];}
	$email_subjectH = "Query closed.";  $semi_rand = md5(time()); 
	//$headersH = "From: " . $email_fromH . "\r\n";
    //$headersH .= "MIME-Version: 1.0\r\n";
    //$headersH .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $email_messageH .= "Dear <b>".$NameH."</b> <br><br>\n\n\n";
    $email_messageH .= "Query raised by your team member ".$name." has been closed.<br>";
	$email_messageH .= "Kindly visit ESS-QUERY MODULE for more details.<br><br>\n\n\n";
	$email_messageH .= "From <br><b>ADMIN ESS</b><br>";
    //$ok = @mail($email_toH, $email_subjectH, $email_messageH, $headersH);
    
$subject=$email_subjectH;
$body=$email_messageH;
$email_to=$resH['EmailId_Vnr'];
require 'vendor/mail_admin.php';    
    
   }


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
{ var win = window.open("ReadQuery.php?Qid="+QI,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=500,height=310");
  //var timer = setInterval( function() { if(win.closed) {  clearInterval(timer);  window.location="EmpDraftQ.php"; } }, 1000);
}

function CloseQ(i,P,QEI,DI,SN,HYN)
{ var QS=document.getElementById("QSubject_"+SN).value; var agree=confirm("Are you sure you want to close this query...?"); 
  if (agree) {window.location="HodReplyQ.php?ac=CloseQuery&QCid="+i+"&page="+P+"&QEI="+QEI+"&DI="+DI+"&QS="+QS+"&HYN="+HYN;}}
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
			 <?php if($rowApp>0) { ?>
             <td align="center"><a href="AppReplyQ.php?page=1"><img id="Img_RepMgr1" style="display:block;" src="images/RepMgr1.png" border="0"/></a>
		     <img id="Img_RepMgr" style="display:none;" src="images/RepMgr.png" border="0"/></td><?php } ?>
			 <?php if($rowHod>0) { ?>
             <td align="center"><a href="HodReplyQ.php?page=1"><img id="Img_Hod1" style="display:none;" src="images/RevHod1.png" border="0"/></a>
		     <img id="Img_Hod" style="display:block;" src="images/RevHod.png" border="0"/></td><?php } ?>
			 <td>&nbsp;</td>
		<td style="font-family:Times New Roman; color:#004A00; font-size:16px;width:500px;" align=""><b><u>Reply Query</u></b></td>
		<td align="center" style="font-family:Times New Roman; color:#004A00;width:82px; font-size:15px;"><a href="javascript:window.location='HodReplyQ.php?page=1'"><b>Refresh</b></a></td>
			  </tr>
			 </table>
			</td>
		   </tr>	  
			   <tr>
			     <td align="" id="QueryStatusTD" style="display:;width:1000px; margin-left:0px;" valign="top">
				    <table border="1">
					  <tr bgcolor="#7a6189" style="height:22px;">
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:50px;" align="center"><b>Sno</b></td>		  
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:100px;" align="center"><b>Query Date</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:150px;" align="center"><b>Subject</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:250px;" align="center"><b>Name</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:120px;" align="center"><b>Department</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:70px;" align="center"><b>Details</b></td>
 		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:80px;" align="center"><b>Status</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:50px;" align="center"><b>Action</b></td>
		             </tr>	
<?php  $CurrDate=date('Y-m-d h:i:s');
$sql_statement = mysql_query("select * from hrm_employee_queryemp where QStatus=2 AND Level_3ID=".$EmployeeId." AND (Level_3QStatus=2 OR Level_3QStatus=3) order by QueryDT DESC", $con);
$total_records = mysql_num_rows($sql_statement);
if(isset($_GET['page'])) $page = $_GET['page']; else $page = 1;  
$offset = 10;
if ($page){ $from = ($page * $offset) - $offset; }else{ $from = 0;}

$sql_statement = mysql_query("select * from hrm_employee_queryemp where QStatus=2 AND Level_3ID=".$EmployeeId." AND (Level_3QStatus=2 OR Level_3QStatus=3) order by QueryDT DESC LIMIT " . $from . "," . $offset, $con);

if($total_records>0){ if($_REQUEST['page']==1){$Sno=1;} elseif($_REQUEST['page']==2){$Sno=11;} elseif($_REQUEST['page']==3){$Sno=21;}
	  elseif($_REQUEST['page']==4){$Sno=31;} elseif($_REQUEST['page']==5){$Sno=41;} elseif($_REQUEST['page']==6){$Sno=51;} 
	  elseif($_REQUEST['page']==7){$Sno=61;} elseif($_REQUEST['page']==8){$Sno=71;} elseif($_REQUEST['page']==9){$Sno=81;} 
	  elseif($_REQUEST['page']==10){$Sno=91;} else{$Sno=1;}
	  while($resQuery=mysql_fetch_array($sql_statement)){ $sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,DesigId,DepartmentId,DR,Gender,Married from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$resQuery['EmployeeID'], $con); 
$resE=mysql_fetch_assoc($sqlE); 
if($resE['DR']=='Y'){$M='Dr.';} elseif($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';}  $NameE=$M.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; 

if($resQuery['QuerySubject']=='N'){$sub=substr_replace($resQuery['OtherSubject'], '', 15).'...';} else {$sub=substr_replace($resQuery['QuerySubject'], '', 15).'...';} 
if($resQuery['QueryNoOfTime']==1){$date=date("d-M-y", strtotime($resQuery['QueryDT']));} elseif($resQuery['QueryNoOfTime']==2){$date=date("d-M-y", strtotime($resQuery['Query2DT']));}
elseif($resQuery['QueryNoOfTime']==3){$date=date("d-M-y", strtotime($resQuery['Query3DT']));} elseif($resQuery['QueryNoOfTime']==4){$date=date("d-M-y", strtotime($resQuery['Query4DT']));}elseif($resQuery['QueryNoOfTime']==5){$date=date("d-M-y", strtotime($resQuery['Query5DT']));}
?>
           <tr bgcolor="#FFFFFF" style="height:22px;">
		   <td style="font-family:Times New Roman; font-size:12px; width:50px;" align="center" valign="top"><?php echo $Sno; ?></td>
		   <td style="font-family:Times New Roman; font-size:12px; width:100px;" align="center" valign="top"><?php echo $date; ?></td>
		   <td style="font-family:Georgia; font-size:12px; width:100px; overflow:hidden;" valign="top"><?php echo $sub; ?><input type="hidden" id="QSubject_<?php echo $Sno; ?>" value="<?php if($resQuery['QuerySubject']=='N'){echo $resQuery['OtherSubject'];}else{echo $resQuery['QuerySubject'];} ?>" /></td>  
		   <td style="font-family:Georgia; font-size:12px; width:200px;" valign="top"><?php if($resQuery['HideYesNo']=='N'){ echo $NameE;} else {echo 'Undisclosed';} ?></td>
<?php $sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resE['DepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD);?>		   
		   <td style="font-family:Georgia; font-size:12px; width:120px;" valign="top"><?php echo $resD['DepartmentCode']; ?></td>
		   <td style="font-family:Georgia; font-size:12px; width:70px;" align="center" valign="top">
		   <a href="javascript:ReadQuery(<?php echo $resQuery['QueryId'].', '.$resQuery['EmployeeID']; ?>)">Read</a></td>
 		   <td style="font-family:Times New Roman; font-size:12px; width:80px;color:#007700;" align="center" valign="top">Reply</td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:50px;" align="center" valign="middle">
	<?php if($resQuery['QCloseStatus']=='Y'){?><font color="#006200">Closed</font><?php } elseif($resQuery['QCloseStatus']=='N'){?>
	<a href="#" onClick="CloseQ(<?php echo $resQuery['QueryId']; ?>, <?php echo $_REQUEST['page'].', '.$resQuery['EmployeeID'].', '.$resQuery['QToDepartmentId'].', '.$Sno; ?>, '<?php echo $resQuery['HideYesNo']; ?>')">Close</a><?php } ?>
		  </td>
		   </tr>	
<?php $Sno++; } } else { ?>
                     <tr>
					    <td colspan="8" style="font:Georgia; color:#D56A00; font-size:12px; width:50px;"><b>Empty....</b></td>
					 </tr>
<?php } ?>					 			 			 
					</table>
				 </td>
			   </tr>
<tr>
<td align="center" style="font-family:Times New Roman; font-size:15px; font-weight:bold; ">
<?PHP doPages($offset, 'HodReplyQ.php', '', $total_records); ?>
</td>
</tr>					   
			 </table>
		   </td>
<?php //*******************************************Status Close********** ?> 
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



