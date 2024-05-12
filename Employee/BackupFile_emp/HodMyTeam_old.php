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

<style>.font { color:#ffffff;font-family:Georgia; font-size:11px; width:200px;} .font1 { font-family:Georgia; font-size:11px; height:14px; } 
.font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }
.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function EmpTeam(E,C,D)
{window.open("EmpTeam.php?E="+E+"&C="+C+"&D="+D,"TeamFile","menubar=no,scrollbars=yes,resizable=no,directories=no,width=1000,height=300");}

function ReadHistory(EI)
{window.open("EmpHistory.php?EI="+EI,"HForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=920,height=600");}

function ReadTra(E,C)
{window.open("EmpTaringConf.php?E="+E+"&C="+C,"TeamFile","menubar=no,scrollbars=yes,resizable=no,directories=no,width=1050,height=500");}

function ReadElig(ei,ci)
{ window.open("MyTeamEmpElig.php?ei="+ei+"&ci="+ci+"&aa=wew&r=w%w%w&g=true%true&s=0889","HForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=730,height=610"); }

function EmpKRA(CId,YId,EmpId) 
{ window.open ("EmpKraForm.php?YId="+YId+"&EmpId="+EmpId+"&CId="+CId,"KRAForm","menubar=yes,scrollbars=yes,resizable=1,width=1100,height=500");}

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
						    <td align="left" valign="top" width="150">
<?php include("EmpImgEmp.php"); ?>
<?php //echo "<img width=105px height=125px src=\"show_images.php?id=".$EmployeeId."\">\n";?></td>
						  </tr>
					 </table>
				 </td>
				  <td align="left" width="850" valign="top">
	     <table border="0" width="1000">
		    <tr>
			 <td colspan="10"><table border="0"><tr>
			 <?php if($rowApp>0) { ?>
             <td align="center"><a href="AppMyTeam.php"><img id="Img_RepMgr1" style="display:block;" src="images/RepMgr1.png" border="0"/></a>
		     <img id="Img_RepMgr" style="display:none;" src="images/RepMgr.png" border="0"/></td><?php } ?>
			 <?php if($rowHod>0) { ?>
             <td align="center"><a href="HodMyTeam.php"><img id="Img_Hod1" style="display:none;" src="images/RevHod1.png" border="0"/></a>
		     <img id="Img_Hod" style="display:block;" src="images/RevHod.png" border="0"/></td><?php } ?>
			 <td>&nbsp;</td>
			 <td style="width:200px;font-family:Times New Roman; font-size:20px;" valign="top">&nbsp;<b><i><u>My Team</u></i></b></td>
			 </tr></table></td>
			</tr>
			
	<?php $sqlSetH=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='PMS' ", $con);  
      $resSetH=mysql_fetch_array($sqlSetH); ?>	
			
			<tr>
			 <td style="width:900px;">
			<table border="1" style="width:900px;" cellspacing="1">
			<tr bgcolor="#7a6189" style="height:24px;">
		     <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:50px;"><b>SNo</b></td>
		     <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:50px;" align="center"><b>EC</b></td>
		     <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:200px;" align="center"><b>Name</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:150px;" align="center"><b>Department</b></td>
		   <?php if($resSetH['Show_GradeDesig']=='Y'){ ?>
 		    <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:250px;" align="center"><b>Designation</b></td>
            <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:50px;" align="center"><b>Grade</b></td>
           <?php } ?>
			 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:50px;" align="center"><b>Team</b></td>
			 
			 <?php if($DepartmentId!=6 AND $DepartmentId!=7 AND $DepartmentId!=12 AND $DepartmentId!=9 AND $DepartmentId!=25 AND $DepartmentId!=3){ ?>
			 
			 <?php if($resSetH['Show_History']=='Y'){ ?>
			 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" align="center"><b>History</b></td>
			 <?php } ?>
			 
			 <?php } ?>
			 
			 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" align="center"><b>Eligibility</b></td>
                <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:100px;" align="center"><b>Training Conf.</b></td>
                  <?php if($CompanyId==1){ ?><td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" align="center"><b>KRA</b></td><?php } ?>
			 
                         
		    </tr>	
<?php $SqlHod=mysql_query("SELECT hrm_employee.EmployeeID,DepartmentId,DesigId,GradeId,EmpCode,Fname,Sname,Lname,Married,Gender,DR FROM hrm_employee_reporting INNER JOIN hrm_employee ON hrm_employee_reporting.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_reporting.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_reporting.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee_reporting.HodId=".$EmployeeId." AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." order by EmpCode ASC", $con); $sn=1; while($ResHod=mysql_fetch_array($SqlHod)) { 
if($ResHod['DR']=='Y'){$MS='Dr.';} elseif($ResHod['Gender']=='M'){$MS='Mr.';} elseif($ResHod['Gender']=='F' AND $ResHod['Married']=='Y'){$MS='Mrs.';} elseif($ResHod['Gender']=='F' AND $ResHod['Married']=='N'){$MS='Miss.';}  $EmpName=$MS.' '.$ResHod['Fname'].' '.$ResHod['Sname'].' '.$ResHod['Lname']; 
$SqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$ResHod['DepartmentId'], $con); $ResDept=mysql_fetch_assoc($SqlDept);	
$SqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$ResHod['DesigId'], $con); $ResDesig=mysql_fetch_assoc($SqlDesig);
$SqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$ResHod['GradeId'], $con); $ResG=mysql_fetch_assoc($SqlG);
?> 			
            <tr bgcolor="#FFFFFF">
		     <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $sn; ?></td>
		     <td style="font-family:Georgia; font-size:11px; width:50px;" align="center"><?php echo $ResHod['EmpCode']; ?></td>
		     <td style="font-family:Georgia; font-size:11px; width:200px;" align="">&nbsp;<?php echo $EmpName; ?></td>
		     <td style="font-family:Georgia; font-size:11px; width:150px;" align="">&nbsp;<?php echo $ResDept['DepartmentCode']; ?></td>
		     <?php if($resSetH['Show_GradeDesig']=='Y'){ ?>
 	<td style="font-family:Georgia; font-size:11px; width:250px;" align="">&nbsp;<?php echo $ResDesig['DesigName']; ?></td>
<td style="font-family:Georgia; font-size:11px; width:50px;" align="center"><?php echo $ResG['GradeValue']; ?></td>
             <?php } ?>
<?php $sqlE=mysql_query("select * from hrm_employee_reporting where AppraiserId=".$ResHod['EmployeeID'], $con); $rowE=mysql_num_rows($sqlE);?>			 
			 <td style="font-family:Georgia; font-size:11px; width:50px;" align="center"><?php if($rowE>0){ ?>
			 <a href="#" onClick="EmpTeam(<?php echo $ResHod['EmployeeID'].', '.$CompanyId.','.$DepartmentId; ?>)"><font color="#000099">Team</font></a><?php } else '&nbsp;'; ?></td>
			 
			 <?php if($DepartmentId!=6 AND $DepartmentId!=7 AND $DepartmentId!=12 AND $DepartmentId!=9 AND $DepartmentId!=25 AND $DepartmentId!=3){ ?>
			 
			 <?php if($resSetH['Show_History']=='Y'){ ?>
			 <td style="font-family:Georgia; font-size:11px; width:50px;" align="center"><a href="javascript:ReadHistory(<?php echo $ResHod['EmployeeID']; ?>)">Click</a></td>
			 <?php } ?>
			 
			 <?php } ?>
			 
			 <?php if($resSetH['Show_Elig']=='Y'){ ?>
			 <td style="font-family:Georgia; font-size:11px; width:50px;" align="center"><a href="javascript:ReadElig(<?php echo $ResHod['EmployeeID'].', '.$CompanyId; ?>)">Click</a></td>
			 <?php } ?>
<td style="font-family:Georgia; font-size:11px; width:100px;" align="center"><a href="javascript:ReadTra(<?php echo $ResHod['EmployeeID'].', '.$CompanyId; ?>)">Click</a></td>
<?php if($CompanyId==1){ ?>
<td style="font-family:Georgia; font-size:11px; width:50px;" align="center">
		<?php $sqlShow=mysql_query("select UseKRA from hrm_pms_kra where YearId=".$YearId." AND EmployeeID=".$ResHod['EmployeeID'], $con);  $resShow=mysql_fetch_assoc($sqlShow);	   	
              if($resShow['UseKRA']=='A' OR $resShow['UseKRA']=='H' OR $resShow['UseKRA']=='R') {?>
			<a href="#" onClick="EmpKRA(<?php echo $CompanyId.', '.$YearId.','.$ResHod['EmployeeID']; ?>)">Click</a>
<?php } ?></td><?php } ?>

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

