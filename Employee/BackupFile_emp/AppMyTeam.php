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
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function ReadHistory(EI)
{window.open("EmpHistory.php?EI="+EI,"HForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=920,height=600");}


function ReadElig(ei,ci)
{ window.open("MyTeamEmpElig.php?ei="+ei+"&ci="+ci+"&aa=wew&r=w%w%w&g=true%true&s=0889","HForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=730,height=610"); }

function EmpTeam(E,C)
{window.open("EmpTeam.php?E="+E+"&C="+C,"TeamFile","menubar=no,scrollbars=yes,resizable=no,directories=no,width=800,height=300");}

function EmpKRA(CId,YId,EmpId) 
{ window.open ("EmpKraForm.php?YId="+YId+"&EmpId="+EmpId+"&CId="+CId,"KRAForm","menubar=yes,scrollbars=yes,resizable=1,width=1100,height=500");}

function ReadTra(E,C)
{window.open("EmpTaringConf.php?E="+E+"&C="+C,"TeamFile","menubar=no,scrollbars=yes,resizable=no,directories=no,width=1050,height=500");}

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
	<td colspan="10">
	 <table border="0">
	 <tr>
	  <?php if($rowApp>0){ ?>
	  <td align="center"><a href="AppMyTeam.php"><img id="Img_RepMgr1" style="display:none;" src="images/RepMgr1.png" border="0"/></a><img id="Img_RepMgr" style="display:block;" src="images/RepMgr.png" border="0"/></td><?php } ?>
	  <?php if($rowHod>0) { ?>
	  <td align="center"><a href="HodMyTeam.php"><img id="Img_Hod1" style="display:block;" src="images/RevHod1.png" border="0"/></a><img id="Img_Hod" style="display:none;" src="images/RevHod.png" border="0"/></td><?php } ?>
	  <td>&nbsp;</td>
	  <td class="TableHead" style="width:200px;" valign="top">&nbsp;<b><i><u>My Team</u></i></b></td>
	  <!--<td class="tdc" style="background-color:#FFFF6C;width:180px;">Apply for Resignation</td>-->
	 </tr>
	 </table>
	</td>
   </tr>
   
<?php $sL=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='PMS'",$con); 
      $rL=mysql_fetch_assoc($sL); ?>	    
   
   <tr>
	<td style="width:100%;">
	 <table border="1" style="width:100%;" cellspacing="1">
	 <tr bgcolor="#7a6189">
	  <td class="th" style="width:50px;">Sno</td>
	  <td class="th" style="width:50px;">EC</td>
	  <td class="th" style="width:200px;">Name</td>
      <td class="th" style="width:150px;">Function</td>
      <?php if($rL['Show_GradeDesig']=='Y'){ ?>
      <td class="th" style="width:250px;">Designation</td>
      <td class="th" style="width:50px;">Grade</td>
      <?php } ?>
	  <td class="th" style="width:50px;">Team</td>
	  
	  <?php if($rL['Show_Elig']=='Y'){ ?>
	  <td class="th" style="width:60px;">Eligibility</td>
	  <?php } ?>
	  
	  <td class="th" style="width:100px;">Training Conf.</td>
	  <?php if($CompanyId==1){?>
	  <td class="th" style="width:50px;">KRA</td>
	  <?php } ?> 
       <?php /* <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" align="center"><b>History</b></td> */ ?>
	 </tr>	
	 
	 
	 
<?php $SqlRep=mysql_query("SELECT r.EmployeeID, EmpCode, Fname, Sname, Lname, Married, Gender, DR, DateOfResignation, DateOfSepration, DepartmentCode, FunName, DesigName, GradeValue FROM hrm_employee_reporting r INNER JOIN hrm_employee e ON r.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON r.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON r.EmployeeID=p.EmployeeID INNER JOIN hrm_designation de on g.DesigId=de.DesigId INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_grade gr ON g.GradeId=gr.GradeId WHERE r.AppraiserId=".$EmployeeId." AND e.EmpStatus='A' AND e.CompanyId=".$CompanyId." order by EmpCode ASC", $con); 
$sn=1; while($ResRep=mysql_fetch_array($SqlRep)) { 
if($ResRep['DR']=='Y'){$MS='Dr.';} elseif($ResRep['Gender']=='M'){$MS='Mr.';} elseif($ResRep['Gender']=='F' AND $ResRep['Married']=='Y'){$MS='Mrs.';} elseif($ResRep['Gender']=='F' AND $ResRep['Married']=='N'){$MS='Miss.';}  $EmpName=$MS.' '.$ResRep['Fname'].' '.$ResRep['Sname'].' '.$ResRep['Lname']; 

$sqlch=mysql_query("select * from hrm_employee_separation where EmployeeID=".$ResRep['EmployeeID']." AND Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C'", $con); $rowch=mysql_num_rows($sqlch);

?> 			
	 <tr style="background-color:<?php if($rowch>0){echo '#FFFF6C';}else{echo '#FFFFFF';} ?>;">
	 <td class="tdc"><?php echo $sn; ?></td>
	 <td class="tdc"><?php echo $ResRep['EmpCode']; ?></td>
	 <td class="tdl">&nbsp;<?php echo $EmpName; ?></td>
     <td class="tdl">&nbsp;<?php echo strtoupper($ResRep['FunName']); ?></td>
     <?php if($rL['Show_GradeDesig']=='Y'){ ?>
     <td class="tdl">&nbsp;<?php echo strtoupper($ResRep['DesigName']); ?></td>
     <td class="tdc"><?php echo $ResRep['GradeValue']; ?></td>
     <?php } ?>
     <?php $sqlE=mysql_query("select * from hrm_employee_reporting where AppraiserId=".$ResRep['EmployeeID'],$con); 
	       $rowE=mysql_num_rows($sqlE);?>				 
	 <td class="tdc"><?php if($rowE>0){ ?><a href="#" onClick="EmpTeam(<?php echo $ResRep['EmployeeID'].', '.$CompanyId; ?>)"><font color="#000099">Team</font></a><?php } else{ ''; } ?></td>
	 
	 <?php if($rL['Show_Elig']=='Y'){ ?>
     <td class="tdc"><a href="javascript:ReadElig(<?php echo $ResRep['EmployeeID'].', '.$CompanyId; ?>)">Click</a></td>
     <?php } ?>
     
     <td class="tdc"><a href="javascript:ReadTra(<?php echo $ResRep['EmployeeID'].', '.$CompanyId; ?>)">Click</a></td>
     <?php if($CompanyId==1){ ?>
     <td class="tdc"><?php $sqlShow=mysql_query("select UseKRA from hrm_pms_kra where YearId=".$YearId." AND EmployeeID=".$ResRep['EmployeeID'], $con);  $resShow=mysql_fetch_assoc($sqlShow); if($resShow['UseKRA']=='A' OR $resShow['UseKRA']=='H' OR $resShow['UseKRA']=='R'){ ?><a href="#" onClick="EmpKRA(<?php echo $CompanyId.', '.$YearId.','.$ResRep['EmployeeID']; ?>)">Click</a><?php } ?>
	 </td>
	 <?php } ?>
     <?php /* <td style="font-family:Georgia; font-size:11px; width:50px;" align="center"><a href="javascript:ReadHistory(<?php echo $ResRep['EmployeeID']; ?>)">Click</a></td> */ ?>
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

