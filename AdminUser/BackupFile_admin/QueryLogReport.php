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
function SelAction(v,p){ window.location="QueryLogReport.php?v="+v+"&page=1"; }
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
	  <td width="200" class="heading">&nbsp;Query Log Reports</td>
	  <td width="300" style="font-family:Times New Roman;color:#400000;font-size:14px;"><b>Search :&nbsp;</b><select onChange="SelAction(this.value,<?php echo $_REQUEST['page'] ?>)" style="background-color:#D2FFA6; font-family:Times New Roman; font-size:14px; width:120px; height:21px;">
	  <option value="<?php echo $_REQUEST['v']; ?>">&nbsp;<?php if($_REQUEST['v']=='OP'){echo 'Open Query';}if($_REQUEST['v']=='CL'){echo 'Closed Query';}if($_REQUEST['v']=='All'){echo 'All Query';} if($_REQUEST['v']==''){echo 'Select';} ?></option>
	  <option value="OP">&nbsp;Open Query</option><option value="CL">&nbsp;Closed Query</option><option value="All">&nbsp;All Query</option></select></td>
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
	  <td align="left" style="width:1200px;">
		<table border="1" bgcolor="#7a6189">
 <tr bgcolor="#7a6189">
   <td style="font-family:Times New Roman;color:#FFFFFF;font-size:15px;width:40px;" align="center"><b>QNo</b></td>
   <td style="font-family:Times New Roman;color:#FFFFFF;font-size:15px;width:200px;" align="center"><b>Query To</b></td>
   <td style="font-family:Times New Roman;color:#FFFFFF;font-size:15px;width:250px;" align="center"><b>Query</b></td>
   <td style="font-family:Times New Roman;color:#FFFFFF;font-size:15px;width:200px;" align="center"><b>Raised By</b></td>
   <td style="font-family:Times New Roman;color:#FFFFFF;font-size:15px;width:80px;" align="center"><b>Query-Date</b></td>
   <td style="font-family:Times New Roman;color:#FFFFFF;font-size:15px;width:60px;" align="center"><b>Status</b></td>
   <td style="font-family:Times New Roman;color:#FFFFFF;font-size:15px;width:80px;" align="center"><b>Closed-Date</b></td>
   <td style="font-family:Times New Roman;color:#FFFFFF;font-size:15px;width:250px;" align="center"><b>Reason for Non-Close</b></td>
 </tr> 	
<?php if($_REQUEST['v']=='OP'){$sql_statement = mysql_query("select * from hrm_employee_querylog INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_querylog.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_querylog.Status='OP' order by QueryLogDate DESC", $con);}
      elseif($_REQUEST['v']=='CL'){$sql_statement = mysql_query("select * from hrm_employee_querylog INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_querylog.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_querylog.Status='CL' order by QueryLogDate DESC", $con);}
	  elseif($_REQUEST['v']=='All' OR $_REQUEST['v']==''){$sql_statement = mysql_query("select * from hrm_employee_querylog INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_querylog.EmployeeID where hrm_employee.CompanyId=".$CompanyId." order by QueryLogDate DESC", $con);}
$total_records = mysql_num_rows($sql_statement);
if(isset($_GET['page'])) $page = $_GET['page']; else $page = 1;  
$offset = 10;
if ($page){ $from = ($page * $offset) - $offset; }else{ $from = 0;}

if($_REQUEST['v']=='OP'){$sql_statement = mysql_query("select * from hrm_employee_querylog INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_querylog.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_querylog.Status='OP' order by QueryLogDate DESC LIMIT " . $from . "," . $offset, $con);}
elseif($_REQUEST['v']=='CL'){$sql_statement = mysql_query("select * from hrm_employee_querylog INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_querylog.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_querylog.Status='CL' order by QueryLogDate DESC LIMIT " . $from . "," . $offset, $con);}
elseif($_REQUEST['v']=='All' OR $_REQUEST['v']==''){$sql_statement = mysql_query("select * from hrm_employee_querylog INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_querylog.EmployeeID where hrm_employee.CompanyId=".$CompanyId." order by QueryLogDate DESC LIMIT " . $from . "," . $offset, $con);}
if($total_records>0) { if($_REQUEST['page']==1){$Sno=1;} elseif($_REQUEST['page']==2){$Sno=11;} elseif($_REQUEST['page']==3){$Sno=21;}
	  elseif($_REQUEST['page']==4){$Sno=31;} elseif($_REQUEST['page']==5){$Sno=41;} elseif($_REQUEST['page']==6){$Sno=51;} 
	  elseif($_REQUEST['page']==7){$Sno=61;} elseif($_REQUEST['page']==8){$Sno=71;} elseif($_REQUEST['page']==9){$Sno=81;} 
	  elseif($_REQUEST['page']==10){$Sno=91;} else{$Sno=1;} while($resQ=mysql_fetch_array($sql_statement)) { ?>	
			 <tr bgcolor="#FFFFFF">
			   <td style="font-family:Times New Roman;font-size:12px;width:40px;" align="center"><?php echo $Sno; ?></td>   
<?php $sqlE2=mysql_query("select Fname,Sname,Lname,DR,Gender,Married from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$resQ['Emp_CreatedBy'], $con); $resE2=mysql_fetch_assoc($sqlE2);
if($resE2['DR']=='Y'){$M2='Dr.';} elseif($resE2['Gender']=='M'){$M2='Mr.';} elseif($resE2['Gender']=='F' AND $resE2['Married']=='Y'){$M2='Mrs.';} elseif($resE2['Gender']=='F' AND $resE2['Married']=='N'){$M2='Miss.';} 
?>						   
			<td style="font-family:Times New Roman;font-size:12px;width:200px;" align="" valign="top"><?php if($resQ['EmployeeID']==0){echo 'OTHER';}else{ echo $M2.' '.$resE2['Fname'].' '.$resE2['Sname'].' '.$resE2['Lname']; } ?></td>
			<td style="font-family:Times New Roman;font-size:12px;width:250px;" align="" valign="top"><?php echo $resQ['Query']; ?></td>
<?php $sqlE=mysql_query("select Fname,Sname,Lname,DR,Gender,Married from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$resQ['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE);
if($resE['DR']=='Y'){$M='Dr.';} elseif($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';} 
?>			
			   <td style="font-family:Times New Roman;font-size:12px;width:200px;" align="" valign="top"><?php echo $M.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; ?></td>
			   <td style="font-family:Times New Roman;font-size:12px;width:80px;" align="center" valign="top"><?php echo date("d-M-y",strtotime($resQ['QueryLogDate'])); ?></td>
			   <td style="font-family:Times New Roman;font-size:12px;width:60px;" align="center" valign="top" bgcolor="#CDFF9B"><?php if($resQ['Status']=='OP'){echo 'Open'; } else {echo 'Closed';}?></td>
			   <td style="font-family:Times New Roman;font-size:12px;width:80px;" align="center" valign="top"><?php if($resQ['Status']=='OP'){echo ''; } else {echo date("d-M-y",strtotime($resQ['ClosedDate'])); } ?></td>
			   <td style="font-family:Times New Roman;font-size:12px;width:250px;" align="" valign="top"><?php echo $resQ['Reason_NonClosed']; ?></td>
			 </tr>
<?php $Sno++;} } if($total_records==0) { ?>
             <tr><td colspan="8" style="font:Georgia; color:#D56A00; font-size:12px; width:50px;"><b>Empty....</b></td></tr>
<?php } ?>	
		</table>
      </td>
   </tr>
<tr>
<td align="center" style="font-family:Times New Roman; font-size:15px; font-weight:bold;" colspan="2">
<?PHP doPages($offset, 'QueryLogReport.php', '', $total_records); ?>
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
echo '<a href="'.$thepage.'?page='.$i.$query.'&v='.$_REQUEST['v'].'" class="prn" rel="nofollow" title="go to page '.$i.'">&lt; Previous</a>&nbsp;';
echo '<span class="prn">...</span>&nbsp;';
}
if($start > 1) {
$i = 1;
echo '<a href="'.$thepage.'?page='.$i.$query.'&v='.$_REQUEST['v'].'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
for ($i = $start; $i <= $end && $i <= $total_pages; $i++){
if($i==$current) {
echo '<span>'.$i.'</span>&nbsp;';
} else {
echo '<a href="'.$thepage.'?page='.$i.$query.'&v='.$_REQUEST['v'].'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
}
if($total_pages > $end){
$i = $total_pages;
echo '<a href="'.$thepage.'?page='.$i.$query.'&v='.$_REQUEST['v'].'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
if($current < $total_pages) {
$i = $current+1;
echo '<span class="prn">...</span>&nbsp;';
echo '<a href="'.$thepage.'?page='.$i.$query.'&v='.$_REQUEST['v'].'" class="prn" rel="nofollow" title="go to page '.$i.'">Next &gt;</a>&nbsp;';
} else {
echo '<span class="prn">Next &gt;</span>&nbsp;';
}
if ($total != 0){
//prints the total result count just below the paging
echo '&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ee4545"<h4>(Total '.$total.' Records)</h4></font></div>';
}
}
?>