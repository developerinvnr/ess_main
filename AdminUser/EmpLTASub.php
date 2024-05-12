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
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;} .All{font-size:11px; height:20px;} .All_80{font-size:11px; height:20px; width:80px;}
.All_40{font-size:11px; height:20px; width:40px;} .All_50{font-size:11px; height:20px; width:50px;} .All_70{font-size:11px; height:20px; width:70px;} .All_80{font-size:11px; height:20px; width:80px;}.All_100{font-size:11px; height:20px; width:100px;} .All_120{font-size:11px; height:20px; width:120px;} .All_140{font-size:11px; height:20px; width:140px;} .All_60{font-size:11px; height:20px; width:60px;}
.All_150{font-size:11px; height:20px; width:150px;}.All_170{font-size:11px; height:20px; width:170px;}.All_180{font-size:11px; height:20px; width:180px;}.All_190{font-size:11px; height:20px; width:190px;} .All_200{font-size:11px; height:20px; width:200px;} .All_450{font-size:11px; height:20px; width:450px;}.All_360{font-size:11px; height:20px; width:350px;}.All_540{font-size:11px; height:20px; width:540px;}.All_400{font-size:11px; height:20px; width:400px;} .All_480{font-size:11px; height:20px; width:480px;}.All_600{font-size:11px; height:20px; width:600px;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<style>.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
<Script type="text/javascript" language="javascript">
function SelectPrd(prd)
{ var dd=document.getElementById("Dept").value; 
  window.location='EmpLTASub.php?ls=10&wer=123&aa=grtd&er=er%re%tr%rr&trt=equalthen&sys=%tr%tr&se=reew&w=ee102&prd='+prd+'&dd='+dd+'&ee=s1s&aa=grtd'; }

function SelectDept(dd)
{ var prd=document.getElementById("Prd").value; 
  window.location='EmpLTASub.php?ls=10&wer=123&aa=grtd&er=er%re%tr%rr&trt=equalthen&sys=%tr%tr&se=reew&w=ee102&prd='+prd+'&dd='+dd+'&ee=s1s&aa=grtd'; }

function FunOpenDecl(ID,EI,CI){ window.open("InvestDeclForm.php?action=Print&ID="+ID+'&EI='+EI+'&CI='+CI,"Form","location=no,scrollbars=yes,resizable=no,menubar=no,width=950,height=700"); }
function FunDetailsSubm(ID,EI,CI,YI){ window.open("InvestSubForm.php?action=Print&ID="+ID+'&EI='+EI+'&CI='+CI+'&YI='+YI,"Form","location=no,scrollbars=yes,resizable=no,menubar=no,width=970,height=700"); }

function ReDirSub(ID,prd,dd,EI,CI)
{ var agree=confirm("Are you sure..?");
  if (agree) { var x = 'EmpLTASub.php?act=ReDir&wer=123&aa=grtd&er=er%re%tr%rr&trt=equalthen&ID='+ID+'&EI='+EI+'&CI='+CI+'&se=reew&w=ee102&prd='+prd+'&dd='+dd+'&ee=s1s&aa=grtd';  window.location=x;}}
  
function FucChk(sn)
{ if(document.getElementById("Chk"+sn).checked==true)
  {
   document.getElementById("TR"+sn).style.background='#FF80FF'; 
   document.getElementById("TD1"+sn).style.background='#FF80FF';
   document.getElementById("TD2"+sn).style.background='#FF80FF';
   document.getElementById("TD3"+sn).style.background='#FF80FF';
   document.getElementById("TD4"+sn).style.background='#FF80FF';
   document.getElementById("TD5"+sn).style.background='#FF80FF';
   document.getElementById("TD6"+sn).style.background='#FF80FF';
   document.getElementById("TD7"+sn).style.background='#FF80FF';
   document.getElementById("TD8"+sn).style.background='#FF80FF';
  } 
  else if(document.getElementById("Chk"+sn).checked==false)
  {
   document.getElementById("TR"+sn).style.background='#FFFFFF';
   document.getElementById("TD1"+sn).style.background='#CEE7FF';
   document.getElementById("TD2"+sn).style.background='#DFFFBF';
   document.getElementById("TD3"+sn).style.background='#CEE7FF';
   document.getElementById("TD4"+sn).style.background='#DFFFBF';
   document.getElementById("TD5"+sn).style.background='#CEE7FF';
   document.getElementById("TD6"+sn).style.background='#DFFFBF';
   document.getElementById("TD7"+sn).style.background='#CEE7FF';
   document.getElementById("TD8"+sn).style.background='#DFFFBF'; 
  }
}  
</Script>
</head>
<body class="body">
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" name="YearId" id="YearId" value="<?php echo $YearId; ?>" />
<input type="hidden" name="UserId" id="UserId" value="<?php echo $UserId; ?>" />
<input type="hidden" name="DeId" id="DeId" value="<?php echo $_REQUEST['dd']; ?>" />
<table class="table" border="0">
<tr>
 <td>
  <table class="menutable"><tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){require_once("AMenu.php"); } ?></td></tr></table></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px;" border="0">
   <tr><td valign="top"><?php if($_SESSION['login'] = true){require_once("AWelcome.php"); } ?></td></tr>
	 <tr>
	  <td valign="top" align="center" width="100%" id="MainWindow">
<?php //************************************************************* ?>
<?php //*************START*****START*****START******START******START****************** ?>
<?php //************************************************************************** ?>
<table border="0" style="margin-top:0px; width:95%; height:400px;">
	<tr>
		<td align="" width="100%" valign="top">
		   <table border="0">
       		 <tr><td colspan="2">		 
			       <table border="0">
                     <tr>
					 <td colspan="12" align="left" class="heading">LTA Submission Report &nbsp;&nbsp;&nbsp;Year :&nbsp;				 
<select style="font-size:14px;width:100px;background-color:#DDFFBB;font-family:Times New Roman;" name="Prd" id="Prd" onChange="SelectPrd(this.value)">
<?php $p4=$_REQUEST['prd']+3; if($_REQUEST['prd']!=='' AND $_REQUEST['prd']!==0){ ?><option value="<?php echo $_REQUEST['prd']; ?>" style="margin-left:0px;" selected>&nbsp;<?php echo $_REQUEST['prd'].'-'.$p4; ?></option><?php } else { ?><option value="0" style="margin-left:0px;" selected>&nbsp;Select Period</option><?php } ?>					
<option value="2014">&nbsp;2014-2017</option><option value="2018">&nbsp;2018-2021</option><option value="2022">&nbsp;2022-2025</option>
</select></td>
					  
					  <td class="td1" style="font-size:11px; width:138px;" align="right">
<?php if($_REQUEST['dd']!='All'){ $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['dd'], $con); $resDept=mysql_fetch_assoc($sqlDept); $dept=$resDept['DepartmentCode'];}if($_REQUEST['dd']=='All'){$dept='All';} ?>					  
<select style="font-size:14px;width:140px;background-color:#DDFFBB;font-family:Times New Roman;" name="Dept" id="Dept" onChange="SelectDept(this.value)"><option value="<?php echo $_REQUEST['dd']; ?>" style="margin-left:0px;" selected>&nbsp;<?php echo $dept; ?></option>
<?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?>
                       <option value="<?php echo $ResDept['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDept['DepartmentCode'];?></option><?php } ?>
					   <option value="All">&nbsp;All</option>
					   </select></td>
					 </tr>
                  </table>
				</td>
			 </tr>
<?php //-------------------------------Display Record--------------------------------- ?>
<?php if($_REQUEST['dd']!='') { ?>
<tr>
 <td>
   <table border="1" width="1100" cellspacing="1">
 <tr bgcolor="#7a6189">
    <td rowspan="3" align="center" style="color:#FFFFFF;" class="All_40"><b>Chk</b></td>
    <td rowspan="3" align="center" style="color:#FFFFFF;" class="All_40"><b>Sn</b></td>
    <td rowspan="3" align="center" style="color:#FFFFFF;" class="All_60"><b>EC</b></td>
	<td rowspan="3" align="center" class="All_200" style="color:#FFFFFF;width:300px;"><b>Name</b></td>
	<td rowspan="3" align="center" style="color:#FFFFFF;" class="All_100"><b>Department</b></td>
    <td colspan="8" align="center" style="color:#FFFFFF;" class="All_150"><b>Year</b></td>
 </tr>  
 <tr bgcolor="#7a6189">
    <td colspan="2" align="center" style="color:#FFFFFF;" class="All_80"><b><?php echo $_REQUEST['prd']; ?></b></td>
	<td colspan="2" align="center" style="color:#FFFFFF;" class="All_80"><b><?php echo $_REQUEST['prd']+1; ?></b></td>
	<td colspan="2" align="center" style="color:#FFFFFF;" class="All_80"><b><?php echo $_REQUEST['prd']+2; ?></b></td>
	<td colspan="2" align="center" style="color:#FFFFFF;" class="All_80"><b><?php echo $_REQUEST['prd']+3; ?></b></td>
 </tr>
 <tr bgcolor="#7a6189">
    <td align="center" style="color:#FFFFFF;" class="All_50"><b>Decl</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>Sub</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>Decl</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>Sub</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>Decl</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>Sub</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>Decl</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>Sub</b></td>
 </tr>
<?php if($_REQUEST['dd']=='All') { $sql = mysql_query("SELECT hrm_employee.*, DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID WHERE hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId, $con); }
      else { $sql = mysql_query("SELECT hrm_employee.*, DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID WHERE hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId=".$_REQUEST['dd'], $con); }
$no=1; while($res = mysql_fetch_array($sql)) { 
$sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con);  $resDept=mysql_fetch_assoc($sqlDept);?>

<?php $m1=mysql_query("select LTA from hrm_employee_investment_declaration where EmployeeID=".$res['EmployeeID']." AND SubmittedDate between '".date($_REQUEST['prd']."-01-01")."' AND '".date($_REQUEST['prd']."-12-31")."'", $con); 
	 
	  $m1_2=mysql_query("select LTA from hrm_employee_investment_submission where EmployeeID=".$res['EmployeeID']." AND SubmittedDate between '".date($_REQUEST['prd']."-01-01")."' AND '".date($_REQUEST['prd']."-12-31")."'", $con);
	  $m1_3=mysql_query("select LTA from hrm_employee_investment_submissiona where EmployeeID=".$res['EmployeeID']." AND SubmittedDate between '".date($_REQUEST['prd']."-01-01")."' AND '".date($_REQUEST['prd']."-12-31")."'", $con);
	  $rm1=mysql_fetch_assoc($m1);  $rm1_2=mysql_fetch_assoc($m1_2); $rm1_3=mysql_fetch_assoc($m1_3); ?>

<?php $p1=$_REQUEST['prd']+1;
      $m2=mysql_query("select LTA from hrm_employee_investment_declaration where EmployeeID=".$res['EmployeeID']." AND SubmittedDate between '".date($p1."-01-01")."' AND '".date($p1."-12-31")."'", $con); 
	  $m2_2=mysql_query("select LTA from hrm_employee_investment_submission where EmployeeID=".$res['EmployeeID']." AND SubmittedDate between '".date($p1."-01-01")."' AND '".date($p1."-12-31")."'", $con); 
	  $m2_3=mysql_query("select LTA from hrm_employee_investment_submissiona where EmployeeID=".$res['EmployeeID']." AND SubmittedDate between '".date($p1."-01-01")."' AND '".date($p1."-12-31")."'", $con);
      $rm2=mysql_fetch_assoc($m2);  $rm2_2=mysql_fetch_assoc($m2_2); $rm2_3=mysql_fetch_assoc($m2_3); ?>
	  
<?php $p2=$_REQUEST['prd']+2;
      $m3=mysql_query("select LTA from hrm_employee_investment_declaration where EmployeeID=".$res['EmployeeID']." AND SubmittedDate between '".date($p2."-01-01")."' AND '".date($p2."-12-31")."'", $con); 
	  $m3_2=mysql_query("select LTA from hrm_employee_investment_submission where EmployeeID=".$res['EmployeeID']." AND SubmittedDate between '".date($p2."-01-01")."' AND '".date($p2."-12-31")."'", $con);
	  $m3_3=mysql_query("select LTA from hrm_employee_investment_submissiona where EmployeeID=".$res['EmployeeID']." AND SubmittedDate between '".date($p2."-01-01")."' AND '".date($p2."-12-31")."'", $con); 
      $rm3=mysql_fetch_assoc($m3);  $rm3_2=mysql_fetch_assoc($m3_2); $rm3_3=mysql_fetch_assoc($m3_3); ?>	 
	  
<?php $p3=$_REQUEST['prd']+3; 
      $m4=mysql_query("select LTA from hrm_employee_investment_declaration where EmployeeID=".$res['EmployeeID']." AND SubmittedDate between '".date($p3."-01-01")."' AND '".date($p3."-12-31")."'", $con); 
	  $m4_2=mysql_query("select LTA from hrm_employee_investment_submission where EmployeeID=".$res['EmployeeID']." AND SubmittedDate between '".date($p3."-01-01")."' AND '".date($p3."-12-31")."'", $con);
	  $m4_3=mysql_query("select LTA from hrm_employee_investment_submissiona where EmployeeID=".$res['EmployeeID']." AND SubmittedDate between '".date($p3."-01-01")."' AND '".date($p3."-12-31")."'", $con);
      $rm4=mysql_fetch_assoc($m4);  $rm4_2=mysql_fetch_assoc($m4_2); $rm4_3=mysql_fetch_assoc($m4_3); ?>

<?php if($rm1['LTA']>0 || $rm1_2['LTA']>0 || $rm1_3['LTA']>0 || $rm2['LTA']>0 || $rm2_2['LTA']>0 || $rm2_3['LTA']>0 || $rm3['LTA']>0 || $rm3_2['LTA']>0 || $rm3_3['LTA']>0 || $rm4['LTA']>0 || $rm4_2['LTA']>0 || $rm4_3['LTA']>0){ ?>	  	   
<tr bgcolor="#FFFFFF" id="TR<?php echo $no;?>">
    <td align="center"><input type="checkbox" id="Chk<?php echo $no; ?>" onClick="FucChk(<?php echo $no; ?>)"/></td>
    <td align="center" style="" class="All_40"><?php echo $no; ?></td>
    <td align="center" style="" class="All_60"><?php echo $res['EmpCode']; ?></td>
	<td align="" style="" class="All_200">&nbsp;<?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td> 
	<td align="" style="" class="All_100">&nbsp;<?php echo $resDept['DepartmentCode']; ?></td>
	<td align="right" id="TD1<?php echo $no;?>" style="background-color:#CEE7FF;" class="All_50"><?php if($rm1['LTA']>0){echo floatval($rm1['LTA']);}?>&nbsp;</td>
	<td align="right" id="TD2<?php echo $no;?>" style="background-color:#DFFFBF;" class="All_50"><?php if($rm1_3['LTA']>0){echo floatval($rm1_3['LTA']);}elseif($rm1_2['LTA']>0){echo floatval($rm1_2['LTA']);}?>&nbsp;</td>
	<td align="right" id="TD3<?php echo $no;?>" style="background-color:#CEE7FF;" class="All_50"><?php if($rm2['LTA']>0){echo floatval($rm2['LTA']);}?>&nbsp;</td>
	<td align="right" id="TD4<?php echo $no;?>" style="background-color:#DFFFBF;" class="All_50"><?php if($rm2_3['LTA']>0){echo floatval($rm2_3['LTA']);}elseif($rm2_2['LTA']>0){echo floatval($rm2_2['LTA']);}?>&nbsp;</td>
	<td align="right" id="TD5<?php echo $no;?>" style="background-color:#CEE7FF;" class="All_50"><?php if($rm3['LTA']>0){echo floatval($rm3['LTA']);}?>&nbsp;</td>
	<td align="right" id="TD6<?php echo $no;?>" style="background-color:#DFFFBF;" class="All_50"><?php if($rm3_3['LTA']>0){echo floatval($rm3_3['LTA']);}elseif($rm3_2['LTA']>0){echo floatval($rm3_2['LTA']);}?>&nbsp;</td>
	<td align="right" id="TD7<?php echo $no;?>" style="background-color:#CEE7FF;" class="All_50"><?php if($rm4['LTA']>0){echo floatval($rm4['LTA']);}?>&nbsp;</td>
	<td align="right" id="TD8<?php echo $no;?>" style="background-color:#DFFFBF;" class="All_50"><?php if($rm4_3['LTA']>0){echo floatval($rm4_3['LTA']);}elseif($rm4_2['LTA']>0){echo floatval($rm4_2['LTA']);}?>&nbsp;</td>				
</tr>
<?php } $no++;} ?> 
   </table>
 </td>
</tr> 
   </table><font color="#008000">
 </td>
</tr> 
<?php } ?>
<?php //---------------------------------------Close Record----------------------------------------------------------------- ?>
	   </table>
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
       
		<?php //-------------------------------------------------------------------------------------- ?>
		<td align="left" width="20%">&nbsp;</td>
	</tr>
</table>
<?php //***************************************************************************?>
<?php //***************END*****END*****END******END******END*****************************?>
<?php //*******************************************************************?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>