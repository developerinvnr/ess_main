<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//****************************************************************/
if(isset($_POST['SaveNew']))
{  $SqlInseart = mysql_query("INSERT INTO hrm_time_nocount(CountDate,Dept,Timeio,Reason) VALUES('".date("Y-m-d",strtotime($_POST['CountDate']))."', '".$_POST['Dept']."', '".$_POST['Timeio']."', '".$_POST['Reason']."')", $con); 
}
if(isset($_POST['SaveEdit']))
{ $SqlUpdate = mysql_query("UPDATE hrm_time_nocount SET CountDate='".date("Y-m-d",strtotime($_POST['CountDate']))."', Dept='".$_POST['Dept']."', Timeio='".$_POST['Timeio']."', Reason='".$_POST['Reason']."' WHERE TCountNId=".$_POST['TCountNId'], $con); }

if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
{ $SqlDelete=mysql_query("delete from hrm_time_nocount WHERE TCountNId=".$_REQUEST['did'], $con) or die(mysql_error()); }
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
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<style> 
.htf{font-family:Times New Roman;;color:#000;font-weight:bold;text-align:center;font-size:18px;height:24px;}
.htf2{font-family:Times New Roman;;color:#000;font-weight:bold;text-align:center;font-size:12px;}
.tdf{ background-color:#FFFFFF;font-family:Times New Roman;font-size:12px;color:#000000;}
.tdft{ background-color:#FFFF9D;font-family:Times New Roman;font-size:14px;color:#000000;}
.tdf2{background-color:#FFFFC4;font-family:Times New Roman;;font-size:14px;text-align:center;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Times New Roman; font-size:12px; height:18px;}
.EditInput { font-family:Times New Roman; font-size:12px; height:20px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script>
function edit(value) { var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "EmpSetCountno.php?action=edit&eid="+value;  window.location=x;}}
function del(value) { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var x = "EmpSetCountno.php?action=delete&did="+value;  window.location=x;}}
function newsave() { var x = "EmpSetCountno.php?action=newsave";  window.location=x;}

function validate(formEdit)
{ 
 if(document.getElementById("Dept").value==''){alert("please select department"); return false;}
 else if(document.getElementById("Reason").value==''){alert("please type reason"); return false;}
 else 
 {
   var agree=confirm("Are you sure?");
   if(agree){return true;}else{return false;}
 }
}

</Script> 
</head>
<body class="body">
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table></td></tr>
<tr>
 <td valign="top">
  <table style="margin-top:0px;" border="0">
   <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td></tr>
   <tr>
	<td valign="top" id="MainWindow"><br>	  
    <table border="0" style="margin-top:0px;height:300px;">
    <tr>
    <td width="10">&nbsp;</td>  
    <td align="left" id="type" valign="top" style="display:block;">             
     <table border="0">
	 <tr><td class="heading">&nbsp;Time-Attendance No-Apply Reason:</td></tr>
	 <tr>
	 <td align="left">
	 <table border="1" border="1" bgcolor="#FFFFFF">
<tr bgcolor="#7a6189">
 <td align="center" class="tdf2" style="width:50px;"><b>SN</b></td>
 <td align="center" class="tdf2" style="width:100px;"><b>Date</b></td>
 <td align="center" class="tdf2" style="width:150px;"><b>Department</b></td>
 <td align="center" class="tdf2" style="width:100px;"><b>Time</b></td>
 <td align="center" class="tdf2" style="width:200px;"><b>No-Count Reason</b></td>	
 <td align="center" class="tdf2" style="width:80px;"><b>Action</b></td>
</tr>

<?php if(isset($_REQUEST['action']) && $_REQUEST['action']=="newsave"){ ?>
<form name="formEdit" method="post" onSubmit="return validate(this)">
<tr>
 <td align="center" class="tdf"><?php echo $SNo; ?></td>
 <td align="center" class="tdf"><input class="tdf" style="width:80px;text-align:center;" name="CountDate" id="CountDate" value="<?php echo date("d-m-Y"); ?>"/><button id="f_btn1" class="CalenderButton"></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); cal.manageFields("f_btn1", "CountDate", "%d-%m-%Y");</script></td>
 <td align="center" class="tdf"><select class="tdf" style="width:150px;" name="Dept" id="Dept">
 <option value="" selected>SELECT</option><?php $SqlDept=mysql_query("select DepartmentCode from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?><option value="<?php echo $ResDept['DepartmentCode']; ?>"><?php echo strtoupper($ResDept['DepartmentCode']); ?></option><?php } ?></select>
 </td>
 <td align="center" class="tdf"><select class="tdf" style="width:100px;" name="Timeio">
 <option value="In">In</option><option value="Out">Out</option><option value="In-Out">In-Out</option></select>
 </td>
 <td align="center" class="tdf"><input class="tdf" style="width:400px;" name="Reason" id="Reason"/></td>
 <td align="center" class="tdf">
 <?php if($_SESSION['User_Permission']=='Edit'){?>
 <input type="submit" name="SaveNew"  value="" class="SaveButton">
 <?php } ?>
 </td>
</tr>
</form>
<tr><td bgcolor="#B6E9E2" colspan="5"></td></tr>
<?php } ?>
	 
<?php $sql=mysql_query("select * from hrm_time_nocount order by CountDate DESC", $con); $SNo=1; while($res=mysql_fetch_array($sql)) {
if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$res['TCountNId']){ ?>
<form name="OformEdit" method="post" onSubmit="return OvalidateEdit(this)">
<tr>
 <td align="center" class="tdf"><?php echo $SNo; ?></td>
 <td align="center" class="tdf"><input  class="tdf" name="CountDate" id="CountDate" value="<?php echo date("d-m-Y",strtotime($res['CountDate'])); ?>" style="width:80px;"/><button id="f_btn1" class="CalenderButton"></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); cal.manageFields("f_btn1", "CountDate", "%d-%m-%Y");</script></td>
 <td align="center" class="tdf"><select class="tdf" style="width:150px;" name="Dept">
  <option value="<?php echo $res['Dept']; ?>"><?php echo strtoupper($res['Dept']); ?></option>
  <?php $SqlDept=mysql_query("select DepartmentCode from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?><option value="<?php echo $ResDept['DepartmentCode']; ?>"><?php echo strtoupper($ResDept['DepartmentCode']); ?></option><?php } ?>
  <option value="All">ALL</option></select>
 </td>
 <td align="center" class="tdf"><select class="tdf" style="width:100px;" name="Timeio">
 <option value="<?php echo $res['Timeio']; ?>"><?php echo $res['Timeio']; ?></option>
 <?php if($res['Timeio']!='In'){?><option value="In">In</option><?php } ?>
 <?php if($res['Timeio']!='Out'){?><option value="Out">Out</option><?php } ?>
 <?php if($res['Timeio']!='In-Out'){?><option value="In-Out">In-Out</option><?php } ?></select>
 </td>
 
 <td align="center" class="tdf"><input class="tdf" name="Reason" value="<?php echo $res['Reason']; ?>" style="width:400px;"/></td>
 <td align="center" align="center" class="tdf">
 <?php if($_SESSION['User_Permission']=='Edit'){?>
 <input type="submit" name="SaveEdit"  value="" class="SaveButton"><input type="hidden" name="TCountNId" id="TCountNId" value="<?php echo $_REQUEST['eid']; ?>"/>
 <?php } ?>
 </td>
</tr>
</form> 
<?php } else { ?>	 
<tr>
 <td align="center" class="tdf"><?php echo $SNo; ?></td>	   
 <td align="center" class="tdf"><?php echo date("d-m-Y",strtotime($res['CountDate'])); ?></td>
 <td class="tdf">&nbsp;<?php echo $res['Dept']; ?></td>
 <td class="tdf">&nbsp;<?php echo $res['Timeio']; ?></td>
 <td class="tdf"><?php echo $res['Reason']; ?></td>
 <td align="center" class="tdf">
 <?php if($_SESSION['User_Permission']=='Edit'){?>
 <a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $res['TCountNId']; ?>)"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="del(<?php echo $res['TCountNId']; ?>)"></a>
 <?php } ?>
 </td>
</tr>
<?php } $SNo++;} ?>

	  </table>
	 </td>
    </tr>
<?php if($_SESSION['User_Permission']=='Edit'){?>	
   <tr>
      <td align="Right" class="fontButton"><table border="0"><tr><td align="right">
<input type="button" name="NewSave" id="NewSave" value="new" onClick="newsave()" <?php if($_REQUEST['action']=="newsave" OR $_REQUEST['action']=="edit"){ echo "style=display:none;"; }?>/>
<input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
<input type="button" name="Refrash" value="refresh" onClick="javascript:window.location='EmpSetCountno.php'"/>&nbsp;
     </td></tr></table></td>
   </tr>
<?php } ?>   
  </table>  
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
