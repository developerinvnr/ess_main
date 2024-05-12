<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}

if($_REQUEST['action']=='return')
{ $sql=mysql_query("update hrm_employee_confletter set SubmitStatus='N' where EmployeeID=".$_REQUEST['e'], $con); }

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.th{ font-family:Times New Roman;font-size:12px;height:25px;text-align:center;background-color:#7a6189;color:#FFFFFF;font-weight:bold; }
.tdl{ font-family:Times New Roman;font-size:12px;text-align:left; }
.tdc{ font-family:Times New Roman;font-size:12px;text-align:center; }
.tdr{ font-family:Times New Roman;font-size:12px;text-align:right; }
.tdinput{ font-family:Times New Roman;font-size:14px;text-align:center;width:100%; border:hidden; }
.tdinputl{ font-family:Times New Roman;font-size:14px;text-align:left;width:100%; border:hidden; }
.tdsel{ font-family:Times New Roman;font-size:14px;text-align:left;}
.inner_table{height:500px;overflow-y:auto;width:auto;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/EmpMasterAjaxCall.js"></script>
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<script>$(document).ready(function () { $("#table1").freezeHeader({ 'height': '450px' }); })</script>
<Script type="text/javascript">
function SelectDeptEmp(v)
{ window.location="EmpConfLetter.php?DpId="+v; }	

function FunRet(e)
{ 
  var a="Are you sure ?";
  if(confirm(a)){ var d=document.getElementById("DepartmentE").value; 
  window.location="EmpConfLetter.php?action=return&r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&e="+e+"&DpId="+d; return true;} else return false;
  
}	

function FunEmpShow(v,n,e,id)
{ var d=document.getElementById("DepartmentE").value;
  if(v=='Y' || v=='N')
  {
   var agree=confirm("Are you sure?");
   if(agree)
   {
    var url = 'EmpConfLetterAct.php'; var pars = 'act=UpdPerm&DpId='+d+'&value='+v+'&id='+id+'&e='+e+'&n='+n;
    var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_result });
   }
   else { document.getElementById("EmpShow_"+id).value='N'; return false; }
  }
}
function show_result(originalRequest)
{ document.getElementById('ResultSpan').innerHTML = originalRequest.responseText;  
  if(document.getElementById("actvlu").value=='yes')
  {
   if(document.getElementById("nnum").value==1)
   {
    document.getElementById("EmpShow_"+document.getElementById("actid").value).style.background='#D5FFAA'; 
   }
   else if(document.getElementById("nnum").value==2)
   {
    document.getElementById("EmpShowTrr_"+document.getElementById("actid").value).style.background='#D5FFAA'; 
   }
  }
}

</Script>     
</head>
<body class="body">
<span id="ResultSpan"></span>
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
<?php //**********************************************************************************?>
<?php //**************START*****START*****START******START******START************************?>
<?php //*************************************************************************?>
	  
<table border="0" style="margin-top:0px; width:100%; height:400px;">
	<tr>
	    <td align="right" width="1%">&nbsp;</td>
		<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>
		
		<td align="center" style="width:100%;" valign="top">
		   <table border="0" width="100%">
		     <tr><td align="left" class="heading">Employee Confirmation Letter<font class="font4"><b>&nbsp;<span id="msg"></span></b></font></td></tr>
			 <tr><td>
				    <table border="0">
		            <tr>
					   <td style="width:250px;"></td>
	                   <td style="font-size:14px; font-family:Times New Roman; width:150px;"><b>Select Department :</b></td>
                       <td class="td1" style="font-size:11px; width:150px;">
                       <select style="font-size:11px; width:150px; height:18px; background-color:#DDFFBB; display:block;" name="DepartmentE" id="DepartmentE" onChange="SelectDeptEmp(this.value)"><?php if($_REQUEST['DpId']=='all'){?><option value="all" selected>&nbsp;ALL</option><?php } elseif($_REQUEST['DpId']!='' AND $_REQUEST['DpId']!='all') { $SqlDep=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DepartmentId=".$_REQUEST['DpId'], $con); $ResDep=mysql_fetch_array($SqlDep);?><option value="<?php echo $_REQUEST['DpId']; ?>"><?php echo '&nbsp;'.$ResDep['DepartmentCode'];?></option><?php } else { ?><option value="" style="margin-left:0px; background-color:#84D9D5;" selected>Select Department</option><?php } ?>   
<?php $SqlDepartment=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDepartment=mysql_fetch_array($SqlDepartment)) { ?><option value="<?php echo $ResDepartment['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDepartment['DepartmentCode'];?></option><?php } ?><option value="all">&nbsp;ALL</option></select>
	  <input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /> 
                      </td>
		           </tr>
                   </table>
				</td>
			 </tr>
			 <tr>
			   <td valign="top" style="width:100%;"> 
<table border="1" id="table1" style="width:100%;" cellspacing="1">
 <div class="thead">
   <thead>
 <tr bgcolor="#7a6189" style="height:25px;">
	<td rowspan="2" class="th" style="width:2%;">Sn</td>
	<td rowspan="2" class="th" style="width:3%;">EC</td>
	<td rowspan="2" class="th" style="width:15%">Name</td>
	<td rowspan="2" class="th" style="width:10%;">HeadQuater</td>
	<td rowspan="2" class="th" style="width:15%;">Department</td>
	<td rowspan="2" class="th" style="width:20%;">Designation</td>
	<td rowspan="2" class="th" style="width:4%;">Status</td>
	<td rowspan="2" class="th" style="width:4%;">Form</td>
	<td colspan="3" class="th">Emp Confirmation<br>Letter Show</td>
	<td rowspan="2" class="th" style="width:6%;">Edit</td>
    <td rowspan="2" class="th" style="width:4%;">Return</td>
	<?php /*
	<?php if($UserId==9){ ?><td class="th" style="width:10%;"><b>Check</b></td><?php } ?>
	*/ ?>
 </tr>
 <tr>
  <td class="th" style="width:4%;">Normal</td>
  <td class="th" style="width:4%;">Trainy</td>
  <td class="th" style="width:4%;">Extend</td>
 </tr> 
 </thead>
 </div>
<?php if($_REQUEST['DpId'] AND $_REQUEST['DpId']!='') { 
    
  if($_REQUEST['DpId']!='all'){ $sqlDP = mysql_query("SELECT e.EmployeeID,EmpCode,Fname,Sname,Lname,EmpStatus,HqName,g.DepartmentId,DepartmentName,DesigName,Gender,Married,DR FROM hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_designation de ON g.DesigId=de.DesigId WHERE e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND g.DepartmentId=".$_REQUEST['DpId']." order by EmpCode DESC", $con); }
  else { $sqlDP = mysql_query("SELECT e.EmployeeID,EmpCode,Fname,Sname,Lname,EmpStatus,HqName,g.DepartmentId,DepartmentName,DesigName,Gender,Married,DR FROM hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_designation de ON g.DesigId=de.DesigId WHERE e.EmpStatus='A' AND e.CompanyId=".$CompanyId." order by EmpCode DESC", $con); }

	  
      $Sno=1;  while($resDP = mysql_fetch_assoc($sqlDP)) { 
	  if($resDP['DR']=='Y'){$MS='Dr.';} elseif($resDP['Gender']=='M'){$MS='Mr.';} elseif($resDP['Gender']=='F' AND $resDP['Married']=='Y'){$MS='Mrs.';} elseif($resDP['Gender']=='F' AND $resDP['Married']=='N'){$MS='Miss.';}  $Name=$MS.' '.$resDP['Fname'].' '.$resDP['Sname'].' '.$resDP['Lname'];
	  $LEC=strlen($resDP['EmpCode']); 
      if($LEC==1){$EC='000'.$resDP['EmpCode'];} if($LEC==2){$EC='00'.$resDP['EmpCode'];} if($LEC==3){$EC='0'.$resDP['EmpCode'];} if($LEC>=4){$EC=$resDP['EmpCode'];}
?>
<div class="tbody">
     <tbody>
 <tr bgcolor="<?php if($Sno%2){ echo '#FFFFFF'; } else {echo '#D9D1E7';}?>"> 
		<td class="tdc"><?php echo $Sno; ?></td>
		<td class="tdc"><?php echo $EC; ?></td>
		<td class="tdl">&nbsp;<?php echo strtoupper($Name); ?></td>
		<td class="tdl">&nbsp;<?php echo strtoupper($resDP['HqName']);?></td>
		<td class="tdl">&nbsp;<?php echo strtoupper($resDP['DepartmentName']);?></td>
		<td class="tdl">&nbsp;<?php echo strtoupper($resDP['DesigName']);?></td>
	<td class="tdc" bgcolor="<?php if($resDP['EmpStatus']=='D'){echo '#FBE4BB';}?>"><?php echo $resDP['EmpStatus'];?></td>
		
		<?php $sqChk=mysql_query("select * from hrm_employee_confletter where EmployeeID=".$resDP['EmployeeID'], $con); 
		$rowChk=mysql_num_rows($sqChk); ?>
	    
		<td class="tdc"><?php if($_SESSION['User_Permission']=='Edit' && $rowChk==0){ ?><a href="EmpConfFormoK.php?e=<?php echo $resDP['EmployeeID']; ?>&c=1&cd=0000000&d=<?=$_REQUEST['DpId']?>"><blink>Form</blink></a><?php } ?></td>
		
		<?php $sqf=mysql_query("select * from hrm_employee_confletter where Status='A' AND EmployeeID=".$resDP['EmployeeID'], $con); 
		$rref=mysql_num_rows($sqf); $ref=mysql_fetch_assoc($sqf); ?>
		
		<td class="tdc"><?php if($ref['ConfLetterId']>0){ ?><select id="EmpShow_<?php echo $ref['ConfLetterId']; ?>" class="tdsel" onChange="FunEmpShow(this.value,<?php echo '1,'.$resDP['EmployeeID'].','.$ref['ConfLetterId']; ?>)" style="width:100%;background-color:<?php if($ref['EmpShow']=='Y'){echo '#C4FF88';}else{echo '#FFFFFF';} ?>;" ><option value="<?php echo $ref['EmpShow']; ?>" selected><?php if($ref['EmpShow']=='Y'){echo 'Yes';}else{echo 'No';} ?></option><option value="<?php if($ref['EmpShow']=='Y'){echo 'N';}else{echo 'Y';} ?>"><?php if($ref['EmpShow']=='Y'){echo 'No';}else{echo 'Yes';} ?></option></select><?php } ?>
		</td>
		<td class="tdc"><?php if($ref['ConfLetterId']>0){ ?><select id="EmpShowTrr_<?php echo $ref['ConfLetterId']; ?>" class="tdsel" onChange="FunEmpShow(this.value,<?php echo '2,'.$resDP['EmployeeID'].','.$ref['ConfLetterId']; ?>)" style="width:100%;background-color:<?php if($ref['EmpShow_Trr']=='Y'){echo '#C4FF88';}else{echo '#FFFFFF';} ?>;" ><option value="<?php echo $ref['EmpShow_Trr']; ?>" selected><?php if($ref['EmpShow_Trr']=='Y'){echo 'Yes';}else{echo 'No';} ?></option><option value="<?php if($ref['EmpShow_Trr']=='Y'){echo 'N';}else{echo 'Y';} ?>"><?php if($ref['EmpShow_Trr']=='Y'){echo 'No';}else{echo 'Yes';} ?></option></select><?php } ?>
		</td>
		<td class="tdc"><?php if($ref['ConfLetterId']>0){ ?><select id="EmpShowExe_<?php echo $ref['ConfLetterId']; ?>" class="tdsel" onChange="FunEmpShow(this.value,<?php echo '3,'.$resDP['EmployeeID'].','.$ref['ConfLetterId']; ?>)" style="width:100%;background-color:<?php if($ref['EmpShow_Ext']=='Y'){echo '#C4FF88';}else{echo '#FFFFFF';} ?>;" ><option value="<?php echo $ref['EmpShow_Ext']; ?>" selected><?php if($ref['EmpShow_Ext']=='Y'){echo 'Yes';}else{echo 'No';} ?></option><option value="<?php if($ref['EmpShow_Ext']=='Y'){echo 'N';}else{echo 'Y';} ?>"><?php if($ref['EmpShow_Ext']=='Y'){echo 'No';}else{echo 'Yes';} ?></option></select><?php } ?>
		</td>
		<td class="tdc">
		<?php if($rowChk==1 && $ref['SubmitStatus']=='N'){ ?><font color="#FF8042">Pending</font>
		<?php } elseif($rowChk==1 && $ref['SubmitStatus']=='Y' && $ref['Recommendation']==1){ ?>
		 <a href="EmpConfFormoK.php?e=<?=$resDP['EmployeeID']?>&c=1&cd=0000000&d=<?=$_REQUEST['DpId']?>&v=A">Ok</a>
		<?php } elseif($rowChk==1 && $ref['SubmitStatus']=='Y' && $ref['Recommendation']==2){ ?>
		 <a href="EmpConfFormoK.php?e=<?=$resDP['EmployeeID']?>&c=1&cd=0000000&d=<?=$_REQUEST['DpId']?>&v=A">Extend</a>
		<?php }elseif($rowChk>=2){ ?>
		 <a href="EmpConfFormoK.php?e=<?=$resDP['EmployeeID']?>&c=1&cd=0000000&d=<?=$_REQUEST['DpId']?>&v=D" target="blank">Extend</a>/ <a href="EmpConfFormoK.php?e=<?=$resDP['EmployeeID']?>&c=1&cd=0000000&d=<?=$_REQUEST['DpId']?>&v=A"><?php if($ref['SubmitStatus']=='N'){echo '<font color="#F07800">Pending</font>';}else{echo 'Ok';}?></a>
		 
		<?php }elseif($rowChk==0){ echo ''; } ?>
		
		
		
		
		<?php /* if($rref>=2){ echo '<a href="EmpConfFormoK.php?e='.$resDP['EmployeeID'].'&c=1&cd=0000000&d='.$resDP['DepartmentId'].'&v=D" target="blank">Extend</a>/ <a href="EmpConfFormoK.php?e='.$resDP['EmployeeID'].'&c=1&cd=0000000&d='.$resDP['DepartmentId'].'&v=A">Ok</a>'; } 
		      elseif($rref==1 AND $ref['Recommendation']==1){ echo '<a href="EmpConfFormoK.php?e='.$resDP['EmployeeID'].'&c=1&cd=0000000&d='.$resDP['DepartmentId'].'&v='.$ref['Status'].'" target="blank">Ok</a>'; } 
		      elseif($rref==1 AND $ref['Recommendation']==2){ echo '<a href="EmpConfFormoK.php?e='.$resDP['EmployeeID'].'&c=1&cd=0000000&d='.$resDP['DepartmentId'].'&v='.$ref['Status'].'" target="blank">Extend</a>'; } 
		      elseif($rref==0){ echo ''; } //echo 'aa='.$rref; */ ?>
		</td>

		<td class="tdc">
<?php if($_SESSION['User_Permission']=='Edit'){?>
<?php if($ref>0){ echo '<img onClick="FunRet('.$resDP['EmployeeID'].')" src="images/go-back-icon.png" border="0"/ >'; } ?>
<?php } ?>
</td>
</tr>
</tbody>
</div>
<?php $Sno++; } }?>
</table>
                 </td>	
				 </tr>
				 <?php //------------------Display Record------------------------------------- ?>
				 <tr><td><span id="DeptEmpName"></span></td></tr> 
				 <tr><td bgcolor="#B6E9E2" colspan="6"></td></tr>
		   </table>  		
		</td>
		
        <?php } ?>
		<?php //-------------------------------------------------------------------- ?>
		
		<td align="left" width="20%">&nbsp;</td>
	</tr>
</table>
		
<?php //****************************************************************************?>
<?php //****************END*****END*****END******END******END**********************************?>
<?php //******************************************************************************?>
		
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