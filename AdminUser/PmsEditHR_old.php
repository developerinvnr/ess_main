<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//****************************************************************************************************************
if(isset($_POST['GapSubmit']))
{ //if($_POST['G1']>=200 AND $_POST['G2']>=200)
  $sqlUp=mysql_query("update hrm_pms_setting set Gap1=".$_POST['G1'].", Gap2=".$_POST['G2']." where Process='PMS' AND CompanyId=".$CompanyId, $con); 
}  
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.th{ font-family:Times New Roman;font-size:12px;height:25px;text-align:center;color:#FFFFFF;font-weight:bold; }
.tdl{ font-family:Times New Roman;font-size:12px;text-align:left; }
.tdc{ font-family:Times New Roman;font-size:12px;text-align:center; }
.tdinput{ font-family:Times New Roman;font-size:14px;text-align:center;width:100%; border:hidden; }
.tdinputl{ font-family:Times New Roman;font-size:14px;text-align:left;width:100%; border:hidden; }
.tdsel{ font-family:Times New Roman;font-size:14px;text-align:left; width:100%;}
.h{font-family:Times New Roman;font-size:16px;font-weight:bold; }
.td1l{ font-family:Times New Roman;color:#FFFFFF;font-size:14px;font-weight:bold; }
.td2{ text-align:center;font-family:Times New Roman;font-size:12px; }
.td3{ font-family:Times New Roman;font-size:12px; }
.td22{ text-align:center;font-family:Times New Roman;font-size:14px; }
.td33{ font-family:Times New Roman;font-size:14px; }
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;} .inner_table{height:450px;overflow-y:auto;width:auto;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<Script type="text/javascript" language="javascript">
$(document).ready(function () { $("#table1").freezeHeader({ 'height': '450px' }); })

function SelectAppRev(v){ window.location='PmsEditHR.php?action=DW&value='+v;}
function SelectAppScore(v){ window.location='PmsEditHR.php?action=APPW&value='+v;}
function SelectRevScore(v){ window.location='PmsEditHR.php?action=REVW&value='+v;}
function SelectHodScore(v){ window.location='PmsEditHR.php?action=HODW&value='+v;}

function Click(P,E,Y,C,N)
{ var UId=document.getElementById("UserId").value; var NameN=document.getElementById("ActionName").value; var ValueV=document.getElementById("ValueName").value;
  var win = window.open("HREmpAppApproval.php?action=approve&P="+P+"&E="+E+"&Y="+Y+"&C="+C+"&U="+UId,"AppHRFile","scrollbars=yes,resizable=no,width=1250,height=750"); 
  var timer = setInterval( function()
                          {   
						   if(win.closed) 
						   { clearInterval(timer); var url = 'PmsEditHRStatus.php'; var pars = 'tact=tgtact&P='+P+'&E='+E+'&N='+N; var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_NewDE }); } 
						  }, 1000);  
}
function show_NewDE(originalRequest)
{ 
 document.getElementById('NewSpam').innerHTML = originalRequest.responseText; 
 var Psts=document.getElementById('PmsSts').value; var n=document.getElementById('PmsNo').value
 if(Psts==0){document.getElementById('Sts'+n).value='Draft';document.getElementById('Sts'+n).style.color='#A40000';}
 else if(Psts==1){document.getElementById('Sts'+n).value='Pending';document.getElementById('Sts'+n).style.color='#36006C';}
 else if(Psts==2){document.getElementById('Sts'+n).value='Approved';document.getElementById('Sts'+n).style.color='#005300';}
} 


function ClickDDG(P,E,Y,C)
{ var UId=document.getElementById("UserId").value; var NameN=document.getElementById("ActionName").value; var ValueV=document.getElementById("ValueName").value;
  var win = window.open("HREmpDDGApproval.php?action=approve&P="+P+"&E="+E+"&Y="+Y+"&C="+C+"&U="+UId,"AppHRFile","scrollbars=yes,resizable=no,width=680,height=200"); 
}

function GapEdit()
{ document.getElementById("GEdit").style.display='none';document.getElementById("GapSubmit").style.display='block';
  document.getElementById("G1").disabled=false; document.getElementById("G2").disabled=false; }

function GapRefresh()
{ document.getElementById("GEdit").style.display='block';document.getElementById("GapSubmit").style.display='none';
  document.getElementById("G1").disabled=true; document.getElementById("G2").disabled=true; }
</Script>
</head>
<body class="body">
<span id="NewSpam"></span>
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" name="YId" id="YId" value="<?php echo $YearId; ?>" />
<input type="hidden" name="UserId" id="UserId" value="<?php echo $UserId; ?>" />
<input type="hidden" name="ActionName" id="ActionName" value="<?php echo $_REQUEST['action']; ?>" />
<input type="hidden" name="ValueName" id="ValueName" value="<?php echo $_REQUEST['value']; ?>" />
<table class="table" border="0">
<tr>
 <td>
 <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
 <table width="100%" style="margin-top:0px;" border="0">
  <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td></tr>
  <tr>
   <td valign="top" align="center" style="width:100%;" id="MainWindow">

<?php //*************************************************************************************?>
<?php /*******************START*****START*****START******START******START************************/ ?>
<?php //****************************************************************************?>
  <table border="0" style="margin-top:0px;width:100%;">
   <tr>
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true){ ?>
    
	<td style="width:100%;" valign="top">
	<table border="0" style="width:100%;">
	 <tr>
	  <td colspan="12">
	  <table>
	   <tr>
	    <td>&nbsp;</td>					
	    <td class="td2" style="font-size:14px;font-weight:bold;">Gap 1</td>
	    <td class="td2" style="font-size:14px;font-weight:bold;">Gap 2</td>
	    <td></td>
	   </tr>
	   <tr>
	    <td class="h">Setting Gap Between Two Page :&nbsp;</td>
<?php $sqlGap=mysql_query("select Gap1,Gap2 from hrm_pms_setting where Process='PMS' AND CompanyId=".$CompanyId, $con); $resGap=mysql_fetch_assoc($sqlGap); ?>						
	    <form method="post" name="GapForm">
	    <td align="center">
		 <input class="td2" name="G1" id="G1" style="width:80px;" value="<?php echo $resGap['Gap1']; ?>" disabled/></td>
	    <td align="center">
		 <input class="td2" name="G2" id="G2" style="width:80px;" value="<?php echo $resGap['Gap2']; ?>" disabled/></td>
	    <td>
	     <input type="button" id="GEdit" style="width:60px;" onClick="GapEdit()" value="edit">
	     <input type="submit" name="GapSubmit" id="GapSubmit" style="width:60px; display:none;" value="save">
	    </td>
	    <td><input type="button" id="GEdit" style="width:60px;" onClick="GapRefresh()" value="refresh"></td>
	    </form>
	   </tr>
	  </table>
	  </td>
	 </tr>		     
	 <tr>
	  <td style="width:100%;">
	  <table style="width:100%;">
	   <tr>
	    <td colspan="12" class="heading">PMS - Edit Appraisal Form &nbsp;<span id="ReturnValue">&nbsp;</span></td>
        <td>
		<table border="0">					
		 <tr bgcolor="#DDFFBB">
		  <td class="td1" align="center">
		  <select class="td3" style="width:148px;background-color:#DDFFBB;" name="DeptAppRev" id="DeptAppRev" onChange="SelectAppRev(this.value)"><option value="" style="margin-left:0px;" selected>Select Department</option>
<?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?><option value="<?php echo $ResDept['DepartmentId']; ?>"><?php echo $ResDept['DepartmentCode'];?></option><?php } ?><option value="All">All</option></select>
          </td>
		  <td class="td1" align="center">
		  <select class="td3" style="width:148px;background-color:#DDFFBB;" name="AppScore" id="AppScore" onChange="SelectAppScore(this.value)"><option value="" style="margin-left:0px;" selected>Select Appraiser</option>
<?php $SqlHod=mysql_query("SELECT Appraiser_EmployeeID,Fname,Sname,Lname from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.Appraiser_EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$YearId." GROUP BY Appraiser_EmployeeID ORDER BY Fname ASC", $con); 
while($ResHod=mysql_fetch_array($SqlHod)) { $EnameH=$ResHod['Fname'].' '.$ResHod['Sname'].' '.$ResHod['Lname']; ?><option value="<?php echo $ResHod['Appraiser_EmployeeID']; ?>"><?php echo '&nbsp;'.$EnameH; ?></option><?php } ?></select>
          </td>
		  <td class="td1" align="center">
		  <select class="td3" style="width:148px;background-color:#DDFFBB;" name="RevScore" id="RevScore" onChange="SelectRevScore(this.value)"><option value="" style="margin-left:0px;" selected>Select Reviewer</option>
<?php $SqlHod=mysql_query("SELECT Reviewer_EmployeeID,Fname,Sname,Lname from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.Reviewer_EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$YearId." GROUP BY Reviewer_EmployeeID ORDER BY Fname ASC", $con); 
while($ResHod=mysql_fetch_array($SqlHod)) { $EnameH=$ResHod['Fname'].' '.$ResHod['Sname'].' '.$ResHod['Lname']; ?><option value="<?php echo $ResHod['Reviewer_EmployeeID']; ?>"><?php echo '&nbsp;'.$EnameH; ?></option><?php } ?></select>
          </td>
		  <td class="td1" align="center"><select class="td3" style="width:148px;background-color:#DDFFBB;" name="HodScore" id="HodScore" onChange="SelectHodScore(this.value)"><option value="" style="margin-left:0px;" selected>Select HOD</option>
<?php $SqlHod=mysql_query("SELECT HOD_EmployeeID,Fname,Sname,Lname from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.HOD_EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$YearId." GROUP BY HOD_EmployeeID ORDER BY Fname ASC", $con); 
while($ResHod=mysql_fetch_array($SqlHod)) { $EnameH=$ResHod['Fname'].' '.$ResHod['Sname'].' '.$ResHod['Lname']; ?><option value="<?php echo $ResHod['HOD_EmployeeID']; ?>"><?php echo '&nbsp;'.$EnameH; ?></option><?php } ?></select>
          </td>
		 </tr>
		</table>					
	    </td> 
	   </tr>
	  </table>
	  </td>
	 </tr>
<?php //-------------------------------Display Record---------------------------------- ?>
<?php 
 if($_REQUEST['action']=='DW')
 { 
  $sts='Department';
  if($_REQUEST['value']!='All') {$sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con);  $resA=mysql_fetch_assoc($sqlA); $name=$resA['DepartmentName']; }
 }
 else if($_REQUEST['action']=='APPW' OR $_REQUEST['action']=='REVW' OR $_REQUEST['action']=='HODW')
 {
  if($_REQUEST['action']=='APPW'){$sts='Appraiser';}
  elseif($_REQUEST['action']=='REVW'){$sts='Reviewer';}
  elseif($_REQUEST['action']=='HODW'){$sts='HOD';}
  $sqlA=mysql_query("select Fname, Sname, Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); 
  $resA=mysql_fetch_assoc($sqlA); $name=$resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname'];
 }
?>
     <tr>
      <td style="width:100%;">
      <table border="1" id="table1" cellspacing="0" style="width:100%;">
	   <div class="thead">
       <thead>
       <tr>
        <td colspan="10" class="td1l" style="background-color:#0069D2;height:25px;">&nbsp;PMS Status <?php echo $sts; ?> Wise :&nbsp;&nbsp;(&nbsp;<?php echo $sts; ?> - <?php if($_REQUEST['value']!='All') {echo $name; }else echo 'All';?>&nbsp;)</td>
		<td rowspan="2" bgcolor="#7a6189" class="th" style="width:5%;">Dept,Desig<br>Grade</td>
	   </tr>
       <tr bgcolor="#7a6189">
        <td class="th" style="width:3%;">SN</td>
        <td class="th" style="width:7%;">EmpCode</td>
        <td class="th" style="width:15%;">Department</td>
        <td class="th" style="width:30%;">Name</td>
		<td class="th" style="width:7%;">Emp</td>
        <td class="th" style="width:7%;">Appraiser</td>
        <td class="th" style="width:7%;">Reviewer</td>
        <td class="th" style="width:7%;">HOD</td>
        <td class="th" style="width:7%;">HR</td>
		<td class="th" style="width:5%;">Edit</td>
       </tr>
	   </thead>
	   </div>
<?php 
if($_REQUEST['action']=='DW')
{ 
  if($_REQUEST['value']=='All') { $sql = mysql_query("SELECT e.EmployeeID, EmpCode, Fname, Sname, Lname, DepartmentCode, EmpPmsId, Emp_PmsStatus, Appraiser_PmsStatus, Reviewer_PmsStatus, HodSubmit_IncStatus, HR_PmsStatus FROM hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId WHERE e.EmpStatus='A' AND e.EmpCode!=1001 AND e.EmpCode!=1002 AND p.AssessmentYear=".$YearId." AND e.CompanyId=".$CompanyId." order by e.EmpCode ASC", $con); } //".$YearId."
  else { $sql = mysql_query("SELECT e.EmployeeID, EmpCode, Fname, Sname, Lname, DepartmentCode, EmpPmsId, Emp_PmsStatus, Appraiser_PmsStatus, Reviewer_PmsStatus, HodSubmit_IncStatus, HR_PmsStatus FROM hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId WHERE e.EmpStatus='A' AND e.EmpCode!=1001 AND e.EmpCode!=1002 AND p.AssessmentYear=".$YearId." AND e.CompanyId=".$CompanyId." AND g.DepartmentId=".$_REQUEST['value']." order by e.EmpCode ASC", $con); } //".$YearId."
}
else if($_REQUEST['action']=='APPW' OR $_REQUEST['action']=='REVW' OR $_REQUEST['action']=='HODW')
{
 if($_REQUEST['action']=='APPW'){$RepN='Appraiser_EmployeeID';}
 elseif($_REQUEST['action']=='REVW'){$RepN='Reviewer_EmployeeID';}
 elseif($_REQUEST['action']=='HODW'){$RepN='HOD_EmployeeID';}
 $sql = mysql_query("SELECT e.EmployeeID, EmpCode, Fname, Sname, Lname, DepartmentCode, EmpPmsId, Emp_PmsStatus, Appraiser_PmsStatus, Reviewer_PmsStatus, HodSubmit_IncStatus, HR_PmsStatus FROM hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId WHERE e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.".$RepN."=".$_REQUEST['value']." AND p.AssessmentYear=".$YearId." order by e.EmpCode ASC", $con);
}
$no=1; while($res = mysql_fetch_array($sql)){ ?>
   <div class="tbody">
   <tbody>
   <tr id="TR_<?php echo $no; ?>"  bgcolor="#FFFFFF">
    <input type="hidden" id="UpDesigId_<?php echo $sno; ?>" value="<?php echo $res['DesigId']; ?>" />
    <td class="td2"><?php echo $no; ?></td>
    <td class="td2"><?php echo $res['EmpCode']; ?></td>
    <td class="td3">&nbsp;<?php echo $res['DepartmentCode']; ?></td>
    <td class="td3">&nbsp;<?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>    
    <td class="td2" style="color:<?php if($res['Emp_PmsStatus']==0){echo '#A40000';}if($res['Emp_PmsStatus']==1){echo '#36006C';} if($res['Emp_PmsStatus']==2){echo '#005300';} ?>;"><?php if($res['Emp_PmsStatus']==0){echo 'Draft';}if($res['Emp_PmsStatus']==1){echo 'Pending';} if($res['Emp_PmsStatus']==2){echo 'Submited';}?></td>

    <td class="td2" style="color:<?php if($res['Appraiser_PmsStatus']==0){echo '#A40000';}if($res['Appraiser_PmsStatus']==1){echo '#36006C';} if($res['Appraiser_PmsStatus']==2){echo '#005300';}if($res['Appraiser_PmsStatus']==3){echo '#006AD5';} ?>;"><?php if($res['Appraiser_PmsStatus']==0){echo 'Draft';}if($res['Appraiser_PmsStatus']==1){echo 'Pending';} if($res['Appraiser_PmsStatus']==2){echo 'Approved';}if($res['Appraiser_PmsStatus']==3){echo 'Resend Employee';}?></td>

    <td class="td2" style="color:<?php if($res['Reviewer_PmsStatus']==0){echo '#A40000';}if($res['Reviewer_PmsStatus']==1){echo '#36006C';}if($res['Reviewer_PmsStatus']==2){echo '#005300';}if($res['Reviewer_PmsStatus']==3){echo '#006AD5';} ?>;"><?php if($res['Reviewer_PmsStatus']==0){echo 'Draft';}if($res['Reviewer_PmsStatus']==1){echo 'Pending';} if($res['Reviewer_PmsStatus']==2){echo 'Approved';}if($res['Reviewer_PmsStatus']==3){echo 'Resend Appraiser';}?></td>       

    <td class="td2" style="color:<?php if($res['HodSubmit_IncStatus']==0){echo '#A40000';}if($res['HodSubmit_IncStatus']==1){echo '#36006C';}if($res['HodSubmit_IncStatus']==2){echo '#005300';}?>;"><?php if($res['HodSubmit_IncStatus']==0){echo 'Draft';}if($res['HodSubmit_IncStatus']==1){echo 'Pending';}if($res['HodSubmit_IncStatus']==2){echo 'Approved';}?></td>

    <td class="td2"><input type="text" class="td2" style="border:hidden;width:100%;color:<?php if($res['HR_PmsStatus']==0){echo '#A40000';}if($res['HR_PmsStatus']==1){echo '#36006C';} if($res['HR_PmsStatus']==2){echo '#005300';} ?>;text-align:center;" id="Sts<?php echo $no; ?>" value="<?php if($res['HR_PmsStatus']==0){echo 'Draft';}if($res['HR_PmsStatus']==1){echo 'Pending';} if($res['HR_PmsStatus']==2){echo 'Approved';}?>" readonly/></td>

    <td class="td2" style="background-color:#9FCFFF;"><?php if(($res['Emp_PmsStatus']==2 AND $res['Appraiser_PmsStatus']==2 AND $res['Reviewer_PmsStatus']==2) OR ($res['DesigId']==113 OR $res['DesigId']==120 OR $res['DesigId']==147) OR (($res['EmpCode']==14 OR $res['EmpCode']==17 OR $res['EmpCode']==139 OR $res['EmpCode']==50 OR $res['EmpCode']==51) AND $res['HodSubmit_IncStatus']==2)){ ?><a href="#"><img src="images/edit.png" border="0" onClick="Click(<?php echo $res['EmpPmsId'].','.$res['EmployeeID'].', '.$YearId.','.$CompanyId.','.$no; ?>)" /></a><?php } else {echo '&nbsp;'; }?></td> <?php //'.$YearId.' ?>

    <td class="td2" style="background-color:#FFFFA8;"><?php if($res['HR_PmsStatus']==2){ ?><a href="#"><img src="images/edit.png" border="0" onClick="ClickDDG(<?php echo $res['EmpPmsId'].','.$res['EmployeeID'].', '.$YearId.','.$CompanyId; ?>)" /></a><?php } else {echo '&nbsp;'; }?></td> <?php //'.$YearId.' ?>
   </tr>
   </tbody>
   </div>
<?php $no++;} ?> 
      </table>
      </td>
     </tr> 
    </table>
    </td>
   </tr> 
<?php //---------------------------------------Close Record----------------------------- ?>
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
<?php } ?>
<?php //-------------------------------------------------------------------------------------------------------- ?>
  </tr>
 </table>
<?php //***********************************************************************************?>
<?php //************************END*****END*****END******END******END***********************?>
<?php //********************************************************************?>
     </td>
    </tr>
    <tr><td valign="top"><?php //require_once("../footer.php"); ?></td></tr>
   </table>
  </td>
 </tr>
</table>
</body>
</html>