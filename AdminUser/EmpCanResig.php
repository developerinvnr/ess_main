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
.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:150px; height:19px; }
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<Script type="text/javascript">window.history.forward(1);</script>
<script type="text/javascript" src="js/Query.js" ></script>
<script language="javascript">
function OpenWindow(SId)
{ window.open("ResCancelReason.php?id="+SId,"leaveForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=350,height=250");}

function OpenEmpWindow(EId)
{ window.open("EmpDetailHis.php?EI="+EId,"leaveForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=800,height=500");}

function SelCancelStusHR(v,id,ui)
{ if(v=='A'){value='Accept';}else if(v=='C'){value='Reject';}
  var agree=confirm("Are you sure you want to "+value+" resignation?");
  if(agree)
  { var win=window.open("SepCancelResActHR.php?act=acthr&v="+v+"&ss=vty&cc=it@~t~1212&p=value&a=app&true=false&i="+id+"&cc=it@~t~1111!@1~ere&UI="+ui,"leaveForm","menubar=no,scrollbars=no,resizable=no,directories=no,width=608,height=250");
    var timer = setInterval( function() { if(win.closed) {  clearInterval(timer);  window.location="EmpCanResig.php?e=4e&w=234&y=10234&a=hod&e=4e2&e=4e&w=234&y=110022311&retd=ee&rr=09drfGe&S=eewwqq&wwrew=t%T@sed818&d=101"; } }, 1000);
  }
  else{return false;}
}

function OpenAppWindow(id)
{ window.open("SepCancelResActApp2.php?act=actapp&v=v&ss=vty&cc=it@~t~1212&p=value&a=app&true=false&i="+id+"&cc=it@~t~1111!@1~ere","leaveForm","menubar=no,scrollbars=no,resizable=no,directories=no,width=608,height=200");}

function OpenHodWindow(id)
{ window.open("SepCancelResActHod2.php?act=acthod&v=v&ss=vty&cc=it@~t~1212&p=value&a=app&true=false&i="+id+"&cc=it@~t~1111!@1~ere","leaveForm","menubar=no,scrollbars=no,resizable=no,directories=no,width=608,height=200");}

function OpenHRWindow(id)
{ window.open("SepCancelResActHR2.php?act=acthr&v=v&ss=vty&cc=it@~t~1212&p=value&a=app&true=false&i="+id+"&cc=it@~t~1111!@1~ere","leaveForm","menubar=no,scrollbars=no,resizable=no,directories=no,width=608,height=200");}
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
	  <td width="250" class="heading">&nbsp;Cancellation Resignation</td>
	  <td><font style="font-family:Times New Roman;color:#005500;font-size:15px; font-weight:bold;"><?php echo $Msg; ?></font></td>
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
	  <td align="left" style="width:1150px;">
		<table border="1" bgcolor="#7a6189">
		  <tr>
		   <td width="40" class="TableHead" align="center"><b>Sno</b></td>
		   <td width="50" class="TableHead" align="center"><b>EC</b></td>
		   <td width="200" class="TableHead" align="center"><b>Name</b></td>
		   <td width="100" class="TableHead" align="center"><b>Department</b></td>
		   <td width="80" class="TableHead" align="center"><b>Resignation Date</b></td>
		   <td width="80" class="TableHead" align="center"><b>Relieving Date</b></td>
		   <td width="80" class="TableHead" align="center"><b>Cancellation Date</b></td>
		   <td width="150" class="TableHead" align="center"><b>Cancellation Reason</b></td>
		   <td width="50" class="TableHead" align="center"><b>Employee Details</b></td>
		   <td width="80" class="TableHead" align="center"><b>REP</b></td>
		   <td width="80" class="TableHead" align="center"><b>HOD</b></td>
		   <td width="80" class="TableHead" align="center"><b>HR</b></td>
		   <td width="80" class="TableHead" align="center"><b>Action</b></td>  
		  </tr>
<?php $sql=mysql_query("select * from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_separation.EmployeeID where hrm_employee_separation.HR_Approved='Y' AND hrm_employee_separation.Emp_CancelResig=2 order by Emp_ResignationDate DESC", $con); 
      $row=mysql_num_rows($sql); if($row>0) { $Sno=1; while($res=mysql_fetch_array($sql)) { ?>	
	     <tr>
	      <td class="TableHead1" align="center" valign="top"><?php echo $Sno; ?></td>
<?php $sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmployeeID=".$res['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE);?>	 		  
	      <td class="TableHead1" align="center" valign="top"><?php echo $resE['EmpCode']; ?></td>
		  <td class="TableHead1" align="left" valign="top"><?php echo $resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; ?></td>
<?php $sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resE['DepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD);?>		  
		  <td class="TableHead1" align="left" valign="top"><?php echo $resD['DepartmentCode']; ?></td>
		  <td class="TableHead1" align="center" valign="top"><?php echo date("d-m-Y",strtotime($res['Emp_ResignationDate']));?></td>
		  <td class="TableHead1" align="center" valign="top"><?php echo date("d-m-Y",strtotime($res['HR_RelievingDate'])); ?></td>
		  <td class="TableHead1" align="center" valign="top"><?php echo date("d-m-Y",strtotime($res['Emp_CanDate'])); ?></td>
		 <td class="TableHead1">&nbsp;<a href="javascript:OpenWindow(<?php echo $res['EmpSepId'];?>)"><?php echo substr_replace($res['Emp_CanReason'], '', 15).'.....';?></a></td>
		 <td class="TableHead1" align="center"><a href="javascript:OpenEmpWindow(<?php echo $res['EmployeeID'];?>)">CLICK</a></td>
		 
	     <td class="TableHead1" align="center" style="color:<?php if($res['Rep_CancelResig']=='Y'){echo '#006400';}elseif($res['Rep_CancelResig']=='C'){echo '#804000';} ?>;">
		 <?php if($res['Rep_CancelResig']=='Y' AND $res['HOD_CancelResig']=='N'){ ?><a href="#" onClick="OpenAppWindow(<?php echo $res['EmpSepId'];?>)"/><font color="#006400">ACCEPTED</font></a><?php }elseif($res['Rep_CancelResig']=='C' AND $res['HOD_CancelResig']=='N'){echo 'REJECT';}elseif($res['Rep_CancelResig']=='N' AND ($res['HOD_CancelResig']=='Y' OR $res['HOD_CancelResig']=='C')){echo '';} ?></td>
		 
		 <td class="TableHead1" align="center" style="color:<?php if($res['HOD_CancelResig']=='Y'){echo '#006400';}elseif($res['HOD_CancelResig']=='C'){echo '#804000';} ?>;">
		 <?php if($res['HOD_CancelResig']=='Y' AND $res['Rep_CancelResig']=='N'){?><a href="#" onClick="OpenHodWindow(<?php echo $res['EmpSepId'];?>)"/><font color="#006400">ACCEPTED</font></a><?php }elseif($res['HOD_CancelResig']=='C' AND $res['Rep_CancelResig']=='N'){echo 'REJECT';}elseif($res['HOD_CancelResig']=='N' AND ($res['Rep_CancelResig']=='Y' OR $res['Rep_CancelResig']=='C')){echo '';} ?></td>
		  <td width="80" class="TableHead1" align="center" style="color:<?php if($res['HR_CancelResig']=='N' OR $res['HR_CancelResig']=='P'){echo '#0080FF';}elseif($res['HR_CancelResig']=='Y'){echo '#006400';}elseif($res['HR_CancelResig']=='C'){echo '#804000';} ?>;"><?php if($res['HR_CancelResig']=='N' OR $res['HR_CancelResig']=='P'){echo 'PENDING';}elseif($res['HR_CancelResig']=='Y'){ ?><a href="#" onClick="OpenHRWindow(<?php echo $res['EmpSepId'];?>)"/><font color="#006400">ACCEPTED</font></a><?php }elseif($res['HR_CancelResig']=='C'){echo 'REJECT';} ?></td>
		  
	      <td width="80" class="TableHead1" align="center">
		  <?php if($res['HR_CancelResig']=='N' AND ($res['Rep_CancelResig']=='Y' OR $res['HOD_CancelResig']=='Y')){?>
	      <select style="width:80px;height:22px;font-size:14px;font-family:Times New Roman;background-color:#B7FFB7;" onChange="SelCancelStusHR(this.value,<?php echo $res['EmpSepId'].', '.$UserId;?>)"><option value="0">Select</option><option value="A">Accept</option><option value="C">Reject</option></select><?php } ?> </td>
		</tr>
<?php $Sno++; }} ?>		
		</table>
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
