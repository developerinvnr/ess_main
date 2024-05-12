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
function SalaryHelpDoc()
{window.open("SalaryHelpDoc.php?action=help","HelpDoc","menubar=no,scrollbars=yes,resizable=no,directories=no,width=720,height=600");}
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
			 <td colspan="10"><table border="0"><tr>
			 <?php if($rowApp>0) { ?>
             <td align="center"><a href="EmpPendingConfLetter.php"><img id="Img_RepMgr1" style="display:none;" src="images/RepMgr1.png" border="0"/></a>
		     <img id="Img_RepMgr" style="display:block;" src="images/RepMgr.png" border="0"/></td><?php } ?>
			 <?php if($rowHod>0) { ?>
             <td align="center"><a href="EmpHodPendingConfLetter.php"><img id="Img_Hod1" style="display:block;" src="images/RevHod1.png" border="0"/></a>
		     <img id="Img_Hod" style="display:none;" src="images/RevHod.png" border="0"/></td><?php } ?>
			 <td>&nbsp;</td>
			 <td style="width:250px;font-family:Times New Roman; font-size:15px;" valign="top">&nbsp;<b><i><u>Pending Confirmation</u></i></b></td>
			 </tr></table></td>
			</tr>
		 
		 <?php $sqlSetH=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='PMS' ", $con);  
      $resSetH=mysql_fetch_array($sqlSetH); ?>
		 
			<tr>
			 <td style="width:100%;">
			<table border="1" style="width:100%;" cellspacing="1">
			<tr bgcolor="#7a6189" style="height:22px;">
		     <td class="th" style="width:50px;">SNo</td>
		     <td class="th" style="width:50px;">EC</td>
		     <td class="th" style="width:200px;">Name</td>
		     <td class="th" style="width:150px;">Function</td>
		     <?php if($resSetH['Show_GradeDesig']=='Y'){ ?>
 		     <td class="th" style="width:250px;">Designation</td>
 		     <?php } ?>
			 <td class="th" style="width:100px;">Confirmation</td>
		    </tr>	
<?php $SqlRep=mysql_query("SELECT hrm_employee.EmployeeID,DepartmentId,DesigId,EmpCode,Fname,Sname,Lname,Married,Gender,DR,DateJoining,DateConfirmationYN,ConfirmMonth FROM hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee_general.RepEmployeeID=".$EmployeeId." AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." order by EmpCode DESC", $con); $sn=1; while($ResRep=mysql_fetch_array($SqlRep)) { 
if($ResRep['DR']=='Y'){$MS='Dr.';} elseif($ResRep['Gender']=='M'){$MS='Mr.';} elseif($ResRep['Gender']=='F' AND $ResRep['Married']=='Y'){$MS='Mrs.';} elseif($ResRep['Gender']=='F' AND $ResRep['Married']=='N'){$MS='Miss.';}  $EmpName=$MS.' '.$ResRep['Fname'].' '.$ResRep['Sname'].' '.$ResRep['Lname']; 
$SqlDept=mysql_query("select DepartmentCode,FunName from hrm_department where DepartmentId=".$ResRep['DepartmentId'], $con); $ResDept=mysql_fetch_assoc($SqlDept);	
$SqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$ResRep['DesigId'], $con); $ResDesig=mysql_fetch_assoc($SqlDesig);
$sqlRec=mysql_query("select Recommendation,SubmitStatus from hrm_employee_confletter where EmployeeID=".$ResRep['EmployeeID']." AND Status='A'", $con); 


$rowRec=mysql_num_rows($sqlRec);
$sqlRecD=mysql_query("select Recommendation,SubmitStatus from hrm_employee_confletter where EmployeeID=".$ResRep['EmployeeID']." AND Status='D'", $con); 
$rowRecD=mysql_num_rows($sqlRecD); $resRecD=mysql_fetch_assoc($sqlRecD);

if($rowRec>0){ $resRec=mysql_fetch_assoc($sqlRec); } 
if($ResRep['ConfirmMonth']==6){$ConfDate=date('Y-m-d', strtotime("+6 months", strtotime($ResRep['DateJoining']))); }
elseif($ResRep['ConfirmMonth']==9){$ConfDate=date('Y-m-d', strtotime("+9 months", strtotime($ResRep['DateJoining']))); } 
elseif($ResRep['ConfirmMonth']==12){$ConfDate=date('Y-m-d', strtotime("+12 months", strtotime($ResRep['DateJoining']))); }
elseif($ResRep['ConfirmMonth']==15){$ConfDate=date('Y-m-d', strtotime("+15 months", strtotime($ResRep['DateJoining']))); }
elseif($ResRep['ConfirmMonth']==18){$ConfDate=date('Y-m-d', strtotime("+18 months", strtotime($ResRep['DateJoining']))); }
elseif($ResRep['ConfirmMonth']==24){$ConfDate=date('Y-m-d', strtotime("+24 months", strtotime($ResRep['DateJoining']))); }

$Before15Day_1 = date("Y-m-d",strtotime($ConfDate.'-15 day'));

$sqlch=mysql_query("select * from hrm_employee_separation where EmployeeID=".$ResRep['EmployeeID']." AND Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C'", $con); $rowch=mysql_num_rows($sqlch);

?> 			
            <tr style="background-color:<?php if($rowch>0){echo '#FFFF6C';}else{echo '#FFFFFF';} ?>;">
		     <td class="tdc"><?php echo $sn; ?></td>
		     <td class="tdc"><?php echo $ResRep['EmpCode']; ?></td>
		     <td class="tdl">&nbsp;<?php echo $EmpName; ?></td>
		     <td class="tdl">&nbsp;<?php echo $ResDept['FunName']; ?></td>
		    <?php if($resSetH['Show_GradeDesig']=='Y'){ ?>
 		     <td class="tdl">&nbsp;<?php echo $ResDesig['DesigName']; ?></td>
 		     <?php } ?>
			 
			 <td class="tdc">
             <?php if($rowRec==0 AND $ResRep['DateConfirmationYN']=='Y') { echo 'Ok'; } 
             elseif($rowRec>0 AND $ResRep['DateConfirmationYN']=='Y' AND $resRec['SubmitStatus']=='Y'){?><a href="EmpConfForm.php?e=<?php echo $ResRep['EmployeeID']; ?>&c=1&cd=0000000&d=<?php echo $ResRep['DepartmentId']; ?>"><font color="#3A7500">Ok/ Form</font></a>
             <?php } elseif($rowRec==0 AND date("Y-m-d")>=$Before15Day_1 AND $ResRep['DateConfirmationYN']=='N'){ ?><a href="EmpConfForm.php?e=<?php echo $ResRep['EmployeeID']; ?>&c=1&cd=0000000&d=<?php echo $ResRep['DepartmentId']; ?>"><font color="#FF0000"><blink>Fill Form</blink></font></a>
	   
            <?php } elseif($rowRec>0 AND $rowRecD==0 AND ($resRec['Recommendation']==1 OR $resRec['Recommendation']==2) AND $resRec['SubmitStatus']=='N' AND date("Y-m-d")>=$Before15Day_1){?><a href="EmpConfForm.php?e=<?php echo $ResRep['EmployeeID']; ?>&c=1&cd=0000000&d=<?php echo $ResRep['DepartmentId']; ?>"><font color="#0080FF"><blink>Pending</blink></font></a>
 
            <?php } elseif($rowRec>0 AND $rowRecD==0 AND $resRec['Recommendation']==1 AND $resRec['SubmitStatus']=='Y'){?><a href="EmpConfForm.php?e=<?php echo $ResRep['EmployeeID']; ?>&c=1&cd=0000000&d=<?php echo $ResRep['DepartmentId']; ?>"><font color="#3A7500">Ok/ Form</font></a>
 
            <?php } elseif($rowRec>0 AND $rowRecD==0 AND $resRec['Recommendation']==2 AND $resRec['SubmitStatus']=='Y'){?><a href="EmpConfForm.php?e=<?php echo $ResRep['EmployeeID']; ?>&c=1&cd=0000000&d=<?php echo $ResRep['DepartmentId']; ?>"><font color="#3A7500">Extend</font></a>
            
            <?php } elseif($rowRec>0 AND $rowRecD>0 AND $resRec['Recommendation']==2 AND $ResRep['DateConfirmationYN']=='N'){?><a href="EmpConfForm.php?e=<?php echo $ResRep['EmployeeID']; ?>&c=1&cd=0000000&d=<?php echo $ResRep['DepartmentId']; ?>"><font color="#3A7500">Extend</font></a>
 
            <?php } elseif($rowRec>0 AND $rowRecD>0 AND $resRecD['Recommendation']==2 AND $resRec['SubmitStatus']=='N' AND date("Y-m-d")>=$Before15Day_1){?><a href="EmpConfForm.php?e=<?php echo $ResRep['EmployeeID']; ?>&c=1&cd=0000000&d=<?php echo $ResRep['DepartmentId']; ?>"><font color="#3A7500">Fill Form</font></a>
 
            <?php } elseif($rowRec>0 AND $rowRecD>0 AND $resRec['Recommendation']==2 AND $resRec['SubmitStatus']=='N' AND date("Y-m-d")>=$Before15Day_1){?><a href="EmpConfForm.php?e=<?php echo $ResRep['EmployeeID']; ?>&c=1&cd=0000000&d=<?php echo $ResRep['DepartmentId']; ?>"><font color="#3A7500">Extend</font></a>
 
            <?php } else { echo '<font color="#3A7500">Delay</font>';} ?>
           </td>
			 
			 <?php /*
			 <td style="font-family:Georgia; font-size:11px; width:100px;" align="center"><?php if($rowRec==0 AND $ResRep['DateConfirmationYN']=='Y') { echo 'Ok'; } elseif($rowRec==0 AND date("Y-m-d")>=$Before15Day_1){ ?><a href="EmpConfForm.php?e=<?php echo $ResRep['EmployeeID']; ?>&c=1&cd=0000000&d=<?php echo $ResRep['DepartmentId']; ?>"><font color="#FF0000"><blink>Fill Form</blink></font></a><?php } elseif($rowRec>0 AND ($resRec['Recommendation']==1 OR $resRec['Recommendation']==2) AND $resRec['SubmitStatus']=='N' AND date("Y-m-d")>=$Before15Day_1){?><a href="EmpConfForm.php?e=<?php echo $ResRep['EmployeeID']; ?>&c=1&cd=0000000&d=<?php echo $ResRep['DepartmentId']; ?>"><font color="#0080FF"><blink>Pending</blink></font></a><?php } elseif($rowRec>0 AND $resRec['Recommendation']==1 AND $resRec['SubmitStatus']=='Y'){?><a href="EmpConfForm.php?e=<?php echo $ResRep['EmployeeID']; ?>&c=1&cd=0000000&d=<?php echo $ResRep['DepartmentId']; ?>"><font color="#3A7500">Ok/ Form</font></a>
			 <?php } elseif($rowRec>0 AND $resRec['Recommendation']==2 AND $resRec['SubmitStatus']=='Y'){?><a href="EmpConfForm.php?e=<?php echo $ResRep['EmployeeID']; ?>&c=1&cd=0000000&d=<?php echo $ResRep['DepartmentId']; ?>"><font color="#3A7500">Extend</font></a><?php } elseif($rowRec>0 AND $resRec['Recommendation']==1 AND $resRec['SubmitStatus']=='N'){?><a href="EmpConfForm.php?e=<?php echo $ResRep['EmployeeID']; ?>&c=1&cd=0000000&d=<?php echo $ResRep['DepartmentId']; ?>"><font color="#3A7500">Extend</font></a><?php } else { echo '<font color="#3A7500">Delay</font>';} ?>
			 </td>
			 */?>
			 
		    </tr>
<?php $sn++; } ?>				
	        </table>
		   </tr>
		</table>
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

