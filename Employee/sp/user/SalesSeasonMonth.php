<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}
//**********************************************************************************************************************
if(isset($_POST['SaveEdit']))
{  
   $sql=mysql_query("select * from hrm_sales_season_month where Year=".$_POST['fd']." AND SeasonId=".$_POST['SeasonId'], $con); $row=mysql_num_rows($sql);
   if($row==0){$sqlIns = mysql_query("insert into hrm_sales_season_month(Year, SeasonId, MJan, MFeb, MMar, MApr, MMay, MJun, MJul, MAug, MSep, MOct, MNov, MDec, CreatedBy, CreatedDate) values(".$_POST['fd'].", ".$_POST['SeasonId'].", ".$_POST['MnV_1'].", ".$_POST['MnV_2'].", ".$_POST['MnV_3'].", ".$_POST['MnV_4'].", ".$_POST['MnV_5'].", ".$_POST['MnV_6'].", ".$_POST['MnV_7'].", ".$_POST['MnV_8'].", ".$_POST['MnV_9'].", ".$_POST['MnV_10'].", ".$_POST['MnV_11'].", ".$_POST['MnV_12'].", ".$UserId.", '".date("Y-m-d")."')", $con); } elseif($row>0){$sqlUp=mysql_query("update hrm_sales_season_month set MJan=".$_POST['MnV_1'].", MFeb=".$_POST['MnV_2'].", MMar=".$_POST['MnV_3'].", MApr=".$_POST['MnV_4'].", MMay=".$_POST['MnV_5'].", MJun=".$_POST['MnV_6'].", MJul=".$_POST['MnV_7'].", MAug=".$_POST['MnV_8'].", MSep=".$_POST['MnV_9'].", MOct=".$_POST['MnV_10'].", MNov=".$_POST['MnV_11'].", MDec=".$_POST['MnV_12'].", CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."' where Year=".$_POST['fd']." AND SeasonId=".$_POST['SeasonId'], $con);}
   
   $sql2=mysql_query("select * from hrm_sales_season_month where Year=".$_POST['td']." AND SeasonId=".$_POST['SeasonId'], $con); $row2=mysql_num_rows($sql2);
   if($row2==0){$sqlIns = mysql_query("insert into hrm_sales_season_month(Year, SeasonId, MJan, MFeb, MMar, MApr, MMay, MJun, MJul, MAug, MSep, MOct, MNov, MDec, CreatedBy, CreatedDate) values(".$_POST['td'].", ".$_POST['SeasonId'].", ".$_POST['MnV_13'].", ".$_POST['MnV_14'].", ".$_POST['MnV_15'].", ".$_POST['MnV_16'].", ".$_POST['MnV_17'].", ".$_POST['MnV_18'].", ".$_POST['MnV_19'].", ".$_POST['MnV_20'].", ".$_POST['MnV_21'].", ".$_POST['MnV_22'].", ".$_POST['MnV_23'].", ".$_POST['MnV_24'].", ".$UserId.", '".date("Y-m-d")."')", $con); } elseif($row2>0){$sqlUp=mysql_query("update hrm_sales_season_month set MJan=".$_POST['MnV_13'].", MFeb=".$_POST['MnV_14'].", MMar=".$_POST['MnV_15'].", MApr=".$_POST['MnV_16'].", MMay=".$_POST['MnV_17'].", MJun=".$_POST['MnV_18'].", MJul=".$_POST['MnV_19'].", MAug=".$_POST['MnV_20'].", MSep=".$_POST['MnV_21'].", MOct=".$_POST['MnV_22'].", MNov=".$_POST['MnV_23'].", MDec=".$_POST['MnV_24'].", CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."' where Year=".$_POST['td']." AND SeasonId=".$_POST['SeasonId'], $con);}
   
   
}

if(isset($_POST['SaveEdit2']))
{ 
   $sql=mysql_query("select * from hrm_sales_season_month where Year=".$_POST['fd2']." AND SeasonId=".$_POST['SeasonId2'], $con); $row=mysql_num_rows($sql);
   if($row==0){$sqlIns = mysql_query("insert into hrm_sales_season_month(Year, SeasonId, MJan, MFeb, MMar, MApr, MMay, MJun, MJul, MAug, MSep, MOct, MNov, MDec, CreatedBy, CreatedDate) values(".$_POST['fd2'].", ".$_POST['SeasonId2'].", ".$_POST['Mn2V_1'].", ".$_POST['Mn2V_2'].", ".$_POST['Mn2V_3'].", ".$_POST['Mn2V_4'].", ".$_POST['Mn2V_5'].", ".$_POST['Mn2V_6'].", ".$_POST['Mn2V_7'].", ".$_POST['Mn2V_8'].", ".$_POST['Mn2V_9'].", ".$_POST['Mn2V_10'].", ".$_POST['Mn2V_11'].", ".$_POST['Mn2V_12'].", ".$UserId.", '".date("Y-m-d")."')", $con); } elseif($row>0){ $sqlUp=mysql_query("update hrm_sales_season_month set MJan=".$_POST['Mn2V_1'].", MFeb=".$_POST['Mn2V_2'].", MMar=".$_POST['Mn2V_3'].", MApr=".$_POST['Mn2V_4'].", MMay=".$_POST['Mn2V_5'].", MJun=".$_POST['Mn2V_6'].", MJul=".$_POST['Mn2V_7'].", MAug=".$_POST['Mn2V_8'].", MSep=".$_POST['Mn2V_9'].", MOct=".$_POST['Mn2V_10'].", MNov=".$_POST['Mn2V_11'].", MDec=".$_POST['Mn2V_12'].", CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."' where Year=".$_POST['fd2']." AND SeasonId=".$_POST['SeasonId2'], $con);}
   $sql2=mysql_query("select * from hrm_sales_season_month where Year=".$_POST['td2']." AND SeasonId=".$_POST['SeasonId2'], $con); $row2=mysql_num_rows($sql2);
   if($row2==0){$sqlIns = mysql_query("insert into hrm_sales_season_month(Year, SeasonId, MJan, MFeb, MMar, MApr, MMay, MJun, MJul, MAug, MSep, MOct, MNov, MDec, CreatedBy, CreatedDate) values(".$_POST['td2'].", ".$_POST['SeasonId2'].", ".$_POST['Mn2V_13'].", ".$_POST['Mn2V_14'].", ".$_POST['Mn2V_15'].", ".$_POST['Mn2V_16'].", ".$_POST['Mn2V_17'].", ".$_POST['Mn2V_18'].", ".$_POST['Mn2V_19'].", ".$_POST['Mn2V_20'].", ".$_POST['Mn2V_21'].", ".$_POST['Mn2V_22'].", ".$_POST['Mn2V_23'].", ".$_POST['Mn2V_24'].", ".$UserId.", '".date("Y-m-d")."')", $con); } elseif($row2>0){ $sqlUp=mysql_query("update hrm_sales_season_month set MJan=".$_POST['Mn2V_13'].", MFeb=".$_POST['Mn2V_14'].", MMar=".$_POST['Mn2V_15'].", MApr=".$_POST['Mn2V_16'].", MMay=".$_POST['Mn2V_17'].", MJun=".$_POST['Mn2V_18'].", MJul=".$_POST['Mn2V_19'].", MAug=".$_POST['Mn2V_20'].", MSep=".$_POST['Mn2V_21'].", MOct=".$_POST['Mn2V_22'].", MNov=".$_POST['Mn2V_23'].", MDec=".$_POST['Mn2V_24'].", CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."' where Year=".$_POST['td2']." AND SeasonId=".$_POST['SeasonId2'], $con);}
   
}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<style> .font { color:#ffffff; font-family:Times New Roman;font-size:15px;} .font1 { font-family:Times New Roman; font-size:12px; height:14px; } 
.font2 { font-size:12px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; height:22px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<Script>
function ChangrYear(YearV)
{
  var ci=document.getElementById("ComId").value;
  window.location="SalesSeasonMonth.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci; 
}


function edit(value) { var agree=confirm("Are you sure you want to edit this record?");
if (agree) {  var ci=document.getElementById("ComId").value;  var YearV=document.getElementById("YearV").value;
var x = "SalesSeasonMonth.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&action=edit&eid="+value;  window.location=x;}}

function ClickMonth(v)
{ 
  if(document.getElementById("Mn_"+v).checked==true){document.getElementById("MnV_"+v).value=1;}
  else if(document.getElementById("Mn_"+v).checked==false){document.getElementById("MnV_"+v).value=0;}
}

function edit2(value) { var agree=confirm("Are you sure you want to edit this record?");
if (agree) {  var ci=document.getElementById("ComId").value;  var YearV=document.getElementById("YearV").value;
var x = "SalesSeasonMonth.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&action=edit2&eid="+value;  window.location=x;}}

function ClickMonth2(v)
{ 
  if(document.getElementById("Mn2_"+v).checked==true){document.getElementById("Mn2V_"+v).value=1;}
  else if(document.getElementById("Mn2_"+v).checked==false){document.getElementById("Mn2V_"+v).value=0;}
}
</Script> 
</head>
<body class="body">
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table></td></tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
   <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
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
    <td id="Entry" valign="top" style="width:380px;">
	<span id="TabEntry">
     <table border="0">
      <tr>
	    <td style="margin-top:0px;width:150px;" class="heading" align="center"><u>Season Month :</u></td>
	    <td style="font-size:11px;height:18px;width:50px;color:#E6E6E6;" align="right"><b>Year :</b></td>
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
	   </table>
      </td>
   </tr>
  </table>
  </td>
  </tr>   
   <tr>
	<td valign="top" align="center" width="100%" id="MainWindow"><br>	  
    <table border="0" style="margin-top:0px; width:100%; height:300px;">
    <tr>
    <td width="10">&nbsp;</td>  
    <td align="left" id="type" valign="top" style="display:block; width:50%">             
     <table border="0" style="width:1840px;">
	 <tr><td class="heading">&nbsp;Vegetable Season</td></tr>
	 <tr>
	 <td align="left" style="width:1840px;">
	 <table border="1" style="width:1840px;" border="1" bgcolor="#FFFFFF">
<tr bgcolor="#808000">
 <td rowspan="2" align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:50px;"><b>SNo</b></td>
 <td rowspan="2" class="font" align="center" style="width:300px;"><b>Season Name</b></td>
 <td rowspan="2" align="center" style="font:Georgia; font-size:11px; width:50px; color:#FFFFFF"><b>Action</b></td>
 <td colspan="12" class="font" align="center" style="width:720px;"><b><?php echo $fromdate; ?></b></td>
 <td colspan="12" class="font" align="center" style="width:720px;"><b><?php echo $todate; ?></b></td>
</tr>
<tr bgcolor="#808000">
 <?php for($i=1; $i<=24; $i++){ if($i==1 OR $i==13){$Mn='Jan';}elseif($i==2 OR $i==14){$Mn='Feb';}elseif($i==3 OR $i==15){$Mn='Mar';}elseif($i==4 OR $i==16){$Mn='Apr';}elseif($i==5 OR $i==17){$Mn='May';}elseif($i==6 OR $i==18){$Mn='Jun';}elseif($i==7 OR $i==19){$Mn='Jul';}elseif($i==8 OR $i==20){$Mn='Aug';}elseif($i==9 OR $i==21){$Mn='Sep';}elseif($i==10 OR $i==22){$Mn='Oct';}elseif($i==11 OR $i==23){$Mn='Nov';}elseif($i==12 OR $i==24){$Mn='Dec';}?>
 <td class="font" align="center" style="width:40px;"><b><?php echo $Mn; ?></b></td>
 <?php } ?>
</tr>
<?php $sql=mysql_query("select * from hrm_sales_season where GroupId=1 order by SeasonId ASC", $con); $SNo=1; while($res=mysql_fetch_array($sql)) {
if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid2']==$res['SeasonId']){ ?>
<form name="OformEdit" method="post" onSubmit="return OvalidateEdit(this)">	
<tr>
 <td align="center" style="font:Georgia;font-size:12px;" valign="top"><?php echo $SNo; ?></td>
 <td class="font2" valign="middle">&nbsp;<?php echo $res['SeasonName']; ?><input type="hidden" id="SeasonId" value="<?php echo $res['SeasonId']; ?>" /></td>
 <td align="center" valign="middle" style="font:Georgia; font-size:11px;width:50px;" valign="top">
 <input type="hidden" id="fd" name="fd" value="<?php echo $fromdate; ?>" /><input type="hidden" id="td" name="td" value="<?php echo $todate; ?>" />
 <input type="submit" name="SaveEdit"  value="" class="SaveButton"><input type="hidden" name="SeasonId" id="SeasonId" value="<?php echo $_REQUEST['eid']; ?>"/></td>
 <?php $sql2=mysql_query("select * from hrm_sales_season_month where Year=".$fromdate." AND SeasonId=".$res['SeasonId'], $con); $res2=mysql_fetch_assoc($sql2); ?>
 <?php for($i=1; $i<=12; $i++){ ?>
 <td class="font" valign="top" align="center" style="background-color:<?php if($i==1 AND $res2['MJan']>0){echo '#97FF97';}elseif($i==2 AND $res2['MFeb']>0){echo '#97FF97';}elseif($i==3 AND $res2['MMar']>0){echo '#97FF97';}elseif($i==4 AND $res2['MApr']>0){echo '#97FF97';}elseif($i==5 AND $res2['MMay']>0){echo '#97FF97';}elseif($i==6 AND $res2['MJun']>0){echo '#97FF97';}elseif($i==7 AND $res2['MJul']>0){echo '#97FF97';}elseif($i==8 AND $res2['MAug']>0){echo '#97FF97';}elseif($i==9 AND $res2['MSep']>0){echo '#97FF97';}elseif($i==10 AND $res2['MOct']>0){echo '#97FF97';}elseif($i==11 AND $res2['MNov']>0){echo '#97FF97';}elseif($i==12 AND $res2['MDec']>0){echo '#97FF97';} ?>;">
 <select style="width:55px;font-family:Times New Roman;font-size:12px;" name="MnV_<?php echo $i; ?>" id="MnV_<?php echo $i; ?>">
<?php if($i==1){$sqla=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MJan'],$con); $resa=mysql_fetch_assoc($sqla); ?>
<option value="<?php if($res2['MJan']>0){echo $res2['MJan'];}else{echo 0;}?>"><?php if($res2['MJan']>0){echo $resa['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($i==2){$sqlb=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MFeb'],$con); $resb=mysql_fetch_assoc($sqlb); ?>
<option value="<?php if($res2['MFeb']>0){echo $res2['MFeb'];}else{echo 0;}?>"><?php if($res2['MJan']>0){echo $resb['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($i==3){$sqlc=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MMar'],$con); $resc=mysql_fetch_assoc($sqlc); ?>
<option value="<?php if($res2['MMar']>0){echo $res2['MMar'];}else{echo 0;}?>"><?php if($res2['MMar']>0){echo $resc['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($i==4){$sqld=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MApr'],$con); $resd=mysql_fetch_assoc($sqld); ?>
<option value="<?php if($res2['MApr']>0){echo $res2['MApr'];}else{echo 0;}?>"><?php if($res2['MApr']>0){echo $resd['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($i==5){$sqle=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MMay'],$con); $rese=mysql_fetch_assoc($sqle); ?>
<option value="<?php if($res2['MMay']>0){echo $res2['MMay'];}else{echo 0;}?>"><?php if($res2['MMay']>0){echo $rese['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($i==6){$sqlf=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MJun'],$con); $resf=mysql_fetch_assoc($sqlf); ?>
<option value="<?php if($res2['MJun']>0){echo $res2['MJun'];}else{echo 0;}?>"><?php if($res2['MJun']>0){echo $resf['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($i==7){$sqlg=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MJul'],$con); $resg=mysql_fetch_assoc($sqlg); ?>
<option value="<?php if($res2['MJul']>0){echo $res2['MJul'];}else{echo 0;}?>"><?php if($res2['MJul']>0){echo $resg['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($i==8){$sqlh=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MAug'],$con); $resh=mysql_fetch_assoc($sqlh); ?>
<option value="<?php if($res2['MAug']>0){echo $res2['MAug'];}else{echo 0;}?>"><?php if($res2['MAug']>0){echo $resh['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($i==9){$sqli=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MSep'],$con); $resi=mysql_fetch_assoc($sqli); ?>
<option value="<?php if($res2['MSep']>0){echo $res2['MSep'];}else{echo 0;}?>"><?php if($res2['MSep']>0){echo $resi['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($i==10){$sqlj=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MOct'],$con); $resj=mysql_fetch_assoc($sqlj); ?>
<option value="<?php if($res2['MOct']>0){echo $res2['MOct'];}else{echo 0;}?>"><?php if($res2['MOct']>0){echo $resj['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($i==11){$sqlk=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MNov'],$con); $resk=mysql_fetch_assoc($sqlk); ?>
<option value="<?php if($res2['MNov']>0){echo $res2['MNov'];}else{echo 0;}?>"><?php if($res2['MNov']>0){echo $resk['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($i==12){$sqll=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MDec'],$con); $resl=mysql_fetch_assoc($sqll); ?> 
<option value="<?php if($res2['MDec']>0){echo $res2['MDec'];}else{echo 0;}?>"><?php if($res2['MDec']>0){echo $resl['CycleCode'];}else{echo 'select';}?></option><?php } ?>  
<?php $sqlcy=mysql_query("select ProCycleId,CycleCode from hrm_sales_production_cycle order by CycleNo ASC",$con); while($rescy=mysql_fetch_assoc($sqlcy)){ ?>
<option value="<?php echo $rescy['ProCycleId']; ?>"><?php echo $rescy['CycleCode'] ?></option><?php } ?> 
 </select>
 </td>
 <?php $sql3=mysql_query("select * from hrm_sales_season_month where Year=".$todate." AND SeasonId=".$res['SeasonId'], $con); $res3=mysql_fetch_assoc($sql3); ?> 
 <?php } for($j=13; $j<=24; $j++){ ?>
 <td class="font" valign="top" align="center" style="background-color:<?php if($j==1 AND $res3['MJan']>0){echo '#97FF97';}elseif($j==2 AND $res3['MFeb']>0){echo '#97FF97';}elseif($j==3 AND $res3['MMar']>0){echo '#97FF97';}elseif($j==4 AND $res3['MApr']>0){echo '#97FF97';}elseif($j==5 AND $res3['MMay']>0){echo '#97FF97';}elseif($j==6 AND $res3['MJun']>0){echo '#97FF97';}elseif($j==7 AND $res3['MJul']>0){echo '#97FF97';}elseif($j==8 AND $res3['MAug']>0){echo '#97FF97';}elseif($j==9 AND $res3['MSep']>0){echo '#97FF97';}elseif($j==10 AND $res3['MOct']>0){echo '#97FF97';}elseif($j==11 AND $res3['MNov']>0){echo '#97FF97';}elseif($j==12 AND $res3['MDec']>0){echo '#97FF97';} ?>;">
 <select style="width:55px;font-family:Times New Roman; font-size:12px;" name="MnV_<?php echo $j; ?>" id="MnV_<?php echo $j; ?>">
<?php if($j==13){$sqla1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MJan'],$con); $resa1=mysql_fetch_assoc($sqla1); ?>
<option value="<?php if($res3['MJan']>0){echo $res3['MJan'];}else{echo 0;}?>"><?php if($res3['MJan']>0){echo $resa1['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($j==14){$sqlb1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MFeb'],$con); $resb1=mysql_fetch_assoc($sqlb1); ?>
<option value="<?php if($res3['MFeb']>0){echo $res3['MFeb'];}else{echo 0;}?>"><?php if($res3['MJan']>0){echo $resb1['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($j==15){$sqlc1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MMar'],$con); $resc1=mysql_fetch_assoc($sqlc1); ?>
<option value="<?php if($res3['MMar']>0){echo $res3['MMar'];}else{echo 0;}?>"><?php if($res3['MMar']>0){echo $resc1['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($j==16){$sqld1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MApr'],$con); $resd1=mysql_fetch_assoc($sqld1); ?>
<option value="<?php if($res3['MApr']>0){echo $res3['MApr'];}else{echo 0;}?>"><?php if($res3['MApr']>0){echo $resd1['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($j==17){$sqle1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MMay'],$con); $rese1=mysql_fetch_assoc($sqle1); ?>
<option value="<?php if($res3['MMay']>0){echo $res3['MMay'];}else{echo 0;}?>"><?php if($res3['MMay']>0){echo $rese1['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($j==18){$sqlf1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MJun'],$con); $resf1=mysql_fetch_assoc($sqlf1); ?>
<option value="<?php if($res3['MJun']>0){echo $res3['MJun'];}else{echo 0;}?>"><?php if($res3['MJun']>0){echo $resf1['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($j==19){$sqlg1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MJul'],$con); $resg1=mysql_fetch_assoc($sqlg1); ?>
<option value="<?php if($res3['MJul']>0){echo $res3['MJul'];}else{echo 0;}?>"><?php if($res3['MJul']>0){echo $resg1['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($j==20){$sqlh1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MAug'],$con); $resh1=mysql_fetch_assoc($sqlh1); ?>
<option value="<?php if($res3['MAug']>0){echo $res3['MAug'];}else{echo 0;}?>"><?php if($res3['MAug']>0){echo $resh1['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($j==21){$sqli1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MSep'],$con); $resi1=mysql_fetch_assoc($sqli1); ?>
<option value="<?php if($res3['MSep']>0){echo $res3['MSep'];}else{echo 0;}?>"><?php if($res3['MSep']>0){echo $resi1['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($j==22){$sqlj1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MOct'],$con); $resj1=mysql_fetch_assoc($sqlj1); ?>
<option value="<?php if($res3['MOct']>0){echo $res3['MOct'];}else{echo 0;}?>"><?php if($res3['MOct']>0){echo $resj1['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($j==23){$sqlk1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MNov'],$con); $resk1=mysql_fetch_assoc($sqlk1); ?>
<option value="<?php if($res3['MNov']>0){echo $res3['MNov'];}else{echo 0;}?>"><?php if($res3['MNov']>0){echo $resk1['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($j==24){$sqll1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MDec'],$con); $resl1=mysql_fetch_assoc($sqll1); ?> 
<option value="<?php if($res3['MDec']>0){echo $res3['MDec'];}else{echo 0;}?>"><?php if($res3['MDec']>0){echo $resl1['CycleCode'];}else{echo 'select';}?></option><?php } ?>  
<?php $sqlcy=mysql_query("select ProCycleId,CycleCode from hrm_sales_production_cycle order by CycleNo ASC",$con); while($rescy=mysql_fetch_assoc($sqlcy)){ ?>
<option value="<?php echo $rescy['ProCycleId']; ?>"><?php echo $rescy['CycleCode'] ?></option><?php } ?> 
 </select>
 </td>
 <?php } ?>
</tr>
</form> 
<?php } else { ?>	 
<tr>
 <td align="center" style="font:Times New Roman; font-size:12px;"><?php echo $SNo; ?></td>	   
 <td class="font2" valign="middle">&nbsp;<?php echo $res['SeasonName']; ?></td>
 <td align="center" valign="middle" style="font:Georgia; font-size:12px;"><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $res['SeasonId']; ?>)"></a></td>
<?php $sql2=mysql_query("select * from hrm_sales_season_month where Year=".$fromdate." AND SeasonId=".$res['SeasonId'], $con); $res2=mysql_fetch_assoc($sql2); ?>
 <?php for($i=1; $i<=12; $i++){ ?>
 <td class="font" valign="top" align="center" style="color:#000000;background-color:<?php if($i==1 AND $res2['MJan']>0){echo '#97FF97';}elseif($i==2 AND $res2['MFeb']>0){echo '#97FF97';}elseif($i==3 AND $res2['MMar']>0){echo '#97FF97';}elseif($i==4 AND $res2['MApr']>0){echo '#97FF97';}elseif($i==5 AND $res2['MMay']>0){echo '#97FF97';}elseif($i==6 AND $res2['MJun']>0){echo '#97FF97';}elseif($i==7 AND $res2['MJul']>0){echo '#97FF97';}elseif($i==8 AND $res2['MAug']>0){echo '#97FF97';}elseif($i==9 AND $res2['MSep']>0){echo '#97FF97';}elseif($i==10 AND $res2['MOct']>0){echo '#97FF97';}elseif($i==11 AND $res2['MNov']>0){echo '#97FF97';}elseif($i==12 AND $res2['MDec']>0){echo '#97FF97';} ?>;">
<?php if($i==1){if($res2['MJan']>0){ $sqla=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MJan'],$con); $resa=mysql_fetch_assoc($sqla); echo $resa['CycleCode'];}else{echo '&nbsp;';} } elseif($i==2){if($res2['MJan']>0){$sqlb=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MFeb'],$con); $resb=mysql_fetch_assoc($sqlb); echo $resb['CycleCode'];}else{echo '&nbsp;';} } elseif($i==3){if($res2['MMar']>0){$sqlc=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MMar'],$con); $resc=mysql_fetch_assoc($sqlc); echo $resc['CycleCode'];}else{echo '&nbsp;';} } elseif($i==4){if($res2['MApr']>0){$sqld=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MApr'],$con); $resd=mysql_fetch_assoc($sqld); echo $resd['CycleCode'];}else{echo '&nbsp;';} } elseif($i==5){if($res2['MMay']>0){$sqle=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MMay'],$con); $rese=mysql_fetch_assoc($sqle); echo $rese['CycleCode'];}else{echo '&nbsp;';} } elseif($i==6){if($res2['MJun']>0){$sqlf=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MJun'],$con); $resf=mysql_fetch_assoc($sqlf); echo $resf['CycleCode'];}else{echo '&nbsp;';} } elseif($i==7){if($res2['MJul']>0){$sqlg=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MJul'],$con); $resg=mysql_fetch_assoc($sqlg); echo $resg['CycleCode'];}else{echo '&nbsp;';}} elseif($i==8){if($res2['MAug']>0){$sqlh=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MAug'],$con); $resh=mysql_fetch_assoc($sqlh);  echo $resh['CycleCode'];}else{echo '&nbsp;';}} elseif($i==9){if($res2['MSep']>0){$sqli=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MSep'],$con); $resi=mysql_fetch_assoc($sqli); echo $resi['CycleCode'];}else{echo '&nbsp;';} } elseif($i==10){if($res2['MOct']>0){$sqlj=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MOct'],$con); $resj=mysql_fetch_assoc($sqlj); echo $resj['CycleCode'];}else{echo '&nbsp;';} } elseif($i==11){if($res2['MNov']>0){$sqlk=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MNov'],$con); $resk=mysql_fetch_assoc($sqlk);  echo $resk['CycleCode'];}else{echo '&nbsp;';} } elseif($i==12){if($res2['MDec']>0){$sqll=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MDec'],$con); $resl=mysql_fetch_assoc($sqll); echo $resl['CycleCode'];}else{echo '&nbsp;';}?><?php } ?>  
 </td>
 <?php $sql3=mysql_query("select * from hrm_sales_season_month where Year=".$todate." AND SeasonId=".$res['SeasonId'], $con); $res3=mysql_fetch_assoc($sql3); ?> 
 <?php } for($j=1; $j<=12; $j++){ ?>
 <td class="font" valign="top" align="center" style="color:#000000;background-color:<?php if($j==1 AND $res3['MJan']>0){echo '#97FF97';}elseif($j==2 AND $res3['MFeb']>0){echo '#97FF97';}elseif($j==3 AND $res3['MMar']>0){echo '#97FF97';}elseif($j==4 AND $res3['MApr']>0){echo '#97FF97';}elseif($j==5 AND $res3['MMay']>0){echo '#97FF97';}elseif($j==6 AND $res3['MJun']>0){echo '#97FF97';}elseif($j==7 AND $res3['MJul']>0){echo '#97FF97';}elseif($j==8 AND $res3['MAug']>0){echo '#97FF97';}elseif($j==9 AND $res3['MSep']>0){echo '#97FF97';}elseif($j==10 AND $res3['MOct']>0){echo '#97FF97';}elseif($j==11 AND $res3['MNov']>0){echo '#97FF97';}elseif($j==12 AND $res3['MDec']>0){echo '#97FF97';} ?>;">
<?php if($j==1){if($res3['MJan']>0){ $sqla1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MJan'],$con); $resa1=mysql_fetch_assoc($sqla1); echo $resa1['CycleCode'];}else{echo '&nbsp;';} } elseif($j==2){if($res3['MJan']>0){$sqlb1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MFeb'],$con); $resb1=mysql_fetch_assoc($sqlb1); echo $resb1['CycleCode'];}else{echo '&nbsp;';} } elseif($j==3){if($res3['MMar']>0){$sqlc1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MMar'],$con); $resc1=mysql_fetch_assoc($sqlc1); echo $resc1['CycleCode'];}else{echo '&nbsp;';}?>
<?php } elseif($j==4){if($res3['MApr']>0){$sqld1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MApr'],$con); $resd1=mysql_fetch_assoc($sqld1); echo $resd1['CycleCode'];}else{echo '&nbsp;';} } elseif($j==5){if($res3['MMay']>0){$sqle1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MMay'],$con); $rese1=mysql_fetch_assoc($sqle1); echo $rese1['CycleCode'];}else{echo '&nbsp;';} } elseif($j==6){if($res3['MJun']>0){$sqlf1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MJun'],$con); $resf1=mysql_fetch_assoc($sqlf1); echo $resf1['CycleCode'];}else{echo '&nbsp;';} } elseif($j==7){if($res3['MJul']>0){$sqlg1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MJul'],$con); $resg1=mysql_fetch_assoc($sqlg1); echo $resg1['CycleCode'];}else{echo '&nbsp;';} } elseif($j==8){if($res3['MAug']>0){$sqlh1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MAug'],$con); $resh1=mysql_fetch_assoc($sqlh1);  echo $resh1['CycleCode'];}else{echo '&nbsp;';} } elseif($j==9){if($res3['MSep']>0){$sqli1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MSep'],$con); $resi1=mysql_fetch_assoc($sqli1); echo $resi1['CycleCode'];}else{echo '&nbsp;';} } elseif($j==10){if($res3['MOct']>0){$sqlj1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MOct'],$con); $resj1=mysql_fetch_assoc($sqlj1); echo $resj1['CycleCode'];}else{echo '&nbsp;';} } elseif($j==11){if($res3['MNov']>0){$sqlk1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MNov'],$con); $resk1=mysql_fetch_assoc($sqlk1);  echo $resk1['CycleCode'];}else{echo '&nbsp;';} } elseif($j==12){if($res3['MDec']>0){$sqll1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MDec'],$con); $resl1=mysql_fetch_assoc($sqll1); echo $resl1['CycleCode'];}else{echo '&nbsp;';}?><?php } ?>  
 </td>
 <?php } ?>
</tr>
<?php } $SNo++;} ?>
<tr>
<td colspan="27" align="left" class="fontButton">
<input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
<input type="button" name="Refrash" value="refresh" onClick="javascript:window.location='SalesSeasonMonth.php?ac=4441&ee=4421&der=true3&c=false&d=dreefoultValue&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False&ci=<?php echo $_REQUEST['ci']; ?>&y=<?php echo $_REQUEST['y']; ?>'"/>
</td>
</tr>
	  </table>
	 </td>
    </tr>
  </table>  
</td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
    <td width="10">&nbsp;</td>  
    <td align="left" id="type" valign="top" style="display:block; width:50%">             
     <table border="0" width="1840">
	 <tr><td class="heading">&nbsp;Cereal Season</td></tr>
	 <tr>
	 <td align="left" width="1840">
	 <table border="1" width="1840" border="1" bgcolor="#FFFFFF">
<tr bgcolor="#808000">
 <td rowspan="2" align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:50px;"><b>SNo</b></td>
 <td rowspan="2" class="font" align="center" style="width:300px;"><b>Season Name</b></td>
 <td rowspan="2" align="center" style="font:Georgia; font-size:11px; width:50px; color:#FFFFFF"><b>Action</b></td>
 <td colspan="12" class="font" align="center" style="width:720px;"><b><?php echo $fromdate; ?></b></td>
 <td colspan="12" class="font" align="center" style="width:720px;"><b><?php echo $todate; ?></b></td>
</tr>
<tr bgcolor="#808000">
 <?php for($i=1; $i<=24; $i++){ if($i==1 OR $i==13){$Mn='Jan';}elseif($i==2 OR $i==14){$Mn='Feb';}elseif($i==3 OR $i==15){$Mn='Mar';}elseif($i==4 OR $i==16){$Mn='Apr';}elseif($i==5 OR $i==17){$Mn='May';}elseif($i==6 OR $i==18){$Mn='Jun';}elseif($i==7 OR $i==19){$Mn='Jul';}elseif($i==8 OR $i==20){$Mn='Aug';}elseif($i==9 OR $i==21){$Mn='Sep';}elseif($i==10 OR $i==22){$Mn='Oct';}elseif($i==11 OR $i==23){$Mn='Nov';}elseif($i==12 OR $i==24){$Mn='Dec';}?>
 <td class="font" align="center" style="width:40px;"><b><?php echo $Mn; ?></b></td>
 <?php } ?>
</tr>
<?php $sql=mysql_query("select * from hrm_sales_season where GroupId=2 order by SeasonId ASC", $con); $SNo=1; while($res=mysql_fetch_array($sql)) {
if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit2" && $_REQUEST['eid']==$res['SeasonId']){ ?>
<form name="OformEdit" method="post" onSubmit="return OvalidateEdit(this)">	
<tr>
 <td align="center" style="font:Georgia;font-size:12px;" valign="top"><?php echo $SNo; ?></td>
 <td class="font2" valign="middle">&nbsp;<?php echo $res['SeasonName']; ?><input type="hidden" id="SeasonId2" value="<?php echo $res['SeasonId']; ?>" /></td>
 <td align="center" valign="middle" style="font:Georgia; font-size:11px;width:50px;" valign="top">
 <input type="hidden" id="fd2" name="fd2" value="<?php echo $fromdate; ?>" /><input type="hidden" id="td2" name="td2" value="<?php echo $todate; ?>" />
 <input type="submit" name="SaveEdit2"  value="" class="SaveButton"><input type="hidden" name="SeasonId2" id="SeasonId2" value="<?php echo $_REQUEST['eid']; ?>"/></td>
 <?php $sql2=mysql_query("select * from hrm_sales_season_month where Year=".$fromdate." AND SeasonId=".$res['SeasonId'], $con); $res2=mysql_fetch_assoc($sql2); ?>
 <?php for($i=1; $i<=12; $i++){ ?>
 <td class="font" valign="top" align="center" style="background-color:<?php if($i==1 AND $res2['MJan']>0){echo '#97FF97';}elseif($i==2 AND $res2['MFeb']>0){echo '#97FF97';}elseif($i==3 AND $res2['MMar']>0){echo '#97FF97';}elseif($i==4 AND $res2['MApr']>0){echo '#97FF97';}elseif($i==5 AND $res2['MMay']>0){echo '#97FF97';}elseif($i==6 AND $res2['MJun']>0){echo '#97FF97';}elseif($i==7 AND $res2['MJul']>0){echo '#97FF97';}elseif($i==8 AND $res2['MAug']>0){echo '#97FF97';}elseif($i==9 AND $res2['MSep']>0){echo '#97FF97';}elseif($i==10 AND $res2['MOct']>0){echo '#97FF97';}elseif($i==11 AND $res2['MNov']>0){echo '#97FF97';}elseif($i==12 AND $res2['MDec']>0){echo '#97FF97';} ?>;">
 <select style="width:55px;font-family:Times New Roman;font-size:12px;" name="Mn2V_<?php echo $i; ?>" id="Mn2V_<?php echo $i; ?>">
<?php if($i==1){$sqla=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MJan'],$con); $resa=mysql_fetch_assoc($sqla); ?>
<option value="<?php if($res2['MJan']>0){echo $res2['MJan'];}else{echo 0;}?>"><?php if($res2['MJan']>0){echo $resa['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($i==2){$sqlb=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MFeb'],$con); $resb=mysql_fetch_assoc($sqlb); ?>
<option value="<?php if($res2['MFeb']>0){echo $res2['MFeb'];}else{echo 0;}?>"><?php if($res2['MJan']>0){echo $resb['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($i==3){$sqlc=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MMar'],$con); $resc=mysql_fetch_assoc($sqlc); ?>
<option value="<?php if($res2['MMar']>0){echo $res2['MMar'];}else{echo 0;}?>"><?php if($res2['MMar']>0){echo $resc['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($i==4){$sqld=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MApr'],$con); $resd=mysql_fetch_assoc($sqld); ?>
<option value="<?php if($res2['MApr']>0){echo $res2['MApr'];}else{echo 0;}?>"><?php if($res2['MApr']>0){echo $resd['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($i==5){$sqle=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MMay'],$con); $rese=mysql_fetch_assoc($sqle); ?>
<option value="<?php if($res2['MMay']>0){echo $res2['MMay'];}else{echo 0;}?>"><?php if($res2['MMay']>0){echo $rese['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($i==6){$sqlf=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MJun'],$con); $resf=mysql_fetch_assoc($sqlf); ?>
<option value="<?php if($res2['MJun']>0){echo $res2['MJun'];}else{echo 0;}?>"><?php if($res2['MJun']>0){echo $resf['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($i==7){$sqlg=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MJul'],$con); $resg=mysql_fetch_assoc($sqlg); ?>
<option value="<?php if($res2['MJul']>0){echo $res2['MJul'];}else{echo 0;}?>"><?php if($res2['MJul']>0){echo $resg['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($i==8){$sqlh=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MAug'],$con); $resh=mysql_fetch_assoc($sqlh); ?>
<option value="<?php if($res2['MAug']>0){echo $res2['MAug'];}else{echo 0;}?>"><?php if($res2['MAug']>0){echo $resh['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($i==9){$sqli=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MSep'],$con); $resi=mysql_fetch_assoc($sqli); ?>
<option value="<?php if($res2['MSep']>0){echo $res2['MSep'];}else{echo 0;}?>"><?php if($res2['MSep']>0){echo $resi['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($i==10){$sqlj=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MOct'],$con); $resj=mysql_fetch_assoc($sqlj); ?>
<option value="<?php if($res2['MOct']>0){echo $res2['MOct'];}else{echo 0;}?>"><?php if($res2['MOct']>0){echo $resj['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($i==11){$sqlk=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MNov'],$con); $resk=mysql_fetch_assoc($sqlk); ?>
<option value="<?php if($res2['MNov']>0){echo $res2['MNov'];}else{echo 0;}?>"><?php if($res2['MNov']>0){echo $resk['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($i==12){$sqll=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MDec'],$con); $resl=mysql_fetch_assoc($sqll); ?> 
<option value="<?php if($res2['MDec']>0){echo $res2['MDec'];}else{echo 0;}?>"><?php if($res2['MDec']>0){echo $resl['CycleCode'];}else{echo 'select';}?></option><?php } ?>  
<?php $sqlcy=mysql_query("select ProCycleId,CycleCode from hrm_sales_production_cycle order by CycleNo ASC",$con); while($rescy=mysql_fetch_assoc($sqlcy)){ ?>
<option value="<?php echo $rescy['ProCycleId']; ?>"><?php echo $rescy['CycleCode'] ?></option><?php } ?> 
 </select>
 </td>
 <?php $sql3=mysql_query("select * from hrm_sales_season_month where Year=".$todate." AND SeasonId=".$res['SeasonId'], $con); $res3=mysql_fetch_assoc($sql3); ?> 
 <?php } for($j=13; $j<=24; $j++){ ?>
 <td class="font" valign="top" align="center" style="background-color:<?php if($j==1 AND $res3['MJan']>0){echo '#97FF97';}elseif($j==2 AND $res3['MFeb']>0){echo '#97FF97';}elseif($j==3 AND $res3['MMar']>0){echo '#97FF97';}elseif($j==4 AND $res3['MApr']>0){echo '#97FF97';}elseif($j==5 AND $res3['MMay']>0){echo '#97FF97';}elseif($j==6 AND $res3['MJun']>0){echo '#97FF97';}elseif($j==7 AND $res3['MJul']>0){echo '#97FF97';}elseif($j==8 AND $res3['MAug']>0){echo '#97FF97';}elseif($j==9 AND $res3['MSep']>0){echo '#97FF97';}elseif($j==10 AND $res3['MOct']>0){echo '#97FF97';}elseif($j==11 AND $res3['MNov']>0){echo '#97FF97';}elseif($j==12 AND $res3['MDec']>0){echo '#97FF97';} ?>;">
 <select style="width:55px;font-family:Times New Roman; font-size:12px;" name="Mn2V_<?php echo $j; ?>" id="Mn2V_<?php echo $j; ?>">
<?php if($j==13){$sqla1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MJan'],$con); $resa1=mysql_fetch_assoc($sqla1); ?>
<option value="<?php if($res3['MJan']>0){echo $res3['MJan'];}else{echo 0;}?>"><?php if($res3['MJan']>0){echo $resa1['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($j==14){$sqlb1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MFeb'],$con); $resb1=mysql_fetch_assoc($sqlb1); ?>
<option value="<?php if($res3['MFeb']>0){echo $res3['MFeb'];}else{echo 0;}?>"><?php if($res3['MJan']>0){echo $resb1['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($j==15){$sqlc1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MMar'],$con); $resc1=mysql_fetch_assoc($sqlc1); ?>
<option value="<?php if($res3['MMar']>0){echo $res3['MMar'];}else{echo 0;}?>"><?php if($res3['MMar']>0){echo $resc1['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($j==16){$sqld1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MApr'],$con); $resd1=mysql_fetch_assoc($sqld1); ?>
<option value="<?php if($res3['MApr']>0){echo $res3['MApr'];}else{echo 0;}?>"><?php if($res3['MApr']>0){echo $resd1['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($j==17){$sqle1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MMay'],$con); $rese1=mysql_fetch_assoc($sqle1); ?>
<option value="<?php if($res3['MMay']>0){echo $res3['MMay'];}else{echo 0;}?>"><?php if($res3['MMay']>0){echo $rese1['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($j==18){$sqlf1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MJun'],$con); $resf1=mysql_fetch_assoc($sqlf1); ?>
<option value="<?php if($res3['MJun']>0){echo $res3['MJun'];}else{echo 0;}?>"><?php if($res3['MJun']>0){echo $resf1['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($j==19){$sqlg1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MJul'],$con); $resg1=mysql_fetch_assoc($sqlg1); ?>
<option value="<?php if($res3['MJul']>0){echo $res3['MJul'];}else{echo 0;}?>"><?php if($res3['MJul']>0){echo $resg1['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($j==20){$sqlh1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MAug'],$con); $resh1=mysql_fetch_assoc($sqlh1); ?>
<option value="<?php if($res3['MAug']>0){echo $res3['MAug'];}else{echo 0;}?>"><?php if($res3['MAug']>0){echo $resh1['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($j==21){$sqli1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MSep'],$con); $resi1=mysql_fetch_assoc($sqli1); ?>
<option value="<?php if($res3['MSep']>0){echo $res3['MSep'];}else{echo 0;}?>"><?php if($res3['MSep']>0){echo $resi1['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($j==22){$sqlj1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MOct'],$con); $resj1=mysql_fetch_assoc($sqlj1); ?>
<option value="<?php if($res3['MOct']>0){echo $res3['MOct'];}else{echo 0;}?>"><?php if($res3['MOct']>0){echo $resj1['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($j==23){$sqlk1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MNov'],$con); $resk1=mysql_fetch_assoc($sqlk1); ?>
<option value="<?php if($res3['MNov']>0){echo $res3['MNov'];}else{echo 0;}?>"><?php if($res3['MNov']>0){echo $resk1['CycleCode'];}else{echo 'select';}?></option>
<?php } elseif($j==24){$sqll1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MDec'],$con); $resl1=mysql_fetch_assoc($sqll1); ?> 
<option value="<?php if($res3['MDec']>0){echo $res3['MDec'];}else{echo 0;}?>"><?php if($res3['MDec']>0){echo $resl1['CycleCode'];}else{echo 'select';}?></option><?php } ?>  
<?php $sqlcy=mysql_query("select ProCycleId,CycleCode from hrm_sales_production_cycle order by CycleNo ASC",$con); while($rescy=mysql_fetch_assoc($sqlcy)){ ?>
<option value="<?php echo $rescy['ProCycleId']; ?>"><?php echo $rescy['CycleCode'] ?></option><?php } ?> 
 </select>
 </td>
 <?php } ?>
</tr>
</form> 
<?php } else { ?>	 
<tr>
 <td align="center" style="font:Times New Roman; font-size:12px;"><?php echo $SNo; ?></td>	   
 <td class="font2" valign="middle">&nbsp;<?php echo $res['SeasonName']; ?></td>
 <td align="center" valign="middle" style="font:Georgia; font-size:12px;"><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit2(<?php echo $res['SeasonId']; ?>)"></a></td>
<?php $sql2=mysql_query("select * from hrm_sales_season_month where Year=".$fromdate." AND SeasonId=".$res['SeasonId'], $con); $res2=mysql_fetch_assoc($sql2); ?>
 <?php for($i=1; $i<=12; $i++){ ?>
 <td class="font" valign="top" align="center" style="color:#000000;background-color:<?php if($i==1 AND $res2['MJan']>0){echo '#97FF97';}elseif($i==2 AND $res2['MFeb']>0){echo '#97FF97';}elseif($i==3 AND $res2['MMar']>0){echo '#97FF97';}elseif($i==4 AND $res2['MApr']>0){echo '#97FF97';}elseif($i==5 AND $res2['MMay']>0){echo '#97FF97';}elseif($i==6 AND $res2['MJun']>0){echo '#97FF97';}elseif($i==7 AND $res2['MJul']>0){echo '#97FF97';}elseif($i==8 AND $res2['MAug']>0){echo '#97FF97';}elseif($i==9 AND $res2['MSep']>0){echo '#97FF97';}elseif($i==10 AND $res2['MOct']>0){echo '#97FF97';}elseif($i==11 AND $res2['MNov']>0){echo '#97FF97';}elseif($i==12 AND $res2['MDec']>0){echo '#97FF97';} ?>;">
<?php if($i==1){if($res2['MJan']>0){ $sqla=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MJan'],$con); $resa=mysql_fetch_assoc($sqla); echo $resa['CycleCode'];}else{echo '&nbsp;';} } elseif($i==2){if($res2['MJan']>0){$sqlb=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MFeb'],$con); $resb=mysql_fetch_assoc($sqlb); echo $resb['CycleCode'];}else{echo '&nbsp;';} } elseif($i==3){if($res2['MMar']>0){$sqlc=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MMar'],$con); $resc=mysql_fetch_assoc($sqlc); echo $resc['CycleCode'];}else{echo '&nbsp;';} } elseif($i==4){if($res2['MApr']>0){$sqld=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MApr'],$con); $resd=mysql_fetch_assoc($sqld); echo $resd['CycleCode'];}else{echo '&nbsp;';} } elseif($i==5){if($res2['MMay']>0){$sqle=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MMay'],$con); $rese=mysql_fetch_assoc($sqle); echo $rese['CycleCode'];}else{echo '&nbsp;';} } elseif($i==6){if($res2['MJun']>0){$sqlf=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MJun'],$con); $resf=mysql_fetch_assoc($sqlf); echo $resf['CycleCode'];}else{echo '&nbsp;';} } elseif($i==7){if($res2['MJul']>0){$sqlg=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MJul'],$con); $resg=mysql_fetch_assoc($sqlg); echo $resg['CycleCode'];}else{echo '&nbsp;';}} elseif($i==8){if($res2['MAug']>0){$sqlh=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MAug'],$con); $resh=mysql_fetch_assoc($sqlh);  echo $resh['CycleCode'];}else{echo '&nbsp;';}} elseif($i==9){if($res2['MSep']>0){$sqli=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MSep'],$con); $resi=mysql_fetch_assoc($sqli); echo $resi['CycleCode'];}else{echo '&nbsp;';} } elseif($i==10){if($res2['MOct']>0){$sqlj=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MOct'],$con); $resj=mysql_fetch_assoc($sqlj); echo $resj['CycleCode'];}else{echo '&nbsp;';} } elseif($i==11){if($res2['MNov']>0){$sqlk=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MNov'],$con); $resk=mysql_fetch_assoc($sqlk);  echo $resk['CycleCode'];}else{echo '&nbsp;';} } elseif($i==12){if($res2['MDec']>0){$sqll=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res2['MDec'],$con); $resl=mysql_fetch_assoc($sqll); echo $resl['CycleCode'];}else{echo '&nbsp;';}?><?php } ?>  
 </td>
 <?php $sql3=mysql_query("select * from hrm_sales_season_month where Year=".$todate." AND SeasonId=".$res['SeasonId'], $con); $res3=mysql_fetch_assoc($sql3); ?> 
 <?php } for($j=1; $j<=12; $j++){ ?>
 <td class="font" valign="top" align="center" style="color:#000000;background-color:<?php if($j==1 AND $res3['MJan']>0){echo '#97FF97';}elseif($j==2 AND $res3['MFeb']>0){echo '#97FF97';}elseif($j==3 AND $res3['MMar']>0){echo '#97FF97';}elseif($j==4 AND $res3['MApr']>0){echo '#97FF97';}elseif($j==5 AND $res3['MMay']>0){echo '#97FF97';}elseif($j==6 AND $res3['MJun']>0){echo '#97FF97';}elseif($j==7 AND $res3['MJul']>0){echo '#97FF97';}elseif($j==8 AND $res3['MAug']>0){echo '#97FF97';}elseif($j==9 AND $res3['MSep']>0){echo '#97FF97';}elseif($j==10 AND $res3['MOct']>0){echo '#97FF97';}elseif($j==11 AND $res3['MNov']>0){echo '#97FF97';}elseif($j==12 AND $res3['MDec']>0){echo '#97FF97';} ?>;">
<?php if($j==1){if($res3['MJan']>0){ $sqla1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MJan'],$con); $resa1=mysql_fetch_assoc($sqla1); echo $resa1['CycleCode'];}else{echo '&nbsp;';} } elseif($j==2){if($res3['MJan']>0){$sqlb1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MFeb'],$con); $resb1=mysql_fetch_assoc($sqlb1); echo $resb1['CycleCode'];}else{echo '&nbsp;';} } elseif($j==3){if($res3['MMar']>0){$sqlc1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MMar'],$con); $resc1=mysql_fetch_assoc($sqlc1); echo $resc1['CycleCode'];}else{echo '&nbsp;';}?>
<?php } elseif($j==4){if($res3['MApr']>0){$sqld1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MApr'],$con); $resd1=mysql_fetch_assoc($sqld1); echo $resd1['CycleCode'];}else{echo '&nbsp;';} } elseif($j==5){if($res3['MMay']>0){$sqle1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MMay'],$con); $rese1=mysql_fetch_assoc($sqle1); echo $rese1['CycleCode'];}else{echo '&nbsp;';} } elseif($j==6){if($res3['MJun']>0){$sqlf1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MJun'],$con); $resf1=mysql_fetch_assoc($sqlf1); echo $resf1['CycleCode'];}else{echo '&nbsp;';} } elseif($j==7){if($res3['MJul']>0){$sqlg1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MJul'],$con); $resg1=mysql_fetch_assoc($sqlg1); echo $resg1['CycleCode'];}else{echo '&nbsp;';} } elseif($j==8){if($res3['MAug']>0){$sqlh1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MAug'],$con); $resh1=mysql_fetch_assoc($sqlh1);  echo $resh1['CycleCode'];}else{echo '&nbsp;';} } elseif($j==9){if($res3['MSep']>0){$sqli1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MSep'],$con); $resi1=mysql_fetch_assoc($sqli1); echo $resi1['CycleCode'];}else{echo '&nbsp;';} } elseif($j==10){if($res3['MOct']>0){$sqlj1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MOct'],$con); $resj1=mysql_fetch_assoc($sqlj1); echo $resj1['CycleCode'];}else{echo '&nbsp;';} } elseif($j==11){if($res3['MNov']>0){$sqlk1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MNov'],$con); $resk1=mysql_fetch_assoc($sqlk1);  echo $resk1['CycleCode'];}else{echo '&nbsp;';} } elseif($j==12){if($res3['MDec']>0){$sqll1=mysql_query("select CycleCode from hrm_sales_production_cycle where ProCycleId=".$res3['MDec'],$con); $resl1=mysql_fetch_assoc($sqll1); echo $resl1['CycleCode'];}else{echo '&nbsp;';}?><?php } ?>  
 </td>
 <?php } ?>
</tr>
<?php } $SNo++;} ?>
<tr>
<td colspan="27" align="left" class="fontButton">
<input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
<input type="button" name="Refrash" value="refresh" onClick="javascript:window.location='SalesSeasonMonth.php?ac=4441&ee=4421&der=true3&c=false&d=dreefoultValue&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False&ci=<?php echo $_REQUEST['ci']; ?>&y=<?php echo $_REQUEST['y']; ?>'"/>
</td>
	  </table>
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
</table>
</body>
</html>
