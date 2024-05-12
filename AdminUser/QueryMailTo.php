<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
if($_SESSION['login'] = true){require_once('PhpFile/DailyAllowanceP.php'); } else {$msg= "Session Expiry..............."; }
if(isset($_POST['SaveEdit']))
{
	 $SqlUpdate = mysql_query("UPDATE hrm_employee_querymail_key SET Employee='".$_POST['Employee']."', ReportingMgr='".$_POST['ReportingMgr']."', HOD='".$_POST['HOD']."', Leve_l='".$_POST['Leve_l']."', Leve_2='".$_POST['Leve_2']."', Leve_3='".$_POST['Leve_3']."', Leve_4='".$_POST['Leve_4']."', HR='".$_POST['HR']."' WHERE CompanyId=".$CompanyId." AND QueryMailId=".$_POST['EditId'], $con) or die(mysql_error());
     if($SqlUpdate){ $msg = "Data has been Updated successfully...";}   
}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:120px;} .font1 { font-family:"Times New Roman", Times, serif; font-size:11px; width:120px; } 
.font2 { font-size:11px;width:260px;height:18px;} .font4 {color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.TextInput { font-family:"Times New Roman", Times, serif; font-size:11px; width:100px; height:18px;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/MandatoryAjaxCall.js"></script>
<Script type="text/javascript">window.history.forward(1);
function edit(value) { var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "QueryMailTo.php?action=edit&eid="+value;  window.location=x;}}
</SCRIPT> 
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td></tr>
	<tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td align="right" width="185" class="heading">Allow Query Mail To</td>
	  <td align="left"><b><span id="Vtype" class="span">: -&nbsp;Allow Query Mail To</span></b></td>
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if($_SESSION['UserType']=='S' AND $_SESSION['login'] = true) { ?>	
 <tr>
 <td style="width:1px;" valign="top" align="center">&nbsp;</td>
 <td width="1">&nbsp;</td>
<?php //*********************************************** Open Menu PMS ******************************************************?> 
<td align="left" id="type" valign="top" style="display:block; width:100%">             
   <table border="0" style="width:920px;">
	<tr>
	  <td align="left" style="width:920px;">
	     <table border="1" style="width:920px;" border="1" bgcolor="#FFFFFF">
		 <tr bgcolor="#7a6189">
		   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:40px;" valign="top"><b>SNo</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:350px;" valign="top" align="center"><b>Condition</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Emp</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Reporting Mgr</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>HOD</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Level_1</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Level_2</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Level_3</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Level_4</b></td>
                   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>HR</b></td>
		   <td valign="top" align="center" style="font:Georgia; font-size:11px; width:50px; color:#FFFFFF;"><b>Action</b></td>
		 </tr>
<?php $sqlMKey=mysql_query("select * from hrm_employee_querymail_key where CompanyId=".$CompanyId." order by QueryMailId ASC", $con); $SNo=1; 
while($resMKey=mysql_fetch_array($sqlMKey)) {
      if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$resMKey['QueryMailId']){ ?>
	      <form name="formEdit" method="post" onSubmit="return validateEdit(this)">		  
          <tr>
		   <td align="center" style="font:Georgia; font-size:11px; width:40px;"><?php echo $SNo; ?></td>
		   <td style="color:#000000;font-family:Georgia; font-size:11px; width:350px;" align="">&nbsp;<?php echo $resMKey['Condition']; ?></td>
		   <td style="width:60px;" align="center"><select name="Employee" id="Employee" style="font-family:Times New Roman, Times, serif;font-size:11px; width:58px; height:20px;"><option value="<?php echo $resMKey['Employee']; ?>"><?php if($resMKey['Employee']=='Y')echo 'YES'; else echo 'NO'; ?></option><option value="<?php if($resMKey['Employee']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resMKey['Employee']=='Y')echo 'NO'; else echo 'YES'; ?></option></select></td>
 		   <td  style="width:60px;"><select name="ReportingMgr" id="ReportingMgr" style="font-family:Times New Roman, Times, serif;font-size:11px; width:58px; height:20px;"><option value="<?php echo $resMKey['ReportingMgr']; ?>"><?php if($resMKey['ReportingMgr']=='Y')echo 'YES'; else echo 'NO'; ?></option><option value="<?php if($resMKey['ReportingMgr']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resMKey['ReportingMgr']=='Y')echo 'NO'; else echo 'YES'; ?></option></select>		
           <td  style="width:60px;"><select name="HOD" id="HOD" style="font-family:Times New Roman, Times, serif;font-size:11px; width:58px; height:20px;"><option value="<?php echo $resMKey['HOD']; ?>"><?php if($resMKey['HOD']=='Y')echo 'YES'; else echo 'NO'; ?></option><option value="<?php if($resMKey['HOD']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resMKey['HOD']=='Y')echo 'NO'; else echo 'YES'; ?></option></select>
           <td  style="width:60px;"><select name="Leve_l" id="Leve_l" style="font-family:Times New Roman, Times, serif;font-size:11px; width:58px; height:20px;"><option value="<?php echo $resMKey['Leve_l']; ?>"><?php if($resMKey['Leve_l']=='Y')echo 'YES'; else echo 'NO'; ?></option><option value="<?php if($resMKey['Leve_l']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resMKey['Leve_l']=='Y')echo 'NO'; else echo 'YES'; ?></option></select>
           <td  style="width:60px;"><select name="Leve_2" id="Leve_2" style="font-family:Times New Roman, Times, serif;font-size:11px; width:58px; height:20px;"><option value="<?php echo $resMKey['Leve_2']; ?>"><?php if($resMKey['Leve_2']=='Y')echo 'YES'; else echo 'NO'; ?></option><option value="<?php if($resMKey['Leve_2']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resMKey['Leve_2']=='Y')echo 'NO'; else echo 'YES'; ?></option></select>
           <td  style="width:60px;"><select name="Leve_3" id="Leve_3" style="font-family:Times New Roman, Times, serif;font-size:11px; width:58px; height:20px;"><option value="<?php echo $resMKey['Leve_3']; ?>"><?php if($resMKey['Leve_3']=='Y')echo 'YES'; else echo 'NO'; ?></option><option value="<?php if($resMKey['Leve_3']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resMKey['Leve_3']=='Y')echo 'NO'; else echo 'YES'; ?></option></select>
           <td  style="width:60px;"><select name="Leve_4" id="Leve_4" style="font-family:Times New Roman, Times, serif;font-size:11px; width:58px; height:20px;"><option value="<?php echo $resMKey['Leve_4']; ?>"><?php if($resMKey['Leve_4']=='Y')echo 'YES'; else echo 'NO'; ?></option><option value="<?php if($resMKey['Leve_4']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resMKey['Leve_4']=='Y')echo 'NO'; else echo 'YES'; ?></option></select></td>
           <td  style="width:60px;"><select name="HR" id="HR" style="font-family:Times New Roman, Times, serif;font-size:11px; width:58px; height:20px;"><option value="<?php echo $resMKey['HR']; ?>"><?php if($resMKey['HR']=='Y')echo 'YES'; else echo 'NO'; ?></option><option value="<?php if($resMKey['HR']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resMKey['HR']=='Y')echo 'NO'; else echo 'YES'; ?></option></select><input type="hidden" name="EditId" id="EditId" value="<?php echo $_REQUEST['eid']; ?>"/></td>

           <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:50px;">
<?php if($_SESSION['User_Permission']=='Edit'){ ?>
&nbsp;<input type="submit" name="SaveEdit"  value="" class="SaveButton">&nbsp;
<?php } ?>
</td>
		 </tr>

		 </form>
<?php } else { ?>	 
		  <tr>
		   <td align="center" style="font:Georgia; font-size:11px; width:40px;"><?php echo $SNo;?></td>
		   <td style="color:#000000;font-family:Georgia; font-size:11px; width:350px;" align="">&nbsp;<?php echo $resMKey['Condition']; ?></td>		   
		   <td style="color:#000000;font-family:Times New Roman, Times, serif; font-size:11px; width:60px;background-color:<?php if($resMKey['Employee']=='Y'){echo '#8CFF8C';}?>;" align="center">&nbsp;<?php echo $resMKey['Employee'];?></td>
		   <td style="color:#000000;font-family:Times New Roman, Times, serif; font-size:11px; width:60px;background-color:<?php if($resMKey['ReportingMgr']=='Y'){echo '#8CFF8C';}?>;" align="center">&nbsp;<?php echo $resMKey['ReportingMgr'];?></td>
		   <td style="color:#000000;font-family:Times New Roman, Times, serif; font-size:11px; width:60px;background-color:<?php if($resMKey['HOD']=='Y'){echo '#8CFF8C';}?>;" align="center">&nbsp;<?php echo $resMKey['HOD'];?></td>
		   <td style="color:#000000;font-family:Times New Roman, Times, serif; font-size:11px; width:60px;background-color:<?php if($resMKey['Leve_l']=='Y'){echo '#8CFF8C';}?>;" align="center">&nbsp;<?php echo $resMKey['Leve_l'];?></td>
		   <td style="color:#000000;font-family:Times New Roman, Times, serif; font-size:11px; width:60px;background-color:<?php if($resMKey['Leve_2']=='Y'){echo '#8CFF8C';}?>;" align="center">&nbsp;<?php echo $resMKey['Leve_2'];?></td>
		   <td style="color:#000000;font-family:Times New Roman, Times, serif; font-size:11px; width:60px;background-color:<?php if($resMKey['Leve_3']=='Y'){echo '#8CFF8C';}?>;" align="center">&nbsp;<?php echo $resMKey['Leve_3'];?></td>
		   <td style="color:#000000;font-family:Times New Roman, Times, serif; font-size:11px; width:60px;background-color:<?php if($resMKey['Leve_4']=='Y'){echo '#8CFF8C';}?>;" align="center">&nbsp;<?php echo $resMKey['Leve_4'];?></td>
                   <td style="color:#000000;font-family:Times New Roman, Times, serif; font-size:11px; width:60px;background-color:<?php if($resMKey['HR']=='Y'){echo '#8CFF8C';}?>;" align="center">&nbsp;<?php echo $resMKey['HR'];?></td> 
		   <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:50px;">
<?php if($_SESSION['User_Permission']=='Edit'){ ?>
			 <a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $resMKey['QueryMailId']; ?>)"></a>
<?php } ?>
		   </td>
		 </tr>
<?php } $SNo++;} ?>
         <tr><td bgcolor="#B6E9E2" colspan="20"></td></tr>
		 </table>
	  </td>
   </tr>
  
     
   <tr>
      <td align="Right" class="fontButton"><table border="0" width="550">
		<tr><td align="right">
		<input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
		<input type="button" name="Refrash" value="refresh" onclick="javascript:window.location='QueryMailTo.php'"/>&nbsp;</td>
		</tr></table>
      </td>
   </tr>
   
  </table>    
</td>
<?php //*********************************************** Close Menu PMS ******************************************************?>    
 </tr>
<?php } ?> 
</table>
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************END*****END*****END******END******END***************************************************************?>
<?php //************************************************************************************************************************************************************?>
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

