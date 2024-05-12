<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
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
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<Script type="text/javascript">
$(document).ready(function () { $("#table1").freezeHeader({ 'height': '450px' }); })
					
function SelectDeptEmp(v)
{ var Sts=document.getElementById("StsE").value; 
  var x="Apps_Download.php?act=search&DpId="+v+"&s="+Sts; window.location=x; }				
function SelectStsEmp(v)
{ var Dep=document.getElementById("DepartmentE").value; 
  var x="Apps_Download.php?act=search&DpId="+Dep+"&s="+v; window.location=x; }				

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
	<tr>
	    <td align="right" width="1%">&nbsp;</td>
		<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>
		
		<td width="100%" valign="top">
		   <table border="0" width="90%">
			 <tr><td>
				    <table border="0">
		            <tr>
					   <td style="width:280px;" class="heading">Ess-Mobile Apps Download Details</td>
	                   <td class="tdr" style="width:100px;"><b>Department :</b></td>
                       <td class="tdl" style="width:3px;">
                       <select style="font-size:11px; width:150px; height:20px; background-color:#DDFFBB; display:block;" name="DepartmentE" id="DepartmentE" onChange="SelectDeptEmp(this.value)"><?php if($_REQUEST['DpId'] AND $_REQUEST['DpId']!='') { if($_REQUEST['DpId']=='All'){$DN='ALL';} else { $SqlDep=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DepartmentId=".$_REQUEST['DpId'], $con); $ResDep=mysql_fetch_array($SqlDep); $DN=$ResDep['DepartmentCode']; }?><option value="<?php echo $_REQUEST['DpId']; ?>"><?php echo '&nbsp;'.$DN;?></option><?php } else { ?><option value="" style="margin-left:0px; background-color:#84D9D5;" selected>Select Department</option><?php } ?>   
<?php $SqlDepartment=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDepartment=mysql_fetch_array($SqlDepartment)) { ?><option value="<?php echo $ResDepartment['DepartmentId']; ?>"><?php echo $ResDepartment['DepartmentCode'];?></option><?php } ?>
<option value="All" >ALL</option></select>
	  <input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /> 
                       </td>
					  <td style="width:10px;">&nbsp;</td>
					  <td class="tdr" style="width:50px;"><b>Status :</b></td>
					  <td class="td1" style="font-size:11px; width:150px;">
<?php if($_REQUEST['s']=='A'){$sts='All';}elseif($_REQUEST['s']=='D'){$sts='Downloaded';}elseif($_REQUEST['s']=='W'){$sts='Without Downloaded';}else{$sts='All';} ?>
                       <select style="font-size:11px; width:140px; height:20px; background-color:#DDFFBB; display:block;" name="StsE" id="StsE" onChange="SelectStsEmp(this.value)">
		<option value="<?php echo $_REQUEST['s']; ?>"><?php echo $sts; ?></option>
<?php if($_REQUEST['s']!='D'){?><option value="D">Downloaded</option><?php } ?>
<?php if($_REQUEST['s']!='W'){?><option value="W">Without Downloaded</option><?php } ?>
<?php if($_REQUEST['s']!='A'){?><option value="A">All</option><?php } ?>
					   </select>
					  </td>
					  <td class="tdr" style="font-size:12px; width:150px;">
					   <img src="images/ok.png" border="0" /> : Downloaded
					  </td>
	                  
	                  <!--<td class="tdl" style="background-color:#FFFF6C;text-align:center;width:200px;">Submission of Resignation</td>-->
	                  
					  <td class="tdl" style="color:#008000;"><b><span id="msg"></span></td>
		           </tr>
                   </table>
				</td>
			 </tr>
			 <tr>
			   <td valign="top" style="width:80%;"> 
<table border="1" id="table1" cellspacing="1" style="width:100%;">
 <div class="thead">
 <thead>
 <tr bgcolor="#7a6189">
  <td class="th" style="width:3%;">Sn</td>
  <td class="th" style="width:4%;">EC</td>
  <td class="th" style="width:15%;">Name</td>
  <td class="th" style="width:10%;">HeadQuater</td>
  <td class="th" style="width:8%">Department</td>
  <td class="th" style="width:18%">Designation</td>
  <td class="th" style="width:12%">Contact</td>
  <td class="th" style="width:2%">Download<br>Status</td>
 </tr>
 </thead>
 </div>
<?php  if($_REQUEST['DpId'] AND $_REQUEST['DpId']!=''){

$selQ="e.EmployeeID, EmpCode, Fname, Sname, Lname, EmpStatus, HqName, DateJoining, DepartmentCode, DesigName, Gender, Married, DR, UseApps, UseApps_Punch, g.MobileNo_Vnr,  g.MobileNo2_Vnr,  p.MobileNo, tokenid";
$join="hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de ON g.DesigId=de.DesigId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId";
 
if($_REQUEST['DpId']=='All'){ $deptCon="1=1"; }else{ $deptCon="g.DepartmentId=".$_REQUEST['DpId']; }
if($_REQUEST['s']=='A'){ $tokenCon="1=1"; }elseif($_REQUEST['s']=='W'){ $tokenCon="(e.tokenid='' OR e.tokenid='NULL')"; } elseif($_REQUEST['s']=='D'){ $tokenCon="e.tokenid!='' AND e.tokenid!='NULL' AND e.tokenid!='Null'"; }

$sqlDP = mysql_query("SELECT ".$selQ." FROM ".$join." WHERE e.EmpStatus='A' AND ".$deptCon." AND ".$tokenCon." AND e.CompanyId=".$CompanyId." order by e.EmpCode ASC", $con);

	  
      $Sno=1;  while($resDP = mysql_fetch_assoc($sqlDP)) { 
	  if($resDP['DR']=='Y'){$MS='Dr.';} elseif($resDP['Gender']=='M'){$MS='Mr.';} elseif($resDP['Gender']=='F' AND $resDP['Married']=='Y'){$MS='Mrs.';} elseif($resDP['Gender']=='F' AND $resDP['Married']=='N'){$MS='Miss.';}  $Name=$MS.' '.$resDP['Fname'].' '.$resDP['Sname'].' '.$resDP['Lname'];
	  $LEC=strlen($resDP['EmpCode']); 
      if($LEC==1){$EC='000'.$resDP['EmpCode'];} if($LEC==2){$EC='00'.$resDP['EmpCode'];} if($LEC==3){$EC='0'.$resDP['EmpCode'];} if($LEC>=4){$EC=$resDP['EmpCode'];}
      
?>
 <div class="tbody">
 <tbody>
 <tr style="background-color:#FFFFFF;"> 
  <td class="tdc"><?php echo $Sno; ?></td>
  <td class="tdc"><?php echo $EC; ?></td>
  <td class="tdl">&nbsp;<?php echo ucwords(strtolower($Name)); ?></td>
  <td class="tdl">&nbsp;<?php echo ucwords(strtolower($resDP['HqName']));?></td>
  <td class="tdc"><?php echo $resDP['DepartmentCode'];?></td>
  <td class="tdl">&nbsp;<?php echo ucwords(strtolower($resDP['DesigName']));?></td>
  <td class="tdc"><?php echo $resDP['MobileNo_Vnr']; if($resDP['MobileNo2_Vnr']>0){ echo ', '.$resDP['MobileNo2_Vnr'];} if($resDP['MobileNo']>0){ echo ', '.$resDP['MobileNo'];} ?></td>
  <td class="tdc" bgcolor="<?php if($resDP['tokenid']!='' AND $resDP['tokenid']!='NULL'){echo '#FBE4BB';}?>"><?php if($resDP['tokenid']!='' AND $resDP['tokenid']!='NULL'){ ?><img src="images/ok.png" border="0" /><?php } ?></td>
 </tr>
 </tbody>
 </div>
<?php $Sno++; } }?>

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