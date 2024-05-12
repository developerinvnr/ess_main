<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}

?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>

<style>.font { color:#ffffff; font-family:Times New Roman; font-size:13px; width:200px;} .font1 { font-family:Times New Roman; font-size:13px; height:14px; } 
.font2 { font-size:13px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }
.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
<!--
function doBlink() {
	var blink = document.all.tags("BLINK")
	for (var i=0; i<blink.length; i++)
		blink[i].style.visibility = blink[i].style.visibility == "" ? "hidden" : "" 
}
function startBlink() {
	if (document.all)
		setInterval("doBlink()",1000)
}
window.onload = startBlink;
// -->
</script>
</head>
<body class="body">

<?php /*
$eto = 'ajaykumar.dewangan@vnrseeds.in';
$efrom = 'admin@vnrseeds.co.in';
$esub = 'For authorisation of Attendance';
$headers = "From: ".$efrom."\r\n"; 
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$emsg .= "<html><head></head><body>";
$emsg .= "Dear <b>User,</b><br><br>\n\n\n";
$emsg .= "From <br><b>ADMIN ESS</b><br>";
$emsg .= "</body></html>";	      
$ok=@mail($eto, $esub, $emsg, $headers);
*/
?>
    
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
		 <tr style="height:29px;"><td colspan="8" bgcolor="#0080FF" align="center">
		       <font color="#FFFFFF" style='font-family:Times New Roman;' size="4"><blink><b>Holiday list for calendar year <?php echo date("Y"); ?></b></blink></font>
			  </td>
		</tr>
		 <tr bgcolor="#7a6189">
   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:50px;" valign="top"><b>SNo</b></td>
   <td class="font" align="center" style="width:150;" valign="top"><b>Holiday</b></td>
   <td class="font" align="center" style="width:120;" valign="top"><b>Date</b></td>
   <td class="font" align="center" style="width:120;" valign="top"><b>Day</b></td>
   <td class="font" align="center" style="width:200;" valign="top"><b>States except AP, Kerala, Tamil Nadu, Karnataka, Telangana</b></td>
   <td class="font" align="center" style="width:200;" valign="top"><b>Only for AP, Kerala, Tamil Nadu, Karnataka, Telangana</b></td>
   <td class="font" align="center" style="width:120;" valign="top"><b>Hyderabad Plant</b></td>
   <td class="font" align="center" style="width:120;" valign="top"><b>Durg Plant</b></td>
        </tr>
      <?php $sqlHoliday=mysql_query("select * from hrm_holiday where Year='".date("Y")."' AND status='A' order by HolidayDate ASC", $con); $SNo=1; while($resHoliday=mysql_fetch_array($sqlHoliday)) { ?>
       
		  <tr>
		   <td align="center" style="font:Times New Roman; font-size:12px; width:50px;" valign="top"><?php echo $SNo; ?></td>
		   <td class="font1" style="width:150;background-color:#D2FFD2;font-family:Geneva, Arial, Helvetica, sans-serif;" align="left">&nbsp;<?php echo $resHoliday['HolidayName']; ?></td>
		   <td class="font1" style="width:120;font-family:Geneva, Arial, Helvetica, sans-serif;" align="center"><?php echo date("d-m-Y",strtotime($resHoliday['HolidayDate'])); ?></td>
 		   <td class="font1" style="width:120;font-family:Geneva, Arial, Helvetica, sans-serif;" align="center"><?php echo $resHoliday['Day']; ?></td>
		   <td class="font1" style="width:200;" align="center"><?php if($resHoliday['State_1']==1){ echo '<img src="images/check.gif" border="0" />'; } else { echo '<img src="images/delete.png" border="0" />';}?></td>
		   <td class="font1" style="width:200;" align="center"><?php if($resHoliday['State_2']==1){ echo '<img src="images/check.gif" border="0" />'; } else { echo '<img src="images/delete.png" border="0" />';}?></td>
		   <td class="font1" style="width:120;" align="center"><?php if($resHoliday['State_3']==1){ echo '<img src="images/check.gif" border="0" />'; } else { echo '<img src="images/delete.png" border="0" />';}?></td>
		   <td class="font1" style="width:120;" align="center"><?php if($resHoliday['State_4']==1){ echo '<img src="images/check.gif" border="0" />'; } else { echo '<img src="images/delete.png" border="0" />';}?></td>
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

