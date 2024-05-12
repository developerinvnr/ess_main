<?php session_start();
if($_SESSION['login'] = true){require_once('../user/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../../../index.php');}
$EmployeeId=$_SESSION['EmployeeID'];

if(isset($_POST['YesSubmit']))
{
 $sqlchk=mysql_query("select * from hrm_sales_emp_action where EmployeeID=".$_POST['En']." AND YearId=".$_POST['Yn'], $con); $row=mysql_num_rows($sqlchk);
 if($row==0)
 { 
  $sqlIns=mysql_query("insert into hrm_sales_emp_action(EmployeeID,YearId,StatusA) values(".$_POST['En'].",".$_POST['Yn'].",1)", $con);
 }
 elseif($row>0)
 { 
   $sqlIns=mysql_query("update hrm_sales_emp_action set StatusA=1 where EmployeeID=".$_POST['En']." AND YearId=".$_POST['Yn'], $con);
   $res=mysql_fetch_assoc($sqlchk);
   if($res['StatusA']==1 AND $res['StatusB']==1)
   { $sqlCPerMi=mysql_query("update hrm_sales_reporting_level set EditPerMi='N' where EmployeeID=".$_POST['En'],$con); }
 }
 if($sqlIns){echo '<script>alert("Successfully submitted"); window.close();</script>';}
}



if(isset($_POST['Yes2Submit2']))
{
 $sqlchk=mysql_query("select * from hrm_sales_emp_action where EmployeeID=".$_POST['En']." AND YearId=".$_POST['Yn'], $con); $row=mysql_num_rows($sqlchk);
 if($row==0)
 { 
  $sqlIns=mysql_query("insert into hrm_sales_emp_action(EmployeeID,YearId,StatusB) values(".$_POST['En'].",".$_POST['Yn'].",1)", $con);
 }
 elseif($row>0)
 { 
   $sqlIns=mysql_query("update hrm_sales_emp_action set StatusB=1 where EmployeeID=".$_POST['En']." AND YearId=".$_POST['Yn'], $con);
   $res=mysql_fetch_assoc($sqlchk);
   if($res['StatusA']==1 AND $res['StatusB']==1)
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
	<tr><td align="center" style="width:580px;font-family:Times New Roman;font-size:20px;color:#FFFFFF;"><b>"MISSING CROP"</b></td></tr>
	<tr><td></td></tr>
	<tr>
	<td style="width:580px;font-family:Times New Roman;font-size:15px;color:#FFFF79;" align="center">
<?php $sql=mysql_query("select ItemId,ItemName from hrm_sales_seedsitem order by ItemName ASC", $con); while($res=mysql_fetch_assoc($sql)){ 
      $sql2=mysql_query("select EmployeeID from hrm_sales_sal_details_".$_REQUEST['y']." where TerId=".$_REQUEST['e']." AND ItemId=".$res['ItemId']." AND YearId=".$_REQUEST['y'], $con);
	  $row2=mysql_num_rows($sql2); 
	  if($row2==0){echo $res['ItemName'].',&nbsp;&nbsp;'; }
} ?></td>
	</tr>
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

<?php if($_REQUEST['CheckAct']=='Fsb2' AND $_REQUEST['y']!='' AND $_REQUEST['e']!='') { $y=$_REQUEST['y']; $e=$_REQUEST['e']; ?> 
<center>
<table border="0" style="width:590px;">
<tr> 
 <td> 	 
 <table border="0" style="width:590px;" align="center">
	<tr><td align="center" style="width:580px;font-family:Times New Roman;font-size:20px;color:#FFFFFF;"><b>"MISSING CROP"</b></td></tr>
	<tr><td></td></tr>
	<tr>
	<td style="width:580px;font-family:Times New Roman;font-size:16px;color:#FFFF79;" align="center">
<?php $sql=mysql_query("select ItemId,ItemName from hrm_sales_seedsitem order by ItemName ASC", $con); while($res=mysql_fetch_assoc($sql)){ 
      if($_REQUEST['g']==68 OR $_REQUEST['g']==69)
	  {  
	    $sql2=mysql_query("select * from hrm_sales_sal_details_terr where TerrRepEmpID=".$_REQUEST['e']." AND ItemId=".$res['ItemId']." AND YearId=".$_REQUEST['y'], $con);
	    $row2=mysql_num_rows($sql2);
	    if($row2==0)
		{
		  $sql3=mysql_query("select * from hrm_sales_sal_details_hq where HqRepEmpID=".$_REQUEST['e']." AND ItemId=".$res['ItemId']." AND YearId=".$_REQUEST['y'], $con);
	      $row3=mysql_num_rows($sql2); 
	      if($row3==0){echo $res['ItemName'].',&nbsp;&nbsp;'; } 
		}
	  }
      elseif($_REQUEST['g']==70 OR $_REQUEST['g']==71)
	  {
	    $sql2=mysql_query("select * from hrm_sales_sal_details_area where AreaRepEmpID=".$_REQUEST['e']." AND ItemId=".$res['ItemId']." AND YearId=".$_REQUEST['y'], $con);
	    $row2=mysql_num_rows($sql2); 
		if($row2==0)
		{
		 $sql3=mysql_query("select * from hrm_sales_sal_details_terr where TerrRepEmpID=".$_REQUEST['e']." AND ItemId=".$res['ItemId']." AND YearId=".$_REQUEST['y'], $con);
	     $row3=mysql_num_rows($sql3);
	     if($row3==0)
		 {
		  $sql4=mysql_query("select * from hrm_sales_sal_details_hq where HqRepEmpID=".$_REQUEST['e']." AND ItemId=".$res['ItemId']." AND YearId=".$_REQUEST['y'], $con);
	      $row4=mysql_num_rows($sql4); 
	      if($row4==0){echo $res['ItemName'].',&nbsp;&nbsp;'; } 
		 }
		}
	  }
      
      //$sql2=mysql_query("select * from hrm_sales_sal_details_area where AreaRepEmpID=".$_REQUEST['e']." AND ItemId=".$res['ItemId']." AND YearId=".$_REQUEST['y'], $con);
	  //$row2=mysql_num_rows($sql2); 
	  //if($row2==0){echo $res['ItemName'].',&nbsp;&nbsp;'; }
} ?></td>
	</tr>
	<tr><td></td></tr>
	<tr><td style="width:580px;font-family:Times New Roman;font-size:20px;color:#FFFFFF;" align="center"><b><u>Each Crop Is Needed To Ensure</u></b></td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td style="width:580px;font-family:Times New Roman;font-size:20px;color:#FF9A35;" align="center">Are you sure, you want to final submission in sales plan</td></tr>
	<tr>
	  <td align="center">
	  <form name="YesFrom" method="post">
	   <input type="hidden" name="En" value="<?php echo $_REQUEST['e']; ?>" /><input type="hidden" name="Yn" value="<?php echo $_REQUEST['y']; ?>" />
       <input type="submit" name="Yes2Submit2" style="width:60px;font-weight:bold;font-family:Times New Roman;font-size:15px;" value="YES"/> 
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


