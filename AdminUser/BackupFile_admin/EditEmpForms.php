<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
$sqlSY=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='PMS'", $con); $SNo=1; $resSY=mysql_fetch_array($sqlSY);
?>

<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.th{ font-family:Times New Roman;font-size:12px;height:25px;text-align:center;color:#FFFFFF;font-weight:bold;background-color:#7a6189; }
.tdl{ font-family:Times New Roman;font-size:12px;text-align:left; }
.tdc{ font-family:Times New Roman;font-size:12px;text-align:center; }
.tdinput{ font-family:Times New Roman;font-size:14px;text-align:center;width:100%;border:hidden;background-color:#DDFB9F; }
.tdinputl{ font-family:Times New Roman;font-size:14px;text-align:left;width:100%;border:hidden;background-color:#DDFB9F; }
.tdsel{ font-family:Times New Roman;font-size:14px;text-align:left;}
.inner_table{height:500px;overflow-y:auto;width:auto;}
.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;} .All{font-size:11px; height:18px;} .All_80{font-size:11px; height:18px; width:80px;}
 .All_50{font-size:11px; height:18px; width:50px;} .All_40{font-size:11px; height:18px; width:40px;} .All_100{font-size:11px; height:18px; width:100px;} 
.All_120{font-size:11px; height:18px; width:120px;} .All_150{font-size:11px; height:18px; width:150px;}.All_200{font-size:11px; height:18px; width:200px;} 
.All_350{font-size:11px; height:18px; width:350px;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<Script type="text/javascript">
$(document).ready(function () { $("#table1").freezeHeader({ 'height': '500px' }); })

function SelectYear(ey)
{
  var d=document.getElementById("DepartmentE").value; var x = "EditEmpForms.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&d="+d+"&ey="+ey;  window.location=x;
  
}

function edit(value)
{ var DI=document.getElementById("DId").value;  window.location="EditEmpKRA.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&e="+value+"&DI="+DI; }				
	
function  SelectDeptEmp(v)
{ var ey=document.getElementById("YearID").value; var x = "EditEmpForms.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&d="+v+"&ey="+ey;  window.location=x;}				

function EmpForm(CId,YId,EmpId,PmsId,N) 
{ if(N==1){var act='AchivForm';}
  else if(N==2){var act='KraForm';}
  else if(N==3){var act='BehavForm';}
  else if(N==4){var act='FeedBckForm';} 
  window.open ("EmpEditForms.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&YId="+YId+"&EmpId="+EmpId+"&CId="+CId+"&PmsId="+PmsId+"&action="+act,"KRAForm","menubar=yes,scrollbars=yes,resizable=1,width=1100,height=500");}
	
</Script>   
</head>
<body class="body">
<table class="table">
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
	  <td valign="top" align="center"  width="100%" id="MainWindow">
<table border="0" style="margin-top:0px; width:100%; height:400px;">
	<tr>
	    <td align="right" width="1%">&nbsp;</td>
<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>
		
		<td align="center" style="width:100%;" valign="top">
		  <table border="0" style="width:100%;">
		    <tr>
			 <td align="left" class="heading">Edit Employee Form</td>
<?php $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['ey']."", $con); $rY=mysql_fetch_assoc($sY); 
      $FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; ?>	     
               <td class="td1" style="width:150px;">&nbsp;&nbsp;<b>Year:</b>&nbsp;<select class="tdsel" style="background-color:#DDFFBB;width:120px;" name="YearID" id="YearID" onChange="SelectYear(this.value)"><?php if($_REQUEST['ey']!=''){ $SqlY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['ey'], $con); $ResY=mysql_fetch_array($SqlY); ?><option value="<?php echo $ResY['YearId']; ?>"><?php echo date("Y",strtotime($ResY['FromDate'])).'-'.date("Y",strtotime($ResY['ToDate'])); if($ResY['YearId']>5){ echo ' - Y'; }?></option><?php }else{ ?><option value="" selected>Year</option><?php } $SqlYear=mysql_query("select y.YearId,FromDate,ToDate from hrm_employee_pms p inner join hrm_year y on p.AssessmentYear=y.YearId where CompanyId=".$CompanyId." group by AssessmentYear order by AssessmentYear DESC", $con); while($ResYear=mysql_fetch_array($SqlYear)) { ?><option value="<?php echo $ResYear['YearId']; ?>"><?php echo date("Y",strtotime($ResYear['FromDate'])).'-'.date("Y",strtotime($ResYear['ToDate'])); if($ResYear['YearId']>5){ echo ' - Y'; } ?></option><?php } ?></select></td>
               <td class="td1" style="width:200px;">&nbsp;&nbsp;<b>Department:</b>&nbsp;<select class="tdsel" style="background-color:#DDFFBB;width:180px;" name="DepartmentE" id="DepartmentE" onChange="SelectDeptEmp(this.value)"><?php if($_REQUEST['d']>0){ $SqlDept=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['d'],$con); $ResDept=mysql_fetch_array($SqlDept); ?><option value="<?php echo $_REQUEST['d']; ?>" selected><?php echo $ResDept['DepartmentName']; ?></option><?php }else{ ?><option value="" selected>Select Department</option><?php } $SqlDepartment=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDepartment=mysql_fetch_array($SqlDepartment)) { ?><option value="<?php echo $ResDepartment['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDepartment['DepartmentCode'];?></option><?php } ?></select>
					   <input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /> 
					   <input type="hidden" name="DId" id="DId" value="<?php echo $_REQUEST['d']; ?>" />
               </td>
			   <td style="width:100px;"></td>
	           <td class="All_200" align="right" style="font-family:Times New Roman;font-size:16px;color:#007700;"><b><?php echo $msg; ?></b><font class="font4"><b>&nbsp;<span id="msg"></span></b></font></td>

			 </tr>
			<tr>
			 <td>
		     <table border="0">
		      <tr>
		      </tr>
             </table>
		     </td>
		   </tr>
		   <tr>
			<td colspan="5" valign="top" style="width:100%;"> 
             <table border="1" id="table1" style="width:100%;" cellspacing="0">
             <div class="thead">
             <thead>
             <tr bgcolor="#7a6189">
	          <td class="th" style="width:3%;"><b>Sn.</b></td>
	          <td class="th" style="width:5%;"><b>EC</b></td>
			  <td class="th" style="width:22%;"><b>Name</b></td>
			  <td class="th" style="width:10%;"><b>HeadQuater</b></td>
			  <td class="th" style="width:10%;"><b>Department</b></td>
			  <td class="th" style="width:20%;"><b>Designation</b></td>
			  <td class="th" style="width:5%;"><b>Achiv</b></td>
			  <td class="th" style="width:5%;"><b>FormA</b></td>
			  <td class="th" style="width:5%;"><b>FormB</b></td>
			  <td class="th" style="width:5%;"><b>FeedBack</b></td>
             </tr>
             </thead>
             </div>
             <?php if($_REQUEST['d'] AND $_REQUEST['d']!='' AND $_REQUEST['ey']!=''){ $sqlDP = mysql_query("SELECT e.EmployeeID,EmpCode,Fname,Sname,Lname,HqName,DepartmentName,DepartmentCode,DesigName,Gender,Married,DateJoining FROM hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID inner join hrm_headquater hq on g.HqId=hq.HqId inner join hrm_department d on g.DepartmentId=d.DepartmentId inner join hrm_designation de on g.DesigId=de.DesigId WHERE e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND g.DepartmentId=".$_REQUEST['d'], $con) or die(mysql_error()); 
      $Sno=1;  while($resDP = mysql_fetch_assoc($sqlDP)){ 
if($resDP['Gender']=='M'){$M='Mr.';} elseif($resDP['Gender']=='F' AND $resDP['Married']=='Y'){$M='Mrs.';} elseif($resDP['Gender']=='F' AND $resDP['Married']=='N'){$M='Miss.';} $Name=$M.' '.$resDP['Fname'].' '.$resDP['Sname'].' '.$resDP['Lname']; $LEC=strlen($resDP['EmpCode']); if($LEC==1){$EC='000'.$resDP['EmpCode'];} if($LEC==2){$EC='00'.$resDP['EmpCode'];} if($LEC==3){$EC='0'.$resDP['EmpCode'];} if($LEC>=4){$EC=$resDP['EmpCode'];}	 
$sql1=mysql_query("select Emp_AchivementSave,Emp_KRASave,Emp_SkillSave,Emp_FeedBackSave,EmpPmsId from hrm_employee_pms where YearId=".$_REQUEST['ey']." AND EmployeeID=".$resDP['EmployeeID'], $con); $res1=mysql_fetch_assoc($sql1); ?>
             <div class="tbody">
             <tbody>
             <tr bgcolor="#FFFFFF"> 
		      <td class="tdc"><?php echo $Sno; ?></td>
		      <td class="tdc"><?php echo $EC; ?></td>
		      <td class="tdl"><?php echo $Name; ?></td>
		      <td class="tdl"><?= $resDP['HqName'] ?></td>
		      <td class="tdl"><?= $resDP['DepartmentCode']?></td>
			  <td class="tdl"><?= $resDP['DesigName']?></td>
              <?php if($_SESSION['User_Permission']=='Edit'){ ?> 
	          <td class="tdc"><?php if($res1['Emp_AchivementSave']=='Y'){ ?><a href="#" onClick="EmpForm(<?php echo $CompanyId.', '.$resSY['CurrY'].', '.$resDP['EmployeeID'].','.$res1['EmpPmsId'].',1'; ?>)">Click</a><?php } ?></td>
		      <td class="tdc"><?php if($res1['Emp_KRASave']=='Y'){ ?><a href="#" onClick="EmpForm(<?php echo $CompanyId.', '.$resSY['CurrY'].', '.$resDP['EmployeeID'].','.$res1['EmpPmsId'].',2'; ?>)">Click</a><?php } ?></td>
		      <td class="tdc"><?php if($res1['Emp_SkillSave']=='Y'){ ?><a href="#" onClick="EmpForm(<?php echo $CompanyId.', '.$resSY['CurrY'].', '.$resDP['EmployeeID'].','.$res1['EmpPmsId'].',3'; ?>)">Click</a><?php } ?></td>
		      <td class="tdc"><?php if($res1['Emp_FeedBackSave']=='Y'){ ?><a href="#" onClick="EmpForm(<?php echo $CompanyId.', '.$resSY['CurrY'].', '.$resDP['EmployeeID'].','.$res1['EmpPmsId'].',4'; ?>)">Click</a><?php } ?></td>
              <?php } ?>		 	
             </tr>
             </tbody>
             </div>
<?php $Sno++; } }?>
            </table>
           </td>	
		 </tr>
<?php //------------------------Display Record------------------------------------ ?>
		   </table>  		
		</td>
		
        <?php } ?>
		<?php //-------------------------------------------------------------------------------------------------------- ?>
		
	</tr>
</table>
	  </td>
	</tr>
	
	<!--<tr>
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
	    <?php //require_once("../footer.php"); ?>
	  </td>
	</tr>-->
  </table>
 </td>
</tr>
</table>
</body>
</html>