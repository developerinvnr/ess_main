<?php 
$CompanyId=1; $sqly=mysql_query("select YearId,FromDate,ToDate from hrm_sales_year where Company1='A'", $con); $resy=mysql_fetch_assoc($sqly); $YearId=$resy['YearId']; $fromdate=date("Y",strtotime($resy['FromDate'])); $todate=date("Y",strtotime($resy['ToDate']));
$sqlE=mysql_query("select * from hrm_sales_tlemp where TLEId=".$_SESSION['ID'],$con); $resE=mysql_fetch_assoc($sqlE); 
$SqlCom=mysql_query("select CompanyName from hrm_company_basic where CompanyId=".$CompanyId, $con); 
$resCom=mysql_fetch_assoc($SqlCom); 
?>		  
<table border="0" style="margin-top:-5px;width:1200px; height:20px;">	  
<tr>
  <td align="Left" valign="top" style="font-family:Times New Roman;color:#C4E1FF; font-size:15px; width:1200px; ">
  <i><b>Welcome :&nbsp;</b></i>
  <font style='font-family:Times New Roman;font-size:14px;color:#FFFFAE;'><b><?php echo 'Mr. '.$resE['TLName'];?></b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <i><b>Year :&nbsp;</b></i>
  <font style='font-family:Times New Roman;font-size:14px;color:#FFFFAE;'><b><?php echo $fromdate; ?></b></font>
  <font style='font-family:Times New Roman;font-size:13px;color:#9B0000;'><b>to</b></font>
  <font style='font-family:Times New Roman;font-size:14px;color:#FFFFAE;'><b><?php echo $todate; ?></b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="../Home.php?logout=true" class="top_link" style="text-decoration:none;"><b style="color:#FFCB97;"><u>LogOut</u></b></a> &nbsp;&nbsp;
  </td>  								
</tr>
</table>

