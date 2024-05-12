<?php require_once('../AdminUser/config/config.php'); ?>
<?php
if(isset($_POST['SaveBtn']))
{
 $sqlUp=mysql_query("update hrm_pms_appraisal_history set Current_Grade='".$_POST['cg']."', Proposed_Grade='".$_POST['ng']."', Current_Designation='".$_POST['cd']."', Proposed_Designation='".$_POST['nd']."' where AppHistoryId=".$_POST['hisid'],$con);
 $msg='Data updated successfully!';
}
 ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="../AdminUser/css/body.css" rel="stylesheet"/>
<link type="text/css" href="../AdminUser/css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.recCls1{font-family:Times New Roman;font-size:14px;text-align:center;font-weight:bold;color:#FFF;}
.recCls2{font-family:Times New Roman;font-size:12px;text-align:center;font-weight:bold;color:#FFF;}
.recCls3{font-family:Times New Roman;font-size:12px;color:#000;}
.input{font-family:Times New Roman;font-size:12px;color:#000;height:20px;}
.SaveButton {background-image:url(images/save.gif);width:20px;height:20px;background-repeat:no-repeat;background-color:#FFFFFF;border-color:#FFFFFF;border-bottom:inherit;}
</style>
<script type="text/javascript" language="javascript">
function F1()
{ document.getElementById("btn1").style.display='none'; document.getElementById("btn2").style.display='block';
  document.getElementById("cg").readOnly=false; document.getElementById("ng").readOnly=false;
  document.getElementById("cd").readOnly=false; document.getElementById("nd").readOnly=false; 
}
</script>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#E0DBE3">	
<center>
<?php $sqlE=mysql_query("select Fname, Sname, Lname from hrm_employee where EmpCode=".$_REQUEST['ec']." AND CompanyId=".$_REQUEST['ci'], $con); $resE=mysql_fetch_assoc($sqlE); ?>
<table style="vertical-align:top;width:100%;" align="center" border="0">
<tr>
<td align="center">
 <table border="0">
  <tr><td style="vertical-align:top;width:800px;font-size:15px;font-family:Times New Roman;color:#006A00;" align="center"><b><u>History</u></b></td></tr>
  <tr><td align="center" style="width:800px;font-size:16px;font-family:Times New Roman;">&nbsp;<b><?php echo $resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; ?></b></td></tr>
  <tr>
    <td style="vertical-align:top;width:800px;" align="center">
	  <table border="1" cellpadding="0" cellspacing="0">
	   <tr bgcolor="#7a6189" style="height:20px;">
		<td class="recCls2" style="width:50px;">SNo</td>
		<td class="recCls2" style="width:100px;">Date</td>
		<td class="recCls2" style="width:50px;">Old Grade</td>
		<td class="recCls2" style="width:50px;">New Grade</td>
		<td class="recCls2" style="width:180px;">Old Designation</td>
		<td class="recCls2" style="width:180px;">New Designation</td>
        <td class="recCls2" style="width:40px;">Edit</td>	
	   </tr>
<?php $sql=mysql_query("select AppHistoryId, SalaryChange_Date, Current_Grade, Proposed_Grade, Current_Designation, Proposed_Designation from hrm_pms_appraisal_history where EmpCode=".$_REQUEST['ec']." AND CompanyId=".$_REQUEST['ci']." AND EmpPmsId=".$_REQUEST['pmsid'], $con); $Sno2=1; while($res=mysql_fetch_array($sql)){ ?>
<form name="form" method="post">	  	
       <tr bgcolor="#FFFFFF" style="height:22px;">
		<td class="recCls3" align="center"><?php echo $Sno2; ?></td>
		<td class="recCls3" align="center"><?php echo date("d-m-Y",strtotime($res['SalaryChange_Date'])); ?></td>
		<td class="recCls3"><input class="input" name="cg" id="cg" style="width:40px;text-align:center;" value="<?php echo $res['Current_Grade']; ?>" readonly/></td>
		<td class="recCls3"><input class="input" name="ng" id="ng" style="width:40px;text-align:center;" value="<?php echo $res['Proposed_Grade']; ?>" readonly/></td>      
	    <td class="recCls3"><input class="input" name="cd" id="cd" style="width:175px;" value="<?php echo $res['Current_Designation'];?>" readonly/></td>
	    <td class="recCls3"><input class="input" name="nd" id="nd" style="width:175px;" value="<?php echo $res['Proposed_Designation']; ?>" readonly/><input type="hidden" name="hisid" value="<?php echo $res['AppHistoryId']; ?>"/></td>
	    <td align="center"><img src="images/edit.png" onClick="F1()" id="btn1"><input type="submit" name="SaveBtn" class="SaveButton" style="display:none;" id="btn2"></td>	
	   </tr> 
</form>	     	
<?php $Sno++; } ?>	 
	  </table>
	</td>
  </tr>
  <tr>
	<td colspan="2" style="color:#6BD700;font-size:16px;font-family:Times New Roman;" align="center">
	 <b><i><?php echo $msg; ?></i></b></td>
	 </tr>
 </table>
</td>
</tr>
</table>
</center>
</body>  
</html>
