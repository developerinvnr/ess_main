<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//****************************************************************************************************************
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;} .All{font-size:11px; height:20px;} .All_80{font-size:11px; height:20px; width:80px;}
.All_40{font-size:11px; height:20px; width:40px;} .All_50{font-size:11px; height:20px; width:50px;} .All_70{font-size:11px; height:20px; width:70px;} .All_80{font-size:11px; height:20px; width:80px;}.All_100{font-size:11px; height:20px; width:100px;} .All_120{font-size:11px; height:20px; width:120px;} .All_140{font-size:11px; height:20px; width:140px;} .All_60{font-size:11px; height:20px; width:60px;}
.All_150{font-size:11px; height:20px; width:150px;}.All_170{font-size:11px; height:20px; width:170px;}.All_180{font-size:11px; height:20px; width:180px;}.All_190{font-size:11px; height:20px; width:190px;} .All_200{font-size:11px; height:20px; width:200px;} .All_450{font-size:11px; height:20px; width:450px;}.All_360{font-size:11px; height:20px; width:350px;}.All_540{font-size:11px; height:20px; width:540px;}.All_400{font-size:11px; height:20px; width:400px;} .All_600{font-size:11px; height:20px; width:600px;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<style>.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
<Script type="text/javascript">window.history.forward(1);</script>
<Script type="text/javascript" language="javascript">
function SelectDept(v){ window.location='ReportsGeneral.php?action=DeptGeneral&value='+v;}
function PrintDept(v)
{ var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value; var DeptValue=document.getElementById("DeptValue").value;
  var EC=document.getElementById("EC").value; var Name_E=document.getElementById("Name_E").value; var Dept=document.getElementById("Dept").value; var Desig=document.getElementById("Desig").value; var Grade=document.getElementById("Grade").value; var FN=document.getElementById("FN").value; var DOJ=document.getElementById("DOJ").value; var DOC=document.getElementById("DOC").value; var DOB=document.getElementById("DOB").value; var CC=document.getElementById("CC").value; var HQ=document.getElementById("HQ").value; var Mo_O=document.getElementById("Mo_O").value; var Em_O=document.getElementById("Em_O").value; var Pexp=document.getElementById("Pexp").value; var Vexp=document.getElementById("Vexp").value; var BN_1=document.getElementById("BN_1").value; var AC_1=document.getElementById("AC_1").value; var Branch_1=document.getElementById("Branch_1").value; var AAdd_1=document.getElementById("BAdd_1").value; var BN_2=document.getElementById("BN_2").value; var AC_2=document.getElementById("AC_2").value; var Branch_2=document.getElementById("Branch_2").value; var BAdd_2=document.getElementById("BAdd_2").value; var InsNo=document.getElementById("InsNo").value; var PFNo=document.getElementById("PFNo").value; var ESICNo=document.getElementById("ESICNo").value; var Rep_Name=document.getElementById("Rep_Name").value; var Rep_Desig=document.getElementById("Rep_Desig").value; var Rep_EmID=document.getElementById("Rep_EmID").value; var Rep_Cont=document.getElementById("Rep_Cont").value;
  
  window.open("PrintGeneralReport.php?action=DeptGeneral&value="+v+"&c="+ComId+"&y="+YId+"&value="+DeptValue+"&EC="+EC+"&Name_E="+Name_E+"&Dept="+Dept+"&Desig="+Desig+"&Grade="+Grade+"&FN="+FN+"&DOJ="+DOJ+"&DOC="+DOC+"&DOB="+DOB+"&CC="+CC+"&HQ="+HQ+"&Mo_O="+Mo_O+"&Em_O="+Em_O+"&Pexp="+Pexp+"&Vexp="+Vexp+"&BN_1="+BN_1+"&AC_1="+AC_1+"&Branch_1="+Branch_1+"&BAdd_1="+BAdd_1+"&BN_2="+BN_2+"&AC_2="+AC_2+"&Branch_2="+Branch_2+"&BAdd_2="+BAdd_2+"&InsNo="+InsNo+"&PFNo="+PFNo+"&ESICNo="+ESICNo+"&Rep_Name="+Rep_Name+"&Rep_Desig="+Rep_Desig+"&Rep_EmID="+Rep_EmID+"&Rep_Cont="+Rep_Cont,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=1250,height=650");}

function ExportGeneral(v)
{ var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value; var DeptValue=document.getElementById("DeptValue").value;  
  window.open("ReportCSVGeneral.php?action=GeneralExport&value="+v+"&C="+ComId+"&Y="+YId+"&value="+DeptValue,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}

</Script>  
<script type="text/javascript" language="javascript">
function EC(){if(document.getElementById("EC").checked==true){document.getElementById("EC").value=1;}else{document.getElementById("EC").value=0;}} 
function Name_E(){if(document.getElementById("Name_E").checked==true){document.getElementById("Name_E").value=1;}else{document.getElementById("Name_E").value=0;}}
function Dept(){if(document.getElementById("Dept").checked==true){document.getElementById("Dept").value=1;}else{document.getElementById("Dept").value=0;}}
function Desig(){if(document.getElementById("Desig").checked==true){document.getElementById("Desig").value=1;}else{document.getElementById("Desig").value=0;}}
function Grade(){if(document.getElementById("Grade").checked==true){document.getElementById("Grade").value=1;}else{document.getElementById("Grade").value=0;}}
function FN(){if(document.getElementById("FN").checked==true){document.getElementById("FN").value=1;}else{document.getElementById("FN").value=0;}}
function DOJ(){if(document.getElementById("DOJ").checked==true){document.getElementById("DOJ").value=1;}else{document.getElementById("DOJ").value=0;}}
function DOC(){if(document.getElementById("DOC").checked==true){document.getElementById("DOC").value=1;}else{document.getElementById("DOC").value=0;}}
function DOB(){if(document.getElementById("DOB").checked==true){document.getElementById("DOB").value=1;}else{document.getElementById("DOB").value=0;}}
function CC(){if(document.getElementById("CC").checked==true){document.getElementById("CC").value=1;}else{document.getElementById("CC").value=0;}}
function HQ(){if(document.getElementById("HQ").checked==true){document.getElementById("HQ").value=1;}else{document.getElementById("HQ").value=0;}}
function Mo_O(){if(document.getElementById("Mo_O").checked==true){document.getElementById("Mo_O").value=1;}else{document.getElementById("Mo_O").value=0;}}
function Em_O(){if(document.getElementById("Em_O").checked==true){document.getElementById("Em_O").value=1;}else{document.getElementById("Em_O").value=0;}}
function Pexp(){if(document.getElementById("Pexp").checked==true){document.getElementById("Pexp").value=1;}else{document.getElementById("Pexp").value=0;}}
function Vexp(){if(document.getElementById("Vexp").checked==true){document.getElementById("Vexp").value=1;}else{document.getElementById("Vexp").value=0;}}
function BN_1(){if(document.getElementById("BN_1").checked==true){document.getElementById("BN_1").value=1;}else{document.getElementById("BN_1").value=0;}}
function AC_1(){if(document.getElementById("AC_1").checked==true){document.getElementById("AC_1").value=1;}else{document.getElementById("AC_1").value=0;}}
function Branch_1(){if(document.getElementById("Branch_1").checked==true){document.getElementById("Branch_1").value=1;}else{document.getElementById("Branch_1").value=0;}}
function BAdd_1(){if(document.getElementById("BAdd_1").checked==true){document.getElementById("BAdd_1").value=1;}else{document.getElementById("BAdd_1").value=0;}}
function BN_2(){if(document.getElementById("BN_2").checked==true){document.getElementById("BN_2").value=1;}else{document.getElementById("BN_2").value=0;}}
function AC_2(){if(document.getElementById("AC_2").checked==true){document.getElementById("AC_2").value=1;}else{document.getElementById("AC_2").value=0;}}
function Branch_2(){if(document.getElementById("Branch_2").checked==true){document.getElementById("Branch_2").value=1;}else{document.getElementById("Branch_2").value=0;}}
function BAdd_2(){if(document.getElementById("BAdd_2").checked==true){document.getElementById("BAdd_2").value=1;}else{document.getElementById("BAdd_2").value=0;}}
function InsNo(){if(document.getElementById("InsNo").checked==true){document.getElementById("InsNo").value=1;}else{document.getElementById("InsNo").value=0;}}
function PFNo(){if(document.getElementById("PFNo").checked==true){document.getElementById("PFNo").value=1;}else{document.getElementById("PFNo").value=0;}}
function ESICNo(){if(document.getElementById("ESICNo").checked==true){document.getElementById("ESICNo").value=1;}else{document.getElementById("ESICNo").value=0;}}
function Rep_Name(){if(document.getElementById("Rep_Name").checked==true){document.getElementById("Rep_Name").value=1;}else{document.getElementById("Rep_Name").value=0;}}
function Rep_Desig(){if(document.getElementById("Rep_Desig").checked==true){document.getElementById("Rep_Desig").value=1;}else{document.getElementById("Rep_Desig").value=0;}}
function Rep_EmID(){if(document.getElementById("Rep_EmID").checked==true){document.getElementById("Rep_EmID").value=1;}else{document.getElementById("Rep_EmID").value=0;}}
function Rep_Cont(){if(document.getElementById("Rep_Cont").checked==true){document.getElementById("Rep_Cont").value=1;}else{document.getElementById("Rep_Cont").value=0;}}
</script>
</head>
<body class="body">
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" name="YId" id="YId" value="<?php echo $YearId; ?>" />
<input type="hidden" name="UserId" id="UserId" value="<?php echo $UserId; ?>" />
<input type="hidden" name="DeptValue" id="DeptValue" value="<?php echo $_REQUEST['value']; ?>" />
<table class="table" border="0">
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
	  <td valign="top" align="center" width="100%" id="MainWindow">
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
<table border="0" style="margin-top:0px; width:95%; height:400px;">
	<tr>
		<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>
		<td align="" width="100%" valign="top">
		   <table border="0">
			 <tr><td>
			       <table>
				     <tr>
<?php  if($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') { ?>
				   <td>
				    <table border="0">						
                    <tr>
				<td class="td1" style="width:500px; height:20px; font-size:15px; font-family:Times New Roman; color:#00274F; font-weight:bold;" align="">Department :
					 &nbsp;&nbsp;
                       <select style="font-size:11px; width:148px; height:18px; background-color:#DDFFBB;" name="Dept" id="Dept" onChange="SelectDept(this.value)">                       <option value="" style="margin-left:0px;" selected>Select Department</option>
<?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DepartmentCode!='MANAGEMENT' order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?>
                       <option value="<?php echo $ResDept['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDept['DepartmentCode'];?></option><?php } ?>
					   <option value="All">&nbsp;All</option></select>
					   &nbsp;&nbsp;(Reports General)
					   </td>
					   
					   <td class="tdl" style="background-color:#FFFF6C;text-align:center;width:200px;font-size:12px;">Apply for Resignation</td>
					   
                     </tr>
				   </table>					
				   </td> 
<?php } ?>
		           </tr>
                  </table>
				</td>
			 </tr>
<?php //---------------------------------------Display Record----------------------------------------------------------------- ?>



<?php if($_REQUEST['action']=='DeptGeneral') { ?>
<tr>
 <td>
   <table border="1" width="3400" cellspacing="1">
     <tr bgcolor="#FFFFFF">
		<td colspan="50" align="" style=" font-family:Times New Roman; font-size:14px;">
<b>EC&nbsp;<input type="checkbox" id="EC" value="1" checked onClick="EC()"/>&nbsp;&nbsp;&nbsp;Name&nbsp;<input type="checkbox" id="Name_E" value="1" checked onClick="Name_E()"/>&nbsp;&nbsp;&nbsp;Department&nbsp;<input type="checkbox" id="Dept" value="1" checked onClick="Dept()"/>&nbsp;&nbsp;&nbsp;Designation&nbsp;<input type="checkbox" id="Desig" value="1" checked onClick="Desig()"/>&nbsp;&nbsp;&nbsp;Grade&nbsp;<input type="checkbox" id="Grade" value="1" checked onClick="Grade()"/>&nbsp;&nbsp;&nbsp;FileNo&nbsp;<input type="checkbox" id="FN" value="0" onClick="FN()"/>&nbsp;&nbsp;&nbsp;DOJ&nbsp;<input type="checkbox" id="DOJ" value="1" checked onClick="DOJ()"/>&nbsp;&nbsp;&nbsp;DOC&nbsp;<input type="checkbox" id="DOC" value="0" onClick="DOC()"/>&nbsp;&nbsp;&nbsp;DOB&nbsp;<input type="checkbox" id="DOB" value="1" checked onClick="DOB()"/>&nbsp;&nbsp;&nbsp;CostCenter&nbsp;<input type="checkbox" id="CC" value="1" checked onClick="CC()"/>&nbsp;&nbsp;&nbsp;HQ&nbsp;<input type="checkbox" id="HQ" value="1" checked onClick="HQ()"/>&nbsp;&nbsp;&nbsp;Mobile&nbsp;<input type="checkbox" id="Mo_O" value="1" checked onClick="Mo_O()"/>&nbsp;&nbsp;&nbsp;Email-ID&nbsp;<input type="checkbox" id="Em_O" value="1" checked onClick="Em_O()"/>&nbsp;&nbsp;&nbsp;Pre Exp&nbsp;<input type="checkbox" id="Pexp" value="0" onClick="Pexp()"/>&nbsp;&nbsp;&nbsp;VNR Exp&nbsp;<input type="checkbox" id="Vexp" value="0" onClick="Vexp()"/>&nbsp;&nbsp;&nbsp;Bank1 Name&nbsp;<input type="checkbox" id="BN_1" value="1" checked onClick="BN_1()"/>&nbsp;&nbsp;&nbsp;A/C No&nbsp;<input type="checkbox" id="AC_1" value="1" checked onClick="AC_1()"/>&nbsp;&nbsp;&nbsp;Branch&nbsp;<input type="checkbox" id="Branch_1" value="0" onClick="Branch_1()"/>&nbsp;&nbsp;&nbsp;Address&nbsp;<input type="checkbox" id="BAdd_1" value="0" onClick="BAdd_1()"/>&nbsp;&nbsp;&nbsp;Bank2 Name&nbsp;<input type="checkbox" id="BN_2" value="0" onClick="BN_2()"/>&nbsp;&nbsp;&nbsp;A/C No&nbsp;<input type="checkbox" id="AC_2" value="0" onClick="AC_2()"/>&nbsp;&nbsp;&nbsp;Branch&nbsp;<input type="checkbox" id="Branch_2" value="0" onClick="Branch_2()"/>&nbsp;&nbsp;&nbsp;Address&nbsp;<input type="checkbox" id="BAdd_2" value="0" onClick="BAdd_2()"/>&nbsp;&nbsp;&nbsp;Insu. No&nbsp;<input type="checkbox" id="InsNo" value="1" checked onClick="InsNo()"/>&nbsp;&nbsp;&nbsp;PF No&nbsp;<input type="checkbox" id="PFNo" value="1" checked onClick="PFNo()"/>&nbsp;&nbsp;&nbsp;ESIC No&nbsp;<input type="checkbox" id="ESICNo" value="0" onClick="ESICNo()"/>&nbsp;&nbsp;&nbsp;Name&nbsp;<input type="checkbox" id="Rep_Name" value="0" onClick="Rep_Name()"/>&nbsp;&nbsp;&nbsp;	Designation&nbsp;<input type="checkbox" id="Rep_Desig" value="0" onClick="Rep_Desig()"/>&nbsp;&nbsp;&nbsp;EmailID&nbsp;<input type="checkbox" id="Rep_EmID" value="0" onClick="Rep_EmID()"/>&nbsp;&nbsp;&nbsp;Contact&nbsp;<input type="checkbox" id="Rep_Cont" value="0" onClick="Rep_Cont()"/></b>     </td>					 
	 </tr>
     <tr>
<?php if($_REQUEST['value']!='All') { $sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); } ?>	
	  <td colspan="50" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Georgia; font-weight:bold;">&nbsp;Employee General Details :
	  &nbsp;&nbsp;(&nbsp;Department - <?php if($_REQUEST['value']!='All') {echo $resA['DepartmentName']; } else {echo 'All';} ?>&nbsp;)&nbsp;&nbsp;&nbsp;
	  <a href="#" onClick="PrintDept('<?php echo $_REQUEST['value']; ?>')" style="color:#F9F900; font-size:12px;"><!--Print--></a>
          &nbsp;&nbsp;<a href="#" onClick="ExportGeneral('<?php echo $_REQUEST['value']; ?>')" style="color:#F9F900; font-size:12px;">Export Excel</a>
	  </td>
	 </tr>
	 <tr>
	   <td bgcolor="#7a6189" colspan="22" align="center" style="color:#FFFFFF;font-size:12px;"><b>General</b></td>
	   <td bgcolor="#7a6189" colspan="5" align="center" style="color:#FFFFFF;font-size:12px;"><b>Bank_1</b></td>
	   <td bgcolor="#7a6189" colspan="5" align="center" style="color:#FFFFFF;font-size:12px;"><b>Bank_2</b></td>
	   <td bgcolor="#7a6189" colspan="4" align="center" style="color:#FFFFFF;font-size:12px;"><b>Legal</b></td>
	   <td bgcolor="#7a6189" colspan="4" align="center" style="color:#FFFFFF;font-size:12px;"><b>Reporting</b></td>
	 </tr>
 <tr bgcolor="#7a6189">
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>SNo.</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_70"><b>EC</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_200"><b>Name</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_80"><b>Department</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Desig Code</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_200"><b>Designation Name</b></td>

	<td align="center" style="color:#FFFFFF;" class="All_40"><b>Grade</b></td>	
	
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Bonus Category</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_100"><b>Vertical</b></td>
	
	<td align="center" style="color:#FFFFFF;" class="All_60"><b>FileNo</b></td>	
	<td align="center" style="color:#FFFFFF;" class="All_70"><b>DOJ</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_70"><b>DOC</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_70"><b>DOB</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_70"><b>Age</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_100"><b>CostCenter</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_100"><b>HQ</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Mobile</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Email-ID</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>VNR Exp</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Pre Exp</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Total Exp</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_200"><b>Qualification</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Name</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>A/C No</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_100"><b>IFSC</b></td>
	
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Branch</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Address</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Name</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>A/C No</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_100"><b>IFSC</b></td>
	
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Branch</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Address</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_120"><b>Insu. No</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_120"><b>PF No</b></td>
        <td align="center" style="color:#FFFFFF;" class="All_120"><b>PF UAN</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>ESIC No</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Name</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_120"><b>Designation</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>EmailID</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_100"><b>Contact</b></td>
</tr>

<?php if($_REQUEST['value']=='All') {$sql=mysql_query("select hrm_employee.*, hrm_employee_general.* from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' order by EmpCode ASC", $con); }
else {$sql=mysql_query("select hrm_employee.*, hrm_employee_general.* from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' order by EmpCode ASC", $con); } 
$Sno=1; while($res=mysql_fetch_array($sql)){ $Ename=$res['Fname'].' '.$res['Sname'].' '.$res['Lname']; 
$sqlDept=mysql_query("select DepartmentCode,DepartmentName from hrm_department where DepartmentId=".$res['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
$sqlDesig=mysql_query("select DesigCode,DesigName from hrm_designation where DesigId=".$res['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId'], $con); $resGrade=mysql_fetch_assoc($sqlGrade);
$sqlCC=mysql_query("select StateName from hrm_state where StateId=".$res['CostCenter'], $con); $resCC=mysql_fetch_assoc($sqlCC);
$sqlHQ=mysql_query("select HqName from hrm_headquater where HqId=".$res['HqId'], $con); $resHQ=mysql_fetch_assoc($sqlHQ);

$sqlch=mysql_query("select * from hrm_employee_separation where EmployeeID=".$res['EmployeeID']." AND Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C'", $con); $rowch=mysql_num_rows($sqlch);

?> 
     <tr style="background-color:<?php if($rowch>0){echo '#FFFF6C';}else{echo '#FFFFFF';} ?>;">
		<td align="center" style="" class="All_50" valign="top" style="background-color:<?php if($rowch>0){echo '#FFFF6C';}?>"><?php echo $Sno; ?></td>
		<td align="center" class="All_70" valign="top" style="background-color:<?php if($rowch>0){echo '#FFFF6C';}else{echo '#E8D2FB';}?>"><?php echo $res['EmpCode']; ?></td>
		<td align="" class="All_200" valign="top" style="background-color:<?php if($rowch>0){echo '#FFFF6C';}else{echo '#E8D2FB';}?>"><?php echo $Ename; ?></td>
        <td align="" style="" class="All_80" valign="top" style="background-color:<?php if($rowch>0){echo '#FFFF6C';}?>"><?php echo $resDept['DepartmentCode']; ?></td>
		<td align="" class="All_150" valign="top" style="background-color:<?php if($rowch>0){echo '#FFFF6C';}else{echo '#E8D2FB';}?>"><?php echo $resDesig['DesigCode']; ?></td>
		<td align="" class="All_200" valign="top" style="background-color:<?php if($rowch>0){echo '#FFFF6C';}else{echo '#E8D2FB';}?>"><?php echo $resDesig['DesigName']; ?></td>
		
		
		<td align="center" class="All_40" valign="top" style="background-color:<?php if($rowch>0){echo '#FFFF6C';}else{echo '#E8D2FB';}?>"><?php echo $resGrade['GradeValue']; ?></td>
		
		
		<?php if($res['BWageId']==0){ $sB=mysql_query("select BWageId from hrm_employee_general where EmployeeID=".$res['EmployeeID'],$con); $rB=mysql_fetch_assoc($sB);
	    $sqlCat=mysql_query("select Category from hrm_bonus_wages where BWageId=".$rB['BWageId'], $con); }else{ $sqlCat=mysql_query("select Category from hrm_bonus_wages where BWageId=".$res['BWageId'], $con); } $resCat=mysql_fetch_assoc($sqlCat); ?>
		<td align="" style="background-color:#E8D2FB;" class="All_200" valign="top"><?php echo strtoupper($resCat['Category']); ?></td>
		
		<?php $sqlVer=mysql_query("select VerticalName from hrm_department_vertical where VerticalId=".$res['EmpVertical'], $con); $resVer=mysql_fetch_assoc($sqlVer); ?>
		<td align="" style="background-color:#E8D2FB;" class="All_150" valign="top"><?php echo strtoupper($resVer['VerticalName']); ?></td>
		
		
		<td align="center" style="" class="All_60" valign="top"><?php echo $res['FileNo']; ?></td>	
		<td align="center" style="background-color:<?php if($rowch>0){echo '#FFFF6C';}else{echo 'A';}?>" class="All_70" valign="top"><?php if($res['RetiStatus']=='Y'){echo date("d-M-y", strtotime($res['RetiDate']));}else{ echo date("d-M-y", strtotime($res['DateJoining'])); } ?></td>
		<td align="center" style="background-color:<?php if($rowch>0){echo '#FFFF6C';}else{echo 'A';}?>" class="All_70" valign="top">
		<?php if($res['DateConfirmation']!='1970-01-01' AND $res['DateConfirmation']!='0000-00-00' AND $res['RetiStatus']=='N') { echo date("d-M-y", strtotime($res['DateConfirmation'])); }?></td>
		<td align="center" style="background-color:#FFDBCA;" class="All_70" valign="top"><?php echo date("d-M-y", strtotime($res['DOB'])); ?></td>
<?php //$timestamp_start = strtotime($res['DOB']);  
      //$timestamp_end = strtotime(date("Y-m-d")); 
	  //$difference = abs($timestamp_end - $timestamp_start); 
      //$days = floor($difference/(60*60*24)); $months = floor($difference/(60*60*24*30)); 
	  //$years2 = $difference/(60*60*24*365); 
	  //$Y2=$years2*12; $M22=$months-$Y2;
	  //$AgeMain=number_format($years2, 1);
	  
	  $dos=date("d-m-Y",strtotime($res['DOB']));
      $localtime = getdate();
      $today = $localtime['mday']."-".$localtime['mon']."-".$localtime['year'];
      $dob_a = explode("-", $dos);
      $today_a = explode("-", $today);
      $dob_d = $dob_a[0];$dob_m = $dob_a[1];$dob_y = $dob_a[2];
      $today_d = $today_a[0];$today_m = $today_a[1];$today_y = $today_a[2];
      $years = $today_y - $dob_y;
      $months = $today_m - $dob_m;
      if ($today_m.$today_d < $dob_m.$dob_d){ $years--; $months = 12 + $today_m - $dob_m; }
      if ($today_d < $dob_d){ $months--; }
      $firstMonths=array(1,3,5,7,8,10,12);
      $secondMonths=array(4,6,9,11);
      $thirdMonths=array(2);
      if($today_m - $dob_m == 1) 
      {
       if(in_array($dob_m, $firstMonths)){ array_push($firstMonths, 0); }
       elseif(in_array($dob_m, $secondMonths)){ array_push($secondMonths, 0); }
	   elseif(in_array($dob_m, $thirdMonths)){ array_push($thirdMonths, 0); }
      }
	  //$AgeMain=$years.'Y - '.$months.'M';
	  
	  $len2=strlen($months); //if($len2==1){$months='0'.$months;}else{$months=$months;}
if($months<10){ $mnt='0.0'.$months; } 
elseif($months>=10 && $months<12){ $mnt='0.'.$months; } 
//if($months<12){ $mnt='0.'.$months; }  
elseif($months>=12 AND $months<24){ $m1=$months-12; $l=strlen($m1);if($l==1){$mnt='1.0'.$m1;}else{$mnt='1.'.$m1;} }
elseif($months>=24 AND $months<36){$m1=$months-24; $l=strlen($m1);if($l==1){$mnt='2.0'.$m1;}else{$mnt='2.'.$m1;} }
elseif($months>=36 AND $months<48){$m1=$months-36; $l=strlen($m1);if($l==1){$mnt='3.0'.$m1;}else{$mnt='3.'.$m1;} }
elseif($months>=48 AND $months<60){$m1=$months-48; $l=strlen($m1);if($l==1){$mnt='4.0'.$m1;}else{$mnt='4.'.$m1;} }
elseif($months>=60 AND $months<72){$m1=$months-60; $l=strlen($m1);if($l==1){$mnt='5.0'.$m1;}else{$mnt='5.'.$m1;} }
elseif($months>=72 AND $months<84){$m1=$months-72; $l=strlen($m1);if($l==1){$mnt='6.0'.$m1;}else{$mnt='6.'.$m1;} }
elseif($months>=84 AND $months<96){$m1=$months-84; $l=strlen($m1);if($l==1){$mnt='7.0'.$m1;}else{$mnt='7.'.$m1;} }
elseif($months>=96 AND $months<108){$m1=$months-96; $l=strlen($m1);if($l==1){$mnt='8.0'.$m1;}else{$mnt='8.'.$m1;} }
$str_a = explode('.',$mnt);
$AgeMain=($years+$str_a[0]).'.'.$str_a[1];
	  
?>		
		<td align="center" style="background-color:<?php if($rowch>0){echo '#FFFF6C';}else{echo 'A';}?>" class="All_70" valign="top"><?php echo $AgeMain; ?></td>
		<td align="" style="" class="All_100" valign="top"><?php echo $resCC['StateName']; ?></td>
		<td align="" style="" class="All_100" valign="top"><?php echo $resHQ['HqName']; ?></td>
		<td align="" style="background-color:#C9FDB0;" class="All_80" valign="top"><?php echo $res['MobileNo_Vnr']; ?></td>
		<td align="" style="background-color:#C9FDB0;" class="All_150" valign="top"><?php echo $res['EmailId_Vnr']; ?></td>

<?php //$timestamp_start = strtotime($res['DateJoining']);  
      //$timestamp_end = strtotime(date("Y-m-d")); 
	  //$difference = abs($timestamp_end - $timestamp_start); 
	  //$days = floor($difference/(60*60*24)); $months = floor($difference/(60*60*24*30)); 
	  //$years = $difference/(60*60*24*365); /* $Y2=$years*12;  $M2=$months-$Y2; */ 
	  //$VNRExpMain=number_format($years, 1); $TotalExp=$VNRExpMain+$res['PreviousExpYear'];
	  
	  $dos=date("d-m-Y",strtotime($res['DateJoining']));
      $localtime = getdate();
      $today = $localtime['mday']."-".$localtime['mon']."-".$localtime['year'];
      $dob_a = explode("-", $dos);
      $today_a = explode("-", $today);
      $dob_d = $dob_a[0];$dob_m = $dob_a[1];$dob_y = $dob_a[2];
      $today_d = $today_a[0];$today_m = $today_a[1];$today_y = $today_a[2];
      $years = $today_y - $dob_y;
      $months = $today_m - $dob_m;
      if ($today_m.$today_d < $dob_m.$dob_d){ $years--; $months = 12 + $today_m - $dob_m; }
      if ($today_d < $dob_d){ $months--; }
      $firstMonths=array(1,3,5,7,8,10,12);
      $secondMonths=array(4,6,9,11);
      $thirdMonths=array(2);
      if($today_m - $dob_m == 1) 
      {
       if(in_array($dob_m, $firstMonths)){ array_push($firstMonths, 0); }
       elseif(in_array($dob_m, $secondMonths)){ array_push($secondMonths, 0); }
	   elseif(in_array($dob_m, $thirdMonths)){ array_push($thirdMonths, 0); }
      }
	  //$VNRExpMain=$years.'Y - '.$months.'M';
	  
	  $len2=strlen($months); //if($len2==1){$months='0'.$months;}else{$months=$months;}
if($months<10){ $mnt='0.0'.$months; } 
elseif($months>=10 && $months<12){ $mnt='0.'.$months; } 
//if($months<12){ $mnt='0.'.$months; }  
elseif($months>=12 AND $months<24){ $m1=$months-12; $l=strlen($m1);if($l==1){$mnt='1.0'.$m1;}else{$mnt='1.'.$m1;} }
elseif($months>=24 AND $months<36){$m1=$months-24; $l=strlen($m1);if($l==1){$mnt='2.0'.$m1;}else{$mnt='2.'.$m1;} }
elseif($months>=36 AND $months<48){$m1=$months-36; $l=strlen($m1);if($l==1){$mnt='3.0'.$m1;}else{$mnt='3.'.$m1;} }
elseif($months>=48 AND $months<60){$m1=$months-48; $l=strlen($m1);if($l==1){$mnt='4.0'.$m1;}else{$mnt='4.'.$m1;} }
elseif($months>=60 AND $months<72){$m1=$months-60; $l=strlen($m1);if($l==1){$mnt='5.0'.$m1;}else{$mnt='5.'.$m1;} }
elseif($months>=72 AND $months<84){$m1=$months-72; $l=strlen($m1);if($l==1){$mnt='6.0'.$m1;}else{$mnt='6.'.$m1;} }
elseif($months>=84 AND $months<96){$m1=$months-84; $l=strlen($m1);if($l==1){$mnt='7.0'.$m1;}else{$mnt='7.'.$m1;} }
elseif($months>=96 AND $months<108){$m1=$months-96; $l=strlen($m1);if($l==1){$mnt='8.0'.$m1;}else{$mnt='8.'.$m1;} }
$str_a = explode('.',$mnt);
$VNRExpMain=($years+$str_a[0]).'.'.$str_a[1];
	  
?>

		<td align="center" style="" class="All_80" valign="top"><?php echo $VNRExpMain; ?></td>
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['PreviousExpYear']; ?></td>
		
		<?php $chr="."; $val=''; $Tot1=0; $Tot2=0;
			  $Vfirst = strtok($VNRExpMain, $chr); $Ofirst = strtok($res['PreviousExpYear'], $chr);
			  $Tot1=$Vfirst+$Ofirst;     
			  $VSec=strpbrk($VNRExpMain, $chr); $OSec=strpbrk($res['PreviousExpYear'], $chr);
			  $VSecond = strtok($VSec, $chr); $OSecond = strtok($OSec, $chr);
			  
			  $tot2=$VSecond+$OSecond;
			  if($tot2==24){ $val=($Tot1+2).'.00'; }
			  elseif($tot2==12){ $val=($Tot1+1).'.00'; }
			  elseif($tot2>12 && $tot2<24){ $v1=$tot2-12; if($v1<=9){$v2='0'.$v1;}else{$v2=$v1;} $val=($Tot1+1).'.'.$v2; }
			  elseif($tot2<12){ $v1=$tot2; if($v1<=9){$v2='0'.$v1;}else{$v2=$v1;} $val=$Tot1.'.'.$v2; }
              
		?>
		<td align="center" style="" class="All_80" valign="top"><?php echo $val; //$Tot1.'.'.$tot2.' - '.$val ?></td>
		
<?php $sqlQuali=mysql_query("select Qualification,Specialization from hrm_employee_qualification where EmployeeID=".$res['EmployeeID'], $con); ?>	
	<td align="" style="" class="All_200" valign="top"><?php $no=1; while($resQuali=mysql_fetch_array($sqlQuali)) { if($no<=2){echo $resQuali['Qualification'].', '; } if($resQuali['Specialization']!='')if($no>=3){echo $resQuali['Specialization'].', '; } $no++;}?></td>
		<td align="" style="background-color:#95CAFF" class="All_150" valign="top"><?php echo $res['BankName']; ?></td>
		<td align="" style="background-color:#95CAFF" class="All_150" valign="top"><?php echo $res['AccountNo']; ?></td>
		<td align="" style="background-color:#95CAFF" class="All_100" valign="top"><?php echo $res['BankIfscCode']; ?></td>
		
		<td align="" style="background-color:#95CAFF" class="All_150" valign="top"><?php echo $res['BranchName']; ?></td>
		<td align="" style="background-color:#95CAFF" class="All_150" valign="top"><?php echo $res['BranchAdd']; ?></td>
		<td align="" style="background-color:#95CAFF" class="All_150" valign="top"><?php echo $res['BankName2']; ?></td>
		<td align="" style="background-color:#95CAFF" class="All_100" valign="top"><?php echo $res['AccountNo2']; ?></td>
		<td align="" style="background-color:#95CAFF" class="All_100" valign="top"><?php echo $res['BankIfscCode2']; ?></td>
		
		<td align="" style="background-color:#95CAFF" class="All_150" valign="top"><?php echo $res['BranchName2']; ?></td>
		<td align="" style="background-color:#95CAFF" class="All_150" valign="top"><?php echo $res['BranchAdd2']; ?></td>
		<td align="" style="background-color:#C9FDB0;" class="All_120" valign="top"><?php echo $res['InsuCardNo']; ?></td>
		<td align="" style="background-color:#C9FDB0;" class="All_120" valign="top"><?php echo $res['PfAccountNo']; ?></td>
                <td align="" style="background-color:#C9FDB0;" class="All_120" valign="top"><?php echo $res['PF_UAN']; ?></td>
		<td align="" style="background-color:#C9FDB0;" class="All_50" valign="top"><?php echo $res['EsicNo']; ?></td>
		<td align="" style="background-color:#FCFAB1;" class="All_150" valign="top"><?php echo $res['ReportingName']; ?></td>
<?php if($res['RepEmployeeID']>0){
$sqlRn=mysql_query("select DesigId from hrm_employee_general where EmployeeID=".$res['RepEmployeeID'], $con); $resRn=mysql_fetch_assoc($sqlRn);
$sqlDesigR=mysql_query("select DesigCode from hrm_designation where DesigId=".$resRn['DesigId'], $con); $resDesigR=mysql_fetch_assoc($sqlDesigR); } ?>		
		<td align="" style="background-color:#FCFAB1;" class="All_120" valign="top"><?php echo $resDesigR['DesigCode']; ?></td>
		<td align="" style="background-color:#FCFAB1;" class="All_150" valign="top"><?php echo $res['ReportingEmailId']; ?></td>
		<td align="" style="background-color:#FCFAB1;" class="All_100" valign="top"><?php echo $res['ReportingContactNo']; ?></td>
	</tr>   
	 </tr>
	 <?php $Sno++; } ?> 
   </table>
 </td>
</tr> 
<?php } ?>
<?php //---------------------------------------Close Record----------------------------------------------------------------- ?>

	   </table>
     </tr>
	 <tr>
 </tr> 
</table>
		 </td> 
	   </tr>
	 </table>
   </td>
 </tr>
 		   </table>
		    </form>  		
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