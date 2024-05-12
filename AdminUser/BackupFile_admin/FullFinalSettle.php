<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
if($_SESSION['login'] = true){require_once('PhpFile/QueryP.php'); } else {$msg= "Session Expiry..............."; }

if($_REQUEST['action']=='AllowFF' AND $_REQUEST['si']!='' AND $_REQUEST['v']!='')
{ $sqlU=mysql_query("update hrm_employee_separation set Allow_FF_Settle='".$_REQUEST['v']."' where EmpSepId=".$_REQUEST['si'], $con); }
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font {color:#ffffff; font-family:Georgia; font-size:11px; width:250px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:13px; height:10px;}.span {display:block; font-family:Times New Roman; color:#620000;font-size:15px; }.span1 {display:block; font-family:Times New Roman; color:#620000;font-size:15px;  }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:150px; height:19px; }.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}.th{font-family:Times New Roman;font-size:12px;font-weight:bold;text-align:center;color:#FFFFFF; background-color:#376A9D;height:26px;} 
.tdl{font-family:Times New Roman;font-size:14px;color:#000000;}
.tdr{font-family:Times New Roman;font-size:12px;text-align:right;color:#000000;}
.tdc{font-family:Times New Roman;font-size:12px;text-align:center;color:#000000;}
.selecti{font-family:Times New Roman;font-size:12px;background-color:#DDFFBB;}
.inner_table{height:550px;overflow-y:auto;width:auto;}
</style>
<Script type="text/javascript">window.history.forward(1);</script>
<script type="text/javascript" src="js/Query.js" ></script>
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<script language="javascript">
function SelectDept(value){ window.location='FullFinalSettle.php?DPid='+value; } 

function OpenResAccept(SId)
{ 
 window.open("SepResAccept.php?act=act&v=v&ss=vty&cc=it@~t~1212&p=value&a=app&true=false&si="+SId,"Form","menubar=no,scrollbars=yes,resizable=no,directories=no,width=820,height=650");
}

function OpenFFSetmnt(SId)
{ 
  window.open("SepFFSetmntform.php?act=act&v=v&ss=vty&cc=it@~t~1212&p=value&a=app&true=false&si="+SId,"leaveForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=1000,height=650");
}

function OpenRelieving(SId)
{
window.open("SepRelieving.php?act=act&v=v&ss=vty&cc=it@~t~1212&p=value&a=app&true=false&si="+SId,"Form","menubar=no,scrollbars=yes,resizable=no,directories=no,width=820,height=650");
}

function OpenExp(SId)
{window.open("SepResExp.php?act=act&v=v&ss=vty&cc=it@~t~1212&p=value&a=app&true=false&si="+SId,"Form","menubar=no,scrollbars=yes,resizable=no,directories=no,width=820,height=650");
}

function ClickFFYN(v,si){ if(si!=''){window.location="FullFinalSettle.php?action=AllowFF&v=v&ss=vty&cc=it@~t~1212&p=value&a=app&true=false&si="+si+"&v="+v;} }

function FucChk(sn)
{ if(document.getElementById("Chk"+sn).checked==true){document.getElementById("TR"+sn).style.background='#FF80FF'; } else if(document.getElementById("Chk"+sn).checked==false){document.getElementById("TR"+sn).style.background='#FFFFFF'; }
}

$(document).ready(function () { $("#table1").freezeHeader({ 'height': '500px' }); })

function ExportFF(c)
{   
  window.open("FullFinalSettleExp.php?action=FFExport&value="+c,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");} 

</script>
</head>
<body class="body">
<input type="hidden" id="UserId" value="<?php echo $UserId; ?>" /><input type="hidden" id="UserType" value="<?php echo $_SESSION['UserType']; ?>" />
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
	  <td valign="top" align="center"  width="100%" id="MainWindow">
<?php //******************************************************************************?>
<?php //***************START*****START*****START******START******START*******************************?>
<?php //******************************************************************************?>	  
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td width="300" class="heading">&nbsp;Full & Final Settlement Statement &nbsp;&nbsp;&nbsp;
	  <td class="td1" style="width:180px;"><select class="tdsel" style="background-color:#DDFFBB; width:100%;" name="Dept" id="Dept" onChange="SelectDept(this.value)">
	  <option value="" <?php if(!$_REQUEST['DPid']){echo 'selected';}?>>SELECT DEPARTMENT</option>
	  <?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?><option value="<?php echo $ResDept['DepartmentId'];?>" <?php if($_REQUEST['DPid']==$ResDept['DepartmentId']){echo 'selected';}?>><?php echo $ResDept['DepartmentCode'];?></option><?php } ?>
	  <option value="All" <?php if($_REQUEST['DPid']=='All'){echo 'selected';}?>>All</option>
	  </select></td>
	  
	  <td><a href="#" onClick="ExportFF('<?php echo $CompanyId; ?>')" style="font-size:12px;">Export Excel</a></td>
	  <td><font style="font-family:Times New Roman;color:#005500;font-size:15px; font-weight:bold;"><?php echo $Msg; ?></font></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>	
<?php //***********************************************Reply To Query******************************************************?> 
<tr> 
<td align="left" id="ReplyToQuery" valign="top" style="display:block;" style="width:100%;">             
   <table border="0" style="width:100%;">
	<tr>
	  <td align="left" style="width:100%;">
		<table border="1" id="table1" style="width:100%;" cellspacing="1">
		 <div class="thead">
         <thead>
		  <tr>
		   <td class="th" style="width:30px;">Check</td>
		   <td class="th" style="width:40px;"><b>Sno</b></td>
		   <td class="th" style="width:50px;"><b>EC</b></td>
		   <td class="th" style="width:200px;"><b>Name</b></td>
		   <td class="th" style="width:100px;"><b>Department</b></td>
		   <td class="th" style="width:80px;"><b>Resignation Date</b></td>
		   <td class="th" style="width:80px;"><b>Relieving Date</b></td>
		   <td class="th" style="width:80px;"><b>Clearance (IT, Rep, HR, A/c)</b></td>
<?php if($_SESSION['User_Permission']=='Edit'){ ?>
		   <td class="th" style="width:80px;"><b>Resignation Acceptance</b></td>
		   <td class="th" style="width:80px;"><b>F&F Settlement Form</b></td> 
		   <td class="th" style="width:80px;"><b>Relieving Letter</b></td> 
		   <td class="th" style="width:80px;"><b>experience certificate</b></td> 
		   <td class="th" style="width:80px;"><b>Allow F&F <br>Sett. Form<br>to Employee</b></td>
<?php } ?>
		  </tr>
		  </thead>
		  </div>
<?php if($_REQUEST['DPid']){ ?>  
  		  
<?php if($_REQUEST['DPid']>0){ $sqry='g.DepartmentId='.$_REQUEST['DPid'];}else{ $sqry='1=1'; }

$sql=mysql_query("select s.*,e.EmpCode,e.Fname,e.Sname,e.Lname,d.DepartmentCode from hrm_employee_separation s INNER JOIN hrm_employee e ON s.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON s.EmployeeID=g.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId where s.ResignationStatus=4 AND e.CompanyId=".$CompanyId." AND ".$sqry." order by s.Emp_ResignationDate DESC", $con); $Sno=1; while($res=mysql_fetch_array($sql)){ ?>	
	     <div class="tbody">
         <tbody>
	     <tr bgcolor="#FFFFFF" id="TR<?php echo $Sno; ?>">
         <td class="tdc"><input type="checkbox" id="Chk<?php echo $Sno; ?>" onClick="FucChk(<?php echo $Sno; ?>)"/></td>
	      <td class="tdc"><?php echo $Sno; ?></td>	 		  
	      <td class="tdc"><?php echo $res['EmpCode']; ?></td>
		  <td class="tdl"><?php echo ucwords(strtolower($res['Fname'].' '.$res['Sname'].' '.$res['Lname'])); ?></td>
		  <td class="tdl"><?php echo $res['DepartmentCode']; ?></td>
		  <td class="tdc"><?php echo date("d-m-Y",strtotime($res['Emp_ResignationDate']));?></td>
		  
          <td class="tdc"><?php if($res['HR_RelievingDate3']!='' AND $res['HR_RelievingDate3']!='0000-00-00' AND $res['HR_RelievingDate3']!='1970-01-01'){echo '<font color="#FF0000">>&nbsp;'.date("d-m-Y",strtotime($res['HR_RelievingDate3'])).'<br>';} if($res['HR_RelievingDate2']!='' AND $res['HR_RelievingDate2']!='0000-00-00' AND $res['HR_RelievingDate2']!='1970-01-01'){echo '<font color="#FF0000">>&nbsp;'.date("d-m-Y",strtotime($res['HR_RelievingDate2'])).'</font><br>';} if($res['HR_RelievingDate']!='' AND $res['HR_RelievingDate']!='0000-00-00' AND $res['HR_RelievingDate']!='1970-01-01'){echo '&nbsp;&nbsp;&nbsp;'.date("d-m-Y",strtotime($res['HR_RelievingDate'])).'</font>';}  ?></td>

		  <td class="tdc"><?php if($res['IT_NOC']=='Y' AND $res['Rep_NOC']=='Y' AND $res['HR_NOC']=='Y' AND $res['Acc_NOC']=='Y'){echo '<font color="#007100"><b>SUBMITTED</b></font>';}else{echo '<font color="#FF8000"><b>PENDING</b></font>';} ?></td> 

<?php if($_SESSION['User_Permission']=='Edit'){ ?>
		  <td class="tdc"><a href="javascript:OpenResAccept(<?php echo $res['EmpSepId'];?>)"><font color="#008000"><b>Clik</b></font></a></td>
		  <td class="tdc"><a href="javascript:OpenFFSetmnt(<?php echo $res['EmpSepId'];?>)"><font color="#008000"><b>Clik</b></font></a></td>
		  <td class="tdc"><a href="javascript:OpenRelieving(<?php echo $res['EmpSepId'];?>)"><font color="#008000"><b>Clik</b></font></a></td>
		  <td class="tdc"><a href="javascript:OpenExp(<?php echo $res['EmpSepId'];?>)"><font color="#008000"><b>Clik</b></font></a></td>
		  <td class="tdc"><select name="FF_YN" id="FF_YN" onChange="ClickFFYN(this.value,<?php echo $res['EmpSepId'];?>)" style="text-align:center; background-color:<?php if($res['Allow_FF_Settle']=='Y'){ echo '#AEFFAE';}else{echo '#FFFFFF';}?>;">
		  <option value="<?php echo $res['Allow_FF_Settle']; ?>"><?php if($res['Allow_FF_Settle']=='Y'){echo 'YES';}else{echo 'NO';} ?></option>
		  <option value="<?php if($res['Allow_FF_Settle']=='Y'){echo 'N';}else{echo 'Y';} ?>"><?php if($res['Allow_FF_Settle']=='Y'){echo 'NO';}else{echo 'YES';} ?></option>
		  </select>

		  </td>
<?php } ?>
		</tr>
		</tbody>
		</div>
<?php $Sno++; } ?>

<?php } //if($_REQUEST['DPid']) ?>			
		</table>
      </td>
   </tr>
  </table>    
</td>
</tr>
<?php //************* Close Reply to Query******************************************?>      
<?php } ?> 
</table>
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
