<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<style>.font { color:#ffffff; font-family:Georgia; font-size:11px; width:200px;} .font1 { font-family:Georgia; font-size:11px; height:14px; } 
.font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }
.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
</head>
<body class="body">
<center>
<?php //*************************************************************************************************************************************************** ?>	
<?php $Sql=mysql_query("SELECT Fname,Sname,Lname,Married,Gender,DR FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmployeeID=".$_REQUEST['E'], $con); $Res=mysql_fetch_assoc($Sql);
if($Res['DR']=='Y'){$M='Dr.';} elseif($Res['Gender']=='M'){$M='Mr.';} elseif($Res['Gender']=='F' AND $Res['Married']=='Y'){$M='Mrs.';} elseif($Res['Gender']=='F' AND $Res['Married']=='N'){$M='Miss.';}  $Name=$M.' '.$Res['Fname'].' '.$Res['Sname'].' '.$Res['Lname']; ?>
	     <table border="0" style="width:1000px; margin-top:0px;">
			<tr>
			<td colspan="5" style="width:1000px; font-family:Times New Roman; font-size:15px;"><b>&nbsp;<font color="#0000FF">Name : </font><?php echo $Name; ?></b></td>
			</tr>
			<tr>
<?php //---------------------------------------------------------Training/ Conferance-----------------------------------------------------------------------------------?>	
<?php $sqlTr=mysql_query("select * from hrm_company_training_participant INNER JOIN hrm_company_training ON hrm_company_training_participant.TrainingId=hrm_company_training.TrainingId where hrm_company_training_participant.EmployeeID=".$_REQUEST['E']." order by TraFrom DESC", $con); $rowTr=mysql_num_rows($sqlTr);
$sqlCo=mysql_query("select * from hrm_company_conference_participant INNER JOIN hrm_company_conference ON hrm_company_conference_participant.ConferenceId=hrm_company_conference.ConferenceId where hrm_company_conference_participant.EmployeeID=".$_REQUEST['E']." order by ConfFrom DESC", $con); $rowCo=mysql_num_rows($sqlCo); ?>		 
		 <td valign="top" id="DTEdu" style="font-family:Times New Roman;size:12px;;">
		   <table border="1" style="background-color:#7a6189;">
<tr><td colspan="9" style="width:40px;color:#FFFFFF;background-color:#7a6189;" align=""><b>&nbsp;TRAINING</b></td></tr>		   
<tr style="background-color:#E3DCED;">
<td style="width:40px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>SN</b></td>
<td style="width:200px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Subject</b></td>
<td style="width:60px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Year</b></td>
<td style="width:80px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Date From</b></td>
<td style="width:80px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Date To</b></td>
<td style="width:50px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Day</b></td>
<td style="width:200px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Location</b></td>
<td style="width:200px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Institute</b></td>
<td style="width:200px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Trainer</b></td>

</tr>
<?php $SN=1; while($resTr=mysql_fetch_array($sqlTr)) { ?>	  	  	
<tr style="background-color:#E3DCED;">
<td valign="top" style="color:#000;" align="center"><?php echo $SN; ?></td>
<td valign="top" style="color:#000;" align=""><?php echo $resTr['TraTitle']; ?></td>
<td valign="top" style="color:#000;" align="center"><?php echo $resTr['TraYear']; ?></td>
<td valign="top" style="color:#000;font-size:12px;" align="center"><?php echo date("d-M-y",strtotime($resTr['TraFrom'])); ?></td>
<td valign="top" style="color:#000;font-size:12px;" align="center"><?php echo date("d-M-y",strtotime($resTr['TraTo'])); ?></td>
<td valign="top" style="color:#000;" align="center"><?php echo $resTr['Duration']; ?></td>
<td valign="top" style="color:#000;" align=""><?php echo $resTr['Location']; ?></td>
<td valign="top" style="color:#000;" align=""><?php echo $resTr['Institute']; ?></td>
<td valign="top" style="color:#000;font-size:12px;" align=""><?php echo $resTr['TrainerName']; ?></td>
</tr>	
<?php $SN++; }  if($rowCo>0){ ?>	
<tr><td colspan="9" style="width:40px;color:#FFFFFF;background-color:#7a6189;" align=""><b>&nbsp;CONFERENCE</b></td></tr>		   
<tr style="background-color:#E3DCED;">
<td style="width:40px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>SN</b></td>
<td colspan="2" style="width:200px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Subject</b></td>
<td style="width:60px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Year</b></td>
<td style="width:80px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Date From</b></td>
<td style="width:80px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Date To</b></td>
<td style="width:50px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Day</b></td>
<td style="width:200px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Location</b></td>
<td style="width:200px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Conducted By</b></td>
</tr>  	
<?php $SN=1; while($resCo=mysql_fetch_array($sqlCo)) { ?>  	
<tr style="background-color:#E3DCED;">
<td valign="top" style="color:#000;" align="center"><?php echo $SN; ?></td>
<td colspan="2" valign="top" style="color:#000;" align=""><?php echo $resCo['ConfTitle']; ?></td>
<td valign="top" style="color:#000;" align="center"><?php echo $resCo['ConfYear']; ?></td>
<td valign="top" style="color:#000;font-size:12px;" align="center"><?php echo date("d-M-y",strtotime($resCo['ConfFrom'])); ?></td>
<td valign="top" style="color:#000;font-size:12px;" align="center"><?php echo date("d-M-y",strtotime($resCo['ConfTo'])); ?></td>
<td valign="top" style="color:#000;" align="center"><?php echo $resCo['Duration']; ?></td>
<td valign="top" style="color:#000;" align=""><?php echo $resCo['Location']; ?></td>
<td valign="top" style="color:#000;" align=""><?php echo $resCo['ConductedBy']; ?></td>
</tr>	
<?php $SN++; } }?>	
		   </table>
         </td>	
		  </tr>
		</table>
<?php //*************************************************************************************************************************************************** ?>
</center>
</body>
</html>

