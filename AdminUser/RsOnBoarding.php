<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff;font-family:Times New Roman;height:22px;font-size:12px;font-weight:bold;} 
.font1 { font-family:Times New Roman;font-size:12px; color:#000000;} 
.font2 { font-size:11px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:11px; width:120px; height:18px;}
.InputText {font-family:Times New Roman;font-size:12px;height:20px;color:#000066;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script>
function SelectYear(v){window.location='RsOnBoarding.php?y='+v;}

function PrintOnBoarding(y,c)
{ window.open("RsOnBoardingPrint.php?action=PrintOnBoarding&y="+y+"&c="+c,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=50,height=50");}

function ExportOnBoarding(y,c)
{ window.open("RsOnBoardingExport.php?action=RsOnBoardingExport&y="+y+"&c="+c,"ExportForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}

function FucChk(sn)
{ if(document.getElementById("Chk"+sn).checked==true){document.getElementById("TR"+sn).style.background='#9BEF47'; }
  else if(document.getElementById("Chk"+sn).checked==false){document.getElementById("TR"+sn).style.background='#FFFFFF'; }
}

</SCRIPT> 
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td class="heading" valign="top">On-Boarding&nbsp;</td>
<?php if($_REQUEST['y']!=0){ $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['y']."", $con); $rY=mysql_fetch_assoc($sY); } 
      $FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; ?>	     
    <td class="td1" style="font-size:14px;width:2000px;font-family:Times New Roman;" valign="top">&nbsp;&nbsp;<b>Year:</b>&nbsp;<select style="font-size:12px; width:100px; background-color:#DDFFBB;" name="YearID" id="YearID" onChange="SelectYear(this.value)">
    <?php $sY=mysql_query("select YearId,FromDate,ToDate from hrm_year where YearId<=".$YearId." order by YearId desc",$con); while($rY=mysql_fetch_assoc($sY)){ ?>
    <option value="<?=$rY['YearId']?>" <?php if($_REQUEST['y']==$rY['YearId']){echo "selected";} ?>><?=date("Y",strtotime($rY['FromDate'])).'-'.date("Y",strtotime($rY['ToDate']))?></option>
    <?php } ?>
    <option value="0" <?php if($_REQUEST['y']==0){echo "selected";} ?>>--All--</option>
</select>
   &nbsp;&nbsp;
<a href="#" onClick="PrintOnBoarding(<?php echo $_REQUEST['y'].', '.$CompanyId; ?>)" style="font-size:12px;">Print</a>&nbsp;&nbsp;<a href="#" onClick="ExportOnBoarding(<?php echo $_REQUEST['y'].', '.$CompanyId; ?>)" style="font-size:12px;">Export Excel</a></td>
   </tr>
   </table>
  </td>
 </tr>
<?php if($_SESSION['login']=true){ ?>	
 <tr>
<?php //*********************************************** Open Department******************************************************?> 
<td align="left" id="type" valign="top" style="display:block; width:100%">             
<input type="hidden" id="ey" name="ey" value="<?php echo $_REQUEST['y']; ?>" />  
<table border="0" style="width:1100px;">
<tr>
 <td align="left">
  <table border="1" border="1" bgcolor="#FFFFFF">
  <tr bgcolor="#7a6189">
   <td colspan="2" align="center" class="font" style="width:100px;">Month</td>
   <td align="center" class="font" style="width:40px;">SN</td>
   <td align="center" class="font" style="width:50px;">EC</td>
   <td align="center" class="font" style="width:250px;">Name</td>
   <td align="center" class="font" style="width:100px;">Department</td>
   <td align="center" class="font" style="width:250px;">Designation</td>
   <td align="center" class="font" style="width:80px;">DOJ</td>
   <td align="center" class="font" style="width:120px;">State</td>
   <td align="center" class="font" style="width:150px;">HQ</td>
  </tr>
<?php if($_REQUEST['y']!=0){ 
$sql4=mysql_query("select * from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee_separation.EmployeeID=hrm_employee.EmployeeID where Emp_ResignationDate>='".$FD."-04-01' AND Emp_ResignationDate<='".$FD."-04-30' AND hrm_employee.CompanyId=".$CompanyId, $con); $row4=mysql_num_rows($sql4);
$sql5=mysql_query("select * from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee_separation.EmployeeID=hrm_employee.EmployeeID where Emp_ResignationDate>='".$FD."-05-01' AND Emp_ResignationDate<='".$FD."-05-31' AND hrm_employee.CompanyId=".$CompanyId, $con); $row5=mysql_num_rows($sql5);
$sql6=mysql_query("select * from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee_separation.EmployeeID=hrm_employee.EmployeeID where Emp_ResignationDate>='".$FD."-06-01' AND Emp_ResignationDate<='".$FD."-06-30' AND hrm_employee.CompanyId=".$CompanyId, $con); $row6=mysql_num_rows($sql6);
$sql7=mysql_query("select * from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee_separation.EmployeeID=hrm_employee.EmployeeID where Emp_ResignationDate>='".$FD."-07-01' AND Emp_ResignationDate<='".$FD."-07-31' AND hrm_employee.CompanyId=".$CompanyId, $con); $row7=mysql_num_rows($sql7);
$sql8=mysql_query("select * from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee_separation.EmployeeID=hrm_employee.EmployeeID where Emp_ResignationDate>='".$FD."-08-01' AND Emp_ResignationDate<='".$FD."-08-31' AND hrm_employee.CompanyId=".$CompanyId, $con); $row8=mysql_num_rows($sql8);
$sql9=mysql_query("select * from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee_separation.EmployeeID=hrm_employee.EmployeeID where Emp_ResignationDate>='".$FD."-09-01' AND Emp_ResignationDate<='".$FD."-09-30' AND hrm_employee.CompanyId=".$CompanyId, $con); $row9=mysql_num_rows($sql9);
$sql10=mysql_query("select * from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee_separation.EmployeeID=hrm_employee.EmployeeID where Emp_ResignationDate>='".$FD."-10-01' AND Emp_ResignationDate<='".$FD."-10-31' AND hrm_employee.CompanyId=".$CompanyId, $con); $row10=mysql_num_rows($sql10);
$sql11=mysql_query("select * from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee_separation.EmployeeID=hrm_employee.EmployeeID where Emp_ResignationDate>='".$FD."-11-01' AND Emp_ResignationDate<='".$FD."-11-30' AND hrm_employee.CompanyId=".$CompanyId, $con); $row11=mysql_num_rows($sql11);
$sql12=mysql_query("select * from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee_separation.EmployeeID=hrm_employee.EmployeeID where Emp_ResignationDate>='".$FD."-12-01' AND Emp_ResignationDate<='".$FD."-12-31' AND hrm_employee.CompanyId=".$CompanyId, $con); $row12=mysql_num_rows($sql12);
$sql1=mysql_query("select * from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee_separation.EmployeeID=hrm_employee.EmployeeID where Emp_ResignationDate>='".$TD."-01-01' AND Emp_ResignationDate<='".$TD."-01-31' AND hrm_employee.CompanyId=".$CompanyId, $con); $row1=mysql_num_rows($sql1);
$sql2=mysql_query("select * from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee_separation.EmployeeID=hrm_employee.EmployeeID where Emp_ResignationDate>='".$TD."-02-01' AND Emp_ResignationDate<='".$TD."-02-29' AND hrm_employee.CompanyId=".$CompanyId, $con); $row2=mysql_num_rows($sql2);
$sql3=mysql_query("select * from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee_separation.EmployeeID=hrm_employee.EmployeeID where Emp_ResignationDate>='".$TD."-03-01' AND Emp_ResignationDate<='".$TD."-03-31' AND hrm_employee.CompanyId=".$CompanyId, $con); $row3=mysql_num_rows($sql3); 

$sql=mysql_query("select e.EmpCode,Fname,Sname,Lname,g.HqId, g.TerrId, department_name, department_code, designation_name, grade_name, city_village_name, territory_name, state_name, DateJoining from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID left join core_departments dept on g.DepartmentId=dept.id
  left join core_designation desig on g.DesigId=desig.id
  left join core_grades gr on g.GradeId=gr.id
  left join core_city_village_by_state vlg on g.HqId=vlg.id
  left join core_territory Tr on g.TerrId=Tr.id left join core_states st on g.CostCenter=st.id where DateJoining>='".$FD."-04-01' AND DateJoining<='".$TD."-03-31' AND e.CompanyId=".$CompanyId." AND e.EmpStatus='A' order by DateJoining DESC", $con);
} else { $sql=mysql_query("select e.EmpCode,Fname,Sname,Lname,g.HqId, g.TerrId, department_name, department_code, designation_name, grade_name, city_village_name, territory_name, state_name, DateJoining from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID left join core_departments dept on g.DepartmentId=dept.id
  left join core_designation desig on g.DesigId=desig.id
  left join core_grades gr on g.GradeId=gr.id
  left join core_city_village_by_state vlg on g.HqId=vlg.id
  left join core_territory Tr on g.TerrId=Tr.id left join core_states st on g.CostCenter=st.id where e.CompanyId=".$CompanyId." AND e.EmpStatus='A' order by DateJoining DESC", $con); } 
$SNo=1; while($res=mysql_fetch_array($sql)){ 
$m=date('m',strtotime($res['DateJoining'])); if($m==4){$mn='APR';}elseif($m==5){$mn='MAY';}elseif($m==6){$mn='JUN';}elseif($m==7){$mn='JUL';}elseif($m==8){$mn='AUG';}elseif($m==9){$mn='SEP';}elseif($m==10){$mn='OCT';}elseif($m==11){$mn='NOV';}elseif($m==12){$mn='DEC';}elseif($m==1){$mn='JAN';}elseif($m==2){$mn='FEB';}elseif($m==3){$mn='MAR';}

?>
<tr id="TR<?php echo $SNo; ?>">
   <td align="center" style="width:30px;"><input type="checkbox" id="Chk<?php echo $SNo; ?>" onClick="FucChk(<?php echo $SNo; ?>)" /></td>
   <td bgcolor="<?php if($m==1 OR $m==3 OR $m==5 OR $m==7 OR $m==9 OR $m==11){echo '#AE5EFF'; }else{echo '#FFFF9B';} ?>" align="center" class="font1">&nbsp;<?php echo $mn; ?>&nbsp;</td>
   <td align="center" class="font1"><?php echo $SNo; ?></td>
   <td align="center" class="font1"><?php echo $res['EmpCode']; ?></td>
   <td align="" class="font1"><?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
   <td align="" class="font1"><?php echo $res['department_code']; ?></td>
   <td align="" class="font1"><?php echo $res['designation_name']; ?></td>
   <td align="center" class="font1"><?php echo date("d-m-Y", strtotime($res['DateJoining'])); ?></td>
    <?php if($res['TerrId']>0){$Hq=$res['territory_name'];}else{$Hq=$res['city_village_name']; } ?>
   <td align="" class="font1"><?php echo $Hq; ?></td>
   <td align="" class="font1"><?php echo $res['state_name']; ?></td>
  </tr>
 <?php $SNo++;} ?>
	 </table>
	  </td>
    </tr>
  </table>  
</td>
<?php //*********************************************** Close Department******************************************************?>    
 </tr>
<?php } ?> 
</table>
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************END*****END*****END******END******END***************************************************************?>
<?php //************************************************************************************************************************************************************?>
	  </td>
	</tr>
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