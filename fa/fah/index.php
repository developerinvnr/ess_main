<?php session_start();
require_once('../../Employee/sp/user/config/config.php');
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
$EmployeeId=$_SESSION['ID']; 
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
<!--
function doBlink() { var blink = document.all.tags("BLINK"); 
for (var i=0; i<blink.length; i++)	blink[i].style.visibility = blink[i].style.visibility == "" ? "hidden" : "" }
function startBlink() {	if (document.all) setInterval("doBlink()",1000); }
window.onload = startBlink;
// -->
</SCRIPT>
</head>
<body class="body"> 

<?php $sqlE=mysql_query("select * from hrm_sales_tlemp where TLEId=".$EmployeeId,$con); $resE=mysql_fetch_assoc($sqlE); ?> 
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table></td></tr>
<tr>
<td>
<table style="margin-top:0px;">
<tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
<tr>
 <td valign="top" align="center">
 <table border="0" style="width:1200px; height:350px; float:none;" cellpadding="0">
 <tr>
  <td valign="top"> 	   
<?php //***************************************************** Main Body *********************************** ?>	   
<table border="0" id="Activity">
<tr>
 <td valign="top">
  <table border="0">
  <tr>
	<td valign="top">			   
     <table border="0">
	 <tr>
	   <td align="left" valign="top" style="width:600px;height:280px;">
	     <table border="0">
		   <tr>
		    <td colspan="2" align="left" valign="top" style="width:180px;">&nbsp;</td>
			<td style="width:10px;">&nbsp;</td>
			<td valign="bottom" style="font-family:Times New Roman;font-size:48px;font-weight:bold;color:#183E83;background-image:url(images/footer-leaf.png);background-repeat:no-repeat;height:280px;width:800px;">
			  <table border="0" style="width:800px;">
                <tr>
<?php $sql=mysql_query("select Fname,Sname,Lname,DesigName from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID inner join hrm_designation d on g.DesigId=d.DesigId where g.EmployeeID=".$resE['TLRepId'],$con); $res=mysql_fetch_assoc($sql); $sqlHQ=mysql_query("select HqName,StateName from hrm_headquater h inner join hrm_state s on h.StateId=s.StateId where HqId=".$resE['TLHq'],$con); $resHQ=mysql_fetch_assoc($sqlHQ); ?>					
				 <td style="height:60px;width:400px;" colspan="2">
	               			 
				 </td>
			    </tr>
                <tr><td style="height:115px;width:340px;">&nbsp;</td>
           <td style="font-family:Times New Roman;font-size:40px;font-weight:bold;color:#FFFFFF;width:460px;">FA Admin</td>
                </tr>
                <tr><td style="height:150px;">&nbsp;</td></tr>
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
<?php //*************************************************************************************** ?>
          
		  </td>  
		 </tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>

