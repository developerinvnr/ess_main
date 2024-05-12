<?php session_start();
if($_SESSION['login'] = true){require_once('../../Employee/sp/user/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
$EmployeeId=$_SESSION['ID'];

if($_REQUEST['action']=='Editcd')
{ $up=mysql_query("update fa_courierdetail set RecevingDate='".date("Y-m-d",strtotime($_REQUEST['rc']))."', VerifDate='".date("Y-m-d",strtotime($_REQUEST['vd']))."', CNIssueDate='".date("Y-m-d",strtotime($_REQUEST['ci']))."', Rmk='".$_REQUEST['Rmk']."' where EmployeeID=".$_REQUEST['e']." AND Month=".$_REQUEST['m']." AND Year=".$_REQUEST['y'],$con); if($up){echo '<script>alert("Data updated successfully..");</script>';}
}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.htf{font-family:Times New Roman;;color:#000;font-weight:bold;text-align:center;font-size:18px;height:24px;}
.tdf{font-family:Times New Roman;font-size:12px;height:22px;color:#000000;}
.tdf2{background-color:#FFFF9D;font-family:Times New Roman;;font-size:15px;height:22px;text-align:center;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg);width:16px;height:16px;background-color:#E0DBE3;border-color:#FFFFFF;}
</style>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/><?php /* Calander Open */?>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script><?php /* Calander Close */?>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script language="javascript">
function FunEdit(n)
{ document.getElementById("edt"+n).style.display='none'; document.getElementById("sve"+n).style.display='block'; 
document.getElementById("RecevingDate"+n).style.background='#FFFFFF'; 
document.getElementById("VerifDate"+n).style.background='#FFFFFF'; 
document.getElementById("CNIssueDate"+n).style.background='#FFFFFF';
document.getElementById("Rmk"+n).readOnly=false; document.getElementById("Rmk"+n).style.background='#FFFFFF';}

function FunSave(n,m,y,e)
{ var rc=document.getElementById("RecevingDate"+n).value; var vd=document.getElementById("VerifDate"+n).value;
  var ci=document.getElementById("CNIssueDate"+n).value; var Rmk=document.getElementById("Rmk"+n).value;
  var Remark = Rmk.replace(/[`~#$^&*_|+\-=÷¿?;:'",.<>\{\}\[\]\\\/]/gi, '');
  
  
if(rc.length===0){ alert("please enter receiving date."); return false; }
//else if(vd.length===0){ alert("please enter verified number."); return false; } 
//else if(ci.length===0){ alert("please enter CN issue number."); return false; } 
else { var agree=confirm("Are you sure?"); 
       if(agree){window.location='f_courierdetails.php?action=Editcd&sn='+n+'&e='+e+'&m='+m+'&y='+y+'&rc='+rc+'&vd='+vd+'&ci='+ci+'&Rmk='+Remark;}
	   else{return false;} 
	 }
}
</Script>
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //**************************************************************************************?>
<?php //************START*****START*****START******START******START*************************?>
<?php //**************************************************************************************?>
<input type="hidden" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" id="UserId" value="<?php echo $UserId; ?>" />	
<input type="hidden" id="YId" value="<?php echo $YearId; ?>" />		  
<table border="0" style="margin-top:0px;width:100%;">
 <tr>
  <td align="left" height="10" valign="top" colspan="3">
   <table border="0">
    <tr><td style="margin-top:0px;" class="heading">&nbsp;Courier Details&nbsp;&nbsp;&nbsp;</td></tr>
   </table>
  </td>
 </tr>
 
<?php 
if($_SESSION['s1']==99 || $_SESSION['s2']==99 || $_SESSION['s3']==99){ $state='1=1'; $state2='1=1'; }
else
{ $state='(StateId='.$_SESSION['s1'].' OR StateId='.$_SESSION['s2'].' OR StateId='.$_SESSION['s3'].')'; 
  $state2='(g.CostCenter='.$_SESSION['s1'].' OR g.CostCenter='.$_SESSION['s2'].' OR g.CostCenter='.$_SESSION['s3'].')'; }
?> 
 
 <tr>
  <td valign="top">
<table border="0">
 <tr>
  <td class="tdf2" style="width:200px;"><b>Name</b></td>
  <td class="tdf2" style="width:50px;"><b>Month</b></td>
  <td class="tdf2" style="width:80px;"><b>Post Date</b></td>
  <td class="tdf2" style="width:120px;"><b>Docate No</b></td>
  <td class="tdf2" style="width:200px;"><b>Agency</b></td>
   <td class="tdf2" style="width:50px;"><b>Img</b></td>
  <td class="tdf2" style="width:90px;"><b>Receiving Date</b></td>
  <td class="tdf2" style="width:90px;"><b>Verified Date</b></td>
  <td class="tdf2" style="width:90px;"><b>CN Issue Date</b></td>
  <td class="tdf2" style="width:250px;"><b>Remark</b></td>
  <td class="tdf2" style="width:60px;"><b>Update</b></td>
 </tr> 
<?php
$sql_statement = mysql_query("select * from fa_courierdetail c inner join hrm_employee_general g on c.EmployeeID=g.EmployeeID where ".$state2." AND PostDate>='2020-10-01'", $con);
$total_records = mysql_num_rows($sql_statement);
if(isset($_GET['page']))$page = $_GET['page'];else $page = 1;
$offset = 15;
if ($page){$from = ($page * $offset) - $offset;}else{$from = 0;}
$sql=mysql_query("select * from fa_courierdetail c inner join hrm_employee_general g on c.EmployeeID=g.EmployeeID where ".$state2." AND PostDate>='2020-10-01' order by Year DESC, Month DESC LIMIT ".$from.",".$offset,$con); 
$sn=1; while($res=mysql_fetch_assoc($sql)){ $m=$res['Month']; 
$sE=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$res['EmployeeID'],$con);
$rE=mysql_fetch_assoc($sE); 
if($rE['Sname']!=''){ $Name=$rE['Fname'].' '.$rE['Sname'].' '.$rE['Lname']; }
else{ $Name=$rE['Fname'].' '.$rE['Lname']; }

?> 	 
 <tr style="background-color:#FFFFFF;height:24px;"> 
  <td class="tdf" align="">&nbsp;<?php echo $Name; ?></td>
  <td class="tdf" align="center"><?php if($m==1){echo 'JAN';}elseif($m==2){echo 'FEB';}elseif($m==3){echo 'MAR';}elseif($m==4){echo 'APR';}elseif($m==5){echo 'MAY';}elseif($m==6){echo 'JUN';}elseif($m==7){echo 'JUL';}elseif($m==8){echo 'AUG';}elseif($m==9){echo 'SEP';}elseif($m==10){echo 'OCT';}elseif($m==11){echo 'NOV';}elseif($m==12){echo 'DEC';} ?></td>
  <td class="tdf" align="center"><?php echo date("d-m-Y",strtotime($res['PostDate'])); ?></td>
  <td class="tdf">&nbsp;<?php echo strtoupper($res['DocateNo']); ?></td>
  <td class="tdf">&nbsp;<?php echo strtoupper($res['Agency']); ?></td>
  <td class="tdf" align="center"><?php if($res['CuImag']!=''){?><a href="../../Employee/sp/Employee/DocateImg/<?php echo $res['CuImag'];?>" target="_blank">Click</a><?php } ?></td>
 
  <td class="tdf" align="center"><input id="RecevingDate<?php echo $sn; ?>" style="font-family:Georgia;font-size:12px;width:90px;text-align:center;background-color:#C9C9C9;" value="<?php if($res['RecevingDate']!='1970-01-01' AND $res['RecevingDate']!='0000-00-00'){echo date("d-m-Y",strtotime($res['RecevingDate']));} ?>" readonly></td>
  
  <td class="tdf" align="center"><input id="VerifDate<?php echo $sn; ?>" style="font-family:Georgia;font-size:12px;width:90px;text-align:center;background-color:#C9C9C9;" value="<?php if($res['VerifDate']!='1970-01-01' AND $res['VerifDate']!='0000-00-00'){echo date("d-m-Y",strtotime($res['VerifDate']));} ?>" readonly></td>
  
  <td class="tdf" align="center"><input id="CNIssueDate<?php echo $sn; ?>" style="font-family:Georgia;font-size:12px;width:90px;text-align:center;background-color:#C9C9C9;" value="<?php if($res['CNIssueDate']!='1970-01-01' AND $res['CNIssueDate']!='0000-00-00'){echo date("d-m-Y",strtotime($res['CNIssueDate']));} ?>" readonly>
  
  <script type="text/javascript">  var cal = Calendar.setup({ onSelect: function(cal) { cal.hide()}, showTime: true }); cal.manageFields("RecevingDate<?php echo $sn; ?>", "RecevingDate<?php echo $sn; ?>", "%d-%m-%Y"); cal.manageFields("VerifDate<?php echo $sn; ?>", "VerifDate<?php echo $sn; ?>", "%d-%m-%Y"); cal.manageFields("CNIssueDate<?php echo $sn; ?>", "CNIssueDate<?php echo $sn; ?>", "%d-%m-%Y");</script></td>
  
  <td class="tdf" align="center"><input id="Rmk<?php echo $sn; ?>" style="font-family:Georgia;font-size:12px;width:250px;background-color:#C9C9C9;" value="<?php echo $res['Rmk']; ?>"></td>
  
  <td class="tdf" align="center">
   <img id="edt<?php echo $sn; ?>" src="images/edit.png" style="display:block;" onClick="FunEdit(<?php echo $sn; ?>)" />
   <img id="sve<?php echo $sn; ?>" src="images/Floppy-Small-icon.png" style="display:none;" onClick="FunSave(<?php echo $sn.','.$res['Month'].','.$res['Year'].','.$res['EmployeeID']; ?>)"/>
  </td>
	 </tr>	
<?php $sn++; } ?>	
<tr><td align="center" colspan="13" style="font-family:Times New Roman;font-size:15px;font-weight:bold;border:hidden;">
<?PHP doPages($offset, 'f_courierdetails.php', '', $total_records); ?></td></tr>  
</table>
  </td>
 </tr> 
</table>
<td><span id="RecordsSpan"></span></td>		
<?php //****************************************************************************************************?>
<?php //*************************END*****END*****END******END******END************************************?>
<?php //****************************************************************************************************?>
		
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
$index_limit = 5;
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
echo '<a href="'.$thepage.'?page='.$i.$query.'&ls='.$_REQUEST['ls'].'&yly='.$_REQUEST['yly'].'&ee=we23&er=1013&rr=wew101" class="prn" rel="nofollow" title="go to page '.$i.'">&lt; Previous</a>&nbsp;';
echo '<span class="prn">...</span>&nbsp;';
}
if($start > 1) {
$i = 1;
echo '<a href="'.$thepage.'?page='.$i.$query.'&ls='.$_REQUEST['ls'].'&yly='.$_REQUEST['yly'].'&ee=we23&er=1013&rr=wew101" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
for ($i = $start; $i <= $end && $i <= $total_pages; $i++){
if($i==$current) {
echo '<span>'.$i.'</span>&nbsp;';
} else {
echo '<a href="'.$thepage.'?page='.$i.$query.'&ls='.$_REQUEST['ls'].'&yly='.$_REQUEST['yly'].'&ee=we23&er=1013&rr=wew101" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
}
if($total_pages > $end){
$i = $total_pages;
echo '<a href="'.$thepage.'?page='.$i.$query.'&ls='.$_REQUEST['ls'].'&yly='.$_REQUEST['yly'].'&ee=we23&er=1013&rr=wew101" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
if($current < $total_pages) {
$i = $current+1;
echo '<span class="prn">...</span>&nbsp;';
echo '<a href="'.$thepage.'?page='.$i.$query.'&ls='.$_REQUEST['ls'].'&yly='.$_REQUEST['yly'].'&ee=we23&er=1013&rr=wew101" class="prn" rel="nofollow" title="go to page '.$i.'">Next &gt;</a>&nbsp;';
} else {
echo '<span class="prn">Next &gt;</span>&nbsp;';
}
if ($total != 0){
//prints the total result count just below the paging
echo '&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ee4545"<h4>(Total '.$total.' Records)</h></div>';
}
}