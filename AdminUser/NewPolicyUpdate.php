<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:250px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:13px; height:10px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.cell {color:#FFFFFF;font-family:Times New Roman;font-size:14px;font-weight:bold;} 
.cell2 {color:#000;font-family:Times New Roman;font-size:14px;} .cell3 {color:#030303;font-family:Times New Roman;font-size:14px; font-weight:bold;} 
.cellOpe {color:#FFFFFF;font-family:Times New Roman; height:20px; font-size:14px; font-weight:bold;}
.cellOpe2 {color:#000;font-family:Times New Roman; height:20px; font-size:14px; font-weight:bold;}
.cellOpe3 {color:#000;font-family:Times New Roman; width:30px;height:20px; font-size:14px; font-weight:bold;}
.th{ font-family:Times New Roman;font-size:12px; text-align:center; font-weight:bold; color:#FFFFFF; }
.tdc{ font-family:Times New Roman;font-size:12px; text-align:center; color:#000000; }
.tdl{ font-family:Times New Roman;font-size:12px; padding-left:2px; color:#000000; }
.tdll{ font-family:Times New Roman;font-size:12px; padding-left:2px; color:#000000; width:98%; }

.htf{font-family:Times New Roman;;color:#000;font-weight:bold;text-align:center;font-size:18px;height:24px;}
.htf2{font-family:Times New Roman;;color:#000;font-weight:bold;text-align:center;font-size:12px;}
.tdf{ font-family:Times New Roman;font-size:12px;color:#000000;}
.tdft{ background-color:#FFFF9D;font-family:Times New Roman;font-size:14px;color:#000000;}
.tdf2{background-color:#FFFFC4;font-family:Times New Roman;;font-size:12px;text-align:center;}
.tdf22{background-color:#FFFFC1;font-family:Times New Roman;;font-size:12px;text-align:center;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px; height:20px;}
.EditInput { font-family:Georgia; font-size:12px; height:20px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.tdfsel{ background-color:#FFFFFF;font-family:Times New Roman;font-size:14px;color:#000000; border:hidden;}
.inner_table{height:450px;overflow-y:auto;width:auto;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/MasterAjaxCall.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</script>
<script type="text/javascript" src=""></script>
<script type="text/javascript" language="javascript">
function SelectMonthDept(value){ var x = 'NewPolicyUpdate.php?d='+value; window.location=x; }
   
function ApplyCore(v,no,idnm,nm)
{  
  document.getElementById(idnm+'_'+no).value=v;  
  if(nm=='Zone'){ document.getElementById("Zonee_"+no).value=0; document.getElementById("Regionn_"+no).value=0; document.getElementById("Terrr_"+no).value=0; }
  else if(nm=='Region'){ document.getElementById("Regionn_"+no).value=0; document.getElementById("Terrr_"+no).value=0; }
  else if(nm=='Terr'){ document.getElementById("Terrr_"+no).value=0; }

  if(nm!='')
  { 
   document.getElementById("vID").value=v; document.getElementById("noID").value=no; document.getElementById("nmID").value=nm; 
   var url = 'NewPolicyUpdateAjax.php';  var pars = 'Act=ApplyCore&v='+v+'&no='+no+'&nm='+nm;
   var myAjax = new Ajax.Request(
   url, 
   {
    method: 'post', 
    parameters: pars,
    onComplete: show_ApplyCore
     
   });
  }    
}
function show_ApplyCore(originalRequest)
{ 
  var vID=document.getElementById('vID').value;
  var noID=document.getElementById('noID').value; 
  var nmID=document.getElementById('nmID').value; 
  document.getElementById('Span'+nmID+'_'+noID).innerHTML = originalRequest.responseText; 
  if(nmID=='SubDept'){ ApplyCore(vID,noID,'Sec');  }
  else if(nmID=='Sec'){ ApplyCore(vID,noID,'Desig');  }
}


function FunSave(no,empid,uid)
{
  var agree = confirm('Are you sure you want to approved the records');
  if(agree)
  {
    document.getElementById("noID").value=no;
    var url = 'NewPolicyUpdateAjax.php';  var pars = 'Act=UpdatePolicy&no='+no+'&empid='+empid+'&uid='+uid;
    var myAjax = new Ajax.Request(
    url, 
    {
     method: 'post', 
     parameters: pars,
     onComplete: show_MappingCoreLoc  
    });
  }
} 
function show_MappingCoreLoc(originalRequest)
{ 
  document.getElementById('DivSpan').innerHTML = originalRequest.responseText; 
  var noID=document.getElementById('noID').value;
  if(document.getElementById("RstVal").value==1)
  { alert("Data approved successfully!"); document.getElementById("ffont"+noID).innerHTML='saved'; }
  else{ alert("Error.."); document.getElementById("ffont").value=''; }
}



function ExportData()
{ var ComId=document.getElementById("ComId").value; 
  var YId=document.getElementById("YearId").value;   
  window.open("NewPolicyUpdateExp.php?action=Export&C="+ComId+"&Y="+YId,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20"); }  
  
</script>   
</head>
<body class="body">
<input type="hidden" id="vID" value="<?=$_POST['v']?>" />  
<input type="hidden" id="noID" value="<?=$_POST['no']?>" />
<input type="hidden" id="nmID" value="<?=$_POST['nm']?>" />
<span id="DivSpan"></span>
<table class="table" border="0">  
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top" align="left"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow">
<?php //*********************************************************************************************/ ?>
<?php //*************************START*****START*****START******START******START***************************/ ?>
<?php //**********************************************************************************************/ ?>

<?php

?>


<form name="formname" method="post" />  
<table border="0" style="margin-top:0px; width:100%; height:350px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td style="width:220px;">&nbsp;<font color="#2D002D" style='font-family:Times New Roman;' size="4">
	  <b>Core Location Mapping : </td> 
	  <td class="td1" style="font-size:11px; width:250px;">			   
	   <select style="font-size:12px;width:200px;height:21px;background-color:#DDFFBB;display:block;" name="Dept" id="Dept" onChange="SelectMonthDept(this.value)"><?php $sDept=mysql_query("select * from core_departments where is_active=1 order by department_name ASC", $con); while($rDept=mysql_fetch_array($sDept)){?><option value="<?=$rDept['id']?>" <?php if($_REQUEST['d']==$rDept['id']){echo 'selected';}?>><?php echo '&nbsp;'.$rDept['department_name'];?></option><?php } ?><option value="All" <?php if($_REQUEST['d']=='All'){echo 'selected';}?>>&nbsp;All</option></select>
     &nbsp;&nbsp;
	   <input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /> 
	   <input type="hidden" name="YearId" id="YearId" value="<?php echo $YearId; ?>" />
	   <input type="hidden" name="Sn" id="Sn" value="" />
	  </td>	 
	  <td><a href="#" onClick="ExportData()" style="font-size:12px;"><b>Export Excel - All</b></a></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true) { ?>	
 <tr>
  <td valign="top" style="width:100%;">
   <table border="1" valign="top" style="width:100%;" cellspacing="0">
   <tr bgcolor="#7a6189" style="height:24px;">
	  <td colspan="4" class="th">General Details</td>
    <td colspan="3" class="th"><b>Old Lodging</b></td>
    <td colspan="3" class="th"><b>New Lodging</b></td>
    <td colspan="2" class="th"><b>Mobile Rem.</b></td>
    <td colspan="2" class="th"><b>Vehicle Policy</b></td>
    <td rowspan="2" class="th" style="width:60px;"><b>Status</b></td>
    <td rowspan="2" class="th" style="width:50px;"><b>Action</b></td>
   </tr>
   <tr bgcolor="#7a6189" style="height:24px;">
	  <td class="th" style="width:30px;"><b>SN</b></td>
    <td class="th" style="width:40px;">EC</b></td>
	  <td class="th" style="width:200px;"><b>Name</b></td>
    <td class="th" style="width:50px;"><b>Grade</b></td>
    <td class="th" style="width:60px;"><b>A</b></td>
    <td class="th" style="width:60px;"><b>B</b></td>
    <td class="th" style="width:60px;"><b>C</b></td>
    <td class="th" style="width:60px;"><b>A</b></td>
    <td class="th" style="width:60px;"><b>B</b></td>
    <td class="th" style="width:60px;"><b>C</b></td>
    <td class="th" style="width:100px;"><b>Old</b></td>
    <td class="th" style="width:100px;"><b>New (Paid from salary)</b></td>
    <td class="th" style="width:150px;"><b>Old</b></td>
    <td class="th" style="width:150px;"><b>New</b></td>
   </tr>
<?php 

if($_REQUEST['d']!='All'){ $subQ="g.DepartmentId=".$_REQUEST['d']; }
else{ $subQ="1=1"; }


 $sql = mysql_query("SELECT e.EmployeeID, EmpCode, concat(Fname, ' ', Sname, ' ', Lname) as Name, Gender, Married, g.DepartmentId, department_name, g.DesigId, designation_name, g.GradeId, grade_name, ep.PolicyName as PolicyOld, epN.PolicyName as PolicyNew, Lodging_CategoryA, Lodging_CategoryB, Lodging_CategoryC, Up_Lodging_CategoryA, Up_Lodging_CategoryB, Up_Lodging_CategoryC, Mobile_Exp_Rem_Rs, Prd, Up_Mobile_Exp_Rem_Rs, Up_Prd, Status_Approved,
 CASE 
 WHEN DR = 'Y' THEN 'Dr.'
 WHEN Gender = 'M' THEN 'Mr.'
 WHEN Gender = 'F' AND Married = 'Y' THEN 'Mrs.'
 WHEN Gender = 'F' AND Married = 'N' THEN 'Miss.'
 ELSE '' 
 END as Greeting FROM hrm_employee_general g 
 left join hrm_employee e ON g.EmployeeID=e.EmployeeID 
 left join hrm_employee_personal p on g.EmployeeID=p.EmployeeID
 left join core_departments d on g.DepartmentId=d.id
 left join core_designation de on g.DesigId=de.id
 left join core_grades gr on g.GradeId=gr.id 
 left join hrm_employee_eligibility_update el on g.EmployeeID=el.EmployeeID
 left join hrm_master_eligibility_policy ep on el.VehiclePolicy=ep.PolicyId
 left join hrm_master_eligibility_policy epN on el.Up_VehiclePolicy=epN.PolicyId
 WHERE e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND ".$subQ." order by e.ECode ASC", $con);
 $no=1; 
 while($res = mysql_fetch_assoc($sql))
 { 
  $EC = str_pad($res['EmpCode'], 4, '0', STR_PAD_LEFT);
  $C=$CompanyId; $YI=$YearId; $U=$UserId;	  
  $hq=0; $rg=0; $zn=0; $bu=0;

?> 	
 <input type="hidden" name="EmpId_<?php echo $Sno; ?>" value="<?php echo $res['EmployeeID']; ?>" />
 <tr bgcolor="<?php if($no%2){ echo '#FFFFFF'; } else {echo '#FFFFFF';} //#D9D1E7 ?>" style="height:22px;"> 
  <td class="tdc"><?=$no?></td>
	<td class="tdc"><?=$res['EmpCode']?></td>
	<td class="tdl"><?=$res['Name']?></td>
  <td class="tdc"><?=$res['grade_name']?></td>
  <td class="tdc"><?=$res['Lodging_CategoryA']?></td>
  <td class="tdc"><?=$res['Lodging_CategoryB']?></td>
  <td class="tdc"><?=$res['Lodging_CategoryC']?></td>
  <td class="tdc" style="background-color:#D7FFAE;"><?=$res['Up_Lodging_CategoryA']?></td>
  <td class="tdc" style="background-color:#D7FFAE;"><?=$res['Up_Lodging_CategoryB']?></td>
  <td class="tdc" style="background-color:#D7FFAE;"><?=$res['Up_Lodging_CategoryC']?></td>
  <td class="tdl"><input type="text" style="width:99%;border:hidden;font-family:Times New Roman;" value="<?php if($res['Mobile_Exp_Rem_Rs']!=''){echo $res['Mobile_Exp_Rem_Rs'].'/'.$res['Prd']; } ?>" /></td>
  <td class="tdl" style="background-color:#D7FFAE;"><input type="text" style="width:99%;border:hidden;font-family:Times New Roman;background-color:#D7FFAE;" value="<?php if($res['Mobile_Exp_Rem_Rs']!=''){echo $res['Up_Mobile_Exp_Rem_Rs'].' /'.$res['Up_Prd']; }?>"/></td>
  <td class="tdl"><?=$res['PolicyOld']?></td>
  <td class="tdl" style="background-color:#D7FFAE;"><?=$res['PolicyNew']?></td>
  <td class="tdc" style="color:<?php if($rowss>0){echo '#009300';}?>">
    <span id="ffont<?=$no?>">
      <?php if($res['Status_Approved']=='Y'){echo 'Approved';}else{echo '';} ?>
    </span>
  </td> 
	<td class="tdc">
   <span style="cursor:pointer;"><img src="images/save.gif" onclick="FunSave(<?=$no.','.$res['EmployeeID'].','.$UserId?>)"/></span>
	</td>
	
 </tr>
 
 <?php $no++; } $sn=$no-1; echo '<input type="hidden" name="RowNo" id="RowNo" value="'.$sn.'" />'; ?>


   </table>
  </td>
 </tr>
 
<?php } ?> 
</table>
</form>	
	
<?php //*********************************************************************************************/ ?>
<?php //*************************END*****END*****END******END******END***************************/ ?>
<?php //**********************************************************************************************/ ?>
		
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