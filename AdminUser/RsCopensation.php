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
function SelectYear(v){window.location='RsCopensation.php?y='+v;}

function PrintCopensation(y,c)
{ window.open("RsCopensationPrint.php?action=PrintHCount&y="+y+"&c="+c,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=50,height=50");}

function ExportCopensation(y,c)
{ window.open("RsCopensationExport.php?action=RsCopensationExport&y="+y+"&c="+c,"ExportForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}

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
	  <td class="heading" valign="top" style="width:180px;">Compensation Details&nbsp;</td>
<?php if($_REQUEST['y']!=0){ $BeforeYId=$_REQUEST['y']-1; 
      $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['y']."", $con); $rY=mysql_fetch_assoc($sY); } 
      $FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; 
	   ?>	     
	<td class="td1" style="font-size:14px;font-family:Times New Roman;" valign="top">&nbsp;&nbsp;<b>Year:</b>&nbsp;<select style="font-size:12px; width:100px; background-color:#DDFFBB;" name="YearID" id="YearID" onChange="SelectYear(this.value)">
	<?php $sY=mysql_query("select YearId,FromDate,ToDate from hrm_year where YearId<=".$YearId." order by YearId desc",$con); while($rY=mysql_fetch_assoc($sY)){ ?>
    <option value="<?=$rY['YearId']?>" <?php if($_REQUEST['y']==$rY['YearId']){echo "selected";} ?>><?=date("Y",strtotime($rY['FromDate'])).'-'.date("Y",strtotime($rY['ToDate']))?></option>
    <?php } ?>
    <option value="0" <?php if($_REQUEST['y']==0){echo "selected";} ?>>--All--</option>

</select>
   &nbsp;&nbsp;
<a href="#" onClick="PrintCopensation(<?php echo $_REQUEST['y'].', '.$CompanyId; ?>)" style="font-size:12px;">Print</a>&nbsp;&nbsp;<a href="#" onClick="ExportCopensation(<?php echo $_REQUEST['y'].', '.$CompanyId; ?>)" style="font-size:12px;">Export Excel</a></td>
   </tr>
   </table>
  </td>
 </tr>
<?php if($_SESSION['login']=true){ ?>	
 <tr>
<?php //*********************************************** Open Department******************************************************?> 
<td align="left" id="type" valign="top" style="display:block; width:100%">             
<input type="hidden" id="ey" name="ey" value="<?php echo $_REQUEST['y']; ?>" />  
<table border="0" style="width:2400px;">

<tr>
 <td align="left">
  <table border="1" border="1" bgcolor="#FFFFFF">
  <tr bgcolor="#7a6189">
   <td rowspan="2" colspan="2" align="center" class="font" style="width:100px;">SN</td>
   <td rowspan="2" align="center" class="font" style="width:150px;">DEPARTMENT</td>
<?php $sqlSt=mysql_query("select st.id as StateId,st.state_name as StateName, st.state_code as StateCode from core_states st left JOIN hrm_employee_general g ON st.id=g.CostCenter group by state_name ASC",$con); while($resSt=mysql_fetch_assoc($sqlSt)){ ?>   
   <td colspan="2" align="center" class="font" style="width:150px;"><?php echo $resSt['StateName']; ?></td>
<?php } ?>
   <td rowspan="2" align="center" class="font" style="width:50px;">Total Emp</td>
   <td rowspan="2" align="center" class="font" style="width:100px;">Total Gross</td>
  </tr>
  <tr bgcolor="#7a6189">
<?php $sqlSt=mysql_query("select st.id as StateId,st.state_name as StateName from core_states st left JOIN hrm_employee_general g ON st.id=g.CostCenter group by state_name ASC",$con); while($resSt=mysql_fetch_assoc($sqlSt)){ ?>   
   <td align="center" class="font" style="width:50px;">Emp</td>
   <td align="center" class="font" style="width:100px;">Gross</td>
<?php } ?>
  </tr>
  
<?php $today=date("Y-m-d"); $timestamp = strtotime($today); 
 $sql=mysql_query("select id as DepartmentId,department_code as DepartmentCode from core_departments where is_active=1 order by department_name ASC",$con); 
 $SNo=1; while($res=mysql_fetch_array($sql)){ ?>
<tr id="TR<?php echo $SNo; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo $SNo; ?>" onClick="FucChk(<?php echo $SNo; ?>)" /></td>
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo $SNo; ?>&nbsp;</td>
   <td align="" class="font1">&nbsp;<?php echo $res['DepartmentCode']; ?></td>
<?php $sqlSt=mysql_query("select st.id as StateId,st.state_name as StateName from core_states st left JOIN hrm_employee_general g ON st.id=g.CostCenter group by state_name ASC",$con); while($resSt=mysql_fetch_assoc($sqlSt)){ 
 $sqlTotE=mysql_query("select GeneralId from hrm_employee_general g left JOIN core_states st ON st.id=g.CostCenter INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID where st.id=".$resSt['StateId']." AND e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND g.DepartmentId=".$res['DepartmentId']." AND g.DateJoining<='".$TD."-03-31'",$con); $rowTotE=mysql_num_rows($sqlTotE);
 $sqlTotG=mysql_query("select SUM(Tot_GrossMonth) as Gross from hrm_employee_ctc ctc INNER JOIN hrm_employee_general g ON ctc.EmployeeID=g.EmployeeID left JOIN core_states st on st.id=g.CostCenter INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID where ctc.Status='A' AND st.id=".$resSt['StateId']." AND e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND g.DepartmentId=".$res['DepartmentId']." AND g.DateJoining<='".$TD."-03-31'",$con); $resTotG=mysql_fetch_assoc($sqlTotG);
?>
<td align="center" class="font1"><?php if($rowTotE>0){echo $rowTotE;} ?></td>
<td align="right" class="font1"><?php if($resTotG['Gross']>0){echo intval($resTotG['Gross']);} ?>&nbsp;</td>
<?php }    
$sqlTotEE=mysql_query("select GeneralId from hrm_employee_general g left JOIN core_states st on st.id=g.CostCenter INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND g.DepartmentId=".$res['DepartmentId']." AND g.DateJoining<='".$TD."-03-31'",$con); $rowTotEE=mysql_num_rows($sqlTotEE);
 $sqlTotGG=mysql_query("select SUM(Tot_GrossMonth) as Gross from hrm_employee_ctc ctc INNER JOIN hrm_employee_general g ON ctc.EmployeeID=g.EmployeeID left JOIN core_states st on st.id=g.CostCenter INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID where ctc.Status='A' AND e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND g.DepartmentId=".$res['DepartmentId']." AND g.DateJoining<='".$TD."-03-31'",$con); 
 $resTotGG=mysql_fetch_assoc($sqlTotGG);
?>
<td align="center" class="font1"><?php if($rowTotEE>0){echo $rowTotEE;} ?></td>
<td align="right" class="font1" bgcolor="#2F97FF"><?php if($resTotGG['Gross']>0){echo intval($resTotGG['Gross']);} ?>&nbsp;</td> 
  </tr>
 <?php $SNo++;} ?>
 <tr bgcolor="#2F97FF">
   <td align="right" colspan="3" class="font1">TOTAL:&nbsp;</td>
<?php $sqlSt=mysql_query("select st.id as StateId,st.state_name as StateName from core_states st left JOIN hrm_employee_general g ON st.id=g.CostCenter group by state_name ASC",$con); while($resSt=mysql_fetch_assoc($sqlSt)){ 
 $sqlTotEt=mysql_query("select GeneralId from hrm_employee_general g left JOIN core_states st on st.id=g.CostCenter INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID where st.id=".$resSt['StateId']." AND e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND g.DateJoining<='".$TD."-03-31'",$con); $rowTotEt=mysql_num_rows($sqlTotEt);
 $sqlTotGt=mysql_query("select SUM(Tot_GrossMonth) as Gross from hrm_employee_ctc ctc INNER JOIN hrm_employee_general g ON ctc.EmployeeID=g.EmployeeID left JOIN core_states st on st.id=g.CostCenter INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID where ctc.Status='A' AND st.id=".$resSt['StateId']." AND e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND g.DateJoining<='".$TD."-03-31'",$con); 
 $resTotGt=mysql_fetch_assoc($sqlTotGt);
?>
<td align="center" class="font1"><?php if($rowTotEt>0){echo $rowTotEt;} ?></td>
<td align="right" class="font1"><?php if($resTotGt['Gross']>0){echo intval($resTotGt['Gross']);} ?>&nbsp;</td>
<?php }    
$sqlTotEEt=mysql_query("select GeneralId from hrm_employee_general g left JOIN core_states st on st.id=g.CostCenter INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND g.DateJoining<='".$TD."-03-31'",$con); $rowTotEEt=mysql_num_rows($sqlTotEEt);
 $sqlTotGGt=mysql_query("select SUM(Tot_GrossMonth) as Gross from hrm_employee_ctc ctc INNER JOIN hrm_employee_general g ON ctc.EmployeeID=g.EmployeeID left JOIN core_states st on st.id=g.CostCenter INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID where ctc.Status='A' AND e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND g.DateJoining<='".$TD."-03-31'",$con); $resTotGGt=mysql_fetch_assoc($sqlTotGGt);
?>
<td align="center" class="font1"><?php if($rowTotEEt>0){echo $rowTotEEt;} ?></td>
<td align="right" class="font1" bgcolor="#71E100"><?php if($resTotGGt['Gross']>0){echo intval($resTotGGt['Gross']);} ?>&nbsp;</td> 
  </tr>

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