<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>

<style>
.th{color:#ffffff;font-family:Times New Roman;font-size:12px;font-weight:bold;text-align:center;height:24px;} 
.tdl{color:#000000;font-family:Times New Roman;font-size:12px;height:20px;} 
.tdc{color:#000000;font-family:Times New Roman;font-size:12px;text-align:center;height:20px;}
.tdr{color:#000000;font-family:Times New Roman;font-size:12px;text-align:right;height:20px;} 
.inpl{color:#000000;font-family:Times New Roman;font-size:11px;width:99%;height:20px;} 
.inpc{color:#000000;font-family:Times New Roman;font-size:11px;text-align:center;width:99%;height:20px;}
.inpr{color:#000000;font-family:Times New Roman;font-size:11px;text-align:right;width:99%;height:20px;} 
.TableHead { font-family:Times New Roman;color:#000000;font-size:20px;font-weight:bold; }
.CBtn {background-image:url(images/CalenderBtn.jpeg);width:16px;height:16px;background-color:#E0DBE3;border-color:#FFFFFF;}
</style>


<script type="text/javascript" language="javascript">
function ActClick(Id,m,y,a)
{
 var win = window.open("AttApplReqAct.php?id="+Id,"AttForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=600,height=550"); 
 var timer = setInterval( function() { if(win.closed){ clearInterval(timer);  window.location="AttApplRep.php?m="+m+"&Y="+y+"&e=4e&w=234&tt=10234&a=f&e=4e2&e=4e&w=234&act=1&retd=ee&wwrew=t%T@sed818&d=101&a="+a; } }, 1000);
 
}

function FunChang(a,m,y)
{ window.location="AttApplRep.php?m="+m+"&Y="+y+"&e=4e&w=234&tt=10234&a=f&e=4e2&e=4e&w=234&tt=110022344&retd=ee&wwrew=t%T@sed818&d=101&a="+a; }

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
  <table width="100%" style="margin-top:0px;">
   <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
   <tr>
	<td valign="top">
	<table border="0" style="width:100%;float:none;" cellpadding="0">
     <tr>
	  <td valign="top">    
<?php //********************************************************************************** ?>	   
<table border="0" id="Activity">
 <tr>
  <td id="Anni" valign="top">
	<table border="0">
	  <tr height="20">
	   <td align="left" valign="top" width="150">
       <?php include("EmpImgEmp.php"); ?>
       <?php //echo "<img width=105px height=125px src=\"show_images.php?id=".$EmployeeId."\">\n";?>
	   </td>
	  </tr>
	</table>
  </td>
  <td style="width:100%;">
  <table border="0" style="width:90%;">
		    <tr>
			 <td><table border="0"><tr>
			 <td class="TableHead"><font color="#106809" style='font-family:Times New Roman;' size="4"><i><b>Application For Attendance Authorisation</b></i></font>&nbsp;&nbsp;</td>
			 <?php if($rowApp>0) { ?><td align="center"><a href="#"><img style="display:block;" src="images/RepMgr.png" border="0"/></a></td><?php } ?>
<?php if($rowHod>0) { ?><td align="center"><a href="AttApplhod.php?m=<?php echo $_REQUEST['m']; ?>&Y=<?php echo $_REQUEST['Y'];?>&e=4e&w=234&tt=10234&aa=f&e=4e2&e=4e&retd=ee&wwrew=t%T@sed818&d=101&a=1"><img id="Img_hod1" style="display:block;" src="images/RevHod1.png" border="0"/></a>
		     </td><?php } ?>
<?php if($_REQUEST['a']==0){$a='All Status';}elseif($_REQUEST['a']==1){$a='Pending';}elseif($_REQUEST['a']==2){$a='Submitted';} ?>			 
			 <td><select style="width:100px;font-size:14px;font-family:Times New Roman;" onChange="FunChang(this.value,<?php echo $_REQUEST['m'].','.$_REQUEST['Y'];?>)"><option value="<?php echo $_REQUEST['a']; ?>" selected><?php echo $a; ?></option>
			 <option value="1">Pending</option>
			 <option value="2">Submitted</option>
			 <option value="0">All</option>
			 </select></td>
			 
			 </tr></table></td>
			</tr>
			<tr>
			 <td>
			   <table border="1" cellspacing="1">
            <tr bgcolor="#7a6189" style="height:22px;">
		     <td class="th" style="width:30px;">Sno</td>
		     <td class="th" style="width:50px;">EC</td>
		     <td class="th" style="width:250px;">Name</td>
			 <td class="th" style="width:80px;">Date</td>
			 <td class="th" style="width:80px;">In Time</td>
			 <td class="th" style="width:80px;">Out Time</td>
			 <td class="th" style="width:100px;">Status</td>
		     <td class="th" style="width:80px;">Action</td>
			 <td class="th" style="width:100px;">Details</td>
		   </tr>
<?php  
if($_REQUEST['a']==0){$query="select * from hrm_employee_attendance_req where AttDate>='".date("Y-01-01")."' AND AttDate<='".date("Y-12-31")."' AND RId=".$EmployeeId; }elseif($_REQUEST['a']==1){$query="select * from hrm_employee_attendance_req where AttDate>='".date("Y-01-01")."' AND AttDate<='".date("Y-12-31")."' AND Status=0 AND RId=".$EmployeeId; }elseif($_REQUEST['a']==2){$query="select * from hrm_employee_attendance_req where AttDate>='".date("Y-01-01")."' AND AttDate<='".date("Y-12-31")."' AND Status=1 AND RId=".$EmployeeId;}
$sql_statement = mysql_query($query,$con);
$total_records = mysql_num_rows($sql_statement);
if(isset($_GET['page'])) $page = $_GET['page']; else $page = 1;  
$offset = 10;
if ($page){ $from = ($page * $offset) - $offset; }else{ $from = 0;}
 
if($_REQUEST['a']==0){$query2="select * from hrm_employee_attendance_req where AttDate>='".date("Y-01-01")."' AND AttDate<='".date("Y-12-31")."' AND RId=".$EmployeeId." order by AttDate DESC LIMIT " . $from . "," . $offset; }elseif($_REQUEST['a']==1){$query2="select * from hrm_employee_attendance_req where AttDate>='".date("Y-01-01")."' AND AttDate<='".date("Y-12-31")."' AND Status=0 AND RId=".$EmployeeId." order by AttDate DESC LIMIT " . $from . "," . $offset; }elseif($_REQUEST['a']==2){$query2="select * from hrm_employee_attendance_req where AttDate>='".date("Y-01-01")."' AND AttDate<='".date("Y-12-31")."' AND Status=1 AND RId=".$EmployeeId." order by AttDate DESC LIMIT " . $from . "," . $offset; }
$sql = mysql_query($query2,$con);

$row=mysql_num_rows($sql_statement); if($row>0){  
if($_REQUEST['page']==1){$sno=1;} 
elseif($_REQUEST['page']>1) {$sno=($_REQUEST['page']*10)-9;}
else{$sno=1;} while($res=mysql_fetch_array($sql)){	

$sqla = mysql_query("select Inn,Outt,InnLate,OuttLate from hrm_employee_attendance where EmployeeID=".$res['EmployeeID']." AND AttDate='".$res['AttDate']."'", $con); $resa=mysql_fetch_array($sqla);  
	    
$sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,DesigId,DepartmentId from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID where e.EmployeeID=".$res['EmployeeID'], $con); 
$resE=mysql_fetch_assoc($sqlE); 

$sqlch=mysql_query("select * from hrm_employee_separation where EmployeeID=".$res['EmployeeID']." AND Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C'", $con); $rowch=mysql_num_rows($sqlch);
?>	

		<tr style="background-color:<?php if($rowch>0){echo '#FFFF6C';}else{echo '#FFFFFF';} ?>;">
<td class="tdc"><?php echo $sno; ?></td>
<td class="tdc"><?php echo $resE['EmpCode']; ?></td>
<td class="tdl"><?php echo ucfirst(strtolower($resE['Fname'])).' '.ucfirst(strtolower($resE['Sname'])).' '.ucfirst(strtolower($resE['Lname'])); ?></td>
<td class="tdc"><?php echo date("d-m-Y", strtotime($res['AttDate'])); ?></td>
<td class="tdc"><font style="color:<?php //if($resa['InnLate']==1){echo '#FF0000';}?>;"><?php if($resa['Inn']!='00:00:00' AND $resa['Inn']!=''){ echo date("h:i",strtotime($resa['Inn'])); } ?></font></td>
<td class="tdc"><font style="color:<?php //if($resa['OuttLate']==1){echo '#FF0000';}?>;"><?php if($resa['Outt']!='00:00:00' AND $resa['Outt']!=''){ echo date("h:i",strtotime($resa['Outt'])); } ?></font></td>
<td class="tdc">
<?php 
if($res['InReason']!='' AND $res['OutReason']==''){ if($res['InStatus']==0){echo 'Draft';}elseif($res['InStatus']==2){echo '<font color="#009500">Approved</font>';}elseif($res['InStatus']==3){echo '<font color="#FF6464">Rejected</font>';} }
elseif($res['InReason']=='' AND $res['OutReason']!=''){ if($res['OutStatus']==0){echo 'Draft';}elseif($res['OutStatus']==2){echo '<font color="#009500">Approved</font>';}elseif($res['OutStatus']==3){echo '<font color="#FF6464">Rejected</font>';} }
elseif($res['InReason']!='' AND $res['OutReason']!=''){ if($res['InStatus']==0){echo 'Draft';}elseif($res['InStatus']==2){echo '<font color="#009500">Approved</font>';}elseif($res['InStatus']==3){echo '<font color="#FF6464">Rejected</font>';}echo '/';if($res['OutStatus']==0){echo 'Draft';}elseif($res['OutStatus']==2){echo '<font color="#009500">Approved</font>';}elseif($res['OutStatus']==3){echo '<font color="#FF6464">Rejected</font>';} }
elseif($res['Reason']!=''){ if($res['SStatus']==0){echo 'Draft';}elseif($res['SStatus']==2){echo '<font color="#009500">Approved</font>';}elseif($res['SStatus']==3){echo '<font color="#FF6464">Rejected</font>';} }
 ?>
</td>

<td class="tdc"><?php if($res['Status']==0){echo 'Pending';}elseif($res['Status']==1){echo '<font color="#009500">Submitted</font>';} ?></td>	
<td class="tdc"><span style="cursor:pointer;color:#0061C1;" onClick="ActClick(<?php echo $res['AttRqId'].','.$_REQUEST['m'].','.$_REQUEST['Y'].','.$_REQUEST['a']; ?>)"><u>Click</u></span></td>

		</tr>  
<?php $sno++; } } ?>					  
	
              </table>
			 </td>
			</tr>
<tr>
<td align="center" style="font-family:Times New Roman; font-size:15px; font-weight:bold; ">
<?PHP doPages($offset, 'AttApplRep.php', '', $total_records); ?>
</td>
</tr>			
		 </table>
	           </td>
    </tr>
</table>

			
<?php //***************************************************************************************** ?>
		   </td>
		  </tr>
		</table>
	  </td>
	</tr>	
	<tr><td valign="top" align="center">&nbsp;</td></tr>
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
echo '<a href="'.$thepage.'?page='.$i.$query.'&m='.$_REQUEST['m'].'&Y='.$_REQUEST['Y'].'&e=4e&w=234&tt=10234&a=f&e=4e2&e=4e&w=234&tt=110022344&retd=ee&wwrew=t%T@sed818&d=101&a='.$_REQUEST['a'].'" class="prn" rel="nofollow" title="go to page '.$i.'">&lt; Previous</a>&nbsp;';
echo '<span class="prn">...</span>&nbsp;';
}
if($start > 1) {
$i = 1;
echo '<a href="'.$thepage.'?page='.$i.$query.'&m='.$_REQUEST['m'].'&Y='.$_REQUEST['Y'].'&e=4e&w=234&tt=10234&a=f&e=4e2&e=4e&w=234&tt=110022344&retd=ee&wwrew=t%T@sed818&d=101&a='.$_REQUEST['a'].'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
for ($i = $start; $i <= $end && $i <= $total_pages; $i++){
if($i==$current) {
echo '<span>'.$i.'</span>&nbsp;';
} else {
echo '<a href="'.$thepage.'?page='.$i.$query.'&m='.$_REQUEST['m'].'&Y='.$_REQUEST['Y'].'&e=4e&w=234&tt=10234&a=f&e=4e2&e=4e&w=234&tt=110022344&retd=ee&wwrew=t%T@sed818&d=101&a='.$_REQUEST['a'].'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
}
if($total_pages > $end){
$i = $total_pages;
echo '<a href="'.$thepage.'?page='.$i.$query.'&m='.$_REQUEST['m'].'&Y='.$_REQUEST['Y'].'&e=4e&w=234&tt=10234&a=f&e=4e2&e=4e&w=234&tt=110022344&retd=ee&wwrew=t%T@sed818&d=101&a='.$_REQUEST['a'].'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
if($current < $total_pages) {
$i = $current+1;
echo '<span class="prn">...</span>&nbsp;';
echo '<a href="'.$thepage.'?page='.$i.$query.'&m='.$_REQUEST['m'].'&Y='.$_REQUEST['Y'].'&e=4e&w=234&tt=10234&a=f&e=4e2&e=4e&w=234&tt=110022344&retd=ee&wwrew=t%T@sed818&d=101&a='.$_REQUEST['a'].'" class="prn" rel="nofollow" title="go to page '.$i.'">Next &gt;</a>&nbsp;';
} else {
echo '<span class="prn">Next &gt;</span>&nbsp;';
}
if ($total != 0){
//prints the total result count just below the paging
echo '&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ee4545"<h4>(Total '.$total.' Records)</h4></font></div>';
}
}
?>
