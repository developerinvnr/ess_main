<?php require_once('../AdminUser/config/config.php'); ?>
<?php 
if(isset($_POST['CommentQuery']))  
{
   $sqlUpRep=mysql_query("update hrm_employee_query set Id_Mngmt=".$_POST['MId'].", QAction_Mngmt=".$_POST['QActionM'].", Comment_Mngmt='".$_POST['QueryComment']."', CommentDateTime_Mngmt='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['QId'], $con); 
  if($sqlUpRep){$Msg='Save comment successfully.....! &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';} 
}
?>	  
	  
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php include_once('../Title.php'); ?>&nbsp;My Query</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" language="javascript">
function FormRefresh(){ document.getElementById("QueryComment").value='';}
function validate(ReplyQForm) 
{ 
 var QueryComment = CommentQForm.QueryComment.value; 
 if(QueryComment.length === 0){alert("Please type comment !"); return false;} 
//if(QueryAnswer.length<50){alert("Please type minimum 50 charector!"); return false;} 
 var agree=confirm("Are you sure.."); if(agree){return true;}else{return false;}
}
</script>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#E0DBE3">
<?php $sql = mysql_query("SELECT * FROM hrm_employee_query WHERE QueryId=".$_REQUEST['Q'], $con) or die(mysql_error()); $res = mysql_fetch_assoc($sql); 
      //$sqlE=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$res['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE); ?>	
<table style="vertical-align:top;" width="460" align="center" border="0">
<tr>
 <td>
   <table border="0">
   <tr>
     <td style="width:80px;margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="left" valign="top">
	 <u><b>Date</b></u> :</td>
	 <td style="width:380px;margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="left" valign="top">
	 <?php echo date("d F Y"); ?></td>
  </tr>
  <tr>
     <td style="width:80px;margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="left" valign="top">
	 <u><b>Query</b></u> :</td>
	 <td style="width:380px;margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="left" valign="top">
	 <?php echo $res['QueryValue']; ?></td>
  </tr>
  <tr>
     <td style="width:80px;margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="left" valign="top">
	 <u><b>Answer</b></u> :</td>
	 <td style="width:380px;margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="left" valign="top">
	 <?php if($res['QueryReply']!='') {echo $res['QueryReply'];} else {echo 'Not Reply';} ?></td>
  </tr>
   <tr>
     <td style="width:80px;margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="left" valign="top">
	 <u><b>Action</b></u> :</td>
	 <td style="width:380px;margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="left" valign="top">
	 <?php if($_REQUEST['V']==1) {echo 'Satisfied';} if($_REQUEST['V']==2) {echo 'Not Satisfied';} ?></td>
  </tr>
  <tr>
     <td colspan="2" style="width:80px; margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="center" valign="top">
	 <u><b>Comment</b></u> :</td>
  </tr>
  <form name="CommentQForm" method="post" onSubmit="return validate(this)">
  <tr>
   <td colspan="2" valign="top" align="">
   <textarea name="QueryComment" id="QueryComment" cols="53" rows="8"><?php echo $res['Comment_Mngmt']; ?></textarea>
   <input type="hidden" name="QId" value="<?php echo $_REQUEST['Q']; ?>" /><input type="hidden" name="MId" value="<?php echo $_REQUEST['MI']; ?>" />
   <input type="hidden" name="QActionM" value="<?php echo $_REQUEST['V']; ?>" />
   </td>
  </tr> 
  <tr>
   <td colspan="2" valign="top" align="Right" style="font-family:Times New Roman;color:#AA0000;font-size:15px; font-weight:bold;">
   <?php echo $Msg; ?>
   <input type="submit" name="CommentQuery" style="width:90px;" value="Save">
   <input type="button" name="Refresh" id="Refresh" style="width:90px;" value="Refresh" onClick="FormRefresh()"/></td>
  </tr>    
  </form>
  </table>
 </td>
</tr>
</table>
</body>
</html>