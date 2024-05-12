<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');} 
if($_SESSION['login'] = true){require_once('StartEmpMenuSession.php');}else{header('Location:../index.php');}
/******************************************************************************/
include("SetKraPmsy.php"); ?>

<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
</head>
<body class="body">   
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" name="YId" id="YId" value="<?php echo $YearId; ?>" />
<table class="table">
<tr>
 <td>
 <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table> 
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px;">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top">
	     <table border="0" style="width:100%; height:500px; float:none;" cellpadding="0">
		  <tr>
		   <td valign="top"> 
   
		     <table border="0" id="Activity">
			  <tr>
				 <td colspan="2" width="100%" valign="top">
				  <table border="0">
<?php //********************** Start ******************************************** ?>					
<tr>
 <td colspan="5" style="background-image:url(images/pmsback.png);width:100%;"> 	 
  <table border="0" style="width:100%;">
   <tr>
    <td valign="top" style="width:100%;">
	  <table border="0">  
	  <tr> 		
		
<?php if($_SESSION['EmpType']=='E'){ ?>
<td align="center" valign="top"><a href="pms.php?log=<?php echo $_SESSION['logCheckEmp']; ?>&ee=0&aa=1&rr=1&hh=1&rr2=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=0&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1&org=1"><img id="Img_emp1" src="images/emp1.png" border="0"/></a></td>

<?php } if($_SESSION['BtnApp']>0 OR $_SESSION['BtnKApp']>0) { ?><td align="center" valign="top"><a href="ManagerPms.php?ee=1&aa=0&rr=1&rr2=1&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=0&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_manager1" src="images/manager1.png" border="0"/></a></td>
		   
<?php } if($_SESSION['BtnRev']>0 OR $_SESSION['BtnKRev']>0) { ?><td align="center" valign="top"><a href="HodPms.php?ee=1&aa=1&rr=0&rr2=1&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=0&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" src="images/hod1.png" border="0"/></a></td>

<?php } if($_SESSION['BtnRev2']>0) { ?><td align="center" valign="top"><a href="Rev2HodPms.php?ee=1&aa=1&rr=1&rr2=0&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=0&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" src="images/RevHod1.png" border="0"/></a></td>	
		   
<?php } if($_SESSION['BtnHod']>0) { ?><td align="center" valign="top"><a href="RevHodPms.php?ee=1&aa=1&rr=1&rr2=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=0&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" src="images/m1.png" border="0"/></a></td><?php } ?>


<?php 
$cnn=mysql_connect('184.168.127.72','vnressus_hrims_user','hrims@192');
if(!$cnn) die("Failed to connect to database!");
$dbb=mysql_select_db('vnressus_hrims', $cnn);
if(!$dbb) die("Failed to select database!");
//$_SESSION['chk']='Tr1Fl0';
$sVy=mysql_query("select * from hrm_pms_setting where CompanyId=11 AND Process='PMS'",$cnn); $rYy=mysql_fetch_assoc($sVy);
$sYckE=mysql_query("select count(*) as TotPmsId from hrm_employee_pms p left join hrm_employee e on p.EmployeeID=e.EmployeeID where p.AssessmentYear=".$rYy['CurrY']." AND (p.HOD2=".$EmployeeId." OR p.MgmtID=".$EmployeeId.") and e.EmpStatus='A'", $cnn); $rYckE=mysql_fetch_assoc($sYckE); if($rYckE['TotPmsId']>0){ ?><td style="width:20px;">&nbsp;</td><td align="center" valign="top"><a href="https://vnress.in/ExtraRpt/rptpm.php?ee=1e1&aa=378&rr=55&rr2=w34&hh=00&sh=879&hp=<?=$rYy['CurrY']?>&fr=13&kr=51&fq=61&prt=12&msg=11&pd=0&mt=6543&mts=236&scr=154&prom=46&inc=09&incr=87&pmsr=89&rg=65&h=18&fachiv=14&fa=1&fb=<?=$EmployeeId?>&ffeedb=457&org=1678" style="color:#FFFF00; font-family:Georgia;" target="_blank"><i>VVNR PMS Report</i></a></td><?php }  ?>

      </tr>
     </table>
	</td>
  </tr>
  <tr>
   <td>
     <table>
	   <tr>
	    <td style="width:200px;">&nbsp;</td>
	    <td><img src="images/PMS.png" border="0" /></td>
	   </tr>
	 </table>
   </td>
  </tr>
<?php //****************************** Close ****************************************** ?>					
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
	<tr>
	  <td valign="top" style="">
	    <?php require_once("../footer.php"); ?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>

