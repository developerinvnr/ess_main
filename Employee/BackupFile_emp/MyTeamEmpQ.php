<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');} 

if($_REQUEST['QCid'] AND $_REQUEST['QCid']!='')
{$sqlClos=mysql_query("update hrm_employee_query set QStatus_App=3 where QueryId=".$_REQUEST['QCid'], $con); 
 if($sqlClos){$msg='Query close Successfully....';}
}
if($_REQUEST['action']=='DelClose' AND $_REQUEST['Q']!='')
{$sqlDel=mysql_query("update hrm_employee_query set QStatus_App=4 where QueryId=".$_REQUEST['Q'], $con); 
 if($sqlDel){$msg='Query deleted Successfully....';}
}

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<style>.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">

function ReadQueryDetils(QI)
{window.open("ReadQuerydetails.php?Qid="+QI,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=500,height=350");} 
function ReadAnswer(AI)
{window.open("ReadQAnswer.php?Aid="+AI,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=350,height=310");}
function ReadPending(AI)
{window.open("ReadQPending.php?Aid="+AI,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=350,height=310");}
function CloseQ(i)
{ var agree=confirm("Are you sure you want to close this query...?"); if (agree) {window.location="MyTeamEmpQ.php?QCid="+i;}}
function DeleteQC(QId)
{var agree=confirm("Are you sure you want to delete this query...?"); if (agree) { var x="MyTeamEmpQ.php?action=DelClose&ac=CloseQuery&Q="+QId; window.location=x; }}
function CloseQuery()
{ window.location="MyTeamEmpQ.php?ac=CloseQuery";}
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
<?php //*******************************************Status********** ?>
           <td style="margin-left:0px; width:10px;">&nbsp;</td>           
           <td valign="top" style="margin-left:0px;">
		     <table border="0">
			 <tr>
			  <td>
			   <table border="0">
			   <tr>
			     <td style="font-family:Times New Roman; color:#620000; font-size:17px;width:750px;" align=""><b><u>My Team Query</u> :</b>
				 &nbsp;&nbsp;&nbsp;&nbsp;<?php if($_REQUEST['ac']=='CloseQuery') { echo '<b><font color="#0057AE">(Close Query)</font></b>';}?>
				 <font color="#008000" style='font-family:Times New Roman;' size="3"><b><?php echo $msg; ?></b></font></td>
				 <td align="center" style="font-family:Times New Roman; color:#004A00;width:82px; font-size:15px;">
		<?php $sqlQC=mysql_query("select * from hrm_employee_query where Id_App=".$EmployeeId." AND QStatus_App=3 order by QueryDateTime DESC", $con); 
$rowQC=mysql_num_rows($sqlQC);?><td valign="top" style="width:150px;" align="right"><?php if($rowQC>0){?>			
        <?php if($_REQUEST['ac']=='CloseQuery') { ?>
		<a href="#" onClick="javascript:window.location='MyTeamEmpQ.php'"><font color="#464600" style='font-family:Times New Roman;' size="3"><b>Refresh</b></font></a>		        <?php } else { ?>
		<a href="#" onClick="CloseQuery()"><font color="#464600" style='font-family:Times New Roman;' size="3"><b>Close Query</b></font></a>
		<?php } } ?></td>
				 </tr>
			  </table>
			</td>
		   </tr>
<?php $sqlQ=mysql_query("select * from hrm_employee_query where Id_App=".$EmployeeId." AND QStatus_App!=3 AND QStatus_App!=4 order by QueryDateTime DESC", $con); 
      $rowQ=mysql_num_rows($sqlQ);?>	  
			   <tr>
			     <td align="center" id="QueryStatusTD" style="display:;width:850px; margin-left:0px;" valign="top">
				    <table border="1">
					  <tr bgcolor="#7a6189" style="height:22px;">
		   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:50px;"><b>SNo</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:70px;" align="center"><b>Date</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:150px;" align="center"><b>From</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:100px;" align="center"><b>Department</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:80px;" align="center"><b>To</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:150px;" align="center"><b>Subject</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" align="center"><b>Details</b></td>
 		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:80px;" align="center"><b>Status</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:80px;" align="center"><b>
		   <?php if($_REQUEST['ac']=='CloseQuery') { echo 'Delete';}if($_REQUEST['ac']!='CloseQuery') { echo 'Close';}?></b></td>
		             </tr>	
<?php if($rowQ>0 AND $_REQUEST['ac']!='CloseQuery') { $Sn=1; while($resQ=mysql_fetch_array($sqlQ)) { 
      $sqlEmp=mysql_query("select Fname,Sname,Lname,DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmployeeID=".$resQ['EmployeeID'], $con); $resEmp=mysql_fetch_assoc($sqlEmp);
	  $Ename=$resEmp['Fname'].' '.$resEmp['Sname'].' '.$resEmp['Lname'];
	  $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resEmp['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
?>

           <tr bgcolor="#FFFFFF" style="height:22px;">
		   <td align="center" style="font:Georgia; font-size:11px; width:50px;" valign="top"><?php echo $Sn; ?></td>
		   <td style="font-family:Times New Roman; font-size:12px; width:70px;" align="center" valign="top"><?php echo date("d-M-y", strtotime($resQ['QueryDateTime'])); ?></td>
		   <td style="font-family:Georgia; font-size:11px; width:150px; overflow:hidden;" valign="top"><?php echo $Ename; ?></td>
		   <td style="font-family:Georgia; font-size:11px; width:100px; overflow:hidden;" valign="top"><?php echo $resDept['DepartmentCode']; ?></td>
		   <td style="font-family:Times New Roman; font-size:12px; width:80px;" align="center" valign="top"><?php echo $resQ['QueryTo']; ?></td>
		   <td style="font-family:Georgia; font-size:11px; width:150px; overflow:hidden;" valign="top"><?php echo substr_replace($resQ['QuerySubject'], '', 15).'.....'; ?></td>
		   <td style="font-family:Georgia; font-size:11px; width:60px;" align="center" valign="top">
		   <a href="javascript:ReadQueryDetils(<?php echo $resQ['QueryId']; ?>)">Read</a></td>
 		   <td style="font-family:Times New Roman; font-size:12px; width:80px;" align="center" valign="top"><?php if($resQ['QueryStatus_Emp']==0){echo 'Draft';}if($resQ['QueryStatus_Emp']==1){ ?><font color="#FF8D1C">InProcess</font><?php }if($resQ['QueryStatus_Emp']==2){ ?><font color="#007500">Answer</font><?php } ?></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:80px;" align="center" valign="top">
	       <a href="#" onClick="CloseQ(<?php echo $resQ['QueryId']; ?>)"><img src="images/delete.png" border="0" /></a>
		  </td>
		             </tr>	
<?php $Sn++;} }  if($_REQUEST['ac']=='CloseQuery') { $SnC=1; while($resQC=mysql_fetch_array($sqlQC)) { 
      $sqlEmp=mysql_query("select Fname,Sname,Lname,DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmployeeID=".$resQC['EmployeeID'], $con); $resEmp=mysql_fetch_assoc($sqlEmp);
	  $Ename=$resEmp['Fname'].' '.$resEmp['Sname'].' '.$resEmp['Lname'];
	  $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resEmp['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
?>

           <tr bgcolor="#FFFFFF" style="height:22px;">
		   <td align="center" style="font:Georgia; font-size:11px; width:50px;" valign="top"><?php echo $SnC; ?></td>
		   <td style="font-family:Times New Roman; font-size:12px; width:70px;" align="center" valign="top"><?php echo date("d-M-y", strtotime($resQC['QueryDateTime'])); ?></td>
		   <td style="font-family:Georgia; font-size:11px; width:150px; overflow:hidden;" valign="top"><?php echo $Ename; ?></td>
		   <td style="font-family:Georgia; font-size:11px; width:100px; overflow:hidden;" valign="top"><?php echo $resDept['DepartmentCode']; ?></td>
		   <td style="font-family:Times New Roman; font-size:12px; width:80px;" align="center" valign="top"><?php echo $resQC['QueryTo']; ?></td>
		   <td style="font-family:Georgia; font-size:11px; width:150px; overflow:hidden;" valign="top"><?php echo substr_replace($resQC['QuerySubject'], '', 15).'.....'; ?></td>
		   <td style="font-family:Georgia; font-size:11px; width:60px;" align="center" valign="top">
		   <a href="javascript:ReadQueryDetils(<?php echo $resQC['QueryId']; ?>)">Read</a></td>
 		   <td style="font-family:Times New Roman; font-size:12px; width:80px;" align="center" valign="top"><?php if($resQC['QueryStatus_Emp']==0){echo 'Draft';}if($resQC['QueryStatus_Emp']==1){ ?><font color="#FF8D1C">InProcess</font><?php }if($resQC['QueryStatus_Emp']==2){ ?><font color="#007500">Answer</font><?php } ?></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:80px;" align="center" valign="top">
	       <a href="#" onClick="DeleteQC(<?php echo $resQC['QueryId']; ?>)"><img src="images/Trash-can-icon.png" border="0" /></a>
		  </td>
		             </tr>	
<?php $SnC++;} } if($rowQ==0) { ?>
                     <tr>
					    <td colspan="7" style="font:Georgia; color:#D56A00; font-size:12px; width:50px;"><b>Empty....</b></td>
					 </tr>
<?php } ?>					 			 			 
					</table>
				 </td>
			   </tr>
			 </table>
		   </td>
<?php //*******************************************Status Close********** ?> 
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

