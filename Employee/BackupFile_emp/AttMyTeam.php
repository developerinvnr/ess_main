<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>

<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:250px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:13px; height:10px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.cell {color:#FFFFFF;font-family:Times New Roman;font-size:14px;font-weight:bold;} 
.cell2 {color:#000;font-family:Times New Roman;font-size:14px;} .cell3 {color:#030303;font-family:Times New Roman;font-size:14px; font-weight:bold;} 
.cellOpe {color:#FFFFFF;font-family:Times New Roman; height:20px; font-size:14px; font-weight:bold;}
.cellOpe2 {color:#000;font-family:Times New Roman; height:20px; font-size:14px; font-weight:bold;}
.cellOpe3 {color:#000;font-family:Times New Roman; width:30px;height:20px; font-size:14px; font-weight:bold;}
</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function SelMonth(v){ var x = "AttMyTeam.php?m="+v;  window.location=x;}
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
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top">
	     <table border="0" style="width:100%; height:380px; float:none;" cellpadding="0">
		  <tr>
		   <td valign="top"> 
		   
<?php //*************************************************************************************************************************************************** ?>	   
		     <table border="0" id="Activity">
			  <tr>
				  <td align="left" width="850" valign="top">
	     <table border="0" width="1000">
		    <tr>
			 <td colspan="10"><table border="0"><tr>
			 <?php if($rowApp>0) { ?>
             <td align="center"><a href="AttMyTeam.php?m=<?php echo date("m"); ?>&Y=<?php echo date("Y"); ?>"><img id="Img_RepMgr1" style="display:none;" src="images/RepMgr1.png" border="0"/></a>
		     <img id="Img_RepMgr" style="display:block;" src="images/RepMgr.png" border="0"/></td><?php } ?>
			 <?php if($rowHod>0) { ?>
             <td align="center"><a href="AttHodMyTeam.php?m=<?php echo date("m"); ?>&Y=<?php echo date("Y"); ?>"><img id="Img_Hod1" style="display:block;" src="images/RevHod1.png" border="0"/></a>
		     <img id="Img_Hod" style="display:none;" src="images/RevHod.png" border="0"/></td><?php } ?>
			 <td>&nbsp;</td>
			 <td style="width:300px;font-family:Times New Roman; font-size:20px;" valign="top">&nbsp;<b><i><u>My Team Attendance Reports</u></i></b></td>
			 <td>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#000000" style='font-family:Times New Roman;' size="3">
		  <b>Month :&nbsp;</font>
<?php if($_REQUEST['m']==1){$SelM='January';} if($_REQUEST['m']==2){$SelM='February';} if($_REQUEST['m']==3){$SelM='March';}if($_REQUEST['m']==4){$SelM='April';} 
if($_REQUEST['m']==5){$SelM='May';} if($_REQUEST['m']==6){$SelM='June';} if($_REQUEST['m']==7){$SelM='July';} if($_REQUEST['m']==8){$SelM='August';} 
if($_REQUEST['m']==9){$SelM='September';} if($_REQUEST['m']==10){$SelM='October';} if($_REQUEST['m']==11){$SelM='November';} if($_REQUEST['m']==12){$SelM='December';} ?>			
<select style="font-family:Times New Roman; font-size:14px; width:90px;" onChange="SelMonth(this.value)">
<option value="" selected>Select</option>
<?php if(date("m")==1) { ?><option value="1">January</option><option value="12">Last Month</option><?php } ?>
<?php if(date("m")==2) { ?><option value="2">February</option><option value="1">Last Month</option><?php } ?>			
<?php if(date("m")==3) { ?><option value="3">March</option><option value="2">Last Month</option><?php } ?>	
<?php if(date("m")==4) { ?><option value="4">April</option><option value="3">Last Month</option><?php } ?>					
<?php if(date("m")==5) { ?><option value="5">May</option><option value="4">Last Month</option><?php } ?>	
<?php if(date("m")==6) { ?><option value="6">June</option><option value="5">Last Month</option><?php } ?>	
<?php if(date("m")==7) { ?><option value="7">July</option><option value="6">Last Month</option><?php } ?>	
<?php if(date("m")==8) { ?><option value="8">August</option><option value="7">Last Month</option><?php } ?>	
<?php if(date("m")==9) { ?><option value="9">September</option><option value="8">Last Month</option><?php } ?>	
<?php if(date("m")==10) { ?><option value="10">October</option><option value="9">Last Month</option><?php } ?>	
<?php if(date("m")==11) { ?><option value="11">November</option><option value="10">Last Month</option><?php } ?>	
<?php if(date("m")==12) { ?><option value="12">December</option><option value="11">Last Month</option><?php } ?>	
</select></td>
			 </tr></table></td>
			</tr>
            <tr>
	  <td style="width:700px;">
<table border="1" style="width:700px;">
<?php //*********************************************** Open ****************************************************** ?> 
<td align="left" id="type" valign="top" width="100%">             
<form method="post" name="FormAtt" onSubmit="return validate(this)">
<?php 
if(date("m")==1 AND $_REQUEST['m']==12){$Y=date("Y")-1;}else{$Y=date("Y");}
if($_REQUEST['m']==1){ $day=31;} 
elseif($_REQUEST['m']==2){ if(date("Y")==2012 OR date("Y")==2016 OR date("Y")==2020 OR date("Y")==2024 OR date("Y")==2028 OR date("Y")==2032 OR date("Y")==2036 OR date("Y")==2040){$day=29;}                      else { $day=28;}}
elseif($_REQUEST['m']==3){ $day=31;} elseif($_REQUEST['m']==4){ $day=30;} elseif($_REQUEST['m']==5){ $day=31;} elseif($_REQUEST['m']==6){ $day=30;} 
elseif($_REQUEST['m']==7){ $day=31;} elseif($_REQUEST['m']==8){ $day=31;} elseif($_REQUEST['m']==9){ $day=30;} elseif($_REQUEST['m']==10){ $day=31;} 
elseif($_REQUEST['m']==11){ $day=30;} elseif($_REQUEST['m']==12){ $day=31;}

$m=$_REQUEST['m']; 
?> 
   <table border="0" cellpadding="0" cellspacing="0">
     <tr><td width="1800">
	   <table border="1" cellpadding="0" cellspacing="0" width="1800" style="margin-top:opx;">
	     <tr>	 
<td style="background-color:#7a6189;color:#FFFFFF;font-family:Times New Roman; width:30px; font-size:13px;" align="center"><b>EC</b></td>
<td style="background-color:#7a6189;color:#FFFFFF;font-family:Times New Roman; width:150px; font-size:13px;" align="center"><b>Name</b></td>
<td style="background-color:#7a6189;color:#FFFFFF;font-family:Times New Roman; width:100px; font-size:13px;" align="center"><b>Function</b></td>
<?php /*
<td style="background-color:#7a6189;color:#FFFFFF;font-family:Times New Roman; width:200px; font-size:13px;" align="center"><b>Designation</b></td>
*/?>
<td style="background-color:#7a6189;color:#FFFFFF;font-family:Times New Roman; width:1020px; font-size:14px;" align="">&nbsp;<b>Month :</b>&nbsp;
<font style="font:Times New Roman; color:#EAEF18; font-size:14px; background-color:#7a6189; font-weight:bold;"><?php echo $SelM; ?></font></td>
<td style="background-color:#7a6189;color:#FFFFFF;font-family:Times New Roman; width:175px; font-size:14px;" align="center"><b>Total</b></td>
<?php /* <td style="background-color:#7a6189;color:#FFFFFF;font-family:Times New Roman; width:35px; font-size:14px;" align="center"><b>Paid</b></td> */ ?>
	     </tr>
	   </table>
	    </td></tr>
		
		<tr><td width="1800"> 
	   <table border="1" cellpadding="0" cellspacing="0" width="1800">
	     <tr>
<td style="background-color:#7a6189;color:#FFF;font-family:Times New Roman; width:30px; font-size:13px;" align="center">&nbsp;</td>
<td style="background-color:#7a6189;color:#FFF;font-family:Times New Roman; width:150px; font-size:13px;"align="center">&nbsp;</td>		
<td style="background-color:#7a6189;color:#FFF;font-family:Times New Roman; width:100px; font-size:13px;"align="center">&nbsp;</td>	
<?php /*<td style="background-color:#7a6189;color:#FFF;font-family:Times New Roman; width:200px; font-size:13px;"align="center">&nbsp;</td>*/?>	 
<td style="background-color:#7a6189;color:#FFF;font-family:Times New Roman; width:1020px; font-size:14px;" align="left">
<table border="1">
 <tr>
<?php $id=$_REQUEST['m']; //$Y=$_REQUEST['Y']; ?>
<?php if($id==1){ for($i=1; $i<=31; $i++) { ?> 
      <td align="center" class="cell" style="background-color:<?php if(date("w",strtotime(date($Y.'-'.$id.'-'.$i)))==0){echo '#009100';}else{echo '#7a6189';}?>;color:#FFF;font-weight:bold;" width="30"><?php echo $i; ?></td><?php } } ?>
<?php if($id==2){ if($Y==2012 OR $Y==2016 OR $Y==2020 OR $Y==2024 OR $Y==2028 OR $Y==2032 OR $Y==2036 OR $Y==2040) { $day=29; } else { $day=28;} for($i=1; $i<=$day; $i++) {?>
      <td align="center" class="cell" style="background-color:<?php if(date("w",strtotime(date($Y.'-'.$id.'-'.$i)))==0){echo '#009100';}else{echo '#7a6189';}?>;color:#FFF;font-weight:bold;" width="30"><?php echo $i; ?></td><?php } } ?>
<?php if($id==3){ for($i=1; $i<=31; $i++) {?>
      <td align="center" class="cell" style="background-color:<?php if(date("w",strtotime(date($Y.'-'.$id.'-'.$i)))==0){echo '#009100';}else{echo '#7a6189';}?>;color:#FFF;font-weight:bold;" width="30"><?php echo $i; ?></td><?php } } ?>
<?php if($id==4){ for($i=1; $i<=30; $i++) {?>
      <td align="center" class="cell" style="background-color:<?php if(date("w",strtotime(date($Y.'-'.$id.'-'.$i)))==0){echo '#009100';}else{echo '#7a6189';}?>;color:#FFF;font-weight:bold;" width="30"><?php echo $i; ?></td><?php } } ?>
<?php if($id==5){ for($i=1; $i<=31; $i++) {?>
      <td align="center" class="cell" style="background-color:<?php if(date("w",strtotime(date($Y.'-'.$id.'-'.$i)))==0){echo '#009100';}else{echo '#7a6189';}?>;color:#FFF;font-weight:bold;" width="30"><?php echo $i; ?></td><?php } } ?>
<?php if($id==6){ for($i=1; $i<=30; $i++) {?>
      <td align="center" class="cell" style="background-color:<?php if(date("w",strtotime(date($Y.'-'.$id.'-'.$i)))==0){echo '#009100';}else{echo '#7a6189';}?>;color:#FFF;" width="45"><?php echo $i; ?></td><?php } } ?>
<?php if($id==7){ for($i=1; $i<=31; $i++) {?>
      <td align="center" class="cell" style="background-color:<?php if(date("w",strtotime(date($Y.'-'.$id.'-'.$i)))==0){echo '#009100';}else{echo '#7a6189';}?>;color:#FFF;font-weight:bold;" width="30"><?php echo $i; ?></td><?php } } ?>
<?php if($id==8){ for($i=1; $i<=31; $i++) {?>
      <td align="center" class="cell" style="background-color:<?php if(date("w",strtotime(date($Y.'-'.$id.'-'.$i)))==0){echo '#009100';}else{echo '#7a6189';}?>;color:#FFF;" width="30"><?php echo $i; ?></td><?php } } ?>	  
<?php if($id==9){ for($i=1; $i<=30; $i++) {?>
      <td align="center" class="cell" style="background-color:<?php if(date("w",strtotime(date($Y.'-'.$id.'-'.$i)))==0){echo '#009100';}else{echo '#7a6189';}?>;color:#FFF;font-weight:bold;" width="30"><?php echo $i; ?></td><?php } } ?>
<?php if($id==10){ for($i=1; $i<=31; $i++) {?>
      <td align="center" class="cell" style="background-color:<?php if(date("w",strtotime(date($Y.'-'.$id.'-'.$i)))==0){echo '#009100';}else{echo '#7a6189';}?>;color:#FFF;font-weight:bold;" width="30"><?php echo $i; ?></td><?php } } ?>
<?php if($id==11){ for($i=1; $i<=30; $i++) {?>
      <td align="center" class="cell" style="background-color:<?php if(date("w",strtotime(date($Y.'-'.$id.'-'.$i)))==0){echo '#009100';}else{echo '#7a6189';}?>;color:#FFF;font-weight:bold;" width="30"><?php echo $i; ?></td><?php } } ?>
<?php if($id==12){ for($i=1; $i<=31; $i++) {?>
      <td align="center" class="cell" style="background-color:<?php if(date("w",strtotime(date($Y.'-'.$id.'-'.$i)))==0){echo '#009100';}else{echo '#7a6189';}?>;color:#FFF;font-weight:bold;" width="30"><?php echo $i; ?></td><?php } } ?>
 </tr>
</table>	  
</td>
<td style="background-color:#7a6189;color:#FFF;font-family:Times New Roman; width:175px; font-size:14px;" align="center">
      <table border="1"><tr><td class="cellOpe" align="center" width="35">Le</td>
	  <td class="cellOpe" align="center" width="35">Ho</td>
      <td class="cellOpe" align="center" width="35">Od</td>
	  <td class="cellOpe" align="center" width="35">Pr</td>
	  <td class="cellOpe" align="center" width="35">Ab</td></tr></table>
</td>
<?php /* <td style="background-color:#7a6189;color:#FFF;font-family:Times New Roman; width:35px; font-size:14px;" align="center">&nbsp;</td> */ ?>
	   </tr>
	   </table>
	    </td></tr>
		
		<tr><td style="width:1800px; font-size:14px;" align="left"> 
		
<?php  ////////////////////////////////////////////////////////////_TABLE_1_Open //////////////////////////////////////////////////////////////////////// ?> 

<table  border="1" bgcolor="#FFFFFF" cellpadding="0" cellspacing="0" width="1800" id="table_1" style="display:inline-table;"> 
<?php $SqlEmp=mysql_query("SELECT hrm_employee.EmployeeID,DepartmentId,DesigId,EmpCode,Fname,Sname,Lname,Married,Gender,DR FROM hrm_employee_reporting INNER JOIN hrm_employee ON hrm_employee_reporting.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_reporting.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_reporting.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee_reporting.AppraiserId=".$EmployeeId." AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." order by EmpCode ASC", $con); $Sno=1; while($ResEmp=mysql_fetch_array($SqlEmp)) { 
if($ResEmp['DR']=='Y'){$MS='Dr.';} elseif($ResEmp['Gender']=='M'){$MS='Mr.';} elseif($ResEmp['Gender']=='F' AND $ResEmp['Married']=='Y'){$MS='Mrs.';} elseif($ResEmp['Gender']=='F' AND $ResEmp['Married']=='N'){$MS='Miss.';}  $Ename=$ResEmp['Fname'].' '.$ResEmp['Sname'].' '.$ResEmp['Lname'];  $month=$_REQUEST['m'];
$SqlDept=mysql_query("select DepartmentCode,FunName from hrm_department where DepartmentId=".$ResEmp['DepartmentId'], $con); $ResDept=mysql_fetch_assoc($SqlDept);	
$SqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$ResEmp['DesigId'], $con); $ResDesig=mysql_fetch_assoc($SqlDesig);
?> 	
<tr>
<td style="color:#000;font-family:Times New Roman; width:30px;font-size:12px;height:20px;" align="center" valign="top">&nbsp;<?php echo $ResEmp['EmpCode']; ?></td>
<td style="color:#000;font-family:Times New Roman; width:150px;font-size:12px;height:20px;" valign="top">&nbsp;<?php echo strtoupper($Ename); ?>
<input type="hidden" name="EmpId" id="EmpId" value="<?php echo $ResEmp['EmployeeID']; ?>" />
</td>
<td style="color:#000;font-family:Times New Roman; width:100px;font-size:12px;height:20px;" align="" valign="top">&nbsp;<?php echo $ResDept['FunName']; ?></td>
<?php /*
<td style="color:#000;font-family:Times New Roman; width:200px;font-size:12px;height:20px;" align="" valign="top">&nbsp;<?php echo $ResDesig['DesigName']; ?></td>
*/?>
<td style="color:#000;font-family:Times New Roman; width:1020px; font-size:14px;" align="left">
<table border="1">
 <tr> 
<?php if($month==1){ for($i=1; $i<=31; $i++) { $SqlEmp2=mysql_query("SELECT * FROM hrm_employee_attendance WHERE EmployeeID =".$ResEmp['EmployeeID']." AND AttDate='".date($Y."-".$month."-".$i)."'", $con); $ResEmp2=mysql_fetch_array($SqlEmp2); ?>
<td align="center" class="cell2" <?php if(date("w",strtotime(date($Y.'-'.$month.'-'.$i)))==0) {echo 'bgcolor="#009100"';} ?> width="30" <?php if($ResEmp2['AttValue']=='HO'){echo 'bgcolor="#ADFF5B"';} elseif($ResEmp2['AttValue']=='CL' OR $ResEmp2['AttValue']=='SL' OR $ResEmp2['AttValue']=='PL' OR $ResEmp2['AttValue']=='EL' OR $ResEmp2['AttValue']=='CH' OR $ResEmp2['AttValue']=='SH' OR $ResEmp2['AttValue']=='FL' OR $ResEmp2['AttValue']=='TL' OR $ResEmp2['AttValue']=='ACH' OR $ResEmp2['AttValue']=='ASH' OR $ResEmp2['AttValue']=='APH'){echo 'bgcolor="#0079F2"';} elseif($ResEmp2['AttValue']=='A'){echo 'bgcolor="#FF7171"';} elseif($ResEmp2['AttValue']=='P' OR $ResEmp2['AttValue']=='WFH'){echo 'bgcolor="#FFFFFF"';} elseif($ResEmp2['AttValue']=='OD'){echo 'bgcolor="#FF80FF"';} ?> ><?php if($ResEmp2['AttValue']==''){echo '&nbsp;';} else {echo $ResEmp2['AttValue'];} ?></td><?php } } ?>

<?php if($month==2){ if($Y==2012 OR $Y==2016 OR $Y==2020 OR $Y==2024 OR $Y==2028 OR $Y==2032 OR $Y==2036 OR $Y==2040) { $day=29; } else { $day=28;} for($i=1; $i<=$day; $i++) { $SqlEmp2=mysql_query("SELECT * FROM hrm_employee_attendance WHERE EmployeeID =".$ResEmp['EmployeeID']." AND AttDate='".date($Y."-".$month."-".$i)."'", $con); $ResEmp2=mysql_fetch_array($SqlEmp2); ?><td align="center" class="cell2" <?php if(date("w",strtotime(date($Y.'-'.$month.'-'.$i)))==0) {echo 'bgcolor="#009100"';} ?> width="30" <?php if($ResEmp2['AttValue']=='HO'){echo 'bgcolor="#ADFF5B"';} elseif($ResEmp2['AttValue']=='CL' OR $ResEmp2['AttValue']=='SL' OR $ResEmp2['AttValue']=='PL' OR $ResEmp2['AttValue']=='EL' OR $ResEmp2['AttValue']=='CH' OR $ResEmp2['AttValue']=='SH' OR $ResEmp2['AttValue']=='FL' OR $ResEmp2['AttValue']=='TL' OR $ResEmp2['AttValue']=='ACH' OR $ResEmp2['AttValue']=='ASH' OR $ResEmp2['AttValue']=='APH'){echo 'bgcolor="#0079F2"';} elseif($ResEmp2['AttValue']=='A'){echo 'bgcolor="#FF7171"';} elseif($ResEmp2['AttValue']=='P' OR $ResEmp2['AttValue']=='WFH'){echo 'bgcolor="#FFFFFF"';} elseif($ResEmp2['AttValue']=='OD'){echo 'bgcolor="#FF80FF"';} ?> ><?php if($ResEmp2['AttValue']==''){echo '&nbsp;';} else {echo $ResEmp2['AttValue'];} ?></td><?php } } ?>

<?php if($month==3){ for($i=1; $i<=31; $i++) { $SqlEmp2=mysql_query("SELECT * FROM hrm_employee_attendance WHERE EmployeeID =".$ResEmp['EmployeeID']." AND AttDate='".date($Y."-".$month."-".$i)."'", $con); $ResEmp2=mysql_fetch_array($SqlEmp2); ?><td align="center" class="cell2" <?php if(date("w",strtotime(date($Y.'-'.$month.'-'.$i)))==0) {echo 'bgcolor="#009100"';} ?> width="30" <?php if($ResEmp2['AttValue']=='HO'){echo 'bgcolor="#ADFF5B"';} elseif($ResEmp2['AttValue']=='CL' OR $ResEmp2['AttValue']=='SL' OR $ResEmp2['AttValue']=='PL' OR $ResEmp2['AttValue']=='EL' OR $ResEmp2['AttValue']=='CH' OR $ResEmp2['AttValue']=='SH' OR $ResEmp2['AttValue']=='FL' OR $ResEmp2['AttValue']=='TL' OR $ResEmp2['AttValue']=='ACH' OR $ResEmp2['AttValue']=='ASH' OR $ResEmp2['AttValue']=='APH'){echo 'bgcolor="#0079F2"';} elseif($ResEmp2['AttValue']=='A'){echo 'bgcolor="#FF7171"';} elseif($ResEmp2['AttValue']=='P' OR $ResEmp2['AttValue']=='WFH'){echo 'bgcolor="#FFFFFF"';} elseif($ResEmp2['AttValue']=='OD'){echo 'bgcolor="#FF80FF"';} ?> ><?php if($ResEmp2['AttValue']==''){echo '&nbsp;';} else {echo $ResEmp2['AttValue'];} ?></td><?php } } ?>

<?php if($month==4){ for($i=1; $i<=30; $i++) { $SqlEmp2=mysql_query("SELECT * FROM hrm_employee_attendance WHERE EmployeeID =".$ResEmp['EmployeeID']." AND AttDate='".date($Y."-".$month."-".$i)."'", $con); $ResEmp2=mysql_fetch_array($SqlEmp2); ?><td align="center" class="cell2" <?php if(date("w",strtotime(date($Y.'-'.$month.'-'.$i)))==0) {echo 'bgcolor="#009100"';} ?> width="30" <?php if($ResEmp2['AttValue']=='HO'){echo 'bgcolor="#ADFF5B"';} elseif($ResEmp2['AttValue']=='CL' OR $ResEmp2['AttValue']=='SL' OR $ResEmp2['AttValue']=='PL' OR $ResEmp2['AttValue']=='EL' OR $ResEmp2['AttValue']=='CH' OR $ResEmp2['AttValue']=='SH' OR $ResEmp2['AttValue']=='FL' OR $ResEmp2['AttValue']=='TL' OR $ResEmp2['AttValue']=='ACH' OR $ResEmp2['AttValue']=='ASH' OR $ResEmp2['AttValue']=='APH'){echo 'bgcolor="#0079F2"';} elseif($ResEmp2['AttValue']=='A'){echo 'bgcolor="#FF7171"';} elseif($ResEmp2['AttValue']=='P' OR $ResEmp2['AttValue']=='WFH'){echo 'bgcolor="#FFFFFF"';} elseif($ResEmp2['AttValue']=='OD'){echo 'bgcolor="#FF80FF"';} ?> ><?php if($ResEmp2['AttValue']==''){echo '&nbsp;';} else {echo $ResEmp2['AttValue'];} ?></td><?php } } ?>

<?php if($month==5){ for($i=1; $i<=31; $i++) { $SqlEmp2=mysql_query("SELECT * FROM hrm_employee_attendance WHERE EmployeeID =".$ResEmp['EmployeeID']." AND AttDate='".date($Y."-".$month."-".$i)."'", $con); $ResEmp2=mysql_fetch_array($SqlEmp2); ?><td align="center" class="cell2" <?php if(date("w",strtotime(date($Y.'-'.$month.'-'.$i)))==0) {echo 'bgcolor="#009100"';} ?> width="30" <?php if($ResEmp2['AttValue']=='HO'){echo 'bgcolor="#ADFF5B"';} elseif($ResEmp2['AttValue']=='CL' OR $ResEmp2['AttValue']=='SL' OR $ResEmp2['AttValue']=='PL' OR $ResEmp2['AttValue']=='EL' OR $ResEmp2['AttValue']=='CH' OR $ResEmp2['AttValue']=='SH' OR $ResEmp2['AttValue']=='FL' OR $ResEmp2['AttValue']=='TL' OR $ResEmp2['AttValue']=='ACH' OR $ResEmp2['AttValue']=='ASH' OR $ResEmp2['AttValue']=='APH'){echo 'bgcolor="#0079F2"';} elseif($ResEmp2['AttValue']=='A'){echo 'bgcolor="#FF7171"';} elseif($ResEmp2['AttValue']=='P' OR $ResEmp2['AttValue']=='WFH'){echo 'bgcolor="#FFFFFF"';} elseif($ResEmp2['AttValue']=='OD'){echo 'bgcolor="#FF80FF"';} ?> ><?php if($ResEmp2['AttValue']==''){echo '&nbsp;';} else {echo $ResEmp2['AttValue'];} ?></td><?php } } ?>

<?php if($month==6){ for($i=1; $i<=30; $i++) { $SqlEmp2=mysql_query("SELECT * FROM hrm_employee_attendance WHERE EmployeeID =".$ResEmp['EmployeeID']." AND AttDate='".date($Y."-".$month."-".$i)."'", $con); $ResEmp2=mysql_fetch_array($SqlEmp2); ?><td align="center" class="cell2" <?php if(date("w",strtotime(date($Y.'-'.$month.'-'.$i)))==0) {echo 'bgcolor="#009100"';} ?> width="30" <?php if($ResEmp2['AttValue']=='HO'){echo 'bgcolor="#ADFF5B"';} elseif($ResEmp2['AttValue']=='CL' OR $ResEmp2['AttValue']=='SL' OR $ResEmp2['AttValue']=='PL' OR $ResEmp2['AttValue']=='EL' OR $ResEmp2['AttValue']=='CH' OR $ResEmp2['AttValue']=='SH' OR $ResEmp2['AttValue']=='FL' OR $ResEmp2['AttValue']=='TL' OR $ResEmp2['AttValue']=='ACH' OR $ResEmp2['AttValue']=='ASH' OR $ResEmp2['AttValue']=='APH'){echo 'bgcolor="#0079F2"';} elseif($ResEmp2['AttValue']=='A'){echo 'bgcolor="#FF7171"';} elseif($ResEmp2['AttValue']=='P' OR $ResEmp2['AttValue']=='WFH'){echo 'bgcolor="#FFFFFF"';} elseif($ResEmp2['AttValue']=='OD'){echo 'bgcolor="#FF80FF"';} ?> ><?php if($ResEmp2['AttValue']==''){echo '&nbsp;';} else {echo $ResEmp2['AttValue'];} ?></td><?php } } ?>

<?php if($month==7){ for($i=1; $i<=31; $i++) { $SqlEmp2=mysql_query("SELECT * FROM hrm_employee_attendance WHERE EmployeeID =".$ResEmp['EmployeeID']." AND AttDate='".date($Y."-".$month."-".$i)."'", $con); $ResEmp2=mysql_fetch_array($SqlEmp2); ?><td align="center" class="cell2" <?php if(date("w",strtotime(date($Y.'-'.$month.'-'.$i)))==0) {echo 'bgcolor="#009100"';} ?> width="30" <?php if($ResEmp2['AttValue']=='HO'){echo 'bgcolor="#ADFF5B"';} elseif($ResEmp2['AttValue']=='CL' OR $ResEmp2['AttValue']=='SL' OR $ResEmp2['AttValue']=='PL' OR $ResEmp2['AttValue']=='EL' OR $ResEmp2['AttValue']=='CH' OR $ResEmp2['AttValue']=='SH' OR $ResEmp2['AttValue']=='FL' OR $ResEmp2['AttValue']=='TL' OR $ResEmp2['AttValue']=='ACH' OR $ResEmp2['AttValue']=='ASH' OR $ResEmp2['AttValue']=='APH'){echo 'bgcolor="#0079F2"';} elseif($ResEmp2['AttValue']=='A'){echo 'bgcolor="#FF7171"';} elseif($ResEmp2['AttValue']=='P' OR $ResEmp2['AttValue']=='WFH'){echo 'bgcolor="#FFFFFF"';} elseif($ResEmp2['AttValue']=='OD'){echo 'bgcolor="#FF80FF"';} ?> ><?php if($ResEmp2['AttValue']==''){echo '&nbsp;';} else {echo $ResEmp2['AttValue'];} ?></td><?php } } ?>

<?php if($month==8){ for($i=1; $i<=31; $i++) { $SqlEmp2=mysql_query("SELECT * FROM hrm_employee_attendance WHERE EmployeeID =".$ResEmp['EmployeeID']." AND AttDate='".date($Y."-".$month."-".$i)."'", $con); $ResEmp2=mysql_fetch_array($SqlEmp2); ?><td align="center" class="cell2" <?php if(date("w",strtotime(date($Y.'-'.$month.'-'.$i)))==0) {echo 'bgcolor="#009100"';} ?> width="30" <?php if($ResEmp2['AttValue']=='HO'){echo 'bgcolor="#ADFF5B"';} elseif($ResEmp2['AttValue']=='CL' OR $ResEmp2['AttValue']=='SL' OR $ResEmp2['AttValue']=='PL' OR $ResEmp2['AttValue']=='EL' OR $ResEmp2['AttValue']=='CH' OR $ResEmp2['AttValue']=='SH' OR $ResEmp2['AttValue']=='FL' OR $ResEmp2['AttValue']=='TL' OR $ResEmp2['AttValue']=='ACH' OR $ResEmp2['AttValue']=='ASH' OR $ResEmp2['AttValue']=='APH'){echo 'bgcolor="#0079F2"';} elseif($ResEmp2['AttValue']=='A'){echo 'bgcolor="#FF7171"';} elseif($ResEmp2['AttValue']=='P' OR $ResEmp2['AttValue']=='WFH'){echo 'bgcolor="#FFFFFF"';} elseif($ResEmp2['AttValue']=='OD'){echo 'bgcolor="#FF80FF"';} ?> ><?php if($ResEmp2['AttValue']==''){echo '&nbsp;';} else {echo $ResEmp2['AttValue'];} ?></td><?php } } ?>

<?php if($month==9){ for($i=1; $i<=30; $i++) { $SqlEmp2=mysql_query("SELECT * FROM hrm_employee_attendance WHERE EmployeeID =".$ResEmp['EmployeeID']." AND AttDate='".date($Y."-".$month."-".$i)."'", $con); $ResEmp2=mysql_fetch_array($SqlEmp2); ?><td align="center" class="cell2" <?php if(date("w",strtotime(date($Y.'-'.$month.'-'.$i)))==0) {echo 'bgcolor="#009100"';} ?> width="30" <?php if($ResEmp2['AttValue']=='HO'){echo 'bgcolor="#ADFF5B"';} elseif($ResEmp2['AttValue']=='CL' OR $ResEmp2['AttValue']=='SL' OR $ResEmp2['AttValue']=='PL' OR $ResEmp2['AttValue']=='EL' OR $ResEmp2['AttValue']=='CH' OR $ResEmp2['AttValue']=='SH' OR $ResEmp2['AttValue']=='FL' OR $ResEmp2['AttValue']=='TL' OR $ResEmp2['AttValue']=='ACH' OR $ResEmp2['AttValue']=='ASH' OR $ResEmp2['AttValue']=='APH'){echo 'bgcolor="#0079F2"';} elseif($ResEmp2['AttValue']=='A'){echo 'bgcolor="#FF7171"';} elseif($ResEmp2['AttValue']=='P' OR $ResEmp2['AttValue']=='WFH'){echo 'bgcolor="#FFFFFF"';} elseif($ResEmp2['AttValue']=='OD'){echo 'bgcolor="#FF80FF"';} ?> ><?php if($ResEmp2['AttValue']==''){echo '&nbsp;';} else {echo $ResEmp2['AttValue'];} ?></td><?php } } ?>

<?php if($month==10){ for($i=1; $i<=31; $i++) { $SqlEmp2=mysql_query("SELECT * FROM hrm_employee_attendance WHERE EmployeeID =".$ResEmp['EmployeeID']." AND AttDate='".date($Y."-".$month."-".$i)."'", $con); $ResEmp2=mysql_fetch_array($SqlEmp2); ?><td align="center" class="cell2" <?php if(date("w",strtotime(date($Y.'-'.$month.'-'.$i)))==0) {echo 'bgcolor="#009100"';} ?> width="30" <?php if($ResEmp2['AttValue']=='HO'){echo 'bgcolor="#ADFF5B"';} elseif($ResEmp2['AttValue']=='CL' OR $ResEmp2['AttValue']=='SL' OR $ResEmp2['AttValue']=='PL' OR $ResEmp2['AttValue']=='EL' OR $ResEmp2['AttValue']=='CH' OR $ResEmp2['AttValue']=='SH' OR $ResEmp2['AttValue']=='FL' OR $ResEmp2['AttValue']=='TL' OR $ResEmp2['AttValue']=='ACH' OR $ResEmp2['AttValue']=='ASH' OR $ResEmp2['AttValue']=='APH'){echo 'bgcolor="#0079F2"';} elseif($ResEmp2['AttValue']=='A'){echo 'bgcolor="#FF7171"';} elseif($ResEmp2['AttValue']=='P' OR $ResEmp2['AttValue']=='WFH'){echo 'bgcolor="#FFFFFF"';} elseif($ResEmp2['AttValue']=='OD'){echo 'bgcolor="#FF80FF"';} ?> ><?php if($ResEmp2['AttValue']==''){echo '&nbsp;';} else {echo $ResEmp2['AttValue'];} ?></td><?php } } ?>

<?php if($month==11){ for($i=1; $i<=30; $i++) { $SqlEmp2=mysql_query("SELECT * FROM hrm_employee_attendance WHERE EmployeeID =".$ResEmp['EmployeeID']." AND AttDate='".date($Y."-".$month."-".$i)."'", $con); $ResEmp2=mysql_fetch_array($SqlEmp2); ?><td align="center" class="cell2" <?php if(date("w",strtotime(date($Y.'-'.$month.'-'.$i)))==0) {echo 'bgcolor="#009100"';} ?> width="30" <?php if($ResEmp2['AttValue']=='HO'){echo 'bgcolor="#ADFF5B"';} elseif($ResEmp2['AttValue']=='CL' OR $ResEmp2['AttValue']=='SL' OR $ResEmp2['AttValue']=='PL' OR $ResEmp2['AttValue']=='EL' OR $ResEmp2['AttValue']=='CH' OR $ResEmp2['AttValue']=='SH' OR $ResEmp2['AttValue']=='FL' OR $ResEmp2['AttValue']=='TL' OR $ResEmp2['AttValue']=='ACH' OR $ResEmp2['AttValue']=='ASH' OR $ResEmp2['AttValue']=='APH'){echo 'bgcolor="#0079F2"';} elseif($ResEmp2['AttValue']=='A'){echo 'bgcolor="#FF7171"';} elseif($ResEmp2['AttValue']=='P' OR $ResEmp2['AttValue']=='WFH'){echo 'bgcolor="#FFFFFF"';} elseif($ResEmp2['AttValue']=='OD'){echo 'bgcolor="#FF80FF"';} ?> ><?php if($ResEmp2['AttValue']==''){echo '&nbsp;';} else {echo $ResEmp2['AttValue'];} ?></td><?php } } ?>

<?php if($month==12){ for($i=1; $i<=31; $i++) { $SqlEmp2=mysql_query("SELECT * FROM hrm_employee_attendance WHERE EmployeeID =".$ResEmp['EmployeeID']." AND AttDate='".date($Y."-".$month."-".$i)."'", $con); $ResEmp2=mysql_fetch_array($SqlEmp2); ?><td align="center" class="cell2" <?php if(date("w",strtotime(date($Y.'-'.$month.'-'.$i)))==0) {echo 'bgcolor="#009100"';} ?> width="30" <?php if($ResEmp2['AttValue']=='HO'){echo 'bgcolor="#ADFF5B"';} elseif($ResEmp2['AttValue']=='CL' OR $ResEmp2['AttValue']=='SL' OR $ResEmp2['AttValue']=='PL' OR $ResEmp2['AttValue']=='EL' OR $ResEmp2['AttValue']=='CH' OR $ResEmp2['AttValue']=='SH' OR $ResEmp2['AttValue']=='FL' OR $ResEmp2['AttValue']=='TL' OR $ResEmp2['AttValue']=='ACH' OR $ResEmp2['AttValue']=='ASH' OR $ResEmp2['AttValue']=='APH'){echo 'bgcolor="#0079F2"';} elseif($ResEmp2['AttValue']=='A'){echo 'bgcolor="#FF7171"';} elseif($ResEmp2['AttValue']=='P' OR $ResEmp2['AttValue']=='WFH'){echo 'bgcolor="#FFFFFF"';} elseif($ResEmp2['AttValue']=='OD'){echo 'bgcolor="#FF80FF"';} ?> ><?php if($ResEmp2['AttValue']==''){echo '&nbsp;';} else {echo $ResEmp2['AttValue'];} ?></td><?php } } ?>  
 </tr>
</table>
</td>
<td style="color:#FFF;font-family:Times New Roman; width:175px; font-size:14px;" align="center">
<?php
      $SqlCL=mysql_query("select count(AttValue)as CL from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$ResEmp['EmployeeID']." AND (AttDate between '".date($Y."-".$month."-1")."' AND '".date($Y."-".$month."-31")."')", $con);
	   $SqlCH=mysql_query("select count(AttValue)as CH from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$ResEmp['EmployeeID']." AND (AttDate between '".date($Y."-".$month."-1")."' AND '".date($Y."-".$month."-31")."')", $con);
	   $SqlSL=mysql_query("select count(AttValue)as SL from hrm_employee_attendance where AttValue='SL' AND EmployeeID=".$ResEmp['EmployeeID']." AND (AttDate between '".date($Y."-".$month."-1")."' AND '".date($Y."-".$month."-31")."')", $con);
	   $SqlSH=mysql_query("select count(AttValue)as SH from hrm_employee_attendance where AttValue='SH' AND EmployeeID=".$ResEmp['EmployeeID']." AND (AttDate between '".date($Y."-".$month."-1")."' AND '".date($Y."-".$month."-31")."')", $con);
	   $SqlPH=mysql_query("select count(AttValue)as PH from hrm_employee_attendance where AttValue='PH' AND EmployeeID=".$ResEmp['EmployeeID']." AND (AttDate between '".date($Y."-".$month."-1")."' AND '".date($Y."-".$month."-31")."')", $con);
	   $SqlPL=mysql_query("select count(AttValue)as PL from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$ResEmp['EmployeeID']." AND (AttDate between '".date($Y."-".$month."-1")."' AND '".date($Y."-".$month."-31")."')", $con);
	   $SqlEL=mysql_query("select count(AttValue)as EL from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$ResEmp['EmployeeID']." AND (AttDate between '".date($Y."-".$month."-1")."' AND '".date($Y."-".$month."-31")."')", $con);
	   $SqlFL=mysql_query("select count(AttValue)as FL from hrm_employee_attendance where AttValue='FL' AND EmployeeID=".$ResEmp['EmployeeID']." AND (AttDate between '".date($Y."-".$month."-1")."' AND '".date($Y."-".$month."-31")."')", $con);
	   $SqlTL=mysql_query("select count(AttValue)as TL from hrm_employee_attendance where AttValue='TL' AND EmployeeID=".$ResEmp['EmployeeID']." AND (AttDate between '".date($Y."-".$month."-1")."' AND '".date($Y."-".$month."-31")."')", $con);
	  $SqlHf=mysql_query("select count(AttValue)as Hf from hrm_employee_attendance where AttValue='HF' AND EmployeeID=".$ResEmp['EmployeeID']." AND (AttDate between '".date($Y."-".$month."-1")."' AND '".date($Y."-".$month."-31")."')", $con);
	  
	  $SqlAch=mysql_query("select count(AttValue)as ACH from hrm_employee_attendance where AttValue='ACH' AND EmployeeID=".$ResEmp['EmployeeID']." AND (AttDate between '".date($Y."-".$month."-1")."' AND '".date($Y."-".$month."-31")."')", $con);
      $SqlAsh=mysql_query("select count(AttValue)as ASH from hrm_employee_attendance where AttValue='ASH' AND EmployeeID=".$ResEmp['EmployeeID']." AND (AttDate between '".date($Y."-".$month."-1")."' AND '".date($Y."-".$month."-31")."')", $con);
      $SqlAph=mysql_query("select count(AttValue)as APH from hrm_employee_attendance where AttValue='APH' AND EmployeeID=".$ResEmp['EmployeeID']." AND (AttDate between '".date($Y."-".$month."-1")."' AND '".date($Y."-".$month."-31")."')", $con);
	  
	  $SqlPresent=mysql_query("select count(AttValue)as Present from hrm_employee_attendance where (AttValue='P' OR AttValue='WFH') AND EmployeeID=".$ResEmp['EmployeeID']." AND (AttDate between '".date($Y."-".$month."-1")."' AND '".date($Y."-".$month."-31")."')", $con);
	  $SqlAbsent=mysql_query("select count(AttValue)as Absent from hrm_employee_attendance where AttValue='A' AND EmployeeID=".$ResEmp['EmployeeID']." AND (AttDate between '".date($Y."-".$month."-1")."' AND '".date($Y."-".$month."-31")."')", $con);
	  $SqlOnDuties=mysql_query("select count(AttValue)as OnDuties from hrm_employee_attendance where AttValue='OD' AND EmployeeID=".$ResEmp['EmployeeID']." AND (AttDate between '".date($Y."-".$month."-1")."' AND '".date($Y."-".$month."-31")."')", $con);
	  $SqlHoliday=mysql_query("select count(AttValue)as Holiday from hrm_employee_attendance where AttValue='HO' AND EmployeeID=".$ResEmp['EmployeeID']." AND (AttDate between '".date($Y."-".$month."-1")."' AND '".date($Y."-".$month."-31")."')", $con); 
	  $SqlELSun=mysql_query("select count(CheckSunday)as SUN from hrm_employee_attendance where CheckSunday='Y' AND EmployeeID=".$ResEmp['EmployeeID']." AND (AttDate between '".date($Y."-".$month."-1")."' AND '".date($Y."-".$month."-31")."')", $con);
	   
   $ResCL=mysql_fetch_array($SqlCL); $ResCH=mysql_fetch_array($SqlCH); $ResSL=mysql_fetch_array($SqlSL); $ResSH=mysql_fetch_array($SqlSH); $ResPH=mysql_fetch_array($SqlPH);
   $ResPL=mysql_fetch_array($SqlPL); $ResEL=mysql_fetch_array($SqlEL); $ResFL=mysql_fetch_array($SqlFL); $ResTL=mysql_fetch_array($SqlTL); $ResHf=mysql_fetch_array($SqlHf); $ResPresent=mysql_fetch_array($SqlPresent); 
   $ResAbsent=mysql_fetch_array($SqlAbsent); $ResOnDuties=mysql_fetch_array($SqlOnDuties); $ResHoliday=mysql_fetch_array($SqlHoliday); 
   $ResELSun=mysql_fetch_array($SqlELSun);
   
   $ResAch=mysql_fetch_array($SqlAch); $ResAsh=mysql_fetch_array($SqlAsh); $ResAph=mysql_fetch_array($SqlAph);
   
   $CountCL=$ResCL['CL']; $CountCH=$ResCH['CH']/2; $CountSL=$ResSL['SL']; $CountSH=$ResSH['SH']/2; 
   $CountPH=$ResPH['PH']/2; $TotalEL=$ResEL['EL']; $TotalFL=$ResFL['FL']; $TotalTL=$ResTL['TL']; 
   
   $CountAch=$ResAch['ACH']/2; $CountAsh=$ResAsh['ASH']/2; $CountAph=$ResAph['APH']/2;
   $TotalCL=$CountCL+$CountCH+$CountAch;
   $TotalSL=$CountSL+$CountSH+$CountAsh;   
   $TotalPL=$ResPL['PL']+$CountPH+$CountAph;
   
   $TotalLeaveCount=$TotalCL+$TotalSL+$TotalPL+$TotalEL+$TotalFL+$TotalTL; 
   $TotELSun=$ResELSun['SUN'];
   $CountHf=$ResHf['Hf']/2; //$CountHf=$ResHf['Hf']/2;  
   $TotalPR=$ResPresent['Present']+$CountCH+$CountSH+$CountPH+$CountHf;  //$TotalPR=$ResPresent['Present']+$CountHf; 
   $TotalAbsent=$ResAbsent['Absent']+$CountHf+$CountAch+$CountAsh+$CountAph;
   $TotalOnDuties=$ResOnDuties['OnDuties']; $TotalHoliday=$ResHoliday['Holiday']; 
   $TotalDayWithSunEL=$TotalPR+$TotalLeaveCount+$TotalOnDuties+$TotalHoliday;
   $TotalPaidDay=$TotalDayWithSunEL-$TotELSun; 
?>

   <table border="1" cellspacing="0"><tr>
	 <td class="cellOpe2" align="center" style="background-color:#0079F2;" width="35" valign="top"><?php if($TotalLeaveCount!=''){ echo $TotalLeaveCount; } else {echo '&nbsp;';} ?></td>
	 <td class="cellOpe2" align="center" style="background-color:#ADFF5B;" width="35" valign="top"><?php if($TotalHoliday!=''){ echo $TotalHoliday; } else {echo '&nbsp;';} ?></td>
     <td class="cellOpe2" align="center" style="background-color:#FF80FF;" width="35" valign="top"><?php if($TotalOnDuties!=''){ echo $TotalOnDuties; } else {echo '&nbsp;';} ?></td>
	 <td class="cellOpe2" align="center" style="background-color:#FFFFFF;" width="35" valign="top"><?php if($TotalPR!=''){ echo $TotalPR; } else {echo '&nbsp;';} ?></td>
	 <td class="cellOpe2" align="center" style="background-color:#FF7171;" width="35" valign="top"><?php if($TotalAbsent!=''){ echo $TotalAbsent; } else {echo '&nbsp;';} ?></td>
	 </tr>
   </table>
</td>
<?php /*
<td style="color:#000;font-family:Times New Roman; width:35px; font-size:14px;height:20px; background-color:#B6F1BD; font-weight:bold;" align="center">
<?php if($resTotAtt['MonthAtt_TotPaidDay']!=''){ echo $resTotAtt['MonthAtt_TotPaidDay']; } else {echo '&nbsp;';} ?>
*/ ?>
</td>
</tr>
<?php $Sno++; } ?> 	
</table>
<?php  ////////////////////////////////////////////////////////////_TABLE_1_Close //////////////////////////////////////////////////////////////////////// ?> 		
		
		
        </td></tr>
	   </table>
	    </td>
		</tr>

   <tr>
      <td align="left" class="fontButton" style="width:100%; "><table border="0">
		<tr>
		 <td width="100">&nbsp;</td>
		 <td><table><tr>
		    <td bgcolor="#009100" width="10">&nbsp;</td><td>:</td><td class="cell">Sunday</td><td width="50">&nbsp;</td>
			<td bgcolor="#ADFF5B" width="10">&nbsp;</td><td>:</td><td class="cell">Holiday</td><td width="50">&nbsp;</td>
			<td bgcolor="#0079F2" width="10">&nbsp;</td><td>:</td><td class="cell">Leave</td><td width="50">&nbsp;</td>
			<td bgcolor="#FF7171" width="10">&nbsp;</td><td>:</td><td class="cell">Absent</td><td width="50">&nbsp;</td>
			<td bgcolor="#FFFFFF" width="10">&nbsp;</td><td>:</td><td class="cell">Present</td><td width="50">&nbsp;</td>
			<td bgcolor="#FF80FF" width="10">&nbsp;</td><td>:</td><td class="cell">Outdoor Duties </td>
		  
		 </tr></table></td>
		</tr></table>
      </td>
   </tr>
  </table>
 </form>     
</td>
<?php //*********************************************** Close ******************************************************?>   
  
</table>
		   </tr>
		</table>
	  </td>
	 </tr>		  
   </table>
 </td>
</tr> 
</table>

			
<?php //*************************************************************************************************************************************************** ?>
		   </td>
		    <td valign="top">
		    <table align="right" border="0" style="margin-top:0px; width:10%; height:380px;">
		    <tr><td align="center" valign="top" width="100">&nbsp;</td></tr>
	        </table>
		   </td>
		    <td valign="top">
		    <table align="right" border="0" style="margin-top:0px; width:10%; height:380px;"><tr><td align="center" valign="top">&nbsp;&nbsp;</td></tr></table>
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

