<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//****************************************************************************************************************
if($_REQUEST['action']=='Peryn')
{$sqlUp=mysql_query("update hrm_employee set Resig_Permission='".$_REQUEST['v']."' where EmployeeID=".$_REQUEST['e'], $con);}

if(isset($_POST['SaveEdit']))
{    
	 $SqlUp = mysql_query("UPDATE hrm_employee_separation SET Rep_Approved='".$_POST['Rep_Approved']."', Hod_Approved='".$_POST['Hod_Approved']."', HR_Approved='".$_POST['HR_Approved']."', Emp_ExitInt='".$_POST['Emp_ExitInt']."', IT_NOC='".$_POST['IT_NOC']."', Rep_NOC='".$_POST['Rep_NOC']."', Log_NOC='".$_POST['Log_NOC']."', HR_NOC='".$_POST['HR_NOC']."', Acc_NOC='".$_POST['Acc_NOC']."', HR_FullFinal_Submit='".$_POST['HR_FullFinal_Submit']."', Rep_EmployeeID='".$_POST['Rep_EmployeeID']."', Hod_EmployeeID='".$_POST['Hod_EmployeeID']."', LastUpdate='".date("Y-m-d H:i:s")."' WHERE EmpSepId=".$_POST['EmpSepId'], $con);
     if($SqlUp){ $msgSep = "Data has been updeted successfully...";}   
}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> 
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.TextInput { font-family:"Times New Roman", Times, serif; font-size:11px; width:100px; height:18px;}
.th{font-family:Times New Roman;font-size:12px;font-weight:bold;text-align:center;color:#FFFFFF; background-color:#376A9D;height:26px;} 
.tdl{font-family:Times New Roman;font-size:14px;color:#000000;}
.tdr{font-family:Times New Roman;font-size:12px;text-align:right;color:#000000;}
.tdc{font-family:Times New Roman;font-size:12px;text-align:center;color:#000000;}
.selecti{font-family:Times New Roman;font-size:12px;background-color:#DDFFBB;}
.inner_table{height:550px;overflow-y:auto;width:auto;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<Script type="text/javascript" language="javascript">
function SelectDeptEmp(v)
{var x = "SepResigPermission.php?DpId="+v;  window.location=x;}				

function ResPerCheck(EI,No,DId)
{
 if(document.getElementById("Permission_"+No).checked==true)
 { var v='Y'; //document.getElementById("TD_"+No).style.backgroundColor='#FF8040';
   var agree=confirm("Are you sure, you want to allow permission for resignation to employee?");
   if(agree){window.location="SepResigPermission.php?action=Peryn&act=101&we=aa%r%aa&e="+EI+"&v="+v+"&DpId="+DId;}
 }
 else if(document.getElementById("Permission_"+No).checked==false)
 { var v='N'; //document.getElementById("TD_"+No).style.backgroundColor='#FFFFFF';
   window.location="SepResigPermission.php?action=Peryn&act=101&we=aa%r%aa&e="+EI+"&v="+v+"&DpId="+DId;
 }
 
}  


function FucChk(sn)
{ if(document.getElementById("Chk"+sn).checked==true){document.getElementById("TR"+sn).style.background='#FF80FF'; } else if(document.getElementById("Chk"+sn).checked==false){document.getElementById("TR"+sn).style.background='#FFFFFF'; }
}

function SepEdit(value) { var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "SepResigPermission.php?action=edit&eid="+value;  window.location=x;}} 

$(document).ready(function () { $("#table1").freezeHeader({ 'height': '450px' }); })                   
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
<?php //******************************************************************************?>
<?php //***************START*****START*****START******START******START*******************************?>
<?php //******************************************************************************?>
<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>
<table border="0" style="margin-top:0px;width:900px;">
	<tr>
	    <td align="right" width="2%" valign="top">&nbsp;</td>
		<td align="center" style="width:900px;" valign="top">
		   <table border="0" width="100%">
		     <tr><td style="width:350px; " align="left" class="heading">Employee Resignation Permission&nbsp;<td>
			 <td style="width:160px;"><select style="font-size:11px; width:150px; height:18px; background-color:#DDFFBB; display:block;" name="DepartmentE" id="DepartmentE" onChange="SelectDeptEmp(this.value)" disabled><?php if($_REQUEST['DpId'] AND $_REQUEST['DpId']!='') { $SqlDep=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DepartmentId=".$_REQUEST['DpId'], $con); $ResDep=mysql_fetch_array($SqlDep);?><option value="<?php echo $_REQUEST['DpId']; ?>"><?php echo '&nbsp;'.$ResDep['DepartmentCode'];?></option><?php } else { ?><option value="" style="margin-left:0px; background-color:#84D9D5;" selected>Select Department</option><?php } ?>   
<?php $SqlDepartment=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDepartment=mysql_fetch_array($SqlDepartment)) { ?><option value="<?php echo $ResDepartment['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDepartment['DepartmentCode'];?></option><?php } ?></select>
				 <input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /> 
                 <input type="hidden" name="YId" id="YId" value="<?php  echo $YearId;  ?>" /></td>
	         <td align="" style="width:90px;">
	<input type="button" name="refreshh" value="refresh" style="width:88px;" onClick="javascript:window.location='SepResigPermission.php?DpId=<?php echo $_REQUEST['DpId']; ?>'"/>
	</td>
			 </tr>
				 <?php //---------------------------------------Display Record----------------------------------------------------------------- ?>
				 <tr>
				   <td colspan="6" style="width:100%;">
				     <table border="1" style="width:100%;">
<tr bgcolor="#7a6189">
	<td class="th" style="width:30px;"><b>SN</b></td>
	<td class="th" style="width:60px;"><b>EC</b></td>
	<td class="th" style="width:250px;"><b>Name</b></td>
	<td class="th" style="width:120px;"><b>HeadQuater</b></td>
	<td class="th" style="width:100px;"><b>Department</b></td>
	<td class="th" style="width:250px;"><b>Designation</b></td>
	<td class="th" style="width:50px;"><b>Action</b></td>
 </tr>
<?php if($_REQUEST['DpId'] AND $_REQUEST['DpId']!='') { 
      $sqlDP = mysql_query("SELECT e.EmployeeID,EmpCode,Fname,Sname,Lname,EmpStatus,Resig_Permission,HqName,DepartmentCode,DesigName,Gender,Married,DR FROM hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de ON g.DesigId=de.DesigId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId WHERE e.EmpStatus!='De' AND e.CompanyId=".$CompanyId." AND g.DepartmentId=".$_REQUEST['DpId'], $con) or die(mysql_error()); 
	  
      $Sno=1;  while($resDP = mysql_fetch_assoc($sqlDP)) { 
	  if($resDP['DR']=='Y'){$MS='Dr.';} elseif($resDP['Gender']=='M'){$MS='Mr.';} elseif($resDP['Gender']=='F' AND $resDP['Married']=='Y'){$MS='Mrs.';} elseif($resDP['Gender']=='F' AND $resDP['Married']=='N'){$MS='Miss.';}  $Name=$MS.' '.$resDP['Fname'].' '.$resDP['Sname'].' '.$resDP['Lname'];
	  $LEC=strlen($resDP['EmpCode']); 
      if($LEC==1){$EC='000'.$resDP['EmpCode'];} if($LEC==2){$EC='00'.$resDP['EmpCode'];} if($LEC==3){$EC='0'.$resDP['EmpCode'];} if($LEC>=4){$EC=$resDP['EmpCode'];}
?>
 <tr bgcolor="#FFFFFF"> 
		<td class="tdc"><?php echo $Sno; ?></td>
		<td class="tdc"><?php echo $EC; ?></td>
		<td class="tdl">&nbsp;<?php echo ucwords(strtolower($Name)); ?></td>
		<td class="tdl">&nbsp;<?php echo $resDP['HqName'];?></td>
		<td class="tdl">&nbsp;<?php echo $resDP['DepartmentCode'];?></td>
		<td class="tdl">&nbsp;<?php echo $resDP['DesigName'];?></td>
		<td class="tdc" id="TD_<?php echo $Sno; ?>" bgcolor="<?php if($resDP['Resig_Permission']=='Y'){ echo '#FF8040'; } else {echo '#FFFFFF';} ?>">
		<input type="checkbox" name="Permission_<?php echo $Sno; ?>" id="Permission_<?php echo $Sno; ?>" class="EditInput" <?php if($resDP['Resig_Permission']=='Y'){ echo 'checked'; } ?> onClick="ResPerCheck(<?php echo $resDP['EmployeeID'].', '.$Sno.', '.$_REQUEST['DpId']; ?>)"/>
		</td>
</tr>
<?php $Sno++; } }?>
					 </table>
				   </td>
				 </tr>			
			     <tr>
			    </table>
			   </td>
		   </table>
		</td>
		<?php //-------------------------------------------------------------------------------------------------------- ?>
		<td align="left" width="20%">&nbsp;</td>
	</tr>
	<tr><td colspan="15" style="width:350px; " align="left" class="heading">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Separation Control Panel&nbsp;
	<font color="#007700"><?php echo $msgSep; ?></font><td></tr>
	<tr>
	  <td valign="top" style="width:100%;">
	   <table border="1" id="table1" style="width:100%;" cellspacing="1">
	      <div class="thead">
          <thead>
		  <tr bgcolor="#7a6189">
		   <td colspan="6" class="th"><b>Details</b></td>
		   <td colspan="3" class="th"><b>Resignation Approval</b></td>
		   <td rowspan="2" class="th" style="width:60px;"><b>Exit-Int Form</b></td>
		   <td colspan="5" class="th"><b>Clearance Form</b></td>
		   <td rowspan="2" class="th" style="width:60px;"><b>F&F Settl. </b></td>
		   <?php /*
		   <td rowspan="2" class="th" style="width:60px;"><b>Reporting </b></td>
		   <td rowspan="2" class="th" style="width:60px;"><b>HOD </b></td>
		   */ ?>
		   <td rowspan="2" class="th" style="width:60px;"><b>Action</b></td>
		  </tr>
		  <tr bgcolor="#7a6189">
		   <td class="th" style="width:30px;">Check</td>
		   <td class="th" style="width:30px;"><b>Sno</b></td>
		   <td class="th" style="width:50px;"><b>EC</b></td>
		   <td class="th" style="width:200px;"><b>Name</b></td>
		   <td class="th" style="width:100px;"><b>Department</b></td>
		   <td class="th" style="width:80px;"><b>Resignation Date</b></td>
		   <td class="th" style="width:60px;"><b>Reporting</b></td>
		   <td class="th" style="width:60px;"><b>HOD</b></td>
		   <td class="th" style="width:60px;"><b>HR</b></td>
		   
		   <td class="th" style="width:60px;"><b>IT</b></td>
		   <td class="th" style="width:60px;"><b>Depart mental</b></td>
           <td class="th" style="width:60px;"><b>Logist</b></td>
		   <td class="th" style="width:60px;"><b>HR</b></td>
		   <td class="th" style="width:60px;"><b>Account</b></td>  
		  </tr>
		  </thead>
		  </div>
<?php $sql=mysql_query("select * from hrm_employee_separation INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_separation.EmployeeID where hrm_employee.CompanyId=".$CompanyId." order by Emp_ResignationDate DESC", $con);  $row=mysql_num_rows($sql); if($row>0) { $Sno=1; while($res=mysql_fetch_array($sql)) { $sqlE=mysql_query("select e.EmpCode,e.Fname,e.Sname,e.Lname,g.DepartmentId,d.DepartmentCode,s.Rep_EmployeeID,CONCAT(rep.Fname,' ',rep.Lname) as reporting,s.Hod_EmployeeID,CONCAT(hod.Fname,' ',hod.Lname) as hod_name from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_employee_separation s ON s.EmployeeID = e.EmployeeID LEFT JOIN hrm_employee rep ON rep.EmployeeID = s.Rep_EmployeeID LEFT JOIN hrm_employee hod ON hod.EmployeeID = s.Hod_EmployeeID where e.EmployeeID=".$res['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE);
if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$res['EmpSepId']){ ?>	
<form name="formEdit" method="post" onSubmit="return validateMK(this)">	
         <div class="tbody">
         <tbody>	  
         <tr bgcolor="#FFFFFF" id="TR<?php echo $Sno; ?>">
         <td class="tdc"><input type="checkbox" id="Chk<?php echo $Sno; ?>" onClick="FucChk(<?php echo $Sno; ?>)"/></td>
	      <td align="center" class="All_30" valign="top"><?php echo $Sno; ?></td> 		  
	      <td align="center" class="All_50" valign="top"><?php echo $resE['EmpCode']; ?></td>
		  <td class="All_200" valign="top"><?php echo $resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; ?></td>		  
		  <td class="All_100" valign="top"><?php echo $resE['DepartmentCode']; ?></td>
		  <td align="center" class="All_80" valign="top"><?php echo $res['Emp_ResignationDate'];?></td> 
		  <td style="width:60px;" align="center"><select name="Rep_Approved" style="font-family:Times New Roman; font-size:11px; width:58px; height:20px;">
		   <option value="<?php echo $res['Rep_Approved']; ?>"><?php if($res['Rep_Approved']=='Y')echo 'YES'; else echo 'NO'; ?></option>
		   <option value="<?php if($res['Rep_Approved']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($res['Rep_Approved']=='Y')echo 'NO'; else echo 'YES'; ?></option>
		   </select></td>
		  <td style="width:60px;" align="center"><select name="Hod_Approved" style="font-family:Times New Roman; font-size:11px; width:58px; height:20px;">
		   <option value="<?php echo $res['Hod_Approved']; ?>"><?php if($res['Hod_Approved']=='Y')echo 'YES'; else echo 'NO'; ?></option>
		   <option value="<?php if($res['Hod_Approved']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($res['Hod_Approved']=='Y')echo 'NO'; else echo 'YES'; ?></option>
		   </select></td>
		  <td style="width:60px;" align="center"><select name="HR_Approved" style="font-family:Times New Roman; font-size:11px; width:58px; height:20px;">
		   <option value="<?php echo $res['HR_Approved']; ?>"><?php if($res['HR_Approved']=='Y')echo 'YES'; else echo 'NO'; ?></option>
		   <option value="<?php if($res['HR_Approved']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($res['HR_Approved']=='Y')echo 'NO'; else echo 'YES'; ?></option>
		   </select></td>
		  <td style="width:60px;" align="center"><select name="Emp_ExitInt" style="font-family:Times New Roman; font-size:11px; width:58px; height:20px;">
		   <option value="<?php echo $res['Emp_ExitInt']; ?>"><?php if($res['Emp_ExitInt']=='Y')echo 'YES'; else echo 'NO'; ?></option>
		   <option value="<?php if($res['Emp_ExitInt']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($res['Emp_ExitInt']=='Y')echo 'NO'; else echo 'YES'; ?></option>
		   </select></td>  
		  <td style="width:60px;" align="center"><select name="IT_NOC" style="font-family:Times New Roman; font-size:11px; width:58px; height:20px;">
		   <option value="<?php echo $res['IT_NOC']; ?>"><?php if($res['IT_NOC']=='Y')echo 'YES'; else echo 'NO'; ?></option>
		   <option value="<?php if($res['IT_NOC']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($res['IT_NOC']=='Y')echo 'NO'; else echo 'YES'; ?></option>
		   </select></td>
		  <td style="width:60px;" align="center"><select name="Rep_NOC" style="font-family:Times New Roman; font-size:11px; width:58px; height:20px;">
		   <option value="<?php echo $res['Rep_NOC']; ?>"><?php if($res['Rep_NOC']=='Y')echo 'YES'; else echo 'NO'; ?></option>
		   <option value="<?php if($res['Rep_NOC']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($res['Rep_NOC']=='Y')echo 'NO'; else echo 'YES'; ?></option>
		   </select></td>
                   <td style="width:60px;" align="center"><select name="Log_NOC" style="font-family:Times New Roman; font-size:11px; width:58px; height:20px;">
		   <option value="<?php echo $res['Log_NOC']; ?>"><?php if($res['Log_NOC']=='Y')echo 'YES'; else echo 'NO'; ?></option>
		   <option value="<?php if($res['Log_NOC']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($res['Log_NOC']=='Y')echo 'NO'; else echo 'YES'; ?></option>
		   </select></td>

		  <td style="width:60px;" align="center"><select name="HR_NOC" style="font-family:Times New Roman; font-size:11px; width:58px; height:20px;">
		   <option value="<?php echo $res['HR_NOC']; ?>"><?php if($res['HR_NOC']=='Y')echo 'YES'; else echo 'NO'; ?></option>
		   <option value="<?php if($res['HR_NOC']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($res['HR_NOC']=='Y')echo 'NO'; else echo 'YES'; ?></option>
		   </select></td>
		  <td style="width:60px;" align="center"><select name="Acc_NOC" style="font-family:Times New Roman; font-size:11px; width:58px; height:20px;">
		   <option value="<?php echo $res['Acc_NOC']; ?>"><?php if($res['Acc_NOC']=='Y')echo 'YES'; else echo 'NO'; ?></option>
		   <option value="<?php if($res['Acc_NOC']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($res['Acc_NOC']=='Y')echo 'NO'; else echo 'YES'; ?></option>
		   </select></td>
		  <td style="width:60px;" align="center"><select name="HR_FullFinal_Submit" style="font-family:Times New Roman; font-size:11px; width:58px; height:20px;">
		   <option value="<?php echo $res['HR_FullFinal_Submit']; ?>"><?php if($res['HR_FullFinal_Submit']=='Y')echo 'YES'; else echo 'NO'; ?></option>
		   <option value="<?php if($res['HR_FullFinal_Submit']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($res['HR_FullFinal_Submit']=='Y')echo 'NO'; else echo 'YES'; ?></option>
		   </select><input type="hidden" name="EmpSepId" id="EmpSepId" value="<?php echo $_REQUEST['eid']; ?>"/></td>
		   <?php /*
		    <td style="width:60px;" align="center">
            <select name="Rep_EmployeeID"
                style="font-family:Times New Roman; font-size:11px; width:150px; height:20px;">
                <?php 
                    $sqlEmp = mysql_query("SELECT EmpCode,EmployeeID,Fname,Lname FROM hrm_employee WHERE CompanyID=1 AND EmpStatus='A' ORDER BY Fname ASC",$con);
                        while( $resEmp = mysql_fetch_array($sqlEmp)){ if($resEmp['EmployeeID']==$resE['Rep_EmployeeID']){ ?>
                <option value="<?=$resEmp['EmployeeID']?>" selected>
                    <?= $resEmp['Fname'].' '.$resEmp['Lname'].' - '.$resEmp['EmpCode']?>
                </option>
                <?php } else{ ?>
                <option value="<?=$resEmp['EmployeeID']?>">
                    <?= $resEmp['Fname'].' '.$resEmp['Lname'].' - '.$resEmp['EmpCode']?>
                </option>
                <?php } }?>
            </select></td>
        <td style="width:60px;" align="center">
            <select name="Hod_EmployeeID"
                style="font-family:Times New Roman; font-size:11px; width:150px; height:20px;">
                <?php 
                    $sqlEmp = mysql_query("SELECT EmpCode,EmployeeID,Fname,Lname FROM hrm_employee WHERE CompanyID=1 AND EmpStatus='A' ORDER BY Fname ASC",$con);
                        while( $resEmp = mysql_fetch_array($sqlEmp)){ if($resEmp['EmployeeID']==$resE['Hod_EmployeeID']){ ?>
                <option value="<?=$resEmp['EmployeeID']?>" selected>
                    <?= $resEmp['Fname'].' '.$resEmp['Lname'].' - '.$resEmp['EmpCode']?>
                </option>
                <?php } else{ ?>
                <option value="<?=$resEmp['EmployeeID']?>">
                    <?= $resEmp['Fname'].' '.$resEmp['Lname'].' - '.$resEmp['EmpCode']?>
                </option>
                <?php } }?>
            </select>
        </td>
        */ ?>
		   <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:50px;">
<?php if($_SESSION['User_Permission']=='Edit'){ ?>
			 &nbsp;<input type="submit" name="SaveEdit"  value="" class="SaveButton">&nbsp;
<?php } ?>
		   </td>
		 </tr>

		 </form>
<?php } else { ?>	  
		  <tr bgcolor="#FFFFFF" id="TR<?php echo $Sno; ?>">
         <td class="tdc"><input type="checkbox" id="Chk<?php echo $Sno; ?>" onClick="FucChk(<?php echo $Sno; ?>)"/></td>
		   <td align="center" class="All_30" valign="top"><?php echo $Sno; ?></td>		  
	      <td align="center" class="All_50" valign="top"><?php echo $resE['EmpCode']; ?></td>
		  <td class="All_200" valign="top"><?php echo $resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; ?></td>
		  
		  <td class="All_100" valign="top"><?php echo $resE['DepartmentCode']; ?></td>
		  
		  <td align="center" class="All_80" valign="top"><?php echo date("d-m-Y",strtotime($res['Emp_ResignationDate']));?></td> 
		  <td style="font-family:Georgia;font-size:11px;width:60px;background-color:<?php if($res['Rep_Approved']=='Y')echo '#7DFF7D'; ?>;" valign="top" align="center"><?php if($res['Rep_Approved']=='Y')echo 'YES'; else echo 'NO'; ?></td>
		  <td style="font-family:Georgia;font-size:11px;width:60px;background-color:<?php if($res['Hod_Approved']=='Y')echo '#7DFF7D'; ?>;" valign="top" align="center"><?php if($res['Hod_Approved']=='Y')echo 'YES'; else echo 'NO'; ?></td>
		  <td style="font-family:Georgia;font-size:11px;width:60px;background-color:<?php if($res['HR_Approved']=='Y')echo '#7DFF7D'; ?>;" valign="top" align="center"><?php if($res['HR_Approved']=='Y')echo 'YES'; else echo 'NO'; ?></td>
		  <td style="font-family:Georgia;font-size:11px;width:60px;background-color:<?php if($res['Emp_ExitInt']=='Y')echo '#7DFF7D'; ?>;" valign="top" align="center"><?php if($res['Emp_ExitInt']=='Y')echo 'YES'; else echo 'NO'; ?></td>  
		  <td style="font-family:Georgia;font-size:11px;width:60px;background-color:<?php if($res['IT_NOC']=='Y')echo '#7DFF7D'; ?>;" valign="top" align="center"><?php if($res['IT_NOC']=='Y')echo 'YES'; else echo 'NO'; ?></td>
		  <td style="font-family:Georgia;font-size:11px;width:60px;background-color:<?php if($res['Rep_NOC']=='Y')echo '#7DFF7D'; ?>;" valign="top" align="center"><?php if($res['Rep_NOC']=='Y')echo 'YES'; else echo 'NO'; ?></td>
                  <td style="font-family:Georgia;font-size:11px;width:60px;background-color:<?php if($res['Log_NOC']=='Y')echo '#7DFF7D'; ?>;" valign="top" align="center"><?php if($res['Log_NOC']=='Y')echo 'YES'; else echo 'NO'; ?></td>
		  <td style="font-family:Georgia;font-size:11px;width:60px;background-color:<?php if($res['HR_NOC']=='Y')echo '#7DFF7D'; ?>;" valign="top" align="center"><?php if($res['HR_NOC']=='Y')echo 'YES'; else echo 'NO'; ?></td>
		  <td style="font-family:Georgia;font-size:11px;width:60px;background-color:<?php if($res['Acc_NOC']=='Y')echo '#7DFF7D'; ?>;" valign="top" align="center"><?php if($res['Acc_NOC']=='Y')echo 'YES'; else echo 'NO'; ?></td>
		  <td style="font-family:Georgia;font-size:11px;width:60px;background-color:<?php if($res['HR_FullFinal_Submit']=='Y')echo '#7DFF7D'; ?>;" valign="top" align="center"><?php if($res['HR_FullFinal_Submit']=='Y')echo 'YES'; else echo 'NO'; ?></td>
		  <?php /*
		  <td align="center" class="All_50" valign="top"><?= $resE['reporting'];?></td>
          <td align="center" class="All_50" valign="top"><?= $resE['hod_name'];?></td>
          */?>
		  <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:50px;">
            <?php if($_SESSION['User_Permission']=='Edit'){ ?>
            			 <a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="SepEdit(<?php echo $res['EmpSepId']; ?>)"></a>
            <?php } ?>
		   </td>
		 </tr>
		 </tbody>
		 </div>
<?php } $Sno++; }} ?>
         <tr><td bgcolor="#B6E9E2" colspan="15"></td></tr>
	     
		 
	   </table>
	  </td>
	</tr>	
</table>
<?php } ?>  		
<?php //**********************************************************************************?>
<?php //*********END*****END*****END******END******END**************************?>
<?php //**********************************************************************************?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>