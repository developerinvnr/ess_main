<?php session_start();
if($_SESSION['login'] = true){require_once('../../Employee/sp/user/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
$EmployeeId=$_SESSION['ID'];
?>

<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<style> /*background-color:#D9D9FF;  background-color:#EEEEEE; */
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; height:18px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.InputB{font-size:12px;width:65px;text-align:right;border:0px;font-weight:bold;background-color:#D9D9FF;} 
.Input{font-size:12px;width:60px;text-align:right;border:0px;background-color:#EEEEEE;}
.TInput{font-size:12px;width:60px;text-align:right;border:0px;background-color:#FFFFA6;font-weight:bold;}
.Th60{text-align:center;width:60px;font-weight:bold;font-size:12px;} .Th80{text-align:center;width:80px;font-weight:bold;font-size:12px;}
.Th40{text-align:center;width:40px;font-weight:bold;font-size:12px;} .Tr60{text-align:center;width:60px;font-weight:bold;font-size:12px;}
.Th50{text-align:center;width:50px;font-weight:bold;font-size:12px;} .Td60{text-align:right;width:60px;font-size:12px;} 
.ChkImg{width:20px;hieght:20px;}
.inner_table { height:300px;overflow-y:auto;width:auto; }
</style>
<Script type="text/javascript">//window.history.forward(1);</Script> 
<script type="text/javascript" language="javascript">
function FChk(v1,v2)
{
 if(v2==1)
 { 
   if(v1==0)
   { document.getElementById("HqWC0").style.display='none'; document.getElementById("HqWC1").style.display='block'; 
     document.getElementById("DisWC0").style.display='block'; document.getElementById("DisWC1").style.display='none';
	 document.getElementById("HqWise").value=0; document.getElementById("DisWise").value=1; 
	 document.getElementById("TD1").style.display='none'; document.getElementById("TD2").style.display='block';
   }
   else if(v1==1)
   { document.getElementById("HqWC0").style.display='block'; document.getElementById("HqWC1").style.display='none'; 
     document.getElementById("DisWC0").style.display='none'; document.getElementById("DisWC1").style.display='block';
	 document.getElementById("HqWise").value=1; document.getElementById("DisWise").value=0;
	 document.getElementById("TD1").style.display='block'; document.getElementById("TD2").style.display='none';
   }
 }
 else if(v2==2)
 {  
   if(v1==0)
   { document.getElementById("DisWC0").style.display='none'; document.getElementById("DisWC1").style.display='block'; 
     document.getElementById("HqWC0").style.display='block'; document.getElementById("HqWC1").style.display='none';
	 document.getElementById("DisWise").value=0; document.getElementById("HqWise").value=1;
	 document.getElementById("TD2").style.display='none'; document.getElementById("TD1").style.display='block';
   }
   else if(v1==1)
   { document.getElementById("DisWC0").style.display='block'; document.getElementById("DisWC1").style.display='none'; 
     document.getElementById("HqWC0").style.display='none'; document.getElementById("HqWC1").style.display='block';
	 document.getElementById("DisWise").value=1; document.getElementById("HqWise").value=0;
	 document.getElementById("TD2").style.display='block'; document.getElementById("TD1").style.display='none';
   }
 }
}

function FunSelHq(SelHq) 
{ window.location="SalesTReports.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&yi="+document.getElementById("yi").value+"&ci="+document.getElementById("ci").value+"&c="+document.getElementById("c").value+"&s="+document.getElementById("s").value+"&hq="+document.getElementById("hq").value+"&dil="+document.getElementById("dil").value+"&grp="+document.getElementById("grp").value+"&qtr="+document.getElementById("qtr").value+"&ii="+document.getElementById("ii").value+"&Qq1="+document.getElementById("Qq1").value+"&Qq2="+document.getElementById("Qq2").value+"&Qq3="+document.getElementById("Qq3").value+"&Qq4="+document.getElementById("Qq4").value+"&HqWise="+document.getElementById("HqWise").value+"&DisWise="+document.getElementById("DisWise").value+"&SelHq="+SelHq+"&SelDis="+document.getElementById("SelDis").value+"&rpt="+document.getElementById("rpt").value+"&crp="+document.getElementById("crp").value+"&Bclick=0";
}

function FunSelDis(SelDis)
{ window.location="SalesTReports.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&yi="+document.getElementById("yi").value+"&ci="+document.getElementById("ci").value+"&c="+document.getElementById("c").value+"&s="+document.getElementById("s").value+"&hq="+document.getElementById("hq").value+"&dil="+document.getElementById("dil").value+"&grp="+document.getElementById("grp").value+"&qtr="+document.getElementById("qtr").value+"&ii="+document.getElementById("ii").value+"&Qq1="+document.getElementById("Qq1").value+"&Qq2="+document.getElementById("Qq2").value+"&Qq3="+document.getElementById("Qq3").value+"&Qq4="+document.getElementById("Qq4").value+"&HqWise="+document.getElementById("HqWise").value+"&DisWise="+document.getElementById("DisWise").value+"&SelHq="+document.getElementById("SelHq").value+"&SelDis="+SelDis+"&rpt="+document.getElementById("rpt").value+"&crp="+document.getElementById("crp").value+"&Bclick=0";
}

function FunCrp(crp)
{
  window.location="SalesTReports.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&yi="+document.getElementById("yi").value+"&ci="+document.getElementById("ci").value+"&c="+document.getElementById("c").value+"&s="+document.getElementById("s").value+"&hq="+document.getElementById("hq").value+"&dil="+document.getElementById("dil").value+"&grp="+document.getElementById("grp").value+"&qtr="+document.getElementById("qtr").value+"&ii="+document.getElementById("ii").value+"&Qq1="+document.getElementById("Qq1").value+"&Qq2="+document.getElementById("Qq2").value+"&Qq3="+document.getElementById("Qq3").value+"&Qq4="+document.getElementById("Qq4").value+"&HqWise="+document.getElementById("HqWise").value+"&DisWise="+document.getElementById("DisWise").value+"&SelHq="+document.getElementById("SelHq").value+"&SelDis="+document.getElementById("SelDis").value+"&rpt="+document.getElementById("rpt").value+"&crp="+crp+"&Bclick=0";
}

function FunIi(ii)
{
  window.location="SalesTReports.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&yi="+document.getElementById("yi").value+"&ci="+document.getElementById("ci").value+"&c="+document.getElementById("c").value+"&s="+document.getElementById("s").value+"&hq="+document.getElementById("hq").value+"&dil="+document.getElementById("dil").value+"&grp="+document.getElementById("grp").value+"&qtr="+document.getElementById("qtr").value+"&ii="+ii+"&Qq1="+document.getElementById("Qq1").value+"&Qq2="+document.getElementById("Qq2").value+"&Qq3="+document.getElementById("Qq3").value+"&Qq4="+document.getElementById("Qq4").value+"&HqWise="+document.getElementById("HqWise").value+"&DisWise="+document.getElementById("DisWise").value+"&SelHq="+document.getElementById("SelHq").value+"&SelDis="+document.getElementById("SelDis").value+"&rpt="+document.getElementById("rpt").value+"&crp="+document.getElementById("crp").value+"&Bclick=0";
}

function FunYr(yi)
{
  window.location="SalesTReports.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&yi="+yi+"&ci="+document.getElementById("ci").value+"&c="+document.getElementById("c").value+"&s="+document.getElementById("s").value+"&hq="+document.getElementById("hq").value+"&dil="+document.getElementById("dil").value+"&grp="+document.getElementById("grp").value+"&qtr="+document.getElementById("qtr").value+"&ii="+document.getElementById("ii").value+"&Qq1="+document.getElementById("Qq1").value+"&Qq2="+document.getElementById("Qq2").value+"&Qq3="+document.getElementById("Qq3").value+"&Qq4="+document.getElementById("Qq4").value+"&HqWise="+document.getElementById("HqWise").value+"&DisWise="+document.getElementById("DisWise").value+"&SelHq="+document.getElementById("SelHq").value+"&SelDis="+document.getElementById("SelDis").value+"&rpt="+document.getElementById("rpt").value+"&crp="+document.getElementById("crp").value+"&Bclick=0";
}

function FunBtnClick(vv)
{
  var SelHq=document.getElementById("SelHq").value; 
  var SelDis=document.getElementById("SelDis").value; 
  var crp=document.getElementById("crp").value;
  if(vv==1 && SelHq==0){alert("Please select head quarter"); return false; } 
  else if(vv==2 && SelDis==0){alert("Please select dealer name"); return false; }
  else if(crp==0){alert("Please select crop"); return false; }
  else 
  {
    window.location="SalesTReports.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&yi="+document.getElementById("yi").value+"&ci="+document.getElementById("ci").value+"&c="+document.getElementById("c").value+"&s="+document.getElementById("s").value+"&hq="+document.getElementById("hq").value+"&dil="+document.getElementById("dil").value+"&grp="+document.getElementById("grp").value+"&qtr="+document.getElementById("qtr").value+"&ii="+document.getElementById("ii").value+"&Qq1="+document.getElementById("Qq1").value+"&Qq2="+document.getElementById("Qq2").value+"&Qq3="+document.getElementById("Qq3").value+"&Qq4="+document.getElementById("Qq4").value+"&HqWise="+document.getElementById("HqWise").value+"&DisWise="+document.getElementById("DisWise").value+"&SelHq="+document.getElementById("SelHq").value+"&SelDis="+document.getElementById("SelDis").value+"&rpt="+document.getElementById("rpt").value+"&crp="+document.getElementById("crp").value+"&Bclick=1&truvalue=falseok";
  }
}  
 

function FunATotal(v)
{ var A=parseFloat(v); var TotA=parseFloat(document.getElementById("TotVal_A").value);
  document.getElementById("TotVal_A").value=Math.round((A+TotA)*10000)/10000; 
}
function FunBTotal(v)
{ var B=parseFloat(v); var TotB=parseFloat(document.getElementById("TotVal_B").value);
  document.getElementById("TotVal_B").value=Math.round((B+TotB)*10000)/10000; 
}
function FunCTotal(v)
{ var C=parseFloat(v); var TotC=parseFloat(document.getElementById("TotVal_C").value);
  document.getElementById("TotVal_C").value=Math.round((C+TotC)*10000)/10000; 
}
function FunDTotal(v)
{ var D=parseFloat(v); var TotD=parseFloat(document.getElementById("TotVal_D").value);
  document.getElementById("TotVal_D").value=Math.round((D+TotD)*10000)/10000; 
}
function FunETotal(v)
{ var E=parseFloat(v); var TotE=parseFloat(document.getElementById("TotVal_E").value);
  document.getElementById("TotVal_E").value=Math.round((E+TotE)*10000)/10000; 
}

function FunExport(v)
{ 
  window.open("SalesTReportsExport.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&yi="+document.getElementById("yi").value+"&ci="+document.getElementById("ci").value+"&c="+document.getElementById("c").value+"&s="+document.getElementById("s").value+"&hq="+document.getElementById("hq").value+"&dil="+document.getElementById("dil").value+"&grp="+document.getElementById("grp").value+"&qtr="+document.getElementById("qtr").value+"&ii="+document.getElementById("ii").value+"&Qq1="+document.getElementById("Qq1").value+"&Qq2="+document.getElementById("Qq2").value+"&Qq3="+document.getElementById("Qq3").value+"&Qq4="+document.getElementById("Qq4").value+"&HqWise="+document.getElementById("HqWise").value+"&DisWise="+document.getElementById("DisWise").value+"&SelHq="+document.getElementById("SelHq").value+"&SelDis="+document.getElementById("SelDis").value+"&rpt="+document.getElementById("rpt").value+"&crp="+document.getElementById("crp").value+"&Bclick=1&truvalue=falseok&EmpId="+document.getElementById("EmpId").value+"&YId="+document.getElementById("yi").value,"ExpForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");
}

</script>  
</head>
<body class="body">   
<table class="table">
<tr>
 <td>
 <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table> 
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px;">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top">
	     <table border="0" style="width:100%; height:380px; float:none;" cellpadding="0">
		  <tr>
		   <td valign="top"> 
		   
<?php //*********************************************************************** ?>	   
		     <table border="0" id="Activity">
			  <tr>
			     <td id="Anni" valign="top" style="width:5px;"></td>
				 <td colspan="2" width="100%" valign="top">
				  <table border="0">
<?php //********************************** Start ****************************** ?>			
<input type="hidden" id="EmpId" name="EmpId" value="<?php echo $EmployeeId; ?>" /><input type="hidden" name="gi" id="gi" value="<?php echo $resEg['GradeId']; ?>" /><input type="hidden" name="di" id="di" value="<?php echo $resEg['DepartmentId']; ?>" /><input type="hidden" name="hqi" id="hqi" value="<?php echo $resEg['HqId']; ?>" /><input type="hidden" name="ci" id="ci" value="<?php echo $_REQUEST['ci']; ?>" /><input type="hidden" name="YId" id="YId" value="<?php echo $YearId; ?>" /><input type="hidden" name="Qq1" id="Qq1" value="<?php echo $_REQUEST['Qq1']; ?>" /><input type="hidden" name="Qq2" id="Qq2" value="<?php echo $_REQUEST['Qq2']; ?>" /><input type="hidden" name="Qq3" id="Qq3" value="<?php echo $_REQUEST['Qq3']; ?>" /><input type="hidden" name="Qq4" id="Qq4" value="<?php echo $_REQUEST['Qq4']; ?>" /><input type="hidden" name="c" id="c" value="<?php echo $_REQUEST['c']; ?>" /><input type="hidden" name="s" id="s" value="<?php echo $_REQUEST['s']; ?>" /><input type="hidden" name="hq" id="hq" value="<?php echo $_REQUEST['hq']; ?>" /><input type="hidden" name="dil" id="dil" value="<?php echo $_REQUEST['dil']; ?>" /><input type="hidden" name="grp" id="grp" value="<?php echo $_REQUEST['grp']; ?>" /><input type="hidden" name="qtr" id="qtr" value="<?php echo $_REQUEST['qtr']; ?>" /><input type="hidden" name="rpt" id="rpt" value="<?php echo $_REQUEST['rpt']; ?>" /><input type="hidden" name="HqWise" id="HqWise" value="<?php echo $_REQUEST['HqWise']; ?>" /><input type="hidden" name="DisWise" id="DisWise" value="<?php echo $_REQUEST['DisWise']; ?>" /><input type="hidden" id="Bclick" value="<?php echo $_REQUEST['Bclick']; ?>" />
<tr>
 <td colspan="5">
  <table border="0">
  <tr>
   <td>
    <table border="0">
    <tr>
	 <td style="font-family:Times New Roman;font-size:20px;color:#FFFF80;width:140px;">&nbsp;&nbsp;<b><u>Sales Reports:</u></b></td>
	 <td style="width:350px;">
	 <table>
	 <tr>
	 <td style="font-family:Times New Roman;font-size:16px;color:#FF80C0;width:155px;" align="right"><b><i>Head Quarter Wise </i></b></td>
	 <td style="width:30px;">
<img id="HqWC0" src="images/CkbNot.png" onClick="FChk(0,1)" class="ChkImg" style="display:<?php if($_REQUEST['HqWise']==1){echo 'block';}else{echo 'none';} ?>;" />
<img id="HqWC1" src="images/CkbEmpty.png" onClick="FChk(1,1)" class="ChkImg" style="display:<?php if($_REQUEST['HqWise']==0){echo 'block';}else{echo 'none';} ?>;" />
	 </td>
	 <td style="font-family:Times New Roman;font-size:16px;color:#FF80C0;width:130px;" align="right"><b><i>Distributors Wise </i></b></td>
	 <td style="width:30px;">
<img id="DisWC0" src="images/CkbNot.png" border="0" onClick="FChk(0,2)" class="ChkImg" style="display:<?php if($_REQUEST['DisWise']==1){echo 'block';}else{echo 'none';} ?>;" />
<img id="DisWC1" src="images/CkbEmpty.png" border="0" onClick="FChk(1,2)" class="ChkImg" style="display:<?php if($_REQUEST['DisWise']==0){echo 'block';}else{echo 'none';} ?>;" />
	 </td>
	 </tr>
	 </table>
	 </td>
	 <td>&nbsp;</td>
	</tr>
	<tr>
	 <td colspan="7">
<?php /******************************************* Selection Open  ****************************/  ?>	 
<table>
<tr>
 <td id="TD1" style="display:<?php if($_REQUEST['HqWise']==1){echo 'block';}else{echo 'none';} ?>;">
  <table>
   <tr>
    <td>
     <select id="yi" name="yi" style="height:22px;font-family:Times New Roman;font-size:14px;width:100px;background-color:<?php if($_REQUEST['yi']>0){echo '#B6FF6C';}?>;" onChange="FunYr(this.value)" >
	 <?php if($_REQUEST['yi']>0){ $sqlYr1=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['yi'], $con); $resYr1=mysql_fetch_assoc($sqlYr1); ?>
	 <option value="<?php echo $_REQUEST['yi']; ?>"><?php echo date("Y",strtotime($resYr1['FromDate'])).'-'.date("Y",strtotime($resYr1['ToDate'])); ?></option>
	 <?php } else { ?><option value="0">SELECT YEAR</option><?php } ?>
	 <option value="6">2017-2018</option><option value="5">2016-2017</option>
	 <option value="4">2015-2016</option><option value="3">2014-2015</option>
	 </select>
   </td>
   <td style="width:1px;"></td>
    <td>
	 <select id="SelHq" name="SelHq" style="width:200px;height:22px;font-family:Times New Roman;font-size:14px;background-color:<?php if($_REQUEST['SelHq']>0){echo '#B6FF6C';}?>;" onChange="FunSelHq(this.value)">
	 <?php if($_REQUEST['SelHq']>0){ $sqlHq1=mysql_query("select HqName from hrm_headquater where HqId=".$_REQUEST['SelHq'], $con); $resHq1=mysql_fetch_assoc($sqlHq1); ?>
	 <option value="<?php echo $_REQUEST['SelHq']; ?>"><?php echo strtoupper($resHq1['HqName']); ?></option>
	 <?php } else { ?><option value="0">SELECT HEAD QUARTER</option><?php } $sqlHQ=mysql_query("select HqName from hrm_headquater where HqId=".$resE['TLHq'], $con); $resHQ=mysql_fetch_assoc($sqlHQ); ?>
	 <option value="<?php echo $resE['TLHq']; ?>"><?php echo strtoupper($resHQ['HqName']); ?></option> 
	 </select>
	</td>
	<td style="width:1px;"></td>
	<td>
     <select id="crp" name="crp" style="height:22px;font-family:Times New Roman;font-size:14px;width:150px;background-color:<?php if($_REQUEST['crp']>0){echo '#B6FF6C';}?>;" onChange="FunCrp(this.value)" >
     <option value="0" <?php if($_REQUEST['crp']==0){ echo 'selected'; } ?>>SELECT CROP</option>
	 <option value="1" <?php if($_REQUEST['crp']==1){ echo 'selected'; } ?>>VEGETABLE CROP</option>
	 <option value="2" <?php if($_REQUEST['crp']==2){ echo 'selected'; } ?>>FIELD CROP</option>
	 <option value="3" <?php if($_REQUEST['crp']==3){ echo 'selected'; } ?>>ALL CROP</option>
	 </select>
   </td>
   <td style="width:1px;"></td>
	<td>
     <select id="ii" name="ii" style="height:22px;font-family:Times New Roman;font-size:14px;width:150px;background-color:<?php if($_REQUEST['ii']>0){echo '#B6FF6C';}?>;" onChange="FunIi(this.value)" <?php if($_REQUEST['crp']==0){echo 'disabled';} ?>>
	 <?php if($_REQUEST['ii']>0){ $sqlI1=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resI1=mysql_fetch_assoc($sqlI1); ?>
	 <option value="<?php echo $_REQUEST['ii']; ?>"><?php echo strtoupper($resI1['ItemName']); ?></option>
	 <?php } else { ?><option value="0">SELECT ITEMS</option><?php } ?>
	 
	 <?php if($_REQUEST['crp']>0){?>
     <?php if($_REQUEST['crp']==1 OR $_REQUEST['crp']==2){ $sI=mysql_query("select ItemId,ItemName from hrm_sales_seedsitem where GroupId=".$_REQUEST['crp']." order by ItemName ASC", $con); } elseif($_REQUEST['crp']==3){ $sI=mysql_query("select ItemId,ItemName from hrm_sales_seedsitem order by ItemName ASC", $con); }
	 while($rI=mysql_fetch_assoc($sI)){ ?><option value="<?php echo $rI['ItemId']; ?>"><?php echo strtoupper($rI['ItemName']); ?></option><?php } ?>
	 <?php } ?>	
	 </select>
   </td>
   <td style="width:1px;"></td>
   <td><input type="button" style="height:26px;font-family:Times New Roman;font-size:14px;width:100px;background-color:#B6FF6C;font-weight:bold;" onClick="FunBtnClick(1)" value="Click" <?php if($_REQUEST['SelHq']>0 OR $_REQUEST['SelHq']=='All'){echo '';}else{echo 'disabled';} ?> /></td>
   <td style="width:10px;">&nbsp;</td>
   <td><input type="button" style="height:26px;font-family:Times New Roman;font-size:14px;width:100px;background-color:#FFFFA6;font-weight:bold;" onClick="FunExport(1)" value="Export" <?php if($_REQUEST['Bclick']==0){echo 'disabled';} ?> /></td>
   </tr>
  </table> 
 </td>
 <td id="TD2" style="display:<?php if($_REQUEST['DisWise']==1){echo 'block';}else{echo 'none';} ?>;">
  <table>
   <tr>
    <td>
     <select id="yi" name="yi" style="height:22px;font-family:Times New Roman;font-size:14px;width:100px;background-color:<?php if($_REQUEST['yi']>0){echo '#B6FF6C';}?>;" onChange="FunYr(this.value)" >
	 <?php if($_REQUEST['yi']>0){ $sqlYr1=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['yi'], $con); $resYr1=mysql_fetch_assoc($sqlYr1); ?>
	 <option value="<?php echo $_REQUEST['yi']; ?>"><?php echo date("Y",strtotime($resYr1['FromDate'])).'-'.date("Y",strtotime($resYr1['ToDate'])); ?></option>
	 <?php } else { ?><option value="0">SELECT YEAR</option><?php } ?>
	 <option value="6">2017-2018</option><option value="5">2016-2017</option>
	 <option value="4">2015-2016</option><option value="3">2014-2015</option>
	 </select>
   </td>
   <td style="width:1px;"></td>
    <td>
	 <select id="SelHq" name="SelHq" style="width:200px;height:22px;font-family:Times New Roman;font-size:14px;background-color:<?php if($_REQUEST['SelHq']>0){echo '#B6FF6C';}?>;" onChange="FunSelHq(this.value)">
	 <?php if($_REQUEST['SelHq']>0){ $sqlHq1=mysql_query("select HqName from hrm_headquater where HqId=".$_REQUEST['SelHq'], $con); $resHq1=mysql_fetch_assoc($sqlHq1); ?>
	 <option value="<?php echo $_REQUEST['SelHq']; ?>"><?php echo strtoupper($resHq1['HqName']); ?></option>
	 <?php } else { ?><option value="0">SELECT HEAD QUARTER</option><?php } $sqlHQ=mysql_query("select HqName from hrm_headquater where HqId=".$resE['TLHq'], $con); $resHQ=mysql_fetch_assoc($sqlHQ); ?>
	 <option value="<?php echo $resE['TLHq']; ?>"><?php echo strtoupper($resHQ['HqName']); ?></option> 
	 </select>
	</td>
    <td style="width:1px;"></td>
	<td>
	 <select id="SelDis" name="SelDis" style="width:200px;height:22px;font-family:Times New Roman;font-size:14px;background-color:<?php if($_REQUEST['SelDis']>0){echo '#B6FF6C';}?>;" onChange="FunSelDis(this.value)" <?php if($_REQUEST['SelHq']==0){echo 'disabled';} ?>>
 <?php if($_REQUEST['SelDis']>0){$sqlDis1=mysql_query("select DealerName from hrm_sales_dealer where DealerId=".$_REQUEST['SelDis'], $con); $resDis1=mysql_fetch_assoc($sqlDis1);?>
	 <option value="<?php echo $_REQUEST['SelDis']; ?>"><?php echo strtoupper($resDis1['DealerName']); ?></option>
	 <?php } else { ?><option value="0">SELECT DEALER</option><?php } ?>
	 
     <?php if($_REQUEST['SelHq']>0){ ?>
     <?php $sDis=mysql_query("select DealerId,DealerName from hrm_sales_dealer where HqId=".$_REQUEST['SelHq']." order by DealerName ASC", $con); 
	 while($rDis=mysql_fetch_assoc($sDis)){ ?><option value="<?php echo $rDis['DealerId']; ?>"><?php echo strtoupper($rDis['DealerName']); ?></option><?php } ?>
	 <?php } ?>	 
	 </select>
	</td>
	<td style="width:1px;"></td>
	<td>
     <select id="crp" name="crp" style="height:22px;font-family:Times New Roman;font-size:14px;width:150px;background-color:<?php if($_REQUEST['crp']>0){echo '#B6FF6C';}?>;" onChange="FunCrp(this.value)">
     <option value="0" <?php if($_REQUEST['crp']==0){ echo 'selected'; } ?>>SELECT CROP</option>
	 <option value="1" <?php if($_REQUEST['crp']==1){ echo 'selected'; } ?>>VEGETABLE CROP</option>
	 <option value="2" <?php if($_REQUEST['crp']==2){ echo 'selected'; } ?>>FIELD CROP</option>
	 <option value="3" <?php if($_REQUEST['crp']==3){ echo 'selected'; } ?>>ALL CROP</option>
	 </select>
   </td>
   <td style="width:1px;"></td>
	<td>
     <select id="ii" name="ii" style="height:22px;font-family:Times New Roman;font-size:14px;width:150px;background-color:<?php if($_REQUEST['ii']>0){echo '#B6FF6C';}?>;" onChange="FunIi(this.value)" <?php if($_REQUEST['crp']==0){echo 'disabled';} ?>>
	 <?php if($_REQUEST['ii']>0){ $sqlI1=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resI1=mysql_fetch_assoc($sqlI1); ?>
	 <option value="<?php echo $_REQUEST['ii']; ?>"><?php echo strtoupper($resI1['ItemName']); ?></option>
	 <?php } else { ?><option value="0">SELECT ITEMS</option><?php } ?>
	 
	 <?php if($_REQUEST['crp']>0){?>
     <?php if($_REQUEST['crp']==1 OR $_REQUEST['crp']==2){ $sI=mysql_query("select ItemId,ItemName from hrm_sales_seedsitem where GroupId=".$_REQUEST['crp']." order by ItemName ASC", $con); } elseif($_REQUEST['crp']==3){ $sI=mysql_query("select ItemId,ItemName from hrm_sales_seedsitem order by ItemName ASC", $con); }
	 while($rI=mysql_fetch_assoc($sI)){ ?><option value="<?php echo $rI['ItemId']; ?>"><?php echo strtoupper($rI['ItemName']); ?></option><?php } ?>
	 <?php } ?>	
	 </select>
   </td>
   <td style="width:1px;"></td>
   <td><input type="button" style="height:26px;font-family:Times New Roman;font-size:14px;width:100px;background-color:#B6FF6C;font-weight:bold;" onClick="FunBtnClick(2)" value="Click" <?php if($_REQUEST['SelDis']==0){echo 'disabled';} ?> /></td>
   <td style="width:1px;"></td>
   <td><input type="button" style="height:26px;font-family:Times New Roman;font-size:14px;width:100px;background-color:#FFFFA6;font-weight:bold;" onClick="FunExport(2)" value="Export" <?php if($_REQUEST['Bclick']==0){echo 'disabled';} ?>/></td>
   </tr>
  
  </table> 
 </td>
</tr>
</table>
<?php /******************************************* Selection Close  ****************************/  ?>	   
	 </td>
	</tr>
	<tr>
	<td colspan="10">
<?php $BeforeYId2=$_REQUEST['yi']-2; $BeforeYId=$_REQUEST['yi']-1; $AfterYId=$_REQUEST['yi']+1; 	
$sqlY1=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$BeforeYId2, $con); 
$sqlY2=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$BeforeYId, $con);  
$sqlY3=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$_REQUEST['yi'], $con); 
$sqlY4=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$AfterYId, $con); 
$resY1=mysql_fetch_assoc($sqlY1); $resY2=mysql_fetch_assoc($sqlY2); $resY3=mysql_fetch_assoc($sqlY3); 
$resY4=mysql_fetch_assoc($sqlY4);
$y1=date("y",strtotime($resY1['FromDate'])).'-'.date("y",strtotime($resY1['ToDate'])); 
$y2=date("y",strtotime($resY2['FromDate'])).'-'.date("y",strtotime($resY2['ToDate'])); 
$y1T='<font color="#A60053">Ach.</font>'; $y2T='<font color="#A60053">Ach.</font>';
$y3=date("y",strtotime($resY3['FromDate'])).'-'.date("y",strtotime($resY3['ToDate'])); 
$y4=date("y",strtotime($resY4['FromDate'])).'-'.date("y",strtotime($resY4['ToDate'])); 
$y3T='<font color="#A60053">Tgt.</font>'; $y4T='<font color="#A60053">Proj.</font>';
$y5=date("y",strtotime($resY3['FromDate'])).'-'.date("y",strtotime($resY3['ToDate']));
$y5T='<font color="#A60053">YTD.</font>'; 
$my1='<font color="#A60053">'.date("y",strtotime($resY3['FromDate'])).'</font>'; 
$my2='<font color="#A60053">'.date("y",strtotime($resY3['ToDate'])).'</font>';
$fy1=date("Y",strtotime($resY1['FromDate'])); $ty1=date("Y",strtotime($resY1['ToDate'])); 
$fy2=date("Y",strtotime($resY2['FromDate'])); $ty2=date("Y",strtotime($resY2['ToDate'])); 
$fy3=date("Y",strtotime($resY3['FromDate'])); $ty3=date("Y",strtotime($resY3['ToDate'])); 
$fy4=date("Y",strtotime($resY4['FromDate'])); $ty4=date("Y",strtotime($resY4['ToDate'])); 
$fy5=date("Y",strtotime($resY3['FromDate'])); $ty5=date("Y",strtotime($resY3['ToDate'])); 
?>  	
<?php /******************************************* Result Open  ****************************/  ?>
<?php if($_REQUEST['Bclick']==1){ ?>

<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;width:1251px; vertical-align:top;">	
   <?php /////////////////////////////////////////////////////////// ---TOTAL TOTAL TOTAL TOTAL TOTAL TOTAL OPEN OPEN?>
<thead>   
<tr style="height:22px;background-color:#D5F1D1;">
 <td colspan="5" align="center" style="font-size:12px;font-weight:bold;background-color:#FFFF80;width:320px;">
 <?php if($_REQUEST['HqWise']>0){echo 'HEAD QUATER WISE';} elseif($_REQUEST['DisWise']>0){echo 'DISTRIBUTORES WISE';} ?>
 </td>
 <td class="Th60">APR</td><td class="Th60">MAY</td><td class="Th60">JUN</td><td class="Th60" bgcolor="#FAD25A">Q1</td>
 <td class="Th60">JUL</td><td class="Th60">AUG</td><td class="Th60">SEP</td><td class="Th60" bgcolor="#FAD25A">Q2</td>
 <td class="Th60">OCT</td><td class="Th60">NOV</td><td class="Th60">DEC</td><td class="Th60" bgcolor="#FAD25A">Q3</td>
 <td class="Th60">JAN</td><td class="Th60">FEB</td><td class="Th60">MAR</td><td class="Th60" bgcolor="#FAD25A">Q4</td>
 <td class="Th60"><b>Total KG</b></td>
 <td class="Th60"><b>Total Value</b></td>
 <td style="width:23px;" rowspan="8"></td>
</tr>
<?php for($i=1; $i<=5; $i++){ ?>
<tr style="height:22px;background-color:<?php if($i==5){echo '#D2E9FF';}else{echo '#EEEEEE'; } ?>;"> 
 <?php if($i==1){ ?>
 <td rowspan="5" colspan="3" bgcolor="<?php if($i==1){echo '#B8E29C';}?>" align="right" style="font-size:15px;"><b><?php if($i==1){?>TOTAL:<?php } ?></b>&nbsp;</td><?php } ?>   	
<?php /*1*/ if($i==1){

if($_REQUEST['HqWise']>0)
{
 if($_REQUEST['SelHq']>0)
 {
 if($_REQUEST['ii']>0){ $sqlP1d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId where hrm_sales_sal_details.YearId=".$BeforeYId2." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_dealer.HqId=".$_REQUEST['SelHq'], $con); } 
 else{ if($_REQUEST['crp']==1 OR $_REQUEST['crp']==2){ $sqlP1d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId where hrm_sales_seedsitem.GroupId=".$_REQUEST['crp']." AND hrm_sales_sal_details.YearId=".$BeforeYId2." AND hrm_sales_dealer.HqId=".$_REQUEST['SelHq'], $con); } 
 if($_REQUEST['crp']==3){ $sqlP1d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId where hrm_sales_sal_details.YearId=".$BeforeYId2." AND hrm_sales_dealer.HqId=".$_REQUEST['SelHq'], $con); }  } 
 }
 if($_REQUEST['SelHq']=='All')
 {
 if($_REQUEST['ii']>0){  $sqlP1d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_tlemp ON hrm_sales_dealer.HqId=hrm_sales_tlemp.TLHq where TLStatus='A' AND hrm_sales_tlemp.TLEId=".$EmployeeId." AND hrm_sales_sal_details.YearId=".$BeforeYId2." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii'], $con); } 
 else{ if($_REQUEST['crp']==1 OR $_REQUEST['crp']==2){ $sqlP1d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_tlemp ON hrm_sales_dealer.HqId=hrm_sales_tlemp.TLHq where TLStatus='A' AND hrm_sales_tlemp.TLEId=".$EmployeeId." AND hrm_sales_sal_details.YearId=".$BeforeYId2." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crp'], $con); } 
 if($_REQUEST['crp']==3){ $sqlP1d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_tlemp ON hrm_sales_dealer.HqId=hrm_sales_tlemp.TLHq where TLStatus='A' AND hrm_sales_tlemp.TLEId=".$EmployeeId." AND hrm_sales_sal_details.YearId=".$BeforeYId2, $con); }  } 
 }
 
}

elseif($_REQUEST['DisWise']>0)
{
 if($_REQUEST['ii']>0){ $sqlP1d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_sal_details.YearId=".$BeforeYId2." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details.DealerId=".$_REQUEST['SelDis'], $con); } 
 else{ if($_REQUEST['crp']==1 OR $_REQUEST['crp']==2){ $sqlP1d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where hrm_sales_seedsitem.GroupId=".$_REQUEST['crp']." AND hrm_sales_sal_details.YearId=".$BeforeYId2." AND hrm_sales_sal_details.DealerId=".$_REQUEST['SelDis'], $con); } if($_REQUEST['crp']==3){ $sqlP1d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details where YearId=".$BeforeYId2." AND DealerId=".$_REQUEST['SelDis'], $con); } } 
}


$res1=mysql_fetch_assoc($sqlP1d); 
$res1Tot=$res1['sM1']+$res1['sM2']+$res1['sM3']+$res1['sM4']+$res1['sM5']+$res1['sM6']+$res1['sM7']+$res1['sM8']+$res1['sM9']+$res1['sM10']+$res1['sM11']+$res1['sM12'];
$TotQ1=$res1['sM1']+$res1['sM2']+$res1['sM3']; $TotQ2=$res1['sM4']+$res1['sM5']+$res1['sM6'];
$TotQ3=$res1['sM7']+$res1['sM8']+$res1['sM9']; $TotQ4=$res1['sM10']+$res1['sM11']+$res1['sM12']; 
?>
  <td class="Th40"><b><?php echo $y1T; ?></b></td><td class="Th40"><b><?php echo $y1; ?></b></td>
  <td class="Td60"><?php if($res1['sM1']!=0){echo floatval($res1['sM1']);} ?></td><td class="Td60"><?php if($res1['sM2']!=0){echo floatval($res1['sM2']);} ?></td>
  <td class="Td60"><?php if($res1['sM3']!=0){echo floatval($res1['sM3']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($TotQ1!=0){echo floatval($TotQ1);} ?></td>
  <td class="Td60"><?php if($res1['sM4']!=0){echo floatval($res1['sM4']);} ?></td><td class="Td60"><?php if($res1['sM5']!=0){echo floatval($res1['sM5']);} ?></td>
  <td class="Td60"><?php if($res1['sM6']!=0){echo floatval($res1['sM6']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($TotQ2!=0){echo floatval($TotQ2);} ?></td>
  <td class="Td60"><?php if($res1['sM7']!=0){echo floatval($res1['sM7']);} ?></td><td class="Td60"><?php if($res1['sM8']!=0){echo floatval($res1['sM8']);} ?></td>
  <td class="Td60"><?php if($res1['sM9']!=0){echo floatval($res1['sM9']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($TotQ3!=0){echo floatval($TotQ3);} ?></td>
  <td class="Td60"><?php if($res1['sM10']!=0){echo floatval($res1['sM10']);} ?></td><td class="Td60"><?php if($res1['sM11']!=0){echo floatval($res1['sM11']);} ?></td>
  <td class="Td60"><?php if($res1['sM12']!=0){echo floatval($res1['sM12']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($TotQ4!=0){echo floatval($TotQ4);} ?></td>
  <td class="Td60"><b><?php if($res1Tot!=0){echo floatval($res1Tot);} ?></b></td> 
 <td class="Td60"><input type="text" id="TotVal_A" style="width:60px;height:20px;text-align:right;font-size:11px;" value="0" readonly/></td>
	 
<?php } /*2*/  if($i==2){ 

if($_REQUEST['HqWise']>0)
{
 if($_REQUEST['SelHq']>0)
 {
 if($_REQUEST['ii']>0){ $sqlP2d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId where hrm_sales_sal_details.YearId=".$BeforeYId." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_dealer.HqId=".$_REQUEST['SelHq'], $con); } 
 else{ if($_REQUEST['crp']==1 OR $_REQUEST['crp']==2){ $sqlP2d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId where hrm_sales_seedsitem.GroupId=".$_REQUEST['crp']." AND hrm_sales_sal_details.YearId=".$BeforeYId." AND hrm_sales_dealer.HqId=".$_REQUEST['SelHq'], $con); } 
 if($_REQUEST['crp']==3){ $sqlP2d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId where hrm_sales_sal_details.YearId=".$BeforeYId." AND hrm_sales_dealer.HqId=".$_REQUEST['SelHq'], $con); }  }
 } 
 if($_REQUEST['SelHq']=='All')
 {
 if($_REQUEST['ii']>0){  $sqlP2d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_tlemp ON hrm_sales_dealer.HqId=hrm_sales_tlemp.TLHq where TLStatus='A' AND hrm_sales_tlemp.TLEId=".$EmployeeId." AND hrm_sales_sal_details.YearId=".$BeforeYId." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii'], $con); } 
 else{ if($_REQUEST['crp']==1 OR $_REQUEST['crp']==2){ $sqlP2d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_tlemp ON hrm_sales_dealer.HqId=hrm_sales_tlemp.TLHq where TLStatus='A' AND hrm_sales_tlemp.TLEId=".$EmployeeId." AND hrm_sales_sal_details.YearId=".$BeforeYId." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crp'], $con); } 
 if($_REQUEST['crp']==3){ $sqlP2d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_tlemp ON hrm_sales_dealer.HqId=hrm_sales_tlemp.TLHq where TLStatus='A' AND hrm_sales_tlemp.TLEId=".$EmployeeId." AND hrm_sales_sal_details.YearId=".$BeforeYId, $con); }  } 
 }
}

elseif($_REQUEST['DisWise']>0)
{
 if($_REQUEST['ii']>0){ $sqlP2d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_sal_details.YearId=".$BeforeYId." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details.DealerId=".$_REQUEST['SelDis'], $con); } 
 else{ if($_REQUEST['crp']==1 OR $_REQUEST['crp']==2){ $sqlP2d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where hrm_sales_seedsitem.GroupId=".$_REQUEST['crp']." AND hrm_sales_sal_details.YearId=".$BeforeYId." AND hrm_sales_sal_details.DealerId=".$_REQUEST['SelDis'], $con); } if($_REQUEST['crp']==3){ $sqlP2d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details where YearId=".$BeforeYId." AND DealerId=".$_REQUEST['SelDis'], $con); } } 
}

$res2=mysql_fetch_assoc($sqlP2d);
$res2Tot=$res2['sM1']+$res2['sM2']+$res2['sM3']+$res2['sM4']+$res2['sM5']+$res2['sM6']+$res2['sM7']+$res2['sM8']+$res2['sM9']+$res2['sM10']+$res2['sM11']+$res2['sM12']; 
$Tot2Q1=$res2['sM1']+$res2['sM2']+$res2['sM3']; $Tot2Q2=$res2['sM4']+$res2['sM5']+$res2['sM6'];
$Tot2Q3=$res2['sM7']+$res2['sM8']+$res2['sM9']; $Tot2Q4=$res2['sM10']+$res2['sM11']+$res2['sM12'];
?>
  <td class="Th40"><b><?php echo $y2T; ?></b></td><td class="Th40"><b><?php echo $y2; ?></b></td>
  <td class="Td60"><?php if($res2['sM1']!=0){echo floatval($res2['sM1']);} ?></td><td class="Td60"><?php if($res2['sM2']!=0){echo floatval($res2['sM2']);} ?></td>
  <td class="Td60"><?php if($res2['sM3']!=0){echo floatval($res2['sM3']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot2Q1!=0){echo floatval($Tot2Q1);} ?></td>
  <td class="Td60"><?php if($res2['sM4']!=0){echo floatval($res2['sM4']);} ?></td><td class="Td60"><?php if($res2['sM5']!=0){echo floatval($res2['sM5']);} ?></td>
  <td class="Td60"><?php if($res2['sM6']!=0){echo floatval($res2['sM6']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot2Q2!=0){echo floatval($Tot2Q2);} ?></td>
  <td class="Td60"><?php if($res2['sM7']!=0){echo floatval($res2['sM7']);} ?></td><td class="Td60"><?php if($res2['sM8']!=0){echo floatval($res2['sM8']);} ?></td>
  <td class="Td60"><?php if($res2['sM9']!=0){echo floatval($res2['sM9']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot2Q3!=0){echo floatval($Tot2Q3);} ?></td>
  <td class="Td60"><?php if($res2['sM10']!=0){echo floatval($res2['sM10']);} ?></td><td class="Td60"><?php if($res2['sM11']!=0){echo floatval($res2['sM11']);} ?></td>
  <td class="Td60"><?php if($res2['sM12']!=0){echo floatval($res2['sM12']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot2Q4!=0){echo floatval($Tot2Q4);} ?></td>
  <td class="Td60"><b><?php if($res2Tot!=0){echo floatval($res2Tot);} ?></b></td> 
  <td class="Td60"><input type="text" id="TotVal_B" style="width:60px;height:20px;text-align:right;" value="0" readonly/></td>
	   
<?php } /*3*/  if($i==3){ 

if($_REQUEST['HqWise']>0)
{
 if($_REQUEST['SelHq']>0)
 {
 if($_REQUEST['ii']>0){ $sqlP3d=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId where hrm_sales_sal_details.YearId=".$_REQUEST['yi']." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_dealer.HqId=".$_REQUEST['SelHq'], $con); } 
 else{ if($_REQUEST['crp']==1 OR $_REQUEST['crp']==2){ $sqlP3d=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId where hrm_sales_seedsitem.GroupId=".$_REQUEST['crp']." AND hrm_sales_sal_details.YearId=".$_REQUEST['yi']." AND hrm_sales_dealer.HqId=".$_REQUEST['SelHq'], $con); } 
 if($_REQUEST['crp']==3){ $sqlP3d=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId where hrm_sales_sal_details.YearId=".$_REQUEST['yi']." AND hrm_sales_dealer.HqId=".$_REQUEST['SelHq'], $con); }  } 
 }
 if($_REQUEST['SelHq']=='All')
 {
 if($_REQUEST['ii']>0){  $sqlP3d=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_tlemp ON hrm_sales_dealer.HqId=hrm_sales_tlemp.TLHq where TLStatus='A' AND hrm_sales_tlemp.TLEId=".$EmployeeId." AND hrm_sales_sal_details.YearId=".$_REQUEST['yi']." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii'], $con); } 
 else{ if($_REQUEST['crp']==1 OR $_REQUEST['crp']==2){ $sqlP3d=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_tlemp ON hrm_sales_dealer.HqId=hrm_sales_tlemp.TLHq where TLStatus='A' AND hrm_sales_tlemp.TLEId=".$EmployeeId." AND hrm_sales_sal_details.YearId=".$_REQUEST['yi']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crp'], $con); } 
 if($_REQUEST['crp']==3){ $sqlP3d=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_tlemp ON hrm_sales_dealer.HqId=hrm_sales_tlemp.TLHq where TLStatus='A' AND hrm_sales_tlemp.TLEId=".$EmployeeId." AND hrm_sales_sal_details.YearId=".$_REQUEST['yi'], $con); }  } 
 }
}

elseif($_REQUEST['DisWise']>0)
{
 if($_REQUEST['ii']>0){ $sqlP3d=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_sal_details.YearId=".$_REQUEST['yi']." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details.DealerId=".$_REQUEST['SelDis'], $con); } 
 else{ if($_REQUEST['crp']==1 OR $_REQUEST['crp']==2){ $sqlP3d=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where hrm_sales_seedsitem.GroupId=".$_REQUEST['crp']." AND hrm_sales_sal_details.YearId=".$_REQUEST['yi']." AND hrm_sales_sal_details.DealerId=".$_REQUEST['SelDis'], $con); } if($_REQUEST['crp']==3){ $sqlP3d=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details where YearId=".$_REQUEST['yi']." AND DealerId=".$_REQUEST['SelDis'], $con); } } 
}

$res3=mysql_fetch_assoc($sqlP3d); 
$res3Tot=$res3['sM1']+$res3['sM2']+$res3['sM3']+$res3['sM4']+$res3['sM5']+$res3['sM6']+$res3['sM7']+$res3['sM8']+$res3['sM9']+$res3['sM10']+$res3['sM11']+$res3['sM12']; 
$Tot3Q1=$res3['sM1']+$res3['sM2']+$res3['sM3']; $Tot3Q2=$res3['sM4']+$res3['sM5']+$res3['sM6'];
$Tot3Q3=$res3['sM7']+$res3['sM8']+$res3['sM9']; $Tot3Q4=$res3['sM10']+$res3['sM11']+$res3['sM12'];
?>
  <td class="Th40"><b><?php echo $y3T; ?></b></td><td class="Th40"><b><?php echo $y3; ?></b></td> 
  <td class="Td60"><?php if($res3['sM1']!=0){echo floatval($res3['sM1']);} ?></td><td class="Td60"><?php if($res3['sM2']!=0){echo floatval($res3['sM2']);} ?></td>
  <td class="Td60"><?php if($res3['sM3']!=0){echo floatval($res3['sM3']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot3Q1!=0){echo floatval($Tot3Q1);} ?></td>
  <td class="Td60"><?php if($res3['sM4']!=0){echo floatval($res3['sM4']);} ?></td><td class="Td60"><?php if($res3['sM5']!=0){echo floatval($res3['sM5']);} ?></td>
  <td class="Td60"><?php if($res3['sM6']!=0){echo floatval($res3['sM6']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot3Q2!=0){echo floatval($Tot3Q2);} ?></td>
  <td class="Td60"><?php if($res3['sM7']!=0){echo floatval($res3['sM7']);} ?></td><td class="Td60"><?php if($res3['sM8']!=0){echo floatval($res3['sM8']);} ?></td>
  <td class="Td60"><?php if($res3['sM9']!=0){echo floatval($res3['sM9']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot3Q3!=0){echo floatval($Tot3Q3);} ?></td>
  <td class="Td60"><?php if($res3['sM10']!=0){echo floatval($res3['sM10']);} ?></td><td class="Td60"><?php if($res3['sM11']!=0){echo floatval($res3['sM11']);} ?></td>
  <td class="Td60"><?php if($res3['sM12']!=0){echo floatval($res3['sM12']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot3Q4!=0){echo floatval($Tot3Q4);} ?></td>	 
  <td class="Td60"><b><?php if($res3Tot!=0){echo floatval($res3Tot);} ?></b></td>
 <td class="Td60"><input type="text" id="TotVal_C" style="width:60px;height:20px;text-align:right;" value="0" readonly/></td>
	     
<?php } /*4*/   if($i==4){ 

if($_REQUEST['HqWise']>0)
{
 if($_REQUEST['SelHq']>0)
 {
 if($_REQUEST['ii']>0){ $sqlP4d=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId where hrm_sales_sal_details.YearId=".$AfterYId." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_dealer.HqId=".$_REQUEST['SelHq'], $con); } 
 else{ if($_REQUEST['crp']==1 OR $_REQUEST['crp']==2){ $sqlP4d=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId where hrm_sales_seedsitem.GroupId=".$_REQUEST['crp']." AND hrm_sales_sal_details.YearId=".$AfterYId." AND hrm_sales_dealer.HqId=".$_REQUEST['SelHq'], $con); } 
 if($_REQUEST['crp']==3){ $sqlP4d=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId where hrm_sales_sal_details.YearId=".$AfterYId." AND hrm_sales_dealer.HqId=".$_REQUEST['SelHq'], $con); }  } 
 }
 if($_REQUEST['SelHq']=='All')
 {
 if($_REQUEST['ii']>0){  $sqlP4d=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_tlemp ON hrm_sales_dealer.HqId=hrm_sales_tlemp.TLHq where TLStatus='A' AND hrm_sales_tlemp.TLEId=".$EmployeeId." AND hrm_sales_sal_details.YearId=".$AfterYId." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii'], $con); } 
 else{ if($_REQUEST['crp']==1 OR $_REQUEST['crp']==2){ $sqlP4d=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_tlemp ON hrm_sales_dealer.HqId=hrm_sales_tlemp.TLHq where TLStatus='A' AND hrm_sales_tlemp.TLEId=".$EmployeeId." AND hrm_sales_sal_details.YearId=".$AfterYId." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crp'], $con); } 
 if($_REQUEST['crp']==3){ $sqlP4d=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_tlemp ON hrm_sales_dealer.HqId=hrm_sales_tlemp.TLHq where TLStatus='A' AND hrm_sales_tlemp.TLEId=".$EmployeeId." AND hrm_sales_sal_details.YearId=".$AfterYId, $con); }  } 
 }
}

elseif($_REQUEST['DisWise']>0)
{
 if($_REQUEST['ii']>0){ $sqlP4d=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_sal_details.YearId=".$AfterYId." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details.DealerId=".$_REQUEST['SelDis'], $con); } 
 else{ if($_REQUEST['crp']==1 OR $_REQUEST['crp']==2){ $sqlP4d=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where hrm_sales_seedsitem.GroupId=".$_REQUEST['crp']." AND hrm_sales_sal_details.YearId=".$AfterYId." AND hrm_sales_sal_details.DealerId=".$_REQUEST['SelDis'], $con); } if($_REQUEST['crp']==3){ $sqlP4d=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details where YearId=".$AfterYId." AND DealerId=".$_REQUEST['SelDis'], $con); } } 
}

$res4=mysql_fetch_assoc($sqlP4d); 
$res4Tot=$res4['sM1']+$res4['sM2']+$res4['sM3']+$res4['sM4']+$res4['sM5']+$res4['sM6']+$res4['sM7']+$res4['sM8']+$res4['sM9']+$res4['sM10']+$res4['sM11']+$res4['sM12']; 
$Tot4Q1=$res4['sM1']+$res4['sM2']+$res4['sM3']; $Tot4Q2=$res4['sM4']+$res4['sM5']+$res4['sM6'];
$Tot4Q3=$res4['sM7']+$res4['sM8']+$res4['sM9']; $Tot4Q4=$res4['sM10']+$res4['sM11']+$res4['sM12'];
?>
  <td class="Th40"><b><?php echo $y4T; ?></b></td><td class="Th40"><b><?php echo $y4; ?></b></td> 
  <td class="Td60"><?php if($res4['sM1']!=0){echo floatval($res4['sM1']);} ?></td><td class="Td60"><?php if($res4['sM2']!=0){echo floatval($res4['sM2']);} ?></td>
  <td class="Td60"><?php if($res4['sM3']!=0){echo floatval($res4['sM3']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot4Q1!=0){echo floatval($Tot4Q1);} ?></td>
  <td class="Td60"><?php if($res4['sM4']!=0){echo floatval($res4['sM4']);} ?></td><td class="Td60"><?php if($res4['sM5']!=0){echo floatval($res4['sM5']);} ?></td>
  <td class="Td60"><?php if($res4['sM6']!=0){echo floatval($res4['sM6']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot4Q2!=0){echo floatval($Tot4Q2);} ?></td>
  <td class="Td60"><?php if($res4['sM7']!=0){echo floatval($res4['sM7']);} ?></td><td class="Td60"><?php if($res4['sM8']!=0){echo floatval($res4['sM8']);} ?></td>
  <td class="Td60"><?php if($res4['sM9']!=0){echo floatval($res4['sM9']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot4Q3!=0){echo floatval($Tot4Q3);} ?></td>
  <td class="Td60"><?php if($res4['sM10']!=0){echo floatval($res4['sM10']);} ?></td><td class="Td60"><?php if($res4['sM11']!=0){echo floatval($res4['sM11']);} ?></td>
  <td class="Td60"><?php if($res4['sM12']!=0){echo floatval($res4['sM12']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot4Q4!=0){echo floatval($Tot4Q4);} ?></td>	 
  <td class="Td60"><b><?php if($res4Tot!=0){echo floatval($res4Tot);} ?></b></td>
<td class="Td60"><input type="text" id="TotVal_D" style="width:60px;height:20px;text-align:right;" value="0" readonly/></td> 
	 
<?php } /*5*/   $sqlYe=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$_REQUEST['yi'], $con); $resYe=mysql_fetch_assoc($sqlYe);
        $yeft=date("y",strtotime($resYe['FromDate'])).'-'.date("y",strtotime($resYe['ToDate'])); $yeT='<font color="#A60053">YTD</font>'; 
	    if($i==5){ 
		
if($_REQUEST['HqWise']>0)
{
 if($_REQUEST['SelHq']>0)
 {
 if($_REQUEST['ii']>0){ $sqlP5d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId where hrm_sales_sal_details.YearId=".$_REQUEST['yi']." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_dealer.HqId=".$_REQUEST['SelHq'], $con); } 
 else{ if($_REQUEST['crp']==1 OR $_REQUEST['crp']==2){ $sqlP5d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId where hrm_sales_seedsitem.GroupId=".$_REQUEST['crp']." AND hrm_sales_sal_details.YearId=".$_REQUEST['yi']." AND hrm_sales_dealer.HqId=".$_REQUEST['SelHq'], $con); } 
 if($_REQUEST['crp']==3){ $sqlP5d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId where hrm_sales_sal_details.YearId=".$_REQUEST['yi']." AND hrm_sales_dealer.HqId=".$_REQUEST['SelHq'], $con); }  } 
 }
 if($_REQUEST['SelHq']=='All')
 {
 if($_REQUEST['ii']>0){  $sqlP5d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_tlemp ON hrm_sales_dealer.HqId=hrm_sales_tlemp.TLHq where TLStatus='A' AND hrm_sales_tlemp.TLEId=".$EmployeeId." AND hrm_sales_sal_details.YearId=".$_REQUEST['yi']." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii'], $con); } 
 else{ if($_REQUEST['crp']==1 OR $_REQUEST['crp']==2){ $sqlP5d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_tlemp ON hrm_sales_dealer.HqId=hrm_sales_tlemp.TLHq where TLStatus='A' AND hrm_sales_tlemp.TLEId=".$EmployeeId." AND hrm_sales_sal_details.YearId=".$_REQUEST['yi']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crp'], $con); } 
 if($_REQUEST['crp']==3){ $sqlP5d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_tlemp ON hrm_sales_dealer.HqId=hrm_sales_tlemp.TLHq where TLStatus='A' AND hrm_sales_tlemp.TLEId=".$EmployeeId." AND hrm_sales_sal_details.YearId=".$_REQUEST['yi'], $con); }  } 
 }
}

elseif($_REQUEST['DisWise']>0)
{
 if($_REQUEST['ii']>0){ $sqlP5d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_sal_details.YearId=".$_REQUEST['yi']." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details.DealerId=".$_REQUEST['SelDis'], $con); } 
 else{ if($_REQUEST['crp']==1 OR $_REQUEST['crp']==2){ $sqlP5d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where hrm_sales_seedsitem.GroupId=".$_REQUEST['crp']." AND hrm_sales_sal_details.YearId=".$_REQUEST['yi']." AND hrm_sales_sal_details.DealerId=".$_REQUEST['SelDis'], $con); } if($_REQUEST['crp']==3){ $sqlP5d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details where YearId=".$_REQUEST['yi']." AND DealerId=".$_REQUEST['SelDis'], $con); } } 
}
		
 $res5=mysql_fetch_assoc($sqlP5d);  
 $res5Tot=$res5['sM1']+$res5['sM2']+$res5['sM3']+$res5['sM4']+$res5['sM5']+$res5['sM6']+$res5['sM7']+$res5['sM8']+$res5['sM9']+$res5['sM10']+$res5['sM11']+$res5['sM12'];
 $Tot5Q1=$res5['sM1']+$res5['sM2']+$res5['sM3']; $Tot5Q2=$res5['sM4']+$res5['sM5']+$res5['sM6'];
 $Tot5Q3=$res5['sM7']+$res5['sM8']+$res5['sM9']; $Tot5Q4=$res5['sM10']+$res5['sM11']+$res5['sM12']; 
?>
  <td class="Th40"><b><?php echo $yeT; ?></b></td><td class="Th40"><b><?php echo $yeft; ?></b></td> 
  <td class="Td60"><?php if($res5['sM1']!=0){echo floatval($res5['sM1']);} ?></td><td class="Td60"><?php if($res5['sM2']!=0){echo floatval($res5['sM2']);} ?></td>
  <td class="Td60"><?php if($res5['sM3']!=0){echo floatval($res5['sM3']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot5Q1!=0){echo floatval($Tot5Q1);} ?></td>
  <td class="Td60"><?php if($res5['sM4']!=0){echo floatval($res5['sM4']);} ?></td><td class="Td60"><?php if($res5['sM5']!=0){echo floatval($res5['sM5']);} ?></td>
  <td class="Td60"><?php if($res5['sM6']!=0){echo floatval($res5['sM6']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot5Q2!=0){echo floatval($Tot5Q2);} ?></td>
  <td class="Td60"><?php if($res5['sM7']!=0){echo floatval($res5['sM7']);} ?></td><td class="Td60"><?php if($res5['sM8']!=0){echo floatval($res5['sM8']);} ?></td>
  <td class="Td60"><?php if($res5['sM9']!=0){echo floatval($res5['sM9']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot5Q3!=0){echo floatval($Tot5Q3);} ?></td>
  <td class="Td60"><?php if($res5['sM10']!=0){echo floatval($res5['sM10']);} ?></td><td class="Td60"><?php if($res5['sM11']!=0){echo floatval($res5['sM11']);} ?></td>
  <td class="Td60"><?php if($res5['sM12']!=0){echo floatval($res5['sM12']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot5Q4!=0){echo floatval($Tot5Q4);} ?></td>	 
  <td class="Td60"><b><?php if($res5Tot!=0){echo floatval($res5Tot);} ?></b></td>
 <td class="Td60"><input type="text" id="TotVal_E" style="width:60px;height:20px;text-align:right;" value="0" readonly/></td>
<?php } ?>
  </tr>
<?php } ?> 
<?php ////////////////////////////////////////////////////////// ---TOTAL TOTAL TOTAL TOTAL TOTAL TOTAL CLOSE CLOSE ?>
<?php /*************************************** OPEN FIELD************************************************/ ?> 

 <tr style="background-color:#D5F1D1;color:#000000;">
  <td colspan="5" align="center" style="font-size:12px;font-weight:bold;background-color:#FFFF80;">
  <?php if($_REQUEST['HqWise']>0){ if($_REQUEST['SelHq']>0){echo strtoupper($resHq1['HqName']);}if($_REQUEST['SelHq']=='All'){echo 'All HEAD QUARTER';} }
        elseif($_REQUEST['DisWise']>0){echo strtoupper($resDis1['DealerName']);} ?>
  </td>
  <td class="Th60" rowspan="2">APR</td><td class="Th60" rowspan="2">MAY</td><td class="Th60" rowspan="2">JUN</td><td class="Th60" bgcolor="#FAD25A" rowspan="2">Q1</td>
  <td class="Th60" rowspan="2">JUL</td><td class="Th60" rowspan="2">AUG</td><td class="Th60" rowspan="2">SEP</td><td class="Th60" bgcolor="#FAD25A" rowspan="2">Q2</td>
  <td class="Th60" rowspan="2">OCT</td><td class="Th60" rowspan="2">NOV</td><td class="Th60" rowspan="2">DEC</td><td class="Th60" bgcolor="#FAD25A" rowspan="2">Q3</td>
  <td class="Th60" rowspan="2">JAN</td><td class="Th60" rowspan="2">FEB</td><td class="Th60" rowspan="2">MAR</td><td class="Th60" bgcolor="#FAD25A" rowspan="2">Q4</td>
  <td class="Th60" rowspan="2"><b>TOTAL<br><font color="#E67300">Kg</font></b></td>
 <td class="Th60" rowspan="2"><b>VALUE<br><font color="#E67300">Lakh</font></b></td> 
 </tr>	
  <tr style="background-color:#D5F1D1;color:#000000;">  
   <td align="center" style="width:50px;font-size:11px;"><b>CROP</b></td>
   <td align="center" style="width:150px;font-size:11px;"><b>VARIETY</b></td>
   <td align="center" class="Th40"><b>TYPE</b></td>
   <td colspan="2" align="center" style="width:80px;font-size:11px;"><b>YEAR</b></td>
  </tr>	
 
</thead> 
</table>
<?php /*************************************** CLOSE FIELD************************************************/ ?>  
<?php /*************************************** OPEN DATA DATA DATA FIELD ************************************************/ ?>
<div class="inner_table" style="width:1250px;">
<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;vertical-align:top;" >
<tbody>
<?php  
if($_REQUEST['ii']>0){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,ItemCode,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.ItemId=".$_REQUEST['ii']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con); }
else{ if($_REQUEST['crp']==1 OR $_REQUEST['crp']==2){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ItemCode,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.GroupId=".$_REQUEST['crp']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con);} if($_REQUEST['crp']==3){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,ItemCode,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId order by hrm_sales_seedsitem.GroupId ASC, ItemName ASC, TypeName ASC, ProductName ASC", $con); }  }  $Sn=1; 
while($res=mysql_fetch_array($sql)){ 
for($i=1; $i<=5; $i++){ ?>
 <tr style="height:22px;background-color:<?php if($i==5){echo '#D2E9FF';}else{echo '#EEEEEE'; } ?>;">   
   <td bgcolor="<?php if($i==1){echo '#B8E29C';}?>" style="width:50px;font-size:11px;"><?php if($i==1){echo $res['ItemCode'];} ?></td>	 
   <td bgcolor="<?php if($i==1){echo '#B8E29C';}?>" style="width:150px;font-size:11px;"><?php if($i==1){echo $res['ProductName'];} ?></td>
   <td bgcolor="<?php if($i==1){echo '#B8E29C';}?>" align="center" class="Th40"><?php if($i==1){echo substr_replace($res['TypeName'],'',2);}?></td>	  
<?php /* 1 */ if($i==1){ 

if($_REQUEST['HqWise']>0)
{ 
 if($_REQUEST['SelHq']>0)
 {
 $sqlP1d=mysql_query("select SUM(M1_Ach) as tm1,SUM(M2_Ach) as tm2,SUM(M3_Ach) as tm3,SUM(M4_Ach) as tm4,SUM(M5_Ach) as tm5,SUM(M6_Ach) as tm6,SUM(M7_Ach) as tm7,SUM(M8_Ach) as tm8,SUM(M9_Ach) as tm9,SUM(M10_Ach) as tm10,SUM(M11_Ach) as tm11,SUM(M12_Ach) as tm12 from hrm_sales_sal_details INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId where hrm_sales_sal_details.YearId=".$BeforeYId2." AND hrm_sales_sal_details.ProductId=".$res['ProductId']." AND hrm_sales_dealer.HqId=".$_REQUEST['SelHq'], $con); 
 }
 if($_REQUEST['SelHq']=='All')
 {
  $sqlP1d=mysql_query("select SUM(M1_Ach) as tm1,SUM(M2_Ach) as tm2,SUM(M3_Ach) as tm3,SUM(M4_Ach) as tm4,SUM(M5_Ach) as tm5,SUM(M6_Ach) as tm6,SUM(M7_Ach) as tm7,SUM(M8_Ach) as tm8,SUM(M9_Ach) as tm9,SUM(M10_Ach) as tm10,SUM(M11_Ach) as tm11,SUM(M12_Ach) as tm12 from hrm_sales_sal_details INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_tlemp ON hrm_sales_dealer.HqId=hrm_sales_tlemp.TLHq where TLStatus='A' AND hrm_sales_tlemp.TLEId=".$EmployeeId." AND hrm_sales_sal_details.ProductId=".$res['ProductId']." AND hrm_sales_sal_details.YearId=".$BeforeYId2, $con);
 }
}
elseif($_REQUEST['DisWise']>0)
{ $sqlP1d=mysql_query("select SUM(M1_Ach) as tm1,SUM(M2_Ach) as tm2,SUM(M3_Ach) as tm3,SUM(M4_Ach) as tm4,SUM(M5_Ach) as tm5,SUM(M6_Ach) as tm6,SUM(M7_Ach) as tm7,SUM(M8_Ach) as tm8,SUM(M9_Ach) as tm9,SUM(M10_Ach) as tm10,SUM(M11_Ach) as tm11,SUM(M12_Ach) as tm12 from hrm_sales_sal_details where YearId=".$BeforeYId2." AND ProductId=".$res['ProductId']." AND DealerId=".$_REQUEST['SelDis'], $con); }

$res1=mysql_fetch_assoc($sqlP1d); 
$res1Tot=$res1['tm1']+$res1['tm2']+$res1['tm3']+$res1['tm4']+$res1['tm5']+$res1['tm6']+$res1['tm7']+$res1['tm8']+$res1['tm9']+$res1['tm10']+$res1['tm11']+$res1['tm12']; 
$res1Tot1=$res1['tm1']+$res1['tm2']+$res1['tm3']; $res1Tot2=$res1['tm4']+$res1['tm5']+$res1['tm6'];
$res1Tot3=$res1['tm7']+$res1['tm8']+$res1['tm9']; $res1Tot4=$res1['tm10']+$res1['tm11']+$res1['tm12'];
?>
<?php 
include("Nrv1.php");
$Net4=$res1['tm1']*$Nrv4; $Net5=$res1['tm2']*$Nrv5; $Net6=$res1['tm3']*$Nrv6; $Net7=$res1['tm4']*$Nrv7; $Net8=$res1['tm5']*$Nrv8; 
$Net9=$res1['tm6']*$Nrv9; $Net10=$res1['tm7']*$Nrv10; $Net11=$res1['tm8']*$Nrv11; $Net12=$res1['tm9']*$Nrv12; $Net1=$res1['tm10']*$Nrv1; 
$Net2=$res1['tm11']*$Nrv2; $Net3=$res1['tm12']*$Nrv3; $NetNRV_1=$Net4+$Net5+$Net6+$Net7+$Net8+$Net9+$Net10+$Net11+$Net12+$Net1+$Net2+$Net3; $LakhNRV_1=$NetNRV_1/100000;
?>
  <td class="Th40"><b><?php echo $y1T; ?></b></td><td class="Th40"><b><?php echo $y1; ?></b></td>
  <td class="Td60"><?php if($res1['tm1']!=0){echo floatval($res1['tm1']);} ?></td>
  <td class="Td60"><?php if($res1['tm2']!=0){echo floatval($res1['tm2']);} ?></td>
  <td class="Td60"><?php if($res1['tm3']!=0){echo floatval($res1['tm3']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res1Tot1!=0){echo floatval($res1Tot1);} ?></td>
  <td class="Td60"><?php if($res1['tm4']!=0){echo floatval($res1['tm4']);} ?></td>
  <td class="Td60"><?php if($res1['tm5']!=0){echo floatval($res1['tm5']);} ?></td>
  <td class="Td60"><?php if($res1['tm6']!=0){echo floatval($res1['tm6']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res1Tot2!=0){echo floatval($res1Tot2);} ?></td>
  <td class="Td60"><?php if($res1['tm7']!=0){echo floatval($res1['tm7']);} ?></td>
  <td class="Td60"><?php if($res1['tm8']!=0){echo floatval($res1['tm8']);} ?></td>
  <td class="Td60"><?php if($res1['tm9']!=0){echo floatval($res1['tm9']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res1Tot3!=0){echo floatval($res1Tot3);} ?></td>
  <td class="Td60"><?php if($res1['tm10']!=0){echo floatval($res1['tm10']);} ?></td>
  <td class="Td60"><?php if($res1['tm11']!=0){echo floatval($res1['tm11']);} ?></td>
  <td class="Td60"><?php if($res1['tm12']!=0){echo floatval($res1['tm12']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res1Tot4!=0){echo floatval($res1Tot4);} ?></td>
   
  <td class="Td60"><b><?php if($res1Tot!=0){echo floatval($res1Tot);} ?></b></td>
 
  <td class="Td60"><input type="text" id="TotVal_E" style="width:60px;height:20px;text-align:right;" value="<?php if($LakhNRV_1!=0){echo round($LakhNRV_1,4);} ?>" readonly />
  <input type="hidden" id="<?php echo 'A'.$Sn; ?>" value="<?php if($LakhNRV_1>0){echo round($LakhNRV_1,4);}else{echo 0;} ?>" />
  <?php if($LakhNRV_1>0){$valA=$LakhNRV_1;}else{$valA=0;} echo '<script>FunATotal('.$valA.');</script>'; ?>
  </td> 
  	 
<?php } /* 2 */ if($i==2){ 

if($_REQUEST['HqWise']>0)
{ 
 if($_REQUEST['SelHq']>0)
 {
 $sqlP2d=mysql_query("select SUM(M1_Ach) as tm1,SUM(M2_Ach) as tm2,SUM(M3_Ach) as tm3,SUM(M4_Ach) as tm4,SUM(M5_Ach) as tm5,SUM(M6_Ach) as tm6,SUM(M7_Ach) as tm7,SUM(M8_Ach) as tm8,SUM(M9_Ach) as tm9,SUM(M10_Ach) as tm10,SUM(M11_Ach) as tm11,SUM(M12_Ach) as tm12 from hrm_sales_sal_details INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId where hrm_sales_sal_details.YearId=".$BeforeYId." AND hrm_sales_sal_details.ProductId=".$res['ProductId']." AND hrm_sales_dealer.HqId=".$_REQUEST['SelHq'], $con); 
 }
 if($_REQUEST['SelHq']=='All')
 {
  $sqlP2d=mysql_query("select SUM(M1_Ach) as tm1,SUM(M2_Ach) as tm2,SUM(M3_Ach) as tm3,SUM(M4_Ach) as tm4,SUM(M5_Ach) as tm5,SUM(M6_Ach) as tm6,SUM(M7_Ach) as tm7,SUM(M8_Ach) as tm8,SUM(M9_Ach) as tm9,SUM(M10_Ach) as tm10,SUM(M11_Ach) as tm11,SUM(M12_Ach) as tm12 from hrm_sales_sal_details INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_tlemp ON hrm_sales_dealer.HqId=hrm_sales_tlemp.TLHq where TLStatus='A' AND hrm_sales_tlemp.TLEId=".$EmployeeId." AND hrm_sales_sal_details.ProductId=".$res['ProductId']." AND hrm_sales_sal_details.YearId=".$BeforeYId, $con);
 }
}
elseif($_REQUEST['DisWise']>0)
{ $sqlP2d=mysql_query("select SUM(M1_Ach) as tm1,SUM(M2_Ach) as tm2,SUM(M3_Ach) as tm3,SUM(M4_Ach) as tm4,SUM(M5_Ach) as tm5,SUM(M6_Ach) as tm6,SUM(M7_Ach) as tm7,SUM(M8_Ach) as tm8,SUM(M9_Ach) as tm9,SUM(M10_Ach) as tm10,SUM(M11_Ach) as tm11,SUM(M12_Ach) as tm12 from hrm_sales_sal_details where YearId=".$BeforeYId." AND ProductId=".$res['ProductId']." AND DealerId=".$_REQUEST['SelDis'], $con); }

$res2=mysql_fetch_assoc($sqlP2d);
$res2Tot=$res2['tm1']+$res2['tm2']+$res2['tm3']+$res2['tm4']+$res2['tm5']+$res2['tm6']+$res2['tm7']+$res2['tm8']+$res2['tm9']+$res2['tm10']+$res2['tm11']+$res2['tm12']; 
$res2Tot1=$res2['tm1']+$res2['tm2']+$res2['tm3']; $res2Tot2=$res2['tm4']+$res2['tm5']+$res2['tm6'];
$res2Tot3=$res2['tm7']+$res2['tm8']+$res2['tm9']; $res2Tot4=$res2['tm10']+$res2['tm11']+$res2['tm12']; ?>
<?php 
include("Nrv2.php");
$Net4=$res2['tm1']*$Nrv4; $Net5=$res2['tm2']*$Nrv5; $Net6=$res2['tm3']*$Nrv6; $Net7=$res2['tm4']*$Nrv7; $Net8=$res2['tm5']*$Nrv8; 
$Net9=$res2['tm6']*$Nrv9; $Net10=$res2['tm7']*$Nrv10; $Net11=$res2['tm8']*$Nrv11; $Net12=$res2['tm9']*$Nrv12; $Net1=$res2['tm10']*$Nrv1; 
$Net2=$res2['tm11']*$Nrv2; $Net3=$res2['tm12']*$Nrv3; $NetNRV_2=$Net4+$Net5+$Net6+$Net7+$Net8+$Net9+$Net10+$Net11+$Net12+$Net1+$Net2+$Net3; $LakhNRV_2=$NetNRV_2/100000;
?>
  <td class="Th40"><b><?php echo $y2T; ?></b></td><td class="Th40"><b><?php echo $y2; ?></b></td>
  <td class="Td60"><?php if($res2['tm1']!=0){echo floatval($res2['tm1']);} ?></td>
  <td class="Td60"><?php if($res2['tm2']!=0){echo floatval($res2['tm2']);} ?></td>
  <td class="Td60"><?php if($res2['tm3']!=0){echo floatval($res2['tm3']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res2Tot1!=0){echo floatval($res2Tot1);} ?></td>
  <td class="Td60"><?php if($res2['tm4']!=0){echo floatval($res2['tm4']);} ?></td>
  <td class="Td60"><?php if($res2['tm5']!=0){echo floatval($res2['tm5']);} ?></td>
  <td class="Td60"><?php if($res2['tm6']!=0){echo floatval($res2['tm6']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res2Tot2!=0){echo floatval($res2Tot2);} ?></td>
  <td class="Td60"><?php if($res2['tm7']!=0){echo floatval($res2['tm7']);} ?></td>
  <td class="Td60"><?php if($res2['tm8']!=0){echo floatval($res2['tm8']);} ?></td>
  <td class="Td60"><?php if($res2['tm9']!=0){echo floatval($res2['tm9']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res2Tot3!=0){echo floatval($res2Tot3);} ?></td>
  <td class="Td60"><?php if($res2['tm10']!=0){echo floatval($res2['tm10']);} ?></td>
  <td class="Td60"><?php if($res2['tm11']!=0){echo floatval($res2['tm11']);} ?></td>
  <td class="Td60"><?php if($res2['tm12']!=0){echo floatval($res2['tm12']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res2Tot4!=0){echo floatval($res2Tot4);} ?></td>	   	   
  <td class="Td60"><b><?php if($res2Tot!=0){echo floatval($res2Tot);} ?></b></td>
 
  <td class="Td60"><input type="text" id="TotVal_E" style="width:60px;height:20px;text-align:right;" value="<?php if($LakhNRV_2!=0){echo round($LakhNRV_2,4);} ?>" readonly />
  <input type="hidden" id="id="<?php echo 'B'.$Sn; ?>"" value="<?php if($LakhNRV_2>0){echo round($LakhNRV_2,4);}else{echo 0;} ?>" />
  <?php if($LakhNRV_2>0){$valB=$LakhNRV_2;}else{$valB=0;} echo '<script>FunBTotal('.$valB.');</script>'; ?>
  </td>  
   	   
<?php } /* 3 */ if($i==3){ 

if($_REQUEST['HqWise']>0)
{ 
  if($_REQUEST['SelHq']>0)
  {
  $sqlP3d=mysql_query("select SUM(M1) as tm1,SUM(M2) as tm2,SUM(M3) as tm3,SUM(M4) as tm4,SUM(M5) as tm5,SUM(M6) as tm6,SUM(M7) as tm7,SUM(M8) as tm8,SUM(M9) as tm9,SUM(M10) as tm10,SUM(M11) as tm11,SUM(M12) as tm12 from hrm_sales_sal_details INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId where hrm_sales_sal_details.YearId=".$_REQUEST['yi']." AND hrm_sales_sal_details.ProductId=".$res['ProductId']." AND hrm_sales_dealer.HqId=".$_REQUEST['SelHq'], $con); 
  }
  if($_REQUEST['SelHq']=='All')
  {
  $sqlP3d=mysql_query("select SUM(M1) as tm1,SUM(M2) as tm2,SUM(M3) as tm3,SUM(M4) as tm4,SUM(M5) as tm5,SUM(M6) as tm6,SUM(M7) as tm7,SUM(M8) as tm8,SUM(M9) as tm9,SUM(M10) as tm10,SUM(M11) as tm11,SUM(M12) as tm12 from hrm_sales_sal_details INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_tlemp ON hrm_sales_dealer.HqId=hrm_sales_tlemp.TLHq where TLStatus='A' AND hrm_sales_tlemp.TLEId=".$EmployeeId." AND hrm_sales_sal_details.ProductId=".$res['ProductId']." AND hrm_sales_sal_details.YearId=".$_REQUEST['yi'], $con);
  }
}
elseif($_REQUEST['DisWise']>0)
{ $sqlP3d=mysql_query("select SUM(M1) as tm1,SUM(M2) as tm2,SUM(M3) as tm3,SUM(M4) as tm4,SUM(M5) as tm5,SUM(M6) as tm6,SUM(M7) as tm7,SUM(M8) as tm8,SUM(M9) as tm9,SUM(M10) as tm10,SUM(M11) as tm11,SUM(M12) as tm12 from hrm_sales_sal_details where YearId=".$_REQUEST['yi']." AND ProductId=".$res['ProductId']." AND DealerId=".$_REQUEST['SelDis'], $con); }

$res3=mysql_fetch_assoc($sqlP3d); 
$res3Tot=$res3['tm1']+$res3['tm2']+$res3['tm3']+$res3['tm4']+$res3['tm5']+$res3['tm6']+$res3['tm7']+$res3['tm8']+$res3['tm9']+$res3['tm10']+$res3['tm11']+$res3['tm12'];
$res3Tot1=$res3['tm1']+$res3['tm2']+$res3['tm3']; $res3Tot2=$res3['tm4']+$res3['tm5']+$res3['tm6'];
$res3Tot3=$res3['tm7']+$res3['tm8']+$res3['tm9']; $res3Tot4=$res3['tm10']+$res3['tm11']+$res3['tm12'];
?> 
<?php 
include("Nrv3.php");
$Net4=$res3['tm1']*$Nrv4; $Net5=$res3['tm2']*$Nrv5; $Net6=$res3['tm3']*$Nrv6; $Net7=$res3['tm4']*$Nrv7; $Net8=$res3['tm5']*$Nrv8; 
$Net9=$res3['tm6']*$Nrv9; $Net10=$res3['tm7']*$Nrv10; $Net11=$res3['tm8']*$Nrv11; $Net12=$res3['tm9']*$Nrv12; $Net1=$res3['tm10']*$Nrv1; 
$Net2=$res3['tm11']*$Nrv2; $Net3=$res3['tm12']*$Nrv3; $NetNRV_3=$Net4+$Net5+$Net6+$Net7+$Net8+$Net9+$Net10+$Net11+$Net12+$Net1+$Net2+$Net3; $LakhNRV_3=$NetNRV_3/100000;
?>
  <td class="Th40"><b><?php echo $y3T; ?></b></td><td class="Th40"><b><?php echo $y3; ?></b></td> 
  <td class="Td60"><?php if($res3['tm1']!=0){echo floatval($res3['tm1']);} ?></td>
  <td class="Td60"><?php if($res3['tm2']!=0){echo floatval($res3['tm2']);} ?></td>
  <td class="Td60"><?php if($res3['tm3']!=0){echo floatval($res3['tm3']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res3Tot1!=0){echo floatval($res3Tot1);} ?></td>
  <td class="Td60"><?php if($res3['tm4']!=0){echo floatval($res3['tm4']);} ?></td>
  <td class="Td60"><?php if($res3['tm5']!=0){echo floatval($res3['tm5']);} ?></td>
  <td class="Td60"><?php if($res3['tm6']!=0){echo floatval($res3['tm6']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res3Tot2!=0){echo floatval($res3Tot2);} ?></td>
  <td class="Td60"><?php if($res3['tm7']!=0){echo floatval($res3['tm7']);} ?></td>
  <td class="Td60"><?php if($res3['tm8']!=0){echo floatval($res3['tm8']);} ?></td>
  <td class="Td60"><?php if($res3['tm9']!=0){echo floatval($res3['tm9']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res3Tot3!=0){echo floatval($res3Tot3);} ?></td>
  <td class="Td60"><?php if($res3['tm10']!=0){echo floatval($res3['tm10']);} ?></td>
  <td class="Td60"><?php if($res3['tm11']!=0){echo floatval($res3['tm11']);} ?></td>
  <td class="Td60"><?php if($res3['tm12']!=0){echo floatval($res3['tm12']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res3Tot4!=0){echo floatval($res3Tot4);} ?></td>	   	   	 
  <td class="Td60"><b><?php if($res3Tot!=0){echo floatval($res3Tot);} ?></b></td>
  
  <td class="Td60"><input type="text" id="TotVal_E" style="width:60px;height:20px;text-align:right;" value="<?php if($LakhNRV_3!=0){echo round($LakhNRV_3,4);} ?>" readonly />
  <input type="hidden" id="<?php echo 'C'.$Sn; ?>" value="<?php if($LakhNRV_3>0){echo round($LakhNRV_3,4);}else{echo 0;} ?>" />
  <?php if($LakhNRV_3>0){$valC=$LakhNRV_3;}else{$valC=0;} echo '<script>FunCTotal('.$valC.');</script>'; ?>
  </td>    
    
<?php } /* 4 */  if($i==4){ 

if($_REQUEST['HqWise']>0)
{ 
  if($_REQUEST['SelHq']>0)
  {
 $sqlP4d=mysql_query("select SUM(M1_Proj) as tm1,SUM(M2_Proj) as tm2,SUM(M3_Proj) as tm3,SUM(M4_Proj) as tm4,SUM(M5_Proj) as tm5,SUM(M6_Proj) as tm6,SUM(M7_Proj) as tm7,SUM(M8_Proj) as tm8,SUM(M9_Proj) as tm9,SUM(M10_Proj) as tm10,SUM(M11_Proj) as tm11,SUM(M12_Proj) as tm12 from hrm_sales_sal_details INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId where hrm_sales_sal_details.YearId=".$AfterYId." AND hrm_sales_sal_details.ProductId=".$res['ProductId']." AND hrm_sales_dealer.HqId=".$_REQUEST['SelHq'], $con); 
  }
  if($_REQUEST['SelHq']=='All')
  {
  $sqlP4d=mysql_query("select SUM(M1_Proj) as tm1,SUM(M2_Proj) as tm2,SUM(M3_Proj) as tm3,SUM(M4_Proj) as tm4,SUM(M5_Proj) as tm5,SUM(M6_Proj) as tm6,SUM(M7_Proj) as tm7,SUM(M8_Proj) as tm8,SUM(M9_Proj) as tm9,SUM(M10_Proj) as tm10,SUM(M11_Proj) as tm11,SUM(M12_Proj) as tm12 from hrm_sales_sal_details INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_tlemp ON hrm_sales_dealer.HqId=hrm_sales_tlemp.TLHq where TLStatus='A' AND hrm_sales_tlemp.TLEId=".$EmployeeId." AND hrm_sales_sal_details.ProductId=".$res['ProductId']." AND hrm_sales_sal_details.YearId=".$AfterYId, $con);
  }
}
elseif($_REQUEST['DisWise']>0)
{ $sqlP4d=mysql_query("select SUM(M1_Proj) as tm1,SUM(M2_Proj) as tm2,SUM(M3_Proj) as tm3,SUM(M4_Proj) as tm4,SUM(M5_Proj) as tm5,SUM(M6_Proj) as tm6,SUM(M7_Proj) as tm7,SUM(M8_Proj) as tm8,SUM(M9_Proj) as tm9,SUM(M10_Proj) as tm10,SUM(M11_Proj) as tm11,SUM(M12_Proj) as tm12 from hrm_sales_sal_details where YearId=".$AfterYId." AND ProductId=".$res['ProductId']." AND DealerId=".$_REQUEST['SelDis'], $con); }

$res4=mysql_fetch_assoc($sqlP4d); 
$res4Tot=$res4['tm1']+$res4['tm2']+$res4['tm3']+$res4['tm4']+$res4['tm5']+$res4['tm6']+$res4['tm7']+$res4['tm8']+$res4['tm9']+$res4['tm10']+$res4['tm11']+$res4['tm12']; 
$res4Tot1=$res4['tm1']+$res4['tm2']+$res4['tm3']; $res4Tot2=$res4['tm4']+$res4['tm5']+$res4['tm6'];
$res4Tot3=$res4['tm7']+$res4['tm8']+$res4['tm9']; $res4Tot4=$res4['tm10']+$res4['tm11']+$res4['tm12'];
?>
<?php 
include("Nrv4.php");

$Net4=$res4['tm1']*$Nrv4; $Net5=$res4['tm2']*$Nrv5; $Net6=$res4['tm3']*$Nrv6; $Net7=$res4['tm4']*$Nrv7; $Net8=$res4['tm5']*$Nrv8; 
$Net9=$res4['tm6']*$Nrv9; $Net10=$res4['tm7']*$Nrv10; $Net11=$res4['tm8']*$Nrv11; $Net12=$res4['tm9']*$Nrv12; $Net1=$res4['tm10']*$Nrv1; 
$Net2=$res4['tm11']*$Nrv2; $Net3=$res4['tm12']*$Nrv3; $NetNRV_4=$Net4+$Net5+$Net6+$Net7+$Net8+$Net9+$Net10+$Net11+$Net12+$Net1+$Net2+$Net3; $LakhNRV_4=$NetNRV_4/100000;
?>
  <td class="Th40"><b><?php echo $y4T; ?></b></td><td class="Th40"><b><?php echo $y4; ?></b></td> 
  <td class="Td60"><?php if($res4['tm1']!=0){echo floatval($res4['tm1']);} ?></td>
  <td class="Td60"><?php if($res4['tm2']!=0){echo floatval($res4['tm2']);} ?></td>
  <td class="Td60"><?php if($res4['tm3']!=0){echo floatval($res4['tm3']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res4Tot1!=0){echo floatval($res4Tot1);} ?></td>
  <td class="Td60"><?php if($res4['tm4']!=0){echo floatval($res4['tm4']);} ?></td>
  <td class="Td60"><?php if($res4['tm5']!=0){echo floatval($res4['tm5']);} ?></td>
  <td class="Td60"><?php if($res4['tm6']!=0){echo floatval($res4['tm6']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res4Tot2!=0){echo floatval($res4Tot2);} ?></td>
  <td class="Td60"><?php if($res4['tm7']!=0){echo floatval($res4['tm7']);} ?></td>
  <td class="Td60"><?php if($res4['tm8']!=0){echo floatval($res4['tm8']);} ?></td>
  <td class="Td60"><?php if($res4['tm9']!=0){echo floatval($res4['tm9']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res4Tot3!=0){echo floatval($res4Tot3);} ?></td>
  <td class="Td60"><?php if($res4['tm10']!=0){echo floatval($res4['tm10']);} ?></td>
  <td class="Td60"><?php if($res4['tm11']!=0){echo floatval($res4['tm11']);} ?></td>
  <td class="Td60"><?php if($res4['tm12']!=0){echo floatval($res4['tm12']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res4Tot4!=0){echo floatval($res4Tot4);} ?></td>	   	   	 
  <td class="Td60"><b><?php if($res4Tot!=0){echo floatval($res4Tot);} ?></b></td>
  
  <td class="Td60"><input type="text" id="TotVal_E" style="width:60px;height:20px;text-align:right;" value="<?php if($LakhNRV_4!=0){echo round($LakhNRV_4,4);} ?>" readonly />
  <input type="hidden" id="<?php echo 'D'.$Sn; ?>" value="<?php if($LakhNRV_4>0){echo round($LakhNRV_4,4);}else{echo 0;} ?>" />
  <?php if($LakhNRV_4>0){$valD=$LakhNRV_4;}else{$valD=0;} echo '<script>FunDTotal('.$valD.');</script>'; ?>
  </td>  
	 
<?php } /* 5 */  $sqlYe=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$_REQUEST['yi'], $con); $resYe=mysql_fetch_assoc($sqlYe);
$yeft=date("y",strtotime($resYe['FromDate'])).'-'.date("y",strtotime($resYe['ToDate'])); $yeT='<font color="#A60053">YTD</font>'; 
if($i==5){ 

if($_REQUEST['HqWise']>0)
{ 
  if($_REQUEST['SelHq']>0)
  {
  $sqlP5d=mysql_query("select SUM(M1_Ach) as tM1,SUM(M2_Ach) as tM2,SUM(M3_Ach) as tM3,SUM(M4_Ach) as tM4,SUM(M5_Ach) as tM5,SUM(M6_Ach) as tM6,SUM(M7_Ach) as tM7,SUM(M8_Ach) as tM8,SUM(M9_Ach) as tM9,SUM(M10_Ach) as tM10,SUM(M11_Ach) as tM11,SUM(M12_Ach) as tM12 from hrm_sales_sal_details INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId where hrm_sales_sal_details.YearId=".$_REQUEST['yi']." AND hrm_sales_sal_details.ProductId=".$res['ProductId']." AND hrm_sales_dealer.HqId=".$_REQUEST['SelHq'], $con); 
  }
  if($_REQUEST['SelHq']=='All')
  {
  $sqlP5d=mysql_query("select SUM(M1_Ach) as tM1,SUM(M2_Ach) as tM2,SUM(M3_Ach) as tM3,SUM(M4_Ach) as tM4,SUM(M5_Ach) as tM5,SUM(M6_Ach) as tM6,SUM(M7_Ach) as tM7,SUM(M8_Ach) as tM8,SUM(M9_Ach) as tM9,SUM(M10_Ach) as tM10,SUM(M11_Ach) as tM11,SUM(M12_Ach) as tM12 from hrm_sales_sal_details INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_tlemp ON hrm_sales_dealer.HqId=hrm_sales_tlemp.TLHq where TLStatus='A' AND hrm_sales_tlemp.TLEId=".$EmployeeId." AND hrm_sales_sal_details.ProductId=".$res['ProductId']." AND hrm_sales_sal_details.YearId=".$_REQUEST['yi'], $con);
  }
}
elseif($_REQUEST['DisWise']>0)
{ $sqlP5d=mysql_query("select SUM(M1_Ach) as tM1,SUM(M2_Ach) as tM2,SUM(M3_Ach) as tM3,SUM(M4_Ach) as tM4,SUM(M5_Ach) as tM5,SUM(M6_Ach) as tM6,SUM(M7_Ach) as tM7,SUM(M8_Ach) as tM8,SUM(M9_Ach) as tM9,SUM(M10_Ach) as tM10,SUM(M11_Ach) as tM11,SUM(M12_Ach) as tM12 from hrm_sales_sal_details where YearId=".$_REQUEST['yi']." AND ProductId=".$res['ProductId']." AND DealerId=".$_REQUEST['SelDis'], $con); }

$res5=mysql_fetch_assoc($sqlP5d); 
$res5Tot=$res5['tM1']+$res5['tM2']+$res5['tM3']+$res5['tM4']+$res5['tM5']+$res5['tM6']+$res5['tM7']+$res5['tM8']+$res5['tM9']+$res5['tM10']+$res5['tM11']+$res5['tM12'];
$res5Tot1=$res5['tM1']+$res5['tM2']+$res5['tM3']; $res5Tot2=$res5['tM4']+$res5['tM5']+$res5['tM6'];
$res5Tot3=$res5['tM7']+$res5['tM8']+$res5['tM9']; $res5Tot4=$res5['tM10']+$res5['tM11']+$res5['tM12'];
?>
<?php 
include("Nrv5.php");

$Net4=$res5['tM1']*$Nrv4; $Net5=$res5['tM2']*$Nrv5; $Net6=$res5['tM3']*$Nrv6; $Net7=$res5['tM4']*$Nrv7; $Net8=$res5['tM5']*$Nrv8; 
$Net9=$res5['tM6']*$Nrv9; $Net10=$res5['tM7']*$Nrv10; $Net11=$res5['tM8']*$Nrv11; $Net12=$res5['tM9']*$Nrv12; $Net1=$res5['tM10']*$Nrv1; 
$Net2=$res5['tM11']*$Nrv2; $Net3=$res5['tM12']*$Nrv3; $NetNRV_5=$Net4+$Net5+$Net6+$Net7+$Net8+$Net9+$Net10+$Net11+$Net12+$Net1+$Net2+$Net3; $LakhNRV_5=$NetNRV_5/100000;
?>
  <td class="Th40"><b><?php echo $yeT; ?></b></td><td class="Th40"><b><?php echo $yeft; ?></b></td> 
  <td class="Td60"><?php if($res5['tM1']!=0){echo floatval($res5['tM1']);} ?></td>
  <td class="Td60"><?php if($res5['tM2']!=0){echo floatval($res5['tM2']);} ?></td>
  <td class="Td60"><?php if($res5['tM3']!=0){echo floatval($res5['tM3']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res5Tot1!=0){echo floatval($res5Tot1);} ?></td>
  <td class="Td60"><?php if($res5['tM4']!=0){echo floatval($res5['tM4']);} ?></td>
  <td class="Td60"><?php if($res5['tM5']!=0){echo floatval($res5['tM5']);} ?></td>
  <td class="Td60"><?php if($res5['tM6']!=0){echo floatval($res5['tM6']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res5Tot2!=0){echo floatval($res5Tot2);} ?></td>
  <td class="Td60"><?php if($res5['tM7']!=0){echo floatval($res5['tM7']);} ?></td>
  <td class="Td60"><?php if($res5['tM8']!=0){echo floatval($res5['tM8']);} ?></td>
  <td class="Td60"><?php if($res5['tM9']!=0){echo floatval($res5['tM9']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res5Tot3!=0){echo floatval($res5Tot3);} ?></td>
  <td class="Td60"><?php if($res5['tM10']!=0){echo floatval($res5['tM10']);} ?></td>
  <td class="Td60"><?php if($res5['tM11']!=0){echo floatval($res5['tM11']);} ?></td>
  <td class="Td60"><?php if($res5['tM12']!=0){echo floatval($res5['tM12']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res5Tot4!=0){echo floatval($res5Tot4);} ?></td>	  
  <td class="Td60"><b><?php if($res5Tot!=0){echo floatval($res5Tot);} ?></b></td>
 
  <td class="Td60"><input type="text" id="TotVal_E" style="width:60px;height:20px;text-align:right;" value="<?php if($LakhNRV_5!=0){echo round($LakhNRV_5,4);} ?>" readonly />
  <input type="hidden" id="<?php echo 'E'.$Sn; ?>" value="<?php if($LakhNRV_5!=0){echo round($LakhNRV_5,4);}else{echo 0;} ?>" />
  <?php if($LakhNRV_5!=0){$valE=$LakhNRV_5;}else{$valE=0;} echo '<script>FunETotal('.$valE.');</script>'; ?>
  </td> 
 
<?php } ?>	   	   
  </tr> 
<?php } $Sn++; } $ActSn=$Sn-1; echo '<input type="hidden" id="ActSn" value="'.$ActSn.'" />'; ?>
</tbody>
<?php /*************************************** CLOSE DATA DATA DATA FIELD ************************************************/ ?>
</table>
</div>
<?php } ?>
<?php /******************************************* Result Close  ****************************/  ?>	

    </td>
	</tr>	
	</table>
   </td>
  </tr>
  </table>
 </td>
</tr>
	 </table>
   </td>
  </tr>
<?php //******************************** Close ***************************************************** ?>
				  </table>
				 </td>
			  </tr>
			</table>
           </td>
			  </tr>
	        </table>
			
<?php //**************************************************************************************** ?>
		   </td>
		   
		  </tr>
		</table>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>

