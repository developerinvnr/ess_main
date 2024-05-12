<?php session_start();
require_once('../AdminUser/config/config.php');
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<style>
.fontH{font-family:Times New Roman;font-weight:bold;font-size:15px;color:#FFFFFF;}
.font{font-family:Times New Roman;font-size:15px;color:#000000;}
</style>
</head>
<body class="body" background="images/pmsback.png">  
<center> 
<table>
 <tr>
  <td valign="top">
  <table class="table" border="1" cellspacing="0" width="100%">
   
<tr>
<td colspan="4" align="center" valign="middle" style="font-family:Times New Roman;height:28px;font-size:18px;color:#FFFFFF;background-color:#004000;"><b>KRA Schedule</b></td>
</tr>
<tr bgcolor="#005E00" style="height:22px; ">
 <td align="center" class="fontH" style="width:100px;">Date From</td>
 <td align="center" class="fontH" style="width:100px;">Date To</td>
 <td align="center" class="fontH" style="width:400px;">Activity</td>
 <td align="center" class="fontH" style="width:250px;">Process Owner</td>
</tr>
<?php $sql=mysql_query("select * from hrm_pms_kra_schedule where KRASheduleStatus='A' AND CompanyId=".$_REQUEST['C']." AND YearId=".$_REQUEST['KYI']." order by KRASche_DateFrom ASC", $con); 
     $n=1; while($res=mysql_fetch_assoc($sql)) { if($n%2==0){$c="#FFE1FF"; } else { $c="#FFFFFF"; } ?>
<tr style=" background-color:<?php echo $c; ?>;" >
 <td align="center" class="font" valign="top"><?php echo date("d-M-Y",strtotime($res['KRASche_DateFrom'])).' '.$a; ?></td>
 <td align="center" class="font" valign="top"><?php echo date("d-M-Y",strtotime($res['KRASche_DateTo'])); ?></td>
 <td class="font" valign="top"><?php echo $res['KRAActivity']; ?></td>
 <td class="font" valign="top"><?php echo $res['KRAProcessOwner']; ?></td>
</tr>
<?php $n++; } ?>   
   
  </table>  
 
  </td>
 </tr>
 
 <tr><td style="height:50px;">&nbsp;</td></tr>
 
 <tr>
  <td valign="top">

<table class="table" border="1" cellspacing="0" width="100%">
<tr>
<td colspan="4" align="center" valign="middle" style="font-family:Times New Roman;height:28px;font-size:18px;color:#FFFFFF;background-color:#004000;"><b>Appraisal Schedule</b></td>
</tr>
<tr bgcolor="#005E00" style="height:22px; ">
 <td align="center" class="fontH" style="width:100px;">Date From</td>
 <td align="center" class="fontH" style="width:100px;">Date To</td>
 <td align="center" class="fontH" style="width:400px;">Activity</td>
 <td align="center" class="fontH" style="width:200px;">Process Owner</td>
</tr>
<?php $sql=mysql_query("select * from hrm_pms_schedule where SheduleStatus='A' AND CompanyId=".$_REQUEST['C']." AND YearId=".$_REQUEST['PYI']." order by Sche_DateFrom ASC", $con); 
     $n=1; while($res=mysql_fetch_assoc($sql)) { if($n%2==0){$c="#FFFFFF"; } else { $c="#FFFFFF"; } ?>
<tr style="background-color:<?php echo $c; ?>;">
 <td align="center" class="font" valign="top"><?php echo date("d-M-Y",strtotime($res['Sche_DateFrom'])).' '.$a; ?></td>
 <td align="center" class="font" valign="top"><?php echo date("d-M-Y",strtotime($res['Sche_DateTo'])); ?></td>
 <td class="font" valign="top"><?php echo $res['Activity']; ?></td>
 <td class="font" valign="top"><?php echo $res['ProcessOwner']; ?></td>
</tr>
<?php $n++; } ?>
</table>

  </td>
 </tr>
</table> 
</center>  
</body>
</html>



