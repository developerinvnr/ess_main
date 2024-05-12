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
<script>
function PrintPage() {window.print(); window.close();
}
</script>
</head>
<body class="body" onLoad="PrintPage()">
   <table border="0">
   </table>
  </td>
 </tr>	
 <tr>
	 <td style="font-family:Times New Roman;font-size:20px;">&nbsp;&nbsp;&nbsp;<b>Conference Details :&nbsp;<font color="#000066"><?php if($_REQUEST['v']!='All'){echo 'Year-'.$_REQUEST['v'];} ?></font></b></td>
	</tr>
 <tr>
 <td style="width:10px;" valign="top" align="center"></td>
 <td align="left" id="type" valign="top" style="display:block; width:100%">             
   <table border="1" width="1150">
	<tr>
	  <td align="left" width="1150">
	     <table border="1" width="1150" border="1" bgcolor="#FFFFFF">
		 <tr bgcolor="#7a6189">
	<td align="center" style="color:#FFFFFF;" class="All_30"><b>SN</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Title</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_60"><b>Date</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Duration</b></td>
<?php /*<td align="center" style="color:#FFFFFF;" class="All_150"><b>Institute</b></td>*/ ?>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Conducted By</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Location</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_60"><b>Cost</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>NOP</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>Mandays</b></td>
       </tr> 
<?php if($_REQUEST['v']!='All'){ $sqlT = mysql_query("SELECT * from hrm_company_conference WHERE ConfYear=".$_REQUEST['v']." AND CompanyId=".$_REQUEST['C']." order by ConfFrom DESC", $con); }
 if($_REQUEST['v']=='All'){ $sqlT = mysql_query("SELECT * from hrm_company_conference WHERE CompanyId=".$_REQUEST['C']." order by ConfFrom DESC", $con); }
 $Sno=1; while($resT = mysql_fetch_assoc($sqlT)) { 
?>	 
	   <tr bgcolor="<?php if($Sno%2){ echo '#FFFFFF'; } else {echo '#D9D1E7';}?>">
	<td align="center" style="" class="All_30"><?php echo $Sno; ?></td>
	<td align="" style="" class="All_150" valign="top"><?php echo $resT['ConfTitle']; ?></td>
	<td align="center" style="" class="All_60" valign="top"><?php echo date("d-M-y",strtotime($resT['ConfFrom'])); ?></td>
	<td align="center" style="" class="All_80" valign="top"><?php echo $resT['Duration']; ?>&nbsp;<?php if($resT['Duration']>1){echo 'Days';}else{echo 'Day';}; ?></td>
<?php /*<td align="" style="" class="All_150" valign="top"><?php echo $resT['Institute']; ?></td>*/ ?>
	<td align="" style="" class="All_150" valign="top"><?php echo $resT['ConductedBy']; ?></td>
	<td align="" style="" class="All_150" valign="top"><?php echo $resT['Location']; ?></td>
	<td align="right" style="" class="All_60" valign="top"><?php echo intval($resT['TotalCost']); ?>&nbsp;</td>
	<td align="center" style="" class="All_60" valign="top"><?php echo $resT['TotalParticipant']; ?></td>
	<td align="center" style="" class="All_50" valign="top"><?php echo $resT['Man_Day']; ?></td>
     </tr>
<?php $Sno++; }?> 
	    </table>	 
      </td>
	</tr> 
  </table>  
</body>
</html>

