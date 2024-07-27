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
function SelectDept(dd)
{ 
  window.location='eLedgerd.php?ls=10&wer=123&aa=grtd&er=er%re%tr%rr&trt=equalthen&sys=%tr%tr&se=reew&w=ee102&dd='+dd+'&ee=s1s&aa=grtd'; }
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
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center" width="100%" id="MainWindow">
<?php //************************************************ ?>
<?php //***********START*****START*****START******START******START************ ?>
<?php //************************************************************ ?>
<?php if($EmployeeId==109 || $EmployeeId==110 || $EmployeeId==169){ ?>
<table border="0" style="margin-top:0px; width:95%; height:400px;">
	<tr>
		<td align="" width="100%" valign="top">
		   <table border="0">
       		 <tr><td colspan="2">		 
			       <table border="0">
                     <tr>
					 <td colspan="12" align="left" class="heading">Employee Ledger &nbsp;<span id="ReturnValue">&nbsp;</span></td>
					  
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
<?php //---------------------------------------Display Record--------------------- ?>
<?php if($_REQUEST['dd']!='') { ?>
<tr>
 <td style="width:30%;vertical-align:top;">
  <div style="height:500px;overflow:scroll;">
   <table border="1" width="100%" cellspacing="0">
   <tr bgcolor="#7a6189">
    <td align="center" style="color:#FFFFFF;" class="All_40"><b>SNo.</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_50"><b>EC</b></td>
	<td align="center" class="All_200" style="color:#FFFFFF; width:300px;"><b>Name</b></td>
	<?php /*?><td align="center" style="color:#FFFFFF;" class="All_100"><b>Department</b></td><?php */?>
    <td align="center" style="color:#FFFFFF;" class="All_50"><b>File</b></td>
   </tr>
<?php if($_REQUEST['dd']=='All') { $sql = mysql_query("SELECT VCode, EmpCode, concat(Fname, ' ',Sname, ' ',Lname) as Name, DepartmentCode from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId WHERE e.EmpStatus='A' AND e.CompanyId=".$CompanyId." order by e.ECode", $con); }else { $sql = mysql_query("SELECT VCode, EmpCode, concat(Fname,Sname,Lname) as Name, DepartmentCode from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId WHERE e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND g.DepartmentId=".$_REQUEST['dd']." order by e.ECode", $con); }$no=1; while($res = mysql_fetch_array($sql)) { ?>
<tr id="TR_<?php echo $no; ?>" <?php if($res['ExtraAllowPMS']==1) { ?> bgcolor="#2C9326" <?php } else { ?> bgcolor="#FFFFFF" <?php } ?> >
    <td align="center" class="All_40"><?php echo $no; ?></td>
    <td align="center" class="All_60"><?php echo $res['EmpCode']; ?></td>
	<td class="All_100">&nbsp;<?php echo $res['Name']; ?></td>
	<?php /*?><td class="All_100">&nbsp;<?php echo $resDept['DepartmentCode']; ?></td><?php */?>
	<td align="center" class="All_100">
	<?php if($res['VCode']=='V'){ $EC=$res['EmpCode']; $fileLgr = 'Emp'.$CompanyId.'Lgr/'.$res['EmpCode'].'.pdf'; }
	      else{ $EC='E'.$res['EmpCode']; $fileLgr = 'Emp'.$CompanyId.'Lgr/E'.$res['EmpCode'].'.pdf'; }
	if(file_exists($fileLgr)){ ?> 
	 <a href="<?=$fileLgr?>" style="text-decoration:none;" target="EmpLdgSection"><b style="color:#FF0000;"><u><?=$EC.'.pdf'?></u></b></a>
	<?php } ?>
	</td>
</tr>
<?php $no++;} ?> 
   </table>
  </div> 
 </td>
 
 <td style="width:70%;vertical-align:top;">
  <iframe name="EmpLdgSection" style="width:100%;height:500px;">
  </iframe>
 </td>
 
 
</tr> 
   </table>
 </td>
</tr> 
<?php } ?>

<?php } //if($EmployeeId==110 || $EmployeeId==169) ?>
<?php //------------------Close Record------------------------------- ?>
<?php //------------------Close Record------------------------------- ?>
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
       
		<?php //-------------------------------------------------------------------------------------------------------- ?>
		<td align="left" width="20%">&nbsp;</td>
	</tr>
</table>
<?php //************************************************************ ?>
<?php //***********END*****END*****END******END******END************* ?>
<?php //********************************************************* ?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>