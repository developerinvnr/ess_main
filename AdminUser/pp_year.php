<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
if($_REQUEST['YI']==1){$Y=2012; $Y2=2013;}elseif($_REQUEST['YI']==2){$Y=2013; $Y2=2014;}elseif($_REQUEST['YI']==3){$Y=2014; $Y2=2015;}elseif($_REQUEST['YI']==4){$Y=2015; $Y2=2016;}elseif($_REQUEST['YI']==5){$Y=2016; $Y2=2017;}elseif($_REQUEST['YI']==6){$Y=2017; $Y2=2018;}elseif($_REQUEST['YI']==7){$Y=2018; $Y2=2019;}elseif($_REQUEST['YI']==8){$Y=2019; $Y2=2020;}elseif($_REQUEST['YI']==9){$Y=2020; $Y2=2021;}elseif($_REQUEST['YI']==10){$Y=2021; $Y2=2022;}elseif($_REQUEST['YI']==11){$Y=2022; $Y2=2023;}elseif($_REQUEST['YI']==12){$Y=2023; $Y2=2024;}elseif($_REQUEST['YI']==13){$Y=2024; $Y2=2025;}elseif($_REQUEST['YI']==14){$Y=2025; $Y2=2026;}elseif($_REQUEST['YI']==15){$Y=2026; $Y2=2027;}elseif($_REQUEST['YI']==15){$Y=2026; $Y2=2027;}elseif($_REQUEST['YI']==16){$Y=2027; $Y2=2028;}elseif($_REQUEST['YI']==17){$Y=2028; $Y2=2029;}elseif($_REQUEST['YI']==18){$Y=2029; $Y2=2030;}
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
.th{ font-family:Times New Roman;font-size:12px;height:25px;text-align:center; background-color:#7a6189;color:#FFFFFF;font-weight:bold; }
.tdl{ font-family:Times New Roman;font-size:12px;text-align:left; }
.tdr{ font-family:Times New Roman;font-size:12px;text-align:right; }
.tdc{ font-family:Times New Roman;font-size:12px;text-align:center; }
.tdinput{ font-family:Times New Roman;font-size:14px;text-align:center;width:100%; border:hidden; }
.tdinputl{ font-family:Times New Roman;font-size:14px;text-align:left;width:100%; border:hidden; }
.tdsel{ font-family:Times New Roman;font-size:14px;text-align:left;}
.inner_table{height:500px;overflow-y:auto;width:auto;}
.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;} .All{font-size:11px; height:20px;} .All_80{font-size:11px; height:20px; width:80px;}
.All_40{font-size:11px; height:20px; width:40px;} .All_50{font-size:11px; height:20px; width:50px;} .All_70{font-size:11px; height:20px; width:70px;} .All_80{font-size:11px; height:20px; width:80px;}.All_100{font-size:11px; height:20px; width:100px;} .All_120{font-size:11px; height:20px; width:120px;} .All_140{font-size:11px; height:20px; width:140px;} .All_60{font-size:11px; height:20px; width:60px;}
.All_150{font-size:11px; height:20px; width:150px;}.All_170{font-size:11px; height:20px; width:170px;}.All_180{font-size:11px; height:20px; width:180px;}.All_190{font-size:11px; height:20px; width:190px;} .All_200{font-size:11px; height:20px; width:200px;} .All_450{font-size:11px; height:20px; width:450px;}.All_360{font-size:11px; height:20px; width:350px;}.All_540{font-size:11px; height:20px; width:540px;}.All_400{font-size:11px; height:20px; width:400px;} .All_600{font-size:11px; height:20px; width:600px;}.recCls{font-family:Georgia; font-size:12px;}.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<script>$(document).ready(function () { $("#table1").freezeHeader({ 'height': '500px' }); })</script>
<Script type="text/javascript" language="javascript">

function FilterSel(v,t)
{
  var c=document.getElementById("ComId").value;     
  var y=document.getElementById("YearID").value; 
  var d=document.getElementById("DeptInc").value;     
  //var h=document.getElementById("HodInc").value; 
  if(t=='d'){ var h=0; }else if(t=='h'){ var d=0; }
  window.location='pp_year.php?action=EmpHodStdInc&c='+c+'&y='+y+'&d='+d+'&h='+h;
}


function ExportHodPPInc(d,y,h,c)
{   
  window.open("pp_yearExport.php?action=HodPPIncExport&d="+d+"&c="+c+"&y="+y+"&h="+h,"ExportForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}
  
function FucChk(sn)
{ if(document.getElementById("Chk"+sn).checked==true){document.getElementById("TR"+sn).style.background='#9BEF47'; }

  else if(document.getElementById("Chk"+sn).checked==false){document.getElementById("TR"+sn).style.background='#FFFFFF'; }
}

//    
</Script>
</head>
<body class="body" bgcolor="">
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" name="YId" id="YId" value="<?php echo $_REQUEST['YI']; ?>" />
<input type="hidden" name="UserId" id="UserId" value="<?php echo $UserId; ?>" />
<input type="hidden" name="StdValue" id="StdValue" value="<?php echo $_REQUEST['value']; ?>" />
<input type="hidden" name="ee" id="ee" value="<?php echo $_REQUEST['ee']; ?>" />
<input type="hidden" name="act" id="act" value="<?php echo $_REQUEST['act']; ?>" />
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
	  <td valign="top" align="center" width="100%" id="MainWindow">
<?php //*****************************************************************?>
<?php //************START*****START*****START******START******START*******?>
<?php //*******************************************************************************?>
<table border="0" style="margin-top:0px;width:100%;">
	<tr>
		<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true AND ($_SESSION['PMS']==1 OR $_SESSION['PMS_Report']==1)) { ?>
		<td align="" width="100%" valign="top">
		   <table border="0">
       		 <tr><td colspan="2">
			       <table border="0">
                     <tr>
					  <td colspan="12" align="left" class="heading">HOD Performane Pay &nbsp;<span id="ReturnValue">&nbsp;</span></td>
					  <td>
				    <table border="0">
                    <tr>
	     
<td class="td1" style="font-size:14px;width:120px;font-family:Times New Roman;" ><select class="tdsel" style="background-color:#DDFFBB;width:120px;" name="YearID" id="YearID" onChange="FilterSel(this.value,'y')"><option value="" >Year</option><?php $SqlYear=mysql_query("select y.YearId,FromDate,ToDate from hrm_year y where y.YearId>=12 and YearId<=".$YearId." order by YearId DESC", $con); while($ResYear=mysql_fetch_array($SqlYear)) { ?><option value="<?php echo $ResYear['YearId']; ?>" <?php if($_REQUEST['y']==$ResYear['YearId']){echo 'selected';} ?>><?php echo date("Y",strtotime($ResYear['FromDate'])).'-'.date("Y",strtotime($ResYear['ToDate'])); if($ResYear['YearId']>5){ echo ' - Y'; } ?></option><?php } ?></select></td>

<td class="td1" style="font-size:11px; width:160px;" align="center"><select style="font-size:12px; width:158px; height:20px; background-color:#DDFFBB;" name="DeptInc" id="DeptInc" onChange="FilterSel(this.value,'d')"><option value="" style="margin-left:0px;" selected>SELECT DEPARTMENT</option><?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?><option value="<?php echo $ResDept['DepartmentId']; ?>" <?php if($_REQUEST['d']==$ResDept['DepartmentId']){echo 'selected';} ?>><?php echo '&nbsp;'.$ResDept['DepartmentCode'];?></option><?php } ?><option value="0" <?php if($_REQUEST['d']==0){echo 'selected';} ?>>&nbsp;All</option></select></td>

                     </tr>
				   </table>					
				   </td>                           
<?php } ?>					 
		           </tr>
                  </table>
				</td>
			 </tr>
			 
<tr>
 <td>
   <table border="1" cellspacing="0" style="width:100%;">
    <tr>
     <td style="font-family:Times New Roman; font-size:16px;background-color:#FFFFFF;">
     <?php $sqlCk=mysql_query("select s.*,concat(Fname, ' ',Sname, ' ',Lname) as Name from hrm_pp_workingsheet_submission s inner join hrm_employee e on s.hodid=e.EmployeeID where e.CompanyId=".$CompanyId." and s.yearid=".$_REQUEST['y']." group by s.hodid asc"); 
     while($resCk=mysql_fetch_assoc($sqlCk)){ ?>
     <i><?php echo $resCk['Name']; if($resCk['substs']=='YY'){ echo '-<font style="color:#005300"><b>Submitted</b></font>';}else{echo '-<font style="color:#FF7533"><b>Pending</b></font>';} ?></i>&nbsp;&nbsp;&nbsp;&nbsp;
     <?php } ?>
     </td>
    </tr>
   </table>
 </td>
</tr> 
<?php //------------------Display Record---------------------------------- ?>
<?php if($_REQUEST['action']=='EmpHodStdInc') { ?>

<tr>
 <td>
   <table border="1" id="table1" cellspacing="0" style="width:1200px;">
   <div class="thead">
	 <thead>
     <tr>
  <td colspan="14" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Times New Roman; font-weight:bold;">&nbsp;Employee Performance Pay : &nbsp;&nbsp;&nbsp;<a href="#" onClick="ExportHodPPInc(<?=$_REQUEST['d'].','.$_REQUEST['y'].','.$_REQUEST['h'].','.$CompanyId; ?>)" style="color:#F9F900; font-size:12px;">Export Excel</a></td>
	 </tr>
	 <tr bgcolor="#7a6189">
	  <td rowspan="2" style="width:30px;">&nbsp;</td>
	  <td rowspan="2" class="th" style="width:50px;"><b>SNo.</b></td>
	  <td colspan="5" class="th"><b>EMPLOYEE DETAILS</b></td>
	  <td rowspan="2" class="th" style="width:50px;"><b>Gross Paid</b></td>
	  <td rowspan="2" class="th" style="width:50px;"><b>PP %</b></td>
	  <td rowspan="2" class="th" style="width:50px;"><b>PP Amount</b></td>
	 </tr>
	 <tr bgcolor="#7a6189">
		<td class="th" style="width:50px;"><b>EC</b></td>
		<td class="th" style="width:250px;"><b>NAME</b></td>
		<td class="th" style="width:120px;"><b>DEPARTMENT</td>
		<td class="th" style="width:200px;"><b>DESIGNATION</td>
		<td class="th" style="width:50px;"><b>GRADE</td>
	</tr>
	</thead>
	</div>
<?php 
$yCond='p.AssessmentYear='.$_REQUEST['y']; $dCond='1=1'; $hCond='1=1';
if($_REQUEST['d']>0){ $dCond='p.HR_Curr_DepartmentId='.$_REQUEST['d']; }
if($_REQUEST['h']>0){ $dCond='p.HOD_EmployeeID='.$_REQUEST['h']; }

$sql=mysql_query("select e.EmployeeID,EmpCode,concat(Fname, ' ',Sname, ' ',Lname) as Name, EmpPmsId, VP_CurrYearVariablePay, VP_GrossPaid, VP_Final_Per, VP_PayAmt, HR_Curr_DepartmentId, HR_CurrDesigId, HR_CurrGradeId, HOD_EmployeeID from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID where e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_REQUEST['y']." AND ".$dCond." AND ".$hCond." AND p.Hod_TotalFinalRating>2.7 AND VP_PayAmt>0 order by e.ECode ASC", $con);

 $Sno=1; while($res=mysql_fetch_array($sql))
 { 
 $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['HR_Curr_DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); 
 $sqlDesig=mysql_query("select DesigName,DesigCode from hrm_designation where DesigId=".$res['HR_CurrDesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
 $sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['HR_CurrGradeId'], $con);  $resG=mysql_fetch_assoc($sqlG);
 
?>		
    <div class="tbody">
	 <tbody>
	<tr bgcolor="#FFFFFF" id="TR<?php echo $Sno; ?>">
	  <td class="tdc"><input type="checkbox" id="Chk<?php echo $Sno; ?>" onClick="FucChk(<?php echo $Sno; ?>)" /></td>
      <td class="tdc"><?php echo $Sno; ?></td>
	  <td class="tdc"><?php echo $res['EmpCode']; ?></td>
	  <td class="tdl"><?php echo $res['Name']; ?></td>	
	  <td class="tdl"><?php echo $resDept['DepartmentCode']; ?></td>
	  <td class="tdl"><?php echo $resDesig['DesigCode']; ?></td>
	  <td class="tdc"><?php echo $resG['GradeValue']; ?></td>
	  <td class="tdr"><?php echo intval($res['VP_GrossPaid']); ?>&nbsp;</td>
	  <td class="tdc"><?php echo floatval($res['VP_Final_Per']); ?></td>
	  <td class="tdr"><?php echo round($res['VP_PayAmt']); ?>&nbsp;</td>
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
<?php //***************************************************************************?>
<?php //************END*****END*****END******END******END**********************?>
<?php //*****************************************************************************?>
	  </td>
	</tr>
	  </table>
 </td>
</tr>
</table>
</body>
</html>