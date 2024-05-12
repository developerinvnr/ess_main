<?php require_once('../AdminUser/config/config.php'); ?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.font {color:#000; font-family:Georgia; font-size:15px; font-weight:bold;}  .font {color:#000; font-family:Times New Roman; font-size:12px;}
.Input{font-family:"Times New Roman", Times, serif; font-size:14px; height:22px;border-style:hidden; border-bottom-color:#FFFFFF; border-left-color:#FFFFFF; border-right-color:#FFFFFF; border-top-color:#FFFFFF; border:0;background-color:#FFFFFF;}.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;} .font1 { font-family:Georgia; font-size:11px; height:14px; } .font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
.Input2{font-family:Times New Roman; height:22px;border-style:hidden; border-bottom-color:#EEF0AA; border-left-color:#EEF0AA; border-right-color:#EEF0AA; border-top-color:#EEF0AA; border:0;background-color:#EEF0AA; font-weight:bold;}
</style>
<script language="javascript" type="text/javascript">
function Printpage()
 { window.print(); window.close(); }
</script>
</head>
<body class="body" style="" <?php //background-image:url(images/pmsback.png);" ?> >
<table border="0">
<?php $sqlE=mysql_query("select * from hrm_employee where EmployeeID=".$_REQUEST['EmpId'], $con); $resE=mysql_fetch_array($sqlE);?>   
<tr>
 <td>
  <table border="0">
   <tr>
 <td style="size:13px; color:#000000; font-weight:bold; width:100px; font-family:Times New Roman;" align="right">&nbsp;EmpCode :</td>
 <td style="size:13px; color:#0067CE; font-weight:bold; width:80px; font-family:Times New Roman;" align="left"><?php echo $resE['EmpCode']; ?></td>
 <td style="size:13px; color:#000000; font-weight:bold; width:60px; font-family:Times New Roman;" align="right">Name :</td>
 <td style="size:13px; color:#0067CE; font-weight:bold; width:300px; font-family:Times New Roman;" align="left"><?php echo $resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; ?></td>
 <td>&nbsp;</td>
 <td style="width:10px;">&nbsp;</td>
 <td style="size:13px; color:#0067CE; font-weight:bold; width:120px; font-family:Times New Roman;" align="center">
<?php /*  <a href="#" onClick="Printpage()">print form</a>&nbsp;<a href="#" onClick="Printpage()"><img src="images/printer.png" border="0" /></a> */ ?>
 </td>
    </td>
  </tr>
 </table>
 </td>
</tr>
 <tr>
   <td style="width:1050px;">
     <table border="0">
	  <tr>
	  <?php //************************************************ Start ******************************// ?>
	   <td style="width:1050px;" id="EmpkraStatus" style="display:block;">
		<table border="0">
	 </td>	  
	 </tr> 
<tr style="height:24px;">	
  <td style="background-image:url(images/pmsback.png);"></td> 
  <td colspan="7" style="width:1050px;"><table style="width:1050px;" bgcolor="#EEF0AA" border="1" style="border-color:#EEF0AA;"> 
  <tr bgcolor="#EEF0AA">   
  <td class="font" align="center" style="width:40px;">SNo</td>
  <td class="font" align="center" style="width:250px;">KRA/Goals</td>
  <td class="font" align="center" style="width:300px;">Description</td>  
  <td class="font" align="center" style="width:100px;">Measure</td>
  <td class="font" align="center" style="width:80px;">Unit</td>
  <td class="font" align="center" style="width:80px;">Weightage</td>
  <td class="font" align="center" style="width:80px;">Target</td>
</tr>
<?php $sql=mysql_query("select * from hrm_pms_kra where YearId=".$_REQUEST['YId']." AND CompanyId=".$_REQUEST['CId']." AND EmployeeID=".$_REQUEST['EmpId']." order by KRAId ASC", $con);      $k=1; while($res=mysql_fetch_assoc($sql)) { ?>	
 <tr bgcolor="#FFFFFF" style="height:22px;">   
  <td align="center" style="width:40px;color:#000; font-family:Times New Roman; font-size:14px;" valign="top"><?php echo $k; ?></td>
  <td style="width:250px;color:#000; font-family:Times New Roman; font-size:14px;" valign="top"><?php echo $res['KRA']; ?></td>
  <td style="width:300px;color:#000; font-family:Times New Roman; font-size:14px;" valign="top"><?php echo $res['KRA_Description'] ?></td>  
  <td align="center" style="width:100px;color:#000; font-family:Times New Roman; font-size:14px;" valign="top"><?php echo $res['Measure']; ?></td>
  <td align="center" style="width:80px;color:#000; font-family:Times New Roman; font-size:14px;" valign="top"><?php echo $res['Unit']; ?></td>
  <td align="center" style="width:80px;color:#000; font-family:Times New Roman; font-size:14px;" valign="top"><?php echo $res['Weightage']; ?></td>
  <td align="center" style="width:80px;color:#000; font-family:Times New Roman; font-size:14px;" valign="top"><?php echo $res['Target']; ?></td> 
  </tr>
<?php $k++; } ?>
</table></td>
</tr>
		</table>
	     </td>
	   </td>
      <?php //************************************************ Close ******************************// ?>	  	   
	</tr>
  </table>
   </td>
 </tr>
          </table>
		 </td>
</form>		 
		</tr>
	  </table>
	</td>
   </tr>
<?php //******************************************** ?>    
  </table>
</body>
</html>



