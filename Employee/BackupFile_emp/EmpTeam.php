<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<style>.font { color:#ffffff; font-family:Georgia; font-size:11px; width:200px;} .font1 { font-family:Georgia; font-size:11px; height:14px; } 
.font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }
.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
</head>
<script>
function ReadHistory(EI)
{window.open("EmpHistory.php?EI="+EI,"HForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=920,height=600");}

function Read2Tra(E,C)
{window.open("EmpTaringConf.php?E="+E+"&C="+C,"TeamFile","menubar=no,scrollbars=yes,resizable=no,directories=no,width=1000,height=600");}	

function ReadElig(ei,ci)
{ window.open("MyTeamEmpElig.php?ei="+ei+"&ci="+ci+"&aa=wew&r=w%w%w&g=true%true&s=0889","HForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=730,height=610"); }

function EmpKRA(CId,YId,EmpId) 
{ window.open ("EmpKraForm.php?YId="+YId+"&EmpId="+EmpId+"&CId="+CId,"KRAForm","menubar=yes,scrollbars=yes,resizable=1,width=1100,height=500");}

</script>
<body class="body">
<?php //*************************************************************************************************************************************************** ?>	
<?php $Sql=mysql_query("SELECT DepartmentId,DesigId,EmpCode,Fname,Sname,Lname,Married,Gender,DR FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmployeeID=".$_REQUEST['E']." AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['C']." order by EmpCode ASC", $con); $Res=mysql_fetch_assoc($Sql);
if($Res['DR']=='Y'){$M='Dr.';} elseif($Res['Gender']=='M'){$M='Mr.';} elseif($Res['Gender']=='F' AND $Res['Married']=='Y'){$M='Mrs.';} elseif($Res['Gender']=='F' AND $Res['Married']=='N'){$M='Miss.';}  $Name=$M.' '.$Res['Fname'].' '.$Res['Sname'].' '.$Res['Lname']; ?> 
	     <table border="0" style="width:100%; margin-top:0px;">
			<tr>
			<td colspan="5" style="width:100%; font-family:Times New Roman; font-size:15px;"><b>&nbsp;<font color="#0000FF">Team in </font><?php echo $Name; ?>&nbsp;:-</b></td>
			</tr>
			
<?php $sqlSetH=mysql_query("select * from hrm_pms_setting where CompanyId=".$_REQUEST['C']." AND Process='PMS' ", $con);  
      $resSetH=mysql_fetch_array($sqlSetH); ?>			
			
			<tr>
			<td style="width:100%;">
			<table border="1" style="width:100%;" cellspacing="1">
			<tr bgcolor="#7a6189" style="height:24px;">
		     <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:50px;"><b>SNo</b></td>
		     <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:50px;" align="center"><b>EC</b></td>
		     <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:200px;" align="center"><b>Name</b></td>
		     <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:150px;" align="center"><b>Department</b></td>
		     
		     <?php if($resSetH['Show_GradeDesig']=='Y'){ ?>
 		     <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:250px;" align="center"><b>Designation</b></td>
 		     <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:50px;" align="center"><b>Grade</b></td>
 		     <?php } ?>
 		     
			 
			 <?php if($_REQUEST['D']!=6 AND $_REQUEST['D']!=7 AND $_REQUEST['D']!=12 AND $_REQUEST['D']!=9 AND $_REQUEST['D']!=25 AND $_REQUEST['D']!=3){ ?>
			 
			 <?php if($resSetH['Show_History']=='Y'){ ?>
			  <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" align="center"><b>History</b></td>
			 <?php } ?>
			 
			 <?php } ?>
			 
			 <?php if($resSetH['Show_Elig']=='Y'){ ?>
			  <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" align="center"><b>Eligibility</b></td>
			 <?php } ?>
			 
             <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:100px;" align="center"><b>Training Conf.</b></td>
                  
			 
			 
		    </tr>	
<?php $SqlRep=mysql_query("SELECT hrm_employee.EmployeeID,DepartmentId,DesigId,GradeId,EmpCode,Fname,Sname,Lname,Married,Gender,DR FROM hrm_employee_reporting INNER JOIN hrm_employee ON hrm_employee_reporting.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_reporting.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_reporting.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee_reporting.AppraiserId=".$_REQUEST['E']." AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['C']." order by EmpCode ASC", $con); $sn=1; while($ResRep=mysql_fetch_array($SqlRep)) { 
if($ResRep['DR']=='Y'){$MS='Dr.';} elseif($ResRep['Gender']=='M'){$MS='Mr.';} elseif($ResRep['Gender']=='F' AND $ResRep['Married']=='Y'){$MS='Mrs.';} elseif($ResRep['Gender']=='F' AND $ResRep['Married']=='N'){$MS='Miss.';}  $EmpName=$MS.' '.$ResRep['Fname'].' '.$ResRep['Sname'].' '.$ResRep['Lname']; 
$SqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$ResRep['DepartmentId'], $con); $ResDept=mysql_fetch_assoc($SqlDept);	
$SqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$ResRep['DesigId'], $con); $ResDesig=mysql_fetch_assoc($SqlDesig);

$SqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$ResRep['GradeId'], $con); $ResG=mysql_fetch_assoc($SqlG);

?> 			
            <tr bgcolor="#FFFFFF">
		     <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $sn; ?></td>
		     <td style="font-family:Georgia; font-size:11px; width:50px;" align="center"><?php echo $ResRep['EmpCode']; ?></td>
		     <td style="font-family:Georgia; font-size:11px; width:200px;" align="">&nbsp;<?php echo $EmpName; ?></td>
		     <td style="font-family:Georgia; font-size:11px; width:150px;" align="">&nbsp;<?php echo $ResDept['DepartmentCode']; ?></td>
		     <?php if($resSetH['Show_GradeDesig']=='Y'){ ?>
 		     <td style="font-family:Georgia; font-size:11px; width:250px;" align="">&nbsp;<?php echo $ResDesig['DesigName']; ?></td>
 		     <td style="font-family:Georgia; font-size:11px; width:50px;" align="center"><?php echo $ResG['GradeValue']; ?></td>
 		     <?php } ?>
 		     <?php if($_REQUEST['D']!=6 AND $_REQUEST['D']!=7 AND $_REQUEST['D']!=12 AND $_REQUEST['D']!=9 AND $_REQUEST['D']!=25 AND $_REQUEST['D']!=3){ ?>
			 
			 <?php if($resSetH['Show_History']=='Y'){ ?>
			  <td style="font-family:Georgia; font-size:11px; width:50px;" align="center"><a href="javascript:ReadHistory(<?php echo $ResRep['EmployeeID']; ?>)">Click</a></td>
			 <?php } ?>
			 <?php } ?>
                         
                         
                <?php if($resSetH['Show_Elig']=='Y'){ ?>         
                  <td style="font-family:Georgia; font-size:11px; width:50px;" align="center"><a href="javascript:ReadElig(<?php echo $ResRep['EmployeeID'].', '.$_REQUEST['C']; ?>)">Click</a></td>
                <?php } ?>  
<td style="font-family:Georgia; font-size:11px; width:100px;" align="center"><a href="#" onclick="Read2Tra(<?php echo $ResRep['EmployeeID'].', '.$_REQUEST['C']; ?>)">Click</a></td>
       
                         
 		     
		    </tr>
<?php $sn++; } ?>				
	        </table>
		   </tr>
		</table>
<?php //*************************************************************************************************************************************************** ?>
</body>
</html>

