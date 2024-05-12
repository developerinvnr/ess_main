<?php session_start();
if($_SESSION['login'] = true){require_once('../user/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../../../index.php');}
$EmployeeId=$_SESSION['EmployeeID'];

if(isset($_POST['YesSubmit']))
{
 $sqlchk=mysql_query("select * from hrm_sales_emp_action where EmployeeID=".$_POST['En']." AND YearId=".$_POST['Yn'], $con); $row=mysql_num_rows($sqlchk);
 if($row==0){ $sqlIns=mysql_query("insert into hrm_sales_emp_action(EmployeeID,YearId,StatusA) values(".$_POST['En'].",".$_POST['Yn'].",1)", $con);}
 elseif($row>0)
 { $sqlIns=mysql_query("update hrm_sales_emp_action set StatusA=1 where EmployeeID=".$_POST['En']." AND YearId=".$_POST['Yn'], $con);
   $res=mysql_fetch_assoc($sqlchk);
   if($res['StatusA']==1 OR $res['StatusB']==1)
   { $sqlCPerMi=mysql_query("update hrm_sales_reporting_level set EditPerMi='N' where EmployeeID=".$_POST['En'],$con); }
 }
 if($sqlIns){echo '<script>alert("Successfully submitted"); window.close();</script>';}
}

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" language="javascript">
function NoClick(){ window.close(); }
</script>
</head>
<body class="body">
<?php if($_REQUEST['CheckAct']=='Fsb1' AND $_REQUEST['y']!='' AND $_REQUEST['e']!='') { $y=$_REQUEST['y']; $e=$_REQUEST['e']; ?> 
<center>
<table border="0" style="width:590px;">
<tr> 
 <td> 	 
 <table border="0" style="width:590px;" align="center">
	<tr><td></td></tr>
	<tr><td style="width:580px;font-family:Times New Roman;font-size:18px;color:#FFFFFF;" align="center"><b><u>Each Crop Is Needed To Ensure</u></b></td></tr>
	<tr><td style="width:580px;font-family:Times New Roman;font-size:18px;color:#FFFFFF;" align="center"><b>Important, Please Check, If You Missed Any Crop</b></td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td style="width:580px;font-family:Times New Roman;font-size:18px;color:#FF9A35;" align="center">Are you sure, you want to final submission in sales plan</td></tr>
	<tr>
	  <td align="center">
	  <form name="YesFrom" method="post">
	   <input type="hidden" name="En" value="<?php echo $_REQUEST['e']; ?>" /><input type="hidden" name="Yn" value="<?php echo $_REQUEST['y']; ?>" />
       <input type="submit" name="YesSubmit" style="width:60px;font-weight:bold;font-family:Times New Roman;font-size:15px;" value="YES"/> 
	   <input type="button" style="width:60px;font-weight:bold;font-family:Times New Roman;font-size:15px;" value="NO" onClick="NoClick()"/>
	  </form> 
	  </td>
	</tr>
	<tr>
   </table>
 </td>
</tr>
</table>
</center>
<?php } ?>
</body>
</html>


