<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}

if(!isset($CompanyId)){ $CompanyId=$_REQUEST['ci']; }

if(isset($_POST['SubmitDGSH']))
{
  $con2=mysql_connect('localhost','vnrseed2_hrims','5Az*hcHimJkE');
  $db2=mysql_select_db('hrims_movefromvess', $con2);
  
  $DesigMn=$_POST['DesigNN'];
  if($_POST['DesigNN']==''){ $DesigMn=$_POST['DesigM']; }
  $sqlup = mysql_query("update hrm_employee set New_Dept=".$_POST['DeptName'].", New_Desig=".$DesigMn.", New_Grade=".$_POST['GradeName'].", New_State='".$_POST['StateName']."', New_Hq=".$_POST['HQQName'].", DOE='".date("Y-m-d",strtotime($_POST['DOE']))."' where EmployeeID=".$_POST['eei'], $con2);
 
  if($sqlup)
  { 
   echo '<script>alert("Record updated successfully!"); window.location="MoveEmpFromVess.php?ci='.$_POST['cci'].'&ui='.$_POST['uui'].'; </script>';
  }
}
?>
<html>

<head>
    <title><?php include_once('../Title.php'); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    <link type="text/css" href="css/body.css" rel="stylesheet" />
    <link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
    <script type="text/javascript" src="js/stuHover.js"></script>
    <script type="text/javascript" src="js/Prototype.js"></script>
    <script language="javascript">
        function OpenF(sn) {
            document.getElementById("TD" + sn).style.display = 'block';
            document.getElementById("ADown" + sn).style.display = 'none';
            document.getElementById("AUp" + sn).style.display = 'block';
        }

        function CloseF(sn) {
            document.getElementById("TD" + sn).style.display = 'none';
            document.getElementById("ADown" + sn).style.display = 'block';
            document.getElementById("AUp" + sn).style.display = 'none';
        }
		
function DeptSelect(value,sn) { 
   document.getElementById("Msno").value=sn;    
   var url = 'MoveEmpFromVessAjax.php';	var pars = 'Deptid='+value;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_NewDeptSelect
	});
} 
function show_NewDeptSelect(originalRequest)
{ document.getElementById('DesigSpan'+document.getElementById("Msno").value).innerHTML = originalRequest.responseText; }


function StateSelect(value,sn) { 
   document.getElementById("Msno").value=sn;    
   var url = 'MoveEmpFromVessAjax.php';	var pars = 'stateid='+value+'&sn='+sn;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_NewStateSelect
	});
} 
function show_NewStateSelect(originalRequest)
{ document.getElementById('HQSpan'+document.getElementById("Msno").value).innerHTML = originalRequest.responseText; }


function SelDesig(de)
{
 var sn=document.getElementById("Msno").value;    
 document.getElementById("DesigNN"+sn).value=de;
}


function FValid(formu,sn)
{
 if(document.getElementById("DeptName"+sn).value==''){ alert("Department field is required!"); return false; }
 else if(document.getElementById("DesigName"+sn).value==''){ alert("Department field is required!"); return false; }
 else if(document.getElementById("GradeName"+sn).value==''){ alert("Department field is required!"); return false; }
 else if(document.getElementById("HQName"+sn).value==''){ alert("Department field is required!"); return false; }
 else
 {
  var agree=confirm("Are you sure?");
  if(agree){ return true; }else{ return false; }
 } 
}
	
    </script>
    <style>
        .th {
            font-family: Times New Roman;
            font-size: 12px;
            font-weight: bold;
            text-align: center;
            background-color: #7a6189;
            color: #FFFFFF;
        }

        .sth {
            font-family: Times New Roman;
            font-size: 14px;
            width: 40%;
            text-align: center;
            background-color: #FFFF80;
            color: #000000;
        }

        .sth2 {
            font-family: Times New Roman;
            font-size: 14px;
            width: 60%;
            text-align: center;
            background-color: #FFFF80;
            color: #000000;
        }

        .tdc {
            font-family: Times New Roman;
            font-size: 12px;
            text-align: center;
            background-color: #FFFFFF;
            color: #000000;
        }

        .tdl {
            font-family: Times New Roman;
            font-size: 12px;
            text-align: left;
            background-color: #FFFFFF;
            color: #000000;
            padding-left: 3px;
        }

        .tdr {
            font-family: Times New Roman;
            font-size: 12px;
            text-align: right;
            background-color: #FFFFFF;
            color: #000000;
        }

        .stdl {
            font-family: Times New Roman;
            font-size: 12px;
            text-align: left;
            background-color: #C6FF8C;
            color: #000000;
            width: 100px;
            font-weight: bold;
            padding-left: 3px;
        }

        .tdli {
            font-family: Times New Roman;
            font-size: 12px;
            text-align: left;
            background-color: #FFFFFF;
            color: #000000;
        }

        /* Center the loader */
        #loader {
            position: absolute;
            left: 50%;
            top: 50%;
            z-index: 1;
            width: 120px;
            height: 120px;
            margin: -76px 0 0 -76px;
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Add animation to "page content" */
        .animate-bottom {
            position: relative;
            -webkit-animation-name: animatebottom;
            -webkit-animation-duration: 1s;
            animation-name: animatebottom;
            animation-duration: 1s
        }

        @-webkit-keyframes animatebottom {
            from {
                bottom: -100px;
                opacity: 0
            }

            to {
                bottom: 0px;
                opacity: 1
            }
        }

        @keyframes animatebottom {
            from {
                bottom: -100px;
                opacity: 0
            }

            to {
                bottom: 0;
                opacity: 1
            }
        }

        #myDiv {
            display: none;
            text-align: center;
        }
    </style>
</head>
<?php 
$con=mysql_connect('localhost','vnrseed2_hrims','5Az*hcHimJkE');
$db=mysql_select_db('hrims', $con); ?>
<body class="body">
    <span id="SpnaChkMove"></span>
	<div id="SpanMove"></div>
<div id="loaderDiv" style="background-color: rgba(0,0,0,0.8);width: 100%;height: 100%;position: fixed;top:0px;left: 0px;font-size: 12px; display:none;">	
	<center>
	<span style="color:white;top: 50%;left:38%;position: absolute;">Please Wait, working on Progress...<img src="images/loader.gif"></span>
	</center>
</div>	
    <table class="table">
        <tr>
            <td>
                <table class="menutable">
                    <tr>
                        <td><?php if ($_SESSION['login'] = true) {
                                require_once("AMenu.php");
                            } ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <table width="100%" style="margin-top:0px;" border="0">
                    <tr>
                        <td valign="top"><?php if ($_SESSION['login'] = true) {
                                                require_once("AWelcome.php");
                                            } ?></td>
                    </tr>
                    <tr>
                        <td>
                            <table>
                                <tr>
                                    <td width="50">&nbsp;</td>
                                    <td style="width:250px; font-family:Times New Roman; font-size:16px; color:#287126; font-weight:bold;"><span id="msgspan"><?php echo $msg; ?></span></b></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top" align="center" width="100%" id="MainWindow" style="vertical-align:top;">

                            <?php //************START*****START*****START******START******START********************************************
                            ?>
                            <table border="0" style="margin-top:0px;width:100%;vertical-align:top;">
                                <tr>
                                    <td width="10" bgcolor="">&nbsp;</td>
                                    <td style="vertical-align:top;">
                                        <table border="0" style="vertical-align:top;">
                                            <tr>
                                                <td width="400" class="heading"><i>Move Employee From VESS Table</i></td>
                                            </tr>
<tr>
	<td colspan="3" style="color:#FF0000;font-size:14px;"><b><?php if ($_REQUEST['action'] == 'false') {
																	echo 'This employee code allready exist..';
																} ?></b> </td>
</tr>
                                        </table>
                                    </td>
                                </tr>
<?php if (($_SESSION['UserType'] == 'M' or $_SESSION['UserType'] == 'S' or $_SESSION['UserType'] == 'A' or $_SESSION['UserType'] == 'U') and $_SESSION['login'] = true) { ?>
<input type="hidden" id="Msno" value="" />
<tr>
<td width="10">&nbsp;<span id="EditTEmp"></span></td>
<td align="left" style="display:block;vertical-align:top;">

<table border="0" style="vertical-align:top;width:100%;">
<tr>
<td align="left" style="vertical-align:top;width:100%;">
<table border="1" style="width:95%;" cellspacing="1">
<tr style="height:30px;">
<td class="th" style="width:4%;">Sn</td>
<td class="th" style="width:5%;">EmpCode</td>
<td class="th" style="width:20%">Name</td>
<td class="th" style="width:11%;">Department</td>
<td class="th" style="width:20%;">Designation</td>
<td class="th" style="width:5%;">Grade</td>
<td class="th" style="width:5%;">HQ</td>
<td class="th" style="width:8%;">Contact</td>
<td class="th" style="width:17%;">Email</td>
<td class="th" style="width:10%;">View/Move</td>
</tr>

<?php
//$con2=mysql_connect('localhost','hrims_user','hrims@192');
//$db2=mysql_select_db('hrims_movefromvess', $con2);
$con2=mysql_connect('localhost','vnrseed2_hrims','5Az*hcHimJkE');
if(!$con2) die("Failed to connect to database!");
$db2=mysql_select_db('hrims_movefromvess', $con2);
if(!$db2) die("Failed to select database!");

$sql = mysql_query("select e.*,g.*,p.* from hrm_employee e left join hrm_employee_general g on e.EmployeeID=g.EmployeeID left join hrm_employee_personal p on e.EmployeeID=p.EmployeeID where DataMoved_toESS='N' order by EmpCode ASC", $con2);


$sn = 1;
while($res = mysql_fetch_assoc($sql)){
?>
<tr style="height:26px;">
<td class="tdc" style="width:4%;"><?= $sn ?></td>
<td class="tdc" style="width:5%;"><?= $res['VCode'].''.$res['EmpCode'] ?></td>
<td class="tdl" style="width:20%"><?= $res['Fname'] . ' ' . $res['Sname'] . ' ' . $res['Lname'] ?></td>
<?php 
$con2=mysql_connect('localhost','vnrseed2_hrims','5Az*hcHimJkE');
$db2=mysql_select_db('hrims_movefromvess', $con2);
$sD = mysql_query("select DepartmentCode from hrm_department where DepartmentId=" . $res['DepartmentId'], $con2);
$sDe = mysql_query("select DesigName from hrm_designation where DesigId=".$res['DesigId'], $con2);
$sG = mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId'], $con2);
$sHq = mysql_query("select HqName from hrm_headquater where HqId=".$res['HqId'], $con2);
$rD = mysql_fetch_assoc($sD); $rDe = mysql_fetch_assoc($sDe); $rG = mysql_fetch_assoc($sG);
$rHq = mysql_fetch_assoc($sHq); ?>
<td class="tdl" style="width:11%;"><?= $rD['DepartmentCode'] ?></td>
<td class="tdl" style="width:20%;"><?= $rDe['DesigName'] ?></td>
<td class="tdc" style="width:5%;"><?= $rG['GradeValue'] ?></td>
<td class="tdc" style="width:8%;"><?= $rHq['HqName'] ?></td>
<td class="tdc" style="width:8%;"><?= $res['MobileNo_Vnr'] ?></td>
<td class="tdl" style="width:17%;"><?= $res['EmailId_Vnr'] ?></td>
<td style="width:5%;cursor:pointer;background-color:#FFFFFF;" align="center">
<span onClick="OpenF(<?= $sn ?>)"><img src="images/ADown.png" id="ADown<?= $sn ?>" /></span>
<span onClick="CloseF(<?= $sn ?>)"><img src="images/AUp.png" id="AUp<?= $sn ?>" style="display:none;" /></span>
</td>
</tr>

<!-------------------------------------------------------------------------- Start -->
<!-------------------------------------------------------------------------- Start -->

<tr>
 <td colspan="20">
<div id="TD<?=$sn?>" style="vertical-align:top;display:none;width:100%;">
<table border="1" style="width:100%;" cellspacing="1">
 <tr style="width:28px;">
  <td class="sth"><b>Updation Required!</b></td>
  <td class="sth2"><b>Action</b></td>
 </tr>

 <tr>
<?php /********************************************************************************/ ?>
<?php /********************************************************************************/ ?>
<form method="post" name="formu" onSubmit="return FValid(this,<?=$sn?>)">
<input type="hidden" name="eei" value="<?=$res['EmployeeID']?>" />
<?php
$con=mysql_connect('localhost','vnrseed2_hrims','5Az*hcHimJkE');
if(!$con) die("Failed to connect to database!");
$db=mysql_select_db('hrims', $con); 
if(!$db) die("Failed to select database!"); ?>
<td style="vertical-align:top;">
<table style="width:100%;" border="1" cellspacing="0" cellpadding="1">
	<tr style="height:25px;">
		<td class="stdl">Department</td>
		<td class="tdl"><select class="All_200" name="DeptName" id="DeptName<?=$sn?>" onChange="DeptSelect(this.value,<?=$sn?>)" style="text-transform:uppercase;" required><option value="">Select</option><?php $SqlDept=mysql_query("select * from core_departments order by department_name ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?>
  <option value="<?php echo $ResDept['id']; ?>" <?php if($res['New_Dept']==$ResDept['id']){echo 'selected';}?>><?php echo $ResDept['department_code'].'&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;'.$ResDept['department_name']; ?></option><?php } ?></select></td>
	</tr>
	<tr style="height:25px;">
		<td class="stdl">Designaion</td>
		<td class="tdl"><span id="DesigSpan<?=$sn?>"><select class="All_200" name="DesigName" id="DesigName<?=$sn?>" style="text-transform:uppercase;" disabled><?php if($res['New_Desig']==0){?><option value="">Select</option><?php } $SqlDe=mysql_query("select id as DesigId,designation_name as DesigName from core_designation where id=".$res['New_Desig'], $con); $ResDe=mysql_fetch_assoc($SqlDe);?><option value="<?php echo $res['New_Desig']; ?>" <?php if($res['New_Desig']==$ResDe['DesigId']){echo 'selected';}?>><?php echo $ResDe['DesigName']; ?></option></select>
		<input type="hidden" name="DesigM" value="<?=$res['New_Desig']?>" />
		</td>
	</tr>
	<tr style="height:25px;">
		<td class="stdl">Grade</td>
		<td class="tdl"><select class="All_200" name="GradeName" id="GradeName<?=$sn?>" required><?php if($res['New_Grade']==0){?><option value="">Select</option><?php } $sqlGr= mysql_query("select * from core_grades WHERE is_active=1 and company_id=".$CompanyId." order by id", $con);while($resGr = mysql_fetch_array($sqlGr)){ ?>
  <option value="<?php echo $resGr['id']; ?>" <?php if($res['New_Grade']==$resGr['id']){echo 'selected';}?>><?php echo $resGr['grade_name']; ?></option><?php } ?>
  </select></td>
	</tr>
	<tr style="height:25px;">
		<td class="stdl">State</td>
		<td class="tdl"><select class="All_200" name="StateName" id="StateName<?=$sn?>" onChange="StateSelect(this.value,<?=$sn?>)">
  <option value="0">Select</option>
  <?php $sCostC = mysql_query("select * from core_states WHERE is_active=1 order by state_name",$con);
while($rCostC = mysql_fetch_array($sCostC)){ ?><option value="<?=$rCostC['id']?>" <?php if($rCostC['id']==$ResEmp['CostCenter']){echo 'selected';}?>><?=$rCostC['state_name']?></option><?php }  ?></select>
 </span></td>
	</tr>
	
	<tr style="height:25px;">
		<td class="stdl">HQ</td>
		<td class="tdl"><span id="HQSpan<?=$sn?>"><select class="All_200" name="HQName" onChange="HQSelect(this.value,<?=$sn?>)" required><option value="">Select</option></select></span>
		<input type="hidden" name="HQQName" id="HQQName<?=$sn?>" value="0" />
		
		<script>
		    function HQSelect(v,sn){ document.getElementById("HQQName"+sn).value=v; }
		</script>
		
		</td>
	</tr>
	
	<tr style="height:25px;">
		<td class="stdl">Change with effected from</td>
		<td class="tdl"><input name="DOE" id="DOE<?=$sn?>" class="All_100" value="<?php if($res['DOE']>'2023-01-01'){ echo date("d-m-Y",strtotime($res['DOE'])); } ?>" readonly><button id="f_btn1<?=$sn?>" class="CalenderButton"></td>
	</tr>
	<script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
  cal.manageFields("f_btn1<?=$sn?>", "DOE<?=$sn?>", "%d-%m-%Y"); </script>
	
	<tr style="height:25px;">
	    <td colspan="2" class="stdl" style="text-align:center;">
	<input type="hidden" name="DesigNN" id="DesigNN<?=$sn?>" value="" />
	<input type="hidden" name="cci" value="<?=$_REQUEST['ci']?>" />
	<input type="hidden" name="uui" value="<?=$_REQUEST['ui']?>" />
		 <input type="submit" name="SubmitDGSH" style="width:200px;height:25px;cursor:pointer;" value="Update" <?php if($res['New_Dept']>0 && $res['New_Desig']>0 && $res['New_Grade']>0 && $res['New_Hq']>0 && $res['DOE']>'2023-01-01'){ echo 'disabled';} ?>/>
		</td>
	</tr>
  
</table>
</td>
</form>



<script language="javascript" type="text/javascript">
function MoveEData(vi,vn,ei,ui)
{
 //var StrBVal=vn.bold();
 var agree=confirm('Are you sure, you want to move "'+vn+'" from vess to ess?');
 if(agree)
 {
  document.getElementById('loaderDiv').style.display='block';
  var url = 'MoveEmpFromVessAjax.php';
  var pars = 'For=MoveVessDatatoESS&vi='+vi+'&ei='+ei+'&ui='+ui+'&vn='+vn; 
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_rst });
 }
}
function show_rst(originalRequest)
{
 document.getElementById('SpanMove').innerHTML = originalRequest.responseText;
 var vi_rst = document.getElementById('ChkVvi').value;
 if(document.getElementById('ChkVrst').value == 1)
 { 
  document.getElementById(vi_rst).style.display = 'none'; 
  document.getElementById("C"+vi_rst).style.display = 'block';
  alert(document.getElementById('ChkVvn').value+" moved successfully");
  if(document.getElementById('FinalSts').value==1)
  {
   document.getElementById('SpanFinal').style.display = 'block';
  }
 } 
 else{ alert("Error! Please check issue"); }
 document.getElementById('loaderDiv').style.display='none';
}

function BtnFinSub(ei,ui)
{
 var agree=confirm('Are you sure, you want to final submission?');
 if(agree)
 {
  document.getElementById('loaderDiv').style.display='block';
  var url = 'MoveEmpFromVessAjax.php';
  var pars = 'For=FinalDataSubmission&ei='+ei+'&ui='+ui;
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_Finalrst });
 }
}
function show_Finalrst(originalRequest)
{
 document.getElementById('SpanMove').innerHTML = originalRequest.responseText;
 if(document.getElementById('Final_Status').value == 1)
 { 
  document.getElementById("SpanFinal").style.display = 'none'; 
  alert("Data submitted successfully");
 } 
 else{ alert("Error! Please check issue"); }
 document.getElementById('loaderDiv').style.display='none';
}

//Mv_b Mv_c Mv_ed Mv_ex Mv_f Mv_l Mv_ct Mv_cp Mv_tc Mv_h
</script>



<td style="vertical-align:top;">
 <table style="width:100%;" border="1" cellspacing="0" cellpadding="1">
 
<?php /*************************************************************************************************/ ?>
<?php if($res['New_Dept']>0 && $res['New_Desig']>0 && $res['New_Grade']>0 && $res['New_Hq']>0 && $res['DOE']>'2023-01-01'){ ?>
<tr>
   <td colspan="10">
    <table border="1" style="width:100%;" cellspacing="0" cellpadding="1">
	 <tr style="height:30px;background-color:#551FF8;color:#FFFFFF;">
	  <td class="tdc"><b>Sn</b></td>
      <td class="tdc"><b>Data Information</b></td>
      <td class="tdc"><b>Action</b></td>
      <td class="tdc"><b>Status</b></td> 
	 </tr>
	 <tr class="trc">
	  <td class="tdc">1</td><td class="tdl">&nbsp;Basic Details(Include General/Personal/Contact)</td>
      <td class="tdc"><?php if($res['Mv_b']==0){ ?><img src="images/move2-icon.png" id="Mv_b" height="16px" width="16px" alt="Basic" border="0" style="cursor:pointer;" onClick="MoveEData('Mv_b','Basic Details(Include General/Personal/Contact) data',<?=$res['EmployeeID'].','.$_REQUEST['ui']?>)"><?php  } ?></td>
      <td class="tdc"><span id="CMv_b" style="display:none;">Moved</span><?php if($res['Mv_b']==1){echo 'Moved';}?></td> 
	 </tr>
	 <tr class="trc">
	  <td class="tdc">2</td><td class="tdl">&nbsp;Contact Details</td>
      <td class="tdc"><?php if($res['Mv_c']==0){ ?><img src="images/move2-icon.png" id="Mv_c" height="16px" width="16px" alt="Basic" border="0" style="cursor:pointer;" onClick="MoveEData('Mv_c','Contact Details data',<?=$res['EmployeeID'].','.$_REQUEST['ui']?>)"><?php } ?></td>
      <td class="tdc"><span id="CMv_c" style="display:none;">Moved</span><?php if($res['Mv_c']==1){echo 'Moved';}?></td> 
	 </tr>
	 <tr class="trc">
	  <td class="tdc">3</td><td class="tdl">&nbsp;Education Details</td>
      <td class="tdc"><?php if($res['Mv_ed']==0){ ?><img src="images/move2-icon.png" id="Mv_ed" height="16px" width="16px" alt="Basic" border="0" style="cursor:pointer;" onClick="MoveEData('Mv_ed','Education Details data',<?=$res['EmployeeID'].','.$_REQUEST['ui']?>)"><?php } ?></td>
      <td class="tdc"><span id="CMv_ed" style="display:none;">Moved</span><?php if($res['Mv_ed']==1){echo 'Moved';}?></td> 
	 </tr>
	 <tr class="trc">
	  <td class="tdc">4</td><td class="tdl">&nbsp;Experience Details</td>
      <td class="tdc"><?php if($res['Mv_ex']==0){ ?><img src="images/move2-icon.png" id="Mv_ex" height="16px" width="16px" alt="Basic" border="0" style="cursor:pointer;" onClick="MoveEData('Mv_ex','Experience Details data',<?=$res['EmployeeID'].','.$_REQUEST['ui']?>)"><?php } ?></td>
      <td class="tdc"><span id="CMv_ex" style="display:none;">Moved</span><?php if($res['Mv_ex']==1){echo 'Moved';}?></td> 
	 </tr>
	 <tr class="trc">
	  <td class="tdc">5</td><td class="tdl">&nbsp;Family Details</td>
      <td class="tdc"><?php if($res['Mv_f']==0){ ?><img src="images/move2-icon.png" id="Mv_f" height="16px" width="16px" alt="Basic" border="0" style="cursor:pointer;" onClick="MoveEData('Mv_f','Family Details data',<?=$res['EmployeeID'].','.$_REQUEST['ui']?>)"><?php } ?></td>
      <td class="tdc"><span id="CMv_f" style="display:none;">Moved</span><?php if($res['Mv_f']==1){echo 'Moved';}?></td> 
	 </tr>
	 <tr class="trc">
	  <td class="tdc">6</td><td class="tdl">&nbsp;Language Proficiency & Leave Details</td>
      <td class="tdc"><?php if($res['Mv_l']==0){ ?><img src="images/move2-icon.png" id="Mv_l" height="16px" width="16px" alt="Basic" border="0" style="cursor:pointer;" onClick="MoveEData('Mv_l','Language Proficiency data',<?=$res['EmployeeID'].','.$_REQUEST['ui']?>)"><?php } ?></td>
      <td class="tdc"><span id="CMv_l" style="display:none;">Moved</span><?php if($res['Mv_l']==1){echo 'Moved';}?></td> 
	 </tr>
	 
	 <tr class="trc">
	  <td class="tdc">7</td><td class="tdl">&nbsp;CTC, Eligibility & Payslip</td>
      <td class="tdc"><?php if($res['Mv_ct']==0){ ?><img src="images/move2-icon.png" id="Mv_ct" height="16px" width="16px" alt="Basic" border="0" style="cursor:pointer;" onClick="MoveEData('Mv_ct','CTC & Eligibility data',<?=$res['EmployeeID'].','.$_REQUEST['ui']?>)"><?php } ?></td>
      <td class="tdc"><span id="CMv_ct" style="display:none;">Moved</span><?php if($res['Mv_ct']==1){echo 'Moved';}?></td> 
	 </tr>

	 <tr class="trc">
	  <td class="tdc">8</td><td class="tdl">&nbsp;CheckList & Photo</td>
      <td class="tdc"><?php if($res['Mv_cp']==0){ ?><img src="images/move2-icon.png" id="Mv_cp" height="16px" width="16px" alt="Basic" border="0" style="cursor:pointer;" onClick="MoveEData('Mv_cp','CheckList & Photo data',<?=$res['EmployeeID'].','.$_REQUEST['ui']?>)"><?php } ?></td>
      <td class="tdc"><span id="CMv_cp" style="display:none;">Moved</span><?php if($res['Mv_cp']==1){echo 'Moved';}?></td> 
	 </tr>
	 <tr class="trc">
	  <td class="tdc">9</td><td class="tdl">&nbsp;History</td>
      <td class="tdc"><?php if($res['Mv_h']==0){ ?><img src="images/move2-icon.png" id="Mv_h" height="16px" width="16px" alt="Basic" border="0" style="cursor:pointer;" onClick="MoveEData('Mv_h','History data',<?=$res['EmployeeID'].','.$_REQUEST['ui']?>)"><?php } ?></td>
      <td class="tdc"><span id="CMv_h" style="display:none;">Moved</span><?php if($res['Mv_h']==1){echo 'Moved';}?></td> 
	 </tr>
	</table>
   </td>
   
  </tr>
 
<?php
//$SckV=mysql_query("select Mv_b, Mv_c, Mv_ed, Mv_ex, Mv_f, Mv_l, Mv_cp, Mv_h from hrm_employee where EmployeeID=".$_REQUEST['EI'],$con2); $RckV=mysql_fetch_assoc($SckV); 
?> 
  <tr class="trc" style="height:30px;">
	<td colspan="10" class="tdc" style="background-color:#A0FE78; font-size:18px;"><span id="SpanFinal" style="display:<?php if($res['Mv_b']==1 && $res['Mv_c']==1 && $res['Mv_ed']==1 && $res['Mv_ex']==1 && $res['Mv_f']==1 && $res['Mv_l']==1 && $res['Mv_ct']==1 && $res['Mv_cp']==1 && $res['Mv_h']==1){echo 'block';}else{echo 'none';}?>;">
	 <i>Click for final submission :</i>&nbsp;
	 <input type="Button" name="Vsubmit" id="Vsubmit" value="submit" onClick="BtnFinSub(<?=$res['EmployeeID'].','.$_REQUEST['ui']?>)" style="width:90px;cursor:pointer;" />
	 </span>
	</td> 
	
  </tr>
<?php } ?>  
<?php /*************************************************************************************************/ ?> 
  
 </table>
</td> 


<?php /********************************************************************************/ ?>
<?php /********************************************************************************/ ?>
 </tr>
</table> 
</div>
 </td>
</tr>

<!-------------------------------------------------------------------------- End -->
<!-------------------------------------------------------------------------- End -->

<?php $sn++;
} ?>
    
    
    

</table>
</td>
</tr>
</table>
</td>

</tr>
<?php } ?>
</table>
<?php //**********************************************END*****END*****END******END******END***************************************************************
?>
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