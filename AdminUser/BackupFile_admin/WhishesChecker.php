<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//*********************************************************************************//
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.th{ font-family:Times New Roman;font-size:14px;font-weight:bold;text-align:center;color:#FFFFFF; }
.tdc{ font-family:Times New Roman;font-size:14px;text-align:center;color:#000000; }
.tdl{ font-family:Times New Roman;font-size:14px;text-align:left;color:#000000; }
.inner_table{height:550px;overflow-y:auto;width:auto;}
</style> 
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<Script type="text/javascript" language="javascript">
$(document).ready(function () { $("#table1").freezeHeader({ 'height': '500px' }); })

function SelectMonth(m)
{ var y=document.getElementById('Year').value; window.location="WhishesChecker.php?m="+m+'&y='+y; }
function SelectYear(y)
{ var m=document.getElementById('Month').value; window.location="WhishesChecker.php?m="+m+'&y='+y; }

function FunCheck(d,m,y,u,c)
{
 if(confirm("Are you sure?"))
 {
  
  if(document.getElementById('wish_allow_'+d).checked==true){var vv=1;}else{var vv=0;}
  var url = 'WhishesCheckerAct.php';  var pars = 'For=ChkOnWishMail&d='+d+'&m='+m+'&y='+y+'&vv='+vv+'&u='+u+'&c='+c;	
  var myAjax = new Ajax.Request(
  url, 
  {
		method: 'post', 
		parameters: pars, 
		onComplete: show_Exam
  });
  
 } //if(confirm("Are you sure?"))
}
function show_Exam(originalRequest)
{ document.getElementById('SpnaChkDL').innerHTML = originalRequest.responseText; 
   var d=document.getElementById('ChkVEmp').value;
   if(document.getElementById('ChkV').value==1)
   { 
    if(document.getElementById('ChkVvv').value==1)
	{ document.getElementById("OnTDL_"+d).style.background='#69D200'; 
	  document.getElementById("wish_allow_"+d).disabled=true;
	} 
    else{ document.getElementById("OnTDL_"+d).style.background='#FFFFFF'; }
   }
   else{ alert("Error!"); }
}
</SCRIPT>
</head>
<body class="body">
<span id="SpnaChkDL"></span>
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //****************************************************************************************?>
<?php //****************START*****START*****START******START******START****************************?>
<?php //*****************************************************************************************?>
  
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td width="335" class="heading">&nbsp;Date Wise Employee Wishes Details</td>
	  <td width="215" style="font-family:Georgia; font-size:17px; color:#804040; ">
	  <?php $y2=date("Y")+1; ?>
	  
	  <select class="selecti" style="width:100px;" name="Month" id="Month" onChange="SelectMonth(this.value)">
	  <?php //for($k=12; $k>=date("m"); $k--)
	  for($k=12; $k>=1; $k--){?><option value="<?=$k?>" <?php if($k==$_REQUEST['m']){echo 'selected';}?>><?=date("F",strtotime(date("Y-".$k."-01")))?></option><?php } ?>
	  </select>
	
	  <select class="selecti" style="width:100px;" name="Year" id="Year" onChange="SelectYear(this.value)">
	  <option value="<?=date("Y")?>" <?php if($_REQUEST['y']==date("Y")){echo 'selected';}?>><?=date("Y")?></option>
	  <option value="<?=$y2?>" <?php if($_REQUEST['y']==$y2){echo 'selected';} ?>><?=$y2?></option>
	  </select>
	  
	  </td>
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>	
 <tr>
<td align="left" id="type" valign="top" style="display:block; width:100%">             
 <table border="0" width="98%">
  <tr>
   <td align="left" width="100%">
	<table style="width:100%;" id="table1" border="1" cellspacing="1">
	<div class="thead">
	<thead>
	 <tr style="background-color:#7a6189;height:25px;">
	  <td class="th" style="width:5%;">Date</td>
	  <td class="th" style="width:42%;">Name Of Birthday Employee</td>
	  <td class="th" style="width:42%;">Name Of Anniversary Employee</td>
	  <td class="th" style="width:8%;">Check For <br>Confirmation</td>
	 </tr>
	</thead>
    </div>
	<div class="tbody">
    <tbody>
<?php $y=date("Y"); $len=strlen($_REQUEST['m']); if($len==1){$m='0'.$_REQUEST['m'];}else{$m=$_REQUEST['m'];} ?>	 
<?php for($i=1; $i<=date("t",strtotime(date("Y-".$m."-01"))); $i++){ ?>

<?php $sW=mysql_query("select * from hrm_wishmail_checker where WDate='".date("Y-".$m."-".$i)."' AND CompanyId=".$CompanyId,$con); 
      $rwW=mysql_num_rows($sW); $rW=mysql_fetch_assoc($sW); ?>

     <tr style="background-color:<?php if($rwW>0 && $rW['WCheck']==1){echo '#D5FFAA';}else{echo '#FFFFFF';}?>;height:25px;">
	  <td class="tdc" style="width:80px;"><b><?=date($i."-".$m."-Y")?></b></td>
	  <td class="tdl" style="width:400px;">
<?php 
      $sqlE=mysql_query("select e.EmployeeID,e.EmpCode,Fname,Sname,Lname,Gender,Married,DR,DepartmentCode,HqName from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID inner join hrm_employee_personal p on g.EmployeeID=p.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId inner join hrm_headquater hq on g.HqId=hq.HqId where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND g.DOB_dm='".date("0000-".$m."-".$i)."' order by g.GradeId DESC",$con);  $rowE=mysql_num_rows($sqlE);
while($resE=mysql_fetch_assoc($sqlE))
{ 
  $chkSp=mysql_query("select * from hrm_employee_separation where EmployeeID=".$resE['EmployeeID']." AND Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C'",$con); $RowchkSp=mysql_num_rows($chkSp);
  if($RowchkSp==0)
  {
   if($resE['DR']=='Y'){$MS='Dr.';} elseif($resE['Gender']=='M'){$MS='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$MS='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$MS='Miss.';}  
   if($resE['Sname']==''){ $Name = $MS.' '.ucwords(strtolower($resE['Fname'].' '.$resE['Lname'])); }
   else{ $Name = $MS.' '.ucwords(strtolower($resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'])); }
   echo '<b>'.$Name.'</b> ('.$resE['DepartmentCode'].', HQ-'.ucwords(strtolower($resE['HqName'])).'), ';
  }
} 
?> 	    
	  </td>
	  <td class="tdl" style="width:400px;">
<?php	
$sqlEa=mysql_query("select e.EmployeeID,e.EmpCode,Fname,Sname,Lname,Gender,Married,DR,DepartmentCode,HqName from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID inner join hrm_employee_personal p on g.EmployeeID=p.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId inner join hrm_headquater hq on g.HqId=hq.HqId where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.Married='Y' AND p.MarriageDate_dm='".date("0000-".$m."-".$i)."' order by g.GradeId DESC",$con);  $rowEa=mysql_num_rows($sqlEa);
while($resEa=mysql_fetch_assoc($sqlEa))
{
  $chkSp=mysql_query("select * from hrm_employee_separation where EmployeeID=".$resEa['EmployeeID']." AND Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C'",$con); $RowchkSp=mysql_num_rows($chkSp);
 
  if($RowchkSp==0)
  {    
  if($resEa['DR']=='Y' AND $resEa['Gender']=='M'){$MSa='Mrs. & Dr.';} 
  elseif($resEa['DR']=='Y' AND $resEa['Gender']=='F'){$MSa='Mr. & Dr.';}
  elseif($resEa['Gender']=='M'){$MSa='Mrs. & Mr.';}
  elseif($resEa['Gender']=='F'){$MSa='Mr. & Mrs.';}   
  if($resEa['Sname']==''){ $NameAnn = $MSa.' '.ucwords(strtolower($resEa['Fname'].' '.$resEa['Lname'])); }
  else{ $NameAnn = $MSa.' '.ucwords(strtolower($resEa['Fname'].' '.$resEa['Sname'].' '.$resEa['Lname'])); }
  echo '<b>'.$NameAnn.'</b> ('.$resEa['DepartmentCode'].', HQ-'.ucwords(strtolower($resEa['HqName'])).'), ';
  }
}  
?>  
	  </td>

	  <td align="center" id="OnTDL_<?=$i?>" style="background-color:<?php if($rwW>0 && $rW['WCheck']==1){echo '#69D200';}?>;"><?php if($rowE>0 OR $rowEa>0){ ?><input type="checkbox"  id="wish_allow_<?=$i?>" onClick="FunCheck(<?=$i.','.$m.','.$y.','.$UserId.','.$CompanyId?>)" <?php if($rwW>0 && $rW['WCheck']==1){echo 'checked'; }?> <?php if($rwW>0 && $rW['WCheck']==1){echo 'disabled';}?> /><?php } ?></td>
   
	 </tr>
	</tbody>
    </div>
<?php } ?>	      
	</table>
   </td>
  </tr>  
  <tr>
   <td align="Right" class="fontButton">
   <table border="0" width="550">
    <tr>
	 <td align="right">
	  <input type="button" name="Back" id="Back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
	  <input type="button" name="Refrash" value="refresh" onClick="javascript:window.location='WhishesChecker.php'"/>&nbsp;
	 </td> 
	</tr>
   </table>
   </td>
   </tr>
  </table>  
</td>


 </tr>
<?php } ?> 
</table>
		
<?php //****************************************************************************************?>
<?php //********************END*****END*****END******END******END*************************************?>
<?php //*************************************************************************?>
		
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
