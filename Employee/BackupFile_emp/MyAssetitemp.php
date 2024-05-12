<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>

<style>.font { color:#ffffff; font-family:Georgia; font-size:11px; width:200px;} .font1 { font-family:Georgia; font-size:11px; height:14px; } 
.font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }
.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function SelectDeptEmpAsset(v,ei,ci,ei2){var x = "MyAssetitemp.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&wew=e%e@er%rdd=012&page=1&chk="+ei+"&ss=89&f=0i&wer=true&c="+ci+"&d="+v+"&chk2="+ei2; window.location=x;}
function editallot(value){ window.open("MyAssetedititEmp.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&wew=e%e@er%rdd=012&page=1&ID="+value, '_blank'); window.focus(); }
function editreq(value){ window.open("MyAssetedititreqEmp.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&wew=e%e@er%rdd=012&page=1&ID="+value, '_blank'); window.focus(); }	
</script>
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table style="margin-top:0px;">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top">
	     <table border="0" cellpadding="0">
		  <tr>
		   <td valign="top"> 
		   
<?php //*************************************************************************************************************************************************** ?>	  
		     <table border="0" id="Activity">
			  <tr>
			     <td id="Anni" valign="top">
				    <table border="0">
						  <tr height="20">
						    <td align="left" valign="top">
<?php /* include("EmpImgEmp.php"); */ ?>
<?php //echo "<img width=105px height=125px src=\"show_images.php?id=".$EmployeeId."\">\n";?></td>
						  </tr>
					 </table>
				 </td>
				  <td align="left" valign="top">
	     <table border="0">
		    <tr>
			 <td colspan="10"><table border="0" style="width:1500px;"><tr>
		
                       <td class="td1" style="font-size:11px; width:150px;"><select style="font-size:11px; width:150px; height:20px; background-color:#DDFFBB; display:block;" name="DepartmentE" id="DepartmentE" onChange="SelectDeptEmpAsset(this.value, <?php echo $_REQUEST['chk'].', '.$CompanyId.', '.$_REQUEST['chk2']; ?>)"><?php if($_REQUEST['d']>0){ $sqlD=mysql_query("SELECT DepartmentCode FROM hrm_department WHERE DepartmentId=".$_REQUEST['d'], $con); $resD=mysql_fetch_assoc($sqlD); echo '<option value='.$_REQUEST['d'].' style="margin-left:0px; background-color:#84D9D5;" selected>&nbsp;'.$resD['DepartmentCode'].'</option>'; } else { echo '<option value="" style="margin-left:0px; background-color:#84D9D5;" selected>&nbsp;SELECT DEPARTMENT</option>'; }
$SqlDepartment=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDepartment=mysql_fetch_array($SqlDepartment)) { ?><option value="<?php echo $ResDepartment['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDepartment['DepartmentCode'];?></option><?php } ?></select>
					   <input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /> 
                      </td>
			 <td style="width:5px;">&nbsp;</td>
			 <td class="TableHead">
			   <font color="#106809" style='font-family:Times New Roman;' size="4"><i><b>Employee Asset </b></i></font>
			   &nbsp;&nbsp;&nbsp;&nbsp;
			   <font color="#FB0000" style='font-family:Times New Roman;' size="4"><i><b><?php echo $msg; ?></b></i></font>
			 </td>
			 </tr></table></td>
			</tr>
			<tr>
			 <td style="width:1500px;">			 
			   <table border="1">
<tr bgcolor="#7a6189" style="height:22px;">
 <td rowspan="2" style="width:40px;color:#FFFFFF;font-family:Times New Roman;font-size:12px;" align="center"><b>SNo.</b></td>
 <td rowspan="2" style="width:50px;color:#FFFFFF;font-family:Times New Roman;font-size:12px;" align="center"><b>EC</b></td>
 <td rowspan="2" style="width:200px;color:#FFFFFF;font-family:Times New Roman;font-size:12px;" align="center"><b>Name</b></td>
 <td rowspan="2" style="width:150px;color:#FFFFFF;font-family:Times New Roman;font-size:12px;" align="center"><b>HQ</b></td>
 <td colspan="2" style="color:#FFFFFF;font-family:Times New Roman;font-size:12px;" align="center"><b>Assets</b></td>
</tr>			   
<tr bgcolor="#7a6189" style="height:22px;">
 <td style="width:80px;color:#FFFFFF;font-family:Times New Roman;font-size:12px;" align="center"><b>Allot</b></td>
 <td style="width:80px;color:#FFFFFF;font-family:Times New Roman;font-size:12px;" align="center"><b>Request</b></td>
</tr>
<?php if($_REQUEST['d'] AND $_REQUEST['d']!='') { 
      $sql = mysql_query("SELECT hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,HqId,DepartmentId,DesigId,Gender,Married FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmpStatus!='De' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId=".$_REQUEST['d'], $con); 
$sno=1; while($res=mysql_fetch_array($sql)){	  
if($res['Gender']=='M'){$M='Mr.';} elseif($res['Gender']=='F' AND $res['Married']=='Y'){$M='Mrs.';} elseif($res['Gender']=='F' AND $res['Married']=='N'){$M='Miss.';} 
$Name=$M.' '.$res['Fname'].' '.$res['Sname'].' '.$res['Lname']; $LEC=strlen($res['EmpCode']); 
if($LEC==1){$EC='000'.$res['EmpCode'];} if($LEC==2){$EC='00'.$res['EmpCode'];} if($LEC==3){$EC='0'.$res['EmpCode'];} if($LEC>=4){$EC=$res['EmpCode'];}
$sHq=mysql_query("select HqName from hrm_headquater where HqId=".$res['HqId'], $con); $rHq=mysql_fetch_assoc($sHq); ?>							 					
<tr bgcolor="#FFFFFF">
 <td align="center" style="font-size:12px; font-family:Times New Roman;"><?php echo $sno; ?></td>
 <td align="center" style="font-size:12px;font-family:Times New Roman;"><?php echo $EC; ?></td>
 <td style="font-size:12px;font-family:Times New Roman;">&nbsp;<?php echo $Name; ?></td>
 <td style="font-size:12px;font-family:Times New Roman;">&nbsp;<?php echo $rHq['HqName']; ?></td>
 <td align="center" style="font-size:12px;font-family:Times New Roman;"><a href="#" onClick="editallot(<?php echo $res['EmployeeID']; ?>)">Click</a></td>
 <td align="center" style="font-size:12px;font-family:Times New Roman;"><a href="#" onClick="editreq(<?php echo $res['EmployeeID']; ?>)">Click</a></td>
</tr>  
<?php $sno++; } } ?>					   
	
              </table>
			 </td>
			</tr>		
		 </table>
	           </td>
    </tr>
</table>
		
<?php //*************************************************************************************************************************************************** ?>
		   </td>
		    <td valign="top">
		    <table align="right" border="0" style="margin-top:0px; width:10%; height:380px;">
		    <tr><td align="center" valign="top" width="100">&nbsp;</td></tr>
	        </table>
		   </td>
		    <td valign="top">
		    <table align="right" border="0" style="margin-top:0px; width:10%; height:380px;"><tr><td align="center" valign="top">&nbsp;&nbsp;</td></tr></table>
		   </td>
		  </tr>
		</table>
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
