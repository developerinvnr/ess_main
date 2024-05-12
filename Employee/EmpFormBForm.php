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
  <tr><td align="center" class="head"><u>Form-B</u></td></tr>
  <tr><td align="center" class="head">Assessment Year&nbsp;<?php if($_REQUEST['CId']==1){ echo $FromCurr; }else{ $NF=$FromCurr-1; $NT=$FromCurr; echo $NF.'-'.$NT; } ?></td></tr>
  <tr><td></td></tr>
  <tr>
   <td class="head" align="center">
   &nbsp;EmpCode :&nbsp;<font class="body2"><?php echo $resE['EmpCode']; ?></font>
   &nbsp;&nbsp;Name :&nbsp;<font class="body2"><?php echo ucfirst(strtolower($resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'])); ?></font><?php /*?>&nbsp;&nbsp;Date-Time :&nbsp;<font class="body2"><?php echo date("d-m-Y h:i:s"); ?></font>
   <span id="pspan">&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onClick="Printpage()" class="bl" style="text-decoration:none;"><img src="images/printer.png" border="0" />Print</a></span><?php */?>
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
    <td class="tdc" style="width:300px;"><b>Behavioral/Skills</b></td>
    <td class="tdc" style="width:400px;"><b>Description</b></td>  
    <td class="tdc" style="width:60px;"><b>Weightage</b></td>
    <td class="tdc" style="width:80px;"><b>Logic</b></td>
    <td class="tdc" style="width:80px;"><b>Period</b></td>
    <td class="tdc" style="width:60px;"><b>Target</b></td>
   </tr>
<?php $sql=mysql_query("select fb.* from hrm_pms_formb fb INNER JOIN hrm_employee_pms_behavioralformb fbg ON fb.FormBId=fbg.FormBId where fb.SkillStatus='A' AND fbg.YearId=".$_REQUEST['YId']." AND fbg.EmpId=".$_REQUEST['EmpId']." order by FormBId", $con); $k=1; while($res=mysql_fetch_assoc($sql)){ ?>	
   <tr bgcolor="#FFFFFF" style="height:22px;">   
    <td align="center" class="datat"><?php echo $k; ?></td>
    <td class="datat"><?php echo $res['Skill']; ?></td>
    <td class="datat"><?php echo $res['SkillComment'] ?></td>  
    <td align="center" class="datat"><?php echo $res['Weightage']; ?></td>
    <td align="center" class="datat"><?php echo $res['Logic']; ?></td>
    <td class="datat"><?php echo $res['Period']; ?></td>
    <td align="center" class="datat"><?php if($rowSubK>0){ echo '';}else{ echo $res['Target']; } ?></td> 
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
