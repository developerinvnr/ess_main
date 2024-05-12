<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
$sql = mysql_query("select * from hrm_asset_employee_request where AssetEmpReqId=".$_REQUEST['RId']." AND EmployeeID=".$_REQUEST['EId']."", $con); $res=mysql_fetch_assoc($sql);
$SqlEmp = mysql_query("SELECT EmpCode,Fname,Sname,Lname from hrm_employee WHERE EmployeeID=".$_REQUEST['EId'], $con); $ResEmp=mysql_fetch_assoc($SqlEmp);
$Ename = $ResEmp['Fname'].'&nbsp;'.$ResEmp['Sname'].'&nbsp;'.$ResEmp['Lname']; $LEC=strlen($ResEmp['EmpCode']); 
if($LEC==1){$EC='000'.$ResEmp['EmpCode'];} if($LEC==2){$EC='00'.$ResEmp['EmpCode'];} if($LEC==3){$EC='0'.$ResEmp['EmpCode'];} if($LEC>=4){$EC=$ResEmp['EmpCode'];}

$SqlEmp2 = mysql_query("SELECT EmpCode,Fname,Sname,Lname from hrm_employee WHERE EmployeeID=".$res['FwdEmpId'], $con); $ResEmp2=mysql_fetch_assoc($SqlEmp2);
$Ename2 = $ResEmp2['Fname'].'&nbsp;'.$ResEmp2['Sname'].'&nbsp;'.$ResEmp2['Lname']; $LEC2=strlen($ResEmp2['EmpCode']); 
if($LEC2==1){$EC2='000'.$ResEmp2['EmpCode'];} if($LEC2==2){$EC2='00'.$ResEmp2['EmpCode'];} if($LEC2==3){$EC2='0'.$ResEmp2['EmpCode'];} if($LEC2>=4){$EC2=$ResEmp2['EmpCode'];}

?>
<html>
<title>Forward Request</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<head>
<body>
<table style="width:450px;" border="0" cellpadding="0" cellspacing="0" align="center">
<tr><td align="center" style="font-family:Times New Roman;font-size:16px;"><b>Forward Asset Details</b></td></tr>
<tr><td style="height:20px;"></td></tr>
<form name="form1" id="form1" method="post" onSubmit="return validate(this)">
<input type="hidden" name="RId" value="<?php echo $_REQUEST['RId']; ?>" /><input type="hidden" name="EId" value="<?php echo $_REQUEST['EId']; ?>" />
<tr>
 <td align="center">
  <table border="0">
   <tr>
    <td style="font-size:14px;width:100px;" valign="top"><b>Req By:&nbsp;</b></td>
    <td colspan="3"><b><?php echo $EC.'/ '.$Ename; ?></b></td>
   </tr>
   <tr><td style="height:5px;"></td></tr>
   <tr>
     <td style="font-size:14px;width:100px;" valign="top"><b>Forward To:&nbsp;</b></td>	 
	 <td><input type="text" style="width:302px;" value="<?php echo $EC2.' - '.$Ename2; ?>" /></td>
   </tr>
   <tr>
    <td style="font-size:14px;" valign="top"><b>Remark:&nbsp;</b></td>
	<td><textarea id="FwdRemark" name="FwdRemark" style="font-size:14px;" cols="35" rows="4"><?php echo $res['HODRemark']; ?></textarea></td>
   </tr>   
  </table>
 </td>
</tr>
</form>
</table>
</body>
</head>
</html>