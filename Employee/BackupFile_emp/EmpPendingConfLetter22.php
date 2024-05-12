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
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>

<style>.font { color:#ffffff; font-family:Georgia; font-size:11px; width:200px;} .font1 { font-family:Georgia; font-size:11px; height:14px; } 
.font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }
.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
<Script type="text/javascript">window.history.forward(1);</Script>
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
			     <td id="Anni" valign="top">
				    <table border="0">
						  <tr height="20">
						    <td align="left" valign="top" width="150"><?php echo "<img width=105px height=125px src=\"show_images.php?id=".$EmployeeId."\">\n";?></td>
						  </tr>
					 </table>
				 </td>
				  <td align="left" width="850" valign="top">
	     <table border="0" width="1000">
			<tr>
			 <td style="width:800px;">
			<table border="1" style="width:800px;">
			<tr bgcolor="#7a6189" style="height:22px;">
		     <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:50px;"><b>SNo</b></td>
		     <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:50px;" align="center"><b>EC</b></td>
		     <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:200px;" align="center"><b>Name</b></td>
		     <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:150px;" align="center"><b>Department</b></td>
 		     <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:250px;" align="center"><b>Designation</b></td>
			 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:150px;" align="center"><b>Confirmation</b></td>
		    </tr>	
<?php $SqlRep=mysql_query("SELECT hrm_employee_reporting.EmployeeID,DepartmentId,DesigId,EmpCode,Fname,Sname,Lname,Married,Gender,DR,DateJoining,DateConfirmationYN FROM hrm_employee_reporting INNER JOIN hrm_employee ON hrm_employee_reporting.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_reporting.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_reporting.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee_reporting.AppraiserId=".$EmployeeId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateConfirmationYN='N' AND hrm_employee.CompanyId=".$CompanyId." order by EmpCode ASC", $con); $sn=1; while($ResRep=mysql_fetch_array($SqlRep)) { 
if($ResRep['DR']=='Y'){$MS='Dr.';} elseif($ResRep['Gender']=='M'){$MS='Mr.';} elseif($ResRep['Gender']=='F' AND $ResRep['Married']=='Y'){$MS='Mrs.';} elseif($ResRep['Gender']=='F' AND $ResRep['Married']=='N'){$MS='Miss.';}  $EmpName=$MS.' '.$ResRep['Fname'].' '.$ResRep['Sname'].' '.$ResRep['Lname']; 
$SqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$ResRep['DepartmentId'], $con); $ResDept=mysql_fetch_assoc($SqlDept);	
$SqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$ResRep['DesigId'], $con); $ResDesig=mysql_fetch_assoc($SqlDesig);
$d=date("d", strtotime($ResRep['DateJoining'])); $m=date("m", strtotime($ResRep['DateJoining'])); $y=date("Y",strtotime($ResRep['DateJoining'])); 
if($m=='01'){$cm='07'; $cy=$y; $cm2='10'; $cy2=$y;} elseif($m=='02'){$cm='08'; $cy=$y; $cm2='11'; $cy2=$y;} elseif($m=='03'){$cm='09'; $cy=$y; $cm2='12'; $cy2=$y;} elseif($m=='04'){$cm='10'; $cy=$y; $cm2='01'; $cy2=$y+1;} elseif($m=='05'){$cm='11'; $cy=$y; $cm2='02'; $cy2=$y+1;} elseif($m=='06'){$cm='12'; $cy=$y; $cm2='03'; $cy2=$y+1;} elseif($m=='07'){$cm='01'; $cy=$y+1; $cm2='04'; $cy2=$y+1;} elseif($m=='08'){$cm='02'; $cy=$y+1; $cm2='05'; $cy2=$y+1;} elseif($m=='09'){$cm='03'; $cy=$y+1; $cm2='06'; $cy2=$y+1;} elseif($m=='10'){$cm='04'; $cy=$y+1; $cm2='07'; $cy2=$y+1;} elseif($m=='11'){$cm='05'; $cy=$y+1; $cm2='08'; $cy2=$y+1;} elseif($m=='12'){$cm='06'; $cy=$y+1; $cm2='09'; $cy2=$y+1;} 
$sqlRec=mysql_query("select Recommendation,SubmitStatus from hrm_employee_confletter where EmployeeID=".$ResRep['EmployeeID'], $con); $rowRec=mysql_num_rows($sqlRec);
if($rowRec>0){ $resRec=mysql_fetch_assoc($sqlRec); } 
?> 			
            <tr bgcolor="#FFFFFF">
		     <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $sn; ?></td>
		     <td style="font-family:Georgia; font-size:11px; width:50px;" align="center"><?php echo $ResRep['EmpCode']; ?></td>
		     <td style="font-family:Georgia; font-size:11px; width:200px;" align="">&nbsp;<?php echo $EmpName; ?></td>
		     <td style="font-family:Georgia; font-size:11px; width:150px;" align="">&nbsp;<?php echo $ResDept['DepartmentCode']; ?></td>
 		     <td style="font-family:Georgia; font-size:11px; width:250px;" align="">&nbsp;<?php echo $ResDesig['DesigName']; ?></td>
<?php
if(($ResRep['DepartmentId']==6 OR $ResRep['DepartmentId']==19 OR $ResRep['DepartmentId']==3 OR $ResRep['DepartmentId']==4 OR $ResRep['DepartmentId']==21 OR $ResRep['DepartmentId']==25) AND ($ResRep['DesigId']==71 OR $ResRep['DesigId']==137 OR $ResRep['DesigId']==139 OR $ResRep['DesigId']==169 OR $ResRep['DesigId']==174 OR $ResRep['DesigId']==175 OR $ResRep['DesigId']==176 OR $ResRep['DesigId']==177 OR $ResRep['DesigId']==178 OR $ResRep['DesigId']==180 OR $ResRep['DesigId']==182 OR $ResRep['DesigId']==187 OR $ResRep['DesigId']==252 OR $ResRep==286 OR $ResRep['DesigId']==180 OR $ResRep['DesigId']==296))
{ $sy=$y+1; $Saldmy=$sy.'-'.$m.'-'.$d; $Before15Day_1 = date("Y-m-d",strtotime($Saldmy.'-15 day')); ?>
  <td style="font-family:Georgia; font-size:11px; width:150px;" align="center"><?php if($rowRec==0 AND date("Y-m-d")>=$Before15Day_1){ ?> <a href="EmpConfForm.php?e=<?php echo $ResRep['EmployeeID']; ?>&c=1&cd=0000000&d=<?php echo $ResRep['DepartmentId']; ?>"><font color="#FF0000"><blink>Fill Form</blink></font></a> <?php } elseif($rowRec>0 AND ($resRec['Recommendation']==1 OR $resRec['Recommendation']==2) AND $resRec['SubmitStatus']=='N' AND date("Y-m-d")>=$Before15Day_1){?><a href="EmpConfForm.php?e=<?php echo $ResRep['EmployeeID']; ?>&c=1&cd=0000000&d=<?php echo $ResRep['DepartmentId']; ?>"><font color="#0080FF"><blink>Pending</blink></font></a><?php } elseif($rowRec>0 AND ($resRec['Recommendation']==1 OR $resRec['Recommendation']==2) AND $resRec['SubmitStatus']=='Y' AND date("Y-m-d")>=$Before15Day_1){?><font color="#3A7500">Ok</font><?php } else {echo '<font color="#3A7500">Delay</font>';} ?></td>
  
<?php }else{$dmy=$cy.'-'.$cm.'-'.$d; $dmy2=$cy2.'-'.$cm2.'-'.$d; $Before15Day_1 = date("Y-m-d",strtotime($dmy.'-15 day')); $Before15Day_2 = date("Y-m-d",strtotime($dmy2.'-15 day')); ?>
  <td style="font-family:Georgia; font-size:11px; width:150px;" align="center"><?php if($rowRec==0 AND date("Y-m-d")>=$Before15Day_1){ ?> <a href="EmpConfForm.php?e=<?php echo $ResRep['EmployeeID']; ?>&c=1&cd=0000000&d=<?php echo $ResRep['DepartmentId']; ?>"><font color="#FF0000"><blink>Fill Form</blink></font></a><?php } elseif($rowRec>0 AND ($resRec['Recommendation']==1 OR $resRec['Recommendation']==2) AND $resRec['SubmitStatus']=='N' AND date("Y-m-d")>=$Before15Day_1){?> <a href="EmpConfForm.php?e=<?php echo $ResRep['EmployeeID']; ?>&c=1&cd=0000000&d=<?php echo $ResRep['DepartmentId']; ?>"><font color="#0080FF"><blink>Pending</blink></font></a><?php } elseif($rowRec>0 AND $resRec['Recommendation']==2 AND $resRec['SubmitStatus']=='Y' AND date("Y-m-d")>=$Before15Day_1 AND date("Y-m-d")<$Before15Day_2){?><font color="#0080FF">Extend_Confirmation</font><?php } elseif($rowRec>0 AND $resRec['Recommendation']==2 AND $resRec['SubmitStatus']=='Y' AND date("Y-m-d")>=$Before15Day_2){?> <a href="EmpConfForm.php?e=<?php echo $ResRep['EmployeeID']; ?>&c=2&cd=0000000&d=<?php echo $ResRep['DepartmentId']; ?>"><font color="#0080FF"><blink>Pending</blink></font></a><?php } else {echo '<font color="#3A7500">Delay</font>';} ?></td>
<?php } ?> 
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

