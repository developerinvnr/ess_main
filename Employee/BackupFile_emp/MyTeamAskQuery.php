<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
if(isset($_POST['AskQuery']))
{ $After3Day = date("Y-m-d h:i:s",strtotime('+3 day')); $After6Day = date("Y-m-d h:i:s",strtotime('+6 day'));
  $SqlQIns=mysql_query("insert into hrm_employee_hrquery(EmployeeID,QuerySubject,QueryValue,QueryDateTime,QToAdmin_DateTime,QToSAdmin_DateTime,QToMngmt_DateTime)values(".$EmployeeId.",'".$_POST['QuerySub']."','".$_POST['Query']."','".date("Y-m-d h:i:s")."','".date("Y-m-d h:i:s")."','".$After3Day."','".$After6Day."')", $con);
if($SqlQIns) {$msq='Query Send SuccessFully!!';}
}
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

<style>.font { color:#ffffff; font-family:Georgia; font-size:11px; width:200px;} .font1 { font-family:Georgia; font-size:11px; height:14px; } 
.font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }
.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript"></script>
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px; ">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	 <tr>
	  <td valign="top">
	     <table border="0" style="width:100%; height:380px; float:none;" cellpadding="0">
		  <tr>
		   <td valign="top"> 
		   
<?php //*************************************************************************************************************************************************** ?>	   
		     <table border="0" id="Activity">
			  <tr>
			     <td id="Anni" valign="top">
				    <table border="0">
						  <tr height="20">
						    <td align="left" valign="top" width="150">
<?php include("EmpImgEmp.php"); ?>
<?php //echo "<img width=105px height=125px src=\"show_images.php?id=".$EmployeeId."\">\n";?></td>
						  </tr>
					 </table>
				 </td>
				  <td align="left" width="850">
	     <table border="1" width="800" border="1" bgcolor="#FFFFFF">
		 <tr bgcolor="#7a6189">
		   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:50px;"><b>SNo</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:150px;" valign="top" align="center"><b>Holiday</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:120px;" valign="top" align="center"><b>Date</b></td>
 		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:150px;" valign="top" align="center"><b>Half/Full day</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:200px;" valign="top" align="center"><b>State/Plant</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:200px;" valign="top" align="center"><b>Remark</b></td>
		 </tr>
      <?php $sqlHoliday=mysql_query("select * from hrm_holiday where status='A' AND CompanyId=".$CompanyId, $con); $SNo=1; while($resHoliday=mysql_fetch_array($sqlHoliday)) { ?>
       
		  <tr>
		   <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $SNo; ?></td>
		   <td class="font1" align="left">&nbsp;<?php echo $resHoliday['HolidayName']; ?></td>
		   <td class="font1" align="center">&nbsp;<?php echo date("d-m-Y",strtotime($resHoliday['HolidayDate'])); ?></td>
 		   <td class="font1" align="left">&nbsp;<?php echo $resHoliday['HalfFullDay']; ?></td>
		   <td class="font1" align="left">&nbsp;<?php echo $resHoliday['State']; ?></td>
		   <td class="font1" align="left">&nbsp;<?php echo $resHoliday['Remark']; ?></td>
		</tr>
		<?php $SNo++; } ?>
		 </table>
	           </td>
    </tr>
</table>

			
<?php //*************************************************************************************************************************************************** ?>
		   </td>
		    <td valign="top">
		    <table align="right" border="0" style="margin-top:0px; width:10%; height:380px;">
		    <tr><td align="center" valign="top" width="100">&nbsp;</td></tr>
	        </table>
		   </td>
		    <td valign="top">
		    <table align="right" border="0" style="margin-top:0px; width:10%; height:380px;"><tr><td align="center" valign="top">&nbsp;&nbsp;</td></tr></table>
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

