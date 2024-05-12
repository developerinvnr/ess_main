<?php require_once('config/config.php'); ?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff; font-family:Georgia; font-size:12px; width:100px;} .font1 { font-family:Georgia; font-size:12px; height:14px; width:100px; } 
.font2 { font-size:11px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
</style>
<script>function printage() {window.print(); window.close();}</script>
</head>
<body class="body">
<?php $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['Y']."", $con); $rY=mysql_fetch_assoc($sY); 
      $FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; ?>
   <table border="0">
    <tr><td align="right" width="120" class="heading">PMS - KRA</td><td width="50">&nbsp;</td>
	    <td align="right" width="100" class="heading">Year:&nbsp;</td>
		<td width="50"><font style="font-family:Times New Roman;font-size:15px;"><b><?php echo $PRD; ?></b></font></td>
		<td width="50">&nbsp;</td>
		<td width="120" class="heading">Department:&nbsp;</td>
		<td>
<?php $Sql=mysql_query("select * from hrm_department where DepartmentId=".$_REQUEST['D'], $con); $Res=mysql_fetch_assoc($Sql);  ?>		
<input style="font:Times New Roman;width:200px;font-size:15px;background-color:#E0DBE3;border-style:none;font-weight:bold;" value="<?php echo $Res['DepartmentName'] ?>" />
		</td>
	    <td style="font:Times New Roman; width:200px; color:#4A0000; font-size:12px; ">
		<a href="#" onClick="printage()"><font style="font-family:Times New Roman; font-size:12px;">Print</font></a>	
		</td>
	</tr>
   </table>
  </td>
 </tr>	
 <tr>
 <td style="width:10px;" valign="top" align="center">&nbsp;</td>
<td align="left" id="type" valign="top" style="display:block; width:100%">             
   <table border="1" width="1150">
	<tr>
	  <td align="left" width="1150">
	     <table border="1" width="1150" border="1" bgcolor="#FFFFFF">
		 <tr bgcolor="#7a6189">
		   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>SNo</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:450px;" valign="top" align="center"><b>KRA</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:500px;" valign="top" align="center"><b>Description</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><b>Measure</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><b>Unit</b></td>
		 </tr> 		  
 <?php $sqlDP = mysql_query("SELECT * from hrm_pms_kra WHERE CompanyId=".$_REQUEST['C']." AND YearId=".$_REQUEST['Y']." AND DepartmentId=".$_REQUEST['D']." AND (KRAStatus='A' OR KRAStatus='R') GROUP BY KRA order by KRAId ASC", $con); 
       $Sno=1;  while($resDP = mysql_fetch_assoc($sqlDP)) {  ?>	 
		<tr>
		   <td align="center" style="font:Georgia; font-size:11px; width:50px;" valign="top"><?php echo $Sno; ?></td>
		   <td style="font-family:Georgia;font-size:12px; width:300px;" valign="top"><?php echo $resDP['KRA']; ?></td>
		   <td style="font-family:Georgia; font-size:12px; width:700px;" valign="top"><?php echo $resDP['KRA_Description']; ?></td>
		   <td style="font-family:Georgia; font-size:12px; width:100px;" valign="top"><?php echo $resDP['Measure']; ?></td>
		   <td align="center" style="font-family:Georgia;font-size:12px; width:50px;" valign="top"><?php echo $resDP['Unit']; ?></td>
		</tr>
<?php $Sno++; } ?>		
	    </table>	 
      </td>
	</tr> 
  </table>  
</body>
</html>

