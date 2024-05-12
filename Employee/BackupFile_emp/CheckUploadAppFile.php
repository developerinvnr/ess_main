<?php session_start();
require_once('../AdminUser/config/config.php');
$_SESSION['up']=$_REQUEST['action']; $_SESSION['P']=$_REQUEST['P']; 
$_SESSION['E']=$_REQUEST['E']; $_SESSION['Y']=$_REQUEST['Y'];
$sqlEC=mysql_query("select * from hrm_employee where EmployeeID=".$_SESSION['E'], $con); $resEC=mysql_fetch_assoc($sqlEC);
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
</head>
<script type="text/javascript" language="javascript">
function OpenMyfile(v1,v2)
{window.open("MyFile.php?a=open&File="+v1+"&Ext="+v2,"MyFile","width=900,height=650"); }
</script>
<body class="body" background="images/pmsback.png">  
<center> 
<table class="table" border="0" style="width:100%;">
<tr><td colspan="3" align="center" style="font-family:Times New Roman; font-weight:bold; font-size:18px; color:#FFFFFF;">Upload File</td></tr>
<tr><td colspan="3" align="" style="font-family:Times New Roman; font-weight:bold; font-size:16px; color:#2020FF;">
    &nbsp;<font color="#000000">EmpCode :&nbsp;</font><?php echo $resEC['EmpCode']; ?>&nbsp;&nbsp;<font color="#000000">Name :&nbsp;</font><?php echo $resEC['Fname'].' '.$resEC['Sname'].' '.$resEC['Lname']; ?>
	</td></tr>
<tr>
<td>
 <table >
   <tr bgcolor="#0079F2" style="height:21px; ">
     <td style="width:40px;font-family:Times New Roman;color:#FFFFFF;font-size:12px;" align="center"><b>Sno.</b></td>
	 <td style="width:400px;font-family:Times New Roman;color:#FFFFFF;font-size:12px;" align="center"><b>File Name</b></td>
	 <td style="width:80px;font-family:Times New Roman; color:#FFFFFF;font-size:12px;" align="center"><b>Read</b></td> 
   </tr>
 <?php $sqlCheck=mysql_query("select * from hrm_employee_pms_uploadfile where EmpPmsId=".$_SESSION['P']." AND EmployeeID=".$_SESSION['E']." AND YearId=".$_SESSION['Y'], $con); $no=1;while($resCheck=mysql_fetch_array($sqlCheck)) { 
 $DBFileName=substr($resCheck['FileName'],5); ?>
   <tr bgcolor="#FFFFFF" style="height:21px;">
    <td style="width:40px; font-family:Times New Roman; font-size:12px;" align="center"><?php echo $no; ?></td>
	<td style="width:400px; font-family:Times New Roman; font-size:12px;" align="">&nbsp;<?php echo $DBFileName; ?></td>
	<td style="width:80px; font-family:Times New Roman; font-size:12px;" align="center">
 	<a href="#"><img src="<?php if($resCheck['Ext']=='.doc' OR $resCheck['Ext']=='.docx'){echo 'images/doc.png';} if($resCheck['Ext']=='.xls' OR $resCheck['Ext']=='.xlsx'){echo 'images/xls.png';} if($resCheck['Ext']=='.jpg' OR $resCheck['Ext']=='.jpeg'){echo 'images/jpg.png';} if($resCheck['Ext']=='.ods'){echo 'images/ods.png';} if($resCheck['Ext']=='.odt'){echo 'images/odt.png';} if($resCheck['Ext']=='.ppt'){echo 'images/ppt.png';} if($resCheck['Ext']=='.pdf'){echo 'images/pdf.png';}?>" border="0" onClick="OpenMyfile('<?php echo $resCheck['FileName']; ?>','<?php echo $resCheck['Ext']; ?>')" /></a></td> 
   </tr>
 <?php $no++; } ?>  
 </table>
</td>
</tr>
</table>
</center>  
</body>
</html>

