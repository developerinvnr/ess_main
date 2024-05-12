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
{ window.open("ResReason.php?id="+SId,"leaveForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=500,height=400");}

function OpenEmpWindow(EId)
{ window.open("EmpDetailHis.php?EI="+EId,"leaveForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=800,height=500");}

function SelStusApp(v,id)
{ if(v=='A'){value='Accept';}else if(v=='C'){value='Reject';} 
  var agree=confirm("Are you sure you want to "+value+" resignation to Reporting Manager?");
  if(agree)
  { var win=window.open("SepResActApp.php?act=actapp&v="+v+"&ss=vty&cc=it@~t~1212&p=value&a=app&true=false&i="+id,"leaveForm","menubar=no,scrollbars=no,resizable=no,directories=no,width=608,height=340");
    var timer = setInterval( function() { if(win.closed) {  clearInterval(timer);  window.location="PendingResig.php?e=4e&w=234&y=10234&a=app&e=4e2&e=4e&w=2~3~4&y=110022344&retd=ee&rr=09drfGe&S=ee11qq&wwrew=t%T@s-$~212ed818&d=101"; } }, 1000);
  }
  else{return false;}
}

function SelStusHod(v,id)
{ if(v=='A'){value='Accept';}else if(v=='C'){value='Reject';}
  var agree=confirm("Are you sure you want to "+value+" resignation HOD?");
  if(agree)
  { var win=window.open("SepResActHod.php?act=acthod&v="+v+"&ss=vty&cc=it@~t~1212&p=value&a=app&true=false&i="+id+"&cc=it@~t~1111!@1~ere","leaveForm","menubar=no,scrollbars=no,resizable=no,directories=no,width=608,height=350");
    var timer = setInterval( function() { if(win.closed) {  clearInterval(timer);  window.location="PendingResig.php?e=4e&w=234&y=10234&a=hod&e=4e2&e=4e&w=234&y=110022311&retd=ee&rr=09drfGe&S=eewwqq&wwrew=t%T@sed818&d=101"; } }, 1000);
  }
  else{return false;}
}

function SelStusHR(v,id,ui)
{ if(v=='A'){value='Accept';}else if(v=='C'){value='Reject';}
  var agree=confirm("Are you sure you want to "+value+" resignation?");
  if(agree)
  { var win=window.open("SepResActHR.php?act=acthr&v="+v+"&ss=vty&cc=it@~t~1212&p=value&a=app&true=false&i="+id+"&cc=it@~t~1111!@1~ere&UI="+ui,"leaveForm","menubar=no,scrollbars=no,resizable=no,directories=no,width=608,height=380");
    var timer = setInterval( function() { if(win.closed) {  clearInterval(timer);  window.location="PendingResig.php?e=4e&w=234&y=10234&a=hod&e=4e2&e=4e&w=234&y=110022311&retd=ee&rr=09drfGe&S=eewwqq&wwrew=t%T@sed818&d=101"; } }, 1000);
  }
  else{return false;}
}

function OpenHodWindow(id)
{ window.open("SepResActHod2.php?act=acthod&v=v&ss=vty&cc=it@~t~1212&p=value&a=app&true=false&i="+id+"&cc=it@~t~1111!@1~ere","leaveForm","menubar=no,scrollbars=no,resizable=no,directories=no,width=608,height=300");}
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
	  <td width="250" class="heading">&nbsp;Pending Resignation</td>
	  <td><font style="font-family:Times New Roman;color:#005500;font-size:15px; font-weight:bold;"><?php echo $Msg; ?></font></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>	
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
		   <td width="80" class="TableHead" align="center"><b>Expected Relieving Date</b></td>
		   <td width="150" class="TableHead" align="center"><b>Reason</b></td>
		   <td width="50" class="TableHead" align="center"><b>Employee Details</b></td>
		   <td width="50" class="TableHead" align="center"><b>Resignation Details</b></td>
<?php if($_SESSION['User_Permission']=='Edit'){?>
		   <td width="80" class="TableHead" align="center"><b>REP</b></td>
		   <td width="80" class="TableHead" align="center"><b>HOD</b></td>
		   <td width="80" class="TableHead" align="center"><b>HR</b></td>
		   <td width="80" class="TableHead" align="center"><b>Action</b></td>
<?php } ?> 
		  </tr>
<?php $sql=mysql_query("select * from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_separation.EmployeeID where hrm_employee_separation.HR_Approved='N' AND Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C' AND hrm_employee.CompanyId=".$CompanyId." order by Emp_ResignationDate DESC", $con); 
      $row=mysql_num_rows($sql); if($row>0) { $Sno=1; while($res=mysql_fetch_array($sql)) { ?>	
	     <tr>
	      <td width="40" class="TableHead1" align="center" valign="top"><?php echo $Sno; ?></td>
<?php $sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmployeeID=".$res['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE);?>	 		  
	      <td width="50" class="TableHead1" align="center" valign="top"><?php echo $resE['EmpCode']; ?></td>
		  <td width="200" class="TableHead1" align="left" valign="top"><?php echo $resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; ?></td>
<?php $sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resE['DepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD);?>		  
		  <td width="100" class="TableHead1" align="left" valign="top"><?php echo $resD['DepartmentCode']; ?></td>
		  <td width="80" class="TableHead1" align="center" valign="top"><?php echo date("d-m-Y",strtotime($res['Emp_ResignationDate']));?></td>
		  <td width="80" class="TableHead1" align="center" valign="top"><?php echo date("d-m-Y",strtotime($res['Emp_RelievingDate'])); ?></td>
		  <td width="150" class="TableHead1">&nbsp;<a href="javascript:OpenWindow(<?php echo $res['EmpSepId'];?>)"><?php echo substr_replace($res['Emp_Reason'], '', 15).'.....';?></a></td>
		  <td width="50" class="TableHead1" align="center"><a href="javascript:OpenEmpWindow(<?php echo $res['EmployeeID'];?>)">CLICK</a></td>
		  <td width="50" class="TableHead1" align="center"><a href="javascript:OpenHodWindow(<?php echo $res['EmpSepId'];?>)">CLICK</a></td>
		  
<?php if($_SESSION['User_Permission']=='Edit'){?>		  
		  <td width="80" class="TableHead1" align="center" style="color:<?php if($res['Rep_Approved']=='Y'){echo '#006400';}elseif($res['Rep_Approved']=='C'){echo '#804000';} ?>;">
		  <?php if($res['Rep_Approved']=='Y'){$actApp='APPROVED';}elseif($res['Rep_Approved']=='C'){$actApp='REJECT';} ?>
		  <?php if(($res['Rep_Approved']=='N' OR $res['Rep_Approved']=='P') AND date("Y-m-d")<$res['HOD_Date']) {?>
		  <select style="width:80px;height:22px;font-size:14px;font-family:Times New Roman;background-color:#B7FFB7;" onChange="SelStusApp(this.value,<?php echo $res['EmpSepId'];?>)">
	      <option value="0"><?php if($res['Rep_Approved']=='N' OR $res['Rep_Approved']=='P'){echo 'Pending';}?></option>
		  <option value="A">Approval</option><option value="C">Reject</option></select><?php } else { if($res['Rep_Approved']=='Y' AND $res['Hod_Approved']=='N'){echo 'APPROVED';}elseif($res['Rep_Approved']=='N' AND $res['Hod_Approved']=='N'){echo 'PENDING';}elseif($res['Rep_Approved']=='C' AND $res['Hod_Approved']=='N'){echo 'REJECT';}elseif($res['Rep_Approved']=='N' AND $res['Hod_Approved']=='Y'){echo '';} } ?>
		  </td>
		  <td width="80" class="TableHead1" align="center" style="color:<?php if($res['Hod_Approved']=='Y'){echo '#006400';}elseif($res['Hod_Approved']=='C'){echo '#804000';} ?>;">
		  <?php if($res['Rep_Approved']=='N' AND ($res['Hod_Approved']=='N' OR $res['Hod_Approved']=='P') AND date("Y-m-d")>=$res['HOD_Date']){ ?>
		  <select style="width:80px;height:22px;font-size:14px;font-family:Times New Roman;background-color:#B7FFB7;" onChange="SelStusHod(this.value,<?php echo $res['EmpSepId'];?>)">
	      <option value="0"><?php if($res['Hod_Approved']=='N' OR $res['Hod_Approved']=='P'){echo 'Pending';}?></option>
		  <option value="A">Approval</option><option value="C">Reject</option></select><?php } else { if($res['Hod_Approved']=='Y' AND $res['Rep_Approved']=='N'){echo 'APPROVED';}elseif($res['Hod_Approved']=='N' AND $res['Rep_Approved']=='N'){echo 'PENDING';}elseif($res['Hod_Approved']=='C' AND $res['Rep_Approved']=='N'){echo 'REJECT';}elseif($res['Hod_Approved']=='N' AND $res['Rep_Approved']=='Y'){echo '';} } ?>
		  </td>
		  <td width="80" class="TableHead1" align="center" style="color:<?php if($res['HR_Approved']=='N' OR $res['HR_Approved']=='P'){echo '#0080FF';}elseif($res['HR_Approved']=='Y'){echo '#006400';}elseif($res['HR_Approved']=='C'){echo '#804000';} ?>;"><?php if($res['HR_Approved']=='N' OR $res['HR_Approved']=='P'){echo 'PENDING';}elseif($res['HR_Approved']=='Y'){ echo 'APPROVED'; }elseif($res['HR_Approved']=='C'){echo 'REJECT';} ?></td>
	      <td width="80" class="TableHead1" align="center">
		  <?php if($res['Rep_Approved']=='Y' OR $res['Hod_Approved']=='Y'){?>
	      <select style="width:80px;height:22px;font-size:14px;font-family:Times New Roman;background-color:#B7FFB7;" onChange="SelStusHR(this.value,<?php echo $res['EmpSepId'].', '.$UserId;?>)"><option value="0">Select</option><option value="A">Approval</option><option value="C">Reject</option></select><?php } ?> </td>

<?php } ?>

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
