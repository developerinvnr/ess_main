<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');} 
if($_REQUEST['action']=='SaveLog' AND $_REQUEST['action']!='')
{ if($_REQUEST['S']=='CL'){$ClosedDate=date("Y-m-d",strtotime($_REQUEST['CD']));}elseif($_REQUEST['S']=='OP'){$ClosedDate='0000-00-00';} 
$sqlIns=mysql_query("insert into hrm_employee_querylog(EmployeeID, Query, QueryLogDate, Status, ClosedDate, Reason_NonClosed, Emp_CreatedBy, Emp_CreatedDate, QueryLogYearId)values(".$_REQUEST['R'].", '".$_REQUEST['Q']."', '".date("Y-m-d",strtotime($_REQUEST['DL']))."', '".$_REQUEST['S']."', '".$ClosedDate."', '".$_REQUEST['RE']."', ".$EmployeeId.", '".date("Y-m-d")."', ".$YearId.")", $con);
 if($sqlIns){$msg="Query Saved Successfully!..";}
}

if($_REQUEST['action']=='DeleteLog' AND $_REQUEST['action']!='')
{ $sqlDel=mysql_query("delete from hrm_employee_querylog where QueryLogId =".$_REQUEST['QI'], $con);
  if($sqlDel){$msgDel="Query Deleted Successfully!..";}
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
<style>.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function EditLog()
{
 document.getElementById("Query").readOnly=false; document.getElementById("RaisedBy").disabled=false; document.getElementById("f_btn1").disabled=false;
 document.getElementById("QLogStatus").disabled=false; document.getElementById("f_btn2").disabled=false; document.getElementById("ReasonNonClosed").readOnly=true; 
 document.getElementById("EditSpan").style.display='none'; document.getElementById("SaveSpan").style.display='block';
}

function SaveLog() 
{ var Query=document.getElementById("Query").value; var Raised=document.getElementById("RaisedBy").value; var Statue=document.getElementById("QLogStatus").value;
  var ClosedDate=document.getElementById("ClosedDate").value; var Reason=document.getElementById("ReasonNonClosed").value;
  var PageNo=document.getElementById("PageNo").value;
  if(Query==''){alert("Please type query!"); return false;}
  if(Raised==''){alert("Please select raised employee!"); return false;}
  if(Statue==''){alert("Please select status!"); return false;}
  if(Statue=='CL') { if(ClosedDate=='' || ClosedDate=='00-00-0000' || ClosedDate=='1970-01-01'){alert("Please select closed date!"); return false;} }
  if(Reason==''){alert("Please type Comments!"); return false;} 
 
 var agree=confirm("Are you sure you want to save query?");
 if(agree)
 { var DateLog=document.getElementById("DateLog").value; 
   var x="EmpQueryLog.php?action=SaveLog&Q="+Query+"&R="+Raised+"&DL="+DateLog+"&S="+Statue+"&CD="+ClosedDate+"&RE="+Reason+"&page="+PageNo; window.location=x;
 }
}

function SelSta(v)
{ if(v=='CL'){document.getElementById("ReasonNonClosed").readOnly=false;}
  if(v=='OP'){document.getElementById("ReasonNonClosed").readOnly=false;}
  if(v==''){document.getElementById("ReasonNonClosed").readOnly=true;}
}

function DeleteLog(v,p)
{
 var agree=confirm("Are you sure you want to dalete query?");
 if(agree){ var x="EmpQueryLog.php?action=DeleteLog&QI="+v+"&page="+p; window.location=x; }
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
	     <table border="0" style="width:100%; height:350px; float:none;" cellpadding="0">
		  <tr>
		   <td valign="top"> 
		   
<?php //*************************************************************************************************************************************************** ?>	   
	 <table border="0" id="Activity">
	  <tr>
		 <td id="Anni" valign="top">
			<table border="0">
				<tr height="20"><td align="left" valign="top" width="150">
<?php include("EmpImgEmp.php"); ?>
<?php //echo "<img width=105px height=125px src=\"show_images.php?id=".$EmployeeId."\">\n";?></td></tr>
			 </table>
		 </td>
<?php /******************************************** Query I ******************************************/ ?>		
<?php $sqlMax=mysql_query("select * from hrm_employee_querylog where Emp_CreatedBy=".$EmployeeId, $con); $rowMax=mysql_num_rows($sqlMax); ?>	  
		<td width="50" valign="top" style="width:1100px;">
		  <table border="0" style="width:1100px;">
		    <tr><td style="font-family:Times New Roman;color:#443360;font-size:18px;width:1100px;">&nbsp;&nbsp;<b><u>Query Log</u> :</b>&nbsp;&nbsp;
			<font style="color:#008000;font-size:15px;font-family:Times New Roman;"><b><?php echo $msg; ?></b></font></td></tr>
		    <tr>
			  <td style="width:1100px; ">
<form name="Qform" method="post" onSubmit="return validate(this)">			  
			  <table border="1">
			  <tr bgcolor="#7a6189">
			   <td style="font-family:Times New Roman;color:#FFFFFF;font-size:15px;width:40px;" align="center"><b>QNo</b></td>
			   <td style="font-family:Times New Roman;color:#FFFFFF;font-size:15px;width:220px;" align="center"><b>Query</b></td>
			   <td style="font-family:Times New Roman;color:#FFFFFF;font-size:15px;width:200px;" align="center"><b>Raised By</b></td>
			   <td style="font-family:Times New Roman;color:#FFFFFF;font-size:15px;width:100px;" align="center"><b>Query-Date</b></td>
			   <td style="font-family:Times New Roman;color:#FFFFFF;font-size:15px;width:80px;" align="center"><b>Status</b></td>
			   <td style="font-family:Times New Roman;color:#FFFFFF;font-size:15px;width:100px;" align="center"><b>Closed-Date</b></td>
			   <td style="font-family:Times New Roman;color:#FFFFFF;font-size:15px;width:200px;" align="center"><b>Comments</b></td>
			   <td style="font-family:Times New Roman;color:#FFFFFF;font-size:15px;width:50px;" align="center"><b>Save</b></td>
			 </tr> 
			 <tr bgcolor="#7a6189">
			   <td style="font-family:Times New Roman;font-size:15px;width:40px;" align="center" valign="top">
			   <input id="QueryNo" style="width:40px;height:22px;" name="QueryNo" value="<?php echo $rowMax+1; ?>" readonly></td>
			   <td style="font-family:Times New Roman;font-size:15px;width:200px;" align="center">
			   <input id="Query" style="width:220px;font-family:Times New Roman;font-size:15px;height:22px;" readonly/></td>
			   <td style="font-family:Times New Roman;font-size:15px;width:200px;" align="center" valign="top">
			   <select id="RaisedBy" style="width:200px;font-family:Times New Roman;font-size:15px;height:22px;" disabled/>
			   <option value="">Select</option><?php $sqlE2=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname,DR,Gender,Married from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmpStatus!='De' AND hrm_employee.CompanyId=".$CompanyId." order by Fname ASC", $con); while($resE2=mysql_fetch_assoc($sqlE2)){?>
<option value="<?php echo $resE2['EmployeeID']; ?>"><?php echo $resE2['Fname'].' '.$resE2['Sname'].' '.$resE2['Lname']; ?></option><?php } ?><option value="0">OTHER</option></select>			   
			   </td>
			   <td style="font-family:Times New Roman;font-size:15px;width:100px;" align="center" valign="middle">
			   <input id="DateLog" name="DateLog" style="font-family:Times New Roman;color:#00000;font-size:15px;width:80px;height:22px;" value="<?php echo date("d-m-Y"); ?>" readonly><a href="#"><img src="images/CalenderBtn.jpeg" id="f_btn1"></a><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
  cal.manageFields("f_btn1", "DateLog", "%d-%m-%Y"); </script></td>
			   <td style="font-family:Times New Roman;font-size:15px;width:80px;" align="center" valign="top">
			   <select id="QLogStatus" style="width:78px;font-family:Times New Roman;font-size:12px;height:22px;" onChange="SelSta(this.value)" disabled><option value="">Select</option>
			   <option value="OP">Open</option><option value="CL">Closed</option></select></td>
			   <td style="font-family:Times New Roman;font-size:15px;width:100px;" align="center" valign="middle">
			   <input id="ClosedDate" name="ClosedDate" style="font-family:Times New Roman;color:#00000;font-size:15px;width:80px;height:22px;" value="" readonly><a href="#"><img src="images/CalenderBtn.jpeg" id="f_btn2"></a><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
  cal.manageFields("f_btn2", "ClosedDate", "%d-%m-%Y"); </script></td>
			   <td style="font-family:Times New Roman;font-size:15px;width:200px;" align="center" valign="top">
			   <input id="ReasonNonClosed" style="width:200px;font-family:Times New Roman;font-size:15px;height:22px;" readonly/></td>
			   <td style="font-family:Times New Roman;color:#FFFFFF;font-size:15px;width:50px;" align="center" bgcolor="#FFFFFF" valign="top">
			   <span id="EditSpan" style="display:block;"><a href="#" onClick="EditLog()"><img src="images/edit.png" border="0" /></a></span>
			   <span id="SaveSpan" style="display:none;"><a href="#" onClick="SaveLog()"><img src="images/save.gif" style="width:20px;height:20px;" border="0" /></a></span></td>
			 </tr>
             </table>
</form>			 
			 </td>
			</tr>
			<tr><td style="height:10px;">&nbsp;</td></tr>
            <tr><td style="font-family:Times New Roman;color:#443360;font-size:18px;width:1100px;" align="">&nbsp;&nbsp;<b><u>Query Log Reports</u> :</b>&nbsp;&nbsp;
			<font style="color:#BF0000;font-size:15px;font-family:Times New Roman;"><b><?php echo $msgDel; ?></b></font></td></tr>
<?php 
$sql_statement = mysql_query("select * from hrm_employee_querylog where Emp_CreatedBy=".$EmployeeId." order by QueryLogDate DESC", $con);
$total_records = mysql_num_rows($sql_statement);
if(isset($_GET['page'])) $page = $_GET['page']; else $page = 1;  
$offset = 5;
if ($page){ $from = ($page * $offset) - $offset; }else{ $from = 0;}
$sql_statement = mysql_query("select * from hrm_employee_querylog where Emp_CreatedBy=".$EmployeeId." order by QueryLogDate DESC LIMIT " . $from . "," . $offset, $con);
?>				
		    <tr>
			  <td style="width:1100px; "><input type="hidden" id="PageNo" value="<?php echo $_REQUEST['page']; ?>" />
<form name="Qform" method="post" onSubmit="return validate(this)">			  
			  <table border="1">
			  <tr bgcolor="#7a6189">
			   <td style="font-family:Times New Roman;color:#FFFFFF;font-size:15px;width:40px;" align="center"><b>QNo</b></td>
			   <td style="font-family:Times New Roman;color:#FFFFFF;font-size:15px;width:280px;" align="center"><b>Query</b></td>
			   <td style="font-family:Times New Roman;color:#FFFFFF;font-size:15px;width:200px;" align="center"><b>Raised By</b></td>
			   <td style="font-family:Times New Roman;color:#FFFFFF;font-size:15px;width:80px;" align="center"><b>Query-Date</b></td>
			   <td style="font-family:Times New Roman;color:#FFFFFF;font-size:15px;width:60px;" align="center"><b>Status</b></td>
			   <td style="font-family:Times New Roman;color:#FFFFFF;font-size:15px;width:80px;" align="center"><b>Closed-Date</b></td>
			   <td style="font-family:Times New Roman;color:#FFFFFF;font-size:15px;width:200px;" align="center"><b>Comments</b></td>
			   <td style="font-family:Times New Roman;color:#FFFFFF;font-size:15px;width:50px;" align="center"><b>Delete</b></td>
			 </tr> 	
<?php if($total_records>0) { if($_REQUEST['page']==1){$Sn=1;} elseif($_REQUEST['page']==2){$Sn=6;} elseif($_REQUEST['page']==3){$Sn=11;} elseif($_REQUEST['page']==4){$Sn=16;} elseif($_REQUEST['page']==5){$Sn=21;} elseif($_REQUEST['page']==6){$Sn=26;} elseif($_REQUEST['page']==7){$Sn=31;} elseif($_REQUEST['page']==8){$Sn=36;} elseif($_REQUEST['page']==9){$Sn=41;} elseif($_REQUEST['page']==10){$Sn=46;} elseif($_REQUEST['page']==11){$Sn=51;} elseif($_REQUEST['page']==12){$Sn=56;} elseif($_REQUEST['page']==13){$Sn=61;} elseif($_REQUEST['page']==14){$Sn=66;} elseif($_REQUEST['page']==15){$Sn=71;} elseif($_REQUEST['page']==16){$Sn=76;} elseif($_REQUEST['page']==17){$Sn=81;} elseif($_REQUEST['page']==18){$Sn=86;} elseif($_REQUEST['page']==19){$Sn=91;} elseif($_REQUEST['page']==20){$Sn=96;} else{$Sn=1;}  while($resQ=mysql_fetch_array($sql_statement)) { ?>			 					 
			 <tr bgcolor="#FFFFFF">
			   <td style="font-family:Times New Roman;font-size:15px;width:40px;" align="center"><?php echo $Sn; ?></td>
			   <td style="font-family:Times New Roman;font-size:15px;width:280px;" align="" valign="top"><?php echo $resQ['Query']; ?></td>
<?php $sqlE=mysql_query("select Fname,Sname,Lname,DR,Gender,Married from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$resQ['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE);
if($resE['DR']=='Y'){$M='Dr.';} elseif($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';} 
?>			
			   <td style="font-family:Times New Roman;font-size:15px;width:200px;" align="" valign="top"><?php if($resQ['EmployeeID']==0){echo 'OTHER';}else{ echo $M.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; } ?></td>
			   <td style="font-family:Times New Roman;font-size:15px;width:80px;" align="center" valign="top"><?php echo date("d-M-y",strtotime($resQ['QueryLogDate'])); ?></td>
			   <td style="font-family:Times New Roman;font-size:15px;width:60px;" align="center" valign="top"><?php if($resQ['Status']=='OP'){echo 'Open'; } else {echo 'Closed';}?></td>
			   <td style="font-family:Times New Roman;font-size:15px;width:80px;" align="center" valign="top"><?php if($resQ['Status']=='OP'){echo ''; } else {echo date("d-M-y",strtotime($resQ['ClosedDate'])); } ?></td>
			   <td style="font-family:Times New Roman;font-size:15px;width:200px;" align="" valign="top"><?php echo $resQ['Reason_NonClosed']; ?></td>
			   <td style="font-family:Times New Roman;font-size:15px;width:50px;" align="center" valign="top">
			   <a href="#" onClick="DeleteLog(<?php echo $resQ['QueryLogId'].', '.$_REQUEST['page']; ?>)"><img src="images/delete.png" border="0"></a></td>
			 </tr>
<?php $Sn++;} } if($total_records==0) { ?>
             <tr><td colspan="8" style="font:Georgia; color:#D56A00; font-size:12px; width:50px;"><b>Empty....</b></td></tr>
<?php } ?>					 			 
             </table>
</form>			 
			 </td>
			</tr>			
<tr>
<td align="center" style="font-family:Times New Roman; font-size:15px; font-weight:bold;" colspan="2">
<?PHP doPages($offset, 'EmpQueryLog.php', '', $total_records); ?>
</td>
</tr>				
			
		  </table> 
       </td>
	 </tr>
  </table>
	
<?php //*************************************************************************************************************************************************** ?>
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






