<?php session_start(); ?>
<html>
<head>
<title><?php include_once('Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" media="screen" href="css/screen.css" />
<script type="text/javascript">
$(document).ready(function(){ $('#myslides').cycle({ fx: 'fade', speed: 3500, timeout: 2000	});	}); 
</script>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#003700">
<center>
<table bgcolor="#51b351" border="0" style="margin-top:50px;" align="center" cellpadding="0" cellspacing="0">
	 <tr>
     <td align="center">  
	    <table border="0" cellspacing="0" cellpadding="0" align="center" style="width:800px; ">
           <tr valign="top">
		    <td style="width:5px;">&nbsp;</td>
			<td valign="top" style="width:115px;"><img src="images/VNRLogo3.png" border="0" style="width:110px; height:120px; "/></td>
		    <td style="font-family:Times New Roman;font-size:33px;color:#FFFFFF; width:500px;font-style:italic;text-shadow: 2px 2px 3px #62B0FF;" valign="top">
		    <?php /*Human Resource Information Management System */ ?>
	        <font style="font-size:42px;">ESS-</font><font style="font-size:42px;">E</font>mployee <font style="font-size:42px;">S</font>elf <font style="font-size:42px;">S</font>ervices<br><font style="font-family:Times New Roman;font-size:13px;color:#A6D2FF;text-shadow: 0px 0px 0px #62B0FF;">(Understanding your needs and identifying solution)</font></td>  <td align="center" valign="top" style="width:110px;">&nbsp;</td> 	 	  
           </tr>
		   <tr style="height:30px;"><td colspan="4">&nbsp;</td></tr>
		   <tr style="height:200px;" valign="top">
		    <td colspan="4" style="width:800px; font-family:Georgia; font-size:15px; color:#004200;">
<?php /**************************************************************************************************/ ?>
<?php require_once("unset.php"); ?>
	    <table bgcolor="#51b351" width="800" border="0" cellspacing="0" cellpadding="0"> 
           <tr style="height:250px;">
                 <td style="width:180px;" valign="top">
				 <table width="210" border="0" cellspacing="0" cellpadding="0">
                       <tr><td>&nbsp;</td><td style="font-size:17px; font-family:Georgia; font-weight:bold;">-> <a href="index.php" style="font-size:17px; font-family:Georgia; font-weight:bold;"><i><font color="#FFFFFF">Go to home</font></i></a></td></tr>
					   <tr><td style="height:150px;width:40px;">&nbsp;</td></tr>
                </table>
			    </td>			  
			   <td id="AdminCell" style="display:none;" align="center" style="width:500px;"> 
			  </td>
			  <td id="EmpCell" style="display:block;" style="width:500px;">
			  </td>	
			   <td id="ContactCell" style="display:none;" valign="top" style="width:500px;">
			  </td>		   
           </tr>
		   <tr><td id="msg"></td></tr>
        </table>
	  </td></tr>
</table>
<?php /**************************************************************************************************/ ?>			   
			</td>  	  
           </tr>
  </table>
 </td>	
 </tr>
 <tr>
	 <td height="10" style="width:800px;">
		<table style="width:800px;" border="0" cellspacing="0" cellpadding="0">
			<tr>
			   <td width="30%" align="center">
<a href="#"><strong>Terms of Use</strong></a><strong class="blye-text-regular"> | </strong><a href="#"><strong>Privacy Statement </strong></a></td>
				<td width="70%" align="center"><font color="#717100"><strong>Copyright &copy; VNR Seeds Pvt Ltd. All rights reserved. Designed by <strong></font><a href="http://www.vnrseeds.com" style="color:#717100; text-decoration:none;"><strong>VNR Seeds Pvt Ltd.<strong></a></td>
			  </tr>
		   </table>			
		</td>
	 </tr>

</table>
</center>
</body>
</html>