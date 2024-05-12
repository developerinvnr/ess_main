<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}
//**********************************************************************************************************************
if(isset($_POST['SaveEdit']))
{ $SqlUp = mysql_query("UPDATE hrm_sales_planshow SET EntryPlan='".$_POST['COne']."', ResultPlan='".$_POST['CTwo']."' WHERE PlanshowId=1", $con); 
  if($SqlUp){$msg='Updated successfully!';}
}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<style> .font { color:#ffffff; font-family:Times New Roman; font-size:15px; width:200px;} .font1 { font-family:Times New Roman; font-size:12px; height:14px; width:200px; } 
.font2 { font-size:12px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; height:18px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<Script type="text/javascript" language="javascript">
function FunClickRdo(v)
{ if(v==1){ document.getElementById("COne").value='Y'; document.getElementById("CTwo").value='N'; }
  else if(v==2){ document.getElementById("COne").value='N'; document.getElementById("CTwo").value='Y'; }
}
</Script> 
</head>
<body class="body">
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table></td></tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
   <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
   <tr>
	<td valign="top"  width="100%" id="MainWindow" align="left"><br>
    <table border="0" style="margin-top:0px; width:100%; height:300px;">
    <tr>
    <td align="left" id="type" valign="top" style="display:block; width:50%" align="left">             
     <table border="0" width="500">
	 <tr><td class="heading">&nbsp;Sales Plan Show-Hide Format &nbsp;&nbsp;<font color="#5CB900"><i><?php echo $msg; ?></i></font></td></tr>
	 <tr>
	 <td align="left" width="350">
	 <table border="1" width="350" border="1" bgcolor="#FFFFFF">
<tr bgcolor="#808000">
 <td class="font" align="center" style="width:100px;"><b>Tgt/ Proj</b></td>
 <td class="font" align="center" style="width:100;"><b>Trg/ Sales</b></td>
 <td class="font" align="center" style="width:100px;"><b>Action</b></td>
</tr>

<?php $sql=mysql_query("select * from hrm_sales_planshow", $con); $res=mysql_fetch_array($sql); ?>
<form name="OformEdit" method="post" onSubmit="return OvalidateEdit(this)">
<input type="hidden" id="COne" name="COne" value="<?php echo $res['EntryPlan']; ?>" />
<input type="hidden" id="CTwo" name="CTwo" value="<?php echo $res['ResultPlan']; ?>" />	
<tr>
 <td align="center"><input type="radio" id="Entry" name="showradio" <?php if($res['EntryPlan']=='Y'){echo 'checked';} ?> onclick="FunClickRdo(1)"/></td>
 <td align="center"><input type="radio" id="Result" name="showradio" <?php if($res['ResultPlan']=='Y'){echo 'checked';} ?> onclick="FunClickRdo(2)"/></td>
 <td align="center"><input type="submit" name="SaveEdit"  value="" class="SaveButton"></td>
</tr>
</form> 
	  </table>
	 </td>
    </tr>
  </table>  
</td>
</tr>
</table>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>
