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
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

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
function SelectDeptEmp(value){ var x = 'SelectAppRev.php?DPid='+value; window.location=x; }  


function Click(v1,v2)
{ var ComId=document.getElementById("ComId").value; var DpId=document.getElementById("DPid").value; 
  //alert(v1+"-"+v2+"-"+ComId+"-"+DpId);
  if(v1=='R')
  {  var url = 'CheckRev.php';	var pars = 'dpid='+DpId+'&v2='+v2+'&CId='+ComId;	var myAjax = new Ajax.Request(
	 url, { 	method: 'post', parameters: pars,  onComplete: show_CheckRevDesig });  
  } 
 if(v1=='A')
  {   var url = 'CheckApp.php';	var pars = 'dpid='+DpId+'&v2='+v2+'&CId='+ComId;	var myAjax = new Ajax.Request(
      url, { 	method: 'post', parameters: pars,  onComplete: show_CheckAppDesig });   
  } 
}
function show_CheckRevDesig(originalRequest)
{ document.getElementById('RevSpan').innerHTML = originalRequest.responseText; }

function show_CheckAppDesig(originalRequest)
{ document.getElementById('AppSpan').innerHTML = originalRequest.responseText; }


function GetRev(Id,Dept)
{ 
  var YId=document.getElementById("YearId").value; 
  var UId=document.getElementById("UserId").value; var ComId=document.getElementById("ComId").value; 
  //alert(Id+"-"+Dept+"-"+YId+"-"+UId+"-"+ComId); 
  var url = 'GetSelectRev.php';	var pars = 'id='+Id+'&dept='+Dept+'&YId='+YId+'&UId='+UId+'&CId='+ComId;  var myAjax = new Ajax.Request(
  url, { 	method: 'post', parameters: pars,  onComplete: show_GetRev });
}	
function show_GetRev(originalRequest)
{ document.getElementById('TableRevSpan').innerHTML = originalRequest.responseText; }		


function GetApp(Id,Dept)
{ var YId=document.getElementById("YearId").value; 
  var UId=document.getElementById("UserId").value; var ComId=document.getElementById("ComId").value;
  var url = 'GetSelectApp.php';	var pars = 'id='+Id+'&dept='+Dept+'&YId='+YId+'&UId='+UId+'&CId='+ComId;	var myAjax = new Ajax.Request(
  url, { 	method: 'post', parameters: pars,  onComplete: show_GetApp });
}	
function show_GetApp(originalRequest)
{ document.getElementById('TableAppSpan').innerHTML = originalRequest.responseText; }		

function DelRev(v1,v2) { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var x = "SelectAppRev.php?action=delRev&did="+v1+'&DPid='+v2;  window.location=x;}}

function DelApp(v1,v2) { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var x = "SelectAppRev.php?action=delApp&did="+v1+'&DPid='+v2;  window.location=x;}}

function AddNewRev() { document.getElementById("TableRev2").style.display='block'; }

                         // GetDept
function GetDept(value,DeptId){
	var url = 'RevGetDept.php';	var pars = 'id='+value+'&DeptId='+DeptId;	var myAjax = new Ajax.Request(
	url, { method: 'post', 	parameters: pars, onComplete: show_GetDept });
}
function show_GetDept(originalRequest)
{ document.getElementById('DesigSpan').innerHTML = originalRequest.responseText; }


                         // GetDesig
function GetDesig(value,DeptId){
    document.getElementById("SpanRev").style.display='block'; 
	var url = 'RevGetDesig.php';	var pars = 'id='+value+'&DeptId='+DeptId;;	var myAjax = new Ajax.Request(
	url, { method: 'post', 	parameters: pars, onComplete: show_GetDesig });
}
function show_GetDesig(originalRequest)
{ document.getElementById('EmpRevSpan').innerHTML = originalRequest.responseText; }


function AddNewApp() { document.getElementById("TableApp2").style.display='block'; }

                         // GetDept
function GetDept2(value,DeptId){
	var url = 'AppGetDept.php';	var pars = 'id='+value+'&DeptId='+DeptId;	var myAjax = new Ajax.Request(
	url, { method: 'post', 	parameters: pars, onComplete: show_AppGetDept });
}
function show_AppGetDept(originalRequest)
{ document.getElementById('AppDesigSpan').innerHTML = originalRequest.responseText; }


                         // GetDesig
function GetDesig2(value,DeptId){
    document.getElementById("SpanApp").style.display='block'; 
	var url = 'AppGetDesig.php';	var pars = 'id='+value+'&DeptId='+DeptId;;	var myAjax = new Ajax.Request(
	url, { method: 'post', 	parameters: pars, onComplete: show_AppGetDesig });
}
function show_AppGetDesig(originalRequest)
{ document.getElementById('EmpAppSpan').innerHTML = originalRequest.responseText; }


//document.getElementById('TableRev').style.display='none';
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
    <tr><td align="right" width="280" class="heading">PMS - Select Appraiser/ Reviewer</td><td width="50">&nbsp;</td>
        <td class="td1" style="font-size:11px; width:150px;">
                       <select style="font-size:11px; width:200px; height:18px; background-color:#DDFFBB; display:block;" name="DepartmentE" id="DepartmentE" onChange="SelectDeptEmp(this.value)">
					   <option value="" style="margin-left:0px; background-color:#84D9D5;" selected>Select Department</option><?php $SqlDepartment=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DeptStatus='A' order by DepartmentName ASC", $con); while($ResDepartment=mysql_fetch_array($SqlDepartment)) { ?><option value="<?php echo $ResDepartment['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDepartment['DepartmentCode'];?></option><?php } ?></select>
					   <input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /> 
        </td>
		<td style="width:250px; ">
<?php if($_REQUEST['DPid']){ $_SESSION['DPid']=$_REQUEST['DPid']; 
$sqlD=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_SESSION['DPid'], $con); $resD=mysql_fetch_assoc($sqlD); ?>		
&nbsp;<font style=" font-family:Georgia;color:#000066;font-weight:bold; font-size:15px;"> <?php echo '" '.$resD['DepartmentName'].' "'; ?> </font>		
<input type="hidden" name="DPid" id="DPid" value="<?php echo $_SESSION['DPid']; ?>" /><?php } ?>
<input type="hidden" name="YearId" id="YearId" value="<?php echo $YearId; ?>" />
<input type="hidden" name="UserId" id="UserId" value="<?php echo $UserId; ?>" />
       </td>
		<td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><span id="MsgSpan"></span><?php echo $msg; ?></b></td>	
	</tr>
   </table>
  </td>
 </tr>
 <tr><td>&nbsp;</td></tr>
<?php if(( $_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>	
 <tr>
 <td style="width:5px;" valign="top" align="center">&nbsp;</td>

<?php //*********************************************** Open Department******************************************************?> 
<td align="left" id="type" valign="top" style="display:block; width:100%">             
   <table border="0" width="1000">
    <tr>
	  <td align="left" width="1000">
	     <table border="0" width="1000">
		 <tr>
		     <td colspan="2" style="width:490px; color:#007D00; font-size:14px; font-weight:bold; font-family:Georgia;" align="center">( REVIEWER )</td>
		     <td colspan="2" style="width:490px; color:#007D00; font-size:14px; font-weight:bold; font-family:Georgia;" align="center">( APPRAISER )</td>
		 </tr>
		</table>	 
      </td>
	 </tr>
	<tr>
	  <td align="left" width="1000">
	     <table border="0" width="1000" bgcolor="#FFFFFF">
		 <tr bgcolor="#7a6189">
		 <td class="font" style="width:150px;" align="center"><b>Type : Name <font color="#FFFF00">&nbsp;Or&nbsp;</font> Code</b></td>
		 <td align="center"><input type="text" style="width:340px;" size="50" value="" id="StringRev" onKeyUp="Click('R',this.value)"/></td>
		 <td class="font" style="width:150px;" align="center"><b>Type : Name <font color="#FFFF00">&nbsp;Or&nbsp;</font> Code</b></td>
		 <td align="center"><input type="text" style="width:340px;" size="50" value="" id="StringApp" onKeyUp="Click('A',this.value)"/></td>
		 </tr>
		</table>	 
      </td>
	 </tr>
	 <tr>
	  <td align="left" width="1000">
	     <table border="0" width="1000" bgcolor="#FFFFFF">
		 <tr bgcolor="#FFFFFF">
		 <td colspan="2" style="width:490px;" align="center">
		 <span id="RevSpan"><select name="SelectRev" id="SelectRev" style="width:490px; height:100px;" size="50"><option></option></select></span>
		 </td>
		 <td colspan="2" style="width:490px;" align="center">
		 <span id="AppSpan"><select name="SelectApp" id="SelectApp" style="width:490px; height:100px;" size="50"><option></option></select></span>
		 </td>
		 </tr>
		</table>	 
      </td>
	 </tr>
     <tr><td>&nbsp;</td></tr> 	  
	
	<?php //********************************** ?>	
	 <tr>
	 
	  <td style="100%" align="center">
	    <table border="1" align="center">
		 <tr>
		  <td style="width:500px;" align="center" valign="top">
	       <table border="0">
	        <tr>
			 <td id="TableRevSpan">
			  <table id="TableRev">
			   <tr bgcolor="#7a6189">
		        <td class="font" style="width:50px;" align="center"><b>Sno</b></td>
			    <td class="font" style="width:300px;" align="center"><b>Name</b></td>
			    <td class="font" style="width:200px;" align="center"><b>Designation</b></td>
			    <td class="font" style="width:50px;" align="center"><b>Action</b></td> 
	           </tr>
<?php if($_REQUEST['DPid']){ $_SESSION['DPid']=$_REQUEST['DPid'];               
$sqlRev=mysql_query("select * from hrm_pms_reviewer where DepartmentId=".$_SESSION['DPid']." Order By ReviewerId ASC", $con); 
$no=1; while($resRev=mysql_fetch_array($sqlRev)) { ?>
               <tr bgcolor="#FFFFFF">
  <td class="font1" style="width:50px;" align="center"><?php echo $no; ?></td>
<?php  
      $sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,DesigId,DesigId2,Gender,Married from hrm_pms_reviewer INNER JOIN hrm_employee ON hrm_pms_reviewer.EmployeeID_UserId=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_pms_reviewer.EmployeeID_UserId=".$resRev['EmployeeID_UserId'], $con); 
	  $resE=mysql_fetch_assoc($sqlE);
	  if($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';} 
	  $Name=$resE['EmpCode'].'&nbsp;&nbsp;-&nbsp;&nbsp;'.$M.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; 
	  $sqlDe=mysql_query("select DesigCode from hrm_designation where DesigId=".$resE['DesigId']." OR DesigId=".$resE['DesigId2'], $con); $resDe=mysql_fetch_assoc($sqlDe);
	  $Position=$resDe['DesigCode'];   ?> 
  <td class="font1" style="width:300px;" align=""><?php echo $Name; ?></td>  
  <td class="font1" style="width:200px;" align=""><?php echo $Position; ?></td>
  <td class="font1" style="width:50px;" align="center">
<?php if($_SESSION['User_Permission']=='Edit'){ ?>
   <a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="DelRev(<?php echo $resRev['ReviewerId'].','.$_SESSION['DPid']; ?>)"></a>
<?php } ?>
  </td>  
             </tr>
<?php $no++; } } ?>
             
			  </table> 
			  
			 </td>
		   </tr>
	      </table>
		 </td>

         <td style="width:500px;" align="center" valign="top">
	       <table border="0">
	        <tr>
			 <td id="TableAppSpan">
			  <table id="TableApp">
			   <tr bgcolor="#7a6189">
		        <td class="font" style="width:50px;" align="center"><b>Sno</b></td>
			    <td class="font" style="width:300px;" align="center"><b>Name</b></td>
			    <td class="font" style="width:200px;" align="center"><b>Designation</b></td>
			    <td class="font" style="width:50px;" align="center"><b>Action</b></td> 
	           </tr>
<?php if($_REQUEST['DPid']){ $_SESSION['DPid']=$_REQUEST['DPid']; 
$sqlRev=mysql_query("select * from hrm_pms_appraiser where DepartmentId=".$_SESSION['DPid']." Order By AppraiserId ASC", $con); $no=1; while($resApp=mysql_fetch_array($sqlRev)) { ?>
               <tr bgcolor="#FFFFFF">
  <td class="font1" style="width:50px;" align="center"><?php echo $no; ?></td>
<?php $sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,DesigId,DesigId2,Gender,Married from hrm_pms_appraiser INNER JOIN hrm_employee ON hrm_pms_appraiser.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_pms_appraiser.EmployeeID=".$resApp['EmployeeID'], $con); 
	  $resE=mysql_fetch_assoc($sqlE);
	  if($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';} 
	  $Name=$resE['EmpCode'].'&nbsp;&nbsp;-&nbsp;&nbsp;'.$M.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; 
	  $sqlDe=mysql_query("select DesigCode from hrm_designation where DesigId=".$resE['DesigId']." OR DesigId=".$resE['DesigId2'], $con); $resDe=mysql_fetch_assoc($sqlDe);
	  $Position=$resDe['DesigCode'];  ?> 
  <td class="font1" style="width:300px;" align=""><?php echo $Name; ?></td>  
  <td class="font1" style="width:200px;" align=""><?php echo $Position; ?></td>
  <td class="font1" style="width:50px;" align="center">
<?php if($_SESSION['User_Permission']=='Edit'){ ?>
   <a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="DelApp(<?php echo $resApp['AppraiserId'].','.$_SESSION['DPid']; ?>)"></a>
<?php } ?>
  </td>  
               </tr>
<?php $no++; } }?>


			  </table> 
			 </td>
		   </tr>
	      </table>
		 </td>

		 </tr>
		</table>
	  </td>
	  
	 </tr>	
<?php //********************************** ?>	
	  <tr>
      <td align="Right" class="fontButton"><table border="0" width="550">
		<tr><td style="width:210px;">&nbsp;</td><td align="right" style="width:120px;">
<?php if($_SESSION['User_Permission']=='Edit'){ ?>
		       <?php    //<input type="submit" name="SaveDesigKRA" id="SaveDesigKRA" value="save" style="display:none;"/>
		                // <input type="submit" name="SingleSaveDesigKRA" id="SingleSaveDesigKRA" value="save" style="display:none;"/> ?>
<?php } ?>
							  </td>
			<td align="center" style="width:60px;">				  
<input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
</td><td align="center" style="width:60px;"><input type="button" name="Refresh" value="refresh" onClick="javascript:window.location='SelectAppRev.php?DPid=<?php echo $_SESSION['DPid']; ?>'"/></td>
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
