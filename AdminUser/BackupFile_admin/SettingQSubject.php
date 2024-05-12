<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//if($_SESSION['login'] = true){require_once('PhpFile/CountryStateCityP.php'); } else {$msg= "Session Expiry..............."; }
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:250px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:13px; height:10px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script language="javascript">  
function validate(formQSub) 
{ var DeptName = formQSub.DeptName.value; if(DeptName==''){alert('Please select Department');  return false;}
  var QSubName = formQSub.QSubName.value;  var filter=/^[a-zA-Z. /]+$/; var test_bool2 = filter.test(QSubName);
  if (QSubName.length === 0) { alert("You must enter a Query Subject Name.");  return false; }
  if(test_bool2==false) { alert('Please Enter Only Alphabets in the Query Subject Name Field');  return false; }  
}  
 
<!----------------------------- ONE -----------------------------> 
function SelDept(value){
    document.getElementById("Change").style.display = 'none'; document.getElementById("Delete").style.display = 'none'; document.getElementById("AddNew").style.display = 'block';
	var url = 'GetQSubject.php';	var pars = 'id='+value;	var myAjax = new Ajax.Request(
	url, { method: 'post', parameters: pars, onComplete: show_Qsub });
}
function show_Qsub(originalRequest)
{ document.getElementById('QSubSpan').innerHTML = originalRequest.responseText; }
 
<!----------------------------- TWO -----------------------------> 
function SelectQSub(value){ 
    document.getElementById("Change").style.display = 'block'; document.getElementById("Delete").style.display = 'block'; document.getElementById("AddNew").style.display = 'none';
	var url = 'GetQSubject.php';	var pars = 'SQtid='+value;	var myAjax = new Ajax.Request(
	url, { method: 'post', parameters: pars, onComplete: show_QDeptSub });
}
function show_QDeptSub(originalRequest)
{ document.getElementById('DeptQSubSpan').innerHTML = originalRequest.responseText; 
  var Sub=document.getElementById("QSubName").value=document.getElementById("QSN").value
}  
 
<!----------------------------- THREE ----------------------------->  
function NewAdd()
{ var QSub=document.getElementById("QSubName").value; var QDept=document.getElementById("DeptName").value; 
  var url = 'GetQSubject.php';	var pars = 'QSub='+QSub+'&QDept='+QDept; var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_Qsub });
}  
function show_Qsub(originalRequest)
{ document.getElementById('QSubSpan').innerHTML = originalRequest.responseText; }

<!----------------------------- FOUR ----------------------------->
function QChang()
{ var QQSub=document.getElementById("QSubName").value; var QQDept=document.getElementById("DeptName").value;  var QSId=document.getElementById("DeptQSubId").value;  
  var url = 'GetQSubject.php';	var pars = 'QQSub='+QQSub+'&QSId='+QSId+'&QQDept='+QQDept; var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_Qsub2 });
}  
function show_Qsub2(originalRequest)
{ document.getElementById('QSubSpan').innerHTML = originalRequest.responseText; }

<!----------------------------- FIVE ----------------------------->
function QDel()
{ var QDSNId=document.getElementById("DeptQSubId").value;  var QQQDept=document.getElementById("DeptName").value;
  var url = 'GetQSubject.php';	var pars = 'QDSNId='+QDSNId+'&QQQDept='+QQQDept; var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_Qsub3 });
}  
function show_Qsub3(originalRequest)
{ document.getElementById('QSubSpan').innerHTML = originalRequest.responseText;
  var QQSub=document.getElementById("QSubName").value='';
 }


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
	  <td align="" width="200" class="heading">&nbsp;Setting Query Subject</td>
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true) { ?>	
 <tr> 
<?php //*********************************************** DeptQuery ******************************************************?>  
  <td align="left" id="state" valign="top">             
    <form name="formQSub" method="post" onSubmit="return validate(this)">
   <table border="0">
   <tr>
	<td align="left">
	 <table border="0" width="550">
	   <tr><td></td><td align="center" style="font-size:15px; font-family:Times New Roman;"><b>Subject</b></td></tr>
	   <tr>
	    <td class="td1" style="font-size:12px; width:380px;" valign="top">
		  <span id="DeptQSubSpan"></span>
		  <table id="CouStateTable" style="display:block;">
		    <tr><td style="font-size:12px; height:18px;">Department :</td>
			    <td><select name="DeptName" id="DeptName" onChange="SelDept(this.value)" style="font-size:12px;width:120px;height:20px;">
				<option style="background-color:#66CC33;" value="">Select</option>
<?php $sql=mysql_query("SELECT * FROM hrm_department where CompanyId=".$CompanyId." AND DeptStatus='A' order by DepartmentCode ASC", $con);while($res=mysql_fetch_array($sql)){?>
		  <option value="<?php echo $res['DepartmentId']; ?>">&nbsp;<?php echo $res['DepartmentCode']; ?></option><?php } ?> </td>
		   </tr>
		   <tr><td style="font-size:12px;height:18px;">Query Subject:</td>
			   <td><input name="QSubName" id="QSubName" style="font-size:13px;width:180px;height:20px;" maxlength="100"/></td>
		   </tr>
		 </table>
       </td>
       <td align="right" style="font-size:12px; width:200px;"><span id="QSubSpan">
		<select style="width:200px; background-color:#F1EDF8;" name="QSubSelect" id="QSubSelect" size="8" onChange="SelectQSub(this.value)">
		<option value="">&nbsp;</option></select></span>
	  </td></tr>
     </table>
   </td>
  </tr>
<?php if($_SESSION['User_Permission']=='Edit'){?>	  
  <tr>
      <td align="Right" class="fontButton"><table border="0" width="550"><tr>
		 <td align="right"><input type="button" name="Change" id="Change" style="width:90px; display:none;" value="change" onClick="QChang()"></td>
		 <td align="right" style="width:70px;"><input type="button" name="Delete" id="Delete" value="delete" style="width:90px; display:none;" onClick="QDel()">
		                                       <input type="button" name="AddNew" id="AddNew" style="width:90px; display:block;" value="add new" onClick="NewAdd()"></td>
		 <td align="right" style="width:70px;"><input type="button" name="RefreshState" id="RefreshState" style="width:90px;" value="refresh" onClick="javascript:window.location='SettingQSubject.php'"/></td>
		 </tr></table>
      </td>
   </tr>
<?php } ?>
  </table>
 </form>       
   </td>
<?php //*********************************************** DeptQuery Close******************************************************?>    
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
