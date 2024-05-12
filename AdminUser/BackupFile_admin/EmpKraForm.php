<?php require_once('../AdminUser/config/config.php'); 
date_default_timezone_set('Asia/Kolkata');?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.font {color:#000; font-family:Georgia; font-size:15px; font-weight:bold;}  .font {color:#000; font-family:Times New Roman; font-size:12px;}
.Input{font-family:"Times New Roman", Times, serif; font-size:14px; height:22px;border-style:hidden; border-bottom-color:#FFFFFF; border-left-color:#FFFFFF; border-right-color:#FFFFFF; border-top-color:#FFFFFF; border:0;background-color:#FFFFFF;}.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;} .font1 { font-family:Georgia; font-size:11px; height:14px; } .font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }.Input2{font-family:Times New Roman; height:22px;border-style:hidden; border-bottom-color:#EEF0AA; border-left-color:#EEF0AA; border-right-color:#EEF0AA; border-top-color:#EEF0AA; border:0;background-color:#EEF0AA; font-weight:bold;}.Input2a{font-family:Times New Roman; height:22px;background-color:#D5AAAA;font-weight:bold; font-size:12px;text-align:center;}.Inputa{font-family:"Times New Roman", Times, serif; font-size:14px; height:22px;border-style:hidden; border-bottom-color:#FFFFFF; border-left-color:#FFFFFF; border-right-color:#FFFFFF; border-top-color:#FFFFFF; border:0;background-color:#CAE4FF;}.datat{color:#000;font-family:Times New Roman;font-size:14px;vertical-align:top;}
.h11{size:13px;color:#000000;font-weight:bold;width:100px;font-family:Times New Roman;text-align:right;}
.h12{size:13px;color:#0067CE;font-weight:bold;width:100px;font-family:Times New Roman;text-align:left;}
</style>
<script language="javascript" type="text/javascript">
function Printpage()
 { window.print(); window.close(); }
</script>
</head>
<body class="body" style="" <?php //background-image:url(images/pmsback.png);" ?> >
<table border="0">
<?php $sqlE=mysql_query("select * from hrm_employee where EmployeeID=".$_REQUEST['EmpId'], $con); $resE=mysql_fetch_array($sqlE); $Ename=$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; 
$cdn=$resE['EmpCode'].'&nbsp;:&nbsp;'.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'].'&nbsp;-&nbsp;'; ?>
<tr>
 <td>
  <table border="0">
   <tr>
 <td style="width:100px;" class="h11">&nbsp;EmpCode :</td>
 <td style="width:80px;" class="h12"><?php echo $resE['EmpCode']; ?></td>
 <td style="width:60px;" class="h11">Name :</td>
 <td style="width:250px;" class="h12"><?php echo $Ename; ?></td>
 <td style="width:300px;">&nbsp;</td>
 <?php /*
 <td style="width:50px;" class="h11">Date :</td>
 <td style="width:80px;" class="h12"><?php echo date("d-m-Y"); ?></td>
 <td style="width:60px;" class="h11">Time :</td>
 <td style="width:80px;" class="h12"><?php echo date("h:i:s"); ?></td>
 <td style="width:10px;">&nbsp;</td>
 */ ?>
    </td>
  </tr>
 </table>
 </td>
</tr>
 <tr>
   <td style="width:1150px;">
     <table border="0">
	  <tr>
	  <?php //************************************************ Start ******************************// ?>
	   <td style="width:1150px;" id="EmpkraStatus" style="display:block;">
		<table border="0">
	 </td>	  
	 </tr> 
<tr style="height:24px;">	
  <td style="background-image:url(images/pmsback.png);"></td> 
  <td colspan="9" style="width:1150px;">
  <table style="width:1150px;" bgcolor="#EEF0AA" border="1" cellpadding="0" cellspacing="1" style="border-color:#EEF0AA;"> 
  <tr bgcolor="#EEF0AA">   
  <td class="font" align="center" style="width:40px;">SNo</td>
  <td class="font" align="center" style="width:300px;">KRA/Goals</td>
  <td class="font" align="center" style="width:350px;">Description</td>  
  <td class="font" align="center" style="width:100px;">Measure</td>
  <td class="font" align="center" style="width:80px;">Unit</td>
  <td class="font" align="center" style="width:80px;">Weightage</td>
  <td class="font" align="center" style="width:80px;">Logic</td>
  <td class="font" align="center" style="width:80px;">Period</td>
  <td class="font" align="center" style="width:80px;">Target</td>
</tr>
<?php $sql=mysql_query("select * from hrm_pms_kra where YearId=".$_REQUEST['YId']." AND CompanyId=".$_REQUEST['CId']." AND EmployeeID=".$_REQUEST['EmpId']." order by KRAId ASC", $con);      $k=1; while($res=mysql_fetch_assoc($sql)) { 
$sSubK=mysql_query("select * from hrm_pms_krasub where KRAId=".$res['KRAId']." AND KSubStatus='A' order by KRASubId ASC",$con); $rowSubK=mysql_num_rows($sSubK);
?>	
 <tr bgcolor="#FFFFFF" style="height:22px;">   
  <td class="datat" align="center" ><?php echo $k; ?></td>
  <td class="datat"><?php echo $res['KRA']; ?></td>
  <td class="datat"><?php echo $res['KRA_Description'] ?></td>  
  <td align="center" class="datat"><?php if($rowSubK>0){ echo '';}else{ echo $res['Measure']; } ?></td>
  <td align="center" class="datat"><?php if($rowSubK>0){ echo '';}else{ echo $res['Unit']; } ?></td>
  <td align="center" class="datat"><?php echo $res['Weightage']; ?></td>
  <td align="center" class="datat"><?php echo $res['Logic']; ?></td>
  <td class="datat"><?php echo $res['Period']; ?></td>
  <td align="center" class="datat"><?php if($rowSubK>0){ echo '';}else{ echo $res['Target']; } ?></td> 
  </tr>
  
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& Start Start */ ?>
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& Start Start */ ?>
<?php $sSubK=mysql_query("select * from hrm_pms_krasub where KRAId=".$res['KRAId']." AND KSubStatus='A' order by KRASubId ASC",$con); $rowSubK=mysql_num_rows($sSubK); ?>   
 <tr>
  <td colspan="9" align="right" style="border:hidden;border-style:none;">
  <div id="Div<?php echo $k; ?>" style="display:<?php if($rowSubK>0){echo 'block';}else{echo 'none';} ?>;">
     <table style="width:1050px;background-color:#D5AAAA;" border="0" cellpadding="0" cellspacing="1"> 
     <tr style="background-color:#D5AAAA;">   
     <td align="center" class="Input2a" style="width:30px;">SNo</td>
     <td align="center" class="Input2a" style="width:300px;">Sub KRA/Goals</td>
     <td align="center" class="Input2a" style="width:400px;">Sub KRA Description</td>  
     <td align="center" class="Input2a" style="width:110px;">Measure</td>
     <td align="center" class="Input2a" style="width:80px;">Unit</td>
     <td align="center" class="Input2a" style="width:80px;">Weightage</td>
	 <td align="center" class="Input2a" style="width:80px;">Logic</td>
     <td align="center" class="Input2a" style="width:80px;">Period</td>
     <td align="center" class="Input2a" style="width:80px;">Target</td>
     </tr>
<?php if($rowSubK==0){$num=5;}elseif($rowSubK==1){$num=4;}elseif($rowSubK==2){$num=3;}elseif($rowSubK==3){$num=2;}elseif($rowSubK==4){$num=1;}elseif($rowSubK==5){$num=0;} ?>

<?php /* While Open*/ $m=1; while($rSubK=mysql_fetch_assoc($sSubK)){?>
  <input type="hidden" id="KraId_<?php echo $k; ?>" value="<?php echo $res['KRAId']; ?>" />
  <input type="hidden" id="SubKraId_<?php echo $k.'_'.$m; ?>" value="<?php echo $rSubK['KRASubId']; ?>" />
  <tr style="background-color:#FFFFFF;"> 
  <td class="Inputa" align="center"><?php if($m==1){$n='a';}elseif($m==2){$n='b';}elseif($m==3){$n='c';}elseif($m==4){$n='d';}elseif($m==5){$n='e';}echo $n; ?></td>
  <td class="Inputa"><?php echo $rSubK['KRA']; ?></td>
  <td class="Inputa"><?php echo $rSubK['KRA_Description']; ?></td>  
  <td align="center" class="Inputa"><?php echo $rSubK['Measure']; ?></td>
  <td align="center" class="Inputa"><?php echo $rSubK['Unit']; ?></td>
  <td align="center" class="Inputa"><?php echo $rSubK['Weightage']; ?></td>
  <td align="center" class="Inputa"><?php echo $rSubK['Logic']; ?></td>
  <td class="Inputa"><?php echo $rSubK['Period']; ?></td>
  <td align="center" class="Inputa"><?php echo $rSubK['Target']; ?></td>
</tr> 
<?php $m++;} ?>	
<?php /* While Close*/ ?>	
     </table>
  </div> 
  </td>
 </tr>
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& End End */ ?> 
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& End End */ ?>

  
  
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



