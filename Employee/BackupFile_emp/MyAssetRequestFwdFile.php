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

if(isset($_POST['SaveFwd']))
{
 $sqlUp=mysql_query("update hrm_asset_employee_request set HODApprovalStatus=4, HODRemark='".$_POST['FwdRemark']."', FwdEmpId=".$_POST['FwdEmpId'].", HODSubDate='".date("Y-m-d")."', ApprovalStatus=1 where AssetEmpReqId=".$_POST['RId']." AND EmployeeID=".$_POST['EId'], $con);
 if($sqlUp)
 { 
   $sql1 = mysql_query("select Fname,Sname,Lname,EmailId_Vnr from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmployeeID=".$_POST['FwdEmpId']."", $con); $res1=mysql_fetch_assoc($sql1); $Ename11 = $res1['Fname'].' '.$res1['Sname'].' '.$res1['Lname'];
   $sql2 = mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$_POST['EId']."", $con); $res2=mysql_fetch_assoc($sql2);
   $Ename22 = $res2['Fname'].' '.$res2['Sname'].' '.$res2['Lname'];
   
   if($res1['EmailId_Vnr']!='')
   {
      $email_to = $res1['EmailId_Vnr'];
      $email_from='admin@vnrseeds.co.in';
      $email_subject = $Ename22." asset request delegate by HOD";
      $email_txt = $Ename22." asset request delegate by HOD";
      $headers = "From: ".$email_from."\r\n"; 
      $semi_rand = md5(time()); 
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
      $email_message .="<html><head></head><body>";
	  $email_message .= "Dear <b>".$Ename11."</b> <br><br>\n\n\n";
      $email_message .=$Ename22." apply for asset request, and this request delegate by HOD for your approval, kindly details log on to ESS for approved.<br><br>\n\n";
	  $email_message .= "From <br><b>ADMIN ESS</b><br>";
      $email_message .="</body></html>";	      
      $ok = @mail($email_to, $email_subject, $email_message, $headers); 
   }
   
   echo '<script>alert("Delegated successfully..");</script>';
   echo '<script>window.close();</script>';
 }
}
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
<script type="text/javascript" language="javascript"> 
function FunEdit()
{ document.getElementById("btnedit").style.display='none'; document.getElementById("btnsave").style.display='block';
  document.getElementById("FwdEmpId").disabled=false; document.getElementById("FwdRemark").disabled=false;
}

function validate(form1) 
{  var Numfilter=/^[0-9 ]+$/;  var filter=/^[a-zA-Z. /]+$/;
   var FwdEmpId = document.getElementById("FwdEmpId").value;  
   if(FwdEmpId==0){ alert("Please select employee name.");  return false; }
   var FwdRemark = document.getElementById("FwdRemark").value;  
   if(FwdRemark.length===0){ alert("Please type remark for delegate request.."); return false; }
}
</script>
<head>
<body>
<table style="width:450px;" border="0" cellpadding="0" cellspacing="0" align="center">
<tr><td align="center" style="font-family:Times New Roman;font-size:16px;"><b>Forward Asset Request</b></td></tr>
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
	 <td><select id="FwdEmpId" name="FwdEmpId" style="width:302px;" disabled><option value="0">Select</option>
<?php $sqlri=mysql_query("select DepartmentId from hrm_employee_general where EmployeeID=".$_REQUEST['EId'],$con); $resri=mysql_fetch_assoc($sqlri); ?>
<?php $SqlDeE=mysql_query("SELECT hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID WHERE hrm_employee_general.DepartmentId=".$resri['DepartmentId']." AND hrm_employee.EmpStatus='A' AND hrm_employee.EmployeeID!=".$_REQUEST['EId'], $con); while($ResDeE=mysql_fetch_assoc($SqlDeE)){ ?><option value="<?php echo $ResDeE['EmployeeID']; ?>"><?php echo /*$ResDeE['EmpCode'].' - '.*/$ResDeE['Fname'].' '.$ResDeE['Sname'].' '.$ResDeE['Lname']; ?></option><?php } ?>
<?php $SqlHr=mysql_query("SELECT EmpCode,Fname,Sname,Lname from hrm_employee WHERE EmployeeID=142 AND EmpStatus='A'", $con); $ResHr=mysql_fetch_assoc($SqlHr); ?>	 
	 <option value="142"><?php echo /*$ResHr['EmpCode'].' - '.*/$ResHr['Fname'].' '.$ResHr['Sname'].' '.$ResHr['Lname']; ?></option>
<?php $sqlhi=mysql_query("select HodId from hrm_employee_reporting INNER JOIN hrm_employee ON hrm_employee_reporting.EmployeeID=hrm_employee.EmployeeID where hrm_employee_reporting.HodId!=".$_REQUEST['empid']." AND hrm_employee_reporting.HodId>0 AND hrm_employee.CompanyId=".$CompanyId." group by HodId order by HodId", $con); while($reshi=mysql_fetch_assoc($sqlhi)){ $SqlHod=mysql_query("SELECT EmpCode,Fname,Sname,Lname from hrm_employee WHERE EmployeeID=".$reshi['HodId'], $con); $ResHod=mysql_fetch_assoc($SqlHod); ?>
<option value="<?php echo $reshi['HodId']; ?>"><?php echo /*$ResHod['EmpCode'].' - '.*/$ResHod['Fname'].' '.$ResHod['Sname'].' '.$ResHod['Lname']; ?></option><?php } ?>
</select>
	 </td>
   </tr>
   <tr>
    <td style="font-size:14px;" valign="top"><b>Remark:&nbsp;</b></td>
	<td><textarea id="FwdRemark" name="FwdRemark" style="font-size:14px;" cols="35" rows="3" disabled></textarea></td>
   </tr>   
   <tr>
    <td colspan="4" align="right">
	<input type="button" id="btnedit" value="edit" style="width:80px;display:block;" onClick="FunEdit()"/>
	<input type="submit" id="btnsave" name="SaveFwd" value="send" style="width:80px;display:none;" />
	</td>
   </tr>
  </table>
 </td>
</tr>
</form>
</table>
</body>
</head>
</html>