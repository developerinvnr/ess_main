<?php require_once('../AdminUser/config/config.php'); 
date_default_timezone_set('Asia/Kolkata'); ?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link type="text/css" href="css/mycss.css" rel="stylesheet"/>
<style>
.head{color:#000;font-family:Times New Roman;font-size:18px;font-weight:bold;}
.body{color:#00356A;font-family:Times New Roman;font-size:18px;}
.body2{color:#FFFFFF;font-family:Times New Roman;font-size:18px;color:#0000FF;}
.h{color:#000;font-family:Times New Roman;font-size:15px;font-weight:bold;text-align:center;}
.hl{color:#000;font-family:Times New Roman;font-size:15px;font-weight:bold;}
.b{color:#000;font-family:Times New Roman;font-size:15px;text-align:center;}
.bl{font-family:Times New Roman;font-size:15px;}
</style>
<script language="javascript" type="text/javascript">
function Printpage()
{
 document.getElementById("pspan").style.display='none'; 
 window.print(); window.close(); 
}
</script>
</head>
<body style="background-image:url(images/pmsback.png);" >
<?php $sqlE=mysql_query("select * from hrm_employee where EmployeeID=".$_REQUEST['EmpId'], $con); $resE=mysql_fetch_array($sqlE); $Ename=$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; 
$cdn=$resE['EmpCode'].'&nbsp;:&nbsp;'.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'].'&nbsp;-&nbsp;'; 

$sqlCurr=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YId'], $con); $resCurr=mysql_fetch_assoc($sqlCurr); 
$FromCurr=date("Y", strtotime($resCurr['FromDate'])); $ToCurr=date("Y", strtotime($resCurr['ToDate']));
?>
<table border="0" style="width:100%;">
<tr>
 <td style="width:100%;">
 <table border="0" style="width:100%;" cellspacing="0">
  <tr><td align="center" class="head"><u>My KRA</u></td></tr>
  <tr><td align="center" class="head">Assessment Year&nbsp;<?php if($_REQUEST['CId']==1){ echo $FromCurr; }else{ $NF=$FromCurr-1; $NT=$FromCurr; echo $NF.'-'.$NT; } ?></td></tr>
  <tr><td></td></tr>
  <tr>
   <td class="head" align="center">
   &nbsp;EmpCode :&nbsp;<font class="body2"><?php echo $resE['EmpCode']; ?></font>
   &nbsp;&nbsp;Name :&nbsp;<font class="body2"><?php echo ucfirst(strtolower($resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'])); ?></font>&nbsp;&nbsp;Date-Time :&nbsp;<font class="body2"><?php echo date("d-m-Y h:i:s"); ?></font>
   <span id="pspan">&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onClick="Printpage()" class="bl" style="text-decoration:none;"><img src="images/printer.png" border="0" />Print</a></span>
   </td>
  </tr>
 </table>
 </td>
</tr>
<tr><td style="height:20px;">&nbsp;</td></tr>
 <tr>
   <td style="width:100%;">
     <table border="0" style="width:100%;">
	  <tr>
	  <?php //************************************************ Start ******************************// ?>
	   <td id="EmpkraStatus" style="display:block;width:100%;">
		<table border="0" style="width:100%;">
	 </td>	  
	 </tr> 
<tr style="height:24px;">	 
 <td colspan="7" style="width:1150px;">
  <table border="1" style="width:100%;" cellspacing="0"> 
   <tr style="height:25px;background-color:#FFFF53;">   
    <td class="tdc" style="width:30px;"><b>Sn</b></td>
    <td class="tdc" style="width:300px;"><b>KRA/Goals</b></td>
    <td class="tdc" style="width:400px;"><b>Description</b></td>  
    <td class="tdc" style="width:80px;"><b>Measure</b></td>
    <td class="tdc" style="width:80px;"><b>Unit</b></td>
    <td class="tdc" style="width:60px;"><b>Weightage</b></td>
    <td class="tdc" style="width:80px;"><b>Logic</b></td>
    <td class="tdc" style="width:80px;"><b>Period</b></td>
    <td class="tdc" style="width:60px;"><b>Target</b></td>
   </tr>
<?php $sql=mysql_query("select * from hrm_pms_kra where YearId=".$_REQUEST['YId']." AND CompanyId=".$_REQUEST['CId']." AND EmployeeID=".$_REQUEST['EmpId']." order by KRAId ASC", $con); $k=1; while($res=mysql_fetch_assoc($sql)){ $sSubK=mysql_query("select * from hrm_pms_krasub where KRAId=".$res['KRAId']." AND KSubStatus='A' order by KRASubId ASC",$con); $rowSubK=mysql_num_rows($sSubK); ?>	
   <tr bgcolor="#FFFFFF" style="height:22px;">   
    <td align="center" class="datat"><?php echo $k; ?></td>
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
<?php $sSubK=mysql_query("select * from hrm_pms_krasub where KRAId=".$res['KRAId']." AND KSubStatus='A' order by KRASubId ASC",$con); $rowSubK=mysql_num_rows($sSubK);  ?>   
   <tr>
    <td colspan="9" align="right" style="border:hidden;border-style:none;">
    <div id="Div<?php echo $k; ?>" style="display:<?php if($rowSubK>0){echo 'block';}else{echo 'none';} ?>;">
     <table style="width:97%;background-color:#71FF71;" border="0" cellpadding="0" cellspacing="1"> 
      <tr style="background-color:#71FF71;">
	   <td rowspan="6" class="Input2a" style="background-color:#71FF71;border:hidden;width:50px;" valign="middle" align="center">Sub<br>KRA</td>  
       <td align="center" class="Input2a" style="width:30px;">Sn</td>
       <td align="center" class="Input2a" style="width:280px;">Sub KRA/Goals</td>
       <td align="center" class="Input2a" style="width:390px;">Sub KRA Description</td>  
       <td align="center" class="Input2a" style="width:80px;">Measure</td>
       <td align="center" class="Input2a" style="width:80px;">Unit</td>
       <td align="center" class="Input2a" style="width:60px;">Weightage</td>
	   <td align="center" class="Input2a" style="width:80px;">Logic</td>
	   <td align="center" class="Input2a" style="width:80px;">Period</td>
       <td align="center" class="Input2a" style="width:60px;">Target</td>
      </tr>
<?php if($rowSubK==0){$num=5;}elseif($rowSubK==1){$num=4;}elseif($rowSubK==2){$num=3;}elseif($rowSubK==3){$num=2;}elseif($rowSubK==4){$num=1;}elseif($rowSubK==5){$num=0;} ?>
<?php /* While Open*/ $m=1; while($rSubK=mysql_fetch_assoc($sSubK)){?>
      <tr style="background-color:#FFFFFF;"> 
       <td align="center" class="Inputa"><?php if($m==1){$n='a';}elseif($m==2){$n='b';}elseif($m==3){$n='c';}elseif($m==4){$n='d';}elseif($m==5){$n='e';}echo $n; ?></td>
       <td class="Inputa"><?php echo $rSubK['KRA']; ?></td>
       <td class="Inputa"><?php echo $rSubK['KRA_Description']; ?></td>  
       <td align="center" class="Inputa"><?php echo $rSubK['Measure']; ?></td>
       <td align="center" class="Inputa"><?php echo $rSubK['Unit']; ?></td>
       <td align="center" class="Inputa"><?php echo $rSubK['Weightage']; ?></td>
       <td align="center" class="Inputa"><?php echo $rSubK['Logic']; ?></td>
       <td align="center" class="Inputa"><?php echo $rSubK['Period']; ?></td>
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



