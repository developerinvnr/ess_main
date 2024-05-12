<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//**********************************
$sql = mysql_query("SELECT EmpCode FROM hrm_employee where CompanyId=".$CompanyId, $con); $resRow = mysql_num_rows($sql); 
  if($resRow==0) 
    { $NextEmpCode=$CompanyId.'1';}
    else 
	  { $sql2 = mysql_query("SELECT MAX(EmpCode) as EmpCode FROM hrm_employee where CompanyId=".$CompanyId." AND EmpCode!=1001 AND EmpCode!=1002 AND EmpCode!=1003 AND EmpCode!=11001", $con); $res2 = mysql_fetch_assoc($sql2);
	    $NextEmpCode = $res2['EmpCode']+1; }
//**********************************



?> 
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/EmpMasterAddNewAjaxCall.js"></script>
<Script type="text/javascript">window.history.forward(1);</script>
<script language="javascript">
function RefreshGen()
{ document.getElementById("EmpPass").value = ''; document.getElementById("Fname").value = ''; document.getElementById("Sname").value = ''; document.getElementById("Lname").value = ''; document.getElementById("DOJ").value = ''; document.getElementById("DOC").value = ''; document.getElementById("DOB").value = ''; document.getElementById("Age").value = '';  document.getElementById("FileNo").value = ''; document.getElementById("OffiMobileNo").value = ''; document.getElementById("OffiEmialId").value = ''; document.getElementById("EmpStatus").value = 'A'; document.getElementById("DeptName").value = 0; document.getElementById("DesigName").value = 0;  document.getElementById("CostCenter").value = 0; document.getElementById("GradeName").value = ''; document.getElementById("HQName").value = 0; }

function GetAge() 
{    
var date1 = new Date(); var  dob= document.getElementById("DOB").value; var date2=new Date(dob);
var pattern = /^\d{1,2}\-\d{1,2}\-\d{4}$/; //Regex to validate date format (dd/mm/yyyy)
if (pattern.test(dob)) { var y1 = date1.getFullYear(); //getting current year
                         var y2 = date2.getFullYear(); //getting dob year
		                 var age = y1 - y2;           //calculating age 
         document.getElementById("Age").value=age; 	return true;
	                   } //else {	alert("Invalid date format. Please Input in (dd/mm/yyyy) format!");	return false; } 
}
	                             
		    		 //Auto Generate Password Open
var keylist="ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789"; var temp='';
function generatepass(plength){  temp=''
for (i=0;i<plength;i++)  temp+=keylist.charAt(Math.floor(Math.random()*keylist.length)); return temp;  }
function PWD(enterlength){ document.formEgeneral.EmpPass.value=generatepass(enterlength); } 
                                
									
function SubmitEmpRecord() 
{  
  var FName = formEgeneral.Fname.value;  var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(FName);
  if (FName.length === 0) { alert("You must enter a First Name.");  return false; }
  if(test_bool==false) { alert('Please Enter Only Alphabets in the First Name Field');  return false; } 
  
  var SName = formEgeneral.Sname.value;  
  if(SName!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool2 = filter.test(SName);
  if(test_bool2==false) { alert('Please Enter Only Alphabets in the Middle Name Field');  return false; } }
  //else if (SName.length === 0) { alert("You must enter a Middle Name.");  return false; }
  
  var LName = formEgeneral.Lname.value;  var filter=/^[a-zA-Z. /]+$/; var test_bool3 = filter.test(LName);
  if (LName.length === 0) { alert("You must enter a last Name.");  return false; }
  if(test_bool3==false) { alert('Please Enter Only Alphabets in the last name Field');  return false; } 
    
  var FileNo = formEgeneral.FileNo.value; 
  if (FileNo!='')  { var Numfilter=/^[0-9 ]+$/;  var test_num = Numfilter.test(FileNo)
  if(test_num==false) { alert('Please Enter Only Number in the file number Field'); return false; }}
  
  var DOJ = formEgeneral.DOJ.value;  
  if (DOJ.length === 0) { alert("You must enter a date of joining.");  return false; }
  
  var DOB = formEgeneral.DOB.value;  
  if (DOB.length === 0) { alert("You must enter a date of birth.");  return false; }
  
  var DMY=DOJ.split('-');     //splits the date string by '-' and stores in a array.
  var DMY2=DOB.split('-');
  var day=DMY[0];  var month=DMY[1];  var year=DMY[2];
  var day1=DMY2[0];  var month1=DMY2[1];  var year1=DMY2[2];
  var dateTemp1=month+'/'+day+'/'+year;  
  var dateTemp2=month1+'/'+day1+'/'+year1;
  var date1 = new Date(dateTemp1);//mm/dd/yy 
  var date2 = new Date(dateTemp2); //mm/dd/yy
  var Timed1=date1.getTime(); var Timed2=date2.getTime();
  if(Timed2>Timed1){alert('Error : Please check date of birth!'); return false;}	
  
  var DeptName = formEgeneral.DeptName.value;  
  if (DeptName==0) { alert("Please select Department name.");  return false; }
  
  var DesigName = formEgeneral.DesigName.value;  
  if (DesigName==0) { alert("Please select Designation name.");  return false; }
  
  var CostCenter = formEgeneral.CostCenter.value;  
  if (CostCenter==0) { alert("Please select Cost Center name.");  return false; }
  
  var HQName = formEgeneral.HQName.value;  
  if (HQName==0) { alert("Please select Head Quater name.");  return false; }
  
  var OffiMobileNo = formEgeneral.OffiMobileNo.value; 
  //if (OffiMobileNo!='')  { var Numfilter=/^[0-9 ]+$/;  var test_num2 = Numfilter.test(OffiMobileNo)
  //if(test_num2==false) { alert('Please Enter Only Number in the Office mobile number Field'); return false; }	
  //if (OffiMobileNo.length<10 || OffiMobileNo.length>10)  { alert("Please enter a right formate of office mobile number");  return false; } }	
  
  var OffiEmialId = formEgeneral.OffiEmialId.value;
  var EmailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  var EmailCheck = EmailPattern.test(OffiEmialId);
  if (OffiEmialId.length!='')   { if(!(EmailCheck)) { alert("You haven't entered in an valid office email address!");   return false; } }	
   
  
  var EmpCode = formEgeneral.EmpCode.value; 
  var agree=confirm("Are you sure you want to Add this Employee record? where EmpCode="+EmpCode+", Name="+FName+" "+SName+" "+LName);
  if (agree) { var ComId=document.getElementById("CompanyId").value;  var EmpStatus=document.getElementById("EmpStatus").value; 
               var EmpPass=document.getElementById("EmpPass").value;  var DOC=document.getElementById("DOC").value; 
			   var GradeName=document.getElementById("GradeName").value; var UserId=document.getElementById("UserId").value;
			   var YearId=document.getElementById("YearId").value;
			   var x = "AddEmpAction.php?action=Submit&ComId="+ComId+"&UserId="+UserId+"&YearId="+YearId+"&EmpCode="+EmpCode+"&EmpStatus="+EmpStatus+"&EmpPass="+EmpPass+"&FName="+FName+"&SName="+SName+"&LName="+LName+"&FileNo="+FileNo+"&DOJ="+DOJ+"&DOC="+DOC+"&DOB="+DOB+"&DeptName="+DeptName+"&GradeName="+GradeName+"&DesigName="+DesigName+"&CostCenter="+CostCenter+"&HQName="+HQName+"&OffiMobileNo="+OffiMobileNo+"&OffiEmialId="+OffiEmialId;  window.location=x;
			 }
  else { return false; }			 
}
</script>
</head>
<body class="body">
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){require_once("AMenu.php"); } ?></td></tr></table></td></tr>
<tr><td valign="top">
      <table width="100%" style="margin-top:0px;" border="0">
	    <tr><td valign="top"><?php if($_SESSION['login'] = true){require_once("AWelcome.php"); } ?></td></tr>
	    <tr>
		  <td>
<table>
 <tr><td width="50">&nbsp;</td>
	 <td style="width:250px; font-family:Times New Roman; font-size:16px; color:#287126; font-weight:bold;"><span id="msgspan"><?php echo $msg; ?></span></b></td>
 </tr>
</table>
		</td>
	   </tr>
	   <tr>
	      <td valign="top" align="center"  width="100%" id="MainWindow">
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td width="50" bgcolor="">&nbsp;</td>
  <td>
   <table border="0">
    <tr>
	  <td width="200" class="heading"><i>Add New Employee</i></td>
	  <td width="370">&nbsp;</td>
	  <td style="font-family:Times New Roman; font-size:16px; color:#287126; font-weight:bold;"><font color="#FF0000" size="4">*</font>  - Require Field</td>
	</tr>
	<tr><td colspan="3" style="color:#FF0000;font-size:14px;"><b><?php if($_REQUEST['action']=='false'){echo 'This employee code allready exist..';} ?></b> </td></tr>
   </table>
  </td>
  </tr>
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>	
 <tr>
<td width="100">&nbsp;</td>
<td align="left" id="Egeneral"  valign="top" style="display:block;">             
<form  name="formEgeneral" method="post" onSubmit="return validate(this)">
<table border="0">
<tr> 
<td align="left"  valign="top">
<span id="EditTEmp"></span>
<table border="0" width="800" id="TEmp" style="display:block;">
<tr>
  <td class="All_100">EmpCode&nbsp;<font color="#FF0000">*</font> :</td><td class="All_125"><input name="EmpCode" id="EmpCode" class="All_80" value="<?php echo $NextEmpCode; ?>">
  <input type="hidden" name="CompanyId" id="CompanyId" value="<?php echo $CompanyId; ?>">
  <input type="hidden" name="UserId" id="UserId" value="<?php echo $UserId; ?>">
  <input type="hidden" name="YearId" id="YearId" value="<?php echo $YearId; ?>">
  
  </td>
  <td class="All_100">Status&nbsp;<font color="#FF0000">*</font> :</td><td class="All_125"><select name="EmpStatus" id="EmpStatus" class="All_80">
                                                     <option value="D">&nbsp;Deactive</option><option value="A" selected>&nbsp;Active</option></select></td>
  <td class="All_100">Password&nbsp;<font color="#FF0000">*</font> :</td><td class="All_125"><input type="text" name="EmpPass" id="EmpPass" maxlength="20" class="All_120" readonly>
                                                         <input type="hidden" name="thelength" size=3 value="6"></td>
</tr>
<tr>
  <td class="All_100">First Name&nbsp;<font color="#FF0000">*</font> :</td><td class="All_125"><input style="text-transform:uppercase;" name="Fname" id="Fname" value="<?php echo $ResEmp['Fname']; ?>" onBlur="PWD(this.form.thelength.value);" class="All_120" maxlength="20"></td>
  <td class="All_100">Middle Name :</td><td class="All_140"><input style="text-transform:uppercase;" name="Sname" id="Sname" maxlength="20" value="<?php echo $ResEmp['Sname']; ?>" class="All_120"></td>
  <td class="All_100">Last Name&nbsp;<font color="#FF0000">*</font> :</td><td class="All_125"><input style="text-transform:uppercase;" name="Lname" id="Lname" maxlength="20" value="<?php echo $ResEmp['Lname']; ?>" class="All_120"></td>
</tr>
<tr>
  <td class="All_100">FileNo :</td><td class="All_125"><input name="FileNo" id="FileNo" class="All_120" maxlength="5"></td>
  <td class="All_100">Joining&nbsp;<font color="#FF0000">*</font> :</td><td class="All_125"><input readonly name="DOJ" id="DOJ" class="All_100"><button id="f_btn1" class="CalenderButton"></button></td>
  <td class="All_100">Confirmation :</td><td class="All_125"><input name="DOC" id="DOC" readonly class="All_100"><button id="f_btn2" class="CalenderButton"></button>
  <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
  cal.manageFields("f_btn2", "DOC", "%d-%m-%Y");  cal.manageFields("f_btn1", "DOJ", "%d-%m-%Y");</script></td>
</tr>
<tr>
  <td class="All_100" valign="top">Date Of Birth&nbsp;<font color="#FF0000">*</font> :</td><td class="All_125"><input name="DOB" readonly id="DOB" class="All_100"><button id="f_btn3" class="CalenderButton"></button>
  <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
  cal.manageFields("f_btn3", "DOB", "%d-%m-%Y");</script></td>
  <td class="All_100" valign="top">Department&nbsp;<font color="#FF0000">*</font> :</td><td class="All_125"><select class="All_120" name="DeptName" id="DeptName" onChange="DeptSelect(this.value);GetAge();">
  <option style="background-color:#DBD3E2;" value="0">&nbsp;Select</option>
 <?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?>
  <option value="<?php echo $ResDept['DepartmentId']; ?>"><?php echo $ResDept['DepartmentCode'].'&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;'.$ResDept['DepartmentName']; ?></option><?php } ?></select></td>
  <td class="All_100">Designation&nbsp;<font color="#FF0000">*</font> :</td><td class="All_125"><span id="DesigSpan">
  <select class="All_120" name="DesigName" id="DesigName" disabled ><option value="0">Select</option></select></span></td>
</tr>
<tr>
  <td class="All_100" valign="top"><?php //Age : ?></td><td class="All_125" valign="top">
  <?php  //Avg.&nbsp;<input class="All_30" style="background-color:#D2F2E0;" name="Age" id="Age" /> year ?></td>
  <td class="All_100" valign="top">Grade&nbsp;<font color="#FF0000">*</font> :</td><td class="All_125"><select class="All_120" name="GradeName" id="GradeName">
<?php $sql = mysql_query("select * from hrm_grade where CompanyId=".$CompanyId." order by GradeId ASC", $con) or die(mysql_error()); while($res = mysql_fetch_array($sql)){ ?>
  <option value="<?php echo $res['GradeId']; ?>"><?php echo $res['GradeValue']; ?></option><?php } ?></select></td>  
  <td class="All_100" valign="top">Cost Center&nbsp;<font color="#FF0000">*</font> :</td><td class="All_125"><select class="All_120" name="CostCenter" id="CostCenter">
  <option style="background-color:#DBD3E2;" value="0">Select</option>
 <?php $SqlCC=mysql_query("select * from hrm_costcenter where CompanyId=".$CompanyId, $con); while($ResCC=mysql_fetch_array($SqlCC)) { 
       $SqlCC1=mysql_query("select * from hrm_state where StateId=".$ResCC['CostCenterName'], $con); $ResCC1=mysql_fetch_array($SqlCC1); ?>
	   <option value="<?php echo $ResCC1['StateId']; ?>"><?php echo $ResCC1['StateName']; ?></option><?php } ?></select></td>
</tr>
<tr>
  <td class="All_100" valign="top">Head Quater&nbsp;<font color="#FF0000">*</font> :</td><td class="All_125" valign="top"> <select class="All_120" name="HQName" id="HQName" onChange="HQSelect(this.value)">
  <option value="0">&nbsp;Select</option>
 <?php $SqlHQ=mysql_query("select * from hrm_headquater where CompanyId=".$CompanyId." order by HqName ASC", $con); while($ResHQ=mysql_fetch_array($SqlHQ)) { ?>
  <option value="<?php echo $ResHQ['HqId']; ?>"><?php echo $ResHQ['HqName']; ?></option><?php } ?></select></td>
  <td class="All_100" valign="top">Official Mob. No :</td><td class="All_125"><input class="All_120" name="OffiMobileNo" id="OffiMobileNo" maxlength="10"></td>
   <td class="All_100" valign="top">Offi. EmailId&nbsp; :</td><td class="All_125"><input name="OffiEmialId" id="OffiEmialId" class="All_120"></td>
</tr>
<tr>
  <td align="Right" class="fontButton" colspan="6"><table border="0" align="right" class="fontButton">
	<tr>	 
	  <td align="right" style="width:90px;">
		<input type="button" name="AddGeneralE" id="AddGeneralE" style="width:90px;" value="save" onClick="SubmitEmpRecord(this.form)"></td>
	  <td align="right" style="width:90px;"><input type="button" name="RefreshGenE" id="RefreshGenE" style="width:90px;" value="refresh" onClick="RefreshGen()"/></td>
	</tr></table>
  </td>
</tr>
</table>
</td>
</tr>
</table>
</form>     
</td>

 </tr>
<?php } ?> 
</table>
<?php //**********************************************END*****END*****END******END******END***************************************************************?>				
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

