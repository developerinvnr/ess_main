<?php require_once('config/config.php'); ?>
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
<script language="javascript" type="text/javascript">
</script>
</head>
<body>
<table>
<tr><td style="font-family:Times New Roman;color:#000000;font-size:13px;width:785;" align="right"><a href="#" onClick="PrintAsst(<?php echo $_REQUEST['EI']; ?>)">Print</a>&nbsp;&nbsp;</td></tr>
<?php $SqlCtc=mysql_query("SELECT * FROM hrm_employee WHERE EmployeeID=".$_REQUEST['EI'], $con); $ResAsst=mysql_fetch_assoc($SqlCtc); 
if($ResAsst['DR']=='Y'){$M='Dr.';} elseif($ResAsst['Gender']=='M'){$M='Mr.';} elseif($ResAsst['Gender']=='F' AND $ResAsst['Married']=='Y'){$M='Mrs.';} elseif($ResAsst['Gender']=='F' AND $ResAsst['Married']=='N'){$M='Miss.';}  
$NameE=$M.' '.$ResAsst['Fname'].'&nbsp;'.$ResAsst['Sname'].'&nbsp;'.$ResAsst['Lname'];
?> 			
<tr>
 <td align="center">
   <table border="0" width="790">
   
     <tr><td align="center" valign="top" style="font-size:20px; color:#000000; font-family:Times New Roman; font-weight:bold;"><u>Employee Assest</u></td></tr>
	 <tr><td>&nbsp;</td></tr>
	 <tr>
	  <td style="font-family:Times New Roman;color:#000000; width:785;" align="center">
	    <table border="0">
		  <tr>
		    <td style="width:50px;">&nbsp;</td>
		    <td style="width:385px;font-size:16px;font-weight:bold;"><?php echo $NameE; ?> / EC No:&nbsp;<?php echo $ResAsst['EmpCode'];  ?></td>
			<td style="width:100px;">&nbsp;</td>
			<td style="width:200px;font-size:16px;font-weight:bold;" align="right">Date:&nbsp;<input name="DatePrint" id="DatePrint" class="All_100" value="<?php echo date("d-m-Y"); ?>" readonly><button id="f_btn1" class="CalenderButton"></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
  cal.manageFields("f_btn1", "DatePrint", "%d-%m-%Y"); </script></td>
			<td style="width:50px;">&nbsp;</td>
		  </tr>
		</table>
	  </td>
	 </tr>
</table>  
 
</body>
</html>

