<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//if($_SESSION['login'] = true){require_once('PhpFile/EmpMasterP.php'); } else {$msg= "Session Expiry..............."; }
if(isset($_POST['SubmitEmpKRA']))
{ $sqlApp=mysql_query("select EmpPmsId from hrm_employee_pms where AssessmentYear=".$_POST['Yid']." AND EmployeeID=".$_POST['Eid'], $con); 
  $resApp=mysql_fetch_array($sqlApp);
  if($sqlApp){ $sqlKra=mysql_query("select * from hrm_employee_pms_kraforma where EmpPmsId=".$resApp['EmpPmsId'], $con); $rows=mysql_num_rows($sqlKra); }
     if($rows>0)
	  { $sqlDel=mysql_query("delete from hrm_employee_pms_kraforma where EmpPmsId=".$resApp['EmpPmsId'], $con);
		if($sqlDel) { 
		             for($i=1; $i<=$_POST['Sno']; $i++)
		              {
		               $sqlIns=mysql_query("insert into hrm_employee_pms_kraforma(EmpPmsId,KRAId,Weightage,Target,KRAFormAStatus) values(".$resApp['EmpPmsId'].", '".$_POST['KraId_'.$i]."', ".$_POST['Weightage_'.$i].", ".$_POST['Target_'.$i].", '".$_POST['KRAFormAStatus_'.$i]."')", $con);
					 if($sqlIns){$msg="Employee KRA setting successfully!";}
					  }
				    } 
					
	  }	
	  
	 if($rows==0)
	  { for($i=1; $i<=$_POST['Sno']; $i++)
		              {
					  $sqlUp=mysql_query("update hrm_employee_pms set KRASetting='Y' where EmpPmsId=".$resApp['EmpPmsId'], $con); 
					  if($sqlUp) 
					   { 
					   $sqlIns=mysql_query("insert into hrm_employee_pms_kraforma(EmpPmsId,KRAId,Weightage,Target,KRAFormAStatus) values(".$resApp['EmpPmsId'].", '".$_POST['KraId_'.$i]."', ".$_POST['Weightage_'.$i].", ".$_POST['Target_'.$i].", '".$_POST['KRAFormAStatus_'.$i]."')", $con);	   
			           if($sqlIns){$msg="Employee KRA setting successfully!";}
					   }
					  } 
					  
	  }
	  
	  
} 
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;} .All{font-size:11px; height:18px;} .All_80{font-size:11px; height:18px; width:80px;}
 .All_50{font-size:11px; height:18px; width:50px;} .All_100{font-size:11px; height:18px; width:100px;} 
.All_120{font-size:11px; height:18px; width:120px;} .All_150{font-size:11px; height:18px; width:150px;}.All_200{font-size:11px; height:18px; width:200px;} 
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/EmpMasterAjaxCall.js"></script>
<Script type="text/javascript">window.history.forward(1);</script>
<Script type="text/javascript">
                                        // SelectDeptEmp
function SelectDeptEmp(value){
	document.getElementById("msg").style.display='none';
	document.getElementById("TDDeptEmpName").style.display='block'; document.getElementById("TDEmpWeight").style.display='none';
    var ComId = document.getElementById("ComId").value; var YearId = document.getElementById("YearId").value;
	var url = 'DeptEmpWeightageKRA.php';	var pars = 'DPid='+value+'&ComId='+ComId+'&YId='+YearId;	var myAjax = new Ajax.Request(
	url, {	method: 'post', parameters: pars, onComplete: show_NewDeptEmp });
} 
function show_NewDeptEmp(originalRequest)
{ document.getElementById('DeptEmpName').innerHTML = originalRequest.responseText; }


                                        // SelectDesigEmp
function SelectDesigEmp(value){
	document.getElementById("msg").style.display='none';
	document.getElementById("TDDeptEmpName").style.display='block'; document.getElementById("TDEmpWeight").style.display='none';
    var ComId = document.getElementById("ComId").value; var YearId = document.getElementById("YearId").value;
	var url = 'DeptEmpWeightageKRA.php';	var pars = 'DesigId2='+value+'&ComId2='+ComId+'&YId2='+YearId;	var myAjax = new Ajax.Request(
	url, {	method: 'post', parameters: pars, onComplete: show_NewDeptEmp });
} 
function show_NewDeptEmp(originalRequest)
{ document.getElementById('DeptEmpName').innerHTML = originalRequest.responseText; }


                                        // SelectDesig
function SelectDesig(value){ 
    document.getElementById("msg").style.display='none';
    document.getElementById("SelDesigText").style.display='block'; var ComId = document.getElementById("ComId").value; 
	var url = 'DesigEmpWeightageKRA.php';	var pars = 'DPid='+value+'&ComId='+ComId;	var myAjax = new Ajax.Request(
	url, {	method: 'post', parameters: pars, onComplete: show_NewDesigEmp	});
} 
function show_NewDesigEmp(originalRequest)
{ document.getElementById('DesigEmp').innerHTML = originalRequest.responseText; }


function SettingWeight(Eid,Yid){
	document.getElementById("msg").style.display='none'; document.getElementById("DeptEmpTD").style.display='none';
	document.getElementById("TDDeptEmpName").style.display='none'; document.getElementById("TDEmpWeight").style.display='block';
	var url = 'SettingEmpWeight.php';	var pars = 'Eid='+Eid+'&Yid='+Yid;	var myAjax = new Ajax.Request(
	url, {	method: 'post', parameters: pars, onComplete: show_SettingWeight });
} 
function show_SettingWeight(originalRequest)
{ document.getElementById('EmpWeight').innerHTML = originalRequest.responseText; }


function edit(value)
{ var agree=confirm("Are you sure you want to edit this employee record?"); 
  if (agree) {  var x = "EmpGeneral.php?ID="+value+"&Event=Edit";  window.location=x; }
}

function validateEdit(formEdit){
  var Sno=document.getElementById("Sno").value;
  for($i=1; $i<=Sno; $i++) 
  { 
  var Weigh="Weightage_"+$i; var Tar="Target_"+$i; var K="KRA_"+$i; var KD="KRA_Des_"+$i; var M="Measure_"+$i; var U="Unit_"+$i;
  var KRA = document.getElementById(K).value; var KRAD = document.getElementById(KD).value; 
  var Measure = document.getElementById(M).value; var Unit = document.getElementById(U).value;
  var Weightage = document.getElementById(Weigh).value; 
  if (KRA.length === 0) { alert("please enter KRA field.");  return false; }
  if (KRAD.length === 0) { alert("please enter KRA Description field.");  return false; }
  if (Measure.length === 0) { alert("please enter Measure field.");  return false; }
  if (Unit.length === 0) { alert("please enter Unit field.");  return false; }  
  var Numfilter=/^[0-9. ]+$/;  var test_num = Numfilter.test(Weightage)
  if (Weightage.length === 0) { alert("please enter Weightage field.");  return false; }
  if(test_num==false) { alert('Please Enter Only Number in the Weightage field');  return false; } 
  
  var Target = document.getElementById(Tar).value; var Numfilter=/^[0-9. ]+$/;  var test_num1 = Numfilter.test(Target)
  if (Target.length === 0) { alert("please enter Target field.");  return false; }
  if(test_num1==false) { alert('Please Enter Only Number in the Target field');  return false; } 
  }
}


 function ShowRow(j) 
  {
  var u = j+1;  var u1 = j-1; //var a = j+2; c=a-1; alert("a="+a+"j="+c);
  if(j<=11) {document.getElementById('minusImg_'+j).style.display = 'block'; document.getElementById('addImg_'+j).style.display = 'none';
   document.getElementById('Row_'+j).style.display = 'block'; document.getElementById('addImg_'+u).style.display = 'block';
   document.getElementById('minusImg_'+u1).style.display = 'none';} 
  else { document.getElementById('minusImg_'+j).style.display = 'block'; document.getElementById('addImg_'+j).style.display = 'none';
    document.getElementById('Row_'+j).style.display = 'block';  document.getElementById('minusImg_'+u1).style.display = 'none';  } 
  }
  function HideRow(j)
  { 
  var u = j+1;  var u1 = j-1; 
  if(j<=11)
  {document.getElementById('minusImg_'+j).style.display = 'none'; document.getElementById('addImg_'+j).style.display = 'block';
   document.getElementById('Row_'+j).style.display = 'none'; document.getElementById('addImg_'+u).style.display = 'none';
   document.getElementById('minusImg_'+u1).style.display = 'block'; }
  else { document.getElementById('minusImg_'+j).style.display = 'none'; document.getElementById('addImg_'+j).style.display = 'block';
    document.getElementById('Row_'+j).style.display = 'none';  document.getElementById('minusImg_'+u1).style.display = 'block'; }  
  } 





function ClickNew()
{ document.getElementById("AnyKraSet").style.display='block'; document.getElementById("SubmitEmpKRA").style.display='none';
  document.getElementById("ExtraEmpKRA").style.display='block';

}

function ClickBack()
{ document.getElementById("DeptEmpTD").style.display='block'; document.getElementById("TDDeptEmpName").style.display='block';
  document.getElementById("TDEmpWeight").style.display='none';
}		
		
</Script>     
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow">
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
	  
<table border="0" style="margin-top:0px; width:100%; height:400px;">
	<tr>
	    <td align="right" width="2%">&nbsp;</td>
		<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true) { ?>		
		<td align="center" width="60%" valign="top">
		   <table border="0" width="100%">
		     <tr>
             <td align="left" class="heading">Weightage For Employee KRA
             <font class="font4"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="msg"><?php echo $msg; ?></span></b></font></td></tr>
			 <tr><td>
				    <table border="0">
		            <tr>
					   <td style="width:180px;"></td>
	                   <td style="font-size:11px; width:130px;">Select Department :-</td>
                       <td class="td1" style="font-size:11px; width:150px;">
                       <select style="font-size:11px; width:150px; height:18px; background-color:#DDFFBB; display:block;" name="DepartmentE" id="DepartmentE" onChange="SelectDeptEmp(this.value);"><option value="" style="margin-left:0px; background-color:#84D9D5;" selected>Select Department</option><?php $SqlDepartment=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDepartment=mysql_fetch_array($SqlDepartment)) { ?><option value="<?php echo $ResDepartment['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDepartment['DepartmentCode'];?></option><?php } ?></select>
					   <input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
					   <input type="hidden" name="YearId" id="YearId" value="<?php echo $YearId; ?>" /> 
                      </td>
					  <td style="width:20px;"></td>
					  <td style="font-size:11px; width:130px; display:none;" id="SelDesigText">Select Designation :-</td>
                       <td class="td1" style="font-size:11px; width:150px;"><span id="DesigEmp"></span></td>
		           </tr>
                   </table>
				</td>
			 </tr>
			 <tr>
			   <td valign="top"> 
			    <table border="1" cellpadding="1" cellspacing="1" style="margin-top:0px; ">
				 <tr bgcolor="#7a6189">
				 <td >
				  <span id="DeptEmpTD">
				  <table border="0"><tr>
				    <td align="center" style="color:#FFFFFF;" class="All_50"><b>SNo.</b></td>
					<td align="center" style="color:#FFFFFF;" class="All_80"><b>EmpCode</b></td>
					<td align="center" style="color:#FFFFFF;" class="All_200"><b>Name</b></td>
					<td align="center" style="color:#FFFFFF;" class="All_150"><b>HeadQuater</b></td>
					<td align="center" style="color:#FFFFFF;" class="All_300"><b>Designation</b></td>
					<td align="center" style="color:#FFFFFF;" class="All_100"><b>KRA Status</b></td>
					<td align="center" style="color:#FFFFFF;" class="All_80"><b>Edit KRA</b></td>
				 </tr></table>
				 </span>
				 </td>	
				 </tr>
				 <?php //---------------------------------------Display Record----------------------------------------------------------------- ?>
				 <tr><td id="TDDeptEmpName"><span id="DeptEmpName"></span></td></tr>
                 <tr>
                 <td id="TDEmpWeight"><span id="EmpWeight"></span></td>
                 </tr>  
				 <tr><td bgcolor="#B6E9E2" colspan="6"></td></tr>
                 
			     <tr>
			    </table>
			   </td>
		   </table>  		
		</td>
		
        <?php } ?>
		<?php //-------------------------------------------------------------------------------------------------------- ?>
		
		<td align="left" width="20%">&nbsp;</td>
	</tr>
</table>
		
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************END*****END*****END******END******END***************************************************************?>
<?php //************************************************************************************************************************************************************?>
		
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