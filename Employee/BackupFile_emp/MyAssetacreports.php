<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>

<style>.font { color:#ffffff; font-family:Georgia; font-size:11px; width:200px;} .font1 { font-family:Georgia; font-size:11px; height:14px; } 
.font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }
.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function FunAll()
{ if(document.getElementById("allc").checked==true){ document.getElementById("allotc").checked=false; 
  document.getElementById("reqtc").checked=false;    document.getElementById("allot").value=0; 
  document.getElementById("reqt").value=0;           document.getElementById("all").value=1; } }
	
function FunAllot()
{ if(document.getElementById("allotc").checked==true){ document.getElementById("allc").checked=false; 
  document.getElementById("reqtc").checked=false;      document.getElementById("all").value=0; 
  document.getElementById("reqt").value=0;             document.getElementById("allot").value=1; } }
	
function FunRequest()
{ if(document.getElementById("reqtc").checked==true){ document.getElementById("allc").checked=false; 
  document.getElementById("allotc").checked=false;    document.getElementById("all").value=0; 
  document.getElementById("allot").value=0;           document.getElementById("reqt").value=1; } }

function ChangeYear(v)
{
 if(document.getElementById("allc").checked==false && document.getElementById("allotc").checked==false && document.getElementById("reqtc").checked==false){ alert("Please check any one radio button!!"); return false;}
 var chk=document.getElementById("chk").value;   var chk2=document.getElementById("chk2").value; 
 var chk3=document.getElementById("chk3").value; var chk4=document.getElementById("chk4").value; 
 var alla=document.getElementById("all").value;  var allot=document.getElementById("allot").value; 
 var reqt=document.getElementById("reqt").value; var d=document.getElementById("d").value;
 var c=document.getElementById("c").value; var ast=document.getElementById("ast").value; var yer=v;
 var Demph=document.getElementById("Demph").value; var apph=document.getElementById("apph").value;
 var drah=document.getElementById("drah").value; var oveh=document.getElementById("oveh").value;
 window.location="MyAssetacreports.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&wew=e%e@er%rdd=012&page=1&chk="+chk+"&allot="+allot+"&reqt="+reqt+"&all="+alla+"&d="+d+"&ast="+ast+"&yer="+yer+"&ss=89&f=0i&wer=true&c="+c+"&chk2="+chk2+"&chk3="+chk3+"&chk4="+chk4+"&Demp="+Demph+"&app="+apph+"&dra="+drah+"&ove="+oveh;
}

function ChangeDept(v)
{ 
 if(document.getElementById("allc").checked==false && document.getElementById("allotc").checked==false && document.getElementById("reqtc").checked==false){alert("Please check any one radio button!!"); return false;}
 var chk=document.getElementById("chk").value;   var chk2=document.getElementById("chk2").value; 
 var chk3=document.getElementById("chk3").value; var chk4=document.getElementById("chk4").value; 
 var alla=document.getElementById("all").value;  var allot=document.getElementById("allot").value; 
 var reqt=document.getElementById("reqt").value; var yer=document.getElementById("yer").value;
 var c=document.getElementById("c").value; var ast=document.getElementById("ast").value; var d=v;
 var Demph=document.getElementById("Demph").value; var apph=document.getElementById("apph").value;
 var drah=document.getElementById("drah").value; var oveh=document.getElementById("oveh").value;
 window.location="MyAssetacreports.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&wew=e%e@er%rdd=012&page=1&chk="+chk+"&allot="+allot+"&reqt="+reqt+"&all="+alla+"&d="+d+"&ast="+ast+"&yer="+yer+"&ss=89&f=0i&wer=true&c="+c+"&chk2="+chk2+"&chk3="+chk3+"&chk4="+chk4+"&Demp="+Demph+"&app="+apph+"&dra="+drah+"&ove="+oveh;
}

function ChangeDemp(v)
{ document.getElementById("Demph").value=1;
  if(document.getElementById("allc").checked==false && document.getElementById("allotc").checked==false && document.getElementById("reqtc").checked==false){alert("Please check any one radio button!!"); return false;}
  var chk=document.getElementById("chk").value;   var chk2=document.getElementById("chk2").value; 
  var chk3=document.getElementById("chk3").value; var chk4=document.getElementById("chk4").value; 
  var alla=document.getElementById("all").value;  var allot=document.getElementById("allot").value; 
  var reqt=document.getElementById("reqt").value; var yer=document.getElementById("yer").value;
  var c=document.getElementById("c").value; var ast=document.getElementById("ast").value; 
  var d=document.getElementById("d").value;
  var Demph=document.getElementById("Demph").value; var apph=document.getElementById("apph").value;
  var drah=document.getElementById("drah").value; var oveh=document.getElementById("oveh").value;
 window.location="MyAssetacreports.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&wew=e%e@er%rdd=012&page=1&chk="+chk+"&allot="+allot+"&reqt="+reqt+"&all="+alla+"&d="+d+"&ast="+ast+"&yer="+yer+"&ss=89&f=0i&wer=true&c="+c+"&chk2="+chk2+"&chk3="+chk3+"&chk4="+chk4+"&Demp="+Demph+"&app="+apph+"&dra="+drah+"&ove="+oveh+"&emp="+v;
}

function ChangeAsset(v)
{ 
 if(document.getElementById("allc").checked==false && document.getElementById("allotc").checked==false && document.getElementById("reqtc").checked==false){ alert("Please check any one radio button!!"); return false;}
 var chk=document.getElementById("chk").value;   var chk2=document.getElementById("chk2").value; 
 var chk3=document.getElementById("chk3").value; var chk4=document.getElementById("chk4").value; 
 var alla=document.getElementById("all").value;  var allot=document.getElementById("allot").value;
 var reqt=document.getElementById("reqt").value; var d=document.getElementById("d").value; 
 var c=document.getElementById("c").value; var yer=document.getElementById("yer").value; var ast=v;
 var Demph=document.getElementById("Demph").value; var apph=document.getElementById("apph").value;
 var drah=document.getElementById("drah").value; var oveh=document.getElementById("oveh").value;
 window.location="MyAssetacreports.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&wew=e%e@er%rdd=012&page=1&chk="+chk+"&allot="+allot+"&reqt="+reqt+"&all="+alla+"&d="+d+"&ast="+ast+"&yer="+yer+"&ss=89&f=0i&wer=true&c="+c+"&chk2="+chk2+"&chk3="+chk3+"&chk4="+chk4+"&Demp="+Demph+"&app="+apph+"&dra="+drah+"&ove="+oveh;
}

function FunClickAssetReq(Aeri,ID)
{ window.open("MyAssetitDetailViewReq.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&wew=e%e@er%rdd=012&CheckAct=ExtraReqField&ID="+ID+"&Aeri="+Aeri,"AForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=700,height=550");  }

function FunClickAsset(Aei,ID)
{ window.open("MyAssetitDetailView.php?CheckAct=ExtraField&ID="+ID+"&Aei="+Aei,"AForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=550,height=400"); }


function Exportrep(v)
{ var chk=document.getElementById("chk").value;   var chk2=document.getElementById("chk2").value; 
  var chk3=document.getElementById("chk3").value; var chk4=document.getElementById("chk4").value; 
  var alla=document.getElementById("all").value;  var allot=document.getElementById("allot").value; 
  var reqt=document.getElementById("reqt").value; var d=document.getElementById("d").value;
  var c=document.getElementById("c").value;       var yer=document.getElementById("yer").value; 
  var ast=document.getElementById("ast").value;   var Demph=document.getElementById("Demph").value; 
  var apph=document.getElementById("apph").value; var drah=document.getElementById("drah").value; 
  var oveh=document.getElementById("oveh").value; var emph=document.getElementById("emph").value;
  if(v=='R'){window.open("MyAssetExportrep.php?action=RRtrue&mm=sas&ask=false&ww=rightProtect&we=12345&wew=e%e@er%rdd=012&page=1&chk="+chk+"&allot="+allot+"&reqt="+reqt+"&all="+alla+"&d="+d+"&ast="+ast+"&yer="+yer+"&ss=89&f=0i&wer=true&c="+c+"&chk2="+chk2+"&chk3="+chk3+"&chk4="+chk4+"&Demp="+Demph+"&app="+apph+"&dra="+drah+"&ove="+oveh+"&emp="+emph,"ExportForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}
  else if(v=='A'){window.open("MyAssetExportrep.php?action=AAtrue&mm=sas&ask=false&ww=rightProtect&we=12345&wew=e%e@er%rdd=012&page=1&chk="+chk+"&allot="+allot+"&reqt="+reqt+"&all="+alla+"&d="+d+"&ast="+ast+"&yer="+yer+"&ss=89&f=0i&wer=true&c="+c+"&chk2="+chk2+"&chk3="+chk3+"&chk4="+chk4+"&Demp="+Demph+"&app="+apph+"&dra="+drah+"&ove="+oveh+"&emp="+emph,"ExportForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}
}

/*
function FunADO(v)
{ if(v==1 && document.getElementById("app").checked==true){  document.getElementById("apph").value=1; } 
  else if(v==1 && document.getElementById("app").checked==false){ document.getElementById("apph").value=0; }
  else if(v==2 && document.getElementById("dra").checked==true){  document.getElementById("drah").value=1; } 
  else if(v==2 && document.getElementById("dra").checked==false){ document.getElementById("drah").value=0; }
  else if(v==3 && document.getElementById("ove").checked==true){  document.getElementById("oveh").value=1; } 
  else if(v==3 && document.getElementById("ove").checked==false){ document.getElementById("oveh").value=0; }
} 
*/

//Funapp() Fundra() Funove() ChangeDemp(v)$_REQUEST['Demp']
</script>
</head>
<body class="body">
<input type="hidden" id="chk" value="<?php echo $_REQUEST['chk']; ?>" />
<input type="hidden" id="chk2" value="<?php echo $_REQUEST['chk2']; ?>" />
<input type="hidden" id="chk3" value="<?php echo $_REQUEST['chk3']; ?>" />
<input type="hidden" id="chk4" value="<?php echo $_REQUEST['chk4']; ?>" />
<input type="hidden" id="allot" value="<?php echo $_REQUEST['allot']; ?>" />
<input type="hidden" id="reqt" value="<?php echo $_REQUEST['reqt']; ?>" />
<input type="hidden" id="d" value="<?php echo $_REQUEST['d']; ?>" />
<input type="hidden" id="ast" value="<?php echo $_REQUEST['ast']; ?>" />
<input type="hidden" id="yer" value="<?php echo $_REQUEST['yer']; ?>" />
<input type="hidden" id="all" value="<?php echo $_REQUEST['all']; ?>" />
<input type="hidden" id="c" value="<?php echo $CompanyId; ?>" />
<input type="hidden" id="Demph" value="<?php echo $_REQUEST['Demp']; ?>" />
<input type="hidden" id="apph" value="<?php echo $_REQUEST['app']; ?>" />
<input type="hidden" id="drah" value="<?php echo $_REQUEST['dra']; ?>" />
<input type="hidden" id="oveh" value="<?php echo $_REQUEST['ove']; ?>" />
<input type="hidden" id="emph" value="<?php if($_REQUEST['emp']>0){echo $_REQUEST['emp'];}else{ echo 0;} ?>" />

<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table></td></tr>
<tr>
 <td>
 <table style="margin-top:0px;">
  <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
  <tr><td valign="top">
	  <table border="0" cellpadding="0">
	   <tr><td valign="top"> 
<?php //*************************************************************************************************************************************************** ?>	  
<?php if($_REQUEST['chk']==$EmployeeId OR $_REQUEST['chk2']==$EmployeeId OR $_REQUEST['chk3']==$EmployeeId OR $_REQUEST['chk4']==$EmployeeId) { ?> 
		   <table border="0" id="Activity">
			<tr><td id="Anni" valign="top"><table border="0"><tr height="20"><td align="left" valign="top"><?php /* include("EmpImgEmp.php"); */ ?></td></tr></table></td>
				<td align="left" valign="top">
                <table border="0">
               <tr>
              <td colspan="10">
  <table border="0">
   <tr>
   <td><table border="0"><tr><?php //&allot=0&reqt=0 ?>
   
   <td class="TableHead"><font color="#106809" style='font-family:Times New Roman;' size="4"><i><b>Reports : </b></i></font>&nbsp;&nbsp;&nbsp;&nbsp;</td>
   
   <td class="td1" style="font-size:11px; width:90px;"><select style="font-size:12px;width:90px;height:22px; background-color:#DDFFBB;" name="YearE" id="YearE" onChange="ChangeYear(this.value)"><?php if($_REQUEST['yer']>0){ $sqlY=mysql_query("SELECT FromDate,ToDate FROM hrm_year WHERE YearId=".$_REQUEST['yer'], $con); 
   $resY=mysql_fetch_assoc($sqlY); $fromdate=date("Y",strtotime($resY['FromDate'])); $todate=date("Y",strtotime($resY['ToDate']));  echo '<option value='.$_REQUEST['yer'].' style="margin-left:0px; background-color:#84D9D5;" selected>&nbsp;'.$fromdate.'-'.$todate.'</option>'; } elseif($_REQUEST['yer']=='AllY'){ echo '<option value="AllY">&nbsp;All YEAR</option>'; } else { echo '<option value="0" style="margin-left:0px; background-color:#84D9D5;" selected>YEAR</option>'; }
 if($_REQUEST['yer']!='AllY'){ $SqlYear=mysql_query("select YearId,FromDate,ToDate from hrm_year where YearId!=".$_REQUEST['yer']." order by FromDate ASC", $con); } 
 if($_REQUEST['yer']=='AllY'){ $SqlYear=mysql_query("select YearId,FromDate,ToDate from hrm_year order by FromDate ASC", $con); }
 while($ResYear=mysql_fetch_array($SqlYear)){ 
$FD=date("Y",strtotime($ResYear['FromDate'])); $TD=date("Y",strtotime($ResYear['ToDate'])); ?><option value="<?php echo $ResYear['YearId']; ?>"><?php echo $FD.'-'.$TD; ?></option><?php } ?><option value="AllY">All YEAR</option></select>
  </td>
  <td class="td1" style="font-size:11px;width:120px;"><select style="font-size:12px; width:120px; height:22px; background-color:#DDFFBB; display:block;" name="AssetE" id="AssetE" onChange="ChangeAsset(this.value)"><?php if($_REQUEST['ast']>0){ $sqlA=mysql_query("SELECT AssetName FROM hrm_asset_name WHERE AssetNId=".$_REQUEST['ast'], $con); $resA=mysql_fetch_assoc($sqlA); echo '<option value='.$_REQUEST['ast'].' style="margin-left:0px; background-color:#84D9D5;" selected>'.strtoupper($resA['AssetName']).'</option>'; } elseif($_REQUEST['ast']=='AllA'){ echo '<option value="AllA">All ASSETS</option>'; } else { echo '<option value="0" style="margin-left:0px; background-color:#84D9D5;" selected>ASSETS</option>'; }
$SqlAsset=mysql_query("select AssetNId,AssetName from hrm_asset_name where Status='A' order by AssetName ASC", $con); while($ResAsset=mysql_fetch_array($SqlAsset)) { ?><option value="<?php echo $ResAsset['AssetNId']; ?>"><?php echo strtoupper($ResAsset['AssetName']);?></option><?php } ?><option value="AllA">All ASSETS</option></select>
   </td>
  <td class="td1" style="font-size:11px;width:120px;"><select style="font-size:12px; width:120px; height:22px; background-color:#DDFFBB; display:block;" name="DeptE" id="DeptE" onChange="ChangeDept(this.value)"><?php if($_REQUEST['d']>0){ $sqlD=mysql_query("SELECT DepartmentCode FROM hrm_department WHERE DepartmentId=".$_REQUEST['d'], $con); $resD=mysql_fetch_assoc($sqlD); echo '<option value='.$_REQUEST['d'].' style="margin-left:0px; background-color:#84D9D5;" selected>'.$resD['DepartmentCode'].'</option>'; } elseif($_REQUEST['d']=='AllD'){ echo '<option value="AllD">All DEPARTMENT</option>'; } else { echo '<option value="0" style="margin-left:0px; background-color:#84D9D5;" selected>DEPARTMENT</option>'; }
$SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?><option value="<?php echo $ResDept['DepartmentId']; ?>"><?php echo $ResDept['DepartmentCode'];?></option><?php } ?><option value="AllD">All DEPARTMENT</option></select>
  </td>
  <?php if($_REQUEST['d']>0){ ?>
   <td style="width:150px;"><select style="font-size:12px;width:150px;height:22px;background-color:#DDFFBB;" name="DEmp" id="DEmp" onChange="ChangeDemp(this.value)"><?php if($_REQUEST['emp']>0){ $sE=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$_REQUEST['emp'], $con); $rE=mysql_fetch_assoc($sE); echo '<option value='.$_REQUEST['Demp'].' selected>'.$rE['Fname'].' '.$rE['Sname'].' '.$rE['Lname'].'</option>';} else { echo '<option value="0" style="margin-left:0px; background-color:#84D9D5;" selected>EMPLOYEE</option>'; }
	 $SqlEmp=mysql_query("select he.EmployeeID,Fname,Sname,Lname from hrm_employee he inner join hrm_employee_general heg on he.EmployeeID=heg.EmployeeID where EmpStatus='A' AND DepartmentId=".$_REQUEST['d']." order by Fname ASC", $con); while($rEmp=mysql_fetch_array($SqlEmp)) { ?><option value="<?php echo $rEmp['EmployeeID']; ?>"><?php echo $rEmp['Fname'].' '.$rEmp['Sname'].' '.$rEmp['Lname']; ?></option><?php } ?></select></td><?php } ?>
   <td style="width:5px;">&nbsp;</td><td style="font-size:12px;font-family:Times New Roman;font-weight:bold;"><input type="radio" id="allc" name="allc" <?php if($_REQUEST['all']==1){ echo 'checked'; } ?> onClick="FunAll()"/>&nbsp;ALL</td>
   <td style="font-size:12px;font-family:Times New Roman;font-weight:bold;"><input type="radio" id="allotc" name="allotc" <?php if($_REQUEST['allot']==1){ echo 'checked'; } ?> onClick="FunAllot()" />&nbsp;ALLOTMENT</td>
   <td style="font-size:12px;font-family:Times New Roman;font-weight:bold;"><input type="radio" id="reqtc" name="reqtc" <?php if($_REQUEST['reqt']==1){ echo 'checked'; } ?> onClick="FunRequest()" />&nbsp;REQUEST</td>
  
<?php /*  
   <td style="width:10px;">&nbsp;</td>
   <td style="font-size:12px;font-family:Times New Roman;font-weight:bold;"><input type="checkbox" id="app" name="app" <?php if($_REQUEST['app']==1){ echo 'checked'; } ?> onClick="FunADO(1)"/>&nbsp;Approved</td>
   <td style="font-size:12px;font-family:Times New Roman;font-weight:bold;"><input type="checkbox" id="dra" name="dra" <?php if($_REQUEST['dra']==1){ echo 'checked'; } ?> onClick="FunADO(2)" />&nbsp;Draft</td>
   <td style="font-size:12px;font-family:Times New Roman;font-weight:bold;"><input type="checkbox" id="ove" name="ove" <?php if($_REQUEST['ove']==1){ echo 'checked'; } ?> onClick="FunADO(3)" />&nbsp;Over Amount</td>
 */ ?>  
   </tr>
   </table>
   </td>
  </tr>
 </table>
	           </td>
			</tr>
			<tr>
			 <td>			 
			   <table border="0">
<?php 
if($_REQUEST['yer']>0)      ///////////////////////////////////////////////////(AAAAAAAAAA)
{

 if($_REQUEST['d']=='AllD' OR $_REQUEST['d']==0) {  //----->>>(11)  
  if($_REQUEST['all']==1){  //---(A)  
   if($_REQUEST['ast']==0 OR $_REQUEST['ast']=='AllA') 
   { 
    if($_REQUEST['emp']>0){ $sqla=mysql_query("select * from hrm_asset_employee where APurDate>='".$fromdate."-04-01' AND APurDate<='".$todate."-03-31' AND EmployeeID=".$_REQUEST['emp']." order by APurDate DESC", $con); $sqla2=mysql_query("select * from hrm_asset_employee_request where PurDate>='".$fromdate."-04-01' AND PurDate<='".$todate."-03-31' AND Status=1 AND EmployeeID=".$_REQUEST['emp']." order by PurDate DESC",$con); }else{ $sqla=mysql_query("select * from hrm_asset_employee where APurDate>='".$fromdate."-04-01' AND APurDate<='".$todate."-03-31' order by APurDate DESC", $con); $sqla2=mysql_query("select * from hrm_asset_employee_request where PurDate>='".$fromdate."-04-01' AND PurDate<='".$todate."-03-31' AND Status=1 order by PurDate DESC",$con); }
   }
   if($_REQUEST['ast']>0)
   {
    if($_REQUEST['emp']>0){ $sqla=mysql_query("select * from hrm_asset_employee where AssetNId=".$_REQUEST['ast']." AND APurDate>='".$fromdate."-04-01' AND APurDate<='".$todate."-03-31' AND EmployeeID=".$_REQUEST['emp']." order by APurDate DESC", $con);    $sqla2=mysql_query("select * from hrm_asset_employee_request where AssetNId=".$_REQUEST['ast']." AND PurDate>='".$fromdate."-04-01' AND PurDate<='".$todate."-03-31' AND Status=1 AND EmployeeID=".$_REQUEST['emp']." order by PurDate DESC", $con); }else{ $sqla=mysql_query("select * from hrm_asset_employee where AssetNId=".$_REQUEST['ast']." AND APurDate>='".$fromdate."-04-01' AND APurDate<='".$todate."-03-31' order by APurDate DESC", $con);    $sqla2=mysql_query("select * from hrm_asset_employee_request where AssetNId=".$_REQUEST['ast']." AND PurDate>='".$fromdate."-04-01' AND PurDate<='".$todate."-03-31' AND Status=1 order by PurDate DESC", $con); }  
   } 
 
  } elseif($_REQUEST['allot']==1){  //---(B) 
    if($_REQUEST['ast']==0 OR $_REQUEST['ast']=='AllA')
    { 
	if($_REQUEST['emp']>0){ $sqla=mysql_query("select * from hrm_asset_employee where APurDate>='".$fromdate."-04-01' AND APurDate<='".$todate."-03-31' AND EmployeeID=".$_REQUEST['emp']." order by APurDate DESC", $con); }else{ $sqla=mysql_query("select * from hrm_asset_employee where APurDate>='".$fromdate."-04-01' AND APurDate<='".$todate."-03-31' order by APurDate DESC", $con); }
        }
    if($_REQUEST['ast']>0)
    {
	if($_REQUEST['emp']>0){ $sqla=mysql_query("select * from hrm_asset_employee where AssetNId=".$_REQUEST['ast']." AND APurDate>='".$fromdate."-04-01' AND APurDate<='".$todate."-03-31' AND EmployeeID=".$_REQUEST['emp']." order by APurDate DESC", $con); }else{ $sqla=mysql_query("select * from hrm_asset_employee where AssetNId=".$_REQUEST['ast']." AND APurDate>='".$fromdate."-04-01' AND APurDate<='".$todate."-03-31' order by APurDate DESC", $con); }
     
	} 
  
  } elseif($_REQUEST['reqt']==1){   //---(C)
    if($_REQUEST['ast']==0 OR $_REQUEST['ast']=='AllA')
    { 
	if($_REQUEST['emp']>0){ $sqla2=mysql_query("select * from hrm_asset_employee_request where PurDate>='".$fromdate."-04-01' AND PurDate<='".$todate."-03-31' AND Status=1 AND EmployeeID=".$_REQUEST['emp']." order by PurDate DESC", $con); }else{ $sqla2=mysql_query("select * from hrm_asset_employee_request where PurDate>='".$fromdate."-04-01' AND PurDate<='".$todate."-03-31' AND Status=1 order by PurDate DESC", $con); }
      
    }
    if($_REQUEST['ast']>0)
    {
	if($_REQUEST['emp']>0){ $sqla2=mysql_query("select * from hrm_asset_employee_request where AssetNId=".$_REQUEST['ast']." AND PurDate>='".$fromdate."-04-01' AND Status=1 AND EmployeeID=".$_REQUEST['emp']." AND PurDate<='".$todate."-03-31' order by PurDate DESC", $con); }else{ $sqla2=mysql_query("select * from hrm_asset_employee_request where AssetNId=".$_REQUEST['ast']." AND PurDate>='".$fromdate."-04-01' AND Status=1 AND PurDate<='".$todate."-03-31' order by PurDate DESC", $con); }
       
    } 
  }
    
 } elseif($_REQUEST['d']>0) { //----->>>(22)  
   if($_REQUEST['all']==1){  //---(A)  
    if($_REQUEST['ast']==0 OR $_REQUEST['ast']=='AllA')
    { 
	 if($_REQUEST['emp']>0){ $sqla=mysql_query("select hrm_asset_employee.* from hrm_asset_employee INNER JOIN hrm_employee_general ON hrm_asset_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." AND APurDate>='".$fromdate."-04-01' AND APurDate<='".$todate."-03-31' AND hrm_asset_employee.EmployeeID=".$_REQUEST['emp']." order by APurDate DESC", $con);    $sqla2=mysql_query("select hrm_asset_employee_request.* from hrm_asset_employee_request INNER JOIN hrm_employee_general ON hrm_asset_employee_request.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." AND PurDate>='".$fromdate."-04-01' AND PurDate<='".$todate."-03-31' AND hrm_asset_employee_request.EmployeeID=".$_REQUEST['emp']." order by PurDate DESC", $con);  }else{ $sqla=mysql_query("select hrm_asset_employee.* from hrm_asset_employee INNER JOIN hrm_employee_general ON hrm_asset_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." AND APurDate>='".$fromdate."-04-01' AND APurDate<='".$todate."-03-31' order by APurDate DESC", $con);    $sqla2=mysql_query("select hrm_asset_employee_request.* from hrm_asset_employee_request INNER JOIN hrm_employee_general ON hrm_asset_employee_request.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." AND PurDate>='".$fromdate."-04-01' AND PurDate<='".$todate."-03-31' order by PurDate DESC", $con);  }
      
    }
    if($_REQUEST['ast']>0)
    {
	 if($_REQUEST['emp']>0){ $sqla=mysql_query("select hrm_asset_employee.* from hrm_asset_employee INNER JOIN hrm_employee_general ON hrm_asset_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." AND AssetNId=".$_REQUEST['ast']." AND APurDate>='".$fromdate."-04-01' AND APurDate<='".$todate."-03-31' AND hrm_asset_employee.EmployeeID=".$_REQUEST['emp']." order by APurDate DESC", $con);    $sqla2=mysql_query("select hrm_asset_employee_request.* from hrm_asset_employee_request INNER JOIN hrm_employee_general ON hrm_asset_employee_request.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." AND AssetNId=".$_REQUEST['ast']." AND PurDate>='".$fromdate."-04-01' AND PurDate<='".$todate."-03-31' AND hrm_asset_employee_request.EmployeeID=".$_REQUEST['emp']." order by PurDate DESC", $con); }else{ $sqla=mysql_query("select hrm_asset_employee.* from hrm_asset_employee INNER JOIN hrm_employee_general ON hrm_asset_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." AND AssetNId=".$_REQUEST['ast']." AND APurDate>='".$fromdate."-04-01' AND APurDate<='".$todate."-03-31' order by APurDate DESC", $con);    $sqla2=mysql_query("select hrm_asset_employee_request.* from hrm_asset_employee_request INNER JOIN hrm_employee_general ON hrm_asset_employee_request.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." AND AssetNId=".$_REQUEST['ast']." AND PurDate>='".$fromdate."-04-01' AND PurDate<='".$todate."-03-31' order by PurDate DESC", $con); }
        
    } 
 
  } elseif($_REQUEST['allot']==1){  //---(B) 
    if($_REQUEST['ast']==0 OR $_REQUEST['ast']=='AllA')
    { 
	if($_REQUEST['emp']>0){ $sqla=mysql_query("select hrm_asset_employee.* from hrm_asset_employee INNER JOIN hrm_employee_general ON hrm_asset_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." AND APurDate>='".$fromdate."-04-01' AND APurDate<='".$todate."-03-31' AND hrm_asset_employee.EmployeeID=".$_REQUEST['emp']." order by APurDate DESC", $con); }else{ $sqla=mysql_query("select hrm_asset_employee.* from hrm_asset_employee INNER JOIN hrm_employee_general ON hrm_asset_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." AND APurDate>='".$fromdate."-04-01' AND APurDate<='".$todate."-03-31' order by APurDate DESC", $con); }
        }
    if($_REQUEST['ast']>0)
    {
	if($_REQUEST['emp']>0){ $sqla=mysql_query("select hrm_asset_employee.* from hrm_asset_employee INNER JOIN hrm_employee_general ON hrm_asset_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." AND AssetNId=".$_REQUEST['ast']." AND APurDate>='".$fromdate."-04-01' AND APurDate<='".$todate."-03-31' AND hrm_asset_employee.EmployeeID=".$_REQUEST['emp']." order by APurDate DESC", $con); }else{ $sqla=mysql_query("select hrm_asset_employee.* from hrm_asset_employee INNER JOIN hrm_employee_general ON hrm_asset_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." AND AssetNId=".$_REQUEST['ast']." AND APurDate>='".$fromdate."-04-01' AND APurDate<='".$todate."-03-31' order by APurDate DESC", $con); }
     
	} 
  
  } elseif($_REQUEST['reqt']==1){   //---(C)
    if($_REQUEST['ast']==0 OR $_REQUEST['ast']=='AllA')
    { 
	if($_REQUEST['emp']>0){ $sqla2=mysql_query("select hrm_asset_employee_request.* from hrm_asset_employee_request INNER JOIN hrm_employee_general ON hrm_asset_employee_request.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." AND PurDate>='".$fromdate."-04-01' AND PurDate<='".$todate."-03-31' AND hrm_asset_employee_request.EmployeeID=".$_REQUEST['emp']." AND hrm_asset_employee_request.Status=1 order by PurDate DESC", $con); }else{ $sqla2=mysql_query("select hrm_asset_employee_request.* from hrm_asset_employee_request INNER JOIN hrm_employee_general ON hrm_asset_employee_request.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." AND PurDate>='".$fromdate."-04-01' AND PurDate<='".$todate."-03-31' AND hrm_asset_employee_request.Status=1 order by PurDate DESC", $con); }
      
    }
    if($_REQUEST['ast']>0)
    {
	 if($_REQUEST['emp']>0){ $sqla2=mysql_query("select hrm_asset_employee_request.* from hrm_asset_employee_request INNER JOIN hrm_employee_general ON hrm_asset_employee_request.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." AND AssetNId=".$_REQUEST['ast']." AND PurDate>='".$fromdate."-04-01' AND PurDate<='".$todate."-03-31' AND hrm_asset_employee_request.EmployeeID=".$_REQUEST['emp']." AND hrm_asset_employee_request.Status=1 order by PurDate DESC", $con); }else{ $sqla2=mysql_query("select hrm_asset_employee_request.* from hrm_asset_employee_request INNER JOIN hrm_employee_general ON hrm_asset_employee_request.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." AND AssetNId=".$_REQUEST['ast']." AND PurDate>='".$fromdate."-04-01' AND PurDate<='".$todate."-03-31' AND hrm_asset_employee_request.Status=1 order by PurDate DESC", $con); }
        
    } 
   } 
 }
 
}
if($_REQUEST['yer']=='AllY')    ///////////////////////////////////////////////////(BBBBBBBBBBB)
{
 
  if($_REQUEST['d']=='AllD' OR $_REQUEST['d']==0) {  //----->>>(11)  
  if($_REQUEST['all']==1){  //---(A)  
   if($_REQUEST['ast']==0 OR $_REQUEST['ast']=='AllA')
   { 
    if($_REQUEST['emp']>0){ $sqla=mysql_query("select * from hrm_asset_employee where EmployeeID=".$_REQUEST['emp']." order by APurDate DESC", $con); 
	$sqla2=mysql_query("select * from hrm_asset_employee_request where Status=1 AND EmployeeID=".$_REQUEST['emp']." order by PurDate DESC", $con); }else{ $sqla=mysql_query("select * from hrm_asset_employee order by APurDate DESC", $con); 
	$sqla2=mysql_query("select * from hrm_asset_employee_request where Status=1 order by PurDate DESC", $con); }
     
   }
   if($_REQUEST['ast']>0)
   {
    if($_REQUEST['emp']>0){ $sqla=mysql_query("select * from hrm_asset_employee where AssetNId=".$_REQUEST['ast']." AND EmployeeID=".$_REQUEST['emp']." order by APurDate DESC", $con); $sqla2=mysql_query("select * from hrm_asset_employee_request where AssetNId=".$_REQUEST['ast']." AND Status=1 AND EmployeeID=".$_REQUEST['emp']." order by PurDate DESC", $con); }else{ $sqla=mysql_query("select * from hrm_asset_employee where AssetNId=".$_REQUEST['ast']." order by APurDate DESC", $con); $sqla2=mysql_query("select * from hrm_asset_employee_request where AssetNId=".$_REQUEST['ast']." AND Status=1 order by PurDate DESC", $con); }
       
   } 
 
  } elseif($_REQUEST['allot']==1){  //---(B) 
    if($_REQUEST['ast']==0 OR $_REQUEST['ast']=='AllA')
    { 
	if($_REQUEST['emp']>0){ $sqla=mysql_query("select * from hrm_asset_employee where EmployeeID=".$_REQUEST['emp']." order by APurDate DESC", $con); }else{ $sqla=mysql_query("select * from hrm_asset_employee order by APurDate DESC", $con); }
    }
    if($_REQUEST['ast']>0)
    {
	if($_REQUEST['emp']>0){ $sqla=mysql_query("select * from hrm_asset_employee where AssetNId=".$_REQUEST['ast']." AND Status=1 AND EmployeeID=".$_REQUEST['emp']." order by APurDate DESC", $con); }else{ $sqla=mysql_query("select * from hrm_asset_employee where AssetNId=".$_REQUEST['ast']." AND Status=1 order by APurDate DESC", $con); }
     
	} 
  
  } elseif($_REQUEST['reqt']==1){   //---(C)
    if($_REQUEST['ast']==0 OR $_REQUEST['ast']=='AllA')
    { 
	if($_REQUEST['emp']>0){ $sqla2=mysql_query("select * from hrm_asset_employee_request where EmployeeID=".$_REQUEST['emp']." order by PurDate DESC", $con); }else{ $sqla2=mysql_query("select * from hrm_asset_employee_request order by PurDate DESC", $con); }
      
    }
    if($_REQUEST['ast']>0)
    {
	if($_REQUEST['emp']>0){ $sqla2=mysql_query("select * from hrm_asset_employee_request where AssetNId=".$_REQUEST['ast']." AND Status=1 AND EmployeeID=".$_REQUEST['emp']." order by PurDate DESC", $con); }else{ $sqla2=mysql_query("select * from hrm_asset_employee_request where AssetNId=".$_REQUEST['ast']." AND Status=1 order by PurDate DESC", $con); }
       
    } 
  }
    
 } elseif($_REQUEST['d']>0) { //----->>>(22)  
   if($_REQUEST['all']==1){  //---(A)  
    if($_REQUEST['ast']==0 OR $_REQUEST['ast']=='AllA')
    { 
	 if($_REQUEST['emp']>0){ $sqla=mysql_query("select hrm_asset_employee.* from hrm_asset_employee INNER JOIN hrm_employee_general ON hrm_asset_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." AND hrm_asset_employee.EmployeeID=".$_REQUEST['emp']." order by APurDate DESC", $con);  $sqla2=mysql_query("select hrm_asset_employee_request.* from hrm_asset_employee_request INNER JOIN hrm_employee_general ON hrm_asset_employee_request.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." AND hrm_asset_employee_request.EmployeeID=".$_REQUEST['emp']." order by PurDate DESC", $con); }else{ $sqla=mysql_query("select hrm_asset_employee.* from hrm_asset_employee INNER JOIN hrm_employee_general ON hrm_asset_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." order by APurDate DESC", $con);  $sqla2=mysql_query("select hrm_asset_employee_request.* from hrm_asset_employee_request INNER JOIN hrm_employee_general ON hrm_asset_employee_request.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." order by PurDate DESC", $con); }
       
    }
    if($_REQUEST['ast']>0)
    {
	 if($_REQUEST['emp']>0){ $sqla=mysql_query("select hrm_asset_employee.* from hrm_asset_employee INNER JOIN hrm_employee_general ON hrm_asset_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." AND AssetNId=".$_REQUEST['ast']." AND hrm_asset_employee.EmployeeID=".$_REQUEST['emp']." order by APurDate DESC", $con);  $sqla2=mysql_query("select hrm_asset_employee_request.* from hrm_asset_employee_request INNER JOIN hrm_employee_general ON hrm_asset_employee_request.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." AND AssetNId=".$_REQUEST['ast']." AND hrm_asset_employee_request.EmployeeID=".$_REQUEST['emp']." order by PurDate DESC", $con); }else{ $sqla=mysql_query("select hrm_asset_employee.* from hrm_asset_employee INNER JOIN hrm_employee_general ON hrm_asset_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." AND AssetNId=".$_REQUEST['ast']." order by APurDate DESC", $con);  $sqla2=mysql_query("select hrm_asset_employee_request.* from hrm_asset_employee_request INNER JOIN hrm_employee_general ON hrm_asset_employee_request.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." AND AssetNId=".$_REQUEST['ast']." order by PurDate DESC", $con); }
        
    } 
 
  } elseif($_REQUEST['allot']==1){  //---(B) 
    if($_REQUEST['ast']==0 OR $_REQUEST['ast']=='AllA')
    { 
	if($_REQUEST['emp']>0){ $sqla=mysql_query("select hrm_asset_employee.* from hrm_asset_employee INNER JOIN hrm_employee_general ON hrm_asset_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." AND hrm_asset_employee.EmployeeID=".$_REQUEST['emp']." order by APurDate DESC", $con); }else{ $sqla=mysql_query("select hrm_asset_employee.* from hrm_asset_employee INNER JOIN hrm_employee_general ON hrm_asset_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." order by APurDate DESC", $con); }
    }
    if($_REQUEST['ast']>0)
    {
	if($_REQUEST['emp']>0){ $sqla=mysql_query("select hrm_asset_employee.* from hrm_asset_employee INNER JOIN hrm_employee_general ON hrm_asset_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." AND AssetNId=".$_REQUEST['ast']." AND hrm_asset_employee.EmployeeID=".$_REQUEST['emp']." order by APurDate DESC", $con); }else{ $sqla=mysql_query("select hrm_asset_employee.* from hrm_asset_employee INNER JOIN hrm_employee_general ON hrm_asset_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." AND AssetNId=".$_REQUEST['ast']." order by APurDate DESC", $con); } 
	} 
  
  } elseif($_REQUEST['reqt']==1){   //---(C)
    if($_REQUEST['ast']==0 OR $_REQUEST['ast']=='AllA')
    { 
	if($_REQUEST['emp']>0){ $sqla2=mysql_query("select hrm_asset_employee_request.* from hrm_asset_employee_request INNER JOIN hrm_employee_general ON hrm_asset_employee_request.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." AND hrm_asset_employee_request.Status=1 AND hrm_asset_employee_request.EmployeeID=".$_REQUEST['emp']." order by PurDate DESC", $con); }else{ $sqla2=mysql_query("select hrm_asset_employee_request.* from hrm_asset_employee_request INNER JOIN hrm_employee_general ON hrm_asset_employee_request.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." AND hrm_asset_employee_request.Status=1 order by PurDate DESC", $con); }  
    }
    if($_REQUEST['ast']>0)
    {
	 if($_REQUEST['emp']>0){ $sqla2=mysql_query("select hrm_asset_employee_request.* from hrm_asset_employee_request INNER JOIN hrm_employee_general ON hrm_asset_employee_request.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." AND AssetNId=".$_REQUEST['ast']." AND hrm_asset_employee_request.Status=1 AND hrm_asset_employee_request.EmployeeID=".$_REQUEST['emp']." order by PurDate DESC", $con); }else{ $sqla2=mysql_query("select hrm_asset_employee_request.* from hrm_asset_employee_request INNER JOIN hrm_employee_general ON hrm_asset_employee_request.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." AND AssetNId=".$_REQUEST['ast']." AND hrm_asset_employee_request.Status=1 order by PurDate DESC", $con); } 
    } 
   } 
 }
 
}
?>
<?php if($_REQUEST['all']>0 OR $_REQUEST['reqt']>0 OR $_REQUEST['allot']>0){ ?>
 <tr>
  <td colspan="20">
   <table>
    <tr style="color:#000;font-weight:bold;height:22px;font-family:Times New Roman;font-size:14px;">

    </tr>
   </table>
  </td>
  </tr>
<?php } ?>
<?php if($_REQUEST['all']>0){ ?>
<tr>
 <td>
  <table border="1">
<tr bgcolor="#0080FF"><td colspan="20" style="color:#FFFFFF;font-weight:bold;height:22px;font-family:Times New Roman;font-size:14px;">&nbsp;Request:&nbsp;</td></tr>
  			   
<tr bgcolor="#7a6189" style="color:#FFFFFF;font-weight:bold;height:22px;font-family:Times New Roman;font-size:12px;">
  <td rowspan="2" style="width:30px;" align="center">SNo.</td>
  <td rowspan="2" style="width:50px;" align="center">EC</td>
  <td rowspan="2" style="width:200px;" align="center">Name</td>
  <td rowspan="2" style="width:80px;" align="center">Department</td>
  <td rowspan="2" style="width:80px;" align="center">Contact No</td>
  <td rowspan="2" style="width:120px;" align="center">Name Of Asset</td>
  <td rowspan="2" style="width:50px;" align="center">Details</td>
  <td colspan="4" style="width:240px;" align="center">Amount</td>
  <td colspan="5" align="center">Date</td>
  <td colspan="2" align="center">Copy</td>
  <td rowspan="2" style="width:80px;" align="center">Status</td>
</tr>
<tr bgcolor="#7a6189" style="color:#FFFFFF;font-weight:bold;height:22px;font-family:Times New Roman;font-size:12px;">
  <td style="width:60px;" align="center">Balance</td>
  <td style="width:60px;" align="center">Request</td>
  <td style="width:60px;" align="center">Approval</td>
  <td style="width:60px;" align="center">Over</td>
  <td style="width:60px;" align="center">Purchase</td>
  <td style="width:60px;" align="center">Request</td>
  <td style="width:60px;" align="center">Pay</td>
  <td style="width:60px;" align="center">Approval</td>
  <td style="width:60px;" align="center">Expiry</td>
  <td style="width:60px;" align="center">Bill</td>
  <td style="width:60px;" align="center">Asset</td>
</tr>
<?php $sno=1; while($resa2=mysql_fetch_assoc($sqla2)){  
$SqlEmp = mysql_query("SELECT EmpCode,Fname,Sname,Lname,DepartmentId,MobileNo_Vnr,MobileNo from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmployeeID=".$resa2['EmployeeID'], $con); $ResEmp=mysql_fetch_assoc($SqlEmp);
$Ename = $ResEmp['Fname'].'&nbsp;'.$ResEmp['Sname'].'&nbsp;'.$ResEmp['Lname']; $LEC=strlen($ResEmp['EmpCode']); 
if($LEC==1){$EC='000'.$ResEmp['EmpCode'];} if($LEC==2){$EC='00'.$ResEmp['EmpCode'];} if($LEC==3){$EC='0'.$ResEmp['EmpCode'];} if($LEC>=4){$EC=$ResEmp['EmpCode'];}
$sDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$ResEmp['DepartmentId'], $con); $rDept=mysql_fetch_assoc($sDept); ?>
<tr bgcolor="#FFFFFF" style="height:22px;font-family:Times New Roman;font-size:12px;">
  <td align="center"><?php echo $sno; ?></td>
  <td align="center"><?php echo $EC; ?></td>
  <td><?php echo $Ename; ?></td>
  <td><?php echo $rDept['DepartmentCode']; ?></td>
  <td align="center"><?php if($ResEmp['MobileNo_Vnr']>0){echo $ResEmp['MobileNo_Vnr'];}else{echo $ResEmp['MobileNo'];} ?></td>
  <td><?php if($resa2['AssetNId']!=''){ $sqlAn=mysql_query("select AssetName from hrm_asset_name where AssetNId=".$resa2['AssetNId']); $resAn=mysql_fetch_array($sqlAn); echo strtoupper($resAn['AssetName']); } else {echo '';} ?></td>
  <td align="center"><a href="#" onClick="FunClickAssetReq(<?php echo $resa2['AssetEmpReqId'].','.$resa2['EmployeeID']; ?>)">Click</a></td>
  
  <td align="right"><?php echo intval($resa2['MaxLimitAmt']); ?>&nbsp;</td>
  <td align="right"><?php echo intval($resa2['ReqAmt']); ?>&nbsp;</td>
  <td align="right"><?php echo intval($resa2['ApprovalAmt']); ?>&nbsp;</td>
  <?php if($resa2['ApprovalAmt']>$resa2['MaxLimitAmt']){$Over=$resa2['ApprovalAmt']-$resa2['MaxLimitAmt'];}
      else{$Over='';} ?><td align="right"><?php echo $Over; ?>&nbsp;</td>
	  
  <td align="center"><?php if($resa2['PurDate']!='0000-00-00' AND $resa2['PurDate']!='1970-01-01'){echo date("d My",strtotime($resa2['PurDate']));} ?></td>
  <td align="center"><?php if($resa2['ReqDate']!='0000-00-00' AND $resa2['ReqDate']!='1970-01-01'){echo date("d My",strtotime($resa2['ReqDate']));} ?></td>
  <td align="center"><?php if($resa2['AccPayDate']!='0000-00-00' AND $resa2['AccPayDate']!='1970-01-01'){echo date("d My",strtotime($resa2['AccPayDate']));} ?></td>
  <td align="center"><?php if($resa2['AccSubDate']!='0000-00-00' AND $resa2['AccSubDate']!='1970-01-01'){echo date("d My",strtotime($resa2['AccSubDate']));} ?></td>
  
  
<?php if($resa2['AccPayDate']!='0000-00-00' AND $resa2['AccPayDate']!='1970-01-01'){ $ExpMDate=date('d My', strtotime("+36 months", strtotime($resa2['AccPayDate']))); } elseif($resa2['ReqDate']!='0000-00-00' AND $resa2['ReqDate']!='1970-01-01'){ $ExpMDate=date('d My', strtotime("+36 months", strtotime($resa2['ReqDate']))); } elseif($resa2['PurDate']!='0000-00-00' AND $resa2['PurDate']!='1970-01-01'){ $ExpMDate=date('d My', strtotime("+36 months", strtotime($resa2['PurDate']))); } else { $ExpMDate='';} ?>  
  <td align="center"><?php echo $ExpMDate; ?></td>
  
  <td align="center"><?php if($resa2['ReqBillImgExtName']!=''){ ?><a href="#" onClick="javascript:window.open('MyAssetCopy.php?Img=Bill&value=<?php echo $resa2['ReqBillImgExtName']; ?>','ImgF','width=600,height=500')">Bill</a><?php } ?></td>
  <td align="center"><?php if($resa2['ReqAssestImgExtName']!=''){ ?><a href="#" onClick="javascript:window.open('MyAssetCopy.php?Img=Asset&value=<?php echo $resa2['ReqAssestImgExtName']; ?>','ImgF','width=600,height=500')">Asset</a><?php } ?></td>
  <td align="center" style="font-size:12px; font-family:Times New Roman;color:<?php if($resa2['AccPayStatus']==1){echo '#FF8C1A';}elseif($resa2['AccPayStatus']==2){echo '#008200';}elseif($resa2['AccPayStatus']==3){echo '#FF0000';} ?>;"><?php if($resa2['AccPayStatus']==0){echo 'Draft';}elseif($resa2['AccPayStatus']==1){echo 'Pending';}elseif($resa2['AccPayStatus']==2){echo 'Approved';}elseif($resa2['AccPayStatus']==3){echo 'Rejected';} ?></td>
</tr>
 <?php $sno++; } ?>
  </table>
 </td>
</tr>
<tr><td style="height:20px;"></td></tr>
<tr>
 <td>
  <table border="1">
   <tr bgcolor="#0080FF"><td colspan="16" style="color:#FFFFFF;font-weight:bold;height:22px;font-family:Times New Roman;font-size:14px;">&nbsp;Allotment:</td></tr>
<tr bgcolor="#7a6189" style="color:#FFFFFF;font-weight:bold;height:22px;font-family:Times New Roman;font-size:12px;">
  <td style="width:30px;" align="center">SNo.</td>
  <td style="width:50px;" align="center">EC</td>
  <td style="width:200px;" align="center">Name</td>
  <td style="width:80px;" align="center">Department</td>
  <td style="width:80px;" align="center">Contact No</td>
  <td style="width:150px;" align="center">Name Of Asset</td>
  <td style="width:50px;" align="center">Details</td>
  <td style="width:100px;" align="center">Assest ID</td>
  <td style="width:150px;" align="center">Company</td>
  <td style="width:100px;" align="center">Model Name</td>
  <td style="width:60px;" align="center">Purchase</td>
  <td style="width:60px;" align="center">Allocated</td>
  <td style="width:60px;" align="center">Returned</td>
</tr>
<?php $sno2=1; while($resa=mysql_fetch_assoc($sqla)){ $SqlEmp2 = mysql_query("SELECT EmpCode,Fname,Sname,Lname,DepartmentId,MobileNo_Vnr,MobileNo from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmployeeID=".$resa['EmployeeID'], $con); $ResEmp2=mysql_fetch_assoc($SqlEmp2);
$Ename2 = $ResEmp2['Fname'].'&nbsp;'.$ResEmp2['Sname'].'&nbsp;'.$ResEmp2['Lname']; $LEC2=strlen($ResEmp2['EmpCode']); 
if($LEC2==1){$EC2='000'.$ResEmp2['EmpCode'];} if($LEC2==2){$EC2='00'.$ResEmp2['EmpCode'];} if($LEC2==3){$EC2='0'.$ResEmp2['EmpCode'];} if($LEC2>=4){$EC2=$ResEmp2['EmpCode'];}
$sDept2=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$ResEmp2['DepartmentId'], $con); $rDept2=mysql_fetch_assoc($sDept2); ?>
<tr bgcolor="#FFFFFF" style="height:22px;font-family:Times New Roman;font-size:12px;">
  <td align="center"><?php echo $sno2; ?></td>
  <td align="center"><?php echo $EC2; ?></td>
  <td><?php echo $Ename2; ?></td>
  <td><?php echo $rDept2['DepartmentCode']; ?></td>
  <td align="center"><?php if($ResEmp2['MobileNo_Vnr']>0){echo $ResEmp2['MobileNo_Vnr'];}else{echo $ResEmp2['MobileNo'];} ?></td>
  <td><?php if($resa['AssetNId']!=''){ $sqlAn2=mysql_query("select AssetName from hrm_asset_name where AssetNId=".$resa['AssetNId']); $resAn2=mysql_fetch_array($sqlAn2); echo strtoupper($resAn2['AssetName']); } else {echo '';} ?></td>
  <td align="center"><a href="#" onClick="FunClickAsset(<?php echo $resa['AssetEmpId'].','.$resa['EmployeeID']; ?>)">Click</a></td>
  <td><?php echo strtoupper($resa['AssetId']); ?></td>
  <td><?php echo strtoupper($resa['AComName']); ?></td>
  <td><?php echo strtoupper($resa['AModelName']); ?></td>
  <td align="center"><?php if($resa['APurDate']!='0000-00-00' AND $resa['APurDate']!='1970-01-01'){echo date("d My",strtotime($resa['APurDate']));} ?></td>
  <td align="center"><?php if($resa['AAllocate']!='0000-00-00' AND $resa['AAllocate']!='1970-01-01'){echo date("d My",strtotime($resa['AAllocate']));} ?></td>
  <td align="center"><?php if($resa['ADeAllocate']!='0000-00-00' AND $resa['ADeAllocate']!='1970-01-01'){echo date("d My",strtotime($resa['ADeAllocate']));} ?></td>
</tr>
<?php $sno2++; } ?>
  </table>
 </td>
</tr>
<?php } elseif($_REQUEST['reqt']>0){ ?>	
<tr>
 <td>
  <table border="1">
   <tr bgcolor="#0080FF"><td colspan="20" style="color:#FFFFFF;font-weight:bold;height:22px;font-family:Times New Roman;font-size:14px;">&nbsp;Request:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onClick="Exportrep('R')" style="color:#F9F900; font-size:12px;">Export Excel</a></td></tr>		   
<tr bgcolor="#7a6189" style="color:#FFFFFF;font-weight:bold;height:22px;font-family:Times New Roman;font-size:12px;">
  <td rowspan="2" style="width:30px;" align="center">SNo.</td>
  <td rowspan="2" style="width:50px;" align="center">EC</td>
  <td rowspan="2" style="width:200px;" align="center">Name</td>
  <td rowspan="2" style="width:80px;" align="center">Department</td>
  <td rowspan="2" style="width:80px;" align="center">Contact No</td>
  <td rowspan="2" style="width:120px;" align="center">Name Of Asset</td>
  <td rowspan="2" style="width:50px;" align="center">Details</td>
  <td colspan="4" align="center">Amount</td>
  <td colspan="5" align="center">Date</td>
  <td colspan="2" align="center">Copy</td>
  <td rowspan="2" style="width:80px;" align="center">Status</td>
</tr>
<tr bgcolor="#7a6189" style="color:#FFFFFF;font-weight:bold;height:22px;font-family:Times New Roman;font-size:12px;">
  <td style="width:60px;" align="center">Balance</td>
  <td style="width:60px;" align="center">Request</td>
  <td style="width:60px;" align="center">Approval</td>
  <td style="width:60px;" align="center">Over</td>
  <td style="width:60px;" align="center">Purchase</td>
  <td style="width:60px;" align="center">Request</td>
  <td style="width:60px;" align="center">Pay</td>
  <td style="width:60px;" align="center">Approval</td>
  <td style="width:60px;" align="center">Expiry</td>
  <td style="width:60px;" align="center">Bill</td>
  <td style="width:60px;" align="center">Asset</td>
</tr>
<?php $sno=1; while($resa2=mysql_fetch_assoc($sqla2)){  $SqlEmp = mysql_query("SELECT EmpCode,Fname,Sname,Lname,DepartmentId,MobileNo_Vnr,MobileNo from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmployeeID=".$resa2['EmployeeID'], $con); $ResEmp=mysql_fetch_assoc($SqlEmp);
$Ename = $ResEmp['Fname'].'&nbsp;'.$ResEmp['Sname'].'&nbsp;'.$ResEmp['Lname']; $LEC=strlen($ResEmp['EmpCode']); 
if($LEC==1){$EC='000'.$ResEmp['EmpCode'];} if($LEC==2){$EC='00'.$ResEmp['EmpCode'];} if($LEC==3){$EC='0'.$ResEmp['EmpCode'];} if($LEC>=4){$EC=$ResEmp['EmpCode'];}
$sDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$ResEmp['DepartmentId'], $con); $rDept=mysql_fetch_assoc($sDept); ?>
<tr bgcolor="#FFFFFF" style="height:22px;font-family:Times New Roman;font-size:12px;">
  <td align="center"><?php echo $sno; ?></td>
  <td align="center"><?php echo $EC; ?></td>
  <td><?php echo $Ename; ?></td>
  <td><?php echo $rDept['DepartmentCode']; ?></td>
  <td align="center"><?php if($ResEmp['MobileNo_Vnr']>0){echo $ResEmp['MobileNo_Vnr'];}else{echo $ResEmp['MobileNo'];} ?></td>
  <td><?php if($resa2['AssetNId']!=''){ $sqlAn=mysql_query("select AssetName from hrm_asset_name where AssetNId=".$resa2['AssetNId']); $resAn=mysql_fetch_array($sqlAn); echo strtoupper($resAn['AssetName']); } else {echo '';} ?></td>
  <td align="center"><a href="#" onClick="FunClickAssetReq(<?php echo $resa2['AssetEmpReqId'].','.$resa2['EmployeeID']; ?>)">Click</a></td>
  <td align="right"><?php echo intval($resa2['MaxLimitAmt']); ?>&nbsp;</td>
  <td align="right"><?php echo intval($resa2['ReqAmt']); ?>&nbsp;</td>
  <td align="right"><?php echo intval($resa2['ApprovalAmt']); ?>&nbsp;</td>
<?php if($resa2['ApprovalAmt']>$resa2['MaxLimitAmt']){$Over=$resa2['ApprovalAmt']-$resa2['MaxLimitAmt'];}
      else{$Over='';} ?><td align="right"><?php echo $Over; ?>&nbsp;</td>
  
  <td align="center"><?php if($resa2['PurDate']!='0000-00-00' AND $resa2['PurDate']!='1970-01-01'){echo date("d My",strtotime($resa2['PurDate']));} ?></td>
  <td align="center"><?php if($resa2['ReqDate']!='0000-00-00' AND $resa2['ReqDate']!='1970-01-01'){echo date("d My",strtotime($resa2['ReqDate']));} ?></td>
  <td align="center"><?php if($resa2['AccPayDate']!='0000-00-00' AND $resa2['AccPayDate']!='1970-01-01'){echo date("d My",strtotime($resa2['AccPayDate']));} ?></td>
  <td align="center"><?php if($resa2['AccSubDate']!='0000-00-00' AND $resa2['AccSubDate']!='1970-01-01'){echo date("d My",strtotime($resa2['AccSubDate']));} ?></td>
  
  <?php if($resa2['AccPayDate']!='0000-00-00' AND $resa2['AccPayDate']!='1970-01-01'){ $ExpMDate=date('d My', strtotime("+36 months", strtotime($resa2['AccPayDate']))); } elseif($resa2['ReqDate']!='0000-00-00' AND $resa2['ReqDate']!='1970-01-01'){ $ExpMDate=date('d My', strtotime("+36 months", strtotime($resa2['ReqDate']))); } elseif($resa2['PurDate']!='0000-00-00' AND $resa2['PurDate']!='1970-01-01'){ $ExpMDate=date('d My', strtotime("+36 months", strtotime($resa2['PurDate']))); } else { $ExpMDate='';} ?>  
  <td align="center"><?php echo $ExpMDate; ?></td>
  
  <td align="center"><?php if($resa2['ReqBillImgExtName']!=''){ ?><a href="#" onClick="javascript:window.open('MyAssetCopy.php?Img=Bill&value=<?php echo $resa2['ReqBillImgExtName']; ?>','ImgF','width=600,height=500')">Bill</a><?php } ?></td>
  <td align="center"><?php if($resa2['ReqAssestImgExtName']!=''){ ?><a href="#" onClick="javascript:window.open('MyAssetCopy.php?Img=Asset&value=<?php echo $resa2['ReqAssestImgExtName']; ?>','ImgF','width=600,height=500')">Asset</a><?php } ?></td>
  <td align="center" style="font-size:12px; font-family:Times New Roman;color:<?php if($resa2['AccPayStatus']==1){echo '#FF8C1A';}elseif($resa2['AccPayStatus']==2){echo '#008200';}elseif($resa2['AccPayStatus']==3){echo '#FF0000';} ?>;"><?php if($resa2['AccPayStatus']==0){echo 'Draft';}elseif($resa2['AccPayStatus']==1){echo 'Pending';}elseif($resa2['AccPayStatus']==2){echo 'Approved';}elseif($resa2['AccPayStatus']==3){echo 'Rejected';} ?></td>
</tr>
<?php $sno++; } ?>
  </table>
 </td>
</tr>
<?php } elseif($_REQUEST['allot']>0){ ?>
<tr>
 <td>
 <table border="1">
  <tr bgcolor="#0080FF"><td colspan="20" style="color:#FFFFFF;font-weight:bold;height:22px;font-family:Times New Roman;font-size:14px;">&nbsp;Allotment:
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onClick="Exportrep('A')" style="color:#F9F900; font-size:12px;">Export Excel</a></td></tr>
<tr bgcolor="#7a6189" style="color:#FFFFFF;font-weight:bold;height:22px;font-family:Times New Roman;font-size:12px;">
  <td style="width:30px;" align="center">SNo.</td>
  <td style="width:50px;" align="center">EC</td>
  <td style="width:200px;" align="center">Name</td>
  <td style="width:80px;" align="center">Department</td>
  <td style="width:80px;" align="center">Contact No</td>
  <td style="width:150px;" align="center">Name Of Asset</td>
  <td style="width:50px;" align="center">Details</td>
  <td style="width:100px;" align="center">Assest ID</td>
  <td style="width:150px;" align="center">Company</td>
  <td style="width:100px;" align="center">Model Name</td>
  <td style="width:60px;" align="center">Purchase</td>
  <td style="width:60px;" align="center">Allocated</td>
  <td style="width:60px;" align="center">Returned</td>
</tr>
<?php $sno2=1; while($resa=mysql_fetch_assoc($sqla)){ $SqlEmp2 = mysql_query("SELECT EmpCode,Fname,Sname,Lname,DepartmentId,MobileNo_Vnr,MobileNo from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmployeeID=".$resa['EmployeeID'], $con); $ResEmp2=mysql_fetch_assoc($SqlEmp2);
$Ename2 = $ResEmp2['Fname'].'&nbsp;'.$ResEmp2['Sname'].'&nbsp;'.$ResEmp2['Lname']; $LEC2=strlen($ResEmp2['EmpCode']); 
if($LEC2==1){$EC2='000'.$ResEmp2['EmpCode'];} if($LEC2==2){$EC2='00'.$ResEmp2['EmpCode'];} if($LEC2==3){$EC2='0'.$ResEmp2['EmpCode'];} if($LEC2>=4){$EC2=$ResEmp2['EmpCode'];}
$sDept2=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$ResEmp2['DepartmentId'], $con); $rDept2=mysql_fetch_assoc($sDept2); ?>
<tr bgcolor="#FFFFFF" style="height:22px;font-family:Times New Roman;font-size:12px;">
  <td align="center"><?php echo $sno2; ?></td>
  <td align="center"><?php echo $EC2; ?></td>
  <td><?php echo $Ename2; ?></td>
  <td><?php echo $rDept2['DepartmentCode']; ?></td>
  <td align="center"><?php if($ResEmp2['MobileNo_Vnr']>0){echo $ResEmp2['MobileNo_Vnr'];}else{echo $ResEmp2['MobileNo'];} ?></td>
  <td><?php if($resa['AssetNId']!=''){ $sqlAn2=mysql_query("select AssetName from hrm_asset_name where AssetNId=".$resa['AssetNId']); $resAn2=mysql_fetch_array($sqlAn2); echo strtoupper($resAn2['AssetName']); } else {echo '';} ?></td>
  <td align="center"><a href="#" onClick="FunClickAsset(<?php echo $resa['AssetEmpId'].','.$resa['EmployeeID']; ?>)">Click</a></td>
  <td><?php echo strtoupper($resa['AssetId']); ?></td>
  <td><?php echo strtoupper($resa['AComName']); ?></td>
  <td><?php echo strtoupper($resa['AModelName']); ?></td>
  <td align="center"><?php if($resa['APurDate']!='0000-00-00' AND $resa['APurDate']!='1970-01-01'){echo date("d My",strtotime($resa['APurDate']));} ?></td>
  <td align="center"><?php if($resa['AAllocate']!='0000-00-00' AND $resa['AAllocate']!='1970-01-01'){echo date("d My",strtotime($resa['AAllocate']));} ?></td>
  <td align="center"><?php if($resa['ADeAllocate']!='0000-00-00' AND $resa['ADeAllocate']!='1970-01-01'){echo date("d My",strtotime($resa['ADeAllocate']));} ?></td>
</tr>
<?php $sno2++; } ?>
 </table>
 </td>
</tr>
<?php } ?>
			   
			   
			   </table>
			 </td>
			</tr>		
		 </table>
	           </td>
    </tr>
</table>

<?php } ?>			
<?php //************************************************************************************************ ?>
		   </td>
		    <td valign="top">
		    <table align="right" border="0" style="margin-top:0px; width:10%; height:380px;">
		    <tr><td align="center" valign="top" width="100">&nbsp;</td></tr>
	        </table>
		   </td>
		    <td valign="top">
		    <table align="right" border="0" style="margin-top:0px; width:10%; height:380px;"><tr><td align="center" valign="top">&nbsp;&nbsp;</td></tr></table>
		   </td>
		  </tr>
		</table>
	  </td>
	</tr>
	
	<tr>
	  <td valign="top" align="center">
	    <table border="0" style="margin-top:0px;">
				<tr>
	              <td align="center"><img src="images/home1.png"></td>
				</tr>
	    </table>
	  </td>
	</tr>
	<tr>
	  <td valign="top">
	    <?php require_once("../footer.php"); ?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>
