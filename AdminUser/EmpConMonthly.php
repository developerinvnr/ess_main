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
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff;font-family:Times New Roman;height:22px;font-size:14px;font-weight:bold;} 
.font1br {font-family:Times New Roman;font-size:14px; color:#000000;font-weight:bold;text-align:right;}
.font1r {font-family:Times New Roman;font-size:14px; color:#000000;text-align:right;}
.font1b {font-family:Times New Roman;font-size:14px;color:#000000;font-weight:bold;}
.font1 {font-family:Times New Roman;font-size:14px; color:#000000;}
 
.font2 { font-size:11px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:11px; width:120px; height:18px;}
.InputText {font-family:Times New Roman;font-size:12px;height:20px;color:#000066;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<Script>
function SelectYear(v){window.location='EmpConMonthly.php?act=true&wew=e%e@er%rdd=012&y='+v+'&yy=utu&mailto=promt';}

function ExportCopensation(y,c,d)
{ window.open("EmpConMonthlyExport.php?action=ReportsMonthlyValExport&y="+y+"&c="+c+"&d="+d,"ExportForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}

function FucChk(sn)
{ if(document.getElementById("Chk"+sn).checked==true){document.getElementById("TR"+sn).style.background='#9BEF47'; }
  else if(document.getElementById("Chk"+sn).checked==false){document.getElementById("TR"+sn).style.background='#FFFFFF'; }
}

</SCRIPT> 
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
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //*****************************************************************************************?>
<?php //**********START*****START*****START******START******START**************************?>
<?php //**************************************************************************************?>
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td class="heading" valign="top" style="width:330px;">Employee Monthly Confirmation</td>
<?php 
$today=date("Y-m-d"); $timestamp = strtotime($today);
if($_REQUEST['y']!=0)
{ 
 $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['y']."",$con); $rY=mysql_fetch_assoc($sY); 
 $FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; 
 $prevY=date("Y")-1; $nextY=date("Y")+1;
}
?>	     
	<td class="td1" style="font-size:14px;font-family:Times New Roman;" valign="top">&nbsp;&nbsp;<b>Year:</b>&nbsp;<select style="font-size:12px; width:150px; background-color:#DDFFBB;" name="YearID" id="YearID" onChange="SelectYear(this.value)"><?php if($_REQUEST['y']!=0){ ?><option value="<?php echo $_REQUEST['y']; ?>" selected><?php echo $PRD; ?></option><?php }else{?><option value="0">Select Year</option> <?php } ?>
<?php for($i=$YearId; $i>=2; $i--){ 
$ssY=mysql_query("select * from hrm_year where YearId=".$i."",$con); $rrY=mysql_fetch_assoc($ssY); 
$FFD=date("Y",strtotime($rrY['FromDate'])); $TTD=date("Y",strtotime($rrY['ToDate'])); $PPRD=$FFD.'-'.$TTD; ?>	
<?php if($_REQUEST['y']!=$i){ ?><option value="<?php echo $i; ?>"><?php echo $PPRD; ?></option><?php } } ?>
</select></td>
    <!--<td class="td1" style="font-size:14px;font-family:Times New Roman;" valign="top">&nbsp;&nbsp;<a href="#" onClick="ExportCopensation(<?php echo $_REQUEST['y'].', '.$CompanyId; ?>)" style="font-size:12px;">Export Excel</a></td>-->
   </tr>
   </table>
  </td>
 </tr> 
<?php if($_SESSION['login']=true){ ?>	
 <tr>
<?php //******************* Open Department**********************************?> 
<td align="left" id="type" valign="top" style="display:block; width:100%">             
<input type="hidden" id="ey" name="ey" value="<?php echo $_REQUEST['y']; ?>" />  
<table border="0" style="width:100%;" cellspacing="0">
<?php if($_REQUEST['y']>0){ ?>
<tr>
 <td align="left" style="width:100%;">
  <table border="1" bgcolor="#FFFFFF" cellspacing="0" style="width:100%;" cellpadding="4">
  <tr bgcolor="#7a6189">
   <td colspan="2" align="center" class="font" style="width:5%;">Sn</td>
   <td align="center" class="font" style="width:8%;">Month</td>
   <td align="center" class="font" style="width:6%">Total<br>Conferm<sup>n</sup></td>
   <td align="center" class="font" style="width:81%;">Employee List</td>
  </tr>
<?php 
for($i=4; $i<=15; $i++)
{ 
 if($i==4){$j=4; $mn='APR'; $Y=$FD;}elseif($i==5){$j=5; $mn='MAY'; $Y=$FD;}elseif($i==6){$j=6; $mn='JUN'; $Y=$FD;}elseif($i==7){$j=7; $mn='JUL'; $Y=$FD;}elseif($i==8){$j=8; $mn='AUG'; $Y=$FD;}elseif($i==9){$j=9; $mn='SEP'; $Y=$FD;}elseif($i==10){$j=10; $mn='OCT'; $Y=$FD;}elseif($i==11){$j=11; $mn='NOV'; $Y=$FD;}elseif($i==12){$j=12; $mn='DEC'; $Y=$FD;}elseif($i==13){$j=01; $mn='JAN'; $Y=$TD;}elseif($i==14){$j=02; $mn='FEB'; $Y=$TD;}elseif($i==15){$j=03; $mn='MAR'; $Y=$TD;} 

$sql=mysql_query("select * from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID where g.DateConfirmationYN='Y' AND g.ConfirmHR='Y' AND DateConfirmation between '".$Y."-".$j."-01' AND '".$Y."-".$j."-31' AND e.CompanyId=".$CompanyId." ",$con); $row=mysql_num_rows($sql);
 ?>
<tr id="TR<?php echo $j; ?>">
   <td align="center"><input type="checkbox" id="Chk<?php echo $j; ?>" onClick="FucChk(<?php echo $j; ?>)" /></td> 
   <td align="center" class="font1"><?php echo $j; ?></td>
   <td align="" class="font1">&nbsp;<?php echo $mn; if($j>=4 && $j<=12){echo ' - '.$FD;}elseif($j>=1 && $j<=3){echo ' - '.$TD;} ?></td>
   <td class="font1" align="center"><font color="red"><?php echo $row; ?></font></td>
   <td class="font1" valign="top"><?php $sqle=mysql_query("select EmpCode,Fname,Sname,Lname,DateConfirmation from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID where e.CompanyId=".$CompanyId." AND g.DateConfirmationYN='Y' AND g.ConfirmHR='Y' AND DateConfirmation between '".$Y."-".$j."-01' AND '".$Y."-".$j."-31' order by e.EmpCode asc",$con); $rowe=mysql_num_rows($sqle); $rowee=$rowe-1; $k=1; while($re=mysql_fetch_assoc($sqle)){ echo '<b>'.$re['EmpCode'].'</b>-'.$re['Fname'].' '.$re['Sname'].' '.$re['Lname'].' /<font color="red"> ('.date("d-M-y",strtotime($re['DateConfirmation'])).')</font>'; if($rowee>=$k){echo ',&nbsp;&nbsp;';} $k++; } ?> </td>
</tr>
<?php } ?>

<?php } ?>
	 </table>
	  </td>
    </tr>
  </table>  
</td>
<?php //************************** Close Department***********************************?>    
 </tr>
<?php } ?> 
</table>
<?php //**************************************************************************************?>
<?php //*************END*****END*****END******END******END***********************************?>
<?php //**************************************************************************************?>
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