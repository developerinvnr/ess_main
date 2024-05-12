<?php require_once('../AdminUser/config/config.php');  ?>
<?php 
 if($_REQUEST['Qid']!='' AND $_REQUEST['UT']!='')
 { 
   if($_REQUEST['UT']=='A')
   { $sqlUpRep=mysql_query("update hrm_employee_query set QueryStatus_Emp=1 where QueryId=".$_REQUEST['Qid'], $con);  }
   if($_REQUEST['UT']=='S')
   { $sqlUpRep=mysql_query("update hrm_employee_query set QueryStatus_Emp=1 where QueryId=".$_REQUEST['Qid'], $con);  }
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
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#CDDFF3">	
<table style="vertical-align:top;" width="480" align="center" border="0">
<?php $sql = mysql_query("SELECT * FROM hrm_employee_query WHERE QueryId=".$_REQUEST['Qid'], $con) or die(mysql_error()); $res = mysql_fetch_array($sql); ?>
<tr><td><table border="0">
 <tr><td style="width:480px;margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="left" valign="top"><u><b>Subject</b></u> :-&nbsp; <?php echo $res['QuerySubject']; ?><br><br></td></tr>
 <tr><td style="width:480px; height:250px; margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="left" valign="top">
<?php if($res['QueryNoOfTime']==1){echo '(<b>Q1</b>) :'.$res['QueryValue']; if($res['QueryReply']!='') { echo '<br>(<b>Reply</b>) :'.$res['QueryReply']; }}?>

<?php if($res['QueryNoOfTime']==2){echo '(<b>Q1</b>) :'.$res['QueryValue']; if($res['QueryReply']!='') { echo '<br>(<b>Reply</b>) :'.$res['QueryReply']; } echo '<br><br>(<b>Q2</b>) :'.$res['Query2Value']; if($res['Query2Reply']!='') { echo '<br>(<b>Reply</b>) :'.$res['Query2Reply']; }}?>

<?php if($res['QueryNoOfTime']==3){echo '(<b>Q1</b>) :'.$res['QueryValue']; if($res['QueryReply']!='') { echo '<br>(<b>Reply</b>) :'.$res['QueryReply']; } echo '<br><br>(<b>Q2</b>) :'.$res['Query2Value']; if($res['Query2Reply']!='') { echo '<br>(<b>Reply</b>) :'.$res['Query2Reply']; } echo '<br><br>(<b>Q3</b>) :'.$res['Query3Value']; if($res['Query3Reply']!='') { echo '<br>(<b>Reply</b>) :'.$res['Query3Reply']; }}?>

<?php if($res['QueryNoOfTime']==4){echo '(<b>Q1</b>) :'.$res['QueryValue']; if($res['QueryReply']!='') { echo '<br>(<b>Reply</b>) :'.$res['QueryReply']; } echo '<br><br>(<b>Q2</b>) :'.$res['Query2Value']; if($res['Query2Reply']!='') { echo '<br>(<b>Reply</b>) :'.$res['Query2Reply']; } echo '<br><br>(<b>Q3</b>) :'.$res['Query3Value']; if($res['Query3Reply']!='') { echo '<br>(<b>Reply</b>) :'.$res['Query3Reply']; } echo '<br><br>(<b>Q4</b>) :'.$res['Query4Value']; if($res['Query4Reply']!='') { echo '<br>(<b>Reply</b>) :'.$res['Query4Reply']; }}?>

<?php if($res['QueryNoOfTime']==5){echo '(<b>Q1</b>) :'.$res['QueryValue']; if($res['QueryReply']!='') { echo '<br>(<b>Reply</b>) :'.$res['QueryReply']; } echo '<br><br>(<b>Q2</b>) :'.$res['Query2Value']; if($res['Query2Reply']!='') { echo '<br>(<b>Reply</b>) :'.$res['Query2Reply']; } echo '<br><br>(<b>Q3</b>) :'.$res['Query3Value']; if($res['Query3Reply']!='') { echo '<br>(<b>Reply</b>) :'.$res['Query3Reply']; } echo '<br><br>(<b>Q4</b>) :'.$res['Query4Value']; if($res['Query4Reply']!='') { echo '<br>(<b>Reply</b>) :'.$res['Query4Reply']; } echo '<br><br>(<b>Q5</b>) :'.$res['Query5Value']; if($res['Query5Reply']!='') { echo '<br>(<b>Reply</b>) :'.$res['Query5Reply'];}}?>
 </td></tr>
</table></td></tr>
</table>
</body>
</html>