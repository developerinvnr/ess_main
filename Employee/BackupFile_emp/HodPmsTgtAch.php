<?php session_start();
require_once('../AdminUser/config/config.php');
$sqlE=mysql_query("select * from hrm_employee where EmployeeID=".$_REQUEST['e'], $con); $resE=mysql_fetch_assoc($sqlE);
$BeforeYId2=$_REQUEST['y']-2; $BeforeYId=$_REQUEST['y']-1; 	
$sqlY1=mysql_query("select * from hrm_sales_year where YearId=".$BeforeYId2, $con); $resY1=mysql_fetch_assoc($sqlY1); 
$sqlY2=mysql_query("select * from hrm_sales_year where YearId=".$BeforeYId, $con); $resY2=mysql_fetch_assoc($sqlY2); 
$sqlY3=mysql_query("select * from hrm_sales_year where YearId=".$_REQUEST['y'], $con); $resY3=mysql_fetch_assoc($sqlY3); 
$y1=date("Y",strtotime($resY1['FromDate'])).'-'.date("Y",strtotime($resY1['ToDate'])); 
$y2=date("Y",strtotime($resY2['FromDate'])).'-'.date("Y",strtotime($resY2['ToDate']));
$y3=date("Y",strtotime($resY3['FromDate'])).'-'.date("Y",strtotime($resY3['ToDate']));

$y1T='<font color="#A60053">Ach.</font>'; $y2T='<font color="#A60053">Ach.</font>';
$y3T='<font color="#A60053">Tgt.</font>'; $y3T2='<font color="#A60053">YTD.</font>'; 

$my1='<font color="#A60053">'.date("y",strtotime($resY3['FromDate'])).'</font>'; 
$my2='<font color="#A60053">'.date("y",strtotime($resY3['ToDate'])).'</font>';

$fy1=date("Y",strtotime($resY1['FromDate'])); $ty1=date("Y",strtotime($resY1['ToDate'])); 
$fy2=date("Y",strtotime($resY2['FromDate'])); $ty2=date("Y",strtotime($resY2['ToDate'])); 
$fy3=date("Y",strtotime($resY3['FromDate'])); $ty3=date("Y",strtotime($resY3['ToDate'])); 
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<style>
.head{font-family:Times New Roman;font-size:14px;font-weight:bold;color:#fff;text-align:center;}
.data{font-family:Times New Roman;font-size:14px;}
p{font-size: 40px;}
.loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('images/pageLoader.gif') 50% 50% no-repeat rgb(249,249,249);
    opacity: .8;
}
</style>
<script language="javascript">
function ClickGrp(v,e,y)
{ window.location="HodPmsTgtAch.php?e="+e+"&y="+y+"&grp="+v; }

function Fun3ATotal(v)
{ var A=parseFloat(v); var TotA=parseFloat(document.getElementById("TotVal_3A").value);
  document.getElementById("TotVal_3A").value=Math.round((A+TotA)*10000)/10000; 
}
function Fun3BTotal(v)
{ var B=parseFloat(v); var TotB=parseFloat(document.getElementById("TotVal_3B").value);
  document.getElementById("TotVal_3B").value=Math.round((B+TotB)*10000)/10000; 
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript">
$(window).load(function() {
	$(".loader").fadeOut("slow");
});
</script>
</head>
<body class="body" bgcolor="#E9FFD2"> 
<div class="loader"></div> 
 
<center> 
<table class="table" border="0" width="100%">
<tr>
 <td>
  <table>
   <tr>
    <td colspan="3" style="font-family:Times New Roman;font-weight:bold;font-size:16px;color:#00A600;">
    <font color="#000000"><i><u>EmpCode</u> :</i>&nbsp;</font><?php echo $resE['EmpCode']; ?>,&nbsp;&nbsp;&nbsp;<font color="#000000"><i><u>Employee Name</u> :</i>&nbsp;</font><?php echo strtoupper($resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']); ?>&nbsp;&nbsp;&nbsp;<font color="#000000"><i><u>Department</u> :</i>&nbsp;</font><?php echo 'SALES'; ?></td>
   </tr>
  </table>
 </td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
 <td align="center">
  <select class="data" style="width:180px;height:22px;" name="CropGrp" id="CropGrp" onChange="ClickGrp(this.value,<?php echo $_REQUEST['e'].','.$_REQUEST['y']; ?>)">
   <option value="1" <?php if($_REQUEST['grp']==1){echo 'selected';}?> >VEGETABLE CROP</option>
   <option value="2" <?php if($_REQUEST['grp']==2){echo 'selected';}?> >FIELD CROP</option>
   <option value="3" <?php if($_REQUEST['grp']==3){echo 'selected';}?> >All CROP</option>
   </select>
 </td>
</tr>
<tr>
 <td style="vertical-align:top;width:100%;" valign="top">
  <table border="1" width="100%" cellspacing="1">
   <tr bgcolor="#005177" style="height:22px;">
    <td rowspan="3" class="head" style="width:5%;">SNo</td>
	<td rowspan="3" class="head" style="width:15%;">Crop</td>
	<td rowspan="3" class="head" style="width:20%;">Product</td>
	<?php /*?><td colspan="2" class="head" style="width:20%;border-bottom:hidden;"><?php echo $y1; ?></td>
	<td colspan="2" class="head" style="width:20%;border-bottom:hidden;"><?php echo $y2; ?></td><?php */?>
	<td colspan="4" class="head" style="width:60%;border-bottom:hidden;"><?php echo $y3; ?></td>
   </tr>
   <tr bgcolor="#005177" style="height:22px;">
	<?php /*?><td colspan="2" class="head" style="border-top:hidden;border-bottom:hidden;">Achive</td>
	<td colspan="2" class="head" style="border-top:hidden;border-bottom:hidden;">Achive</td><?php */?>
	<td colspan="2" class="head" style="width:30%;border-top:hidden;border-bottom:hidden;">Target</td>
	<td colspan="2" class="head" style="width:30%;border-top:hidden;border-bottom:hidden;">Achive (YTD)</td>
   </tr>
   <tr bgcolor="#005177" style="height:22px;">
	<?php /*?><td class="head" style="border-top:hidden;">Qty (kg)</td>
	<td class="head" style="border-top:hidden;">Value</td>
	<td class="head" style="border-top:hidden;">Qty (kg)</td>
	<td class="head" style="border-top:hidden;">Value</td><?php */?>
	<td class="head" style="border-top:hidden;width:15%;">Qty (kg)</td>
	<td class="head" style="border-top:hidden;width:15%;">Value (Lakh)</td>
	<td class="head" style="border-top:hidden;width:15%;">Qty (kg)</td>
	<td class="head" style="border-top:hidden;width:15%;">Value (Lakh)</td>
   </tr>
<?php 
if($_REQUEST['grp']==1 OR $_REQUEST['grp']==2)
{
 /*$p1=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details sd INNER JOIN hrm_sales_seedsproduct p ON sd.ProductId=p.ProductId INNER JOIN hrm_sales_seedsitem i ON p.ItemId=i.ItemId INNER JOIN hrm_sales_dealer dl ON sd.DealerId=dl.DealerId INNER JOIN hrm_sales_hq_temp hqt ON dl.HqId=hqt.HqId INNER JOIN hrm_sales_reporting_level rpt ON hqt.EmployeeID=rpt.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$_REQUEST['e']." OR rpt.R1=".$_REQUEST['e']." OR rpt.R2=".$_REQUEST['e']." OR rpt.R3=".$_REQUEST['e']." OR rpt.R4=".$_REQUEST['e']." OR rpt.R5=".$_REQUEST['e'].") AND i.GroupId=".$_REQUEST['grp']." AND sd.YearId=".$BeforeYId2, $con);
 $p2=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details sd INNER JOIN hrm_sales_seedsproduct p ON sd.ProductId=p.ProductId INNER JOIN hrm_sales_seedsitem i ON p.ItemId=i.ItemId INNER JOIN hrm_sales_dealer dl ON sd.DealerId=dl.DealerId INNER JOIN hrm_sales_hq_temp hqt ON dl.HqId=hqt.HqId INNER JOIN hrm_sales_reporting_level rpt ON hqt.EmployeeID=rpt.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$_REQUEST['e']." OR rpt.R1=".$_REQUEST['e']." OR rpt.R2=".$_REQUEST['e']." OR rpt.R3=".$_REQUEST['e']." OR rpt.R4=".$_REQUEST['e']." OR rpt.R5=".$_REQUEST['e'].") AND i.GroupId=".$_REQUEST['grp']." AND sd.YearId=".$BeforeYId, $con);*/
 $p3=mysql_query("select SUM(M1) as M1,SUM(M2) as M2,SUM(M3) as M3,SUM(M4) as M4,SUM(M5) as M5,SUM(M6) as M6,SUM(M7) as M7,SUM(M8) as M8,SUM(M9) as M9,SUM(M10) as M10,SUM(M11) as M11,SUM(M12) as M12, SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details sd INNER JOIN hrm_sales_seedsproduct p ON sd.ProductId=p.ProductId INNER JOIN hrm_sales_seedsitem i ON p.ItemId=i.ItemId INNER JOIN hrm_sales_dealer dl ON sd.DealerId=dl.DealerId INNER JOIN hrm_sales_hq_temp hqt ON dl.HqId=hqt.HqId INNER JOIN hrm_sales_reporting_level rpt ON hqt.EmployeeID=rpt.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$_REQUEST['e']." OR rpt.R1=".$_REQUEST['e']." OR rpt.R2=".$_REQUEST['e']." OR rpt.R3=".$_REQUEST['e']." OR rpt.R4=".$_REQUEST['e']." OR rpt.R5=".$_REQUEST['e'].") AND i.GroupId=".$_REQUEST['grp']." AND sd.YearId=".$_REQUEST['y'], $con);
}
else
{
 /*$p1=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details sd INNER JOIN hrm_sales_seedsproduct p ON sd.ProductId=p.ProductId INNER JOIN hrm_sales_seedsitem i ON p.ItemId=i.ItemId INNER JOIN hrm_sales_dealer dl ON sd.DealerId=dl.DealerId INNER JOIN hrm_sales_hq_temp hqt ON dl.HqId=hqt.HqId INNER JOIN hrm_sales_reporting_level rpt ON hqt.EmployeeID=rpt.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$_REQUEST['e']." OR rpt.R1=".$_REQUEST['e']." OR rpt.R2=".$_REQUEST['e']." OR rpt.R3=".$_REQUEST['e']." OR rpt.R4=".$_REQUEST['e']." OR rpt.R5=".$_REQUEST['e'].") AND sd.YearId=".$BeforeYId2, $con);
 $p2=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details sd INNER JOIN hrm_sales_seedsproduct p ON sd.ProductId=p.ProductId INNER JOIN hrm_sales_seedsitem i ON p.ItemId=i.ItemId INNER JOIN hrm_sales_dealer dl ON sd.DealerId=dl.DealerId INNER JOIN hrm_sales_hq_temp hqt ON dl.HqId=hqt.HqId INNER JOIN hrm_sales_reporting_level rpt ON hqt.EmployeeID=rpt.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$_REQUEST['e']." OR rpt.R1=".$_REQUEST['e']." OR rpt.R2=".$_REQUEST['e']." OR rpt.R3=".$_REQUEST['e']." OR rpt.R4=".$_REQUEST['e']." OR rpt.R5=".$_REQUEST['e'].") AND sd.YearId=".$BeforeYId, $con);*/
 $p3=mysql_query("select SUM(M1) as M1,SUM(M2) as M2,SUM(M3) as M3,SUM(M4) as M4,SUM(M5) as M5,SUM(M6) as M6,SUM(M7) as M7,SUM(M8) as M8,SUM(M9) as M9,SUM(M10) as M10,SUM(M11) as M11,SUM(M12) as M12, SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details sd INNER JOIN hrm_sales_seedsproduct p ON sd.ProductId=p.ProductId INNER JOIN hrm_sales_seedsitem i ON p.ItemId=i.ItemId INNER JOIN hrm_sales_dealer dl ON sd.DealerId=dl.DealerId INNER JOIN hrm_sales_hq_temp hqt ON dl.HqId=hqt.HqId INNER JOIN hrm_sales_reporting_level rpt ON hqt.EmployeeID=rpt.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$_REQUEST['e']." OR rpt.R1=".$_REQUEST['e']." OR rpt.R2=".$_REQUEST['e']." OR rpt.R3=".$_REQUEST['e']." OR rpt.R4=".$_REQUEST['e']." OR rpt.R5=".$_REQUEST['e'].") AND sd.YearId=".$_REQUEST['y'], $con);
} 
/*$r1=mysql_fetch_assoc($p1); $r2=mysql_fetch_assoc($p2);*/ $r3=mysql_fetch_assoc($p3);
/*$r1Tot=$r1['sM1']+$r1['sM2']+$r1['sM3']+$r1['sM4']+$r1['sM5']+$r1['sM6']+$r1['sM7']+$r1['sM8']+$r1['sM9']+$r1['sM10']+$r1['sM11']+$r1['sM12']; 
$r2Tot=$r2['sM1']+$r2['sM2']+$r2['sM3']+$r2['sM4']+$r2['sM5']+$r2['sM6']+$r2['sM7']+$r2['sM8']+$r2['sM9']+$r2['sM10']+$r2['sM11']+$r2['sM12'];*/
$r3Tot_Tgt=$r3['M1']+$r3['M2']+$r3['M3']+$r3['M4']+$r3['M5']+$r3['M6']+$r3['M7']+$r3['M8']+$r3['M9']+$r3['M10']+$r3['M11']+$r3['M12']; 
$r3Tot=$r3['sM1']+$r3['sM2']+$r3['sM3']+$r3['sM4']+$r3['sM5']+$r3['sM6']+$r3['sM7']+$r3['sM8']+$r3['sM9']+$r3['sM10']+$r3['sM11']+$r3['sM12']; 

?>   
   
   <tr bgcolor="#fff" style="height:22px;">
    <td colspan="3" align="right"><b>Total:</b>&nbsp;</td>
	<?php /*?><td class="data" align="right"><b><?php echo floatval($r1Tot); ?></b></td>
	<td class="data" align="right"></td>
	
	<td class="data" align="right"><b><?php echo floatval($r2Tot); ?></b></td>
	<td class="data" align="right"></td><?php */?>
	
	<td class="data" align="right" bgcolor="#FF95CA"><b><?php echo floatval($r3Tot_Tgt); ?></b></td>
	<td class="data" align="right" bgcolor="#FF95CA"><input type="text" class="data" id="TotVal_3A" style="width:100%;text-align:right;border:hidden;font-weight:bold;background-color:#FF95CA;" value="0" readonly/></td>
	
	<td class="data" align="right" bgcolor="#FF95CA"><b><?php echo floatval($r3Tot); ?></b></td>
	<td class="data" align="right" bgcolor="#FF95CA"><input type="text" class="data" id="TotVal_3B" style="width:100%;text-align:right;border:hidden;font-weight:bold;background-color:#FF95CA;" value="0" readonly/></td>
   </tr>
<?php  
if($_REQUEST['grp']==1 OR $_REQUEST['grp']==2)
{ $sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where si.GroupId=".$_REQUEST['grp']." order by ItemName ASC, TypeName ASC, ProductName ASC",$con); } 
else { $sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId order by ItemName ASC, TypeName ASC, ProductName ASC",$con); } 
$no=1; while($res=mysql_fetch_array($sql)){ 

/*$p11=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details sd INNER JOIN hrm_sales_dealer dl ON sd.DealerId=dl.DealerId INNER JOIN hrm_sales_hq_temp hqt ON dl.HqId=hqt.HqId INNER JOIN hrm_sales_reporting_level rpt ON hqt.EmployeeID=rpt.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$_REQUEST['e']." OR rpt.R1=".$_REQUEST['e']." OR rpt.R2=".$_REQUEST['e']." OR rpt.R3=".$_REQUEST['e']." OR rpt.R4=".$_REQUEST['e']." OR rpt.R5=".$_REQUEST['e'].") AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$BeforeYId2, $con);
$p22=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details sd INNER JOIN hrm_sales_dealer dl ON sd.DealerId=dl.DealerId INNER JOIN hrm_sales_hq_temp hqt ON dl.HqId=hqt.HqId INNER JOIN hrm_sales_reporting_level rpt ON hqt.EmployeeID=rpt.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$_REQUEST['e']." OR rpt.R1=".$_REQUEST['e']." OR rpt.R2=".$_REQUEST['e']." OR rpt.R3=".$_REQUEST['e']." OR rpt.R4=".$_REQUEST['e']." OR rpt.R5=".$_REQUEST['e'].") AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$BeforeYId, $con);*/
$p33=mysql_query("select SUM(M1) as M1,SUM(M2) as M2,SUM(M3) as M3,SUM(M4) as M4,SUM(M5) as M5,SUM(M6) as M6,SUM(M7) as M7,SUM(M8) as M8,SUM(M9) as M9,SUM(M10) as M10,SUM(M11) as M11,SUM(M12) as M12, SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details sd INNER JOIN hrm_sales_dealer dl ON sd.DealerId=dl.DealerId INNER JOIN hrm_sales_hq_temp hqt ON dl.HqId=hqt.HqId INNER JOIN hrm_sales_reporting_level rpt ON hqt.EmployeeID=rpt.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$_REQUEST['e']." OR rpt.R1=".$_REQUEST['e']." OR rpt.R2=".$_REQUEST['e']." OR rpt.R3=".$_REQUEST['e']." OR rpt.R4=".$_REQUEST['e']." OR rpt.R5=".$_REQUEST['e'].") AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$_REQUEST['y'], $con); 
/*$r11=mysql_fetch_assoc($p11); $r22=mysql_fetch_assoc($p22);*/ $r33=mysql_fetch_assoc($p33);
/*$r1T=$r11['sM1']+$r11['sM2']+$r11['sM3']+$r11['sM4']+$r11['sM5']+$r11['sM6']+$r11['sM7']+$r11['sM8']+$r11['sM9']+$r11['sM10']+$r11['sM11']+$r11['sM12']; 
$r2T=$r22['sM1']+$r22['sM2']+$r22['sM3']+$r22['sM4']+$r22['sM5']+$r22['sM6']+$r22['sM7']+$r22['sM8']+$r22['sM9']+$r22['sM10']+$r22['sM11']+$r22['sM12']; */

$r3T_Tgt=$r33['M1']+$r33['M2']+$r33['M3']+$r33['M4']+$r33['M5']+$r33['M6']+$r33['M7']+$r33['M8']+$r33['M9']+$r33['M10']+$r33['M11']+$r33['M12'];
$r3T=$r33['sM1']+$r33['sM2']+$r33['sM3']+$r33['sM4']+$r33['sM5']+$r33['sM6']+$r33['sM7']+$r33['sM8']+$r33['sM9']+$r33['sM10']+$r33['sM11']+$r33['sM12']; 

if($r3T_Tgt!=0 OR $r3T!=0)
{

include("sp/employee/Nrv3.php");
$Net4=$r33['M1']*$Nrv4; $Net5=$r33['M2']*$Nrv5; $Net6=$r33['M3']*$Nrv6; $Net7=$r33['M4']*$Nrv7; 
$Net8=$r33['M5']*$Nrv8; $Net9=$r33['M6']*$Nrv9; $Net10=$r33['M7']*$Nrv10; $Net11=$r33['M8']*$Nrv11; 
$Net12=$r33['M9']*$Nrv12; $Net1=$r33['M10']*$Nrv1; $Net2=$r33['M11']*$Nrv2; $Net3=$r33['M12']*$Nrv3; 
$r3T_TgtV=$Net4+$Net5+$Net6+$Net7+$Net8+$Net9+$Net10+$Net11+$Net12+$Net1+$Net2+$Net3; $Tgt_v3=$r3T_TgtV/100000;

$Net4a=$r33['sM1']*$Nrv4; $Net5a=$r33['sM2']*$Nrv5; $Net6a=$r33['sM3']*$Nrv6; $Net7a=$r33['sM4']*$Nrv7; 
$Net8a=$r33['sM5']*$Nrv8; $Net9a=$r33['sM6']*$Nrv9; $Net10a=$r33['sM7']*$Nrv10; $Net11a=$r33['sM8']*$Nrv11; 
$Net12a=$r33['sM9']*$Nrv12; $Net1a=$r33['sM10']*$Nrv1; $Net2a=$r33['sM11']*$Nrv2; $Net3a=$r33['sM12']*$Nrv3; 
$r3TV=$Net4a+$Net5a+$Net6a+$Net7a+$Net8a+$Net9a+$Net10a+$Net11a+$Net12a+$Net1a+$Net2a+$Net3a; $Ach_v3=$r3TV/100000;

?>   
   <tr bgcolor="#fff" style="height:22px;">
    <td align="center"><?php echo $no; ?></td>
	<td class="data"><?php echo $res['ItemName']; ?></td>
	<td class="data"><?php echo $res['ProductName']; ?></td>
	<?php /*?><td class="data" align="right"><?php echo floatval($r1T); ?></td>
	<td class="data" align="right"></td>
	
	<td class="data" align="right"><?php echo floatval($r2T); ?></td>
	<td class="data" align="right"></td><?php */?>
	
	<td class="data" align="right"><?php echo floatval($r3T_Tgt); ?></td>
	<td class="data" align="right"><?php echo round($Tgt_v3,4); ?>
	<?php if($Tgt_v3>0){$valA=$Tgt_v3;}else{$valA=0;} echo '<script>Fun3ATotal('.$valA.');</script>'; ?></td>
	
	<td class="data" align="right"><?php echo floatval($r3T); ?></td>
	<td class="data" align="right"><?php echo round($Ach_v3,4); ?>
	<?php if($Ach_v3>0){$valB=$Ach_v3;}else{$valB=0;} echo '<script>Fun3BTotal('.$valB.');</script>'; ?></td>
   </tr>
<?php $no++; } ?>  
<?php } ?> 
  </table>
 </td>
</tr>
</table>
</center>  
</body>
</html>




