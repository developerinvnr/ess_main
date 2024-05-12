<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//if($_SESSION['login'] = true){require_once('PhpFile/EmpMasterP.php'); } else {$msg= "Session Expiry..............."; }
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;} .All{font-size:11px; height:18px;} .All_80{font-size:11px; height:18px; width:80px;} .All_50{font-size:11px; height:18px; width:50px;} .All_100{font-size:11px; height:18px; width:100px;} .All_120{font-size:11px; height:18px; width:120px;} .All_150{font-size:11px; height:18px; width:150px;}.All_200{font-size:11px; height:18px; width:200px;} .All_350{font-size:11px; height:18px; width:350px;} .th{font-family:Times New Roman;font-size:12px;font-weight:bold;text-align:center;color:#FFFFFF; background-color:#376A9D;height:26px;} 
.tdl{font-family:Times New Roman;font-size:14px;color:#000000;}
.tdr{font-family:Times New Roman;font-size:12px;text-align:right;color:#000000;}
.tdc{font-family:Times New Roman;font-size:12px;text-align:center;color:#000000;}
.selecti{font-family:Times New Roman;font-size:12px;background-color:#DDFFBB;}
.inner_table{height:550px;overflow-y:auto;width:auto;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/EmpMasterAjaxCall.js"></script>
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<Script type="text/javascript">window.history.forward(1);
//function edit(value) { var agree=confirm("Are you sure you want to edit this employee record?");
//if (agree) { var x = "EmpMasterEdit.php?action=edit&eid="+value;  window.location=x;}}

function AddNewEmp()
{ var agree=confirm("Are you sure you want to add new employee record?"); 
  if (agree) {  var CompanyId = document.getElementById("ComId").value;
                var x = "AddEmp.php?CompanyId="+CompanyId;  window.location=x; } }
				
function edit(value)
{ var agree=confirm("Are you sure you want to edit this employee record?"); 
  if (agree) { window.open("EmpGeneral.php?ID="+value+"&Event=Edit&p=g", '_blank'); window.focus(); }
}				
	
function SelectDeptEmp(v)
{ var Sts=document.getElementById("StsE").value; var x="EmpMaster.php?act=search&option=true&rest=true&actualV=12wr12&mainpoint=121&deptt=22&DpId="+v+"&s="+Sts; window.location=x;}				
function SelectStsEmp(v)
{ var Dep=document.getElementById("DepartmentE").value; var x="EmpMaster.php?act=search&option=true&rest=true&actualV=12wr12&mainpoint=121&deptt=22&DpId="+Dep+"&s="+v; window.location=x;}				


function ReadHistory(EI)
{window.open("EmpHistory.php?EI="+EI,"HForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=920,height=600");}

function ReadCheck(EI)
{window.open("EmpCheckDate.php?EI="+EI,"HForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=920,height=500");}


function ReadLVReg(EI,Y)
{window.open("EmpCheckLeaveReg.php?EI="+EI+"&Y="+Y,"HForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=920,height=600");}

function ClickConf(EI)
{var v=document.getElementById("DepartmentE").value; 
 var win = window.open("EmpCheckConfReg.php?action=conf&EI="+EI,"CForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=800,height=280");
 //var timer = setInterval( function() { if(win.closed) {  clearInterval(timer);  window.location="EmpMaster.php?DpId="+v; } }, 1000); 
}
	
$(document).ready(function () { $("#table1").freezeHeader({ 'height': '450px' }); })


function ReadFiroB(ei,ec)
{ 
  var w=900; var h=650;
  window.open("http://www.yarms.in/reg/vspl/findtreslt.php?tid=2&ei="+ei+"&ut=intvi&ec="+ec,"ff","menubar=no,scrollbars=yes,resizable=no,directories=no,width="+w+",height="+h);
}

				
//function edit(value)
//{ var agree=confirm("Are you sure you want to edit this employee record?"); 
//  if (agree) {  var x = "EmpGeneral.php?ID="+value+"&Event=Edit";  window.location=x; }
//}

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
<?php //*******************************************************************************************?>
<?php //****************START*****START*****START******START******START*************************************?>
<?php //*******************************************************************************************?>
	  
<table border="0" style="margin-top:0px; width:100%; height:400px;">
    <tr height="50">
	  <td align="left">&nbsp;</td>
	  <td align="left" colspan="2" valign="top">
	   <?php //----------------Display Change password--------------------------- ?>
		 <form name="form" method="post"  onSubmit="return validate(this)"> 
         <span id="ChangeEmpPass"></span>
         </form>    
	  </td>
	</tr>
	<tr>
	    <td align="right" width="1%">&nbsp;</td>
		<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>
		
		<td width="100%" valign="top">
		   <table border="0" width="95%">
			 <tr><td>
				    <table border="0">
		            <tr>
					   <td style="width:140px;" class="heading">Employee Master</td>
	                   <td class="tdr" style="width:100px;"><b>Department :</b></td>
                       <td class="tdl" style="width:3px;">
                       <select style="font-size:11px; width:150px; height:18px; background-color:#DDFFBB; display:block;" name="DepartmentE" id="DepartmentE" onChange="SelectDeptEmp(this.value)"><?php if($_REQUEST['DpId'] AND $_REQUEST['DpId']!='') { if($_REQUEST['DpId']=='All'){$DN='ALL';} else { $SqlDep=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DepartmentId=".$_REQUEST['DpId'], $con); $ResDep=mysql_fetch_array($SqlDep); $DN=$ResDep['DepartmentCode']; }?><option value="<?php echo $_REQUEST['DpId']; ?>"><?php echo '&nbsp;'.$DN;?></option><?php } else { ?><option value="" style="margin-left:0px; background-color:#84D9D5;" selected>Select Department</option><?php } ?>   
<?php $SqlDepartment=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDepartment=mysql_fetch_array($SqlDepartment)) { ?><option value="<?php echo $ResDepartment['DepartmentId']; ?>"><?php echo $ResDepartment['DepartmentCode'];?></option><?php } ?>
<option value="All" >ALL</option></select>
	  <input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /> 
                      </td>
					  <td style="width:10px;">&nbsp;</td>
					  <td class="tdr" style="width:50px;"><b>Status :</b></td>
					  <td class="td1" style="font-size:11px; width:120px;">
<?php if($_REQUEST['s']=='A'){$sts='Active';}elseif($_REQUEST['s']=='D'){$sts='Dective';}else{$sts='All';} ?>
                       <select style="font-size:11px; width:100px; height:18px; background-color:#DDFFBB; display:block;" name="StsE" id="StsE" onChange="SelectStsEmp(this.value)">
		<option value="<?php echo $_REQUEST['s']; ?>"><?php echo $sts; ?></option>
<?php if($_REQUEST['s']!='A'){?><option value="A" >Active</option><?php } ?>
<?php if($_REQUEST['s']!='D'){?><option value="D" >Dective</option><?php } ?>
<?php if($_REQUEST['s']!='ALL'){?><option value="All" >ALL</option><?php } ?>
					   </select>
					  </td>
	                  <td class="tdl" style="width:200px;"><a href="#" onClick="AddNewEmp()"><img src="images/addEmp.png" border="0" />Add New Employee</a></td>
	                  
	                  <td class="tdl" style="background-color:#FFFF6C;text-align:center;width:200px;">Submission of Resignation</td>
	                  
					  <td class="tdl" style="color:#008000;"><b><span id="msg"></span></td>
		           </tr>
                   </table>
				</td>
			 </tr>
			 <tr>
			   <td valign="top" style="width:100%;"> 
<table border="1" id="table1" cellspacing="1" style="width:100%;">
 <div class="thead">
 <thead>
 <tr bgcolor="#7a6189">
  <td class="th" style="width:3%;">Sn</td>
  <td class="th" style="width:4%;">EC</td>
  <td class="th" style="width:15%;">Name</td>
  <td class="th" style="width:10%;">HeadQuater</td>
  <td class="th" style="width:10%">Department</td>
  <td class="th" style="width:20%">Designation</td>
  <td class="th" style="width:2%">Status</td>
  <td class="th" style="width:8%;">Action</td>
  <td class="th" style="width:4%;">Confirm</td>
  <td class="th" style="width:4%;">History</td>
  <td class="th" style="width:4%;">LV-Reg</td>
  <td class="th" style="width:4%;">FiroB</td>
  <td class="th" style="width:4%; font-size:11px;">Warm<br>Welcome</td>
  <td class="th" style="width:4%; font-size:11px;">DL<br>Req<sup>rd</sup></td>
  <td class="th" style="width:4%; font-size:11px;">Open<br />Test</sup></td>
  <td class="th" style="width:4%; font-size:11px;">KRA <br/>UnBlock</sup></td>
  <td class="th" style="width:4%; font-size:11px;">Use<br/>&nbsp;Apps&nbsp;</sup></td>
<?php /*<?php if($UserId==9 OR $UserId==7){ ?><td class="th" style="width:50px;">Check</td><?php } ?>*/ ?>
 </tr>
 </thead>
 </div>
<?php  if($_REQUEST['DpId'] AND $_REQUEST['DpId']!=''){

$selQ="e.EmployeeID, EmpCode, Fname, Sname, Lname, EmpStatus, SubmitSelfAsset, HqName, DateJoining, DepartmentCode, DesigName, Gender, Married, DR, DateConfirmationYN, ConfirmHR, Req_DrivLic, exam_allow, KRAUnBlock, DateConfirmation, UseApps";

$join="hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de ON g.DesigId=de.DesigId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId";

if($_REQUEST['s']=='All'){ $stsCon="e.EmpStatus!='De'"; }else{ $stsCon="e.EmpStatus='".$_REQUEST['s']."'"; }
if($_REQUEST['DpId']=='All'){ $deptCon="1=1"; }else{ $deptCon="g.DepartmentId=".$_REQUEST['DpId']; }

$sqlDP = mysql_query("SELECT ".$selQ." FROM ".$join." WHERE ".$stsCon." AND ".$deptCon." AND e.CompanyId=".$CompanyId." order by e.EmpCode ASC", $con);

	  
      $Sno=1;  while($resDP = mysql_fetch_assoc($sqlDP)) { 
	  if($resDP['DR']=='Y'){$MS='Dr.';} elseif($resDP['Gender']=='M'){$MS='Mr.';} elseif($resDP['Gender']=='F' AND $resDP['Married']=='Y'){$MS='Mrs.';} elseif($resDP['Gender']=='F' AND $resDP['Married']=='N'){$MS='Miss.';}  $Name=$MS.' '.$resDP['Fname'].' '.$resDP['Sname'].' '.$resDP['Lname'];
	  $LEC=strlen($resDP['EmpCode']); 
      if($LEC==1){$EC='000'.$resDP['EmpCode'];} if($LEC==2){$EC='00'.$resDP['EmpCode'];} if($LEC==3){$EC='0'.$resDP['EmpCode'];} if($LEC>=4){$EC=$resDP['EmpCode'];}
      
       $sqlch=mysql_query("select * from hrm_employee_separation where EmployeeID=".$resDP['EmployeeID']." AND Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C'", $con); $rowch=mysql_num_rows($sqlch);
      
?>
 <div class="tbody">
 <tbody>
 <tr style="background-color:<?php if($rowch>0){echo '#FFFF6C';}else{echo '#FFFFFF';} ?>;"> 
  <td class="tdc"><?php echo $Sno; ?></td>
  <td class="tdc"><?php echo $EC; ?></td>
  <td class="tdl">&nbsp;<?php echo ucwords(strtolower($Name)); ?></td>
  <td class="tdl">&nbsp;<?php echo ucwords(strtolower($resDP['HqName']));?></td>
  <td class="tdc"><?php echo $resDP['DepartmentCode'];?></td>
  <td class="tdl">&nbsp;<?php echo ucwords(strtolower($resDP['DesigName']));?></td>
  <td class="tdc" bgcolor="<?php if($resDP['EmpStatus']=='D'){echo '#FBE4BB';}?>"><?php echo $resDP['EmpStatus']; ?></td>
  <td class="tdc"><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $resDP['EmployeeID']; ?>)"></a>
  <?php if($_SESSION['User_Permission']=='Edit'){?>&nbsp;&nbsp;<a href="#"><img src="images/key.png" alt="ChangeKey" border="0" onClick="ChangeKey(<?php echo $resDP['EmployeeID']; ?>)"></a><?php /*&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="del(<?php echo $resDP['EmployeeID']; ?>)"></a><?php */?> <?php } ?></td>

  <td class="tdc"><?php if($_SESSION['User_Permission']=='Edit'){?><a href="javascript:ClickConf(<?php echo $resDP['EmployeeID']; ?>)"><?php if($resDP['DateConfirmationYN']=='Y' AND $resDP['ConfirmHR']=='Y'){echo '<b style="color:#008000;">Y</b>';}elseif(($resDP['DateConfirmationYN']=='Y' AND $resDP['ConfirmHR']=='N') OR ($resDP['DateConfirmationYN']=='N' AND $resDP['ConfirmHR']=='Y') OR ($resDP['DateConfirmationYN']=='N' AND $resDP['ConfirmHR']=='YY')){echo '<b style="color:#F27900;">P</b>';}elseif($resDP['DateConfirmationYN']=='N' AND $resDP['ConfirmHR']=='N'){echo '<b style="color:#C0C0C0;">N</b>';} ?></a><?php } ?></td>

  <td align="center" style="font:Georgia; font-size:11px; width:60px;">
<?php if($_SESSION['User_Permission']=='Edit'){?>
<a href="javascript:ReadHistory(<?php echo $resDP['EmployeeID']; ?>)">Click</a>
<?php } ?>
</td>
  <td align="center" style="font:Georgia; font-size:11px; width:60px;">
<a href="#"><img src="images/select.png" border="0" alt="Edit" onClick="ReadLVReg(<?php echo $resDP['EmployeeID'].', '.date("Y"); ?>)"></a></td>

 <td align="center" style="font:Georgia; font-size:11px; width:60px;">
<?php if($resDP['SubmitSelfAsset']=='Y'){?>
<a href="javascript:ReadFiroB(<?php echo $resDP['EmployeeID']; ?>,'<?php echo $EC; ?>')">Click</a>
<?php } ?>
 </td>
 
 <td align="center" style="font:Georgia;font-size:11px; color:#0000CC;">
  <?php if(date("m")>=2 && date("m")<=12){ $PrevMnt=date("m")-1; $PrevYer=date("Y"); }
        else{ $PrevMnt=12; $PrevYer=date("Y")-1;} 
        $em=date("m",strtotime($resDP['DateJoining']));
		$ey=date("Y",strtotime($resDP['DateJoining']));
  
  if($em==$PrevMnt && $ey==$PrevYer){ ?>
  <script>function FunWarlWelCOme(e){window.open("WarmWelCome.php?EI="+e,"WelComeForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=920,height=600");}</script>
  <span onClick="FunWarlWelCOme(<?php echo $resDP['EmployeeID']; ?>)" style="cursor:pointer; text-decoration:underline;">Click</span>
  <?php } ?>
  </td>

  <td align="center" id="TDL_<?php echo $resDP['EmployeeID']; ?>" style="background-color:<?php if($resDP['Req_DrivLic']=='Y'){echo '#69D200';  }?>;">
<input type="checkbox"  id="Req_DrivLic_<?php echo $resDP['EmployeeID']; ?>" onClick="FunChkReq_DrivLic(<?php echo $resDP['EmployeeID']; ?>)" <?php if($resDP['Req_DrivLic']=='Y'){echo 'checked';} ?> />
</td>

<td align="center" id="OnTDL_<?php echo $resDP['EmployeeID']; ?>" style="background-color:<?php if($resDP['exam_allow']=='Y'){echo '#69D200';  }?>;">
<input type="checkbox"  id="exam_allow_<?php echo $resDP['EmployeeID']; ?>" onClick="FunExam_allow(<?php echo $resDP['EmployeeID']; ?>)" <?php if($resDP['exam_allow']=='Y'){echo 'checked';} ?> />
</td>

<td align="center" id="On2TDL_<?php echo $resDP['EmployeeID']; ?>" style="background-color:<?php if($resDP['KRAUnBlock']=='Y'){echo '#69D200';  }?>;">
<input type="checkbox"  id="KRAUnBlock_<?php echo $resDP['EmployeeID']; ?>" onClick="FunKRAUnBlock(<?php echo $resDP['EmployeeID']; ?>)" <?php if($resDP['KRAUnBlock']=='Y'){echo 'checked';} ?> />
</td>

<td align="center" id="On3TDL_<?php echo $resDP['EmployeeID']; ?>" style="background-color:<?php if($resDP['UseApps']=='Y'){echo '#69D200';  }?>;">
<input type="checkbox"  id="UseApps_<?php echo $resDP['EmployeeID']; ?>" onClick="FunUseApps(<?php echo $resDP['EmployeeID']; ?>)" <?php if($resDP['UseApps']=='Y'){echo 'checked';} ?> />
</td>

<?php /*
<td align="center" style="font:Georgia; font-size:11px; width:60px;">
<?php if($UserId==9 OR $UserId==7){ ?><a href="javascript:ReadCheck(<?php echo $resDP['EmployeeID']; ?>)">Click</a><?php } ?></td>
*/ ?>




 </tr>
</tbody>
</div>
<?php $Sno++; } }?>

<script type="text/javascript" language="javascript">
function FunChkReq_DrivLic(eid)
{
 if(document.getElementById('Req_DrivLic_'+eid).checked==true){var vv='Y';}else{var vv='N';}
 var url = 'EmpDLChk.php';	var pars = 'For=ChkDLUser&Eid='+eid+'&vv='+vv;	var myAjax = new Ajax.Request(
 url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_City
	});
}
function show_City(originalRequest)
{ document.getElementById('SpnaChkDL').innerHTML = originalRequest.responseText; 
   var e=document.getElementById('ChkVEmp').value;
   if(document.getElementById('ChkV').value==1)
   { 
    if(document.getElementById('ChkVvv').value=='Y'){ document.getElementById("TDL_"+e).style.background='#69D200'; } 
    else{ document.getElementById("TDL_"+e).style.background='#FFFFFF'; }
   }
   else{ alert("Error!"); }
}


function FunExam_allow(eid)
{
 if(document.getElementById('exam_allow_'+eid).checked==true){var vv='Y';}else{var vv='N';}
 var url = 'EmpDLChk.php';	var pars = 'For=ChkOnLineExamUser&Eid='+eid+'&vv='+vv;	var myAjax = new Ajax.Request(
 url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_Exam
	});
}
function show_Exam(originalRequest)
{ document.getElementById('SpnaChkDL').innerHTML = originalRequest.responseText; 
   var e=document.getElementById('ChkVEmp').value;
   if(document.getElementById('ChkV').value==1)
   { 
    if(document.getElementById('ChkVvv').value=='Y'){ document.getElementById("OnTDL_"+e).style.background='#69D200'; } 
    else{ document.getElementById("OnTDL_"+e).style.background='#FFFFFF'; }
   }
   else{ alert("Error!"); }
}


function FunKRAUnBlock(eid)
{
 if(document.getElementById('KRAUnBlock_'+eid).checked==true){var vv='Y';}else{var vv='N';}
 var url = 'EmpDLChk.php';	var pars = 'For=ChkKRAUnBlock&Eid='+eid+'&vv='+vv;	var myAjax = new Ajax.Request(
 url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_KRAUnBlock
	});
}
function show_KRAUnBlock(originalRequest)
{ document.getElementById('SpnaChkDL').innerHTML = originalRequest.responseText; 
   var e=document.getElementById('ChkVEmp').value;
   if(document.getElementById('ChkV').value==1)
   { 
    if(document.getElementById('ChkVvv').value=='Y'){ document.getElementById("On2TDL_"+e).style.background='#69D200'; } 
    else{ document.getElementById("On2TDL_"+e).style.background='#FFFFFF'; }
   }
   else{ alert("Error!"); }
}


function FunUseApps(eid)
{
 if(document.getElementById('UseApps_'+eid).checked==true){var vv='Y';}else{var vv='N';}
 var url = 'EmpDLChk.php';	var pars = 'For=ChkUseApps&Eid='+eid+'&vv='+vv;	var myAjax = new Ajax.Request(
 url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_UseApps
	});
}
function show_UseApps(originalRequest)
{ document.getElementById('SpnaChkDL').innerHTML = originalRequest.responseText; 
   var e=document.getElementById('ChkVEmp').value; 
   if(document.getElementById('ChkV').value==1)
   { 
     if(document.getElementById('ChkVvv').value=='Y'){ document.getElementById("On3TDL_"+e).style.background='#69D200'; } 
     else{ document.getElementById("On3TDL_"+e).style.background='#FFFFFF'; }
   }
   else{ alert("Error!"); }
}

</script>
<span id="SpnaChkDL"></span>

</table>
                 </td>	
				 </tr>
				
		   </table>  		
		</td>
		
        <?php } ?>
		<?php //-------------------------------------------------------------------------------------------------------- ?>
		
		<td align="left" width="20%">&nbsp;</td>
	</tr>
</table>
		
<?php //****************************************************************************************?>
<?php //*************END*****END*****END******END******END**********************?>
<?php //******************************************************************************************?>
		
	  </td>
	</tr>
	
  </table>
 </td>
</tr>
</table>
</body>
</html>