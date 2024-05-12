<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
if($_REQUEST['YI']==1){$Y=2012; $Y2=2013;}elseif($_REQUEST['YI']==2){$Y=2013; $Y2=2014;}elseif($_REQUEST['YI']==3){$Y=2014; $Y2=2015;}elseif($_REQUEST['YI']==4){$Y=2015; $Y2=2016;}elseif($_REQUEST['YI']==5){$Y=2016; $Y2=2017;}elseif($_REQUEST['YI']==6){$Y=2017; $Y2=2018;}elseif($_REQUEST['YI']==7){$Y=2018; $Y2=2019;}elseif($_REQUEST['YI']==8){$Y=2019; $Y2=2020;}elseif($_REQUEST['YI']==9){$Y=2020; $Y2=2021;}
if($CompanyId==1 OR $CompanyId==2 OR $CompanyId==4){$YYear=$Y;}elseif($CompanyId==3){$YYear=$Y2;}
//****************************************************************************************************************
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.th{ font-family:Times New Roman;font-size:12px;height:25px;text-align:center;color:#FFFFFF;font-weight:bold; }
.tdl{ font-family:Times New Roman;font-size:12px;text-align:left; }
.tdc{ font-family:Times New Roman;font-size:12px;text-align:center; }
.tdinput{ font-family:Times New Roman;font-size:14px;text-align:center;width:100%; border:hidden; }
.tdinputl{ font-family:Times New Roman;font-size:14px;text-align:left;width:100%; border:hidden; }
.tdsel{ font-family:Times New Roman;font-size:14px;text-align:left;}
.inner_table{height:500px;overflow-y:auto;width:auto;}
.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;} .All{font-size:11px; height:20px;} .All_80{font-size:11px; height:20px; width:80px;}
.All_40{font-size:11px; height:20px; width:40px;} .All_50{font-size:11px; height:20px; width:50px;} .All_70{font-size:11px; height:20px; width:70px;} .All_80{font-size:11px; height:20px; width:80px;}.All_100{font-size:11px; height:20px; width:100px;} .All_120{font-size:11px; height:20px; width:120px;} .All_140{font-size:11px; height:20px; width:140px;} .All_60{font-size:11px; height:20px; width:60px;}
.All_150{font-size:11px; height:20px; width:150px;}.All_170{font-size:11px; height:20px; width:170px;}.All_180{font-size:11px; height:20px; width:180px;}.All_190{font-size:11px; height:20px; width:190px;} .All_200{font-size:11px; height:20px; width:200px;} .All_450{font-size:11px; height:20px; width:450px;}.All_360{font-size:11px; height:20px; width:350px;}.All_540{font-size:11px; height:20px; width:540px;}.All_400{font-size:11px; height:20px; width:400px;} .All_600{font-size:11px; height:20px; width:600px;}.recCls{font-family:Georgia; font-size:12px;}.All_500{font-size:11px; height:20px; width:500px;}.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<script>$(document).ready(function () { $("#table1").freezeHeader({ 'height': '500px' }); })</script>
<Script type="text/javascript" language="javascript">
function SelectYear(v){window.location='AppsalPmseFormAch.php?YI='+v;}
function SelectEAch(v,yi,e,a)
{ if(e=='d'){var ee='Dept';}else if(e=='a'){var ee='App';}else if(e=='r'){var ee='Rev';}else if(e=='h'){var ee='Hod';} 
  window.location='AppsalPmseFormAch.php?action=EmpAch&ee='+ee+'&value='+v+'&YI='+yi+'&a='+a;}
    
function PrintAch(v,yi,ee,a)
{var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value;
 window.open("PrintPMSFormAch.php?action=Score&value="+v+"&c="+ComId+"&YI="+yi+"&ee="+ee+'&a='+a,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=50,height=50");}

function ExportAch(v,yi,ee,a)
{ var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value;   
  window.open("ExportPmsFormAch.php?action=FormAchExport&value="+v+"&c="+ComId+"&YI="+yi+"&ee="+ee+'&a='+a,"ExportForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}

 
function FucChk(sn)
{ if(document.getElementById("Chk"+sn).checked==true){document.getElementById("TR"+sn).style.background='#9BEF47'; }
  else if(document.getElementById("Chk"+sn).checked==false){document.getElementById("TR"+sn).style.background='#FFFFFF'; }
}

//    
</Script>
</head>
<body class="body" bgcolor="">
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" name="YId" id="YId" value="<?php echo $YearId; ?>" />
<input type="hidden" name="UserId" id="UserId" value="<?php echo $UserId; ?>" />
<input type="hidden" name="DeptValue" id="DeptValue" value="<?php echo $_REQUEST['value']; ?>" />
<table class="table" border="0">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center" style="width:100%;" id="MainWindow">
<?php //*********************************************************************************?>
<?php //*****************START*****START*****START******START******START************************?>
<?php //***********************************************************************************?>
<table border="0" style="margin-top:0px; width:100%;">
	<tr>
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true AND ($_SESSION['PMS']==1 OR $_SESSION['PMS_Report']==1)) { ?>
		<td align="" style="width:100%;" valign="top">
		   <table border="0" style="width:100%;">
       		 <tr><td colspan="2">
			       <table border="0">
                     <tr>
					  <td style="width:20%;" align="left" class="heading">Achievement List &nbsp;<span id="ReturnValue">&nbsp;</span></td>
					  <td>
				    <table border="0">
                    <tr>
<?php $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; ?>	     
<td class="td1" style="font-size:14px;width:180px;font-family:Times New Roman;" >&nbsp;&nbsp;<b>Year:</b>&nbsp;
<select class="tdsel" style="background-color:#DDFFBB;width:115px;" name="YearID" id="YearID" onChange="SelectYear(this.value)"><?php if($_REQUEST['YI']!=''){ $SqlY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI'], $con); $ResY=mysql_fetch_array($SqlY); ?><option value="<?php echo $ResY['YearId']; ?>"><?php echo date("Y",strtotime($ResY['FromDate'])).'-'.date("Y",strtotime($ResY['ToDate'])); if($ResY['YearId']>5){ echo ' - Y'; }?></option><?php }else{ ?><option value="" selected>Year</option><?php } $SqlYear=mysql_query("select y.YearId,FromDate,ToDate from hrm_employee_pms p inner join hrm_year y on p.AssessmentYear=y.YearId where CompanyId=".$CompanyId." group by AssessmentYear order by AssessmentYear DESC", $con); while($ResYear=mysql_fetch_array($SqlYear)) { ?><option value="<?php echo $ResYear['YearId']; ?>"><?php echo date("Y",strtotime($ResYear['FromDate'])).'-'.date("Y",strtotime($ResYear['ToDate'])); if($ResYear['YearId']>5){ echo ' - Y'; } ?></option><?php } ?></select></td>	
<td class="td1" style="font-size:12px;" align="center"> <select style="font-size:12px; width:158px; height:20px; background-color:#DDFFBB;" name="DeptScore" id="DeptScore" onChange="SelectEAch(this.value,<?php echo $_REQUEST['YI']; ?>,'d',0)"><option value="" style="margin-left:0px;" selected>SELECT DEPARTMENT</option><?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?><option value="<?php echo $ResDept['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDept['DepartmentCode'];?></option><?php } ?><option value="0">&nbsp;All</option></select></td>
<?php /*					   
<td>&nbsp;</td>
<td class="td1" style="font-size:12px; width:150px;" align="center">
                       <select style="font-size:12px; width:158px; height:20px; background-color:#DDFFBB;" name="DeptScore" id="DeptScore" onChange="SelectEAch(this.value,<?php echo $_REQUEST['YI']; ?>,'d',1)"><option value="" style="margin-left:0px;" selected>NAME WISE</option>
<?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?>
                       <option value="<?php echo $ResDept['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDept['DepartmentCode'];?></option><?php } ?>
					   <option value="0">&nbsp;All</option>
					   </select></td>
*/ ?>

                     </tr>
				   </table>					
				   </td>                           
<?php } ?>					 
		           </tr>
                  </table>
				</td>
			 </tr>
<?php //---------------------------------------Display Record------------------------------- ?>
<?php if($_REQUEST['action']=='EmpAch') { ?>
<?php 
if($_REQUEST['ee']=='Dept')
{ $name='Department Wise'; 
  if($_REQUEST['value']!=0)
  { $sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); $name2=$resA['DepartmentName']; }
  else{$name2='All Department';}
}
?>

<tr>
 <td style="width:100%;">
   <table border="1" id="table1" cellspacing="0" style="width:100%;">
   <div class="thead>">
   <thead>
     <tr>
  <td colspan="<?php if($_REQUEST['a']==0){echo 3;}else{echo 7;} ?>" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Times New Roman; font-weight:bold;">&nbsp;Achievement List <?php echo $name; ?> : &nbsp;&nbsp;(&nbsp;<?php echo $name2; ?>&nbsp;)&nbsp;&nbsp;&nbsp;<a href="#" onClick="ExportAch(<?php echo $_REQUEST['value']; ?>,<?php echo $_REQUEST['YI']; ?>,'<?php echo $_REQUEST['ee']; ?>',<?php echo $_REQUEST['a']; ?>)" style="color:#F9F900; font-size:12px;">Export Excel</a>
	  </td>
	  
	 <?php /*?> <a href="#" onClick="PrintAch(<?php echo $_REQUEST['value']; ?>,<?php echo $_REQUEST['YI']; ?>,'<?php echo $_REQUEST['ee']; ?>',<?php echo $_REQUEST['a']; ?>)" style="color:#F9F900; font-size:12px;">Print</a><?php */?>
	  
	 </tr>
	 <tr bgcolor="#7a6189">
	    <td class="th" style="width:2%;">&nbsp;</td>
		<td class="th" style="width:4%;"><b>SNo.</b></td>
<?php /* if($_REQUEST['a']==1){ ?>
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>EC</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_250"><b>Name</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_120"><b>Department</b></td>	
		<td align="center" style="color:#FFFFFF;" class="All_150"><b>Designation</b></td>	
<?php } */ ?>
		<td class="th" style="width:94%;"><b>Achievement</b></td>
     </tr>
	 </thead>
	 </div>
<?php 
if($_REQUEST['ee']=='Dept' AND $_REQUEST['a']==0)
{  
  if($_REQUEST['value']==0)
  { $sql=mysql_query("SELECT * from hrm_employee_pms_achivement INNER JOIN hrm_employee_pms ON hrm_employee_pms_achivement.EmpPmsId=hrm_employee_pms.EmpPmsId INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms_achivement.Achivement!='' order by AchivementId ASC", $con); }
  else{ $sql=mysql_query("SELECT * from hrm_employee_pms_achivement INNER JOIN hrm_employee_pms ON hrm_employee_pms_achivement.EmpPmsId=hrm_employee_pms.EmpPmsId INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms_achivement.Achivement!='' AND hrm_employee_pms.HR_Curr_DepartmentId=".$_REQUEST['value']." order by AchivementId ASC", $con); }
}
/*
if($_REQUEST['ee']=='Dept' AND $_REQUEST['a']==1)
{  
  if($_REQUEST['value']==0)
  { $sql=mysql_query("SELECT EmpCode,Fname,Sname,Lname,DesigId,hrm_employee_general.DepartmentId,KRA,KRA_Description,Measure,Unit,Weightage,Target FROM hrm_pms_kra INNER JOIN hrm_employee ON hrm_pms_kra.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_pms_kra.EmployeeID=hrm_employee_general.EmployeeID WHERE hrm_pms_kra.YearId=".$_REQUEST['YI']."  AND hrm_pms_kra.CompanyId=".$CompanyId." AND (hrm_pms_kra.KRAStatus='A' OR hrm_pms_kra.KRAStatus='R') AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee.EmpCode!=11001 order by hrm_employee.EmpCode ASC, hrm_pms_kra.KRAId ASC", $con); }
  else{ $sql=mysql_query("SELECT EmpCode,Fname,Sname,Lname,DesigId,hrm_employee_general.DepartmentId,KRA,KRA_Description,Measure,Unit,Weightage,Target FROM hrm_pms_kra INNER JOIN hrm_employee ON hrm_pms_kra.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_pms_kra.EmployeeID=hrm_employee_general.EmployeeID WHERE hrm_pms_kra.DepartmentId=".$_REQUEST['value']." AND hrm_pms_kra.YearId=".$_REQUEST['YI']."  AND hrm_pms_kra.CompanyId=".$CompanyId." AND (hrm_pms_kra.KRAStatus='A' OR hrm_pms_kra.KRAStatus='R') AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee.EmpCode!=11001 order by hrm_employee.EmpCode ASC, hrm_pms_kra.KRAId ASC", $con); }
}
*/
 $Sno=1; while($res=mysql_fetch_array($sql)){ 
 if($_REQUEST['a']==1){
 $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); 
 $sqlDesig=mysql_query("select DesigName,DesigCode from hrm_designation where DesigId=".$res['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
 //$sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['HR_CurrGradeId'], $con);  $resG=mysql_fetch_assoc($sqlG);
 }
?>	 
<div class="tbody">
<tbody>  
	 <tr bgcolor="#FFFFFF" id="TR<?php echo $Sno; ?>">
	    <td class="tdc"><input type="checkbox" id="Chk<?php echo $Sno; ?>" onClick="FucChk(<?php echo $Sno; ?>)" /></td>
		<td class="tdc"><?php echo $Sno; ?></td>
<?php /* if($_REQUEST['a']==1){?>
		<td align="center" class="recCls" valign="top"><?php echo $res['EmpCode']; ?></td>
		<td class="recCls" valign="top"><?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
		<td class="recCls" valign="top"><?php echo $resDept['DepartmentCode']; ?></td>
		<td class="recCls" valign="top"><?php echo $resDesig['DesigName']; ?></td>	
<?php } */ ?>		
		<td class="tdl"><?php echo $res['Achivement']; ?></td>	
	 </tr>
</tbody>
</div>	 
	 <?php $Sno++; } ?>
   </table>
 </td>
</tr> 
<?php } ?>		
<?php //-------------------------------------------------------------------------------------------------------- ?>
		
	</tr>
</table>
<?php //*******************************************************************************?>
<?php //*******************END*****END*****END******END******END***********************************?>
<?php //***************************************************************************************?>
	  </td>
	</tr>
	  </table>
 </td>
</tr>
</table>
</body>
</html>