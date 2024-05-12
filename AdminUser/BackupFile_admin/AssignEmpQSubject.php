<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//****************************************************************************************************************
if($_REQUEST['qi'])
{ $Sql=mysql_query("update hrm_deptquerysub set AssignEmpId=".$_REQUEST['ei']." where DeptQSubId=".$_REQUEST['qi'], $con); 
  if($Sql){$msg='Data save successfully!';}
}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</script>
<Script type="text/javascript" language="javascript">
function SelectDeptEmp(value)
{ var url = 'AssignEmpQSubject.php?v='+value; window.location=url; }
	
function EEdit(v)
{ document.getElementById("ChangeE_"+v).style.display='none'; document.getElementById("SaveE_"+v).style.display='block'; 
  document.getElementById("SelEmpID_"+v).disabled=false;
}	
function Esave(qi,sn,d)
{ if(document.getElementById("SelEmpID_"+sn).value==0){alert("please select emplyee from employee list!"); return false;}
  var agree=confirm("Are you sure, you want to save data?");
  if(agree){ var ei=document.getElementById("SelEmpID_"+sn).value; var x="AssignEmpQSubject.php?ei="+ei+"&v="+d+"&qi="+qi; window.location=x;}
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
 <td>
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" width="100%" id="MainWindow">
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
<form name="AppRevForm" method="post">	  
<table border="0" style="margin-top:0px; width:800px;height:400px;">
	<tr>
	    <td align="right" width="2%" valign="top">&nbsp;</td>
		<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true) { ?>
		<td align="center" style="width:800px;" valign="top">
		   <table border="0" width="100%">
		     <tr><td align="left" class="heading">Assign Employee Query
			     <font class="font4"><b>&nbsp;&nbsp;&nbsp;&nbsp;<span id="msg"><?php echo $msg; ?></span></b></font></td></tr>
			 <tr><td>
				    <table border="0">
		            <tr>
					   <td style="width:180px;"></td>
	                   <td style="font-size:11px; width:100px;"><?php if($_REQUEST['v']){ echo 'Department :-'; } else { echo 'Select :-'; } ?></td>
                       <td class="td1" style="font-size:11px; width:150px;">
<select style="font-size:11px; width:150px; height:18px; background-color:#DDFFBB; display:block;" name="DepartmentE" id="DepartmentE" onChange="SelectDeptEmp(this.value)">
<?php if($_REQUEST['v']){ $SqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['v'], $con); $ResD=mysql_fetch_assoc($SqlD); ?>
<option value="<?php echo $_REQUEST['v']; ?>" style="margin-left:0px; background-color:#84D9D5;">&nbsp;<?php echo $ResD['DepartmentCode']; ?></option><?php } else { ?>				   
<option value="" style="margin-left:0px; background-color:#84D9D5;" selected>Department</option><?php } ?>
<?php $SqlDepartment=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDepartment=mysql_fetch_array($SqlDepartment)) { ?><option value="<?php echo $ResDepartment['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDepartment['DepartmentCode'];?></option><?php } ?></select>
					   <input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /> 
                       <input type="hidden" name="YId" id="YId" value="<?php  echo $YearId;  ?>" />
                      </td>
	                  <td class="All_200" align="right">&nbsp;</td>
		           </tr>
                   </table>
				</td>
			 </tr>
				 <?php //---------------------------------------Display Record----------------------------------------------------------------- ?>
				 <tr>
				   <td colspan="6">
				     <table>
<tr bgcolor="#7a6189" style="height:22px;">
 <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>SNo</b></td>
 <td style="color:#ffffff;font-family:Georgia;font-size:12px;width:300px;" align="center"><b>Query Subject</b></td>
 <td style="color:#ffffff;font-family:Georgia;font-size:12px;width:400px;" align="center"><b>Assign Employee Details</b></td>
 <td style="color:#ffffff;font-family:Georgia;font-size:12px;width:50px;" align="center"><b>Save</b></td>
</tr>
<?php if($_REQUEST['v']!=''){ $sql=mysql_query("select * from hrm_deptquerysub where DepartmentId=".$_REQUEST['v']." AND Status='A' order by DeptQSubject ASC", $con); 
      $sn=1; while($res=mysql_fetch_array($sql)){ ?>
<tr bgcolor="#FFFFFF" style="height:20px;">
<form name="form" method="post">
 <td align="center" style="font:Georgia; font-size:12px; width:50px;">
 <?php echo $sn; ?><input type="hidden" name="RowId_<?php echo $sn; ?>" value="<?php echo $res['DeptQSubId']; ?>" /></td>
 <td style="font-family:Georgia;font-size:12px;width:300px;" valign="top">&nbsp;<?php echo $res['DeptQSubject']; ?></td>
 <td style="font-family:Georgia;font-size:12px;width:400px;" valign="top">
 <select style="width:398px;font-size:12px; font-family:Georgia;height:20px;" id="SelEmpID_<?php echo $sn; ?>" name="SelEmpID_<?php echo $sn; ?>" disabled>
 <?php if($res['AssignEmpId']==0) { ?><option value="0" style="background-color:#84C1FF;padding:1px;">&nbsp;Select Employee</option>
 <?php } elseif($res['AssignEmpId']==9999) { ?><option value="9999" style="background-color:#84C1FF;padding:1px;">&nbsp;State Wise</option>
 <?php } else { $sqlEE=mysql_query("select EmpCode,Fname,Sname,Lname,DesigId from hrm_deptquerysub INNER JOIN hrm_employee ON hrm_deptquerysub.AssignEmpId=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_deptquerysub.AssignEmpId=hrm_employee_general.EmployeeID where hrm_deptquerysub.AssignEmpId=".$res['AssignEmpId'], $con); $resEE=mysql_fetch_assoc($sqlEE); $sqlDeE=mysql_query("select DesigName from hrm_designation where DesigId=".$resEE['DesigId'], $con); $resDeE=mysql_fetch_assoc($sqlDeE);
$ECEDesig=$resEE['EmpCode'].' - '.$resEE['Fname'].' '.$resEE['Sname'].' '.$resEE['Lname'].'/ '.$resDeE['DesigName']; ?>
  <option value="<?php echo $res['AssignEmpId']; ?>"><?php echo $ECEDesig; ?></option><?php } ?>
 <?php $sqlE22=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,DesigId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['v']." order by Fname ASC", $con); while($resE22=mysql_fetch_assoc($sqlE22)) { $sqlDe22=mysql_query("select DesigName from hrm_designation where DesigId=".$resE22['DesigId'], $con); $resDe22=mysql_fetch_assoc($sqlDe22);
  $Ename2=$resE22['EmpCode'].' - '.$resE22['Fname'].' '.$resE22['Sname'].' '.$resE22['Lname'].'/ '.$resDe22['DesigName']; ?>
 <option value="<?php echo $resE22['EmployeeID']; ?>" style="padding:1px;"><?php echo $Ename2; ?></option><?php } ?>
 <option value="9999" style="padding:1px;">&nbsp;State Wise</option>
 </select>
 </td>
 <td>
<?php if($_SESSION['User_Permission']=='Edit'){?>
<input type="button" name="ChangeE" id="ChangeE_<?php echo $sn; ?>" style="width:50px; display:block;" value="edit" onClick="EEdit(<?php echo $sn; ?>)">
     <input type="button" name="ESave" id="SaveE_<?php echo $sn; ?>" style="width:50px;display:none;" value="save" onClick="return Esave(<?php echo $res['DeptQSubId'].', '.$sn.', '.$_REQUEST['v']; ?>)">
<?php } ?>
</td>
 </form>
</tr>
<?php $sn++; } $tt=$sn-1; echo '<input type="hidden" name="TotNo" id="TotNo" value="'.$tt.'" />'; } ?>

					 </table>
				   </td>
				 </tr>
				 <tr>
      <td align="Right" class="fontButton"><table border="0" style="width:180px;">
		<tr>
		<td align="right" style="width:90px;"><?php if($_REQUEST['v']!='') { ?><input type="button" name="refreshh" value="refresh" style="width:88px;" onClick="javascript:window.location='AssignEmpQSubject.php?v=<?php echo $_REQUEST['v']; ?>'"/><?php } ?></td>
		</tr></table>
      </td>
   </tr>
			     <tr>
			    </table>
			   </td>
		   </table>
		</td>
        <?php } ?>
		<?php //-------------------------------------------------------------------------------------------------------- ?>
		<td align="left" width="20%">&nbsp;</td>
	</tr>
</table>
 </form>  		
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