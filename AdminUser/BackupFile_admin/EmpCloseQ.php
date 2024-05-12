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
.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman;font-size:13px;width:79px;height:20px; text-align:center; }
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<Script type="text/javascript">window.history.forward(1);</script>
<script type="text/javascript" src="js/Query.js" ></script>
<script language="javascript">
function ReadQuery(QI)
{ var win = window.open("ReadQueryDetails.php?Qid="+QI,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=500,height=310");
  //var timer = setInterval( function() { if(win.closed) {  clearInterval(timer);  window.location="EmpDraftQ.php"; } }, 1000);
}
</script>
</head>
<body class="body">
<input type="hidden" id="UserId" value="<?php echo $UserId; ?>" /><input type="hidden" id="UserType" value="<?php echo $_SESSION['UserType']; ?>" />
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
	  <td width="300" class="heading">&nbsp;Close Query</td>
	  <td><font style="font-family:Times New Roman;color:#004000;font-size:15px; font-weight:bold;"><?php echo $Msg; ?></font></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true) { ?>	
<?php //***********************************************Reply To Query******************************************************?> 
<tr> 
<td align="left" id="ReplyToQuery" valign="top" style="display:block;">             
   <table border="0">
	<tr>
	  <td align="left" style="width:1300px;">
		<table border="1" bgcolor="#7a6189" style="width:1300px;">
<tr>
 <td width="40" class="TableHead" align="center"><b>Sno</b></td>
 <td colspan="3" class="TableHead" align="center" valign="top" style="background-color:#808040;"><b>Employee Details</b></td>
 <td colspan="5" class="TableHead" align="center" valign="top" style="background-color:#4FA7FF;"><b>Query Details</b></td>
 <td colspan="1" class="TableHead" align="center" valign="top" style="background-color:#B3A717;"><b>Level 1</b></td>
 <td colspan="1" class="TableHead" align="center" valign="top" style="background-color:#B3A717;"><b>Level 2</b></td>
 <td colspan="1" class="TableHead" align="center" valign="top" style="background-color:#B3A717;"><b>Level 3</b></td>
 <td colspan="1" class="TableHead" align="center" valign="top" style="background-color:#B3A717;"><b>Mngmt</b></td>
</tr>
<tr>
 <td width="40" class="TableHead" align="center"><b>&nbsp;</b></td>
 <td width="50" class="TableHead" align="center"><b>EC</b></td>
 <td width="200" class="TableHead" align="center"><b>Name</b></td>
 <td width="80" class="TableHead" align="center"><b>Department</b></td>
 <td width="60" class="TableHead" align="center"><b>Date</b></td>
 <td width="150" class="TableHead" align="center"><b>Subject</b></td>
 <td width="100" class="TableHead" align="center"><b>Query To</b></td>
 <td width="50" class="TableHead" align="center"><b>Name Hide</b></td>
 <td width="80" class="TableHead" align="center"><b>Status</b></td>
 <td width="80" class="TableHead" align="center"><b>Status</b></td> 
 <td width="80" class="TableHead" align="center"><b>Status</b></td>  
 <td width="80" class="TableHead" align="center"><b>Status</b></td> 
 <td width="80" class="TableHead" align="center"><b>Status</b></td> 	   
</tr>
<?php $sql_statement = mysql_query("select * from hrm_employee_queryemp INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_queryemp.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_queryemp.HRQStatus=1 order by QueryDT DESC", $con); 
$total_records = mysql_num_rows($sql_statement);
if(isset($_GET['page'])) $page = $_GET['page']; else $page = 1;  
$offset = 10;
if ($page){ $from = ($page * $offset) - $offset; }else{ $from = 0;}

$sql_statement = mysql_query("select * from hrm_employee_queryemp INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_queryemp.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_queryemp.HRQStatus=1 order by QueryDT DESC LIMIT " . $from . "," . $offset, $con);
if($total_records>0) { if($_REQUEST['page']==1){$Sno=1;} elseif($_REQUEST['page']==2){$Sno=11;} elseif($_REQUEST['page']==3){$Sno=21;}
	  elseif($_REQUEST['page']==4){$Sno=31;} elseif($_REQUEST['page']==5){$Sno=41;} elseif($_REQUEST['page']==6){$Sno=51;} 
	  elseif($_REQUEST['page']==7){$Sno=61;} elseif($_REQUEST['page']==8){$Sno=71;} elseif($_REQUEST['page']==9){$Sno=81;} 
	  elseif($_REQUEST['page']==10){$Sno=91;} else{$Sno=1;} while($resQ=mysql_fetch_array($sql_statement)) { ?>	
<tr>
 <td width="40" class="TableHead1" align="center"><?php echo $Sno; ?></td>
<?php $sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmployeeID=".$resQ['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE); 
$sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resE['DepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD);?>	 
 <td width="50" class="TableHead1" align="center"><?php echo $resE['EmpCode']; ?></td>
 <td width="200" class="TableHead1" align="" valign="top">&nbsp;<?php echo $resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; ?></td>
 <td width="80" class="TableHead1" align="" valign="top">&nbsp;<?php echo $resD['DepartmentCode']; ?></td>
 <td width="60" class="TableHead1" align="center" valign="top"><?php echo date("d-M-y", strtotime($resQ['QueryDT'])); ?></td>
 <td width="150" class="TableHead1" align="" valign="top">&nbsp;<a href="javascript:ReadQuery(<?php echo $resQ['QueryId']; ?>)"><?php if($resQ['QuerySubject']=='N'){echo substr_replace($resQ['OtherSubject'], '', 15).'.....';} else {echo substr_replace($resQ['QuerySubject'], '', 15).'.....'; }?></a></td>
<?php $sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resQ['QToDepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD);?>	 
 <td width="100" class="TableHead1" align="" valign="top">&nbsp;<?php echo $resD['DepartmentCode']; ?></td>
 <td width="50" class="TableHead1" align="center" valign="top"><?php if($resQ['HideYesNo']=='N'){ echo 'No';} else {echo 'Yes';} ?></td>
 <td width="80" class="TableHead1" align="center" valign="top" style="background-color:#C4FFC4;"><b>Closed</b></td>
 <td width="80" class="TableHead1" align="center" valign="top"><?php if($resQ['Level_1QStatus']==0){echo '<font color="#000000">Open</font>';} elseif($resQ['Level_1QStatus']==1){echo '<font color="#FF8042">Pending</font>';}elseif($resQ['Level_1QStatus']==2){echo '<font color="#007700">Reply</font>';} elseif($resQ['Level_1QStatus']==3){echo '<font color="#006AD5">Close</font>';} elseif($resQ['Level_1QStatus']==4){echo '<font color="#BF0000">Esclose</font>';}?></td> 
 <td width="80" class="TableHead1" align="center" valign="top"><?php if($resQ['Level_2QStatus']==0){echo '<font color="#000000">Open</font>';} elseif($resQ['Level_2QStatus']==1){echo '<font color="#FF8042">Pending</font>';}elseif($resQ['Level_2QStatus']==2){echo '<font color="#007700">Reply</font>';} elseif($resQ['Level_2QStatus']==3){echo '<font color="#006AD5">Close</font>';} elseif($resQ['Level_2QStatus']==4){echo '<font color="#BF0000">Esclose</font>';}?></td> 
 <td width="80" class="TableHead1" align="center" valign="top"><?php if($resQ['Level_3QStatus']==0){echo '<font color="#000000">Open</font>';} elseif($resQ['Level_3QStatus']==1){echo '<font color="#FF8042">Pending</font>';}elseif($resQ['Level_3QStatus']==2){echo '<font color="#007700">Reply</font>';} elseif($resQ['Level_3QStatus']==3){echo '<font color="#006AD5">Close</font>';} elseif($resQ['Level_3QStatus']==4){echo '<font color="#BF0000">Esclose</font>';}?></td>  
  <td width="80" class="TableHead1" align="center" valign="top"><?php if($resQ['Mngmt_QStatus']==0){echo '<font color="#000000">Open</font>';} elseif($resQ['Mngmt_QStatus']==1){echo '<font color="#FF8042">Pending</font>';}elseif($resQ['Mngmt_QStatus']==2){echo '<font color="#007700">Reply</font>';} elseif($resQ['Mngmt_QStatus']==3){echo '<font color="#006AD5">Close</font>';} elseif($resQ['Mngmt_QStatus']==4){echo '<font color="#BF0000">Esclose</font>';}?></td>
</tr>
<?php $Sno++; }} ?>	
		</table>
      </td>
   </tr>
<tr>
<td align="center" style="font-family:Times New Roman; font-size:15px; font-weight:bold;" colspan="2">
<?PHP doPages($offset, 'EmpCloseQ.php', '', $total_records); ?>
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