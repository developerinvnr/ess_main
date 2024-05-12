<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<style>.font { color:#ffffff; font-family:Georgia; font-size:11px; width:200px;} .font1 { font-family:Georgia; font-size:11px; height:14px; } 
.font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }
.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
<Script type="text/javascript">window.history.forward(1);</script>
<script language="javascript">
function ActClick(Id,m,y,a)
{ //alert(Id+"-"+m+"-"+y+"-"+a);
 var win = window.open("AttAuthAct.php?id="+Id,"AttForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=600,height=550"); 
 var timer = setInterval( function() { if(win.closed){ clearInterval(timer);  window.location="AttAuth.php?m="+m+"&Y="+y+"&e=4e&w=234&tt=10234&a=f&e=4e2&e=4e&w=234&act=1&retd=ee&wwrew=t%T@sed818&d=101&a="+a; } }, 1000);
 
}

function FunY(y,a,m)
{ window.location="AttAuth.php?m="+m+"&Y="+y+"&e=4e&w=234&tt=10234&a=f&e=4e2&e=4e&w=234&tt=110022344&retd=ee&wwrew=t%T@sed818&d=101&a="+a; }

function FunChang(a,m,y)
{ window.location="AttAuth.php?m="+m+"&Y="+y+"&e=4e&w=234&tt=10234&a=f&e=4e2&e=4e&w=234&tt=110022344&retd=ee&wwrew=t%T@sed818&d=101&a="+a; }
</script>
</head>
<body class="body">
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
<?php //*********************************************?>
<?php //*******************START*****START*****START******START******START******************?>
<?php //**********************************************************************?>	  
<table border="0" style="margin-top:0px; width:100%; height:300px;">
<input type="hidden" id="StatusId" value=""/><input type="hidden" id="UserId" value="<?php echo $UserId; ?>"/>
<input type="hidden" id="YearId" value="<?php echo $YearId; ?>"/>
 <tr>
  <td style="width:50px;" valign="top" align="center">&nbsp;</td>
  <td align="left" height="20" valign="top" colspan="2" width="100%">
   <table border="0">
    <tr>
     <td class="TableHead"><font color="#106809" style='font-family:Times New Roman;' size="4"><i><b>Application For Attendance Authorisation</b></i></font>&nbsp;&nbsp;</td>
	 <?php if($_REQUEST['a']==0){$a='All Status';}elseif($_REQUEST['a']==1){$a='Peding';}elseif($_REQUEST['a']==2){$a='Submitted';} ?>
	         <td><select style="width:100px;font-size:14px;font-family:Times New Roman;" onChange="FunY(this.value,<?php echo $_REQUEST['a'].','.$_REQUEST['m']; ?>)"><option value="<?php echo $_REQUEST['Y']; ?>" selected><?php echo $_REQUEST['Y']; ?></option>
<?php for($i=$_REQUEST['Y']; $i>=2016; $i--){?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?></select></td>			 
			 <td><select style="width:100px;font-size:14px;font-family:Times New Roman;" onChange="FunChang(this.value,<?php echo $_REQUEST['m'].','.$_REQUEST['Y']; ?>)"><option value="<?php echo $_REQUEST['a']; ?>" selected><?php echo $a; ?></option>
			 <option value="1">Pending</option>
			 <option value="2">Submitted</option>
			 <option value="0">All</option>
			 </select></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>	
 <tr>
<td style="width:50px;" valign="top" align="center">&nbsp;</td>
  <td align="left" id="ReplyToQuery" valign="top" style="display:block;">             
   <form name="formRTQ" method="post" onSubmit="return validate(this)">
   <table border="0">
	<tr>  
	  <td>
			   <table border="1">
            <tr bgcolor="#7a6189" style="height:22px;">
		     <td width="30" class="TableHead" align="center"><b>Sno</b></td>
		     <td width="50" class="TableHead" align="center"><b>EC</b></td>
		     <td width="250" class="TableHead" align="center"><b>Name</b></td>
			 <td width="80" class="TableHead" align="center"><b>Date</b></td>
			 <td width="80" class="TableHead" align="center"><b>In Time</b></td>
			 <td width="80" class="TableHead" align="center"><b>Out Time</b></td>
		     <td width="100" class="TableHead" align="center"><b>Status</b></td>
			 <td width="100" class="TableHead" align="center"><b>Details & Action</b></td>
			 <td width="200" class="TableHead" align="center"><b>Reporting/ HR Remark</b></td>
		   </tr>
<?php if($_REQUEST['a']==0){$query="select rq.* from hrm_employee_attendance_req rq inner join hrm_employee e on rq.EmployeeID=e.EmployeeID where e.CompanyId=".$CompanyId." AND AttDate>='".$_REQUEST['Y']."-01-01' AND AttDate<='".$_REQUEST['Y']."-12-31'"; }elseif($_REQUEST['a']==1){$query="select rq.* from hrm_employee_attendance_req rq inner join hrm_employee e on rq.EmployeeID=e.EmployeeID where e.CompanyId=".$CompanyId." AND Status=0 AND AttDate>='".$_REQUEST['Y']."-01-01' AND AttDate<='".$_REQUEST['Y']."-12-31'"; }elseif($_REQUEST['a']==2){$query="select rq.* from hrm_employee_attendance_req rq inner join hrm_employee e on rq.EmployeeID=e.EmployeeID where e.CompanyId=".$CompanyId." AND Status=1 AND AttDate>='".$_REQUEST['Y']."-01-01' AND AttDate<='".$_REQUEST['Y']."-12-31'";}
$sql_statement = mysql_query($query,$con);
$total_records = mysql_num_rows($sql_statement);
if(isset($_GET['page'])) $page = $_GET['page']; else $page = 1;  
$offset = 20; 
if ($page){ $from = ($page * $offset) - $offset; }else{ $from = 0;}

if($_REQUEST['a']==0){$query2="select rq.* from hrm_employee_attendance_req rq inner join hrm_employee e on rq.EmployeeID=e.EmployeeID where e.CompanyId=".$CompanyId." AND AttDate>='".$_REQUEST['Y']."-01-01' AND AttDate<='".$_REQUEST['Y']."-12-31' order by AttDate DESC LIMIT " . $from . "," . $offset; }elseif($_REQUEST['a']==1){$query2="select rq.* from hrm_employee_attendance_req rq inner join hrm_employee e on rq.EmployeeID=e.EmployeeID where e.CompanyId=".$CompanyId." AND Status=0 AND AttDate>='".$_REQUEST['Y']."-01-01' AND AttDate<='".$_REQUEST['Y']."-12-31' order by AttDate DESC LIMIT " . $from . "," . $offset; }elseif($_REQUEST['a']==2){$query2="select rq.* from hrm_employee_attendance_req rq inner join hrm_employee e on rq.EmployeeID=e.EmployeeID where e.CompanyId=".$CompanyId." AND Status=1 AND AttDate>='".$_REQUEST['Y']."-01-01' AND AttDate<='".$_REQUEST['Y']."-12-31' order by AttDate DESC LIMIT " . $from . "," . $offset; }
$sql = mysql_query($query2,$con);

$row=mysql_num_rows($sql_statement); if($row>0){ 
if($_REQUEST['page']==1){$sno=$_REQUEST['page'];}
elseif($_REQUEST['page']==2){$sno=($_REQUEST['page']-1)+$offset;}
elseif($_REQUEST['page']>2){$sno=($_REQUEST['page']*$offset)+1;}
else{$sno=1;}

 /*
if($_REQUEST['page']==1){$sno=1;} elseif($_REQUEST['page']==2){$sno=11;} elseif($_REQUEST['page']==3){$sno=21;}
elseif($_REQUEST['page']==4){$sno=31;} elseif($_REQUEST['page']==5){$sno=41;} elseif($_REQUEST['page']==6){$sno=51;} elseif($_REQUEST['page']==7){$sno=61;} elseif($_REQUEST['page']==8){$sno=71;} elseif($_REQUEST['page']==9){$sno=81;}elseif($_REQUEST['page']==10){$sno=91;} else{$sno=1;}*/
	  while($res=mysql_fetch_array($sql)){	

$sqla = mysql_query("select Inn,Outt,InnLate,OuttLate from hrm_employee_attendance where EmployeeID=".$res['EmployeeID']." AND AttDate='".$res['AttDate']."'", $con); $resa=mysql_fetch_array($sqla);  
	    
$sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,DesigId,DepartmentId from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID where e.EmployeeID=".$res['EmployeeID'], $con); 
$resE=mysql_fetch_assoc($sqlE); ?>	

		<tr>
<td class="TableHead1" align="center"><?php echo $sno; ?></td>
<td class="TableHead1" align="center"><?php echo $resE['EmpCode']; ?></td>
<td class="TableHead1" align="left"><?php echo ucfirst(strtolower($resE['Fname'])).' '.ucfirst(strtolower($resE['Sname'])).' '.ucfirst(strtolower($resE['Lname'])); ?></td>
<td class="TableHead1" align="center"><?php echo date("d-m-Y", strtotime($res['AttDate'])); ?></td>
<td class="TableHead1" align="center"><font style="color:<?php if($resa['InnLate']==1){echo '#FF0000';}?>;"><?php if($resa['Inn']!='00:00:00' AND $resa['Inn']!=''){ echo date("h:i",strtotime($resa['Inn'])); } ?></font></td>
<td class="TableHead1" align="center"><font style="color:<?php if($resa['OuttLate']==1){echo '#FF0000';}?>;"><?php if($resa['Outt']!='00:00:00' AND $resa['Outt']!=''){ echo date("h:i",strtotime($resa['Outt'])); } ?></font></td>
<td class="TableHead1" align="center"><?php if($res['Status']==0){echo 'Pending';}elseif($res['Status']==1){echo '<font color="#009500">Submitted</font>';} ?></td>	
<td class="TableHead1" align="center"><span style="cursor:pointer;color:#0061C1;" onClick="ActClick(<?php echo $res['AttRqId'].','.$_REQUEST['m'].','.$_REQUEST['Y'].','.$_REQUEST['a']; ?>)"><u>Click</u></span></td>
<td class="TableHead1"><input style="width:200px;font-family:Times New Roman;font-size:12px;background-color:<?php if($res['R_Remark']!=''){echo '#FFFFFF';}elseif($res['H_Remark']!=''){echo '#D1FFA4';} ?>;border:hidden;" value="<?php if($res['R_Remark']!=''){echo $res['R_Remark'];}elseif($res['H_Remark']!=''){echo $res['H_Remark'];} ?>" readonly/></td>

		</tr>  
<?php $sno++; } } ?>				  
	
              </table>
			 </td>
   </tr>
   <tr>
<td align="center" style="font-family:Times New Roman; font-size:15px; font-weight:bold; ">
<?PHP doPages($offset, 'AttAuth.php', '', $total_records); ?>
</td>
</tr>
  </table>        
   </td>
 </tr>
 
<?php } ?> 
</table>
		
<?php //**********************************************************************?>
<?php //**************END*****END*****END******END******END**************?>
<?php //*****************************************************************************?>
		
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
echo '<a href="'.$thepage.'?page='.$i.$query.'&ls=10&wer=123grtd&se=reew&w=ee102&yl&Y='.$_REQUEST['Y'].'&m='.$_REQUEST['m'].'&a='.$_REQUEST['a'].'&ee=s1s" class="prn" rel="nofollow" title="go to page '.$i.'">&lt; Previous</a>&nbsp;';
echo '<span class="prn">...</span>&nbsp;';
}
if($start > 1) {
$i = 1;
echo '<a href="'.$thepage.'?page='.$i.$query.'&ls=10&wer=123grtd&se=reew&w=ee102&yl&Y='.$_REQUEST['Y'].'&m='.$_REQUEST['m'].'&a='.$_REQUEST['a'].'&ee=s1s" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
for ($i = $start; $i <= $end && $i <= $total_pages; $i++){
if($i==$current) {
echo '<span>'.$i.'</span>&nbsp;';
} else {
echo '<a href="'.$thepage.'?page='.$i.$query.'&ls=10&wer=123grtd&se=reew&w=ee102&yl&Y='.$_REQUEST['Y'].'&m='.$_REQUEST['m'].'&a='.$_REQUEST['a'].'&ee=s1s" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
}
if($total_pages > $end){
$i = $total_pages;
echo '<a href="'.$thepage.'?page='.$i.$query.'&ls=10&wer=123grtd&se=reew&w=ee102&yl&Y='.$_REQUEST['Y'].'&m='.$_REQUEST['m'].'&a='.$_REQUEST['a'].'&ee=s1s" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
if($current < $total_pages) {
$i = $current+1;
echo '<span class="prn">...</span>&nbsp;';
echo '<a href="'.$thepage.'?page='.$i.$query.'&ls=10&wer=123grtd&se=reew&w=ee102&yl&Y='.$_REQUEST['Y'].'&m='.$_REQUEST['m'].'&a='.$_REQUEST['a'].'&ee=s1s" class="prn" rel="nofollow" title="go to page '.$i.'">Next &gt;</a>&nbsp;';
} else {
echo '<span class="prn">Next &gt;</span>&nbsp;';
}
if ($total != 0){
//prints the total result count just below the paging
echo '&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ee4545"<h4>(Total '.$total.' Records)</h4></font></div>';
}
}
?>      