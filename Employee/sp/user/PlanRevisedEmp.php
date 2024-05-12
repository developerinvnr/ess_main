<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}
//**********************************************************************************************************************
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<style> .font { color:#ffffff; font-family:Times New Roman; font-size:15px; width:200px;} .font1 { font-family:Times New Roman;font-size:14px; } 
.font2 { font-family:Times New Roman;font-size:12px;height:22px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; height:18px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<Script type="text/javascript" language="javascript">
function FunYMQ(v)
{ var y=0; var m=0; var q=0; 
  window.location="PlanRevisedEmp.php?ern1=r114&ern2w=234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+y+"&m="+m+"&qtr="+q+"&ymq="+v;
}


/*
function FunY(v)
{ var y=v; var m=document.getElementById("selMv").value; var q=document.getElementById("selQv").value;
  window.location="PlanRevisedEmp.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+y+"&m="+m+"&qtr="+q;
}
function FunM(v)
{ var m=v; var y=document.getElementById("selYv").value; var q=document.getElementById("selQv").value;
  window.location="PlanRevisedEmp.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+y+"&m="+m+"&qtr="+q;
}
function FunQ(v)
{ var q=v; var m=document.getElementById("selMv").value; var y=document.getElementById("selYv").value;
  window.location="PlanRevisedEmp.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+y+"&m="+m+"&qtr="+q;
}
*/

function FunClickCheck(sn,e,y,m,q)
{ if(document.getElementById("CheckEmp_"+sn).checked==true){var v=1;}else if(document.getElementById("CheckEmp_"+sn).checked==false){var v=0;} 
  var url = 'PlanRevisedEmpAct.php'; var pars = 'action=checkRev&v='+v+'&sn='+sn+'&e='+e+'&y='+y+'&m='+m+'&q='+q; var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_check });
}
function show_check(originalRequest)
{ document.getElementById('CheckspanId').innerHTML = originalRequest.responseText; 
  var sn=document.getElementById("sn").value; var v=document.getElementById("valuec").value; 
  if(v==1){document.getElementById("TDCheckEmp_"+sn).style.background='#80FF00';}
  else if(v==0){document.getElementById("TDCheckEmp_"+sn).style.background='#FFFFFF';}
}

</Script> 
</head>
<body class="body">
<span id="CheckspanId"></span>
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table></td></tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
   <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
   <tr>
	<td valign="top"  width="100%" id="MainWindow" align="left"><br>
    <table border="0" style="margin-top:0px; width:100%; height:300px;">
<?php if($_REQUEST['m']==1){$mm='JANUARY';}elseif($_REQUEST['m']==2){$mm='FEBRUARY';}elseif($_REQUEST['m']==3){$mm='MARCH';}elseif($_REQUEST['m']==4){$mm='APIRL';}elseif($_REQUEST['m']==5){$mm='MAY';}elseif($_REQUEST['m']==6){$mm='JUNE';}elseif($_REQUEST['m']==7){$mm='JULY';}elseif($_REQUEST['m']==8){$mm='AUGUST';}elseif($_REQUEST['m']==9){$mm='SETEMBER';}elseif($_REQUEST['m']==10){$mm='OCTOBER';}elseif($_REQUEST['m']==11){$mm='NOVEMBER';}elseif($_REQUEST['m']==12){$mm='DECEMBER';}
if($_REQUEST['qtr']==1){$qq='Quarter - 01';}elseif($_REQUEST['qtr']==2){$qq='Quarter - 02';}if($_REQUEST['qtr']==3){$qq='Quarter - 03';}if($_REQUEST['qtr']==4){$qq='Quarter - 04';}?>	
    <tr>
    <td align="left" id="type" valign="top" style="display:block; width:50%" align="left">             
     <table border="0" width="900">
	 <tr>
	  <td colspan="5">
	  <table>
	   <tr>
	    <td class="heading">&nbsp;Revised Month &nbsp;&nbsp;<font color="#5CB900"><i><?php echo $msg; ?></i></font></td> 
	    <td class="font1"><i style="color:#FFFFFF;font-weight:bold;"> Select :</i>&nbsp;<select id="selYMQv" name="selYMQv" class="font1" style="width:250px;" onChange="FunYMQ(this.value)"><?php if($_REQUEST['ymq']>0){ $sqll=mysql_query("select * from hrm_sales_revised_opnclose where RevsdOCId=".$_REQUEST['ymq'], $con); $res=mysql_fetch_array($sqll); if($res['Month']==1){$m='JANUARY';}elseif($res['Month']==2){$m='FEBRUARY';}elseif($res['Month']==3){$m='MARCH';}elseif($res['Month']==4){$m='APIRL';}elseif($res['Month']==5){$m='MAY';}elseif($res['Month']==6){$m='JUNE';}elseif($res['Month']==7){$m='JULY';}elseif($res['Month']==8){$m='AUGUST';}elseif($res['Month']==9){$m='SETEMBER';}elseif($res['Month']==10){$m='OCTOBER';}elseif($res['Month']==11){$m='NOVEMBER';}elseif($res['Month']==12){$m='DECEMBER';}
if($res['Quarter']==1){$q='Quarter-01';}elseif($res['Quarter']==2){$q='Quarter-02';}if($res['Quarter']==3){$q='Quarter-03';}if($res['Quarter']==4){$q='Quarter-04';} ?><option value="<?php echo $_REQUEST['ymq']; ?>" selected><?php echo 'Y:'.$res['Year'].' /  M:'.$m.' /  Q:'.$q; ?></option><?php } else { ?><option value="<?php echo 0; ?>" selected><?php echo 'SELECT'; ?></option><?php } $sqlymq=mysql_query("select * from hrm_sales_revised_opnclose where RevsdOCId!=".$_REQUEST['ymq']." order by Year DESC, Month DESC, Quarter DESC", $con); while($resymq=mysql_fetch_array($sqlymq)){ if($resymq['Month']==1){$m='JANUARY';}elseif($resymq['Month']==2){$m='FEBRUARY';}elseif($resymq['Month']==3){$m='MARCH';}elseif($resymq['Month']==4){$m='APIRL';}elseif($resymq['Month']==5){$m='MAY';}elseif($resymq['Month']==6){$m='JUNE';}elseif($resymq['Month']==7){$m='JULY';}elseif($resymq['Month']==8){$m='AUGUST';}elseif($resymq['Month']==9){$m='SETEMBER';}elseif($resymq['Month']==10){$m='OCTOBER';}elseif($resymq['Month']==11){$m='NOVEMBER';}elseif($resymq['Month']==12){$m='DECEMBER';}
if($resymq['Quarter']==1){$q='Quarter-01';}elseif($resymq['Quarter']==2){$q='Quarter-02';}if($resymq['Quarter']==3){$q='Quarter-03';}if($resymq['Quarter']==4){$q='Quarter-04';} ?><option value="<?php echo $resymq['RevsdOCId']; ?>"><?php echo 'Y:'.$resymq['Year'].' /  M:'.$m.' /  Q:'.$q; ?></option><?php } ?></select></td>
		
		<?php  /*
		<td class="font1"><i style="color:#FFFFFF;font-weight:bold;">Year:</i>&nbsp;<select id="selYv" name="selYv" class="font1" style="width:100px;" onChange="FunY(this.value)"><?php if($_REQUEST['y']>0){ ?><option value="<?php echo $_REQUEST['y']; ?>" selected><?php echo $_REQUEST['y']; ?></option><?php } else { ?><option value="<?php echo 0; ?>" selected><?php echo 'YEAR'; ?></option><?php } for($i=2015;$i<=2020;$i++){ if($i!=$_REQUEST['y']){ ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } } ?></select></td>
		
		<td class="font1"><i style="color:#FFFFFF;font-weight:bold;">Month:</i>&nbsp;<select id="selMv" name="selMv" class="font1" style="width:100px;" onChange="FunM(this.value)"><?php if($_REQUEST['m']>0){ ?><option value="<?php echo $_REQUEST['m']; ?>" selected><?php echo $mm; ?></option><?php } else { ?><option value="<?php echo 0; ?>" selected><?php echo 'MONTH'; ?></option><?php } for($j=1;$j<=12;$j++){ if($j!=$_REQUEST['m']){ ?><option value="<?php echo $j; ?>"><?php if($j==1){echo 'JANUARY';}elseif($j==2){echo 'FEBRUARY';}elseif($j==3){echo 'MARCH';}elseif($j==4){echo 'APIRL';}elseif($j==5){echo 'MAY';}elseif($j==6){echo 'JUNE';}elseif($j==7){echo 'JULY';}elseif($j==8){echo 'AUGUST';}elseif($j==9){echo 'SETEMBER';}elseif($j==10){echo 'OCTOBER';}elseif($j==11){echo 'NOVEMBER';}elseif($j==12){echo 'DECEMBER';} ?></option><?php } } ?></select></td>
		
		<td class="font1"><i style="color:#FFFFFF;font-weight:bold;">Quarter:</i>&nbsp;<select id="selQv" name="selQv" class="font1" style="width:100px;" onChange="FunQ(this.value)"><?php if($_REQUEST['qtr']>0){ ?><option value="<?php echo $_REQUEST['qtr']; ?>" selected><?php echo $qq; ?></option><?php } else { ?><option value="<?php echo 0; ?>" selected><?php echo 'QUATER'; ?></option><?php } for($k=1;$k<=4;$k++){if($k!=$_REQUEST['qtr']){ ?><option value="<?php echo $k; ?>"><?php if($k==1){echo 'Quarter - 01';}elseif($k==2){echo 'Quarter - 02';}if($k==3){echo 'Quarter - 03';}if($k==4){echo 'Quarter - 04';} ?></option><?php } } ?></select></td>
		
		*/ ?>
	   </tr>
	  </table>
	 </td>
	 </tr>
	 <tr>
	 <td align="left" width="900">
	 <table border="1" width="900" border="1" bgcolor="#FFFFFF">
<tr bgcolor="#808000">
 <td class="font" align="center" style="width:40px;"><b>SNo</b></td> 
 <td class="font" align="center" style="width:50px;"><b>EC</b></td>
 <td class="font" align="center" style="width:200px;"><b>Employee Name</b></td>
 <td class="font" align="center" style="width:250px;"><b>Designation</b></td>
 <td class="font" align="center" style="width:150px;"><b>Head Quarter</b></td>
 <td class="font" align="center" style="width:150px;"><b>State</b></td>
 <td class="font" align="center" style="width:50px;"><b>Allow</b></td>
</tr>
<?php if($_REQUEST['ymq']>0){
$sqlymq=mysql_query("select * from hrm_sales_revised_opnclose where RevsdOCId=".$_REQUEST['ymq'], $con); $resymq=mysql_fetch_array($sqlymq);
$sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,DesigId,HqId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus='A' AND DepartmentId=6  order by GradeId DESC", $con); $SNo=1; while($res=mysql_fetch_array($sql)) { 
$LEC=strlen($res['EmpCode']); if($LEC==1){$EC='000'.$res['EmpCode'];} if($LEC==2){$EC='00'.$res['EmpCode'];} if($LEC==3){$EC='0'.$res['EmpCode'];} if($LEC>=4){$EC=$res['EmpCode'];}
$De=mysql_query("select DesigName,DesigCode from hrm_designation where DesigId=".$res['DesigId'], $con); $resDe=mysql_fetch_assoc($De);
$Hq=mysql_query("select HqName,StateName from hrm_headquater INNER JOIN hrm_state ON hrm_headquater.StateId=hrm_state.StateId where HqId=".$res['HqId'], $con); 
$resHq=mysql_fetch_assoc($Hq);
?>
<tr>
 <td class="font2" align="center"><?php echo $SNo; ?></td> 
 <td class="font2" align="center"><?php echo $EC; ?></td>
 <td class="font2">&nbsp;<?php echo ucwords(strtolower($res['Fname'].''.$res['Sname'].''.$res['Lname'])); ?></td> 
 <td class="font2">&nbsp;<?php echo ucwords(strtolower($resDe['DesigName']));  ?></td>
 <td class="font2">&nbsp;<?php echo ucwords(strtolower($resHq['HqName']));  ?></td>
 <td class="font2">&nbsp;<?php echo ucwords(strtolower($resHq['StateName']));  ?></td>
<?php $sqlCheck=mysql_query("select * from hrm_sales_revised_employee where EmployeeID=".$res['EmployeeID']." AND Year=".$resymq['Year']." AND Month=".$resymq['Month']." AND Quarter=".$resymq['Quarter']." AND Status='A'",$con); $rowCheck=mysql_num_rows($sqlCheck); ?> 
 <td align="center" style="background-color:<?php if($rowCheck>0){echo '#80FF00';} ?>;" valign="middle" id="TDCheckEmp_<?php echo $SNo; ?>"><input type="checkbox" id="CheckEmp_<?php echo $SNo; ?>" onClick="FunClickCheck(<?php echo $SNo.','.$res['EmployeeID'].','.$resymq['Year'].','.$resymq['Month'].','.$resymq['Quarter']; ?>)" <?php if($rowCheck>0){ echo 'checked';} ?> /></td>
</tr>
<?php $SNo++;} } ?>
	  </table>
	 </td>
    </tr>
  </table>  
</td>
</tr>
</table>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>
