<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> /*background-color:#D9D9FF;  background-color:#EEEEEE; */
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; height:18px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.InputB{font-size:13px;width:60px;text-align:right;border:0px;font-weight:bold;background-color:#D9D9FF;} 
.Input{font-size:13px;width:60px;text-align:right;border:0px;background-color:#EEEEEE;}
.TInput{font-size:13px;width:60px;text-align:right;border:0px;background-color:#FFFFA6;font-weight:bold;}
.Trh60{text-align:center;width:60px;font-weight:bold;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script language="javascript">

function ChangrYear(YearV)
{
  var CropGrp=document.getElementById("CropGrp").value; var ii=document.getElementById("ItemV").value; var ci=document.getElementById("ComId").value;
  window.location="AltPro.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&grp="+CropGrp+"&ii="+ii; 
}
function ClickGrp(CropGrp)
{
  var YearV=document.getElementById("YearV").value; var ii=0; var ci=document.getElementById("ComId").value;
  window.location="AltPro.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&grp="+CropGrp+"&ii="+ii; 
}
function ChangeII(ii)
{
  var YearV=document.getElementById("YearV").value; var CropGrp=document.getElementById("CropGrp").value; var ci=document.getElementById("ComId").value;
  window.location="AltPro.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&grp="+CropGrp+"&ii="+ii; 
}

function PrintSpR()
{ var YearV=document.getElementById("YearV").value; var CropGrp=document.getElementById("CropGrp").value; var ci=document.getElementById("ComId").value;
  var ii=document.getElementById("ItemV").value; 
  window.open("SalesPlanRPrint.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&grp="+CropGrp+"&ii="+ii,"PrintForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=100,height=100");
}

function editD(p,s,f)
{ document.getElementById("E"+s+"_"+f).style.display='none'; document.getElementById("S"+s+"_"+f).style.display='block'; 
  document.getElementById("Pa"+s+"_"+f).readOnly=false;
}

</Script>
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
<input type="hidden" id="ComId" value="<?php echo $_REQUEST['ci']; ?>" />
<input type="hidden" id="UserId" value="<?php echo $UserId; ?>" />		  
<table border="0" style="margin-top:0px; width:100%; height:150px;">	
<tr>
 <td valign="top">
  <table border="0">
   <tr>
    <td id="Entry" valign="top" style="width:900px; ">
	<span id="TabEntry">
     <table border="0">
      <tr>
	    <td style="margin-top:0px;width:200px;" class="heading" align="center"><u>Farmer Allotment</u></td>
	    <td style="font-size:11px;height:18px;width:90px;color:#E6E6E6;" align="right"><b>Year :</b></td>
	    <td><select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="YearV" id="YearV" onChange="ChangrYear(this.value)"> 
<?php $sqly=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['y'], $con); $resy=mysql_fetch_assoc($sqly); 
      $fromdate=date("Y",strtotime($resy['FromDate'])); $todate=date("Y",strtotime($resy['ToDate'])); 
	  $NextYear=$_REQUEST['y']+1; $PrevYear=$_REQUEST['y']-1; 
	  $sqly2=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$NextYear, $con); $resy2=mysql_fetch_assoc($sqly2);
	  $sqly3=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$PrevYear, $con); $resy3=mysql_fetch_assoc($sqly3); ?>		
 <option value="<?php echo $_REQUEST['y']; ?>" selected><?php echo $fromdate.'-'.$todate; ?></option>
 <?php if($PrevYear>=1){?><option value="<?php echo $PrevYear; ?>"><?php echo date("Y",strtotime($resy3['FromDate'])).'-'.date("Y",strtotime($resy3['ToDate'])); ?></option><?php } ?><option value="<?php echo $NextYear; ?>"><?php echo date("Y",strtotime($resy2['FromDate'])).'-'.date("Y",strtotime($resy2['ToDate'])); ?></option></select>
       </td>
	   <td>&nbsp;</td>
	   <td style="font-size:11px;height:18px;width:80px;color:#E6E6E6;" align="right"><b>Crop :</b></td>
	    <td>
		 <select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="CropGrp" id="CropGrp" onChange="ClickGrp(this.value)">
<?php if($_REQUEST['grp']==0){ ?><option value="0" selected>SELECT CROP</option><option value="1">VEGETABLE CROP</option>
                                 <option value="2">FIELD CROP</option><option value="3">All CROP</option>		 
<?php }elseif($_REQUEST['grp']==1){ ?><option value="1" selected>VEGETABLE CROP</option><option value="2">FIELD CROP</option><option value="3">All CROP</option>
<?php }elseif($_REQUEST['grp']==2){ ?><option value="2" selected>FIELD CROP</option><option value="1">VEGETABLE CROP</option><option value="3">All CROP</option>
<?php }elseif($_REQUEST['grp']==3){ ?><option value="3" selected>All CROP</option><option value="1">VEGETABLE CROP</option><option value="2">FIELD CROP</option><?php } ?>
        </select>
		</td>
		<td>&nbsp;</td>
		<td style="font-size:11px; height:18px;width:80px;color:#E6E6E6;" align="right"><b>Name :</b></td>
	     <td>
		 <select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="ItemV" id="ItemV" onChange="ChangeII(this.value)">
<?php if($_REQUEST['ii']>0){ $sqlI=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resI=mysql_fetch_assoc($sqlI); ?>	
         <option value="<?php echo $_REQUEST['ii']; ?>" selected><?php echo strtoupper($resI['ItemName']); ?></option>
		 <?php }else{ ?><option value="0" selected>SELECT</option><?php } ?>
<?php if($_REQUEST['grp']==1){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem where GroupId=1 order by ItemName ASC", $con);}
      elseif($_REQUEST['grp']==2){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem where GroupId=2 order by ItemName ASC", $con);}
      elseif($_REQUEST['grp']==3){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem where (GroupId=1 OR GroupId=2) order by GroupId ASC,ItemName ASC", $con);}
	  while($resItem=mysql_fetch_assoc($sqlItem)){ ?><option value="<?php echo $resItem['ItemId']; ?>"><?php echo $resItem['ItemName']; ?></option><?php } ?>
	     </select>	  
		 </td>
		 <td>&nbsp;</td>
		 <td style="font-size:11px; height:18px;width:80px;color:#E6E6E6;" align="center"><a href="#" <?php //onClick="PrintSpR()" ?> style="color:#FFCE9D;"><b>PRINT</b></a></td>
	  </tr>
	   </table>
      </td>
   </tr>
  </table>
  </td>
  </tr>
  <tr>
    <td colspan="3" valign="top">
<?php if($_REQUEST['grp']>0){ 
$BeforeYId2=$_REQUEST['y']-2; $BeforeYId=$_REQUEST['y']-1; $AfterYId=$_REQUEST['y']+1; 	
$sqlY1=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$BeforeYId2, $con); $resY1=mysql_fetch_assoc($sqlY1); 
$sqlY2=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$BeforeYId, $con); $resY2=mysql_fetch_assoc($sqlY2); 
$sqlY3=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$_REQUEST['y'], $con); $resY3=mysql_fetch_assoc($sqlY3); 
$sqlY4=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$AfterYId, $con); $resY4=mysql_fetch_assoc($sqlY4);
$y1=date("y",strtotime($resY1['FromDate'])).'-'.date("y",strtotime($resY1['ToDate'])); $y1T='<font color="#A60053">Ach.</font>';
$y2=date("y",strtotime($resY2['FromDate'])).'-'.date("y",strtotime($resY2['ToDate'])); $y2T='<font color="#A60053">Ach.</font>';
$y3=date("y",strtotime($resY3['FromDate'])).'-'.date("y",strtotime($resY3['ToDate'])); $y3T='<font color="#A60053">Tgt.</font>';
$y4=date("y",strtotime($resY4['FromDate'])).'-'.date("y",strtotime($resY4['ToDate'])); $y4T='<font color="#A60053">Proj.</font>';
$y5=date("y",strtotime($resY3['FromDate'])).'-'.date("y",strtotime($resY3['ToDate'])); $y5T='<font color="#A60053">YTD.</font>';
$my1='<font color="#A60053">'.date("y",strtotime($resY3['FromDate'])).'</font>'; $my2='<font color="#A60053">'.date("y",strtotime($resY3['ToDate'])).'</font>';
?>  
<table border="0" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;vertical-align:top;">	
<?php if($_REQUEST['ii']>0){$sql = mysql_query("select ItemId,ItemName,GroupId from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii']." order by ItemName ASC", $con); }
      else { if($_REQUEST['grp']==1 OR $_REQUEST['grp']==2){$sql = mysql_query("select ItemId,ItemName,GroupId from hrm_sales_seedsitem where GroupId=".$_REQUEST['grp']." order by ItemName ASC", $con);} if($_REQUEST['grp']==3){$sql = mysql_query("select ItemId,ItemName,GroupId from hrm_sales_seedsitem order by ItemName ASC", $con);} }
	  while($res=mysql_fetch_array($sql)){ ?>
<?php //Start Item/ ?>	  
  <tr style="color:#000000;">
   <td>
     <table border="1" cellpadding="0" cellspacing="0" style="width:850px;">
      <?php $sql2 = mysql_query("select ProductId,ProductName from hrm_sales_seedsproduct where ItemId=".$res['ItemId']." order by ProductName ASC", $con); 
      while($res2=mysql_fetch_array($sql2)){ ?>	
<?php //Start Product/ ?>	    
	  <tr>
	   <td>
	    <table border="0" cellpadding="0" cellspacing="0">
<tr><td style="color:#FFFFCA;background-color:#808000;">&nbsp;&nbsp;<b><?php echo $res['ItemName'].'-<font color="#FFFFFF">'.$res2['ProductName'].'</font>'; ?></b></td></tr>
		   <tr>
		    <td>
			 <table border="1" bgcolor="#FFFFFF">
			 <tr style="background-color:#D5F1D1;color:#000000;">
			  <td align="center" style="width:200px;"><b>Season</b></td>
			  <td align="center" style="width:100px;"><b>Area</b></td>
			  <td align="center" style="width:200px;"><b>Farmer Name</b></td>
	          <td align="center" style="width:100px;"><b>Acreage</b></td>
	          <td align="center" style="width:100px;"><b>Prd<sup>n</sup> Per Acr.</td>
	          <td align="center" style="width:100px;"><b>Total <b>Prd<sup>n</sup></b></td>
			  <td align="center" style="width:50px;"><b>Edit</b></td>
			  </tr>
			  <?php $sql4 = mysql_query("select hrm_sales_product_details.AreaId,hrm_sales_product_details.SeasonId,AreaName,FarmerId,FarmerName,Acreage,SeasonName from hrm_sales_product_details INNER JOIN hrm_sales_areavillage ON hrm_sales_product_details.AreaId=hrm_sales_areavillage.AreaId INNER JOIN hrm_sales_farmer ON hrm_sales_product_details.AreaId=hrm_sales_farmer.AreaId INNER JOIN hrm_sales_season ON hrm_sales_product_details.SeasonId=hrm_sales_season.SeasonId where hrm_sales_product_details.ProductId=".$res2['ProductId']." order by SeasonName ASC,AreaName ASC,FarmerName ASC", $con); 
              while($res4=mysql_fetch_array($sql4)){ ?>
		      <?php //Start Farmer/ ?>		
			  <tr>
			   <td>&nbsp;<?php echo ucfirst(strtolower($res4['SeasonName'])); ?></td>
			   <td>&nbsp;<?php echo ucfirst(strtolower($res4['AreaName'])); ?></td>
			   <td>&nbsp;<?php echo ucfirst(strtolower($res4['FarmerName'])); ?></td>
			   <td align="right"><?php echo $res4['Acreage']; ?>&nbsp;</td>
			   <td align="center"><input style="width:98px;height:20px;" id="Pa<?php echo $res4['SeasonId'].'_'.$res4['FarmerId']; ?>" value="" readonly/></td>
			   <td align="center"><input style="width:98px;height:20px;" id="Ta<?php echo $res4['SeasonId'].'_'.$res4['FarmerId']; ?>" value="" readonly/></td>
			   <td align="center"><img src="images/edit.png" id="E<?php echo $res4['SeasonId'].'_'.$res4['FarmerId']; ?>" onClick="editD(<?php echo $res2['ProductId'].', '.$res4['SeasonId'].','.$res4['FarmerId']; ?>)" style="display:block;"><img src="images/Floppy-Small-icon.png" id="S<?php echo $res4['SeasonId'].'_'.$res4['FarmerId']; ?>" onClick="saveD(<?php echo $res2['ProductId'].','.$res4['SeasonId'].','.$res4['FarmerId']; ?>)" style="display:none;"></td>
			  </tr>
			  <?php //Close Farmer ?>	
		      <?php } ?>		
		</table>
	   </td>
	  </tr>
<?php //Close Product/ ?>		  
	  <?php } ?>  
	 </table>
   </td>
  </tr>
<?php //Close Item/ ?>   	
  <?php } ?> 
</table>	       
<?php } ?>
    </td>
   </tr>   	
  </table>
 </td>
</tr>
</table>
		
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************END*****END*****END******END******END***************************************************************?>
<?php //************************************************************************************************************************************************************?>
		
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>

</html>
