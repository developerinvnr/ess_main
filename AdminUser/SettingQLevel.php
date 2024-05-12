<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//**********************************************************************************************************************//
if($_REQUEST['action']=='delRev'){$sqlDel=mysql_query("delete from hrm_pms_reviewer where ReviewerId=".$_REQUEST['did'], $con);}
if($_REQUEST['action']=='delApp'){$sqlDel=mysql_query("delete from hrm_pms_appraiser where AppraiserId=".$_REQUEST['did'], $con);}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff; font-family:Georgia; font-size:12px;height:20px;} .font1 { font-family:Georgia; font-size:12px; height:20px;} 
.font2 { font-size:11px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; display:none; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:11px; width:120px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; width:100px; height:20px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script>  
function SelectDeptEmp(value){ var x = 'SettingQLevel.php?DPid='+value; window.location=x; }  


function Click(v1,v2)
{ var ComId=document.getElementById("ComId").value; var DpId=document.getElementById("DPid").value; 
  if(v1=='L1')
  { var url = 'CheckLevel.php';	var pars = 'One=One&dpid='+DpId+'&v2='+v2+'&CId='+ComId;	var myAjax = new Ajax.Request(
	url, { 	method: 'post', parameters: pars,  onComplete: show_CheckL1 });  
  } 
 if(v1=='L2')
  { var url = 'CheckLevel.php';	var pars = 'Two=Two&dpid='+DpId+'&v2='+v2+'&CId='+ComId;	var myAjax = new Ajax.Request(
    url, { 	method: 'post', parameters: pars,  onComplete: show_CheckL2 });   
  } 
  if(v1=='L3')
  { var url = 'CheckLevel.php';	var pars = 'Three=Three&dpid='+DpId+'&v2='+v2+'&CId='+ComId;	var myAjax = new Ajax.Request(
    url, { 	method: 'post', parameters: pars,  onComplete: show_CheckL3 });   
  } 
}
function show_CheckL1(originalRequest){ document.getElementById('L1Span').innerHTML = originalRequest.responseText; }
function show_CheckL2(originalRequest){ document.getElementById('L2Span').innerHTML = originalRequest.responseText; }
function show_CheckL3(originalRequest){ document.getElementById('L3Span').innerHTML = originalRequest.responseText; }


function GetLevel(v,Id,Dept)
{ 
  var YId=document.getElementById("YearId").value;  var UId=document.getElementById("UserId").value; var ComId=document.getElementById("ComId").value; 
  if(v=='L1')
  { var url = 'GetSelectLevel.php';	var pars = 'One=One&id='+Id+'&dept='+Dept+'&YId='+YId+'&UId='+UId+'&CId='+ComId;  var myAjax = new Ajax.Request(
    url, { 	method: 'post', parameters: pars,  onComplete: show_GetL1 });
  }
  if(v=='L2')
  { var url = 'GetSelectLevel.php';	var pars = 'Two=Two&id='+Id+'&dept='+Dept+'&YId='+YId+'&UId='+UId+'&CId='+ComId;  var myAjax = new Ajax.Request(
    url, { 	method: 'post', parameters: pars,  onComplete: show_GetL2 });
  }
  if(v=='L3')
  { var url = 'GetSelectLevel.php';	var pars = 'Three=Three&id='+Id+'&dept='+Dept+'&YId='+YId+'&UId='+UId+'&CId='+ComId;  var myAjax = new Ajax.Request(
    url, { 	method: 'post', parameters: pars,  onComplete: show_GetL3 });
  }
  
}	
function show_GetL1(originalRequest){ document.getElementById('TableL1Span').innerHTML = originalRequest.responseText; }	
function show_GetL2(originalRequest){ document.getElementById('TableL2Span').innerHTML = originalRequest.responseText; }
function show_GetL3(originalRequest){ document.getElementById('TableL3Span').innerHTML = originalRequest.responseText; }	


function OrderC(v,QLId)
{ var YId=document.getElementById("YearId").value;  var UId=document.getElementById("UserId").value; var ComId=document.getElementById("ComId").value;
  var url = 'OrderDelLevel.php';	var pars = 'v='+v+'&id='+QLId;  var myAjax = new Ajax.Request( url, { 	method: 'post', parameters: pars,  onComplete: show_GetQL });
} function show_GetQL(originalRequest){ document.getElementById('SL1').innerHTML = originalRequest.responseText; }	


function DelLevel(v,QId,Dept)
{ 
  var YId=document.getElementById("YearId").value;  var UId=document.getElementById("UserId").value; var ComId=document.getElementById("ComId").value; 
  if(v=='L1')
  { var url = 'OrderDelLevel.php';	var pars = 'One=One&qlid='+QId+'&dept='+Dept+'&YId='+YId+'&UId='+UId+'&CId='+ComId;  var myAjax = new Ajax.Request(
    url, { 	method: 'post', parameters: pars,  onComplete: show_GetL11 });
  }
  if(v=='L2')
  { var url = 'OrderDelLevel.php';	var pars = 'Two=Two&qlid='+QId+'&dept='+Dept+'&YId='+YId+'&UId='+UId+'&CId='+ComId;  var myAjax = new Ajax.Request(
    url, { 	method: 'post', parameters: pars,  onComplete: show_GetL22 });
  }
  if(v=='L3')
  { var url = 'OrderDelLevel.php';	var pars = 'Three=Three&qlid='+QId+'&dept='+Dept+'&YId='+YId+'&UId='+UId+'&CId='+ComId;  var myAjax = new Ajax.Request(
    url, { 	method: 'post', parameters: pars,  onComplete: show_GetL33 });
  }
  
}	
function show_GetL11(originalRequest){ document.getElementById('TableL1Span').innerHTML = originalRequest.responseText; }	
function show_GetL22(originalRequest){ document.getElementById('TableL2Span').innerHTML = originalRequest.responseText; }
function show_GetL33(originalRequest){ document.getElementById('TableL3Span').innerHTML = originalRequest.responseText; }	


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
	  <td valign="top" align="center" width="100%" id="MainWindow"><br>
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
	  
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr><td align="right" width="280" class="heading">Query - Select Employee Level</td><td width="50">&nbsp;</td>
        <td class="td1" style="font-size:11px; width:150px;">
                       <select style="font-size:11px; width:200px; height:18px; background-color:#DDFFBB; display:block;" name="DepartmentE" id="DepartmentE" onChange="SelectDeptEmp(this.value)">
					   <option value="" style="margin-left:0px; background-color:#84D9D5;" selected>Select Department</option><?php $SqlDepartment=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DeptStatus='A' order by DepartmentName ASC", $con); while($ResDepartment=mysql_fetch_array($SqlDepartment)) { ?><option value="<?php echo $ResDepartment['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDepartment['DepartmentCode'];?></option><?php } ?></select>
        </td>
		<td style="width:250px; ">
<?php if($_REQUEST['DPid']){ $_SESSION['DPid']=$_REQUEST['DPid']; 
$sqlD=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_SESSION['DPid'], $con); $resD=mysql_fetch_assoc($sqlD); ?>		
&nbsp;<font style=" font-family:Georgia;color:#000066;font-weight:bold; font-size:15px;"> <?php echo '" '.$resD['DepartmentName'].' "'; ?> </font>		
<input type="hidden" name="DPid" id="DPid" value="<?php echo $_SESSION['DPid']; ?>" /><?php } ?>
<input type="hidden" name="YearId" id="YearId" value="<?php echo $YearId; ?>" />
<input type="hidden" name="UserId" id="UserId" value="<?php echo $UserId; ?>" />
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /> 
       </td>
		<td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><span id="MsgSpan"></span><?php echo $msg; ?></b></td>	
	</tr>
   </table>
  </td>
 </tr>
<?php if(( $_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true) { ?>	
 <tr>
 <td style="width:5px;" valign="top" align="center">&nbsp;</td>
 <span id="SL1"></span><span id="SL2"></span><span id="SL3"></span>
<?php //*********************************************** Open Department******************************************************?> 
<td align="left" id="type" valign="top" style="display:block; width:100%">             
   <table border="0" width="1210">
    <tr>
	  <td align="left" width="1200">
	     <table border="0" width="1200">
		 <tr>
		     <td style="width:400px; color:#007D00; font-size:14px; font-weight:bold; font-family:Georgia;" align="center">Level_1</td>
			 <td style="width:400px; color:#007D00; font-size:14px; font-weight:bold; font-family:Georgia;" align="center">Level_2</td>
			 <td style="width:400px; color:#007D00; font-size:14px; font-weight:bold; font-family:Georgia;" align="center">Level_3</td>
		 </tr>
		</table>	 
      </td>
	 </tr>
	<tr>
<td align="left" width="1200">
 <table border="0" width="1200" bgcolor="#FFFFFF">
 <tr bgcolor="#7a6189">
 <td align="center"><input type="text" style="width:400px;" value="" id="L1" onKeyUp="Click('L1',this.value)" <?php if($_REQUEST['DPid']){ echo ''; }else{ echo 'disabled'; } ?>/></td>
 <td align="center"><input type="text" style="width:400px;" value="" id="L2" onKeyUp="Click('L2',this.value)" <?php if($_REQUEST['DPid']){ echo ''; }else{ echo 'disabled'; } ?>/></td>
 <td align="center"><input type="text" style="width:400px;" value="" id="L3" onKeyUp="Click('L3',this.value)" <?php if($_REQUEST['DPid']){ echo ''; }else{ echo 'disabled'; } ?>/></td>
 </tr>
</table>	 
</td>
	 </tr>
	 <tr>
	  <td align="left" width="1200">
	     <table border="0" width="1200" bgcolor="#FFFFFF">
		 <tr bgcolor="#FFFFFF">
		 <td colspan="2" style="width:400px;" align="center">
		 <span id="L1Span"><select name="SelectL1" id="SelectL1" style="width:400px; height:80px;" size="40"><option></option></select></span>
		 </td>
		 <td colspan="2" style="width:400px;" align="center">
		 <span id="L2Span"><select name="SelectL2" id="SelectL2" style="width:400px; height:80px;" size="40"><option></option></select></span>
		 </td>
		 <td colspan="2" style="width:400px;" align="center">
		 <span id="L3Span"><select name="SelectL3" id="Selectl3" style="width:400px; height:80px;" size="40"><option></option></select></span>
		 </td>
		 </tr>
		</table>	 
      </td>
	 </tr>
<?php //********************************** ?>	
	 <tr>
	  <td style="100%" align="center">
	    <table border="1" align="center" bgcolor="#FFFFFF">
		 <tr>
<?php /**************************************************************** Level Statrt *****************************************/ ?>		 
		  <td style="width:400px;" align="center" valign="top">
	       <table border="0">
	        <tr>
			 <td id="TableL1Span">
			  <table id="TableL1" border="1">
			   <tr bgcolor="#7a6189">
			    <td class="font" style="width:50px;" align="center"><b>EC</b></td>
			    <td class="font" style="width:270px;" align="center"><b>Name</b></td>
			    <td class="font" style="width:40px;" align="center"><b>Order</b></td>
			    <td class="font" style="width:40px;" align="center"><b>Del</b></td> 
	           </tr>
<?php if($_REQUEST['DPid']){ $_SESSION['DPid']=$_REQUEST['DPid'];               
$sql_1=mysql_query("select hrm_querylevel_employee.*,EmpCode,Fname,Sname,Lname from hrm_querylevel_employee INNER JOIN hrm_employee ON hrm_querylevel_employee.EmployeeID=hrm_employee.EmployeeID where hrm_querylevel_employee.DepartmentId=".$_SESSION['DPid']." AND hrm_querylevel_employee.Level=1 Order By LevelNo ASC", $con); while($res_1=mysql_fetch_array($sql_1)) { ?>
               <tr bgcolor="#FFFFFF">
               <td class="font1" style="width:50px;" align="center"><?php echo $res_1['EmpCode']; ?></td>
               <td class="font1" style="width:270px;" align=""><?php echo $res_1['Fname'].' '.$res_1['Sname'].' '.$res_1['Lname']; ?></td>  
               <td class="font1" style="width:40px;" align=""><select style="width:40px; height:18px;" onChange="OrderC(this.value,<?php echo $res_1['QLevelId']; ?>)">
   <option value="<?php echo $res_1['LevelNo']; ?>">&nbsp;<?php echo $res_1['LevelNo']; ?></option><option value="1">&nbsp;1</option><option value="2">&nbsp;2</option>
   <option value="3">&nbsp;3</option></select></td>
               <td class="font1" style="width:40px;" align="center">
			   <a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="DelLevel('L1',<?php echo $res_1['QLevelId'].', '.$_SESSION['DPid']; ?>)"></a></td>  
              </tr>
<?php } } ?>
			 </table> 
			</td>
		   </tr>
	      </table>
		 </td>
        <td style="width:400px;" align="center" valign="top">
	       <table border="0">
	        <tr>
			 <td id="TableL2Span">
			  <table id="TableL2" border="1">
			   <tr bgcolor="#7a6189">
			    <td class="font" style="width:50px;" align="center"><b>EC</b></td>
			    <td class="font" style="width:270px;" align="center"><b>Name</b></td>
			    <td class="font" style="width:40px;" align="center"><b>Order</b></td>
			    <td class="font" style="width:40px;" align="center"><b>Del</b></td> 
	           </tr>
<?php if($_REQUEST['DPid']){ $_SESSION['DPid']=$_REQUEST['DPid'];               
$sql_2=mysql_query("select hrm_querylevel_employee.*,EmpCode,Fname,Sname,Lname from hrm_querylevel_employee INNER JOIN hrm_employee ON hrm_querylevel_employee.EmployeeID=hrm_employee.EmployeeID where hrm_querylevel_employee.DepartmentId=".$_SESSION['DPid']." AND hrm_querylevel_employee.Level=2 Order By LevelNo ASC", $con); while($res_2=mysql_fetch_array($sql_2)) { ?>
               <tr bgcolor="#FFFFFF">
               <td class="font1" style="width:50px;" align="center"><?php echo $res_2['EmpCode']; ?></td>
               <td class="font1" style="width:270px;" align=""><?php echo $res_2['Fname'].' '.$res_1['Sname'].' '.$res_2['Lname']; ?></td>  
               <td class="font1" style="width:40px;" align=""><select style="width:40px; height:18px;" onChange="OrderC(this.value,<?php echo $res_2['QLevelId']; ?>)">
   <option value="<?php echo $res_2['LevelNo']; ?>">&nbsp;<?php echo $res_2['LevelNo']; ?></option><option value="1">&nbsp;1</option><option value="2">&nbsp;2</option>
   <option value="3">&nbsp;3</option></select></td>
               <td class="font1" style="width:40px;" align="center">
			   <a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="DelLevel('L2',<?php echo $res_2['QLevelId'].', '.$_SESSION['DPid']; ?>)"></a></td>  
              </tr>
<?php } } ?>
			 </table> 
			</td>
		   </tr>
	      </table>
		 </td>
		 <td style="width:400px;" align="center" valign="top">
	       <table border="0">
	        <tr>
			 <td id="TableL3Span">
			  <table id="TableL3" border="1">
			   <tr bgcolor="#7a6189">
			    <td class="font" style="width:50px;" align="center"><b>EC</b></td>
			    <td class="font" style="width:270px;" align="center"><b>Name</b></td>
			    <td class="font" style="width:40px;" align="center"><b>Order</b></td>
			    <td class="font" style="width:40px;" align="center"><b>Del</b></td> 
	           </tr>
<?php if($_REQUEST['DPid']){ $_SESSION['DPid']=$_REQUEST['DPid'];               
$sql_3=mysql_query("select hrm_querylevel_employee.*,EmpCode,Fname,Sname,Lname from hrm_querylevel_employee INNER JOIN hrm_employee ON hrm_querylevel_employee.EmployeeID=hrm_employee.EmployeeID where hrm_querylevel_employee.DepartmentId=".$_SESSION['DPid']." AND hrm_querylevel_employee.Level=3 Order By LevelNo ASC", $con); while($res_3=mysql_fetch_array($sql_3)) { ?>
               <tr bgcolor="#FFFFFF">
               <td class="font1" style="width:50px;" align="center"><?php echo $res_3['EmpCode']; ?></td>
               <td class="font1" style="width:270px;" align=""><?php echo $res_3['Fname'].' '.$res_3['Sname'].' '.$res_3['Lname']; ?></td>  
               <td class="font1" style="width:40px;" align=""><select style="width:40px; height:18px;" onChange="OrderC(this.value,<?php echo $res_3['QLevelId']; ?>)">
   <option value="<?php echo $res_3['LevelNo']; ?>">&nbsp;<?php echo $res_3['LevelNo']; ?></option><option value="1">&nbsp;1</option><option value="2">&nbsp;2</option>
   <option value="3">&nbsp;3</option></select></td>
               <td class="font1" style="width:40px;" align="center">
			   <a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="DelLevel('L3',<?php echo $res_3['QLevelId'].', '.$_SESSION['DPid']; ?>)"></a></td>  
              </tr>
<?php } } ?>
			 </table> 
			</td>
		   </tr>
	      </table>
		 </td>
<?php /**************************************************************** Level Close *****************************************/ ?>	
		 </tr>
		</table>
	  </td>
	 </tr>	
<?php //********************************** ?>	
	  <tr>
      <td align="Right" class="fontButton"><table border="0" width="550">
		<tr><td style="width:210px;">&nbsp;</td><td align="right" style="width:120px;">
		       <?php    //<input type="submit" name="SaveDesigKRA" id="SaveDesigKRA" value="save" style="display:none;"/>
		                // <input type="submit" name="SingleSaveDesigKRA" id="SingleSaveDesigKRA" value="save" style="display:none;"/> ?>
							  </td>
			<td align="center" style="width:60px;">				  
<input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
</td>
			     </td>
		</tr></table>
      </td>
    </tr>
	
	
	
	
   </form>
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
